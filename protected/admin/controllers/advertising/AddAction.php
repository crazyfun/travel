<?php
class AddAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){ 
  	$model=new Advertising();
  	$model_name=get_class($model);
  	if(isset($_POST[$model_name])){
  		$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
  		if(!empty($_POST[$model_name]['region_id']))
  				$region_ids=implode(",",$_POST[$model_name]['region_id']);
		  $model->attributes=$_POST[$model_name];
		  $model->region_id=$region_ids;
			if($model->validate()){
			  $model->insert_datas();
			  $model->region_id=explode(",",$model->region_id);
			  $this->controller->f(CV::SUCCESS_ADMIN_OPERATE);
		  }else{
			  $this->controller->f(CV::FAILED_ADMIN_OPERATE);
		  }
	 }else{
		  $id=$_REQUEST['id'];
		  $model=!empty($id)?$model->get_table_datas($id,array()):$model;
		  $model->region_id=explode(",",$model->region_id);
	 }
	 $this->display('add',array('model'=>$model));
  } 
}
?>
