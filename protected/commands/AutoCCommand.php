<?php
class AutoCCommand extends CConsoleCommand
{
	public function run($args){
	   $model=Tops::model();
	   $current_date=date("Y-m-d");
	   $current_time=date("H:00:00");
	   $current=date("Y-m-d H:00:00");
	   $tops_datas=$model->with("ConfigValues")->findAll("t.start_date<=:start_date AND t.status=:status And t.open=:open ",array(':start_date'=>$current_date,':status'=>'2','open'=>'1'));
	   
	   foreach($tops_datas as $key => $value){
	   	 $days=$value->days;
	   	 $hours=$value->ConfigValues->extern_value;
	   	 $top_start_date=$value->get_start_time();
	   	 $top_start_date=strtotime($top_start_date);
	   	 $type=$value->type;
	   	 $relation_id=$value->relation_id;
	   	 $final_end_time=$value->get_end_time();
	   	 $tem_final_end_time=$final_end_time;
	   	 $final_end_time=strtotime($final_end_time);
	   	 $top_start_day=date('Y-m-d',$top_start_date);
	   	 $top_start_hour=date('H:00:00',$top_start_date);
	   	 $top_end_day=date('Y-m-d',$final_end_time);
	   	 $top_end_hour=date('H:00:00',$final_end_time);
	   	 if($top_start_day <= $current_date && $current_date<= $top_end_day){
	   	 	 
	   	 	if($top_start_hour<=$current_time&& $current_time<=$top_end_hour){
	   	 	 switch($type){
					case '1':
		  			$guide=Guide::model();
		  			$guide->updateByPk($relation_id,array('top'=>'2'));
		 			  break;
					case '2':
		  			$agency=TravelAgency::model();
		  			$agency->updateByPk($relation_id,array('top'=>'2'));
		  			break;
					case '3':
		  			$restaurant=TravelRestaurant::model();
		  			$restaurant->updateByPk($relation_id,array('top'=>'2'));
		  			break;
		  			
		  	  case '4':
		  	    $agency_date=AgencyDate::model();
		  			$agency_date->updateByPk($relation_id,array('top'=>'2'));
		  	    break;
		  	  default:
		  	    break;
   	    }
	   	 	 	
	   	 	}else{
	   	 	 switch($type){
					case '1':
		  			$guide=Guide::model();
		  			$guide->updateByPk($relation_id,array('top'=>'1'));
		 			  break;
					case '2':
		  			$agency=TravelAgency::model();
		  			$agency->updateByPk($relation_id,array('top'=>'1'));
		  			break;
					case '3':
		  			$restaurant=TravelRestaurant::model();
		  			$restaurant->updateByPk($relation_id,array('top'=>'1'));
		  			break;
		  	  case '4':
		  	    $agency_date=AgencyDate::model();
		  			$agency_date->updateByPk($relation_id,array('top'=>'1'));
		  	    break;
		  	  default:
		  	    break;
   	     }
	   	 	}
	   	 	
	   	 	
	   	 }else{
	   	 	
	   	 	 if($current >= $tem_final_end_time){
    	 	   $value->updateByPk($value->id,array('open'=>'2'));
    	 	 switch($type){
					case '1':
		  			$guide=Guide::model();
		  			$guide->updateByPk($relation_id,array('top'=>'1'));
		 			  break;
					case '2':
		  			$agency=TravelAgency::model();
		  			$agency->updateByPk($relation_id,array('top'=>'1'));
		  			break;
					case '3':
		  			$restaurant=TravelRestaurant::model();
		  			$restaurant->updateByPk($relation_id,array('top'=>'1'));
		  			break;
		  	  case '4':
		  	    $agency_date=AgencyDate::model();
		  			$agency_date->updateByPk($relation_id,array('top'=>'1'));
		  	    break;
		  	  default:
		  	    break;
   	     }
   	     
    	   }
	   	 }
	   	 
	  }	 
	  
  }
}
