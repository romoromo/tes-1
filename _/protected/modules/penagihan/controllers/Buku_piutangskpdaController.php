<?php

class Buku_piutangskpdaController extends Controller
{
	public function actionIndex()
	{
		$data['rek'] = Yii::app()->db->createCommand('
			SELECT
			*
			FROM
			TBLREKENING
			WHERE
			TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			')->queryAll();
		$this->renderPartial('index',array('data'=>$data));
	}

	public function actionCari()
	{
		$TBLPENDATAAN_THNPAJAKA = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) : '' ;
		$TBLPENDATAAN_THNPAJAKK = substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) : '' ;
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';

		$AYAT = $_REQUEST['TBLREKENING_KODE'];

		if($AYAT=='4.1.1.1.0'){
			$namaTBL = 'TBLDAFTHOTEL';
			$judul = 'PAJAK HOTEL';
			$NAKB = 'DENDAKRGBAYAR';
			$REKAYAT = '1';
		}
		elseif($AYAT=='4.1.1.2.0'){
			$namaTBL= 'TBLDAFTRMAKAN';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$REKAYAT = '2';
		}
		elseif($AYAT=='4.1.1.3.0'){
			$namaTBL= 'TBLDAFTHIBURAN';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$REKAYAT = '3';
		}
		elseif($AYAT=='4.1.1.4.0'){
			$namaTBL= 'TBLDAFTREKLAME';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$REKAYAT = '4';
		}
		elseif($AYAT=='4.1.1.7.0'){
			$namaTBL= 'TBLDAFTPARKIR';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$REKAYAT = '7';
		}
		elseif($AYAT=='4.1.1.8.0'){
			$namaTBL= 'TBLDAFTTANAH';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$REKAYAT = '8';
		}
		elseif($AYAT=='4.1.1.9.0'){
			$namaTBL= 'TBLDAFTBURUNG';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$REKAYAT = '9';
		}

