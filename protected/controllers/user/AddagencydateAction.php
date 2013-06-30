<?php
class AddagencydateAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_page();
        $this->controller->tag="myascheduler";
        return true;
    }
   protected function do_action(){
		$user_id=Yii::app()->user->id;
		$current_date=$_REQUEST['current_date'];
		$model=new AgencyDate();
		$model_name=ucfirst(get_class($model));
		$is_reload=false;
		if($_POST[$model_name]){
			$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
			$model->attributes=$_POST[$model_name];
			$model->user_id=$user_id;
			if($model->validate()){
				 	 if($model->end_date<=$model->start_date){
				 	 	  $model->addError("end_date","结束时间必须大于开始时间");
				 	 }else{	
  	        $result=$model->insert_datas();
  	        if($result){
				 	 		$is_reload=true;
				 	 		$this->controller->f(CV::SUCCESS);
				 	 	}
				   }
		  }else{
			  $this->controller->f(CV::FAIL);
		  }
		}else{
			 $model->start_date=$current_date;
		}
		$this->display('addagencydate',array('model'=>$model,'is_reload'=>$is_reload));
  }
  
}
?>