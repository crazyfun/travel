<?php
class StatusAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	$relation_id=$_REQUEST['relation_id'];
		$model=Car::model();
		$id=$_REQUEST['id'];
		if(!empty($id)){
			  $update_datas['status']='2';
			  $model->update_table_datas($id,$update_datas);
		}
		$this->controller->redirect($this->controller->createUrl("index",array('relation_id'=>$relation_id)));
  } 
}
?>
