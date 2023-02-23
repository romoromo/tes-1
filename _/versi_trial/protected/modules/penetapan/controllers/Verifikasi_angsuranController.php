<?php

class Verifikasi_angsuranController extends Controller
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
			AND TBLREKENING_REKAYAT IN (1,2,3,7)
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

	public function actionautocompletewp()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');

		$query = trim($_REQUEST['query']);

		$select = 'TBLANGSURAN.TBLDAFTAR_NOPOK, TBLANGSURAN_REKAYAT, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT';
		$from = 'TBLANGSURAN';
		$filter = array(
			'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA' => $query, 'LK__TBLDAFTAR.TBLDAFTAR_NOPOK' => $query
		);

		$filter_AND = array(
			//'EQ__TREKENING_KODE' => '4110100'
			// ,'EQ__tblsubyek_jenisusaha' => $jenisusaha
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			'limit' => 30, 'join' => array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK'), 
			'order' => 'TBLANGSURAN.TBLDAFTAR_NOPOK ASC', 
			'group' => 'TBLANGSURAN.TBLDAFTAR_NOPOK,  TBLANGSURAN_REKAYAT, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT'
		);

		$arrayConfig = array('select' => $select, 'from' => $from, 'filter' => $filter, 'filter_AND' => $filter_AND, 'filterOR' => true, 'otherquery' => $otherquery, 'mode' => 'LIST');
		$results = DBFetch::query($arrayConfig);

		$suggestions = array();

		foreach ($results as $result) {
			$suggestions[] = array(
				"value" => $result['TBLDAFTAR_NOPOK'] . ' | ' . $result['TBLDAFTAR_BADANUSAHANAMA'], "data" => $result['TBLDAFTAR_NOPOK'], "TBLDAFTAR_BADANUSAHANAMA" => $result['TBLDAFTAR_BADANUSAHANAMA'], "TBLDAFTAR_BADANUSAHAALAMAT" => $result['TBLDAFTAR_BADANUSAHAALAMAT'], "TBLDAFTAR_NOPOK" => $result['TBLDAFTAR_NOPOK'], "TBLANGSURAN_REKAYAT" => $result['TBLANGSURAN_REKAYAT']
			);
		}

		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function actioncari()
	{
		$data = array();
		$data['table'] = $this->getData();
		// $data['hasil'] = $this->getData();
		$this->renderPartial('tabel', array('data'=>$data));
	}


	public function getData()
	{
		$namaTBL = '';
		$TBLDAFTAR_NOPOK = Yii::app()->request->getParam('TBLDAFTAR_NOPOK');
		$TBLPENDATAAN_THNPAJAK = substr(Yii::app()->request->getParam('TBLPENDATAAN_THNPAJAK'),2,2);
		$TBLPENDATAAN_BLNPAJAK = Yii::app()->request->getParam('TBLPENDATAAN_BLNPAJAK');
		$TBLANGSURAN_REKAYAT = Yii::app()->request->getParam('TBLANGSURAN_REKAYAT');

		switch ($TBLANGSURAN_REKAYAT ) {
			case '1':
			$namaTBL = 'TBLDAFTHOTEL';
			$AYAT = '1';
			break;
			
			case '2':
			$namaTBL = 'TBLDAFTRMAKAN';
			$AYAT = '2';
			break;
			
			case '3':
			$namaTBL = 'TBLDAFTHIBURAN';
			$AYAT = '3';
			break;
			
			case '7':
			$namaTBL = 'TBLDAFTPARKIR';
			$AYAT = '7';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
		}
		$sql=
		"SELECT * FROM TBLANGSURAN WHERE TBLPENDATAAN_THNPAJAK = ".$TBLPENDATAAN_THNPAJAK." AND TBLPENDATAAN_BLNPAJAK = ".$TBLPENDATAAN_BLNPAJAK." AND TBLDAFTAR_NOPOK = ".$TBLDAFTAR_NOPOK."
		
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
			$header['kopttd']  = "KA. SUB BID PELAYANAN \nPENDAPATAN DAERAH";
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