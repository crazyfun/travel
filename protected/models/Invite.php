<?php

/**
 * This is the model class for table "{{invite}}".
 *
 * The followings are the available columns in table '{{invite}}':
 * @property string $id
 * @property string $user_id
 * @property string $invite_id
 * @property string $invite_ip
 * @property string $create_time
 */
class Invite extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Invite the static model class
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
		return '{{invite}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id,invite_id,invite_ip','required','message'=>'{attribute}不能为空'),
			array('user_id, invite_id, create_time', 'length', 'max'=>11),
			array('invite_ip', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, invite_id, invite_ip, create_time', 'safe', 'on'=>'search'),
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
				'Invite'=>array(self::BELONGS_TO, 'User', 'invite_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => '用户名称',
			'invite_id' => '邀请用户',
			'invite_ip' => '邀请IP',
			'create_time' => '邀请时间',
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
		$criteria->compare('invite_id',$this->invite_id,true);
		$criteria->compare('invite_ip',$this->invite_ip,true);
		$criteria->compare('create_time',$this->create_time,true);

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
	
	
	function show_attribute($attribute_name){
		switch($attribute_name){
		
		    case 'user_id':
		        return $this->User->user_login;
		    	break;
			case 'invite_id':
				 return $this->Invite->user_login;
				break;
			case 'create_time':
				 return date('Y-m-d H:i:s',$this->create_time);
				break;
			default:
			  return $this->$attribute_name;
			  break;
		}
	}
	function get_invite_top10(){
		$invite_datas=$this->with("User")->findAll(array('select'=>'t.user_id,t.user_id,COUNT(t.user_id) as invite_nums','condition'=>'','params'=>array(),'group'=>'t.user_id','order'=>'invite_nums DESC'));
		return $invite_datas;
	}
	
}