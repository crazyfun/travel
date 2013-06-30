<?php
class WFlashAd extends CWidget
{
     public function run(){
     	  $flash_ad=FlashAd::model();
     	  $ad_datas=$flash_ad->get_ad_content();
    	 	$this->render("w_flash_ad",array('ad_datas'=>$ad_datas));
    }
  
}
