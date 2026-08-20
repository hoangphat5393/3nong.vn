@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => $seo['seo_title'] ?? ($cat->name ?? 'Danh sách sản phẩm'),
        'keywords' => $seo['seo_keyword'] ?? '',
        'description' => $seo['seo_description'] ?? '',
        'image' => isset($cat->image) ? get_image($cat->image) : get_image(setting_option('logo')),
    ])
@endsection

@section('content')
    <div class="container product-list py-4">
        {{-- Breadcrumb --}}
        <div class="post-breadcrumb mb-3">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="separator">/</span>
            <span>Sản phẩm</span>
            @if (isset($cat))
                <span class="separator">/</span>
                <span>{{ $cat->name }}</span>
            @endif
        </div>
        <div class="block product-list py-2">
            <div class="row">
                @if (isset($cat))
                    <div class="col-md-12 mb-4">
                        <h2 class="block-title category-page-title text-center mb-3">{{ $cat->name }}</h2>
                        @if (!empty($cat->image))
                            <div class="animate_bn">
                                <a href="javascript:void(0)" class="d-block shadow-lg rounded-4 overflow-hidden">
                                    <figure class="cate-banner my-0">
                                        <img class="w-100 object-cover" src="{{ get_image($cat->image) }}" alt="{{ $cat->name }}">
                                    </figure>
                                </a>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="col-md-12 mb-3">
                        <h2 class="block-title category-page-title text-center">Tất Cả Sản Phẩm</h2>
                    </div>
                @endif
            </div>

            <div class="row">
                @if (!empty($products) && count($products) > 0)
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

            @if (!empty($products) && is_object($products) && method_exists($products, 'links'))
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
