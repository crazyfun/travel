<?php
class StatusAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
		$model=Invoice::model();
		$id=$_REQUEST['id'];
		if(!empty($id)){
			  $update_datas['status']='2';
			  $update_datas['shenhe_time']=time();
			  $update_datas['shenhe_id']=Yii::app()->user->id;
			  $model->update_table_datas($id,$update_datas);
		}
		$this->controller->redirect($this->controller->createUrl("index",array()));
  } 
}
?>
