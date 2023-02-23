<?php

class RefretribusiformController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		// cari izin yang belum dibuatkan retribusinya
		$comboIzin = Yii::app()->db->createCommand('SELECT
			tblizin.tblizin_id,
			tblizin.tblizin_nama
			FROM
			tblizin
			')->queryAll();
		$comboIzinFiltered = Yii::app()->db->createCommand('SELECT
			tblizin.tblizin_id,
			tblizin.tblizin_nama
			FROM
			tblizin
			WHERE
			tblizin_id NOT IN (SELECT tblizin_id FROM tblretribusiform)
			')->queryAll();
		$model = Yii::app()->db->createCommand('SELECT
			tblretribusiform.tblretribusiform_id,
			tblretribusiform.tblizin_id,
			tblizin.tblizin_nama,
			tblretribusiform.tblretribusiform_table,
			tblretribusiform.tblretribusiform_file,
			tblretribusiform.tblretribusiform_kdrekening,
			tblretribusiform.tblretribusiform_skrd
			FROM
			tblretribusiform
			LEFT JOIN tblizin ON tblizin.tblizin_id = tblretribusiform.tblizin_id
			');

		$dataretribusi = $model->queryAll();
		$this->renderPartial('index', array(
			'dataretribusi'=>$dataretribusi
			,'comboIzin'=>$comboIzin
			,'comboIzinFiltered'=>$comboIzinFiltered
			));
	}


	public function actionGetDataRetribusi()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = RetribusiForm::model()->findByPk($id);
		$izin = Jenisizin::model()->findByPk($model->tblizin_id);
		$nama_izin = '';
		if($izin) {
			$nama_izin = $izin->tblizin_nama;
		}
		foreach ($model as $data) {
			echo $data."||";
		}
		echo @$nama_izin;

	}


public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$nama_izin=trim($_POST['nama_izin']);
		$id_izin=trim($_POST['id_izinid_izin']);
		$nama_tabel=trim($_POST['nama_tabel']);
		$file=trim($_POST['file']);
		$nama_rekening=trim($_POST['nama_rekening']);
		$nama_skrd=trim($_POST['nama_skrd']);
		$nama_retribusi=trim($_POST['nama_retribusi']);

		if ($cmd=="tambah") {
			$model = new RetribusiForm;
			$model->tblretribusiform_id = "";
			$model->tblizin_id = $nama_izin;
			
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = RetribusiForm::model()->findByPk($id);
			//$model->tblizin_id = $id_izin;
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}
			$model->tblretribusiform_table= $nama_tabel;
			//$model->tblretribusiform_file= $file;
			$model->tblretribusiform_kdrekening = $nama_rekening;
			$model->tblretribusiform_skrd = $nama_skrd;
			$model->tblretribusiform_file = $nama_retribusi;
	
			if($model->save()) 
				echo "success";
			else
				echo "failed";
	}

	public function actionHapusDataRetribusi()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = RetribusiForm::model()->findByPk($id);
		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}



	public function actionSimpanFileTemplateSkrd()
	{
		$folder = "file/temp_cetak_skr";
		$filertf = $_FILES['nama_fileskrd']['tmp_name']; 
		$namafilenya_skrd = $_POST['namafilenya_skrd'];
		$namafilertf = $namafilenya_skrd;
		$target = dirname(Yii::app()->basePath) . '/'. $folder . '/' . $namafilertf;
		
		if(isset($_FILES["nama_fileskrd"]))
		{
			//Filter the file types , if you want.
			if ($_FILES["nama_fileskrd"]["error"] > 0)
			{
			  echo "error ";
			}
			else
			{
				//move the uploaded file to uploads folder;
		    	//move_uploaded_file($filertf,$target);


				if (move_uploaded_file($filertf,$target)) {
					echo "success";
				}
				else {
					echo "failed";
				}
		    	
			}

		}
	}


	public function actionSimpanFileRetribusi()
	{
		$folder = "file/temp_form_retribusi";
		$filertf = $_FILES['nama_fileretribusi']['tmp_name']; 
		$namafilenya_retribusi = $_POST['namafilenya_retribusi'];
		$namafilertf = $namafilenya_retribusi;
		$target = dirname(Yii::app()->basePath) . '/'. $folder . '/' . $namafilertf;
		
		if(isset($_FILES["nama_fileretribusi"]))
		{
			//Filter the file types , if you want.
			if ($_FILES["nama_fileretribusi"]["error"] > 0)
			{
			  echo "error ";
			}
			else
			{
				//move the uploaded file to uploads folder;
		    	//move_uploaded_file($filertf,$target);


				if (move_uploaded_file($filertf,$target)) {
					echo "success";
				}
				else {
					echo "failed";
				}
		    	
			}

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