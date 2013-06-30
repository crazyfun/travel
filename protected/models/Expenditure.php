<?php

/**
 * This is the model class for table "{{expenditure}}".
 *
 * The followings are the available columns in table '{{expenditure}}':
 * @property string $id
 * @property string $type_id
 * @property string $contacter
 * @property string $contacter_phone
 * @property string $price
 * @property string $expenditure_date
 * @property string $comment
 * @property string $station_id
 * @property string $create_id
 * @property string $create_time
 */
class Expenditure extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Expenditure the static model class
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
		return '{{expenditure}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('price,type_id','required','message'=>'{attribute}不能为空'),
			array('expenditure_date,contacter, contacter_phone', 'length', 'max'=>30),
			array('type_id,price, station_id, create_id, create_time', 'length', 'max'=>11),
			array('price','numerical','message'=>'{attribute}必须是数字'),
			array('comment','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('expenditure_date,type_id,id, contacter, contacter_phone, price, comment,station_id, create_id, create_time', 'safe', 'on'=>'search'),
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
		  'ExpenditureType'=>array(self::BELONGS_TO,'ExpenditureType','type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type_id'=>'支出类型',
			'contacter' => '支出人',
			'contacter_phone' => '联系电话',
			'price' => '支出金额',
			'expenditure_date'=>'支出时间',
			'comment'=>'备注',
			'station_id' => '分站',
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
			case 'type_id':
				 return $this->ExpenditureType->name;
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
	
	
	function get_total($conditions,$params){
		$total_price=$this->find(array('select'=>'SUM(t.price) as price','condition'=>implode(" AND ",$conditions),'params'=>$params));
		return empty($total_price->price)?0:$total_price->price;
	}

}