<?php

class Penerimaan_perayatController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionCetak()
	{
		$tahun =substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2)  : '';
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '';
		

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
				AND TBLSETOR.TBLSETOR_REKPAJAK = 4
				AND TBLSETOR.TBLSETOR_REKAYAT = 7
				AND TBLSETOR.TBLSETOR_REKJENIS = 1 THEN
				NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
				ELSE
				0
				END
				) + SUM (
				CASE
				WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
				AND TBLSETOR.TBLSETOR_REKPAD = 1
				AND TBLSETOR.TBLSETOR_REKPAJAK = 4
				AND TBLSETOR.TBLSETOR_REKAYAT = 6
				AND TBLSETOR.TBLSETOR_REKJENIS = 1 THEN
				NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
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
				AND TBLSETOR.TBLSETOR_REKPAJAK = 4
				AND TBLSETOR.TBLSETOR_REKAYAT = 7
				AND TBLSETOR.TBLSETOR_REKJENIS = 2 THEN
				NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
				ELSE
				0
				END
				) + SUM (
				CASE
				WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
				AND TBLSETOR.TBLSETOR_REKPAD = 1
				AND TBLSETOR.TBLSETOR_REKPAJAK = 4
				AND TBLSETOR.TBLSETOR_REKAYAT = 6
				AND TBLSETOR.TBLSETOR_REKJENIS = 2 THEN
				NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
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
				AND TBLSETOR.TBLSETOR_REKPAJAK = 4
				AND TBLSETOR.TBLSETOR_REKAYAT = 7
				AND TBLSETOR.TBLSETOR_REKJENIS = 3 THEN
				NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
				ELSE
				0
				END
				) + SUM (
				CASE
				WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
				AND TBLSETOR.TBLSETOR_REKPAD = 1
				AND TBLSETOR.TBLSETOR_REKPAJAK = 4
				AND TBLSETOR.TBLSETOR_REKAYAT = 6
				AND TBLSETOR.TBLSETOR_REKJENIS = 3 THEN
				NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
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
			) AS ppj,
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
			) AS parkir,
			SUM (
				CASE
				WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
				AND TBLSETOR.TBLSETOR_REKPAD = 1
				AND TBLSETOR.TBLSETOR_REKPAJAK = 4
				AND TBLSETOR.TBLSETOR_REKAYAT = 7
				AND TBLSETOR.TBLSETOR_REKJENIS = 7 THEN
				NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
				ELSE
				0
				END
				) + SUM (
				CASE
				WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
				AND TBLSETOR.TBLSETOR_REKPAD = 1
				AND TBLSETOR.TBLSETOR_REKPAJAK = 4
				AND TBLSETOR.TBLSETOR_REKAYAT = 6
				AND TBLSETOR.TBLSETOR_REKJENIS = 7 THEN
				NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
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
			) AS pbb,
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

