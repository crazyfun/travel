<?php

class RegisteController extends Controller
{
	public $tag="registe";
	public $breadcrumbs=array();
	public function actionIndex()
	{
		$this->breadcrumbs=array('在线注册');
    $ip_convert=IpConvert::get();
	 	$region_session=$ip_convert->init_region();  	 		 	    
		$region_name=$region_session['name'];
   	$this->set_seo('找导游网_导游证_导游词_导游资格考试_导游考试_旅游计调_挂靠旅行社','找'.$region_name.'导游，'.$region_name.'导游证，'.$region_name.'导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，挂靠'.$region_name.'旅行社，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，'.$region_name.'旅行社，'.$region_name.'地接社，'.$region_name.'组团社，'.$region_name.'旅游计调','找导游网-"立火"旅游业之家:是全国最大的导游，导游证，导游词，导游资格考试，导游考试，导游报名，英文导游，中文导游，旅游计调，挂靠旅行社，旅行社，组团社，地接社，景点，酒店和旅游资讯等旅游业资源共享平台。并提供网站线上服务和线下电话沟通交流的服务。"立火"旅游业之家愿和所有业内同仁一起共建一个资源共享与合作的平台，让我们的客户能享受更便利、更亲切、更满意的服务。');
		Util::reset_vars();
		require_once('config.inc.php');
  	require_once('uc_client/client.php');
		$model=new User("WebRegiste");
		$model_name=ucfirst(get_class($model));
		if($_POST[$model_name]){
      $model->attributes=$_POST[$model_name];
      $model->id=null;
		  $model->setIsNewRecord(true);
			if($model->validate()){
				//注册ucenter
				$uid = uc_user_register($_POST[$model_name]['user_login'], $_POST[$model_name]['user_password'], $_POST[$model_name]['user_email']);
		    if($uid <= 0) {
			      if($uid == -1) {
			          	$model->addError('user_login','用户名不合法');
			      } elseif($uid == -2) {
			          	$model->addError('user_login','包含要允许注册的词语');
			      } elseif($uid == -3) {
			          	$model->addError('user_login','用户名已存在');
			      } elseif($uid == -4) {
			          	$model->addError('user_email','用户邮箱格式有误');
			      } elseif($uid == -5) {
			          	$model->addError('user_email','用户邮箱不允许注册');
			      } elseif($uid == -6) {
			          	$model->addError('user_email','用户邮箱已存在');
			      } 
		    }
		    $get_errors=$model->getErrors();
		    if(empty($get_errors)){
		    	$salt=Util::randStr(6);
  		    $model->user_salt=$salt;
  		    $user_salt=Util::createSalt($salt);
  		    $model->id=$uid;
  	      $model->user_password=Util::hc($model->user_password,$user_salt);
  	      $model->var_user_password=$model->user_password;   
  	      $invite_code=Util::randStr(6);
  	      $invite_code=Util::createSalt($invite_code);
  	      $model->invite_code=$invite_code;
		    	$result=$model->insert_datas();
		    	if($result){
		    		$user_type=UserType::model();
		    		$user_type->id=null;
		    		$user_type->setIsNewRecord(true);
		    		$user_type->user_id=$model->id;
		    		$user_type->type='1';
		    		$user_type->insert_datas();
		    		$invite_code=Yii::app()->session->get("invite_code");
		    		if(!empty($invite_code)){
		    			$invite=Invite::model();
		    			$remote_ip=Util::getIp();
		    			$invite_user_data=$model->find(array('select'=>'t.id','condition'=>'invite_code=:invite_code','params'=>array(':invite_code'=>$invite_code)));
		    			$i_user_id=$invite_user_data->id;
		    			if(!empty($i_user_id)){
		    			  $invite_data=$invite->find(array('select'=>'t.invite_id','condition'=>'user_id=:user_id AND invite_ip=:invite_ip','params'=>array(':user_id'=>$i_user_id,'invite_ip'=>$remote_ip)));
		    			  if(empty($invite_data)){
		    			  	$invite->setIsNewRecord(true);
		    			  	$invite->user_id=$invite_user_data->id;
		    			  	$invite->invite_id=$model->id;
		    			  	$invite->invite_ip=$remote_ip;
		    			  	$invite->validate();
		    			  	$invite_result=$invite->insert_datas();
		    			  	if($invite_result){
		    			  		$sys_config=SysConfig::model();
		    			  		$all_sys_config=$sys_config->get_all_syscfg();
		    			  		$sfc_invite_coupon=$all_sys_config['sfc_invite_coupon'];
		    			  		$consume_temp=new ConsumeTemp();
		    			  		
		    			  		$consume_temp->consume(2,$i_user_id,'1',$sfc_invite_coupon,array('user_login'=>$model->user_login,'value'=>$sfc_invite_coupon));
		    			  	}
		    			  }
		    			}
		    		}
		    		if($uid > 0) {
				          $ucsynlogin = uc_user_synlogin($uid);
				     }
				    $model->user_password=$_POST[$model_name]['user_password'];
				    $model->login();
		    		$uc_avatarflash = uc_avatar($model->id);
		    		
		    		$sys_config=SysConfig::model();
						$all_syscfg_values=$sys_config->get_all_syscfg();
						$sfc_notice_mail=$all_syscfg_values['sfc_notice_mail'];
		    		$send_mail=new SendMail();
		    		$send_mail->send_mail(28,$sfc_notice_mail,array('user_login'=>$model->user_login),array());

		    		
		    		$this->render("registe2",array('model'=>$model,'uc_avatarflash'=>$uc_avatarflash,'ucsynlogin'=>$ucsynlogin));
		    		exit();
		    	}
		    }
		  }else{
			  //$this->f(CV::FAIL);
		  }
		}else{
        $invite_code=$_REQUEST['invite_code'];
        Yii::app()->session->add('invite_code',$invite_code);
        
		}
		$this->render('registe',array('model'=>$model));
	}
	
