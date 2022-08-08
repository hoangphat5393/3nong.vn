<!-- LIB -->
<?php require_once('product_c/product_c.php');?>

<?php 
    $atz = new product_controller();

    
    $product_list = array();
        
    if(isset($_GET['q']) && !empty($_GET['q'])){
        $product_list = $atz->get_search_product();
    }
?>

<!doctype html>
<html lang="vi">

<head>

    <head>

        <!-- HEAD -->
        <?php include('modules/head.php') ?>
        <!-- END HEAD -->

        <!-- SEO -->
        <meta name="description" content="<?=SETTING['Setting_Description']?>">
        <meta name="keywords" content="<?=SETTING['Setting_Keywords']?>">

        <title><?=SETTING['Setting_Title']?></title>
    </head>

</head>


<body>

    <!-- HEADER -->
    <header>
        <?php include('modules/header.php');?>
    </header>
    <!-- END HEADER -->

    <!-- MENU -->
    <?php include('modules/menu.php')?>
    <!-- END MENU -->

    <!-- BREADCRUMB -->
    <!-- <div class="bg-warp-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Library</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div> -->
    <!-- END BREADCRUMB -->

    <!-- LIST PRODUCT -->
    <div class="container product-list mt-3 mb-3">

        <div class="block product-list py-2">
                    
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h1>Kết quả tìm kiếm: <span><?=$_GET['q']?></span></h1>
                </div>
                <?php if (!empty($product_list)): ?>
                    <?php foreach ($product_list as $v): ?>
                        <div class="col-md-3 product-list-item">
                            <a href="<?=$atz->site_url['main'].'san-pham/'.$atz->slug($v['Product_Name_vi']).'-'.$v['Product_ID'].'.html'?>" title="<?=$v['Product_Name_vi']?>">
                                <figure>
                                    <img class="w-100" src="<?=$v['Product_Thumbnail']?>" alt="<?=$v['Product_Name_vi']?>">
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
                        </div>
                    <?php endforeach ?>
                <?php else: ?>
                    <div class="col-12 mb-4">
                        <p class="font-weight-bold text-center">Không có sản phẩm phù hợp</p>
                    </div>
                <?php endif ?>

            </div>
        </div>
    </div>
    <!-- END LIST PRODUCT -->


    <?php include('modules/footer.php') ?>
        
    <!-- JS LIB-->
    <?php include('modules/js.php') ?>
    <!-- END JS LIB -->


    <script>
        $("button").click(function(){
          $("p").toggleClass("main");
        });
    </script>

    <script>
        $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
            }
            var $subMenu = $(this).next('.dropdown-menu');
            $subMenu.toggleClass('show');


            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                $('.dropdown-submenu .show').removeClass('show');
            });


            return false;
        });
    </script>

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

        // var owl2 = $('.owl-partner');
        // owl2.owlCarousel({
        //     loop: true,
        //     margin: 20,
        //     autoplay: true,
        //     dots: false,
        //     responsiveClass: true,
        //     responsive: {
        //         0: {
        //             items: 2,
        //             nav: false
        //         },
        //         600: {
        //             items: 4,
        //             nav: false
        //         },
        //         1000: {
        //             items: 6,
        //             nav: false,
        //             // loop:false
        //         }
        //     }
        // });

        (function($) {
            $(function() {
                $("#scroller").simplyScroll({orientation:'vertical',customClass:'vert'});
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