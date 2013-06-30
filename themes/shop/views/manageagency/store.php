    <?php
       $cssPath=$this->get_css_path();
    ?>      
          <div class="edit_content" style="margin:20px 0;">
                	<div class="flash_info"><?php $this->widget("FlashInfo");?></div>
                	<div class="content_inline"><div class="content_name"><span class="input_required"></span>商铺名称:</div><div class="content_content"><?php echo $model->name;?></div><div class="content_error"></div></div>
  							  <div class="content_inline"><div class="content_name"><span class="input_required"></span>Logo:</div><div class="content_content"><a href="<?php echo "/".$model->store_logo;?>" target="_blank"><?php if(!empty($model->store_logo)) echo CHtml::image("/".$model->store_logo,$model->name,array('width'=>'200px','height'=>'60px')); else  echo CHtml::image($cssPath."/images/logo.gif",$model->name,array());?></a></div><div class="content_error"></div></div>
  								<div class="content_inline"><div class="content_name"><span class="input_required"></span>Banner:</div><div class="content_content"><a href="<?php echo "/".$model->store_banner;?>" target="_blank"><?php if(!empty($model->sore_banner)) echo CHtml::image("/".$model->store_banner,$model->name,array('width'=>'200px','height'=>'60px')); else  echo CHtml::image($cssPath."/images/logo.gif",$model->name,array());?></a></div><div class="content_error"></div></div>
  								<div class="content_inline"><div class="content_name"><span class="input_required"></span>公司名称:</div><div class="content_content"><?php echo $model->company;?></div><div class="content_error"></div></div>
  								<div class="content_inline"><div class="content_name"><span class="input_required"></span>营业执照:</div><div class="content_content"><a href="<?php echo "/".$model->company_logo;?>" target="_blank"><?php if(!empty($model->company_logo)) echo CHtml::image("/".$model->company_logo,$model->company,array('width'=>'200px','height'=>'60px')); else  echo CHtml::image($cssPath."/images/logo.gif",$model->company,array());?></a></div><div class="content_error"></div></div>
  								<div class="content_inline"><div class="content_name"><span class="input_required"></span>公司电话:</div><div class="content_content"><?php echo $model->store_phone;?></div><div class="content_error"></div></div>
  								<div class="content_inline"><div class="content_name"><span class="input_required"></span>公司传真:</div><div class="content_content"><?php echo $model->store_fax;?></div><div class="content_error"></div></div>  								
  								<div class="content_inline"><div class="content_name"><span class="input_required"></span>所在区域:</div><div class="content_content"><?php echo $model->store_area_name;?></div><div class="content_error"></div></div>
  								<div class="content_inline"><div class="content_name"><span class="input_required"></span>公司地址:</div><div class="content_content"><?php echo $model->store_address;?><a class="sure_bt_link" href="javascript:baidu_maps();">查看</a></div><div class="content_error"></div></div>
  								<div class="content_inline"><div class="content_name"><span class="input_required"></span>联系人:</div><div class="content_content"><?php echo $model->contacter;?></div><div class="content_error"></div></div>
  								<div class="content_inline"><div class="content_name"><span class="input_required"></span>邮箱:</div><div class="content_content"><?php echo $model->contacter_email;?></div><div class="content_error"></div></div>
  								<div class="content_inline"><div class="content_name"><span class="input_required"></span>电话:</div><div class="content_content"><?php echo $model->contacter_phone;?></div><div class="content_error"></div></div>
  								<div class="content_inline"><div class="content_name"><span class="input_required"></span>QQ:</div><div class="content_content"><?php echo $model->contacter_qq;?></div><div class="content_error"></div></div>
  								<div class="content_inline"><div class="content_name"><span class="input_required"></span>msn:</div><div class="content_content"><?php echo $model->contacter_msn;?></div><div class="content_error"></div></div>
            	    <div class="content_inline"><div class="content_name"><span class="input_required"></span>VIP商铺:</div><div class="content_content">
            	    	          <span class="green_text">
            	    	           <?php 
                              	  echo $model->show_attribute('is_vip');
                              	?></span></div><div class="content_error"></div><div class="input_tip"></div></div>
            	    
            	    <div class="content_inline"><div class="content_name"><span class="input_required"></span>旺铺:</div><div class="content_content"><span class="green_text"><?php echo $model->show_attribute('is_top');?></span></div><div class="content_error"></div></div>
            	    <div class="content_inline"><div class="content_name"><span class="input_required"></span>认证:</div><div class="content_content"><span class="green_text"><?php echo $model->show_attribute("status");?></span></div><div class="content_error"></div></div>
            	    <div class="content_inline"><div class="content_name"><span class="input_required"></span>详细描述:</div><div class="content_content"><?php echo $model->store_describe;?></div><div class="content_error"></div><div class="input_tip"></div></div>
            	    <div class="content_button"><a class="sure_bt_link" href="<?php echo $this->createUrl("manageagency/storeedit");?>">修改</a></div>
            	</div>
            	
            	
      <script language="javascript">
        function baidu_maps(){
        	var address="<?= $model->coordinate ?>";
        	show_bmap(address,false);
        	
        }
    	</script>
            	
       	