<?php 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'团队订单客户',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到团队订单客户',
               'value'=>$this->createUrl("custom",array('relation_id'=>$relation_id)),
             ),
             
              array(
               'name'=>'新增团队订单客户',
               'value'=>$this->createUrl("addcustom",array('relation_id'=>$relation_id))
             ),
             
          ),
          //增加的内容字段
          'add_datas'=>array(
             'name'=>array(
               'name'=>'姓名',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'cell_phone'=>array(
                'name'=>'联系方式',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'sex'=>array(
                'name'=>'性别',
                'type'=>'select',
                'value'=>CV::$sex,
                'htmlOptions'=>array(),
             ),
             
             'email'=>array(
                'name'=>'邮箱',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             	 
              'code'=>array(
                'name'=>'身份证号码',
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
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             'address'=>array(
                'name'=>'居住地址',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             'supervisor'=>array(
                'name'=>'监护人',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             'comment'=>array(
                'name'=>'备注',
                'type'=>'multitext',
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
       
    
    



    
    
    
    
    



