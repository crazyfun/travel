
<tr>
	<td><?php echo "<a href='".$this->createUrl("user/viewguide",array('id'=>$data->OrderUser->id))."'>".$data->OrderUser->real_name."</a>";?></td>
	<td><?php echo $data->show_attribute("create_time");?></td>
	<td><?php echo $data->comment;?></td>
	<td><?php echo CV::$orderin_status[$data->status];?></td>
	<td><?php switch($data->status){
		case '1':
	    echo "<a href='".$this->createUrl("user/gordainstatus",array('id'=>$data->id,'status'=>'3'))."' class='sure_bt_link'>确认预定</a>&nbsp;&nbsp;<a href='".$this->createUrl("user/gordainstatus",array('id'=>$data->id,'status'=>'5'))."' class='cancel_bt_link'>取消预定</a>";
	    break;
	  case '3':
	    echo "<a href='".$this->createUrl("user/gordainstatus",array('id'=>$data->id,'status'=>'1'))."' class='cancel_bt_link'>取消确认</a>";
	    break;
	  case '2':
	    echo "<a href='javascript:void();' class='cancel_bt_link'>预定成功</a>";
	    break;
	  default:
	    break;
   } ?>	</td>
	
</tr>
                
