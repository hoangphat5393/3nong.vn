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

    <!-- HEADER -->
    <header class="eco-header">
        <div class="container d-flex align-items-center justify-content-between gap-3">
            <a href="{{ route('home') }}" class="header-logo">
                <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông Eco Fresh" style="max-height: 52px;">
            </a>
            <div class="search-pill-box d-none d-md-block">
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" name="q" placeholder="Tìm kiếm thịt bê, heo rừng, gà đồi, chim trĩ...">
                    <button type="submit" aria-label="Tìm kiếm"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="tel:0938133830" class="btn btn-outline-success rounded-pill px-3 py-2 fw-bold text-dark d-flex align-items-center gap-2" style="border-color: var(--eco-forest);">
                    <i class="fa-solid fa-phone" style="color: var(--eco-forest);"></i> 0938.133.830
                </a>
            </div>
        </div>
    </header>

    <!-- NAVIGATION -->
    <nav class="eco-nav">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <a href="{{ route('demo.concept2') }}" class="eco-nav-link active"><i class="fa-solid fa-house me-1"></i> Trang Chủ</a>
                <a href="{{ route('product') }}" class="eco-nav-link">Thịt Bê Tơ</a>
                <a href="{{ route('product') }}" class="eco-nav-link">Heo Rừng F1</a>
                <a href="{{ route('product') }}" class="eco-nav-link">Gà Đồi & Gà Ác</a>
                <a href="{{ route('product') }}" class="eco-nav-link">Chim Trĩ Đỏ</a>
                <a href="#quy-trinh" class="eco-nav-link">Quy Trình 4 Bước</a>
                <a href="#b2b" class="eco-nav-link text-warning fw-bold"><i class="fa-solid fa-store me-1"></i> Báo Giá Sỉ Nhà Hàng</a>
            </div>
        </div>
    </nav>

    <!-- MAIN BODY -->
    <main class="container my-4">
        <!-- 1. HERO BANNER -->
        <div class="eco-hero-box">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <div class="eco-badge"><i class="fa-solid fa-leaf"></i> NGUYÊN BẢN TỪ TRANG TRẠI HỮU CƠ</div>
                    <h1 class="eco-hero-title">Thực Phẩm Tươi Sạch<br><span style="color: var(--eco-emerald);">Chuẩn Farm-To-Table</span></h1>
                    <p class="text-muted mb-4 pe-lg-4">Mang nguồn thịt sạch chăn thả tự nhiên từ các nông trang xanh trực tiếp tới bàn ăn gia đình bạn. Sơ chế sạch sẽ, đóng gói hút chân không, bảo quản lạnh khép kín giữ trọn vị ngọt tươi thuần khiết.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#thuc-don" class="btn-eco-primary"><i class="fa-solid fa-basket-shopping"></i> Khám Phá Thực Đơn</a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-secondary rounded-pill px-4 py-3 fw-bold"><i class="fa-solid fa-phone me-1"></i> 0938.133.830</a>
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

        <!-- 3. ALL 12 PRODUCTS GRID -->
        <div id="san-pham" class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="badge bg-success-subtle text-success fw-bold px-3 py-1 rounded-pill mb-1">THỰC ĐƠN TƯƠI SẠCH</span>
                    <h2 class="fw-bold fs-3 text-dark mb-0">Tất Cả 12 Sản Phẩm Thịt Tươi Bán Chạy Nhất</h2>
                </div>
            </div>
            <div class="row g-3 g-md-4">
                @foreach($all_products as $prod)
                    @php
                        $currentPrice = (float)($prod->price ?? 100000);
                        $originalPrice = (!empty($prod->sale_price) && (float)$prod->sale_price > $currentPrice) ? (float)$prod->sale_price : round($currentPrice * 1.2, -3);
                        $discountPercent = round((($originalPrice - $currentPrice) / $originalPrice) * 100);
                        $unitText = !empty($prod->unit) ? $prod->unit : 'khay 500g';
                    @endphp
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="eco-prod-card">
                            <div class="eco-prod-thumb">
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}">
                                    <img src="{{ get_image($prod->image) }}" alt="{{ $prod->name }}">
                                </a>
                            </div>
                            <div class="d-flex flex-column flex-grow-1">
                                <span class="badge bg-success-subtle text-success fw-bold small align-self-start mb-1 px-2.5 py-1 rounded-pill">Tươi Sạch</span>
                                <h3 class="fw-bold fs-6 text-dark mb-1 text-truncate">
                                    <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="text-dark text-decoration-none">
                                        {{ $prod->name }}
                                    </a>
                                </h3>
                                <div class="d-flex align-items-baseline gap-2 mb-1">
                                    <span class="fw-bold text-dark fs-5" style="color: var(--eco-forest);">{{ number_format($currentPrice) }}đ</span>
                                    <span class="text-muted small text-decoration-line-through">{{ number_format($originalPrice) }}đ</span>
                                    <span class="badge bg-success-subtle text-success small fw-bold px-1.5 py-0.5 rounded">-{{ $discountPercent }}%</span>
                                </div>
                                <div class="text-muted small mb-3"><i class="fa-solid fa-scale-balanced me-1 text-success"></i> Quy cách: <span class="fw-semibold text-dark">{{ $unitText }}</span></div>
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="btn-eco-buy"><i class="fa-solid fa-bag-shopping me-1"></i> Đặt Hàng Ngay</a>
                            </div>
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
                        <h3 class="step-title">Giao Nhanh 2 Giờ</h3>
                        <p class="step-desc">Thùng xốp giữ nhiệt + đá gel giao hỏa tốc đến tận căn bếp gia đình hoặc nhà hàng.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. SECTION: BANNER B2B BÁO GIÁ SỈ CHO NHÀ HÀNG -->
        <div id="b2b" class="eco-b2b-box">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <span class="badge bg-warning text-dark fw-bold px-3 py-1.5 rounded-pill mb-2">DÀNH RIÊNG CHO ĐỐI TÁC</span>
                    <h3 class="fw-bold fs-2 text-white mb-2">Bạn Là Chủ Quán Nướng, Nhà Hàng Hay Quán Nhậu?</h3>
                    <p class="text-white-50 mb-0">Tam Nông cam kết nguồn cung thịt bê tơ, heo rừng lai, gà đồi ổn định quanh năm. Cung cấp theo quy cách riêng, xuất hóa đơn VAT đầy đủ và chính sách chiết khấu sỉ hấp dẫn nhất thị trường.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('contact') }}" class="eco-b2b-btn">
                        <i class="fa-solid fa-file-invoice-dollar me-2"></i> Nhận Báo Giá Sỉ Ngay
                    </a>
                </div>
            </div>
        </div>

        <!-- 6. SECTION: CẨM NANG ẨM THỰC NÔNG TRẠI -->
        @if(!empty($post_list) && count($post_list) > 0)
            <div class="mb-5">
                <div class="d-flex flex-wrap justify-content-between align-items-end mb-4 gap-3">
                    <div>
                        <span class="badge bg-success-subtle text-success fw-bold px-3 py-1.5 rounded-pill mb-1">GÓC ẨM THỰC</span>
                        <h2 class="fw-bold fs-3 text-dark mb-0">Bí Quyết Món Ngon Từ Trang Trại</h2>
                    </div>
                    <a href="{{ route('news') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3 py-1.5 fw-bold text-decoration-none">
                        Xem tất cả bài viết <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="row g-4">
                    @foreach($post_list->take(3) as $post)
                        <div class="col-md-4">
                            <a href="{{ route('news.detail', ['slug' => $post->slug, 'id' => $post->id]) }}" class="eco-news-card">
                                <div class="eco-news-thumb">
                                    <img src="{{ get_image($post->image) }}" alt="{{ $post->title ?? $post->name }}">
                                </div>
                                <div class="eco-news-body">
                                    <span class="eco-news-tag">Món Ngon Nông Trại</span>
                                    <h3 class="eco-news-title">{{ $post->title ?? $post->name }}</h3>
                                    <p class="eco-news-desc">{{ Str::limit(strip_tags($post->description ?? $post->content), 95) }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </main>

    <!-- FOOTER -->
    <footer class="eco-footer">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-lg-4">
                    <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông Eco Fresh" style="max-height: 52px; filter: brightness(0) invert(1);" class="mb-3">
                    <p class="small opacity-75 pe-lg-3">Tam Nông Eco Fresh — Cung cấp nguồn thực phẩm sạch, thịt tươi tự nhiên chuẩn quy trình khép kín Farm-To-Table.</p>
                </div>
                <div class="col-6 col-lg-2">
                    <h5 class="fw-bold fs-6 mb-3 text-white">Thực Phẩm</h5>
                    <ul class="list-unstyled small opacity-75">
                        <li class="mb-2"><a href="{{ route('product') }}">Thịt Bê Tơ</a></li>
                        <li class="mb-2"><a href="{{ route('product') }}">Heo Rừng F1</a></li>
                        <li class="mb-2"><a href="{{ route('product') }}">Gà Đồi Chạy Bộ</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-3">
                    <h5 class="fw-bold fs-6 mb-3 text-white">Cam Kết</h5>
                    <ul class="list-unstyled small opacity-75">
                        <li class="mb-2"><a href="{{ route('about') }}">Chuẩn Kiểm Dịch 100%</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}">Giao Nhanh 2H Thùng Xốp</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}">Chính Sách Khách Sỉ</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="fw-bold fs-6 mb-3 text-white">Hotline Nông Trại</h5>
                    <div class="fs-4 fw-bold text-warning mb-1">0938.133.830</div>
                    <p class="small opacity-75 mb-0">59 đường số 3, Thăng Long Home Hưng Phú, TP. Thủ Đức, TP.HCM</p>
                </div>
            </div>
            <div class="text-center pt-3 border-top border-secondary-subtle small opacity-50">
                © {{ date('Y') }} Tam Nông Eco Fresh • Mẫu 2
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- FLOATING CONTACT WIDGET - CONCEPT 2: ECO SOFT MINT SQUIRCLE -->
    <div class="floating-contact-eco">
        <!-- Zalo Squircle -->
        <a href="https://zalo.me/0938133830" target="_blank" rel="noopener" class="eco-fly-btn eco-btn-zalo" title="Tư Vấn Zalo Nông Trại">
            <span class="eco-tooltip"><i class="fa-solid fa-leaf text-success me-1"></i> Zalo Nông Trại: 0938.133.830</span>
            <div class="eco-pulse"></div>
            <span class="zalo-label">Zalo</span>
        </a>

        <!-- Hotline Squircle -->
        <a href="tel:0938133830" class="eco-fly-btn eco-btn-phone" title="Hotline Giao Tận Nơi">
            <span class="eco-tooltip"><i class="fa-solid fa-truck-fast text-warning me-1"></i> Giao 2H: 0938.133.830</span>
            <div class="eco-pulse"></div>
            <i class="fa-solid fa-phone-volume"></i>
        </a>

        <!-- Back to Top -->
        <button type="button" class="eco-fly-btn eco-btn-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" title="Lên đầu trang">
            <i class="fa-solid fa-arrow-up"></i>
        </button>
    </div>

</body>
</html>