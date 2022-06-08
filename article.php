<!-- LIB -->
<?php require_once('article_c/article_c.php');?>

<?php 
    $atz = new article_controller();
    $article = $atz->get_article();

    $relative_articles = $atz->get_relative_articles($atz->id);
?>


<!doctype html>
<html lang="vi">

<head>

    <!-- HEAD -->
    <?php include('modules/head.php') ?>
    <!-- END HEAD -->

    <!-- SEO -->
    <meta name="description" content="<?=$article['Article_Description_vi']?>">
    <meta name="keywords" content="<?=$article['Article_Keywords_vi']?>">

    <title><?=$article['Article_Title_vi']?></title>

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
                            <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                            <li class="breadcrumb-item"><a href="#">CÁ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cá tai tượng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div> -->
    <!-- END BREADCRUMB -->

    <!-- POST -->
    <div class="container post-detail mt-3 mb-3">
        
        <div class="row">
            <?php if (!empty($article)): ?>

                <div class="col-md-12">
                    <div class="content-main w-clear block" id="toc-content">
                        
                        <div class="block-title text-center">
                            <h1><?=$article['Article_Title_vi']?></h1>
                        </div>

                        <div class="post-description">
                            <?=$article['Article_Description_vi']?>
                        </div>

                        <div class="post-description">
                            <?=$article['Article_Content_vi']?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="social">
                        <div class="post-date">
                            <i class="fas fa-calendar-week"></i> <span>Ngày đăng: <?=date('d-m-Y',$article['Article_Created'])?></span>
                        </div> 
                    </div>
                </div>

            <?php else: ?>
                <div class="col-md-12">
                    <p>Không có bài viết này</p>
                </div>
            <?php endif ?>

        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="other-post">
                    <b class="d-block mb-2">Bài viết khác:</b>
                    <?php if (!empty($relative_articles)): ?>
                        
                        <ul class="list-unstyled ml-3">
                            <?php foreach ($relative_articles as $v):?>
                                <li>
                                    <a class="text-decoration-none" href="<?=$atz->site_url['main'].'bai-viet/'.$atz->slug($v['Article_Title_vi']).'-'.$v['Article_ID'].'.html'?>" title="<?=$v['Article_Title_vi']?>">
                                        <i class="far fa-newspaper"></i> <?=$v['Article_Title_vi']?><span><?='('.date('d-m-Y',$article['Article_Created']).')'?></span>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                        
                    <?php endif ?>
                </div>
            </div>

        </div>
    </div>
    <!-- END POST -->

    <?php include('modules/footer.php') ?>
        
    <!-- JS LIB-->
    <?php include('modules/js.php') ?>
    <!-- END JS LIB -->

    
</body>

</html>