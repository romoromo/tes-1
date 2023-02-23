<?php

class ApimockupController extends Controller {

	public function actionIndex()
	{
		echo "Api Service Pendapatan Mockup";
		// echo md5('*51mP4tD4J06J4*'.date('Y-m-d'));
	}

	public function actiongettagihanketetapan()
	{
		header('Content-Type: application/json');
		header("Access-Control-Allow-Methods: POST");
		// $user = $_SERVER['PHP_AUTH_USER'];
		// $key = $_SERVER['PHP_AUTH_PW'];
		$idbilling = Yii::app()->request->getParam('IDBILLING');
		$token = Yii::app()->request->getParam('TOKEN');

		if (empty($idbilling)) {
			echo CJSON::encode(array('responsecode'=>'05','summarytext'=>'PARAMETER TIDAK LENGKAP'));
			Yii::app()->end();
		}

		if ($idbilling=='3471201250110002') {
			echo CJSON::encode(array('responsecode'=>'02','summarytext'=>'TAGIHAN SUDAH LUNAS'));
			Yii::app()->end();
		}

		if (Yii::app()->params['passapitoken']==$token) {
			$data = CJSON::encode(array(

						'IDBILING'=>'3471201250110001',
						'NPWPD'=>'P.3.0017472.11.31',
						'NAMAOP'=>'ZEST HOTEL/ PT. INDRA ANGGIRA SARI',
						'ALAMATOP'=>'JL. GAJAH MADA NO.28 YOGYAKARTA',
						'NAMAWP'=>'ADRIANSYAH AKBAR',
						'ALAMATWP'=>'JL. MINYAK RAYA NO. 6A RT/RW 03/06 DUREN TIGA PANCORAN JAKARTA SELATAN',
						'BULANPAJAK'=>'12',
						'TAHUNPAJAK'=>'2020',
						'JENISPAJAK'=>'01',
						'MASAPAJAK'=>'2020',
						'URAIANKEG'=>'HOTEL BINTANG DUA',
						'TGLPENETAPAN'=>'2022-01-18',
						'TGLJATUHTEMPO'=>'2022-02-18',
						'NOSSPD'=>'',
						'TAGIHANPOKOK'=>'165765221',
						'DENDA'=>'0',
						'summarytext'=>'SUCCESS',
						'responsecode'=>'00'
						));
			echo $data;
			Yii::app()->end();
		} else {
				echo CJSON::encode(array('responsecode'=>'04','summarytext'=>'AUTHENTIFICATION ERROR'));
		}

	}

	public function actionbayartagihanketetapan()
	{
		header('Content-Type: application/json');
		header("Access-Control-Allow-Methods: POST");
		// $user = $_SERVER['PHP_AUTH_USER'];
		// $key = $_SERVER['PHP_AUTH_PW'];
		$idbilling = Yii::app()->request->getParam('IDBILLING');
		$jmlbayar = Yii::app()->request->getParam('PEMBAYARAN');
		$noresi = Yii::app()->request->getParam('NORESI');
		$token = Yii::app()->request->getParam('TOKEN');

		if (empty($idbilling)) {
			echo CJSON::encode(array('responsecode'=>'05','summarytext'=>'PARAMETER TIDAK LENGKAP'));
			Yii::app()->end();
		}
		if (empty($noresi)) {
			echo CJSON::encode(array('responsecode'=>'05','summarytext'=>'PARAMETER TIDAK LENGKAP'));
			Yii::app()->end();
		}
		if ($jmlbayar!='165765221') {
			echo CJSON::encode(array('responsecode'=>'01','summarytext'=>'JUMLAH PEMBAYARAN KURANG DARI TAGIHAN'));
			Yii::app()->end();
		}
		if ($idbilling=='3471201250110002') {
			echo CJSON::encode(array('responsecode'=>'02','summarytext'=>'TAGIHAN SUDAH LUNAS'));
			Yii::app()->end();
		}

		if (Yii::app()->params['passapitoken']==$token) {
			$data = CJSON::encode(array(

						'IDBILING'=>'3471201250110001',
						'NPWPD'=>'P.3.0017472.11.31',
						'NAMAOP'=>'ZEST HOTEL/ PT. INDRA ANGGIRA SARI',
						'ALAMATOP'=>'JL. GAJAH MADA NO.28 YOGYAKARTA',
						'NAMAWP'=>'ADRIANSYAH AKBAR',
						'ALAMATWP'=>'JL. MINYAK RAYA NO. 6A RT/RW 03/06 DUREN TIGA PANCORAN JAKARTA SELATAN',
						'BULANPAJAK'=>'12',
						'TAHUNPAJAK'=>'2020',
						'JENISPAJAK'=>'01',
						'MASAPAJAK'=>'2020',
						'URAIANKEG'=>'HOTEL BINTANG DUA',
						'TGLPENETAPAN'=>'2022-01-18',
						'TGLJATUHTEMPO'=>'2022-02-18',
						'NOSSPD'=>'',
						'TAGIHANPOKOK'=>'165765221',
						'DENDA'=>'0',
						'summarytext'=>'PEMBAYARAN BERHASIL',
						'responsecode'=>'00'
						));
			echo $data;
			Yii::app()->end();
		} else {
				echo CJSON::encode(array('responsecode'=>'04','summarytext'=>'AUTHENTIFICATION ERROR'));
		}
	}


}
