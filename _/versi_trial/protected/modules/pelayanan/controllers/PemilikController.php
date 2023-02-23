<?php

class PemilikController extends Controller
{
	public function actionIndex()
	{
		echo "Hello";
		// $this->renderPartial('index');
	}

	public function actiongetData()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$id = (int) base64_decode( base64_decode( $_REQUEST['id'] ) );
		$model = TSUBYEK::model()->findByPk($id);

		$data = array();
		$hidden = array(); // daftar kolom yang ingin dihidden/tidak ditampilkan
		foreach ($model as $key => $value) {
			if( !in_array( $key, $hidden) ) {
				$data[$key] = $value;
			}
		}
		echo CJSON::encode($data);

	}

}