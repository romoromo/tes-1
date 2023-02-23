<?php

class Cetak_kartudata_nonreklameController extends Controller
{
	public function actionIndex()
	{
		$data['list_kecamatan'] = Yii::app()->db->createCommand()->select()->from('REFKECAMATAN')->queryAll();
		$data['rek'] = Yii::app()->db->createCommand('
			SELECT
			*
			FROM
			TBLREKENING
			WHERE
			TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			AND TBLREKENING_REKAYAT = 8
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

	public function actionCetak()
	{
		$data = array();

		$tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$blnpjk = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
		$data['tahunpajak'] = '20' . ($tahunpjk<10 ? '0'.$tahunpjk : $tahunpjk);
		$data['bulanpajak'] = $blnpjk!=0 ? LokalIndonesia::getBulan($blnpjk) : '';

		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '4.1.1.1.0':
			$namaTBL = 'TBLDAFTHOTEL';
			$AYAT = '1';
			$NAMAREK = 'PAJAK HOTEL';
			break;
			
			case '4.1.1.2.0':
			$namaTBL = 'TBLDAFTRMAKAN';
			$AYAT = '2';
			$NAMAREK = 'PAJAK RESTORAN';
			break;
			
			case '4.1.1.3.0':
			$namaTBL = 'TBLDAFTHIBURAN';
			$AYAT = '3';
			$NAMAREK = 'PAJAK HIBURAN';
			break;
			
			case '4.1.1.4.0':
			$namaTBL = 'TBLDAFTREKLAME';
			$AYAT = '4';
			$NAMAREK = 'PAJAK REKLAME';
			break;

			case '4.1.1.5.0':
			$namaTBL = 'TBLDAFTPJU';
			$AYAT = '5';
			$NAMAREK = 'PAJAK PJU';
			break;
			
			case '4.1.1.7.0':
			$namaTBL = 'TBLDAFTPARKIR';
			$AYAT = '7';
			$NAMAREK = 'PAJAK PARKIR';
			break;
			
			case '4.1.1.8.0':
			$namaTBL = 'TBLDAFTTANAH';
			$AYAT = '8';
			$NAMAREK = 'PAJAK AIR TANAH';
			break;
			
			case '4.1.1.9.0':
			$namaTBL = 'TBLDAFTBURUNG';
			$AYAT = '9';
			$NAMAREK = 'PAJAK SARANG BURUNG WALET';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			$NAMAREK = 'PAJAK HOTEL';
			break;
		}

		if ($namaTBL=='TBLDAFTHOTEL') {
			$data['namatbl'] = $namaTBL;
			$data['namarek'] = $NAMAREK;
			$data['laporan'] = $this->getData();
			$this->renderPartial('cetak_hotel', array('data'=>$data));
		}

		$data['namatbl'] = $namaTBL;
		$data['namarek'] = $NAMAREK;
		$data['laporan'] = $this->getData();
		$this->renderPartial('cetak', array('data'=>$data));
	}

	public function actioncari()
	{
		$data = array();

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

			case '4.1.1.5.0':
			$namaTBL = 'TBLDAFTPJU';
			$AYAT = '5';
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

			case '4.1.1.11.0':
			$namaTBL = 'TBLDAFTBPHTB';
			$AYAT = '11';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
		}

		$data['namatbl'] = $namaTBL;
		$data['table'] = $this->getData();
		/*$data['hasil'] = $this->getData();*/
		$this->renderPartial('tabel', array('data'=>$data));
	}

