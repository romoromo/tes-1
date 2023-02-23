<?php

class ExsumController extends Controller
{
	public function actionIndex()
	{
		$data['REALISASI_PERREKENING']		= Yii::app()->db->createCommand('SELECT * FROM REALISASI_PERREKENING')->queryAll(); 
		$data['REALISASI_PERKECAMATAN'] 	= Yii::app()->db->createCommand('SELECT * FROM REALISASI_PERKECAMATAN')->queryAll(); 
		$data['REALISASI_PERPAJAK_BYBULAN'] = Yii::app()->db->createCommand('SELECT * FROM REALISASI_PERPAJAK_BYBULAN')->queryAll(); 
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionLoad()
	{
		$data['template'] = str_replace('.', '', ($_REQUEST['template']) ) . '.php';
		$this->renderPartial('view', array('data'=>$data));
	}
}