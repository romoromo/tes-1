<?php

class RefizinController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$comboRole = Yii::app()->db->createCommand('SELECT
			tblrole.tblrole_id,
			tblrole.tblrole_code
			FROM
			tblrole

			')->queryAll();

		$model = Yii::app()->db->createCommand('SELECT
			tblizin.tblizin_id,
			tblizin.tblizin_nama,
			tblizin.tblizin_adaretribusi,
			tblizin.tblizin_adaceklap,
			tblizin.tblrole_id,
			tblrole.tblrole_code,
			tblizin.tblizin_isaktif,
			tblizin.tblizin_isonline,
			tblizin.tblizin_ismulti

			FROM
			tblizin
			LEFT JOIN tblrole ON tblrole.tblrole_id = tblizin.tblrole_id

			');
		$dataizin = $model->queryAll();
		$this->renderPartial('index', array(
			'dataizin'=>$dataizin,
			'comboRole'=>$comboRole
			));
	}

public function actionGetDataIzin()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Tblizin::model()->findByPk($id);
		foreach ($model as $data) {
			echo $data."||";
		}

	}

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$nama_izin=trim($_POST['nama']);
		$retribusi_izin=trim($_POST['adaretribusi']);
		$ceklap_izIn=trim($_POST['adaceklap']);
		$isaktif_izin=trim($_POST['isaktif']);
		$tambah_role=trim($_POST['tambah_role']);
		$isonline=trim($_POST['isonline']);
		$ismulti=trim($_POST['ismulti']);

		if ($cmd=="tambah") {
			$model = new Tblizin;
			$model->tblizin_id = "";
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']);
			$model = Tblizin::model()->findByPk($id);
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}
			$model->tblizin_nama = $nama_izin;
			$model->tblizin_adaretribusi = $retribusi_izin;
			$model->tblizin_adaceklap = $ceklap_izIn;
			$model->tblrole_id = $tambah_role;
			$model->tblizin_isaktif = $isaktif_izin;
			$model->tblizin_isonline = $isonline;
			$model->tblizin_ismulti = $ismulti;

			if($model->save())
				echo "success";
			else
				echo "failed";
	}

	public function actionHapusDataJenisIzin()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Tblizin::model()->findByPk($id);
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