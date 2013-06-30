<?php

class DefaultController extends Controller
{
	public $tag="search";
	public $breadcrumbs=array();
	public function actionIndex(){
		Util::reset_vars();
		$action=$_REQUEST['action'];
		$this->tag=$action;
		$regions=$this->get_regions();$regions=$this->get_regions();
		switch($action){
			case 'guide':
			
			  $this->breadcrumbs=array('导游搜索');
        
        $ip_convert=IpConvert::get();
				$region_session=$ip_convert->init_region();  	 		 	    
				$region_name=$region_session['name'];
        $this->set_seo('找导游网_导游证_导游词_找'.$region_name.'导游_'.$region_name.'导游资格考试_'.$region_name.'导游考试_'.$region_name.'旅游计调_挂靠旅行社','找'.$region_name.'导游，'.$region_name.'导游证，'.$region_name.'导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，挂靠'.$region_name.'旅行社，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，预定导游，'.$region_name.'导游司机，'.$region_name.'导游翻译,导游英文','找导游网-"立火"旅游业之家:是全国最大的'.$region_name.'导游，导游证，导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，'.$region_name.'旅游计调，挂靠'.$region_name.'旅行社，'.$region_name.'旅行社，'.$region_name.'组团社，'.$region_name.'地接社，'.$region_name.'景点，'.$region_name.'酒店和旅游资讯等旅游业资源共享平台。并提供网站线上服务和线下电话沟通交流的服务。"立火"旅游业之家愿和所有业内同仁一起共建一个资源共享与合作的平台，让我们的客户能享受更便利、更亲切、更满意的服务。');
        
        
			  $search_datas=$this->search_guide();
			  $advanced_search=array(
			   'guide_level'=>array('name'=>'导游等级','items'=>CV::$guide_level),
			   'guide_price'=>array('name'=>'带团价格','items'=>array('1'=>'<100','2'=>'100-300','3'=>'300-500','4'=>'500-800','5'=>'800-1000','6'=>'>1000')),
			   'guide_year'=>array('name'=>'带团年限','items'=>array('1'=>'一年','2'=>'二年','3'=>'三年','4'=>'四年','5'=>'五年','6'=>'>五年')),
			   'guide_educational'=>array('name'=>'导游学历','items'=>CV::$guide_educational),
			   'genter'=>array('name'=>'导游性别','items'=>CV::$sex),
			  );
			  $advanced_show_items=array('show_items'=>array('列表'=>'guide_lists_items','图片'=>'guide_images_items'));
			  $advanced_sort=array('registe_sort'=>'创建时间','year_sort'=>'带团年限','views_sort'=>'热门');
			  $this->render('guide',array('model'=>$model,'dataProvider'=>$search_datas['dataProvider'],'page_params'=>$search_datas['page_params'],'show_items'=>$search_datas['show_items'],'action'=>$action,'advanced_search'=>$advanced_search,'advanced_show_items'=>$advanced_show_items,'advanced_sort'=>$advanced_sort,'regions'=>$regions));
			  break;
			case 'agency':
			  $this->breadcrumbs=array('旅行社搜索');
			  
        $ip_convert=IpConvert::get();
				$region_session=$ip_convert->init_region();  	 		 	    
				$region_name=$region_session['name'];
        $this->set_seo('找导游网_'.$region_name.'旅行社_导游证_导游词_找'.$region_name.'导游_'.$region_name.'导游资格考试_'.$region_name.'导游考试_'.$region_name.'旅游计调_挂靠旅行社',''.$region_name.'旅行社，'.$region_name.'地接社，'.$region_name.'组团社，'.$region_name.'旅游计调，找'.$region_name.'导游地陪，找'.$region_name.'导游，'.$region_name.'导游证，'.$region_name.'导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，挂靠'.$region_name.'旅行社，'.$region_name.'导游报名','找导游网-"立火"旅游业之家:是全国最大的'.$region_name.'导游，导游证，导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，'.$region_name.'旅游计调，挂靠'.$region_name.'旅行社，'.$region_name.'旅行社，'.$region_name.'组团社，'.$region_name.'地接社，'.$region_name.'景点，'.$region_name.'酒店和旅游资讯等旅游业资源共享平台。并提供网站线上服务和线下电话沟通交流的服务。"立火"旅游业之家愿和所有业内同仁一起共建一个资源共享与合作的平台，让我们的客户能享受更便利、更亲切、更满意的服务。');
        
			  $search_datas=$this->search_agency();
			  $advanced_show_items=array('show_items'=>array('列表'=>'agency_lists_items','图片'=>'agency_images_items'));
			  $advanced_sort=array('registe_sort'=>'创建时间','views_sort'=>'热门');
        $this->render('agency',array('model'=>$model,'dataProvider'=>$search_datas['dataProvider'],'page_params'=>$search_datas['page_params'],'show_items'=>$search_datas['show_items'],'action'=>$action,'advanced_show_items'=>$advanced_show_items,'advanced_sort'=>$advanced_sort,'regions'=>$regions));
			  break;
			case 'restaurant':
			   $this->breadcrumbs=array('酒店搜索');
        $ip_convert=IpConvert::get();
				$region_session=$ip_convert->init_region();  	 		 	    
				$region_name=$region_session['name'];
        $this->set_seo('找导游网_预定'.$region_name.'酒店_预订酒店_找酒店_导游证_导游词_找'.$region_name.'导游_'.$region_name.'导游资格考试_'.$region_name.'导游考试_'.$region_name.'旅游计调_挂靠旅行社','预定'.$region_name.'酒店，预订酒店，找酒店，'.$region_name.'导游资格考试，找'.$region_name.'导游，'.$region_name.'导游证，'.$region_name.'导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，挂靠'.$region_name.'旅行社，'.$region_name.'导游报名','找导游网-"立火"旅游业之家:是全国最大的'.$region_name.'导游，导游证，导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，'.$region_name.'旅游计调，挂靠'.$region_name.'旅行社，'.$region_name.'旅行社，'.$region_name.'组团社，'.$region_name.'地接社，'.$region_name.'景点，'.$region_name.'酒店和旅游资讯等旅游业资源共享平台。并提供网站线上服务和线下电话沟通交流的服务。"立火"旅游业之家愿和所有业内同仁一起共建一个资源共享与合作的平台，让我们的客户能享受更便利、更亲切、更满意的服务。');
			  $search_datas=$this->search_restaurant();
			  $advanced_show_items=array('show_items'=>array('列表'=>'restaurant_lists_items','图片'=>'restaurant_images_items'));
			  $advanced_sort=array('registe_sort'=>'创建时间','views_sort'=>'热门','open_sort'=>'开业时间');
        $this->render('restaurant',array('model'=>$model,'dataProvider'=>$search_datas['dataProvider'],'page_params'=>$search_datas['page_params'],'show_items'=>$search_datas['show_items'],'action'=>$action,'advanced_show_items'=>$advanced_show_items,'advanced_sort'=>$advanced_sort,'regions'=>$regions));
			  break;
			case 'line':
			  $this->breadcrumbs=array('计调线路搜索');
        $ip_convert=IpConvert::get();
				$region_session=$ip_convert->init_region();  	 		 	    
				$region_name=$region_session['name'];
        $this->set_seo('找导游网_'.$region_name.'旅游计调_导游证_导游词_找'.$region_name.'导游_'.$region_name.'导游资格考试_'.$region_name.'导游考试_'.$region_name.'旅游计调_挂靠旅行社',''.$region_name.'旅行社，'.$region_name.'地接社，'.$region_name.'组团社，'.$region_name.'旅游计调，找'.$region_name.'导游地陪，找'.$region_name.'导游，'.$region_name.'导游证，'.$region_name.'导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，挂靠'.$region_name.'旅行社，'.$region_name.'导游报名','找导游网-"立火"旅游业之家:是全国最大的'.$region_name.'导游，导游证，导游词，'.$region_name.'导游资格考试，'.$region_name.'导游考试，'.$region_name.'导游报名，'.$region_name.'英文导游，'.$region_name.'中文导游，'.$region_name.'旅游计调，挂靠'.$region_name.'旅行社，'.$region_name.'旅行社，'.$region_name.'组团社，'.$region_name.'地接社，'.$region_name.'景点，'.$region_name.'酒店和旅游资讯等旅游业资源共享平台。并提供网站线上服务和线下电话沟通交流的服务。"立火"旅游业之家愿和所有业内同仁一起共建一个资源共享与合作的平台，让我们的客户能享受更便利、更亲切、更满意的服务。');
			  $search_datas=$this->search_line();
			  $advanced_sort=array('registe_sort'=>'发布时间','start_sort'=>'开始时间','cost_sort'=>'费用');
        $this->render('line',array('model'=>$model,'dataProvider'=>$search_datas['dataProvider'],'page_params'=>$search_datas['page_params'],'show_items'=>$search_datas['show_items'],'action'=>$action,'advanced_sort'=>$advanced_sort,'regions'=>$regions));
        
        
			  break;
			default:
			  break;
		}
	  
	}
	
