<?php

class TemplateundanganController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$comboIzin = Yii::app()->db->createCommand('SELECT
			tblizin.tblizin_id,
			tblizin.tblizin_nama
			FROM
			tblizin
			')->queryAll();

			$model = Yii::app()->db->createCommand('SELECT
			tbltemplateundangan.tbltemplateundangan_id,
			tbltemplateundangan.tblizin_id,
			tblizin.tblizin_nama,
			tbltemplateundangan.tbltemplateundangan_namafile,
			tbltemplateundangan.tbltemplateundangan_namafilejadi,
			tbltemplateundangan.tbltemplateundangan_isaktif
			FROM
			tbltemplateundangan
			LEFT JOIN tblizin ON tblizin.tblizin_id = tbltemplateundangan.tblizin_id
			ORDER BY
			tblizin.tblizin_nama ASC 
			');

		$datatemplateundangan = $model->queryAll();
		$this->renderPartial('index', array(
			'datatemplateundangan'=>$datatemplateundangan,
			'comboIzin'=>$comboIzin
			));
	}

	public function actionreloadTabel()
	{
			$model = Yii::app()->db->createCommand('SELECT
			tbltemplateundangan.tbltemplateundangan_id,
			tbltemplateundangan.tblizin_id,
			tblizin.tblizin_nama,
			tbltemplateundangan.tbltemplateundangan_namafile,
			tbltemplateundangan.tbltemplateundangan_namafilejadi,
			tbltemplateundangan.tbltemplateundangan_isaktif
			FROM
			tbltemplateundangan
			LEFT JOIN tblizin ON tblizin.tblizin_id = tbltemplateundangan.tblizin_id
			ORDER BY
			tblizin.tblizin_nama ASC 
			');

		$datatemplateundangan = $model->queryAll();
		$this->renderPartial('tbody', array(
			'datatemplateundangan'=>$datatemplateundangan
			));
	}

	public function actionGetDataTemplateUndangan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = TemplateUndangan::model()->findByPk($id);
		echo CJSON::encode($model);

	}


public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$nama_izin=trim($_POST['nama_izin']);
		$nama_isaktif=trim($_POST['nama_isaktif']);
		$nama_file=trim($_POST['nama_file']);
		$nama_filejadi=trim($_POST['nama_filejadi']);

		if ($cmd=="tambah") {
			$model = new TemplateUndangan;
			$model->tbltemplateundangan_id = "";
			
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = TemplateUndangan::model()->findByPk($id);
			$nama_file_lama = $model->tbltemplateundangan_namafile;
			$nama_file_lama_jadi = $model->tbltemplateundangan_namafilejadi;
			if ($nama_file=='') {
				$nama_file = $nama_file_lama;
			}
			if ($nama_filejadi=='') {
				$nama_filejadi = $nama_file_lama_jadi;
			}

		}
		else{
			echo "Invalid Command!";
			Yii::app()->end();
		}
			$model->tblizin_id = $nama_izin;
			$model->tbltemplateundangan_isaktif = $nama_isaktif;
			$model->tbltemplateundangan_namafile = $nama_file;
			$model->tbltemplateundangan_namafilejadi = $nama_filejadi;
	
			if($model->save()) 
				echo "success";
			else
				echo "failed";
	}

	public function actionHapusDataTemplateUndangan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = TemplateUndangan::model()->findByPk($id);
		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}


	public function actionSimpanFileTemplateUndangan()
	{
		$folder = "file/temp_surat_undangan";
		
		if(isset($_FILES["nama_fileundangan"]))
		{
			@$id = $_POST['idfile'];
			@$filertf = $_FILES['nama_fileundangan']['tmp_name']; 
			@$namafilenya = $_FILES['nama_fileundangan']['name'];
			$namafilertf = $namafilenya;
			$target = dirname(Yii::app()->basePath) . '/'. $folder . '/' . $namafilertf;

			//Filter the file types , if you want.
			if ($_FILES["nama_fileundangan"]["error"] > 0)
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

	public function actionSimpanFileTemplateUndangan_jadi()
	{
		$folder = "file/temp_surat_undangan";
		
		if(isset($_FILES["nama_fileundangan_jadi"]))
		{
			@$id = $_POST['idfile'];
			@$filertf = $_FILES['nama_fileundangan_jadi']['tmp_name']; 
			@$namafilenya = $_FILES['nama_fileundangan_jadi']['name'];
			$namafilertf = $namafilenya;
			$target = dirname(Yii::app()->basePath) . '/'. $folder . '/' . $namafilertf;

			//Filter the file types , if you want.
			if ($_FILES["nama_fileundangan_jadi"]["error"] > 0)
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
}
