<?php

class Keringanan_hiburanController extends Controller
{
	var $KODE_GOL = 4;
	var $PAJAK_AYAT = 0;
	var $PAJAK_REK = '4.1.1.3.0';

	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		
		// $select = '*';
		// $from = 'TREKENING';
		// $filter = array(
		// 	 'LK__TREKENING_KODE' => '41103'
		// 	,'EQ__TREKENING_LEVEL' => '1'
		// );

		// $otherquery = array();

		// $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		// $data['rek'] = DBFetch::query($arrayConfig);

		$data['rek'] = Yii::app()->db->createCommand("
		SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.3.%'
		ORDER BY TBLREKENING_KODE")->queryAll();

		$this->renderPartial('index',array('data'=>$data));
	}

	public function actionautocompletewphiburan()
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
			,'EQ__TBLDAFTAR_ISAKTIF' => 'Y'
			//,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			//,'EQ__TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA' => "HBT"
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

	public function actionGetWPHiburan()
	{
		$NOPOKOK = $_REQUEST['nopokok'];
		$THNPAJAK = substr($_REQUEST['THNPAJAK'], -2);
		$BLNPAJAK = (int) $_REQUEST['BLNPAJAK'];
		$TGLPAJAK = (int) $_REQUEST['TGLPAJAK'];

		$data = Yii::app()->db->createCommand('SELECT * FROM TBLDAFTHIBURAN WHERE TBLPENDATAAN_THNPAJAK ='.$THNPAJAK.' AND TBLPENDATAAN_BLNPAJAK='.$BLNPAJAK.' AND TBLDAFTAR_NOPOK='.$NOPOKOK.' AND TBLPENDATAAN_TGLPAJAK='.$TGLPAJAK)->queryRow();
		echo CJSON::encode($data);
	}

