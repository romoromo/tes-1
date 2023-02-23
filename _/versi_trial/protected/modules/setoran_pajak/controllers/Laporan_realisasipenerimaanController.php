<?php

class Laporan_realisasipenerimaanController extends Controller
{
	var $MODULE_URL = 'setoran_pajak/laporan_realisasipenerimaan';
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionCetak()
	{
		$data=array();
		$data['tgl'] = $tgl = Yii::app()->request->getParam('tgl_setor', date('Y-m-d'));

		$WHERE_TGLSETOR = "";
		if($date = strtotime($tgl)){
			$thn = (int)substr(date('Y', $date), -2);
			$bln = (int)date('m', $date);
			$tgl = (int)date('d', $date);
			$WHERE_TGLSETOR = "
			AND TBLSETOR.TBLSETOR_THNSETOR = {$thn}
			AND TBLSETOR.TBLSETOR_BLNSETOR = {$bln}
			AND TBLSETOR.TBLSETOR_TGLSETOR = {$tgl}
			";
		}

		$sql = "SELECT
		(TBLREKENING_REKPENDAPATAN_90 || '.' ||
		TBLREKENING_REKPAD_90 || '.' ||
		TBLREKENING_REKPAJAK_90 || '.' ||
		TBLREKENING_REKAYAT_90 || '.' ||
		TBLREKENING_REKJENIS_90) as REK,

		(TBLREKENING_REKPENDAPATAN_90 || '.' ||
		TBLREKENING_REKPAD_90 || '.' ||
		TBLREKENING_REKPAJAK_90 || '.' ||
		TBLREKENING_REKAYAT_90) as REK_AYAT,

		(TBLREKENING_REKPENDAPATAN || '.' ||
		TBLREKENING_REKPAD || '.' ||
		TBLREKENING_REKPAJAK || '.' ||
		TBLREKENING_REKAYAT || '.' ||
		TBLREKENING_REKJENIS) as REK_,

		TBLREKENING_NAMAREKENING AS REK_NAMA,

		TBLSETOR_RUPIAHSETOR as POKOK,
		TBLSETOR_BUNGAKETETAPAN as BUNGA,
		TBLSETOR_DENDAKETETAPAN as DENDA
		FROM TBLSETOR
		JOIN TBLREKENING_90 TBLREKENING ON 
		TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLSETOR.TBLSETOR_REKJENIS
		where 
		TBLSETOR_REKPAJAK = 1
		and TBLSETOR.TBLSETOR_STATUSBAYAR = 10
		and TBLSETOR.TBLSETOR_CARABAYAR IS NULL
		and TBLSETOR.TBLSETOR_LOKET IS NULL
		{$WHERE_TGLSETOR}
		ORDER BY TBLSETOR_REKPENDAPATAN,TBLSETOR_REKPAD,TBLSETOR_REKPAJAK,TBLSETOR_REKAYAT,TBLSETOR_REKJENIS
		";
		// echo $sql; Yii::app()->end();
		$data['hasil'] = $hasil = Yii::app()->db->createCommand($sql)->queryAll();

		// if (isset($_REQUEST['jenis']) && $_REQUEST['jenis']=='word') {
			$this->cetakWord($data);
		// }

		// $this->renderPartial('cetak', array('data'=>$data));
	}

	public function cetakWord($data)
	{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_penyetoran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'laporan_realisasi_penerimaan.docx';

		Yii::import('ext.DMOpenTBS',true);
		Yii::import('ext.LokalIndonesia');
		DMOpenTBS::init();
		$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
		$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

		$utama = array();
		$rows = array();
		$dt = array();
		$no = 1;

		$total_pokok = 0;
		$total_bunga = 0;
		$total_denda = 0;
		$total_total = 0;
		$REK_AYAT_b4 = '';
		$utama['tglcetak'] = LokalIndonesia::TanggalUmum(date('Y-m-d'));
		$utama['tglsetor'] = $GLOBALS['tglsetor'] = $tglsetor = $data['tgl'];

		$master = array();
		foreach ($data['hasil'] as $MASTER) :
			if ($MASTER['REK_AYAT'] != $REK_AYAT_b4) :
				$REK_AYAT_b4 = $MASTER['REK_AYAT'];

				$master['no'] = '';
				$master['REK_AYAT'] = $MASTER['REK_AYAT'];
				$master['detail'] = array();

				$master_pokok = 0;
				$master_bunga = 0;
				$master_denda = 0;
				$master_total = 0;

				foreach ($data['hasil'] as $row) :

					if ($row['REK_AYAT'] == $REK_AYAT_b4) :
						$dt['no'] = $no++;
						$dt['rek_kode'] = $row['REK'];
						$dt['rek_nama'] = $row['REK_NAMA'];
						$dt['pokok_pajak'] = LokalIndonesia::ribuan($row['POKOK']);
						$dt['bunga_pajak'] = LokalIndonesia::ribuan($row['BUNGA']);
						$dt['denda_pajak'] = LokalIndonesia::ribuan($row['DENDA']);
						$dt['total_pajak'] = LokalIndonesia::ribuan($row['POKOK'] + $row['BUNGA'] + $row['DENDA']);

						$total_pokok += $row['POKOK'];
						$total_bunga += $row['BUNGA'];
						$total_denda += $row['DENDA'];
						$total_total += $row['POKOK'] + $row['BUNGA'] + $row['DENDA'];

						$master_pokok += $row['POKOK'];
						$master_bunga += $row['BUNGA'];
						$master_denda += $row['DENDA'];
						$master_total += $row['POKOK'] + $row['BUNGA'] + $row['DENDA'];

						array_push($master['detail'], $dt);
					endif;

				endforeach;

				$master['pokok_pajak'] = LokalIndonesia::ribuan($master_pokok);
				$master['bunga_pajak'] = LokalIndonesia::ribuan($master_bunga);
				$master['denda_pajak'] = LokalIndonesia::ribuan($master_denda);
				$master['total_pajak'] = LokalIndonesia::ribuan($master_total);

				array_push($rows, $master);
			endif;
		endforeach;
		
		// foreach ($data['hasil'] as $row) :

		// 	$dt['no'] = $no++;
		// 	$dt['rek_kode'] = $row['REK'];
		// 	$dt['rek_nama'] = $row['REK_NAMA'];
		// 	$dt['pokok_pajak'] = LokalIndonesia::ribuan($row['POKOK']);
		// 	$dt['bunga_pajak'] = LokalIndonesia::ribuan($row['BUNGA']);
		// 	$dt['denda_pajak'] = LokalIndonesia::ribuan($row['DENDA']);

		// 	$total_pokok += $row['POKOK'];
		// 	$total_bunga += $row['BUNGA'];
		// 	$total_denda += $row['DENDA'];

		// 	array_push($rows, $dt);

		// endforeach;

		$utama['pokok_pajak'] = LokalIndonesia::ribuan($total_pokok);
		$utama['bunga_pajak'] = LokalIndonesia::ribuan($total_bunga);
		$utama['denda_pajak'] = LokalIndonesia::ribuan($total_denda);
		$utama['total_pajak'] = LokalIndonesia::ribuan($total_total);

		// echo CJSON::encode(array($rows));Yii::app()->end();

		// Merge data in the first sheet 
		// $npwpd = $data['TBLDAFTAR_NOPOK'];
		$namafileDL = "Laporan Harian Penerimaan - {$tglsetor}.docx";
		$otbs->MergeBlock('row', $rows); 
		$otbs->MergeField('utama', $utama); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}
}