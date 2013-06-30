<div class="print">
	<table class="print_table">
		<thead></thead>
		<tbody>
			<?php 
          $station_data=$this->station_data;
          $station_id=$station_data['id'];
          $station=new Station();
          $station_datas=$station->find(array('select'=>'company,company_logo,contacter,email,cell_phone,telephone','condition'=>'id=:id','params'=>array(':id'=>$station_id)))
           	    
      ?> 
      <tr>
				 <td class="print_name"><img width="80" height="80" src="<?php echo Yii::app()->homeUrl."/".$station_datas['company_logo'] ;?>"/></td><td class="print_content" colspan="5"><?php echo $station_datas['company'];?></td>
			</tr>
			
			<tr>
				<td class="print_name">旅行社信息:</td><td class="print_content" colspan='5'>
				 	<table class="contacter_table">
				 	  	<thead>
				 	  	   <th>
				 	  	   	 联系人:
				 	  	   </th>	
				 	  	   <th>
				 	  	   	 联系电话:
				 	  	   </th>
				 	  	   <th>
				 	  	   	 邮箱:
				 	  	   </th>
				 	  	   
				 	  	   <th>
				 	  	   	 座机:
				 	  	   </th>

				 	  	   <th>
				 	  	   	 地址:
				 	  	   </th>

				 	  	</thead>
				 	  	<tbody>
				 	  		 <tr>
				 	  		    <td><?php echo $station_datas->contacter;?></td>
				 	  		    <td><?php echo $station_datas->cell_phone;?></td>
				 	  		    <td><?php echo $station_datas->email;?></td>
				 	  		    <td><?php echo $station_datas->telephone;?></td>
				 	  		    <td><?php echo $station_datas->address;?></td>
				 	  		 </tr>
				 	  	</tbody>
				 	  </table>
				 	
				 	</td>
				 
			</tr>
			     	   
			<tr>
				 <td class="print_name">出游线路:</td><td colspan="3" class="print_content"><?php echo $model->line;?></td>
				 <td class="print_name">出游时间:</td><td class="print_content"><?php echo $model->date;?></td>
				 
			</tr>
			<tr>
				 <td class="print_name" colspan="6">地接社信息:</td>
			</tr>
			<tr>
				 <td colspan="6">
				 	  <table class="numbers_table">
				 	  	  <thead><th>地接社名称</th><th>联系人</th><th>联系电话</th><th>邮箱</th><th>座机</th><th>传真</th><th>地址</th></thead>
				 	  	  <tbody>
				 	  	     	<tr><td><?php echo $model->Dijieshe->name;?></td><td><?php echo $model->Dijieshe->contacter;?></td><td><?php echo $model->Dijieshe->cell_phone;?></td><td><?php echo $model->Dijieshe->email;?></td><td><?php echo $model->Dijieshe->tele_phone;?></td><td><?php echo $model->Dijieshe->fax;?></td><td><?php echo $model->Dijieshe->address;?></td></tr>
				 	  	  </tbody>
				 	  </table>
				 	</td>
				 	
			</tr>
			<tr>
				 <td class="print_name" colspan="6">成人信息:</td>
			</tr>
			<tr>
				<td colspan="6">
				<table class="numbers_table">
				 	  	  <thead><th>成人数</th><th>成人价</th><th>结算价</th></thead>
				 	  	  <tbody>
				 	  	     	<tr><td><?php echo $model->numbers;?>人</td><td><?php echo $model->market_price;?>元/人</td><td><?php echo $model->settlement_price;?>元/人</td></tr>
				 	  	  	
				 	  	  </tbody>
				 	  </table>
				</td>
			</tr>
			<tr>
				 <td class="print_name" colspan="6">儿童信息:</td>
			</tr>
			<tr>
				 <td colspan="6">
				 	  <table class="numbers_table">
				 	  	  <thead><th>儿童数</th><th>儿童价</th><th>结算价</th></thead>
				 	  	  <tbody>
				 	  	     	<tr><td><?php echo $model->children;?>人</td><td><?php echo $model->child_price;?>元/人</td><td><?php echo $model->child_settlement_price;?>元/人</td></tr>
				 	  	  </tbody>
				 	  </table>
				 	</td>
				 	
			</tr>
		  <tr>
				 <td class="print_name" colspan="6">统计信息:</td>
			</tr>
			<tr>
				 <td colspan="6">
				 	  <table class="numbers_table">
				 	  	  <thead><th>销售总价</th><th>结算总价</th><th>总利润</th></thead>
				 	  	  <tbody>
				 	  	     	<tr><td><?php echo $model->get_total_sell(array('id=:id'),array(':id'=>$model->id));?>元</td><td><?php echo $model->get_total_settle(array('id=:id'),array(':id'=>$model->id));?>元</td><td><?php echo $model->show_attribute("profit");?>元</td></tr>
				 	  	  </tbody>
				 	  </table>
				 	</td>
			</tr>
			
			<tr>
				 <td class="print_name" colspan="6">出游联系人信息:</td>
			</tr>
				 
				 <td colspan='6'>
				 	  <table class="contacter_table">
				 	  	<thead>
				 	  	   <th>
				 	  	   	 联系人:
				 	  	   </th>	
				 	  	   <th>
				 	  	   	 性别:
				 	  	   </th>
				 	  	   <th>
				 	  	   	 联系电话:
				 	  	   </th>
				 	  	   <th>
				 	  	   	 邮箱:
				 	  	   </th>
				 	  	   
				 	  	   <th>
				 	  	   	 身份证:
				 	  	   </th>
				 	  	   
				 	  	   <th>
				 	  	   	 QQ:
				 	  	   </th>
				 	  	   
				 	  	   <th>
				 	  	   	 MSN:
				 	  	   </th>
				 	  	   
				 	  	    <th>
				 	  	   	 地址:
				 	  	   </th>
				 	  	   <th>
				 	  	   	 公司地址:
				 	  	   </th>
				 	  	</thead>
				 	  	<tbody>
				 	  		 <tr>
				 	  		    <td><?php echo $model->name;?></td>
				 	  		    <td><?php echo $model->show_attribute("sex");?></td>
				 	  		    <td><?php echo $model->cell_phone;?></td>
				 	  		    <td><?php echo $model->email;?></td>
				 	  		    <td><?php echo $model->code;?></td>
				 	  		    <td><?php echo $model->qq;?></td>
				 	  		    <td><?php echo $model->msn;?></td>
				 	  		    <td><?php echo $model->address;?></td>
				 	  		    <td><?php echo $model->company_address;?></td>
				 	  		 </tr>
				 	  	</tbody>
				 	  </table>
				 </td>
				
			</tr>
			
			<tr>
				 <td class="print_name">结算:</td><td class="print_content">
				 	  <?php echo $model->show_attribute("status"); ?>
				 	</td>
				 	
				 	<td class="print_name">创建人:</td><td class="print_content">
				 	  <?php echo $model->show_attribute("create_id"); ?>
				 	</td>
				 	
				 	<td class="print_name">创建时间:</td><td class="print_content">
				 	  <?php echo $model->show_attribute("create_time"); ?>
				 	</td>
			</tr>
			
			 <tr>
				 <td class="print_name">备注:</td><td class="print_content" colspan="5">
				 	  <?php echo $model->comment; ?>
				 	</td>
			</tr>
			
			
			
		</tbody>
	</table>
</div>
<OBJECT id=WebBrowser classid=CLSID:8856F961-340A-11D0-A96B-00C04FD705A2 height=0 width=0 VIEWASTEXT>
</OBJECT>
<div id="print_button" style="text-align:right;"> 
	<input type="button" class="input_submit" onclick="javascript:preview(1)" value="web打印"/>
	<input type=button class="input_submit" value="打印"onclick="document.all.WebBrowser.ExecWB(6,1)" >
	<input type=button class="input_submit" value="页面设置" onclick="document.all.WebBrowser.ExecWB(8,1)" >
	<input type=button class="input_submit" value="打印预览" onclick="document.all.WebBrowser.ExecWB(7,1)">
<div>
	
	
	
	