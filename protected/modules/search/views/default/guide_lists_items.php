<tr>
	<td align="center" style="vertical-align:middle;height:90px;"><div class="list_wrapper"><div class="guide_ibox"><p><a href="<?php echo $this->createUrl("/guide/guide/detail",array('id'=>$data->id));?>"><?php if(!empty($data->guide_avater)){$themb_image=Util::rename_thumb_file('90','90','',$data->guide_avater);echo CHtml::image("/".$themb_image,$data->User->real_name,array());}else{echo CHtml::image($cssPath."/images/logo_90_90.gif",$data->User->real_name,array());}?></a></p></div><?php if($data->top=='2'){ ?> <div class="dingzhi_guide_list"></div> <?php } ?></div></td>
	<td><a href="<?php echo $this->createUrl("/guide/guide/detail",array('id'=>$data->id));?>"><?php echo $data->User->real_name;?></a></td>
	<td><?php echo $data->guide_contact_phone;?></td>
	<td><?php echo $data->guide_number;?></td>
	<td><?php echo CV::$guide_level[$data->guide_level];?></td>
	<td><?php echo CV::$sex[$data->User->genter];?></td>
	<td><?php echo $data->guide_year;?>年</td>
	<td><?php echo $data->guide_price;?>/天</td>
	<td><?php echo $data->guide_familiar;?></td>
  <td><a href="<?php echo $this->createUrl("/guide/guide/detail",array('id'=>$data->id));?>">立即预定</a></td>
</tr>


