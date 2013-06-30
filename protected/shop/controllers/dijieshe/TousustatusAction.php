<?php
class TousustatusAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	$relation_id=$_REQUEST['relation_id'];
  	$model=new Tousu();
  	$model_name=get_class($model);
  	if(isset($_POST[$model_name])){
  		$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
      $model->attributes=$_POST[$model_name];
      
      $model->operate_id=Yii::app()->user->id;
      $model->operate_time=time();
      $model->status=2;
			if($model->validate()){
				
			  $model->insert_datas();
			  $relation_id=$model->relation_id;
			  $this->controller->f(CV::SUCCESS_ADMIN_OPERATE);
		  }else{
			  $this->controller->f(CV::FAILED_ADMIN_OPERATE);
		  }
		}else{
			$id=$_REQUEST['id'];
			$model=!empty($id)?$model->get_table_datas($id,array()):$model;
		}
		$this->display('tousustatus',array('model'=>$model,'relation_id'=>$relation_id));
  } 
}
?>
