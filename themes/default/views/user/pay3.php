              <?php
                 $cssPath=$this->get_css_path();
              ?>
<div class="right_tab_con zhifu">
          <div class="flash_info"><?php $this->widget("FlashInfo");?></div>
					<table width="100%" border="0">
 						 <tr>
    							<td align="right">充值余额：</td>
    							<td><?php echo $price;?>元（人民币）</td>
  					 </tr>
  					 <tr>
   								<td align="right">充值方式：</td>
   								<td><?php  $payment_type=CV::$payment_type; $bank_data=$payment_type[$pay_code]; echo CHtml::image($cssPath."/images/".$bank_data['image'],$bank_data['name'],array()); ?></td>
  					 </tr>
  					 <tr>
    							<td align="right">充值时间：</td>
    							<td><?php echo date("Y-m-d H:i:s");?></td>
  					</tr>
					</table>
</div>