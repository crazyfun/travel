              <?php
                 $cssPath=$this->get_css_path();
              ?>
            	<div class="page-right-top">申请VIP商铺</div>
            	<div class="right_tab_con zhifu">
            		<div class="store_information">
            		   申请Vip商家(可创建多个管理员)需支付<?php echo $sfc_vip_store; ?>元，申请普通商家需支付<?php echo $sfc_nomal_store; ?>元。
            	  </div>
            		<div class="flash_info"><?php $this->widget("FlashInfo");?></div>
            		 <?php 
    								  $form=$this->beginWidget('EActiveForm', array(
	        							'id'=>'',
          							'action'=>"",
	        							'enableAjaxValidation'=>false,
	        							'htmlOptions'=>array('id'=>'pay_from','enctype'=>'multipart/form-data'),
         							));
         							echo CHtml::hiddenField("action","pay",array());
         							echo CHtml::hiddenField("id",$store_id,array());
         						
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
    										<td align="right">商铺名称：</td>
    										<td><?php echo $store_data->name;?></td>
    									</tr>
    									
    								
    										
    								<?php if(!$is_top){ ?>	
    									<tr>
    										<td colspan='2' align="right"><font color="#ff6600">您的余额不足，请充值<span class="text_red"><?php echo $diff_price; ?></span>后再行支付。</font></td>	
    									</tr>
                    <?php } ?>
  										<tr>
   											 <td align="right">&nbsp;</td>
   											 <td>
   											 	<?php if($is_top){
   											 	       echo CHtml::submitButton("确认支付",array('class'=>'tj_bt'));
   											 	    }else{
   											 	    	 echo CHtml::link("充值",$this->createUrl("user/pay",array('price'=>$diff_price)),array('class'=>'tj_bt'));
   											 	    }
   											 	?>
   											 	
   											 	</td>
 											 </tr>
										</table>
										<?php $this->endWidget(); ?>
							</div>
            