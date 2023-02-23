<?php

class Cetak_reklame_jatuhtempoController extends Controller
{
	public function actionIndex()
	{
		$data['list_kecamatan'] = Yii::app()->db->createCommand()->select()->from('REFKECAMATAN')->queryAll();
		$data['list_kodejalan'] = Yii::app()->db->createCommand()->select()->from('RREKJALAN')->queryAll();
		$data['rek'] = Yii::app()->db->createCommand('
			SELECT
			*
			FROM
			TBLREKENING
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


	public function actionCetakWord()
	{
		// error_reporting(0);

		// baca file template, yg dipakai
		// $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
		
		// echo "$query";
		// $data['hasil'] = $this->cari();
		// $data['list_kartudata'] = Yii::app()->db->createCommand($query)->queryAll();

		$namaTBL = '';
		$tahun_pajak = substr($_REQUEST['tahun_pajak'], -2) ? (int)(substr($_REQUEST['tahun_pajak'], -2)) : '';
		$bulan_pajak = $_REQUEST['bulan_pajak'] ? (int)$_REQUEST['bulan_pajak'] : '';
		$tanggal_pajak = $_REQUEST['tanggal_pajak'] ? (int)$_REQUEST['tanggal_pajak'] : '';
		$rekening_kode = $_REQUEST['rekening_kode'] ? (int)$_REQUEST['rekening_kode'] :'';
		$tahun_entryspt = substr($_REQUEST['tahun_entryspt'], -2) ? (int)(substr($_REQUEST['tahun_entryspt'], -2)) :'';
		$bulan_entryspt = $_REQUEST['bulan_entryspt'] ? (int)$_REQUEST['bulan_entryspt'] :'';
		$tanggal_entryspt = $_REQUEST['tanggal_entryspt'] ? (int)$_REQUEST['tanggal_entryspt'] :'';
		$jenis_pajak = $_REQUEST['jenis_pajak'] ? $_REQUEST['jenis_pajak'] :'';
		// $tanggalawal = $_REQUEST['TANGGAL_AWAL']) && !empty($_REQUEST['TANGGAL_AWAL']) ? $_REQUEST['TANGGAL_AWAL'] :'';
		$tanggal_awal = trim($_REQUEST['tanggal_awal'])!='' ? date('Y-m-d', strtotime($_REQUEST['tanggal_awal']) ) : "";
		$explode = explode('-',$tanggal_awal);
		$tgla =$explode[2];
		$blna =$explode[1];
		$tahuna = substr($explode[0], -2);
		// $tanggalakhir = $_REQUEST['TANGGAL_AKHIR']) && !empty($_REQUEST['TANGGAL_AKHIR']) ? $_REQUEST['TANGGAL_AKHIR'] : '';
		$tanggal_akhir = trim($_REQUEST['tanggal_akhir'])!='' ? date('Y-m-d', strtotime($_REQUEST['tanggal_akhir']) ) : "";
		$explode = explode('-',$tanggal_akhir);
		$tglk =$explode[2];
		$blnk =$explode[1];
		$tahunk = substr($explode[0], -2);



		$wheretahunpjk = !empty($tahun_pajak) ? (' AND TBLPENDATAAN_THNPAJAK='.$tahun_pajak) : '';
		$wherebulanpjk = !empty($bulan_pajak) ? (' AND TBLPENDATAAN_BLNPAJAK='.$bulan_pajak) : '';
		$wheretanggalpjk = !empty($tanggal_pajak) ? (' AND TBLPENDATAAN_TGLPAJAK='.$tanggal_pajak) : '';
		$whererekeningkode = !empty($rekening_kode) ? (' AND TBLREKENING_KODE='.$rekening_kode) : '';
		$wheretahunentri = !empty($tahun_entryspt) ? (' AND TBLDAFTREKLAME_THNENTRI='.$tahun_entryspt) : '';
		$wherebulanentri = !empty($bulan_entryspt) ? (' AND TBLDAFTREKLAME_BLNENTRI='.$bulan_entryspt) : '';
		$wheretanggalentri = !empty($tanggal_entryspt) ? ('AND TBLDAFTREKLAME_TGLENTRI='.$tanggal_entryspt) : '';
		$wherejnsreklame = !empty($jenis_pajak) ? (" AND TBLDAFTREKLAME_JNSREKLAME='$jenis_pajak'") : '';

		
		$sql='SELECT
		(
		SELECT
		"TBLREKENING".TBLREKENING_NAMAREKENING
		FROM
		"TBLREKENING"
		WHERE
		"TBLREKENING".TBLREKENING_REKPENDAPATAN = "TBLDAFTREKLAME".TBLDAFTREKLAME_REKPENDAPATAN
		AND "TBLREKENING".TBLREKENING_REKPAD = "TBLDAFTREKLAME".TBLDAFTREKLAME_REKPAD
		AND "TBLREKENING".TBLREKENING_REKPAJAK = "TBLDAFTREKLAME".TBLDAFTREKLAME_REKPAJAK
		AND "TBLREKENING".TBLREKENING_REKAYAT = "TBLDAFTREKLAME".TBLDAFTREKLAME_REKAYAT
		AND "TBLREKENING".TBLREKENING_REKJENIS = "TBLDAFTREKLAME".TBLDAFTREKLAME_REKJENIS
		) AS NMREKENING,
		"TBLDAFTAR".TBLDAFTAR_GOLONGAN,
		"TBLDAFTAR".TBLDAFTAR_NOPOK,
		"TBLDAFTREKLAME".TBLKECAMATAN_ID,
		"TBLDAFTREKLAME".TBLKELURAHAN_ID,
		"TBLDAFTAR".TBLDAFTAR_BADANUSAHANAMA,
		"TBLDAFTAR".TBLDAFTAR_JENISPENDAPATAN,
		"TBLDAFTAR".TBLKECAMATAN_IDBADANUSAHA,
		"TBLDAFTAR".TBLKELURAHAN_IDBADANUSAHA,
		TBLPENDATAAN_PAJAKKE,
		TBLDAFTREKLAME_REKJENIS,
		TBLDAFTREKLAME_KETERANGAN1,
		TBLDAFTREKLAME_KETERANGAN2,
		TBLPENDATAAN_PAJAKKE,
		TBLDAFTREKLAME_JMLHREKLAME,
		JAM,
		TBLDAFTREKLAME_SKORKAWASAN,
		FJ,
		ST,
		REFKETINGGIAN_SKOR,
		TBLDAFTREKLAME_PANJANG,
		TBLDAFTREKLAME_LEBAR,
		TBLDAFTREKLAME_JUMLAHHARI,
		"TBLDAFTREKLAME".TBLDAFTREKLAME_NILAISTRATEGIS,
		REFSUDUTPANDANG_SKOR,
		TBLDAFTREKLAME_RPTARIF,
		HARGA,
		TBLPENDATAAN_THNPAJAK,
		TBLPENDATAAN_BLNPAJAK,
		TBLPENDATAAN_TGLPAJAK,
		TBLDAFTREKLAME_PAJAK,
		TBLDAFTREKLAME_THNSKPD,
		TBLDAFTREKLAME_BLNSKPD,
		TBLDAFTREKLAME_TGLSKPD,
		TBLDAFTREKLAME_THNENTRI,
		TBLDAFTREKLAME_BLNSPTPD,
		TBLDAFTREKLAME_TGLSPTPD,
		TBLDAFTREKLAME_THNBATASSKPD,
		TBLDAFTREKLAME_THNMULAIREKLAME,
		TBLDAFTREKLAME_BLNMULAIREKLAME,
		TBLDAFTREKLAME_TGLMULAIREKLAME,
		TBLDAFTREKLAME_THNAKHIRREKLAME,
		TBLDAFTREKLAME_BLNAKHIRREKLAME,
		TBLDAFTREKLAME_TGLAKHIRREKLAME,
		TBLDAFTREKLAME_BLNBATASSKPD,
		TBLDAFTREKLAME_TGLBATASSKPD,
		TBLDAFTREKLAME_JNSREKLAME,
		TBLDAFTREKLAME_THNENTRI,
		TBLDAFTREKLAME_BLNENTRI,
		TBLDAFTREKLAME_TGLENTRI
		FROM
		"TBLDAFTAR"
		INNER JOIN "TBLDAFTREKLAME" ON "TBLDAFTAR".TBLDAFTAR_NOPOK = "TBLDAFTREKLAME".TBLDAFTAR_NOPOK
		WHERE
		"TBLDAFTAR".TBLDAFTAR_BADANUSAHANAMA IS NOT NULL
		AND "TBLDAFTAR".TBLDAFTAR_NOPOK <> 150000
		AND TBLDAFTREKLAME_REKPENDAPATAN = 4
		AND TBLDAFTREKLAME_REKPAD = 1
		AND TBLDAFTREKLAME_REKPAJAK = 1
		AND TBLDAFTREKLAME_REKAYAT = 4
		AND TBLDAFTREKLAME_THNAKHIRREKLAME BETWEEN '.$tahuna.' AND '.$tahunk.'
		AND TBLDAFTREKLAME_BLNAKHIRREKLAME BETWEEN '.$blna.' AND '.$blnk.'
		AND TBLDAFTREKLAME_TGLAKHIRREKLAME BETWEEN '.$tgla.' AND '.$tglk.' 
		

		'.$wheretahunpjk
		.$wherebulanpjk
		.$wheretanggalpjk
		.$wheretahunentri
		.$wherebulanentri
		.$wheretanggalentri
		.$wherejnsreklame
		.'
		ORDER BY
		TBLDAFTREKLAME_THNAKHIRREKLAME,
		TBLDAFTREKLAME_BLNAKHIRREKLAME,
		TBLDAFTREKLAME_TGLAKHIRREKLAME	
		';
		$data['hasil'] = $data = Yii::app()->db->createCommand( $sql )->queryAll();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_kartudata' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'kartudata-reklame-jthtempo.docx';

		Yii::import('ext.DMOpenTBS',true);
		Yii::import('ext.LokalIndonesia');
		DMOpenTBS::init();
		$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
		$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($namatpl, OPENTBS_ALREADY_UTF8); // load the template

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
			$dt['tgla'] = $kolom['TBLDAFTREKLAME_TGLMULAIREKLAME'] .'/'. $kolom['TBLDAFTREKLAME_BLNMULAIREKLAME'] .'/20'. $kolom['TBLDAFTREKLAME_THNMULAIREKLAME'];
			$dt['tglk'] = $kolom['TBLDAFTREKLAME_TGLAKHIRREKLAME'] .'/'. $kolom['TBLDAFTREKLAME_BLNAKHIRREKLAME'] .'/20'. $kolom['TBLDAFTREKLAME_THNAKHIRREKLAME'];

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

		$thn_spt = isset($_REQUEST['tahun_entryspt']) && !empty($_REQUEST['tahun_entryspt']) ? (int)$_REQUEST['tahun_entryspt'] : '';
		$bln_spt = isset($_REQUEST['bulan_entryspt']) && !empty($_REQUEST['bulan_entryspt']) ? (int)$_REQUEST['bulan_entryspt'] : '';
		$tgl_spt = isset($_REQUEST['tanggal_entryspt']) && !empty($_REQUEST['tanggal_entryspt']) ? (int)$_REQUEST['tanggal_entryspt'] : '';

		if (!empty($tgl_spt)) {
			# HARIAN
			$header['kopttd']  = 'KOORDINATOR LOKET';
			$header['namattd'] = 'ARI PRANOWO, SE';
			$header['nipttd']  = '19680508199203101';
		} else {
			# BULANAN
			$header['kopttd']  = "KA. SUB BID PELAYANAN \nPENDAPATAN DAERAH";
			$header['namattd'] = 'DRS. BAYU SUWITANA';
			$header['nipttd']  = '196501121993031008';
		}

		
		// $GLOBALS['thnpajak'] = '';
		// $GLOBALS['blnpajak'] = '';
		// $GLOBALS['tglpajak'] = '';

		$thnpajak = isset($_REQUEST['tahun_pajak']) && !empty($_REQUEST['tahun_pajak']) ? (int)$_REQUEST['tahun_pajak'] : '';
		$blnpajak = isset($_REQUEST['bulan_pajak']) && !empty($_REQUEST['bulan_pajak']) ? (int)$_REQUEST['bulan_pajak'] : '';
		$tglpajak = isset($_REQUEST['tanggal_pajak']) && !empty($_REQUEST['tanggal_pajak']) ? (int)$_REQUEST['tanggal_pajak'] : '';
		$GLOBALS['thnpajak'] = !empty($thnpajak) ? $thnpajak : '';
		$GLOBALS['blnpajak'] = !empty($blnpajak) ? $blnpajak : '';
		$GLOBALS['tglpajak'] = !empty($tglpajak) ? $tglpajak : '';
		// echo "string";
		// var_dump($header['hasil']);die;
		$GLOBALS['thnentri'] = $thn_spt;
		$GLOBALS['blnentri'] = $bln_spt;
		// $GLOBALS['tglentri'] = $tglentri;
		$GLOBALS['tglentri'] = $tgl_spt;
		$GLOBALS['cara'] = '';
		$rek_jenis = isset($_REQUEST['jenis_pajak']) && !empty($_REQUEST['jenis_pajak']) ? $_REQUEST['jenis_pajak'] : '';
		if (!empty($rek_jenis)) {
			if ($rek_jenis=='T') {
				$GLOBALS['cara'] = 'TETAP';
			}
			if ($rek_jenis=='I') {
				$GLOBALS['cara'] = 'INSIDENTIL';
			}
			if ($rek_jenis=='B') {
				$GLOBALS['cara'] = 'BERJALAN';
			}
		}

		//SAMPAI SINI QUERYNYAhttps://stackoverflow.com/questions/19263954/opentbs-merge-2-rows-in-word-document-table-simultaneously

		// var_dump($data);
		// echo json_encode($rows);Yii::app()->end();
		// echo json_encode($rows);

		// Merge data in the first sheet 
		// $npwpd = $data['TBLDAFTAR_NOPOK'];
		$namafileDL = "KARTUDATA-REKLAME-JATUHTEMPO.docx";
		$otbs->MergeBlock('dt', $rows); 
		$otbs->MergeField('header', $header); 
		// $otbs->MergeField('setoran', $setoran); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}
}