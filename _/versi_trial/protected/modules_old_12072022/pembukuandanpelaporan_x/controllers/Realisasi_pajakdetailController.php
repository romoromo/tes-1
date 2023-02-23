<?php

class Realisasi_pajakdetailController extends Controller
{
	public function init()
	{
		Yii::import('ext.DBFetch');
	}

	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionCari()
	{
		$this->renderPartial('tabel_laporan');
	}

	public function actionCetak()
	{
		$this->renderPartial('cetak');
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