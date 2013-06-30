<?php 
	   $excel_params=Util::implode_arrayeval($page_params);
       $css_path=$this->get_css_path();
       
       $status=Util::com_search_item(array(''=>'结算状态'),CV::$settlement_status);
       $service=Util::com_search_item(array(''=>'服务'),CV::$service);
       
       $user=new User();
       $user_select=$user->get_user_station();
       $user_select=Util::com_search_item(array(''=>'创建人'),$user_select);
       $this->widget('SearchItems', array( 
          'model_name'=>'Car', 
          'user_operate'=>array(
              array(
               'name'=>'增加车辆',
               'value'=>$this->createUrl("add",array('relation_id'=>$relation_id)),
             ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
          
             'trave_name'=>array(
               'name'=>'线路',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['trave_name'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'use_date'=>array(
               'name'=>'使用日期',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['use_date'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'car_num'=>array(
               'name'=>'车号',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['car_num'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'car_type'=>array(
               'name'=>'车型',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['car_type'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             
             
             'car_driver'=>array(
               'name'=>'司机',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['car_driver'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
              'cell_phone'=>array(
               'name'=>'联系电话',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['cell_phone'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'status'=>array(
               'name'=>'结算状态',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['status'],
               'value'=>$status,
               'htmlOptions'=>array(),
             ),
             
             'service'=>array(
               'name'=>'服务',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['service'],
               'value'=>$service,
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
                'name'=>'relation_id',
                'type'=>'raw',
                'value'=>'$data->Motorcade->motorcade_name',
              ),
             array(
                'name'=>'trave_name',
                'type'=>'raw',
                'value'=>'$data->trave_name',
              ), 
              
             array(
                'name'=>'use_date',
                'type'=>'raw',
                'value'=>'$data->use_date',
              ),
             array(
                'name'=>'car_num',
                'type'=>'raw',
                'value'=>'$data->car_num',
              ),
              
            array(
                'name'=>'car_type',
                'type'=>'raw',
                'value'=>'$data->car_type',
              ),
              
             array(
                'name'=>'price',
                'type'=>'raw',
                'value'=>'$data->price',
              ),
              
              
          
            array(
                'name'=>'service',
                'type'=>'raw',
                'value'=>'$data->show_attribute("service")',
              ),
            array(
                'name'=>'car_driver',
                'type'=>'raw',
                'value'=>'$data->car_driver',
              ), 
              
            array(
                'name'=>'cell_phone',
                'type'=>'raw',
                'value'=>'$data->cell_phone',
              ), 
           
            array(
                'name'=>'status',
                'type'=>'raw',
                'value'=>'$data->show_attribute("status")',
            ),
              
            array(
                'name'=>'create_id',
                'type'=>'raw',
                'value'=>'$data->User->real_name',
            ),
            array(
                'name'=>'create_time',
                'type'=>'raw',
                'value'=>'$data->format_create_time()',
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
               'value'=>'javascript:batch_operate(\''.$this->createUrl("delete",array('relation_id'=>$relation_id)).'\');'
             ),
              
              array(
               'name'=>CHtml::image($css_path."/images/excel.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:small_excel_import('".$this->createUrl('import')."','Car');"              
             ),
             
             
             array(
               'name'=>CHtml::image($css_path."/images/excelc.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:small_excel_export('".$this->createUrl('export')."','Car','".$excel_params."');"              
             ),
             
             
              array(
               'name'=>'使用车辆：'.$model->get_total_nums($conditions,$params)."辆",
               'value'=>'#'
             ),
             
             array(
               'name'=>'总车价：'.$model->get_total_sell($conditions,$params)."元",
               'value'=>'#'
             ),
             
        
             array(
               'name'=>'已结算：'.$model->get_already_settle($conditions,$params)."元",
               'value'=>'#'
             ),
             
              array(
               'name'=>'未结算：'.$model->get_no_settle($conditions,$params)."元",
               'value'=>'#'
             ),
             
           
             
             
             
          ),
          //是否需要全选列
          'checked_all'=>true,
          //是否使用ajax翻页
          'ajax'=>false,    
       ));
       
       ?>



