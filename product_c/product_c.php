<?php require_once('lib/atz.php');?>
<?php 
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
		if(isset($_POST) && !empty($_POST)){
			
			$post = array(
				'Rate_IP' => '',
				'Rate_Point' => $_POST['value'],
				'Rate_Product' => $_POST['id']
			);
			
				
			if(empty($errors)){

				// Insert
				// $post['Rate_Created'] = time();

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
}
?>