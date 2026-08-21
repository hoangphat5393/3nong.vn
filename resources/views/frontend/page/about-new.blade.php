@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => 'Giới thiệu Tam Nông - Thực Phẩm Tươi Sạch Từ Trang Trại',
        'description' =>
            'Tam Nông chuyên cung cấp thực phẩm tươi sạch, thịt bê, thịt gà đồi, chim trĩ, thịt heo sạch đạt chuẩn an toàn vệ sinh thực phẩm cao nhất.',
        'image' => asset('assets/images/about_farm_meat.jpg'),
    ])
@endsection

@push('head-style')
    <style>
        /* Main Layout */
        .about-page-container {
            padding: 20px 0 40px;
        }

        /* Breadcrumb */
        .about-breadcrumb {
            color: #d1d5db;
            font-size: 14px;
        }

        .about-breadcrumb a {
            color: #d1d5db;
            text-decoration: none;
            transition: color 0.2s;
        }

        .about-breadcrumb a:hover {
            color: #f5a623;
        }

        /* Content Cards (Matching Homepage Card Structure) */
        .about-card-block {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 28px;
        }

        /* Hero Section Inside Card */
        .about-hero-card {
            background: linear-gradient(135deg, #ffffff 0%, #f4fbf5 100%);
            padding: 40px 32px;
            position: relative;
        }

        .about-hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(30, 126, 52, 0.1);
            color: #1e7e34;
            border: 1px solid rgba(30, 126, 52, 0.25);
            font-size: 13px;
            font-weight: 700;
            padding: 6px 16px;
            border-radius: 20px;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .about-hero-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: #1e7e34;
            line-height: 1.35;
        }

        .about-hero-title .text-gold {
            color: #f5a623;
        }

        .about-hero-desc {
            color: #4a5568;
            font-size: 1.05rem;
            line-height: 1.7;
        }

        .about-hero-img-wrap {
            position: relative;
        }

        .about-hero-img {
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
            width: 100%;
            object-fit: cover;
        }

        .about-floating-badge {
            position: absolute;
            bottom: -12px;
            right: 20px;
            background: #1e7e34;
            color: #ffffff;
            padding: 8px 18px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
            box-shadow: 0 6px 16px rgba(30, 126, 52, 0.4);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* Stats Grid */
        .about-stat-item {
            background: #f8faf7;
            border-radius: 12px;
            padding: 20px 15px;
            text-align: center;
            border: 1px solid #e6ede6;
            transition: transform 0.25s, box-shadow 0.25s, border-color 0.25s;
            height: 100%;
        }

        .about-stat-item:hover {
            transform: translateY(-4px);
            border-color: #1e7e34;
            box-shadow: 0 8px 20px rgba(30, 126, 52, 0.12);
            background: #ffffff;
        }

        .about-stat-num {
            font-size: 2.2rem;
            font-weight: 800;
            color: #f5a623;
            line-height: 1.2;
            margin-bottom: 4px;
        }

        .about-stat-label {
            font-size: 13px;
            font-weight: 700;
            color: #2d3748;
            text-transform: uppercase;
        }

        /* Block Header */
        .about-section-header {
            position: relative;
            padding-bottom: 12px;
            margin-bottom: 24px;
            border-bottom: 2px solid #eef3ee;
        }

        .about-section-header::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 60px;
            height: 2px;
            background: #1e7e34;
        }

        .about-section-header.text-center::after {
            left: 50%;
            transform: translateX(-50%);
        }

        .about-section-subtitle {
            color: #f5a623;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
            display: block;
        }

        .about-section-title {
            color: #1e7e34;
            font-weight: 800;
            font-size: 1.65rem;
            margin-bottom: 0;
        }

        /* Vision / Mission Cards */
        .vision-card {
            background: #fdfdfd;
            border-radius: 12px;
            padding: 20px;
            border-left: 4px solid #1e7e34;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
            margin-bottom: 16px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .vision-card:hover {
            transform: translateX(4px);
            box-shadow: 0 4px 16px rgba(30, 126, 52, 0.1);
        }

        .vision-card-title {
            color: #1e7e34;
            font-weight: 700;
            font-size: 1.05rem;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .vision-card-desc {
            color: #4a5568;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 0;
        }

        /* 4-Step Process */
        .process-step-card {
            background: #f8faf7;
            border-radius: 14px;
            padding: 24px 18px;
            text-align: center;
            position: relative;
            border: 1px solid #e3ede3;
            height: 100%;
            transition: all 0.3s ease;
        }

        .process-step-card:hover {
            background: #ffffff;
            border-color: #f5a623;
            transform: translateY(-5px);
            box-shadow: 0 10px 24px rgba(245, 166, 35, 0.15);
        }

        .process-step-badge {
            width: 36px;
            height: 36px;
            background: #f5a623;
            color: #ffffff;
            font-weight: 800;
            font-size: 14px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            box-shadow: 0 4px 10px rgba(245, 166, 35, 0.4);
        }

        .process-step-icon {
            font-size: 32px;
            color: #1e7e34;
            margin-bottom: 12px;
        }

        .process-step-title {
            font-size: 1rem;
            font-weight: 700;
            color: #1e7e34;
            margin-bottom: 8px;
        }

        .process-step-desc {
            font-size: 0.88rem;
            color: #4a5568;
            line-height: 1.55;
            margin-bottom: 0;
        }

        /* Core Values Pillars */
        .pillar-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 24px 20px;
            border: 1px solid #e9eee9;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.04);
            height: 100%;
            transition: all 0.3s ease;
        }

        .pillar-card:hover {
            border-color: #1e7e34;
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(30, 126, 52, 0.12);
        }

        .pillar-icon-box {
            width: 54px;
            height: 54px;
            border-radius: 12px;
            background: rgba(30, 126, 52, 0.1);
            color: #1e7e34;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 16px;
            transition: all 0.3s ease;
        }

        .pillar-card:hover .pillar-icon-box {
            background: #1e7e34;
            color: #ffffff;
        }

        .pillar-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .pillar-desc {
            font-size: 0.9rem;
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 0;
        }

        /* Commitment Banner */
        .about-cta-banner {
            background: linear-gradient(135deg, #1e7e34 0%, #155724 100%);
            border-radius: 16px;
            padding: 36px 30px;
            color: #ffffff;
            box-shadow: 0 10px 30px rgba(21, 87, 36, 0.35);
            text-align: center;
        }

        .about-cta-title {
            font-size: 1.75rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .about-cta-desc {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            max-width: 680px;
            margin: 0 auto 24px;
            line-height: 1.6;
        }

        /* Buttons */
        .btn-gold {
            background: #f5a623;
            color: #ffffff !important;
            font-weight: 700;
            padding: 12px 28px;
            border-radius: 30px;
            text-transform: uppercase;
            font-size: 14px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 4px 14px rgba(245, 166, 35, 0.4);
            transition: all 0.25s ease;
            border: none;
        }

        .btn-gold:hover {
            background: #e09415;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 166, 35, 0.55);
        }

        .btn-outline-custom {
            border: 2px solid #1e7e34;
            color: #1e7e34 !important;
            font-weight: 700;
            padding: 10px 24px;
            border-radius: 30px;
            text-decoration: none;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.25s ease;
        }

        .btn-outline-custom:hover {
            background: #1e7e34;
            color: #ffffff !important;
            transform: translateY(-2px);
        }
    </style>
@endpush

@section('content')
    <div class="container about-page-container">
        {{-- Breadcrumb --}}
        <div class="about-breadcrumb mb-3">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="separator px-2">/</span>
            <span class="text-white fw-bold">Giới thiệu</span>
        </div>

        {{-- 1. HERO INTRO BLOCK --}}
        <div class="about-card-block">
            <div class="about-hero-card">
                <div class="row align-items-center g-4">
                    <div class="col-lg-7">
                        <span class="about-hero-badge">
                            <i class="fa-solid fa-leaf"></i> Nông Nghiệp Xanh - Bữa Ăn Lành
                        </span>
                        <h1 class="about-hero-title mb-3">
                            Thực Phẩm Tươi Sạch - <span class="text-gold">Trọn Vẹn Dinh Dưỡng</span> Cho Gia Đình
                        </h1>
                        <p class="about-hero-desc mb-4">
                            <strong>Tam Nông</strong> tự hào là cầu nối trực tiếp giữa các vùng nuôi trồng đạt chuẩn với bàn
                            ăn của hàng chục nghìn gia đình. Chúng tôi chuyên phân phối thịt bê tươi, thịt gia cầm đồi, thịt
                            heo sạch và đặc sản vùng miền với cam kết chuẩn mực cao nhất về an toàn vệ sinh thực phẩm.
                        </p>
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="{{ route('product.all') }}" class="btn-gold">
                                <i class="fa-solid fa-bag-shopping"></i> Khám phá sản phẩm
                            </a>
                            <a href="{{ route('contact') }}" class="btn-outline-custom">
                                <i class="fa-solid fa-handshake"></i> Liên hệ hợp tác
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="about-hero-img-wrap">
                            <img src="{{ asset('assets/images/about_farm_meat.jpg') }}" alt="Thực phẩm sạch Tam Nông"
                                class="about-hero-img">
                            <div class="about-floating-badge">
                                <i class="fa-solid fa-certificate"></i> 100% Thịt Tươi Trong Ngày
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Stats Row Inside Main Card --}}
            <div class="p-4 bg-white border-top">
                <div class="row g-3">
                    <div class="col-6 col-md-3">
                        <div class="about-stat-item">
                            <div class="about-stat-num">100%</div>
                            <div class="about-stat-label">Nguồn gốc minh bạch</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="about-stat-item">
                            <div class="about-stat-num">50.000+</div>
                            <div class="about-stat-label">Bữa ăn phục vụ</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="about-stat-item">
                            <div class="about-stat-num">24 Giờ</div>
                            <div class="about-stat-label">Giao hàng siêu tốc</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="about-stat-item">
                            <div class="about-stat-num">100+</div>
                            <div class="about-stat-label">Đại lý & đối tác</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- 2. BRAND STORY & MISSION BLOCK --}}
        <div class="about-card-block p-4 p-md-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <div class="position-relative">
                        <img src="{{ asset('assets/images/about_supply_chain.jpg') }}" alt="Quy trình thực phẩm Tam Nông"
                            class="img-fluid rounded-4 shadow-sm w-100">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="about-section-header">
                        <span class="about-section-subtitle">Hành trình phát triển</span>
                        <h2 class="about-section-title">Khát Vọng Mang Đến Bữa Cơm An Toàn & Chuẩn Vị</h2>
                    </div>
                    <p class="text-muted mb-4" style="line-height: 1.7;">
                        Xuất phát từ nỗi trăn trở về thực phẩm không rõ nguồn gốc trên thị trường, <strong>Tam Nông</strong>
                        được xây dựng với mục tiêu chuẩn hóa chuỗi cung ứng nông sản - thực phẩm sạch từ nông trại đến tay
                        người tiêu dùng.
                    </p>

                    {{-- Vision, Mission, Values List --}}
                    <div class="vision-card">
                        <div class="vision-card-title">
                            <i class="fa-solid fa-eye text-success"></i> Tầm Nhìn
                        </div>
                        <p class="vision-card-desc">
                            Trở thành thương hiệu phân phối thực phẩm tươi sống và đặc sản nông nghiệp tin cậy hàng đầu,
                            đồng hành trong mọi gian bếp gia đình và nhà hàng.
                        </p>
                    </div>

                    <div class="vision-card">
                        <div class="vision-card-title">
                            <i class="fa-solid fa-bullseye text-success"></i> Sứ Mệnh
                        </div>
                        <p class="vision-card-desc">
                            Bảo vệ sức khỏe cộng đồng bằng nguồn thực phẩm tươi ngon tự nhiên, không tồn dư hóa chất bảo
                            quản và minh bạch 100% nguồn gốc xuất xứ.
                        </p>
                    </div>

                    <div class="vision-card">
                        <div class="vision-card-title">
                            <i class="fa-solid fa-gem text-success"></i> Giá Trị Cốt Lõi
                        </div>
                        <p class="vision-card-desc">
                            <strong>Tận Tâm</strong> trong phục vụ — <strong>Trung Thực</strong> về chất lượng —
                            <strong>Trách Nhiệm</strong> với sức khỏe người tiêu dùng.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- 3. 4-STEP FARM TO TABLE PROCESS --}}
        <div class="about-card-block p-4 p-md-5">
            <div class="about-section-header text-center mb-4">
                <span class="about-section-subtitle">Quy trình khép kín</span>
                <h2 class="about-section-title">4 Bước Chuẩn "Từ Trang Trại Đến Bàn Ăn"</h2>
            </div>
            <div class="row g-4 mt-2">
                <div class="col-md-3">
                    <div class="process-step-card">
                        <div class="process-step-badge">1</div>
                        <div class="process-step-icon"><i class="fa-solid fa-tractor"></i></div>
                        <h3 class="process-step-title">Chọn Lọc Nông Trại</h3>
                        <p class="process-step-desc">Gia súc, gia cầm được nuôi thả tự nhiên tại các nông trại đạt tiêu
                            chuẩn an toàn sinh học.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="process-step-card">
                        <div class="process-step-badge">2</div>
                        <div class="process-step-icon"><i class="fa-solid fa-microscope"></i></div>
                        <h3 class="process-step-title">Kiểm Định Thú Y</h3>
                        <p class="process-step-desc">100% sản phẩm có chứng nhận kiểm dịch, không chất tăng trọng, không tồn
                            dư kháng sinh.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="process-step-card">
                        <div class="process-step-badge">3</div>
                        <div class="process-step-icon"><i class="fa-solid fa-snowflake"></i></div>
                        <h3 class="process-step-title">Bảo Quản Khép Kín</h3>
                        <p class="process-step-desc">Đóng khay hút chân không, bảo quản lạnh tiêu chuẩn để giữ trọn độ mọng
                            nước và dinh dưỡng.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="process-step-card">
                        <div class="process-step-badge">4</div>
                        <div class="process-step-icon"><i class="fa-solid fa-truck-ramp-box"></i></div>
                        <h3 class="process-step-title">Giao Hàng Tươi Tận Nơi</h3>
                        <p class="process-step-desc">Thùng cách nhiệt chuyên dụng giúp thực phẩm luôn tươi ngon khi đến tay
                            khách hàng.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- 4. CORE PILLARS --}}
        <div class="about-card-block p-4 p-md-5">
            <div class="about-section-header text-center mb-4">
                <span class="about-section-subtitle">Cam kết dịch vụ</span>
                <h2 class="about-section-title">Tại Sao Khách Hàng Tin Chọn Tam Nông?</h2>
            </div>
            <div class="row g-4 mt-2">
                <div class="col-md-3">
                    <div class="pillar-card">
                        <div class="pillar-icon-box">
                            <i class="fa-solid fa-drumstick-bite"></i>
                        </div>
                        <h3 class="pillar-title">Độ Tươi Thật 100%</h3>
                        <p class="pillar-desc">Nói không với hàng ôi đông lạnh lâu ngày. Thịt tươi được sơ chế và phân phối
                            ngay trong ngày.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="pillar-card">
                        <div class="pillar-icon-box">
                            <i class="fa-solid fa-shield-heart"></i>
                        </div>
                        <h3 class="pillar-title">An Toàn Cho Sức Khỏe</h3>
                        <p class="pillar-desc">Mọi sản phẩm đều đạt chuẩn kiểm nghiệm an toàn vệ sinh thực phẩm, an tâm
                            tuyệt đối cho trẻ nhỏ và người già.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="pillar-card">
                        <div class="pillar-icon-box">
                            <i class="fa-solid fa-tags"></i>
                        </div>
                        <h3 class="pillar-title">Giá Trực Tiếp Tận Nguồn</h3>
                        <p class="pillar-desc">Liên kết trực tiếp với nhà vườn và trang trại giúp tối ưu chi phí trung
                            gian, đem lại mức giá cạnh tranh nhất.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="pillar-card">
                        <div class="pillar-icon-box">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <h3 class="pillar-title">Đổi Trả & Phục Vụ Tận Tâm</h3>
                        <p class="pillar-desc">Chính sách hỗ trợ đổi trả 100% nếu thực phẩm không đạt chất lượng cam kết
                            hoặc xảy ra sự cố vận chuyển.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- 5. CALL TO ACTION BANNER --}}
        <div class="about-cta-banner">
            <h2 class="about-cta-title">Tam Nông - Đồng Hành Cùng Mọi Bữa Ăn Ngon & Lành</h2>
            <p class="about-cta-desc">
                Hãy liên hệ với chúng tôi ngay hôm nay để đặt mua những phần thực phẩm tươi ngon nhất cho gia đình hoặc đăng
                ký nhận bảng giá sỉ dành cho đại lý và nhà hàng!
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('product.all') }}" class="btn-gold">
                    <i class="fa-solid fa-cart-shopping"></i> Đặt mua thực phẩm tươi
                </a>
                <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0932.009.180')) }}"
                    class="btn btn-outline-light rounded-pill px-4 py-2 fw-bold d-inline-flex align-items-center gap-2"
                    style="font-size: 14px;">
                    <i class="fa-solid fa-phone"></i> Hotline: {{ setting_option('phone', '0932 009 180') }}
                </a>
            </div>
        </div>
    </div>
@endsection
