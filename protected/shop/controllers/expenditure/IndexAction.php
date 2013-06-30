<?php
class IndexAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	 $model=Income::model();
  	 //定义搜索条件组合的array
		 $conditions=array();
		 $params=array();
		 $page_params=array();
		   //组合搜索条件
       $order_type=$_REQUEST['order_type'];
       if(!empty($order_type)){
			   array_push($conditions,"t.order_type = :order_type");
			   $params[':order_type']=$order_type;
			   $page_params['order_type']=$order_type;
		   }
		   
		    $order_number=$_REQUEST['order_number'];
       if(!empty($order_number)){
			   array_push($conditions,"t.order_number = :order_number");
			   $params[':order_number']=$order_number;
			   $page_params['order_number']=$order_number;
		   }
		   
		   $contacter=$_REQUEST['contacter'];
       if(!empty($contacter)){
			   array_push($conditions,"t.contacter = :contacter");
			   $params[':contacter']=$contacter;
			   $page_params['contacter']=$contacter;
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
