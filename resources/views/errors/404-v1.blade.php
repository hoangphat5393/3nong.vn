@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => '404 - Không tìm thấy trang | ' . setting_option('webtitle', 'Tam Nông'),
        'keywords' => setting_option('keywords', '404, 3nong, thuc pham tam nong'),
        'description' => 'Trang không tồn tại hoặc đã được di chuyển.',
        'image' => get_image(setting_option('logo')),
    ])
@endsection

@section('content')
    <div class="container py-4">
        {{-- Preview Switcher Bar --}}
        <div class="alert alert-dark bg-dark bg-opacity-75 border-secondary text-white py-2 px-3 mb-4 rounded-3 d-flex flex-wrap align-items-center justify-content-between gap-2 shadow-sm">
            <div class="small fw-semibold">
                <i class="fa-solid fa-palette text-warning me-1"></i> Đang xem: <span class="text-warning">Mẫu 1 (Rustic Glassmorphism & Gold)</span>
            </div>
            <div class="btn-group btn-group-sm">
                <a href="{{ route('404.v1') }}" class="btn btn-warning fw-bold">Mẫu 1</a>
                <a href="{{ route('404.v2') }}" class="btn btn-outline-light">Mẫu 2</a>
                <a href="{{ route('404.v3') }}" class="btn btn-outline-light">Mẫu 3</a>
            </div>
        </div>

        {{-- Breadcrumb --}}
        <div class="post-breadcrumb mb-3">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="separator">/</span>
            <span class="text-white">Lỗi 404</span>
        </div>

        {{-- Main Glassmorphism Card --}}
        <div class="row justify-content-center py-3 py-md-4">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="bg-dark bg-opacity-50 rounded-4 border border-secondary border-opacity-25 p-4 p-md-5 text-center shadow-lg position-relative overflow-hidden" style="backdrop-filter: blur(10px);">
                    
                    {{-- Decorative background glow --}}
                    <div class="position-absolute top-0 start-50 translate-middle-x rounded-circle" style="width: 280px; height: 180px; background: radial-gradient(circle, rgba(245, 166, 35, 0.18) 0%, rgba(46, 125, 50, 0.05) 70%, transparent 100%); filter: blur(30px); pointer-events: none;"></div>

                    {{-- Big Gold 404 --}}
                    <div class="mb-2">
                        <div class="fw-bolder display-1 text-uppercase" style="font-size: clamp(4.5rem, 12vw, 7.5rem); line-height: 1; letter-spacing: 4px; background: linear-gradient(135deg, #ffd700 0%, #f5a623 50%, #e09415 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: 0 10px 30px rgba(245, 166, 35, 0.35); font-family: sans-serif;">
                            404
                        </div>
                    </div>

                    {{-- Badge --}}
                    <div class="mb-3">
                        <span class="badge bg-warning bg-opacity-25 text-warning px-3 py-2 rounded-pill fw-bold text-uppercase" style="letter-spacing: 1px; font-size: 13px;">
                            <i class="fa-solid fa-seedling me-1"></i> Trang Không Tồn Tại
                        </span>
                    </div>

                    {{-- Title & Subtitle --}}
                    <h1 class="h3 fw-bold text-white mb-3">
                        Ối! Trang này đã chuyển đi đâu mất rồi
                    </h1>
                    <p class="text-white-50 mb-4 mx-auto" style="max-width: 520px; font-size: 15px; line-height: 1.6;">
                        Đường dẫn bạn truy cập có thể đã đổi hoặc tạm thời gián đoạn. Đừng lo, Tam Nông luôn có nguồn thực phẩm sạch & vật tư tươi mới đang chờ bạn khám phá!
                    </p>

                    {{-- Quick Search Form --}}
                    <div class="mb-4 mx-auto" style="max-width: 440px;">
                        <form action="{{ route('search') }}" method="GET" class="d-flex shadow-sm rounded-pill overflow-hidden bg-white p-1">
                            <input type="search" name="q" class="form-control border-0 px-3 shadow-none text-dark" placeholder="Tìm sản phẩm bạn cần..." aria-label="Tìm kiếm">
                            <button class="btn btn-success rounded-pill px-4 fw-bold" type="submit">
                                <i class="fa-solid fa-magnifying-glass me-1"></i> Tìm
                            </button>
                        </form>
                    </div>

                    {{-- Call to Actions --}}
                    <div class="d-flex justify-content-center gap-3 flex-wrap pt-2">
                        <a href="{{ route('home') }}" class="btn btn-gold btn-lg rounded-pill px-4 py-2 fs-6 fw-bold shadow">
                            <i class="fa-solid fa-house me-1"></i> Về Trang Chủ
                        </a>
                        <a href="{{ route('product') }}" class="btn btn-outline-light btn-lg rounded-pill px-4 py-2 fs-6 fw-bold">
                            <i class="fa-solid fa-basket-shopping me-1"></i> Xem Sản Phẩm
                        </a>
                        <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0932 009 180')) }}" class="btn btn-outline-warning btn-lg rounded-pill px-4 py-2 fs-6 fw-bold">
                            <i class="fa-solid fa-phone me-1"></i> Hotline: {{ setting_option('phone', '0932 009 180') }}
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
