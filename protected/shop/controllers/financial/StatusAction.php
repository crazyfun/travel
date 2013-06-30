<?php
class StatusAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	$relation_id=$_REQUEST['relation_id'];
    $model=new DijiesheJiesuan();
  	$model_name=get_class($model);
  	if(isset($_POST[$model_name])){
  		$order=new Order();
  		$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
  		unset($_POST[$model_name]['order_line']);
  		unset($_POST[$model_name]['dijieshe_name']);
  		unset($_POST[$model_name]['total_jiesuan']);
      $model->attributes=$_POST[$model_name];
			if($model->validate()){
				$station_data=$this->controller->station_data;
		    $station_id=$station_data['id'];
		    $model->station_id=$station_id;
			  if($model->insert_datas()){
			  	 $need_settle=$order->get_need_settle($model->order_id);
			  	 $already_settle=$model->get_settle_by_order($model->order_id);
			  	 $diff_settle=$need_settle-$already_settle;
			  	 if($diff_settle > 0){
			  	    $order->updateByPk($model->order_id,array('status'=>'3'));	
			  	 }else{
			  	 	  $order->updateByPk($model->order_id,array('status'=>'2'));
			  	 }
			  	
			  }
			  $this->controller->f(CV::SUCCESS_ADMIN_OPERATE);
		  }else{
			  $this->controller->f(CV::FAILED_ADMIN_OPERATE);
		  }
		  $relation_id=$model->order_id;
		  $order_data=$order->with("Dijieshe")->findByPk($relation_id);
		  
		}else{
			$id=$_REQUEST['id'];
			$model=!empty($id)?$model->get_table_datas($id,array()):$model;
			$order=new Order();
			$order_data=$order->with("Dijieshe")->findByPk($relation_id);
			$model->order_id=$order_data->id;
			$model->order_type=$order_data->order_type;
			$model->dijieshe_id=$order_data->dijieshe;
		}
		$this->display('status',array('model'=>$model,'order_data'=>$order_data));
  } 
}
?>
