
            	<div class="page-right-top">个人资料</div>
                <div class="right_tab_con">
                	<div class="flash_info"><?php $this->widget("FlashInfo");?></div>
                	<div class="input_line"><div class="input_name"><span class="input_required"></span>用户名:</div><div class="input_content"><?php echo $model->user_login;?></div><div class="content_error"></div><div class="input_tip"></div></div>
									<div class="input_line"><div class="input_name"><span class="input_required"></span>用户邮箱:</div><div class="input_content"><?php echo $model->user_email;?><a class="sure_bt_link" href="<?php echo $this->createUrl("user/editemail");?>">修改</a></div><div class="content_error"></div><div class="input_tip"></div></div>
									<div class="input_line"><div class="input_name"><span class="input_required"></span>用户头像:</div><div class="input_content"><img src="<?php echo UC_API; ?>/avatar.php?uid=<?php echo $model->id ;?>&size=small&rand=<?php echo time();?>" id="avatar" /></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>真实姓名:</div><div class="input_content"><?php echo $model->real_name;?></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>抵用劵:</div><div class="input_content"><?php echo $model->conpon;?><a class="sure_bt_link" href="<?php echo $this->createUrl("user/pay");?>">在线充值</a></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>性别:</div><div class="input_content"><?php echo CV::$sex[$model->genter];?></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>生日:</div><div class="input_content"><?php echo $model->birthday;?></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>手机号码:</div><div class="input_content"><?php echo $model->cell_phone;?></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>身份证号码:</div><div class="input_content"><?php echo $model->code;?></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>地址:</div><div class="input_content"><?php echo $model->address;?></div><div class="content_error"></div><div class="input_tip"></div></div>
            	</div>
            	
            