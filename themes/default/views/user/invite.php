<?php 
  Yii::app()->clientScript->registerCssFile("/js/jbox/Skins2/Green/jbox.css");
	Yii::app()->clientScript->registerScriptFile('/js/jbox/jquery.jBox-2.3.min.js');
	Yii::app()->clientScript->registerScriptFile('/js/jbox/i18n/jquery.jBox-zh-CN.js');
  Yii::app()->clientScript->registerScriptFile('/js/zclip/jquery.zclip.min.js');
?>
              <div class="page-right-top">我的邀请(邀请用户赠送<span class="text_red"><?php echo $sfc_invite_coupon;?></span>抵用劵,一个IP只能被邀请一次。)</div>
            	<div class="invite_information">
            		 <div class="input_line" style="width:100%;"><div class="input_name"><span class="input_required"></span><font color="#ff6600">我的专有邀请函:</font></div><div class="input_content" style="width:565px;"><span id="invite_code"><?php echo $user_data->get_invite_link();?></span><a href="#" id="copy_invite_code" class="sure_bt_link">复制</a></div></div>
            	</div>
            	
            	<div class="invite_lists">
            		<?php 
  $this->widget('zii.widgets.grid.CGridView',array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
            array(
                'name'=>'invite_id',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->Invite->user_login',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
                'name'=>'invite_ip',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->invite_ip',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
                'name'=>'create_time',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->show_attribute("create_time")',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
           
            
         
    ),
    'ajaxUpdate'=>true,
    )); 
?>
            	</div>
            	
            	<script language="javascript">

            		
            		
jQuery(document).ready(function(){
    jQuery("a#copy_invite_code").zclip({
        path:'/js/zclip/ZeroClipboard.swf',
        copy:jQuery('#invite_code').html(),
        beforeCopy:function(){
            
        },
        afterCopy:function(){
        	  jQuery.jBox.tip("您已经复制到剪切板了，请使用Ctrl+V进行粘贴。");

        }
    });

});


            	</script>
               
            