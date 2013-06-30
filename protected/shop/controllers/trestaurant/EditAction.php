<?php
class EditAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
    $model=new Restaurant();
  	$model_name=get_class($model);
  	if(isset($_POST[$model_name])){
  		$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
  		$restaurant_img=$model->restaurant_img;
      $model->attributes=$_POST[$model_name];
      //ÅÐ¶ÏÊÇ·ñÊÇÐÞ¸ÄÍ¼Æ¬
		  $select_flag=$_REQUEST['select_restaurant_img'];
		  if(!$select_flag){
		     $upload_file=CUploadedFile::getInstance($model,'restaurant_img');
		     if(!empty($upload_file->name)){
					  $model->restaurant_img=Util::rename_file($upload_file->name);
			   }
			}else{
				 $model->restaurant_img=$restaurant_img;
			}
			if($model->validate()){
				$station_data=$this->controller->station_data;
		    $station_id=$station_data['id'];
		    $model->station_id=$station_id;
		    	//ÉÏ´«Í¼Æ¬
				if(($upload_file!=null)&&!empty($model->restaurant_img)){
				  $save_path="upload/restaurant";
			    Util::makeDirectory($save_path);
				  $upload_file->saveAs($save_path."/".$model->restaurant_img);
				  $model->restaurant_img=$save_path."/".$model->restaurant_img;
			  }
			  $model->insert_datas();
			  $this->controller->f(CV::SUCCESS_ADMIN_OPERATE);
		  }else{
			  $this->controller->f(CV::FAILED_ADMIN_OPERATE);
		  }
		}else{
			$id=$_REQUEST['id'];
			if(empty($id)){
				$this->controller->redirect($this->controller->createUrl("error/error403"));
			}
			$model=!empty($id)?$model->get_table_datas($id,array()):$model;
			$station_data=$this->controller->station_data;
  		if($model->station_id!=$station_data['id']){
  			$this->controller->redirect($this->controller->createUrl("error/error403"));
  		}
		}
		$this->display('add',array('model'=>$model));
  } 
}
?>
