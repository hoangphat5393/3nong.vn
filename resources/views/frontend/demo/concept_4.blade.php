<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $seo['seo_title'] ?? 'Mẫu 4: Bento Grid & Glassmorphism — Tam Nông Thực Phẩm Sạch' }}</title>
    <meta name="description" content="{{ $seo['seo_description'] ?? '' }}">
    <meta name="keywords" content="{{ $seo['seo_keyword'] ?? '' }}">
    <link rel="shortcut icon" href="{{ get_image(setting_option('favicon', setting_option('favicon_32'))) }}" type="image/x-icon">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome_pro/css/all.min.css') }}">

    <!-- Compiled Demo SCSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo/demo-4.css') }}?v={{ time() }}">
</head>
<body>

    <!-- OFFCANVAS MOBILE NAVIGATION - MẪU 4: NEXTGEN BENTO BOX (GEOMETRIC TILES THEME) -->
    <div class="offcanvas offcanvas-start bento-offcanvas-menu" tabindex="-1" id="bentoOffcanvas" aria-labelledby="bentoOffcanvasLabel">
        <div class="offcanvas-header">
            <div class="d-flex align-items-center gap-2">
                <img src="/upload/images/logo/logo.png" alt="Tam Nông Bento" class="mobile-logo">
                <span class="bento-badge-mini">BENTO TILES</span>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Bento Search Tile -->
            <div class="bento-menu-card p-2" style="background: #F1F5F9;">
                <div class="input-group">
                    <input type="text" class="form-control border-0 bg-transparent" placeholder="Tìm bento thịt sạch...">
                    <button class="btn btn-dark rounded-3 px-3 py-1.5" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>

            <!-- Bento Tile 1: Trang Chủ -->
            <div class="bento-menu-card">
                <a href="mau-4.html" class="bento-menu-header-link">
                    <span><i class="fa-solid fa-house text-success me-2"></i> Trang Chủ Bento</span>
                    <span class="bento-tag bg-light">HOME</span>
                </a>
            </div>

            <!-- Bento Tile 2: Thịt Bê Tơ (Accordion) -->
            <div class="bento-menu-card">
                <a href="#collapseBentoBe" class="bento-menu-header-link" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseBentoBe">
                    <span>🥩 Bento Thịt Bê Tơ</span>
                    <i class="fa-solid fa-chevron-right chevron-icon"></i>
                </a>
                <div class="collapse show" id="collapseBentoBe">
                    <ul class="bento-sub-list">
                        <li><a href="#thuc-don">• Bê Bó Giò Thượng Hạng</a></li>
                        <li><a href="#thuc-don">• Bê Xối Xả Ướp Sẵn</a></li>
                        <li><a href="#thuc-don">• Bê Rút Xương Tươi Ngọt</a></li>
                        <li><a href="#thuc-don">• Thăn Bê Cắt Lát Mỏng</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bento Tile 3: Heo Rừng Lai F1 (Accordion) -->
            <div class="bento-menu-card">
                <a href="#collapseBentoHeo" class="bento-menu-header-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseBentoHeo">
                    <span>🐗 Bento Heo Rừng F1</span>
                    <i class="fa-solid fa-chevron-right chevron-icon"></i>
                </a>
                <div class="collapse" id="collapseBentoHeo">
                    <ul class="bento-sub-list">
                        <li><a href="#thuc-don">• Ba Rọi Heo Rừng Tự Nhiên</a></li>
                        <li><a href="#thuc-don">• Dựng Heo Khò Vàng Rơm</a></li>
                        <li><a href="#thuc-don">• Nạm Sữa Heo Giòn Rụm</a></li>
                        <li><a href="#thuc-don">• Sườn Heo Rừng BBQ</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bento Tile 4: Gà Đồi & Chim Sạch (Accordion) -->
            <div class="bento-menu-card">
                <a href="#collapseBentoGa" class="bento-menu-header-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseBentoGa">
                    <span>🐔 Bento Gà Đồi & Chim</span>
                    <i class="fa-solid fa-chevron-right chevron-icon"></i>
                </a>
                <div class="collapse" id="collapseBentoGa">
                    <ul class="bento-sub-list">
                        <li><a href="#thuc-don">• Gà Ta Thả Vườn Sạch</a></li>
                        <li><a href="#thuc-don">• Gà Đồi Chạy Bộ Núi</a></li>
                        <li><a href="#thuc-don">• Gà Đen H'Mông Dinh Dưỡng</a></li>
                        <li><a href="#thuc-don">• Chim Trĩ Đỏ Thượng Hạng</a></li>
                        <li><a href="#thuc-don">• Chim Cút Tươi Sơ Chế</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bento Quick Action Grid -->
            <div class="bento-action-grid">
                <a href="tel:0938133830" class="bento-quick-tile tile-call">
                    <i class="fa-solid fa-phone mb-1 d-block fs-5"></i>
                    0938.133.830
                </a>
                <a href="https://zalo.me/0938133830" target="_blank" rel="noopener" class="bento-quick-tile tile-zalo">
                    <i class="fa-solid fa-comment-dots mb-1 d-block fs-5"></i>
                    Chat Zalo
                </a>
            </div>
        </div>
    </div>

    <!-- TOP DEMO SWITCHER BAR (5 MẪU) -->
    <div class="demo-nav-top py-2 px-3 sticky-top shadow-lg" style="background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%); z-index: 999999; border-bottom: 2px solid #EAB308; font-family: 'Plus Jakarta Sans', sans-serif;">
        <div class="container-fluid d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-warning text-dark px-2.5 py-1 fw-bold text-uppercase rounded-pill">
                    <i class="fa-solid fa-layer-group me-1"></i> BẢN XEM THỬ GIAO DIỆN (5 MẪU)
                </span>
                <span class="text-white small d-none d-lg-inline">
                    Đang xem: <strong>Mẫu 4: Bento Grid & Chef Picks</strong>
                </span>
            </div>
            <div class="d-flex flex-wrap gap-1.5 align-items-center">
                <a href="{{ route('demo.concept1') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem;">Mẫu 1 (Trắng Sứ)</a>
                <a href="{{ route('demo.concept2') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem;">Mẫu 2 (Soft Mint)</a>
                <a href="{{ route('demo.concept3') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem;">Mẫu 3 (Food Hall)</a>
                {{-- [TẠM ẨN LINK MẪU 4]
<a href="{{ route('demo.concept4') }}" class="btn btn-sm rounded-pill fw-bold shadow" style="background-color: #22C55E; border-color: #22C55E; color: #000 !important;"><i class="fa-solid fa-wand-magic-sparkles me-1"></i> Mẫu 4 (Bento)</a>
--}}
                {{-- [TẠM ẨN LINK MẪU 5]
<a href="{{ route('demo.concept5') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem; border-color: #fde047; color: #fde047;"><i class="fa-solid fa-crown me-1"></i> Mẫu 5 (Bắc Âu)</a>
--}}
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary text-light rounded-pill ms-2" style="font-size: 0.8rem;"><i class="fa-solid fa-arrow-rotate-left"></i> Gốc</a>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <header class="bento-header">
        <div class="container d-flex align-items-center justify-content-between gap-2">
            <!-- Left: Hamburger (Mobile) & Logo -->
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-bento-menu d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#bentoOffcanvas" aria-controls="bentoOffcanvas" aria-label="Mở menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <a href="{{ route('home') }}" class="bento-logo">
                    <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông Bento" style="max-height: 44px;">
                </a>
            </div>

            <!-- Right: Nav & Hotline -->
            <div class="d-flex align-items-center gap-3">
                <nav class="d-none d-md-flex gap-4">
                    <a href="{{ route('home') }}" class="text-dark fw-bold text-decoration-none">Trang Chủ</a>
                    <a href="#thuc-don" class="text-muted fw-semibold text-decoration-none">Đặc Sản Bento</a>
                    <a href="#thuc-don" class="text-muted fw-semibold text-decoration-none">Thực Phẩm Hôm Nay</a>
                </nav>
                <a href="tel:0938133830" class="btn btn-dark rounded-pill px-3 py-1.5 fw-bold text-white shadow-sm d-flex align-items-center gap-1.5" style="background: var(--bento-dark); font-size: 0.88rem;">
                    <i class="fa-solid fa-phone text-warning"></i> <span class="d-none d-sm-inline">0938.133.830</span><span class="d-sm-none">Gọi</span>
                </a>
            </div>
        </div>
    </header>

    <!-- MAIN BENTO CONTAINER -->
    <main class="container my-4">
        <!-- 1. BENTO HERO GRID -->
        <div class="bento-grid mb-4">
            <!-- Box 1: Main Large Hero -->
            <div class="bento-card bento-hero">
                <div class="bento-badge mb-3"><i class="fa-solid fa-wand-magic-sparkles"></i> ĐẶC SẢN NÔNG TRẠI CHỌN LỌC</div>
                <h1 class="display-5 fw-black text-white mb-3">Thực Phẩm Sạch<br><span style="color: #4ade80;">Tươi Ngon Từ Nông Trại</span></h1>
                <p class="text-white opacity-90 mb-4 pe-lg-5">Nguồn thịt bê tươi, heo rừng, gà đồi, chim trĩ thả tự nhiên. Sơ chế sạch sẽ, đóng gói hút chân không, bảo quản lạnh giữ trọn độ ngọt tự nhiên.</p>
                <div class="d-flex gap-3">
                    <a href="#thuc-don" class="btn btn-success rounded-pill px-4 py-2.5 fw-bold" style="background: var(--bento-green); color: #0A2315; border: none;"><i class="fa-solid fa-basket-shopping me-1"></i> Khám Phá Thực Đơn</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light rounded-pill px-4 py-2.5 fw-bold">Đặt Tiệc / Giá Sỉ</a>
                </div>
            </div>

            <!-- Box 2: Fresh Morning Feature -->
            <div class="bento-card bento-feature">
                <span class="badge bg-dark text-white px-2.5 py-1 rounded-pill mb-2 align-self-start fw-bold">TƯƠI MỚI 100%</span>
                <h2 class="fw-bold fs-3 text-dark mb-2">Mỗi Sáng</h2>
                <p class="text-muted small mb-4">Thịt tươi mới nhập mỗi ngày từ các nông trại kiểm dịch nghiêm ngặt.</p>
                <div class="mt-auto d-flex align-items-center justify-content-between text-dark fw-bold small">
                    <span><i class="fa-solid fa-shield-check text-warning me-1"></i> Chuẩn Kiểm Dịch 100%</span>
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </div>
            </div>

            <!-- Box 3: Quick Food Prep -->
            <div class="bento-card bento-info">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="rounded-circle p-2.5 bg-success-subtle text-success fs-5"><i class="fa-solid fa-utensils"></i></div>
                    <div>
                        <h3 class="fw-bold fs-6 mb-0">Ướp Sẵn Gia Vị</h3>
                        <span class="text-muted small">Tiết kiệm 80% thời gian</span>
                    </div>
                </div>
                <p class="text-muted small mb-0">Gà nòi sả ớt, gà ác tiềm thuốc bắc, bê xối xả nấu ngay tiện lợi.</p>
            </div>

            <!-- Box 4: Fast Delivery -->
            <div class="bento-card bento-info">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="rounded-circle p-2.5 bg-primary-subtle text-primary fs-5"><i class="fa-solid fa-truck-fast"></i></div>
                    <div>
                        <h3 class="fw-bold fs-6 mb-0">Giao Tận Bếp 2H</h3>
                        <span class="text-muted small">Nội thành TP.HCM</span>
                    </div>
                </div>
                <p class="text-muted small mb-0">Thùng xốp giữ nhiệt + đá gel bảo quản chuẩn nhiệt độ mát.</p>
            </div>

            <!-- Box 5: Wholesale & Restaurant Supply -->
            <div class="bento-card bento-info">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="rounded-circle p-2.5 bg-warning-subtle text-warning-emphasis fs-5"><i class="fa-solid fa-store"></i></div>
                    <div>
                        <h3 class="fw-bold fs-6 mb-0">Cung Cấp Nhà Hàng</h3>
                        <span class="text-muted small">Nguồn hàng ổn định & giá sỉ</span>
                    </div>
                </div>
                <p class="text-muted small mb-0">Hợp đồng dài hạn, xuất hóa đơn VAT đầy đủ, chiết khấu hấp dẫn.</p>
            </div>
        </div>

        
        <!-- CHEF RECOMMENDATION BENTO BAR -->
        <div class="bento-chef-bar">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle p-2.5 d-flex align-items-center justify-content-center text-white" style="background: #0A2315; width: 48px; height: 48px;">
                    <i class="fa-solid fa-hat-chef fs-5 text-success"></i>
                </div>
                <div>
                    <h3 class="fw-bold fs-6 mb-0 text-dark">Bếp Trưởng Tam Nông Gợi Ý Hôm Nay</h3>
                    <span class="text-muted small">Chọn nhanh nguyên liệu sơ chế sạch chuẩn món tiệc</span>
                </div>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <a href="#thuc-don" class="chef-pill-btn active"><i class="fa-solid fa-pot-food me-1"></i> Lẩu Bê Thảo Mộc</a>
                <a href="#thuc-don" class="chef-pill-btn"><i class="fa-solid fa-fire me-1"></i> Heo Rừng Nướng Chao</a>
                <a href="#thuc-don" class="chef-pill-btn"><i class="fa-solid fa-mortar-pestle me-1"></i> Gà Đen Tiềm Thuốc Bắc</a>
                <a href="tel:0938133830" class="btn btn-dark btn-sm rounded-pill fw-bold px-3 ms-lg-2" style="background: #0A2315;">
                    <i class="fa-solid fa-phone me-1 text-warning"></i> Tư Vấn Thực Đơn
                </a>
            </div>
        </div>


        <!-- 2. 12 ALL PRODUCTS GRID -->
        <div id="thuc-don" class="mb-5 pt-3">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="badge bg-success-subtle text-success fw-bold px-3 py-1.5 rounded-pill mb-1">THỰC ĐƠN HÔM NAY</span>
                    <h2 class="fw-bold fs-3 text-dark mb-0">Tất Cả 12 Sản Phẩm Thịt Sạch Tuyển Chọn</h2>
                </div>
            </div>
            <div class="row g-3 g-md-4">
                @foreach($all_products as $prod)

