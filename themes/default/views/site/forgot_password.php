          <?php 
					$cssPath=$this->get_css_path(); 
    		  $form=$this->beginWidget('EActiveForm', array(
	        'id'=>'',
          'action'=>"",
	        'enableAjaxValidation'=>false,
	        'htmlOptions'=>array('id'=>'registe_from'),
         ));
        
				?>
               <table width="100%" cellpadding="0" cellspacing="0">
               	    <tr><td colspan="3" align="center"><?php $this->widget("FlashInfo");?></td></tr>
                    <tr><td height="40" width="420" align="right"><span class="required_text">*</span>用户名：</td><td align="left" width="150"><?php echo $form->createText($model,"user_login",array('class'=>"txt"));?></td><td><div class="content_error"><?php echo $form->error($model,"user_login");?></div></td></tr>
                    <tr><td  height="40" align="right"><span class="required_text">*</span>用户邮箱：</td><td align="left" width="200"><?php echo $form->createText($model,"user_email",array('class'=>"txt"));?></td><td><div class="content_error"><?php echo $form->error($model,"user_email");?></div></td></tr>
                	 <tr><td height="70">&nbsp;</td><td colspan="2" valign="middle"><input type="submit" value="确定" class="save_bt"></td></tr>
                </table>
       <?php $this->endWidget(); ?>