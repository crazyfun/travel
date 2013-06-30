<?php
class EditAction extends BaseAction{
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
		$model=new TravelRestaurant();
		$model_name=ucfirst(get_class($model));
		$regions=$this->get_regions();
		if($_POST[$model_name]){
			$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
      $restaurant_logo=$model->restaurant_logo;
		  $model->attributes=$_POST[$model_name];
		  $model->restaurant_desc=nl2br($model->restaurant_desc);
		  $model->coordinate=$_POST['coordinate'];
		  //ÅÐ¶ÏÊÇ·ñÊÇÐÞ¸ÄÍ¼Æ¬
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
				  //ÉÏ´«Í¼Æ¬
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
		    		
		    		$this->controller->f(CV::SUCCESS);
		    	}
		    	$model->restaurant_desc=Util::br2nl($model->restaurant_desc);
		  }else{
		  	$model->restaurant_desc=Util::br2nl($model->restaurant_desc);
			  $this->controller->f(CV::FAIL);
		  }
		}else{
			   $model=empty($user_id)?$model:$model->with("User")->find("user_id=:user_id",array(':user_id'=>$user_id));
		     $model->restaurant_desc=Util::br2nl($model->restaurant_desc);
		}
		$this->display('edit',array('model'=>$model,'regions'=>$regions));
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
