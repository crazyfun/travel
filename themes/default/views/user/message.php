<?php
   Yii::app()->clientScript->registerCssFile("/js/jbox/Skins2/Green/jbox.css");
		Yii::app()->clientScript->registerScriptFile('/js/jbox/jquery.jBox-2.3.min.js');
    Yii::app()->clientScript->registerScriptFile('/js/jbox/i18n/jquery.jBox-zh-CN.js');
?>


<div class="tabmenu">
<ul>
<li><a href="<?php echo $this->createUrl("user/message",array('type'=>'1'));?>" title="" id="tablink1" class="<?php if($type=='1'){echo "tabactive";}?>">写站内信</a></li>
<li><a href="<?php echo $this->createUrl("user/message",array('type'=>'2'));?>" title="" id="tablink2" class="<?php if($type=='2'){echo "tabactive";}?>">收件箱</a></li>
<li><a href="<?php echo $this->createUrl("user/message",array('type'=>'3'));?>" title="" id="tablink3" class="<?php if($type=='3'){echo "tabactive";}?>">发件箱</a></li>

</ul>
</div>
<!--End of the Tabmenu 1 -->
<? if($type=='1'){ ?>
<?php
	  $form=$this->beginWidget('EActiveForm', array(
	        'id'=>'search_form',
          'action'=>"",
	        'enableAjaxValidation'=>false,
	        'htmlOptions'=>array('id'=>'search_form','enctype'=>'multipart/form-data'),
         ));
         echo CHtml::hiddenField('type',$type,array());
         echo CHtml::hiddenField('action',"send",array());
?>
<!--Start Tabcontent 1 -->
<div id="tabcontent1">
	<div class="inbox">
        <div class="composer">
        <div class="composer_fields">
        	<?php $this->widget("FlashInfo");?>
        	<dl>
               <dt><font color="#ff0000">*</font>&nbsp;收件人：</dt>
        	   <dd><?php echo $form->createAuto($model,"user_id",$user_name,array('serviceUrl'=>$this->createUrl('api/searchuser'),'class'=>'inputtext'));?><?php echo $form->error($model,"user_id");?>
        	   </dd>
               <dt><font color="#ff0000">*</font>&nbsp;主题：</dt>
        	   <dd><?php echo $form->createText($model,"title",array('class'=>'inputtext'));?><?php echo $form->error($model,"title");?></dd>
               <dt><font color="#ff0000">*</font>&nbsp;内容：</dt>
        	   <dd>
        	   	 <?php echo $form->createTextarea($model,"content",array('class'=>'inputtext2'));?><?php echo $form->error($model,"content");?>
        	   </dd>
               <dt></dt>
               <DD><?php echo CHtml::submitButton("发送",array('class'=>"bntsubmit"));?>
               	<?php echo CHtml::resetButton("取消",array('class'=>'bntsubmit gray'));?>
               
               </DD>
            </dl>
        </div>
        <div style="clear:both"></div>
        </div>
	</div>
</div>
<?php $this->endWidget(); ?>
<!--End Tabcontent 1-->
<?php }elseif($type=="2"){ ?>


<!--Start Tabcontent 2-->
<?php
	  $form=$this->beginWidget('EActiveForm', array(
	        'id'=>'search_form',
          'action'=>"",
	        'enableAjaxValidation'=>false,
	        'htmlOptions'=>array('id'=>'search_form','enctype'=>'multipart/form-data'),
         ));
         echo CHtml::hiddenField('type',$type,array());
         echo CHtml::hiddenField('action',"delete",array());
?>
<div id="tabcontent2">
<div class="inbox">
	<div class="inbox_menu">
    	<div class="menu_block">选择：<select name="operate" id="operate" class="operate">
    	  <option selected="selected">----</option>
    	  <option value="1">不选</option>
    	  <option value="2">未读</option>
    	  <option value="3">已读</option>
    	  <option value="4">全部</option>
    	</select></div>
        <div class="menu_buttons">
        	<ul>
               <li><a href="javascript:document.getElementById('search_form').submit();">删除</a> </li>
          </ul>
        
        </div>
    <div style="clear:both"></div>
    </div>
    <table width="100%"  cellpadding="0" cellspacing="0">
  <tbody>
   <?php   
    	 $this->widget('zii.widgets.CListView',array(
						'dataProvider'=>$dataProvider,
						'itemView'=>"message_item",
						'ajaxUpdate'=>true,
						'viewData'=>array('type'=>$type),
				));
       
	?>

  </tbody>
  </table>
</div>
</div>
<!--End Tabcontent 2 -->
<?php $this->endWidget(); ?>
<?php }else{ ?>
<?php
	  $form=$this->beginWidget('EActiveForm', array(
	        'id'=>'search_form',
          'action'=>"",
	        'enableAjaxValidation'=>false,
	        'htmlOptions'=>array('id'=>'search_form','enctype'=>'multipart/form-data'),
         ));
         echo CHtml::hiddenField('type',$type,array());
         echo CHtml::hiddenField('action',"delete",array());
?>
<!--Start Tabcontent 3-->
<div id="tabcontent3">
<div class="inbox">
	<div class="inbox_menu">
    	<div class="menu_block">选择：<select name="operate" id="operate" class="operate">
    	  <option selected="selected">----</option>
    	  <option value="1">不选</option>
    	  <option value="2">未读</option>
    	  <option value="3">已读</option>
    	  <option value="4">全部</option>
    	</select></div>
        <div class="menu_buttons">
        	  <ul>
                <li><a href="javascript:document.getElementById('search_form').submit();">删除</a> </li>
            </ul>
        
        </div>
    <div style="clear:both"></div>
    </div>
   
    <table width="100%"  cellpadding="0" cellspacing="0">
  <tbody>
      <?php   
    	 $this->widget('zii.widgets.CListView',array(
						'dataProvider'=>$dataProvider,
						'itemView'=>"message_sitem",
						'ajaxUpdate'=>true,
						'viewData'=>array('type'=>$type),
				));
			?>
  </tbody>
  </table>
</div>

</div>
<?php $this->endWidget(); ?>
<!--End Tabcontent 3-->
<?php } ?>
            	
