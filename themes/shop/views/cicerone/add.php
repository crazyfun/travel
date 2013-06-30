<?php 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'导游',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到导游管理',
               'value'=>$this->createUrl("index",array()),
             ),
             array(
               'name'=>'新增导游',
               'value'=>$this->createUrl("add",array())
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
             'contacter'=>array(
               'name'=>'导游名称',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'cicerone_sex'=>array(
                'name'=>'性别',
                'type'=>'select',
                'value'=>CV::$sex,
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'cell_phone'=>array(
                'name'=>'联系电话',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             
             'cicerone_num'=>array(
                'name'=>'导游证',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             
             'cicerone_level'=>array(
                'name'=>'证件级别',
                'type'=>'select',
                'value'=>CV::$cicerone_level,
                'htmlOptions'=>array(),
             ),
             
             'email'=>array(
                'name'=>'邮箱',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             'code'=>array(
                'name'=>'身份证',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             'qq'=>array(
                'name'=>'Qq',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             'msn'=>array(
                'name'=>'Msn',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             'cicerone_address'=>array(
                'name'=>'联系地址',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             'familiar'=>array(
                'name'=>'熟悉目的地',
                'type'=>'textarea',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             'desc'=>array(
                'name'=>'导游描述',
                'type'=>'multitext',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             
             'comment'=>array(
                'name'=>'备注',
                'type'=>'multitext',
                'value'=>"",
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
       
    
    



    
    
    
    
    



