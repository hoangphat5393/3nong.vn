# PLAYBOOK: CHUẨN HÓA CƠ SỞ DỮ LIỆU THANH TOÁN (PAYMENT SCHEMA STANDARDIZATION)
## DỰ ÁN: 3 NÔNG (`3nong`)

> **Loại tài liệu:** Playbook thực thi kỹ thuật (Engineering Execution Playbook)  
> **Áp dụng cho:** Codebase & Database `3nong` (Laravel 13, PostgreSQL 16 `3nong` & MySQL Hosting)  
> **Mục tiêu:** Đồng bộ hóa kiến trúc thanh toán theo chuẩn E-commerce quốc tế (`payment_methods`, `orders`, `order_payments`), loại bỏ hoàn toàn các model alias cũ `ShopPaymentMethod` và `OrderPaymentMethod`  
> **Trạng thái:** Sẵn sàng thực thi (Ready for Execution)  
> **Phiên bản:** 1.0.0 (2026-10-23)

---

## 1. ĐẶC ĐIỂM HIỆN TRẠNG RIÊNG CỦA DỰ ÁN `3nong`

Khác với `vattunongnghiep58`, dự án `3nong` đang ở trạng thái làm việc dở dang (uncommitted changes) ngay trong working tree:
- **Migration vừa chạy:** File `database/migrations/2026_10_23_221100_rename_shop_payment_method_to_order_payment_methods.php` đã được chạy vào Database local (`Batch [5] Ran`), khiến bảng trong PostgreSQL hiện mang tên `order_payment_methods`.
- **File uncommitted:**
  - `app/Models/OrderPaymentMethod.php` (untracked)
  - `app/Models/ShopPaymentMethod.php` & `app/Models/Backend/ShopPaymentMethod.php` (modified)
  - `app/Services/CustomerAccountService.php` (modified)
  - `app/Http/Controllers/Account/AccountController.php` (modified)
  - `3nong_hosting_final.sql` (modified)
  - `tests/Feature/CustomerOrderOwnershipTest.php` (modified)
- **Quy trình đặt hàng storefront:**
  - Khách điền form đơn hàng tại giỏ hàng và lưu đơn qua hình thức gọi xác nhận COD (tương tự như vattu).
  - Hệ thống chưa có bảng ghi nhận giao dịch `order_payments` và chưa có trường `paid_amount` trên bảng `orders`.

---

## 2. MA TRẬN CHUẨN HÓA KIẾN TRÚC CHO `3nong`

| Thành phần | Hiện trạng trong working tree `3nong` | Sau chuẩn hóa hoàn thiện | Hành động thực thi |
| :--- | :--- | :--- | :--- |
| **Bảng danh mục cổng** | `order_payment_methods` (đã migrate) | **`payment_methods`** | Viết migration chuyển tiếp sang `payment_methods` |
| **Bảng giao dịch** | Chưa có | **`order_payments`** | Tạo mới (kèm cột `payload` JSONB) |
| **Bảng đơn hàng** | `orders` (chưa có `paid_amount`) | `orders` (**có `paid_amount`**) | Migration thêm cột `paid_amount` sau `total` |
| **Model danh mục** | Đang có `OrderPaymentMethod.php` | **`PaymentMethod.php`** | Tạo mới class chuẩn |
| **Model giao dịch** | Chưa có | **`OrderPayment.php`** | Tạo mới class chuẩn + cast `payload` array |
| **Model tàn dư 1** | `app/Models/ShopPaymentMethod.php` | ❌ BỊ XÓA BỎ | Xóa file |
| **Model tàn dư 2** | `app/Models/Backend/ShopPaymentMethod.php` | ❌ BỊ XÓA BỎ | Xóa file |
| **Model tàn dư 3** | `app/Models/OrderPaymentMethod.php` | ❌ BỊ XÓA BỎ | Xóa file |
| **Service & Controller** | Đang dùng `OrderPaymentMethod` | Dùng trực tiếp **`PaymentMethod`** | Cập nhật gọn gàng, sạch sẽ |
| **SQL Hosting** | `3nong_hosting_final.sql` | Đồng bộ tên bảng & schema chuẩn | Cập nhật cấu trúc bảng `payment_methods`, `order_payments`, `orders` |

---

## 3. LỘ TRÌNH THỰC THI CHI TIẾT (6 GIAI ĐOẠN)

### GIAI ĐOẠN 0: AN TOÀN TRƯỚC KHI THỰC THI
- [ ] Xác nhận trạng thái Git hiện tại: `git status`.
- [ ] Đảm bảo Database PostgreSQL `3nong` đang hoạt động: `php artisan migrate:status`.

---

### GIAI ĐOẠN 1: TẠO MIGRATION CHUẨN HÓA DỨT ĐIỂM
Tạo file migration mới: `database/migrations/2026_10_23_235500_standardize_payment_schema.php`

