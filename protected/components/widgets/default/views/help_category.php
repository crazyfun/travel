    <?php foreach($category_datas as $key => $value){ 
    	     $sub_items=$value['sub_items'];
    ?>
                <h2><?php echo $value['name'];?></h2>
                <ul>
                	<?php foreach($sub_items as $key1 => $value1){ ?>
                	    <li><a href="<?php echo $this->controller->createUrl("/whelp/default/index",array('cid'=>$value1['type_id']))."#h".$value1['id'];?>"><?php echo $value1['name'];?></a></li>
                  <?php } ?>
                </ul>
   <?php } ?>
                