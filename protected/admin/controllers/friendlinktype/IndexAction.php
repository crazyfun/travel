<?php
class IndexAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){
  	 $model=FriendlinkType::model();
  	  //定义搜索条件组合的array
	 $conditions=array();
	 $params=array();
	 $page_params=array();

	   //组合搜索条件
		$type_name=$_REQUEST['type_name'];
		if(!empty($type_name)){
		   array_push($conditions,"t.type_name LIKE :type_name");
		   $params[':type_name']="%$type_name%";
		   $page_params['type_name']=$type_name;
		}
	 
		   
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
	 
	 $this->display('index',array('model'=>$model,'page_params'=>$page_params,'dataProvider'=>$dataProvider));
  } 
}
?>
