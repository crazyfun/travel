<?php 
       $excel_params=Util::implode_arrayeval($page_params);
       $css_path=$this->get_css_path();
       $user=new User();
       $user_select=$user->get_user_station();
       $user_select=Util::com_search_item(array(''=>'创建人'),$user_select);
       $express_status=Util::com_search_item(array('快递状态'),CV::$express_status);
       $this->widget('SearchItems', array( 
          'model_name'=>'Express', 
          'user_operate'=>array(
              array(
               'name'=>'增加快递',
               'value'=>$this->createUrl("add",array()),
             ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
             'contacter'=>array(
               'name'=>'联系人',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['contacter'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             
             'contacter_phone'=>array(
               'name'=>'电话',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['contacter_phone'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             
             'contacter_address'=>array(
               'name'=>'地址',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['contacter_address'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'start_date'=>array(
               'name'=>'发货开始时间',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['start_date'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'end_date'=>array(
               'name'=>'发货结束时间',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['end_date'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'status'=>array(
               'name'=>'快递状态',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['status'],
               'value'=>$express_status,
               'htmlOptions'=>array(),
             ),

             'create_id'=>array(
               'name'=>'创建人',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['create_id'],
               'value'=>$user_select,
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
                'name'=>'contacter_address',
                'type'=>'raw',
                'value'=>'$data->contacter_address',
              ),
              
            array(
                'name'=>'express_date',
                'type'=>'raw',
                'value'=>'$data->express_date',
              ),
              
            array(
                'name'=>'status',
                'type'=>'raw',
                'value'=>'$data->show_attribute("status")',
            ),
            
            array(
                'name'=>'receive_date',
                'type'=>'raw',
                'value'=>'$data->receive_date',
            ),
              
          
            array(
                'name'=>'create_id',
                'type'=>'raw',
                'value'=>'$data->User->real_name',
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
               'name'=>'删除所有',
               'value'=>'javascript:batch_operate(\''.$this->createUrl("delete",array()).'\');'
             ),
             
             array(
               'name'=>CHtml::image($css_path."/images/excel.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:excel_import('".$this->createUrl('import')."','Express');"              
             ),
             
             
             array(
               'name'=>CHtml::image($css_path."/images/excelc.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:excel_export('".$this->createUrl('export')."','Express','".$excel_params."');"              
             ),
          ),
          //是否需要全选列
          'checked_all'=>true,
          //是否使用ajax翻页
          'ajax'=>false,    
       ));
       
       ?>




