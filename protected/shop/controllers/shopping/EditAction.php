<?php
class EditAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
    $model=new Shopping();
  	$model_name=get_class($model);
  	if(isset($_POST[$model_name])){
  		$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
      $model->attributes=$_POST[$model_name];
			if($model->validate()){
				$station_data=$this->controller->station_data;
		    $station_id=$station_data['id'];
		    $model->station_id=$station_id;
			  $model->insert_datas();
			  $this->controller->f(CV::SUCCESS_ADMIN_OPERATE);
		  }else{
			  $this->controller->f(CV::FAILED_ADMIN_OPERATE);
		  }
		}else{
			$id=$_REQUEST['id'];
			if(empty($id)){
				$this->controller->redirect($this->controller->createUrl("error/error403"));
			}
			$model=!empty($id)?$model->get_table_datas($id,array()):$model;
			$station_data=$this->controller->station_data;
  		if($model->station_id!=$station_data['id']){
  			$this->controller->redirect($this->controller->createUrl("error/error403"));
  		}
		}
		$this->display('add',array('model'=>$model));
  } 
}
?>
