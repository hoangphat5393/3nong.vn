<?php require_once ('menu_c.php');?>
<?php
    
    $atz = new module_menu_controller();
    $cats = $atz->get_cats();

    $product_cats = $atz->get_product_cats();

    $post_cats = $atz->get_post_cats();

    $product_list_url = $atz->site_url['main'].'danh-sach-san-pham/';

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
                        <button class="btn dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span> Danh mục sản phẩm
                        </button>

                        <ul class="dropdown-menu">
                            <?php if (!empty($product_cats)): ?>
                                <?php foreach ($product_cats as $v): ?>
                                    <li class="dropdown-item list-group-item">
                                        <div class="btn-group dropright">
                                            <?php if (!empty($v['Cat_Child'])): ?>
                                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="<?=$product_list_url.$atz->slug($v['Cat_Name_vi']).'-'.$v['Cat_ID'].'.html'?>" title="<?=$v['Cat_Name_vi']?>"><?=$v['Cat_Name_vi']?></a>
                                                <div class="dropdown-menu submenu">
                                                    <?php foreach ($v['Cat_Child'] as $v1): ?>
                                                        <a class="d-block dropdown-item" href="<?=$product_list_url.$atz->slug($v1['Cat_Name_vi']).'-'.$v1['Cat_ID'].'.html'?>" title="<?=$v1['Cat_Name_vi']?>"><?=$v1['Cat_Name_vi']?></a>
                                                    <?php endforeach ?>
                                                </div>
                                            <?php else:?>
                                                <a href="<?=$product_list_url.$atz->slug($v['Cat_Name_vi']).'-'.$v['Cat_ID'].'.html'?>" title="<?=$v['Cat_Name_vi']?>"><?=$v['Cat_Name_vi']?></a>
                                            <?php endif ?>
                                        </div>
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
                    <a class="nav-link" href="<?=$atz->site_url['main'].'dai-ly.html'?>">Đại lý</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$atz->site_url['main'].'lien-he.html'?>">Liên hệ</a>
                </li>
            </ul>

        </div>
    </div>
</nav>