<?php 
       $parent_menus=Util::com_search_item(array('0'=>'一级菜单'),$model->get_parent_menu());
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'后台菜单',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到后台菜单管理',
               'value'=>$this->createUrl("index",array()),
             ),
             array(
               'name'=>'新增菜单',
               'value'=>$this->createUrl("add",array())
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
             'menu_name'=>array(
               'name'=>'菜单名称',
               'type'=>'text',//搜索框的类型
               'value'=>'',
               'htmlOptions'=>array(),
               'desc'=>''
               
               
             ),
             
             'menu_parent'=>array(
                'name'=>'父菜单',
                'type'=>'select',
                'value'=>$parent_menus,
                'htmlOptions'=>array(),
             ),
             
             'menu_sort'=>array(
                'name'=>'菜单排序',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             
             
             'menu_link'=>array(
                'name'=>'菜单链接',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             
             'menu_item'=>array(
                'name'=>'管理的页面',
                'type'=>'textarea',
                'value'=>"",
                'htmlOptions'=>array(),
                'desc'=>'以Controller名字（第一个字母大写）+Action名字（第一个字母大写）进行创建并以,号隔开不同的项如UserIndex,UserView'
                
             ),
             
          ), 
         
          //最下面操作按钮
          'operates'=>array(
             array(
              
             ),
          ),
            
       ));
?>
       
    
    



    
    
    
    
    



