<?php

class LoginController extends Controller
{
	public $tag="login";
	public $breadcrumbs=array();
	 public function filters() {
		return array(
			//'LoginFilter',
		);
	}
	
	//加载模型的所有内容
	//public function FilterLoginFilter($filterChain) {
	
		//if(!Yii::app()->user->isGuest){
			//$this->redirect($this->createUrl("/site/index"));
		//}
		//$filterChain->run();
	//}
	public function actionIndex()
	{ 
		    $this->breadcrumbs=array('在线登录');
         $ip_convert=IpConvert::get();
	 		   $region_session=$ip_convert->init_region();  	 		 	    
			   $region_name=$region_session['name'];
   		   $this->set_seo('找导游网_导游证_导游词_导游资格考试_导游考试_旅游计调_挂靠旅行社','找'.$region_name.'导游，'.$region_name.'导游证，'.$region_name.'导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，挂靠'.$region_name.'旅行社，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，'.$region_name.'旅行社，'.$region_name.'地接社，'.$region_name.'组团社，'.$region_name.'旅游计调','找导游网-"立火"旅游业之家:是全国最大的导游，导游证，导游词，导游资格考试，导游考试，导游报名，英文导游，中文导游，旅游计调，挂靠旅行社，旅行社，组团社，地接社，景点，酒店和旅游资讯等旅游业资源共享平台。并提供网站线上服务和线下电话沟通交流的服务。"立火"旅游业之家愿和所有业内同仁一起共建一个资源共享与合作的平台，让我们的客户能享受更便利、更亲切、更满意的服务。');
		    Util::reset_vars();
		    require_once('config.inc.php');
  	    require_once('uc_client/client.php');
		    $ts = time();
	      $model=new User('Login');
	      $model_name=ucfirst(get_class($model));
	      $model_errors="";
        if(isset($_POST[$model_name])){
            $model->attributes=$_POST[$model_name];
            $ucenter_class=UcenterClass::get();
            $uc_result=$ucenter_class->register_ucenter_user($_POST[$model_name]['user_login'],$_POST[$model_name]['user_password']);
            if($uc_result<=0){
						  if($uc_result == -1) {
							   $model->addError('user_login','用户名不存在');
              } elseif($uc_result == -2) {
	               $model->addError('user_password','密码不正确');
              } else {
	               $model->addError('user_login','登录错误');
              }
					  }
					 $get_errors=$model->getErrors();
           if(empty($get_errors)&&$model->validate()&&$model->login()){
					      if($uc_result > 0) {
				          $ucsynlogin = uc_user_synlogin($uc_result);
				        }
				        
				        $this->render('loginsuccess',array('ucsynlogin'=>$ucsynlogin));
				        exit();
            }else{
            	$errors=$model->getErrors();
            	foreach($errors as $key => $value){
            		foreach($value as $key1 => $value1){
            			$model_errors.="&nbsp;&nbsp;".$value1;
            		}
            	}
            	
            }
        }
       
  	    $this->render("login",array('model'=>$model,'ts'=>$ts,'model_errors'=>$model_errors));
	}
	
	
	public function actionPoplogin()
	{ 
		    $this->breadcrumbs=array('在线登录');
       $ip_convert=IpConvert::get();
	 		 $region_session=$ip_convert->init_region();  	 		 	    
			 $region_name=$region_session['name'];
   		 $this->set_seo('在线登录','','');
		    $this->layout="none";
		    Util::reset_vars();
		    require_once('config.inc.php');
  	    require_once('uc_client/client.php');
		    $ts = time();
	      $model=new User('Login');
	      $model_name=ucfirst(get_class($model));
        if(isset($_POST[$model_name])){
            $model->attributes=$_POST[$model_name];
            $ucenter_class=UcenterClass::get();
            $uc_result=$ucenter_class->register_ucenter_user($_POST[$model_name]['user_login'],$_POST[$model_name]['user_password']);
            if($uc_result<=0){
						  if($uc_result == -1) {
							   $model->addError('user_login','用户名不存在');
              } elseif($uc_result == -2) {
	               $model->addError('user_password','密码不正确');
              } else {
	               $model->addError('user_login','登录错误');
              }
					  }
					 $get_errors=$model->getErrors();
           if(empty($get_errors)&&$model->validate()&&$model->login()){
					      if($uc_result > 0) {
				          $ucsynlogin = uc_user_synlogin($uc_result);
				        }
				        $this->render('poploginsuccess',array('ucsynlogin'=>$ucsynlogin));
				        exit();
            }else{
            	
            	$errors=$model->getErrors();
            	foreach($errors as $key => $value){
            		foreach($value as $key1 => $value1){
            			$model_errors.="&nbsp;&nbsp;".$value1;
            		}
            	}
            }
        }
       
  	    $this->render("poplogin",array('model'=>$model,'ts'=>$ts,'model_errors'=>$model_errors));
	}
	
