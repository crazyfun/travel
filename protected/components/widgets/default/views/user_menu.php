<?php 
    $cssPath=$this->controller->get_css_path();
?>

        <div class="my_page_left">
            	<div class="top_title">我的主页</div>
                <div>
                	<?php 
        			    foreach($menus as $key => $value){
			       		     $sub_menus=$value['menus'];
			           ?>
			    
                	<div class="<?php echo $value['class'];?>"><a href="<?php if(empty($value['url'])){echo "#";}else{ echo $this->controller->createUrl($value['url']); } ?>"><?php echo $value['name'];?></a></div>
                	<?php if(!empty($sub_menus)){ ?>
                	<ul>
                		  <?php foreach($sub_menus as $key1 => $value1){ ?>
                    	     <li class="<?php echo $value1['class'];?>"><a <?php if($key1==$this->controller->tag) echo "class='user_item_active'";?> href="<?php echo $this->controller->createUrl($value1['url']);?>"><?php echo $value1['name']?></a></li>
                      <?php } ?>
                    </ul>	
                   <?php 
                      }
                    }
                    ?>
                </div>
              
 </div>
