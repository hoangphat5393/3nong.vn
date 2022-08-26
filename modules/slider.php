<?php require_once ('slider_c.php');?>
<?php 
    $atz = new module_slide_controller();
    $slides = $atz->get_slides();

    $product_cats = $atz->get_product_cats();
        
?>

<?php if (!empty($slides)): ?>
    <div class="container slider">

        <div class="row">
            
            <div class="col-md-3 d-none">
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
            </div>

            <div class="col-md-12 p-0 pt-md-2 px-md-3">
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

        </div>
        
    </div>

<?php endif ?>