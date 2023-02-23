<?php

class Cetak_suratteguran_90Controller extends Controller
{
	var $MODULE_URL = 'pendataan/cetak_suratteguran_90';
	public function actionIndex()
	{
		$data['URL_APP'] = Yii::app()->getBaseUrl(true);
		$data['rek'] = Yii::app()->db->createCommand('
			SELECT
			*
			FROM
			TBLREKENING_90 TBLREKENING
			WHERE
			TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			AND TBLREKENING_REKPAJAK <> 4
			AND TBLREKENING_REKPENDAPATAN_90 IS NOT NULL
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			')->queryAll();
		$data['kecamatan'] = Yii::app()->db->createCommand('SELECT * FROM REFKECAMATAN')->queryAll();
		$data['kelurahan'] = Yii::app()->db->createCommand('SELECT * FROM REFKELURAHAN')->queryAll();
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
		$kode = trim($_REQUEST['kode']);

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

		if ($kode==8) {

			$otherquery = array(
				'limit'=> 30
				,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDPEMILIK')
				,'order'=> 'TBLDAFTAR_NOPOK ASC'
			);

		} else {

			$otherquery = array(
				'limit'=> 30
				,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
				,'order'=> 'TBLDAFTAR_NOPOK ASC'
			);
		}

		

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
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
		
		$data['URL_APP'] = Yii::app()->getBaseUrl(true);		
		$this->renderPartial('cetak', array('data'=>$data));
	}

	public function actionCetakSemua()
	{
		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		$STATUS_AKUN_ESPTPD = Yii::app()->request->getParam('STATUS_AKUN_ESPTPD', '');

		switch ( $rek ) {
			case '1':
				$namaTBL = 'TBLDAFTHOTEL';
				$nama_pajak = 'PAJAK HOTEL';
				break;
			
			case '2':
				$namaTBL = 'TBLDAFTRMAKAN';
				$nama_pajak = 'PAJAK RESTORAN';
				break;
			
			case '3':
				$namaTBL = 'TBLDAFTHIBURAN';
				$nama_pajak = 'PAJAK HIBURAN';
				break;
			
			case '4':
				$namaTBL = 'TBLDAFTREKLAME';
				$nama_pajak = 'PAJAK REKLAME';
				break;
			
			case '5':
				$namaTBL = 'TBLDAFTPARKIR';
				$nama_pajak = 'PAJAK PARKIR';
				break;
			
			case '6':
				$namaTBL = 'TBLDAFTTANAH';
				$nama_pajak = 'PAJAK AIR TANAH';
				break;
			
			case '7':
				$namaTBL = 'TBLDAFTPARKIR';
				$nama_pajak = 'PAJAK PARKIR';
				break;

			case '8':
				$namaTBL = 'TBLDAFTTANAH';
				$nama_pajak = 'PAJAK AIR TANAH';
				break;
			
			default:
				$namaTBL = 'TBLDAFTHOTEL';
				$nama_pajak = 'PAJAK HOTEL';
				break;
		}

		$TBLPENDATAAN_THNPAJAK = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? $_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$TBLPENDATAAN_BLNPAJAK = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
		$TBLDAFTAR_NOPOK = isset($_REQUEST['TBLDAFTAR_NOPOK']) && !empty($_REQUEST['TBLDAFTAR_NOPOK']) ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
		$nomor_surat = isset($_REQUEST['nomor_surat']) && !empty($_REQUEST['nomor_surat']) ? $_REQUEST['nomor_surat'] : '';

		$select = ''.$namaTBL.'.*, TBLDAFTAR.*, (SELECT COUNT(EUSR.S_WP) FROM ESPTPD.XS_USER EUSR WHERE EUSR.S_WP = TBLDAFTAR.TBLDAFTAR_NOPOK) AS is_sptpd';
		$from = ''.$namaTBL.'';

		/*$filter = array(
			'EQ__TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
			,'EQ__TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
			,'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);*/

		$filter_AND = array(
			'EQ__TBLPENDATAAN_THNPAJAK' => substr($TBLPENDATAAN_THNPAJAK,-2)
			,'EQ__TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
			,'EQ__'.$namaTBL.'_TGLENTRI' => '0'
			,'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
			,'EQ__TBLDAFTAR.TBLDAFTAR_ISAKTIF' => 'Y'
		);

		$otherquery = array(
			// 'limit'=> 30
			'join'=> array('TBLDAFTAR', ''.$namaTBL.'.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK')
			,'order'=> ''.$namaTBL.'_THNSPTPD, '.$namaTBL.'_BLNSPTPD, '.$namaTBL.'_TGLSPTPD, TBLPENDATAAN_THNPAJAK, TBLPENDATAAN_BLNPAJAK, TBLPENDATAAN_TGLPAJAK'
		);

		$qcek = "(SELECT COUNT(EUSR.S_WP) FROM ESPTPD.XS_USER EUSR WHERE EUSR.S_WP = TBLDAFTAR.TBLDAFTAR_NOPOK) ";
		if ($STATUS_AKUN_ESPTPD == 'PUNYA') :
			$otherquery['andwhere_akun'] = "{$qcek}>=1";
		elseif ($STATUS_AKUN_ESPTPD == 'TIDAK PUNYA') :
			$otherquery['andwhere_akun'] = "{$qcek}<=0";
		endif;

		$arrayConfig = array('select'=>$select,'from'=>$from,/*'filter'=>$filter,*/'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data['list_teguran'] = DBFetch::query($arrayConfig);

		

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
        // $namatpl = $path_tpl . 'surat_teguran-qr.docx'; // rahmat 19-05-2021 saat proses awal QR harus blank
        $namatpl = $path_tpl . 'surat_teguran.docx';

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

            

        // $dt = array();
        // $rows = array();

        $sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 2";
        $data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();

        $dt = array();
        $rows = array();

		$ar_ttd = array(
			'pejabat_nama' => $data['jab1']['TBLPEJABAT_NAMA'],
			'pejabat_nip'  => $data['jab1']['TBLPEJABAT_NIP'],
		);
        
        foreach ($data['list_teguran'] as $kolom) :

            $dt['no'] = null;
            $dt['nosurat'] = $nomor_surat;
            // $dt['nopok'] = sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']);
            $dt['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
            $dt['alamatbadan'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];

            $dt['masapajak'] = strtoupper((LokalIndonesia::getbulan($kolom['TBLPENDATAAN_BLNPAJAK']))) .' 20'. $kolom['TBLPENDATAAN_THNPAJAK'];

            $dt['datenow'] = date('d') .' '. LokalIndonesia::getBulan(date('m')) .' '. date('Y');

            $dt['nopok'] = $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);

            $dt['jenis'] = ''.$nama_pajak.'';

            $dt['jabatan'] = $data['jab1']['TBLPEJABAT_URAIAN'];
            $dt['nama'] = $data['jab1']['TBLPEJABAT_NAMA'];
            $dt['nip'] = $data['jab1']['TBLPEJABAT_NIP'];

            if ($rek=='3') {
            	$dt['keterlambatan'] = '15 (Lima Belas)';
            } else {
            	$dt['keterlambatan'] = '10 (Sepuluh)';
            }
   //          $text1 = 'TEGURAN_SPTPD';
   //          $text2 = 'a.n. KEPALA_KEPALA BIDANG PELAYANAN PENDAFTARAN DAN PENETAPAN PENDAPATAN DAERAH';
   //          $wp_jenis = $nama_pajak;
			// $wp_npwpd = $kolom['TBLDAFTAR_NOPOK'];
			// $wp_nama = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
			// $text = "({$text1}_{$wp_jenis}_{$wp_nama}_{$wp_npwpd}_{$text2}_{$ar_ttd['pejabat_nama']}_{$ar_ttd['pejabat_nip']})";
			// $path = dirname(Yii::app()->getBasePath()).'/assets/temp_qr/'; // letakkan di folder assets
			// $path_qr = $path . "qrcode_teguran_{$wp_npwpd}-{$TBLPENDATAAN_THNPAJAK}-{$TBLPENDATAAN_BLNPAJAK}_{$wp_npwpd}".md5($text).".png";
			// Yii::app()->qrcode->create($text, $path_qr);
			// // echo $path_qr;Yii::app()->end();
			// // $otbs->Plugin(OPENTBS_CHANGE_PICTURE, '#merge_me#', $path_qr, array('unique' => 1));
			// // $otbs->Plugin(OPENTBS_CHANGE_PICTURE, '#merge_me#', $path_qr);
			// $dt['qrpath'] = $path_qr;

        	array_push($rows, $dt);
        	$datateguran = array(
        		'thn' => $TBLPENDATAAN_THNPAJAK,
				'bln' => $TBLPENDATAAN_BLNPAJAK,
				'nopok' => $kolom['TBLDAFTAR_NOPOK'],
				'nomor_surat' => $nomor_surat,
				'NAMA_WP' => $kolom['TBLDAFTAR_BADANUSAHANAMA'],
				'ALAMAT_WP' => $kolom['TBLDAFTAR_BADANUSAHAALAMAT'],
				'NPWPD' => $dt['nopok'],
				'rek' => $rek,
				'STATUS_KIRIM' => $kolom['IS_SPTPD'] ? 'ONLINE' : 'OFFLINE',
        	);
        	// var_dump($datateguran);Yii::app()->end();
        	$this->update_teguran($datateguran);

        endforeach;

        //SAMPAI SINI QUERYNYA

        // var_dump($data);
        // echo json_encode($dt);Yii::app()->end();
        // echo json_encode($rows);Yii::app()->end();

        // Merge data in the first sheet
        $namafileDL = "Surat-Teguran-No:".$nomor_surat.".docx";
        $otbs->MergeBlock('dt', $rows);
        // $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the templatedatenow

        $otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
        // echo "string";Yii::app()->end();
        Yii::app()->end();

		
	}

	public function actioncarix()
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
			
			case '5':
				$namaTBL = 'TBLDAFTPARKIR';
				break;
			
			case '6':
				$namaTBL = 'TBLDAFTTANAH';
				break;
			
			case '7':
				$namaTBL = 'TBLDAFTPARKIR';
				break;

			case '8':
				$namaTBL = 'TBLDAFTTANAH';
				break;
			
			default:
				$namaTBL = 'TBLDAFTHOTEL';
				break;
		}

		$data['namatbl'] = $namaTBL;
		$this->renderPartial('tabel', array('data'=>$data));

		
	}

