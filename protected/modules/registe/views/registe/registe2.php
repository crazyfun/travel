
    	<?php echo $ucsynlogin;?>
    	<?php 
    	    $cssPath=$this->get_css_path(); 
    		  $form=$this->beginWidget('EActiveForm', array(
	        'id'=>'',
          'action'=>$this->createUrl("/registe/registe/registe2"),
	        'enableAjaxValidation'=>false,
	        'htmlOptions'=>array('id'=>'registe_from'),
         ));
         echo $form->createHidden($model,"id",array());
         $errors=$model->getErrors();
         $errors_class=array();
         foreach($errors as $key => $value){
         	 if(!empty($value)){
         	 	 $errors_class[$key]="validate_error";
         	 }
         }
        ?>
      
    	<div class="register_con">
    	<div class="my_page_top"></div>
        <div class="my_page_mid">
       	  <div class="register_top"><img src="<?php echo $cssPath;?>/images/re_step2.gif" width="949px" height="35px"/></div>
            <div class="re_tb_div">
            	  <div>
                	<table cellpadding="0" cellspacing="0" width="100%">
                    	<tr><td width="26%" height="40" align="right">设置头像：</td><td><?php echo $uc_avatarflash; ?></td></tr>
                  </table>
                </div>
            	  <table width="100%" cellpadding="0" cellspacing="0">
                    <tr><td height="40" align="right" width="250">性别：</td><td><?php echo $form->createSelect($model,"genter",CV::$sex,array());?></td><td><div class="<?php echo $errors_class['genter'];?>"><?php echo $form->error($model,"genter");?></div></td></tr>
                    <tr><td height="40" align="right">生日：</td><td width="24%"><?php echo $form->createDate($model,"birthday",array('class'=>'txt'));?></td><td><div class="<?php echo $errors_class['birthday'];?>"><?php echo $form->error($model,"birthday");?></div></td></tr>
                    <tr><td height="40" align="right">手机号码：</td><td><?php echo $form->createText($model,"cell_phone",array('class'=>'txt'));?></td><td><div class="<?php echo $errors_class['cell_phone'];?>"><?php echo $form->error($model,"cell_phone");?></div></td></tr>
                    <tr><td height="40" align="right">身份证号码：</td><td><?php echo $form->createText($model,"code",array('class'=>'txt'));?></td><td><div class="<?php echo $errors_class['code'];?>"><?php echo $form->error($model,"code");?></div></td></tr>
					          <tr><td height="40" align="right">地址：</td><td><?php echo $form->createText($model,"address",array('class'=>'txt'));?></td><td><div class="<?php echo $errors_class['address'];?>"><?php echo $form->error($model,"address");?></div></td></tr>
                	  <tr><td height="80">&nbsp;</td><td colspan="2" valign="middle"><input type="submit" value="" class="re_savebt">&nbsp;&nbsp;<a href="<?php echo $this->createUrl("/registe/registe/registe3") ;?>" class="next_step">跳过此步直接进入下一步<span class="span_arr">››</span></a></td></tr>
                	  <tr><td colspan="3" height="30">&nbsp;</td></tr>
                </table>
        	</div>
        </div>
        <div class="my_page_bot"></div>
    </div>
    <?php $this->endWidget(); ?>

    
    



    
    
    
    
    



