<?php

/**
 * This is the model class for table "{{advertising}}".
 *
 * The followings are the available columns in table '{{advertising}}':
 * @property string $id
 * @property string $region_id
 * @property string $type_id
 * @property string $title
 * @property string $content
 */
class Advertising extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Advertising the static model class
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
		return '{{advertising}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content', 'required','message'=>'{attribute}不能为空'),
			array('type_id', 'length', 'max'=>11),
			array('title,region_id', 'length', 'max'=>100),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, region_id, type_id, title, content', 'safe', 'on'=>'search'),
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
			'region_id' => '区域',
			'type_id' => '广告位',
			'title' => '标题',
			'content' => '内容',
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
		$criteria->compare('type_id',$this->type_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
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
		case 'type_id':
		  $ad_position=Util::com_ad_position();
			return $ad_position[$this->type_id];
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
	
	
}