	public function actioncari() {

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
			
			case '5':
				$namaTBL = 'TBLDAFTPARKIR';
				break;
			
			case '6':
				$namaTBL = 'TBLDAFTTANAH';
				break;
			
			case '7':
				$namaTBL = 'TBLDAFTPARKIR';
				break;

			case '8':
				$namaTBL = 'TBLDAFTTANAH';
				break;
			
			default:
				$namaTBL = 'TBLDAFTHOTEL';
				break;
		}

		$TBLPENDATAAN_THNPAJAK = Yii::app()->request->getParam('TBLPENDATAAN_THNPAJAK', '');
		$TBLPENDATAAN_BLNPAJAK = Yii::app()->request->getParam('TBLPENDATAAN_BLNPAJAK', '');
		$TBLDAFTAR_NOPOK       = Yii::app()->request->getParam('TBLDAFTAR_NOPOK', '');
		$REFKECAMATAN_ID       = Yii::app()->request->getParam('REFKECAMATAN_ID', '');
		$REFKELURAHAN_ID       = Yii::app()->request->getParam('REFKELURAHAN_ID', '');
		$STATUS_EMAIL          = Yii::app()->request->getParam('STATUS_EMAIL', '');
		$STATUS_AKUN_ESPTPD    = $data['STATUS_AKUN_ESPTPD'] = Yii::app()->request->getParam('STATUS_AKUN_ESPTPD', '');