	public function actionHomelogin(){
		    $this->breadcrumbs=array('在线登录');
        $ip_convert=IpConvert::get();
	 		 $region_session=$ip_convert->init_region();  	 		 	    
			 $region_name=$region_session['name'];
   		 $this->set_seo('找导游网_导游证_导游词_导游资格考试_导游考试_旅游计调_挂靠旅行社','找'.$region_name.'导游，'.$region_name.'导游证，'.$region_name.'导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，挂靠'.$region_name.'旅行社，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，'.$region_name.'旅行社，'.$region_name.'地接社，'.$region_name.'组团社，'.$region_name.'旅游计调','找导游网-"立火"旅游业之家:是全国最大的导游，导游证，导游词，导游资格考试，导游考试，导游报名，英文导游，中文导游，旅游计调，挂靠旅行社，旅行社，组团社，地接社，景点，酒店和旅游资讯等旅游业资源共享平台。并提供网站线上服务和线下电话沟通交流的服务。"立火"旅游业之家愿和所有业内同仁一起共建一个资源共享与合作的平台，让我们的客户能享受更便利、更亲切、更满意的服务。');
		    Util::reset_vars();
		    require_once('config.inc.php');
  	    require_once('uc_client/client.php');
		    $ts = time();
	      $model=new User('Homelogin');
	      $model_name=ucfirst(get_class($model));
        if(isset($_POST['login'])){
            $model->user_login=$_POST['user_login'];
            $model->user_password=$_POST['user_password'];
            $model->rememberme=$_POST['rememberme'];
            $ucenter_class=UcenterClass::get();
            $uc_result=$ucenter_class->register_ucenter_user($_POST['user_login'],$_POST['user_password']);
            if($uc_result<=0){
						  if($uc_result == -1) {
							   $model->addError('user_login','用户名不存在');
              } elseif($uc_result == -2) {
	               $model->addError('user_password','密码不正确');
              } else {
	               $model->addError('user_login','登录错误');
              }
					  }
					 $get_errors=$model->getErrors();
           if(empty($get_errors)&&$model->validate()&&$model->login()){
					      if($uc_result > 0) {
				          $ucsynlogin = uc_user_synlogin($uc_result);
				        }
				        $this->render('homeloginsuccess',array('ucsynlogin'=>$ucsynlogin));
				        exit();
            }else{
            	$errors=$model->getErrors();
            	foreach($errors as $key => $value){
            		foreach($value as $key1 => $value1){
            			$model_errors.="&nbsp;&nbsp;".$value1;
            		}
            	}
            	$this->render("login",array('model'=>$model,'ts'=>$ts,'model_errors'=>$model_errors));
            }
        }
  	    
	}
	
	
	public function actionLogout(){
		 $this->breadcrumbs=array('退出');
      $this->set_seo('退出','','');
		 require_once('config.inc.php');
  	 require_once('uc_client/client.php');
     Yii::app()->user->logout();
     $ucsynlogout = uc_user_synlogout();
     $this->render('loginoutsuccess',array('ucsynlogout'=>$ucsynlogout));
		
	}
		public function f($msg_code){ 
	 	
     if($msg_code == CV::SUCCESS){
       $this->set_flash("操作成功",$msg_code);
     }
     if($msg_code == CV::FAIL){
     	 $this->set_flash("操作失败",$msg_code);
     }
     
   }
	

}