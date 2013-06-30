<?php
class MytopsAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="mytops";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),"我的置顶");
        $this->controller->set_seo('我的置顶','','');
        return true;
    }
   protected function do_action(){
   	  $user_id=Yii::app()->user->id;
   	  $model=Tops::model();
   	  $conditions=array();
	 		$params=array();
	 		$page_params=array();
	 		
	 		
	 				  //组合搜索条件
		$status=$_REQUEST['status'];
		if(!empty($status)){
		   array_push($conditions,"t.status = :status");
		   $params[':status']=$status;
		   $page_params['status']=$status;
		}
		
		
			  //组合搜索条件
		$start_time=$_REQUEST['start_time'];
		if(!empty($start_time)){
		   array_push($conditions,"t.start_date>='$start_time'");
		   $page_params['start_time']=$start_time;
		}
		
		
				  //组合搜索条件
		$end_time=$_REQUEST['end_time'];
		if(!empty($end_time)){
		   array_push($conditions,"t.start_date<='$end_time'");
		   $page_params['end_time']=$end_time;
		}
		
		
		
	 	 	$conditions[]=" user_id=:user_id ";
	 	 	$params[':user_id']=$user_id;
	 	 	$page_params['user_id']=$user_id;
			 //定义排序类
		 $sort=new CSort();
  	 $sort->attributes=array();
  	 $sort->defaultOrder="t.create_time DESC";
  	 $sort->params=$page_params;
  	 //生成ActiveDataProvider对象
	 	$criteria=new CDbCriteria;
	 	$dataProvider=new CActiveDataProvider($model, array(
			'criteria'=>array(
			'condition'=>implode(' AND ',$conditions),
			'params'=>$params,
			'with'=>array("User","ConfigValues"),
			),
			'pagination'=>array(
			'pageSize' => '20',
			'params' => $page_params,
			),
			'sort'=>$sort,
	 	));
	 
	 
			$this->display("mytops",array('model'=>$model,'dataProvider'=>$dataProvider,'page_params'=>$page_params));
  }

}
?>