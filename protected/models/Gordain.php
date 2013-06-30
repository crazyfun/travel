<?php

/**
 * This is the model class for table "{{gordain}}".
 *
 * The followings are the available columns in table '{{gordain}}':
 * @property string $id
 * @property string $user_id
 * @property string $ordain_id
 * @property string $date_id
 * @property integer $status
 * @property string $comment
 * @property string $create_time
 * @property string $operate_time
 */
class Gordain extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Gordain the static model class
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
		return '{{gordain}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('user_id,ordain_id,date_id,status','required','message'=>'{attribute}不能为空'),
			array('status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('user_id, ordain_id, date_id, create_time, operate_time', 'length', 'max'=>11),
			array('comment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, ordain_id, date_id, status, comment, create_time, operate_time', 'safe', 'on'=>'search'),
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
			'OrderUser'=>array(self::BELONGS_TO, 'User', 'ordain_id'),
			'AgencyDate'=>array(self::BELONGS_TO,'AgencyDate','date_id'),
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
			'ordain_id' => '预定人',
			'date_id'=>'线路ID',
			'status' => '状态',
			'comment'=>'备注',
			'create_time' => '预定时间',
			'operate_time' => '操作时间',
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
		$criteria->compare('ordain_id',$this->ordain_id,true);
		$criteria->compare('date_id',$this->date_id,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('operate_time',$this->operate_time,true);

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
				//$this->ordain_id=Yii::app()->user->id;
                $this->create_time=Util::current_time('timestamp');
			}else{
		
				$this->operate_time=Util::current_time('timestamp');
			}
			return true;
		}else{
			return false;
		}
	}
	function show_attribute($attribute_name){
		switch($attribute_name){
		  case 'user_id':
		    return CHtml::link($this->User->TravelAgency->agency_name,Yii::app()->getController()->createUrl("/agency/agency/detail",array('id'=>$this->User->TravelAgency->id)),array('target'=>'_self'));
		    break;
		  case 'ordain_id':
		    $guide=Guide::model();
		    $guide_data=$guide->find('user_id=:user_id',array(':user_id'=>$this->OrderUser->id));
		    return CHtml::link($this->OrderUser->real_name,Yii::app()->getController()->createUrl("/guide/guide/detail",array('id'=>$guide_data->id)),array('target'=>'_self'));
		    break;
		  case 'date_id':
		    return $this->AgencyDate->line;
		    break;
		  case 'operate_time':
		    return date('Y-m-d',$this->operate_time);
		    break;
		  case 'status':
		    return CV::$orderin_status[$this->status];
		    break;
			case 'create_time':
				 return date('Y-m-d',$this->create_time);
				break;	
			default:
			  return $this->$attribute_name;
			  break;
		}
	}
	
	
	function get_calendar($start_date,$end_date){
		$user_id=Yii::app()->user->id;
		$datas=$this->with("User","OrderUser","AgencyDate")->findAll(array(
		  'select'=>'id,user_id,ordain_id,date_id,status',
		  'condition'=>'AgencyDate.start_date>=:start_date AND AgencyDate.end_date<=:end_date AND t.ordain_id=:ordain_id',
		  'params'=>array(':start_date'=>$start_date,':end_date'=>$end_date,':ordain_id'=>$user_id),
		));
		$ajax_array=array();
		
		foreach($datas as $key => $value){
			$tem_array=array();
			$tem_array['id']=$value->id;
			$tem_array['user_id']=$value->user_id;
			$tem_array['ordain_id']=$value->ordain_id;
			$tem_array['line']=$value->User->TravelAgency()->agency_name."<span class='text_079270'>(".$value->AgencyDate->line.")</a>";
			$tem_array['start_date']=$value->AgencyDate->start_date;
			$tem_array['end_date']=$value->AgencyDate->end_date;
			$tem_array['status']=$value->status;
			$ajax_array[]=$tem_array;
		}
		return $ajax_array;
	}
	
}