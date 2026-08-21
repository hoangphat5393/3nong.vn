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
                <i class="fa-solid fa-palette text-warning me-1"></i> Đang xem: <span class="text-warning">Mẫu 2 (Clean Organic White Card)</span>
            </div>
            <div class="btn-group btn-group-sm">
                <a href="{{ route('404.v1') }}" class="btn btn-outline-light">Mẫu 1</a>
                <a href="{{ route('404.v2') }}" class="btn btn-warning fw-bold">Mẫu 2</a>
                <a href="{{ route('404.v3') }}" class="btn btn-outline-light">Mẫu 3</a>
            </div>
        </div>

        {{-- Breadcrumb --}}
        <div class="post-breadcrumb mb-3">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="separator">/</span>
            <span class="text-white">Lỗi 404</span>
        </div>

        {{-- Main White Card --}}
        <div class="row justify-content-center py-3 py-md-4">
            <div class="col-12 col-md-9 col-lg-7">
                <div class="bg-white rounded-4 shadow-lg p-4 p-md-5 text-center border-0">
                    
                    {{-- Circular Icon --}}
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 96px; height: 96px; background: #e8f5e9; color: #2e7d32; font-size: 44px; box-shadow: 0 8px 24px rgba(46, 125, 50, 0.15);">
                        <i class="fa-solid fa-leaf"></i>
                    </div>

                    {{-- Badge --}}
                    <div class="mb-2">
                        <span class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-2 rounded-pill text-uppercase" style="letter-spacing: 1px; font-size: 12px;">
                            Lỗi 404 - Không Tìm Thấy Trang
                        </span>
                    </div>

                    {{-- Title & Subtitle --}}
                    <h1 class="h2 fw-bold text-dark mb-2">
                        Liên kết không tồn tại
                    </h1>
                    <p class="text-muted mb-4 mx-auto" style="max-width: 480px; font-size: 15px; line-height: 1.6;">
                        Đường dẫn có thể đã đổi hoặc bạn nhập chưa chính xác URL. Hãy chọn một trong các liên kết nhanh dưới đây để tiếp tục.
                    </p>

                    {{-- Primary Buttons --}}
                    <div class="d-flex justify-content-center gap-3 flex-wrap mb-4">
                        <a href="{{ route('home') }}" class="btn btn-success btn-lg rounded-3 px-4 py-2 fs-6 fw-bold">
                            <i class="fa-solid fa-house me-1"></i> Về Trang Chủ
                        </a>
                        <a href="{{ route('about') }}" class="btn btn-outline-secondary btn-lg rounded-3 px-4 py-2 fs-6 fw-bold">
                            <i class="fa-solid fa-circle-info me-1"></i> Giới Thiệu
                        </a>
                    </div>

                    {{-- Quick navigation cards --}}
                    <div class="border-top pt-4">
                        <div class="row g-2">
                            <div class="col-4">
                                <a href="{{ route('product') }}" class="d-block p-2 rounded-3 border text-decoration-none text-dark hover-success" style="transition: all 0.2s;">
                                    <i class="fa-solid fa-basket-shopping text-success fs-5 d-block mb-1"></i>
                                    <span class="small fw-semibold">Sản phẩm</span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('news') }}" class="d-block p-2 rounded-3 border text-decoration-none text-dark hover-success" style="transition: all 0.2s;">
                                    <i class="fa-solid fa-newspaper text-success fs-5 d-block mb-1"></i>
                                    <span class="small fw-semibold">Tin tức</span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('contact') }}" class="d-block p-2 rounded-3 border text-decoration-none text-dark hover-success" style="transition: all 0.2s;">
                                    <i class="fa-solid fa-envelope text-success fs-5 d-block mb-1"></i>
                                    <span class="small fw-semibold">Liên hệ</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
