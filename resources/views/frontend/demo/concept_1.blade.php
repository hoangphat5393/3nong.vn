<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $seo['seo_title'] ?? 'Tam Nông - Thực Phẩm Sạch & Đặc Sản Thịt Tươi Nông Trại' }}</title>
    <meta name="description" content="{{ $seo['seo_description'] ?? '' }}">
    <meta name="keywords" content="{{ $seo['seo_keyword'] ?? '' }}">
    <link rel="shortcut icon" href="{{ get_image(setting_option('favicon', setting_option('favicon_32'))) }}" type="image/x-icon">

    <!-- Google Fonts: Plus Jakarta Sans & Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3 & FontAwesome Pro -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome_pro/css/all.min.css') }}">

        <!-- Compiled Demo SCSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo/demo-1.css') }}?v={{ time() }}">

</head>
<body>

    <!-- OFFCANVAS MOBILE NAVIGATION (XUẤT BÊN TRÁI - ĐỦ CÁC CẤP CHUYÊN MỤC) -->
    <div class="offcanvas offcanvas-start mobile-menu-offcanvas" tabindex="-1" id="mobileMenuOffcanvas" aria-labelledby="mobileMenuOffcanvasLabel">
        <div class="offcanvas-header">
            <a href="index.html" class="d-flex align-items-center">
                <img src="/upload/images/logo/logo.png" alt="Tam Nông Logo" class="mobile-logo">
            </a>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Search nhanh trong menu -->
            <div class="mobile-search-input mb-3">
                <input type="text" placeholder="Tìm thịt bê, heo rừng, gà đồi...">
                <button type="button" aria-label="Tìm kiếm"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>

            <!-- Danh sách menu đa cấp -->
            <ul class="mobile-nav-list">
                <!-- 1. Trang Chủ -->
                <li class="mobile-nav-item">
                    <a href="index.html" class="mobile-nav-link active">
                        <span><i class="fa-solid fa-house nav-icon"></i> Trang Chủ</span>
                    </a>
                </li>

                <!-- 2. Cấp 1: DANH MỤC THỰC PHẨM SẠCH (Accordion đa cấp) -->
                <li class="mobile-nav-item">
                    <a href="#collapseCategories" class="mobile-nav-link" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCategories">
                        <span><i class="fa-solid fa-utensils nav-icon"></i> Danh Mục Thực Phẩm</span>
                        <i class="fa-solid fa-chevron-right chevron-icon"></i>
                    </a>
                    
                    <!-- Cấp 2: Các Nhóm Chuyên Mục -->
                    <div class="collapse show" id="collapseCategories">
                        <ul class="mobile-submenu-lv2">
                            <!-- Cấp 2.1: Thịt Bê Tươi -->
                            <li class="lv2-item">
                                <a href="#collapseBeTuoi" class="lv2-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseBeTuoi">
                                    <span>🥩 Thịt Bê Tươi Thả Cỏ</span>
                                    <i class="fa-solid fa-chevron-right chevron-icon"></i>
                                </a>
                                <!-- Cấp 3: Sản phẩm chi tiết -->
                                <div class="collapse" id="collapseBeTuoi">
                                    <ul class="mobile-submenu-lv3">
                                        <li><a href="#san-pham">• Bê Bó Giò Thượng Hạng</a></li>
                                        <li><a href="#san-pham">• Bê Xối Xả Ướp Sẵn</a></li>
                                        <li><a href="#san-pham">• Bê Rút Xương Lọc Sạch</a></li>
                                        <li><a href="#san-pham">• Thịt Bê Thăn & Bắp Tơ</a></li>
                                    </ul>
                                </div>
                            </li>

                            <!-- Cấp 2.2: Heo Rừng F1 -->
                            <li class="lv2-item">
                                <a href="#collapseHeoRung" class="lv2-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseHeoRung">
                                    <span>🐗 Heo Rừng Lai F1</span>
                                    <i class="fa-solid fa-chevron-right chevron-icon"></i>
                                </a>
                                <!-- Cấp 3: Sản phẩm chi tiết -->
                                <div class="collapse" id="collapseHeoRung">
                                    <ul class="mobile-submenu-lv3">
                                        <li><a href="#san-pham">• Ba Rọi Heo Rừng Tự Nhiên</a></li>
                                        <li><a href="#san-pham">• Dựng Heo Khò Rơm</a></li>
                                        <li><a href="#san-pham">• Nạm Sữa Heo Giòn Ngọt</a></li>
                                        <li><a href="#san-pham">• Sườn Non Heo Rừng</a></li>
                                    </ul>
                                </div>
                            </li>

                            <!-- Cấp 2.3: Gà Đồi & Chim Sạch -->
                            <li class="lv2-item">
                                <a href="#collapseGiaCam" class="lv2-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseGiaCam">
                                    <span>🐔 Gà Đồi & Gia Cầm Sạch</span>
                                    <i class="fa-solid fa-chevron-right chevron-icon"></i>
                                </a>
                                <!-- Cấp 3: Sản phẩm chi tiết -->
                                <div class="collapse" id="collapseGiaCam">
                                    <ul class="mobile-submenu-lv3">
                                        <li><a href="#san-pham">• Gà Ta Thả Vườn</a></li>
                                        <li><a href="#san-pham">• Gà Đồi Chạy Bộ Sườn Núi</a></li>
                                        <li><a href="#san-pham">• Gà Đen H'Mông Dinh Dưỡng</a></li>
                                        <li><a href="#san-pham">• Chim Trĩ Đỏ Bổ Dưỡng</a></li>
                                        <li><a href="#san-pham">• Thịt Chim Cút Tươi Đóng Khay</a></li>
                                    </ul>
                                </div>
                            </li>

                            <!-- Cấp 2.4: Món Ướp Sẵn BBQ -->
                            <li class="lv2-item">
                                <a href="#collapseMonUop" class="lv2-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseMonUop">
                                    <span>🌶️ Món Ướp Sẵn Tiện Lợi</span>
                                    <i class="fa-solid fa-chevron-right chevron-icon"></i>
                                </a>
                                <!-- Cấp 3: Sản phẩm chi tiết -->
                                <div class="collapse" id="collapseMonUop">
                                    <ul class="mobile-submenu-lv3">
                                        <li><a href="#san-pham">• Gà Nòi Ướp Sả Ớt BBQ</a></li>
                                        <li><a href="#san-pham">• Bê Tơ Sa Tế Cay Nồng</a></li>
                                        <li><a href="#san-pham">• Sườn Heo Muối Ớt Rừng</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- 3. Flash Sale Giờ Vàng -->
                <li class="mobile-nav-item">
                    <a href="#san-pham" class="mobile-nav-link">
                        <span><i class="fa-solid fa-bolt-lightning text-danger nav-icon"></i> Flash Sale Giờ Vàng</span>
                        <span class="badge bg-danger text-white rounded-pill px-2 py-0.5 small">HOT</span>
                    </a>
                </li>

                <!-- 4. Góc Ẩm Thực & Mẹo Bếp -->
                <li class="mobile-nav-item">
                    <a href="#tin-tuc" class="mobile-nav-link">
                        <span><i class="fa-solid fa-book-open-reader nav-icon"></i> Góc Ẩm Thực & Mẹo Bếp</span>
                    </a>
                </li>

                <!-- 5. Cam Kết Vệ Sinh Chuỗi Lạnh -->
                <li class="mobile-nav-item">
                    <a href="#cam-ket" class="mobile-nav-link">
                        <span><i class="fa-solid fa-shield-halved nav-icon"></i> Chuỗi Lạnh & Kiểm Dịch</span>
                    </a>
                </li>

                <!-- 6. Liên Hệ / Đăng Ký Đại Lý -->
                <li class="mobile-nav-item">
                    <a href="tel:0938133830" class="mobile-nav-link">
                        <span><i class="fa-solid fa-headset nav-icon"></i> Liên Hệ / Hợp Tác Đại Lý</span>
                    </a>
                </li>
            </ul>

            <!-- Footer trong Offcanvas -->
            <div class="mobile-offcanvas-footer">
                <a href="tel:0938133830" class="mobile-hotline-card">
                    <div class="hotline-icon"><i class="fa-solid fa-phone"></i></div>
                    <div>
                        <div class="hotline-text">Hotline Đặt Hàng & Tư Vấn:</div>
                        <div class="hotline-num">0938.133.830</div>
                    </div>
                </a>
                <a href="https://zalo.me/0938133830" target="_blank" rel="noopener" class="btn btn-outline-primary w-100 rounded-pill fw-bold py-2 small d-flex align-items-center justify-content-center gap-2">
                    <span class="fw-bold">Zalo:</span> Nhắn Tin Trực Tiếp
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
                    Đang xem: <strong>Mẫu 1</strong>
                </span>
            </div>
            <div class="d-flex flex-wrap gap-1.5 align-items-center">
                <a href="{{ route('demo.concept1') }}" class="btn btn-sm rounded-pill fw-bold btn-success shadow" style="background-color: #5E9C3C; border-color: #5E9C3C;">Mẫu 1 (Trắng Sứ)</a>
                <a href="{{ route('demo.concept2') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem;">Mẫu 2 (Soft Mint)</a>
                <a href="{{ route('demo.concept3') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem;">Mẫu 3 (Food Hall)</a>
                {{-- [TẠM ẨN LINK MẪU 4]
<a href="{{ route('demo.concept4') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem; border-color: #4ade80; color: #4ade80;"><i class="fa-solid fa-wand-magic-sparkles me-1"></i> Mẫu 4 (Bento)</a>
--}}
                {{-- [TẠM ẨN LINK MẪU 5]
<a href="{{ route('demo.concept5') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem; border-color: #fde047; color: #fde047;"><i class="fa-solid fa-crown me-1"></i> Mẫu 5 (Bắc Âu)</a>
--}}
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary text-light rounded-pill ms-2" style="font-size: 0.8rem;"><i class="fa-solid fa-arrow-rotate-left"></i> Gốc</a>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- TOP ANNOUNCEMENT BAR -->
    <div class="top-bar d-none d-md-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <i class="fa-solid fa-truck-fast me-1 text-warning"></i> Giao thịt tươi tận bếp trong 2H nội thành TP.HCM • Đóng gói hút chân không an toàn 100%
            </div>
            <div class="d-flex gap-3">
                <span><i class="fa-solid fa-phone me-1"></i> Hotline: <strong>0938.133.830</strong></span>
                <span><i class="fa-solid fa-envelope me-1"></i> tamnong.corp@gmail.com</span>
            </div>
        </div>
    </div>

    <!-- MAIN HEADER -->
    <header class="site-header">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between gap-2">
                <!-- Left: Hamburger (Mobile) & Logo -->
                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-mobile-menu d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenuOffcanvas" aria-controls="mobileMenuOffcanvas" aria-label="Mở menu">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <a href="{{ route('home') }}" class="header-logo">
                        <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông - Thực Phẩm Sạch">
                    </a>
                </div>

                <!-- Center: Live Search Bar (Desktop) -->
                <div class="header-search d-none d-lg-block">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="q" placeholder="Tìm thịt bê, heo rừng, gà đồi, chim trĩ...">
                        <button type="submit" aria-label="Tìm kiếm"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>

                <!-- Right: Contact Action -->
                <div class="d-flex align-items-center gap-2">
                    <!-- Mobile Call Button -->
                    <a href="tel:0938133830" class="btn btn-sm text-white rounded-pill px-3 py-1.5 d-lg-none fw-bold d-flex align-items-center gap-1.5 shadow-sm" style="background: var(--tn-orange);">
                        <i class="fa-solid fa-phone"></i> <span>Gọi Ngay</span>
                    </a>
                    
                    <!-- Desktop Hotline -->
                    <div class="d-none d-lg-flex align-items-center gap-2">
                        <div class="rounded-circle p-2.5 d-flex align-items-center justify-content-center text-white shadow-sm" style="background: var(--tn-orange); width: 44px; height: 44px;">
                            <i class="fa-solid fa-phone-volume fs-5"></i>
                        </div>
                        <div>
                            <div class="text-muted small" style="font-size: 0.75rem;">Tư Vấn & Đặt Tiệc:</div>
                            <a href="tel:0938133830" class="fw-bold text-dark text-decoration-none fs-6">0938.133.830</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- NAVIGATION MENU -->
    <nav class="site-nav d-none d-lg-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-1">
                <a href="{{ route('product') }}" class="cat-dropdown-btn">
                    <i class="fa-solid fa-bars"></i> DANH MỤC THỰC PHẨM
                </a>
                <a href="{{ route('home') }}" class="nav-link-custom active">Trang Chủ</a>
                <a href="{{ route('product') }}" class="nav-link-custom">Thịt Bê Tươi</a>
                <a href="{{ route('product') }}" class="nav-link-custom">Heo Rừng</a>
                <a href="{{ route('product') }}" class="nav-link-custom">Gà Đồi & Chim Trĩ</a>
                <a href="{{ route('news') }}" class="nav-link-custom">Công Thức Món Ngon</a>
                <a href="{{ route('contact') }}" class="nav-link-custom">Liên Hệ / Đại Lý</a>
            </div>
            <div class="d-none d-xl-block">
                <span class="badge bg-warning-subtle text-warning-emphasis fw-bold px-3 py-2 rounded-pill">
                    <i class="fa-solid fa-certificate text-warning me-1"></i> Nông Trại Chuẩn VietGAP
                </span>
            </div>
        </div>
    </nav>

    <!-- MAIN BODY CONTENT -->
    <main class="container my-4">
        
        
        <!-- 1. HERO BANNER -->
        <div class="hero-banner">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="hero-badge">
                        <i class="fa-solid fa-drumstick-bite text-warning"></i> Nông Trại Tam Nông • Thịt Sạch Mỗi Ngày
                    </span>
                    <h1 class="hero-title">
                        Thực Phẩm Sạch<br>
                        <span style="color: #FED7AA;">Tươi Ngon Chuẩn Vị Gia Đình</span>
                    </h1>
                    <p class="lead text-white opacity-90 mb-4 fs-6 pe-lg-4">
                        Tam Nông chuyên cung cấp thịt bê tươi, heo rừng, gà đồi, chim trĩ và các món đặc sản ướp sẵn tiện lợi. Kiểm dịch 100%, hút chân không sạch sẽ, bảo quản lạnh tối ưu giữ trọn vị ngọt tự nhiên.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#san-pham" class="btn-cta-orange">
                            <i class="fa-solid fa-basket-shopping"></i> Mua Thực Phẩm Ngay
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-light rounded-pill px-4 py-3 fw-bold">
                            <i class="fa-solid fa-file-invoice-dollar me-1"></i> Báo Giá Sỉ Nhà Hàng
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block text-center">
                    <img src="{{ get_image(setting_option('logo')) }}" alt="3 Nông" class="img-fluid drop-shadow" style="max-height: 240px; filter: drop-shadow(0 15px 30px rgba(0,0,0,0.3));">
                </div>
            </div>
        </div>


        <!-- 2. 4 COMMITMENTS TRUST STRIP -->
        <div class="trust-strip-box">
            <div class="row g-4">
                <div class="col-6 col-lg-3">
                    <div class="trust-item-flex">
                        <div class="trust-icon-box"><i class="fa-solid fa-stamp"></i></div>
                        <div>
                            <div class="fw-bold fs-6 text-dark">Kiểm Dịch 100%</div>
                            <div class="text-muted small">Nguồn gốc trang trại rõ ràng</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="trust-item-flex">
                        <div class="trust-icon-box"><i class="fa-solid fa-box-tissue"></i></div>
                        <div>
                            <div class="fw-bold fs-6 text-dark">Hút Chân Không</div>
                            <div class="text-muted small">Vô trùng & giữ trọn độ tươi</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="trust-item-flex">
                        <div class="trust-icon-box"><i class="fa-solid fa-temperature-low"></i></div>
                        <div>
                            <div class="fw-bold fs-6 text-dark">Chuỗi Lạnh -2°C ~ 4°C</div>
                            <div class="text-muted small">Thịt săn chắc không chất bảo quản</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="trust-item-flex">
                        <div class="trust-icon-box"><i class="fa-solid fa-truck-fast"></i></div>
                        <div>
                            <div class="fw-bold fs-6 text-dark">Giao Tận Bếp 2H</div>
                            <div class="text-muted small">Kịp giờ nấu bữa cơm gia đình</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. 3D CATEGORIES GRID -->
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="badge bg-success-subtle text-success fw-bold px-3 py-1 rounded-pill mb-1">ĐẶC SẢN TUYỂN CHỌN</span>
                    <h2 class="fw-bold fs-3 text-dark mb-0">Danh Mục Thực Phẩm Nông Trại</h2>
                </div>
                <a href="{{ route('product') }}" class="btn btn-outline-success btn-sm rounded-pill fw-bold px-3">Xem Tất Cả <i class="fa-solid fa-arrow-right ms-1"></i></a>
            </div>
            <div class="row g-3">
                @php
                    $catIcons = ['fa-cow', 'fa-dove', 'fa-piggy-bank', 'fa-feather-pointed', 'fa-utensils', 'fa-bowl-food'];
                @endphp
                @foreach($cat_product->take(6) as $idx => $cat)
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="{{ route('product.category', ['slug' => $cat->slug]) }}" class="cat-item-card">
                            <div class="cat-icon-circle">
                                <i class="fa-solid {{ $catIcons[$idx % count($catIcons)] }}"></i>
                            </div>
                            <h3 class="cat-title-text">{{ $cat->name }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 4. HOT PRODUCTS SHOWCASE -->
        <div id="san-pham" class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="badge bg-danger-subtle text-danger fw-bold px-3 py-1 rounded-pill mb-1">MÓN NGON MỖI NGÀY</span>
                    <h2 class="fw-bold fs-3 text-dark mb-0">Thịt Tươi Sạch Bán Chạy Nhất</h2>
                </div>
                <a href="{{ route('product') }}" class="btn btn-outline-dark btn-sm rounded-pill fw-bold px-3">Toàn Bộ Thực Đơn <i class="fa-solid fa-arrow-right ms-1"></i></a>
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
                        <div class="food-product-card">
                            <div class="food-product-thumb">
                                <span class="badge-fresh-seal">Tươi Mới</span>
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}">
                                    <img src="{{ get_image($prod->image) }}" alt="{{ $prod->name }}" loading="lazy">
                                </a>
                            </div>
                            <div class="food-product-body">
                                <div class="text-warning small mb-1">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <span class="text-muted ms-1">(5.0)</span>
                                </div>
                                <h3 class="food-product-title">
                                    <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="text-dark text-decoration-none">
                                        {{ $prod->name }}
                                    </a>
                                </h3>
                                @php
    $currentPrice = (float)($prod->price ?? 100000);
    $originalPrice = (!empty($prod->sale_price) && (float)$prod->sale_price > $currentPrice) ? (float)$prod->sale_price : round($currentPrice * 1.2, -3);
    $discountPercent = round((($originalPrice - $currentPrice) / $originalPrice) * 100);
    $unitText = !empty($prod->unit) ? $prod->unit : '500g';
