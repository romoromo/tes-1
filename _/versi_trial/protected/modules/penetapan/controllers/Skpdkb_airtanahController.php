<?php

class Skpdkb_airtanahController extends Controller
{
	var $KODE_GOL = 1;
	var $PAJAK_AYAT = 8;
	var $PAJAK_REK = '4.1.1.8.0';

	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['sub_rek'] = TRekening::model()->getRekeningSubAktif('4110100');

		$data['rek'] = Yii::app()->db->createCommand("
		SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.8.%'
		ORDER BY TBLREKENING_KODE
		")
		->queryAll();

		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionautocompletewpairtanah()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');
		
		$query = trim($_REQUEST['query']);

		$select = 'TBLDAFTTANAH.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT';
		$from = 'TBLDAFTTANAH';
		$filter = array(
			'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA' => $query
			,'LK__TBLDAFTAR.TBLDAFTAR_NOPOK' => $query
		);

		$filter_AND = array(
			//'EQ__TREKENING_KODE' => '4110100'
			// ,'EQ__tblsubyek_jenisusaha' => $jenisusaha
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTTANAH.TBLDAFTAR_NOPOK')
			,'order'=> 'TBLDAFTTANAH.TBLDAFTAR_NOPOK ASC'
			,'group'=> 'TBLDAFTTANAH.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$results = DBFetch::query($arrayConfig);

		$suggestions = array();
		 
		foreach($results as $result)
		{
			$suggestions[] = array(
			"value" => $result['TBLDAFTAR_NOPOK']. ' | ' . $result['TBLDAFTAR_BADANUSAHANAMA']
			,"data" => $result['TBLDAFTAR_NOPOK']
			,"TBLDAFTAR_BADANUSAHANAMA" => $result['TBLDAFTAR_BADANUSAHANAMA']
			,"TBLDAFTAR_BADANUSAHAALAMAT" => $result['TBLDAFTAR_BADANUSAHAALAMAT']
			,"TBLDAFTAR_NOPOK" => $result['TBLDAFTAR_NOPOK']
			);
		}
 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function actiongetdata()
	{
		$TBLDAFTAR_NOPOK = trim($_POST['TBLDAFTAR_NOPOK']);
		$bulan = trim($_POST['bulan']);
		$tahun = trim($_POST['tahun']);
		$tahun_substr = substr($tahun, 2,4);
		$proses = $this->cekProses($tahun_substr, $bulan, $TBLDAFTAR_NOPOK);
		$cek = $this->cekPernahDaftar($tahun_substr, $bulan, $TBLDAFTAR_NOPOK);

		if ($proses == '') {
			$data['data'] = 'belum terdaftar';	
		} else if ($cek>0){

			$data['data'] = 'sudah entri';
		
		$select = "
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		REFBADANUSAHA.REKENING_KODE,
		REFBADANUSAHA.REFBADANUSAHA_REKPENDAPATAN,
		REFBADANUSAHA.REFBADANUSAHA_REKPAD,
		REFBADANUSAHA.REFBADANUSAHA_REKPJK,
		REFBADANUSAHA.REFBADANUSAHA_REKAYAT,
		REFBADANUSAHA.REFBADANUSAHA_REKJENIS,
		REFBADANUSAHA.REFBADANUSAHA_PERSEN,
		NVL(TBLDAFTTANAH.TBLDAFTTANAH_NOMORPERIKSA, 0) AS TBLDAFTTANAH_NOMORPERIKSA,
		NVL(TBLDAFTTANAH.TBLDAFTTANAH_REGKURANGBAYAR, 0) AS TBLDAFTTANAH_REGKURANGBAYAR,
		NVL(TBLDAFTTANAH.TBLDAFTTANAH_PAJAKPERIKSA,0) AS TBLDAFTTANAH_PAJAKPERIKSA,
		NVL(TBLDAFTTANAH.TBLDAFTTANAH_BUNGAKRGBAYAR,0) AS TBLDAFTTANAH_BUNGAKRGBAYAR,
		NVL(TBLDAFTTANAH.TBLDAFTTANAH_NAKB,0) AS TBLDAFTTANAH_NAKB,
		NVL(TBLDAFTTANAH.TBLDAFTTANAH_DENDAKRGBAYAR,0) AS TBLDAFTTANAH_DENDAKRGBAYAR,
		NVL(TBLDAFTTANAH.TBLDAFTTANAH_RUPIAHKRGBAYAR,0) AS TBLDAFTTANAH_RUPIAHKRGBAYAR,
		NVL(TBLDAFTTANAH.TBLDAFTTANAH_BLNKBAWAL,0) AS TBLDAFTTANAH_BLNKBAWAL,
		NVL(TBLDAFTTANAH.TBLDAFTTANAH_BLNKBAKHIR,0) AS TBLDAFTTANAH_BLNKBAKHIR,
		NVL(TBLDAFTTANAH.TBLDAFTTANAH_TGLKURANGBAYAR,0) AS TBLDAFTTANAH_TGLKURANGBAYAR,
		NVL(TBLDAFTTANAH.TBLDAFTTANAH_BLNKURANGBAYAR,0) AS TBLDAFTTANAH_BLNKURANGBAYAR,
		NVL(TBLDAFTTANAH.TBLDAFTTANAH_THNKURANGBAYAR,0) AS TBLDAFTTANAH_THNKURANGBAYAR,
		NVL(TBLDAFTTANAH.TBLDAFTTANAH_TGLBTSKRGBAYAR,0) AS TBLDAFTTANAH_TGLBTSKRGBAYAR,
		NVL(TBLDAFTTANAH.TBLDAFTTANAH_BLNBTSKRGBAYAR,0) AS TBLDAFTTANAH_BLNBTSKRGBAYAR,
		NVL(TBLDAFTTANAH.TBLDAFTTANAH_THNBTSKRGBAYAR,0) AS TBLDAFTTANAH_THNBTSKRGBAYAR 
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,'EQ__TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK' => $tahun_substr
			,'EQ__TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK' => $bulan
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'join_2'=> array('TBLDAFTTANAH', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTTANAH.TBLDAFTAR_NOPOK')
			,'order'=> 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC'
		);
		$model = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL') );

		$data['TBLDAFTAR_BADANUSAHANAMA'] =$model['TBLDAFTAR_BADANUSAHANAMA'];
		$data['TBLDAFTAR_BADANUSAHAALAMAT'] =$model['TBLDAFTAR_BADANUSAHAALAMAT'];
		$data['REKENING_KODE'] =$model['REKENING_KODE'];
		$data['TREKENING_TARIF'] =$model['REFBADANUSAHA_PERSEN'];
		
		$data['REFBADANUSAHA_REKPENDAPATAN'] =$model['REFBADANUSAHA_REKPENDAPATAN'];
		$data['REFBADANUSAHA_REKPAD'] =$model['REFBADANUSAHA_REKPAD'];
		$data['REFBADANUSAHA_REKPJK'] =$model['REFBADANUSAHA_REKPJK'];
		$data['REFBADANUSAHA_REKAYAT'] =$model['REFBADANUSAHA_REKAYAT'];
		$data['REFBADANUSAHA_REKJENIS'] =$model['REFBADANUSAHA_REKJENIS'];

		$data['TBLDAFTTANAH_REGKURANGBAYAR'] = $model['TBLDAFTTANAH_REGKURANGBAYAR'];
		$data['TBLDAFTTANAH_NOMORPERIKSA'] = $model['TBLDAFTTANAH_NOMORPERIKSA'];
		$data['TBLDAFTTANAH_PAJAKPERIKSA'] = $model['TBLDAFTTANAH_PAJAKPERIKSA']; 
		$data['TBLDAFTTANAH_BUNGAKRGBAYAR'] = $model['TBLDAFTTANAH_BUNGAKRGBAYAR']; 
		$data['TBLDAFTTANAH_NAKB'] = $model['TBLDAFTTANAH_NAKB']; 
		$data['TBLDAFTTANAH_DENDAKRGBAYAR'] = $model['TBLDAFTTANAH_DENDAKRGBAYAR']; 
		$data['TBLDAFTTANAH_RUPIAHKRGBAYAR'] = $model['TBLDAFTTANAH_RUPIAHKRGBAYAR']; 
		$data['TBLDAFTTANAH_BLNKBAWAL'] = $model['TBLDAFTTANAH_BLNKBAWAL']; 
		$data['TBLDAFTTANAH_BLNKBAKHIR'] = $model['TBLDAFTTANAH_BLNKBAKHIR']; 
		$data['TBLDAFTTANAH_TGLKURANGBAYAR'] = sprintf("%02d",$model['TBLDAFTTANAH_TGLKURANGBAYAR']); 
		$data['TBLDAFTTANAH_BLNKURANGBAYAR'] = sprintf("%02d",$model['TBLDAFTTANAH_BLNKURANGBAYAR']); 
		$data['TBLDAFTTANAH_THNKURANGBAYAR'] = $model['TBLDAFTTANAH_THNKURANGBAYAR']; 
		$data['TBLDAFTTANAH_TGLBTSKRGBAYAR'] = sprintf("%02d",$model['TBLDAFTTANAH_TGLBTSKRGBAYAR']); 
		$data['TBLDAFTTANAH_BLNBTSKRGBAYAR'] = sprintf("%02d",$model['TBLDAFTTANAH_BLNBTSKRGBAYAR']); 
		$data['TBLDAFTTANAH_THNBTSKRGBAYAR'] = $model['TBLDAFTTANAH_THNBTSKRGBAYAR']; 
		
		} else {

		$data['data'] = 'sudah terdaftar';
		
		$select = "
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		REFBADANUSAHA.REKENING_KODE,
		REFBADANUSAHA.REFBADANUSAHA_REKPENDAPATAN,
		REFBADANUSAHA.REFBADANUSAHA_REKPAD,
		REFBADANUSAHA.REFBADANUSAHA_REKPJK,
		REFBADANUSAHA.REFBADANUSAHA_REKAYAT,
		REFBADANUSAHA.REFBADANUSAHA_REKJENIS,
		REFBADANUSAHA.REFBADANUSAHA_PERSEN
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'order'=> 'TBLDAFTAR_NOPOK ASC'
		);
		$model = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL') );

		$data['TBLDAFTAR_BADANUSAHANAMA'] =$model['TBLDAFTAR_BADANUSAHANAMA'];
		$data['TBLDAFTAR_BADANUSAHAALAMAT'] =$model['TBLDAFTAR_BADANUSAHAALAMAT'];
		$data['REKENING_KODE'] =$model['REKENING_KODE'];
		$data['TREKENING_TARIF'] =$model['REFBADANUSAHA_PERSEN'];
		
		$data['REFBADANUSAHA_REKPENDAPATAN'] =$model['REFBADANUSAHA_REKPENDAPATAN'];
		$data['REFBADANUSAHA_REKPAD'] =$model['REFBADANUSAHA_REKPAD'];
		$data['REFBADANUSAHA_REKPJK'] =$model['REFBADANUSAHA_REKPJK'];
		$data['REFBADANUSAHA_REKAYAT'] =$model['REFBADANUSAHA_REKAYAT'];
		$data['REFBADANUSAHA_REKJENIS'] =$model['REFBADANUSAHA_REKJENIS'];

		}

		echo CJSON::encode($data);
	}

	public function cekProses($tahun, $bulan, $TBLDAFTAR_NOPOK)
	{
		$model = Yii::app()->db->createCommand('SELECT TBLDAFTTANAH_PAJAK FROM TBLDAFTTANAH WHERE TBLPENDATAAN_THNPAJAK ='.$tahun.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$TBLDAFTAR_NOPOK)->queryScalar();
		return $model;
	}

	public function cekPernahDaftar($thn, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLDAFTTANAH_THNKURANGBAYAR) AS JML FROM TBLDAFTTANAH WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;
	}

