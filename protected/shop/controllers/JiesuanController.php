<?php
class JiesuanController extends AController
{
  public function filters() {
		return array(
		  'accessControl', // perform access control for CRUD operations
		);
	}
	public function actions()
	{
		$controller_path="application.shop.controllers.jiesuan.";
		return array(
		  'index'=>$controller_path.'IndexAction',
		  'complex'=>$controller_path.'ComplexAction',
		  'sell'=>$controller_path.'SellAction',
		  'settle'=>$controller_path.'SettleAction',
		  'profit'=>$controller_path.'ProfitAction',
		  'export'=>$controller_path."ExportAction",
		  'import'=>$controller_path."ImportAction",
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
