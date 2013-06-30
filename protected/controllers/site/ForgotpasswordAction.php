<?php
class ForgotpasswordAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_main_page();
         $this->controller->breadcrumbs=array('忘记密码');
        $ip_convert=IpConvert::get();
				$region_session=$ip_convert->init_region();  	 		 	    
				$region_name=$region_session['name'];
        $this->controller->set_seo('找导游网_导游证_导游词_导游资格考试_导游考试_旅游计调_挂靠旅行社','找'.$region_name.'导游，'.$region_name.'导游证，'.$region_name.'导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，挂靠'.$region_name.'旅行社，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，'.$region_name.'旅行社，'.$region_name.'地接社，'.$region_name.'组团社，'.$region_name.'旅游计调','找导游网-"立火"旅游业之家:是全国最大的导游，导游证，导游词，导游资格考试，导游考试，导游报名，英文导游，中文导游，旅游计调，挂靠旅行社，旅行社，组团社，地接社，景点，酒店和旅游资讯等旅游业资源共享平台。并提供网站线上服务和线下电话沟通交流的服务。"立火"旅游业之家愿和所有业内同仁一起共建一个资源共享与合作的平台，让我们的客户能享受更便利、更亲切、更满意的服务。');
        return true;
    }
   protected function do_action(){
  	$model=new User("ForgotPassword");
  	$model_name=get_class($model);
  	if(isset($_POST[$model_name])){
  		$model=!empty($_POST[$model_name]['id'])?$model->findByPk($_POST[$model_name]['id']):$model;
  		$model->setScenario("ForgotPassword");
      $model->attributes=$_POST[$model_name];
			if($model->validate()){
				$model=$model->find("user_login=:user_login",array(':user_login'=>$model->user_login));
				$send_mail=new SendMail();
				$forgot_href=Yii::app()->homeUrl."/site/validatepassword/id/".$model->id."/code/".Util::createSalt($model->user_salt);
			  $send_mail->send_mail(12,$model->user_email,array('user_login'=>$model->user_login,'forgot_href'=>$forgot_href),array());
			  $this->display("send_forgot_password",array('model'=>$model));
		  }else{
			  $this->controller->f(CV::FAIL);
			  $this->display("forgot_password",array('model'=>$model));
		  }
		}else{
	    $this->display("forgot_password",array('model'=>$model));
	  }
  }

}
?>