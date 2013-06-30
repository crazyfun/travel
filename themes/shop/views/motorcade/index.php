<?php 
       $excel_params=Util::implode_arrayeval($page_params);
       $css_path=$this->get_css_path();
       $user=new User();
       $user_select=$user->get_user_station();
       $user_select=Util::com_search_item(array(''=>'创建人'),$user_select);
       $this->widget('SearchItems', array( 
          'model_name'=>'Motorcade', 
          'user_operate'=>array(
              array(
               'name'=>'增加车队',
               'value'=>$this->createUrl("add",array()),
             ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
             'motorcade_name'=>array(
               'name'=>'车队名称',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['motorcade_name'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'motorcade_contacter'=>array(
               'name'=>'车队联系人',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['motorcade_contacter'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),

             'cell_phone'=>array(
               'name'=>'手机号码',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['cell_phone'],
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
                'name'=>'motorcade_name',
                'type'=>'raw',
                'value'=>'$data->motorcade_name',
              ),
              
             array(
                'name'=>'motorcade_contacter',
                'type'=>'raw',
                'value'=>'$data->motorcade_contacter',
              ),
              
            array(
                'name'=>'cell_phone',
                'type'=>'raw',
                'value'=>'$data->cell_phone',
              ),
              
            array(
                'name'=>'tele_phone',
                'type'=>'raw',
                'value'=>'$data->tele_phone',
            ),
            
            array(
                'name'=>'motorcade_fax',
                'type'=>'raw',
                'value'=>'$data->motorcade_fax',
            ),
              
            array(
                'name'=>'motorcade_qq',
                'type'=>'raw',
                'value'=>'$data->motorcade_qq',
              ),
            array(
                'name'=>'motorcade_msn',
                'type'=>'raw',
                'value'=>'$data->motorcade_msn',
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
                'name'=>'车辆',
                'type'=>'raw',
                'value'=>'$data->show_car()',
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
               'value'=>"javascript:excel_import('".$this->createUrl('import')."','Motorcade');"              
             ),

             array(
               'name'=>CHtml::image($css_path."/images/excelc.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:excel_export('".$this->createUrl('export')."','Motorcade','".$excel_params."');"              
             ),
          ),
          //是否需要全选列
          'checked_all'=>true,
          //是否使用ajax翻页
          'ajax'=>false,    
       ));
       
       ?>



