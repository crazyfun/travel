<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<link type="image/x-icon" rel="icon"  href="favicon.ico">
	<link type="image/x-icon" rel="shortcut Icon"  href="favicon.ico">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	 <?php    
    $cssPath=$this->get_css_path();
    $jsPath=$this->get_js_path(); 
		Yii::app()->clientScript->registerCssFile($cssPath.'/admin.css');
		Yii::app()->clientScript->registerCssFile($cssPath.'/print.css');
		Yii::app()->clientScript->registerCoreScript('jquery');
    ?>
  <style type="text/css" media="print">
  	 #print_button{display:none;}
  </style>
</head>
<body>
<div id="page_body">
   <?php echo $content;?>
</div><!-- page_body -->
</body>
</html>


