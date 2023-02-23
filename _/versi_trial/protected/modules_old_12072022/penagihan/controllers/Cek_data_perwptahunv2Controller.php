<?php

class Cek_data_perwptahunv2Controller extends Controller
{
	public function actionIndex()
	{

		/*$data['jenis_pajak'] = Yii::app()->db->createCommand('SELECT * FROM "tblrek"  WHERE PJK = 1 AND PAD=1 AND JEN = 0  order by PEND,PAD,PJK,AYT,JEN
		');*/
		$data['rek'] = Yii::app()->db->createCommand('
			SELECT
			*
			FROM
			TBLREKENING
			WHERE
			TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			AND TBLREKENING_REKAYAT <>5 AND TBLREKENING_REKAYAT <>10 AND TBLREKENING_REKAYAT <>11 AND TBLREKENING_REKAYAT <>23 
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

	public function actionautocompletewpv2()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');
		
		$query = trim($_REQUEST['query']);
		$kode = trim($_REQUEST['kode']);

		if($kode=='1'){
			$GOL = '3';
		}
		else if($kode=='2'){
			$GOL = '3';
		}
		else if($kode=='3'){
			$GOL = '4';
		}
		else if($kode=='4'){
			$GOL = '2';
		}
		else if($kode=='7'){
			$GOL = '2';
		}
		else if($kode=='8'){
			$GOL = '1';
		}
		else if($kode=='9'){
			$GOL = '1';
		}
		else if($kode=='11'){
			$GOL = '1';
		}
		else{
			$GOL = '';
		}

		$select = "
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		REFBADANUSAHA.REKENING_KODE
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'LK__TBLDAFTAR_BADANUSAHANAMA' => $query
			,'LK__TBLDAFTAR_BADANUSAHAALAMAT' => $query
			,'LK__TBLDAFTAR_NOPOK' => $query
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR_GOLONGAN' => $GOL
			// ,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $kode
			,'EQ__TBLDAFTAR_ISAKTIF' => 'Y'
		);

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'order'=> 'TBLDAFTAR_NOPOK ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$results = DBFetch::query($arrayConfig);

		$suggestions = array();
		 
		foreach($results as $result)
		{
			$suggestions[] = array(
			"value" => $result['TBLDAFTAR_NOPOK']. ' | ' . $result['TBLDAFTAR_BADANUSAHANAMA']. ' | ' . $result['TBLDAFTAR_BADANUSAHAALAMAT']
			,"data" => $result['TBLDAFTAR_NOPOK']
			,"TBLDAFTAR_BADANUSAHANAMA" => $result['TBLDAFTAR_BADANUSAHANAMA']
			,"TBLDAFTAR_BADANUSAHAALAMAT" => $result['TBLDAFTAR_BADANUSAHAALAMAT']
			,"TBLDAFTAR_NOPOK" => $result['TBLDAFTAR_NOPOK']
			,"REKENING_KODE" => $result['REKENING_KODE']
			);
		}

		 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function actionCetak()
	{
		$data=array();
		$nopok = (int)$_REQUEST['TBLDAFTAR_NOPOK'];
		$tahunpajak = $data['tahunpajak'] = (int)substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2);
		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '1':
				$namaTBL = 'TBLDAFTHOTEL';
				$namaRek = 'PAJAK HOTEL';
				break;
			
			case '2':
				$namaTBL = 'TBLDAFTRMAKAN';
				$namaRek = 'PAJAK RUMAH MAKAN';
				break;
			
			case '3':
				$namaTBL = 'TBLDAFTHIBURAN';
				$namaRek = 'PAJAK HIBURAN';
				break;
			
			case '4':
				$namaTBL = 'TBLDAFTREKLAME';
				$namaRek = 'PAJAK REKLAME';
				break;
			
			case '7':
				$namaTBL = 'TBLDAFTPARKIR';
				$namaRek = 'PAJAK PARKIR';
				break;
			
			case '8':
				$namaTBL = 'TBLDAFTTANAH';
				$namaRek = 'PAJAK AIR TANAH';
				break;
			
			case '9':
				$namaTBL = 'TBLDAFTBURUNG';
				$namaRek = 'PAJAK SARANG WALET';
				break;
			
			default:
				$namaTBL = 'TBLDAFTHOTEL';
				break;
		}

		$data['namatbl'] = $namaTBL;
		$data['namarek'] = $namaRek;

