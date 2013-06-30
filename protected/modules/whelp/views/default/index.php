 <div class="help-main-left">
        	<div class="help-nav-con">
            	<div class="help-title">常见问题</div>
                
             <?php
  		
      				if($this->beginCache(Util::get_cache_id("HelpCategory"), array('duration'=>"3600*24*7"))){
                  $this->widget('HelpCategory', array( 
                           
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
                
            </div>
        </div>
        <!--help-main-left end-->
        
 <div class="help-main-right">
        	<div class="help_r_con" id="top"> 
             <?php
      				if($this->beginCache(Util::get_cache_id("HelpItems"), array('duration'=>"1"))){
                  $this->widget('HelpItems', array( 
                     'cid'=>$cid,      
              	  )); 
             		$this->endCache(); 
       			  }        
       			?> 
        	</div>
        </div><!--help-main-right end-->
    	<div class="clear_both"></div>