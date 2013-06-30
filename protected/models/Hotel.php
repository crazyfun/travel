<?php

/**
 * This is the model class for table "{{hotel}}".
 *
 * The followings are the available columns in table '{{hotel}}':
 * @property string $id
 * @property string $hotel_name
 * @property string $hotel_img
 * @property string $hotel_address
 * @property string $cell_phone
 * @property string $hotel_fax
 * @property string $tele_phone
 * @property string $hotel_contacter
 * @property string $hotel_level
 * @property string $email
 * @property string $qq
 * @property string $msn
 * @property string $market_price
 * @property string $sanke_price
 * @property string $tuandui_price
 * @property string $hotel_desc
 * @property string $hotel_comment
 * @property string $station_id
 * @property string $create_id
 * @property string $create_time
 */
class Hotel extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hotel the static model class
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
		return '{{hotel}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hotel_name,cell_phone,hotel_contacter','required','message'=>'{attribute}不能为空'),
			array('hotel_name, hotel_img, hotel_address', 'length', 'max'=>200),
			array('cell_phone, hotel_fax, tele_phone, hotel_contacter, email, msn', 'length', 'max'=>30),
			array('qq, market_price, sanke_price, tuandui_price', 'length', 'max'=>20),
			array('station_id, create_id, create_time', 'length', 'max'=>11),
			array('hotel_level', 'numerical', 'integerOnly'=>true),
			array('hotel_desc, hotel_comment', 'safe'),
			//array('email','email','message'=>'{attribute}格式错误'),
			array('market_price,sanke_price,tuandui_price','numerical','message'=>'{attribute}必须是数字'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, hotel_name, hotel_img, hotel_address, cell_phone, hotel_fax, tele_phone, hotel_contacter, email, qq, msn, market_price, sanke_price, tuandui_price, hotel_desc, hotel_comment, station_id, create_id, create_time', 'safe', 'on'=>'search'),
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
			'hotel_name' => '酒店名称',
			'hotel_img' => '酒店外貌',
			'hotel_address' => '酒店地址',
			'cell_phone' => '联系电话',
			'hotel_fax' => '传真',
			'tele_phone' => '座机',
			'hotel_contacter' => '联系人',
			'hotel_level'=>'星级酒店',
			'email' => '邮箱',
			'qq' => 'Qq',
			'msn' => 'Msn',
			'market_price' => '挂牌价',
			'sanke_price' => '散客价',
			'tuandui_price' => '团队价',
			'hotel_desc' => '酒店描述',
			'hotel_comment' => '备注',
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
		$criteria->compare('hotel_name',$this->hotel_name,true);
		$criteria->compare('hotel_img',$this->hotel_img,true);
		$criteria->compare('hotel_address',$this->hotel_address,true);
		$criteria->compare('cell_phone',$this->cell_phone,true);
		$criteria->compare('hotel_fax',$this->hotel_fax,true);
		$criteria->compare('tele_phone',$this->tele_phone,true);
		$criteria->compare('hotel_contacter',$this->hotel_contacter,true);
		$criteria->compare('hotel_level',$this->hotel_level,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('msn',$this->msn,true);
		$criteria->compare('market_price',$this->market_price,true);
		$criteria->compare('sanke_price',$this->sanke_price,true);
		$criteria->compare('tuandui_price',$this->tuandui_price,true);
		$criteria->compare('hotel_desc',$this->hotel_desc,true);
		$criteria->compare('hotel_comment',$this->hotel_comment,true);
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
		  if(Util::is_permission($user_permission_name,"edit"))
		  	$return_str.=CHtml::link('修改',array($controller_id."/edit","id"=>$this->id),array('class'=>'operate_green'));
		  if(Util::is_permission($user_permission_name,"delete")) 	
		   	$return_str.=CHtml::link('删除','javascript:void(0);',array('id'=>'delete_'.$this->id,'class'=>'operate_red','onclick'=>"javascript:ajax_delete('".Yii::app()->getController()->createUrl('main/delete')."','".get_class($this)."','".$this->id."');"));
		  $return_str.="</div>";
		  return $return_str;
	}
	
	function show_attribute($attribute_name){
		switch($attribute_name){
			case 'hotel_img':
				return CHtml::image("/".$this->hotel_img,"",array());
				break;
		  case 'hotel_level':
		    $hotel_level=CV::$hotel_level;
		    return $hotel_level[$this->hotel_level];
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