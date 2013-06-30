<?php
class InviteTop10 extends CWidget
{
	   
     public function run(){
        $invite=Invite::model();
        $invite_datas=$invite->get_invite_top10();
     
    	 	$this->render("invite_top10",array('invite_datas'=>$invite_datas));
    }
  
}
