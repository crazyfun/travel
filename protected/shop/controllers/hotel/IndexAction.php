<?php
class IndexAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	 
  	 $model=Hotel::model();
  	 //定义搜索条件组合的array
		 $conditions=array();
		 $params=array();
		 $page_params=array();
	
		   //组合搜索条件
       $hotel_name=$_REQUEST['hotel_name'];
       if(!empty($hotel_name)){
			   array_push($conditions,"t.hotel_name LIKE :hotel_name");
			   $params[':hotel_name']="%$hotel_name%";
			   $page_params['hotel_name']=$hotel_name;
		   }
		   
		   
		   $hotel_level=$_REQUEST['hotel_level'];
       if(!empty($hotel_level)){
			   array_push($conditions,"t.hotel_level = :hotel_level");
			   $params[':hotel_level']=$hotel_level;
			   $page_params['hotel_level']=$hotel_level;
		   }
		   
		   
		   $hotel_contacter=$_REQUEST['hotel_contacter'];
       if(!empty($hotel_contacter)){
			   array_push($conditions,"t.hotel_contacter LIKE :hotel_contacter");
			   $params[':hotel_contacter']="%$hotel_contacter%";
			   $page_params['hotel_contacter']=$hotel_contacter;
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
