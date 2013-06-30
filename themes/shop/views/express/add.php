<?php 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'快递',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到快递管理',
               'value'=>$this->createUrl("index",array()),
             ),
             array(
               'name'=>'新增快递',
               'value'=>$this->createUrl("add",array())
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
             'contacter'=>array(
               'name'=>'收件人',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             'contacter_phone'=>array(
                'name'=>'联系号码',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'contacter_company'=>array(
                'name'=>'单位',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'contacter_address'=>array(
                'name'=>'地址',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
              'express_date'=>array(
                'name'=>'发货日期',
                'type'=>'date',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             'scan'=>array(
                'name'=>'扫描件',
                'type'=>'file',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             'comment'=>array(
                'name'=>'备注',
                'type'=>'textarea',
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
       
    
    



    
    
    
    
    



