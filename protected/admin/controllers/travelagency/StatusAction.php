<?php
class StatusAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
		$model=TravelAgency::model();
		$id=$_REQUEST['id'];
		$status=$_REQUEST['status'];
		if(!empty($id)){
			  $update_datas['status']=$status;
			  $model->update_table_datas($id,$update_datas);
		}
		$this->controller->redirect($this->controller->createUrl("index",array()));
  } 
}
?>
