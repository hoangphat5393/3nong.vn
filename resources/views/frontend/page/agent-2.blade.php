@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => 'Mẫu 2 - Đăng Ký Hợp Tác Đại Lý Tam Nông',
        'keywords' => 'dai ly 3nong, hop tac dai ly tam nong',
        'description' => 'Hợp tác đại lý phân phối thực phẩm sạch cùng Tam Nông - Bố cục 2 cột gọn gàng.',
        'image' => asset('assets/images/about_farm_meat.jpg'),
    ])
@endsection

@push('head-style')
<style>
    .agent-wrapper-2 {
        background-color: #f8faf9;
        color: #2b2b2b;
    }
    .package-card-2 {
        background: #ffffff;
        border-radius: 14px;
        padding: 24px;
        border: 1px solid #eef2f0;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
        margin-bottom: 20px;
        transition: transform 0.2s, border-color 0.2s;
    }
    .package-card-2:hover {
        border-color: #2e7d32;
        transform: translateY(-2px);
    }
    .sticky-form-box-2 {
        background: #ffffff;
        border-radius: 16px;
        padding: 32px 28px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.07);
        border: 2px solid #e8f5e9;
        position: sticky;
        top: 90px;
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
<!-- THANH ĐIỀU HƯỚNG XEM THỬ MẪU -->
<div class="bg-warning text-dark py-2 px-3 text-center fw-bold border-bottom shadow-sm">
    <i class="fa-solid fa-eye me-2 text-danger"></i> ĐANG XEM: <strong>MẪU 2 (BỐ CỤC 2 CỘT GỌN GÀNG)</strong>
    <span class="ms-2 small text-muted d-none d-md-inline">(Chính sách & cam kết bên trái, form đăng ký bên phải)</span>
    <a href="{{ route('agent.preview1') }}" class="btn btn-dark btn-sm rounded-pill ms-3">
        <i class="fa-solid fa-arrow-left me-1"></i> Xem Mẫu 1 (Landing Page)
    </a>
</div>

