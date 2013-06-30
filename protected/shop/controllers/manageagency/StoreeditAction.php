<?php
class StoreeditAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
    $station_data=$this->controller->station_data;
		 $station_id=$station_data['id'];
		 $station=Station::model();
		 $station_data=$station->findByPk($station_id);
		 $user_id=$station_data->user_id;
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
		  //ÅÐ¶ÏÊÇ·ñÊÇÐÞ¸ÄÍ¼Æ¬
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
				  //ÉÏ´«Í¼Æ¬
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
		    		$this->controller->redirect($this->controller->createUrl("manageagency/store"));
		    	}
		  }else{
			  $this->controller->f(CV::FAIL);
		  }
		}else{
			  $model=$model->find('t.user_id=:user_id',array(':user_id'=>$user_id));
			  
		}
		$this->display('storeedit',array('model'=>$model,'regions'=>$regions));
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