	public function actionCetakWord()
	{
		// error_reporting(0);

		// baca file template, yg dipakai
		// $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
		
		// echo "$query";
		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '4.1.1.1.0':
			$namaTBL = 'TBLDAFTHOTEL';
			$AYAT = '1';
			$AYAT_NAMA = 'PAJAK HOTEL';
			break;
			
			case '4.1.1.2.0':
			$namaTBL = 'TBLDAFTRMAKAN';
			$AYAT = '2';
			$AYAT_NAMA = 'PAJAK RESTORAN';
			break;
			
			case '4.1.1.3.0':
			$namaTBL = 'TBLDAFTHIBURAN';
			$AYAT = '3';
			$AYAT_NAMA = 'PAJAK HIBURAN';
			break;
			
			case '4.1.1.4.0':
			$namaTBL = 'TBLDAFTREKLAME';
			$AYAT = '4';
			$AYAT_NAMA = 'PAJAK REKLAME';
			break;

			case '4.1.1.5.0':
			$namaTBL = 'TBLDAFTPJU';
			$AYAT = '5';
			$AYAT_NAMA = 'PAJAK PJU';
			break;
			
			case '4.1.1.7.0':
			$namaTBL = 'TBLDAFTPARKIR';
			$AYAT = '7';
			$AYAT_NAMA = 'PAJAK PARKIR';
			break;
			
			case '4.1.1.8.0':
			$namaTBL = 'TBLDAFTTANAH';
			$AYAT = '8';
			$AYAT_NAMA = 'PAJAK AIR TANAH';
			break;
			
			case '4.1.1.9.0':
			$namaTBL = 'TBLDAFTBURUNG';
			$AYAT = '9';
			$AYAT_NAMA = 'PAJAK SARANG BURUNG WALET';
			break;

			case '4.1.1.11.0':
			$namaTBL = 'TBLDAFTBPHTB';
			$AYAT = '11';
			$AYAT_NAMA = 'PAJAK BPHTB';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
				}

				$tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
				$bulanpjk = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
				$tglpjk = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
				$kecamatan = isset($_REQUEST['TBLKECAMATAN_ID']) && !empty($_REQUEST['TBLKECAMATAN_ID']) ? (int)$_REQUEST['TBLKECAMATAN_ID'] : "''";

				$tahunsptpd = isset($_REQUEST['ENTRI_THNPAJAK']) && !empty($_REQUEST['ENTRI_THNPAJAK']) ? (int)$_REQUEST['ENTRI_THNPAJAK'] :'';
				$bulansptpd = isset($_REQUEST['ENTRI_BLNPAJAK']) && !empty($_REQUEST['ENTRI_BLNPAJAK']) ?(int)$_REQUEST['ENTRI_BLNPAJAK'] :'';
				$tanggalsptpd = isset($_REQUEST['ENTRI_TGLPAJAK']) && !empty($_REQUEST['ENTRI_TGLPAJAK']) ? (int)$_REQUEST['ENTRI_TGLPAJAK'] :'';
				
				$wherethnpajak = $tahunpjk!=0 ? (' AND TBLPENDATAAN_THNPAJAK='.$tahunpjk) : '';
				$whereblnpajak = $bulanpjk!=0 ? (' AND TBLPENDATAAN_BLNPAJAK='.$bulanpjk) : '';
				$wheretglpajak = $tglpjk!=0 ? (' AND TBLPENDATAAN_TGLPAJAK='.$tglpjk) : '';

				$wheretahunsptpd = $tahunsptpd!=0 ? (' AND '.$namaTBL.'_THNENTRI='.$tahunsptpd) : '';
				$wherebulansptpd = $bulansptpd!=0 ? (' AND '.$namaTBL.'_BLNENTRI='.$bulansptpd) : '';
				// $wheretanggalsptpd = $tanggalsptpd!=0 ? (' AND '.$namaTBL.'_TGLENTRI='.$tanggalsptpd) : '';
				if ($_REQUEST['ENTRI_TGLPAJAK']=='') {
					$wheretanggalsptpd = '';
				} else {
					$wheretanggalsptpd = (' AND '.$namaTBL.'_TGLENTRI='.$_REQUEST['ENTRI_TGLPAJAK']);
				}

				$ISONLINE = $_REQUEST['ISONLINE'] ? $_REQUEST['ISONLINE'] : 'X';
				if ($ISONLINE=='T') {
					$WHEREISONLINE = (" AND KDCARABYR LIKE 'ONLINE        '") ? (" AND KDCARABYR = 'ONLINE        '") : "";
				} elseif ($ISONLINE=='F') {
					$WHEREISONLINE = (" AND KDCARABYR LIKE 'OFFLINE        '") ? (" AND KDCARABYR = 'OFFLINE        '") : "";
				} else {
					$WHEREISONLINE = "";
				}

				
				$KODE = isset($_REQUEST['KODE_JENIS']) && !empty($_REQUEST['KODE_JENIS']) ? $_REQUEST['KODE_JENIS'] :'';

				if ($KODE=='T') {
					$wherejenis = (' AND NVL(TBLPENDATAAN_TGLPAJAK,0)  = 0');
				} else if($KODE=='I') {
					$wherejenis = (' AND NVL(TBLPENDATAAN_TGLPAJAK,0)  <> 0');
				} else {
					$wherejenis = '';
				}

