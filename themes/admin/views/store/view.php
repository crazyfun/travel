<?php 
	     $attributeLabels=$model->attributeLabels();
      
       $this->widget('ViewItems', array( 
          'model'=>$model, 
          //增加的内容字段
          'view_datas'=>$attributeLabels, 
       ));
?>
      