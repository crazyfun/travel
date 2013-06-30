               <div class="rb_right">
		  			 	   	<div class="rb_menu_title">
		  			 	   		 <ul class="menu_tab">
		  			 	   		 	 <li class="news_tab news_tab_active" index='1'>
		  			 	   		 	 	  导游资讯
		  			 	   		 	 </li>
		  			 	   		 	 
		  			 	   		 	 <li class="news_tab" index='2'>
		  			 	   		 	 	  最新线路
		  			 	   		 	 </li>
		  			 	   		 	
		  			 	   		 </ul>
		  			 	   	</div>
		  			 	   <div class="rihgtbox_content">
		  			 	   	<div id="news_content_1" class="news_content" style="display:block;">
		  			 	   	   <ul class="news_information">
		  			 	   	   	<?php foreach($information_datas as $key => $value){ ?>
		  			 	   	     	   <li class="w_200">
		  			 	   	     	      <a title="<?php echo $value->title;?>" href="<?php echo $this->controller->createUrl("/information/default/detail",array('id'=>$value->id));?>"><?php echo Util::cutstr($value->title,30,true);?></a>
		  			 	   	     	    </li>
		  			 	   	     	     <li class="rb_right_right">
		  			 	   	     	    	<?php echo date('Y-m-d',$value->create_time);?>
		  			 	   	     	    </li>	
		  			 	   	     <?php } ?>
		  			 	   	     	    
		
		  			 	   	   </ul>
		  			 	   	 </div>
		  			 	   	 
		  			 	   	 <div id="news_content_2" class="news_content">
		  			 	   	   <ul class="news_information">
		  			 	   	   	   <?php foreach($agency_datas as $key => $value){ ?>
		  			 	   	   	     <li class="w_200">
		  			 	   	     	      <a title="<?php echo $value->line;?>" href="<?php echo $this->controller->createUrl("/search/default/index",array('action'=>'line','id'=>$value->id));?>"><?php echo Util::cutstr($value->line,30,true);?></a>
		  			 	   	     	    </li>
		  			 	   	     	     <li class="rb_right_right">
		  			 	   	     	    	<?php echo date('Y-m-d',$value->create_time);?>
		  			 	   	     	    </li>	
		  			 	   	   	   
		  			 	   	   	 <?php } ?>

		  			 	   	   </ul>
		  			 	   	 </div>
		  			 	   	 
		  			 	   	 
		  			 	    </div>
		  			 	 </div>
		  			 	 
		  			 	 <script language="javascript">
		  			 	 	  jQuery(function(){
		  			 	 	  	 togglemenu({'source':'news_tab','target':'news_content','type':'2','effect':'1','effect_time':''})
		  			 	 	  	
		  			 	 	  });
		  			 	 </script>
		  			 	 
		  			 	 