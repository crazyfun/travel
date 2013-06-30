<?php 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'餐厅',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到餐厅管理',
               'value'=>$this->createUrl("index",array()),
             ),
             array(
               'name'=>'新增餐厅',
               'value'=>$this->createUrl("add",array())
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
             'restaurant_name'=>array(
               'name'=>'餐厅名称',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'restaurant_img'=>array(
               'name'=>'餐厅图片',
               'type'=>'file',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'environment'=>array(
               'name'=>'环境',
               'type'=>'select',//搜索框的类型
               'value'=>CV::$environment,
               'htmlOptions'=>array(),
               'desc'=>''
             ),
            
             'commission'=>array(
                'name'=>'佣金',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             'contacter'=>array(
               'name'=>'联系人',
               'type'=>'text',//搜索框的类型
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
             ),
             
             
              'fax'=>array(
                'name'=>'传真',
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
             'address'=>array(
                'name'=>'联系地址',
                'type'=>'text',
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
       
    
    



    
    
    
    
    



