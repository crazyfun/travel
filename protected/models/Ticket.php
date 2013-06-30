<?php

/**
 * This is the model class for table "{{ticket}}".
 *
 * The followings are the available columns in table '{{ticket}}':
 * @property string $id
 * @property string $name
 * @property string $contacter
 * @property string $cell_phone
 * @property string $tele_phone
 * @property string $fax
 * @property string $qq
 * @property string $email
 * @property string $msn
 * @property string $address
 * @property string $comment
 * @property string $station_id
 * @property string $create_id
 * @property string $create_time
 */
class Ticket extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ticket the static model class
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
		return '{{ticket}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name,contacter,cell_phone','required','message'=>'{attribute}不能为空'),
			array('name', 'length', 'max'=>100),
			array('contacter, cell_phone, tele_phone, fax, email, msn', 'length', 'max'=>30),
			array('qq', 'length', 'max'=>20),
			array('address', 'length', 'max'=>200),
			array('station_id, create_id, create_time', 'length', 'max'=>11),
			array('comment', 'safe'),
			//array('email','email','message'=>'{attribute}格式错误'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, contacter, cell_phone, tele_phone, fax, qq, email, msn, address, comment, station_id, create_id, create_time', 'safe', 'on'=>'search'),
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
			'name' => '单位名称',
			'contacter' => '联系人',
			'cell_phone' => '手机号码',
			'tele_phone' => '座机',
			'fax' => '传真',
			'qq' => 'Qq',
			'email' => 'Email',
			'msn' => 'Msn',
			'address' => '单位地址',
			'comment' => '备注',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('contacter',$this->contacter,true);
		$criteria->compare('cell_phone',$this->cell_phone,true);
		$criteria->compare('tele_phone',$this->tele_phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('msn',$this->msn,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('station_id',$this->station_id,true);
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

}