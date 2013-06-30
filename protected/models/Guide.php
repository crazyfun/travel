<?php

/**
 * This is the model class for table "{{guide}}".
 *
 * The followings are the available columns in table '{{guide}}':
 * @property string $id
 * @property string $user_id
 * @property string $guide_avater
 * @property string $guide_pass
 * @property string $guide_shenhe_pass
 * @property string $guide_number
 * @property string $guide_qualifications
 * @property string $guide_cade
 * @property integer $guide_level
 * @property integer $guide_educational
 * @property string $guide_language
 * @property string $guide_language2
 * @property string $guide_region
 * @property string $guide_region_name
 * @property string $guide_nation
 * @property string $guide_date
 * @property string $guide_score
 * @property string $guide_contact_phone
 * @property string $guide_year
 * @property string $guide_qq
 * @property string $guide_familiar
 * @property string $describe
 * @property string $views
 * @property integer $recommend
 * @property integer $top
 * @property integer $status
 * @property string $create_time
 */
class Guide extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Guide the static model class
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
		return '{{guide}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('guide_price,guide_number,guide_region,guide_year,guide_contact_phone','required','message'=>'{attribute}不能为空'),
		  array('guide_region','validate_region'),
		  array('guide_number','exist_guide_number'),
			array('guide_level, guide_educational, recommend, top, status', 'numerical', 'integerOnly'=>true),
			array('user_id, guide_region, guide_score, views', 'length', 'max'=>11),
			array('guide_region_name,guide_avater,guide_pass,guide_shenhe_pass,guide_familiar', 'length', 'max'=>100),
			array('guide_number, guide_qualifications, guide_cade, guide_language,guide_language2, guide_nation, guide_date, guide_contact_phone, guide_qq', 'length', 'max'=>30),
			array('guide_year', 'length', 'max'=>2),
			array('create_time', 'length', 'max'=>10),
			array('describe','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, guide_avater, guide_pass,guide_shenhe_pass,guide_number, guide_qualifications, guide_cade, guide_level, guide_educational, guide_language, guide_language2, guide_region,guide_region_name, guide_nation, guide_date, guide_score, guide_contact_phone, guide_year, guide_qq, guide_familiar, views, recommend, top, status, create_time,describe', 'safe', 'on'=>'search'),
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
			'guide_avater' => '导游头像',
			'guide_pass' => '导游证',
			'guide_shenhe_pass'=>'审核图片',
			'guide_number' => '导游证号',
			'guide_qualifications' => '资格证号',
			'guide_cade' => '导游卡号',
			'guide_level' => '导游等级',
			'guide_educational' => '导游学历',
			'guide_language' => '第一语言',
			'guide_language2' => '第二语言',
			'guide_region' => '所在区域',
			'guide_region_name' => '区域名称',
			'guide_nation' => '民族',
			'guide_date' => '发证日期',
			'guide_score' => '分值',
			'guide_contact_phone' => '联系电话',
			'guide_year' => '带团年限',
			'guide_qq' => 'QQ',
			'guide_familiar' => '熟悉地',
			'describe'=>'描述',
			'views' => '查看数',
			'recommend' => '推荐',
			'top' => '置顶',
			'status' => '审核状态',
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
		$criteria->compare('guide_avater',$this->guide_avater,true);
		$criteria->compare('guide_pass',$this->guide_pass,true);
		$criteria->compare('guide_shenhe_pass',$this->guide_shenhe_pass,true);
		$criteria->compare('guide_number',$this->guide_number,true);
		$criteria->compare('guide_qualifications',$this->guide_qualifications,true);
		$criteria->compare('guide_cade',$this->guide_cade,true);
		$criteria->compare('guide_level',$this->guide_level);
		$criteria->compare('guide_educational',$this->guide_educational);
		$criteria->compare('guide_language',$this->guide_language,true);
		$criteria->compare('guide_language2',$this->guide_language2,true);
		$criteria->compare('guide_region',$this->guide_region,true);
		$criteria->compare('guide_nation',$this->guide_nation,true);
		$criteria->compare('guide_date',$this->guide_date,true);
		$criteria->compare('guide_score',$this->guide_score,true);
		$criteria->compare('guide_contact_phone',$this->guide_contact_phone,true);
		$criteria->compare('guide_year',$this->guide_year,true);
		$criteria->compare('guide_qq',$this->guide_qq,true);
		$criteria->compare('guide_familiar',$this->guide_familiar,true);
		$criteria->compare('describe',$this->describe,true);
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
   function show_attribute($attribute_id){
	 switch($attribute_id){
		case 'user_id':
			return $this->User->user_login;
			break;
		case 'guide_level':
			$guide_level=CV::$guide_level;
		    return $guide_level[$this->guide_level];
		    break;
		case 'guide_educational':
			$guide_educational=CV::$guide_educational;
			return $guide_educational[$this->guide_educational];
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
	
	function validate_region(){
		$guide_region=$this->guide_region;
		$region=Region::model();
		$level=$region->get_region_level($guide_region);
		if($level>2){
			return true;
		}else{
			$this->addError('guide_region',"请选择市级城市");
		}
	}
	function get_guide_status($user_id=""){
		$user_id=empty($user_id)?$this->user_id:$user_id;
		$guide_data=$this->find("user_id=:user_id",array(':user_id'=>$user_id));
		return $guide_data->status;
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
	
	function get_newest_guide($region_id="",$nums=5){
		if(empty($region_id)){
			$ip_convert=IpConvert::get();
		  $region_session=$ip_convert->init_region();  	 		 	    
			$region_id=$region_session['id'];
		}
		$guide_datas=$this->with("User")->findAll(array('select'=>'t.id,t.guide_avater,t.guide_year','condition'=>'t.status=:status AND t.guide_region '.Util::search_in_region($region_id),'params'=>array(':status'=>'2'),'limit'=>$nums,'order'=>'t.create_time DESC'));
		return $guide_datas;
	}
	
	
	function get_hot_guide($region_id="",$nums=5){
		if(empty($region_id)){
			$ip_convert=IpConvert::get();
		  $region_session=$ip_convert->init_region();  	 		 	    
			$region_id=$region_session['id'];
		}
		$guide_datas=$this->with("User")->findAll(array('select'=>'t.id,t.guide_avater,t.guide_year','condition'=>'t.status=:status AND t.guide_region '.Util::search_in_region($region_id),'params'=>array(':status'=>'2'),'limit'=>$nums,'order'=>'t.views DESC'));
		return $guide_datas;
	}
	
	
	function get_recommend_guide($region_id="",$nums=5){
		if(empty($region_id)){
			$ip_convert=IpConvert::get();
		  $region_session=$ip_convert->init_region();  	 		 	    
			$region_id=$region_session['id'];
		}
		$guide_datas=$this->with("User")->findAll(array('select'=>'t.id,t.guide_avater,t.guide_year','condition'=>'t.status=:status AND t.guide_region '.Util::search_in_region($region_id).' AND t.recommend=:recommend','params'=>array(':status'=>'2',':recommend'=>'2'),'limit'=>$nums,'order'=>'t.create_time DESC'));
		return $guide_datas;
	}
	
	
	function exist_guide_number(){
		$id=$this->id;
		if(!empty($id)){
			 $get_table_datas=$this->get_table_datas($id,array());
			 if($get_table_datas->guide_number!=$this->guide_number){
			 	 $find_datas=$this->find(array(
          'select'=>'guide_number',
          'condition'=>'guide_number=:guide_number',
          'params'=>array(':guide_number' => $this->guide_number),
         ));
			 }
		}else{
		  
			$find_datas=$this->find(array(
         'select'=>'guide_number',
         'condition'=>'guide_number=:guide_number',
         'params'=>array(':guide_number' => $this->guide_number),
       ));
		}
     if(!empty($find_datas)){
     	 $this->addError("guide_number","导游证号已存在");
     }
	}
	
}