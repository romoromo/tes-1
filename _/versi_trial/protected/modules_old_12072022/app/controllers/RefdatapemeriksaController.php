<?php

class RefdatapemeriksaController extends Controller
{
	public function actionIndex()
	{
		$data = TimPemeriksa::model()->getSelectTimPemeriksa();
		$instansi = TimPemeriksa::model()->getinstansi();
		$this->renderPartial('index', array(
			'data'=>$data,
			'instansi'=>$instansi
			));
	}

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$nama_instansi=trim($_POST['nama_instansi']);
		$nama_pemeriksa=trim($_POST['nama_pemeriksa']);
		$pangkat_pemeriksa=trim($_POST['pangkat_pemeriksa']);
		$golongan_pemeriksa=trim($_POST['golongan_pemeriksa']);
		$nip_pemeriksa=trim($_POST['nip_pemeriksa']);
		$jabatan_pemeriksa=trim($_POST['jabatan_pemeriksa']);
		$pemeriksa_isaktif=trim($_POST['pemeriksa_isaktif']);


		if ($cmd=="tambah") {
			$model = new TimPemeriksa;
			$model->reftimpemeriksa_id = "";
			
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = TimPemeriksa::model()->findByPk($id);
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}
			$model->refinstansi_id= $nama_instansi;
			$model->reftimpemeriksa_nama = $nama_pemeriksa;
			$model->reftimpemeriksa_pangkat = $pangkat_pemeriksa;
			$model->reftimpemeriksa_gol = $golongan_pemeriksa;
			$model->reftimpemeriksa_nip = $nip_pemeriksa;
			$model->reftimpemeriksa_jabatan = $jabatan_pemeriksa;
			$model->reftimpemeriksa_isaktif = $pemeriksa_isaktif;
	
			if($model->save()) 
				echo "success";
			else
				echo "failed";
	}

	public function actionEditDataPemeriksa()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = TimPemeriksa::model()->findByPk($id);
		foreach ($model as $data) {
			echo $data."||";
		}

	}

	public function actionHapusDataPemeriksa()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = TimPemeriksa::model()->findByPk($id);
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