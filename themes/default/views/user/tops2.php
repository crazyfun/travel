              <?php
                 $cssPath=$this->get_css_path();
              ?>
            	<div class="page-right-top">确认置顶信息</div>
            	<div class="right_tab_con zhifu">
            		<div class="flash_info"><?php $this->widget("FlashInfo");?></div>
            		 <?php 
    								  $form=$this->beginWidget('EActiveForm', array(
	        							'id'=>'',
          							'action'=>"",
	        							'enableAjaxValidation'=>false,
	        							'htmlOptions'=>array('id'=>'tops_from','enctype'=>'multipart/form-data'),
         							));
         							echo CHtml::hiddenField("action","tops",array());
         							echo CHtml::hiddenField("id",$top_id,array());
         						
        					?>
                  <table width="100%" border="0">
                  	<tr>
    										<td width="22%" align="right">余额：</td>
    										<td width="78%"><span class="zf_m"><?php echo $coupon;?></span>元</td>
    									</tr>
  										
  										<tr>
    										<td align="right">需支付额：</td>
    										<td><span class="zf_m"><?php echo $total_price;?></span>元</td>
    									</tr>
    									
    									<tr>
    										<td align="right">置顶日期：</td>
    										<td><span class="zf_m"><?php echo $tops_data->start_date;?></span></td>
    									</tr>
    									
    									
    									<tr>
    										<td align="right">置顶时间：</td>
    										<td><span class="zf_m"><?php echo $tops_data->start_time;?></span></td>
    									</tr>
    									
    									
    									<tr>
    										<td align="right">置顶时长：</td>
    										<td><span class="zf_m"><?php echo $tops_data->ConfigValues->name;?></span></td>
    									</tr>
    									
    									
    									<tr>
    										<td align="right">持续时间：</td>
    										<td><span class="zf_m"><?php echo $tops_data->days;?></span>天</td>
    									</tr>
    								<?php if(!$is_top){ ?>	
    									<tr>
    										<td colspan='2' align="right"><font color="#ff6600">您的余额不足，请充值<span class="text_red"><?php echo $diff_price; ?></span>后再行置顶。</font></td>	
    									</tr>
                    <?php } ?>
  										<tr>
   											 <td align="right">&nbsp;</td>
   											 <td>
   											 	<?php if($is_top){
   											 	       echo CHtml::submitButton("确认置顶",array('class'=>'tj_bt'));
   											 	    }else{
   											 	    	 echo CHtml::link("充值",$this->createUrl("user/pay",array('price'=>$diff_price)),array('class'=>'tj_bt'));
   											 	    }
   											 	?>
   											 	
   											 	</td>
 											 </tr>
										</table>
										<?php $this->endWidget(); ?>
							</div>
            