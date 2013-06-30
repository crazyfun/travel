<?php
class ReturnurlAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="index";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'在线充值');
        $this->controller->set_seo('在线充值','','');
        return true;
    }
   protected function do_action(){
   	  $pay_code=$_GET['code'];
   	  $pay_code_obj=ucfirst($pay_code);
      $pay_obj    = new $pay_code_obj();
      $result=$pay_obj->respond();
      if($result){
      	$this->controller->f(CV::PAYSUCCESS);
      }else{
      	$this->controller->f(CV::PAYFAILED);
      }
      switch($pay_code){
      	case 'alipay':
      	  $price=$_GET['total_fee'];
      	  break;
      	case 'kuaiqian':
      	  $price=$_REQUEST['payAmount'];
      	  break;
      	default:
      	  break;
      }
   	  $this->display("pay3",array('price'=>$price,'pay_code'=>$pay_code));
		
  }

}
?>