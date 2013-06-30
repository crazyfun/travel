<?php
class MyviewAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	$model=$_REQUEST['model'];
  	$id=$_REQUEST['id'];
  	$model=new $model();
		$model=!empty($id)?$model->get_table_datas($id,array()):$model;
		$this->display('view',array('model'=>$model));
  } 
}
?>
