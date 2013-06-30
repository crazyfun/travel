<?php
class LeftMenu extends CWidget
{
	public $views='';
	public function run(){
  	$permissions=new Permissions();
  	$user_permissions=$permissions->get_user_permissions();
  	//if(Yii::app()->user->id=='1'){
  		//$menus=$this->get_menus();
  	//}else{
     $menus=$this->get_top_menus($user_permissions);
   // }
   
    $json_menus=array();
    foreach($menus as $key => $value){
    	$tem_json_menus=array();
    	$tem_json_menus['id']=$key;
    	$tem_json_menus['name']=$value['name'];
    	$tem_json_menus['subitem']=array();
    	$subitem=$value['subitem'];
    	if(!empty($subitem)){
    	foreach($subitem as $key1 => $value1){
    		$tem_subitem=array();
    		$tem_subitem['id']=$key1;
    		$tem_subitem['name']=$value1['name'];
    		$tem_subitem['url']=Yii::app()->getController()->createUrl($value1['url'],array());
    		array_push($tem_json_menus['subitem'],$tem_subitem);
    	}
     }
     array_push($json_menus,$tem_json_menus);
    }
    $menu_json=json_encode($json_menus);
  	$this->render($this->views,array('menus'=>$menus,'menu_json'=>$menu_json));
	}
  public function get_top_menus($user_permissions){
  	$top_menus=$this->get_menus();
  	$fin_top_menus=array();
  	foreach($user_permissions as $key => $value){
  		$fin_top_menus[$key]['name']=$top_menus[$key]['name'];
  		$fin_top_menus[$key]['url']=$top_menus[$key]['url'];
  		$subitems=$value['subitem'];
  		if(!empty($subitems)){
  		  foreach($subitems as $key1=>$value1){
  			  $fin_top_menus[$key]['subitem'][$key1]=$top_menus[$key]['subitem'][$key1];
  		  }
  		 }
  	}
  	return $fin_top_menus;
  }
	static public function get_menus(){
		$backend_menu=BackendMenu::model();
		$backend_menu_datas=$backend_menu->get_backend_menu_datas();
		$menu_datas=array();
		foreach($backend_menu_datas as $key => $value){
			$subitems=array();
			foreach($value['submenus'] as $key1 => $value1){
				$subitems[$value1['id']]=array('name'=>$value1['menu_name'],'url'=>$value1['menu_link'],'item'=>$value1['menu_item']);
			} 
			$menu_datas[$value['id']]=array('name'=>$value['menu_name'],'subitem'=>$subitems);
			
		}
		return $menu_datas;
		
	}
	//不需要进行权限控制的
	static function get_default_access(){
		return array('ErrorError404','ErrorError403','ErrorError500','SiteIndex','SiteLogin','SiteLogout','SiteWelcome','MainMessage','MainDijieshe','MainLine','MainDelete','MainPermissiond','MainCrop','MainMyagencycalendar');
		
	}
}
?>