<?php

/**
 * This is the model class for table "{{store}}".
 *
 * The followings are the available columns in table '{{store}}':
 * @property string $id
 * @property string $user_id
 * @property string $name
 * @property string $store_logo
 * @property string $store_banner
 * @property string $company
 * @property string $company_logo
 * @property string $contacter
 * @property string $contacter_email
 * @property string $contacter_phone
 * @property string $contacter_qq
 * @property string $contacter_msn
 * @property string $store_phone
 * @property string $store_fax
 * @property string $store_address
 * @property string $store_area
 * @property string $store_area_name
 * @property string $store_describe
 * @property integer $is_top
 * @property integer $is_vip
 * @property integer $status
 * @property string $create_time
 */
class Station extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Store the static model class
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
		return '{{store}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		
		  array('name,company,store_area,contacter,store_phone','required','message'=>'{attribute}不能为空','on'=>'StoreRegiste'),
		   array('name','exist_name','on'=>'StoreRegiste'),
		  array('contacter_email','email','message'=>'{attribute}格式错误','on'=>'StoreRegiste'),
			array('is_top, is_vip, status,pay_status', 'numerical', 'integerOnly'=>true),
			array('user_id,store_area,create_time', 'length', 'max'=>11),
			array('coordinate,name, store_area_name,company, store_address', 'length', 'max'=>100),
			array('store_logo, store_banner, company_logo', 'length', 'max'=>200),
			array('contacter, contacter_email, contacter_phone, contacter_qq, contacter_msn, store_phone, store_fax', 'length', 'max'=>30),
			array('store_describe', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, name, store_logo, store_banner, company, company_logo, contacter, contacter_email, contacter_phone, contacter_qq, contacter_msn, store_phone, store_fax, store_address, store_area, store_area_name, store_describe, is_top, is_vip, status, pay_status,create_time', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => '用户名',
			'name' => '商铺名称',
			'store_logo' => '商铺logo',
			'store_banner' => '商铺banner',
			'company' => '公司名称',
			'company_logo' => '公司执照',
			'contacter' => '联系人',
			'contacter_email' => '联系人邮箱',
			'contacter_phone' => '联系人号码',
			'contacter_qq' => '联系人QQ',
			'contacter_msn' => '联系人MSN',
			'store_phone' => '商铺号码',
			'store_fax' => '商铺传真',
			'store_address' => '商铺地址',
			'coordinate'=>'坐标',
			'store_area' => '商铺区域',
			'store_area_name' => '商铺区域名',
			'store_describe' => '商铺详细描述',
			'is_top' => '旺铺',
			'is_vip' => 'VIP',
			'status' => '审核状态',
			'pay_status'=>'付款状态',
			'create_time' => '申请时间',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('store_logo',$this->store_logo,true);
		$criteria->compare('store_banner',$this->store_banner,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('company_logo',$this->company_logo,true);
		$criteria->compare('contacter',$this->contacter,true);
		$criteria->compare('contacter_email',$this->contacter_email,true);
		$criteria->compare('contacter_phone',$this->contacter_phone,true);
		$criteria->compare('contacter_qq',$this->contacter_qq,true);
		$criteria->compare('contacter_msn',$this->contacter_msn,true);
		$criteria->compare('store_phone',$this->store_phone,true);
		$criteria->compare('store_fax',$this->store_fax,true);
		$criteria->compare('store_address',$this->store_address,true);
		$criteria->compare('store_area',$this->store_area,true);
		$criteria->compare('store_area_name',$this->store_area_name,true);
		$criteria->compare('store_describe',$this->store_describe,true);
		$criteria->compare('is_top',$this->is_top);
		$criteria->compare('is_vip',$this->is_vip);
		$criteria->compare('status',$this->status);
		$criteria->compare('pay_status',$this->pay_status);
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
				$this->user_id=Yii::app()->user->id;
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
				return $this->User->user_login;
				break;
		  case 'store_logo':
		  	return CHtml::image("/".$this->store_logo,$this->name,array());
		  	break;
		  case 'store_banner':
		  	return CHtml::image("/".$this->store_banner,$this->name,array());
		  	break;
		  case 'company_logo':
		  	return CHtml::image("/".$this->company_logo,$this->company,array());
		  	break;
		  case 'is_top':
		   
		  if($this->is_top==2){
				return "<div class='w_shop_pic'>&nbsp;</div>";
			}else{
				return "<div class='n_vip_pic'>&nbsp;</div>";
			}
			
		    break;
		  case 'is_vip':
		   
		  if($this->is_vip==2){
				return "<div class='vip_pic'>&nbsp;</div>";
			}else{
				return "<div class='n_vip_pic'>&nbsp;</div>";
			}
			
		    break;
		case 'status':
			if($this->status==2){
				return "<div class='rz_shop_pic'>&nbsp;</div>";
			}else{
				return "<div class='n_rz_shop_pic'>&nbsp;</div>";
			}
			break;
		case 'pay_status':
		   $store_pay=CV::$store_pay;
		   return $store_pay[$this->pay_status];
		   break;
			case 'create_time':
				return date('Y-m-d H:i:s',$this->create_time);
				break;
			default:
			  return $this->$attribute_name;
			  break;
		}
	}
	
	function show_store_address(){
			return $this->store_address.'(<a class="operate_green" href="javascript:baidu_maps(\''.$this->coordinate.'\')">查看</a>)';

	}
	function exist_name(){
		$id=$this->id;
		if(!empty($id)){
			 $get_table_datas=$this->get_table_datas($id,array());
			 if($get_table_datas->name!=$this->name){
			 	 $find_datas=$this->find(array(
          'select'=>'name',
          'condition'=>'name=:name',
          'params'=>array(':name' => $this->name),
         ));
			 }
		}else{
			$find_datas=$this->find(array(
         'select'=>'name',
         'condition'=>'name=:name',
         'params'=>array(':name' => $this->name),
       ));
		}
     if(!empty($find_datas)){
     	 $this->addError("name","商铺名称已存在");
     }
	}
	
	function get_operate(){
		 $user=new User();
		  $user_permission_name=$user->get_permissions_name();
		  $controller_id=Yii::app()->getController()->getId();
		  $return_str="<div class='operate_button'>";
		  if(Util::is_permission($user_permission_name,"view"))
		    $return_str.=CHtml::link('查看','javascript:void(0);',array('class'=>'operate_green','onclick'=>"javascript:frame_view('".Yii::app()->getController()->createUrl('view')."','".get_class($this)."','".$this->id."');"));
		  if(Util::is_permission($user_permission_name,"status")){
		  	if($this->status=='1'&&$this->pay_status=="2")
		      $return_str.=CHtml::link('认证',array($controller_id."/status","id"=>$this->id,"status"=>'2'),array('class'=>'operate_green'));
		    if($this->status=='2')
		      $return_str.=CHtml::link('取消认证',array($controller_id."/status","id"=>$this->id,"status"=>'1'),array('class'=>'operate_green'));   
		  }
		  
		  if(Util::is_permission($user_permission_name,"vip")){
		  	if($this->is_vip=='1')
		      $return_str.=CHtml::link('设为Vip',array($controller_id."/vip","id"=>$this->id,"vip"=>'2'),array('class'=>'operate_green'));
		    if($this->is_vip=='2')
		      $return_str.=CHtml::link('取消Vip',array($controller_id."/vip","id"=>$this->id,"vip"=>'1'),array('class'=>'operate_green'));
		  }
		  
		  if(Util::is_permission($user_permission_name,"top")){
		  	if($this->is_top=='1')
		      $return_str.=CHtml::link('设为旺铺',array($controller_id."/top","id"=>$this->id,"top"=>'2'),array('class'=>'operate_green'));
		    if($this->is_top=='2')
		      $return_str.=CHtml::link('取消旺铺',array($controller_id."/top","id"=>$this->id,"top"=>'1'),array('class'=>'operate_green'));
		  }
		  $return_str.="</div>";
		  return $return_str;
	}
	
	function get_create_id(){
		$user=new User();
		$user_permission_name=$user->get_permissions_name();
		$user_login=$this->User->user_login;
		$return_str=$user_login;
		if(Util::is_permission($user_permission_name,"permission")){
			$return_str.="(<a class=\"operate_green\" href=\"javascript:set_store_permissions('".$this->user_id."')\">设置角色</a>)";
		}
		return $return_str;
	}
	function get_is_store($user_id=""){

		$user_id=empty($user_id)?$this->user_id:$user_id;
		$store_data=$this->find(array('select'=>'is_vip,is_top','condition'=>'t.user_id=:user_id','params'=>array(':user_id'=>$user_id)));
		if(!empty($store_data)){
			if($store_data->is_vip=='1'){
				return "<div class='n_vip_pic'>&nbsp;</div>".CHtml::link("申请VIP商铺",Yii::app()->getController()->createUrl("/user/applyvipstore"),array('class'=>'sure_bt_link'));
			}else{
				return "<div class='vip_pic'>&nbsp;</div>";
			}
		}else{
			return CHtml::link("申请商铺",Yii::app()->getController()->createUrl("/user/applystore"),array('class'=>'sure_bt_link'));
		}
	}
	
	
	function get_admin_is_store($user_id=""){
		$user_id=empty($user_id)?$this->user_id:$user_id;
		$store_data=$this->find(array('select'=>'is_vip,is_top','condition'=>'t.user_id=:user_id','params'=>array(':user_id'=>$user_id)));
		if(!empty($store_data)){
			if($store_data->is_vip=='1'){
				return "<a class='n_vip_pic' href='".Yii::app()->getController()->createUrl("/user/mystore")."'>&nbsp;</a>";
			}else{
				return "<a class='vip_pic' href='".Yii::app()->getController()->createUrl("/user/mystore")."'>&nbsp;</a>";
			}
		}
	}
	
	function get_admin_login(){
		$user_id=$this->user_id;
		$user_type=UserType::model();
	  $type_value=$user_type->get_user_type($user_id);
	  switch($type_value){
	  	 case '3':
	  	   if($this->status=='2'){
	  	   	 return CHtml::link('进入商家后台管理',"/shop.php",array('class'=>'sure_bt_link'));
	  	   }
	  	   break;
	  	 case '4':
	  	 if($this->status=='2'){
	  	   	return CHtml::link('进入商家后台管理',"/hotel.php",array('class'=>'sure_bt_link'));
	  	   }
	  	   break;
	  	 default:
	  	   break;
	  }
		
	}
}