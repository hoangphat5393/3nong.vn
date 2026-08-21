@extends('frontend.layouts.master')

@section('seo')
    @include('frontend.layouts.seo', [
        'title' => 'Giới Thiệu - ' . setting_option('webtitle', 'Tam Nông'),
        'keywords' => setting_option('keywords', 'gioi thieu 3nong, thuc pham tam nong'),
        'description' => setting_option('description', 'Giới thiệu về thương hiệu thực phẩm sạch Tam Nông'),
        'image' => asset('assets/images/about_farm_meat.jpg'),
    ])
@endsection

@section('content')
    <div class="container py-4">
        {{-- Breadcrumb --}}
        <div class="post-breadcrumb mb-3">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span class="separator">/</span>
            <span class="text-white">Giới thiệu</span>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="block-title text-center mb-4">
                    <h1 class="h2 fw-bold text-success">GIỚI THIỆU</h1>
                </div>

                <div class="bg-white p-4 p-md-5 rounded shadow-sm border about-basic-page">
                    @if (!empty($page->content))
                        {!! $page->content !!}
                    @else
                        <div class="text-center mb-4">
                            <img src="{{ asset('assets/images/about_farm_meat.jpg') }}" alt="Thực phẩm tươi sạch Tam Nông"
                                class="img-fluid rounded shadow-sm"
                                style="max-height: 420px; width: 100%; object-fit: cover;">
                        </div>

                        <h2>1. Về Chúng Tôi - Thương Hiệu Tam Nông</h2>
                        <p>
                            <strong>Tam Nông</strong> là đơn vị chuyên cung cấp và phân phối các dòng sản phẩm nông sản,
                            thực phẩm tươi sống sạch như: thịt bê tươi, thịt gà đồi, chim trĩ, thịt heo rừng lai và đặc sản
                            vùng miền. Chúng tôi ra đời với mong muốn mang đến những bữa ăn an toàn, thơm ngon và giàu giá
                            trị dinh dưỡng cho mọi gia đình Việt.
                        </p>
                        <p>
                            Toàn bộ nguồn thực phẩm tại Tam Nông đều được chọn lọc trực tiếp từ các trang trại chăn nuôi
                            theo mô hình tự nhiên, đạt tiêu chuẩn an toàn sinh học và kiểm dịch thú y nghiêm ngặt trước khi
                            đến tay người tiêu dùng.
                        </p>

                        <div class="about-feature-box">
                            <h3 class="h6 fw-bold text-success mb-2"><i class="fa-solid fa-leaf me-1"></i> Phương châm hoạt
                                động:</h3>
                            <p class="mb-0 fst-italic">
                                "Nông nghiệp xanh - Thực phẩm sạch - Vì sức khỏe vàng của cộng đồng."
                            </p>
                        </div>

                        <h2>2. Tầm Nhìn & Sứ Mệnh</h2>
                        <ul>
                            <li><strong>Tầm nhìn:</strong> Trở thành hệ thống phân phối thực phẩm tươi sống sạch và nông sản
                                uy tín hàng đầu, là đối tác tin cậy của các hộ gia đình, đại lý, nhà hàng và bếp ăn công
                                nghiệp.</li>
                            <li><strong>Sứ mệnh:</strong> Cung cấp thực phẩm minh bạch 100% về nguồn gốc xuất xứ, kiểm soát
                                nghiêm ngặt dư lượng hóa chất và kháng sinh, góp phần nâng cao chất lượng cuộc sống cho
                                người dân.</li>
                        </ul>

                        <div class="my-4 text-center">
                            <img src="{{ asset('assets/images/about_supply_chain.jpg') }}"
                                alt="Quy trình cung ứng thực phẩm Tam Nông" class="img-fluid rounded shadow-sm"
                                style="max-height: 380px; width: 100%; object-fit: cover;">
                            <small class="text-muted d-block mt-2">Quy trình chọn lọc và bảo quản lạnh khép kín tại Tam
                                Nông</small>
                        </div>

                        <h2>3. Cam Kết Chất Lượng Dịch Vụ</h2>
                        <ul>
                            <li><strong>Thịt tươi mỗi ngày:</strong> Không bán hàng cũ, hàng đông lạnh tồn kho dài ngày.
                            </li>
                            <li><strong>An toàn vệ sinh:</strong> Đầy đủ giấy tờ chứng nhận kiểm dịch, đóng gói hút chân
                                không sạch sẽ.</li>
                            <li><strong>Giao hàng nhanh chóng:</strong> Đóng thùng giữ nhiệt chuyên dụng, giao tận nơi đảm
                                bảo thực phẩm luôn giữ độ tươi ngon mọng nước.</li>
                            <li><strong>Giá cả bình ổn:</strong> Thu mua trực tiếp tận gốc, giảm thiểu chi phí trung gian.
                            </li>
                        </ul>

                        <h2>4. Thông Tin Liên Hệ</h2>
                        <p class="mb-1"><strong>Trụ sở:</strong>
                            {{ setting_option('address', 'Số 66 đường 40, P. Hiệp Bình Chánh, TP. Thủ Đức, TP. Hồ Chí Minh') }}
                        </p>
                        <p class="mb-1"><strong>Hotline:</strong> {{ setting_option('phone', '0932 009 180') }}</p>
                        <p class="mb-1"><strong>Email:</strong> {{ setting_option('email', 'tamnong.corp@gmail.com') }}
                        </p>
                        <p class="mb-3"><strong>Website:</strong> {{ request()->root() }}</p>

                        <div class="text-center pt-3 mt-4 border-top">
                            <a href="{{ route('product.all') }}"
                                class="btn btn-success px-4 py-2 rounded-pill fw-bold me-2">
                                <i class="fa-solid fa-cart-shopping me-1"></i> Xem danh mục sản phẩm
                            </a>
                            <a href="{{ route('contact') }}"
                                class="btn btn-outline-secondary px-4 py-2 rounded-pill fw-bold">
                                <i class="fa-solid fa-phone me-1"></i> Liên hệ ngay
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
