<?php

class Edit_datasptController extends Controller
{
	public function actionIndex()
	{
		$data['kec'] = Yii::app()->db->createCommand("SELECT * FROM REFKECAMATAN")->queryAll();
		$data['rek'] = Yii::app()->db->createCommand("SELECT * FROM REFBADANUSAHA")->queryAll();
		$data['tblrek'] = Yii::app()->db->createCommand("SELECT * FROM TBLREKENING TBLREKENING_KODE ORDER BY TBLREKENING_KODE")->queryAll();

		$this->renderPartial('index', array('data' => $data));
	}

	public function actionCetak()
    {
        $data['URL_APP']=Yii::app()->getBaseUrl(true);

		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
        $TBLDAFTAR_JENISPENDAPATAN = $_REQUEST['TBLDAFTAR_JENISPENDAPATAN'];

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
            ,'EQ__TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN'=> $TBLDAFTAR_JENISPENDAPATAN
            //,'EQ__TBLDAFTAR.TBLKECAMATAN_IDPEMILIK' => $TBLKECAMATAN_IDPEMILIK
            // ,'LK__TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA' => $TBLDAFTAR_PEMILIKNAMA
            // ,'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA' => $TBLDAFTAR_BADANUSAHANAMA
            // ,'EQ__TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA' => $TBLKECAMATAN_IDBADANUSAHA
            // ,'EQ__TBLDAFTAR.REFKELURAHAN_IDBADANUSAHA' => $REFKELURAHAN_IDBADANUSAHA
            // ,'EQ__TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA' => $REFBADANUSAHA_IDBADANUSAHA
            // ,'EQ__TBLDAFTAR.REFKELURAHAN_IDBADANUSAHA' => $REFKELURAHAN_IDBADANUSAHA
            // ,'EQ__TBLDAFTAR.REFKELURAHAN_IDBADANUSAHA' => $REFKELURAHAN_IDBADANUSAHA
            // ,'EQ__TBLDAFTAR.TBLKECAMATAN_IDPEMILIK' => '0'
        );



        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
        $data['cetak'] = DBFetch::query($arrayConfig);

