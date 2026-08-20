@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => $seo['seo_title'] ?? ($cat->name ?? ($category['name'] ?? 'Danh mục sản phẩm')),
        'keywords' => $seo['seo_keyword'] ?? '',
        'description' => $seo['seo_description'] ?? '',
        'image' => !empty($category['image']) ? get_image($category['image']) : (!empty($cat->image) ? get_image($cat->image) : get_image(setting_option('logo'))),
    ])
@endsection

@section('content')
    <div class="container product-list py-4">
        {{-- Breadcrumb --}}
        <div class="post-breadcrumb mb-3">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="separator">/</span>
            <a href="{{ route('product.all') }}">Sản phẩm</a>
            <span class="separator">/</span>
            <span>{{ $category['name'] ?? ($cat->name ?? 'Danh mục') }}</span>
        </div>
        <div class="block product-list py-2">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <h1 class="block-title category-page-title text-center text-uppercase fw-bold mb-3">{{ $category['name'] ?? ($cat->name ?? 'Danh mục sản phẩm') }}</h1>
                    @if (!empty($category['image']))
                        <div class="animate_bn">
                            <a href="javascript:void(0)" class="d-block shadow-lg rounded-4 overflow-hidden">
                                <figure class="cate-banner my-0">
                                    <img class="w-100 object-cover" src="{{ get_image($category['image']) }}" alt="{{ $category['name'] }}">
                                </figure>
                            </a>
                        </div>
                    @elseif (!empty($cat->image))
                        <div class="animate_bn">
                            <a href="javascript:void(0)" class="d-block shadow-lg rounded-4 overflow-hidden">
                                <figure class="cate-banner my-0">
                                    <img class="w-100 object-cover" src="{{ get_image($cat->image) }}" alt="{{ $cat->name }}">
                                </figure>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

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
                        <div class="col-6 col-md-3 mb-4">
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
                                <a class="btn addcart" href="{{ route('product.detail', ['slug' => $pSlug, 'id' => $pId]) }}" title="{{ $pName }}">Xem thêm</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        <p class="text-muted fs-5">Chưa có sản phẩm nào trong danh mục này.</p>
                    </div>
                @endif
            </div>

            @if (method_exists($products, 'links'))
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
