						<?php $cssPath=$this->controller->get_css_path();?>
						<div class="rightbox">
		  			 	  <div class="rightbox_title"><div class="rightbox_title_name">热门酒店</div><div class="rightbox_more"><a href="<?php echo $this->controller->createUrl("/search/default/index",array('action'=>'restaurant','views_sort'=>'DESC')); ?>">更多<span>››</span></a></div></div>
		  			 	  <div class="rihgtbox_content">
		  			 	  	<?php foreach($travel_restaurant_datas as $key => $value){ ?>
		  			 	  	<div class="rightbox_aitem">
		  			 	  		  <div class="restaurant_bibox">
		  			 	  		 	  <p><?php if(!empty($value->restaurant_logo)){$themb_image=Util::rename_thumb_file('160','98','',$value->restaurant_logo);echo CHtml::image("/".$themb_image,$value->restaurant_name,array());}else{echo CHtml::image($cssPath."/images/logo_160_98.gif",$value->restaurant_name,array());}?></p>
		  			 	  		 	</div>
		  			 	  		 	<div class="r_agency_content">
		  			 	  		 		  <div class="r_agency_name"><?php echo $value->restaurant_name;?></div>
		  			 	  		 		  <div class="r_agency_telephone"><?php echo $value->restaurant_telephone;?></div>
		  			 	  		 		  <div class="restaurant_ordin"><a title="<?php echo $value->restaurant_name;?>" href="<?php echo $this->controller->createUrl("/restaurant/restaurant/detail",array('id'=>$value->id));?>">查看详情</a></div>
		  			 	  		  </div>
		  			 	  	</div>
		  			 	  <?php } ?>	
		  			 	  	
		  			 		</div>
		  			</div>