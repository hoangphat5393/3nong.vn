<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-lg-flex flex-cloumn align-items-center">
                <div class="d-flex align-items-center my-2">
                    <div class="logo mx-auto">
                        <a href="<?=$atz->site_url['main']?>" title="<?=SETTING['Setting_Title']?>"><img src="<?=$atz->site_url['main']?>assets/images/header/logo.png" alt="<?=SETTING['Setting_Title']?>" class="img-fluid"></a>
                    </div>
                    <div class="web-title-block">
                        <!-- <h2 class="web-title"><?=SETTING['Setting_Title']?></h2> -->
                        <!-- <p>Uy tín - chất lượng</p> -->
                    </div>
                </div>

                <div class="flex-fill px-3">
                    <div class="search-block">
                        <form action="search" class="my-2 my-lg-0">
                            <div class="form-group">
                                <input class="form-control input-search mr-sm-2 w-100" type="search" placeholder="Tìm kiếm" name=q value="">
                                <button type="submit" class="btn-search my-sm-0"><i class="fa fa-search fa-fw"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="header-contact align-items-center d-none d-lg-flex">
                    <a href="tel:<?=str_replace(' ', '', SETTING['Setting_Phone'])?>" class="d-flex align-items-center">
                        <img src="<?=$atz->site_url['main']?>assets/images/header/hotline.svg" alt="" class="img-fluid">
                        <p>
                            Hotline:<br>
                            <span><?=SETTING['Setting_Phone']?></span>
                        </p>
                    </a>
                    <a href="mailto:<?=SETTING['Setting_Email']?>" class="d-flex align-items-center">
                        <img src="<?=$atz->site_url['main']?>assets/images/header/email.svg" alt="<?=SETTING['Setting_Email']?>" class="img-fluid">
                        <p>
                            Email:<br>
                            <span><?=SETTING['Setting_Email']?></span>
                        </p>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</div>