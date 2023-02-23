<?php

class Cetak_kartudata_pajakreklame_90Controller extends Controller
{
	var $MODULE_URL = 'pendataan/cetak_kartudata_pajakreklame_90';

	public function actionIndex()
	{
		$data['list_kecamatan'] = Yii::app()->db->createCommand()->select()->from('REFKECAMATAN')->queryAll();
		$data['list_kodejalan'] = Yii::app()->db->createCommand()->select()->from('RREKJALAN')->queryAll();
		$data['rek'] = Yii::app()->db->createCommand('
			SELECT
			*
			FROM
			TBLREKENING_90 TBLREKENING
			WHERE
			TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			AND TBLREKENING_REKAYAT = 4
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			')->queryAll();
		$data['sub_rek'] = Yii::app()->db->createCommand()
		->select('*')
		->from('TREKENING')
		->where('TREKENING_LEVEL=1')
		->queryAll();
		
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actioncari()
	{
		$data = array();
		$data['table'] = $this->getData();
		$data['hasil'] = $this->getData();
		$this->renderPartial('tabel', array('data'=>$data));
	}


	public function getData()
	{
		$namaTBL = '';
		$tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$bulanpjk = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
		$tanggalpjk = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
		$kecamatan = isset($_REQUEST['TBLKECAMATAN_ID']) && !empty($_REQUEST['TBLKECAMATAN_ID']) ? (int)$_REQUEST['TBLKECAMATAN_ID'] :'';
		$tahunsptpd = isset($_REQUEST['TBLDAFTREKLAME_THNSPTPD']) && !empty($_REQUEST['TBLDAFTREKLAME_THNSPTPD']) ? (int)$_REQUEST['TBLDAFTREKLAME_THNSPTPD'] :'';
		$bulansptpd = isset($_REQUEST['TBLDAFTREKLAME_BLNSPTPD']) && !empty($_REQUEST['TBLDAFTREKLAME_BLNSPTPD']) ?(int)$_REQUEST['TBLDAFTREKLAME_BLNSPTPD'] :'';
		$tanggalsptpd = isset($_REQUEST['TBLDAFTREKLAME_TGLSPTPD']) && !empty($_REQUEST['TBLDAFTREKLAME_TGLSPTPD']) ? (int)$_REQUEST['TBLDAFTREKLAME_TGLSPTPD'] :'';
		$jalan = isset($_REQUEST['REFJALAN_ID']) && !empty($_REQUEST['REFJALAN_ID']) ? (int)$_REQUEST['REFJALAN_ID'] : '';
		$reklame = isset($_REQUEST['TBLDAFTREKLAME_JNSREKLAME']) && !empty($_REQUEST['TBLDAFTREKLAME_JNSREKLAME']) ? $_REQUEST['TBLDAFTREKLAME_JNSREKLAME'] :'';
		// $penempatan = isset($_REQUEST['TBLDAFTREKLAME_ISJNSPENETAPAN']) && !empty($_REQUEST['TBLDAFTREKLAME_ISJNSPENETAPAN']) ? $_REQUEST['TBLDAFTREKLAME_ISJNSPENETAPAN'] :'';
		$rek_jenis = isset($_REQUEST['TBLDAFTREKLAME_REKJENIS']) && !empty($_REQUEST['TBLDAFTREKLAME_REKJENIS']) ? $_REQUEST['TBLDAFTREKLAME_REKJENIS'] : '';
		$isbayar = isset($_REQUEST['ISBAYAR']) && !empty($_REQUEST['ISBAYAR']) ? $_REQUEST['ISBAYAR'] : '';
		$isberizin = isset($_REQUEST['ISBERIZIN']) && !empty($_REQUEST['ISBERIZIN']) ? $_REQUEST['ISBERIZIN'] : '';



		$wheretahunpjk = !empty($tahunpjk) ? (' AND TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK='.$tahunpjk) : '';
		$wherebulanpjk = !empty($bulanpjk) ? (' AND TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK='.$bulanpjk) : '';
		$wheretanggalpjk = !empty($tanggalpjk) ? (' AND TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK='.$tahunpjk) : '';
		$wherekecamatan = !empty($kecamatan) ? (' AND TBLDAFTREKLAME.TBLKECAMATAN_ID='.$kecamatan) : '';
		$wheretahunsptpd = !empty($tahunsptpd) ? (' AND TBLDAFTREKLAME_THNENTRI='.$tahunsptpd) : '';
		$wherebulansptpd = !empty($bulansptpd) ? (' AND TBLDAFTREKLAME_BLNENTRI='.$bulansptpd) : '';
		$wheretanggalsptpd = !empty($tanggalsptpd) ? ('AND TBLDAFTREKLAME_TGLENTRI='.$tanggalsptpd) : '';
		$wherejalan = !empty($jalan) ? (' AND REFJALAN_ID='.$jalan) : '';
		$wherereklame = !empty($reklame) ? (" AND TBLDAFTREKLAME_JNSREKLAME='{$reklame}'") : '';
		// $wherepenempatan = !empty($penempatan) ? (" AND TBLDAFTREKLAME_ISJNSPENETAPAN='{$penempatan}'") : '';
		$whererek_jenis = !empty($rek_jenis) ? (" AND TBLDAFTREKLAME_REKJENIS={$rek_jenis}") : '';

		if (!empty($isbayar)) {
			if ($isbayar=='T') {

				$where_bayar = ' AND TBLSETOR_NOMORSSPD IS NOT NULL';	
			} else {
				$where_bayar = ' AND TBLSETOR_NOMORSSPD IS NULL';
			}

		} else {
			$where_bayar = '';
		}

		if (!empty($isberizin)) {
			if ($isberizin=='T') {

				$where_berizin = ' AND TBLDAFTREKLAME_NODAFTARIZIN IS NOT NULL';	
			} else {
				$where_berizin = ' AND TBLDAFTREKLAME_NODAFTARIZIN IS NULL';
			}

		} else {
			$where_berizin = '';
		}


		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '4.1.1.1.0':
			$namaTBL = 'TBLDAFTHOTEL';
			$AYAT = '1';
			break;
			
			case '4.1.1.2.0':
			$namaTBL = 'TBLDAFTRMAKAN';
			$AYAT = '2';
			break;
			
			case '4.1.1.3.0':
			$namaTBL = 'TBLDAFTHIBURAN';
			$AYAT = '3';
			break;
			
			case '4.1.1.4.0':
			$namaTBL = 'TBLDAFTREKLAME';
			$AYAT = '4';
			break;
			
			case '4.1.1.7.0':
			$namaTBL = 'TBLDAFTPARKIR';
			$AYAT = '7';
			break;
			
			case '4.1.1.8.0':
			$namaTBL = 'TBLDAFTTANAH';
			$AYAT = '8';
			break;
			
			case '4.1.1.9.0':
			$namaTBL = 'TBLDAFTBURUNG';
			$AYAT = '9';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
		}
		$sql="SELECT
		(
		SELECT
		TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
		TBLREKENING
		WHERE
		TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTREKLAME.TBLDAFTREKLAME_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTREKLAME.TBLDAFTREKLAME_REKJENIS
		) AS NMREKENING,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTREKLAME.TBLKECAMATAN_ID,
		TBLDAFTREKLAME.TBLKELURAHAN_ID,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE,
		TBLDAFTREKLAME_REKJENIS,
		TBLDAFTREKLAME_KETERANGAN1,
		TBLDAFTREKLAME_KETERANGAN2,
		TBLDAFTREKLAME_JMLHREKLAME,
		JAM,
		TBLDAFTREKLAME_SKORKAWASAN,
		FJ,
		ST,
		REFKETINGGIAN_SKOR,
		TBLDAFTREKLAME_PANJANG,
		TBLDAFTREKLAME_LEBAR,
		TBLDAFTREKLAME_JUMLAHHARI,
		TBLDAFTREKLAME.TBLDAFTREKLAME_NILAISTRATEGIS,
		REFSUDUTPANDANG_SKOR,
		TBLDAFTREKLAME_RPTARIF,
		HARGA,
		TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK,
		TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK,
		TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK,
		TBLDAFTREKLAME_PAJAK,
		TBLDAFTREKLAME_PAJAKSKPD,
		TBLDAFTREKLAME_THNSKPD,
		TBLDAFTREKLAME_BLNSKPD,
		TBLDAFTREKLAME_TGLSKPD,
		TBLDAFTREKLAME_THNSPTPD,
		TBLDAFTREKLAME_BLNSPTPD,
		TBLDAFTREKLAME_TGLSPTPD,
		TBLDAFTREKLAME_THNBATASSKPD,
		TBLDAFTREKLAME_BLNBATASSKPD,
		TBLDAFTREKLAME_TGLBATASSKPD,
		TBLDAFTREKLAME_JNSREKLAME,
		TBLDAFTREKLAME_THNENTRI,
		TBLDAFTREKLAME_BLNENTRI,
		TBLDAFTREKLAME_TGLENTRI,
		TBLSETOR_NOMORSSPD,
		TBLSETOR_TGLSETOR,
		TBLSETOR_BLNSETOR,
		TBLSETOR_THNSETOR,
		TBLSETOR_RUPIAHSETOR,
		TBLDAFTREKLAME_NODAFTARIZIN,
		TBLDAFTREKLAME_TGLMULAIREKLAME,
		TBLDAFTREKLAME_BLNMULAIREKLAME,
		TBLDAFTREKLAME_THNMULAIREKLAME,
		TBLDAFTREKLAME_TGLAKHIRREKLAME,
		TBLDAFTREKLAME_BLNAKHIRREKLAME,
		TBLDAFTREKLAME_THNAKHIRREKLAME
		FROM
		TBLDAFTAR
		INNER JOIN TBLDAFTREKLAME ON TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK
		LEFT JOIN TBLSETOR ON TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
					AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0)
					AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0)
					AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
					AND TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE = TBLSETOR.TBLPENDATAAN_PAJAKKE
					AND TBLSETOR.TBLSETOR_JNSBAYAR LIKE 'SKPD%'
		WHERE
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA IS NOT NULL
		AND TBLDAFTAR.TBLDAFTAR_NOPOK <> 150000
		AND TBLDAFTREKLAME_REKPENDAPATAN = 4
		AND TBLDAFTREKLAME_REKPAD = 1
		AND TBLDAFTREKLAME_REKPAJAK = 1
		AND TBLDAFTREKLAME_REKAYAT = 4

