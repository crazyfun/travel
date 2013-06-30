<?php
class EditguidedateAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_page();
        $this->controller->tag="gscheduler";
        return true;
    }
   protected function do_action(){
		$user_id=Yii::app()->user->id;
		$id=$_REQUEST['id'];
		$model=new GuideDate();
		$model_name=ucfirst(get_class($model));
		$is_reload=false;
		if($_POST[$model_name]){
			$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
			$model->attributes=$_POST[$model_name];
			$model->user_id=$user_id;
			if($model->validate()){
				 if(empty($model->start_date)){
				 	   $model->start_date=date("Y-m-d");
				 }
				 if(empty($model->end_date)){
				   $model->date=$model->start_date;
				   $result=$model->insert_datas();
				   if($result){
				   	$is_reload=true;
		    		$this->controller->f(CV::SUCCESS);
		    	 }
				 }else{
				 	 if($model->end_date<=$model->start_date){
				 	 	  $model->addError("end_date","结束时间必须大于开始时间");
				 	 }else{
				 	 		$start_time=strtotime($model->start_date);
				 	 		$end_time=strtotime($model->end_date);
				 	 		$diff_time=Util::diff_days($end_time,$start_time);
				 	 		$day_time=86400;
				 	 		for($ii=0;$ii<=$diff_time;$ii++){
  	        		$date=date('Y-m-d',$start_time+($day_time*$ii));
  	        		$new_model=$model->find("date=:current_date AND user_id=:user_id",array(':current_date'=>$date,':user_id'=>$user_id));	
  	        		if(!empty($new_model)){
  	        			$new_model->attributes=$_POST[$model_name];
  	        			$new_model->user_id=$user_id;
  	        			$new_model->insert_datas();
  	        		}else{
  	        			$model->id=NULL;
  	        		  $model->setIsNewRecord(true);
  	        		  $model->date=$date;
  	        		  $result=$model->insert_datas();
  	        	  }
				 	 		}
				 	 		$is_reload=true;
				 	 		$this->controller->f(CV::SUCCESS);
				 }
		    }	
		  }else{
			  $this->controller->f(CV::FAIL);
		  }
		}else{
			
       $model=empty($id)?$model:$model->findByPk($id);
       $model->start_date=$model->date;
		}
		$this->display('addguidedate',array('model'=>$model,'is_reload'=>$is_reload));
  }

}
?>