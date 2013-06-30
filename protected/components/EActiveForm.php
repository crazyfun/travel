<?php
 /**
 * EActiveForm类库 用户操作新增的view层的操作项
 * @author LXF 
 */
class EActiveForm extends CActiveForm {
	function __construct(){
		parent::__construct();
	}
	/*
	 * 创建Text
	 * @param string $model model的名字
	 * @param string $attribute model的字段
	 * @param array $htmlOptions 输入框附加的属性
	 * @return string 返回输入框
	 * @auther lxf
	 * @since 1.0.0
	 */
	public static function createText($model,$attribute,$htmlOptions=array()){
		 return self::textField($model,$attribute,$htmlOptions);
	}
	
	/*
	 * 创建数字的Text
	 * @param string $model model的名字
	 * @param string $attribute model的字段
	 * @param array $htmlOptions 输入框附加的属性
	 * @return string 返回输入框
	 * @auther lxf
	 * @since 1.0.0
	 */
	public static function createNumber($model,$attribute,$htmlOptions=array()){
		 $model_name=get_class($model);
		 $return_str="";
		 $return_str.=self::textField($model,$attribute,$htmlOptions);
		 $return_str.="
		    <script language='javascript'>
		       jQuery('#".$model_name."_".$attribute."').live('blur',function(){
		           var number_value=jQuery(this).val();
		           if(number_value&&isNaN(number_value)){
		              jQuery(this).val('');
		           }
		       });
		    </script>";
		 return $return_str;
	}
	
	
	
	/**
	 * 创建HiddenText
	 * @param string $model model的名字
	 * @param string $attribute model的字段
	 * @param array $htmlOptions 输入框附加的属性
	 * @return string 返回输入框
	 * @auther lxf
	 * @since 1.0.0
	 */
	public static function createHidden($model,$attribute,$htmlOptions=array()){
		 return self::hiddenField($model,$attribute,$htmlOptions);
	}
	/**
	 * 创建PasswordText
	 * @param string $model model的名字
	 * @param string $attribute model的字段
	 * @param array  $htmlOptions 输入框附加的属性
	 * @return string 返回输入框
	 * @auther lxf
	 * @since 1.0.0
	 */

	public static function createPassword($model,$attribute,$htmlOptions=array()){
		 return self::passwordField($model,$attribute,$htmlOptions);
	}
		/**
	 * 创建FileText
	 * @param string $model model的名字
	 * @param string $attribute model的字段
	 * @param array $htmlOptions 输入框附加的属性
	 * @return string 返回输入框
	 * @auther lxf
	 * @since 1.0.0
	 */
	public static function createFile($model,$attribute,$htmlOptions=array()){
		
		
		 $return_str=self::fileField($model,$attribute,$htmlOptions);
		 //是否显示图片的编辑按钮
		 if(!isset($htmlOptions['edit'])){
		 	  $htmlOptions['edit']=true;
		 }
		 if($htmlOptions['edit']&&!empty($model->$attribute)){
		 	  $select_checkbox=CHtml::checkBox("select_".$attribute,true,array());
		 	  $return_str.="<div class='content_img'><img src='".(Yii::app()->homeUrl."/".$model->$attribute)."' width='160' height='80'/>".$select_checkbox."选择";
		 	  if($htmlOptions['is_cope']){
		 	   $return_str.="&nbsp;&nbsp;<input type='button' name='crop' value='裁剪' class='operate_green' onclick=\"javascript:window.open('/api/crop?image_name=".$model->$attribute."&crop_size=&crop_aspect=','裁剪图片', 'height=500, width=1000, top=0, left=0, toolbar=no, menubar=no, scrollbars=yes, resizable=no,location=no, status=no');\"/>";
		 	 }
		 	 $return_str.="</div>";
		 }
		 return $return_str;
	}
		/**
	 * 创建FileText
	 * @param string $model model的名字
	 * @param string $attribute model的字段
	 * @param array $htmlOptions 输入框附加的属性
	 * @return string 返回输入框
	 * @auther lxf
	 * @since 1.0.0
	 */
	public static function createUploadfile($model,$attribute,$htmlOptions=array()){
		
		
		 $return_str=self::fileField($model,$attribute,$htmlOptions);
		 //是否显示图片的编辑按钮
		 if(!isset($htmlOptions['edit'])){
		 	  $htmlOptions['edit']=true;
		 }
		 if($htmlOptions['edit']&&!empty($model->$attribute)){
		 	  $select_checkbox=CHtml::checkBox("select_".$attribute,true,array());
		 	  $upload_file=explode("/",$model->$attribute);
	      $upload_name=end($upload_file);
		 	  $return_str.="<div class='content_img'>".$select_checkbox."&nbsp;&nbsp;".CHtml::link($upload_name,"/".$model->$attribute,array());
		 	  $return_str.="</div>";
		 }
		 return $return_str;
	}
	/*
	 * 创建image显示
	 * @param string $model model的名字
	 * @param string $attribute model的字段
	 * @param array $htmlOptions 输入框附加的属性
	 * @return string 返回image显示
	 * @auther lxf
	 * @since 1.0.0
	 */
	public static function createImage($model,$attribute,$htmlOptions=array()){
		 return CHtml::image($model->$attribute,$attribute,$htmlOptions);
	}
	
	
	
