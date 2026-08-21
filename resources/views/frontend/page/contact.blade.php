@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => 'Liên Hệ - ' . setting_option('webtitle', 'Tam Nông'),
        'keywords' => setting_option('keywords', 'lien he 3nong, thuc pham tam nong'),
        'description' => setting_option(
            'description',
            'Liên hệ với Tam Nông để được tư vấn và hỗ trợ nhanh chóng'),
        'image' => get_image(setting_option('logo')),
    ])
@endsection

@section('content')
    <div class="container py-4 contact-page">
        {{-- Breadcrumb --}}
        <div class="post-breadcrumb mb-3">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="separator">/</span>
            <span class="text-white">Liên hệ</span>
        </div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="block-title text-center">
                    <h1 class="h2 fw-bold text-success">LIÊN HỆ VỚI CHÚNG TÔI</h1>
                </div>
            </div>
        </div>

        <div class="row g-4 align-items-stretch">
            {{-- Cột trái: Thông tin liên hệ --}}
            <div class="col-lg-5">
                <div class="bg-white p-4 rounded shadow-sm border h-100 d-flex flex-column justify-content-between">
                    <div>
                        <span
                            class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">
                            <i class="fa-solid fa-headset me-1"></i> Hỗ trợ 24/7
                        </span>
                        <h2 class="h4 fw-bold text-dark mb-2">Thông Tin Liên Hệ</h2>
                        <p class="text-muted small mb-4">
                            Tam Nông luôn sẵn sàng lắng nghe và giải đáp mọi thắc mắc, tư vấn hỗ trợ quý khách hàng nhanh
                            chóng và tận tình nhất.
                        </p>

                        <div class="contact-info-list">
                            {{-- Địa chỉ --}}
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="contact-icon-wrapper">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div>
                                    <h3 class="h6 fw-bold text-dark mb-1">Địa chỉ</h3>
                                    <p class="text-muted small mb-0">
                                        {{ setting_option('address', 'Số 66 đường 40, phường Hiệp Bình Chánh, Thành Phố Thủ Đức, Thành phố Hồ Chí Minh, Việt Nam') }}
                                    </p>
                                </div>
                            </div>

                            {{-- Hotline --}}
                            <div class="d-flex align-items-start gap-3 mb-3">
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
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="contact-icon-wrapper">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div>
                                    <h3 class="h6 fw-bold text-dark mb-1">Email</h3>
                                    <p class="mb-0">
                                        <a href="mailto:{{ setting_option('email', 'tamnong.corp@gmail.com') }}"
                                            class="text-muted small text-decoration-none">
                                            {{ setting_option('email', 'tamnong.corp@gmail.com') }}
                                        </a>
                                    </p>
                                </div>
                            </div>

                            {{-- Giờ mở cửa --}}
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="contact-icon-wrapper">
                                    <i class="fa-solid fa-clock"></i>
                                </div>
                                <div>
                                    <h3 class="h6 fw-bold text-dark mb-1">Giờ mở cửa</h3>
                                    <p class="text-muted small mb-0">8:00 - 18:00 (Tất cả các ngày trong tuần)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Nút chat Zalo & Gọi nhanh --}}
                    <div class="pt-3 border-top mt-3 d-flex gap-2">
                        <a href="https://zalo.me/{{ str_replace(' ', '', setting_option('phone', '0932 009 180')) }}"
                            target="_blank" class="btn btn-outline-primary btn-sm rounded-pill flex-fill fw-bold py-2">
                            <i class="fa-solid fa-comment-dots me-1"></i> Chat Zalo
                        </a>
                        <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0932 009 180')) }}"
                            class="btn btn-success btn-sm rounded-pill flex-fill fw-bold py-2">
                            <i class="fa-solid fa-phone me-1"></i> Gọi Ngay
                        </a>
                    </div>
                </div>
            </div>

            {{-- Cột phải: Form gửi tin nhắn --}}
            <div class="col-lg-7">
                <div class="information-contact bg-white p-4 rounded shadow-sm border h-100">
                    <h2 class="h4 fw-bold text-dark mb-2">Gửi tin nhắn cho chúng tôi</h2>
                    <p class="text-muted small mb-3">
                        Nhập thông tin của bạn vào form bên dưới để nhận tư vấn từ chuyên viên của chúng tôi.
                    </p>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                            <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ $errors->first() }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form id="form-contact" class="form-contact" method="post" action="{{ route('contact.submit') }}"
                        novalidate="novalidate">
                        @csrf
                        <input type="hidden" name="contact[type]" value="contact">
                        @if (config('recaptchav3.sitekey'))
                            {!! RecaptchaV3::field('contact') !!}
                        @endif

                        <div class="mb-3 row g-2">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary">Họ và tên <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="Contact_Name" name="contact[name]"
                                    placeholder="Họ & tên của bạn" required value="{{ old('contact.name') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary">Số điện thoại <span
                                        class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="Contact_Mobile" name="contact[phone]"
                                    placeholder="Số điện thoại" required value="{{ old('contact.phone') }}">
                            </div>
                        </div>

                        <div class="mb-3 row g-2">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary">Email</label>
                                <input type="email" class="form-control" id="Contact_Email" name="contact[email]"
                                    placeholder="Địa chỉ email" value="{{ old('contact.email') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary">Địa chỉ</label>
                                <input type="text" class="form-control" id="Contact_Address" name="contact[address]"
                                    placeholder="Địa chỉ của bạn" value="{{ old('contact.address') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Lời nhắn / Nội dung cần tư vấn <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" id="Contact_Message" name="contact[content]"
                                placeholder="Lời nhắn hoặc yêu cầu hỗ trợ..." rows="5" required>{{ old('contact.content') }}</textarea>
                        </div>

                        <div class="mb-2">
                            <button type="button" class="btn btn-success btn-contact-submit px-4 me-2">
                                <i class="fa-solid fa-paper-plane me-1"></i> Gửi liên hệ
                            </button>
                            <button type="reset" class="btn btn-secondary px-4">Nhập lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Google Maps Embed if available --}}
        @if (setting_option('google_map'))
            <div class="row mt-4">
                <div class="col-12">
                    <div class="overflow-hidden rounded-3 shadow-sm border" style="height: 380px;">
                        <iframe src="{{ setting_option('google_map') }}" width="100%" height="100%"
                            style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
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
            const contactForm = document.getElementById('form-contact');
            const submitBtn = document.querySelector('.btn-contact-submit');

            if (submitBtn && contactForm) {
                submitBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Xóa các thông báo lỗi cũ
                    document.querySelectorAll('.error-feedback').forEach(el => el.remove());
                    document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove(
                        'is-invalid'));

                    let isValid = true;
                    const nameInput = document.getElementById('Contact_Name');
                    const phoneInput = document.getElementById('Contact_Mobile');
                    const emailInput = document.getElementById('Contact_Email');
                    const contentInput = document.getElementById('Contact_Message');

                    // Validate Name
                    if (!nameInput.value.trim()) {
                        showInputError(nameInput, 'Vui lòng nhập họ và tên!');
                        isValid = false;
                    }

                    // Validate Phone
                    const phoneVal = phoneInput.value.trim();
                    if (!phoneVal) {
                        showInputError(phoneInput, 'Vui lòng cung cấp số điện thoại!');
                        isValid = false;
                    } else if (phoneVal.length < 9) {
                        showInputError(phoneInput, 'Số điện thoại tối thiểu 9 số!');
                        isValid = false;
                    }

                    // Validate Email (nếu có nhập)
                    const emailVal = emailInput.value.trim();
                    if (emailVal && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
                        showInputError(emailInput, 'Địa chỉ email không đúng định dạng!');
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

                    // Chuyển nút sang trạng thái loading
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
                                window.location.href = body.redirect ||
                                    '{{ route('contact_completed') }}';
                            } else {
                                submitBtn.disabled = false;
                                submitBtn.innerHTML = originalBtnHtml;
                                if (body.errors) {
                                    for (let key in body.errors) {
                                        const fieldName = key.replace('contact.', '');
                                        let fieldEl = null;
                                        if (fieldName === 'name') fieldEl = nameInput;
                                        if (fieldName === 'phone') fieldEl = phoneInput;
                                        if (fieldName === 'email') fieldEl = emailInput;
                                        if (fieldName === 'content') fieldEl = contentInput;

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
