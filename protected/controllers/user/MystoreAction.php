<?php
class MystoreAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="mystore";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'我的商铺');
        $this->controller->set_seo('我的商铺','','');
        return true;
    }
   protected function do_action(){
		$user_id=Yii::app()->user->id;
		$model=new Station();
    $model=empty($user_id)?$model:$model->with("User")->find("user_id=:user_id",array(':user_id'=>$user_id)); 
		$this->display('mystore',array('model'=>$model));
  }
  
   

}
?>