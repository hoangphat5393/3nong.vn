@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => 'Chính Sách & Đăng Ký Đại Lý - ' . setting_option('webtitle', '3 Nông'),
        'keywords' => setting_option('keywords', 'dai ly 3nong, dang ky dai ly, dai ly phan phoi thuc pham'),
        'description' => setting_option(
            'description',
            'Trở thành đối tác đại lý phân phối cùng 3 Nông - Chiết khấu cao, nguồn hàng ổn định, hỗ trợ tận tình.'),
        'image' => get_image(setting_option('logo')),
    ])
@endsection

@push('head-style')
    <style>
        .agent-benefit-card {
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 12px;
            padding: 24px 20px;
            transition: all 0.3s ease;
            height: 100%;
        }

        .agent-benefit-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            border-color: #2e7d32;
        }

        .agent-icon-box {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            background: #e8f5e9;
            color: #2e7d32;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 16px;
            transition: all 0.3s ease;
        }

        .agent-benefit-card:hover .agent-icon-box {
            background: #2e7d32;
            color: #ffffff;
            transform: scale(1.08);
        }

        .agent-step-item {
            position: relative;
            padding-left: 48px;
            margin-bottom: 24px;
        }

        .agent-step-number {
            position: absolute;
            left: 0;
            top: 0;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #2e7d32;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 15px;
            box-shadow: 0 3px 8px rgba(46, 125, 50, 0.3);
        }

        .form-agent-card {
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .form-agent-card .form-control:focus {
            border-color: #2e7d32;
            box-shadow: 0 0 0 0.2rem rgba(46, 125, 50, 0.15);
        }

        .error-feedback {
            color: #dc3545;
            font-size: 12px;
            margin-top: 4px;
            display: block;
            font-weight: 500;
        }
    </style>
@endpush

@section('content')
    <div class="container py-4 agent-page">
        {{-- Breadcrumb --}}
        <div class="post-breadcrumb mb-3">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="separator">/</span>
            <span class="text-white">Đại lý</span>
        </div>

        {{-- Header Banner / Tiêu đề chính --}}
        <div class="row justify-content-center mb-4">
            <div class="col-lg-10 text-center">
                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">
                    <i class="fa-solid fa-handshake me-1"></i> Cơ hội hợp tác kinh doanh
                </span>
                <h1 class="h2 fw-bold text-success text-uppercase mb-2">ĐĂNG KÝ LÀM ĐẠI LÝ</h1>
                <p class="text-white text-opacity-75 mb-0" style="font-size: 15px;">
                    Đồng hành phát triển cùng <strong class="text-warning">3 Nông</strong> – Nguồn cung thực phẩm sạch & vật
                    tư nông nghiệp uy tín, chiết khấu tối ưu và chính sách hỗ trợ toàn diện.
                </p>
            </div>
        </div>

        {{-- 4 Khối Lợi Ích & Ưu Đãi Đại Lý --}}
        <div class="row g-3 mb-5">
            <div class="col-6 col-md-3">
                <div class="agent-benefit-card">
                    <div class="agent-icon-box">
                        <i class="fa-solid fa-percent"></i>
                    </div>
                    <h3 class="h6 fw-bold text-dark mb-2">Chiết Khấu Hấp Dẫn</h3>
                    <p class="text-muted small mb-0">Chính sách giá sỉ tận gốc không qua trung gian, biên độ lợi nhuận cao
                        cho đối tác.</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="agent-benefit-card">
                    <div class="agent-icon-box">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h3 class="h6 fw-bold text-dark mb-2">Nguồn Hàng Đạt Chuẩn</h3>
                    <p class="text-muted small mb-0">Sản phẩm có nguồn gốc rõ ràng, đạt chuẩn VSATTP, đóng gói chuyên
                        nghiệp.</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="agent-benefit-card">
                    <div class="agent-icon-box">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <h3 class="h6 fw-bold text-dark mb-2">Giao Hàng Thần Tốc</h3>
                    <p class="text-muted small mb-0">Hệ thống vận chuyển chuyên nghiệp, đảm bảo hàng tươi mới, đúng hẹn toàn
                        quốc.</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="agent-benefit-card">
                    <div class="agent-icon-box">
                        <i class="fa-solid fa-bullhorn"></i>
                    </div>
                    <h3 class="h6 fw-bold text-dark mb-2">Hỗ Trợ Marketing</h3>
                    <p class="text-muted small mb-0">Cung cấp tài liệu, hình ảnh, bài viết và hỗ trợ tiếp cận khách hàng tại
                        khu vực.</p>
                </div>
            </div>
        </div>

        {{-- Bố Cục Chính: Cột Trái Thông Tin Hợp Tác + Cột Phải Form Đăng Ký --}}
        <div class="row g-4 align-items-stretch">
            {{-- Cột Trái: Quy trình & Hỗ trợ --}}
            <div class="col-lg-5">
                <div class="bg-white p-4 rounded-3 shadow-sm border h-100 d-flex flex-column justify-content-between">
                    <div>
                        <h2 class="h5 fw-bold text-success text-uppercase mb-3 pb-2 border-bottom">
                            <i class="fa-solid fa-list-check me-2"></i> Quy Trình Hợp Tác
                        </h2>

                        <div class="agent-steps-list mb-4">
                            <div class="agent-step-item">
                                <span class="agent-step-number">1</span>
                                <h4 class="h6 fw-bold text-dark mb-1">Gửi thông tin đăng ký</h4>
                                <p class="text-muted small mb-0">Điền form đăng ký đại lý bên cạnh để nhận bảng báo giá sỉ
                                    và chính sách chi tiết.</p>
                            </div>
                            <div class="agent-step-item">
                                <span class="agent-step-number">2</span>
                                <h4 class="h6 fw-bold text-dark mb-1">Tư vấn chính sách & Báo giá</h4>
                                <p class="text-muted small mb-0">Chuyên viên phụ trách đại lý liên hệ tư vấn danh mục và
                                    chính sách chiết khấu tốt nhất.</p>
                            </div>
                            <div class="agent-step-item">
                                <span class="agent-step-number">3</span>
                                <h4 class="h6 fw-bold text-dark mb-1">Ký kết & Lên đơn hàng</h4>
                                <p class="text-muted small mb-0">Thống nhất hợp đồng phân phối và xác nhận đơn hàng đầu tiên
                                    với chính sách ưu đãi.</p>
                            </div>
                            <div class="agent-step-item mb-0">
                                <span class="agent-step-number">4</span>
                                <h4 class="h6 fw-bold text-dark mb-1">Giao hàng & Đồng hành</h4>
                                <p class="text-muted small mb-0">Giao hàng tận nơi và hỗ trợ marketing, bán hàng liên tục
                                    trong suốt quá trình kinh doanh.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Khối hotline hỗ trợ nhanh --}}
                    <div class="bg-light p-3 rounded-3 border">
                        <div class="d-flex align-items-center gap-3">
                            <div class="flex-shrink-0 bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 46px; height: 46px; font-size: 20px;">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <div>
                                <div class="small text-muted fw-bold">HOTLINE TƯ VẤN ĐẠI LÝ 24/7</div>
                                <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0932 009 180')) }}"
                                    class="text-success fw-bold fs-5 text-decoration-none">
                                    {{ setting_option('phone', '0932 009 180') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Cột Phải: Form Đăng Ký Đại Lý --}}
            <div class="col-lg-7">
                <div class="form-agent-card p-4 p-md-5 h-100">
                    <div class="mb-4">
                        <h2 class="h4 fw-bold text-success text-uppercase mb-2">
                            <i class="fa-solid fa-file-signature me-2"></i> Đăng Ký Nhận Báo Giá Sỉ
                        </h2>
                        <p class="text-muted small mb-0">
                            Vui lòng để lại thông tin, bộ phận phụ trách phát triển đại lý của 3 Nông sẽ liên hệ và gửi bảng
                            giá sỉ đến quý khách trong vòng 30 phút.
                        </p>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ $errors->first() }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form id="form-agent" class="form-agent" method="post" action="{{ route('contact.submit') }}"
                        novalidate="novalidate">
                        @csrf
                        <input type="hidden" name="contact[type]" value="agent">
                        @if (config('recaptchav3.sitekey'))
                            {!! RecaptchaV3::field('agent') !!}
                        @endif

                        <div class="row g-3">
                            {{-- Họ tên --}}
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark">Họ và tên <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control py-2" id="Agent_Name" name="contact[name]"
                                    placeholder="Ví dụ: Nguyễn Văn A" required value="{{ old('contact.name') }}">
                            </div>

                            {{-- Số điện thoại --}}
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark">Số điện thoại nhận báo giá <span
                                        class="text-danger">*</span></label>
                                <input type="tel" class="form-control py-2" id="Agent_Mobile" name="contact[phone]"
                                    placeholder="Ví dụ: 0932 009 180" required value="{{ old('contact.phone') }}">
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark">Email nhận báo giá</label>
                                <input type="email" class="form-control py-2" id="Agent_Email" name="contact[email]"
                                    placeholder="name@example.com" value="{{ old('contact.email') }}">
                            </div>

                            {{-- Khu vực / Địa chỉ kinh doanh --}}
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark">Tỉnh / Thành phố dự kiến mở đại lý <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control py-2" id="Agent_Address"
                                    name="contact[address]" placeholder="Ví dụ: TP.HCM, Bình Dương, Đồng Nai..." required
                                    value="{{ old('contact.address') }}">
                            </div>

                            {{-- Nội dung / Mặt hàng quan tâm --}}
                            <div class="col-12">
                                <label class="form-label small fw-bold text-dark">Nội dung quan tâm / Thông tin thêm <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control py-2" id="Agent_Message" name="contact[content]"
                                    placeholder="Ví dụ: Tôi muốn tư vấn bảng giá sỉ các sản phẩm thịt bê, gà đồi và chính sách mở đại lý tại khu vực..."
                                    rows="4" required>{{ old('contact.content') }}</textarea>
                            </div>

                            {{-- Nút gửi --}}
                            <div class="col-12 mt-4 text-center">
                                <button type="button"
                                    class="btn btn-success btn-lg btn-agent-submit px-5 py-3 w-100 fw-bold shadow">
                                    <i class="fa-solid fa-paper-plane me-2"></i> GỬI ĐĂNG KÝ ĐẠI LÝ NGAY
                                </button>
                                <div class="small text-muted mt-2">
                                    <i class="fa-solid fa-lock me-1"></i> Thông tin của quý khách được bảo mật tuyệt đối
                                    100%.
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('head-script')
    @if (config('recaptchav3.sitekey'))
        {!! RecaptchaV3::initJs() !!}
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const agentForm = document.getElementById('form-agent');
            const submitBtn = document.querySelector('.btn-agent-submit');

            if (submitBtn && agentForm) {
                submitBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Xóa các thông báo lỗi cũ
                    document.querySelectorAll('.error-feedback').forEach(el => el.remove());
                    document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove(
                        'is-invalid'));

                    let isValid = true;
                    const nameInput = document.getElementById('Agent_Name');
                    const phoneInput = document.getElementById('Agent_Mobile');
                    const emailInput = document.getElementById('Agent_Email');
                    const addressInput = document.getElementById('Agent_Address');
                    const contentInput = document.getElementById('Agent_Message');

                    // Validate Name
                    if (!nameInput.value.trim()) {
                        showInputError(nameInput, 'Vui lòng nhập họ và tên của bạn!');
                        isValid = false;
                    }

                    // Validate Phone
                    const phoneVal = phoneInput.value.trim();
                    if (!phoneVal) {
                        showInputError(phoneInput, 'Vui lòng nhập số điện thoại nhận báo giá!');
                        isValid = false;
                    } else if (phoneVal.length < 9) {
                        showInputError(phoneInput, 'Số điện thoại hợp lệ tối thiểu 9 số!');
                        isValid = false;
                    }

                    // Validate Email (nếu có nhập)
                    const emailVal = emailInput.value.trim();
                    if (emailVal && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
                        showInputError(emailInput, 'Địa chỉ email không đúng định dạng!');
                        isValid = false;
                    }

                    // Validate Address
                    if (addressInput && !addressInput.value.trim()) {
                        showInputError(addressInput, 'Vui lòng nhập tỉnh/thành phố hoặc khu vực dự kiến!');
                        isValid = false;
                    }

                    // Validate Content
                    const contentVal = contentInput.value.trim();
                    if (!contentVal) {
                        showInputError(contentInput, 'Vui lòng nhập nội dung quan tâm hoặc ghi chú!');
                        isValid = false;
                    } else if (contentVal.length < 5) {
                        showInputError(contentInput, 'Nội dung tối thiểu 5 ký tự!');
                        isValid = false;
                    }

                    if (!isValid) {
                        return;
                    }

                    // Chuyển nút sang trạng thái loading
                    const originalBtnHtml = submitBtn.innerHTML;
                    submitBtn.disabled = true;
                    submitBtn.innerHTML =
                        '<i class="fa-solid fa-spinner fa-spin me-2"></i> Đang xử lý đăng ký...';

                    const formData = new FormData(agentForm);

                    fetch(agentForm.getAttribute('action'), {
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
                                        if (fieldName === 'address') fieldEl = addressInput;
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
