@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => 'Tìm kiếm: ' . ($keyword ?: 'Tất cả sản phẩm') . ' - ' . setting_option('webtitle', 'Tam Nông'),
        'keywords' => setting_option('keywords', '3nong, thuc pham tam nong, tim kiem san pham'),
        'description' => 'Kết quả tìm kiếm cho từ khóa: ' . ($keyword ?: 'sản phẩm'),
        'image' => get_image(setting_option('logo')),
    ])
@endsection

@section('content')
    <div class="container product-list py-4">
        {{-- Breadcrumb --}}
        <div class="post-breadcrumb mb-3">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="separator">/</span>
            <span class="text-white">Tìm kiếm sản phẩm</span>
            @if (!empty($keyword))
                <span class="separator">/</span>
                <span class="text-warning">"{{ $keyword }}"</span>
            @endif
        </div>

        {{-- Thanh tiêu đề & Form tìm kiếm nhanh --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center bg-dark bg-opacity-25 p-3 p-md-4 rounded-3 border border-secondary border-opacity-25">
                    <div>
                        <h1 class="h3 fw-bold text-success text-uppercase mb-1">
                            <i class="fa-solid fa-magnifying-glass me-2"></i> KẾT QUẢ TÌM KIẾM
                        </h1>
                        @if (!empty($keyword))
                            <p class="text-white-50 mb-0">
                                Từ khóa: <strong class="text-warning">"{{ $keyword }}"</strong>
                                &bull; Tìm thấy <strong class="text-white">{{ $products->total() }}</strong> sản phẩm
                            </p>
                        @else
                            <p class="text-white-50 mb-0">Vui lòng nhập từ khóa để tìm kiếm sản phẩm.</p>
                        @endif
                    </div>
                    <div class="mt-3 mt-md-0" style="max-width: 320px; width: 100%;">
                        <form action="{{ route('search') }}" method="GET" class="d-flex">
                            <input type="search" name="q" class="form-control me-2 py-2" placeholder="Tìm sản phẩm khác..." value="{{ $keyword }}">
                            <button type="submit" class="btn btn-success px-3" aria-label="Tìm kiếm">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Sidebar Danh mục bên trái --}}
            <div class="col-lg-3 d-none d-lg-block mb-4">
                <div class="bg-white p-3 p-md-4 rounded-3 shadow-sm">
                    <h3 class="h6 fw-bold text-success text-uppercase border-bottom pb-2 mb-3">
                        <i class="fa-solid fa-bars me-2"></i> Danh Mục Sản Phẩm
                    </h3>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <a href="{{ route('product') }}" class="d-block py-1 text-decoration-none text-dark fw-bold hover-success">
                                <i class="fa-solid fa-angle-right me-1 text-success small"></i> Tất cả sản phẩm
                            </a>
                        </li>
                        @if (!empty($categories))
                            @foreach ($categories as $cat)
                                <li class="mb-2 border-top pt-2">
                                    <a href="{{ route('product.category', $cat->slug) }}" class="d-block py-1 text-decoration-none text-dark fw-semibold hover-success">
                                        <i class="fa-solid fa-angle-right me-1 text-success small"></i> {{ $cat->name }}
                                    </a>
                                    @if ($cat->children && $cat->children->count() > 0)
                                        <ul class="list-unstyled ps-3 mt-1 mb-0 border-start border-2 border-success border-opacity-25 ms-1">
                                            @foreach ($cat->children as $child)
                                                <li class="py-1">
                                                    <a href="{{ route('product.category', $child->slug) }}" class="text-decoration-none text-muted small hover-success d-block">
                                                        {{ $child->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            {{-- Danh sách sản phẩm bên phải --}}
            <div class="col-lg-9 col-12">
                <div class="row">
                    @if (!empty($products) && $products->count() > 0)
                        @foreach ($products as $v)
                            @php
                                $pSlug = is_array($v) ? $v['slug'] : $v->slug;
                                $pId = is_array($v) ? $v['id'] : $v->id;
                                $pName = is_array($v) ? $v['name'] : $v->name;
                                $pImage = is_array($v) ? $v['image'] : $v->image;
                                $regularPrice = (float) (is_array($v) ? ($v['price'] ?? 0) : ($v->price ?? 0));
                                $salePrice = (float) (is_array($v) ? ($v['sale_price'] ?? 0) : ($v->sale_price ?? 0));
                                $pPriceType = is_array($v) ? ($v['price_type'] ?? '') : ($v->price_type ?? '');
                                $pUnit = is_array($v) ? ($v['unit'] ?? '') : ($v->unit ?? '');
                                $pHasPrice = is_array($v) ? ($v['has_price'] ?? false) : true;

                                $hasPromo = ($salePrice > 0 && $regularPrice > 0 && $salePrice < $regularPrice);
                                $displayPrice = $hasPromo ? $salePrice : $regularPrice;
                                $discountPercent = ($hasPromo && $regularPrice > 0) ? (int) round((($regularPrice - $salePrice) / $regularPrice) * 100) : 0;
                                $unitClean = (!empty($pUnit) && !in_array(strtoupper(trim($pUnit)), ['VNĐ', 'VND', 'Đ'])) ? $pUnit : '';
                            @endphp
                            <div class="col-6 col-md-4 mb-4">
                                <div class="product-list-item">
                                    <a href="{{ route('product.detail', ['slug' => $pSlug, 'id' => $pId]) }}" title="{{ $pName }}">
                                        <figure>
                                            @if ($discountPercent > 0)
                                                <span class="badge-sale-percent">-{{ $discountPercent }}%</span>
                                            @endif
                                            <img class="w-100" src="{{ get_image($pImage) }}" alt="{{ $pName }}">
                                            <figcaption>{{ $pName }}</figcaption>
                                        </figure>
                                    </a>
                                    <div class="price-block">
                                        @if (($pPriceType === 'price' || $pHasPrice) && (float)$displayPrice > 0)
                                            <div class="sale-price-main">
                                                {{ number_format($displayPrice, 0, ',', '.') }}đ{!! !empty($unitClean) ? ' <span class="sale-price-unit">/' . $unitClean . '</span>' : '' !!}
                                            </div>
                                            @if ($hasPromo)
                                                <div class="old-price-sub">
                                                    {{ number_format($regularPrice, 0, ',', '.') }}đ
                                                </div>
                                            @endif
                                        @else
                                            <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}" class="contact-price-text" title="Liên hệ">
                                                <i class="fa-solid fa-phone me-1"></i> Liên hệ báo giá
                                            </a>
                                        @endif
                                    </div>
                                    <a class="btn addcart" href="{{ route('product.detail', ['slug' => $pSlug, 'id' => $pId]) }}" title="{{ $pName }}">Xem chi tiết</a>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-12 mt-3 text-center">
                            {!! $products->appends(request()->input())->links('frontend.pagination.custom') !!}
                        </div>
                    @else
                        <div class="col-12 text-center py-5 px-4 bg-dark bg-opacity-25 rounded-4 border border-secondary border-opacity-25">
                            <div class="mb-3 text-warning opacity-75">
                                <i class="fa-solid fa-box-open fa-4x"></i>
                            </div>
                            <h4 class="text-white fw-bold mb-2">Không tìm thấy sản phẩm phù hợp!</h4>
                            <p class="text-white-50 mb-4" style="max-width: 520px; margin: 0 auto;">
                                @if (!empty($keyword))
                                    Rất tiếc, chúng tôi không tìm thấy sản phẩm nào khớp với từ khóa "<strong class="text-warning">{{ $keyword }}</strong>". Quý khách vui lòng thử lại với từ khóa khác hoặc duyệt danh mục sản phẩm.
                                @else
                                    Vui lòng nhập tên sản phẩm vào ô tìm kiếm để tra cứu thông tin và báo giá.
                                @endif
                            </p>
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                <a href="{{ route('product') }}" class="btn btn-success px-4 py-2 fw-bold">
                                    <i class="fa-solid fa-basket-shopping me-1"></i> Xem Tất Cả Sản Phẩm
                                </a>
                                <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0932 009 180')) }}" class="btn btn-outline-light px-4 py-2 fw-bold">
                                    <i class="fa-solid fa-phone me-1"></i> Hotline: {{ setting_option('phone', '0932 009 180') }}
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