				if ($AYAT == '8') {
					$totalvolume = 'TBLDAFTTANAH_TOTALVOLUME,';
				} else {
					$totalvolume = '';
				}

				
		$data['hasil'] = $this->getData();

		$sql2="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 9";
		$sql3="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 4";	
		$sql4="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 5";
		$sql5="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 14";	

		$data['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();
		$data['jab3'] = Yii::app()->db->createCommand($sql3)->queryRow();
		$data['jab4'] = Yii::app()->db->createCommand($sql4)->queryRow();
		$data['jab5'] = Yii::app()->db->createCommand($sql5)->queryRow();

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

			case '4.1.1.5.0':
			$namaTBL = 'TBLDAFTPJU';
			$AYAT = '5';
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

			case '4.1.1.11.0':
			$namaTBL = 'TBLDAFTBPHTB';
			$AYAT = '11';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
		}

		// $data['list_kartudata'] = Yii::app()->db->createCommand($query)->queryAll();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_kartudata' . DIRECTORY_SEPARATOR;

		if ($AYAT=='8') {
			$namatpl = $path_tpl . 'kartudata-airtanah-npa.docx';
		} else {
			$namatpl = $path_tpl . 'kartudata-nonreklame.docx';
		}

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
		
		// $totaljumrek = array('totaljumrek'=>0); 
		$total = array('total'=>0); $no=1; foreach ($data['hasil'] as $kolom) :

