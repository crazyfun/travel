function comments(model_id,content_id,level,user_flag,show_comments){
	this.model_id=model_id;
	this.content_id=content_id;
	this.level=level;
	this.user_flag=user_flag;
	this.show_comments=show_comments;
	this.init();
}
comments.prototype={
	init:function(){
		this.responsecomment("/comment/comment/comments");
	},
	
	comment:function(form_id){
		var content="";
		var data="";
		var win="";
		var serialize_values=jQuery("#"+form_id).serialize();
		if(document.getElementById('content___Frame'))
		   win = document.getElementById('content___Frame').contentWindow;
		if(win){
		  content=win.FCK.GetXHTML(true);
		  data=serialize_values+"&content="+content;
    }else{
    	content=document.getElementById("content").value;
    	data=serialize_values;
    }
    if(!content){
    	  jQuery.jBox.error('评论内容不能为空', '错误');
    	  return false;
    }
      
		var self=this;
		jQuery.ajax({
			   type: "POST",
			   beforeSend: function(){
			   },
			   url: jQuery("#"+form_id).attr("action"),
			   processData:true,
			   data: data,
			   dataType:'html',
			   success: function(msg){
			   	 jQuery("#"+self.show_comments).html(msg);
			   }
	  });
	
	  
	},
	
	reply_comment:function(form_id,comment_id){
		var reply_textarea_content=document.getElementById("reply_textarea").value;
		if(!reply_textarea_content){
			jQuery.jBox.error('回复内容不能为空', '错误');
			return false;
		}
		var serialize_values=jQuery("#"+form_id).serialize();
		var self=this;
		jQuery.ajax({
			   type: "POST",
			   beforeSend: function(){
				  
			   },
			   url: jQuery("#"+form_id).attr("action"),
			   processData:true,
			   data: serialize_values,
			   dataType:'html',
			   success: function(msg){
			   	 var reply_nums=jQuery("#reply_nums_"+comment_id).html();
			   	 jQuery("#reply_nums_"+comment_id).html(parseInt(reply_nums)+1);
			   	 jQuery("#comment_children_"+comment_id).html(msg);
			   }
	  });
	},
	responsecomment:function(response_url){
		var self=this;
		jQuery.ajax({
			   type: "GET",
			   beforeSend: function(){
				   jQuery('#'+self.show_comments).html("<div class='loading_progress'><img width='20' height='20'  src='/css/images/progress.gif'></div>");
			   },
			   url: response_url,
			   processData:true,
			   data: "model_id="+self.model_id+"&content_id="+self.content_id+"&level="+self.level+"&user_flag="+self.user_flag,
			   dataType:'html',
			   success: function(msg){
			   	 jQuery("#"+self.show_comments).html(msg);
			   }
	  });
	},
	reply:function(comment_id){
		var reply_comment_content="comment_item_"+comment_id;
		var reply_content=jQuery("#"+reply_comment_content).find("#reply_form");
		
		if(reply_content.attr('comment_id')==comment_id){
			  if(reply_content.css("display")=="none"){
			  	jQuery(".btn_reply_cliked").removeClass("btn_reply_cliked");
			  	jQuery("#reply_button_"+comment_id).addClass("btn_reply_cliked");
			  	reply_content.show();
			  }else{
			  	jQuery(".btn_reply_cliked").removeClass("btn_reply_cliked");
			  	reply_content.hide();
			  }
		}else{
		  var reply_form=jQuery("#reply_form");
		  reply_form.remove();
		  var reply_content=document.createElement("div");
		  reply_content.id="reply_form";
		  reply_content.setAttribute("comment_id",comment_id);
		  reply_content.className="reply_form";
		  reply_content.innerHTML='<form action="/comment/comment/comments" name="reply_form" id="reply_submit_form" method="POST" onsubmit="return false;"><input type="hidden" name="action" value="reply"/><input type="hidden" name="model_id" value="'+this.model_id+'"/><input type="hidden" name="level" value="'+this.level+'"/><input type="hidden" name="user_flag" value="'+this.user_flag+'"/><input type="hidden" name="parent_id" id="comment_parent_id" value="'+comment_id+'"/><input type="hidden" name="content_id" value="'+this.content_id+'"/><div class="add_reply"><div class="post-area"><div><textarea type="text" id="reply_textarea" class="reply_textarea" name="content"></textarea></div><div class="comment_submit"><input type="button" name="reply_button" id="reply_button" value="回复" class="replay-bt"/></div></div></div></form>';
		  
		  document.getElementById(reply_comment_content).appendChild(reply_content);
		  jQuery(".btn_reply_cliked").removeClass("btn_reply_cliked");
		  jQuery("#reply_button_"+comment_id).addClass("btn_reply_cliked");
		  var self=this;
		  jQuery("#reply_button").bind('click',function(){
		  	 self.reply_comment("reply_submit_form",comment_id);
		  });
	  }
   },
   
   view_reply:function(comment_id){
      	var self=this;
      	var child_comment=jQuery("#comment_children_"+comment_id);
      	if(child_comment.attr("show_flag")=='2'){
      		 var display=child_comment.css("display");
      		 if(display=="none")
      		  child_comment.show();
      		 else
      		 	child_comment.hide();
      	}else{
		     jQuery.ajax({
			    type: "GET",
			    beforeSend: function(){
				   child_comment.html("<div class='loading_progress'><img width='20' height='20'  src='/css/images/progress.gif'></div>");
			    },
			    url: "/comment/comment/comments",
			    data: "action=viewreply&model_id="+self.model_id+"&content_id="+self.content_id+"&parent_id="+comment_id+"&level="+self.level+"&user_flag="+self.user_flag,
			    dataType:'html',
			    success: function(msg){
			   	 child_comment.html(msg);
			   }
	    });
	    child_comment.attr("show_flag",'2');
	  }
   }
	
}