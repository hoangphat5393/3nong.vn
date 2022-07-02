<?php require_once('product_c/product_c.php');?>

<?php 
    $atz = new product_controller();

    $cat = array();
    $product_list = array();

    if(!empty($atz->id)){
        $cat = $atz->get_cat($atz->id);

        if(!empty($cat)){
            $cat_list = $atz->get_cats($cat['Cat_ID']);
            $product_list = $atz->get_products($cat_list);
        }
    }   
?>

<!doctype html>
<html lang="vi">

<head>

    <!-- HEAD -->
    <?php include('modules/head.php') ?>
    <!-- END HEAD -->

    <!-- SEO -->
    <meta name="description" content="<?=$cat['Cat_Description_vi']?>">
    <meta name="keywords" content="<?=$cat['Cat_Keywords_vi']?>">

    <title><?=$cat['Cat_Name_vi']?></title>

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
                <?php if ($cat): ?>

                    <div class="col-md-12 mb-3">
                        <h2 class="block-title text-center"><?=$cat['Cat_Name_vi']?></h2>
                        <a href="<?=$atz->site_url['main'].'danh-sach-san-pham/'.$atz->slug($cat['Cat_Name_vi']).'-'.$cat['Cat_ID'].'.html'?>" title="<?=$cat['Cat_Name_vi']?>">
                            <figure class="cate-banner">
                                <img class="w-100" src="<?=$cat['Cat_Thumbnail']?>" alt="<?=$cat['Cat_Name_vi']?>">
                            </figure>
                        </a>
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
                                        Giá: <span class="text-red"><?=number_format($v['Product_SalePrice'],0,',','.')?> VNĐ<?=!empty($v['Product_PriceType'])?'/<sub>'.$v['Product_PriceType'].'</sub>':''?></span>
                                    <?php else:?>
                                        Giá: <a href="tel:<?=str_replace(' ', '', SETTING['Setting_Phone'])?>" title="Liên hệ">Liên hệ</a>
                                    <?php endif ?>
                                </div>
                                <a class="btn addcart" href="<?=$atz->site_url['main'].'san-pham/'.$atz->slug($v['Product_Name_vi']).'-'.$v['Product_ID'].'.html'?>" title="<?=$v['Product_Name_vi']?>">Mua ngay</a>
                                
                            </div>

                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="col-12 mb-4">
                            <p class="font-weight-bold text-center">Chuyên mục này chưa có sản phẩm</p>
                        </div>
                    <?php endif ?>

                <?php else: ?>
                    <p class="font-weight-bold text-center">Không có chuyên mục này</p>
                <?php endif ?>


            </div>
        </div>
    </div>
    <!-- END LIST PRODUCT -->

    <?php include('modules/footer.php') ?>
            
    <!-- JS LIB-->
    <?php include('modules/js.php') ?>
    <!-- END JS LIB -->


</body>

</html>