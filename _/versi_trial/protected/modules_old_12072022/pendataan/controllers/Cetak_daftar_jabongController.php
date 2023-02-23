<?php

class Cetak_daftar_jabongController extends Controller
{
	public function init()
	{
		Yii::import('ext.DBFetch');
	}

	public function actionIndex()
	{
		// $data['URL_APP'] = Yii::app()->GetBaseUrl(true);
		
		$this->renderPartial('index');
	}

	public function actionCetakWord()
	{
		// error_reporting(0);

		// baca file template, yg dipakai
		// $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
		
		// echo "$query";
		// $data['hasil'] = $this->getData();
		// $data['list_kartudata'] = Yii::app()->db->createCommand($query)->queryAll();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_jabong' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'daftar_jabong_reklame.docx';

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

		$NOPOK = $_REQUEST['NOPOK'] ? $_REQUEST['NOPOK'] : "";
		$THP = !empty($_REQUEST['THP']) ? substr($_REQUEST['THP'], -2) : ""; 
		$BLP = !empty($_REQUEST['BLP']) ? $_REQUEST['BLP'] : "";
		$HRP = !empty($_REQUEST['HRP']) ? $_REQUEST['HRP'] : "";
		$KE = !empty($_REQUEST['KE']) ? $_REQUEST['KE'] : "";
		$TREKENINGSUB_KODE = $_REQUEST['TREKENINGSUB_KODE'];
		$THANG1 = !empty($_REQUEST['THANG1']) ? substr($_REQUEST['THANG1'], -2) : "";
		$BLANG1 = !empty($_REQUEST['BLANG1']) ? $_REQUEST['BLANG1'] : "";
		$HRANG1 = !empty($_REQUEST['HRANG1']) ? $_REQUEST['HRANG1'] : "";

		$select = 'TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_NOFORMULIR,
		TBLDAFTAR.TBLDAFTAR_NOPOKL,
		TBLDAFTAR.TBLDAFTAR_GOLONGANL,
		TBLDAFTAR.TBLDAFTAR_NPWPP,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		TBLDAFTREKLAME.*';
		
		$from = 'TBLDAFTREKLAME';
		$filter = array(
			// 'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK'=>$NOPOK,
			'EQ__TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK'=>$THP,
			'EQ__TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK'=>$BLP,
			'EQ__TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK'=>$HRP,
			'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME'=>$KE,
			'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_THNJABONG'=>$THANG1,
			'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_BLNJABONG'=>$BLANG1,
			'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_TGLJABONG'=>$HRANG1
			
			);

		$otherquery = array(
			'leftjoin'=>array('TBLDAFTAR','TBLDAFTAR.TBLDAFTAR_NOPOK=TBLDAFTREKLAME.TBLDAFTAR_NOPOK'),
			);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data['hasil'] = DBFetch::query($arrayConfig);	

		// print_r($data['hasil']);die();

		$dt = array();
		$rows = array();
		
		$totalrpang1 = array('totalrpang1'=>0);  $no=1; foreach ($data['hasil'] as $kolom) :

			$dt['no'] = $no++;
			$dt['npwpd'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d", $kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);
			$dt['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
			$dt['ke'] = $kolom['TBLPENDATAAN_PAJAKKE'];
			$dt['jumlahrekl'] = $kolom['TBLDAFTREKLAME_JMLHREKLAME'];
			$dt['nojab'] = $kolom['TBLDAFTREKLAME_NOJABONG'];
			$dt['pjg'] = floatval($kolom['TBLDAFTREKLAME_PANJANG']);
			$dt['lebar'] = floatval($kolom['TBLDAFTREKLAME_LEBAR']);
			$dt['tlpc'] = $kolom['REFJABONGREKLAME_IDXKESULITAN'];
			$dt['alamat'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
			$dt['ket1'] = $kolom['TBLDAFTREKLAME_KETERANGAN1'];
			$dt['ket2'] = $kolom['TBLDAFTREKLAME_KETERANGAN2'];
			$dt['rpang5'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_HRGDASARJABONG']);
			$dt['rpang1'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_JUMLAHJABONG']);
			$dt['rpang2'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_LISTRIKJABONG']);


			// $totaljumrek['totaljumrek'] += $kolom['TBLDAFTREKLAME_JMLHREKLAME'];
			$totalrpang1['totalrpang1'] += $kolom['TBLDAFTREKLAME_JUMLAHJABONG'];

			// $thnpajak = $kolom['TBLPENDATAAN_THNPAJAK'];
			// $blnpajak = $kolom['TBLPENDATAAN_BLNPAJAK'];
			// $tglpajak = $kolom['TBLPENDATAAN_TGLPAJAK'];

			// $thnentri = $kolom['TBLDAFTREKLAME_THNENTRI'];
			// $tglentri = $kolom['TBLDAFTREKLAME_TGLENTRI'];
			// $blnentri = $kolom['TBLDAFTREKLAME_BLNENTRI'];


		array_push($rows, $dt);

		endforeach;

		$header = array();


		// $header['totrek'] = $totaljumrek['totaljumrek'];
		$header['totalrpang1'] = LokalIndonesia::ribuan($totalrpang1['totalrpang1']);
		$header['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');

		$thn_spt = isset($_REQUEST['THANG1']) && !empty($_REQUEST['THANG1']) ? (int)$_REQUEST['THANG1'] : '';
		$bln_spt = isset($_REQUEST['BLANG1']) && !empty($_REQUEST['BLANG1']) ? (int)$_REQUEST['BLANG1'] : '';
		$tgl_spt = isset($_REQUEST['HRANG1']) && !empty($_REQUEST['HRANG1']) ? (int)$_REQUEST['HRANG1'] : '';

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

		
		$GLOBALS['thnpajak'] = '';
		$GLOBALS['blnpajak'] = '';
		$GLOBALS['tglpajak'] = '';

		$thnpajak = isset($_REQUEST['THP']) && !empty($_REQUEST['THP']) ? (int)$_REQUEST['THP'] : '';
		$blnpajak = isset($_REQUEST['BLP']) && !empty($_REQUEST['BLP']) ? (int)$_REQUEST['BLP'] : '';
		$tglpajak = isset($_REQUEST['HRP']) && !empty($_REQUEST['HRP']) ? (int)$_REQUEST['HRP'] : '';
		$GLOBALS['thnpajak'] = !empty($thnpajak) ? $thnpajak : '';
		$GLOBALS['blnpajak'] = !empty($blnpajak) ? $blnpajak : '';
		$GLOBALS['hrpajak'] = !empty($tglpajak) ? $tglpajak : '';

		// var_dump($header['hasil']);die;
		$GLOBALS['thnentri'] = !empty($thn_spt) ? $thn_spt : '';
		$GLOBALS['blnentri'] = !empty($bln_spt) ? LokalIndonesia::getbulan($bln_spt) : '';
		// $GLOBALS['tglentri'] = $tglentri;
		$GLOBALS['tglentri'] = !empty($tgl_spt) ? $tgl_spt : '';
		// $GLOBALS['cara'] = '';
		// $rek_jenis = !empty($_REQUEST['TREKENINGSUB_KODE']) ? $_REQUEST['TREKENINGSUB_KODE'] : '';
		
		// echo($rek_jenis);die();
			if ($_REQUEST['TREKENINGSUB_KODE']=='T') {
				$GLOBALS['jenis'] = 'Tetap';
			}
			else if ($_REQUEST['TREKENINGSUB_KODE']=='I') {
				$GLOBALS['jenis'] = 'Insidentil';
			}
			else if ($_REQUEST['TREKENINGSUB_KODE']=='B') {
				$GLOBALS['jenis'] = 'Berjalan';
			} else {
				$GLOBALS['jenis'] = 'Lain-Lain';
			}
		

		//SAMPAI SINI QUERYNYAhttps://stackoverflow.com/questions/19263954/opentbs-merge-2-rows-in-word-document-table-simultaneously

		// var_dump($data);
		// echo json_encode($rows);Yii::app()->end();
		// echo json_encode($rows);

		// Merge data in the first sheet 
		// $npwpd = $data['TBLDAFTAR_NOPOK'];
		$namafileDL = "DAFTAR-JABONG-REKLAME.docx";
		$otbs->MergeBlock('dt', $rows); 
		$otbs->MergeField('header', $header); 
		// $otbs->MergeField('setoran', $setoran); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}

	public function actionCetak()
	{
		 // $data['URL_APP'] = Yii::app()->GetBaseUrl(true);

		$NOPOK = $_REQUEST['NOPOK'] ? $_REQUEST['NOPOK'] : "";
		$THP = !empty($_REQUEST['THP']) ? substr($_REQUEST['THP'], -2) : ""; 
		$BLP = !empty($_REQUEST['BLP']) ? $_REQUEST['BLP'] : "";
		$HRP = !empty($_REQUEST['HRP']) ? $_REQUEST['HRP'] : "";
		$KE = !empty($_REQUEST['KE']) ? $_REQUEST['KE'] : "";
		$TREKENINGSUB_KODE = $_REQUEST['TREKENINGSUB_KODE'];
		$THANG1 = !empty($_REQUEST['THANG1']) ? substr($_REQUEST['THANG1'], -2) : "";
		$BLANG1 = !empty($_REQUEST['BLANG1']) ? $_REQUEST['BLANG1'] : "";
		$HRANG1 = !empty($_REQUEST['HRANG1']) ? $_REQUEST['HRANG1'] : "";

		$select = 'TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_NOFORMULIR,
		TBLDAFTAR.TBLDAFTAR_NOPOKL,
		TBLDAFTAR.TBLDAFTAR_GOLONGANL,
		TBLDAFTAR.TBLDAFTAR_NPWPP,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		TBLDAFTREKLAME.*';
		
		$from = 'TBLDAFTREKLAME';
		$filter = array(
			// 'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK'=>$NOPOK,
			'EQ__TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK'=>$THP,
			'EQ__TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK'=>$BLP,
			'EQ__TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK'=>$HRP,
			'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME'=>$KE,
			'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_THNJABONG'=>$THANG1,
			'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_BLNJABONG'=>$BLANG1,
			'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_TGLJABONG'=>$HRANG1
			
			);

		$otherquery = array(
			'leftjoin'=>array('TBLDAFTAR','TBLDAFTAR.TBLDAFTAR_NOPOK=TBLDAFTREKLAME.TBLDAFTAR_NOPOK'),
			);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data['list'] = DBFetch::query($arrayConfig);

		
		$this->renderPartial('cetak',array('data'=>$data));



	}

}