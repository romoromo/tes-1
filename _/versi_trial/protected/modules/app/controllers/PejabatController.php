<?php

class PejabatController extends Controller
{
	public function actionIndex()
	{
		Yii::import('ext.DBFetch');
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;

		$select = 'count(TBLPEJABAT_ID)';
		$from = 'TBLPEJABAT r';
		$otherquery = array(
			
		);
		$data['total_data'] = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery, 'mode'=>'SCALAR'));
		$otherquery2 = array(
			'order' => 'REFJABATAN_ID'
		);
		$data['list_jabatan'] = DBFetch::query(array('select'=>'','otherquery'=>$otherquery2,'from'=>'REFJABATAN','mode'=>'LIST'));
		

		$this->renderPartial('index', array('data' => $data));
	}

	public function actiongetData()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = (int) ($_POST['id']);
		$model = Yii::app()->db->createCommand("SELECT * FROM TBLPEJABAT WHERE TBLPEJABAT_ID = '".$id."' ORDER BY REFJABATAN_ID ASC")->queryRow();
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
			$model = new Tblpejabat;
			
		}
		elseif($cmd=="edit") {
			$id = trim($_REQUEST['id']);
			$model = Tblpejabat::model()->findByPk($id);
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}

		$model->TBLPEJABAT_NAMA = trim($_REQUEST['param']['TBLPEJABAT_NAMA']);
		$model->TBLPEJABAT_NIP = trim($_REQUEST['param']['TBLPEJABAT_NIP']);
		$model->REFJABATAN_ID = (int)($_REQUEST['param']['REFJABATAN_ID']);
		$model->TBLPEJABAT_URAIAN = trim($_REQUEST['param']['TBLPEJABAT_URAIAN']);
		
		if ($model->save()) {
			echo "success";
		}
		else {
			echo "failed";
			var_dump($model->errors);
		}
	}

	public function actionHapus()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = (int) ($_POST['id']);
		$model = Tblpejabat::model()->findByPk($id);
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
		$from = 'TBLPEJABAT';
		$otherquery = array(
			'leftjoin_jabtn' => array('REFJABATAN','TBLPEJABAT.REFJABATAN_ID=REFJABATAN.REFJABATAN_ID')
			,'limit' => DTPipeLine::getRows()
			,'offset' => DTPipeLine::getStart()
			,'order' => 'TBLPEJABAT.REFJABATAN_ID'
		);
		$filter = array(
			'LK__tblpejabat_nama' => DTPipeLine::getSearch()
			,'LK__tblpejabat_nip' => DTPipeLine::getSearch(), 'LK__tblpejabat_uraian' => DTPipeLine::getSearch()
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

		$select = 'count(TBLPEJABAT_ID)';
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