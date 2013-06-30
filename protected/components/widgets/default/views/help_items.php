               <?php foreach($information_datas as $key => $value){ ?>
               <h2 id="h<?php echo $value->id;?>"><?php echo $value->title;?><a href="#top">返回顶部↑</a></h2>  	
                <div class="help_answer">
                    <?php echo $value->content;?>
                </div>
              <?php } ?>