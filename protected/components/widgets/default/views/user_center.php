		  			 <div class="c_user_center">
		  			 	  <div class="c_user_title"></div>
		  			 	  <div class="c_user_desc">
		  			 	  	<div class="c_user_dl">
		  			 	  		 <div class="ibox">
		  			 	  		 	  <img src="<?php echo UC_API; ?>/avatar.php?uid=<?php echo $user->id ;?>&size=middle&rand=<?php echo time();?>" id="avatar" />
		  			 	  		 	</div>
		  			 	    </div>
		  			 	    
		  			 	    <div class="c_user_dr">
		  			 	    	 <div class="c_user_item"><span class="c_item_name">用户:</span><span class="c_item_content"><?php echo $user->user_login;?></span></div>
		  			 	    	 <div class="c_user_item"><span class="c_item_name">姓名:</span><span class="c_item_content"><?php echo $user->real_name;?></span></div>
		  			 	    	 <div class="c_user_item"><span class="c_item_name">性别:</span><span class="c_item_content"><?php echo CV::$sex[$user->genter];?></span></div>
		  			 	    	 	<div class="c_user_item"><div class="c_user_profile"><a title="<?php echo $user->user_login;?>" href="<?php echo $this->controller->createUrl("/user/index");?>">个人中心</a>&nbsp;<a href="<?php echo $this->controller->createUrl("/login/login/logout");?>">登出</a></div></div>
		  			 	    </div>
		  			 	  </div>
		  			 	  <div class="clear_both"></div>
		  			 	  
		  			 </div>