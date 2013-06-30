<?php
class SettleAction extends  BaseAction{
    public function beforeAction(){
        $this->controller->init_page();
        return true;
    }
    protected function do_action(){
    	$get=$_GET;
    	$model=new Income();
      $conditions=array();
		  $params=array();	
    	  $order_type=$get['order_type'];
       if(!empty($order_type)){
			   array_push($conditions,"t.order_type = :order_type");
			   $params[':order_type']=$order_type;
		   }
		   
		    $order_number=$get['order_number'];
       if(!empty($order_number)){
			   array_push($conditions,"t.order_number = :order_number");
			   $params[':order_number']=$order_number;
		   }
		   
		   $contacter=$get['contacter'];
       if(!empty($contacter)){
			   array_push($conditions,"t.contacter = :contacter");
			   $params[':contacter']=$contacter;
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
		    
    		$total_settle=$model->get_total($conditions,$params);
    		$total_already_settle=$model->get_already($conditions,$params);
    		$total_no_settle=$model->get_no($conditions,$params);
    		
			  spl_autoload_unregister(array('YiiBase','autoload'));
        require_once Yii::app()->basePath.'/extensions/libchart/classes/libchart.php';
        spl_autoload_register(array('YiiBase','autoload'));
        $chart = new PieChart(800, 300);
	      $dataSet = new XYDataSet();
	      $dataSet->addPoint(new Point("已支付金额(".$total_already_settle.")", $total_already_settle));
	      $dataSet->addPoint(new Point("未支付金额(".$total_no_settle.")", $total_no_settle));
	      $chart->setDataSet($dataSet);
	      $chart->setTitle("支付额统计图");
	      $image_path="upload/generated/".$domain."/income";
	      Util::makeDirectory($image_path);
	      $chart->render($image_path."/settle.png");
    	  $this->display('settle',array('model'=>$model,'image_path'=>$image_path));
    } 
}
?>
