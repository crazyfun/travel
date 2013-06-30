<?php
class SettingAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="setting";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'个人设置');
        $this->controller->set_seo('个人设置','','');
        return true;
    }
   protected function do_action(){
   
   	$sys_config=SysConfig::model();
		$all_syscfg_values=$sys_config->get_all_syscfg();
		$sfc_message_consume=$all_syscfg_values['sfc_message_consume'];
		$user_id=Yii::app()->user->id;
		$user=new User();
		$model=new UserSetting();
		$model_name=ucfirst(get_class($model));
		if($_POST[$model_name]){
			$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
      $model->attributes=$_POST[$model_name];
			if($model->validate()){
		    	$result=$model->insert_datas();
		    	if($result){
		    		$this->controller->f(CV::SUCCESS);
		    	}
		  }else{
			  $this->controller->f(CV::FAIL);
		  }
		}else{
      		 $model_data=empty($user_id)?$model:$model->find("t.user_id=:user_id",array(":user_id"=>$user_id));
      		 if(empty($model_data)){
      		 	  $model->user_id=$user_id;
      		 	  $model->insert_datas();
      		 }else{
      		 	 $model=$model_data;
      		}
      		 
		}
	  $user_data=$user->findByPk($user_id);
		$this->display('setting',array('model'=>$model,'user_data'=>$user_data,'sfc_message_consume'=>$sfc_message_consume));	
  }

}
?>