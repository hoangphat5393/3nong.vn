@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => $seo['seo_title'] ?? 'Mẫu 5: Nordic Minimalist Luxury Organic — 3 Nông',
        'keywords' => $seo['seo_keyword'] ?? '',
        'description' => $seo['seo_description'] ?? '',
        'image' => $seo['seo_image'] ?? get_image(setting_option('logo')),
    ])
@endsection

@push('head-style')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">

<style>
    :root {
        --nordic-bg: #FAFAF9;
        --nordic-white: #FFFFFF;
        --nordic-olive: #2D4739;
        --nordic-gold: #D4AF37;
        --nordic-charcoal: #1C1917;
        --nordic-stone: #78716C;
        --nordic-sand: #F5F5F4;
    }

    body, .wrap {
        background-color: var(--nordic-bg) !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
        color: var(--nordic-charcoal);
    }

    /* Minimalist Luxury Header */
    header {
        background-color: var(--nordic-white) !important;
        border-bottom: 1px solid #E7E5E4;
        padding: 24px 0 !important;
    }
    .main-menu {
        background-color: var(--nordic-olive) !important;
        box-shadow: none !important;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .main-menu .nav-link {
        font-weight: 500 !important;
        letter-spacing: 0.5px;
        text-transform: uppercase !important;
        font-size: 0.88rem !important;
    }

    /* Editorial Hero Section */
    .nordic-hero {
        background-color: var(--nordic-sand);
        border-radius: 32px;
        padding: 70px 60px;
        margin-bottom: 60px;
        border: 1px solid #E7E5E4;
    }
    @media (max-width: 767.98px) {
        .nordic-hero {
            padding: 40px 20px;
        }
    }
    .nordic-editorial-subtitle {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: var(--nordic-stone);
        font-weight: 700;
        margin-bottom: 16px;
        display: block;
    }
    .nordic-editorial-title {
        font-family: 'Playfair Display', serif;
        font-size: 3.2rem;
        font-weight: 700;
        line-height: 1.15;
        color: var(--nordic-olive);
        margin-bottom: 24px;
    }
    .nordic-btn-primary {
        background-color: var(--nordic-olive);
        color: #FFFFFF;
        padding: 14px 36px;
        border-radius: 99px;
        font-weight: 600;
        font-size: 0.95rem;
        letter-spacing: 0.5px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
    }
    .nordic-btn-primary:hover {
        background-color: #1B2D24;
        color: #FFFFFF;
        transform: translateY(-2px);
    }

    /* Storytelling 3 Columns */
    .nordic-story-card {
        background: var(--nordic-white);
        border-radius: 20px;
        padding: 35px 30px;
        border: 1px solid #E7E5E4;
        height: 100%;
        transition: all 0.3s ease;
    }
    .nordic-story-card:hover {
        border-color: var(--nordic-olive);
        transform: translateY(-4px);
    }
    .nordic-story-num {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        color: var(--nordic-gold);
        margin-bottom: 12px;
        font-style: italic;
    }

    /* Clean Curated Product Cards */
    .nordic-product-card {
        background: var(--nordic-white);
        border-radius: 24px;
        padding: 18px;
        border: 1px solid #E7E5E4;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .nordic-product-card:hover {
        border-color: var(--nordic-olive);
        box-shadow: 0 20px 40px -15px rgba(45, 71, 57, 0.1);
        transform: translateY(-5px);
    }
    .nordic-product-thumb {
        position: relative;
        padding-top: 85%;
        border-radius: 18px;
        background: #F5F5F4;
        overflow: hidden;
        margin-bottom: 18px;
    }
    .nordic-product-thumb img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .nordic-product-name {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 0.98rem;
        font-weight: 600;
        color: var(--nordic-charcoal);
        line-height: 1.4;
        margin-bottom: 10px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 2.8em;
    }
    .nordic-product-price {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--nordic-olive);
    }
    .nordic-btn-outline {
        border: 1.5px solid var(--nordic-olive);
        color: var(--nordic-olive);
        background: transparent;
        padding: 10px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.88rem;
        text-align: center;
        text-decoration: none;
        display: block;
        margin-top: auto;
        transition: all 0.2s ease;
    }
    .nordic-product-card:hover .nordic-btn-outline {
        background-color: var(--nordic-olive);
        color: #FFFFFF;
    }
