<?php
class TousuAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	
  	$relation_id=$_REQUEST['relation_id'];
  	$model=Tousu::model();
  	
  	 //定义搜索条件组合的array
		 $conditions=array();
		 $params=array();
		 $page_params=array();
		 
		   //组合搜索条件

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
		   
		   $message=$_REQUEST['message'];
       if(!empty($message)){
			   array_push($conditions,"t.message LIKE :message");
			   $params[':message']="%$message%";
			   $page_params['message']=$message;
		   }
		   
		   $status=$_REQUEST['status'];
       if(!empty($status)){
			   array_push($conditions,"t.status = :status");
			   $params[':status']=$status;
			   $page_params['status']=$status;
		   }
		   
		   $create_id=$_REQUEST['create_id'];
       if(!empty($create_id)){
			   array_push($conditions,"(User.id=:uid )");
			   $params[':uid']=$create_id;
			   $page_params['create_id']=$create_id;
		   }
		   
		   $operate_id=$_REQUEST['operate_id'];
       if(!empty($operate_id)){
			   array_push($conditions,"(Operate.id=:uid )");
			   $params[':uid']=$operate_id;
			   $page_params['operate_id']=$operate_id;
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
			    'with'=>array("User","Dijieshe"),
			
			),
			'pagination'=>array(
          'pageSize' => '20',
          'params' => $page_params,
      ),
      'sort'=>$sort,
		));
		
		
		$this->display('tousu',array('model'=>$model,'page_params'=>$page_params,'dataProvider'=>$dataProvider,'relation_id'=>$relation_id));
  } 
}
?>
