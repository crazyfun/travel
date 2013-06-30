<?php 
       $excel_params=Util::implode_arrayeval($page_params);
       $css_path=$this->get_css_path();
       $user=new User();
       $user_select=$user->get_user_station();
       $user_select=Util::com_search_item(array(''=>'创建人'),$user_select);
       $advances_status=Util::com_search_item(array(''=>'预支状态'),CV::$advances_status);
       $this->widget('SearchItems', array( 
          'model_name'=>'Advances', 
          'user_operate'=>array(
              array(
               'name'=>'增加预支',
               'value'=>$this->createUrl("add",array()),
             ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
             'group_number'=>array(
               'name'=>'团队编号',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['group_number'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'status'=>array(
               'name'=>'预支状态',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['status'],
               'value'=>$advances_status,
               'htmlOptions'=>array(),
             ),
             
             'contacter'=>array(
               'name'=>'预支人',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['contacter'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'start_date'=>array(
               'name'=>'预支起始时间',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['start_date'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'end_date'=>array(
               'name'=>'预支结束时间',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['end_date'],
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
                'name'=>'group_number',
                'type'=>'raw',
                'value'=>'$data->group_number',
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
                'name'=>'advances_price',
                'type'=>'raw',
                'value'=>'$data->advances_price',
              ),
             array(
                'name'=>'advances_date',
                'type'=>'raw',
                'value'=>'$data->advances_date',
              ), 
             array(
                'name'=>'back_date',
                'type'=>'raw',
                'value'=>'$data->back_date',
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
               'value'=>"javascript:excel_import('".$this->createUrl('import')."','Advances');"              
             ),
             
             
             array(
               'name'=>CHtml::image($css_path."/images/excelc.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:excel_export('".$this->createUrl('export')."','Advances','".$excel_params."');"              
             ),
             array(
               'name'=>'总金额'.$model->get_total($conditions,$params)."元",
               'value'=>'#'
             ),
             array(
               'name'=>'未归还金额'.$model->get_no($conditions,$params)."元",
               'value'=>'#'
             ),
             array(
               'name'=>'已归还金额'.$model->get_already($conditions,$params)."元",
               'value'=>'#'
             ),
          ),
          //是否需要全选列
          'checked_all'=>true,
          //是否使用ajax翻页
          'ajax'=>false,    
       ));
       
       ?>



