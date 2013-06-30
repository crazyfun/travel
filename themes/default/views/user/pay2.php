              <?php
                 $cssPath=$this->get_css_path();
              ?>
            	<div class="page-right-top">在线支付</div>
            	<div class="right_tab_con zhifu">
                  <table width="100%" border="0">
                  	<tr>
    										<td width="22%" align="right">余额：</td>
    										<td width="78%"><?php echo $model->conpon;?></td>
    									</tr>
  										<tr>
    										<td width="22%" align="right">您选择的支付方式：</td>
    										<td width="78%"><?php  $payment_type=CV::$payment_type; $bank_data=$payment_type[$banker]; echo CHtml::image($cssPath."/images/".$bank_data['image'],$bank_data['name'],array()); ?></td>
    									</tr>
  										<tr>
    										<td align="right">充值余额：</td>
    										<td><span class="zf_m"><?php echo $price;?></span>元（人民币）</td>
    									</tr>
  										<tr>
   											 <td align="right">&nbsp;</td>
   											 <td><?php echo $pay_online;?></td>
 											 </tr>
										</table>
							</div>
            