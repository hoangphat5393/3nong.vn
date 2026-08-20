<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link id="favicon" rel="shortcut icon"
        href="{{ get_image(setting_option('favicon', setting_option('favicon_32'))) }}" type="image/x-icon">

    @yield('seo')

    <!-- Google Fonts: Nunito & Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- SimplyScroll -->
    <link rel="stylesheet" href="{{ asset('assets/jquery-simplyscroll-2.1.1/jquery.simplyscroll.css') }}">
    <!-- Font Awesome Pro 6.4 -->
    <link rel="stylesheet" href="{{ asset('assets/fontawesome_pro/css/all.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">

    @vite(['resources/css/app.css', 'resources/scss/style.scss', 'resources/js/app.js'])

    @stack('head-style')
    @stack('head-script')
</head>

<body>
    <h1 class="d-none">{{ setting_option('webtitle', '3 NÔNG - Vật Tư Nông Nghiệp') }}</h1>

    <!-- HEADER -->
    <header>
        @include('frontend.layouts.header')
    </header>
    <!-- END HEADER -->

    <!-- MENU -->
    @include('frontend.layouts.menu')
    <!-- END MENU -->

    <main id="app" class="wrap">
        <div id="main">
            @yield('content')
        </div>
    </main>

    <!-- FOOTER -->
    @include('frontend.layouts.footer')
    <!-- END FOOTER -->

    <!-- jQuery 4 + migrate -->
    <script src="{{ asset('assets/js/jquery-4.0.0.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/jquery-migrate-3.4.1.min.js') }}"></script>
    <!-- Bootstrap 5.3 Bundle -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var productMenuDropdown = document.getElementById('dropdownMenuButton');
            if (productMenuDropdown) {
                productMenuDropdown.addEventListener('hidden.bs.dropdown', function() {
                    document.querySelectorAll('.main-menu .submenu.show').forEach(function(submenu) {
                        submenu.classList.remove('show');
                    });
                });
            }

            document.querySelectorAll('.main-menu .dropend > .dropdown-toggle').forEach(function(toggle) {
                toggle.addEventListener('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    var submenu = toggle.nextElementSibling;
                    if (!submenu) return;
                    var parentMenu = toggle.closest('.dropdown-menu');
                    if (parentMenu) {
                        parentMenu.querySelectorAll('.dropdown-menu.show').forEach(function(
                            openMenu) {
                            if (openMenu !== submenu) {
                                openMenu.classList.remove('show');
                            }
                        });
                    }
                    submenu.classList.toggle('show');
                });
            });

            var offcanvasEl = document.getElementById('mainMenuOffcanvas');
            if (offcanvasEl) {
                offcanvasEl.querySelectorAll('.js-offcanvas-nav-link').forEach(function(link) {
                    link.addEventListener('click', function() {
                        var instance = bootstrap.Offcanvas.getInstance(offcanvasEl);
                        if (instance) instance.hide();
                    });
                });
            }

            if (typeof Swiper !== 'undefined') {
                document.querySelectorAll('.slider-swiper').forEach(function(el) {
                    new Swiper(el, {
                        loop: true,
                        autoplay: {
                            delay: 5000,
                            disableOnInteraction: false
                        },
                        navigation: {
                            nextEl: el.querySelector('.swiper-button-next'),
                            prevEl: el.querySelector('.swiper-button-prev'),
                        },
                        pagination: {
                            el: el.querySelector('.swiper-pagination'),
                            clickable: true,
                        },
                    });
                });

                document.querySelectorAll('.product-swiper').forEach(function(el) {
                    new Swiper(el, {
                        loop: true,
                        spaceBetween: 12,
                        slidesPerView: 1,
                        breakpoints: {
                            768: {
                                slidesPerView: 2
                            },
                            1000: {
                                slidesPerView: 4
                            },
                        },
                    });
                });
            }
        });
    </script>

    @stack('scripts')
</body>

</html>
