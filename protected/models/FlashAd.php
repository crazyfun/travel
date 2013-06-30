<?php

/**
 * This is the model class for table "{{flash_ad}}".
 *
 * The followings are the available columns in table '{{flash_ad}}':
 * @property string $id
 * @property string $region_id
 * @property string $flash_img
 * @property string $describe
 * @property integer $sort
 */
class FlashAd extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FlashAd the static model class
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
		return '{{flash_ad}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('region_id, flash_img,img_href,sort', 'required','message'=>'{attribute}不能为空'),
			array('sort', 'required'),
			array('sort', 'numerical', 'integerOnly'=>true),
			array('region_id,flash_img,img_href', 'length', 'max'=>100),
			array('describe', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, region_id, flash_img, img_href,describe, sort', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'region_id' => '区域名称',
			'flash_img' => '图片',
			'img_href'=>'图片连接',
			'describe' => '描述',
			'sort' => '排序',
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
		$criteria->compare('region_id',$this->region_id,true);
		$criteria->compare('flash_img',$this->flash_img,true);
		$criteria->compare('img_href',$this->img_href,true);
		$criteria->compare('describe',$this->describe,true);
		$criteria->compare('sort',$this->sort);
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
	public function beforeSave(){
	  if(parent::beforeSave()){
			if($this->isNewRecord){
			
			}else{
			
			}
			return true;
		}else{
			return false;
		}
	}
	
	function show_attribute($attribute_id){
	 switch($attribute_id){
	 	case 'region_id':
	 		$region_id=$this->region_id;
	 	  $region=Region::model();
	 	  $region_datas=$region->findAll('region_id IN ('.$region_id.')');
	 	  $region_name="";
	 	  foreach($region_datas as $key => $value){
	 	  	if(empty($region_name)){
	 	  		$region_name.=$value->region_name;
	 	  	}else{
	 	  		$region_name.=",".$value->region_name;
	 	  	}
	 	  }
	 		return $region_name;
	 		break;
	    case 'flash_img':
	    	return CHtml::image("/".$this->flash_img,$this->describe,array());
	    	break;
		default:
		  return $this->$attribute_id;
			break;
	 }
	}
	
	
	function get_operate(){
		  $user=new User();
		  $user_permission_name=$user->get_permissions_name();
		  $controller_id=Yii::app()->getController()->getId();
		  $return_str="<div class='operate_button'>";
		  if(Util::is_permission($user_permission_name,"edit"))
		     $return_str.=CHtml::link('修改',array($controller_id."/edit","id"=>$this->id),array('class'=>'operate_green'));
		  if(Util::is_permission($user_permission_name,"delete"))
		     $return_str.=CHtml::link('删除','javascript:void(0);',array('id'=>'delete_'.$this->id,'class'=>'operate_red','onclick'=>"javascript:ajax_delete('".Yii::app()->getController()->createUrl('main/delete')."','".get_class($this)."','".$this->id."');"));
		   $return_str.="</div>";
		  return $return_str;
	}
	
	function get_ad_content($region_id=""){
		if(empty($region_id)){
			$ip_convert=IpConvert::get();
		  $region_session=$ip_convert->init_region();  	 		 	    
			$region_id=$region_session['id'];
		}
	  $advertising_datas=$this->findAll(array('condition'=>"FIND_IN_SET('".$region_id."',region_id)>0",'params'=>array(),'order'=>'sort ASC'));
		return $advertising_datas;
	}
}