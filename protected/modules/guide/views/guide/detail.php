
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
                            <td colspan="6" height="30" align="center" class="edit_table_top"><div class="no_card_list_top"><div class="card_no_title_name"><b>导游员 <span><?php echo $model->User->real_name;?></span> 信息一览</b></div></div></td>
                        </tr>
                        <tr>
                            <td width="191" valign="top" align="center" style="vertical-align:middle;" rowspan="11" class="portrait_td"><div class="portrait_con"><?php if(!empty($model->guide_pass)){ $thumb_image=Util::rename_thumb_file('180','450','',$model->guide_pass);echo CHtml::image("/".$thumb_image,$model->User->real_name,array());}else{echo CHtml::image($cssPath."/images/logo.gif",$model->User->real_name,array());}?></div></td>
                            <th width="90" height="40" align="right">头像</th>
                            <td width="130" style="vertical-align:middle;"><?php if(!empty($model->guide_avater)){ $thumb_image=Util::rename_thumb_file('90','90','',$model->guide_avater); echo CHtml::image("/".$thumb_image,$model->User->real_name,array());}else{ echo CHtml::image($cssPath."/images/logo.gif",$model->User->real_name,array());}?></td>
                            <th align="right" width="90">性别</th>
                            <td><?php echo CV::$sex[$model->User->genter];?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">导游证号</th>
                            <td><?php echo $model->guide_number;?></td>
                            <th align="right">导游等级</th>
                            <td><?php echo CV::$guide_level[$model->guide_level];?></td>
                        </tr>
                        <tr>
                        <tr>
                            <th width="90" height="40" align="right">资格证号</th>
                            <td><?php echo $model->guide_qualifications;?></td>
                            <th align="right">导游学历</th>
                            <td><?php echo CV::$guide_educational[$model->guide_educational];?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">导游卡号</th>
                            <td><?php echo $model->guide_cade;?></td>
                            <th align="right">语种</th>
                            <td><?php echo $model->guide_language;?></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">所在区域</th>
                            <td><?php echo $model->guide_region_name;?></td>
                            <th align="right">语种2</th>
                            <td><?php echo $model->guide_language2;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">带团年限</th>
                            <td><?php echo $model->guide_year;?>年</td>
                            <th align="right">熟悉地</th>
                            <td><?php echo $model->guide_familiar;?></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">发证日期</th>
                            <td><?php echo $model->guide_date;?></td>
                            <th align="right">分值</th>
                            <td><?php echo $model->guide_score;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">联系电话</th>
                            <td><?php echo $model->guide_contact_phone;?></td>
                            <th align="right">导游QQ</th>
                            <td><?php echo $model->guide_qq;?>&nbsp;<a class="qqOn" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $model->guide_qq;?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $model->guide_qq;?>:41 &r=0.8940031429092906" alt="点击联系我" title="点击联系我"></a></td>
                        </tr>
                       <tr>
                        		<th height="40" align="right">审核状态</th>
                            <td><span class="green_text"><?php echo $model->show_attribute('status');?></span></td>
                            <th align="right">带团价格</th>
                            <td><?php echo $model->guide_price;?>/天</td>
                        </tr>
                        <tr>
                            <th height="40" align="right">描述</th>
                            <td colspan="3"><?php echo $model->describe;?></td>
                        </tr>
                    </table>
                 </div>
<?php if(!empty($model->guide_shenhe_pass)){ ?>
<div class="detail_top">审核信息</div>
<div class="detail-con-bg">
	 <a href="http://daoyou-chaxun.cnta.gov.cn/single_info/selectlogin_1.asp" target="_blank" title="查看更多导游信息"><?php $themb_image=Util::rename_thumb_file('700','350','',$model->guide_shenhe_pass);echo CHtml::image("/".$themb_image,$model->User->real_name,array()); ?></a>
</div>

<?php } ?>


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
<div id="guide_comments">
	   <?php
	       $this->widget('WebComment', array(      
                   'model_id'=>1,
                   'user_flag'=>true,
                   'content_id'=>$guide_id,
                   'input_type'=>'multitext',
                   'level'=>3,             
         )); 
	   ?>
</div>
</div>


</div>

<div class="main_right">
	 <?php
  		
      				if($this->beginCache(Util::get_cache_id("NewestGuide"), array('duration'=>"1"))){
                  $this->widget('NewestGuide', array( 
                     'view'=>'snewest_guide'            
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
       			
       			<?php echo Util::GetAd(8);?>
       				<?php
  		
      				if($this->beginCache(Util::get_cache_id("HotGuide"), array('duration'=>"3600*24*7"))){
                  $this->widget('HotGuide', array(      
                    'view'=>'shot_guide'       
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
	
</div>
<div class="clear_both"></div>
<script language="javascript">
var guide_id="<?= $guide_id; ?>";	
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
	
	jQuery.getJSON("/api/ordainguide", { year: year, month: month,guide_id:guide_id }, function(json){
  			if(json.flag=='y'){
  				var guide=json.datas.guide;
					var monthDay = new Date(year, month, 0).getDate();
					for(var i = 1, len = monthDay; i <= len; i++){
						var current_date=getTime(new Date(year, month-1, i)).substr(0,10);
				
						var guide_key=get_guide_key(current_date,guide);
						var innerhtml="";
						
						if(guide_key){
						  var current_guide=guide[guide_key-1];
						  var status=current_guide.status;
						  if(status=='2'){
						  	innerhtml+="<div class='date_item'><a class='text_gray'>" + i + "<br/>不空闲</a></div>";
						  }else{
						  	innerhtml+="<div class='date_item'><a class='text_red' href=\"javascript:ordain_guide('"+current_date+"')\">" + i + "<br/>空闲</a></div>";
						  } 
						}else{
							innerhtml+="<div class='date_item'><a class='text_red' href=\"javascript:ordain_guide('"+current_date+"')\">" + i + "<br/>空闲</a></div>";
						}
						cale.Days[i].innerHTML=innerhtml;
					}
  			}
	 }); 
}


function ordain_guide(current_date){
	// 用iframe显示http://www.baidu.com的内容，并设置了标题、宽与高、按钮
jQuery.jBox("iframe:/guide/guide/ordain?current_date="+current_date+"&guide_id="+guide_id, {
    title: "预定导游",
    width: 800,
    height: 500,
    buttons: { '关闭': true }
});
}
function get_guide_key(current_date,json){
	var json_length=json.length;

	for(var ii=0;ii<json_length;ii++){
		var current_json=json[ii];
		if(current_json.date==current_date){
			
			 return ii+1;
		}
	}
	return false;
}

</script>    
	      
    