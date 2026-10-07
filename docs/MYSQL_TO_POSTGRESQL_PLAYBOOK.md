# PLAYBOOK CHUYỂN ĐỔI DATABASE: MYSQL ➔ POSTGRESQL 16

> **Chiến lược thực thi (Execution Strategy):**
> - **ƯU TIÊN 1 (TRIỂN KHAI NGAY):** Dự án **`3nong`** (`E:\web\3nong`) — Tên database PostgreSQL: **`3nong`**.
> - **CỔNG NGHIỆM THU (CHECKPOINT GATE):** Bàn giao cho người dùng test trực tiếp tất cả các trang trên trình duyệt. **Chỉ khi người dùng xác nhận "ĐÃ CHỐT XONG" mới chuyển sang dự án tiếp theo.**
> - **ƯU TIÊN 2 (CHỜ DUYỆT SAU KHI 3NONG HOÀN TẤT):** Dự án **`salondungtokyo`** (`E:\web\salondungtokyo`) — Tên database PostgreSQL: **`salondungtokyo`**.
>
> **Được chuẩn hóa từ:** Kinh nghiệm chuyển đổi thành công 100% của dự án `vattunongnghiep58`.

---

## I. NGUYÊN TẮC CỐT LÕI (CORE PRINCIPLES)

1. **Bảo toàn dữ liệu 100% (Zero Data Loss):**
   - Không được phép mất mát bất kỳ dòng dữ liệu nào, kể cả các bảng con, bảng cài đặt, bảng quan hệ pivot.
   - Đối soát số lượng bản ghi `COUNT(*)` giữa MySQL và PostgreSQL khớp 100% trước khi chuyển đổi chính thức.
2. **Bảo đảm an toàn tuyệt đối (Fail-Safe & Rollback):**
   - Giữ nguyên vẹn cơ sở dữ liệu MySQL gốc làm nguồn dữ liệu sống.
   - Có bản sao lưu file `.sql` hoàn chỉnh và thư mục backup migration.
   - Khi cần khôi phục lại MySQL, chỉ mất 30 giây bằng cách đổi lại biến môi trường `.env`.
3. **Tuân thủ chuẩn Laravel 12/13 & PostgreSQL 16:**
   - Dùng sequences tự tăng của PostgreSQL thay cho thuộc tính `AUTO_INCREMENT` của MySQL.
   - Đồng bộ hóa các kiểu dữ liệu (`integer` vs `bigint`, boolean, text).
4. **Nối dây quan hệ (Foreign Keys / ER Diagram):**
   - Dọn sạch các bản ghi mồ côi (orphan records) trước khi tạo khóa ngoại.
   - Tạo các ràng buộc Khóa Ngoại hoàn chỉnh để công cụ quản trị (DBeaver) hiển thị sơ đồ ERD có dây nối chuẩn mực.
5. **Nghiệm thu độc lập từng dự án (Strict Phased Gate):**
   - Tuyệt đối không làm dự án thứ 2 khi dự án thứ nhất chưa được người dùng nghiệm thu thực tế trên giao diện web.

---

## II. LƯỢC ĐỒ QUY TRÌNH (TRIỂN KHAI TUẦN TỰ)

```mermaid
flowchart TD
    subgraph PHASE_1 [PHẦN 1: TRIỂN KHAI DỰ ÁN 3NONG]
        A1[1. Backup MySQL 3nong] --> A2[2. Tạo DB pgsql 3nong]
        A2 --> A3[3. Sinh Migrations & Schema]
        A3 --> A4[4. Chuyển Data & Reset Sequences]
        A4 --> A5[5. Nối dây Foreign Keys ERD]
        A5 --> A6[6. Hardening Code & Test hệ thống]
        A6 --> A7[7. Mở Browser bàn giao cho User Test]
    end

    subgraph GATEWAY [CỔNG KIỂM TRA & DUYỆT (UAT GATE)]
        A7 --> G{User Test các trang & CHỐT XONG?}
    end

    subgraph PHASE_2 [PHẦN 2: TRIỂN KHAI SALONDUNGTOKYO]
        G -- "Đã chốt OK" --> B1[Bắt đầu chuyển đổi salondungtokyo]
        G -- "Chưa đạt / Cần sửa" --> A6
    end
```

