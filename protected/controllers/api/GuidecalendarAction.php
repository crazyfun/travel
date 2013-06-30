<?php
class GuidecalendarAction extends BaseAction{
	protected function beforeAction(){
      if(Yii::app()->request->isAjaxRequest){
      	Util::reset_vars();
      	return true;
      } 
    }
   protected function do_action(){
   	 $year=$_REQUEST['year'];
   	 $month=$_REQUEST['month'];
   	 $first_date=mktime(0,0,0,1,$month,$year);
   	 $month_days=date("t",$first_date);
   	 $start_date=date("Y-m-d",$first_date);
   	 $end_date=date("Y-m-d",mktime(0,0,0,1+$month_days,$month,$year));
   	 $guide_date=GuideDate::model();
   	 $ordain=Ordain::model();
   	 $guide_date_datas=$guide_date->get_calendar($start_date,$end_date);
   	 $ordain_datas=$ordain->get_calendar($start_date,$end_date);
   	 echo Util::combo_ajax_message('y',array('guide'=>$guide_date_datas,'ordain'=>$ordain_datas),'');
   }
  
   

}
?>