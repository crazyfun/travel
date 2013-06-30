<div class="main-left">
	<div class="sch-condition">
	<?php
	   $information_category=InformationCategory::model();
	   $parent_select=Util::com_search_item(array(''=>'请选择类别'),$information_category->get_parent_select(CV::$model_type['guideinfo']));
	  $form=$this->beginWidget('EActiveForm', array(
	        'id'=>'search_form',
          'action'=>"",
	        'enableAjaxValidation'=>false,
	        'htmlOptions'=>array('id'=>'search_form','enctype'=>'multipart/form-data'),
         ));
           
  ?>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="80" align="right" height="30"><strong>标题：</strong></td>
                            <td><?php echo EHtml::createText("title",$page_params['title'],array('id'=>'search_keywords'));?></td>
                            
                            <td width="80" align="right" height="30"><strong>资讯类别：</strong></td>
                            <td><?php echo EHtml::createSelect("type_id",$page_params['type_id'],$parent_select,array());?></td>
                            
	                     			<td><input type="submit" class="sch-main-bt" value=""></td>
                        </tr>
                        
                    </table>
               <?php $this->endWidget(); ?> 
               
   </div>           
               
   <div class="information_lists">            
	 <?php   
    	$this->widget('zii.widgets.CListView',array(
						'dataProvider'=>$dataProvider,
						'itemView'=>"information_item",
						'ajaxUpdate'=>false,
				));
       
			?>
		</div>


	
	
</div>


<div class="main_right">
	        <?php
  		
      				if($this->beginCache(Util::get_cache_id("NewestInformation"), array('duration'=>"3600*24*7"))){
                  $this->widget('NewestInformation', array( 
                     'view'=>'snewest_information'            
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
       			
       			<?php echo Util::GetAd(11);?>
       				<?php
  		
      				if($this->beginCache(Util::get_cache_id("HotInformation"), array('duration'=>"3600*24*7"))){
                  $this->widget('HotInformation', array(      
                    'view'=>'shot_information'       
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
</div>
<div class="clear_both"></div>
<script language="javascript">
	jQuery(function(){
		
		    			show_keywords_describe("search_keywords","资讯标题","search_form");

		});
</script>