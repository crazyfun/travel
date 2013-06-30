<?php
class IndexAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	$model=Order::model();
  	 $show_dijieshe=$_POST['show_dijieshe'];
  	 //定义搜索条件组合的array
		 $conditions=array();
		 $params=array();
		 $page_params=array();

		   $start_date=$_REQUEST['start_date'];
       if(!empty($start_date)){
			   array_push($conditions,"t.date >= :start_date");
			   $params[':start_date']=$start_date;
			   $page_params['start_date']=$start_date;
		   }
		   
		   $end_date=$_REQUEST['end_date'];
       if(!empty($end_date)){
			   array_push($conditions,"t.date <= :end_date");
			   $params[':end_date']=$end_date;
			   $page_params['end_date']=$end_date;
		   }
		   
		   $line=$_REQUEST['line'];
       if(!empty($line)){
			   array_push($conditions,"t.line LIKE :line");
			   $params[':line']="%$line%";
			   $page_params['line']=$line;
		   }
		   
		   $dijieshe=$_REQUEST['dijieshe'];
       if(!empty($dijieshe)){
			   array_push($conditions,"t.dijieshe = :dijieshe");
			   $params[':dijieshe']=$dijieshe;
			   $page_params['dijieshe']=$dijieshe;
		   }
		   
		   $status=$_REQUEST['status'];
       if(!empty($status)){
			   array_push($conditions,"t.status = :status");
			   $params[':status']=$status;
			   $page_params['status']=$status;
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
		
		
		$this->display('index',array('model'=>$model,'page_params'=>$page_params,'dataProvider'=>$dataProvider,'show_dijieshe'=>$show_dijieshe,'conditions'=>$conditions,'params'=>$params));
  } 
}
?>
