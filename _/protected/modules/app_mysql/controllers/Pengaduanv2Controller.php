<?php

class Pengaduanv2Controller extends Controller
{
	public function actionIndex()
	{
		$data['tindaklanjut'] = TindakLanjut::model()->findAll('tblpengaduan_id=:idpengaduan', array(':idpengaduan'=>1));
		$data['komentar'] = Komentar::model()->findAll('tblpengaduan_id=:idpengaduan', array(':idpengaduan'=>1));
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actiongetTablePengaduan()
	{
		$data['pengaduan'] = Pengaduan::model()->findAll();
		$this->renderPartial('tabelPengaduan', array('data'=>$data));
	}

	/*public function actiongetDetail()
	{
		$id = $_REQUEST['id'];
		$model = Pengaduan::model()->findByPk($id);
		
		echo CJSON::encode($model);
	}*/

	public function actiongetDetail()
	{
		$id = $_POST['id'];
		$data['pengaduan'] = Pengaduan::model()->findByPk($id);
		$data['tindaklanjut'] = TindakLanjut::model()->findAll('tblpengaduan_id=:idpengaduan', array(':idpengaduan'=>$id));
		$data['komentar'] = Komentar::model()->findAll('tblpengaduan_id=:idpengaduan', array(':idpengaduan'=>$id));
		$this->renderPartial('modalPengaduan', array('data'=>$data));
	}

	public function actionsimpanTanggapan()
	{
		$id = $_POST['id'];
		$isi = $_POST['isi'];
		$model = new TindakLanjut;
		$model->tblpengaduan_id = $id;
		$model->tbltindaklanjut_isi = $isi;
		$model->tbltindaklanjut_ispublikasi = "T";
		$model->tbltindaklanjut_tanggal = date('Y-m-d H:i:s');
		if ($model->save()) {
			echo 'success';
		}
	}

	public function actionsimpanKomentar()
	{
		$id = $_POST['id'];
		$isi = $_POST['isi'];
		$model = new Komentar;
		$model->tblkomentar_nama = "Superadmin";
		$model->tblpengaduan_id = $id;
		$model->tblkomentar_isi = $isi;
		$model->tblkomentar_tanggal = date('Y-m-d H:i:s');
		$model->tblkomentar_isaktif = "T";
		if ($model->save()) {
			echo 'success';
		}
	}

	public function actionsimpanStatus()
	{
		$id = $_POST['id'];
		$status = $_POST['status'];
		$model	= Pengaduan::model()->findByPk($id);
		$model->tblpengaduan_status = $status;
		if ($model->save()) {
			echo 'success';
		}
	}

	public function actionsimpanStatusKomentar()
	{
		$id = $_POST['id'];
		$status = $_POST['status'];
		$model	= Komentar::model()->findByPk($id);
		$model->tblkomentar_isaktif = $status;
		if ($model->save()) {
			echo 'success';
		}
	}

	public function actionhapusTindaklanjut()
	{
		$id = $_POST['id'];
		$hapus	= TindakLanjut::model()->findByPk($id);
		if ($hapus->delete()) {
			echo 'success';
		}
	}

	public function actionhapusKomentar()
	{
		$id = $_POST['id'];
		$hapus	= Komentar::model()->findByPk($id);
		if ($hapus->delete()) {
			echo 'success';
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