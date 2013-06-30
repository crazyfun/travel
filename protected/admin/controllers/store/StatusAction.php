<?php
class StatusAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
		$model=Station::model();
		$id=$_REQUEST['id'];
		$status=$_REQUEST['status'];
		if(!empty($id)){
			  if($status=='2'){
			  	 $user=User::model();
			  	 $station_data=$model->with()->findByPk($id);
			  	 $user_id=$station_data->user_id;
			  	 $user->updateByPk($user_id,array('station_id'=>$id));
			  }else{
			  	 $user=User::model();
			  	 $station_data=$model->with()->findByPk($id);
			  	 $user_id=$station_data->user_id;
			  	 $user->updateByPk($user_id,array('station_id'=>'0'));
			  }
			  $update_datas['status']=$status;
			  $model->update_table_datas($id,$update_datas);
		}
		$this->controller->redirect($this->controller->createUrl("index",array()));
  } 
}
?>
