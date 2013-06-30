<?php
class PermissionsVars extends CWidget
{
	var $menu=array();
	var $permissions_value="";
	var $permissions_array=array();
	public function run(){
		$this->rend_permissions();
	}
	function rend_permissions(){
		$menu=$this->menu;
		  $this->permissions_array=empty($this->permissions_value)?array():unserialize($this->permissions_value);
		  Yii::app()->clientScript->registerScriptFile('/js/managepermission.js');
			$return_str="<div class='permission_wrapp'>";
			foreach((array)$menu as $key => $value){
				$return_str.="<div class='permission_parent'>";
				$return_str.="<div class='permission_item'><div><input type='checkbox' id='permission_item_check_".$key."'";
				$return_str.=" onclick=\"javascipt:managepermission.select_permission_all('".$key."');\" name='permission_item_check' value='".$key."'/></div><div class='permission_name'><label for='permission_item_check_".$key."'>".Yii::t('default',$value['name'])."</label></div><div><a id='show_sub_menu_".$key."' class='permissions_operate_sub' href=\"javascript:managepermission.show_sub_menu('".$key."')\"></a></div></div>";
				$return_str.="<div class='permission_subitem' id='permission_subitem_".$key."'>";
				 if(!empty($value['subitem'])){
					 $return_str.=$this->rend_subitem($key,$value['subitem']);
				 }
				$return_str.="</div>";
				$return_str.="</div>";
		}
	  $return_str.="</div><script language=\"javascript\">var managepermission=\"\";managepermission=new ManagePermission();</script>";
		echo $return_str;
	}
	function rend_subitem($parent_key,$menu){
		$return_str="";
		foreach((array)$menu as $key => $value){
	    //if($key=="264"){
	    	$menu_item=$value['item'];
	    //}else{
	    	//$menu_item=array(array('name'=>'列表','value'=>'index'),array('name'=>'增加','value'=>'add,delete'));
	   // }
			$return_str.="<div class='permission_subitem_menu' style='display:block;'><div><input type='checkbox'";
			$return_str.=" name='' id='permission_item_check_".$key."' onclick=\"javascipt:managepermission.select_permission_all('".$key."');\" value='".$key."'/><lable>".Yii::t('default',$value['name'])."</lable>";
			$return_str.="<div class='permission_operate' id='permission_subitem_".$key."'>";
			foreach($menu_item as $key1 => $value1){
				$return_str.="<input type='checkbox' ";
				$permission_array=$this->permissions_array;
				$operate_value=(array)$permission_array[$key];
				if(in_array($key1,$operate_value)){
					$return_str.=" CHECKED ";
				}
				$return_str.=" name='permission_value[".$key."][]' value='".$key1."'/><lable>".$value1['name']."</lable>";
			}
			$return_str.="</div>";
			$return_str.="</div></div>";
		}
		return $return_str;
	}
	function get_subitem_keys($subitem){
		return array_keys($subitem);
	}
}