<?php

class Wp_badanController extends Controller
{
	public function actionIndex()
	{
		$data['provinsi'] = TBLPROVINSI::model()->findAll();
		$data['kec'] = Yii::app()->db->createCommand("SELECT * FROM REFKECAMATAN")
		->queryAll();
		// $data['last_nopok'] = Yii::app()->db->createCommand("SELECT max(TBLDAFTAR_NOPOK)+1 FROM TBLDAFTAR")->queryScalar();
		// $data['last_nopok'] = '';
		$data['last_nopok'] = Yii::app()->db->createCommand("SELECT NVL(MAX(TBLDAFTAR_NOPOK),0)+1 AS last FROM TBLDAFTAR WHERE
			TBLDAFTAR_NOPOK < 50000 ")->queryScalar();
		// $data['kec'] = Kecamatan::model()->findAll();

		$this->renderPartial('index', array('data'=>$data));
	}

	public function actiongetKelurahan()
	{
		$kec = $_REQUEST['value'];

		$kelurahan = Yii::app()->db->createCommand("
		SELECT *
		FROM
		REFKELURAHAN
		WHERE
			REFKECAMATAN_ID =".$kec)
		->queryAll();

			echo '<option value="">== Silahkan Pilih Kelurahan ==</option>';
		foreach ($kelurahan as $kel) {
			echo '<option value="'.$kel['REFKELURAHAN_ID'].'">'.$kel['REFKELURAHAN_NAMA'].'</option>';
		}

	}

	public function actiongetKodepos()
	{
		$kel = $_REQUEST['value'];

		$kelurahan = Yii::app()->db->createCommand("
		SELECT REFKELURAHAN_KODEPOS
		FROM
		REFKELURAHAN
		WHERE
			REFKELURAHAN_ID =".$kel)
		->queryRow();

		echo CJSON::encode(array('kodepos'=>$kelurahan['REFKELURAHAN_KODEPOS']));
	}

	public function actiongetKodepos2()
	{
		$kel = $_REQUEST['value'];

		$kelurahan = Yii::app()->db->createCommand("
		SELECT REFKELURAHAN_KODEPOS
		FROM
		REFKELURAHAN
		WHERE
			REFKELURAHAN_ID =".$kel)
		->queryRow();

		echo CJSON::encode(array('kodepos'=>$kelurahan['REFKELURAHAN_KODEPOS']));
	}

	public function actiongetKelurahan2()
	{
		$kec = $_REQUEST['value'];

		$kelurahan = Yii::app()->db->createCommand("
		SELECT *
		FROM
		REFKELURAHAN
		WHERE
			REFKECAMATAN_ID =".$kec)
		->queryAll();

			echo '<option value="">== Silahkan Pilih Kelurahan ==</option>';
		foreach ($kelurahan as $kel) {
			echo '<option value="'.$kel['REFKELURAHAN_ID'].'">'.$kel['REFKELURAHAN_NAMA'].'</option>';
		}

	}

	public function actionsetRekening()
	{
		$idgol = (int)$_REQUEST['value'];

		$rekening = Yii::app()->db->createCommand("
		SELECT *
		FROM
		REFBADANUSAHA
		WHERE
			REFBADANUSAHA_GOLONGAN = ".$idgol)
		->queryAll();

		if ($idgol == 4) {

			$rekening = Yii::app()->db->createCommand("
			SELECT *
			FROM
			REFBADANUSAHA
			WHERE
				REFBADANUSAHA_REKAYAT = 3")
			->queryAll();
		}

			echo '<option value="">== Silahkan Pilih Rekening ==</option>';
		foreach ($rekening as $rek) {
			echo '<option value="'.$rek['REFBADANUSAHA_ID'].'">'.$rek['REFBADANUSAHA_ID'].' | '.$rek['REFBADANUSAHA_NAMA'].'</option>';
		}
		
		// print_r($rekening);

	}

	public function actionSimpanPendaftaran()
	{
		Yii::import('ext.LokalIndonesia');

		$data['PARAM'] = $PARAM = $_REQUEST['param'];
		
		$TBLDAFTAR_TANGGALKUKUH = isset($PARAM['TBLDAFTAR_TANGGALKUKUH']) && !empty($PARAM['TBLDAFTAR_TANGGALKUKUH']) ? $PARAM['TBLDAFTAR_TANGGALKUKUH'] : '';
		$TBLDAFTAR_TANGGALTERIMADAFTAR = isset($PARAM['TBLDAFTAR_TANGGALTERIMADAFTAR']) && !empty($PARAM['TBLDAFTAR_TANGGALTERIMADAFTAR']) ? $PARAM['TBLDAFTAR_TANGGALTERIMADAFTAR'] : '';
		$TBLDAFTAR_TANGGALENTRYDAFTAR = isset($PARAM['TBLDAFTAR_TANGGALENTRYDAFTAR']) && !empty($PARAM['TBLDAFTAR_TANGGALENTRYDAFTAR']) ? $PARAM['TBLDAFTAR_TANGGALENTRYDAFTAR'] : '';
		
		$exp_TGLKUKUH = explode('-', $TBLDAFTAR_TANGGALKUKUH);
		$exp_TGLTERIMADAFTAR = explode('-', $TBLDAFTAR_TANGGALTERIMADAFTAR);
		$exp_TGLENTRYDAFTAR = explode('-', $TBLDAFTAR_TANGGALENTRYDAFTAR);

		if (substr($PARAM['TBLDAFTAR_PEMILIKKOTA'],0,4)=='KOTA') {
			$PEMILIKKOTA = substr($PARAM['TBLDAFTAR_PEMILIKKOTA'],4);
		} else if (substr($PARAM['TBLDAFTAR_PEMILIKKOTA'],0,9)=='KABUPATEN') {
			$PEMILIKKOTA = substr($PARAM['TBLDAFTAR_PEMILIKKOTA'],9);
		} else {
			$PEMILIKKOTA = $PARAM['TBLDAFTAR_PEMILIKKOTA'];
		}

		$insert = Yii::app()->db->createCommand();
		$arrayData = array(
			'TBLDAFTAR_NOPOK' => $PARAM['TBLDAFTAR_NOPOK'],
			'TBLDAFTAR_JENISPENDAPATAN' => $PARAM['TBLDAFTAR_JENISPENDAPATAN'],
			'TBLDAFTAR_GOLONGAN' => $PARAM['TBLDAFTAR_GOLONGAN'],
			'TBLDAFTAR_NOFORMULIR' => $PARAM['TBLDAFTAR_NOFORMULIR'],
			'TBLDAFTAR_PEMILIKNAMA' => $PARAM['TBLDAFTAR_PEMILIKNAMA'],
			'TBLDAFTAR_PEMILIKALAMAT' => $PARAM['TBLDAFTAR_PEMILIKALAMAT'],
			'TBLDAFTAR_PEMILIKRTRW' => $PARAM['TBLDAFTAR_PEMILIKRTRW'],
			'TBLDAFTAR_PEMILIKTELP' => $PARAM['TBLDAFTAR_PEMILIKTELP'],
			'TBLDAFTAR_EMAIL' => $PARAM['TBLDAFTAR_EMAIL'],

			'TBLKECAMATAN_IDPEMILIK' => isset($_REQUEST['kodekec']) && !empty($_REQUEST['kodekec']) ? (int)$_REQUEST['kodekec'] : 0,
			'TBLKELURAHAN_IDPEMILIK' => isset($_REQUEST['kodekel']) && !empty($_REQUEST['kodekel']) ? (int)$_REQUEST['kodekel'] : 0,

			'TBLDAFTAR_PEMILIKKODEPOS' => $PARAM['TSUBYEK_BUKODEPOS'],
			'TBLDAFTAR_PEMILIKKOTA' => $PEMILIKKOTA,
			'TBLDAFTAR_BADANUSAHANAMA' => $PARAM['TBLDAFTAR_BADANUSAHANAMA'],
			'TBLDAFTAR_BADANUSAHAALAMAT' => $PARAM['TBLDAFTAR_BADANUSAHAALAMAT'],
			'TBLDAFTAR_BADANUSAHARTRW' => $PARAM['TBLDAFTAR_BADANUSAHARTRW'],
			'TBLDAFTAR_BADANUSAHATELPAREA' => $PARAM['TBLDAFTAR_BADANUSAHATELPAREA'],

			'TBLKECAMATAN_IDBADANUSAHA' => isset($_REQUEST['kodekec_bu']) && !empty($_REQUEST['kodekec_bu']) ? (int)$_REQUEST['kodekec_bu'] : 0,
			'TBLKELURAHAN_IDBADANUSAHA' => isset($_REQUEST['kodekel_bu']) && !empty($_REQUEST['kodekel_bu']) ? (int)$_REQUEST['kodekel_bu'] : 0,
			//'TBLKECAMATAN_IDBADANUSAHA' => $PARAM['TBLKECAMATAN_IDBADANUSAHA'],
			//'TBLKELURAHAN_IDBADANUSAHA' => $PARAM['TBLKELURAHAN_IDBADANUSAHA'],
			
			'TBLDAFTAR_BADANUSAHAKODEPOS' => $PARAM['TBLDAFTAR_BADANUSAHAKODEPOS'],
			//'TBLKELURAHAN_IDBADANUSAHA' => $PARAM['TBLKELURAHAN_IDBADANUSAHA'],
			'REFBADANUSAHA_IDBADANUSAHA' => $PARAM['REFBADANUSAHA_IDBADANUSAHA'],
			'TBLDAFTAR_BADANUSAHAKOTA' => $PARAM['TBLDAFTAR_BADANUSAHAKOTA'],
			'TBLDAFTAR_TANGGALTERIMADAFTAR' => $PARAM['TBLDAFTAR_TANGGALTERIMADAFTAR'],
			
			'TBLDAFTAR_NOKUKUH' => $PARAM['TBLDAFTAR_NOKUKUH'],
			'TBLDAFTAR_TANGGALKUKUH' => $exp_TGLKUKUH[0],
			'TBLDAFTAR_BULANKUKUH' => $exp_TGLKUKUH[1],
			'TBLDAFTAR_TAHUNKUKUH' => substr($exp_TGLKUKUH[2], -2),

			'TBLDAFTAR_TANGGALTERIMADAFTAR' => $exp_TGLTERIMADAFTAR[0],
			'TBLDAFTAR_BULANTERIMADAFTAR' => $exp_TGLTERIMADAFTAR[1],
			'TBLDAFTAR_TAHUNTERIMADAFTAR' => substr($exp_TGLTERIMADAFTAR[2], -2),

			'TBLDAFTAR_TANGGALENTRYDAFTAR' => $exp_TGLENTRYDAFTAR[0],
			'TBLDAFTAR_BULANENTRYDAFTAR' => $exp_TGLENTRYDAFTAR[1],
			'TBLDAFTAR_TAHUNENTRYDAFTAR' => substr($exp_TGLENTRYDAFTAR[2], -2),
			
			'TBLDAFTAR_ISJENISPENDAFTARAN' => $PARAM['TBLDAFTAR_ISJENISPENDAFTARAN'],

			'TBLDAFTAR_ISAKTIF' => 'Y',

			'TBLPROVINSI_KODE' => $PARAM['TBLPROVINSI_KODE'],
			'TBLKABUPATEN_KODE' => $PARAM['TBLKABUPATEN_KODE'],
			'TBLKECAMATAN_KODE' => $PARAM['TBLKECAMATAN_KODE'],
			'TBLKELURAHAN_KODE' => $PARAM['TBLKELURAHAN_KODE'],

			'TBLPROVINSI_KODEBU' => $PARAM['TBLPROVINSI_KODEBADANUSAHA'],
			'TBLKABUPATEN_KODEBU' => $PARAM['TBLKABUPATEN_KODEBADANUSAHA'],
			'TBLKECAMATAN_KODEBU' => $PARAM['TBLKECAMATAN_KODEBADANUSAHA'],
			'TBLKELURAHAN_KODEBU' => $PARAM['TBLKELURAHAN_KODEBADANUSAHA'],
			'TBLDAFTAR_NIB' => $PARAM['TBLDAFTAR_NIB'],
			'TBLDAFTAR_NIK' => $PARAM['TBLDAFTAR_NIK'],
		);
		// echo CJSON::encode($arrayData);Yii::app()->end();
		$simpan = $insert->insert('TBLDAFTAR', $arrayData);

		if ($simpan) {
			echo CJSON::encode(array('status'=>'success'));
		}
		else{
			echo CJSON::encode(array('status'=>'failed'));
		}
	}

	public function actionCekNoPok()
	{
		$nopok = (int)$_REQUEST['nopok'];
		$jml = Yii::app()->db->createCommand()->select('count(TBLDAFTAR_NOPOK)')
		->from('TBLDAFTAR')
		->where('TBLDAFTAR_NOPOK=:nopok', array(':nopok'=>$nopok))
		->queryScalar();
		if ($jml>0) {
			$stat = array('status'=>'exists');
		} else {
			$stat = array('status'=>'notexists');
		}

		echo CJSON::encode($stat);
	}
}