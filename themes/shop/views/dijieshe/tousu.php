<?php 
	   $excel_params=Util::implode_arrayeval($page_params);
       $css_path=$this->get_css_path();
       
       $operate=Util::com_search_item(array(''=>'处理状态'),CV::$operate);
       
       $user=new User();
       $user_select=$user->get_user_station();
       $user_select=Util::com_search_item(array(''=>'创建人'),$user_select);
       $this->widget('SearchItems', array( 
          'model_name'=>'Tousu', 
          'user_operate'=>array(
              array(
               'name'=>'增加投诉',
               'value'=>$this->createUrl("addtousu",array('relation_id'=>$relation_id)),
             ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
             'contacter'=>array(
               'name'=>'联系人',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['contacter'],
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
             
             'message'=>array(
               'name'=>'内容',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['message'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'status'=>array(
               'name'=>'处理状态',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['status'],
               'value'=>$operate,
               'htmlOptions'=>array(),
             ),
             
              'create_id'=>array(
               'name'=>'创建人',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['create_id'],
               'value'=>$user_select,
               'htmlOptions'=>array(),
             ),
             
             
             'operate_id'=>array(
               'name'=>'处理人',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['operate_id'],
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
                'value'=>'$data->Dijieshe->name',
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
                'name'=>'message',
                'type'=>'raw',
                'value'=>'$data->message',
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
                'name'=>'operate_id',
                'type'=>'raw',
                'value'=>'$data->Operate->real_name',
            ),
            
            
            array(
                'name'=>'operate_time',
                'type'=>'raw',
                'value'=>'$data->show_attribute("operate_time")',
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
               'value'=>'javascript:batch_operate(\''.$this->createUrl("deletetousu",array('relation_id'=>$relation_id)).'\');'
             ),
              
              array(
               'name'=>CHtml::image($css_path."/images/excel.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:small_excel_import('".$this->createUrl('import')."','Tousu');"              
             ),
             
             
             array(
               'name'=>CHtml::image($css_path."/images/excelc.gif","",array('style'=>'border:0;')),
               'value'=>"javascript:small_excel_export('".$this->createUrl('texport')."','Tousu','".$excel_params."');"              
             ),
          ),
          //是否需要全选列
          'checked_all'=>true,
          //是否使用ajax翻页
          'ajax'=>false,    
       ));
       
       ?>



