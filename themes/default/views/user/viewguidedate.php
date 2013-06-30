
               <div class="right_tab_con" style="width:620px;margin:20px auto;">
                	 
                	<div class="flash_info"><?php $this->widget("FlashInfo");?></div>
									<div class="input_line"><div class="input_name"><span class="input_required"></span>时间:</div><div class="input_content"><?php echo $model->date;?></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>备注:</div><div class="input_content"><?php echo $model->comment;?></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>空闲状态:</div><div class="input_content"><?php echo $model->show_attribute('status');?></div><div class="content_error"></div><div class="input_tip"></div></div>
  								<div class="input_line"><div class="input_name"><span class="input_required"></span>编辑时间:</div><div class="input_content"><?php echo $model->show_attribute('create_time');?></div><div class="content_error"></div><div class="input_tip"></div></div>
                  <div class="input_line"><div class="input_button"><a class="sure_bt_link" href="<?php echo $this->createUrl("user/editguidedate",array('id'=>$model->id));?>">编辑</a></div></div>
    
            	</div>

	      
    