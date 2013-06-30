<?php 
	   $attributeLabels=$model->attributeLabels();
       unset($attributeLabels['station_id']);
       $this->widget('ViewItems', array( 
          'model'=>$model, 
          //增加的内容字段
          'view_datas'=>$attributeLabels, 
       ));
?>
      