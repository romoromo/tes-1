<?php

class Kasumum_bulanan_90Controller extends Controller
{
	var $MODULE_URL = 'daftar_setoran/kasumum_bulanan_90';

	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionCetak()
	{
		$tahun =substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2) : '';
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '';
		
		
		if($tahun==''){
			$wheretahun = "";
		}
		else{
			$wheretahun = "	AND TBLSETOR.TBLSETOR_THNSETOR = ".$tahun."";
		};		

		if($bulan==''){
			$wherebulan = "";
		}
		else{
			$wherebulan = "	AND TBLSETOR.TBLSETOR_BLNSETOR = ".$bulan."";
		};		

		$sql ="SELECT
		TBLSETOR.TBLSETOR_GOLONGAN,
		TBLSETOR.TBLSETOR_THNSETOR,
		TBLSETOR.TBLSETOR_BLNSETOR,
		TBLSETOR.TBLSETOR_TGLSETOR,
		TBLSETOR.TBLDAFTAR_NOPOK,
		TBLSETOR.TBLPENDATAAN_THNPAJAK,
		TBLSETOR.TBLPENDATAAN_BLNPAJAK,
		TBLSETOR.TBLPENDATAAN_TGLPAJAK,
		TBLSETOR.TBLSETOR_NOMORSSPD,
		
		TBLREKENING.TBLREKENING_REKPENDAPATAN_90 AS TBLSETOR_REKPENDAPATAN,
		TBLREKENING.TBLREKENING_REKPAD_90 AS TBLSETOR_REKPAD,
		TBLREKENING.TBLREKENING_REKPAJAK_90 AS TBLSETOR_REKPAJAK,
		TBLREKENING.TBLREKENING_REKAYAT_90 TBLSETOR_REKAYAT,
		TBLREKENING.TBLREKENING_REKJENIS_90 AS TBLSETOR_REKJENIS,
		TBLREKENING.TBLREKENING_REKSUBJENIS_90 AS TBLSETOR_REKSUBJENIS,

		NVL (
		TBLDAFTAR_BADANUSAHANAMA,
		'PBB'
		) AS TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		FROM
		TBLSETOR
		LEFT JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		LEFT JOIN TBLREKENING_90 TBLREKENING
			ON
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT

			AND TBLREKENING.TBLREKENING_REKJENIS = TBLSETOR.TBLSETOR_REKJENIS

		WHERE
		TBLSETOR.TBLSETOR_STATUSBAYAR <> 20
		AND TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
		".$wheretahun."
		".$wherebulan."
		ORDER BY
		TBLSETOR.TBLSETOR_THNSETOR,
		TBLSETOR.TBLSETOR_BLNSETOR,
		TBLSETOR.TBLSETOR_TGLSETOR,
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS
		";
		$data['hasil'] = $hasil = Yii::app()->db->createCommand($sql)->queryAll();

