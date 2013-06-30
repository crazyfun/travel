 <div class="edit_table">
                 <table cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td colspan="6" height="30" align="center" class="edit_table_top"><div class="card_list_top"><div class="card_title_name"><b>导游员 <span><?php echo $model->User->real_name;?></span> 信息一览</b></div></div></td>
                        </tr>
                        <tr>
                            <td width="191" valign="top" align="center" rowspan="11" class="portrait_td"><div class="portrait_con"><?php $thumb_image=Util::rename_thumb_file('180','450','',$model->guide_pass);echo CHtml::image("/".$thumb_image,$model->User->real_name,array());?></div></td>
                            <th width="90" height="40" align="right">头像</th>
                            <td width="130"><?php $thumb_image=Util::rename_thumb_file('90','90','',$model->guide_avater); echo CHtml::image("/".$thumb_image,$model->User->real_name,array());?></td>
                            <th align="right" width="90">性别</th>
                            <td><?php echo CV::$sex[$model->User->genter];?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">导游证号</th>
                            <td><?php echo $model->guide_number;?></td>
                            <th align="right">导游等级</th>
                            <td><?php echo CV::$guide_level[$model->guide_level];?></td>
                        </tr>
                        <tr>
                        <tr>
                            <th width="90" height="40" align="right">资格证号</th>
                            <td><?php echo $model->guide_qualifications;?></td>
                            <th align="right">导游学历</th>
                            <td><?php echo CV::$guide_educational[$model->guide_educational];?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">导游卡号</th>
                            <td><?php echo $model->guide_cade;?></td>
                            <th align="right">语种</th>
                            <td><?php echo $model->guide_language;?></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">所在区域</th>
                            <td><?php echo $model->guide_region_name;?></td>
                            <th align="right">语种2</th>
                            <td><?php echo $model->guide_language2;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">带团年限</th>
                            <td><?php echo $model->guide_year;?>年</td>
                            <th align="right">熟悉地</th>
                            <td><?php echo $model->guide_familiar;?></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">发证日期</th>
                            <td><?php echo $model->guide_date;?></td>
                            <th align="right">分值</th>
                            <td><?php echo $model->guide_score;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">联系电话</th>
                            <td><?php echo $model->guide_contact_phone;?></td>
                            <th align="right">导游QQ</th>
                            <td><?php echo $model->guide_qq;?></td>
                        </tr>
                        <tr>
                        		<th height="40" align="right">审核状态</th>
                            <td><span class="green_text"><?php echo $model->show_attribute('status');?></span></td>
                            <th align="right">带团价格</th>
                            <td><?php echo $model->guide_price;?>/天</td>
                        </tr>
                        <tr>
                            <th height="40" align="right">描述</th>
                            <td colspan="3"><?php echo $model->describe;?></td>
                        </tr>
                    </table>
                   
                 
       <div class="operate_result"><?php $this->widget("FlashInfo");?></div>
       <?php 
    		  $form=$this->beginWidget('EActiveForm', array(
	        'id'=>'',
          'action'=>"",
	        'enableAjaxValidation'=>false,
	        'htmlOptions'=>array('id'=>'','enctype'=>'multipart/form-data'),
         ));
         echo CHtml::hiddenField("id",$model->id,array());
        ?>
         <div class="content_inline"><div class="content_name">审核图片:</div><div class="content_content"><?php echo $form->createFile($model,"guide_shenhe_pass",array('is_cope'=>true)); ?></div><div class="content_tip">请上传比例为2:1的图片</div><div class="content_error"><?php echo $form->error($model,'guide_shenhe_pass'); ?></div></div>
	       <div class="content_button"><input type="submit" class="input_submit" value="确定" name="button_ok"/><input type="button" onclick="javascript:window.open('http://daoyou-chaxun.cnta.gov.cn/single_info/selectlogin_1.asp','认证导游', 'height=500, width=1000, top=0, left=0, toolbar=yes, menubar=yes, scrollbars=yes, resizable=yes,location=yes, status=yes');" class="input_submit" value="认证导游" id="search_submit" name="button_ok"></div>
       <?php $this->endWidget(); ?>
   </div>