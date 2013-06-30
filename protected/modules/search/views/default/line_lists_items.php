<tr>
	<td><?php echo $data->line;?><?php if($data->top=='2'){ ?> <div class="dingzhi"></div> <?php } ?></td>
	<td><a href="<?php echo $this->createUrl("/agency/agency/detail",array('id'=>$data->User->TravelAgency->id));?>"><?php echo $data->User->TravelAgency->agency_name;?></a></td>
	<td><?php echo $data->start_date;?></td>
	<td><?php echo $data->end_date;?></td>
	<td><?php echo $data->numbers;?></td>
	<td><?php echo $data->cost;?>元/天</td>
  <td><a href="javascript:ordain_agency('<?php echo $data->id;?>','<?php echo $data->User->TravelAgency->id;?>')">立即预定</a></td>
</tr>
                