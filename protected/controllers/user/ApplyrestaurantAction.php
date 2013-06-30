<?php
class ApplyrestaurantAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="applyrestaurant";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'酒店申请');
        $this->controller->set_seo('酒店申请','','');
        return true;
    }
   protected function do_action(){
		$user_id=Yii::app()->user->id;
		$user_type=UserType::model();
		$type_value=$user_type->get_user_type($user_id);
		switch($type_value){
    case '1':
		$model=new TravelRestaurant();
		$model_name=ucfirst(get_class($model));
		$regions=$this->get_regions();
		if($_POST[$model_name]){
			$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
      $restaurant_logo=$model->restaurant_logo;
		  $model->attributes=$_POST[$model_name];
		  $model->restaurant_desc=nl2br($model->restaurant_desc);
		  $model->coordinate=$_POST['coordinate'];
		  //判断是否是修改图片
		  $restaurant_logo_flag=$_REQUEST['select_restaurant_logo'];
		  if(!$restaurant_logo_flag){
		     $upload_file=CUploadedFile::getInstance($model,'restaurant_logo');
		     if(!empty($upload_file->name)){
					  $model->restaurant_logo=Util::rename_file($upload_file->name);
			   }
			}else{
				 $model->restaurant_logo=$restaurant_logo;
			}
			
		
      $model->restaurant_region=$_POST['region_id'];
      $model->restaurant_region_name=$_POST['region_name'];
			if($model->validate()){
				  //上传图片
				if(!$restaurant_logo_flag&&($upload_file!=null)&&!empty($model->restaurant_logo)){
				  $save_path="upload/travelrestaurant";
			      Util::makeDirectory($save_path);
				  $upload_file->saveAs($save_path."/".$model->restaurant_logo);
				  Util::cut_image(98,60,$save_path,$model->restaurant_logo);
				  Util::cut_image(160,98,$save_path,$model->restaurant_logo);
				  Util::cut_image(180,450,$save_path,$model->restaurant_logo);
				  Util::cut_image(150,110,$save_path,$model->restaurant_logo);
				  $model->restaurant_logo=$save_path."/".$model->restaurant_logo;
			  }

		    	$result=$model->insert_datas();
		    	if($result){
		    		$user_type=UserType::model();
		    		$user_type->updateAll(array('type'=>'4'),'user_id=:user_id',array(':user_id'=>$user_id));
		    		
		    		$sys_config=SysConfig::model();
						$all_syscfg_values=$sys_config->get_all_syscfg();
						$sfc_notice_mail=$all_syscfg_values['sfc_notice_mail'];
		    		$send_mail=new SendMail();
		    		$send_mail->send_mail(31,$sfc_notice_mail,array('restaurant_name'=>$model->restaurant_name),array());
		    		
		    		
		    		//$this->controller->f(CV::SUCCESS);
		    		$this->controller->redirect($this->controller->createUrl("user/restaurant"));
		    	}
		    	$model->restaurant_desc=Util::br2nl($model->restaurant_desc);
		  }else{
		  	$model->restaurant_desc=Util::br2nl($model->restaurant_desc);
			  $this->controller->f(CV::FAIL);
		  }
		}else{
			   
		}
		$this->display('applyrestaurant',array('model'=>$model,'regions'=>$regions));
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