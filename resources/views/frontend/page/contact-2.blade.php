@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => 'Liên Hệ - Tam Nông Thực Phẩm Sạch (Backup Mẫu 2)',
        'keywords' => 'lien he 3nong, tu van thuc pham tam nong, dia chi 3 nong',
        'description' => 'Thông tin liên hệ, hotline và địa chỉ mua sắm thực phẩm sạch tại Tam Nông.',
        'image' => get_image(setting_option('logo')),
    ])
@endsection

@push('head-style')
    <style>
        .contact-page {
            background-color: #f8faf9;
        }

        .contact-info-card {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 24px;
        }

        .contact-icon-wrapper {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: #e8f5e9;
            color: #2e7d32;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .contact-form-box {
            background: #ffffff;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            border: 1px solid #eef2f0;
        }

        .form-control:focus {
            border-color: #2e7d32;
            box-shadow: 0 0 0 0.2rem rgba(46, 125, 50, 0.2);
        }

        .error-feedback {
            color: #dc3545;
            font-size: 12px;
            margin-top: 4px;
            display: block;
        }
    </style>
@endpush

@section('content')
    <div class="contact-page py-4">
        <div class="container">
            {{-- Breadcrumb --}}
            <div class="post-breadcrumb mb-4">
                <a href="{{ route('home') }}">Trang chủ</a>
                <span class="separator">/</span>
                <span class="fw-semibold text-success">Liên hệ</span>
            </div>

            <div class="row g-4 align-items-start mb-5">
                {{-- Left Column: Thông tin liên hệ --}}
                <div class="col-lg-5">
                    <div class="pe-lg-4">
                        <span
                            class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">
                            <i class="fa-solid fa-headset me-1"></i> Hỗ trợ 24/7
                        </span>
                        <h1 class="h2 fw-bold text-dark mb-3">Liên Hệ Với Chúng Tôi</h1>
                        <p class="text-muted leading-relaxed mb-4">
                            Tam Nông luôn sẵn sàng lắng nghe và giải đáp mọi thắc mắc, tư vấn hỗ trợ quý khách hàng nhanh
                            chóng và tận tình nhất.
                        </p>

                        <div class="contact-info-list">
                            {{-- Địa chỉ --}}
                            <div class="contact-info-card">
                                <div class="contact-icon-wrapper">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div>
                                    <h3 class="h6 fw-bold text-dark mb-1">Địa chỉ</h3>
                                    <p class="text-muted mb-0">
                                        {{ setting_option('address', 'Số 66 đường 40, P. Hiệp Bình Chánh, TP. Thủ Đức, TP. Hồ Chí Minh') }}
                                    </p>
                                </div>
                            </div>

                            {{-- Hotline --}}
                            <div class="contact-info-card">
                                <div class="contact-icon-wrapper">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div>
                                    <h3 class="h6 fw-bold text-dark mb-1">Hotline</h3>
                                    <p class="mb-0">
                                        <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0932 009 180')) }}"
                                            class="text-success fw-bold fs-5 text-decoration-none">
                                            {{ setting_option('phone', '0932 009 180') }}
                                        </a>
                                    </p>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="contact-info-card">
                                <div class="contact-icon-wrapper">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div>
                                    <h3 class="h6 fw-bold text-dark mb-1">Email</h3>
                                    <p class="mb-0">
                                        <a href="mailto:{{ setting_option('email', 'tamnong.corp@gmail.com') }}"
                                            class="text-muted text-decoration-none">
                                            {{ setting_option('email', 'tamnong.corp@gmail.com') }}
                                        </a>
                                    </p>
                                </div>
                            </div>

                            {{-- Giờ mở cửa --}}
                            <div class="contact-info-card">
                                <div class="contact-icon-wrapper">
                                    <i class="fa-solid fa-clock"></i>
                                </div>
                                <div>
                                    <h3 class="h6 fw-bold text-dark mb-1">Giờ mở cửa</h3>
                                    <p class="text-muted mb-0">8:00 - 18:00 (Tất cả các ngày trong tuần)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Form gửi tin nhắn --}}
                <div class="col-lg-7">
                    <div class="contact-form-box">
                        <h2 class="h4 fw-bold text-dark mb-2">Gửi tin nhắn cho chúng tôi</h2>
                        <p class="text-muted small mb-4">
                            Nhập thông tin của bạn vào form bên dưới để nhận tư vấn từ chuyên viên của chúng tôi.
                        </p>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
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
                                    <label class="form-label small fw-bold text-secondary">Họ và tên <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="contact[name]" id="contact_name" class="form-control py-2"
                                        placeholder="Họ và tên của bạn" required value="{{ old('contact.name') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-secondary">Địa chỉ</label>
                                    <input type="text" name="contact[address]" id="contact_address"
                                        class="form-control py-2" placeholder="Địa chỉ (không bắt buộc)"
                                        value="{{ old('contact.address') }}">
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-secondary">Điện thoại <span
                                            class="text-danger">*</span></label>
                                    <input type="tel" name="contact[phone]" id="contact_phone" class="form-control py-2"
                                        placeholder="Số điện thoại" required value="{{ old('contact.phone') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-secondary">Email</label>
                                    <input type="email" name="contact[email]" id="contact_email" class="form-control py-2"
                                        placeholder="Địa chỉ email" value="{{ old('contact.email') }}">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label small fw-bold text-secondary">Lời nhắn <span
                                        class="text-danger">*</span></label>
                                <textarea name="contact[content]" id="contact_content" rows="4" class="form-control py-2"
                                    placeholder="Nội dung bạn cần hỗ trợ hoặc tư vấn..." required>{{ old('contact.content') }}</textarea>
                            </div>

                            <div class="d-flex align-items-center gap-3">
                                <button type="button"
                                    class="btn btn-success btn-contact-submit px-4 py-2 rounded-pill fw-bold shadow-sm">
                                    <i class="fa-solid fa-paper-plane me-1"></i> Gửi liên hệ
                                </button>
                                <button type="reset"
                                    class="btn btn-outline-secondary px-4 py-2 rounded-pill fw-semibold">
                                    Nhập lại
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Google Maps Embed --}}
            @if (setting_option('google_map'))
                <div class="mt-4">
                    <div class="rounded-4 overflow-hidden shadow-sm border" style="height: 380px;">
                        <iframe src="{{ setting_option('google_map') }}" width="100%" height="100%"
                            style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            @endif
        </div>
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