		$tunggakan2 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) + 1 ;
		$tunggakan3 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) + 2 ;
		$tunggakan4 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) + 3 ;
		
		if($TBLDAFTAR_NOPOK==''){
			$wherenopok = "";

		}

		else{
			$wherenopok = "AND
			".$namaTBL.".TBLDAFTAR_NOPOK = ".$TBLDAFTAR_NOPOK."";
		};


		$sql = "SELECT
		TBLDAFTAR_GOLONGAN,
		TBLDAFTAR_NOPOK,
		TBLKECAMATAN_ID,
		TBLKELURAHAN_ID,
		TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR_BADANUSAHAALAMAT,
		SUM (tunggakan1) AS tunggakan1,
		SUM (tunggakan2) AS tunggakan2,
		SUM (tunggakan3) AS tunggakan3,
		SUM (tunggakan4) AS tunggakan4,
		SUM (tunggakan5) AS tunggakan5,
		SUM (total) AS Total
		FROM
		(
			SELECT
			TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR_BADANUSAHAALAMAT,
			TBLDAFTAR_GOLONGAN,
			TBLDAFTAR_NOPOK,
			TBLKECAMATAN_ID,
			TBLKELURAHAN_ID,
			SUM (
				CASE
				WHEN TBLANGSURAN_THNBATASKETETAPAN = ".$TBLPENDATAAN_THNPAJAKA." THEN
				NVL (KETETAPANPOKOK, 0) + NVL (KETETAPANDENDA, 0) + NVL (KETETAPANBUNGA, 0)
				ELSE
				0
				END
				) AS tunggakan1,
			SUM (
				CASE
				WHEN TBLANGSURAN_THNBATASKETETAPAN = ".$tunggakan2." THEN
				NVL (KETETAPANPOKOK, 0) + NVL (KETETAPANDENDA, 0) + NVL (KETETAPANBUNGA, 0)
				ELSE
				0
				END
				) AS tunggakan2,
			SUM (
				CASE
				WHEN TBLANGSURAN_THNBATASKETETAPAN = ".$tunggakan3." THEN
				NVL (KETETAPANPOKOK, 0) + NVL (KETETAPANDENDA, 0) + NVL (KETETAPANBUNGA, 0)
				ELSE
				0
				END
				) AS tunggakan3,
			SUM (
				CASE
				WHEN TBLANGSURAN_THNBATASKETETAPAN = ".$tunggakan4." THEN
				NVL (KETETAPANPOKOK, 0) + NVL (KETETAPANDENDA, 0) + NVL (KETETAPANBUNGA, 0)
				ELSE
				0
				END
				) AS tunggakan4,
			SUM (
				CASE
				WHEN TBLANGSURAN_THNBATASKETETAPAN = ".$TBLPENDATAAN_THNPAJAKK." THEN
				NVL (KETETAPANPOKOK, 0) + NVL (KETETAPANDENDA, 0) + NVL (KETETAPANBUNGA, 0)
				ELSE
				0
				END
				) AS tunggakan5,
			SUM (
				CASE
				WHEN NVL (TBLANGSURAN_THNBATASKETETAPAN, 0) <> 0 THEN
				NVL (KETETAPANPOKOK, 0) + NVL (KETETAPANDENDA, 0) + NVL (KETETAPANBUNGA, 0)
				ELSE
				0
				END
				) AS total
			FROM
			(
				SELECT
				(
					SELECT
					TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
					FROM
					TBLDAFTAR
					WHERE
					TBLDAFTAR.TBLDAFTAR_NOPOK = ".$namaTBL.".TBLDAFTAR_NOPOK
					) AS TBLDAFTAR_BADANUSAHANAMA,
			(
				SELECT
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
				FROM
				TBLDAFTAR
				WHERE
				TBLDAFTAR.TBLDAFTAR_NOPOK = ".$namaTBL.".TBLDAFTAR_NOPOK
				) AS TBLDAFTAR_BADANUSAHAALAMAT,
			".$namaTBL.".TBLDAFTAR_GOLONGAN,
			".$namaTBL.".TBLDAFTAR_NOPOK,
			".$namaTBL.".TBLKECAMATAN_ID,
			".$namaTBL.".TBLKELURAHAN_ID,
			TBLANGSURAN.TBLANGSURAN_THNBATASKETETAPAN,
			SUM (NVL(TBLANGSURAN.tblangsuran_ketetapantotal, 0)) AS KETETAPANTOTAL,
			SUM (NVL(TBLANGSURAN.tblangsuran_angsuran, 0)) AS KETETAPANPOKOK,
			SUM (NVL(TBLANGSURAN.tblangsuran_setoran, 0)) AS KETETAPANBAYAR,
			SUM (NVL(TBLANGSURAN.tblangsuran_dendaangsuran, 0)) AS KETETAPANDENDA,
			SUM (NVL(TBLANGSURAN.tblangsuran_bungaangsuran, 0)) AS KETETAPANBUNGA
			FROM
			".$namaTBL."
			INNER JOIN TBLANGSURAN ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
			AND ".$namaTBL.".TBLPENDATAAN_THNPAJAK = TBLANGSURAN.TBLPENDATAAN_THNPAJAK
			AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = TBLANGSURAN.TBLPENDATAAN_BLNPAJAK
			WHERE
			NVL (tblangsuran_setoran, 0) = 0
			AND TBLANGSURAN.TBLANGSURAN_THNBATASKETETAPAN BETWEEN ".$TBLPENDATAAN_THNPAJAKA."
			AND ".$TBLPENDATAAN_THNPAJAKK."
			".$wherenopok."
			GROUP BY
			TBLANGSURAN.TBLANGSURAN_THNBATASKETETAPAN,
			".$namaTBL."_REGSURATANGSUR,
			".$namaTBL.".TBLPENDATAAN_THNPAJAK,
			".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
			".$namaTBL.".TBLDAFTAR_GOLONGAN,
			".$namaTBL.".TBLDAFTAR_NOPOK,
			".$namaTBL.".TBLKECAMATAN_ID,
			".$namaTBL.".TBLKELURAHAN_ID
			)
			GROUP BY
			TBLDAFTAR_GOLONGAN,
			TBLDAFTAR_NOPOK,
			TBLKECAMATAN_ID,
			TBLKELURAHAN_ID,
			TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR_BADANUSAHAALAMAT
			UNION
			SELECT
			TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR_BADANUSAHAALAMAT,
			TBLDAFTAR_GOLONGAN,
			TBLDAFTAR_NOPOK,
			TBLKECAMATAN_ID,
			TBLKELURAHAN_ID,
			SUM (tunggakan1) AS tunggakan1,
			SUM (tunggakan2) AS tunggakan2,
			SUM (tunggakan3) AS tunggakan3,
			SUM (tunggakan4) AS tunggakan4,
			SUM (tunggakan5) AS tunggakan5,
			SUM (total) AS total
			FROM
			(
				SELECT
				TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR_BADANUSAHAALAMAT,
				".$namaTBL.".TBLDAFTAR_GOLONGAN,
				".$namaTBL.".TBLDAFTAR_NOPOK,
				".$namaTBL.".TBLKECAMATAN_ID,
				".$namaTBL.".TBLKELURAHAN_ID,
				SUM (
					CASE
					WHEN ".$namaTBL."_THNBTSKRGBAYAR = ".$TBLPENDATAAN_THNPAJAKA." THEN
					".$namaTBL."_RUPIAHKRGBAYAR
					ELSE
					0
					END
					) AS tunggakan1,
			SUM (
				CASE
				WHEN ".$namaTBL."_THNBTSKRGBAYAR = ".$tunggakan2." THEN
				".$namaTBL."_RUPIAHKRGBAYAR
				ELSE
				0
				END
				) AS tunggakan2,
			SUM (
				CASE
				WHEN ".$namaTBL."_THNBTSKRGBAYAR = ".$tunggakan3." THEN
				".$namaTBL."_RUPIAHKRGBAYAR
				ELSE
				0
				END
				) AS tunggakan3,
			SUM (
				CASE
				WHEN ".$namaTBL."_THNBTSKRGBAYAR = ".$tunggakan4." THEN
				".$namaTBL."_RUPIAHKRGBAYAR
				ELSE
				0
				END
				) AS tunggakan4,
			SUM (
				CASE
				WHEN ".$namaTBL."_THNBTSKRGBAYAR = ".$TBLPENDATAAN_THNPAJAKK." THEN
				".$namaTBL."_RUPIAHKRGBAYAR
				ELSE
				0
				END
				) AS tunggakan5,
			SUM (
				CASE
				WHEN NVL (".$namaTBL."_THNBTSKRGBAYAR, 0) <> 0 THEN
				".$namaTBL."_RUPIAHKRGBAYAR
				ELSE
				0
				END
				) AS total
			FROM
			".$namaTBL."
			INNER JOIN TBLDAFTAR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
			WHERE
			NVL (".$namaTBL."_RUPIAHSETOR, 0) <> ".$namaTBL."_PAJAKPERIKSA
			AND NVL (".$namaTBL."_REGKURANGBAYAR, 0) > 0
			AND NVL (".$namaTBL."_RUPIAHKRGBAYAR, 0) > 0
			AND NVL (".$namaTBL."_REGSURATANGSUR, 0) = 0
			AND ".$namaTBL."_THNBTSKRGBAYAR BETWEEN ".$TBLPENDATAAN_THNPAJAKA."
			AND ".$TBLPENDATAAN_THNPAJAKK."
			".$wherenopok."
			GROUP BY
			".$namaTBL.".TBLDAFTAR_GOLONGAN,
			".$namaTBL.".TBLDAFTAR_NOPOK,
			".$namaTBL.".TBLKECAMATAN_ID,
			".$namaTBL.".TBLKELURAHAN_ID,
			TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR_BADANUSAHAALAMAT,
			".$namaTBL.".TBLPENDATAAN_THNPAJAK,
			".$namaTBL.".TBLPENDATAAN_BLNPAJAK
			)
			GROUP BY
			TBLDAFTAR_GOLONGAN,
			TBLDAFTAR_NOPOK,
			TBLKECAMATAN_ID,
			TBLKELURAHAN_ID,
			TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR_BADANUSAHAALAMAT
			)
			GROUP BY
			TBLDAFTAR_GOLONGAN,
			TBLDAFTAR_NOPOK,
			TBLKECAMATAN_ID,
			TBLKELURAHAN_ID,
			TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR_BADANUSAHAALAMAT";

			$data['cari'] = $cari = Yii::app()->db->createCommand($sql)->queryAll();
			$data['judul'] = $judul;

			$this->renderpartial('tabel_laporan',array('data'=>$data));
}

