<?php
class ErrorController extends AController
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
public function filters() {
		return array(
		  'accessControl', // perform access control for CRUD operations
		);
	}
	
 public function actions()
	{
		return array(
			'page'=>array(
				'class'=>'CViewAction',
		  ),
		  'error404'=>'application.shop.controllers.error.Error404Action',
		  'error403'=>'application.shop.controllers.error.Error403Action',
		  'error500'=>'application.shop.controllers.error.Error500Action',
		);
	}
}