	/**
	 * 创建TextareaText
	 * @param string $model model的名字
	 * @param string $attribute model的字段
	 * @param array $htmlOptions 输入框附加的属性
	 * @return string 返回输入框
	 * @auther lxf
	 * @since 1.0.0
	 */
	public static function createTextarea($model,$attribute,$htmlOptions=array()){
		 return self::textArea($model,$attribute,$htmlOptions);
	}
	/**
	 * 创建Select
	 * @param string $model model的名字
	 * @param string $attribute model的字段
	 * @param array $data 输入框选择的数组
	 * @param array $htmlOptions 输入框附加的属性
	 * @return string 返回输入框
	 * @auther lxf
	 * @since 1.0.0
	 */
	public static function createSelect($model,$attribute,$data=array(),$htmlOptions=array()){
		
		return self::dropDownList($model,$attribute,$data,$htmlOptions);
	}
	
	/**
	 * 创建multiselect
	 * @param string $model model的名字
	 * @param string $attribute model的字段
	 * @param array $data 输入框选择的数组
	 * @param array $htmlOptions 输入框附加的属性
	 * @return string 返回输入框
	 * @auther lxf
	 * @since 1.0.0
	 */
	public static function createMulti($model,$attribute,$data=array(),$htmlOptions=array()){
		if(!isset($htmlOptions['multiple'])){
		 	$htmlOptions['multiple']=true;
		}
		return self::listBox($model,$attribute,$data,$htmlOptions);
	}
	/**
	 * 创建CheckBox
	 * @param string $input_name 输入框的名字
	 * @param string $select checkbox是否选择
	 * @param array $htmlOptions 输入框附加的属性
	 * @param string $attributes_id 输入框附加的字段属性ID
	 * @return string 返回输入框
	 * @auther lxf
	 * @since 1.0.0
	 */
	public static function createCheck($model,$attribute,$htmlOptions=array()){
		return self::checkBox($model,$attribute,$htmlOptions);
	}
	
