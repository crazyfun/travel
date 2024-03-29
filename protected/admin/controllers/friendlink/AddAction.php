<?php
class AddAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){ 
  	$model=new Friendlink();
  	$model_name=get_class($model);
  	if(isset($_POST[$model_name])){
  		$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
  		$friendlink_img=$model->friendlink_img;
		  $model->attributes=$_POST[$model_name];
		  //�ж��Ƿ����޸�ͼƬ
		  $select_friendlink_img=$_REQUEST['select_friendlink_img'];
		  if(!$select_friendlink_img){
		     $upload_file=CUploadedFile::getInstance($model, 'friendlink_img');
		     if(!empty($upload_file->name)){
					  $model->friendlink_img=Util::rename_file($upload_file->name);
			   }
			}else{
				 $model->friendlink_img=$friendlink_img;
			}
			if($model->validate()){
				//�ϴ�ͼƬ
				if(($upload_file!=null)&&!empty($model->friendlink_img)){
				  $save_path="upload/friendlink";
			    Util::makeDirectory($save_path);
				  $upload_file->saveAs($save_path."/".$model->friendlink_img);
				  Util::cut_image(15,15,$save_path,$model->friendlink_img);
				  $model->friendlink_img=$save_path."/".$model->friendlink_img;
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