<script language="javascript">
	jQuery(function(){
		jQuery("#operate").bind("change",function(){
			//var check_text=jQuery(this).find("option:selected").text(); 
			var check_value=jQuery(this).val();
			switch(check_value){
				case '1':
				  jQuery(".check_ids").each(function(){
  					  jQuery(this).attr("checked",false);
					}); 
				  break;
				case '2':
				   jQuery(".check_ids").each(function(){
				   	  var status_flag=jQuery(this).attr("status");
				   	  if(status_flag=='1'){
				   	  	jQuery(this).attr("checked",true);
				   	  }else{
				   	  	jQuery(this).attr("checked",false);
				   	  }
  					  
					}); 
				  break;
				case '3':
				    jQuery(".check_ids").each(function(){
				   	  var status_flag=jQuery(this).attr("status");
				   	  if(status_flag=='1'){
				   	  	jQuery(this).attr("checked",false);
				   	  }else{
				   	  	jQuery(this).attr("checked",true);
				   	  }
  					  
					}); 
				  break;
				case '4':
				  jQuery(".check_ids").each(function(){
  					  jQuery(this).attr("checked",true);
					});
				  break;
				default:
				  break;
			}
		});
		
	});
	function delete_message(id){
		
		var submit = function (v, h, f) {
    if (v == 'ok'){
      jQuery.ajax({
			  async:true,
        type: "Get",
        cache:true,
        beforeSend:function(){},
        url: "/user/message",
        dataType:"json",
        data: "action=ajax_delete&id="+id,
        success: function(msg){
          if(msg.flag=='1'){
          	var datas=msg.datas;
          	var delete_id=datas.id;
          	var delete_obj=document.getElementById("message_item_"+delete_id);
          	delete_obj.parentNode.removeChild(delete_obj);
          }else if(msg.flag=='2'){
          	 jBox.tip(msg.message, 'info');
          }else{
        	
          }
        }
      });
        
    }else if (v == 'cancel'){
        
    }
    return true;
  };
  jQuery.jBox.confirm("确定要删除吗？","提示", submit);
}
</script>