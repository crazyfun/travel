<?php
class WBaiduMaps extends CWidget
{
	   public $coordinate="";
	   public $address="";
     public function run(){
       
     	   $address=$this->address;
   	  	 $ip_convert=IpConvert::get();
   	 		 $region_address=$ip_convert->init_region();
   	  	 $region_name=$region_address['name'];
   	  	 if(empty($address)){
   	  			$address=$region_name;
   	  		}
          if(!empty($this->coordinate)){
     	  			$coordinate_explode=explode(",",$this->coordinate);
   	  				$lng=$coordinate_explode[0];
   	  				$lat=$coordinate_explode[1];
   	  		}
   	  
    	  $this->render("baidu_maps",array('lng'=>$lng,'lat'=>$lat,'address'=>$address,'region_name'=>$region_name));
    }
  
}
