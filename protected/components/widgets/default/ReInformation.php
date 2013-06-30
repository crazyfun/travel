<?php
class ReInformation extends CWidget
{
     public function run(){
     	  $guide=Guide::model();
     	  $travel_agency=TravelAgency::model();
     	  $travel_restaurant=TravelRestaurant::model();
     	  $guide_datas=$guide->get_recommend_guide('',10);
     	  $travel_agency_datas=$travel_agency->get_recommend_agency('',10);
     	  $travel_restaurant_datas=$travel_restaurant->get_recommend_restaurant('',10);
    	 	$this->render('re_information',array('guide_datas'=>$guide_datas,'travel_agency_datas'=>$travel_agency_datas,'travel_restaurant_datas'=>$travel_restaurant_datas));
    }
  
}
