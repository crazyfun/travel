<?php
class HelpItems extends CWidget
{
	  public $cid="";
    public function run(){
    	 $information=Information::model();
    	 $information_datas=$information->get_whelp_information($this->cid);
       $this->render('help_items',array('model'=>$information,'information_datas'=>$information_datas));
    }
  
}
