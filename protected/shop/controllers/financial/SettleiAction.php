<?php
class SettleiAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	 $model=DijiesheJiesuan::model();
  	 //定义搜索条件组合的array
		 $conditions=array();
		 $params=array();
		 $page_params=array();
		 
		   $order_type=$_REQUEST['order_type'];
       if(!empty($order_type)){
			   array_push($conditions,"t.order_type = :order_type");
			   $params[':order_type']=$order_type;
			   $page_params['order_type']=$order_type;
		   }
		   
		   $dijieshe_id=$_REQUEST['dijieshe_id'];
       if(!empty($dijieshe_id)){
			   array_push($conditions,"t.dijieshe_id = :dijieshe_id");
			   $params[':dijieshe_id']=$dijieshe_id;
			   $page_params['dijieshe_id']=$dijieshe_id;
			   $show_dijieshe_id=$_REQUEST['show_dijieshe_id'];
		   }
		   
		   $order_id=$_REQUEST['order_id'];
       if(!empty($order_id)){
			   array_push($conditions,"t.order_id = :order_id");
			   $params[':order_id']=$order_id;
			   $page_params['order_id']=$order_id;
		   }
		   
		   $start_date=$_REQUEST['start_date'];
       if(!empty($start_date)){
			   array_push($conditions,"FROM_UNIXTIME(t.create_time,'%Y-%m-%d') >= :start_date");
			   $params[':start_date']=$start_date;
			   $page_params['start_date']=$start_date;
		   }
		   
		   $end_date=$_REQUEST['end_date'];
       if(!empty($end_date)){
			   array_push($conditions,"FROM_UNIXTIME(t.create_time,'%Y-%m-%d') <= :end_date");
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
			    'with'=>array("User",'Dijieshe'),
			
			),
			'pagination'=>array(
          'pageSize' => '20',
          'params' => $page_params,
      ),
      'sort'=>$sort,
		));
		
		
		$this->display('settlei',array('model'=>$model,'page_params'=>$page_params,'dataProvider'=>$dataProvider,'conditions'=>$conditions,'params'=>$params,'show_dijieshe_id'=>$show_dijieshe_id));
  } 
}
?>
