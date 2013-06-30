<?php
class MyinvoiceAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	 $model=Invoice::model();
  	 //定义搜索条件组合的array
		 $conditions=array();
		 $params=array();
		 $page_params=array();
		   //组合搜索条件
       $invoice_numbers=$_REQUEST['invoice_numbers'];
       if(!empty($invoice_numbers)){
			   array_push($conditions,"t.invoice_numbers = :invoice_numbers");
			   $params[':invoice_numbers']=$invoice_numbers;
			   $page_params['invoice_numbers']=$invoice_numbers;
		   }
		   
		   
		   $order_numbers=$_REQUEST['order_numbers'];
       if(!empty($order_numbers)){
			   array_push($conditions,"t.order_numbers = :order_numbers");
			   $params[':order_numbers']=$order_numbers;
			   $page_params['order_numbers']=$order_numbers;
		   }
		   
		   
		    $status=$_REQUEST['status'];
       if(!empty($status)){
			   array_push($conditions,"t.status = :status");
			   $params[':status']=$status;
			   $page_params['status']=$status;
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
		   
		   
		   $shenhe_start_date=$_REQUEST['shenhe_start_date'];
       if(!empty($shenhe_start_date)){
			   array_push($conditions,"FROM_UNIXTIME(t.shenhe_time,'%Y-%m-%d') >= :shenhe_start_date");
			   $params[':shenhe_start_date']=$shenhe_start_date;
			   $page_params['shenhe_start_date']=$shenhe_start_date;
		   }
		   $shenhe_end_date=$_REQUEST['shenhe_end_date'];
       if(!empty($shenhe_end_date)){
			   array_push($conditions,"FROM_UNIXTIME(t.shenhe_time,'%Y-%m-%d') <= :shenhe_end_date");
			   $params[':shenhe_end_date']=$shenhe_end_date;
			   $page_params['shenhe_end_date']=$shenhe_end_date;
		   }
		   
		   $shenhe_id=$_REQUEST['shenhe_id'];
       if(!empty($shenhe_id)){
			   array_push($conditions,"(t.shenhe_id=:uid )");
			   $params[':uid']=$shenhe_id;
			   $page_params['shenhe_id']=$shenhe_id;
		   }
		   
		 $station_data=$this->controller->station_data;
		 $station_id=$station_data['id'];
		 array_push($conditions,"t.station_id =:station_id ");
		 $params[':station_id']=$station_id;
		 $page_params['station_id']=$station_id;
		 
		 $create_id=Yii::app()->user->id;
		 array_push($conditions,"t.create_id =:create_id ");
		 $params[':create_id']=$create_id;
		 $page_params['create_id']=$create_id;
		 
		 
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
			    'with'=>array("User","ShenheUser"),
			),
			'pagination'=>array(
          'pageSize' => '20',
          'params' => $page_params,
      ),
      'sort'=>$sort,
		));
		$this->display('my_invoice',array('model'=>$model,'page_params'=>$page_params,'dataProvider'=>$dataProvider,'conditions'=>$conditions,'params'=>$params));
  } 
}
?>
