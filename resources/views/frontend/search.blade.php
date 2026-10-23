@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => 'Tìm kiếm: ' . ($keyword ?: 'Tất cả kết quả') . ' - ' . setting_option('webtitle', 'Tam Nông'),
        'keywords' => setting_option('keywords', '3nong, thuc pham tam nong, tim kiem san pham, bai viet tam nong'),
        'description' => 'Kết quả tìm kiếm cho từ khóa: ' . ($keyword ?: 'sản phẩm & bài viết'),
        'image' => get_image(setting_option('logo')),
    ])
@endsection

@section('content')
    <div class="container product-list py-4">
        {{-- Breadcrumb --}}
        <div class="post-breadcrumb mb-3">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="separator">/</span>
            <span class="text-white">Tìm kiếm</span>
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
                                và <strong class="text-white">{{ $posts->total() }}</strong> bài viết
                            </p>
                        @else
                            <p class="text-white-50 mb-0">Vui lòng nhập từ khóa để tìm kiếm sản phẩm hoặc bài viết.</p>
                        @endif
                    </div>
                    <div class="mt-3 mt-md-0" style="max-width: 340px; width: 100%;">
                        <form action="{{ route('search') }}" method="GET" class="d-flex">
                            <input type="search" name="q" class="form-control me-2 py-2" placeholder="Tìm sản phẩm, bài viết..." value="{{ $keyword }}">
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

                {{-- Khối liên hệ hỗ trợ nhanh --}}
                <div class="bg-white p-3 p-md-4 rounded-3 shadow-sm mt-3">
                    <h4 class="h6 fw-bold text-success text-uppercase border-bottom pb-2 mb-2">
                        <i class="fa-solid fa-headset me-2"></i> Hỗ Trợ Tư Vấn
                    </h4>
                    <p class="small text-muted mb-2">Quý khách chưa tìm thấy sản phẩm hoặc thông tin mong muốn?</p>
                    <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}" class="btn btn-outline-success btn-sm w-100 fw-bold">
                        <i class="fa-solid fa-phone me-1"></i> {{ setting_option('phone', '0938.133.830') }}
                    </a>
                </div>
            </div>

            {{-- Khu vực hiển thị kết quả tìm kiếm bên phải --}}
            <div class="col-lg-9 col-12">
                {{-- Tabs Chuyển đổi giữa Sản Phẩm và Bài Viết --}}
                <ul class="nav nav-pills search-custom-pills mb-4 gap-2" id="searchTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ ($activeTab ?? 'products') === 'products' ? 'active' : '' }}"
                            id="products-tab" data-bs-toggle="pill" data-bs-target="#products-content" type="button"
                            role="tab" aria-controls="products-content" aria-selected="{{ ($activeTab ?? 'products') === 'products' ? 'true' : 'false' }}">
                            <i class="fa-solid fa-box-open me-2"></i> Sản Phẩm ({{ $products->total() }})
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ ($activeTab ?? 'products') === 'posts' ? 'active' : '' }}"
                            id="posts-tab" data-bs-toggle="pill" data-bs-target="#posts-content" type="button"
                            role="tab" aria-controls="posts-content" aria-selected="{{ ($activeTab ?? 'products') === 'posts' ? 'true' : 'false' }}">
                            <i class="fa-solid fa-newspaper me-2"></i> Bài Viết & Kiến Thức ({{ $posts->total() }})
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="searchTabContent">
                    {{-- TAB 1: KẾT QUẢ SẢN PHẨM --}}
                    <div class="tab-pane fade {{ ($activeTab ?? 'products') === 'products' ? 'show active' : '' }}"
                        id="products-content" role="tabpanel" aria-labelledby="products-tab">
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
                                                    <img class="w-100" src="{{ get_image($pImage) }}" alt="{{ $pName }}"
                                                        loading="lazy"
                                                        decoding="async"
                                                        onerror="this.onerror=null;this.src='{{ asset('assets/images/placeholder.png') }}';this.classList.add('img-fallback');">
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
                                    <p class="text-white-50 mb-4" style="max-width: 540px; margin: 0 auto;">
                                        @if (!empty($keyword))
                                            Không có sản phẩm nào khớp với từ khóa "<strong class="text-warning">{{ $keyword }}</strong>".
                                            @if ($posts->total() > 0)
                                                <br><span class="text-success fw-bold">Tuy nhiên hệ thống tìm thấy {{ $posts->total() }} bài viết có thông tin liên quan!</span>
                                            @endif
                                        @else
                                            Vui lòng nhập tên sản phẩm hoặc nội dung cần tra cứu vào ô tìm kiếm.
                                        @endif
                                    </p>
                                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                                        @if ($posts->total() > 0)
                                            <button type="button" class="btn btn-warning px-4 py-2 fw-bold text-dark" onclick="document.getElementById('posts-tab').click()">
                                                <i class="fa-solid fa-newspaper me-1"></i> Xem {{ $posts->total() }} Bài Viết Tìm Thấy
                                            </button>
                                        @endif
                                        <a href="{{ route('product') }}" class="btn btn-success px-4 py-2 fw-bold">
                                            <i class="fa-solid fa-basket-shopping me-1"></i> Xem Tất Cả Sản Phẩm
                                        </a>
                                        <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}" class="btn btn-outline-light px-4 py-2 fw-bold">
                                            <i class="fa-solid fa-phone me-1"></i> Hotline: {{ setting_option('phone', '0938.133.830') }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- TAB 2: KẾT QUẢ BÀI VIẾT & TIN TỨC --}}
                    <div class="tab-pane fade {{ ($activeTab ?? 'products') === 'posts' ? 'show active' : '' }}"
                        id="posts-content" role="tabpanel" aria-labelledby="posts-tab">
                        <div class="row">
                            @if (!empty($posts) && $posts->count() > 0)
                                @foreach ($posts as $post)
                                    @php
                                        $postId = data_get($post, 'id');
                                        $postSlug = data_get($post, 'slug') ?: Str::slug(data_get($post, 'name') ?: data_get($post, 'title') ?: '');
                                        $postTitle = data_get($post, 'title') ?: data_get($post, 'name') ?: 'Bài viết';
                                        $postImage = data_get($post, 'image') ?: data_get($post, 'avt_show_main_post') ?: get_image(setting_option('logo'));
                                        $postDesc = data_get($post, 'description') ?: data_get($post, 'description_html') ?: '';
                                        $postDate = data_get($post, 'created_at');
                                    @endphp
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden bg-white hover-card-lift transition">
                                            <a href="{{ route('news.detail', ['slug' => $postSlug, 'id' => $postId]) }}">
                                                <img src="{{ get_image($postImage) }}" class="card-img-top" alt="{{ $postTitle }}" style="height: 200px; object-fit: cover;"
                                                    loading="lazy" decoding="async"
                                                    onerror="this.onerror=null;this.src='{{ asset('assets/images/placeholder.png') }}';this.classList.add('img-fallback');">
                                            </a>
                                            <div class="card-body p-3 d-flex flex-column">
                                                @if (!empty($postDate))
                                                    <div class="text-muted small mb-1">
                                                        <i class="fa-regular fa-calendar-days text-success me-1"></i>
                                                        {{ \Carbon\Carbon::parse($postDate)->format('d/m/Y') }}
                                                    </div>
                                                @endif
                                                <h3 class="h6 fw-bold mb-2">
                                                    <a href="{{ route('news.detail', ['slug' => $postSlug, 'id' => $postId]) }}" class="text-dark text-decoration-none hover-success line-clamp-2">
                                                        {{ $postTitle }}
                                                    </a>
                                                </h3>
                                                <p class="text-muted small mb-3 line-clamp-2">
                                                    {{ Str::limit(strip_tags((string) $postDesc), 110) }}
                                                </p>
                                                <div class="mt-auto pt-2 border-top">
                                                    <a href="{{ route('news.detail', ['slug' => $postSlug, 'id' => $postId]) }}" class="btn btn-outline-success btn-sm rounded-pill px-3">
                                                        Đọc bài viết <i class="fa-solid fa-angle-right ms-1"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-12 mt-3 text-center">
                                    {!! $posts->appends(request()->input())->links('frontend.pagination.custom') !!}
                                </div>
                            @else
                                <div class="col-12 text-center py-5 px-4 bg-dark bg-opacity-25 rounded-4 border border-secondary border-opacity-25">
                                    <div class="mb-3 text-warning opacity-75">
                                        <i class="fa-solid fa-newspaper fa-4x"></i>
                                    </div>
                                    <h4 class="text-white fw-bold mb-2">Không tìm thấy bài viết nào phù hợp!</h4>
                                    <p class="text-white-50 mb-4" style="max-width: 520px; margin: 0 auto;">
                                        @if (!empty($keyword))
                                            Rất tiếc, chúng tôi không tìm thấy bài viết hay tin tức nào khớp với từ khóa "<strong class="text-warning">{{ $keyword }}</strong>".
                                        @else
                                            Vui lòng nhập từ khóa để tìm kiếm bài viết kỹ thuật và kinh nghiệm nông nghiệp.
                                        @endif
                                    </p>
                                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                                        <a href="{{ route('news') }}" class="btn btn-success px-4 py-2 fw-bold">
                                            <i class="fa-solid fa-newspaper me-1"></i> Xem Tất Cả Bài Viết
                                        </a>
                                        <a href="{{ route('home') }}" class="btn btn-outline-light px-4 py-2 fw-bold">
                                            <i class="fa-solid fa-house me-1"></i> Về Trang Chủ
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
