<?php
class ViewagencyordainAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_page();
        $this->controller->tag="myascheduler";
        return true;
    }
   protected function do_action(){
		$user_id=Yii::app()->user->id;
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
		$this->display('viewagencyordain',array('agency_date_data'=>$agency_date_data,'gordain_dataProvider'=>$gordain_dataProvider));
  }
}
?>