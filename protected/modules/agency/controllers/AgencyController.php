<?php

class AgencyController extends Controller
{
	public $tag="agency";
	public $breadcrumbs=array();
	public function actionIndex(){
	
	}
	public function actionDetail()
	{
		Util::reset_vars();
		$agency_id=$_REQUEST['id'];
		if(empty($agency_id)){
			$this->redirect("/error/error404");
		}
		$model=new TravelAgency();
    $model=$model->with("User")->findByPk($agency_id); 
    
    $this->breadcrumbs=array('旅行社'=>$this->createUrl("/search/default/index/action/agency"),"旅行社".$model->agency_name);
    $ip_convert=IpConvert::get();
		$region_session=$ip_convert->init_region();  	 		 	    
		$region_name=$region_session['name'];
    $this->set_seo("预定".$region_name."旅行社".$model->agency_name,''.$region_name.'旅行社，'.$region_name.'地接社，'.$region_name.'组团社，'.$region_name.'旅游计调，找'.$region_name.'导游地陪，找'.$region_name.'导游，'.$region_name.'导游证，'.$region_name.'导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，挂靠'.$region_name.'旅行社，'.$region_name.'导游报名','找导游网-"立火"旅游业之家:是全国最大的'.$region_name.'导游，导游证，导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，'.$region_name.'旅游计调，挂靠'.$region_name.'旅行社，'.$region_name.'旅行社，'.$region_name.'组团社，'.$region_name.'地接社，'.$region_name.'景点，'.$region_name.'酒店和旅游资讯等旅游业资源共享平台。并提供网站线上服务和线下电话沟通交流的服务。"立火"旅游业之家愿和所有业内同仁一起共建一个资源共享与合作的平台，让我们的客户能享受更便利、更亲切、更满意的服务。');

    $model->views=$model->views+1;
    $model->save();
    
		$this->render('detail',array('model'=>$model,'agency_id'=>$agency_id));
	}
	
	public function actionOrdain(){
		$this->layout="none";
		Util::reset_vars();
		$user_id=Yii::app()->user->id;
		if(empty($user_id)){
			$this->redirect("/login/login/poplogin");
			exit();
		}
		$agency_id=$_REQUEST['agency_id'];
		$date_id=$_REQUEST['date_id'];
		$user_type=UserType::model();
  	$type=$user_type->get_user_type($user_id);
  	switch($type){
  		case '2':
  		    $guide=new Guide();
  		    $status=$guide->get_guide_status($user_id);
  		    if($status=='1'){
  		    	$this->set_flash("您的导游信息未经审核，请等待审核后再行预定。",CV::TIP);
  		    	$this->render('notguide',array());
  		    }else{
  		    	$model=new AgencyDate();
  		    	$model=$model->findByPk($date_id);
  		      $this->render('ordain',array('model'=>$model,'date_id'=>$date_id,'agency_id'=>$agency_id));
  		    }
  		    break;
  		default:
  		    $this->set_flash("您还未申请导游，请申请为导游后再行预定。",CV::TIP);
  		    $this->render('notguide',array());
  		    break;
  	}
	}
	
	public function ActionDoordain(){
		$this->layout="none";
		Util::reset_vars();
		$date_id=$_REQUEST['date_id'];
		$agency_id=$_REQUEST['agency_id'];
		$travel_agency=TravelAgency::model();
		$agency_data=$travel_agency->findByPk($agency_id);
		$agency_user_id=$agency_data->user_id;
		$ordain=Gordain::model();
		$ordain->user_id=$agency_user_id;
		$ordain->ordain_id=Yii::app()->user->id;
		$ordain->comment=$_POST['comment'];
		$ordain->date_id=$date_id;
		$ordain->status=1;
		if($ordain->validate()){
			$ordain->setIsNewRecord(true);
			$result=$ordain->insert_datas();
			if($result){
				
				 $agency_date=AgencyDate::model();
     	   $agency_date=$agency_date->findByPk($date_id);
     	   $agency_date->ordin_nums=$agency_date->ordin_nums+1;
     	   $agency_date->save();
				 $send_mail=new SendMail();
         $send_message=new SendMessage();
         $user_setting=UserSetting::model();
				 $ordain_data=$ordain->with("User",'OrderUser',"AgencyDate")->findByPk($ordain->id);
				 
				 $agency_id=$ordain_data->User->id;
				 $setting_data=$user_setting->get_user_setting($agency_id);
     	   $setting_message=$setting_data['message'];
     	   $setting_email=$setting_data['email'];
     	   
     	   if($setting_email=='2'){
     	 	 	$guide=$ordain_data->OrderUser->real_name;
     	 	 	$guide_email=$ordain_data->OrderUser->user_email;
     	 	 	$travel_agency=$ordain_data->User->TravelAgency->agency_name;
     	 	 	$agency_email=$ordain_data->User->TravelAgency->agency_email;
     	 	 	$travel_line=$ordain_data->AgencyDate->line;
     	 	 	$send_mail->send_mail(5,$agency_email,array('guide'=>$guide,'travel_line'=>$travel_line),array());
     	  }
     	  
     	  if($setting_message=='2'){
     	  	$guide=$ordain_data->OrderUser->real_name;
     	 	 	$guide_email=$ordain_data->OrderUser->user_email;
     	 	 	$travel_agency=$ordain_data->User->TravelAgency->agency_name;
     	 	 	$cell_phone=$ordain_data->User->cell_phone;
     	 	 	$travel_line=$ordain_data->AgencyDate->line;
     	 	 	$send_message->send_message(26,$agency_id,$cell_phone,array('guide'=>$guide,'travel_line'=>$travel_line));
     	  } 	 
			   $this->set_flash("旅行社线路预定成功，2秒后自动跳转到\"我的预定\",若未跳转请点击<a href='".$this->createUrl("/user/mygscheduler")."'>这里</a>进行手动跳转。",CV::TIP);
			}else{
			   $this->f(CV::FAIL);
			}
		}else{
			$this->f(CV::FAIL);
		}
		$this->render('doordain',array());
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