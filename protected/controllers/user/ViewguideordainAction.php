<?php
class ViewguideordainAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_page();
        $this->controller->tag="mygscheduler";
        return true;
    }
   protected function do_action(){
		$user_id=Yii::app()->user->id;
		$id=$_REQUEST['id'];
		$gordain=Gordain::model();
		$gordain_data=$gordain->with('User','OrderUser','AgencyDate')->findByPk($id);
		$travel_agency=new TravelAgency();
    $travel_agency_data=$travel_agency->with("User")->find("user_id=:user_id",array(':user_id'=>$gordain_data->user_id)); 
		$this->display('viewguideordain',array('gordain_data'=>$gordain_data,'travel_agency_data'=>$travel_agency_data));
  }
}
?>