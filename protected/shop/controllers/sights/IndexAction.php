<?php
class IndexAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	 $model=Sights::model();
  	 //定义搜索条件组合的array
		 $conditions=array();
		 $params=array();
		 $page_params=array();
		 
		   //组合搜索条件
       $sights_name=$_REQUEST['sights_name'];
       if(!empty($sights_name)){
			   array_push($conditions,"t.sights_name LIKE :sights_name");
			   $params[':sights_name']="%$sights_name%";
			   $page_params['sights_name']=$sights_name;
		   }
		   
		    $contacter=$_REQUEST['contacter'];
       if(!empty($contacter)){
			   array_push($conditions,"t.contacter LIKE :contacter");
			   $params[':contacter']="%$contacter%";
			   $page_params['contacter']=$contacter;
		   }
		   
		   
		   $cell_phone=$_REQUEST['cell_phone'];
       if(!empty($cell_phone)){
			   array_push($conditions,"t.cell_phone = :cell_phone");
			   $params[':cell_phone']=$cell_phone;
			   $page_params['cell_phone']=$cell_phone;
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
		$this->display('index',array('model'=>$model,'page_params'=>$page_params,'dataProvider'=>$dataProvider,'show_dijieshe'=>$show_dijieshe));
  } 
}
?>