public function actionCetakWord()
{
	$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_penyetoran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'rekap_penerimaan_per_ayat_pajak.docx';
		$namafileDL = "Cetak Rekap Penerimaan Per Ayat Pajak.docx";

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
		$tahun =substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2)  : '';
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '';
		

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
				AND TBLSETOR.TBLSETOR_REKPAJAK = 4
				AND TBLSETOR.TBLSETOR_REKAYAT = 7
				AND TBLSETOR.TBLSETOR_REKJENIS = 1 THEN
				NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
				ELSE
				0
				END
				) + SUM (
				CASE
				WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
				AND TBLSETOR.TBLSETOR_REKPAD = 1
				AND TBLSETOR.TBLSETOR_REKPAJAK = 4
				AND TBLSETOR.TBLSETOR_REKAYAT = 6
				AND TBLSETOR.TBLSETOR_REKJENIS = 1 THEN
				NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
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
				AND TBLSETOR.TBLSETOR_REKPAJAK = 4
				AND TBLSETOR.TBLSETOR_REKAYAT = 7
				AND TBLSETOR.TBLSETOR_REKJENIS = 2 THEN
				NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
				ELSE
				0
				END
				) + SUM (
				CASE
				WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
				AND TBLSETOR.TBLSETOR_REKPAD = 1
				AND TBLSETOR.TBLSETOR_REKPAJAK = 4
				AND TBLSETOR.TBLSETOR_REKAYAT = 6
				AND TBLSETOR.TBLSETOR_REKJENIS = 2 THEN
				NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
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
				AND TBLSETOR.TBLSETOR_REKPAJAK = 4
				AND TBLSETOR.TBLSETOR_REKAYAT = 7
				AND TBLSETOR.TBLSETOR_REKJENIS = 3 THEN
				NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
				ELSE
				0
				END
				) + SUM (
				CASE
				WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
				AND TBLSETOR.TBLSETOR_REKPAD = 1
				AND TBLSETOR.TBLSETOR_REKPAJAK = 4
				AND TBLSETOR.TBLSETOR_REKAYAT = 6
				AND TBLSETOR.TBLSETOR_REKJENIS = 3 THEN
				NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
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
			) AS ppj,
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
			) AS parkir,
			SUM (
				CASE
				WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
				AND TBLSETOR.TBLSETOR_REKPAD = 1
				AND TBLSETOR.TBLSETOR_REKPAJAK = 4
				AND TBLSETOR.TBLSETOR_REKAYAT = 7
				AND TBLSETOR.TBLSETOR_REKJENIS = 7 THEN
				NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
				ELSE
				0
				END
				) + SUM (
				CASE
				WHEN TBLSETOR.TBLSETOR_REKPENDAPATAN = 4
				AND TBLSETOR.TBLSETOR_REKPAD = 1
				AND TBLSETOR.TBLSETOR_REKPAJAK = 4
				AND TBLSETOR.TBLSETOR_REKAYAT = 6
				AND TBLSETOR.TBLSETOR_REKJENIS = 7 THEN
				NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
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
			) AS pbb,
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

			$data['cetak'] = $cetak = Yii::app()->db->createCommand($sql)->queryAll();
			$utama=array();
			$rows=array();

		
			$GLOBALS['bulan'] = $_REQUEST['bulan'];
			$GLOBALS['tahun'] = $_REQUEST['tahun'];
			$GLOBALS['datenow'] = date('d-m-Y');

			$totalhotel = array('totalhotel'=>0);
			$totalrestoran = array('totalrestoran'=>0);
			$totalhiburan = array('totalhiburan'=>0);
			$totalreklame = array('totalreklame'=>0);
			$totalppj = array('totalppj'=>0);
			$totalparkir = array('totalparkir'=>0);
			$totalabt = array('totalabt'=>0);
			$totalwalet = array('totalwalet'=>0);
			$totalpbb = array('totalpbb'=>0);
			$totalbphtb = array('totalbphtb'=>0);
			$totalsewa = array('totalsewa'=>0);

			$btotalhotel = array('btotalhotel'=>0);
			$btotalrestoran = array('btotalrestoran'=>0);
			$btotalhiburan = array('btotalhiburan'=>0);
			$btotalreklame = array('btotalreklame'=>0);
			$btotalppj = array('btotalppj'=>0);
			$btotalparkir = array('btotalparkir'=>0);
			$btotalabt = array('btotalabt'=>0);
			$btotalwalet = array('btotalwalet'=>0);
			$btotalpbb = array('btotalpbb'=>0);
			$btotalbphtb = array('btotalbphtb'=>0);
			$btotalsewa = array('btotalsewa'=>0);

			$totalhotelsemua = array('totalhotelsemua'=>0);
			$totalrestoransemua = array('totalrestoransemua'=>0);
			$totalhiburansemua = array('totalhiburan'=>0);
			$totalreklamesemua = array('totalreklamesemua'=>0);
			$totalppjsemua = array('totalppjsemua'=>0);
			$totalparkirsemua = array('totalparkirsemua'=>0);
			$totalabtsemua = array('totalabtsemua'=>0);
			$totalwaletsemua = array('totalwaletsemua'=>0);
			$totalpbbsemua = array('totalpbbsemua'=>0);
			$totalbphtbsemua = array('totalbphtbsemua'=>0);
			$totalsewasemua = array('totalsewasemua'=>0);
			
			foreach($data['cetak'] as $rowWP) :
				$tanggal = $rowWP['TBLSETOR_TGLSETOR'] . '/' . ($rowWP['TBLSETOR_BLNSETOR']) . '/' . ($rowWP['TBLSETOR_THNSETOR']);;
				
				$utama['tanggal'] = $tanggal;
				$utama['pho'] = trim(LokalIndonesia::ribuan($rowWP['PAJAKHOTEL']));
				$utama['bhot'] = trim(LokalIndonesia::ribuan($rowWP['BNGDNDHOTEL']));
				$utama['pres'] = trim(LokalIndonesia::ribuan($rowWP['PAJAKRESTORAN']));
				$utama['bres'] = trim(LokalIndonesia::ribuan($rowWP['BNGDNDRESTORANL']));
				$utama['phib'] = trim(LokalIndonesia::ribuan($rowWP['PAJAKHIBURAN']));
				$utama['bhib'] = trim(LokalIndonesia::ribuan($rowWP['BNGDNDHIBURAN']));
				$utama['prek'] = trim(LokalIndonesia::ribuan($rowWP['PAJAKREKLAME']));
				$utama['brek'] = trim(LokalIndonesia::ribuan($rowWP['BNGDNDREKLAME']));
				$utama['ppj'] = trim(LokalIndonesia::ribuan($rowWP['PPJ']));
				$utama['bppj'] = trim(LokalIndonesia::ribuan($rowWP['BNGDNDPPJ']));
				$utama['prk'] = trim(LokalIndonesia::ribuan($rowWP['PARKIR']));
				$utama['bprk'] = trim(LokalIndonesia::ribuan($rowWP['BNGDNDPARKIR']));
				$utama['at'] = trim(LokalIndonesia::ribuan($rowWP['PAJAKABT']));
				$utama['bat'] = trim(LokalIndonesia::ribuan($rowWP['BNGDNDABT']));
				$utama['psbw'] = trim(LokalIndonesia::ribuan($rowWP['PAJAKWALET']));
				$utama['bsbw'] = trim(LokalIndonesia::ribuan($rowWP['BNGDNDWALET']));
				$utama['pbb'] = trim(LokalIndonesia::ribuan($rowWP['PBB']));
				$utama['bpbb'] = trim(LokalIndonesia::ribuan($rowWP['BNGDNDPBB']));
				$utama['bphtb'] = trim(LokalIndonesia::ribuan($rowWP['PAJAKBPHTB']));
				$utama['bbphtb'] = trim(LokalIndonesia::ribuan($rowWP['BNGDNDBPHTB']));
				$utama['aset'] = trim(LokalIndonesia::ribuan($rowWP['PAJAKSEWA']));
				$utama['baset'] = trim(LokalIndonesia::ribuan($rowWP['BNGDNDSEWA']));

				$totalhotel['totalhotel'] += trim($rowWP['PAJAKHOTEL']);
				$totalrestoran['totalrestoran'] += trim($rowWP['PAJAKRESTORAN']);
				$totalhiburan['totalhiburan'] += trim($rowWP['PAJAKHIBURAN']);
				$totalreklame['totalreklame'] += trim($rowWP['PAJAKREKLAME']);
				$totalppj['totalppj'] += trim($rowWP['PPJ']);
				$totalparkir['totalparkir'] += trim($rowWP['PARKIR']);
				$totalabt['totalabt'] += trim($rowWP['PAJAKABT']);
				$totalwalet['totalwalet'] += trim($rowWP['PAJAKWALET']);
				$totalpbb['totalpbb'] += trim($rowWP['PBB']);
				$totalbphtb['totalbphtb'] += trim($rowWP['PAJAKBPHTB']);
				$totalsewa['totalsewa'] += trim($rowWP['PAJAKSEWA']);

				$btotalhotel['btotalhotel'] += trim($rowWP['BNGDNDHOTEL']);
				$btotalrestoran['btotalrestoran'] += trim($rowWP['BNGDNDRESTORANL']);
				$btotalhiburan['btotalhiburan'] += trim($rowWP['BNGDNDHIBURAN']);
				$btotalreklame['btotalreklame'] += trim($rowWP['BNGDNDREKLAME']);
				$btotalppj['btotalppj'] += trim($rowWP['BNGDNDPPJ']);
				$btotalparkir['btotalparkir'] += trim($rowWP['BNGDNDPARKIR']);
				$btotalabt['btotalabt'] += trim($rowWP['BNGDNDABT']);
				$btotalwalet['btotalwalet'] += trim($rowWP['BNGDNDWALET']);
				$btotalpbb['btotalpbb'] += trim($rowWP['BNGDNDPBB']);
				$btotalbphtb['btotalbphtb'] += trim($rowWP['BNGDNDBPHTB']);
				$btotalsewa['btotalsewa'] += trim($rowWP['BNGDNDSEWA']);

				$totalhotelsemua['totalhotelsemua'] = $totalhotel['totalhotel'] + $btotalhotel['btotalhotel'];
				$totalrestoransemua['totalrestoransemua'] = $totalrestoran['totalrestoran'] + $btotalrestoran['btotalrestoran'];
				$totalhiburansemua['totalhiburansemua'] = $totalhiburan['totalhiburan'] + $btotalhiburan['btotalhiburan'];
				$totalreklamesemua['totalreklamesemua'] = $totalreklame['totalreklame'] + $btotalreklame['btotalreklame'];
				$totalppjsemua['totalppjsemua'] = $totalppj['totalppj'] + $btotalppj['btotalppj'];
				$totalparkirsemua['totalparkirsemua'] = $totalparkir['totalparkir'] + $btotalparkir['btotalparkir'];
				$totalabtsemua['totalabtsemua'] = $totalabt['totalabt'] + $btotalabt['btotalabt'];
				$totalwaletsemua['totalwaletsemua'] = $totalwalet['totalwalet'] + $btotalwalet['btotalwalet'];
				$totalpbbsemua['totalpbbsemua'] = $totalpbb['totalpbb'] + $btotalpbb['btotalpbb'];
				$totalbphtbsemua['totalbphtbsemua'] = $totalbphtb['totalbphtb'] + $btotalbphtb['btotalbphtb'];
				$totalsewasemua['totalsewasemua'] = $totalsewa['totalsewa'] + $btotalsewa['btotalsewa'];

			array_push($rows, $utama);
			endforeach;
			$footer=array();
			// Jumlah Pajak 
			$footer['hot'] = LokalIndonesia::ribuan($totalhotel['totalhotel']);
			$footer['res'] = LokalIndonesia::ribuan($totalrestoran['totalrestoran']);
			$footer['hib'] = LokalIndonesia::ribuan($totalhiburan['totalhiburan']);
			$footer['rek'] = LokalIndonesia::ribuan($totalreklame['totalreklame']);
			$footer['ppj'] = LokalIndonesia::ribuan($totalppj['totalppj']);
			$footer['prk'] = LokalIndonesia::ribuan($totalparkir['totalparkir']);
			$footer['at'] = LokalIndonesia::ribuan($totalabt['totalabt']);
			$footer['sbw'] = LokalIndonesia::ribuan($totalwalet['totalwalet']);
			$footer['pbb'] = LokalIndonesia::ribuan($totalpbb['totalpbb']);
			$footer['bphtb'] = LokalIndonesia::ribuan($totalbphtb['totalbphtb']);
			$footer['aset'] = LokalIndonesia::ribuan($totalsewa['totalsewa']);

			// Ini untuk total BUNGA DAN DENDA
			$footer['bhot'] = LokalIndonesia::ribuan($btotalhotel['btotalhotel']);
			$footer['bres'] = LokalIndonesia::ribuan($btotalrestoran['btotalrestoran']);
			$footer['bhib'] = LokalIndonesia::ribuan($btotalhiburan['btotalhiburan']);
			$footer['brek'] = LokalIndonesia::ribuan($btotalreklame['btotalreklame']);
			$footer['bppj'] = LokalIndonesia::ribuan($btotalppj['btotalppj']);
			$footer['bprk'] = LokalIndonesia::ribuan($btotalparkir['btotalparkir']);
			$footer['bat'] = LokalIndonesia::ribuan($btotalabt['btotalabt']);
			$footer['bsbw'] = LokalIndonesia::ribuan($btotalwalet['btotalwalet']);
			$footer['bpbb'] = LokalIndonesia::ribuan($btotalpbb['btotalpbb']);
			$footer['bbphtb'] = LokalIndonesia::ribuan($btotalbphtb['btotalbphtb']);
			$footer['baset'] = LokalIndonesia::ribuan($btotalsewa['btotalsewa']);

			// Ini untuk total Bunga,Denda + Jumlah Pajak
			$footer['totalhot'] = LokalIndonesia::ribuan($totalhotelsemua['totalhotelsemua']);
			$footer['totalres'] = LokalIndonesia::ribuan($totalrestoransemua['totalrestoransemua']);
			$footer['totalhib'] = LokalIndonesia::ribuan($totalhiburansemua['totalhiburansemua']);
			$footer['totalrek'] = LokalIndonesia::ribuan($totalreklamesemua['totalreklamesemua']);
			$footer['totalppj'] = LokalIndonesia::ribuan($totalppjsemua['totalppjsemua']);
			$footer['totalprk'] = LokalIndonesia::ribuan($totalparkirsemua['totalparkirsemua']);
			$footer['totalat'] = LokalIndonesia::ribuan($totalabtsemua['totalabtsemua']);
			$footer['totalpsbw'] = LokalIndonesia::ribuan($totalwaletsemua['totalwaletsemua']);
			$footer['totalpbb'] = LokalIndonesia::ribuan($totalpbbsemua['totalpbbsemua']);
			$footer['totalbphtb'] = LokalIndonesia::ribuan($totalbphtbsemua['totalbphtbsemua']);
			$footer['totalaset'] = LokalIndonesia::ribuan($totalsewasemua['totalsewasemua']);


			$otbs->MergeBlock('utama', $rows);
			$otbs->MergeField('footer', $footer);
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