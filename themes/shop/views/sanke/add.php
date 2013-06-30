<?php 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'散客订单',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到散客订单',
               'value'=>$this->createUrl("index",array()),
               'class'=>"back_button"
             ),
             array(
               'name'=>'新增散客订单',
               'value'=>$this->createUrl("add",array()),
               'class'=>"add_button"
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
             'name'=>array(
               'name'=>'联系人',
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
             
             'line'=>array(
                'name'=>'出游线路',
                'type'=>'auto',
                'value'=>$model->line,
                'htmlOptions'=>array('serviceUrl'=>$this->createUrl("main/line")),
             ),
             'dijieshe'=>array(
                'name'=>'地接社',
                'type'=>'auto',
                'value'=>$model->Dijieshe->name,
                'htmlOptions'=>array('serviceUrl'=>$this->createUrl("main/dijieshe")),
             ),
             'date'=>array(
                'name'=>'出游时间',
                'type'=>'date',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             'on_car'=>array(
                'name'=>'上车地点',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             
             'numbers'=>array(
                'name'=>'成人数',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             'market_price'=>array(
                'name'=>'成人价格',
                'type'=>'text',
                'value'=>"",
                'tip'=>'元/人',
                'htmlOptions'=>array(),
             ),
             
             'settlement_price'=>array(
                'name'=>'成人结算价格',
                'type'=>'text',
                'value'=>"",
                'tip'=>'元/人',
                'htmlOptions'=>array(),
             ),
             
             'children'=>array(
                'name'=>'儿童数',
                'type'=>'text',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
             
             'child_price'=>array(
                'name'=>'儿童价格',
                'type'=>'text',
                'value'=>"",
                'tip'=>'元/人',
                'htmlOptions'=>array(),
             ),
             
             'child_settlement_price'=>array(
                'name'=>'儿童结算价格',
                'type'=>'text',
                'value'=>"",
                'tip'=>'元/人',
                'htmlOptions'=>array(),
             ),
             
             'collection'=>array(
                'name'=>'代收款',
                'type'=>'text',
                'value'=>"",
                'tip'=>'元',
                'htmlOptions'=>array(),
             ),
             'profit'=>array(
                'name'=>'总利润',
                'type'=>'text',
                'value'=>"",
                'tip'=>'元',
                'htmlOptions'=>array('readonly'=>'readonly','style'=>'background-color:#e5e5e5;'),
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
       
    
    



    
    
    
    
    



