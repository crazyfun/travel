<?php 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'投诉',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到投诉',
               'value'=>$this->createUrl("tousu",array('relation_id'=>$relation_id)),
             ),
              array(
               'name'=>'新增投诉',
               'value'=>$this->createUrl("addtousu",array('relation_id'=>$relation_id))
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
             'contacter'=>array(
               'name'=>'投诉人',
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
             
             'message'=>array(
                'name'=>'投诉内容',
                'type'=>'textarea',
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             
             'status'=>array(
                'name'=>'处理状态',
                'type'=>'select',
                'value'=>CV::$operate,
                'htmlOptions'=>array(),
             ),
             
             'operate_content'=>array(
                'name'=>'处理内容',
                'type'=>'textarea',
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
       
    
    



    
    
    
    
    



