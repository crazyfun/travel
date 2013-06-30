<div class="msgbox">
	<div class="l_title r_title">操作提示</div>
    <div class="read_main">
         <div class="read_body">
         	   <?php $this->widget("FlashInfo");?>
         </div>
         
    </div>
</div>

<script language="javascript">
	jQuery(function(){
		 window.setTimeout(function(){self.parent.location.href='/user/mygscheduler'},3000);
	});
</script>