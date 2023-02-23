<?php

class Lap_ayatbulanController extends Controller
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

	public function actionCetak()
	{
		$tahun = substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2) : '' ;
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '' ;
		$rekening = $_REQUEST['rekening'] ? $_REQUEST['rekening'] : '' ;
		
		if($rekening==''){
			$dimana = "";
		}
		else{
			$dimana = "AND TBLSETOR.TBLSETOR_REKAYAT = ".$rekening."";
		};

		if($bulan==''){
			$andbulan = "";
		}
		else{
			$andbulan = "AND TBLSETOR.TBLSETOR_BLNSETOR = ".$bulan."";
		};

		$sql = "
		SELECT
		TBLSETOR.TBLSETOR_THNSETOR,
		TBLSETOR.TBLSETOR_BLNSETOR,
		TBLSETOR.TBLSETOR_TGLSETOR,
		TBLSETOR.TBLPENDATAAN_THNPAJAK,
		TBLSETOR.TBLPENDATAAN_BLNPAJAK,
		TBLSETOR.TBLPENDATAAN_TGLPAJAK,
		TBLSETOR.TBLSETOR_NOMORSSPD,
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS,
		TBLSETOR.TBLSETOR_REKSUBJENIS,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		TBLSETOR.TBLSETOR_RUPIAHSETOR,
		TBLSETOR.TBLSETOR_JNSBAYAR,
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
			TBLSETOR.*
			FROM
			TBLSETOR
			INNER JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
			WHERE
			TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
			AND TBLSETOR.TBLSETOR_THNSETOR = ".$tahun."
			".$andbulan."
			AND TBLSETOR_STATUSBAYAR = 20
			AND TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
			AND TBLSETOR.TBLSETOR_REKPAD = 1
			AND TBLSETOR.TBLSETOR_REKPAJAK = 1
			".$dimana."
			ORDER BY
			TBLSETOR.TBLSETOR_THNSETOR,
			TBLSETOR.TBLSETOR_BLNSETOR,
			TBLSETOR.TBLSETOR_TGLSETOR,
			TBLSETOR.TBLSETOR_REKPENDAPATAN";

			$data['ayatbulan'] = $ayatbulan = Yii::app()->db->createCommand($sql)->queryAll();

			$sqltotal="SELECT
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
				) AS sd_bulanini
			FROM
			TBLSETOR
			WHERE
			TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
			AND TBLSETOR.TBLSETOR_THNSETOR = ".$tahun."
			AND TBLSETOR.TBLSETOR_STATUSBAYAR = 20
			AND TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
			AND TBLSETOR.TBLSETOR_REKPAD = 1
			AND TBLSETOR.TBLSETOR_REKPAJAK = 1
			AND TBLSETOR.TBLSETOR_REKAYAT = ".$rekening."";
					// UNTUK PAJAK YANG LAIN GANTI KONDISI WHERE MENJADI
					// TBLSETOR.TBLSETOR_REKAYAT = 1 => HOTEL
					// TBLSETOR.TBLSETOR_REKAYAT = 2 => RMAKAN
					// TBLSETOR.TBLSETOR_REKAYAT = 3 => HIBURAN
					// TBLSETOR.TBLSETOR_REKAYAT = 4 => REKLAME
					// TBLSETOR.TBLSETOR_REKAYAT = 5 => PPJ
					// TBLSETOR.TBLSETOR_REKAYAT = 7 => PAKKIR
					// TBLSETOR.TBLSETOR_REKAYAT = 8 => AIR TANAH
					// TBLSETOR.TBLSETOR_REKAYAT = 9 => BURUNG WALET
					// TBLSETOR.TBLSETOR_REKAYAT = 10 => BPHTB
					// TBLSETOR.TBLSETOR_REKAYAT = 11 => ???


			$data['total'] = $total = Yii::app()->db->createCommand($sqltotal)->queryrow();

			$sqlheader = "
			SELECT
			TBLSETOR.TBLSETOR_THNSETOR,
			TBLSETOR.TBLSETOR_BLNSETOR,
			TBLSETOR.TBLSETOR_TGLSETOR,
			TBLSETOR.TBLPENDATAAN_THNPAJAK,
			TBLSETOR.TBLPENDATAAN_BLNPAJAK,
			TBLSETOR.TBLPENDATAAN_TGLPAJAK,
			TBLSETOR.TBLSETOR_NOMORSSPD,
			TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKAYAT,
			TBLSETOR.TBLSETOR_REKJENIS,
			TBLSETOR.TBLSETOR_REKSUBJENIS,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			TBLSETOR.TBLSETOR_RUPIAHSETOR,
			TBLSETOR.TBLSETOR_JNSBAYAR,
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
			TBLSETOR.*
			FROM
			TBLSETOR
			INNER JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
			WHERE
			TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
			AND TBLSETOR.TBLSETOR_THNSETOR = ".$tahun."
			AND TBLSETOR.TBLSETOR_BLNSETOR = ".$bulan."
			AND TBLSETOR_STATUSBAYAR = 20
			AND TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
			AND TBLSETOR.TBLSETOR_REKPAD = 1
			AND TBLSETOR.TBLSETOR_REKPAJAK = 1
			AND TBLSETOR.TBLSETOR_REKAYAT = ".$rekening."
			ORDER BY
			TBLSETOR.TBLSETOR_THNSETOR,
			TBLSETOR.TBLSETOR_BLNSETOR,
			TBLSETOR.TBLSETOR_TGLSETOR,
			TBLSETOR.TBLSETOR_REKPENDAPATAN";

			$data['header'] = $header = Yii::app()->db->createCommand($sqlheader)->queryrow();
			$this->renderPartial('cetak',array('data'=>$data));
}

