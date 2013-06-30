      <?php 
    	  Yii::app()->clientScript->registerCssFile("/js/jbox/Skins2/Green/jbox.css");
				Yii::app()->clientScript->registerScriptFile('/js/jbox/jquery.jBox-2.3.min.js');
				Yii::app()->clientScript->registerScriptFile('/js/jbox/i18n/jquery.jBox-zh-CN.js');
				Yii::app()->clientScript->registerScriptFile("/js/mlselection.js");

    	  ?>
        <div class="edit_content edit_table">
        	       <div class="flash_info"><?php $this->widget("FlashInfo");?></div>
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
                 <table cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td width="191" valign="top" align="center" rowspan="10" class="portrait_td"><div>酒店Logo</div><div class="portrait_con"><?php echo $form->createFile($model,"restaurant_logo",array('is_cope'=>false));?></div><div class="error_tableinput"><?php echo $form->error($model,"restaurant_logo");?></div></td>
                            <th width="90" height="40" align="right"><div class="required_tableinput">*</div>酒店名称</th>
                            <td><?php echo $form->createText($model,"restaurant_name",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"restaurant_name");?></div></td>
                            <th align="right" width="90" height="40"><div class="required_tableinput"></div>开业时间</th>
                            <td><?php echo $form->createDate($model,"restaurant_open",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"restaurant_open");?></div></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right"><div class="required_tableinput">*</div>所在区域</th>
                            <td>
                            	<div id="region">
	      	             <input type="hidden" name="region_id" value="<?php echo $model->restaurant_region;?>" id="region_id" class="mls_id" />
	      	             <input type="hidden" name="region_name" value="<?php echo $model->restaurant_region_name;?>" class="mls_names" />
	      	             <?php if($model->restaurant_region){ ?>
                       	 <span><?php echo $model->restaurant_region_name;?></span>
                       	  <?php echo CHtml::button("修改",array('class'=>'edit_region'));?>
                        	<?php  echo EHtml::createSelect("restaurant_region",'',$regions,array('onchange'=>'javascript:hide_error();','style'=>'display:none;'));?>
                      <?php }else{
                      				echo EHtml::createSelect("restaurant_region",'',$regions,array('onchange'=>'javascript:hide_error();'));
                      			} 
                      ?>
	      	           </div><div class="error_tableinput"><?php echo $form->error($model,"restaurant_region");?></div>
                            	
                            </td>
                            <th align="right" width="90" height="40"><div class="required_tableinput">*</div>酒店电话</th>
                            <td><?php echo $form->createText($model,"restaurant_telephone",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"restaurant_telephone");?></div></td>
                        </tr>
                        <tr>
                        <tr>
                            <th width="90" height="40" align="right"><div class="required_tableinput"></div>酒店星级</th>
                            <td><?php echo $form->createSelect($model,"restaurant_level",CV::$restaurant_level,array());?><div class="error_tableinput"><?php echo $form->error($model,"restaurant_level");?></div></td>
                            <th align="right"><div class="required_tableinput"></div>联系人</th>
                            <td><?php echo $form->createText($model,"contacter",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"contacter");?></div></td>
                        </tr>
                        
                         <tr>
                            <th width="90" height="40" align="right"><div class="required_tableinput"></div>联系人电话</th>
                            <td><?php echo $form->createText($model,"contacter_phone",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"contacter_phone");?></div></td>
                            
                            <th width="90" height="40" align="right"><div class="required_tableinput"></div>联系人QQ</th>
                            <td><?php echo $form->createText($model,"contacter_phone",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"contacter_phone");?></div></td>
                           
                        </tr>
                       
                        <tr>
                            <th width="90" height="40" align="right"><div class="required_tableinput"></div>酒店地址</th>
                            <td><?php echo $form->createText($model,"restaurant_address",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"restaurant_address");?></div></td>
                            
                            <th height="40" align="right"><div class="required_tableinput"></div>坐标</th>
                            <td><?php echo EHtml::createText("coordinate",$model->coordinate,array('id'=>'coordinate','onclick'=>'javascript:baidu_maps();','class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"coordinate");?></div></td>
                            
                            
                        </tr>
                  
                        <tr>
                            <th height="40" align="right"><div class="required_tableinput"></div>描述</th>
                            <td colspan="3"><?php echo $form->createTextarea($model,"restaurant_desc",array('class'=>'text-tabletextarea'));?><div class="error_tableinput"><?php echo $form->error($model,"restaurant_desc");?></div></td>
                        </tr>
                        <tr>
                        	<td colspan="5" align="right"><?php echo CHtml::submitButton("修改",array('class'=>'input_submit'));?></td>
                        </tr>
                    </table>
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
        	var address=document.getElementById("TravelAgency_agency_address").value;
        	set_bmap(address);
        	
        }
    	</script> 