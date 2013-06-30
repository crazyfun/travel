<?php
class GordainstatusAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_page();
        $this->controller->tag="myascheduler";
        return true;
    }
   protected function do_action(){
   	 $id=$_REQUEST['id'];
   	 $status=$_REQUEST['status'];
   	 $model=new Gordain();
   	 $result=$model->updateByPk($id,array('status'=>$status,'operate_time'=>time()));
   	 $user_setting=UserSetting::model();
   	
     if($result){
     	$send_mail=new SendMail();
     	$send_message=new SendMessage();
     	if($status=='1'){
     	 	 $model_data=$model->with("User",'OrderUser',"AgencyDate")->findByPk($id);
     	 	 $date_id=$model_data->date_id;
     	 	 $user_id=$model_data->user_id;
     	 	 $model->updateAll(array('status'=>'1'),"date_id=:date_id AND user_id=:user_id AND id<>:id",array(':date_id'=>$date_id,':user_id'=>$user_id,':id'=>$id));
     	   $guide_id=$model_data->OrderUser->id;
     	   $setting_data=$user_setting->get_user_setting($guide_id);
     	   $setting_message=$setting_data['message'];
     	   $setting_email=$setting_data['email'];
     	   if($setting_email=='2'){
     	 	 	$guide=$model_data->OrderUser->real_name;
     	 	 	$guide_email=$model_data->OrderUser->user_email;
     	 	 	$travel_agency=$model_data->User->TravelAgency->agency_name;
     	 	 	$agency_email=$model_data->User->TravelAgency->agency_email;
     	 	 	$travel_line=$model_data->AgencyDate->line;
     	 	 	$send_mail->send_mail(11,$guide_email,array('travel_agency'=>$travel_agency,'travel_line'=>$travel_line),array());
     	  }
     	  
     	  if($setting_message=='2'){
     	  	$guide=$model_data->OrderUser->real_name;
     	 	 	$cell_phone=$model_data->OrderUser->cell_phone;
     	 	 	$travel_agency=$model_data->User->TravelAgency->agency_name;
     	 	 	$agency_email=$model_data->User->TravelAgency->agency_email;
     	 	 	$travel_line=$model_data->AgencyDate->line;
     	 	 	$send_message->send_message(16,$guide_id,$cell_phone,array('travel_agency'=>$travel_agency,'travel_line'=>$travel_line));
     	  }
     	  
     	 }
     	 
     	 if($status=='2'){
     	 	  $model_data=$model->with("User",'OrderUser',"AgencyDate")->findByPk($id);
     	 	  $agency_id=$model_data->User->id;
     	   $setting_data=$user_setting->get_user_setting($agency_id);
     	   $setting_message=$setting_data['message'];
     	   $setting_email=$setting_data['email'];
     	   if($setting_email=='2'){
     	 	  $guide=$model_data->OrderUser->real_name;
     	 	 	$guide_email=$model_data->OrderUser->user_email;
     	 	 	$travel_agency=$model_data->User->TravelAgency->agency_name;
     	 	 	$agency_email=$model_data->User->TravelAgency->agency_email;
     	 		$travel_line=$model_data->AgencyDate->line;
     	 	 	$send_mail->send_mail(6,$agency_email,array('guide'=>$guide,'travel_line'=>$travel_line),array());
     	  }
     	  if($setting_message=='2'){
     	  	$guide=$model_data->OrderUser->real_name;
     	 	 	$guide_email=$model_data->OrderUser->user_email;
     	 	 	$travel_agency=$model_data->User->TravelAgency->agency_name;
     	 	 	$cell_phone=$model_data->User->cell_phone;
     	 		$travel_line=$model_data->AgencyDate->line;
     	 	 	$send_message->send_message(17,$agency_id,$cell_phone,array('guide'=>$guide,'travel_line'=>$travel_line));
     	  }
     	}
     	 if($status=="3"){
     	   	$model_data=$model->findByPk($id);
     	 	 $date_id=$model_data->date_id;
     	 	 $user_id=$model_data->user_id;
     	 	 $model->updateAll(array('status'=>'5'),"date_id=:date_id AND user_id=:user_id AND id<>:id",array(':date_id'=>$date_id,':user_id'=>$user_id,':id'=>$id));
     	   $model_data=$model->with("User",'OrderUser',"AgencyDate")->findByPk($id); 
     	   $guide_id=$model_data->OrderUser->id;
     	   $setting_data=$user_setting->get_user_setting($guide_id);
     	   $setting_message=$setting_data['message'];
     	   $setting_email=$setting_data['email'];
     	   if($setting_email=='2'){
     	 	  $guide=$model_data->OrderUser->real_name;
     	 	 $guide_email=$model_data->OrderUser->user_email;
     	 	 $travel_agency=$model_data->User->TravelAgency->agency_name;
     	 	 $agency_email=$model_data->User->TravelAgency->agency_email;
     	 	 $travel_line=$model_data->AgencyDate->line;
     	 	 $send_mail->send_mail(10,$guide_email,array('travel_agency'=>$travel_agency,'travel_line'=>$travel_line),array());
     	  }
     	  
     	  if($setting_message=='2'){
     	  	$guide=$model_data->OrderUser->real_name;
     	 	  $cell_phone=$model_data->OrderUser->cell_phone;
     	 	  $travel_agency=$model_data->User->TravelAgency->agency_name;
     	 	  $agency_email=$model_data->User->TravelAgency->agency_email;
     	 	  $travel_line=$model_data->AgencyDate->line;
     	 	 	$send_message->send_message(18,$guide_id,$cell_phone,array('travel_agency'=>$travel_agency,'travel_line'=>$travel_line));
     	  }

     	 }
     	 if($status=='4'){
     	 	 $model_data=$model->with("User",'OrderUser',"AgencyDate")->findByPk($id);
     	 	 $agency_id=$model_data->User->id;
     	   $setting_data=$user_setting->get_user_setting($agency_id);
     	   $setting_message=$setting_data['message'];
     	   $setting_email=$setting_data['email'];
     	  if($setting_email=='2'){
     	 	 $guide=$model_data->OrderUser->real_name;
     	 	 $guide_email=$model_data->OrderUser->user_email;
     	 	 $travel_agency=$model_data->User->TravelAgency->agency_name;
     	 	 $agency_email=$model_data->User->TravelAgency->agency_email;
     	 	 $travel_line=$model_data->AgencyDate->line;
     	 	 $send_mail->send_mail(7,$agency_email,array('guide'=>$guide,'travel_line'=>$travel_line),array());
     	  }
     	  
     	  if($setting_message=='2'){
     	  	$guide=$model_data->OrderUser->real_name;
     	 	 	$guide_email=$model_data->OrderUser->user_email;
     	 	 	$travel_agency=$model_data->User->TravelAgency->agency_name;
     	 	 	$cell_phone=$model_data->User->cell_phone;
     	 		$travel_line=$model_data->AgencyDate->line;
     	 	 	$send_message->send_message(19,$agency_id,$cell_phone,array('guide'=>$guide,'travel_line'=>$travel_line));
     	  }
     	 }
     	 if($status=='5'){
     	 	  $model_data=$model->with("User",'OrderUser',"AgencyDate")->findByPk($id);
     	 	 $guide_id=$model_data->OrderUser->id;
     	   $setting_data=$user_setting->get_user_setting($guide_id);
     	   $setting_message=$setting_data['message'];
     	   $setting_email=$setting_data['email'];
     	   if($setting_email=='2'){
     	 	 $guide=$model_data->OrderUser->real_name;
     	 	 $guide_email=$model_data->OrderUser->user_email;
     	 	 $travel_agency=$model_data->User->TravelAgency->agency_name;
     	 	 $agency_email=$model_data->User->TravelAgency->agency_email;
     	 	 $travel_line=$model_data->AgencyDate->line;
     	 	 $send_mail->send_mail(9,$guide_email,array('travel_agency'=>$travel_agency,'travel_line'=>$travel_line),array());
     	  }
     	  
     	  if($setting_message=='2'){
     	  	$guide=$model_data->OrderUser->real_name;
     	 	  $cell_phone=$model_data->OrderUser->cell_phone;
     	 	  $travel_agency=$model_data->User->TravelAgency->agency_name;
     	 	  $agency_email=$model_data->User->TravelAgency->agency_email;
     	 	  $travel_line=$model_data->AgencyDate->line;
     	 	 	$send_message->send_message(20,$guide_id,$cell_phone,array('travel_agency'=>$travel_agency,'travel_line'=>$travel_line));
     	  }
     	}
       $this->controller->f(CV::SUCCESS);
     }else{
     	 $this->controller->f(CV::FAIL);
     }
     $this->display("gordainstatus");
  }
  
}
?>