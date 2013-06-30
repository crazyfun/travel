<?php
class ApplyagencyAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="applyagency";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'申请旅行社');
        $this->controller->set_seo('申请旅行社','','');
        return true;
    }
   protected function do_action(){
   	 
		$user_id=Yii::app()->user->id;
		$user_type=UserType::model();
		$type_value=$user_type->get_user_type($user_id);
		switch($type_value){
    case '1':
		$model=new TravelAgency();
		$model_name=ucfirst(get_class($model));
		$regions=$this->get_regions();
		if($_POST[$model_name]){
			$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
          $agency_logo=$model->agency_logo;
		  $model->attributes=$_POST[$model_name];
		  $model->describe=nl2br($model->describe);
		  $model->coordinate=$_POST['coordinate'];
		  //判断是否是修改图片
		  $agency_logo_flag=$_REQUEST['select_agency_logo'];
		  if(!$agency_logo_flag){
		     $upload_file=CUploadedFile::getInstance($model,'agency_logo');
		     if(!empty($upload_file->name)){
					  $model->agency_logo=Util::rename_file($upload_file->name);
			   }
			}else{
				 $model->agency_logo=$agency_logo;
			}
		
      $model->agency_region=$_POST['region_id'];
      $model->guide_region_name=$_POST['region_name'];
			if($model->validate()){
				  //上传图片
				if(!$agency_logo_flag&&($upload_file!=null)&&!empty($model->agency_logo)){
				  $save_path="upload/travelagency";
			      Util::makeDirectory($save_path);
				  $upload_file->saveAs($save_path."/".$model->agency_logo);
				  Util::cut_image(98,60,$save_path,$model->agency_logo);
				  Util::cut_image(160,98,$save_path,$model->agency_logo);
				  Util::cut_image(180,450,$save_path,$model->agency_logo);
				  Util::cut_image(150,110,$save_path,$model->agency_logo);
				  $model->agency_logo=$save_path."/".$model->agency_logo;
			  }
		    	$result=$model->insert_datas();
		    	if($result){
		    		$user_type=UserType::model();
		    		$user_type->updateAll(array('type'=>'3'),'user_id=:user_id',array(':user_id'=>$user_id));
		    		
		    		$sys_config=SysConfig::model();
						$all_syscfg_values=$sys_config->get_all_syscfg();
						$sfc_notice_mail=$all_syscfg_values['sfc_notice_mail'];
		    		$send_mail=new SendMail();
		    		$send_mail->send_mail(30,$sfc_notice_mail,array('agency_name'=>$model->agency_name),array());
		    		//$this->controller->f(CV::SUCCESS);
		    		$this->controller->redirect($this->controller->createUrl("user/agency"));
		    	}
		    	$model->describe=Util::br2nl($model->describe);
		  }else{
		  	$model->describe=Util::br2nl($model->describe);
			  $this->controller->f(CV::FAIL);
		  }
		}else{
			   
		}
		$this->display('applyagency',array('model'=>$model,'regions'=>$regions));
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