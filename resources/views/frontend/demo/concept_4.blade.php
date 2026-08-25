@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => $seo['seo_title'] ?? 'Mẫu 4: NextGen Bento Grid & Glassmorphism — 3 Nông',
        'keywords' => $seo['seo_keyword'] ?? '',
        'description' => $seo['seo_description'] ?? '',
        'image' => $seo['seo_image'] ?? get_image(setting_option('logo')),
    ])
@endsection

@push('head-style')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    :root {
        --bento-bg: #F4F7F4;
        --bento-card-bg: rgba(255, 255, 255, 0.85);
        --bento-dark: #0A2315;
        --bento-green: #22C55E;
        --bento-emerald: #10B981;
        --bento-amber: #F59E0B;
        --bento-border: rgba(16, 185, 129, 0.15);
    }

    body, .wrap {
        background-color: var(--bento-bg) !important;
        font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif !important;
        color: #1E293B;
    }

    /* Modern Glass Header */
    header {
        background-color: rgba(255, 255, 255, 0.9) !important;
        backdrop-filter: blur(16px);
        border-bottom: 1px solid var(--bento-border);
    }
    .main-menu {
        background: linear-gradient(135deg, #0A2315 0%, #143D26 100%) !important;
        box-shadow: 0 10px 30px rgba(10, 35, 21, 0.15);
    }

    /* Bento Grid System */
    .bento-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }
    .bento-col-8 { grid-column: span 8; }
    .bento-col-4 { grid-column: span 4; }
    .bento-col-6 { grid-column: span 6; }
    .bento-col-3 { grid-column: span 3; }
    .bento-col-12 { grid-column: span 12; }

    @media (max-width: 991.98px) {
        .bento-col-8, .bento-col-4, .bento-col-6, .bento-col-3 {
            grid-column: span 12;
        }
    }

    .bento-card {
        background: var(--bento-card-bg);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.8);
        border-radius: 28px;
        padding: 30px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px -10px rgba(10, 35, 21, 0.05);
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .bento-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px -15px rgba(10, 35, 21, 0.12);
        border-color: var(--bento-green);
    }

    /* Hero Main Card */
    .bento-hero-main {
        background: linear-gradient(135deg, #0A2315 0%, #174D30 100%);
        color: #FFFFFF;
        min-height: 380px;
        border: none;
    }
    .bento-hero-badge {
        background: rgba(34, 197, 94, 0.2);
        color: #4ADE80;
        border: 1px solid rgba(74, 222, 128, 0.4);
        padding: 6px 16px;
        border-radius: 99px;
        font-weight: 700;
        font-size: 0.82rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        width: fit-content;
    }
    .bento-hero-title {
        font-size: 2.7rem;
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -0.5px;
        margin: 18px 0;
    }

    /* AI Doctor Bar Widget */
    .bento-ai-bar {
        background: linear-gradient(90deg, #FFFFFF 0%, #F0FDF4 100%);
        border: 2px dashed #86EFAC;
        border-radius: 20px;
        padding: 20px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 30px;
    }

    /* Product Bento Card */
    .bento-prod-card {
        background: #FFFFFF;
        border-radius: 24px;
        padding: 20px;
        border: 1px solid #E2E8F0;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .bento-prod-card:hover {
        border-color: var(--bento-emerald);
        transform: translateY(-5px);
        box-shadow: 0 16px 32px rgba(16, 185, 129, 0.12);
    }
    .bento-prod-img {
        position: relative;
        padding-top: 85%;
        border-radius: 18px;
        background: #F8FAFC;
        overflow: hidden;
        margin-bottom: 16px;
    }
    .bento-prod-img img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .bento-prod-card:hover .bento-prod-img img {
        transform: scale(1.06);
    }
    .bento-btn-action {
        background: var(--bento-dark);
        color: #FFFFFF;
        border: none;
        padding: 12px;
        border-radius: 14px;
        font-weight: 700;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-decoration: none;
        transition: all 0.2s ease;
        margin-top: auto;
    }
    .bento-btn-action:hover {
        background: var(--bento-green);
        color: #0A2315;
    }
</style>
@endpush

@section('content')
    <!-- Demo Switcher Top Bar -->
    @include('frontend.demo.includes.demo_switcher', ['activeConcept' => 4])

    <div class="container my-4">
        <!-- 1. BENTO BOX HERO GRID -->
        <div class="bento-grid">
            <!-- Main Hero Box (Span 8) -->
            <div class="bento-col-8">
                <div class="bento-card bento-hero-main">
                    <div>
                        <span class="bento-hero-badge">
                            <i class="fa-solid fa-sparkles"></i> CÔNG NGHỆ NÔNG NGHIỆP 4.0
                        </span>
                        <h1 class="bento-hero-title">
                            Nâng Tầm Nông Sản<br>
                            <span style="color: #4ADE80;">Bằng Dinh Dưỡng Thông Minh</span>
                        </h1>
                        <p class="text-white opacity-80 fs-6 max-w-500 mb-4">
                            Giải pháp phân bón sinh học & hạt giống F1 tinh tuyển giúp tăng năng suất 35%, bảo vệ đất và nguồn nước bền vững.
                        </p>
                    </div>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('product') }}" class="btn btn-success btn-lg rounded-pill fw-bold px-4 shadow-sm" style="background-color: #22C55E; color: #0A2315; border: none;">
                            <i class="fa-solid fa-seedling me-1"></i> Khám Phá Giải Pháp
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg rounded-pill fw-bold px-4">
                            <i class="fa-solid fa-phone me-1"></i> Gặp Kỹ Sư
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bento Sub-box 1: Smart Stats (Span 4) -->
            <div class="bento-col-4">
                <div class="bento-card" style="background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);">
                    <div>
                        <span class="badge bg-dark text-warning rounded-pill px-3 py-1 fw-bold text-uppercase mb-3">Hiệu Quả Vụ Mùa</span>
                        <h3 class="fw-bold text-dark fs-2 mb-1">+35%</h3>
                        <p class="text-dark opacity-80 small mb-0">Năng suất bình quân ghi nhận tại 1.200 nhà vườn đối tác năm 2025.</p>
                    </div>
                    <div class="mt-4 pt-3 border-top border-warning-subtle d-flex align-items-center justify-content-between">
                        <span class="fw-bold text-dark small"><i class="fa-solid fa-award text-warning me-1"></i> 100% Đạt Chuẩn VietGAP</span>
                        <i class="fa-solid fa-arrow-up-right-from-square text-dark"></i>
                    </div>
                </div>
            </div>

            <!-- Bento Sub-box 2: Quick Solution (Span 4) -->
            <div class="bento-col-4">
                <div class="bento-card" style="background: #FFFFFF;">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="rounded-circle p-3 d-flex align-items-center justify-content-center" style="background: #DCFCE7; color: #15803D; width: 50px; height: 50px;">
                            <i class="fa-solid fa-flask-vial fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold fs-6 mb-0 text-dark">Chế Phẩm Sinh Học</h4>
                            <span class="text-muted small">Phục hồi đất & rễ nhanh</span>
                        </div>
                    </div>
                    <p class="text-muted small mb-3">Tăng đề kháng nấm bệnh tự nhiên, không độc hại cho môi trường.</p>
                    <a href="{{ route('product') }}" class="text-success fw-bold small text-decoration-none">Tìm hiểu thêm <i class="fa-solid fa-arrow-right ms-1"></i></a>
                </div>
            </div>

            <!-- Bento Sub-box 3: Express Delivery (Span 4) -->
            <div class="bento-col-4">
                <div class="bento-card" style="background: #FFFFFF;">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="rounded-circle p-3 d-flex align-items-center justify-content-center" style="background: #DBEAFE; color: #1D4ED8; width: 50px; height: 50px;">
                            <i class="fa-solid fa-truck-fast fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold fs-6 mb-0 text-dark">Giao Hàng Siêu Tốc 24H</h4>
                            <span class="text-muted small">Tận vườn trên toàn quốc</span>
                        </div>
                    </div>
                    <p class="text-muted small mb-3">Đảm bảo hạt giống nguyên bao bì hút chân không, bảo quản chuẩn.</p>
                    <a href="{{ route('contact') }}" class="text-primary fw-bold small text-decoration-none">Chính sách vận chuyển <i class="fa-solid fa-arrow-right ms-1"></i></a>
                </div>
            </div>

            <!-- Bento Sub-box 4: Expert Support (Span 4) -->
            <div class="bento-col-4">
                <div class="bento-card" style="background: #FFFFFF;">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="rounded-circle p-3 d-flex align-items-center justify-content-center" style="background: #FFEDD5; color: #C2410C; width: 50px; height: 50px;">
                            <i class="fa-solid fa-user-gear fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold fs-6 mb-0 text-dark">Tư Vấn Kỹ Sư 24/7</h4>
                            <span class="text-muted small">Đồng hành trọn vụ mùa</span>
                        </div>
                    </div>
                    <p class="text-muted small mb-3">Chẩn đoán tình trạng cây trồng qua ảnh & video call trực tiếp.</p>
                    <a href="tel:0938133830" class="text-danger fw-bold small text-decoration-none">Gọi hotline ngay <i class="fa-solid fa-phone ms-1"></i></a>
                </div>
            </div>
        </div>

        <!-- 2. AI PLANT DOCTOR INTERACTIVE BAR -->
        <div class="bento-ai-bar">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle p-2 d-flex align-items-center justify-content-center bg-success text-white" style="width: 44px; height: 44px;">
                    <i class="fa-solid fa-robot fs-5"></i>
                </div>
                <div>
                    <h3 class="fw-bold fs-6 mb-0 text-dark">Bác Sĩ Cây Trồng Tam Nông (Hỗ Trợ Kỹ Thuật Nhanh)</h3>
                    <span class="text-muted small">Cây của bạn đang gặp vấn đề gì? Hãy chọn triệu chứng để nhận phác đồ điều trị</span>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('contact') }}" class="btn btn-dark btn-sm rounded-pill fw-bold px-3">
                    <i class="fa-solid fa-stethoscope me-1"></i> Gửi Yêu Cầu Chẩn Đoán
                </a>
            </div>
        </div>

        <!-- 3. BENTO PRODUCT GRID -->
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="badge bg-success-subtle text-success fw-bold px-3 py-1 rounded-pill mb-1">VẬT TƯ CHỦ LỰC</span>
                    <h2 class="fw-bold fs-3 text-dark mb-0">Sản Phẩm Khuyên Dùng Cho Vụ Này</h2>
                </div>
                <a href="{{ route('product') }}" class="btn btn-outline-dark btn-sm rounded-pill fw-bold px-3">
                    Xem toàn bộ kho hàng <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-4">
                @foreach($products_hot as $prod)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="bento-prod-card">
                            <div class="bento-prod-img">
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}">
                                    <img src="{{ get_image($prod->image) }}" alt="{{ $prod->name }}" loading="lazy">
                                </a>
                            </div>
                            <h3 class="fw-bold fs-6 text-dark mb-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 2.6em;">
                                <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="text-dark text-decoration-none">
                                    {{ $prod->name }}
                                </a>
                            </h3>
                            <div class="d-flex align-items-baseline mb-3">
                                <span class="fw-bold fs-5 text-success">{{ number_format($prod->price ?? 0) }}đ</span>
                                @if(!empty($prod->sale_price) && $prod->sale_price > $prod->price)
                                    <span class="text-muted small text-decoration-line-through ms-2">{{ number_format($prod->sale_price) }}đ</span>
                                @endif
                            </div>
                            <a href="{{ route('product.detail', ['slug' => $prod->slug, 'id' => $prod->id]) }}" class="bento-btn-action">
                                <i class="fa-solid fa-bag-shopping"></i> Mua Ngay
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
