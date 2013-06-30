 <div class="flash_ad">
                <div class="scroll_imgs"><!--scroll_imgs--> 

                    <div id="idContainer2" class=conflash>
                        <table id=idSlider2 border=0 cellSpacing=0 cellPadding=0>
                            <TBODY>
                                <tr>
                                	<?php foreach($ad_datas as $key => $value){?>
                                    <td class=td_f><a title="<?php echo $value->describe;?>" href="<?php echo $value->img_href;?>"><?php echo CHtml::image("/".$value->flash_img,$value->describe,array('height'=>'307px','width'=>'715px'));?></a></td>
                                   
                                  <?php } ?>
                                </tr>
                            </TBODY>
                        </table>
                        
                        <UL id=idNum class=num>
                        </UL>
                    </div>
                </div>
                <!--scroll_pic end--> 
            </div>
            <!--flash_ad end-->
            		  		<!--content right end -->
<script language="javascript">
   jQuery(function(){
  
			
			//new SlideTrans("idContainer", "idSlider", 3).Run();
///////////////////////////////////////////////////////////
var forEach = function(array, callback, thisObject){
 if(array.forEach){
  array.forEach(callback, thisObject);
 }else{
  for (var i = 0, len = array.length; i < len; i++) { callback.call(thisObject, array[i], i, array); }
 }
}
var st = new SlideTrans("idContainer2", "idSlider2", 4, { Vertical: false });
var nums = [];
//插入数字
for(var i = 0, n = st._count - 1; i <= n;){
 (nums[i] = document.getElementById("idNum").appendChild(document.createElement("li"))).innerHTML = ++i;
}
forEach(nums, function(o, i){
 o.onmouseover = function(){ o.className = "on"; st.Auto = false; st.Run(i); }
 o.onmouseout = function(){ o.className = ""; st.Auto = true; st.Run(); }
})
//设置按钮样式
st.onStart = function(){
 forEach(nums, function(o, i){ o.className = st.Index == i ? "on" : ""; })
}
st.Run();
 });
</script> 