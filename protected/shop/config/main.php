<?php
$shop=dirname(dirname(__FILE__));
$frontend=dirname($shop);
Yii::setPathOfAlias('shop', $shop);
$frontendArray=require($frontend.'/config/main.php');
$shopArray=array(
    'name'=>'网站后台管理系统',
    'basePath' => $frontend,
    'controllerPath' => $shop.'/controllers',
    'viewPath' => $shop.'/../../themes/shop/views',
    'runtimePath' => $shop.'/runtime',
	  'theme'=>'shop',
    // autoloading model and component classes
    'language'=>'zh',
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.components.widgets.*',
        'application.components.widgets.shop.*',
        'application.extensions.*',
		    'application.helpers.*',
		    'application.extensions.phpmail.*',
		    'application.extensions.LinkListPager.*',
		    'application.extensions.ipconvert.*',
		    'application.extensions.yiidebugtb.*',
		    'application.modules.*',
        'shop.models.*',
        'shop.components.*', //这里的先后顺序一定要搞清
    ),

   'modules'=>array(
  
   ),
    'components'=>array(
    
	    'authManager'=>array(
         'class'=>'CDbAuthManager',//认证类名称
         'defaultRoles'=>array('guest'),//默认角色
         'itemTable' => 'tr_authitem',//认证项表名称
         'itemChildTable' => 'tr_authitemchild',//认证项父子关系
         'assignmentTable' => 'tr_authassignment',//认证项赋权关系
       ),


		 'request'=>array(
          'enableCookieValidation'=>true,
        	'enableCsrfValidation'=>false,
        ),
	
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),
       'urlManager'=>array(
			   'urlFormat'=>'path',
			   'showScriptName'=>true,
		   )

    ),

    // main is the default layout
    //'layout'=>'main',
    // alternate layoutPath
    'layoutPath'=>dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'../../themes/shop/views'.DIRECTORY_SEPARATOR.'layouts'.DIRECTORY_SEPARATOR,
);
if(!function_exists('w3_array_union_recursive'))
{
    function w3_array_union_recursive($array1,$array2)
    {
        $retval=$array1+$array2;
        foreach($array1 as $key=>$value)
        {
            if(is_array($array1[$key]) && is_array($array2[$key]))
                $retval[$key]=w3_array_union_recursive($array1[$key],$array2[$key]);
        }
        return $retval;
    }
}

return w3_array_union_recursive($shopArray,$frontendArray);
