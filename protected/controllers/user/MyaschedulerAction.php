<?php
class MyaschedulerAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="myascheduler";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'我的行程');
        $this->controller->set_seo('预定行程','','');
        return true;
    }
   protected function do_action(){
    	$user_id=Yii::app()->user->id;
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
		$this->display('my_ascheduler',array('dataProvider'=>$dataProvider,'page_params'=>$page_params));
  }
  
}
?>