<?php require_once ('slider_c.php');?>
<?php 
    $atz = new module_slide_controller();
    $slides = $atz->get_slides();

    $product_cats = $atz->get_product_cats();
        
?>

<?php if (!empty($slides)): ?>
    <div class="container slider">

        <div class="row">
            <div class="col-md-3">

                <div class="slider-menu">
                
                    <?php if (!empty($product_cats)): ?>
                        <ul class="list-group">
                            <?php foreach ($product_cats as $v): ?>
                                <li class="dropdown-item list-group-item">
                                    <a class="d-block" href="<?=$atz->site_url['main'].'danh-sach-san-pham/'.$atz->slug($v['Cat_Name_vi']).'-'.$v['Cat_ID'].'.html'?>" title="<?=$v['Cat_Name_vi']?>">
                                        <?=$v['Cat_Name_vi']?>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    <?php endif ?>
                </div>

                <!-- <ul class="list-group">
                    <li class="dropdown-item list-group-item">
                        <a class="d-block" href="#" title="Cá">
                            <img src="assets/images/menu-icon1.png" alt="Cá">Cá
                        </a>
                    </li>
                    <li class="dropdown-item list-group-item">
                        <a href="#" title="Tôm">
                            <img src="assets/images/menu-icon2.png" alt="Tôm">Tôm
                        </a>
                    </li>
                    <li class="dropdown-item list-group-item">
                        <a href="#" title="Cua - Ghẹ">
                            <img src="assets/images/menu-icon3.png" alt="Cua - Ghẹ">Cua - Ghẹ
                        </a>
                    </li>
                    <li class="dropdown-item list-group-item">
                        <a href="#" title="Mực">
                            <img src="assets/images/menu-icon4.png" alt="Mực">Mực
                        </a>
                    </li>
                    <li class="dropdown-item list-group-item">
                        <a href="#" title="Nghêu - sò - ốc">
                            <img src="assets/images/menu-icon5.png" alt="Nghêu-sò-ôc">Nghêu-sò-ôc
                        </a>
                    </li>
                    <li class="dropdown-item list-group-item">
                        <a href="#" title="Hàu sữa - baba">
                            <img src="assets/images/menu-icon6.png" alt="Hàu sữa - baba">Hàu sữa - baba
                        </a>
                    </li>
                    <li class="dropdown-item list-group-item">
                        <a href="#" title="Thủy hải sản khác">
                            <img src="assets/images/menu-icon7.png" alt="Thủy hải sản khác">Thủy hải sản khác
                        </a>
                    </li>
                </ul> -->
            </div>

            <div class="col-md-9 pl-md-0 pt-2">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php $i = 0; ?>
                        <?php foreach ($slides as $v): ?>
                            <div class="carousel-item <?=$i==0?'active':''?>">
                              <img class="d-block w-100" src="<?=str_replace('../', '', $v['Slide_Img'])?>" alt="<?=$v['Slide_Title_vi']?>" title="<?=$v['Slide_Title_vi']?>">
                            </div>
                            <?php $i++; ?>
                        <?php endforeach ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
            <!-- <div class="col-md-3 pt-2">
                <div class="slider-right animate_bn">
                    <a href="#">
                        <img class="d-block img-fluid mb-2" src="assets/images/slide-image1.jpg" alt="Hải Sản Thăng Long" title="Hải Sản Thăng Long">
                    </a>
                    <a href="#">
                        <img class="d-block img-fluid" src="assets/images/slide-image2.jpg" alt="Hải Sản Thăng Long" title="Hải Sản Thăng Long">
                    </a>
                </div>
            </div> -->
        </div>

        
    </div>

<?php endif ?>