<div class="agent-wrapper-2 py-4">
    <div class="container">
        {{-- Breadcrumb --}}
        <div class="post-breadcrumb mb-4">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="separator">/</span>
            <span class="fw-semibold text-success">Đại lý phân phối</span>
        </div>

        <div class="row g-4 align-items-start">
            {{-- Cột Trái (60%): Chính sách & Thông tin hợp tác --}}
            <div class="col-lg-7">
                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">
                    <i class="fa-solid fa-store me-1"></i> Chính Sách B2B
                </span>
                <h1 class="h2 fw-bold text-dark mb-3">Hợp Tác Phân Phối Cùng Tam Nông</h1>
                <p class="text-muted leading-relaxed mb-4">
                    Tam Nông cung cấp các gói hợp tác phân phối thực phẩm sạch linh hoạt, phù hợp với mọi quy mô từ cửa hàng bán lẻ tới đại lý độc quyền tỉnh thành.
                </p>

                {{-- 3 Gói Hợp Tác --}}
                <div class="package-card-2">
                    <div class="d-flex align-items-start gap-3">
                        <div class="p-3 bg-success bg-opacity-10 text-success rounded-3 fs-4">
                            <i class="fa-solid fa-award"></i>
                        </div>
                        <div>
                            <h3 class="h5 fw-bold text-dark mb-1">1. Đại Lý Độc Quyền Khu Vực</h3>
                            <p class="text-muted small mb-2">Dành cho các nhà phân phối có kho bãi hoặc phương tiện vận chuyển tại các quận/huyện, tỉnh thành.</p>
                            <ul class="small text-secondary mb-0 ps-3">
                                <li>Hưởng mức chiết khấu cao nhất (lên đến 35%).</li>
                                <li>Được bảo vệ độc quyền phân phối trong khu vực đăng ký.</li>
                                <li>Hỗ trợ kinh phí biển hiệu, truyền thông và đào tạo bán hàng.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="package-card-2">
                    <div class="d-flex align-items-start gap-3">
                        <div class="p-3 bg-success bg-opacity-10 text-success rounded-3 fs-4">
                            <i class="fa-solid fa-shop"></i>
                        </div>
                        <div>
                            <h3 class="h5 fw-bold text-dark mb-1">2. Cửa Hàng Thực Phẩm & Siêu Thị Mini</h3>
                            <p class="text-muted small mb-2">Dành cho các điểm bán lẻ thực phẩm sạch, bách hóa, siêu thị tiện lợi.</p>
                            <ul class="small text-secondary mb-0 ps-3">
                                <li>Nhập số lượng linh hoạt, không áp đặt doanh số khởi đầu.</li>
                                <li>Giao hàng tươi sống tận nơi mỗi sáng sớm trước giờ mở cửa.</li>
                                <li>Hỗ trợ tài liệu truyền thông, khay trưng bày tiêu chuẩn.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="package-card-2">
                    <div class="d-flex align-items-start gap-3">
                        <div class="p-3 bg-success bg-opacity-10 text-success rounded-3 fs-4">
                            <i class="fa-solid fa-utensils"></i>
                        </div>
                        <div>
                            <h3 class="h5 fw-bold text-dark mb-1">3. Khách Sỉ Nhà Hàng, Khách Sạn, Quán Ăn</h3>
                            <p class="text-muted small mb-2">Cung cấp nguyên liệu thực phẩm định kỳ cho bếp ăn công nghiệp, quán ăn đặc sản.</p>
                            <ul class="small text-secondary mb-0 ps-3">
                                <li>Báo giá sỉ ổn định theo tháng hoặc quý, tránh biến động giá thị trường.</li>
                                <li>Hỗ trợ sơ chế, đóng gói hút chân không theo yêu cầu đầu bếp.</li>
                                <li>Đầy đủ hóa đơn VAT và giấy chứng nhận kiểm dịch an toàn.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Hộp cam kết --}}
                <div class="bg-white p-4 rounded-4 border shadow-sm mt-4">
                    <h3 class="h6 fw-bold text-success text-uppercase mb-3"><i class="fa-solid fa-circle-check me-2"></i> Cam Kết Từ Tam Nông</h3>
                    <div class="row g-3 small text-muted">
                        <div class="col-sm-6">
                            <i class="fa-solid fa-check text-success me-1"></i> Đổi trả 1-1 nếu hàng không đạt chất lượng.
                        </div>
                        <div class="col-sm-6">
                            <i class="fa-solid fa-check text-success me-1"></i> Nguồn cung ổn định 365 ngày/năm.
                        </div>
                        <div class="col-sm-6">
                            <i class="fa-solid fa-check text-success me-1"></i> Đầy đủ giấy tờ VSATTP & Thú y.
                        </div>
                        <div class="col-sm-6">
                            <i class="fa-solid fa-check text-success me-1"></i> Hạn mức công nợ linh hoạt cho đại lý thân thiết.
                        </div>
                    </div>
                </div>
            </div>

            {{-- Cột Phải (40%): Sticky Form Đăng Ký --}}
            <div class="col-lg-5">
                <div class="sticky-form-box-2">
                    <div class="text-center mb-4">
                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">
                            <i class="fa-solid fa-file-lines me-1"></i> Đăng Ký Nhanh
                        </span>
                        <h2 class="h4 fw-bold text-dark mb-1">Đăng Ký Làm Đại Lý</h2>
                        <p class="text-muted small mb-0">Điền thông tin để nhận bảng giá sỉ & chính sách đại lý</p>
                    </div>

                    <form id="agent_form_2" method="post" action="{{ route('contact.submit') }}" novalidate="novalidate">
                        @csrf
                        <input type="hidden" name="contact[type]" value="agent">
                        @if (config('recaptchav3.sitekey'))
                            {!! RecaptchaV3::field('agent') !!}
                        @endif

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Họ và tên <span class="text-danger">*</span></label>
                            <input type="text" name="contact[name]" id="agent2_name" class="form-control py-2" placeholder="Họ và tên của bạn" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Số điện thoại / Zalo <span class="text-danger">*</span></label>
                            <input type="tel" name="contact[phone]" id="agent2_phone" class="form-control py-2" placeholder="Số điện thoại nhận báo giá sỉ" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Khu vực / Tỉnh thành <span class="text-danger">*</span></label>
                            <input type="text" name="contact[address]" id="agent2_address" class="form-control py-2" placeholder="Ví dụ: Quận Bình Thạnh, TP.HCM" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Email nhận bảng giá</label>
                            <input type="email" name="contact[email]" id="agent2_email" class="form-control py-2" placeholder="Email của bạn (không bắt buộc)">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold text-secondary">Mặt hàng quan tâm & Ghi chú <span class="text-danger">*</span></label>
                            <textarea name="contact[content]" id="agent2_content" rows="3" class="form-control py-2" placeholder="Ví dụ: Cần tư vấn mở đại lý thịt bê và gà đồi..." required></textarea>
                        </div>

                        <button type="button" class="btn btn-success btn-agent2-submit w-100 py-3 rounded-pill fw-bold shadow">
                            <i class="fa-solid fa-paper-plane me-1"></i> Gửi Đăng Ký Đại Lý
                        </button>

                        <div class="text-center mt-3 small text-muted">
                            Hoặc liên hệ Hotline B2B: <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0932 009 180')) }}" class="text-success fw-bold text-decoration-none">{{ setting_option('phone', '0932 009 180') }}</a>
                        </div>
                    </form>
                </div>
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
        const agentForm = document.getElementById('agent_form_2');
        const submitBtn = document.querySelector('.btn-agent2-submit');

        if (submitBtn && agentForm) {
            submitBtn.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelectorAll('.error-feedback').forEach(el => el.remove());
                document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

                let isValid = true;
                const nameInput = document.getElementById('agent2_name');
                const phoneInput = document.getElementById('agent2_phone');
                const addressInput = document.getElementById('agent2_address');
                const contentInput = document.getElementById('agent2_content');

                if (!nameInput.value.trim()) {
                    showInputError(nameInput, 'Vui lòng điền họ và tên!');
                    isValid = false;
                }

                const phoneVal = phoneInput.value.trim();
                if (!phoneVal) {
                    showInputError(phoneInput, 'Vui lòng điền số điện thoại!');
                    isValid = false;
                } else if (phoneVal.length < 9) {
                    showInputError(phoneInput, 'Số điện thoại tối thiểu 9 số!');
                    isValid = false;
                }

                if (!addressInput.value.trim()) {
                    showInputError(addressInput, 'Vui lòng nhập khu vực/tỉnh thành!');
                    isValid = false;
                }

                if (!contentInput.value.trim()) {
                    showInputError(contentInput, 'Vui lòng nhập mặt hàng bạn quan tâm!');
                    isValid = false;
                }

                if (!isValid) return;

                const originalBtnHtml = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Đang gửi...';

                const formData = new FormData(agentForm);

                fetch(agentForm.getAttribute('action'), {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json().then(data => ({ status: response.status, body: data })))
                .then(({ status, body }) => {
                    if (status >= 200 && status < 300 && body.status === 'success') {
                        window.location.href = body.redirect || '{{ route("contact_completed") }}';
                    } else {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnHtml;
                        alert(body.message || 'Đã có lỗi xảy ra, vui lòng thử lại!');
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
