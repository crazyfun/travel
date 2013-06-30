<?php
class OrdainagencyAction extends BaseAction{
	protected function beforeAction(){
      if(Yii::app()->request->isAjaxRequest){
      	Util::reset_vars();
      	return true;
      } 
    }
   protected function do_action(){
   	 $year=$_REQUEST['year'];
   	 $month=$_REQUEST['month'];
   	 $agency_id=$_REQUEST['agency_id'];
   	 $travel_agency=TravelAgency::model();
   	 $travel_agency_data=$travel_agency->findByPk($agency_id);
   	 $agency_user_id=$travel_agency_data->user_id;
   	 $first_date=mktime(0,0,0,1,$month,$year);
   	 $month_days=date("t",$first_date);
   	 $start_date=date("Y-m-d",$first_date);
   	 $end_date=date("Y-m-d",mktime(0,0,0,1+$month_days,$month,$year));
   	 $agency_date=AgencyDate::model();
   	 $agency_datas=$agency_date->get_agency_calendar($start_date,$end_date,$agency_user_id);
   	 echo Util::combo_ajax_message('y',array('ordain'=>$agency_datas),'');
   }
  
   

}
?>