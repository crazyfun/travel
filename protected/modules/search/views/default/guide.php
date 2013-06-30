 	   <?php 
  
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
          'action'=>$this->createUrl("/search/default/index",array('action'=>'guide')),
	        'enableAjaxValidation'=>false,
	        'htmlOptions'=>array('id'=>'search_form','enctype'=>'multipart/form-data'),
         ));
          echo EHtml::createHidden("action",$action,array('id'=>'action'));
          echo EHtml::createHidden("guide_level",$page_params['guide_level'],array('id'=>'guide_level'));
          echo EHtml::createHidden("guide_educational",$page_params['guide_educational'],array('id'=>'guide_educational'));
          echo EHtml::createHidden("guide_year",$page_params['guide_year'],array('id'=>'guide_year'));
          echo EHtml::createHidden("genter",$page_params['genter'],array('id'=>'genter'));
          echo EHtml::createHidden("guide_price",$page_params['genter'],array('id'=>'guide_price'));
          echo EHtml::createHidden("show_items",$page_params['show_items'],array('id'=>'show_items'));
          echo EHtml::createHidden("registe_sort",$page_params['registe_sort'],array('id'=>'registe_sort'));
          echo EHtml::createHidden("year_sort",$page_params['year_sort'],array('id'=>'year_sort'));
          echo EHtml::createHidden("views_sort",$page_params['views_sort'],array('id'=>'views_sort'));
  ?>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="60" align="right" height="30"><strong>关键字：</strong></td>
                            <td><?php echo EHtml::createText("keywords",$page_params['keywords'],array('id'=>'search_keywords'));?></td>
                            <td align="right" width="80"><strong>区域：</strong></td>
                             <td>
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
                    <div class="some_condition">
                    	<table cellpadding="0" cellspacing="0">
                    	 <?php foreach($advanced_search as $key => $value){
  												$name=$value['name'];
  												$items=$value['items'];
  											?>
  	 											<tr><th width="80"><?php echo $name;?>：</th>
  	 												<td><?php $item_class="no_select";if($page_params[$key]==''){$item_class="current_select";} echo CHtml::link("不限","javascript:advance_search('".$key."','');",array('class'=>$item_class)); ?></td>
  	    										<?php foreach($items as $key1 => $value1){?>
  	    													<td><?php $item_class="no_select";if($page_params[$key]==$key1){$item_class="current_select";}echo CHtml::link($value1,"javascript:advance_search('".$key."','".$key1."');",array('class'=>$item_class));?></td>
  	    											<?php } ?>		
  	 											</tr>
  										<?php } ?>
  										</table>
                       
                    </div>
                </div>
            <!--sch-condition end-->
            </div><!--condition-con end-->
            <div class="sch_result">
                <div class="result-top">
                	<div class="display_modes">
                		<span>显示方式：</span>
                	  <?php foreach($advanced_show_items as $key => $value){
			 												foreach($value as $key1 => $value1){
										?>	
																	<a title="<?php echo $key1;?>" class="<?php if($page_params[$key]==$value1) echo $value1.'_select';else echo $value1.'_default';?>"  href="javascript:advance_search('<?php echo $key;?>','<?php echo $value1;?>');"><?php echo $key1;?></a>
			
										<?php
		  												}
		 										} 
										?>
		                </div>
		
										<?php foreach($advanced_sort as $key => $value){
			
	  								?>			
													<a title="<?php echo $value;?>" class="<?php if($page_params[$key]=='ASC') echo 'sort_active sort_desc';else if($page_params[$key]=='DESC') echo "sort_active sort_asc";  else echo 'sort_asc';?>"  href="javascript:advance_sort('<?php echo $key;?>','<?php if($page_params[$key]=='ASC') echo 'DESC'; else echo 'ASC';?>');"><?php echo $value; ?><?php if($page_params[$key]=='ASC') echo '↓'; else echo '↑';?></a>
	  								<?php  }?>
                </div>
                <!--result-top end-->
                <div class="result-mid">
                	<?php if($page_params['show_items']=="guide_lists_items"){ 
                		     $dataProvide_data=$dataProvider->getData();
                	?> 
                	 <table class="search_line">
       								<thead><th width="90">导游照片</th><th width="60">导游姓名</th><th width="60">联系电话</th><th width="60">导游证号</th><th width="60">导游等级</th><th width="40">性别</th><th width="60">从业时间</th><th width="60">费用</th><th width="115">熟悉地</th><th width="60">操作</th></thead>
       								<tbody>
                	       <?php foreach($dataProvide_data as $key => $data){ ?>
                	           <tr>
																<td align="center" style="vertical-align:middle;height:90px;"><div class="list_wrapper"><div class="guide_ibox"><p><a href="<?php echo $this->createUrl("/guide/guide/detail",array('id'=>$data->id));?>"><?php if(!empty($data->guide_avater)){$themb_image=Util::rename_thumb_file('90','90','',$data->guide_avater);echo CHtml::image("/".$themb_image,$data->User->real_name,array());}else{echo CHtml::image($cssPath."/images/logo_90_90.gif",$data->User->real_name,array());}?></a></p></div><?php if($data->top=='2'){ ?> <div class="dingzhi_guide_list"></div> <?php } ?></div></td>
																<td><a href="<?php echo $this->createUrl("/guide/guide/detail",array('id'=>$data->id));?>"><?php echo $data->User->real_name;?></a></td>
																<td><?php echo $data->guide_contact_phone;?></td>
																<td><?php echo $data->guide_number;?></td>
																<td><?php echo CV::$guide_level[$data->guide_level];?></td>
																<td><?php echo CV::$sex[$data->User->genter];?></td>
																<td><?php echo $data->guide_year;?>年</td>
																<td><?php echo $data->guide_price;?>/天</td>
																<td><?php echo $data->guide_familiar;?></td>
  															<td><a href="<?php echo $this->createUrl("/guide/guide/detail",array('id'=>$data->id));?>">立即预定</a></td>
															</tr>
                	       <?php } ?>
                	       
                	     <tr>
                	    	 <td colspan="9"  style="text-align:right;height:15px;">
                	    		<?php $pages=$dataProvider->getPagination();
                	    			$this->widget('CLinkPager', array(
    													'pages' => $pages,
    													
														));
                       		?>
                       	</td>
                      </tr>
          					</tbody>
    					</table>        	

                <?php }else{ ?>
                	
                	
                    <ul class="search_image">

                     <?php   
    										$this->widget('zii.widgets.CListView',array(
													'dataProvider'=>$dataProvider,
													'itemView'=>$show_items,
													'ajaxUpdate'=>false,
													'viewData'=>array('cssPath'=>$cssPath),
												));
       
											?>
                    </ul>
        <?php } ?>            
                    
                    
                    

                </div>
                <div class="result_bot"></div>
            </div>
            <!--sch_result end--> 
        </div>
        <!--sch-main-left end-->
        
        <div class="sch-main-right">
        	
        	  <?php
  		
      				if($this->beginCache(Util::get_cache_id("NewestGuide"), array('duration'=>"1"))){
                  $this->widget('NewestGuide', array( 
                     'view'=>'snewest_guide'            
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
       			<?php echo Util::GetAd(5);?>
       			
       				<?php
  		
      				if($this->beginCache(Util::get_cache_id("HotGuide"), array('duration'=>"3600*24*7"))){
                  $this->widget('HotGuide', array(      
                    'view'=>'shot_guide'       
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
           
            
            
            
        
        
    </div><!--sch-main-right end-->
    <div class="clear_both"></div>
    
    <script language="javascript">
    		jQuery(function(){
    			regionInit("region");
    			show_keywords_describe("search_keywords","导游名称/导游证号/熟悉地...","search_form");
    			jQuery(".search_line > tbody >tr:even").addClass("search_even");
    			jQuery(".search_line > tbody >tr:odd").addClass("search_odd");
    			jQuery(".search_line > tbody >tr").hover(function(){
    				 jQuery(this).addClass("search_hover");
    			},function(){
    			  jQuery(this).removeClass("search_hover");
    	   	});
    	   	
    	   	
    	   	jQuery(".search_image").find("li:even").addClass("search_even");
    			jQuery(".search_image").find("li:odd").addClass("search_odd");
    			jQuery(".search_image").find("li").hover(function(){
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
					if(keyword_content=="导游名称/导游证号/熟悉地..."){
		   				jQuery("#search_keywords").val('');
					}
        	document.getElementById("search_form").submit();
        }
        
        function advance_sort(id,value){
        	jQuery("#registe_sort").val('');
        	jQuery("#year_sort").val('');
        	jQuery("#views_sort").val('');
        	jQuery("#"+id).val(value);
        	var keyword_content=jQuery("#search_keywords").val();
					if(keyword_content=="导游名称/导游证号/熟悉地..."){
		   				jQuery("#search_keywords").val('');
					}
        	document.getElementById("search_form").submit();
        }
    	</script>