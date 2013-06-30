<?php
Yii::app()->clientScript->registerScriptFile('/js/blogcalendar/calendar.js');
Yii::app()->clientScript->registerCssFile('/js/blogcalendar/calendar.css');
Yii::app()->clientScript->registerCssFile("/js/jbox/Skins2/Green/jbox.css");
Yii::app()->clientScript->registerScriptFile('/js/jbox/jquery.jBox-2.3.min.js');
Yii::app()->clientScript->registerScriptFile('/js/jbox/i18n/jquery.jBox-zh-CN.js');
?>
<?php $cssPath=$this->get_css_path();?>
        <div class="page-right-top">点击日期查看预定信息</div>
        <div class="right_tab_con">
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
       <div class="page-bottom-tip"><div class="show_gray_bg">预定已取消</div><div class="show_yellow_bg">预定中</div><div class="show_red_bg">预定成功</div></div>
     </div>
     
     
   <div class="page-right-bottom">预定成功历史记录</div>
      <div class="right_tab_con">
      	
 <?php
	  $form=$this->beginWidget('EActiveForm', array(
	        'id'=>'search_form',
          'action'=>"",
	        'enableAjaxValidation'=>false,
	        'htmlOptions'=>array('id'=>'search_form','enctype'=>'multipart/form-data'),
         ));
         ?>
            		<table cellspacing="0" cellpadding="0">
                        <tbody><tr>
                            <td width="100" height="30" align="right"><strong>导游名称:</strong></td>
                            <td>
                            	<?php echo EHtml::createText("guide_name",$page_params['guide_name'],array());?>
                             </td>
                            
                            <td width="80" align="right"><strong>线路名称:</strong></td>
                            <td>
                            	 <?php echo EHtml::createText("line",$page_params['line'],array());?>
	                     		  </td>
	                     		</tr>
	                     		<tr>
	                     		  <td width="100" align="right"><strong>带团时间:</strong></td>
                            <td>
                            	 <?php echo EHtml::createDate("date",$page_params['date'],array('dateFmt'=>'yyyy-MM-dd'));?>
	                     		  </td>
	                     		  
	                     				<td colspan="2"><input type="submit" value="" class="sch-main-bt"></td>
                        </tr>
                        
                    </tbody></table>
                    
 <?php $this->endWidget(); ?> 
                                                        
 <?php 
  $this->widget('zii.widgets.grid.CGridView',array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
            array(
                'name'=>'导游名称',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->show_attribute("user_id")',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
                'name'=>'线路名称',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->AgencyDate->line',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
                'name'=>'开始时间',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->AgencyDate->start_date',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
                'name'=>'结束时间',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->AgencyDate->end_date',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ), 
            array(
                'name'=>'预定时间',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->show_attribute("operate_time")',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
    ),
    'ajaxUpdate'=>true,
    )); 
?>
</div>    
<script language="javascript">
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
	jQuery.getJSON("/api/agencycalendar", { year: year, month: month }, function(json){
  			if(json.flag=='y'){
					var ordain=json.datas.ordain;
					var monthDay = new Date(year, month, 0).getDate();
					var scheduler_color=new Array("#eed7f1","#e1d7f1","#d7e1f1","#d7f1eb","#e3f1d7","#f1e4d7");
					for(var i = 1, len = monthDay; i <= len; i++){
						var current_date=getTime(new Date(year, month-1, i)).substr(0,10);
						var ordain_key=get_ordain_key(current_date,ordain);
						var innerhtml="";
						var ordain_key_length=ordain_key.length;
						innerhtml+="<div class='date_item'>"+i+"</div>";
						if(ordain_key_length){
							for(var jj=0;jj<ordain_key_length;jj++){
								var current_ordain_key=ordain_key[jj];
								var current_ordain=ordain[current_ordain_key];
								var status=current_ordain.status;
								var mod=jj%6;
								var background_color=scheduler_color[mod];
								if(status=='2'){
									innerhtml+="<div class='date_item' style='background-color:"+background_color+"'><a class='text_yellow' href=\"javascript:view_ordain('"+current_ordain.id+"');\">"+current_ordain.line+"</a></div>";
								}else if(status=='3'){
									innerhtml+="<div class='date_item' style='background-color:"+background_color+"'><a class='text_red' href=\"javascript:view_ordain('"+current_ordain.id+"');\">"+current_ordain.line+"</a></div>";
                }else if(status=='4'){
									innerhtml+="<div class='date_item' style='background-color:"+background_color+"'><a class='text_gray' href=\"javascript:view_ordain('"+current_ordain.id+"');\">"+current_ordain.line+"</a></div>";
								}else if(status=='5'){
									innerhtml+="<div class='date_item' style='background-color:"+background_color+"'><a class='text_gray' href=\"javascript:view_ordain('"+current_ordain.id+"');\">"+current_ordain.line+"</a></div>";
								}else{
									innerhtml+="<div class='date_item' style='background-color:"+background_color+"'><a href=\"javascript:view_ordain('"+current_ordain.id+"');\">"+current_ordain.line+"</a></div>";
								}
							}
						}
						cale.Days[i].innerHTML=innerhtml;
					}
  			}
	 }); 
}
function view_ordain(ordain_id){
	// 用iframe显示http://www.baidu.com的内容，并设置了标题、宽与高、按钮
jQuery.jBox("iframe:/user/viewgordain?id="+ordain_id, {
    title: "查看预定信息",
    width: 800,
    height: 600,
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