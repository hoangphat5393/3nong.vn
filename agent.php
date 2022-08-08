<?php require_once('agent_c/agent_c.php');?>
<?php 
    $atz = new agent_controller();
    $atz->add_agent();
?>

<!-- <a href="tel:<?=preg_replace('/[^0-9]/', '', SETTING['Setting_Phone'])?>"><?=SETTING['Setting_Phone']?></a> -->

<!doctype html>
<html lang="vi">

<head>
    
    <!-- HEAD -->
    <?php include('modules/head.php') ?>
    <!-- END HEAD -->


    <!-- SEO -->
    <meta name="description" content="<?=SETTING['Setting_Description']?>">
    <meta name="keywords" content="<?=SETTING['Setting_Keywords']?>">

    <title>Đăng ký đại lý - <?=SETTING['Setting_Title']?></title>

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
    <div class="container mt-3 mb-3 contact-page">

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="content-main w-clear block" id="toc-content">
                    <div class="block-title text-center">
                        <h1>ĐĂNG KÝ LÀM ĐẠI LÝ</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <form id="form-agent" class="form-agent" method="post" action="">

                    <div class="row justify-content-center">
                        <div class="col-md-8 mb-3">
                            <div class="information-contact">
                                <div class="form-group form-row">
                                    <div class="col">
                                        <input type="text" class="form-control" id="Agent_Name" name="Agent_Name" placeholder="Họ &amp; tên" required>
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <div class="col">
                                        <input type="text" class="form-control" id="Agent_Mobile" name="Agent_Mobile" placeholder="Số điện thoại" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="Agent_Email" name="Agent_Email" placeholder="Email" required>
                                    </div>    
                                </div>
                                <div class="form-group form-row">
                                    <div class="col">
                                        <input type="text" class="form-control" id="Agent_Address" name="Agent_Address" placeholder="Địa chỉ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" id="Agent_Message" name="Agent_Message" placeholder="Lời nhắn" rows="8" required></textarea>
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
                    Agent_Name: {
                        required: true
                    },
                    Agent_Email: {
                        email: true
                    },
                    Agent_Mobile: {
                        required: true,
                        number: true,
                        digits: true,
                        minlength: 10
                    },
                    Agent_Message: {
                        required: true
                    },
                },
                messages: {
                    Agent_Name: {
                        required: "Chưa nhập tên!"
                    },
                    Agent_Email: {
                        required: "Chưa nhập Email!",
                        email: "Email không hợp lệ"
                    },
                    Agent_Mobile: {
                        required: "Chưa nhập số điện thoại!",
                        number: "Điện thoại phải là số!",
                        digits: "Điện thoại không được nhập số âm !",
                        minlength: "Điện thoại phải ít nhất có 10 số!"
                    },
                    Agent_Message: {
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
                                window.location.replace("<?=$atz->site_url['main']?>agent_thanks");    
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