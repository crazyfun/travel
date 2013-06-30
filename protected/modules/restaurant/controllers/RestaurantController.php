<?php

class RestaurantController extends Controller
{
	public $tag="restaurant";
	public $breadcrumbs=array();
	public function actionIndex(){
	
	}
	public function actionDetail()
	{
		Util::reset_vars();
		$restaurant_id=$_REQUEST['id'];
		if(empty($restaurant_id)){
			$this->redirect("/error/error404");
		}
		$model=new TravelRestaurant();
    $model=$model->with("User")->findByPk($restaurant_id); 
    $this->breadcrumbs=array('酒店'=>$this->createUrl("/search/default/index/action/restaurant"),"酒店".$model->restaurant_name);
    $ip_convert=IpConvert::get();
		$region_session=$ip_convert->init_region();  	 		 	    
		$region_name=$region_session['name'];
    $this->set_seo("预定".$region_name.'酒店'.$model->restaurant_name,'预定'.$region_name.'酒店，预订酒店，找酒店，找'.$region_name.'导游，'.$region_name.'导游证，'.$region_name.'导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，挂靠'.$region_name.'旅行社，'.$region_name.'导游报名','找导游网-"立火"旅游业之家:是全国最大的'.$region_name.'导游，导游证，导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，'.$region_name.'旅游计调，挂靠'.$region_name.'旅行社，'.$region_name.'旅行社，'.$region_name.'组团社，'.$region_name.'地接社，'.$region_name.'景点，'.$region_name.'酒店和旅游资讯等旅游业资源共享平台。并提供网站线上服务和线下电话沟通交流的服务。"立火"旅游业之家愿和所有业内同仁一起共建一个资源共享与合作的平台，让我们的客户能享受更便利、更亲切、更满意的服务。');
    $model->views=$model->views+1;
    $model->save();
		$this->render('detail',array('model'=>$model,'restaurant_id'=>$restaurant_id));
	}
	public function f($msg_code){ 
     if($msg_code == CV::SUCCESS){
       $this->set_flash("操作成功",$msg_code);
     }
     if($msg_code == CV::FAIL){
     	 $this->set_flash("操作失败",$msg_code);
     } 
   }

}