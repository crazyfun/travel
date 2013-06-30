<?php
class GuideAction extends BaseAction{
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

   	  $model=Gordain::model();
   	  $conditions=array();
	 		$params=array();
	 		$page_params=array();
	 		$guide_name=$_REQUEST['guide_name'];
	 		if(!empty($guide_name)){
	 			$conditions[]=" OrderUser.real_name LIKE :real_name";
	 			$params[':real_name']="%$guide_name%";
	 			$page_params['guide_name']=$guide_name;
	 		}
	 		
	 		$line=$_REQUEST['line'];
	 		if(!empty($line)){
	 			
	 			$conditions[]="AgencyDate.line LIKE :line";
	 			$params[':line']="%$line%";
	 			$page_params['line']=$line;
	 		}
	 		
	 	$date=$_REQUEST['date'];	
		if(!empty($date)){
		   array_push($conditions,"AgencyDate.start_date<='".$date."' AND AgencyDate.end_date>='".$date."'");
		   $page_params['date']=$date;
		}
	 	 	$conditions[]=" t.user_id=:user_id ";
	 	 	$params[':user_id']=$user_id;
	 	 	$page_params['user_id']=$user_id;
	 	 	$conditions[]=" t.status=:status ";
	 	 	$params[':status']='2';
	 	 	$page_params['status']="2";
			 //定义排序类
		 $sort=new CSort();
  	 $sort->attributes=array();
  	 $sort->defaultOrder="t.operate_time DESC";
  	 $sort->params=$page_params;
  	 //生成ActiveDataProvider对象
	 	$criteria=new CDbCriteria;
	 	$dataProvider=new CActiveDataProvider($model, array(
			'criteria'=>array(
			'condition'=>implode(' AND ',$conditions),
			'params'=>$params,
			'with'=>array("OrderUser","AgencyDate"),
			),
			'pagination'=>array(
			'pageSize' => '20',
			'params' => $page_params,
			),
			'sort'=>$sort,
	 	));
		$this->display('guide',array('dataProvider'=>$dataProvider,'page_params'=>$page_params));
  } 
}
?>
