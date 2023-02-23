<?php

class KendalialurController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['bloksistem'] = Kendalibloksistem::model()->findAll();
		$data['alur'] = Kendalialur::model()->Kendalialur();
		$data['jenis_izin'] = Jenisizin::model()->findAll();
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionForm()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['bloksistem'] = Kendalibloksistem::model()->findAll();
		$data['alur'] = Kendalialur::model()->Kendalialur();
		$data['jenis_izin'] = Jenisizin::model()->findAll();
		$this->renderPartial('form', array('data'=>$data));
	}

	public function actionEdit()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$id = (int) trim($_POST['id']);
		$edit = Kendalialur::model()->edit($id);
		foreach ($edit as $list) {
			echo $list."||";
		}
	}

	public function actionGetListTabelAlur()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id_mohon = (int)$_REQUEST['jenis_permohonan'];
		$alur = Kendalialur::model()->ListTabelAlur($id_mohon);
		$this->renderPartial('tabel', array('DataAlur'=>$alur));

	}

	public function actionTambahAlur()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$model = new Kendalialur;
		$model->tblkendalialur_id = "";
		$model->tblizin_id = trim($_POST['jenis_izin']);
		$model->tblizinpermohonan_id = trim($_POST['jenis_permohonan']);
		$model->tblkendalibloksistem_id = trim($_POST['bloksistem']);
		$model->tblkendalialur_urut = trim($_POST['urut']);
		$model->tblkendalialur_jmlharibataswaktu = trim($_POST['hari']);
		$model->tblkendalialur_jmljambataswaktu = trim($_POST['waktu']);
		$model->tblkendalialur_isaktif = trim($_POST['status']);

		if($model->save()) {
			echo "added";
		} else {
			echo "failed";
		}
	}

	public function actionGantiStatus()
	{
		$id_alur = $_REQUEST['id_alur'];
		$statusbaru = $_REQUEST['status'];
		$model = Kendalialur::model()->findByPk($id_alur);
		$model->tblkendalialur_isaktif = $statusbaru;
		if($model->save()) {
			echo "changed";
		} else {
			echo "failed";
		}
	}

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim
		

		if ($cmd=="tambah") {
			$model = new Kendalialur;
			$model->isNewRecord  = true;
			$model->tblkendalialur_id = "";
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']);
			$model = Kendalialur::model()->findByPk($id);
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}

		$model->tblizin_id = trim($_POST['jenis_izin']);
		$model->tblizinpermohonan_id = trim($_POST['jenis_permohonan']);
		$model->tblkendalibloksistem_id = trim($_POST['bloksistem']);
		$model->tblkendalialur_urut = trim($_POST['urut']);
		$model->tblkendalialur_jmlharibataswaktu = trim($_POST['hari']);
		$model->tblkendalialur_jmljambataswaktu = trim($_POST['waktu']);
		$model->tblkendalialur_isaktif = trim($_POST['status']);

		if ($model->save()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}

	public function actionHapus()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$id = (int) trim($_POST['id']);
		$hapus = Kendalialur::model()->findByPk($id);

		if ($hapus->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}

	public function actionGetListKendaliAlur()
	{
		$id_mohon = $_REQUEST['id_mohon'];
		
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