	public function f($msg_code){ 
     if($msg_code == CV::SUCCESS){
       $this->set_flash("操作成功",$msg_code);
     }
     if($msg_code == CV::FAIL){
     	 $this->set_flash("操作失败",$msg_code);
     }
     
   }
   
   public function search_guide(){

   	$show_items=$_REQUEST['show_items'];
   	$keywords=$_REQUEST['keywords'];
   	//$start_time=$_REQUEST['start_time'];
   	//$end_time=$_REQUEST['end_time'];
   	$guide_level=$_REQUEST['guide_level'];
   	$guide_educational=$_REQUEST['guide_educational'];
   	$region_id=$_REQUEST['region_id'];
   	$guide_year=$_REQUEST['guide_year'];
   	$genter=$_REQUEST['genter'];
   	$registe_sort=$_REQUEST['registe_sort'];
   	$year_sort=$_REQUEST['year_sort'];
   	$views_sort=$_REQUEST['views_sort'];
   	$guide_price=$_REQUEST['guide_price'];
   		//定义搜索条件组合的array
		$condition=array();
		$params=array();
		$page_params=array();
		$order_sort="t.top DESC,t.create_time DESC";
		if(empty($show_items)){
			$show_items="guide_lists_items";
		}
		$page_params['show_items']=$show_items;
		
		if(!empty($keywords)){
			array_push($condition,'((User.real_name LIKE :keywords) OR (t.guide_number LIKE :keywords) OR (t.guide_familiar LIKE :keywords))');
			$params[':keywords']="%".$keywords."%";
			$page_params['keywords']=$keywords;
		}
		
		if(!empty($guide_level)){
			array_push($condition,'t.guide_level = :guide_level');
			$params[':guide_level']=$guide_level;
			$page_params['guide_level']=$guide_level;
		}
		
		if(!empty($guide_year)){
			if($guide_year=='6'){
				array_push($condition,'t.guide_year > :guide_year');
				$params[':guide_year']=$guide_year;
				$page_params['guide_year']=$guide_year;
			}else{
				if($guide_year=='1'){
					  array_push($condition,'t.guide_year <= :guide_year');
						$params[':guide_year']=$guide_year;
						$page_params['guide_year']=$guide_year;
				}else{
					  array_push($condition,'t.guide_year = :guide_year');
						$params[':guide_year']=$guide_year;
						$page_params['guide_year']=$guide_year;
				}
				
			}
		}
		
	 if(!empty($guide_price)){
			switch($guide_price){
				case '1':
				  array_push($condition,'t.guide_price <= :guide_price');
					$params[':guide_price']=100;
					$page_params['guide_price']=$guide_price;
				  break;
				case '2':
				  array_push($condition,'(t.guide_price > :min_price AND t.guide_price <= :max_price)');
					$params[':min_price']=100;
					$params[':max_price']=300;
					$page_params['guide_price']=$guide_price;
				  break;
				case '3':
				  array_push($condition,'(t.guide_price > :min_price AND t.guide_price <= :max_price)');
					$params[':min_price']=300;
					$params[':max_price']=500;
					$page_params['guide_price']=$guide_price;
				  break;
				case '4':
				   array_push($condition,'(t.guide_price > :min_price AND t.guide_price <= :max_price)');
					$params[':min_price']=500;
					$params[':max_price']=800;
					$page_params['guide_price']=$guide_price;
				  break;
				case '5':
				   array_push($condition,'(t.guide_price > :min_price AND t.guide_price <= :max_price)');
					$params[':min_price']=800;
					$params[':max_price']=1000;
					$page_params['guide_price']=$guide_price;
				  break;
				case '6':
				  array_push($condition,'t.guide_price > :guide_price');
					$params[':guide_price']=1000;
					$page_params['guide_price']=$guide_price;
				  break;
				default:
				  break;
			}
		
		}
		
		if(!empty($guide_educational)){
			array_push($condition,'t.guide_educational = :guide_educational');
			$params[':guide_educational']=$guide_educational;
			$page_params['guide_educational']=$guide_educational;
		}
		
		if(!empty($region_id)){
			array_push($condition,'t.guide_region '.Util::search_in_region($region_id));
			$page_params['region_id']=$region_id;
			$page_params['region_name']=$_REQUEST['region_name'];
		}
		/*
		else{
			$ip_convert=IpConvert::get();
			$region_datas=$ip_convert->init_region();
			array_push($condition,'t.guide_region '.Util::search_in_region($region_id));
			$page_params['region_id']=$region_datas['id'];
			$page_params['region_name']=$region_datas['name'];
		}
		*/
		if(!empty($genter)){
			array_push($condition,'User.genter = :genter');
			$params[':genter']=$genter;
			$page_params['genter']=$genter;
			
		}
		if(!empty($registe_sort)){
			$order_sort="t.top DESC,t.create_time ".$registe_sort;
			$year_sort="";
			$views_sort="";
			$page_params['registe_sort']=$registe_sort;
			$page_params['year_sort']=$year_sort;
			$page_params['views_sort']=$views_sort;
		}
    if(!empty($year_sort)){
			$order_sort="t.top DESC,t.guide_year ".$year_sort;
			$registe_sort="";
			$views_sort="";
			$page_params['registe_sort']=$registe_sort;
			$page_params['year_sort']=$year_sort;
			$page_params['views_sort']=$views_sort;
		}
		
		if(!empty($views_sort)){
			$order_sort="t.top DESC,t.views ".$views_sort;
			$registe_sort="";
			$year_sort="";
			$page_params['registe_sort']=$registe_sort;
			$page_params['year_sort']=$year_sort;
			$page_params['views_sort']=$views_sort;
		}	
		
		array_push($condition,'t.status = :status');
	  $params[':status']='2';
  	//定义排序类
		$sort=new CSort();
  	$sort->attributes=array();
  	$sort->defaultOrder=$order_sort;
  	$sort->params=$page_params;
  	$model=new Guide();
  	$page_params['action']='guide';
  	//生成ActiveDataProvider对象
  	$dataProvider=new CActiveDataProvider($model, array(
				'criteria'=>array(
			  'condition'=>implode(' AND ',$condition),
			  'params'=>$params,
			  'with'=>array('User'),
			  'together'=>true,
		    ),
				'pagination'=>array(
          		'pageSize' => '20',
          		'params' => $page_params,
      	),
      	'sort'=>$sort,
		));
	  				
		return array('dataProvider'=>$dataProvider,'page_params'=>$page_params,'show_items'=>$show_items);				
   	
   }
   
