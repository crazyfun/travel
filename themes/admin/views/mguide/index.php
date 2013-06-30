<?php 
  
	   $guide_level=Util::com_search_item(array(''=>'请选择导游等级'),CV::$guide_level);
	   $guide_recommend=Util::com_search_item(array('是否推荐'),CV::$recommend);
	   $guide_status=Util::com_search_item(array('是否审核'),CV::$status);
       $this->widget('SearchItems', array( 
          'model_name'=>'Guide', 
          'user_operate'=>array(
              array(
               
             ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
          
             'real_name'=>array(
               'name'=>'导游姓名',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['real_name'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             
             'guide_number'=>array(
               'name'=>'导游证号',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['guide_number'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'guide_cade'=>array(
               'name'=>'导游卡号',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['guide_cade'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'guide_level'=>array(
               'name'=>'导游等级',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['guide_level'],
               'value'=>$guide_level,
               'htmlOptions'=>array(),
             ),
             'guide_region_name'=>array(
               'name'=>'导游区域',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['guide_region_name'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),

             
              'recommend'=>array(
               'name'=>'推荐',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['recommend'],
               'value'=>$guide_recommend,
               'htmlOptions'=>array(),
             ),
             
             'status'=>array(
               'name'=>'审核',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['status'],
               'value'=>$guide_status,
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
                'name'=>'导游名称',
                'type'=>'raw',
                'value'=>'$data->User->real_name',
              ),
             array(
                'name'=>'guide_number',
                'type'=>'raw',
                'value'=>'$data->guide_number',
              ), 
              
             array(
                'name'=>'guide_qualifications',
                'type'=>'raw',
                'value'=>'$data->guide_qualifications',
              ),
             array(
                'name'=>'guide_cade',
                'type'=>'raw',
                'value'=>'$data->guide_cade',
              ),
              
            array(
                'name'=>'guide_level',
                'type'=>'raw',
                'value'=>'$data->show_attribute("guide_level")',
              ),
              array(
                'name'=>'guide_region_name',
                'type'=>'raw',
                'value'=>'$data->show_attribute("guide_region_name")',
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
 
           ),
          //是否需要全选列
          'checked_all'=>true,
          //是否使用ajax翻页
          'ajax'=>false,    
       ));
       
       ?>



