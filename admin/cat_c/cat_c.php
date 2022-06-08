<?php ob_start(); require_once('../lib/atz.php');?>
<?php 
class cat_controller extends atz{

	public function __construct() { 

		parent::__construct();

		// Kiểm tra đăng nhập
		$this->check_login();
		
		$this->cat_type = array(
			'product' => 'Sản phẩm',
			'post' => 'Bài viết',
		);

		$this->post = array(
			'Cat_Name_vi'=>'',
			'Cat_Thumbnail'=>'',
			'Cat_Description_vi'=>'',
			'Cat_Type'=>'',
			'Cat_Img'=>'',
			'Cat_Keywords_vi' =>'',
			'Cat_Parent'=>0,
			'Cat_Hot'=>1,
			'Cat_Order'=>1,
			'Cat_Show'=>'main_menu',
			'Cat_Status'=>1
		);

		// Chuyên mục không được xóa
		$this->cat_not_delete = array();

	}

	public $thumb_width = 350;
	public $thumb_height = 230;


	// Select Cat Parent
	public function get_parent_cats(){
		$parent_cats = $this->select('cat',array('Cat_Parent'=>0), array('Cat_Order'=>'ASC','Cat_ID'=>'ASC','Cat_Name_vi'=>'ASC'));

		if(!empty($parent_cats)){
			foreach ($parent_cats as $k => $v){
				$parent_cats[$k]['Cat_Child'] = $this->select('cat',array('Cat_Parent'=>$v['Cat_ID']), array('Cat_Order'=>'ASC','Cat_ID'=>'ASC','Cat_Name_vi'=>'ASC'));
			}	
		}
			
		return $parent_cats;
	}

	// Select Cat List
	public function get_cats(){
		
		$parent_cats = $this->select('cat',array('Cat_Parent'=>0), array('Cat_Order'=>'ASC','Cat_ID'=>'ASC','Cat_Name_vi'=>'ASC'));

		if(!empty($parent_cats)){
			foreach ($parent_cats as $k => $v) {
				$parent_cats[$k]['Cat_Child'] = array();
				$parent_cats[$k]['Cat_Child'] = $this->select('cat',array('Cat_Parent'=>$v['Cat_ID']));

				if(!empty($parent_cats[$k]['Cat_Child'])){
					foreach ($parent_cats[$k]['Cat_Child'] as $k1 => $v1) {
						$parent_cats[$k]['Cat_Child'][$k1]['Cat_Child'] = array();
						$parent_cats[$k]['Cat_Child'][$k1]['Cat_Child'] = $this->select('cat',array('Cat_Parent'=>$v1['Cat_ID']));
					}
				}
			}
		}
			
		return $parent_cats;
	}


	public function get_current_data($id){

		$current_data = $this->select('cat',array('Cat_ID'=>$id));
					
		if(!empty($current_data)){
			return $current_data[0];
		}
		header('location:'.$this->site_url['admin'].'cat_list.php');
	}

	public function get_parent($id){

		$cat_child = $this->select('cat',array('Cat_ID'=>$id));
					
		if(!empty($cat_child)){
			return $cat_child[0];
		}
	}

	public function get_child($id){

		$cat_child = $this->select('cat',array('Cat_Parent'=>$id), array('Cat_Order'=>'ASC','Cat_ID'=>'ASC','Cat_Name_vi'=>'ASC'));
					
		if(!empty($cat_child)){
			return $cat_child[0];
		}
	}	

