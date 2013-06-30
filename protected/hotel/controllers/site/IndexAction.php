<?php
class IndexAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_main_page();
        $station_data=$this->controller->station_data;
        $this->controller->pageTitle=$station_data['company']."后台管理";
        return true;
    }
   protected function do_action(){
     if(Yii::app()->user->isGuest){
			$this->controller->redirect(array("site/login"));
		 }else {
		 	
			$this->display("index",array());
		}	
  }

}
?>