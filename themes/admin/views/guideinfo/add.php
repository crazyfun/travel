<?php 
     $information_category=InformationCategory::model();
	   //$parent_select=Util::com_search_item(array(''=>'请选择分类'),$information_category->get_parent_select());
	   $parent_select=$information_category->get_parent_select(CV::$model_type['guideinfo']);
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'导游资讯',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到导游资讯列表',
               'value'=>$this->createUrl("index",array()),
             ),
             array(
				       'name'=>'新增导游资讯',
				       'value'=>$this->createUrl("add",array())
				     ),
          ),
          //增加的内容字段
     'add_datas'=>array(
        'title'=>array(
					'name'=>'标题',
					'type'=>'text',//搜索框的类型
					'value'=>'',
					'htmlOptions'=>array(),
         ), 
		    'information_image'=>array(
						'name'=>'信息图片',
						'type'=>'file',
						'value'=>'',
						'htmlOptions'=>array(),
			 ),

			 'type_id'=>array(
				'name'=>'分类',
				'type'=>'select',
				'value'=>$parent_select,
				'htmlOptions'=>array(),
			 ),

			 'sort'=>array(
				'name'=>'帮助排序',
				'type'=>'number',
				'value'=>'',
				'htmlOptions'=>array(),
			 ),    
       'content'=>array(
             'name'=>'帮助内容',
             'type'=>'multitext',
             'value'=>'',
              'htmlOptions'=>array(),
       ),
       'short_content'=>array(
             'name'=>'简短内容',
             'type'=>'textarea',
             'value'=>'',
              'htmlOptions'=>array('style'=>'width:400px;height:150px;'),
       ),
       
			),

			 //最下面操作按钮
			'operates'=>array(
				array(
				   
				),
			),
       ));
?>