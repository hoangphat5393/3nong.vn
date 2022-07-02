<!doctype html>
<html lang="vi">

<head>
    
    <!-- HEAD -->
    <?php include('modules/head.php') ?>
    <!-- END HEAD -->


    <!-- SEO -->
    <meta name="description" content="<?=$page_content['Setting_Page_Description_vi']?>">
    <meta name="keywords" content="<?=SETTING['Setting_Keywords']?>">

    <title>Liên hệ đặt hàng - <?=SETTING['Setting_Title']?></title>

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

    <!-- POST -->
    <div class="container my-5 contact-page">

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="content-main w-clear block" id="toc-content">
                    <div class="block-title text-center">
                        <h1>ĐẶT HÀNG THÀNH CÔNG</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <p class="font-weight-bold">Đặt hàng thành công! Chúng tôi sẽ liên hệ trong thời gian sớm nhất.</p>
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