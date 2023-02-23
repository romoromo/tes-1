<?php

class Tegurantunggakan_skpd_2021Controller extends Controller
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
			AND TBLREKENING_REKAYAT <> 4
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
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '' ;
		$TBLPENDATAAN_THNPAJAKA = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) : '' ;
		$TBLPENDATAAN_THNPAJAKK = substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) : '' ;
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '' ; 		

		$KODEREK = $_REQUEST['TBLREKENING_KODE'];
		if($KODEREK=='4.1.1.1.0'){
			$NamaTBL = 'TBLDAFTHOTEL';
		}
		elseif($KODEREK=='4.1.1.2.0'){
			$NamaTBL = 'TBLDAFTRMAKAN';
		}
		elseif($KODEREK=='4.1.1.3.0'){
			$NamaTBL = 'TBLDAFTHIBURAN';
		}
		elseif ($KODEREK=='4.1.1.4.0'){
			$NamaTBL = 'TBLDAFTREKLAME';
		}
		elseif($KODEREK=='4.1.1.5.0'){
			$NamaTBL = '';
		}
		elseif($KODEREK=='.4.1.1.7.0'){
			$NamaTBL = 'TBLDAFTPARKIR';
		}
		elseif($KODEREK=='.4.1.1.8.0'){
			$NamaTBL = 'TBLDAFTTANAH';
		}
		elseif($KODEREK=='.4.1.1.9.0'){
			$NamaTBL = 'TBLDAFTBURUNG';
		}
		elseif($KODEREK=='4.1.1.10.0'){
			$NamaTBL = '';
		}
		elseif($KODEREK=='4.1.1.11.0'){
			$NamaTBL = 'TBLDAFTBPHTB';
		}
		elseif($KODEREK=='4.1.1.23.0'){
			$NamaTBL = '';
		}

		if($TBLDAFTAR_NOPOK==''){
			$wherenopok = "";
		}
		else{
			$wherenopok = "AND ".$NamaTBL.".TBLDAFTAR_NOPOK = ".$TBLDAFTAR_NOPOK."";
		}

		$tunggakan2 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) + 1;
		$tunggakan3 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) + 2;
		$tunggakan4 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) + 3;

		$sql="SELECT
		*
		FROM
		(
			SELECT
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
			SUM (
				CASE
				WHEN NVL (".$NamaTBL."_BLNSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_TGLSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_PAJAKSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_NOMORSKPD, '0') <> '0'
				AND NVL (".$NamaTBL."_RUPIAHSETOR, '0') = '0'
				AND ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = ".$TBLPENDATAAN_THNPAJAKK." THEN
				NVL (".$NamaTBL.".".$NamaTBL."_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS tunggakan1,
			SUM (
				CASE
				WHEN NVL (".$NamaTBL."_BLNSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_TGLSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_PAJAKSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_NOMORSKPD, '0') <> '0'
				AND NVL (".$NamaTBL."_RUPIAHSETOR, '0') = '0'
				AND ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = ".$tunggakan2." THEN
				NVL (".$NamaTBL.".".$NamaTBL."_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS tunggakan2,
			SUM (
				CASE
				WHEN NVL (".$NamaTBL."_BLNSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_TGLSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_PAJAKSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_NOMORSKPD, '0') <> '0'
				AND NVL (".$NamaTBL."_RUPIAHSETOR, '0') = '0'
				AND ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = ".$tunggakan3." THEN
				NVL (".$NamaTBL.".".$NamaTBL."_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS tunggakan3,
			SUM (
				CASE
				WHEN NVL (".$NamaTBL."_BLNSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_TGLSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_PAJAKSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_NOMORSKPD, '0') <> '0'
				AND NVL (".$NamaTBL."_RUPIAHSETOR, '0') = '0'
				AND ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = ".$tunggakan4." THEN
				NVL (".$NamaTBL.".".$NamaTBL."_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS tunggakan4,
			SUM (
				CASE
				WHEN NVL (".$NamaTBL."_BLNSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_TGLSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_PAJAKSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_NOMORSKPD, '0') <> '0'
				AND NVL (".$NamaTBL."_RUPIAHSETOR, '0') = '0'
				AND ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = ".$TBLPENDATAAN_THNPAJAKA." THEN
				NVL (".$NamaTBL.".".$NamaTBL."_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS tunggakan5,
			SUM (
				CASE
				WHEN NVL (".$NamaTBL."_BLNSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_TGLSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_PAJAKSKPD, 0) <> 0
				AND NVL (".$NamaTBL."_NOMORSKPD, '0') <> '0'
				AND NVL (".$NamaTBL."_RUPIAHSETOR, '0') = '0'
				AND ".$NamaTBL.".TBLPENDATAAN_THNPAJAK BETWEEN ".$TBLPENDATAAN_THNPAJAKK."
				AND ".$TBLPENDATAAN_THNPAJAKA." THEN
				NVL (".$NamaTBL.".".$NamaTBL."_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS TOTAL
			FROM
			".$NamaTBL."
			INNER JOIN TBLDAFTAR ON ".$NamaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
			WHERE
			".$NamaTBL."_THNSKPD BETWEEN ".$TBLPENDATAAN_THNPAJAKK."
			AND ".$TBLPENDATAAN_THNPAJAKA."
			AND ".$NamaTBL.".".$NamaTBL."_PAJAKSKPD <> 0
			".$wherenopok."
			GROUP BY
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
			ORDER BY
			TBLDAFTAR_NOPOK
			) A
			WHERE
			TOTAL > 0";

			$data['cari'] = $cari = Yii::app()->db->createCommand($sql)->queryAll();

			$this->renderPartial('cari', array('data'=>$data));
}

public function actionCetakword()
{
	$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
	$namatpl = $path_tpl . 'Temp_Teguran_SKPD_Sebelum2012.docx';
	$namafileDL = "Surat Teguran SKPD.docx";

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
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); 

		$nomor_surat = isset($_REQUEST['nomor_surat']) ? $_REQUEST['nomor_surat'] : '' ;
		$tglawal = isset($_REQUEST['tglawal']) ? $_REQUEST['tglawal'] : '' ;
		$tglakhir = isset($_REQUEST['tglakhir']) ? $_REQUEST['tglakhir'] : '' ;
		$waktu = isset($_REQUEST['waktu']) ? $_REQUEST['waktu'] : '' ;
		$TBLDAFTAR_NOPOK = isset($_REQUEST['TBLDAFTAR_NOPOK']) ? $_REQUEST['TBLDAFTAR_NOPOK'] : '' ;
		$TBLPENDATAAN_THNPAJAKA = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) : '' ;
		$TBLPENDATAAN_THNPAJAKK = substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) : '' ;
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '' ; 		

		// echo $TBLREKENING_KODE;die();

		$KODEREK = $_REQUEST['TBLREKENING_KODE'];
		if($KODEREK=='4.1.1.1.0'){
			$NamaTBL = 'TBLDAFTHOTEL';
			$PAJAK ='PAJAK HOTEL';
		}
		elseif($KODEREK=='4.1.1.2.0'){
			$NamaTBL = 'TBLDAFTRMAKAN';
			$PAJAK = 'PAJAK RESTORAN';
		}
		elseif($KODEREK=='4.1.1.3.0'){
			$NamaTBL = 'TBLDAFTHIBURAN';
			$PAJAK = 'PAJAK HIBURAN';
		}
		elseif ($KODEREK=='4.1.1.4.0'){
			$NamaTBL = 'TBLDAFTREKLAME';
			$PAJAK = 'PAJAK REKLAME';
		}
		elseif($KODEREK=='4.1.1.5.0'){
			$NamaTBL = '';
		}
		elseif($KODEREK=='4.1.1.7.0'){
			$NamaTBL = 'TBLDAFTPARKIR';
			$PAJAK = 'PAJAK PARKIR';
		}
		elseif($KODEREK=='4.1.1.8.0'){
			$NamaTBL = 'TBLDAFTTANAH';
			$PAJAK = 'PAJAK AIR TANAH';
		}
		elseif($KODEREK=='4.1.1.9.0'){
			$NamaTBL = 'TBLDAFTBURUNG';
			$PAJAK = 'PAJAK SARANG BURUNG WALET';
		}
		elseif($KODEREK=='4.1.1.10.0'){
			$NamaTBL = '';
		}
		elseif($KODEREK=='4.1.1.11.0'){
			$NamaTBL = 'TBLDAFTBPHTB';
			$PAJAK = 'PAJAK BPHTB';
		}
		elseif($KODEREK=='4.1.1.23.0'){
			$NamaTBL = '';
		}

		$tunggakan2 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) + 1;
		$tunggakan3 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) + 2;
		$tunggakan4 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) + 3;


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
				

				$query .= 
				$flag .
					"SELECT
						TBLDAFTAR.TBLDAFTAR_NOPOK,
						TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
						TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
						BULAN_ID AS BULAN_ID,
						BULAN_NAMA AS BULAN,
						TBLDAFTAR.tblkecamatan_idbadanusaha,
						TBLDAFTAR.tblkelurahan_idbadanusaha,
						TBLDAFTAR.tbldaftar_golongan,
						TBLDAFTAR.tbldaftar_jenispendapatan,
						CONCAT (
							TBLDAFTAR.tbldaftar_jenispendapatan,
							CONCAT (
								'.',
								CONCAT (
									TBLDAFTAR.tbldaftar_golongan,
									CONCAT (
										'.',
										CONCAT (
											TBLDAFTAR.TBLDAFTAR_NOPOK,
											CONCAT (
												'.',
												CONCAT (
													TBLDAFTAR.tblkecamatan_idbadanusaha,
													CONCAT ('.', CONCAT(TBLDAFTAR.tblkelurahan_idbadanusaha, ''))
												)
											)
										)
									)
								)
							)
						) AS NPWP,
						SUM (
							CASE
							WHEN NVL (TBLDAFTHOTEL_BLNSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_TGLSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_PAJAKSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_NOMORSKPD, '0') <> '0'
							AND NVL (TBLDAFTHOTEL_RUPIAHSETOR, '0') = '0'
							AND TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK = ".$TBLPENDATAAN_THNPAJAKK." THEN
								NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
							ELSE
								0
							END
						) AS tunggakan1,
						SUM (
							CASE
							WHEN NVL (TBLDAFTHOTEL_BLNSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_TGLSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_PAJAKSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_NOMORSKPD, '0') <> '0'
							AND NVL (TBLDAFTHOTEL_RUPIAHSETOR, '0') = '0'
							AND TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK = ".$tunggakan2." THEN
								NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
							ELSE
								0
							END
						) AS tunggakan2,
						SUM (
							CASE
							WHEN NVL (TBLDAFTHOTEL_BLNSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_TGLSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_PAJAKSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_NOMORSKPD, '0') <> '0'
							AND NVL (TBLDAFTHOTEL_RUPIAHSETOR, '0') = '0'
							AND TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK = ".$tunggakan3." THEN
								NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
							ELSE
								0
							END
						) AS tunggakan3,
						SUM (
							CASE
							WHEN NVL (TBLDAFTHOTEL_BLNSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_TGLSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_PAJAKSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_NOMORSKPD, '0') <> '0'
							AND NVL (TBLDAFTHOTEL_RUPIAHSETOR, '0') = '0'
							AND TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK = ".$tunggakan4." THEN
								NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
							ELSE
								0
							END
						) AS tunggakan4,
						SUM (
							CASE
							WHEN NVL (TBLDAFTHOTEL_BLNSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_TGLSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_PAJAKSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_NOMORSKPD, '0') <> '0'
							AND NVL (TBLDAFTHOTEL_RUPIAHSETOR, '0') = '0'
							AND TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK = ".$TBLPENDATAAN_THNPAJAKA." THEN
								NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
							ELSE
								0
							END
						) AS tunggakan5,
						SUM (
							CASE
							WHEN NVL (TBLDAFTHOTEL_BLNSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_TGLSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_PAJAKSKPD, 0) <> 0
							AND NVL (TBLDAFTHOTEL_NOMORSKPD, '0') <> '0'
							AND NVL (TBLDAFTHOTEL_RUPIAHSETOR, '0') = '0'
							AND TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK BETWEEN ".$TBLPENDATAAN_THNPAJAKK."
							AND ".$TBLPENDATAAN_THNPAJAKA." THEN
								NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
							ELSE
								0
							END
						) AS TOTAL
					FROM
						TBLDAFTHOTEL
					INNER JOIN TBLDAFTAR ON TBLDAFTHOTEL.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
					RIGHT JOIN BULAN ON TBLDAFTHOTEL.TBLPENDATAAN_BLNPAJAK = BULAN.BULAN_ID
					WHERE
						TBLPENDATAAN_THNPAJAK BETWEEN ".$TBLPENDATAAN_THNPAJAKK."
					AND ".$TBLPENDATAAN_THNPAJAKA."
					AND TBLDAFTHOTEL.TBLDAFTAR_NOPOK IN (".$nopok.")
					GROUP BY
						TBLDAFTAR.TBLDAFTAR_NOPOK,
						BULAN_ID,
						TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
						TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
						BULAN_NAMA,
						TBLDAFTAR.tblkecamatan_idbadanusaha,
						TBLDAFTAR.tblkelurahan_idbadanusaha,
						TBLDAFTAR.tbldaftar_golongan,
						TBLDAFTAR.tbldaftar_jenispendapatan
					
										";
										
										$flag = "
										UNION
										";
								}
							}

		$order = "
		ORDER BY
		TBLDAFTAR_NOPOK,
		BULAN_ID";

		// echo $query;Yii::app()->end();

		$datax['cetaksurat'] = Yii::app()->db->createCommand($query.$order)->queryAll(); 
		$datax['NamaTBL'] = $NamaTBL;

		$utama = array();
		$rows = array();

		$tanggalsurat = date('d') . ' ' . LokalIndonesia::getBulan(date('m')) . ' ' . date('Y');

		$GLOBALS['datenow'] = $tanggalsurat;
		$GLOBALS['tglundangan1'] = strtotime($tglawal) ? LokalIndonesia::TanggalUmum( date('Y-m-d', strtotime($tglawal)) ) : '';
		$GLOBALS['tglundangan2'] = strtotime($tglakhir) ? LokalIndonesia::TanggalUmum( date('Y-m-d', strtotime($tglakhir)) ) : '';
		$GLOBALS['waktu'] = $_REQUEST['waktu'];
		$GLOBALS['jnspajak'] = $PAJAK;
		$GLOBALS['no_surat'] = $_REQUEST['nomor_surat'];
		$GLOBALS['1'] = $_REQUEST['TBLPENDATAAN_THNPAJAKK'];
		$GLOBALS['2'] = $_REQUEST['TBLPENDATAAN_THNPAJAKK'] + 1;
		$GLOBALS['3'] = $_REQUEST['TBLPENDATAAN_THNPAJAKK'] + 2;
		$GLOBALS['4'] = $_REQUEST['TBLPENDATAAN_THNPAJAKK'] + 3;
		$GLOBALS['5'] = $_REQUEST['TBLPENDATAAN_THNPAJAKA'];

		$no = 1;

		$nopok_before = '';
		$LOOP_NOPOK = array();
		foreach ($datax['cetaksurat'] as $hal_nopok) :
			if ($nopok_before!=$hal_nopok['TBLDAFTAR_NOPOK']) :
				$nopok_before = $hal_nopok['TBLDAFTAR_NOPOK'];

				$nomorNPWPD = $hal_nopok['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$hal_nopok['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$hal_nopok['TBLKECAMATAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$hal_nopok['TBLKELURAHAN_IDBADANUSAHA']));

				$LOOP_NOPOK = array(
					'wp_npwpd' => $nomorNPWPD
					,'nopokhal' => ''
					,'wp_nama' => $hal_nopok['TBLDAFTAR_BADANUSAHANAMA']
					,'wp_alamat' => $hal_nopok['TBLDAFTAR_BADANUSAHAALAMAT']
					, 'detail' => array()
				);
				$no = 1;

				foreach ($datax['cetaksurat'] as $kolom) :
					if ($nopok_before==$kolom['TBLDAFTAR_NOPOK']) :
						$NPWPD = $kolom['TBLDAFTAR_JENISPENDAPATAN'] . '.' . $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$kolom['TBLKECAMATAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$kolom['TBLKELURAHAN_IDBADANUSAHA']));
						$BNAMA =  $kolom['TBLDAFTAR_BADANUSAHANAMA'];
						$BAL =  $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];

						// $utama['noo'] = null;
						// $utama['bulan'] = trim($kolom['BULAN']);
						$utama['wp_nama'] = $BNAMA;
						$utama['wp_alamat'] = $BAL;
						// $utama['wp_npwpd'] = $NPWPD;
						$utama['bulan'] = $kolom['BULAN'];
						$utama['th1'] = LokalIndonesia::ribuan($kolom['TUNGGAKAN1']);
						$utama['th2'] = LokalIndonesia::ribuan($kolom['TUNGGAKAN2']);
						$utama['th3'] = LokalIndonesia::ribuan($kolom['TUNGGAKAN3']);
						$utama['th4'] = LokalIndonesia::ribuan($kolom['TUNGGAKAN4']);
						$utama['th5'] = LokalIndonesia::ribuan($kolom['TUNGGAKAN5']);

						// array_push($rows, $utama);
						array_push($LOOP_NOPOK['detail'], $utama);
					endif;
				endforeach;

				array_push($rows, $LOOP_NOPOK);
			endif;
		endforeach;

		$header=array();
		// $header['wp_npwpd'] = $NPWPD;
		// $header['wp_nama'] = $BNAMA;
		// $header['wp_alamat'] = $BAL;

		// echo CJSON::encode($rows);Yii::app()->end();

		$otbs->MergeBlock('rows', $rows); 
		$otbs->MergeField('header', $header); 
				// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();

}
public function actionCetakDaftar()
{
	$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
	$namatpl = $path_tpl . 'daftar surat teguran .docx';
	$namafileDL = "Daftar Surat Teguran.docx";

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
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); 

		$nomor_surat = $_REQUEST['nomor_surat'] ? $_REQUEST['nomor_surat'] : '' ;
		$tglawal = $_REQUEST['tglawal'] ? $_REQUEST['tglawal'] : '' ;
		$tglakhir = $_REQUEST['tglakhir'] ? $_REQUEST['tglakhir'] : '' ;
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '' ;
		$TBLPENDATAAN_THNPAJAKA = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) : '' ;
		$TBLPENDATAAN_THNPAJAKK = substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) : '' ;
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '' ; 		

		$KODEREK = $_REQUEST['TBLREKENING_KODE'];
		if($KODEREK=='4.1.1.1.0'){
			$NamaTBL = 'TBLDAFTHOTEL';
			$PAJAK = 'PAJAK HOTEL';
		}
		elseif($KODEREK=='4.1.1.2.0'){
			$NamaTBL = 'TBLDAFTRMAKAN';
			$PAJAK = 'PAJAK RESTORAN';
		}
		elseif($KODEREK=='4.1.1.3.0'){
			$NamaTBL = 'TBLDAFTHIBURAN';
			$PAJAK = 'PAJAK HIBURAN';
		}
		elseif ($KODEREK=='4.1.1.4.0'){
			$NamaTBL = 'TBLDAFTREKLAME';
			$PAJAK = 'PAJAK REKLAME';
		}
		elseif($KODEREK=='4.1.1.5.0'){
			$NamaTBL = '';
		}
		elseif($KODEREK=='.4.1.1.7.0'){
			$NamaTBL = 'TBLDAFTPARKIR';
			$PAJAK = 'PAJAK PARKIR';
		}
		elseif($KODEREK=='.4.1.1.8.0'){
			$NamaTBL = 'TBLDAFTTANAH';
			$PAJAK = 'PAJAK AIR TANAH';
		}
		elseif($KODEREK=='.4.1.1.9.0'){
			$NamaTBL = 'TBLDAFTBURUNG';
			$PAJAK = 'PAJAK SARANG BURUNG WALET';
		}
		elseif($KODEREK=='4.1.1.10.0'){
			$NamaTBL = '';
		}
		elseif($KODEREK=='4.1.1.11.0'){
			$NamaTBL = 'TBLDAFTBPHTB';
			$PAJAK = 'PAJAK BPHTB';
		}
		elseif($KODEREK=='4.1.1.23.0'){
			$NamaTBL = '';
		}

		$tunggakan2 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) + 1;
		$tunggakan3 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) + 2;
		$tunggakan4 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) + 3;


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
				

				$query .= 
				$flag .
					"SELECT
					*
				FROM
					(
			SELECT
				TBLDAFTAR.TBLDAFTAR_NOPOK,
				TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR.tbldaftar_pemiliknama,
				TBLDAFTAR.tbldaftar_jenispendapatan,
				TBLDAFTAR.tbldaftar_golongan,
				TBLDAFTAR.tblkelurahan_idbadanusaha,
				TBLDAFTAR.tblkecamatan_idbadanusaha,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
				SUM (
					CASE
					WHEN (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) = 0)
					AND (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 1 THEN
						NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
					ELSE
						0
					END
				) AS tungakan_januari,
				SUM (
					CASE
					WHEN (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) = 0)
					AND (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 2 THEN
						NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
					ELSE
						0
					END
				) AS tungakan_februari,
				SUM (
					CASE
					WHEN (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) = 0)
					AND (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 3 THEN
						NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
					ELSE
						0
					END
				) AS tungakan_maret,
				SUM (
					CASE
					WHEN (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) = 0)
					AND (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 4 THEN
						NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
					ELSE
						0
					END
				) AS tungakan_april,
				SUM (
					CASE
					WHEN (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) = 0)
					AND (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 5 THEN
						NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
					ELSE
						0
					END
				) AS tungakan_mei,
				SUM (
					CASE
					WHEN (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) = 0)
					AND (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 6 THEN
						NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
					ELSE
						0
					END
				) AS tungakan_juni,
				SUM (
					CASE
					WHEN (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) = 0)
					AND (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 7 THEN
						NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
					ELSE
						0
					END
				) AS tungakan_juli,
				SUM (
					CASE
					WHEN (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) = 0)
					AND (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 8 THEN
						NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
					ELSE
						0
					END
				) AS tungakan_agustus,
				SUM (
					CASE
					WHEN (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) = 0)
					AND (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 9 THEN
						NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
					ELSE
						0
					END
				) AS tungakan_september,
				SUM (
					CASE
					WHEN (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) = 0)
					AND (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 10 THEN
						NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
					ELSE
						0
					END
				) AS tungakan_oktober,
				SUM (
					CASE
					WHEN (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) = 0)
					AND (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 11 THEN
						NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
					ELSE
						0
					END
				) AS tungakan_november,
				SUM (
					CASE
					WHEN (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) = 0)
					AND (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD, 0) > 0)
					AND TBLPENDATAAN_BLNPAJAK = 12 THEN
						NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
					ELSE
						0
					END
				) AS tungakan_desember,
				SUM (
					CASE
					WHEN (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) = 0)
					AND (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD, 0) > 0) THEN
						NVL (TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKSKPD, 0)
					ELSE
						0
					END
				) AS jumlah_tunggakan,
				SUM (
					CASE
					WHEN (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) = 0)
					AND (NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD, 0) > 0) THEN
						1
					ELSE
						0
					END
				) AS jumlah_skpd
			FROM
				TBLDAFTAR
			INNER JOIN TBLDAFTHOTEL ON TBLDAFTHOTEL.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
			WHERE
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA IS NOT NULL
			AND TBLPENDATAAN_THNPAJAK BETWEEN ".$TBLPENDATAAN_THNPAJAKK."
			AND ".$TBLPENDATAAN_THNPAJAKA."
			AND TBLDAFTHOTEL.TBLDAFTAR_NOPOK IN (".$nopok.")
			GROUP BY
				TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK,
				TBLDAFTAR.TBLDAFTAR_NOPOK,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR.tbldaftar_pemiliknama,
				TBLDAFTAR.tbldaftar_jenispendapatan,
				TBLDAFTAR.tbldaftar_golongan,
				TBLDAFTAR.TBLDAFTAR_NOPOK,
				TBLDAFTAR.tblkelurahan_idbadanusaha,
				TBLDAFTAR.tblkecamatan_idbadanusaha,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
				)
			WHERE
				(jumlah_tunggakan > 0)
			
										";
										
										$flag = "
										UNION
										";
								}
							}

		// ORDER BY
		// 		TBLPENDATAAN_THNPAJAK,
		// 		tblkecamatan_idbadanusaha,
		// 		tblkelurahan_idbadanusaha,
		// 		TBLDAFTAR_NOPOK

		$datax['cetak'] = Yii::app()->db->createCommand($query)->queryAll(); 
		$datax['NamaTBL'] = $NamaTBL;

		$utama = array();
		$rows = array();

		$tanggalsurat = date('d') . ' ' . LokalIndonesia::getBulan(date('m')) . ' ' . date('Y');

		$GLOBALS['nosurat'] = $_REQUEST['nomor_surat'];
		$GLOBALS['datenow'] = $tanggalsurat;
		$GLOBALS['jnspajak'] = $PAJAK;
		$GLOBALS['thpajak'] = '';
		$GLOBALS['tahun'] = (2000+$TBLPENDATAAN_THNPAJAKA) . '-' . (2000+$TBLPENDATAAN_THNPAJAKK);
		$GLOBALS['petugas'] = Yii::app()->user->nama_pengguna;
		$GLOBALS['nip'] = '';

		$total = array('total'=>0);
		$no = 1;
		foreach ($datax['cetak'] as $kolom) :
			$NPWPD = $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$kolom['TBLKECAMATAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$kolom['TBLKELURAHAN_IDBADANUSAHA']));

			$utama['no'] = $no++;
			$utama['namawp'] = trim($kolom['TBLDAFTAR_BADANUSAHANAMA']);
			$utama['alamat'] = trim($kolom['TBLDAFTAR_BADANUSAHAALAMAT']);
			// $utama['nopok'] = trim($kolom['TBLDAFTAR_NOPOK']);
			$utama['nopok'] = $NPWPD;
			$utama['thnpajak'] = trim($kolom['TBLPENDATAAN_THNPAJAK'] + 2000);
			$utama['rpset1'] = $utama['jan'] = LokalIndonesia::ribuan($kolom['TUNGAKAN_JANUARI']);
			$utama['rpset2'] = $utama['feb'] = LokalIndonesia::ribuan($kolom['TUNGAKAN_FEBRUARI']);
			$utama['rpset3'] = $utama['mar'] = LokalIndonesia::ribuan($kolom['TUNGAKAN_MARET']);
			$utama['rpset4'] = $utama['apr'] = LokalIndonesia::ribuan($kolom['TUNGAKAN_APRIL']);
			$utama['rpset5'] = $utama['mei'] = LokalIndonesia::ribuan($kolom['TUNGAKAN_MEI']);
			$utama['rpset6'] = $utama['jun'] = LokalIndonesia::ribuan($kolom['TUNGAKAN_JUNI']);
			$utama['rpset7'] = $utama['jul'] = LokalIndonesia::ribuan($kolom['TUNGAKAN_JULI']);
			$utama['rpset8'] = $utama['agu'] = LokalIndonesia::ribuan($kolom['TUNGAKAN_AGUSTUS']);
			$utama['rpset9'] = $utama['sep'] = LokalIndonesia::ribuan($kolom['TUNGAKAN_SEPTEMBER']);
			$utama['rpset10'] = $utama['okt'] = LokalIndonesia::ribuan($kolom['TUNGAKAN_OKTOBER']);
			$utama['rpset11'] = $utama['nov'] = LokalIndonesia::ribuan($kolom['TUNGAKAN_NOVEMBER']);
			$utama['rpset12'] = $utama['des'] = LokalIndonesia::ribuan($kolom['TUNGAKAN_DESEMBER']);

			$total['total'] += $kolom['TUNGAKAN_JANUARI'] + $kolom['TUNGAKAN_FEBRUARI'] + $kolom['TUNGAKAN_MARET'] + $kolom['TUNGAKAN_APRIL'] + $kolom['TUNGAKAN_MEI'] + $kolom['TUNGAKAN_JUNI'] + $kolom['TUNGAKAN_JULI'] + $kolom['TUNGAKAN_AGUSTUS'] + $kolom['TUNGAKAN_SEPTEMBER'] + $kolom['TUNGAKAN_OKTOBER'] + $kolom['TUNGAKAN_NOVEMBER'] + $kolom['TUNGAKAN_DESEMBER'] ;

			$utama['rpsetor'] = $total['total'];

			array_push($rows, $utama);
		endforeach;
		$header=array();
		$header['total'] = LokalIndonesia::ribuan($total['total']);


		// $otbs->MergeBlock('utama', $rows); 
		$otbs->MergeBlock('data', $rows); 
		$otbs->MergeField('header', $header); 
				// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

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