          <?php 
             $top_status=Util::com_search_item(array(''=>'发布状态'),CV::$top_status);
          ?>
           <div class="page-right-top">我的置顶</div>
              <div class="tops_search">
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
                            <td width="100" align="right"><strong>置顶开始时间:</strong></td>
                            <td>
                            	 <?php echo EHtml::createDate("start_time",$page_params['start_time'],array('dateFmt'=>'yyyy-MM-dd'));?>
	                     		  </td>
	                     		   <td width="100" align="right"><strong>置顶结束时间:</strong></td>
                            <td>
                            	 <?php echo EHtml::createDate("end_time",$page_params['end_time'],array('dateFmt'=>'yyyy-MM-dd'));?>
	                     		  </td>
	                     		</tr>
	                     		<tr><td colspan="4" height="10"></td></tr>
	                     		<tr>
	                     		  <td width="100" align="right"><strong>发布状态:</strong></td>
                            <td>
                            	 <?php echo EHtml::createSelect("status",$page_params['status'],$top_status,array());?>
	                     		  </td>
	                     		  
	                     		<td colspan="2"><input type="submit" value="" class="sch-main-bt"></td>
                        </tr>
                        
                    </tbody></table>
                    
                   <?php $this->endWidget(); ?>   
            	</div>
            	<div class="tops_lists">
            		<?php 
  $this->widget('zii.widgets.grid.CGridView',array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
            array(
                'name'=>'type',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->show_attribute("type")',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
                'name'=>'relation_id',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->show_attribute("relation_id")',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
                'name'=>'置顶时间',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->get_start_time()',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
           
            array(
                'name'=>'hours',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->show_attribute("hours")',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
                'name'=>'days',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->show_attribute("days")',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
                'name'=>'过期时间',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->get_end_time()',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
                'name'=>'status',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->show_attribute("status")',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
        
            
           array(
                'name'=>'操作',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->get_web_operate()',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ), 
    ),
    'ajaxUpdate'=>true,
    )); 
?>
            	</div>
            	
            	
            