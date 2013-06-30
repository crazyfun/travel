 							<div class="sch_new_guide">
                <div class="new_guide_t"><div>热门线路</div></div>
                <div class="new_guide_con new_recom">
                 <?php foreach($agency_datas as $key => $value){ ?>
		  			 	  	  <div class="line_w_item"><a title="<?php echo $value->line;?>" href="<?php echo $this->controller->createUrl("/search/default/index",array('action'=>'line','id'=>$value->id));?>"><?php echo Util::cutstr($value->line,36,false);/* echo $value->line;*/?></a></div>
		  			 	  <?php } ?>
 
                </div><!--new_guide_con-->
            </div><!--sch_new_guide end-->