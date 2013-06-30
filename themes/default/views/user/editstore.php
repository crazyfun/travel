             <?php
                    Yii::app()->clientScript->registerCssFile("/js/jbox/Skins2/Green/jbox.css");
										Yii::app()->clientScript->registerScriptFile('/js/jbox/jquery.jBox-2.3.min.js');
										Yii::app()->clientScript->registerScriptFile('/js/jbox/i18n/jquery.jBox-zh-CN.js');
				
				       ?>
              <div class="page-right-top">修改商铺信息</div>
                <div class="right_tab_con">
                	 <?php 
    		 							$regions=Util::com_search_item(array(''=>'请选择区域'),$regions);
         							Yii::app()->clientScript->registerScriptFile('/js/mlselection.js');
    								  $form=$this->beginWidget('EActiveForm', array(
	        							'id'=>'',
          							'action'=>"",
	        							'enableAjaxValidation'=>false,
	        							'htmlOptions'=>array('id'=>'registe_from','enctype'=>'multipart/form-data'),
         							));
         							echo $form->createHidden($model,"id",array());
        					?>
                	<div class="flash_info"><?php $this->widget("FlashInfo");?></div>
                	<div class="input_line"><div class="input_name"><span class="input_required">*</span>商铺名称:</div><div class="input_content"><?php echo $form->createText($model,"name",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"name");?></div><div class="input_tip"></div></div>
									<div class="input_line"><div class="input_name"><span class="input_required"></span>商铺的Logo:</div><div class="input_content"><?php echo $form->createFile($model,"store_logo",array('is_cope'=>false));?></div><div class="content_error"><?php echo $form->error($model,"store_logo");?></div><div class="input_tip"></div></div>
									<div class="input_line"><div class="input_name"><span class="input_required"></span>商铺的Banner:</div><div class="input_content"><?php echo $form->createFile($model,"store_banner",array('is_cope'=>false));?></div><div class="content_error"><?php echo $form->error($model,"genter");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required">*</span>公司名称:</div><div class="input_content"><?php echo $form->createText($model,"company",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"company");?></div><div class="input_tip"></div></div>
                  <div class="input_line"><div class="input_name"><span class="input_required"></span>公司营业执照:</div><div class="input_content"><?php echo $form->createFile($model,"company_logo",array('is_cope'=>false));?></div><div class="content_error"><?php echo $form->error($model,"company_logo");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required">*</span>公司电话:</div><div class="input_content"><?php echo $form->createText($model,"store_phone",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"store_phone");?></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>公司传真:</div><div class="input_content"><?php echo $form->createText($model,"store_fax",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"store_fax");?></div><div class="input_tip"></div></div>
                  <div class="input_line"><div class="input_name"><span class="input_required"></span>公司所在区域:</div><div class="input_content">
                  <div id="region">
	      	             <input type="hidden" name="region_id" value="<?php echo $model->store_area;?>" id="region_id" class="mls_id" />
	      	             <input type="hidden" name="region_name" value="<?php echo $model->store_area_name;?>" class="mls_names" />
	      	             <?php if($model->store_area){ ?>
                       	 <span><?php echo $model->store_area_name;?></span>
                       	  <?php echo CHtml::button("修改",array('class'=>'edit_region'));?>
                        	<?php  echo EHtml::createSelect("store_area",'',$regions,array('onchange'=>'javascript:hide_error();','style'=>'display:none;'));?>
                      <?php }else{
                      				echo EHtml::createSelect("store_area",'',$regions,array('onchange'=>'javascript:hide_error();'));
                      			} 
                      ?>
	      	        </div></div>
                  <div class="content_error"><?php echo $form->error($model,"store_area");?></div><div class="input_tip"></div></div>
                  <div class="input_line"><div class="input_name"><span class="input_required"></span>公司地址:</div><div class="input_content"><?php echo $form->createText($model,"store_address",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"store_address");?></div><div class="input_tip"></div></div>
                  <div class="input_line"><div class="input_name"><span class="input_required"></span>坐标:</div><div class="input_content"><?php echo EHtml::createText("coordinate",$model->coordinate,array('id'=>'coordinate','onclick'=>'javascript:baidu_maps();','class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"coordinate");?></div><div class="input_tip"></div></div>
                  <div class="input_line"><div class="input_name"><span class="input_required">*</span>联系人:</div><div class="input_content"><?php echo $form->createText($model,"contacter",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"contacter");?></div><div class="input_tip"></div></div>
                  <div class="input_line"><div class="input_name"><span class="input_required"></span>联系人邮箱:</div><div class="input_content"><?php echo $form->createText($model,"contacter_email",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"contacter_email");?></div><div class="input_tip"></div></div>
                  <div class="input_line"><div class="input_name"><span class="input_required"></span>联系人电话:</div><div class="input_content"><?php echo $form->createText($model,"contacter_phone",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"contacter_phone");?></div><div class="input_tip"></div></div>
                  <div class="input_line"><div class="input_name"><span class="input_required"></span>联系人QQ:</div><div class="input_content"><?php echo $form->createText($model,"contacter_qq",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"contacter_qq");?></div><div class="input_tip"></div></div>
                  <div class="input_line"><div class="input_name"><span class="input_required"></span>联系人msn:</div><div class="input_content"><?php echo $form->createText($model,"contacter_msn",array('class'=>'text-put'));?></div><div class="content_error"><?php echo $form->error($model,"contacter_msn");?></div><div class="input_tip"></div></div>
                  <div class="input_line"><div class="input_name"><span class="input_required"></span>商铺详细描述:</div><div class="input_content"><?php $form->createMultitext($model,"store_describe",array('width'=>'300px','height'=>'200px','toobar'=>'Basic'));?></div><div class="content_error"><?php echo $form->error($model,"store_describe");?></div><div class="input_tip"></div></div>                 
                  <div class="input_line"><div class="input_button"><?php echo CHtml::submitButton("修改",array('class'=>'save_bt'));?><?php echo CHtml::resetButton("重置",array('class'=>'save_bt'));?></div></div>
               		<?php $this->endWidget(); ?>
            	</div>   	
      <script language="javascript">
    		jQuery(function(){
    			regionInit("region");
    	  });
        function hide_error(){
          jQuery('#region').find('.error').hide();
        }
        
        function baidu_maps(){
        	var address=document.getElementById("Station_store_address").value;
        	set_bmap(address);
        	
        }
    	</script>