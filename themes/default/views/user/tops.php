              <?php
                 $cssPath=$this->get_css_path();
                 	Yii::app()->clientScript->registerCssFile("/js/jbox/Skins2/Green/jbox.css");
									Yii::app()->clientScript->registerScriptFile('/js/jbox/jquery.jBox-2.3.min.js');
									Yii::app()->clientScript->registerScriptFile('/js/jbox/i18n/jquery.jBox-zh-CN.js');
              ?>
              <div class="page-right-top">选择置顶规则</div>
              <div class="right_tab_con zd">
              <?php 
    								  $form=$this->beginWidget('EActiveForm', array(
	        							'id'=>'',
          							'action'=>"",
	        							'enableAjaxValidation'=>false,
	        							'htmlOptions'=>array('id'=>'tops_from','enctype'=>'multipart/form-data'),
         							));
         							echo $form->createHidden($model,"id",array());
         							echo $form->createHidden($model,'type',array());
         							echo $form->createHidden($model,'relation_id',array());
        					?>
              <table width="100%" border="0">
  	<tr>
    	<td width="29%" align="right"><strong>未置顶的页面，马上置顶:</strong></td>
   	 	<td width="56%">开始日期默认为明天,开始时间默认下一小时。</td>
   	 	<td width="15%">&nbsp;</td>
    </tr>
    <tr>
    	<td>开始日期：</td>
    	<td><?php echo $form->createDate($model,"start_date",array('dateFmt'=>'yyyy-MM-dd'));?></td>
    	<td><div class="content_error"><?php  echo $form->error($model,"start_date");?></div></td>
    </tr>
    <tr>
    	<td>开始时间：</td>
    	<td><?php echo $form->createDate($model,"start_time",array('dateFmt'=>'HH:00:00'));?></td>
    	<td><div class="content_error"><?php  echo $form->error($model,"start_time");?></div></td>
    </tr>
  <tr>
    <td>选择置顶时长：</td>
    <td>
    
    	<?php foreach($top_hours as $key => $value){
    		      $select_flag=false;
    		      if($value->id==$model->hours){
    		      	$select_flag=true;
    		      }
    	   			echo CHtml::radioButton("hours",$select_flag,array('value'=>$value->id,'class'=>'hours_radio','price'=>$value->value));
    	   			echo '&nbsp;'.$value->name."&nbsp;";
         } ?>
    
    </td>
    <td><div class="content_error"><?php  echo $form->error($model,"hours");?></div></td>
  </tr>
    
   <tr>
    	<td>持续时间：</td>
    	<td><?php echo $form->createSelect($model,"days",CV::$top_days,array());?>天</td>
    	<td><div class="content_error"><?php  echo $form->error($model,"days");?></div></td>
    </tr>
  <tr>
    <td colspan="3"><div class="zd_mess">此次置顶每天需要花费您<span class="zf_m" id="zhiding_price">0.00</span>元， 您的可用余额为<span class="zf_m"><?php echo $user->conpon;?></span>元。</div></td>
    </tr>
  <tr>
    <td align="right"><?php echo $form->createCheck($model,'agreement',array('value'=>'1')); ?>
      同意<a href="javascript:show_agree();">置顶规则</a> </td>
    <td><?php echo CHtml::submitButton("完成置顶",array('class'=>'zd_bt'));?></td>
    <td><div class="content_error"><?php  echo $form->error($model,"agreement");?></div></td>
    </tr>
</table>
<?php $this->endWidget(); ?>
</div>
<script language="javascript">
	jQuery(function(){
		  jQuery(".hours_radio").each(function(){
        var checked=jQuery(this).attr("checked");
        if(checked){
        	 var price = jQuery(this).attr("price");
       		 change_price(price);
        }
      }); 
		  jQuery(".hours_radio").bind('click',function(){
		  	
		  	var price = jQuery(this).attr("price");
		  	change_price(price);
		  });
		
	});
	function change_price(price){
		jQuery("#zhiding_price").html(price);
	}
	
	 function show_agree(){
         	  jQuery.jBox("iframe:/user/toprules", {
   						 title: "置顶协议",
    					 width: 800,
    					 height: 500,
    						buttons: { '关闭': true }
							});
         }
</script>
            	
            