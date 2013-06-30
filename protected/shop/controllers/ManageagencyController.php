<?php
class ManageagencyController extends AController
{

  public function filters() {
		return array(
		  'accessControl', // perform access control for CRUD operations
		);
	}
	public function actions(){
	
		$controller_path="application.shop.controllers.manageagency.";
		return array(
		  'index'=>$controller_path.'IndexAction',
		  'edit'=>$controller_path.'EditAction',
		  'store'=>$controller_path.'StoreAction',
		  'storeedit'=>$controller_path.'StoreeditAction',
		  'guide'=>$controller_path.'GuideAction',
		  'addscheduler'=>$controller_path.'AddschedulerAction',
		  'editscheduler'=>$controller_path.'EditschedulerAction',
		  'ordainstatus'=>$controller_path.'OrdainstatusAction',
		  'editscheduler'=>$controller_path.'EditschedulerAction',
		  'viewguide'=>$controller_path.'ViewguideAction',
		  'ordain'=>$controller_path.'OrdainAction',
		);
	}
	public function f($msg_code){ 
     if($msg_code == CV::SUCCESS_ADMIN_OPERATE){
       $this->sf("操作成功");
     }
     if($msg_code == CV::FAILED_ADMIN_OPERATE){
     	 $this->ff("操作失败");
     }
     if($msg_code == CV::ERROR_ADMIN_DATABASE){
     	 $this->ff("操作数据库错误");
     }
  }
}
