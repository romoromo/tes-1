<?php

class PenggunaController extends Controller
{
	public function actionIndex()
	{
		Yii::import('ext.DBFetch');
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['role_list'] = Tblrole::model()->findAll(array('order'=>'tblrole_code ASC'));
		/*$data['bloksistem'] = Kendalibloksistem::model()->findAll(array('order'=>'tblkendalibloksistem_nama ASC'));
		$data['antrian_group'] = AntrianGroup::model()->findAll(array('order'=>'tblantriangroup_nama ASC','condition'=>'tblantriangroup_isaktif="T"'));*/

		$select = 'count(tblpengguna_id)';
		$from = 'tblpengguna p';
		$otherquery = array(
			'join_role' => array('tblrole r','r.tblrole_id=p.tblrole_id')
		);
		$data['total_data'] = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery, 'mode'=>'SCALAR'));
		

		$this->renderPartial('index', array('data' => $data));
	}

	public function actionreloadData()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['data_pengguna'] = Yii::app()->db->createCommand()
		->select()
		->from('tblpengguna p')
		->join('tblrole r', 'r.tblrole_id=p.tblrole_id')
		->order('tblpengguna_nama ASC')
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
		
		if (Yii::app()->user->isGuest) {
		    echo "anda tidak berhak";
			Yii::app()->end();
			}

		if ($cmd=="tambah") {
			$model = new Tblpengguna;
			$model->tblpengguna_created = "now()";
			$model->tblpengguna_password = md5(trim($_REQUEST['param']['tblpengguna_password']));
			$model->tblpengguna_foto = "foto.jpg";
			
		}
		elseif($cmd=="edit") {
			$id = trim($_REQUEST['id']);
			$model = Pengguna::model()->findByPk($id);
			$model->tblpengguna_modified = "now()";

			if (trim($_REQUEST['param']['tblpengguna_password']) != "") {
				$model->tblpengguna_password = md5(trim($_REQUEST['param']['tblpengguna_password']));
			}
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}

		$model->tblpengguna_nama = trim($_REQUEST['param']['tblpengguna_nama']);
		$model->tblpengguna_username = trim($_REQUEST['param']['tblpengguna_username']);
		$model->tblpengguna_email = trim($_REQUEST['param']['tblpengguna_email']);
		$model->tblpengguna_notelp = trim($_REQUEST['param']['tblpengguna_notelp']);
		$model->tblrole_id = intval($_REQUEST['param']['tblrole_id']);
		$model->tblpengguna_status = trim ($_REQUEST['param']['tblpengguna_status']);
		// $model->tblkendalibloksistem_id = (int) $_REQUEST['param']['tblkendalibloksistem_id'];
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

	public function actionDTJSON()
	{
		Yii::import('ext.DTPipeLine');
		Yii::import('ext.DBFetch');

		$select = 'tblpengguna_id, tblpengguna_nama,tblpengguna_username,tblrole_code,tblpengguna_email,tblpengguna_notelp,tblpengguna_status';
		$from = 'tblpengguna p';
		$otherquery = array(
			'join_role' => array('tblrole r','r.tblrole_id=p.tblrole_id')
			,'limit' => DTPipeLine::getRows()
			,'offset' => DTPipeLine::getStart()
		);
		$filter = array(
			'LK__tblpengguna_nama' => DTPipeLine::getSearch()
			,'LK__tblpengguna_username' => DTPipeLine::getSearch()
			,'LK__tblpengguna_email' => DTPipeLine::getSearch()
			,'LK__tblpengguna_notelp' => DTPipeLine::getSearch()
			,'LK__tblrole_code' => DTPipeLine::getSearch()
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

		$select = 'count(tblpengguna_id)';
		$otherquery = array(
			'join_role' => array('tblrole r','r.tblrole_id=p.tblrole_id')
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

	public function actionCekUsername()
	{
		$uname = $_POST['uname'];
		$penggunanById = Tblpengguna::model()->find('tblpengguna_username=:user_name', array(':user_name'=>$uname));
		if ($penggunanById) {
			echo "exist";
		} else {
			echo "OK";
		}
	}
}