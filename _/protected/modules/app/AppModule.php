<?php

class AppModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'app.models.*',
			'app.components.*',
		));
		/*start cek sesi user login*/
			if(!isset( Yii::app()->user->AuthCode ) ) {
				//die('NotAutherized');
				//Yii::app()->request->redirect('site/logout');
				//$this->redirect(array('site/logout')); <--tidakbisa
			}
		/*end cek sesi user login*/
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
