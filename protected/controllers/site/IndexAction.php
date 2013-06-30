<?php
class IndexAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_main_page();
        $this->controller->breadcrumbs=array('首页');
        $ip_convert=IpConvert::get();
				$region_session=$ip_convert->init_region();  	 		 	    
				$region_name=$region_session['name'];
        $this->controller->set_seo('找导游网_导游证_导游词_导游资格考试_导游考试_旅游计调_挂靠旅行社','找导游，导游证，导游词，导游资格考试，导游考试，挂靠旅行社，导游报名，英文导游，中文导游，旅行社，地接社，组团社，旅游计调','找导游网-"立火"旅游业之家:是全国最大的导游，导游证，导游词，导游资格考试，导游考试，导游报名，英文导游，中文导游，旅游计调，挂靠旅行社，旅行社，组团社，地接社，景点，酒店和旅游资讯等旅游业资源共享平台。并提供网站线上服务和线下电话沟通交流的服务。"立火"旅游业之家愿和所有业内同仁一起共建一个资源共享与合作的平台，让我们的客户能享受更便利、更亲切、更满意的服务。');
        return true;
    }
   protected function do_action(){
   	  Yii::app()->cache->flush();
			$this->display("index",array());
  }

}
?>