	// Insert, Update Cat
	public function add_cat(){

		$post = $this->post;

		if(isset($_GET['edit'])){

			$current_data = $this->get_current_data($_GET['edit']);
				
			if($current_data){
				foreach ($current_data as $k => $v) {
					if(isset($post[$k])){
						$post[$k] =$v;
					}
				}

				// $comma_separated = ("','", $post['Cat_Show']);
				// $post['Cat_Show'] = $comma_separated;

				$this->post = $post;
			}
		}
	

		// Insert, Update
		if(!empty($_REQUEST) && isset($_REQUEST['submit'])){
			
			foreach ($_REQUEST as $k => $v) {
				if(isset($post[$k])){
					$post[$k] =$v;
				}
			}

			$this->post = $post;
			
			$errors = array();


			if(!$post['Cat_Name_vi']){
				$errors['Cat_Name_vi'] = 'Chưa nhập tên';
			}
			// if(!$post['Cat_Thumbnail'] && !$_FILES['Cat_Thumbnail']['tmp_name']){
			// 	$errors['Cat_Thumbnail'] = 'Chưa chọn ảnh đại diện';	
			// }else{
			// 	if($_FILES['Cat_Thumbnail']['name']){
			// 		// Kiểm tra file
			// 		$check_file = $this->image->check_file($_FILES['Cat_Thumbnail']['name']);
			// 		if ($check_file!=1) {
			// 		    $errors['Cat_Thumbnail'] = $check_file;
			// 		}	
			// 	}	
			// }

			if($_FILES['Cat_Thumbnail']['name']){
				// Kiểm tra file
				$check_file = $this->image->check_file($_FILES['Cat_Thumbnail']['name']);
				if ($check_file!=1) {
				    $errors['Cat_Thumbnail'] = $check_file;
				}	
			}	
			if(empty($post['Cat_Show'])){
				$errors['Cat_Show'] = 'Chưa chọn vị trí chuyên mục';
			}
			if($post['Cat_Order']==''){
				$errors['Cat_Order'] = 'Chưa nhập thứ tự';
			}elseif(!is_numeric($post['Cat_Order'])){
				$errors['Cat_Order'] = 'Chỉ được nhập số';
			}

			// Thư mục ảnh
			$dir = '../upload/cat/';

			if(!is_dir($dir)){
				mkdir($dir);
	        }				
				
			if(empty($errors)){
				$rs = '';

				$dir_thumb = $dir.'thumbnail/'; 
				if(!is_dir($dir_thumb)){
					mkdir($dir_thumb);
		        }

				// Upload ảnh đại diện (thumbnail)
				if(isset($_FILES['Cat_Thumbnail']) && $_FILES['Cat_Thumbnail']['tmp_name']){
					$file = $_FILES['Cat_Thumbnail'];

					$ext = $this->image->file_type($file['name']);
		        }

		        // $comma_separated = implode("','", $post['Cat_Show']);
				// $post['Cat_Show'] = "'".$comma_separated."'";
				
				$comma_separated = implode(',', $post['Cat_Show']);
				$post['Cat_Show'] = $comma_separated;
					
				if (!isset($_REQUEST['edit'])) {

					// Tiến hành upload ảnh đại diện
					$thumb_name = time().'_'.rand(100000, 999999).'.'.$ext;

					if($this->image->upload($file['tmp_name'],$dir_thumb,$thumb_name)==1){
						$post['Cat_Thumbnail'] = $dir_thumb.$thumb_name;
					}

					// Insert
					$post['Cat_Created'] = time();
					$rs = $this->insert('cat', $post);
				}else{

					// Xóa ảnh (thumbnail) trong trường hợp sửa
					$old_thumb = $current_data['Cat_Thumbnail'];
					
					if(isset($_FILES['Cat_Thumbnail']) && !empty($_FILES['Cat_Thumbnail']['tmp_name'])){
						
						$thumb_name = time().'_'.rand(100000, 999999).'.'.$ext;
							
						// Tiến hành upload ảnh đại diện
						if($this->image->upload($file['tmp_name'],$dir_thumb,$thumb_name)==1){
							$post['Cat_Thumbnail'] = $dir_thumb.$thumb_name;

							if(file_exists($old_thumb)){
								unlink($old_thumb);	
							}
						}
					}

					// Update
					$post['Cat_Updated'] = time();
					$rs = $this->update('cat', $post, array('Cat_ID' => $_REQUEST['edit']));
				}

				if(!empty($rs)){
					header("location:cat_list.php");die;
				}

			}else{
				$rs = array('errors' => $errors);
				return $rs;	
			}
		}
	}

	// Delete Cat
	public function remove_cat(){
		if(isset($_GET['delete'])){

			// Dữ liệu cần xóa
			$current_data = $this->get_current_data($_GET['delete']);

			// Xóa ảnh đại diện (thumbnail)
			$old_thumb = $current_data['Cat_Thumbnail'];

			// Tiến hành xoá ảnh nếu có	
			if(file_exists($old_thumb)){		
				unlink($old_thumb);
			}

			// Xóa trong database
			$rs = $this->delete('cat',array('Cat_ID' => $_GET['delete']));
			if($rs==1){
				header("location:cat_list.php");
			}
		}
	}
	
}
?>