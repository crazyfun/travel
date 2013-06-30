
<div class="main-left">
<?php
$cssPath=$this->get_css_path(); 
Yii::app()->clientScript->registerCssFile("/js/jbox/Skins2/Green/jbox.css");
Yii::app()->clientScript->registerScriptFile('/js/comments.js');
Yii::app()->clientScript->registerCssFile($cssPath.'/comment.css');
Yii::app()->clientScript->registerScriptFile('/js/jbox/jquery.jBox-2.3.min.js');
Yii::app()->clientScript->registerScriptFile('/js/jbox/i18n/jquery.jBox-zh-CN.js');
?>

<div class="detail_top">详细信息</div>
               <div class="edit_table detail-con-bg tour_guide">
                 <table cellpadding="0" cellspacing="0" width="100%">
                        
                        <tr>
                            <td width="191" valign="top" style="vertical-align:middle;" align="center" rowspan="11" class="portrait_td"><div class="portrait_con"><?php if(!empty($model->restaurant_logo)){ $thumb_image=Util::rename_thumb_file('180','450','',$model->restaurant_logo);echo CHtml::image("/".$thumb_image,$model->restaurant_name,array());}else{echo CHtml::image($cssPath."/images/logo.gif",$model->restaurant_name,array());}?></div></td>
                            <th width="90" height="40" align="right">酒店名称</th>
                            <td width="130"><?php echo $model->restaurant_name;?></td>
                            <th align="right" width="90">开业时间</th>
                            <td><?php echo $model->restaurant_open;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">所在区域</th>
                            <td><?php echo $model->restaurant_region_name;?></td>
                            <th align="right">酒店电话</th>
                            <td><?php echo $model->restaurant_telephone;?></td>
                        </tr>
                        <tr>
                        <tr>
                            <th width="90" height="40" align="right">酒店星级</th>
                            <td><?php echo $model->show_attribute("restaurant_level");?></td>
                            <th align="right">联系人</th>
                            <td><?php echo $model->contacter;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">联系人电话</th>
                            <td><?php echo $model->contacter_phone;?></td>
                            <th height="40" align="right">联系人QQ</th>
                            <td><?php echo $model->contacter_qq;?>&nbsp;<a class="qqOn" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $model->contacter_qq;?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $model->contacter_qq;?>:41 &r=0.8940031429092906" alt="点击联系我" title="点击联系我"></a></td>
              
                        </tr>
                        
                        <tr>
                            
                            <th align="right" height="40">酒店地址</th>
                            <td colspan="3"><?php echo $model->restaurant_address;?></td>
                        </tr>
                        <tr>
                            <th height="40" align="right">审核状况</th>
                            <td colspan="3"><span class="green_text"><?php echo $model->show_attribute("status");?></span></td>
                            
                        </tr>
                        <tr>
                            <th width="90" height="40" align="right">描述</th>
                            <td colspan="3"><?php echo $model->restaurant_desc;?></td>
                            
                        </tr>

                        
      
                    </table>
                 </div>  



<div class="detail_top">评论信息</div>
<div class="detail-con-bg">
<div id="restaurant_comments">
	<?php
	       $this->widget('WebComment', array(      
                   'model_id'=>3,
                   'user_flag'=>true,
                   'content_id'=>$restaurant_id,
                   'input_type'=>'multitext',
                   'level'=>3,             
         )); 
	   ?>
</div>
</div>
</div>



<div class="main_right">
	
	      <?php
  		
      				if($this->beginCache(Util::get_cache_id("WBaiduMaps"), array('duration'=>"1"))){
                  $this->widget('WBaiduMaps', array( 
                     'coordinate'=>$model->coordinate, 
                     'address'=>$model->restaurant_address          
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
       			
       			
	        <?php
  		
      				if($this->beginCache(Util::get_cache_id("NewestRestaurant"), array('duration'=>"1"))){
                  $this->widget('NewestRestaurant', array( 
                     'view'=>'snewest_restaurant'            
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
       			
       			<?php echo Util::GetAd(10);?>
       				<?php
  		
      				if($this->beginCache(Util::get_cache_id("HotRestaurant"), array('duration'=>"3600*24*7"))){
                  $this->widget('HotRestaurant', array(      
                    'view'=>'shot_restaurant'       
              	  )); 
             		$this->endCache(); 
       			  }        
       			?>
	
</div>
<div class="clear_both"></div>
<script language="javascript">

jQuery(function(){
      
});    
	
</script>    
	      
    