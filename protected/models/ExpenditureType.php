<?php

/**
 * This is the model class for table "{{expenditure_type}}".
 *
 * The followings are the available columns in table '{{expenditure_type}}':
 * @property string $id
 * @property string $name
 * @property string $station_id
 * @property string $create_id
 * @property string $create_time
 */
class ExpenditureType extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ExpenditureType the static model class
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
		return '{{expenditure_type}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name','required','message'=>'{attribute}不能为空'),
			array('name','exist_name'),
			array('name', 'length', 'max'=>30),
			array('station_id, create_id, create_time', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, station_id, create_id, create_time', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'station_id' => 'Station',
			'create_id' => 'Create',
			'create_time' => 'Create Time',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('station_id',$this->station_id,true);
		$criteria->compare('create_id',$this->create_id,true);
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
	
	
  	function exist_name(){
		$id=$this->id;
		$station_data=Yii::app()->getController()->station_data;
		$station_id=$station_data['id'];
		if(!empty($id)){
			 $get_table_datas=$this->get_table_datas($id,array());
			 if($get_table_datas->name!=$this->name){
			 	 $find_datas=$this->find(array(
          'select'=>'name',
          'condition'=>'name=:name AND station_id=:station_id',
          'params'=>array(':name' => $this->name,':station_id'=>$station_id),
         ));
			 }
		}else{
			$find_datas=$this->find(array(
         'select'=>'name',
         'condition'=>'name=:name AND station_id=:station_id',
         'params'=>array(':name' => $this->name,':station_id'=>$station_id),
       ));
		}
     if(!empty($find_datas)){
     	 $this->addError("name","分类已存在");
     }
	}
	
	function get_expendituretype_select(){
	  	$station_data=Yii::app()->getController()->station_data;
    	$station_id=$station_data['id'];
	    $expendituretype_datas=$this->findAll("station_id=:station_id",array(':station_id'=>$station_id));
	    $return_arr=array();
	    foreach($expendituretype_datas as $key => $value){
	    	$return_arr[$value->id]=$value->name;
	    }
	    return $return_arr;
	}
}