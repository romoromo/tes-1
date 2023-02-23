<?php

class ReftblskController extends Controller
{

	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;

			$model = Yii::app()->db->createCommand('SELECT
			tblskizin_tabelvariabel.tblskizin_tabelvariabel_id,
			tblskizin_tabelvariabel.tblskizin_tabelsk
			FROM
			tblskizin_tabelvariabel');

		$datatabel = $model->queryAll();
		$this->renderPartial('index', array(
			'datatabel'=>$datatabel
			));
	}

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$tabel_baru = 'tblsk_'.trim($_POST['tabel_baru']);

		$cek = Reftabelsk::model()->find('tblskizin_tabelsk=:tabel', array(':tabel'=>$tabel_baru));

		if (count($cek)==0) {
			$model = new Reftabelsk;
			$model->tblskizin_tabelvariabel_id = "";			
			$model->tblskizin_tabelsk = $tabel_baru;

			$c = Yii::app()->getDb()->createCommand();
			$buattabel = $c->createTable($tabel_baru, array($tabel_baru.'_id'=>'pk', 'tblizinpendaftaran_id'=>'integer'));


			if($model->save()) {
				if ($buattabel==0) {
					echo "success";
				}
			}
			else {
				echo "failed";
			}
		}
		else {
			echo "exist";
		}

		
	}

	public function actionSimpanField()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$c = Yii::app()->getDb()->createCommand();
		$tabel = trim($_POST['tabel']);
		$nama_field = trim($_POST['nama_field']);
		$nama_field_lama = trim($_POST['nama_field_lama']);
		$tipe_field = trim($_POST['tipe_field']);
		$panjang_field = trim($_POST['panjang_field']);
		$cmd = trim($_POST['cmd']);
		if ($cmd=='tambah') {
			switch ($tipe_field) {
				case 'integer':
					$tambah = $c->addColumn($tabel, $nama_field, $tipe_field.'('.$panjang_field.')');
					break;
				case 'float':
					$tambah = $c->addColumn($tabel, $nama_field, $tipe_field);
					break;
				case 'varchar':
					$tambah = $c->addColumn($tabel, $nama_field, $tipe_field.'('.$panjang_field.')');
					break;
				case 'text':
					$tambah = $c->addColumn($tabel, $nama_field, $tipe_field);
					break;
				case 'date':
					$tambah = $c->addColumn($tabel, $nama_field, $tipe_field);
					break;
				
				default:
					# code...
					break;
			}
			if ($tambah==0) {
				echo "success";
			}
			else {
				echo "failed";
			}
		}
		elseif ($cmd=='edit') {
			if ($nama_field<>$nama_field_lama) {
				$ubah_nama = $c->renameColumn($tabel, $nama_field_lama, $nama_field);
			}
			switch ($tipe_field) {
				case 'integer':
					$edit = $c->alterColumn($tabel, $nama_field, $tipe_field.'('.$panjang_field.')');
					break;
				case 'float':
					$edit = $c->alterColumn($tabel, $nama_field, $tipe_field);
					break;
				case 'varchar':
					$edit = $c->alterColumn($tabel, $nama_field, $tipe_field.'('.$panjang_field.')');
					break;
				case 'text':
					$edit = $c->alterColumn($tabel, $nama_field, $tipe_field);
					break;
				case 'date':
					$edit = $c->alterColumn($tabel, $nama_field, $tipe_field);
					break;
				
				default:
					# code...
					break;
			}
			if ($edit==0 || $ubah_nama==0) {
				echo "success";
			}
			else {
				echo "failed";
			}
		}
		else {
			echo "Invalid Command";
		}
	}

	public function actionHapusField()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$c = Yii::app()->getDb()->createCommand();
		$tabel = trim($_POST['tabel']);
		$nama_field = trim($_POST['nama_field']);

		$hapus = $c->dropColumn($tabel, $nama_field);
		if ($hapus==0) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}

	public function actionGetField()
	{
		$tabel = trim($_POST['tabel']);
		$data = Yii::app()->db->schema->getTable($tabel)->columns;
		$this->renderPartial('tbody', array('data'=>$data));
	}

	public function actionHapusTabel()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$tabel = trim($_POST['tabel']);
		$c = Yii::app()->getDb()->createCommand();

		$cari = Reftabelsk::model()->find('tblskizin_tabelsk=:tabel', array(':tabel'=>$tabel));
		$hapus = $c->dropTable($tabel);

		if ($cari->delete()) {
			if ($hapus==0) {
				echo "success";
			}
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