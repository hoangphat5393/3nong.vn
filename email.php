<div style="width:640px;margin:0 auto">
    <div style="border-bottom:10px solid #018c39;padding:10px 0px">
        <img src="<?=$this->site_url['main']?>assets/images/header/logo.svg" alt="<?=SETTING['Setting_Company']?>">
    </div>
    <div>
        <div style="background:#eee;padding:10px">
            Chào anh/chị <b><?=$post['Contact_Name']?></b>,<br>
            Cảm ơn anh/chị đã sử dụng dịch vụ trả góp của <a href="<?=$this->site_url['main']?>" target="_blank"><?=$this->site_url['main']?></a>.
            <br>
            Thông tin liên hệ của anh/chị:
        </div>
        <div style="padding:10px">
            <!-- <span style="float:left">Mã đơn hàng: <b><?=$last_id?></b></span> -->
            <span style="float:right">Ngăy gửi: <?=date('d-m-Y')?></span>
            <div style="clear:both"></div>
        </div>
    </div>
    <div style="clear:both">
        <h2 style="font-size:16px;margin:0px;font-weight:bold;margin-bottom:10px">Thông tin nhận hàng</h2>
        <div style="background:#eee;padding:10px 5px"><span style="width:200px;display:inline-block">Tên người nhận:</span> test</div>
        <div style="padding:0px 5px;margin-top:10px"><span style="width:200px;display:inline-block">Điện thoại:</span> <a href="tel:<?=$post['Contact_Mobile']?>"><?=$post['Contact_Mobile']?></a></div>
        <div style="padding:0px 5px;margin-top:10px"><span style="width:200px;display:inline-block">Email:</span> <a href="mailto:<?=$post['Contact_Email']?>" target="_blank"><?=$post['Contact_Email']?></a></div>
        <div style="padding:0px 5px;margin-top:10px"><span style="width:200px;display:inline-block">Địa chỉ:</span> <?=$post['Contact_Address']?></div>
        <div style="padding:0px 5px;margin-top:10px"><span style="width:200px;display:inline-block">Ghi chú:</span> <?=$post['Contact_Message']?></div>
        <div style="border-top:10px solid #eee;margin:10px 0px"></div>
        <p><b>Lưu Ý </b> : Đây là thư hỗ trợ tự động , mọi phản hồi xin gửi về <a href="mailto:<?=SETTING['Setting_Email']?>"><?=SETTING['Setting_Email']?></a>.</p>
    </div>
    <div style="background:#018c39;padding:10px 10px;color:#fff">
        <div>
            <p>
            	<span style="font-size:14px">
                    <font face="verdana, geneva, sans-serif"><i>Thời gian hoạt động</i></font>
                </span>
            </p>
            <p><font face="verdana, geneva, sans-serif"><i>Thứ 2 - Chủ Nhật: 8h - 18h30 (Kể cả các ngày Lễ - Tết)</i></font></p>

            <p><font face="verdana, geneva, sans-serif"><i>Quý khách hàng có thể để lại thông tin tại khung bên cạnh để nhận thông tin khuyến mãi sớm nhất. Hoặc liên hệ theo số hotline bên dưới 24/7.</i></font></p>

            <p class="hotline">
            	<em>
            		<span style="font-family:verdana,geneva,sans-serif"><u>Hotline ( Sỉ và Lẻ ):</u>
            	</em>
            	<strong>
            		<a style="text-decoration: none;color:rgb(255,0,0)" href="tel:<?=SETTING['Setting_Phone']?>"><?=SETTING['Setting_Phone']?></a>
            	</strong>- Mr.Đạt	
            </p>

            <p><em>Email:</em> <a style="color:#fff;font-weight:bold" href="mailto:<?=SETTING['Setting_Email']?>"><?=SETTING['Setting_Email']?></a></p>
            <p><em>Facebook:</em> <a style="color:#fff;font-weight:bold" href="#" target="_blank">https://www.facebook.com/hotrotragop</a></p>
            <p><em>Website:</em> <a style="color:#fff;font-weight:bold" href="<?=$this->site_url['main']?>" target="_blank"><?=$this->site_url['main']?></a></p>
        </div>
    </div>
</div>