@endphp
<div class="d-flex align-items-baseline gap-2 mb-1">
    <span class="food-price text-danger fw-bold fs-5">{{ number_format($currentPrice) }}đ</span>
    <span class="text-muted small text-decoration-line-through">{{ number_format($originalPrice) }}đ</span>
    <span class="badge bg-danger-subtle text-danger small fw-bold px-1.5 py-0.5 rounded">-{{ $discountPercent }}%</span>
</div>
<div class="text-muted small mb-3"><i class="fa-solid fa-box-open me-1 text-success"></i> Quy cách: <span class="fw-semibold text-dark">{{ $unitText }}</span></div>
<a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="btn-order-food">
                                    <i class="fa-solid fa-basket-shopping"></i> Đặt Mua Ngay
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        
        <!-- BANNER ƯU ĐÃI HOTLINE TĨNH -->
        <div class="static-promo-banner my-5">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <span class="badge bg-warning text-dark px-3 py-1.5 rounded-pill fw-bold mb-3 d-inline-flex align-items-center gap-1.5">
                        <i class="fa-solid fa-gift text-danger"></i> ƯU ĐÃI ĐẶT THỊT TƯƠI HÔM NAY
                    </span>
                    <h3 class="fw-bold fs-2 text-white mb-2">
                        Tặng Ngay Gói Sốt Ướp Thảo Mộc Độc Quyền
                    </h3>
                    <p class="text-white-50 fs-6 mb-0 pe-lg-3">
                        Áp dụng tự động cho mọi đơn hàng thịt bê tơ, heo rừng hoặc gà đồi từ <strong>500.000đ</strong> khi liên hệ đặt qua Hotline hoặc Zalo. Hỗ trợ sơ chế chặt miếng & hút chân không vô trùng miễn phí!
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="d-flex flex-column gap-3 justify-content-lg-end">
                        <a href="tel:0938133830" class="btn btn-warning btn-lg rounded-pill fw-bold text-dark px-4 py-3 shadow-sm d-inline-flex align-items-center justify-content-center gap-2">
                            <i class="fa-solid fa-phone-volume fs-5 me-1"></i> 0938.133.830
                        </a>
                        <a href="https://zalo.me/0938133830" target="_blank" rel="noopener" class="btn btn-outline-light btn-lg rounded-pill fw-bold px-4 py-3 shadow-sm d-inline-flex align-items-center justify-content-center gap-2">
                            <i class="fa-solid fa-comment-dots fs-5 me-1"></i> Chat Zalo Tư Vấn
                        </a>
                    </div>
                </div>
            </div>
        </div>


        {{-- [TẠM ẨN: GÓC ẨM THỰC & MÃ ƯU ĐÃI]
        @if(!empty($post_list) && count($post_list) > 0)
            <div class="mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <span class="badge bg-warning-subtle text-warning-emphasis fw-bold px-3 py-1 rounded-pill mb-1">GÓC ẨM THỰC</span>
                        <h2 class="fw-bold fs-3 text-dark mb-0">Công Thức Nấu & Mẹo Bếp Tam Nông</h2>
                    </div>
                    <a href="{{ route('news') }}" class="btn btn-outline-success btn-sm rounded-pill fw-bold px-3">Xem Tất Cả Bài Viết <i class="fa-solid fa-arrow-right ms-1"></i></a>
                </div>
                <div class="row g-4">
                    @foreach($post_list->take(3) as $post)
                        <div class="col-md-4">
                            <div class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden" style="background: #FFFFFF;">
                                <img src="{{ get_image($post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                                <div class="card-body p-4 d-flex flex-column">
                                    <span class="text-success small fw-bold mb-2">
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
    
        <!-- 5. SECTION: MÃ ƯU ĐÃI CHO BỮA ĂN ĐẦU TIÊN -->
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="badge bg-warning-subtle text-warning-emphasis fw-bold px-3 py-1 rounded-pill mb-1">TIẾT KIỆM HÔM NAY</span>
                    <h2 class="fw-bold fs-3 text-dark mb-0">Mã Ưu Đãi Đặt Hàng Trực Tuyến</h2>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="voucher-card">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge bg-danger text-white fw-bold px-2.5 py-1 rounded-pill small">ĐƠN ĐẦU TIÊN</span>
                                <span class="text-muted small"><i class="fa-solid fa-clock me-1"></i> Hạn: Còn 50 lượt</span>
                            </div>
                            <h3 class="fw-bold fs-5 text-dark mb-1">Giảm Ngay 50.000đ</h3>
                            <p class="text-muted small mb-3">Áp dụng cho mọi đơn thực phẩm tươi từ 300.000đ khi đặt qua Hotline hoặc Web.</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <span class="voucher-code-badge">TAMNONG50</span>
                            <a href="tel:0938133830" class="btn btn-sm btn-outline-warning rounded-pill fw-bold text-dark px-3">Dùng Mã</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="voucher-card">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge bg-success text-white fw-bold px-2.5 py-1 rounded-pill small">FREESHIP 2H</span>
                                <span class="text-muted small"><i class="fa-solid fa-truck-fast me-1"></i> Toàn TP.HCM</span>
                            </div>
                            <h3 class="fw-bold fs-5 text-dark mb-1">Miễn Phí Vận Chuyển</h3>
                            <p class="text-muted small mb-3">Giao hỏa tốc 2 giờ kèm thùng giữ nhiệt và đá gel cho đơn hàng từ 500.000đ.</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <span class="voucher-code-badge">FREESHIP</span>
                            <a href="tel:0938133830" class="btn btn-sm btn-outline-warning rounded-pill fw-bold text-dark px-3">Dùng Mã</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="voucher-card">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge bg-warning text-dark fw-bold px-2.5 py-1 rounded-pill small">QUÀ TẶNG BẾP</span>
                                <span class="text-muted small"><i class="fa-solid fa-gift me-1"></i> Trị giá 35.000đ</span>
                            </div>
                            <h3 class="fw-bold fs-5 text-dark mb-1">Tặng Sốt Ướp Thảo Mộc</h3>
                            <p class="text-muted small mb-3">Tặng ngay 1 chai sốt ướp nướng/xào thảo mộc độc quyền Tam Nông khi mua thịt bê hoặc heo rừng.</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <span class="voucher-code-badge">QUATANG</span>
                            <a href="tel:0938133830" class="btn btn-sm btn-outline-warning rounded-pill fw-bold text-dark px-3">Dùng Mã</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        --}}

        <!-- 6. SECTION: KHÁCH HÀNG & ĐẦU BẾP NÓI GÌ VỀ TAM NÔNG -->
        <div class="mb-5">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="badge bg-success-subtle text-success fw-bold px-3 py-1.5 rounded-pill mb-2">TRẢI NGHIỆM THỰC TẾ</span>
                <h2 class="fw-bold fs-3 text-dark mb-2">Đánh Giá Từ Khách Hàng & Đầu Bếp</h2>
                <p class="text-muted small mb-0">Hơn 5.000+ gia đình và nhà hàng đã tin tưởng lựa chọn nguồn thịt tươi sạch từ nông trại Tam Nông</p>
            </div>
            <div class="row g-4">
                <!-- Review 1 -->
                <div class="col-md-4">
                    <div class="review-card">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                            <span class="badge bg-success-subtle text-success small fw-bold px-2 py-0.5 rounded-pill"><i class="fa-solid fa-check me-1"></i> Đã Mua Hàng</span>
                        </div>
                        <p class="review-text">"Thịt bê tơ cuộn bó giò ăn giòn sần sật, chấm tương gừng rất chuẩn vị. Đóng gói hút chân không sạch sẽ, giao đúng 11h kịp giờ mình nấu bữa trưa cho cả nhà."</p>
                        <div class="reviewer-info">
                            <div class="reviewer-avatar">NL</div>
                            <div>
                                <h4 class="fw-bold fs-6 text-dark mb-0">Chị Ngọc Lan</h4>
                                <span class="text-muted small">Nội trợ • Thảo Điền, TP. Thủ Đức</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="col-md-4">
                    <div class="review-card">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                            <span class="badge bg-warning-subtle text-warning-emphasis small fw-bold px-2 py-0.5 rounded-pill"><i class="fa-solid fa-store me-1"></i> Đối Tác Sỉ</span>
                        </div>
                        <p class="review-text">"Nguồn ba rọi heo rừng và gà đồi của Tam Nông rất ổn định, bì giòn chuẩn thịt nuôi thả tự nhiên chứ không bị mỡ nhiều như chợ. Khách quán mình khen thịt rất ngọt."</p>
                        <div class="reviewer-info">
                            <div class="reviewer-avatar" style="background: #FEF3C7; color: #B45309;">QT</div>
                            <div>
                                <h4 class="fw-bold fs-6 text-dark mb-0">Anh Quốc Tuấn</h4>
                                <span class="text-muted small">Chủ Quán Nướng Ngói BBQ • Q. Bình Thạnh</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="col-md-4">
                    <div class="review-card">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                            <span class="badge bg-primary-subtle text-primary small fw-bold px-2 py-0.5 rounded-pill"><i class="fa-solid fa-hat-chef me-1"></i> Bếp Trưởng</span>
                        </div>
                        <p class="review-text">"Gà đen H'Mông và chim trĩ đạt chuẩn kiểm dịch nghiêm ngặt. Thịt săn chắc, sơ chế kỹ không còn lông tơ. Gia vị tẩm ướp sẵn rất thơm và giữ được vị tự nhiên."</p>
                        <div class="reviewer-info">
                            <div class="reviewer-avatar" style="background: #DBEAFE; color: #1E40AF;">HN</div>
                            <div>
                                <h4 class="fw-bold fs-6 text-dark mb-0">Chef Hoàng Nam</h4>
                                <span class="text-muted small">Bếp Trưởng • Nhà Hàng Đặc Sản Đồng Quê</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 7. SECTION: CÂU HỎI THƯỜNG GẶP (FAQ) -->
        <div class="mb-5">
            <div class="row align-items-center g-4">
                <div class="col-lg-4">
                    <span class="badge bg-success-subtle text-success fw-bold px-3 py-1.5 rounded-pill mb-2">HỖ TRỢ TƯ VẤN</span>
                    <h2 class="fw-bold fs-3 text-dark mb-3">Câu Hỏi Thường Gặp Về Thực Phẩm Tam Nông</h2>
                    <p class="text-muted small mb-4">Bạn có thắc mắc về cách đóng gói, quy trình giao nhận hoặc chính sách đổi trả? Chúng tôi luôn sẵn sàng hỗ trợ 24/7.</p>
                    <a href="tel:0938133830" class="btn btn-outline-success rounded-pill px-4 py-2.5 fw-bold" style="border-color: var(--tn-green); color: var(--tn-green);">
                        <i class="fa-solid fa-phone me-1"></i> Hotline: 0938.133.830
                    </a>
                </div>

                <div class="col-lg-8">
                    <div class="faq-box">
                        <div class="accordion" id="faqAccordion">
                            <!-- Q1 -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa-solid fa-truck-snowflake text-success me-2"></i> 1. Thực phẩm được bảo quản và giao hàng như thế nào?
                                    </button>
                                </h3>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Toàn bộ thịt được đóng gói hút chân không vô trùng, bảo quản trong thùng xốp chuyên dụng kèm đá gel giữ nhiệt ở nhiệt độ mát -2°C đến 4°C trong suốt quá trình vận chuyển, đảm bảo giao tới bếp vẫn tươi ngon 100%.
                                    </div>
                                </div>
                            </div>

                            <!-- Q2 -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fa-solid fa-knife-kitchen text-warning me-2"></i> 2. Tôi có thể yêu cầu chặt khúc hoặc tẩm ướp sẵn theo ý muốn không?
                                    </button>
                                </h3>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Hoàn toàn được và <strong>MIỄN PHÍ 100%</strong>. Quý khách chỉ cần ghi chú hoặc dặn dò nhân viên khi đặt hàng: chặt miếng vừa ăn, thái mỏng nhúng lẩu, lọc rút xương hay ướp sẵn sả ớt, sốt BBQ... Tam Nông đều phục vụ chu đáo.
                                    </div>
                                </div>
                            </div>

                            <!-- Q3 -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fa-solid fa-rotate-left text-danger me-2"></i> 3. Chính sách đổi trả nếu thực phẩm không đạt chất lượng cam kết?
                                    </button>
                                </h3>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Tam Nông cam kết bảo hành chất lượng: nếu thịt không tươi, bị rách túi hút chân không hoặc không đúng quy cách cam kết, quý khách được <strong>ĐỔI MỚI MIỄN PHÍ hoặc HOÀN TIỀN 100%</strong> trong vòng 24 giờ.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- MODERN 4-COLUMN FOOTER -->
    
    <!-- FOOTER -->
    
    <!-- FOOTER -->
    <footer class="footer-vitality">
        <div class="container">
            <div class="row g-4 mb-5">
                <!-- Cột 1: Logo & Giới thiệu & Mạng xã hội -->
                <div class="col-lg-4 pe-lg-4">
                    <a href="{{ route('home') }}" class="d-inline-block mb-3">
                        <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông Thực Phẩm Sạch" class="footer-logo">
                    </a>
                    <p class="footer-desc mb-3">
                        Tam Nông — Thương hiệu thực phẩm sạch hàng đầu, cung ứng thịt bê tươi, heo rừng, gà đồi và các món đặc sản nông trại chuẩn an toàn vệ sinh thực phẩm.
                    </p>
                    <div class="social-links-wrap">
                        <a href="{{ setting_option('facebook', 'https://facebook.com') }}" target="_blank" rel="noopener" class="social-btn" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="{{ setting_option('youtube', 'https://youtube.com') }}" target="_blank" rel="noopener" class="social-btn" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                        <a href="{{ setting_option('tiktok', 'https://tiktok.com') }}" target="_blank" rel="noopener" class="social-btn" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>

                <!-- Cột 2: Đặc Sản -->
                <div class="col-6 col-lg-2">
                    <h5>Đặc Sản</h5>
                    <ul class="footer-list">
                        <li><a href="{{ route('product') }}">Thịt Bê Tươi Sạch</a></li>
                        <li><a href="{{ route('product') }}">Bê Bó Giò Thượng Hạng</a></li>
                        <li><a href="{{ route('product') }}">Ba Rọi Heo Rừng</a></li>
                        <li><a href="{{ route('product') }}">Gà Đồi & Gà H'Mông</a></li>
                        <li><a href="{{ route('product') }}">Chim Trĩ & Chim Cút</a></li>
                    </ul>
                </div>

                <!-- Cột 3: Chính Sách -->
                <div class="col-6 col-lg-2">
                    <h5>Chính Sách</h5>
                    <ul class="footer-list">
                        <li><a href="{{ route('about') }}">Về Chúng Tôi</a></li>
                        <li><a href="{{ route('about') }}">Chính Sách Vận Chuyển</a></li>
                        <li><a href="{{ route('contact') }}">Đổi Trả & Hoàn Tiền</a></li>
                        <li><a href="{{ route('contact') }}">Báo Giá Sỉ Nhà Hàng</a></li>
                        <li><a href="{{ route('about') }}">Kiểm Định Vệ Sinh</a></li>
                    </ul>
                </div>

                <!-- Cột 4: Thông Tin Liên Hệ & Giờ Mở Cửa -->
                <div class="col-lg-4 ps-lg-4">
                    <h5>Thông Tin Liên Hệ</h5>
                    <div class="contact-item">
                        <i class="fa-solid fa-location-dot text-danger"></i>
                        <span>59 đường số 3, Thăng Long Home Hưng Phú, P. Tam Bình, TP. Thủ Đức, TP.HCM</span>
                    </div>
                    <div class="contact-item">
                        <i class="fa-solid fa-phone text-success"></i>
                        <span>Hotline: <a href="tel:0938133830" class="fw-bold text-dark">0938.133.830</a></span>
                    </div>
                    <div class="contact-item">
                        <i class="fa-solid fa-envelope text-primary"></i>
                        <span><a href="mailto:tamnong.corp@gmail.com">tamnong.corp@gmail.com</a></span>
                    </div>
                    
                    <!-- Khung Giờ Mở Cửa Phục Vụ -->
                    <div class="opening-hours-card">
                        <div class="opening-title">
                            <i class="fa-solid fa-circle-check text-success"></i> Giờ Mở Cửa Phục Vụ:
                        </div>
                        <div class="opening-time">
                            06:00 – 20:00 hàng ngày (Cả Thứ 7 & CN)
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom text-center">
                © {{ date('Y') }} <strong>Tam Nông (3 Nông - 3nong.vn)</strong>. Bản quyền thuộc về Công ty TNHH Thực Phẩm Tam Nông.
            </div>
        </div>
    </footer>



    <!-- Bootstrap 5.3 JS -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- FLOATING CONTACT BUTTONS (FLY BUTTONS: ZALO & HOTLINE) -->
    <div class="floating-contact-wrap">
        <!-- Zalo Button (Pure Bold Text) -->
        <a href="https://zalo.me/0938133830" target="_blank" rel="noopener" class="fly-btn fly-btn-zalo" title="Chat Zalo Tư Vấn">
            <span class="fly-tooltip">Chat Zalo: 0938.133.830</span>
            <div class="fly-pulse"></div>
            <div class="fly-icon-inner">
                <span class="zalo-text-label">Zalo</span>
            </div>
        </a>

        <!-- Hotline Button -->
        <a href="tel:0938133830" class="fly-btn fly-btn-phone" title="Gọi Hotline Đặt Hàng">
            <span class="fly-tooltip">Hotline: 0938.133.830</span>
            <div class="fly-pulse"></div>
            <div class="fly-icon-inner">
                <i class="fa-solid fa-phone-volume"></i>
            </div>
        </a>

        <!-- Back to Top Button -->
        <button type="button" class="fly-btn fly-btn-top" id="btnBackToTop" title="Lên đầu trang" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
            <div class="fly-icon-inner">
                <i class="fa-solid fa-chevron-up"></i>
            </div>
        </button>
    </div>

</body>
</html>
