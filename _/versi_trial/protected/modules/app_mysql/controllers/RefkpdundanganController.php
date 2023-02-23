<?php

class RefkpdundanganController extends Controller
{
	public function actionIndex()
	{
		$datalist = KepadaUndangan::model()->findAll();

		$this->renderPartial('index', array('datalist'=>$datalist));
	}

	public function actionLoadData()
	{
		$datalist = KepadaUndangan::model()->findAll();

		$this->renderPartial('tabel', array('datalist'=>$datalist));
	}

	public function actionEdit()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);		
		$model = KepadaUndangan::model()->findByPk($id);

		header('Content-type: text/json');
		header('Content-type: application/json');
		echo CJSON::encode($model);

	}


	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']);
		$urutan=trim($_POST['urutan']);
		$nama=trim($_POST['nama']);
		$status=trim($_POST['status']);

		if ($cmd=="tambah") {
			$model = new KepadaUndangan;
			$model->refkepadaundangan_id = "";

		}
		elseif($cmd=="edit") {
			$id = (int)($_POST['id']);
			$model = KepadaUndangan::model()->findByPk($id);
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}

		$model->refkepadaundangan_urutan = $urutan;
		$model->refkepadaundangan_nama = $nama;
		$model->refkepadaundangan_isaktif = $status;

		if($model->save())
			echo "success";
		else
			echo "failed";
	}

	public function actionHapus()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = KepadaUndangan::model()->findByPk($id);
		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
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