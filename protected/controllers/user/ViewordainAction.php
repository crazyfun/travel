<?php
class ViewordainAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_page();
        $this->controller->tag="gscheduler";
        return true;
    }
   protected function do_action(){
   	$id=$_REQUEST['id'];
		$model=new Ordain();
		$model_name=ucfirst(get_class($model));
    $model=empty($id)?$model:$model->with('OrderUser','AgencyDate')->findByPk($id); 
		$this->display('viewordain',array('model'=>$model));
  }
  
   

}
?>