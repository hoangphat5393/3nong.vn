@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => 'Giới thiệu Tam Nông - Mẫu 2 (Backup)',
        'description' =>
            'Tam Nông chuyên cung cấp thực phẩm tươi sạch, thịt bê, thịt gà đồi, chim trĩ, thịt heo rừng nguồn gốc rõ ràng, an toàn vệ sinh thực phẩm.',
        'image' => asset('assets/images/about_farm_meat.jpg'),
    ])
@endsection

@section('content')
    <div class="about-wrapper">
        {{-- Hero Section --}}
        <section class="about-hero pt-3 pb-5">
            <div class="container">
                {{-- Breadcrumb --}}
                <div class="post-breadcrumb mb-3" style="color: rgba(255, 255, 255, 0.75);">
                    <a href="{{ route('home') }}" style="color: rgba(255, 255, 255, 0.85); text-decoration: none;">Trang
                        chủ</a>
                    <span class="separator px-2" style="color: rgba(255, 255, 255, 0.5);">/</span>
                    <span style="color: #ffffff; font-weight: 600;">Giới thiệu</span>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-7 mb-4 mb-lg-0">
                        <span class="about-badge"><i class="fa-solid fa-leaf me-1"></i> Thương Hiệu Thực Phẩm Tam
                            Nông</span>
                        <h1 class="mb-3">Tươi Ngon Từ Trang Trại - An Tâm Cho Mọi Bữa Ăn Việt</h1>
                        <p class="lead mb-4">
                            Tam Nông tự hào là đơn vị uy tín chuyên phân phối thực phẩm tươi sống, thịt bê, thịt gia cầm,
                            thịt heo sạch và đặc sản nông nghiệp đạt chuẩn an toàn vệ sinh thực phẩm cao nhất.
                        </p>
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="{{ route('product.all') }}" class="btn-tamnong">Khám phá sản phẩm</a>
                            <a href="{{ route('contact') }}"
                                class="btn btn-outline-light rounded-pill px-4 fw-bold align-self-center py-2"
                                style="font-size:14px;">Liên hệ hợp tác</a>
                        </div>
                    </div>
                    <div class="col-lg-5 text-center">
                        <img src="{{ asset('assets/images/about_farm_meat.jpg') }}" alt="Thực phẩm sạch Tam Nông"
                            class="img-fluid rounded-4 shadow-lg border border-3 border-white">
                    </div>
                </div>
            </div>
        </section>

        {{-- Stats Row --}}
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row g-4">
                    <div class="col-6 col-md-3">
                        <div class="stat-card">
                            <div class="num">100%</div>
                            <div class="label">Nguồn gốc minh bạch</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-card">
                            <div class="num">50k+</div>
                            <div class="label">Bữa ăn gia đình</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-card">
                            <div class="num">24h</div>
                            <div class="label">Giao thịt tươi tận nơi</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-card">
                            <div class="num">100+</div>
                            <div class="label">Đại lý & Đối tác</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Story Section --}}
        <section class="py-5">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/images/about_supply_chain.jpg') }}" alt="Quy trình thực phẩm Tam Nông"
                            class="img-fluid rounded-4 shadow-sm">
                    </div>
                    <div class="col-lg-6">
                        <span class="text-success fw-bold text-uppercase small tracking-wider">Hành trình Tam Nông</span>
                        <h2 class="fw-bold mb-3" style="color: #1a1a1a;">Sứ mệnh mang bữa ăn sạch & dinh dưỡng đến mọi nhà
                        </h2>
                        <p class="text-muted leading-relaxed mb-3">
                            Thành lập với khát vọng nâng cao chất lượng bữa ăn gia đình Việt, <strong>Tam Nông</strong> liên
                            kết trực tiếp với các trang trại nuôi trồng đạt chuẩn để tuyển chọn những nguồn thịt tươi ngon,
                            an toàn nhất.
                        </p>
                        <p class="text-muted leading-relaxed mb-4">
                            Từ khâu chăn nuôi tự nhiên, chọn lọc sản phẩm đến khâu bảo quản lạnh khép kín, từng miếng thịt
                            bê, thịt gà, thịt heo khi đến tay khách hàng luôn giữ trọn độ tươi, mọng nước và giá trị dinh
                            dưỡng cao.
                        </p>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-circle-check text-success fs-5"></i>
                                    <span class="fw-bold text-dark">Kiểm định thú y nghiêm ngặt</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-circle-check text-success fs-5"></i>
                                    <span class="fw-bold text-dark">Bảo quản mát đạt chuẩn</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-circle-check text-success fs-5"></i>
                                    <span class="fw-bold text-dark">Không phụ gia bảo quản</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-circle-check text-success fs-5"></i>
                                    <span class="fw-bold text-dark">Tối ưu giá thành trực tiếp</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Core Values --}}
        <section class="py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="text-success fw-bold text-uppercase small">Cam kết dịch vụ</span>
                    <h2 class="fw-bold text-dark">4 Trụ Cột Chất Lượng Tam Nông</h2>
                </div>
                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="about-feature-box text-center">
                            <div class="about-feature-icon mx-auto">
                                <i class="fa-solid fa-cow"></i>
                            </div>
                            <h4 class="h6 fw-bold mb-2">Thịt Tươi Tự Nhiên</h4>
                            <p class="small text-muted mb-0">Nguồn gia súc, gia cầm được nuôi theo quy chuẩn tự nhiên, thịt
                                săn chắc, vị ngọt tự nhiên.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="about-feature-box text-center">
                            <div class="about-feature-icon mx-auto">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <h4 class="h6 fw-bold mb-2">An Toàn Vệ Sinh</h4>
                            <p class="small text-muted mb-0">Cam kết 100% có chứng nhận an toàn thực phẩm, không tồn dư chất
                                cấm hay kháng sinh.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="about-feature-box text-center">
                            <div class="about-feature-icon mx-auto">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <h4 class="h6 fw-bold mb-2">Giao Hàng Siêu Tốc</h4>
                            <p class="small text-muted mb-0">Đóng gói thùng lạnh chuyên dụng, giao tận tay trong ngày giữ
                                trọn hương vị tươi mọng.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="about-feature-box text-center">
                            <div class="about-feature-icon mx-auto">
                                <i class="fa-solid fa-hand-holding-dollar"></i>
                            </div>
                            <h4 class="h6 fw-bold mb-2">Giá Cả Bình Ổn</h4>
                            <p class="small text-muted mb-0">Phân phối trực tiếp từ trang trại giúp cắt giảm trung gian,
                                mang lại mức giá hợp lý nhất.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Call to action commitment --}}
        <section class="py-5">
            <div class="container">
                <div class="commit-box text-center">
                    <h3 class="fw-bold text-success mb-3">Tam Nông - Đồng Hành Cùng Mọi Bữa Ăn An Lành</h3>
                    <p class="text-secondary max-w-2xl mx-auto mb-4" style="max-width:700px;">
                        Hãy để Tam Nông chăm sóc sức khỏe gia đình bạn bằng những sản phẩm thực phẩm tươi sạch, thơm ngon và
                        an toàn nhất mỗi ngày.
                    </p>
                    <a href="{{ route('product.all') }}" class="btn-tamnong me-2">Đặt mua thực phẩm tươi</a>
                    <a href="tel:{{ str_replace(' ', '', setting_option('phone', '0932.009.180')) }}"
                        class="btn btn-outline-success rounded-pill px-4 py-2 fw-bold" style="font-size:14px;">
                        <i class="fa-solid fa-phone me-1"></i> Hotline: {{ setting_option('phone', '0932 009 180') }}
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
