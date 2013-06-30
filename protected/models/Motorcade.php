<?php

/**
 * This is the model class for table "{{motorcade}}".
 *
 * The followings are the available columns in table '{{motorcade}}':
 * @property string $id
 * @property string $motorcade_name
 * @property string $motorcade_contacter
 * @property string $cell_phone
 * @property string $tele_phone
 * @property string $motorcade_fax
 * @property string $motorcade_qq
 * @property string $motorcade_msn
 * @property string $motorcade_comment
 * @property string $station_id
 * @property string $create_id
 * @property string $create_time
 */
class Motorcade extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Motorcade the static model class
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
		return '{{motorcade}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('motorcade_name,motorcade_contacter,cell_phone','required','message'=>'{attribute}不能为空'),
			array('motorcade_name', 'length', 'max'=>200),
			array('motorcade_contacter, cell_phone, tele_phone, motorcade_fax, motorcade_msn', 'length', 'max'=>30),
			array('motorcade_qq', 'length', 'max'=>20),
			array('station_id, create_id, create_time', 'length', 'max'=>11),
			array('motorcade_comment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, motorcade_name, motorcade_contacter, cell_phone, tele_phone, motorcade_fax, motorcade_qq, motorcade_msn, motorcade_comment, station_id, create_id, create_time', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'motorcade_name' => '车队名称',
			'motorcade_contacter' => '联系人',
			'cell_phone' => '手机号码',
			'tele_phone' => '座机',
			'motorcade_fax' => '传真',
			'motorcade_qq' => 'Qq',
			'motorcade_msn' => 'Msn',
			'motorcade_comment' => '备注',
			'station_id' => '分站',
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
		$criteria->compare('motorcade_name',$this->motorcade_name,true);
		$criteria->compare('motorcade_contacter',$this->motorcade_contacter,true);
		$criteria->compare('cell_phone',$this->cell_phone,true);
		$criteria->compare('tele_phone',$this->tele_phone,true);
		$criteria->compare('motorcade_fax',$this->motorcade_fax,true);
		$criteria->compare('motorcade_qq',$this->motorcade_qq,true);
		$criteria->compare('motorcade_msn',$this->motorcade_msn,true);
		$criteria->compare('motorcade_comment',$this->motorcade_comment,true);
		$criteria->compare('station_id',$this->station_id,true);
		$criteria->compare('create_id',$this->create_id,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
				//删除一笔数据
	public function delete_table_datas($pk_id="",$condition=array()){
		$table_datas=$this->get_table_datas($pk_id,$condition);
		if(is_array($table_datas)){
		foreach($table_datas as $key => $value){
			$id=$value->id;
			$car=new Car();
			$car->deleteAll('relation_id=:relation_id',array(':relation_id'=>$id));
			$this->deleteByPk($id,"",array());
		}
	 }else{
	 	  $id=$table_datas->id;
	 	  $car=new Car();
			$car->deleteAll('relation_id=:relation_id',array(':relation_id'=>$id));
			$this->deleteByPk($id,"",array());
	 }
	 return true;
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
	
	function get_operate(){
		  $user=new User();
		  $user_permission_name=$user->get_permissions_name();
		  $controller_id=Yii::app()->getController()->getId();
		  $return_str="<div class='operate_button'>";
		  if(Util::is_permission($user_permission_name,"view"))
		  	$return_str.=CHtml::link('查看','javascript:void(0);',array('class'=>'operate_green','onclick'=>"javascript:frame_view('".Yii::app()->getController()->createUrl('view')."','".get_class($this)."','".$this->id."');"));
		  if(Util::is_permission($user_permission_name,"edit"))
		  	$return_str.=CHtml::link('修改',array($controller_id."/edit","id"=>$this->id),array('class'=>'operate_green'));
		  if(Util::is_permission($user_permission_name,"delete")) 	
		   	$return_str.=CHtml::link('删除','javascript:void(0);',array('id'=>'delete_'.$this->id,'class'=>'operate_red','onclick'=>"javascript:ajax_delete('".Yii::app()->getController()->createUrl('main/delete')."','".get_class($this)."','".$this->id."');"));
		  $return_str.="</div>";
		  return $return_str;
	}
	
	function show_attribute($attribute_name){
		switch($attribute_name){
			case 'create_id':
				 return $this->User->real_name;
				break;
			case 'create_time':
				 return date('Y-m-d H:i:s',$this->create_time);
				break;
		    
			default:
			  return $this->$attribute_name;
			  break;
		}
	}
	function format_create_time(){
		return date("Y-m-d H:i:s",$this->create_time);
	}
	
	
	function show_car(){
		$user=new User();
		$user_permission_name=$user->get_permissions_name();
		if(Util::is_permission($user_permission_name,"view","car"))
		  $return_str.=CHtml::link('查看车辆','javascript:void(0);',array('class'=>'operate_green','onclick'=>"javascript:frame_relation('".Yii::app()->getController()->createUrl('car/index')."','".$this->id."');"));
		return $return_str;
	}
}