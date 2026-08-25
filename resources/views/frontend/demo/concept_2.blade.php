<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $seo['seo_title'] ?? 'Mẫu 2: Eco Fresh & Farm-To-Table — Tam Nông Thực Phẩm Sạch' }}</title>
    <meta name="description" content="{{ $seo['seo_description'] ?? '' }}">
    <meta name="keywords" content="{{ $seo['seo_keyword'] ?? '' }}">
    <link rel="shortcut icon" href="{{ get_image(setting_option('favicon', setting_option('favicon_32'))) }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3 & FontAwesome Pro -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome_pro/css/all.min.css') }}">

        <!-- Compiled Demo SCSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo/demo-2.css') }}?v={{ time() }}">

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
                    Đang xem: <strong>Mẫu 2: Eco Fresh & Farm-To-Table</strong>
                </span>
            </div>
            <div class="d-flex flex-wrap gap-1.5 align-items-center">
                <a href="{{ route('demo.concept1') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem;">Mẫu 1 (Trắng Sứ)</a>
                <a href="{{ route('demo.concept2') }}" class="btn btn-sm rounded-pill fw-bold btn-info text-white shadow" style="background-color: #10B981; border-color: #10B981; font-size: 0.8rem;">Mẫu 2 (Soft Mint)</a>
                <a href="{{ route('demo.concept3') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem;">Mẫu 3 (Food Hall)</a>
                <a href="{{ route('demo.concept4') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem; border-color: #4ade80; color: #4ade80;"><i class="fa-solid fa-wand-magic-sparkles me-1"></i> Mẫu 4 (Bento)</a>
                <a href="{{ route('demo.concept5') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem; border-color: #fde047; color: #fde047;"><i class="fa-solid fa-crown me-1"></i> Mẫu 5 (Bắc Âu)</a>
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary text-light rounded-pill ms-2" style="font-size: 0.8rem;"><i class="fa-solid fa-arrow-rotate-left"></i> Gốc</a>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <header class="eco-header">
        <div class="container d-flex align-items-center justify-content-between gap-3">
            <a href="{{ route('home') }}" class="header-logo">
                <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông Eco Food">
            </a>
            <div class="search-pill-box d-none d-lg-block">
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" name="q" placeholder="Tìm kiếm thịt bê, heo rừng, gà đồi, chim trĩ...">
                    <button type="submit" aria-label="Tìm kiếm"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="d-flex align-items-center gap-2">
                <div class="rounded-circle p-2 d-flex align-items-center justify-content-center text-white" style="background: var(--eco-emerald); width: 42px; height: 42px;">
                    <i class="fa-solid fa-phone fs-5"></i>
                </div>
                <div>
                    <div class="text-muted small" style="font-size: 0.75rem;">Hotline Nông Trại:</div>
                    <strong class="fs-6 text-dark">0938.133.830</strong>
                </div>
            </div>
        </div>
    </header>

    <!-- NAV -->
    <nav class="eco-nav">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <a href="{{ route('demo.concept2') }}" class="eco-nav-link active"><i class="fa-solid fa-house me-1"></i> Trang Chủ</a>
                <a href="{{ route('product') }}" class="eco-nav-link">Thịt Bê Nông Trại</a>
                <a href="{{ route('product') }}" class="eco-nav-link">Heo Rừng Thả Vườn</a>
                <a href="{{ route('product') }}" class="eco-nav-link">Gà Đồi & Chim Trĩ</a>
                <a href="#quy-trinh" class="eco-nav-link">Quy Trình 4 Bước</a>
                <a href="#cam-nang" class="eco-nav-link">Cẩm Nang Bếp Sạch</a>
                <a href="{{ route('contact') }}" class="eco-nav-link">Báo Giá Sỉ Nhà Hàng</a>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="container my-4">
        <!-- 1. HERO BOX -->
        <div class="eco-hero-box">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="eco-badge"><i class="fa-solid fa-shield-halved text-success"></i> CHUỖI CUNG ỨNG NÔNG TRẠI KHÉP KÍN</span>
                    <h1 class="eco-hero-title">Thịt Tươi Tự Nhiên<br>Đậm Đà Bữa Cơm Sạch</h1>
                    <p class="text-muted lead fs-6 mb-4 pe-lg-3">Gia súc gia cầm được chăn thả bán hoang dã tại nông trại Tam Nông. Quy trình sơ chế hút chân không vô trùng, bảo quản nhiệt độ mát -2°C đến 4°C giữ trọn vẹn vị tươi ngọt tự nhiên.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#san-pham" class="btn-eco-primary"><i class="fa-solid fa-drumstick-bite"></i> Đặt Mua Thực Phẩm</a>
                        <a href="#quy-trinh" class="btn btn-outline-success rounded-pill px-4 py-2.5 fw-bold" style="border-color: var(--eco-forest); color: var(--eco-forest);">Tìm Hiểu Quy Trình</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative rounded-4 overflow-hidden shadow-sm" style="height: 360px;">
                        <img src="{{ !empty($slides[0]) ? get_image($slides[0]['image']) : asset('upload/images/slide/1659942234_632056.jpg') }}" alt="Thịt sạch Tam Nông" class="w-100 h-100 object-fit-cover">
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. MEAL INSPIRATION FILTER -->
        <div id="thuc-don" class="meal-filter-box">
            <div class="text-center max-w-700 mx-auto mb-4">
                <span class="badge bg-success px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Gợi Ý Nấu Nướng</span>
                <h2 class="fw-bold fs-3 mb-2">Hôm Nay Bạn Muốn Nấu Món Gì?</h2>
            </div>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="#san-pham" class="meal-pill-item active"><i class="fa-solid fa-fire"></i> Thịt Nướng BBQ Cuối Tuần</a>
                <a href="#san-pham" class="meal-pill-item"><i class="fa-solid fa-bowl-food"></i> Lẩu Hơi & Hấp Gừng Sả</a>
                <a href="#san-pham" class="meal-pill-item"><i class="fa-solid fa-mortar-pestle"></i> Tiềm & Hầm Dinh Dưỡng</a>
            </div>
        </div>

        <!-- 3. ALL PRODUCTS -->
        <div id="san-pham" class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="badge bg-success-subtle text-success fw-bold px-3 py-1 rounded-pill mb-1">THỰC ĐƠN TƯƠI SẠCH</span>
                    <h2 class="fw-bold fs-3 text-dark mb-0">Đặc Sản Thịt Tươi Bán Chạy Nhất</h2>
                </div>
            </div>
            <div class="row g-3 g-md-4">
                @foreach($all_products as $p)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="eco-prod-card">
                            <div class="eco-prod-thumb">
                                <img src="{{ get_image($p->image) }}" alt="{{ $p->name }}">
                            </div>
                            <span class="badge bg-success-subtle text-success fw-bold small align-self-start mb-2 px-2.5 py-1 rounded-pill">Tươi Sạch</span>
                            <h3 class="fw-bold fs-6 text-dark mb-1">{{ $p->name }}</h3>
                            <div class="mb-3">
                                <span class="fw-bold fs-5" style="color: var(--eco-forest);">{{ number_format($p->price) }}đ</span>
                            </div>
                            <a href="tel:0938133830" class="btn-eco-buy"><i class="fa-solid fa-bag-shopping me-1"></i> Đặt Hàng Ngay</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 4. SECTION: QUY TRÌNH 4 BƯỚC FARM-TO-TABLE -->
        <div id="quy-trinh" class="mb-5 pt-3">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="badge bg-success px-3 py-1.5 rounded-pill fw-bold text-uppercase mb-2">CAM KẾT CHẤT LƯỢNG</span>
                <h2 class="fw-bold fs-3 text-dark mb-2">Quy Trình 4 Bước: Từ Nông Trại Đến Bàn Ăn</h2>
                <p class="text-muted small mb-0">Quy trình khép kín đảm bảo 100% độ tươi ngon và an toàn tuyệt đối cho sức khỏe gia đình bạn</p>
            </div>
            <div class="row g-4">
                <div class="col-6 col-lg-3">
                    <div class="process-step-card">
                        <span class="step-num-badge">BƯỚC 01</span>
                        <div class="step-icon-box"><i class="fa-solid fa-seedling"></i></div>
                        <h3 class="step-title">Chăn Thả Tự Nhiên</h3>
                        <p class="step-desc">Gia súc nuôi thả bán tự nhiên trên đồi cỏ, thức ăn hữu cơ, kiểm dịch thú y định kỳ.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="process-step-card">
                        <span class="step-num-badge">BƯỚC 02</span>
                        <div class="step-icon-box"><i class="fa-solid fa-box-tissue"></i></div>
                        <h3 class="step-title">Sơ Chế Vô Trùng</h3>
                        <p class="step-desc">Khò vàng rơm sạch lông, sơ chế trong phòng lạnh vô trùng, đóng gói hút chân không ngay.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="process-step-card">
                        <span class="step-num-badge">BƯỚC 03</span>
                        <div class="step-icon-box"><i class="fa-solid fa-temperature-low"></i></div>
                        <h3 class="step-title">Chuỗi Lạnh -2°C ~ 4°C</h3>
                        <p class="step-desc">Bảo quản ở dải nhiệt độ mát lý tưởng, giữ nguyên sớ thịt săn chắc và vị ngọt tự nhiên.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="process-step-card">
                        <span class="step-num-badge">BƯỚC 04</span>
                        <div class="step-icon-box"><i class="fa-solid fa-truck-fast"></i></div>
                        <h3 class="step-title">Giao Tận Bếp 2H</h3>
                        <p class="step-desc">Thùng xốp giữ nhiệt chuyên dụng kèm đá gel, giao hỏa tốc 2 giờ nội thành TP.HCM.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. SECTION: CẨM NANG NÔNG TRẠI & MẸO BẾP SẠCH -->
        <div id="cam-nang" class="mb-5 pt-3">
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-4 gap-3">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span style="width: 4px; height: 22px; background: var(--eco-emerald); border-radius: 99px; display: inline-block;"></span>
                        <h2 class="fw-bold fs-3 text-dark mb-0">Cẩm Nang Nông Trại & Mẹo Bếp Sạch</h2>
                    </div>
                    <p class="text-muted small mb-0 ps-3">Bí quyết chọn thịt tươi ngon và công thức nấu ăn chuẩn vị từ chuyên gia Tam Nông</p>
                </div>
                <a href="{{ route('news') }}" class="btn btn-outline-success btn-sm rounded-pill px-3 py-1.5 fw-bold text-decoration-none" style="border-color: var(--eco-forest); color: var(--eco-forest);">
                    Xem tất cả bài viết <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-4">
                @if(isset($post_list) && count($post_list) > 0)
                    @foreach($post_list->take(3) as $post)
                        <div class="col-md-4">
                            <a href="{{ route('news.detail', ['slug' => $post->slug, 'id' => $post->id]) }}" class="eco-news-card">
                                <div class="eco-news-thumb">
                                    <img src="{{ get_image($post->image) }}" alt="{{ $post->title ?? $post->name }}">
                                </div>
                                <div class="eco-news-body">
                                    <span class="eco-news-tag"><i class="fa-solid fa-leaf me-1"></i> Mẹo Ẩm Thực</span>
                                    <h3 class="eco-news-title">{{ $post->title ?? $post->name }}</h3>
                                    <p class="eco-news-desc">{{ Str::limit(strip_tags($post->description ?? $post->content), 95) }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- 6. SECTION: B2B / NHẬN BÁO GIÁ SỈ CHO NHÀ HÀNG -->
        <div id="bao-gia-si" class="eco-b2b-box">
            <div class="row align-items-center justify-content-between g-4">
                <div class="col-lg-8">
                    <span class="badge bg-success-subtle text-white border border-success fw-bold px-3 py-1.5 rounded-pill text-uppercase mb-2">
                        <i class="fa-solid fa-handshake me-1"></i> HỢP TÁC B2B & GIÁ SỈ NHÀ HÀNG
                    </span>
                    <h2 class="fw-bold fs-3 text-white mb-2">Bạn Là Nhà Hàng, Quán Ăn Hay Đặt Tiệc Gia Đình?</h2>
                    <p class="text-white opacity-85 small mb-0 pe-lg-3">Tam Nông cam kết nguồn cung thịt bê tươi, heo rừng, gia cầm ổn định số lượng lớn với chiết khấu tốt nhất, xuất hóa đơn VAT đầy đủ và giao hàng tận nơi mỗi sáng.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="tel:0938133830" class="eco-b2b-btn">
                        <i class="fa-solid fa-phone me-1"></i> Nhận Báo Giá Sỉ Ngay
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- RICH 4-COLUMN ECO FOOTER -->
    <footer id="lien-he" class="eco-footer">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-lg-4">
                    <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông Eco" style="max-height: 52px; filter: brightness(0) invert(1);" class="mb-3">
                    <p class="small opacity-80 pe-lg-3">Tam Nông Eco Food — Hệ sinh thái thực phẩm sạch từ nông trại đến bàn ăn, gìn giữ giá trị thuần khiết tự nhiên cho mọi gia đình.</p>
                </div>
                <div class="col-6 col-lg-2">
                    <h5 class="fw-bold fs-6 mb-3 text-white">Thực Phẩm</h5>
                    <ul class="list-unstyled small opacity-80">
                        <li class="mb-2"><a href="{{ route('product') }}">Thịt Bê Nông Trại</a></li>
                        <li class="mb-2"><a href="{{ route('product') }}">Thịt Chim Trĩ</a></li>
                        <li class="mb-2"><a href="{{ route('product') }}">Ba Rọi Heo Rừng</a></li>
                        <li class="mb-2"><a href="{{ route('product') }}">Gà Đồi Chạy Bộ</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-3">
                    <h5 class="fw-bold fs-6 mb-3 text-white">Chính Sách & Cam Kết</h5>
                    <ul class="list-unstyled small opacity-80">
                        <li class="mb-2"><a href="{{ route('about') }}">Chứng Nhận VietGAP</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}">Giao Hàng Tận Bếp 2H</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}">Chuỗi Lạnh Khép Kín</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}">Liên Hệ Hợp Tác</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="fw-bold fs-6 mb-3 text-white">Liên Hệ Nông Trại</h5>
                    <div class="fs-5 fw-bold text-warning mb-2">0938.133.830</div>
                    <p class="small opacity-80 mb-0">59 đường số 3, Thăng Long Home Hưng Phú, Tam Bình, Thủ Đức, TP.HCM</p>
                </div>
            </div>
            <div class="text-center pt-3 border-top border-success-subtle small opacity-75">
                © {{ date('Y') }} Tam Nông Eco Food • Mẫu 2: Eco Fresh & Farm-To-Table
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>