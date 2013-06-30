<?php
class HelpCategory extends CWidget
{
    public function run(){
    	 $category=Information::model();
    	 $category_datas=$category->get_whelp_categorys();
       $this->render('help_category',array('model'=>$category,'category_datas'=>$category_datas));
    }
  
}
