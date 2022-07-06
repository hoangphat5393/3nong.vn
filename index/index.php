<!-- LIB -->
<?php require_once('index_c/index_c.php');?>

<?php 
    $atz = new index_controller();

    $cat_list = array();
    $post_list = array();

    $cat_list = $atz->get_cats();

    // Lấy chuyên mục và sản phẩm
    $cat_product = array();
    if(!empty($cat_list)){
        foreach ($cat_list as $k=>$v) {
            $cat_product[$k] = $v;

            $products_list = $atz->get_products($v['Cat_ID']);
            if (!empty($products_list)) {
                $cat_product[$k]['products'] = $atz->get_products($v['Cat_ID']);
            }
        }
    }

    // Lấy danh sách bài viết
    $post_list = $atz->get_posts_hot();

    // Lấy chuyên mục và bài viết được chỉ định cụ thể
    // $cat_post_1 = $atz->get_cat_post(27);
        
    // Lấy danh sách sản phẩm HOT
    $products_hot = $atz->get_product_hot();   
?>

<!doctype html>
<html lang="vi">

    <head>

        <!-- HEAD -->
        <?php include('modules/head.php') ?>
        <!-- END HEAD -->

        <!-- SEO -->
        <meta name="description" content="<?=SETTING['Setting_Description']?>">
        <meta name="keywords" content="<?=SETTING['Setting_Keywords']?>">

        <title><?=SETTING['Setting_Title']?></title>
    </head>


    <body>
        <h1 class="d-none"><?=SETTING['Setting_Title']?></h1>
        <!-- HEADER -->
        <header>
            <?php include('modules/header.php');?>
        </header>
        <!-- END HEADER -->

        <!-- MENU -->
        <?php include('modules/menu.php')?>
        <!-- END MENU -->

        <!-- SLIDER -->
        <?php include('modules/slider.php')?>
        <!-- END SLIDER -->


        <!-- BANNER -->
        <!-- <div class="container mt-3">
            <div class="row animate_bn">
                <div class="col-12 col-lg-6 mb-3">
                    <img src="assets/images/banner1.png" class="img-fluid d-block mx-auto" alt="<?=SETTING['Setting_Title']?>">
                </div>
                <div class="col-12 col-lg-6 mb-3">
                    <img src="assets/images/banner2.png" class="img-fluid d-block mx-auto" alt="<?=SETTING['Setting_Title']?>">
                </div>
            </div>
        </div> -->
        <!-- END BANNER -->

        <!-- BEST SELL -->
        <div class="container my-3">

            <div class="block product-list py-2">
                    
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center block-title">
                            <div class="flex-grow-1">Sản phẩm bán chạy</div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($products_hot)): ?>
                
                    <div class="owl-product owl-carousel owl-theme mt-3">
                        <?php foreach ($products_hot as $v): ?>
                        
                            <div class="item product-list-item">
                                <a href="<?=$atz->site_url['main'].'san-pham/'.$atz->slug($v['Product_Name_vi']).'-'.$v['Product_ID'].'.html'?>" title="<?=$v['Product_Name_vi']?>">
                                    <figure>
                                        <img class="w-100" src="<?=str_replace('../', '', $v['Product_Thumbnail'])?>" alt="<?=$v['Product_Name_vi']?>">
                                        <figcaption><?=$v['Product_Name_vi']?></figcaption>
                                    </figure>
                                </a>
                                <div class="price-block">
                                    <?php if ($v['Product_SalePrice']): ?>
                                        Giá: <span class="sale-price"><?=number_format($v['Product_SalePrice'],0,',','.')?> VNĐ<?=!empty($v['Product_PriceType'])?'/<sub>'.$v['Product_PriceType'].'</sub>':''?></span>
                                        <?php if ($v['Product_Discount']): ?>
                                            <div class="mt-2 d-flex justify-content-between">
                                                <span class="old-price"><?=number_format($v['Product_Price'],0,',','.')?> VNĐ<?=!empty($v['Product_PriceType'])?'/<sub>'.$v['Product_PriceType'].'</sub>':''?></span>
                                                <span class="discount-price">- <?=number_format($v['Product_Discount'],0,',','.')?> <?=$v['Product_DiscountUnit']?></span>
                                            </div>
                                        <?php endif ?>
                                    <?php else:?>
                                        Giá: <a href="tel:<?=str_replace(' ', '', SETTING['Setting_Phone'])?>" title="Liên hệ">Liên hệ</a>
                                    <?php endif ?>
                                </div>
                                <a class="btn addcart" href="<?=$atz->site_url['main'].'san-pham/'.$atz->slug($v['Product_Name_vi']).'-'.$v['Product_ID'].'.html'?>" title="<?=$v['Product_Name_vi']?>">Mua ngay</a>
                                <!-- <button class="btn addcart">Mua ngay</button> -->
                            </div>
                        <?php endforeach ?>

                    </div>
                <?php endif ?>
                
            </div>
        </div>
        <!-- END BEST SELL -->

        <!-- MAIN PRODUCT -->
        <?php if ($cat_product): ?>
            <?php foreach ($cat_product as $v): ?>
                <?php if ($v['Cat_Thumbnail']): ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 animate_bn">
                                <a href="<?=$atz->site_url['main'].'danh-sach-san-pham/'.$atz->slug($v['Cat_Name_vi']).'-'.$v['Cat_ID'].'.html'?>" title="<?=$v['Cat_Name_vi']?>">
                                    <figure class="cate-banner">
                                        <img class="w-100" src="<?=str_replace('../', '', $v['Cat_Thumbnail'])?>" alt="<?=$v['Cat_Name_vi']?>">
                                    </figure>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <div class="container mb-3">

                    <div class="block product-list py-2">
                            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center block-title">
                                    <div class="flex-grow-1"><?=$v['Cat_Name_vi']?></div>
                                    <a href="<?=$atz->site_url['main'].'danh-sach-san-pham/'.$atz->slug($v['Cat_Name_vi']).'-'.$v['Cat_ID'].'.html'?>" class="show-more pr-2">Xem tất cả <i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php if (!empty($v['products'])): ?>
                        
                            <div class="owl-product owl-carousel owl-theme mt-3">
                                <?php foreach ($v['products'] as $v1): ?>
                            
                                    <div class="item product-list-item">
                                        <a href="<?=$atz->site_url['main'].'san-pham/'.$atz->slug($v1['Product_Name_vi']).'-'.$v1['Product_ID'].'.html'?>" title="<?=$v1['Product_Name_vi']?>">
                                            <figure>
                                                <img class="w-100" src="<?=str_replace('../', '', $v1['Product_Thumbnail'])?>" alt="<?=$v1['Product_Name_vi']?>">
                                                <figcaption><?=$v1['Product_Name_vi']?></figcaption>
                                            </figure>
                                        </a>
                                        <div class="price-block">
                                            <?php if ($v1['Product_SalePrice']): ?>
                                                Giá: <span class="sale-price"><?=number_format($v1['Product_SalePrice'],0,',','.')?> VNĐ<?=!empty($v1['Product_PriceType'])?'/<sub>'.$v1['Product_PriceType'].'</sub>':''?></span>
                                                <?php if ($v1['Product_Discount']): ?>
                                                    <div class="mt-2 d-flex justify-content-between">
                                                        <span class="old-price"><?=number_format($v1['Product_Price'],0,',','.')?> VNĐ<?=!empty($v1['Product_PriceType'])?'/<sub>'.$v1['Product_PriceType'].'</sub>':''?></span>
                                                        <span class="discount-price">- <?=number_format($v1['Product_Discount'],0,',','.')?> <?=$v1['Product_DiscountUnit']?></span>
                                                    </div>
                                                <?php endif ?>
                                            <?php else:?>
                                                Giá: <a href="tel:<?=str_replace(' ', '', SETTING['Setting_Phone'])?>" title="Liên hệ">Liên hệ</a>
                                            <?php endif ?>
                                        </div>
                                        <a class="btn addcart" href="<?=$atz->site_url['main'].'san-pham/'.$atz->slug($v1['Product_Name_vi']).'-'.$v1['Product_ID'].'.html'?>" title="<?=$v1['Product_Name_vi']?>">Mua ngay</a>
                                    </div>
                                <?php endforeach ?>

                            </div>
                        <?php endif ?>
                        
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
        <!-- END MAIN PRODUCT -->

        <!-- POST & EVENT -->
        <div class="bg-warp pt-5">
            <div class="container home-news">

                <div class="row">

                    <div class="col-md-7">

                        <div class="block">
                            <div class="block-title">Tin tức & sự kiện</div>

                            <div class="row mt-4">

                                <div class="col-12 col-lg-5">
                                    <?php if (!empty($post_list)): ?>
                                        
                                        <?php $post = $post_list[0];?>
                                        
                                        <a href="<?=$atz->site_url['main'].'tin-tuc/'.$atz->slug($post['Post_Title_vi']).'-'.$post['Post_ID'].'.html'?>" title="<?=$post['Post_Title_vi']?>">
                                            <img src="<?=str_replace('../', '', $post['Post_Thumbnail'])?>" alt="<?=$post['Post_Title_vi']?>" class="img-fluid d-block mx-auto">
                                            <div class="news_first_name mt-3">
                                                <?=$post['Post_Title_vi']?>
                                            </div>
                                            <div class="news_first_describe">
                                                <?=$post['Post_Description_vi']?>
                                            </div>
                                        </a>
                                    <?php endif?>
                                </div>

                                <div class="col-12 col-lg-7">
                                    <?php if (!empty($post_list)): ?>
                                
                                        <ul id="scroller" style="height: 672px;">
                                            
                                            <?php foreach ($post_list as $v): ?>
                                                <li>
                                                    <a href="<?=$atz->site_url['main'].'tin-tuc/'.$atz->slug($v['Post_Title_vi']).'-'.$v['Post_ID'].'.html'?>" title="<?=$v['Post_Title_vi']?>">
                                                        <div class="row">
                                                            <div class="col-4 px-0">
                                                                <img class="img-fluid" src="<?=str_replace('../', '', $v['Post_Thumbnail'])?>" alt="<?=$v['Post_Thumbnail']?>" align="left">
                                                            </div>

                                                            <div class="col">
                                                                <div class="news_first_name">
                                                                    <?=$v['Post_Title_vi']?>
                                                                </div>
                                                                <p class="news_first_describe"><?=$v['Post_Description_vi']?></p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php endforeach ?>

                                        </ul>

                                    <?php endif?>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-5">
                        <div class="block">
                            <div class="block-title">Video clips</div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div id="ajax_video" class="ajax_video">
                                        <iframe width="100%" height="290" src="//www.youtube.com/embed/rwOb8lwMNA4" frameborder="0" allowfullscreen=""></iframe>
                                        <select name="list-video" class="form-control list-video">
                                            <option value="rwOb8lwMNA4">CÁ TAI TƯỢNG KHỦNG HƠN 20 NĂM TUỔI.</option>
                                            <option value="qr6bTDJefMs">Cách trồng và chăm sóc hoa đồng tiền cho hoa đẹp 4 mùa</option>
                                            <option value="eBDh72nyDvs">Trồng và chăm sóc cúc đồng tiền sau khi chơi tết</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END POST & EVENT -->

        <!-- PARTNER -->
        <!-- <div class="container mt-3 mb-3">
            <div class="block partner py-2">
                        
                <div class="owl-partner owl-carousel owl-theme mt-3">

                    <div class="item product-list-item">
                        <a href="#" title="">
                            <figure>
                                <img class="w-100" src="assets/images/partner1.jpg" alt="">
                                <figcaption></figcaption>
                            </figure>
                        </a>
                    </div>

                    <div class="item product-list-item">
                        <a href="#" title="">
                            <figure>
                                <img class="w-100" src="assets/images/partner2.jpg" alt="">
                                <figcaption></figcaption>
                            </figure>
                        </a>
                    </div>

                    <div class="item product-list-item">
                        <a href="#" title="">
                            <figure>
                                <img class="w-100" src="assets/images/partner3.jpg" alt="">
                                <figcaption></figcaption>
                            </figure>
                        </a>
                    </div>

                    <div class="item product-list-item">
                        <a href="#" title="">
                            <figure>
                                <img class="w-100" src="assets/images/partner4.jpg" alt="">
                                <figcaption></figcaption>
                            </figure>
                        </a>
                    </div>

                    <div class="item product-list-item">
                        <a href="#" title="">
                            <figure>
                                <img class="w-100" src="assets/images/partner5.jpg" alt="">
                                <figcaption></figcaption>
                            </figure>
                        </a>
                    </div>

                    <div class="item product-list-item">
                        <a href="#" title="">
                            <figure>
                                <img class="w-100" src="assets/images/partner6.jpg" alt="">
                                <figcaption></figcaption>
                            </figure>
                        </a>
                    </div>

                    <div class="item product-list-item">
                        <a href="#" title="">
                            <figure>
                                <img class="w-100" src="assets/images/partner7.jpg" alt="">
                                <figcaption></figcaption>
                            </figure>
                        </a>
                    </div>
                   
                </div>
     
            </div>
        </div> -->
        <!-- PARTNER -->


        <?php include('modules/footer.php') ?>
        
        <!-- JS LIB-->
        <?php include('modules/js.php') ?>
        <!-- END JS LIB -->

        <script>
            var owl = $('.owl-criteria');
            owl.owlCarousel({
                loop: true,
                // margin: 12,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2,
                        nav: false
                    },
                    600: {
                        items: 4,
                        nav: false
                    },
                    1000: {
                        items: 4,
                        nav: false,
                    }
                }
            });

            var owl = $('.owl-product');
            owl.owlCarousel({
                loop: true,
                margin: 12,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2,
                        nav: false
                    },
                    768: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 4,
                        nav: false,
                    }
                }
            });

        </script>

        <script>
            (function($) {
                $(function() { //on DOM ready
                    $("#scroller").simplyScroll({
                        customClass: 'vert',
                        orientation: 'vertical',
                        // auto: true,
                        manualMode: 'loop',
                        frameRate: 20,
                        // speed: 5
                    });
                });
            })(jQuery);

            $().ready(function(e) {
                $('.list-video').change(function(){
                  var url='https://www.youtube.com/embed/'+$(this).val();
                  $('#ajax_video iframe').attr('src',url);
                })
            });
        </script>

    </body>

</html>