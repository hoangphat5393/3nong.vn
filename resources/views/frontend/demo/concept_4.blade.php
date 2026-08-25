<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $seo['seo_title'] ?? 'Mẫu 4: Bento Grid & Glassmorphism — Tam Nông Thực Phẩm Sạch' }}</title>
    <meta name="description" content="{{ $seo['seo_description'] ?? '' }}">
    <meta name="keywords" content="{{ $seo['seo_keyword'] ?? '' }}">
    <link rel="shortcut icon" href="{{ get_image(setting_option('favicon', setting_option('favicon_32'))) }}"
        type="image/x-icon">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome_pro/css/all.min.css') }}">

        <!-- Compiled Demo SCSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo/demo-4.css') }}?v={{ time() }}">

</head>

<body>
    <!-- TOP DEMO SWITCHER BAR (5 MẪU) -->
    <div class="demo-nav-top py-2 px-3 sticky-top shadow-lg"
        style="background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%); z-index: 999999; border-bottom: 2px solid #EAB308; font-family: 'Plus Jakarta Sans', sans-serif;">
        <div class="container-fluid d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-warning text-dark px-2.5 py-1 fw-bold text-uppercase rounded-pill">
                    <i class="fa-solid fa-layer-group me-1"></i> BẢN XEM THỬ GIAO DIỆN (5 MẪU)
                </span>
                <span class="text-white small d-none d-lg-inline">
                    Đang xem: <strong>Mẫu 4</strong>
                </span>
            </div>
            <div class="d-flex flex-wrap gap-1.5 align-items-center">
                <a href="{{ route('demo.concept1') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light"
                    style="font-size: 0.8rem;">Mẫu 1 (Trắng Sứ)</a>
                <a href="{{ route('demo.concept2') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light"
                    style="font-size: 0.8rem;">Mẫu 2 (Soft Mint)</a>
                <a href="{{ route('demo.concept3') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light"
                    style="font-size: 0.8rem;">Mẫu 3 (Food Hall)</a>
                <a href="{{ route('demo.concept4') }}" class="btn btn-sm rounded-pill fw-bold shadow"
                    style="background-color: #22C55E; border-color: #22C55E; color: #000 !important;"><i
                        class="fa-solid fa-wand-magic-sparkles me-1"></i> Mẫu 4 (Bento)</a>
                <a href="{{ route('demo.concept5') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light"
                    style="font-size: 0.8rem; border-color: #fde047; color: #fde047;"><i
                        class="fa-solid fa-crown me-1"></i> Mẫu 5 (Bắc Âu)</a>
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary text-light rounded-pill ms-2"
                    style="font-size: 0.8rem;"><i class="fa-solid fa-arrow-rotate-left"></i> Gốc</a>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <header class="bento-header">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="bento-logo">
                <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông Bento">
            </a>
            <div class="d-flex align-items-center gap-3">
                <nav class="d-none d-md-flex gap-4">
                    <a href="{{ route('home') }}" class="text-dark fw-bold text-decoration-none">Trang Chủ</a>
                    <a href="{{ route('product') }}" class="text-muted fw-semibold text-decoration-none">Đặc Sản
                        Bento</a>
                    <a href="#thuc-don" class="text-muted fw-semibold text-decoration-none">Thực Phẩm Hôm Nay</a>
                </nav>
                <a href="tel:0938133830" class="btn btn-dark rounded-pill px-4 py-2 fw-bold text-white shadow-sm"
                    style="background: var(--bento-dark);">
                    <i class="fa-solid fa-phone me-1 text-warning"></i> 0938.133.830
                </a>
            </div>
        </div>
    </header>

    <!-- MAIN BENTO CONTAINER -->
    <main class="container my-4">
        <!-- BENTO HERO GRID -->
        <div class="bento-grid mb-4">
            <!-- Box 1: Main Large Hero -->
            <div class="bento-card bento-hero">
                <div class="bento-badge mb-3"><i class="fa-solid fa-wand-magic-sparkles"></i> ĐẶC SẢN NÔNG TRẠI CHỌN LỌC
                </div>
                <h1 class="display-5 fw-black text-white mb-3">Thực Phẩm Sạch<br><span style="color: #4ade80;">Tươi Ngon
                        Từ Nông Trại</span></h1>
                <p class="text-white opacity-90 mb-4 pe-lg-5">Nguồn thịt bê tươi, heo rừng, gà đồi, chim trĩ thả tự
                    nhiên. Sơ chế sạch sẽ, đóng gói hút chân không, bảo quản lạnh giữ trọn độ ngọt tự nhiên.</p>
                <div class="d-flex gap-3">
                    <a href="#thuc-don" class="btn btn-success rounded-pill px-4 py-2.5 fw-bold"
                        style="background: var(--bento-green); color: #0A2315; border: none;"><i
                            class="fa-solid fa-basket-shopping me-1"></i> Khám Phá Thực Đơn</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light rounded-pill px-4 py-2.5 fw-bold">Đặt
                        Tiệc / Giá Sỉ</a>
                </div>
            </div>

            <!-- Box 2: Fresh Morning Feature -->
            <div class="bento-card bento-feature">
                <span class="badge bg-dark text-white px-2.5 py-1 rounded-pill mb-2 align-self-start fw-bold">TƯƠI MỚI
                    100%</span>
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
                    <div class="rounded-circle p-2.5 bg-success-subtle text-success fs-5"><i
                            class="fa-solid fa-utensils"></i></div>
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
                    <div class="rounded-circle p-2.5 bg-primary-subtle text-primary fs-5"><i
                            class="fa-solid fa-truck-fast"></i></div>
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
                    <div class="rounded-circle p-2.5 bg-warning-subtle text-warning-emphasis fs-5"><i
                            class="fa-solid fa-store"></i></div>
                    <div>
                        <h3 class="fw-bold fs-6 mb-0">Cung Cấp Nhà Hàng</h3>
                        <span class="text-muted small">Nguồn hàng ổn định & giá sỉ</span>
                    </div>
                </div>
                <p class="text-muted small mb-0">Hợp đồng dài hạn, xuất hóa đơn VAT đầy đủ, chiết khấu hấp dẫn.</p>
            </div>
        </div>

        <!-- 12 ALL PRODUCTS GRID -->
        <div id="thuc-don" class="mb-5 pt-3">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="badge bg-success-subtle text-success fw-bold px-3 py-1.5 rounded-pill mb-1">THỰC ĐƠN
                        HÔM NAY</span>
                    <h2 class="fw-bold fs-3 text-dark mb-0">Tất Cả 12 Sản Phẩm Thịt Sạch Tuyển Chọn</h2>
                </div>
            </div>
            <div class="row g-3 g-md-4">
                @foreach ($all_products as $p)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="bento-prod-card">
                            <div class="bento-prod-thumb">
                                <span class="bento-prod-badge">Tươi Sạch</span>
                                <img src="{{ get_image($p->image) }}" alt="{{ $p->name }}">
                            </div>
                            <div class="bento-prod-body">
                                <h3 class="bento-prod-title">{{ $p->name }}</h3>
                                <div class="mb-3">
                                    <span class="bento-prod-price">{{ number_format($p->price) }}đ</span>
                                </div>
                                <a href="tel:0938133830" class="bento-btn-buy"><i
                                        class="fa-solid fa-basket-shopping me-1"></i> Đặt Mua Ngay</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bento-footer">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-lg-4">
                    <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông"
                        style="max-height: 48px; filter: brightness(0) invert(1);" class="mb-3">
                    <p class="small opacity-75 pe-lg-3">Tam Nông — Hệ thống phân phối thực phẩm nông trại sạch chuẩn
                        quy trình khép kín, tươi ngon chuẩn vị cho mọi gia đình.</p>
                </div>
                <div class="col-6 col-lg-2">
                    <h4 class="fw-bold fs-6 mb-3 text-white">Thực Phẩm</h4>
                    <ul class="list-unstyled small opacity-75">
                        <li class="mb-2"><a href="{{ route('product') }}"
                                class="text-white text-decoration-none">Thịt Bê Tươi</a></li>
                        <li class="mb-2"><a href="{{ route('product') }}"
                                class="text-white text-decoration-none">Ba Rọi Heo Rừng</a></li>
                        <li class="mb-2"><a href="{{ route('product') }}"
                                class="text-white text-decoration-none">Gà Đồi Chạy Bộ</a></li>
                        <li class="mb-2"><a href="{{ route('product') }}"
                                class="text-white text-decoration-none">Chim Trĩ Đỏ</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-3">
                    <h4 class="fw-bold fs-6 mb-3 text-white">Chính Sách</h4>
                    <ul class="list-unstyled small opacity-75">
                        <li class="mb-2"><a href="{{ route('about') }}"
                                class="text-white text-decoration-none">Giới Thiệu Nông Trại</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}"
                                class="text-white text-decoration-none">Giao Hàng Tận Bếp 2H</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}"
                                class="text-white text-decoration-none">Chính Sách Hoàn Tiền</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4 class="fw-bold fs-6 mb-3 text-white">Liên Hệ</h4>
                    <div class="fs-5 fw-bold text-warning mb-1">0938.133.830</div>
                    <p class="small opacity-75 mb-0">59 đường số 3, Thăng Long Home Hưng Phú, Tam Bình, Thủ Đức, TP.HCM
                    </p>
                </div>
            </div>
            <div class="text-center pt-3 border-top border-secondary-subtle small opacity-50">
                © {{ date('Y') }} Tam Nông Bento Box Food • Mẫu 4
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
