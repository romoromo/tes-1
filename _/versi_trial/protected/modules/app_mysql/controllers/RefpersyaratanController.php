<?php

class RefpersyaratanController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$model = Yii::app()->db->createCommand('SELECT
				tblpersyaratan.tblpersyaratan_id,
				tblpersyaratan.tblpersyaratan_nama
				FROM
				tblpersyaratan
			');

		$datapersyaratan = $model->queryAll();
		$this->renderPartial('index', array(
			'datapersyaratan'=>$datapersyaratan
			));
	}



public function actionGetDataSyarat()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Persyaratan::model()->findByPk($id);
		foreach ($model as $data) {
			echo $data."||";
		}

	}

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$nama_syarat=trim($_POST['nama_syarat']);

		if ($cmd=="tambah") {
			$model = new Persyaratan;
			$model->tblpersyaratan_id = "";
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = Persyaratan::model()->findByPk($id);
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}
			$model->tblpersyaratan_nama = $nama_syarat;
			
			if($model->save()) 
				echo "success";
			else
				echo "failed";
	}

	public function actionHapusDataSyarat()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Persyaratan::model()->findByPk($id);
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