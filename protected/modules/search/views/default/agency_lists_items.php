<tr>
	<td align="center" style="vertical-align:middle;"><div class="list_wrapper"><div class="search_left_box"> <p><a href="<?php echo $this->createUrl("/agency/agency/detail",array('id'=>$data->id));?>"><?php if(!empty($data->agency_logo)){$themb_image=Util::rename_thumb_file('150','110','',$data->agency_logo);echo CHtml::image("/".$themb_image,$data->agency_name,array());}else{echo CHtml::image($cssPath."/images/logo_150_110.gif",$data->agency_name,array());}?></a></p></div><?php if($data->top=='2'){ ?> <div class="dingzhi_list"></div> <?php } ?></div></td>
	<td><a href="<?php echo $this->createUrl("/agency/agency/detail",array('id'=>$data->id));?>"><?php echo $data->agency_name;?></a></td>
	<td><?php echo $data->contacter;?></td>
	<td><?php echo empty($data->agency_telephone)?$data->contacter_phone:$data->agency_telephone;?></td>
	<td><?php echo $data->agency_address;?></td>
  <td><a href="<?php echo $this->createUrl("/agency/agency/detail",array('id'=>$data->id));?>">查看详情</a></td>
</tr>
        
                      