<?php
class AgencyAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="agency";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'旅行社信息');
        $this->controller->set_seo('旅行社信息','','');
        return true;
    }
   protected function do_action(){
   	$user_id=Yii::app()->user->id;
		$model=new TravelAgency();
    $model=empty($user_id)?$model:$model->with("User")->find("user_id=:user_id",array(':user_id'=>$user_id)); 
		$this->display('agency',array('model'=>$model));
  }
  
   

}
?>