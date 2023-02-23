<?php

class ReftplsuratpengantarController extends Controller
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
		$comboTable = Yii::app()->db->createCommand('SELECT
			tblspizin_tabelvariabel.tblspizin_tabelvariabel_id,
			tblspizin_tabelvariabel.tblspizin_tabelsp
			FROM
			tblspizin_tabelvariabel

			')->queryAll(); 

			$model = Yii::app()->db->createCommand('SELECT
			tblspizin.tblspizin_id,
			tblspizin.tblizin_id,
			tblspizin.tblizinpermohonan_id,
			tblspizin.tblspizin_sptemplate,
			tblspizin.tblizinpermohonan_nama,
			tblspizin.tblspizin_tabelvariabel_id,
			tblizinpermohonan.tblizinpermohonan_id,
			tblizinpermohonan.tblizinpermohonan_nama,
			tblizin.tblizin_id,
			tblizin.tblizin_nama,
			tblspizin_tabelvariabel.tblspizin_tabelvariabel_id,
			tblspizin_tabelvariabel.tblspizin_tabelsp
			FROM
			tblspizin
			LEFT JOIN tblizin ON tblizin.tblizin_id = tblspizin.tblizin_id
			LEFT JOIN tblizinpermohonan ON tblizinpermohonan.tblizinpermohonan_id = tblspizin.tblizinpermohonan_id
			LEFT JOIN tblspizin_tabelvariabel ON tblspizin_tabelvariabel.tblspizin_tabelvariabel_id = tblspizin.tblspizin_tabelvariabel_id
			ORDER BY tblizin.tblizin_nama, tblizinpermohonan.tblizinpermohonan_nama ASC
			');

		$datatemplatesk = $model->queryAll();
		$this->renderPartial('index', array(
			'datatemplatesk'=>$datatemplatesk,
			'comboIzin'=>$comboIzin,
			'comboTable'=>$comboTable
			));
	}


	public function actionEdit()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		
		$id = trim($_POST['id']);
		$model = RefTemplateSP::model()->findByPk($id);
		foreach ($model as $data) {
			echo $data."||";
		}

	}


	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$nama_table=trim($_POST['nama_table']);
		$nama_filesk=trim($_POST['nama_filesk']);
		$izin=trim($_POST['izin']);
		$nama_permohonan=trim($_POST['permohonan']);

		if ($cmd=="tambah") {
			$model = new RefTemplateSP;
			$model->tblspizin_id = "";
			
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = RefTemplateSP::model()->findByPk($id);
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}
			$model->tblizin_id = $izin;
			$model->tblizinpermohonan_id = $nama_permohonan;
			$model->tblspizin_sptemplate = $nama_filesk;
			$model->tblspizin_tabelvariabel_id= $nama_table;
	
			if($model->save()) 
				echo "success";
			else
				echo "failed";
	}

	public function actionHapus()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$id = trim($_POST['id']);
		$model = RefTemplateSP::model()->findByPk($id);

		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}




	public function actionSimpanFileTemplateSK()
	{
		$folder = "file/temp_surat_pengantar";
		$filertf = $_FILES['nama_filesk']['tmp_name']; 
		$namafilenya_sk =$_FILES['nama_filesk']['name']; 
		$namafilertf = $namafilenya_sk;
		$target = dirname(Yii::app()->basePath) . '/'. $folder . '/' . $namafilertf;
		
		if(isset($_FILES["nama_filesk"]))
		{
			//Filter the file types , if you want.
			if ($_FILES["nama_filesk"]["error"] > 0)
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

		} else echo "nofile";
	}


	public function actionGetJenisPermohonan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$result = array();
		$row = array();
		$id = (int) trim($_POST['id']);
		$nama_permohonan = Yii::app()->db->createCommand('
			SELECT
			tblizinpermohonan.tblizinpermohonan_id AS id,
			tblizinpermohonan.tblizinpermohonan_nama AS nama
			FROM
			tblizinpermohonan
			WHERE
			tblizinpermohonan_id NOT IN
			(SELECT tblizinpermohonan_id FROM tblspizin)
			AND tblizin_id = '.$id
		)->queryAll();
		if (count($nama_permohonan)>0) {
			foreach($nama_permohonan as $list)
			{	
				$row[] = array(
					"id"=> $list['id'],
					'nama'=>$list['nama']
				);
			}
			$result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			echo CJSON::encode($result);
		}
	}
	/*data sekunder*/
	public function actionInfoVariabel()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$tabel = trim($_POST['tabel']);
		$data['primer'] = Yii::app()->db->schema->getTable("vtblizinpendaftaran")->columns;
		$data['sekunder'] = Yii::app()->db->schema->getTable($tabel)->columns;

		$this->renderPartial('info_variabel', array('data'=>$data));
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