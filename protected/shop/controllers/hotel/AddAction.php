<?php
class AddAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
    $model=new Hotel();
  	$model_name=get_class($model);
  	if(isset($_POST[$model_name])){
  		$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
  		$hotel_img=$model->hotel_img;
      $model->attributes=$_POST[$model_name];
      //ÅÐ¶ÏÊÇ·ñÊÇÐÞ¸ÄÍ¼Æ¬
		  $select_flag=$_REQUEST['select_hotel_img'];
		  if(!$select_flag){
		     $upload_file=CUploadedFile::getInstance($model,'hotel_img');
		     if(!empty($upload_file->name)){
					  $model->hotel_img=Util::rename_file($upload_file->name);
			   }
			}else{
				 $model->hotel_img=$hotel_img;
			}
			if($model->validate()){
				$station_data=$this->controller->station_data;
		    $station_id=$station_data['id'];
		    $model->station_id=$station_id;
		    	//ÉÏ´«Í¼Æ¬
				if(($upload_file!=null)&&!empty($model->hotel_img)){
				  $save_path="upload/hotel";
			    Util::makeDirectory($save_path);
				  $upload_file->saveAs($save_path."/".$model->hotel_img);
				  $model->hotel_img=$save_path."/".$model->hotel_img;
			  }
			  $model->insert_datas();
			  $this->controller->f(CV::SUCCESS_ADMIN_OPERATE);
		  }else{
			  $this->controller->f(CV::FAILED_ADMIN_OPERATE);
		  }
		}else{
			$id=$_REQUEST['id'];
			$model=!empty($id)?$model->get_table_datas($id,array()):$model;
		}
		$this->display('add',array('model'=>$model));
  } 
}
?>
