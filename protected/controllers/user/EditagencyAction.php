<?php
class EditagencyAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="editagency";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'修改旅行社信息');
        $this->controller->set_seo('修改旅行社信息','','');
        return true;
    }
   protected function do_action(){
		$user_id=Yii::app()->user->id;
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
		    		$this->controller->f(CV::SUCCESS);
		    	}
		    	$model->describe=Util::br2nl($model->describe);
		  }else{
		  	$model->describe=Util::br2nl($model->describe);
			  $this->controller->f(CV::FAIL);
		  }
		}else{
			   $model=empty($user_id)?$model:$model->with("User")->find("user_id=:user_id",array(':user_id'=>$user_id));
			   $model->describe=Util::br2nl($model->describe);
		}
		$this->display('editagency',array('model'=>$model,'regions'=>$regions));
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