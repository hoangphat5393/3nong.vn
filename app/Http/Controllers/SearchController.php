<?php

namespace App\Http\Controllers;

use App\Models\Frontend\Category;
use App\Models\Frontend\Page;
use App\Models\Frontend\Product;
use App\Traits\FrontendDataTransform;
use App\Traits\LocalizeController;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    use FrontendDataTransform;
    use LocalizeController;

    public array $data = [];

    public function index(Request $request)
    {
        $this->localized();
        $lc = app()->getLocale();

        // Lấy từ khóa tìm kiếm (hỗ trợ cả 'q', 'keyword', 's')
        $keyword = trim($request->input('q') ?? $request->input('keyword') ?? $request->input('s') ?? '');
        $this->data['keyword'] = $keyword;
        $activeTab = $request->input('tab', '');

        $nameCol = ($lc === 'vi') ? 'name' : 'name_'.$lc;

        if (! empty($keyword)) {
            $lowerKey = mb_strtolower($keyword, 'UTF-8');

            // 1. Tìm kiếm Sản Phẩm
            $prodQuery = Product::query()->where('status', 1);
            $prodQuery->where(function ($q) use ($lowerKey, $keyword, $nameCol) {
                $q->whereRaw("LOWER($nameCol) LIKE ?", ['%'.$lowerKey.'%'])
                    ->orWhere('slug', 'like', '%'.Str::slug($keyword).'%');

                $words = array_filter(explode(' ', $lowerKey));
                if (count($words) > 1) {
                    $q->orWhere(function ($subQ) use ($nameCol, $words) {
                        foreach ($words as $w) {
                            $subQ->whereRaw("LOWER($nameCol) LIKE ?", ['%'.$w.'%']);
                        }
                    });
                }
            });

            $products = $prodQuery
                ->select('id', 'name', 'slug', 'image', 'price', 'sale_price', 'price_type', 'unit', 'sort')
                ->orderByDesc('sort')
                ->orderByDesc('id')
                ->paginate(12, ['*'], 'p_page')
                ->appends(['q' => $keyword, 'tab' => 'products']);

            $products->through(fn (Product $product) => $this->transformProductCard($product));
            $this->data['products'] = $products;

            // 2. Tìm kiếm Bài Viết & Tin Tức (Page type = 'post')
            $postQuery = Page::posts()->where('status', 1)->with(['user']);
            $postQuery->where(function ($q) use ($lowerKey, $keyword) {
                $q->whereRaw('LOWER(name) LIKE ?', ['%'.$lowerKey.'%'])
                    ->orWhereRaw('LOWER(description) LIKE ?', ['%'.$lowerKey.'%'])
                    ->orWhereRaw('LOWER(content) LIKE ?', ['%'.$lowerKey.'%'])
                    ->orWhere('slug', 'like', '%'.Str::slug($keyword).'%');

                $words = array_filter(explode(' ', $lowerKey));
                if (count($words) > 1) {
                    $q->orWhere(function ($subQ) use ($words) {
                        foreach ($words as $w) {
                            $subQ->whereRaw('LOWER(name) LIKE ?', ['%'.$w.'%']);
                        }
                    });
                }
            });

            $posts = $postQuery
                ->orderByDesc('sort')
                ->orderByDesc('id')
                ->paginate(10, ['*'], 'post_page')
                ->appends(['q' => $keyword, 'tab' => 'posts']);

            $posts->through(fn (Page $post) => $this->transformPostListItem($post));
            $this->data['posts'] = $posts;

            // Tự động chọn tab nếu người dùng chưa chỉ định: nếu không có sản phẩm mà có bài viết -> mở tab bài viết
            if (empty($activeTab)) {
                $activeTab = ($products->total() === 0 && $posts->total() > 0) ? 'posts' : 'products';
            }
        } else {
            $this->data['products'] = new LengthAwarePaginator([], 0, 12);
            $this->data['posts'] = new LengthAwarePaginator([], 0, 10);
            $activeTab = 'products';
        }

        $this->data['activeTab'] = $activeTab;

        // Lấy danh mục sản phẩm cho Sidebar
        $this->data['categories'] = Category::where(['status' => 1, 'parent' => 0])
            ->with(['children' => fn ($q) => $q->where('status', 1)->orderBy('sort', 'asc')])
            ->orderBy('sort', 'asc')
            ->get(['id', 'name', 'slug', 'image', 'parent', 'sort']);

        return view('frontend.search', $this->data);
    }

    public static function searchMuiltiple($keyword = '')
    {
        $lc = app()->getLocale();
        if ($keyword) {
            $ex = explode(' ', $keyword);

            $db = self::select('*');
            foreach ($ex as $v) {
                $v = '%'.addslashes($v).'%';
                if ($lc == 'vi') {
                    $db->orwhere('name', 'like', $v);
                } else {
                    $db->orwhere('name_'.$lc, 'like', $v);
                }
            }
            foreach ($ex as $v) {
                $db->orwhere('sku', 'like', $v);
            }
        }
        if ($lc == 'vi') {
            $db->orderby('name', 'asc');
        } else {
            $db->orderby('name_'.$lc, 'asc');
        }
        $result = $db->paginate(20)->appends('keyword', $keyword);

        return $result;
    }
}
