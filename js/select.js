jQuery(function()
{
   jQuery(".select_js").click(block_fn);
    jQuery(".select_js ul li").click(function(){
        var text = jQuery(this).text();
        jQuery(".select_js p").text(text);
        var act  = jQuery(this).attr("ectype");
        jQuery(".select_js input").val(act);
    }).hover(function(
    ){
    	jQuery(this).addClass("search_ul_li_hover");
    },function(){
    	jQuery(this).removeClass("search_ul_li_hover");
    });
    //jQuery('body').click(mouseLocation); 
});

function block_fn()
{
	  var select_js_ul=jQuery(".select_js ul");
	  if(select_js_ul.css("display")=="block"){
	  	select_js_ul.hide();
	  }else{
	  	
	  	select_js_ul.show();
	  }

}

