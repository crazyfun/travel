<?php 
       $excel_params=Util::implode_arrayeval($page_params);
       $css_path=$this->get_css_path();
       $user=new User();
       $user_select=$user->get_user_station();
       $user_select=Util::com_search_item(array(''=>'创建人'),$user_select);
       $invoice_status=Util::com_search_item(array(''=>'审核状态'),CV::$invoice_status);
       $this->widget('SearchItems', array( 
          'model_name'=>'Invoice', 
          'user_operate'=>array(
              array(
             	),
          ),
          //搜索的内容字段
          'search_datas'=>array(
             'invoice_numbers'=>array(
               'name'=>'发票抬头',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['invoice_numbers'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'status'=>array(
               'name'=>'审核状态',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['status'],
               'value'=>$invoice_status,
               'htmlOptions'=>array(),
             ),
             
             'order_numbers'=>array(
               'name'=>'合同编号',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['order_numbers'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'start_date'=>array(
               'name'=>'申请起始时间',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['start_date'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'end_date'=>array(
               'name'=>'申请结束时间',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['end_date'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             
             'shenhe_start_date'=>array(
               'name'=>'审核起始时间',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['shenhe_start_date'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'shenhe_end_date'=>array(
               'name'=>'审核结束时间',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['shenhe_end_date'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),

             'create_id'=>array(
               'name'=>'申请人',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['create_id'],
               'value'=>$user_select,
               'htmlOptions'=>array(),
             ),
             
             'shenhe_id'=>array(
               'name'=>'审核人',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['shenhe_id'],
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
                'name'=>'invoice_numbers',
                'type'=>'raw',
                'value'=>'$data->invoice_numbers',
              ),

             array(
                'name'=>'order_numbers',
                'type'=>'raw',
                'value'=>'$data->order_numbers',
              ),
              
             array(
                'name'=>'price',
                'type'=>'raw',
                'value'=>'$data->price',
              ),
              
           array(
                'name'=>'shenhe_id',
                'type'=>'raw',
                'value'=>'$data->ShenheUser->real_name',
            ), 
            
            
           array(
                'name'=>'shenhe_time',
                'type'=>'raw',
                'value'=>'$data->show_attribute("shenhe_time")',
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
               'name'=>CHtml::image($css_path."/images/excelc.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:excel_export('".$this->createUrl('export')."','Invoice','".$excel_params."');"              
             ),
             array(
               'name'=>'总金额'.$model->get_total($conditions,$params)."元",
               'value'=>'#'
             ),
             array(
               'name'=>'未审核金额'.$model->get_no($conditions,$params)."元",
               'value'=>'#'
             ),
             array(
               'name'=>'已审核金额'.$model->get_already($conditions,$params)."元",
               'value'=>'#'
             ),
          ),
          //是否需要全选列
          'checked_all'=>true,
          //是否使用ajax翻页
          'ajax'=>false,    
       ));
       
       ?>



