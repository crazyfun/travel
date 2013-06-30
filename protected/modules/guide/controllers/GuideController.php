<?php

class GuideController extends Controller
{
	public $tag="guide";
	public $breadcrumbs=array();
	public function actionIndex(){
	
	}
	public function actionDetail()
	{
		Util::reset_vars();
		$guide_id=$_REQUEST['id'];

		$model=new Guide();
    $model=$model->with("User")->findByPk($guide_id); 
    if(empty($model)){
			$this->redirect("/error/error404");
		}
    $this->breadcrumbs=array('导游'=>$this->createUrl("/search/default/index/action/guide"),"导游员".$model->User->real_name);
    $ip_convert=IpConvert::get();
		$region_session=$ip_convert->init_region();  	 		 	    
		$region_name=$region_session['name'];
    $this->set_seo("预定".$region_name."导游员".$model->User->real_name,'找'.$region_name.'导游，'.$region_name.'导游证，'.$region_name.'导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，挂靠'.$region_name.'旅行社，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，预定导游，'.$region_name.'导游司机，'.$region_name.'导游翻译,导游英文','找导游网-"立火"旅游业之家:是全国最大的'.$region_name.'导游，导游证，导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，'.$region_name.'旅游计调，挂靠'.$region_name.'旅行社，'.$region_name.'旅行社，'.$region_name.'组团社，'.$region_name.'地接社，'.$region_name.'景点，'.$region_name.'酒店和旅游资讯等旅游业资源共享平台。并提供网站线上服务和线下电话沟通交流的服务。"立火"旅游业之家愿和所有业内同仁一起共建一个资源共享与合作的平台，让我们的客户能享受更便利、更亲切、更满意的服务。');
        
        
    $model->views=$model->views+1;
    $model->save();
		$this->render('detail',array('model'=>$model,'guide_id'=>$guide_id));
	}
	
	public function actionOrdain(){
		$this->layout="none";
		Util::reset_vars();
		$user_id=Yii::app()->user->id;
		if(empty($user_id)){
			$this->redirect("/login/login/poplogin");
			exit();
		}
		$guide_id=$_REQUEST['guide_id'];
		$user_type=UserType::model();
  	$type=$user_type->get_user_type($user_id);
  	switch($type){
  		case '3':
  		    $trave_agency=new TravelAgency();
  		    $status=$trave_agency->get_agency_status($user_id);
  		    if($status=='1'){
  		    	$this->set_flash("您的旅行社信息未经审核，请等待审核后再行预定。",CV::TIP);
  		    	$this->render('notagency',array());
  		    }else{
  		    	$current_date=$_REQUEST['current_date'];
  		    	$model=new AgencyDate();
  		    	$model_name=get_class($model);
  	        if($_POST[$model_name]){
  	        	 $model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
							 $model->attributes=$_POST[$model_name];
							 $model->user_id=$user_id;
							 if($model->validate()){
				 	 				if($model->end_date<=$model->start_date){
				 	 	  				$model->addError("end_date","结束时间必须大于开始时间");
				 	 				}else{	
  	        				$result=$model->insert_datas();
  	        				if($result){
				 	 						$this->f(CV::SUCCESS);
				 	 					}
				  				}
		  				}else{
			  					$this->f(CV::FAIL);
		  				}
  	        }
  		    		//定义搜索条件组合的array
		 					$conditions=array('t.user_id=:user_id','t.start_date<=:current_date','t.end_date>=:current_date');
		 					$params=array(':user_id'=>$user_id,':current_date'=>$current_date);
		 					$page_params=array('current_date'=>$current_date,'guide_id'=>$guide_id);
  		    		//定义排序类
					  	$sort=new CSort();
  	 					$sort->attributes=array();
  	 					$sort->defaultOrder="t.create_time DESC";
  	 					$sort->params=$page_params;
  	 					$data_model=new AgencyDate();
  	 					//生成ActiveDataProvider对象
  		    		$dataProvider=new CActiveDataProvider($data_model, array(
								'criteria'=>array(
			    			'condition'=>implode(' AND ',$conditions),
			    			'params'=>$params,
			    			'with'=>array("User"),
								),
								'pagination'=>array(
          				'pageSize' => '20',
          				'params' => $page_params,
      				  ),
      		  	'sort'=>$sort,
						));
  		      $this->render('ordain',array('model'=>$model,'dataProvider'=>$dataProvider,'current_date'=>$current_date,'guide_id'=>$guide_id));
  		    }
  		    break;
  		default:
  		    $this->set_flash("您还未申请旅行社，请申请为旅行社后再行预定。",CV::TIP);
  		    $this->render('notagency',array());
  		    break;
  	}
	}
	
	public function ActionDoordain(){
		$this->layout="none";
		Util::reset_vars();
		$id=$_REQUEST['id'];
		$guide_id=$_REQUEST['guide_id'];
		$guide=Guide::model();
		$guide_data=$guide->findByPk($guide_id);
		$guide_user_id=$guide_data->user_id;
		$ordain=Ordain::model();
		$ordain->user_id=$guide_user_id;
		$ordain->ordain_id=Yii::app()->user->id;
		$ordain->date_id=$id;
		$ordain->status=1;
		if($ordain->validate()){
			$ordain->setIsNewRecord(true);
			$result=$ordain->insert_datas();
			if($result){
				 $send_mail=new SendMail();
				 $send_message=new SendMessage();
         $user_setting=UserSetting::model();
         
				 $ordain_data=$ordain->with("User","OrderUser","AgencyDate")->findByPk($ordain->id);
				 $guide_id=$ordain_data->User->id;
				  $setting_data=$user_setting->get_user_setting($guide_id);
     	   $setting_message=$setting_data['message'];
     	   $setting_email=$setting_data['email'];
     	   
     	   if($setting_email=='2'){
				 	$guide=$ordain_data->User->real_name;
     	 	 	$guide_email=$ordain_data->User->user_email;
     	 	 	$travel_agency=$ordain_data->OrderUser->TravelAgency->agency_name;
     	 	 	$agency_email=$ordain_data->OrderUser->TravelAgency->agency_email;
     	 	 	$travel_line=$ordain_data->AgencyDate->line;
     	 	 	$send_mail->send_mail(4,$guide_email,array('travel_agency'=>$travel_agency,'travel_line'=>$travel_line),array());
     	   }
     	   if($setting_message=='2'){
     	   	$guide=$ordain_data->User->real_name;
     	 	 	$cell_phone=$ordain_data->User->cell_phone;
     	 	 	$travel_agency=$ordain_data->OrderUser->TravelAgency->agency_name;
     	 	 	$agency_email=$ordain_data->OrderUser->TravelAgency->agency_email;
     	 	 	$travel_line=$ordain_data->AgencyDate->line;
     	 	 	$send_message->send_message(27,$guide_id,$cell_phone,array('travel_agency'=>$travel_agency,'travel_line'=>$travel_line));
     	   }
     	 	 
			   $this->set_flash("导游预定成功，2秒后自动跳转到\"我的预定\",若未跳转请点击<a href='".$this->createUrl("/user/ascheduler")."'>这里</a>进行手动跳转。",CV::TIP);
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