			$dt['no'] = $no++;
			$dt['nopok'] = $kolom['TBLDAFTAR_NOPOK'];
			$dt['noskp'] = $kolom['TBLDAFTAR_GOLONGAN'];
			$dt['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
			if ($AYAT=='11') {
				$dt['namabadan'] = $kolom['TBLDAFTAR_PEMILIKNAMA'];
			} else {
				$dt['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
			}

			$dt['kec'] = $kolom['TBLKECAMATAN_IDBADANUSAHA'];
			$dt['kel'] = $kolom['TBLKELURAHAN_IDBADANUSAHA'];

			$dt['jen'] = $kolom[''.$namaTBL.'_REKJENIS'];

			$dt['thspt'] = '20'.$kolom[''.$namaTBL.'_THNENTRI'];
			$dt['blspt'] = sprintf("%02d",$kolom[''.$namaTBL.'_BLNENTRI']);
			$dt['tglspt'] = sprintf("%02d",$kolom[''.$namaTBL.'_TGLENTRI']);

			$dt['npa'] = LokalIndonesia::ribuan($kolom['NPA']);

			if ($AYAT=='8') {
				$dt['vol'] = $kolom['VOL'];
			} else {
				$dt['vol'] = '';
			} 

			$dt['pajak'] = LokalIndonesia::ribuan($kolom['PAJAK']);

			if ($AYAT=='8') {
				$total['total'] += $kolom['PAJAK'];
			} else {
				$total['total'] += $kolom[''.$namaTBL.'_OMSETPAJAK'];
			}

			$thnpajak = $kolom['TBLPENDATAAN_THNPAJAK'];
			$blnpajak = $kolom['TBLPENDATAAN_BLNPAJAK'];
			$tglpajak = $kolom['TBLPENDATAAN_TGLPAJAK'];

			// $thnentri = $kolom['TBLDAFTREKLAME_THNENTRI'];
			// $tglentri = $kolom['TBLDAFTREKLAME_TGLENTRI'];
			// $blnentri = $kolom['TBLDAFTREKLAME_BLNENTRI'];

			$dt['namarek'] = $kolom['NMREKENING'];
			$rek = $kolom['NMREKENING'];

			// $dt['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_PAJAK']);

			$dt['thnpajak'] = $kolom['TBLPENDATAAN_THNPAJAK'];
			$dt['blnpajak'] = $kolom['TBLPENDATAAN_BLNPAJAK'];
			$dt['tglpajak'] = $kolom['TBLPENDATAAN_TGLPAJAK'];

			// $dt['npwpd'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d", $kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);
			$dt['npwpd'] = sprintf("%07d", $kolom['TBLDAFTAR_NOPOK']);

		array_push($rows, $dt);

		endforeach;

		$header = array();

		$header['total'] = LokalIndonesia::ribuan($total['total']);
		$header['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');

		$header['jabatan1'] = $data['jab2']['TBLPEJABAT_URAIAN'];
		$header['jabatan2'] = $data['jab3']['TBLPEJABAT_URAIAN'];
		$header['jabatan3'] = $data['jab4']['TBLPEJABAT_URAIAN'];
		$header['jabatan4'] = $data['jab5']['TBLPEJABAT_URAIAN'];

		$header['nama1'] = $data['jab2']['TBLPEJABAT_NAMA'];
		$header['nama2'] = $data['jab3']['TBLPEJABAT_NAMA'];
		$header['nama3'] = $data['jab4']['TBLPEJABAT_NAMA'];
		$header['nama4'] = $data['jab5']['TBLPEJABAT_NAMA'];

		$header['nip1'] = $data['jab2']['TBLPEJABAT_NIP'];
		$header['nip2'] = $data['jab3']['TBLPEJABAT_NIP'];
		$header['nip3'] = $data['jab4']['TBLPEJABAT_NIP'];
		$header['nip4'] = $data['jab5']['TBLPEJABAT_NIP'];

		$thn_spt = isset($_REQUEST['ENTRI_THNPAJAK']) && !empty($_REQUEST['ENTRI_THNPAJAK']) ? (int)$_REQUEST['ENTRI_THNPAJAK'] : '';
		$bln_spt = isset($_REQUEST['ENTRI_BLNPAJAK']) && !empty($_REQUEST['ENTRI_BLNPAJAK']) ? (int)$_REQUEST['ENTRI_BLNPAJAK'] : '';
		$tgl_spt = isset($_REQUEST['ENTRI_TGLPAJAK']) && !empty($_REQUEST['ENTRI_TGLPAJAK']) ? (int)$_REQUEST['ENTRI_TGLPAJAK'] : '';
		
		$GLOBALS['thnpajak'] = '';
		$GLOBALS['blnpajak'] = '';
		$GLOBALS['tglpajak'] = '';

		$thnpajak = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$blnpajak = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
		$tglpajak = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
		$GLOBALS['thnpajak'] = !empty($thnpajak) ? $thnpajak : '';
		$GLOBALS['blnpajak'] = !empty($blnpajak) ? $blnpajak : '';
		$GLOBALS['tglpajak'] = !empty($tglpajak) ? $tglpajak : '';

		// var_dump($header['hasil']);die;
		$GLOBALS['thnentri'] = $thn_spt;
		$GLOBALS['blnentri'] = $bln_spt;
		// $GLOBALS['tglentri'] = $tglentri;
		$GLOBALS['tglentri'] = $tgl_spt;
		$GLOBALS['cara'] = '';
		$GLOBALS['namarek'] = $AYAT_NAMA;

		//SAMPAI SINI QUERYNYA

		// var_dump($data);
		// echo json_encode($data);Yii::app()->end();
		// echo json_encode($row);

		// Merge data in the first sheet 
		// $npwpd = $data['TBLDAFTAR_NOPOK'];
		$namafileDL = "KARTUDATA-AIRTANAH.docx";
		$otbs->MergeBlock('dt', $rows); 
		$otbs->MergeField('header', $header); 
		// $otbs->MergeField('setoran', $setoran); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}


	public function getData()
	{
		// $namaTBL = '';
		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '4.1.1.1.0':
			$namaTBL = 'TBLDAFTHOTEL';
			$AYAT = '1';
			$AYAT_NAMA = 'PAJAK HOTEL';
			break;
			
			case '4.1.1.2.0':
			$namaTBL = 'TBLDAFTRMAKAN';
			$AYAT = '2';
			$AYAT_NAMA = 'PAJAK RESTORAN';
			break;
			
			case '4.1.1.3.0':
			$namaTBL = 'TBLDAFTHIBURAN';
			$AYAT = '3';
			$AYAT_NAMA = 'PAJAK HIBURAN';
			break;
			
			case '4.1.1.4.0':
			$namaTBL = 'TBLDAFTREKLAME';
			$AYAT = '4';
			$AYAT_NAMA = 'PAJAK REKLAME';
			break;

			case '4.1.1.5.0':
			$namaTBL = 'TBLDAFTPJU';
			$AYAT = '5';
			$AYAT_NAMA = 'PAJAK PJU';
			break;
			
			case '4.1.1.7.0':
			$namaTBL = 'TBLDAFTPARKIR';
			$AYAT = '7';
			$AYAT_NAMA = 'PAJAK PARKIR';
			break;
			
			case '4.1.1.8.0':
			$namaTBL = 'TBLDAFTTANAH';
			$AYAT = '8';
			$AYAT_NAMA = 'PAJAK AIR TANAH';
			break;
			
			case '4.1.1.9.0':
			$namaTBL = 'TBLDAFTBURUNG';
			$AYAT = '9';
			$AYAT_NAMA = 'PAJAK SARANG BURUNG WALET';
			break;

			case '4.1.1.11.0':
			$namaTBL = 'TBLDAFTBPHTB';
			$AYAT = '11';
			$AYAT_NAMA = 'PAJAK BPHTB';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
		}

		$tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$bulanpjk = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
		$tglpjk = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
		$kecamatan = isset($_REQUEST['TBLKECAMATAN_ID']) && !empty($_REQUEST['TBLKECAMATAN_ID']) ? (int)$_REQUEST['TBLKECAMATAN_ID'] : "''";

		$tahunsptpd = isset($_REQUEST['ENTRI_THNPAJAK']) && !empty($_REQUEST['ENTRI_THNPAJAK']) ? (int)$_REQUEST['ENTRI_THNPAJAK'] :'';
		$bulansptpd = isset($_REQUEST['ENTRI_BLNPAJAK']) && !empty($_REQUEST['ENTRI_BLNPAJAK']) ?(int)$_REQUEST['ENTRI_BLNPAJAK'] :'';
		$tanggalsptpd = $_REQUEST['ENTRI_TGLPAJAK'] ? (int)$_REQUEST['ENTRI_TGLPAJAK'] :'';
		
		$wherethnpajak = $tahunpjk!=0 ? (' AND TBLPENDATAAN_THNPAJAK='.substr($tahunpjk, -2)) : '';
		$whereblnpajak = $bulanpjk!=0 ? (' AND TBLPENDATAAN_BLNPAJAK='.$bulanpjk) : '';
		$wheretglpajak = $tglpjk!=0 ? (' AND TBLPENDATAAN_TGLPAJAK='.$tglpjk) : '';
		
		$KODE = isset($_REQUEST['KODE_JENIS']) && !empty($_REQUEST['KODE_JENIS']) ? $_REQUEST['KODE_JENIS'] :'';

		if ($KODE=='T') {
			$wherejenis = (' AND NVL(TBLPENDATAAN_TGLPAJAK,0)  = 0');
		} else if($KODE=='I') {
			$wherejenis = (' AND NVL(TBLPENDATAAN_TGLPAJAK,0)  <> 0');
		} else {
			$wherejenis = '';
		}

		$ISONLINE = $_REQUEST['ISONLINE'] ? $_REQUEST['ISONLINE'] : 'X';
		if ($ISONLINE=='T') {
			$WHEREISONLINE = (" AND KDCARABYR LIKE 'ONLINE        '") ? (" AND KDCARABYR = 'ONLINE        '") : "";
		} elseif ($ISONLINE=='F') {
			$WHEREISONLINE = (" AND KDCARABYR LIKE 'OFFLINE        '") ? (" AND KDCARABYR = 'OFFLINE        '") : "";
		} else {
			$WHEREISONLINE = "";
		}

		$wheretahunsptpd = $tahunsptpd!=0 ? (' AND '.$namaTBL.'_THNSKPD='.$tahunsptpd) : '';
		$wherebulansptpd = $bulansptpd!=0 ? (' AND '.$namaTBL.'_BLNSKPD='.$bulansptpd) : '';
		// $wheretanggalsptpd = (' AND '.$namaTBL.'_TGLENTRI='.$_REQUEST['ENTRI_TGLPAJAK']) ? (' AND '.$namaTBL.'_TGLENTRI='.$_REQUEST['ENTRI_TGLPAJAK']) : '';
		if ($_REQUEST['ENTRI_TGLPAJAK']=='') {
			$wheretanggalsptpd = '';
		} else {
			$wheretanggalsptpd = (' AND '.$namaTBL.'_TGLSKPD='.$_REQUEST['ENTRI_TGLPAJAK']);
		}
		// $rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		// switch ( $rek ) {
		// 	case '4.1.1.1.0':
		// 	$namaTBL = 'TBLDAFTHOTEL';
		// 	$AYAT = '1';
		// 	break;
			
		// 	case '4.1.1.2.0':
		// 	$namaTBL = 'TBLDAFTRMAKAN';
		// 	$AYAT = '2';
		// 	break;
			
		// 	case '4.1.1.3.0':
		// 	$namaTBL = 'TBLDAFTHIBURAN';
		// 	$AYAT = '3';
		// 	break;
			
		// 	case '4.1.1.4.0':
		// 	$namaTBL = 'TBLDAFTREKLAME';
		// 	$AYAT = '4';
		// 	break;
			
		// 	case '4.1.1.7.0':
		// 	$namaTBL = 'TBLDAFTPARKIR';
		// 	$AYAT = '7';
		// 	break;
			
		// 	case '4.1.1.8.0':
		// 	$namaTBL = 'TBLDAFTTANAH';
		// 	$AYAT = '8';
		// 	break;
			
		// 	case '4.1.1.9.0':
		// 	$namaTBL = 'TBLDAFTBURUNG';
		// 	$AYAT = '9';
		// 	break;
			
		// 	default:
		// 	$namaTBL = 'TBLDAFTHOTEL';
		// 	break;
		// }
		$sql="SELECT
		(
			SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING
			FROM
			TBLREKENING
			WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = ".$namaTBL.".".$namaTBL ."_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = ".$namaTBL.".".$namaTBL ."_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = ".$namaTBL.".".$namaTBL ."_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = ".$namaTBL.".".$namaTBL ."_REKAYAT
			AND TBLREKENING.TBLREKENING_REKJENIS = ".$namaTBL.".".$namaTBL ."_REKJENIS
			) AS NMREKENING,
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			".$namaTBL.".TBLKECAMATAN_ID,
			".$namaTBL.".TBLKELURAHAN_ID,
			".$namaTBL ."_REKJENIS,
			TBLPENDATAAN_THNPAJAK,
			TBLPENDATAAN_BLNPAJAK,
			TBLPENDATAAN_TGLPAJAK,
			TBLPENDATAAN_PAJAKKE,
			".$namaTBL ."_NILAIAIR1 AS NPA,
			".$namaTBL ."_TOTALVOLUME AS VOL,
			".$namaTBL ."_PAJAK AS PAJAK,
			".$namaTBL ."_THNSPTPD,
			".$namaTBL ."_BLNSPTPD,
			".$namaTBL ."_TGLSPTPD,
			".$namaTBL ."_THNENTRI,
			".$namaTBL ."_BLNENTRI,
			".$namaTBL ."_TGLENTRI
			FROM
			TBLDAFTAR
			INNER JOIN $namaTBL ON TBLDAFTAR.TBLDAFTAR_NOPOK = $namaTBL.TBLDAFTAR_NOPOK
			WHERE
			TBLDAFTAR.tbldaftar_badanusahanama IS NOT NULL
			AND TBLDAFTAR.TBLDAFTAR_NOPOK != 151000
			AND ".$namaTBL ."_rekpendapatan = 4
			AND ".$namaTBL ."_REKPAD = 1
			AND ".$namaTBL ."_REKPAJAK = 1
			AND ".$namaTBL ."_REKAYAT = $AYAT
			
			" . $wherethnpajak . "
			" . $whereblnpajak . "
			" . $wheretglpajak . "
			" . $wherejenis . "
			" . $WHEREISONLINE . "
			
			
			" .$wheretahunsptpd. "
			" .$wherebulansptpd. "
			" .$wheretanggalsptpd. "
			
			ORDER BY
			TBLKECAMATAN_IDBADANUSAHA,
			TBLKELURAHAN_IDBADANUSAHA,
			".$namaTBL.".TBLDAFTAR_NOPOK,
			".$namaTBL.".TBLPENDATAAN_PAJAKKE,
			".$namaTBL.".".$namaTBL."_PAJAK
			";
			return $data = Yii::app()->db->createCommand( $sql )->queryAll();
			
	}

	public function actionGrafik()
	{
		$data['param'] = $param = Yii::app()->request->getParam('param', array());
		$data['grafik'] = Yii::app()->request->getParam('grafik', '');
		$data['data'] = Yii::app()->request->getParam('data', '');

		$year = substr($param['TBLPENDATAAN_THNPAJAK'], -2);
		$paramdata = CJSON::decode(base64_decode($data['data']));
		$nopok = $paramdata['TBLDAFTAR_NOPOK'];
		if ($data['grafik'] == 'npa') {
			$data['npa'] = Yii::app()->db->createCommand()
			->select("TBLDAFTAR_NOPOK, TBLDAFTTANAH_NILAIAIR1, TBLPENDATAAN_THNPAJAK, TBLPENDATAAN_BLNPAJAK")
			->from('TBLDAFTTANAH TNH')
			->where("TNH.TBLPENDATAAN_THNPAJAK=:year
			AND TBLDAFTAR_NOPOK=:nopok", array(':year' => $year, ':nopok' => $nopok ))
			->queryAll();
		} elseif ($data['grafik'] == 'volume') {
			$data['volume'] = Yii::app()->db->createCommand()
			->select("TBLDAFTAR_NOPOK, TBLDAFTTANAH_TOTALVOLUME, TBLPENDATAAN_THNPAJAK, TBLPENDATAAN_BLNPAJAK")
			->from('TBLDAFTTANAH TNH')
			->where("TNH.TBLPENDATAAN_THNPAJAK=:year
			AND TBLDAFTAR_NOPOK=:nopok", array(':year' => $year, ':nopok' => $nopok ))
			->queryAll();
		}
		$this->renderPartial('grafik', array('data' => $data));
	}

	public function actionVerifikasi()
	{
		$data['param'] = $param = Yii::app()->request->getParam('param', array());
		$data['grafik'] = Yii::app()->request->getParam('grafik', '');
		$data['data'] = Yii::app()->request->getParam('data', '');

		$year = substr($param['TBLPENDATAAN_THNPAJAK'], -2);
		$paramdata = CJSON::decode(base64_decode($data['data']));
		$nopok = $paramdata['TBLDAFTAR_NOPOK'];
		$bulan = (int)$paramdata['TBLPENDATAAN_BLNPAJAK'];
		$ke = (int)$paramdata['TBLPENDATAAN_PAJAKKE'];
		$update = Yii::app()->db->createCommand()
		->update("TBLDAFTTANAH", 
			array(
				'TBLDAFTTANAH_STATUSDATA' => '2',
				'TBLDAFTTANAH_IDVERIF' => Yii::app()->user->getId(),
				'TBLDAFTTANAH_TGLVERIF' => new CDbExpression("to_date('".date('Y-m-d H:i:s')."','yyyy-mm-dd hh24:mi:ss')"),
			), 
			'TBLPENDATAAN_THNPAJAK=:year
			AND TBLPENDATAAN_BLNPAJAK=:bulan
			AND NVL(TBLPENDATAAN_PAJAKKE, 0)=:ke
			AND TBLDAFTAR_NOPOK=:nopok
			', 
			array(':year' => $year, ':bulan' => $bulan, ':ke' => $ke, ':nopok' => $nopok, )
		);

		echo CJSON::encode(array('status' => 'success', 'update' => $update, ));
	}

	public function actionKembalikan()
	{
		$data['param'] = $param = Yii::app()->request->getParam('param', array());
		$data['grafik'] = Yii::app()->request->getParam('grafik', '');
		$data['data'] = Yii::app()->request->getParam('data', '');

		$year = substr($param['TBLPENDATAAN_THNPAJAK'], -2);
		$paramdata = CJSON::decode(base64_decode($data['data']));
		$nopok = $paramdata['TBLDAFTAR_NOPOK'];
		$bulan = (int)$paramdata['TBLPENDATAAN_BLNPAJAK'];
		$ke = (int)$paramdata['TBLPENDATAAN_PAJAKKE'];
		/* 
		 SET TBLDAFTTANAH_STATUSDATA = '0',
		TBLDAFTTANAH_IDVERIF = session pengguna
		 */
		$update = Yii::app()->db->createCommand()
		->update("TBLDAFTTANAH", 
			array(
				'TBLDAFTTANAH_STATUSDATA' => '0',
				'TBLDAFTTANAH_IDVERIF' => Yii::app()->user->getId(),
			), 
			'TBLPENDATAAN_THNPAJAK=:year
			AND TBLPENDATAAN_BLNPAJAK=:bulan
			AND NVL(TBLPENDATAAN_PAJAKKE, 0)=:ke
			AND TBLDAFTAR_NOPOK=:nopok
			', 
			array(':year' => $year, ':bulan' => $bulan, ':ke' => $ke, ':nopok' => $nopok, )
		);

		echo CJSON::encode(array('status' => 'success', 'update' => $update, ));
	}
}