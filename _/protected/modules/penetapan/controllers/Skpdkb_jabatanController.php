<?php

class Skpdkb_jabatanController extends Controller
{
	var $KODE_GOL = 3;
	var $PAJAK_AYAT = 1;
	var $PAJAK_REK = '4.1.1.1.0';

	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['sub_rek'] = TRekening::model()->getRekeningSubAktif('4110100');

		$data['rek'] = Yii::app()->db->createCommand("
			SELECT
			*
			FROM
			TBLREKENING
			WHERE
			TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			AND TBLREKENING_REKAYAT <> 4
			AND TBLREKENING_REKAYAT <> 8
			AND TBLREKENING_REKAYAT <> 10
			AND TBLREKENING_REKAYAT <> 11
			AND TBLREKENING_REKAYAT <> 23
			AND TBLREKENING_KODE = '4.1.1.1.0'
			OR TBLREKENING_KODE = '4.1.1.2.0'
			OR TBLREKENING_KODE = '4.1.1.3.0'
			OR TBLREKENING_KODE = '4.1.1.7.0'
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			")->queryAll();

		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionautocompletewphotel()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');
		
		$query = trim($_REQUEST['query']);

		$select = 'TBLDAFTAR.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT';
		$from = 'TBLDAFTAR';
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
			// ,'join'=> array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHOTEL.TBLDAFTAR_NOPOK')
			,'order'=> 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC'
			,'group'=> 'TBLDAFTAR.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT'
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
		$TBLDAFTAR_NOPOK = trim($_POST['nopok']);
		$bulan = trim($_POST['bulan']);
		$tahun = trim($_POST['tahun']);
		$TBLREKENING_REKAYAT = trim($_POST['TBLREKENING_REKAYAT']);
		$tahun_substr = substr($tahun, -2);

		$KODEREK = trim($_POST['TBLREKENING_REKAYAT']);

		// echo $KODEREK;die();
		if($KODEREK=='1'){
			$NamaTBL = 'TBLDAFTHOTEL';
			// $ADKB = 'DENDAKRGBAYAR';
		}
		elseif($KODEREK=='2'){
			$NamaTBL = 'TBLDAFTRMAKAN';
			// $ADKB = 'DENDAKRGBAYAR';
		}
		elseif($KODEREK=='3'){
			$NamaTBL = 'TBLDAFTHIBURAN';
			// $ADKB = 'DENDAKRGBAYAR';
		}
		elseif($KODEREK=='7'){
			$NamaTBL = 'TBLDAFTPARKIR';
			// $ADKB = 'DENDAKRGBAYAR';
		}

		$select = "
		to_char(TGL_MONITORING,'mm') AS TAHUN,
		NOPOK,
		to_char(TGL_MONITORING,'dd-mm-yyyy') AS TGL_MONITORING,
		TGL_AWAL,
		TGL_AKHIR,
		JML_MEJA,
		JML_KURSI,
		TARIF_MAKANAN,
		TARIF_MINUMAN,
		JAM_BUKA,
		JAM_TUTUP,
		JML_KONSUMEN_RAMAI,
		JML_KONSUMEN_NORMAL,
		JML_KONSUMEN_SEPI,
		JML_KONSUMEN_RATA,
		JML_OMZET,
		JAM_MONITORING_AWAL,
		JAM_MONITORING_AKHIR,
		JML_KONSUMEN_REALTIME,
		JML_PEGAWAI,
		TBLPEJABAT_ID,
		TGL_INSERT,
		TGL_UPDATE,
		LOGIN_INSERT,
		LOGIN_UPDATE,
		TBLMONITORING_RESTO_ID,
		THP,
		BLP,
		NO_IJIN_USAHA,
		TGL_IJIN_USAHA,
		BATAS_IJIN,
		TTD_IJIN,
		JENIS,
		IS_TIKET,
		IS_MEMBER,
		TARIF_MEMBER,
		CARA_PEMBAYARAN,
		LUAS,
		JML_MEMBER";
		$from = 'TBLMONITORING_DETAIL';
		$filter = array(
			
		);

		$filter_AND = array(
			'EQ__TBLMONITORING_DETAIL.NOPOK' => $TBLDAFTAR_NOPOK
			,'EQ__TBLMONITORING_DETAIL.THP' => $tahun_substr
			,'EQ__TBLMONITORING_DETAIL.BLP' => $bulan
		);

		$otherquery = array(
			/*'limit'=> 30
			,'ANDWHERE'=> "to_char(TGL_MONITORING,'yyyy')=".$tahun." AND to_char(TGL_MONITORING,'mm')=".$bulan*/
		);
		$data = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL') );

		// $data['TBLDAFTAR_BADANUSAHANAMA'] =$model['TBLDAFTAR_BADANUSAHANAMA'];
		// $data['TBLDAFTAR_BADANUSAHAALAMAT'] =$model['TBLDAFTAR_BADANUSAHAALAMAT'];
		// $data['REKENING_KODE'] =$model['REKENING_KODE'];
		// $data['TREKENING_TARIF'] =$model['REFBADANUSAHA_PERSEN'];
		// echo $NamaTBL;
		// echo $this->cekKBJAB($tahun_substr,$bulan,$TBLDAFTAR_NOPOK,$NamaTBL);die();
		if ($this->cekKBJAB($tahun_substr,$bulan,$TBLDAFTAR_NOPOK,$NamaTBL)>0) {
			echo CJSON::encode($data);
		} else {
			echo 'false';
		}
	}

