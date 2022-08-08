<?php require_once ('footer_c.php');?>
<?php 
    $atz = new module_footer_controller();
    $articles = $atz->get_articles();
?>


<div class="contact-fixed">
    <div class="zalo">
        <a href="//zalo.me/<?=str_replace(' ', '', SETTING['Setting_Phone'])?>" title="<?=str_replace(' ', '', SETTING['Setting_Phone'])?>" target="_blank">
            <img src="<?=$atz->site_url['main']?>assets/images/icon/zalo-icon.png" alt="<?=SETTING['Setting_Title']?>" class="img-fluid">
        </a>
    </div>
    <div class="contact-phone">
        <a href="tel:<?=str_replace(' ', '', SETTING['Setting_Phone'])?>" title="<?=str_replace(' ', '', SETTING['Setting_Phone'])?>">
            <div class="wrap-icon">
                <img src="<?=$atz->site_url['main']?>assets/images/icon/hotline.svg" alt="<?=SETTING['Setting_Title']?>" class="img-fluid">
            </div>
        </a>
    </div>
</div>

<footer class="footer-area">
    <div class="footer-cat pt-3">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-4">

                    <div class="d-flex align-items-center mb-3">
                        <div class="logo">
                            <a href="<?=$atz->site_url['main']?>">
                                <img src="<?=$atz->site_url['main']?>assets/images/header/logo.png" alt="<?=SETTING['Setting_Title']?>" class="img-fluid" width="120">
                            </a>
                        </div>
                        <div class="footer-title-block">
                            <!-- <h2 class="text-center"><?=SETTING['Setting_Title']?></h2>
                            <p class="text-center">Uy tín chất lượng</p> -->
                        </div>
                    </div>

                    <ul class="list-unstyled links">
                        <li class="d-flex">
                            <i class="fas fa-map-marker-alt fa-fw mt-2"></i> Địa chỉ: <?=SETTING['Setting_Address']?>
                        </li>
                        <li class="d-flex">
                            <i class="fa fa-phone fa-fw mt-1"></i>
                            Điện thoại:&nbsp;<a href="tel:<?=str_replace(' ', '', SETTING['Setting_Phone'])?>"> <?=SETTING['Setting_Phone']?></a>
                        </li>
                        <li class="d-flex">
                            <i class="fas fa-envelope fa-fw mt-1"></i>
                            Email:&nbsp;<a href="mailto:<?=SETTING['Setting_Email']?>"> <?=SETTING['Setting_Email']?></a>
                        </li>
                        <li class="d-flex">
                            <i class="fas fa-home fa-fw mt-1"></i>
                            Website:&nbsp; <?=$atz->site_url['main']?>
                        </li>
                    </ul>
                </div>

                <div class="col-md-8 pt-3">
                    <div class="row justify-content-center">
                        <!-- <div class="col-md-4">
                            <div class="block">
                                <div class="block-title">THÔNG TIN</div>
                                <ul class="list-unstyled">
                                    <li><a href="#">Giới thiệu</a></li>
                                    <li><a href="#">Sản phảm</a></li>
                                    <li><a href="#">Tin tức</a></li>
                                    <li><a href="#">Chứng chỉ/ chứng nhận</a></li>
                                    <li><a href="contact">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div> -->

                        <div class="col-md-5">
                            <div class="block">
                                <div class="block-title">CHÍNH SÁCH</div>
                                <?php if (!empty($articles)): ?>
                                    <ul class="list-unstyled">
                                        <?php foreach ($articles as $v): ?>
                                            <li><a href="<?=$atz->site_url['main'].'bai-viet/'.$atz->slug($v['Article_Title_vi']).'-'.$v['Article_ID'].'.html'?>" title="<?=$v['Article_Title_vi']?>"><?=$v['Article_Title_vi']?></a></li>    
                                        <?php endforeach ?>
                                    </ul>    
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="block">
                                <div class="block-title">FANPAGE FACEBOOK</div>
                                <!-- <div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/thuyhaisanthanglong" data-tabs="timeline" data-width="600" data-height="200" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=&amp;container_width=300&amp;height=200&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fthuyhaisanthanglong&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=true&amp;tabs=timeline&amp;width=600"><span style="vertical-align: bottom; width: 300px; height: 200px;"><iframe name="f35471b6aa8807" width="600px" height="200px" data-testid="fb:page Facebook Social Plugin" title="fb:page Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v2.6/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df161f624b60dd38%26domain%3Dhaisanthanglong.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fhaisanthanglong.com%252Ff1ca00e9ad428e4%26relation%3Dparent.parent&amp;container_width=300&amp;height=200&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fthuyhaisanthanglong&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=true&amp;tabs=timeline&amp;width=600" style="border: none; visibility: visible; width: 300px; height: 200px;" class=""></iframe></span></div> -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row align-items-center">
                <!-- <div class="col-md-4 mb-3">
                    <a class="xembando" href="https://goo.gl/maps/xwy1ab9ZBVBf2ZyK9" target="_blank">Xem bản đồ</a>
                </div> -->

                <!-- <div class="col-md-8 mb-3">
                    <div class="mangxahoi_footer">
                        <a href="" target="_blank"><img src="assets/images/social1.png" alt="Youtube"></a>
                        <a href="ft3" target="_blank"><img src="assets/images/social2.png" alt="Tweeter"></a>
                        <a href="" target="_blank"><img src="assets/images/social3.png" alt="Google Plus"></a>
                        <a href="" target="_blank"><img src="assets/images/social4.png" alt="Facebook"></a>
                    </div>
                </div> -->
            </div>

            <!-- <div class="row">
                <div class="col-12">
                    <div class="footer-tags">
                        <p>Từ khóa:&emsp;</p>
                        <a href="" target="_blank" title="hải sản tươi sống">hải sản tươi sống</a> <span>|</span>
                        <a href="http://haisanthanglong.com/tom-hum" target="_blank" title="tôm hùm">tôm hùm</a> <span>|</span>
                        <a href="http://haisanthanglong.com/ca-mu-bien" target="_blank" title="cá bống mú">cá bống mú</a> <span>|</span>
                        <a href="" target="_blank" title="hải sản tươi ngon">hải sản tươi ngon</a> <span>|</span>
                        <a href="http://haisanthanglong.com/" target="_blank" title="hải sản sạch">hải sản sạch</a> <span>|</span>
                        <a href="http://haisanthanglong.com/tom-cang-xanh" target="_blank" title="Tôm càng xanh">Tôm càng xanh</a> <span>|</span>
                        <a href="http://haisanthanglong.com/ca-tai-tuong" target="_blank" title="Cá tai tượng">Cá tai tượng</a> <span>|</span>
                        <a href="http://haisanthanglong.com/ca-lang" target="_blank" title="Cá Lăng">Cá Lăng</a> <span>|</span>
                        <a href="http://haisanthanglong.com/ca-bop-tuoi-song" target="_blank" title="Cá Bớp">Cá Bớp</a> <span>|</span>
                        <a href="http://haisanthanglong.com/ca-tam-bien" target="_blank" title="Cá Tầm">Cá Tầm</a> <span>|</span>
                        <a href="http://haisanthanglong.com/ca-chem" target="_blank" title="Cá chẽm">Cá chẽm</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container">
            <div class="row justify-content-between py-3">
                <div class="col">
                    2022 Copyright © <?=SETTING['Setting_Title']?>. All rights reserved. Design by <a href="https://getatz.com/">GetAtZ.com</a> 
                </div>
                <!-- <div class="col text-right">
                    Đang online: 5&emsp;|&emsp;Tuần: 605&emsp;|&emsp;Tổng truy cập: 72988
                </div> -->
            </div>
        </div>
    </div>
</footer>