   <div class="right_tab_con" style="width:620px;margin:20px auto;">
                	 <?php 
    		 							$form=$this->beginWidget('EActiveForm', array(
	        								'id'=>'',
          								'action'=>"",
	        								'enableAjaxValidation'=>false,
	        								'htmlOptions'=>array('id'=>'registe_from','enctype'=>'multipart/form-data'),
         							));
         							echo $form->createHidden($model,"id",array());
        					?>
                	<div class="flash_info"><?php $this->widget("FlashInfo");?></div>
									<div class="input_line"><div class="input_name"><span class="input_required"></span>开始时间:</div><div class="input_content"><?php echo $form->createDate($model,"start_date",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"start_date");?></div><div class="input_tip"></div></div>
									<div class="input_line"><div class="input_name"><span class="input_required"></span>结束时间:</div><div class="input_content"><?php echo $form->createDate($model,"end_date",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"end_date");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>备注:</div><div class="input_content"><?php echo $form->createTextarea($model,"comment",array('width'=>'200px','height'=>'80px'));?></div><div class="content_error"><?php echo $form->error($model,"comment");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>空闲状态:</div><div class="input_content"><?php echo $form->createSelect($model,"status",CV::$guidedate_status,array());?></div><div class="content_error"><?php echo $form->error($model,"status");?></div><div class="input_tip"></div></div>
                  <div class="input_line"><div class="input_button"><?php echo CHtml::submitButton("提交",array('class'=>'save_bt'));?><?php echo CHtml::resetButton("重置",array('class'=>'save_bt'));?></div></div>
               		<?php $this->endWidget(); ?>
    
            	</div>
    	<script language="javascript">
    		jQuery(function(){
    			var is_reload="<?= $is_reload ?>";
    			if(is_reload){
    				self.parent.location.reload();
    			}
    	  });
    	</script>
