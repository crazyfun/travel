<?php 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到投诉',
               'value'=>$this->createUrl("tousu",array('relation_id'=>$relation_id)),
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
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
       
    
    



    
    
    
    
    



