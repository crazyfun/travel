<?php

/**
 * This is the model class for table "{{invoice}}".
 *
 * The followings are the available columns in table '{{invoice}}':
 * @property string $id
 * @property string $invoice_numbers
 * @property string $order_numbers
 * @property string $content
 * @property string $price
 * @property integer $status
 * @property string $comment
 * @property string $shenhe_id
 * @property string $shenhe_time
 * @property string $station_id
 * @property string $create_id
 * @property string $create_time
 */
class Invoice extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Invoice the static model class
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
		return '{{invoice}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('invoice_numbers,order_numbers,price','required','message'=>'{attribute}不能为空'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('invoice_numbers, order_numbers', 'length', 'max'=>100),
			array('price, shenhe_id, shenhe_time, station_id, create_id, create_time', 'length', 'max'=>11),
			array('price','numerical','message'=>'{attribute}必须是数字'),
			array('content, comment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, invoice_numbers, order_numbers, content, price, status, comment, shenhe_id, shenhe_time, station_id, create_id, create_time', 'safe', 'on'=>'search'),
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
		  'Station'=>array(self::BELONGS_TO, 'Station', 'station_id'),
		  'ShenheUser'=>array(self::BELONGS_TO, 'User', 'shenhe_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'invoice_numbers' => '发票抬头',
			'order_numbers' => '合同编号',
			'content' => '描述内容',
			'price' => '发票金额',
			'status' => '审核状态',
			'comment' => '备注',
			'shenhe_id' => '开票人',
			'shenhe_time' => '开票时间',
			'station_id' => '分站',
			'create_id' => '申请人',
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
		$criteria->compare('invoice_numbers',$this->invoice_numbers,true);
		$criteria->compare('order_numbers',$this->order_numbers,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('shenhe_id',$this->shenhe_id,true);
		$criteria->compare('shenhe_time',$this->shenhe_time,true);
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
	function get_my_operate(){
	     $user=new User();
		  $user_permission_name=$user->get_permissions_name();
		  $controller_id=Yii::app()->getController()->getId();
		  $return_str="<div class='operate_button'>";
		  if(Util::is_permission($user_permission_name,"myview"))
		  	$return_str.=CHtml::link('查看','javascript:void(0);',array('class'=>'operate_green','onclick'=>"javascript:frame_view('".Yii::app()->getController()->createUrl('myview')."','".get_class($this)."','".$this->id."');"));
		  if(Util::is_permission($user_permission_name,"edit"))
		  	$return_str.=CHtml::link('修改',array($controller_id."/edit","id"=>$this->id),array('class'=>'operate_green'));
		  if(Util::is_permission($user_permission_name,"delete")) 	
		   	$return_str.=CHtml::link('删除','javascript:void(0);',array('id'=>'delete_'.$this->id,'class'=>'operate_red','onclick'=>"javascript:ajax_delete('".Yii::app()->getController()->createUrl('main/delete')."','".get_class($this)."','".$this->id."');"));
		  $return_str.="</div>";
		  return $return_str;	
		
	}
	function get_operate(){
		  $user=new User();
		  $user_permission_name=$user->get_permissions_name();
		  $controller_id=Yii::app()->getController()->getId();
		  $return_str="<div class='operate_button'>";
		  if(Util::is_permission($user_permission_name,"status")){
		   if($this->status=='1')
		  	 $return_str.=CHtml::link('审核',array($controller_id."/status","id"=>$this->id),array('class'=>'operate_green'));
		  }
		  if(Util::is_permission($user_permission_name,"view"))
		  	$return_str.=CHtml::link('查看','javascript:void(0);',array('class'=>'operate_green','onclick'=>"javascript:frame_view('".Yii::app()->getController()->createUrl('view')."','".get_class($this)."','".$this->id."');"));
		 
		  $return_str.="</div>";
		  return $return_str;
	}
	
	
	function show_attribute($attribute_name){
		switch($attribute_name){
			case 'status':
				$invoice_status=CV::$invoice_status;
			    return $invoice_status[$this->status];
				break;
		    case 'shenhe_id':
		    	return $this->ShenheUser->real_name;
		    	break;
		    case 'shenhe_time':
		        return date('Y-m-d H:i:s',$this->shenhe_time);
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
	
	function get_total($conditions,$params){
	   $total_price=$this->find(array('select'=>'SUM(t.price) as price','condition'=>implode(" AND ",$conditions),'params'=>$params));
		return empty($total_price->price)?0:$total_price->price;
	}
	
	function get_no($conditions,$params){
		array_push($conditions,"t.status = :search_status");
	  $params[':search_status']='1';
		$no_price=$this->find(array('select'=>'SUM(t.price) as price','condition'=>implode(" AND ",$conditions),'params'=>$params));
		return empty($no_price->price)?0:$no_price->price;
	}
	
	function get_already($conditions,$params){
		array_push($conditions,"t.status = :search_status");
	  $params[':search_status']='2';
		$already_price=$this->find(array('select'=>'SUM(t.price) as price','condition'=>implode(" AND ",$conditions),'params'=>$params));
		return empty($already_price->price)?0:$already_price->price;
	}
	
	
}