<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php
    $cssPath=$this->get_css_path();
    $jsPath=$this->get_js_path();
    Yii::app()->clientScript->registerCssFile($cssPath.'/css.css');
    Yii::app()->clientScript->registerCssFile($cssPath.'/googlemaps.css');
		Yii::app()->clientScript->registerCoreScript('jquery');
		Yii::app()->clientScript->registerScriptFile('http://api.map.baidu.com/api?v=1.3');
		

  ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body  onload="GShowMap()">
	   <?php echo $content;?>
</body>
</html>