@php
    $salePrice = (!empty($prod->sale_price) && $prod->sale_price > 0 && $prod->sale_price < $prod->price) ? $prod->sale_price : $prod->price;
    $originalPrice = (!empty($prod->sale_price) && $prod->sale_price > 0 && $prod->sale_price < $prod->price) ? $prod->price : ($prod->price > 0 ? round($prod->price * 1.18, -3) : 120000);
    $discountPercent = $originalPrice > $salePrice ? round((($originalPrice - $salePrice) / $originalPrice) * 100) : 15;
    $unitLabel = !empty($prod->unit) ? $prod->unit : '500g';
@endphp

                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="bento-prod-card">
                            <div class="bento-prod-thumb">
                                <span class="bento-prod-badge">Tươi Sạch</span>
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}">
                                    <img src="{{ get_image($prod->image) }}" alt="{{ $prod->name }}">
                                </a>
                            </div>
                            <div class="bento-prod-body">
                                <h3 class="bento-prod-title">
                                    <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="text-dark text-decoration-none">
                                        {{ $prod->name }}
                                    </a>
                                </h3>
                                
<div class="d-flex align-items-baseline gap-2 mb-1">
    <span class="bento-prod-price">{{ number_format($salePrice) }}đ</span>
    <span class="text-muted small text-decoration-line-through">{{ number_format($originalPrice) }}đ</span>
    <span class="badge bg-success text-dark fw-bold small px-1.5 py-0.5 rounded">-{{ $discountPercent }}%</span>
