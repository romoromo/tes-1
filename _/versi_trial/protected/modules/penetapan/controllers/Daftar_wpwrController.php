<?php

class Daftar_wpwrController extends Controller
{
	public function actionIndex()
	{
		$data['kec'] = Yii::app()->db->createCommand("SELECT * FROM REFKECAMATAN")
		->queryAll();
		$data['rek'] = Yii::app()->db->createCommand("SELECT * FROM REFBADANUSAHA")->queryAll();

		$this->renderPartial('index', array('data' => $data));
	}

	public function actionCetak()
    {
        $data['URL_APP']=Yii::app()->getBaseUrl(true);

		$TBLDAFTAR_NOPOK = !empty(DMOrcl::getRequest('TBLDAFTAR_NOPOK')) ? DMOrcl::getRequest('TBLDAFTAR_NOPOK') : '';
		$TBLDAFTAR_JENISPENDAPATAN = !empty(DMOrcl::getRequest('TBLDAFTAR_JENISPENDAPATAN')) ? DMOrcl::getRequest('TBLDAFTAR_JENISPENDAPATAN') : '';
		$TBLDAFTAR_GOLONGAN = !empty(DMOrcl::getRequest('TBLDAFTAR_GOLONGAN')) ? DMOrcl::getRequest('TBLDAFTAR_GOLONGAN') : '';
		$REFBADANUSAHA_ID = !empty(DMOrcl::getRequest('REFBADANUSAHA_ID')) ? DMOrcl::getRequest('REFBADANUSAHA_ID') : '';
		$TBLDAFTAR_ISAKTIF = !empty(DMOrcl::getRequest('TBLDAFTAR_ISAKTIF')) ? DMOrcl::getRequest('TBLDAFTAR_ISAKTIF') : '';
		$TBLDAFTAR_PEMILIKNAMA = !empty(DMOrcl::getRequest('TBLDAFTAR_PEMILIKNAMA')) ? DMOrcl::getRequest('TBLDAFTAR_PEMILIKNAMA') : '';
		$TBLKECAMATAN_IDPEMILIK = !empty(DMOrcl::getRequest('TBLKECAMATAN_IDPEMILIK')) ? DMOrcl::getRequest('TBLKECAMATAN_IDPEMILIK') : '';
		$TBLKELURAHAN_IDPEMILIK = !empty(DMOrcl::getRequest('TBLKELURAHAN_IDPEMILIK')) ? DMOrcl::getRequest('TBLKELURAHAN_IDPEMILIK') : '';
		$TBLDAFTAR_PEMILIKALAMAT = !empty(DMOrcl::getRequest('TBLDAFTAR_PEMILIKALAMAT')) ? DMOrcl::getRequest('TBLDAFTAR_PEMILIKALAMAT') : '';
		$TBLDAFTAR_BADANUSAHANAMA = !empty(DMOrcl::getRequest('TBLDAFTAR_BADANUSAHANAMA')) ? DMOrcl::getRequest('TBLDAFTAR_BADANUSAHANAMA') : '';
		$TBLKECAMATAN_IDBADANUSAHA = !empty(DMOrcl::getRequest('TBLKECAMATAN_IDBADANUSAHA')) ? DMOrcl::getRequest('TBLKECAMATAN_IDBADANUSAHA') : '';
		$TBLKELURAHAN_IDBADANUSAHA = !empty(DMOrcl::getRequest('TBLKELURAHAN_IDBADANUSAHA')) ? DMOrcl::getRequest('TBLKELURAHAN_IDBADANUSAHA') : '';
		$TBLDAFTAR_BADANUSAHAALAMAT = !empty(DMOrcl::getRequest('TBLDAFTAR_BADANUSAHAALAMAT')) ? DMOrcl::getRequest('TBLDAFTAR_BADANUSAHAALAMAT') : '';

        $select = "
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
				(
					SELECT
						REFKELURAHAN.REFKELURAHAN_NAMA
					FROM
						REFKELURAHAN
					WHERE
						REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
					AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKELURAHAN,
				(
					SELECT
						REFKECAMATAN.REFKECAMATAN_NAMA
					FROM
						REFKECAMATAN
					WHERE
						REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKECAMATAN_NAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
				TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA,
				TBLDAFTAR.REFBADANUSAHA_IDPEMILIK,
				TBLDAFTAR.TBLDAFTAR_ISAKTIF,
				NVL (
					TBLDAFTAR.TBLDAFTAR_ALASANNONAKTIF,
					'-'
				) AS TBLDAFTAR_ALASANNONAKTIF";
         $from = 'TBLDAFTAR';

         $otherquery = array(
             'leftjoin_REFBADANUSAHA'=>array('REFBADANUSAHA','TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA=REFBADANUSAHA.REFBADANUSAHA_ID')
             ,'order'=> 'TBLDAFTAR_TANGGALKUKUH ASC'
             // ,'leftjoin_REFBADANUSAHA'=>array('TBLDAFTAR','TBLDAFTAR.REFBADANUSAHA_IDPEMILIK=REFBADANUSAHA.REFBADANUSAHA_ID')
        );

        $filter = array(
            'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
			,'EQ__TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN' => $TBLDAFTAR_JENISPENDAPATAN
			,'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $TBLDAFTAR_GOLONGAN
			,'EQ__TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA' => $REFBADANUSAHA_ID
			,'EQ__TBLDAFTAR.TBLDAFTAR_ISAKTIF' => $TBLDAFTAR_ISAKTIF
			,'LK__TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA' => $TBLDAFTAR_PEMILIKNAMA
			,'EQ__TBLDAFTAR.TBLKECAMATAN_IDPEMILIK' => $TBLKECAMATAN_IDPEMILIK
			,'EQ__TBLDAFTAR.TBLKELURAHAN_IDPEMILIK' => $TBLKELURAHAN_IDPEMILIK
			,'LK__TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT' => $TBLDAFTAR_PEMILIKALAMAT
			,'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA' => $TBLDAFTAR_BADANUSAHANAMA
			,'EQ__TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA' => $TBLKECAMATAN_IDBADANUSAHA
			,'EQ__TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA' => $TBLKELURAHAN_IDBADANUSAHA
			,'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT' => $TBLDAFTAR_BADANUSAHAALAMAT
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
        $data['cetak'] = DBFetch::query($arrayConfig);

        $this->renderPartial('cetak_daftar', array('data'=>$data));
    }

    public function actionCetakWord()
    {

    	$data['URL_APP']=Yii::app()->getBaseUrl(true);

		$TBLDAFTAR_NOPOK = !empty(DMOrcl::getRequest('TBLDAFTAR_NOPOK')) ? DMOrcl::getRequest('TBLDAFTAR_NOPOK') : '';
		$TBLDAFTAR_JENISPENDAPATAN = !empty(DMOrcl::getRequest('TBLDAFTAR_JENISPENDAPATAN')) ? DMOrcl::getRequest('TBLDAFTAR_JENISPENDAPATAN') : '';
		$TBLDAFTAR_GOLONGAN = !empty(DMOrcl::getRequest('TBLDAFTAR_GOLONGAN')) ? DMOrcl::getRequest('TBLDAFTAR_GOLONGAN') : '';
		$REFBADANUSAHA_ID = !empty(DMOrcl::getRequest('REFBADANUSAHA_ID')) ? DMOrcl::getRequest('REFBADANUSAHA_ID') : '';
		$TBLDAFTAR_ISAKTIF = !empty(DMOrcl::getRequest('TBLDAFTAR_ISAKTIF')) ? DMOrcl::getRequest('TBLDAFTAR_ISAKTIF') : '';
		$TBLDAFTAR_PEMILIKNAMA = !empty(DMOrcl::getRequest('TBLDAFTAR_PEMILIKNAMA')) ? DMOrcl::getRequest('TBLDAFTAR_PEMILIKNAMA') : '';
		$TBLKECAMATAN_IDPEMILIK = !empty(DMOrcl::getRequest('TBLKECAMATAN_IDPEMILIK')) ? DMOrcl::getRequest('TBLKECAMATAN_IDPEMILIK') : '';
		$TBLKELURAHAN_IDPEMILIK = !empty(DMOrcl::getRequest('TBLKELURAHAN_IDPEMILIK')) ? DMOrcl::getRequest('TBLKELURAHAN_IDPEMILIK') : '';
		$TBLDAFTAR_PEMILIKALAMAT = !empty(DMOrcl::getRequest('TBLDAFTAR_PEMILIKALAMAT')) ? DMOrcl::getRequest('TBLDAFTAR_PEMILIKALAMAT') : '';
		$TBLDAFTAR_BADANUSAHANAMA = !empty(DMOrcl::getRequest('TBLDAFTAR_BADANUSAHANAMA')) ? DMOrcl::getRequest('TBLDAFTAR_BADANUSAHANAMA') : '';
		$TBLKECAMATAN_IDBADANUSAHA = !empty(DMOrcl::getRequest('TBLKECAMATAN_IDBADANUSAHA')) ? DMOrcl::getRequest('TBLKECAMATAN_IDBADANUSAHA') : '';
		$TBLKELURAHAN_IDBADANUSAHA = !empty(DMOrcl::getRequest('TBLKELURAHAN_IDBADANUSAHA')) ? DMOrcl::getRequest('TBLKELURAHAN_IDBADANUSAHA') : '';
		$TBLDAFTAR_BADANUSAHAALAMAT = !empty(DMOrcl::getRequest('TBLDAFTAR_BADANUSAHAALAMAT')) ? DMOrcl::getRequest('TBLDAFTAR_BADANUSAHAALAMAT') : '';

		$TBLDAFTAR_TANGGALKUKUH = !empty(DMOrcl::getRequest('TBLDAFTAR_TANGGALKUKUH')) ? DMOrcl::getRequest('TBLDAFTAR_TANGGALKUKUH') : '';
		$TBLDAFTAR_BULANKUKUH = !empty(DMOrcl::getRequest('TBLDAFTAR_BULANKUKUH')) ? DMOrcl::getRequest('TBLDAFTAR_BULANKUKUH') : '';
		$TBLDAFTAR_TAHUNKUKUH = !empty(DMOrcl::getRequest('TBLDAFTAR_TAHUNKUKUH')) ? DMOrcl::getRequest('TBLDAFTAR_TAHUNKUKUH') : '';

		$REKENING = !empty(DMOrcl::getRequest('REKENING')) ? DMOrcl::getRequest('REKENING') : '';

        $select = "
			TBLDAFTAR.*,
			REFBADANUSAHA.*,
				(
					SELECT
						REFKELURAHAN.REFKELURAHAN_NAMA
					FROM
						REFKELURAHAN
					WHERE
						REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
					AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKELURAHAN,
				(
					SELECT
						REFKECAMATAN.REFKECAMATAN_NAMA
					FROM
						REFKECAMATAN
					WHERE
						REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKECAMATAN_NAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
				TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA,
				TBLDAFTAR.REFBADANUSAHA_IDPEMILIK,
				TBLDAFTAR.TBLDAFTAR_ISAKTIF,
				NVL (
					TBLDAFTAR.TBLDAFTAR_ALASANNONAKTIF,
					'-'
				) AS TBLDAFTAR_ALASANNONAKTIF";
        $from = 'TBLDAFTAR';

        $otherquery = array(
             'leftjoin_REFBADANUSAHA'=>array('REFBADANUSAHA','TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA=REFBADANUSAHA.REFBADANUSAHA_ID')
             ,'order'=> 'TBLDAFTAR_TANGGALKUKUH ASC'
             ,'filter_AND' => 'AND TBLDAFTAR.TBLDAFTAR_NOPOK <> 150000'
             // ,'leftjoin_REFBADANUSAHA'=>array('TBLDAFTAR','TBLDAFTAR.REFBADANUSAHA_IDPEMILIK=REFBADANUSAHA.REFBADANUSAHA_ID')
        );

        $filter = array(
            'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
			,'EQ__TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN' => $TBLDAFTAR_JENISPENDAPATAN
			,'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $TBLDAFTAR_GOLONGAN
			,'EQ__TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA' => $REFBADANUSAHA_ID
			,'EQ__TBLDAFTAR.TBLDAFTAR_ISAKTIF' => $TBLDAFTAR_ISAKTIF
			,'LK__TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA' => $TBLDAFTAR_PEMILIKNAMA
			,'EQ__TBLDAFTAR.TBLKECAMATAN_IDPEMILIK' => $TBLKECAMATAN_IDPEMILIK
			,'EQ__TBLDAFTAR.TBLKELURAHAN_IDPEMILIK' => $TBLKELURAHAN_IDPEMILIK
			,'LK__TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT' => $TBLDAFTAR_PEMILIKALAMAT
			,'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA' => $TBLDAFTAR_BADANUSAHANAMA
			,'EQ__TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA' => $TBLKECAMATAN_IDBADANUSAHA
			,'EQ__TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA' => $TBLKELURAHAN_IDBADANUSAHA
			,'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT' => $TBLDAFTAR_BADANUSAHAALAMAT
			,'EQ__TBLDAFTAR.TBLDAFTAR_TANGGALKUKUH' => $TBLDAFTAR_TANGGALKUKUH
			,'EQ__TBLDAFTAR.TBLDAFTAR_BULANKUKUH' => $TBLDAFTAR_BULANKUKUH
			,'EQ__TBLDAFTAR.TBLDAFTAR_TAHUNKUKUH' => $TBLDAFTAR_TAHUNKUKUH
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $REKENING
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
        $data['cetak'] = DBFetch::query($arrayConfig);

    	$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_kukuh' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'Daftar-Induk-WP-WR.docx';

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
		$gol = array('gol'=>0); $namarek = array('namarek'=>0); $no=1; foreach ($data['cetak'] as $kolom) :

			$dt['no'] = $no++;

			$dt['tglkukuh'] = $kolom['TBLDAFTAR_TANGGALKUKUH'] .'/'. $kolom['TBLDAFTAR_BULANKUKUH'] .'/20'. $kolom['TBLDAFTAR_TAHUNKUKUH'];
			$dt['nokukuh'] = $kolom['TBLDAFTAR_NOKUKUH'];

			$dt['tgltunjuk'] = '';
			$dt['notunjuk'] = '';

			$dt['namabu'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
			$dt['namamilik'] = $kolom['TBLDAFTAR_PEMILIKNAMA'];

			$dt['alamatbu'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
			$dt['alamatmilik'] = $kolom['TBLDAFTAR_PEMILIKALAMAT'];

			$dt['npwpd'] = $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d", $kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);
			
			$dt['keterangan'] = '';

			$namarek['namarek'] = $kolom['REFBADANUSAHA_NAMA'];
			$gol['gol'] = $kolom['TBLDAFTAR_GOLONGAN'];

			array_push($rows, $dt);

			endforeach;

			$header = array();

			if ($gol['gol']==1) {
				$header['golongan'] = 'I';
			} elseif ($gol['gol']==2) {
				$header['golongan'] = 'II';
			} elseif ($gol['gol']==3) {
				$header['golongan'] = 'III';
			} elseif ($gol['gol']==4) {
				$header['golongan'] = 'IV';
			} else {
				$header['golongan'] = '0';
			}

			$bulan = isset($_REQUEST['TBLDAFTAR_BULANKUKUH']) && !empty($_REQUEST['TBLDAFTAR_BULANKUKUH']) ? (int)$_REQUEST['TBLDAFTAR_BULANKUKUH'] : '';
			$tahun = isset($_REQUEST['TBLDAFTAR_TAHUNKUKUH']) && !empty($_REQUEST['TBLDAFTAR_TAHUNKUKUH']) ? (int)$_REQUEST['TBLDAFTAR_TAHUNKUKUH'] : '';
			$rek = isset($_REQUEST['REKENING']) && !empty($_REQUEST['REKENING']) ? (int)$_REQUEST['REKENING'] : '';

			if ($bulan=='') {
				$header['bulan'] = '0';
			} else {
				$header['bulan'] = strtoupper(LokalIndonesia::getbulan($bulan));
			}

			$header['tahun'] = $tahun;

			if ($rek==1) {
				$header['nama_pajak'] = 'HOTEL';
			} else if ($rek==2) {
				$header['nama_pajak'] = 'RESTORAN';
			} else if ($rek==3) {
				$header['nama_pajak'] = 'HIBURAN';
			} else if ($rek==4) {
				$header['nama_pajak'] = 'REKLAME';
			} else if ($rek==5) {
				$header['nama_pajak'] = 'PJU';
			} else if ($rek==7) {
				$header['nama_pajak'] = 'PARKIR';
			} else if ($rek==8) {
				$header['nama_pajak'] = 'AIR TANAH';
			} else {
				$header['nama_pajak'] = '';
			}

			// $thn_spt = isset($_REQUEST['ENTRI_THNPAJAK']) && !empty($_REQUEST['ENTRI_THNPAJAK']) ? (int)$_REQUEST['ENTRI_THNPAJAK'] : '';

			//SAMPAI SINI QUERYNYA

			// var_dump($data);
			// echo json_encode($data);Yii::app()->end();
			// echo json_encode($row);

			// Merge data in the first sheet 
			// $npwpd = $data['TBLDAFTAR_NOPOK'];
			$namafileDL = "DAFTAR-INDUK-WP/WR.docx";
			$otbs->MergeBlock('dt', $rows); 
			$otbs->MergeField('header', $header); 
			// $otbs->MergeField('setoran', $setoran); 
			// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

			$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
			Yii::app()->end();
    }

    public function actionCetak_status()
    {
    	$data['URL_APP']=Yii::app()->getBaseUrl(true);

		$TBLDAFTAR_NOPOK = !empty(DMOrcl::getRequest('TBLDAFTAR_NOPOK')) ? DMOrcl::getRequest('TBLDAFTAR_NOPOK') : '';
		$TBLDAFTAR_JENISPENDAPATAN = !empty(DMOrcl::getRequest('TBLDAFTAR_JENISPENDAPATAN')) ? DMOrcl::getRequest('TBLDAFTAR_JENISPENDAPATAN') : '';
		$TBLDAFTAR_GOLONGAN = !empty(DMOrcl::getRequest('TBLDAFTAR_GOLONGAN')) ? DMOrcl::getRequest('TBLDAFTAR_GOLONGAN') : '';
		$REFBADANUSAHA_ID = !empty(DMOrcl::getRequest('REFBADANUSAHA_ID')) ? DMOrcl::getRequest('REFBADANUSAHA_ID') : '';
		$TBLDAFTAR_ISAKTIF = !empty(DMOrcl::getRequest('TBLDAFTAR_ISAKTIF')) ? DMOrcl::getRequest('TBLDAFTAR_ISAKTIF') : '';
		$TBLDAFTAR_PEMILIKNAMA = !empty(DMOrcl::getRequest('TBLDAFTAR_PEMILIKNAMA')) ? DMOrcl::getRequest('TBLDAFTAR_PEMILIKNAMA') : '';
		$TBLKECAMATAN_IDPEMILIK = !empty(DMOrcl::getRequest('TBLKECAMATAN_IDPEMILIK')) ? DMOrcl::getRequest('TBLKECAMATAN_IDPEMILIK') : '';
		$TBLKELURAHAN_IDPEMILIK = !empty(DMOrcl::getRequest('TBLKELURAHAN_IDPEMILIK')) ? DMOrcl::getRequest('TBLKELURAHAN_IDPEMILIK') : '';
		$TBLDAFTAR_PEMILIKALAMAT = !empty(DMOrcl::getRequest('TBLDAFTAR_PEMILIKALAMAT')) ? DMOrcl::getRequest('TBLDAFTAR_PEMILIKALAMAT') : '';
		$TBLDAFTAR_BADANUSAHANAMA = !empty(DMOrcl::getRequest('TBLDAFTAR_BADANUSAHANAMA')) ? DMOrcl::getRequest('TBLDAFTAR_BADANUSAHANAMA') : '';
		$TBLKECAMATAN_IDBADANUSAHA = !empty(DMOrcl::getRequest('TBLKECAMATAN_IDBADANUSAHA')) ? DMOrcl::getRequest('TBLKECAMATAN_IDBADANUSAHA') : '';
		$TBLKELURAHAN_IDBADANUSAHA = !empty(DMOrcl::getRequest('TBLKELURAHAN_IDBADANUSAHA')) ? DMOrcl::getRequest('TBLKELURAHAN_IDBADANUSAHA') : '';
		$TBLDAFTAR_BADANUSAHAALAMAT = !empty(DMOrcl::getRequest('TBLDAFTAR_BADANUSAHAALAMAT')) ? DMOrcl::getRequest('TBLDAFTAR_BADANUSAHAALAMAT') : '';

        $select = "
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
				(
					SELECT
						REFKELURAHAN.REFKELURAHAN_NAMA
					FROM
						REFKELURAHAN
					WHERE
						REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
					AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKELURAHAN,
				(
					SELECT
						REFKECAMATAN.REFKECAMATAN_NAMA
					FROM
						REFKECAMATAN
					WHERE
						REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKECAMATAN_NAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
				TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA,
				TBLDAFTAR.REFBADANUSAHA_IDPEMILIK,
				TBLDAFTAR.TBLDAFTAR_ISAKTIF,
				NVL (
					TBLDAFTAR.TBLDAFTAR_ALASANNONAKTIF,
					'-'
				) AS TBLDAFTAR_ALASANNONAKTIF";
         $from = 'TBLDAFTAR';

         $otherquery = array(
             'leftjoin_REFBADANUSAHA'=>array('REFBADANUSAHA','TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA=REFBADANUSAHA.REFBADANUSAHA_ID')
             // ,'order'=> 'TBLKECAMATAN_IDBADANUSAHA, TBLDAFTAR_NOPOK ASC'
             // ,'leftjoin_REFBADANUSAHA'=>array('TBLDAFTAR','TBLDAFTAR.REFBADANUSAHA_IDPEMILIK=REFBADANUSAHA.REFBADANUSAHA_ID')
        );

        $filter = array(
            'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
			,'EQ__TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN' => $TBLDAFTAR_JENISPENDAPATAN
			,'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $TBLDAFTAR_GOLONGAN
			,'EQ__TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA' => $REFBADANUSAHA_ID
			,'EQ__TBLDAFTAR.TBLDAFTAR_ISAKTIF' => $TBLDAFTAR_ISAKTIF
			,'LK__TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA' => $TBLDAFTAR_PEMILIKNAMA
			,'EQ__TBLDAFTAR.TBLKECAMATAN_IDPEMILIK' => $TBLKECAMATAN_IDPEMILIK
			,'EQ__TBLDAFTAR.TBLKELURAHAN_IDPEMILIK' => $TBLKELURAHAN_IDPEMILIK
			,'LK__TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT' => $TBLDAFTAR_PEMILIKALAMAT
			,'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA' => $TBLDAFTAR_BADANUSAHANAMA
			,'EQ__TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA' => $TBLKECAMATAN_IDBADANUSAHA
			,'EQ__TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA' => $TBLKELURAHAN_IDBADANUSAHA
			,'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT' => $TBLDAFTAR_BADANUSAHAALAMAT
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
        $data['cetak'] = DBFetch::query($arrayConfig);

        $this->renderPartial('cetak_daftar_status', array('data'=>$data));
    }

    public function actionsetRekening()
	{
		$idgol = (int)$_REQUEST['value'];

		$rekening = Yii::app()->db->createCommand("
		SELECT *
		FROM
		REFBADANUSAHA
		WHERE
			REFBADANUSAHA_GOLONGAN = ".$idgol)
		->queryAll();

		if ($idgol == 4) {

			$rekening = Yii::app()->db->createCommand("
			SELECT *
			FROM
			REFBADANUSAHA
			WHERE
				REFBADANUSAHA_REKAYAT = 3")
			->queryAll();
		}

			echo '<option value="">== Silahkan Pilih Rekening ==</option>';
		foreach ($rekening as $rek) {
			echo '<option value="'.$rek['REFBADANUSAHA_ID'].'">'.$rek['REFBADANUSAHA_NAMA'].'</option>';
		}
		
		// print_r($rekening);

	}

	public function actiongetKelurahan()
	{
		$kec = $_REQUEST['value'];

		$kelurahan = Yii::app()->db->createCommand("
		SELECT *
		FROM
		REFKELURAHAN
		WHERE
			REFKECAMATAN_ID =".$kec)
		->queryAll();

			echo '<option value="">== Silahkan Pilih Kelurahan ==</option>';
		foreach ($kelurahan as $kel) {
			echo '<option value="'.$kel['REFKELURAHAN_ID'].'">'.$kel['REFKELURAHAN_NAMA'].'</option>';
		}

	}

	public function actiongetKelurahan2()
	{
		$kec = $_REQUEST['value'];

		$kelurahan = Yii::app()->db->createCommand("
		SELECT *
		FROM
		REFKELURAHAN
		WHERE
			REFKECAMATAN_ID =".$kec)
		->queryAll();

			echo '<option value="">== Silahkan Pilih Kelurahan ==</option>';
		foreach ($kelurahan as $kel) {
			echo '<option value="'.$kel['REFKELURAHAN_ID'].'">'.$kel['REFKELURAHAN_NAMA'].'</option>';
		}

	}

	public function actiongetKelurahanedit()
	{
		$kec = $_REQUEST['value'];

		$kelurahan = Yii::app()->db->createCommand("
		SELECT *
		FROM
		REFKELURAHAN
		WHERE
			REFKECAMATAN_ID =".$kec)
		->queryAll();

			echo '<option value="">== Silahkan Pilih Kelurahan ==</option>';
		foreach ($kelurahan as $kel) {
			echo '<option value="'.$kel['REFKELURAHAN_ID'].'">'.$kel['REFKELURAHAN_NAMA'].'</option>';
		}

	}

	public function actiongetKelurahanedit2()
	{
		$kec = $_REQUEST['value'];

		$kelurahan = Yii::app()->db->createCommand("
		SELECT *
		FROM
		REFKELURAHAN
		WHERE
			REFKECAMATAN_ID =".$kec)
		->queryAll();

			echo '<option value="">== Silahkan Pilih Kelurahan ==</option>';
		foreach ($kelurahan as $kel) {
			echo '<option value="'.$kel['REFKELURAHAN_ID'].'">'.$kel['REFKELURAHAN_NAMA'].'</option>';
		}

	}

	public function actionautocompletewp()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');
		
		$query = trim($_REQUEST['query']);

		$select = "
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'LK__TBLDAFTAR_BADANUSAHANAMA' => $query
			,'LK__TBLDAFTAR_BADANUSAHAALAMAT' => $query
			,'LK__TBLDAFTAR_NOPOK' => $query
		);

		/*$filter_AND = array(
			'EQ__TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			// ,'EQ__tblsubyek_isaktif' => "T"
		);*/

		$otherquery = array(
			'limit'=> 30
			// ,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'order'=> 'TBLDAFTAR_NOPOK ASC'
		);

		// $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
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
			// ,"REKENING_KODE" => $result['REKENING_KODE']
			);
		}

		 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}
	
	public function actionGetData()
    {
        $TBLDAFTAR_NOPOK = !empty(DMOrcl::getRequest('TBLDAFTAR_NOPOK')) ? DMOrcl::getRequest('TBLDAFTAR_NOPOK') : '';
		$TBLDAFTAR_JENISPENDAPATAN = !empty(DMOrcl::getRequest('TBLDAFTAR_JENISPENDAPATAN')) ? DMOrcl::getRequest('TBLDAFTAR_JENISPENDAPATAN') : '';
		$TBLDAFTAR_GOLONGAN = !empty(DMOrcl::getRequest('TBLDAFTAR_GOLONGAN')) ? DMOrcl::getRequest('TBLDAFTAR_GOLONGAN') : '';
		$REFBADANUSAHA_ID = !empty(DMOrcl::getRequest('REFBADANUSAHA_ID')) ? DMOrcl::getRequest('REFBADANUSAHA_ID') : '';
		$TBLDAFTAR_ISAKTIF = !empty(DMOrcl::getRequest('TBLDAFTAR_ISAKTIF')) ? DMOrcl::getRequest('TBLDAFTAR_ISAKTIF') : '';
		$TBLDAFTAR_PEMILIKNAMA = !empty(DMOrcl::getRequest('TBLDAFTAR_PEMILIKNAMA')) ? DMOrcl::getRequest('TBLDAFTAR_PEMILIKNAMA') : '';
		$TBLKECAMATAN_IDPEMILIK = !empty(DMOrcl::getRequest('TBLKECAMATAN_IDPEMILIK')) ? DMOrcl::getRequest('TBLKECAMATAN_IDPEMILIK') : '';
		$TBLKELURAHAN_IDPEMILIK = !empty(DMOrcl::getRequest('TBLKELURAHAN_IDPEMILIK')) ? DMOrcl::getRequest('TBLKELURAHAN_IDPEMILIK') : '';
		$TBLDAFTAR_PEMILIKALAMAT = !empty(DMOrcl::getRequest('TBLDAFTAR_PEMILIKALAMAT')) ? DMOrcl::getRequest('TBLDAFTAR_PEMILIKALAMAT') : '';
		$TBLDAFTAR_BADANUSAHANAMA = !empty(DMOrcl::getRequest('TBLDAFTAR_BADANUSAHANAMA')) ? DMOrcl::getRequest('TBLDAFTAR_BADANUSAHANAMA') : '';
		$TBLKECAMATAN_IDBADANUSAHA = !empty(DMOrcl::getRequest('TBLKECAMATAN_IDBADANUSAHA')) ? DMOrcl::getRequest('TBLKECAMATAN_IDBADANUSAHA') : '';
		$TBLKELURAHAN_IDBADANUSAHA = !empty(DMOrcl::getRequest('TBLKELURAHAN_IDBADANUSAHA')) ? DMOrcl::getRequest('TBLKELURAHAN_IDBADANUSAHA') : '';
		$TBLDAFTAR_BADANUSAHAALAMAT = !empty(DMOrcl::getRequest('TBLDAFTAR_BADANUSAHAALAMAT')) ? DMOrcl::getRequest('TBLDAFTAR_BADANUSAHAALAMAT') : '';

		$TBLDAFTAR_TANGGALKUKUH = !empty(DMOrcl::getRequest('TBLDAFTAR_TANGGALKUKUH')) ? DMOrcl::getRequest('TBLDAFTAR_TANGGALKUKUH') : '';
		$TBLDAFTAR_BULANKUKUH = !empty(DMOrcl::getRequest('TBLDAFTAR_BULANKUKUH')) ? DMOrcl::getRequest('TBLDAFTAR_BULANKUKUH') : '';
		$TBLDAFTAR_TAHUNKUKUH = !empty(DMOrcl::getRequest('TBLDAFTAR_TAHUNKUKUH')) ? DMOrcl::getRequest('TBLDAFTAR_TAHUNKUKUH') : '';

		// $TBLDAFTAR_TAHUNKUKUH_SUBSTR  = substr($TBLDAFTAR_TAHUNKUKUH, -2);

		$REKENING = !empty(DMOrcl::getRequest('REKENING')) ? DMOrcl::getRequest('REKENING') : '';

         $select = "

			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			REFBADANUSAHA.*,
				(
					SELECT
						REFKELURAHAN.REFKELURAHAN_NAMA
					FROM
						REFKELURAHAN
					WHERE
						REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
					AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKELURAHAN,
				(
					SELECT
						REFKECAMATAN.REFKECAMATAN_NAMA
					FROM
						REFKECAMATAN
					WHERE
						REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKECAMATAN_NAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
				TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA,
				TBLDAFTAR.REFBADANUSAHA_IDPEMILIK,
				TBLDAFTAR.TBLDAFTAR_ISAKTIF,
				NVL (
					TBLDAFTAR.TBLDAFTAR_ALASANNONAKTIF,
					'-'
				) AS TBLDAFTAR_ALASANNONAKTIF";
         $from = 'TBLDAFTAR';

         $otherquery = array(
             'leftjoin_REFBADANUSAHA'=>array('REFBADANUSAHA','TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA=REFBADANUSAHA.REFBADANUSAHA_ID')
             ,'order'=> 'TBLDAFTAR_TANGGALKUKUH ASC'
             // ,'leftjoin_REFBADANUSAHA'=>array('TBLDAFTAR','TBLDAFTAR.REFBADANUSAHA_IDPEMILIK=REFBADANUSAHA.REFBADANUSAHA_ID')
        );

        $filter = array(
            'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
			,'EQ__TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN' => $TBLDAFTAR_JENISPENDAPATAN
			,'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $TBLDAFTAR_GOLONGAN
			,'EQ__TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA' => $REFBADANUSAHA_ID
			,'EQ__TBLDAFTAR.TBLDAFTAR_ISAKTIF' => $TBLDAFTAR_ISAKTIF
			,'LK__TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA' => $TBLDAFTAR_PEMILIKNAMA
			,'EQ__TBLDAFTAR.TBLKECAMATAN_IDPEMILIK' => $TBLKECAMATAN_IDPEMILIK
			,'EQ__TBLDAFTAR.TBLKELURAHAN_IDPEMILIK' => $TBLKELURAHAN_IDPEMILIK
			,'LK__TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT' => $TBLDAFTAR_PEMILIKALAMAT
			,'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA' => $TBLDAFTAR_BADANUSAHANAMA
			,'EQ__TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA' => $TBLKECAMATAN_IDBADANUSAHA
			,'EQ__TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA' => $TBLKELURAHAN_IDBADANUSAHA
			,'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT' => $TBLDAFTAR_BADANUSAHAALAMAT
			,'EQ__TBLDAFTAR.TBLDAFTAR_TANGGALKUKUH' => $TBLDAFTAR_TANGGALKUKUH
			,'EQ__TBLDAFTAR.TBLDAFTAR_BULANKUKUH' => $TBLDAFTAR_BULANKUKUH
			,'EQ__TBLDAFTAR.TBLDAFTAR_TAHUNKUKUH' => $TBLDAFTAR_TAHUNKUKUH
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $REKENING
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
        $data['daftar'] = DBFetch::query($arrayConfig);

        $this->renderPartial('grid', array('data'=>$data));
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