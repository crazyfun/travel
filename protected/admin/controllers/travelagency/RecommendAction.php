<?php
class RecommendAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
		$model=TravelAgency::model();
		$id=$_REQUEST['id'];
		$recommend=$_REQUEST['recommend'];
		if(!empty($id)){
			  $update_datas['recommend']=$recommend;
			  $model->update_table_datas($id,$update_datas);
		}
		$this->controller->redirect($this->controller->createUrl("index",array()));
  } 
}
?>
