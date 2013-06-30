<?php
class NewInformation extends CWidget
{
     public function run(){
     	
        $information=Information::model();
        $information_datas=$information->get_newest_information(CV::$model_type['guideinfo']);
        
        $agency_date=AgencyDate::model();
        $agency_datas=$agency_date->get_newest_line('',10);
    	 	$this->render('new_information',array('information_datas'=>$information_datas,'agency_datas'=>$agency_datas));
    }
  
}
