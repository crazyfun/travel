<?php
class OrdainstatusAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_page();
        $this->controller->tag="gscheduler";
        return true;
    }
   protected function do_action(){
   	 $id=$_REQUEST['id'];
   	 $status=$_REQUEST['status'];
   	 $model=new Ordain();
   	 $result=$model->updateByPk($id,array('status'=>$status,'operate_time'=>time()));
   	 $user_setting=UserSetting::model();
     if($result){
     	 $send_mail=new SendMail();
     	 $send_message=new SendMessage();
     	 if($status=='1'){
     	 	 $model_data=$model->with("User","OrderUser","AgencyDate")->findByPk($id);
     	 	 $agency_id=$model_data->OrderUser->id;
     	 	 $setting_data=$user_setting->get_user_setting($agency_id);
     	   $setting_message=$setting_data['message'];
     	   $setting_email=$setting_data['email'];
     	 	 $date_id=$model_data->date_id;
     	 	 $user_id=$model_data->user_id;
     	 	 $model->updateAll(array('status'=>'1'),"date_id=:date_id AND user_id=:user_id AND id<>:id",array(':date_id'=>$date_id,':user_id'=>$user_id,':id'=>$id));
     	 	 if($setting_email=='2'){
     	 	 $guide=$model_data->User->real_name;
     	 	 $guide_email=$model_data->User->user_email;
     	 	 $travel_agency=$model_data->OrderUser->TravelAgency->agency_name;
     	 	 $agency_email=$model_data->OrderUser->TravelAgency->agency_email;
     	 	 $travel_line=$model_data->AgencyDate->line;
     	 	 $send_mail->send_mail(8,$agency_email,array('guide'=>$guide,'travel_line'=>$travel_line),array());
     	  }
     	  if($setting_message=='2'){
     	   $guide=$model_data->User->real_name;
     	 	 $guide_email=$model_data->User->user_email;
     	 	 $travel_agency=$model_data->OrderUser->TravelAgency->agency_name;
     	 	 $cell_phone=$model_data->OrderUser->cell_phone;
     	 	 $travel_line=$model_data->AgencyDate->line;
     	 	 $send_message->send_message(21,$agency_id,$cell_phone,array('guide'=>$guide,'travel_line'=>$travel_line));
     	  }
     	 }
     	 if($status=='2'){
     	 	 $model_data=$model->with("User","OrderUser","AgencyDate")->findByPk($id);
     	 	 $agency_id=$model_data->OrderUser->id;
     	 	 
     	 	 $setting_data=$user_setting->get_user_setting($agency_id);
     	   $setting_message=$setting_data['message'];
     	   $setting_email=$setting_data['email'];
     	   
     	 	 $date_id=$model_data->date_id;
     	 	 $user_id=$model_data->user_id;
     	 	 $model->updateAll(array('status'=>'4'),"date_id=:date_id AND user_id=:user_id AND id<>:id",array(':date_id'=>$date_id,':user_id'=>$user_id,':id'=>$id));
     	   if($setting_email=='2'){
     	   $guide=$model_data->User->real_name;
     	 	 $guide_email=$model_data->User->user_email;
     	 	 $travel_agency=$model_data->OrderUser->TravelAgency->agency_name;
     	 	 $agency_email=$model_data->OrderUser->TravelAgency->agency_email;
     	 	 $travel_line=$model_data->AgencyDate->line;
     	 	 $send_mail->send_mail(6,$agency_email,array('guide'=>$guide,'travel_line'=>$travel_line),array());
     	  }
     	  if($setting_message=='2'){
     	   $guide=$model_data->User->real_name;
     	 	 $guide_email=$model_data->User->user_email;
     	 	 $travel_agency=$model_data->OrderUser->TravelAgency->agency_name;
     	 	 $cell_phone=$model_data->OrderUser->cell_phone;
     	 	 $travel_line=$model_data->AgencyDate->line;
     	 	 $send_message->send_message(22,$agency_id,$cell_phone,array('guide'=>$guide,'travel_line'=>$travel_line));
     	  }
     	 }
     	 if($status=="3"){
     	   	$guide_date=new GuideDate();
     	   	$ordain_datas=$model->with("User","OrderUser","AgencyDate")->findByPk($id);
     	   	$start_date=$ordain_datas->AgencyDate->start_date;
     	   	$end_date=$ordain_datas->AgencyDate->end_date;
     	   	$start_time=strtotime($start_date);
				 	$end_time=strtotime($end_date);
				 	$diff_time=Util::diff_days($end_time,$start_time);
				 	$day_time=86400;
				 	for($ii=0;$ii<=$diff_time;$ii++){
  	        		$date=date('Y-m-d',$start_time+($day_time*$ii));
  	        		$new_guide=$guide_date->find("date=:current_date AND user_id=:user_id",array(':current_date'=>$date,':user_id'=>$ordain_datas->user_id));	
  	        		if(!empty($new_guide)){
  	        			$new_guide->updateByPk($new_guide->id,array('status'=>'2'));
  	        		}else{
  	        			$guide_date->date=$date;
  	        			$guide_date->user_id=$ordain_datas->user_id;
  	        			$guide_date->status='2';
  	        		  $guide_date->insert_datas();
  	        	  }
				 }
				 
				 $user_id=$model_data->user_id;
				 $setting_data=$user_setting->get_user_setting($user_id);
     	   $setting_message=$setting_data['message'];
     	   $setting_email=$setting_data['email'];
     	  if($setting_email=='2'){
				 $guide=$ordain_datas->User->real_name;
     	 	 $guide_email=$ordain_datas->User->user_email;
     	 	 $travel_agency=$ordain_datas->OrderUser->TravelAgency->agency_name;
     	 	 $agency_email=$ordain_datas->OrderUser->TravelAgency->agency_email;
     	 	 $travel_line=$ordain_datas->AgencyDate->line;
     	 	 $send_mail->send_mail(10,$guide_email,array('travel_agency'=>$travel_agency,'travel_line'=>$travel_line),array());
     	 }
     	  if($setting_message=='2'){
     	   $guide=$ordain_datas->User->real_name;
     	 	 $cell_phone=$ordain_datas->User->cell_phone;
     	 	 $travel_agency=$ordain_datas->OrderUser->TravelAgency->agency_name;
     	 	 $agency_email=$ordain_datas->OrderUser->TravelAgency->agency_email;
     	 	 $travel_line=$ordain_datas->AgencyDate->line;
     	 	 $send_message->send_message(23,$user_id,$cell_phone,array('travel_agency'=>$travel_agency,'travel_line'=>$travel_line));
     	  }
				 
     	 }
     	 if($status=='4'){
     	 	  $model_data=$model->with("User","OrderUser","AgencyDate")->findByPk($id);
     	 	  $agency_id=$model_data->OrderUser->id;
     	 	  
     	 	  $setting_data=$user_setting->get_user_setting($agency_id);
     	   $setting_message=$setting_data['message'];
     	   $setting_email=$setting_data['email'];
     	   if($setting_email=='2'){
     	 		$guide=$model_data->User->real_name;
     	 	 	$guide_email=$model_data->User->user_email;
     	 	 	$travel_agency=$model_data->OrderUser->TravelAgency->agency_name;
     	 	 	$agency_email=$model_data->OrderUser->TravelAgency->agency_email;
     	 	 	$travel_line=$model_data->AgencyDate->line;
     	 	 	$send_mail->send_mail(7,$agency_email,array('guide'=>$guide,'travel_line'=>$travel_line),array());
     	 	}
     	 	
     	 	if($setting_message=='2'){
     	   $guide=$model_data->User->real_name;
     	 	 $guide_email=$model_data->User->user_email;
     	 	 $travel_agency=$model_data->OrderUser->TravelAgency->agency_name;
     	 	 $cell_phone=$model_data->OrderUser->cell_phone;
     	 	 $travel_line=$model_data->AgencyDate->line;
     	 	 $send_message->send_message(24,$agency_id,$cell_phone,array('guide'=>$guide,'travel_line'=>$travel_line));
     	  }
     	  
     	  
     	}
     	if($status=='5'){
     		 $model_data=$model->with("User","OrderUser","AgencyDate")->findByPk($id);
     		  $user_id=$model_data->user_id;
				 $setting_data=$user_setting->get_user_setting($user_id);
     	   $setting_message=$setting_data['message'];
     	   $setting_email=$setting_data['email'];
     	   
     	   if($setting_email=='2'){
     	 	 $guide=$model_data->User->real_name;
     	 	 $guide_email=$model_data->User->user_email;
     	 	 $travel_agency=$model_data->OrderUser->TravelAgency->agency_name;
     	 	 $agency_email=$model_data->OrderUser->TravelAgency->agency_email;
     	 	 $travel_line=$model_data->AgencyDate->line;
     	 	 $send_mail->send_mail(9,$guide_email,array('travel_agency'=>$travel_agency,'travel_line'=>$travel_line),array());
     		}
     		
     		  if($setting_message=='2'){
     	   		$guide=$ordain_datas->User->real_name;
     	 	 		$cell_phone=$ordain_datas->User->cell_phone;
     	 	 		$travel_agency=$ordain_datas->OrderUser->TravelAgency->agency_name;
     	 	 		$agency_email=$ordain_datas->OrderUser->TravelAgency->agency_email;
     	 	 		$travel_line=$ordain_datas->AgencyDate->line;
     	 	 		$send_message->send_message(25,$user_id,$cell_phone,array('travel_agency'=>$travel_agency,'travel_line'=>$travel_line));
     	  }
     	  
     	  
     	}
       $this->controller->f(CV::SUCCESS);
     }else{
     	 $this->controller->f(CV::FAIL);
     }
     $this->display("ordainstatus");
  }
  
}
?>