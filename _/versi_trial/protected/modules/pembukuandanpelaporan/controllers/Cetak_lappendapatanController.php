<?php

class Cetak_lappendapatanController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionCetak()
	{
		$tahun = substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2) : '0';
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '0';
		$tanggal = $_REQUEST['tanggal'] ? $_REQUEST['tanggal'] : '0';

		$cetak = "SELECT
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
		) AS NMREK,
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
		TBLSETOR.TBLSETOR_THNSETOR = '$tahun'
		AND TBLSETOR.TBLSETOR_BLNSETOR = '$bulan'
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

		$data['cetak'] = $cetak = Yii::app()->db->createCommand($cetak)->queryAll();
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