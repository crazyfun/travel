<?php
/**
 * This is the model class for table "{{backend_menu}}".
 *
 * The followings are the available columns in table '{{backend_menu}}':
 * @property string $id
 * @property string $menu_name
 * @property string $menu_parent
 * @property integer $menu_sort
 * @property string $menu_link
 * @property string $menu_item
 * @property string $create_id
 * @property string $create_time
 */
class BackendMenu extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return BackendMenu the static model class
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
		return '{{backend_menu}}';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		  array('menu_name,menu_sort','required','message'=>'{attribute}不能为空'),
			array('menu_sort', 'numerical', 'integerOnly'=>true),
			array('menu_name', 'length', 'max'=>30),
			array('menu_parent, create_id, create_time', 'length', 'max'=>11),
			array('menu_link', 'length', 'max'=>200),
			array('menu_sort','numerical','message'=>'{attribute}必须是数字'),
			array('menu_item','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, menu_name, menu_parent, menu_sort, menu_link, menu_item, create_id, create_time', 'safe', 'on'=>'search'),
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
		  'BackendMenu'=>array(self::BELONGS_TO,'BackendMenu','menu_parent'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'menu_name' => '菜单名',
			'menu_parent' => '父菜单',
			'menu_sort' => '菜单排序',
			'menu_link' => '菜单连接',
			'menu_item' => '菜单页面',
			'create_id' => '创建人',
			'create_time' => '创建时间',
		);
	}
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id,true);
		$criteria->compare('menu_name',$this->menu_name,true);
		$criteria->compare('menu_parent',$this->menu_parent,true);
		$criteria->compare('menu_sort',$this->menu_sort);
		$criteria->compare('menu_link',$this->menu_link,true);
		$criteria->compare('menu_item',$this->menu_item,true);
		$criteria->compare('create_id',$this->create_id,true);
		$criteria->compare('create_time',$this->create_time,true);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function insert_datas(){
		if(!$this->hasErrors()){
			$datas=$this->save();
			return $datas;
		}
	}
	public function beforeSave(){
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
	function get_operate(){
		  $user=new User();
		  $user_permission_name=$user->get_permissions_name();
		  $controller_id=Yii::app()->getController()->getId();
		  $return_str="<div class='operate_button'>";
		  if(Util::is_permission($user_permission_name,"add"))
		     $return_str.=CHtml::link('修改',array($controller_id."/add","id"=>$this->id),array('class'=>'operate_green'));
		  if(Util::is_permission($user_permission_name,"delete"))
		  		$return_str.=CHtml::link('删除','javascript:void(0);',array('id'=>'delete_'.$this->id,'class'=>'operate_red','onclick'=>"javascript:ajax_delete('".Yii::app()->getController()->createUrl('main/delete')."','".get_class($this)."','".$this->id."');"));
		  $return_str.="</div>";
		  return $return_str;
	}
	
	function format_create_time(){
		return date("Y-m-d H:i:s",$this->create_time);
	}
	
		//删除一笔数据
	public function delete_table_datas($pk_id="",$condition=array()){
		$table_datas=$this->get_table_datas($pk_id,$condition);
		if(is_array($table_datas)){
		foreach($table_datas as $key => $value){
			$id=$value->id;
			$child_menu_datas=$this->findAll(array('select'=>'id','condition'=>'menu_parent=:menu_parent','params'=>array(':menu_parent'=>$id)));
      foreach($child_menu_datas as $key1 => $value1){
    	  $child_menu_id=$value1->id;
    	  $this->delete_table_datas($child_menu_id,array());
      }
			$this->deleteByPk($id,"",array());
		}
	 }else{
	 	  $id=$table_datas->id;
			$child_menu_datas=$this->findAll(array('select'=>'id','condition'=>'menu_parent=:menu_parent','params'=>array(':menu_parent'=>$id)));
      foreach($child_menu_datas as $key1 => $value1){
    	  $child_menu_id=$value1->id;
    	  $this->delete_table_datas($child_menu_id,array());
      }
      
      
			$this->deleteByPk($id,"",array());
	 }
	 return true;
		
	}
	/*
	 * 获取所有的后台菜单的信息
	 * @return array 后台菜单的数组 字菜单的key值为submenus
	 * @auther lxf
	 * @version 1.0.0
	 */
	 
	public function get_backend_menu_datas(){
		   $backend_menu_datas=$this->findAll(array('select'=>'*','condition'=>'menu_parent=:menu_parent','params'=>array(':menu_parent'=>'0'),'order'=>'menu_sort ASC'));
		   $return_back_menu=array();
		   foreach($backend_menu_datas as $key => $value){
		   	 $tem_back_menu=array();
		   	 $tem_back_menu['id']=$value['id'];
		   	 $tem_back_menu['menu_name']=$value['menu_name'];
		   	 $tem_back_menu['menu_parent']=$value['menu_parent'];
		   	 $tem_back_menu['menu_sort']=$value['menu_sort'];
		   	 $tem_back_menu['menu_link']=$value['menu_link'];
		   	 $tem_back_menu['menu_item']=$value['menu_item'];
		   	 $tem_back_menu['create_id']=$value['create_id'];
		   	 $tem_back_menu['create_time']=$value['create_time'];
		     $sub_menu_datas=$this->get_child_menu_datas($value->id);
		     $tem_back_menu['submenus']=$sub_menu_datas;
		     array_push($return_back_menu,$tem_back_menu);
		   }	
		   return $return_back_menu;
	}
	/*
	 * 获取一个菜单的子菜单
	 * @param int $menu_id 父菜单
	 * @return array 返回$menu_id的所有子菜单
	 * @auther lxf
	 * @version 1.0.0
	 */
	 public function get_child_menu_datas($menu_id){
	   if(empty($menu_id)){
	   	   return false;
	   }
	   $back_menu_datas=$this->findAll(array('select'=>'*','condition'=>'menu_parent=:menu_parent','params'=>array(':menu_parent'=>$menu_id),'order'=>'menu_sort ASC'));
	   foreach($back_menu_datas as $key => $value){
	   	 $menu_item=$value->menu_item;
	   	 $menu_item=json_decode($menu_item,true);
	   	 $value['menu_item']=$menu_item;
	   }
	   return $back_menu_datas;	 
	 }
	 
	 
	 /*
	 * 获取菜单的父菜单即menu_parent 为空的菜单
	 * @return array 返回父菜单的选择项
	 * @auther lxf
	 * @version 1.0.0
	 */
	 public function get_parent_menu(){
	   $back_menu_datas=$this->findAll(array('select'=>'id,menu_name','condition'=>'menu_parent=:menu_parent','params'=>array(':menu_parent'=>'0'),'order'=>'menu_sort ASC'));
	   $return_menus=array();
	   foreach($back_menu_datas as $key => $value){
	     $return_menus[$value->id]=$value->menu_name;	
	  }
	  return $return_menus;
	 }

}