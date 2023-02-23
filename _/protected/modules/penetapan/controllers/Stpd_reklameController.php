<?php

class Stpd_reklameController extends Controller
{
	var $KODE_GOL = 2;
	var $PAJAK_AYAT = 4;
	var $PAJAK_REK = '4.1.1.4.0';

	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['sub_rek'] = TRekening::model()->getRekeningSubAktif('4110400');

		$data['rek'] = Yii::app()->db->createCommand("
		SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.4.%'
		ORDER BY TBLREKENING_KODE
		")
		->queryAll();
		$data['tahun'] = Yii::app()->db->createCommand("
		SELECT * 
		FROM TBLTAHUN
		")
		->queryAll();

		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionautocompletewpreklame()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');
		
		$query = trim($_REQUEST['query']);

		$select = 'TBLDAFTREKLAME.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT';
		$from = 'TBLDAFTREKLAME';
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
			,'join'=> array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK')
			,'order'=> 'TBLDAFTREKLAME.TBLDAFTAR_NOPOK ASC'
			,'group'=> 'TBLDAFTREKLAME.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT'
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
		$tahun = trim($_POST['tahun']);
		$bulan = isset($_POST['bulan']) ? trim($_POST['bulan']) : 0;
		$tanggal = isset($_POST['tanggal']) ? trim($_POST['tanggal']) : 0;
		$ke = trim($_POST['ke']);
		$jenis = $_POST['jenis'];
		$tahun_substr = substr($tahun, -2);
		$proses = $this->cekProses($jenis, $tahun_substr, $bulan, $tanggal, $ke, $TBLDAFTAR_NOPOK); // sudah pernah entri STPD sebelumnya
		$cek = $this->cekPernahDaftar($tahun_substr, $bulan, $tanggal, $ke, $TBLDAFTAR_NOPOK); // CEK ada SPT induk
		$bayar =$this->cekBayar($jenis, $tahun_substr, $bulan, $tanggal, $ke, $TBLDAFTAR_NOPOK);

		if ($bayar > 0) {
			$data['data'] = 'sudah dibayar';	
		} else if ($cek == 0){
			$data['data'] = 'SPT belum terdaftar'; // BELUM ada SPT induk
		}else if ($proses > 0){
			$data['data'] = 'sudah entri STPD'; // sudah pernah entri STPD sebelumnya
			
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
			TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSKPD,
			TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSKPD,
			TBLDAFTREKLAME.TBLDAFTREKLAME_THNSKPD,
			TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAKSKPD,
			TBLSTPD_NOSURATTAGIHAN,
			TBLSTPD_BUNGATAGIHAN,
			TBLSTPD_TGLSURATTAGIHAN,
			TBLSTPD_BLNSURATTAGIHAN,
			TBLSTPD_THNSURATTAGIHAN,
			TBLSTPD_TGLBTSTAGIHAN,
			TBLSTPD_BLNBTSTAGIHAN,
			TBLSTPD_THNBTSTAGIHAN,
			TBLSTPD_RUPIAHTAGIHAN,
			NVL(TBLSTPD_JMLBULAN,0) AS TBLSTPD_JMLBULAN,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_NOMORSKPD,0) AS TBLDAFTREKLAME_NOMORSKPD 

			";
			$from = 'TBLDAFTAR';
			$filter = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
			);

			$filter_AND = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
				,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
				,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK' => $tahun_substr
				,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE' => $ke
			);

			$otherquery = array(
				'limit'=> 30
				,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
				,'join_2'=> array('TBLDAFTREKLAME', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK')
				,'leftjoin_3'=> array('TBLSTPD', 'TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLSTPD.TBLDAFTAR_NOPOK AND TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK = TBLSTPD.TBLPENDATAAN_THNPAJAK AND TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK = TBLSTPD.TBLPENDATAAN_BLNPAJAK AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSTPD.TBLPENDATAAN_TGLPAJAK,0)')
				,'order'=> 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC'
			);

			$otherquery['andwhere'] = '
	        NVL(TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK, 0)='.$tanggal.'
	        AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK, 0)='.$bulan.'
	        ';

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

