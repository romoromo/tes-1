<?php

class Entry_dataController extends Controller
{
	public function actionIndex()
	{
		$data['kecamatan'] = Kecamatan::model()->findAll();
		$data['kalurahan'] = Kelurahan::model()->findAll();
		$this->renderPartial('index', array('data'=>$data));
	}
	public function actionGetData()
	{
		$npwpd = trim(str_replace('-','', $_POST['npwpd']));
		$jmldata = Yii::app()->db->createCommand('SELECT COUNT(tpajakhotel_id) AS jml FROM tpajakhotel WHERE tnpwpddaftar_npwpd="'.$npwpd.'"')->queryScalar();
		$model = PajakHotel::model()->find('tnpwpddaftar_npwpd=:npwpd', array(':npwpd'=>$npwpd));
		$model_npwpd = Yii::app()->db->createCommand('SELECT * FROM tnpwpddaftar WHERE tnpwpddaftar_bunpwp="'.$npwpd.'"')->queryRow();
		if ($jmldata>0) {
			$data = array();
			$data['statusdata'] = 'ada';
			$data['idpajakhotel'] = $model['tpajakhotel_id'];
			$data['tpajakhotel_nomor'] = $model['tpajakhotel_nomor'];
			$data['tpajakhotel_mspajak'] = $model['tpajakhotel_mspajak'];
			$data['tpajakhotel_tahunpajak'] = $model['tpajakhotel_tahunpajak'];
			$data['tpajakhotel_tglditerima'] = $model['tpajakhotel_tglditerima'];
			$data['tnpwpddaftar_npwpd'] = $model['tnpwpddaftar_npwpd'];
			$data['nama_wajib_pajak'] = $model_npwpd['tnpwpddaftar_miliknama'];
			$data['nama_usaha'] = $model_npwpd['tnpwpddaftar_bumerk'];
			$data['alamat_usaha'] = $model_npwpd['tnpwpddaftar_bualamat'];
			$data['wp_kecamatan'] = $model_npwpd['tblkecamatan_id'];
			$data['wp_kelurahan'] = $model_npwpd['tblkelurahan_id'];
			$data['wp_telepon'] = $model_npwpd['tnpwpddaftar_butelp'];
			//$data['isperubahanidentitas'] = $model['isperubahanidentitas'];
			$data['omset_kamarhotel'] = $model['tpajakhotel_omzetkamar'];
			$data['omset_fasilitaspenunjang'] = $model['tpajakhotel_omzetpenunjang'];
			$data['omset_kamarkos'] = $model['tpajakhotel_omzetkos'];
			$data['omset_jumlah'] = $model['tpajakhotel_omzetjumlah'];
			$data['omset_servis'] = $model['tpajakhotel_service'];
			$data['omset_jumlahtotal'] = $model['tpajakhotel_jmltotal'];
			$data['pajak_terutang'] = $model['tpajakhotel_tarif'];
			$data['pajak_sudahdibayar'] = $model['tpajakhotel_dibayar'];
			$data['penelitian_diterimatgl'] = $model['tpajakhotel_tglteliti'];
			$data['penelitian_namapetugas'] = $model['tpajakhotel_namateliti'];
			$data['penelitian_nip'] = $model['tpajakhotel_nipteliti'];
			$data['tt_no_sptpd'] = $model['tpajakhotel_nosptpd'];
			//$data['tt_npwpd'] = $model['tt_npwpd'];
			//$data['tt_tempat'] = $model['tt_tempat'];
			//$data['tt_nama'] = $model['tt_nama'];
			$data['tt_tanggal'] = $model['tpajakhotel_tglsptpd'];
			//$data['tt_alamat'] = $model['tt_alamat'];
			$data['tt_yang_menerima'] = $model['tpajakhotel_penerima'];
			echo CJSON::encode($data);
		}else{
			echo CJSON::encode(array('statusdata'=>'tidak'));
		}
	}
	public function actionSimpanData()
	{
		$cmd = trim($_POST['cmd']);
		if ($cmd=='tambah') {
			$model = new PajakHotel;
			$model->tpajakhotel_id = "";
		}else{
			$id = trim($_POST['id']);
			$model = PajakHotel::model()->findByPk($id);
		}
		
		$model->tnpwpddaftar_npwpd = trim(str_replace('-', '', $_POST['tnpwpddaftar_npwpd']));
		$model->tpajakhotel_nomor = trim($_POST['tpajakhotel_nomor']);
		$model->tpajakhotel_mspajak = trim($_POST['tpajakhotel_mspajak']);
		$model->tpajakhotel_tahunpajak = trim($_POST['tpajakhotel_tahunpajak']);
		$model->tpajakhotel_tglditerima = date('Y-m-d', strtotime(trim($_POST['tpajakhotel_tglditerima'])));
		$model->tpajakhotel_isubah = "";
		$model->tpajakhotel_omzetkamar = trim($_POST['omset_kamarhotel']);
		$model->tpajakhotel_omzetpenunjang = trim($_POST['omset_fasilitaspenunjang']);
		$model->tpajakhotel_omzetkos = trim($_POST['omset_kamarkos']);
		$model->tpajakhotel_omzetjumlah = trim($_POST['omset_jumlah']);
		$model->tpajakhotel_service = trim($_POST['omset_servis']);
		$model->tpajakhotel_jmltotal = trim($_POST['omset_jumlahtotal']);
		$model->tpajakhotel_tarif = trim($_POST['pajak_terutang']);
		$model->tpajakhotel_dibayar = trim($_POST['pajak_sudahdibayar']);
		$model->tpajakhotel_tglbuat = "";
		$model->tpajakhotel_tglteliti = date('Y-m-d', strtotime(trim($_POST['penelitian_diterimatgl'])));
		$model->tpajakhotel_namateliti = trim($_POST['penelitian_namapetugas']);
		$model->tpajakhotel_nipteliti = trim(str_replace('-', '', $_POST['penelitian_nip']));
		$model->tpajakhotel_nosptpd = trim($_POST['tt_no_sptpd']);
		$model->tpajakhotel_tglsptpd = date('Y-m-d', strtotime(trim($_POST['tt_tanggal'])));
		$model->tpajakhotel_penerima = trim($_POST['tt_yang_menerima']);
		$model->refgolhotel_id = "";
		$model->tpajakhotel_istelp = "";
		$model->tpajakhotel_omzettelp = "";
		$model->tpajakhotel_isinternet = "";
		$model->tpajakhotel_omzetinternet = "";
		$model->tpajakhotel_isfotocopy = "";
		$model->tpajakhotel_omzetfotocopy = "";
		$model->tpajakhotel_islaundry = "";
		$model->tpajakhotel_omzetlaundry = "";
		$model->tpajakhotel_iswisata = "";
		$model->tpajakhotel_omzetwisata = "";
		$model->tpajakhotel_isfood = "";
		$model->tpajakhotel_omzetfood = "";
		$model->tpajakhotel_issewaruang = "";
		$model->tpajakhotel_omzetsewaruang = "";
		$model->tpajakhotel_issport = "";
		$model->tpajakhotel_omzetsport = "";
		$model->tpajakhotel_ishiburan = "";
		$model->tpajakhotel_omzethiburan = "";
		$model->tpajakhotel_islain = "";
		$model->tpajakhotel_omzetlain = "";
		$model->tpajakhotel_jumlahfas = "";
		$model->tblpengguna_id = Yii::app()->user->getId();
		$model->tpajakhotel_tglupdate = date('Y-m-d H:i:s');
		if ($model->save()) {
			echo CJSON::encode(array('pesan'=>'success'));
		}else{
			print_r($model);
			echo CJSON::encode(array('pesan'=>'failed'));
		}
	}
	public function actionsimpanobjekkamartemp()
	{
		$op_kamar_klaskamar = trim($_POST['op_kamar_klaskamar']);
		$op_kamar_jumlah = trim($_POST['op_kamar_jumlah']);
		$op_kamar_tarif = trim($_POST['op_kamar_tarif']);
		$op_kamar_diskon = trim($_POST['op_kamar_diskon']);
		$op_kamar_jmlkamar_terjual = trim($_POST['op_kamar_jmlkamar_terjual']);
		$op_kamar_omzet = trim($_POST['op_kamar_omzet']);

		$model = new PajakHotelKamarTemp;
		$model->tpajakhotelkamar_kelas = $op_kamar_klaskamar;
		$model->tpajakhotelkamar_jumlah = $op_kamar_jumlah;
		$model->tpajakhotelkamar_tarif = $op_kamar_tarif;
		$model->tpajakhotelkamar_diskon = $op_kamar_diskon;
		$model->tpajakhotelkamar_terjual = $op_kamar_jmlkamar_terjual;
		$model->tpajakhotelkamar_omzet = $op_kamar_omzet;
		if ($model->save()) {
			echo CJSON::encode(array('pesan'=>'success'));
		}else{
			echo CJSON::encode(array('pesan'=>'failed'));
		}
	}
	public function actionreloadobjekkamartemp()
	{
		$model = PajakHotelKamarTemp::model()->findAll();
		$this->renderPartial('tblpajakhotelkamar', array('model'=>$model));
	}
	public function actionhapusobjekkamartemp()
	{
		$model = PajakHotelKamarTemp::model()->findByPk(trim($_POST['id']));
		if ($model->delete()) {
			echo CJSON::encode(array('pesan'=>'success'));
		}else{
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