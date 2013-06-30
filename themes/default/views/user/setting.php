
            <div class="page-right-top">个人设置</div>
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
						<div class="input_line"><div class="input_name">邮箱:</div><div class="input_content"><?php echo $user_data->user_email;?><a class="sure_bt_link" href="<?php echo $this->createUrl("user/editemail");?>">修改</a></div><div class="content_error"></div><div class="input_tip"></div></div>
						<div class="input_line"><div class="input_name">是否发送邮件:</div><div class="input_content"><?php echo $form->createRadio($model,"email",array('1'=>'关闭','2'=>'开启'),array('separator'=>'&nbsp;'));?></div><div class="content_error"><?php echo $form->error($model,"email");?></div><div class="input_tip"></div></div>
						<div class="input_line"><div class="input_name">手机号码:</div><div class="input_content"><?php echo $user_data->cell_phone;?><a class="sure_bt_link" href="<?php echo $this->createUrl("user/editprofile");?>">修改</a></div><div class="content_error"></div><div class="input_tip"></div></div>
						<div class="input_line"><div class="input_name">是否发送短信:</div><div class="input_content"><?php echo $form->createRadio($model,"message",array('1'=>'关闭','2'=>'开启'),array('separator'=>'&nbsp;'));?></div><div class="content_error"><?php echo $form->error($model,"message");?></div><div class="input_tip">注: 每条短信扣除<?php echo $sfc_message_consume;?>抵用劵</div></div>
            <div class="input_line"><div class="input_button"><?php echo CHtml::submitButton("修改",array('class'=>'save_bt'));?><?php echo CHtml::resetButton("重置",array('class'=>'save_bt'));?></div></div>
               		<?php $this->endWidget(); ?>
    
            	</div>