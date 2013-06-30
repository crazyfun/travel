<?php

/**
 * This is the model class for table "{{cicerone}}".
 *
 * The followings are the available columns in table '{{cicerone}}':
 * @property string $id
 * @property string $contacter
 * @property integer $cicerone_sex
 * @property integer $cicerone_level
 * @property string $cicerone_address
 * @property string $cell_phone
 * @property string $cicerone_num
 * @property string $code
 * @property string $email
 * @property string $qq
 * @property string $msn
 * @property string $familiar
 * @property string $desc
 * @property string $comment
 * @property string $station_id
 * @property string $create_id
 * @property string $create_time
 */
class Cicerone extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cicerone the static model class
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
		return '{{cicerone}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contacter,cicerone_num,cell_phone','required','message'=>'{attribute}不能为空'),
			array('cicerone_sex, cicerone_level', 'numerical', 'integerOnly'=>true),
			array('contacter, cell_phone, code, email, msn', 'length', 'max'=>30),
			array('cicerone_address', 'length', 'max'=>200),
			array('cicerone_num, qq', 'length', 'max'=>20),
			array('station_id, create_id, create_time', 'length', 'max'=>11),
			array('familiar, desc, comment', 'safe'),
			//array('email','email','message'=>'{attribute}格式错误'),
			array('code','exist_code'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, contacter, cicerone_sex, cicerone_level, cicerone_address, cell_phone, cicerone_num, code, email, qq, msn, familiar, desc, comment, station_id, create_id, create_time', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'contacter' => '导游姓名',
			'cicerone_sex' => '导游性别',
			'cicerone_level' => '导游证级别',
			'cicerone_address' => '居住地址',
			'cell_phone' => '手机号码',
			'cicerone_num' => '导游证',
			'code' => '省份证',
			'email' => '邮箱',
			'qq' => 'Qq',
			'msn' => 'Msn',
			'familiar' => '熟悉目的地',
			'desc' => '描述',
			'comment' => '备注',
			'station_id' => '分站',
			'create_id' => '创建人',
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
		$criteria->compare('contacter',$this->contacter,true);
		$criteria->compare('cicerone_sex',$this->cicerone_sex);
		$criteria->compare('cicerone_level',$this->cicerone_level);
		$criteria->compare('cicerone_address',$this->cicerone_address,true);
		$criteria->compare('cell_phone',$this->cell_phone,true);
		$criteria->compare('cicerone_num',$this->cicerone_num,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('msn',$this->msn,true);
		$criteria->compare('familiar',$this->familiar,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('comment',$this->comment,true);
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
	function exist_code(){
		$id=$this->id;
		$station_data=Yii::app()->getController()->station_data;
		$station_id=$station_data['id'];
		if(!empty($id)){
			 $get_table_datas=$this->get_table_datas($id,array());
			 if($get_table_datas->code!=$this->code){
			 	 $find_datas=$this->find(array(
          'select'=>'code',
          'condition'=>'code=:code AND station_id=:station_id',
          'params'=>array(':code' => $this->code,':station_id'=>$station_id),
         ));
			 }
		}else{
		  
			$find_datas=$this->find(array(
         'select'=>'code',
         'condition'=>'code=:code AND station_id=:station_id',
         'params'=>array(':code' => $this->code,':station_id'=>$station_id),
       ));
		}
     if(!empty($find_datas)){
     	 $this->addError("code","身份证已存在");
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
	
	function show_attribute($attribute_name){
		switch($attribute_name){
			case 'cicerone_level':
				 $cicerone_level=CV::$cicerone_level;
			     return $cicerone_level[$this->cicerone_level];
				 break;
		    case 'cicerone_sex':
		    	 $sex=CV::$sex;
			     return $sex[$this->cicerone_sex];
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
}