     <?php 
    	  $cssPath=$this->get_css_path();
      	Yii::app()->clientScript->registerScriptFile('/js/mlselection.js');
      	$regions=Util::com_search_item(array(''=>'请选择区域'),$regions);
      	$restaurant_level=Util::com_search_item(array(''=>'星级'),CV::$restaurant_level);
      ?> 	
    	<div class="sch-main-left">
        	<div class="condition-con">
                <div class="sch-condition">
                	<?php
	  $form=$this->beginWidget('EActiveForm', array(
	        'id'=>'search_form',
	        'method'=>'GET',
          'action'=>$this->createUrl("/search/default/index",array('action'=>'restaurant')),
	        'enableAjaxValidation'=>false,
	        'htmlOptions'=>array('id'=>'search_form','enctype'=>'multipart/form-data'),
         ));
          echo EHtml::createHidden("action",$action,array('id'=>'action'));
          echo EHtml::createHidden("show_items",$page_params['show_items'],array('id'=>'show_items'));
          echo EHtml::createHidden("registe_sort",$page_params['registe_sort'],array('id'=>'registe_sort'));
          echo EHtml::createHidden("views_sort",$page_params['views_sort'],array('id'=>'views_sort'));
          echo EHtml::createHidden("open_sort",$page_params['open_sort'],array('id'=>'open_sort'));
           
  ?>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="80" align="right" height="30"><strong>关键字：</strong></td>
                            <td><?php echo EHtml::createText("keywords",$page_params['keywords'],array('id'=>'search_keywords'));?></td>
                            <td width="80" align="right" height="30"><strong>星级：</strong></td>
                            <td><?php echo EHtml::createSelect("restaurant_level",$page_params['restaurant_level'],$restaurant_level,array());?></td>
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

                <?php if($page_params['show_items']=="restaurant_lists_items"){ 
                      $dataProvide_data=$dataProvider->getData();
                      
                ?> 
                
                	 <table class="search_line">
       								<thead><th width="160">酒店图片</th><th width="80">酒店名称</th><th width="60">开业时间</th><th width="55">酒店星级</th><th width="55">联系人</th><th width="60">酒店电话</th><th width="70">酒店地址</th><th width="60">操作</th></thead>
       								<tbody>
       									<?php foreach($dataProvide_data as $key => $data){ ?>
                	           
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
                	     
                	    <?php } ?>
                	    <tr>
                	    	 <td colspan="8"  style="text-align:right;height:15px;">
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
  		
      				if($this->beginCache(Util::get_cache_id("NewestRestaurant"), array('duration'=>"1"))){
                  $this->widget('NewestRestaurant', array( 
                     'view'=>'snewest_restaurant'            
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
       			
       			<?php echo Util::GetAd(7);?>
       				<?php
  		
      				if($this->beginCache(Util::get_cache_id("HotRestaurant"), array('duration'=>"3600*24*7"))){
                  $this->widget('HotRestaurant', array(      
                    'view'=>'shot_restaurant'       
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
           
            
            
            
        
        
    </div><!--sch-main-right end-->
    <div class="clear_both"></div>
    
     <script language="javascript">
    		jQuery(function(){
    			regionInit("region");
    			show_keywords_describe("search_keywords","酒店名称名称/酒店地址/联系人/描述...","search_form");
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
					if(keyword_content=="酒店名称名称/酒店地址/联系人/描述..."){
		   				jQuery("#search_keywords").val('');
					}
        	document.getElementById("search_form").submit();
        }
        
        function advance_sort(id,value){
        	jQuery("#registe_sort").val('');
        	jQuery("#views_sort").val('');
        	jQuery("#open_sort").val('');
        	jQuery("#"+id).val(value);
        	var keyword_content=jQuery("#search_keywords").val();
					if(keyword_content=="酒店名称名称/酒店地址/联系人/描述..."){
		   				jQuery("#search_keywords").val('');
					}
        	document.getElementById("search_form").submit();
        }
    	</script>