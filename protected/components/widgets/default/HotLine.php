<?php
class HotLine extends CWidget
{
	 public $view='';
	 public $nums='';
     public function run(){
     	  $agency_date=AgencyDate::model();
     	  if(!empty($this->nums)){
     	     $agency_datas=$agency_date->get_hot_line('',$this->nums); 
     	  }else{
     	  	$agency_datas=$agency_date->get_hot_line(); 
     	  }
    	  $this->render($this->view,array('agency_datas'=>$agency_datas));
    }
  
}
