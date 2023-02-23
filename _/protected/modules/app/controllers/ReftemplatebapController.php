<?php

class ReftemplatebapController extends Controller
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
			tbltemplatebap.tbltemplatebap_id,
			tbltemplatebap.tblizin_id,
			tblizin.tblizin_nama,
			tbltemplatebap.tbltemplatebap_namafile,
			tbltemplatebap.tbltemplatebap_isaktif
			FROM
			tbltemplatebap
			LEFT JOIN tblizin ON tblizin.tblizin_id = tbltemplatebap.tblizin_id
			ORDER BY
			tblizin.tblizin_nama ASC 
			');

		$datatemplatebap = $model->queryAll();
		$this->renderPartial('index', array(
			'datatemplatebap'=>$datatemplatebap,
			'comboIzin'=>$comboIzin
			));
	}

	public function actionreloadTabel()
	{
		$model = Yii::app()->db->createCommand('SELECT
			tbltemplatebap.tbltemplatebap_id,
			tbltemplatebap.tblizin_id,
			tblizin.tblizin_nama,
			tbltemplatebap.tbltemplatebap_namafile,
			tbltemplatebap.tbltemplatebap_isaktif
			FROM
			tbltemplatebap
			LEFT JOIN tblizin ON tblizin.tblizin_id = tbltemplatebap.tblizin_id
			ORDER BY
			tblizin.tblizin_nama ASC 
			');

		$datatemplatebap = $model->queryAll();
		$this->renderPartial('tbody', array(
			'datatemplatebap'=>$datatemplatebap
			));
	}

	public function actionGetDataTemplateBap()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = TemplateBAP::model()->findByPk($id);
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

		if ($cmd=="tambah") {
			$model = new TemplateBAP;
			$model->tbltemplatebap_id = "";
			
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = TemplateBAP::model()->findByPk($id);
			$nama_file_lama = $model->tbltemplatebap_namafile;
			if ($nama_file=='') {
				$nama_file = $nama_file_lama;
			}

		}
		else{
			echo "Invalid Command!";
			Yii::app()->end();
		}
			$model->tblizin_id = $nama_izin;
			$model->tbltemplatebap_isaktif = $nama_isaktif;
			$model->tbltemplatebap_namafile = $nama_file;
	
			if($model->save()) 
				echo "success";
			else
				echo "failed";
	}

	public function actionHapusDataTemplateBap()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = TemplateBAP::model()->findByPk($id);
		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}


public function actionSimpanFileTemplateBap()
	{
		$folder = "file/temp_bap";
		//$id = $_POST['idfile'];
		
		if(isset($_FILES["nama_filebap"]))
		{
		
		@$filertf = $_FILES['nama_filebap']['tmp_name']; 
		@$namafilenya = $_FILES['nama_filebap']['name'];
		$namafilertf = $namafilenya;
		$target = dirname(Yii::app()->basePath) . '/'. $folder . '/' . $namafilertf;
			//Filter the file types , if you want.
			if ($_FILES["nama_filebap"]["error"] > 0)
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