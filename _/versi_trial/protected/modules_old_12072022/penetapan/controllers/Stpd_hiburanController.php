<?php

class Stpd_hiburanController extends Controller
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

		if ($bayar > 0) {
			$data['data'] = 'sudah dibayar';	
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
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_PAJAKPERIKSA,0) AS TBLDAFTHIBURAN_PAJAKPERIKSA,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_NOSURATTAGIHAN, 0) AS TBLDAFTHIBURAN_NOSURATTAGIHAN,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BUNGATAGIHAN,0) AS TBLDAFTHIBURAN_BUNGATAGIHAN,		
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_NAKB,0) AS TBLDAFTHIBURAN_NAKB,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_DENDAKRGBAYAR,0) AS TBLDAFTHIBURAN_DENDAKRGBAYAR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_RUPIAHTAGIHAN,0) AS TBLDAFTHIBURAN_RUPIAHTAGIHAN,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNKBAWAL,0) AS TBLDAFTHIBURAN_BLNKBAWAL,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNKBAKHIR,0) AS TBLDAFTHIBURAN_BLNKBAKHIR,

		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_TGLSKPD,0) AS TBLDAFTHIBURAN_TGLSKPD,
			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNSKPD,0) AS TBLDAFTHIBURAN_BLNSKPD,
			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_THNSKPD,0) AS TBLDAFTHIBURAN_THNSKPD,
			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_PAJAK, 0) AS TBLDAFTHIBURAN_PAJAK,

			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_TGLENTRISETOR,0) AS TBLDAFTHIBURAN_TGLENTRISETOR,
			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNENTRISETOR,0) AS TBLDAFTHIBURAN_BLNENTRISETOR,
			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_THNENTRISETOR,0) AS TBLDAFTHIBURAN_THNENTRISETOR,
			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_REGSETOR,0) AS TBLDAFTHIBURAN_REGSETOR,
			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_RUPIAHSETOR,0) AS TBLDAFTHIBURAN_RUPIAHSETOR,

			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_TGLPERIKSA,0) AS TBLDAFTHIBURAN_TGLPERIKSA,
			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNPERIKSA,0) AS TBLDAFTHIBURAN_BLNPERIKSA,
			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_THNPERIKSA,0) AS TBLDAFTHIBURAN_THNPERIKSA,

			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_TGLSURATTAGIHAN,0) AS TBLDAFTHIBURAN_TGLSURATTAGIHAN,
			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNSURATTAGIHAN,0) AS TBLDAFTHIBURAN_BLNSURATTAGIHAN,
			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_THNSURATTAGIHAN,0) AS TBLDAFTHIBURAN_THNSURATTAGIHAN,
			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_TGLBTSTAGIHAN,0) AS TBLDAFTHIBURAN_TGLBTSTAGIHAN,
			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNBTSTAGIHAN,0) AS TBLDAFTHIBURAN_BLNBTSTAGIHAN,
			NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_THNBTSTAGIHAN,0) AS TBLDAFTHIBURAN_THNBTSTAGIHAN 
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

		$data['TBLDAFTHIBURAN_NOSURATTAGIHAN'] = $model['TBLDAFTHIBURAN_NOSURATTAGIHAN'];
			$data['TBLDAFTHIBURAN_NOMORPERIKSA'] = $model['TBLDAFTHIBURAN_NOMORPERIKSA'];
			$data['TBLDAFTHIBURAN_PAJAKPERIKSA'] = $model['TBLDAFTHIBURAN_PAJAKPERIKSA']; 
			$data['TBLDAFTHIBURAN_BUNGATAGIHAN'] = $model['TBLDAFTHIBURAN_BUNGATAGIHAN']; 
			$data['TBLDAFTHIBURAN_NAKB'] = $model['TBLDAFTHIBURAN_NAKB']; 
			$data['TBLDAFTHIBURAN_DENDAKRGBAYAR'] = $model['TBLDAFTHIBURAN_DENDAKRGBAYAR']; 
			$data['TBLDAFTHIBURAN_RUPIAHTAGIHAN'] = $model['TBLDAFTHIBURAN_RUPIAHTAGIHAN']; 
			$data['TBLDAFTHIBURAN_BLNKBAWAL'] = $model['TBLDAFTHIBURAN_BLNKBAWAL']; 
			$data['TBLDAFTHIBURAN_BLNKBAKHIR'] = $model['TBLDAFTHIBURAN_BLNKBAKHIR']; 
			$data['TBLDAFTHIBURAN_TGLSURATTAGIHAN'] = sprintf("%02d",$model['TBLDAFTHIBURAN_TGLSURATTAGIHAN']); 
			$data['TBLDAFTHIBURAN_BLNSURATTAGIHAN'] = sprintf("%02d",$model['TBLDAFTHIBURAN_BLNSURATTAGIHAN']); 
			$data['TBLDAFTHIBURAN_THNSURATTAGIHAN'] = $model['TBLDAFTHIBURAN_THNSURATTAGIHAN'];
			$data['TBLDAFTHIBURAN_TGLSKPD'] = sprintf("%02d",$model['TBLDAFTHIBURAN_TGLSKPD']); 
			$data['TBLDAFTHIBURAN_BLNSKPD'] = sprintf("%02d",$model['TBLDAFTHIBURAN_BLNSKPD']); 
			$data['TBLDAFTHIBURAN_THNSKPD'] = $model['TBLDAFTHIBURAN_THNSKPD'];
			$data['TBLDAFTHIBURAN_PAJAK'] = $model['TBLDAFTHIBURAN_PAJAK'];
			$data['TBLDAFTHIBURAN_TGLENTRISETOR'] = sprintf("%02d",$model['TBLDAFTHIBURAN_TGLENTRISETOR']); 
			$data['TBLDAFTHIBURAN_BLNENTRISETOR'] = sprintf("%02d",$model['TBLDAFTHIBURAN_BLNENTRISETOR']); 
			$data['TBLDAFTHIBURAN_THNENTRISETOR'] = $model['TBLDAFTHIBURAN_THNENTRISETOR'];
			$data['TBLDAFTHIBURAN_REGSETOR'] = $model['TBLDAFTHIBURAN_REGSETOR'];
			$data['TBLDAFTHIBURAN_RUPIAHSETOR'] = $model['TBLDAFTHIBURAN_RUPIAHSETOR'];
			$data['TBLDAFTHIBURAN_TGLPERIKSA'] = sprintf("%02d",$model['TBLDAFTHIBURAN_TGLPERIKSA']); 
			$data['TBLDAFTHIBURAN_BLNPERIKSA'] = sprintf("%02d",$model['TBLDAFTHIBURAN_BLNPERIKSA']); 
			$data['TBLDAFTHIBURAN_THNPERIKSA'] = $model['TBLDAFTHIBURAN_THNPERIKSA'];
			$data['TBLDAFTHIBURAN_TGLBTSTAGIHAN'] = sprintf("%02d",$model['TBLDAFTHIBURAN_TGLBTSTAGIHAN']); 
			$data['TBLDAFTHIBURAN_BLNBTSTAGIHAN'] = sprintf("%02d",$model['TBLDAFTHIBURAN_BLNBTSTAGIHAN']); 
			$data['TBLDAFTHIBURAN_THNBTSTAGIHAN'] = $model['TBLDAFTHIBURAN_THNBTSTAGIHAN']; 
		
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
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_TGLSKPD,0) AS TBLDAFTHIBURAN_TGLSKPD,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNSKPD,0) AS TBLDAFTHIBURAN_BLNSKPD,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_THNSKPD,0) AS TBLDAFTHIBURAN_THNSKPD,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_PAJAK,0) AS TBLDAFTHIBURAN_PAJAK,

		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_TGLENTRISETOR,0) AS TBLDAFTHIBURAN_TGLENTRISETOR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNENTRISETOR,0) AS TBLDAFTHIBURAN_BLNENTRISETOR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_THNENTRISETOR,0) AS TBLDAFTHIBURAN_THNENTRISETOR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_REGSETOR,0) AS TBLDAFTHIBURAN_REGSETOR,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_RUPIAHSETOR,0) AS TBLDAFTHIBURAN_RUPIAHSETOR,

		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_TGLPERIKSA,0) AS TBLDAFTHIBURAN_TGLPERIKSA,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BLNPERIKSA,0) AS TBLDAFTHIBURAN_BLNPERIKSA,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_THNPERIKSA,0) AS TBLDAFTHIBURAN_THNPERIKSA,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_NOMORPERIKSA, 0) AS TBLDAFTHIBURAN_NOMORPERIKSA,
		NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_PAJAKPERIKSA,0) AS TBLDAFTHIBURAN_PAJAKPERIKSA  
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
		$data['TBLDAFTHIBURAN_TGLSKPD'] = sprintf("%02d",$model['TBLDAFTHIBURAN_TGLSKPD']); 
		$data['TBLDAFTHIBURAN_BLNSKPD'] = sprintf("%02d",$model['TBLDAFTHIBURAN_BLNSKPD']); 
		$data['TBLDAFTHIBURAN_THNSKPD'] = $model['TBLDAFTHIBURAN_THNSKPD'];
		$data['TBLDAFTHIBURAN_PAJAK'] =$model['TBLDAFTHIBURAN_PAJAK'];
		$data['TBLDAFTHIBURAN_TGLENTRISETOR'] = sprintf("%02d",$model['TBLDAFTHIBURAN_TGLENTRISETOR']); 
		$data['TBLDAFTHIBURAN_BLNENTRISETOR'] = sprintf("%02d",$model['TBLDAFTHIBURAN_BLNENTRISETOR']); 
		$data['TBLDAFTHIBURAN_THNENTRISETOR'] = $model['TBLDAFTHIBURAN_THNENTRISETOR'];
		$data['TBLDAFTHIBURAN_REGSETOR'] = $model['TBLDAFTHIBURAN_REGSETOR'];
		$data['TBLDAFTHIBURAN_RUPIAHSETOR'] = $model['TBLDAFTHIBURAN_RUPIAHSETOR'];
		$data['TBLDAFTHIBURAN_TGLPERIKSA'] = sprintf("%02d",$model['TBLDAFTHIBURAN_TGLPERIKSA']); 
		$data['TBLDAFTHIBURAN_BLNPERIKSA'] = sprintf("%02d",$model['TBLDAFTHIBURAN_BLNPERIKSA']); 
		$data['TBLDAFTHIBURAN_THNPERIKSA'] = $model['TBLDAFTHIBURAN_THNPERIKSA'];
		$data['TBLDAFTHIBURAN_NOMORPERIKSA'] = $model['TBLDAFTHIBURAN_NOMORPERIKSA'];
		$data['TBLDAFTHIBURAN_PAJAKPERIKSA'] = $model['TBLDAFTHIBURAN_PAJAKPERIKSA'];
		 

		}

		echo CJSON::encode($data);
	}

	public function actioncekSudahBayar()
	{
		$NOPOKOK = $_REQUEST['NOPOKOK'];
		$THNPAJAK = substr($_REQUEST['TAHUN'], -2);
		$BLNPAJAK = $_REQUEST['BULAN'];
		$jns = 'K';

		$sql = "SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLSETOR WHERE TBLPENDATAAN_THNPAJAK =".$THNPAJAK." AND TBLPENDATAAN_BLNPAJAK=".$BLNPAJAK." AND TBLDAFTAR_NOPOK=".$NOPOKOK." AND TBLSETOR_JNSBAYAR = 'STPD'";
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
		$model = Yii::app()->db->createCommand('SELECT TBLDAFTHIBURAN_NOSURATTAGIHAN FROM TBLDAFTHIBURAN WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$nopok.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = '.$tanggal)->queryScalar();
		return $model;
	}

	public function cekBayar($THNPAJAK, $BLNPAJAK, $tanggal, $NOPOKOK)
	{
		$model = Yii::app()->db->createCommand("SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLSETORANBPD WHERE TBLPENDATAAN_THNPAJAK =".$THNPAJAK." AND TBLPENDATAAN_BLNPAJAK=".$BLNPAJAK." AND TBLDAFTAR_NOPOK=".$NOPOKOK." AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$tanggal." AND TBLSETORANBPD_JNSBAYAR = 'STPD'")->queryScalar();
		return $model;
	}

	public function CekNoRegisterKB($tahun, $bulan, $tanggal, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT NVL(TBLDAFTHIBURAN_NOSURATTAGIHAN,0) AS NOKB FROM TBLDAFTHIBURAN WHERE TBLPENDATAAN_THNPAJAK = '.$tahun.' AND TBLPENDATAAN_BLNPAJAK = '.$bulan.' AND TBLDAFTAR_NOPOK = '.$nopok.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = '.$tanggal)->queryScalar();
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

		$TBLDAFTHIBURAN_TGLSURATTAGIHAN = !empty($_REQUEST['TBLDAFTHIBURAN_TGLSURATTAGIHAN']) ? $_REQUEST['TBLDAFTHIBURAN_TGLSURATTAGIHAN'] : '';

		$TBLDAFTHIBURAN_TGLBTSTAGIHAN = !empty($_REQUEST['TBLDAFTHIBURAN_TGLBTSTAGIHAN']) ? $_REQUEST['TBLDAFTHIBURAN_TGLBTSTAGIHAN'] : '';

		if ($TBLDAFTHIBURAN_TGLSURATTAGIHAN !='') {
			$exp_TGLSURATTAGIHAN = explode('-', $TBLDAFTHIBURAN_TGLSURATTAGIHAN);
			$pecahtgltagihan = $exp_TGLSURATTAGIHAN[0];
			$pecahbulantagihan = $exp_TGLSURATTAGIHAN[1];
			$pecahthntagihan = substr($exp_TGLSURATTAGIHAN[2], -2);	
		} else {
			$pecahtgltagihan = '';
			$pecahbulantagihan = '';
			$pecahthntagihan = '';
		}

		if ($TBLDAFTHIBURAN_TGLBTSTAGIHAN !='') {
			$exp_TGLBTSTAGIHAN = explode('-', $TBLDAFTHIBURAN_TGLBTSTAGIHAN);
			$pecahtglbtstagihan = $exp_TGLBTSTAGIHAN[0];
			$pecahbulanbtstagihan = $exp_TGLBTSTAGIHAN[1];
			$pecahthnbtstagihan = substr($exp_TGLBTSTAGIHAN[2], -2);
		} else {
			$pecahtglbtstagihan = '';
			$pecahbulanbtstagihan = '';
			$pecahthnbtstagihan = '';
		}


		$command = Yii::app()->db->createCommand();
		$column = array(

			'TBLDAFTHIBURAN_NOSURATTAGIHAN' => LokalIndonesia::toAngka($PARAM['TBLDAFTHIBURAN_NOSURATTAGIHAN']),
			'TBLDAFTHIBURAN_BUNGATAGIHAN' => LokalIndonesia::toAngka($PARAM['TBLDAFTHIBURAN_BUNGATAGIHAN']),
			'TBLDAFTHIBURAN_RUPIAHTAGIHAN' => LokalIndonesia::toAngka($PARAM['TBLDAFTHIBURAN_RUPIAHTAGIHAN']),
			
			'TBLDAFTHIBURAN_TGLSURATTAGIHAN' => $pecahtgltagihan,
			'TBLDAFTHIBURAN_BLNSURATTAGIHAN' => $pecahbulantagihan,
			'TBLDAFTHIBURAN_THNSURATTAGIHAN' => $pecahthntagihan,

			'TBLDAFTHIBURAN_TGLBTSTAGIHAN' => $pecahtglbtstagihan,
			'TBLDAFTHIBURAN_BLNBTSTAGIHAN' => $pecahbulanbtstagihan,
			'TBLDAFTHIBURAN_THNBTSTAGIHAN' => $pecahthnbtstagihan,

		);

		$simpan = $command->update('TBLDAFTHIBURAN', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPJK AND TBLPENDATAAN_BLNPAJAK =:TBLPENDATAAN_BLNPAJAK AND NVL(TBLPENDATAAN_TGLPAJAK, 0) =:TBLPENDATAAN_TGLPAJAK',array(':NOPOK' => $NOPOK,':THNPJK' => $THNPJK,':TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK,':TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK));


			if ($simpan>=0) {
				echo CJSON::encode(array('status'=>'success'));
			}
			else{
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

			'TBLDAFTHIBURAN_NOSURATTAGIHAN' => '',
			'TBLDAFTHIBURAN_BUNGATAGIHAN' => '',
			'TBLDAFTHIBURAN_RUPIAHTAGIHAN' => '',

			'TBLDAFTHIBURAN_TGLSURATTAGIHAN' => '',
			'TBLDAFTHIBURAN_BLNSURATTAGIHAN' => '',
			'TBLDAFTHIBURAN_THNSURATTAGIHAN' => '',

			'TBLDAFTHIBURAN_TGLBTSTAGIHAN' => '',
			'TBLDAFTHIBURAN_BLNBTSTAGIHAN' => '',
			'TBLDAFTHIBURAN_THNBTSTAGIHAN' => '',

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
			MAX(TO_NUMBER (TO_CHAR(NVL(TBLDAFTHIBURAN_NOSURATTAGIHAN, 0))))+1 AS nokb
		FROM
			TBLDAFTHIBURAN
		WHERE
			TBLPENDATAAN_THNPAJAK = ".$splthn."
		AND NVL (TBLDAFTHIBURAN_NOSURATTAGIHAN, 0) <> 0
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

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_penagihan' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'STPD.docx';

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
        NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_BUNGATAGIHAN, 0) AS TBLDAFTHIBURAN_BUNGATAGIHAN, 
        NVL(TBLDAFTHIBURAN.TBLDAFTHIBURAN_DENDAKRGBAYAR, 0) AS TBLDAFTHIBURAN_DENDAKRGBAYAR, 
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
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);

        $sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 8";

		$data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();

		$dt = array();

		$GLOBALS['jabatan1'] = $data['jab1']['TBLPEJABAT_URAIAN'];
		$GLOBALS['petugas1'] = $data['jab1']['TBLPEJABAT_NAMA'];
		$GLOBALS['nip1'] = $data['jab1']['TBLPEJABAT_NIP'];

		$dt['nopok'] = $data['cetak']['TBLDAFTAR_NOPOK'];
		$dt['thnkb'] = '20'.$data['cetak']['TBLDAFTHIBURAN_THNKURANGBAYAR'];
		$dt['regkb'] = $data['cetak']['TBLDAFTHIBURAN_REGKURANGBAYAR'];

		$dt['namabadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHANAMA'];
		$dt['alamatbadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHAALAMAT'];

		$dt['kodefull'] = $data['cetak']['TBLREKENING_KODEFULL'];

		$dt['namarek'] = $data['cetak']['NMREK'];

		$dt['namarek'] = $data['cetak']['NMREK'];

		$dt['ketetapan'] = $data['cetak']['TBLDAFTHIBURAN_TGLSURATTAGIHAN'] .'/'. $data['cetak']['TBLDAFTHIBURAN_BLNSURATTAGIHAN'] .'/20'.$data['cetak']['TBLDAFTHIBURAN_THNSURATTAGIHAN'];

		$dt['jatuhtempo'] = $data['cetak']['TBLDAFTHIBURAN_TGLBTSTAGIHAN'] .'/'. $data['cetak']['TBLDAFTHIBURAN_BLNBTSTAGIHAN'] .'/20'.$data['cetak']['TBLDAFTHIBURAN_THNBTSTAGIHAN'];

		$dt['tglsetor'] = $data['cetak']['TBLDAFTHIBURAN_TANGGALSETOR'] .'/'. $data['cetak']['TBLDAFTHIBURAN_BULANSETOR'] .'/20'.$data['cetak']['TBLDAFTHIBURAN_TAHUNSETOR'];

		$dt['bunga'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHIBURAN_BUNGATAGIHAN']);
		$dt['denda'] = '';
		$dt['setoran'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHIBURAN_RUPIAHSETOR']);
		$dt['pajak'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHIBURAN_PAJAK']);
		$dt['total'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHIBURAN_BUNGATAGIHAN']);
		$dt['terbilang'] = LokalIndonesia::terbilangangka($data['cetak']['TBLDAFTHIBURAN_BUNGATAGIHAN']);

		$dt['thnpajak'] = '20'.$data['cetak']['TBLPENDATAAN_THNPAJAK'];

		$dt['blnpajak'] = LokalIndonesia::getbulan($data['cetak']['TBLPENDATAAN_BLNPAJAK']);

		$dt['npwpd'] = $data['cetak']['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $data['cetak']['TBLDAFTAR_GOLONGAN'] .'.'. $data['cetak']['TBLDAFTAR_NOPOK'] .'.'. sprintf("%02d",$data['cetak']['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$data['cetak']['TBLKELURAHAN_IDBADANUSAHA']);

		// $dt['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
		$dt['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');
		
		//SAMPAI SINI QUERYNYA

		// var_dump($data);
		// echo json_encode($data['cetak']);Yii::app()->end();
		// echo json_encode($row);

		// Merge data in the first sheet 
		$npwpd = $data['cetak']['TBLDAFTAR_NOPOK'];
		$namafileDL = "STPD-HIBURAN-".$npwpd.".docx";
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