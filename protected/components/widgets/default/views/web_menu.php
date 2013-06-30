			<?php
			   $is_login=Util::check_user();
			?>
			<div class="left_menu">
		  	 	 	  <ul class="nav">
		  	 	 	  	<?php foreach($menus as $key => $value){
		  	 	 	  	   $name=$value['name'];
		  	 	 	  	   $url=$value['url'];
		  	 	 	  	   $is_visible=$value['is_visible'];
		  	 	 	  	   if(!$is_visible){
		  	 	 	  	   	 if($$is_login){
		  	 	 	  	?>
		  	 	 	  	     	<li><a target="<?php if($key=="bbs") echo "_blank";?>" class="<?php if($key==$this->controller->tag) echo 'nav_item_active';?>" href="<?php echo $url;?>"><span class="nav-span"><span><?php echo $name;?></span></span></a></li>
		  	 	 	  	<?php	
		  	 	 	  	   	}
		  	 	 	  	   }else{
		  	 	 	  	   	  
		  	 	 	  	?>
		  	 	 	  	   	  <li><a target="<?php if($key=="bbs") echo "_blank";?>" class="<?php if($key==$this->controller->tag) echo 'nav_item_active';?>" href="<?php echo $url;?>"><span class="nav-span"><span><?php echo $name;?></span></span></a></li>
		  	 	 	  	<?php  
		  	 	 	  	  }
		  	 	 	  	 }
		  	 	 	  	?>
		  	 	 	  
		  	 	 	  </ul>
		  	 	 	 </div>
		  	 	 	 
		  	 	 	 <div class="right_menu">
		  	 	 	 	  <ul class="operate_nav">
		  	 	 	 	  	<?php if(!$is_login){?>
		  	 	 	 	  	<li class="pop_login_item">
		  	 	 	 	  		  登录
		  	 	 	 	  		  <div class="pop_nav_login">
		  	 	 	 	  		  		<?php 
		  	 	 	 	  		  		 $user=new User();
		  	 	 	 	  		  		 $form=$this->beginWidget('EActiveForm', array(
        											'id'=>'login-form',
        											'action'=>$this->controller->createUrl("/login/login/homelogin"),
        											'enableAjaxValidation'=>true,
        											'htmlOptions'=>array('methd'=>'post'),
   												)); ?>
		  	 	 	 	  		  	 <div class="enter_item">
		  	 	 	 	  		  	 	  <div class="enter_name">
		  	 	 	 	  		  	 	  	账号：
		  	 	 	 	  		  	 	  </div>
		  	 	 	 	  		  	 	  <div class="enter_content">
		  	 	 	 	  		  	 	  	<?php echo EHtml::createText("user_login",'',array('class'=>'text_short'));?>
		  	 	 	 	  		  	 	 
		  	 	 	 	  		  	 	  </div>
		  	 	 	 	  		  	 	</div>
		  	 	 	 	  		  	 	
		  	 	 	 	            <div class="enter_item">
		  	 	 	 	  		  	 	  <div class="enter_name">
		  	 	 	 	  		  	 	  	密码：
		  	 	 	 	  		  	 	  </div>
		  	 	 	 	  		  	 	  <div class="enter_content">
		  	 	 	 	  		  	 	  	 <?php echo EHtml::createPassword("user_password",'',array('class'=>'text_short'));?>
		  	 	 	 	  		  	 	  </div>
		  	 	 	 	  		  	 	</div>
		  	 	 	 	  		  	 	<div class="clear_both"></div>
		  	 	 	 	  		  	 	<div class="enter_item">
		  	 	 	 	  		  	 		 <a href="<?php echo $this->controller->createUrl("/site/forgotpassword");?>">忘记密码?</a>&nbsp;&nbsp;<?php echo EHtml::createCheck('rememberme','',array());?>记住密码&nbsp;&nbsp;<input type="submit" class="pop_submit" value="" name="login"/>
		  	 	 	 	  		  	 	</div>
		  	 	 	 	  		  	 	<?php $this->endWidget(); ?>
		  	 	 	 	  		  </div>
		  	 	 	 	  	</li>
		  	 	 	  		<li class="operate_nav_item"><a href="<?php echo $this->controller->createUrl("/registe/registe/index");?>">免费注册</a></li>
		  	 	 	  		<?php } ?>
		  	 	 	  		<?php if($is_login){?>
		  	 	 	  		<li class="pop_user_item">
		  	 	 	  			会员中心
		  	 	 	  			<div class="pop_nav_user">
		  	 	 	  				  <?php 
		  	 	 	  				     $user_type=UserType::model();
		  	 	 	  				     $user_type_vaue=$user_type->get_user_type(Yii::app()->user->id);
		  	 	 	  				     if($user_type_vaue==2){
		  	 	 	  				     ?>
		  	 	 	  				       <div class="pop_user_operate"><a href="<?php echo $this->controller->createUrl("/user/gscheduler");?>">行程设置</a></div>
		  	 	 	  				       <div class="pop_user_operate"><a href="<?php echo $this->controller->createUrl("/user/mygscheduler");?>">我的预定</a></div>
		  	 	 	  				   <?php }
		  	 	 	  				      if($user_type_vaue==3){
		  	 	 	  				   ?>
		  	 	 	  				       <div class="pop_user_operate"><a href="<?php echo $this->controller->createUrl("/user/myascheduler");?>">线路计调</a></div>
		  	 	 	  				       <div class="pop_user_operate"><a href="<?php echo $this->controller->createUrl("/user/ascheduler");?>">我的预定</a></div>
		  	 	 	  				   <?php } ?>
		  	 	 	  				  <div class="pop_user_operate"><a href="<?php echo $this->controller->createUrl("/user/index");?>">个人资料</a></div>
		  	 	 	  			
		  	 	 	  			</div>
		  	 	 	  		</li>
		  	 	 	  <?php } ?>
		 
		  	 	 	 	  </ul>
		  	 	 	 </div>
		  	 	 	 
		  	 	 	 <script language="javascript">
		  	 	 	 	  jQuery(function(){
   	  						jQuery("ul.nav li").find("a").hover(
									   function(){ jQuery(this).addClass("nav_item_hover")},
										 function(){ jQuery(this).removeClass("nav_item_hover")}
									);
									toggleitem({'source':'pop_login_item','target':'pop_nav_login','type':'2','effect':'3','effect_time':'fast'});
									toggleitem({'source':'pop_user_item','target':'pop_nav_user','type':'2','effect':'3','effect_time':'fast'});
								})
								
								function show_search(){
									var header_search=jQuery("#header_search");
									if(header_search.css("display")=="block"){
										header_search.fadeOut("fast");
									}else{
										header_search.fadeIn("fast");
									}
								}
		  	 	 	 </script>