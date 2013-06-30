<?php
class AddtypeAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
    $model=new ExpenditureType();
  	$model_name=get_class($model);
  	$add_flag=false;
  	if(isset($_POST[$model_name])){
  		$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
      $model->attributes=$_POST[$model_name];
			if($model->validate()){
				$station_data=$this->controller->station_data;
		    $station_id=$station_data['id'];
		    $model->station_id=$station_id;
			  $model->insert_datas();
			  $add_flag=true;
			  $this->controller->f(CV::SUCCESS_ADMIN_OPERATE);
		  }else{
			  $this->controller->f(CV::FAILED_ADMIN_OPERATE);
		  }
		}else{
			$id=$_REQUEST['id'];
			$model=!empty($id)?$model->get_table_datas($id,array()):$model;
		}
		$this->display('add_type',array('model'=>$model,'add_flag'=>$add_flag));
  } 
}
?>
