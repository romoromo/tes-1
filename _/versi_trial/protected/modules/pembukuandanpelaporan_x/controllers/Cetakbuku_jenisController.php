<?php

class Cetakbuku_jenisController extends Controller
{
	public function actionIndex()
	{
		$data['sub_rek'] = TRekening::model()->getRekeningSubAktif('4110100');
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionCari()
	{
		$cari_jenis = isset($_REQUEST['cari_jenis'])!=0 ? $_REQUEST['cari_jenis'] : "";

		$data['data'] = (array('mode'=>'LIST'));

		$this->renderPartial('tabel_laporan',array('data'=>$data));
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