<?php
class SellAction extends  BaseAction{
    public function beforeAction(){
        $this->controller->init_page();
        return true;
    }
    protected function do_action(){
    	$get=$_GET;
    	$model=new Order();
      $conditions=array();
		  $params=array();	
    	$start_date=$get['start_date'];
      if(empty($start_date)){
		   	 $start_date=date('Y-m-d',mktime(0,0,0,1,1,date("Y")));
		   }
		   $end_date=$get['end_date'];
       if(empty($end_date)){
		   	  $end_date=date('Y-m-d');
		   }
		   
		   $diff_month=Util::diff_days(strtotime($end_date),strtotime($start_date),"M");
		 
		   $line=$get['line'];
       if(!empty($line)){
			   array_push($conditions,"t.line LIKE :line");
			   $params[':line']="%$line%";
			   
		   }
		   $dijieshe=$get['dijieshe'];
       if(!empty($dijieshe)){
			   array_push($conditions,"t.dijieshe = :dijieshe");
			   $params[':dijieshe']=$dijieshe;
			   
		   }
		   $status=$get['status'];
       if(!empty($status)){
			   array_push($conditions,"t.status = :status");
			   $params[':status']=$status;
			   
		   }
		   
		   $order_type=$get['order_type'];
       if(!empty($order_type)){
			   array_push($conditions,"t.order_type = :order_type");
			   $params[':order_type']=$order_type;
		   }
		   
		   
		   $create_id=$get['create_id'];
       if(!empty($create_id)){
			   array_push($conditions,"(t.create_id=:uid )");
			   $params[':uid']=$create_id;
		   }
		    $station_data=$this->controller->station_data;
		    
    		$domain=$station_data['domain'];
    		$station_id=$station_data['id'];
		    array_push($conditions,"t.station_id =:station_id ");
		    $params[':station_id']=$station_id;
		   
			  spl_autoload_unregister(array('YiiBase','autoload'));
			  require_once Yii::app()->basePath.'/extensions/libchart/classes/libchart.php';
        spl_autoload_register(array('YiiBase','autoload'));
        $chart = new LineChart(800, 300);
	      $dataSet = new XYDataSet();
        for($ii=0;$ii<$diff_month;$ii++){
        	$current_date=date('Y-m',mktime(0,0,0,date('m',strtotime($start_date))+$ii,1,date('Y',strtotime($start_date))));
        	array_push($conditions,"DATE_FORMAT(t.date,'%Y-%m')=:current_date");
			    $params[':current_date']=$current_date;
    		  $total_sell=$model->get_total_sell($conditions,$params);
    		  $dataSet->addPoint(new Point($current_date."(".$total_sell.")", $total_sell));
        }
				$chart->setDataSet($dataSet);
				$chart->setTitle("月份销售额趋势图");
	      $image_path="upload/generated/".$domain."/tuandui";
	      Util::makeDirectory($image_path);
	      $chart->render($image_path."/sell.png");
    	  $this->display('sell',array('model'=>$model,'image_path'=>$image_path));
    } 
}
?>
