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
                    <tr><td height="40" width="420" align="right"><span class="required_text">*</span>新密码：</td><td align="left" width="150"><?php echo $form->createPassword($model,"new_password",array('class'=>"input_txt"));?></td><td><div class="content_error"><?php echo $form->error($model,"new_password");?></div></td></tr>
                    <tr><td height="40" align="right"><span class="required_text">*</span>确认新密码：</td><td align="left"><?php echo $form->createPassword($model,"con_new_password",array('class'=>"input_txt"));?></td><td><div class="content_error"><?php echo $form->error($model,"con_new_password");?></div></td></tr>
                	 <tr><td height="70">&nbsp;</td><td colspan="2" valign="middle"><input type="submit" value="确定" class="save_bt"></td></tr>
                </table>
       <?php $this->endWidget(); ?>
       
       <script language="javascript">
       	   jQuery(function(){
       	   	   var validate_flag="<?= $validate_flag ?>";
       	   	   if(validate_flag){
       	   	   	 window.setTimeout(function(){window.location.href="/login/login";},2000);
       	   	   }
       	   	
       	  });
       </script>