<?php

class EntrisetorankebankController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}
	public function actionCetak()
	{
		// $tgl_setor = $_REQUEST['tgl_setor'];
		$tgl_setor = trim($_REQUEST['tgl_setor'])!='' ? date('Y-m-d', strtotime($_REQUEST['tgl_setor']) ) : "";
		$explode = explode('-',$tgl_setor);
		$tgl =$explode[2];
		$bln =$explode[1];
		$tahun = substr($explode[0], -2);

		$data['bank'] = Yii::app()->db->createCommand("SELECT
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
			AND TBLREKENING.TBLREKENING_REKJENIS= TBLSETOR.TBLSETOR_REKJENIS
			) AS NMREK
			FROM
			TBLSETOR
			WHERE
			TBLSETOR.TBLSETOR_THNSETOR =  ".$tahun."
			AND TBLSETOR.TBLSETOR_BLNSETOR = ".$bln."
			AND TBLSETOR.TBLSETOR_REKJENIS =  0
			AND TBLSETOR.TBLSETOR_STATUSBAYAR = 20
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
			TBLSETOR.TBLSETOR_REKJENIS")->queryAll();


		$this->renderPartial('cetak',array('data'=>$data));

	}

	public function actionCetakWord()
	{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_penyetoran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'cetak_setoran_ke_bank_sd_hari_ini.docx';
		$namafileDL = "Cetak Setoran Ke Bank SD Hari Ini.docx";

			// if (base64_decode($data['jenis'])=='REK') {
			// 	$namatpl = $path_tpl . 'Temp_Teguranrek.docx';
			// 	$namafileDL = "Surat-Teguranrek.docx"; 
			// }

		Yii::import('ext.DMOpenTBS',true);
		Yii::import('ext.LokalIndonesia');
		DMOpenTBS::init();
		$otbs = new clsTinyButStrong;

			// Useful for debugging purposes. Displays the errors
		$otbs->NoErr = 0;
			$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

		$tgl_setor = trim($_REQUEST['tgl_setor'])!='' ? date('Y-m-d', strtotime($_REQUEST['tgl_setor']) ) : "";
		$explode = explode('-',$tgl_setor);
		$tgl =$explode[2];
		$bln =$explode[1];
		$tahun = substr($explode[0], -2);

		$sql ="SELECT
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
			AND TBLREKENING.TBLREKENING_REKJENIS= TBLSETOR.TBLSETOR_REKJENIS
			) AS NMREK
			FROM
			TBLSETOR
			WHERE
			TBLSETOR.TBLSETOR_THNSETOR =  ".$tahun."
			AND TBLSETOR.TBLSETOR_BLNSETOR = ".$bln."
			AND TBLSETOR.TBLSETOR_REKJENIS =  0
			AND TBLSETOR.TBLSETOR_STATUSBAYAR = 20
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

		$data['cetak'] = Yii::app()->db->createCommand($sql)->queryAll();

		$utama = array();
		$rows = array();

		//$GLOBALS['date'] = date('d-m-Y');
		$GLOBALS['datenow'] = date('d-m-Y');

		$no = 1;
		$totalhariini = array('totalhariini'=>0);
		$totalsdharilalu = array('totalsdharilalu'=>0);
		$totalsdhariini = array('totalsdhariini'=>0);

		foreach ($data['cetak'] as $kolom) :
			//$rek = $kolom['TBLSETOR_REKPENDAPATAN'] . '.' . ($kolom['TBLSETOR_REKPAD']) . '.' . ($kolom['TBLSETOR_REKPAJAK']) . '.' . ($kolom['TBLSETOR_REKAYAT']) . '.' . ($kolom['TBLSETOR_REKJENIS']);
			//$hi = $kolom['HARI_INI'];
			//$shl = $kolom['SD_HARILALU'];
			//$shi = $kolom['SD_HARIINI'];

			$utama['no'] = $no++;
			$utama['rekening'] = $kolom['TBLSETOR_REKPENDAPATAN'] . '.' . ($kolom['TBLSETOR_REKPAD']) . '.' . ($kolom['TBLSETOR_REKPAJAK']) . '.' . ($kolom['TBLSETOR_REKAYAT']) . '.' . ($kolom['TBLSETOR_REKJENIS']);
			$utama['pajak'] = trim($kolom['NMREK']);
			$utama['hariini'] = LokalIndonesia::ribuan($kolom['HARI_INI']);
			$utama['sdharilalu'] = LokalIndonesia::ribuan($kolom['SD_HARILALU']);
			$utama['sdhariini'] = LokalIndonesia::ribuan($kolom['SD_HARIINI']);
			$utama['hi'] = 0;
			$utama['shi'] = 0;
			$utama['shl'] = 0;

			$totalhariini['totalhariini'] +=trim($kolom['HARI_INI']);
			$totalsdharilalu['totalsdharilalu'] +=trim($kolom['SD_HARILALU']);
			$totalsdhariini['totalsdhariini'] +=trim($kolom['SD_HARIINI']);

			array_push($rows, $utama);

		endforeach;
		$header=array();	
		$header['hariini'] = LokalIndonesia::ribuan($totalhariini['totalhariini']);
		$header['sdharilalu'] = LokalIndonesia::ribuan($totalsdharilalu['totalsdharilalu']);
		$header['sdhariini'] = LokalIndonesia::ribuan($totalsdhariini['totalsdhariini']);
		$header['date'] = LokalIndonesia::TanggalUmum($_REQUEST['tgl_setor']);


		$otbs->MergeBlock('data', $rows); 
		$otbs->MergeField('header', $header);
				// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();

	}
}