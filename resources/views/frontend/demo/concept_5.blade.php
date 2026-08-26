<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mẫu 5: Bắc Âu Minimalist Luxury Organic — Tam Nông</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo/demo-5.css') }}?v={{ time() }}">
</head>
<body>

    @include('frontend.demo.includes.demo_switcher', ['current' => 5])

    <!-- 1. TOP BAR ANNOUNCEMENT -->
    <div class="nordic-top-bar">
        Tam Nông Organic — Tinh hoa ẩm thực nông trại thuần khiết cho gia đình bạn
    </div>

    <!-- 2. SITE HEADER & NAVIGATION (SYNCED HEADER & MENU) -->
    <header class="nordic-header">
        <div class="container text-center">
            <a href="{{ route('demo.concept5') }}" class="nordic-logo d-inline-block">
                <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông Logo">
            </a>
            <nav class="nordic-nav-links">
                <a href="{{ route('home') }}" class="active">TRANG CHỦ</a>
                <a href="{{ route('product') }}">THỊT BÊ TƯƠI</a>
                <a href="{{ route('product') }}">HEO RỪNG F1</a>
                <a href="{{ route('product') }}">GÀ ĐỒI & CHIM TRĨ</a>
                <a href="{{ route('contact') }}">LIÊN HỆ</a>
            </nav>
        </div>
    </header>

    <!-- 3. MAIN CONTAINER -->
    <main class="container my-5">
        <!-- HERO BANNER -->
        <div class="nordic-hero">
            <span class="nordic-tag">THUẦN KHIẾT TỪ THIÊN NHIÊN</span>
            <h1 class="nordic-hero-title">Vị Ngọt Tự Nhiên<br>Chuẩn Vị Bếp Gia Đình</h1>
            <p class="nordic-hero-desc">
                Được nuôi thả tự nhiên trong môi trường sinh thái trong lành, thực phẩm Tam Nông mang đến trải nghiệm ẩm thực tinh tế, ngọt lành và an tâm trọn vẹn.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="#san-pham" class="nordic-btn-primary"><i class="fa-solid fa-leaf"></i> Khám Phá Thực Phẩm</a>
                <a href="tel:0938133830" class="nordic-btn-outline"><i class="fa-solid fa-phone"></i> 0938.133.830</a>
            </div>
        </div>

        <!-- 4. LƯỚI 12 SẢN PHẨM NORDIC (CẶP GIÁ + QUY CÁCH) -->
        <div id="san-pham">
            <div class="text-center mb-5">
                <span class="nordic-tag">BỘ SƯU TẬP NÔNG TRẠI</span>
                <h2 class="fw-bold fs-2 text-dark">Thực Phẩm Tươi Sạch Tuyển Chọn</h2>
            </div>

            <div class="row g-4">
                @foreach($all_products as $prod)
                    @php
                        $currentPrice = (float)($prod->price ?? 100000);
                        $originalPrice = (!empty($prod->sale_price) && (float)$prod->sale_price > $currentPrice) ? (float)$prod->sale_price : round($currentPrice * 1.2, -3);
                        $discountPercent = round((($originalPrice - $currentPrice) / $originalPrice) * 100);
                        $unitText = !empty($prod->unit) ? $prod->unit : '500g';
                    @endphp
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="nordic-product-card">
                            <div class="nordic-thumb">
                                <span class="nordic-seal">Tươi Sạch</span>
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}">
                                    <img src="{{ get_image($prod->image) }}" alt="{{ $prod->name }}" loading="lazy">
                                </a>
                            </div>
                            <div class="nordic-body">
                                <h3 class="nordic-title">
                                    <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}">
                                        {{ $prod->name }}
                                    </a>
                                </h3>
                                <p class="nordic-desc">
                                    {{ Str::limit(strip_tags($prod->description ?? $prod->name), 60) }}
                                </p>
                                <div class="nordic-price-row">
                                    <span class="nordic-price-current">{{ number_format($currentPrice) }}đ</span>
                                    <span class="nordic-price-old">{{ number_format($originalPrice) }}đ</span>
                                    <span class="nordic-discount-tag">-{{ $discountPercent }}%</span>
                                </div>
                                <div class="nordic-unit-text"><i class="fa-solid fa-box-open me-1 text-success"></i> Quy cách: <strong class="text-dark">{{ $unitText }}</strong></div>
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="btn-nordic-detail">
                                    Chi Tiết Sản Phẩm
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    
        <!-- 4. NORDIC 4 STANDARDS STRIP -->
        <div class="nordic-standards-box">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="standard-item">
                        <div class="standard-icon"><i class="fa-solid fa-leaf"></i></div>
                        <div>
                            <h4 class="standard-title">100% Tự Nhiên</h4>
                            <p class="standard-desc">Thịt chăn thả bán hoang dã, không chất tăng trọng.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="standard-item">
                        <div class="standard-icon"><i class="fa-solid fa-snowflake"></i></div>
                        <div>
                            <h4 class="standard-title">Chuỗi Lạnh -2°C~4°C</h4>
                            <p class="standard-desc">Bảo toàn vị ngọt thanh và thớ thịt mềm mọng nước.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="standard-item">
                        <div class="standard-icon"><i class="fa-solid fa-shield-halved"></i></div>
                        <div>
                            <h4 class="standard-title">Kiểm Dịch 100%</h4>
                            <p class="standard-desc">Đạt chuẩn thú y, đóng khay hút chân không vô trùng.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="standard-item">
                        <div class="standard-icon"><i class="fa-solid fa-truck-fast"></i></div>
                        <div>
                            <h4 class="standard-title">Giao Nhanh 2 Giờ</h4>
                            <p class="standard-desc">Thùng giữ nhiệt chuyên dụng giao tận bếp tươi ngon.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. NORDIC PHILOSOPHY & STORY SECTION -->
        <div class="nordic-story-section">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="story-img-wrap">
                        <img src="/upload/images/slide/1659941826_843601.jpg" alt="Nông Trại Tam Nông">
                        <div class="story-img-badge">
                            <i class="fa-solid fa-seedling me-1 text-warning"></i> Nông Trại Sinh Thái Tam Nông
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <span class="nordic-tag">TRIẾT LÝ NÔNG TRẠI</span>
                    <h2 class="fw-bold fs-2 text-dark mb-3">Tôn Trọng Hương Vị Nguyên Bản Của Thực Phẩm</h2>
                    <p class="text-muted mb-4" style="line-height: 1.7;">
                        Chúng tôi tin rằng bữa ăn ngon nhất bắt đầu từ nguồn nguyên liệu thuần khiết nhất. Thịt bê tơ, heo rừng và gà đồi Tam Nông được nuôi dưỡng tự nhiên trên vùng thảo nguyên trù phú, mang lại thớ thịt săn chắc, thơm ngọt tự nhiên không qua can thiệp công nghiệp.
                    </p>
                    <div class="row g-3 pt-2">
                        <div class="col-4">
                            <div class="story-stat-card">
                                <div class="stat-num">100%</div>
                                <div class="stat-lbl">Kiểm Dịch</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="story-stat-card">
                                <div class="stat-num">2 Giờ</div>
                                <div class="stat-lbl">Giao Lạnh</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="story-stat-card">
                                <div class="stat-num">5.000+</div>
                                <div class="stat-lbl">Gia Đình</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 6. CHEF'S NORDIC MENU PAIRINGS -->
        <div class="my-5">
            <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap gap-2">
                <div>
                    <span class="nordic-tag">GỢI Ý NẤU NƯỚNG</span>
                    <h2 class="fw-bold fs-2 text-dark mb-0">Công Thức Thượng Hạng Cùng Tam Nông</h2>
                </div>
                <a href="tel:0938133830" class="btn btn-outline-dark rounded-pill fw-bold px-4 py-2 small">
                    Tư Vấn Nấu Tiệc <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="nordic-recipe-card">
                        <div class="recipe-thumb">
                            <span class="recipe-tag">Bê Tơ Đặc Sản</span>
                            <img src="/upload/images/post/thumbnail/1650681894_607907.jpg" alt="Bê xào lăn">
                        </div>
                        <div class="recipe-body">
                            <h3 class="recipe-title">Bê Tơ Xào Lăn Sả Ớt Nước Cốt Dừa</h3>
                            <p class="recipe-desc">Bí quyết giữ thớ thịt bê mềm ngọt, da giòn sần sật quyện sốt cốt dừa béo ngậy thơm lừng.</p>
                            <a href="tel:0938133830" class="recipe-link">Đặt nguyên liệu nấu món <i class="fa-solid fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="nordic-recipe-card">
                        <div class="recipe-thumb">
                            <span class="recipe-tag">Heo Rừng F1</span>
                            <img src="/upload/images/post/thumbnail/1650680778_808320.jpg" alt="Ba rọi heo rừng nướng">
                        </div>
                        <div class="recipe-body">
                            <h3 class="recipe-title">Ba Rọi Heo Rừng Nướng Muối Ớt Rừng</h3>
                            <p class="recipe-desc">Lớp bì giòn tan không ngấy, thớ thịt ngọt đậm đà chấm cùng muối kiến vàng lá é chuẩn vị.</p>
                            <a href="tel:0938133830" class="recipe-link">Đặt nguyên liệu nấu món <i class="fa-solid fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="nordic-recipe-card">
                        <div class="recipe-thumb">
                            <span class="recipe-tag">Gà H'Mông Dưỡng Sinh</span>
                            <img src="/upload/images/slide/1659942234_632056.jpg" alt="Gà đen h'mông tiềm">
                        </div>
                        <div class="recipe-body">
                            <h3 class="recipe-title">Gà Đen H'Mông Tiềm Sâm & Kỷ Tử</h3>
                            <p class="recipe-desc">Món ăn đại bổ dưỡng sinh giúp bồi bổ khí huyết, phục hồi năng lượng cho cả gia đình.</p>
                            <a href="tel:0938133830" class="recipe-link">Đặt nguyên liệu nấu món <i class="fa-solid fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 7. NORDIC VIP CALLOUT BANNER -->
        <div class="nordic-vip-banner">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <span class="vip-tag"><i class="fa-solid fa-crown me-1 text-gold"></i> ĐẶC QUYỀN KHÁCH HÀNG THÂN THIẾT</span>
                    <h3 class="vip-title">Nhận Báo Giá Sỉ & Tư Vấn Thực Đơn Tiệc</h3>
                    <p class="vip-desc">
                        Cung cấp giải pháp thực phẩm tươi sạch nguyên tảng, sơ chế theo yêu cầu cho nhà hàng, quán ăn và tiệc gia đình tại TP.HCM.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="tel:0938133830" class="btn btn-warning btn-lg rounded-pill fw-bold text-dark px-4 py-3 shadow">
                        <i class="fa-solid fa-phone-volume me-2"></i> Hotline: 0938.133.830
                    </a>
                </div>
            </div>
        </div>

    </main>

    <!-- 5. NORDIC LUXURY FOOTER -->
    <footer class="nordic-footer">
        <div class="container">
            <div class="row g-4 pb-5 border-bottom border-secondary border-opacity-25">
                <!-- Cột 1: Thương Hiệu -->
                <div class="col-lg-4 pe-lg-4">
                    <img src="{{ get_image(setting_option('logo')) }}" alt="Tam Nông Nordic" class="footer-logo mb-3" style="max-height: 52px; filter: brightness(0) invert(1);">
                    <p class="footer-desc mb-4">
                        Tam Nông mang đến chuẩn mực ẩm thực thượng hạng từ nông trại tự nhiên. Từng thớ thịt đều được kiểm dịch nghiêm ngặt và bảo quản trong chuỗi lạnh vô trùng chuẩn quốc tế.
                    </p>
                    <div class="nordic-social-wrap">
                        <a href="{{ setting_option('facebook', 'https://facebook.com') }}" target="_blank" rel="noopener" class="nordic-social-btn" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="{{ setting_option('youtube', 'https://youtube.com') }}" target="_blank" rel="noopener" class="nordic-social-btn" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                        <a href="{{ setting_option('tiktok', 'https://tiktok.com') }}" target="_blank" rel="noopener" class="nordic-social-btn" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>

                <!-- Cột 2: Đặc Sản Tuyển Chọn -->
                <div class="col-6 col-lg-2">
                    <h5 class="nordic-footer-title">Đặc Sản Tuyển Chọn</h5>
                    <ul class="nordic-footer-list">
                        <li><a href="{{ route('product') }}">Thịt Bê Tươi Thả Cỏ</a></li>
                        <li><a href="{{ route('product') }}">Bê Bó Giò Thượng Hạng</a></li>
                        <li><a href="{{ route('product') }}">Ba Rọi Heo Rừng Tự Nhiên</a></li>
                        <li><a href="{{ route('product') }}">Gà Đồi & Gà Đen H'Mông</a></li>
                        <li><a href="{{ route('product') }}">Chim Trĩ & Chim Cút Sạch</a></li>
                    </ul>
                </div>

                <!-- Cột 3: Dịch Vụ & Cam Kết -->
                <div class="col-6 col-lg-2">
                    <h5 class="nordic-footer-title">Dịch Vụ & Cam Kết</h5>
                    <ul class="nordic-footer-list">
                        <li><a href="{{ route('about') }}">Về Chúng Tôi</a></li>
                        <li><a href="{{ route('about') }}">Chuỗi Lạnh Vô Trùng</a></li>
                        <li><a href="{{ route('contact') }}">Chính Sách Giao 2H</a></li>
                        <li><a href="{{ route('contact') }}">Đổi Trả & Hoàn Tiền</a></li>
                        <li><a href="{{ route('contact') }}">Cung Cấp Sỉ Nhà Hàng</a></li>
                    </ul>
                </div>

                <!-- Cột 4: Showroom & Giờ Phục Vụ -->
                <div class="col-lg-4 ps-lg-4">
                    <h5 class="nordic-footer-title">Showroom & Đặt Hàng</h5>
                    <div class="nordic-contact-item">
                        <i class="fa-solid fa-location-dot text-gold"></i>
                        <span>59 đường số 3, Thăng Long Home Hưng Phú, P. Tam Bình, TP. Thủ Đức, TP.HCM</span>
                    </div>
                    <div class="nordic-contact-item">
                        <i class="fa-solid fa-phone-volume text-gold"></i>
                        <span>Hotline: <a href="tel:0938133830" class="fw-bold text-white">0938.133.830</a></span>
                    </div>
                    <div class="nordic-contact-item">
                        <i class="fa-solid fa-envelope text-gold"></i>
                        <span>Email: <a href="mailto:tamnong.corp@gmail.com">tamnong.corp@gmail.com</a></span>
                    </div>

                    <!-- Khung Giờ Mở Cửa Phục Vụ -->
                    <div class="nordic-hours-card">
                        <div class="hours-title">
                            <i class="fa-regular fa-clock text-gold"></i> Giờ Mở Cửa Phục Vụ:
                        </div>
                        <div class="hours-time">
                            06:00 – 20:00 hàng ngày (Cả Thứ 7 & CN)
                        </div>
                    </div>
                </div>
            </div>

            <div class="nordic-footer-bottom d-flex flex-wrap justify-content-between align-items-center pt-4">
                <div class="small text-muted">
                    © {{ date('Y') }} <strong>Tam Nông Nordic Organic</strong> • Tinh hoa ẩm thực thượng hạng từ nông trại sạch.
                </div>
                <div class="small text-muted">
                    Hotline Tư Vấn: <span class="text-gold fw-bold">0938.133.830</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- FLOATING CONTACT WIDGET - CONCEPT 5: NORDIC GOURMET LUXURY -->
    <div class="floating-contact-nordic">
        <!-- Zalo Luxury Capsule -->
        <a href="https://zalo.me/0938133830" target="_blank" rel="noopener" class="nordic-fly-capsule capsule-zalo" title="Concierge Zalo">
            <span class="nordic-tooltip">Nordic Concierge Zalo: 0938.133.830</span>
            <div class="nordic-gold-glow"></div>
            <span class="zalo-serif">Zalo</span>
        </a>

        <!-- Hotline Luxury Capsule -->
        <a href="tel:0938133830" class="nordic-fly-capsule capsule-gold" title="Hotline Đặt Hàng Thượng Hạng">
            <span class="nordic-tooltip">Hotline Thượng Hạng: 0938.133.830</span>
            <div class="nordic-gold-glow"></div>
            <i class="fa-solid fa-phone-volume"></i>
        </a>

        <!-- Back to Top -->
        <button type="button" class="nordic-fly-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" title="Về đầu trang">
            <i class="fa-solid fa-arrow-up"></i>
        </button>
    </div>

</body>
</html>