	public function cekKBJAB($tahun, $bulan, $TBLDAFTAR_NOPOK, $NamaTBL)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM '.$NamaTBL.' WHERE TBLPENDATAAN_THNPAJAK ='.$tahun.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$TBLDAFTAR_NOPOK.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = 0')->queryScalar();
		return $model;
	}

	public function actioncekSudahBayar()
	{
		$NOPOKOK = $_REQUEST['NOPOKOK'];
		$THNPAJAK = substr($_REQUEST['TAHUN'], -2);
		$BLNPAJAK = $_REQUEST['BULAN'];
		$jns = 'K';

		$sql = "SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLSETORANBPD WHERE TBLPENDATAAN_THNPAJAK =".$THNPAJAK." AND TBLPENDATAAN_BLNPAJAK=".$BLNPAJAK." AND TBLDAFTAR_NOPOK=".$NOPOKOK." AND TBLSETORANBPD_JNSKETETAPAN = 'K'";
		$cek = Yii::app()->db->createCommand($sql)->queryScalar();
		if ($cek) {
			echo CJSON::encode(array('status'=>'sudah'));
		}
		else{
			echo CJSON::encode(array('status'=>'belum'));
		}
	}

	public function cekAdaspt($tahun, $bulan, $TBLDAFTAR_NOPOK, $NamaTBL)
	{
		$model = Yii::app()->db->createCommand('SELECT NVL(TBLPENDATAAN_THNPAJAK,0) FROM '.$NamaTBL.' WHERE TBLPENDATAAN_THNPAJAK ='.$tahun.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$TBLDAFTAR_NOPOK.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = 0 AND NVL('.$NamaTBL.'_TGLENTRI,0) > 0')->queryScalar();
		return $model;
	}

	public function cekBayar($THNPAJAK, $BLNPAJAK, $NOPOKOK)
	{
		$model = Yii::app()->db->createCommand("SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLSETORANBPD WHERE TBLPENDATAAN_THNPAJAK =".$THNPAJAK." AND TBLPENDATAAN_BLNPAJAK=".$BLNPAJAK." AND TBLDAFTAR_NOPOK=".$NOPOKOK." AND TBLSETORANBPD_JNSKETETAPAN = 'K'")->queryScalar();
		return $model;
	}

	public function cekAngsur($thn, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLANGSURAN WHERE TBLANGSURAN_PAJAKKE = 1 AND TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;
	}

	public function cekPernahDaftar($thn, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTHOTEL WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$nopok.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = 0')->queryScalar();
		return $model;
	}

	public function CekNoRegisterKB($tahun, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT NVL(TBLDAFTHOTEL_REGKURANGBAYAR,0) AS NOKB FROM TBLDAFTHOTEL WHERE TBLPENDATAAN_THNPAJAK = '.$tahun.' AND TBLPENDATAAN_BLNPAJAK = '.$bulan.' AND TBLDAFTAR_NOPOK = '.$nopok.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = 0')->queryScalar();
		return $model;
	}

	public function GetLastNoKB($tahun, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT MAX(NVL(TBLKRGBAYAR_REGKURANGBAYAR,0)) AS LAST_KB FROM TBLKRGBAYAR WHERE TBLPENDATAAN_THNPAJAK = '.$tahun.' AND TBLPENDATAAN_BLNPAJAK = '.$bulan.' AND TBLDAFTAR_NOPOK = '.$nopok.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = 0')->queryScalar();
		return $model;
	}

	public function actionSimpan()
	{
		Yii::import('ext.LokalIndonesia');

		$KODEREK = trim($_POST['TBLREKENING_REKAYAT']);
		if($KODEREK=='1'){
			$NamaTBL = 'TBLDAFTHOTEL';
			// $ADKB = 'DENDAKRGBAYAR';
		}
		elseif($KODEREK=='2'){
			$NamaTBL = 'TBLDAFTRMAKAN';
			// $ADKB = 'DENDAKRGBAYAR';
		}
		elseif($KODEREK=='3'){
			$NamaTBL = 'TBLDAFTHIBURAN';
			// $ADKB = 'DENDAKRGBAYAR';
		}

		$PARAM = $_REQUEST;

		$NOPOK = $_REQUEST['nopok'];
		$BULAN = $_REQUEST['BULAN'];
		$TAHUN = $_REQUEST['TAHUN'];

		$splthn = substr($TAHUN, -2);

		$tglskpdkbjabatan = !empty($_REQUEST['tglskpdkbjabatan']) ? $_REQUEST['tglskpdkbjabatan'] : '';
		$tglbatasbayar    = !empty($_REQUEST['tglbatasbayar']) ? $_REQUEST['tglbatasbayar'] : '';

		if ($tglskpdkbjabatan !='') {
			$exp_tglskpdkbjabatan = explode('-', $tglskpdkbjabatan);
			$pecahtgl             = $exp_tglskpdkbjabatan[0];
			$pecahbulan           = $exp_tglskpdkbjabatan[1];
			$pecahthn             = substr($exp_tglskpdkbjabatan[2], -2);	
		} else {
			$pecahtgl   = '';
			$pecahbulan = '';
			$pecahthn   = '';
		}

		if ($tglbatasbayar !='') {
			$exp_tglbatasbayar = explode('-', $tglbatasbayar);
			$pecahtglbts       = $exp_tglbatasbayar[0];
			$pecahbulanbts     = $exp_tglbatasbayar[1];
			$pecahthnbts       = substr($exp_tglbatasbayar[2], -2);	
		} else {
			$pecahtglbts   = '';
			$pecahbulanbts = '';
			$pecahthnbts   = '';
		}

		$column = array(
			'NOKBJAB'        => $PARAM['noskpdkbjabatan']//(nomer SKPDKB jabatan)
			,'PAJAKJAB'      => LokalIndonesia::toAngka($PARAM['jumlahpokok'])
			,'HRKBJAB'       => $pecahtgl//tanggal SKPDKB jabatan
			,'BLKBJAB'       => $pecahbulan//bulan
			,'THKBJAB'       => $pecahthn//tahun
			,'BUKBJAB'       => LokalIndonesia::toAngka($PARAM['jumlahbunga'])
			,'NAKBJAB'       => LokalIndonesia::toAngka($PARAM['jumlahdenda'])
			,'RPKBJAB'       => LokalIndonesia::toAngka($PARAM['jumlahketetapan'])
			,'IS_MONITORING' => 'Y'
			,'HRBKBJAB'      => $pecahtglbts//tanggal batas/tempo SKPDKB jab	
			,'BLBKBJAB'      => $pecahbulanbts//bulan	
			,'THBKBJAB'      => $pecahthnbts//tahun
			,$NamaTBL.'_TGLPERIKSA' => $pecahtgl
			,$NamaTBL.'_BLNPERIKSA' => $pecahbulan
			,$NamaTBL.'_THNPERIKSA' => $pecahthn
			,$NamaTBL.'_PAJAKPERIKSA' => LokalIndonesia::toAngka($PARAM['jumlahpokok'])
			,$NamaTBL.'_THNKURANGBAYAR' => $pecahthn
			,$NamaTBL.'_BLNKURANGBAYAR' => $pecahbulan
			,$NamaTBL.'_TGLKURANGBAYAR' => $pecahtgl
			,$NamaTBL.'_REGKURANGBAYAR' => $PARAM['noskpdkbjabatan']
			,$NamaTBL.'_BUNGAKRGBAYAR' => LokalIndonesia::toAngka($PARAM['jumlahbunga'])
			,$NamaTBL.'_KENAIKANKRGBAYAR' => LokalIndonesia::toAngka($PARAM['jumlahdenda'])
			,$NamaTBL.'_RUPIAHKRGBAYAR' => LokalIndonesia::toAngka($PARAM['jumlahketetapan'])
			,$NamaTBL.'_THNBTSKRGBAYAR' => $pecahthnbts
			,$NamaTBL.'_BLNBTSKRGBAYAR' => $pecahbulanbts
			,$NamaTBL.'_TGLBTSKRGBAYAR' => $pecahtglbts
		);

		$command = Yii::app()->db->createCommand();
		$simpan = $command->update($NamaTBL, $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPJK AND TBLPENDATAAN_BLNPAJAK =:TBLPENDATAAN_BLNPAJAK AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = 0',array(':NOPOK' => $NOPOK,':THNPJK' => $splthn,':TBLPENDATAAN_BLNPAJAK' => $BULAN));

		if ($simpan>=0) {
			echo CJSON::encode(array('status'=>'success'));
		} else {
			echo CJSON::encode(array('status'=>'failed'));
		}
	}

	public function actionHapusSKPDKB()
	{
		Yii::import('ext.LokalIndonesia');

		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];

		$THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2,4);

		$TBLPENDATAAN_BLNPAJAK = !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';

		$command = Yii::app()->db->createCommand();
		$column = array(

			'TBLDAFTHOTEL_REGKURANGBAYAR' => '',
			'TBLDAFTHOTEL_PAJAKPERIKSA' => '',
			'TBLDAFTHOTEL_NOMORPERIKSA' => '',
			'TBLDAFTHOTEL_BUNGAKRGBAYAR' => '',
			'TBLDAFTHOTEL_KENAIKANKRGBAYAR' => '',
			'TBLDAFTHOTEL_DENDAKRGBAYAR' => '',
			'TBLDAFTHOTEL_RUPIAHKRGBAYAR' => '',
			'TBLDAFTHOTEL_BLNKBAWAL' => '',
			'TBLDAFTHOTEL_BLNKBAKHIR' => '',

			'TBLDAFTHOTEL_TGLKURANGBAYAR' => '',
			'TBLDAFTHOTEL_BLNKURANGBAYAR' => '',
			'TBLDAFTHOTEL_THNKURANGBAYAR' => '',

			'TBLDAFTHOTEL_TGLBTSKRGBAYAR' => '',
			'TBLDAFTHOTEL_BLNBTSKRGBAYAR' => '',
			'TBLDAFTHOTEL_THNBTSKRGBAYAR' => '',

			'TBLDAFTHOTEL_TGLPERIKSA' => '',
			'TBLDAFTHOTEL_BLNPERIKSA' => '',
			'TBLDAFTHOTEL_THNPERIKSA' => '',

		);

		$simpan = $command->update('TBLDAFTHOTEL', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPJK AND TBLPENDATAAN_BLNPAJAK =:TBLPENDATAAN_BLNPAJAK AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = 0',array(':NOPOK' => $NOPOK,':THNPJK' => $THNPJK,':TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK));

		if ($simpan>=0) {
			echo CJSON::encode(array('status'=>'success'));
		}
		else{
			echo CJSON::encode(array('status'=>'failed'));
		}
	}

	public function actionGetNoSKPDKBJAB()
	{
		$tahun = $_REQUEST['tahun'];
		$rek = $_REQUEST['rek'];
		$splthn = substr($tahun, -2);

		$KODEREK = $_REQUEST['rek'];
		if($KODEREK=='1'){
			$NamaTBL = 'TBLDAFTHOTEL';
			// $ADKB = 'DENDAKRGBAYAR';
		}
		elseif($KODEREK=='2'){
			$NamaTBL = 'TBLDAFTRMAKAN';
			// $ADKB = 'DENDAKRGBAYAR';
		}
		elseif($KODEREK=='3'){
			$NamaTBL = 'TBLDAFTHIBURAN';
			// $ADKB = 'DENDAKRGBAYAR';
		}

		$nokbjab = Yii::app()->db->createCommand("SELECT
			MAX(TO_NUMBER (TO_CHAR(NVL(NOKBJAB, 0)))) AS nokb
		FROM
			".$NamaTBL."
		WHERE
			TBLPENDATAAN_THNPAJAK = ".$splthn."
		AND NVL (NOKBJAB, 0) <> 0
		ORDER BY
			TO_NUMBER (TO_CHAR(NVL(nokb, 0))) DESC")->queryScalar();
		$no = $nokbjab+1;

		echo $no;
	}

	public function actionCetak()
	{
		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
		$THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2,4);
		$TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];

        $select = "
        TBLDAFTHOTEL.*,
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BUNGAKRGBAYAR, 0) AS TBLDAFTHOTEL_BUNGAKRGBAYAR, 
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_KENAIKANKRGBAYAR, 0) AS TBLDAFTHOTEL_DENDAKRGBAYAR, 
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) AS TBLDAFTHOTEL_RUPIAHSETOR, 
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BLNKBAWAL, 0) AS TBLDAFTHOTEL_BLNKBAWAL, 
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BLNKBAKHIR, 0) AS TBLDAFTHOTEL_BLNKBAKHIR, 
        TBLDAFTAR.*, (
		SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
			TBLREKENING
		WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTHOTEL.TBLDAFTHOTEL_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTHOTEL.TBLDAFTHOTEL_REKJENIS
	) AS NMREK,
	(
		SELECT
		TBLREKENING.TBLREKENING_KODEFULL
		FROM
		TBLREKENING
		WHERE
		TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTHOTEL.TBLDAFTHOTEL_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTHOTEL.TBLDAFTHOTEL_REKJENIS
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
        $from = 'TBLDAFTHOTEL';

        $otherquery = array(
             'leftjoin_daftar'=>array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHOTEL.TBLDAFTAR_NOPOK')
        );

        $filter = array(
            'EQ__TBLDAFTHOTEL.TBLDAFTAR_NOPOK' => $NOPOK
			,'EQ__TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK' => $THNPJK
			,'EQ__TBLDAFTHOTEL.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);

		$this->renderPartial('cetak',array('data'=>$data));
	}

	public function actionCetakWord()
	{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_skpdkb' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'skpd_jabatan.docx';

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

		$KODEREK = trim($_REQUEST['TBLREKENING_REKAYAT']);
		if($KODEREK=='1'){
			$NamaTBL = 'TBLDAFTHOTEL';
			$PAJAK = 'HOTEL';
		}
		elseif($KODEREK=='2'){
			$NamaTBL = 'TBLDAFTRMAKAN';
			$PAJAK = 'RESTORAN';
		}
		elseif($KODEREK=='3'){
			$NamaTBL = 'TBLDAFTHIBURAN';
			$PAJAK = 'HIBURAN';
		}

		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
		$THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2,4);
		$TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];

        $select = "
        ".$NamaTBL.".*,
        TBLDAFTAR.*,
        TBLPENDATAAN_THNPAJAK,
        TBLPENDATAAN_BLNPAJAK,
        NOKBJAB,
		PAJAKJAB,
		HRKBJAB,
		BLKBJAB,
		THKBJAB,
		BUKBJAB,
		NAKBJAB,
		RPKBJAB,
		IS_MONITORING,
		HRBKBJAB,
		BLBKBJAB,
		THBKBJAB,
		(
		SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
			TBLREKENING
		WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = ".$NamaTBL.".".$NamaTBL."_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = ".$NamaTBL.".".$NamaTBL."_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = ".$NamaTBL.".".$NamaTBL."_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = ".$NamaTBL.".".$NamaTBL."_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = ".$NamaTBL.".".$NamaTBL."_REKJENIS
		) AS NMREK,
		(
			SELECT
			TBLREKENING.TBLREKENING_KODEFULL
			FROM
			TBLREKENING
			WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = ".$NamaTBL.".".$NamaTBL."_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = ".$NamaTBL.".".$NamaTBL."_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = ".$NamaTBL.".".$NamaTBL."_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = ".$NamaTBL.".".$NamaTBL."_REKAYAT
			AND TBLREKENING.TBLREKENING_REKJENIS = ".$NamaTBL.".".$NamaTBL."_REKJENIS
		) AS TBLREKENING_KODEFULL
		";
        $from = $NamaTBL;

        $otherquery = array(
             'leftjoin_daftar'=>array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = '.$NamaTBL.'.TBLDAFTAR_NOPOK')
        );

        $filter = array(
            'EQ__'.$NamaTBL.'.TBLDAFTAR_NOPOK' => $NOPOK
			,'EQ__'.$NamaTBL.'.TBLPENDATAAN_THNPAJAK' => $THNPJK
			,'EQ__'.$NamaTBL.'.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);

        $sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 6";

		$data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();

		$dt = array();

		$dt['nopok'] = $data['cetak']['TBLDAFTAR_NOPOK'];
		$dt['jabatan'] = $data['jab1']['TBLPEJABAT_URAIAN'];
		$dt['petugas'] = $data['jab1']['TBLPEJABAT_NAMA'];
		$dt['nip'] = $data['jab1']['TBLPEJABAT_NIP'];
		$dt['thnkb'] = '20'.$data['cetak']['TBLPENDATAAN_THNPAJAK'];
		$dt['blnkbawal'] = LokalIndonesia::getbulan($data['cetak']['BLKBJAB']);
		$dt['blnkbakhir'] = LokalIndonesia::getbulan($data['cetak']['TBLPENDATAAN_BLNPAJAK']);
		$dt['regkb'] = $data['cetak']['NOKBJAB'];

		$dt['namabadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHANAMA'];
		$dt['namapemilik'] = $data['cetak']['TBLDAFTAR_PEMILIKNAMA'];
		$dt['alamatbadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHAALAMAT'];
		$dt['alamatpemilik'] = $data['cetak']['TBLDAFTAR_PEMILIKALAMAT'];

		$dt['kodefull'] = $data['cetak']['TBLREKENING_KODEFULL'];

		$dt['namarek'] = $data['cetak']['NMREK'];

		$dt['namarek'] = $data['cetak']['NMREK'];

		$dt['jatuhtempo'] = $data['cetak']['HRBKBJAB'] .'/'. $data['cetak']['BLBKBJAB'] .'/20'.$data['cetak']['THBKBJAB'];

		$dt['pajakperiksa'] = LokalIndonesia::rupiah($data['cetak']['PAJAKJAB']);
		$dt['bunga'] = LokalIndonesia::rupiah($data['cetak']['BUKBJAB']);
		$dt['setoran'] = '';
		$dt['denda'] = LokalIndonesia::rupiah($data['cetak']['NAKBJAB']);
		$dt['kurangbayar'] = LokalIndonesia::rupiah($data['cetak']['RPKBJAB']);
		$dt['total'] = LokalIndonesia::rupiah($data['cetak']['RPKBJAB']);
		$dt['terbilang'] = LokalIndonesia::terbilangangka($data['cetak']['RPKBJAB']);

		$dt['thnpajak'] = '20'.$data['cetak']['TBLPENDATAAN_THNPAJAK'];
		$dt['tanggal'] = '';

		$dt['npwpd'] = $data['cetak']['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $data['cetak']['TBLDAFTAR_GOLONGAN'] .'.'. $data['cetak']['TBLDAFTAR_NOPOK'] .'.'. sprintf("%02d",$data['cetak']['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$data['cetak']['TBLKELURAHAN_IDBADANUSAHA']);

		// $dt['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
		$dt['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');
		
		//SAMPAI SINI QUERYNYA

		// var_dump($data);
		// echo json_encode($data['cetak']);Yii::app()->end();
		// echo json_encode($row);

		// Merge data in the first sheet 
		$npwpd = $data['cetak']['TBLDAFTAR_NOPOK'];
		$namafileDL = "SKPDKBJABATAN-".$PAJAK."-".$npwpd.".docx";
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