<?php
class ApiController extends Controller
{

  public function filters() {
		
	}

 public function actions(){
 	  $controller_path="application.controllers.api.";
		return array(
		  'guidecalendar'=>$controller_path."GuidecalendarAction",
		  'agencycalendar'=>$controller_path.'AgencycalendarAction',	
		  'myagencycalendar'=>$controller_path.'MyagencycalendarAction',
		  'myguidecalendar'=>$controller_path.'MyguidecalendarAction',
		  'ordainguide'=>$controller_path.'OrdainguideAction',
		  'ordainagency'=>$controller_path.'OrdainagencyAction',
		  'clearflush'=>$controller_path."ClearflushAction",
		  'scheduler'=>$controller_path."SchedulerAction",
		  'crop'=>$controller_path.'CropAction',
		  'searchuser'=>$controller_path.'SearchuserAction',
		);
	}
}
