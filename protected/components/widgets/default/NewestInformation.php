<?php
class NewestInformation extends CWidget
{
	   public $view='';
	   public $nums='';
     public function run(){
     	  $information=Information::model();
     	  if(!empty($this->nums)){
     	  	$information_datas=$information->get_newest_ginformation($this->nums);
     	  }else{
     	    $information_datas=$information->get_newest_ginformation();
     	  }
    	 	$this->render($this->view,array('information_datas'=>$information_datas));
    }
  
}
