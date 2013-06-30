<?php

/**
 * This is the model class for table "{{income}}".
 *
 * The followings are the available columns in table '{{income}}':
 * @property string $id
 * @property integer $order_type
 * @property string $order_number
 * @property string $contacter
 * @property string $contacter_phone
 * @property string $total_price
 * @property string $already_price
 * @property string $custom_id
 * @property string $comment
 * @property integer $station_id
 * @property string $create_id
 * @property string $create_time
 */
class Income extends BaseActive
{
	public $custom_name="";
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Income the static model class
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
		return '{{income}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_type,order_number,contacter,total_price,already_price','required','message'=>'{attribute}不能为空'),
			array('order_type', 'numerical', 'integerOnly'=>true),
			array('order_number, total_price, already_price, custom_id, station_id,create_id, create_time', 'length', 'max'=>11),
			array('contacter, contacter_phone', 'length', 'max'=>30),
			array('comment', 'safe'),
			array('total_price,already_price','numerical','message'=>'{attribute}必须是数字'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_type, order_number, contacter, contacter_phone, total_price, already_price, custom_id, comment, station_id,create_id, create_time', 'safe', 'on'=>'search'),
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
		  'Station'=>array(self::BELONGS_TO, 'Station', 'station_id'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_type' => '订单类型',
			'order_number' => '订单编号',
			'contacter' => '收款人',
			'contacter_phone' => '联系电话',
			'total_price' => '总价钱',
			'already_price' => '已支付价钱',
			'custom_id' => '客户',
			'comment' => '备注',
			'station_id'=>'分站',
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
		    case 'custom_id':
		       $order_type=$this->order_type;
		       switch($order_type){
		         case '1':
		          $scustoms=new Scustoms();
		          $custom_datas=$scustoms->findByPk($this->custom_id);
		          return $custom_datas->name;
		           break;
		         case '2':
		           $tcustoms=new Tcustoms();
		           $custom_datas=$tcustoms->findByPk($this->custom_id);
		           return $custom_datas->company;
		           break;
		         default:
		           break;	
		       }
		    	 return $this->custom_id;	 
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
	
	
	function get_no_price(){
		return floatval($this->total_price-$this->already_price);
	}
	
	function get_total($conditions,$params){
	   $total_price=$this->find(array('select'=>'SUM(t.total_price) as total_price','condition'=>implode(" AND ",$conditions),'params'=>$params));
		return empty($total_price->total_price)?0:$total_price->total_price;
	}
	
	function get_no($conditions,$params){
		$no_price=$this->find(array('select'=>'SUM(t.total_price-t.already_price) as total_price','condition'=>implode(" AND ",$conditions),'params'=>$params));
		return empty($no_price->total_price)?0:$no_price->total_price;
	}
	
	function get_already($conditions,$params){
		$already_price=$this->find(array('select'=>'SUM(t.already_price) as already_price','condition'=>implode(" AND ",$conditions),'params'=>$params));
		return empty($already_price->already_price)?0:$already_price->already_price;
	}
}