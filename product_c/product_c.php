<?php ob_start(); require_once('lib/atz.php');?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class product_controller extends atz{

	public function __construct() {
		parent::__construct();

		// Get param
		$this->page = $this->get_params(1);
		$this->param = $this->get_params(2);

		// $replacement = '$1 $2';
		// $rs = preg_replace('/(.+?).(html)/', $replacement, $this->param)
		$ex = explode('.',$this->param);
		$ex1 = explode('-',$ex[0]);
		$this->id = end($ex1);


		$this->post_contact = array(
			'Contact_Name'=>'',
			'Contact_Address'=>'',
			'Contact_Mobile'=>'',
			'Contact_Email'=>'',
			'Contact_Message'=>''
		);
			
	}

	// Lấy thông tin chuyên mục
	public function get_cat($id){
		
		$cat = array();
		if(!empty($id)){
			$cat = $this->select('cat',array('Cat_ID'=>$id), array('Cat_Order'=>'ASC', 'Cat_Name_vi'=>'ASC'));

			// Kiểm tra có chuyên mục con hay không
			if(!empty($cat)){
				$cat = $cat[0];
			}
		}
		return $cat;
	}

	// Lấy danh sách chuyên mục
	public function get_cats($cat_id){
		
		$cat_list = $cat_id;
		// Kiểm tra có chuyên mục con hay ko
		if(!empty($cat_id)){

			$cat_child = $this->select('cat',array('Cat_Parent'=>$cat_id));

			if (!empty($cat_child)) {
				
				foreach ($cat_child as $v) {
					$cat_list .= ','.$v['Cat_ID']; 
				}
			}
		}
		return $cat_list;
	}

	// Lấy danh sách bài viết
	public function get_products($cat_list){
		
		$data = array();
		$data = $this->select_in('product',array('Product_Cat'=>$cat_list),array('Product_Priority'=>'DESC'));
		return $data;
	}

	// Lấy thông tin bài viết liên quan
	public function get_rate($product_id){
		$rate = array();
		$sql = "SELECT  AVG (`Rate_Point`) as `rate`
                FROM    `rate` 
                where   `Rate_Product`= $product_id";
        $rate = $this->mysql_query($sql);

        if(!empty($rate[0])){
			$rate = $rate[0]['rate'];
		}
		return $rate;
	}

	// Lấy thông tin sản phẩm
	public function get_product($id){
		
		$product = array();
		$product = $this->select('product',array('Product_ID'=>$id, 'Product_Show'=>1));
		
		if(!empty($product)){
			$product = $product[0];

			if ($product['Product_Imgs']) {
				$product['Product_Imgs'] = explode(PHP_EOL,$product['Product_Imgs']);
			}else{
				$product['Product_Imgs'] = array();
			}	
		}
		return $product;
	}

	// Lấy thông tin bài viết liên quan
	public function get_relative_products($id){
		$posts = array();
		$sql = "SELECT  * 
                FROM    `product` 
                where   `Product_ID`!=$id AND `Product_Show`=1
                ORDER BY `Product_Priority` DESC, `Product_Name_vi` ASC";
        $posts = $this->mysql_query($sql);

		return $posts;
	}

	public function update_view($id,$view){

		if(isset($id) && $id){
			// Update
			$post = array();
			$post['Product_View_vi'] = $view+1;
			$post['Product_Updated'] = time();
			$this->update('product', $post, array('Product_ID' => $id));
		}
	}


	public function get_search_product(){

		if(isset($_GET['q']) && !empty($_GET['q'])){
			$products = $this->select_search('product',array('Product_Name_vi' => $_GET['q'], 'Product_Keywords_vi' => $_GET['q']), array('Product_Priority'=>'DESC'));
			
			if(!empty($products)){
				return $products;
			}	
		}
	}

	public function rate_product(){
		
		// Insert, Update
		if(isset($_POST['rate_id']) && !empty($_POST['rate_id'])){

			$post = array(
				'Rate_IP' => '',
				'Rate_Point' => $_POST['value'],
				'Rate_Product' => $_POST['id']
			);
				
			if(empty($errors)){

				// Insert

				$rs = $this->insert('rate', $post);

				if($rs){
					// $success = 'Gửi thành công';
					echo 'Cảm ơn bạn đã đánh giá';exit;
				}
			}else{
				$rs = array('errors' => $errors);
				return $rs;	
			}
		}
	}


	// Insert agent
	public function add_contact(){

		$post = $this->post_contact;
		
		// Insert, Update
		if(isset($_POST) && !empty($_POST)){
			
			foreach ($_REQUEST as $k => $v) {
				if(isset($post[$k])){
					$post[$k] =$v;
				}
			}
				
			$errors = array();

			if(!$post['Contact_Name']){
				$errors['Contact_Name'] = 'Chưa nhập tên';
			}
			if($post['Contact_Mobile']==''){
				$errors['Contact_Mobile'] = 'Chưa nhập số điện thoại';
			}elseif(!is_numeric($post['Contact_Mobile'])){
				$errors['Contact_Mobile'] = 'Chỉ được nhập số';
			}
			if($post['Contact_Email']!='' && !filter_var($post['Contact_Email'],FILTER_VALIDATE_EMAIL)){
				$errors['Contact_Email'] = 'Email không đúng';
			}
			if($post['Contact_Message']==''){
				$errors['Contact_Message'] = 'Chưa nhập lời nhắn';
			}
			
			if(empty($errors)){

				// Insert
				$post['Contact_Created'] = time();

				// $post['Contact_Country '] = 'vi';

				$last_id = $this->insert('contact', $post);

				if(!empty($last_id)){

					// SEND MAIL
					ob_start();
						
					// local host
					include_once $this->site_url['root'].'email_order.php';

					$body = ob_get_contents();
						
					ob_end_clean();
						
					$mail = $this->send_mail($body,$post['Contact_Email'],$post['Contact_Name']);
					// END SEND MAIL

					// $success['main'] = 'Đặt hàng thành công! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.\nThông tin liên hệ đã được gửi vào mail của bạn (Nếu không thấy mail xin hay kiểm tra thư mục spam)';
					$rs = array('status' => 'success');
				}else{

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