         <?php $cssPath=$this->get_css_path();?>
        <div class="right_tab_con edit_table">
                 <table cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td width="191" valign="top" align="center" rowspan="11" style="vertical-align:middle;" class="portrait_td"><div class="portrait_con"><?php if(!empty($model->User()->Guide()->guide_pass)){$thumb_image=Util::rename_thumb_file('180','450','',$model->User()->Guide()->guide_pass);echo CHtml::image("/".$thumb_image,$model->User()->real_name,array());}else{echo CHtml::image($cssPath."/images/logo.gif",$model->User()->real_name,array());}?></div></td>
                            <td colspan='4' align="center" height="40"><b>导游员 <span class="text_red"><?php echo $model->User()->real_name;?></span> 信息一览</b></td>
                        </tr>
                        <tr>
                        	 <th width="90" height="40" align="right">头像</th>
                            <td width="130"><?php if(!empty($model->User()->Guide()->guide_avater)){ $thumb_image=Util::rename_thumb_file('90','90','',$model->User()->Guide()->guide_avater);echo CHtml::image("/".$thumb_image,$model->User()->real_name,array());}else{ echo CHtml::image($cssPath."/images/logo.gif",$model->User()->real_name,array());}?></td>
                            <th align="right" width="90">性别</th>
                            <td><?php echo CV::$sex[$model->User()->genter];?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">导游证号</th>
                            <td><?php echo $model->User()->Guide()->guide_number;?></td>
                            <th align="right">导游等级</th>
                            <td><?php echo CV::$guide_level[$model->User()->Guide()->guide_level];?></td>
                        </tr>
                        <tr>
                        <tr>
                            <th width="90" height="40" align="right">资格证号</th>
                            <td><?php echo $model->User()->Guide()->guide_qualifications;?></td>
                            <th align="right">导游学历</th>
                            <td><?php echo CV::$guide_educational[$model->User()->Guide()->guide_educational];?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">导游卡号</th>
                            <td><?php echo $model->User()->Guide()->guide_cade;?></td>
                            <th align="right">语种</th>
                            <td><?php echo $model->User()->Guide()->guide_language;?></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">所在区域</th>
                            <td><?php echo$model->User()->Guide()->guide_region_name;?></td>
                            <th align="right">语种2</th>
                            <td><?php echo $model->User()->Guide()->guide_language2;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">带团年限</th>
                            <td><?php echo $model->User()->Guide()->guide_year;?>年</td>
                            <th align="right">熟悉地</th>
                            <td><?php echo $model->User()->Guide()->guide_familiar;?></td>
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">发证日期</th>
                            <td><?php echo $model->User()->Guide()->guide_date;?></td>
                            <th align="right">分值</th>
                            <td><?php echo $model->User()->Guide()->guide_score;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">联系电话</th>
                            <td><?php echo $model->User()->Guide()->guide_contact_phone;?></td>
                            <th align="right">导游QQ</th>
                            <td><?php echo $model->User()->Guide()->guide_qq;?>&nbsp;<a class="qqOn" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $model->User()->Guide()->guide_qq;?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $model->User()->Guide()->guide_qq;?>:41 &r=0.8940031429092906" alt="点击联系我" title="点击联系我"></a></td></td>
                        </tr>

                       <tr>
                        		<th height="40" align="right">审核状态</th>
                            <td><span class="green_text"><?php echo $model->User()->Guide()->show_attribute("status");?></span></td>
                            <th align="right">带团价格</th>
                            <td><?php echo $model->User()->Guide()->guide_price;?>/天</td>
                        </tr>
                        <tr>
                            <th height="40" align="right">描述</th>
                            <td colspan="3"><?php echo $model->User()->Guide()->describe;?></td>
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
                            <th align="right">状态</th>
                            <td><span class="green_text"><?php echo CV::$orderin_status[$model->status];?></span></td>
                        </tr>
                        <tr>
                        	<td colspan='4' align="right">
                        	    	<?php switch($model->status){
		case '1':
	    echo "<a href='".$this->createUrl("user/ordainstatus",array('id'=>$model->id,'status'=>'5'))."' class='cancel_bt_link'>取消预定</a>";
	    break;
	  case '2':
	    echo "<a href='".$this->createUrl("user/ordainstatus",array('id'=>$model->id,'status'=>'3'))."' class='sure_bt_link'>确认预定</a>&nbsp;&nbsp;<a href='".$this->createUrl("user/ordainstatus",array('id'=>$model->id,'status'=>'5'))."' class='cancel_bt_link'>取消预定</a>";
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