		".$wheretahunpjk
		.$wherebulanpjk
		.$wheretanggalpjk
		.$wherekecamatan
		.$wheretahunsptpd
		.$wherebulansptpd
		.$wheretanggalsptpd
		.$wherejalan
		.$wherereklame
		.$whererek_jenis
		.$where_berizin
		.$where_bayar
		. "
		ORDER BY
		TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE,
		TBLDAFTREKLAME.TBLKECAMATAN_ID,
		TBLDAFTREKLAME.TBLKELURAHAN_ID,
		TBLDAFTREKLAME.TBLDAFTAR_NOPOK,
		TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAK
		";
		return $data = Yii::app()->db->createCommand( $sql )->queryAll();
	}

	public function actionCetak()
	{
		$data = array();
		//$data['table'] = $this->getData();
		//$this->renderPartial('tabel', array('data'=>$data));
		$data['hasil'] = $this->getData();
		$this->renderPartial('cetak', array('data'=>$data));
	}

	public function actionCetakWord()
	{
		// error_reporting(0);

		// baca file template, yg dipakai
		// $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
		
		// echo "$query";
		$data['hasil'] = $this->getData();
		// $data['list_kartudata'] = Yii::app()->db->createCommand($query)->queryAll();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_kartudata' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'kartudata-reklame.docx';

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

		//INI CODING QUERY CETAK WORD

			

		$dt = array();
		$rows = array();
		
		$totalpajak = array('totalpajak'=>0); $totaljumrek = array('totaljumrek'=>0); $no=1; foreach ($data['hasil'] as $kolom) :

			$dt['no'] = $no++;
			$dt['nopok'] = $kolom['TBLDAFTAR_NOPOK'];
			$dt['noskp'] = $kolom['TBLDAFTAR_GOLONGAN'];
			$dt['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];

			$dt['lok'] = $kolom['TBLPENDATAAN_PAJAKKE'];
			$dt['jumlahrekl'] = $kolom['TBLDAFTREKLAME_JMLHREKLAME']; 

			$totaljumrek['totaljumrek'] += $kolom['TBLDAFTREKLAME_JMLHREKLAME'];
			$totalpajak['totalpajak'] += $kolom['TBLDAFTREKLAME_PAJAK'];

			$thnpajak = $kolom['TBLPENDATAAN_THNPAJAK'];
			$blnpajak = $kolom['TBLPENDATAAN_BLNPAJAK'];
			$tglpajak = $kolom['TBLPENDATAAN_TGLPAJAK'];

			$thnentri = $kolom['TBLDAFTREKLAME_THNENTRI'];
			$tglentri = $kolom['TBLDAFTREKLAME_TGLENTRI'];
			$blnentri = $kolom['TBLDAFTREKLAME_BLNENTRI'];

			$dt['namarek'] = $kolom['NMREKENING'];

			$dt['ket1'] = $kolom['TBLDAFTREKLAME_KETERANGAN1'];
			$dt['ket2'] = $kolom['TBLDAFTREKLAME_KETERANGAN2'];

			$dt['wkt'] = $kolom['TBLDAFTREKLAME_JUMLAHHARI'];
			$dt['ka'] = $kolom['TBLDAFTREKLAME_SKORKAWASAN'];
			$dt['fj'] = $kolom['FJ'];
			$dt['st'] = $kolom['ST'];
			$dt['sp'] = $kolom['REFKETINGGIAN_SKOR'];
			$dt['pjg'] = floatval($kolom['TBLDAFTREKLAME_PANJANG']);
			$dt['lebar'] = floatval($kolom['TBLDAFTREKLAME_LEBAR']);
			$dt['pjgxlebar'] = $kolom['TBLDAFTREKLAME_PANJANG']*$kolom['TBLDAFTREKLAME_LEBAR'];
			$dt['niti'] = $kolom['TBLDAFTREKLAME_NILAISTRATEGIS'];
			$dt['index'] = $kolom['REFSUDUTPANDANG_SKOR'];
			$dt['biaya'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_RPTARIF']);
			$dt['harga'] = LokalIndonesia::ribuan($kolom['HARGA']);
			$dt['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_PAJAK']);

			$dt['thnpajak'] = $kolom['TBLPENDATAAN_THNPAJAK'];
			$dt['blnpajak'] = $kolom['TBLPENDATAAN_BLNPAJAK'];
			$dt['tglpajak'] = $kolom['TBLPENDATAAN_TGLPAJAK'];

			$dt['npwpd'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d", $kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);

		array_push($rows, $dt);

		endforeach;

		$header = array();


		$header['totrek'] = $totaljumrek['totaljumrek'];
		$header['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
		$header['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');

		$thn_spt = isset($_REQUEST['TBLDAFTREKLAME_THNSPTPD']) && !empty($_REQUEST['TBLDAFTREKLAME_THNSPTPD']) ? (int)$_REQUEST['TBLDAFTREKLAME_THNSPTPD'] : '';
		$bln_spt = isset($_REQUEST['TBLDAFTREKLAME_BLNSPTPD']) && !empty($_REQUEST['TBLDAFTREKLAME_BLNSPTPD']) ? (int)$_REQUEST['TBLDAFTREKLAME_BLNSPTPD'] : '';
		$tgl_spt = isset($_REQUEST['TBLDAFTREKLAME_TGLSPTPD']) && !empty($_REQUEST['TBLDAFTREKLAME_TGLSPTPD']) ? (int)$_REQUEST['TBLDAFTREKLAME_TGLSPTPD'] : '';

		if (!empty($tgl_spt)) {
			# HARIAN
			$header['kopttd']  = 'KOORDINATOR LOKET';
			$header['namattd'] = 'ARI PRANOWO, SE';
			$header['nipttd']  = '19680508199203101';
		} else {
			# BULANAN
			$header['kopttd']  = "KA. SUB BID PENDATAAN \nPENDAPATAN DAERAH";
			$header['namattd'] = 'DRS. BAYU SUWITANA';
			$header['nipttd']  = '196501121993031008';
		}

		
		$GLOBALS['thnpajak'] = '';
		$GLOBALS['blnpajak'] = '';
		$GLOBALS['tglpajak'] = '';

		$thnpajak = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$blnpajak = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
		$tglpajak = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
		$GLOBALS['thnpajak'] = !empty($thnpajak) ? '20'. $thnpajak : '';
		$GLOBALS['blnpajak'] = !empty($blnpajak) ? $blnpajak : '';
		$GLOBALS['tglpajak'] = !empty($tglpajak) ? $tglpajak : '';

		// var_dump($header['hasil']);die;
		$GLOBALS['thnentri'] = $thn_spt;
		$GLOBALS['blnentri'] = $bln_spt;
		// $GLOBALS['tglentri'] = $tglentri;
		$GLOBALS['tglentri'] = $tgl_spt;
		$GLOBALS['cara'] = '';
		$rek_jenis = isset($_REQUEST['TBLDAFTREKLAME_JNSREKLAME']) && !empty($_REQUEST['TBLDAFTREKLAME_JNSREKLAME']) ? $_REQUEST['TBLDAFTREKLAME_JNSREKLAME'] : '';
		if (!empty($rek_jenis)) {
			if ($rek_jenis=='T') {
				$GLOBALS['cara'] = 'Tetap';
			}
			if ($rek_jenis=='I') {
				$GLOBALS['cara'] = 'Insidentil';
			}
			if ($rek_jenis=='B') {
				$GLOBALS['cara'] = 'Berjalan';
			}
		}

		//SAMPAI SINI QUERYNYAhttps://stackoverflow.com/questions/19263954/opentbs-merge-2-rows-in-word-document-table-simultaneously

		// var_dump($data);
		// echo json_encode($rows);Yii::app()->end();
		// echo json_encode($rows);

		// Merge data in the first sheet 
		// $npwpd = $data['TBLDAFTAR_NOPOK'];
		$namafileDL = "KARTUDATA-REKLAME.docx";
		$otbs->MergeBlock('dt', $rows); 
		$otbs->MergeField('header', $header); 
		// $otbs->MergeField('setoran', $setoran); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}

	public function actionCetakWord2021()
	{
		// error_reporting(0);

		// baca file template, yg dipakai
		// $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
		
		// echo "$query";
		$data['hasil'] = $this->getData();
		// $data['list_kartudata'] = Yii::app()->db->createCommand($query)->queryAll();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_kartudata' . DIRECTORY_SEPARATOR;
		if ($_REQUEST['jenis']=='normal') {

			$namatpl = $path_tpl . 'kartudata-reklame-2021.docx';
		} elseif ($_REQUEST['jenis']=='bpk') {
			$namatpl = $path_tpl . 'kartudata-reklame-2021-bpk.xlsx';
		}
		// echo $namatpl;Yii::app()->end();

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

		//INI CODING QUERY CETAK WORD

			

		$dt = array();
		$rows = array();
		
		$totalpajak = array('totalpajak'=>0); $totaljumrek = array('totaljumrek'=>0); $no=1; foreach ($data['hasil'] as $kolom) :

			$dt['no'] = $no++;
			$dt['nopok'] = $kolom['TBLDAFTAR_NOPOK'];
			$dt['noskp'] = $kolom['TBLDAFTAR_GOLONGAN'];
			$dt['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];

			$dt['lok'] = $kolom['TBLPENDATAAN_PAJAKKE'];
			$dt['jumlahrekl'] = $kolom['TBLDAFTREKLAME_JMLHREKLAME']; 

			$totaljumrek['totaljumrek'] += $kolom['TBLDAFTREKLAME_JMLHREKLAME'];
			$totalpajak['totalpajak'] += $kolom['TBLDAFTREKLAME_PAJAK'];

			$thnpajak = $kolom['TBLPENDATAAN_THNPAJAK'];
			$blnpajak = $kolom['TBLPENDATAAN_BLNPAJAK'];
			$tglpajak = $kolom['TBLPENDATAAN_TGLPAJAK'];

			$thnentri = $kolom['TBLDAFTREKLAME_THNENTRI'];
			$tglentri = $kolom['TBLDAFTREKLAME_TGLENTRI'];
			$blnentri = $kolom['TBLDAFTREKLAME_BLNENTRI'];

			$dt['namarek'] = $kolom['NMREKENING'];

			$dt['ket1'] = $kolom['TBLDAFTREKLAME_KETERANGAN1'];
			$dt['ket2'] = $kolom['TBLDAFTREKLAME_KETERANGAN2'];

			$dt['alamat'] = 'Alamat WP '.$kolom['TBLDAFTAR_BADANUSAHAALAMAT'];

			if ($kolom['TBLDAFTREKLAME_NODAFTARIZIN']!=null) {
				$noizin = 'Izin No.'.$kolom['TBLDAFTREKLAME_NODAFTARIZIN'];
			} else {
				$noizin = "Belum Berizin";
			}

			$dt['noizin'] = $noizin;

			$tglsetor = $kolom['TBLSETOR_TGLSETOR'].'-'.$kolom['TBLSETOR_BLNSETOR'].'-20'.$kolom['TBLSETOR_THNSETOR'];

			if ($kolom['TBLSETOR_NOMORSSPD']!=null) {
				$stslunas = "Lunas ".$tglsetor."";
			} else {
				$stslunas = "Belum Lunas";
			}

			$dt['stslunas'] = $stslunas;

			$dt['wkt'] = $kolom['TBLDAFTREKLAME_JUMLAHHARI'];
			$dt['ka'] = $kolom['TBLDAFTREKLAME_SKORKAWASAN'];
			$dt['fj'] = $kolom['FJ'];
			$dt['st'] = $kolom['ST'];
			$dt['sp'] = $kolom['REFKETINGGIAN_SKOR'];
			$dt['pjg'] = floatval($kolom['TBLDAFTREKLAME_PANJANG']);
			$dt['lebar'] = floatval($kolom['TBLDAFTREKLAME_LEBAR']);
			$dt['pjgxlebar'] = $kolom['TBLDAFTREKLAME_PANJANG']*$kolom['TBLDAFTREKLAME_LEBAR'];
			$dt['niti'] = $kolom['TBLDAFTREKLAME_NILAISTRATEGIS'];
			$dt['index'] = $kolom['REFSUDUTPANDANG_SKOR'];
			$dt['biaya'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_RPTARIF']);
			$dt['harga'] = LokalIndonesia::ribuan($kolom['HARGA']);
			$dt['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_PAJAK']);

			$dt['thnpajak'] = $kolom['TBLPENDATAAN_THNPAJAK'];
			$dt['blnpajak'] = $kolom['TBLPENDATAAN_BLNPAJAK'];
			$dt['tglpajak'] = $kolom['TBLPENDATAAN_TGLPAJAK'];

			$dt['npwpd'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d", $kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);

			$dt['tglspt'] = sprintf("%02d",$kolom['TBLDAFTREKLAME_TGLSPTPD']).'-'.sprintf("%02d",$kolom['TBLDAFTREKLAME_BLNSPTPD']).'-20'.$kolom['TBLDAFTREKLAME_THNSPTPD'];

			$dt['tglawal'] = sprintf("%02d",$kolom['TBLDAFTREKLAME_TGLMULAIREKLAME']).'-'.sprintf("%02d",$kolom['TBLDAFTREKLAME_BLNMULAIREKLAME']).'-20'.$kolom['TBLDAFTREKLAME_THNMULAIREKLAME'];

			$dt['tglakhir'] = sprintf("%02d",$kolom['TBLDAFTREKLAME_TGLAKHIRREKLAME']).'-'.sprintf("%02d",$kolom['TBLDAFTREKLAME_BLNAKHIRREKLAME']).'-20'.$kolom['TBLDAFTREKLAME_THNAKHIRREKLAME'];

			$dt['skpd'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_PAJAKSKPD']);
			$dt['sspd'] = LokalIndonesia::ribuan($kolom['TBLSETOR_RUPIAHSETOR']);

		array_push($rows, $dt);

		endforeach;

		$header = array();


		$header['totrek'] = $totaljumrek['totaljumrek'];
		$header['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
		$header['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');

		$thn_spt = isset($_REQUEST['TBLDAFTREKLAME_THNSPTPD']) && !empty($_REQUEST['TBLDAFTREKLAME_THNSPTPD']) ? (int)$_REQUEST['TBLDAFTREKLAME_THNSPTPD'] : '';
		$bln_spt = isset($_REQUEST['TBLDAFTREKLAME_BLNSPTPD']) && !empty($_REQUEST['TBLDAFTREKLAME_BLNSPTPD']) ? (int)$_REQUEST['TBLDAFTREKLAME_BLNSPTPD'] : '';
		$tgl_spt = isset($_REQUEST['TBLDAFTREKLAME_TGLSPTPD']) && !empty($_REQUEST['TBLDAFTREKLAME_TGLSPTPD']) ? (int)$_REQUEST['TBLDAFTREKLAME_TGLSPTPD'] : '';

		if (!empty($tgl_spt)) {
			# HARIAN
			$header['kopttd']  = 'KOORDINATOR LOKET';
			$header['namattd'] = 'ARI PRANOWO, SE';
			$header['nipttd']  = '19680508199203101';
		} else {
			# BULANAN
			$header['kopttd']  = "KA. SUB BID PENDATAAN \nPENDAPATAN DAERAH";
			$header['namattd'] = 'DRS. BAYU SUWITANA';
			$header['nipttd']  = '196501121993031008';
		}

		
		$GLOBALS['thnpajak'] = '';
		$GLOBALS['blnpajak'] = '';
		$GLOBALS['tglpajak'] = '';

		$thnpajak = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$blnpajak = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
		$tglpajak = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
		$GLOBALS['thnpajak'] = !empty($thnpajak) ? '20'. $thnpajak : '';
		$GLOBALS['blnpajak'] = !empty($blnpajak) ? $blnpajak : '';
		$GLOBALS['tglpajak'] = !empty($tglpajak) ? $tglpajak : '';

		// var_dump($header['hasil']);die;
		$GLOBALS['thnentri'] = $thn_spt;
		$GLOBALS['blnentri'] = $bln_spt;
		// $GLOBALS['tglentri'] = $tglentri;
		$GLOBALS['tglentri'] = $tgl_spt;
		$GLOBALS['cara'] = '';
		$rek_jenis = isset($_REQUEST['TBLDAFTREKLAME_JNSREKLAME']) && !empty($_REQUEST['TBLDAFTREKLAME_JNSREKLAME']) ? $_REQUEST['TBLDAFTREKLAME_JNSREKLAME'] : '';
		if (!empty($rek_jenis)) {
			if ($rek_jenis=='T') {
				$GLOBALS['cara'] = 'Tetap';
			}
			if ($rek_jenis=='I') {
				$GLOBALS['cara'] = 'Insidentil';
			}
			if ($rek_jenis=='B') {
				$GLOBALS['cara'] = 'Berjalan';
			}
		}

		//SAMPAI SINI QUERYNYAhttps://stackoverflow.com/questions/19263954/opentbs-merge-2-rows-in-word-document-table-simultaneously

		// var_dump($data);
		// echo json_encode($rows);Yii::app()->end();
		// echo json_encode($rows);

		// Merge data in the first sheet 
		// $npwpd = $data['TBLDAFTAR_NOPOK'];
		if ($_REQUEST['jenis']=='normal') {

			$namafileDL = "KARTUDATA-REKLAME.docx";
			$otbs->MergeBlock('dt', $rows); 
			$otbs->MergeField('header', $header);
		} elseif ($_REQUEST['jenis']=='bpk') {
			$namafileDL = "KARTUDATA-REKLAME-BPK.xlsx";
			$otbs->MergeBlock('dt', $rows); 
		}
		 
		// $otbs->MergeField('setoran', $setoran); 
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