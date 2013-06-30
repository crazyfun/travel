<?php
class NewestAgency extends CWidget
{
	  public $view='';
	  public $nums='';
     public function run(){
     	  
     	  $travel_agency=TravelAgency::model();
     	  if(!empty($this->nums)){
     	    $travel_agency_datas=$travel_agency->get_newest_agency("",$this->nums);
     	  }else{
     	  	$travel_agency_datas=$travel_agency->get_newest_agency();
     	  }
     	  
    	 	$this->render($this->view,array('travel_agency_datas'=>$travel_agency_datas));
    }
  
}
