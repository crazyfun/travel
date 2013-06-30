<?php
class UserController extends Controller
{
	public $tag="user";
	public $breadcrumbs=array();
  public function filters() {
		return array(
			'LoginFilter-notifyurl',
		);
	}
	public function FilterLoginFilter($filterChain) {
		if(Yii::app()->user->isGuest){
			$this->redirect($this->createUrl("/login/login"));
	  }
		$filterChain->run();
	}
 public function actions(){
 	  $controller_path="application.controllers.user.";
		return array(
		  'index'=>$controller_path."IndexAction",
		  'editprofile'=>$controller_path."EditprofileAction",
		  'editemail'=>$controller_path."EditemailAction",
		  'editpassword'=>$controller_path."EditpasswordAction",
		  'invite'=>$controller_path.'InviteAction',
		  'mytops'=>$controller_path.'MytopsAction',
		  'coupon'=>$controller_path.'CouponAction',
		  'scheduler'=>$controller_path."SchedulerAction",
		  'guides'=>$controller_path."GuidesAction",
		  'editguides'=>$controller_path."EditguidesAction",
		  'gscheduler'=>$controller_path."GschedulerAction",
		  'mygscheduler'=>$controller_path."MygschedulerAction",
		  'agency'=>$controller_path."AgencyAction",
		  'editagency'=>$controller_path."EditagencyAction",
		  'ascheduler'=>$controller_path."AschedulerAction",
		  'myascheduler'=>$controller_path."MyaschedulerAction",
		  'applyguides'=>$controller_path."ApplyguidesAction",
		  'applyagency'=>$controller_path."ApplyagencyAction",
		  'applyrestaurant'=>$controller_path."ApplyrestaurantAction",
		  'viewguidedate'=>$controller_path."ViewguidedateAction",
		  'addguidedate'=>$controller_path."AddguidedateAction",
		  'editguidedate'=>$controller_path."EditguidedateAction",
		  'viewordain'=>$controller_path."ViewordainAction",
		  'viewgordain'=>$controller_path."ViewgordainAction",
		  'ordainstatus'=>$controller_path."OrdainstatusAction",
		  'addagencydate'=>$controller_path."AddagencydateAction",
		  'editagencydate'=>$controller_path."EditagencydateAction",
		  'viewagencyordain'=>$controller_path."ViewagencyordainAction",
		  'viewguideordain'=>$controller_path."ViewguideordainAction",
		  'gordainstatus'=>$controller_path."GordainstatusAction",
		  'viewguide'=>$controller_path."ViewguideAction",
		  'restaurant'=>$controller_path.'RestaurantAction',
		  'editrestaurant'=>$controller_path.'EditrestaurantAction',
		  'applystore'=>$controller_path.'ApplystoreAction',
		  'applyvipstore'=>$controller_path.'ApplyvipstoreAction',
		  'mystore'=>$controller_path.'MystoreAction',
		  'storepay'=>$controller_path.'StorepayAction',
		  'editstore'=>$controller_path.'EditstoreAction',
		  'applyvipstore'=>$controller_path.'ApplyvipstoreAction',
	
		  'pay'=>$controller_path.'PayAction',
		  'pay2'=>$controller_path.'Pay2Action',
		  'notifyurl'=>$controller_path.'NotifyurlAction',
		  'returnurl'=>$controller_path.'ReturnurlAction',
		  
		  'tops'=>$controller_path.'TopsAction',
		  'tops2'=>$controller_path.'Tops2Action',
		  'toprules'=>$controller_path.'ToprulesAction',
		  
		  
		  'message'=>$controller_path.'MessageAction',
		  'messageshow'=>$controller_path.'MessageshowAction',
		  	  
		  'setting'=>$controller_path.'SettingAction',
		  
		);
	}
	
	public function f($msg_code){ 
     if($msg_code == CV::SUCCESS){
       $this->set_flash("操作成功",$msg_code);
     }
     if($msg_code == CV::FAIL){
     	 $this->set_flash("操作失败",$msg_code);
     }
      if($msg_code == CV::PAYVALIDATE){
     	 $this->set_flash("您支付的数据错了，请重新支付或联系我们。",CV::FAIL);
     }
     
     if($msg_code == CV::PAYSUCCESS){
     	 $this->set_flash("充值成功",CV::FAIL);
     }
     
     if($msg_code == CV::PAYFAILED){
     	 $this->set_flash("充值失败",CV::FAIL);
     }
     
     
     
   }
}
