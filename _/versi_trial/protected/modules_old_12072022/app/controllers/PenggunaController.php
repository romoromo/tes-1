<?php

class PenggunaController extends Controller
{
	public function init()
	{
		Yii::import('ext.DMSec');
	}
	public function actionIndex()
	{
		Yii::import('ext.DBFetch');
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['role_list'] = Tblrole::model()->findAll(array('order'=>'TBLROLE_CODE ASC'));
		$data['bloksistem'] = Kendalibloksistem::model()->findAll(array('order'=>'TBLKENDALIBLOKSISTEM_NAMA ASC'));
		// $data['notaris'] = BPHTBNotaris::model()->findAll(array('order'=>'REFBPHTBNOTARIS_NAMA ASC'));
		/*
		$data['antrian_group'] = AntrianGroup::model()->findAll(array('order'=>'tblantriangroup_nama ASC','condition'=>'tblantriangroup_isaktif="T"'));*/

		$select = 'count(TBLPENGGUNA_ID)';
		$from = 'TBLPENGGUNA P';
		$otherquery = array(
			'join_role' => array('TBLROLE R','R.TBLROLE_ID=P.TBLROLE_ID')
		);
		$data['total_data'] = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery, 'mode'=>'SCALAR'));
		

		$this->renderPartial('index', array('data' => $data));
	}

	public function actionreloadData()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['data_pengguna'] = Yii::app()->db->createCommand()
		->select()
		->from('TBLPENGGUNA P')
		->join('TBLROLE R', 'R.TBLROLE_ID=P.TBLROLE_ID')
		->order('TBLPENGGUNA_NAMA ASC')
		->queryAll();
		

		$this->renderPartial('tbody', array('data' => $data));
	}

	public function actiongetData()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = (int) ($_POST['id']);
		$model = Pengguna::model()->findByPk($id);
		header('Content-type: text/json');
		header('Content-type: application/json');
		echo CJSON::encode($model);
	}

	public function actionSimpanPengguna()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim
		

		if ($cmd=="tambah") {
			$model = new Tblpengguna;
			$model->TBLPENGGUNA_ID = DMOrcl::getSequence('SEQ_TBLPENGGUNA');
			$model->TBLPENGGUNA_CREATED = DMOrcl::getNow();
			$model->TBLPENGGUNA_PASSWORD = md5(trim($_REQUEST['param']['TBLPENGGUNA_PASSWORD']));
			$model->TBLPENGGUNA_FOTO = "foto.png";
			
		}
		elseif($cmd=="edit") {
			$id = trim($_REQUEST['id']);
			$model = Pengguna::model()->findByPk($id);
			$model->TBLPENGGUNA_MODIFIED = DMOrcl::getNow();

			if (trim($_REQUEST['param']['TBLPENGGUNA_PASSWORD']) != "") {
				$model->TBLPENGGUNA_PASSWORD = md5(trim($_REQUEST['param']['TBLPENGGUNA_PASSWORD']));
			}
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}

		$model->TBLPENGGUNA_NAMA = trim($_REQUEST['param']['TBLPENGGUNA_NAMA']);
		$model->TBLPENGGUNA_USERNAME = trim($_REQUEST['param']['TBLPENGGUNA_USERNAME']);
		$model->TBLPENGGUNA_EMAIL = trim($_REQUEST['param']['TBLPENGGUNA_EMAIL']);
		$model->TBLPENGGUNA_NOTELP = trim($_REQUEST['param']['TBLPENGGUNA_NOTELP']);
		$model->TBLROLE_ID = intval($_REQUEST['param']['TBLROLE_ID']);
		$model->TBLPENGGUNA_STATUS = trim ($_REQUEST['param']['TBLPENGGUNA_STATUS']);
		// $model->TBLKENDALIBLOKSISTEM_ID = (int) $_REQUEST['param']['TBLKENDALIBLOKSISTEM_ID'];
		// $model->REFNOTARIS_ID = (int) $_REQUEST['param']['REFNOTARIS_ID'];
		// $model->tblantriangroup_id = (int) $_REQUEST['param']['tblantriangroup_id'];

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
		$model = Pengguna::model()->findByPk($id);
		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}

	public function actionDTJSONx()
	{
		Yii::import('ext.DTPipeLine');
		Yii::import('ext.DBFetch');

		$select = 'TBLPENGGUNA_ID, TBLPENGGUNA_NAMA,TBLPENGGUNA_USERNAME,TBLROLE_CODE,TBLPENGGUNA_EMAIL,TBLPENGGUNA_NOTELP,TBLPENGGUNA_STATUS';
		$from = 'TBLPENGGUNA P';
		$otherquery = array(
			'join_role' => array('TBLROLE R','R.TBLROLE_ID=p.TBLROLE_ID')
			,'limit' => DTPipeLine::getRows()
			,'offset' => DTPipeLine::getStart()
		);
		$filter = array(
			'LK__TBLPENGGUNA_NAMA' => DTPipeLine::getSearch()
			,'LK__TBLPENGGUNA_USERNAME' => DTPipeLine::getSearch()
			,'LK__TBLPENGGUNA_EMAIL' => DTPipeLine::getSearch()
			,'LK__TBLPENGGUNA_NOTELP' => DTPipeLine::getSearch()
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

		$select = 'count(TBLPENGGUNA_ID)';
		$otherquery = array(
			'join_role' => array('TBLROLE R','R.TBLROLE_ID=p.TBLROLE_ID')
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

	public function actionDTJSON()
	{
		Yii::import('ext.DTPipeLine');

		$select = 'TBLPENGGUNA_ID, TBLPENGGUNA_NAMA,TBLPENGGUNA_USERNAME,TBLROLE_CODE,TBLPENGGUNA_EMAIL,TBLPENGGUNA_NOTELP,TBLPENGGUNA_STATUS';
		$from = 'TBLPENGGUNA P';
		$otherquery = array(
			// 'join_role' => array('tblrole r','r.tblrole_id=p.tblrole_id')
			'leftjoin_role' => array('TBLROLE R','R.TBLROLE_ID=P.TBLROLE_ID')
			,'limit' => DTPipeLine::getRows()
			,'offset' => DTPipeLine::getStart()
			);
		$filter_AND = array();

		$filter = array(
			'LK__TBLPENGGUNA_NAMA' => DTPipeLine::getSearch()
			,'LK__TBLPENGGUNA_USERNAME' => DTPipeLine::getSearch()
			,'LK__TBLPENGGUNA_EMAIL' => DTPipeLine::getSearch()
			,'LK__TBLPENGGUNA_NOTELP' => DTPipeLine::getSearch()
			,'LK__TBLROLE_CODE' => DTPipeLine::getSearch()
		);


		if ( isset($_REQUEST['xupss']) && $_REQUEST['xupss']!='' && Tblrole::isRole('SUPERADMIN') ) {
			$oripass = DMSec::sdenc( $_REQUEST['xupss'] );

			$dec_pass = ( DMSec::sdenc($oripass) );
			$username = Yii::app()->user->username;
			$enc_pass = md5( ($dec_pass) );

			$pengguna = Pengguna::model()->find('TBLPENGGUNA_USERNAME=:username AND TBLPENGGUNA_PASSWORD=:pass', array(':username'=>$username,':pass'=>$enc_pass));

			if ( $pengguna ) {
				$select = 'TBLPENGGUNA_ID, TBLPENGGUNA_NAMA,TBLPENGGUNA_PASSWORD_,TBLPENGGUNA_USERNAME,TBLROLE_CODE,TBLPENGGUNA_EMAIL,TBLPENGGUNA_NOTELP,TBLPENGGUNA_STATUS';
				define('SHOW_PASS_ORIGINAL', true);
				
			}
		}

		$data = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery,'filter'=>$filter,'filterOR'=>true, 'mode'=>'LIST'));

		$results = array();
		$no = 1 + DTPipeLine::getStart(); // sesuaikan juga mulai offset ke berapa
		foreach ($data as $row) {

			if ( defined('SHOW_PASS_ORIGINAL') ) {
				$passwordAsli = DMSec::decrypt($row['TBLPENGGUNA_PASSWORD_'], Yii::app()->params['salt']);
				$row['TBLPENGGUNA_PASSWORD_'] = $passwordAsli;
			}
			$results[] = array_merge(
				array(
					'num'=>$no++,
				)
				, $row);
			// $results[] = $row;
		}

		$select = 'count(TBLPENGGUNA_ID)';
		$otherquery = array(
			'join_role' => array('TBLROLE R','R.TBLROLE_ID=P.TBLROLE_ID')
			);
		$dataTotal = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery, 'mode'=>'SCALAR'));

		unset($otherquery['limit']); //remove limit untuk mengakali filtered record

		$data_filtered = DBFetch::query(array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'filter_AND'=>$filter_AND,'filterOR'=>true, 'mode'=>'SCALAR'));

		echo DTPipeLine::generateJSON(
			array(
				'useJSONHeader' => true
				,'COLUMN_AS_KEY' => true
				,'DATA_FETCHED' => $results
				,'TOTAL_RECORDS' => (int) $dataTotal
				// ,'TOTAL_FILTERED_RECORDS' => DTPipeLine::getSearch()=='' ? (int)$dataTotal : (int)count($results)
				,'TOTAL_FILTERED_RECORDS' => ( DTPipeLine::getSearch()=='' && !DBFetch::isFilterAND($filter_AND) ) ? (int)$dataTotal : (int)($data_filtered)
				)
			);
	}

	public function actionCekUsername()
	{
		$uname = $_POST['uname'];
		$penggunanById = Tblpengguna::model()->find('TBLPENGGUNA_USERNAME=:user_name', array(':user_name'=>$uname));
		if ($penggunanById) {
			echo "exist";
		} else {
			echo "OK";
		}
	}

	public function actionisGrantToShowPass()
	{
		$pass = isset($_REQUEST['password']) && $_REQUEST['password']!='' ? $_REQUEST['password'] : "";
		if ( empty($pass) ) {
			echo CJSON::encode(array('status'=>'DENIED'));
			Yii::app()->end();
		}

		$dec_pass = ( DMSec::sdenc($pass) );
		$username = Yii::app()->user->username;
		$enc_pass = md5( ($dec_pass) );

		$pengguna = Pengguna::model()->find('TBLPENGGUNA_USERNAME=:username AND TBLPENGGUNA_PASSWORD=:pass', array(':username'=>$username,':pass'=>$enc_pass));

		if ( $pengguna ) {
			echo CJSON::encode(array('status'=>'GRANTED'));
		} else {
			echo CJSON::encode(array('status'=>'DENIED'));			
		}
	}
}
