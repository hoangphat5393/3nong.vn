<?php 
class module_slide_controller extends atz{

    // Select Cat List
    public function get_slides(){
        $slides = $this->select('slide',array('Slide_Show'=>1), array('Slide_Order'=>'ASC', 'Slide_Title_vi'=>'ASC'));
        return $slides;
    }

    // Select Cat List
    public function get_product_cats(){
        
        $sql = "SELECT  * 
                FROM    `cat` 
                where   `Cat_Type`='product' AND `Cat_Parent`=0 AND `Cat_Status`=1 AND FIND_IN_SET('main_menu',`Cat_Show`)
                ORDER BY `Cat_Order` ASC, `Cat_Name_vi` ASC";

        $parent_cats = $this->mysql_query($sql);
            
        if(!empty($parent_cats)){
            foreach ($parent_cats as $k => $v) {

                $sql = "SELECT  * 
                        FROM    `cat` 
                        where   `Cat_Parent`=".$v['Cat_ID']." AND `Cat_Status`=1 AND FIND_IN_SET('main_menu',`Cat_Show`)
                        ORDER BY `Cat_Order` ASC, `Cat_Name_vi` ASC";
                        
                $parent_cats[$k]['Cat_Child'] = array();
                $parent_cats[$k]['Cat_Child'] = $this->mysql_query($sql);
                
                if(!empty($parent_cats[$k]['Cat_Child'])){
                    foreach ($parent_cats[$k]['Cat_Child'] as $k1 => $v1) {

                        $sql = "SELECT  * 
                                FROM    `cat` 
                                where   `Cat_Parent`=".$v1['Cat_ID']." AND `Cat_Status`=1 AND FIND_IN_SET('main_menu',`Cat_Show`)
                                ORDER BY `Cat_Order` ASC, `Cat_Name_vi` ASC";

                        $parent_cats[$k]['Cat_Child'][$k1]['Cat_Child'] = array();
                        $parent_cats[$k]['Cat_Child'][$k1]['Cat_Child'] = $this->mysql_query($sql);
                    }
                }
            }
        }
            
        return $parent_cats;
    }
}
?>