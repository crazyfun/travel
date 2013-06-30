<?php
class IndexAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	
  	$model=TravelAgency::model();
  	 //定义搜索条件组合的array
		 $conditions=array();
		 $params=array();
		 $page_params=array();

		   //组合搜索条件
       
       $agency_name=$_REQUEST['agency_name'];
       if(!empty($agency_name)){
			   array_push($conditions,"t.agency_name LIKE :agency_name");
			   $params[':agency_name']="%$agency_name%";
			   $page_params['agency_name']=$agency_name;
		   }

		    $agency_address=$_REQUEST['agency_address'];
       if(!empty($agency_address)){
			   array_push($conditions,"t.agency_address LIKE :agency_address");
			   $params[':agency_address']="%$agency_address%";
			   $page_params['agency_address']=$agency_address;
		   }
		   
		    $guide_region_name=$_REQUEST['guide_region_name'];
       if(!empty($guide_region_name)){
			   array_push($conditions,"t.guide_region_name LIKE :guide_region_name");
			   $params[':guide_region_name']="%$guide_region_name%";
			   $page_params['guide_region_name']=$guide_region_name;
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
