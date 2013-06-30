<?php
class MainController extends AController
{
	public function filters() {
		return array(
		  'accessControl + import', // perform access control for CRUD operations
		);
	}
	public function actions()
	{
		$base_path="application.hotel.controllers.main";
		return array(
		 'message'=>$base_path.'.MessageAction',
		 'dijieshe'=>$base_path.'.DijiesheAction',
		 'line'=>$base_path.".LineAction",
		 'delete'=>$base_path.'.DeleteAction',
		 'permissiond'=>$base_path.'.PermissiondAction',
		 'crop'=>$base_path.".CropAction",
		 'tcustom'=>$base_path.".TcustomAction",
		 'ccustom'=>$base_path.".CcustomAction",
		 'import'=>$base_path.".ImportAction",
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
