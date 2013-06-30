     <?php 
        Yii::app()->clientScript->registerCssFile("/js/jbox/Skins2/Green/jbox.css");
				Yii::app()->clientScript->registerScriptFile('/js/jbox/jquery.jBox-2.3.min.js');
				Yii::app()->clientScript->registerScriptFile('/js/jbox/i18n/jquery.jBox-zh-CN.js');
    	  $cssPath=$this->get_css_path();
      	Yii::app()->clientScript->registerScriptFile('/js/mlselection.js');
      	$regions=Util::com_search_item(array(''=>'请选择区域'),$regions);
      ?> 	
    	<div class="sch-main-left">
        	<div class="condition-con">
                <div class="sch-condition">
                	<?php
	  $form=$this->beginWidget('EActiveForm', array(
	        'id'=>'search_form',
	        'method'=>'GET',
          'action'=>$this->createUrl("/search/default/index",array('action'=>'line')),
	        'enableAjaxValidation'=>false,
	        'htmlOptions'=>array('id'=>'search_form','enctype'=>'multipart/form-data'),
         ));
          echo EHtml::createHidden("action",$action,array('id'=>'action'));
          echo EHtml::createHidden("show_items",$page_params['show_items'],array('id'=>'show_items'));
          echo EHtml::createHidden("registe_sort",$page_params['registe_sort'],array('id'=>'registe_sort'));
          echo EHtml::createHidden("start_sort",$page_params['start_sort'],array('id'=>'start_sort'));
          echo EHtml::createHidden("cost_sort",$page_params['cost_sort'],array('id'=>'cost_sort'));
           
  ?>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="80" align="right" height="30"><strong>关键字：</strong></td>
                            <td><?php echo EHtml::createText("keywords",$page_params['keywords'],array('id'=>'search_keywords'));?></td>
                            <td width="95" align="right" height="30"><strong>开始时间：</strong></td><td><?php echo EHtml::createDate("start_time",$page_params['start_time'],array());?></td>
	                          <td width="95" align="right" height="30"><strong>结束时间:</strong></td><td><?php echo EHtml::createDate("end_time",$page_params['end_time'],array());?></td>
	                     </tr>
	                     <tr>
	 
                            <td align="right" width="80"><strong>区域：</strong></td>
                            <td colspan='4'>
                            	<div id="region">
	      	             						<input type="hidden" name="region_id" value="<?php echo $page_params['region_id'];?>" id="region_id" class="mls_id" />
	      	             						<input type="hidden" name="region_name" value="<?php echo $page_params['region_name'];?>" class="mls_names" />
	      	             						<?php if($page_params['region_name']){ ?>
                       	 						<span><?php echo $page_params['region_name'];?></span>
                       	  					<?php echo CHtml::button("修改",array('class'=>'edit_region'));?>
                        						<?php  echo EHtml::createSelect("guide_region",'',$regions,array('onchange'=>'javascript:hide_error();','style'=>'display:none;'));?>
                      						<?php }else{
                      								echo EHtml::createSelect("guide_region",'',$regions,array('onchange'=>'javascript:hide_error();'));
                      							} 
                      						?>
	                     				</div>
	                     		  </td>
	                     				<td><input type="submit" class="sch-main-bt" value=""></td>
                        </tr>
                        
                    </table>
               <?php $this->endWidget(); ?>     
                  
                </div>
            <!--sch-condition end-->
            </div><!--condition-con end-->
            <div class="sch_result">
                <div class="result-top">
                	<div class="display_no_modes">
                		
		                </div>
    
										<?php foreach($advanced_sort as $key => $value){
			
	  								?>			
													<a title="<?php echo $value;?>" class="<?php if($page_params[$key]=='ASC') echo 'sort_active sort_desc';else if($page_params[$key]=='DESC') echo "sort_active sort_asc";  else echo 'sort_asc';?>"  href="javascript:advance_sort('<?php echo $key;?>','<?php if($page_params[$key]=='ASC') echo 'DESC'; else echo 'ASC';?>');"><?php echo $value; ?><?php if($page_params[$key]=='ASC') echo '↓'; else echo '↑';?></a>
	  								<?php  }?>
                </div>
                <!--result-top end-->
                <div class="result-mid">
            <?php $dataProvide_data=$dataProvider->getData(); ?>
            <table class="search_line">
       				<thead><th width="145">线路名称</th><th width="160">旅行社名称</th><th width="80">开始时间</th><th width="80">结束时间</th><th width="40">人数</th><th width="45">价钱</th><th width="80">操作</th></thead>
       				<tbody>   
                 <?php foreach($dataProvide_data as $key => $data){ ?>  
                         <tr>
														<td><div class="line_wrapper"><?php echo $data->line;?><?php if($data->top=='2'){ ?> <div class="line_dingzhi"></div> <?php } ?></div></td>
														<td><a href="<?php echo $this->createUrl("/agency/agency/detail",array('id'=>$data->User->TravelAgency->id));?>"><?php echo $data->User->TravelAgency->agency_name;?></a></td>
														<td><?php echo $data->start_date;?></td>
														<td><?php echo $data->end_date;?></td>
														<td><?php echo $data->numbers;?></td>
														<td><?php echo $data->cost;?>元/天</td>
 														<td><a href="javascript:ordain_agency('<?php echo $data->id;?>','<?php echo $data->User->TravelAgency->id;?>')">立即预定</a></td>
													</tr>
                <?php } ?>
                
                <tr>
                	    	 <td colspan="7"  style="text-align:right;height:15px;">
                	    		<?php $pages=$dataProvider->getPagination();
                	    			$this->widget('CLinkPager', array(
    													'pages' => $pages,
    													
														));
                       		?>
                       	</td>
                </tr>
           </tbody>
          </table>
                   

                </div>
                <div class="result_bot"></div>
            </div>
            <!--sch_result end--> 
        </div>
        <!--sch-main-left end-->
        
        <div class="sch-main-right">
        	
        	  <?php
      				if($this->beginCache(Util::get_cache_id("NewestLine"), array('duration'=>"1"))){
                  $this->widget('NewestLine', array( 
                     'view'=>'snewest_line',
                     'nums'=>10,            
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
       			<?php echo Util::GetAd(7);?>
       				<?php
      				if($this->beginCache(Util::get_cache_id("HotLine"), array('duration'=>"3600*24*7"))){
                  $this->widget('HotLine', array(      
                    'view'=>'shot_line',
                    'nums'=>10,      
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
   
           
            
            
            
        
        
    </div><!--sch-main-right end-->
    <div class="clear_both"></div>
    
     <script language="javascript">
    		jQuery(function(){
    			regionInit("region");
    			show_keywords_describe("search_keywords","线路名称/旅行社名称/线路景点/带团人数/接团地点...","search_form");
    	    jQuery(".search_line > tbody >tr:even").addClass("search_even");
    			jQuery(".search_line > tbody >tr:odd").addClass("search_odd");
    			jQuery(".search_line > tbody >tr").hover(function(){
    				 jQuery(this).addClass("search_hover");
    			},function(){
    			  jQuery(this).removeClass("search_hover");
    	   	});
    	  });
        function hide_error(){
          jQuery('#region').find('.error').hide();
        }
        function advance_search(id,value){
        	jQuery("#"+id).val(value);
        	var keyword_content=jQuery("#search_keywords").val();
					if(keyword_content=="线路名称/旅行社名称/线路景点/带团人数/接团地点..."){
		   				jQuery("#search_keywords").val('');
					}
        	document.getElementById("search_form").submit();
        }
        
        function advance_sort(id,value){
        	jQuery("#registe_sort").val('');
        	jQuery("#start_sort").val('');
        	jQuery("#cost_sort").val('');
        	jQuery("#"+id).val(value);
        	var keyword_content=jQuery("#search_keywords").val();
					if(keyword_content=="线路名称/旅行社名称/线路景点/带团人数/接团地点..."){
		   				jQuery("#search_keywords").val('');
					}
        	document.getElementById("search_form").submit();
        }
        
      function ordain_agency(date_id,agency_id){
						// 用iframe显示http://www.baidu.com的内容，并设置了标题、宽与高、按钮
				jQuery.jBox("iframe:/agency/agency/ordain?date_id="+date_id+"&agency_id="+agency_id, {
    			title: "预定旅行社线路",
    			width: 800,
    			height: 500,
   				 buttons: { '关闭': true }
				});
			}
    	</script>