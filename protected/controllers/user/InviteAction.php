<?php
class InviteAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="invite";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),"我的邀请");
        $this->controller->set_seo('我的邀请','','');
        return true;
    }
   protected function do_action(){
   	
   	  $user_id=Yii::app()->user->id;
   	  $user=User::model();
   	  $user_data=$user->findByPk($user_id);
   	  $sys_config=SysConfig::model();
		  $all_sys_config=$sys_config->get_all_syscfg();
		  $sfc_invite_coupon=$all_sys_config['sfc_invite_coupon'];
   	  $model=Invite::model();
   	  $conditions=array();
	 		$params=array();
	 		$page_params=array();
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
			'with'=>array("User","Invite"),
			),
			'pagination'=>array(
			'pageSize' => '20',
			'params' => $page_params,
			),
			'sort'=>$sort,
	 	));
	 
	 
			$this->display("invite",array('model'=>$model,'dataProvider'=>$dataProvider,'user_data'=>$user_data,'sfc_invite_coupon'=>$sfc_invite_coupon));
  }

}
?>