<?php
class IndexAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	 $relation_id=$_REQUEST['relation_id'];
  	$model=Car::model();
  	
  	 //定义搜索条件组合的array
		 $conditions=array();
		 $params=array();
		 $page_params=array();

		   //组合搜索条件
       
       $trave_name=$_REQUEST['trave_name'];
       if(!empty($trave_name)){
			   array_push($conditions,"t.trave_name LIKE :trave_name");
			   $params[':trave_name']="%$trave_name%";
			   $page_params['trave_name']=$trave_name;
		   }
		   
		   
		   $use_date=$_REQUEST['use_date'];
       if(!empty($use_date)){
			   array_push($conditions,"t.use_date = :use_date");
			   $params[':use_date']=$use_date;
			   $page_params['use_date']=$use_date;
		   }
		   
		   
		   $car_num=$_REQUEST['car_num'];
       if(!empty($car_num)){
			   array_push($conditions,"t.car_num LIKE :car_num");
			   $params[':car_num']="%$car_num%";
			   $page_params['car_num']=$car_num;
		   }
		   
		   $car_type=$_REQUEST['car_type'];
       if(!empty($car_type)){
			   array_push($conditions,"t.car_type LIKE :car_type");
			   $params[':car_type']="%$car_type%";
			   $page_params['car_type']=$car_type;
		   }
		   
		   $car_driver=$_REQUEST['car_driver'];
       if(!empty($car_driver)){
			   array_push($conditions,"t.car_driver LIKE :car_driver");
			   $params[':car_driver']="%$car_driver%";
			   $page_params['car_driver']=$car_driver;
		   }
		   $cell_phone=$_REQUEST['cell_phone'];
       if(!empty($cell_phone)){
			   array_push($conditions,"t.cell_phone = :cell_phone");
			   $params[':cell_phone']=$cell_phone;
			   $page_params['cell_phone']=$cell_phone;
		   }
		   
		 
		   
		   $status=$_REQUEST['status'];
       if(!empty($status)){
			   array_push($conditions,"t.status = :status");
			   $params[':status']=$status;
			   $page_params['status']=$status;
		   }
		   
		   
		   $service=$_REQUEST['service'];
       if(!empty($service)){
			   array_push($conditions,"t.service = :service");
			   $params[':service']=$service;
			   $page_params['service']=$service;
		   }
		   
		   $create_id=$_REQUEST['create_id'];
       if(!empty($create_id)){
			   array_push($conditions,"(User.id=:uid )");
			   $params[':uid']=$create_id;
			   $page_params['create_id']=$create_id;
		   }
		 
		 
		array_push($conditions,"t.relation_id=:relation_id ");
		$params[':relation_id']=$relation_id;
		$page_params['relation_id']=$relation_id;
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
			    'with'=>array("User","Motorcade"),
			
			),
			'pagination'=>array(
          'pageSize' => '20',
          'params' => $page_params,
      ),
      'sort'=>$sort,
		));
    
		$this->display('index',array('model'=>$model,'page_params'=>$page_params,'dataProvider'=>$dataProvider,'relation_id'=>$relation_id,'conditions'=>$conditions,'params'=>$params));
  } 
}
?>