		$select = "
		{$namaTBL}.*, 
		TBLDAFTAR.*
		";
		$from = ''.$namaTBL.'';

		/*$filter = array(
			'EQ__TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
			,'EQ__TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
			,'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);*/

		$filter_AND = array(
			'EQ__TBLPENDATAAN_THNPAJAK' => substr($TBLPENDATAAN_THNPAJAK,-2),
			'EQ__TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK,
			'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK,
			// 'EQ__TBLDAFTAR.TBLDAFTAR_ISAKTIF' => 'Y',
			'EQ__TBLDAFTAR.TBLKECAMATAN_ID' => $REFKECAMATAN_ID,
			'EQ__TBLDAFTAR.TBLKELURAHAN_ID' => $REFKELURAHAN_ID,
			'EQ__'.$namaTBL.'_TGLENTRI' => '0',
		);

		$otherquery = array(
			// 'limit'=> 30
			'join_daft'=> array('TBLDAFTAR', ''.$namaTBL.'.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK'),
			'order'=> 'TBLDAFTAR_ISAKTIF DESC,'.$namaTBL.'.TBLDAFTAR_NOPOK,'.$namaTBL.'_THNSPTPD, '.$namaTBL.'_BLNSPTPD, '.$namaTBL.'_TGLSPTPD, TBLPENDATAAN_THNPAJAK, TBLPENDATAAN_BLNPAJAK, TBLPENDATAAN_TGLPAJAK',
		);

