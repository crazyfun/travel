<?php
class ComplexAction extends  BaseAction{
    public function beforeAction(){
        $this->controller->init_page();
        return true;
    }
    protected function do_action(){
    	$get=$_GET;
    	$model=new Order();
      $conditions=array();
		  $params=array();	
    	
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
        
       
		    
		    
    		$total_nums=$model->get_total_nums($conditions,$params);
    		$total_sell=$model->get_total_sell($conditions,$params);
    		$total_settle=$model->get_total_settle($conditions,$params);
    		$total_already_settle=$model->get_already_settle($conditions,$params);
    		$total_no_settle=$model->get_no_settle($conditions,$params);
    		$total_profit=$model->get_total_profit($conditions,$params);
    		
    		
    		
			  spl_autoload_unregister(array('YiiBase','autoload'));
        require_once Yii::app()->basePath.'/extensions/libchart/classes/libchart.php';
        spl_autoload_register(array('YiiBase','autoload'));
        $chart = new VerticalBarChart(800, 300);
	      $dataSet = new XYDataSet();
	      $dataSet->addPoint(new Point("总人数", $total_nums));
	      $dataSet->addPoint(new Point("总销售额", $total_sell));
	      $dataSet->addPoint(new Point("总结算金额", $total_settle));
	      $dataSet->addPoint(new Point("已结算金额", $total_already_settle));
	      $dataSet->addPoint(new Point("未结算金额", $total_no_settle));
	      $dataSet->addPoint(new Point("利润", $total_profit));
	      $chart->setDataSet($dataSet);
	      $chart->setTitle("综合统计图");
	      $image_path="upload/generated/".$domain."/financial";
	      Util::makeDirectory($image_path);
	      $chart->render($image_path."/complex.png");
    	  $this->display('complex',array('model'=>$model,'image_path'=>$image_path));
    } 
}
?>
