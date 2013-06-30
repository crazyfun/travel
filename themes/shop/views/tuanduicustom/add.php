<?php 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'团队客户',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到团队客户',
               'value'=>$this->createUrl("index",array()),
             ),
             array(
               'name'=>'新增团队客户',
               'value'=>$this->createUrl("add",array())
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
             'company'=>array(
               'name'=>'公司名称',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             
             'name'=>array(
               'name'=>'客户名称',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'sex'=>array(
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
       
    
    



    
    
    
    
    



