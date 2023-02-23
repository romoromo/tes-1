<?php

class Pajak_airtanah2017Controller extends Controller
{
	var $KODE_GOL = 1;
	var $PAJAK_AYAT = 8;
	var $PAJAK_REK = '4.1.1.8.0';

	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		
		// $select = '*';
		// $from = 'TREKENING';
		// $filter = array(
		// 	 'LK__TREKENING_KODE' => '41108'
		// 	//,'EQ__TREKENING_LEVEL' => '1'
		// );

		// $otherquery = array();

		// $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		// $data['rek'] = DBFetch::query($arrayConfig);

		$data['rek'] = Yii::app()->db->createCommand("
		SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.8.%'
		ORDER BY TBLREKENING_KODE
		")
		->queryAll();

		$this->renderPartial('index',array('data'=>$data));
	}

	public function actionautocompletewpairtanah()
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
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,'EQ__TBLDAFTAR.REFBADANUSAHA_IDPEMILIK' => "AIR"
			// ,'EQ__TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA' => "AIR"
		);

		$otherquery = array(
			'limit'=> 30
			,'leftjoin'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID = TBLDAFTAR.REFBADANUSAHA_IDPEMILIK')
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

	public function actionautocompletewpairtanah2()
	{
		$nopokok = trim($_REQUEST['nopokok']);
		//$query = trim($_REQUEST['query']);

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
			'EQ__TBLDAFTAR_NOPOK' => $nopokok
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,'EQ__TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA' => "AIR"
		);

		$otherquery = array(
			'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$results = DBFetch::query($arrayConfig);
		

	}

	public function actionGetKodeRek()
	{
		$kodesubrek = $_REQUEST['kodesubrek'];
		$data = Yii::app()->db->createCommand()->select('*')->from('TBLREKENING')->where('TBLREKENING_KODE=:kode', array(':kode'=>$kodesubrek))->queryRow();

		echo CJSON::encode($data);
	}

	public function actionGetWPAirTanah()
	{
		$NOPOKOK = $_REQUEST['nopokok'];
		$THNPAJAK = substr($_REQUEST['THNPAJAK'], -2);
		$BLNPAJAK = (int) $_REQUEST['BLNPAJAK'];

		$data = Yii::app()->db->createCommand('SELECT * FROM TBLDAFTTANAH WHERE TBLPENDATAAN_THNPAJAK ='.$THNPAJAK.' AND TBLPENDATAAN_BLNPAJAK='.$BLNPAJAK.' AND TBLDAFTAR_NOPOK='.$NOPOKOK)->queryRow();
		echo CJSON::encode($data);
	}

	public function actionSimpanAirTanah()
	{
		$ada_data = isset($_REQUEST['ada_data']) && !empty($_REQUEST['ada_data']) ? $_REQUEST['ada_data'] : 0;
		$TBLDAFTAR_NOPOK = isset($_REQUEST['TBLDAFTAR_NOPOK']) && !empty($_REQUEST['TBLDAFTAR_NOPOK']) ? $_REQUEST['TBLDAFTAR_NOPOK'] : 0;
		$TBLPENDATAAN_THNPAJAK = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? $_REQUEST['TBLPENDATAAN_THNPAJAK'] : 0;
		$TBLPENDATAAN_BLNPAJAK = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : 0;
		$TBLDAFTTANAH_TGLPAJAK = isset($_REQUEST['TBLDAFTTANAH_TGLPAJAK']) && !empty($_REQUEST['TBLDAFTTANAH_TGLPAJAK']) ? $_REQUEST['TBLDAFTTANAH_TGLPAJAK'] : 0;
		$TBLDAFTTANAH_TGLSPTPD = isset($_REQUEST['TBLDAFTTANAH_TGLSPTPD']) && !empty($_REQUEST['TBLDAFTTANAH_TGLSPTPD']) ? $_REQUEST['TBLDAFTTANAH_TGLSPTPD'] : 0;
		$TBLREKENING_KODE = isset($_REQUEST['TBLREKENING_KODE']) && !empty($_REQUEST['TBLREKENING_KODE']) ? $_REQUEST['TBLREKENING_KODE'] : 0;
		$TBLDAFTTANAH_TOTALVOLUME = isset($_REQUEST['TBLDAFTTANAH_TOTALVOLUME']) && !empty($_REQUEST['TBLDAFTTANAH_TOTALVOLUME']) ? $_REQUEST['TBLDAFTTANAH_TOTALVOLUME'] : 0;
		$TBLDAFTTANAH_NPA = isset($_REQUEST['TBLDAFTTANAH_NPA']) && !empty($_REQUEST['TBLDAFTTANAH_NPA']) ? $_REQUEST['TBLDAFTTANAH_NPA'] : 0;
		$TBLREKENING_TARIF = isset($_REQUEST['TBLREKENING_TARIF']) && !empty($_REQUEST['TBLREKENING_TARIF']) ? $_REQUEST['TBLREKENING_TARIF'] : 0;
		$TBLDAFTTANAH_NPATARIF = isset($_REQUEST['TBLDAFTTANAH_NPATARIF']) && !empty($_REQUEST['TBLDAFTTANAH_NPATARIF']) ? $_REQUEST['TBLDAFTTANAH_NPATARIF'] : 0;
		$TBLDAFTTANAH_BUNGASPTPD = isset($_REQUEST['TBLDAFTTANAH_BUNGASPTPD']) && !empty($_REQUEST['TBLDAFTTANAH_BUNGASPTPD']) ? $_REQUEST['TBLDAFTTANAH_BUNGASPTPD'] : 0;
		$TBLDAFTTANAH_DENDA = isset($_REQUEST['TBLDAFTTANAH_DENDA']) && !empty($_REQUEST['TBLDAFTTANAH_DENDA']) ? $_REQUEST['TBLDAFTTANAH_DENDA'] : 0;
		$TBLDAFTTANAH_PAJAK = isset($_REQUEST['TBLDAFTTANAH_PAJAK']) && !empty($_REQUEST['TBLDAFTTANAH_PAJAK']) ? $_REQUEST['TBLDAFTTANAH_PAJAK'] : 0;
		$TBLDAFTTANAH_RUPIAHSETOR = isset($_REQUEST['TBLDAFTTANAH_RUPIAHSETOR']) && !empty($_REQUEST['TBLDAFTTANAH_RUPIAHSETOR']) ? $_REQUEST['TBLDAFTTANAH_RUPIAHSETOR'] : 0;
		$TBLDAFTTANAH_TGLMULAIJUAL = isset($_REQUEST['TBLDAFTTANAH_TGLMULAIJUAL']) && !empty($_REQUEST['TBLDAFTTANAH_TGLMULAIJUAL']) ? $_REQUEST['TBLDAFTTANAH_TGLMULAIJUAL'] : 0;
		$TBLDAFTTANAH_TGLAKHIRJUAL = isset($_REQUEST['TBLDAFTTANAH_TGLAKHIRJUAL']) && !empty($_REQUEST['TBLDAFTTANAH_TGLAKHIRJUAL']) ? $_REQUEST['TBLDAFTTANAH_TGLAKHIRJUAL'] : 0;
		$TBLDAFTTANAH_ISPEMBUKUAN = isset($_REQUEST['TBLDAFTTANAH_ISPEMBUKUAN']) && !empty($_REQUEST['TBLDAFTTANAH_ISPEMBUKUAN']) ? $_REQUEST['TBLDAFTTANAH_ISPEMBUKUAN'] : 0;
		$TBLDAFTTANAH_ISKAS = isset($_REQUEST['TBLDAFTTANAH_ISKAS']) && !empty($_REQUEST['TBLDAFTTANAH_ISKAS']) ? $_REQUEST['TBLDAFTTANAH_ISKAS'] : 0;
		$TBLDAFTTANAH_ISNOTA = isset($_REQUEST['TBLDAFTTANAH_ISNOTA']) && !empty($_REQUEST['TBLDAFTTANAH_ISNOTA']) ? $_REQUEST['TBLDAFTTANAH_ISNOTA'] : 0;
		$TBLDAFTTANAH_TGLTERIMA = isset($_REQUEST['TBLDAFTTANAH_TGLTERIMA']) && !empty($_REQUEST['TBLDAFTTANAH_TGLTERIMA']) ? $_REQUEST['TBLDAFTTANAH_TGLTERIMA'] : 0;
		$TBLDAFTTANAH_TGLBATASSPTPD = isset($_REQUEST['TBLDAFTTANAH_TGLBATASSPTPD']) && !empty($_REQUEST['TBLDAFTTANAH_TGLBATASSPTPD']) ? $_REQUEST['TBLDAFTTANAH_TGLBATASSPTPD'] : 0;
		$TBLDAFTTANAH_TGLENTRI = isset($_REQUEST['TBLDAFTTANAH_TGLENTRI']) && !empty($_REQUEST['TBLDAFTTANAH_TGLENTRI']) ? $_REQUEST['TBLDAFTTANAH_TGLENTRI'] : 0;
		$TBLDAFTTANAH_ISJNSPENETAPAN = isset($_REQUEST['hit_carapenghitungan']) && !empty($_REQUEST['hit_carapenghitungan']) ? $_REQUEST['hit_carapenghitungan'] : 0;
		$TBLKECAMATAN_ID = isset($_REQUEST['idkecamatan']) && !empty($_REQUEST['idkecamatan']) ? $_REQUEST['idkecamatan'] : 0;
		$TBLKELURAHAN_ID = isset($_REQUEST['idkelurahan']) && !empty($_REQUEST['idkelurahan']) ? $_REQUEST['idkelurahan'] : 0;
		$TBLREKENING_PERSEN = isset($_REQUEST['TBLREKENING_PERSEN']) && !empty($_REQUEST['TBLREKENING_PERSEN']) ? $_REQUEST['TBLREKENING_PERSEN'] : 0;
		$TBLDAFTTANAH_GOLONGAN = 1;
		$exp_TGLSPTPD = explode('-', $TBLDAFTTANAH_TGLSPTPD);
		$exp_TGLMULAIJUAL = explode('-', $TBLDAFTTANAH_TGLMULAIJUAL);
		$exp_TGLAKHIRJUAL = explode('-', $TBLDAFTTANAH_TGLAKHIRJUAL);
		$exp_TGLTERIMA = explode('-', $TBLDAFTTANAH_TGLTERIMA);

		// $exp_TGLBATASSPTPD = explode('-', $TBLDAFTTANAH_TGLBATASSPTPD);

		$exp_TGLENTRI = explode('-', $TBLDAFTTANAH_TGLENTRI);

		if ($TBLDAFTTANAH_TGLBATASSPTPD !='') {
			$exp_TGLBATASSPTPD = explode('-', $TBLDAFTTANAH_TGLBATASSPTPD);
			$pecahtglbatasspt = $exp_TGLBATASSPTPD[0];
			$pecahbulanbatasspt = $exp_TGLBATASSPTPD[1];
			$pecahthnbatasspt = substr($exp_TGLBATASSPTPD[2], -2);	
		} else {
			$pecahtglbatasspt = '0';
			$pecahbulanbatasspt = '0';
			$pecahthnbatasspt = '0';
		}

		if($ada_data=='belum'){
			$insert = Yii::app()->db->createCommand();
			$arrayInsert = array(
				'TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK,
				'TBLKECAMATAN_ID' => $TBLKECAMATAN_ID,
				'TBLKELURAHAN_ID' => $TBLKELURAHAN_ID,
				'TBLPENDATAAN_THNPAJAK' => substr($TBLPENDATAAN_THNPAJAK, -2),
				'TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK,
				'TBLPENDATAAN_TGLPAJAK' => $TBLDAFTTANAH_TGLPAJAK,
				'TBLPENDATAAN_PAJAKKE' => '0',
				'TBLDAFTTANAH_TGLSPTPD' => $exp_TGLSPTPD[0],
				'TBLDAFTTANAH_BLNSPTPD' => $exp_TGLSPTPD[1],
				'TBLDAFTTANAH_THNSPTPD' => substr($exp_TGLSPTPD[2], -2),
				'TBLDAFTAR_GOLONGAN' => $TBLDAFTTANAH_GOLONGAN,
				'TBLDAFTTANAH_NILAIAIR1' => LokalIndonesia::toAngka($TBLDAFTTANAH_NPA),
				'TBLDAFTTANAH_TGLMULAIJUAL' => $exp_TGLMULAIJUAL[0],
				'TBLDAFTTANAH_BLNMULAIJUAL' => $exp_TGLMULAIJUAL[1],
				'TBLDAFTTANAH_THNMULAIJUAL' => substr($exp_TGLMULAIJUAL[2], -2),
				'TBLDAFTTANAH_TGLAKHIRJUAL' => $exp_TGLAKHIRJUAL[0],
				'TBLDAFTTANAH_BLNAKHIRJUAL' => $exp_TGLAKHIRJUAL[1],
				'TBLDAFTTANAH_THNAKHIRJUAL' => substr($exp_TGLAKHIRJUAL[2], -2),
				'TBLDAFTTANAH_ISPEMBUKUAN' => $TBLDAFTTANAH_ISPEMBUKUAN,
				'TBLDAFTTANAH_ISKAS' => $TBLDAFTTANAH_ISKAS,
				'TBLDAFTTANAH_ISNOTA' => $TBLDAFTTANAH_ISNOTA,
				'TBLDAFTTANAH_BUNGASPTPD' => $TBLDAFTTANAH_BUNGASPTPD,
				'TBLDAFTTANAH_PERSENTARIF' => $TBLREKENING_PERSEN,
				'TBLDAFTTANAH_PAJAK' => LokalIndonesia::toAngka($TBLDAFTTANAH_PAJAK),
				// 'TBLDAFTTANAH_PAJAKSKPD' => LokalIndonesia::toAngka($TBLDAFTTANAH_PAJAK),
				// 'TBLDAFTTANAH_RUPIAHSETOR' => LokalIndonesia::toAngka($TBLDAFTTANAH_RUPIAHSETOR),
				'TBLDAFTTANAH_TGLTERIMA' => $exp_TGLTERIMA[0],
				'TBLDAFTTANAH_BLNTERIMA' => $exp_TGLTERIMA[1],
				'TBLDAFTTANAH_THNTERIMA' => substr($exp_TGLTERIMA[2], -2),

				// disini errornya offset 1
				'TBLDAFTTANAH_TGLBATASSPTPD' => $pecahtglbatasspt,
				'TBLDAFTTANAH_BLNBATASSPTPD' => $pecahbulanbatasspt,
				'TBLDAFTTANAH_THNBATASSPTPD' => $pecahthnbatasspt,

				'TBLDAFTTANAH_TGLENTRI' => $exp_TGLENTRI[0],
				'TBLDAFTTANAH_BLNENTRI' => $exp_TGLENTRI[1],
				'TBLDAFTTANAH_THNENTRI' => substr($exp_TGLENTRI[2], -2),
				'TBLDAFTTANAH_TOTALVOLUME' => $TBLDAFTTANAH_TOTALVOLUME,
				'TBLDAFTTANAH_ISJNSPENETAPAN' => $TBLDAFTTANAH_ISJNSPENETAPAN,
				'TBLDAFTAR_JNSPENDAPATAN' => 'P',
	
				'TBLDAFTTANAH_REKURUSAN' => '1',
				'TBLDAFTTANAH_REKPEMERINTAHAN' => '20',
				'TBLDAFTTANAH_REKORGANISASI' => '1',
				'TBLDAFTTANAH_REKPROGRAM' => '20',
				'TBLDAFTTANAH_REKKEGIATAN' => '26',
				'TBLDAFTTANAH_REKDINAS' => '0',
				'TBLDAFTTANAH_REKBIDANG' => '0',
				'TBLDAFTTANAH_REKPENDAPATAN' => '4',
				'TBLDAFTTANAH_REKPAD' => '1',
				'TBLDAFTTANAH_REKPAJAK' => '1',
				'TBLDAFTTANAH_REKAYAT' => '8',
				'TBLDAFTTANAH_REKJENIS' => '0',
				'TBLDAFTTANAH_REKSUBJENIS' => '0',
				
				'TBLDAFTAR_JNSPENDAPATAN' => 'P',
			);
			$filter = array(
				':thnpajak' => $TBLPENDATAAN_THNPAJAK
				,':blnpajak' => $TBLPENDATAAN_BLNPAJAK
				,':nopok' => $TBLDAFTAR_NOPOK
			);
			if ($this->cekPernahData($filter)) {
				#sudah pendataan
				$condition = '
				TBLPENDATAAN_THNPAJAK  = :thnpajak
				AND TBLPENDATAAN_BLNPAJAK  = :blnpajak
				AND TBLDAFTAR_NOPOK = :nopok
				';
				$simpan = Yii::app()->db->createCommand()->update('TBLDAFTTANAH', $arrayInsert, $condition, $filter);
			} else {
				#belum pendataan
				$simpan = $insert->insert('TBLDAFTTANAH', $arrayInsert);
			}
	
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
				'TBLPENDATAAN_TGLPAJAK' => $TBLDAFTTANAH_TGLPAJAK,
				'TBLPENDATAAN_PAJAKKE' => '0',
				'TBLDAFTTANAH_TGLSPTPD' => $exp_TGLSPTPD[0],
				'TBLDAFTTANAH_BLNSPTPD' => $exp_TGLSPTPD[1],
				'TBLDAFTTANAH_THNSPTPD' => substr($exp_TGLSPTPD[2], -2),
				'TBLDAFTAR_GOLONGAN' => $TBLDAFTTANAH_GOLONGAN,
				'TBLDAFTTANAH_NILAIAIR1' => LokalIndonesia::toAngka($TBLDAFTTANAH_NPA),
				'TBLDAFTTANAH_TGLMULAIJUAL' => $exp_TGLMULAIJUAL[0],
				'TBLDAFTTANAH_BLNMULAIJUAL' => $exp_TGLMULAIJUAL[1],
				'TBLDAFTTANAH_THNMULAIJUAL' => substr($exp_TGLMULAIJUAL[2], -2),
				'TBLDAFTTANAH_TGLAKHIRJUAL' => $exp_TGLAKHIRJUAL[0],
				'TBLDAFTTANAH_BLNAKHIRJUAL' => $exp_TGLAKHIRJUAL[1],
				'TBLDAFTTANAH_THNAKHIRJUAL' => substr($exp_TGLAKHIRJUAL[0], -2),
				'TBLDAFTTANAH_ISPEMBUKUAN' => $TBLDAFTTANAH_ISPEMBUKUAN,
				'TBLDAFTTANAH_ISKAS' => $TBLDAFTTANAH_ISKAS,
				'TBLDAFTTANAH_ISNOTA' => $TBLDAFTTANAH_ISNOTA,
				'TBLDAFTTANAH_BUNGASPTPD' => $TBLDAFTTANAH_BUNGASPTPD,
				'TBLDAFTTANAH_PERSENTARIF' => $TBLREKENING_PERSEN,
				'TBLDAFTTANAH_PAJAK' => LokalIndonesia::toAngka($TBLDAFTTANAH_PAJAK),
				// 'TBLDAFTTANAH_PAJAKSKPD' => LokalIndonesia::toAngka($TBLDAFTTANAH_PAJAK),
				// 'TBLDAFTTANAH_RUPIAHSETOR' => LokalIndonesia::toAngka($TBLDAFTTANAH_RUPIAHSETOR),
				'TBLDAFTTANAH_TGLTERIMA' => $exp_TGLTERIMA[0],
				'TBLDAFTTANAH_BLNTERIMA' => $exp_TGLTERIMA[1],
				'TBLDAFTTANAH_THNTERIMA' => substr($exp_TGLTERIMA[2], -2),
				'TBLDAFTTANAH_TGLBATASSPTPD' => $pecahtglbatasspt,
				'TBLDAFTTANAH_BLNBATASSPTPD' => $pecahbulanbatasspt,
				'TBLDAFTTANAH_THNBATASSPTPD' => $pecahthnbatasspt,
				'TBLDAFTTANAH_TGLENTRI' => $exp_TGLENTRI[0],
				'TBLDAFTTANAH_BLNENTRI' => $exp_TGLENTRI[1],
				'TBLDAFTTANAH_THNENTRI' => substr($exp_TGLENTRI[2], -2),
				'TBLDAFTTANAH_TOTALVOLUME' => $TBLDAFTTANAH_TOTALVOLUME,
				'TBLDAFTTANAH_ISJNSPENETAPAN' => $TBLDAFTTANAH_ISJNSPENETAPAN,
				'TBLDAFTAR_JNSPENDAPATAN' => 'P',
	
				'TBLDAFTTANAH_REKURUSAN' => '1',
				'TBLDAFTTANAH_REKPEMERINTAHAN' => '20',
				'TBLDAFTTANAH_REKORGANISASI' => '1',
				'TBLDAFTTANAH_REKPROGRAM' => '20',
				'TBLDAFTTANAH_REKKEGIATAN' => '26',
				'TBLDAFTTANAH_REKDINAS' => '0',
				'TBLDAFTTANAH_REKBIDANG' => '0',
				'TBLDAFTTANAH_REKPENDAPATAN' => '4',
				'TBLDAFTTANAH_REKPAD' => '1',
				'TBLDAFTTANAH_REKPAJAK' => '1',
				'TBLDAFTTANAH_REKAYAT' => '8',
				'TBLDAFTTANAH_REKJENIS' => '0',
				'TBLDAFTTANAH_REKSUBJENIS' => '0',
				
				'TBLDAFTAR_JNSPENDAPATAN' => 'P',
			);

			$simpan = $command->update('TBLDAFTTANAH', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPAJAK AND TBLPENDATAAN_BLNPAJAK =:BLNPAJAK',array(':NOPOK' => $TBLDAFTAR_NOPOK, ':THNPAJAK' =>substr($TBLPENDATAAN_THNPAJAK, -2), ':BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK));
			if ($simpan) {
				$res['status'] = 'update';
			}else{
				$res['status'] = 'failed';
			}
		 } else {
			echo CJSON::encode($res);
		 }
	}

	public function cekPernahData($filter=array())
	{
		$THNPAJAK = $filter[':thnpajak'];
		$BLNPAJAK = $filter[':blnpajak'];
		$NOPOKOK = $filter[':nopok'];
		return $cek = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTTANAH WHERE TBLPENDATAAN_THNPAJAK ='.$THNPAJAK.' AND TBLPENDATAAN_BLNPAJAK='.$BLNPAJAK.' AND TBLDAFTAR_NOPOK='.$NOPOKOK)->queryScalar();
	}
	
	public function actionCekPernahDaftar()
	{
		$NOPOKOK = $_REQUEST['nopokok'];
		$THNPAJAK = substr($_REQUEST['THNPAJAK'], -2);
		$BLNPAJAK = $_REQUEST['BLNPAJAK'];

		$cek = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTTANAH WHERE TBLPENDATAAN_THNPAJAK ='.$THNPAJAK.' AND TBLPENDATAAN_BLNPAJAK='.$BLNPAJAK.' AND TBLDAFTAR_NOPOK='.$NOPOKOK)->queryScalar();
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
		$data['BLNPAJAK'] = $_REQUEST['BLNPAJAK']+1;
		$data['KODEREK'] = $_REQUEST['KODEREK'];

		// $tglbatas = RefTGLBatas::model()->get($data['KODEREK'],$data['THNPAJAK'],$data['BLNPAJAK']);

		/*Tanggal Batas Pajak*/
		$data['TANGGAL'] = 15;
		$data['BULAN'] = $data['BLNPAJAK'];
		
		if (strlen($data['BULAN'])>1) {
			$data['BULAN'] = $data['BULAN'];
		}
		else{
			$data['BULAN'] = '0'.$data['BULAN'];
		}
		
		$data['TAHUN'] = '20'.$data['THNPAJAK'];

		$data['TGLBATASPAJAK'] = $data['TANGGAL'].'-'.$data['BULAN'].'-'.$data['TAHUN'];
		/*Tanggal Batas Pajak*/

		/*Tanggal Batas Bulan Ini*/
		$blnnow = date('m');
		$thnnow = date('Y');

		$data['TGLBATASBLNNOW'] = '15-'.$blnnow.'-'.$thnnow;

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