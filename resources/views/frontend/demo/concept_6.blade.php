@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => $seo['seo_title'] ?? 'Mẫu 6: Mobile-First App Experience & Stories — 3 Nông',
        'keywords' => $seo['seo_keyword'] ?? '',
        'description' => $seo['seo_description'] ?? '',
        'image' => $seo['seo_image'] ?? get_image(setting_option('logo')),
    ])
@endsection

@push('head-style')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    :root {
        --app-primary: #00A86B;
        --app-coral: #FF4D4D;
        --app-yellow: #FFC107;
        --app-dark: #111827;
        --app-bg: #F3F4F6;
        --app-card: #FFFFFF;
    }

    body, .wrap {
        background-color: var(--app-bg) !important;
        font-family: 'Outfit', sans-serif !important;
        color: var(--app-dark);
    }

    /* App-Like Header */
    header {
        background-color: #FFFFFF !important;
        border-bottom: 2px solid #E5E7EB;
        position: sticky;
        top: 0;
        z-index: 1020;
    }
    .main-menu {
        background-color: var(--app-dark) !important;
    }

    /* Story Bubbles Strip (Like Shopee/Instagram Stories) */
    .app-stories-scroll {
        display: flex;
        gap: 16px;
        overflow-x: auto;
        padding: 10px 0 20px;
        scrollbar-width: none;
    }
    .app-stories-scroll::-webkit-scrollbar {
        display: none;
    }
    .app-story-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        min-width: 80px;
        text-decoration: none;
        color: inherit;
    }
    .app-story-ring {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        padding: 3px;
        background: linear-gradient(45deg, #00A86B, #FFC107, #FF4D4D);
        margin-bottom: 8px;
        transition: transform 0.3s ease;
    }
    .app-story-item:hover .app-story-ring {
        transform: scale(1.08);
    }
    .app-story-img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        background: #fff;
        border: 2px solid #fff;
    }
    .app-story-label {
        font-size: 0.78rem;
        font-weight: 700;
        color: #374151;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 80px;
    }

    /* App Flash Drops Box */
    .app-flash-drop {
        background: linear-gradient(135deg, #FF4D4D 0%, #E11D48 100%);
        border-radius: 24px;
        padding: 24px;
        color: #FFFFFF;
        box-shadow: 0 10px 25px rgba(225, 29, 72, 0.25);
        margin-bottom: 35px;
    }

    /* Fast Action Product Cards */
    .app-prod-card {
        background: var(--app-card);
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid #E5E7EB;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        transition: all 0.25s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .app-prod-card:hover {
        transform: translateY(-4px);
        border-color: var(--app-primary);
        box-shadow: 0 15px 30px rgba(0, 168, 107, 0.15);
    }
    .app-prod-thumb {
        position: relative;
        padding-top: 85%;
        background: #F9FAFB;
    }
    .app-prod-thumb img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .app-prod-body {
        padding: 16px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .app-btn-fast-cart {
        background: var(--app-primary);
        color: #FFFFFF;
        border: none;
        width: 100%;
        padding: 10px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        text-decoration: none;
        margin-top: auto;
        transition: all 0.2s ease;
    }
    .app-btn-fast-cart:hover {
        background: #00875A;
        color: #FFFFFF;
    }
</style>
@endpush

@section('content')
    <!-- Demo Switcher Top Bar -->
    @include('frontend.demo.includes.demo_switcher', ['activeConcept' => 6])

    <div class="container my-4">
        <!-- 1. LIVE STORY BUBBLES STRIP -->
        <div class="bg-white rounded-4 p-3 shadow-xs mb-4 border">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="fw-bold fs-6 text-dark"><i class="fa-solid fa-camera-retro text-danger me-1"></i> Nhật Ký Vườn Mẫu 24H</span>
                <span class="text-muted small">Vuốt để xem câu chuyện</span>
            </div>
            <div class="app-stories-scroll">
                <div class="app-story-item">
                    <div class="app-story-ring">
                        <img src="{{ asset('upload/images/slide/1659941826_843601.jpg') }}" alt="Vườn Bưởi" class="app-story-img">
                    </div>
                    <span class="app-story-label">Bưởi Bến Tre</span>
                </div>
                <div class="app-story-item">
                    <div class="app-story-ring">
                        <img src="{{ asset('upload/images/slide/1659942234_632056.jpg') }}" alt="Rau Thủy Canh" class="app-story-img">
                    </div>
                    <span class="app-story-label">Rau Củ Chi</span>
                </div>
                <div class="app-story-item">
                    <div class="app-story-ring">
                        <img src="{{ asset('upload/images/slide/1659941826_843601.jpg') }}" alt="Sầu Riêng" class="app-story-img">
                    </div>
                    <span class="app-story-label">Sầu Riêng</span>
                </div>
                <div class="app-story-item">
                    <div class="app-story-ring">
                        <img src="{{ asset('upload/images/slide/1659942234_632056.jpg') }}" alt="Kỹ Thuật Ủ" class="app-story-img">
                    </div>
                    <span class="app-story-label">Ủ Vi Sinh</span>
                </div>
                <div class="app-story-item">
                    <div class="app-story-ring">
                        <img src="{{ asset('upload/images/slide/1659941826_843601.jpg') }}" alt="Tưới Nhỏ Giọt" class="app-story-img">
                    </div>
                    <span class="app-story-label">Tưới Nhỏ Giọt</span>
                </div>
            </div>
        </div>

        <!-- 2. LIVE FLASH DROPS WIDGET -->
        <div class="app-flash-drop">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
                <div>
                    <span class="badge bg-warning text-dark px-3 py-1.5 rounded-pill fw-bold text-uppercase mb-1">
                        <i class="fa-solid fa-fire-flame-curved me-1"></i> FLASH DROP ĐỘC QUYỀN
                    </span>
                    <h2 class="fs-4 fw-bold mb-0 text-white">Deal Chớp Nhoáng Cho Nhà Vườn</h2>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="small opacity-90">Kết thúc trong:</span>
                    <span class="badge bg-dark text-white fs-6 px-3 py-2 rounded-3">02 : 45 : 12</span>
                </div>
            </div>
            <div class="row g-3">
                @foreach($products_hot->take(4) as $prod)
                    <div class="col-6 col-md-3">
                        <div class="bg-white rounded-4 p-2.5 text-dark shadow-sm">
                            <div class="rounded-3 overflow-hidden position-relative mb-2" style="height: 140px;">
                                <span class="badge bg-danger position-absolute top-2 start-2" style="top: 8px; left: 8px;">-40%</span>
                                <img src="{{ get_image($prod->image) }}" alt="{{ $prod->name }}" class="w-100 h-100 object-fit-cover">
                            </div>
                            <h4 class="fs-7 fw-bold mb-1 text-truncate">{{ $prod->name }}</h4>
                            <div class="fw-bold text-danger fs-6 mb-2">{{ number_format($prod->price ?? 0) }}đ</div>
                            <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="btn btn-danger btn-sm w-100 rounded-pill fw-bold">
                                Săn Ngay
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 3. MULTI-CATEGORY GRID WITH FAST CARTS -->
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fs-4 fw-bold text-dark mb-0">Tất Cả Vật Tư Nông Nghiệp</h2>
                    <span class="text-muted small">Cung ứng trực tiếp từ kho tổng Tam Nông</span>
                </div>
                <a href="{{ route('product') }}" class="btn btn-outline-success btn-sm rounded-pill fw-bold px-3">
                    Xem Thêm <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-3 g-md-4">
                @foreach($products_hot as $prod)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="app-prod-card">
                            <div class="app-prod-thumb">
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}">
                                    <img src="{{ get_image($prod->image) }}" alt="{{ $prod->name }}" loading="lazy">
                                </a>
                            </div>
                            <div class="app-prod-body">
                                <div class="text-warning small mb-1">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <span class="text-muted ms-1">(5.0)</span>
                                </div>
                                <h3 class="fw-bold fs-6 text-dark mb-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 2.6em;">
                                    <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="text-dark text-decoration-none">
                                        {{ $prod->name }}
                                    </a>
                                </h3>
                                <div class="d-flex align-items-baseline mb-3">
                                    <span class="fw-bold fs-5 text-dark">{{ number_format($prod->price ?? 0) }}đ</span>
                                </div>
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="app-btn-fast-cart">
                                    <i class="fa-solid fa-cart-shopping"></i> Thêm Giỏ Hàng
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
