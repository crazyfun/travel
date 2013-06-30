<?php

/**
 * This is the model class for table "{{express}}".
 *
 * The followings are the available columns in table '{{express}}':
 * @property string $id
 * @property string $contacter
 * @property string $contacter_phone
 * @property string $contacter_company
 * @property string $contacter_address
 * @property string $express_date
 * @property string $scan
 * @property string $comment
 * @property integer $status
 * @property string $receive_date
 * @property integer $station_id
 * @property string $create_id
 * @property string $create_time
 */
class Express extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Express the static model class
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
		return '{{express}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		  array('contacter,contacter_phone,contacter_address','required','message'=>'{attribute}不能为空'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('contacter, contacter_phone', 'length', 'max'=>30),
			array('contacter_company', 'length', 'max'=>100),
			array('contacter_address, scan', 'length', 'max'=>200),
			array('express_date,receive_date', 'length', 'max'=>20),
			array('station_id,create_id, create_time', 'length', 'max'=>11),
			array('comment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, contacter, contacter_phone, contacter_company, contacter_address, express_date, scan, comment, status, create_id, create_time,receive_date', 'safe', 'on'=>'search'),
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
			'contacter' => '联系人',
			'contacter_phone' => '联系电话',
			'contacter_company' => '公司',
			'contacter_address' => '地址',
			'express_date' => '发货时间',
			'scan' => '扫描件',
			'comment' => '备注',
			'status' => '发货状态',
			'receive_date'=>'收货时间',
			'create_id' => '创建人',
			'station_id'=>'分站',
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
			case 'scan':
			  return CHtml::image("/".$this->scan,"",array());
			  break;
			case 'status':
			  $express_status=CV::$express_status;
			  return $express_status[$this->status];
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
		  if(($this->status=='1')&&Util::is_permission($user_permission_name,"status"))
		  	$return_str.=CHtml::link('收货状态',array($controller_id."/status","id"=>$this->id),array('class'=>'operate_green'));
		  if(Util::is_permission($user_permission_name,"delete")) 	
		   	$return_str.=CHtml::link('删除','javascript:void(0);',array('id'=>'delete_'.$this->id,'class'=>'operate_red','onclick'=>"javascript:ajax_delete('".Yii::app()->getController()->createUrl('main/delete')."','".get_class($this)."','".$this->id."');"));
		  $return_str.="</div>";
		  return $return_str;
	}
}