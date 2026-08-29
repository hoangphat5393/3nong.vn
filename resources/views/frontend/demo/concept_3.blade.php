<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $seo['seo_title'] ?? 'Tam Nông - Sàn Thực Phẩm Tươi & Flash Sale Giờ Vàng' }}</title>
    <meta name="description" content="{{ $seo['seo_description'] ?? '' }}">
    <meta name="keywords" content="{{ $seo['seo_keyword'] ?? '' }}">
    <link rel="shortcut icon" href="{{ get_image(setting_option('favicon', setting_option('favicon_32'))) }}" type="image/x-icon">

    <!-- Google Fonts: Plus Jakarta Sans & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3 & FontAwesome Pro -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome_pro/css/all.min.css') }}">

    <!-- Compiled Demo SCSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo/demo-3.css') }}?v={{ time() }}">
</head>
<body>

    <!-- OFFCANVAS MOBILE NAVIGATION - MẪU 3: MODERN FOOD MART (FOOD HALL THEME) -->
    <div class="offcanvas offcanvas-start mart-offcanvas-menu" tabindex="-1" id="martMobileMenuOffcanvas" aria-labelledby="martMobileMenuOffcanvasLabel">
        <div class="offcanvas-header">
            <div class="d-flex align-items-center gap-2">
                <img src="/upload/images/logo/logo.png" alt="Tam Nông Food Mart" class="mobile-logo" style="filter: brightness(0) invert(1);">
                <span class="badge bg-warning text-dark fw-bold px-2 py-0.5 rounded-pill" style="font-size: 0.72rem;">FOOD MART</span>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Flash sale ticker -->
            <div class="mart-deal-ticker">
                <i class="fa-solid fa-bolt-lightning text-warning fs-6"></i>
                <span>FLASH SALE GIỜ VÀNG - GIẢM ĐẾN 30%</span>
            </div>

            <!-- Search input -->
            <div class="mart-search-input mb-3">
                <input type="text" placeholder="Tìm kiếm nhanh thực phẩm tươi...">
                <button type="button" aria-label="Tìm kiếm"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>

            <!-- Multi-level Quầy Hàng (Food Hall Stations) -->
            <ul class="mart-nav-list">
                <li class="mart-nav-item">
                    <a href="mau-3.html" class="mart-nav-link active">
                        <span><i class="fa-solid fa-store nav-icon"></i> Sảnh Chính Siêu Thị</span>
                    </a>
                </li>

                <!-- Cấp 1: Các Quầy Thực Phẩm Tươi (Accordion) -->
                <li class="mart-nav-item">
                    <a href="#collapseFoodStations" class="mart-nav-link" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseFoodStations">
                        <span><i class="fa-solid fa-utensils nav-icon"></i> Quầy Thịt Tươi & Đặc Sản</span>
                        <i class="fa-solid fa-chevron-right chevron-icon"></i>
                    </a>
                    <div class="collapse show" id="collapseFoodStations">
                        <ul class="mart-submenu-lv2">
                            <!-- Quầy 1: Thịt Bê -->
                            <li class="lv2-item">
                                <a href="#collapseMartBe" class="lv2-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseMartBe">
                                    <span>🥩 Quầy Thịt Bê Tươi Thả Cỏ</span>
                                    <i class="fa-solid fa-chevron-right chevron-icon"></i>
                                </a>
                                <div class="collapse" id="collapseMartBe">
                                    <ul class="mart-submenu-lv3">
                                        <li><a href="#thuc-don">• Bê Bó Giò Thượng Hạng</a></li>
                                        <li><a href="#thuc-don">• Bê Xối Xả Ướp Sẵn</a></li>
                                        <li><a href="#thuc-don">• Bê Rút Xương Tươi</a></li>
                                        <li><a href="#thuc-don">• Thăn Bê Cắt Lát Lẩu / Nướng</a></li>
                                    </ul>
                                </div>
                            </li>

                            <!-- Quầy 2: Heo Rừng -->
                            <li class="lv2-item">
                                <a href="#collapseMartHeo" class="lv2-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseMartHeo">
                                    <span>🐗 Quầy Heo Rừng Tự Nhiên F1</span>
                                    <i class="fa-solid fa-chevron-right chevron-icon"></i>
                                </a>
                                <div class="collapse" id="collapseMartHeo">
                                    <ul class="mart-submenu-lv3">
                                        <li><a href="#thuc-don">• Ba Rọi Heo Rừng Giòn Bì</a></li>
                                        <li><a href="#thuc-don">• Dựng Heo Khò Vàng</a></li>
                                        <li><a href="#thuc-don">• Nạm Sữa Giòn Giòn</a></li>
                                        <li><a href="#thuc-don">• Sườn Heo Rừng BBQ</a></li>
                                    </ul>
                                </div>
                            </li>

                            <!-- Quầy 3: Gà Đồi & Chim -->
                            <li class="lv2-item">
                                <a href="#collapseMartGa" class="lv2-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseMartGa">
                                    <span>🐔 Quầy Gà Đồi & Chim Đặc Sản</span>
                                    <i class="fa-solid fa-chevron-right chevron-icon"></i>
                                </a>
                                <div class="collapse" id="collapseMartGa">
                                    <ul class="mart-submenu-lv3">
                                        <li><a href="#thuc-don">• Gà Ta Thả Vườn</a></li>
                                        <li><a href="#thuc-don">• Gà Đồi Chạy Bộ</a></li>
                                        <li><a href="#thuc-don">• Gà Đen H'Mông Dinh Dưỡng</a></li>
                                        <li><a href="#thuc-don">• Chim Trĩ Đỏ Bổ Dưỡng</a></li>
                                        <li><a href="#thuc-don">• Thịt Chim Cút Tươi</a></li>
                                    </ul>
                                </div>
                            </li>

                            <!-- Quầy 4: Combo & Ướp Sẵn -->
                            <li class="lv2-item">
                                <a href="#collapseMartCombo" class="lv2-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseMartCombo">
                                    <span>🥘 Combo Tiết Kiệm & Lẩu Nướng</span>
                                    <i class="fa-solid fa-chevron-right chevron-icon"></i>
                                </a>
                                <div class="collapse" id="collapseMartCombo">
                                    <ul class="mart-submenu-lv3">
                                        <li><a href="#combos">• Set Lẩu Bê Chua Cay Gia Đình</a></li>
                                        <li><a href="#combos">• Set Nướng Heo Rừng BBQ</a></li>
                                        <li><a href="#combos">• Gà Nòi Ướp Sả Ớt Cay Nồng</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- 3. Flash Sale Giờ Vàng -->
                <li class="mart-nav-item">
                    <a href="#flash-sale" class="mart-nav-link">
                        <span><i class="fa-solid fa-fire text-danger nav-icon"></i> Flash Sale Giờ Vàng</span>
                        <span class="badge bg-danger text-white rounded-pill px-2 py-0.5 small">-30%</span>
                    </a>
                </li>

                <!-- 4. Bản Tin Nông Sản -->
                <li class="mart-nav-item">
                    <a href="#tin-tuc" class="mart-nav-link">
                        <span><i class="fa-solid fa-newspaper nav-icon"></i> Bản Tin Nông Sản 24H</span>
                    </a>
                </li>

                <!-- 5. Hỗ Trợ Đặt Hàng -->
                <li class="mart-nav-item">
                    <a href="tel:0938133830" class="mart-nav-link">
                        <span><i class="fa-solid fa-phone-volume nav-icon"></i> Hotline: 0938.133.830</span>
                    </a>
                </li>
            </ul>

            <!-- Footer trong Offcanvas -->
            <div class="mart-offcanvas-footer">
                <a href="tel:0938133830" class="mart-hotline-card">
                    <div class="hotline-icon"><i class="fa-solid fa-phone"></i></div>
                    <div>
                        <div class="hotline-text">Giao Thịt Lạnh Hỏa Tốc 2H:</div>
                        <div class="hotline-num">0938.133.830</div>
                    </div>
                </a>
                <a href="https://zalo.me/0938133830" target="_blank" rel="noopener" class="btn btn-danger w-100 rounded-pill fw-bold py-2 small d-flex align-items-center justify-content-center gap-2">
                    <i class="fa-solid fa-comment-dots"></i> Nhắn Tin Zalo Quầy Thịt
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
                    Đang xem: <strong>Mẫu 3: Modern Gourmet Food Hall</strong>
                </span>
            </div>
            <div class="d-flex flex-wrap gap-1.5 align-items-center">
                <a href="{{ route('demo.concept1') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem;">Mẫu 1 (Trắng Sứ)</a>
                <a href="{{ route('demo.concept2') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem;">Mẫu 2 (Soft Mint)</a>
                <a href="{{ route('demo.concept3') }}" class="btn btn-sm rounded-pill fw-bold btn-warning text-dark shadow" style="background-color: #FF5722; border-color: #FF5722; color: #fff !important;">Mẫu 3 (Food Hall)</a>
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

    <!-- MAIN HEADER -->
    <header class="mart-header">
        <div class="container d-flex align-items-center justify-content-between gap-2">
            <!-- Left: Hamburger (Mobile) & Logo -->
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-mart-mobile-menu d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#martMobileMenuOffcanvas" aria-controls="martMobileMenuOffcanvas" aria-label="Mở menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <a href="{{ route('home') }}"><img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông Food Mart" style="max-height: 44px;"></a>
            </div>

            <!-- Center: Search (Desktop) -->
            <div class="mart-search d-none d-lg-block">
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" name="q" placeholder="Tìm kiếm nhanh thực phẩm, thịt tươi, đặc sản...">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

            <!-- Right: Hotline CTA -->
            <div class="d-flex align-items-center gap-2">
                <a href="tel:0938133830" class="btn btn-warning rounded-pill px-3 py-1.5 fw-bold text-dark d-flex align-items-center gap-1.5 shadow-sm">
                    <i class="fa-solid fa-phone-volume"></i> <span class="d-none d-sm-inline">0938.133.830</span><span class="d-sm-none">Gọi Ngay</span>
                </a>
            </div>
        </div>
    </header>

    <!-- MART NAVIGATION -->
    <nav class="mart-nav d-none d-lg-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <a href="{{ route('demo.concept3') }}" class="mart-nav-link active"><i class="fa-solid fa-house me-1"></i> Trang Chủ</a>
                <a href="{{ route('product') }}" class="mart-nav-link">Thịt Bê Tươi</a>
                <a href="{{ route('product') }}" class="mart-nav-link">Thịt Chim Trĩ & Cút</a>
                <a href="{{ route('product') }}" class="mart-nav-link">Heo Rừng F1</a>
                <a href="{{ route('product') }}" class="mart-nav-link">Gà Đồi & Gà Ác</a>
                <a href="#flash-sale" class="mart-nav-link text-warning"><i class="fa-solid fa-bolt me-1"></i> Flash Sale Giờ Vàng</a>
                <a href="#combos" class="mart-nav-link">Combo Tiết Kiệm</a>
                <a href="#tin-tuc" class="mart-nav-link">Bản Tin Nông Sản</a>
            </div>
        </div>
    </nav>

    <!-- MAIN BODY -->
    <main class="container my-4">
        <!-- 1. MEGA HERO GRID -->
        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="mart-hero-main">
                    <span class="badge bg-danger text-uppercase px-3 py-2 rounded-pill fw-bold w-max mb-3">
                        <i class="fa-solid fa-fire me-1"></i> ĐẠI TIỆC THỊT TƯƠI MỖI NGÀY
                    </span>
                    <h1 class="display-6 fw-bold mb-3 text-white">
                        TAM NÔNG FOOD MART<br>
                        <span class="text-warning">GIẢM ĐẾN 30%</span> THỊT TƯƠI & ĐẶC SẢN
                    </h1>
                    <p class="text-white opacity-75 mb-4 small">
                        Thịt bê tươi, heo rừng, gà đồi, chim trĩ đóng gói sạch sẽ. Miễn phí vận chuyển nội thành cho đơn hàng từ 300k.
                    </p>
                    <div>
                        <a href="#flash-sale" class="btn btn-warning btn-lg rounded-pill fw-bold px-4 text-dark shadow-sm">
                            <i class="fa-solid fa-bolt me-1"></i> Săn Deal Thịt Tươi
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex flex-column gap-3">
                <div class="mart-sub-banner" style="background: linear-gradient(135deg, #059669 0%, #047857 100%);">
                    <div>
                        <span class="badge bg-light text-dark fw-bold mb-2">MÓN ĂN LIỀN</span>
                        <h4 class="fw-bold fs-5 mb-1">Bê Bó Giò Thượng Hạng</h4>
                        <p class="small opacity-90 mb-0">Giòn ngon sần sật, ăn liền tiện lợi</p>
                    </div>
                    <a href="{{ route('product') }}" class="text-white fw-bold small text-decoration-none mt-3">Xem chi tiết <i class="fa-solid fa-arrow-right ms-1"></i></a>
                </div>
                <div class="mart-sub-banner" style="background: linear-gradient(135deg, #D97706 0%, #B45309 100%);">
                    <div>
                        <span class="badge bg-light text-dark fw-bold mb-2">BỔ DƯỠNG SỨC KHỎE</span>
                        <h4 class="fw-bold fs-5 mb-1">Gà Ác & Chim Cút Tiềm</h4>
                        <p class="small opacity-90 mb-0">Tẩm ướp thảo mộc gia truyền</p>
                    </div>
                    <a href="{{ route('product') }}" class="text-white fw-bold small text-decoration-none mt-3">Khám phá ngay <i class="fa-solid fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>

        <!-- 2. FLASH SALE MODULE -->
        <div id="flash-sale" class="mart-flash-box">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
                <div class="d-flex align-items-center gap-3">
                    <h2 class="fs-4 fw-bold mb-0 text-white"><i class="fa-solid fa-bolt text-warning me-2"></i> GIỜ VÀNG THỊT TƯƠI</h2>
                    <div class="d-flex align-items-center gap-2">
                        <span class="small fw-semibold opacity-90 text-white">Kết thúc trong:</span>
                        <span class="mart-timer-num">03</span> :
                        <span class="mart-timer-num">14</span> :
                        <span class="mart-timer-num">55</span>
                    </div>
                </div>
                <a href="{{ route('product') }}" class="btn btn-light btn-sm rounded-pill fw-bold px-3 text-danger">Xem tất cả Flash Sale <i class="fa-solid fa-arrow-right ms-1"></i></a>
            </div>

            <div class="row g-3">
                @foreach($all_products->take(4) as $prod)
                    <div class="col-6 col-md-3">
                        <div class="mart-prod-card">
                            <div class="mart-prod-thumb">
                                <span class="badge-discount-tag">-25%</span>
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}">
                                    <img src="{{ get_image($prod->image) }}" alt="{{ $prod->name }}" loading="lazy">
                                </a>
                            </div>
                            <div class="mart-prod-body">
                                <h3 class="fw-bold fs-6 text-dark mb-1 text-truncate">
                                    <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="text-dark text-decoration-none">
                                        {{ $prod->name }}
                                    </a>
                                </h3>
                                <div class="mb-2">
                                    <span class="fw-bold text-danger fs-6">{{ number_format($prod->price ?? 0) }}đ</span>
                                </div>
                                <div class="mart-stock-bar">
                                    <div class="mart-stock-fill" style="width: 78%;"></div>
                                </div>
                                <div class="d-flex justify-content-between small text-muted mb-3">
                                    <span>Đã bán 78 suất</span>
                                    <span class="text-danger fw-bold">Sắp hết</span>
                                </div>
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="btn-mart-cart">
                                    <i class="fa-solid fa-cart-shopping"></i> Mua Ngay
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 3. SECTION: 4 ĐẶC QUYỀN MUA SẮM TẠI FOOD MART TAM NÔNG -->
        <div class="mart-perks-box">
            <div class="row g-4">
                <div class="col-6 col-lg-3">
                    <div class="perk-item">
                        <div class="perk-icon"><i class="fa-solid fa-shield-heart"></i></div>
                        <div>
                            <h4 class="perk-title">Bảo Hành Tươi Ngon</h4>
                            <p class="perk-desc">Đổi mới 100% nếu không tươi</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="perk-item">
                        <div class="perk-icon" style="background: #ECFDF5; color: #10B981;"><i class="fa-solid fa-knife-kitchen"></i></div>
                        <div>
                            <h4 class="perk-title">Miễn Phí Sơ Chế</h4>
                            <p class="perk-desc">Chặt miếng, lọc xương & ướp sẵn</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="perk-item">
                        <div class="perk-icon" style="background: #EFF6FF; color: #3B82F6;"><i class="fa-solid fa-truck-bolt"></i></div>
                        <div>
                            <h4 class="perk-title">Giao Nhanh 2 Giờ</h4>
                            <p class="perk-desc">Đóng thùng xốp + đá gel mát</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="perk-item">
                        <div class="perk-icon" style="background: #FEF3C7; color: #D97706;"><i class="fa-solid fa-credit-card"></i></div>
                        <div>
                            <h4 class="perk-title">Thanh Toán Linh Hoạt</h4>
                            <p class="perk-desc">COD, Chuyển khoản & QR Code</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. ALL 12 PRODUCTS GRID -->
        <div id="thuc-don" class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="badge bg-danger-subtle text-danger fw-bold px-3 py-1.5 rounded-pill mb-1">THỰC ĐƠN BÁN CHẠY</span>
                    <h2 class="fs-3 fw-bold text-dark mb-0">Tất Cả 12 Sản Phẩm Thịt Tươi Sạch</h2>
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
                        <div class="mart-prod-card">
                            <div class="mart-prod-thumb">
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}">
                                    <img src="{{ get_image($prod->image) }}" alt="{{ $prod->name }}" loading="lazy">
                                </a>
                            </div>
                            <div class="mart-prod-body">
                                <span class="badge bg-light text-dark fw-bold small align-self-start mb-1">Tươi Sạch</span>
                                <h3 class="fw-bold fs-6 text-dark mb-1 text-truncate">
                                    <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="text-dark text-decoration-none">
                                        {{ $prod->name }}
                                    </a>
                                </h3>
                                