	public function actionSimpanHiburan()
	{
		Yii::import('ext.LokalIndonesia');

		$ada_data = isset($_REQUEST['ada_data']) && !empty($_REQUEST['ada_data']) ? $_REQUEST['ada_data'] : 0;
		$TBLREKENING_REKJENIS = isset($_REQUEST['TBLREKENING_REKJENIS']) && !empty($_REQUEST['TBLREKENING_REKJENIS']) ? $_REQUEST['TBLREKENING_REKJENIS'] : 0;
		$TBLDAFTAR_NOPOK = isset($_REQUEST['TBLDAFTAR_NOPOK']) && !empty($_REQUEST['TBLDAFTAR_NOPOK']) ? $_REQUEST['TBLDAFTAR_NOPOK'] : 0;
		$TBLPENDATAAN_THNPAJAK = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? $_REQUEST['TBLPENDATAAN_THNPAJAK'] : 0;
		$TBLPENDATAAN_BLNPAJAK = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : 0;
		$TBLPENDATAAN_TGLPAJAK = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? $_REQUEST['TBLPENDATAAN_TGLPAJAK'] : 0;
		$TBLDAFTHIBURAN_TGLSPTPD = isset($_REQUEST['TBLDAFTHIBURAN_TGLSPTPD']) && !empty($_REQUEST['TBLDAFTHIBURAN_TGLSPTPD']) ? $_REQUEST['TBLDAFTHIBURAN_TGLSPTPD'] : 0;
		//$TBLDAFTHIBURAN_PENJUALANHARI = isset($_REQUEST['TBLDAFTHIBURAN_PENJUALANHARI'])!=0 ? $_REQUEST['TBLDAFTHIBURAN_PENJUALANHARI'] : 0;
		$TBLDAFTHIBURAN_JUMLAHHARIJUAL = isset($_REQUEST['TBLDAFTHIBURAN_JUMLAHHARIJUAL']) && !empty($_REQUEST['TBLDAFTHIBURAN_JUMLAHHARIJUAL']) ? $_REQUEST['TBLDAFTHIBURAN_JUMLAHHARIJUAL'] : 0;
		$TBLDAFTHIBURAN_OMSETPAJAK = isset($_REQUEST['TBLDAFTHIBURAN_OMSETPAJAK']) && !empty($_REQUEST['TBLDAFTHIBURAN_OMSETPAJAK']) ? $_REQUEST['TBLDAFTHIBURAN_OMSETPAJAK'] : 0;
		$TBLDAFTHIBURAN_TGLMULAIJUAL = isset($_REQUEST['TBLDAFTHIBURAN_TGLMULAIJUAL']) && !empty($_REQUEST['TBLDAFTHIBURAN_TGLMULAIJUAL']) ? $_REQUEST['TBLDAFTHIBURAN_TGLMULAIJUAL'] : 0;
		$TBLDAFTHIBURAN_TGLAKHIRJUAL = isset($_REQUEST['TBLDAFTHIBURAN_TGLAKHIRJUAL']) && !empty($_REQUEST['TBLDAFTHIBURAN_TGLAKHIRJUAL']) ? $_REQUEST['TBLDAFTHIBURAN_TGLAKHIRJUAL'] : 0;
		$TBLDAFTHIBURAN_ISPEMBUKUAN = isset($_REQUEST['TBLDAFTHIBURAN_ISPEMBUKUAN']) && !empty($_REQUEST['TBLDAFTHIBURAN_ISPEMBUKUAN']) ? $_REQUEST['TBLDAFTHIBURAN_ISPEMBUKUAN'] : 0;
		$TBLDAFTHIBURAN_ISKAS = isset($_REQUEST['TBLDAFTHIBURAN_ISKAS']) && !empty($_REQUEST['TBLDAFTHIBURAN_ISKAS']) ? $_REQUEST['TBLDAFTHIBURAN_ISKAS'] : 0;
		$TBLDAFTHIBURAN_ISNOTA = isset($_REQUEST['TBLDAFTHIBURAN_ISNOTA']) && !empty($_REQUEST['TBLDAFTHIBURAN_ISNOTA']) ? $_REQUEST['TBLDAFTHIBURAN_ISNOTA'] : 0;
		$TBLDAFTHIBURAN_PAJAK = isset($_REQUEST['TBLDAFTHIBURAN_PAJAK']) && !empty($_REQUEST['TBLDAFTHIBURAN_PAJAK']) ? $_REQUEST['TBLDAFTHIBURAN_PAJAK'] : 0;
		$TBLDAFTHIBURAN_BUNGASPTPD = isset($_REQUEST['TBLDAFTHIBURAN_BUNGASPTPD']) && !empty($_REQUEST['TBLDAFTHIBURAN_BUNGASPTPD']) ? $_REQUEST['TBLDAFTHIBURAN_BUNGASPTPD'] : 0;
		$TBLDAFTHIBURAN_RUPIAHSETOR = isset($_REQUEST['TBLDAFTHIBURAN_RUPIAHSETOR']) && !empty($_REQUEST['TBLDAFTHIBURAN_RUPIAHSETOR']) ? $_REQUEST['TBLDAFTHIBURAN_RUPIAHSETOR'] : 0;
		$TBLDAFTHIBURAN_TGLTERIMA = isset($_REQUEST['TBLDAFTHIBURAN_TGLTERIMA']) && !empty($_REQUEST['TBLDAFTHIBURAN_TGLTERIMA']) ? $_REQUEST['TBLDAFTHIBURAN_TGLTERIMA'] : 0;
		$TBLDAFTHIBURAN_TGLBATASSPTPD = isset($_REQUEST['TBLDAFTHIBURAN_TGLBATASSPTPD']) && !empty($_REQUEST['TBLDAFTHIBURAN_TGLBATASSPTPD']) ? $_REQUEST['TBLDAFTHIBURAN_TGLBATASSPTPD'] : 0;
		$TBLDAFTHIBURAN_TGLENTRI = isset($_REQUEST['TBLDAFTHIBURAN_TGLENTRI']) && !empty($_REQUEST['TBLDAFTHIBURAN_TGLENTRI']) ? $_REQUEST['TBLDAFTHIBURAN_TGLENTRI'] : 0;
		$TBLKECAMATAN_ID = isset($_REQUEST['idkecamatan']) && !empty($_REQUEST['idkecamatan']) ? $_REQUEST['idkecamatan'] : 0;
		$TBLKELURAHAN_ID = isset($_REQUEST['idkelurahan']) && !empty($_REQUEST['idkelurahan']) ? $_REQUEST['idkelurahan'] : 0;
		//$TBLDAFTHIBURAN_JNSHIBURAN = isset($_REQUEST['TBLDAFTHIBURAN_JNSHIBURAN']) && !empty($_REQUEST['TBLDAFTHIBURAN_JNSHIBURAN']) ? $_REQUEST['TBLDAFTHIBURAN_JNSHIBURAN'] : 0;
		$TBLDAFTHIBURAN_GOLONGAN = 4;
		$exp_TGLSPTPD = explode('-', $TBLDAFTHIBURAN_TGLSPTPD);
		$exp_TGLMULAIJUAL = explode('-', $TBLDAFTHIBURAN_TGLMULAIJUAL);
		$exp_TGLAKHIRJUAL = explode('-', $TBLDAFTHIBURAN_TGLAKHIRJUAL);
		$exp_TGLTERIMA = explode('-', $TBLDAFTHIBURAN_TGLTERIMA);
		$exp_TGLBATASSPTPD = explode('-', $TBLDAFTHIBURAN_TGLBATASSPTPD);
		$exp_TGLENTRI = explode('-', $TBLDAFTHIBURAN_TGLENTRI);

		if($ada_data=='belum'){
			$insert = Yii::app()->db->createCommand();
			$simpan = $insert->insert('TBLDAFTHIBURAN', array(
				'TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK,
				'TBLKECAMATAN_ID' => $TBLKECAMATAN_ID,
				'TBLKELURAHAN_ID' => $TBLKELURAHAN_ID,
				'TBLPENDATAAN_THNPAJAK' => substr($TBLPENDATAAN_THNPAJAK, -2),
				'TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK,
				'TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK,
				'TBLDAFTHIBURAN_TGLSPTPD' => $exp_TGLSPTPD[0],
				'TBLDAFTHIBURAN_BLNSPTPD' => $exp_TGLSPTPD[1],
				'TBLDAFTHIBURAN_THNSPTPD' => substr($exp_TGLSPTPD[2], -2),
				'TBLDAFTAR_GOLONGAN' => $TBLDAFTHIBURAN_GOLONGAN,
				//'TBLDAFTHIBURAN_PENJUALANHARI' => LokalIndonesia::toAngka($TBLDAFTHIBURAN_PENJUALANHARI),
				'TBLDAFTHIBURAN_JUMLAHHARIJUAL' => LokalIndonesia::toAngka($TBLDAFTHIBURAN_JUMLAHHARIJUAL),
				'TBLDAFTHIBURAN_OMSETPAJAK' => LokalIndonesia::toAngka($TBLDAFTHIBURAN_OMSETPAJAK),
				'TBLDAFTHIBURAN_TGLMULAIJUAL' => $exp_TGLMULAIJUAL[0],
				'TBLDAFTHIBURAN_BLNMULAIJUAL' => $exp_TGLMULAIJUAL[1],
				'TBLDAFTHIBURAN_THNMULAIJUAL' => substr($exp_TGLMULAIJUAL[2], -2),
				'TBLDAFTHIBURAN_TGLAKHIRJUAL' => $exp_TGLAKHIRJUAL[0],
				'TBLDAFTHIBURAN_BLNAKHIRJUAL' => $exp_TGLAKHIRJUAL[1],
				'TBLDAFTHIBURAN_THNAKHIRJUAL' => substr($exp_TGLAKHIRJUAL[0], -2),
				'TBLDAFTHIBURAN_ISPEMBUKUAN' => $TBLDAFTHIBURAN_ISPEMBUKUAN,
				'TBLDAFTHIBURAN_ISKAS' => $TBLDAFTHIBURAN_ISKAS,
				'TBLDAFTHIBURAN_ISNOTA' => $TBLDAFTHIBURAN_ISNOTA,
				'TBLDAFTHIBURAN_PAJAK' => LokalIndonesia::toAngka($TBLDAFTHIBURAN_PAJAK),
				'TBLDAFTHIBURAN_PAJAKSKPD' => LokalIndonesia::toAngka($TBLDAFTHIBURAN_PAJAK),
				'TBLDAFTHIBURAN_BUNGASPTPD' => LokalIndonesia::toAngka($TBLDAFTHIBURAN_BUNGASPTPD),
				'TBLDAFTHIBURAN_RUPIAHSETOR' => '',
				'TBLDAFTHIBURAN_TGLTERIMA' => $exp_TGLTERIMA[0],
				'TBLDAFTHIBURAN_BLNTERIMA' => $exp_TGLTERIMA[1],
				'TBLDAFTHIBURAN_THNTERIMA' => substr($exp_TGLTERIMA[2], -2),
				'TBLDAFTHIBURAN_TGLBATASSPTPD' => $exp_TGLBATASSPTPD[0],
				'TBLDAFTHIBURAN_BLNBATASSPTPD' => $exp_TGLBATASSPTPD[1],
				'TBLDAFTHIBURAN_THNBATASSPTPD' => substr($exp_TGLBATASSPTPD[2], -2),
				'TBLDAFTHIBURAN_TGLENTRI' => $exp_TGLENTRI[0],
				'TBLDAFTHIBURAN_BLNENTRI' => $exp_TGLENTRI[1],
				'TBLDAFTHIBURAN_THNENTRI' => substr($exp_TGLENTRI[2], -2),
				'TBLDAFTHIBURAN_REKURUSAN' => '1',
				'TBLDAFTHIBURAN_REKPEMERINTAHAN' => '20',
				'TBLDAFTHIBURAN_REKORGANISASI' => '1',
				'TBLDAFTHIBURAN_REKPROGRAM' => '20',
				'TBLDAFTHIBURAN_REKKEGIATAN' => '26',
				'TBLDAFTHIBURAN_REKDINAS' => '0',
				'TBLDAFTHIBURAN_REKBIDANG' => '0',
				'TBLDAFTHIBURAN_REKPENDAPATAN' => '4',
				'TBLDAFTHIBURAN_REKPAD' => '1',
				'TBLDAFTHIBURAN_REKPAJAK' => '1',
				'TBLDAFTHIBURAN_REKAYAT' => '3',
				'TBLDAFTHIBURAN_REKJENIS' => $TBLREKENING_REKJENIS,
				'TBLDAFTHIBURAN_JNSHIBURAN' => 'I',
				'TBLDAFTAR_JNSPENDAPATAN' => 'P',
	
			));
	
			if ($simpan>0) {
				echo CJSON::encode(array('status'=>'success'));
			}
			else{
				echo CJSON::encode(array('status'=>'failed'));
			}
		} elseif($ada_data=='sudah') {
			$command = Yii::app()->db->createCommand();
			$column = array(
				'TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK,
				'TBLKECAMATAN_ID' => $TBLKECAMATAN_ID,
				'TBLKELURAHAN_ID' => $TBLKELURAHAN_ID,
				'TBLPENDATAAN_THNPAJAK' => substr($TBLPENDATAAN_THNPAJAK, -2),
				'TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK,
				'TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK,
				'TBLDAFTHIBURAN_TGLSPTPD' => $exp_TGLSPTPD[0],
				'TBLDAFTHIBURAN_BLNSPTPD' => $exp_TGLSPTPD[1],
				'TBLDAFTHIBURAN_THNSPTPD' => substr($exp_TGLSPTPD[2], -2),
				'TBLDAFTAR_GOLONGAN' => $TBLDAFTHIBURAN_GOLONGAN,
				//'TBLDAFTHIBURAN_PENJUALANHARI' => LokalIndonesia::toAngka($TBLDAFTHIBURAN_PENJUALANHARI),
				'TBLDAFTHIBURAN_JUMLAHHARIJUAL' => LokalIndonesia::toAngka($TBLDAFTHIBURAN_JUMLAHHARIJUAL),
				'TBLDAFTHIBURAN_OMSETPAJAK' => LokalIndonesia::toAngka($TBLDAFTHIBURAN_OMSETPAJAK),
				'TBLDAFTHIBURAN_TGLMULAIJUAL' => $exp_TGLMULAIJUAL[0],
				'TBLDAFTHIBURAN_BLNMULAIJUAL' => $exp_TGLMULAIJUAL[1],
				'TBLDAFTHIBURAN_THNMULAIJUAL' => substr($exp_TGLMULAIJUAL[2], -2),
				'TBLDAFTHIBURAN_TGLAKHIRJUAL' => $exp_TGLAKHIRJUAL[0],
				'TBLDAFTHIBURAN_BLNAKHIRJUAL' => $exp_TGLAKHIRJUAL[1],
				'TBLDAFTHIBURAN_THNAKHIRJUAL' => substr($exp_TGLAKHIRJUAL[0], -2),
				'TBLDAFTHIBURAN_ISPEMBUKUAN' => $TBLDAFTHIBURAN_ISPEMBUKUAN,
				'TBLDAFTHIBURAN_ISKAS' => $TBLDAFTHIBURAN_ISKAS,
				'TBLDAFTHIBURAN_ISNOTA' => $TBLDAFTHIBURAN_ISNOTA,
				'TBLDAFTHIBURAN_PAJAK' => LokalIndonesia::toAngka($TBLDAFTHIBURAN_PAJAK),
				'TBLDAFTHIBURAN_PAJAKSKPD' => LokalIndonesia::toAngka($TBLDAFTHIBURAN_PAJAK),
				'TBLDAFTHIBURAN_BUNGASPTPD' => LokalIndonesia::toAngka($TBLDAFTHIBURAN_BUNGASPTPD),
				'TBLDAFTHIBURAN_RUPIAHSETOR' => '',
				'TBLDAFTHIBURAN_TGLTERIMA' => $exp_TGLTERIMA[0],
				'TBLDAFTHIBURAN_BLNTERIMA' => $exp_TGLTERIMA[1],
				'TBLDAFTHIBURAN_THNTERIMA' => substr($exp_TGLTERIMA[2], -2),
				'TBLDAFTHIBURAN_TGLBATASSPTPD' => $exp_TGLBATASSPTPD[0],
				'TBLDAFTHIBURAN_BLNBATASSPTPD' => $exp_TGLBATASSPTPD[1],
				'TBLDAFTHIBURAN_THNBATASSPTPD' => substr($exp_TGLBATASSPTPD[2], -2),
				'TBLDAFTHIBURAN_TGLENTRI' => $exp_TGLENTRI[0],
				'TBLDAFTHIBURAN_BLNENTRI' => $exp_TGLENTRI[1],
				'TBLDAFTHIBURAN_THNENTRI' => substr($exp_TGLENTRI[2], -2),
				'TBLDAFTHIBURAN_REKURUSAN' => '1',
				'TBLDAFTHIBURAN_REKPEMERINTAHAN' => '20',
				'TBLDAFTHIBURAN_REKORGANISASI' => '1',
				'TBLDAFTHIBURAN_REKPROGRAM' => '20',
				'TBLDAFTHIBURAN_REKKEGIATAN' => '26',
				'TBLDAFTHIBURAN_REKDINAS' => '0',
				'TBLDAFTHIBURAN_REKBIDANG' => '0',
				'TBLDAFTHIBURAN_REKPENDAPATAN' => '4',
				'TBLDAFTHIBURAN_REKPAD' => '1',
				'TBLDAFTHIBURAN_REKPAJAK' => '1',
				'TBLDAFTHIBURAN_REKAYAT' => '3',
				'TBLDAFTHIBURAN_REKJENIS' => $TBLREKENING_REKJENIS,
				'TBLDAFTHIBURAN_JNSHIBURAN' => 'I',
				'TBLDAFTAR_JNSPENDAPATAN' => 'P',
	
			);

			$simpan = $command->update('TBLDAFTHIBURAN', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPAJAK AND TBLPENDATAAN_BLNPAJAK =:BLNPAJAK AND TBLPENDATAAN_TGLPAJAK =:TGLPAJAK',array(':NOPOK' => $TBLDAFTAR_NOPOK, ':THNPAJAK' =>substr($TBLPENDATAAN_THNPAJAK, -2), ':BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK, ':TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK));
			if ($simpan>0) {
				echo CJSON::encode(array('status'=>'success'));
			}
			else{
				echo CJSON::encode(array('status'=>'failed'));
			}
		} else {
			echo CJSON::encode(array('status'=>'failed'));
		}
	}

	public function actionCekPernahDaftar()
	{
		$NOPOKOK = $_REQUEST['nopokok'];
		$THNPAJAK = substr($_REQUEST['THNPAJAK'], -2);
		$BLNPAJAK = $_REQUEST['BLNPAJAK'];
		$TGLPAJAK = $_REQUEST['TGLPAJAK'];

		$cek = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTHIBURAN WHERE TBLPENDATAAN_THNPAJAK ='.$THNPAJAK.' AND TBLPENDATAAN_BLNPAJAK='.$BLNPAJAK.' AND TBLPENDATAAN_TGLPAJAK='.$TGLPAJAK.' AND TBLDAFTAR_NOPOK='.$NOPOKOK)->queryScalar();
		if ($cek) {
			echo CJSON::encode(array('status'=>'sudah'));
		}
		else{
			echo CJSON::encode(array('status'=>'belum'));
		}
	}

	/*public function actionGetTGLBatas()
	{
		$data['THNPAJAK'] = substr($_REQUEST['THNPAJAK'],-2);
		$data['BLNPAJAK'] = $_REQUEST['BLNPAJAK'];
		$data['KODEREK'] = $_REQUEST['KODEREK'];
		$data['BULANBATAS'] = $_REQUEST['BLNPAJAK']+1;

		// $tglbatas = RefTGLBatas::model()->get($data['KODEREK'],$data['THNPAJAK'],$data['BULANBATAS']);

		//Tanggal Batas Pajak
		$data['TANGGAL'] = 15;
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
		//Tanggal Batas Pajak

		//Tanggal Batas Bulan Ini
		$blnnow = date('m');
		$thnnow = date('Y');

		$data['TGLBATASBLNNOW'] = '16-'.$blnnow.'-'.$thnnow;

		$data['BLNBUNGA'] = $blnnow-$data['BLNPAJAK'];
		
		if (date('d') > date('d',strtotime($data['TGLBATASBLNNOW']))) {
			$data['BLNBUNGAHIT'] = $data['BLNBUNGA']+1;
		}
		else{
			$data['BLNBUNGAHIT'] = $data['BLNBUNGA'];
		}


		//Tanggal Batas Bulan Ini

		echo CJSON::encode($data);

	}*/
	
	public function actionGetTGLBatas()
	{
		$jmlhari = 30;
		$bulan = (int)trim($_REQUEST['BLNPAJAK']);
		$tahun = trim($_POST['THNPAJAK']);
		
		$data['BLNPAJAK'] = $bulan;
		$data['JUMLAH_HARI'] = $jmlhari-1;
		$data['AWAL_PAJAK'] = '01-'.$bulan.'-'.date('Y');
		if ($bulan=='02') {
			$data['AKHIR_PAJAK'] = $jmlhari.'-'.$bulan.'-'.date('Y');
		}else{
			$data['AKHIR_PAJAK'] = $jmlhari.'-'.$bulan.'-'.date('Y');
		}

		//set bunga persen untuk denda
		if ($bulan==12) {
			$thnbatas = substr($tahun,-2)+1;
			$blnbatas = '1';
		}else{
			$thnbatas = substr($tahun,-2);
			$blnbatas = ($bulan+1);
		}
		$tglbatas = '15'.'-'.($blnbatas<10 ? '0'.$blnbatas : $blnbatas).'-20'.$thnbatas;
		$tglbatasbulanini = RefTGLBatas::model()->get($this->PAJAK_REK, substr(date('Y'),-2), date('n')).'-'.($blnbatas<10 ? '0'.$blnbatas : $blnbatas).'-20'.$thnbatas;
		//$tglentry = date('Y-m-d');

		// $bulan_denda = date('m') - date('m', strtotime($tglbatas));
		$bulan_denda = LokalIndonesia::monthdiff(date('Y-m-', strtotime($tglbatas)).'01',date('Y-m-').'01');
		if ($bulan_denda<0) {
			$bulan_denda = 0;
		}
		// $data['TGL_BATAS'] = $tglbatas;
		$data['TGL_BATAS'] = $tglbatas;
		$data['BULAN_DENDA'] = $bulan_denda;
		$data['PERSEN_DENDA'] = $bulan_denda*2;
		if (date('d')>date('d', strtotime($tglbatasbulanini))) {
			if (date('m', strtotime($tglbatas))<date('m')) {
				$data['BULAN_DENDA'] = $bulan_denda+1;
				$data['PERSEN_DENDA'] = $data['BULAN_DENDA']*2;
			}
		}

		$data['BLNBUNGA'] = $bulan_denda = LokalIndonesia::getBulanDenda(date('Y-m-d', strtotime($tglbatas)), date('Y-m-d') );
		$data['PERSEN_DENDA'] = $bulan_denda*2;
		/*Tanggal Batas Bulan Ini*/

		echo CJSON::encode($data);

	}
}