**Nội dung Migration an toàn (tự động nhận diện cả 2 trạng thái cũ):**
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Chuyển bảng danh mục về tên chuẩn quốc tế payment_methods
        if (Schema::hasTable('order_payment_methods') && !Schema::hasTable('payment_methods')) {
            Schema::rename('order_payment_methods', 'payment_methods');
        } elseif (Schema::hasTable('shop_payment_method') && !Schema::hasTable('payment_methods')) {
            Schema::rename('shop_payment_method', 'payment_methods');
        }

        // 2. Bổ sung trường tài chính paid_amount vào orders
        if (Schema::hasTable('orders') && !Schema::hasColumn('orders', 'paid_amount')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->decimal('paid_amount', 15, 2)->default(0)->after('total');
            });
        }

        // 3. Tạo bảng lưu trữ giao dịch đa cổng order_payments
        if (!Schema::hasTable('order_payments')) {
            Schema::create('order_payments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
                $table->string('gateway', 50)->index();
                $table->decimal('amount', 15, 2);
                $table->string('currency', 10)->default('VND');
                $table->string('transaction_code', 100)->nullable()->index();
                $table->string('status', 30)->default('pending')->index();
                $table->jsonb('payload')->nullable();
                $table->timestamp('paid_at')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('order_payments');

        if (Schema::hasTable('orders') && Schema::hasColumn('orders', 'paid_amount')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropColumn('paid_amount');
            });
        }

        if (Schema::hasTable('payment_methods') && !Schema::hasTable('order_payment_methods')) {
            Schema::rename('payment_methods', 'order_payment_methods');
        }
    }
};
```
- [ ] Chạy migration: `php artisan migrate`.

---

### GIAI ĐOẠN 2: TẠO CÁC MODEL CHUẨN MỚI
- [ ] Tạo Model danh mục [`app/Models/PaymentMethod.php`](file:///e:/web/3nong/app/Models/PaymentMethod.php):
  ```php
  <?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;

  class PaymentMethod extends Model
  {
      public $timestamps = false;
      protected $table = 'payment_methods';
      protected $guarded = [];
  }
  ```

- [ ] Tạo Model giao dịch [`app/Models/OrderPayment.php`](file:///e:/web/3nong/app/Models/OrderPayment.php):
  ```php
  <?php

  namespace App\Models;

  use App\Models\Frontend\Order;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;

  class OrderPayment extends Model
  {
      protected $table = 'order_payments';
      protected $guarded = [];

      protected function casts(): array
      {
          return [
              'payload' => 'array',
              'amount' => 'decimal:2',
              'paid_at' => 'datetime',
          ];
      }

      public function order(): BelongsTo
      {
          return $this->belongsTo(Order::class, 'order_id', 'id');
      }
  }
  ```

- [ ] Cập nhật Model [`app/Models/Frontend/Order.php`](file:///e:/web/3nong/app/Models/Frontend/Order.php):
  Thêm quan hệ thanh toán:
  ```php
  public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany
  {
      return $this->hasMany(\App\Models\OrderPayment::class, 'order_id', 'id');
  }
  ```

---

### GIAI ĐOẠN 3: XÓA SẠCH TÀN DƯ VÀ CẬP NHẬT SERVICE / CONTROLLER
- [ ] Xóa bỏ triệt để 3 file tàn dư:
  - `app/Models/ShopPaymentMethod.php`
  - `app/Models/Backend/ShopPaymentMethod.php`
  - `app/Models/OrderPaymentMethod.php`
- [ ] Cập nhật [`app/Services/CustomerAccountService.php`](file:///e:/web/3nong/app/Services/CustomerAccountService.php):
  - `use App\Models\PaymentMethod;`
  - `PaymentMethod::query()->where('status', 1)->...`
  - `PaymentMethod::pluck('name', 'id')->toArray();`
- [ ] Cập nhật [`app/Http/Controllers/Account/AccountController.php`](file:///e:/web/3nong/app/Http/Controllers/Account/AccountController.php):
  - Đổi `$this->data['order_payment_methods']` ➔ `$this->data['payment_methods'] = $this->accountService->activePaymentMethodLabels();`
  - Giữ lại alias `$this->data['shop_payment_method'] = $this->data['payment_methods'];` nếu blade template cũ còn trỏ tới.

---

### GIAI ĐOẠN 4: CẬP NHẬT TÀI LIỆU & SQL DUMP `3nong_hosting_final.sql`
- [ ] Cập nhật [`docs/TABLE_GLOSSARY.md`](file:///e:/web/3nong/docs/TABLE_GLOSSARY.md):
  - Đổi tên bảng `order_payment_methods` ➔ `payment_methods` (Model: `PaymentMethod`).
  - Thêm bảng `order_payments` (Model: `OrderPayment`).
  - Cập nhật bảng `orders` (thêm `paid_amount`).
- [ ] Cập nhật [`3nong_hosting_final.sql`](file:///e:/web/3nong/3nong_hosting_final.sql):
  - Đổi cấu trúc bảng sang `payment_methods`.
  - Thêm cấu trúc bảng `order_payments`.
  - Bổ sung `paid_amount` vào bảng `orders`.

---

### GIAI ĐOẠN 5: KIỂM THỬ TỰ ĐỘNG & PINT / GRAPHIFY
- [ ] Cập nhật test [`tests/Feature/CustomerOrderOwnershipTest.php`](file:///e:/web/3nong/tests/Feature/CustomerOrderOwnershipTest.php) (tạo bảng `payment_methods` thay cho bảng cũ).
- [ ] Chạy test cụ thể: `php artisan test --filter=CustomerOrderOwnershipTest`.
- [ ] Chạy Laravel Pint: `vendor/bin/pint --dirty --format agent`.
- [ ] Cập nhật sơ đồ quan hệ: `graphify update .`.

---

### GIAI ĐOẠN 6: ROLLBACK PLAN
- Rollback migration: `php artisan migrate:rollback --step=1`.
- Rollback code: `git restore app/ docs/ tests/` (nếu cần).
