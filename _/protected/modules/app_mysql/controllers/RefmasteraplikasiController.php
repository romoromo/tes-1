<?php

class RefmasteraplikasiController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$comboMaster = Yii::app()->db->createCommand('SELECT
			tblpegawai.tblpegawai_id,
			tblpegawai.tblpegawai_nama
			FROM
			tblpegawai

			')->queryAll();

			$model = Yii::app()->db->createCommand('SELECT
			tblmaster.tblmaster_id,
			tblmaster.tblmaster_kabupaten,
			tblmaster.tblmaster_alamat,
			tblmaster.tblmaster_kepala,
			tblmaster.tblmaster_bendahara,
			tblmaster.tblmaster_kasubagtu,
			tblmaster.tblmaster_isaktif,
			a.tblpegawai_nama AS nama_kepala,
			b.tblpegawai_nama AS nama_bendahara,
			c.tblpegawai_nama AS nama_kasubagtu,
			tblmaster.tblmaster_skpd
			FROM
			tblmaster
			LEFT JOIN tblpegawai AS a ON tblmaster.tblmaster_kepala = a.tblpegawai_id
			LEFT JOIN tblpegawai AS b ON tblmaster.tblmaster_bendahara = b.tblpegawai_id
			LEFT JOIN tblpegawai AS c ON tblmaster.tblmaster_kasubagtu = c.tblpegawai_id

			');

		$datamasteraplikasi = $model->queryAll();
		$this->renderPartial('index', array(
			'datamasteraplikasi'=>$datamasteraplikasi,
			'comboMaster'=>$comboMaster
			));
	}


	public function actionGetDataMasterAplikasi()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = RefMaster::model()->findByPk($id);
		foreach ($model as $data) {
			echo $data."||";
		}

	}


public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$nama_skpd=trim($_POST['nama_skpd']);
		$nama_kabupaten=trim($_POST['nama_kabupaten']);
		$nama_alamat=trim($_POST['nama_alamat']);
		$nama_kepala=trim($_POST['nama_kepala']);
		$nama_bendahara=trim($_POST['nama_bendahara']);
		$nama_kasubagtu=trim($_POST['nama_kasubagtu']);
		$nama_isaktif=trim($_POST['nama_isaktif']);

		if ($cmd=="tambah") {
			$model = new RefMaster;
			$model->tblmaster_id = "";
			
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = RefMaster::model()->findByPk($id);
		}
		else{
			echo "Invalid Command!";
			Yii::app()->end();
		}
			$model->tblmaster_skpd = $nama_skpd;
			$model->tblmaster_kabupaten = $nama_kabupaten;
			$model->tblmaster_alamat = $nama_alamat;
			$model->tblmaster_kepala = $nama_kepala;
			$model->tblmaster_bendahara = $nama_bendahara;
			$model->tblmaster_kasubagtu = $nama_kasubagtu;
			$model->tblmaster_isaktif = $nama_isaktif;
	
			if($model->save()) 
				echo "success";
			else
				echo "failed";
	}

	public function actionHapusDataMasterAplikasi()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = RefMaster::model()->findByPk($id);
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