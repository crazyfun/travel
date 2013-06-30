<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	public $tag;
	public $pageTitle="";
	public $seo_description="";
	public $seo_keywords="";
	
  public function createUrl($route,$params=array(),$ampersand='&')
	{
		if($route==='')
			$route=$this->getId().'/'.$this->getAction()->getId();
		else if(strpos($route,'/')===false)
			$route=$this->getId().'/'.$route;
		if($route[0]!=='/' && ($module=$this->getModule())!==null)
			$route=$module->getId().'/'.$route;
			
	  $ip_convert=IpConvert::get();
		$region_session=$ip_convert->init_region();  	 		 	    
		$region_id=$region_session['id'];
    $params['diqu']=$region_id;
		return Yii::app()->createUrl(trim($route,'/'),$params,$ampersand);
	}
	
	
	/*
	  设置成功信息
	*/
	public function set_flash($msg,$flash){
		 switch($flash){
		 		case CV::SUCCESS:
		 		     Yii::app()->user->setFlash(CV::SUCCESS,$msg);
		 				break;
		 		case CV::FAIL:
		 		    Yii::app()->user->setFlash(CV::FAIL,$msg);
		 				break;
		 		case CV::TIP:
		 		    Yii::app()->user->setFlash(CV::TIP,$msg);
		 		    break;
		 		default:
		 				break;	
		 	
		 }
	}
	public function set_seo($title="",$keyword=array(),$description=""){
		$sys_config=SysConfig::model();
		$all_syscfg_values=$sys_config->get_all_syscfg();
		$title=empty($title)?("-".$all_syscfg_values['sfc_web_title']):($title."-".$all_syscfg_values['sfc_web_title']);
		$this->pageTitle=$title;
		$description=empty($description)?$all_syscfg_values['sfc_web_description']:$description;
		$this->seo_description=$description;
		$keyword=empty($keyword)?$all_syscfg_values['sfc_web_keywords']:$keyword;
		$this->seo_keywords=$keyword;
	}
    	//初始化需要的数据
	function init_main_page(){
		$this->layout="main";
		Util::reset_vars();
	}
	function init_page(){
		$this->layout="none";
		Util::reset_vars();
	}
	
	  	//初始化需要的数据
	function init_user_page(){
		$this->layout="user";
		Util::reset_vars();
	}
	
	
	function init_baidumaps_page(){
		$this->layout="baidumaps";
		Util::reset_vars();
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
