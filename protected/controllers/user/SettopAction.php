<?php
class SettopAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'信息置顶');
        $this->controller->set_seo('信息置顶','','');
        return true;
    }
   protected function do_action(){
	
		$this->display('set_top',array());
		
  }

}
?>