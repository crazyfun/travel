<?php
class TopAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
		$model=Station::model();
		$id=$_REQUEST['id'];
		$top=$_REQUEST['top'];
		if(!empty($id)){
			  $update_datas['is_top']=$top;
			  $model->update_table_datas($id,$update_datas);
		}
		$this->controller->redirect($this->controller->createUrl("index",array()));
  } 
}
?>
