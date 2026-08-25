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
                <a href="{{ route('demo.concept4') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem; border-color: #4ade80; color: #4ade80;"><i class="fa-solid fa-wand-magic-sparkles me-1"></i> Mẫu 4 (Bento)</a>
                <a href="{{ route('demo.concept5') }}" class="btn btn-sm rounded-pill fw-bold btn-outline-light" style="font-size: 0.8rem; border-color: #fde047; color: #fde047;"><i class="fa-solid fa-crown me-1"></i> Mẫu 5 (Bắc Âu)</a>
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
            <div class="d-flex align-items-center justify-content-between gap-3">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="header-logo">
                    <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông - Thực Phẩm Sạch">
                </a>

                <!-- Live Search Bar -->
                <div class="header-search d-none d-lg-block">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="q" placeholder="Tìm thịt bê, heo rừng, gà đồi, chim trĩ...">
                        <button type="submit" aria-label="Tìm kiếm"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>

                <!-- Contact & Cart Action -->
                <div class="d-flex align-items-center gap-3">
                    <div class="d-none d-sm-flex align-items-center gap-2">
                        <div class="rounded-circle p-2.5 d-flex align-items-center justify-content-center text-white" style="background: var(--tn-orange); width: 44px; height: 44px;">
                            <i class="fa-solid fa-phone-volume fs-5"></i>
                        </div>
                        <div>
                            <div class="text-muted small" style="font-size: 0.75rem;">Tư Vấn & Đặt Tiệc:</div>
                            <a href="tel:0938133830" class="fw-bold text-dark text-decoration-none fs-6">0938.133.830</a>
                        </div>
                    </div>
                    <a href="{{ route('cart') }}" class="btn btn-outline-success rounded-pill px-3 py-2 fw-bold d-flex align-items-center gap-2" style="border-color: var(--tn-green); color: var(--tn-green);">
                        <i class="fa-solid fa-basket-shopping fs-5"></i>
                        <span class="badge bg-danger rounded-pill">0</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- NAVIGATION MENU -->
    <nav class="site-nav">
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
                @foreach($products_hot as $prod)
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
                                <div class="d-flex align-items-baseline mb-3">
                                    <span class="food-price">{{ number_format($prod->price ?? 0) }}đ</span>
                                    @if(!empty($prod->sale_price) && $prod->sale_price > $prod->price)
                                        <span class="text-muted small text-decoration-line-through ms-2">{{ number_format($prod->sale_price) }}đ</span>
                                    @endif
                                </div>
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="btn-order-food">
                                    <i class="fa-solid fa-basket-shopping"></i> Đặt Mua Ngay
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 5. CHEF'S RECIPES / NEWS -->
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
    </main>

    <!-- MODERN 4-COLUMN FOOTER -->
    <footer class="site-footer">
        <div class="container">
            <div class="row g-4">
                <!-- Col 1: Brand Info -->
                <div class="col-lg-4">
                    <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông" class="img-fluid mb-3" style="max-height: 54px;">
                    <p class="text-muted small pe-lg-3">
                        Tam Nông — Thương hiệu thực phẩm sạch hàng đầu, cung ứng thịt bê tươi, heo rừng, gà đồi và các món đặc sản nông trại chuẩn an toàn vệ sinh thực phẩm.
                    </p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="#" class="btn btn-sm btn-outline-success rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-danger rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-info rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>

                <!-- Col 2: Categories -->
                <div class="col-6 col-lg-2">
                    <h4 class="footer-title">Đặc Sản</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('product') }}">Thịt Bê Tươi Sạch</a></li>
                        <li><a href="{{ route('product') }}">Bê Bó Giò Thượng Hạng</a></li>
                        <li><a href="{{ route('product') }}">Ba Rọi Heo Rừng</a></li>
                        <li><a href="{{ route('product') }}">Gà Đồi & Gà HMông</a></li>
                        <li><a href="{{ route('product') }}">Chim Trĩ & Chim Cút</a></li>
                    </ul>
                </div>

                <!-- Col 3: Customer Service -->
                <div class="col-6 col-lg-2">
                    <h4 class="footer-title">Chính Sách</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('about') }}">Về Chúng Tôi</a></li>
                        <li><a href="{{ route('contact') }}">Chính Sách Vận Chuyển</a></li>
                        <li><a href="{{ route('contact') }}">Đổi Trả & Hoàn Tiền</a></li>
                        <li><a href="{{ route('contact') }}">Báo Giá Sỉ Nhà Hàng</a></li>
                        <li><a href="{{ route('contact') }}">Kiểm Định Vệ Sinh</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact & Map -->
                <div class="col-lg-4">
                    <h4 class="footer-title">Thông Tin Liên Hệ</h4>
                    <p class="text-muted small mb-2">
                        <i class="fa-solid fa-location-dot text-danger me-2"></i> 59 đường số 3, Thăng Long Home Hưng Phú, P. Tam Bình, TP. Thủ Đức, TP.HCM
                    </p>
                    <p class="text-muted small mb-2">
                        <i class="fa-solid fa-phone text-success me-2"></i> Hotline: <strong class="text-dark">0938.133.830</strong>
                    </p>
                    <p class="text-muted small mb-3">
                        <i class="fa-solid fa-envelope text-primary me-2"></i> tamnong.corp@gmail.com
                    </p>
                    <div class="p-3 rounded-3" style="background: var(--tn-green-light); border: 1px dashed var(--tn-green);">
                        <span class="small fw-bold text-success d-block mb-1"><i class="fa-solid fa-clock me-1"></i> Giờ Mở Cửa Phục Vụ:</span>
                        <span class="small text-muted">06:00 - 20:00 hàng ngày (Cả Thứ 7 & CN)</span>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom text-center">
                © {{ date('Y') }} <strong>Tam Nông (3 Nông - 3nong.vn)</strong>. Bản quyền thuộc về Công ty TNHH Thực Phẩm Tam Nông.
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
