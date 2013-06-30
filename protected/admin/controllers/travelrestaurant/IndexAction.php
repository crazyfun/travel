<?php
class IndexAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	$model=TravelRestaurant::model();
  	 //定义搜索条件组合的array
		 $conditions=array();
		 $params=array();
		 $page_params=array();
		   //组合搜索条件
       $restaurant_name=$_REQUEST['restaurant_name'];
       if(!empty($restaurant_name)){
			   array_push($conditions,"t.restaurant_name LIKE :restaurant_name");
			   $params[':restaurant_name']="%$restaurant_name%";
			   $page_params['restaurant_name']=$restaurant_name;
		   }

		   $start_time=$_REQUEST['start_time'];
       if(!empty($start_time)){
			   array_push($conditions,"t.restaurant_open >= :start_time");
			   $params[':start_time']=$start_time;
			   $page_params['start_time']=$start_time;
		   }
		   
		   
		   $end_time=$_REQUEST['end_time'];
       if(!empty($end_time)){
			   array_push($conditions,"t.restaurant_open <= :end_time");
			   $params[':end_time']=$end_time;
			   $page_params['end_time']=$end_time;
		   }
		   
		    $restaurant_address=$_REQUEST['restaurant_address'];
       if(!empty($restaurant_address)){
			   array_push($conditions,"t.restaurant_address LIKE :restaurant_address");
			   $params[':restaurant_address']="%$restaurant_address%";
			   $page_params['restaurant_address']=$restaurant_address;
		   }
		   
		   
		    $restaurant_region_name=$_REQUEST['restaurant_region_name'];
       if(!empty($restaurant_region_name)){
			   array_push($conditions,"t.restaurant_region_name LIKE :restaurant_region_name");
			   $params[':restaurant_region_name']="%$restaurant_region_name%";
			   $page_params['restaurant_region_name']=$restaurant_region_name;
		   }

			 $restaurant_level=$_REQUEST['restaurant_level'];
       if(!empty($restaurant_level)){
			   array_push($conditions,"t.restaurant_level = :restaurant_level");
			   $params[':restaurant_level']=$restaurant_level;
			   $page_params['restaurant_level']=$restaurant_level;
		   }
		   
		   
		   $recommend=$_REQUEST['recommend'];
       if(!empty($recommend)){
			   array_push($conditions,"t.recommend = :recommend");
			   $params[':recommend']=$recommend;
			   $page_params['recommend']=$recommend;
		   }
		   
		    $status=$_REQUEST['status'];
       if(!empty($status)){
			   array_push($conditions,"t.status = :status");
			   $params[':status']=$status;
			   $page_params['status']=$status;
		   }
		 //定义排序类
		 $sort=new CSort();
  	 $sort->attributes=array();
  	 $sort->defaultOrder="t.create_time DESC";
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
   
		$this->display('index',array('model'=>$model,'page_params'=>$page_params,'dataProvider'=>$dataProvider));
  } 
}
?>
