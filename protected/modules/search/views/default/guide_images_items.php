 <li>
                            <div class="tu">
                            	
                                 <div class="d_user_dl">
                                    <div class="search_left_box"> <p><a href="<?php echo $this->createUrl("/guide/guide/detail",array('id'=>$data->id));?>"><?php if(!empty($data->guide_avater)){$themb_image=Util::rename_thumb_file('150','110','',$data->guide_avater);echo CHtml::image("/".$themb_image,$data->User->real_name,array());}else{echo CHtml::image($cssPath."/images/logo_150_110.gif",$data->User->real_name,array());}?></a></p> <?php if($data->top=='2'){ ?> <div class="dingzhi"></div> <?php } ?></div>
                                </div>
                                <div class="d_user_tu">
                                	<table width="100%" border="0">
  																		<tr>
    																		<td width="60" align="right" >姓名：</td>
    																		<td width="130" class="ti"><?php echo $data->User->real_name;?></td>
   																		  <td width="60" align="right" >性别：</td>
   																		  <td width="60" class="ti"><?php echo CV::$sex[$data->User->genter];?></td>
    																		<td width="60" align="right" >联系电话：</td>
    																		<td width="80" class="ti"><?php echo $data->guide_contact_phone;?></td>
    																		<td width="60">&nbsp;</td>
 																			 </tr>
  																		 <tr>
    																		<td align="right" >导游证：</td>
    																		<td class="ti"><?php echo $data->guide_number;?></td>
    																		<td align="right" >导游等级：</td>
    																		<td class="ti"><?php echo CV::$guide_level[$data->guide_level];?></td>
    																		<td align="right" >带团年限：</td>
    																		<td class="ti"><?php echo $data->guide_year;?>年</td>
    																		<td>&nbsp;</td>
  																		</tr>
  																		<tr>
  																			<td align="right" >带团价钱：</td>
    																		<td class="ti"><?php echo $data->guide_price;?>/天</td>
    																		<td align="right" >熟悉地：</td>
    																		<td class="ti" colspan="4"><?php echo $data->guide_familiar;?></td>
    																	</tr>
  																		<tr>
   																			<td colspan="7" align="right"><a href="<?php echo $this->createUrl("/guide/guide/detail",array('id'=>$data->id));?>" class="promptly_order">立即预约</a></td>
    																	</tr>
																	</table>
                              </div>
                            </div>
</li>
                   
                        
                      
                        

                        


                        
                        
                        

                        
                     
                        
                        
                        
                        
                        
  
                        
       
                        
     
                        
                        