<?php
class NewestLine extends CWidget
{
	  public $view='';
	  public $nums='';
     public function run(){
     	  $agency_date=AgencyDate::model();
     	  if(!empty($this->nums)){
     	  	 $agency_datas=$agency_date->get_newest_line("",$this->nums);
     	  }else{
     	  		$agency_datas=$agency_date->get_newest_line();
     	  }
    	  $this->render($this->view,array('agency_datas'=>$agency_datas));
    }
  
}
