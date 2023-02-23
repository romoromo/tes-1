<?php

class RefizinpersyaratanController extends Controller
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
		$comboPersyaratan = Yii::app()->db->createCommand('SELECT
			tblpersyaratan.tblpersyaratan_id,
			tblpersyaratan.tblpersyaratan_nama
			FROM
			tblpersyaratan
			')->queryAll();
		$izinpersyaratan = Yii::app()->db->createCommand ('SELECT
			(
				SELECT
					COUNT(tblizinpersyaratan_id)
				FROM
					tblizinpersyaratan
				WHERE
					tblizinpermohonan_id = tblizinpermohonan.tblizinpermohonan_id
			) AS jmlh,
			tblizinpersyaratan.tblizinpersyaratan_id,
			tblizinpersyaratan.tblizin_id,
			tblizinpersyaratan.tblpersyaratan_id,
			tblizinpersyaratan.tblizinpermohonan_id,
			tblizinpersyaratan.tblizinpersyaratan_isaktif,
			tblizinpermohonan.tblizinpermohonan_nama,
			tblizin.tblizin_nama,
			tblpersyaratan.tblpersyaratan_nama
			FROM
			tblizinpermohonan
			INNER JOIN tblizinpersyaratan ON tblizinpermohonan.tblizinpermohonan_id = tblizinpersyaratan.tblizinpermohonan_id
			LEFT JOIN tblpersyaratan ON tblpersyaratan.tblpersyaratan_id = tblizinpersyaratan.tblpersyaratan_id
			LEFT JOIN tblizin ON tblizin.tblizin_id = tblizinpersyaratan.tblizin_id
		
			GROUP BY tblizinpersyaratan.tblizinpermohonan_id
			')->queryAll();

		$this->renderPartial('index', array(
			'dataizinpersyaratan'=>$dataizinpersyaratan,
			'comboIzin'=>$comboIzin,
			'comboPersyaratan'=>$comboPersyaratan,
			'izinpersyaratan'=>$izinpersyaratan
			));
	}

	public function actionGetPersyaratan()
	{
		
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$id = trim($_POST['tblizinpermohonan_id']);
		//$model = Izinpersyaratan::model()->findByPk($id);
		$comboSyarat = Yii::app()->db->createCommand('SELECT
			tblizinpersyaratan.tblpersyaratan_id
			FROM
			tblizinpersyaratan
			WHERE tblizinpersyaratan.tblizinpermohonan_id = '.$id)->queryAll();

		foreach ($comboSyarat as $a) {
			echo $a['tblpersyaratan_id'].",";
		}

	}

	public function actionSimpanPersyaratan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']);
		$idizin = (int) trim($_POST['idizin']);
		$idmohon = (int) trim($_POST['id']);
		$persyaratan=trim($_POST['persyaratan']);	
		$pecah = explode(',',$persyaratan);

		//foreach ($pecah as $idsyarat) {
			//$a = Izinpersyaratan::model()->findAllByAttributes(array('tblizinpermohonan_id'=>$id));
			$a = Izinpersyaratan::model()->deleteAll('tblizinpermohonan_id=:idmohon', array(':idmohon'=>$idmohon));
			//print_r($a);
		$i=1;
		foreach ($pecah as $idsyarat){ 
			$izinsyarat = new Izinpersyaratan;
			$izinsyarat->tblizin_id = $idizin;
			$izinsyarat->tblpersyaratan_id = $idsyarat;
			$izinsyarat->tblizinpermohonan_id = $idmohon;
			$izinsyarat->tblizinpersyaratan_urut = $i++;
			$izinsyarat->tblizinpersyaratan_isaktif = 'T';

			if($izinsyarat->save()) {
				echo "";
			} else {
				echo "failed";
			}

		}
		//}

	}


public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$nama_izin=trim($_POST['nama_izin']);
		$nama_permohonan=trim($_POST['nama_permohonan']);
		$nama_isaktif=trim($_POST['nama_isaktif']);

		$syarat = trim($_POST['jenis_persyaratan']);
		$syaratnya = explode(',', $syarat);
		print_r($syaratnya);
		foreach ($syaratnya as $idsyarat){ 
			echo $idsyarat . "\n";
		}
		//die;

		if ($cmd=="tambah") {
			$i=1;
			foreach ($syaratnya as $idsyarat){ 
				$izinsyarat = new Izinpersyaratan;
				$izinsyarat->tblizin_id = $nama_izin;
				$izinsyarat->tblpersyaratan_id = $idsyarat;
				$izinsyarat->tblizinpermohonan_id = $nama_permohonan;
				$izinsyarat->tblizinpersyaratan_urut = $i++;
				$izinsyarat->tblizinpersyaratan_isaktif = 'T';

				if($izinsyarat->save()) {
					echo "";
				} else {
					echo "failed";
				}

			}			
		} elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = Izinpersyaratan::model()->findByPk($id);
		} else{
			echo "Invalid Command!";
			Yii::app()->end();
		}
		echo "success";
	}


	public function actionGetJenisPermohonan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$result = array();
		$row = array();
		$id = (int) trim($_POST['id']);
		//$nama_permohonan = Jenispermohonan::model()->GetJenisPermohonan($id);
		$nama_permohonan = Yii::app()->db->createCommand('
			SELECT
			tblizinpermohonan.tblizinpermohonan_id AS id,
			tblizinpermohonan.tblizinpermohonan_nama AS nama
			FROM
			tblizinpermohonan
			WHERE
			tblizinpermohonan_id NOT IN
			(SELECT tblizinpermohonan_id  FROM tblizinpersyaratan)
			AND tblizin_id = '.$id.'
'
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
?>