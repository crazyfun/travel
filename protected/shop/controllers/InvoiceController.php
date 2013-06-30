<?php
class InvoiceController extends AController
{
  public function filters() {
		return array(
		  'accessControl', // perform access control for CRUD operations
		);
	}
	public function actions(){
	
		$controller_path="application.shop.controllers.invoice.";
		return array(
		  'index'=>$controller_path.'IndexAction',
		  'add'=>$controller_path.'AddAction',
		  'edit'=>$controller_path.'EditAction',
		  'delete'=>$controller_path.'DeleteAction',
		  'view'=>$controller_path.'ViewAction',
		  'myview'=>$controller_path.'MyviewAction',
		  'export'=>$controller_path."ExportAction",
		  'status'=>$controller_path."StatusAction",
		  'myinvoice'=>$controller_path.'MyinvoiceAction',
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
