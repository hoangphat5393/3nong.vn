<?php require_once('lib/atz.php');?>
<?php 
class article_controller extends atz{

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

	// Lấy thông tin bài viết cố định
	public function get_article(){
		
		$article = array();
		if(!empty($this->id)){
			$article = $this->select('article',array('Article_Show'=>1, 'Article_ID'=>$this->id, 'Article_Show'=>1));

			// Kiểm tra có chuyên mục con hay ko
			if(!empty($article)){
				$article = $article[0];
			}
		}
			
		return $article;
	}

	// Lấy thông tin bài viết liên quan
	public function get_relative_articles($id){
		$articles = array();
		$sql = "SELECT  * 
                FROM    `article` 
                where   `Article_ID`!=$id AND `Article_Show`=1
                ORDER BY `Article_Priority` DESC, `Article_Title_vi` ASC";
        $articles = $this->mysql_query($sql);

		return $articles;
	}

}
?>