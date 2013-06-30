<?php
class Tops2Action extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->tag="";
        $this->controller->breadcrumbs=array('用户中心'=>$this->controller->createUrl("index"),'信息置顶');
        $this->controller->set_seo('信息置顶','','');
        return true;
    }
   protected function do_action(){
   	  		$user_id=Yii::app()->user->id;
   	  		$action=$_REQUEST['action'];
   	  		switch($action){
   	  			case 'tops':
   	  			 	$model=User::model();
   	  				$model=empty($user_id)?$model:$model->findByPk($user_id);
   	  				$top_id=$_REQUEST['id'];
   	  				$tops=Tops::model();
   	  				$tops_data=$tops->with("ConfigValues")->findByPk($top_id);
   	  				$hour_value=$tops_data->ConfigValues->value;
   	  				$days=$tops_data->days;
   	  				$coupon=$model->conpon;
   	  				$type=$tops_data->type;
   	  				$status=$tops_data->status;
   	  				$total_price=$hour_value*$days;
   	  				$is_top=false;
   	  				if($coupon>=$total_price){
   	  					if($status!=2){
   	  						$tops_type=CV::$tops_type;
							  	$comment=$tops_type[$type]."置顶";
   	  						$coupon_resume=new CouponResume();
   	  						$coupon_resume->consume($user_id,'2',$total_price,$comment);
   	  						$tops->updateByPk($top_id,array('status'=>'2'));
   	  						$this->controller->redirect($this->controller->createUrl("user/mytops"),array());
   	  				  }else{
   	  				  	$this->controller->redirect($this->controller->createUrl("user/mytops"),array());
   	  				  }
   	  				}else{
   	  					$this->controller->f(CV::FAIL);
   	  					$diff_price=$total_price-$coupon;
   	  					$this->display("tops2",array('model'=>$model,'coupon'=>$coupon,'total_price'=>$total_price,'coupon'=>$coupon,'tops_data'=>$tops_data,'is_top'=>$is_top,'diff_price'=>$diff_price,'top_id'=>$top_id));
   	  				}
   	  			  break;

   	  			default:
   	  				$model=User::model();
   	  				$model=empty($user_id)?$model:$model->findByPk($user_id);
   	  				$top_id=$_REQUEST['id'];
   	  				$tops=Tops::model();
   	  				$tops_data=$tops->with("ConfigValues")->findByPk($top_id);
   	  				$hour_value=$tops_data->ConfigValues->value;
   	  				$days=$tops_data->days;
   	  				$coupon=$model->conpon;
   	  				$total_price=$hour_value*$days;
   	  				$is_top=false;
   	  				if($coupon>=$total_price){
   	  					$is_top=true;
   	  				}else{
   	  					$diff_price=$total_price-$coupon;
   	  				}
        			$this->display("tops2",array('model'=>$model,'coupon'=>$coupon,'total_price'=>$total_price,'tops_data'=>$tops_data,'is_top'=>$is_top,'diff_price'=>$diff_price,'top_id'=>$top_id));
   	  			  break;
   	  		}
  }

}
?>