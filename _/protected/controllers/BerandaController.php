<?php

class BerandaController extends Controller
{
	public function actionIndex()
	{
		$data_pengaduan = Pengaduan::model()->findAll('tblpengaduan_status=:stat', array(':stat'=>'T'));
		//$data_tindaklanjut = TindakLanjut::model()->findAll('tblpengaduan_id=:ide AND tbltindaklanjut_ispublikasi=:stat', array(':ide'=>1, ':stat'=>'T'));
		//$data_komentar = Komentar::model()->findAll('tblpengaduan_id=:kom AND tblkomentar_isaktif=:stat', array(':kom'=>1, ':stat'=>'T'));
		$this->renderPartial('index',array('data_pengaduan'=>$data_pengaduan));
	}

	public function actionkirimKomentar()
	{
		$id = $_POST['id'];
		$komentar = $_POST['komentar'];
		$model = new Komentar;
		$model->tblkomentar_nama="Tamu";
		$model->tblpengaduan_id=$id;
		$model->tblkomentar_isi=$komentar;
		$model->tblkomentar_tanggal=date('Y-m-d H:i:s');
		$model->tblkomentar_isaktif="F";

		if ($model->save()) {
				echo "success";
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