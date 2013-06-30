           <?php $cssPath=$this->controller->get_css_path();?>
           <div class="sch_new_guide">
              <div class="new_guide_t"><div>热门导游</div></div>
              <div class="new_guide_con">
                <?php foreach($guide_datas as $key => $value){ ?>
		  			 	  	 <div class="leftbox_item">
		  			 	   	
		  			 	  			<div class="d_user_dl">
		  			 	  		 		<div class="guide_ibox">
		  			 	  		 	      <p><?php if(!empty($value->guide_avater)){$themb_image=Util::rename_thumb_file('90','90','',$value->guide_avater);echo CHtml::image("/".$themb_image,$value->User->real_name,array());}else{echo CHtml::image($cssPath."/images/logo_90_90.gif",$value->User->real_name,array());}?></p>
		  			 	  		 			</div>
		  			 	   			 </div>
		  			 	    
		  			 	    		<div class="d_user_dr">
		  			 	    	 		<div class="d_user_item"><span class="d_item_name">姓名:</span><span class="d_item_content"><?php echo $value->User->real_name;?></span></div>
		  			 	    	 		<div class="d_user_item"><span class="d_item_name">性别:</span><span class="d_item_content"><?php echo CV::$sex[$value->User->genter];?></span></div>
		  			 	    	 		<div class="d_user_item"><span class="d_item_name">带团年限:</span><span class="d_item_content"><?php echo $value->guide_year;?>年</span></div>
		  			 	    	 		<div class="d_user_item"><span class="ordain_ordin"><a title="<?php echo $value->User->real_name;?>" href="<?php echo $this->controller->createUrl("/guide/guide/detail",array('id'=>$value->id));?>">立即预定</a></span></div>
		  			 	    		</div>
		  			 	   		</div>
		  			 	  <?php } ?>
                    
            </div> <!--new_guide_con-->
        </div><!--sch_new_guide end-->