<div class="d-flex align-items-baseline gap-2 mb-1">
    <span class="fw-bold text-danger fs-5">{{ number_format($salePrice) }}đ</span>
    <span class="text-muted small text-decoration-line-through">{{ number_format($originalPrice) }}đ</span>
    <span class="badge bg-danger text-white small fw-bold px-1.5 py-0.5 rounded">-{{ $discountPercent }}%</span>
</div>
<div class="text-muted small mb-2">Đơn vị: {{ $unitLabel }}</div>

                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="btn-mart-cart">
                                    <i class="fa-solid fa-cart-shopping"></i> Mua Ngay
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 5. TOP COMBO TIỆC & DEAL TIẾT KIỆM TUẦN -->
        <div id="combos" class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="badge bg-danger-subtle text-danger fw-bold px-3 py-1 rounded-pill mb-1">TIẾT KIỆM LÊN TỚI 80.000Đ</span>
                    <h2 class="fw-bold fs-3 text-dark mb-0">Combo Tiệc & Set Thực Phẩm Tiện Lợi</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="mart-combo-card">
                        <span class="combo-save-badge">TIẾT KIỆM 65K</span>
                        <div>
                            <span class="badge bg-success-subtle text-success fw-bold small mb-2 px-2.5 py-1 rounded-pill">Set 4 - 6 Người</span>
                            <h3 class="fw-bold fs-5 text-dark mb-1">Combo Tiệc Lẩu Gia Đình</h3>
                            <p class="text-muted small mb-2">Thực đơn lẩu bê & gà đồi trọn vị ấm cúng cuối tuần.</p>
                            <ul class="combo-items-list">
                                <li><i class="fa-solid fa-circle-check"></i> 1kg Thịt Bê Rút Xương Tươi</li>
                                <li><i class="fa-solid fa-circle-check"></i> 1 Con Gà Ta Thả Vườn (1.4kg)</li>
                                <li><i class="fa-solid fa-circle-check"></i> Tặng 1 gói Cốt Lẩu Nấm Thảo Mộc</li>
                            </ul>
                        </div>
                        <div>
                            <div class="d-flex align-items-baseline gap-2 mb-3">
                                <span class="fw-bold fs-4 text-danger">385.000đ</span>
                                <span class="text-muted small text-decoration-line-through">450.000đ</span>
                            </div>
                            <a href="tel:0938133830" class="btn-combo-buy"><i class="fa-solid fa-basket-shopping me-1"></i> Chọn Mua Combo</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mart-combo-card" style="border-color: #FED7AA;">
                        <span class="combo-save-badge">TIẾT KIỆM 50K</span>
                        <div>
                            <span class="badge bg-warning-subtle text-warning-emphasis fw-bold small mb-2 px-2.5 py-1 rounded-pill">Bán Chạy Nhất</span>
                            <h3 class="fw-bold fs-5 text-dark mb-1">Combo Nướng BBQ Sân Vườn</h3>
                            <p class="text-muted small mb-2">Đặc sản nướng than hoa thơm lừng giòn bì.</p>
                            <ul class="combo-items-list">
                                <li><i class="fa-solid fa-circle-check"></i> 1kg Ba Rọi Heo Rừng F1 Giòn Bì</li>
                                <li><i class="fa-solid fa-circle-check"></i> 500g Bê Xối Xả Ướp Sẵn Gia Vị</li>
                                <li><i class="fa-solid fa-circle-check"></i> Tặng 1 Chai Sốt Nướng BBQ Tam Nông</li>
                            </ul>
                        </div>
                        <div>
                            <div class="d-flex align-items-baseline gap-2 mb-3">
                                <span class="fw-bold fs-4 text-danger">320.000đ</span>
                                <span class="text-muted small text-decoration-line-through">370.000đ</span>
                            </div>
                            <a href="tel:0938133830" class="btn-combo-buy" style="background: #FF5722;"><i class="fa-solid fa-basket-shopping me-1"></i> Chọn Mua Combo</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mart-combo-card">
                        <span class="combo-save-badge">TIẾT KIỆM 80K</span>
                        <div>
                            <span class="badge bg-info-subtle text-info-emphasis fw-bold small mb-2 px-2.5 py-1 rounded-pill">Bồi Bổ Dưỡng Sinh</span>
                            <h3 class="fw-bold fs-5 text-dark mb-1">Combo Dinh Dưỡng Thượng Hạng</h3>
                            <p class="text-muted small mb-2">Món tiềm hầm phục hồi sinh lực cho cả nhà.</p>
                            <ul class="combo-items-list">
                                <li><i class="fa-solid fa-circle-check"></i> 1 Con Gà Đen H'Mông Quý Hiếm</li>
                                <li><i class="fa-solid fa-circle-check"></i> 2 Con Chim Trĩ Đỏ Nuôi Thả Đồi</li>
                                <li><i class="fa-solid fa-circle-check"></i> Tặng Set Thuốc Bắc Đảng Sâm Kỷ Tử</li>
                            </ul>
                        </div>
                        <div>
                            <div class="d-flex align-items-baseline gap-2 mb-3">
                                <span class="fw-bold fs-4 text-danger">410.000đ</span>
                                <span class="text-muted small text-decoration-line-through">490.000đ</span>
                            </div>
                            <a href="tel:0938133830" class="btn-combo-buy"><i class="fa-solid fa-basket-shopping me-1"></i> Chọn Mua Combo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 6. BẢN TIN NÔNG SẢN & MẸO MUA SẮM THÔNG MINH -->
        <div id="tin-tuc" class="mb-5">
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-4 gap-3">
                <div>
                    <span class="badge bg-warning text-dark fw-bold px-3 py-1 rounded-pill mb-1">CẬP NHẬT MỖI NGÀY</span>
                    <h2 class="fw-bold fs-3 text-dark mb-0">Bản Tin Nông Sản & Mẹo Mua Sắm</h2>
                </div>
                <a href="{{ route('news') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3 py-1.5 fw-bold text-decoration-none">
                    Xem tất cả bài viết <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-4">
                @if(isset($post_list) && count($post_list) > 0)
                    @foreach($post_list->take(3) as $post)
                        <div class="col-md-4">
                            <a href="{{ route('news.detail', ['slug' => $post->slug, 'id' => $post->id]) }}" class="mart-news-card">
                                <div class="mart-news-thumb">
                                    <img src="{{ get_image($post->image) }}" alt="{{ $post->title ?? $post->name }}">
                                </div>
                                <div class="mart-news-body">
                                    <span class="mart-news-tag">Thị Trường Hôm Nay</span>
                                    <h3 class="mart-news-title">{{ $post->title ?? $post->name }}</h3>
                                    <p class="mart-news-desc">{{ Str::limit(strip_tags($post->description ?? $post->content), 90) }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="mart-footer">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-lg-4">
                    <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông" style="max-height: 48px; filter: brightness(0) invert(1);" class="mb-3">
                    <p class="small opacity-75 pe-lg-3">Tam Nông Food Mart — Chuỗi siêu thị thực phẩm tươi sống chuẩn VietGAP, phục vụ bữa ăn an lành mỗi ngày.</p>
                </div>
                <div class="col-6 col-lg-2">
                    <h5 class="fw-bold fs-6 mb-3 text-white">Danh Mục</h5>
                    <ul class="list-unstyled small opacity-75">
                        <li class="mb-2"><a href="{{ route('product') }}" class="text-white text-decoration-none">Thịt Bê Tươi</a></li>
                        <li class="mb-2"><a href="{{ route('product') }}" class="text-white text-decoration-none">Heo Rừng F1</a></li>
                        <li class="mb-2"><a href="{{ route('product') }}" class="text-white text-decoration-none">Gà Đồi & Chim Trĩ</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-3">
                    <h5 class="fw-bold fs-6 mb-3 text-white">Chính Sách</h5>
                    <ul class="list-unstyled small opacity-75">
                        <li class="mb-2"><a href="{{ route('about') }}" class="text-white text-decoration-none">Chính Sách Giao Hàng 2H</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}" class="text-white text-decoration-none">Đổi Trả & Hoàn Tiền</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}" class="text-white text-decoration-none">Kiểm Dịch Nông Trại</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="fw-bold fs-6 mb-3 text-white">Hotline Mua Hàng</h5>
                    <div class="fs-4 fw-bold text-warning mb-1">0938.133.830</div>
                    <p class="small opacity-75 mb-0">59 đường số 3, Thăng Long Home Hưng Phú, Thủ Đức, TP.HCM</p>
                </div>
            </div>
            <div class="text-center pt-3 border-top border-secondary-subtle small opacity-50">
                © {{ date('Y') }} Tam Nông Food Mart • Mẫu 3
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- FLOATING CONTACT WIDGET - CONCEPT 3: FOOD HALL & FLASH MART -->
    <div class="floating-contact-foodhall">
        <!-- Live Open Badge -->
        <div class="foodhall-status-pill">
            <span class="live-dot"></span> Đang phục vụ 2H
        </div>

        <!-- Zalo Button -->
        <a href="https://zalo.me/0938133830" target="_blank" rel="noopener" class="foodhall-fly-btn btn-zalo" title="Chat Zalo Đặt Tiệc">
            <span class="foodhall-tooltip">Chat Zalo: 0938.133.830</span>
            <div class="btn-glow-ring"></div>
            <span class="zalo-bold">Zalo</span>
        </a>

        <!-- Hotline Button (Fire Gradient) -->
        <a href="tel:0938133830" class="foodhall-fly-btn btn-hotline" title="Hotline Báo Giá Sỉ">
            <span class="foodhall-tooltip">Hotline: 0938.133.830</span>
            <div class="btn-glow-ring"></div>
            <i class="fa-solid fa-phone-volume"></i>
        </a>

        <!-- Back to Top -->
        <button type="button" class="foodhall-fly-btn btn-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" title="Lên đầu trang">
            <i class="fa-solid fa-angles-up"></i>
        </button>
    </div>

</body>
</html>