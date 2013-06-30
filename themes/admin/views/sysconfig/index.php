
<div id="page_content">
    <div class="show_right_content">
    <!--用户操作-->
    	<div class=""><div class="user_operate_content"><span><a href="<?php echo $this->createUrl("sysconfig/index");?>">返回到系统配置管理</a></span></div></div>
    <!--用户操作end-->
    <!--编辑框-->	
    	<div class="edit_content">
    		<div class="setting_menu"><ul class="tab_menu"><li class="menu_item menu_item_active" index='1'>基本配置</li><li class="menu_item" index='2'>SEO配置</li><li class="menu_item" index='3'>邮件配置</li><li class="menu_item" index='4'>系统变量</li></ul></div>
    		<div id="menu_content_1" class="menu_content" style="display:block">
    		   <?php $form_bsc = $this->beginWidget('CActiveForm', array('id'=>'sys_bsc_cfg','action'=>"",'enableAjaxValidation'=>false,)); ?>
           <div class="operate_result"><?php $this->widget("FlashInfo");?></div>
          
           <div class="content_inline">
           	 <div class="content_name">过滤用户名</div>
           	 <div class="content_content"><textarea name="sci[sfc_filter_username]"><?php if( $oldcfg['sfc_filter_username'] ) echo $oldcfg['sfc_filter_username']; ?></textarea></div>
           	 <div class="content_error">sfc_filter_username</div>
           </div>

           <div class="content_inline">
           	 <div class="content_name">过滤IP</div>
           	 <div class="content_content"><textarea name="sci[sfc_filter_ip]"><?php if( $oldcfg['sfc_filter_ip'] ) echo $oldcfg['sfc_filter_ip']; ?></textarea></div>
           	 <div class="content_error">sfc_filter_ip</div>
           </div>
           
           
           
           <div class="content_inline">
           	 <div class="content_name">会员协议</div>
           	 <div class="content_content"><?php  EHtml::createMultitext("sci[sfc_user_agreement]",$oldcfg['sfc_user_agreement'],array());?></div>
           	 <div class="content_error">sfc_user_agreement</div>
           </div>
           
           
           <div class="content_inline">
           	 <div class="content_name">置顶协议</div>
           	 <div class="content_content"><?php  EHtml::createMultitext("sci[sfc_top_agreement]",$oldcfg['sfc_top_agreement'],array());?></div>
           	 <div class="content_error">sfc_top_agreement</div>
           </div> 

	         <div class="content_button">
	         	 <input type="submit" class="input_submit" value="确定" name="button_ok"/>
	         	 <input type="reset" class="input_cancel" value="取消" name="button_reset"/>
	         </div>
	         <?php $this->endWidget();?>
	       </div>
	       
	       
	       	<div id="menu_content_2" class="menu_content" style="display:none">
    		   <?php $form_bsc = $this->beginWidget('CActiveForm', array('id'=>'sys_bsc_cfg','action'=>"",'enableAjaxValidation'=>false,)); ?>
           <div class="operate_result"><?php $this->widget("FlashInfo");?></div>
          
           <div class="content_inline">
           	 <div class="content_name">网站名称</div>
           	 <div class="content_content"><textarea name="sci[sfc_web_title]"><?php if( $oldcfg['sfc_web_title'] ) echo $oldcfg['sfc_web_title']; ?></textarea></div>
           	 <div class="content_error">sfc_web_title</div>
           </div>

           <div class="content_inline">
           	 <div class="content_name">SEO关键字</div>
           	 <div class="content_content"><textarea name="sci[sfc_web_keywords]"><?php if( $oldcfg['sfc_web_keywords'] ) echo $oldcfg['sfc_web_keywords']; ?></textarea></div>
           	 <div class="content_error">sfc_web_keywords</div>
           </div>
           
            <div class="content_inline">
           	 <div class="content_name">SEO描述</div>
           	 <div class="content_content"><textarea name="sci[sfc_web_description]"><?php if( $oldcfg['sfc_web_description'] ) echo $oldcfg['sfc_web_description']; ?></textarea></div>
           	 <div class="content_error">sfc_web_description</div>
           </div>
          
	         <div class="content_button">
	         	 <input type="submit" class="input_submit" value="确定" name="button_ok"/>
	         	 <input type="reset" class="input_cancel" value="取消" name="button_reset"/>
	         </div>
	         <?php $this->endWidget();?>
	       </div>
	       
	       
	       
	       
	       <div id="menu_content_3" class="menu_content">
	         <?php
    		     $form_mail = $this->beginWidget('CActiveForm', array('id'=>'sys_mail_cfg','action'=>"",'enableAjaxValidation'=>false,));
           ?>
             
             <div class="content_inline">
             	 <div class="content_name">服务器</div>
             	 <div class="content_content"><input name="sci[sfc_mail_host]" type="text" value="<?php if( $oldcfg['sfc_mail_host'] ) echo $oldcfg['sfc_mail_host'];?>"/></div>
             	 <div class="content_error">sfc_mail_host</div>
             </div>
             <div class="content_inline">
             	 <div class="content_name">服务器端口</div>
             	 <div class="content_content"><input name="sci[sfc_mail_port]" type="text" value="<?php if( $oldcfg['sfc_mail_port'] ) echo $oldcfg['sfc_mail_port'];?>"/></div>
             	 <div class="content_error">sfc_mail_port</div>
             </div>
             <div class="content_inline">
             	 <div class="content_name">用户名</div>
             	 <div class="content_content"><input name="sci[sfc_mail_user]" type="text" value="<?php if( $oldcfg['sfc_mail_user'] ) echo $oldcfg['sfc_mail_user'];?>"/></div>
             	 <div class="content_error">sfc_mail_user</div>
             </div>
             <div class="content_inline">
             	<div class="content_name">密码</div>
             	<div class="content_content">
             		<input name="sci[sfc_mail_psw]" type="password" value="<?php if( $oldcfg['sfc_mail_psw'] ) echo $oldcfg['sfc_mail_psw'];?>"/>
             	</div>
             	<div class="content_error">sfc_mail_psw</div>
             </div>
             
             <div class="content_inline">
             	 <div class="content_name">通知邮箱</div>
             	 <div class="content_content"><input name="sci[sfc_notice_mail]" type="text" value="<?php if( $oldcfg['sfc_notice_mail'] ) echo $oldcfg['sfc_notice_mail'];?>"/></div>
             	 <div class="content_error">sfc_notice_mail</div>
             </div>
             
             
             <div class="content_button">
	         	   <input type="submit" class="input_submit" value="确定" name="button_ok"/>
	         	   <input type="reset" class="input_cancel" value="取消" name="button_reset"/>
	           </div>
           <?php $this->endWidget(); ?>
          </div>
          
          <div id="menu_content_4" class="menu_content">
    		   <?php $form_variable = $this->beginWidget('CActiveForm', array('id'=>'sys_variable_cfg','action'=>"",'enableAjaxValidation'=>false,)); ?>
           <div class="operate_result"><?php $this->widget("FlashInfo");?></div>
          
           <div class="content_inline">
           	 <div class="content_name">邀请送抵用劵</div>
           	 <div class="content_content"><input name="sci[sfc_invite_coupon]" value="<?php if( $oldcfg['sfc_invite_coupon'] ) echo $oldcfg['sfc_invite_coupon']; ?>"/></div>
           	 <div class="content_error">sfc_invite_coupon</div>
           </div>
           
           <div class="content_inline">
           	 <div class="content_name">申请商家</div>
           	 <div class="content_content"><input name="sci[sfc_nomal_store]" value="<?php if( $oldcfg['sfc_nomal_store'] ) echo $oldcfg['sfc_nomal_store']; ?>"/></div>
           	 <div class="content_error">sfc_nomal_store</div>
           </div>
           
            <div class="content_inline">
           	 <div class="content_name">申请vip商家</div>
           	 <div class="content_content"><input name="sci[sfc_vip_store]" value="<?php if( $oldcfg['sfc_vip_store'] ) echo $oldcfg['sfc_vip_store']; ?>"/></div>
           	 <div class="content_error">sfc_vip_store</div>
           </div>

           <div class="content_inline">
           	 <div class="content_name">发送短信</div>
           	 <div class="content_content"><input name="sci[sfc_message_consume]" value="<?php if( $oldcfg['sfc_message_consume'] ) echo $oldcfg['sfc_message_consume']; ?>"/></div>
           	 <div class="content_error">sfc_message_consume</div>
           </div>
           
           
	         <div class="content_button">
	         	 <input type="submit" class="input_submit" value="确定" name="button_ok"/>
	         	 <input type="reset" class="input_cancel" value="取消" name="button_reset"/>
	         </div>
	         <?php $this->endWidget();?>
	       </div>
	       
	       
	       
    	  </div>
    	 <!--编辑框end-->	
    </div>
</div>

<script>
	jQuery(function($) {
    togglemenu({'source':"menu_item",'target':"menu_content",'type':'1','effect':'1','effect_time':''});
  }); 

</script>

    
    
    
    



