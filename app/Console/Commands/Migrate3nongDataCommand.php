<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Migrate3nongDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '3nong:migrate-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate target tables and migrate categories, products (with serialized gallery images), pages, and contacts from 3nong legacy database to 3nong_new';

    /**
     * Helper to build upload/images/ relative path for single image
     */
    private function cleanImagePath(?string $path, string $defaultFolder = 'images'): string
    {
        if (! $path) {
            return '';
        }
        $clean = str_replace(['../upload/', 'upload/', '../'], '', $path);
        if (! $clean) {
            return '';
        }

        return 'upload/images/'.$clean;
    }

    /**
     * Helper to parse and serialize Product_Imgs into gallery array for products table
     */
    private function cleanGalleryPath(?string $rawImgs): ?string
    {
        if (! $rawImgs) {
            return null;
        }

        $lines = preg_split('/[\r\n]+/', $rawImgs);
        $gallery = [];

        foreach ($lines as $line) {
            $line = trim($line);
            if (! $line) {
                continue;
            }

            $clean = str_replace(['../upload/', 'upload/', '../'], '', $line);
            if (! $clean) {
                continue;
            }

            if (! str_contains($clean, '/')) {
                $clean = 'product/'.$clean;
            }

            $gallery[] = 'upload/images/'.$clean;
        }

        return ! empty($gallery) ? serialize($gallery) : null;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting data migration from 3nong to 3nong_new...');

        // Step 1: Truncate existing data in 3nong_new tables
        $this->info('Truncating categories, products, product_categories, pages, and contacts tables in 3nong_new...');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('product_categories')->truncate();
        DB::table('products')->truncate();
        DB::table('categories')->truncate();
        DB::table('pages')->truncate();
        DB::table('contacts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->info('Target tables truncated successfully.');

        // Step 2: Create exact 5 Core System Pages
        $systemPages = [
            [
                'id' => 1,
                'name' => 'Trang Chủ',
                'slug' => 'home',
                'type' => 'page',
                'sort' => 0,
                'status' => 1,
                'seo_title' => '3 Nông - Vật tư nông nghiệp',
                'seo_description' => 'Chuyên cung cấp vật tư nông nghiệp chất lượng cao',
                'seo_keyword' => '3nong, vat tu nong nghiep',
            ],
            [
                'id' => 2,
                'name' => 'Giới Thiệu',
                'slug' => 'about',
                'type' => 'page',
                'sort' => 0,
                'status' => 1,
                'seo_title' => 'Giới Thiệu - 3 Nông',
                'seo_description' => 'Giới thiệu về 3 Nông - Đơn vị cung cấp sản phẩm nông nghiệp uy tín',
                'seo_keyword' => 'gioi thieu 3nong, ve 3nong',
            ],
            [
                'id' => 3,
                'name' => 'Đại Lý',
                'slug' => 'agent',
                'type' => 'page',
                'sort' => 0,
                'status' => 1,
                'seo_title' => 'Đăng Ký Đại Lý - 3 Nông',
                'seo_description' => 'Hợp tác phát triển đại lý phân phối cùng 3 Nông',
                'seo_keyword' => 'dai ly 3nong, dang ky dai ly',
            ],
            [
                'id' => 4,
                'name' => 'Liên Hệ',
                'slug' => 'contact',
                'type' => 'page',
                'sort' => 0,
                'status' => 1,
                'seo_title' => 'Liên Hệ - 3 Nông',
                'seo_description' => 'Thông tin liên hệ và tư vấn hỗ trợ từ 3 Nông',
                'seo_keyword' => 'lien he 3nong, tu van 3nong',
            ],
            [
                'id' => 5,
                'name' => 'Tin Tức',
                'slug' => 'news',
                'type' => 'page',
                'sort' => 0,
                'status' => 1,
                'seo_title' => 'Tin Tức & Kinh Nghiệm Nông Nghiệp - 3 Nông',
                'seo_description' => 'Cập nhật tin tức và kiến thức kỹ thuật nông nghiệp',
                'seo_keyword' => 'tin tuc 3nong, kiem nghiem nong nghiep',
            ],
        ];

        foreach ($systemPages as $sysPage) {
            DB::table('pages')->insert(array_merge($sysPage, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
            $this->line(" - Created Core Page: {$sysPage['name']} (slug: {$sysPage['slug']})");
        }

        // Step 3: Migrate Categories from 3nong.cat
        $legacyCats = DB::table('3nong.cat')
            ->where('Cat_Type', 'product')
            ->get();

        $this->info('Found '.$legacyCats->count().' product categories in legacy 3nong.cat');

        $migratedCatCount = 0;
        foreach ($legacyCats as $cat) {
            $image = $this->cleanImagePath($cat->Cat_Thumbnail, 'cat');
            $name = $cat->Cat_Name_vi ?: $cat->Cat_Name_en;
            $slug = Str::slug($name);

            $created = ($cat->Cat_Created && $cat->Cat_Created > 0)
                ? date('Y-m-d H:i:s', $cat->Cat_Created)
                : now()->toDateTimeString();

            $updated = ($cat->Cat_Updated && $cat->Cat_Updated > 0)
                ? date('Y-m-d H:i:s', $cat->Cat_Updated)
                : now()->toDateTimeString();

            DB::table('categories')->insert([
                'id' => $cat->Cat_ID,
                'name' => $name,
                'slug' => $slug,
                'description' => $cat->Cat_Description_vi ?: '',
                'image' => $image,
                'parent' => $cat->Cat_Parent ?: 0,
                'sort' => $cat->Cat_Order ?: 0,
                'status' => $cat->Cat_Status ?? 1,
                'hot' => $cat->Cat_Hot ?? 0,
                'seo_title' => $name,
                'seo_keyword' => $cat->Cat_Keywords_vi ?: '',
                'seo_description' => strip_tags($cat->Cat_Description_vi ?: ''),
                'created_at' => $created,
                'updated_at' => $updated,
            ]);

            $migratedCatCount++;
            $this->line(" - Migrated Category ID {$cat->Cat_ID}: {$name} -> Image: {$image}");
        }

        // Step 4: Migrate Products from 3nong.product with serialized gallery images
        $legacyProducts = DB::table('3nong.product')->get();
        $this->info('Found '.$legacyProducts->count().' products in legacy 3nong.product');

        $migratedProdCount = 0;
        $migratedPivotCount = 0;

        foreach ($legacyProducts as $prod) {
            $image = $this->cleanImagePath($prod->Product_Thumbnail, 'product');
            $gallery = $this->cleanGalleryPath($prod->Product_Imgs);
            $name = $prod->Product_Name_vi ?: $prod->Product_Name_en;
            $slug = Str::slug($name);

            $created = ($prod->Product_Created && $prod->Product_Created > 0)
                ? date('Y-m-d H:i:s', $prod->Product_Created)
                : now()->toDateTimeString();

            $updated = ($prod->Product_Updated && $prod->Product_Updated > 0)
                ? date('Y-m-d H:i:s', $prod->Product_Updated)
                : now()->toDateTimeString();

            DB::table('products')->insert([
                'id' => $prod->Product_ID,
                'name' => $name,
                'name_en' => $prod->Product_Name_en ?: null,
                'slug' => $slug,
                'description' => $prod->Product_Description_vi ?: '',
                'description_en' => $prod->Product_Description_en ?: null,
                'content' => $prod->Product_Content_vi ?: '',
                'content_en' => $prod->Product_Content_en ?: null,
                'image' => $image,
                'gallery' => $gallery,
                'price' => (string) ($prod->Product_Price ?: 0),
                'promotion' => $prod->Product_Discount > 0 ? (string) $prod->Product_Discount : '',
                'price_type' => $prod->Product_PriceType ?: 'price',
                'unit' => $prod->Product_PriceUnit ?: null,
                'stock' => $prod->Product_InStock ?: 0,
                'sort' => $prod->Product_Priority ?: 0,
                'status' => $prod->Product_Show ?? 1,
                'hot' => $prod->Product_Hot ?? 0,
                'user_id' => $prod->Product_User ?: 1,
                'seo_title' => $name,
                'seo_keyword' => $prod->Product_Keywords_vi ?: '',
                'seo_description' => strip_tags($prod->Product_Description_vi ?: ''),
                'created_at' => $created,
                'updated_at' => $updated,
            ]);

            $migratedProdCount++;
            $this->line(" - Migrated Product ID {$prod->Product_ID}: {$name} -> Image: {$image}");

            if ($prod->Product_Cat && $prod->Product_Cat > 0) {
                DB::table('product_categories')->insert([
                    'product_id' => $prod->Product_ID,
                    'category_id' => $prod->Product_Cat,
                ]);
                $migratedPivotCount++;
            }
        }

        // Step 5: Migrate News Posts from 3nong.post -> pages (type = 'post')
        $legacyPosts = DB::table('3nong.post')->get();
        $this->info('Found '.$legacyPosts->count().' news posts in legacy 3nong.post');

        $migratedPostCount = 0;
        foreach ($legacyPosts as $post) {
            $image = $this->cleanImagePath($post->Post_Thumbnail, 'post');
            $name = $post->Post_Title_vi ?: $post->Post_Title_en;
            $slug = Str::slug($name);

            $created = ($post->Post_Created && $post->Post_Created > 0)
                ? date('Y-m-d H:i:s', $post->Post_Created)
                : now()->toDateTimeString();

            $updated = ($post->Post_Updated && $post->Post_Updated > 0)
                ? date('Y-m-d H:i:s', $post->Post_Updated)
                : now()->toDateTimeString();

            DB::table('pages')->insert([
                'id' => 100 + $post->Post_ID,
                'name' => $name,
                'name_en' => $post->Post_Title_en ?: null,
                'slug' => $slug,
                'type' => 'post',
                'description' => $post->Post_Description_vi ?: '',
                'description_en' => $post->Post_Description_en ?: null,
                'content' => $post->Post_Content_vi ?: '',
                'content_en' => $post->Post_Content_en ?: null,
                'image' => $image,
                'sort' => $post->Post_Priority ?: 0,
                'status' => $post->Post_Show ?? 1,
                'user_id' => $post->Post_User ?: 1,
                'seo_title' => $name,
                'seo_keyword' => $post->Post_Keywords_vi ?: '',
                'seo_description' => strip_tags($post->Post_Description_vi ?: ''),
                'created_at' => $created,
                'updated_at' => $updated,
            ]);

            $migratedPostCount++;
            $this->line(" - Migrated News Post ID {$post->Post_ID}: {$name} -> Image: {$image}");
        }

        // Step 6: Migrate Static Policy Pages from 3nong.article -> pages (type = 'page')
        $legacyArticles = DB::table('3nong.article')->get();
        $this->info('Found '.$legacyArticles->count().' static articles in legacy 3nong.article');

        $migratedArticleCount = 0;
        foreach ($legacyArticles as $art) {
            $name = $art->Article_Title_vi ?: $art->Article_Title_en;
            $slug = Str::slug($name);

            $created = ($art->Article_Created && $art->Article_Created > 0)
                ? date('Y-m-d H:i:s', $art->Article_Created)
                : now()->toDateTimeString();

            $updated = ($art->Article_Updated && $art->Article_Updated > 0)
                ? date('Y-m-d H:i:s', $art->Article_Updated)
                : now()->toDateTimeString();

            DB::table('pages')->insert([
                'id' => 1000 + $art->Article_ID,
                'name' => $name,
                'name_en' => $art->Article_Title_en ?: null,
                'slug' => $slug,
                'type' => 'page',
                'description' => $art->Article_Description_vi ?: '',
                'description_en' => $art->Article_Description_en ?: null,
                'content' => $art->Article_Content_vi ?: '',
                'content_en' => $art->Article_Content_en ?: null,
                'sort' => $art->Article_Priority ?: 0,
                'status' => $art->Article_Show ?? 1,
                'seo_title' => $name,
                'seo_keyword' => $art->Article_Keywords_vi ?: '',
                'seo_description' => strip_tags($art->Article_Description_vi ?: ''),
                'created_at' => $created,
                'updated_at' => $updated,
            ]);

            $migratedArticleCount++;
            $this->line(" - Migrated Static Policy Page ID {$art->Article_ID}: {$name}");
        }

        // Step 7: Migrate Contacts from 3nong.contact -> contacts
        $legacyContacts = DB::table('3nong.contact')->get();
        $this->info('Found '.$legacyContacts->count().' contacts in legacy 3nong.contact');

        $migratedContactCount = 0;
        foreach ($legacyContacts as $contact) {
            $created = ($contact->Contact_Created && $contact->Contact_Created > 0)
                ? date('Y-m-d H:i:s', $contact->Contact_Created)
                : now()->toDateTimeString();

            DB::table('contacts')->insert([
                'id' => $contact->Contact_ID,
                'type' => 'contact',
                'name' => $contact->Contact_Name ?: 'Khách hàng',
                'email' => $contact->Contact_Email ?: null,
                'phone' => $contact->Contact_Mobile ?: null,
                'address' => $contact->Contact_Address ?: '',
                'content' => $contact->Contact_Message ?: '',
                'sort' => 0,
                'status' => 1,
                'created_at' => $created,
                'updated_at' => $created,
            ]);

            $migratedContactCount++;
            $this->line(" - Migrated Contact ID {$contact->Contact_ID}: {$contact->Contact_Name} ({$contact->Contact_Mobile})");
        }

        $this->info('=============================================');
        $this->info("SUCCESS: Migrated {$migratedCatCount} Categories, {$migratedProdCount} Products (with serialized Gallery arrays), {$migratedPostCount} News Posts, {$migratedArticleCount} Policy Pages, 5 Core System Pages, and {$migratedContactCount} Contacts.");
        $this->info('=============================================');

        return 0;
    }
}
