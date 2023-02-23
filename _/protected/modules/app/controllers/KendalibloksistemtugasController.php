<?php

class KendalibloksistemtugasController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['tugas'] = KendalibloksistemTugas::model()->tugas();
		$data['bloksistem'] = Kendalibloksistem::model()->findAll();
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionEdit()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$id = (int) trim($_POST['id']);
		$edit = KendalibloksistemTugas::model()->findByPk($id);
		foreach ($edit as $list) {
			echo $list."||";
		}
	}

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim
		

		if ($cmd=="tambah") {
			$model = new KendalibloksistemTugas;
			$model->tblkendalibloksistemtugas_id = "";
		}
		elseif($cmd=="edit") {
			$id = (int) trim($_POST['id']);
			$model = KendalibloksistemTugas::model()->findByPk($id);
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}

		$model->tblkendalibloksistem_id = trim($_POST['bloksistem']);
		$model->tblkendalibloksistemtugas_nama = trim($_POST['tugas']);
		$model->tblkendalibloksistemtugas_isaktif = trim($_POST['status']);

		if ($model->save()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}

	public function actionHapus()
	{
		$id = (int) trim($_POST['id']);
		$hapus = KendalibloksistemTugas::model()->findByPk($id);
		if ($hapus->delete()) {
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