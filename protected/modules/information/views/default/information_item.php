          <div class="infor_detail">
            	<h3><a href="<?php echo $this->createUrl("/information/default/detail",array('id'=>$data->id));?>"><?php echo $data->title;?></a></h3>
                <p>
                	 <?php echo $data->short_content; ?>
                </p>	
            	<div><span>资讯类别:<?php echo $data->Type->name;?></span><span>查看次数:<?php echo $data->views;?></span><span>发布时间:<?php echo $data->show_attribute("create_time");?></span></div>
            </div>