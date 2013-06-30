<?php
class IndexAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	$model=Station::model();
  	 //定义搜索条件组合的array
		 $conditions=array();
		 $params=array();
		 $page_params=array();
		   //组合搜索条件
       $name=$_REQUEST['name'];
       if(!empty($name)){
			   array_push($conditions,"t.name LIKE :name");
			   $params[':name']="%$name%";
			   $page_params['name']=$name;
		   }

		   
		    $company=$_REQUEST['company'];
       if(!empty($company)){
			   array_push($conditions,"t.company LIKE :company");
			   $params[':company']="%$company%";
			   $page_params['company']=$company;
		   }
		   
		   
		    $store_area_name=$_REQUEST['store_area_name'];
       if(!empty($store_area_name)){
			   array_push($conditions,"t.store_area_name LIKE :store_area_name");
			   $params[':store_area_name']="%$store_area_name%";
			   $page_params['store_area_name']=$store_area_name;
		   }
		   
		    $store_address=$_REQUEST['store_address'];
       if(!empty($store_address)){
			   array_push($conditions,"t.store_address LIKE :store_address");
			   $params[':store_address']="%$store_address%";
			   $page_params['store_address']=$store_address;
		   }

			 $is_vip=$_REQUEST['is_vip'];
       if(!empty($is_vip)){
			   array_push($conditions,"t.is_vip = :is_vip");
			   $page_params['is_vip']=$is_vip;
			   $params[':is_vip']=$is_vip;;
		   }
		   
		    $is_top=$_REQUEST['is_top'];
       if(!empty($is_top)){
			   array_push($conditions,"t.is_top = :is_top");
			   $params[':is_top']=$is_top;
			   $page_params['is_top']=$is_top;
		   }
		  
		    $status=$_REQUEST['status'];
       if(!empty($status)){
			   array_push($conditions,"t.status = :status");
			   $params[':status']=$status;
			   $page_params['status']=$status;
		   }
		   
		     $pay_status=$_REQUEST['pay_status'];
       if(!empty($pay_status)){
			   array_push($conditions,"t.pay_status = :pay_status");
			   $params[':pay_status']=$pay_status;
			   $page_params['pay_status']=$pay_status;
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
