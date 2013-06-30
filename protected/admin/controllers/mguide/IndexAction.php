<?php
class IndexAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	
  	$model=Guide::model();
  	 //定义搜索条件组合的array
		 $conditions=array();
		 $params=array();
		 $page_params=array();

		   //组合搜索条件
       
       $real_name=$_REQUEST['real_name'];
       if(!empty($real_name)){
			   array_push($conditions,"User.real_name LIKE :real_name");
			   $params[':real_name']="%$real_name%";
			   $page_params['real_name']=$real_name;
		   }
		   
		   
		    $guide_number=$_REQUEST['guide_number'];
       if(!empty($guide_number)){
			   array_push($conditions,"t.guide_number LIKE :guide_number");
			   $params[':guide_number']="%$guide_number%";
			   $page_params['guide_number']=$guide_number;
		   }
		   
		    $guide_cade=$_REQUEST['guide_cade'];
       if(!empty($guide_cade)){
			   array_push($conditions,"t.guide_cade LIKE :guide_cade");
			   $params[':guide_cade']="%$guide_cade%";
			   $page_params['guide_cade']=$guide_cade;
		   }
		   
		   $guide_level=$_REQUEST['guide_level'];
       if(!empty($guide_level)){
			   array_push($conditions,"t.guide_level = :guide_level");
			   $params[':guide_level']=$guide_level;
			   $page_params['guide_level']=$guide_level;
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
