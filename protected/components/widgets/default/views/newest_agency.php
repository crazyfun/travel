							<?php $cssPath=$this->controller->get_css_path();?>
							<div class="leftbox">
		  			 	  <div class="leftbox_title"><div class="leftbox_title_name">最新旅行社</div><div class="leftbox_title_more"><a href="<?php echo $this->controller->createUrl("/search/default/index",array('action'=>'agency','registe_sort'=>'DESC')); ?>">更多<span>››</span></a></div></div>
		  			 	  <div class="leftbox_content">
		  			 	  <?php foreach($travel_agency_datas as $key => $value){ ?>
		  			 	    <div class="leftbox_item">
		  			 	  	<div class="a_user_dl">
		  			 	  		 <div class="agency_sibox">
		  			 	  		 	  <p><?php if(!empty($value->agency_logo)){$themb_image=Util::rename_thumb_file('98','60','',$value->agency_logo);echo CHtml::image("/".$themb_image,$value->agency_name,array());}else{echo CHtml::image($cssPath."/images/logo_98_60.gif",$value->agency_name,array());}?></p>
		  			 	  		 	</div>
		  			 	    </div>
		  			 	    
		  			 	    <div class="a_user_dr">
		  			 	    	 <div class="a_user_item"><span class="a_item_name">名称:</span><span class="a_item_content"><?php echo $value->agency_name;?></span></div>
		  			 	    	 <div class="a_user_item"><span class="a_item_name">电话:</span><span class="a_item_content"><?php echo $value->agency_telephone;?></span></div>
		  			 	    	 <div class="a_user_item"><span class="agency_ordin"><a title="<?php echo $value->agency_name;?>" href="<?php echo $this->controller->createUrl("/agency/agency/detail",array('id'=>$value->id));?>">查看详情</a></span></div>
		  			 	    </div>
		  			 	   </div>
		  			 	  <?php } ?>

		  			 	  </div>
		  			</div>
		  			 
		  			 
		  			 