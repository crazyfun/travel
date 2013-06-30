		  <?php    
		     		 Yii::app()->clientScript->registerScriptFile('/js/flash_slide.js');
             $cssPath=$this->get_css_path();
      ?>
		  		<!--content_left start -->
		  		<div class="content_left">
		  			<?php
                  $this->widget('UserCenter', array(   
                            
              	  ));   
       			?>
		  			
 
		  			<?php
  		
      				if($this->beginCache(Util::get_cache_id("NewestGuide"), array('duration'=>"1"))){
                  $this->widget('NewestGuide', array( 
                     'view'=>'newest_guide'            
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
		  			 
		  			<?php
  		
      				if($this->beginCache(Util::get_cache_id("NewestAgency"), array('duration'=>"1"))){
                  $this->widget('NewestAgency', array(    
                    'view'=>'newest_agency'         
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
       			
       			
       			<?php
  		
      				if($this->beginCache(Util::get_cache_id("NewestRestaurant"), array('duration'=>"1"))){
                  $this->widget('NewestRestaurant', array(    
                    'view'=>'newest_restaurant'         
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
		  		<?php
  		
      				if($this->beginCache(Util::get_cache_id("HotLine"), array('duration'=>"3600*24*7"))){
                  $this->widget('HotLine', array(    
                      'view'=>'hot_line',
                      'nums'=>10, 
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>		 
		  			
		  		<?php
  		
      				if($this->beginCache(Util::get_cache_id("InviteTop10"), array('duration'=>"3600*24*7"))){
                  $this->widget('InviteTop10', array(    
                       
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
		  			 
		  		
		  	  </div>
		  	  <!--content left end -->
		  	 
		  	  <!--content right start -->
		  	  <div class="content_right">
		  	  	
		  	  	
		  	  <?php
  		
      				if($this->beginCache(Util::get_cache_id("WFlashAd"), array('duration'=>"3600*24*7"))){
                  $this->widget('WFlashAd', array(      
                     
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
       			
       			
       			
		  	  
            
		  	  	  
		  			 	<?php
  		
      				if($this->beginCache(Util::get_cache_id("HotGuide"), array('duration'=>"3600*24*7"))){
                  $this->widget('HotGuide', array(      
                    'view'=>'hot_guide',
                    'nums'=>'9',     
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
       			
       			
       			
		  			<?php echo Util::GetAd(2);?>
		  			 	
		  			 	
		  			<?php
  		
      				if($this->beginCache(Util::get_cache_id("HotAgency"), array('duration'=>"3600*24*7"))){
                  $this->widget('HotAgency', array(      
                    'view'=>'hot_agency',
                    'nums'=>'12',        
              	  )); 
             		$this->endCache(); 
       			  }        
       			?> 	
		  			<?php echo Util::GetAd(3);?>
		  			 <?php
  		
      				if($this->beginCache(Util::get_cache_id("HotRestaurant"), array('duration'=>"3600*24*7"))){
                  $this->widget('HotRestaurant', array(      
                    'view'=>'hot_restaurant',
                    'nums'=>'12',       
              	  )); 
             		$this->endCache(); 
       			  }        
       			?> 	
		  			 	
		  			 	
		  			 	
		  			 	
		  			<?php echo Util::GetAd(4);?>


            <?php
  		
      				if($this->beginCache(Util::get_cache_id("ReInformation"), array('duration'=>"3600*24*7"))){
                  $this->widget('ReInformation', array(             
              	  )); 
             		$this->endCache(); 
       			  }        
       			?> 
		  			 	
		  			<?php
  		
      				if($this->beginCache(Util::get_cache_id("NewInformation"), array('duration'=>"3600*24*7"))){
                  $this->widget('NewInformation', array(             
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>  	
		  			 	 
		  			 	  	 
		  			 	
		  		</div>
