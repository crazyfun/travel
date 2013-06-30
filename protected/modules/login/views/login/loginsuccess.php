<?php echo $ucsynlogin ?>
<div class="cgbox">
	<p>成功登录立火旅行网，<span>5</span>秒钟后自动跳转到首页</p>
</div>
<script language="javascript">
	jQuery(function(){
		window.setTimeout(function(){window.location.href="<?= $this->createUrl('/site/index'); ?>"},5000);
	});
</script>