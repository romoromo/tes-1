<?php

class Realisasi_pajakdetailController extends Controller
{
	public function init()
	{
		Yii::import('ext.DBFetch');
	}

	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionCari()
	{
		$tahun = substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2) : '0';
		$bulan = trim($_REQUEST['bulan']) ? trim($_REQUEST['bulan']) : '0';
		
		$cari = "SELECT
		TBLREKENING_REKPENDAPATAN_90,
	TBLREKENING_REKPAD_90,
	TBLREKENING_REKPAJAK_90,
	TBLREKENING_REKAYAT_90,
	TBLREKENING_REKJENIS_90,
		SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_BLNSETOR = '$bulan' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS bulanini,
		SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_BLNSETOR < '$bulan' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS sd_bulanlalu,
		SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_BLNSETOR <= '$bulan' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS sd_bulanini,
		REFTARGETPAJAK_NOMINAL AS TARGETANGGARAN,
		TBLREKENING_NAMAREKENING_90 AS nmrekening,
		TBLREKENING_KODE_90 AS rekening
		FROM
		TBLSETOR
		LEFT JOIN TBLREKENING_90 ON
			TBLREKENING_90.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
			AND TBLREKENING_90.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
			AND TBLREKENING_90.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
			AND TBLREKENING_90.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT
			AND TBLREKENING_90.TBLREKENING_REKJENIS = TBLSETOR.TBLSETOR_REKJENIS
		LEFT JOIN REFTARGETPAJAK ON
			REFTARGETPAJAK.TBLMASTERREKENING_KODE = TBLSETOR.TBLSETOR_REKPENDAPATAN || '.' || TBLSETOR.TBLSETOR_REKPAD || '.' || TBLSETOR.TBLSETOR_REKPAJAK || '.' || TBLSETOR.TBLSETOR_REKAYAT || '.' || '0'
			AND REFTARGETPAJAK.REFTARGETPAJAK_TAHUN = '2020'
		WHERE
		TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
		AND TBLSETOR.TBLSETOR_THNSETOR = '$tahun'
		AND TBLSETOR_STATUSBAYAR <> 20
		AND TBLSETOR_REKPAJAK = 1
		AND TBLSETOR_REKAYAT <> 23
		GROUP BY
		TBLREKENING_REKPENDAPATAN_90,
	TBLREKENING_REKPAD_90,
	TBLREKENING_REKPAJAK_90,
	TBLREKENING_REKAYAT_90,
	TBLREKENING_REKJENIS_90,
	TBLREKENING_NAMAREKENING_90,
	TBLREKENING_KODE_90,
	REFTARGETPAJAK_NOMINAL
		ORDER BY
		TBLREKENING_REKPAJAK_90,
	TBLREKENING_REKAYAT_90,
	TBLREKENING_REKJENIS_90";

		$data['cari'] = $cari = Yii::app()->db->createCommand($cari)->queryAll();

		$this->renderPartial('tabel_laporan',array('data'=>$data));
}

