<?php
class SchedulerAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="scheduler";
        return true;
    }
   protected function do_action(){
   	
			$this->display("scheduler",array());
  }

}
?>