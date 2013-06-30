<?php
class IndexAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	 $model=Tcustoms::model();
  	 //定义搜索条件组合的array
		 $conditions=array();
		 $params=array();
		 $page_params=array();

		   //组合搜索条件
		   
		   $company=$_REQUEST['company'];
       if(!empty($company)){
			   array_push($conditions,"t.company LIKE :company");
			   $params[':company']="%$company%";
			   $page_params['company']=$company;
		   }
		   
		   
		   
       $name=$_REQUEST['name'];
       if(!empty($name)){
			   array_push($conditions,"t.name LIKE :name");
			   $params[':name']="%$name%";
			   $page_params['name']=$name;
		   }
		   
		   $cell_phone=$_REQUEST['cell_phone'];
       if(!empty($cell_phone)){
			   array_push($conditions,"t.cell_phone = :cell_phone");
			   $params[':cell_phone']=$cell_phone;
			   $page_params['cell_phone']=$cell_phone;
		   }
		   
		   $tele_phone=$_REQUEST['tele_phone'];
       if(!empty($tele_phone)){
			   array_push($conditions,"t.tele_phone LIKE :tele_phone");
			   $params[':tele_phone']="%$tele_phone%";
			   $page_params['tele_phone']=$tele_phone;
		   }
		   
		   
		   $sex=$_REQUEST['sex'];
       if(!empty($sex)){
			   array_push($conditions,"t.sex = :sex");
			   $params[':sex']=$sex;
			   $page_params['sex']=$sex;
		   }
		   

		   $create_id=$_REQUEST['create_id'];
       if(!empty($create_id)){
			   array_push($conditions,"( t.create_id=:uid )");
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
		$this->display('index',array('model'=>$model,'page_params'=>$page_params,'dataProvider'=>$dataProvider,'show_dijieshe'=>$show_dijieshe));
  } 
}
?>
