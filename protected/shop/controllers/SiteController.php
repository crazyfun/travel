<?php
class SiteController extends AController
{
  public function filters() {
		return array(
		  //'accessControl', // perform access control for CRUD operations
		  
		);
	}

 public function actions(){
 	  $controller_path="application.shop.controllers.site.";
		return array(
		  'index'=>$controller_path."IndexAction",
		  'login'=>$controller_path."LoginAction",
		  'logout'=>$controller_path."LogoutAction",
		  'welcome'=>$controller_path."WelcomeAction",
		);
	}

}
