<div class="pop_ordain">
	<div class="page-right-top">线路信息</div>
<?php 
  $this->widget('zii.widgets.grid.CGridView',array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
            array(
                'name'=>'start_date',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->start_date',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
                'name'=>'end_date',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->end_date',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
                'name'=>'line',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->line',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
               'name'=>'address',
               'type'=>'raw',
               'value'=>'$data->address',
            ),
            array(
               'name'=>'numbers',
               'type'=>'raw',
               'value'=>'$data->show_attribute("numbers")',
            ),
            array(
               'name'=>'cost',
               'type'=>'raw',
               'value'=>'$data->show_attribute("cost")',
            ),
            
            array(
               'name'=>'操作',
               'type'=>'raw',
               'value'=>'$data->get_ordain_operate("'.$guide_id.'")',
            )
    ),
    'ajaxUpdate'=>true,
    )); 
?>
<div  class="page-right-top"><div id="add_agency_date">增加线路</div></div>
<div id="agency_date" style="<?php $model_error=$model->getErrors(); if(!empty($model_error)){echo "display:block;";}else{ echo "display:none;";} ?>">
	   <?php 
    		 $form=$this->beginWidget('EActiveForm', array(
	        			'id'=>'',
          			'action'=>"",
	        		  'enableAjaxValidation'=>false,
	        		  'htmlOptions'=>array('id'=>'registe_from','enctype'=>'multipart/form-data'),
         	));
         	echo $form->createHidden($model,"id",array());
      ?>
                	<div class="flash_info"><?php $this->widget("FlashInfo");?></div>
									<div class="input_line"><div class="input_name"><span class="input_required">*</span>开始时间:</div><div class="input_content"><?php echo $form->createDate($model,"start_date",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"start_date");?></div><div class="input_tip"></div></div>
									<div class="input_line"><div class="input_name"><span class="input_required">*</span>结束时间:</div><div class="input_content"><?php echo $form->createDate($model,"end_date",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"end_date");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required">*</span>线路:</div><div class="input_content"><?php echo $form->createText($model,"line",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"line");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required">*</span>游客人数:</div><div class="input_content"><?php echo $form->createNumber($model,"numbers",array('class'=>'text-put'));?>人</div><div class="content_error"><?php echo $form->error($model,"numbers");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required">*</span>接团地址:</div><div class="input_content"><?php echo $form->createText($model,"address",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"address");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required">*</span>接团时间:</div><div class="input_content"><?php echo $form->createDate($model,"date",array('dateFmt'=>'yyyy-MM-dd HH:mm:ss','class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"date");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required">*</span>线路景点:</div><div class="input_content"><?php echo $form->createTextarea($model,"attractions",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"attractions");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required">*</span>导游费用:</div><div class="input_content"><?php echo $form->createNumber($model,"cost",array('class'=>'text-put'));?>元/天</div><div class="content_error"><?php echo $form->error($model,"cost");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required">*</span>其他费用:</div><div class="input_content"><?php echo $form->createTextarea($model,"subsidies",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"subsidies");?></div><div class="input_tip"></div></div>
                  <div class="input_line"><div class="input_button"><?php echo CHtml::submitButton("提交",array('class'=>'save_bt'));?><?php echo CHtml::resetButton("重置",array('class'=>'save_bt'));?></div></div>
    <?php $this->endWidget(); ?> 		
    	
 </div>
</div>
<script language="javascript">
	jQuery(function(){
		toggle({'source':'add_agency_date','target':'agency_date','show_class':'show_agency','hide_class':'hide_agency','reverse':false,'effect':'3','effect_time':"fast"});
	});
</script>


