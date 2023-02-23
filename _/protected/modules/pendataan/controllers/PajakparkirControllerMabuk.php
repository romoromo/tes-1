<?php

class PajakparkirController extends Controller
{
	var $KODE_GOL = 2;
	var $PAJAK_AYAT = 0;
	var $PAJAK_REK = '4.1.1.7.0';

	public function actionIndex()
	{

		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		
		// $select = '*';
		// $from = 'TREKENING';
		// $filter = array(
		// 	 'LK__TREKENING_KODE' => '41107'
		// 	,'EQ__TREKENING_LEVEL' => '1'
		// );

		// $otherquery = array();

		// $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		// $data['rek'] = DBFetch::query($arrayConfig);

		$data['rek'] = Yii::app()->db->createCommand("
		SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.7.%'
		ORDER BY TBLREKENING_KODE")->queryAll();


		$this->renderPartial('index',array('data'=>$data));
	}

	public function actionautocompletewpparkir()
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
		REFBADANUSAHA.REKENING_KODE,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'LK__TBLDAFTAR_BADANUSAHANAMA' => $query
			,'LK__TBLDAFTAR_BADANUSAHAALAMAT' => $query
			,'LK__TBLDAFTAR_NOPOK' => $query
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			//,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,'EQ__TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA' => "PKR"
		);

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'order'=> 'TBLDAFTAR_NOPOK ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
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
			,"TBLKECAMATAN_IDBADANUSAHA" => $result['TBLKECAMATAN_IDBADANUSAHA']
			,"TBLKELURAHAN_IDBADANUSAHA" => $result['TBLKELURAHAN_IDBADANUSAHA']
			);
		}
		 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function actionGetKodeRek()
	{
		$kodesubrek = $_REQUEST['kodesubrek'];
		$data = Yii::app()->db->createCommand()->select('*')->from('TBLREKENING')->where('TBLREKENING_KODE=:kode', array(':kode'=>$kodesubrek))->queryRow();

		echo CJSON::encode($data);
	}

	public function actionGetWPParkir()
	{
		$NOPOKOK = $_REQUEST['nopokok'];
		$THNPAJAK = substr($_REQUEST['THNPAJAK'], -2);
		$BLNPAJAK = (int) $_REQUEST['BLNPAJAK'];

		$data = Yii::app()->db->createCommand('SELECT * FROM TBLDAFTPARKIR WHERE TBLPENDATAAN_THNPAJAK ='.$THNPAJAK.' AND TBLPENDATAAN_BLNPAJAK='.$BLNPAJAK.' AND TBLDAFTAR_NOPOK='.$NOPOKOK)->queryRow();
		echo CJSON::encode($data);
	}

	public function actionSimpanParkir()
	{
		Yii::import('ext.LokalIndonesia');

		$TREKENINGSUB_KODE = isset($_REQUEST['TREKENINGSUB_KODE']) && !empty($_REQUEST['TREKENINGSUB_KODE']) ? $_REQUEST['TREKENINGSUB_KODE'] : 0;
		$TBLDAFTAR_NOPOK = isset($_REQUEST['TBLDAFTAR_NOPOK']) && !empty($_REQUEST['TBLDAFTAR_NOPOK']) ? $_REQUEST['TBLDAFTAR_NOPOK'] : 0;
		$TBLPENDATAAN_THNPAJAK = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? $_REQUEST['TBLPENDATAAN_THNPAJAK'] : 0;
		$TBLPENDATAAN_BLNPAJAK = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : 0;
		
		if($_REQUEST['isi_masapajak_tanggal']!='00'){
		$TBLPENDATAAN_TGLPAJAK = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? $_REQUEST['TBLPENDATAAN_TGLPAJAK'] : 0;
		} else {
		$TBLPENDATAAN_TGLPAJAK = $_REQUEST['isi_masapajak_tanggal'];
		}
		$TBLDAFTPARKIR_TGLSPTPD = isset($_REQUEST['TBLDAFTPARKIR_TGLSPTPD']) && !empty($_REQUEST['TBLDAFTPARKIR_TGLSPTPD']) ? $_REQUEST['TBLDAFTPARKIR_TGLSPTPD'] : 0;
		//$TBLDAFTPARKIR_PENJUALANHARI = isset($_REQUEST['TBLDAFTPARKIR_PENJUALANHARI'])!=0 ? $_REQUEST['TBLDAFTPARKIR_PENJUALANHARI'] : 0;
		$TBLDAFTPARKIR_JUMLAHHARIJUAL = isset($_REQUEST['TBLDAFTPARKIR_JUMLAHHARIJUAL']) && !empty($_REQUEST['TBLDAFTPARKIR_JUMLAHHARIJUAL']) ? $_REQUEST['TBLDAFTPARKIR_JUMLAHHARIJUAL'] : 0;
		$TBLDAFTPARKIR_OMSETPAJAK = isset($_REQUEST['TBLDAFTPARKIR_OMSETPAJAK']) && !empty($_REQUEST['TBLDAFTPARKIR_OMSETPAJAK']) ? $_REQUEST['TBLDAFTPARKIR_OMSETPAJAK'] : 0;
		$TBLDAFTPARKIR_TGLMULAIJUAL = isset($_REQUEST['TBLDAFTPARKIR_TGLMULAIJUAL']) && !empty($_REQUEST['TBLDAFTPARKIR_TGLMULAIJUAL']) ? $_REQUEST['TBLDAFTPARKIR_TGLMULAIJUAL'] : 0;
		$TBLDAFTPARKIR_TGLAKHIRJUAL = isset($_REQUEST['TBLDAFTPARKIR_TGLAKHIRJUAL']) && !empty($_REQUEST['TBLDAFTPARKIR_TGLAKHIRJUAL']) ? $_REQUEST['TBLDAFTPARKIR_TGLAKHIRJUAL'] : 0;
		$TBLDAFTPARKIR_ISPEMBUKUAN = isset($_REQUEST['TBLDAFTPARKIR_ISPEMBUKUAN']) && !empty($_REQUEST['TBLDAFTPARKIR_ISPEMBUKUAN']) ? $_REQUEST['TBLDAFTPARKIR_ISPEMBUKUAN'] : 0;
		$TBLDAFTPARKIR_ISKAS = isset($_REQUEST['TBLDAFTPARKIR_ISKAS']) && !empty($_REQUEST['TBLDAFTPARKIR_ISKAS']) ? $_REQUEST['TBLDAFTPARKIR_ISKAS'] : 0;
		$TBLDAFTPARKIR_ISNOTA = isset($_REQUEST['TBLDAFTPARKIR_ISNOTA']) && !empty($_REQUEST['TBLDAFTPARKIR_ISNOTA']) ? $_REQUEST['TBLDAFTPARKIR_ISNOTA'] : 0;
		$TBLDAFTPARKIR_PAJAK = isset($_REQUEST['TBLDAFTPARKIR_PAJAK']) && !empty($_REQUEST['TBLDAFTPARKIR_PAJAK']) ? $_REQUEST['TBLDAFTPARKIR_PAJAK'] : 0;
		$TBLDAFTPARKIR_BUNGASPTPD = isset($_REQUEST['TBLDAFTPARKIR_BUNGASPTPD']) && !empty($_REQUEST['TBLDAFTPARKIR_BUNGASPTPD']) ? $_REQUEST['TBLDAFTPARKIR_BUNGASPTPD'] : 0;
		$TBLDAFTPARKIR_RUPIAHSETOR = isset($_REQUEST['TBLDAFTPARKIR_RUPIAHSETOR']) && !empty($_REQUEST['TBLDAFTPARKIR_RUPIAHSETOR']) ? $_REQUEST['TBLDAFTPARKIR_RUPIAHSETOR'] : 0;
		$TBLDAFTPARKIR_TGLTERIMA = isset($_REQUEST['TBLDAFTPARKIR_TGLTERIMA']) && !empty($_REQUEST['TBLDAFTPARKIR_TGLTERIMA']) ? $_REQUEST['TBLDAFTPARKIR_TGLTERIMA'] : 0;
		$TBLDAFTPARKIR_TGLBATASSPTPD = isset($_REQUEST['TBLDAFTPARKIR_TGLBATASSPTPD']) && !empty($_REQUEST['TBLDAFTPARKIR_TGLBATASSPTPD']) ? $_REQUEST['TBLDAFTPARKIR_TGLBATASSPTPD'] : 0;
		$TBLDAFTPARKIR_TGLENTRI = isset($_REQUEST['TBLDAFTPARKIR_TGLENTRI']) && !empty($_REQUEST['TBLDAFTPARKIR_TGLENTRI']) ? $_REQUEST['TBLDAFTPARKIR_TGLENTRI'] : 0;
		$TBLKECAMATAN_ID = isset($_REQUEST['idkecamatan']) && !empty($_REQUEST['idkecamatan']) ? $_REQUEST['idkecamatan'] : 0;
		$TBLKELURAHAN_ID = isset($_REQUEST['idkelurahan']) && !empty($_REQUEST['idkelurahan']) ? $_REQUEST['idkelurahan'] : 0;
		$TBLDAFTPARKIR_GOLONGAN = 4;
		$exp_TGLSPTPD = explode('-', $TBLDAFTPARKIR_TGLSPTPD);
		$exp_TGLMULAIJUAL = explode('-', $TBLDAFTPARKIR_TGLMULAIJUAL);
		$exp_TGLAKHIRJUAL = explode('-', $TBLDAFTPARKIR_TGLAKHIRJUAL);
		$exp_TGLTERIMA = explode('-', $TBLDAFTPARKIR_TGLTERIMA);
		$exp_TGLBATASSPTPD = explode('-', $TBLDAFTPARKIR_TGLBATASSPTPD);
		$exp_TGLENTRI = explode('-', $TBLDAFTPARKIR_TGLENTRI);

		
		$insert = Yii::app()->db->createCommand();
		$simpan = $insert->insert('TBLDAFTPARKIR', $dataInsert = array(
			'TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK,
			'TBLKECAMATAN_ID' => $TBLKECAMATAN_ID,
			'TBLKELURAHAN_ID' => $TBLKELURAHAN_ID,
			'TBLPENDATAAN_THNPAJAK' => substr($TBLPENDATAAN_THNPAJAK, -2),
			'TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK,
			'TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK,
			'TBLDAFTPARKIR_TGLSPTPD' => $exp_TGLSPTPD[0],
			'TBLDAFTPARKIR_BLNSPTPD' => $exp_TGLSPTPD[1],
			'TBLDAFTPARKIR_THNSPTPD' => substr($exp_TGLSPTPD[2], -2),
			'TBLDAFTAR_GOLONGAN' => $TBLDAFTPARKIR_GOLONGAN,
			//'TBLDAFTPARKIR_PENJUALANHARI' => LokalIndonesia::toAngka($TBLDAFTPARKIR_PENJUALANHARI),
			'TBLDAFTPARKIR_JUMLAHHARIJUAL' => LokalIndonesia::toAngka($TBLDAFTPARKIR_JUMLAHHARIJUAL),
			'TBLDAFTPARKIR_OMSETPAJAK' => LokalIndonesia::toAngka($TBLDAFTPARKIR_OMSETPAJAK),
			'TBLDAFTPARKIR_TGLMULAIJUAL' => $exp_TGLMULAIJUAL[0],
			'TBLDAFTPARKIR_BLNMULAIJUAL' => $exp_TGLMULAIJUAL[1],
			'TBLDAFTPARKIR_THNMULAIJUAL' => substr($exp_TGLMULAIJUAL[2], -2),
			'TBLDAFTPARKIR_TGLAKHIRJUAL' => $exp_TGLAKHIRJUAL[0],
			'TBLDAFTPARKIR_BLNAKHIRJUAL' => $exp_TGLAKHIRJUAL[1],
			'TBLDAFTPARKIR_THNAKHIRJUAL' => substr($exp_TGLAKHIRJUAL[0], -2),
			'TBLDAFTPARKIR_ISPEMBUKUAN' => $TBLDAFTPARKIR_ISPEMBUKUAN,
			'TBLDAFTPARKIR_ISKAS' => $TBLDAFTPARKIR_ISKAS,
			'TBLDAFTPARKIR_ISNOTA' => $TBLDAFTPARKIR_ISNOTA,
			'TBLDAFTPARKIR_PAJAK' => LokalIndonesia::toAngka($TBLDAFTPARKIR_PAJAK),
			'TBLDAFTPARKIR_BUNGASPTPD' => LokalIndonesia::toAngka($TBLDAFTPARKIR_BUNGASPTPD),
			'TBLDAFTPARKIR_RUPIAHSETOR' => LokalIndonesia::toAngka($TBLDAFTPARKIR_RUPIAHSETOR),
			'TBLDAFTPARKIR_TGLTERIMA' => $exp_TGLTERIMA[0],
			'TBLDAFTPARKIR_BLNTERIMA' => $exp_TGLTERIMA[1],
			'TBLDAFTPARKIR_THNTERIMA' => substr($exp_TGLTERIMA[2], -2),
			'TBLDAFTPARKIR_TGLBATASSPTPD' => $exp_TGLBATASSPTPD[0],
			'TBLDAFTPARKIR_BLNBATASSPTPD' => $exp_TGLBATASSPTPD[1],
			'TBLDAFTPARKIR_THNBATASSPTPD' => substr($exp_TGLBATASSPTPD[2], -2),
			'TBLDAFTPARKIR_TGLENTRI' => $exp_TGLENTRI[0],
			'TBLDAFTPARKIR_BLNENTRI' => $exp_TGLENTRI[1],
			'TBLDAFTPARKIR_THNENTRI' => substr($exp_TGLENTRI[2], -2),
			'TBLDAFTPARKIR_REKURUSAN' => '1',
			'TBLDAFTPARKIR_REKPEMERINTAHAN' => '20',
			'TBLDAFTPARKIR_REKORGANISASI' => '1',
			'TBLDAFTPARKIR_REKPROGRAM' => '20',
			'TBLDAFTPARKIR_REKKEGIATAN' => '26',
			'TBLDAFTPARKIR_REKDINAS' => '0',
			'TBLDAFTPARKIR_REKBIDANG' => '0',
			'TBLDAFTPARKIR_REKPENDAPATAN' => '4',
			'TBLDAFTPARKIR_REKPAD' => '1',
			'TBLDAFTPARKIR_REKPAJAK' => '1',
			'TBLDAFTPARKIR_REKAYAT' => '7',
			'TBLDAFTPARKIR_REKJENIS' => substr($TREKENINGSUB_KODE, -1) ,
			'TBLDAFTAR_JNSPENDAPATAN' => 'P',
		));

		if ($simpan>0) {
			echo CJSON::encode(array('status'=>'success', 'debug'=>$dataInsert));
		}
		else{
			echo CJSON::encode(array('status'=>'failed'));
		}
	}

	public function actionCekPernahDaftar()
	{
		$NOPOKOK = $_REQUEST['nopokok'];
		$THNPAJAK = substr($_REQUEST['THNPAJAK'], -2);
		$BLNPAJAK = $_REQUEST['BLNPAJAK'];

		$cek = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTPARKIR WHERE TBLPENDATAAN_THNPAJAK ='.$THNPAJAK.' AND TBLPENDATAAN_BLNPAJAK='.$BLNPAJAK.' AND TBLDAFTAR_NOPOK='.$NOPOKOK)->queryScalar();
		if ($cek!='0') {
			echo CJSON::encode(array('status'=>'sudah'));
		}
		else{
			echo CJSON::encode(array('status'=>'belum'));
		}
	}

	public function actionGetTGLBatas()
	{
		$data['THNPAJAK'] = substr($_REQUEST['THNPAJAK'],-2);
		$data['BLNPAJAK'] = $_REQUEST['BLNPAJAK'];
		$data['KODEREK'] = $_REQUEST['KODEREK'];
		$data['BULANBATAS'] = $_REQUEST['BLNPAJAK']+1;

		$tglbatas = RefTGLBatas::model()->get($data['KODEREK'],$data['THNPAJAK'],$data['BULANBATAS']);

		/*Tanggal Batas Pajak*/
		$data['TANGGAL'] = $tglbatas;
		$data['BULAN'] = $data['BLNPAJAK'];
		
		if (strlen($data['BULANBATAS'])>1) {
			$data['BULANBATAS'] = $data['BULANBATAS'];
		}
		else{
			$data['BULANBATAS'] = '0'.$data['BULANBATAS'];
		}
		
		if ($data['BULAN']==12) {
			$data['TAHUN'] = '20'.$data['THNPAJAK']+1;
		}
		else{
			$data['TAHUN'] = '20'.$data['THNPAJAK'];
		}


		$data['TGLBATASPAJAK'] = $data['TANGGAL'].'-'.$data['BULANBATAS'].'-'.$data['TAHUN'];
		/*Tanggal Batas Pajak*/

		/*Tanggal Batas Bulan Ini*/
		$blnnow = date('m');
		$thnnow = date('Y');

		$data['TGLBATASBLNNOW'] = '10-'.$blnnow.'-'.$thnnow;

		$data['BLNBUNGA'] = $blnnow-$data['BLNPAJAK'];
		
		if (date('d') > date('d',strtotime($data['TGLBATASBLNNOW']))) {
			$data['BLNBUNGAHIT'] = $data['BLNBUNGA']+1;
		}
		else{
			$data['BLNBUNGAHIT'] = $data['BLNBUNGA'];
		}


		/*Tanggal Batas Bulan Ini*/

		echo CJSON::encode($data);

	}
}