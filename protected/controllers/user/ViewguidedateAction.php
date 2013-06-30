<?php
class ViewguidedateAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_page();
        $this->controller->tag="gscheduler";
        return true;
    }
   protected function do_action(){
		$id=$_REQUEST['id'];
		$model=new GuideDate();
		$model_name=ucfirst(get_class($model));
    $model=empty($id)?$model:$model->findByPk($id); 
		$this->display('viewguidedate',array('model'=>$model));
		
  }

}
?>