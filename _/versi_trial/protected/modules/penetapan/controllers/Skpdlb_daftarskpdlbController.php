<?php

class Skpdlb_daftarskpdlbController extends Controller
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
			AND (TBLREKENING_REKAYAT = 1
			OR TBLREKENING_REKAYAT = 2
			OR TBLREKENING_REKAYAT = 3
			OR TBLREKENING_REKAYAT = 7
			OR TBLREKENING_REKAYAT = 8
			OR TBLREKENING_REKAYAT = 11)
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			')->queryAll();
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionCetak()
	{
		$TBLREKENING_KODE = isset($_REQUEST['TBLREKENING_KODE']) && !empty($_REQUEST['TBLREKENING_KODE']) ? $_REQUEST['TBLREKENING_KODE'] : '';
		$TBLPENDATAAN_THNPAJAK = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
		$TAHUNNIHIL = Yii::app()->request->getParam('TAHUNNIHIL', '');
		$BULANNIHIL = Yii::app()->request->getParam('BULANNIHIL', '');
		$TANGGLNIHIL = Yii::app()->request->getParam('TANGGLNIHIL', '');
		$TGLCETAKAWAL = isset($_REQUEST['TGLCETAKAWAL']) && strtotime($_REQUEST['TGLCETAKAWAL']) ? date('Y-m-d', strtotime($_REQUEST['TGLCETAKAWAL'])) : date('Y-m-d');
		$TGLCETAKAKHIR = isset($_REQUEST['TGLCETAKAKHIR']) && strtotime($_REQUEST['TGLCETAKAKHIR']) ? date('Y-m-d', strtotime($_REQUEST['TGLCETAKAKHIR'])) : date('Y-m-d');

		if ($TBLREKENING_KODE=='4.1.1.1.0') {
			$NAMATABEL = 'TBLDAFTHOTEL';
			$NAMAPAJAK = 'PAJAK HOTEL';
			$NAKB = 'KENAIKANKRGBAYAR';
		} else if ($TBLREKENING_KODE=='4.1.1.2.0') {
			$NAMATABEL = 'TBLDAFTRMAKAN';
			$NAMAPAJAK = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
		} else if ($TBLREKENING_KODE=='4.1.1.3.0') {
			$NAMATABEL = 'TBLDAFTHIBURAN';
			$NAMAPAJAK = 'PAJAK HIBURAN';
			$NAKB = 'NAKB';
		} else if ($TBLREKENING_KODE=='4.1.1.4.0') {
			$NAMATABEL = 'TBLDAFTREKLAME';
			$NAMAPAJAK = 'PAJAK REKLAME';
			$NAKB = 'NAKB';
		} else if ($TBLREKENING_KODE=='4.1.1.7.0') {
			$NAMATABEL = 'TBLDAFTPARKIR';
			$NAMAPAJAK = 'PAJAK PARKIR';
			$NAKB = 'NAKB';
		} else if ($TBLREKENING_KODE=='4.1.1.8.0') {
			$NAMATABEL = 'TBLDAFTTANAH';
			$NAMAPAJAK = 'PAJAK AIR TANAH';
			$NAKB = 'NAKB';
		} else if ($TBLREKENING_KODE=='4.1.1.9.0') {
			$NAMATABEL = 'TBLDAFTBURUNG';
			$NAMAPAJAK = 'PAJAK SARANG WALET';
			$NAKB = 'NAKB';
		} else {

		}
		$NAMATABEL = 'TBLLBHBAYAR';
		if($TBLPENDATAAN_THNPAJAK==''){
			$tahunpjk = "";
		}
		else{
			$tahunpjk = "AND ".$NAMATABEL.".TBLPENDATAAN_THNPAJAK = ".$TBLPENDATAAN_THNPAJAK."";
		};

		
		// {$NAMATABEL}.TBLDAFTAR_JNSPENDAPATAN AS TBLDAFTAR_JENISPENDAPATAN,
		$RANGE = "
		AND
		TO_DATE(
		NVL({$NAMATABEL}_THNLEBIHBAYAR,99) 
		|| '-' || NVL({$NAMATABEL}_BLNLEBIHBAYAR,01) 
		|| '-' || NVL({$NAMATABEL}_TGLLEBIHBAYAR,01)
		,  'YY-MM-DD'
		)
		BETWEEN TO_DATE('{$TGLCETAKAWAL}', 'YYYY-MM-DD') AND TO_DATE('{$TGLCETAKAKHIR}', 'YYYY-MM-DD')
		";

		$sql = "
		SELECT
		(
		SELECT
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = {$NAMATABEL}.TBLDAFTAR_NOPOK
		) AS TBLDAFTAR_BADANUSAHANAMA,
		(
		SELECT
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = {$NAMATABEL}.TBLDAFTAR_NOPOK
		) AS TBLDAFTAR_BADANUSAHAALAMAT,
		(
		SELECT
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = {$NAMATABEL}.TBLDAFTAR_NOPOK
		) AS TBLKECAMATAN_IDBADANUSAHA,
		(
		SELECT
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = {$NAMATABEL}.TBLDAFTAR_NOPOK
		) AS TBLKELURAHAN_IDBADANUSAHA,
		{$NAMATABEL}.TBLDAFTAR_NOPOK,
		{$NAMATABEL}.TBLDAFTAR_GOLONGAN,
		{$NAMATABEL}.TBLPENDATAAN_THNPAJAK,
		{$NAMATABEL}.TBLPENDATAAN_BLNPAJAK,
		{$NAMATABEL}.TBLPENDATAAN_TGLPAJAK,
		{$NAMATABEL}.{$NAMATABEL}_THNLEBIHBAYAR,
		{$NAMATABEL}.{$NAMATABEL}_TGLLEBIHBAYAR,
		{$NAMATABEL}.{$NAMATABEL}_BLNLEBIHBAYAR,
		-- {$NAMATABEL}.{$NAMATABEL}_RUPIAHSETOR,
		NVL({$NAMATABEL}.REFLEBIHBAYAR_TERBAYAR, 0) AS REFLEBIHBAYAR_TERBAYAR,
		NVL({$NAMATABEL}.{$NAMATABEL}_REGLEBIHBAYAR, 0) AS {$NAMATABEL}_REGLEBIHBAYAR,
		NVL({$NAMATABEL}.{$NAMATABEL}_PAJAKPERIKSA, 0) AS {$NAMATABEL}_PAJAKPERIKSA
		FROM
		{$NAMATABEL}
		WHERE
		NVL({$NAMATABEL}_REGLEBIHBAYAR,0)>0
		AND	NVL({$NAMATABEL}_BLNLEBIHBAYAR,0)>0
		{$tahunpjk}
		{$RANGE}

		ORDER BY TO_NUMBER(TO_CHAR(NVL({$NAMATABEL}_REGLEBIHBAYAR,0)))
		";

        // $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
        // $data['cetak'] = DBFetch::query($arrayConfig);
        $data['cetak'] = Yii::app()->db->createCommand( $sql )->queryAll();
        $data['namatabel'] = $NAMATABEL;
        $data['namapajak'] = $NAMAPAJAK;
        $data['thnpndataanpajak'] = $TBLPENDATAAN_THNPAJAK;

        $sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 6";
        $sql2="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 32";

		$data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();
		$data['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();
		// echo $sql;exit;

		// $data['rek'] = Yii::app()->db->createCommand( $sql )->queryAll();
		header('Content-Type: application/excel');
		header("Content-Disposition: attachment;Filename=Cetak_Daftar_SKPD_Nihil.xls");

		// $this->renderPartial('cetak-daftar-skpdkb', array('data'=>$data));
		$this->renderPartial('cetak', array('data'=>$data));
	}

	public function actionCetakWord()
	{
		$TBLREKENING_KODE = isset($_REQUEST['TBLREKENING_KODE']) && !empty($_REQUEST['TBLREKENING_KODE']) ? $_REQUEST['TBLREKENING_KODE'] : '';
		$TBLPENDATAAN_THNPAJAK = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2): '';
		$THNKURANGBAYAR = isset($_REQUEST['THNKURANGBAYAR']) && !empty($_REQUEST['THNKURANGBAYAR']) ? $_REQUEST['THNKURANGBAYAR'] : '';
		$BLNKURANGBAYAR = isset($_REQUEST['BLNKURANGBAYAR']) && !empty($_REQUEST['BLNKURANGBAYAR']) ? $_REQUEST['BLNKURANGBAYAR'] : '';
		$TGLKURANGBAYAR = isset($_REQUEST['TGLKURANGBAYAR']) && !empty($_REQUEST['TGLKURANGBAYAR']) ? $_REQUEST['TGLKURANGBAYAR'] : '';
		$TGLCETAKAWAL = isset($_REQUEST['TGLCETAKAWAL']) && strtotime($_REQUEST['TGLCETAKAWAL']) ? date('Y-m-d', strtotime($_REQUEST['TGLCETAKAWAL'])) : date('Y-m-d');
		$TGLCETAKAKHIR = isset($_REQUEST['TGLCETAKAKHIR']) && strtotime($_REQUEST['TGLCETAKAKHIR']) ? date('Y-m-d', strtotime($_REQUEST['TGLCETAKAKHIR'])) : date('Y-m-d');

		/*$TBLREKENING_KODE = !empty(DMOrcl::getRequest('TBLREKENING_KODE')) ? DMOrcl::getRequest('TBLREKENING_KODE') : '';
		$TBLPENDATAAN_THNPAJAK = !empty(DMOrcl::getRequest('TBLPENDATAAN_THNPAJAK')) ? DMOrcl::getRequest('TBLPENDATAAN_THNPAJAK') : '';
		
		$THNKURANGBAYAR = !empty(DMOrcl::getRequest('THNKURANGBAYAR')) ? DMOrcl::getRequest('THNKURANGBAYAR') : '';
		$BLNKURANGBAYAR = !empty(DMOrcl::getRequest('BLNKURANGBAYAR')) ? DMOrcl::getRequest('BLNKURANGBAYAR') : '';
		$TGLKURANGBAYAR = !empty(DMOrcl::getRequest('TGLKURANGBAYAR')) ? DMOrcl::getRequest('TGLKURANGBAYAR') : '';*/

		if ($TBLREKENING_KODE=='4.1.1.1.0') {
			$NAMAPAJAK = 'PAJAK HOTEL';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '1';
		} else if ($TBLREKENING_KODE=='4.1.1.2.0') {
			$NAMAPAJAK = 'PAJAK RESTORAN';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '2';
		} else if ($TBLREKENING_KODE=='4.1.1.3.0') {
			$NAMAPAJAK = 'PAJAK HIBURAN';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '3';
		} else if ($TBLREKENING_KODE=='4.1.1.7.0') {
			$NAMAPAJAK = 'PAJAK PARKIR';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '7';
		} else if ($TBLREKENING_KODE=='4.1.1.8.0') {
			$NAMAPAJAK = 'PAJAK AIR TANAH';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '8';
		} else if ($TBLREKENING_KODE=='4.1.1.10.0') {
			$NAMAPAJAK = 'PAJAK PBB';
			$NAMATABEL = 'TBLLBHBAYARPBB';
			$AYAT = '10';
		} else if ($TBLREKENING_KODE=='4.1.1.11.0') {
			$NAMAPAJAK = 'PAJAK BPHTB';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '11';
		}

		if($TBLPENDATAAN_THNPAJAK==''){
			$tahunpjk = "";
		}
		else{
			$tahunpjk = "AND ".$NAMATABEL.".TBLPENDATAAN_THNPAJAK = ".$TBLPENDATAAN_THNPAJAK."";
		};

			$RANGE = "
			AND
			TO_DATE(
			NVL({$NAMATABEL}_THNLEBIHBAYAR,99) 
			|| '-' || NVL({$NAMATABEL}_BLNLEBIHBAYAR,01) 
			|| '-' || NVL({$NAMATABEL}_TGLLEBIHBAYAR,01)
			,  'YY-MM-DD'
			)
			BETWEEN TO_DATE('{$TGLCETAKAWAL}', 'YYYY-MM-DD') AND TO_DATE('{$TGLCETAKAKHIR}', 'YYYY-MM-DD')
			";

			$sql ="
			SELECT
			(
			SELECT
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN
			FROM
			TBLDAFTAR
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = {$NAMATABEL}.TBLDAFTAR_NOPOK
			) AS TBLDAFTAR_JENISPENDAPATAN,
			(
			SELECT
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
			FROM
			TBLDAFTAR
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = {$NAMATABEL}.TBLDAFTAR_NOPOK
			) AS TBLDAFTAR_BADANUSAHANAMA,
			(
			SELECT
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
			FROM
			TBLDAFTAR
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = {$NAMATABEL}.TBLDAFTAR_NOPOK
			) AS TBLDAFTAR_BADANUSAHAALAMAT,
			(
			SELECT
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
			FROM
			TBLDAFTAR
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = {$NAMATABEL}.TBLDAFTAR_NOPOK
			) AS TBLKECAMATAN_IDBADANUSAHA,
			(
			SELECT
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
			FROM
			TBLDAFTAR
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = {$NAMATABEL}.TBLDAFTAR_NOPOK
			) AS TBLKELURAHAN_IDBADANUSAHA,
			{$NAMATABEL}.TBLDAFTAR_NOPOK,
			{$NAMATABEL}.TBLDAFTAR_GOLONGAN,
			{$NAMATABEL}.TBLPENDATAAN_THNPAJAK,
			{$NAMATABEL}.TBLPENDATAAN_BLNPAJAK,
			{$NAMATABEL}.TBLPENDATAAN_TGLPAJAK,
			{$NAMATABEL}.{$NAMATABEL}_THNLEBIHBAYAR,
			{$NAMATABEL}.{$NAMATABEL}_TGLLEBIHBAYAR,
			{$NAMATABEL}.{$NAMATABEL}_BLNLEBIHBAYAR,
			NVL({$NAMATABEL}.{$NAMATABEL}_REGLEBIHBAYAR, 0) AS {$NAMATABEL}_REGLEBIHBAYAR,
			NVL({$NAMATABEL}.{$NAMATABEL}_PAJAKPERIKSA, 0) AS {$NAMATABEL}_PAJAKPERIKSA,
			NVL({$NAMATABEL}.{$NAMATABEL}_RUPIAHLBHBAYAR, 0) AS {$NAMATABEL}_RUPIAHLBHBAYAR,
			{$NAMATABEL}.REFLEBIHBAYAR_TERBAYAR
			FROM
			{$NAMATABEL}
			WHERE
			NVL({$NAMATABEL}_REGLEBIHBAYAR,0)>0
			AND	NVL({$NAMATABEL}_BLNLEBIHBAYAR,0)>0
			AND TBLLBHBAYAR_REKAYAT = {$AYAT}
			{$tahunpjk}
			{$RANGE}

			ORDER BY TO_NUMBER(TO_CHAR(NVL({$NAMATABEL}_REGLEBIHBAYAR,0)))
			";
		

		
		// {$NAMATABEL}.TBLDAFTAR_JNSPENDAPATAN AS TBLDAFTAR_JENISPENDAPATAN,
		

		// echo $sql;die();

		$data['cetak'] = Yii::app()->db->createCommand( $sql )->queryAll();
		$data['NAMATABEL'] = $NAMATABEL;
		$data['tglawal'] = $TGLCETAKAWAL;
		$data['tglakhir'] = $TGLCETAKAKHIR;

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_skpdkb' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'daftar_skpdlebihbayar.docx';

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
		$sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 2";
		$sql2="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 6";
		$sql3="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 32";

		$data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();
		$data['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();
		$data['jab3'] = Yii::app()->db->createCommand($sql3)->queryRow();
			

		$dt = array();
		$rows = array();

		$GLOBALS['jabatan1'] = $data['jab1']['TBLPEJABAT_URAIAN'];
		$GLOBALS['petugas1'] = $data['jab1']['TBLPEJABAT_NAMA'];
		$GLOBALS['nip1'] = $data['jab1']['TBLPEJABAT_NIP'];
		$GLOBALS['jabatan2'] = $data['jab2']['TBLPEJABAT_URAIAN'];
		$GLOBALS['petugas2'] = $data['jab2']['TBLPEJABAT_NAMA'];
		$GLOBALS['nip2'] = $data['jab2']['TBLPEJABAT_NIP'];
		$GLOBALS['jabatan3'] = $data['jab3']['TBLPEJABAT_URAIAN'];
		$GLOBALS['petugas3'] = $data['jab3']['TBLPEJABAT_NAMA'];
		$GLOBALS['nip3'] = $data['jab3']['TBLPEJABAT_NIP'];
		
		$totalterbayar = array('totalterbayar'=>0); $totalperiksa = array('totalperiksa'=>0); $totallebihbayar = array('totallebihbayar'=>0); $no=1; foreach ($data['cetak'] as $kolom) :

			$dt['no'] = $no++;
			$dt['tglkb'] = $kolom[''.$NAMATABEL.'_TGLLEBIHBAYAR'] .'-'. $kolom[''.$NAMATABEL.'_BLNLEBIHBAYAR'] .'-20'. $kolom[''.$NAMATABEL.'_THNLEBIHBAYAR'];
			// $dt['tglkb'] = '';
			$dt['nokb'] = $kolom[''.$NAMATABEL.'_REGLEBIHBAYAR'];
			$dt['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];

			// $dt['lok'] = $kolom['TBLPENDATAAN_PAJAKKE'];
			// $dt['jumlahrekl'] = $kolom['TBLDAFTREKLAME_JMLHREKLAME']; 
			// $totaljumrek['totaljumrek'] += $kolom['TBLDAFTREKLAME_JMLHREKLAME'];
			// $totalpajak['totalpajak'] += $kolom['TBLDAFTREKLAME_PAJAK'];

			$dt['thn'] = $kolom['TBLPENDATAAN_THNPAJAK'];
			$dt['bln'] = $kolom['TBLPENDATAAN_BLNPAJAK'];
			$dt['tgl'] = $kolom['TBLPENDATAAN_TGLPAJAK'];

			$dt['terbayar'] = LokalIndonesia::ribuan($kolom['REFLEBIHBAYAR_TERBAYAR']);
			$dt['pajakperiksa'] = LokalIndonesia::ribuan($kolom[''.$NAMATABEL.'_PAJAKPERIKSA']);
			
			$dt['lebihbayar'] = LokalIndonesia::ribuan($kolom[''.$NAMATABEL.'_RUPIAHLBHBAYAR']);

			$totalterbayar['totalterbayar'] += $kolom['REFLEBIHBAYAR_TERBAYAR'];
			$totalperiksa['totalperiksa'] += $kolom[''.$NAMATABEL.'_PAJAKPERIKSA'];
			$totallebihbayar['totallebihbayar'] += $kolom[''.$NAMATABEL.'_RUPIAHLBHBAYAR'];

			// $thnentri = $kolom['TBLDAFTREKLAME_THNENTRI'];
			// $tglentri = $kolom['TBLDAFTREKLAME_TGLENTRI'];
			// $blnentri = $kolom['TBLDAFTREKLAME_BLNENTRI'];

			// $dt['namarek'] = $kolom['NMREKENING'];

			// $dt['ket1'] = $kolom['TBLDAFTREKLAME_KETERANGAN1'];
			// $dt['ket2'] = $kolom['TBLDAFTREKLAME_KETERANGAN2'];

			// $dt['wkt'] = $kolom['TBLDAFTREKLAME_JUMLAHHARI'];
			// $dt['ka'] = $kolom['TBLDAFTREKLAME_SKORKAWASAN'];
			// $dt['fj'] = $kolom['FJ'];
			// $dt['st'] = $kolom['ST'];
			// $dt['sp'] = $kolom['REFKETINGGIAN_SKOR'];
			// $dt['pjg'] = floatval($kolom['TBLDAFTREKLAME_PANJANG']);
			// $dt['lebar'] = floatval($kolom['TBLDAFTREKLAME_LEBAR']);
			// $dt['pjgxlebar'] = $kolom['TBLDAFTREKLAME_PANJANG']*$kolom['TBLDAFTREKLAME_LEBAR'];
			// $dt['niti'] = $kolom['TBLDAFTREKLAME_NILAISTRATEGIS'];
			// $dt['index'] = $kolom['REFSUDUTPANDANG_SKOR'];
			// $dt['biaya'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_RPTARIF']);
			// $dt['harga'] = LokalIndonesia::ribuan($kolom['HARGA']);
			// $dt['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_PAJAK']);

			// $dt['thnpajak'] = $kolom['TBLPENDATAAN_THNPAJAK'];
			// $dt['blnpajak'] = $kolom['TBLPENDATAAN_BLNPAJAK'];
			// $dt['tglpajak'] = $kolom['TBLPENDATAAN_TGLPAJAK'];

			$dt['npwpd'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d", $kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);

		array_push($rows, $dt);

		endforeach;

		$header = array();

		$header['totalterbayar'] = LokalIndonesia::ribuan($totalterbayar['totalterbayar']);
		$header['totalpajakperiksa'] = LokalIndonesia::ribuan($totalperiksa['totalperiksa']);
		$header['totallebihbayar'] = LokalIndonesia::ribuan($totallebihbayar['totallebihbayar']);
		// $header['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
		$header['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');

		$thnpajak = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$blnpajak = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
		$tglpajak = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';

		$GLOBALS['namapajak'] = $NAMAPAJAK;
		$GLOBALS['tglawal'] = $TGLCETAKAWAL;
		$GLOBALS['tglakhir'] = $TGLCETAKAKHIR;

		if ($thnpajak=='') {
			$GLOBALS['tahunpajak'] = '';
		} else {
			$GLOBALS['tahunpajak'] = $thnpajak;
		}
		// $GLOBALS['tglentri'] = $tgl_spt;

		//SAMPAI SINI QUERYNYAhttps://stackoverflow.com/questions/19263954/opentbs-merge-2-rows-in-word-document-table-simultaneously

		// var_dump($data);
		// echo json_encode($rows);Yii::app()->end();
		// echo json_encode($rows);

		// Merge data in the first sheet 
		// $npwpd = $data['TBLDAFTAR_NOPOK'];
		$namafileDL = "DAFTAR-SKPD-LB-".$NAMAPAJAK.".docx";
		$otbs->MergeBlock('dt', $rows); 
		$otbs->MergeField('header', $header); 
		// $otbs->MergeField('setoran', $setoran); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}

	public function actionGetData()
	{
		$TBLPENDATAAN_THNPAJAK = Yii::app()->request->getParam('TBLPENDATAAN_THNPAJAK','');
		$TBLREKENING_KODE = Yii::app()->request->getParam('TBLREKENING_KODE','');
		$THNKURANGBAYAR = Yii::app()->request->getParam('THNKURANGBAYAR','');
		$BLNKURANGBAYAR = Yii::app()->request->getParam('BLNKURANGBAYAR','');
		$TGLKURANGBAYAR = Yii::app()->request->getParam('TGLKURANGBAYAR','');
		$TGLCETAKAWAL = date('Y-m-d', strtotime(Yii::app()->request->getParam('TGLCETAKAWAL',date('Y-m-d'))));
		$TGLCETAKAKHIR = date('Y-m-d', strtotime(Yii::app()->request->getParam('TGLCETAKAKHIR',date('Y-m-d'))));

		if ($TBLREKENING_KODE=='4.1.1.1.0') {
			$NAMAPAJAK = 'PAJAK HOTEL';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '1';
		} else if ($TBLREKENING_KODE=='4.1.1.2.0') {
			$NAMAPAJAK = 'PAJAK RESTORAN';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '2';
		} else if ($TBLREKENING_KODE=='4.1.1.3.0') {
			$NAMAPAJAK = 'PAJAK HIBURAN';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '3';
		} else if ($TBLREKENING_KODE=='4.1.1.7.0') {
			$NAMAPAJAK = 'PAJAK PARKIR';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '7';
		} else if ($TBLREKENING_KODE=='4.1.1.8.0') {
			$NAMAPAJAK = 'PAJAK AIR TANAH';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '8';
		} else if ($TBLREKENING_KODE=='4.1.1.10.0') {
			$NAMAPAJAK = 'PAJAK PBB';
			$NAMATABEL = 'TBLLBHBAYARPBB';
			$AYAT = '10';
		} else if ($TBLREKENING_KODE=='4.1.1.11.0') {
			$NAMAPAJAK = 'PAJAK BPHTB';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '11';
		}

		if($TBLPENDATAAN_THNPAJAK==''){
			$tahunpjk = "";
		}
		else{
			$tahunpjk = "AND ".$NAMATABEL.".TBLPENDATAAN_THNPAJAK = ".substr($TBLPENDATAAN_THNPAJAK, -2)."";
		};

			$RANGE = "
			AND
			TO_DATE(
			NVL({$NAMATABEL}_THNLEBIHBAYAR,99) 
			|| '-' || NVL({$NAMATABEL}_BLNLEBIHBAYAR,01) 
			|| '-' || NVL({$NAMATABEL}_TGLLEBIHBAYAR,01)
			,  'YY-MM-DD'
			)
			BETWEEN TO_DATE('{$TGLCETAKAWAL}', 'YYYY-MM-DD') AND TO_DATE('{$TGLCETAKAKHIR}', 'YYYY-MM-DD')
			";

		$sql = "SELECT
			(
			SELECT
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN
			FROM
			TBLDAFTAR
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = {$NAMATABEL}.TBLDAFTAR_NOPOK
			) AS TBLDAFTAR_JENISPENDAPATAN,
			(
			SELECT
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
			FROM
			TBLDAFTAR
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = {$NAMATABEL}.TBLDAFTAR_NOPOK
			) AS TBLDAFTAR_BADANUSAHANAMA,
			(
			SELECT
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
			FROM
			TBLDAFTAR
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = {$NAMATABEL}.TBLDAFTAR_NOPOK
			) AS TBLDAFTAR_BADANUSAHAALAMAT,
			(
			SELECT
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
			FROM
			TBLDAFTAR
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = {$NAMATABEL}.TBLDAFTAR_NOPOK
			) AS TBLKECAMATAN_IDBADANUSAHA,
			(
			SELECT
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
			FROM
			TBLDAFTAR
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = {$NAMATABEL}.TBLDAFTAR_NOPOK
			) AS TBLKELURAHAN_IDBADANUSAHA,
			{$NAMATABEL}.TBLDAFTAR_NOPOK,
			{$NAMATABEL}.TBLDAFTAR_GOLONGAN,
			{$NAMATABEL}.TBLPENDATAAN_THNPAJAK,
			{$NAMATABEL}.TBLPENDATAAN_BLNPAJAK,
			NVL({$NAMATABEL}.TBLPENDATAAN_TGLPAJAK,0) TBLPENDATAAN_TGLPAJAK,
			{$NAMATABEL}.{$NAMATABEL}_THNLEBIHBAYAR THNLEBIHBAYAR,
			{$NAMATABEL}.{$NAMATABEL}_TGLLEBIHBAYAR TGLLEBIHBAYAR,
			{$NAMATABEL}.{$NAMATABEL}_BLNLEBIHBAYAR BLNLEBIHBAYAR,
			NVL({$NAMATABEL}.{$NAMATABEL}_REGLEBIHBAYAR, 0) AS REGLEBIHBAYAR,
			NVL({$NAMATABEL}.{$NAMATABEL}_PAJAKPERIKSA, 0) AS PAJAKPERIKSA,
			NVL({$NAMATABEL}.{$NAMATABEL}_RUPIAHLBHBAYAR, 0) AS RUPIAHLBHBAYAR,
			{$NAMATABEL}.REFLEBIHBAYAR_TERBAYAR
			FROM
			{$NAMATABEL}
			WHERE
			NVL({$NAMATABEL}_REGLEBIHBAYAR,0)>0
			AND	NVL({$NAMATABEL}_BLNLEBIHBAYAR,0)>0
			AND TBLLBHBAYAR_REKAYAT = {$AYAT}
			{$tahunpjk}
			{$RANGE}

			ORDER BY TO_NUMBER(TO_CHAR(NVL({$NAMATABEL}_REGLEBIHBAYAR,0)))";
		$data['skpdlb'] = Yii::app()->db->createCommand($sql)->queryAll();

		$this->renderPartial('table',array('data'=>$data));
	}

	public function actionBatalkanSKPDLB()
	{
		$listPajakSKPDLB = trim($_REQUEST['listPajakSKPDLB'],',');
		$TBLREKENING_KODE = Yii::app()->request->getParam('TBLREKENING_KODE','');

		if ($TBLREKENING_KODE=='4.1.1.1.0') {
			$NAMAPAJAK = 'PAJAK HOTEL';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '1';
		} else if ($TBLREKENING_KODE=='4.1.1.2.0') {
			$NAMAPAJAK = 'PAJAK RESTORAN';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '2';
		} else if ($TBLREKENING_KODE=='4.1.1.3.0') {
			$NAMAPAJAK = 'PAJAK HIBURAN';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '3';
		} else if ($TBLREKENING_KODE=='4.1.1.7.0') {
			$NAMAPAJAK = 'PAJAK PARKIR';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '7';
		} else if ($TBLREKENING_KODE=='4.1.1.8.0') {
			$NAMAPAJAK = 'PAJAK AIR TANAH';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '8';
		} else if ($TBLREKENING_KODE=='4.1.1.10.0') {
			$NAMAPAJAK = 'PAJAK PBB';
			$NAMATABEL = 'TBLLBHBAYARPBB';
			$AYAT = '10';
		} else if ($TBLREKENING_KODE=='4.1.1.11.0') {
			$NAMAPAJAK = 'PAJAK BPHTB';
			$NAMATABEL = 'TBLLBHBAYAR';
			$AYAT = '11';
		}

		$PajakSKPDLBList = explode(',', $listPajakSKPDLB);
		$stat = array(); foreach ($PajakSKPDLBList as $list) {
			$expList = explode('-', $list);
			$nopokok = $expList[0];
			$thnpajak = $expList[1];
			$blnpajak = $expList[2];
			$reglb = $expList[3];	

			$delete = Yii::app()->db->createCommand();

				$query = $delete->delete($NAMATABEL, 'TBLDAFTAR_NOPOK=:nopok AND TBLPENDATAAN_THNPAJAK=:thn AND TBLPENDATAAN_BLNPAJAK=:bln AND TBLLBHBAYAR_REGLEBIHBAYAR =:reglb', array(':nopok'=>$nopokok,':thn'=>$thnpajak,':bln'=>$blnpajak,':reglb'=>$reglb));
			// }

			
			if ($query>0) {
				// echo CJSON::encode(array('status'=>'success','nopokok'=>$nopokok));
				$stat[] = $nopokok;
			}
			else{
				// echo CJSON::encode(array('status'=>'failed','nopokok'=>$nopokok));
			}
		}
		echo CJSON::encode(array('status'=>'success','nopokok'=>$stat));
	}
}
