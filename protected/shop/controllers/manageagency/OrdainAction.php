<?php
class OrdainAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	 $station_data=$this->controller->station_data;
		 $station_id=$station_data['id'];
		 $station=Station::model();
		 $station_data=$station->findByPk($station_id);
		 $user_id=$station_data->user_id;
		$id=$_REQUEST['id'];
		$agency_date=AgencyDate::model();
		$agency_date_data=$agency_date->findByPk($id);
		$gordain=new Gordain();
		$conditions=array('date_id=:date_id','user_id=:user_id');
		$params=array(':date_id'=>$agency_date_data->id,':user_id'=>$agency_date_data->user_id);
		$page_params=array();
		$gordain_dataProvider = new CActiveDataProvider($gordain,array(
		  'criteria'=>array(
			    'condition'=>implode(" AND ",$conditions),
			    'with'=>array('User','OrderUser'),
			    'params'=>$params,
			    'order'=>'t.create_time DESC',
			),
			'pagination'=>array(
          'pageSize'=>'20',
          'params'=>$page_params,
      ),
		 ));
		 
		 
		$this->display('ordain',array('agency_date_data'=>$agency_date_data,'gordain_dataProvider'=>$gordain_dataProvider));
  } 
}
?>
