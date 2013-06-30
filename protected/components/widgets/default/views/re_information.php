					<div class="rb_left">
		  			 	   	<div class="rb_menu_title">
		  			 	   		 <ul class="menu_tab">
		  			 	   		 	 <li class="recommend_tab recommend_tab_active" index='1'>
		  			 	   		 	 	  推荐导游
		  			 	   		 	 </li>
		  			 	   		 	 <li class="recommend_tab" index='2'>
		  			 	   		 	 	  推荐旅行社
		  			 	   		 	 </li>
		  			 	   		 	 
		  			 	   		 	  <li class="recommend_tab" index='3'>
		  			 	   		 	 	  推荐酒店
		  			 	   		 	 </li>
		  			 	   		 </ul>
		  			 	   	</div>
		  			 	   	<div class="rihgtbox_content">
		  			 	   	     <div id="recommend_content_1" class="recommend_content" style="display:block;">
		  			 	   	     	  <ul class="recommend_guide">
		  			 	   	     	  	
		  			 	   	     	  <?php foreach($guide_datas as $key => $value){ ?>
		  			 	   	     	  	<li class="w_120">
		  			 	   	     	  		<a title="<?php echo $value->User->real_name;?>" href="<?php echo $this->controller->createUrl("/guide/guide/detail",array('id'=>$value->id));?>"><?php echo $value->User->real_name;?></a>
		  			 	   	     	    </li>
		  			 	   	     	    <li class="w_30">
		  			 	   	     	    	<?php echo CV::$sex[$value->User->genter];?>
		  			 	   	     	    </li>
		  			 	   	     	    <li class="w_30">
		  			 	   	     	    	3年
		  			 	   	     	    </li>
		  			 	   	     	    <li class="rb_left_right">
		  			 	   	     	    	<span class="ordain_ordin"><a title="<?php echo $value->User->real_name;?>" href="<?php echo $this->controller->createUrl("/guide/guide/detail",array('id'=>$value->id));?>">立即预定</a></span>
		  			 	   	     	    </li> 
		  			 	   	     	  <?php } ?>
		  			 	   	     	  </ul>
		  			 	   	      </div>
		  			 	   	    <div id="recommend_content_2" class="recommend_content">
		  			 	   	    	<ul class="recommend_agency">
		  			 	   	     	  	
		  			 	   	     	  <?php foreach($travel_agency_datas as $key => $value){ ?>
		  			 	   	     	  	<li class="w_120">
		  			 	   	     	  		<a title="<?php echo $value->agency_name;?>" href="<?php echo $this->controller->createUrl("/agency/agency/detail",array('id'=>$value->id));?>"><?php echo Util::cutstr($value->agency_name,18,false);?></a>
		  			 	   	     	    </li>
		  			 	   	     	    <li class="w_80">
		  			 	   	     	    	<?php echo $value->agency_telephone;?>
		  			 	   	     	    </li>
		  			 	   	     	    <li class="rb_left_right">
		  			 	   	     	    	<span class="ordain_ordin"><a title="<?php echo $value->agency_name;?>" href="<?php echo $this->controller->createUrl("/agency/agency/detail",array('id'=>$value->id));?>">查看详情</a></span>
		  			 	   	     	    </li>
		  			 	   	     	  <?php } ?>
		  			 	   	     	  </ul>
		  			 	   	    </div>
		  			 	   	    
		  			 	   	    
		  			 	   	    <div id="recommend_content_3" class="recommend_content">
		  			 	   	    	<ul class="recommend_agency">
		  			 	   	     	  	
		  			 	   	     	  <?php foreach($travel_restaurant_datas as $key => $value){ ?>
		  			 	   	     	  	<li class="w_120">
		  			 	   	     	  		<a title="<?php echo $value->restaurant_name;?>" href="<?php echo $this->controller->createUrl("/restautrant/restautrant/detail",array('id'=>$value->id));?>"><?php echo Util::cutstr($value->restaurant_name,18,false);?></a>
		  			 	   	     	    </li>
		  			 	   	     	    <li class="w_80">
		  			 	   	     	    	<?php echo $value->restaurant_telephone;?>
		  			 	   	     	    </li>
		  			 	   	     	    <li class="rb_left_right">
		  			 	   	     	    	<span class="restautrant_ordin"><a title="<?php echo $value->restaurant_name;?>" href="<?php echo $this->controller->createUrl("/restaurant/restaurant/detail",array('id'=>$value->id));?>">查看详情</a></span>
		  			 	   	     	    </li>
		  			 	   	     	  <?php } ?>
		  			 	   	     	  </ul>
		  			 	   	    </div>
		  			 	   	    
		  			 	   	    
		  			 	   	    
		  			 	    </div>
		  			 	 </div>
		  			 	 
		  			 	 <script language="javascript">
		  			 	 	  jQuery(function(){
		  			 	 	  	 togglemenu({'source':'recommend_tab','target':'recommend_content','type':'2','effect':'1','effect_time':''})
		  			 	 	  	
		  			 	 	  });
		  			 	 </script>