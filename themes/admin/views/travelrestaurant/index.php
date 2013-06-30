
<?php

     $restaurant_recommend=Util::com_search_item(array('推荐'),CV::$recommend);
	   $restaurant_status=Util::com_search_item(array('审核'),CV::$status);
	   $restaurant_level=Util::com_search_item(array('星级'),CV::$restaurant_level);
       $this->widget('SearchItems', array( 
          'model_name'=>'TravelRestaurant', 
          'user_operate'=>array(
              array(
              
              ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
              'restaurant_name'=>array(
               'name'=>'酒店名称',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['restaurant_name'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'start_time'=>array(
               'name'=>'开业开始时间',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['start_time'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
              'end_time'=>array(
               'name'=>'开业结束时间',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['end_time'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'restaurant_address'=>array(
               'name'=>'酒店地址',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['restaurant_address'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
            
           'restaurant_region_name'=>array(
               'name'=>'旅行社区域',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['restaurant_region_name'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'restaurant_level'=>array(
               'name'=>'星级',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['restaurant_level'],
               'value'=>$restaurant_level,
               'htmlOptions'=>array(),
             ),
             
             'recommend'=>array(
               'name'=>'推荐',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['recommend'],
               'value'=>$restaurant_recommend,
               'htmlOptions'=>array(),
             ),
             
             'status'=>array(
               'name'=>'审核',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['status'],
               'value'=>$restaurant_status,
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
                'name'=>'restaurant_name',
                'type'=>'raw',
                'value'=>'$data->restaurant_name',
              ),
             array(
                'name'=>'restaurant_open',
                'type'=>'raw',
                'value'=>'$data->restaurant_open',
              ), 
              
             array(
                'name'=>'restaurant_region_name',
                'type'=>'raw',
                'value'=>'$data->restaurant_region_name',
              ),
             array(
                'name'=>'restaurant_level',
                'type'=>'raw',
                'value'=>'$data->show_attribute("restaurant_level")',
              ),
              
            array(
                'name'=>'restaurant_telephone',
                'type'=>'raw',
                'value'=>'$data->restaurant_telephone',
              ),
             array(
                'name'=>'restaurant_address',
                'type'=>'raw',
                'value'=>'$data->show_restaurant_address()',
              ), 
             array(
                'name'=>'contacter',
                'type'=>'raw',
                'value'=>'$data->contacter',
              ),
              
             array(
                'name'=>'contacter_phone',
                'type'=>'raw',
                'value'=>'$data->contacter_phone',
              ),
           
             array(
                'name'=>'recommend',
                'type'=>'raw',
                'value'=>'$data->show_attribute("recommend")',
              ),
              
              array(
                'name'=>'status',
                'type'=>'raw',
                'value'=>'$data->show_attribute("status")',
              ), 
  
            array(
                'name'=>'create_time',
                'type'=>'raw',
                'value'=>'$data->show_attribute("create_time")',
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
               
             ),
          ),
          //是否需要全选列
          'checked_all'=>true,
          //是否使用ajax翻页
          'ajax'=>false,    
       ));
?>

     <script language="javascript">
        function baidu_maps(coordinate){
        	var address=coordinate;
        	show_bmap(address,false);
        	
        }
    	</script>
