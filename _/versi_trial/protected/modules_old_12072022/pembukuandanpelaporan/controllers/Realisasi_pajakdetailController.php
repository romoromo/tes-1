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
TBLSETOR_REKPAJAK";

$data['cari'] = $cari = Yii::app()->db->createCommand($cari)->queryAll();

$this->renderPartial('tabel_laporan',array('data'=>$data));
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