</style>
@endpush

@section('content')
    <!-- Demo Switcher Top Bar -->
    @include('frontend.demo.includes.demo_switcher', ['activeConcept' => 5])

    <div class="container my-4">
        <!-- 1. EDITORIAL SCANDINAVIAN HERO -->
        <div class="nordic-hero">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="nordic-editorial-subtitle">Gieo Mầm Thuần Khiết • Vụ Mùa Bền Vững</span>
                    <h1 class="nordic-editorial-title">
                        Nghệ Thuật Canh Tác<br>
                        <em>Nông Nghiệp Hữu Cơ</em>
                    </h1>
                    <p class="lead text-muted fs-6 mb-4 pe-lg-4" style="line-height: 1.7;">
                        Tam Nông tôn vinh giá trị tự nhiên với nguồn hạt giống thuần chủng, phân bón hữu cơ sinh học đạt chuẩn kiểm định khắt khe nhất, bảo vệ nguồn đất màu mỡ cho thế hệ tương lai.
                    </p>
                    <div>
                        <a href="{{ route('product') }}" class="nordic-btn-primary">
                            <span>Khám Phá Bộ Sưu Tập</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="rounded-4 overflow-hidden shadow-sm" style="height: 380px;">
                        <img src="{{ asset('upload/images/slide/1659941826_843601.jpg') }}" alt="Organic Farming" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. THREE STORY PILLARS -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="nordic-story-card">
                    <div class="nordic-story-num">01.</div>
                    <h3 class="fw-bold fs-5 mb-2">Hạt Giống Thuần Chủng</h3>
                    <p class="text-muted small mb-0">Tỷ lệ nảy mầm đạt trên 92%, được kiểm định tại viện nông học trước khi đến tay bà con.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="nordic-story-card">
                    <div class="nordic-story-num">02.</div>
                    <h3 class="fw-bold fs-5 mb-2">Dinh Dưỡng Vi Sinh Đất</h3>
                    <p class="text-muted small mb-0">Phục hồi cấu trúc mùn hữu cơ, bổ sung hàng tỷ lợi khuẩn bản địa giúp rễ cây phát triển tự nhiên.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="nordic-story-card">
                    <div class="nordic-story-num">03.</div>
                    <h3 class="fw-bold fs-5 mb-2">Bảo Vệ Môi Trường Xanh</h3>
                    <p class="text-muted small mb-0">Nói không với hóa chất tồn dư, đồng hành cùng chứng nhận nông sản sạch xuất khẩu Châu Âu.</p>
                </div>
            </div>
        </div>

        <!-- 3. CURATED PRODUCT COLLECTION -->
        <div class="mb-5">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="nordic-editorial-subtitle">Tuyển Chọn Cho Vụ Mùa Này</span>
                <h2 class="font-serif fw-bold fs-2" style="font-family: 'Playfair Display', serif;">Danh Mục Vật Tư Tiêu Biểu</h2>
            </div>

            <div class="row g-4">
                @foreach($products_hot as $prod)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="nordic-product-card">
                            <div class="nordic-product-thumb">
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}">
                                    <img src="{{ get_image($prod->image) }}" alt="{{ $prod->name }}" loading="lazy">
                                </a>
                            </div>
                            <h3 class="nordic-product-name">
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="text-decoration-none text-dark">
                                    {{ $prod->name }}
                                </a>
                            </h3>
                            <div class="mb-3">
                                <span class="nordic-product-price">{{ number_format($prod->price ?? 0) }}đ</span>
                            </div>
                            <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="nordic-btn-outline">
                                Chi Tiết Vật Tư
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
