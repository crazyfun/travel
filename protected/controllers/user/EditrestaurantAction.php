<?php
class EditrestaurantAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="editrestaurant";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'修改酒店信息');
        $this->controller->set_seo('修改酒店信息','','');
        return true;
    }
   protected function do_action(){
		$user_id=Yii::app()->user->id;
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
		$this->display('editrestaurant',array('model'=>$model,'regions'=>$regions));
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