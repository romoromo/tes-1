<?php

class Himbauan_skpda_2021Controller extends Controller
{
	public function actionIndex()
	{
		$data['list_kecamatan'] = Yii::app()->db->createCommand()->select()->from('REFKECAMATAN')->queryAll();
		$data['list_kelurahan'] = Yii::app()->db->createCommand()->select()->from('REFKELURAHAN')->queryAll();
		$data['rek'] = Yii::app()->db->createCommand('
			SELECT
			*
			FROM
			TBLREKENING
			WHERE
			TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			AND TBLREKENING_REKAYAT <> 4
			AND TBLREKENING_REKAYAT <> 5
			AND TBLREKENING_REKAYAT <> 9
			AND TBLREKENING_REKAYAT <> 10
			AND TBLREKENING_REKAYAT <> 11
			AND TBLREKENING_REKAYAT <> 23
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			')->queryAll();
		$data['URL_APP'] = Yii::app()->getBaseUrl(true);		
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionCari()
	{
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
		$TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
		$TBLPENDATAAN_THNPAJAK_AKHIR = substr($_REQUEST['TBLPENDATAAN_THNPAJAK_AKHIR'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK_AKHIR'], -2) : '';
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';
		$tanggalsurat = $_REQUEST['tanggalsurat'] ? $_REQUEST['tanggalsurat'] : '';
		// $REFKELURAHAN = $_REQUEST['REFKELURAHAN'] ? $_REQUEST['REFKELURAHAN'] : '0';
		// $REFKECAMATAN = $_REQUEST['REFKECAMATAN'] ? $_REQUEST['REFKECAMATAN'] : '0';

		$KODEREK = $_REQUEST['TBLREKENING_KODE'];
		if($KODEREK=='4.1.1.1.0'){
			$NamaTBL = 'TBLDAFTHOTEL';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
		}
		elseif($KODEREK=='4.1.1.2.0'){
			$NamaTBL = 'TBLDAFTRMAKAN';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
		}
		elseif($KODEREK=='4.1.1.3.0'){
			$NamaTBL = 'TBLDAFTHIBURAN';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
		}
		elseif($KODEREK=='4.1.1.4.0'){
			$NamaTBL = 'TBLDAFTREKLAME';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'NOJABONG';
		}
		elseif($KODEREK=='4.1.1.7.0'){
			$NamaTBL = 'TBLDAFTPARKIR';	
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
		}
		elseif($KODEREK=='4.1.1.8.0'){
			$NamaTBL = 'TBLDAFTTANAH';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
		}
		elseif($KODEREK=='4.1.1.9.0'){
			$NamaTBL = 'TBLDAFTBURUNG';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
		}
		// elseif($KODEREK=='4.1.1.10.0'){
		// 	$NamaTBL = '';
		// }
		elseif($KODEREK=='4.1.1.11.0'){
			$NamaTBL = 'TBLDAFTBPHTB';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
		}

		if($TBLDAFTAR_NOPOK==''){
			$wherenopok = "";

		}

		else{
			$wherenopok = "AND
			TBLDAFTAR_NOPOK = '$TBLDAFTAR_NOPOK'";
		};
		

		$sql="SELECT
		TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR_BADANUSAHAALAMAT,
		TBLPENDATAAN_THNPAJAK,
		TBLPENDATAAN_BLNPAJAK,
		TBLPENDATAAN_TGLPAJAK,
		TBLPENDATAAN_PAJAKKE,
		TBLDAFTAR_NOPOK,
		TBLDAFTAR_JNSPENDAPATAN,
		TBLKECAMATAN_ID,
		TBLKELURAHAN_ID,			
		".$NamaTBL."_THNKURANGBAYAR,
		".$NamaTBL."_BLNKURANGBAYAR,
		".$NamaTBL."_TGLKURANGBAYAR,
		".$NamaTBL."_AYTKURANGBAYAR,
		".$NamaTBL."_REGKURANGBAYAR,
		".$NamaTBL."_URUTKURANGBAYAR,
		".$NamaTBL."_DENDAKRGBAYAR,
		".$NamaTBL."_BUNGAKRGBAYAR,	
		".$NamaTBL."_REGSURATANGSUR,
		".$NamaTBL."_THNSURATANGSUR,
		".$NamaTBL."_BLNSURATANGSUR,
		".$NamaTBL."_TGLSURATANGSUR,
		".$NamaTBL."_BLNKBAWAL,
		".$NamaTBL."_BLNKBAKHIR,
		Totaltagihan,
		Totalsudahbayar,
		Hitung,
		Bayar,
		(Totaltagihan - Totalsudahbayar) AS sisangasur
		FROM
		(
			SELECT
			(
				SELECT
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
				FROM
				TBLDAFTAR
				WHERE
				TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NamaTBL.".TBLDAFTAR_NOPOK
			) AS TBLDAFTAR_BADANUSAHANAMA,
			(
				SELECT
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
				FROM
				TBLDAFTAR
				WHERE
				TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NamaTBL.".TBLDAFTAR_NOPOK
			) AS TBLDAFTAR_BADANUSAHAALAMAT,
			".$NamaTBL.".TBLPENDATAAN_THNPAJAK,
			".$NamaTBL.".TBLPENDATAAN_BLNPAJAK,
			".$NamaTBL.".TBLPENDATAAN_TGLPAJAK,
			".$NamaTBL.".TBLPENDATAAN_PAJAKKE,
			".$NamaTBL.".TBLDAFTAR_NOPOK,
			".$NamaTBL.".TBLDAFTAR_JNSPENDAPATAN,
			".$NamaTBL.".TBLKECAMATAN_ID,
			".$NamaTBL.".TBLKELURAHAN_ID,
			".$NamaTBL.".TBLDAFTAR_GOLONGAN,
			".$NamaTBL.".".$NamaTBL."_THNKURANGBAYAR,
			".$NamaTBL.".".$NamaTBL."_BLNKURANGBAYAR,
			".$NamaTBL.".".$NamaTBL."_TGLKURANGBAYAR,
			".$NamaTBL.".".$NamaTBL."_AYTKURANGBAYAR,
			".$NamaTBL.".".$NamaTBL."_REGKURANGBAYAR,
			".$NamaTBL.".".$NamaTBL."_URUTKURANGBAYAR,
			".$NamaTBL.".".$NamaTBL."_DENDAKRGBAYAR,
			".$NamaTBL.".".$NamaTBL."_BUNGAKRGBAYAR,
			".$NamaTBL.".".$NamaTBL."_REGSURATANGSUR,
			".$NamaTBL.".".$NamaTBL."_THNSURATANGSUR,
			".$NamaTBL.".".$NamaTBL."_BLNSURATANGSUR,
			".$NamaTBL.".".$NamaTBL."_TGLSURATANGSUR,
			".$NamaTBL.".".$NamaTBL."_BLNKBAWAL,
			".$NamaTBL.".".$NamaTBL."_BLNKBAKHIR,
			COUNT (
				".$NamaTBL.".TBLDAFTAR_NOPOK
			) AS hitung,
			SUM (
				NVL (TBLANGSURAN.TBLANGSURAN_ANGSURAN,0) + NVL (TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN, 0)
				) AS Totaltagihan,
			SUM (CASE
				WHEN TBLANGSURAN.TBLANGSURAN_SETORAN IS NOT NULL 
				THEN
					NVL (
						TBLANGSURAN.TBLANGSURAN_SETORAN,
						0
					) + NVL (TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN, 0) 
				ELSE 0 END
			) AS Totalsudahbayar,
			(TBLSETOR.TBLSETOR_RUPIAHSETOR + TBLSETOR.TBLSETOR_BUNGAKETETAPAN) AS Bayar		
			FROM
			".$NamaTBL."
			INNER JOIN TBLANGSURAN ON ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = TBLANGSURAN.TBLPENDATAAN_THNPAJAK
			AND ".$NamaTBL.".TBLPENDATAAN_BLNPAJAK = TBLANGSURAN.TBLPENDATAAN_BLNPAJAK
			AND NVL (".$NamaTBL.".TBLPENDATAAN_TGLPAJAK, 0) = NVL (TBLANGSURAN.TBLPENDATAAN_TGLPAJAK, 0)
			AND ".$NamaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
			LEFT JOIN TBLSETOR ON ".$NamaTBL.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
			AND ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
			AND ".$NamaTBL.".TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK
			AND TBLSETOR_JNSKETETAPAN = 'K'
			GROUP BY
			".$NamaTBL.".TBLPENDATAAN_THNPAJAK,
			".$NamaTBL.".TBLPENDATAAN_BLNPAJAK,
			".$NamaTBL.".TBLPENDATAAN_TGLPAJAK,
			".$NamaTBL.".TBLPENDATAAN_PAJAKKE,
			".$NamaTBL.".TBLDAFTAR_NOPOK,
			".$NamaTBL.".TBLDAFTAR_JNSPENDAPATAN,
			".$NamaTBL.".TBLKECAMATAN_ID,
			".$NamaTBL.".TBLKELURAHAN_ID,
			".$NamaTBL.".TBLDAFTAR_GOLONGAN,
			".$NamaTBL.".".$NamaTBL."_THNKURANGBAYAR,
			".$NamaTBL.".".$NamaTBL."_BLNKURANGBAYAR,
			".$NamaTBL.".".$NamaTBL."_TGLKURANGBAYAR,
			".$NamaTBL.".".$NamaTBL."_AYTKURANGBAYAR,
			".$NamaTBL.".".$NamaTBL."_REGKURANGBAYAR,
			".$NamaTBL.".".$NamaTBL."_URUTKURANGBAYAR,
			".$NamaTBL.".".$NamaTBL."_DENDAKRGBAYAR,
			".$NamaTBL.".".$NamaTBL."_BUNGAKRGBAYAR,
			".$NamaTBL.".".$NamaTBL."_REGSURATANGSUR,
			".$NamaTBL.".".$NamaTBL."_THNSURATANGSUR,
			".$NamaTBL.".".$NamaTBL."_BLNSURATANGSUR,
			".$NamaTBL.".".$NamaTBL."_TGLSURATANGSUR,
			".$NamaTBL.".".$NamaTBL."_BLNKBAWAL,
			".$NamaTBL.".".$NamaTBL."_BLNKBAKHIR,
			TBLSETOR.TBLSETOR_RUPIAHSETOR,
			TBLSETOR.TBLSETOR_BUNGAKETETAPAN
		)
		WHERE
		NVL (".$NamaTBL."_REGKURANGBAYAR, 0) > 0
		AND NVL (
			Totaltagihan - Totalsudahbayar,
			0
		) > 0
		".$wherenopok."
		AND Bayar IS NULL
		AND TBLPENDATAAN_THNPAJAK BETWEEN ".$TBLPENDATAAN_THNPAJAK."
		AND ".$TBLPENDATAAN_THNPAJAK_AKHIR."
		ORDER BY
		TBLDAFTAR_NOPOK,
		".$NamaTBL."_THNKURANGBAYAR,
		".$NamaTBL."_BLNKURANGBAYAR,
		".$NamaTBL."_TGLKURANGBAYAR
		";


		$data['cari'] = $cari = Yii::app()->db->createCommand($sql)->queryAll();
		$data['NamaTBL'] = $NamaTBL;
// echo "$sql";die();

		$this->renderPartial('tabel_laporan',array('data'=>$data));
	}

public function actionCetakword()
{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'Surat Himbauan SKPDA.docx';
		

		// if (base64_decode($data['jenis'])=='REK') {
		// 	$namatpl = $path_tpl . 'Temp_Teguranrek.docx';
		// 	$namafileDL = "Surat-Teguranrek.docx"; 
		// }

		Yii::import('ext.DMOpenTBS',true);
		Yii::import('ext.LokalIndonesia');
		DMOpenTBS::init();
		$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
		$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template


		$nomor_surat = $_REQUEST['nomor_surat'] ? $_REQUEST['nomor_surat'] : '';
		$tanggalsurat = $_REQUEST['tanggalsurat'] ? $_REQUEST['tanggalsurat'] : '';
		$tglawal = $_REQUEST['tglawal'] ? $_REQUEST['tglawal'] : '';
		$tglakhir = $_REQUEST['tglakhir'] ? $_REQUEST['tglakhir'] : '';
		$waktuawal = $_REQUEST['waktuawal'] ? $_REQUEST['waktuawal'] : '';
		$waktuakhir = $_REQUEST['waktuakhir'] ? $_REQUEST['waktuakhir'] : '';
		$tempt_undangan = $_REQUEST['tempt_undangan'] ? $_REQUEST['tempt_undangan'] : '';
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
		$TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
		$TBLPENDATAAN_THNPAJAK_AKHIR = substr($_REQUEST['TBLPENDATAAN_THNPAJAK_AKHIR'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK_AKHIR'], -2) : '';
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';

		$exp_tanggalsurat = explode('-', $tanggalsurat);
		$exp_tglawal = explode('-', $tglawal);
		$exp_tglakhir = explode('-', $tglakhir);
		// $REFKELURAHAN = $_REQUEST['REFKELURAHAN'] ? $_REQUEST['REFKELURAHAN'] : '0';
		// $REFKECAMATAN = $_REQUEST['REFKECAMATAN'] ? $_REQUEST['REFKECAMATAN'] : '0';

		$KODEREK = $_REQUEST['TBLREKENING_KODE'];
		if($KODEREK=='4.1.1.1.0'){
			$NamaTBL = 'TBLDAFTHOTEL';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'KENAIKANKRGBAYAR';
			$PAJAK = 'PAJAK HOTEL';
		}
		elseif($KODEREK=='4.1.1.2.0'){
			$NamaTBL = 'TBLDAFTRMAKAN';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'NAKB';
			$PAJAK = 'PAJAK RESTORAN';
		}
		elseif($KODEREK=='4.1.1.3.0'){
			$NamaTBL = 'TBLDAFTHIBURAN';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'NAKB';
			$PAJAK = 'PAJAK HIBURAN';
		}
		elseif($KODEREK=='4.1.1.4.0'){
			$NamaTBL = 'TBLDAFTREKLAME';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'NOJABONG';
			$KNKB = 'NAKB';
			$PAJAK = 'PAJAK REKLAME';
		}
		// elseif($KODEREK=='4.1.1.5.0'){
		// 	$NamaTBL = '';
		// }
		elseif($KODEREK=='4.1.1.7.0'){
			$NamaTBL = 'TBLDAFTPARKIR';	
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'NAKB';
			$PAJAK = 'PAJAK PARKIR';
		}
		elseif($KODEREK=='4.1.1.8.0'){
			$NamaTBL = 'TBLDAFTTANAH';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'NAKB';
			$PAJAK = 'PAJAK AIR TANAH';
		}
		elseif($KODEREK=='4.1.1.9.0'){
			$NamaTBL = 'TBLDAFTBURUNG';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'NAKB';
			$PAJAK = 'PAJAK SARANG BURUNG WALET';
		}
		// elseif($KODEREK=='4.1.1.10.0'){
		// 	$NamaTBL = '';
		// }
		elseif($KODEREK=='4.1.1.11.0'){
			$NamaTBL = 'TBLDAFTBPHTB';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'NAKB';
			$PAJAK = 'PAJAK BPHTB';
		}

		$data['filter'] = isset($_REQUEST['data']) ? $_REQUEST['data'] : '';

		if (!empty($data['filter'])) {
			$data['filter'] = explode(',', $data['filter']);
		} else {
			echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak Teguran Pajak Reklame</h3>";
			Yii::app()->end();
		}

		$flag = '';
		$query = '';

		foreach ($data['filter'] as $kodefikasi) {
			$kodefikasi = explode('-', $kodefikasi);
			if (is_array($kodefikasi)) {
				if (!isset($kodefikasi[0])) {
					echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
					Yii::app()->end();
				}
				$nopok = $kodefikasi[0];
				$tahunpjk = $kodefikasi[1];
				$bulanpjk = $kodefikasi[2];

				$sql = "";

				$query .= 
				$flag .
				"SELECT
				(
				SELECT
				TRIM(TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA)
				FROM
				TBLDAFTAR
				WHERE
				TBLDAFTAR.TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
				) AS TBLDAFTAR_BADANUSAHANAMA,
				(
				SELECT
				TRIM(TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT)
				FROM
				TBLDAFTAR
				WHERE
				TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NamaTBL.".TBLDAFTAR_NOPOK
				) AS TBLDAFTAR_BADANUSAHAALAMAT,
				".$NamaTBL.".TBLPENDATAAN_THNPAJAK AS TBLPENDATAAN_THNPAJAK,
				".$NamaTBL.".TBLPENDATAAN_BLNPAJAK AS TBLPENDATAAN_BLNPAJAK,
				".$NamaTBL.".TBLPENDATAAN_TGLPAJAK,
				".$NamaTBL.".TBLPENDATAAN_PAJAKKE,
				".$NamaTBL.".TBLDAFTAR_JNSPENDAPATAN,
				".$NamaTBL.".TBLDAFTAR_GOLONGAN,
				".$NamaTBL. ".TBLDAFTAR_NOPOK,
				TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA TBLKECAMATAN_ID,
				TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA TBLKELURAHAN_ID,
				".$NamaTBL.".".$NamaTBL."_REGSURATANGSUR,
				".$NamaTBL.".".$NamaTBL."_THNSURATANGSUR,
				".$NamaTBL.".".$NamaTBL."_BLNSURATANGSUR,
				".$NamaTBL.".".$NamaTBL."_TGLSURATANGSUR,
				".$NamaTBL.".".$NamaTBL."_THNKURANGBAYAR,
				".$NamaTBL.".".$NamaTBL."_BLNKURANGBAYAR,
				".$NamaTBL.".".$NamaTBL."_TGLKURANGBAYAR,
				".$NamaTBL.".".$NamaTBL."_AYTKURANGBAYAR,
				".$NamaTBL.".".$NamaTBL."_REGKURANGBAYAR,
				".$NamaTBL.".".$NamaTBL."_URUTKURANGBAYAR,
				".$NamaTBL.".".$NamaTBL."_".$ADKB.",
				".$NamaTBL.".".$NamaTBL."_BUNGAKRGBAYAR,
				".$NamaTBL.".".$NamaTBL."_".$KNKB.",
				".$NamaTBL.".".$NamaTBL."_BLNKBAWAL,
				".$NamaTBL.".".$NamaTBL."_BLNKBAKHIR,
				".$NamaTBL.".".$NamaTBL."_THNBATASSKPD,
				".$NamaTBL.".".$NamaTBL."_BLNBATASSKPD,
				".$NamaTBL.".".$NamaTBL. "_TGLBATASSKPD,
				TBLANGSURAN.TBLANGSURAN_KETETAPANTOTAL AS RPKB,
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				TBLANGSURAN.TBLANGSURAN_PAJAKKE AS TBLANGSURAN_PAJAKKE,
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				TBLANGSURAN.TBLANGSURAN_DENDAANGSURAN,
				(TBLANGSURAN.TBLANGSURAN_SETORAN + TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN) AS TBLANGSURAN_SETORAN,
				TBLANGSURAN.TBLANGSURAN_SETORAN AS SETORMURNI,
				TBLANGSURAN.TBLANGSURAN_THNSETORANGSURAN,
				TBLANGSURAN.TBLANGSURAN_BLNSETORANGSURAN,
				TBLANGSURAN.TBLANGSURAN_TGLSETORANGSURAN,
				TBLANGSURAN.TBLANGSURAN_THNBATASKETETAPAN,
				TBLANGSURAN.TBLANGSURAN_BLNBATASKETETAPAN,
				TBLANGSURAN.TBLANGSURAN_TGLBATASKETETAPAN,
				( SELECT TRIM(REFKECAMATAN_NAMA) FROM REFKECAMATAN WHERE REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA) REFKECAMATAN_NAMA,
				(SELECT TRIM(REFKELURAHAN_NAMA) FROM REFKELURAHAN WHERE REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA) REFKELURAHAN_NAMA,
				NVL(TBLDAFTAR_BADANUSAHATELP,0) TBLDAFTAR_BADANUSAHATELP
				FROM
				".$NamaTBL. "
				INNER JOIN TBLDAFTAR ON " . $NamaTBL . ".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
				INNER JOIN TBLANGSURAN ON ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = TBLANGSURAN.TBLPENDATAAN_THNPAJAK
				AND ".$NamaTBL.".TBLPENDATAAN_BLNPAJAK = TBLANGSURAN.TBLPENDATAAN_BLNPAJAK
				AND NVL (".$NamaTBL.".TBLPENDATAAN_TGLPAJAK, 0) = NVL (TBLANGSURAN.TBLPENDATAAN_TGLPAJAK, 0)
				AND ".$NamaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
				AND ".$NamaTBL.".TBLDAFTAR_NOPOK IN (".$nopok.")
				AND ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = ".$tahunpjk."
				AND ".$NamaTBL.".TBLPENDATAAN_BLNPAJAK = ".$bulanpjk."
				/*AND TO_DATE (
				CONCAT (
				tblangsuran_blnbatasketetapan,
				CONCAT (
				'/',
				CONCAT (tblangsuran_tglbatasketetapan, CONCAT('/', tblangsuran_thnbatasketetapan))
				)
				),
				'MM/DD/YY'
			) < TO_DATE('$tanggalsurat', 'DD-MM-YYYY')*/
				";
				$flag = "
				UNION
				";
			}
		}

	$ORDER = "
	ORDER BY
	TBLDAFTAR_NOPOK,
	TBLPENDATAAN_THNPAJAK,
	TBLPENDATAAN_BLNPAJAK,
	{$NamaTBL}_REGKURANGBAYAR,
	TBLANGSURAN_PAJAKKE,
	TBLPENDATAAN_TGLPAJAK
	";

	$datax['cetak'] = Yii::app()->db->createCommand($query.$ORDER)->queryAll(); 
	$datax['NamaTBL'] = $NamaTBL;

	$sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 1";

	$datax['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();
		// echo $query.$ORDER;die();
	$utama = array();
	$rows = array();

	// $tanggalsurat = date('d') . ' ' . LokalIndonesia::getBulan(date('m')) . ' ' . date('Y');
	// $GLOBALS['datenow'] = $_REQUEST['tanggalsurat'];
	$GLOBALS['datenow'] = $exp_tanggalsurat[0] . ' ' . LokalIndonesia::getBulan($exp_tanggalsurat[1]) .' ' . $exp_tanggalsurat[2];
	$GLOBALS['tglundangan1'] = $exp_tglawal[0] . ' ' . LokalIndonesia::getBulan($exp_tglawal[1]) .' ' . $exp_tglawal[2];
	$GLOBALS['tglundangan2'] = $exp_tglakhir[0] . ' ' . LokalIndonesia::getBulan($exp_tglakhir[1]) .' ' . $exp_tglakhir[2];
	$GLOBALS['no_surat'] = $_REQUEST['nomor_surat'];
	$GLOBALS['jnspajak'] = $PAJAK;
	$GLOBALS['waktuawal'] = $_REQUEST['waktuawal'];
	$GLOBALS['waktuakhir'] = $_REQUEST['waktuakhir'];
	$GLOBALS['tempt_undangan'] = $_REQUEST['tempt_undangan'];
	$GLOBALS['thnpajak'] = $tahunpjk;
	$GLOBALS['blnkbakhir'] = '';
	$GLOBALS['blnkbawal'] = '';
	$GLOBALS['tanggalangsur'] = '';
	$GLOBALS['regsuratangsur'] = '';
	$GLOBALS['thnsuratangsur'] = '';
	$GLOBALS['jabatan'] = $datax['jab1']['TBLPEJABAT_URAIAN'];
	$GLOBALS['nama'] = $datax['jab1']['TBLPEJABAT_NAMA'];
	$GLOBALS['nip'] = $datax['jab1']['TBLPEJABAT_NIP'];


	$nopok_before = '';
	$bulan_before = '';
	$LOOP_NOPOK = array();
	foreach ($datax['cetak'] as $hal_nopok) :
		$kodeunik = $hal_nopok['TBLDAFTAR_NOPOK'].'-'.$hal_nopok['TBLPENDATAAN_THNPAJAK'].'-'.$hal_nopok['TBLPENDATAAN_BLNPAJAK'];
		if ($bulan_before!=$kodeunik) :
			$bulan_before = $kodeunik ;

			$nomorNPWPD = $hal_nopok['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$hal_nopok['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$hal_nopok['TBLKECAMATAN_ID'])) . '.' . (sprintf('%02d',$hal_nopok['TBLKELURAHAN_ID']));
				$alamatBU = $hal_nopok['TBLDAFTAR_BADANUSAHAALAMAT'];
				$kecbu = !empty($hal_nopok['TBLKECAMATAN_ID']) ? ', ' . $hal_nopok['REFKECAMATAN_NAMA'] : '';
				$kelbu = !empty($hal_nopok['TBLKELURAHAN_ID']) ? ', ' . $hal_nopok['REFKELURAHAN_NAMA'] : '';
				$telp = $hal_nopok['TBLDAFTAR_BADANUSAHATELP'] != '0' ? ', ' . $hal_nopok['TBLDAFTAR_BADANUSAHATELP'] : '';

			$LOOP_NOPOK = array(
				'wp_npwpd' => $nomorNPWPD
				,'nopokhal' => ''
				,'wp_nama' => $hal_nopok['TBLDAFTAR_BADANUSAHANAMA']
				,'wp_alamat' => $alamatBU . $kecbu . $kelbu . $telp
				,'totalangsur' => 0
				,'totalbunga' => 0
				,'totaljumlh' => 0
				,'totaltung' => 0
				,'terbilang' => 0
				, 'detail' => array()
				, 'kodeunik' => $kodeunik
			);
			

			$no = 1;
			foreach ($datax['cetak'] as $kolom) :
				$kodeunike = $kolom['TBLDAFTAR_NOPOK'].'-'.$kolom['TBLPENDATAAN_THNPAJAK'].'-'.$kolom['TBLPENDATAAN_BLNPAJAK'];
				if ($kodeunike==$kodeunik) :

					$BNAMA = trim($kolom['TBLDAFTAR_BADANUSAHANAMA']);
					$NPWPD = $kolom['TBLDAFTAR_JNSPENDAPATAN'] . '.'. $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$kolom['TBLKECAMATAN_ID'])) . '.' . (sprintf('%02d',$kolom['TBLKELURAHAN_ID']));
					$TEMPO = '';
					if (isset($kolom['TBLANGSURAN_TGLBATASKETETAPAN']) && !empty($kolom['TBLANGSURAN_TGLBATASKETETAPAN'])) {
						$TEMPO = $kolom['TBLANGSURAN_TGLBATASKETETAPAN'] . '/' . (sprintf('%02d',$kolom['TBLANGSURAN_BLNBATASKETETAPAN'])) . '/' . ($kolom['TBLANGSURAN_THNBATASKETETAPAN'] +2000);
					}
					$TGLSETOR = '';
					if (isset($kolom['TBLANGSURAN_TGLSETORANGSURAN']) && !empty($kolom['TBLANGSURAN_TGLSETORANGSURAN'])) {
						$TGLSETOR = $kolom['TBLANGSURAN_TGLSETORANGSURAN'] . '/' . (sprintf('%02d',$kolom['TBLANGSURAN_BLNSETORANGSURAN'])) . '/' . ($kolom['TBLANGSURAN_THNSETORANGSURAN'] +2000);
					}

						// $utama['noo'] = null;
					$utama['no'] = $no++;
					$utama['angsuran'] = LokalIndonesia::ribuan($kolom['TBLANGSURAN_ANGSURAN']);
					$utama['bunga'] = LokalIndonesia::ribuan($kolom['TBLANGSURAN_BUNGAANGSURAN']);
					$utama['tgltempo'] = $TEMPO;
					$utama['tglrealisasi'] = $TGLSETOR;
					$utama['jmlh'] = LokalIndonesia::ribuan($kolom['TBLANGSURAN_ANGSURAN']+$kolom['TBLANGSURAN_BUNGAANGSURAN']);
							// $utama['angsuran']+$utama['bunga'];
					$jumlah = $utama['jmlh'];
					if ($TGLSETOR=='') {
						$utama['tunggakan'] = $jumlah;

					} else {
						$utama['tunggakan'] = LokalIndonesia::ribuan($kolom['TBLANGSURAN_ANGSURAN']-$kolom['SETORMURNI']);
					}

						// $Totalsudahbayar['Totalsudahbayar'] += $kolom['TBLANGSURAN_ANGSURAN'];
						// $totalbunga['totalbunga'] += $kolom['TBLANGSURAN_BUNGAANGSURAN'];
						// $totalsetor['totalsetor'] += $kolom['TBLANGSURAN_SETORAN'];

					$LOOP_NOPOK['totalangsur'] += $kolom['TBLANGSURAN_ANGSURAN'];
					$LOOP_NOPOK['totalbunga'] += $kolom['TBLANGSURAN_BUNGAANGSURAN'];
					$LOOP_NOPOK['totaljumlh'] += $kolom['TBLANGSURAN_ANGSURAN']+$kolom['TBLANGSURAN_BUNGAANGSURAN'];

					// BACKUP 2 JULI 2019
					// $LOOP_NOPOK['totaltung'] += (($kolom['TBLANGSURAN_ANGSURAN']+$kolom['TBLANGSURAN_BUNGAANGSURAN'])-$kolom['TBLANGSURAN_SETORAN']);

					if ($TGLSETOR=='') {
						$LOOP_NOPOK['totaltung'] += $kolom['TBLANGSURAN_ANGSURAN']+$kolom['TBLANGSURAN_BUNGAANGSURAN'];
					} else {
						$LOOP_NOPOK['totaltung'] += $kolom['TBLANGSURAN_ANGSURAN']-$kolom['SETORMURNI'];
					}

						// array_push($rows, $utama);
					array_push($LOOP_NOPOK['detail'], $utama);
				endif;
			endforeach;
				// $kolom[$datax['NamaTBL'].'_TGLBATASSKPD']
			if ($hal_nopok[$datax['NamaTBL'].'_TGLSURATANGSUR']==0) {
				$LOOP_NOPOK['tanggalangsur'] = $hal_nopok[$datax['NamaTBL'].'_TGLKURANGBAYAR'] . ' ' . LokalIndonesia::getBulan($hal_nopok[$datax['NamaTBL'].'_BLNKURANGBAYAR']) . ' ' . ($hal_nopok[$datax['NamaTBL'].'_THNKURANGBAYAR'] +2000);
			} else {
				$LOOP_NOPOK['tanggalangsur'] = $hal_nopok[$datax['NamaTBL'].'_TGLSURATANGSUR'] . ' ' . LokalIndonesia::getBulan($hal_nopok[$datax['NamaTBL'].'_BLNSURATANGSUR']) . ' ' . ($hal_nopok[$datax['NamaTBL'].'_THNSURATANGSUR'] +2000);
			}
				
			$LOOP_NOPOK['thnpajak'] = ($hal_nopok['TBLPENDATAAN_THNPAJAK']+2000);

			if ($hal_nopok[$datax['NamaTBL'].'_BLNKBAWAL']==0){
				$LOOP_NOPOK['blnkbawal'] = 'Januari';
			} else {
				$LOOP_NOPOK['blnkbawal'] = LokalIndonesia::getBulan($hal_nopok[$datax['NamaTBL'].'_BLNKBAWAL']);
			}

			if ($hal_nopok[$datax['NamaTBL'].'_BLNKBAKHIR']==0){
				$LOOP_NOPOK['blnkbakhir'] = LokalIndonesia::getBulan($hal_nopok['TBLPENDATAAN_BLNPAJAK']);
			} else {
				$LOOP_NOPOK['blnkbakhir'] = LokalIndonesia::getBulan($hal_nopok[$datax['NamaTBL'].'_BLNKBAKHIR']);
			}

			if ($hal_nopok[$datax['NamaTBL'].'_REGSURATANGSUR']==0){
				$LOOP_NOPOK['regsuratangsur'] = $hal_nopok[$datax['NamaTBL'].'_REGKURANGBAYAR'];	
			} else {
				$LOOP_NOPOK['regsuratangsur'] = $hal_nopok[$datax['NamaTBL'].'_REGSURATANGSUR'];
			}
			
			if ($hal_nopok[$datax['NamaTBL'].'_THNSURATANGSUR']==0){
				$LOOP_NOPOK['thnsuratangsur'] = ($hal_nopok[$datax['NamaTBL'].'_THNKURANGBAYAR']+2000);	
			} else {
				$LOOP_NOPOK['thnsuratangsur'] = ($hal_nopok[$datax['NamaTBL'].'_THNSURATANGSUR']+2000);
			}	
			

			$LOOP_NOPOK['totalangsur']  = LokalIndonesia::ribuan($LOOP_NOPOK['totalangsur']);
			$LOOP_NOPOK['totalbunga']   = LokalIndonesia::ribuan($LOOP_NOPOK['totalbunga']);
			$LOOP_NOPOK['totaljumlh']   = LokalIndonesia::ribuan($LOOP_NOPOK['totaljumlh']);
			$LOOP_NOPOK['totaltung']    = LokalIndonesia::ribuan($totaltung = $LOOP_NOPOK['totaltung']);
			$LOOP_NOPOK['terbilang']    = LokalIndonesia::terbilangangka($totaltung);

			array_push($rows, $LOOP_NOPOK);
		endif;
	endforeach;

		// echo CJSON::encode($rows);Yii::app()->end();


	$header=array();
	$header['wp_nama'] = $BNAMA;
	$header['wp_alamat'] = $alamatBU . $kecbu . $kelbu . $telp;
	$header['wp_npwpd'] = $NPWPD;
	$header['terbilang'] = '';
		// $header['totaltung'] = LokalIndonesia::ribuan($totalsetor['totalsetor']);
		// $header['toangsur'] = LokalIndonesia::ribuan($Totalsudahbayar['Totalsudahbayar']);
		// $header['totalb'] = LokalIndonesia::ribuan($totalbunga['totalbunga']);
	$header['jum'] = '';



	$otbs->MergeBlock('rows', $rows); 
	$otbs->MergeField('header', $header);
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template
	$namafileDL = "Surat Imbauan SKPDA {$PAJAK} {$tanggalsurat}.docx";

	$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
	Yii::app()->end();
}

public function actionCetakdaftar()
{
	$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
	$namatpl = $path_tpl . 'daftar surat himbauan angsuran.docx';
	
	// if (base64_decode($data['jenis'])=='REK') {
		// 	$namatpl = $path_tpl . 'Temp_Teguranrek.docx';
		// 	$namafileDL = "Surat-Teguranrek.docx"; 
		// }

	Yii::import('ext.DMOpenTBS',true);
	Yii::import('ext.LokalIndonesia');
	DMOpenTBS::init();
	$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
	$otbs->NoErr = 0;
	$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

		
		$nomor_surat = $_REQUEST['nomor_surat'] ? $_REQUEST['nomor_surat'] : '';
		$tanggalsurat = $_REQUEST['tanggalsurat'] ? $_REQUEST['tanggalsurat'] : '';
		$tglawal = $_REQUEST['tglawal'] ? $_REQUEST['tglawal'] : '';
		$tglakhir = $_REQUEST['tglakhir'] ? $_REQUEST['tglakhir'] : '';
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
		$TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';
		// $REFKELURAHAN = $_REQUEST['REFKELURAHAN'] ? $_REQUEST['REFKELURAHAN'] : '0';
		// $REFKECAMATAN = $_REQUEST['REFKECAMATAN'] ? $_REQUEST['REFKECAMATAN'] : '0';

		$KODEREK = $_REQUEST['TBLREKENING_KODE'];
		if($KODEREK=='4.1.1.1.0'){
			$NamaTBL = 'TBLDAFTHOTEL';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'KENAIKANKRGBAYAR';
			$PAJAK = 'PAJAK HOTEL';
			// $petugas = 'M. ROHMAD ROMADHON';
			// $nip = '1967121992031002';
			$jab_id = '18';
		}
		elseif($KODEREK=='4.1.1.2.0'){
			$NamaTBL = 'TBLDAFTRMAKAN';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'NAKB';
			$PAJAK = 'PAJAK RESTORAN';
			// $petugas = 'YULI  PURWANTO';
			// $nip = '197407041994021005';
			$jab_id = '19';
		}
		elseif($KODEREK=='4.1.1.3.0'){
			$NamaTBL = 'TBLDAFTHIBURAN';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'NAKB';
			$PAJAK = 'PAJAK HIBURAN';
			// $petugas = 'ELSI NURLITA IKAWATI, A.Md';
			// $nip = '197104121992031003';
			$jab_id = '20';
		}
		elseif($KODEREK=='4.1.1.4.0'){
			$NamaTBL = 'TBLDAFTREKLAME';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'NOJABONG';
			$KNKB = 'NAKB';
			$PAJAK = 'PAJAK REKLAME';
			// $petugas = 'MEYRINA NUR IVADA';
			// $nip = '196903251990031003';
			$jab_id = '23';
		}
		// elseif($KODEREK=='4.1.1.5.0'){
		// 	$NamaTBL = '';
		// }
		elseif($KODEREK=='4.1.1.7.0'){
			$NamaTBL = 'TBLDAFTPARKIR';	
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'NAKB';
			$PAJAK = 'PAJAK PARKIR';
			// $petugas = 'NURWITANTO P';
			// $nip = '';
			$jab_id = '21';
		}
		elseif($KODEREK=='4.1.1.8.0'){
			$NamaTBL = 'TBLDAFTTANAH';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'NAKB';
			$PAJAK = 'PAJAK AIR TANAH';
			// $petugas = 'EKO HERIYANTO';
			// $nip = '196805081992031011';
			$jab_id = '22';
		}
		elseif($KODEREK=='4.1.1.9.0'){
			$NamaTBL = 'TBLDAFTBURUNG';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'NAKB';
			$PAJAK = 'PAJAK SARANG BURUNG WALET';
			// $petugas = 'JOKO SUNGKONO';
			// $nip = '195908081981021007';
		}
		// elseif($KODEREK=='4.1.1.10.0'){
		// 	$NamaTBL = '';
		// }
		elseif($KODEREK=='4.1.1.11.0'){
			$NamaTBL = 'TBLDAFTBPHTB';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'NAKB';
			$PAJAK = 'PAJAK BPHTB';
			// $petugas = '';
			// $nip = '';
		}
		
		$data['filter'] = isset($_REQUEST['data']) ? $_REQUEST['data'] : '';

		if (!empty($data['filter'])) {
			$data['filter'] = explode(',', $data['filter']);
		} else {
			echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak Teguran Pajak Reklame</h3>";
			Yii::app()->end();
		}

		$flag = '';
		$query = '';

		foreach ($data['filter'] as $kodefikasi) {
			$kodefikasi = explode('-', $kodefikasi);
			if (is_array($kodefikasi)) {
				if (!isset($kodefikasi[0])) {
					echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
					Yii::app()->end();
				}
				$nopok = $kodefikasi[0];
				$tahunpjk = $kodefikasi[1];
				

				$query .= 
				$flag .
				"SELECT
				TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR_BADANUSAHAALAMAT,
				TBLPENDATAAN_THNPAJAK,
				TBLPENDATAAN_BLNPAJAK,
				TBLPENDATAAN_TGLPAJAK,
				TBLPENDATAAN_PAJAKKE,
				TBLDAFTAR_NOPOK,
				TBLDAFTAR_GOLONGAN,
				TBLDAFTAR_JNSPENDAPATAN,
				TBLKECAMATAN_ID,
				TBLKELURAHAN_ID,			
				".$NamaTBL."_THNKURANGBAYAR,
				".$NamaTBL."_BLNKURANGBAYAR,
				".$NamaTBL."_TGLKURANGBAYAR,
				".$NamaTBL."_AYTKURANGBAYAR,
				".$NamaTBL."_REGKURANGBAYAR,
				".$NamaTBL."_URUTKURANGBAYAR,
				".$NamaTBL."_DENDAKRGBAYAR,
				".$NamaTBL."_BUNGAKRGBAYAR,	
				".$NamaTBL."_REGSURATANGSUR,
				".$NamaTBL."_THNSURATANGSUR,
				".$NamaTBL."_BLNSURATANGSUR,
				".$NamaTBL."_TGLSURATANGSUR,
				".$NamaTBL."_BLNKBAWAL,
				".$NamaTBL."_BLNKBAKHIR,
				Totaltagihan,
				Totalsudahbayar,
				Hitung,
				Ang1,
				Ang2,
				Ang3,
				Ang4,
				Ang5,
				Ang6,
				Ang7,
				Ang8,
				Ang9,
				Ang10,
				Ang11,
				Ang12,
				(Totaltagihan - Totalsudahbayar) AS sisangasur
				FROM
				(
					SELECT
					(
						SELECT
						TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
						FROM
						TBLDAFTAR
						WHERE
						TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NamaTBL.".TBLDAFTAR_NOPOK
						) AS TBLDAFTAR_BADANUSAHANAMA,
						(
							SELECT
						TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
						FROM
						TBLDAFTAR
						WHERE
						TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NamaTBL.".TBLDAFTAR_NOPOK
					) AS TBLDAFTAR_BADANUSAHAALAMAT,
					".$NamaTBL.".TBLPENDATAAN_THNPAJAK,
					".$NamaTBL.".TBLPENDATAAN_BLNPAJAK,
					".$NamaTBL.".TBLPENDATAAN_TGLPAJAK,
					".$NamaTBL.".TBLPENDATAAN_PAJAKKE,
					".$NamaTBL.".TBLDAFTAR_NOPOK,
					".$NamaTBL.".TBLDAFTAR_JNSPENDAPATAN,
					".$NamaTBL.".TBLKECAMATAN_ID,
					".$NamaTBL.".TBLKELURAHAN_ID,
					".$NamaTBL.".TBLDAFTAR_GOLONGAN,
					".$NamaTBL.".".$NamaTBL."_THNKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_BLNKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_TGLKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_AYTKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_REGKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_URUTKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_DENDAKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_BUNGAKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_REGSURATANGSUR,
					".$NamaTBL.".".$NamaTBL."_THNSURATANGSUR,
					".$NamaTBL.".".$NamaTBL."_BLNSURATANGSUR,
					".$NamaTBL.".".$NamaTBL."_TGLSURATANGSUR,
					".$NamaTBL.".".$NamaTBL."_BLNKBAWAL,
					".$NamaTBL.".".$NamaTBL."_BLNKBAKHIR,
					COUNT (
						".$NamaTBL.".TBLDAFTAR_NOPOK
					) AS hitung,
					SUM (
						NVL (
							TBLANGSURAN.TBLANGSURAN_ANGSURAN,
							0
						) + NVL (TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN, 0)
					) AS Totaltagihan,
					SUM (CASE
						WHEN TBLANGSURAN.TBLANGSURAN_SETORAN IS NOT NULL THEN
						NVL (
							TBLANGSURAN.TBLANGSURAN_SETORAN,
							0
							) + NVL (TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN, 0) ELSE
						0
						END
					) AS Totalsudahbayar,
					SUM (
						CASE
						WHEN TBLANGSURAN.TBLANGSURAN_PAJAKKE = 1
						THEN
						NVL (
							TBLANGSURAN.TBLANGSURAN_ANGSURAN,
							0
						) + NVL (
							TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
							0
							)
						ELSE
						0
						END
					) AS ang1,
					SUM (
						CASE
						WHEN TBLANGSURAN.TBLANGSURAN_PAJAKKE = 2
						THEN
						NVL (
							TBLANGSURAN.TBLANGSURAN_ANGSURAN,
							0
							) + NVL (
								TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
								0
								)
								ELSE
								0
						END
					) AS ang2,
					SUM (
						CASE
						WHEN TBLANGSURAN.TBLANGSURAN_PAJAKKE = 3
						THEN
						NVL (
							TBLANGSURAN.TBLANGSURAN_ANGSURAN,
							0
							) + NVL (
								TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
							0
						)
						ELSE
						0
						END
					) AS ang3,
					SUM (
						CASE
						WHEN TBLANGSURAN.TBLANGSURAN_PAJAKKE = 4
						THEN
						NVL (
							TBLANGSURAN.TBLANGSURAN_ANGSURAN,
							0
						) + NVL (
							TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
							0
						)
						ELSE
						0
						END
					) AS ang4,
					SUM (
						CASE
						WHEN TBLANGSURAN.TBLANGSURAN_PAJAKKE = 5
						THEN
						NVL (
							TBLANGSURAN.TBLANGSURAN_ANGSURAN,
							0
						) + NVL (
							TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
							0
						)
						ELSE
						0
						END
						) AS ang5,
					SUM (
						CASE
						WHEN TBLANGSURAN.TBLANGSURAN_PAJAKKE = 6
						THEN
						NVL (
							TBLANGSURAN.TBLANGSURAN_ANGSURAN,
							0
						) + NVL (
							TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
							0
						)
						ELSE
						0
						END
					) AS ang6,
					SUM (
						CASE
						WHEN TBLANGSURAN.TBLANGSURAN_PAJAKKE = 7
						THEN
						NVL (
							TBLANGSURAN.TBLANGSURAN_ANGSURAN,
							0
						) + NVL (
							TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
							0
						)
						ELSE
						0
						END
					) AS ang7,
					SUM (
						CASE
						WHEN TBLANGSURAN.TBLANGSURAN_PAJAKKE = 8
						THEN
						NVL (
							TBLANGSURAN.TBLANGSURAN_ANGSURAN,
							0
						) + NVL (
							TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
							0
							)
						ELSE
						0
						END
						) AS ang8,
					SUM (
						CASE
						WHEN TBLANGSURAN.TBLANGSURAN_PAJAKKE = 9
						THEN
						NVL (
							TBLANGSURAN.TBLANGSURAN_ANGSURAN,
							0
						) + NVL (
							TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
							0
						)
						ELSE
						0
						END
					) AS ang9,
					SUM (
						CASE
						WHEN TBLANGSURAN.TBLANGSURAN_PAJAKKE = 10
						THEN
						NVL (
							TBLANGSURAN.TBLANGSURAN_ANGSURAN,
							
							0
						) + NVL (
							TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
							0
						)
						ELSE
						0
						END
					) AS ang10,
					SUM (
						CASE
						WHEN TBLANGSURAN.TBLANGSURAN_PAJAKKE = 11
						THEN
						NVL (
							TBLANGSURAN.TBLANGSURAN_ANGSURAN,
							0
						) + NVL (
							TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
							0
						)
						ELSE
						0
						END
					) AS ang11,
					SUM (
						CASE
						WHEN TBLANGSURAN.TBLANGSURAN_PAJAKKE = 12
						THEN
						NVL (
							TBLANGSURAN.TBLANGSURAN_ANGSURAN,
							0
						) + NVL (
							TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
							0
						)
						ELSE
						0
						END
					) AS ang12
					FROM
					".$NamaTBL."
					INNER JOIN TBLANGSURAN ON ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = TBLANGSURAN.TBLPENDATAAN_THNPAJAK
					AND ".$NamaTBL.".TBLPENDATAAN_BLNPAJAK = TBLANGSURAN.TBLPENDATAAN_BLNPAJAK
					AND NVL (".$NamaTBL.".TBLPENDATAAN_TGLPAJAK, 0) = NVL (TBLANGSURAN.TBLPENDATAAN_TGLPAJAK, 0)
					AND ".$NamaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
					/*WHERE TO_DATE (
					CONCAT (
					tblangsuran_blnbatasketetapan,
					CONCAT (
					'/',
					CONCAT (tblangsuran_tglbatasketetapan, CONCAT('/', tblangsuran_thnbatasketetapan))
					)
					),
					'MM/DD/YY'
					) < TO_DATE('$tanggalsurat', 'DD-MM-YYYY')*/
					GROUP BY
					".$NamaTBL.".TBLPENDATAAN_THNPAJAK,
					".$NamaTBL.".TBLPENDATAAN_BLNPAJAK,
					".$NamaTBL.".TBLPENDATAAN_TGLPAJAK,
					".$NamaTBL.".TBLPENDATAAN_PAJAKKE,
					".$NamaTBL.".TBLDAFTAR_NOPOK,
					".$NamaTBL.".TBLDAFTAR_JNSPENDAPATAN,
					".$NamaTBL.".TBLKECAMATAN_ID,
					".$NamaTBL.".TBLKELURAHAN_ID,
					".$NamaTBL.".TBLDAFTAR_GOLONGAN,
					".$NamaTBL.".".$NamaTBL."_THNKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_BLNKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_TGLKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_AYTKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_REGKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_URUTKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_DENDAKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_BUNGAKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_REGSURATANGSUR,
					".$NamaTBL.".".$NamaTBL."_THNSURATANGSUR,
					".$NamaTBL.".".$NamaTBL."_BLNSURATANGSUR,
					".$NamaTBL.".".$NamaTBL."_TGLSURATANGSUR,
					".$NamaTBL.".".$NamaTBL."_BLNKBAWAL,
					".$NamaTBL.".".$NamaTBL."_BLNKBAKHIR
				)
				WHERE
				NVL (".$NamaTBL."_REGKURANGBAYAR, 0) > 0
				AND NVL (
					Totaltagihan - Totalsudahbayar,
					0
				) > 0
				AND TBLDAFTAR_NOPOK = ".$nopok."
				AND TBLPENDATAAN_THNPAJAK = ".$tahunpjk."
				
				";

				$flag = "
				UNION
				";
			}
		}
		$ORDER = "					
		ORDER BY
		TBLDAFTAR_NOPOK,
		TBLPENDATAAN_THNPAJAK,
		TBLPENDATAAN_BLNPAJAK,
		{$NamaTBL}_REGSURATANGSUR,
		TBLPENDATAAN_TGLPAJAK";

		$datax['cetak'] = Yii::app()->db->createCommand($query.$ORDER)->queryAll(); 
		$datax['NamaTBL'] = $NamaTBL;

		$sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 1";
		$sql2="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 3";
		$sql3="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 8";	
		$sql4="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = ".$jab_id."";	

		$data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();
		$data['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();
		$data['jab3'] = Yii::app()->db->createCommand($sql3)->queryRow();
		$data['jab4'] = Yii::app()->db->createCommand($sql4)->queryRow();

		$utama = array();
		$rows = array();

		$tanggalsurat = date('d') . ' ' . LokalIndonesia::getBulan(date('m')) . ' ' . date('Y');

		$GLOBALS['nosurat'] = $_REQUEST['nomor_surat'];
		$GLOBALS['jnspajak'] = $PAJAK;
		$GLOBALS['datenow'] = $tanggalsurat;
		$GLOBALS['jabatan1'] = $data['jab1']['TBLPEJABAT_URAIAN'];
		$GLOBALS['petugas1'] = $data['jab1']['TBLPEJABAT_NAMA'];
		$GLOBALS['nip1'] = $data['jab1']['TBLPEJABAT_NIP'];
		$GLOBALS['jabatan2'] = $data['jab2']['TBLPEJABAT_URAIAN'];
		$GLOBALS['petugas2'] = $data['jab2']['TBLPEJABAT_NAMA'];
		$GLOBALS['nip2'] = $data['jab2']['TBLPEJABAT_NIP'];
		$GLOBALS['jabatan3'] = $data['jab3']['TBLPEJABAT_URAIAN'];
		$GLOBALS['petugas3'] = $data['jab3']['TBLPEJABAT_NAMA'];
		$GLOBALS['nip3'] = $data['jab3']['TBLPEJABAT_NIP'];
		$GLOBALS['jabatan4'] = $data['jab4']['TBLPEJABAT_URAIAN'];
		$GLOBALS['petugas4'] = $data['jab4']['TBLPEJABAT_NAMA'];
		$GLOBALS['nip4'] = $data['jab4']['TBLPEJABAT_NIP'];

		$total=array('total'=>0);
		$no = 1;
		foreach ($datax['cetak'] as $kolom) :
			$BNAMA = trim($kolom['TBLDAFTAR_BADANUSAHANAMA']);
			$BAL = trim($kolom['TBLDAFTAR_BADANUSAHAALAMAT']);
			$NPWPD = $kolom['TBLDAFTAR_JNSPENDAPATAN'] . '.'. $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$kolom['TBLKECAMATAN_ID'])) . '.' . (sprintf('%02d',$kolom['TBLKELURAHAN_ID']));
			$THSKA = trim($kolom[$datax['NamaTBL'].'_THNSURATANGSUR'] +2000);
			$MSPAJAK = LokalIndonesia::getBulan($kolom[$datax['NamaTBL'].'_BLNKBAWAL']) . ' ' . ($kolom['TBLPENDATAAN_THNPAJAK'] +2000);
			$MSPAJAKA = LokalIndonesia::getBulan($kolom[$datax['NamaTBL'].'_BLNKBAKHIR']) . ' ' . ($kolom['TBLPENDATAAN_THNPAJAK'] +2000);
			$MSPAJAK1 = 'Januari' . ' ' . ($kolom['TBLPENDATAAN_THNPAJAK'] +2000);
			$MSPAJAKA1 = LokalIndonesia::getBulan($kolom['TBLPENDATAAN_BLNPAJAK']) . ' ' . ($kolom['TBLPENDATAAN_THNPAJAK'] +2000);

			$utama['no'] = $no++;
			$utama['namawp'] = $BNAMA;
			$utama['alamatwp'] = $BAL;
			$utama['npwpd'] = $NPWPD;
			$utama['tunggakan'] = LokalIndonesia::ribuan($kolom['TOTALTAGIHAN']);
			$utama['ke1'] = 'Angsur Ke';
			$utama['rpang'] = 'Rupiah Angsuran';
			$utama['ang1'] = LokalIndonesia::ribuan($kolom['ANG1']);
			$utama['ang2'] = LokalIndonesia::ribuan($kolom['ANG2']);
			$utama['ang3'] = LokalIndonesia::ribuan($kolom['ANG3']);
			$utama['ang4'] = LokalIndonesia::ribuan($kolom['ANG4']);
			$utama['ang5'] = LokalIndonesia::ribuan($kolom['ANG5']);
			$utama['ang6'] = LokalIndonesia::ribuan($kolom['ANG6']);
			$utama['ang7'] = LokalIndonesia::ribuan($kolom['ANG7']);
			$utama['ang8'] = LokalIndonesia::ribuan($kolom['ANG8']);
			$utama['ang9'] = LokalIndonesia::ribuan($kolom['ANG9']);
			$utama['ang10'] = LokalIndonesia::ribuan($kolom['ANG10']);
			$utama['ang11'] = LokalIndonesia::ribuan($kolom['ANG11']);
			$utama['ang12'] = LokalIndonesia::ribuan($kolom['ANG12']);
			$utama['jthtempo'] = 'Jatuh Tempo';

			if ($kolom[$datax['NamaTBL'].'_THNSURATANGSUR']==null || $kolom[$datax['NamaTBL'].'_THNSURATANGSUR']==0){
				$utama['thnang'] = ($kolom[$datax['NamaTBL'].'_THNKURANGBAYAR'] +2000);
			} else {
				$utama['thnang'] = $THSKA;
			}

			if ($kolom[$datax['NamaTBL'].'_BLNKBAWAL']==null || $kolom[$datax['NamaTBL'].'_BLNKBAWAL']==0){
				$utama['masapajak'] = $MSPAJAK1 . ' s/d ' . $MSPAJAKA1;
			} else {
				$utama['masapajak'] = $MSPAJAK . ' s/d ' . $MSPAJAKA;
			}
				
			$utama['rupiahsetor'] = LokalIndonesia::ribuan($kolom['SISANGASUR']);

			$total['total'] += trim($kolom['SISANGASUR']);

			array_push($rows, $utama);
		endforeach;
		$header=array();
		$header['total'] = LokalIndonesia::ribuan($total['total']);


		$otbs->MergeBlock('utama', $rows); 
		$otbs->MergeField('header', $header);
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template
		$namafileDL = "Daftar Imbauan SKPDA {$PAJAK} {$tanggalsurat}.docx";

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}

	public function actionSimpan()
	{
		$nomor_surat = $_REQUEST['nomor_surat'] ? $_REQUEST['nomor_surat'] : '';
		$tanggalsurat = $_REQUEST['tanggalsurat'] ? $_REQUEST['tanggalsurat'] : '';

		$KODEREK = $_REQUEST['TBLREKENING_KODE'];
		if ($KODEREK == '4.1.1.1.0') {
			$NamaTBL = 'TBLDAFTHOTEL';
		} elseif ($KODEREK == '4.1.1.2.0') {
			$NamaTBL = 'TBLDAFTRMAKAN';
		} elseif ($KODEREK == '4.1.1.3.0') {
			$NamaTBL = 'TBLDAFTHIBURAN';
		} elseif ($KODEREK == '4.1.1.4.0') {
			$NamaTBL = 'TBLDAFTREKLAME';
		} elseif ($KODEREK == '4.1.1.7.0') {
			$NamaTBL = 'TBLDAFTPARKIR';
		} elseif ($KODEREK == '4.1.1.8.0') {
			$NamaTBL = 'TBLDAFTTANAH';
		} elseif ($KODEREK == '4.1.1.9.0') {
			$NamaTBL = 'TBLDAFTBURUNG';
		} elseif ($KODEREK == '4.1.1.11.0') {
			$NamaTBL = 'TBLDAFTBPHTB';
		}
		$data['filter'] = isset($_REQUEST['data']) ? $_REQUEST['data'] : '';

		if (!empty($data['filter'])) {
			$data['filter'] = explode(',', $data['filter']);
		} else {
			echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak himbauan SKPD-A</h3>";
			Yii::app()->end();
		}
		$flag2 = '';
		$sql = '';
		foreach ($data['filter'] as $kodefikasi) {
			$kodefikasi = explode('-', $kodefikasi);
			if (is_array($kodefikasi)) {
				if (!isset($kodefikasi[0])) {
					echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak himbauan SKPD-A</h3>";
					Yii::app()->end();
				}
				$nopok = $kodefikasi[0];
				$tahunpjk = $kodefikasi[1];
				$bulanpjk = $kodefikasi[2];

				$sql .=
					$flag2 .
					"SELECT
				(
				SELECT
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
				FROM
				TBLDAFTAR
				WHERE
				TBLDAFTAR.TBLDAFTAR_NOPOK = " . $NamaTBL . ".TBLDAFTAR_NOPOK
				) AS TBLDAFTAR_BADANUSAHANAMA,
				(
				SELECT
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
				FROM
				TBLDAFTAR
				WHERE
				TBLDAFTAR.TBLDAFTAR_NOPOK = " . $NamaTBL . ".TBLDAFTAR_NOPOK
				) AS TBLDAFTAR_BADANUSAHAALAMAT,
				" . $NamaTBL . ".TBLPENDATAAN_THNPAJAK AS TBLPENDATAAN_THNPAJAK,
				" . $NamaTBL . ".TBLPENDATAAN_BLNPAJAK AS TBLPENDATAAN_BLNPAJAK,
				" . $NamaTBL . ".TBLDAFTAR_NOPOK AS TBLDAFTAR_NOPOK,
				" . $NamaTBL . ".TBLDAFTAR_GOLONGAN AS TBLDAFTAR_GOLONGAN,
				" . $NamaTBL . ".TBLKECAMATAN_ID AS TBLKECAMATAN_ID,
				" . $NamaTBL . ".TBLKELURAHAN_ID AS TBLKELURAHAN_ID,
				" . $NamaTBL . ".TBLPENDATAAN_TGLPAJAK,
				" . $NamaTBL . ".TBLPENDATAAN_PAJAKKE,
				" . $NamaTBL . "." . $NamaTBL . "_REGKURANGBAYAR,
				" . $NamaTBL . "." . $NamaTBL . "_REKAYAT AS AYAT
				FROM
				" . $NamaTBL . "
				WHERE
				" . $NamaTBL . ".TBLDAFTAR_NOPOK IN (" . $nopok . ")
				AND " . $NamaTBL . ".TBLPENDATAAN_THNPAJAK = " . $tahunpjk . "
				AND " . $NamaTBL . ".TBLPENDATAAN_BLNPAJAK = " . $bulanpjk . "
				AND NVL(" . $NamaTBL . ".TBLPENDATAAN_TGLPAJAK,0) = 0
				";
				$flag2 = "
				UNION
				";
			}
		}
		$ORDER2 = "
		ORDER BY
		TBLDAFTAR_NOPOK,
		TBLPENDATAAN_THNPAJAK,
		TBLPENDATAAN_BLNPAJAK,
		{$NamaTBL}_REGKURANGBAYAR,
		TBLPENDATAAN_TGLPAJAK
		";

		$datax['savehistori'] = Yii::app()->db->createCommand($sql . $ORDER2)->queryAll();
		$tblpenggunaid = Yii::app()->user->pengguna_id;

		foreach ($datax['savehistori'] as $kolom) {
			$tglteguran = date('Y-m-d H:i:s', strtotime($tanggalsurat));

			$himbauanid = $this->Cekexisthimbauan($kolom['TBLPENDATAAN_THNPAJAK'], $kolom['TBLPENDATAAN_BLNPAJAK'], $kolom['TBLDAFTAR_NOPOK'], $tglteguran);
			if (empty($himbauanid)) {

				$inserthistori = "INSERT INTO TBLHIMBAUAN (THP, BLP, NOPOK, NOHIMBAUAN, TGLHIMBAUAN, NAMA_WP, ALAMAT, NPWPD, JENIS, STATUS_DATA, TBLPENGGUNA_ID) 
					VALUES (
					" . $kolom['TBLPENDATAAN_THNPAJAK'] . ",
					" . $kolom['TBLPENDATAAN_BLNPAJAK'] . ",
					" . $kolom['TBLDAFTAR_NOPOK'] . ",
					" . $nomor_surat . ", 
					TO_DATE('" . $tglteguran . "', 'YYYY-MM-DD HH24:MI:SS'),
					'" . $kolom['TBLDAFTAR_BADANUSAHANAMA'] . "',
					'" . $kolom['TBLDAFTAR_BADANUSAHAALAMAT'] . "',
					'" . $kolom['TBLDAFTAR_GOLONGAN'] . "." . (sprintf('%07d', $kolom['TBLDAFTAR_NOPOK'])) . "." . (sprintf('%02d', $kolom['TBLKECAMATAN_ID'])) . "." . (sprintf('%02d', $kolom['TBLKELURAHAN_ID'])) . "',
					" . $kolom['AYAT'] . ",
					'SKPD-A',
					$tblpenggunaid
					)";
				$inserthistori = Yii::app()->db->createCommand($inserthistori);
				if ($inserthistori->execute()) {
					echo json_encode(array('status' => 'success'));
				}
			} else {
				echo json_encode(array('status' => 'exist'));
			}
		}
	}

	public function Cekexisthimbauan($thp, $blp, $nopok, $tgl)
	{
		$now = date('Y-m-d');
		$himbauanid = Yii::app()->db->createCommand("SELECT TBLHIMBAUAN_ID FROM TBLHIMBAUAN WHERE THP = {$thp} AND BLP = {$blp} AND NOPOK = {$nopok} AND TGLHIMBAUAN = TO_DATE('{$tgl}', 'YYYY-MM-DD HH24:MI:SS') AND STATUS_DATA = 'SKPD-A' ")->queryScalar();
		return $himbauanid;
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