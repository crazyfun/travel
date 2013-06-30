   <?php 
					$cssPath=$this->get_css_path(); 
					Yii::app()->clientScript->registerCssFile("/js/jbox/Skins2/Green/jbox.css");
					Yii::app()->clientScript->registerScriptFile('/js/jbox/jquery.jBox-2.3.min.js');
					Yii::app()->clientScript->registerScriptFile('/js/jbox/i18n/jquery.jBox-zh-CN.js');
    		  $form=$this->beginWidget('EActiveForm', array(
	        'id'=>'',
          'action'=>"",
	        'enableAjaxValidation'=>false,
	        'htmlOptions'=>array('id'=>'registe_from'),
         ));
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
       	  <div class="register_top"><img src="<?php echo $cssPath;?>/images/re_step1.gif" width="949px" height="35px"/></div>
            <div class="re_tb_div">
            	<table width="100%" cellpadding="0" cellspacing="0">
            		<tr><td width="26%" height="40" align="right"><span class="required_text">*</span>用户邮箱：</td><td width="24%"><?php echo $form->createText($model,"user_email",array('class'=>"txt"));?></td><td width="50%"><div id="user_email_tip" class="<?php echo $errors_class['user_email'];?>"><?php echo $form->error($model,"user_email");?></div></td></tr>
                    <tr><td height="40" align="right"><span class="required_text">*</span>用户名：</td><td><?php echo $form->createText($model,"user_login",array('class'=>"txt"));?></td><td><div id="user_login_tip" class="<?php echo $errors_class['user_login'];?>"><?php echo $form->error($model,"user_login");?></div></td></tr>
                    <tr>
                   	  <td height="40" align="right"><span class="required_text">*</span>用户密码：</td>
                      <td>
       	  				     <div class="re_qd_con">
                        	<?php echo $form->createPassword($model,"user_password",array('class'=>"txt"));?>
                        </div>
                      </td>
                      <td><div id="user_password_tip" class="<?php echo $errors_class['user_password'];?>"><?php echo $form->error($model,"user_password");?></div></td>
                    </tr>
                    <tr><td height="40" align="right"><span class="required_text">*</span>确认密码：</td><td><?php echo $form->createPassword($model,"var_user_password",array('class'=>"txt"));?></td><td><div id="var_user_password_tip" class="<?php echo $errors_class['var_user_password'];?>"><?php echo $form->error($model,"var_user_password");?></div></td></tr>
                    <tr><td height="40" align="right"><span class="required_text">*</span>真实姓名：</td><td><?php echo $form->createText($model,"real_name",array('class'=>"txt"));?></td><td><div id="real_name_tip" class="<?php echo $errors_class['real_name'];?>"><?php echo $form->error($model,"real_name");?></div></td></tr>
                	  <tr>
                    	<td height="30" colspan="2" valign="bottom"><div class="re_clause"><?php echo $form->createCheck($model,"agreement",array());?>&nbsp;<span>我已经阅读并接受<a href="javascript:show_agree();">《立火旅行网服务条款》</a></span></div></td>				                    
                      <td><div id="user_agreement_tip" class="<?php echo $errors_class['agreement'];?>"><?php echo $form->error($model,"agreement");?></div></td>
                    </tr>
                	 <tr><td height="70">&nbsp;</td><td colspan="2" valign="middle"><input type="submit" value="" class="re_qrzcbt"></td></tr>
                	 <tr><td colspan="3" height="30">&nbsp;</td></tr>
                </table>
        	</div>
        </div>
        <div class="my_page_bot"></div>
    </div>
   
    <?php $this->endWidget(); ?>
    
    <script language="javascript">
    		 jQuery(function($) {

           var validate_obj=new validate([
              {
               'tip_id':'user_login_tip',
               'id':"User_user_login",//验证的ID
               'tip':true,//提示
               'tip_message':'请输入用户名',//提示内容
               'validate':
                 {
                 	'validate_type':'ajax',//验证类型
                 	'validate_url':"/registe/registe/validate/action/userlogin"//验证
                 	
                 }
               
              },
              {
               'tip_id':'user_password_tip',
               'id':"User_user_password",//验证的ID
               'tip':true,//提示
               'tip_message':'请输入密码',//提示内容
               'validate':
                 {
                 	'validate_type':'required',//验证类型
                 	'validate_message':'密码不能为空'//当验证类型是ajax不需要验证内容
                 }
               
              },
              
              {
               'tip_id':'var_user_password_tip',
               'id':"User_var_user_password",//验证的ID
               'tip':true,//提示
               'tip_message':'请输入确认密码',//提示内容
               'validate':
                 {
                 	'validate_type':'compare',//验证类型
                 	'compare_id':'User_user_password',
                 	'validate_message':'确认密码错误'//当验证类型是ajax不需要验证内容
                 }
               
              },
              

              {
               'tip_id':'user_email_tip',
               'id':"User_user_email",//验证的ID
               'tip':true,//提示
               'tip_message':'请输入邮箱',//提示内容
               'validate':
                 {
                 	'validate_type':'ajax',//验证类型
                 	'validate_url':"/registe/registe/validate/action/useremial"//验证
                 	
                 }
               
              },
              
               {
               'tip_id':'real_name_tip',
               'id':"User_real_name",//验证的ID
               'tip':true,//提示
               'tip_message':'请输入真实姓名',//提示内容
               'validate':
                 {
                 	'validate_type':'required',//验证类型
                 	'validate_message':'真实姓名不能为空'//当验证类型是ajax不需要验证内容
                 }
               
              }
  
           ]);
         }); 
         
         function show_agree(){
         	  jQuery.jBox("iframe:/registe/registe/agreement", {
   						 title: "会员协议",
    					 width: 800,
    					 height: 500,
    						buttons: { '关闭': true }
							});
         }

    	</script>
    



    
    
    
    
    



