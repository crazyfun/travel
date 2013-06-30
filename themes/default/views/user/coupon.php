              <?php $coupon_type=Util::com_search_item(array(''=>'类型'),CV::$consume_type); ?>
              <div class="page-right-top">抵用卷明细(现拥有抵用卷:<span class="text_red"><?php echo $user_data->conpon; ?></span>)</div>
            	<div class="coupon_search">
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
                            <td width="60" height="30" align="right"><strong>类型:</strong></td>
                            <td><?php echo EHtml::createSelect("type",$page_params['type'],$coupon_type,array());?></td>
                            
                            <td width="80" align="right"><strong>开始时间:</strong></td>
                            <td>
                            	 <?php echo EHtml::createDate("start_time",$page_params['start_time'],array('dateFmt'=>'yyyy-MM'));?>
	                     		  </td>
	                     		   <td width="80" align="right"><strong>结束时间:</strong></td>
                            <td>
                            	<?php echo EHtml::createDate("end_time",$page_params['end_time'],array('dateFmt'=>'yyyy-MM'));?>
	                     		  </td>
	                     				<td><input type="submit" value="" class="sch-main-bt"></td>
                        </tr>
                        
                    </tbody></table>
                    
                   <?php $this->endWidget(); ?> 
                    
            	</div>
            	
            	<div class="coupon_lists">
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
                'name'=>'value',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->show_attribute("value")',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
             array(
                'name'=>'剩余积分',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->remain',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
                'name'=>'comment',
                'type'=>'raw',
                'value'=>'$data->comment',
             
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

            	</script>
               
            