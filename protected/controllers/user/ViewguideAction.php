<?php
class ViewguideAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_page();
       $this->controller->tag="myascheduler";
        return true;
    }
   protected function do_action(){
   	$id=$_REQUEST['id'];
		$model=new Guide();
    $model=empty($id)?$model:$model->with("User")->find("user_id=:user_id",array(':user_id'=>$id)); 
		$this->display('viewguide',array('model'=>$model));
  }
  
}
?>