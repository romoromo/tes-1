<?php

class Cetak_kartuController extends Controller
{
	public function actionIndex()
	{
		$data['kec'] = Yii::app()->db->createCommand("SELECT * FROM REFKECAMATAN")
		->queryAll();
		$data['rek'] = Yii::app()->db->createCommand("SELECT * FROM REFBADANUSAHA")->queryAll();

		$this->renderPartial('index', array('data' => $data));
	}

	public function actioncetak()
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
			NVL(TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA, 0) AS TBLKECAMATAN_IDBADANUSAHA,
			NVL(TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA, 0) AS TBLKELURAHAN_IDBADANUSAHA,
			TBLDAFTAR.TBLDAFTAR_NOKUKUH,
				(
					SELECT
						REFKELURAHAN.REFKELURAHAN_NAMA
					FROM
						REFKELURAHAN
					WHERE
						REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
					AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKELURAHAN_NAMA,
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
				TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
				TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
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

        $this->cetakWordKartuNPWPD($data);
        Yii::app()->end();
	}

	public function actioncetakSKNPWPD()
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
		$JENIS = $data['JENIS'] = !empty(DMOrcl::getRequest('jenis')) ? DMOrcl::getRequest('jenis') : '';

         $select = "
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			TBLDAFTAR.TBLDAFTAR_NOFORMULIR,
			TBLDAFTAR.TBLDAFTAR_NOKUKUH,
				(
					SELECT
						REFKELURAHAN.REFKELURAHAN_NAMA
					FROM
						REFKELURAHAN
					WHERE
						REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
					AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKELURAHAN_NAMA,
				(
					SELECT
						REFKECAMATAN.REFKECAMATAN_NAMA
					FROM
						REFKECAMATAN
					WHERE
						REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKECAMATAN_NAMA,
				(
					SELECT
						SUBSTR(REFBADANUSAHA.REKENING_KODE, 0, 7)
					FROM
						REFBADANUSAHA
					WHERE
						REFBADANUSAHA.REFBADANUSAHA_ID = TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA
				) AS REKENING_PAJAK,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
				TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
				TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
				TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA,
				TBLDAFTAR.REFBADANUSAHA_IDPEMILIK,
				TBLDAFTAR.TBLDAFTAR_ISAKTIF,
				NVL (
					TBLDAFTAR.TBLDAFTAR_ALASANNONAKTIF,
					'-'
				) AS TBLDAFTAR_ALASANNONAKTIF,
				NVL(TBLDAFTAR.TBLKELURAHAN_KODE,0) AS TBLKELURAHAN_KODE,
				NVL(TBLDAFTAR.TBLKECAMATAN_KODE,0) AS TBLKECAMATAN_KODE,
				TBLKECAMATAN.TBLKECAMATAN_NAMA,
				TBLKELURAHAN.TBLKELURAHAN_NAMA";
         $from = 'TBLDAFTAR';

         $otherquery = array(
             'leftjoin_REFBADANUSAHA'=>array('REFBADANUSAHA','TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA=REFBADANUSAHA.REFBADANUSAHA_ID')
             ,'leftjoin_TBLKECAMATAN'=>array('TBLKECAMATAN','TBLKECAMATAN.TBLKECAMATAN_KODE = TBLDAFTAR.TBLKECAMATAN_KODEBU')
             ,'leftjoin_TBLKELURAHAN'=>array('TBLKELURAHAN','TBLKELURAHAN.TBLKELURAHAN_KODE = TBLDAFTAR.TBLKELURAHAN_KODEBU')
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

        $this->cetakWordSKNPWPD($data);
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

         $select = "
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			NVL(TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA, 0) AS TBLKECAMATAN_IDBADANUSAHA,
			NVL(TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA, 0) AS TBLKELURAHAN_IDBADANUSAHA,
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
        $data['daftar'] = DBFetch::query($arrayConfig);

        $this->renderPartial('grid', array('data'=>$data));
    }

	public function cetakWordKartuNPWPD($data=array())
	{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_kukuh' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'Kartu-NPWPD.docx';

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

		//INI CODING CETAK WORD KARTU

		$utama = array();
		$rows = array();

		foreach ($data['cetak'] as $rowWP) :
			$nomorNPWPD = $rowWP['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$rowWP['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$rowWP['TBLKECAMATAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$rowWP['TBLKELURAHAN_IDBADANUSAHA']));
			$utama['nomor_kukuh'] = trim($rowWP['TBLDAFTAR_NOKUKUH']);
			$utama['wp_nama'] = trim($rowWP['TBLDAFTAR_BADANUSAHANAMA']);
			$utama['wp_alamat'] = substr(trim($rowWP['TBLDAFTAR_BADANUSAHAALAMAT']), 0, 36);
			$utama['wp_npwpd'] = $nomorNPWPD;
			$utama['no'] = null;

			array_push($rows, $utama);

		endforeach;

		// debug
		// echo CJSON::encode($rows);Yii::app()->end();

		// Merge data in the first sheet 
		$namafileDL = "KARTU-NPWPD.docx"; 
		$otbs->MergeBlock('utama', $rows); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();

		//INI CODING CETAK WORD KARTU
	}

	public function cetakWordSKNPWPD($data=array())
	{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_kukuh' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'SK-NPWPD-Paraf.docx';
		$namafileDL = "SK-NPWPD-Paraf.docx"; 

		if (base64_decode($data['JENIS'])=='WP') {
			$namatpl = $path_tpl . 'SK-NPWPD-WP.docx';
			$namafileDL = "SK-NPWPD-WP.docx"; 
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

		//INI CODING CETAK WORD KARTU

		$utama = array();
		$rows = array();

		$arrayPajak = array(
		'1' => 'HOTEL'
		,'2' => 'RESTORAN'
		,'3' => 'HIBURAN'
		,'4' => 'REKLAME'
		,'5' => 'PPJ'
		,'6' => 'GALIAN C'
		,'7' => 'PARKIR'
		,'8' => 'AIR TANAH'
		,'9' => 'SARANG WALET'
		);

		foreach ($data['cetak'] as $rowWP) :
			$kode_pjk = substr($rowWP['REKENING_PAJAK'], -1);
			$NAMA_REK = isset($arrayPajak[$kode_pjk]) ? $arrayPajak[$kode_pjk] : '-';
			$nomorNPWPD = $rowWP['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$rowWP['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$rowWP['TBLKECAMATAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$rowWP['TBLKELURAHAN_IDBADANUSAHA']));
			
			$utama['nomor_formulir'] = trim($rowWP['TBLDAFTAR_NOFORMULIR']);
			$utama['nomor_kukuh'] = trim($rowWP['TBLDAFTAR_NOKUKUH']);
			$utama['wp_nama'] = trim($rowWP['TBLDAFTAR_BADANUSAHANAMA']);
			$utama['wp_alamat'] = (trim($rowWP['TBLDAFTAR_BADANUSAHAALAMAT']));
			$utama['wp_npwpd'] = $nomorNPWPD;
			// echo substr($rowWP['REFKELURAHAN_NAMA'],0,9); die();
			if ($rowWP['TBLKECAMATAN_KODE']=='0') {
				if (substr($rowWP['REFKELURAHAN_NAMA'],0,4)=='KEL.') {
					$utama['wp_kelurahan_nama'] = substr($rowWP['REFKELURAHAN_NAMA'],4);
				} else if (substr($rowWP['REFKELURAHAN_NAMA'],0,9)=='KELURAHAN') {
					$utama['wp_kelurahan_nama'] = substr($rowWP['REFKELURAHAN_NAMA'],10);	
				} else {
					$utama['wp_kelurahan_nama'] = $rowWP['REFKELURAHAN_NAMA'];	
				}
			} else {
				$utama['wp_kelurahan_nama'] = $rowWP['TBLKELURAHAN_NAMA'];	
			}

			if ($rowWP['TBLKECAMATAN_KODE']=='0') {
				if (substr($rowWP['REFKECAMATAN_NAMA'],0,4)=='KEC.') {
					$utama['wp_kecamatan_nama'] = substr($rowWP['REFKECAMATAN_NAMA'],5);
				} else {
					$utama['wp_kecamatan_nama'] = $rowWP['REFKECAMATAN_NAMA'];
				}
			} else {
				$utama['wp_kecamatan_nama'] = $rowWP['TBLKECAMATAN_NAMA'];
			}
			// echo substr($rowWP['REFKECAMATAN_NAMA'],0,4);die();

			$utama['wp_pemiliknama'] = trim($rowWP['TBLDAFTAR_PEMILIKNAMA']);
			$utama['wp_pemilikalamat'] = (trim($rowWP['TBLDAFTAR_PEMILIKALAMAT']));
			$utama['REKENING_PAJAK'] = $rowWP['REKENING_PAJAK'];
			$utama['jenis_pajak'] = $NAMA_REK;
			$utama['tglhariini'] = date('d-m-Y');
			$utama['no'] = null;

			array_push($rows, $utama);

		endforeach;

		// debug
		// echo CJSON::encode($rows);Yii::app()->end();

		// Merge data in the first sheet 
		
		$otbs->MergeBlock('utama', $rows); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();

		//INI CODING CETAK WORD KARTU
	}
}