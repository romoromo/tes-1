<?php

class RefdatapegawaiController extends Controller
{
	public function actionIndex()
	{
			$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
			$model = Yii::app()->db->createCommand('SELECT
					tblpegawai.tblpegawai_id,
					tblpegawai.tblpegawai_nama,
					tblpegawai.tblpegawai_nip,
					tblpegawai.tblpegawai_pangkat,
					tblpegawai.tblpegawai_golongan,
					tblpegawai.tblpegawai_jabatan,
					tblpegawai.tblpegawai_skpd,
					tblpegawai.tblpegawai_isaktif
					FROM
					tblpegawai
					ORDER BY
					tblpegawai.tblpegawai_nip ASC
			');

		$datapegawai = $model->queryAll();
		$this->renderPartial('index', array(
			'datapegawai'=>$datapegawai
			));
	}


	public function actionGetDataPegawai()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Pegawai::model()->findByPk($id);
		foreach ($model as $data) {
			echo $data."||";
		}

	}


	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$nama_pegawai=trim($_POST['nama_pegawai']);
		$nip_pegawai=trim($_POST['nip_pegawai']);
		$nama_pangkat=trim($_POST['nama_pangkat']);
		$nama_golongan=trim($_POST['nama_golongan']);
		$nama_jabatan=trim($_POST['nama_jabatan']);
		$nama_skpd=trim($_POST['nama_skpd']);
		$nama_isaktif=trim($_POST['nama_isaktif']);

		if ($cmd=="tambah") {
			$model = new Pegawai;
			$model->tblpegawai_id = "";
			
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = Pegawai::model()->findByPk($id);
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}
			$model->tblpegawai_nama = $nama_pegawai;
			$model->tblpegawai_nip = $nip_pegawai;
			$model->tblpegawai_pangkat = $nama_pangkat;
			$model->tblpegawai_golongan = $nama_golongan;
			$model->tblpegawai_jabatan = $nama_jabatan;
			$model->tblpegawai_skpd = $nama_skpd;
			$model->tblpegawai_isaktif = $nama_isaktif;
	
			if($model->save()) 
				echo "success";
			else
				echo "failed";
	}

	public function actionHapusDataPegawai()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Pegawai::model()->findByPk($id);
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