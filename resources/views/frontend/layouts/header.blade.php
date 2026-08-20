<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-lg-flex flex-cloumn align-items-center">
                <div class="d-flex align-items-center my-2">
                    <div class="logo mx-auto">
                        <a href="{{ route('home') }}" title="{{ setting_option('webtitle', '3 NÔNG - Vật Tư Nông Nghiệp') }}">
                            <img src="{{ get_image(setting_option('logo')) }}" alt="{{ setting_option('webtitle', '3 NÔNG') }}" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="flex-fill px-3">
                    <div class="search-block">
                        <form action="{{ route('search') }}" method="GET" class="my-2 my-lg-0">
                            <div class="mb-3">
                                <input class="form-control input-search me-sm-2 w-100" type="search" placeholder="Tìm kiếm sản phẩm..." name="q" value="{{ request('q') }}">
                                <button type="submit" class="btn-search my-sm-0"><i class="fa-solid fa-magnifying-glass fa-fw"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="header-contact align-items-center d-none d-lg-flex">
                    <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}" class="d-flex align-items-center">
                        <img src="{{ asset('assets/images/header/hotline.svg') }}" alt="" class="img-fluid">
                        <p>
                            Hotline:<br>
                            <span>{{ setting_option('phone', '0938.133.830') }}</span>
                        </p>
                    </a>
                    <a href="mailto:{{ setting_option('email', 'tamnong.corp@gmail.com') }}" class="d-flex align-items-center">
                        <img src="{{ asset('assets/images/header/email.svg') }}" alt="{{ setting_option('email', 'tamnong.corp@gmail.com') }}" class="img-fluid">
                        <p>
                            Email:<br>
                            <span>{{ setting_option('email', 'tamnong.corp@gmail.com') }}</span>
                        </p>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
