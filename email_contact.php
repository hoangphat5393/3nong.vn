<p>Chào anh/chị <b><?=$post['Contact_Name']?> <span style="float:right">Ngăy gửi: <?=date('d-m-Y')?></span></p>
<p>Cảm ơn anh/chị đã để lại thông tin liên hệ
 <a href="<?=$this->site_url['main']?>" target="_blank"><?=$this->site_url['main']?></a>.</p>
<p>Chúng tôi sẽ liên hệ lai trong thời gian sớm nhất</p>
<div style="clear:both">
    <h2 style="font-size:16px;margin:0px;font-weight:bold;margin-bottom:10px">Thông tin liên hệ</h2>
    <div style="background:#eee;padding:10px 5px"><span style="width:200px;display:inline-block">Tên:</span> <?=$post['Contact_Name']?></div>
    <div style="padding:0px 5px;margin-top:10px"><span style="width:200px;display:inline-block">Điện thoại:</span> <a href="tel:<?=$post['Contact_Mobile']?>"><?=$post['Contact_Mobile']?></a></div>
    <div style="padding:0px 5px;margin-top:10px"><span style="width:200px;display:inline-block">Email:</span> <a href="mailto:<?=$post['Contact_Email']?>" target="_blank"><?=$post['Contact_Email']?></a></div>
    <div style="padding:0px 5px;margin-top:10px"><span style="width:200px;display:inline-block">Địa chỉ:</span> <?=$post['Contact_Address']?></div>
    <div style="padding:0px 5px;margin-top:10px"><span style="width:200px;display:inline-block">Ghi chú:</span> <?=$post['Contact_Message']?></div>
    <div style="border-top:10px solid #eee;margin:10px 0px"></div>
    <p><b>Lưu Ý </b> : Đây là thư hỗ trợ tự động, mọi phản hồi xin gửi về <a href="mailto:<?=SETTING['Setting_Email']?>"><?=SETTING['Setting_Email']?></a>.</p>
</div>
<div>
    <p><em>Điện thoại:</em> <a style="color:red;font-weight:bold" href="tel:<?=preg_replace('/[^0-9]/', '', SETTING['Setting_Phone'])?>"><?=SETTING['Setting_Phone']?></a></p>
    <p><em>Email:</em> <a style="font-weight:bold" href="mailto:<?=SETTING['Setting_Email']?>"><?=SETTING['Setting_Email']?></a></p>
    <p><em>Website:</em> <a style="font-weight:bold" href="<?=$this->site_url['main']?>" target="_blank"><?=$this->site_url['main']?></a></p>
</div>