<?php 
    
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'地接社',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到地接社',
               'value'=>$this->createUrl("index",array()),
             ),
             array(
               'name'=>'新增地接社',
               'value'=>$this->createUrl("add",array())
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
             'name'=>array(
               'name'=>'地接社名称',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
               
               
             ),
             
             'type'=>array(
               'name'=>'地接社类型',
               'type'=>'select',//搜索框的类型
               'value'=>CV::$dijieshe_type,
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
             
             
             'qq'=>array(
                'name'=>'QQ',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             
             'msn'=>array(
                'name'=>'MSN',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             
             'email'=>array(
                'name'=>'Email',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             
             
             'tele_phone'=>array(
                'name'=>'座机',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             
             'fax'=>array(
                'name'=>'传真',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             
             
             'address'=>array(
                'name'=>'地址',
                'type'=>'textarea',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             
             
             'bank_username'=>array(
                'name'=>'开户人姓名',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             
             
             'bank_name'=>array(
                'name'=>'开户行',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             
             'bank_account'=>array(
                'name'=>'开户帐号',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             'best'=>array(
                'name'=>'优势',
                'type'=>'textarea',
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
       
    
    



    
    
    
    
    



