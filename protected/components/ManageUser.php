<?php

class ManageUser{
 private static $static_class=null;
 public static function get()
 {
   if (self::$static_class == null){
      self::$static_class =  new ManageUser();
   }
    return self::$static_class;
  }
  public  function __construct()
  {
    
  }
  
  public function get_menus(){
  	
  	$menus=array('default'=>array('name'=>'用户中心','class'=>'user_default','url'=>'','menus'=>array(
  	 'index'=>array(
  	   'name'=>'个人资料',
  	   'url'=>'user/index',
  	   'class'=>'user_index',
  	  ),
  	  'editprofile'=>array(
  	    'name'=>'修改资料',
  	    'url'=>'user/editprofile',
  	    'class'=>'user_editprofile',
  	  
  	  ),
  	  	  
  	  'setting'=>array(
  	    'name'=>'个人设置',
  	    'url'=>'user/setting',
  	    'class'=>'user_setting',
  	  ),
  	  	  
  	  'editemail'=>array(
  	  	'name'=>'修改邮箱',
  	  	'url'=>'user/editemail',
  	  	'class'=>'user_editemail'
  	  ),
  	  	  
  	  'editpassword'=>array(
  	    'name'=>'修改密码',
  	    'url'=>'user/editpassword',
  	    'class'=>'user_editpassword'
  	  ),
  	  
  	  'invite'=>array(
  	    'name'=>'我的邀请',
  	    'url'=>'user/invite',
  	    'class'=>'user_invite',
  	  
  	  ),
  	  	  
  	  'mytops'=>array(
  	    'name'=>'我的置顶',
  	    'url'=>'user/mytops',
  	    'class'=>'user_mytops',
  	  
  	  ),
  	  	  
  	  'coupon'=>array(
  	    'name'=>'抵用劵明细',
  	    'url'=>'user/coupon',
  	    'class'=>'user_coupon',
  	  
  	  ),
  	  
  	  'scheduler'=>array(
  	    'name'=>'个人行程',
  	    'url'=>'user/scheduler',
  	    'class'=>'user_scheduler',
  	  
  	  ),
  	  
  	   'message'=>array(
  	    'name'=>'站内消息',
  	    'url'=>'user/message',
  	    'class'=>'user_message'
  	  ),
  	  
  	
  	  
  	)),
  	'guides'=>array('name'=>'导游中心','class'=>'user_guides','url'=>'','menus'=>array(
  	  'myguides'=>array(
  	   		'name'=>'导游信息',
  	   		'url'=>'user/guides',
  	   		'class'=>'user_myguides',
  	  ),
  	  
  	  'editguides'=>array(
  	   		'name'=>'修改信息',
  	   		'url'=>'user/editguides',
  	   		'class'=>'user_editguides',
  	  ),
  	  
  	  'gscheduler'=>array(
  	   		'name'=>'行程设置',
  	   		'url'=>'user/gscheduler',
  	   		'class'=>'user_gschedule',
  	  ),
  	  'mygscheduler'=>array(
  	   		'name'=>'我的预定',
  	   		'url'=>'user/mygscheduler',
  	   		'class'=>'user_mygschedule',
  	  ),
  	  
  	 
  	  
  	  

  	)),
  	'agency'=>array('name'=>'旅行社中心','class'=>'user_agency','url'=>'','menus'=>array(
  	  'agency'=>array(
  	   		'name'=>'旅行社信息',
  	   		'url'=>'user/agency',
  	   		'class'=>'user_myagency',
  	  ),
  	  
  	  'editagency'=>array(
  	   		'name'=>'修改信息',
  	   		'url'=>'user/editagency',
  	   		'class'=>'user_editagency',
  	  ),
  	  'myascheduler'=>array(
  	   		'name'=>'线路计调',
  	   		'url'=>'user/myascheduler',
  	   		'class'=>'user_myaschedule',
  	  ),
  	  
  	  'ascheduler'=>array(
  	   		'name'=>'我的预定',
  	   		'url'=>'user/ascheduler',
  	   		'class'=>'user_aschedule',
  	  ),
  	  
  	  
  	  
  	  'mystore'=>array(
  	    'name'=>'我的商铺',
  	    'url'=>'user/mystore',
  	    'class'=>'user_mystore',
  	  ),
  	  
  	)),
  	
  	
  	'restaurant'=>array('name'=>'酒店中心','class'=>'user_restaurant','url'=>'','menus'=>array(
  	  'restaurant'=>array(
  	   		'name'=>'酒店信息',
  	   		'url'=>'user/restaurant',
  	   		'class'=>'user_myrestaurant',
  	  ),
  	  
  	  'editrestaurant'=>array(
  	   		'name'=>'修改信息',
  	   		'url'=>'user/editrestaurant',
  	   		'class'=>'user_editrestaurant',
  	  ), 
  	   'mystore'=>array(
  	    'name'=>'我的商铺',
  	    'url'=>'user/mystore',
  	    'class'=>'user_mystore',
  	  )
  	)),
  	
  	
  	
  	);
  	return $menus;
  }
  
  public function get_user_menus($user_id=""){
  	$user_id=empty($user_id)?Yii::app()->user->id:$user_id;
  	$user_type=UserType::model();
  	$type=$user_type->get_user_type($user_id);
  	$menus=$this->get_menus();
  	$return_menus=array();
  	switch($type){
  		case '1':
  		    $return_menus['default']=$menus['default'];
  		    $return_menus['guides']=array('name'=>'','class'=>'apply_guides','url'=>'user/applyguides','menus'=>array());
  		    $return_menus['agency']=array('name'=>'','class'=>'apply_agency','url'=>'user/applyagency','menus'=>array());
  		    $return_menus['restaurant']=array('name'=>'','class'=>'apply_restaurant','url'=>'user/applyrestaurant','menus'=>array());
  				break;
  		case '2':
  		    $return_menus['default']=$menus['default'];
  		    $return_menus['guides']=$menus['guides'];
  		    break;
  		case '3':
  		    $return_menus['default']=$menus['default'];
  		    $return_menus['agency']=$menus['agency'];
  		    break;
  		case '4':
  		    $return_menus['default']=$menus['default'];
  		    $return_menus['restaurant']=$menus['restaurant'];
  		    break;
  		    
  		default:
  		    break;
  	}
  	return $return_menus;
  }

}
?>
