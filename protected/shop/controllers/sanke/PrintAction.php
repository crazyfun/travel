<?php
class PrintAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_print_page();
     return true;
  }
  protected function do_action(){	
  	$model=new Order();
  	$id=$_REQUEST['id'];
  	$model=new $model();
		$model=!empty($id)?$model->get_table_datas($id,array()):$model;
		$this->display('print',array('model'=>$model));
  } 
}
?>
