<?php

class DashboardController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;

		$id = Yii::app()->user->role_id;
		$level = Yii::app()->db->createCommand('SELECT TBLROLE_ID, TBLROLE_CODE FROM TBLROLE WHERE TBLROLE_ID='.$id.'');
		$datalevel = $level->queryRow();

		$iduser = Yii::app()->user->getId();
		$datauser = Yii::app()->db->createCommand('SELECT 
			TBLROLE_ID,
			TBLPENGGUNA_NAMA AS NAMA,
			TBLPENGGUNA_USERNAME AS uname,
			TBLPENGGUNA_EMAIL AS EMAIL,
			TBLPENGGUNA_NOTELP AS TELP,
			TBLPENGGUNA_FOTO AS FOTO

			FROM TBLPENGGUNA 
			WHERE TBLROLE_ID='.$iduser.'');
		$user = $datauser->queryRow();

		$this->renderPartial('index', array('data'=>$data, 'level'=>$datalevel, 'pengguna'=>$user));
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