</div>
<div class="text-muted small mb-2"><i class="fa-solid fa-box-archive me-1"></i> {{ $unitLabel }}</div>

                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="bento-btn-buy">
                                    <i class="fa-solid fa-basket-shopping me-1"></i> Đặt Mua Ngay
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        
        <!-- BENTO PROOF STATS -->
        <div class="bento-stats-grid">
            <div class="bento-stat-card">
                <div class="stat-icon"><i class="fa-solid fa-shield-check"></i></div>
                <div class="stat-number">100%</div>
                <p class="stat-label">Kiểm dịch thú y nghiêm ngặt</p>
            </div>
            <div class="bento-stat-card">
                <div class="stat-icon" style="background: #EFF6FF; color: #3B82F6;"><i class="fa-solid fa-truck-bolt"></i></div>
                <div class="stat-number">15.000+</div>
                <p class="stat-label">Đơn hàng giao tận bếp đúng hẹn</p>
            </div>
            <div class="bento-stat-card">
                <div class="stat-icon" style="background: #FEF3C7; color: #D97706;"><i class="fa-solid fa-store"></i></div>
                <div class="stat-number">50+</div>
                <p class="stat-label">Nhà hàng & quán ăn đối tác sỉ</p>
            </div>
            <div class="bento-stat-card">
                <div class="stat-icon" style="background: #FDF2F8; color: #DB2777;"><i class="fa-solid fa-star"></i></div>
                <div class="stat-number">4.9 / 5</div>
                <p class="stat-label">Đánh giá hài lòng về độ ngọt tươi</p>
            </div>
        </div>


        <!-- 3. BENTO STORY & RECIPES BLOG -->
        <div class="mb-5">
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-4 gap-3">
                <div>
                    <span class="badge bg-success-subtle text-success fw-bold px-3 py-1.5 rounded-pill mb-1">GÓC ẨM THỰC BENTO</span>
                    <h2 class="fw-bold fs-3 text-dark mb-0">Bí Quyết Nấu Ngon Từ Bếp Trưởng</h2>
                </div>
                <a href="{{ route('news') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3 py-1.5 fw-bold text-decoration-none">
                    Xem tất cả bài viết <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-4">
                @if(isset($post_list) && count($post_list) > 0)
                    @foreach($post_list->take(3) as $post)
                        <div class="col-md-4">
                            <a href="{{ route('news.detail', ['slug' => $post->slug, 'id' => $post->id]) }}" class="bento-blog-card">
                                <div class="blog-thumb">
                                    <img src="{{ get_image($post->image) }}" alt="{{ $post->title ?? $post->name }}">
                                </div>
                                <div class="blog-body">
                                    <span class="blog-tag"><i class="fa-solid fa-pot-food me-1"></i> Bếp Nông Trại</span>
                                    <h3 class="blog-title">{{ $post->title ?? $post->name }}</h3>
                                    <p class="blog-desc">{{ Str::limit(strip_tags($post->description ?? $post->content), 95) }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </main>

    <!-- RICH 4-COLUMN BENTO FOOTER -->
    <footer class="bento-footer">
        <div class="container">
            <div class="row g-4 mb-4">
                <!-- Col 1 -->
                <div class="col-lg-4">
                    <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông" style="max-height: 52px; filter: brightness(0) invert(1);" class="mb-3">
                    <p class="small opacity-75 pe-lg-3">
                        Tam Nông Bento Food — Hệ thống cung ứng thịt tươi sạch và đặc sản nông trại chuẩn VietGAP, tiên phong mô hình sơ chế vô trùng & đóng gói hút chân không tiện lợi.
                    </p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="#" class="btn btn-sm btn-outline-light rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-light rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-light rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>

                <!-- Col 2 -->
                <div class="col-6 col-lg-2">
                    <h4 class="footer-title">Đặc Sản Bento</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('product') }}">Thịt Bê Tươi Sạch</a></li>
                        <li><a href="{{ route('product') }}">Bê Bó Giò Ăn Liền</a></li>
                        <li><a href="{{ route('product') }}">Ba Rọi Heo Rừng</a></li>
                        <li><a href="{{ route('product') }}">Gà Đồi Chạy Bộ</a></li>
                        <li><a href="{{ route('product') }}">Gà Đen H'Mông</a></li>
                        <li><a href="{{ route('product') }}">Chim Trĩ Đỏ Nuôi Đồi</a></li>
                    </ul>
                </div>

                <!-- Col 3 -->
                <div class="col-6 col-lg-3">
                    <h4 class="footer-title">Hỗ Trợ & Cam Kết</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('about') }}">Giới Thiệu Nông Trại</a></li>
                        <li><a href="{{ route('contact') }}">Giao Hàng Tận Bếp 2H</a></li>
                        <li><a href="{{ route('contact') }}">Bảo Hành Đổi Trả 24H</a></li>
                        <li><a href="{{ route('contact') }}">Báo Giá Sỉ Cho Nhà Hàng</a></li>
                        <li><a href="{{ route('contact') }}">Chứng Nhận Kiểm Dịch</a></li>
                    </ul>
                </div>

                <!-- Col 4 -->
                <div class="col-lg-3">
                    <h4 class="footer-title">Thông Tin Liên Hệ</h4>
                    <p class="small opacity-75 mb-2">
                        <i class="fa-solid fa-location-dot text-danger me-2"></i> 59 đường số 3, Thăng Long Home Hưng Phú, P. Tam Bình, TP. Thủ Đức, TP.HCM
                    </p>
                    <p class="small opacity-75 mb-2">
                        <i class="fa-solid fa-phone text-success me-2"></i> Hotline: <strong class="text-warning fs-6">0938.133.830</strong>
                    </p>
                    <p class="small opacity-75 mb-3">
                        <i class="fa-solid fa-envelope text-info me-2"></i> tamnong.corp@gmail.com
                    </p>
                    <div class="footer-hours-box">
                        <span class="small fw-bold text-success d-block mb-1"><i class="fa-solid fa-clock me-1"></i> Giờ Phục Vụ:</span>
                        <span class="small opacity-80">06:00 - 20:00 (Cả Thứ 7 & Chủ Nhật)</span>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="text-center pt-3 border-top border-secondary-subtle small opacity-60">
                © {{ date('Y') }} <strong>Tam Nông (3 Nông - 3nong.vn)</strong> • Mẫu 4: NextGen Bento Food & Chef Picks
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- FLOATING CONTACT WIDGET - CONCEPT 4: BENTO MODULAR CHIP -->
    <div class="floating-contact-bento">
        <!-- Zalo Bento Tile -->
        <a href="https://zalo.me/0938133830" target="_blank" rel="noopener" class="bento-fly-tile tile-zalo" title="Nhắn Zalo Bếp Trưởng">
            <span class="bento-badge">24/7</span>
            <span class="zalo-txt">Zalo</span>
            <span class="sub-txt">Tư Vấn</span>
        </a>

        <!-- Hotline Bento Tile -->
        <a href="tel:0938133830" class="bento-fly-tile tile-phone" title="Gọi Hotline Đặt Tiệc">
            <i class="fa-solid fa-phone-volume icon-call"></i>
            <span class="phone-num">0938.133.830</span>
        </a>

        <!-- Top Button -->
        <button type="button" class="bento-fly-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" title="Lên đầu trang">
            <i class="fa-solid fa-chevron-up"></i>
        </button>
    </div>

</body>
</html>
