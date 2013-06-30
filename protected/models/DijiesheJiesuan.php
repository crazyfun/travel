<?php

/**
 * This is the model class for table "{{dijieshe_jiesuan}}".
 *
 * The followings are the available columns in table '{{dijieshe_jiesuan}}':
 * @property string $id
 * @property string $order_id
 * @property string $dijieshe_id
 * @property string $jiesuan_value
 * @property string $comment
 * @property string $station_id
 * @property string $create_id
 * @property string $create_time
 */
class DijiesheJiesuan extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DijiesheJiesuan the static model class
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
		return '{{dijieshe_jiesuan}}';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		  array('order_type,order_id,dijieshe_id,jiesuan_value','required','message'=>'{attribute}不能为空'),
		  //array('jiesuan_value','validate_jiesuan_value'),
			array('station_id,order_id, dijieshe_id, jiesuan_value, create_id, create_time', 'length', 'max'=>11),
			array('order_type','length','max'=>'2'),
			array('comment', 'safe'),
			array('jiesuan_value','numerical','message'=>'{attribute}必须是数字'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_type,order_id, dijieshe_id, jiesuan_value, comment, create_id, create_time,station_id,order_type', 'safe', 'on'=>'search'),
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
			'Dijieshe'=>array(self::BELONGS_TO,'Dijieshe','dijieshe_id'),
			'Order'=>array(self::BELONGS_TO,'Order','order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_type'=>'订单类型',
			'order_id' => '线路',
			'dijieshe_id' => '地接社',
			'jiesuan_value' => '结算值',
			'comment' => '备注',
			'station_id'=>'分站ID',
			'create_id' => '创建人',
			'create_time' => '创建时间',
		);
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
	function show_attribute($attribute_name){
		switch($attribute_name){
			case 'order_type':
			  $jiesuan_type=CV::$jiesuan_type;
			  return $jiesuan_type[$this->order_type];
			  break;
			case 'order_id':
			  return $this->Order->line;
			  break;
			case 'dijieshe_id':
			  return $this->Dijieshe->name;
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
	function get_operate(){
   		$user=new User();
		  $user_permission_name=$user->get_permissions_name();
		   $controller_id=Yii::app()->getController()->getId();
		  $return_str="<div class='operate_button'>";
		  if(Util::is_permission($user_permission_name,"settlee"))
		  	$return_str.=CHtml::link('修改',array($controller_id."/settlee","id"=>$this->id),array('class'=>'operate_green'));
		  $return_str.="</div>";
		  return $return_str;
	}
	//获得某个订单已结算的值
	function get_settle_by_order($order_id=""){
		 $order_id=empty($order_id)?$this->order_id:$order_id;
		 $no_settle=$this->find(array('select'=>'SUM(jiesuan_value) as jiesuan_value','condition'=>'order_id=:order_id','params'=>array(':order_id'=>$order_id)));
		 return $no_settle->jiesuan_value;
	}
	//获得某个地接社的已结算的值
	function get_settle_by_dijieshe($dijieshe_id){
		 $no_settle=$this->find(array('select'=>'SUM(jiesuan_value) as jiesuan_value','condition'=>'dijieshe_id=:dijieshe_id','params'=>array(':dijieshe_id'=>$dijieshe_id)));
		 return $no_settle->jiesuan_value;
	}
	
	//获得统计的结算金额
	function get_already_settle($conditions,$params){
		$already_settle=$this->find(array('select'=>'SUM(t.jiesuan_value) as jiesuan_value','condition'=>implode(" AND ",$conditions),'params'=>$params));
		return empty($already_settle->jiesuan_value)?0:$already_settle->jiesuan_value;
	}
	
	function validate_jiesuan_value(){
		$jiesuan_value=$this->jiesuan_value;
		$order=new Order();
		$need_settle=$order->get_need_settle($this->order_id);
		if($jiesuan_value > $need_settle){
			 $this->addError("jiesuan_value","结算值不能大于可结算值");
		}
		
	}
 
}