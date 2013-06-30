<?php 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'景区',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到景区管理',
               'value'=>$this->createUrl("index",array()),
             ),
             array(
               'name'=>'新增景区',
               'value'=>$this->createUrl("add",array())
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
             'sights_name'=>array(
               'name'=>'景区',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'sights_address'=>array(
                'name'=>'地址',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'market_price'=>array(
                'name'=>'挂牌价',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'sanke_price'=>array(
                'name'=>'散客价',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
              'tuandui_price'=>array(
                'name'=>'团队价',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'contacter'=>array(
                'name'=>'联系人',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),

             'cell_phone'=>array(
                'name'=>'联系电话',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             
             'tele_phone'=>array(
                'name'=>'座机',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'fax'=>array(
                'name'=>'传真',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             'email'=>array(
                'name'=>'Email',
                'type'=>'text',
                'value'=>'',
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
             'sights_desc'=>array(
                'name'=>'景区描述',
                'type'=>'multitext',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             'sights_comment'=>array(
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
       
    
    



    
    
    
    
    



