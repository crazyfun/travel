		 <?php    
         $cssPath=$this->get_css_path();
      ?>
		  <!--header start -->
		  <div class="header">
		  	<!--header_banner start -->
		  	 <div class="header_banner">
		  	 	  <div class="center">
		  	 	  	 <div class="hb_left" id="clock">
		  	 	  	 	    
		  	 	  	 	</div>
		  	 	  	 <div class="hb_right">
		  	 	  	 	  <ul class="hb_ul">
		  	 	  	 	    <li class="hb_li"><a href="javascript:setHomepage('<?php echo Yii::app()->homeUrl;?>');">设为主页</a></li>
		  	 	  	 	    <li class="hb_s">|</li>
		  	 	  	 	    <li class="hb_li"><a href="javascript:addCookie('<?php echo Yii::app()->homeUrl;?>','<?php echo Yii::app()->name;?>');">收藏本站</a></li>
		  	 	  	 	    <li class="hb_s">|</li>
		  	 	  	 	    <li class="hb_li"><a href="<?php echo $this->createUrl("/whelp/default/index");?>">在线帮助</a></li>	
		  	 	  	 	    <li class="hb_s">|</li>
		  	 	  	 	    <li class="hb_li"><a target="_blank" href="http://bbs.lyyhome.com">导游社区</a></li>
		  	 	  	 	    <li class="hb_s">|</li>
		  	 	  	 	    <li class="hb_li"><a href="<?php echo $this->createUrl("/index.php/sitemap/index");?>">网站地图</a></li>
		  	 	  	 	    <?php if(!Yii::app()->user->isGuest){ ?>
		  	 	  	 	    <li class="hb_s">|</li>
		  	 	  	 	    <li class="hb_li"><a href="<?php echo $this->createUrl("/login/login/logout");?>">退出</a></li>
		  	 	  	 	  <?php }else{ ?>
		  	 	  	 	    <li class="hb_s">|</li>
		  	 	  	 	    <li class="hb_li"><a href="<?php echo $this->createUrl("/login/login/index");?>">登录</a></li>
		  	 	  	 	<?php } ?>
		  	 	  	 	    <li class="hb_s">|</li>
		  	 	  	 	    <li><img src="<?php echo $cssPath;?>/images/web_phone.jpg"/></li>
		  	 	  	 	  </ul> 	    
		  	 	  	 	</div>
		  	 	  </div>
		  	 </div>
		  	 <!--header_banner end -->
		  	 
		  	 <!--header_logo start -->
		  	 <div class="header_logo">
		  	 	<div class="center">
		  	 		 <a href="<?php echo $this->createUrl("/site/index");?>" title="导游，旅行社，酒店和旅游资讯等资源共享平台,提供找导游，找旅行社，找酒店，导游证查询，导游词查询，导游考试查询，旅游计调，挂靠旅行社等方便快捷的服务"><div class="logo"></div></a>
		  	 		 <div class="select_region">
		  	 		 	  <?php 
		  	 		 	    $ip_convert=IpConvert::get();
		  	 		 	    $region_session=$ip_convert->init_region();
		  	 		 	    $remote_ip=Util::getIp();
		  	 		 	    $current_region=$ip_convert->get_region_id($remote_ip);
		  	 		 	    
		  	 		 	  ?>
		  	 		 	   <span class="current_region"><?php echo $region_session['name'];?></span><span class="change_region">[<a target="_self" href="/region/default/index" class="text_666666">切换城市</a><?php if(!empty($current_region['id'])&&$region_session['id']!=$current_region['id']){echo '&nbsp;<a   href="'.$this->createUrl("/region/default/set",array('action'=>'select','region_id'=>$current_region['id'])).'" target="_self">'.$current_region['name'].'</a>';}?>]
                 </span>
		  	 		 </div>
		  	 		 <div style="float:right;">
		  	 		   <?php echo Util::GetAd(1);?>
		  	 		 </div>
		  		</div>
		  	 </div>
		  	 <!--header_logo end -->
		  	 <!--header_menu start -->
		  	 <div class="header_menu">
		  	 	 <div class="center">
		  	 	 	
		  	 	 	<?php
  		
      				if($this->beginCache(Util::get_cache_id("WebMenu"), array('duration'=>"1"))){
                  $this->widget('WebMenu', array(             
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
       
       
		  	 	 	
		  	   </div>
		  	 </div>
		  	 <!--header_menu end -->
		  	 <!--header_search start -->
		  	 <div class="header_search" id="header_search">
		  	 	   <?php Yii::app()->clientScript->registerScriptFile('/js/select.js'); ?>
		  	 	   <div class="center">
		  	 	   	 <div class="search_top">
		  	 	   	 	  <div class="search_content">
		  	 	   	 	    <div class="put-con-sch">
		  	 	   	 	    	<?php
		  	 	   	 	    	$form=$this->beginWidget('EActiveForm', array(
	        								'id'=>'header_search',
          								'action'=>$this->createUrl("/search/default/index"),
	        								'enableAjaxValidation'=>false,
	        								'htmlOptions'=>array('enctype'=>'multipart/form-data'),
         								));
         							?>
                      <div class="sub_line select_js">
                      	<p>导游</p>
                        <ul class="search_ul">
                        	  <li ectype="guide">导游</li>
                            <li ectype="agency">旅行社</li>
                            <li ectype="line">线路</li>
                            <li ectype="restaurant">酒店</li>
                        </ul>
                        <input type="hidden" name="action" value="guide" />
                      </div>
                      <input type="text" class="sch_put" name="keywords" id="header_search_keywords"/>
                      <input type="submit" value="" class="sch_bt">
                      <?php $this->endWidget(); ?>
                    </div>
                    
                   
		  	 	   	 	  </div>
		  	 	   	 	   <!--<div class="sch_hot"> <a href="#" class="hot">五月促销</a> <a href="#">特惠旅游</a> </div>-->
		  	 	   	 </div>
		  	 	   	 <div class="search_bottom"></div>
		  	 	   	
		  	 	   </div>
		  	 	   
		  	 	   
		  	   
		  	 </div>
		  	 <!--header_search end -->
		  	 
		  	 <div class="center">
		  	  <div class="map">
		  	 	   	 	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
								     'links'=>$this->breadcrumbs,
							    )); ?>
							 </div>	
			  </div>
    		 
		  </div>
		  <!--header end -->
		  <script language="javascript">
		  	  jQuery(function(){
		  	  	  var clock=new Clock();
		  	  	  clock.display(document.getElementById("clock"));
		  	  	  show_keywords_describe("header_search_keywords","请输入搜索内容...","header_search");
   	  				
					});
		  </script>