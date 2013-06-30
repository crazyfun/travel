          <?php $cssPath=$this->get_css_path();?>
        
        <div class="right_tab_con edit_table">
                 <table cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td width="191" valign="top" style="vertical-align:middle;" align="center" rowspan="11" class="portrait_td"><div class="portrait_con"><?php if(!empty($model->OrderUser()->TravelAgency()->agency_logo)){ $thumb_image=Util::rename_thumb_file('180','450','',$model->OrderUser()->TravelAgency()->agency_logo);echo CHtml::image("/".$thumb_image,$model->OrderUser()->TravelAgency()->agency_name,array());}else{echo CHtml::image($cssPath."/images/logo.gif",$model->OrderUser()->TravelAgency()->agency_name,array());}?></div></td>
                            <td colspan='4' height="40" align="center"><b>旅行社 <span class="text_red"><?php echo $model->OrderUser()->TravelAgency()->agency_name;?></span> 信息一览</b></td>
                            
                        </tr>
                        <tr>
                        	<th width="90" height="40" align="right">旅行社名称</th>
                            <td width="130"><?php echo $model->OrderUser()->TravelAgency()->agency_name;?></td>
                            <th align="right" width="90">旅行社邮箱</th>
                            <td><?php echo $model->OrderUser()->TravelAgency()->agency_email;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">所在区域</th>
                            <td><?php echo $model->OrderUser()->TravelAgency()->guide_region_name;?></td>
                            <th align="right">旅行社座机</th>
                            <td><?php echo $model->OrderUser()->TravelAgency()->agency_telephone;?></td>
                        </tr>
                        <tr>
                        <tr>
                            <th width="90" height="40" align="right">旅行社部门</th>
                            <td><?php echo $model->OrderUser()->TravelAgency()->agency_department;?></td>
                            <th align="right">旅行社传真</th>
                            <td><?php echo $model->OrderUser()->TravelAgency()->agency_fax;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">旅行社地址</th>
                            <td colspan="3"><?php echo $model->OrderUser()->TravelAgency()->agency_address;?></td>
              
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">联系人</th>
                            <td><?php echo $model->OrderUser()->TravelAgency()->contacter;?></td>
                            <th align="right">联系电话</th>
                            <td><?php echo $model->OrderUser()->TravelAgency()->contacter_phone;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">联系QQ</th>
                            <td><?php echo $model->OrderUser()->TravelAgency()->contacter_qq;?>&nbsp;<a class="qqOn" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $model->OrderUser()->TravelAgency()->contacter_qq;?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $model->OrderUser()->TravelAgency()->contacter_qq;?>:41 &r=0.8940031429092906" alt="点击联系我" title="点击联系我"></a></td>
                            <th align="right">联系QQ2</th>
                            <td><?php echo $model->OrderUser()->TravelAgency()->contacter_qq2;?>&nbsp;<a class="qqOn" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $model->OrderUser()->TravelAgency()->contacter_qq2;?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $model->OrderUser()->TravelAgency()->contacter_qq2;?>:41 &r=0.8940031429092906" alt="点击联系我" title="点击联系我"></a></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">联系QQ3</th>
                            <td><?php echo $model->OrderUser()->TravelAgency()->contacter_qq3;?>&nbsp;<a class="qqOn" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $model->OrderUser()->TravelAgency()->contacter_qq3;?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $model->OrderUser()->TravelAgency()->contacter_qq3;?>:41 &r=0.8940031429092906" alt="点击联系我" title="点击联系我"></a></td>
                            <th align="right">审核状况</th>
                            <td><?php echo $model->OrderUser()->TravelAgency()->show_attribute("status");?></td>
                        </tr>

                        <tr>
                            <th height="40" align="right">描述</th>
                            <td colspan="3"><?php echo $model->OrderUser()->TravelAgency()->describe;?></td>
                        </tr>

                    </table>
                 </div> 
                 
                 
                 
                 
                 <div class="right_tab_con edit_table">
                 <table cellpadding="0" cellspacing="0" width="100%">
                        <tr><td colspan="4" align="center" height="40"><b>预定信息</b></td></tr>
                        <tr>
                        	<th height="40" align="right">开始时间</th>
                            <td><?php echo $model->AgencyDate->start_date;?></td>
                            <th align="right">结束时间</th>
                            <td><?php echo $model->AgencyDate->end_date;?></td>
                        </tr>
                        
                        <tr>
                        	<th height="40" align="right">线路</th>
                            <td><?php echo $model->AgencyDate->line;?></td>
                            <th align="right">带团人数</th>
                            <td><?php echo $model->AgencyDate->numbers;?>人</td>
                        </tr>
                        
                        <tr>
                        	<th height="40" align="right">接团时间</th>
                            <td><?php echo $model->AgencyDate->date;?></td>
                            <th align="right">地址</th>
                            <td><?php echo $model->AgencyDate->address;?></td>
                        </tr>
                        
                         <tr>
                        	<th height="40" align="right">线路景点</th>
                            <td><?php echo $model->AgencyDate->attractions;?></td>
                            <th align="right">导游费用</th>
                            <td><?php echo $model->AgencyDate->cost;?>元/天</td>
                        </tr>
                        
                         <tr>
                        	<th height="40" align="right">其他费用</th>
                            <td><?php echo $model->AgencyDate->subsidies;?></td>
                          <th height="40" align="right">发布时间</th>
                            <td><?php echo $model->AgencyDate->show_attribute("create_time");?></td>  
                        </tr>
                        
                        <tr>
                        	
                            <th align="right">预定时间</th>
                            <td><?php echo $model->show_attribute("create_time");?></td>
                            <th align="right">状态</th>
                            <td><span class="green_text"><?php echo CV::$orderin_status[$model->status];?></span></td>
                        </tr>
                        
                        
                        
                        <tr>
                        	<td colspan='4' align="right">
                        	    	<?php switch($model->status){
		case '1':
	    echo "<a href='".$this->createUrl("user/ordainstatus",array('id'=>$model->id,'status'=>'2'))."' class='sure_bt_link'>确认预定</a>&nbsp;&nbsp;<a href='".$this->createUrl("user/ordainstatus",array('id'=>$model->id,'status'=>'4'))."' class='cancel_bt_link'>取消预定</a>";
	    break;
	  case '2':
	    echo "<a href='".$this->createUrl("user/ordainstatus",array('id'=>$model->id,'status'=>'1'))."' class='cancel_bt_link'>取消确认</a>";
	    break;
	  case '3':
	    echo "<a href='javascript:void();' class='cancel_bt_link'>预定成功</a>";
	    break;
	  default:
	    break;
 } ?>	
                        		
                        	</td>
                        </tr> 
                    </table>
                 </div>

