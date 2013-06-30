<?php
class ApplyguidesAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="applyguides";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'申请导游');
        $this->controller->set_seo('申请导游','','');
        return true;
    }
   protected function do_action(){
		$user_id=Yii::app()->user->id;
		$user=User::model();
		$user=$user->findByPk($user_id);
		$user_type=UserType::model();
		$type_value=$user_type->get_user_type($user_id);
		switch($type_value){
    case '1':
		$model=new Guide();
		$model_name=ucfirst(get_class($model));
		$regions=$this->get_regions();
		if($_POST[$model_name]){
			$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
      $guide_avater=$model->guide_avater;
      $guide_pass=$model->guide_pass;
		  $model->attributes=$_POST[$model_name];
		  $model->describe=nl2br($model->describe);
		  //判断是否是修改图片
		  $guide_avater_flag=$_REQUEST['select_guide_avater'];
		  if(!$guide_avater_flag){
		     $upload_file1=CUploadedFile::getInstance($model,'guide_avater');
		     if(!empty($upload_file1->name)){
					  $model->guide_avater=Util::rename_file($upload_file1->name);
			   }
			}else{
				 $model->guide_avater=$guide_avater;
			}
			
			$guide_pass_flag=$_REQUEST['select_guide_pass'];
		  if(!$guide_pass_flag){
		     $upload_file2=CUploadedFile::getInstance($model,'guide_pass');
		     if(!empty($upload_file2->name)){
					  $model->guide_pass=Util::rename_file($upload_file2->name);
			   }
			}else{
				 $model->guide_pass=$guide_pass;
			}
			
			
      $model->guide_region=$_POST['region_id'];
      $model->guide_region_name=$_POST['region_name'];
			if($model->validate()){
				
				  //上传图片
				if(!$guide_avater_flag&&($upload_file1!=null)&&!empty($model->guide_avater)){
				  $save_path="upload/guiders";
			    Util::makeDirectory($save_path);
				  $upload_file1->saveAs($save_path."/".$model->guide_avater);
				  Util::cut_image(90,90,$save_path,$model->guide_avater);
				  Util::cut_image(150,110,$save_path,$model->guide_avater);
				  $model->guide_avater=$save_path."/".$model->guide_avater;
			  }
			  
			  if(!$guide_pass_flag&&($upload_file2!=null)&&!empty($model->guide_pass)){
				  $save_path="upload/guiders";
			    Util::makeDirectory($save_path);
				  $upload_file2->saveAs($save_path."/".$model->guide_pass);
				  Util::cut_image(180,450,$save_path,$model->guide_pass);
				  $model->guide_pass=$save_path."/".$model->guide_pass;
			  }
			   
		    	$result=$model->insert_datas();
		    	if($result){
		    		
		    		$user_type=UserType::model();
		    		$user_type->updateAll(array('type'=>'2'),'user_id=:user_id',array(':user_id'=>$user_id));
		    		
		    		$sys_config=SysConfig::model();
						$all_syscfg_values=$sys_config->get_all_syscfg();
						$sfc_notice_mail=$all_syscfg_values['sfc_notice_mail'];
		    		$send_mail=new SendMail();
		    		$send_mail->send_mail(29,$sfc_notice_mail,array('real_name'=>$user->real_name),array());
		    		
		    		//$this->controller->f(CV::SUCCESS);
		    		$this->controller->redirect($this->controller->createUrl("user/guides"));
		    	}
		    	$model->describe=Util::br2nl($model->describe);
		  }else{
		  	$model->describe=Util::br2nl($model->describe);
			  $this->controller->f(CV::FAIL);
		  }
		}else{
	
      
		}
		$this->display('applyguides',array('model'=>$model,'regions'=>$regions,'user'=>$user));
		break;
		case '2':
		  $this->controller->redirect("error/error404");
		  break;
		case '3':
		  $this->controller->redirect("error/error404");
		  break;
		case '4':
		  $this->controller->redirect("error/error404");
		  break;
		default:
		  break;
	 }
  }
  
   function get_regions()
    {
        $model_region = Region::model();
        $regions = $model_region->get_list(0);
        if ($regions)
        {
            $tmp  = array();
            foreach ($regions as $key => $value)
            {
                $tmp[$value['region_id']] = $value['region_name'];
            }
            $regions = $tmp;
        }
       
        return $regions;
    }
    
    

}
?>