		// if ($STATUS_EMAIL == 'ADA') :
		// 	$otherquery['andwhere_emailada'] = 'TBLDAFTAR_EMAIL IS NOT NULL';
		// elseif ($STATUS_EMAIL == 'KOSONG') :
		// 	$otherquery['andwhere_emailkosong'] = 'TBLDAFTAR_EMAIL IS NULL';
		// endif;

		$qcek = "(SELECT COUNT(EUSR.S_WP) FROM ESPTPD.XS_USER EUSR WHERE EUSR.S_WP = TBLDAFTAR.TBLDAFTAR_NOPOK) ";
		if ($STATUS_AKUN_ESPTPD == 'PUNYA') :
			$otherquery['andwhere_akun'] = "{$qcek}>=1";
		elseif ($STATUS_AKUN_ESPTPD == 'TIDAK PUNYA') :
			$otherquery['andwhere_akun'] = "{$qcek}<=0";
		endif;

		$arrayConfig = array('select'=>$select,'from'=>$from,/*'filter'=>$filter,*/'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data['table'] = DBFetch::query($arrayConfig);
		$data['namatbl'] = $namaTBL;

		$this->renderPartial('table', array('data'=>$data));
	}

	public function actionCetakSuratTeguran() // QR
    {
    	$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		$is_draft = Yii::app()->request->getParam('is_draft', 'F');



		switch ( $rek ) {
			case '1':
				$namaTBL = 'TBLDAFTHOTEL';
				$nama_pajak = 'PAJAK HOTEL';
				break;
			
			case '2':
				$namaTBL = 'TBLDAFTRMAKAN';
				$nama_pajak = 'PAJAK RESTORAN';
				break;
			
			case '3':
				$namaTBL = 'TBLDAFTHIBURAN';
				$nama_pajak = 'PAJAK HIBURAN';
				break;
			
			case '4':
				$namaTBL = 'TBLDAFTREKLAME';
				$nama_pajak = 'PAJAK REKLAME';
				break;
			
			case '5':
				$namaTBL = 'TBLDAFTPARKIR';
				$nama_pajak = 'PAJAK PARKIR';
				break;
			
			case '6':
				$namaTBL = 'TBLDAFTTANAH';
				$nama_pajak = 'PAJAK AIR TANAH';
				break;
			
			case '7':
				$namaTBL = 'TBLDAFTPARKIR';
				$nama_pajak = 'PAJAK PARKIR';
				break;

			case '8':
				$namaTBL = 'TBLDAFTTANAH';
				$nama_pajak = 'PAJAK AIR TANAH';
				break;
			
			default:
				$namaTBL = 'TBLDAFTHOTEL';
				$nama_pajak = 'PAJAK HOTEL';
				break;
		}

		$TBLPENDATAAN_THNPAJAK = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? $_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$TBLPENDATAAN_BLNPAJAK = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
		$nomor_surat = isset($_REQUEST['nomor_surat']) && !empty($_REQUEST['nomor_surat']) ? $_REQUEST['nomor_surat'] : '';

        $data['filter'] = isset($_REQUEST['data']) ? $_REQUEST['data'] : '';

        if (!empty($data['filter'])) {
            $data['filter'] = explode(',', $data['filter']);
        } else {
            echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
            Yii::app()->end();
        }

        $flag = '';
        $query = '';

        foreach ($data['filter'] as $kodefikasi) {
            $kodefikasi = explode('-', $kodefikasi);
            if (is_array($kodefikasi)) {
                if (!isset($kodefikasi[0])) {
                    echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
                    Yii::app()->end();
                }
                $nopok = $kodefikasi[0];

                $query .= 
                $flag . 
                "
                SELECT ".$namaTBL.".*, TBLDAFTAR.*
                FROM ".$namaTBL."
                INNER JOIN TBLDAFTAR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
                WHERE
                TBLDAFTAR.TBLDAFTAR_NOPOK = ".$nopok."
                AND TBLPENDATAAN_THNPAJAK = ".substr($TBLPENDATAAN_THNPAJAK, -2)."
                AND TBLPENDATAAN_BLNPAJAK = ".$TBLPENDATAAN_BLNPAJAK."
                ";
                $flag = '
                UNION
                ';
            }
        }
        // echo "$query";Yii::app()->end();
        $data['list_teguran'] = Yii::app()->db->createCommand($query)->queryAll();

        $path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
        $namatpl = $path_tpl . 'surat_teguran.docx';
        // $namatpl = $path_tpl . 'surat_teguran-qr.docx';

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
        $data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();

        $dt = array();
        $rows = array();

		$ar_ttd = array(
			'pejabat_nama' => $data['jab1']['TBLPEJABAT_NAMA'],
			'pejabat_nip'  => $data['jab1']['TBLPEJABAT_NIP'],
		);
        
        foreach ($data['list_teguran'] as $kolom) :

            $dt['no'] = null;
            $dt['nosurat'] = $nomor_surat;
            // $dt['nopok'] = sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']);
            $dt['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
            $dt['alamatbadan'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];

            $dt['masapajak'] = strtoupper((LokalIndonesia::getbulan($kolom['TBLPENDATAAN_BLNPAJAK']))) .' 20'. $kolom['TBLPENDATAAN_THNPAJAK'];

            $dt['datenow'] = date('d') .' '. LokalIndonesia::getBulan(date('m')) .' '. date('Y');

            $dt['nopok'] = $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);

            $dt['jenis'] = ''.$nama_pajak.'';

            $dt['jabatan'] = $data['jab1']['TBLPEJABAT_URAIAN'];
            $dt['nama'] = $data['jab1']['TBLPEJABAT_NAMA'];
            $dt['nip'] = $data['jab1']['TBLPEJABAT_NIP'];

            if ($rek=='3') {
            	$dt['keterlambatan'] = '15 (Lima Belas)';
            } else {
            	$dt['keterlambatan'] = '10 (Sepuluh)';
            }

   //          $text1 = 'TEGURAN_SPTPD';
   //          $text2 = 'a.n. KEPALA_KEPALA BIDANG PELAYANAN PENDAFTARAN DAN PENETAPAN PENDAPATAN DAERAH';
   //          $wp_jenis = $nama_pajak;
			// $wp_npwpd = $kolom['TBLDAFTAR_NOPOK'];
			// $wp_nama = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
			// $text = "({$text1}_{$wp_jenis}_{$wp_nama}_{$wp_npwpd}_{$text2}_{$ar_ttd['pejabat_nama']}_{$ar_ttd['pejabat_nip']})";
			// $path = dirname(Yii::app()->getBasePath()).'/assets/temp_qr/'; // letakkan di folder assets
			// $path_qr = $path . "qrcode_teguran_{$wp_npwpd}-{$TBLPENDATAAN_THNPAJAK}-{$TBLPENDATAAN_BLNPAJAK}_{$wp_npwpd}".md5($text).".png";
			// Yii::app()->qrcode->create($text, $path_qr);
			// // echo $path_qr;Yii::app()->end();
			// // $otbs->Plugin(OPENTBS_CHANGE_PICTURE, '#merge_me#', $path_qr, array('unique' => 1));
			// // $otbs->Plugin(OPENTBS_CHANGE_PICTURE, '#merge_me#', $path_qr);
			// $dt['qrpath'] = $path_qr;

        	array_push($rows, $dt);

        	$datateguran = array(
        		'thn' => $TBLPENDATAAN_THNPAJAK,
				'bln' => $TBLPENDATAAN_BLNPAJAK,
				'nopok' => $kolom['TBLDAFTAR_NOPOK'],
				'nomor_surat' => $nomor_surat,
				'NAMA_WP' => $kolom['TBLDAFTAR_BADANUSAHANAMA'],
				'ALAMAT_WP' => $kolom['TBLDAFTAR_BADANUSAHAALAMAT'],
				'NPWPD' => $dt['nopok'],
				'rek' => $rek,
				'is_draft' => $is_draft,
        	);
        	$this->update_teguran($datateguran);


        endforeach;

        // die();

        //SAMPAI SINI QUERYNYA

        // var_dump($data);
        // echo json_encode($data);Yii::app()->end();
        // echo json_encode($rows);Yii::app()->end();

        // Merge data in the first sheet
        $namafileDL = "Surat-Teguran-No:".$nomor_surat.".docx";
        $otbs->MergeBlock('dt', $rows);
        // $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the templatedatenow

        $otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
        // echo "string";Yii::app()->end();
        Yii::app()->end();
    }

