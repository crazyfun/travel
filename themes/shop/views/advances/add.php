<?php 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'预支',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到预支管理',
               'value'=>$this->createUrl("index",array()),
             ),
             array(
               'name'=>'新增预支',
               'value'=>$this->createUrl("add",array())
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
             'group_number'=>array(
               'name'=>'团队编号',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'contacter'=>array(
                'name'=>'预支人',
                'type'=>'text',
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
             
             'advances_price'=>array(
                'name'=>'预支价钱',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
              'advances_date'=>array(
                'name'=>'预支时间',
                'type'=>'date',
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
       
    
    



    
    
    
    
    



