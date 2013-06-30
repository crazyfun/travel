
    	
            <div class="page-right-top">修改资料</div>
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
                	<div class="input_line"><div class="input_name"><span class="input_required"></span>头像:</div><div class="input_content"><?php echo $uc_avatarflash; ?></div><div class="content_error"></div><div class="input_tip"></div></div>
									<div class="input_line"><div class="input_name"><span class="input_required"></span>真实姓名:</div><div class="input_content"><?php echo $form->createText($model,"real_name",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"real_name");?></div><div class="input_tip"></div></div>
									<div class="input_line"><div class="input_name"><span class="input_required"></span>性别:</div><div class="input_content"><?php echo $form->createSelect($model,"genter",CV::$sex,array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"genter");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>生日:</div><div class="input_content"><?php echo $form->createDate($model,"birthday",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"birthday");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>手机号码:</div><div class="input_content"><?php echo $form->createText($model,"cell_phone",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"cell_phone");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>身份证号码:</div><div class="input_content"><?php echo $form->createText($model,"code",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"code");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>地址:</div><div class="input_content"><?php echo $form->createText($model,"address",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"address");?></div><div class="input_tip"></div></div>
                  <div class="input_line"><div class="input_button"><?php echo CHtml::submitButton("修改",array('class'=>'save_bt'));?><?php echo CHtml::resetButton("重置",array('class'=>'save_bt'));?></div></div>
               		<?php $this->endWidget(); ?>
    
            	</div>