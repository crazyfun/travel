<?php
class HotGuide extends CWidget
{
	   public $view='';
	   public $nums='';
     public function run(){
     	  $guide=Guide::model();
     	  if(!empty($this->nums)){
     	    $guide_datas=$guide->get_hot_guide('',$this->nums);
     	  }else{
     	  	$guide_datas=$guide->get_hot_guide();
     	  }
    	 	$this->render($this->view,array('guide_datas'=>$guide_datas));
    }
  
}
