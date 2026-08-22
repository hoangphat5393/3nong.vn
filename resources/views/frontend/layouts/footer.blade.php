@php
    $policyPages = \App\Models\Frontend\Page::where('type', 'page')
        ->whereNotIn('slug', ['home', 'about', 'agent', 'contact', 'news'])
        ->where('status', 1)
        ->orderBy('sort', 'asc')
        ->get();
@endphp

<div class="contact-fixed">
    <div class="zalo">
        <a href="https://zalo.me/{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}" title="{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}" target="_blank">
            <img src="{{ asset('assets/images/social/zalo-icon.png') }}" alt="{{ setting_option('webtitle', '3 NÔNG') }}" class="img-fluid">
        </a>
    </div>
    <div class="contact-phone">
        <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}" title="{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}">
            <div class="wrap-icon">
                <img src="{{ asset('assets/images/icon/hotline.svg') }}" alt="{{ setting_option('webtitle', '3 NÔNG') }}" class="img-fluid">
            </div>
        </a>
    </div>
</div>

<footer class="footer-area pb-0 mb-0">
    <div class="footer-cat">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ get_image(setting_option('logo_footer', setting_option('logo'))) }}" alt="{{ setting_option('webtitle', '3 NÔNG') }}" class="img-fluid" width="120">
                            </a>
                        </div>
                    </div>

                    <ul class="list-unstyled links">
                        @if (setting_option('tax_code'))
                            <li class="d-flex">
                                <i class="fa-solid fa-id-card fa-fw mt-1"></i>
                                Mã số thuế:&nbsp;{{ setting_option('tax_code') }}
                            </li>
                        @endif
                        <li class="d-flex">
                            <i class="fa-solid fa-location-dot fa-fw mt-2"></i> Địa chỉ: {{ setting_option('address', 'C15, Đường N3, KDC Bình Nhâm, Phường Bình Nhâm, TP. Thuận An, Tỉnh Bình Dương') }}
                        </li>
                        <li class="d-flex">
                            <i class="fa-solid fa-phone fa-fw mt-1"></i>
                            Điện thoại:&nbsp;<a href="tel:{{ str_replace(' ', '', setting_option('phone', '0938.133.830')) }}"> {{ setting_option('phone', '0938.133.830') }}</a>
                        </li>
                        <li class="d-flex">
                            <i class="fa-solid fa-envelope fa-fw mt-1"></i>
                            Email:&nbsp;<a href="mailto:{{ setting_option('email', 'tamnong.corp@gmail.com') }}"> {{ setting_option('email', 'tamnong.corp@gmail.com') }}</a>
                        </li>
                        <li class="d-flex">
                            <i class="fa-solid fa-house fa-fw mt-1"></i>
                            Website:&nbsp; {{ url('/') }}
                        </li>
                    </ul>
                </div>

                <div class="col-md-8 pt-3">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <div class="block">
                                <div class="block-title">CHÍNH SÁCH</div>
                                @if ($policyPages->isNotEmpty())
                                    <ul class="list-unstyled">
                                        @foreach ($policyPages as $page)
                                            <li>
                                                <a href="{{ route('page', $page->slug) }}" title="{{ $page->name }}">{{ $page->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="block">
                                <div class="block-title">@lang('admin.social_networks')</div>
                                <div class="d-flex align-items-center gap-3 mb-3 flex-wrap social-icons-group">
                                    @if(setting_option('facebook'))
                                        <a href="{{ setting_option('facebook') }}" target="_blank" rel="nofollow" title="Facebook">
                                            <img src="{{ asset('assets/images/social/facebook.png') }}" alt="Facebook" width="36" height="36" style="width: 36px; height: 36px; object-fit: contain;">
                                        </a>
                                    @endif
                                    @if(setting_option('zalo') || setting_option('phone'))
                                        <a href="https://zalo.me/{{ str_replace([' ', '.'], '', setting_option('zalo', setting_option('phone'))) }}" target="_blank" rel="nofollow" title="Zalo">
                                            <img src="{{ asset('assets/images/social/zalo-icon.png') }}" alt="Zalo" width="36" height="36" style="width: 36px; height: 36px; object-fit: contain;">
                                        </a>
                                    @endif
                                    @if(setting_option('youtube'))
                                        <a href="{{ setting_option('youtube') }}" target="_blank" rel="nofollow" title="YouTube">
                                            <img src="{{ asset('assets/images/social/youtube.png') }}" alt="YouTube" width="36" height="36" style="width: 36px; height: 36px; object-fit: contain;">
                                        </a>
                                    @endif
                                    @if(setting_option('twitter'))
                                        <a href="{{ setting_option('twitter') }}" target="_blank" rel="nofollow" title="Twitter">
                                            <img src="{{ asset('assets/images/social/twitter.png') }}" alt="Twitter" width="36" height="36" style="width: 36px; height: 36px; object-fit: contain;">
                                        </a>
                                    @endif
                                </div>
                                @if(setting_option('facebook'))
                                    <div class="fb-page" data-href="{{ setting_option('facebook') }}" data-tabs="timeline" data-width="300" data-height="180" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container">
            <div class="row justify-content-between py-3">
                <div class="col">
                    2026 Copyright © {{ setting_option('webtitle', '3 NÔNG') }}. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</footer>
