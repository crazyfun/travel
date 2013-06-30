<?php

/**
 * This is the model class for table "{{travel_restaurant}}".
 *
 * The followings are the available columns in table '{{travel_restaurant}}':
 * @property string $id
 * @property string $user_id
 * @property string $restaurant_name
 * @property string $restaurant_open
 * @property string $restaurant_logo
 * @property string $restaurant_region
 * @property string $restaurant_region_name
 * @property integer $restaurant_level
 * @property string $restaurant_telephone
 * @property string $restaurant_address
 * @property string $restaurant_desc
 * @property string $contacter
 * @property string $contacter_phone
 * @property string $contacter_qq
 * @property string $views
 * @property integer $recommend
 * @property integer $top
 * @property integer $status
 * @property string $create_time
 */
class TravelRestaurant extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TravelRestaurant the static model class
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
		return '{{travel_restaurant}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('restaurant_name,restaurant_region,restaurant_telephone','required','message'=>'{attribute}不能为空'),
			array('restaurant_region','validate_region'),
			array('restaurant_name','exist_restaurant_name'),
			array('restaurant_level, recommend, top, status', 'numerical', 'integerOnly'=>true),
			array('user_id, restaurant_region, views, create_time', 'length', 'max'=>11),
			array('coordinate,restaurant_name, restaurant_logo, restaurant_region_name, restaurant_address', 'length', 'max'=>100),
			array('restaurant_open, restaurant_telephone, contacter, contacter_phone, contacter_qq', 'length', 'max'=>30),
			array('restaurant_desc', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, restaurant_name, restaurant_open, restaurant_logo, restaurant_region, restaurant_region_name, restaurant_level, restaurant_telephone, restaurant_address, restaurant_desc, contacter, contacter_phone, contacter_qq, views, recommend, top, status, create_time', 'safe', 'on'=>'search'),
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
			'user_id' => '用户名称',
			'restaurant_name' => '酒店名称',
			'restaurant_open' => '酒店开业时间',
			'restaurant_logo' => '酒店logo',
			'restaurant_region' => '酒店区域',
			'restaurant_region_name' => '酒店区域名称',
			'restaurant_level' => '酒店等级',
			'restaurant_telephone' => '酒店电话',
			'restaurant_address' => '酒店地址',
			'coordinate'=>'坐标',
			'restaurant_desc' => '酒店描述',
			'contacter' => '联系人',
			'contacter_phone' => '联系电话',
			'contacter_qq' => '联系QQ',
			'views' => '查看数',
			'recommend' => '推荐',
			'top' => '热门',
			'status' => '审核',
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
		$criteria->compare('restaurant_name',$this->restaurant_name,true);
		$criteria->compare('restaurant_open',$this->restaurant_open,true);
		$criteria->compare('restaurant_logo',$this->restaurant_logo,true);
		$criteria->compare('restaurant_region',$this->restaurant_region,true);
		$criteria->compare('restaurant_region_name',$this->restaurant_region_name,true);
		$criteria->compare('restaurant_level',$this->restaurant_level);
		$criteria->compare('restaurant_telephone',$this->restaurant_telephone,true);
		$criteria->compare('restaurant_address',$this->restaurant_address,true);
		$criteria->compare('restaurant_desc',$this->restaurant_desc,true);
		$criteria->compare('contacter',$this->contacter,true);
		$criteria->compare('contacter_phone',$this->contacter_phone,true);
		$criteria->compare('contacter_qq',$this->contacter_qq,true);
		$criteria->compare('views',$this->views,true);
		$criteria->compare('recommend',$this->recommend);
		$criteria->compare('top',$this->top);
		$criteria->compare('status',$this->status);
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
	
	
	function validate_region(){
		$restaurant_region=$this->restaurant_region;
		$region=Region::model();
		$level=$region->get_region_level($restaurant_region);
		if($level>2){
			return true;
		}else{
			$this->addError('restaurant_region',"请选择市级城市");
		}
	}
	
	
	
 function show_attribute($attribute_id){
	 switch($attribute_id){
		case 'user_id':
			return $this->User->user_login;
			break;
		case 'restaurant_logo':
		  return CHtml::image("/".$this->restaurant_logo,$this->restaurant_name,array());
		  break;
		case 'restaurant_level':
			$restaurant_level=CV::$restaurant_level;
		    return $restaurant_level[$this->restaurant_level];
		    break;
	 case 'status':
			if($this->status==2){
				return "<div class='ex_pic'>&nbsp;</div>";
			}else{
				return "<div class='n_ex_pic'>&nbsp;</div>";
			}
			break;
		case 'recommend':
		  $recommend=CV::$recommend;
		  return $recommend[$this->recommend];
		  break;
		case 'create_time':
			return date("Y-m-d H:i:s",$this->create_time);
			break;
		default:
		  return $this->$attribute_id;
			break;
	 }
	}
	
	function show_restaurant_address(){
				return $this->restaurant_address.'(<a class="operate_green" href="javascript:baidu_maps(\''.$this->coordinate.'\')">查看</a>)';

	}
	
	function get_restaurant_status($user_id=""){
		$user_id=empty($user_id)?$this->user_id:$user_id;
		$restaurant_data=$this->find("user_id=:user_id",array(':user_id'=>$user_id));
		return $restaurant_data->status;
	}
	
	 function get_operate(){
		 $user=new User();
		  $user_permission_name=$user->get_permissions_name();
		  $controller_id=Yii::app()->getController()->getId();
		  $return_str="<div class='operate_button'>";
		  if(Util::is_permission($user_permission_name,"view"))
		    $return_str.=CHtml::link('查看','javascript:void(0);',array('class'=>'operate_green','onclick'=>"javascript:frame_view('".Yii::app()->getController()->createUrl('view')."','".get_class($this)."','".$this->id."');"));
		  if(Util::is_permission($user_permission_name,"status")){
		  	if($this->status=='1')
		      $return_str.=CHtml::link('审核',array($controller_id."/status","id"=>$this->id,"status"=>'2'),array('class'=>'operate_green'));
		    if($this->status=='2')
		      $return_str.=CHtml::link('取消审核',array($controller_id."/status","id"=>$this->id,"status"=>'1'),array('class'=>'operate_green'));   
		  }
		  
		  if(Util::is_permission($user_permission_name,"recommend")){
		  	if($this->recommend=='1')
		      $return_str.=CHtml::link('推荐',array($controller_id."/recommend","id"=>$this->id,"recommend"=>'2'),array('class'=>'operate_green'));
		    if($this->recommend=='2')
		      $return_str.=CHtml::link('取消推荐',array($controller_id."/recommend","id"=>$this->id,"recommend"=>'1'),array('class'=>'operate_green'));
		  }
		  $return_str.="</div>";
		  return $return_str;
	}
	
	function exist_restaurant_name(){
		$id=$this->id;
		if(!empty($id)){
			 $get_table_datas=$this->get_table_datas($id,array());
			 if($get_table_datas->restaurant_name!=$this->restaurant_name){
			 	 $find_datas=$this->find(array(
          'select'=>'restaurant_name',
          'condition'=>'restaurant_name=:restaurant_name',
          'params'=>array(':restaurant_name' => $this->restaurant_name),
         ));
			 }
		}else{
		  
			$find_datas=$this->find(array(
         'select'=>'restaurant_name',
         'condition'=>'restaurant_name=:restaurant_name',
         'params'=>array(':restaurant_name' => $this->restaurant_name),
       ));
		}
     if(!empty($find_datas)){
     	 $this->addError("restaurant_name","酒店名称已存在");
     }
	}
	
	
	
	function get_newest_restaurant($region_id="",$nums=5){
	  if(empty($region_id)){
			$ip_convert=IpConvert::get();
		  $region_session=$ip_convert->init_region();  	 		 	    
			$region_id=$region_session['id'];
		}
		$travel_agency_datas=$this->with("User")->findAll(array('select'=>'t.id,t.restaurant_name,t.restaurant_logo,t.restaurant_telephone','condition'=>'t.status=:status AND t.restaurant_region '.Util::search_in_region($region_id),'params'=>array(':status'=>'2'),'limit'=>$nums,'order'=>'t.create_time DESC'));
		return $travel_agency_datas;
	}
	
	
	function get_hot_restaurant($region_id="",$nums=5){
	  if(empty($region_id)){
			$ip_convert=IpConvert::get();
		  $region_session=$ip_convert->init_region();  	 		 	    
			$region_id=$region_session['id'];
		}
		
		$travel_agency_datas=$this->with("User")->findAll(array('select'=>'t.id,t.restaurant_name,t.restaurant_logo,t.restaurant_telephone','condition'=>'t.status=:status AND t.restaurant_region '.Util::search_in_region($region_id),'params'=>array(':status'=>'2'),'limit'=>$nums,'order'=>'t.views DESC'));
		return $travel_agency_datas;
	}
	
	
	function get_recommend_restaurant($region_id="",$nums=5){

	  if(empty($region_id)){
			$ip_convert=IpConvert::get();
		  $region_session=$ip_convert->init_region();  	 		 	    
			$region_id=$region_session['id'];
		}
		$travel_agency_datas=$this->with("User")->findAll(array('select'=>'t.id,t.restaurant_name,t.restaurant_logo,t.restaurant_telephone','condition'=>'t.status=:status AND t.restaurant_region '.Util::search_in_region($region_id).' AND t.recommend=:recommend','params'=>array(':status'=>'2',':recommend'=>'2'),'limit'=>$nums,'order'=>'t.create_time DESC'));
		return $travel_agency_datas;
	}
	
	
}