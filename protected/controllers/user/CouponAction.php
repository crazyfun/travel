<?php
class CouponAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="coupon";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'抵用卷明细');
        $this->controller->set_seo('抵用卷明细','','');
        return true;
    }
   protected function do_action(){
   	  $user_id=Yii::app()->user->id;
   	  $user=User::model();
   	  $user_data=$user->findByPk($user_id);
   	  $model=CouponResume::model();
   	  $conditions=array();
	 		$params=array();
	 		$page_params=array();
	 		
	 		  //组合搜索条件
		$type=$_REQUEST['type'];
		if(!empty($type)){
		   array_push($conditions,"t.type = :type");
		   $params[':type']=$type;
		   $page_params['type']=$type;
		}
		
		
			  //组合搜索条件
		$start_time=$_REQUEST['start_time'];
		if(!empty($start_time)){
		   array_push($conditions,"FROM_UNIXTIME(t.create_time, '%Y-%m')>='$start_time'");
		   $page_params['start_time']=$start_time;
		}
		
		
				  //组合搜索条件
		$end_time=$_REQUEST['end_time'];
		if(!empty($end_time)){
		   array_push($conditions,"FROM_UNIXTIME(t.create_time, '%Y-%m')<='$end_time'");
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
			'with'=>array("User"),
			),
			'pagination'=>array(
			'pageSize' => '20',
			'params' => $page_params,
			),
			'sort'=>$sort,
	 	));
		$this->display("coupon",array('model'=>$model,'dataProvider'=>$dataProvider,'user_data'=>$user_data,'page_params'=>$page_params));
  }

}
?>