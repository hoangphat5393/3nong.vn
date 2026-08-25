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

            <!-- TOP DEMO SWITCHER BAR (5 MẪU) -->
    <div class="demo-nav-top py-2 px-3 sticky-top shadow-lg" style="background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%); z-index: 999999; border-bottom: 2px solid #EAB308; font-family: 'Plus Jakarta Sans', sans-serif;">
        <div class="container-fluid d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-warning text-dark px-2.5 py-1 fw-bold text-uppercase rounded-pill">
                    <i class="fa-solid fa-layer-group me-1"></i> BẢN XEM THỬ GIAO DIỆN (5 MẪU)
                </span>
                <span class="text-white small d-none d-lg-inline">
                    Đang xem: <strong>Mẫu 3</strong>
                </span>
            </div>
            <div class="d-flex flex-wrap gap-1.5 align-items-center">
                <a href="{{ route('demo.concept1') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem;">Mẫu 1 (Trắng Sứ)</a>
                <a href="{{ route('demo.concept2') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem;">Mẫu 2 (Soft Mint)</a>
                <a href="{{ route('demo.concept3') }}" class="btn btn-sm rounded-pill fw-bold btn-warning text-dark shadow" style="background-color: #FF5722; border-color: #FF5722; color: #fff !important;">Mẫu 3 (Food Hall)</a>
                <a href="{{ route('demo.concept4') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem; border-color: #4ade80; color: #4ade80;"><i class="fa-solid fa-wand-magic-sparkles me-1"></i> Mẫu 4 (Bento)</a>
                <a href="{{ route('demo.concept5') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem; border-color: #fde047; color: #fde047;"><i class="fa-solid fa-crown me-1"></i> Mẫu 5 (Bắc Âu)</a>
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary text-light rounded-pill ms-2" style="font-size: 0.8rem;"><i class="fa-solid fa-arrow-rotate-left"></i> Gốc</a>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- MAIN HEADER -->
    <header class="mart-header">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between gap-3">
                <a href="{{ route('home') }}">
                    <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông Food Mart" style="max-height: 60px;">
                </a>

                <div class="mart-search d-none d-lg-block">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="q" placeholder="Tìm kiếm nhanh thực phẩm, thịt tươi, đặc sản...">
                        <button type="submit" aria-label="Tìm kiếm"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <a href="tel:0938133830" class="btn btn-warning rounded-pill px-3 py-2 fw-bold text-dark d-flex align-items-center gap-2">
                        <i class="fa-solid fa-phone-volume"></i> 0938.133.830
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- MART NAVIGATION -->
    <nav class="mart-nav">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <a href="{{ route('home') }}" class="mart-nav-link active"><i class="fa-solid fa-house me-1"></i> Trang Chủ</a>
                <a href="{{ route('product') }}" class="mart-nav-link">Thịt Bê Tươi</a>
                <a href="{{ route('product') }}" class="mart-nav-link">Thịt Chim Trĩ & Cút</a>
                <a href="{{ route('product') }}" class="mart-nav-link">Heo Rừng F1</a>
                <a href="{{ route('product') }}" class="mart-nav-link">Gà Đồi & Gà Ác</a>
                <a href="#flash-sale" class="mart-nav-link text-warning"><i class="fa-solid fa-bolt me-1"></i> Flash Sale Giờ Vàng</a>
                <a href="{{ route('contact') }}" class="mart-nav-link">Báo Giá Sỉ</a>
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
                        <span class="small fw-semibold opacity-90">Kết thúc trong:</span>
                        <span class="mart-timer-num">03</span> :
                        <span class="mart-timer-num">14</span> :
                        <span class="mart-timer-num">55</span>
                    </div>
                </div>
                <a href="{{ route('product') }}" class="btn btn-light btn-sm rounded-pill fw-bold px-3 text-danger">Xem tất cả Flash Sale <i class="fa-solid fa-arrow-right ms-1"></i></a>
            </div>

            <div class="row g-3">
                @foreach($products_hot->take(4) as $prod)
                    <div class="col-6 col-md-3">
                        <div class="mart-prod-card">
                            <div class="mart-prod-thumb">
                                <span class="badge-discount-tag">-25%</span>
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}">
                                    <img src="{{ get_image($prod->image) }}" alt="{{ $prod->name }}" loading="lazy">
                                </a>
                            </div>
                            <div class="mart-prod-body">
                                <h3 class="fw-bold fs-6 text-dark mb-1" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 2.6em;">
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

        <!-- 3. ALL PRODUCTS GRID -->
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fs-4 fw-bold text-dark mb-0">Thực Đơn Thịt Tươi Hôm Nay</h2>
                <a href="{{ route('product') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3">Xem Tất Cả</a>
            </div>

            <div class="row g-3 g-md-4">
                @foreach($products_hot as $prod)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="mart-prod-card">
                            <div class="mart-prod-thumb">
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}">
                                    <img src="{{ get_image($prod->image) }}" alt="{{ $prod->name }}" loading="lazy">
                                </a>
                            </div>
                            <div class="mart-prod-body">
                                <h3 class="fw-bold fs-6 text-dark mb-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 2.6em;">
                                    <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="text-dark text-decoration-none">
                                        {{ $prod->name }}
                                    </a>
                                </h3>
                                <div class="mb-3">
                                    <span class="fw-bold text-dark fs-6">{{ number_format($prod->price ?? 0) }}đ</span>
                                </div>
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="btn-mart-cart">
                                    <i class="fa-solid fa-cart-plus"></i> Thêm Giỏ Hàng
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- MART FOOTER -->
    <footer class="mart-footer">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-lg-4">
                    <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông" class="img-fluid mb-3" style="max-height: 52px; filter: brightness(0) invert(1);">
                    <p class="text-white opacity-75 small">
                        Tam Nông Food Mart — Sàn thực phẩm tươi sống, đặc sản thịt sạch giao nhanh 2h tại TP.HCM.
                    </p>
                </div>
                <div class="col-6 col-lg-2">
                    <h5 class="fw-bold mb-3 text-white">Danh Mục</h5>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ route('product') }}">Thịt Bê Tươi</a></li>
                        <li class="mb-2"><a href="{{ route('product') }}">Heo Rừng Sạch</a></li>
                        <li class="mb-2"><a href="{{ route('product') }}">Gà Đồi & Chim Cút</a></li>
                        <li class="mb-2"><a href="{{ route('product') }}">Món Ướp Sẵn</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h5 class="fw-bold mb-3 text-white">Hỗ Trợ</h5>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ route('about') }}">Về Tam Nông</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}">Chính Sách Giao Hàng</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}">Bảo Mật Thông Tin</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}">Liên Hệ Hotline</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3 text-white">Tổng Đài Đặt Hàng</h5>
                    <p class="text-white opacity-75 small mb-1"><i class="fa-solid fa-phone me-2"></i> Hotline: <strong class="text-warning">0938.133.830</strong></p>
                    <p class="text-white opacity-75 small mb-1"><i class="fa-solid fa-location-dot me-2"></i> 59 đường số 3, Thăng Long Home Hưng Phú, Tam Bình, Thủ Đức, TP.HCM</p>
                    <p class="text-white opacity-75 small"><i class="fa-solid fa-envelope me-2"></i> tamnong.corp@gmail.com</p>
                </div>
            </div>
            <div class="border-top border-secondary pt-3 text-center text-white opacity-50 small">
                © {{ date('Y') }} Tam Nông Food Mart. Đảm bảo vệ sinh an toàn thực phẩm.
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
