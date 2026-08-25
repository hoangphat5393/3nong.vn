<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $seo['seo_title'] ?? 'Mẫu 5: Nordic Minimalist Luxury Organic — Tam Nông Thực Phẩm Sạch' }}</title>
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
    <link rel="stylesheet" href="{{ asset('assets/css/demo/demo-5.css') }}?v={{ time() }}">

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
                    Đang xem: <strong>Mẫu 5</strong>
                </span>
            </div>
            <div class="d-flex flex-wrap gap-1.5 align-items-center">
                <a href="{{ route('demo.concept1') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem;">Mẫu 1 (Trắng Sứ)</a>
                <a href="{{ route('demo.concept2') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem;">Mẫu 2 (Soft Mint)</a>
                <a href="{{ route('demo.concept3') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem;">Mẫu 3 (Food Hall)</a>
                <a href="{{ route('demo.concept4') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem; border-color: #4ade80; color: #4ade80;"><i class="fa-solid fa-wand-magic-sparkles me-1"></i> Mẫu 4 (Bento)</a>
                <a href="{{ route('demo.concept5') }}" class="btn btn-sm rounded-pill fw-bold shadow" style="background-color: #D4AF37; border-color: #D4AF37; color: #000 !important;"><i class="fa-solid fa-crown me-1"></i> Mẫu 5 (Bắc Âu)</a>
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary text-light rounded-pill ms-2" style="font-size: 0.8rem;"><i class="fa-solid fa-arrow-rotate-left"></i> Gốc</a>
            </div>
        </div>
    </div>

    <!-- NORDIC TOP BAR -->
    <div class="nordic-topbar text-center py-2 border-bottom">
        <span class="small text-muted fw-semibold">Tam Nông Organic — Tinh hoa ẩm thực nông trại thuần khiết cho gia đình bạn</span>
    </div>

    <!-- NORDIC HEADER -->
    <header class="nordic-header">
        <div class="container text-center">
            <a href="{{ route('home') }}" class="nordic-brand mb-3 d-inline-block">
                <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông Nordic Organic" style="max-height: 58px;">
            </a>
            <div class="d-flex justify-content-center gap-4 border-top pt-3">
                <a href="{{ route('home') }}" class="text-dark fw-bold text-decoration-none small text-uppercase letter-spacing-1">Trang Chủ</a>
                <a href="{{ route('product') }}" class="text-muted fw-semibold text-decoration-none small text-uppercase letter-spacing-1">Thịt Bê Tươi</a>
                <a href="{{ route('product') }}" class="text-muted fw-semibold text-decoration-none small text-uppercase letter-spacing-1">Heo Rừng F1</a>
                <a href="{{ route('product') }}" class="text-muted fw-semibold text-decoration-none small text-uppercase letter-spacing-1">Gà Đồi & Chim Trĩ</a>
                <a href="{{ route('contact') }}" class="text-muted fw-semibold text-decoration-none small text-uppercase letter-spacing-1">Liên Hệ</a>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="container my-5">
        <!-- NORDIC HERO SECTION -->
        <div class="nordic-hero">
            <span class="nordic-tag mb-3 d-inline-block">THUẦN KHIẾT TỪ THIÊN NHIÊN</span>
            <h1 class="display-4 fw-light text-dark mb-4">Vị Ngọt Tự Nhiên<br><strong class="fw-bold">Chuẩn Vị Bếp Gia Đình</strong></h1>
            <p class="text-muted lead max-w-700 mx-auto mb-4 fs-6">Được nuôi thả tự nhiên trong môi trường sinh thái trong lành, thực phẩm Tam Nông mang đến trải nghiệm ẩm thực tinh tế, ngọt lành và an tâm trọn vẹn.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#san-pham" class="nordic-btn-primary"><i class="fa-solid fa-leaf me-1"></i> Khám Phá Thực Phẩm</a>
                <a href="tel:0938133830" class="nordic-btn-secondary"><i class="fa-solid fa-phone me-1"></i> 0938.133.830</a>
            </div>
        </div>

        <!-- 12 PRODUCTS MINIMAL GRID -->
        <div id="san-pham" class="mb-5 pt-4">
            <div class="text-center mb-5">
                <span class="nordic-tag mb-2 d-inline-block">BỘ SƯU TẬP ĐẶC SẢN</span>
                <h2 class="fw-bold fs-3 text-dark">Thực Phẩm Tươi Sạch Thượng Hạng</h2>
                <div style="width: 40px; height: 2px; background: var(--nordic-gold); margin: 16px auto 0;"></div>
            </div>
            <div class="row g-4 g-lg-5">
                @foreach($all_products as $p)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="nordic-card">
                            <div class="nordic-thumb">
                                <img src="{{ get_image($p->image) }}" alt="{{ $p->name }}">
                            </div>
                            <div class="nordic-body">
                                <span class="nordic-meta">Nông Trại Chuẩn Sạch</span>
                                <h3 class="nordic-title">{{ $p->name }}</h3>
                                <div class="nordic-price">{{ number_format($p->price) }}đ</div>
                                <a href="tel:0938133830" class="nordic-buy-btn"><i class="fa-solid fa-basket-shopping me-1"></i> Đặt Mua</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- NORDIC FOOTER -->
    <footer class="nordic-footer">
        <div class="container text-center">
            <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông" style="max-height: 50px;" class="mb-4">
            <p class="text-muted small max-w-600 mx-auto mb-4">Tam Nông — Tôn vinh giá trị thực phẩm sạch tự nhiên từ nông trại đến từng bữa cơm đầm ấm của mỗi gia đình Việt.</p>
            <div class="d-flex justify-content-center gap-4 mb-4 small">
                <a href="{{ route('about') }}" class="text-muted text-decoration-none">Về Chúng Tôi</a>
                <a href="{{ route('product') }}" class="text-muted text-decoration-none">Danh Mục Sản Phẩm</a>
                <a href="{{ route('contact') }}" class="text-muted text-decoration-none">Chính Sách Giao Hàng</a>
                <a href="{{ route('contact') }}" class="text-muted text-decoration-none">Hotline: 0938.133.830</a>
            </div>
            <div class="text-muted small border-top pt-3 opacity-75">
                © {{ date('Y') }} Tam Nông Nordic Organic • Mẫu 5
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>