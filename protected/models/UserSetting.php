<?php

/**
 * This is the model class for table "{{user_setting}}".
 *
 * The followings are the available columns in table '{{user_setting}}':
 * @property string $id
 * @property string $user_id
 * @property integer $message
 * @property integer $email
 */
class UserSetting extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserSetting the static model class
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
		return '{{user_setting}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id','required','message'=>'{attribute}不能为空'),
			array('message, email', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, message, email', 'safe', 'on'=>'search'),
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
			'User'=>array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => '用户ID',
			'message' => '短信设置',
			'email' => '邮件设置',
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('message',$this->message);
		$criteria->compare('email',$this->email);

		return new CActiveDataProvider($this, array(
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

			}else{
			
			}
			return true;
		}else{
			return false;
		}
	}
	
	
	function show_attribute($attribute_name){
		switch($attribute_name){
			case 'user_id':
				 return $this->User->user_login;
				break;
		
			default:
			  return $this->$attribute_name;
			  break;
		}
	}
	
	
	function get_user_setting($user_id=""){
		$user_id=empty($user_id)?Yii::app()->user->id:$user_id;
		$setting_data=$this->find("t.user_id=:user_id",array(':user_id'=>$user_id));
		return $setting_data->attributes;
	}

	
}