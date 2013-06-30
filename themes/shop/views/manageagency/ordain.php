						<div class="edit_content edit_table">
                 <table cellpadding="0" cellspacing="0" width="100%">
                        <tr><td colspan="4" height="40" align="center"><b><span class="text_red">预定线路信息</span></b></td></tr>
                        <tr>
                        	<th height="40" align="right">开始时间</th>
                            <td><?php echo $agency_date_data->start_date;?></td>
                            <th align="right">结束时间</th>
                            <td><?php echo $agency_date_data->end_date;?></td>
                        </tr>
                        
                        <tr>
                        	<th height="40" align="right">线路</th>
                            <td><?php echo $agency_date_data->line;?></td>
                            <th align="right">带团人数</th>
                            <td><?php echo $agency_date_data->numbers;?>人</td>
                        </tr>
                        
                        <tr>
                        	<th height="40" align="right">接团时间</th>
                            <td><?php echo $agency_date_data->date;?></td>
                            <th align="right">地址</th>
                            <td><?php echo $agency_date_data->address;?></td>
                        </tr>
                        
                         <tr>
                        	<th height="40" align="right">线路景点</th>
                            <td><?php echo $agency_date_data->attractions;?></td>
                            <th align="right">导游费用</th>
                            <td><?php echo $agency_date_data->cost;?>元/天</td>
                        </tr>
                        
                         <tr>
                        	<th height="40" align="right">其他费用</th>
                            <td><?php echo $agency_date_data->subsidies;?></td>
                            <th align="right">发布时间</th>
                            <td><?php echo $agency_date_data->show_attribute("create_time");?></td>
                        </tr>
                        
                        <?php 
                           $gorder_data=$gordain_dataProvider->getData(); 
                               if(empty($gorder_data)){
                        ?>
                        <tr>
                        	<td colspan='4' align="right">
                        	    	<a href="<?php echo $this->createUrl("/manageagency/editscheduler",array('id'=>$agency_date_data->id));?>" class='sure_bt_link'>编辑线路信息</a>
                        	</td>
                        </tr>
                       <?php } ?> 
                        
                        
                    </table>
                 </div>
                 
                 
                 
  <div class="page-right-top" style="margin:20px 0;">导游预定信息</div>

	<div class="agencyordain_content">
		
		 <table class="gordin_line">
       				<thead><th width="80">导游名称</th><th width="80">预定时间</th><th width="353">备注</th><th width="75">订单状态</th><th width="155">操作</th></thead>
       				<tbody>   
       					  <?php
										$this->widget('zii.widgets.CListView',array(
												'dataProvider'=>$gordain_dataProvider,
												'itemView'=>'agencyordain_item',
												'ajaxUpdate'=>true,
												'summaryText'=>'',
												'summaryCssClass'=>'',
										));
									?>
              </tbody>
     </table>   					
       					
	
</div>

    	

