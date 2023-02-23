<?php

class RefjenispermohonanController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$comboIzin = Yii::app()->db->createCommand('SELECT
			tblizin.tblizin_id,
			tblizin.tblizin_nama
			FROM
			tblizin
			WHERE
			tblizin.tblizin_isaktif = "T"
			')->queryAll();

			$model = Yii::app()->db->createCommand('SELECT
				tblizinpermohonan.tblizinpermohonan_id,
				tblizinpermohonan.tblizin_id,
				tblizin.tblizin_nama,
				tblizinpermohonan.tblizinpermohonan_nama,
				tblizinpermohonan.tblizinpermohonan_register,
				tblizinpermohonan.tblizinpermohonan_rekening,
				tblizinpermohonan.tblizinpermohonan_isaktif
				FROM
				tblizinpermohonan
				LEFT JOIN tblizin ON tblizin.tblizin_id = tblizinpermohonan.tblizin_id
				ORDER BY tblizin.tblizin_nama ASC 
			');

		$datapermohonan = $model->queryAll();
		$this->renderPartial('index', array(
			'datapermohonan'=>$datapermohonan,
			'comboIzin'=>$comboIzin
			));
	}

	public function actionGetDataJenisPermohonan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Jenispermohonan::model()->findByPk($id);
		foreach ($model as $data) {
			echo $data."||";
		}

	}


public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$tambah_izin=trim($_POST['tambah_izin']);
		$tambah_permohonan=trim($_POST['tambah_permohonan']);
		$tambah_register=trim($_POST['tambah_register']);
		$tambah_rekening=trim($_POST['tambah_rekening']);
		$tambah_isaktif=trim($_POST['tambah_isaktif']);

		if ($cmd=="tambah") {
			$model = new Jenispermohonan;
			$model->tblizinpermohonan_id = "";
			
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = Jenispermohonan::model()->findByPk($id);
		}
		else{
			echo "Invalid Command!";
			Yii::app()->end();
		}
			$model->tblizin_id = $tambah_izin;
			$model->tblizinpermohonan_nama = $tambah_permohonan;
			$model->tblizinpermohonan_register = $tambah_register;
			$model->tblizinpermohonan_rekening = $tambah_rekening;
			$model->tblizinpermohonan_isaktif = $tambah_isaktif;
	
			if($model->save()) 
				echo "success";
			else
				echo "failed";
	}

	public function actionHapusDataJenisPermohonan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Jenispermohonan::model()->findByPk($id);
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