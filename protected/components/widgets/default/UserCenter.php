<?php
class UserCenter extends CWidget
{
    public function run(){
    	 if(Util::check_user()){
    	 	require_once('config.inc.php');
  			require_once('uc_client/client.php');
    	 	$user=User::model();
    	 	$user=$user->findByPk(Yii::app()->user->id);
    	 	$this->render('user_center',array('user'=>$user));
    	 }else{
    	 	$this->render('no_user',array('user'=>$user));
    	 }
       
    }
  
}
