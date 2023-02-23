<?php

class GroupController extends Controller
{
	public function actionIndex()
	{
		Yii::import('ext.DBFetch');
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;

		$select = 'count(TBLROLE_ID)';
		$from = 'TBLROLE r';
		$otherquery = array(
			
		);
		$data['total_data'] = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery, 'mode'=>'SCALAR'));
		

		$this->renderPartial('index', array('data' => $data));
	}

	public function actiongetData()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = (int) ($_POST['id']);
		$model = Tblrole::model()->findByPk($id);
		header('Content-type: text/json');
		header('Content-type: application/json');
		echo CJSON::encode($model);
	}

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim
		

		if ($cmd=="tambah") {
			$model = new Tblrole;
			$model->TBLROLE_ID = Yii::app()->db->createCommand('SELECT MAX(TBLROLE_ID)+1 FROM TBLROLE')->queryScalar();
			
		}
		elseif($cmd=="edit") {
			$id = trim($_REQUEST['id']);
			$model = Tblrole::model()->findByPk($id);
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}

		$model->TBLROLE_CODE = trim($_REQUEST['param']['TBLROLE_CODE']);
		$model->TBLROLE_DESC = trim($_REQUEST['param']['TBLROLE_DESC']);
		
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
		$id = (int) ($_POST['id']);
		$model = Tblrole::model()->findByPk($id);
		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}

	public function actionDTJSON()
	{
		Yii::import('ext.DTPipeLine');
		Yii::import('ext.DBFetch');

		$select = '*';
		$from = 'TBLROLE r';
		$otherquery = array(
			'limit' => DTPipeLine::getRows()
			,'offset' => DTPipeLine::getStart()
		);
		$filter = array(
			'LK__TBLROLE_DESC' => DTPipeLine::getSearch()
			,'LK__TBLROLE_CODE' => DTPipeLine::getSearch()
		);

		$data = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery,'filter'=>$filter,'filterOR'=>true, 'mode'=>'LIST'));

		$results = array();
		$no = 1 + DTPipeLine::getStart(); // sesuaikan juga mulai offset ke berapa
		foreach ($data as $row) {
			$results[] = array_merge(
				array('num'=>$no++)
				, $row);
			// $results[] = $row;
		}

		$select = 'count(TBLROLE_ID)';
		$otherquery = array(
		);
		$dataTotal = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery, 'mode'=>'SCALAR'));

		echo DTPipeLine::generateJSON(
			array(
				'useJSONHeader' => true
				,'COLUMN_AS_KEY' => true
				,'DATA_FETCHED' => $results
				,'TOTAL_RECORDS' => (int) $dataTotal
				,'TOTAL_FILTERED_RECORDS' => DTPipeLine::getSearch()=='' ? (int)$dataTotal : (int)count($results)
			)
		);
	}
}