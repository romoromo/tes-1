<?php

class TemplatepemberitahuanController extends Controller
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
			tbltemplatepemberitahuan.tbltemplatepemberitahuan_id,
			tbltemplatepemberitahuan.tblizin_id,
			tblizin.tblizin_nama,
			tbltemplatepemberitahuan.tbltemplatepemberitahuan_namafile,
			tbltemplatepemberitahuan.tbltemplatepemberitahuan_namafilejadi,
			tbltemplatepemberitahuan.tbltemplatepemberitahuan_isaktif
			FROM
			tbltemplatepemberitahuan
			LEFT JOIN tblizin ON tblizin.tblizin_id = tbltemplatepemberitahuan.tblizin_id
			ORDER BY
			tblizin.tblizin_nama ASC 
			');

		$datatemplatepemberitahuan = $model->queryAll();
		$this->renderPartial('index', array(
			'datatemplatepemberitahuan'=>$datatemplatepemberitahuan,
			'comboIzin'=>$comboIzin
			));
	}

	public function actionreloadTabel()
	{
			$model = Yii::app()->db->createCommand('SELECT
			tbltemplatepemberitahuan.tbltemplatepemberitahuan_id,
			tbltemplatepemberitahuan.tblizin_id,
			tblizin.tblizin_nama,
			tbltemplatepemberitahuan.tbltemplatepemberitahuan_namafile,
			tbltemplatepemberitahuan.tbltemplatepemberitahuan_namafilejadi,
			tbltemplatepemberitahuan.tbltemplatepemberitahuan_isaktif
			FROM
			tbltemplatepemberitahuan
			LEFT JOIN tblizin ON tblizin.tblizin_id = tbltemplatepemberitahuan.tblizin_id
			ORDER BY
			tblizin.tblizin_nama ASC 
			');

		$datatemplatepemberitahuan = $model->queryAll();
		$this->renderPartial('tbody', array(
			'datatemplatepemberitahuan'=>$datatemplatepemberitahuan
			));
	}

	public function actionGetDataTemplatePemberitahuan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = TemplatePemberitahuan::model()->findByPk($id);
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
			$model = new TemplatePemberitahuan;
			$model->tbltemplatepemberitahuan_id = "";
			
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = TemplatePemberitahuan::model()->findByPk($id);
			$nama_file_lama = $model->tbltemplatepemberitahuan_namafile;
			$nama_file_lama_jadi = $model->tbltemplatepemberitahuan_namafilejadi;
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
			$model->tbltemplatepemberitahuan_isaktif = $nama_isaktif;
			$model->tbltemplatepemberitahuan_namafile = $nama_file;
			$model->tbltemplatepemberitahuan_namafilejadi = $nama_filejadi;
	
			if($model->save()) 
				echo "success";
			else
				echo "failed";
	}

	public function actionHapusDataTemplatePemberitahuan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = TemplatePemberitahuan::model()->findByPk($id);
		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}


	public function actionSimpanFileTemplatePemberitahuan()
	{
		$folder = "file/temp_surat_pemberitahuan";
		
		if(isset($_FILES["nama_filepemberitahuan"]))
		{
			@$id = $_POST['idfile'];
			@$filertf = $_FILES['nama_filepemberitahuan']['tmp_name']; 
			@$namafilenya = $_FILES['nama_filepemberitahuan']['name'];
			$namafilertf = $namafilenya;
			$target = dirname(Yii::app()->basePath) . '/'. $folder . '/' . $namafilertf;

			//Filter the file types , if you want.
			if ($_FILES["nama_filepemberitahuan"]["error"] > 0)
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

	public function actionSimpanFileTemplatePemberitahuan_jadi()
	{
		$folder = "file/temp_surat_pemberitahuan";
		
		if(isset($_FILES["nama_filepemberitahuan_jadi"]))
		{
			@$id = $_POST['idfile'];
			@$filertf = $_FILES['nama_filepemberitahuan_jadi']['tmp_name']; 
			@$namafilenya = $_FILES['nama_filepemberitahuan_jadi']['name'];
			$namafilertf = $namafilenya;
			$target = dirname(Yii::app()->basePath) . '/'. $folder . '/' . $namafilertf;

			//Filter the file types , if you want.
			if ($_FILES["nama_filepemberitahuan_jadi"]["error"] > 0)
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