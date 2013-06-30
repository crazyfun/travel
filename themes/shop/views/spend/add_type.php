<?php 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'支出类型',
          //用户操作
          'user_operate'=>array(  
          ),
          //增加的内容字段
          'add_datas'=>array(
             'name'=>array(
               'name'=>'类型名称',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>'',
             ),
          ), 
          //最下面操作按钮
          'operates'=>array(
             array(
               
             ),
          ),
            
       ));
       
?>
<script language="javascript">
	
	jQuery(function($) {
     var add_flag="<?= $add_flag ?>";
     if(add_flag){
       self.parent.location.reload();	
     }
  }); 
</script>

       
