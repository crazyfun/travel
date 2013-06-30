<?php 
       $excel_params=Util::implode_arrayeval($page_params);
       $css_path=$this->get_css_path();
       $status=Util::com_search_item(array(''=>'结算状态'),CV::$settlement_status);
       $order_type=Util::com_search_item(array(''=>'订单类型'),CV::$order_type);
       
       $user=new User();
       $user_select=$user->get_user_station();
       $user_select=Util::com_search_item(array(''=>'创建人'),$user_select);
       $this->widget('SearchItems', array( 
          'model_name'=>'Order', 
          'user_operate'=>array(
              array(
             ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
             
              'line'=>array(
               'name'=>'出游线路',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['line'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
              'dijieshe'=>array(
               'name'=>'地接社',
               'type'=>'auto',//搜索框的类型
               'select'=>$page_params['dijieshe'],
               'value'=>$show_dijieshe,
               'htmlOptions'=>array('serviceUrl'=>$this->createUrl("main/dijieshe")),
             ),
              'status'=>array(
               'name'=>'结算状态',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['status'],
               'value'=>$status,
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
                'name'=>'line',
                'type'=>'raw',
                'value'=>'$data->line',
            ),
            array(
                'name'=>'dijieshe',
                'type'=>'raw',
                'value'=>'$data->show_dijieshe()',
            ),
            array(
                'name'=>'总价',
                'type'=>'raw',
                'value'=>'$data->show_attribute("total_market")',
            ),  
             array(
                'name'=>'总结算价',
                'type'=>'raw',
                'value'=>'$data->show_attribute("total_settlement")',
            ),
           
            array(
                'name'=>'利润',
                'type'=>'raw',
                'value'=>'$data->show_attribute("total_profit")',
            ),
            
            array(
                'name'=>'collection',
                'type'=>'raw',
                'value'=>'$data->show_attribute("collection")',
            ),       
            array(
                'name'=>'status',
                'type'=>'raw',
                'value'=>'$data->show_attribute("status")',
              ),
            array(
                'name'=>'下单人',
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
                'value'=>'$data->get_financial_operate()',
            ),
          ),
          //批量操作按钮
          'operates'=>array(
            array(
               'name'=>'综合统计图',
               'value'=>'javascript:frame_tongji(\''.$this->createUrl("complex",array()).'\',\''.$excel_params.'\');'
             ),
 
             array(
               'name'=>'结算额统计图',
               'value'=>'javascript:frame_tongji(\''.$this->createUrl("settle",array()).'\',\''.$excel_params.'\');'
             ),

             array(
               'name'=>'人数：'.$model->get_total_nums($conditions,$params)."人",
               'value'=>'#'
             ),
             
             array(
               'name'=>'总价：'.$model->get_total_sell($conditions,$params)."元",
               'value'=>'#'
             ),
             
             array(
               'name'=>'结算金额：'.$model->get_already_settle($conditions,$params)."元",
               'value'=>'#'
             ),
             
              array(
               'name'=>'未结算金额：'.$model->get_no_settle($conditions,$params)."元",
               'value'=>'#'
             ),
             
             array(
               'name'=>'利润金额：'.$model->get_total_profit($conditions,$params)."元",
               'value'=>'#'
             ),
          ),
          //是否需要全选列
          'checked_all'=>true,
          //是否使用ajax翻页
          'ajax'=>false,    
       ));
       
       ?>



