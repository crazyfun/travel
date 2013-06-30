       <?php 
         $cssPath=$this->get_css_path();
         Yii::app()->clientScript->registerCssFile("/js/jbox/Skins2/Green/jbox.css");
					Yii::app()->clientScript->registerScriptFile('/js/jbox/jquery.jBox-2.3.min.js');
					Yii::app()->clientScript->registerScriptFile('/js/jbox/i18n/jquery.jBox-zh-CN.js');
       ?>
        <div class="page-right-top">酒店信息</div>
        <div class="right_tab_con edit_table">
                 <table cellpadding="0" cellspacing="0" width="100%">
                        
                        <tr>
                            <td width="191" valign="top" align="center" style="vertical-align:middle;" rowspan="11" class="portrait_td"><div class="portrait_con"><?php if(!empty($model->restaurant_logo)){ $thumb_image=Util::rename_thumb_file('180','450','',$model->restaurant_logo);echo CHtml::image("/".$thumb_image,$model->restaurant_name,array());}else{echo CHtml::image($cssPath."/images/logo.gif",$model->restaurant_name,array());}?></div></td>
                            <th width="90" height="40" align="right">酒店名称</th>
                            <td width="130"><?php echo $model->restaurant_name;?></td>
                            <th align="right" width="90">开业时间</th>
                            <td><?php echo $model->restaurant_open;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">所在区域</th>
                            <td><?php echo $model->restaurant_region_name;?></td>
                            <th align="right">酒店电话</th>
                            <td><?php echo $model->restaurant_telephone;?></td>
                        </tr>
                        <tr>
                        <tr>
                            <th width="90" height="40" align="right">酒店星级</th>
                            <td><?php echo $model->show_attribute("restaurant_level");?></td>
                            <th align="right">联系人</th>
                            <td><?php echo $model->contacter;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">联系人电话</th>
                            <td><?php echo $model->contacter_phone;?></td>
                            <th height="40" align="right">联系人QQ</th>
                            <td><?php echo $model->contacter_qq;?></td>
              
                        </tr>
                       
                        <tr>
                           
                            <th align="right" height="40">酒店地址</th>
                            <td colspan='3'><?php echo $model->restaurant_address;?><a class="sure_bt_link" href="javascript:baidu_maps();">查看</a></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">描述</th>
                            <td colspan="3"><?php echo $model->restaurant_desc;?></td>
                            
                        </tr>

                        <tr>
                            <th height="40" align="right">审核状况</th>
                            <td colspan="3"><span class="green_text"><?php echo $model->show_attribute("status");?></span><?php if($model->status=='2'){ echo CHtml::link("置顶",$this->createUrl("user/tops",array('type'=>'3')),array('class'=>'sure_bt_link'));} ?></td>
                           
                        </tr>
                        
                
                    </table>
                 </div>  
<script language="javascript">
    	
        function baidu_maps(){
        	var address="<?= $model->coordinate ?>";
        	show_bmap(address,false);
        	
        }
    	</script>