<?php

class Lapharian_bendaharaController extends Controller
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
		$tgl_setor = trim($_REQUEST['tgl_setor'])!='' ? date('Y-m-d', strtotime($_REQUEST['tgl_setor']) ) : "";
		$explode = explode('-',$tgl_setor);
		$tgl =$explode[2];
		$bln =$explode[1];
		$tahun = substr($explode[0], -2);

		$cari = "SELECT
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS,
		SUM (
		CASE
		WHEN TBLSETOR_TGLSETOR = '$tgl' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS HARI_INI,
		SUM (
		CASE
		WHEN TBLSETOR_TGLSETOR < '$tgl' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS SD_HARILALU,
		SUM (
		CASE
		WHEN TBLSETOR_TGLSETOR <= '$tgl' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS SD_HARIINI,
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
		) AS NMREK
		FROM
		TBLSETOR
		WHERE
		TBLSETOR.TBLSETOR_THNSETOR = '$tahun'
		-- AND TBLSETOR.TBLSETOR_TGLSETOR = '$tgl'
		AND TBLSETOR.TBLSETOR_BLNSETOR = '$bln'
		AND TBLSETOR_STATUSBAYAR <> 20
		GROUP BY
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS
		HAVING
		SUM (
		CASE
		WHEN TBLSETOR_TGLSETOR <= '$tgl' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) > 0
		ORDER BY
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS";

		$data['cari'] = $cari = Yii::app()->db->createCommand($cari)->queryAll();


		$this->renderPartial('tabel_laporan',array('data'=>$data));
	}

	public function actionCetak()
	{
		$tgl_setor = trim($_REQUEST['tgl_setor'])!='' ? date('Y-m-d', strtotime($_REQUEST['tgl_setor']) ) : "";
		$explode = explode('-',$tgl_setor);
		$tgl =$explode[2];
		$bln =$explode[1];
		$tahun = substr($explode[0], -2);


		$laporan = "SELECT
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS,
		SUM (
		CASE
		WHEN TBLSETOR_TGLSETOR = '$tgl' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS HARI_INI,
		SUM (
		CASE
		WHEN TBLSETOR_TGLSETOR < '$tgl' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS SD_HARILALU,
		SUM (
		CASE
		WHEN TBLSETOR_TGLSETOR <= '$tgl' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) AS SD_HARIINI,
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
		) AS NMREK
		FROM
		TBLSETOR
		WHERE
		TBLSETOR.TBLSETOR_THNSETOR = '$tahun'
		-- AND TBLSETOR.TBLSETOR_TGLSETOR = '$tgl'
		AND TBLSETOR.TBLSETOR_BLNSETOR = '$bln'
		AND TBLSETOR_STATUSBAYAR <> 20
		GROUP BY
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS
		HAVING
		SUM (
		CASE
		WHEN TBLSETOR_TGLSETOR <= '$tgl' THEN
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		ELSE
		0
		END
		) > 0
		ORDER BY
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS";

		$data['laporan'] = $laporan = Yii::app()->db->createCommand($laporan)->queryAll();
		
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