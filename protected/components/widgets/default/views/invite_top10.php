           <div class="leftbox">
		  			 	  <div class="leftbox_title"><div class="leftbox_title_name">邀请Top10</div></div>
		  			 	  <div class="leftul_content">
		  			 	  	  <ul>
		  			 	  	  	   <?php foreach($invite_datas as $key => $value){ ?>
		  			 	  	  	   
		  			 	  	  	   <li class="top<?php echo $key+1;?>"><div><?php echo $value->User->user_login;?></div></li>
		  			 	  	  	  <?php } ?>
                              	
                              
                              </ul>
		  			 	  </div>
		  			 </div>