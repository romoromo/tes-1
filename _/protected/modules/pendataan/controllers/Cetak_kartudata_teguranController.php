<?php

class Cetak_kartudata_teguranController extends Controller
{
	public function actionIndex()
	{
		$data['list_kecamatan'] = Yii::app()->db->createCommand()->select()->from('REFKECAMATAN')->queryAll();
		$data['rek'] = Yii::app()->db->createCommand('
			SELECT
			*
			FROM
			TBLREKENING_90 TBLREKENING
			WHERE
			TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			AND TBLREKENING_REKAYAT <>4
			AND TBLREKENING_REKAYAT <>10
			AND TBLREKENING_REKAYAT <>23
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			')->queryAll();
		$data['sub_rek'] = Yii::app()->db->createCommand()
		->select('*')
		->from('TREKENING')
		->where('TREKENING_LEVEL=1')
		->queryAll();
		
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionCetak()
	{
		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '4.1.1.1.0':
			$namaTBL = 'TBLDAFTHOTEL';
			$AYAT = '1';
			$AYAT_NAMA = 'PAJAK HOTEL';
			break;
			
			case '4.1.1.2.0':
			$namaTBL = 'TBLDAFTRMAKAN';
			$AYAT = '2';
			$AYAT_NAMA = 'PAJAK RESTORAN';
			break;
			
			case '4.1.1.3.0':
			$namaTBL = 'TBLDAFTHIBURAN';
			$AYAT = '3';
			$AYAT_NAMA = 'PAJAK HIBURAN';
			break;
			
			case '4.1.1.4.0':
			$namaTBL = 'TBLDAFTREKLAME';
			$AYAT = '4';
			$AYAT_NAMA = 'PAJAK REKLAME';
			break;

			case '4.1.1.5.0':
			$namaTBL = 'TBLDAFTPJU';
			$AYAT = '5';
			$AYAT_NAMA = 'PAJAK PJU';
			break;
			
			case '4.1.1.7.0':
			$namaTBL = 'TBLDAFTPARKIR';
			$AYAT = '7';
			$AYAT_NAMA = 'PAJAK PARKIR';
			break;
			
			case '4.1.1.8.0':
			$namaTBL = 'TBLDAFTTANAH';
			$AYAT = '8';
			$AYAT_NAMA = 'PAJAK AIR TANAH';
			break;
			
			case '4.1.1.9.0':
			$namaTBL = 'TBLDAFTBURUNG';
			$AYAT = '9';
			$AYAT_NAMA = 'PAJAK SARANG BURUNG WALET';
			break;

			case '4.1.1.11.0':
			$namaTBL = 'TBLDAFTBPHTB';
			$AYAT = '11';
			$AYAT_NAMA = 'PAJAK BPHTB';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
				}

				$tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? substr((int)$_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
				$bulanpjk = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
				$tglpjk = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
				$kecamatan = isset($_REQUEST['TBLKECAMATAN_ID']) && !empty($_REQUEST['TBLKECAMATAN_ID']) ? (int)$_REQUEST['TBLKECAMATAN_ID'] : "''";

				$tahunsptpd = isset($_REQUEST['ENTRI_THNPAJAK']) && !empty($_REQUEST['ENTRI_THNPAJAK']) ? (int)$_REQUEST['ENTRI_THNPAJAK'] :'';
				$bulansptpd = isset($_REQUEST['ENTRI_BLNPAJAK']) && !empty($_REQUEST['ENTRI_BLNPAJAK']) ?(int)$_REQUEST['ENTRI_BLNPAJAK'] :'';
				$tanggalsptpd = isset($_REQUEST['ENTRI_TGLPAJAK']) && !empty($_REQUEST['ENTRI_TGLPAJAK']) ? (int)$_REQUEST['ENTRI_TGLPAJAK'] :'';
				
				$wherethnpajak = $tahunpjk!=0 ? (' AND TBLPENDATAAN_THNPAJAK='.$tahunpjk) : '';
				$whereblnpajak = $bulanpjk!=0 ? (' AND TBLPENDATAAN_BLNPAJAK='.$bulanpjk) : '';
				$wheretglpajak = $tglpjk!=0 ? (' AND TBLPENDATAAN_TGLPAJAK='.$tglpjk) : '';

				$wheretahunsptpd = $tahunsptpd!=0 ? (' AND '.$namaTBL.'_THNENTRI='.$tahunsptpd) : '';
				$wherebulansptpd = $bulansptpd!=0 ? (' AND '.$namaTBL.'_BLNENTRI='.$bulansptpd) : '';
				// $wheretanggalsptpd = $tanggalsptpd!=0 ? (' AND '.$namaTBL.'_TGLENTRI='.$tanggalsptpd) : '';
				if ($_REQUEST['ENTRI_TGLPAJAK']=='') {
					$wheretanggalsptpd = '';
				} else {
					$wheretanggalsptpd = (' AND '.$namaTBL.'_TGLENTRI='.$_REQUEST['ENTRI_TGLPAJAK']);
				}

				$ISONLINE = Yii::app()->request->getParam('ISONLINE', 'X');
				if ($ISONLINE=='T') {
					$WHEREISONLINE = (" AND KDCARABYR LIKE 'ONLINE        '") ? (" AND KDCARABYR = 'ONLINE        '") : "";
				} elseif ($ISONLINE=='F') {
					$WHEREISONLINE = (" AND KDCARABYR LIKE 'OFFLINE        '") ? (" AND KDCARABYR = 'OFFLINE        '") : "";
				} else {
					$WHEREISONLINE = "";
				}

				
				$KODE = isset($_REQUEST['KODE_JENIS']) && !empty($_REQUEST['KODE_JENIS']) ? $_REQUEST['KODE_JENIS'] :'';

				if ($KODE=='T') {
					$wherejenis = (' AND NVL(TBLPENDATAAN_TGLPAJAK,0)  = 0');
				} else if($KODE=='I') {
					$wherejenis = (' AND NVL(TBLPENDATAAN_TGLPAJAK,0)  <> 0');
				} else {
					$wherejenis = '';
				}

				if ($AYAT == '8') {
					$totalvolume = 'TBLDAFTTANAH_TOTALVOLUME,';
				} else {
					$totalvolume = '';
				}

				 $sql="SELECT
			(
				SELECT
					TBLREKENING.TBLREKENING_NAMAREKENING
				FROM
					TBLREKENING
				WHERE
					TBLREKENING.TBLREKENING_REKPENDAPATAN = ".$namaTBL.".".$namaTBL ."_REKPENDAPATAN
				AND TBLREKENING.TBLREKENING_REKPAD = ".$namaTBL.".".$namaTBL ."_REKPAD
				AND TBLREKENING.TBLREKENING_REKPAJAK = ".$namaTBL.".".$namaTBL ."_REKPAJAK
				AND TBLREKENING.TBLREKENING_REKAYAT = ".$namaTBL.".".$namaTBL ."_REKAYAT
				AND TBLREKENING.TBLREKENING_REKJENIS = ".$namaTBL.".".$namaTBL ."_REKJENIS
			) AS NMREKening,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
			TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			".$namaTBL.".TBLKECAMATAN_ID,
			".$namaTBL.".TBLKELURAHAN_ID,
			".$namaTBL ."_REKJENIS AS REKJENIS,
			TBLPENDATAAN_THNPAJAK,
			TBLPENDATAAN_BLNPAJAK,
			TBLPENDATAAN_TGLPAJAK,
			TBLPENDATAAN_PAJAKKE,
			".$namaTBL ."_OMSETPAJAK AS OMSET,
			".$namaTBL ."_PAJAK,
			".$namaTBL ."_THNSPTPD,
			".$namaTBL ."_BLNSPTPD,
			".$namaTBL ."_TGLSPTPD,
			".$namaTBL ."_THNENTRI AS THNENTRI,
			".$namaTBL ."_BLNENTRI AS BLNENTRI,
			".$totalvolume."
			".$namaTBL ."_TGLENTRI AS TGLENTRI
			FROM
				TBLDAFTAR
			INNER JOIN $namaTBL ON TBLDAFTAR.TBLDAFTAR_NOPOK = $namaTBL.TBLDAFTAR_NOPOK
			WHERE
				TBLDAFTAR.tbldaftar_badanusahanama IS NOT NULL
			AND TBLDAFTAR.TBLDAFTAR_NOPOK <> 150000
			AND ".$namaTBL ."_rekpendapatan = 4
			AND ".$namaTBL ."_REKPAD = 1
			AND ".$namaTBL ."_REKPAJAK = 1
			AND ".$namaTBL ."_REKAYAT = $AYAT

			" . $wherethnpajak . "
			" . $whereblnpajak . "
			" . $wheretglpajak . "
			" . $wherejenis . "
			" . $WHEREISONLINE . "

			" .$wheretahunsptpd. "
			" .$wherebulansptpd. "
			" .$wheretanggalsptpd. "
			ORDER BY
				TBLKECAMATAN_ID,
				".$namaTBL.".TBLDAFTAR_NOPOK,
				TBLKELURAHAN_ID,
				".$namaTBL.".TBLPENDATAAN_PAJAKKE,
				".$namaTBL.".".$namaTBL."_PAJAK
			";
		$data['hasil'] = Yii::app()->db->createCommand( $sql )->queryAll();
		$data['namarek'] = $AYAT_NAMA;

		$sql2="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 9";
		$sql3="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 4";	
		$sql4="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 5";	

		$data['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();
		$data['jab3'] = Yii::app()->db->createCommand($sql3)->queryRow();
		$data['jab4'] = Yii::app()->db->createCommand($sql4)->queryRow();

		header('Content-Type: application/excel');
		header("Content-Disposition: attachment;Filename=Kartu Data Non_Reklame.xls");
		
		$this->renderPartial('cetak', array('data'=>$data));
	}

	public function actioncari()
	{
		$data = array();

		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '4.1.1.1.0':
			$namaTBL = 'TBLDAFTHOTEL';
			$AYAT = '1';
			break;
			
			case '4.1.1.2.0':
			$namaTBL = 'TBLDAFTRMAKAN';
			$AYAT = '2';
			break;
			
			case '4.1.1.3.0':
			$namaTBL = 'TBLDAFTHIBURAN';
			$AYAT = '3';
			break;
			
			case '4.1.1.4.0':
			$namaTBL = 'TBLDAFTREKLAME';
			$AYAT = '4';
			break;

			case '4.1.1.5.0':
			$namaTBL = 'TBLDAFTPJU';
			$AYAT = '5';
			break;
			
			case '4.1.1.7.0':
			$namaTBL = 'TBLDAFTPARKIR';
			$AYAT = '7';
			break;
			
			case '4.1.1.8.0':
			$namaTBL = 'TBLDAFTTANAH';
			$AYAT = '8';
			break;
			
			case '4.1.1.9.0':
			$namaTBL = 'TBLDAFTBURUNG';
			$AYAT = '9';
			break;

			case '4.1.1.11.0':
			$namaTBL = 'TBLDAFTBPHTB';
			$AYAT = '11';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
		}

		$data['namatbl'] = $namaTBL;
		$data['table'] = $this->getData();
		/*$data['hasil'] = $this->getData();*/
		$this->renderPartial('tabel', array('data'=>$data));
	}

	public function actionCetakWord()
	{
		// error_reporting(0);

		// baca file template, yg dipakai
		// $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
		
		// echo "$query";
		$rek = Yii::app()->request->getParam('rekening');
		switch ( $rek ) {
			case '4.1.1.1.0':
			$namaTBL = 'TBLDAFTHOTEL';
			$AYAT = '1';
			$AYAT_NAMA = 'PAJAK HOTEL';
			$REFJABATAN_ID = '10';
			break;
			
			case '4.1.1.2.0':
			$namaTBL = 'TBLDAFTRMAKAN';
			$AYAT = '2';
			$AYAT_NAMA = 'PAJAK RESTORAN';
			$REFJABATAN_ID = '11';
			break;
			
			case '4.1.1.3.0':
			$namaTBL = 'TBLDAFTHIBURAN';
			$AYAT = '3';
			$AYAT_NAMA = 'PAJAK HIBURAN';
			$REFJABATAN_ID = '12';
			break;
			
			case '4.1.1.4.0':
			$namaTBL = 'TBLDAFTREKLAME';
			$AYAT = '4';
			$AYAT_NAMA = 'PAJAK REKLAME';
			$REFJABATAN_ID = '15';
			break;

			case '4.1.1.5.0':
			$namaTBL = 'TBLDAFTPJU';
			$AYAT = '5';
			$AYAT_NAMA = 'PAJAK PJU';
			break;
			
			case '4.1.1.7.0':
			$namaTBL = 'TBLDAFTPARKIR';
			$AYAT = '7';
			$AYAT_NAMA = 'PAJAK PARKIR';
			$REFJABATAN_ID = '13';
			break;
			
			case '4.1.1.8.0':
			$namaTBL = 'TBLDAFTTANAH';
			$AYAT = '8';
			$AYAT_NAMA = 'PAJAK AIR TANAH';
			break;
			
			case '4.1.1.9.0':
			$namaTBL = 'TBLDAFTBURUNG';
			$AYAT = '9';
			$AYAT_NAMA = 'PAJAK SARANG BURUNG WALET';
			break;

			case '4.1.1.11.0':
			$namaTBL = 'TBLDAFTBPHTB';
			$AYAT = '11';
			$AYAT_NAMA = 'PAJAK BPHTB';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
		}

		$tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$bulanpjk = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
		$tglpjk = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
		$kecamatan = isset($_REQUEST['TBLKECAMATAN_ID']) && !empty($_REQUEST['TBLKECAMATAN_ID']) ? (int)$_REQUEST['TBLKECAMATAN_ID'] : "''";

		$tahunsptpd = isset($_REQUEST['ENTRI_THNPAJAK']) && !empty($_REQUEST['ENTRI_THNPAJAK']) ? (int)$_REQUEST['ENTRI_THNPAJAK'] :'';
		$bulansptpd = isset($_REQUEST['ENTRI_BLNPAJAK']) && !empty($_REQUEST['ENTRI_BLNPAJAK']) ?(int)$_REQUEST['ENTRI_BLNPAJAK'] :'';
		$tanggalsptpd = isset($_REQUEST['ENTRI_TGLPAJAK']) && !empty($_REQUEST['ENTRI_TGLPAJAK']) ? (int)$_REQUEST['ENTRI_TGLPAJAK'] :'';
		
		$wherethnpajak = $tahunpjk!=0 ? (' AND TBLPENDATAAN_THNPAJAK='.$tahunpjk) : '';
		$whereblnpajak = $bulanpjk!=0 ? (' AND TBLPENDATAAN_BLNPAJAK='.$bulanpjk) : '';
		$wheretglpajak = $tglpjk!=0 ? (' AND TBLPENDATAAN_TGLPAJAK='.$tglpjk) : '';

		$wheretahunsptpd = $tahunsptpd!=0 ? (' AND '.$namaTBL.'_THNENTRI='.$tahunsptpd) : '';
		$wherebulansptpd = $bulansptpd!=0 ? (' AND '.$namaTBL.'_BLNENTRI='.$bulansptpd) : '';
		// $wheretanggalsptpd = $tanggalsptpd!=0 ? (' AND '.$namaTBL.'_TGLENTRI='.$tanggalsptpd) : '';
		if ($_REQUEST['ENTRI_TGLPAJAK']=='') {
			$wheretanggalsptpd = '';
		} else {
			$wheretanggalsptpd = (' AND '.$namaTBL.'_TGLENTRI='.$_REQUEST['ENTRI_TGLPAJAK']);
		}

		$ISONLINE = Yii::app()->request->getParam('ISONLINE', 'X');
		if ($ISONLINE=='T') {
			$WHEREISONLINE = (" AND KDCARABYR LIKE 'ONLINE        '") ? (" AND KDCARABYR = 'ONLINE        '") : "";
		} elseif ($ISONLINE=='F') {
			$WHEREISONLINE = (" AND KDCARABYR LIKE 'OFFLINE        '") ? (" AND KDCARABYR = 'OFFLINE        '") : "";
		} else {
			$WHEREISONLINE = "";
		}

		
		$KODE = isset($_REQUEST['KODE_JENIS']) && !empty($_REQUEST['KODE_JENIS']) ? $_REQUEST['KODE_JENIS'] :'';

		if ($KODE=='T') {
			$wherejenis = (' AND NVL(TBLPENDATAAN_TGLPAJAK,0)  = 0');
		} else if($KODE=='I') {
			$wherejenis = (' AND NVL(TBLPENDATAAN_TGLPAJAK,0)  <> 0');
		} else {
			$wherejenis = '';
		}

		if ($AYAT == '8') {
			$totalvolume = 'TBLDAFTTANAH_TOTALVOLUME,';
		} else {
			$totalvolume = '';
		}
		
		$STATUS_KIRIM = Yii::app()->request->getParam('STATUS_KIRIM', 'X');
		if ($STATUS_KIRIM=='ONLINE') {
			$WHERE_STATUSKIRIM = (" AND STATUS_KIRIM = 'ONLINE    '");
		} elseif ($STATUS_KIRIM=='OFFLINE') {
			$WHERE_STATUSKIRIM = (" AND STATUS_KIRIM = 'OFFLINE   '");
		} else {
			$WHERE_STATUSKIRIM = "";
		}

		$STATUS_TERIMA = Yii::app()->request->getParam('STATUS_TERIMA', 'X');
		if ($STATUS_TERIMA=='SUDAH') {
			$WHERE_STATUSTERIMA = (" AND TGLTERIMA IS NOT NULL");
		} elseif ($STATUS_TERIMA=='BELUM') {
			$WHERE_STATUSTERIMA = (" AND TGLTERIMA IS NULL");
		} else {
			$WHERE_STATUSTERIMA = "";
		}

		// $sql="
		// SELECT
		// 	(
		// 		SELECT
		// 			TBLREKENING.TBLREKENING_NAMAREKENING
		// 		FROM
		// 			TBLREKENING
		// 		WHERE
		// 			TBLREKENING.TBLREKENING_REKPENDAPATAN = {$namaTBL}.{$namaTBL}_REKPENDAPATAN
		// 		AND TBLREKENING.TBLREKENING_REKPAD = {$namaTBL}.{$namaTBL}_REKPAD
		// 		AND TBLREKENING.TBLREKENING_REKPAJAK = {$namaTBL}.{$namaTBL}_REKPAJAK
		// 		AND TBLREKENING.TBLREKENING_REKAYAT = {$namaTBL}.{$namaTBL}_REKAYAT
		// 		AND TBLREKENING.TBLREKENING_REKJENIS = {$namaTBL}.{$namaTBL}_REKJENIS
		// 	) AS NMREKening,
		// 	TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		// 	TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		// 	TBLDAFTAR.TBLDAFTAR_NOPOK,
		// 	TBLDAFTAR.TBLDAFTAR_EMAIL,
		// 	TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		// 	TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
		// 	TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		// 	TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		// 	{$namaTBL}.TBLKECAMATAN_ID,
		// 	{$namaTBL}.TBLKELURAHAN_ID,
		// 	{$namaTBL}_REKJENIS,
		// 	TBLPENDATAAN_THNPAJAK,
		// 	TBLPENDATAAN_BLNPAJAK,
		// 	TBLPENDATAAN_TGLPAJAK,
		// 	TBLPENDATAAN_PAJAKKE,
		// 	{$namaTBL}_OMSETPAJAK,
		// 	{$namaTBL}_PAJAK,
		// 	{$namaTBL}_THNSPTPD,
		// 	{$namaTBL}_BLNSPTPD,
		// 	{$namaTBL}_TGLSPTPD,
		// 	{$namaTBL}_THNENTRI,
		// 	{$namaTBL}_BLNENTRI,
		// 	{$totalvolume}
		// 	{$namaTBL}_TGLENTRI
		// 	FROM
		// 		TBLDAFTAR
		// 	INNER JOIN $namaTBL ON TBLDAFTAR.TBLDAFTAR_NOPOK = $namaTBL.TBLDAFTAR_NOPOK
		// 	WHERE
		// 		TBLDAFTAR.tbldaftar_badanusahanama IS NOT NULL
		// 	AND TBLDAFTAR.TBLDAFTAR_NOPOK <> 150000
		// 	AND {$namaTBL}_rekpendapatan = 4
		// 	AND {$namaTBL}_REKPAD = 1
		// 	AND {$namaTBL}_REKPAJAK = 1
		// 	AND {$namaTBL}_REKAYAT = $AYAT

		// 	{$wherethnpajak}
		// 	{$whereblnpajak}
		// 	{$wheretglpajak}
		// 	{$wherejenis}
		// 	{$WHEREISONLINE}

		// 	{$wheretahunsptpd}
		// 	{$wherebulansptpd}
		// 	{$wheretanggalsptpd}
		// 	ORDER BY
		// 		TBLKECAMATAN_ID,
		// 		{$namaTBL}.TBLDAFTAR_NOPOK,
		// 		TBLKELURAHAN_ID,
		// 		{$namaTBL}.TBLPENDATAAN_PAJAKKE,
		// 		{$namaTBL}.{$namaTBL}_PAJAK
		// ";
		// echo "$sql";Yii::app()->end();
		// $data['hasil'] = Yii::app()->db->createCommand( $sql )->queryAll();
		$data['hasil'] = $this->getData();

		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '4.1.1.1.0':
			$namaTBL = 'TBLDAFTHOTEL';
			$AYAT = '1';
			
			break;
			
			case '4.1.1.2.0':
			$namaTBL = 'TBLDAFTRMAKAN';
			$AYAT = '2';
			
			break;
			
			case '4.1.1.3.0':
			$namaTBL = 'TBLDAFTHIBURAN';
			$AYAT = '3';
			
			break;
			
			case '4.1.1.4.0':
			$namaTBL = 'TBLDAFTREKLAME';
			$AYAT = '4';
			
			break;

			case '4.1.1.5.0':
			$namaTBL = 'TBLDAFTPJU';
			$AYAT = '5';
			break;
			
			case '4.1.1.7.0':
			$namaTBL = 'TBLDAFTPARKIR';
			$AYAT = '7';
			
			break;
			
			case '4.1.1.8.0':
			$namaTBL = 'TBLDAFTTANAH';
			$AYAT = '8';
			$REFJABATAN_ID = '14';
			break;
			
			case '4.1.1.9.0':
			$namaTBL = 'TBLDAFTBURUNG';
			$AYAT = '9';
			break;

			case '4.1.1.11.0':
			$namaTBL = 'TBLDAFTBPHTB';
			$AYAT = '11';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
		}

		$sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 5";
		$sql2="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = :id";	
		// $sql4="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 5";
		// $sql5="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 14";	

		$data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();
		$data['jab2'] = Yii::app()->db->createCommand($sql2)->bindParam(':id', $REFJABATAN_ID)->queryRow();
		// $data['jab4'] = Yii::app()->db->createCommand($sql4)->queryRow();
		// $data['jab5'] = Yii::app()->db->createCommand($sql5)->queryRow();



		// $data['list_kartudata'] = Yii::app()->db->createCommand($query)->queryAll();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_kartudata' . DIRECTORY_SEPARATOR;

		$namatpl = $path_tpl . 'kartudata-teguran.docx';

		Yii::import('ext.DMOpenTBS',true);
		Yii::import('ext.LokalIndonesia');
		DMOpenTBS::init();
		$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
		$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

		// Delete a sheet 
		// $otbs->PlugIn(OPENTBS_DELETE_SHEETS, 'Delete me'); 


		// Display a sheet (make it visible) 
		// $otbs->PlugIn(OPENTBS_DISPLAY_SHEETS, 'Display me'); 

		// Change the current sheet 
		// $otbs->PlugIn(OPENTBS_SELECT_SHEET, 2); 

		// A recordset for merging tables

		//INI CODING QUERY CETAK WORD

			

		$dt = array();
		$rows = array();
		
		// $totaljumrek = array('totaljumrek'=>0); 
		$total = array('total'=>0); $no=1; foreach ($data['hasil'] as $kolom) :

			$dt['no'] = $no++;
			$dt['nopok'] = $kolom['TBLDAFTAR_NOPOK'];
			$dt['email'] = $kolom['TBLDAFTAR_EMAIL'];
			$dt['noskp'] = $kolom['TBLDAFTAR_GOLONGAN'];
			$dt['namabadan'] = trim($kolom['TBLDAFTAR_BADANUSAHANAMA']);
			if ($AYAT=='11') {
				$dt['namabadan'] = $kolom['TBLDAFTAR_PEMILIKNAMA'];
			} else {
				$dt['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
			}
			$dt['namabadan'] = trim($dt['namabadan']);

			$dt['kec'] = $kolom['TBLKECAMATAN_IDBADANUSAHA'];
			$dt['kel'] = $kolom['TBLKELURAHAN_IDBADANUSAHA'];

			$dt['kirim'] = $kolom['STATUS_KIRIM'];

			$dt['jen'] = $kolom[''.$namaTBL.'_REKJENIS'];
			$dt['tglteguran'] = ($x = strtotime($kolom['TGLTEGURAN'])) ? date('y-M-d', $x) : '';

			$dt['thspt'] = $kolom[''.$namaTBL.'_THNENTRI'];
			$dt['blspt'] = sprintf("%02d",$kolom[''.$namaTBL.'_BLNENTRI']);
			$dt['tglspt'] = sprintf("%02d",$kolom[''.$namaTBL.'_TGLENTRI']);

			$dt['omset'] = LokalIndonesia::ribuan($kolom[''.$namaTBL.'_OMSETPAJAK']);

			if ($AYAT=='8') {
				$dt['vol'] = $kolom[''.$namaTBL.'_TOTALVOLUME'];
			} else {
				$dt['vol'] = '';
			} 
			
			
			// $dt['pajak'] = LokalIndonesia::ribuan($kolom[''.$namaTBL.'_PAJAK']);

			// if ($AYAT=='8') {
			// 	$total['total'] += $kolom[''.$namaTBL.'_PAJAK'];
			// } else {
			// 	$total['total'] += $kolom[''.$namaTBL.'_OMSETPAJAK'];
			// }

			$thnpajak = $kolom['TBLPENDATAAN_THNPAJAK'];
			$blnpajak = $kolom['TBLPENDATAAN_BLNPAJAK'];
			$tglpajak = $kolom['TBLPENDATAAN_TGLPAJAK'];

			// $thnentri = $kolom['TBLDAFTREKLAME_THNENTRI'];
			// $tglentri = $kolom['TBLDAFTREKLAME_TGLENTRI'];
			// $blnentri = $kolom['TBLDAFTREKLAME_BLNENTRI'];

			$dt['namarek'] = $kolom['NMREKENING'];
			$rek = $kolom['NMREKENING'];

			// $dt['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_PAJAK']);

			$dt['thnpajak'] = $kolom['TBLPENDATAAN_THNPAJAK'];
			$dt['blnpajak'] = $kolom['TBLPENDATAAN_BLNPAJAK'];
			$dt['tglpajak'] = $kolom['TBLPENDATAAN_TGLPAJAK'];

			// $dt['npwpd'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d", $kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);
			$dt['npwpd'] = sprintf("%07d", $kolom['TBLDAFTAR_NOPOK']);

		array_push($rows, $dt);

		endforeach;

		$header = array();

		$header['total'] = LokalIndonesia::ribuan($total['total']);
		$header['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');
		$header['jabatan1'] = $data['jab1']['TBLPEJABAT_URAIAN'];
		$header['jabatan2'] = $data['jab2']['TBLPEJABAT_URAIAN'];
		// $header['jabatan3'] = $data['jab4']['TBLPEJABAT_URAIAN'];
		// $header['jabatan4'] = $data['jab5']['TBLPEJABAT_URAIAN'];

		$header['nama1'] = $data['jab1']['TBLPEJABAT_NAMA'];
		$header['nama2'] = $data['jab2']['TBLPEJABAT_NAMA'];
		// $header['nama3'] = $data['jab4']['TBLPEJABAT_NAMA'];
		// $header['nama4'] = $data['jab5']['TBLPEJABAT_NAMA'];

		$header['nip1'] = $data['jab1']['TBLPEJABAT_NIP'];
		$header['nip2'] = $data['jab2']['TBLPEJABAT_NIP'];
		// $header['nip3'] = $data['jab4']['TBLPEJABAT_NIP'];
		// $header['nip4'] = $data['jab5']['TBLPEJABAT_NIP'];

		$thn_spt = isset($_REQUEST['ENTRI_THNPAJAK']) && !empty($_REQUEST['ENTRI_THNPAJAK']) ? (int)$_REQUEST['ENTRI_THNPAJAK'] : '';
		$bln_spt = isset($_REQUEST['ENTRI_BLNPAJAK']) && !empty($_REQUEST['ENTRI_BLNPAJAK']) ? (int)$_REQUEST['ENTRI_BLNPAJAK'] : '';
		$tgl_spt = isset($_REQUEST['ENTRI_TGLPAJAK']) && !empty($_REQUEST['ENTRI_TGLPAJAK']) ? (int)$_REQUEST['ENTRI_TGLPAJAK'] : '';
		
		$GLOBALS['thnpajak'] = '';
		$GLOBALS['blnpajak'] = '';
		$GLOBALS['tglpajak'] = '';

		$thnpajak = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$blnpajak = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
		$tglpajak = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
		$GLOBALS['thnpajak'] = !empty($thnpajak) ? $thnpajak : '';
		$GLOBALS['blnpajak'] = !empty($blnpajak) ? $blnpajak : '';
		$GLOBALS['tglpajak'] = !empty($tglpajak) ? $tglpajak : '';

		// var_dump($header['hasil']);die;
		$GLOBALS['thnentri'] = $thn_spt;
		$GLOBALS['blnentri'] = $bln_spt;
		// $GLOBALS['tglentri'] = $tglentri;
		$GLOBALS['tglentri'] = $tgl_spt;
		$GLOBALS['cara'] = '';
		$GLOBALS['namarek'] = $AYAT_NAMA;

		//SAMPAI SINI QUERYNYA

		// var_dump($data);
		// echo json_encode($data);Yii::app()->end();
		// echo json_encode($rows);Yii::app()->end();

		// Merge data in the first sheet 
		// $npwpd = $data['TBLDAFTAR_NOPOK'];
		$namafileDL = "KARTUDATA_TEGURAN.docx";
		$otbs->MergeBlock('dt', $rows); 
		$otbs->MergeField('header', $header); 
		// $otbs->MergeField('setoran', $setoran); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}


	public function getData()
	{
		// $namaTBL = '';
		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '4.1.1.1.0':
			$namaTBL = 'TBLDAFTHOTEL';
			$AYAT = '1';
			$AYAT_NAMA = 'PAJAK HOTEL';
			break;
			
			case '4.1.1.2.0':
			$namaTBL = 'TBLDAFTRMAKAN';
			$AYAT = '2';
			$AYAT_NAMA = 'PAJAK RESTORAN';
			break;
			
			case '4.1.1.3.0':
			$namaTBL = 'TBLDAFTHIBURAN';
			$AYAT = '3';
			$AYAT_NAMA = 'PAJAK HIBURAN';
			break;
			
			case '4.1.1.4.0':
			$namaTBL = 'TBLDAFTREKLAME';
			$AYAT = '4';
			$AYAT_NAMA = 'PAJAK REKLAME';
			break;

			case '4.1.1.5.0':
			$namaTBL = 'TBLDAFTPJU';
			$AYAT = '5';
			$AYAT_NAMA = 'PAJAK PJU';
			break;
			
			case '4.1.1.7.0':
			$namaTBL = 'TBLDAFTPARKIR';
			$AYAT = '7';
			$AYAT_NAMA = 'PAJAK PARKIR';
			break;
			
			case '4.1.1.8.0':
			$namaTBL = 'TBLDAFTTANAH';
			$AYAT = '8';
			$AYAT_NAMA = 'PAJAK AIR TANAH';
			break;
			
			case '4.1.1.9.0':
			$namaTBL = 'TBLDAFTBURUNG';
			$AYAT = '9';
			$AYAT_NAMA = 'PAJAK SARANG BURUNG WALET';
			break;

			case '4.1.1.11.0':
			$namaTBL = 'TBLDAFTBPHTB';
			$AYAT = '11';
			$AYAT_NAMA = 'PAJAK BPHTB';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
		}



		$tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? substr((int)$_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
		$bulanpjk = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
		$tglpjk = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
		$kecamatan = isset($_REQUEST['TBLKECAMATAN_ID']) && !empty($_REQUEST['TBLKECAMATAN_ID']) ? (int)$_REQUEST['TBLKECAMATAN_ID'] : "''";

		$tahunsptpd = isset($_REQUEST['ENTRI_THNPAJAK']) && !empty($_REQUEST['ENTRI_THNPAJAK']) ? (int)$_REQUEST['ENTRI_THNPAJAK'] :'';
		$bulansptpd = isset($_REQUEST['ENTRI_BLNPAJAK']) && !empty($_REQUEST['ENTRI_BLNPAJAK']) ?(int)$_REQUEST['ENTRI_BLNPAJAK'] :'';
		$tanggalsptpd = $_REQUEST['ENTRI_TGLPAJAK'] ? (int)$_REQUEST['ENTRI_TGLPAJAK'] :'';
		$statusdata = isset($_REQUEST['STATUS_DATA'])  && !empty($_REQUEST['STATUS_DATA']) ? $_REQUEST['STATUS_DATA'] :'';
		
		$wherethnpajak = $tahunpjk!=0 ? (' AND TBLPENDATAAN_THNPAJAK='.substr($tahunpjk, -2)) : '';
		$whereblnpajak = $bulanpjk!=0 ? (' AND TBLPENDATAAN_BLNPAJAK='.$bulanpjk) : '';
		$wheretglpajak = $tglpjk!=0 ? (' AND TBLPENDATAAN_TGLPAJAK='.$tglpjk) : '';
		
		$KODE = isset($_REQUEST['KODE_JENIS']) && !empty($_REQUEST['KODE_JENIS']) ? $_REQUEST['KODE_JENIS'] :'';

		if ($KODE=='T') {
			$wherejenis = (' AND NVL(TBLPENDATAAN_TGLPAJAK,0)  = 0');
		} else if($KODE=='I') {
			$wherejenis = (' AND NVL(TBLPENDATAAN_TGLPAJAK,0)  <> 0');
		} else {
			$wherejenis = '';
		}

		$ISONLINE = Yii::app()->request->getParam('ISONLINE', 'X');
		if ($ISONLINE=='T') {
			$WHEREISONLINE = (" AND KDCARABYR LIKE 'ONLINE        '") ? (" AND KDCARABYR = 'ONLINE        '") : "";
		} elseif ($ISONLINE=='F') {
			$WHEREISONLINE = (" AND KDCARABYR LIKE 'OFFLINE        '") ? (" AND KDCARABYR = 'OFFLINE        '") : "";
		} else {
			$WHEREISONLINE = "";
		}

		$STATUS_KIRIM = Yii::app()->request->getParam('STATUS_KIRIM', 'X');
		if ($STATUS_KIRIM=='ONLINE') {
			$WHERE_STATUSKIRIM = (" AND STATUS_KIRIM = 'ONLINE    '");
		} elseif ($STATUS_KIRIM=='OFFLINE') {
			$WHERE_STATUSKIRIM = (" AND STATUS_KIRIM = 'OFFLINE   '");
		} else {
			$WHERE_STATUSKIRIM = "";
		}

		$STATUS_TERIMA = Yii::app()->request->getParam('STATUS_TERIMA', 'X');
		if ($STATUS_TERIMA=='SUDAH') {
			$WHERE_STATUSTERIMA = (" AND TGLTERIMA IS NOT NULL");
		} elseif ($STATUS_TERIMA=='BELUM') {
			$WHERE_STATUSTERIMA = (" AND TGLTERIMA IS NULL");
		} else {
			$WHERE_STATUSTERIMA = "";
		}

		$wheretahunsptpd = $tahunsptpd!=0 ? (' AND '.$namaTBL.'_THNENTRI='.$tahunsptpd) : '';
		$wherebulansptpd = $bulansptpd!=0 ? (' AND '.$namaTBL.'_BLNENTRI='.$bulansptpd) : '';
		// $wheretanggalsptpd = (' AND '.$namaTBL.'_TGLENTRI='.$_REQUEST['ENTRI_TGLPAJAK']) ? (' AND '.$namaTBL.'_TGLENTRI='.$_REQUEST['ENTRI_TGLPAJAK']) : '';
		if ($_REQUEST['ENTRI_TGLPAJAK']=='') {
			$wheretanggalsptpd = '';
		} else {
			$wheretanggalsptpd = (' AND '.$namaTBL.'_TGLENTRI='.$_REQUEST['ENTRI_TGLPAJAK']);
		}

		if ($statusdata=='') {
			$whererole = "";
		} elseif ($statusdata=='petugas') {
			$whererole = " AND TBLTEGURAN.STATUS_DATA = 'petugas'";
		} elseif ($statusdata=='kasubid') {
			$whererole = " AND TBLTEGURAN.STATUS_DATA = 'kasubid'";
		} elseif ($statusdata=='kabid') {
			$whererole = " AND TBLTEGURAN.STATUS_DATA = 'kabid'";
		} elseif ($statusdata=='wp') {
			$whererole = " AND TBLTEGURAN.STATUS_DATA = 'wp'";
		}

		$qcek = "(SELECT COUNT(EUSR.S_WP) FROM ESPTPD.XS_USER EUSR WHERE EUSR.S_WP = TBLDAFTAR.TBLDAFTAR_NOPOK) STATUS_AKUN_ESPTPD";
		$sql="
		SELECT
			(
				SELECT
					TBLREKENING.TBLREKENING_NAMAREKENING
				FROM
					TBLREKENING
				WHERE
					TBLREKENING.TBLREKENING_REKPENDAPATAN = {$namaTBL}.{$namaTBL}_REKPENDAPATAN
				AND TBLREKENING.TBLREKENING_REKPAD = {$namaTBL}.{$namaTBL}_REKPAD
				AND TBLREKENING.TBLREKENING_REKPAJAK = {$namaTBL}.{$namaTBL}_REKPAJAK
				AND TBLREKENING.TBLREKENING_REKAYAT = {$namaTBL}.{$namaTBL}_REKAYAT
				AND TBLREKENING.TBLREKENING_REKJENIS = {$namaTBL}.{$namaTBL}_REKJENIS
			) AS NMREKENING,
			TBLTEGURAN.TBLTEGURAN_ID,
			TO_DATE(TBLTEGURAN.TGLTEGURAN, 'yyyy-mm-dd') TGLTEGURAN,
			TBLTEGURAN.STATUS_DATA,
			TBLTEGURAN.KETERANGAN,
			TBLTEGURAN.TGLTERIMA,
			TBLTEGURAN.STATUS_KIRIM,
			{$qcek},
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
			TBLDAFTAR.TBLDAFTAR_EMAIL,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			{$namaTBL}.TBLKECAMATAN_ID,
			{$namaTBL}.TBLKELURAHAN_ID,
			{$namaTBL}_REKJENIS,
			TBLPENDATAAN_THNPAJAK,
			TBLPENDATAAN_BLNPAJAK,
			TBLPENDATAAN_TGLPAJAK,
			TBLPENDATAAN_PAJAKKE,
			{$namaTBL}_OMSETPAJAK,
			{$namaTBL}_THNSPTPD,
			{$namaTBL}_BLNSPTPD,
			{$namaTBL}_TGLSPTPD,
			{$namaTBL}_THNENTRI,
			{$namaTBL}_BLNENTRI,
			{$namaTBL}_TGLENTRI
		FROM
			TBLDAFTAR
		INNER JOIN {$namaTBL} ON TBLDAFTAR.TBLDAFTAR_NOPOK = {$namaTBL}.TBLDAFTAR_NOPOK
		INNER JOIN TBLTEGURAN ON TBLDAFTAR.TBLDAFTAR_NOPOK = TBLTEGURAN.NOPOK
			AND TBLTEGURAN.THP = {$namaTBL}.TBLPENDATAAN_THNPAJAK
			AND TBLTEGURAN.BLP = {$namaTBL}.TBLPENDATAAN_BLNPAJAK
		WHERE
			TBLDAFTAR.tbldaftar_badanusahanama IS NOT NULL
			AND TBLDAFTAR.TBLDAFTAR_NOPOK != 151000
			AND {$namaTBL}_rekpendapatan = 4
			AND {$namaTBL}_REKPAD = 1
			AND {$namaTBL}_REKPAJAK = 1
			AND {$namaTBL}_REKAYAT = $AYAT

			{$wherethnpajak}
			{$whereblnpajak}
			{$wheretglpajak}
			{$wherejenis}
			{$WHEREISONLINE}
			{$WHERE_STATUSKIRIM}
			{$WHERE_STATUSTERIMA}
			{$whererole}

			/* AND {$namaTBL}.{$namaTBL}_isjnspenetapan = 'S'*/
			{$wheretahunsptpd}
			{$wherebulansptpd}
			{$wheretanggalsptpd}
			/* AND {$namaTBL}_REKJENIS = 1
			AND {$namaTBL}.TBLKECAMATAN_ID = {$kecamatan}
			AND {$namaTBL}_THNENTRI = 16
			AND {$namaTBL}_BLNENTRI = 02
			AND {$namaTBL}_TGLENTRI = 05
			AND NVL({$namaTBL}_TGLENTRI,0) > 0
			AND NVL({$namaTBL}_OMSETPAJAK,0) > 0 */
		ORDER BY
			TO_CHAR(TBLKECAMATAN_IDBADANUSAHA),
			TO_CHAR(TBLKELURAHAN_IDBADANUSAHA),
			{$namaTBL}.TBLDAFTAR_NOPOK
			-- {$namaTBL}.TBLPENDATAAN_PAJAKKE,
			-- {$namaTBL}.{$namaTBL}_PAJAK
		";
		// echo "$sql";Yii::app()->end();
		return $data = Yii::app()->db->createCommand( $sql )->queryAll();
	}

	public function actionBatal_tegur()
	{
		$teguran_id = Yii::app()->request->getParam('teguran_id');
		$teguran_id = base64_decode($teguran_id);
		$sql_exists = "
		SELECT TBLTEGURAN_ID 
		FROM SYSTEM.TBLTEGURAN
		WHERE 
		TBLTEGURAN_ID = :id
		";
		$exists = Yii::app()->db->createCommand($sql_exists)
		->bindParam(":id", $teguran_id)
		->queryRow();
		if ($exists) :
			$del = Yii::app()->db->createCommand()
			->delete("TBLTEGURAN", 
				'TBLTEGURAN_ID=:id', 
				array(':id' => $teguran_id)
			);
			if ($del) :
				echo CJSON::encode(array('status' => 'success', 'message' => 'Teguran berhasil dibatalkan',));
				Yii::app()->end();
			endif;
		endif;
		echo CJSON::encode(array('status' => 'failed', 'message' => 'Teguran gagal dibatalkan',));
	}

	public function actioncetakulang()
	{
		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		$STATUS_KIRIM = isset($_REQUEST['STATUS_KIRIM']) && !empty($_REQUEST['STATUS_KIRIM']) ? $_REQUEST['STATUS_KIRIM'] : '';

		switch ( $rek ) {
			case '4.1.1.1.0':
			$namaTBL = 'TBLDAFTHOTEL';
			$AYAT = '1';
			$nama_pajak = 'PAJAK HOTEL';
			break;
			
			case '4.1.1.2.0':
			$namaTBL = 'TBLDAFTRMAKAN';
			$AYAT = '2';
			$nama_pajak = 'PAJAK RESTORAN';
			break;
			
			case '4.1.1.3.0':
			$namaTBL = 'TBLDAFTHIBURAN';
			$AYAT = '3';
			$nama_pajak = 'PAJAK HIBURAN';
			break;
			
			case '4.1.1.4.0':
			$namaTBL = 'TBLDAFTREKLAME';
			$AYAT = '4';
			$nama_pajak = 'PAJAK REKLAME';
			break;

			case '4.1.1.5.0':
			$namaTBL = 'TBLDAFTPJU';
			$AYAT = '5';
			$nama_pajak = 'PAJAK PJU';
			break;
			
			case '4.1.1.7.0':
			$namaTBL = 'TBLDAFTPARKIR';
			$AYAT = '7';
			$nama_pajak = 'PAJAK PARKIR';
			break;
			
			case '4.1.1.8.0':
			$namaTBL = 'TBLDAFTTANAH';
			$AYAT = '8';
			$nama_pajak = 'PAJAK AIR TANAH';
			break;
			
			case '4.1.1.9.0':
			$namaTBL = 'TBLDAFTBURUNG';
			$AYAT = '9';
			$nama_pajak = 'PAJAK SARANG BURUNG WALET';
			break;

			case '4.1.1.11.0':
			$namaTBL = 'TBLDAFTBPHTB';
			$AYAT = '11';
			$nama_pajak = 'PAJAK BPHTB';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
				}

		

		$TBLPENDATAAN_THNPAJAK = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? $_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$TBLPENDATAAN_BLNPAJAK = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
		$POSISI = isset($_REQUEST['POSISI']) && !empty($_REQUEST['POSISI']) ? $_REQUEST['POSISI'] : '';

		$select = "".$namaTBL.".*, TBLDAFTAR.*, TBLTEGURAN.*";
		$from = ''.$namaTBL.'';

		/*$filter = array(
			'EQ__TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
			,'EQ__TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
			,'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);*/

		$filter_AND = array(
			'EQ__TBLPENDATAAN_THNPAJAK' => substr($TBLPENDATAAN_THNPAJAK,-2)
			,'EQ__TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
			,'EQ__TBLTEGURAN.JENIS' => $AYAT
			,'LK__TBLTEGURAN.STATUS_KIRIM' => $STATUS_KIRIM
			,'EQ__TBLTEGURAN.STATUS_DATA' => $POSISI
		);

		$otherquery = array(
			// 'limit'=> 30
			'join_teguran'=> array('TBLTEGURAN', ''.$namaTBL.'.TBLDAFTAR_NOPOK = TBLTEGURAN.NOPOK 
				AND '.$namaTBL.'.TBLPENDATAAN_THNPAJAK = TBLTEGURAN.THP
				AND '.$namaTBL.'.TBLPENDATAAN_BLNPAJAK = TBLTEGURAN.BLP
				')
			,'join_daftar'=> array('TBLDAFTAR', ''.$namaTBL.'.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK')
			,'order'=> 'TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA, TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA, TBLDAFTAR.TBLDAFTAR_NOPOK'
		);

		// $qcek = "(SELECT COUNT(EUSR.S_WP) FROM ESPTPD.XS_USER EUSR WHERE EUSR.S_WP = TBLDAFTAR.TBLDAFTAR_NOPOK) ";
		// if ($STATUS_AKUN_ESPTPD == 'PUNYA') :
		// 	$otherquery['andwhere_akun'] = "{$qcek}>=1";
		// elseif ($STATUS_AKUN_ESPTPD == 'TIDAK PUNYA') :
		// 	$otherquery['andwhere_akun'] = "{$qcek}<=0";
		// endif;

		$arrayConfig = array('select'=>$select,'from'=>$from,/*'filter'=>$filter,*/'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data['list_teguran'] = DBFetch::query($arrayConfig);

		

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
        $namatpl = $path_tpl . 'surat_teguran-qr.docx';

        Yii::import('ext.DMOpenTBS',true);
        Yii::import('ext.LokalIndonesia');
        DMOpenTBS::init();
        $otbs = new clsTinyButStrong;

        // Useful for debugging purposes. Displays the errors
        $otbs->NoErr = 0;
        $otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

        $template = $namatpl;
        $otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

        // Delete a sheet 
        // $otbs->PlugIn(OPENTBS_DELETE_SHEETS, 'Delete me'); 


        // Display a sheet (make it visible) 
        // $otbs->PlugIn(OPENTBS_DISPLAY_SHEETS, 'Display me'); 

        // Change the current sheet 
        // $otbs->PlugIn(OPENTBS_SELECT_SHEET, 2); 

        // A recordset for merging tables

        //INI CODING QUERY CETAK WORD

            

        // $dt = array();
        // $rows = array();

        $sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 2";
        $data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();

        $dt = array();
        $rows = array();

		$ar_ttd = array(
			'pejabat_nama' => $data['jab1']['TBLPEJABAT_NAMA'],
			'pejabat_nip'  => $data['jab1']['TBLPEJABAT_NIP'],
		);
        
        foreach ($data['list_teguran'] as $kolom) :

            $dt['no'] = null;
            $dt['nosurat'] = $kolom['NOTEGURAN'];;
            // $dt['nopok'] = sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']);
            $dt['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
            $dt['alamatbadan'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];

            $dt['masapajak'] = strtoupper((LokalIndonesia::getbulan($kolom['TBLPENDATAAN_BLNPAJAK']))) .' 20'. $kolom['TBLPENDATAAN_THNPAJAK'];

            $dt['datenow'] = LokalIndonesia::TanggalUmum($kolom['TGLTEGURAN']);

            $dt['nopok'] = $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);

            $dt['jenis'] = ''.$nama_pajak.'';

            $dt['jabatan'] = $data['jab1']['TBLPEJABAT_URAIAN'];
            $dt['nama'] = $data['jab1']['TBLPEJABAT_NAMA'];
            $dt['nip'] = $data['jab1']['TBLPEJABAT_NIP'];

            if ($rek=='3') {
            	$dt['keterlambatan'] = '15 (Lima Belas)';
            } else {
            	$dt['keterlambatan'] = '10 (Sepuluh)';
            }
            $text1 = 'TEGURAN_SPTPD';
            $text2 = 'a.n. KEPALA_KEPALA BIDANG PELAYANAN PENDAFTARAN DAN PENETAPAN PENDAPATAN DAERAH';
            $wp_jenis = $nama_pajak;
            $wp_masabulan = LokalIndonesia::getbulan($kolom['TBLPENDATAAN_BLNPAJAK']);
            $wp_masatahun = ' 20'. $kolom['TBLPENDATAAN_THNPAJAK'];
			$wp_npwpd = $kolom['TBLDAFTAR_NOPOK'];
			$wp_nama = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
			$text = "({$text1}_{$wp_jenis}_{$wp_masabulan}_{$wp_masatahun}_{$wp_nama}_{$wp_npwpd}_{$text2}_{$ar_ttd['pejabat_nama']}_{$ar_ttd['pejabat_nip']})";
			$path = dirname(Yii::app()->getBasePath()).'/assets/temp_qr/'; // letakkan di folder assets
			$path_qr = $path . "qrcode_teguran_{$wp_npwpd}-{$TBLPENDATAAN_THNPAJAK}-{$TBLPENDATAAN_BLNPAJAK}_{$wp_npwpd}".md5($text).".png";
			Yii::app()->qrcode->create($text, $path_qr);
			// echo $path_qr;Yii::app()->end();
			// $otbs->Plugin(OPENTBS_CHANGE_PICTURE, '#merge_me#', $path_qr, array('unique' => 1));
			// $otbs->Plugin(OPENTBS_CHANGE_PICTURE, '#merge_me#', $path_qr);
			$dt['qrpath'] = $path_qr;

        	array_push($rows, $dt);
    //     	$datateguran = array(
    //     		'thn' => $TBLPENDATAAN_THNPAJAK,
				// 'bln' => $TBLPENDATAAN_BLNPAJAK,
				// 'nopok' => $kolom['TBLDAFTAR_NOPOK'],
				// 'nomor_surat' => $nomor_surat,
				// 'NAMA_WP' => $kolom['TBLDAFTAR_BADANUSAHANAMA'],
				// 'ALAMAT_WP' => $kolom['TBLDAFTAR_BADANUSAHAALAMAT'],
				// 'NPWPD' => $dt['nopok'],
				// 'rek' => $rek,
				// 'STATUS_KIRIM' => $kolom['IS_SPTPD'] ? 'ONLINE' : 'OFFLINE',
    //     	);
    //     	// var_dump($datateguran);Yii::app()->end();
    //     	$this->update_teguran($datateguran);

        endforeach;

        //SAMPAI SINI QUERYNYA

        // var_dump($data);
        // echo json_encode($dt);Yii::app()->end();
        // echo json_encode($rows);Yii::app()->end();

        // Merge data in the first sheet
        $namafileDL = "Surat-Teguran-CetakUlang.docx";
        $otbs->MergeBlock('dt', $rows);
        // $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the templatedatenow

        $otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
        // echo "string";Yii::app()->end();
        Yii::app()->end();

		
	}

	public function actioncetakrekaptahunan()
	{
		$tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? substr((int)$_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : substr(date('Y'), -2);
		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';

		$data = array();

		switch ( $rek ) {
			case '4.1.1.1.0':
			$AYAT = '1';
			$AYAT_NAMA = 'PAJAK HOTEL';
			break;
			
			case '4.1.1.2.0':
			$AYAT = '2';
			$AYAT_NAMA = 'PAJAK RESTORAN';
			break;
			
			case '4.1.1.3.0':
			$AYAT = '3';
			$AYAT_NAMA = 'PAJAK HIBURAN';
			break;

			case '4.1.1.5.0':
			$AYAT = '5';
			$AYAT_NAMA = 'PAJAK PJU';
			break;
			
			case '4.1.1.7.0':
			$AYAT = '7';
			$AYAT_NAMA = 'PAJAK PARKIR';
			break;
			
			case '4.1.1.8.0':
			$AYAT = '8';
			$AYAT_NAMA = 'PAJAK AIR TANAH';
			break;
			
			case '4.1.1.9.0':
			$AYAT = '9';
			$AYAT_NAMA = 'PAJAK SARANG BURUNG WALET';
			break;

			case '4.1.1.11.0':
			$AYAT = '11';
			$AYAT_NAMA = 'PAJAK BPHTB';
			break;
			
			default:
			$AYAT = '1';
			$AYAT_NAMA = 'PAJAK HOTEL';
			break;
		}

		$sql="SELECT TBLDAFTAR_NOPOK,TBLDAFTAR_BADANUSAHANAMA,TBLDAFTAR_BADANUSAHAALAMAT,
		(SELECT TO_CHAR(TGLTEGURAN,'DD-MM-YYYY') FROM TBLTEGURAN WHERE TBLDAFTAR_NOPOK = NOPOK AND BLP = 1 AND THP = ".$tahunpjk.") AS JAN,
		(SELECT TO_CHAR(TGLTEGURAN,'DD-MM-YYYY') FROM TBLTEGURAN WHERE TBLDAFTAR_NOPOK = NOPOK AND BLP = 2 AND THP = ".$tahunpjk.") AS FEB,
		(SELECT TO_CHAR(TGLTEGURAN,'DD-MM-YYYY') FROM TBLTEGURAN WHERE TBLDAFTAR_NOPOK = NOPOK AND BLP = 3 AND THP = ".$tahunpjk.") AS MAR,
		(SELECT TO_CHAR(TGLTEGURAN,'DD-MM-YYYY') FROM TBLTEGURAN WHERE TBLDAFTAR_NOPOK = NOPOK AND BLP = 4 AND THP = ".$tahunpjk.") AS APR,
		(SELECT TO_CHAR(TGLTEGURAN,'DD-MM-YYYY') FROM TBLTEGURAN WHERE TBLDAFTAR_NOPOK = NOPOK AND BLP = 5 AND THP = ".$tahunpjk.") AS MEI,
		(SELECT TO_CHAR(TGLTEGURAN,'DD-MM-YYYY') FROM TBLTEGURAN WHERE TBLDAFTAR_NOPOK = NOPOK AND BLP = 6 AND THP = ".$tahunpjk.") AS JUN,
		(SELECT TO_CHAR(TGLTEGURAN,'DD-MM-YYYY') FROM TBLTEGURAN WHERE TBLDAFTAR_NOPOK = NOPOK AND BLP = 7 AND THP = ".$tahunpjk.") AS JUL,
		(SELECT TO_CHAR(TGLTEGURAN,'DD-MM-YYYY') FROM TBLTEGURAN WHERE TBLDAFTAR_NOPOK = NOPOK AND BLP = 8 AND THP = ".$tahunpjk.") AS AGT,
		(SELECT TO_CHAR(TGLTEGURAN,'DD-MM-YYYY') FROM TBLTEGURAN WHERE TBLDAFTAR_NOPOK = NOPOK AND BLP = 9 AND THP = ".$tahunpjk.") AS SEP,
		(SELECT TO_CHAR(TGLTEGURAN,'DD-MM-YYYY') FROM TBLTEGURAN WHERE TBLDAFTAR_NOPOK = NOPOK AND BLP = 10 AND THP = ".$tahunpjk.") AS OKT,
		(SELECT TO_CHAR(TGLTEGURAN,'DD-MM-YYYY') FROM TBLTEGURAN WHERE TBLDAFTAR_NOPOK = NOPOK AND BLP = 11 AND THP = ".$tahunpjk.") AS NOV,
		(SELECT TO_CHAR(TGLTEGURAN,'DD-MM-YYYY') FROM TBLTEGURAN WHERE TBLDAFTAR_NOPOK = NOPOK AND BLP = 12 AND THP = ".$tahunpjk.") AS DES

		from TBLDAFTAR 
		join REFBADANUSAHA_90 ON
		TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA = REFBADANUSAHA_90.REFBADANUSAHA_ID
		WHERE REFBADANUSAHA_90.REFBADANUSAHA_REKAYAT = ".$AYAT."
		AND TBlDAFTAR_ISAKTIF = 'Y'
		AND TBLDAFTAR_NOPOK NOT IN ('151000','1500000')
		ORDER BY TBLDAFTAR_NOPOK";

		$data['hasil'] = Yii::app()->db->createCommand( $sql )->queryAll();
		$data['judul'] = $AYAT_NAMA;
		$data['tahun_pajak'] = $_REQUEST['TBLPENDATAAN_THNPAJAK'];

		header('Content-Type: application/excel');
			header("Content-Disposition: attachment;Filename=rekap-teguran-tahunan.xls");
		
		$this->renderPartial('tabelrekap', array('data'=>$data));
	}
}