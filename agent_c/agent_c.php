<?php ob_start(); require_once('lib/atz.php');?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class agent_controller extends atz{

	public function __construct() { 

		parent::__construct();

		$this->post = array(
			'Agent_Name'=>'',
			'Agent_Address'=>'',
			'Agent_Mobile'=>'',
			'Agent_Email'=>'',
			'Agent_Message'=>''
		);
	}

	// Insert agent
	public function add_agent(){

		$post = $this->post;
		
		// Insert, Update
		if(isset($_REQUEST) && !empty($_REQUEST)){
			
			foreach ($_REQUEST as $k => $v) {
				if(isset($post[$k])){
					$post[$k] =$v;
				}
			}	

			$errors = array();

			if(!$post['Agent_Name']){
				$errors['Agent_Name'] = 'Chưa nhập tên';
			}
			if($post['Agent_Mobile']==''){
				$errors['Agent_Mobile'] = 'Chưa nhập số điện thoại';
			}elseif(!is_numeric($post['Agent_Mobile'])){
				$errors['Agent_Mobile'] = 'Chỉ được nhập số';
			}
			if($post['Agent_Email']!='' && !filter_var($post['Agent_Email'],FILTER_VALIDATE_EMAIL)){
				$errors['Agent_Email'] = 'Email không đúng';
			}
			if($post['Agent_Message']==''){
				$errors['Agent_Message'] = 'Chưa nhập lời nhắn';
			}
			
			if(empty($errors)){

				// Insert
				$post['Agent_Created'] = time();

				// $post['Agent_Country '] = 'vi';

				$last_id = $this->insert('agent', $post);

				if(!empty($last_id)){

					// SEND MAIL
					ob_start();
						
					// local host
					include_once $this->site_url['root'].'email_agent.php';

					$body = ob_get_contents();
						
					ob_end_clean();
						
					$mail = $this->send_mail($body,$post['Agent_Email'],$post['Agent_Name']);
					// END SEND MAIL

					// $success['main'] = 'Đặt hàng thành công! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.\nThông tin liên hệ đã được gửi vào mail của bạn (Nếu không thấy mail xin hay kiểm tra thư mục spam)';
					$rs = array('status' => 'success');


				}else{
					// $errors['main'] = 'Có lỗi xảy ra. Vui lòng thử lại sau!';
					// $rs = array('error' => $errors);
					$rs = array('status' => 'fail');
				}
					
				echo json_encode($rs);
				exit;

			}else{
				$rs = array('status' => 'fail');
				return $rs;	
			}
		}
	}

	public function send_mail($body,$mail_to='',$mail_name=''){
		
		//Instantiation and passing `true` enables exception
		$mail = new PHPMailer(true);
		$mail->CharSet = 'UTF-8';

		//Server settings
		// $mail->SMTPDebug = 2;
		$mail->IsSMTP(); // set mailer to use SMTP
		$mail->SMTPOptions = array(
		    'ssl' => array(
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		        'allow_self_signed' => true
		    )
		);
		// $mail->Host = "smtp.gmail.com"; // specify main and backup server
		$mail->Host = "mail.3nong.vn"; // specify main and backup server
		$mail->Port = 465; // set the port to use
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->SMTPSecure = 'ssl'; 
		$mail->Username = "noreply@3nong.vn"; // your SMTP username or your gmail username
		$mail->Password = "vW3SBA4e"; // your SMTP password or your gmail password

		//Recipients
		$from = "noreply@3nong.vn"; // Reply to this email
		$to = $mail_to; // Recipients email ID
		$name = $mail_name; // Recipient's name

		$replyto = SETTING['Setting_Email']; // Reply email ID
		$replyname = SETTING['Setting_Title']; // Reply's name
		
		// $ccto = SETTING['Setting_Email']; // CC email ID
		// $ccname = SETTING['Setting_Title']; // CC's name
		
		$mail->From = $from;
		$mail->FromName = SETTING['Setting_Title']; // Name to indicate where the email came from when the recepient received

		if($to && $name){
			$mail->AddAddress($to,$name);	
		}
		$mail->AddAddress(SETTING['Setting_Email'],SETTING['Setting_Title']);

		// $mail->AddCC($ccto,$ccname);
		$mail->AddReplyTo($replyto,$replyname);
		
		$mail->WordWrap = 50; // set word wrap
		$mail->IsHTML(true); // send as HTML
		$mail->Subject = "Đặt hàng tại website ".$this->site_url['main'];
		$mail->Body = $body;
		$mail->AltBody = "Mail nay duoc gửi từ ".$this->site_url['main']; //Text Body

		if(!$mail->Send()){
		    // return "<h1>Loi khi goi mail: " . $mail->ErrorInfo . '</h1>';
		    return 0;
		}else{
		    // return "<h1>Send mail thanh cong</h1>";
		    return 1;
		}
	}
}
?>