<?php

class Salin_daribulansebelumyaController extends Controller
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
			AND TBLREKENING_REKAYAT <> 4
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			')->queryAll();
		$data['kecamatan'] = Yii::app()->db->createCommand('SELECT * FROM REFKECAMATAN')->queryAll();
		$data['kelurahan'] = Yii::app()->db->createCommand('SELECT * FROM REFKELURAHAN')->queryAll();
		$data['sub_rek'] = Yii::app()->db->createCommand('
			SELECT * 
			FROM TREKENING 
			WHERE TREKENING_LEVEL = 1 
			AND "SUBSTR"(TREKENING_KODE, 1, 5) <> 41104
			')->queryAll();
		
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

	public function actionSalinData()
    {

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
			
			// case '6':
			// 	$namaTBL = 'TBLDAFTTANAH';
			// 	break;
			
			case '9':
				$namaTBL = 'TBLDAFTBURUNG';
				break;

			case '8':
				$namaTBL = 'TBLDAFTTANAH';
				break;
			
			default:
				$namaTBL = 'TBLDAFTHOTEL';
				break;
		}

		// echo $namaTBL;die();

        // $listData = trim($_REQUEST['listData'],',');
        $listData = base64_decode($_REQUEST['listData']);
        $listData = trim($listData,',');
        $TBLPENDATAAN_THNPAJAK_SALIN = $_REQUEST['TBLPENDATAAN_THNPAJAK_SALIN'] ? $_REQUEST['TBLPENDATAAN_THNPAJAK_SALIN'] : '0';
        $TBLPENDATAAN_BLNPAJAK_SALIN = $_REQUEST['TBLPENDATAAN_BLNPAJAK_SALIN'] ? $_REQUEST['TBLPENDATAAN_BLNPAJAK_SALIN'] : '0';
        // $TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];
        // $TBLDAFTREKLAME_TGLSKPD = date('Y-m-d',strtotime( $_REQUEST['TBLDAFTREKLAME_TGLSKPD'] ));
        // $TBLDAFTREKLAME_TGLBATASSKPD = date('Y-m-d',strtotime( $_REQUEST['TBLDAFTREKLAME_TGLBATASSKPD'] ));
        // $THNPAJAK = substr($TBLPENDATAAN_THNPAJAK, -2);

        $PajakList = explode(',', $listData);
        // print_r($PajakList);

        $arr_nopok = array();
        $arr_info = array();
        foreach ($PajakList as $list) {
            $pch = explode('-', $list);
            $nopokok = isset($pch[0]) ? $pch[0] : 0;
            $TBLDAFTAR_JNSPENDAPATAN = isset($pch[1]) ? $pch[1] : 0;
            $TBLDAFTAR_GOLONGAN = isset($pch[2]) ? $pch[2] : 0;
			$TBLKECAMATAN_ID = isset($pch[3]) ? $pch[3] : 0;
			$TBLKELURAHAN_ID = isset($pch[4]) ? $pch[4] : 0;
			$REKURUSAN = isset($pch[5]) ? $pch[5] : 0;
			$REKPEMERINTAHAN = isset($pch[6]) ? $pch[6] : 0;
			$REKORGANISASI = isset($pch[7]) ? $pch[7] : 0;
			$REKPROGRAM = isset($pch[8]) ? $pch[8] : 0;
			$REKKEGIATAN = isset($pch[9]) ? $pch[9] : 0;
			$REKDINAS = isset($pch[10]) ? $pch[10] : 0;
			$REKBIDANG = isset($pch[11]) ? $pch[11] : 0;
			$REKPENDAPATAN = isset($pch[12]) ? $pch[12] : 0;
			$REKPAD = isset($pch[13]) ? $pch[13] : 0;
			$REKPAJAK = isset($pch[14]) ? $pch[14] : 0;
			$REKAYAT = isset($pch[15]) ? $pch[15] : 0;
			$REKJENIS = isset($pch[16]) ? $pch[16] : 0;
			$JNSPENETAPAN = isset($pch[17]) ? $pch[17] : 0;
			$PERSENTARIF = isset($pch[18]) ? $pch[18] : 0;
			$TGLBATASSPTPD = isset($pch[19]) ? $pch[19] : 0;

            $insert = Yii::app()->db->createCommand();

            // $query = $insert->insert(''.$namaTBL.'', array(
            //      'TBLDAFTAR_NOPOK' => $nopokok
            //     ,''.$namaTBL.'_BLNSKPD' => (int) $TGLSKPD[1]

            // ), 'TBLDAFTAR_NOPOK=:nopok AND TBLPENDATAAN_THNPAJAK=:thn AND TBLPENDATAAN_PAJAKKE=:ke AND TBLPENDATAAN_TGLPAJAK=:tgl AND TBLPENDATAAN_BLNPAJAK=:bln', array(':nopok'=>$nopokok,':thn'=>$thn,':bln'=>$bln,':ke'=>$ke,':tgl'=>$tgl));

            $column = array(
        		 'TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK_SALIN
			    ,'TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK_SALIN
			    ,'TBLPENDATAAN_TGLPAJAK' => '0'
			    ,'TBLDAFTAR_NOPOK' => $nopokok
			    ,'TBLDAFTAR_JNSPENDAPATAN' => $TBLDAFTAR_JNSPENDAPATAN
			    ,'TBLDAFTAR_GOLONGAN' => $TBLDAFTAR_GOLONGAN
			    ,'TBLKECAMATAN_ID' => $TBLKECAMATAN_ID
				,'TBLKELURAHAN_ID' => $TBLKELURAHAN_ID
				,''.$namaTBL.'_REKURUSAN' => $REKURUSAN
				,''.$namaTBL.'_REKPEMERINTAHAN' => $REKPEMERINTAHAN
				,''.$namaTBL.'_REKORGANISASI' => $REKORGANISASI
				,''.$namaTBL.'_REKPROGRAM' => $REKPROGRAM
				,''.$namaTBL.'_REKKEGIATAN' => $REKKEGIATAN
				,''.$namaTBL.'_REKDINAS' => $REKDINAS
				,''.$namaTBL.'_REKBIDANG' => $REKBIDANG
				,''.$namaTBL.'_REKPENDAPATAN' => $REKPENDAPATAN
				,''.$namaTBL.'_REKPAD' => $REKPAD
				,''.$namaTBL.'_REKPAJAK' => $REKPAJAK
				,''.$namaTBL.'_REKAYAT' => $REKAYAT
				,''.$namaTBL.'_REKJENIS' => $REKJENIS
				,''.$namaTBL.'_ISJNSPENETAPAN' => $JNSPENETAPAN
				,''.$namaTBL.'_THNMULAIJUAL' => $TBLPENDATAAN_THNPAJAK_SALIN
				,''.$namaTBL.'_BLNMULAIJUAL' => $TBLPENDATAAN_BLNPAJAK_SALIN
				,''.$namaTBL.'_TGLMULAIJUAL' => '1'
				,''.$namaTBL.'_THNAKHIRJUAL' => $TBLPENDATAAN_THNPAJAK_SALIN
				,''.$namaTBL.'_BLNAKHIRJUAL' => $TBLPENDATAAN_BLNPAJAK_SALIN
				,''.$namaTBL.'_TGLAKHIRJUAL' => '0'
				,''.$namaTBL.'_OMSETPAJAK' => '0'
				,''.$namaTBL.'_PERSENTARIF' => $PERSENTARIF
				,''.$namaTBL.'_THNSPTPD' => $TBLPENDATAAN_THNPAJAK_SALIN
				,''.$namaTBL.'_BLNSPTPD' => $TBLPENDATAAN_BLNPAJAK_SALIN
				,''.$namaTBL.'_TGLSPTPD' => '1'
				,''.$namaTBL.'_THNBATASSPTPD' => $TBLPENDATAAN_THNPAJAK_SALIN
				,''.$namaTBL.'_BLNBATASSPTPD' => $TBLPENDATAAN_BLNPAJAK_SALIN
				,''.$namaTBL.'_TGLBATASSPTPD' => $TGLBATASSPTPD
				,''.$namaTBL.'_THNTERIMA' => $TBLPENDATAAN_THNPAJAK_SALIN
				,''.$namaTBL.'_BLNTERIMA' => $TBLPENDATAAN_BLNPAJAK_SALIN
				,''.$namaTBL.'_TGLTERIMA' => '1'
				,''.$namaTBL.'_THNENTRI' => $TBLPENDATAAN_THNPAJAK_SALIN
				,''.$namaTBL.'_BLNENTRI' => $TBLPENDATAAN_BLNPAJAK_SALIN
				,''.$namaTBL.'_TGLENTRI' => '0'
			);

			$dataFilter['TBLDAFTAR_NOPOK'] = $nopokok;
			$dataFilter['TBLPENDATAAN_THNPAJAK'] = $TBLPENDATAAN_THNPAJAK_SALIN;
			$dataFilter['TBLPENDATAAN_BLNPAJAK'] = $TBLPENDATAAN_BLNPAJAK_SALIN;
			$dataFilter['TBLPENDATAAN_TGLPAJAK'] = '0';
			$dataFilter['nama_tabel'] = $namaTBL;

			if ($this->cekSudahSalin($dataFilter)) {
				 $arr_info[] = $nopokok . ' sudah ada';
			} else {

            $simpan = $insert->insert(''.$namaTBL.'', $column);

            	if ($simpan>0) {
	                // echo CJSON::encode(array('status'=>'success','nopokok'=>$nopokok));
	                $arr_nopok[] = $nopokok;
				 // $arr_info[] = $nopokok . ' berhasil disalin ke vulan x';
	            }
	            else{
	                // echo CJSON::encode(array('status'=>'failed','nopokok'=>$nopokok));
	            }
			} 
        }

        echo CJSON::encode(array('status'=>'success','nopokok'=>$arr_nopok,'failed'=>$arr_info));
    }

    public function cekSudahSalin($dataFilter=array())
    {
    	$cek = Yii::app()->db->createCommand()
    	->select('COUNT(TBLDAFTAR_NOPOK) AS jml')
    	->from(''.$dataFilter['nama_tabel'].'')
    	->where("
    		TBLDAFTAR_NOPOK = :nopok
    		AND NVL(TBLPENDATAAN_THNPAJAK,0) = :tahun
    		AND NVL(TBLPENDATAAN_BLNPAJAK,0) = :bulan
    		AND NVL(TBLPENDATAAN_TGLPAJAK,0) = :tanggal
    	", array(
    		':nopok' => $dataFilter['TBLDAFTAR_NOPOK']
    		,':tahun' => $dataFilter['TBLPENDATAAN_THNPAJAK']
    		,':bulan' => $dataFilter['TBLPENDATAAN_BLNPAJAK']
    		,':tanggal' => $dataFilter['TBLPENDATAAN_TGLPAJAK']
    	))
    	->queryScalar();
    	if ($cek) {
    		return true;
    	} else {
    		return false;
    	}
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
			'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
			,'EQ__TBLPENDATAAN_THNPAJAK' => substr($TBLPENDATAAN_THNPAJAK,-2)
			,'EQ__TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
		);

		$otherquery = array(
			// 'limit'=> 30
			'join'=> array('TBLDAFTAR', ''.$namaTBL.'.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK')
			,'order'=> ''.$namaTBL.'_THNSPTPD, '.$namaTBL.'_BLNSPTPD, '.$namaTBL.'_TGLSPTPD, TBLPENDATAAN_THNPAJAK, TBLPENDATAAN_BLNPAJAK, TBLPENDATAAN_TGLPAJAK'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,/*'filter'=>$filter,*/'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data['table'] = DBFetch::query($arrayConfig);
		$data['namatbl'] = $namaTBL;

		$this->renderPartial('table', array('data'=>$data));
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