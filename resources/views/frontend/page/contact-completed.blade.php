@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => 'Gửi Liên Hệ Thành Công - 3 Nông',
        'keywords' => 'lien he 3nong',
        'description' => 'Cảm ơn bạn đã liên hệ với 3 Nông',
        'image' => get_image(setting_option('logo')),
    ])
@endsection

@section('content')
    <div class="contact-completed py-5" style="background-color: #f8faf9; min-height: 70vh;">
        <div class="container">
            {{-- Breadcrumb --}}
            <div class="post-breadcrumb mb-4">
                <a href="{{ route('home') }}">Trang chủ</a>
                <span class="separator">/</span>
                <span class="text-success fw-semibold">Hoàn tất liên hệ</span>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bg-white rounded-4 shadow-sm p-4 p-md-5 text-center border">
                        {{-- Icon Checkmark --}}
                        <div class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success rounded-circle mb-3"
                            style="width: 72px; height: 72px;">
                            <i class="fa-solid fa-circle-check fs-1"></i>
                        </div>

                        <h1 class="h3 fw-bold text-dark mb-2">Gửi Liên Hệ Thành Công!</h1>

                        @if (session('contact_name'))
                            <p class="fs-5 fw-bold text-success mb-2">
                                Cảm ơn {{ session('contact_name') }}!
                            </p>
                        @endif

                        <p class="text-muted mb-4 mx-auto" style="max-width: 580px;">
                            Chúng tôi đã nhận được thông tin câu hỏi / yêu cầu tư vấn của bạn. Đội ngũ chuyên viên của 3
                            Nông sẽ liên hệ lại với bạn trong thời gian sớm nhất.
                        </p>

                        <div class="row g-3 justify-content-center mb-4 text-start">
                            <div class="col-md-5">
                                <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0932 009 180')) }}"
                                    class="card text-decoration-none border shadow-xs h-100 p-3 rounded-3 text-dark hover-card-lift">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-success bg-opacity-10 text-success rounded-circle p-3">
                                            <i class="fa-solid fa-phone fs-5"></i>
                                        </div>
                                        <div>
                                            <div class="small text-muted fw-semibold">Hotline hỗ trợ nhanh</div>
                                            <div class="fw-bold text-success">{{ setting_option('phone', '0932 009 180') }}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-5">
                                <a href="mailto:{{ setting_option('email', 'tamnong.corp@gmail.com') }}"
                                    class="card text-decoration-none border shadow-xs h-100 p-3 rounded-3 text-dark hover-card-lift">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-success bg-opacity-10 text-success rounded-circle p-3">
                                            <i class="fa-solid fa-envelope fs-5"></i>
                                        </div>
                                        <div>
                                            <div class="small text-muted fw-semibold">Hộp thư điện tử</div>
                                            <div class="fw-bold text-dark text-truncate" style="max-width: 180px;">
                                                {{ setting_option('email', 'tamnong.corp@gmail.com') }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <a href="{{ route('home') }}" class="btn btn-success px-4 py-2 rounded-pill fw-bold shadow-sm">
                                <i class="fa-solid fa-house me-1"></i> Về trang chủ
                            </a>
                            <a href="{{ route('contact') }}"
                                class="btn btn-outline-secondary px-4 py-2 rounded-pill fw-semibold">
                                Gửi liên hệ khác
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
