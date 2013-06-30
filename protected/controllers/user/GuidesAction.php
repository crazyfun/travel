<?php
class GuidesAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="myguides";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'导游信息');
        $this->controller->set_seo('导游信息','','');
        return true;
    }
   protected function do_action(){
		$user_id=Yii::app()->user->id;
		$model=new Guide();
    $model=empty($user_id)?$model:$model->with("User")->find("user_id=:user_id",array(':user_id'=>$user_id)); 
		$this->display('guides',array('model'=>$model));
		
  }

}
?>