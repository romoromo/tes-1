<?php

class Cetak_suratteguranController extends Controller
{
	public function actionIndex()
	{
		$data['URL_APP'] = Yii::app()->getBaseUrl(true);
		$data['rek'] = Yii::app()->db->createCommand('
			SELECT
			*
			FROM
			TBLREKENING
			WHERE
			TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			AND TBLREKENING_REKPAJAK <> 4
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

		$select = ''.$namaTBL.'.*, TBLDAFTAR.*';
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
		);

		$otherquery = array(
			// 'limit'=> 30
			'join'=> array('TBLDAFTAR', ''.$namaTBL.'.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK')
			,'order'=> ''.$namaTBL.'_THNSPTPD, '.$namaTBL.'_BLNSPTPD, '.$namaTBL.'_TGLSPTPD, TBLPENDATAAN_THNPAJAK, TBLPENDATAAN_BLNPAJAK, TBLPENDATAAN_TGLPAJAK'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,/*'filter'=>$filter,*/'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data['list_teguran'] = DBFetch::query($arrayConfig);

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
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

            

        $dt = array();
        $rows = array();
        
        foreach ($data['list_teguran'] as $kolom) :

            $dt['no'] = null;
            $dt['nosurat'] = $nomor_surat;
            // $dt['nopok'] = sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']);
            $dt['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
            $dt['alamatbadan'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];

            $dt['masapajak'] = strtoupper((LokalIndonesia::getbulan($kolom['TBLPENDATAAN_BLNPAJAK']))) .' 20'. $kolom['TBLPENDATAAN_THNPAJAK'];

            $dt['datenow'] = date('d') .' '. LokalIndonesia::getBulan(date('m')) .' '. date('Y');

            $dt['nopok'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);

            $dt['jenis'] = ''.$nama_pajak.'';

            if ($rek=='3') {
            	$dt['keterlambatan'] = '15 (Lima Belas)';
            } else {
            	$dt['keterlambatan'] = '10 (Sepuluh)';
            }

        array_push($rows, $dt);

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

		$TBLPENDATAAN_THNPAJAK = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? $_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$TBLPENDATAAN_BLNPAJAK = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
		$TBLDAFTAR_NOPOK = isset($_REQUEST['TBLDAFTAR_NOPOK']) && !empty($_REQUEST['TBLDAFTAR_NOPOK']) ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';

		$select = ''.$namaTBL.'.*, TBLDAFTAR.*';
		$from = ''.$namaTBL.'';

		/*$filter = array(
			'EQ__TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
			,'EQ__TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
			,'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);*/

		$filter_AND = array(
			'EQ__TBLPENDATAAN_THNPAJAK' => substr($TBLPENDATAAN_THNPAJAK,-2)
			,'EQ__TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
			// ,'EQ__TBLDAFTAR.TBLDAFTAR_ISAKTIF' => 'Y'
			,'EQ__'.$namaTBL.'_TGLENTRI' => '0'
			,'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);

		$otherquery = array(
			// 'limit'=> 30
			'join'=> array('TBLDAFTAR', ''.$namaTBL.'.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK')
			,'order'=> 'TBLDAFTAR_ISAKTIF DESC,'.$namaTBL.'.TBLDAFTAR_NOPOK,'.$namaTBL.'_THNSPTPD, '.$namaTBL.'_BLNSPTPD, '.$namaTBL.'_TGLSPTPD, TBLPENDATAAN_THNPAJAK, TBLPENDATAAN_BLNPAJAK, TBLPENDATAAN_TGLPAJAK'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,/*'filter'=>$filter,*/'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data['table'] = DBFetch::query($arrayConfig);
		$data['namatbl'] = $namaTBL;

		$this->renderPartial('table', array('data'=>$data));
	}

	public function actionCetakSuratTeguran()
    {
    	$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';

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
        
        foreach ($data['list_teguran'] as $kolom) :

            $dt['no'] = null;
            $dt['nosurat'] = $nomor_surat;
            // $dt['nopok'] = sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']);
            $dt['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
            $dt['alamatbadan'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];

            $dt['masapajak'] = strtoupper((LokalIndonesia::getbulan($kolom['TBLPENDATAAN_BLNPAJAK']))) .' 20'. $kolom['TBLPENDATAAN_THNPAJAK'];

            $dt['datenow'] = date('d') .' '. LokalIndonesia::getBulan(date('m')) .' '. date('Y');

            $dt['nopok'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);

            $dt['jenis'] = ''.$nama_pajak.'';

            if ($rek=='3') {
            	$dt['keterlambatan'] = '15 (Lima Belas)';
            } else {
            	$dt['keterlambatan'] = '10 (Sepuluh)';
            }

        array_push($rows, $dt);

        endforeach;

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