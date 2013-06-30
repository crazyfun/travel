          <div class="page-right-top">修改邮箱</div>
                <div class="right_tab_con">
                	 <?php 
    		 							$form=$this->beginWidget('EActiveForm', array(
	        								'id'=>'',
          								'action'=>"",
	        								'enableAjaxValidation'=>false,
	        								'htmlOptions'=>array('id'=>'registe_from'),
         							));
         							echo $form->createHidden($model,"id",array());
        					?>
                	<div class="flash_info"><?php $this->widget("FlashInfo");?></div>
									<div class="input_line"><div class="input_name"><span class="input_required"></span>邮箱:</div><div class="input_content"><?php echo $user_email;?></div><div class="content_error"></div><div class="input_tip"></div></div>
									<div class="input_line"><div class="input_name"><span class="input_required">*</span>新邮箱:</div><div class="input_content"><?php echo $form->createText($model,"user_email",array('value'=>'','class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"user_email");?></div><div class="input_tip"></div></div>
                  <div class="input_line"><div class="input_button"><?php echo CHtml::submitButton("修改",array('class'=>'save_bt'));?><?php echo CHtml::resetButton("重置",array('class'=>'save_bt'));?></div></div>
               		<?php $this->endWidget(); ?>
    
            	</div>

    
    



    
    
    
    
    



