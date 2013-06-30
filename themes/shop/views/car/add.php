<?php 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'车辆',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到车辆管理',
               'value'=>$this->createUrl("index",array('relation_id'=>$relation_id)),
             ),
             array(
               'name'=>'新增车辆',
               'value'=>$this->createUrl("add",array('relation_id'=>$relation_id))
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
              'trave_name'=>array(
               'name'=>'出游线路',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'use_date'=>array(
               'name'=>'使用日期',
               'type'=>'date',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'price'=>array(
               'name'=>'价格',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'car_num'=>array(
               'name'=>'车号',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'car_type'=>array(
               'name'=>'车型',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
              
              'car_age'=>array(
               'name'=>'车龄',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
            
             
             'car_driver'=>array(
               'name'=>'司机',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'cell_phone'=>array(
                'name'=>'联系方式',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             
             'tele_phone'=>array(
                'name'=>'座机',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'driver_email'=>array(
                'name'=>'Email',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'driver_qq'=>array(
                'name'=>'Qq',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'driver_msn'=>array(
                'name'=>'Msn',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'driver_address'=>array(
                'name'=>'居住地址',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
              'service'=>array(
                'name'=>'服务',
                'type'=>'select',
                'value'=>CV::$service,
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'status'=>array(
                'name'=>'结算',
                'type'=>'select',
                'value'=>CV::$settlement_status,
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'car_comment'=>array(
                'name'=>'备注',
                'type'=>'multitext',
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             
            
          ), 
         
          //最下面操作按钮
          'operates'=>array(
             array(
               
             ),
          ),
            
       ));
?>
       
    
    



    
    
    
    
    