public function actioncetaknew()
{
	$tahun = substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2) : '0';
	$bulan = trim($_REQUEST['bulan']) ? trim($_REQUEST['bulan']) : '0';

	$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_penyetoran' . DIRECTORY_SEPARATOR;
	$namatpl = $path_tpl . 'realisasi_pajak_detail.docx';

	Yii::import('ext.DMOpenTBS',true);
	Yii::import('ext.LokalIndonesia');
	DMOpenTBS::init();
	$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
	$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

		$cari = "SELECT
		TBLREKENING_REKPENDAPATAN_90,
	TBLREKENING_REKPAD_90,
	TBLREKENING_REKPAJAK_90,
	TBLREKENING_REKAYAT_90,
	TBLREKENING_REKJENIS_90,
		SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_BLNSETOR = '$bulan' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS bulanini,
		SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_BLNSETOR < '$bulan' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS sd_bulanlalu,
		SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_BLNSETOR <= '$bulan' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS sd_bulanini,
		REFTARGETPAJAK_NOMINAL AS TARGETANGGARAN,
		TBLREKENING_NAMAREKENING_90 AS nmrekening,
		TBLREKENING_KODE_90 AS rekening
		FROM
		TBLSETOR
		LEFT JOIN TBLREKENING_90 ON
			TBLREKENING_90.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
			AND TBLREKENING_90.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
			AND TBLREKENING_90.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
			AND TBLREKENING_90.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT
			AND TBLREKENING_90.TBLREKENING_REKJENIS = TBLSETOR.TBLSETOR_REKJENIS
		LEFT JOIN REFTARGETPAJAK ON
			REFTARGETPAJAK.TBLMASTERREKENING_KODE = TBLSETOR.TBLSETOR_REKPENDAPATAN || '.' || TBLSETOR.TBLSETOR_REKPAD || '.' || TBLSETOR.TBLSETOR_REKPAJAK || '.' || TBLSETOR.TBLSETOR_REKAYAT || '.' || '0'
			AND REFTARGETPAJAK.REFTARGETPAJAK_TAHUN = '2020'
		WHERE
		TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
		AND TBLSETOR.TBLSETOR_THNSETOR = '$tahun'
		AND TBLSETOR_STATUSBAYAR <> 20
		AND TBLSETOR_REKPAJAK = 1
		AND TBLSETOR_REKAYAT <> 23
		GROUP BY
		TBLREKENING_REKPENDAPATAN_90,
	TBLREKENING_REKPAD_90,
	TBLREKENING_REKPAJAK_90,
	TBLREKENING_REKAYAT_90,
	TBLREKENING_REKJENIS_90,
	TBLREKENING_NAMAREKENING_90,
	TBLREKENING_KODE_90,
	REFTARGETPAJAK_NOMINAL
		ORDER BY
		TBLREKENING_REKPAJAK_90,
	TBLREKENING_REKAYAT_90,
	TBLREKENING_REKJENIS_90";

		$data['hasil'] = $cari = Yii::app()->db->createCommand($cari)->queryAll();

$utama = array();
$rows = array();
$dt = array();
$no = 1;

$total_bulanini = 0;
$total_sdbulanini = 0;
$total_sdbulanlalu = 0;
$total_total = 0;
$REK_AYAT_b4 = '';
$utama['tglcetak'] = LokalIndonesia::TanggalUmum(date('Y-m-d'));
$utama['bulan'] = LokalIndonesia::getBulan($bulan);
// $utama['tglsetor'] = $GLOBALS['tglsetor'] = $tglsetor = $data['tgl'];

$master = array();
foreach ($data['hasil'] as $MASTER) :
	if ($MASTER['TBLREKENING_REKAYAT_90'] != $REK_AYAT_b4) :
		$REK_AYAT_b4 = $MASTER['TBLREKENING_REKAYAT_90'];

		$master['no'] = '';
		$master['TBLREKENING_REKAYAT_90'] = $MASTER['TBLREKENING_REKAYAT_90'];
		$master['detail'] = array();

		$master_bulanini = 0;
		$master_sdbulanini = 0;
		$master_sdbulanlalu = 0;
		$master_total = 0;

		foreach ($data['hasil'] as $row) :

			if ($row['TBLREKENING_REKAYAT_90'] == $REK_AYAT_b4) :
				$dt['no'] = $no++;
				$dt['rek_kode'] = $row['REKENING'];
				$dt['rek_nama'] = $row['NMREKENING'];
				$dt['bulanini_pajak'] = LokalIndonesia::ribuan($row['BULANINI']);
				$dt['sdbulanini_pajak'] = LokalIndonesia::ribuan($row['SD_BULANINI']);
				$dt['sdbulanlalu_pajak'] = LokalIndonesia::ribuan($row['SD_BULANLALU']);
				$dt['total_pajak'] = LokalIndonesia::ribuan($row['BULANINI'] + $row['SD_BULANINI']);

				$total_bulanini += $row['BULANINI'];
				$total_sdbulanini += $row['SD_BULANINI'];
				$total_sdbulanlalu += $row['SD_BULANLALU'];
				$total_total += $row['BULANINI'] + $row['SD_BULANINI'];

				$master_bulanini += $row['BULANINI'];
				$master_sdbulanini += $row['SD_BULANINI'];
				$master_sdbulanlalu += $row['SD_BULANLALU'];
				$master_total += $row['BULANINI'] + $row['SD_BULANINI'];

				array_push($master['detail'], $dt);
			endif;

		endforeach;

		$master['bulanini_pajak'] = LokalIndonesia::ribuan($master_bulanini);
		$master['sdbulanini_pajak'] = LokalIndonesia::ribuan($master_sdbulanini);
		$master['sdbulanlalu_pajak'] = LokalIndonesia::ribuan($master_sdbulanlalu);
		$master['total_pajak'] = LokalIndonesia::ribuan($master_total);

		array_push($rows, $master);
	endif;
