
<div id="comments_edit">
  <?php echo CHtml::beginForm($this->controller->createUrl("/comment/comment/comments"),"POST",array("id"=>'modelcomment','onsubmit'=>'return false;'));?>
        <input type="hidden" name="action" value="comment"/>
        <input type="hidden" name="model_id" value="<?php echo $model_id;?>"/>
        <input type="hidden" name="content_id" value="<?php echo $content_id;?>"/>
        <input type="hidden" name="level" value="<?php echo $level;?>"/>
        <input type="hidden" name="user_flag" value="<?php echo $user_flag;?>"/>
        <?php
          $html_obj=EHtml::selectCreate($input_type,"content",'',array(),array('toobar'=>'Comments','width'=>'705px','height'=>'200px'));
          if(is_object($html_obj)){
          	$html_obj;
          }else{
          	echo $html_obj;
          }
        ?>
      <?php if($user_flag){
      	     if(Yii::app()->user->isGuest){ 
      ?>
             	<div class="comment_submit"><a class="comment_login" href="javascript:pop_login();">登录</a></div>
      <?php }else{ ?>
      	     	<div class="comment_submit"><input type="button" name="comment" onclick="javascript:submit_comments('modelcomment');" class="replay-bt" value="发表评论"/></div>
      <?php } ?>
      <?php }else{     
      ?>
             <div class="comment_submit"><input type="button" name="comment" onclick="javascript:submit_comments('modelcomment');" class="replay-bt" value="发表评论"/></div>
      <?php       	
      	    }
      ?>          
 <?php echo CHtml::endForm();?>
 <div class="clearfix"></div>
 </div>
 <div id="comments_datas">

 </div>
 <script language="javascript">
    var model_id="<?= $model_id ?>";
    var content_id="<?= $content_id ?>";
    var level="<?= $level ?>";
    var user_flag="<?= $user_flag ?>";
 	  var comments_obj="";
 	  jQuery(document).ready(function(){
 		  comments_obj=new comments(model_id,content_id,level,user_flag,"comments_datas");
 	  });
 	  function submit_comments(conmments_form){
		  comments_obj.comment(conmments_form)
	  } 
 </script>