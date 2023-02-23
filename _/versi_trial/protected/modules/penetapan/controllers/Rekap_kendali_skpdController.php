<?php

class Rekap_kendali_skpdController extends Controller
{
	public function actionIndex()
	{
		$data['URL_APP'] = Yii::app()->getBaseUrl(true);
		$this->renderPartial('index', array('data'=>$data));
		
	}
	public function actionCetak()
	{
		
		$data['URL_APP'] = Yii::app()->getBaseUrl(true);
		$this->renderPartial('cetak', array('data'=>$data));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}