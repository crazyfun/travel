<?php $cssPath=$this->get_css_path();?>
        
        <div class="right_tab_con edit_table">
                 <table cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td width="191" valign="top" align="center" style="vertical-align:middle;" rowspan="11" class="portrait_td"><div class="portrait_con"><?php if(!empty($travel_agency_data->agency_logo)){ $thumb_image=Util::rename_thumb_file('180','450','',$travel_agency_data->agency_logo);echo CHtml::image("/".$thumb_image,$travel_agency_data->agency_name,array());}else{ echo CHtml::image($cssPath."/images/logo.gif",$travel_agency_data->agency_name,array()); }?></div></td>
                            <td colspan='4' height="40" align="center"><b>旅行社 <span class="text_red"><?php echo $travel_agency_data->agency_name;?></span> 信息一览</b></td>
                            
                        </tr>
                        <tr>
                        	<th width="90" height="40" align="right">旅行社名称</th>
                            <td width="130"><?php echo $travel_agency_data->agency_name;?></td>
                            <th align="right" width="90">旅行社邮箱</th>
                            <td><?php echo $travel_agency_data->agency_email;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">所在区域</th>
                            <td><?php echo $travel_agency_data->guide_region_name;?></td>
                            <th align="right">旅行社座机</th>
                            <td><?php echo $travel_agency_data->agency_telephone;?></td>
                        </tr>
                        <tr>
                        <tr>
                            <th width="90" height="40" align="right">旅行社部门</th>
                            <td><?php echo $travel_agency_data->agency_department;?></td>
                            <th align="right">旅行社传真</th>
                            <td><?php echo $travel_agency_data->agency_fax;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">旅行社地址</th>
                            <td colspan="3"><?php echo $travel_agency_data->agency_address;?></td>
              
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">联系人</th>
                            <td><?php echo $travel_agency_data->contacter;?></td>
                            <th align="right">联系电话</th>
                            <td><?php echo $travel_agency_data->contacter_phone;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">联系QQ</th>
                            <td><?php echo $travel_agency_data->contacter_qq;?>&nbsp;<a class="qqOn" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $travel_agency_data->contacter_qq;?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $travel_agency_data->contacter_qq;?>:41 &r=0.8940031429092906" alt="点击联系我" title="点击联系我"></a></td></td>
                            <th align="right">联系QQ2</th>
                            <td><?php echo $travel_agency_data->contacter_qq2;?>&nbsp;<a class="qqOn" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $travel_agency_data->contacter_qq2;?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $travel_agency_data->contacter_qq2;?>:41 &r=0.8940031429092906" alt="点击联系我" title="点击联系我"></a></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">联系QQ3</th>
                            <td><?php echo $travel_agency_data->contacter_qq3;?>&nbsp;<a class="qqOn" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $travel_agency_data->contacter_qq3;?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $travel_agency_data->contacter_qq3;?>:41 &r=0.8940031429092906" alt="点击联系我" title="点击联系我"></a></td>
                            <th align="right">审核状况</th>
                            <td><span class="green_text"><?php echo $travel_agency_data->show_attribute("status");?></span></td>
                        </tr>

                        <tr>
                            <th height="40" align="right">描述</th>
                            <td colspan="3"><?php echo $travel_agency_data->describe;?></td>
                        </tr>

                    </table>
                 </div> 
                 
                 <div class="right_tab_con edit_table">
                 <table cellpadding="0" cellspacing="0" width="100%">
                        <tr><td colspan="4" align="center" height="40"><b>预定信息</b></td></tr>
                        <tr>
                        	<th height="40" align="right">开始时间</th>
                            <td><?php echo $gordain_data->AgencyDate->start_date;?></td>
                            <th align="right">结束时间</th>
                            <td><?php echo $gordain_data->AgencyDate->end_date;?></td>
                        </tr>
                        
                        <tr>
                        	<th height="40" align="right">线路</th>
                            <td><?php echo $gordain_data->AgencyDate->line;?></td>
                            <th align="right">带团人数</th>
                            <td><?php echo $gordain_data->AgencyDate->numbers;?>人</td>
                        </tr>
                        
                        <tr>
                        	<th height="40" align="right">接团时间</th>
                            <td><?php echo $gordain_data->AgencyDate->date;?></td>
                            <th align="right">地址</th>
                            <td><?php echo $gordain_data->AgencyDate->address;?></td>
                        </tr>
                        
                         <tr>
                        	<th height="40" align="right">线路景点</th>
                            <td><?php echo $gordain_data->AgencyDate->attractions;?></td>
                            <th align="right">导游费用</th>
                            <td><?php echo $gordain_data->AgencyDate->cost;?>元/天</td>
                        </tr>
                        
                         <tr>
                        	<th height="40" align="right">其他费用</th>
                            <td><?php echo $gordain_data->AgencyDate->subsidies;?></td>
                          <th height="40" align="right">发布时间</th>
                            <td><?php echo $gordain_data->AgencyDate->show_attribute("create_time");?></td>  
                        </tr>
                        
                        <tr>
                            <th align="right">预定时间</th>
                            <td><?php echo $gordain_data->show_attribute("create_time");?></td>
                            <th align="right">状态</th>
                            <td><span class="green_text"><?php echo CV::$orderin_status[$gordain_data->status];?></span></td>
                        </tr>
                        
                        <tr>
                            <th align="right">备注</th>
                            <td colspan='3'><?php echo $gordain_data->comment;?></td>
                        </tr>
                        
                        <tr>
                        	<td colspan='4' align="right">
                        	    	<?php switch($gordain_data->status){
		case '1':
	    echo "<a href='".$this->createUrl("user/gordainstatus",array('id'=>$gordain_data->id,'status'=>'4'))."' class='cancel_bt_link'>取消预定</a>";
	    break;
	  case '3':
	    echo "<a href='".$this->createUrl("user/gordainstatus",array('id'=>$gordain_data->id,'status'=>'2'))."' class='sure_bt_link'>确认预定</a>";
	    break;
	  case '2':
	    echo "<a href='javascript:void();' class='cancel_bt_link'>预定成功</a>";
	    break;
	  default:
	    break;
 } ?>	
                        		
                        	</td>
                        </tr> 
                    </table>
                 </div>
                 
