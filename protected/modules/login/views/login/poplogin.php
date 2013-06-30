    <?php $cssPath=$this->get_css_path(); ?>
 
							<div class="pop_login">
								<?php $form=$this->beginWidget('EActiveForm', array(
        					'id'=>'login-form',
       						 'enableAjaxValidation'=>true,
   							)); ?>
								<table cellpadding="0" cellspacing="0" class="login_table">
									<tr><td><div class="prompt_se"><?php echo $model_errors; ?></div></td></tr>
									<tr><td><div class="usename"><span>用户名</span><?php echo $form->createText($model,"user_login",array());?></div></td></tr>
									<tr><td><div class="usename"><span>密&nbsp;&nbsp;码</span><?php echo $form->createPassword($model,"user_password",array());?></div></td></tr>
									<tr><td><div class="usename" style="float:left;"><span>验证码</span><?php echo $form->createText($model,"imagecode",array());?></div><span class="get_imagecode"><a onclick="document.getElementById('__code__').src = '<?php echo Yii::app()->homeUrl;?>/imagesecurity/code.php?id=' + ++ts; return false"><img id="__code__" src="<?php echo Yii::app()->homeUrl;?>/imagesecurity/code.php?id=<?php echo $ts; ?>" /></a></span></td></tr>
									<tr><td><div class="forget_w"><span><?php echo $form->createCheck($model,'rememberme',array());?>&nbsp;两周内不再登录</span></div></td></tr>
									<tr><td><div class="login_sub" style="border-bottom:none;"><?php echo CHtml::submitButton("",array());?></div></td></tr>
								</table> 
								<?php $this->endWidget(); ?> 
							</div>

    
        <script language="javascript">
					ts = "<?= $ts ?>";
					
				</script>