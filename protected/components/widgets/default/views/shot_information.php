           <div class="sch_new_guide">
              <div class="new_guide_t"><div>热门资讯</div></div>
              <div class="new_guide_con new_recom">
               <?php foreach($information_datas as $key => $value){ ?>
		  			 	  	  <div><a title="<?php echo $value->title;?>" href="<?php echo $this->controller->createUrl("/information/default/detail",array('id'=>$value->id));?>"><?php echo Util::cutstr($value->title,36,false);?></a></div>
		  			 	  <?php } ?>
                    
            </div> <!--new_guide_con-->
        </div><!--sch_new_guide end-->