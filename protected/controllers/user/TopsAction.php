<?php
class TopsAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'信息置顶');
        $this->controller->set_seo('信息置顶','','');
        return true;
    }
   protected function do_action(){
   
   	  $user_id=Yii::app()->user->id;
   	  $model=new Tops();
   	  $model_name=ucfirst(get_class($model));
   	  if($_POST[$model_name]){
   	  	$model=!empty($_POST[$model_name]['id'])?$model->findByPk($_POST[$model_name]['id']):$model;
   	  	$model->attributes=$_POST[$model_name];
   	  	$model->hours=$_POST['hours'];
   	  	$model->status='1';
   	  	$model->open='1';
   	  	$model->user_id=$user_id;
   	  	if(empty($model->start_date)){
   	  		$model->start_date=date('Y-m-d',mktime(0,0,0, date("m"),date("d")+1,date("Y")));
   	  	}
   	  	if(empty($model->start_time)){
   	  		$model->start_time=date('H:00:00',mktime(date("H")+1,date("i"),date("s"),date("m"),date("d"),date("Y")));
   	  	}
   	  	if($model->validate()){
			  	$result=$model->insert_datas();
			 	  if($result){
			 	  	$this->controller->f(CV::SUCCESS);
			 	 	  $this->controller->redirect($this->controller->createUrl("user/tops2",array('id'=>$model->id)));
			 	  }else{
			 	  	$this->controller->f(CV::FAIL);
			 	  }
			 	}else{
			 		$this->controller->f(CV::FAIL);
			 	}
   	  }else{
   	  	
   	  	$id=$_REQUEST['id'];
   	  	if(!empty($id)){
   	  		 $model=$model->findByPk($id);
   	   }else{
   	   	$type=$_REQUEST['type'];
   	   	$relation_id=$_REQUEST['relation_id'];
   	  	if(empty($type)){
   	  		$this->controller->redirect("/error/error404");
   	  	}
   	  	if(!empty($relation_id)){
   	  		$model->relation_id=$relation_id;
   	  	}
   	  	switch($type){
					case '1':
		  			$guide=Guide::model();
		  			$guide_data=$guide->find(array('condition'=>'user_id=:user_id','params'=>array(':user_id'=>$user_id)));
		  			$status=$guide_data->status;
		  			if($status!='2'){
		  				$this->controller->redirect("/error/error404");
		  			}
		  			$model->relation_id=$guide_data->id;
		 			  break;
					case '2':
		  			$agency=TravelAgency::model();
		  			$agency_data=$agency->find(array('condition'=>'user_id=:user_id','params'=>array(':user_id'=>$user_id)));
		  			$status=$agency_data->status;
		  			if($status!='2'){
		  				$this->controller->redirect("/error/error404");
		  			}
		  			$model->relation_id=$agency_data->id;
		  			break;
					case '3':
		  			$restaurant=TravelRestaurant::model();
		  			$restaurant_data=$restaurant->find(array('condition'=>'user_id=:user_id','params'=>array(':user_id'=>$user_id)));
		  			$status=$restaurant_data->status;
		  			if($status!='2'){
		  				$this->controller->redirect("/error/error404");
		  			}
		  			$model->relation_id=$restaurant_data->id;
		  			break;
		  	  case '4':
		  	    $agency_date=AgencyDate::model();
		  			$agency_date_data=$agency_date->find(array('condition'=>'id=:id','params'=>array(':id'=>$relation_id)));
		  			$model->relation_id=$agency_date_data->id;
		  	    break;
		  	  default:
		  	    break;
   	  }
   	  $model->type=$type;
   	}
  }
   	  $config_values=ConfigValues::model();
   	  $top_hours=$config_values->get_values('1');
   	  $user=User::model();
   	  $user=$user->findByPk($user_id);
			$this->display("tops",array('model'=>$model,'top_hours'=>$top_hours,'user'=>$user));
  }

}
?>