<?php
class CustomAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	$relation_id=$_REQUEST['relation_id'];
  	$model=TuanduiCustom::model();
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
		   $cell_phone=$_REQUEST['cell_phone'];
       if(!empty($cell_phone)){
			   array_push($conditions,"t.cell_phone = :cell_phone");
			   $params[':cell_phone']=$cell_phone;
			   $page_params['cell_phone']=$cell_phone;
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
			    'with'=>array("User","Tuandui"),
			
			),
		  'pagination'=>array(
          'pageSize' => '20',
          'params' => $page_params,
      ),
      'sort'=>$sort,
		));
		
		
		$this->display('custom',array('model'=>$model,'page_params'=>$page_params,'dataProvider'=>$dataProvider,'relation_id'=>$relation_id));
  } 
}
?>
