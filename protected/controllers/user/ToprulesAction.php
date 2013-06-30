<?php
class ToprulesAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_page();
        $this->controller->tag="";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'置顶条款');
        $this->controller->set_seo('置顶条款','','');
        return true;
    }
   protected function do_action(){
		$sys_config=SysConfig::model();
		$sys_config_value=$sys_config->get_all_syscfg();
		$agreement_value=$sys_config_value['sfc_top_agreement'];
		$this->display('toprules',array('agreement_value'=>$agreement_value));
  }

}
?>