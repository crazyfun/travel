<?php 
       $excel_params=Util::implode_arrayeval($page_params);
       $css_path=$this->get_css_path();
       $order_type=Util::com_search_item(array(''=>'订单类型'),CV::$order_type);
       $user=new User();
       $user_select=$user->get_user_station();
       $user_select=Util::com_search_item(array(''=>'创建人'),$user_select);
       $this->widget('SearchItems', array( 
          'model_name'=>'DijiesheJiesuan', 
          'user_operate'=>array(
              array(
             ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
             'order_id'=>array(
               'name'=>'订单ID',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['order_id'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             'dijieshe_id'=>array(
               'name'=>'地接社',
               'type'=>'auto',//搜索框的类型
               'select'=>$page_params['dijieshe_id'],
               'value'=>$show_dijieshe_id,
               'htmlOptions'=>array('serviceUrl'=>$this->createUrl("main/dijieshe")),
             ),
             'order_type'=>array(
               'name'=>'订单类型',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['order_type'],
               'value'=>$order_type,
               'htmlOptions'=>array(),
             ),
             
             'start_date'=>array(
               'name'=>'结算开始时间',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['start_date'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             'end_date'=>array(
               'name'=>'结算结束时间',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['end_date'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),

             'create_id'=>array(
               'name'=>'操作用户',
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
                'name'=>'订单ID',
                'type'=>'raw',
                'value'=>'$data->order_id',
              ), 
            array(
                'name'=>'出游线路',
                'type'=>'raw',
                'value'=>'$data->show_attribute("order_id")',
            ),
            array(
                'name'=>'dijieshe_id',
                'type'=>'raw',
                'value'=>'$data->show_attribute("dijieshe_id")',
            ),
            array(
                'name'=>'jiesuan_value',
                'type'=>'raw',
                'value'=>'$data->jiesuan_value',
            ),  
             array(
                'name'=>'comment',
                'type'=>'raw',
                'value'=>'$data->comment',
            ),

            array(
                'name'=>'结算人',
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
               'name'=>CHtml::image($css_path."/images/excelc.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:excel_export('".$this->createUrl('export')."','DijiesheJiesuan','".$excel_params."');"              
             ),

             array(
               'name'=>'结算金额：'.$model->get_already_settle($conditions,$params)."元",
               'value'=>'#'
             ),
          ),
          //是否需要全选列
          'checked_all'=>true,
          //是否使用ajax翻页
          'ajax'=>false,    
       ));
       
       ?>



