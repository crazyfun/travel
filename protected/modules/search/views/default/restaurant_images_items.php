
 <li>
                            <div class="tu">
                            	
                                 <div class="d_user_dl">
                                    <div class="search_left_box"><p><a href="<?php echo $this->createUrl("/restaurant/restaurant/detail",array('id'=>$data->id));?>"><?php if(!empty($data->restaurant_logo)){ $themb_image=Util::rename_thumb_file('150','110','',$data->restaurant_logo);echo CHtml::image("/".$themb_image,$data->restaurant_name,array());}else{echo CHtml::image($cssPath."/images/logo_150_110.gif",$data->restaurant_name,array());}?></a></p><?php if($data->top=='2'){ ?> <div class="dingzhi"></div> <?php } ?> </div>
                                </div>
                                <div class="d_user_tu">
                                	<table width="100%" border="0">
  																		<tr>
    																		<td width="60" align="right" >名称：</td>
    																		<td width="240" class="ti"><a href="<?php echo $this->createUrl("/restaurant/restaurant/detail",array('id'=>$data->id));?>"><?php echo $data->restaurant_name;?></a></td>
   																		  <td width="60" align="right" >联系人：</td>
   																		  <td width="90" class="ti"><?php echo $data->contacter;?></td>
    																		<td width="60">&nbsp;</td>
 																			 </tr>
  																		<tr>
    																		<td align="right" >地址：</td>
    																		<td class="ti"><?php echo $data->restaurant_address;?></td>
    																		<td  align="right" >联系电话：</td>
    																		<td  class="ti"><?php echo empty($data->restaurant_telephone)?$data->contacter_phone:$data->restaurant_telephone;?></td>
    																		<td">&nbsp;</td>
    																	</tr>
  																		<tr>
    																		<td align="right" >描述：</td>
    																		<td class="ti" colspan="3" style="line-height:15px;color:#555555;"><?php echo Util::cutstr(Util::br2nl($data->restaurant_desc),115,true);?></td>
    																		<td>&nbsp;</td>
    																	</tr>
  																		<tr>
   																			<td colspan="5" align="right"><a class="promptly_order" href="<?php echo $this->createUrl("/restaurant/restaurant/detail",array('id'=>$data->id));?>">查看详情</a></td>
    																	</tr>
																	</table>
                              </div>
                            </div>
</li>



