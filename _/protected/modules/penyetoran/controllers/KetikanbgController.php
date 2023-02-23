<?php


class KetikanbgController extends Controller
{
var $URLMODUL ='penyetoran/ketikanbg';
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionCetak()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseurl;
		// $type = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : 'html';
		$data['border'] = '0';

		$data['text_rekening'] = strval($_REQUEST['text_rekening']); 
		$data['nama_wp'] = strval($_REQUEST['nama_wp']); 
		$data['nama_bank'] = strval($_REQUEST['nama_bank']); 
		$data['no_bukti'] = strval($_REQUEST['no_bukti']); 
		$data['tanggal_bg'] = strval($_REQUEST['tanggal_bg']); 
		$data['jumlah_stok'] = strval($_REQUEST['jumlah_stok']); 
		$data['info'] = strval($_REQUEST['info']); 
		

		$this->renderPartial('tpl',
			array(
				'data'=>$data
				)
			);
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