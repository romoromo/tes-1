<?php

class Lap_realisasibkpController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionCetak()
	{
		$tahun = substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2) : '' ;
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '';
		$tanggal = $_REQUEST['tanggal'] ? $_REQUEST['tanggal'] : '';
		
		$sql = "SELECT
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS,
		(
		SELECT
		TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
		TBLREKENING
		WHERE
		TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLSETOR.TBLSETOR_REKJENIS
		) AS TBLREKENING_NAMAREKENING,
		SUM (
		CASE
		WHEN TBLSETOR_TGLSETOR = '$tanggal' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS HARI_INI,
		SUM (
		CASE
		WHEN TBLSETOR_TGLSETOR < '$tanggal' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS SD_HARILALU,
		SUM (
		CASE
		WHEN TBLSETOR_TGLSETOR <= '$tanggal' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS SD_HARIINI
		FROM
		TBLSETOR
		INNER JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		WHERE
		TBLSETOR.TBLSETOR_THNSETOR = ".$tahun."
		AND TBLSETOR.TBLSETOR_BLNSETOR = ".$bulan."
		AND TBLSETOR.TBLSETOR_STATUSBAYAR <> 20
		GROUP BY
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS
		ORDER BY
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS";

		$data['realisasibkp'] = $realisasibkp = Yii::app()->db->createCommand($sql)->queryAll();

		$this->renderPartial('cetak',array('data'=>$data));
	}
	
	public function actionCetakWord()
	{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_penyetoran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'laporan_realisasi_penerimaan_bkp.docx';
		$namafileDL = "Cetak Laporan Realisasi Penerimaan BKP.docx";

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
		$tahun = substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2) : '' ;
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '';
		$tanggal = $_REQUEST['tanggal'] ? $_REQUEST['tanggal'] : '';
		
		$sql = "SELECT
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS,
		(
		SELECT
		TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
		TBLREKENING
		WHERE
		TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLSETOR.TBLSETOR_REKJENIS
		) AS TBLREKENING_NAMAREKENING,
		SUM (
		CASE
		WHEN TBLSETOR_TGLSETOR = '$tanggal' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS HARI_INI,
		SUM (
		CASE
		WHEN TBLSETOR_TGLSETOR < '$tanggal' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS SD_HARILALU,
		SUM (
		CASE
		WHEN TBLSETOR_TGLSETOR <= '$tanggal' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS SD_HARIINI
		FROM
		TBLSETOR
		INNER JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		WHERE
		TBLSETOR.TBLSETOR_THNSETOR = ".$tahun."
		AND TBLSETOR.TBLSETOR_BLNSETOR = ".$bulan."
		AND TBLSETOR.TBLSETOR_STATUSBAYAR <> 20
		GROUP BY
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS
		ORDER BY
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS";

		$data['realisasibkp'] = $realisasibkp = Yii::app()->db->createCommand($sql)->queryAll();
		$utama=array();
		$rows=array();

		$no = 1;

		$GLOBALS['datenow'] = date('d-m-Y');
		$GLOBALS['tgl'] = $_REQUEST['tanggal'];
		$GLOBALS['bln'] = $_REQUEST['bulan'];
		$GLOBALS['thn'] = $_REQUEST['tahun'];
		$GLOBALS['tgb'] = $_REQUEST['tanggal'];
		$GLOBALS['blb'] = $_REQUEST['bulan'];
		$GLOBALS['thb'] = $_REQUEST['tahun'];

		$totalhariini = array('totalhariini'=>0);
		$totalsdharilalu = array('totalsdharilalu'=>0);
		$totalsdhariini = array('totalsdhariini'=>0);

		foreach($data['realisasibkp'] as $rowWP) :
			$rekening = $rowWP['TBLSETOR_REKPENDAPATAN'] . '.' . ($rowWP['TBLSETOR_REKPAD']) . '.' . ($rowWP['TBLSETOR_REKPAJAK']) . '.' . ($rowWP['TBLSETOR_REKAYAT']) . '.' . ($rowWP['TBLSETOR_REKJENIS']);

			$utama['no'] = $no++;
			$utama['rek'] = $rekening;
			$utama['jenispajak'] =trim($rowWP['TBLREKENING_NAMAREKENING']); 
			$utama['hrini'] = trim(LokalIndonesia::ribuan($rowWP['HARI_INI']));
			$utama['sdhrs'] = trim(LokalIndonesia::ribuan($rowWP['SD_HARILALU']));
			$utama['sdhrini'] = trim(LokalIndonesia::ribuan($rowWP['SD_HARIINI']));
			$totalhariini['totalhariini'] += trim($rowWP['HARI_INI']);
			$totalsdharilalu['totalsdharilalu'] += trim($rowWP['SD_HARILALU']);
			$totalsdhariini['totalsdhariini'] += trim($rowWP['SD_HARIINI']);

		array_push($rows, $utama);
		endforeach;
		$footer=array();
		$footer['sub1'] = "";
		$footer['sub2'] = "";
		$footer['sub3'] = "";
		$footer['jumlah1'] = LokalIndonesia::ribuan($totalhariini['totalhariini']);
		$footer['jumlah2'] = LokalIndonesia::ribuan($totalsdharilalu['totalsdharilalu']);
		$footer['jumlah3'] = LokalIndonesia::ribuan($totalsdhariini['totalsdhariini']);

		$otbs->MergeBlock('utama', $rows);
		$otbs->MergeField('footer', $footer);
		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}
}