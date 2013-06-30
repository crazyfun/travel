<?php
class ViewAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	$model=$_REQUEST['model'];
  	$id=$_REQUEST['id'];
  	$model=new $model();
		$model=!empty($id)?($model->with("Dijieshe","User")->find(array('condition'=>'t.id=:id','params'=>array(':id'=>$id)))):$model;
		$this->display('view',array('model'=>$model));
  } 
}
?>
