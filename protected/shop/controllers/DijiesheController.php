<?php
class DijiesheController extends AController
{
  public function filters() {
		return array(
		  'accessControl', // perform access control for CRUD operations
		);
	}
	public function actions()
	{
		$controller_path="application.shop.controllers.dijieshe.";
		return array(
		  'index'=>$controller_path.'IndexAction',
		  'add'=>$controller_path.'AddAction',
		  'edit'=>$controller_path.'EditAction',
		  'delete'=>$controller_path.'DeleteAction',
		  'view'=>$controller_path.'ViewAction',
		  'tousu'=>$controller_path.'TousuAction',
		  'addtousu'=>$controller_path.'AddtousuAction',
		  'edittousu'=>$controller_path.'EdittousuAction',
		  'deletetousu'=>$controller_path.'DeletetousuAction',
		  'tousustatus'=>$controller_path.'TousustatusAction',
		  'export'=>$controller_path."ExportAction",
		  'import'=>$controller_path."ImportAction",
		  'timport'=>$controller_path."TimportAction",
		  'texport'=>$controller_path."TexportAction",
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
