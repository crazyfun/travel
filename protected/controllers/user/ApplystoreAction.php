<?php
class ApplystoreAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="applystore";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'申请商铺');
        $this->controller->set_seo('申请商铺','','');
        return true;
    }
   protected function do_action(){
		$user_id=Yii::app()->user->id;
	  $model=new Station("StoreRegiste");
		$model_name=ucfirst(get_class($model));
		$regions=$this->get_regions();
		if($_POST[$model_name]){
			$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
      $store_logo=$model->store_logo;
      $store_banner=$model->store_banner;
      $company_logo=$model->company_logo;
      $model->setScenario("StoreRegiste");
		  $model->attributes=$_POST[$model_name];
		  $model->coordinate=$_POST['coordinate'];
		  //判断是否是修改图片
		  $store_logo_flag=$_REQUEST['select_store_logo'];
		  if(!$store_logo_flag){
		     $upload_file=CUploadedFile::getInstance($model,'store_logo');
		     if(!empty($upload_file->name)){
					  $model->store_logo=Util::rename_file($upload_file->name);
			   }
			}else{
				 $model->store_logo=$store_logo;
			}
			 $store_banner_flag=$_REQUEST['select_store_banner'];
		  if(!$store_banner_flag){
		     $upload_file=CUploadedFile::getInstance($model,'store_banner');
		     if(!empty($upload_file->name)){
					  $model->store_banner=Util::rename_file($upload_file->name);
			   }
			}else{
				 $model->store_banner=$store_banner;
			}
			 $company_logo_flag=$_REQUEST['select_company_logo'];
		  if(!$company_logo_flag){
		     $upload_file=CUploadedFile::getInstance($model,'company_logo');
		     if(!empty($upload_file->name)){
					  $model->company_logo=Util::rename_file($upload_file->name);
			   }
			}else{
				 $model->company_logo=$company_logo;
			}
      $model->store_area=$_POST['region_id'];
      $model->store_area_name=$_POST['region_name'];
			if($model->validate()){
				  //上传图片
				if(!$store_logo_flag&&($upload_file!=null)&&!empty($model->store_logo)){
				  $save_path="upload/store";
			     Util::makeDirectory($save_path);
				  $upload_file->saveAs($save_path."/".$model->store_logo);
				  $model->store_logo=$save_path."/".$model->store_logo;
			  }
			  
			  if(!$store_banner_flag&&($upload_file!=null)&&!empty($model->store_banner)){
				  $save_path="upload/store";
			     Util::makeDirectory($save_path);
				  $upload_file->saveAs($save_path."/".$model->store_banner);
				  $model->store_banner=$save_path."/".$model->store_banner;
			  }
			  
			  if(!$company_logo_flag&&($upload_file!=null)&&!empty($model->company_logo)){
				  $save_path="upload/store";
			    Util::makeDirectory($save_path);
				  $upload_file->saveAs($save_path."/".$model->company_logo);
				  $model->company_logo=$save_path."/".$model->company_logo;
			  }
		    	$result=$model->insert_datas();
		    	if($result){
		    		$sys_config=SysConfig::model();
						$all_syscfg_values=$sys_config->get_all_syscfg();
						$sfc_notice_mail=$all_syscfg_values['sfc_notice_mail'];
		    		$send_mail=new SendMail();
		    		$send_mail->send_mail(32,$sfc_notice_mail,array('shop_name'=>$model->name),array());
		    		$this->controller->redirect($this->controller->createUrl("user/storepay",array('id'=>$model->id)));
		    	}
		  }else{
			  $this->controller->f(CV::FAIL);
		  }
		}else{
			   $user_type=UserType::model();
				 $type_value=$user_type->get_user_type($user_id);
				switch($type_value){
					case '1':
		  			$this->controller->redirect("/error/error404");
		 			  break;
					case '2':
		  			$this->controller->redirect("/error/error404");
		 			  break;
					case '3':
		  			$agency=TravelAgency::model();
		  			$agency_data=$agency->find(array('condition'=>'user_id=:user_id','params'=>array(':user_id'=>$user_id)));
		  			$model->company=$agency_data->agency_name;
		  			$model->store_phone=$agency_data->agency_telephone;
		  			$model->store_fax=$agency_data->agency_fax;
		  			$model->store_address=$agency_data->agency_address;
		  			$model->coordinate=$agency_data->coordinate;
		  			$model->contacter=$agency_data->contacter;
		  			$model->contacter_phone=$agency_data->contacter_phone;
		  			$model->contacter_qq=$agency_data->contacter_qq;
		  			$model->store_describe=$agency_data->describe;
		  			$model->store_area=$agency_data->agency_region;
		  			$model->store_area_name=$agency_data->guide_region_name;
		  			break;
					case '4':
		  			$restaurant=TravelRestaurant::model();
		  			$restaurant_data=$restaurant->find(array('select'=>'restaurant_region,coordinate,restaurant_region_name,restaurant_name,restaurant_telephone,restaurant_address,restaurant_desc,contacter,contacter_phone,contacter_qq','condition'=>'user_id=:user_id','params'=>array(':user_id'=>$user_id)));
		  			$model->company=$restaurant_data->restaurant_name;
		  			$model->store_phone=$restaurant_data->restaurant_telephone;
		  			$model->store_address=$restaurant_data->restaurant_address;
		  			$model->coordinate=$restaurant_data->coordinate;
		  			$model->contacter=$restaurant_data->contacter;
		  			$model->contacter_phone=$restaurant_data->contacter_phone;
		  			$model->contacter_qq=$restaurant_data->contacter_qq;
		  			$model->store_describe=$restaurant_data->restaurant_desc;
		  			$model->store_area=$restaurant_data->restaurant_region;
		  			$model->store_area_name=$restaurant_data->restaurant_region_name;
		  		break;
					default:
		 			 break;
	 			}
		}
		$this->display('applystore',array('model'=>$model,'regions'=>$regions));
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