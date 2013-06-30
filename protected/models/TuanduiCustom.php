<?php

/**
 * This is the model class for table "{{tuandui_custom}}".
 *
 * The followings are the available columns in table '{{tuandui_custom}}':
 * @property string $id
 * @property string $relation_id
 * @property string $name
 * @property integer $sex
 * @property string $cell_phone
 * @property string $email
 * @property string $code
 * @property string $qq
 * @property string $msn
 * @property string $address
 * @property string $supervisor
 * @property string $comment
 * @property string $create_id
 * @property string $create_time
 */
class TuanduiCustom extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TuanduiCustom the static model class
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
		return '{{tuandui_custom}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('relation_id','required','message'=>'{attribute}不能为空'),
			array('sex', 'numerical', 'integerOnly'=>true),
			array('relation_id, create_id, create_time', 'length', 'max'=>11),
			array('name, cell_phone,email, msn, supervisor', 'length', 'max'=>30),
			array('code', 'length', 'max'=>18),
			array('qq', 'length', 'max'=>20),
			array('address', 'length', 'max'=>200),
			array('comment', 'safe'),
			//array('email','email','message'=>'{attribute}格式错误'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, relation_id, name, sex, cell_phone, code, qq, msn, address, supervisor, comment, create_id, create_time', 'safe', 'on'=>'search'),
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
			'Tuandui'=>array(self::BELONGS_TO,'Order','relation_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'relation_id' => '关联团队',
			'name' => '联系人',
			'sex' => '性别',
			'cell_phone' => '联系电话',
			'email'=>'邮箱',
			'code' => '身份证号码',
			'qq' => 'QQ',
			'msn' => 'MSN',
			'address' => '地址',
			'supervisor' => '监护人',
			'comment' => '备注',
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
		$criteria->compare('relation_id',$this->relation_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('cell_phone',$this->cell_phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('msn',$this->msn,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('supervisor',$this->supervisor,true);
		$criteria->compare('comment',$this->comment,true);
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
		 
		  if(Util::is_permission($user_permission_name,"editcustom"))
		  	$return_str.=CHtml::link('修改',array($controller_id."/editcustom","id"=>$this->id),array('class'=>'operate_green'));
		  if(Util::is_permission($user_permission_name,"deletecustom")) 	
		   	$return_str.=CHtml::link('删除','javascript:void(0);',array('id'=>'delete_'.$this->id,'class'=>'operate_red','onclick'=>"javascript:ajax_delete('".Yii::app()->getController()->createUrl('main/delete')."','".get_class($this)."','".$this->id."');"));
		  $return_str.="</div>";
		  return $return_str;
	}
	function show_attribute($attribute_name){
		switch($attribute_name){
			case 'sex':
				$sex=CV::$sex;
			    return $sex[$this->sex];
			  break;
			case 'relation_id':
			    return $this->Tuandui->name;
			  break;
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
}