<?php
class ApplyvipstoreAction extends BaseAction{
	protected function beforeAction(){
         $this->controller->init_user_page();
        $this->controller->tag="";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'申请VIP商家');
        $this->controller->set_seo('申请VIP商家','','');
        return true;
    }
   protected function do_action(){
   $user_id=Yii::app()->user->id;
   	  		$action=$_REQUEST['action'];
   	  		switch($action){
   	  			case 'pay':
   	  			 	$model=User::model();
   	  				$model=empty($user_id)?$model:$model->findByPk($user_id);
   	  				$store_id=$_REQUEST['id'];
   	  				$store=Station::model();
   	  			  $store_data=$store->findByPk($store_id);
   	  			  $is_vip=$store_data->is_vip;
   	  			  $pay_status=$store_data->pay_status;
   	  			  $coupon=$model->conpon;
   	  			  $sys_config=SysConfig::model();
   	  			  $sys_config_datas=$sys_config->get_all_syscfg();
   	  			  $sfc_nomal_store=$sys_config_datas['sfc_nomal_store'];
   	  			  $sfc_vip_store=$sys_config_datas['sfc_vip_store'];
              if($is_vip=='2'){
              	$this->controller->redirect($this->controller->createUrl("error/error404"));
              }else{
              	$total_price=$sfc_vip_store-$sfc_nomal_store;
              }
   	  				$is_top=false;
   	  				if($coupon>=$total_price){
   	  						$coupon_resume=new CouponResume();
   	  						$coupon_resume->consume($user_id,'2',$total_price,"申请Vip商家:".$store_data->name);
   	  						$store->updateByPk($store_id,array('is_vip'=>'2'));
   	  						$this->controller->redirect($this->controller->createUrl("user/mystore"),array());
   	  				  
   	  				}else{
   	  					$this->controller->f(CV::FAIL);
   	  					$diff_price=$total_price-$coupon;
   	  					$this->display("applyvipstore",array('store_data'=>$store_data,'coupon'=>$coupon,'total_price'=>$total_price,'is_top'=>$is_top,'diff_price'=>$diff_price,'store_id'=>$store_id,'sfc_nomal_store'=>$sfc_nomal_store,'sfc_vip_store'=>$sfc_vip_store));
   	  				}
   	  			  break;
   	  			default:
   	  				$model=User::model();
   	  				$model=empty($user_id)?$model:$model->findByPk($user_id);
   	  				$store_id=$_REQUEST['id'];
   	  			  $store=Station::model();
   	  			  $store_data=$store->findByPk($store_id);
   	  			  $is_vip=$store_data->is_vip;
   	  			  $coupon=$model->conpon;
   	  			  $sys_config=SysConfig::model();
   	  			  $sys_config_datas=$sys_config->get_all_syscfg();
   	  			  $sfc_nomal_store=$sys_config_datas['sfc_nomal_store'];
   	  			  $sfc_vip_store=$sys_config_datas['sfc_vip_store'];
              if($is_vip=='2'){
              	$this->controller->redirect($this->controller->createUrl("error/error404"));
              }else{
              	$total_price=$sfc_vip_store-$sfc_nomal_store;
              }
   	  				$is_top=false;
   	  				if($coupon>=$total_price){
   	  					$is_top=true;
   	  				}else{
   	  					$diff_price=$total_price-$coupon;
   	  				}
        			$this->display("applyvipstore",array('store_data'=>$store_data,'coupon'=>$coupon,'total_price'=>$total_price,'is_top'=>$is_top,'diff_price'=>$diff_price,'store_id'=>$store_id,'sfc_nomal_store'=>$sfc_nomal_store,'sfc_vip_store'=>$sfc_vip_store));
   	  			  break;
   	  		}
  }
  
  

}
?>