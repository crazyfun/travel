<?php
class MessageshowAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->user_tag="message";
        $this->controller->tag="message";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'站内信');
        $this->controller->set_seo('站内信息','','');
        return true;
    }
   protected function do_action(){
   	$cssPath=$this->controller->get_css_path();
    $jsPath=$this->controller->get_js_path();
    require_once('config.inc.php');
  	require_once('uc_client/client.php');
   	$user_id=Yii::app()->user->id;
   	$id=$_REQUEST['id'];
   	$type=$_REQUEST['type'];
   	if(empty($id)){
   		$this->controller->redirect($this->controller->createUrl("error/error404"));
   	}
   	$messages=Messages::model();
   	$message_data=$messages->findByPk($id);
   	$messages->updateByPk($id,array('status'=>'2'));
    $this->display('message_show',array('model'=>$model,'message_data'=>$message_data,'type'=>$type,'user_id'=>$user_id,'cssPath'=>$cssPath,'jsPath'=>$jsPath));
  }

}
?>