---

## III. QUY TRÌNH CHI TIẾT TRIỂN KHAI DỰ ÁN 1: `3nong`

### 🔹 BƯỚC 1: SAO LƯU & TẠO ĐIỂM KHÔI PHỤC (BACKUP 3NONG)
- [ ] **1.1 Dump dữ liệu MySQL ra file `.sql` độc lập:**
  ```bash
  mysqldump -u root -p 3nong > database/backup_mysql_3nong_20261007.sql
  ```
- [ ] **1.2 Sao lưu thư mục migrations hiện tại:**
  - Copy toàn bộ `database/migrations` sang `database/migrations_backup_20261007`.
- [ ] **1.3 Lưu cấu hình môi trường `.env`:**
  - Tạo bản sao `database/.env.backup_mysql`.

---

### 🔹 BƯỚC 2: KHỞI TẠO CSDL ĐÍCH `3nong` TRÊN POSTGRESQL 16
- [ ] **2.1 Tạo database mới trên PostgreSQL:**
  ```sql
  CREATE DATABASE 3nong WITH ENCODING 'UTF8';
  ```
- [ ] **2.2 Xác nhận kết nối:**
  - Kiểm tra cổng `5432`, user `postgres` kết nối thành công vào DB `3nong`.

---

### 🔹 BƯỚC 3: TẠO BỘ MIGRATION CHUẨN POSTGRESQL & KHỞI TẠO SCHEMA
- [ ] **3.1 Sinh migrations sạch từ MySQL:**
  - Sử dụng package `kitloong/laravel-migrations-generator` sinh bộ migration mới tương thích chuẩn PostgreSQL.
- [ ] **3.2 Cấu hình kết nối tạm sang PostgreSQL:**
  - Cấu hình thông số DB trong `config/database.php` trỏ tới database `3nong`.
- [ ] **3.3 Chạy migration tạo bảng trên PostgreSQL:**
  ```bash
  php artisan migrate --database=pgsql --no-interaction
  ```

---

### 🔹 BƯỚC 4: ĐỒNG BỘ DỮ LIỆU & RESET SEQUENCES (DATA TRANSFER)
- [ ] **4.1 Tạo Artisan Command chuyển dữ liệu `SyncDatabaseToPostgres`:**
  - Đọc danh sách tất cả các bảng từ kết nối `mysql`.
  - Tạm ngắt ràng buộc khóa ngoại, đọc chunk 500 dòng từ `mysql` và chèn vào `pgsql`.
- [ ] **4.2 Thực thi đồng bộ dữ liệu:**
  ```bash
  php artisan db:sync-to-postgres
  ```
- [ ] **4.3 Reset toàn bộ Sequences tự tăng của PostgreSQL:**
  - Duyệt qua tất cả các bảng có khóa chính để set sequence bằng `MAX(id)`.
- [ ] **4.4 Kiểm tra đối soát toàn vẹn 100% (Integrity Audit):**
  - Chạy script đối soát so sánh `COUNT(*)` của từng bảng giữa MySQL và PostgreSQL. Khớp 100% từng dòng mới chuyển bước.

---

### 🔹 BƯỚC 5: THIẾT LẬP KHÓA NGOẠI (FOREIGN KEYS / "NỐI DÂY" ERD)
- [ ] **5.1 Quét & Dọn sạch bản ghi mồ côi (Orphan Records Cleanup):**
  - Quét các bảng pivot (`product_categories`, `role_user`, `permission_role`, `order_items`, `menu_items`...) để xóa hoặc set `NULL` các ID tham chiếu không tồn tại.
