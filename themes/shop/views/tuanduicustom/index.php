<?php 
       $excel_params=Util::implode_arrayeval($page_params);
       $css_path=$this->get_css_path();
       $sex=Util::com_search_item(array(''=>'性别'),CV::$sex);
       $user=new User();
       $user_select=$user->get_user_station();
       $user_select=Util::com_search_item(array(''=>'创建人'),$user_select);
       $this->widget('SearchItems', array( 
          'model_name'=>'Tcustoms', 
          'user_operate'=>array(
              array(
               'name'=>'增加团队客户',
               'value'=>$this->createUrl("add",array()),
             ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
          
             'company'=>array(
               'name'=>'公司名称',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['company'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             
             'name'=>array(
               'name'=>'客户名称',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['name'],
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
             
             'tele_phone'=>array(
               'name'=>'座机号码',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['tele_phone'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
  
              'sex'=>array(
               'name'=>'性别',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['sex'],
               'value'=>$sex,
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
                'name'=>'company',
                'type'=>'raw',
                'value'=>'$data->company',
              ),
             array(
                'name'=>'name',
                'type'=>'raw',
                'value'=>'$data->name',
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
                'name'=>'fax',
                'type'=>'raw',
                'value'=>'$data->fax',
              ),
            array(
                'name'=>'sex',
                'type'=>'raw',
                'value'=>'$data->show_attribute("sex")',
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
               'value'=>"javascript:excel_import('".$this->createUrl('import')."','Tcustoms');"              
             ),
             
             
             array(
               'name'=>CHtml::image($css_path."/images/excelc.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:excel_export('".$this->createUrl('export')."','Tcustoms','".$excel_params."');"              
             ),
          ),
          //是否需要全选列
          'checked_all'=>true,
          //是否使用ajax翻页
          'ajax'=>false,    
       ));
       
       ?>



