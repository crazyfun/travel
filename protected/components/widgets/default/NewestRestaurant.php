<?php
class NewestRestaurant extends CWidget
{
	  public $view='';
	  public $nums='';
     public function run(){
     	  $travel_restaurant=TravelRestaurant::model();
     	  if(!empty($this->nums)){
     	  	
     	  	$travel_restaurant_datas=$travel_restaurant->get_newest_restaurant("",$this->nums);
     	  }else{
     	    $travel_restaurant_datas=$travel_restaurant->get_newest_restaurant();
     	  }
    	  $this->render($this->view,array('travel_restaurant_datas'=>$travel_restaurant_datas));
    }
  
}
