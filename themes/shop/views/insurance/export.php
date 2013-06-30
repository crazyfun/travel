<?php  $attributeLabels=$model->attributeLabels();
       unset($attributeLabels['id']);
       unset($attributeLabels['station_id']);
?>
<div id="page_content">
    <div class="show_right_content">
    <!--编辑框-->	
    	<div class="edit_content">
    		<?php 
    		  $form=$this->beginWidget('EActiveForm', array('id'=>'','action'=>"",'enableAjaxValidation'=>false,'htmlOptions'=>array('enctype'=>'multipart/form-data')));//'enctype'=>'multipart/form-data');
        ?>
           <div class="operate_result"><?php $this->widget("FlashInfo");?></div>
           
           <div class="content_title">配置信息</div>
           <div class="content_inline"><div class="content_name">导出字段:</div><div class="content_content"> 
                <?php echo EHtml::createCheckbox("attributes","",$attributeLabels,array('class'=>'export_rules')); ?>
           	</div>
           	<div class="content_error">
                <?php echo $errors['attributes'];?>
           	</div>
           </div>
	         
	         <div class="content_button"><input type="submit" class="input_submit" value="确定" name="button_ok"/><input type="reset" class="input_cancel" value="取消" name="button_reset"/></div>
	   
    	<?php $this->endWidget(); ?>
    	</div>
    	 <!--编辑框end-->	
    </div>
</div>
    
    



    
    
    
    
    



