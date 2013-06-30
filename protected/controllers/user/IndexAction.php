<?php
class IndexAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="index";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'个人资料');
        $this->controller->set_seo('个人资料','','');
        return true;
    }
   protected function do_action(){
   	  require_once('config.inc.php');
  	  require_once('uc_client/client.php');
   	  $user_id=Yii::app()->user->id;
   	  $model=User::model();
   	  $model=empty($user_id)?$model:$model->findByPk($user_id);
			$this->display("index",array('model'=>$model));
  }

}
?>