	public function actionSimpanSKPDKBAirTanah()
	{
		Yii::import('ext.LokalIndonesia');

		$PARAM = $_REQUEST;
		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];

		$THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2,4);

		$TBLPENDATAAN_BLNPAJAK = !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';

		$TBLDAFTTANAH_TGLKURANGBAYAR = !empty($_REQUEST['TBLDAFTTANAH_TGLKURANGBAYAR']) ? $_REQUEST['TBLDAFTTANAH_TGLKURANGBAYAR'] : '';

		$TBLDAFTTANAH_TGLBTSKRGBAYAR = !empty($_REQUEST['TBLDAFTTANAH_TGLBTSKRGBAYAR']) ? $_REQUEST['TBLDAFTTANAH_TGLBTSKRGBAYAR'] : '';

		$TBLDAFTTANAH_TGLPERIKSA = !empty($_REQUEST['TBLDAFTTANAH_TGLPERIKSA']) ? $_REQUEST['TBLDAFTTANAH_TGLPERIKSA'] : '';

		if ($TBLDAFTTANAH_TGLKURANGBAYAR !='') {
			$exp_TGLTERIMADAFTAR = explode('-', $TBLDAFTTANAH_TGLKURANGBAYAR);
			$pecahtgldaftar = $exp_TGLTERIMADAFTAR[0];
			$pecahbulandaftar = $exp_TGLTERIMADAFTAR[1];
			$pecahthndaftar = substr($exp_TGLTERIMADAFTAR[2], -2);	
		} else {
			$pecahtgldaftar = '';
			$pecahbulandaftar = '';
			$pecahthndaftar = '';
		}

		if ($TBLDAFTTANAH_TGLBTSKRGBAYAR !='') {
			$exp_TGLENTRYDAFTAR = explode('-', $TBLDAFTTANAH_TGLBTSKRGBAYAR);
			$pecahtglentry = $exp_TGLENTRYDAFTAR[0];
			$pecahbulanentry = $exp_TGLENTRYDAFTAR[1];
			$pecahthnentry = substr($exp_TGLENTRYDAFTAR[2], -2);
		} else {
			$pecahtglentry = '';
			$pecahbulanentry = '';
			$pecahthnentry = '';
		}

		if ($TBLDAFTTANAH_TGLPERIKSA !='') {
			$exp_TGLPERIKSA = explode('-', $TBLDAFTTANAH_TGLPERIKSA);
			$pecahtglperiksa = $exp_TGLPERIKSA[0];
			$pecahbulanperiksa = $exp_TGLPERIKSA[1];
			$pecahthnperiksa = substr($exp_TGLPERIKSA[2], -2);
		} else {
			$pecahtglperiksa = '';
			$pecahbulanperiksa = '';
			$pecahthnperiksa = '';
		}


		$command = Yii::app()->db->createCommand();
		$column = array(

			'TBLDAFTTANAH_REGKURANGBAYAR' => LokalIndonesia::toAngka($PARAM['TBLDAFTTANAH_REGKURANGBAYAR']),
			'TBLDAFTTANAH_PAJAKPERIKSA' => LokalIndonesia::toAngka($PARAM['TBLDAFTTANAH_PAJAKPERIKSA']),
			'TBLDAFTTANAH_NOMORPERIKSA' => $PARAM['TBLDAFTTANAH_NOMORPERIKSA'],
			'TBLDAFTTANAH_BUNGAKRGBAYAR' => LokalIndonesia::toAngka($PARAM['TBLDAFTTANAH_BUNGAKRGBAYAR']),
			'TBLDAFTTANAH_NAKB' => LokalIndonesia::toAngka($PARAM['TBLDAFTTANAH_NAKB']),
			'TBLDAFTTANAH_DENDAKRGBAYAR' => LokalIndonesia::toAngka($PARAM['TBLDAFTTANAH_DENDAKRGBAYAR']),
			'TBLDAFTTANAH_RUPIAHKRGBAYAR' => LokalIndonesia::toAngka($PARAM['TBLDAFTTANAH_RUPIAHKRGBAYAR']),
			'TBLDAFTTANAH_BLNKBAWAL' => $PARAM['TBLDAFTTANAH_BLNKBAWAL'],
			'TBLDAFTTANAH_BLNKBAKHIR' => $PARAM['TBLDAFTTANAH_BLNKBAKHIR'],

			'TBLDAFTTANAH_TGLKURANGBAYAR' => $pecahtgldaftar,
			'TBLDAFTTANAH_BLNKURANGBAYAR' => $pecahbulandaftar,
			'TBLDAFTTANAH_THNKURANGBAYAR' => $pecahthndaftar,

			'TBLDAFTTANAH_TGLBTSKRGBAYAR' => $pecahtglentry,
			'TBLDAFTTANAH_BLNBTSKRGBAYAR' => $pecahbulanentry,
			'TBLDAFTTANAH_THNBTSKRGBAYAR' => $pecahthnentry,

			'TBLDAFTTANAH_TGLPERIKSA' => $pecahtglperiksa,
			'TBLDAFTTANAH_BLNPERIKSA' => $pecahbulanperiksa,
			'TBLDAFTTANAH_THNPERIKSA' => $pecahthnperiksa,

		);

		$simpan = $command->update('TBLDAFTTANAH', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPJK',array(':NOPOK' => $NOPOK,':THNPJK' => $THNPJK));

		if ($simpan>=0) {
			echo CJSON::encode(array('status'=>'success'));
		}
		else{
			echo CJSON::encode(array('status'=>'failed'));
		}
	}

	public function actionGetNoSKPDKB()
	{
		$tahun = $_REQUEST['tahun'];
		$splthn = substr($tahun, -2);

		$data = Yii::app()->db->createCommand("SELECT
			MAX(TO_NUMBER (TO_CHAR(NVL(TBLDAFTTANAH_REGKURANGBAYAR, 0))))+1 AS nokb
		FROM
			TBLDAFTTANAH
		WHERE
			TBLPENDATAAN_THNPAJAK = ".$splthn."
		AND NVL (TBLDAFTTANAH_REGKURANGBAYAR, 0) <> 0
		ORDER BY
			TO_NUMBER (TO_CHAR(NVL(nokb, 0))) DESC")->queryRow();

		echo CJSON::encode($data);
	}

	public function actionCetak()
	{
		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
		$THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2,4);
		$TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];

        $select = "
        TBLDAFTTANAH.*,
        NVL(TBLDAFTTANAH.TBLDAFTTANAH_BUNGAKRGBAYAR, 0) AS TBLDAFTTANAH_BUNGAKRGBAYAR, 
        NVL(TBLDAFTTANAH.TBLDAFTTANAH_DENDAKRGBAYAR, 0) AS TBLDAFTTANAH_DENDAKRGBAYAR, 
        NVL(TBLDAFTTANAH.TBLDAFTTANAH_RUPIAHSETOR, 0) AS TBLDAFTTANAH_RUPIAHSETOR, 
        NVL(TBLDAFTTANAH.TBLDAFTTANAH_BLNKBAWAL, 0) AS TBLDAFTTANAH_BLNKBAWAL, 
        NVL(TBLDAFTTANAH.TBLDAFTTANAH_BLNKBAKHIR, 0) AS TBLDAFTTANAH_BLNKBAKHIR, 
        TBLDAFTAR.*, (
		SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
			TBLREKENING
		WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTTANAH.TBLDAFTTANAH_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTTANAH.TBLDAFTTANAH_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTTANAH.TBLDAFTTANAH_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTTANAH.TBLDAFTTANAH_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTTANAH.TBLDAFTTANAH_REKJENIS
	) AS NMREK,
	(
		SELECT
		TBLREKENING.TBLREKENING_KODEFULL
		FROM
		TBLREKENING
		WHERE
		TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTTANAH.TBLDAFTTANAH_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTTANAH.TBLDAFTTANAH_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTTANAH.TBLDAFTTANAH_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTTANAH.TBLDAFTTANAH_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTTANAH.TBLDAFTTANAH_REKJENIS
		) AS TBLREKENING_KODEFULL,
	(
		SELECT
			REFKECAMATAN.REFKECAMATAN_NAMA
		FROM
			REFKECAMATAN
		WHERE
			REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
	) AS bnmkec,
	(
		SELECT
			REFKELURAHAN.REFKELURAHAN_NAMA
		FROM
			REFKELURAHAN
		WHERE
			REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_KODE
	) AS bnmkel,
	(
		SELECT
			REFKECAMATAN.REFKECAMATAN_NAMA
		FROM
			REFKECAMATAN
		WHERE
			REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDPEMILIK
	) AS pnmkec,
	(
		SELECT
			REFKELURAHAN.REFKELURAHAN_NAMA
		FROM
			REFKELURAHAN
		WHERE
			REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDPEMILIK
		AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDPEMILIK
	) AS pnmkel";
        $from = 'TBLDAFTTANAH';

        $otherquery = array(
             'leftjoin_daftar'=>array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTTANAH.TBLDAFTAR_NOPOK')
        );

        $filter = array(
            'EQ__TBLDAFTTANAH.TBLDAFTAR_NOPOK' => $NOPOK
			,'EQ__TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK' => $THNPJK
			,'EQ__TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);

		$this->renderPartial('cetak',array('data'=>$data));
	}

	public function actionCetakWord()
	{
		// error_reporting(0);

		// baca file template, yg dipakai
		// $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
		
		// echo "$query";
		
		// $data['list_kartudata'] = Yii::app()->db->createCommand($query)->queryAll();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_skpdkb' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'skpdkb.docx';

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

		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
		$THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2,4);
		$TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];

        $select = "
        TBLDAFTTANAH.*,
        NVL(TBLDAFTTANAH.TBLDAFTTANAH_BUNGAKRGBAYAR, 0) AS TBLDAFTTANAH_BUNGAKRGBAYAR, 
        NVL(TBLDAFTTANAH.TBLDAFTTANAH_DENDAKRGBAYAR, 0) AS TBLDAFTTANAH_DENDAKRGBAYAR,
        NVL(TBLDAFTTANAH.TBLDAFTTANAH_NAKB, 0) AS TBLDAFTTANAH_NAKB, 
        NVL(TBLDAFTTANAH.TBLDAFTTANAH_RUPIAHSETOR, 0) AS TBLDAFTTANAH_RUPIAHSETOR, 
        NVL(TBLDAFTTANAH.TBLDAFTTANAH_BLNKBAWAL, 0) AS TBLDAFTTANAH_BLNKBAWAL, 
        NVL(TBLDAFTTANAH.TBLDAFTTANAH_BLNKBAKHIR, 0) AS TBLDAFTTANAH_BLNKBAKHIR, 
        TBLDAFTAR.*, (
		SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
			TBLREKENING
		WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTTANAH.TBLDAFTTANAH_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTTANAH.TBLDAFTTANAH_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTTANAH.TBLDAFTTANAH_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTTANAH.TBLDAFTTANAH_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTTANAH.TBLDAFTTANAH_REKJENIS
		) AS NMREK,
		(
			SELECT
			TBLREKENING.TBLREKENING_KODEFULL
			FROM
			TBLREKENING
			WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTTANAH.TBLDAFTTANAH_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTTANAH.TBLDAFTTANAH_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTTANAH.TBLDAFTTANAH_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTTANAH.TBLDAFTTANAH_REKAYAT
			AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTTANAH.TBLDAFTTANAH_REKJENIS
			) AS TBLREKENING_KODEFULL,
		(
			SELECT
				REFKECAMATAN.REFKECAMATAN_NAMA
			FROM
				REFKECAMATAN
			WHERE
				REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		) AS bnmkec,
		(
			SELECT
				REFKELURAHAN.REFKELURAHAN_NAMA
			FROM
				REFKELURAHAN
			WHERE
				REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
			AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_KODE
		) AS bnmkel,
		(
			SELECT
				REFKECAMATAN.REFKECAMATAN_NAMA
			FROM
				REFKECAMATAN
			WHERE
				REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDPEMILIK
		) AS pnmkec,
		(
			SELECT
				REFKELURAHAN.REFKELURAHAN_NAMA
			FROM
				REFKELURAHAN
			WHERE
				REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDPEMILIK
			AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDPEMILIK
		) AS pnmkel";
        $from = 'TBLDAFTTANAH';

        $otherquery = array(
             'leftjoin_daftar'=>array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTTANAH.TBLDAFTAR_NOPOK')
        );

        $filter = array(
            'EQ__TBLDAFTTANAH.TBLDAFTAR_NOPOK' => $NOPOK
			,'EQ__TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK' => $THNPJK
			,'EQ__TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);

		$dt = array();

		$dt['nopok'] = $data['cetak']['TBLDAFTAR_NOPOK'];

		$dt['thnkb'] = '20'.$data['cetak']['TBLDAFTTANAH_THNKURANGBAYAR'];
		$dt['blnkbawal'] = LokalIndonesia::getbulan($data['cetak']['TBLDAFTTANAH_BLNKBAWAL']);
		$dt['blnkbakhir'] = LokalIndonesia::getbulan($data['cetak']['TBLDAFTTANAH_BLNKBAKHIR']);
		$dt['regkb'] = $data['cetak']['TBLDAFTTANAH_REGKURANGBAYAR'];

		$dt['namabadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHANAMA'];
		$dt['namapemilik'] = $data['cetak']['TBLDAFTAR_PEMILIKNAMA'];
		$dt['alamatbadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHAALAMAT'];
		$dt['alamatpemilik'] = $data['cetak']['TBLDAFTAR_PEMILIKALAMAT'];

		$dt['kodefull'] = $data['cetak']['TBLREKENING_KODEFULL'];

		$dt['namarek'] = $data['cetak']['NMREK'];

		$dt['namarek'] = $data['cetak']['NMREK'];

		$dt['jatuhtempo'] = $data['cetak']['TBLDAFTTANAH_TGLBTSKRGBAYAR'] .'/'. $data['cetak']['TBLDAFTTANAH_BLNBTSKRGBAYAR'] .'/20'.$data['cetak']['TBLDAFTTANAH_THNBTSKRGBAYAR'];

		$dt['pajakperiksa'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTTANAH_PAJAKPERIKSA']);
		$dt['bunga'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTTANAH_BUNGAKRGBAYAR']);
		$dt['denda'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTTANAH_DENDAKRGBAYAR']);
		$dt['naik'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTTANAH_NAKB']);
		$dt['setoran'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTTANAH_RUPIAHSETOR']);
		$dt['kurangbayar'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTTANAH_RUPIAHKRGBAYAR']);
		$dt['total'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTTANAH_RUPIAHKRGBAYAR']);
		$dt['terbilang'] = LokalIndonesia::terbilangangka($data['cetak']['TBLDAFTTANAH_RUPIAHKRGBAYAR']);

		$dt['thnpajak'] = '20'.$data['cetak']['TBLPENDATAAN_THNPAJAK'];

		$dt['npwpd'] = $data['cetak']['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $data['cetak']['TBLDAFTAR_GOLONGAN'] .'.'. $data['cetak']['TBLDAFTAR_NOPOK'] .'.'. sprintf("%02d",$data['cetak']['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$data['cetak']['TBLKELURAHAN_IDBADANUSAHA']);

		// $dt['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
		$dt['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');
		
		//SAMPAI SINI QUERYNYA

		// var_dump($data);
		// echo json_encode($data['cetak']);Yii::app()->end();
		// echo json_encode($row);

		// Merge data in the first sheet 
		$npwpd = $data['cetak']['TBLDAFTAR_NOPOK'];
		$namafileDL = "SKPDKB-HOTEL-".$npwpd.".docx";
		$otbs->MergeField('dt', $dt); 
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