@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => $seo['seo_title'] ?? 'Mẫu 1: Green & Sun Vitality (Nền Trắng Sứ) — 3 Nông',
        'keywords' => $seo['seo_keyword'] ?? '',
        'description' => $seo['seo_description'] ?? '',
        'image' => $seo['seo_image'] ?? get_image(setting_option('logo')),
    ])
@endsection

@push('head-style')
<style>
    :root {
        --brand-green: #5E9C3C;
        --brand-green-dark: #47792D;
        --brand-green-light: #F0F7EC;
        --brand-orange: #E88E23;
        --brand-orange-dark: #C97514;
        --brand-orange-light: #FDF3E7;
        --brand-slate: #1E293B;
        --brand-bg: #F8FAF6;
    }

    /* Override old brown wrap */
    body, .wrap {
        background-color: var(--brand-bg) !important;
        font-family: 'Nunito', sans-serif;
        color: #334155;
    }

    /* Transform Header & Menu to Brand White & Green */
    header {
        background-color: #FFFFFF !important;
        border-bottom: 1px solid #E2E8F0;
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    }
    header .search-block .input-search {
        background: #F8FAFC !important;
        border: 1.5px solid #CBD5E1 !important;
    }
    header .search-block .input-search:focus {
        border-color: var(--brand-green) !important;
        background: #FFFFFF !important;
    }
    header .search-block .btn-search {
        background-color: var(--brand-orange) !important;
        border-color: var(--brand-orange) !important;
    }
    .main-menu {
        background-color: var(--brand-green) !important;
        box-shadow: 0 4px 15px rgba(94, 156, 60, 0.25);
    }
    .main-menu .product-menu > .dropdown-toggle {
        background-color: var(--brand-orange) !important;
    }

    /* Concept 1 Hero Banner */
    .c1-hero {
        background: linear-gradient(135deg, rgba(94,156,60,0.94) 0%, rgba(232,142,35,0.88) 100%), url('{{ asset('upload/images/slide/1659941826_843601.jpg') }}') center/cover no-repeat;
        border-radius: 24px;
        color: #fff;
        padding: 60px 40px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px -15px rgba(94, 156, 60, 0.35);
    }
    .c1-hero::after {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        top: -100px;
        right: -80px;
        pointer-events: none;
    }
    .c1-badge-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255,255,255,0.22);
        backdrop-filter: blur(8px);
        padding: 6px 16px;
        border-radius: 99px;
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        border: 1px solid rgba(255,255,255,0.4);
    }
    .c1-hero-title {
        font-size: 2.75rem;
        font-weight: 800;
        line-height: 1.2;
        margin: 16px 0;
        text-shadow: 0 2px 10px rgba(0,0,0,0.15);
    }
    .c1-btn-primary {
        background: var(--brand-orange);
        color: #fff;
        border: none;
        padding: 14px 32px;
        font-size: 1.05rem;
        font-weight: 700;
        border-radius: 99px;
        box-shadow: 0 8px 20px rgba(232, 142, 35, 0.4);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }
    .c1-btn-primary:hover {
        background: var(--brand-orange-dark);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(232, 142, 35, 0.5);
    }
    .c1-btn-outline {
        background: rgba(255,255,255,0.15);
        color: #fff;
        border: 2px solid rgba(255,255,255,0.8);
        padding: 12px 28px;
        font-size: 1rem;
        font-weight: 700;
        border-radius: 99px;
        backdrop-filter: blur(6px);
        transition: all 0.3s ease;
        text-decoration: none;
    }
    .c1-btn-outline:hover {
        background: #fff;
        color: var(--brand-green-dark);
    }

    /* Category Circular Cards */
    .c1-cat-card {
        background: #fff;
        border-radius: 20px;
        padding: 20px 15px;
        text-align: center;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid transparent;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        height: 100%;
        display: block;
        text-decoration: none;
        color: inherit;
    }
    .c1-cat-card:hover {
        transform: translateY(-6px);
        border-color: var(--brand-green);
        box-shadow: 0 12px 25px rgba(94, 156, 60, 0.15);
    }
    .c1-cat-icon-wrapper {
        width: 70px;
        height: 70px;
        margin: 0 auto 12px;
        border-radius: 50%;
        background: var(--brand-green-light);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: var(--brand-green);
        transition: all 0.3s ease;
    }
    .c1-cat-card:hover .c1-cat-icon-wrapper {
        background: var(--brand-orange);
        color: #fff;
        transform: scale(1.08);
    }
    .c1-cat-name {
        font-weight: 700;
        font-size: 0.95rem;
        margin: 0;
        color: var(--brand-slate);
    }

    /* Modern Product Card */
    .c1-product-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 18px rgba(0,0,0,0.04);
        transition: all 0.3s ease;
        border: 1px solid #f1f5f9;
        display: flex;
        flex-direction: column;
        height: 100%;
        position: relative;
    }
    .c1-product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 32px rgba(94, 156, 60, 0.12);
        border-color: rgba(94, 156, 60, 0.3);
    }
    .c1-product-thumb {
        position: relative;
        padding-top: 85%;
        background: #f8fafc;
        overflow: hidden;
    }
    .c1-product-thumb img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .c1-product-card:hover .c1-product-thumb img {
        transform: scale(1.06);
    }
    .c1-sale-tag {
        position: absolute;
        top: 12px;
        left: 12px;
        background: var(--brand-orange);
        color: #fff;
        font-size: 0.75rem;
        font-weight: 800;
        padding: 4px 10px;
        border-radius: 99px;
        box-shadow: 0 4px 8px rgba(232, 142, 35, 0.3);
        z-index: 2;
    }
    .c1-product-body {
        padding: 18px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .c1-product-title {
        font-size: 0.95rem;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 8px;
        color: #1e293b;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 2.8em;
    }
    .c1-price {
        font-size: 1.15rem;
        font-weight: 800;
        color: var(--brand-orange-dark);
    }
    .c1-old-price {
        font-size: 0.85rem;
        color: #94a3b8;
        text-decoration: line-through;
        margin-left: 6px;
    }
    .c1-btn-cart {
        margin-top: auto;
        background: var(--brand-green-light);
        color: var(--brand-green-dark);
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
    .c1-product-card:hover .c1-btn-cart {
        background: var(--brand-green);
        color: #fff;
    }

    /* Seasonal Promo Banner */
    .c1-promo-box {
        background: linear-gradient(135deg, #FFF7ED 0%, #FFEDD5 100%);
        border: 2px dashed #FDBA74;
        border-radius: 20px;
        padding: 30px;
        position: relative;
    }

    /* Section Title */
    .c1-section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
    }
    .c1-section-title {
        font-size: 1.65rem;
        font-weight: 800;
        color: #0f172a;
        position: relative;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }
    .c1-section-title::before {
        content: '';
        display: inline-block;
        width: 6px;
        height: 24px;
        background: var(--brand-orange);
        border-radius: 99px;
    }
</style>
@endpush

@section('content')
    <!-- Demo Switcher Top Bar -->
    @include('frontend.demo.includes.demo_switcher', ['activeConcept' => 1])

    <div class="container my-4">
        <!-- 1. HERO BANNER -->
        <div class="c1-hero mb-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="c1-badge-pill">
                        <i class="fa-solid fa-seedling text-warning"></i> Nông Nghiệp Xanh — Năng Suất Vàng
                    </span>
                    <h1 class="c1-hero-title">
                        Nông Nghiệp Sạch<br>
                        <span style="color: #FED7AA;">Nâng Tầm Nông Sản Việt</span>
                    </h1>
                    <p class="lead text-white opacity-90 mb-4 fs-6 pe-lg-4">
                        Tam Nông tự hào đồng hành cùng triệu bà con nhà vườn cung ứng nguồn giống F1 chuẩn, phân bón hữu cơ sinh học và giải pháp dinh dưỡng cây trồng bền vững.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#san-pham" class="c1-btn-primary">
                            <i class="fa-solid fa-basket-shopping"></i> Khám Phá Sản Phẩm
                        </a>
                        <a href="{{ route('contact') }}" class="c1-btn-outline">
                            <i class="fa-solid fa-phone-volume"></i> Tư Vấn Kỹ Sư
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block text-center position-relative">
                    <img src="{{ get_image(setting_option('logo')) }}" alt="3 Nông" class="img-fluid drop-shadow" style="max-height: 220px; filter: drop-shadow(0 15px 25px rgba(0,0,0,0.3));">
                </div>
            </div>
        </div>

        <!-- 2. QUICK CATEGORIES (HẠT GIỐNG - PHÂN BÓN - DỤNG CỤ) -->
        <div class="mb-5">
            <div class="c1-section-header">
                <h2 class="c1-section-title">Danh Mục Nổi Bật</h2>
                <span class="text-muted small fw-semibold">Khám phá theo nhu cầu canh tác</span>
            </div>
            <div class="row g-3">
                @php
                    $catIcons = [
                        'fa-seedling', 'fa-jar', 'fa-bottle-droplet', 'fa-wheat-awn', 
                        'fa-tractor', 'fa-leaf', 'fa-plant-wilt', 'fa-box-open'
                    ];
                @endphp
                @foreach($cat_product->take(6) as $index => $cat)
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="{{ route('product.category', ['slug' => $cat->slug]) }}" class="c1-cat-card">
                            <div class="c1-cat-icon-wrapper">
                                <i class="fa-solid {{ $catIcons[$index % count($catIcons)] }}"></i>
                            </div>
                            <h3 class="c1-cat-name">{{ $cat->name }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 3. HOT PRODUCTS SHOWCASE -->
        <div id="san-pham" class="mb-5">
            <div class="c1-section-header">
                <div>
                    <h2 class="c1-section-title">Sản Phẩm Bán Chạy Nhất</h2>
                    <p class="text-muted small mb-0 ps-3">Được hàng ngàn bà con nhà vườn tin dùng mỗi vụ mùa</p>
                </div>
                <a href="{{ route('product') }}" class="btn btn-outline-success btn-sm rounded-pill fw-bold px-3">
                    Xem tất cả <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-3 g-md-4">
                @foreach($products_hot as $prod)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="c1-product-card">
                            <div class="c1-product-thumb">
                                <span class="c1-sale-tag">Hot Deal</span>
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}">
                                    <img src="{{ get_image($prod->image) }}" alt="{{ $prod->name }}" loading="lazy">
                                </a>
                            </div>
                            <div class="c1-product-body">
                                <div class="text-warning small mb-1">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                    <span class="text-muted ms-1">(5.0)</span>
                                </div>
                                <h3 class="c1-product-title">
                                    <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="text-decoration-none text-dark">
                                        {{ $prod->name }}
                                    </a>
                                </h3>
                                <div class="d-flex align-items-baseline mb-3">
                                    <span class="c1-price">{{ number_format($prod->price ?? 0) }}đ</span>
                                    @if(!empty($prod->sale_price) && $prod->sale_price > $prod->price)
                                        <span class="c1-old-price">{{ number_format($prod->sale_price) }}đ</span>
                                    @endif
                                </div>
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="c1-btn-cart">
                                    <i class="fa-solid fa-cart-plus"></i> Chọn Mua
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 4. SEASONAL PROMO & VALUE PROPOSITION -->
        <div class="c1-promo-box mb-5">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">
                        <i class="fa-solid fa-gift me-1"></i> Ưu Đãi Mùa Vụ
                    </span>
                    <h3 class="fw-bold text-dark fs-3 mb-2">Combo Dinh Dưỡng Phục Hồi Đất Trồng Sau Thu Hoạch</h3>
                    <p class="text-muted mb-3">Tặng kèm hướng dẫn kỹ thuật ủ phân vi sinh và quy trình bón lót hữu cơ từ chuyên gia Tam Nông.</p>
                    <div class="d-flex flex-wrap gap-4 text-dark fw-bold small">
                        <div><i class="fa-solid fa-circle-check text-success me-1"></i> 100% Chính Hãng</div>
                        <div><i class="fa-solid fa-truck-fast text-warning me-1"></i> Giao Tận Vườn 24h</div>
                        <div><i class="fa-solid fa-headset text-success me-1"></i> Tư Vấn Kỹ Thuật Trọn Đời</div>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                    <a href="{{ route('contact') }}" class="c1-btn-primary">
                        <i class="fa-solid fa-comment-dots"></i> Nhận Báo Giá Sỉ
                    </a>
                </div>
            </div>
        </div>

        <!-- 5. FARMING NEWS & GUIDES -->
        @if(!empty($post_list) && count($post_list) > 0)
            <div class="mb-5">
                <div class="c1-section-header">
                    <div>
                        <h2 class="c1-section-title">Cẩm Nang Kỹ Thuật Nhà Vườn</h2>
                        <p class="text-muted small mb-0 ps-3">Kiến thức nông nghiệp chuẩn từ kỹ sư nông học</p>
                    </div>
                    <a href="{{ route('news') }}" class="btn btn-outline-success btn-sm rounded-pill fw-bold px-3">
                        Xem bài viết <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="row g-4">
                    @foreach($post_list->take(3) as $post)
                        <div class="col-md-4">
                            <div class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden transition-all">
                                <img src="{{ get_image($post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                                <div class="card-body p-4 d-flex flex-direction-column">
                                    <span class="text-success small fw-bold mb-2 d-block">
                                        <i class="fa-regular fa-calendar me-1"></i> {{ $post->created_at ? $post->created_at->format('d/m/Y') : 'Tin mới' }}
                                    </span>
                                    <h4 class="card-title fs-6 fw-bold mb-2">
                                        <a href="{{ route('news.detail', ['slug' => $post->slug, 'id' => $post->id]) }}" class="text-dark text-decoration-none">
                                            {{ $post->title }}
                                        </a>
                                    </h4>
                                    <p class="card-text text-muted small flex-grow-1">
                                        {{ Str::limit(strip_tags($post->description ?? $post->content), 90) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
