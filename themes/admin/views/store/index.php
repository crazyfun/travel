
<?php
     $store_vip=Util::com_search_item(array('VIP'),CV::$store_vip);
	   $store_status=Util::com_search_item(array('认证'),CV::$store_status);
	   $store_top=Util::com_search_item(array('旺铺'),CV::$store_top);
	   $store_pay=Util::com_search_item(array('付款状态'),CV::$store_pay);
       $this->widget('SearchItems', array( 
          'model_name'=>'Station', 
          'user_operate'=>array(
              array(
              
              ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
              'name'=>array(
               'name'=>'商铺名称',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['name'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             'company'=>array(
               'name'=>'公司名称',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['company'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
 
           'store_area_name'=>array(
               'name'=>'商铺区域',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['store_area_name'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'store_address'=>array(
               'name'=>'公司地址',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['store_address'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'is_vip'=>array(
               'name'=>'VIP',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['is_vip'],
               'value'=>$store_vip,
               'htmlOptions'=>array(),
             ),
             
             'is_top'=>array(
               'name'=>'旺铺',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['is_top'],
               'value'=>$store_top,
               'htmlOptions'=>array(),
             ),
             
             'status'=>array(
               'name'=>'认证',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['status'],
               'value'=>$store_status,
               'htmlOptions'=>array(),
             ),
             
              'pay_status'=>array(
               'name'=>'付款状态',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['pay_status'],
               'value'=>$store_pay,
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
                'name'=>'create_id',
                'type'=>'raw',
                'value'=>'$data->get_create_id()',
            ), 
           
             array(
                'name'=>'name',
                'type'=>'raw',
                'value'=>'$data->name',
              ),
             array(
                'name'=>'company',
                'type'=>'raw',
                'value'=>'$data->company',
              ), 
              
   
             array(
                'name'=>'store_phone',
                'type'=>'raw',
                'value'=>'$data->show_attribute("store_phone")',
              ),
              
            array(
                'name'=>'store_address',
                'type'=>'raw',
                'value'=>'$data->show_store_address()',
              ),
              
             array(
                'name'=>'store_area_name',
                'type'=>'raw',
                'value'=>'$data->store_area_name',
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
                'name'=>'is_vip',
                'type'=>'raw',
                'value'=>'$data->show_attribute("is_vip")',
              ),
            array(
                'name'=>'is_top',
                'type'=>'raw',
                'value'=>'$data->show_attribute("is_top")',
              ),
              array(
                'name'=>'status',
                'type'=>'raw',
                'value'=>'$data->show_attribute("status")',
              ), 
            array(
                'name'=>'pay_status',
                'type'=>'raw',
                'value'=>'$data->show_attribute("pay_status")',
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
