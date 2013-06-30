<div class="main-left">
<?php
$cssPath=$this->get_css_path();
Yii::app()->clientScript->registerScriptFile('/js/blogcalendar/calendar.js');
Yii::app()->clientScript->registerScriptFile('/js/comments.js');
Yii::app()->clientScript->registerCssFile($cssPath.'/comment.css');
Yii::app()->clientScript->registerCssFile('/js/blogcalendar/calendar.css');
Yii::app()->clientScript->registerCssFile("/js/jbox/Skins2/Green/jbox.css");
Yii::app()->clientScript->registerScriptFile('/js/jbox/jquery.jBox-2.3.min.js');
Yii::app()->clientScript->registerScriptFile('/js/jbox/i18n/jquery.jBox-zh-CN.js');
?>
                <div class="detail_top">详细信息</div>
               <div class="edit_table detail-con-bg tour_guide">
                 <table cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td width="191" valign="top" style="vertical-align:middle;" align="center" rowspan="11" class="portrait_td"><div class="portrait_con"><?php if(!empty($model->agency_logo)){ $thumb_image=Util::rename_thumb_file('180','450','',$model->agency_logo);echo CHtml::image("/".$thumb_image,$model->agency_name,array());}else{ echo CHtml::image($cssPath."/images/logo.gif",$model->agency_name,array());}?></div></td>
                            <th width="90" height="40" align="right">旅行社名称</th>
                            <td width="130"><?php echo $model->agency_name;?></td>
                            <th align="right" width="90">旅行社邮箱</th>
                            <td><?php echo $model->agency_email;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">所在区域</th>
                            <td><?php echo $model->guide_region_name;?></td>
                            <th align="right">旅行社座机</th>
                            <td><?php echo $model->agency_telephone;?></td>
                        </tr>
                        <tr>
                        <tr>
                            <th width="90" height="40" align="right">旅行社部门</th>
                            <td><?php echo $model->agency_department;?></td>
                            <th align="right">旅行社传真</th>
                            <td><?php echo $model->agency_fax;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">旅行社地址</th>
                            <td colspan="3"><?php echo $model->agency_address;?></td>
              
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">联系人</th>
                            <td><?php echo $model->contacter;?></td>
                            <th align="right">联系电话</th>
                            <td><?php echo $model->contacter_phone;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">联系QQ</th>
                            <td><?php echo $model->contacter_qq;?>&nbsp;<a class="qqOn" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $model->contacter_qq;?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $model->contacter_qq;?>:41 &r=0.8940031429092906" alt="点击联系我" title="点击联系我"></a></td>
                            <th align="right">联系QQ2</th>
                            <td><?php echo $model->contacter_qq2;?>&nbsp;<a class="qqOn" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $model->contacter_qq2;?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $model->contacter_qq2;?>:41 &r=0.8940031429092906" alt="点击联系我" title="点击联系我"></a></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">联系QQ3</th>
                            <td><?php echo $model->contacter_qq3;?>&nbsp;<a class="qqOn" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $model->contacter_qq3;?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $model->contacter_qq3;?>:41 &r=0.8940031429092906" alt="点击联系我" title="点击联系我"></a></td>
                            <th align="right">审核状况</th>
                            <td><span class="green_text"><?php echo $model->show_attribute("status");?></span></td>
                        </tr>

                        <tr>
                            <th height="40" align="right">描述</th>
                            <td colspan="3"><?php echo $model->describe;?></td>
                        </tr>
                        
                       
                    </table>
                 </div>     



<div class="calendar_wrapper">
	<div class="detail_top">预定信息</div>
	<div class="detail-con-bg">
    <table cellpadding="0" cellspacing="0" width="100%" class="date_tab">
              <colgroup>
							<col width="15%" />
							 <col width="14%" />
							 <col width="14%" />
							 <col width="14%" />
							 <col width="14%" />
							 <col width="14%" />
							 <col />
              </colgroup>
           <thead>
						<tr>
							<td colspan="7" class="tab_td_1"><div class="tab-top-date"><div class="pre_date"><a href="javascript:void():"  id="pre_date"><img src="<?php echo $cssPath;?>/images/date_left.jpg" /></a></div><div class="center_date"><span id="idCalendarYear"></span>年<span id="idCalendarMonth"></span>月</div><div class="next_date"><a href="javascript:void():"  id="next_date"><img src="<?php echo $cssPath;?>/images/date_right.jpg" /></a></div></div></td>
						</tr>
						<tr class="date_top_tr">
                        	<td><span class="weekend">日</span></td><td>一</td><td>二</td><td>三</td><td>四</td><td>五</td><td><span class="weekend">六</span></td>
            </tr>
					</thead>
						<tbody id="idCalendar">
                    	
            </tbody>
       </table>
     </div>