endforeach;

		// foreach ($data['hasil'] as $row) :

		// 	$dt['no'] = $no++;
		// 	$dt['rek_kode'] = $row['REK'];
		// 	$dt['rek_nama'] = $row['REK_NAMA'];
		// 	$dt['bulanini_pajak'] = LokalIndonesia::ribuan($row['POKOK']);
		// 	$dt['sdbulanini_pajak'] = LokalIndonesia::ribuan($row['BUNGA']);
		// 	$dt['sdbulanlalu_pajak'] = LokalIndonesia::ribuan($row['DENDA']);

		// 	$total_bulanini += $row['POKOK'];
		// 	$total_sdbulanini += $row['BUNGA'];
		// 	$total_sdbulanlalu += $row['DENDA'];

		// 	array_push($rows, $dt);

		// endforeach;

$utama['bulanini_pajak'] = LokalIndonesia::ribuan($total_bulanini);
$utama['sdbulanini_pajak'] = LokalIndonesia::ribuan($total_sdbulanini);
$utama['sdbulanlalu_pajak'] = LokalIndonesia::ribuan($total_sdbulanlalu);
$utama['total_pajak'] = LokalIndonesia::ribuan($total_total);

// echo CJSON::encode(array($rows));Yii::app()->end();

$bulancetak = LokalIndonesia::getBulan($bulan);

		// Merge data in the first sheet 
		// $npwpd = $data['TBLDAFTAR_NOPOK'];
$namafileDL = "Laporan Realisasi Pajak Detail {$bulancetak}.docx";
$otbs->MergeBlock('row', $rows); 
$otbs->MergeField('utama', $utama); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
Yii::app()->end();

}