			$data['TBLDAFTREKLAME_NOSURATTAGIHAN'] = $model['TBLSTPD_NOSURATTAGIHAN']; 
			$data['TBLDAFTREKLAME_BUNGATAGIHAN'] = $model['TBLSTPD_BUNGATAGIHAN'];
			$data['TBLDAFTREKLAME_RUPIAHTAGIHAN'] = $model['TBLSTPD_RUPIAHTAGIHAN'];
			$data['TBLDAFTREKLAME_TGLSURATTAGIHAN'] = sprintf("%02d",$model['TBLSTPD_TGLSURATTAGIHAN']); 
			$data['TBLDAFTREKLAME_BLNSURATTAGIHAN'] = sprintf("%02d",$model['TBLSTPD_BLNSURATTAGIHAN']); 
			$data['TBLDAFTREKLAME_THNSURATTAGIHAN'] = $model['TBLSTPD_THNSURATTAGIHAN'];
			$data['TBLDAFTREKLAME_TGLSKPD'] = sprintf("%02d",$model['TBLDAFTREKLAME_TGLSKPD']); 
			$data['TBLDAFTREKLAME_BLNSKPD'] = sprintf("%02d",$model['TBLDAFTREKLAME_BLNSKPD']);
			$data['TBLDAFTREKLAME_THNSKPD'] = $model['TBLDAFTREKLAME_THNSKPD'];
			$data['TBLDAFTREKLAME_NOMORSKPD'] = $model['TBLDAFTREKLAME_NOMORSKPD'];
			$data['TBLDAFTREKLAME_PAJAKSKPD'] = $model['TBLDAFTREKLAME_PAJAKSKPD'];
			$data['TBLDAFTREKLAME_TGLBTSTAGIHAN'] = sprintf("%02d",$model['TBLSTPD_TGLBTSTAGIHAN']); 
			$data['TBLDAFTREKLAME_BLNBTSTAGIHAN'] = sprintf("%02d",$model['TBLSTPD_BLNBTSTAGIHAN']); 
			$data['TBLDAFTREKLAME_THNBTSTAGIHAN'] = $model['TBLSTPD_THNBTSTAGIHAN'];
			$data['TBLSTPD_JMLBULAN'] = $model['TBLSTPD_JMLBULAN']; 
			