</div>  


 
<div class="detail_top">评论信息</div>
<div class="detail-con-bg">
<div id="agency_comments">
	<?php
	       $this->widget('WebComment', array(      
                   'model_id'=>2,
                   'user_flag'=>true,
                   'content_id'=>$agency_id,
                   'input_type'=>'multitext',
                   'level'=>3,             
         )); 
	   ?>
</div>
</div>

</div>



<div class="main_right">
	
	 					<?php
  		
      				if($this->beginCache(Util::get_cache_id("WBaiduMaps"), array('duration'=>"1"))){
                  $this->widget('WBaiduMaps', array( 
                     'coordinate'=>$model->coordinate, 
                     'address'=>$model->agency_address          
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
       			
       			
	         <?php
  		
      				if($this->beginCache(Util::get_cache_id("NewestGuide"), array('duration'=>"1"))){
                  $this->widget('NewestAgency', array( 
                     'view'=>'snewest_agency'            
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
       			
       			<?php echo Util::GetAd(9);?>
       				<?php
  		
      				if($this->beginCache(Util::get_cache_id("HotGuide"), array('duration'=>"3600*24*7"))){
                  $this->widget('HotAgency', array(      
                    'view'=>'shot_agency'       
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
	
</div>
<div class="clear_both"></div>
<script language="javascript">
var agency_id="<?= $agency_id; ?>";	
jQuery(function(){
        
});  
	  
 
	
	var cale = new Calendar("idCalendar", {
	//SelectDay: new Date().setDate(10),
	onSelectDay: function(o){ o.className = "onSelect"; },
	onToday: function(o){ o.className = "onToday"; },
	onFinish: function(){
     document.getElementById("idCalendarYear").innerHTML = this.Year; document.getElementById("idCalendarMonth").innerHTML = this.Month;	  
	  
	}
});
if(cale){
	get_scheduler_datas(cale.Year,cale.Month);
}
document.getElementById("pre_date").onclick = function(){ cale.PreMonth();get_scheduler_datas(cale.Year,cale.Month); }
document.getElementById("next_date").onclick = function(){ cale.NextMonth();get_scheduler_datas(cale.Year,cale.Month); }
function get_scheduler_datas(year,month){
  
	jQuery.getJSON("/api/ordainagency", {year: year, month: month,agency_id:agency_id}, function(json){
		    
  			if(json.flag=='y'){
  				var ordain=json.datas.ordain;
					var monthDay = new Date(year, month, 0).getDate();
					var scheduler_color=new Array("#eed7f1","#e1d7f1","#d7e1f1","#d7f1eb","#e3f1d7","#f1e4d7");
					for(var i = 1, len = monthDay; i <= len; i++){
						
						var current_date=getTime(new Date(year, month-1, i)).substr(0,10);
						var ordain_key=get_ordain_key(current_date,ordain);
						var innerhtml="";
						var ordain_key_length=ordain_key.length;
						innerhtml+="<div class='date_item'>" + i + "</div>";
						if(ordain_key_length){
							for(var jj=0;jj<ordain_key_length;jj++){
								var current_ordain_key=ordain_key[jj];
								var current_ordain=ordain[current_ordain_key];
								var mod=jj%6;
								var background_color=scheduler_color[mod];
							  innerhtml+="<div class='date_item' style='background-color:"+background_color+"'><a href=\"javascript:ordain_agency('"+current_ordain.id+"');\">"+current_ordain.line+"</a></div>";
							}
						}
						cale.Days[i].innerHTML=innerhtml;
					}
  			}
	 }); 
}


function ordain_agency(date_id){
	// 用iframe显示http://www.baidu.com的内容，并设置了标题、宽与高、按钮
jQuery.jBox("iframe:/agency/agency/ordain?date_id="+date_id+"&agency_id="+agency_id, {
    title: "预定旅行社线路",
    width: 800,
    height: 500,
    buttons: { '关闭': true }
});
}

function get_ordain_key(current_date,json){
	var json_length=json.length;
	var return_array=new Array();
	for(var ii=0;ii<json_length;ii++){
		var current_json=json[ii];
		if(current_json.start_date<=current_date&&current_date<=current_json.end_date){
			 return_array.push(ii);
		}
	}
	return return_array;
}

</script>    
	      
    