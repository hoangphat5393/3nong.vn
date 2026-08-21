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
}
