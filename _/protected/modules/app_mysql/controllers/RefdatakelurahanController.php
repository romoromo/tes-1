<?php

class RefdatakelurahanController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$comboKecamatan = Yii::app()->db->createCommand('SELECT
					tblkecamatan.tblkecamatan_id,
					tblkecamatan.tblkecamatan_nama
					FROM
					tblkecamatan
			')->queryAll();

			$model = Yii::app()->db->createCommand('SELECT
					tblkelurahan.tblkelurahan_id,
					tblkelurahan.tblkecamatan_id,
					tblkelurahan.tblkelurahan_nama,
					tblkecamatan.tblkecamatan_nama
					FROM
					tblkelurahan
					LEFT JOIN tblkecamatan ON tblkecamatan.tblkecamatan_id = tblkelurahan.tblkecamatan_id
					ORDER BY
					tblkecamatan.tblkecamatan_nama ASC
					');

		$datakelurahan = $model->queryAll();
		$this->renderPartial('index', array(
			'datakelurahan'=>$datakelurahan,
			'comboKecamatan'=>$comboKecamatan
			));
	}


	public function actionGetDataKelurahan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Kelurahan::model()->findByPk($id);
		foreach ($model as $data) {
			echo $data."||";
		}

	}


public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$nama_kelurahan=trim($_POST['nama_kelurahan']);
		$nama_kecamatan=trim($_POST['nama_kecamatan']);

		if ($cmd=="tambah") {
			$model = new Kelurahan;
			$model->tblkelurahan_id = "";
			
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = Kelurahan::model()->findByPk($id);
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}
			$model->tblkecamatan_id = $nama_kecamatan;
			$model->tblkelurahan_nama = $nama_kelurahan;
	
			if($model->save()) 
				echo "success";
			else
				echo "failed";
	}

	public function actionHapusDataKelurahan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Kelurahan::model()->findByPk($id);
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