	public function actionRegiste2(){
		$this->breadcrumbs=array('在线注册');
    $ip_convert=IpConvert::get();
	 	$region_session=$ip_convert->init_region();  	 		 	    
		$region_name=$region_session['name'];
   	$this->set_seo('找导游网_导游证_导游词_导游资格考试_导游考试_旅游计调_挂靠旅行社','找'.$region_name.'导游，'.$region_name.'导游证，'.$region_name.'导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，挂靠'.$region_name.'旅行社，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，'.$region_name.'旅行社，'.$region_name.'地接社，'.$region_name.'组团社，'.$region_name.'旅游计调','找导游网-"立火"旅游业之家:是全国最大的导游，导游证，导游词，导游资格考试，导游考试，导游报名，英文导游，中文导游，旅游计调，挂靠旅行社，旅行社，组团社，地接社，景点，酒店和旅游资讯等旅游业资源共享平台。并提供网站线上服务和线下电话沟通交流的服务。"立火"旅游业之家愿和所有业内同仁一起共建一个资源共享与合作的平台，让我们的客户能享受更便利、更亲切、更满意的服务。');
		Util::reset_vars();
		require_once('config.inc.php');
  	require_once('uc_client/client.php');

		$model=new User("WebRegiste2");
		$model_name=ucfirst(get_class($model));
		if($_POST[$model_name]){
			$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
			$model->setScenario("WebRegiste2");
      $model->attributes=$_POST[$model_name];
			if($model->validate()){
		    	$result=$model->insert_datas();
		    	if($result){
		    		$uc_avatarflash = uc_avatar($model->id);
		    		$this->redirect($this->createUrl("registe/registe3",array('uid'=>$model->id)));
		    	}
		  }else{
		  	$uc_avatarflash = uc_avatar($model->id);
			
		  }
		}else{
       $model=$model->findByPk($uid);
       $uc_avatarflash = uc_avatar($model->id);
		}
		$this->render('registe2',array('model'=>$model,'uc_avatarflash'=>$uc_avatarflash));
	}
	
	public function actionRegiste3(){
		$this->breadcrumbs=array('在线注册');
     $ip_convert=IpConvert::get();
	 	$region_session=$ip_convert->init_region();  	 		 	    
		$region_name=$region_session['name'];
   	$this->set_seo('找导游网_导游证_导游词_导游资格考试_导游考试_旅游计调_挂靠旅行社','找'.$region_name.'导游，'.$region_name.'导游证，'.$region_name.'导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，挂靠'.$region_name.'旅行社，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，'.$region_name.'旅行社，'.$region_name.'地接社，'.$region_name.'组团社，'.$region_name.'旅游计调','找导游网-"立火"旅游业之家:是全国最大的导游，导游证，导游词，导游资格考试，导游考试，导游报名，英文导游，中文导游，旅游计调，挂靠旅行社，旅行社，组团社，地接社，景点，酒店和旅游资讯等旅游业资源共享平台。并提供网站线上服务和线下电话沟通交流的服务。"立火"旅游业之家愿和所有业内同仁一起共建一个资源共享与合作的平台，让我们的客户能享受更便利、更亲切、更满意的服务。');
		$this->render('registe3',array('model'=>$model));
	}
	
	
	
	public function actionValidate(){
		if(Yii::app()->request->isAjaxRequest){
			Util::reset_vars();
			$action=$_REQUEST['action'];
			$value=$_REQUEST['value'];
			$user=User::model();
			switch($action){
				case 'userlogin':
				    if(empty($value)){
				    	echo Util::combo_ajax_message("f",array(),"用户名不能为空");
				    }else{
				    $user->user_login=$value;
				    $user->exist_user_login();
				    $user_login_error=$user->getError("user_login");
				    if($user_login_error){
				    	echo Util::combo_ajax_message("f",array(),$user->getError("user_login"));
				    }else{
				    	echo Util::combo_ajax_message("s",array(),"用户名正确");
				    }
				  }
						break;
				case 'useremial':
				    if(empty($value)){
				    	echo Util::combo_ajax_message("f",array(),"邮箱不能为空");
				    }else{
				    if(!Util::ie($value)){
				    	echo Util::combo_ajax_message("f",array(),"邮箱格式错误");
				    }else{
				    $user->user_email=$value;
				    $user->exist_user_email();
				    $user_email_error=$user->getError("user_email");
				    if($user_email_error){
				    	echo Util::combo_ajax_message("f",array(),$user->getError("user_email"));
				    }else{
				    	echo Util::combo_ajax_message("s",array(),"用户邮箱正确");
				    }
				   }
				   }
						break;
				default:
						break;
			}
			return true;
		}else{
			
			return false;
		}
		
	}
	public function actionAgreement(){
		$this->layout="none";
		Util::reset_vars();
		$sys_config=SysConfig::model();
		$sys_config_value=$sys_config->get_all_syscfg();
		$agreement_value=$sys_config_value['sfc_user_agreement'];
		$this->render('agreement',array('agreement_value'=>$agreement_value));
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