<?php require_once ('menu_c.php');?>
<?php
    
    $atz = new module_menu_controller();
    $cats = $atz->get_cats();

    $product_cats = $atz->get_product_cats();

    $post_cats = $atz->get_post_cats();
?>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top main-menu">
    <div class="container">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
             
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <div class="dropdown product-menu">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span> Danh mục sản phẩm
                        </button>

                        <ul class="dropdown-menu">
                            <?php if (!empty($product_cats)): ?>
                                <?php foreach ($product_cats as $v): ?>
                                    <li class="dropdown-item list-group-item">
                                        <a class="d-block" href="<?=$atz->site_url['main'].'danh-sach-san-pham/'.$atz->slug($v['Cat_Name_vi']).'-'.$v['Cat_ID'].'.html'?>" title="<?=$v['Cat_Name_vi']?>"><?=$v['Cat_Name_vi']?></a>
                                    </li>
                                <?php endforeach ?>
                            <?php endif ?>
                        </ul>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=$atz->site_url['main']?>">Trang chủ</a>
                </li>
                <?php if (!empty($post_cats)): ?>
                    <?php foreach ($post_cats as $k=>$v): ?>
                        <li class="nav-item <?=isset($_GET['id'])&&$_GET['id']==$v['Cat_ID']?'active':''?>">
                            <a class="nav-link" href="<?=$atz->site_url['main'].'danh-sach-tin-tuc/'.$atz->slug($v['Cat_Name_vi']).'-'.$v['Cat_ID'].'.html'?>"><?=$v['Cat_Name_vi']?></a>
                        </li>
                    <?php endforeach ?>
                <?php endif ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$atz->site_url['main'].'dai-ly.html'?>">Đăng ký đại lý</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$atz->site_url['main'].'lien-he.html'?>">Liên hệ</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<!-- <nav class="navbar navbar-expand-lg navbar-dark sticky-top main-menu">
    <div class="container px-0">

        <div class="d-flex flex-row align-items-center">

            <div class="px-3">

                <div class="dropdown drop-menu-top">
                    
                    <button class="btn dropdown-toggle product-menu " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span> Danh mục sản phẩm
                    </button>

                    <ul class="dropdown-menu">
                        <li class="dropdown-item list-group-item">
                            <a class="d-block" href="#" title="Cá">Cá</a>
                        </li>
                        <li class="dropdown-item list-group-item">
                            <a href="#" title="Cua - Ghẹ">
                                <img src="assets/images/menu-icon3.png" alt="Cua - Ghẹ">Cua - Ghẹ
                            </a>
                        </li>
                    </ul>
                </div>

                

            </div>

        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
                    
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Trang chủ
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">
                        Trang chủ
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav> -->