<?php

class KendalibloksistemController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['kendalibloksistem'] = Kendalibloksistem::model()->findAll();
		$data['group'] = Group::model()->findAll();
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionEdit()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		
		$id = (int) trim($_POST['id']);
		$edit = Kendalibloksistem::model()->findByPk($id);
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
			$model = new Kendalibloksistem;
			$model->tblkendalibloksistem_id = "";
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']);
			$model = Kendalibloksistem::model()->findByPk($id);
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}

		$model->tblkendalibloksistem_nama = trim($_POST['nama']);
		$model->tblkendalibloksistem_isrouting = trim($_POST['isrouting']);
		$model->tblkendalibloksistem_isaktif = trim($_POST['isaktif']);
		$model->tblrole_id = trim($_POST['group']);

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

		$id = $_POST['id'];
		$hapus = Kendalibloksistem::model()->deleteByPk($id);
		if ($hapus) {
			echo "success";
		}
		else echo "failed";
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