public function actionCetak()
{
	$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_penagihan' . DIRECTORY_SEPARATOR;
	$namatpl = $path_tpl . 'BUKU PIUTANG SKPDKB.docx';
	$namafileDL = "Buku Piutang SKPDKB.docx";

	Yii::import('ext.DMOpenTBS',true);
	Yii::import('ext.LokalIndonesia');
	DMOpenTBS::init();
	$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
	$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8);

	$TBLPENDATAAN_THNPAJAKA = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) : '' ;
	$TBLPENDATAAN_THNPAJAKK = substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) : '' ;
	$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
	$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';

	$AYAT = $_REQUEST['TBLREKENING_KODE'];

	if($AYAT=='4.1.1.1.0'){
		$namaTBL = 'TBLDAFTHOTEL';
		$judul = 'PAJAK HOTEL';
		$NAKB = 'DENDAKRGBAYAR';
		$REKAYAT = '1';
		$petugas = 'M. ROHMAD ROMADHON';
		$nip = '1967121992031002';
	}
	elseif($AYAT=='4.1.1.2.0'){
		$namaTBL= 'TBLDAFTRMAKAN';
		$judul = 'PAJAK RESTORAN';
		$NAKB = 'NAKB';
		$REKAYAT = '2';
		$petugas = 'YULI  PURWANTO';
		$nip = '197407041994021005';
	}
	elseif($AYAT=='4.1.1.3.0'){
		$namaTBL= 'TBLDAFTHIBURAN';
		$judul = 'PAJAK HIBURAN';
		$NAKB = 'NAKB';
		$REKAYAT = '3';
		$petugas = 'ELSI NURLITA IKAWATI, A.Md';
		$nip = '197104121992031003';
	}
	elseif($AYAT=='4.1.1.4.0'){
		$namaTBL= 'TBLDAFTREKLAME';
		$judul = 'PAJAK REKLAME';
		$NAKB = 'NAKB';
		$REKAYAT = '4';
		$petugas = 'MEYRINA NUR IVADA';
		$nip = '196903251990031003';
	}
	elseif($AYAT=='4.1.1.7.0'){
		$namaTBL= 'TBLDAFTPARKIR';
		$judul = 'PAJAK PARKIR';
		$NAKB = 'NAKB';
		$REKAYAT = '7';
		$petugas = 'NURWITANTO P';
		$nip = '';
	}
	elseif($AYAT=='4.1.1.8.0'){
		$namaTBL= 'TBLDAFTTANAH';
		$judul = 'PAJAK AIR TANAH';
		$NAKB = 'NAKB';
		$REKAYAT = '8';
		$petugas = 'EKO HERIYANTO';
		$nip = '196805081992031011';
	}
	elseif($AYAT=='4.1.1.9.0'){
		$namaTBL= 'TBLDAFTBURUNG';
		$judul = 'PAJAK SARANG BURUNG WALET';
		$NAKB = 'NAKB';
		$REKAYAT = '9';
		$petugas = 'JOKO SUNGKONO';
		$nip = '195908081981021007';
	}

	$tunggakan2 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) + 1 ;
	$tunggakan3 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) + 2 ;
	$tunggakan4 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) + 3 ;
	
		$data['filter'] = isset($_REQUEST['data']) ? $_REQUEST['data'] : '';

		if (!empty($data['filter'])) {
			$data['filter'] = explode(',', $data['filter']);
		} else {
			echo "<h3>Data yg dikirim tidak benar</h3>";
			Yii::app()->end();
		}		

		$flag = '';
		$query = '';

		foreach ($data['filter'] as $kodefikasi) {
			$kodefikasi = explode('-', $kodefikasi);
			if (is_array($kodefikasi)) {
				if (!isset($kodefikasi[0])) {
					echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPDKB</h3>";
					Yii::app()->end();
				}
				$nopok = $kodefikasi[0];
			


				$query .= 
				$flag . 
				"SELECT
		TBLDAFTAR_GOLONGAN,
		TBLDAFTAR_NOPOK,
		TBLKECAMATAN_ID,
		TBLKELURAHAN_ID,
		TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR_BADANUSAHAALAMAT,
		SUM (tunggakan1) AS tunggakan1,
		SUM (tunggakan2) AS tunggakan2,
		SUM (tunggakan3) AS tunggakan3,
		SUM (tunggakan4) AS tunggakan4,
		SUM (tunggakan5) AS tunggakan5,
		SUM (total) AS Total
		FROM
		(
			SELECT
			TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR_BADANUSAHAALAMAT,
			TBLDAFTAR_GOLONGAN,
			TBLDAFTAR_NOPOK,
			TBLKECAMATAN_ID,
			TBLKELURAHAN_ID,
			SUM (
				CASE
				WHEN TBLANGSURAN_THNBATASKETETAPAN = ".$TBLPENDATAAN_THNPAJAKA." THEN
				NVL (KETETAPANPOKOK, 0) + NVL (KETETAPANDENDA, 0) + NVL (KETETAPANBUNGA, 0)
				ELSE
				0
				END
				) AS tunggakan1,
			SUM (
				CASE
				WHEN TBLANGSURAN_THNBATASKETETAPAN = ".$tunggakan2." THEN
				NVL (KETETAPANPOKOK, 0) + NVL (KETETAPANDENDA, 0) + NVL (KETETAPANBUNGA, 0)
				ELSE
				0
				END
				) AS tunggakan2,
			SUM (
				CASE
				WHEN TBLANGSURAN_THNBATASKETETAPAN = ".$tunggakan3." THEN
				NVL (KETETAPANPOKOK, 0) + NVL (KETETAPANDENDA, 0) + NVL (KETETAPANBUNGA, 0)
				ELSE
				0
				END
				) AS tunggakan3,
			SUM (
				CASE
				WHEN TBLANGSURAN_THNBATASKETETAPAN = ".$tunggakan4." THEN
				NVL (KETETAPANPOKOK, 0) + NVL (KETETAPANDENDA, 0) + NVL (KETETAPANBUNGA, 0)
				ELSE
				0
				END
				) AS tunggakan4,
			SUM (
				CASE
				WHEN TBLANGSURAN_THNBATASKETETAPAN = ".$TBLPENDATAAN_THNPAJAKK." THEN
				NVL (KETETAPANPOKOK, 0) + NVL (KETETAPANDENDA, 0) + NVL (KETETAPANBUNGA, 0)
				ELSE
				0
				END
				) AS tunggakan5,
			SUM (
				CASE
				WHEN NVL (TBLANGSURAN_THNBATASKETETAPAN, 0) <> 0 THEN
				NVL (KETETAPANPOKOK, 0) + NVL (KETETAPANDENDA, 0) + NVL (KETETAPANBUNGA, 0)
				ELSE
				0
				END
				) AS total
			FROM
			(
				SELECT
				(
					SELECT
					TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
					FROM
					TBLDAFTAR
					WHERE
					TBLDAFTAR.TBLDAFTAR_NOPOK = ".$namaTBL.".TBLDAFTAR_NOPOK
					) AS TBLDAFTAR_BADANUSAHANAMA,
			(
				SELECT
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
				FROM
				TBLDAFTAR
				WHERE
				TBLDAFTAR.TBLDAFTAR_NOPOK = ".$namaTBL.".TBLDAFTAR_NOPOK
				) AS TBLDAFTAR_BADANUSAHAALAMAT,
			".$namaTBL.".TBLDAFTAR_GOLONGAN,
			".$namaTBL.".TBLDAFTAR_NOPOK,
			".$namaTBL.".TBLKECAMATAN_ID,
			".$namaTBL.".TBLKELURAHAN_ID,
			TBLANGSURAN.TBLANGSURAN_THNBATASKETETAPAN,
			SUM (NVL(TBLANGSURAN.tblangsuran_ketetapantotal, 0)) AS KETETAPANTOTAL,
			SUM (NVL(TBLANGSURAN.tblangsuran_angsuran, 0)) AS KETETAPANPOKOK,
			SUM (NVL(TBLANGSURAN.tblangsuran_setoran, 0)) AS KETETAPANBAYAR,
			SUM (NVL(TBLANGSURAN.tblangsuran_dendaangsuran, 0)) AS KETETAPANDENDA,
			SUM (NVL(TBLANGSURAN.tblangsuran_bungaangsuran, 0)) AS KETETAPANBUNGA
			FROM
			".$namaTBL."
			INNER JOIN TBLANGSURAN ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
			AND ".$namaTBL.".TBLPENDATAAN_THNPAJAK = TBLANGSURAN.TBLPENDATAAN_THNPAJAK
			AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = TBLANGSURAN.TBLPENDATAAN_BLNPAJAK
			WHERE
			NVL (tblangsuran_setoran, 0) = 0
			AND TBLANGSURAN.TBLANGSURAN_THNBATASKETETAPAN BETWEEN ".$TBLPENDATAAN_THNPAJAKA."
			AND ".$TBLPENDATAAN_THNPAJAKK."
			AND ".$namaTBL.".TBLDAFTAR_NOPOK = ".$nopok."
			GROUP BY
			TBLANGSURAN.TBLANGSURAN_THNBATASKETETAPAN,
			".$namaTBL."_REGSURATANGSUR,
			".$namaTBL.".TBLPENDATAAN_THNPAJAK,
			".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
			".$namaTBL.".TBLDAFTAR_GOLONGAN,
			".$namaTBL.".TBLDAFTAR_NOPOK,
			".$namaTBL.".TBLKECAMATAN_ID,
			".$namaTBL.".TBLKELURAHAN_ID
			)
			GROUP BY
			TBLDAFTAR_GOLONGAN,
			TBLDAFTAR_NOPOK,
			TBLKECAMATAN_ID,
			TBLKELURAHAN_ID,
			TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR_BADANUSAHAALAMAT
			UNION
			SELECT
			TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR_BADANUSAHAALAMAT,
			TBLDAFTAR_GOLONGAN,
			TBLDAFTAR_NOPOK,
			TBLKECAMATAN_ID,
			TBLKELURAHAN_ID,
			SUM (tunggakan1) AS tunggakan1,
			SUM (tunggakan2) AS tunggakan2,
			SUM (tunggakan3) AS tunggakan3,
			SUM (tunggakan4) AS tunggakan4,
			SUM (tunggakan5) AS tunggakan5,
			SUM (total) AS total
			FROM
			(
				SELECT
				TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR_BADANUSAHAALAMAT,
				".$namaTBL.".TBLDAFTAR_GOLONGAN,
				".$namaTBL.".TBLDAFTAR_NOPOK,
				".$namaTBL.".TBLKECAMATAN_ID,
				".$namaTBL.".TBLKELURAHAN_ID,
				SUM (
					CASE
					WHEN ".$namaTBL."_THNBTSKRGBAYAR = ".$TBLPENDATAAN_THNPAJAKA." THEN
					".$namaTBL."_RUPIAHKRGBAYAR
					ELSE
					0
					END
					) AS tunggakan1,
			SUM (
				CASE
				WHEN ".$namaTBL."_THNBTSKRGBAYAR = ".$tunggakan2." THEN
				".$namaTBL."_RUPIAHKRGBAYAR
				ELSE
				0
				END
				) AS tunggakan2,
			SUM (
				CASE
				WHEN ".$namaTBL."_THNBTSKRGBAYAR = ".$tunggakan3." THEN
				".$namaTBL."_RUPIAHKRGBAYAR
				ELSE
				0
				END
				) AS tunggakan3,
			SUM (
				CASE
				WHEN ".$namaTBL."_THNBTSKRGBAYAR = ".$tunggakan4." THEN
				".$namaTBL."_RUPIAHKRGBAYAR
				ELSE
				0
				END
				) AS tunggakan4,
			SUM (
				CASE
				WHEN ".$namaTBL."_THNBTSKRGBAYAR = ".$TBLPENDATAAN_THNPAJAKK." THEN
				".$namaTBL."_RUPIAHKRGBAYAR
				ELSE
				0
				END
				) AS tunggakan5,
			SUM (
				CASE
				WHEN NVL (".$namaTBL."_THNBTSKRGBAYAR, 0) <> 0 THEN
				".$namaTBL."_RUPIAHKRGBAYAR
				ELSE
				0
				END
				) AS total
			FROM
			".$namaTBL."
			INNER JOIN TBLDAFTAR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
			WHERE
			NVL (".$namaTBL."_RUPIAHSETOR, 0) <> ".$namaTBL."_PAJAKPERIKSA
			AND NVL (".$namaTBL."_REGKURANGBAYAR, 0) > 0
			AND NVL (".$namaTBL."_RUPIAHKRGBAYAR, 0) > 0
			AND NVL (".$namaTBL."_REGSURATANGSUR, 0) = 0
			AND ".$namaTBL."_THNBTSKRGBAYAR BETWEEN ".$TBLPENDATAAN_THNPAJAKA."
			AND ".$TBLPENDATAAN_THNPAJAKK."
			AND ".$namaTBL.".TBLDAFTAR_NOPOK = ".$nopok."
			GROUP BY
			".$namaTBL.".TBLDAFTAR_GOLONGAN,
			".$namaTBL.".TBLDAFTAR_NOPOK,
			".$namaTBL.".TBLKECAMATAN_ID,
			".$namaTBL.".TBLKELURAHAN_ID,
			TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR_BADANUSAHAALAMAT,
			".$namaTBL.".TBLPENDATAAN_THNPAJAK,
			".$namaTBL.".TBLPENDATAAN_BLNPAJAK
			)
			GROUP BY
			TBLDAFTAR_GOLONGAN,
			TBLDAFTAR_NOPOK,
			TBLKECAMATAN_ID,
			TBLKELURAHAN_ID,
			TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR_BADANUSAHAALAMAT
			)
			GROUP BY
			TBLDAFTAR_GOLONGAN,
			TBLDAFTAR_NOPOK,
			TBLKECAMATAN_ID,
			TBLKELURAHAN_ID,
			TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR_BADANUSAHAALAMAT";
			
			$flag = "
					UNION
					";
					}
		}
		$datax['cetak'] = Yii::app()->db->createCommand($query)->queryAll();
		$datax['namaTBL'] = $namaTBL;
		$datax['petugas'] = $petugas;
		$datax['nip'] = $nip;
		$datax['judul'] = $judul;

		$data = array();
		$row = array();

		$GLOBALS['thnpajak'] = $_REQUEST['TBLPENDATAAN_THNPAJAKA'];
		$GLOBALS['petugas'] = $petugas;
		$GLOBALS['nip'] = $nip;
		$GLOBALS['jenispajak'] = $judul;

		$GLOBALS['tahun1'] = $_REQUEST['TBLPENDATAAN_THNPAJAKA'];
		$GLOBALS['tahun2'] = $_REQUEST['TBLPENDATAAN_THNPAJAKA']+1;
		$GLOBALS['tahun3'] = $_REQUEST['TBLPENDATAAN_THNPAJAKA']+2;
		$GLOBALS['tahun4'] = $_REQUEST['TBLPENDATAAN_THNPAJAKA']+3;
		$GLOBALS['tahun5'] = $_REQUEST['TBLPENDATAAN_THNPAJAKK'];

		$no = 1;
		$total1 = array('total1'=>0);
		$total2 = array('total2'=>0);
		$total3 = array('total3'=>0);
		$total4 = array('total4'=>0);
		$total5 = array('total5'=>0);


		foreach($datax['cetak'] as $kolom) :
			$NPWPD = $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$kolom['TBLKECAMATAN_ID'])) . '.' . (sprintf('%02d',$kolom['TBLKELURAHAN_ID']));


			$data['no'] = $no++;				
			
			$data['namawp'] = trim($kolom['TBLDAFTAR_BADANUSAHANAMA']);
			$data['alamat'] = trim($kolom['TBLDAFTAR_BADANUSAHAALAMAT']);
			$data['nopok'] = $NPWPD;
			$data['tunggakan1'] = LokalIndonesia::ribuan($kolom['TUNGGAKAN1']); 
			$data['tunggakan2'] = LokalIndonesia::ribuan($kolom['TUNGGAKAN2']);
			$data['tunggakan3'] = LokalIndonesia::ribuan($kolom['TUNGGAKAN3']);
			$data['tunggakan4'] = LokalIndonesia::ribuan($kolom['TUNGGAKAN4']);
			$data['tunggakan5'] = LokalIndonesia::ribuan($kolom['TUNGGAKAN5']);

			$total1['total1'] += $kolom['TUNGGAKAN1'];
			$total2['total2'] += $kolom['TUNGGAKAN2'];
			$total3['total3'] += $kolom['TUNGGAKAN3'];
			$total4['total4'] += $kolom['TUNGGAKAN4'];
			$total5['total5'] += $kolom['TUNGGAKAN5'];

			array_push($row, $data);
		endforeach;
		$header=array();
		$tanggalsurat = date('d') . ' ' . LokalIndonesia::getBulan(date('m')) . ' ' . date('Y');
		$header['datenow'] = $tanggalsurat;
		$header['totaltunggakan1'] = LokalIndonesia::ribuan($total1['total1']);
		$header['totaltunggakan2'] = LokalIndonesia::ribuan($total2['total2']);
		$header['totaltunggakan3'] = LokalIndonesia::ribuan($total3['total3']);
		$header['totaltunggakan4'] = LokalIndonesia::ribuan($total4['total4']);
		$header['totaltunggakan5'] = LokalIndonesia::ribuan($total5['total5']);

		$otbs->MergeBlock('data', $row); 
		$otbs->MergeField('header', $header);
					// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template
		// var_dump($data['cetak']);die();
		// echo json_encode($data);Yii::app()->end();
		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
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