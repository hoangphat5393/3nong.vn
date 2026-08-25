<?php

namespace App\Http\Controllers;

use App\Models\Frontend\Category;
use App\Models\Frontend\Page;
use App\Models\Frontend\Product;
use App\Traits\FrontendDataTransform;
use App\Traits\LocalizeController;
use Gornymedia\Shortcodes\Facades\Shortcode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    use FrontendDataTransform;
    use LocalizeController;

    public $data = [];

    // $this->templatePath
    public function index()
    {
        $this->localized();
        $page = Page::where('slug', 'home')->first();

        $products_hot = Product::where('status', 1)
            ->where('hot', 1)
            ->orderBy('sort', 'asc')
            ->get();
        if ($products_hot->isEmpty()) {
            $products_hot = Product::where('status', 1)
                ->orderBy('sort', 'asc')
                ->get();
        }

        $cat_product = Category::where('status', 1)
            ->where('parent', 0)
            ->orderBy('sort', 'asc')
            ->with(['products' => function ($query) {
                $query->where('status', 1)->orderBy('sort', 'asc');
            }])
            ->get();

        $post_list = Page::posts()
            ->where('status', 1)
            ->orderBy('sort', 'asc')
            ->get();

        $slides = [];
        try {
            $rawSlides = DB::table('3nong.slide')
                ->where('Slide_Show', 1)
                ->orderBy('Slide_Priority', 'asc')
                ->get();

            foreach ($rawSlides as $s) {
                $cleanPath = str_replace(['../upload/', 'upload/', '../'], '', $s->Slide_Img);
                if (! str_contains($cleanPath, '/')) {
                    $cleanPath = 'slide/'.$cleanPath;
                }
                $slides[] = [
                    'title' => $s->Slide_Title_vi ?: 'Slide',
                    'image' => 'upload/images/'.$cleanPath,
                    'link' => $s->Slide_Url ?: '#',
                ];
            }
        } catch (\Throwable $e) {
            // Ignore error and fall back to default slides if table or query fails
        }
        if (empty($slides)) {
            $slides = [
                ['title' => 'GÀ ÁC TIỀM', 'image' => 'upload/images/slide/1659941826_843601.jpg', 'link' => '#'],
                ['title' => 'CHIM CÚT', 'image' => 'upload/images/slide/1659942234_632056.jpg', 'link' => '#'],
            ];
        }

        $seo = [
            'seo_title' => ($page && $page->seo_title) ? $page->seo_title : '3 Nông - Vật Tư Nông Nghiệp',
            'seo_image' => ($page && $page->image) ? $page->image : '',
            'seo_description' => ($page && $page->seo_description) ? $page->seo_description : '',
            'seo_keyword' => ($page && $page->seo_keyword) ? $page->seo_keyword : '',
        ];

        return view('frontend.home', compact('page', 'products_hot', 'cat_product', 'post_list', 'slides', 'seo'));
    }

    public function page($slug)
    {

        $this->localized();
        if ($slug == 'home' || $slug == 'trangchu') {
            return $this->index();
        }

        $page = Page::pages()->where('slug', $slug)->first();

        if ($page) {
            // if ($page->template == 'project')
            //     return $this->project($slug);

            // if ($slug == 'about')
            //     return $this->about($slug);

            // if ($slug == 'product')
            //     return $this->product($slug);

            // if ($slug == 'news')
            //     return $this->news($slug);

            $this->data['seo'] = [
                'seo_title' => $page->seo_title != '' ? $page->seo_title : $page->title,
                'seo_image' => $page->image,
                'seo_description' => $page->seo_description ?? '',
                'seo_keyword' => $page->seo_keyword ?? '',
            ];

            $this->data['page'] = $page;

            if ($slug === 'about') {
                $this->data['about_gallery'] = Page::posts()
                    ->where('status', 1)
                    ->whereNotNull('image')
                    ->orderByDesc('id')
                    ->limit(4)
                    ->get();
            }
            $templateName = 'frontend.page.'.$slug;

            if (View::exists($templateName)) {
                $html = view($templateName, $this->data)->render();
                try {
                    $html = Shortcode::compile($html);
                } catch (\Throwable $e) {
                }

                return $html;
            } else {
                $html = view('frontend.page.index', ['data' => $this->data])->render();
                try {
                    $html = Shortcode::compile($html);
                } catch (\Throwable $e) {
                }

                return $html;
            }
        } else {
            abort(404);
        }
    }

    // public function news($slug)
    // {
    //     return \App::call('App\Http\Controllers\PostController@index',  [
    //         "slug" => $slug
    //     ]);
    // }

    // public function product($slug)
    // {
    //     return \App::call('App\Http\Controllers\ProductController@index',  [
    //         "slug" => $slug
    //     ]);
    // }

    // public function about($slug)
    // {
    //     return \App::call('App\Http\Controllers\AboutController@index',  [
    //         "slug" => $slug
    //     ]);
    // }

    // public function project($slug)
    // {
    //     return \App::call('App\Http\Controllers\ProjectController@index',  [
    //         "slug" => $slug
    //     ]);
    // }

    public function listLocation()
    {
        $data = [
            'mienbac' => 'Miền Bắc',
            'mientrung' => 'Miền Trung',
            'miennam' => 'Miền Nam',
        ];

        return $data;
    }

    public function demoOption2()
    {
        $this->localized();
        $page = Page::where('slug', 'home')->first();

        $products_hot = Product::where('status', 1)
            ->where('hot', 1)
            ->orderBy('sort', 'asc')
            ->get();
        if ($products_hot->isEmpty()) {
            $products_hot = Product::where('status', 1)
                ->orderBy('sort', 'asc')
                ->get();
        }

        $cat_product = Category::where('status', 1)
            ->where('parent', 0)
            ->orderBy('sort', 'asc')
            ->with(['products' => function ($query) {
                $query->where('status', 1)->orderBy('sort', 'asc');
            }])
            ->get();

        $post_list = Page::posts()
            ->where('status', 1)
            ->orderBy('sort', 'asc')
            ->get();

        $slides = [];
        try {
            $rawSlides = DB::table('3nong.slide')
                ->where('Slide_Show', 1)
                ->orderBy('Slide_Priority', 'asc')
                ->get();

            foreach ($rawSlides as $s) {
                $cleanPath = str_replace(['../upload/', 'upload/', '../'], '', $s->Slide_Img);
                if (! str_contains($cleanPath, '/')) {
                    $cleanPath = 'slide/'.$cleanPath;
                }
                $slides[] = [
                    'image' => $cleanPath,
                    'title' => $s->Slide_Name ?? 'Slide',
                    'link' => $s->Slide_Link ?? '#',
                ];
            }
        } catch (\Throwable $e) {
        }

        $seo = [
            'seo_title' => 'Xem thử Phương Án 2 - Giá Inline Gọn Gàng',
            'seo_keyword' => '',
            'seo_description' => 'Demo giao diện hiển thị giá Phương án 2',
            'seo_image' => get_image(setting_option('logo')),
        ];

        return view('frontend.demo-home-2', compact('page', 'products_hot', 'cat_product', 'post_list', 'slides', 'seo'));
    }

    private function getDemoData(string $title, string $description): array
    {
        $this->localized();
        $page = Page::where('slug', 'home')->first();

        $products_hot = Product::where('status', 1)
            ->where('hot', 1)
            ->orderBy('sort', 'asc')
            ->limit(8)
            ->get();
        if ($products_hot->isEmpty()) {
            $products_hot = Product::where('status', 1)
                ->orderBy('sort', 'asc')
                ->limit(8)
                ->get();
        }

        $all_products = Product::where('status', 1)
            ->orderBy('id', 'desc')
            ->limit(12)
            ->get();

        $cat_product = Category::where('status', 1)
            ->where('parent', 0)
            ->orderBy('sort', 'asc')
            ->with(['products' => function ($query) {
                $query->where('status', 1)->orderBy('sort', 'asc')->limit(8);
            }])
            ->get();

        $post_list = Page::posts()
            ->where('status', 1)
            ->orderBy('sort', 'asc')
            ->limit(6)
            ->get();

        $slides = [
            [
                'title' => 'Thực Phẩm Sạch Từ Nông Trại - Tươi Ngon Mỗi Ngày',
                'subtitle' => 'Chuyên cung cấp thịt bê tươi, heo rừng, gà đồi, chim trĩ và các món đặc sản sơ chế chuẩn an toàn vệ sinh thực phẩm',
                'image' => 'upload/images/slide/1659941826_843601.jpg',
                'badge' => '100% NGUỒN GỐC AN TOÀN',
                'link' => route('home'),
            ],
            [
                'title' => 'Đặc Sản Thịt Tươi Thượng Hạng Giao Tận Bếp 2H',
                'subtitle' => 'Đóng gói hút chân không sạch sẽ, bảo quản chuỗi lạnh giữ trọn độ tươi ngọt tự nhiên',
                'image' => 'upload/images/slide/1659942234_632056.jpg',
                'badge' => 'KIỂM DỊCH CHẶT CHẼ',
                'link' => route('home'),
            ],
        ];

        $seo = [
            'seo_title' => $title,
            'seo_keyword' => '3 nong, tam nong, thuc pham sach, thit be, thit chim, heo rung, ga doi, ga ac tiem, dac san nong trai',
            'seo_description' => $description,
            'seo_image' => get_image(setting_option('logo')),
        ];

        return compact('page', 'products_hot', 'all_products', 'cat_product', 'post_list', 'slides', 'seo');
    }

    public function demoConcept1()
    {
        $data = $this->getDemoData(
            'Mẫu 1: Green & Sun Vitality — Thực Phẩm & Thịt Tươi Sạch Chuẩn Brand (3 Nông)',
            'Bản xem thử giao diện Mẫu 1 tone màu Cam & Xanh Lá chuẩn thương hiệu Tam Nông Thực Phẩm Sạch'
        );

        return view('frontend.demo.concept_1', $data);
    }

    public function demoConcept2()
    {
        $data = $this->getDemoData(
            'Mẫu 2: Eco Clean & Farm-to-Table — Chuỗi Cung Ứng Thực Phẩm Nông Trại Khép Kín',
            'Bản xem thử giao diện Mẫu 2 phong cách tối giản, sang trọng, chuỗi cung ứng thực phẩm tươi sạch'
        );

        return view('frontend.demo.concept_2', $data);
    }

    public function demoConcept3()
    {
        $data = $this->getDemoData(
            'Mẫu 3: Dynamic Modern Food Mart — Sàn Thực Phẩm Tươi & Flash Sale Giờ Vàng',
            'Bản xem thử giao diện Mẫu 3 tối ưu chuyển đổi bán lẻ thực phẩm gia đình, combo lẩu nướng và Flash Sale'
        );

        return view('frontend.demo.concept_3', $data);
    }

    public function demoConcept4()
    {
        $data = $this->getDemoData(
            'Mẫu 4: NextGen Bento Food & Chef Picks — Đặc Sản Nông Trại & Gợi Ý Bếp Trưởng',
            'Bản xem thử giao diện Mẫu 4 phong cách Bento Grid hiện đại, thực phẩm sạch thượng hạng'
        );

        return view('frontend.demo.concept_4', $data);
    }

    public function demoConcept5()
    {
        $data = $this->getDemoData(
            'Mẫu 5: Nordic Minimalist Luxury Organic — Bữa Ăn Hữu Cơ Thượng Hạng Chuẩn Bắc Âu',
            'Bản xem thử giao diện Mẫu 5 phong cách Bắc Âu tinh tế, tôn vinh nguồn thực phẩm sạch tự nhiên'
        );

        return view('frontend.demo.concept_5', $data);
    }
}
