<?php 
       $excel_params=Util::implode_arrayeval($page_params);
       $css_path=$this->get_css_path();
       $user=new User();
       $user_select=$user->get_user_station();
       $user_select=Util::com_search_item(array(''=>'创建人'),$user_select);
       $jiesuan_type=Util::com_search_item(array(''=>'收入类型'),CV::$jiesuan_type);
       $this->widget('SearchItems',array( 
          'model_name'=>'Income', 
          'user_operate'=>array(
              array(
               'name'=>'添加收入',
               'value'=>$this->createUrl("add",array()),
             ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
             'order_type'=>array(
               'name'=>'收入类型',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['order_type'],
               'value'=>$jiesuan_type,
               'htmlOptions'=>array(),
             ),
             
              'order_number'=>array(
               'name'=>'订单编号',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['order_number'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             
             'contacter'=>array(
               'name'=>'收款人',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['contacter'],
               'value'=>'',
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
                'name'=>'order_type',
                'type'=>'raw',
                'value'=>'$data->show_attribute("order_type")',
              ),
             array(
                'name'=>'order_number',
                'type'=>'raw',
                'value'=>'$data->order_number',
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
                'name'=>'total_price',
                'type'=>'raw',
                'value'=>'$data->total_price',
              ), 
             array(
                'name'=>'already_price',
                'type'=>'raw',
                'value'=>'$data->already_price',
              ),
              
             array(
                'name'=>'未支付价钱',
                'type'=>'raw',
                'value'=>'$data->get_no_price()',
              ),
              
             array(
                'name'=>'custom_id',
                'type'=>'raw',
                'value'=>'$data->show_attribute("custom_id")',
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
               'name'=>'支付统计图',
               'value'=>'javascript:frame_tongji(\''.$this->createUrl("settle",array()).'\',\''.$excel_params.'\');'
             ),
             
             array(
               'name'=>CHtml::image($css_path."/images/excel.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:excel_import('".$this->createUrl('import')."','Income');"              
             ),
             
            
             
             array(
               'name'=>CHtml::image($css_path."/images/excelc.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:excel_export('".$this->createUrl('export')."','Income','".$excel_params."');"              
             ),
             array(
               'name'=>'总价：'.$model->get_total($conditions,$params)."元",
               'value'=>'#'
             ),
             
             array(
               'name'=>'已支付金额：'.$model->get_already($conditions,$params)."元",
               'value'=>'#'
             ),
             array(
               'name'=>'未支付金额：'.$model->get_no($conditions,$params)."元",
               'value'=>'#'
             ),
             
             
          ),
          //是否需要全选列
          'checked_all'=>true,
          //是否使用ajax翻页
          'ajax'=>false,    
       ));
       
       ?>



