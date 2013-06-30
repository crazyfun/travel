<?php

/**
 * This is the model class for table "{{tops}}".
 *
 * The followings are the available columns in table '{{tops}}':
 * @property string $id
 * @property integer $user_id
 * @property integer $type
 * @property string $relation_id
 * @property string $start_date
 * @property string $start_time
 * @property string $hours
 * @property integer $days
 * @property string $create_time
 */
class Tops extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tops the static model class
	 */
	public $agreement;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tops}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id,type,relation_id,hours,days,status,open', 'numerical', 'integerOnly'=>true),
			array('agreement', 'compare', 'compareValue'=>'1','message'=>'未同意置顶规则'),
			array('user_id,type,days,status,open', 'numerical', 'integerOnly'=>true),
			array('relation_id, hours, create_time', 'length', 'max'=>11),
			array('start_date, start_time', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, relation_id, start_date, start_time, hours, days,status,open,create_time', 'safe', 'on'=>'search'),
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
		    'User'=>array(self::BELONGS_TO,'User','user_id'),
				'ConfigValues'=>array(self::BELONGS_TO, 'ConfigValues', 'hours'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id'=>'用户ID',
			'type' => '置顶类型',
			'relation_id' => '信息名称',
			'start_date' => '开始日期',
			'start_time' => '开始时间',
			'hours' => '置顶时长',
			'days' => '持续时间',
			'status'=>'发布状态',
			'open'=>'是否结束',
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('relation_id',$this->relation_id,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('hours',$this->hours,true);
		$criteria->compare('days',$this->days);
		$criteria->compare('status',$this->status);
		$criteria->compare('open',$this->open);
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
			   $this->User->user_login;
			   break;
			case 'type':
			    $tops_type=CV::$tops_type;
			    return $tops_type[$this->type];
			    break;
			case 'relation_id':
			   $type=$this->type;
			   $user_id=$this->user_id;
			   switch($type){
					case '1':
		  			$guide=Guide::model();
		  			$guide_data=$guide->find(array('condition'=>'user_id=:user_id','params'=>array(':user_id'=>$user_id)));
		 			  return $guide_data->guide_number;
		 			  break;
					case '2':
		  			$agency=TravelAgency::model();
		  			$agency_data=$agency->find(array('condition'=>'user_id=:user_id','params'=>array(':user_id'=>$user_id)));
		  			return $agency_data->agency_name;
		  			break;
					case '3':
		  			$restaurant=TravelRestaurant::model();
		  			$restaurant_data=$restaurant->find(array('condition'=>'user_id=:user_id','params'=>array(':user_id'=>$user_id)));
		  			return $restaurant_data->restaurant_name;
		  			break;
		  	  case '4':
		  	    $agency_date=AgencyDate::model();
		  			$agency_date_data=$agency_date->find(array('condition'=>'id=:id','params'=>array(':id'=>$this->relation_id)));
		  			return $agency_date_data->line;
		  	    break;
		  	  default:
		  	    break;
   	  }
			    break;
			case 'status':
				  $top_status=CV::$top_status;
			    return $top_status[$this->status];	
				break;
		  case 'open':
		      $top_open=CV::$top_open;
		      return $top_open[$this->open];
		  case 'days':
		    	$top_days=CV::$top_days;
		      return $top_days[$this->days]."天";
		    	break;
			case 'create_time':
				 return date('Y-m-d H:i:s',$this->create_time);
				 break;
			case 'hours':
				 return $this->ConfigValues->name."/天";
				 break;
			default:
			   return $this->$attribute_name;
			   break;
		}
	}
	
	function get_web_operate(){
		$return_str="";
		  if($this->status != '2'){
		    $return_str.=CHtml::link('修改',Yii::app()->getController()->createUrl("user/tops",array("id"=>$this->id)),array('class'=>'sure_bt_link'));		 
		  }
		  return $return_str;
	}
	
	function get_start_time(){
		$start_date=$this->start_date;
		$start_time=$this->start_time;
		return $start_date." ".$start_time;
	}
	function get_end_time(){
		$start_date=$this->start_date;
		$start_time=$this->start_time;
		$hours=$this->ConfigValues->extern_value;
		$days=$this->days;
		$open_start_time=$start_date." ".$start_time;
		$open_start_time=strtotime($open_start_time);
		$open_end_time=date('Y-m-d H:i:s',mktime(date("H",$open_start_time)+$hours,date("i",$open_start_time),date("s",$open_start_time), date("m",$open_start_time),date("d",$open_start_time)+$days,date("Y",$open_start_time)));
		return $open_end_time;
	}
}