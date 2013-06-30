<?php 
       $this->widget('AddItems', array( 
          'model'=>$model,
          'name'=>"酒店",
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到酒店管理',
               'value'=>$this->createUrl("index",array()),
             ),
             array(
               'name'=>'新增酒店',
               'value'=>$this->createUrl("add",array())
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
             'hotel_name'=>array(
               'name'=>'酒店名称',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'hotel_level'=>array(
               'name'=>'星级酒店',
               'type'=>'select',//搜索框的类型
               'value'=>CV::$hotel_level,
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             
             
             'hotel_img'=>array(
               'name'=>'酒店图片',
               'type'=>'file',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'hotel_address'=>array(
               'name'=>'酒店地址',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'hotel_contacter'=>array(
                'name'=>'联系人',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
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
             'market_price'=>array(
                'name'=>'挂牌价',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             'sanke_price'=>array(
                'name'=>'散客价',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             'tuandui_price'=>array(
                'name'=>'团队价',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             'hotel_desc'=>array(
                'name'=>'酒店描述',
                'type'=>'multitext',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
            
             'hotel_comment'=>array(
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
       
    
    



    
    
    
    
    



