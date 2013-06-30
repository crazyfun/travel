<?php
class MyagencycalendarAction extends  BaseAction{
    public function beforeAction(){
    	  if(Yii::app()->request->isAjaxRequest){
    		  Util::reset_vars();
          return true;
        }else{
        	return false;
        }
    }
    protected function do_action(){
      $station_data=$this->controller->station_data;
		 $station_id=$station_data['id'];
		 $station=Station::model();
		 $station_data=$station->findByPk($station_id);
		 $user_id=$station_data->user_id;
		 
     $year=$_REQUEST['year'];
   	 $month=$_REQUEST['month'];
   	 $first_date=mktime(0,0,0,1,$month,$year);
   	 $month_days=date("t",$first_date);
   	 $start_date=date("Y-m-d",$first_date);
   	 $end_date=date("Y-m-d",mktime(0,0,0,1+$month_days,$month,$year));
   	 $agency_date=AgencyDate::model();
   	 $agency_datas=$agency_date->get_admin_agency_calendar($start_date,$end_date,$user_id);
   	  echo Util::combo_ajax_message('y',array('ordain'=>$agency_datas),'');
    } 
}
?>
