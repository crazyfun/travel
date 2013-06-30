<?php if(empty($model)){ ?>
      <div class="page-right-top">你还未申请商铺，请点击<a href="<?php echo $this->createUrl('user/applystore');?>">这里</a>进行申请</div>
<?php }else{ 
	          $cssPath=$this->get_css_path();
						Yii::app()->clientScript->registerCssFile("/js/jbox/Skins2/Green/jbox.css");
						Yii::app()->clientScript->registerScriptFile('/js/jbox/jquery.jBox-2.3.min.js');
						Yii::app()->clientScript->registerScriptFile('/js/jbox/i18n/jquery.jBox-zh-CN.js');
	
?>  
            	<div class="page-right-top">我的商铺</div>
                <div class="right_tab_con">
                	<div class="flash_info"><?php $this->widget("FlashInfo");?></div>
                	<div class="input_line"><div class="input_name"><span class="input_required"></span>商铺名称:</div><div class="input_content"><?php echo $model->name;?></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>商铺的Logo:</div><div class="input_content"><a href="<?php echo "/".$model->store_logo;?>" target="_blank"><?php if(!empty($model->store_logo)) echo CHtml::image("/".$model->store_logo,$model->name,array('width'=>'200px','height'=>'60px')); else  echo CHtml::image($cssPath."/images/logo.gif",$model->name,array());?></a></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>商铺的Banner:</div><div class="input_content"><a href="<?php echo "/".$model->store_banner;?>" target="_blank"><?php if(!empty($model->store_banner)) echo CHtml::image("/".$model->store_banner,$model->name,array('width'=>'200px','height'=>'60px')); else echo CHtml::image($cssPath."/images/logo.gif",$model->name,array());?></a></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>公司名称:</div><div class="input_content"><?php echo $model->company;?></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>公司营业执照:</div><div class="input_content"><a href="<?php echo "/".$model->company_logo;?>" target="_blank"><?php if(!empty($model->company_logo)) echo CHtml::image("/".$model->company_logo,$model->company,array('width'=>'200px','height'=>'60px')); else echo CHtml::image($cssPath."/images/logo.gif",$model->company,array());?></a></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>公司电话:</div><div class="input_content"><?php echo $model->store_phone;?></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>公司传真:</div><div class="input_content"><?php echo $model->store_fax;?></div><div class="content_error"></div><div class="input_tip"></div></div>  								
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>公司所在区域:</div><div class="input_content"><?php echo $model->store_area_name;?></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>公司地址:</div><div class="input_content"><?php echo $model->store_address;?><a class="sure_bt_link" href="javascript:baidu_maps();">查看</a></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>联系人:</div><div class="input_content"><?php echo $model->contacter;?></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>联系人邮箱:</div><div class="input_content"><?php echo $model->contacter_email;?></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>联系人电话:</div><div class="input_content"><?php echo $model->contacter_phone;?></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>联系人QQ:</div><div class="input_content"><?php echo $model->contacter_qq;?></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>联系人msn:</div><div class="input_content"><?php echo $model->contacter_msn;?></div><div class="content_error"></div><div class="input_tip"></div></div>
            	   
            	    <div class="input_line"><div class="input_name"><span class="input_required"></span>VIP商铺:</div><div class="input_content">
            	    	          <span class="green_text">
            	    	           <?php 
                              	  if($model->is_vip=='1'&&$model->pay_status=='2'){
                              	  	echo CHtml::link("申请VIP商铺",Yii::app()->getController()->createUrl("/user/applyvipstore",array('id'=>$model->id)),array('class'=>'sure_bt_link'));
                              	  }else{
                              	  	echo $model->show_attribute('is_vip');
                              	  }
                              	?></span></div><div class="content_error"></div><div class="input_tip"></div></div>
                              		
                  <?php if($model->pay_status!='2'){ ?>
                  	        <div class="input_line"><div class="input_name"><span class="input_required"></span>支付状态:</div><div class="input_content">
            	    	          <span class="green_text">
            	    	           未支付(<a class="sure_bt_link" href="<?php echo $this->createUrl("user/storepay",array('id'=>$model->id));?>">支付</a>)
                              </span>
                             </div><div class="content_error"></div><div class="input_tip"></div></div>
                  	
                  <?php } ?>            		
            	    
            	    <div class="input_line"><div class="input_name"><span class="input_required"></span>旺铺:</div><div class="input_content"><span class="green_text"><?php echo $model->show_attribute('is_top');?></span></div><div class="content_error"></div><div class="input_tip"></div></div>
            	    <div class="input_line"><div class="input_name"><span class="input_required"></span>认证:</div><div class="input_content"><span class="green_text"><?php echo $model->show_attribute('status');?><?php echo $model->get_admin_login();?></span></div><div class="content_error"></div><div class="input_tip"></div></div>
            	    <div class="input_line"><div class="input_name"><span class="input_required"></span>商铺详细描述:</div><div class="input_content"><?php echo $model->store_describe;?></div><div class="content_error"></div><div class="input_tip"></div></div>
            	    <div class="input_line"><div class="input_button"><a class="operate_bt_a" href="<?php echo $this->createUrl("user/editstore");?>">修改</a></div></div>
            	</div>
            	
            	
      <script language="javascript">
    	
        function baidu_maps(){
        	var address="<?= $model->coordinate ?>";
        	show_bmap(address,false);
        	
        }
    	</script>
            	
 <?php } ?> 
 <div class="page-bottom-store_tip"></div>
         	