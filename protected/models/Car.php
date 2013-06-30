<?php

/**
 * This is the model class for table "{{car}}".
 *
 * The followings are the available columns in table '{{car}}':
 * @property string $id
 * @property string $relation_id
 * @property string $car_driver
 * @property string $car_num
 * @property string $car_age
 * @property string $cell_phone
 * @property string $tele_phone
 * @property string $driver_email
 * @property string $driver_qq
 * @property string $driver_msn
 * @property string $driver_address
 * @property string $trave_name
 * @property string $price
 * @property string $car_price
 * @property integer $service
 * @property integer $status
 * @property string $use_date
 * @property string $car_type
 * @property string $car_comment
 * @property string $station_id
 * @property string $create_id
 * @property string $create_time
 */
class Car extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Car the static model class
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
		return '{{car}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('service, status', 'numerical', 'integerOnly'=>true),
			array('relation_id, price, car_price, station_id, create_id, create_time', 'length', 'max'=>11),
			array('car_driver, car_num, cell_phone, tele_phone, driver_email, driver_msn, use_date, car_type', 'length', 'max'=>30),
			array('car_age', 'length', 'max'=>10),
			array('driver_qq', 'length', 'max'=>20),
			array('driver_address, trave_name', 'length', 'max'=>100),
			array('car_comment', 'safe'),
			//array('driver_email','email','message'=>'{attribute}格式错误'),
			array('price,car_price,car_age','numerical','message'=>'{attribute}必须是数字'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, relation_id, car_driver, car_num, car_age, cell_phone, tele_phone, driver_email, driver_qq, driver_msn, driver_address, trave_name, price, car_price, service, status, use_date, car_type, car_comment, station_id, create_id, create_time', 'safe', 'on'=>'search'),
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
			'Motorcade'=>array(self::BELONGS_TO,'Motorcade','relation_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'relation_id' => '车队',
			'car_driver' => '司机',
			'car_num' => '车号',
			'car_age' => '车龄',
			'cell_phone' => '手机号码',
			'tele_phone' => '座机号码',
			'driver_email' => '邮箱',
			'driver_qq' => 'Qq',
			'driver_msn' => 'Msn',
			'driver_address' => '居住地址',
			'trave_name' => '线路名称',
			'price' => '价格',
			'service' => '服务',
			'status' => '结算状态',
			'use_date' => '使用日期',
			'car_type' => '车型',
			'car_comment' => '备注',
			'station_id' => '分站',
			'create_id' => '创建者',
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
		$criteria->compare('car_driver',$this->car_driver,true);
		$criteria->compare('car_num',$this->car_num,true);
		$criteria->compare('car_age',$this->car_age,true);
		$criteria->compare('cell_phone',$this->cell_phone,true);
		$criteria->compare('tele_phone',$this->tele_phone,true);
		$criteria->compare('driver_email',$this->driver_email,true);
		$criteria->compare('driver_qq',$this->driver_qq,true);
		$criteria->compare('driver_msn',$this->driver_msn,true);
		$criteria->compare('driver_address',$this->driver_address,true);
		$criteria->compare('trave_name',$this->trave_name,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('car_price',$this->car_price,true);
		$criteria->compare('service',$this->service);
		$criteria->compare('status',$this->status);
		$criteria->compare('use_date',$this->use_date,true);
		$criteria->compare('car_type',$this->car_type,true);
		$criteria->compare('car_comment',$this->car_comment,true);
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
		  if($this->status=='1'&&Util::is_permission($user_permission_name,"status"))
		     $return_str.=CHtml::link('结算',array($controller_id."/status","id"=>$this->id),array('class'=>'operate_green'));
		  if(Util::is_permission($user_permission_name,"edit"))
		     $return_str.=CHtml::link('修改',array($controller_id."/edit","id"=>$this->id),array('class'=>'operate_green'));
		  if(Util::is_permission($user_permission_name,"delete"))
		    $return_str.=CHtml::link('删除','javascript:void(0);',array('id'=>'delete_'.$this->id,'class'=>'operate_red','onclick'=>"javascript:ajax_delete('".Yii::app()->getController()->createUrl('main/delete')."','".get_class($this)."','".$this->id."');"));
		  $return_str.="</div>";
		  return $return_str;
	}
	
	function show_attribute($attribute_name){
		switch($attribute_name){
			case 'relation_id':
			    return $this->Motorcade->motorcade_name;
			  break;
			case 'status':
				$settlement_status=CV::$settlement_status;
			    return $settlement_status[$this->status];
				break;
		    case 'service':
		    	$service=CV::$service;
		        return $service[$this->service];
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
	
	
	//获得总车数
	function get_total_nums($conditions,$params){
 
		$total_nums=$this->find(array('select'=>'COUNT(t.id) as price','condition'=>implode(" AND ",$conditions),'params'=>$params));
		return empty($total_nums->price)?0:$total_nums->price;
	}
	//获得总价格
	function get_total_sell($conditions,$params){

	  $total_sell=$this->find(array('select'=>'SUM(t.price) as price','condition'=>implode(" AND ",$conditions),'params'=>$params));
		return empty($total_sell->price)?0:$total_sell->price;
	}
	
		//获得已结算
	function get_already_settle($conditions,$params){

	  array_push($conditions,"t.status = :search_status");
	  $params[':search_status']='2';
		$already_settle=$this->find(array('select'=>'SUM(t.price) as price','condition'=>implode(" AND ",$conditions),'params'=>$params));
		return empty($already_settle->price)?0:$already_settle->price;

	}
	
	//获得未结算
	function get_no_settle($conditions,$params){

		array_push($conditions,"t.status = :search_status");
	  $params[':search_status']='1';
		$no_settle=$this->find(array('select'=>'SUM(t.price) as price','condition'=>implode(" AND ",$conditions),'params'=>$params));
		return empty($no_settle->price)?0:$no_settle->price;
	}
	
	
}