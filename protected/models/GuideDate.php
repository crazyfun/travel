<?php

/**
 * This is the model class for table "{{guide_date}}".
 *
 * The followings are the available columns in table '{{guide_date}}':
 * @property string $id
 * @property string $user_id
 * @property string $date
 * @property string $comment
 * @property integer $status
 * @property string $create_time
 */
class GuideDate extends BaseActive
{
	public $start_date;
	public $end_date;
	/**
	 * Returns the static model of the specified AR class.
	 * @return GuideDate the static model class
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
		return '{{guide_date}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		  array('user_id','required','message'=>'{attribute}²»ÄÜÎª¿Õ'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('user_id, create_time', 'length', 'max'=>11),
			array('date', 'length', 'max'=>30),
			array('comment,start_date,end_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, date, comment, status, create_time', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'date' => 'Date',
			'comment' => 'Comment',
			'status' => 'Status',
			'create_time' => 'Create Time',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('status',$this->status);
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
         //$this->user_id=Yii::app()->user->id;
				 $this->create_time=Util::current_time('timestamp');
			}else{
				//$this->create_id=Yii::app()->user->id;
				//$this->create_time=Util::current_time('timestamp');
				$this->create_time=Util::current_time('timestamp');
			}
			return true;
		}else{
			return false;
		}
	}
		function show_attribute($attribute_name){
		switch($attribute_name){
			case 'create_time':
			  return date('Y-m-d',$this->create_time);
			  break;
			case 'status':
			  return  CV::$guidedate_status[$this->status];
			  break;
			case 'user_id':
				 return $this->User->user_login;
				break;
			default:
			  return $this->$attribute_name;
			  break;
		}
	}
	function get_calendar($start_date,$end_date,$guide_user_id=""){
		$user_id=empty($guide_user_id)?Yii::app()->user->id:$guide_user_id;
		$datas=$this->findAll(array(
		  'select'=>'id,user_id,date,status',
		  'condition'=>'date>=:start_date AND date<=:end_date AND user_id=:user_id',
		  'params'=>array(':start_date'=>$start_date,':end_date'=>$end_date,':user_id'=>$user_id),
		));
		$ajax_array=array();
		foreach($datas as $key => $value){
			$tem_array=array();
			$tem_array['id']=$value->id;
			$tem_array['user_id']=$value->user_id;
			$tem_array['date']=$value->date;
			$tem_array['status']=$value->status;
			$ajax_array[]=$tem_array;
		}
		return $ajax_array;
	}
	

	
}