
    	  <?php 
    	  $cssPath=$this->get_css_path();
    	  Yii::app()->clientScript->registerCssFile("/js/jbox/Skins2/Green/jbox.css");
				Yii::app()->clientScript->registerScriptFile('/js/jbox/jquery.jBox-2.3.min.js');
				Yii::app()->clientScript->registerScriptFile('/js/jbox/i18n/jquery.jBox-zh-CN.js');

    	  ?>
        <div class="page-right-top">旅行社信息修改</div>
        <div class="right_tab_con edit_table">
        	
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
                            <td width="191" valign="top" align="center" rowspan="10" class="portrait_td"><div>旅行社图片(Logo)</div><div class="portrait_con"><?php echo $form->createFile($model,"agency_logo",array('is_cope'=>false));?></div><div class="error_tableinput"><?php echo $form->error($model,"agency_logo");?></div></td>
                            <th width="90" height="40" align="right"><div class="required_tableinput">*</div>旅行社名称</th>
                            <td><?php echo $form->createText($model,"agency_name",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"agency_name");?></div></td>
                            <th align="right" width="90" height="40"><div class="required_tableinput"></div>旅行社邮箱</th>
                            <td><?php echo $form->createText($model,"agency_email",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"agency_email");?></div></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right"><div class="required_tableinput">*</div>所在区域</th>
                            <td>
                            	<div id="region">
	      	             <input type="hidden" name="region_id" value="<?php echo $model->agency_region;?>" id="region_id" class="mls_id" />
	      	             <input type="hidden" name="region_name" value="<?php echo $model->guide_region_name;?>" class="mls_names" />
	      	             <?php if($model->agency_region){ ?>
                       	 <span><?php echo $model->guide_region_name;?></span>
                       	  <?php echo CHtml::button("修改",array('class'=>'edit_region'));?>
                        	<?php  echo EHtml::createSelect("agency_region",'',$regions,array('onchange'=>'javascript:hide_error();','style'=>'display:none;'));?>
                      <?php }else{
                      				echo EHtml::createSelect("agency_region",'',$regions,array('onchange'=>'javascript:hide_error();'));
                      			} 
                      ?>
	      	           </div><div class="error_tableinput"><?php echo $form->error($model,"agency_region");?></div>
                            	
                            </td>
                            <th align="right" width="90" height="40"><div class="required_tableinput">*</div>旅行社座机</th>
                            <td><?php echo $form->createText($model,"agency_telephone",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"agency_telephone");?></div></td>
                        </tr>
                        <tr>
                        <tr>
                            <th width="90" height="40" align="right"><div class="required_tableinput"></div>旅行社部门</th>
                            <td><?php echo $form->createText($model,"agency_department",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"agency_department");?></div></td>
                            <th align="right"><div class="required_tableinput"></div>旅行社传真</th>
                            <td><?php echo $form->createText($model,"agency_fax",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"agency_fax");?></div></td>
                        </tr>
                        
                        <tr>
                            <th width="90" height="40" align="right"><div class="required_tableinput"></div>旅行社地址</th>
                            <td><?php echo $form->createText($model,"agency_address",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"agency_address");?></div></td>
                            
                            <th height="40" align="right"><div class="required_tableinput"></div>坐标</th>
                            <td><?php echo EHtml::createText("coordinate",$model->coordinate,array('id'=>'coordinate','onclick'=>'javascript:baidu_maps();','class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"coordinate");?></div></td>
                           
                        </tr>
                        <tr>
                            <th height="40" align="right"><div class="required_tableinput"></div>联系人</th>
                            <td><?php echo $form->createText($model,"contacter",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"contacter");?></div></td>
                            <th align="right"><div class="required_tableinput"></div>联系电话</th>
                            <td><?php echo $form->createText($model,"contacter_phone",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"contacter_phone");?></div></td>
                        </tr>
            
                        <tr>
                            <th height="40" align="right"><div class="required_tableinput"></div>联系QQ</th>
                            <td><?php echo $form->createText($model,"contacter_qq",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"contacter_qq");?></div></td>
                            <th align="right"><div class="required_tableinput"></div>联系QQ2</th>
                            <td><?php echo $form->createNumber($model,"contacter_qq2",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"contacter_qq2");?></div></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right"><div class="required_tableinput"></div>联系QQ3</th>
                            <td colspan="3"><?php echo $form->createText($model,"contacter_qq3",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"contacter_qq3");?></div></td>
                            
                        </tr>

                        <tr>
                            <th height="40" align="right"><div class="required_tableinput"></div>描述</th>
                            <td colspan="3"><?php echo $form->createTextarea($model,"describe",array('class'=>'text-tabletextarea'));?><div class="error_tableinput"><?php echo $form->error($model,"describe");?></div></td>
                        </tr>
                        <tr>
                        	<td colspan="5" align="right"><?php echo CHtml::submitButton("修改",array('class'=>'save_bt'));?></td>
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