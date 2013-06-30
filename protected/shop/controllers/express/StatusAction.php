<?php
class StatusAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
		$model=Express::model();
		$id=$_REQUEST['id'];
		if(!empty($id)){
			  $update_datas['status']='2';
			  $update_datas['receive_date']=date("Y-m-d");
			  $model->update_table_datas($id,$update_datas);
		}
		$this->controller->redirect($this->controller->createUrl("index",array()));
  } 
}
?>
