<?php
/**
 * This is the model class for table "{{tousu}}".
 *
 * The followings are the available columns in table '{{tousu}}':
 * @property string $id
 * @property string $relation_id
 * @property string $contacter
 * @property string $cell_phone
 * @property string $message
 * @property integer $status
 * @property string $operate_content
 * @property string $operate_id
 * @property string $operate_time
 * @property string $create_id
 * @property string $create_time
 */
class Tousu extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tousu the static model class
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
		return '{{tousu}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('relation_id','required','message'=>'{attribute}不能为空'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('relation_id, operate_id,create_id, operate_time,create_time', 'length', 'max'=>11),
			array('contacter, cell_phone', 'length', 'max'=>30),
			array('operate_content,message', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, relation_id, contacter, cell_phone, message,operate_content, status,operate_id, create_id, operate_time,create_time', 'safe', 'on'=>'search'),
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
			'Operate'=>array(self::BELONGS_TO,'User','operate_id'),
			'Dijieshe'=>array(self::BELONGS_TO,'Dijieshe','relation_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'relation_id' => '地接社',
			'contacter' => '投诉人',
			'cell_phone' => '投诉人联系方式',
			'message' => '投诉原因',
			'operate_content'=>'处理内容',
			'status' => '是否处理',
			'operate_id'=>'处理人',
			'create_id' => '创建人',
			'create_time' => '创建时间',
			'operate_time'=>'处理时间',
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
		$criteria->compare('contacter',$this->contacter,true);
		$criteria->compare('cell_phone',$this->cell_phone,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('operate_content',$this->operate_content,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_id',$this->create_id,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('operate_id',$this->create_id,true);
		$criteria->compare('operate_time',$this->create_time,true);

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
		  if($this->status=='1'&&Util::is_permission($user_permission_name,"tousustatus"))
		     $return_str.=CHtml::link('处理',array($controller_id."/tousustatus","id"=>$this->id,'relation_id'=>$this->relation_id),array('class'=>'operate_green'));
		  if(Util::is_permission($user_permission_name,"edittousu"))
		  	$return_str.=CHtml::link('修改',array($controller_id."/edittousu","id"=>$this->id),array('class'=>'operate_green'));
		  if(Util::is_permission($user_permission_name,"deletetousu")) 	
		   	$return_str.=CHtml::link('删除','javascript:void(0);',array('id'=>'delete_'.$this->id,'class'=>'operate_red','onclick'=>"javascript:ajax_delete('".Yii::app()->getController()->createUrl('main/delete')."','".get_class($this)."','".$this->id."');"));
		  $return_str.="</div>";
		  return $return_str;
	}
	function show_attribute($attribute_name){
		switch($attribute_name){
			case 'status':
				 $operate=CV::$operate;
			    return $operate[$this->status];
				break;
			case 'relation_id':
			    return $this->Dijieshe->name;
			  break;
			case 'create_id':
				return $this->User->real_name;
				break;
			case 'create_time':
				return date('Y-m-d H:i:s',$this->create_time);
				break;
		  case 'operate_time':
		    return date('Y-m-d H:i:s',$this->operate_time);
		    break;
			default:
			  return $this->$attribute_name;
			  break;
		}
	}
	function format_create_time(){
		return date("Y-m-d H:i:s",$this->create_time);
	}
}