			// }
		
		
		} else {

		$data['data'] = 'SPT sudah terdaftar'; // SUDAH ada SPT induk
		
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
		NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSKPD,0) AS TBLDAFTREKLAME_TGLSKPD,
		NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSKPD,0) AS TBLDAFTREKLAME_BLNSKPD,
		NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_THNSKPD,0) AS TBLDAFTREKLAME_THNSKPD,
		NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_NOMORSKPD,0) AS TBLDAFTREKLAME_NOMORSKPD,
		NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAKSKPD,0) AS TBLDAFTREKLAME_PAJAKSKPD
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK' => $tahun_substr
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE' => $ke
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'join_2'=> array('TBLDAFTREKLAME', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK')
			,'andwhere'=> 'NVL(TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK, 0) = 0'
			,'order'=> 'TBLDAFTAR_NOPOK ASC'
		);

		$otherquery['andwhere'] = '
	        NVL(TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK, 0)='.$tanggal.'
	        AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK, 0)='.$bulan.'
	        ';

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
		
			$data['TBLDAFTREKLAME_TGLSKPD'] = sprintf("%02d",$model['TBLDAFTREKLAME_TGLSKPD']); 
			$data['TBLDAFTREKLAME_BLNSKPD'] = sprintf("%02d",$model['TBLDAFTREKLAME_BLNSKPD']); 
			$data['TBLDAFTREKLAME_THNSKPD'] = $model['TBLDAFTREKLAME_THNSKPD'];
			$data['TBLDAFTREKLAME_NOMORSKPD'] = $model['TBLDAFTREKLAME_NOMORSKPD'];
			$data['TBLDAFTREKLAME_PAJAKSKPD'] =$model['TBLDAFTREKLAME_PAJAKSKPD'];
		
		

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

	public function cekProses($jenis, $tahun, $bulan, $tanggal, $ke, $TBLDAFTAR_NOPOK)
	{ 
		$model = Yii::app()->db->createCommand("SELECT NVL(TBLSTPD_BUNGATAGIHAN,0) FROM TBLSTPD WHERE TBLPENDATAAN_THNPAJAK =".$tahun." AND NVL(TBLPENDATAAN_BLNPAJAK,0)=".$bulan." AND NVL(TBLPENDATAAN_PAJAKKE,0)=".$ke." AND TBLDAFTAR_NOPOK=".$TBLDAFTAR_NOPOK." AND NVL(TBLPENDATAAN_TGLPAJAK,0) = ".$tanggal." AND TRIM(TBLSTPD_JENIS) LIKE 'STPD'")->queryScalar();

		
		return $model;
	}

	public function cekBayar($jenis, $THNPAJAK, $BLNPAJAK, $TANGGAL, $KE, $NOPOKOK)
	{
		$model = Yii::app()->db->createCommand("SELECT NVL(TBLSTPD_NOMORSSPD,0) AS JML FROM TBLSTPD WHERE TBLPENDATAAN_THNPAJAK =".$THNPAJAK." AND NVL(TBLPENDATAAN_BLNPAJAK,0)=".$BLNPAJAK." AND NVL(TBLPENDATAAN_PAJAKKE,0)=".$KE." AND TBLDAFTAR_NOPOK=".$NOPOKOK." AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$TANGGAL." AND TBLSTPD_JENIS LIKE '".$jenis."'")->queryScalar();
		return $model;
	}

	public function cekPernahDaftar($thn, $bulan, $tgl, $ke, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTREKLAME WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND NVL(TBLPENDATAAN_BLNPAJAK,0)='.$bulan.' AND TBLDAFTAR_NOPOK='.$nopok.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = '.$tgl.' AND NVL(TBLPENDATAAN_PAJAKKE, 0) ='.$ke.' ')->queryScalar();
		return $model;
	}

	public function CekNoRegisterKB($tahun, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT NVL(TBLDAFTREKLAME_NOSURATTAGIHAN,0) AS NOKB FROM TBLDAFTREKLAME WHERE TBLPENDATAAN_THNPAJAK = '.$tahun.' AND TBLPENDATAAN_BLNPAJAK = '.$bulan.' AND TBLDAFTAR_NOPOK = '.$nopok.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = 0')->queryScalar();
		return $model;
	}

	public function GetLastNoKB($tahun, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT MAX(NVL(TBLKRGBAYAR_REGKURANGBAYAR,0)) AS LAST_KB FROM TBLKRGBAYAR WHERE TBLPENDATAAN_THNPAJAK = '.$tahun.' AND TBLPENDATAAN_BLNPAJAK = '.$bulan.' AND TBLDAFTAR_NOPOK = '.$nopok.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = 0')->queryScalar();
		return $model;
	}

	public function actionSimpanSTPDreklame()
	{
		Yii::import('ext.LokalIndonesia');

		$PARAM = $_REQUEST;
		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];

		$THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2,4);

		$TBLPENDATAAN_BLNPAJAK = !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : 0;
		$TBLPENDATAAN_TGLPAJAK = !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? $_REQUEST['TBLPENDATAAN_TGLPAJAK'] : 0;
		$TBLPENDATAAN_PAJAKKE = !empty($_REQUEST['TBLPENDATAAN_PAJAKKE']) ? $_REQUEST['TBLPENDATAAN_PAJAKKE'] : 0;

		$TBLDAFTREKLAME_TGLSURATTAGIHAN = !empty($_REQUEST['TBLDAFTREKLAME_TGLSURATTAGIHAN']) ? $_REQUEST['TBLDAFTREKLAME_TGLSURATTAGIHAN'] : '';

		$TBLDAFTREKLAME_TGLBTSTAGIHAN = !empty($_REQUEST['TBLDAFTREKLAME_TGLBTSTAGIHAN']) ? $_REQUEST['TBLDAFTREKLAME_TGLBTSTAGIHAN'] : '';

		// if ($JENIS == 'SPTPD') {
			$JENIS_STP = 'STPD';
		// } elseif ($JENIS == 'SKPDKB') {
		// 	$JENIS_STP = 'STPD-KB';
		// }

		if ($TBLDAFTREKLAME_TGLSURATTAGIHAN !='') {
			$exp_TGLTERIMADAFTAR = explode('-', $TBLDAFTREKLAME_TGLSURATTAGIHAN);
			$pecahtgldaftar = $exp_TGLTERIMADAFTAR[0];
			$pecahbulandaftar = $exp_TGLTERIMADAFTAR[1];
			$pecahthndaftar = substr($exp_TGLTERIMADAFTAR[2], -2);	
		} else {
			$pecahtgldaftar = '';
			$pecahbulandaftar = '';
			$pecahthndaftar = '';
		}

		if ($TBLDAFTREKLAME_TGLBTSTAGIHAN !='') {	
			$exp_TGLENTRYDAFTAR = explode('-', $TBLDAFTREKLAME_TGLBTSTAGIHAN);
			$pecahtglentry = $exp_TGLENTRYDAFTAR[0];
			$pecahbulanentry = $exp_TGLENTRYDAFTAR[1];
			$pecahthnentry = substr($exp_TGLENTRYDAFTAR[2], -2);
		} else {
			$pecahtglentry = '';
			$pecahbulanentry = '';
			$pecahthnentry = '';
		}

		$NAMATABEL_INSERT = 'TBLSTPD';
		

		$arrayOfDataInsert = array(
			'TBLPENDATAAN_THNPAJAK' => $THNPJK
			,'TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
			,'TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK
			,'TBLPENDATAAN_PAJAKKE' => $TBLPENDATAAN_PAJAKKE
			,'TBLDAFTAR_NOPOK' => $NOPOK
			,'TBLSTPD_JENIS' => $JENIS_STP
			,'TBLSTPD_THNSURATTAGIHAN' => $pecahthndaftar
			,'TBLSTPD_BLNSURATTAGIHAN' => $pecahbulandaftar
			,'TBLSTPD_TGLSURATTAGIHAN' => $pecahtgldaftar
			,'TBLSTPD_NOSURATTAGIHAN' => LokalIndonesia::toAngka($PARAM['TBLDAFTREKLAME_NOSURATTAGIHAN'])
			,'TBLSTPD_THNBTSTAGIHAN' => $pecahthnentry
			,'TBLSTPD_BLNBTSTAGIHAN'=> $pecahbulanentry
			,'TBLSTPD_TGLBTSTAGIHAN' => $pecahtglentry
			,'TBLSTPD_BUNGATAGIHAN'=> LokalIndonesia::toAngka($PARAM['TBLDAFTREKLAME_BUNGATAGIHAN'])
			,'TBLSTPD_RUPIAHTAGIHAN'=> LokalIndonesia::toAngka($PARAM['TBLDAFTREKLAME_RUPIAHTAGIHAN'])
			,'TBLSTPD_REKPENDAPATAN' => '4'
			,'TBLSTPD_REKPAD' => '1'
			,'TBLSTPD_REKPAJAK' => '1'
			,'TBLSTPD_REKAYAT'=> '4'
			,'TBLSTPD_JMLBULAN' => $PARAM['res_jumlah_bulan_wp']
		);

		$simpan1 = Yii::app()->db->createCommand()
		->insert($NAMATABEL_INSERT, $arrayOfDataInsert);

		if ($simpan1>=0) {

			$command = Yii::app()->db->createCommand();
		$column = array(

			'TBLDAFTREKLAME_NOSURATTAGIHAN' => LokalIndonesia::toAngka($PARAM['TBLDAFTREKLAME_NOSURATTAGIHAN']),
			'TBLDAFTREKLAME_BUNGATAGIHAN' => LokalIndonesia::toAngka($PARAM['TBLDAFTREKLAME_BUNGATAGIHAN']),
			'TBLDAFTREKLAME_RUPIAHTAGIHAN' => LokalIndonesia::toAngka($PARAM['TBLDAFTREKLAME_RUPIAHTAGIHAN']),
			
			'TBLDAFTREKLAME_TGLSURATTAGIHAN' => $pecahtgldaftar,
			'TBLDAFTREKLAME_BLNSURATTAGIHAN' => $pecahbulandaftar,
			'TBLDAFTREKLAME_THNSURATTAGIHAN' => $pecahthndaftar,

			'TBLDAFTREKLAME_TGLBTSTAGIHAN' => $pecahtglentry,
			'TBLDAFTREKLAME_BLNBTSTAGIHAN' => $pecahbulanentry,
			'TBLDAFTREKLAME_THNBTSTAGIHAN' => $pecahthnentry,

		);

		$simpan2 = $command->update('TBLDAFTREKLAME', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPJK AND NVL(TBLPENDATAAN_BLNPAJAK,0) =:TBLPENDATAAN_BLNPAJAK AND NVL(TBLPENDATAAN_TGLPAJAK,0) = :TBLPENDATAAN_TGLPAJAK AND TBLPENDATAAN_PAJAKKE = :TBLPENDATAAN_PAJAKKE',array(':NOPOK' => $NOPOK,':THNPJK' => $THNPJK,':TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK,':TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK,':TBLPENDATAAN_PAJAKKE' => $TBLPENDATAAN_PAJAKKE));


		
			if ($simpan2>=0) {
				echo CJSON::encode(array('status'=>'success'));
			}
			else{
				echo CJSON::encode(array('status'=>'failed'));
			}

		} else {
			echo CJSON::encode(array('status'=>'failed2'));
		}

		

		
	}

	public function actionHapus()
	{
		Yii::import('ext.LokalIndonesia');

		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];

		$THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2,4);

		$TBLPENDATAAN_BLNPAJAK = !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';

		$command = Yii::app()->db->createCommand();
		$column = array(

			'TBLDAFTREKLAME_NOSURATTAGIHAN' => '',
			'TBLDAFTREKLAME_BUNGATAGIHAN' => '',
			'TBLDAFTREKLAME_RUPIAHTAGIHAN' => '',

			'TBLDAFTREKLAME_TGLSURATTAGIHAN' => '',
			'TBLDAFTREKLAME_BLNSURATTAGIHAN' => '',
			'TBLDAFTREKLAME_THNSURATTAGIHAN' => '',

			'TBLDAFTREKLAME_TGLBTSTAGIHAN' => '',
			'TBLDAFTREKLAME_BLNBTSTAGIHAN' => '',
			'TBLDAFTREKLAME_THNBTSTAGIHAN' => '',

		);

		$simpan = $command->update('TBLDAFTREKLAME', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPJK AND TBLPENDATAAN_BLNPAJAK =:TBLPENDATAAN_BLNPAJAK AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = 0',array(':NOPOK' => $NOPOK,':THNPJK' => $THNPJK,':TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK));

		if ($simpan>=0) {
			echo CJSON::encode(array('status'=>'success'));
		}
		else{
			echo CJSON::encode(array('status'=>'failed'));
		}
	}

	public function actionGetNoSTPD()
	{
		$tahun = $_REQUEST['tahun'];
		$splthn = substr($tahun, -2);

		$data = Yii::app()->db->createCommand("SELECT
			MAX(TO_NUMBER (TO_CHAR(NVL(TBLSTPD_NOSURATTAGIHAN, 0))))+1 AS nokb
		FROM
			TBLSTPD
		WHERE
			TBLPENDATAAN_THNPAJAK = ".$splthn."
		AND NVL (TBLSTPD_NOSURATTAGIHAN, 0) <> 0
		AND TBLSTPD_REKAYAT = ".$this->PAJAK_AYAT."
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
		$TBLPENDATAAN_PAJAKKE = $_REQUEST['TBLPENDATAAN_PAJAKKE'];

        $select = "
        TBLDAFTREKLAME.*,
        NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_BUNGATAGIHAN, 0) AS TBLDAFTREKLAME_BUNGATAGIHAN, 
        NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_KENAIKANKRGBAYAR, 0) AS TBLDAFTREKLAME_DENDAKRGBAYAR, 
        NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHSETOR, 0) AS TBLDAFTREKLAME_RUPIAHSETOR, 
        NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_BLNKBAWAL, 0) AS TBLDAFTREKLAME_BLNKBAWAL, 
        NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_BLNKBAKHIR, 0) AS TBLDAFTREKLAME_BLNKBAKHIR, 
        TBLDAFTAR.*, (
		SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
			TBLREKENING
		WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTREKLAME.TBLDAFTREKLAME_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTREKLAME.TBLDAFTREKLAME_REKJENIS
	) AS NMREK,
	(
		SELECT
		TBLREKENING.TBLREKENING_KODEFULL
		FROM
		TBLREKENING
		WHERE
		TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTREKLAME.TBLDAFTREKLAME_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTREKLAME.TBLDAFTREKLAME_REKJENIS
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
        $from = 'TBLDAFTREKLAME';

        $otherquery = array(
             'leftjoin_daftar'=>array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK')
        );

        $filter = array(
            'EQ__TBLDAFTREKLAME.TBLDAFTAR_NOPOK' => $NOPOK
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK' => $THNPJK
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
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
		$TBLPENDATAAN_TGLPAJAK = $_REQUEST['TBLPENDATAAN_TGLPAJAK'];
		$TBLPENDATAAN_PAJAKKE = $_REQUEST['TBLPENDATAAN_PAJAKKE'];

        $select = "
        TBLDAFTREKLAME.*,
        TBLDAFTAR.*, (
		SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
			TBLREKENING
		WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTREKLAME.TBLDAFTREKLAME_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTREKLAME.TBLDAFTREKLAME_REKJENIS
		) AS NMREK,
		(
			SELECT
			TBLREKENING.TBLREKENING_KODEFULL
			FROM
			TBLREKENING
			WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTREKLAME.TBLDAFTREKLAME_REKAYAT
			AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTREKLAME.TBLDAFTREKLAME_REKJENIS
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
        $from = 'TBLDAFTREKLAME';

        $otherquery = array(
             'leftjoin_daftar'=>array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK')
             
        );

        $otherquery['andwhere'] = '
	        NVL(TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK, 0)='.$TBLPENDATAAN_TGLPAJAK.'
	        AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK, 0)='.$TBLPENDATAAN_BLNPAJAK.'
	        ';

        $filter = array(
            'EQ__TBLDAFTREKLAME.TBLDAFTAR_NOPOK' => $NOPOK
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK' => $THNPJK
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE' => $TBLPENDATAAN_PAJAKKE
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

		$dt['thnkb'] = '20'.$data['cetak']['TBLDAFTREKLAME_THNSURATTAGIHAN'];
		$dt['regkb'] = $data['cetak']['TBLDAFTREKLAME_NOSURATTAGIHAN'];

		$dt['namabadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHANAMA'];
		$dt['alamatbadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHAALAMAT'];

		$dt['kodefull'] = $data['cetak']['TBLREKENING_KODEFULL'];

		$dt['namarek'] = $data['cetak']['NMREK'];

		$dt['namarek'] = $data['cetak']['NMREK'];

		$dt['ketetapan'] = $data['cetak']['TBLDAFTREKLAME_TGLSURATTAGIHAN'] .'/'. $data['cetak']['TBLDAFTREKLAME_BLNSURATTAGIHAN'] .'/20'.$data['cetak']['TBLDAFTREKLAME_THNSURATTAGIHAN'];

		$dt['jatuhtempo'] = $data['cetak']['TBLDAFTREKLAME_TGLBTSTAGIHAN'] .'/'. $data['cetak']['TBLDAFTREKLAME_BLNBTSTAGIHAN'] .'/20'.$data['cetak']['TBLDAFTREKLAME_THNBTSTAGIHAN'];

		$dt['tglsetor'] = $data['cetak']['TBLDAFTREKLAME_TANGGALSETOR'] .'/'. $data['cetak']['TBLDAFTREKLAME_BULANSETOR'] .'/20'.$data['cetak']['TBLDAFTREKLAME_TAHUNSETOR'];

		// $dt['pajakperiksa'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTREKLAME_PAJAKPERIKSA']);
		$dt['bunga'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTREKLAME_BUNGATAGIHAN']);
		// $dt['denda'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTREKLAME_DENDAKRGBAYAR']);
		$dt['denda'] = '';
		$dt['setoran'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTREKLAME_RUPIAHSETOR']);
		$dt['pajak'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTREKLAME_PAJAK']);
		$dt['total'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTREKLAME_BUNGATAGIHAN']);
		$dt['terbilang'] = LokalIndonesia::terbilangangka($data['cetak']['TBLDAFTREKLAME_BUNGATAGIHAN']);

		if ($data['cetak']['TBLPENDATAAN_TGLPAJAK']>'0') {
			$dt['thnpajak'] = sprintf("%02d",$data['cetak']['TBLPENDATAAN_TGLPAJAK']).'-'.sprintf("%02d",$data['cetak']['TBLPENDATAAN_BLNPAJAK']).'-'.'20'.$data['cetak']['TBLPENDATAAN_THNPAJAK'];
		} else {
			$dt['thnpajak'] = '20'.$data['cetak']['TBLPENDATAAN_THNPAJAK'];
		}

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
		$namafileDL = "STPD-REKLAME-".$npwpd.".docx";
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