<?php

class RefinstansiController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$model = Yii::app()->db->createCommand('SELECT
				refinstansi.refinstansi_id,
				refinstansi.refinstansi_nama
				FROM
				refinstansi
				ORDER BY
				refinstansi.refinstansi_id ASC
			');

		$datainstansi = $model->queryAll();
		$this->renderPartial('index', array(
			'datainstansi'=>$datainstansi,
			));
	}


	public function actionGetDataInstansi()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Instansi::model()->findByPk($id);
		foreach ($model as $data) {
			echo $data."||";
		}
	}


public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$nama_instansi=trim($_POST['nama_instansi']);
		
		if ($cmd=="tambah") {
			$model = new Instansi;
			$model->refinstansi_id = "";
			
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = Instansi::model()->findByPk($id);
		}
		else{
			echo "Invalid Command!";
			Yii::app()->end();
		}
			$model->refinstansi_nama = $nama_instansi;
	
			if($model->save()) 
				echo "success";
			else
				echo "failed";
	}

	public function actionHapusDataInstansi()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Instansi::model()->findByPk($id);
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