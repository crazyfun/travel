<?php 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'预支',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到发票管理',
               'value'=>$this->createUrl("myinvoice",array()),
             ),
             array(
               'name'=>'申请发票',
               'value'=>$this->createUrl("add",array())
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
             'invoice_numbers'=>array(
               'name'=>'发票抬头',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'order_numbers'=>array(
                'name'=>'合同编号',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'content'=>array(
                'name'=>'内容',
                'type'=>'textarea',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'price'=>array(
                'name'=>'金额',
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
       
    
    



    
    
    
    
    



