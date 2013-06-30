 <?php $cssPath=$this->get_css_path(); ?>
 <div class="register_con">
    	<div class="my_page_top"></div>
        <div class="my_page_mid">
        	  <div class="register_top"><img src="<?php echo $cssPath;?>/images/re_step3.gif" width="949px" height="35px"/></div>
            <div class="re_suc_div">
        		<div class="re_suc_t"><img src="<?php echo $cssPath;?>/images/re_suc_t.gif" align="absmiddle" /> 您已成功注册为导立火旅行网会员</div>
        		<div class="re_suc_con">
            		<div class="re_top"></div>
                	<div class="re_middle" style="text-align:center;">
                    	
                    	<div class="re_middle_item"><a href="<?php echo $this->createUrl("/user/index");?>"><img src="<?php echo $cssPath;?>/images/link_indexbg.gif"></a></div>
                    	<div class="re_middle_item registe_apply_guides"><a href="<?php echo $this->createUrl("/user/applyguides");?>"></a></div>
                    	<div class="re_middle_item registe_apply_agency"><a href="<?php echo $this->createUrl("/user/applyagency");?>"></a></div>
                    	<div class="re_middle_item registe_apply_restaurant"><a href="<?php echo $this->createUrl("/user/applyrestaurant");?>"></a></div>
           		  </div>
                    <div class="re_bottom"></div>
                </div>
        	</div>
        </div>
        <div class="my_page_bot"></div>
    </div>

<script language="javascript">
	jQuery(function($){
		//window.setTimeout(function(){window.location.href="<?php echo $this->createUrl('/login/login',array()); ?>";},5000);
	});
</script>
