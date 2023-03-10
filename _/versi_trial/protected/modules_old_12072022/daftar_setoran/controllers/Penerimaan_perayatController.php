<?php

class Penerimaan_perayatController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionCetak()
	{
		$tahun =substr($_REQUEST['tahun'], -2);
		$bulan = $_REQUEST['bulan'];
		$data=array();

		$sql = "SELECT
	TBLSETOR.TBLSETOR_TGLSETOR,
	TBLSETOR.TBLSETOR_BLNSETOR,
  TBLSETOR.TBLSETOR_THNSETOR,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 1 THEN
			NVL (
				TBLSETOR.TBLSETOR_RUPIAHSETOR,
				0
			)
		ELSE
			0
		END
	) AS pajakhotel,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 1 THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) + SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 4
		AND TBLSETOR.TBLSETOR_REKAYAT = 6
		AND TBLSETOR.TBLSETOR_REKJENIS = 1
		AND TBLSETOR.JENSET = 'B' THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) AS bngdndhotel,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 2 THEN
			NVL (
				TBLSETOR.TBLSETOR_RUPIAHSETOR,
				0
			)
		ELSE
			0
		END
	) AS pajakrestoran,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 2 THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) + SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 4
		AND TBLSETOR.TBLSETOR_REKAYAT = 6
		AND TBLSETOR.TBLSETOR_REKJENIS = 2
		AND TBLSETOR.JENSET = 'B' THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) AS bngdndrestoranl,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 3 THEN
			NVL (
				TBLSETOR.TBLSETOR_RUPIAHSETOR,
				0
			)
		ELSE
			0
		END
	) AS pajakhiburan,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 3 THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) + SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 4
		AND TBLSETOR.TBLSETOR_REKAYAT = 6
		AND TBLSETOR.TBLSETOR_REKJENIS = 3
		AND TBLSETOR.JENSET = 'B' THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) AS bngdndhiburan,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 4 THEN
			NVL (
				TBLSETOR.TBLSETOR_RUPIAHSETOR,
				0
			)
		ELSE
			0
		END
	) AS pajakreklame,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 4 THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) + SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 4
		AND TBLSETOR.TBLSETOR_REKAYAT = 6
		AND TBLSETOR.TBLSETOR_REKJENIS = 4
		AND TBLSETOR.JENSET = 'B' THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) AS bngdndreklame,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 5 THEN
			NVL (
				TBLSETOR.TBLSETOR_RUPIAHSETOR,
				0
			)
		ELSE
			0
		END
	) AS TBLDAFTHOTEL_PAJAKPERIKSApj,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 5 THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) AS bngdndppj,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 7 THEN
			NVL (
				TBLSETOR.TBLSETOR_RUPIAHSETOR,
				0
			)
		ELSE
			0
		END
	) AS TBLDAFTHOTEL_PAJAKPERIKSAarkir,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 7 THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) + SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 4
		AND TBLSETOR.TBLSETOR_REKAYAT = 6
		AND TBLSETOR.TBLSETOR_REKJENIS = 7
		AND TBLSETOR.JENSET = 'B' THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) AS bngdndparkir,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 8 THEN
			NVL (
				TBLSETOR.TBLSETOR_RUPIAHSETOR,
				0
			)
		ELSE
			0
		END
	) AS pajakabt,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 8 THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) + SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 4
		AND TBLSETOR.TBLSETOR_REKAYAT = 6
		AND TBLSETOR.TBLSETOR_REKJENIS = 8
		AND TBLSETOR.JENSET = 'B' THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) AS bngdndabt,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 9 THEN
			NVL (
				TBLSETOR.TBLSETOR_RUPIAHSETOR,
				0
			)
		ELSE
			0
		END
	) AS pajakwalet,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 9 THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) AS bngdndwalet,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 10 THEN
			NVL (
				TBLSETOR.TBLSETOR_RUPIAHSETOR,
				0
			)
		ELSE
			0
		END
	) AS TBLDAFTHOTEL_PAJAKPERIKSAbb,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 10 THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) AS bngdndpbb,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 11 THEN
			NVL (
				TBLSETOR.TBLSETOR_RUPIAHSETOR,
				0
			)
		ELSE
			0
		END
	) AS pajakbphtb,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		AND TBLSETOR.TBLSETOR_REKAYAT = 11 THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) + SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 4
		AND TBLSETOR.TBLSETOR_REKAYAT = 6
		AND TBLSETOR.TBLSETOR_REKJENIS = 11
		AND TBLSETOR.JENSET = 'B' THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) AS bngdndbphtb,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 4
		AND TBLSETOR.TBLSETOR_REKAYAT = 23 THEN
			NVL (
				TBLSETOR.TBLSETOR_RUPIAHSETOR,
				0
			)
		ELSE
			0
		END
	) AS pajaksewa,
	SUM (
		CASE
		WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
		AND TBLSETOR.TBLSETOR_REKPAD = 1
		AND TBLSETOR.TBLSETOR_REKPAJAK = 4
		AND TBLSETOR.TBLSETOR_REKAYAT = 23 THEN
			NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0) + NVL (TBLSETOR.TBLSETOR_DENDAKETETAPAN, 0)
		ELSE
			0
		END
	) AS bngdndsewa
FROM
	TBLSETOR
WHERE
	TBLSETOR.TBLDAFTAR_NOPOK <> 0
AND TBLSETOR_STATUSBAYAR <> 20
AND TBLSETOR.TBLSETOR_THNSETOR = ".$tahun."
AND TBLSETOR.TBLSETOR_BLNSETOR = ".$bulan."
GROUP BY
	TBLSETOR.TBLSETOR_THNSETOR,
	TBLSETOR.TBLSETOR_BLNSETOR,
TBLSETOR.TBLSETOR_TGLSETOR
ORDER BY
	TBLSETOR.TBLSETOR_THNSETOR,
	TBLSETOR.TBLSETOR_BLNSETOR,
        TBLSETOR.TBLSETOR_TGLSETOR";

		$data['ayat'] = $ayat = Yii::app()->db->createCommand($sql)->queryAll();

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