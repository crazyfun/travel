<?php
   $comment_id=$data->id;
   $model_id=$data->model_id;
   $parent_id=$data->parent_id;
   $relation_id=$data->relation_id;
   $comment=$data->comment;
   $create_id=$data->create_id;
   $create_time=$data->create_time;
?>
<div class="comment_item" id="comment_item_<?php echo $comment_id;?>">
  	<div class="comment_auther">
  	   <div class="comment_logo">
  	   	   	<img src="<?php echo UC_API; ?>/avatar.php?uid=<?php echo $create_id ;?>&size=small&rand=<?php echo time();?>" id="avatar" />
  	   	</div>
  	   	<div class="comment_name">
  	   		<?php
  	   		  if(empty($create_id)){
  	   		  	echo "游客";
  	   		  }else{
  	   		  	echo $data->User->user_login;
  	   		  }
  	   		?>
  	   		
  	   	</div>
  	</div>
  	<div class="comment_content">
  		 <div class="comment_top">
  		 	  <div class="comment_top_title"><?php echo CV::$sex[$data->User->genter];?>&nbsp;发表于:<?php echo date('Y-m-d',$create_time); ?></div>
  		 		<div class="clear_both"></div>
  		 </div>
  		 <div class="comment_center">
  		 	   <?php echo html_entity_decode($comment);?>
  		 </div>
 
    </div>
    <div class="clear_both"></div>
    <div class="comment_bottom">
  		 	  <?php $level_flag=$this->get_level_flag($comment_id,$level); 
  		 	        if($level_flag){ 
  		 	  ?>
  		 	  <span class="comment_viewreply"><a href="javascript:comments_obj.view_reply(<?php echo $comment_id;?>);">查看回复(<span id="reply_nums_<?php echo $comment_id;?>"><?php echo count($data->Comments);?></span>)</a></span>
  		 	   
  		 <?php if($user_flag){
  		 	     
      	     if(Yii::app()->user->isGuest){ 
      ?>
             	
      <?php }else{ ?>
      	     	<span class="comment_reply"><a id="reply_button_<?php echo $comment_id;?>" href="javascript:comments_obj.reply(<?php echo $comment_id;?>);">回复</a></span>
      <?php } ?>
      <?php }else{     
      ?>
             <span class="comment_reply"><a id="reply_button_<?php echo $comment_id;?>" href="javascript:comments_obj.reply(<?php echo $comment_id;?>);">回复</a></span>
      <?php       	
      	    }
      ?> 
  		    <?php } ?>
  	</div>
    
   <div class="comment_children" id="comment_children_<?php echo $comment_id; ?>">
   	 
   </div>
   
</div>
<div class="clear_both"></div>


