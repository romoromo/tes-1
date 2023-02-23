<?php

class Skpdkb_hiburanController extends Controller
{
	var $KODE_GOL = 4;
	var $PAJAK_AYAT = 3;
	var $PAJAK_REK = '4.1.1.3.0';

	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['sub_rek'] = TRekening::model()->getRekeningSubAktif('4110100');

		$data['rek'] = Yii::app()->db->createCommand("
		SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.3.%'
		ORDER BY TBLREKENING_KODE
		")
		->queryAll();

		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionautocompletewphiburan()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');
		
		$query = trim($_REQUEST['query']);

		$select = 'TBLDAFTHIBURAN.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT';
		$from = 'TBLDAFTHIBURAN';
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
			,'join'=> array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHIBURAN.TBLDAFTAR_NOPOK')
			,'order'=> 'TBLDAFTHIBURAN.TBLDAFTAR_NOPOK ASC'
			,'group'=> 'TBLDAFTHIBURAN.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT'
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
		$tanggal = trim($_POST['tanggal']);
		$tahun_substr = substr($tahun, 2,4);
		$proses = $this->cekProses($tahun_substr, $bulan, $tanggal, $TBLDAFTAR_NOPOK);
		$cek = $this->cekPernahDaftar($tahun_substr, $bulan, $tanggal, $TBLDAFTAR_NOPOK);
		$bayar =$this->cekBayar($tahun_substr, $bulan, $tanggal, $TBLDAFTAR_NOPOK);
		$angsur =$this->cekAngsur($tahun_substr, $bulan, $tanggal, $TBLDAFTAR_NOPOK);

		if ($bayar > 0) {
			$data['data'] = 'sudah dibayar';	
		} else if ($angsur > 0){
			$data['data'] = 'ada angsur';
		} else if ($proses == '') {
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
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_NOMORPERIKSA, 0) AS TBLDAFTHIBURAN_NOMORPERIKSA,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_REGKURANGBAYAR, 0) AS TBLDAFTHIBURAN_REGKURANGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_PAJAKPERIKSA,0) AS TBLDAFTHIBURAN_PAJAKPERIKSA,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BUNGAKRGBAYAR,0) AS TBLDAFTHIBURAN_BUNGAKRGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_NAKB,0) AS TBLDAFTHIBURAN_NAKB,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_DENDAKRGBAYAR,0) AS TBLDAFTHIBURAN_DENDAKRGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_RUPIAHKRGBAYAR,0) AS TBLDAFTHIBURAN_RUPIAHKRGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNKBAWAL,0) AS TBLDAFTHIBURAN_BLNKBAWAL,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNKBAKHIR,0) AS TBLDAFTHIBURAN_BLNKBAKHIR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_TGLKURANGBAYAR,0) AS TBLDAFTHIBURAN_TGLKURANGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNKURANGBAYAR,0) AS TBLDAFTHIBURAN_BLNKURANGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_THNKURANGBAYAR,0) AS TBLDAFTHIBURAN_THNKURANGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_TGLBTSKRGBAYAR,0) AS TBLDAFTHIBURAN_TGLBTSKRGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNBTSKRGBAYAR,0) AS TBLDAFTHIBURAN_BLNBTSKRGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_THNBTSKRGBAYAR,0) AS TBLDAFTHIBURAN_THNBTSKRGBAYAR 
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,'EQ__TBLDAFTHIBURAN.TBLPENDATAAN_THNPAJAK' => $tahun_substr
			,'EQ__TBLDAFTHIBURAN.TBLPENDATAAN_BLNPAJAK' => $bulan
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'join_2'=> array('TBLDAFTHIBURAN', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHIBURAN.TBLDAFTAR_NOPOK')
			,'order'=> 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC'
			,'andwhere'=> 'NVL(TBLPENDATAAN_TGLPAJAK, 0) = '.$tanggal.''
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

		$data['TBLDAFTHIBURAN_REGKURANGBAYAR'] = $model['TBLDAFTHIBURAN_REGKURANGBAYAR'];
		$data['TBLDAFTHIBURAN_NOMORPERIKSA'] = $model['TBLDAFTHIBURAN_NOMORPERIKSA'];
		$data['TBLDAFTHIBURAN_PAJAKPERIKSA'] = $model['TBLDAFTHIBURAN_PAJAKPERIKSA']; 
		$data['TBLDAFTHIBURAN_BUNGAKRGBAYAR'] = $model['TBLDAFTHIBURAN_BUNGAKRGBAYAR'];
		$data['TBLDAFTHIBURAN_NAKB'] = $model['TBLDAFTHIBURAN_NAKB'];  
		$data['TBLDAFTHIBURAN_DENDAKRGBAYAR'] = $model['TBLDAFTHIBURAN_DENDAKRGBAYAR']; 
		$data['TBLDAFTHIBURAN_RUPIAHKRGBAYAR'] = $model['TBLDAFTHIBURAN_RUPIAHKRGBAYAR']; 
		$data['TBLDAFTHIBURAN_BLNKBAWAL'] = $model['TBLDAFTHIBURAN_BLNKBAWAL']; 
		$data['TBLDAFTHIBURAN_BLNKBAKHIR'] = $model['TBLDAFTHIBURAN_BLNKBAKHIR']; 
		$data['TBLDAFTHIBURAN_TGLKURANGBAYAR'] = sprintf("%02d",$model['TBLDAFTHIBURAN_TGLKURANGBAYAR']); 
		$data['TBLDAFTHIBURAN_BLNKURANGBAYAR'] = sprintf("%02d",$model['TBLDAFTHIBURAN_BLNKURANGBAYAR']); 
		$data['TBLDAFTHIBURAN_THNKURANGBAYAR'] = $model['TBLDAFTHIBURAN_THNKURANGBAYAR']; 
		$data['TBLDAFTHIBURAN_TGLBTSKRGBAYAR'] = sprintf("%02d",$model['TBLDAFTHIBURAN_TGLBTSKRGBAYAR']); 
		$data['TBLDAFTHIBURAN_BLNBTSKRGBAYAR'] = sprintf("%02d",$model['TBLDAFTHIBURAN_BLNBTSKRGBAYAR']); 
		$data['TBLDAFTHIBURAN_THNBTSKRGBAYAR'] = $model['TBLDAFTHIBURAN_THNBTSKRGBAYAR']; 
		
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
		REFBADANUSAHA.REFBADANUSAHA_PERSEN,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_NOMORPERIKSA, 0) AS TBLDAFTHIBURAN_NOMORPERIKSA,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_REGKURANGBAYAR, 0) AS TBLDAFTHIBURAN_REGKURANGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_PAJAKPERIKSA,0) AS TBLDAFTHIBURAN_PAJAKPERIKSA,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BUNGAKRGBAYAR,0) AS TBLDAFTHIBURAN_BUNGAKRGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_NAKB,0) AS TBLDAFTHIBURAN_NAKB,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_DENDAKRGBAYAR,0) AS TBLDAFTHIBURAN_DENDAKRGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_RUPIAHKRGBAYAR,0) AS TBLDAFTHIBURAN_RUPIAHKRGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNKBAWAL,0) AS TBLDAFTHIBURAN_BLNKBAWAL,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNKBAKHIR,0) AS TBLDAFTHIBURAN_BLNKBAKHIR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_TGLKURANGBAYAR,0) AS TBLDAFTHIBURAN_TGLKURANGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNKURANGBAYAR,0) AS TBLDAFTHIBURAN_BLNKURANGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_THNKURANGBAYAR,0) AS TBLDAFTHIBURAN_THNKURANGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_TGLBTSKRGBAYAR,0) AS TBLDAFTHIBURAN_TGLBTSKRGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNBTSKRGBAYAR,0) AS TBLDAFTHIBURAN_BLNBTSKRGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_THNBTSKRGBAYAR,0) AS TBLDAFTHIBURAN_THNBTSKRGBAYAR 
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,'EQ__TBLDAFTHIBURAN.TBLPENDATAAN_THNPAJAK' => $tahun_substr
			,'EQ__TBLDAFTHIBURAN.TBLPENDATAAN_BLNPAJAK' => $bulan
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'join_2'=> array('TBLDAFTHIBURAN', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHIBURAN.TBLDAFTAR_NOPOK')
			,'order'=> 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC'
			,'andwhere'=> 'NVL(TBLPENDATAAN_TGLPAJAK, 0) = '.$tanggal.''
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

		$data['TBLDAFTHIBURAN_REGKURANGBAYAR'] = $model['TBLDAFTHIBURAN_REGKURANGBAYAR'];
		$data['TBLDAFTHIBURAN_NOMORPERIKSA'] = $model['TBLDAFTHIBURAN_NOMORPERIKSA'];
		$data['TBLDAFTHIBURAN_PAJAKPERIKSA'] = $model['TBLDAFTHIBURAN_PAJAKPERIKSA']; 
		$data['TBLDAFTHIBURAN_BUNGAKRGBAYAR'] = $model['TBLDAFTHIBURAN_BUNGAKRGBAYAR'];
		$data['TBLDAFTHIBURAN_NAKB'] = $model['TBLDAFTHIBURAN_NAKB']; 
		$data['TBLDAFTHIBURAN_DENDAKRGBAYAR'] = $model['TBLDAFTHIBURAN_DENDAKRGBAYAR']; 
		$data['TBLDAFTHIBURAN_RUPIAHKRGBAYAR'] = $model['TBLDAFTHIBURAN_RUPIAHKRGBAYAR']; 
		$data['TBLDAFTHIBURAN_BLNKBAWAL'] = $model['TBLDAFTHIBURAN_BLNKBAWAL']; 
		$data['TBLDAFTHIBURAN_BLNKBAKHIR'] = $model['TBLDAFTHIBURAN_BLNKBAKHIR']; 
		$data['TBLDAFTHIBURAN_TGLKURANGBAYAR'] = sprintf("%02d",$model['TBLDAFTHIBURAN_TGLKURANGBAYAR']); 
		$data['TBLDAFTHIBURAN_BLNKURANGBAYAR'] = sprintf("%02d",$model['TBLDAFTHIBURAN_BLNKURANGBAYAR']); 
		$data['TBLDAFTHIBURAN_THNKURANGBAYAR'] = $model['TBLDAFTHIBURAN_THNKURANGBAYAR']; 
		$data['TBLDAFTHIBURAN_TGLBTSKRGBAYAR'] = sprintf("%02d",$model['TBLDAFTHIBURAN_TGLBTSKRGBAYAR']); 
		$data['TBLDAFTHIBURAN_BLNBTSKRGBAYAR'] = sprintf("%02d",$model['TBLDAFTHIBURAN_BLNBTSKRGBAYAR']); 
		$data['TBLDAFTHIBURAN_THNBTSKRGBAYAR'] = $model['TBLDAFTHIBURAN_THNBTSKRGBAYAR']; 

		}

		echo CJSON::encode($data);
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

	public function cekProses($tahun, $bulan, $tanggal, $TBLDAFTAR_NOPOK)
	{
		$model = Yii::app()->db->createCommand('SELECT TBLPENDATAAN_THNPAJAK FROM TBLDAFTHIBURAN WHERE TBLPENDATAAN_THNPAJAK ='.$tahun.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$TBLDAFTAR_NOPOK.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) ='.$tanggal)->queryScalar();
		return $model;
	}

	public function cekPernahDaftar($thn, $bulan, $tanggal, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT TBLDAFTHIBURAN_THNKURANGBAYAR FROM TBLDAFTHIBURAN WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$nopok.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = '.$tanggal)->queryScalar();
		return $model;
	}

	public function cekBayar($THNPAJAK, $BLNPAJAK, $tanggal, $NOPOKOK)
	{
		$model = Yii::app()->db->createCommand("SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLSETORANBPD WHERE TBLPENDATAAN_THNPAJAK =".$THNPAJAK." AND TBLPENDATAAN_BLNPAJAK=".$BLNPAJAK." AND TBLDAFTAR_NOPOK=".$NOPOKOK." AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$tanggal." AND TBLSETORANBPD_JNSKETETAPAN = 'K'")->queryScalar();
		return $model;
	}

	public function cekAngsur($thn, $bulan, $tanggal, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLANGSURAN WHERE TBLANGSURAN_PAJAKKE = 1 AND TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = '.$tanggal.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;
	}

	public function CekNoRegisterKB($tahun, $bulan, $tanggal, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT NVL(TBLDAFTHIBURAN_REGKURANGBAYAR,0) AS NOKB FROM TBLDAFTHIBURAN WHERE TBLPENDATAAN_THNPAJAK = '.$tahun.' AND TBLPENDATAAN_BLNPAJAK = '.$bulan.' AND TBLDAFTAR_NOPOK = '.$nopok.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = '.$tanggal)->queryScalar();
		return $model;
	}

	public function GetLastNoKB($tahun, $bulan, $tanggal, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT MAX(NVL(TBLKRGBAYAR_REGKURANGBAYAR,0)) AS LAST_KB FROM TBLKRGBAYAR WHERE TBLPENDATAAN_THNPAJAK = '.$tahun.' AND TBLPENDATAAN_BLNPAJAK = '.$bulan.' AND TBLDAFTAR_NOPOK = '.$nopok.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = '.$tanggal)->queryScalar();
		return $model;
	}

	public function actionSimpanSKPDKBHiburan()
	{
		Yii::import('ext.LokalIndonesia');

		$PARAM = $_REQUEST;
		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];

		$THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2,4);

		$TBLPENDATAAN_BLNPAJAK = !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';

		$TBLPENDATAAN_TGLPAJAK = !empty($_REQUEST['tanggal']) ? $_REQUEST['tanggal'] : '0';	

		$TBLDAFTHIBURAN_TGLKURANGBAYAR = !empty($_REQUEST['TBLDAFTHIBURAN_TGLKURANGBAYAR']) ? $_REQUEST['TBLDAFTHIBURAN_TGLKURANGBAYAR'] : '';

		$TBLDAFTHIBURAN_TGLBTSKRGBAYAR = !empty($_REQUEST['TBLDAFTHIBURAN_TGLBTSKRGBAYAR']) ? $_REQUEST['TBLDAFTHIBURAN_TGLBTSKRGBAYAR'] : '';

		$TBLDAFTHIBURAN_TGLPERIKSA = !empty($_REQUEST['TBLDAFTHIBURAN_TGLPERIKSA']) ? $_REQUEST['TBLDAFTHIBURAN_TGLPERIKSA'] : '';

		if ($TBLDAFTHIBURAN_TGLKURANGBAYAR !='') {
			$exp_TGLTERIMADAFTAR = explode('-', $TBLDAFTHIBURAN_TGLKURANGBAYAR);
			$pecahtgldaftar = $exp_TGLTERIMADAFTAR[0];
			$pecahbulandaftar = $exp_TGLTERIMADAFTAR[1];
			$pecahthndaftar = substr($exp_TGLTERIMADAFTAR[2], -2);	
		} else {
			$pecahtgldaftar = '';
			$pecahbulandaftar = '';
			$pecahthndaftar = '';
		}

		if ($TBLDAFTHIBURAN_TGLBTSKRGBAYAR !='') {
			$exp_TGLENTRYDAFTAR = explode('-', $TBLDAFTHIBURAN_TGLBTSKRGBAYAR);
			$pecahtglentry = $exp_TGLENTRYDAFTAR[0];
			$pecahbulanentry = $exp_TGLENTRYDAFTAR[1];
			$pecahthnentry = substr($exp_TGLENTRYDAFTAR[2], -2);
		} else {
			$pecahtglentry = '';
			$pecahbulanentry = '';
			$pecahthnentry = '';
		}

		if ($TBLDAFTHIBURAN_TGLPERIKSA !='') {
			$exp_TGLPERIKSA = explode('-', $TBLDAFTHIBURAN_TGLPERIKSA);
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

			'TBLDAFTHIBURAN_REGKURANGBAYAR' => LokalIndonesia::toAngka($PARAM['TBLDAFTHIBURAN_REGKURANGBAYAR']),
			'TBLDAFTHIBURAN_PAJAKPERIKSA' => LokalIndonesia::toAngka($PARAM['TBLDAFTHIBURAN_PAJAKPERIKSA']),
			'TBLDAFTHIBURAN_NOMORPERIKSA' => $PARAM['TBLDAFTHIBURAN_NOMORPERIKSA'],
			'TBLDAFTHIBURAN_BUNGAKRGBAYAR' => LokalIndonesia::toAngka($PARAM['TBLDAFTHIBURAN_BUNGAKRGBAYAR']),
			'TBLDAFTHIBURAN_DENDAKRGBAYAR' => LokalIndonesia::toAngka($PARAM['TBLDAFTHIBURAN_DENDAKRGBAYAR']),
			'TBLDAFTHIBURAN_NAKB' => LokalIndonesia::toAngka($PARAM['TBLDAFTHIBURAN_NAKB']),
			'TBLDAFTHIBURAN_RUPIAHKRGBAYAR' => LokalIndonesia::toAngka($PARAM['TBLDAFTHIBURAN_RUPIAHKRGBAYAR']),
			'TBLDAFTHIBURAN_BLNKBAWAL' => $PARAM['TBLDAFTHIBURAN_BLNKBAWAL'],
			'TBLDAFTHIBURAN_BLNKBAKHIR' => $PARAM['TBLDAFTHIBURAN_BLNKBAKHIR'],

			'TBLDAFTHIBURAN_TGLKURANGBAYAR' => $pecahtgldaftar,
			'TBLDAFTHIBURAN_BLNKURANGBAYAR' => $pecahbulandaftar,
			'TBLDAFTHIBURAN_THNKURANGBAYAR' => $pecahthndaftar,

			'TBLDAFTHIBURAN_TGLBTSKRGBAYAR' => $pecahtglentry,
			'TBLDAFTHIBURAN_BLNBTSKRGBAYAR' => $pecahbulanentry,
			'TBLDAFTHIBURAN_THNBTSKRGBAYAR' => $pecahthnentry,

			'TBLDAFTHIBURAN_TGLPERIKSA' => $pecahtglperiksa,
			'TBLDAFTHIBURAN_BLNPERIKSA' => $pecahbulanperiksa,
			'TBLDAFTHIBURAN_THNPERIKSA' => $pecahthnperiksa,

		);

		$simpan = $command->update('TBLDAFTHIBURAN', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPJK AND TBLPENDATAAN_BLNPAJAK =:TBLPENDATAAN_BLNPAJAK AND NVL(TBLPENDATAAN_TGLPAJAK, 0) =:TBLPENDATAAN_TGLPAJAK',array(':NOPOK' => $NOPOK,':THNPJK' => $THNPJK,':TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK,':TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK));

		/* INSERT TABEL KURANG BAYAR */

		$CekNoRegisterKB = $this->CekNoRegisterKB($THNPJK, $TBLPENDATAAN_BLNPAJAK, $TBLPENDATAAN_TGLPAJAK, $NOPOK);
		$LastNoKB = $this->GetLastNoKB($THNPJK, $TBLPENDATAAN_BLNPAJAK, $TBLPENDATAAN_TGLPAJAK, $NOPOK);

		if ($CekNoRegisterKB==0) {
			$NoRecordKB = '1';
		} else {
			$NoRecordKB = $LastNoKB+1;
		}

		// 

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
		TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NOPOK;
		$data['wp'] = Yii::app()->db->createCommand( $sql )->queryRow();

		// echo $CekNoRegisterKB;die();
		$dataspt['spt'] = Yii::app()->db->createCommand()
		->select('*')
		->from('TBLDAFTHIBURAN')
		->where('NVL(TBLPENDATAAN_TGLPAJAK, 0) = '.$TBLPENDATAAN_TGLPAJAK.' AND TBLPENDATAAN_THNPAJAK ='.$THNPJK.' AND
			TBLPENDATAAN_BLNPAJAK='.$TBLPENDATAAN_BLNPAJAK.' AND
			TBLDAFTAR_NOPOK='.$NOPOK)
		->queryRow();

		$column = array('TBLPENDATAAN_THNPAJAK'=>$THNPJK
			,'TBLPENDATAAN_BLNPAJAK'=>$TBLPENDATAAN_BLNPAJAK
			,'TBLPENDATAAN_TGLPAJAK'=>$TBLPENDATAAN_TGLPAJAK
			,'TBLKRGBAYAR_JNSSURAT'=>''
			,'TBLDAFTAR_JNSPENDAPATAN'=>$dataspt['spt']['TBLDAFTAR_JNSPENDAPATAN']
			,'TBLDAFTAR_NOPOK'=>$NOPOK
			,'LOP'=>''
			,'TBLKRGBAYAR_PAJAKKE'=>$NoRecordKB
			,'TBLKRGBAYAR_GOLONGAN'=>$dataspt['spt']['TBLDAFTAR_GOLONGAN']
			,'TBLKECAMATAN_ID'=>$dataspt['spt']['TBLKECAMATAN_ID']
			,'TBLKELURAHAN_ID'=>$dataspt['spt']['TBLKELURAHAN_ID']
			,'TBLKRGBAYAR_NAMABADANUSAHA'=>$data['wp']['TBLDAFTAR_BADANUSAHANAMA']
			,'TBLKRGBAYAR_ALAMATBADANUSAHA'=>$data['wp']['TBLDAFTAR_BADANUSAHAALAMAT']
			,'PJ'=>''
			,'TBLKRGBAYAR_CARAKETETAPAN'=>''
			,'TBLKRGBAYAR_THNKETETAPAN'=>$pecahthndaftar
			,'TBLKRGBAYAR_BLNKETETAPAN'=>$pecahbulandaftar
			,'TBLKRGBAYAR_TGLKETETAPAN'=>$pecahtgldaftar
			,'TBLKRGBAYAR_REGKURANGBAYAR'=>LokalIndonesia::toAngka($PARAM['TBLDAFTHIBURAN_REGKURANGBAYAR'])
			,'TBLKRGBAYAR_THNAWALKETETAPAN'=>'' // DIKOSONGKAN
			,'TBLKRGBAYAR_BLNAWALKETETAPAN'=>'' // DIKOSONGKAN
			,'TBLKRGBAYAR_TGLAWALKETETAPAN'=>'' // DIKOSONGKAN
			,'TBLKRGBAYAR_THNBATASKETETAPAN'=>$pecahthnentry
			,'TBLKRGBAYAR_BLNBATASKETETAPAN'=>$pecahbulanentry
			,'TBLKRGBAYAR_TGLBATASKETETAPAN'=>$pecahtglentry
			,'TBLKRGBAYAR_THNTERIMAKETETAPAN'=>'' // DIKOSONGKAN
			,'TBLKRGBAYAR_BLNTERIMAKETETAPAN'=>'' // DIKOSONGKAN
			,'TBLKRGBAYAR_TGLTERIMAKETETAPAN'=>'' // DIKOSONGKAN
			,'TBLKRGBAYAR_THNENTRIKETETAPAN'=>$pecahthndaftar
			,'TBLKRGBAYAR_BLNENTRIKETETAPAN'=>$pecahbulandaftar
			,'TBLKRGBAYAR_TGLENTRIKETETAPAN'=>$pecahtgldaftar
			,'TBLKRGBAYAR_KETETAPANTOTAL'=> !empty($dataspt['spt']['TBLDAFTHIBURAN_PAJAKSKPD']) ? $dataspt['spt']['TBLDAFTHIBURAN_PAJAKSKPD'] : ''
			,'TBLKRGBAYAR_SETORAN'=>'' // DARI TABEL SETOR
			,'TBLKRGBAYAR_SISAANGSURAN'=>'' //DATA ANGSURAN
			,'TBLKRGBAYAR_DENDAANGSURAN'=>'' //DATA ANGSURAN
			,'TBLKRGBAYAR_BUNGAANGSURAN'=>'' //DATA ANGSURAN
			,'TBLKRGBAYAR_THNSETORANGSURAN'=>''  //DATA ANGSURAN
			,'TBLKRGBAYAR_BLNSETORANGSURAN'=>''  //DATA ANGSURAN
			,'TBLKRGBAYAR_TGLSETORANGSURAN'=>''  //DATA ANGSURAN
			,'TBLKRGBAYAR_THNENTRISETOR'=>!empty($dataspt['spt']['TBLDAFTHIBURAN_THNENTRISETOR']) ? $dataspt['spt']['TBLDAFTHIBURAN_THNENTRISETOR'] : ''
			,'TBLKRGBAYAR_BLNENTRISETOR'=>!empty($dataspt['spt']['TBLDAFTHIBURAN_BLNENTRISETOR']) ? $dataspt['spt']['TBLDAFTHIBURAN_BLNENTRISETOR'] : ''
			,'TBLKRGBAYAR_TGLENTRISETOR'=>!empty($dataspt['spt']['TBLDAFTHIBURAN_TGLENTRISETOR']) ? $dataspt['spt']['TBLDAFTHIBURAN_TGLENTRISETOR'] : ''
			,'TBLKRGBAYAR_NOMORSETOR'=> '' //DARI TABEL SETOR
			,'TBLKRGBAYAR_REKPENDAPATAN'=>$dataspt['spt']['TBLDAFTHIBURAN_REKPENDAPATAN']
			,'TBLKRGBAYAR_REKPAD'=>$dataspt['spt']['TBLDAFTHIBURAN_REKPAD']
			,'TBLKRGBAYAR_REKPAJAK'=>$dataspt['spt']['TBLDAFTHIBURAN_REKPAJAK']
			,'TBLKRGBAYAR_REKAYAT'=>$dataspt['spt']['TBLDAFTHIBURAN_REKAYAT']
			,'TBLKRGBAYAR_REKJENIS'=>$dataspt['spt']['TBLDAFTHIBURAN_REKJENIS']
			,'TBLKRGBAYAR_NAMAOPERATOR'=>''
			,'TER'=>''
			,'TBLKRGBAYAR_TGLENTRI'=> ''
			,'TBLKRGBAYAR_PAJAKPERIKSA'=> LokalIndonesia::toAngka($PARAM['TBLDAFTHIBURAN_PAJAKPERIKSA'])
			,'TBLKRGBAYAR_DENDAKRGBAYAR'=> LokalIndonesia::toAngka($PARAM['TBLDAFTHIBURAN_DENDAKRGBAYAR'])
			,'TBLKRGBAYAR_KENAIKANKRGBAYAR'=> LokalIndonesia::toAngka($PARAM['TBLDAFTHIBURAN_NAKB'])
			,'TBLKRGBAYAR_BUNGAKRGBAYAR'=> LokalIndonesia::toAngka($PARAM['TBLDAFTHIBURAN_BUNGAKRGBAYAR'])
			,'TBLKRGBAYAR_BLNKBAWAL'=> $PARAM['TBLDAFTHIBURAN_BLNKBAWAL']
			,'TBLKRGBAYAR_BLNKBAKHIR'=> $PARAM['TBLDAFTHIBURAN_BLNKBAKHIR']
			,'TBLKRGBAYAR_NOMORPERIKSA'=> $PARAM['TBLDAFTHIBURAN_NOMORPERIKSA']
			,'TBLKRGBAYAR_ISAKTIF'=>'T'
		);

		$simpan_kb = $command->insert('TBLKRGBAYAR', $column);
		
		if ($simpan_kb>=0) {
			if ($simpan>=0) {
				echo CJSON::encode(array('status'=>'success'));
			}
			else{
				echo CJSON::encode(array('status'=>'failed'));
			}
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

		$TBLPENDATAAN_TGLPAJAK = !empty($_REQUEST['TANGGAL']) ? $_REQUEST['TANGGAL'] : '0';

		$command = Yii::app()->db->createCommand();
		$column = array(

			'TBLDAFTHIBURAN_REGKURANGBAYAR' => '',
			'TBLDAFTHIBURAN_PAJAKPERIKSA' => '',
			'TBLDAFTHIBURAN_NOMORPERIKSA' => '',
			'TBLDAFTHIBURAN_BUNGAKRGBAYAR' => '',
			'TBLDAFTHIBURAN_NAKB' => '',
			'TBLDAFTHIBURAN_DENDAKRGBAYAR' => '',
			'TBLDAFTHIBURAN_RUPIAHKRGBAYAR' => '',
			'TBLDAFTHIBURAN_BLNKBAWAL' => '',
			'TBLDAFTHIBURAN_BLNKBAKHIR' => '',

			'TBLDAFTHIBURAN_TGLKURANGBAYAR' => '',
			'TBLDAFTHIBURAN_BLNKURANGBAYAR' => '',
			'TBLDAFTHIBURAN_THNKURANGBAYAR' => '',

			'TBLDAFTHIBURAN_TGLBTSKRGBAYAR' => '',
			'TBLDAFTHIBURAN_BLNBTSKRGBAYAR' => '',
			'TBLDAFTHIBURAN_THNBTSKRGBAYAR' => '',

			'TBLDAFTHIBURAN_TGLPERIKSA' => '',
			'TBLDAFTHIBURAN_BLNPERIKSA' => '',
			'TBLDAFTHIBURAN_THNPERIKSA' => '',

		);

		$simpan = $command->update('TBLDAFTHIBURAN', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPJK AND TBLPENDATAAN_BLNPAJAK =:TBLPENDATAAN_BLNPAJAK AND NVL(TBLPENDATAAN_TGLPAJAK, 0) =:TBLPENDATAAN_TGLPAJAK',array(':NOPOK' => $NOPOK,':THNPJK' => $THNPJK,':TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK,':TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK));

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
			MAX(TO_NUMBER (TO_CHAR(NVL(TBLDAFTHIBURAN_REGKURANGBAYAR, 0))))+1 AS nokb
		FROM
			TBLDAFTHIBURAN
		WHERE
			TBLPENDATAAN_THNPAJAK = ".$splthn."
		AND NVL (TBLDAFTHIBURAN_REGKURANGBAYAR, 0) <> 0
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
		$TBLPENDATAAN_TGLPAJAK = $_REQUEST['TBLPENDATAAN_TGLPAJAK'];

        $select = "
        TBLDAFTHIBURAN.*,
        NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BUNGAKRGBAYAR, 0) AS TBLDAFTHIBURAN_BUNGAKRGBAYAR, 
        NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_DENDAKRGBAYAR, 0) AS TBLDAFTHIBURAN_DENDAKRGBAYAR,
        NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_NAKB, 0) AS TBLDAFTHIBURAN_NAKB, 
        NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_RUPIAHSETOR, 0) AS TBLDAFTHIBURAN_RUPIAHSETOR, 
        NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNKBAWAL, 0) AS TBLDAFTHIBURAN_BLNKBAWAL, 
        NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNKBAKHIR, 0) AS TBLDAFTHIBURAN_BLNKBAKHIR, 
        TBLDAFTAR.*, (
		SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
			TBLREKENING
		WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKJENIS
	) AS NMREK,
	(
		SELECT
		TBLREKENING.TBLREKENING_KODEFULL
		FROM
		TBLREKENING
		WHERE
		TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKJENIS
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
        $from = 'TBLDAFTHIBURANa';

        $otherquery = array(
             'leftjoin_daftar'=>array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHIBURAN.TBLDAFTAR_NOPOK')
        );

        $filter = array(
            'EQ__TBLDAFTHIBURAN.TBLDAFTAR_NOPOK' => $NOPOK
			,'EQ__TBLDAFTHIBURAN.TBLPENDATAAN_THNPAJAK' => $THNPJK
			,'EQ__TBLDAFTHIBURAN.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
			,'EQ__TBLDAFTHIBURAN.TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK
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
		$tglpajak = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? $_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '0';

        $select = "
        TBLDAFTHIBURAN.*,
        NVL(TBLDAFTHIBURAN.TBLPENDATAAN_TGLPAJAK, 0) AS TBLPENDATAAN_TGLPAJAK,
        NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BUNGAKRGBAYAR, 0) AS TBLDAFTHIBURAN_BUNGAKRGBAYAR, 
        NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_DENDAKRGBAYAR, 0) AS TBLDAFTHIBURAN_DENDAKRGBAYAR,
        NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_NAKB, 0) AS TBLDAFTHIBURAN_NAKB, 
        NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_RUPIAHSETOR, 0) AS TBLDAFTHIBURAN_RUPIAHSETOR, 
        NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNKBAWAL, 0) AS TBLDAFTHIBURAN_BLNKBAWAL, 
        NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNKBAKHIR, 0) AS TBLDAFTHIBURAN_BLNKBAKHIR, 
        TBLDAFTAR.*, (
		SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
			TBLREKENING
		WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKJENIS
		) AS NMREK,
		(
			SELECT
			TBLREKENING.TBLREKENING_KODEFULL
			FROM
			TBLREKENING
			WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKAYAT
			AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTHIBURAN.TBLDAFTHIBURAN_REKJENIS
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
        $from = 'TBLDAFTHIBURAN';

        $otherquery = array(
             'leftjoin_daftar'=>array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHIBURAN.TBLDAFTAR_NOPOK')
             ,'andwhere'=> 'NVL(TBLDAFTHIBURAN.TBLPENDATAAN_TGLPAJAK, 0) = '.$tglpajak.''
        );

        $filter = array(
            'EQ__TBLDAFTHIBURAN.TBLDAFTAR_NOPOK' => $NOPOK
			,'EQ__TBLDAFTHIBURAN.TBLPENDATAAN_THNPAJAK' => $THNPJK
			,'EQ__TBLDAFTHIBURAN.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
			// ,'EQ__TBLDAFTHIBURAN.TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK
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
		$dt['thnkb'] = '20'.$data['cetak']['TBLDAFTHIBURAN_THNKURANGBAYAR'];
		$dt['blnkbawal'] = LokalIndonesia::getbulan($data['cetak']['TBLDAFTHIBURAN_BLNKBAWAL']);
		$dt['blnkbakhir'] = LokalIndonesia::getbulan($data['cetak']['TBLDAFTHIBURAN_BLNKBAKHIR']);
		$dt['regkb'] = $data['cetak']['TBLDAFTHIBURAN_REGKURANGBAYAR'];

		$dt['namabadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHANAMA'];
		$dt['namapemilik'] = $data['cetak']['TBLDAFTAR_PEMILIKNAMA'];
		$dt['alamatbadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHAALAMAT'];
		$dt['alamatpemilik'] = $data['cetak']['TBLDAFTAR_PEMILIKALAMAT'];

		$dt['kodefull'] = $data['cetak']['TBLREKENING_KODEFULL'];

		$dt['namarek'] = $data['cetak']['NMREK'];

		$dt['namarek'] = $data['cetak']['NMREK'];

		$dt['jatuhtempo'] = $data['cetak']['TBLDAFTHIBURAN_TGLBTSKRGBAYAR'] .'/'. $data['cetak']['TBLDAFTHIBURAN_BLNBTSKRGBAYAR'] .'/20'.$data['cetak']['TBLDAFTHIBURAN_THNBTSKRGBAYAR'];

		$dt['pajakperiksa'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHIBURAN_PAJAKPERIKSA']);
		$dt['bunga'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHIBURAN_BUNGAKRGBAYAR']);
		$dt['denda'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHIBURAN_DENDAKRGBAYAR']);
		$dt['naik'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHIBURAN_NAKB']);
		$dt['setoran'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHIBURAN_RUPIAHSETOR']);
		$dt['kurangbayar'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHIBURAN_RUPIAHKRGBAYAR']);
		$dt['total'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHIBURAN_RUPIAHKRGBAYAR']);
		$dt['terbilang'] = LokalIndonesia::terbilangangka($data['cetak']['TBLDAFTHIBURAN_RUPIAHKRGBAYAR']);

		$dt['thnpajak'] = '20'.$data['cetak']['TBLPENDATAAN_THNPAJAK'];

		if($data['cetak']['TBLPENDATAAN_TGLPAJAK']==0){
			$dt['tanggal'] = '';
		} else {
			$dt['tanggal'] = 'Tanggal' .':'. $data['cetak']['TBLPENDATAAN_TGLPAJAK'];
		}

		$dt['npwpd'] = $data['cetak']['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $data['cetak']['TBLDAFTAR_GOLONGAN'] .'.'. $data['cetak']['TBLDAFTAR_NOPOK'] .'.'. sprintf("%02d",$data['cetak']['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$data['cetak']['TBLKELURAHAN_IDBADANUSAHA']);

		// $dt['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
		$dt['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');
		
		//SAMPAI SINI QUERYNYA

		// var_dump($data);
		// echo json_encode($data['cetak']);Yii::app()->end();
		// echo json_encode($row);

		// Merge data in the first sheet 
		$npwpd = $data['cetak']['TBLDAFTAR_NOPOK'];
		$namafileDL = "SKPDKB-HIBURAN-".$npwpd.".docx";
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