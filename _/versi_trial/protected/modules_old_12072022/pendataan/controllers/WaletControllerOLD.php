<?php

class WaletController extends Controller
{
	var $KODE_GOL = 1;
	var $PAJAK_AYAT = 0;
	var $PAJAK_REK = '4.1.1.9.0';

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
		WHERE TBLREKENING_KODE LIKE '4.1.1.9.%'
		ORDER BY TBLREKENING_KODE")->queryAll();


		$this->renderPartial('index',array('data'=>$data));
	}

	public function actionautocompletewpwalet()
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
			,'EQ__TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA' => "SBW"
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

	public function actionGetWPWalet()
	{
		$NOPOKOK = $_REQUEST['nopokok'];
		$THNPAJAK = substr($_REQUEST['THNPAJAK'], -2);
		$BLNPAJAK = (int) $_REQUEST['BLNPAJAK'];

		$data = Yii::app()->db->createCommand('SELECT * FROM TBLDAFTBURUNG WHERE TBLPENDATAAN_THNPAJAK ='.$THNPAJAK.' AND TBLPENDATAAN_BLNPAJAK='.$BLNPAJAK.' AND TBLDAFTAR_NOPOK='.$NOPOKOK)->queryRow();
		echo CJSON::encode($data);
	}

	public function actionSimpanWalet()
	{
		Yii::import('ext.LokalIndonesia');

		$ada_data = isset($_REQUEST['ada_data']) && !empty($_REQUEST['ada_data']) ? $_REQUEST['ada_data'] : 0;
		$TBLDAFTAR_NOPOK = isset($_REQUEST['TBLDAFTAR_NOPOK']) && !empty($_REQUEST['TBLDAFTAR_NOPOK']) ? $_REQUEST['TBLDAFTAR_NOPOK'] : 0;
		$TBLPENDATAAN_THNPAJAK = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? $_REQUEST['TBLPENDATAAN_THNPAJAK'] : 0;
		$TBLPENDATAAN_BLNPAJAK = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : 0;
		if($_REQUEST['isi_masapajak_tanggal']!='00'){
		$TBLPENDATAAN_TGLPAJAK = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? $_REQUEST['TBLPENDATAAN_TGLPAJAK'] : 0;
		} else {
		$TBLPENDATAAN_TGLPAJAK = isset($_REQUEST['isi_masapajak_tanggal']) && !empty($_REQUEST['isi_masapajak_tanggal']) ? $_REQUEST['isi_masapajak_tanggal'] : 0;
		}
		$TBLDAFTBURUNG_TGLSPTPD = isset($_REQUEST['TBLDAFTBURUNG_TGLSPTPD']) && !empty($_REQUEST['TBLDAFTBURUNG_TGLSPTPD']) ? $_REQUEST['TBLDAFTBURUNG_TGLSPTPD'] : 0;
		//$TBLDAFTBURUNG_PENJUALANHARI = isset($_REQUEST['TBLDAFTBURUNG_PENJUALANHARI'])!=0 ? $_REQUEST['TBLDAFTBURUNG_PENJUALANHARI'] : 0;
		$TBLDAFTBURUNG_JUMLAHHARIJUAL = isset($_REQUEST['TBLDAFTBURUNG_JUMLAHHARIJUAL']) && !empty($_REQUEST['TBLDAFTBURUNG_JUMLAHHARIJUAL']) ? $_REQUEST['TBLDAFTBURUNG_JUMLAHHARIJUAL'] : 0;
		$TBLDAFTBURUNG_OMSETPAJAK = isset($_REQUEST['TBLDAFTBURUNG_OMSETPAJAK']) && !empty($_REQUEST['TBLDAFTBURUNG_OMSETPAJAK']) ? $_REQUEST['TBLDAFTBURUNG_OMSETPAJAK'] : 0;
		$TBLDAFTBURUNG_TGLMULAIJUAL = isset($_REQUEST['TBLDAFTBURUNG_TGLMULAIJUAL']) && !empty($_REQUEST['TBLDAFTBURUNG_TGLMULAIJUAL']) ? $_REQUEST['TBLDAFTBURUNG_TGLMULAIJUAL'] : 0;
		$TBLDAFTBURUNG_TGLAKHIRJUAL = isset($_REQUEST['TBLDAFTBURUNG_TGLAKHIRJUAL']) && !empty($_REQUEST['TBLDAFTBURUNG_TGLAKHIRJUAL']) ? $_REQUEST['TBLDAFTBURUNG_TGLAKHIRJUAL'] : 0;
		$TBLDAFTBURUNG_ISPEMBUKUAN = isset($_REQUEST['TBLDAFTBURUNG_ISPEMBUKUAN']) && !empty($_REQUEST['TBLDAFTBURUNG_ISPEMBUKUAN']) ? $_REQUEST['TBLDAFTBURUNG_ISPEMBUKUAN'] : 0;
		$TBLDAFTBURUNG_ISKAS = isset($_REQUEST['TBLDAFTBURUNG_ISKAS']) && !empty($_REQUEST['TBLDAFTBURUNG_ISKAS']) ? $_REQUEST['TBLDAFTBURUNG_ISKAS'] : 0;
		$TBLDAFTBURUNG_ISNOTA = isset($_REQUEST['TBLDAFTBURUNG_ISNOTA']) && !empty($_REQUEST['TBLDAFTBURUNG_ISNOTA']) ? $_REQUEST['TBLDAFTBURUNG_ISNOTA'] : 0;
		$TBLDAFTBURUNG_PAJAK = isset($_REQUEST['TBLDAFTBURUNG_PAJAK']) && !empty($_REQUEST['TBLDAFTBURUNG_PAJAK']) ? $_REQUEST['TBLDAFTBURUNG_PAJAK'] : 0;
		$TBLDAFTBURUNG_BUNGASPTPD = isset($_REQUEST['TBLDAFTBURUNG_BUNGASPTPD']) && !empty($_REQUEST['TBLDAFTBURUNG_BUNGASPTPD']) ? $_REQUEST['TBLDAFTBURUNG_BUNGASPTPD'] : 0;
		$TBLDAFTBURUNG_RUPIAHSETOR = isset($_REQUEST['TBLDAFTBURUNG_RUPIAHSETOR']) && !empty($_REQUEST['TBLDAFTBURUNG_RUPIAHSETOR']) ? $_REQUEST['TBLDAFTBURUNG_RUPIAHSETOR'] : 0;
		$TBLDAFTBURUNG_TGLTERIMA = isset($_REQUEST['TBLDAFTBURUNG_TGLTERIMA']) && !empty($_REQUEST['TBLDAFTBURUNG_TGLTERIMA']) ? $_REQUEST['TBLDAFTBURUNG_TGLTERIMA'] : 0;
		$TBLDAFTBURUNG_TGLBATASSPTPD = isset($_REQUEST['TBLDAFTBURUNG_TGLBATASSPTPD']) && !empty($_REQUEST['TBLDAFTBURUNG_TGLBATASSPTPD']) ? $_REQUEST['TBLDAFTBURUNG_TGLBATASSPTPD'] : 0;
		$TBLDAFTBURUNG_TGLENTRI = isset($_REQUEST['TBLDAFTBURUNG_TGLENTRI']) && !empty($_REQUEST['TBLDAFTBURUNG_TGLENTRI']) ? $_REQUEST['TBLDAFTBURUNG_TGLENTRI'] : 0;
		$TBLKECAMATAN_ID = isset($_REQUEST['idkecamatan']) && !empty($_REQUEST['idkecamatan']) ? $_REQUEST['idkecamatan'] : 0;
		$TBLKELURAHAN_ID = isset($_REQUEST['idkelurahan']) && !empty($_REQUEST['idkelurahan']) ? $_REQUEST['idkelurahan'] : 0;
		$TBLDAFTAR_GOLONGAN = 1;
		$exp_TGLSPTPD = explode('-', $TBLDAFTBURUNG_TGLSPTPD);
		$exp_TGLMULAIJUAL = explode('-', $TBLDAFTBURUNG_TGLMULAIJUAL);
		$exp_TGLAKHIRJUAL = explode('-', $TBLDAFTBURUNG_TGLAKHIRJUAL);
		$exp_TGLTERIMA = explode('-', $TBLDAFTBURUNG_TGLTERIMA);
		$exp_TGLBATASSPTPD = explode('-', $TBLDAFTBURUNG_TGLBATASSPTPD);
		$exp_TGLENTRI = explode('-', $TBLDAFTBURUNG_TGLENTRI);

		
		if($ada_data=='belum'){
			$insert = Yii::app()->db->createCommand();
			$simpan = $insert->insert('TBLDAFTBURUNG', array(
				'TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK,
				'TBLKECAMATAN_ID' => $TBLKECAMATAN_ID,
				'TBLKELURAHAN_ID' => $TBLKELURAHAN_ID,
				'TBLPENDATAAN_THNPAJAK' => substr($TBLPENDATAAN_THNPAJAK, -2),
				'TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK,
				'TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK,
				'TBLDAFTBURUNG_TGLSPTPD' => $exp_TGLSPTPD[0],
				'TBLDAFTBURUNG_BLNSPTPD' => $exp_TGLSPTPD[1],
				'TBLDAFTBURUNG_THNSPTPD' => substr($exp_TGLSPTPD[2], -2),
				'TBLDAFTAR_GOLONGAN' => $TBLDAFTAR_GOLONGAN,
				//'TBLDAFTBURUNG_PENJUALANHARI' => LokalIndonesia::toAngka($TBLDAFTBURUNG_PENJUALANHARI),
				'TBLDAFTBURUNG_JUMLAHHARIJUAL' => LokalIndonesia::toAngka($TBLDAFTBURUNG_JUMLAHHARIJUAL),
				'TBLDAFTBURUNG_OMSETPAJAK' => LokalIndonesia::toAngka($TBLDAFTBURUNG_OMSETPAJAK),
				'TBLDAFTBURUNG_TGLMULAIJUAL' => $exp_TGLMULAIJUAL[0],
				'TBLDAFTBURUNG_BLNMULAIJUAL' => $exp_TGLMULAIJUAL[1],
				'TBLDAFTBURUNG_THNMULAIJUAL' => substr($exp_TGLMULAIJUAL[2], -2),
				'TBLDAFTBURUNG_TGLAKHIRJUAL' => $exp_TGLAKHIRJUAL[0],
				'TBLDAFTBURUNG_BLNAKHIRJUAL' => $exp_TGLAKHIRJUAL[1],
				'TBLDAFTBURUNG_THNAKHIRJUAL' => substr($exp_TGLAKHIRJUAL[0], -2),
				'TBLDAFTBURUNG_ISPEMBUKUAN' => $TBLDAFTBURUNG_ISPEMBUKUAN,
				'TBLDAFTBURUNG_ISKAS' => $TBLDAFTBURUNG_ISKAS,
				'TBLDAFTBURUNG_ISNOTA' => $TBLDAFTBURUNG_ISNOTA,
				'TBLDAFTBURUNG_PAJAK' => LokalIndonesia::toAngka($TBLDAFTBURUNG_PAJAK),
				'TBLDAFTBURUNG_PAJAKSKPD' => LokalIndonesia::toAngka($TBLDAFTBURUNG_PAJAK),
				'TBLDAFTBURUNG_BUNGASPTPD' => LokalIndonesia::toAngka($TBLDAFTBURUNG_BUNGASPTPD),
				'TBLDAFTBURUNG_RUPIAHSETOR' => LokalIndonesia::toAngka($TBLDAFTBURUNG_RUPIAHSETOR),
				'TBLDAFTBURUNG_TGLTERIMA' => $exp_TGLTERIMA[0],
				'TBLDAFTBURUNG_BLNTERIMA' => $exp_TGLTERIMA[1],
				'TBLDAFTBURUNG_THNTERIMA' => substr($exp_TGLTERIMA[2], -2),
				'TBLDAFTBURUNG_TGLBATASSPTPD' => $exp_TGLBATASSPTPD[0],
				'TBLDAFTBURUNG_BLNBATASSPTPD' => $exp_TGLBATASSPTPD[1],
				'TBLDAFTBURUNG_THNBATASSPTPD' => substr($exp_TGLBATASSPTPD[2], -2),
				'TBLDAFTBURUNG_TGLENTRI' => $exp_TGLENTRI[0],
				'TBLDAFTBURUNG_BLNENTRI' => $exp_TGLENTRI[1],
				'TBLDAFTBURUNG_THNENTRI' => substr($exp_TGLENTRI[2], -2),
				'TBLDAFTAR_JNSPENDAPATAN' => "P",
			));
	
			if ($simpan>0) {
				echo CJSON::encode(array('status'=>'success'));
			}
			else{
				echo CJSON::encode(array('status'=>'failed'));
			}
		} elseif($ada_data=='sudah'){
			$command = Yii::app()->db->createCommand();
			$column = array(
				'TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK,
				'TBLKECAMATAN_ID' => $TBLKECAMATAN_ID,
				'TBLKELURAHAN_ID' => $TBLKELURAHAN_ID,
				'TBLPENDATAAN_THNPAJAK' => substr($TBLPENDATAAN_THNPAJAK, -2),
				'TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK,
				'TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK,
				'TBLDAFTBURUNG_TGLSPTPD' => $exp_TGLSPTPD[0],
				'TBLDAFTBURUNG_BLNSPTPD' => $exp_TGLSPTPD[1],
				'TBLDAFTBURUNG_THNSPTPD' => substr($exp_TGLSPTPD[2], -2),
				'TBLDAFTAR_GOLONGAN' => $TBLDAFTAR_GOLONGAN,
				//'TBLDAFTBURUNG_PENJUALANHARI' => LokalIndonesia::toAngka($TBLDAFTBURUNG_PENJUALANHARI),
				'TBLDAFTBURUNG_JUMLAHHARIJUAL' => LokalIndonesia::toAngka($TBLDAFTBURUNG_JUMLAHHARIJUAL),
				'TBLDAFTBURUNG_OMSETPAJAK' => LokalIndonesia::toAngka($TBLDAFTBURUNG_OMSETPAJAK),
				'TBLDAFTBURUNG_TGLMULAIJUAL' => $exp_TGLMULAIJUAL[0],
				'TBLDAFTBURUNG_BLNMULAIJUAL' => $exp_TGLMULAIJUAL[1],
				'TBLDAFTBURUNG_THNMULAIJUAL' => substr($exp_TGLMULAIJUAL[2], -2),
				'TBLDAFTBURUNG_TGLAKHIRJUAL' => $exp_TGLAKHIRJUAL[0],
				'TBLDAFTBURUNG_BLNAKHIRJUAL' => $exp_TGLAKHIRJUAL[1],
				'TBLDAFTBURUNG_THNAKHIRJUAL' => substr($exp_TGLAKHIRJUAL[0], -2),
				'TBLDAFTBURUNG_ISPEMBUKUAN' => $TBLDAFTBURUNG_ISPEMBUKUAN,
				'TBLDAFTBURUNG_ISKAS' => $TBLDAFTBURUNG_ISKAS,
				'TBLDAFTBURUNG_ISNOTA' => $TBLDAFTBURUNG_ISNOTA,
				'TBLDAFTBURUNG_PAJAK' => LokalIndonesia::toAngka($TBLDAFTBURUNG_PAJAK),
				'TBLDAFTBURUNG_PAJAKSKPD' => LokalIndonesia::toAngka($TBLDAFTBURUNG_PAJAK),
				'TBLDAFTBURUNG_BUNGASPTPD' => LokalIndonesia::toAngka($TBLDAFTBURUNG_BUNGASPTPD),
				'TBLDAFTBURUNG_RUPIAHSETOR' => LokalIndonesia::toAngka($TBLDAFTBURUNG_RUPIAHSETOR),
				'TBLDAFTBURUNG_TGLTERIMA' => $exp_TGLTERIMA[0],
				'TBLDAFTBURUNG_BLNTERIMA' => $exp_TGLTERIMA[1],
				'TBLDAFTBURUNG_THNTERIMA' => substr($exp_TGLTERIMA[2], -2),
				'TBLDAFTBURUNG_TGLBATASSPTPD' => $exp_TGLBATASSPTPD[0],
				'TBLDAFTBURUNG_BLNBATASSPTPD' => $exp_TGLBATASSPTPD[1],
				'TBLDAFTBURUNG_THNBATASSPTPD' => substr($exp_TGLBATASSPTPD[2], -2),
				'TBLDAFTBURUNG_TGLENTRI' => $exp_TGLENTRI[0],
				'TBLDAFTBURUNG_BLNENTRI' => $exp_TGLENTRI[1],
				'TBLDAFTBURUNG_THNENTRI' => substr($exp_TGLENTRI[2], -2),
				'TBLDAFTAR_JNSPENDAPATAN' => "P",
			);

			$simpan = $command->update('TBLDAFTBURUNG', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPAJAK AND TBLPENDATAAN_BLNPAJAK =:BLNPAJAK',array(':NOPOK' => $TBLDAFTAR_NOPOK, ':THNPAJAK' =>substr($TBLPENDATAAN_THNPAJAK, -2), ':BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK));
			if ($simpan) {
				$res['status'] = 'update';
			}else{
				$res['status'] = 'failed';
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

		$cek = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTBURUNG WHERE TBLPENDATAAN_THNPAJAK ='.$THNPAJAK.' AND TBLPENDATAAN_BLNPAJAK='.$BLNPAJAK.' AND TBLDAFTAR_NOPOK='.$NOPOKOK)->queryScalar();
		if ($cek) {
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