	public function update_teguran($data)
	{
		if (isset($data['is_draft']) AND $data['is_draft'] == 'T') {
			# skip
			return false;
		}
		$thn = substr($data['thn'], -2);
		$bln = (int)$data['bln'];
		$nopok = (int)$data['nopok'];

		$sql_exists = "
		SELECT * 
		FROM SYSTEM.TBLTEGURAN
		WHERE 
		THP = :thn
		AND BLP = :bln
		AND NOPOK = :nopok
		";
		$exists = Yii::app()->db->createCommand($sql_exists)
		->bindParam(":thn", $thn)
		->bindParam(":bln", $bln)
		->bindParam(":nopok", $nopok)
		->queryRow();

		$arrdata = array(
			'THP' => substr($data['thn'], -2),
			'BLP' => (int)$data['bln'],
			'NOPOK' => (int)$data['nopok'],
			'NOTEGURAN' => $data['nomor_surat'],
			'TGLTEGURAN' => DMOrcl::getNow(),
			'NAMA_WP' => trim($data['NAMA_WP']),
			'ALAMAT' => trim($data['ALAMAT_WP']),
			'NPWPD' => $data['NPWPD'],
			'JENIS' => $data['rek'],
			'STATUS_DATA' => 'kasubid',
			'STATUS_KIRIM' => $data['STATUS_KIRIM'],
		);
		if (!$exists) :
			$update_teguran = Yii::app()->db->createCommand()
			->insert("TBLTEGURAN", 
				$arrdata
			);
		endif;
	}
}