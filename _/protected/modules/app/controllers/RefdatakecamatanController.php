<?php

class RefdatakecamatanController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$model = Yii::app()->db->createCommand('SELECT
				tblkecamatan.tblkecamatan_id,
				tblkecamatan.tblkecamatan_nama
				FROM
				tblkecamatan
				ORDER BY
				tblkecamatan.tblkecamatan_id ASC

			');
		$datakecamatan = $model->queryAll();
		$this->renderPartial('index', array(
			'datakecamatan'=>$datakecamatan
			));
	}


public function actionGetDataKecamatan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Kecamatan::model()->findByPk($id);
		foreach ($model as $data) {
			echo $data."||";
		}

	}

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$nama_kecamatan=trim($_POST['nama_kecamatan']);

		if ($cmd=="tambah") {
			$model = new Kecamatan;
			$model->tblkecamatan_id = "";
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = Kecamatan::model()->findByPk($id);
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}
			$model->tblkecamatan_nama = $nama_kecamatan;
			
			if($model->save()) 
				echo "success";
			else
				echo "failed";
	}

	public function actionHapusDataKecamatan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Kecamatan::model()->findByPk($id);
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