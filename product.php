<?php require_once('product_c/product_c.php');?>

<?php 
    $atz = new product_controller();

    $product = $atz->get_product($atz->id);
    if (!empty($product)) {
        $cat = $atz->get_cat($product['Product_Cat']);

        // Update View
        $atz->update_view($product['Product_ID'],$product['Product_View_vi']);
    }

    $relative_products = $atz->get_relative_products($atz->id);

    $product_rate = $atz->get_rate($product['Product_ID']);
        
    $atz->rate_product();

    $atz->add_contact();
?>

<!doctype html>
<html lang="vi">

    <head>

        <!-- HEAD -->
        <?php include('modules/head.php') ?>
        <!-- END HEAD -->

        <!-- SEO -->
        <meta name="description" content="<?=$product['Product_Description_vi']?>">
        <meta name="keywords" content="<?=$product['Product_Keywords_vi']?>">

        <title><?=$product['Product_Name_vi']?></title>

    </head>


    <body>

        <!-- HEADER -->
        <header>
            <?php include('modules/header.php');?>
        </header>
        <!-- END HEADER -->

        <!-- MENU -->
        <?php include('modules/menu.php')?>
        <!-- END MENU -->

        <!-- BREADCRUMB -->
        <!-- <div class="bg-warp-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
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

        <!-- MAIN PRODUCT -->
        <div class="container  mt-3 mb-3">

            <div class="row product-detail">
                <div class="col-md-12">
                    <div class="row">
                        <?php if (!empty($product)): ?>

                            <div class="col-md-7">
                                <div id="slider_0" class="splide mb-3">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <?php foreach ($product['Product_Imgs'] as $v): ?>
                                                <li class="splide__slide">
                                                    <img src="<?=$atz->site_url['upload'].'product/'.$v?>" alt="<?=$product['Product_Name_vi']?>">
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </div>

                                <div id="thumb_slider_0" class="splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <?php foreach ($product['Product_Imgs'] as $v): ?>
                                                <li class="splide__slide">
                                                    <img src="<?=$atz->site_url['upload'].'product/'.$v?>" alt="<?=$product['Product_Name_vi']?>">
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <h1 class="pro-title"><?=$product['Product_Name_vi']?></h1>
                                <?=$product['Product_Description_vi']?>
                                
                                <div class="row pro-attr mb-3">
                                    <div class="col-sm-12 view">
                                        <strong>Lượt xem:</strong> <span><?=$product['Product_View_vi']?></span> | 
                                        <strong>Lượt mua:</strong> <span><?=$product['Product_Buy']?></span>
                                    </div>
                                </div>

                                <div class="rating mb-3"></div>

                                <div class="price-block">
                                    <?php if ($product['Product_SalePrice']):?>
                                        Giá: <span class="sale-price"><?=number_format($product['Product_SalePrice'],0,',','.')?> VNĐ<?=!empty($product['Product_PriceType'])?'/<sub>'.$product['Product_PriceType'].'</sub>':''?></span>
                                        <span class="old-price"><?=number_format($product['Product_Price'],0,',','.')?> VNĐ<?=!empty($product['Product_PriceType'])?'/<sub>'.$product['Product_PriceType'].'</sub>':''?></span>
                                    <?php else:?>
                                        Giá: <a href="tel:<?=str_replace(' ', '', SETTING['Setting_Phone'])?>" title="Liên hệ">Liên hệ</a>
                                    <?php endif ?>
                                </div>

                                <div class="flex_row quanlity mt-3"> 
                                    <label class="quanlity-label">Số lượng:</label>
                                    <div class="quanlity-content">
                                        <div class="quantity-content-detail">
                                            <span class="minus calc d-block" data-calc="minus">-</span>
                                            <input type="text" class="quanlity-input" min="1" value="1" readonly="">
                                            <span class="plus calc d-block" data-calc="plus">+</span>
                                        </div>
                                    </div>
                                    <?=$product['Product_PriceType']?>
                                </div>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#OrderModal">
                                    Liên hệ đặt hàng
                                </button>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger mt-3" data-toggle="modal" data-target="#exampleModal">
                                    Thanh toán online
                                </button>
                            </div>

                            <div class="col-md-12 mt-4">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">THÔNG TIN SẢN PHẨM</a>
                                        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">BÌNH LUẬN</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="content-tabs-pro-detail info-pro-detail active">
                                            <?=$product['Product_Content_vi']?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="fb-comments" data-href="http://3nong.getatz.com/<?=$product['Product_ID']?>" data-width="100%" data-numposts="5"></div>
                                    </div>
                                </div>
                            </div>

                        <?php else: ?>
                            <p>Không có sản phẩm này</p>
                        <?php endif ?>   
                    </div>
                </div>

            </div>
        </div>
        <!-- END MAIN PRODUCT -->

        <!-- LIST PRODUCT -->
        <div class="container product-list mt-3 mb-3">

            <div class="block product-list py-2">
                        
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="d-flex align-items-center block-title text-center">
                            <div class="flex-grow-1">Sản phẩm cùng loại</div>
                        </div>
                    </div>

                    <?php if (!empty($relative_products)): ?>
                        <?php foreach ($relative_products as $v): ?>
                            <div class="col-md-3 product-list-item">
                                <a href="<?=$atz->site_url['main'].'san-pham/'.$atz->slug($v['Product_Name_vi']).'-'.$v['Product_ID'].'.html'?>" title="<?=$v['Product_Name_vi']?>">
                                    <figure>
                                        <img class="w-100" src="<?=$v['Product_Thumbnail']?>" alt="<?=$v['Product_Name_vi']?>">
                                        <figcaption><?=$v['Product_Name_vi']?></figcaption>
                                    </figure>
                                </a>
                                <div class="price-block">
                                    <?php if ($v['Product_SalePrice']): ?>
                                        Giá: <span class="sale-price"><?=number_format($v['Product_SalePrice'],0,',','.')?> VNĐ<?=!empty($v['Product_PriceType'])?'/<sub>'.$v['Product_PriceType'].'</sub>':''?></span>
                                        <?php if ($v['Product_Discount']): ?>
                                            <div class="mt-2 d-flex justify-content-between">
                                                <span class="old-price"><?=number_format($v['Product_Price'],0,',','.')?> VNĐ<?=!empty($v['Product_PriceType'])?'/<sub>'.$v['Product_PriceType'].'</sub>':''?></span>
                                                <span class="discount-price">- <?=number_format($v['Product_Discount'],0,',','.')?> <?=$v['Product_DiscountUnit']?></span>
                                            </div>
                                        <?php endif ?>
                                    <?php else:?>
                                        Giá: <a href="tel:<?=str_replace(' ', '', SETTING['Setting_Phone'])?>" title="Liên hệ">Liên hệ</a>
                                    <?php endif ?>
                                </div>
                                <a class="btn addcart" href="<?=$atz->site_url['main'].'san-pham/'.$atz->slug($v['Product_Name_vi']).'-'.$v['Product_ID'].'.html'?>" title="<?=$v['Product_Name_vi']?>">Mua ngay</a>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                    
                </div>
            </div>
        </div>
        <!-- END LIST PRODUCT -->

        <!-- Modal | liên hệ đặt hàng -->
        <div class="modal fade" id="OrderModal" tabindex="-1" aria-labelledby="OrderModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="OrderModalLabel">Thông tin đặt hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-agent" class="form-agent" method="post" action="">

                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <div class="information-contact">
                                        <div class="form-group form-row">
                                            <div class="col">
                                                <input type="text" class="form-control" id="Contact_Name" name="Contact_Name" placeholder="Họ &amp; tên" required>
                                            </div>
                                        </div>

                                        <div class="form-group form-row">
                                            <div class="col">
                                                <input type="text" class="form-control" id="Contact_Mobile" name="Contact_Mobile" placeholder="Số điện thoại" required>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" id="Contact_Email" name="Contact_Email" placeholder="Email" required>
                                            </div>    
                                        </div>
                                        <div class="form-group form-row">
                                            <div class="col">
                                                <input type="text" class="form-control" id="Contact_Address" name="Contact_Address" placeholder="Địa chỉ">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <textarea class="form-control" id="Contact_Message" name="Contact_Message" placeholder="Lời nhắn" rows="8" required></textarea>
                                        </div>

                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-secondary">Gửi</button>
                                            <button type="reset" class="btn btn-secondary">Nhập lại</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- Modal | thanh toán online -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thông tin chuyển khoản</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Tel / Điện thoại: <strong><a href="tel:<?=str_replace(' ', '', SETTING['Setting_Phone'])?>"> <?=SETTING['Setting_Phone']?></a></strong></p>
                        <p>Bank Account / Tài khoản NH: <strong>0991002010011</strong></p>
                        <p>Bank name / Ngân hàng: <strong>TMCP An Bình - ABBANK Soái Kinh Lâm</strong></p>
                        <p>Account name / Chủ tài khoản: <strong>CÔNG TY CỔ PHẦN TAM NÔNG (TAM NONG JSC)</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>

        <?php include('modules/footer.php') ?>
            
        <!-- JS LIB-->
        <?php include('modules/js.php') ?>
        <!-- END JS LIB -->

        
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0&appId=1664735463815046&autoLogAppEvents=1" nonce="p59Xi3OW"></script>

        <script>
            var mainSplideOptions = {
                type        : 'fade',
                heightRatio : 0.5,
                rewind      : true,
                pagination  : false,
                cover       : true,
                autoplay    : true,
            }

            var thumbSplideOptions = {
                rewind          : true,
                fixedWidth      : 120,
                fixedHeight     : 120,
                isNavigation    : true,
                gap             : 9,
                focus           : 'left',
                pagination      : false,
                cover           : true,
                arrows          : false,
                dragMinThreshold: {
                    mouse: 4,
                    touch: 10,
                },
                breakpoints : {
                    640: {
                        fixedWidth  : 66,
                        fixedHeight : 38,
                    },
                },
            }
            
            if ( $("#slider_0").length ){
                var slider_0 = new Splide( '#slider_0', mainSplideOptions).mount();
                var thumb_slider_0 = new Splide( '#thumb_slider_0', thumbSplideOptions).mount();
                slider_0.sync( thumb_slider_0 );
            }

            $( '#nav-tab' ).on( 'shown.bs.tab', function() {
                if ( $("#slider_0").length ){
                    slider_0.emit('resize');
                }
            });

            // Options
            var options = {
                max_value: 5,
                step_size: 0.5,
                initial_value: <?=$product_rate?$product_rate:0?>,
                selected_symbol_type: 'fontawesome_star', // Must be a key from symbols
                cursor: 'default',
                readonly: false,
                change_once: false, // Determines if the rating can only be set once
                ajax_method: 'POST',
                url: '<?=$_SERVER['REQUEST_URI']?>',
                additional_data: {
                    rate_id: <?=$product['Product_ID']?>
                }, // Additional data to send to the server
            }

            $(".rating").rate(options);

            $(".rating").on("updateSuccess", function(ev, data){
                alert('Cảm ơn bạn đã đánh giá sản phẩm.')
            });
        </script>

        <script>
            var quanlity = $('.quanlity-input').val();
            $('.quantity-content-detail .calc').on('click', function(){
                calc = $(this).attr('data-calc');
                if(quanlity >= 1 && $.isNumeric(quanlity)){
                    if(calc=='minus'){
                        if(quanlity == 1){
                            quanlity = 1;return;
                        };
                        quanlity --;
                    }else{
                        quanlity ++;
                    }
                };
                $('.quanlity-input').val(quanlity);
            })
        </script>

        <script>
        <?php if(isset($rs['success'])):?>
            alert('<?=$rs['success']['main']?>');
        <?php endif ?>

        $(document).ready(function() {
            $('#form-agent').validate({
                errorPlacement: function(error, element) {
                    var place = element.closest('.input-group');
                    if (!place.get(0)) {
                        place = element;
                    }
                    if (place.get(0).type === 'checkbox') {
                        place = element.parent();
                    }
                    if (error.text() !== '') {
                        place.before(error);
                    }
                },
                rules: {
                    Contact_Name: {
                        required: true
                    },
                    Contact_Email: {
                        email: true
                    },
                    Contact_Mobile: {
                        required: true,
                        number: true,
                        digits: true,
                        minlength: 10
                    },
                    Contact_Message: {
                        required: true
                    },
                },
                messages: {
                    Contact_Name: {
                        required: "Chưa nhập tên!"
                    },
                    Contact_Email: {
                        required: "Chưa nhập Email!",
                        email: "Email không hợp lệ"
                    },
                    Contact_Mobile: {
                        required: "Chưa nhập số điện thoại!",
                        number: "Điện thoại phải là số!",
                        digits: "Điện thoại không được nhập số âm !",
                        minlength: "Điện thoại phải ít nhất có 10 số!"
                    },
                    Contact_Message: {
                        required: "Chưa nhập lời nhắn!"
                    }
                },
                
                submitHandler: function(form) {
                    $.ajax({
                        url: "<?=$_SERVER['REQUEST_URI']?>",
                        type: "POST",             
                        data: $(form).serialize(),
                        cache: false,             
                        processData: false,
                        dataType: "json",
                        success: function(data) {
                            console.log(data.status);
                            if(data.status == 'success'){
                                console.log(data.status);
                                window.location.replace("<?=$atz->site_url['main']?>thanks");    
                            }
                        }
                    });
                    return false; // required to block normal submit since you used ajax
                }
            });
        });
    </script>
    </body>

</html>