<?php

class DefaultController extends Controller
{
	public $tag="information";
	public $breadcrumbs=array();
	public function actionIndex(){
		$this->breadcrumbs=array('资讯列表');
    $ip_convert=IpConvert::get();
		$region_session=$ip_convert->init_region();  	 		 	    
		$region_name=$region_session['name'];
    $this->set_seo(''.$region_name.'旅游资讯_导游证_导游词_找'.$region_name.'导游_'.$region_name.'导游资格考试_'.$region_name.'导游考试_'.$region_name.'旅游计调_挂靠旅行社_找导游网',''.$region_name.'旅游资讯，找'.$region_name.'导游，'.$region_name.'导游证，'.$region_name.'导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，挂靠'.$region_name.'旅行社，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，预定导游，'.$region_name.'导游司机，'.$region_name.'导游翻译,导游英文','找导游网-"立火"旅游业之家:是全国最大的'.$region_name.'导游，导游证，导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，'.$region_name.'旅游计调，挂靠'.$region_name.'旅行社，'.$region_name.'旅行社，'.$region_name.'组团社，'.$region_name.'地接社，'.$region_name.'景点，'.$region_name.'酒店和旅游资讯等旅游业资源共享平台。并提供网站线上服务和线下电话沟通交流的服务。"立火"旅游业之家愿和所有业内同仁一起共建一个资源共享与合作的平台，让我们的客户能享受更便利、更亲切、更满意的服务。');
		Util::reset_vars();
		
		$model=Information::model();
  	  //定义搜索条件组合的array
	 $conditions=array();
	 $params=array();
	 $page_params=array();
	 
	   //组合搜索条件
		$title=$_REQUEST['title'];
		if(!empty($title)){
		   array_push($conditions,"t.title LIKE :title");
		   $params[':title']="%$title%";
		   $page_params['title']=$title;
		}

		$type_id=$_REQUEST['type_id'];
		if(!empty($type_id)){
			array_push($conditions,"t.type_id = :type_id");
			$params[':type_id']=$type_id;
			$page_params['type_id']=$type_id;
		}
	  array_push($conditions,"t.model_type =:model_type");
		$params[':model_type']=CV::$model_type['guideinfo'];
		$page_params['model_type']=CV::$model_type['guideinfo'];
		   
	 //定义排序类
	 $sort=new CSort();
  	 $sort->attributes=array();
  	 $sort->defaultOrder="t.create_time DESC";
  	 $sort->params=$page_params;
  	 //生成ActiveDataProvider对象
	 $criteria=new CDbCriteria;
	 $dataProvider=new CActiveDataProvider($model, array(
		'criteria'=>array(
			'condition'=>implode(' AND ',$conditions),
			'params'=>$params,
			'with'=>array("User","Type"),
		),
		'pagination'=>array(
			'pageSize' => '10',
			'params' => $page_params,
		),
		'sort'=>$sort,
	 ));
	 
	  $this->render('index',array('model'=>$model,'page_params'=>$page_params,'dataProvider'=>$dataProvider));
	}
	
	
	public function actionDetail(){
		Util::reset_vars();
		$id=$_REQUEST['id'];
		if(empty($id)){
			$this->redirect($this->createUrl("/error/error404"));
		}
		$model=Information::model();
		$model=$model->with("User","Type")->findByPk($id);
    $model->views=$model->views+1;
    $model->save();
		$this->breadcrumbs=array('资讯列表'=>$this->createUrl("/information/default/index"),$model->title);
		$ip_convert=IpConvert::get();
		$region_session=$ip_convert->init_region();  	 		 	    
		$region_name=$region_session['name'];
    $this->set_seo($model->title,''.$region_name.'旅游资讯，找'.$region_name.'导游，'.$region_name.'导游证，'.$region_name.'导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，挂靠'.$region_name.'旅行社，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，预定导游，'.$region_name.'导游司机，'.$region_name.'导游翻译,导游英文','找导游网-"立火"旅游业之家:是全国最大的'.$region_name.'导游，导游证，导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，'.$region_name.'旅游计调，挂靠'.$region_name.'旅行社，'.$region_name.'旅行社，'.$region_name.'组团社，'.$region_name.'地接社，'.$region_name.'景点，'.$region_name.'酒店和旅游资讯等旅游业资源共享平台。并提供网站线上服务和线下电话沟通交流的服务。"立火"旅游业之家愿和所有业内同仁一起共建一个资源共享与合作的平台，让我们的客户能享受更便利、更亲切、更满意的服务。');

		$this->render('detail',array('model'=>$model));
		
	}
  
}