public function actionCetak()
{
	$tahun = substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2) : '0';
	$bulan = trim($_REQUEST['bulan']) ? trim($_REQUEST['bulan']) : '0';


	$cetak = "SELECT
	TBLSETOR_REKPENDAPATAN,
	TBLSETOR_REKPAD,
	TBLSETOR_REKPAJAK,
	TBLSETOR_REKAYAT,
	TBLSETOR_REKJENIS,
	SUM (
	CASE
	WHEN TBLSETOR.TBLSETOR_BLNSETOR = '$bulan' THEN
	TBLSETOR.TBLSETOR_RUPIAHSETOR
	ELSE
	0
	END
	) AS bulanini,
	SUM (
	CASE
	WHEN TBLSETOR.TBLSETOR_BLNSETOR < '$bulan' THEN
	TBLSETOR.TBLSETOR_RUPIAHSETOR
	ELSE
	0
	END
	) AS sd_bulanlalu,
	SUM (
	CASE
	WHEN TBLSETOR.TBLSETOR_BLNSETOR <= '$bulan' THEN
	TBLSETOR.TBLSETOR_RUPIAHSETOR
	ELSE
	0
	END
	) AS sd_bulanini,
	NVL (
	(
	SELECT
	SUM (
	NVL (
	TBLREKTARGET.TBLREKENING_TARGETANGGARAN,
	0
	)
	) AS TARGETANGGARAN
	FROM
	TBLREKTARGET
	WHERE
	TBLREKTARGET.REFBADANUSAHA_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
	AND TBLREKTARGET.PAD = TBLSETOR.TBLSETOR_REKPAD
	AND TBLREKTARGET.PJK = TBLSETOR.TBLSETOR_REKPAJAK
	AND TBLREKTARGET.AYT = TBLSETOR.TBLSETOR_REKAYAT
	GROUP BY
	TBLSETOR_REKPENDAPATAN,
	TBLSETOR_REKPAD,
	TBLSETOR_REKPAJAK,
	TBLSETOR_REKAYAT
	),
	0
	) AS TARGETANGGARAN,
	(
	SELECT
	TBLREKENING_NAMAREKENING
	FROM
	TBLREKENING
	WHERE
	TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
	AND TBLREKENING.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
	AND TBLREKENING.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
	AND TBLREKENING.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT
	AND TBLREKENING.TBLREKENING_REKJENIS = TBLSETOR.TBLSETOR_REKJENIS
	) AS nmrekening,
	(
	SELECT
	CONCAT (
	TBLREKENING.TBLREKENING_REKURUSAN,
	CONCAT (
	'.',
	CONCAT (
	TBLREKENING.TBLREKENING_REKPEMERINTAHAN,
	CONCAT (
	'.',
	CONCAT (
	TBLREKENING.TBLREKENING_REKORGANISASI,
	CONCAT (
	'.',
	CONCAT (
	TBLREKENING.TBLREKENING_REKPROGRAM,
	CONCAT (
	'.',
	CONCAT (
	TBLREKENING.TBLREKENING_REKKEGIATAN,
	CONCAT (
	'.',
	CONCAT (
	TBLREKENING.TBLREKENING_REKDINAS,
	CONCAT (
	'.',
	CONCAT (
	TBLREKENING.TBLREKENING_REKBIDANG,
	CONCAT (
	'.',
	CONCAT (
	TBLREKENING.TBLREKENING_REKPENDAPATAN,
	CONCAT (
	'.',
	CONCAT (
	TBLREKENING.TBLREKENING_REKPAD,
	CONCAT (
	'.',
	CONCAT (
	TBLREKENING.TBLREKENING_REKPAJAK,
	CONCAT (
	'.',
	CONCAT (
	TBLREKENING.TBLREKENING_REKAYAT,
	CONCAT (
	'.',
	CONCAT (
	TBLREKENING.TBLREKENING_REKJENIS,
	CONCAT ('', '')
	)
	)
	)
	)
	)
	)
	)
	)
	)
	)
	)
	)
	)
	)
	)
	)
	)
	)
	)
	)
	)
	)
	) AS rekening
	FROM
	TBLREKENING
	WHERE
	TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
	AND TBLREKENING.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
	AND TBLREKENING.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
	AND TBLREKENING.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT
	AND TBLREKENING.TBLREKENING_REKJENIS = TBLSETOR.TBLSETOR_REKJENIS
	) AS rekening
	FROM
	TBLSETOR
	WHERE
	TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
	AND TBLSETOR.TBLSETOR_THNSETOR = '$tahun'
	AND TBLSETOR_STATUSBAYAR <> 20
	AND TBLSETOR_REKPAJAK = 1
	AND TBLSETOR_REKAYAT <> 23
	GROUP BY
	TBLSETOR_REKPENDAPATAN,
	TBLSETOR_REKPAD,
	TBLSETOR_REKPAJAK,
	TBLSETOR_REKAYAT,
	TBLSETOR_REKJENIS
	ORDER BY
	TBLSETOR_REKAYAT";

