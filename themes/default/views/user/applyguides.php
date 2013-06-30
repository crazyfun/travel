       	  <?php $cssPath=$this->get_css_path();?>
        <div class="page-right-top">申请导游</div>
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
                            <td colspan="6" height="30" align="center" class="edit_table_top"><div class="card_list_top"><div class="card_title_name"><?php if(!empty($user->real_name)) echo $user->real_name; else echo CHtml::link("设置姓名",$this->createUrl("user/editprofile"),array());?>申请导游员</div></div></td>
                        </tr>
                        <tr>
                            <td width="191" valign="top" align="center" rowspan="10" class="portrait_td"><div>导游证</div><div class="portrait_con"><?php echo $form->createFile($model,"guide_pass",array('is_cope'=>false));?></div><div class="error_tableinput"><?php echo $form->error($model,"guide_pass");?></div></td>
                            <th width="90" height="40" align="right"><div class="required_tableinput"></div>头像</th>
                            <td colspan='3'><?php echo $form->createFile($model,"guide_avater",array('is_cope'=>false));?><div class="error_tableinput"><?php echo $form->error($model,"guide_avater");?></div></td> 
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right"><div class="required_tableinput">*</div>导游证号</th>
                            <td><?php echo $form->createText($model,"guide_number",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"guide_number");?></div></td>
                            <th align="right" width="90" height="40"><div class="required_tableinput"></div>导游等级</th>
                            <td><?php echo $form->createSelect($model,"guide_level",CV::$guide_level,array());?><div class="error_tableinput"><?php echo $form->error($model,"guide_level");?></div></td>
                        </tr>
                        <tr>
                        <tr>
                            <th width="90" height="40" align="right"><div class="required_tableinput"></div>资格证号</th>
                            <td><?php echo $form->createText($model,"guide_qualifications",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"guide_qualifications");?></div></td>
                            <th align="right"><div class="required_tableinput"></div>导游学历</th>
                            <td><?php echo $form->createSelect($model,"guide_educational",CV::$guide_educational,array());?><div class="error_tableinput"><?php echo $form->error($model,"guide_educational");?></div></td>
                        </tr>
                        <tr>
                            <th height="40" align="right"><div class="required_tableinput"></div>导游卡号</th>
                            <td><?php echo $form->createText($model,"guide_cade",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"guide_cade");?></div></td>
                            <th align="right"><div class="required_tableinput"></div>语种</th>
                            <td><?php echo $form->createText($model,"guide_language",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"guide_language");?></div></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right"><div class="required_tableinput">*</div>所在区域</th>
                            <td>
                            	 <div id="region">
	      	             <input type="hidden" name="region_id" value="<?php echo $model->guide_region;?>" id="region_id" class="mls_id" />
	      	             <input type="hidden" name="region_name" value="<?php echo $model->guide_region_name;?>" class="mls_names" />
	      	             <?php if($model->guide_region){ ?>
                       	 <span><?php echo $model->guide_region_name;?></span>
                       	  <?php echo CHtml::button("修改",array('class'=>'edit_region'));?>
                        	<?php  echo EHtml::createSelect("guide_region",'',$regions,array('onchange'=>'javascript:hide_error();','style'=>'display:none;'));?>
                      <?php }else{
                      				echo EHtml::createSelect("guide_region",'',$regions,array('onchange'=>'javascript:hide_error();'));
                      			} 
                      ?>
	      	           
	      	         </div><div class="error_tableinput"><?php echo $form->error($model,"guide_region");?></div>
                            </td>
                            <th align="right"><div class="required_tableinput"></div>语种2</th>
                            <td><?php echo $form->createText($model,"guide_language",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"guide_language");?></div></td>
                        </tr>
                        <tr>
                            <th height="40" align="right"><div class="required_tableinput"></div>带团年限</th>
                            <td><?php echo $form->createNumber($model,"guide_year",array('class'=>'text-tableinput'));?>年<div class="error_tableinput"><?php echo $form->error($model,"guide_year");?></div></td>
                            <th align="right"><div class="required_tableinput"></div>熟悉地</th>
                            <td><?php echo $form->createText($model,"guide_familiar",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"guide_familiar");?></div></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right"><div class="required_tableinput"></div>发证日期</th>
                            <td><?php echo $form->createDate($model,"guide_date",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"guide_date");?></div></td>
                            <th align="right"><div class="required_tableinput"></div>分值</th>
                            <td><?php echo $form->createNumber($model,"guide_score",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"guide_score");?></div></td>
                        </tr>
                        <tr>
                            <th height="40" align="right"><div class="required_tableinput">*</div>联系电话</th>
                            <td><?php echo $form->createText($model,"guide_contact_phone",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"guide_contact_phone");?></div></td>
                            <th align="right"><div class="required_tableinput"></div>导游QQ</th>
                            <td><?php echo $form->createText($model,"guide_qq",array('class'=>'text-tableinput'));?><div class="error_tableinput"><?php echo $form->error($model,"guide_qq");?></div></td>
                        </tr>
                        <tr>
                        	  <th height="40" align="right"><div class="required_tableinput">*</div>带团价格</th>
                            <td><?php echo $form->createNumber($model,"guide_price",array('class'=>'text-tableinput'));?>/天<div class="error_tableinput"><?php echo $form->error($model,"guide_price");?></div></td>
                            <th align="right"><div class="required_tableinput"></div>描述</th>
                            <td><?php echo $form->createTextarea($model,"describe",array('class'=>'text-tabletextarea'));?><div class="error_tableinput"><?php echo $form->error($model,"describe");?></div></td>
                            
                          
                        </tr>
                        <tr>
                        	<td colspan="5" align="right"><?php echo CHtml::submitButton("申请",array('class'=>'save_bt'));?></td>
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
    	</script>                
