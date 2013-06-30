<div class="main-left">
	<div class="minute_infor">
            <h2><?php echo $model->title;?></h2>
        	  <p>
               <?php echo $model->content;?>
            </p>
            <div class="infor_detail">
            	<div><span>资讯类别:<?php echo $model->Type->name;?></span><span>查看次数:<?php echo $model->views;?></span><span>发布时间:<?php echo $model->show_attribute("create_time");?></span></div>
            </div>
  </div>
	
</div>
<div class="main_right">
	       <?php
  		
      				if($this->beginCache(Util::get_cache_id("NewestInformation"), array('duration'=>"3600*24*7"))){
                  $this->widget('NewestInformation', array( 
                     'view'=>'snewest_information'            
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
       			
       			<?php echo Util::GetAd(11);?>
       				<?php
  		
      				if($this->beginCache(Util::get_cache_id("HotInformation"), array('duration'=>"3600*24*7"))){
                  $this->widget('HotInformation', array(      
                    'view'=>'shot_information'       
              	  )); 
             		$this->endCache(); 
       			  }        
       			  ?>
   
</div>
<div class="clear_both"></div>