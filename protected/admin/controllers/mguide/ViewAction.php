<?php
class ViewAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){	
  	$model=$_REQUEST['model'];
  	$id=$_REQUEST['id'];
  	$model=new $model("ShenHe");
  	$model=!empty($id)?$model->with("User")->get_table_datas($id,array()):$model;
  	$model_name=ucfirst(get_class($model));
  	if($_POST[$model_name]){
  		$model->setScenario("ShenHe");
  		$guide_shenhe_pass=$model->guide_shenhe_pass;
  		$model->attributes=$_POST[$model_name];
  		 //ÅÐ¶ÏÊÇ·ñÊÇÐÞ¸ÄÍ¼Æ¬
		  $guide_shenhe_pass_flag=$_REQUEST['select_guide_shenhe_pass'];
		  if(!$guide_shenhe_pass_flag){
		     $upload_file1=CUploadedFile::getInstance($model,'guide_shenhe_pass');
		     if(!empty($upload_file1->name)){
					  $model->guide_shenhe_pass=Util::rename_file($upload_file1->name);
			   }
			}else{
				 $model->guide_shenhe_pass=$guide_shenhe_pass;
			}
			if($model->validate()){
					  //ÉÏ´«Í¼Æ¬
				if(!$guide_shenhe_pass_flag&&($upload_file1!=null)&&!empty($model->guide_shenhe_pass)){
				  $save_path="upload/guiders";
			    Util::makeDirectory($save_path);
				  $upload_file1->saveAs($save_path."/".$model->guide_shenhe_pass);
				  Util::cut_image(700,350,$save_path,$model->guide_shenhe_pass);
				  $model->guide_shenhe_pass=$save_path."/".$model->guide_shenhe_pass;
			  }
			  $result=$model->insert_datas();
			  if($result){
			  	 $this->controller->f(CV::SUCCESS_ADMIN_OPERATE);
			  }else{
			  	$this->controller->f(CV::FAILED_ADMIN_OPERATE);
			  	
			  }
				
			}
  	}
			$this->display('view',array('model'=>$model));
  } 
}
?>
