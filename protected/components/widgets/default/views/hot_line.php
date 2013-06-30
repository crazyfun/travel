           <div class="leftbox">
		  			 	  <div class="leftbox_title"><div class="leftbox_title_name">热门线路</div><div class="leftbox_title_more"><a href="<?php echo $this->controller->createUrl("/search/default/index",array('action'=>'line','registe_sort'=>'DESC')); ?>">更多<span>››</span></a></div></div>
		  			 	  <div class="leftul_content">
		  			 	  	  <ul>
		  			 	  	  	   <?php foreach($agency_datas as $key => $value){ ?>
		  			 	  	  	   
		  			 	  	  	   <li><a title="<?php echo $value->line;?>" href="<?php echo $this->controller->createUrl("/search/default/index",array('action'=>'line','id'=>$value->id));?>"><?php echo Util::cutstr($value->line,36,false);?></a></li>
		  			 	  	  	  <?php } ?>
                              	
                              
                              </ul>
		  			 	  </div>
		  			 </div>