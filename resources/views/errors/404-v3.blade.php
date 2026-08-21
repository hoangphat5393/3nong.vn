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
    @php
        $topCategories = \App\Models\Frontend\Category::where(['status' => 1, 'parent' => 0])
            ->orderBy('sort', 'asc')
            ->limit(4)
            ->get();
    @endphp

    <div class="container py-4">
        {{-- Preview Switcher Bar --}}
        <div class="alert alert-dark bg-dark bg-opacity-75 border-secondary text-white py-2 px-3 mb-4 rounded-3 d-flex flex-wrap align-items-center justify-content-between gap-2 shadow-sm">
            <div class="small fw-semibold">
                <i class="fa-solid fa-palette text-warning me-1"></i> Đang xem: <span class="text-warning">Mẫu 3 (Farm Hub & Gợi Ý Danh Mục)</span>
            </div>
            <div class="btn-group btn-group-sm">
                <a href="{{ route('404.v1') }}" class="btn btn-outline-light">Mẫu 1</a>
                <a href="{{ route('404.v2') }}" class="btn btn-outline-light">Mẫu 2</a>
                <a href="{{ route('404.v3') }}" class="btn btn-warning fw-bold">Mẫu 3</a>
            </div>
        </div>

        {{-- Breadcrumb --}}
        <div class="post-breadcrumb mb-3">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="separator">/</span>
            <span class="text-white">Lỗi 404</span>
        </div>

        {{-- Top Header Section --}}
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-lg-10">
                <div class="bg-dark bg-opacity-40 rounded-4 border border-secondary border-opacity-25 p-4 p-md-5 text-center shadow-sm">
                    <div class="mb-2">
                        <span class="badge bg-danger bg-opacity-25 text-danger border border-danger border-opacity-25 px-3 py-1 rounded-pill fw-bold text-uppercase">
                            <i class="fa-solid fa-compass me-1"></i> Lỗi 404
                        </span>
                    </div>
                    <h1 class="h2 fw-bold text-white text-uppercase mb-2">
                        LẠC ĐƯỜNG RỒI BẠN ƠI!
                    </h1>
                    <p class="text-white-50 mb-4 mx-auto" style="max-width: 580px; font-size: 15px;">
                        Đường dẫn này không tồn tại, nhưng nguồn thực phẩm sạch & vật tư chuẩn xịn của 3 Nông thì luôn sẵn sàng! Hãy gõ tìm kiếm hoặc khám phá các danh mục nổi bật ngay dưới đây:
                    </p>

                    {{-- Search Form --}}
                    <div class="mb-3 mx-auto" style="max-width: 480px;">
                        <form action="{{ route('search') }}" method="GET" class="d-flex bg-white rounded-pill p-1 shadow-sm">
                            <input type="search" name="q" class="form-control border-0 px-3 shadow-none text-dark" placeholder="Gõ tên sản phẩm muốn tìm..." aria-label="Tìm kiếm">
                            <button class="btn btn-success rounded-pill px-4 fw-bold" type="submit">
                                <i class="fa-solid fa-magnifying-glass me-1"></i> Tìm
                            </button>
                        </form>
                    </div>

                    <div class="d-flex justify-content-center gap-2 flex-wrap pt-2">
                        <a href="{{ route('home') }}" class="btn btn-success rounded-pill px-4 py-2 fw-bold">
                            <i class="fa-solid fa-house me-1"></i> Về Trang Chủ
                        </a>
                        <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0932 009 180')) }}" class="btn btn-outline-warning rounded-pill px-4 py-2 fw-bold">
                            <i class="fa-solid fa-phone me-1"></i> Hotline: {{ setting_option('phone', '0932 009 180') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Category Suggestion Grid --}}
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <h3 class="h5 fw-bold text-white text-uppercase mb-3">
                    <i class="fa-solid fa-layer-group text-warning me-2"></i> GỢI Ý DANH MỤC SẢN PHẨM NỔI BẬT
                </h3>
                <div class="row g-3">
                    @if ($topCategories && $topCategories->count() > 0)
                        @foreach ($topCategories as $cat)
                            <div class="col-6 col-md-3">
                                <a href="{{ route('product.category', $cat->slug) }}" class="d-block bg-white rounded-3 p-3 text-center text-decoration-none text-dark shadow-sm h-100" style="transition: all 0.25s ease;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='none'; this.style.boxShadow='';">
                                    @if (!empty($cat->image))
                                        <img src="{{ get_image($cat->image) }}" alt="{{ $cat->name }}" class="rounded-circle mb-2 object-cover" style="width: 56px; height: 56px; border: 2px solid #e8f5e9;">
                                    @else
                                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width: 56px; height: 56px; background: #e8f5e9; color: #2e7d32; font-size: 24px;">
                                            <i class="fa-solid fa-basket-shopping"></i>
                                        </div>
                                    @endif
                                    <div class="fw-bold text-dark text-truncate" title="{{ $cat->name }}">{{ $cat->name }}</div>
                                    <span class="text-success small fw-semibold">Xem ngay <i class="fa-solid fa-arrow-right small"></i></span>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="col-6 col-md-3">
                            <a href="{{ route('product') }}" class="d-block bg-white rounded-3 p-3 text-center text-decoration-none text-dark shadow-sm">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width: 56px; height: 56px; background: #e8f5e9; color: #2e7d32; font-size: 24px;">
                                    <i class="fa-solid fa-cow"></i>
                                </div>
                                <div class="fw-bold">Thịt Bò & Bê</div>
                                <span class="text-success small">Xem ngay <i class="fa-solid fa-arrow-right small"></i></span>
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="{{ route('product') }}" class="d-block bg-white rounded-3 p-3 text-center text-decoration-none text-dark shadow-sm">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width: 56px; height: 56px; background: #e8f5e9; color: #2e7d32; font-size: 24px;">
                                    <i class="fa-solid fa-carrot"></i>
                                </div>
                                <div class="fw-bold">Rau Củ Tươi</div>
                                <span class="text-success small">Xem ngay <i class="fa-solid fa-arrow-right small"></i></span>
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="{{ route('product') }}" class="d-block bg-white rounded-3 p-3 text-center text-decoration-none text-dark shadow-sm">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width: 56px; height: 56px; background: #e8f5e9; color: #2e7d32; font-size: 24px;">
                                    <i class="fa-solid fa-seedling"></i>
                                </div>
                                <div class="fw-bold">Vật Tư Nông Nghiệp</div>
                                <span class="text-success small">Xem ngay <i class="fa-solid fa-arrow-right small"></i></span>
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="{{ route('product') }}" class="d-block bg-white rounded-3 p-3 text-center text-decoration-none text-dark shadow-sm">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width: 56px; height: 56px; background: #e8f5e9; color: #2e7d32; font-size: 24px;">
                                    <i class="fa-solid fa-spray-can"></i>
                                </div>
                                <div class="fw-bold">Bình Xịt & Dụng Cụ</div>
                                <span class="text-success small">Xem ngay <i class="fa-solid fa-arrow-right small"></i></span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
