@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => $seo['seo_title'] ?? 'Mẫu 3: Dynamic Modern Retail (Nền Xám Sáng) — 3 Nông',
        'keywords' => $seo['seo_keyword'] ?? '',
        'description' => $seo['seo_description'] ?? '',
        'image' => $seo['seo_image'] ?? get_image(setting_option('logo')),
    ])
@endsection

@push('head-style')
<style>
    :root {
        --c3-navy: #0F172A;
        --c3-slate: #1E293B;
        --c3-coral: #FF5722;
        --c3-coral-dark: #E64A19;
        --c3-emerald: #059669;
        --c3-yellow: #F59E0B;
        --c3-bg: #F1F5F9;
    }

    /* Override old brown wrap */
    body, .wrap {
        background-color: var(--c3-bg) !important;
        font-family: 'Nunito', sans-serif;
        color: #334155;
    }

    /* Transform Header & Menu to Modern E-Commerce */
    header {
        background-color: #FFFFFF !important;
        border-bottom: 2px solid #E2E8F0;
    }
    header .search-block .input-search {
        background: #F8FAFC !important;
        border: 2px solid #E2E8F0 !important;
    }
    header .search-block .input-search:focus {
        border-color: var(--c3-coral) !important;
        background: #FFFFFF !important;
    }
    header .search-block .btn-search {
        background-color: var(--c3-coral) !important;
        border-color: var(--c3-coral) !important;
    }
    .main-menu {
        background-color: var(--c3-navy) !important;
        box-shadow: 0 4px 20px rgba(15, 23, 42, 0.3);
    }
    .main-menu .product-menu > .dropdown-toggle {
        background-color: var(--c3-coral) !important;
    }

    /* Mega Hero Grid */
    .c3-hero-main {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        border-radius: 20px;
        padding: 40px 30px;
        color: #fff;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.15);
    }
    .c3-hero-sub-banner {
        border-radius: 18px;
        padding: 24px;
        color: #fff;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }
    .c3-sub-1 {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
    }
    .c3-sub-2 {
        background: linear-gradient(135deg, #D97706 0%, #B45309 100%);
    }

    /* Flash Sale Section */
    .c3-flash-box {
        background: linear-gradient(135deg, #FF5722 0%, #E64A19 100%);
        border-radius: 20px;
        padding: 24px 30px;
        color: #fff;
        box-shadow: 0 12px 30px rgba(255, 87, 34, 0.25);
        margin-bottom: 40px;
    }
    .c3-timer-box {
        background: #000;
        color: #fff;
        font-weight: 800;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 1.1rem;
        display: inline-block;
        letter-spacing: 1px;
    }

    /* Product Card with Stock Progress */
    .c3-product-card {
        background: #FFFFFF;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid #E2E8F0;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        transition: all 0.25s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .c3-product-card:hover {
        transform: translateY(-4px);
        border-color: var(--c3-coral);
        box-shadow: 0 15px 30px rgba(255, 87, 34, 0.15);
    }
    .c3-product-thumb {
        position: relative;
        padding-top: 85%;
        background: #F8FAFC;
    }
    .c3-product-thumb img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .c3-badge-discount {
        position: absolute;
        top: 10px;
        right: 10px;
        background: var(--c3-coral);
        color: #fff;
        font-weight: 800;
        font-size: 0.75rem;
        padding: 4px 8px;
        border-radius: 8px;
    }
    .c3-product-body {
        padding: 16px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .c3-stock-bar {
        height: 6px;
        background: #E2E8F0;
        border-radius: 99px;
        overflow: hidden;
        margin: 8px 0;
    }
    .c3-stock-fill {
        height: 100%;
        background: linear-gradient(90deg, #FF5722, #F59E0B);
        border-radius: 99px;
    }
    .c3-btn-add {
        background: var(--c3-emerald);
        color: #fff;
        border: none;
        width: 100%;
        padding: 10px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.9rem;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        text-decoration: none;
    }
    .c3-btn-add:hover {
        background: #047857;
        color: #fff;
    }

    /* Video Testimonial Card */
    .c3-video-card {
        background: #FFFFFF;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid #E2E8F0;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    }
    .c3-video-thumb {
        height: 180px;
        position: relative;
        background: #1E293B;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
    }
    .c3-play-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: var(--c3-coral);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        color: #fff;
        box-shadow: 0 0 0 8px rgba(255, 87, 34, 0.3);
    }
</style>
@endpush

@section('content')
    <!-- Demo Switcher Top Bar -->
    @include('frontend.demo.includes.demo_switcher', ['activeConcept' => 3])

    <div class="container my-4">
        <!-- 1. MEGA HERO GRID -->
        <div class="row g-4 mb-4">
            <!-- Main Hero Banner -->
            <div class="col-lg-8">
                <div class="c3-hero-main">
                    <span class="badge bg-danger text-uppercase px-3 py-2 rounded-pill fw-bold w-max mb-3">
                        <i class="fa-solid fa-fire me-1"></i> ĐẠI TIỆC MUA SẮM VẬT TƯ
                    </span>
                    <h1 class="display-6 fw-bold mb-3 text-white">
                        TAM NÔNG MEGA SALE<br>
                        <span class="text-warning">GIẢM ĐẾN 50%</span> CHO MÙA VỤ MỚI
                    </h1>
                    <p class="text-white opacity-75 mb-4 small">
                        Hạt giống F1, phân bón cao cấp và vật tư trồng trọt công nghệ cao. Miễn phí vận chuyển cho đơn hàng từ 500k.
                    </p>
                    <div>
                        <a href="#flash-sale" class="btn btn-warning btn-lg rounded-pill fw-bold px-4 text-dark shadow-sm">
                            <i class="fa-solid fa-bolt me-1"></i> Mua Ngay Kẻo Lỡ
                        </a>
                    </div>
                </div>
            </div>
            <!-- 2 Mini Banners -->
            <div class="col-lg-4 d-flex flex-column gap-3">
                <div class="c3-hero-sub-banner c3-sub-1">
                    <div>
                        <span class="badge bg-light text-dark fw-bold mb-2">PHÂN BÓN VI SINH</span>
                        <h4 class="fw-bold fs-5 mb-1">Dinh Dưỡng Cây Trồng</h4>
                        <p class="small opacity-90 mb-0">Giảm thêm 20% khi mua combo</p>
                    </div>
                    <a href="{{ route('product') }}" class="text-white fw-bold small text-decoration-none mt-3">
                        Xem chi tiết <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="c3-hero-sub-banner c3-sub-2">
                    <div>
                        <span class="badge bg-light text-dark fw-bold mb-2">DỤNG CỤ LÀM VƯỜN</span>
                        <h4 class="fw-bold fs-5 mb-1">Thiết Bị & Phụ Kiện</h4>
                        <p class="small opacity-90 mb-0">Nhập khẩu chính hãng 100%</p>
                    </div>
                    <a href="{{ route('product') }}" class="text-white fw-bold small text-decoration-none mt-3">
                        Khám phá ngay <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- 2. FLASH SALE MODULE -->
        <div id="flash-sale" class="c3-flash-box">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
                <div class="d-flex align-items-center gap-3">
                    <h2 class="fs-4 fw-bold mb-0 text-white"><i class="fa-solid fa-bolt text-warning me-2"></i> GIỜ VÀNG GIÁ SỐC</h2>
                    <div class="d-flex align-items-center gap-2">
                        <span class="small fw-semibold opacity-90">Kết thúc trong:</span>
                        <span class="c3-timer-box">03</span> :
                        <span class="c3-timer-box">14</span> :
                        <span class="c3-timer-box">55</span>
                    </div>
                </div>
                <a href="{{ route('product') }}" class="btn btn-light btn-sm rounded-pill fw-bold px-3 text-danger">
                    Xem tất cả Flash Sale <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>

            <!-- Flash Sale Products Grid -->
            <div class="row g-3">
                @foreach($products_hot->take(4) as $prod)
                    <div class="col-6 col-md-3">
                        <div class="c3-product-card">
                            <div class="c3-product-thumb">
                                <span class="c3-badge-discount">-35%</span>
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}">
                                    <img src="{{ get_image($prod->image) }}" alt="{{ $prod->name }}" loading="lazy">
                                </a>
                            </div>
                            <div class="c3-product-body">
                                <h3 class="c1-product-title mb-1">
                                    <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="text-dark text-decoration-none">
                                        {{ $prod->name }}
                                    </a>
                                </h3>
                                <div class="mb-2">
                                    <span class="fw-bold text-danger fs-6">{{ number_format($prod->price ?? 0) }}đ</span>
                                </div>
                                <div class="c3-stock-bar">
                                    <div class="c3-stock-fill" style="width: 78%;"></div>
                                </div>
                                <div class="d-flex justify-content-between small text-muted mb-3">
                                    <span>Đã bán 78</span>
                                    <span class="text-danger fw-bold">Sắp hết</span>
                                </div>
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="c3-btn-add">
                                    <i class="fa-solid fa-cart-shopping"></i> Mua Ngay
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 3. MULTI-TAB CATEGORY SHOWCASE -->
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fs-4 fw-bold text-dark mb-0">Danh Mục Sản Phẩm Đa Dạng</h2>
                <div class="d-flex gap-2">
                    <button class="btn btn-dark btn-sm rounded-pill px-3">Hạt Giống</button>
                    <button class="btn btn-outline-secondary btn-sm rounded-pill px-3">Phân Bón</button>
                    <button class="btn btn-outline-secondary btn-sm rounded-pill px-3">Thuốc BVTV</button>
                    <button class="btn btn-outline-secondary btn-sm rounded-pill px-3">Dụng Cụ</button>
                </div>
            </div>

            <div class="row g-3 g-md-4">
                @foreach($products_hot as $prod)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="c3-product-card">
                            <div class="c3-product-thumb">
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}">
                                    <img src="{{ get_image($prod->image) }}" alt="{{ $prod->name }}" loading="lazy">
                                </a>
                            </div>
                            <div class="c3-product-body">
                                <div class="text-warning small mb-1">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <span class="text-muted ms-1">(4.9)</span>
                                </div>
                                <h3 class="c1-product-title mb-2">
                                    <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="text-dark text-decoration-none">
                                        {{ $prod->name }}
                                    </a>
                                </h3>
                                <div class="mb-3">
                                    <span class="fw-bold text-dark fs-6">{{ number_format($prod->price ?? 0) }}đ</span>
                                </div>
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="c3-btn-add">
                                    <i class="fa-solid fa-cart-plus"></i> Thêm Giỏ Hàng
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 4. VIDEO TESTIMONIALS FROM FARMERS -->
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fs-4 fw-bold text-dark mb-0">Chia Sẻ Thực Tế Từ Nhà Vườn</h2>
                    <span class="text-muted small">Xem bà con nông dân đánh giá hiệu quả sản phẩm Tam Nông</span>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="c3-video-card p-3">
                        <div class="c3-video-thumb rounded-3 mb-3">
                            <div class="c3-play-btn"><i class="fa-solid fa-play"></i></div>
                        </div>
                        <h4 class="fs-6 fw-bold text-dark mb-1">Vườn Bưởi Da Xanh 2 Hecta Năng Suất Tăng 40% Tại Bến Tre</h4>
                        <p class="text-muted small mb-0">Chia sẻ từ anh Nguyễn Văn Nam (Chủ trang trại bưởi Bến Tre)</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="c3-video-card p-3">
                        <div class="c3-video-thumb rounded-3 mb-3">
                            <div class="c3-play-btn"><i class="fa-solid fa-play"></i></div>
                        </div>
                        <h4 class="fs-6 fw-bold text-dark mb-1">Quy Trình Trồng Rau Thủy Canh Năng Suất Cao Tại Củ Chi</h4>
                        <p class="text-muted small mb-0">Chia sẻ từ chị Lê Thị Hoa (Hợp tác xã rau sạch Củ Chi)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