   public function search_agency(){
   	$show_items=$_REQUEST['show_items'];
   	$keywords=$_REQUEST['keywords'];
   	$region_id=$_REQUEST['region_id'];
   	$registe_sort=$_REQUEST['registe_sort'];
   	$views_sort=$_REQUEST['views_sort'];

   		//定义搜索条件组合的array
		$condition=array();
		$params=array();
		$page_params=array();
		$order_sort="t.top DESC,t.create_time DESC";
		if(empty($show_items)){
			$show_items="agency_lists_items";
		}
		$page_params['show_items']=$show_items;
		if(!empty($keywords)){
			array_push($condition,'((t.agency_name LIKE :keywords) OR (t.agency_address LIKE :keywords) OR (t.contacter LIKE :keywords) OR (t.describe LIKE :keywords))');
			$params[':keywords']="%".$keywords."%";
			$page_params['keywords']=$keywords;
		}
		
		if(!empty($region_id)){
			array_push($condition,'t.agency_region '.Util::search_in_region($region_id));
			$page_params['region_id']=$region_id;
			$page_params['region_name']=$_REQUEST['region_name'];
		}
		/*
		else{
			$ip_convert=IpConvert::get();
			$region_datas=$ip_convert->init_region();
			array_push($condition,'t.agency_region '.Util::search_in_region($region_id));
			$page_params['region_id']=$region_datas['id'];
			$page_params['region_name']=$region_datas['name'];
		}
		*/
		
		if(!empty($registe_sort)){
			$order_sort="t.top DESC,t.create_time ".$registe_sort;
			$views_sort="";
			$page_params['registe_sort']=$registe_sort;
			$page_params['views_sort']=$views_sort;
		}
		

		if(!empty($views_sort)){
			$order_sort="t.top DESC,t.views ".$views_sort;
			$registe_sort="";
			$page_params['registe_sort']=$registe_sort;
			$page_params['views_sort']=$views_sort;
		}
		
		array_push($condition,'t.status = :status');
	  $params[':status']='2';
  	//定义排序类
		$sort=new CSort();
  	$sort->attributes=array();
  	$sort->defaultOrder=$order_sort;
  	$sort->params=$page_params;
  	$model=new TravelAgency();
  	$page_params['action']='agency';
  	//生成ActiveDataProvider对象
  	$dataProvider=new CActiveDataProvider($model, array(
				'criteria'=>array(
			  'condition'=>implode(' AND ',$condition),
			  'params'=>$params,
			  'with'=>array("User"),
			  'together'=>true,
		    ),
				'pagination'=>array(
          		'pageSize' => '20',
          		'params' => $page_params,
      	),
      	'sort'=>$sort,
		));
						
		return array('dataProvider'=>$dataProvider,'page_params'=>$page_params,'show_items'=>$show_items);
   }
   
   
   public function search_restaurant(){
   	$show_items=$_REQUEST['show_items'];
   	$keywords=$_REQUEST['keywords'];
   	$restaurant_level=$_REQUEST['restaurant_level'];
   	$region_id=$_REQUEST['region_id'];
   	$registe_sort=$_REQUEST['registe_sort'];
   	$views_sort=$_REQUEST['views_sort'];
   	$open_sort=$_REQUEST['open_sort'];
   		//定义搜索条件组合的array
		$condition=array();
		$params=array();
		$page_params=array();
		$order_sort="t.top DESC,t.create_time DESC";
		if(empty($show_items)){
			$show_items="restaurant_lists_items";
		}
		$page_params['show_items']=$show_items;
		
		if(!empty($keywords)){
			array_push($condition,'((t.restaurant_name LIKE :keywords) OR (t.restaurant_address LIKE :keywords) OR (t.restaurant_desc LIKE :keywords) OR (t.contacter LIKE :keywords))');
			$params[':keywords']="%".$keywords."%";
			$page_params['keywords']=$keywords;
		}
		
		
		if(!empty($restaurant_level)){
			array_push($condition,'t.restaurant_level = :restaurant_level');
			$params[':restaurant_level']=$restaurant_level;
			$page_params['restaurant_level']=$restaurant_level;
		}
		
 
		if(!empty($region_id)){
			
			array_push($condition,'t.restaurant_region '.Util::search_in_region($region_id));
			$page_params['region_id']=$region_id;
			$page_params['region_name']=$_REQUEST['region_name'];
		}
		/*
		else{
			$ip_convert=IpConvert::get();
			$region_datas=$ip_convert->init_region();
			array_push($condition,'t.restaurant_region '.Util::search_in_region($region_id));
			$page_params['region_id']=$region_datas['id'];
			$page_params['region_name']=$region_datas['name'];
		}
		*/
		if(!empty($registe_sort)){
			$order_sort="t.top DESC,t.create_time ".$registe_sort;
			$views_sort="";
			$open_sort="";
			$page_params['registe_sort']=$registe_sort;
			$page_params['views_sort']=$views_sort;
			$page_params['open_sort']=$open_sort;
		}
		

		if(!empty($views_sort)){
			$order_sort="t.top DESC,t.views ".$views_sort;
			$registe_sort="";
			$open_sort="";
			$page_params['registe_sort']=$registe_sort;
			$page_params['views_sort']=$views_sort;
			$page_params['open_sort']=$open_sort;
		}
		
		if(!empty($open_sort)){
			$order_sort="t.top DESC,t.restaurant_open ".$open_sort;
			$registe_sort="";
			$views_sort="";
			$page_params['open_sort']=$open_sort;
			$page_params['registe_sort']=$registe_sort;
			$page_params['views_sort']=$views_sort;
		}
		array_push($condition,'t.status = :status');
	  $params[':status']='2';
  	//定义排序类
		$sort=new CSort();
  	$sort->attributes=array();
  	$sort->defaultOrder=$order_sort;
  	$sort->params=$page_params;
  	$model=new TravelRestaurant();
  	$page_params['action']='restaurant';
  	//生成ActiveDataProvider对象
  	$dataProvider=new CActiveDataProvider($model, array(
				'criteria'=>array(
			  'condition'=>implode(' AND ',$condition),
			  'params'=>$params,
			  'with'=>array("User"),
			  'together'=>true,
		    ),
				'pagination'=>array(
          		'pageSize' => '20',
          		'params' => $page_params,
      	),
      	'sort'=>$sort,
		));
						
		return array('dataProvider'=>$dataProvider,'page_params'=>$page_params,'show_items'=>$show_items);
   }
   
   
   
