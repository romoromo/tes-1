<?php

class Pengaduanv2Controller extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actiongetTablePengaduan()
	{
		$data['pengaduan'] = Pengaduan::model()->findAll();
		$this->renderPartial('tabelPengaduan', array('data'=>$data,));
	}

	public function actiongetDetail()
	{
		$id = $_REQUEST['id'];
		$model = Pengaduan::model()->findByPk($id);
		
		echo CJSON::encode($model); print_r($model); die();
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