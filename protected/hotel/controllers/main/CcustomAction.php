<?php
class CcustomAction extends  BaseAction{
    public function beforeAction(){
    	  if(Yii::app()->request->isAjaxRequest){
    		  Util::reset_vars();
          return true;
        }else{
        	return false;
        }
    }
    protected function do_action(){
    	  $station_data=Yii::app()->session->get("station_data");
		    if(empty($station_data)){
			    $this->controller->set_station_datas();
			    $station_data=Yii::app()->session->get("station_data");
		    }
    	  $model=new Scustoms();
    	  $query=$_REQUEST['query'];
    	  $model_datas=$model->findAll(array('select'=>'id,name','condition'=>"name LIKE :name AND station_id=:station_id",'params'=>array(':name'=>"%".$query."%",':station_id'=>$station_data['id'])));
    	  $suggestions=array();
    	  $data=array();
    	  foreach($model_datas as $key => $value){
    	  	array_push($suggestions,$value->name);
    	  	$tem_data=array();
    	  	$tem_data['id']=$value->id;
    	  	array_push($data,$tem_data);
    	  }
			  $ajax_array=array('query'=>$query,
			    'suggestions'=>$suggestions,
			    'data'=>$data,
			  );
        echo json_encode($ajax_array); 
    } 
}
?>
