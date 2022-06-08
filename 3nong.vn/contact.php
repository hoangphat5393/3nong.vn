<?php require_once('contact_c/contact_c.php');?>
<?php 
    $atz = new contact_controller();
    $atz->add_contact();
?>

<!doctype html>
<html lang="vi">

<head>
    
    <!-- HEAD -->
    <?php include('modules/head.php') ?>
    <!-- END HEAD -->


    <!-- SEO -->
    <meta name="description" content="<?=SETTING['Setting_Description']?>">
    <meta name="keywords" content="<?=SETTING['Setting_Keywords']?>">

    <title>Liên hệ - <?=SETTING['Setting_Title']?></title>

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
    <div class="container mt-3 mb-3 contact-page">

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="content-main w-clear block" id="toc-content">
                    <div class="block-title text-center">
                        <h1>LIÊN HỆ</h1>
                    </div>
                </div>
            </div>

            <div class="article-contact col-md-6">
                <p><strong><?=SETTING['Setting_Company']?></strong></p>
                <p><strong>Địa chỉ:&nbsp;</strong><?=SETTING['Setting_Address']?></p>
                <p><strong>Kho:</strong>&nbsp;<?=SETTING['Setting_Address']?></p>
                <p><strong>Hotline:</strong> <?=SETTING['Setting_Phone']?></p>
                <p><strong><strong>Email:&nbsp;</strong></strong><a href="mailto:<?=SETTING['Setting_Email']?>"><?=SETTING['Setting_Email']?></a></p>
                <p><strong>MST:</strong>&nbsp;<?=SETTING['Setting_CompanyCode']?></p>
            </div>

            <div class="col-md-6">
                <form class="form-contact" method="post" action="">

                    <div class="row">

                        <div class="col-md-12 mb-3">
                            
                            <div class="information-contact">
                                <div class="form-group form-row">
                                    <div class="col">
                                        <input type="text" class="form-control" id="User_Name" name="User_Name" placeholder="Họ &amp; tên" required>
                                    </div>
                                    
                                </div>

                                <div class="form-group form-row">

                                    <div class="col">
                                        <input type="text" class="form-control" id="User_Mobile" name="User_Mobile" placeholder="Số điện thoại" required>
                                    </div>
                                    

                                    <div class="col">
                                        <input type="text" class="form-control" id="User_Email" name="User_Email" placeholder="Email" required>
                                    </div>    
                                </div>
                                <div class="form-group form-row">
                                    <div class="col">
                                        <input type="text" class="form-control" id="User_Address" name="User_Address" placeholder="Địa chỉ" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" id="User_Message" name="User_Message" placeholder="Lời nhắn" rows="8"></textarea>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-secondary">Gửi</button>
                                    <button type="reset" class="btn btn-secondary">Nhập lại</button>
                                </div>
                            </div>
                        
                        </div>

                    </div>
                </form>
            </div>
            

        </div>
    </div>
    <!-- END POST -->
    
    <?php include('modules/footer.php') ?>
        
    <!-- JS LIB-->
    <?php include('modules/js.php') ?>
    <!-- END JS LIB -->

    <script>
        <?php if(isset($rs['success'])):?>
            alert('<?=$rs['success']['main']?>');
        <?php endif ?>

        $(document).ready(function() {
            $('#contact-form').validate({
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
                        // required: true,
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
                        success: function(data) {
                            form.reset();
                            alert(data);
                        }
                    });
                    
                    return false; // required to block normal submit since you used ajax
                }
            });
        });
    </script>
    
</body>

</html>