   public function search_line(){
   	$id=$_REQUEST['id'];
   	$keywords=$_REQUEST['keywords'];
   	$start_time=$_REQUEST['start_time'];
   	$end_time=$_REQUEST['end_time'];
   	$region_id=$_REQUEST['region_id'];
   	$registe_sort=$_REQUEST['registe_sort'];
   	$start_sort=$_REQUEST['start_sort'];
   	$cost_sort=$_REQUEST['cost_sort'];
   		//定义搜索条件组合的array
		$condition=array();
		$params=array();
		$page_params=array();
		$order_sort="t.top DESC,t.create_time DESC";
		$show_items="line_lists_items";
		$page_params['show_items']=$show_items;
		if(!empty($keywords)){
			array_push($condition,'((TravelAgency.agency_name LIKE :keywords) OR (t.line LIKE :keywords) OR (t.numbers = :keywords) OR (t.address LIKE :keywords) OR (t.attractions LIKE :keywords))');
			$params[':keywords']="%".$keywords."%";
			$page_params['keywords']=$keywords;
		}
		if(!empty($id)){
			array_push($condition,'t.id=:id');
			$params[':id']=$id;
			$page_params['id']=$id;
		}
		
		if(!empty($start_time)){
			array_push($condition,'t.start_date <= :start_time');
			$params[':start_time']=$start_time;
			$page_params['start_time']=$start_time;
		}
		
		if(!empty($end_time)){
			array_push($condition,'t.end_date <= :end_time');
			$params[':end_time']=$end_time;
			$page_params['end_time']=$end_time;
		}
		
		if(!empty($region_id)){
			array_push($condition,'TravelAgency.agency_region '.Util::search_in_region($region_id));
			$page_params['region_id']=$region_id;
			$page_params['region_name']=$_REQUEST['region_name'];
		}else{
			$ip_convert=IpConvert::get();
			$region_datas=$ip_convert->init_region();
			array_push($condition,'TravelAgency.agency_region '.Util::search_in_region($region_id));
			$page_params['region_id']=$region_datas['id'];
			$page_params['region_name']=$region_datas['name'];
		}
		
		if(!empty($registe_sort)){
			$order_sort="t.top DESC,t.create_time ".$registe_sort;
			$start_sort="";
			$cost_sort="";
			$page_params['registe_sort']=$registe_sort;
			$page_params['start_sort']=$start_sort;
			$page_params['cost_sort']=$cost_sort;
		}
		if(!empty($start_sort)){
			$order_sort="t.top DESC,t.start_date ".$start_sort;
			$registe_sort="";
			$cost_sort="";
			$page_params['registe_sort']=$registe_sort;
			$page_params['start_sort']=$start_sort;
			$page_params['cost_sort']=$cost_sort;
		}
		
		if(!empty($cost_sort)){
			$order_sort="t.top DESC,t.cost ".$cost_sort;
			$registe_sort="";
			$start_sort="";
			$page_params['cost_sort']=$cost_sort;
			$page_params['registe_sort']=$registe_sort;
			$page_params['start_sort']=$start_sort;
		}
		$current_date=date("Y-m-d");
		array_push($condition,'t.end_date >= :current_date ');
	  $params[':current_date']=$current_date;
	  
	  array_push($condition,'TravelAgency.status = :status');
	  $params[':status']='2';
	  
	  
  	//定义排序类
		$sort=new CSort();
  	$sort->attributes=array();
  	$sort->defaultOrder=$order_sort;
  	$sort->params=$page_params;
  	$model=new AgencyDate();
  	$page_params['action']='line';
  	//生成ActiveDataProvider对象
  	$dataProvider=new CActiveDataProvider($model, array(
				'criteria'=>array(
				  'select'=>'t.*',
			  	'condition'=>implode(' AND ',$condition),
			  	'params'=>$params,
           'with'=>array('User'=>array('with'=>array('TravelAgency'))),
			     'together'=>true,
		    ),
				'pagination'=>array(
          		'pageSize' => '20',
          		'params' => $page_params,
      	),
      	'sort'=>$sort,
		));
						
		return array('dataProvider'=>$dataProvider,'page_params'=>$page_params,'show_items'=>$show_items);
   }
   
   
   
   function get_regions()
    {
        $model_region = Region::model();
        $regions = $model_region->get_list(0);
        if ($regions)
        {
            $tmp  = array();
            foreach ($regions as $key => $value)
            {
                $tmp[$value['region_id']] = $value['region_name'];
            }
            $regions = $tmp;
        }
       
        return $regions;
    }  

}