<?php
/**
 * This is the model class for table "{{permissions}}".
 *
 * The followings are the available columns in table '{{permissions}}':
 * @property string $id
 * @property string $permissions_name
 * @property string $permissions_value
 * @property string $create_id
 */
class Permissions extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Permissions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{permissions}}';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		  array('permissions_name,permissions_value','required','message'=>'{attribute}不能为空'),
		  array('permissions_name','exist_permissions_name'),
			array('permissions_name', 'length', 'max'=>100),
			array('create_id,create_time', 'length', 'max'=>11),
			array('permissions_value','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, permissions_name, permissions_value, create_id,create_time', 'safe', 'on'=>'search'),
		);
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		  'User'=>array(self::BELONGS_TO, 'User', 'create_id'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '权限ID',
			'permissions_name' => '权限名称',
			'permissions_value' => '权限值',
			'create_id' => '创建人',
			'create_time'=>'创建时间',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search(){
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id,true);
		$criteria->compare('permissions_name',$this->permissions_name,true);
		$criteria->compare('permissions_value',$this->permissions_value,true);
		$criteria->compare('create_id',$this->create_id,true);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
		//删除一笔数据
	public function delete_table_datas($pk_id="",$condition=array()){

		if(!empty($pk_id)){
			$datas=$this->deleteByPk($pk_id,"",array());
			if($datas){
        $auth=Yii::app()->authManager;
			  $item_childs=$auth->getItemChildren($pk_id);
			  foreach($item_childs as $key => $value){
			     $auth->removeItemChild($pk_id,$value->name);
			  }
			  $auth->removeAuthItem($pk_id);
			}
			$user=new User();
			$user_datas=$user->findAll("FIND_IN_SET('".$pk_id."',permissions)>0",array());
			foreach($user_datas as $key => $value){
				$user_id=$value->id;
				$permissions=$value->permissions;
				$permissions=preg_replace("/,?".$pk_id."/i","",$permissions);
				$user->updateByPk($user_id,array('permissions'=>$permissions),'',array());
			  $auth->revoke($pk_id,$user_id);
			}
			
			
		}else{
			$permission_datas=$this->get_table_datas($condition);
			$auth=Yii::app()->authManager;
			$user=new User();
			foreach($permission_datas as $key => $value){
				$pk_id=$value->id;
				$item_childs=$auth->getItemChildren($pk_id);
			  foreach($item_childs as $key1 => $value1){
			     $auth->removeItemChild($pk_id,$value1->name);
			  }
			  $auth->removeAuthItem($pk_id);
				$user_datas=$user->findAll("FIND_IN_SET('".$pk_id."',permissions)>0",array());
				foreach($user_datas as $key2 => $value2){
					$user_id=$value2->id;
					$permissions=$value2->permissions;
				  $permissions=preg_replace("/,?".$pk_id."/i","",$permissions);
				  $user->updateByPk($user_id,array('permissions'=>$permissions),'',array());
			  	$auth->revoke($pk_id,$user_id);
				}
			
			
			}
      $datas=$this->deleteAll($condition);
		}

		return $datas;
	}
	
	public function insert_datas(){
		if(!$this->hasErrors()){
	
				$datas=$this->save();
			
			  return $datas;
		}
	}
	

	function beforeSave(){
	  if(parent::beforeSave()){
			if($this->isNewRecord){
				$this->create_id=Yii::app()->user->id;
				$this->create_time=Util::current_time('timestamp');
			}else{
				//$this->create_id=Yii::app()->user->id;
				//$this->create_time=Util::current_time('timestamp');
			}
			return true;
		}else{
			return false;
		}

	}
	function exist_permissions_name(){
		$id=$this->id;
		if(!empty($id)){
			 $get_table_datas=$this->get_table_datas($id,array());
			 if($get_table_datas->permissions_name!=$this->permissions_name){
			 	 $find_datas=$this->find(array(
          'select'=>'permissions_name',
          'condition'=>'permissions_name=:permissions_name',
          'params'=>array(':permissions_name' => $this->permissions_name),
         ));
			 }
		}else{
			$find_datas=$this->find(array(
         'select'=>'permissions_name',
         'condition'=>'permissions_name=:permissions_name',
         'params'=>array(':permissions_name' => $this->permissions_name),
       ));
		}
     if(!empty($find_datas)){
     	 $this->addError("permissions_name","权限名字重复");
     }
	}
	
	
	function get_operate(){
		  $user=new User();
		  $user_permission_name=$user->get_permissions_name();
		  $controller_id=Yii::app()->getController()->getId();
		  $return_str="<div class='operate_button'>";
		 
		  if(Util::is_permission($user_permission_name,"edit"))
		     $return_str.=CHtml::link('修改',array($controller_id."/edit","id"=>$this->id),array('class'=>'operate_green'));
		  if(Util::is_permission($user_permission_name,"delete"))
		     $return_str.=CHtml::link('删除','javascript:void(0);',array('id'=>'delete_'.$this->id,'class'=>'operate_red','onclick'=>"javascript:ajax_delete('".Yii::app()->getController()->createUrl('main/delete')."','".get_class($this)."','".$this->id."');"));
		   $return_str.="</div>";
		  return $return_str;
	}
	//获取权限组的名称
	function get_permissions_value(){
		$permissions_value=unserialize($this->permissions_value);
		$auther_operation=$this->get_auther_subitem();
		$permissions_value_name="";
		foreach((array)$permissions_value as $key => $value){
			if(empty($permissions_value_name)){
				$permissions_value_name=$auther_operation[$key]['name'];
			}else{
				$permissions_value_name.=",".$auther_operation[$key]['name'];
			}
			$operates=$auther_operation[$key]['item'];
			$permissions_value_name.="(";
			$operates_name='';
			foreach((array)$value as $key1 => $value1){
				$operates_name.=empty($operates_name)?$operates[$value1]['name']:",".$operates[$value1]['name'];
			}
			$permissions_value_name.=$operates_name;
			$permissions_value_name.=")";
		}
		return $permissions_value_name;
	}

	
  //得到权限配置项的子项
	 function get_auther_subitem(){
		$auther_operation=LeftMenu::get_menus();
		$subitem_array=array();
		foreach($auther_operation as $key => $value){
			$auther_subitem=$value['subitem'];
			foreach($auther_subitem as $key1 => $value1){
				$subitem_array[$key1]=$value1;
			}
		}
		return $subitem_array;
	}
	
	//获得用户的权限数组
	function get_user_permissions(){
		$user_id=Yii::app()->user->id;
		$user_permissions=array();
		//if($user_id=='1'){
			//$user_permissions=LeftMenu::get_menus();
		//}else{
		  $permissions=User::model()->get_user_permissions();
		  $permissions_datas=$this->findAll(array('select'=>'id,permissions_value','condition'=>"FIND_IN_SET(id,:permissions)>0",'params'=>array(':permissions'=>$permissions)));
		  foreach($permissions_datas as $key => $value){
		     $tem_user_permissions=$this->match_permissions_value($value->permissions_value);
		    foreach($tem_user_permissions as $key1 => $value1){
		  	   $auther_subitem=$value1['subitem'];
		 	      foreach($auther_subitem as $key2 => $value2){
		 	      	$user_permissions[$key1]['name']=$value1['name'];
		 	      	$user_permissions[$key1]['subitem'][$key2]=$value2;
		 	     }
		   }
	   //}
	 }
	return $user_permissions;
	}
	
	
		//获得超级用户的权限数组
	function get_admin_permissions(){
		$user_id=Yii::app()->user->id;
		$user_permissions=array();
		$user_permissions=LeftMenu::get_menus();
	  return $user_permissions;
	}
	
	//根据permissions_value得到权限的数组 用户用户分配他所拥有的权限
	function match_permissions_value($permissions_value){
		 $permissions_value=unserialize($permissions_value);
		 $permissions_value_keys=array_keys($permissions_value);
		 $auther_operation=LeftMenu::get_menus();
		 $match_permissions=array();
		 foreach($auther_operation as $key => $value){
		 	 $auther_subitem=$value['subitem'];
		 	 foreach($auther_subitem as $key1 => $value1){
		 	 	  if(in_array($key1,$permissions_value_keys)){
		 	 	  	$match_permissions[$key]['name']=$value['name'];
		 	 	  	$match_permissions[$key]['subitem'][$key1]=$value1;
		 	 	  }
		 	 }
		}
		return $match_permissions;
	}
	
	//获得用户设置的权限
	function get_user_setpermissions($user_id=""){
		$user_id=empty($user_id)?Yii::app()->user->id:$user_id;
		$permission_datas=$this->get_table_datas("",array('condition'=>'create_id=:user_id','params'=>array(':user_id'=>$user_id)));
		$return_permissions=array();
		foreach($permission_datas as $key => $value){
			$return_permissions[$value->id]=$value->permissions_name;
		}
		return $return_permissions;
		
	}
	
	//设置用户权限
	function set_user_permissions($user_id,$permissions_ids){
		$auth=Yii::app()->authManager;
		$roles_array=$auth->getRoles($user_id);
		$roles_array_keys=array_keys($roles_array);
		$permissions_names=array();
		foreach((array)$permissions_ids as $p_key => $p_value){
			$permissions_id=$p_value;
		  $permissions_datas=$this->get_table_datas($permissions_id);
		  $permissions_name=$permissions_datas->id;
		  array_push($permissions_names,$permissions_name);
			$is_assigned_flag=$auth->isAssigned($permissions_name,$user_id);
		  if(!$is_assigned_flag){
		  	$auth->assign($permissions_name,$user_id);
		  }
		}
		$diff_roles_array=array_diff($roles_array_keys,$permissions_names);
	  foreach($diff_roles_array as $key => $value){
		   $auth->revoke($value,$user_id);
	  }
	}
	
	//定义权限
	function set_permissions($permissions_name,$permissions_ids){
		 $auth=Yii::app()->authManager;
		 $authitems=$auth->getAuthItems('2');
		 $authitems_keys=array_keys($authitems);
		 $operations_array=$auth->getOperations();
		 $operations_array_keys=array_keys($operations_array);
		 $auther_subitem=$this->get_auther_subitem();
		 if(in_array($permissions_name,$authitems_keys)){
		 	 $role=$authitems[$permissions_name];
		 }else{
		   $role=$auth->createRole($permissions_name);
		 }
		 $permissions_name_child=$auth->getItemChildren($permissions_name);
		 $operation_array_keys=array_keys($permissions_name_child);
		 $operation_names=array();
		foreach((array)$permissions_ids as $p_key => $p_value){
			 $permissions_item=$auther_subitem[$p_key]['item'];
			 $permissions_item_name=$auther_subitem[$p_key]['name'];
			 $permissions_item_array=$permissions_item;
			 foreach($permissions_item_array as $key1 => $value1){
			 	 $items_arr=explode(",",$value1['value']);
			 	 foreach($items_arr as $key2=> $value2){
			 	 	if(in_array($key1,$p_value)){
			 	 	  array_push($operation_names,$value2);
			 	 		if(!in_array($value2,$operations_array_keys)){
			 	    		$auth->createOperation($value2,$permissions_item_name);
			   		}
			   		$item_child_flag=$auth->hasItemChild($permissions_name,$value2);
			   		if(!$item_child_flag){
			 	    		$role->addChild($value2);
			 	 		}
			 	 	}
			 	 }  
			}
	  }
	  $diff_operation_array=array_diff($operation_array_keys,$operation_names);
	  foreach($diff_operation_array as $key => $value){
		   $auth->removeItemChild($permissions_name,$value);
	  }
	}
  function format_create_time(){
		return date("Y-m-d H:i:s",$this->create_time);
	}
	/*
	* 获取角色的选择的数组
	* @return array 返回角色的键值的数组
	* @auther lxf
	* @version 1.0.0
	*/
	function get_user_permission_select($user_id=""){
		$user_id=empty($user_id)?Yii::app()->user->id:$user_id;
		$user=new User();
		$user_data=$user->find(array('select'=>'permissions','condition'=>'id=:user_id','params'=>array(':user_id'=>$user_id)));
		$permissions=$user_data->permissions;
		$permissions_array=explode(",",$permissions);
		$return_array=array();
		foreach($permissions_array as $key => $value){
		   $permissions_datas=$this->find(array('select'=>'id,permissions_name','condition'=>'id=:permissions_id','params'=>array(':permissions_id'=>$value)));	
			 $return_array[$permissions_datas->id]=$permissions_datas->permissions_name;
		}
		return $return_array;
	}
}