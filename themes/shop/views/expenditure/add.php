<?php
    Yii::app()->clientScript->registerCssFile('/js/autocompleted/styles.css');
		Yii::app()->clientScript->registerScriptFile("/js/autocompleted/jquery.autocomplete-min.js"); 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'收入',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回收入管理',
               'value'=>$this->createUrl("index",array()),
             ),
             array(
               'name'=>'新增收入',
               'value'=>$this->createUrl("add",array())
             ),
          ),
          //增加的内容字段
          'add_datas'=>array(
             'order_type'=>array(
               'name'=>'收入类型',
               'type'=>'select',//搜索框的类型
               'value'=>CV::$jiesuan_type,
               'htmlOptions'=>array(),
               'desc'=>''
             ),
             
             'order_number'=>array(
                'name'=>'订单编号',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'contacter'=>array(
                'name'=>'收款人',
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
             
             'total_price'=>array(
                'name'=>'总价',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),
             
             'already_price'=>array(
                'name'=>'支付金额',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
                'desc'=>''
             ),

             'custom_id'=>array(
                'name'=>'',
                'type'=>'hidden',
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             
             'custom_name'=>array(
                'name'=>'客户',
                'type'=>'text',
                'value'=>'',
                'htmlOptions'=>array(),
             ),
             
          
             'comment'=>array(
                'name'=>'备注',
                'type'=>'textarea',
                'value'=>"",
                'htmlOptions'=>array(),
             ),
          ), 
         
          //最下面操作按钮
          'operates'=>array(
             array(
               
             ),
          ),
            
       ));
       
?>

 <script language="javascript">
 	  
 	  jQuery(document).ready(function(){
 	  	var income_order_type=jQuery("#Income_order_type");
 	  	var order_type_value=income_order_type.find('option:selected').val();
 	  	change_serviceurl(order_type_value);
 			
 			income_order_type.bind("change",function(){
 				var order_type_value=jQuery(this).find('option:selected').val();
 				change_serviceurl(order_type_value);
 			});
 			
 	})
 	function change_serviceurl(order_type_value){
 		var seviceUrl="";
 		switch(order_type_value){
 			case '1':
 			  seviceUrl="/main/ccustom.html";
 			  break;
 			case '2':
 			  seviceUrl="/main/tcustom.html";
 			
 			  break;
 			default:
 			  seviceUrl="/main/ccustom.html";
 			  break;
 			  
 		}
 		jQuery('#Income_custom_name').unbind("keypress");
 		jQuery('#Income_custom_name').unbind("keyup");
 		jQuery('#Income_custom_name').unbind("blur");
 		jQuery('#Income_custom_name').unbind("focus");
 		jQuery('#Income_custom_name').autocomplete({
 				serviceUrl:seviceUrl,
 				minChars:1,
 				delimiter: /(,|;)\s*/,
 				maxHeight:400,
 				width:490,
 				zIndex: 9999,
 				deferRequestBy: 0,
 				noCache: true,
 				onSelect: function(value, data){
 						jQuery('#Income_custom_id').val(data.id);
 				}
 			});
 			
 	jQuery('#Income_custom_name').bind('keyup',function(){
 			var this_val=jQuery(this).val();
 			if(!this_val){
 				jQuery('#Income_custom_id').val('');
 				}

 	}); 
 	
 			
 			
 	}

 </script>
       
