<?php 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'车队',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到车队管理',
               'value'=>$this->createUrl("index",array()),
             ),
             array(
               'name'=>'新增车队',
               'value'=>$this->createUrl("add",array())
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
             'motorcade_name'=>array(
               'name'=>'车队名称',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'motorcade_contacter'=>array(
                'name'=>'车队联系人',
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
             ),
             
             'motorcade_fax'=>array(
                'name'=>'传真',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             
             'motorcade_qq'=>array(
                'name'=>'Qq',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             'motorcade_msn'=>array(
                'name'=>'Msn',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
           
             'motorcade_comment'=>array(
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
       
    
    



    
    
    
    
    



