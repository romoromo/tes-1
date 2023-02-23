<?php

class Wp_pribadiController extends Controller
{
	public function actionIndex()
	{	
		$data['provinsi'] = TBLPROVINSI::model()->findAll();
		$data['kec'] = Yii::app()->db->createCommand("SELECT * FROM REFKECAMATAN")
		->queryAll();

		// $data['last_nopok'] = '';
		$data['last_nopok'] = Yii::app()->db->createCommand("SELECT NVL(MAX(TBLDAFTAR_NOPOK),0)+1 AS last FROM TBLDAFTAR WHERE
			TBLDAFTAR_NOPOK < 50000 ")->queryScalar();;

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

	public function actionsetRekening()
	{
		$idgol = $_REQUEST['value'];

		$rekening = Yii::app()->db->createCommand("
		SELECT *
		FROM
		REFBADANUSAHA
		WHERE
			REFBADANUSAHA_GOLONGAN = ".$idgol."
		ORDER BY REFBADANUSAHA_REKAYAT, REFBADANUSAHA_REKJENIS"
		)
		->queryAll();

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
			'TBLDAFTAR_PEMILIKKOTA' => $PARAM['TBLDAFTAR_PEMILIKKOTA'],
			'TBLDAFTAR_BADANUSAHANAMA' => $PARAM['TBLDAFTAR_BADANUSAHANAMA'],
			'TBLDAFTAR_BADANUSAHAALAMAT' => $PARAM['TBLDAFTAR_BADANUSAHAALAMAT'],
			'TBLDAFTAR_BADANUSAHARTRW' => $PARAM['TBLDAFTAR_BADANUSAHARTRW'],
			'TBLDAFTAR_BADANUSAHATELPAREA' => $PARAM['TBLDAFTAR_BADANUSAHATELPAREA'],

			'TBLKECAMATAN_IDBADANUSAHA' => $PARAM['TBLKECAMATAN_IDBADANUSAHA'],
			'TBLKELURAHAN_IDBADANUSAHA' => $PARAM['TBLKELURAHAN_IDBADANUSAHA'],
			
			'TBLDAFTAR_BADANUSAHAKODEPOS' => $PARAM['TBLDAFTAR_BADANUSAHAKODEPOS'],
			'TBLKELURAHAN_IDBADANUSAHA' => $PARAM['TBLKELURAHAN_IDBADANUSAHA'],
			'REFBADANUSAHA_IDBADANUSAHA' => $PARAM['REFBADANUSAHA_IDBADANUSAHA'],
			'REFBADANUSAHA_IDPEMILIK' => $PARAM['REFBADANUSAHA_IDBADANUSAHA'],
			'TBLDAFTAR_BADANUSAHAKOTA' => $PARAM['TBLDAFTAR_BADANUSAHAKOTA'],
			'TBLDAFTAR_TANGGALTERIMADAFTAR' => $PARAM['TBLDAFTAR_TANGGALTERIMADAFTAR'],
			
			'TBLDAFTAR_NOKUKUH' => $PARAM['TBLDAFTAR_NOKUKUH'],
			'TBLDAFTAR_TANGGALKUKUH' => $exp_TGLKUKUH[0],
			'TBLDAFTAR_BULANKUKUH' => $exp_TGLKUKUH[1],
			'TBLDAFTAR_TAHUNKUKUH' => substr($exp_TGLKUKUH[2], -2),

			'TBLDAFTAR_ISAKTIF' => 'Y',

			'TBLDAFTAR_TANGGALTERIMADAFTAR' => $exp_TGLTERIMADAFTAR[0],
			'TBLDAFTAR_BULANTERIMADAFTAR' => $exp_TGLTERIMADAFTAR[1],
			'TBLDAFTAR_TAHUNTERIMADAFTAR' => substr($exp_TGLTERIMADAFTAR[2], -2),

			'TBLDAFTAR_TANGGALENTRYDAFTAR' => $exp_TGLENTRYDAFTAR[0],
			'TBLDAFTAR_BULANENTRYDAFTAR' => $exp_TGLENTRYDAFTAR[1],
			'TBLDAFTAR_TAHUNENTRYDAFTAR' => substr($exp_TGLENTRYDAFTAR[2], -2),

			'TBLDAFTAR_ISJENISPENDAFTARAN' => $PARAM['TBLDAFTAR_ISJENISPENDAFTARAN'],
			
			'TBLPROVINSI_KODE' => $PARAM['TBLPROVINSI_KODE'],
			'TBLKABUPATEN_KODE' => $PARAM['TBLKABUPATEN_KODE'],
			'TBLKECAMATAN_KODE' => $PARAM['TBLKECAMATAN_KODE'],
			'TBLKELURAHAN_KODE' => $PARAM['TBLKELURAHAN_KODE'],
			'TBLDAFTAR_NIB' => $PARAM['TBLDAFTAR_NIB'],
			'TBLDAFTAR_NIK' => $PARAM['TBLDAFTAR_NIK'],
			
		);
		// echo CJSON::encode($arrayData);Yii::app()->end();
		$simpan = $insert->insert('TBLDAFTAR', $arrayData);

		if ($simpan>0) {
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