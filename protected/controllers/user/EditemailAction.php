<?php
class EditemailAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="editemail";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'修改邮箱');
        $this->controller->set_seo('修改邮箱','','');
        return true;
    }
   protected function do_action(){
   	  require_once('config.inc.php');
  	  require_once('uc_client/client.php');
   	  $user_id=Yii::app()->user->id;
			$model=new User("EditEmail");
			$model_name=ucfirst(get_class($model));
			if($_POST[$model_name]){
				$model=!empty($_POST[$model_name]['id'])?$model->findByPk($_POST[$model_name]['id']):$model;
				$user_email=$model->user_email;
				if($user_email==$_POST[$model_name]['user_email']){
					$model->addError('user_email',"邮箱不能相同");
				}else{
				$model->setScenario("EditEmail");
      	$model->attributes=$_POST[$model_name];
				if($model->validate()){
		    		$result=$model->insert_datas();
		    		if($result){
		    			$user_email=$model->user_email;
		    			$ucresult = uc_user_edit($model->user_login,"","",$user_email,'1');
		    			$this->controller->f(CV::SUCCESS);
		    		}
		  	}else{
			     $this->controller->f(CV::FAIL);
		  	}
		   }
			}else{
      	 $model=empty($user_id)?$model:$model->findByPk($user_id);
      	 $user_email=$model->user_email;
			}
			$this->display('edit_email',array('model'=>$model,'user_email'=>$user_email));
  }

}
?>