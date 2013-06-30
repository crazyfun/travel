<?php 
  $cssPath=$this->controller->get_css_path();
  $station_data=$this->controller->station_data;
?>
<body class="admin_login">
	<div class="main main1">
  <div class="message">
    <h2><strong>酒店商家管理后台</strong></h2>
    <div class="message1">
      <div class="left"><img src="<?php echo $cssPath;?>/images/img_01.gif" /></div>
      <div class="right">
        <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableAjaxValidation'=>true,
        )); ?>
          <table class="reg">
            <tbody>
              <tr>
                <td width="60">用户名：</td>
                <td width="190"><?php echo $form->textField($model,"user_email",array("class"=>"w_mz"));?></td>
                <td width="120" class="login_error"><?php echo $model->getError("user_email"); ?></td>
              </tr>
              <tr>
                <td>密码：</td>
                <td><?php echo $form->passwordField($model,"user_password",array("class"=>"w_mz"));?></td>
                <td class="login_error"><?php echo $model->getError("user_password"); ?></td>
              </tr>
             
              <tr>
                <td>验证码：</td>
                <td><?php echo $form->textField($model,"imagecode",array("class"=>"w_mz"));?></td>
                <td><a onclick="document.getElementById('__code__').src = '<?php echo Yii::app()->homeUrl;?>/imagesecurity/code.php?id=' + ++ts; return false"><img id="__code__" src="<?php echo Yii::app()->homeUrl;?>/imagesecurity/code.php?id=$ts;?>" /></a></td>
              </tr>
              
          
              <tr>
                <td></td>
                <td><?php echo $form->checkBox($model,'rememberme',array('class'=>'content_checkbox'));?>
                  两周内不再登录</td>
                <td class="login_error"><?php echo $model->getError("imagecode"); ?></td>
              </tr>
              <tr>
                <td></td>
                <td><input class="login_image"  type="image" src="<?php echo $cssPath;?>/images/button3_01.gif" /></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        <?php $this->endWidget(); ?>
      </div>
     
    </div>
    <div class="copyright"> 
   
    </div>
     
  </div>
  
</div>

</body>
<script language="javascript">
	ts = "<?= $ts ?>";
</script>