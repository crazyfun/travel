<?php 
       $excel_params=Util::implode_arrayeval($page_params);
       $css_path=$this->get_css_path();
       $sex=Util::com_search_item(array(''=>'性别'),CV::$sex);
       
       $user=new User();
       $user_select=$user->get_user_station();
       $user_select=Util::com_search_item(array(''=>'创建人'),$user_select);
       $this->widget('SearchItems', array( 
          'model_name'=>'Cicerone', 
          'user_operate'=>array(
              array(
               'name'=>'增加导游',
               'value'=>$this->createUrl("add",array()),
             ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
             'contacter'=>array(
               'name'=>'导游姓名',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['contacter'],
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
             
             'cicerone_num'=>array(
               'name'=>'导游证',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['cicerone_num'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
  
              'cicerone_sex'=>array(
               'name'=>'性别',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['cicerone_sex'],
               'value'=>$sex,
               'htmlOptions'=>array(),
             ),
             
              'familiar'=>array(
               'name'=>'熟悉目的地',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['familiar'],
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
                'name'=>'contacter',
                'type'=>'raw',
                'value'=>'$data->contacter',
              ),
              
             array(
                'name'=>'cell_phone',
                'type'=>'raw',
                'value'=>'$data->cell_phone',
              ),
              
            array(
                'name'=>'cicerone_sex',
                'type'=>'raw',
                'value'=>'$data->show_attribute("cicerone_sex")',
              ),
            array(
                'name'=>'cicerone_num',
                'type'=>'raw',
                'value'=>'$data->cicerone_num',
              ),
            array(
                'name'=>'cicerone_level',
                'type'=>'raw',
                'value'=>'$data->show_attribute("cicerone_level")',
              ), 
              
             array(
                'name'=>'familiar',
                'type'=>'raw',
                'value'=>'$data->show_attribute("familiar")',
              ), 
              
              
            array(
                'name'=>'email',
                'type'=>'raw',
                'value'=>'$data->email',
            ),
            
            array(
                'name'=>'qq',
                'type'=>'raw',
                'value'=>'$data->qq',
            ),
              
            array(
                'name'=>'msn',
                'type'=>'raw',
                'value'=>'$data->msn',
              ),
            array(
                'name'=>'code',
                'type'=>'raw',
                'value'=>'$data->code',
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
               'value'=>'javascript:batch_operate(\''.$this->createUrl("delete",array()).'\');'
             ),
             
             array(
               'name'=>CHtml::image($css_path."/images/excel.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:excel_import('".$this->createUrl('import')."','Cicerone');"              
             ),
             
             
             array(
               'name'=>CHtml::image($css_path."/images/excelc.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:excel_export('".$this->createUrl('export')."','Cicerone','".$excel_params."');"              
             ),
          ),
          //是否需要全选列
          'checked_all'=>true,
          //是否使用ajax翻页
          'ajax'=>false,    
       ));
       
       ?>



