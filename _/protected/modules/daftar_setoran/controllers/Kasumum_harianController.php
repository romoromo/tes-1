<?php

class Kasumum_harianController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}
	public function actionCetak()
	{
		$tahun =substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2) : '';
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '';
		$tanggal = $_REQUEST['tanggal'] ? $_REQUEST['tanggal'] : '';
	
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

		if($tanggal==''){
			$wheretanggal = "";
		}
		else{
			$wheretanggal = "	AND TBLSETOR.TBLSETOR_TGLSETOR = ".$tanggal."";
		};		
	

		$sql = "SELECT
		TBLSETOR.TBLSETOR_THNSETOR,
		TBLSETOR.TBLSETOR_BLNSETOR,
		TBLSETOR.TBLSETOR_TGLSETOR,
		TBLSETOR.TBLDAFTAR_NOPOK,
		TBLSETOR.TBLPENDATAAN_THNPAJAK,
		TBLSETOR.TBLPENDATAAN_BLNPAJAK,
		TBLSETOR.TBLPENDATAAN_TGLPAJAK,
		TBLSETOR.TBLSETOR_NOMORSSPD,
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS,
		TBLSETOR.TBLSETOR_REKSUBJENIS,
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
		WHERE
		TBLSETOR.TBLSETOR_STATUSBAYAR <> 20
		AND TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
		".$wheretahun."
		".$wherebulan."
		".$wheretanggal."
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
		$namatpl = $path_tpl . 'cetak_bku_harian.docx';
		$namafileDL = "Cetak BKU Harian.docx";

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
		$tanggal = $_REQUEST['tanggal'] ? $_REQUEST['tanggal'] : '';
	
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

		if($tanggal==''){
			$wheretanggal = "";
		}
		else{
			$wheretanggal = "	AND TBLSETOR.TBLSETOR_TGLSETOR = ".$tanggal."";
		};		
	

		$sql = "SELECT
		TBLSETOR.TBLSETOR_THNSETOR,
		TBLSETOR.TBLSETOR_BLNSETOR,
		TBLSETOR.TBLSETOR_TGLSETOR,
		TBLSETOR.TBLSETOR_TGLSETOR,
		TBLSETOR.TBLDAFTAR_NOPOK,
		TBLSETOR.TBLPENDATAAN_THNPAJAK,
		TBLSETOR.TBLPENDATAAN_BLNPAJAK,
		NVL (TBLSETOR.TBLPENDATAAN_TGLPAJAK,
			'0'
			) AS TBLPENDATAAN_TGLPAJAK,		
		TBLSETOR.TBLSETOR_NOMORSSPD,
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS,
		TBLSETOR.TBLSETOR_REKSUBJENIS,
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
		NVL (TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			'0'
			) AS TBLKELURAHAN_IDBADANUSAHA,
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		FROM
		TBLSETOR
		LEFT JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		WHERE
		TBLSETOR.TBLSETOR_STATUSBAYAR <> 20
		AND TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
		".$wheretahun."
		".$wherebulan."
		".$wheretanggal."
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
		$GLOBALS['tanggal'] = $_REQUEST['tanggal'];
		$GLOBALS['bulan'] =  $_REQUEST['bulan'];
		$GLOBALS['tahun'] =  $_REQUEST['tahun'];

		$totalsetor = array('totalsetor'=>0);
		$totalsetor1 = array('totalsetor1'=>0);

		foreach ($data['cetak'] as $rowWP) :

			$setor = $rowWP['TBLSETOR_TGLSETOR'] . '/' . ($rowWP['TBLSETOR_BLNSETOR']) . '/' . ($rowWP['TBLSETOR_THNSETOR']);
			$NPWPD = $rowWP['TBLDAFTAR_GOLONGAN'] . '.' .(sprintf('%07d',$rowWP['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$rowWP['TBLKELURAHAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$rowWP['TBLKECAMATAN_IDBADANUSAHA']));
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
			$utama['sisa'] = "";
			$utama['sisakhi'] = "";
			$totalsetor['totalsetor'] += trim($rowWP['TBLSETOR_RUPIAHSETOR']);
			$totalsetor1['totalsetor1'] += trim($rowWP['TBLSETOR_RUPIAHSETOR']);



		array_push($rows, $utama);
		endforeach;
		$footer=array();
		$footer['totalsetor'] = LokalIndonesia::ribuan($totalsetor['totalsetor']);
		$footer['totalsetor1'] =  LokalIndonesia::ribuan($totalsetor1['totalsetor1']);
		$footer['jpenerimaan'] = LokalIndonesia::ribuan($totalsetor['totalsetor']);
		$footer['jpenyetoran'] = LokalIndonesia::ribuan($totalsetor1['totalsetor1']);
		$footer['sisakhi'] = $totalsetor['totalsetor'] - $totalsetor1['totalsetor1'];

		$otbs->MergeBlock('utama', $rows);
		$otbs->MergeField('footer', $footer);
		
		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();

	}
}