        $this->renderPartial('cetak', array('data'=>$data));
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
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		REFBADANUSAHA.REKENING_KODE
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
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
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
			,"REKENING_KODE" => $result['REKENING_KODE']
			);
		}

		 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function actiongetdataedit()
	{
		$TBLDAFTAR_NOPOK = trim($_POST['TBLDAFTAR_NOPOK']);
		// $bulan = (int)trim($_POST['bulan']);
		// $tahun = trim($_POST['tahun']);
		/*$data = array();
		if ($cek>0) {
			$data['data'] = 'ada';
		}else{
			$data['data'] = 'tidak';
		}*/
		
		$select = "
		TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_NOFORMULIR,
		TBLDAFTAR.TBLDAFTAR_NOPOKL,
		TBLDAFTAR.TBLDAFTAR_GOLONGANL,
		TBLDAFTAR.TBLDAFTAR_NPWPP,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHARTRW,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAKOTA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHATELPAREA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHATELP,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAKODEPOS,
		TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		TBLDAFTAR.TBLDAFTAR_PEMILIKRTRW,
		TBLDAFTAR.TBLKECAMATAN_IDPEMILIK,
		TBLDAFTAR.TBLKELURAHAN_IDPEMILIK,
		TBLDAFTAR.TBLDAFTAR_PEMILIKKOTA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKKODEAREA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKTELP,
		TBLDAFTAR.TBLDAFTAR_PEMILIKKODEPOS,
		TBLDAFTAR.REFBADANUSAHA_IDPEMILIK,
		TBLDAFTAR.TBLDAFTAR_PEMILIKJABATAN,
		TBLDAFTAR.TBLDAFTAR_ISKAS,
		TBLDAFTAR.TBLDAFTAR_ISBUKUREGISTER,
		TBLDAFTAR.TBLDAFTAR_ISNOTA,
		TBLDAFTAR.TBLDAFTAR_ISJENISPENDAFTARAN,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_TANGGALNONAKTIF,
		TBLDAFTAR.TBLDAFTAR_ALASANNONAKTIF,
		TBLDAFTAR.TBLDAFTAR_NOKUKUH,
		TBLDAFTAR.TBLDAFTAR_TAHUNKUKUH,
		TBLDAFTAR.TBLDAFTAR_BULANKUKUH,
		TBLDAFTAR.TBLDAFTAR_TANGGALKUKUH,
		TBLDAFTAR.TBLDAFTAR_TAHUNTERIMADAFTAR,
		TBLDAFTAR.TBLDAFTAR_BULANTERIMADAFTAR,
		TBLDAFTAR.TBLDAFTAR_TANGGALTERIMADAFTAR,
		TBLDAFTAR.TBLDAFTAR_TAHUNENTRYDAFTAR,
		TBLDAFTAR.TBLDAFTAR_BULANENTRYDAFTAR,
		TBLDAFTAR.TBLDAFTAR_TANGGALENTRYDAFTAR,
		TBLDAFTAR.TBLDAFTAR_ISKETETAPANFLAT
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);

		$model = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'mode'=>'DETAIL') );

		echo CJSON::encode($model);
	}

	/*public function actionGetIBU()
	{
		$TBLDAFTAR_NOPOK = !empty(DMOrcl::getRequest('TBLDAFTAR_NOPOK')) ? DMOrcl::getRequest('TBLDAFTAR_NOPOK') : '';
		$select = "substr(REFBADANUSAHA.REKENING_KODE,7,1) as REK_KODE";
		$from = 'TBLDAFTAR';
		$otherquery = array('leftjoin_REFBADANUSAHA'=>array('REFBADANUSAHA','TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA=REFBADANUSAHA.REFBADANUSAHA_ID'));
		$filter = array('EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK);
		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data = DBFetch::query($arrayConfig);
		echo CJSON::encode($data);
	}*/
	
	public function actionGetData()
    {
        $TBLDAFTAR_NOPOK = !empty(DMOrcl::getRequest('TBLDAFTAR_NOPOK')) ? DMOrcl::getRequest('TBLDAFTAR_NOPOK') : '';
		
		$select = "substr(REFBADANUSAHA.REKENING_KODE,7,1) as REK_KODE";
		$from = 'TBLDAFTAR';
		$otherquery = array('leftjoin_REFBADANUSAHA'=>array('REFBADANUSAHA','TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA=REFBADANUSAHA.REFBADANUSAHA_ID'));
		$filter = array('EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK);
		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'SCALAR');
		$kode_table = DBFetch::query($arrayConfig);
		if($kode_table==1){
			$tabel = 'TBLDAFTHOTEL';
			$data['url'] = 'pendataan/pajakhotel';
		}elseif($kode_table==2){
			$tabel = 'TBLDAFTRMAKAN';
			$data['url']='pendataan/pajakrestoran';
		}elseif($kode_table==3){
			$tabel = 'TBLDAFTHIBURAN';
			$data['url']='pendataan/hiburantetap';
		}elseif($kode_table==4){
			$tabel = 'TBLDAFTREKLAME';
			$data['url']='pendataan/reklamelama_tetap';
		}elseif($kode_table==7){
			$tabel = 'TBLDAFTPARKIR';
			$data['url']='pendataan/pajakparkir';
		}elseif($kode_table==8){
			$tabel = 'TBLDAFTTANAH';
			$data['url']='pendataan/pajak_airtanah2017';
		}elseif($kode_table==9){
			$tabel = 'TBLDAFTBURUNG';
			$data['url']='pendataan/walet';
		}
        //$TBLPENDATAAN_THNPAJAK = !empty(DMOrcl::getRequest('TBLPENDATAAN_THNPAJAK')) ? DMOrcl::getRequest('TBLPENDATAAN_THNPAJAK') : '';
        //$TBLPENDATAAN_BLNPAJAK = !empty(DMOrcl::getRequest('TBLPENDATAAN_BLNPAJAK')) ? DMOrcl::getRequest('TBLPENDATAAN_BLNPAJAK') : '';
        //$TBLPENDATAAN_TGLPAJAK = !empty(DMOrcl::getRequest('TBLPENDATAAN_TGLPAJAK')) ? DMOrcl::getRequest('TBLPENDATAAN_TGLPAJAK') : '';
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
				) AS TBLDAFTAR_ALASANNONAKTIF, 
				NVL(".$tabel.".TBLPENDATAAN_THNPAJAK,0) as TBLPENDATAAN_THNPAJAK, 
				NVL(".$tabel.".TBLPENDATAAN_BLNPAJAK,0) as TBLPENDATAAN_BLNPAJAK, 
				NVL(".$tabel.".TBLPENDATAAN_TGLPAJAK,0) as TBLPENDATAAN_TGLPAJAK";
         $from = 'TBLDAFTAR';

         $otherquery = array(
             'leftjoin_REFBADANUSAHA'=>array('REFBADANUSAHA','TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA=REFBADANUSAHA.REFBADANUSAHA_ID')
             ,'leftjoin_'.$tabel=>array($tabel,'TBLDAFTAR.TBLDAFTAR_NOPOK='.$tabel.'.TBLDAFTAR_NOPOK')
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
        $data['daftar'] = DBFetch::query($arrayConfig);
        $this->renderPartial('grid', array('data'=>$data));
    }

    public function actionSimpan()
	{
		Yii::import('ext.LokalIndonesia');

		$TBLDAFTAR_TANGGALKUKUH = isset($PARAM['TBLDAFTAR_TANGGALKUKUH']) && !empty($PARAM['TBLDAFTAR_TANGGALKUKUH']) ? $PARAM['TBLDAFTAR_TANGGALKUKUH'] : '';
		$TBLDAFTAR_TANGGALTERIMADAFTAR = isset($PARAM['TBLDAFTAR_TANGGALTERIMADAFTAR']) && !empty($PARAM['TBLDAFTAR_TANGGALTERIMADAFTAR']) ? $PARAM['TBLDAFTAR_TANGGALTERIMADAFTAR'] : '';
		$TBLDAFTAR_TANGGALENTRYDAFTAR = isset($PARAM['TBLDAFTAR_TANGGALENTRYDAFTAR']) && !empty($PARAM['TBLDAFTAR_TANGGALENTRYDAFTAR']) ? $PARAM['TBLDAFTAR_TANGGALENTRYDAFTAR'] : '';
		
		$exp_TGLKUKUH = explode('-', $TBLDAFTAR_TANGGALKUKUH);
		$exp_TGLTERIMADAFTAR = explode('-', $TBLDAFTAR_TANGGALTERIMADAFTAR);
		$exp_TGLENTRYDAFTAR = explode('-', $TBLDAFTAR_TANGGALENTRYDAFTAR);

		$update = Yii::app()->db->createCommand();
		$simpan = $update->update('TBLDAFTAR', array(
			'TBLDAFTAR_NOPOK' => $PARAM['TBLDAFTAR_NOPOK'],
			'TBLDAFTAR_JENISPENDAPATAN' => $PARAM['TBLDAFTAR_JENISPENDAPATAN'],
			'TBLDAFTAR_GOLONGAN' => $PARAM['TBLDAFTAR_GOLONGAN'],
			'TBLDAFTAR_NOFORMULIR' => (int)$PARAM['TBLDAFTAR_NOFORMULIR'],
			'TBLDAFTAR_PEMILIKNAMA' => $PARAM['TBLDAFTAR_PEMILIKNAMA'],
			'TBLDAFTAR_PEMILIKALAMAT' => $PARAM['TBLDAFTAR_PEMILIKALAMAT'],
			'TBLDAFTAR_PEMILIKRTRW' => $PARAM['TBLDAFTAR_PEMILIKRTRW'],
			'TBLDAFTAR_PEMILIKTELP' => $PARAM['TBLDAFTAR_PEMILIKTELP'],

			'TBLKECAMATAN_IDPEMILIK' => $PARAM['TBLKECAMATAN_IDPEMILIK'],
			'TBLKELURAHAN_IDPEMILIK' => $PARAM['TBLKELURAHAN_IDPEMILIK'],

			'TBLDAFTAR_PEMILIKKODEPOS' => $PARAM['TBLDAFTAR_PEMILIKKODEPOS'],
			'TBLDAFTAR_PEMILIKKOTA' => $PARAM['TBLDAFTAR_PEMILIKKOTA'],
			'TBLDAFTAR_BADANUSAHANAMA' => $PARAM['TBLDAFTAR_BADANUSAHANAMA'],
			'TBLDAFTAR_BADANUSAHAALAMAT' => $PARAM['TBLDAFTAR_BADANUSAHAALAMAT'],
			'TBLDAFTAR_BADANUSAHARTRW' => $PARAM['TBLDAFTAR_BADANUSAHARTRW'],
			'TBLDAFTAR_BADANUSAHATELPAREA' => $PARAM['TBLDAFTAR_BADANUSAHATELPAREA'],

			'TBLKECAMATAN_IDBADANUSAHA' => $PARAM['TBLKECAMATAN_IDBADANUSAHA'],
			'TBLKELURAHAN_IDBADANUSAHA' => $PARAM['TBLKELURAHAN_IDBADANUSAHA'],
			
			'TBLDAFTAR_BADANUSAHAKODEPOS' => $PARAM['TBLDAFTAR_BADANUSAHAKODEPOS'],
			'TBLKELURAHAN_IDBADANUSAHA' => $PARAM['TBLKELURAHAN_IDBADANUSAHA'],
			'REFBADANUSAHA_IDBADANUSAHA' => $PARAM['REFBADANUSAHA_IDBADANUSAHA'],
			'TBLDAFTAR_BADANUSAHAKOTA' => $PARAM['TBLDAFTAR_BADANUSAHAKOTA'],
			'TBLDAFTAR_TANGGALTERIMADAFTAR' => $PARAM['TBLDAFTAR_TANGGALTERIMADAFTAR'],
			
			'TBLDAFTAR_NOKUKUH' => $PARAM['TBLDAFTAR_NOKUKUH'],
			'TBLDAFTAR_TANGGALKUKUH' => $exp_TGLKUKUH[0],
			'TBLDAFTAR_BULANKUKUH' => $exp_TGLKUKUH[1],
			'TBLDAFTAR_TAHUNKUKUH' => substr($exp_TGLKUKUH[2], -2),

			'TBLDAFTAR_TANGGALTERIMADAFTAR' => $exp_TGLTERIMADAFTAR[0],
			'TBLDAFTAR_BULANTERIMADAFTAR' => $exp_TGLTERIMADAFTAR[1],
			'TBLDAFTAR_TAHUNTERIMADAFTAR' => substr($exp_TGLTERIMADAFTAR[2], -2),

			'TBLDAFTAR_TANGGALENTRYDAFTAR' => $exp_TGLENTRYDAFTAR[0],
			'TBLDAFTAR_BULANENTRYDAFTAR' => $exp_TGLENTRYDAFTAR[1],
			'TBLDAFTAR_TAHUNENTRYDAFTAR' => substr($exp_TGLENTRYDAFTAR[2], -2),
			
			'TBLDAFTAR_ISJENISPENDAFTARAN' => $PARAM['TBLDAFTAR_ISJENISPENDAFTARAN'],

		));

		if ($simpan>0) {
			echo CJSON::encode(array('status'=>'success'));
		}
		else{
			echo CJSON::encode(array('status'=>'failed'));
		}
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