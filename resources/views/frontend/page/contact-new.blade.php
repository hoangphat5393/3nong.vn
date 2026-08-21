@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => 'Liên Hệ - Tam Nông Thực Phẩm Tươi Sạch (Mẫu Mới - Backup)',
        'keywords' => 'lien he 3nong, tu van thuc pham tam nong, dia chi 3 nong, hotline tam nong',
        'description' =>
            'Thông tin liên hệ, hotline tư vấn và bản đồ địa chỉ mua sắm thực phẩm sạch tại Tam Nông.',
        'image' => get_image(setting_option('logo')),
    ])
@endsection

@push('head-style')
    <style>
        /* Main Layout */
        .contact-page-container {
            padding: 20px 0 40px;
        }

        /* Breadcrumb */
        .contact-breadcrumb {
            color: #d1d5db;
            font-size: 14px;
        }

        .contact-breadcrumb a {
            color: #d1d5db;
            text-decoration: none;
            transition: color 0.2s;
        }

        .contact-breadcrumb a:hover {
            color: #f5a623;
        }

        /* Content Cards (Matching Homepage Card Structure) */
        .contact-card-block {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 28px;
        }

        /* Hero Section Inside Card */
        .contact-hero-card {
            background: linear-gradient(135deg, #ffffff 0%, #f4fbf5 100%);
            padding: 32px 32px 24px;
            border-bottom: 1px solid #edf2f0;
        }

        .contact-hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(30, 126, 52, 0.1);
            color: #1e7e34;
            border: 1px solid rgba(30, 126, 52, 0.25);
            font-size: 13px;
            font-weight: 700;
            padding: 6px 16px;
            border-radius: 20px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .contact-hero-title {
            font-size: 2.1rem;
            font-weight: 800;
            color: #1e7e34;
            line-height: 1.35;
            margin-bottom: 8px;
        }

        .contact-hero-title .text-gold {
            color: #f5a623;
        }

        .contact-hero-desc {
            color: #4a5568;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 0;
        }

        /* Info Cards */
        .contact-info-item {
            background: #f8faf7;
            border-radius: 12px;
            padding: 16px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            border: 1px solid #e6ede6;
            margin-bottom: 14px;
            transition: transform 0.2s, border-color 0.2s, box-shadow 0.2s;
        }

        .contact-info-item:hover {
            transform: translateX(4px);
            border-color: #1e7e34;
            box-shadow: 0 4px 14px rgba(30, 126, 52, 0.1);
            background: #ffffff;
        }

        .contact-icon-box {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background-color: rgba(30, 126, 52, 0.12);
            color: #1e7e34;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
            transition: all 0.2s ease;
        }

        .contact-info-item:hover .contact-icon-box {
            background-color: #f5a623;
            color: #ffffff;
        }

        .contact-info-label {
            font-size: 13px;
            font-weight: 700;
            color: #718096;
            text-transform: uppercase;
            margin-bottom: 2px;
        }

        .contact-info-value {
            font-size: 0.95rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0;
        }

        /* Fast Action Buttons */
        .fast-action-card {
            background: linear-gradient(135deg, #1e7e34 0%, #155724 100%);
            border-radius: 12px;
            padding: 20px;
            color: #ffffff;
            margin-top: 18px;
        }

        /* Form Box */
        .contact-form-wrapper {
            padding: 10px 0;
        }

        .form-label-custom {
            font-size: 13px;
            font-weight: 700;
            color: #4a5568;
            margin-bottom: 6px;
        }

        .form-control-custom {
            background-color: #f8faf7;
            border: 1px solid #cbd5e0;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 14px;
            color: #2d3748;
            transition: all 0.2s ease;
        }

        .form-control-custom:focus {
            background-color: #ffffff;
            border-color: #1e7e34;
            box-shadow: 0 0 0 0.2rem rgba(30, 126, 52, 0.18);
            outline: none;
        }

        .error-feedback {
            color: #dc3545;
            font-size: 12px;
            margin-top: 4px;
            display: block;
            font-weight: 600;
        }

        /* Buttons */
        .btn-gold {
            background: #f5a623;
            color: #ffffff !important;
            font-weight: 700;
            padding: 12px 30px;
            border-radius: 30px;
            text-transform: uppercase;
            font-size: 14px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 4px 14px rgba(245, 166, 35, 0.4);
            transition: all 0.25s ease;
            border: none;
        }

        .btn-gold:hover {
            background: #e09415;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 166, 35, 0.55);
        }

        .btn-outline-custom {
            border: 2px solid #cbd5e0;
            color: #4a5568 !important;
            font-weight: 700;
            padding: 10px 24px;
            border-radius: 30px;
            text-decoration: none;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.25s ease;
            background: transparent;
        }

        .btn-outline-custom:hover {
            background: #edf2f7;
            color: #2d3748 !important;
            transform: translateY(-2px);
        }
    </style>
@endpush

@section('content')
    <div class="container contact-page-container">
        {{-- Breadcrumb --}}
        <div class="contact-breadcrumb mb-3">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="separator px-2">/</span>
            <span class="text-white fw-bold">Liên hệ</span>
        </div>

        {{-- MAIN CONTACT CARD BLOCK --}}
        <div class="contact-card-block">
            {{-- Hero Header --}}
            <div class="contact-hero-card">
                <span class="contact-hero-badge">
                    <i class="fa-solid fa-headset"></i> Hỗ trợ 24/7
                </span>
                <h1 class="contact-hero-title">
                    Liên Hệ Với Chúng Tôi
                </h1>
                <p class="contact-hero-desc">
                    Tam Nông luôn sẵn sàng lắng nghe, tư vấn thực phẩm tươi sạch và giải đáp mọi yêu cầu đặt hàng, hợp tác
                    đại lý nhanh chóng và tận tình nhất.
                </p>
            </div>

            {{-- Body Content: Info & Form --}}
            <div class="p-4 p-md-5">
                <div class="row g-4 g-lg-5">
                    {{-- Left Column: Contact Information --}}
                    <div class="col-lg-5">
                        <h2 class="h5 fw-bold text-success mb-3 pb-2 border-bottom">
                            <i class="fa-solid fa-address-book me-2"></i> Thông Tin Kết Nối
                        </h2>

                        <div class="contact-info-list">
                            {{-- Địa chỉ --}}
                            <div class="contact-info-item">
                                <div class="contact-icon-box">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div>
                                    <div class="contact-info-label">Địa chỉ</div>
                                    <div class="contact-info-value">
                                        {{ setting_option('address', 'Số 66 đường 40, P. Hiệp Bình Chánh, TP. Thủ Đức, TP. Hồ Chí Minh') }}
                                    </div>
                                </div>
                            </div>

                            {{-- Hotline --}}
                            <div class="contact-info-item">
                                <div class="contact-icon-box">
                                    <i class="fa-solid fa-phone-volume"></i>
                                </div>
                                <div>
                                    <div class="contact-info-label">Hotline</div>
                                    <div class="contact-info-value">
                                        <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0932 009 180')) }}"
                                            class="text-success text-decoration-none fw-bold fs-5">
                                            {{ setting_option('phone', '0932 009 180') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="contact-info-item">
                                <div class="contact-icon-box">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div>
                                    <div class="contact-info-label">Email</div>
                                    <div class="contact-info-value">
                                        <a href="mailto:{{ setting_option('email', 'tamnong.corp@gmail.com') }}"
                                            class="text-muted text-decoration-none">
                                            {{ setting_option('email', 'tamnong.corp@gmail.com') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            {{-- Giờ mở cửa --}}
                            <div class="contact-info-item">
                                <div class="contact-icon-box">
                                    <i class="fa-solid fa-clock"></i>
                                </div>
                                <div>
                                    <div class="contact-info-label">Giờ mở cửa</div>
                                    <div class="contact-info-value">8:00 - 18:00 (Tất cả các ngày trong tuần)</div>
                                </div>
                            </div>
                        </div>

                        {{-- Fast Support Channel Box --}}
                        <div class="fast-action-card text-center">
                            <h4 class="h6 fw-bold mb-2"><i class="fa-solid fa-comments me-1"></i> Cần Tư Vấn Đặt Hàng Gấp?
                            </h4>
                            <p class="small text-white-50 mb-3">Kết nối trực tiếp qua Zalo hoặc Hotline để được phản hồi
                                trong vòng 5 phút.</p>
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                <a href="https://zalo.me/{{ str_replace(' ', '', setting_option('phone', '0932 009 180')) }}"
                                    target="_blank" class="btn btn-light btn-sm px-3 rounded-pill fw-bold text-primary">
                                    <i class="fa-solid fa-comment-dots me-1"></i> Chat Zalo Ngay
                                </a>
                                <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0932 009 180')) }}"
                                    class="btn btn-warning btn-sm px-3 rounded-pill fw-bold text-dark">
                                    <i class="fa-solid fa-phone me-1"></i> Gọi Trực Tiếp
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Right Column: Message Form --}}
                    <div class="col-lg-7">
                        <div class="contact-form-wrapper">
                            <h2 class="h5 fw-bold text-success mb-2">
                                <i class="fa-solid fa-paper-plane me-2"></i> Gửi tin nhắn cho chúng tôi
                            </h2>
                            <p class="text-muted small mb-4">
                                Nhập thông tin của bạn vào form bên dưới để nhận tư vấn từ chuyên viên của chúng tôi.
                            </p>

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show mb-4 rounded-3" role="alert">
                                    <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show mb-4 rounded-3" role="alert">
                                    <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ $errors->first() }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <form id="contact_form" method="post" action="{{ route('contact.submit') }}"
                                novalidate="novalidate">
                                @csrf
                                @if (config('recaptchav3.sitekey'))
                                    {!! RecaptchaV3::field('contact') !!}
                                @endif

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label-custom">Họ và tên <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="contact[name]" id="contact_name"
                                            class="form-control form-control-custom" placeholder="Ví dụ: Nguyễn Văn A"
                                            required value="{{ old('contact.name') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label-custom">Số điện thoại <span
                                                class="text-danger">*</span></label>
                                        <input type="tel" name="contact[phone]" id="contact_phone"
                                            class="form-control form-control-custom" placeholder="Ví dụ: 0932 009 180"
                                            required value="{{ old('contact.phone') }}">
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label-custom">Địa chỉ email</label>
                                        <input type="email" name="contact[email]" id="contact_email"
                                            class="form-control form-control-custom" placeholder="email@example.com"
                                            value="{{ old('contact.email') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label-custom">Địa chỉ nhận hàng / khu vực</label>
                                        <input type="text" name="contact[address]" id="contact_address"
                                            class="form-control form-control-custom"
                                            placeholder="Quận / Huyện, Tỉnh thành" value="{{ old('contact.address') }}">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label-custom">Nội dung yêu cầu / Lời nhắn <span
                                            class="text-danger">*</span></label>
                                    <textarea name="contact[content]" id="contact_content" rows="4" class="form-control form-control-custom"
                                        placeholder="Quý khách vui lòng ghi rõ loại thực phẩm hoặc dịch vụ cần tư vấn..." required>{{ old('contact.content') }}</textarea>
                                </div>

                                <div class="d-flex align-items-center gap-3">
                                    <button type="button" class="btn-gold btn-contact-submit">
                                        <i class="fa-solid fa-paper-plane"></i> Gửi liên hệ ngay
                                    </button>
                                    <button type="reset" class="btn-outline-custom">
                                        Nhập lại
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- GOOGLE MAPS BLOCK --}}
        @if (setting_option('google_map'))
            <div class="contact-card-block p-4">
                <h3 class="h6 fw-bold text-success mb-3">
                    <i class="fa-solid fa-map-location-dot me-2"></i> Bản Đồ Trụ Sở Tam Nông
                </h3>
                <div class="rounded-4 overflow-hidden border" style="height: 380px;">
                    <iframe src="{{ setting_option('google_map') }}" width="100%" height="100%" style="border:0;"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('head-script')
    @if (config('recaptchav3.sitekey'))
        {!! RecaptchaV3::initJs() !!}
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contact_form');
            const submitBtn = document.querySelector('.btn-contact-submit');

            if (submitBtn && contactForm) {
                submitBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Clear previous errors
                    document.querySelectorAll('.error-feedback').forEach(el => el.remove());
                    document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove(
                        'is-invalid'));

                    let isValid = true;
                    const nameInput = document.getElementById('contact_name');
                    const phoneInput = document.getElementById('contact_phone');
                    const emailInput = document.getElementById('contact_email');
                    const contentInput = document.getElementById('contact_content');

                    // Validate Name
                    if (!nameInput.value.trim()) {
                        showInputError(nameInput, 'Vui lòng điền họ và tên!');
                        isValid = false;
                    }

                    // Validate Phone
                    const phoneVal = phoneInput.value.trim();
                    if (!phoneVal) {
                        showInputError(phoneInput, 'Vui lòng điền số điện thoại!');
                        isValid = false;
                    } else if (phoneVal.length < 9) {
                        showInputError(phoneInput, 'Vui lòng nhập số điện thoại hợp lệ (tối thiểu 9 số)!');
                        isValid = false;
                    }

                    // Validate Email (if provided)
                    const emailVal = emailInput.value.trim();
                    if (emailVal && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
                        showInputError(emailInput, 'Địa chỉ email không hợp lệ!');
                        isValid = false;
                    }

                    // Validate Content
                    const contentVal = contentInput.value.trim();
                    if (!contentVal) {
                        showInputError(contentInput, 'Vui lòng nhập lời nhắn!');
                        isValid = false;
                    } else if (contentVal.length < 5) {
                        showInputError(contentInput, 'Lời nhắn tối thiểu 5 ký tự!');
                        isValid = false;
                    }

                    if (!isValid) {
                        return;
                    }

                    // Disable submit button and show loading spinner
                    const originalBtnHtml = submitBtn.innerHTML;
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Đang gửi...';

                    const formData = new FormData(contactForm);

                    fetch(contactForm.getAttribute('action'), {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.json().then(data => ({
                            status: response.status,
                            body: data
                        })))
                        .then(({
                            status,
                            body
                        }) => {
                            if (status >= 200 && status < 300 && body.status === 'success') {
                                if (body.redirect) {
                                    window.location.href = body.redirect;
                                } else {
                                    window.location.href = '{{ route('contact_completed') }}';
                                }
                            } else {
                                submitBtn.disabled = false;
                                submitBtn.innerHTML = originalBtnHtml;
                                if (body.errors) {
                                    for (let key in body.errors) {
                                        const fieldName = key.replace('contact.', '');
                                        const fieldEl = document.getElementById('contact_' + fieldName);
                                        if (fieldEl) {
                                            showInputError(fieldEl, body.errors[key][0]);
                                        }
                                    }
                                } else {
                                    alert(body.message || 'Đã có lỗi xảy ra, vui lòng thử lại!');
                                }
                            }
                        })
                        .catch(err => {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalBtnHtml;
                            alert('Lỗi kết nối máy chủ, vui lòng thử lại!');
                        });
                });
            }

            function showInputError(inputEl, message) {
                inputEl.classList.add('is-invalid');
                const errDiv = document.createElement('div');
                errDiv.className = 'error-feedback';
                errDiv.innerText = message;
                inputEl.parentNode.appendChild(errDiv);
            }
        });
    </script>
@endpush
