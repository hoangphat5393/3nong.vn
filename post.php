<!-- LIB -->
<?php require_once('post_c/post_c.php');?>

<?php
    $atz = new post_controller();
    
    $post = $atz->get_post($atz->id);
    if (!empty($post)) {
        $cat = $atz->get_cat($post['Post_Cat']);

        // Update View
        $atz->update_view($post['Post_ID'],$post['Post_View_vi']);
    }

    $relative_posts = $atz->get_relative_posts($atz->id);    
?>

<!doctype html>
<html lang="vi">

<head>

    <!-- HEAD -->
    <?php include('modules/head.php') ?>
    <!-- END HEAD -->

    <!-- SEO -->
    <meta name="description" content="<?=$post['Post_Description_vi']?>">
    <meta name="keywords" content="<?=$post['Post_Keywords_vi']?>">

    <title><?=$post['Post_Title_vi']?></title>

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
            <?php if (!empty($post)): ?>

                <div class="col-md-12">
                    <div class="content-main w-clear block" id="toc-content">
                        
                        <div class="block-title text-center">
                            <h1><?=$post['Post_Title_vi']?></h1>
                        </div>

                        <div class="post-description">
                            <?=$post['Post_Description_vi']?>
                        </div>

                        <div class="post-description">
                            <?=$post['Post_Content_vi']?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="social">
                        <div class="post-date">
                            <i class="fas fa-calendar-week"></i> <span>Ngày đăng: <?=date('d-m-Y',$post['Post_Created'])?></span>
                        </div>
                        <b class="d-block my-2">Chia sẻ:</b>
                        
                        <!-- <div class="social-plugin d-flex">
                            <div class="addthis_inline_share_toolbox_qj48" data - url="post.php?id=<?=$post['Post_ID']?>" data - title="<?=$post['Post_Title_vi']?>">
                                <div id="atstbx3" class="at-share-tbx-element at-share-tbx-native addthis_default_style addthis_20x20_style addthis-smartlayers addthis-animated at4-show">
                                    <a class="addthis_button_facebook_share at_native_button at300b" fb: share: layout="button_count">
                                        <div class="fb-share-button fb_iframe_widget" data - layout="button_count" data - href="post.php?id=<?=$post['Post_ID']?>" style="height: 25px;" fb - xfbml - state="rendered" fb - iframe - plugin - query="app_id=&amp;container_width=0&amp;href=https%3A%2F%2Fhaisanthanglong.com%2Ftom-su-rim-hanh-toi&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey">
                                            <span style="vertical-align: bottom; width: 86px; height: 20px;">
                                                <iframe name="f8ee3411bd37" width="1000px" height="1000px" data - testid="fb:share_button Facebook Social Plugin" title="fb:share_button Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v2.6/plugins/share_button.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df186c68c296ce24%26domain%3Dhaisanthanglong.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fhaisanthanglong.com%252Ffa998d741819fc%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fhaisanthanglong.com%2Ftom-su-rim-hanh-toi&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey" style="border: none; visibility: visible; width: 86px; height: 20px;" class=""></iframe>
                                            </span>
                                        </div>
                                    </a>        
                                </div>
                            </div>
                        </div> -->
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
                    <?php if (!empty($relative_posts)): ?>
                        
                        <ul class="list-unstyled ml-3">
                            <?php foreach ($relative_posts as $v):?>
                                <li>
                                    <a class="text-decoration-none" href="post?id=<?=$v['Post_ID']?>" title="<?=$v['Post_Title_vi']?>">
                                        <i class="far fa-newspaper"></i> <?=$v['Post_Title_vi']?><span><?='('.date('d-m-Y',$post['Post_Created']).')'?></span>
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