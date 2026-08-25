@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => $seo['seo_title'] ?? 'Mẫu 2: Eco Clean & High-Tech (Nền Xanh Mầm Nhạt) — 3 Nông',
        'keywords' => $seo['seo_keyword'] ?? '',
        'description' => $seo['seo_description'] ?? '',
        'image' => $seo['seo_image'] ?? get_image(setting_option('logo')),
    ])
@endsection

@push('head-style')
<style>
    :root {
        --c2-dark-green: #143823;
        --c2-emerald: #10B981;
        --c2-emerald-light: #ECFDF5;
        --c2-gold: #F59E0B;
        --c2-slate: #0F172A;
        --c2-muted: #64748B;
        --c2-bg: #F0F7EC;
    }

    /* Override old brown wrap */
    body, .wrap {
        background-color: var(--c2-bg) !important;
        font-family: 'Roboto', 'Nunito', sans-serif;
        color: #1E293B;
    }

    /* Transform Header & Menu to High-Tech Minimalist */
    header {
        background-color: #FFFFFF !important;
        border-bottom: 2px solid #E2E8F0;
    }
    header .search-block .input-search {
        background: #F8FAFC !important;
        border: 1.5px solid #CBD5E1 !important;
    }
    header .search-block .btn-search {
        background-color: var(--c2-emerald) !important;
        border-color: var(--c2-emerald) !important;
    }
    .main-menu {
        background-color: var(--c2-dark-green) !important;
        box-shadow: 0 4px 20px rgba(20, 56, 35, 0.25);
    }
    .main-menu .product-menu > .dropdown-toggle {
        background-color: var(--c2-emerald) !important;
    }

    /* Concept 2 Split Hero */
    .c2-hero-wrapper {
        background: #FFFFFF;
        border-radius: 28px;
        padding: 50px 40px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
        border: 1px solid #E2E8F0;
        margin-bottom: 40px;
    }
    .c2-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--c2-emerald-light);
        color: var(--c2-dark-green);
        padding: 6px 18px;
        border-radius: 99px;
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        margin-bottom: 20px;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }
    .c2-hero-title {
        font-size: 2.85rem;
        font-weight: 900;
        color: var(--c2-dark-green);
        line-height: 1.18;
        letter-spacing: -0.5px;
        margin-bottom: 20px;
    }
    .c2-hero-img-box {
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(20, 56, 35, 0.15);
    }
    .c2-hero-img-box img {
        width: 100%;
        height: 380px;
        object-fit: cover;
    }
    .c2-glass-card {
        position: absolute;
        bottom: 20px;
        left: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 16px;
        padding: 16px 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .c2-btn-tech {
        background: var(--c2-dark-green);
        color: #fff;
        padding: 14px 34px;
        font-weight: 700;
        border-radius: 14px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 14px rgba(20, 56, 35, 0.25);
    }
    .c2-btn-tech:hover {
        background: var(--c2-emerald);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
    }

    /* 4 Trust Value Pillars */
    .c2-trust-strip {
        background: #FFFFFF;
        border-radius: 20px;
        padding: 25px 30px;
        border: 1px solid #E2E8F0;
        box-shadow: 0 4px 20px rgba(0,0,0,0.02);
        margin-bottom: 50px;
    }
    .c2-trust-item {
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .c2-trust-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: var(--c2-emerald-light);
        color: var(--c2-emerald);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    /* Minimalist High-Tech Product Card */
    .c2-product-card {
        background: #FFFFFF;
        border-radius: 18px;
        border: 1px solid #E2E8F0;
        padding: 16px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .c2-product-card:hover {
        border-color: var(--c2-emerald);
        box-shadow: 0 14px 30px rgba(16, 185, 129, 0.15);
        transform: translateY(-4px);
    }
    .c2-product-thumb {
        width: 100%;
        padding-top: 80%;
        position: relative;
        background: #F1F5F9;
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 14px;
    }
    .c2-product-thumb img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .c2-product-specs {
        font-size: 0.75rem;
        color: var(--c2-muted);
        background: #F8FAFC;
        padding: 4px 8px;
        border-radius: 6px;
        display: inline-block;
        margin-bottom: 8px;
    }
    .c2-product-title {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--c2-slate);
        line-height: 1.35;
        margin-bottom: 10px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 2.7em;
    }
    .c2-price {
        font-size: 1.15rem;
        font-weight: 800;
        color: var(--c2-dark-green);
    }
    .c2-btn-buy {
        width: 100%;
        background: #FFFFFF;
        color: var(--c2-dark-green);
        border: 1.5px solid var(--c2-dark-green);
        padding: 9px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.88rem;
        margin-top: auto;
        transition: all 0.2s ease;
        text-align: center;
        text-decoration: none;
        display: block;
    }
    .c2-product-card:hover .c2-btn-buy {
        background: var(--c2-dark-green);
        color: #FFFFFF;
    }

    /* Smart Solution Filter Widget */
    .c2-solution-box {
        background: linear-gradient(135deg, #143823 0%, #0F291A 100%);
        border-radius: 24px;
        padding: 40px;
        color: #fff;
        margin-bottom: 50px;
    }
    .c2-filter-pill {
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.25);
        color: #fff;
        padding: 10px 22px;
        border-radius: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .c2-filter-pill:hover, .c2-filter-pill.active {
        background: var(--c2-emerald);
        border-color: var(--c2-emerald);
        color: #fff;
    }
</style>
@endpush

@section('content')
    <!-- Demo Switcher Top Bar -->
    @include('frontend.demo.includes.demo_switcher', ['activeConcept' => 2])

    <div class="container my-4">
        <!-- 1. SPLIT SCREEN HERO (HIGH-TECH MINIMALIST) -->
        <div class="c2-hero-wrapper">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="c2-hero-badge">
                        <i class="fa-solid fa-certificate text-success"></i> TIÊU CHUẨN NÔNG NGHIỆP CÔNG NGHỆ CAO
                    </span>
                    <h1 class="c2-hero-title">
                        Giải Pháp Nông Nghiệp Hữu Cơ & Thông Minh
                    </h1>
                    <p class="text-muted lead fs-6 mb-4 pe-lg-3">
                        Hệ sinh thái vật tư nông nghiệp chuẩn hóa: Tăng 30% hiệu suất cây trồng, phục hồi kết cấu vi sinh đất và bảo vệ môi trường canh tác dài lâu.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#giai-phap" class="c2-btn-tech">
                            <i class="fa-solid fa-microchip"></i> Giải Pháp Trồng Trọt
                        </a>
                        <a href="{{ route('product') }}" class="btn btn-outline-secondary px-4 py-3 rounded-3 fw-bold">
                            <i class="fa-solid fa-list-check me-1"></i> Danh Mục Vật Tư
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="c2-hero-img-box">
                        <img src="{{ asset('upload/images/slide/1659942234_632056.jpg') }}" alt="Nông nghiệp sạch">
                        <div class="c2-glass-card d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fw-bold text-dark fs-6">Chứng Nhận Chuẩn GlobalGAP</div>
                                <div class="text-muted small">Kiểm định độc lập & an toàn 100%</div>
                            </div>
                            <div class="text-success fs-3">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. VALUE PROPOSITION STRIP (4 CAM KẾT VÀNG) -->
        <div class="c2-trust-strip">
            <div class="row g-4">
                <div class="col-6 col-lg-3">
                    <div class="c2-trust-item">
                        <div class="c2-trust-icon">
                            <i class="fa-solid fa-leaf"></i>
                        </div>
                        <div>
                            <div class="fw-bold fs-7 text-dark">100% Hữu Cơ</div>
                            <div class="text-muted small">Chuẩn sinh học an toàn</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="c2-trust-item">
                        <div class="c2-trust-icon">
                            <i class="fa-solid fa-truck-ramp-box"></i>
                        </div>
                        <div>
                            <div class="fw-bold fs-7 text-dark">Giao Hàng Tận Vườn</div>
                            <div class="text-muted small">Đóng gói chuẩn kỹ thuật</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="c2-trust-item">
                        <div class="c2-trust-icon">
                            <i class="fa-solid fa-user-doctor"></i>
                        </div>
                        <div>
                            <div class="fw-bold fs-7 text-dark">Bác Sĩ Cây Trồng</div>
                            <div class="text-muted small">Kỹ sư tư vấn 24/7</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="c2-trust-item">
                        <div class="c2-trust-icon">
                            <i class="fa-solid fa-arrow-rotate-left"></i>
                        </div>
                        <div>
                            <div class="fw-bold fs-7 text-dark">Đổi Trả Linh Hoạt</div>
                            <div class="text-muted small">Cam kết nảy mầm >90%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. SMART FARMING SOLUTION SELECTOR WIDGET -->
        <div id="giai-phap" class="c2-solution-box">
            <div class="text-center max-w-700 mx-auto mb-4">
                <span class="badge bg-success px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Bộ Lọc Thông Minh</span>
                <h2 class="fw-bold fs-3 mb-2">Bạn Đang Canh Tác Mô Hình Nào?</h2>
                <p class="text-white opacity-75 small">Chọn nhóm cây trồng để nhận trọn bộ giải pháp phân bón và hạt giống tương ứng</p>
            </div>
            <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                <span class="c2-filter-pill active"><i class="fa-solid fa-apple-whole"></i> Cây Ăn Trái</span>
                <span class="c2-filter-pill"><i class="fa-solid fa-carrot"></i> Rau Màu & Củ Quả</span>
                <span class="c2-filter-pill"><i class="fa-solid fa-spa"></i> Hoa Kiểng & Bonsai</span>
                <span class="c2-filter-pill"><i class="fa-solid fa-building"></i> Nông Nghiệp Đô Thị</span>
            </div>
        </div>

        <!-- 4. HIGH-TECH PRODUCT GRID -->
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <span class="text-success fw-bold small text-uppercase letter-spacing-1">Sản Phẩm Tiêu Chuẩn</span>
                    <h2 class="fw-bold fs-3 text-dark mb-0">Vật Tư Nông Nghiệp Khuyên Dùng</h2>
                </div>
                <a href="{{ route('product') }}" class="btn btn-link text-success fw-bold text-decoration-none p-0">
                    Xem tất cả <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-3 g-md-4">
                @foreach($products_hot as $prod)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="c2-product-card">
                            <div class="c2-product-thumb">
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}">
                                    <img src="{{ get_image($prod->image) }}" alt="{{ $prod->name }}" loading="lazy">
                                </a>
                            </div>
                            <span class="c2-product-specs">
                                <i class="fa-solid fa-check text-success me-1"></i> Hàng chính ngạch
                            </span>
                            <h3 class="c2-product-title">
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="text-decoration-none text-dark">
                                    {{ $prod->name }}
                                </a>
                            </h3>
                            <div class="mb-3">
                                <span class="c2-price">{{ number_format($prod->price ?? 0) }}đ</span>
                            </div>
                            <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="c2-btn-buy">
                                <i class="fa-solid fa-bag-shopping me-1"></i> Xem Chi Tiết
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