public function actionCetakword()
{

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_daftarsetoran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'CETAK_BUKU_JENIS_DAFTARSETORAN.docx';
		$namafileDL = "CETAK_BUKU_JENIS.docx";

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

		//INI CODING CETAK WORD BUKU JENIS

		$rekening = $_REQUEST['rekening'] ? $_REQUEST['rekening'] : '' ;
		$tahun = substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2) : '' ;
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '' ;
		$bayar = $_REQUEST['bayar'] ? $_REQUEST['bayar'] : '' ;

		if($bayar==''){
			$carabayar = "";
		}
		else{
			$carabayar = "AND TBLSETOR.TBLSETOR_CARABAYAR = '$bayar'";
		}

		$cetak = "SELECT
		TBLSETOR.TBLSETOR_THNSETOR,
		TBLSETOR.TBLSETOR_BLNSETOR,
		TBLSETOR.TBLSETOR_TGLSETOR,
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
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		TBLSETOR.TBLSETOR_RUPIAHSETOR,
		TBLSETOR.TBLSETOR_JNSBAYAR,
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
			TBLSETOR.*
			FROM
			TBLSETOR 
			JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
			WHERE
			TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
			AND TBLSETOR.TBLSETOR_THNSETOR = ".$tahun."
			AND TBLSETOR.TBLSETOR_BLNSETOR = ".$bulan."
			AND TBLSETOR.TBLSETOR_STATUSBAYAR = 20
			AND TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
			AND TBLSETOR.TBLSETOR_REKPAD = 1
			AND TBLSETOR.TBLSETOR_REKPAJAK = 1
			AND TBLSETOR.TBLSETOR_REKAYAT = ".$rekening."
			".$carabayar."
			ORDER BY
			TBLSETOR.TBLSETOR_THNSETOR,
			TBLSETOR.TBLSETOR_BLNSETOR,
			TBLSETOR.TBLSETOR_TGLSETOR,
			TBLSETOR.TBLSETOR_REKPENDAPATAN";

			$data['cetak'] = $cetak = Yii::app()->db->createCommand($cetak)->queryAll();

			$total = "SELECT
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
				) AS sd_bulanini
			FROM
			TBLSETOR
			WHERE
			TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
			AND TBLSETOR.TBLSETOR_THNSETOR = '$tahun'
			AND TBLSETOR.TBLSETOR_STATUSBAYAR = 20
			AND TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
			AND TBLSETOR.TBLSETOR_REKPAD = 1
			AND TBLSETOR.TBLSETOR_REKPAJAK = 1
			AND TBLSETOR.TBLSETOR_REKAYAT = '$rekening'
			".$carabayar."";

			$data['total'] = $total = Yii::app()->db->createCommand($total)->queryrow();

			$jenis="SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING AS NMREK
			FROM
			TBLREKENING
			WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = 4
			AND TBLREKENING.TBLREKENING_REKPAD = 1
			AND TBLREKENING.TBLREKENING_REKPAJAK = 1
			AND TBLREKENING.TBLREKENING_REKAYAT = '$rekening'
			AND TBLREKENING.TBLREKENING_REKJENIS = 0";

			$data['jenis'] = $jenis = Yii::app()->db->createCommand($jenis)->queryrow();
			$utama = array();
			$rows = array();
			// $jumlah = array();
			// $rows = array();

			$no = 1;

			foreach ($data['cetak'] as $rowWP) :

				//$koderekening = $rowWP['TBLSETOR_REKPENDAPATAN'] . '.' . (sprintf('%07d',$rowWP['TBLSETOR_REKPAD'])) . '.' . (sprintf('%02d',$rowWP['TBLSETOR_REKPAJAK'])) . '.' . (sprintf('%02d',$rowWP['TBLSETOR_REKAYAT']));
				//$tanggalsetor = $rowWP['TBLSETOR_TGLSETOR'] . ' ' . (sprintf('MMMM',$rowWP['TBLSETOR_BLNSETOR'])) . '' . (sprintf('YYY',$rowWP['TBLSETOR_THNSETOR']));

				$utama['ke'] = trim($rowWP['TBLPENDATAAN_PAJAKKE']);
				$utama['no'] = $no++;

				$utama['sspd'] = trim ($rowWP['TBLSETOR_NOMORSSPD']);
				$utama['rpset'] = trim (LokalIndonesia::ribuan($rowWP['TBLSETOR_RUPIAHSETOR']));
				$utama['thnpjk'] = trim ($rowWP['TBLPENDATAAN_THNPAJAK']);
				$utama['blnpjk'] = trim ($rowWP['TBLPENDATAAN_BLNPAJAK']);
				$utama['tanggalsetor'] = trim ($rowWP['TBLSETOR_TGLSETOR'] . '/' . ($rowWP['TBLSETOR_BLNSETOR']) . '/' . ($rowWP['TBLSETOR_THNSETOR']));



			array_push($rows, $utama);

			endforeach;
			$header=array();
			$header['masapajak_bulan'] = LokalIndonesia::getbulan($_REQUEST ['bulan']);
			$header['masapajak_tahun'] = $_REQUEST ['tahun'];
			$header['koderekening'] = '4.1.1.0.'. $rekening;
			$header['namarek'] = trim($data['jenis']['NMREK']);
			$header['bulanini'] = LokalIndonesia::ribuan($data['total']['BULANINI']);
			$header['sdbulanini'] = LokalIndonesia::ribuan($data['total']['SD_BULANINI']);
			$header['sdbulanlalu'] = LokalIndonesia::ribuan($data['total']['SD_BULANLALU']);
			$header['tgltoday'] = date('d-m-Y');



			//echo json_encode($rows); Yii::app()->end();

			$otbs->MergeBlock('utama', $rows); 
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