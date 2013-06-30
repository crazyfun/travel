							<?php $cssPath=$this->controller->get_css_path();?>
							<div class="leftbox">
		  			 	  <div class="leftbox_title"><div class="leftbox_title_name">最新酒店</div><div class="leftbox_title_more"><a href="<?php echo $this->controller->createUrl("/search/default/index",array('action'=>'restaurant','registe_sort'=>'DESC')); ?>">更多<span>››</span></a></div></div>
		  			 	  <div class="leftbox_content">
		  			 	  <?php foreach($travel_restaurant_datas as $key => $value){ ?>
		  			 	    <div class="leftbox_item">
		  			 	  	<div class="a_user_dl">
		  			 	  		 <div class="restaurant_sibox">
		  			 	  		 	  <p><?php if(!empty($value->restaurant_logo)){$themb_image=Util::rename_thumb_file('98','60','',$value->restaurant_logo);echo CHtml::image("/".$themb_image,$value->restaurant_name,array());}else{echo CHtml::image($cssPath."/images/logo_98_60.gif",$value->restaurant_name,array());}?></p>
		  			 	  		 	</div>
		  			 	    </div>
		  			 	    
		  			 	    <div class="a_user_dr">
		  			 	    	 <div class="a_user_item"><span class="a_item_name">名称:</span><span class="a_item_content"><?php echo $value->restaurant_name;?></span></div>
		  			 	    	 <div class="a_user_item"><span class="a_item_name">电话:</span><span class="a_item_content"><?php echo $value->restaurant_telephone;?></span></div>
		  			 	    	 <div class="a_user_item"><span class="restaurant_ordin"><a title="<?php echo $value->restaurant_name;?>" href="<?php echo $this->controller->createUrl("/restaurant/restaurant/detail",array('id'=>$value->id));?>">查看详情</a></span></div>
		  			 	    </div>
		  			 	   </div>
		  			 	  <?php } ?>

		  			 	  </div>
		  			</div>
		  			 
		  			 
		  			 