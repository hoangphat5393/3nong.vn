@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => $product->name . ' - 3 Nông',
        'keywords' => $product->seo_keyword ?? $product->name,
        'description' => $product->seo_description ?? strip_tags($product->description),
        'image' => get_image($product->image),
    ])
@endsection

@section('content')
    @php
        use Illuminate\Support\Str;
        use Illuminate\Support\Facades\File;

        $galleryRaw = [];
        if (!empty($product->gallery)) {
            $unserialized = is_array($product->gallery) ? $product->gallery : @unserialize($product->gallery);
            if (empty($unserialized) && is_string($product->gallery)) {
                $unserialized = json_decode($product->gallery, true);
            }
            if (is_array($unserialized)) {
                $galleryRaw = array_values(array_filter($unserialized));
            }
        }

        $validGallery = [];
        foreach ($galleryRaw as $img) {
            if (!empty($img) && (Str::startsWith($img, 'http') || File::exists(public_path(ltrim($img, '/'))))) {
                $validGallery[] = $img;
            }
        }

        if (
            !empty($product->image) &&
            (Str::startsWith($product->image, 'http') || File::exists(public_path(ltrim($product->image, '/'))))
        ) {
            $validGallery = array_diff($validGallery, [$product->image]);
            array_unshift($validGallery, $product->image);
        }

        if (empty($validGallery)) {
            $validGallery = [$product->image ?: 'assets/images/placeholder.png'];
        }
        $galleryImages = $validGallery;
    @endphp

    <div class="container py-4">
        {{-- Breadcrumb --}}
        <div class="post-breadcrumb mb-3">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="separator">/</span>
            <a href="{{ route('product.all') }}">Sản phẩm</a>
            @if (isset($cat))
                <span class="separator">/</span>
                <a href="{{ route('product.category', ['slug' => $cat->slug, 'id' => $cat->id]) }}">{{ $cat->name }}</a>
            @endif
            <span class="separator">/</span>
            <span>{{ Str::limit($product->name ?? 'Chi tiết sản phẩm', 60) }}</span>
        </div>
        <div class="row product-detail">
            <div class="col-md-12">
                <div class="row">
                    <!-- GALLERY IMAGES -->
                    <div class="col-md-6 mb-4">
                        <div class="product-gallery">
                            <div class="swiper product-main-slider mb-4">
                                <div class="swiper-wrapper">
                                    @foreach ($galleryImages as $img)
                                        <div class="swiper-slide text-center bg-white">
                                            <img src="{{ get_image($img) }}" alt="{{ $product->name }}"
                                                class="img-fluid w-100" style="max-height: 450px; object-fit: contain;"
                                                loading="lazy">
                                        </div>
                                    @endforeach
                                </div>
                                @if (count($galleryImages) > 1)
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                @endif
                            </div>

                            @if (count($galleryImages) > 1)
                                <div class="swiper product-thumb-slider pb-2">
                                    <div class="swiper-wrapper">
                                        @foreach ($galleryImages as $img)
                                            <div class="swiper-slide">
                                                <div class="thumb-item">
                                                    <img src="{{ get_image($img) }}" alt="{{ $product->name }}"
                                                        class="img-fluid w-100" style="height: 80px; object-fit: cover;"
                                                        loading="lazy">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- PRODUCT INFO -->
                    <div class="col-md-6 mb-4">
                        <h1 class="pro-title h2 mb-3 fw-bold text-success">{{ $product->name }}</h1>

                        @php
                            $regularPrice = (float) ($product->price ?? 0);
                            $salePrice = (float) ($product->sale_price ?? 0);
                            $hasSinglePromo = ($salePrice > 0 && $regularPrice > 0 && $salePrice < $regularPrice);
                            $displaySinglePrice = $hasSinglePromo ? $salePrice : $regularPrice;
                            $singleDiscountPercent = $hasSinglePromo && $regularPrice > 0 ? (int) round((($regularPrice - $salePrice) / $regularPrice) * 100) : 0;
                        @endphp
                        <div class="price-block mb-3 p-3 bg-light rounded">
                            @if ($product->price_type === 'price' && (float) $displaySinglePrice > 0)
                                <span class="fs-4 text-danger fw-bold me-2">Giá:
                                    {{ number_format($displaySinglePrice, 0, ',', '.') }} VNĐ{!! !empty($product->unit) ? '/<sub>' . $product->unit . '</sub>' : '' !!}</span>
                                @if ($hasSinglePromo)
                                    <span
                                        class="text-decoration-line-through text-muted me-2">{{ number_format($regularPrice, 0, ',', '.') }}
                                        VNĐ</span>
                                    <span class="badge bg-danger ms-1">-{{ $singleDiscountPercent }}%</span>
                                @endif
                            @else
                                <span class="fs-4 text-danger fw-bold">Giá: <a
                                        href="tel:{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}"
                                        title="Liên hệ">Liên hệ</a></span>
                            @endif
                        </div>

                        <div class="pro-desc mb-4 text-secondary">
                            <span class="pro-desc-label fw-bold text-dark d-block mb-2">Mô tả ngắn:</span>
                            {!! $product->desc ?? 'Chưa có mô tả cho sản phẩm này.' !!}
                        </div>

                        @if (!empty($product->attributes) && is_array($product->attributes))
                            <div class="pro-attr mb-4">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($product->attributes as $attr)
                                        <li class="mb-2"><strong class="text-dark">{{ $attr['name'] ?? '' }}:</strong>
                                            {{ $attr['value'] ?? '' }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="d-flex flex-wrap gap-2 mt-4">
                            <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}"
                                class="btn btn-success btn-lg px-4 fw-bold">
                                <i class="fa-solid fa-phone me-2"></i> GỌI ĐẶT HÀNG:
                                {{ setting_option('phone', '0938.133.830') }}
                            </a>
                            <a href="https://zalo.me/{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}"
                                target="_blank" class="btn btn-outline-primary btn-lg px-4 fw-bold">
                                Chat Zalo Tư Vấn
                            </a>
                        </div>
                    </div>
                </div>

                <!-- PRODUCT DESCRIPTION TABS / CONTENT -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-success text-white py-3">
                                <h3 class="card-title h5 mb-0 fw-bold"><i class="fa-solid fa-file-lines me-2"></i> Chi
                                    Tiết Sản Phẩm</h3>
                            </div>
                            <div class="card-body p-4 product-content-body">
                                {!! $product->content !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RELATIVE PRODUCTS -->
                @if (isset($relative_products) && count($relative_products) > 0)
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="d-flex align-items-center block-title mb-4">
                                <div class="flex-grow-1">
                                    <h2 class="text-uppercase m-0 fw-bold text-success fs-5">Sản Phẩm Cùng Loại</h2>
                                </div>
                            </div>
                            <div class="swiper product-swiper pb-4">
                                <div class="swiper-wrapper">
                                    @foreach ($relative_products as $v)
                                        <div class="swiper-slide">
                                            <div class="product-list-item">
                                                <a href="{{ route('product', ['slug' => $v->slug, 'id' => $v->id]) }}"
                                                    title="{{ $v->name }}">
                                                    <figure>
                                                        <img class="w-100" src="{{ get_image($v->image) }}"
                                                            alt="{{ $v->name }}">
                                                        <figcaption>{{ $v->name }}</figcaption>
                                                    </figure>
                                                </a>
                                                <div class="price">
                                                    @if ($v->price_type === 'price' && (float) $v->price > 0)
                                                        Giá: <span
                                                            class="sale-price">{{ number_format($v->price, 0, ',', '.') }}
                                                            VNĐ</span>
                                                    @else
                                                        Giá: <a
                                                            href="tel:{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}"
                                                            title="Liên hệ">Liên hệ</a>
                                                    @endif
                                                </div>
                                                <a class="btn addcart"
                                                    href="{{ route('product', ['slug' => $v->slug, 'id' => $v->id]) }}"
                                                    title="{{ $v->name }}">Xem thêm</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var gallery = document.querySelector('.product-gallery');
            if (!gallery) return;

            var mainEl = gallery.querySelector('.product-main-slider');
            var thumbsEl = gallery.querySelector('.product-thumb-slider');
            if (!mainEl) return;

            var thumbsSwiper = null;
            if (thumbsEl) {
                thumbsSwiper = new Swiper(thumbsEl, {
                    spaceBetween: 10,
                    slidesPerView: 4,
                    slidesPerGroup: 1,
                    freeMode: true,
                    watchSlidesProgress: true,
                    slideToClickedSlide: true,
                    watchOverflow: true,
                });
            }

            var mainSwiper = new Swiper(mainEl, {
                spaceBetween: 10,
                observer: true,
                observeParents: true,
                navigation: {
                    nextEl: mainEl.querySelector('.swiper-button-next'),
                    prevEl: mainEl.querySelector('.swiper-button-prev'),
                },
                thumbs: thumbsSwiper ? {
                    swiper: thumbsSwiper,
                } : undefined,
            });
        });
    </script>
@endpush
