<?php
class CV {
	//qa unlogin
	const SUCCESS_ADMIN_OPERATE=1;
	const FAILED_ADMIN_OPERATE=2;
	const ERROR_ADMIN_DATABASE=3;
	const SUCCESS=1;
	const FAIL=2;
	const TIP=3;
	const PAYVALIDATE=4;
	const PAYSUCCESS=5;
	const PAYFAILED=6;
	public static $ad_position=array(
	     '1'=>array('name'=>'首页头部','width'=>'600','height'=>'55'),
	     '2'=> array('name'=>'首页热门导游下面','width'=>'715','height'=>'90'),
	     '3'=> array('name'=>'首页热门旅行社下面','width'=>'715','height'=>'90'),
	     '4'=> array('name'=>'首页热门酒店下面','width'=>'715','height'=>'90'),
	     '5'=> array('name'=>'搜索最新导游下面','width'=>'255','height'=>'65'),
	     '6'=> array('name'=>'搜索最新旅行社下面','width'=>'255','height'=>'65'),
	     '7'=> array('name'=>'搜索最新 酒店下面','width'=>'255','height'=>'65'),
	     '8'=> array('name'=>'导游详情最新导游下面','width'=>'255','height'=>'65'),
	     '9'=> array('name'=>'旅行社详情最新旅行社下面','width'=>'255','height'=>'65'),
	     '10'=> array('name'=>'酒店详情最新酒店下面','width'=>'255','height'=>'65'),
	     '11'=> array('name'=>'资讯最新资讯下面','width'=>'255','height'=>'65'),
	);
	public static $template_type=array('1'=>'邮件模板','2'=>'消费模板','3'=>'短信模板');
	public static $consume_type=array('1'=>'增加','2'=>'减少');
	public static $model_type=array('help'=>'1','guideinfo'=>'2');
	public static $input_type=array('text'=>'text','number'=>'number','hidden'=>'hidden','password'=>'password','file'=>'file','image'=>'image','textarea'=>'textarea','select'=>'select','multi'=>'multi','check'=>'check','checkbox'=>'checkbox','radio'=>'radio','date'=>'date','multitext'=>'multitext','auto'=>'auto');
	public static $charaters=array('1'=>'A','2'=>'B','3'=>'C','4'=>'D','5'=>'E','6'=>'F','7'=>'G','8'=>'H','9'=>'I','10'=>'J','11'=>'K','12'=>'L','13'=>'M','14'=>'N','15'=>'O','16'=>'P','17'=>'Q','18'=>'R','19'=>'S','20'=>'T','21'=>'U','22'=>'V','23'=>'W','24'=>'X','25'=>'Y','26'=>'Z');
	public static $admin_status=array('1'=>'不是','2'=>'是');
	public static $station_status=array('1'=>'开通','2'=>'不开通');
	public static $operate=array('1'=>'未处理','2'=>'已处理');
	public static $cell_arr=array('1'=>'A','2'=>'B','3'=>'C','4'=>'D','5'=>'E','6'=>'F','7'=>'G','8'=>'H','9'=>'I','10'=>'J','11'=>'K','12'=>'L','13'=>'M','14'=>'N','15'=>'O','16'=>'P','17'=>'Q','18'=>'R','19'=>'S','20'=>'T','21'=>'U','22'=>'V','23'=>'W','24'=>'X','25'=>'Y','26'=>'Z');
	public static $settlement_status=array('1'=>'未结算','2'=>'已结算');
	public static $sex=array('1'=>'男','2'=>'女');
  public static $cicerone_level=array('1'=>'初级','2'=>'中级','3'=>'高级');
  public static $environment=array('1'=>'好','2'=>'中','3'=>'差');
  public static $service=array('1'=>'好','2'=>'中','3'=>'差');
  public static $order_type=array('1'=>'散客订单','2'=>'团队订单');
  public static $message_level=array('1'=>'加急','2'=>'急','3'=>'一般','4'=>'不急');
  public static $hotel_level=array('1'=>'五星级','2'=>'四星级','3'=>'三星级','4'=>'二星级','5'=>'一星级');
  public static $dijieshe_type=array('1'=>'地接社','2'=>'组团社');
  public static $store_top=array('1'=>'不是','2'=>'是');
  public static $store_vip=array('1'=>'不是','2'=>'是');
  public static $store_status=array('1'=>'未认证','2'=>'已认证');
  public static $user_type=array('1'=>'普通用户','2'=>'导游','3'=>'旅行社','4'=>'酒店');
  public static $guide_level=array('1'=>'初级','2'=>'中级','3'=>'高级');
  public static $guide_educational=array('1'=>'博士','2'=>'硕士','3'=>'研究生','4'=>'本科','5'=>'大专','6'=>'高中','9'=>'其他');
  public static $status=array('1'=>'未审核','2'=>'已审核');
  public static $recommend=array('1'=>'未推荐','2'=>'已推荐');
  public static $orderin_status=array('1'=>'未处理','2'=>'导游确认成功','3'=>'预定成功','4'=>'导游已取消','5'=>'旅行社已取消');
  public static $guidedate_status=array('1'=>'空闲','2'=>'不空闲');
  public static $region_status=array('1'=>'未开通','2'=>'已开通');
  public static $restaurant_level=array('5'=>'五星级','4'=>'四星级','3'=>'三星级','2'=>'二星级','1'=>'一星级');
  public static $express_status=array('1'=>'已发货','2'=>'已收货');
  public static $jiesuan_type=array('1'=>'散客订单','2'=>'团队订单');
  public static $advances_status=array('1'=>'未归还','2'=>'已归还');
  public static $invoice_status=array('1'=>'未审核','2'=>'已审核');
  public static $alipay_pay_method=array('0'=>'使用标准双接口','1'=>'使用担保交易接口','2'=>'使用即时到帐接口');
  public static $payment_type=array('alipay'=>array('name'=>'支付宝','image'=>'/bank_zfb3.gif'),'kuaiqian'=>array('name'=>'快钱','image'=>'bank_kq.gif'),'kuaiqian_abc'=>array('name'=>'中国农业银行','image'=>'bank_nyyh3.gif'),'kuaiqian_bcom'=>array('name'=>'交通银行','image'=>'bank_jtyh3.gif'),'kuaiqian_boc'=>array('name'=>'中国银行','image'=>'bank_zgyh3.gif'),'kuaiqian_ccb'=>array('name'=>'中国建设银行','image'=>'bank_jsyh3.gif'),'kuaiqian_cmb'=>array('name'=>'招商银行','image'=>'bank_zsyh3.gif'),'kuaiqian_cmbc'=>array('name'=>'中国民生银行','image'=>'bank_msyh3.gif'),'kuaiqian_icbc'=>array('name'=>'中国工商银行','image'=>'bank_gsyh3.gif'),'kuaiqian_sdb'=>array('name'=>'深圳发展银行','image'=>'bank_szfz3.gif'));
  public static $pay_status=array('1'=>'未支付','2'=>'已支付');
  public static $tops_type=array('1'=>'导游信息','2'=>'旅行社信息','3'=>'酒店信息','4'=>'带团线路');
  public static $config_value_type=array('1'=>'置顶时间');
  public static $top_days=array('1'=>'1','3'=>'3','10'=>'10','20'=>'20','30'=>'30');
  public static $top_status=array('1'=>'未发布','2'=>'已发布');
  public static $top_open=array('1'=>'未结束','2'=>'已结束');
  public static $store_pay=array('1'=>'未付款','2'=>'已付款');
  public static $agency_date_top=array('1'=>'未置顶','2'=>'已置顶');
}
?>
