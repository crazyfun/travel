<?php
class OrdainguideAction extends BaseAction{
	protected function beforeAction(){
      if(Yii::app()->request->isAjaxRequest){
      	Util::reset_vars();
      	return true;
      } 
    }
   protected function do_action(){
   	 $year=$_REQUEST['year'];
   	 $month=$_REQUEST['month'];
   	 $guide_id=$_REQUEST['guide_id'];
   	 $guide=Guide::model();
   	 $guide_data=$guide->findByPk($guide_id);
   	 $guide_user_id=$guide_data->user_id;
   	 $first_date=mktime(0,0,0,1,$month,$year);
   	 $month_days=date("t",$first_date);
   	 $start_date=date("Y-m-d",$first_date);
   	 $end_date=date("Y-m-d",mktime(0,0,0,1+$month_days,$month,$year));
   	 $guide_date=GuideDate::model();
   	 $guide_date_datas=$guide_date->get_calendar($start_date,$end_date,$guide_user_id);
   	 echo Util::combo_ajax_message('y',array('guide'=>$guide_date_datas),'');
   }
  
   

}
?>