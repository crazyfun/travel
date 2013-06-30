
<tr>
	<td align="center" style="vertical-align:middle;"><div class="list_wrapper"><div class="search_left_box"><p><a href="<?php echo $this->createUrl("/restaurant/restaurant/detail",array('id'=>$data->id));?>"><?php if(!empty($data->restaurant_logo)){ $themb_image=Util::rename_thumb_file('150','110','',$data->restaurant_logo);echo CHtml::image("/".$themb_image,$data->restaurant_name,array());}else{echo CHtml::image($cssPath."/images/logo_150_110.gif",$data->restaurant_name,array());}?></a></p></div><?php if($data->top=='2'){ ?> <div class="dingzhi_list"></div> <?php } ?></div></td>
	<td><a href="<?php echo $this->createUrl("/restaurant/restaurant/detail",array('id'=>$data->id));?>"><?php echo $data->restaurant_name;?></a></td>
	<td><?php echo $data->restaurant_open;?></td>
	<td><?php echo CV::$restaurant_level[$data->restaurant_level];?></td>
	<td><?php echo $data->contacter;?></td>
	<td><?php echo empty($data->restaurant_telephone)?$data->contacter_phone:$data->restaurant_telephone;?></td>
	<td><?php echo $data->restaurant_address;?></td>
  <td> <a href="<?php echo $this->createUrl("/restaurant/restaurant/detail",array('id'=>$data->id));?>">查看详情</a></td>
</tr>
    