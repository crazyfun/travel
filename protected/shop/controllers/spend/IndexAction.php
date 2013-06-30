<?php
class IndexAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	 $model=Expenditure::model();
  	 //定义搜索条件组合的array
		 $conditions=array();
		 $params=array();
		 $page_params=array();
		   //组合搜索条件
       $type_id=$_REQUEST['type_id'];
       if(!empty($type_id)){
			   array_push($conditions,"t.type_id = :type_id");
			   $params[':type_id']=$type_id;
			   $page_params['type_id']=$type_id;
		   }
		    $contacter=$_REQUEST['contacter'];
       if(!empty($contacter)){
			   array_push($conditions,"t.contacter LIKE :contacter");
			   $params[':contacter']="%$contacter%";
			   $page_params['contacter']=$contacter;
		   }
		   
		   $contacter_phone=$_REQUEST['contacter_phone'];
       if(!empty($contacter_phone)){
			   array_push($conditions,"t.contacter_phone LIKE :contacter_phone");
			   $params[':contacter_phone']="%$contacter_phone%";
			   $page_params['contacter_phone']=$contacter_phone;
		   }
		   
		   $start_date=$_REQUEST['start_date'];
       if(!empty($start_date)){
			   array_push($conditions,"t.expenditure_date >= :start_date");
			   $params[':start_date']=$start_date;
			   $page_params['start_date']=$start_date;
		   }
		   $end_date=$_REQUEST['end_date'];
       if(!empty($end_date)){
			   array_push($conditions,"t.expenditure_date<= :end_date");
			   $params[':end_date']=$end_date;
			   $page_params['end_date']=$end_date;
		   }
		   
		   $create_id=$_REQUEST['create_id'];
       if(!empty($create_id)){
			   array_push($conditions,"(t.create_id=:uid )");
			   $params[':uid']=$create_id;
			   $page_params['create_id']=$create_id;
		   }

		 
		 $station_data=$this->controller->station_data;
		 $station_id=$station_data['id'];
		 array_push($conditions,"t.station_id =:station_id ");
		 $params[':station_id']=$station_id;
		 $page_params['station_id']=$station_id;
		 //定义排序类
		 $sort=new CSort();
  	 $sort->attributes=array();
  	 $sort->defaultOrder="t.create_time ASC";
  	 $sort->params=$page_params;
  	
  	 //生成ActiveDataProvider对象
		 $criteria=new CDbCriteria;
		 $dataProvider=new CActiveDataProvider($model, array(
			'criteria'=>array(
			    'condition'=>implode(' AND ',$conditions),
			    'params'=>$params,
			    'with'=>array("User"),
			
			),
			'pagination'=>array(
          'pageSize' => '20',
          'params' => $page_params,
      ),
      'sort'=>$sort,
		));
		$this->display('index',array('model'=>$model,'page_params'=>$page_params,'dataProvider'=>$dataProvider,'conditions'=>$conditions,'params'=>$params));
  } 
}
?>
