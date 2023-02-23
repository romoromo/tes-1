<?php

class PejabatController extends Controller
{
	public function actionIndex()
	{
		Yii::import('ext.DBFetch');
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;

		$select = 'count(tblpejabat_id)';
		$from = 'tblpejabat r';
		$otherquery = array(
			
		);
		$data['total_data'] = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery, 'mode'=>'SCALAR'));
		$data['list_jabatan'] = DBFetch::query(array('select'=>'','from'=>'refjabatan','mode'=>'LIST'));
		

		$this->renderPartial('index', array('data' => $data));
	}

	public function actiongetData()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = (int) ($_POST['id']);
		$model = Tblpejabat::model()->findByPk($id);
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

		$model->tblpejabat_nama = trim($_REQUEST['param']['tblpejabat_nama']);
		$model->tblpejabat_nip = trim($_REQUEST['param']['tblpejabat_nip']);
		$model->refjabatan_id = (int)($_REQUEST['param']['refjabatan_id']);
		$model->tblpejabat_jabatan = trim($_REQUEST['param']['tblpejabat_jabatan']);
		$model->tblpejabat_golongan = trim($_REQUEST['param']['tblpejabat_golongan']);
		
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
		$from = 'tblpejabat r';
		$otherquery = array(
			'leftjoin_jabtn' => array('refjabatan','r.refjabatan_id=refjabatan.refjabatan_id')
			,'limit' => DTPipeLine::getRows()
			,'offset' => DTPipeLine::getStart()
		);
		$filter = array(
			'LK__tblpejabat_nama' => DTPipeLine::getSearch()
			,'LK__tblpejabat_nip' => DTPipeLine::getSearch()
			,'LK__tblpejabat_pejabat' => DTPipeLine::getSearch()
			,'LK__tblpejabat_golongan' => DTPipeLine::getSearch()
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

		$select = 'count(tblpejabat_id)';
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