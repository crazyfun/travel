<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class AController extends CController{
	public $station_data=array();
  public function FilteraccessControl($filterChain) {
  	if(Yii::app()->user->isGuest){
  		$this->redirect($this->createUrl("site/login"),array());
  		exit();
  	}
    $controller_id=$this->id;
    $action_id=$this->action->id;
    $access_operation=ucfirst($controller_id).ucfirst($action_id);
    $default_access=LeftMenu::get_default_access();
    if(!in_array($access_operation,$default_access)){
		 if(!Yii::app()->user->checkAccess($access_operation))
     {
        $this->redirect($this->createUrl("error/error403"));
     }
    }
		$filterChain->run();
	}
    /**
     * 设置成功的提示信息
     */
   public function sf($msg){
       Yii::app()->user->setFlash(CV::SUCCESS,$msg); 
    }
    /**
     * 设置失败的提示信息
     */
    public function ff($msg){
       Yii::app()->user->setFlash(CV::FAIL,$msg);
    }
    /**
     * 设置提示性的提示信息
     */
  public function tf($msg){
    Yii::app()->user->setFlash(CV::TIP,$msg);
  }  
	public function init_login_page(){
		
		$this->layout="login";
		Util::reset_vars();
	}
    	//初始化需要的数据
	function init_main_page(){	
		$this->set_station_datas();
		$this->layout="main";
		Util::reset_vars();
	}
	function init_page(){
		$this->set_station_datas();
		$this->layout="none";
		Util::reset_vars();
	}
	//设置station_data  防止frame中的session而site页面的session没过期的现象
	function set_station_datas(){
		  $user_id=Yii::app()->user->id;
		  $user=User::model();
		  $user_data=$user->with("Station")->findByPk($user_id);
	    $this->station_data=array('id'=>$user_data->Station->id,'name'=>$user_data->Station->name,'company'=>$user_data->Station->company);	
	   
	}
	/*
	* 根据themes名称获得css的路径
	* @return string css的路径
	* @auther lxf
	* @version 1.0.0
	*/
	function get_css_path(){
	
		return Yii::app()->getTheme()->baseUrl."/css";
	}
	/*
	* 根据themes名称获得js的路径
	* @return string css的路径
	* @auther lxf
	* @version 1.0.0
	*/
	function get_js_path(){
		return Yii::app()->getTheme()->baseUrl."/js";
	}
}
?>
