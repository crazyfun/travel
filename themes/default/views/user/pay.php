              <?php
                 $cssPath=$this->get_css_path();
              ?>
            	<div class="page-right-top">在线支付</div>
            	<div class="right_tab_con zhifu">
            		<div class="flash_info"><?php $this->widget("FlashInfo");?></div>
            		
            		 <?php 
    		 							$form=$this->beginWidget('EActiveForm', array(
	        								'id'=>'',
	        								'enableAjaxValidation'=>false,
	        								'htmlOptions'=>array('id'=>'pay_form'),
         							));
         							
        					?>
        					
        					
                <div class="z_pic"></div>
                    <div class="z_text">选择网银、支付宝、快钱等方式进行充值，即时到账</div>
                    
                    
                    <div class="bank_text">
                    	  选择支付的银行卡（请确保您的银行卡已开通网银）
                    </div>
                    
                    <div class="bank_lists">
                    	  <?php
                    	     $pay_lists=array('kuaiqian_abc','kuaiqian_bcom','kuaiqian_boc','kuaiqian_ccb','kuaiqian_cmb','kuaiqian_cmbc','kuaiqian_icbc','kuaiqian_sdb');
                    	     $payment_type=CV::$payment_type;
                    	     foreach($pay_lists as $key => $value){ 
                    	         $bank_data=$payment_type[$value];
                    	  ?>
                    	  		<div class="bank_item"><span class="bank_radio"><?php echo CHtml::radioButton("type",false,array('value'=>$value));?></span><span class="bank_image"><?php echo CHtml::image($cssPath."/images/".$bank_data['image'],$bank_data['name'],array()); ?></span></div>
                    	  <?php } ?>
                    </div>
                    <div class="clear_both"></div>
                    
                    <div class="bank_text">
                    	  请选择其他合作支付平台进行支付
                    </div>
                    
                    
                     <div class="bank_lists">
                    	 <?php
                    	     $pay_lists=array('alipay','kuaiqian');
                    	     foreach($pay_lists as $key => $value){ 
                    	         $bank_data=$payment_type[$value];
                    	  ?>
                    	  		<div class="bank_item"><span class="bank_radio"><?php echo CHtml::radioButton("type",false,array('value'=>$value));?></span><span class="bank_image"><?php echo CHtml::image($cssPath."/images/".$bank_data['image'],$bank_data['name'],array()); ?></span></div>
                    	  <?php } ?>
                    	
                    </div>
                    <div class="content_error"><?php  echo $form->error($model,"type");?></div>
                   <div class="clear_both"></div> 
                   


<div class="z_text2">
  <table width="100%" border="0">
    <tr>
      <td width="15%">输入充值金额：</td>
      <td width="16%"><label>
        <?php echo $form->textField($model,"price",array('class'=>'cz_input'));?></label></td>
      <td width="12%">元(人民币)</td>
      <td width="52%"><div class="content_error"><?php  echo $form->error($model,"price");?></div></td>
      <td width="5%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><?php echo CHtml::submitButton("提交支付",array('class'=>'tj_bt'));?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>

<?php $this->endWidget(); ?>
</div>
            	
            