<?php

class Pendaftaran_baruController extends Controller
{
	public function actionIndex()
	{
		$data['kecamatan'] = Kecamatan::model()->findAll();
		$data['kelurahan'] = Kelurahan::model()->findAll();
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionSimpanData()
	{
		$cmd = trim($_POST['cmd']);
		if ($cmd=='tambah') {
			$model = new Tnpwpddaftar;
			$model->tnpwpddaftar_id = "";
		}else{
			$id = trim($_POST['id']);
			$model = Tnpwpddaftar::model()->findByPk($id);
		}
		
		// $model->tnpwpddaftar_npwpd = trim(str_replace('-', '', $_POST['tnpwpddaftar_npwpd']));
		$model->tnpwpddaftar_bumerk = trim($_POST['tnpwpddaftar_bumerk']);
		$model->tnpwpddaftar_bunik = trim(str_replace('.', '', $_POST['tnpwpddaftar_bunik']));
		$model->tnpwpddaftar_bunpwp = trim(str_replace('.','-', '', $_POST['tnpwpddaftar_bunpwp']));
		$model->tnpwpddaftar_buhp = trim($_POST['tnpwpddaftar_buhp']);

		$model->tnpwpddaftar_bujalan = trim($_POST['tnpwpddaftar_bujalan']);
		// $model->tnpwpddaftar_kabkota = trim($_POST['tnpwpddaftar_kabkota']);
		$model->tnpwpddaftar_burtrwrk = trim($_POST['tnpwpddaftar_burtrwrk']);
		$model->tnpwpddaftar_butelp = trim($_POST['tnpwpddaftar_butelp']);
		
		$model->tnpwpddaftar_bukodepos = trim($_POST['tnpwpddaftar_bukodepos']);

		$model->tnpwpddaftar_miliknama = trim($_POST['tnpwpddaftar_miliknama']);
		$model->tnpwpddaftar_nik = trim(str_replace('.', '', $_POST['tnpwpddaftar_nik']));
		$model->tnpwpddaftar_npwp = trim(str_replace('.','-', '', $_POST['tnpwpddaftar_npwp']));
		
		$model->tnpwpddaftar_milikkabkota = trim($_POST['tnpwpddaftar_milikkabkota']);
		$model->tnpwpddaftar_bunoakta = trim($_POST['tnpwpddaftar_bunoakta']);

		// $model->tpajakhotel_tglditerima = date('Y-m-d', strtotime(trim($_POST['tpajakhotel_tglditerima'])));
		// $model->tpajakhotel_isubah = "";
		// $model->tpajakhotel_omzetkamar = trim($_POST['omset_kamarhotel']);
		// $model->tpajakhotel_omzetpenunjang = trim($_POST['omset_fasilitaspenunjang']);
		// $model->tpajakhotel_omzetkos = trim($_POST['omset_kamarkos']);
		// $model->tpajakhotel_omzetjumlah = trim($_POST['omset_jumlah']);
		// $model->tpajakhotel_service = trim($_POST['omset_servis']);
		// $model->tpajakhotel_jmltotal = trim($_POST['omset_jumlahtotal']);
		// $model->tpajakhotel_tarif = trim($_POST['pajak_terutang']);
		// $model->tpajakhotel_dibayar = trim($_POST['pajak_sudahdibayar']);
		// $model->tpajakhotel_tglbuat = "";
		// $model->tpajakhotel_tglteliti = date('Y-m-d', strtotime(trim($_POST['penelitian_diterimatgl'])));
		// $model->tpajakhotel_namateliti = trim($_POST['penelitian_namapetugas']);
		// $model->tpajakhotel_nipteliti = trim(str_replace('-', '', $_POST['penelitian_nip']));
		// $model->tpajakhotel_nosptpd = trim($_POST['tt_no_sptpd']);
		// $model->tpajakhotel_tglsptpd = date('Y-m-d', strtotime(trim($_POST['tt_tanggal'])));
		// $model->tpajakhotel_penerima = trim($_POST['tt_yang_menerima']);
		// $model->refgolhotel_id = "";
		// $model->tpajakhotel_istelp = "";
		// $model->tpajakhotel_omzettelp = "";
		// $model->tpajakhotel_isinternet = "";
		// $model->tpajakhotel_omzetinternet = "";
		// $model->tpajakhotel_isfotocopy = "";
		// $model->tpajakhotel_omzetfotocopy = "";
		// $model->tpajakhotel_islaundry = "";
		// $model->tpajakhotel_omzetlaundry = "";
		// $model->tpajakhotel_iswisata = "";
		// $model->tpajakhotel_omzetwisata = "";
		// $model->tpajakhotel_isfood = "";
		// $model->tpajakhotel_omzetfood = "";
		// $model->tpajakhotel_issewaruang = "";
		// $model->tpajakhotel_omzetsewaruang = "";
		// $model->tpajakhotel_issport = "";
		// $model->tpajakhotel_omzetsport = "";
		// $model->tpajakhotel_ishiburan = "";
		// $model->tpajakhotel_omzethiburan = "";
		// $model->tpajakhotel_islain = "";
		// $model->tpajakhotel_omzetlain = "";
		// $model->tpajakhotel_jumlahfas = "";
		$model->tblpengguna_id = Yii::app()->user->getId();
		if ($model->save()) {
			echo CJSON::encode(array('pesan'=>'success'));
		}else{
			print_r($model);
			echo CJSON::encode(array('pesan'=>'failed'));
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