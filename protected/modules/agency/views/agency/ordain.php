<div class="pop_ordain">
	           <div class="page-right-top">线路信息</div>
	
	           <div class="edit_table">
                 <table cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                        	<th height="40" align="right">开始时间</th>
                            <td><?php echo $model->start_date;?></td>
                            <th align="right">结束时间</th>
                            <td><?php echo $model->end_date;?></td>
                        </tr>
                        
                        <tr>
                        	<th height="40" align="right">线路</th>
                            <td><?php echo $model->line;?></td>
                            <th align="right">带团人数</th>
                            <td><?php echo $model->numbers;?>人</td>
                        </tr>
                        
                        <tr>
                        	<th height="40" align="right">接团时间</th>
                            <td><?php echo $model->date;?></td>
                            <th align="right">地址</th>
                            <td><?php echo $model->address;?></td>
                        </tr>
                        
                         <tr>
                        	<th height="40" align="right">线路景点</th>
                            <td><?php echo $model->attractions;?></td>
                            <th align="right">导游费用</th>
                            <td><?php echo $model->cost;?>元/天</td>
                        </tr>
                        
                         <tr>
                        	 <th height="40" align="right">其他费用</th>
                            <td><?php echo $model->subsidies;?></td>
                            
                            <th height="40" align="right">发布时间</th>
                            <td><?php echo $model->show_attribute("create_time");?></td>
                            
                        </tr>
                    </table>
                 </div>

	<div class="page-right-top">填写预定信息</div>
    <div class="agency_ordain">
		   <?php 
    		 
    		 $form=$this->beginWidget('CActiveForm', array(
	        'id'=>'',
          'action'=>$this->createUrl("agency/doordain"),
	        'enableAjaxValidation'=>false,
	        'htmlOptions'=>array('id'=>'','enctype'=>'multipart/form-data'),
         ));
         echo EHtml::createHidden("date_id",$date_id,array());
         echo EHtml::createHidden("agency_id",$agency_id,array());
       
      ?>
                	<div class="flash_info"><?php $this->widget("FlashInfo");?></div>
									<div class="input_line"><div class="input_name"><span class="input_required"></span>备注:</div><div class="input_content"><?php echo EHtml::createTextarea("comment",'',array('width'=>'200px','height'=>'100px'));?></div><div class="content_error"></div><div class="input_tip"></div></div>
                  <div class="input_line"><div class="input_button"><?php echo CHtml::submitButton("预定",array('class'=>'save_bt'));?><?php echo CHtml::resetButton("重置",array('class'=>'save_bt'));?></div></div>
    <?php $this->endWidget(); ?> 	
   </div> 
    
    
    
	
	</div>


