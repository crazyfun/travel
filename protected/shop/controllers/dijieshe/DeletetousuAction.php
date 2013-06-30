<?php
class DeletetousuAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	$relation_id=$_REQUEST['relation_id'];
		$model=Tousu::model();
		$id=$_REQUEST['id'];
		if(!empty($id)){
			if(is_array($id)){
				foreach($id as $key => $value){
					$model->delete_table_datas($value);
				}
			}else{
			  $model->delete_table_datas($id);
			}
		}
		$this->controller->redirect($this->controller->createUrl("tousu",array('relation_id'=>$relation_id)));
  } 
}
?>
