<?php

/**
 * This is the model class for table "{{agency_date}}".
 *
 * The followings are the available columns in table '{{agency_date}}':
 * @property string $id
 * @property string $user_id
 * @property string $start_date
 * @property string $end_date
 * @property string $line
 * @property string $numbers
 * @property string $address
 * @property string $date
 * @property string $attractions
 * @property string $cost
 * @property string $subsidies
 * @property string $create_time
 * @property string $operate_time
 */
class AgencyDate extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AgencyDate the static model class
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
		return '{{agency_date}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('start_date,end_date,user_id,line,address,date,numbers,cost,attractions,subsidies','required','message'=>'{attribute}不能为空'),
			array('ordin_nums,user_id, numbers, cost, create_time, operate_time', 'length', 'max'=>11),
			array('start_date, end_date, date', 'length', 'max'=>30),
			array('line, address, attractions', 'length', 'max'=>100),
			array('subsidies', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, start_date, end_date, line, numbers, address, date, attractions, cost, subsidies,ordin_nums, create_time, operate_time', 'safe', 'on'=>'search'),
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
			//'TravelAgency'=>array(self::STAT, 'TravelAgency', 'tr_travel_agency_tr_agency_date(user_id,user_id)'),
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
			'start_date' => '开始时间',
			'end_date' => '结束时间',
			'line' => '线路名称',
			'numbers' => '带团人数',
			'address' => '出发地址',
			'date' => '出发时间',
			'attractions' => '线路景区',
			'cost' => '带团费用',
			'subsidies' => '其他费用',
			'ordin_nums'=>'预订数',
			'create_time' => '创建时间',
			'operate_time' => '修改时间',
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
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('line',$this->line,true);
		$criteria->compare('numbers',$this->numbers,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('attractions',$this->attractions,true);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('subsidies',$this->subsidies,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('operate_time',$this->operate_time,true);

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
			
				$this->operate_time=Util::current_time('timestamp');
			}
			return true;
		}else{
			return false;
		}
	}
	function show_attribute($attribute_name){
		switch($attribute_name){
		  case 'user_id':
		    $this->User->user_login;
		    break;
		  case 'numbers':
		    return $this->numbers."人";
		    break;
		  case 'cost':
		    return $this->cost."元/天";
		    break;
		  case 'top':
		    $agency_date_top=CV::$agency_date_top;
		    $top=$this->top;
		    if($top=='1'){
		    	echo CHtml::link("置顶","javascript:set_top();function set_top(){self.parent.location.href='".Yii::app()->getController()->createUrl("user/tops",array('type'=>'4','relation_id'=>$this->id))."';}",array('class'=>'sure_bt_link'));
		    }else{
		    	echo "<span class='green_text'>".$agency_date_top[$top]."</span>";
		    }
		    break;
		  case 'operate_time':
		    return date('Y-m-d',$this->operate_time);
		    break;
			case 'create_time':
				return date('Y-m-d',$this->create_time);
				break;	
			default:
			  return $this->$attribute_name;
			  break;
		}
	}
	
	
	function get_agency_calendar($start_date,$end_date,$agency_user_id=""){
		$user_id=empty($agency_user_id)?Yii::app()->user->id:$agency_user_id;
		$datas=$this->with("User")->findAll(array(
		  'select'=>'id,user_id,line,start_date,end_date',
		  'condition'=>'t.start_date>=:start_date AND t.end_date<=:end_date AND t.user_id=:user_id',
		  'params'=>array(':start_date'=>$start_date,':end_date'=>$end_date,':user_id'=>$user_id),
		));
		$ajax_array=array();
		
		foreach($datas as $key => $value){
			$count_number=$value->count_ordain();
			$tem_array=array();
			$tem_array['id']=$value->id;
			$tem_array['user_id']=$value->user_id;
			if($count_number)
		    	$tem_array['line']=$value->line."<span class='text_079270'>(".$count_number.")</span>";
		  else
		    	$tem_array['line']=$value->line;
			$tem_array['start_date']=$value->start_date;
			$tem_array['end_date']=$value->end_date;
			if($count_number){
			  $tem_array['status']='2';
			}else{
			  $tem_array['status']='1';
			}
			$ajax_array[]=$tem_array;
		}
		return $ajax_array;
	}
	function get_admin_agency_calendar($start_date,$end_date,$agency_user_id=""){
		$user_id=empty($agency_user_id)?Yii::app()->user->id:$agency_user_id;
		$datas=$this->with("User")->findAll(array(
		  'select'=>'id,user_id,line,start_date,end_date',
		  'condition'=>'t.start_date>=:start_date AND t.end_date<=:end_date AND t.user_id=:user_id',
		  'params'=>array(':start_date'=>$start_date,':end_date'=>$end_date,':user_id'=>$user_id),
		));
		$ajax_array=array();
		
		foreach($datas as $key => $value){
			$count_number=$value->count_ordain();
			$tem_array=array();
			$tem_array['id']=$value->id;
			$tem_array['user_id']=$value->user_id;
			if($count_number)
		    	$tem_array['line']=$value->line."<span class='text_079270'>(".$count_number.")</span>";
		  else
		    	$tem_array['line']=$value->line;
			$tem_array['start_date']=$value->start_date;
			$tem_array['end_date']=$value->end_date;
			if($count_number){
			  $tem_array['status']='2';
			}else{
			  $tem_array['status']='1';
			}
			$ajax_array[]=$tem_array;
		}
		return $ajax_array;
	}
	
	
	
	function count_ordain($id=""){
	   $id=empty($id)?$this->id:$id;
	   $gordain=Gordain::model();
	   $count_number=$gordain->count("date_id=:date_id",array(':date_id'=>$id));
	   return $count_number;
	   	
	}
	
		function get_ordain_operate($guide_id){
		   $return_str.=CHtml::link('选择',array("/guide/guide/doordain","id"=>$this->id,'guide_id'=>$guide_id),array('class'=>'sure_bt_link'));
		    return $return_str;
	}
	
	
	function get_newest_line($region_id="",$nums=5){
		if(empty($region_id)){
			$ip_convert=IpConvert::get();
		  $region_session=$ip_convert->init_region();  	 		 	    
			$region_id=$region_session['id'];
		}
		$current_date=date("Y-m-d");
		$agency_date_datas=$this->with(array('User'=>array('with'=>array('TravelAgency'))))->findAll(array('select'=>'t.id,t.line,t.create_time,t.user_id ','condition'=>'t.end_date >= :current_date AND TravelAgency.status=:status AND TravelAgency.agency_region  '.Util::search_in_region($region_id),'params'=>array(':status'=>'2',':current_date'=>$current_date),'limit'=>$nums,'order'=>'t.create_time DESC','together'=>true));
		return $agency_date_datas;
	}
	
	function get_hot_line($region_id="",$nums=5){
		if(empty($region_id)){
			$ip_convert=IpConvert::get();
		  $region_session=$ip_convert->init_region();  	 		 	    
			$region_id=$region_session['id'];
		}
		$current_date=date("Y-m-d");
		$agency_date_datas=$this->with(array('User'=>array('with'=>array('TravelAgency'))))->findAll(array('select'=>'t.id,t.line,t.create_time,t.user_id','condition'=>'t.end_date >= :current_date AND TravelAgency.status=:status AND TravelAgency.agency_region '.Util::search_in_region($region_id),'params'=>array(':status'=>'2',':current_date'=>$current_date),'limit'=>$nums,'order'=>'t.ordin_nums DESC','together'=>true));
		return $agency_date_datas;
		
	}
	
}