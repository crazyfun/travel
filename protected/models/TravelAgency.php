<?php

/**
 * This is the model class for table "{{travel_agency}}".
 *
 * The followings are the available columns in table '{{travel_agency}}':
 * @property string $id
 * @property string $user_id
 * @property string $agency_name
 * @property string $agency_logo
 * @property string $agency_region
 * @property string $guide_region_name
 * @property string $agency_email
 * @property string $agency_telephone
 * @property string $agency_fax
 * @property string $agency_department
 * @property string $agency_address
 * @property string $contacter
 * @property string $contacter_phone
 * @property string $contacter_qq
 * @property string $contacter_qq2
 * @property string $contacter_qq3
 * @property string $describe
 * @property string $views
 * @property integer $recommend
 * @property integer $top
 * @property integer $status
 * @property string $create_time
 */
class TravelAgency extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TravelAgency the static model class
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
		return '{{travel_agency}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('agency_name,agency_region,agency_telephone','required','message'=>'{attribute}不能为空'),
			array('agency_region','validate_region'),
			array('agency_name','exist_agency_name'),
			array('recommend, top,status', 'numerical', 'integerOnly'=>true),
			array('coordinate,guide_region_name,agency_name, agency_logo, agency_address', 'length', 'max'=>100),
			array('user_id,agency_region, views, create_time', 'length', 'max'=>11),
			array('agency_email, agency_telephone, agency_fax, agency_department, contacter, contacter_phone, contacter_qq, contacter_qq2, contacter_qq3', 'length', 'max'=>30),
			array('describe','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id,user_id,agency_name, agency_logo, agency_region, guide_region_name,agency_email, agency_telephone, agency_fax, agency_department, agency_address, contacter, contacter_phone, contacter_qq, contacter_qq2, contacter_qq3, views, recommend, top, status,create_time,describe', 'safe', 'on'=>'search'),
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
			'user_id'=>'用户名',
			'agency_name' => '旅行社名称',
			'agency_logo' => '旅行社logo',
			'agency_region' => '旅行社区域',
			'guide_region_name' => '旅行社区域名称',
			'agency_email' => '旅行社邮箱',
			'agency_telephone' => '旅行社座机',
			'agency_fax' => '旅行社传真',
			'agency_department' => '部门',
			'agency_address' => '旅行社地址',
			'coordinate'=>'坐标',
			'contacter' => '联系人',
			'contacter_phone' => '联系电话',
			'contacter_qq' => 'QQ',
			'contacter_qq2' => 'QQ2',
			'contacter_qq3' => 'QQ3',
			'describe'=>'描述',
			'views' => '查看数',
			'recommend' => '推荐',
			'top' => '置顶',
			'status'=>'审核状态',
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
		$criteria->compare('agency_name',$this->agency_name,true);
		$criteria->compare('agency_logo',$this->agency_logo,true);
		$criteria->compare('agency_region',$this->agency_region,true);
		$criteria->compare('agency_email',$this->agency_email,true);
		$criteria->compare('agency_telephone',$this->agency_telephone,true);
		$criteria->compare('agency_fax',$this->agency_fax,true);
		$criteria->compare('agency_department',$this->agency_department,true);
		$criteria->compare('agency_address',$this->agency_address,true);
		$criteria->compare('contacter',$this->contacter,true);
		$criteria->compare('contacter_phone',$this->contacter_phone,true);
		$criteria->compare('contacter_qq',$this->contacter_qq,true);
		$criteria->compare('contacter_qq2',$this->contacter_qq2,true);
		$criteria->compare('contacter_qq3',$this->contacter_qq3,true);
		$criteria->compare('describe',$this->describe,true);
		$criteria->compare('views',$this->views,true);
		$criteria->compare('recommend',$this->recommend);
		$criteria->compare('top',$this->top);
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
		$agency_region=$this->agency_region;
		$region=Region::model();
		$level=$region->get_region_level($agency_region);
		if($level>2){
			return true;
		}else{
			$this->addError('agency_region',"请选择市级城市");
		}
	}
	
	
	
   function show_attribute($attribute_id){
	 switch($attribute_id){
		case 'user_id':
			return $this->User->user_login;
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

	function get_agency_status($user_id=""){
		$user_id=empty($user_id)?$this->user_id:$user_id;
		$agency_data=$this->find("user_id=:user_id",array(':user_id'=>$user_id));
		return $agency_data->status;
	}
	
	function show_agency_address(){
		return $this->agency_address.'(<a class="operate_green" href="javascript:baidu_maps(\''.$this->coordinate.'\')">查看</a>)';
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
	
	
	function get_newest_agency($region_id="",$nums=5){
	  if(empty($region_id)){
			$ip_convert=IpConvert::get();
		  $region_session=$ip_convert->init_region();  	 		 	    
			$region_id=$region_session['id'];
		}
		$travel_agency_datas=$this->with("User")->findAll(array('select'=>'t.id,t.agency_name,t.agency_logo,t.agency_telephone','condition'=>'t.status=:status AND t.agency_region '.Util::search_in_region($region_id),'params'=>array(':status'=>'2'),'limit'=>$nums,'order'=>'t.create_time DESC'));
		return $travel_agency_datas;
	}
	
	
	function get_hot_agency($region_id="",$nums=5){
	  if(empty($region_id)){
			$ip_convert=IpConvert::get();
		  $region_session=$ip_convert->init_region();  	 		 	    
			$region_id=$region_session['id'];
		}
		
		$travel_agency_datas=$this->with("User")->findAll(array('select'=>'t.id,t.agency_name,t.agency_logo,t.agency_telephone','condition'=>'t.status=:status AND t.agency_region '.Util::search_in_region($region_id),'params'=>array(':status'=>'2'),'limit'=>$nums,'order'=>'t.views DESC'));
		return $travel_agency_datas;
	}
	
	function get_recommend_agency($region_id="",$nums=5){
	  if(empty($region_id)){
			$ip_convert=IpConvert::get();
		  $region_session=$ip_convert->init_region();  	 		 	    
			$region_id=$region_session['id'];
		}
		$travel_agency_datas=$this->with("User")->findAll(array('select'=>'t.id,t.agency_name,t.agency_logo,t.agency_telephone','condition'=>'t.status=:status AND t.agency_region '.Util::search_in_region($region_id).' AND t.recommend=:recommend','params'=>array(':status'=>'2',':recommend'=>'2'),'limit'=>$nums,'order'=>'t.create_time DESC'));
		return $travel_agency_datas;
	}
	
function exist_agency_name(){
		$id=$this->id;
		if(!empty($id)){
			 $get_table_datas=$this->get_table_datas($id,array());
			 if($get_table_datas->agency_name!=$this->agency_name){
			 	 $find_datas=$this->find(array(
          'select'=>'agency_name',
          'condition'=>'agency_name=:agency_name',
          'params'=>array(':agency_name' => $this->agency_name),
         ));
			 }
		}else{
		  
			$find_datas=$this->find(array(
         'select'=>'agency_name',
         'condition'=>'agency_name=:agency_name',
         'params'=>array(':agency_name' => $this->agency_name),
       ));
		}
     if(!empty($find_datas)){
     	 $this->addError("agency_name","旅行社名称已存在");
     }
	}
	
}