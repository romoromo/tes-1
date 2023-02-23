<?php
// Lap BKP Harian
class Lap_bkpharianController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionCetak()
	{
		$tgl_setor = trim($_REQUEST['tgl_setor'])!='' ? date('Y-m-d', strtotime($_REQUEST['tgl_setor']) ) : "";
		$explode = explode('-',$tgl_setor);
		$tgl =$explode[2];
		$bln =$explode[1];
		$tahun = substr($explode[0], -2);

		 $sql = "SELECT
			TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKAYAT,
			TBLSETOR.TBLSETOR_REKJENIS,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR =".$tgl." THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) AS HARI_INI,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR < ".$tgl." THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) AS SD_HARILALU,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR <= ".$tgl." THEN
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

			AND NVL(TBLREKENING.TBLREKENING_REKJENIS,0) = NVL(TBLSETOR.TBLSETOR_REKJENIS,0)
			) AS NMREK
			FROM
			TBLSETOR
			WHERE
			TBLSETOR.TBLSETOR_THNSETOR = ".$tahun."
			AND TBLSETOR.TBLSETOR_BLNSETOR = ".$bln."
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
			WHEN TBLSETOR_TGLSETOR <= ".$tgl." THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) > 0
			ORDER BY TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKAYAT";

		$data['bkp'] = Yii::app()->db->createCommand($sql)->queryAll();

		$this->renderPartial('cetak',array('data'=>$data));
	}

	public function actionCetakWord()
	{

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_penyetoran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'buku_daftar_setoran_laporan_harian_bkp_sd_hari_ini.docx';
		$namafileDL = "Buku Daftar Setoran.docx";

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
		$tgl_setor = trim($_REQUEST['tgl_setor'])!='' ? date('Y-m-d', strtotime($_REQUEST['tgl_setor']) ) : "";
		$explode = explode('-',$tgl_setor);
		$tgl =$explode[2];
		$bln =$explode[1];
		$tahun = substr($explode[0], -2);

		 $sql = "SELECT
			TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKAYAT,
			TBLSETOR.TBLSETOR_REKJENIS,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR =".$tgl." THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) AS HARI_INI,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR < ".$tgl." THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) AS SD_HARILALU,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR <= ".$tgl." THEN
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

			AND NVL(TBLREKENING.TBLREKENING_REKJENIS,0) = NVL(TBLSETOR.TBLSETOR_REKJENIS,0)
			) AS NMREK
			FROM
			TBLSETOR
			WHERE
			TBLSETOR.TBLSETOR_THNSETOR = ".$tahun."
			AND TBLSETOR.TBLSETOR_BLNSETOR = ".$bln."
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
			WHEN TBLSETOR_TGLSETOR <= ".$tgl." THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) > 0
			ORDER BY TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKAYAT";

		$data['bkp'] = Yii::app()->db->createCommand($sql)->queryAll();
		$utama = array();
		$rows = array();

		$no = 1;	

		$GLOBALS['date'] = date('d-m-Y');  
		$GLOBALS['datenow'] =  date('d-m-Y');

		$ttlhi = array('ttl1'=>0);
		$ttlshl = array('ttl2'=>0);
		$ttlshi = array('ttl3'=>0);

		foreach ($data['bkp'] as $rowWP) :
			$norekening = $rowWP['TBLSETOR_REKPENDAPATAN'] . '.' . ($rowWP['TBLSETOR_REKPAD']) . '.' . ($rowWP['TBLSETOR_REKPAJAK']) . '.' . ($rowWP['TBLSETOR_REKAYAT']) . '.' . ($rowWP['TBLSETOR_REKJENIS']);

			$utama['no']         = $no++;
			$utama['rekening']   = $norekening;
			$utama['pajak']      = trim($rowWP['NMREK']);
			$utama['hariini']    = trim (LokalIndonesia::ribuan($rowWP['HARI_INI']));;
			$utama['sdharilalu'] = trim (LokalIndonesia::ribuan($rowWP['SD_HARILALU']));;
			$utama['sdhariini']  = trim (LokalIndonesia::ribuan($rowWP['SD_HARIINI']));
			$totalhariini        = $rowWP['HARI_INI'];
			$totalsdharilalu     = $rowWP['SD_HARILALU'];
			$totalsdhariini      = $rowWP['SD_HARIINI'];
			
			$utama['hi']  = LokalIndonesia::ribuan($totalhariini) ;
			$utama['shl'] = LokalIndonesia::ribuan($totalsdharilalu) ;
			$utama['shi'] = LokalIndonesia::ribuan($totalsdhariini) ;

			$ttlhi['ttl1']  += trim($totalhariini);
			$ttlshl['ttl2'] += trim($totalsdharilalu);
			$ttlshi['ttl3'] += trim($totalsdhariini);

		array_push($rows, $utama);
		endforeach;

		$jmlh=array();
		$jmlh['hi']  = LokalIndonesia::ribuan($ttlhi['ttl1']);
		$jmlh['shl'] = LokalIndonesia::ribuan($ttlshl['ttl2']);
		$jmlh['shi'] = LokalIndonesia::ribuan($ttlshi['ttl3']);

		$otbs->MergeBlock('utama', $rows);
		$otbs->MergeField('jmlh', $jmlh);
		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();

	}
}