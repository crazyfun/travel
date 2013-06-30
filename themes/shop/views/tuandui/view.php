<div id="page_content">
    <div class="show_right_content">
    <!--编辑框-->	
    	<div class="edit_content">
           <div class="content_title">
           	<!--
           	  <?php $station_data=$this->station_data;?>
           	  
           	   <div class="station_data_logo">
           	   	  <img src="<?php echo Yii::app()->homeUrl."/".$station_data['company_logo'] ;?>"/>
           	   </div>
           	   
           	   <div class="station_data_content">
           	     <div class="sdc_item">电话:</div>
           	     <div class="sdc_item">传真:</div>	
           	   </div>
           	  
           	  <?php echo $model->Dijieshe->name;?>&nbsp;&nbsp;电话:<?php echo $model->Dijieshe->cell_phone;?>&nbsp;&nbsp;传真:<?php echo $model->Dijieshe->fax;?>&nbsp;&nbsp;创建人:<?php echo $model->User->user_login;?>
           	-->
           	查看详细信息 
           </div>
           
            
            <div class="content_inline">
              	<div class="content_name">ID:</div><div class="content_content"><?php echo $model->show_attribute("id");?></div>
            </div>
            <div class="content_inline">
              	<div class="content_name">地接社:</div><div class="content_content"><?php echo $model->show_attribute("dijieshe");?></div>
            </div>
            <div class="content_inline">
              	<div class="content_name">出游线路:</div><div class="content_content"><?php echo $model->show_attribute("line");?></div>
            </div>
            
            <div class="content_inline">
              	<div class="content_name">出游时间:</div><div class="content_content"><?php echo $model->show_attribute("date");?></div>
            </div>
            
            <div class="content_inline">
              	<div class="content_name">上车地点:</div><div class="content_content"><?php echo $model->show_attribute("on_car");?></div>
            </div>
            
      
            <div class="content_inline">
              	<div class="content_name">成人数:</div><div class="content_content"><?php echo $model->show_attribute("numbers");?>人</div>
            </div>
            
            <div class="content_inline">
              	<div class="content_name">成人价格:</div><div class="content_content"><?php echo $model->show_attribute("market_price");?>元/人</div>
            </div>
            
            <div class="content_inline">
              	<div class="content_name">成人结算价格:</div><div class="content_content"><?php echo $model->show_attribute("settlement_price");?>元/人</div>
            </div>
            
            <div class="content_inline">
              	<div class="content_name">儿童数:</div><div class="content_content"><?php echo $model->show_attribute("children");?>人</div>
            </div>
            
            <div class="content_inline">
              	<div class="content_name">儿童价格:</div><div class="content_content"><?php echo $model->show_attribute("child_price");?>元/人</div>
            </div>
            
            <div class="content_inline">
              	<div class="content_name">儿童结算价格:</div><div class="content_content"><?php echo $model->show_attribute("child_settlement_price");?>元/人</div>
            </div>
            
            
            <div class="content_inline">
              	<div class="content_name">销售总价:</div><div class="content_content"><?php echo $model->show_attribute("total_market");?></div>
            </div>
            
             <div class="content_inline">
              	<div class="content_name">结算总价:</div><div class="content_content"><?php echo $model->show_attribute("total_settlement");?></div>
            </div>
            
            <div class="content_inline">
              	<div class="content_name">结算状态:</div><div class="content_content"><?php echo $model->show_attribute("status");?></div>
            </div>
            
            <div class="content_inline">
              	<div class="content_name">代收款:</div><div class="content_content"><?php echo $model->show_attribute("collection");?></div>
            </div>
            <div class="content_inline">
              	<div class="content_name">总利润:</div><div class="content_content"><?php echo $model->show_attribute("profit");?>元</div>
            </div>
            
            
            
            <div class="content_inline">
              	<div class="content_name">联系人:</div><div class="content_content"><?php echo $model->show_attribute("name");?></div>
            </div>
            
            <div class="content_inline">
              	<div class="content_name">性别:</div><div class="content_content"><?php echo $model->show_attribute("sex");?></div>
            </div>
            
            
            <div class="content_inline">
              	<div class="content_name">联系方式:</div><div class="content_content"><?php echo $model->show_attribute("cell_phone");?></div>
            </div>
            
          <?php if(!empty($model->email)){ ?>
             <div class="content_inline">
              	<div class="content_name">邮箱:</div><div class="content_content"><?php echo $model->show_attribute("email");?></div>
             </div>
          <?php } ?>
          
          <?php if(!empty($model->code)){ ?>
             <div class="content_inline">
              	<div class="content_name">身份证号码:</div><div class="content_content"><?php echo $model->show_attribute("code");?></div>
             </div>
          <?php } ?>
          
          <?php if(!empty($model->qq)){ ?>
             <div class="content_inline">
              	<div class="content_name">Qq:</div><div class="content_content"><?php echo $model->show_attribute("qq");?></div>
             </div>
          <?php } ?>
          
          <?php if(!empty($model->msn)){ ?>
             <div class="content_inline">
              	<div class="content_name">Msn:</div><div class="content_content"><?php echo $model->show_attribute("msn");?></div>
             </div>
          <?php } ?>
          
          
           <?php if(!empty($model->address)){ ?>
             <div class="content_inline">
              	<div class="content_name">联系人地址:</div><div class="content_content"><?php echo $model->show_attribute("address");?></div>
             </div>
          <?php } ?>
          <?php if(!empty($model->company_address)){ ?>
             <div class="content_inline">
              	<div class="content_name">公司地址:</div><div class="content_content"><?php echo $model->show_attribute("company_address");?></div>
             </div>
          <?php } ?>
          
          
          <div class="content_inline">
              	<div class="content_name">备注:</div><div class="content_content"><?php echo $model->show_attribute("comment");?></div>
            </div>
            
             <div class="content_inline">
              	<div class="content_name">创建人:</div><div class="content_content"><?php echo $model->show_attribute("create_id");?></div>
            </div>
            
            <div class="content_inline">
              	<div class="content_name">创建时间:</div><div class="content_content"><?php echo $model->show_attribute("create_time");?></div>
            </div>
            
            
           <div class="content_button">&nbsp;</div>
           
          
           <div class="content_button">&nbsp;</div>
    	</div>
    	 <!--编辑框end-->	
    </div>
</div>




<div style="text-align:right;"><input type="button" value="打印订单" onclick="javascript:window.open('<?php echo $this->createUrl("print",array('id'=>$model->id));?>','打印订单','');" class="input_submit"/></div>
      