		$wherenopok = '';
		if (!empty($nopok)) {
			$wherenopok = ' AND "TBLDAFTAR".TBLDAFTAR_NOPOK = ' . $nopok;
		}

		$sql="SELECT
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = ".$nopok;
		$data['wp'] = Yii::app()->db->createCommand( $sql )->queryRow();

		$data['hasil'] = $this->getData();

		if (isset($_REQUEST['jenis']) && $_REQUEST['jenis']=='word') {
			$this->CetakWord($data);
        	Yii::app()->end();
		}

		$this->renderPartial('cetak', array('data'=>$data));
	}

	public function CetakWord($data='')
	{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_pembukuan' . DIRECTORY_SEPARATOR;
		// $namatpl = $path_tpl . 'Cek_WP_per_Tahun_V2_KBAngs.docx';

		/*if ($data['hasil']['TBLSETOR_JNSBAYAR']=='SKPDKB' || $data['hasil']['TBLSETOR_JNSBAYAR']=='SKPDKB di angsur') {
			$namatemplate = 'Cek_WP_per_Tahun_V2_KBAngsur_Bunga.docx';
		} else {
			$namatemplate = 'Cek_WP_per_Tahun_V2_KBAngsur.docx';
		}*/
		
		$namatemplate = 'Cek_WP_per_Tahun_V2_KBAngsur_Bunga.docx';

		$namatpl = $path_tpl . $namatemplate;
		$namafileDL = "Cek Data WP/WR Per Tahun.docx"; 

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

		//INI CODING CETAK WORD SSPD

		$utama = array();
		$rows = array();

		$utama['jenispajak'] = $data['namarek'];
		$utama['wp_bunama'] = $data['wp']['TBLDAFTAR_BADANUSAHANAMA'];
		$utama['wp_bualamat'] = $data['wp']['TBLDAFTAR_BADANUSAHAALAMAT'];
		$utama['wp_pnama'] = $data['wp']['TBLDAFTAR_PEMILIKNAMA'];
		$utama['wp_palamat'] = $data['wp']['TBLDAFTAR_PEMILIKALAMAT'];
		$utama['wp_nopok'] = $data['wp']['TBLDAFTAR_GOLONGAN'] . '.' . sprintf('%07d', $data['wp']['TBLDAFTAR_NOPOK']) . '.' . $data['wp']['TBLKECAMATAN_IDBADANUSAHA'] . '.' . $data['wp']['TBLKELURAHAN_IDBADANUSAHA'];
		$utama['datenow'] = date('d/m/Y');
		$utama['pajaktahun'] = $data['tahunpajak'];
		$rowDATA = $data['hasil'];

		$totalskpd = 0;
		$totalsspd = 0;

		$arrayJenis = array(
		// 	array('nama'=>'SKPD Angsur')
		// 	,array('nama'=>'SKPDKB')
		// 	,array('nama'=>'SPTPD')
		);

		$jenis_before = '';

		foreach ($rowDATA as $ROWJENIS) :
			if ($jenis_before!=$ROWJENIS['TBLSETOR_JNSBAYAR']) :
				$jenis_before = $ROWJENIS['TBLSETOR_JNSBAYAR'];
				$jenise = array('nama'=>'' /*$jenis_before*/, 'detail'=>array());
				$jenise['totalskpd'] = $totalskpd = 0;
				$jenise['totalsspd'] = $totalsspd = 0;
				
				foreach ($rowDATA as $row) :
					if ($jenis_before==$row['TBLSETOR_JNSBAYAR']) :					

						$row['bln_ke'] = $row['BLP'];
						$row['skpd_no'] = $row['NOSKP'];
						$row['skpd_tgl'] = !empty($row[$data['namatbl'].'_TGLSKPD']) ? $row[$data['namatbl'].'_TGLSKPD'] . '/' . $row[$data['namatbl'].'_BLNSKPD'] . '/20' . $row[$data['namatbl'].'_THNSKPD'] : '';
						$row['skpd_rupiah'] = LokalIndonesia::ribuan($row['PAJAK']);
						$row['skpd_bunga'] = LokalIndonesia::ribuan($row['BUNGA']);
						$row['sspd_no'] = $row['NOMORSSPD'];
						$row['jenis_setoran'] = $row['TBLSETOR_JNSBAYAR'];
						$row['sspd_tgl'] = !empty($row['TBLSETOR_TGLSETOR']) ? sprintf('%02d', $row['TBLSETOR_TGLSETOR']) . '/' . sprintf('%02d', $row['TBLSETOR_BLNSETOR']) . '/20' . $row['TBLSETOR_THNSETOR'] : '';
						$row['sspd_rupiah'] = LokalIndonesia::ribuan($row['TBLSETOR_RUPIAHSETOR']);
						$row['keterangan'] = '';
						if($row['TBLSETOR_JNSBAYAR']=='SKPDKB di angsur'):
						// $row['keterangan'] = 'Diangsur ' . $row['JML_ANGSUR'] . ' kali';
						$row['keterangan'] = $row['JML_ANGSUR'] . 'x';
						endif;
						$totalskpd += $row['PAJAK']+$row['BUNGA'];
						$totalsspd += $row['TBLSETOR_RUPIAHSETOR'];
						// array_push($rows, $row);

						array_push($jenise['detail'], $row);
					endif;
				endforeach;
				$jenise['totalskpd'] = LokalIndonesia::ribuan($totalskpd);
				$jenise['totalsspd'] = LokalIndonesia::ribuan($totalsspd);
				array_push($arrayJenis, $jenise);
			endif;
		endforeach;

		// $utama['totalskpd'] = LokalIndonesia::ribuan($totalskpd);
		// $utama['totalsspd'] = LokalIndonesia::ribuan($totalskpd);

		// debug
		// echo CJSON::encode($rows);Yii::app()->end();

		// Merge data in the first sheet 
		
		$otbs->MergeField('utama', $utama); 
		// $otbs->MergeBlock('row', $rows); 
		$otbs->MergeBlock('row', $arrayJenis); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}

	public function actioncari()
	{

		
		$data = array();
		$data['laporan'] = $this->getData();
		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '1':
				$namaTBL = 'TBLDAFTHOTEL';
				break;
			
			case '2':
				$namaTBL = 'TBLDAFTRMAKAN';
				break;
			
			case '3':
				$namaTBL = 'TBLDAFTHIBURAN';
				break;
			
			case '4':
				$namaTBL = 'TBLDAFTREKLAME';
				break;
			
			case '7':
				$namaTBL = 'TBLDAFTPARKIR';
				break;
			
			case '8':
				$namaTBL = 'TBLDAFTTANAH';
				break;
			
			case '9':
				$namaTBL = 'TBLDAFTBURUNG';
				break;
			
			default:
				$namaTBL = 'TBLDAFTHOTEL';
				break;
		}

		$data['namatbl'] = $namaTBL;
		$this->renderPartial('tabel', array('data'=>$data));

		
	}

	public function getData(){
		$namaTBL = '';
		$masapajak_tahun = (int)substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2);
		$nopok = (int)$_REQUEST['TBLDAFTAR_NOPOK'];
		$rek = $_REQUEST['rekening'];

		$wheremasapajak_tahun = '';
		if (!empty($masapajak_tahun)) {
			$wheremasapajak_tahun= ' AND TBLPENDATAAN_THNPAJAK = ' . substr($masapajak_tahun, -2);
		}


		$wherenopok = '';
		if (!empty($nopok)) {
			$wherenopok = ' AND TBLDAFTAR.TBLDAFTAR_NOPOK = ' . $nopok;
		}

		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '1':
				$namaTBL = 'TBLDAFTHOTEL';
				$naik = 'KENAIKANKRGBAYAR';
				$jnsbayar = "'SPTPD'";
				break;
			
			case '2':
				$namaTBL = 'TBLDAFTRMAKAN';
				$naik = 'NAKB';
				$jnsbayar = "'SPTPD'";
				break;
			
			case '3':
				$namaTBL = 'TBLDAFTHIBURAN';
				$naik = 'NAKB';
				$jnsbayar = "'SPTPD'";
				break;
			
			case '4':
				$namaTBL = 'TBLDAFTREKLAME';
				$naik = 'NAKB';
				$jnsbayar = 'SKPD';
				break;
			
			case '7':
				$namaTBL = 'TBLDAFTPARKIR';
				$naik = 'NAKB';
				$jnsbayar = "'SPTPD'";
				break;
			
			case '8':
				$namaTBL = 'TBLDAFTTANAH';
				$naik = 'NAKB';
				$jnsbayar = "'SKPD'";
				break;
			
			case '9':
				$namaTBL = 'TBLDAFTBURUNG';
				$naik = 'NAKB';
				$jnsbayar = "'SPTPD'";
				break;
			
			default:
				$namaTBL = 'TBLDAFTHOTEL';
				$naik = 'KENAIKANKRGBAYAR';
				$jnsbayar = "'SPTPD'";
				break;
		}

		$data['namatbl'] = $namaTBL;
		$data['jnsbayar'] = $jnsbayar;

		$sql="
		SELECT
			{$namaTBL}.{$namaTBL}_THNSKPD AS {$namaTBL}_THNSKPD,
			{$namaTBL}.{$namaTBL}_BLNSKPD,
			{$namaTBL}.{$namaTBL}_TGLSKPD,
			{$namaTBL}.{$namaTBL}_THNKURANGBAYAR AS {$namaTBL}_THNKURANGBAYAR,
			{$namaTBL}.{$namaTBL}_BLNKURANGBAYAR,
			{$namaTBL}.{$namaTBL}_TGLKURANGBAYAR,
			{$namaTBL}.TBLPENDATAAN_THNPAJAK,
			NVL({$namaTBL}.TBLPENDATAAN_BLNPAJAK, 0) AS BLP,
			{$namaTBL}.TBLPENDATAAN_TGLPAJAK,
			{$namaTBL}.TBLPENDATAAN_PAJAKKE AS TBLPENDATAAN_PAJAKKE,
			{$namaTBL}.TBLDAFTAR_NOPOK,
			{$namaTBL}.{$namaTBL}_REGSETOR AS NOMORSSPD,
			TBLSETOR.TBLSETOR_THNSETOR,
			TBLSETOR.TBLSETOR_BLNSETOR,
			TBLSETOR.TBLSETOR_TGLSETOR,
			{$namaTBL}.{$namaTBL}_REKPENDAPATAN,
			{$namaTBL}.{$namaTBL}_REKPAD,
			{$namaTBL}.{$namaTBL}_REKPAJAK,
			{$namaTBL}.{$namaTBL}_REKAYAT,
			{$namaTBL}.{$namaTBL}_REKJENIS,
			NVL(NULL,0) AS BUNGA,
			NVL(NULL,0) AS KENAIKAN,
			NVL({$namaTBL}.{$namaTBL}_PAJAK, 0) AS PAJAK,
			NVL(NULL,0) AS RPKB,
			TBLSETOR_JNSKETETAPAN,
			{$jnsbayar} AS TBLSETOR_JNSBAYAR,
			TBLSETOR.TBLSETOR_RUPIAHSETOR,
			{$namaTBL}.{$namaTBL}_NOMORSKPD AS NOSKP
			,0 AS JML_ANGSUR
		FROM
			TBLSETOR
		RIGHT JOIN {$namaTBL} ON TBLSETOR.TBLPENDATAAN_THNPAJAK = {$namaTBL}.TBLPENDATAAN_THNPAJAK
		AND NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK, 0) = NVL({$namaTBL}.TBLPENDATAAN_BLNPAJAK, 0)
		AND NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK, 0) = NVL({$namaTBL}.TBLPENDATAAN_TGLPAJAK, 0)
		AND NVL(TBLSETOR.TBLPENDATAAN_PAJAKKE, 0) = NVL({$namaTBL}.TBLPENDATAAN_PAJAKKE, 0)
		AND TBLSETOR.TBLDAFTAR_NOPOK = {$namaTBL}.TBLDAFTAR_NOPOK
		AND TBLSETOR.TBLSETOR_REKPENDAPATAN = {$namaTBL}.{$namaTBL}_REKPENDAPATAN
		AND TBLSETOR.TBLSETOR_REKPAD = {$namaTBL}.{$namaTBL}_REKPAD
		AND TBLSETOR.TBLSETOR_REKPAJAK = {$namaTBL}.{$namaTBL}_REKPAJAK
		AND TBLSETOR.TBLSETOR_REKAYAT = {$namaTBL}.{$namaTBL}_REKAYAT
		WHERE
			{$namaTBL}.TBLDAFTAR_NOPOK = '{$nopok}'
		AND {$namaTBL}.TBLPENDATAAN_THNPAJAK = '{$masapajak_tahun}'
		AND TBLSETOR_JNSKETETAPAN IS NULL

		";

		
		
		// Yii::app()->end();
		// echo $sql;
		return $data = Yii::app()->db->createCommand( $sql )->queryAll();
	}
}