          <?php 
          $cssPath=$this->get_css_path();
          Yii::app()->clientScript->registerCssFile("/js/jbox/Skins2/Green/jbox.css");
					Yii::app()->clientScript->registerScriptFile('/js/jbox/jquery.jBox-2.3.min.js');
					Yii::app()->clientScript->registerScriptFile('/js/jbox/i18n/jquery.jBox-zh-CN.js');
          ?>
        <div class="page-right-top">旅行社信息</div>
        <div class="right_tab_con edit_table">
                 <table cellpadding="0" cellspacing="0" width="100%">
                        
                        <tr>
                            <td width="191" valign="top" style="vertical-align:middle;" align="center" rowspan="11" class="portrait_td"><div class="portrait_con"><?php if(!empty($model->agency_logo)){$thumb_image=Util::rename_thumb_file('180','450','',$model->agency_logo);echo CHtml::image("/".$thumb_image,$model->agency_name,array());}else{echo CHtml::image($cssPath."/images/logo.gif",$model->agency_name,array());}?></div></td>
                            <th width="90" height="40" align="right">旅行社名称</th>
                            <td width="130"><?php echo $model->agency_name;?></td>
                            <th align="right" width="90">旅行社邮箱</th>
                            <td><?php echo $model->agency_email;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">所在区域</th>
                            <td><?php echo $model->guide_region_name;?></td>
                            <th align="right">旅行社座机</th>
                            <td><?php echo $model->agency_telephone;?></td>
                        </tr>
                        <tr>
                        <tr>
                            <th width="90" height="40" align="right">旅行社部门</th>
                            <td><?php echo $model->agency_department;?></td>
                            <th align="right">旅行社传真</th>
                            <td><?php echo $model->agency_fax;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">旅行社地址</th>
                            <td colspan="3"><?php echo $model->agency_address;?><a class="sure_bt_link" href="javascript:baidu_maps();">查看</a></td>
              
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">联系人</th>
                            <td><?php echo $model->contacter;?></td>
                            <th align="right">联系电话</th>
                            <td><?php echo $model->contacter_phone;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">联系QQ</th>
                            <td><?php echo $model->contacter_qq;?></td>
                            <th align="right">联系QQ2</th>
                            <td><?php echo $model->contacter_qq2;?></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">联系QQ3</th>
                            <td><?php echo $model->contacter_qq3;?></td>
                            <th align="right">审核状况</th>
                            <td><span class="green_text"><?php echo $model->show_attribute("status");?></span><?php if($model->status=='2'){ echo CHtml::link("置顶",$this->createUrl("user/tops",array('type'=>'2')),array('class'=>'sure_bt_link'));} ?></td>
                        </tr>

                        <tr>
                            <th height="40" align="right">描述</th>
                            <td colspan="3"><?php echo $model->describe;?></td>
                        </tr>
                        
                     
                    </table>
                 </div>     
                 
      <script language="javascript">
        function baidu_maps(){
        	var address="<?= $model->coordinate ?>";
        	show_bmap(address,false);
        	
        }
    	</script>