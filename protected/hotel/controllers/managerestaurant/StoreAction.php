<?php
class StoreAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	 $station_data=$this->controller->station_data;
		 $station_id=$station_data['id'];
		 $station=Station::model();
		 $station_data=$station->findByPk($station_id);
		 $user_id=$station_data->user_id;
		$model=new Station();
    $model=empty($user_id)?$model:$model->with("User")->find("user_id=:user_id",array(':user_id'=>$user_id)); 
		$this->display('store',array('model'=>$model));
  } 
}
?>
