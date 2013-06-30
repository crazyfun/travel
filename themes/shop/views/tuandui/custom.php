<?php 
	   $excel_params=Util::implode_arrayeval($page_params);
       $css_path=$this->get_css_path();
       $user=new User();
       $user_select=$user->get_user_station();
       $user_select=Util::com_search_item(array(''=>'创建人'),$user_select);
       $this->widget('SearchItems', array( 
          'model_name'=>'TuanduiCustom', 
          'user_operate'=>array(
              array(
               'name'=>'增加客户',
               'value'=>$this->createUrl("addcustom",array('relation_id'=>$relation_id)),
             ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
             'name'=>array(
               'name'=>'联系人',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['name'],
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
                'value'=>'$data->Tuandui->name',
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
                'name'=>'code',
                'type'=>'raw',
                'value'=>'$data->code',
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
                'name'=>'address',
                'type'=>'raw',
                'value'=>'$data->address',
            ),
            	
            array(
                'name'=>'supervisor',
                'type'=>'raw',
                'value'=>'$data->supervisor',
            ),
            	
            array(
                'name'=>'comment',
                'type'=>'raw',
                'value'=>'$data->comment',
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
               'value'=>'javascript:batch_operate(\''.$this->createUrl("deletecustom",array('relation_id'=>$relation_id)).'\');'
             ),
              
              array(
               'name'=>CHtml::image($css_path."/images/excel.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:small_excel_import('".$this->createUrl('import')."','TuanduiCustom');"              
             ),
             
             
             array(
               'name'=>CHtml::image($css_path."/images/excelc.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:small_excel_export('".$this->createUrl('cexport')."','TuanduiCustom','".$excel_params."');"              
             ),
          ),
          //是否需要全选列
          'checked_all'=>true,
          //是否使用ajax翻页
          'ajax'=>false,    
       ));
       
       ?>



