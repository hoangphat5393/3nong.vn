<?php

namespace App\Http\Controllers;

use App\Models\Frontend\Category;
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

        $nameCol = ($lc === 'vi') ? 'name' : 'name_' . $lc;

        if (! empty($keyword)) {
            $query = Product::query()->where('status', 1);

            $query->where(function ($q) use ($keyword, $nameCol) {
                // Khớp trọn cụm từ khóa hoặc slug
                $q->where($nameCol, 'like', '%' . $keyword . '%')
                    ->orWhere('slug', 'like', '%' . Str::slug($keyword) . '%');

                // Khớp từng từ đơn nếu nhập nhiều từ
                $words = array_filter(explode(' ', $keyword));
                if (count($words) > 1) {
                    $q->orWhere(function ($subQ) use ($nameCol, $words) {
                        foreach ($words as $w) {
                            $subQ->where($nameCol, 'like', '%' . $w . '%');
                        }
                    });
                }
            });

            $products = $query
                ->select('id', 'name', 'slug', 'image', 'price', 'sale_price', 'price_type', 'unit', 'sort')
                ->orderByDesc('sort')
                ->orderByDesc('id')
                ->paginate(12)
                ->appends(['q' => $keyword]);

            $products->through(fn(Product $product) => $this->transformProductCard($product));

            $this->data['products'] = $products;
        } else {
            $this->data['products'] = new LengthAwarePaginator([], 0, 12);
        }

        // Lấy danh mục sản phẩm cho Sidebar
        $this->data['categories'] = Category::where(['status' => 1, 'parent' => 0])
            ->with(['children' => fn($q) => $q->where('status', 1)->orderBy('sort', 'asc')])
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
                $v = '%' . addslashes($v) . '%';
                if ($lc == 'vi') {
                    $db->orwhere('name', 'like', $v);
                } else {
                    $db->orwhere('name_' . $lc, 'like', $v);
                }
            }
            foreach ($ex as $v) {
                $db->orwhere('sku', 'like', $v);
            }
        }
        if ($lc == 'vi') {
            $db->orderby('name', 'asc');
        } else {
            $db->orderby('name_' . $lc, 'asc');
        }
        $result = $db->paginate(20)->appends('keyword', $keyword);

        return $result;
    }
}
