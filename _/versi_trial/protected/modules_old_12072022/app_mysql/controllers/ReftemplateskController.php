<?php

class ReftemplateskController extends Controller
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
			tblskizin_tabelvariabel.tblskizin_tabelvariabel_id,
			tblskizin_tabelvariabel.tblskizin_tabelsk
			FROM
			tblskizin_tabelvariabel

			')->queryAll(); 

			$model = Yii::app()->db->createCommand('SELECT
			tblskizin.tblskizin_id,
			tblskizin.tblizin_id,
			tblskizin.tblizinpermohonan_id,
			tblskizin.tblskizin_sktemplate,
			tblskizin.tblizinpermohonan_nama,
			tblskizin.tblskizin_tabelvariabel_id,
			tblizinpermohonan.tblizinpermohonan_id,
			tblizinpermohonan.tblizinpermohonan_nama,
			tblizin.tblizin_id,
			tblizin.tblizin_nama,
			tblskizin_tabelvariabel.tblskizin_tabelvariabel_id,
			tblskizin_tabelvariabel.tblskizin_tabelsk
			FROM
			tblskizin
			LEFT JOIN tblizin ON tblizin.tblizin_id = tblskizin.tblizin_id
			LEFT JOIN tblizinpermohonan ON tblizinpermohonan.tblizinpermohonan_id = tblskizin.tblizinpermohonan_id
			LEFT JOIN tblskizin_tabelvariabel ON tblskizin_tabelvariabel.tblskizin_tabelvariabel_id = tblskizin.tblskizin_tabelvariabel_id
			ORDER BY tblizin.tblizin_nama, tblizinpermohonan.tblizinpermohonan_nama ASC
			');

		$datatemplatesk = $model->queryAll();
		$this->renderPartial('index', array(
			'datatemplatesk'=>$datatemplatesk,
			'comboIzin'=>$comboIzin,
			'comboTable'=>$comboTable
			));
	}

	public function actionReload()
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
			tblskizin_tabelvariabel.tblskizin_tabelvariabel_id,
			tblskizin_tabelvariabel.tblskizin_tabelsk
			FROM
			tblskizin_tabelvariabel

			')->queryAll(); 

			$model = Yii::app()->db->createCommand('SELECT
			tblskizin.tblskizin_id,
			tblskizin.tblizin_id,
			tblskizin.tblizinpermohonan_id,
			tblskizin.tblskizin_sktemplate,
			tblskizin.tblizinpermohonan_nama,
			tblskizin.tblskizin_tabelvariabel_id,
			tblizinpermohonan.tblizinpermohonan_id,
			tblizinpermohonan.tblizinpermohonan_nama,
			tblizin.tblizin_id,
			tblizin.tblizin_nama,
			tblskizin_tabelvariabel.tblskizin_tabelvariabel_id,
			tblskizin_tabelvariabel.tblskizin_tabelsk
			FROM
			tblskizin
			LEFT JOIN tblizin ON tblizin.tblizin_id = tblskizin.tblizin_id
			LEFT JOIN tblizinpermohonan ON tblizinpermohonan.tblizinpermohonan_id = tblskizin.tblizinpermohonan_id
			LEFT JOIN tblskizin_tabelvariabel ON tblskizin_tabelvariabel.tblskizin_tabelvariabel_id = tblskizin.tblskizin_tabelvariabel_id
			ORDER BY tblizin.tblizin_nama, tblizinpermohonan.tblizinpermohonan_nama ASC
			');

		$datatemplatesk = $model->queryAll();
		$this->renderPartial('tabel', array(
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
		$model = ReftemplateSK::model()->findByPk($id);
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
			$model = new ReftemplateSK;
			$model->tblskizin_id = "";
			
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = ReftemplateSK::model()->findByPk($id);
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}
			$model->tblizin_id = $izin;
			$model->tblizinpermohonan_id = $nama_permohonan;
			$model->tblskizin_sktemplate = $nama_filesk;
			$model->tblskizin_tabelvariabel_id= $nama_table;
	
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
		$model = ReftemplateSK::model()->findByPk($id);

		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}



	public function actionSimpanFileTemplateSK()
	{
		$folder = "file/temp_draft_sk";
		@$filertf = $_FILES['nama_filesk']['tmp_name']; 
		@$namafilenya_sk =$_FILES['nama_filesk']['name']; 
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

		}
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
			(SELECT tblizinpermohonan_id FROM tblskizin)
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

}