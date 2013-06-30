<?php
class WebMenu extends CWidget
{
    public function run(){
    	 $menus=array(
    	      'home'=>array('name'=>'首页','url'=>$this->controller->createUrl("/site/index"),'is_visible'=>true),
    	      'guide'=>array('name'=>'导游','url'=>$this->controller->createUrl("/search/default/index",array('action'=>'guide')),'is_visible'=>true),
    	      'agency'=>array('name'=>'旅行社','url'=>$this->controller->createUrl("/search/default/index",array('action'=>'agency')),'is_visible'=>true),
    	      'line'=>array('name'=>'团队寻导','url'=>$this->controller->createUrl("/search/default/index",array('action'=>'line')),'is_visible'=>true),
    	      'restaurant'=>array('name'=>'酒店','url'=>$this->controller->createUrl("/search/default/index",array('action'=>'restaurant')),'is_visible'=>true),
    	      'information'=>array('name'=>'旅游资讯','url'=>$this->controller->createUrl("/information/default/index",array()),'is_visible'=>true),
    	      'bbs'=>array('name'=>'导游社区','url'=>"http://bbs.lyyhome.com",'is_visible'=>true),
    	      //'search'=>array('name'=>'搜索','url'=>"javascript:show_search();",'is_visible'=>true),
    	  );
       $this->render('web_menu',array('menus'=>$menus));
    }
  
}
