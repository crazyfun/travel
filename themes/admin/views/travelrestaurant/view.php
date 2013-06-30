            <div class="edit_table">
                 <table cellpadding="0" cellspacing="0" width="100%">
                        
                        <tr>
                            <td width="191" valign="top" align="center" rowspan="11" class="portrait_td"><div class="portrait_con"><?php $thumb_image=Util::rename_thumb_file('180','450','',$model->restaurant_logo);echo CHtml::image("/".$thumb_image,$model->restaurant_name,array());?></div></td>
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
                            <th align="right">酒店地址</th>
                            <td colspan='3'><?php echo $model->restaurant_address;?></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">描述</th>
                            <td colspan="3"><?php echo $model->restaurant_desc;?></td>
                            
                        </tr>
                        <tr>
                            <th height="40" align="right">审核状况</th>
                            <td><span class="green_text"><?php echo $model->show_attribute("status");?></span></td>
                            <th height="40" align="right">商铺</th>
                            <td><?php $store=Station::model();$store_data=$store->get_admin_is_store($model->user_id);echo $store_data;?></td>
                        </tr>
                        
                
                    </table>
                 </div>  