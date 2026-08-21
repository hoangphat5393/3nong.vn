@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => 'Mẫu 1 - Đăng Ký Đại Lý Phân Phối Tam Nông',
        'keywords' => 'dai ly 3nong, dai ly thuc pham tam nong',
        'description' =>
            'Chính sách đại lý phân phối thực phẩm sạch Tam Nông - Chiết khấu cao, nguồn hàng ổn định.',
        'image' => asset('assets/images/about_supply_chain.jpg'),
    ])
@endsection

@push('head-style')
    <style>
        .agent-wrapper-1 {
            background-color: #f8faf9;
            color: #2b2b2b;
        }

        .agent-hero-1 {
            background: linear-gradient(135deg, #1b4332 0%, #2d6a4f 60%, #40916c 100%);
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .benefit-card-1 {
            background: #ffffff;
            border-radius: 16px;
            padding: 32px 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #eef2f0;
            height: 100%;
            transition: transform 0.25s, box-shadow 0.25s, border-color 0.25s;
        }

        .benefit-card-1:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(46, 125, 50, 0.12);
            border-color: #2e7d32;
        }

        .benefit-icon-1 {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            background-color: #e8f5e9;
            color: #2e7d32;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            margin-bottom: 20px;
        }

        .step-badge-1 {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background-color: #2e7d32;
            color: #ffffff;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 16px;
            box-shadow: 0 4px 12px rgba(46, 125, 50, 0.3);
        }

        .product-cat-card-1 {
            background: #ffffff;
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid #eef2f0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
            transition: transform 0.2s;
        }

        .product-cat-card-1:hover {
            transform: translateY(-3px);
        }

        .form-agent-box-1 {
            background: #ffffff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2ede5;
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
        <i class="fa-solid fa-eye me-2 text-danger"></i> ĐANG XEM: <strong>MẪU 1 (LANDING PAGE TOÀN DIỆN)</strong>
        <span class="ms-2 small text-muted d-none d-md-inline">(Giới thiệu quyền lợi, danh mục hàng, quy trình & form đăng
            ký)</span>
        <a href="{{ route('agent.preview2') }}" class="btn btn-dark btn-sm rounded-pill ms-3">
            Xem Mẫu 2 (Giao Diện 2 Cột) <i class="fa-solid fa-arrow-right ms-1"></i>
        </a>
    </div>

    <div class="agent-wrapper-1">
        {{-- Hero Section --}}
        <section class="agent-hero-1 pt-3 pb-5">
            <div class="container">
                {{-- Breadcrumb --}}
                <div class="post-breadcrumb mb-3" style="color: rgba(255, 255, 255, 0.75);">
                    <a href="{{ route('home') }}" style="color: rgba(255, 255, 255, 0.85); text-decoration: none;">Trang
                        chủ</a>
                    <span class="separator px-2" style="color: rgba(255, 255, 255, 0.5);">/</span>
                    <span style="color: #ffffff; font-weight: 600;">Hợp tác đại lý</span>
                </div>

                <div class="row align-items-center g-4">
                    <div class="col-lg-7">
                        <span
                            class="badge bg-white bg-opacity-20 text-warning px-3 py-2 rounded-pill fw-bold text-uppercase mb-3 d-inline-block">
                            <i class="fa-solid fa-handshake me-1"></i> Hợp Tác B2B & Phân Phối
                        </span>
                        <h1 class="display-6 fw-bold mb-3 lh-sm">
                            Cùng Tam Nông Phân Phối Thực Phẩm Sạch Đến Mọi Bữa Ăn Việt
                        </h1>
                        <p class="lead text-white text-opacity-90 mb-4 fs-6 lh-base">
                            Chính sách chiết khấu hấp dẫn lên tới <strong>35%</strong>, nguồn hàng phong phú tận gốc trang
                            trại, hỗ trợ quảng bá và giao hàng chuyên nghiệp mỗi ngày.
                        </p>
                        <div class="d-flex gap-3 flex-wrap align-items-center">
                            <a href="#dang-ky-form" class="btn btn-warning text-dark fw-bold px-4 py-3 rounded-pill shadow">
                                <i class="fa-solid fa-file-signature me-1"></i> Đăng Ký Đại Lý Ngay
                            </a>
                            <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0932 009 180')) }}"
                                class="btn btn-outline-light px-4 py-3 rounded-pill fw-bold">
                                <i class="fa-solid fa-phone me-1"></i> Hotline:
                                {{ setting_option('phone', '0932 009 180') }}
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 text-center">
                        <img src="{{ asset('assets/images/about_supply_chain.jpg') }}" alt="Hợp tác đại lý Tam Nông"
                            class="img-fluid rounded-4 shadow-lg border border-3 border-white">
                    </div>
                </div>
            </div>
        </section>

        {{-- Stats Bar --}}
        <section class="py-4 bg-white border-bottom">
            <div class="container">
                <div class="row text-center g-3">
                    <div class="col-6 col-md-3">
                        <div class="h3 fw-bold text-success mb-0">200+</div>
                        <div class="small text-muted text-uppercase fw-semibold">Đại lý & Đối tác</div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="h3 fw-bold text-success mb-0">100%</div>
                        <div class="small text-muted text-uppercase fw-semibold">Chuẩn VSATTP</div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="h3 fw-bold text-success mb-0">35%</div>
                        <div class="small text-muted text-uppercase fw-semibold">Chiết khấu tối đa</div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="h3 fw-bold text-success mb-0">24/7</div>
                        <div class="small text-muted text-uppercase fw-semibold">Hỗ trợ giao hàng</div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 4 Quyền Lợi Đại Lý --}}
        <section class="py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <span
                        class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Quyền
                        lợi đặc quyền</span>
                    <h2 class="h3 fw-bold text-dark">Tại Sao Nên Trở Thành Đại Lý Của Tam Nông?</h2>
                    <p class="text-muted">Chúng tôi mang đến giải pháp nguồn hàng an tâm cùng chính sách kinh doanh bền vững
                        nhất</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="benefit-card-1">
                            <div class="benefit-icon-1">
                                <i class="fa-solid fa-percent"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-2">Chiết Khấu Cao & Ổn Định</h3>
                            <p class="text-muted small mb-0">Giá sỉ tận gốc trang trại, không qua trung gian. Đảm bảo biên
                                độ lợi nhuận kinh doanh cao và thưởng doanh số định kỳ.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="benefit-card-1">
                            <div class="benefit-icon-1">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-2">Nguồn Hàng Đạt Chuẩn</h3>
                            <p class="text-muted small mb-0">Thực phẩm tươi sạch, có đầy đủ giấy kiểm định VSATTP, hóa đơn
                                chứng từ rõ ràng, nâng cao uy tín cho cửa hàng của bạn.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="benefit-card-1">
                            <div class="benefit-icon-1">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-2">Giao Hàng Chuẩn Lạnh</h3>
                            <p class="text-muted small mb-0">Đội xe đông lạnh chuyên dụng vận chuyển hàng ngày, đảm bảo thực
                                phẩm tới tay đại lý luôn giữ trọn độ tươi sống.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="benefit-card-1">
                            <div class="benefit-icon-1">
                                <i class="fa-solid fa-bullhorn"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-2">Hỗ Trợ Truyền Thông</h3>
                            <p class="text-muted small mb-0">Cung cấp tư liệu hình ảnh, video sản phẩm, tài liệu bán hàng và
                                hỗ trợ chuyển khách hàng lẻ khu vực về cho đại lý.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Danh Mục Sản Phẩm Chủ Lực --}}
        <section class="py-5 bg-white border-top border-bottom">
            <div class="container">
                <div class="text-center mb-5">
                    <span
                        class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Sản
                        phẩm phân phối</span>
                    <h2 class="h3 fw-bold text-dark">Các Nhóm Mặt Hàng Chủ Lực Của Tam Nông</h2>
                    <p class="text-muted">Được ưa chuộng và tiêu thụ mạnh tại các hệ thống siêu thị, nhà hàng, quán ăn</p>
                </div>

                <div class="row g-4 text-center">
                    <div class="col-6 col-md-3">
                        <div class="product-cat-card-1 p-3">
                            <div class="p-3 bg-success bg-opacity-10 text-success rounded-circle d-inline-flex mb-3">
                                <i class="fa-solid fa-drumstick-bite fs-3"></i>
                            </div>
                            <h3 class="h6 fw-bold mb-1">Thịt Bê & Bê Bó Giò</h3>
                            <p class="small text-muted mb-0">Thịt bê tươi, bê xối sả, bê rút xương đặc sản đóng khay.</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="product-cat-card-1 p-3">
                            <div class="p-3 bg-success bg-opacity-10 text-success rounded-circle d-inline-flex mb-3">
                                <i class="fa-solid fa-feather fs-3"></i>
                            </div>
                            <h3 class="h6 fw-bold mb-1">Thịt Gà Đồi & Chim Trĩ</h3>
                            <p class="small text-muted mb-0">Gà thả vườn đồi, chim trĩ thương phẩm thịt chắc ngọt.</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="product-cat-card-1 p-3">
                            <div class="p-3 bg-success bg-opacity-10 text-success rounded-circle d-inline-flex mb-3">
                                <i class="fa-solid fa-bacon fs-3"></i>
                            </div>
                            <h3 class="h6 fw-bold mb-1">Thịt Heo Rừng Sạch</h3>
                            <p class="small text-muted mb-0">Thịt heo rừng lai F1 bì giòn thịt thơm, an toàn tuyệt đối.</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="product-cat-card-1 p-3">
                            <div class="p-3 bg-success bg-opacity-10 text-success rounded-circle d-inline-flex mb-3">
                                <i class="fa-solid fa-seedling fs-3"></i>
                            </div>
                            <h3 class="h6 fw-bold mb-1">Hạt Giống & Nông Sản</h3>
                            <p class="small text-muted mb-0">Hạt giống rau củ, đặc sản nông nghiệp chất lượng cao.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Quy Trình 4 Bước --}}
        <section class="py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <span
                        class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Quy
                        trình hợp tác</span>
                    <h2 class="h3 fw-bold text-dark">4 Bước Đơn Giản Để Trở Thành Đại Lý</h2>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-lg-3 text-center">
                        <div class="bg-white p-4 rounded-4 shadow-sm h-100 border">
                            <div class="step-badge-1 mx-auto">1</div>
                            <h3 class="h6 fw-bold mb-2">Gửi Thông Tin</h3>
                            <p class="text-muted small mb-0">Điền form đăng ký phía dưới hoặc liên hệ trực tiếp hotline
                                phòng kinh doanh.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center">
                        <div class="bg-white p-4 rounded-4 shadow-sm h-100 border">
                            <div class="step-badge-1 mx-auto">2</div>
                            <h3 class="h6 fw-bold mb-2">Tư Vấn & Báo Giá Sỉ</h3>
                            <p class="text-muted small mb-0">Chuyên viên liên hệ gửi bảng giá chiết khấu, chính sách và tư
                                vấn gói hợp tác phù hợp.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center">
                        <div class="bg-white p-4 rounded-4 shadow-sm h-100 border">
                            <div class="step-badge-1 mx-auto">3</div>
                            <h3 class="h6 fw-bold mb-2">Ký Kết Hợp Đồng</h3>
                            <p class="text-muted small mb-0">Thống nhất các điều khoản quyền lợi, hạn mức công nợ và ký kết
                                hợp tác chính thức.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center">
                        <div class="bg-white p-4 rounded-4 shadow-sm h-100 border">
                            <div class="step-badge-1 mx-auto">4</div>
                            <h3 class="h6 fw-bold mb-2">Nhập Hàng & Đồng Hành</h3>
                            <p class="text-muted small mb-0">Tam Nông tiến hành giao chuyến hàng đầu tiên và đồng hành hỗ
                                trợ kinh doanh liên tục.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Form Đăng Ký Đại Lý --}}
        <section class="py-5 bg-white border-top" id="dang-ky-form">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="form-agent-box-1">
                            <div class="text-center mb-4">
                                <span
                                    class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">
                                    <i class="fa-solid fa-pen-nib me-1"></i> Form Đăng Ký
                                </span>
                                <h2 class="h3 fw-bold text-dark mb-2">Đăng Ký Nhận Bảng Giá Đại Lý & Chính Sách Sỉ</h2>
                                <p class="text-muted small">Vui lòng điền thông tin để chuyên viên kinh doanh Tam Nông gửi
                                    báo giá sỉ ưu đãi nhất trong vòng 15 phút.</p>
                            </div>

                            <form id="agent_form_1" method="post" action="{{ route('contact.submit') }}"
                                novalidate="novalidate">
                                @csrf
                                <input type="hidden" name="contact[type]" value="agent">
                                @if (config('recaptchav3.sitekey'))
                                    {!! RecaptchaV3::field('agent') !!}
                                @endif

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">Họ và tên của bạn <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="contact[name]" id="agent1_name"
                                            class="form-control py-2" placeholder="Ví dụ: Nguyễn Văn A" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">Số điện thoại / Zalo <span
                                                class="text-danger">*</span></label>
                                        <input type="tel" name="contact[phone]" id="agent1_phone"
                                            class="form-control py-2" placeholder="Số điện thoại nhận báo giá" required>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">Email nhận báo giá</label>
                                        <input type="email" name="contact[email]" id="agent1_email"
                                            class="form-control py-2" placeholder="Email của bạn (không bắt buộc)">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">Khu vực / Tỉnh thành kinh
                                            doanh <span class="text-danger">*</span></label>
                                        <input type="text" name="contact[address]" id="agent1_address"
                                            class="form-control py-2" placeholder="Ví dụ: TP. Thủ Đức, TP.HCM" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-secondary">Mô hình kinh doanh hiện
                                        tại</label>
                                    <select name="contact[business_type]" class="form-select py-2">
                                        <option value="Cửa hàng thực phẩm sạch">Cửa hàng thực phẩm sạch / Bách hóa</option>
                                        <option value="Nhà hàng / Quán ăn / Khách sạn">Nhà hàng / Quán ăn / Khách sạn
                                        </option>
                                        <option value="Siêu thị mini">Siêu thị mini / Chuỗi tiện lợi</option>
                                        <option value="Đại lý phân phối khu vực">Đại lý phân phối cấp khu vực</option>
                                        <option value="Kinh doanh Online / Khác">Kinh doanh Online / Cá nhân phân phối
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-secondary">Nhóm mặt hàng quan tâm & Lời
                                        nhắn <span class="text-danger">*</span></label>
                                    <textarea name="contact[content]" id="agent1_content" rows="3" class="form-control py-2"
                                        placeholder="Ví dụ: Cần tư vấn báo giá sỉ thịt bê và gà đồi giao tại TP.HCM..." required></textarea>
                                </div>

                                <div class="text-center">
                                    <button type="button"
                                        class="btn btn-success btn-agent1-submit px-5 py-3 rounded-pill fw-bold shadow">
                                        <i class="fa-solid fa-paper-plane me-1"></i> Gửi Đăng Ký Đại Lý
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('head-script')
    @if (config('recaptchav3.sitekey'))
        {!! RecaptchaV3::initJs() !!}
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const agentForm = document.getElementById('agent_form_1');
            const submitBtn = document.querySelector('.btn-agent1-submit');

            if (submitBtn && agentForm) {
                submitBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    document.querySelectorAll('.error-feedback').forEach(el => el.remove());
                    document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove(
                        'is-invalid'));

                    let isValid = true;
                    const nameInput = document.getElementById('agent1_name');
                    const phoneInput = document.getElementById('agent1_phone');
                    const addressInput = document.getElementById('agent1_address');
                    const contentInput = document.getElementById('agent1_content');

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
                        showInputError(addressInput, 'Vui lòng nhập khu vực/tỉnh thành kinh doanh!');
                        isValid = false;
                    }

                    if (!contentInput.value.trim()) {
                        showInputError(contentInput, 'Vui lòng nhập lời nhắn hoặc mặt hàng bạn quan tâm!');
                        isValid = false;
                    }

                    if (!isValid) return;

                    const originalBtnHtml = submitBtn.innerHTML;
                    submitBtn.disabled = true;
                    submitBtn.innerHTML =
                        '<i class="fa-solid fa-spinner fa-spin me-1"></i> Đang gửi đăng ký...';

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
