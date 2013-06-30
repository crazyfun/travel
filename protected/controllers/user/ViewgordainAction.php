<?php
class ViewgordainAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_page();
        $this->controller->tag="gscheduler";
        return true;
    }
   protected function do_action(){
   	$id=$_REQUEST['id'];
		$model=new Ordain();
		$model_name=ucfirst(get_class($model));
    $model=empty($id)?$model:$model->with('User','AgencyDate','OrderUser')->findByPk($id); 
		$this->display('viewgordain',array('model'=>$model));
  }
  
   

}
?>