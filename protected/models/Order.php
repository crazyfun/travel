<?php

/**
 * This is the model class for table "{{order}}".
 *
 * The followings are the available columns in table '{{order}}':
 * @property string $id
 * @property string $name
 * @property integer $sex
 * @property string $cell_phone
 * @property string $email
 * @property string $code
 * @property string $qq
 * @property string $msn
 * @property string $company_address
 * @property string $date
 * @property string $numbers
 * @property string $children
 * @property string $line
 * @property string on_car
 * @property string $market_price
 * @property string $child_price
 * @property string $settlement_price
 * @property string $child_settlement_price
 * @property integer $collection
 * @property string $profit
 * @property string $dijieshe
 * @property string $address
 * @property integer $order_type
 * @property string $station_id
 * @property string $comment
 * @property integer $status
 * @property string $create_id
 * @property string $create_time
 */
class Order extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Order the static model class
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
		
		return '{{order}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_type,name,dijieshe','required','message'=>'{attribute}不能为空'),
			array('sex, order_type, status', 'numerical', 'integerOnly'=>true),
			//array('settlement_price','compare','compareAttribute'=>'market_price','operator'=>'<=','message'=>'成人结算价必须小于等于市场价'),
			//array('child_settlement_price','compare','compareAttribute'=>'child_price','operator'=>'<=','message'=>'儿童结算价必须小于等于市场价'),
			array('name, cell_phone, msn', 'length', 'max'=>30),
			array('email','length','max'=>30),
			array('code', 'length', 'max'=>18),
			array('qq', 'length', 'max'=>20),
			array('company_address, line, address', 'length', 'max'=>200),
			array('on_car','length','max'=>100),
			array('collection,date, numbers, children, market_price, child_price, settlement_price, child_settlement_price, profit, dijieshe, station_id, create_id, create_time', 'length', 'max'=>11),
			array('comment', 'safe'),
			//array('email','email','message'=>'{attribute}格式错误'),
			array('collection,numbers,children,market_price,child_price,settlement_price,child_settlement_price,profit','numerical','message'=>'{attribute}必须是数字'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, sex, cell_phone, email, code, qq, msn, company_address, date, numbers, children, line, market_price, child_price,settlement_price, child_settlement_price,profit, dijieshe, address, collection,order_type, station_id, comment, status, create_id, create_time', 'safe', 'on'=>'search'),
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
			'Dijieshe'=>array(self::BELONGS_TO,'Dijieshe','dijieshe'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '联系人',
			'sex' => '性别',
			'cell_phone' => '联系方式',
			'email' => 'Email',
			'code' => '身份证号码',
			'qq' => 'QQ',
			'msn' => 'MSN',
			'address' => '居住地址',
			'company_address' => '公司地址',
			'date' => '出游时间',
			'numbers' => '成人数',
			'children' => '儿童数',
			'line' => '出游线路',
			'on_car'=>'上车地点',
			'market_price' => '成人价格',
			'child_price'=>'儿童价格',
			'settlement_price' => '成人结算价格',
			'child_settlement_price'=>'儿童结算价格',
			'collection'=>'代收款',
			'profit' => '总利润',
			'dijieshe' => '地接社',
			'order_type' => '订单类型',
			'station_id' => '分站',
			'comment' => '备注',
			'status' => '结算状态',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('cell_phone',$this->cell_phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('msn',$this->msn,true);
		$criteria->compare('company_address',$this->company_address,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('numbers',$this->numbers,true);
		$criteria->compare('children',$this->children,true);
		$criteria->compare('line',$this->line,true);
		$criteria->compare('market_price',$this->market_price,true);
		$criteria->compare('child_price',$this->child_price,true);
		$criteria->compare('settlement_price',$this->settlement_price,true);
		$criteria->compare('child_settlement_price',$this->child_settlement_price,true);
		$criteria->compare('profit',$this->profit,true);
		$criteria->compare('dijieshe',$this->dijieshe,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('order_type',$this->order_type);
		$criteria->compare('station_id',$this->station_id,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_id',$this->create_id,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	
				//删除一笔数据
	public function delete_tuandui_table_datas($pk_id="",$condition=array()){
		$table_datas=$this->get_table_datas($pk_id,$condition);
		if(is_array($table_datas)){
		foreach($table_datas as $key => $value){
			$id=$value->id;
			$tuandui_custom=new TuanduiCustom();
			$tuandui_custom->deleteAll('relation_id=:relation_id',array(':relation_id'=>$id));
			$this->deleteByPk($id,"",array());
		}
	 }else{
	 	  $id=$table_datas->id;
	 	  $tuandui_custom=new TuanduiCustom();
			$tuandui_custom->deleteAll('relation_id=:relation_id',array(':relation_id'=>$id));
			$this->deleteByPk($id,"",array());
	 }
	 return true;
		
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
			case 'order_type':
			  $order_type=CV::$order_type;
			  return $order_type[$this->order_type];
			  break;
			case 'total':
			  $total=intval($this->numbers)+intval($this->children)."人";
			  return $total;
			  break;
			case 'status':
				  $status=CV::$settlement_status;
			    return $status[$this->status];
			  break;
			case 'sex':
				$sex=CV::$sex;
			    return $sex[$this->sex];
			  break;
			case 'dijieshe':
			    return $this->Dijieshe->name."(电话:".$this->Dijieshe->tele_phone.",传真:".$this->Dijieshe->fax.")";
			  break;
			case 'create_id':
				return $this->User->real_name;
				break;
			case 'create_time':
				return date('Y-m-d H:i:s',$this->create_time);
				break;
		  case 'total_market':
		    $total_market=($this->market_price*$this->numbers)+($this->child_price*$this->children)."元";
		    return $total_market;
		    break; 
		  case 'total_settlement':
		    $total_settlement=($this->settlement_price*$this->numbers)+($this->child_settlement_price*$this->children)."元";
		    return $total_settlement;
		    break;
		  case 'collection':
		    return $this->collection."元";
		    break;
		  case 'total_profit':
		  
		    return $this->profit."元";
		    break;
			default:
			  return $this->$attribute_name;
			  break;
		}
	}
	
		function get_sanke_operate(){
			$user=new User();
		  $user_permission_name=$user->get_permissions_name();
		  $controller_id=Yii::app()->getController()->getId();
		  $return_str="<div class='operate_button'>";
		  if(Util::is_permission($user_permission_name,"view"))
		  	$return_str.=CHtml::link('查看','javascript:void(0);',array('class'=>'operate_green','onclick'=>"javascript:frame_view('".Yii::app()->getController()->createUrl('view')."','".get_class($this)."','".$this->id."');"));
		  if(Util::is_permission($user_permission_name,"edit"))
		  	$return_str.=CHtml::link('修改',array($controller_id."/edit","id"=>$this->id),array('class'=>'operate_green'));
		  /*
		  if($this->status=='1'){
		  	if(Util::is_permission($user_permission_name,"status"))
		     	$return_str.=CHtml::link('结算',array($controller_id."/status","id"=>$this->id,'status'=>'2'),array('class'=>'operate_green'));
		  }else{
		  	if(Util::is_permission($user_permission_name,"status"))
		  		$return_str.=CHtml::link('未结算',array($controller_id."/status","id"=>$this->id,'status'=>'1'),array('class'=>'operate_green'));
		  }
		  */
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
		  if(Util::is_permission($user_permission_name,"view"))
		  	$return_str.=CHtml::link('查看','javascript:void(0);',array('class'=>'operate_green','onclick'=>"javascript:frame_view('".Yii::app()->getController()->createUrl('view')."','".get_class($this)."','".$this->id."');"));
		  if(Util::is_permission($user_permission_name,"edit"))
		  	$return_str.=CHtml::link('修改',array($controller_id."/edit","id"=>$this->id),array('class'=>'operate_green'));
		  /*
		  if($this->status=='1'){
		  	if(Util::is_permission($user_permission_name,"status"))
		     $return_str.=CHtml::link('结算',array($controller_id."/status","id"=>$this->id,'status'=>'2'),array('class'=>'operate_green'));
		  }else{
		  	if(Util::is_permission($user_permission_name,"status"))
		  	  $return_str.=CHtml::link('未结算',array($controller_id."/status","id"=>$this->id,'status'=>'1'),array('class'=>'operate_green'));
		  }
		  */
		  if(Util::is_permission($user_permission_name,"delete"))
		  	$return_str.=CHtml::link('删除','javascript:void(0);',array('id'=>'delete_'.$this->id,'class'=>'operate_red','onclick'=>"javascript:ajax_delete('".Yii::app()->getController()->createUrl('main/delete')."','".get_class($this)."','".$this->id."');"));
		  $return_str.="</div>";
		  return $return_str;
	  }
	  
	  
	  	function get_financial_operate(){
   		$user=new User();
		  $user_permission_name=$user->get_permissions_name();
		   $controller_id=Yii::app()->getController()->getId();
		  $return_str="<div class='operate_button'>";
		  if(($this->status=='1')||($this->status=='3')){
		  	if(Util::is_permission($user_permission_name,"status"))
		  	  $return_str.=CHtml::link('结算','javascript:void(0);',array('class'=>'operate_green','onclick'=>"javascript:frame_relation('".Yii::app()->getController()->createUrl('status')."','".$this->id."');"));
		  }
		  $return_str.="</div>";
		  return $return_str;
	  }
	  
	  
	  
	function format_create_time(){
		return date("Y-m-d H:i:s",$this->create_time);
	}
	
	function show_custom(){
		$user=new User();
		$user_permission_name=$user->get_permissions_name();
		if(Util::is_permission($user_permission_name,"custom"))
			$return_str.=CHtml::link('查看客户','javascript:void(0);',array('class'=>'operate_green','onclick'=>"javascript:frame_relation('".Yii::app()->getController()->createUrl('custom')."','".$this->id."');"));
		return $return_str;
	}
	
	function show_dijieshe(){
		return $this->Dijieshe->name;
	}
	//计算总利润
	function calculate_total_profit(){
		$numbers=$this->numbers;
		$children=$this->children;
		$market_price=$this->market_price;
		$child_price=$this->child_price;
		$settlement_price=$this->settlement_price;
		$child_settlement_price=$this->child_settlement_price;
		$total=(($market_price-$settlement_price)*$numbers)+(($child_price-$child_settlement_price)*$children);
		return empty($total)?0:$total;
	}
	
	//获得总人数
	function get_total_nums($conditions,$params){
		$total_nums=$this->find(array('select'=>'SUM(t.numbers+t.children) as numbers','condition'=>implode(" AND ",$conditions),'params'=>$params));
		return empty($total_nums->numbers)?0:$total_nums->numbers;
	}
	//获得总销售额
	function get_total_sell($conditions,$params){
	  $total_sell=$this->find(array('select'=>'SUM(t.market_price*t.numbers+t.child_price*t.children) as numbers','condition'=>implode(" AND ",$conditions),'params'=>$params));
		return empty($total_sell->numbers)?0:$total_sell->numbers;
	}
	
	//获得总结算额
	function get_total_settle($conditions,$params){
		$total_settle=$this->find(array('select'=>'SUM(t.settlement_price*t.numbers+t.child_settlement_price*t.children) as numbers','condition'=>implode(" AND ",$conditions),'params'=>$params));
		return empty($total_settle->numbers)?0:$total_settle->numbers;
	}
	
	//获得已结算额
	function get_already_settle($conditions,$params){
	  array_push($conditions,"t.status = :search_status");
	  $params[':search_status']='2';
	  $already_settle_datas=$this->findAll(array('select'=>'id,collection','condition'=>implode(" AND ",$conditions),'params'=>$params));
		$dijieshe_jiesuan=new DijiesheJiesuan();
		$already_settle=0;
		foreach($already_settle_datas as $key => $value){
			$dijieshe_jiesuan_value=$dijieshe_jiesuan->get_settle_by_order($value->id);
			$already_settle+=($dijieshe_jiesuan_value+$value->collection);
		}
		return $already_settle;
	}
	//获得需要结算的款项
  function get_need_settle($order_id=""){
  	$order_id=empty($order_id)?$this->id:$order_id;
  	$order_data=$this->findByPk($order_id);
  	$total_settle=floatval(($order_data->settlement_price*$order_data->numbers)+($order_data->child_settlement_price*$order_data->children));
  	$need_settle=floatval($total_settle-$order_data->collection);
  	$dijieshe_jiesuan=new DijiesheJiesuan();
  	$dijieshe_jiesuan_value=$dijieshe_jiesuan->get_settle_by_order($order_id);
  	$need_settle=$need_settle-$dijieshe_jiesuan_value;
  	return $need_settle;
  }
	//获得未结算额
	function get_no_settle($conditions,$params){
		array_push($conditions,"(t.status = :search_status OR t.status = :search_status1)");
	  $params[':search_status']='1';
	  $params[':search_status1']='3';
	  $no_settle_datas=$this->findAll(array('select'=>'id,collection,SUM(t.settlement_price*t.numbers+t.child_settlement_price*t.children) as numbers','condition'=>implode(" AND ",$conditions),'params'=>$params,'group'=>'t.id'));
		$dijieshe_jiesuan=new DijiesheJiesuan();
		$no_settle=0;
		foreach($no_settle_datas as $key => $value){
			$dijieshe_jiesuan_value=$dijieshe_jiesuan->get_settle_by_order($value->id);
			$no_settle+=$value->numbers-($dijieshe_jiesuan_value+$value->collection);
		}
		return $no_settle;
	}
	
	//获得总利润
	function get_total_profit($conditions,$params){
		
		$total_profit=$this->find(array('select'=>'SUM(t.profit) as numbers','condition'=>implode(" AND ",$conditions),'params'=>$params));
		return empty($total_profit->numbers)?0:$total_profit->numbers;
	}
	
	function get_sanke_order($station_id,$count=10){
		$sanke_datas=$this->with("User","Dijieshe")->findAll(array('select'=>'*','condition'=>'t.station_id=:station_id AND t.order_type=:order_type','params'=>array(':station_id'=>$station_id,':order_type'=>'1'),'order'=>'t.create_time DESC','limit'=>$count));
		return $sanke_datas;
	}
	
	function get_tuandui_order($station_id,$count=10){
		$tuandui_datas=$this->with("User","Dijieshe")->findAll(array('select'=>'*','condition'=>'t.station_id=:station_id AND t.order_type=:order_type','params'=>array(':station_id'=>$station_id,':order_type'=>'2'),'order'=>'t.create_time DESC','limit'=>$count));
		return $tuandui_datas;
	}
}