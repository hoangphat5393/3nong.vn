@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => 'Xem thử Phương Án 2 (Giá Inline Gọn Gàng)',
        'keywords' => '',
        'description' => 'Demo giao diện Phương án 2 cho trang chủ 3 Nông',
        'image' => get_image(setting_option('logo')),
    ])
@endsection

@section('content')
    <!-- THÔNG BÁO DEMO PHƯƠNG ÁN 2 -->
    <div class="bg-warning text-dark text-center py-2 px-3 fw-bold border-bottom shadow-sm">
        <i class="fa-solid fa-vial me-2 text-danger"></i> ĐANG XEM THỬ PHƯƠNG ÁN 2 (GIÁ INLINE GỌN GÀNG)
        <span class="ms-2 fw-normal small text-dark opacity-75">(Trang riêng biệt, không đụng tới trang chủ hiện tại)</span>
        <a href="{{ route('home') }}" class="btn btn-dark btn-sm rounded-pill ms-3 shadow-xs">
            <i class="fa-solid fa-arrow-left me-1"></i> Về Trang Chủ (Phương Án 1)
        </a>
    </div>

    <div id="main">
    <!-- SLIDER -->
    @if (!empty($slides) && count($slides) > 0)
        <div class="container slider">
            <div class="row">
                <div class="col-md-12 p-0 pt-md-2 px-md-3">
                    <div class="swiper slider-swiper">
                        <div class="swiper-wrapper">
                            @foreach ($slides as $s)
                                <div class="swiper-slide">
                                    <a href="{{ $s['link'] ?? '#' }}" title="{{ $s['title'] ?? 'Slide' }}">
                                        <img class="d-block w-100 slide" src="{{ get_image($s['image']) }}" alt="{{ $s['title'] ?? 'Slide' }}" title="{{ $s['title'] ?? 'Slide' }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-prev" aria-label="Trước"></div>
                        <div class="swiper-button-next" aria-label="Sau"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- END SLIDER -->

    <!-- BEST SELL (PHƯƠNG ÁN 2) -->
    <div class="container my-3">
        <div class="block product-list py-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center block-title">
                        <div class="flex-grow-1">
                            <p>Sản phẩm bán chạy <span class="badge bg-success fs-6 ms-2">Demo Phương Án 2</span></p>
                        </div>
                    </div>
                </div>
            </div>

            @if (!empty($products_hot) && count($products_hot) > 0)
                <div class="swiper product-swiper mt-3">
                    <div class="swiper-wrapper">
                        @foreach ($products_hot as $v)
                            @php
                                $regularPrice = (float) ($v->price ?? 0);
                                $salePrice = (float) ($v->sale_price ?? 0);
                                $hasPromo = ($salePrice > 0 && $regularPrice > 0 && $salePrice < $regularPrice);
                                $displayPrice = $hasPromo ? $salePrice : $regularPrice;
                                $discountPercent = ($hasPromo && $regularPrice > 0) ? (int) round((($regularPrice - $salePrice) / $regularPrice) * 100) : 0;
                                $unitClean = (!empty($v->unit) && !in_array(strtoupper(trim($v->unit)), ['VNĐ', 'VND', 'Đ'])) ? $v->unit : '';
                            @endphp
                            <div class="swiper-slide">
                                <div class="product-list">
                                    <div class="product-list-item">
                                        <a href="{{ route('product.detail', ['slug' => $v->slug, 'id' => $v->id]) }}" title="{{ $v->name }}">
                                            <figure>
                                                <img class="w-100" src="{{ get_image($v->image) }}" alt="{{ $v->name }}">
                                                <figcaption>{{ $v->name }}</figcaption>
                                            </figure>
                                        </a>
                                        <div class="price-block-opt2">
                                            @if ($v->price_type === 'price' && (float)$displayPrice > 0)
                                                <div class="price-line-primary">
                                                    <span class="sale-price-opt2">{{ number_format($displayPrice, 0, ',', '.') }}đ{!! !empty($unitClean) ? ' <span class="sale-price-unit">/' . $unitClean . '</span>' : '' !!}</span>
                                                    @if ($hasPromo)
                                                        <span class="badge-inline-sale">-{{ $discountPercent }}%</span>
                                                    @endif
                                                </div>
                                                @if ($hasPromo)
                                                    <div class="old-price-inline">
                                                        <s>{{ number_format($regularPrice, 0, ',', '.') }}đ</s>
                                                    </div>
                                                @endif
                                            @else
                                                <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}" class="contact-price-text" title="Liên hệ">
                                                    <i class="fa-solid fa-phone me-1"></i> Liên hệ báo giá
                                                </a>
                                            @endif
                                        </div>
                                        <a class="btn addcart" href="{{ route('product.detail', ['slug' => $v->slug, 'id' => $v->id]) }}" title="{{ $v->name }}">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- END BEST SELL -->

    <!-- MAIN PRODUCT CATEGORIES (PHƯƠNG ÁN 2) -->
    @if (!empty($cat_product) && count($cat_product) > 0)
        @foreach ($cat_product as $cat)
            @if ($cat->image)
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-md-12 animate_bn">
                            <a href="{{ route('product.category', $cat->slug) }}" title="{{ $cat->name }}">
                                <figure class="cate-banner">
                                    <img class="w-100" src="{{ get_image($cat->image) }}" alt="{{ $cat->name }}">
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <div class="container mb-3">
                <div class="block product-list py-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center block-title">
                                <div class="flex-grow-1">
                                    <p>{{ $cat->name }}</p>
                                </div>
                                <a href="{{ route('product.category', $cat->slug) }}" class="show-more pe-2">Xem tất cả <i class="fa-solid fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    @if ($cat->products->isNotEmpty())
                        <div class="swiper product-swiper mt-3">
                            <div class="swiper-wrapper">
                                @foreach ($cat->products as $v1)
                                    @php
                                        $regularPrice1 = (float) ($v1->price ?? 0);
                                        $salePrice1 = (float) ($v1->sale_price ?? 0);
                                        $hasPromo1 = ($salePrice1 > 0 && $regularPrice1 > 0 && $salePrice1 < $regularPrice1);
                                        $displayPrice1 = $hasPromo1 ? $salePrice1 : $regularPrice1;
                                        $discountPercent1 = ($hasPromo1 && $regularPrice1 > 0) ? (int) round((($regularPrice1 - $salePrice1) / $regularPrice1) * 100) : 0;
                                        $unitClean1 = (!empty($v1->unit) && !in_array(strtoupper(trim($v1->unit)), ['VNĐ', 'VND', 'Đ'])) ? $v1->unit : '';
                                    @endphp
                                    <div class="swiper-slide">
                                        <div class="product-list">
                                            <div class="product-list-item">
                                                <a href="{{ route('product.detail', ['slug' => $v1->slug, 'id' => $v1->id]) }}" title="{{ $v1->name }}">
                                                    <figure>
                                                        <img class="w-100" src="{{ get_image($v1->image) }}" alt="{{ $v1->name }}">
                                                        <figcaption>{{ $v1->name }}</figcaption>
                                                    </figure>
                                                </a>
                                                <div class="price-block-opt2">
                                                    @if ($v1->price_type === 'price' && (float)$displayPrice1 > 0)
                                                        <div class="price-line-primary">
                                                            <span class="sale-price-opt2">{{ number_format($displayPrice1, 0, ',', '.') }}đ{!! !empty($unitClean1) ? ' <span class="sale-price-unit">/' . $unitClean1 . '</span>' : '' !!}</span>
                                                            @if ($hasPromo1)
                                                                <span class="badge-inline-sale">-{{ $discountPercent1 }}%</span>
                                                            @endif
                                                        </div>
                                                        @if ($hasPromo1)
                                                            <div class="old-price-inline">
                                                                <s>{{ number_format($regularPrice1, 0, ',', '.') }}đ</s>
                                                            </div>
                                                        @endif
                                                    @else
                                                        <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}" class="contact-price-text" title="Liên hệ">
                                                            <i class="fa-solid fa-phone me-1"></i> Liên hệ báo giá
                                                        </a>
                                                    @endif
                                                </div>
                                                <a class="btn addcart" href="{{ route('product.detail', ['slug' => $v1->slug, 'id' => $v1->id]) }}" title="{{ $v1->name }}">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
    <!-- END MAIN PRODUCT CATEGORIES -->
    </div>
@endsection