- [ ] **5.2 Đồng bộ kiểu cột (Type Cast sang bigint):**
  - Chuyển các cột foreign key từ `integer` sang `bigint` nếu bảng cha dùng `bigint`.
- [ ] **5.3 Tạo migration thêm Foreign Keys:**
  - Tạo migration `add_foreign_keys_to_tables.php` với `cascadeOnDelete()` hoặc `nullOnDelete()`.
  - Chạy `php artisan migrate --no-interaction`.
- [ ] **5.4 Xác nhận lược đồ ERD trên DBeaver:**
  - Mở DBeaver -> F5 Refresh -> Kiểm tra tab ER Diagram hiển thị đầy đủ các dây nối.

---

### 🔹 BƯỚC 6: TINH CHỈNH CODE & KIỂM THỬ NỘI BỘ
- [ ] **6.1 Quét & Sửa các cú pháp MySQL đặc thù trong Codebase:**
  - Quét lỗi `AUTO_INCREMENT = 1` trong bulk-delete (`AjaxController.php`).
  - Sửa các dấu backtick (`` ` ``) và các câu lệnh raw query đặc thù MySQL.
- [ ] **6.2 Chuyển giao file `.env` chính thức sang PostgreSQL:**
  ```env
  DB_CONNECTION=pgsql
  DB_HOST=127.0.0.1
  DB_PORT=5432
  DB_DATABASE=3nong
  DB_USERNAME=postgres
  DB_PASSWORD=1
  ```
- [ ] **6.3 Tạo file `.bat` mở trình duyệt test độc lập:**
  - Tạo file `E:\web\AI_support\MO_COC_COC_3NONG.bat` với port remote debugging riêng biệt và thư mục user data riêng.
- [ ] **6.4 Kiểm thử tự động & Phản hồi HTTP (Validation):**
  - Xóa cache: `php artisan optimize:clear`.
  - Chạy test suite: `php artisan test --compact`.
  - Curl kiểm tra các trang: Trang chủ `/`, Danh mục sản phẩm, Chi tiết sản phẩm, Giỏ hàng, Đăng nhập, Admin (`HTTP 200 OK`).

---

### 🛑 BƯỚC 7: CỔNG NGHIỆM THU TỪ NGƯỜI DÙNG (USER SIGN-OFF GATE)

> [!IMPORTANT]
> **ĐÂY LÀ ĐIỂM DỪNG BẮT BUỘC (CHECKPOINT GATE).**
> - AI Assistant sẽ mở trình duyệt test hoặc cung cấp file [`MO_COC_COC_3NONG.bat`](file:///e:/web/AI_support/MO_COC_COC_3NONG.bat) để Người dùng trực tiếp click thử các trang.
> - **Checklist người dùng kiểm tra:**
>   1. Trang chủ `https://3nong.test/` hiển thị đầy đủ danh mục, banner, sản phẩm.
>   2. Xem chi tiết sản phẩm, giá tiền, hình ảnh.
>   3. Thao tác thêm vào giỏ hàng, đặt hàng thử.
>   4. Đăng nhập trang Admin (`/admin`), xem danh sách đơn hàng, sản phẩm, bài viết.
>   5. Thử tính năng Sửa / Xóa hàng loạt (Bulk-delete) trong Admin.
> - **ĐIỀU KIỆN TIẾP TỤC:** **Chỉ khi Người dùng kiểm tra xong và gửi thông điệp: "ĐÃ ỔN / CHỐT XONG 3NONG" thì hệ thống mới được phép kích hoạt Phần 2 cho dự án `salondungtokyo`.**

---

---

## IV. QUY TRÌNH TRIỂN KHAI DỰ ÁN 2: `salondungtokyo` (ĐÃ HOÀN TẤT)

- [x] **8.1 Backup:** Dump MySQL `salondungtokyo` (102 KB) và sao lưu 60 `migrations` cũ vào `database/migrations_backup_20261007`.
- [x] **8.2 Setup DB:** Tạo database `salondungtokyo` trên PostgreSQL 16 (`ENCODING 'UTF8'`).
- [x] **8.3 Schema:** Cài đặt package `kitloong/laravel-migrations-generator`, sinh 31 file migration sạch và migrate thành công 100% vào PostgreSQL 16.
- [x] **8.4 Sync Data:** Tạo lệnh `db:sync-to-postgres`, nạp toàn bộ 31 bảng từ MySQL sang PostgreSQL khớp 100% (252 countries, 46 settings, 22 menu items, 14 pages, 6 albums, 6 album items, 3 services, v.v.), reset sequences.
- [x] **8.5 Nối dây ERD:** Quét dọn 0 orphan records, tạo migration Foreign Keys `2026_10_07_232500_add_foreign_keys_to_tables.php` (7 FKs chuẩn: albums, menus, roles, permissions, pages).
- [x] **8.6 Code & Test:** Sửa triệt để câu lệnh MySQL `ALTER TABLE $table AUTO_INCREMENT = 1;` trong `AjaxController.php` sang `resetTableAutoIncrement()`, chuyển `.env` sang `DB_CONNECTION=pgsql`, tạo file [`MO_COC_COC_SALONDUNGTOKYO.bat`](file:///e:/web/AI_support/MO_COC_COC_SALONDUNGTOKYO.bat).
- [x] **8.7 Nghiệm thu & Audit:** Chạy `DatabaseIntegrityAuditTest` (5 passed, 24 assertions), chạy kiểm thử hệ thống (27 passed), HTTP routes trả về 200 OK.

---

## V. BẢNG TIẾN ĐỘ TỔNG THỂ (3 DỰ ÁN ĐÃ CHUYỂN ĐỔI THÀNH CÔNG)

| Hạng mục | Dự án 1: `vattunongnghiep58` | Dự án 2: `3nong` | Dự án 3: `salondungtokyo` |
| :--- | :---: | :---: | :---: |
| **CSDL PostgreSQL 16** | `vattunongnghiep58` (UTF-8) | `3nong` (UTF-8) | `salondungtokyo` (UTF-8) |
| **Bản sao lưu MySQL** | ✅ 2.6 MB Dump + 40 mig | ✅ 780 KB Dump + 39 mig | ✅ 102 KB Dump + 60 mig |
| **Số bảng dữ liệu** | 36 bảng (Khớp 100%) | 34 bảng (Khớp 100%) | 31 bảng (Khớp 100%) |
| **Nối dây quan hệ FKs** | ✅ 16 Foreign Keys | ✅ 15 Foreign Keys | ✅ 7 Foreign Keys |
| **Dữ liệu mồ côi (Orphan)** | 0 dòng mồ côi | 0 dòng mồ côi | 0 dòng mồ côi |
| **Fix Bulk-Delete Sequence** | ✅ Đã tối ưu | ✅ Đã tối ưu | ✅ Đã tối ưu |
| **Audit Test tự động** | ✅ 5/5 passed (26 asserts) | ✅ 5/5 passed (23 asserts) | ✅ 5/5 passed (24 asserts) |
| **Phím tắt mở trình duyệt** | [`MO_COC_COC_VATTU.bat`](file:///e:/web/AI_support/MO_COC_COC_VATTU.bat) | [`MO_COC_COC_3NONG.bat`](file:///e:/web/AI_support/MO_COC_COC_3NONG.bat) | [`MO_COC_COC_SALONDUNGTOKYO.bat`](file:///e:/web/AI_support/MO_COC_COC_SALONDUNGTOKYO.bat) |
| **Trạng thái thực tế** | 🚀 **100% Hoàn thành** | 🚀 **100% Hoàn thành** | 🚀 **100% Hoàn thành** |
