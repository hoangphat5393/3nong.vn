@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => $seo['seo_title'] ?? '3 Nông - Vật Tư Nông Nghiệp',
        'keywords' => $seo['seo_keyword'] ?? '',
        'description' => $seo['seo_description'] ?? '',
        'image' => $seo['seo_image'] ?? get_image(setting_option('logo')),
    ])
@endsection

@section('content')
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
                                            <img class="d-block w-100 slide" src="{{ get_image($s['image']) }}"
                                                alt="{{ $s['title'] ?? 'Slide' }}" title="{{ $s['title'] ?? 'Slide' }}">
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

        <!-- BEST SELL -->
        <div class="container my-3">
            <div class="block product-list py-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center block-title">
                            <div class="flex-grow-1">
                                <p>Sản phẩm bán chạy</p>
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
                                    $discountPercent =
                                        $hasPromo && $regularPrice > 0 ? (int) round((($regularPrice - $salePrice) / $regularPrice) * 100) : 0;
                                    $unitClean =
                                        !empty($v->unit) && !in_array(strtoupper(trim($v->unit)), ['VNĐ', 'VND', 'Đ'])
                                            ? $v->unit
                                            : '';
                                @endphp
                                <div class="swiper-slide">
                                    <div class="product-list">
                                        <div class="product-list-item">
                                            <a href="{{ route('product.detail', ['slug' => $v->slug, 'id' => $v->id]) }}"
                                                title="{{ $v->name }}">
                                                <figure>
                                                    @if ($discountPercent > 0)
                                                        <span class="badge-sale-percent">-{{ $discountPercent }}%</span>
                                                    @endif
                                                    <img class="w-100" src="{{ get_image($v->image) }}"
                                                        alt="{{ $v->name }}">
                                                    <figcaption>{{ $v->name }}</figcaption>
                                                </figure>
                                            </a>
                                            <div class="price-block">
                                                @if ($v->price_type === 'price' && (float) $displayPrice > 0)
                                                    <div class="sale-price-main">
                                                        {{ number_format($displayPrice, 0, ',', '.') }}đ{!! !empty($unitClean) ? ' <span class="sale-price-unit">/' . $unitClean . '</span>' : '' !!}
                                                    </div>
                                                    @if ($hasPromo)
                                                        <div class="old-price-sub">
                                                            {{ number_format($regularPrice, 0, ',', '.') }}đ
                                                        </div>
                                                    @endif
                                                @else
                                                    <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}"
                                                        class="contact-price-text" title="Liên hệ">
                                                        <i class="fa-solid fa-phone me-1"></i> Liên hệ báo giá
                                                    </a>
                                                @endif
                                            </div>
                                            <a class="btn addcart"
                                                href="{{ route('product.detail', ['slug' => $v->slug, 'id' => $v->id]) }}"
                                                title="{{ $v->name }}">Xem thêm</a>
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

        <!-- MAIN PRODUCT CATEGORIES -->
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
                                    <a href="{{ route('product.category', $cat->slug) }}" class="show-more pe-2">Xem tất cả
                                        <i class="fa-solid fa-angle-right"></i></a>
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
                                            $discountPercent1 =
                                                $hasPromo1 && $regularPrice1 > 0
                                                    ? (int) round((($regularPrice1 - $salePrice1) / $regularPrice1) * 100)
                                                    : 0;
                                            $unitClean1 =
                                                !empty($v1->unit) &&
                                                !in_array(strtoupper(trim($v1->unit)), ['VNĐ', 'VND', 'Đ'])
                                                    ? $v1->unit
                                                    : '';
                                        @endphp
                                        <div class="swiper-slide">
                                            <div class="product-list">
                                                <div class="product-list-item">
                                                    <a href="{{ route('product.detail', ['slug' => $v1->slug, 'id' => $v1->id]) }}"
                                                        title="{{ $v1->name }}">
                                                        <figure>
                                                            @if ($discountPercent1 > 0)
                                                                <span
                                                                    class="badge-sale-percent">-{{ $discountPercent1 }}%</span>
                                                            @endif
                                                            <img class="w-100" src="{{ get_image($v1->image) }}"
                                                                alt="{{ $v1->name }}">
                                                            <figcaption>{{ $v1->name }}</figcaption>
                                                        </figure>
                                                    </a>
                                                    <div class="price-block">
                                                        @if ($v1->price_type === 'price' && (float) $displayPrice1 > 0)
                                                            <div class="sale-price-main">
                                                                {{ number_format($displayPrice1, 0, ',', '.') }}đ{!! !empty($unitClean1) ? ' <span class="sale-price-unit">/' . $unitClean1 . '</span>' : '' !!}
                                                            </div>
                                                            @if ($hasPromo1)
                                                                <div class="old-price-sub">
                                                                    {{ number_format($regularPrice1, 0, ',', '.') }}đ
                                                                </div>
                                                            @endif
                                                        @else
                                                            <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}"
                                                                class="contact-price-text" title="Liên hệ">
                                                                <i class="fa-solid fa-phone me-1"></i> Liên hệ báo giá
                                                            </a>
                                                        @endif
                                                    </div>
                                                    <a class="btn addcart"
                                                        href="{{ route('product.detail', ['slug' => $v1->slug, 'id' => $v1->id]) }}"
                                                        title="{{ $v1->name }}">Xem thêm</a>
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

        <!-- POST & EVENT -->
        @if (!empty($post_list) && count($post_list) > 0)
            <div class="bg-warp-news py-5">
                <div class="container home-news">
                    <!-- Section Header -->
                    <div
                        class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-3 border-bottom border-white border-opacity-25">
                        <div>
                            <span
                                class="badge bg-white text-success px-3 py-2 rounded-pill fw-bold text-uppercase mb-2 d-inline-block shadow-sm">
                                <i class="fa-solid fa-newspaper me-1"></i> Góc chia sẻ & Kiến thức
                            </span>
                            <h2 class="h3 fw-bold text-white mb-0">Tin Tức & Sự Kiện</h2>
                        </div>
                        <div class="mt-3 mt-sm-0">
                            <a href="{{ route('news') }}"
                                class="btn btn-news-more btn-sm rounded-pill px-4 fw-semibold shadow-sm">
                                Xem tất cả bài viết <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Section Body -->
                    <div class="row g-4">
                        @php $firstPost = $post_list->first(); @endphp
                        <!-- Featured Main Article (Left) -->
                        <div class="col-12 col-lg-5">
                            <div
                                class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden bg-white text-dark group-hover-zoom">
                                <div class="position-relative overflow-hidden" style="height: 240px;">
                                    <a href="{{ route('news.detail', ['slug' => data_get($firstPost, 'slug'), 'id' => data_get($firstPost, 'id')]) }}"
                                        title="{{ data_get($firstPost, 'name') }}">
                                        <img src="{{ get_image(data_get($firstPost, 'image')) }}"
                                            alt="{{ data_get($firstPost, 'name') }}"
                                            class="w-full h-full object-cover transition-transform duration-500 hover-scale"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </a>
                                    <span
                                        class="badge bg-success position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill shadow-sm">
                                        Nổi bật
                                    </span>
                                </div>
                                <div class="card-body p-4 d-flex flex-column">
                                    <div class="text-muted small mb-2 d-flex align-items-center">
                                        <i class="fa-regular fa-calendar-days text-success me-1"></i>
                                        {{ Carbon\Carbon::parse(data_get($firstPost, 'created_at') ?? now())->format('d/m/Y') }}
                                    </div>
                                    <h3 class="h5 fw-bold mb-3">
                                        <a href="{{ route('news.detail', ['slug' => data_get($firstPost, 'slug'), 'id' => data_get($firstPost, 'id')]) }}"
                                            class="text-dark text-decoration-none hover-success-text line-clamp-2">
                                            {{ data_get($firstPost, 'name') }}
                                        </a>
                                    </h3>
                                    <p class="text-muted small mb-4 line-clamp-3">
                                        {{ Str::limit(strip_tags((string) data_get($firstPost, 'description')), 140) }}
                                    </p>
                                    <div class="mt-auto pt-2">
                                        <a href="{{ route('news.detail', ['slug' => data_get($firstPost, 'slug'), 'id' => data_get($firstPost, 'id')]) }}"
                                            class="btn btn-success btn-sm rounded-pill px-4 fw-semibold shadow-sm">
                                            Đọc tiếp <i class="fa-solid fa-angle-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent News Articles List (Right) -->
                        <div class="col-12 col-lg-7">
                            <div class="news-scroll-container pe-2" style="max-height: 480px; overflow-y: auto;">
                                @foreach ($post_list->slice(1) as $post)
                                    @php
                                        $pSlug = data_get($post, 'slug');
                                        $pId = data_get($post, 'id');
                                        $pTitle = data_get($post, 'name') ?: data_get($post, 'title') ?: 'Bài viết';
                                        $pImage = data_get($post, 'image');
                                        $pDesc = data_get($post, 'description');
                                        $pDate = data_get($post, 'created_at');
                                    @endphp
                                    <div
                                        class="card border-0 shadow-sm rounded-3 mb-3 bg-white overflow-hidden hover-card-lift transition">
                                        <div class="card-body p-3">
                                            <div class="row align-items-center g-3">
                                                <div class="col-4 col-sm-3">
                                                    <a href="{{ route('news.detail', ['slug' => $pSlug, 'id' => $pId]) }}"
                                                        title="{{ $pTitle }}">
                                                        <img class="img-fluid rounded-3 w-100 object-cover shadow-xs"
                                                            src="{{ get_image($pImage) }}" alt="{{ $pTitle }}"
                                                            style="height: 90px; object-fit: cover;">
                                                    </a>
                                                </div>
                                                <div class="col-8 col-sm-9">
                                                    <div class="text-muted extra-small mb-1 d-flex align-items-center">
                                                        <span
                                                            class="badge bg-success bg-opacity-10 text-success me-2 px-2 py-1 rounded">Tin
                                                            tức</span>
                                                        @if (!empty($pDate))
                                                            <i class="fa-regular fa-clock text-muted me-1"></i>
                                                            {{ Carbon\Carbon::parse($pDate)->format('d/m/Y') }}
                                                        @endif
                                                    </div>
                                                    <h4 class="h6 fw-bold mb-1">
                                                        <a href="{{ route('news.detail', ['slug' => $pSlug, 'id' => $pId]) }}"
                                                            class="text-dark text-decoration-none hover-success-text line-clamp-2"
                                                            style="line-height: 1.4;">
                                                            {{ $pTitle }}
                                                        </a>
                                                    </h4>
                                                    <p class="text-muted small mb-0 line-clamp-1 d-none d-sm-block">
                                                        {{ Str::limit(strip_tags((string) $pDesc), 90) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- END POST & EVENT -->
    @endsection
