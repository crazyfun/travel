<?php 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'结算',
          //用户操作
          'user_operate'=>array(  
          ),
          //增加的内容字段
          'add_datas'=>array(
             'order_type'=>array(
                 'name'=>'',
                 'type'=>'hidden',//搜索框的类型
                 'value'=>'',
                 'htmlOptions'=>array(),
                 'desc'=>''
             ),
             'order_id'=>array(
                 'name'=>'',
                 'type'=>'hidden',//搜索框的类型
                 'value'=>'',
                 'htmlOptions'=>array(),
                 'desc'=>''
             ),
             'dijieshe_id'=>array(
                 'name'=>'',
                 'type'=>'hidden',//搜索框的类型
                 'value'=>'',
                 'htmlOptions'=>array(),
                 'desc'=>''
             ),
             'order_line'=>array(
               'name'=>'订单',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array('readonly'=>'readonly','value'=>$order_data->line),
               'desc'=>''
             ),
             'dijieshe_name'=>array(
                'name'=>'地接社',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array('readonly'=>'readonly','value'=>$order_data->Dijieshe->name),
                'desc'=>''
             ),
             'total_jiesuan'=>array(
                'name'=>'可结算值',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array('readonly'=>'readonly','value'=>$order_data->get_need_settle()),
                'desc'=>''
             ),
             'jiesuan_value'=>array(
                'name'=>'结算值',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             'comment'=>array(
                'name'=>'备注',
                'type'=>'textarea',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
          ), 
         
          //最下面操作按钮
          'operates'=>array(
             array(
               
             ),
          ),
            
       ));
?>
       
    
    



    
    
    
    
    



