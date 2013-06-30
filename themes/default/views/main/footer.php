      <?php    
         $cssPath=$this->get_css_path();
      ?>
      <!--footer start -->
      <div class="footer">
      	 <div class="center">
      	 	  <div class="footer_top">

      	 	    		<?php
      							if($this->beginCache(Util::get_cache_id("FriendLinkWidget"), array('duration'=>"3600*24*7"))){
                  				$this->widget('FriendLinkWidget', array(             
              	  		    )); 
             					$this->endCache(); 
       			  			}        
       						?>  
      	 	  </div>
      	 	  <div class="clear_both"></div>

      	 	  <div class="footer_bottom">
      	 	  	 2012-2015 lyyhome.com , Inc or its affiliates. All Rights Reserved <a target="_blank" href="http://www.miitbeian.gov.cn/">¶õICP±¸12008911ºÅ-2 </a>.
      	 	  </div>
      	 </div>
      </div>		  

 <!--footer end -->
 
 <div id="goTopBtn"><img border=0 src="/themes/default/css/images/totop.gif"></div>
 <!-- JiaThis Button BEGIN -->
<script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?uid=1350955417827300&move=0&amp;btn=r3.gif" charset="utf-8"></script>
<!-- JiaThis Button END -->
 <script type="text/javascript"> 
	  goTopEx();
		//var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
		//document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F948c7919d7bb7626e2ed11c5f55b36fe' type='text/javascript'%3E%3C/script%3E"));
</script>