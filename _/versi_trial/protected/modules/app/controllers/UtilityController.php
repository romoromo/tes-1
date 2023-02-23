<?php

class UtilityController extends Controller
{
	public function actionIndex()
	{
		$data = Pengguna::model()->findByPk(Yii::app()->user->getId());
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionGantiPass()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = Yii::app()->user->getId();

		$model = Pengguna::model()->findByPk($id);
		// print_r($model);die();
		if (md5(trim($_POST['passlama']))==$model->TBLPENGGUNA_PASSWORD) {
			$model->TBLPENGGUNA_PASSWORD = md5(trim($_POST['pass']));
			// $model->TBLPENGGUNA_MODIFIED = new CDbExpression("to_date(".date('Y-m-d H:i:s').",'yyyy-mm-dd H:i:s')");
			if($model->save()) {
				echo "success";
			}
			else {
				echo "fail";
			}
			//print_r($model);
		}
	}

	public function actionGantiUname()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = Yii::app()->user->getId();

		$model = Pengguna::model()->findByPk($id);

		$model->TBLPENGGUNA_NAMA = trim($_POST['nama']);
		$model->TBLPENGGUNA_USERNAME = trim($_POST['username']);
		$model->TBLPENGGUNA_EMAIL = trim($_POST['email']);
		if($model->save()) {
			echo "success";
			// print_r($model->errors);
		}
		else {
			echo "fail";
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