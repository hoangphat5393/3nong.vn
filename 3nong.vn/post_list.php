<!-- LIB -->
<?php require_once('post_c/post_c.php');?>

<?php 
    $atz = new post_controller();

    $cat = array();
    $post_list = array();

    if(!empty($atz->id)){
        $cat = $atz->get_cat($atz->id);
            
        if(!empty($cat)){
            $cat_list = $atz->get_cats($cat['Cat_ID']);
            $post_list = $atz->get_posts($cat_list);
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
        <!-- MENU HEADER -->

        <!-- BREADCRUMB -->
        <!-- <div class="bg-warp-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- END BREADCRUMB -->

        <!-- LIST PRODUCT -->
        <div class="container post-list mt-3 mb-3">

            <div class="block post-list py-2">
                        
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <div class="block-title text-center">
                            <h1><?=$cat['Cat_Name_vi']?></h1>
                        </div>
                    </div>
                    <?php if (!empty($post_list)): ?>
                        
                        <?php foreach ($post_list as $v): ?>
                    
                            <div class="col-12 col-lg-6 post-list-item">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="<?=$atz->site_url['main'].'tin-tuc/'.$atz->slug($v['Post_Title_vi']).'-'.$v['Post_ID'].'.html'?>" title="<?=$v['Post_Title_vi']?>">
                                            <figure>
                                                <img class="img-fluid" src="<?=$v['Post_Thumbnail']?>" alt="<?=$v['Post_Title_vi']?>">
                                            </figure>                                 
                                        </a>
                                    </div>
                                    <div class="col-8 pl-0">
                                        <div class="news-sumary">
                                            <h3 class="news-title">
                                                <a href="<?=$atz->site_url['main'].'tin-tuc/'.$atz->slug($v['Post_Title_vi']).'-'.$v['Post_ID'].'.html'?>" title="<?=$v['Post_Title_vi']?>">
                                                    <?=$v['Post_Title_vi']?>
                                                </a>
                                            </h3>
                                            <div class="news-date">Ngày đăng: <?=date('d-m-Y',$v['Post_Created'])?></div>
                                            <p class="news-desc"><?=$v['Post_Description_vi']?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach ?>
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