// 	$cetak = "SELECT
// 	TBLSETOR_REKPENDAPATAN,
// 	TBLSETOR_REKPAD,
// 	TBLSETOR_REKPAJAK,
// 	TBLSETOR_REKAYAT,
// 	TBLSETOR_REKJENIS,
// 	SUM (
// 		CASE
// 		WHEN TBLSETOR.TBLSETOR_BLNSETOR = '$bulan' THEN
// 		TBLSETOR.TBLSETOR_RUPIAHSETOR
// 		ELSE
// 		0
// 		END
// 		) AS bulanini,
// SUM (
// 	CASE
// 	WHEN TBLSETOR.TBLSETOR_BLNSETOR < '$bulan' THEN
// 	TBLSETOR.TBLSETOR_RUPIAHSETOR
// 	ELSE
// 	0
// 	END
// 	) AS sd_bulanlalu,
// SUM (
// 	CASE
// 	WHEN TBLSETOR.TBLSETOR_BLNSETOR <= '$bulan' THEN
// 	TBLSETOR.TBLSETOR_RUPIAHSETOR
// 	ELSE
// 	0
// 	END
// 	) AS sd_bulanini,
// NVL (
// 	(
// 		SELECT
// 		SUM (
// 			NVL (
// 				TBLREKTARGET.TBLREKENING_TARGETANGGARAN,
// 				0
// 				)
// ) AS TARGETANGGARAN
// FROM
// TBLREKTARGET
// WHERE
// TBLREKTARGET.REFBADANUSAHA_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
// AND TBLREKTARGET.PAD = TBLSETOR.TBLSETOR_REKPAD
// AND TBLREKTARGET.PJK = TBLSETOR.TBLSETOR_REKPAJAK
// AND TBLREKTARGET.AYT = TBLSETOR.TBLSETOR_REKAYAT
// GROUP BY
// TBLSETOR_REKPENDAPATAN,
// TBLSETOR_REKPAD,
// TBLSETOR_REKPAJAK,
// TBLSETOR_REKAYAT
// ),
// 0
// ) AS TARGETANGGARAN,
// (
// 	SELECT
// 	TBLREKENING_NAMAREKENING
// 	FROM
// 	TBLREKENING
// 	WHERE
// 	TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
// 	AND TBLREKENING.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
// 	AND TBLREKENING.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
// 	AND TBLREKENING.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT
// 	AND TBLREKENING.TBLREKENING_REKJENIS = TBLSETOR.TBLSETOR_REKJENIS
// 	) AS nmrekening,
// (
// 	SELECT
// 	CONCAT (
// 		TBLREKENING.TBLREKENING_REKURUSAN,
// 		CONCAT (
// 			'.',
// 			CONCAT (
// 				TBLREKENING.TBLREKENING_REKPEMERINTAHAN,
// 				CONCAT (
// 					'.',
// 					CONCAT (
// 						TBLREKENING.TBLREKENING_REKORGANISASI,
// 						CONCAT (
// 							'.',
// 							CONCAT (
// 								TBLREKENING.TBLREKENING_REKPROGRAM,
// 								CONCAT (
// 									'.',
// 									CONCAT (
// 										TBLREKENING.TBLREKENING_REKKEGIATAN,
// 										CONCAT (
// 											'.',
// 											CONCAT (
// 												TBLREKENING.TBLREKENING_REKDINAS,
// 												CONCAT (
// 													'.',
// 													CONCAT (
// 														TBLREKENING.TBLREKENING_REKBIDANG,
// 														CONCAT (
// 															'.',
// 															CONCAT (
// 																TBLREKENING.TBLREKENING_REKPENDAPATAN,
// 																CONCAT (
// 																	'.',
// 																	CONCAT (
// 																		TBLREKENING.TBLREKENING_REKPAD,
// 																		CONCAT (
// 																			'.',
// 																			CONCAT (
// 																				TBLREKENING.TBLREKENING_REKPAJAK,
// 																				CONCAT (
// 																					'.',
// 																					CONCAT (
// 																						TBLREKENING.TBLREKENING_REKAYAT,
// 																						CONCAT (
// 																							'.',
// 																							CONCAT (
// 																								TBLREKENING.TBLREKENING_REKJENIS,
// 																								CONCAT ('', '')
// 																								)
// )
// )
// )
// )
// )
// )
// )
// )
// )
// )
// )
// )
// )
// )
// )
// )
// )
// )
// )
// )
// )
// ) AS rekening
// FROM
// TBLREKENING
// WHERE
// TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
// AND TBLREKENING.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
// AND TBLREKENING.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
// AND TBLREKENING.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT
// AND TBLREKENING.TBLREKENING_REKJENIS = TBLSETOR.TBLSETOR_REKJENIS
// ) AS rekening
// FROM
// TBLSETOR
// WHERE
// TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
// AND TBLSETOR.TBLSETOR_THNSETOR = '$tahun'
// AND TBLSETOR_STATUSBAYAR <> 20
// AND TBLSETOR_REKPAJAK = 1
// AND TBLSETOR_REKAYAT <> 23
// GROUP BY
// TBLSETOR_REKPENDAPATAN,
// TBLSETOR_REKPAD,
// TBLSETOR_REKPAJAK,
// TBLSETOR_REKAYAT,
// TBLSETOR_REKJENIS
// ORDER BY
// TBLSETOR_REKAYAT";

	$data['cetak'] = $cetak = Yii::app()->db->createCommand($cetak)->queryAll();
	if (isset($_REQUEST['jenis']) AND ($_REQUEST['jenis'])=='excel') {
		header('Content-Type: application/excel');
		header("Content-Disposition: attachment;Filename=Cetak-Jenis.xls");
	}		
	$this->renderPartial('cetak',array('data'=>$data));
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