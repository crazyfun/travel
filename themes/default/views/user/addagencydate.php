     
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
									<div class="input_line"><div class="input_name"><span class="input_required">*</span>开始时间:</div><div class="input_content"><?php echo $form->createDate($model,"start_date",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"start_date");?></div><div class="input_tip"></div></div>
									<div class="input_line"><div class="input_name"><span class="input_required">*</span>结束时间:</div><div class="input_content"><?php echo $form->createDate($model,"end_date",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"end_date");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required">*</span>线路:</div><div class="input_content"><?php echo $form->createText($model,"line",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"line");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required">*</span>游客人数:</div><div class="input_content"><?php echo $form->createNumber($model,"numbers",array('class'=>'text-put'));?>人</div><div class="content_error"><?php echo $form->error($model,"numbers");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required">*</span>接团地址:</div><div class="input_content"><?php echo $form->createText($model,"address",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"address");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required">*</span>接团时间:</div><div class="input_content"><?php echo $form->createDate($model,"date",array('dateFmt'=>'yyyy-MM-dd HH:mm:ss','class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"date");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required">*</span>线路景点:</div><div class="input_content"><?php echo $form->createTextarea($model,"attractions",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"attractions");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required">*</span>导游费用:</div><div class="input_content"><?php echo $form->createNumber($model,"cost",array('class'=>'text-put'));?>元/天</div><div class="content_error"><?php echo $form->error($model,"cost");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required">*</span>其他费用:</div><div class="input_content"><?php echo $form->createTextarea($model,"subsidies",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"subsidies");?></div><div class="input_tip"></div></div>
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