	/**
	 * 创建CheckBoxLists
	 * @param string $model model的名字
	 * @param string $attribute model的字段
	 * @param array $data 输入框选择的数组
	 * @param array $htmlOptions 输入框附加的属性
	 * @return string 返回输入框
	 * @auther lxf
	 * @since 1.0.0
	 */
	public static function createCheckbox($model,$attribute,$data,$htmlOptions=array()){
		
		return self::checkBoxList($model,$attribute,$data,$htmlOptions);
	}
	/**
	 * 创建Radio
	 * @param string $model model的名字
	 * @param string $attribute model的字段
	 * @param array $data 输入框选择的数组
	 * @param array $htmlOptions 输入框附加的属性
	 * @return string 返回输入框
	 * @auther lxf
	 * @since 1.0.0
	 */
	public static function createRadio($model,$attribute,$data,$htmlOptions=array()){
		return self::radioButtonList($model,$attribute,$data,$htmlOptions);
	}
	/**
	 * 创建Date
	 * @param string $model model的名字
	 * @param string $attribute model的字段
	 * @param array $htmlOptions 输入框附加的属性
	 * @return string 返回时间输入框
	 * @auther lxf
	 * @since 1.0.0
	 */
	public static function createDate($model,$attribute,$htmlOptions=array()){
		if(empty($htmlOptions['dateFmt'])){
			$htmlOptions['dateFmt']="yyyy-MM-dd";
		}
		if(empty($htmlOptions['onclick'])){
			$htmlOptions['onclick']='javascript:WdatePicker({dateFmt:"'.$htmlOptions['dateFmt'].'",isShowWeek:true,startDate:"'.$model->$attribute.'",readOnly:true});';
		}
		Yii::app()->clientScript->registerScriptFile('/js/My97DatePicker/WdatePicker.js');
		return self::textField($model,$attribute,$htmlOptions);
	}
	/**
	 * 创建Multitext
	 * @param string $model model的名字
	 * @param string $attribute model的字段
	 * @param array $htmlOptions 输入框附加的属性
	 * @return string 返回富文本输入框
	 * @auther lxf
	 * @since 1.0.0
	 */
	public static function createMultitext($model,$attribute,$htmlOptions=array()){
		if(empty($htmlOptions['toobar'])){
		   	$htmlOptions['toobar']="Default";
		 }
		 if(empty($htmlOptions['width'])){
		 	$htmlOptions['width']="600px";
		}
		
		if(empty($htmlOptions['height'])){
		 	$htmlOptions['height']="400px";
		}
		return Yii::app()->getController()->widget('application.extensions.fckeditor.FCKEditorWidget',array(
    				"model"=>$model, # Data-Model
   					"attribute"=>$attribute,# Attribute in the Data-Model
   					"height"=>$htmlOptions['height'],
    				"width"=>$htmlOptions['width'],
    				"toolbarSet"=>$htmlOptions['toobar'], # EXISTING(!) Toolbar (see: fckeditor.js)
    				"fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",# Path to fckeditor.php
    				"fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",# Realtive Path to the Editor (from Web-Root)
          ));
    
	}
   /**
	 * 创建autocomplete
	 * @param string $model model的名字
	 * @param string $attribute model的字段
	 * @param array $data 输入框选择的值
	 * @param array $htmlOptions 输入框附加的属性
	 * @return string 返回时间输入框
	 * @auther lxf
	 * @since 1.0.0
	 */
	public static function createAuto($model,$attribute,$data,$htmlOptions=array()){
    $model_name=get_class($model);
		Yii::app()->clientScript->registerCssFile('/js/autocompleted/styles.css');
		Yii::app()->clientScript->registerScriptFile("/js/autocompleted/jquery.autocomplete-min.js");
		$return_str="";
		$real_input=self::createHidden($model,$attribute,array());
		if(empty($htmlOptions['autocomplete'])){
			$htmlOptions['autocomplete']="off";
		}
		$screen_input=EHtml::textField("show_".$attribute,$data,$htmlOptions);
		$javascript_str="<script language='javascript'>
		jQuery(document).ready(function(){
		jQuery('#show_".$attribute."').autocomplete({ 
    	  serviceUrl:'".$htmlOptions['serviceUrl']."',
    	  minChars:1, 
    	  delimiter: /(,|;)\s*/, 
    	  maxHeight:400,
    	  width:490,
    	  zIndex: 9999,
    	  deferRequestBy: 0, 
    	  noCache: true, 
    	  onSelect: function(value, data){
    	  	jQuery('#".$model_name."_".$attribute."').val(data.id);
    	  }
    });
    })
    jQuery('#show_".$attribute."').live('keyup',function(){
     
      var this_val=jQuery(this).val();
      if(!this_val){
    	   jQuery('#".($model_name."_".$attribute)."').val('');
      }	
  	
    });
    </script>";
		$return_str.=$real_input.$screen_input.$javascript_str;
		return $return_str;
	}	
	/**
	 * 创建各种类型的输入框
	 * @param string $type 输入框的类型
	  * @param string $model model的名字
	 * @param string $attribute model的字段
	 * @param array $data 输入框选择的值
	 * @param array $htmlOptions 输入框附加的属性
	 * @return string 根据$type类型返回一个合适输入框
	 * @auther lxf
	 * @since 1.0.0
	 */
	public static function selectCreate($type,$model,$attribute,$data,$htmlOptions=array()){
		$select_type=CV::$input_type[$type];
		$select_function="create".ucfirst($select_type);
		if(empty($data)&&($type!='auto')){
			return self::$select_function($model,$attribute,$htmlOptions);
		}else{
			return self::$select_function($model,$attribute,$data,$htmlOptions);
		}
	}
	
	
	
}
?>
