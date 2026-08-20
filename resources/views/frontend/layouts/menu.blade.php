@php
    $productCategories = \App\Models\Frontend\Category::where('status', 1)
        ->where('parent', 0)
        ->orderBy('sort', 'asc')
        ->with(['children' => function($q) {
            $q->where('status', 1)->orderBy('sort', 'asc');
        }])
        ->get();
@endphp

<nav class="navbar navbar-expand-lg navbar-dark sticky-top main-menu">
    <div class="container">

        <button class="navbar-toggler d-lg-none border-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mainMenuOffcanvas" aria-controls="mainMenuOffcanvas" aria-label="Mở menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse d-none d-lg-flex" id="navbarDesktop">

            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <div class="dropdown product-menu">
                        <button class="btn dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span> Danh mục sản phẩm
                        </button>

                        <ul class="dropdown-menu">
                            @if ($productCategories->isNotEmpty())
                                @foreach ($productCategories as $cat)
                                    @if ($cat->children->isNotEmpty())
                                        <li class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="{{ route('product.category', $cat->slug) }}" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" title="{{ $cat->name }}">{{ $cat->name }}</a>
                                            <ul class="dropdown-menu submenu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('product.category', $cat->slug) }}" title="{{ $cat->name }}">Tất cả {{ $cat->name }}</a>
                                                </li>
                                                @foreach ($cat->children as $child)
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('product.category', $child->slug) }}" title="{{ $child->name }}">{{ $child->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li>
                                            <a class="dropdown-item" href="{{ route('product.category', $cat->slug) }}" title="{{ $cat->name }}">{{ $cat->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
                </li>

                <li class="nav-item {{ request()->is('danh-sach-tin-tuc*') || request()->is('tin-tuc*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('news') }}">Bài Viết</a>
                </li>

                <li class="nav-item {{ request()->is('about*') || request()->is('gioi-thieu*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/about') }}">Giới Thiệu</a>
                </li>

                <li class="nav-item {{ request()->is('danh-sach-tin-tuc*') || request()->is('tin-tuc*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('news') }}">Tin tức</a>
                </li>

                <li class="nav-item {{ request()->is('dai-ly*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('agent') }}">Đại lý</a>
                </li>

                <li class="nav-item {{ request()->is('lien-he*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('contact') }}">Liên hệ</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-start main-menu-offcanvas d-lg-none" tabindex="-1" id="mainMenuOffcanvas" aria-labelledby="mainMenuOffcanvasLabel">
    <div class="offcanvas-header main-menu-offcanvas__header">
        <a href="{{ route('home') }}" class="main-menu-offcanvas__brand js-offcanvas-nav-link" title="{{ setting_option('webtitle', '3 NÔNG') }}">
            <img src="{{ get_image(setting_option('logo')) }}" alt="{{ setting_option('webtitle', '3 NÔNG') }}" class="main-menu-offcanvas__logo">
        </a>
        <button type="button" class="main-menu-offcanvas__close" data-bs-dismiss="offcanvas" aria-label="Đóng">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    <div class="offcanvas-body main-menu-offcanvas__body p-0">

        <section class="mobile-menu-section">
            <div class="mobile-menu-section__head mobile-menu-section__head--accent">
                <i class="fa-solid fa-bars-staggered" aria-hidden="true"></i>
                <span>Danh mục sản phẩm</span>
            </div>

            @if ($productCategories->isNotEmpty())
                <div class="mobile-menu-section__content">
                    <div class="accordion accordion-flush mobile-menu-accordion" id="mobileProductCats">
                        @foreach ($productCategories as $cat)
                            @if ($cat->children->isNotEmpty())
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="mobileCatHeading{{ $cat->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mobileCatCollapse{{ $cat->id }}" aria-expanded="false" aria-controls="mobileCatCollapse{{ $cat->id }}">
                                            <span>{{ $cat->name }}</span>
                                        </button>
                                    </h2>
                                    <div id="mobileCatCollapse{{ $cat->id }}" class="accordion-collapse collapse" aria-labelledby="mobileCatHeading{{ $cat->id }}" data-bs-parent="#mobileProductCats">
                                        <div class="accordion-body">
                                            <a class="mobile-menu-sublink js-offcanvas-nav-link" href="{{ route('product.category', $cat->slug) }}" title="{{ $cat->name }}">Tất cả {{ $cat->name }}</a>
                                            @foreach ($cat->children as $child)
                                                <a class="mobile-menu-sublink js-offcanvas-nav-link" href="{{ route('product.category', $child->slug) }}" title="{{ $child->name }}">{{ $child->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @else
                                <a class="mobile-menu-catlink js-offcanvas-nav-link" href="{{ route('product.category', $cat->slug) }}" title="{{ $cat->name }}">
                                    <span>{{ $cat->name }}</span>
                                    <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        </section>

        <section class="mobile-menu-section">
            <div class="mobile-menu-section__head mobile-menu-section__head--green">
                <i class="fa-solid fa-compass" aria-hidden="true"></i>
                <span>Điều hướng</span>
            </div>

            <ul class="mobile-menu-list list-unstyled mb-0">
                <li>
                    <a class="mobile-menu-list__link js-offcanvas-nav-link" href="{{ route('home') }}">
                        <i class="fa-solid fa-house" aria-hidden="true"></i>
                        <span>Trang chủ</span>
                        <i class="fa-solid fa-chevron-right mobile-menu-list__arrow" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a class="mobile-menu-list__link js-offcanvas-nav-link" href="{{ route('news') }}">
                        <i class="fa-solid fa-file-lines" aria-hidden="true"></i>
                        <span>Bài Viết</span>
                        <i class="fa-solid fa-chevron-right mobile-menu-list__arrow" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a class="mobile-menu-list__link js-offcanvas-nav-link" href="{{ url('/about') }}">
                        <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                        <span>Giới Thiệu</span>
                        <i class="fa-solid fa-chevron-right mobile-menu-list__arrow" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a class="mobile-menu-list__link js-offcanvas-nav-link" href="{{ route('news') }}">
                        <i class="fa-solid fa-newspaper" aria-hidden="true"></i>
                        <span>Tin tức</span>
                        <i class="fa-solid fa-chevron-right mobile-menu-list__arrow" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a class="mobile-menu-list__link js-offcanvas-nav-link" href="{{ route('agent') }}">
                        <i class="fa-solid fa-store" aria-hidden="true"></i>
                        <span>Đại lý</span>
                        <i class="fa-solid fa-chevron-right mobile-menu-list__arrow" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a class="mobile-menu-list__link js-offcanvas-nav-link" href="{{ route('contact') }}">
                        <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                        <span>Liên hệ</span>
                        <i class="fa-solid fa-chevron-right mobile-menu-list__arrow" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </section>

    </div>
</div>
