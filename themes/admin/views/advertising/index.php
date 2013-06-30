<?php
	   $ad_postion=Util::com_ad_position();
	   $ad_postion=Util::com_search_item(array(''=>'广告位'),$ad_postion);
	   $regions=Region::model()->get_options_regions();
	   $regions=Util::com_search_item(array(''=>'区域'),$regions);
       $this->widget('SearchItems', array( 
          'model_name'=>'Advertising', 
          'user_operate'=>array(
              array(
               'name'=>'增加广告',
               'value'=>$this->createUrl("add",array()),
              ),
          ),
          //搜索的内容字段
      'search_datas'=>array(
         'title'=>array(
               'name'=>'标题',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['title'],
               'value'=>'',
               'htmlOptions'=>array(),
           ),
             
			 'region_id'=>array(
				'name'=>'区域',
				'type'=>'select',
				'select'=>$page_params['region_id'],
				'value'=>$regions,
				'htmlOptions'=>array(),
			 ),
			 'type_id'=>array(
				'name'=>'广告位',
				'type'=>'select',
				'select'=>$page_params['type_id'],
				'value'=>$ad_postion,
				'htmlOptions'=>array(),
			 ),
      ), 
     'dataprovider'=>$dataProvider,
          
          
          //列表显示的字段
      'attributes'=>array(
        array(
         'name'=>'id',
         'type'=>'raw',//字段的属性 参考yii
         'value'=>'$data->id',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
        ),

			 array(
				'name'=>'title',
				'type'=>'raw',
				'value'=>'$data->title',
			 ),

      array(
         'name'=>'region_id',
         'type'=>'raw',
         'value'=>'$data->show_attribute("region_id")',
    	 ),
			  
    	 array(
         'name'=>'type_id',
         'type'=>'raw',
         'value'=>'$data->show_attribute("type_id")',
     	),
			 
			array(
				'name'=>'content',
				'type'=>'raw',
				'value'=>'$data->content',
			),
    	array(
         'name'=>'操作',
         'type'=>'raw',
          'value'=>'$data->get_operate()',
      ),
          
     ),
          //批量操作按钮
          'operates'=>array(
             array(
               'name'=>'删除所有',
               'value'=>'javascript:batch_operate(\''.$this->createUrl("delete",array()).'\');'
             ),
          ),
          //是否需要全选列
          'checked_all'=>true,
          //是否使用ajax翻页
          'ajax'=>false,    
       ));
?>