		$this->renderPartial('cetak', array('data'=>$data));
	}
	public function actionCetakWord()
	{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_penyetoran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'cetak _bku_bulanan.docx';
		$namatpl = $path_tpl . 'cetak_bku_bulanan-ttdpejabat.docx';
		$namafileDL = "Cetak BKU Bulanan.docx";

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

		$tahun =substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2) : '';
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '';

		$tahun_p = $tahun+2000;
		$bulan_p = LokalIndonesia::getBulan($bulan);

		$namafileDL = "Cetak BKU Bulanan {$tahun_p}-{$bulan_p}.docx";
		
		
		if($tahun==''){
			$wheretahun = "";
		}
		else{
			$wheretahun = "	AND TBLSETOR.TBLSETOR_THNSETOR = ".$tahun."";
		};		

		if($bulan==''){
			$wherebulan = "";
		}
		else{
			$wherebulan = "	AND TBLSETOR.TBLSETOR_BLNSETOR = ".$bulan."";
		};		

		$sql ="SELECT
		TBLSETOR.TBLSETOR_GOLONGAN,
		TBLSETOR.TBLSETOR_THNSETOR,
		TBLSETOR.TBLSETOR_BLNSETOR,
		TBLSETOR.TBLSETOR_TGLSETOR,
		TBLSETOR.TBLDAFTAR_NOPOK,
		TBLSETOR.TBLPENDATAAN_THNPAJAK,
		TBLSETOR.TBLPENDATAAN_BLNPAJAK,
		NVL (TBLSETOR.TBLPENDATAAN_TGLPAJAK,
			'0'
			)AS TBLPENDATAAN_TGLPAJAK,
		TBLSETOR.TBLSETOR_NOMORSSPD,
		
		TBLREKENING.TBLREKENING_REKPENDAPATAN_90 AS TBLSETOR_REKPENDAPATAN,
		TBLREKENING.TBLREKENING_REKPAD_90 AS TBLSETOR_REKPAD,
		TBLREKENING.TBLREKENING_REKPAJAK_90 AS TBLSETOR_REKPAJAK,
		TBLREKENING.TBLREKENING_REKAYAT_90 TBLSETOR_REKAYAT,
		TBLREKENING.TBLREKENING_REKJENIS_90 AS TBLSETOR_REKJENIS,
		TBLREKENING.TBLREKENING_REKSUBJENIS_90 AS TBLSETOR_REKSUBJENIS,

		NVL (
		TBLDAFTAR_BADANUSAHANAMA,
		'PBB'
		) AS TBLDAFTAR_BADANUSAHANAMA,
		NVL (
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			'0'
			) AS TBLDAFTAR_GOLONGAN,
		NVL (
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
			'0'
			) AS TBLKECAMATAN_IDBADANUSAHA,
		NVL ( 
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			'0'
			) AS TBLKELURAHAN_IDBADANUSAHA,
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		FROM
		TBLSETOR
		LEFT JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		LEFT JOIN TBLREKENING_90 TBLREKENING
			ON
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT

			AND TBLREKENING.TBLREKENING_REKJENIS = TBLSETOR.TBLSETOR_REKJENIS

		WHERE
		TBLSETOR.TBLSETOR_STATUSBAYAR <> 20
		AND TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
		".$wheretahun."
		".$wherebulan."
		ORDER BY
		TBLSETOR.TBLSETOR_THNSETOR,
		TBLSETOR.TBLSETOR_BLNSETOR,
		TBLSETOR.TBLSETOR_TGLSETOR,
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS
		";
		$data['cetak'] = $cetak = Yii::app()->db->createCommand($sql)->queryAll();
		$utama = array();
		$rows = array();

		$no = 1;

		$GLOBALS['datenow'] =  date('d-m-Y');
		$GLOBALS['bulan'] =  $_REQUEST['bulan'];
		$GLOBALS['tahun'] =  $_REQUEST['tahun'];

			$totalsetor = array('totalsetor'=>0);
		$totalsetor1 = array('totalsetor1'=>0);

		foreach ($data['cetak'] as $rowWP) :
			$setor = $rowWP['TBLSETOR_TGLSETOR'] . '/' . ($rowWP['TBLSETOR_BLNSETOR']) . '/' . ($rowWP['TBLSETOR_THNSETOR']);
			$NPWPD = $rowWP['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$rowWP['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$rowWP['TBLKELURAHAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$rowWP['TBLKECAMATAN_IDBADANUSAHA']));
			$rekening = $rowWP['TBLSETOR_REKPENDAPATAN'] . '.' . ($rowWP['TBLSETOR_REKPAD']) . '.' . ($rowWP['TBLSETOR_REKPAJAK']) . '.' . ($rowWP['TBLSETOR_REKAYAT']) . '.' . ($rowWP['TBLSETOR_REKJENIS']);

			$utama['no'] = $no++;
			$utama['tglsetor'] = $setor;
			$utama['sspd'] = trim($rowWP['TBLSETOR_NOMORSSPD']);
			$utama['npwpd'] = $NPWPD;
			$utama['nwp'] =  trim($rowWP['TBLDAFTAR_BADANUSAHANAMA']);
			$utama['ke'] = "";
			$utama['rek'] = $rekening;
			$utama['th'] = trim($rowWP['TBLPENDATAAN_THNPAJAK']);
			$utama['bl'] = trim($rowWP['TBLPENDATAAN_BLNPAJAK']);
			$utama['hr'] = trim($rowWP['TBLPENDATAAN_TGLPAJAK']);
			$utama['penerimaan'] = trim(LokalIndonesia::ribuan($rowWP['TBLSETOR_RUPIAHSETOR']));
			$utama['pengeluaran'] = trim(LokalIndonesia::ribuan($rowWP['TBLSETOR_RUPIAHSETOR']));
			$utama['totalpenerimaan'] = "";
			$totalsetor['totalsetor'] += trim($rowWP['TBLSETOR_RUPIAHSETOR']);
			$totalsetor1['totalsetor1'] += trim($rowWP['TBLSETOR_RUPIAHSETOR']);



		array_push($rows, $utama);
		endforeach;
		$footer=array();
		$footer['skhs'] = "";
		$footer['totalsetor'] = LokalIndonesia::ribuan($totalsetor['totalsetor']);
		$footer['totalsetor1'] =  LokalIndonesia::ribuan($totalsetor1['totalsetor1']);
		$footer['jpenerimaan'] = LokalIndonesia::ribuan($totalsetor['totalsetor']);
		$footer['jpenyetoran'] = LokalIndonesia::ribuan($totalsetor1['totalsetor1']);
		$footer['skhi'] = $totalsetor['totalsetor'] - $totalsetor1['totalsetor1'];

		$sqlkaban = "SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID=1";
		$pjbt_kaban = Yii::app()->db->createCommand($sqlkaban)->queryRow();
		$footer['kaban_pejabat_nama'] = $pjbt_kaban ? $pjbt_kaban['TBLPEJABAT_NAMA'] : '';
		$footer['kaban_pejabat_nip'] = $pjbt_kaban ? $pjbt_kaban['TBLPEJABAT_NIP'] : '';

		$sqlbendahara = "SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID=24";
		$pjbt_bendahara = Yii::app()->db->createCommand($sqlbendahara)->queryRow();
		$footer['bendahara_pejabat_nama'] = $pjbt_bendahara ? $pjbt_bendahara['TBLPEJABAT_NAMA'] : '';
		$footer['bendahara_pejabat_nip'] = $pjbt_bendahara ? $pjbt_bendahara['TBLPEJABAT_NIP'] : '';

		$otbs->MergeBlock('utama', $rows);
		$otbs->MergeField('footer', $footer);
		
		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();

	}

	public function actionCetakWord2()
	{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_penyetoran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'cetak _bku_bulanan.docx';
		$namatpl = $path_tpl . 'cetak_bku_bulanan-rekap.docx';
		$namafileDL = "Cetak BKU Bulanan.docx";

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

		$tahun =substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2) : '';
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '';

		$tahun_p = $tahun+2000;
		$bulan_p = LokalIndonesia::getBulan($bulan);

		$namafileDL = "Cetak BKU Bulanan {$tahun_p}-{$bulan_p}.docx";
		
		
		if($tahun==''){
			$wheretahun = "";
		}
		else{
			$wheretahun = "	AND TBLSETOR.TBLSETOR_THNSETOR = ".$tahun."";
		};		

		if($bulan==''){
			$wherebulan = "";
		}
		else{
			$wherebulan = "	AND TBLSETOR.TBLSETOR_BLNSETOR = ".$bulan."";
		};		

		$sql ="
		SELECT 
		TBLSETOR_THNSETOR,
		TBLSETOR_BLNSETOR,
		TBLSETOR_TGLSETOR,
		TBLSETOR_REKAYAT,
		SUM(TBLSETOR_RUPIAHSETOR) AS TBLSETOR_RUPIAHSETOR,
		SUM(TBLSETOR_RUPIAHSTS) AS TBLSETOR_RUPIAHSTS,
		SUM(TBLSETOR_HARIAN) AS TBLSETOR_HARIAN
		 FROM (
		SELECT
		TBLSETOR.TBLSETOR_THNSETOR,
		TBLSETOR.TBLSETOR_BLNSETOR,
		TBLSETOR.TBLSETOR_TGLSETOR,
		CASE WHEN TBLSETOR.TBLSETOR_REKPAJAK = 4 THEN NVL(TBLSETOR.TBLSETOR_REKJENIS,0) ELSE TBLSETOR.TBLSETOR_REKAYAT END AS TBLSETOR_REKAYAT,
		-- TBLSETOR.TBLSETOR_REKAYAT TBLSETOR_REKAYAT,
		-- SUM(TBLSETOR.TBLSETOR_RUPIAHSETOR) TBLSETOR_RUPIAHSETOR,
		CASE WHEN TBLSETOR.TBLSETOR_STATUSBAYAR <> 20 AND TBLSETOR.TBLSETOR_REKPAJAK = 1 THEN (TBLSETOR.TBLSETOR_RUPIAHSETOR
		+NVL(TBLSETOR.TBLSETOR_BUNGAKETETAPAN,0)
		+NVL(TBLSETOR.TBLSETOR_DENDAKETETAPAN,0)) ELSE 0 END AS TBLSETOR_RUPIAHSETOR,
		CASE WHEN TBLSETOR.TBLSETOR_STATUSBAYAR = 20 THEN TBLSETOR.TBLSETOR_RUPIAHSETOR ELSE 0 END AS TBLSETOR_RUPIAHSTS,
		CASE WHEN TBLSETOR.TBLSETOR_STATUSBAYAR <> 20 THEN TBLSETOR.TBLSETOR_RUPIAHSETOR ELSE 0 END AS TBLSETOR_HARIAN
		FROM
		TBLSETOR
		LEFT JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		

		WHERE TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
		".$wheretahun."
		".$wherebulan."
		) TAB
		
		GROUP BY
		TBLSETOR_THNSETOR,
		TBLSETOR_BLNSETOR,
		TBLSETOR_TGLSETOR,
		TBLSETOR_REKAYAT
		ORDER BY
		TBLSETOR_THNSETOR,
		TBLSETOR_BLNSETOR,
		TBLSETOR_TGLSETOR
		";
		$data['cetak'] = $cetak = Yii::app()->db->createCommand($sql)->queryAll();
		$utama = array();
		$rows = array();
		$dt = array();
		$no = 1;

		$GLOBALS['datenow'] =  date('d-m-Y');
		$GLOBALS['bulan'] =  $_REQUEST['bulan'];
		$GLOBALS['tahun'] =  $_REQUEST['tahun'];

		// $totalsetor = array('totalsetor'=>0);
		// $totalsetor1 = array('totalsetor1'=>0);
		$total_setor = 0;
		$total_sts = 0;
		$total_selisih = 0;
		$TGL_b4 = '';

		$master = array();

		foreach ($data['cetak'] as $rowWP) :
			if ($rowWP['TBLSETOR_TGLSETOR'] != $TGL_b4) :
			$TGL_b4 = $rowWP['TBLSETOR_TGLSETOR'];

			$master['no'] = '';
			$master['TGL'] = $rowWP['TBLSETOR_TGLSETOR'];
			$master['detail'] = array();

			$master_setoran = 0;
			$master_sts = 0;
			$master_selisih = 0;

			foreach ($data['cetak'] as $row) :

			if ($row['TBLSETOR_TGLSETOR'] == $TGL_b4) :
				$tglsetor = $row['TBLSETOR_TGLSETOR'] . '/' . ($row['TBLSETOR_BLNSETOR']) . '/' . ($row['TBLSETOR_THNSETOR']);
				// $rekening = $row['TBLSETOR_REKAYAT'];
				$rekening=$this->getnamarek($row['TBLSETOR_REKAYAT']);

				if (round(($row['TBLSETOR_HARIAN']-$row['TBLSETOR_RUPIAHSTS']))<> 0) {
					$selisih = 'selisih '.trim(LokalIndonesia::ribuan(($row['TBLSETOR_HARIAN']-$row['TBLSETOR_RUPIAHSTS'])));
				} else {
					$selisih = '';
				}

				$dt['no'] = $no++;
				$dt['tglsetor'] = $tglsetor;
				$dt['rek'] = $rekening;
				$dt['cekselisih'] = $selisih;
				$dt['penerimaan'] = trim(LokalIndonesia::ribuan($row['TBLSETOR_HARIAN']));
				$dt['pengeluaran'] = trim(LokalIndonesia::ribuan($row['TBLSETOR_RUPIAHSTS']));

				$total_setor += trim($row['TBLSETOR_HARIAN']);
				$total_sts += trim($row['TBLSETOR_RUPIAHSTS']);
				$total_selisih += trim($row['TBLSETOR_HARIAN']);

				$master_setoran += $row['TBLSETOR_HARIAN'];
				$master_sts += $row['TBLSETOR_RUPIAHSTS'];
				$master_selisih += ($row['TBLSETOR_HARIAN']-$row['TBLSETOR_RUPIAHSTS']);

				array_push($master['detail'], $dt);
			endif;

			endforeach;

			$master['setoran'] = LokalIndonesia::ribuan($master_setoran);
			$master['sts'] = LokalIndonesia::ribuan($master_sts);
			// $master['totalselisih'] = LokalIndonesia::ribuan($master_selisih);

			array_push($rows, $master);
		endif;
		endforeach;

		// foreach ($data['cetak'] as $rowWP) :
		// 	if ($rowWP['TBLSETOR_REKAYAT'] != $TGL_b4) :
		// 	$TGL_b4 = $rowWP['TBLSETOR_REKAYAT'];

		// 	$master['no'] = '';
		// 	$master['TGL'] = $rowWP['TBLSETOR_REKAYAT'];
		// 	$master['detail'] = array();

		// 	$master_setoran = 0;
		// 	$master_sts = 0;
		// 	$master_sumharian = 0;

		// 	foreach ($data['cetak'] as $row) :

		// 	if ($row['TBLSETOR_REKAYAT'] == $TGL_b4) :
		// 		$tglsetor = $row['TBLSETOR_TGLSETOR'] . '/' . ($row['TBLSETOR_BLNSETOR']) . '/' . ($row['TBLSETOR_THNSETOR']);
		// 		// $rekening = $row['TBLSETOR_REKAYAT'];
		// 		$rekening=$this->getnamarek($row['TBLSETOR_REKAYAT']);

		// 		$dt['no'] = $no++;
		// 		$dt['tglsetor'] = $tglsetor;
		// 		$dt['rek'] = $rekening;
		// 		$dt['sumharian'] = trim(LokalIndonesia::ribuan($row['TBLSETOR_HARIAN']));
		// 		$dt['penerimaan'] = trim(LokalIndonesia::ribuan($row['TBLSETOR_RUPIAHSETOR']));
		// 		$dt['pengeluaran'] = trim(LokalIndonesia::ribuan($row['TBLSETOR_RUPIAHSTS']));

		// 		$total_setor += trim($row['TBLSETOR_RUPIAHSETOR']);
		// 		$total_sts += trim($row['TBLSETOR_RUPIAHSTS']);
		// 		$total_sumharian += trim($row['TBLSETOR_HARIAN']);

		// 		$master_setoran += $row['TBLSETOR_RUPIAHSETOR'];
		// 		$master_sts += $row['TBLSETOR_RUPIAHSTS'];
		// 		$master_sumharian += $row['TBLSETOR_HARIAN'];

		// 		array_push($master['detail'], $dt);
		// 	endif;

		// 	endforeach;

		// 	$master['setoran'] = LokalIndonesia::ribuan($master_setoran);
		// 	$master['sts'] = LokalIndonesia::ribuan($master_sts);
		// 	$master['totalsumharian'] = LokalIndonesia::ribuan($master_sumharian);

		// 	array_push($rows, $master);
		// endif;
		// endforeach;
		$footer=array();
		$footer['skhs'] = "";
		$footer['totalsetor'] = LokalIndonesia::ribuan($total_setor);
		$footer['totalsetor1'] =  LokalIndonesia::ribuan($total_sts);
		$footer['jpenerimaan'] = LokalIndonesia::ribuan($total_setor);
		$footer['jpenyetoran'] = LokalIndonesia::ribuan($total_sts);
		$footer['skhi'] = LokalIndonesia::ribuan($total_setor - $total_sts);

		$sqlkaban = "SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID=1";
		$pjbt_kaban = Yii::app()->db->createCommand($sqlkaban)->queryRow();
		$footer['kaban_pejabat_nama'] = $pjbt_kaban ? $pjbt_kaban['TBLPEJABAT_NAMA'] : '';
		$footer['kaban_pejabat_nip'] = $pjbt_kaban ? $pjbt_kaban['TBLPEJABAT_NIP'] : '';

		$sqlbendahara = "SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID=24";
		$pjbt_bendahara = Yii::app()->db->createCommand($sqlbendahara)->queryRow();
		$footer['bendahara_pejabat_nama'] = $pjbt_bendahara ? $pjbt_bendahara['TBLPEJABAT_NAMA'] : '';
		$footer['bendahara_pejabat_nip'] = $pjbt_bendahara ? $pjbt_bendahara['TBLPEJABAT_NIP'] : '';

		// echo CJSON::encode(array($rows));Yii::app()->end();

		$otbs->MergeBlock('utama', $rows);
		$otbs->MergeField('footer', $footer);
		
		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();

	}

	

	public function getnamarek($ayat) {
		$sqlsts = "
		SELECT TBLREKENING_NAMAREKENING_90 
		FROM TBLREKENING_90
		WHERE TBLREKENING_REKPAD = 1
		AND TBLREKENING_REKPAJAK = 1
		AND TBLREKENING_REKAYAT = ".$ayat."
		AND TBLREKENING_REKJENIS = 0
		";
		$sts = Yii::app()->db->createCommand($sqlsts)->queryScalar();

		return $sts;
	}
}