
<?php
      
       $agency_recommend=Util::com_search_item(array('是否推荐'),CV::$recommend);
	     $agency_status=Util::com_search_item(array('是否审核'),CV::$status);
       $this->widget('SearchItems', array( 
          'model_name'=>'TravelAgency', 
          'user_operate'=>array(
              array(
              
              ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
              'agency_name'=>array(
               'name'=>'旅行社名称',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['agency_name'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'agency_address'=>array(
               'name'=>'旅行社地址',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['agency_address'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
            
           'guide_region_name'=>array(
               'name'=>'旅行社区域',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['guide_region_name'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'recommend'=>array(
               'name'=>'推荐',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['recommend'],
               'value'=>$agency_recommend,
               'htmlOptions'=>array(),
             ),
             
             'status'=>array(
               'name'=>'审核',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['status'],
               'value'=>$agency_status,
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
                'name'=>'agency_name',
                'type'=>'raw',
                'value'=>'$data->agency_name',
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
                'name'=>'agency_email',
                'type'=>'raw',
                'value'=>'$data->agency_email',
              ),
              
            array(
                'name'=>'agency_telephone',
                'type'=>'raw',
                'value'=>'$data->agency_telephone',
              ),
              
             array(
                'name'=>'agency_fax',
                'type'=>'raw',
                'value'=>'$data->agency_fax',
              ),
              
             array(
                'name'=>'guide_region_name',
                'type'=>'raw',
                'value'=>'$data->guide_region_name',
              ),
              array(
                'name'=>'agency_address',
                'type'=>'raw',
                'value'=>'$data->show_agency_address()',
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
