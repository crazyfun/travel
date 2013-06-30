<?php 
       $expenditure_type=new ExpenditureType();
       $expenditure_select=$expenditure_type->get_expendituretype_select();
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'支出',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回支出管理',
               'value'=>$this->createUrl("index",array()),
             ),
             array(
               'name'=>'新增支出',
               'value'=>$this->createUrl("add",array())
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
             'type_id'=>array(
               'name'=>'支出类型',
               'type'=>'select',//搜索框的类型
               'value'=>$expenditure_select,
               'htmlOptions'=>array(),
               'desc'=>'',
               'tip'=>"<a href=\"javascript:frame_relation('".$this->createUrl('spend/addtype')."','');\">新增支出类型</a>",
             ),
             
             'contacter'=>array(
                'name'=>'支出人',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'contacter_phone'=>array(
                'name'=>'联系号码',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'price'=>array(
                'name'=>'金额',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'expenditure_date'=>array(
                'name'=>'支出时间',
                'type'=>'date',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'comment'=>array(
                'name'=>'备注',
                'type'=>'multitext',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
  
          ), 
         
          //最下面操作按钮
          'operates'=>array(
             array(
               
             ),
          ),
            
       ));
       
?>

       
