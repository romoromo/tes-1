<?php

class RestoranController extends Controller
{
	public function actionIndex()
	{
		$data['rek'] = TRekening::model()->getRekeningSubAktif('4110200');
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionautocompletewp()
	{
		$query = trim($_REQUEST['query']);

		$select = '*';
		$from = 'TNPWPD';
		$filter = array(
			'LK__TNPWPD_MILIKNAMA' => $query
			,'LK__TSUBYEK_BUNAMAMERK' => $query
			,'LK__TNPWPD_NPWPD' => $query
			,'LK__TNPWPD_NOPOK' => $query
		);

		$filter_AND = array(
			'LK__TREKENING_KODE' => '4110200'
			// ,'EQ__tblsubyek_jenisusaha' => $jenisusaha
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			 'leftJoin'=>array('TSUBYEK','TSUBYEK.TSUBYEK_ID=TNPWPD.TSUBYEK_ID')
			,'limit'=> 30
			,'order'=> 'TNPWPD_NPWPD ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$results = DBFetch::query($arrayConfig);

		$suggestions = array();
		 
		foreach($results as $result)
		{
			$suggestions[] = array(
			"value" => $result['TNPWPD_NOPOK']. ' | ' . $result['TNPWPD_NPWPD']. ' | ' . $result['TSUBYEK_BUNAMAMERK']. ' | ' . $result['TSUBYEK_MILIKNAMA']
			,"data" => $result['TNPWPD_ID']
			,"TSUBYEK_MILIKNAMA" => $result['TSUBYEK_MILIKNAMA']
			,"TSUBYEK_BUNAMAMERK" => $result['TSUBYEK_BUNAMAMERK']
			,"TNPWPD_NPWPD" => $result['TNPWPD_NPWPD']
			,"TSUBYEK_MILIKALAMAT" => $result['TSUBYEK_MILIKALAMAT']
			,"TSUBYEK_BUALAMAT" => $result['TSUBYEK_BUALAMAT']
			,"TNPWPD_NOPOK" => $result['TNPWPD_NOPOK']
			,"TREKENINGSUB_KODE" => $result['TREKENINGSUB_KODE']
		);
		}
		 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function actiongetdata()
	{
		$NOPOKOK = $_REQUEST['nopokok'];
		$THNPAJAK = substr($_REQUEST['THNPAJAK'], -2);
		$BLNPAJAK = (int) $_REQUEST['BLNPAJAK'];
		$jmlhari = cal_days_in_month(CAL_GREGORIAN,$BLNPAJAK,$THNPAJAK);

		//$model = Yii::app()->db->createCommand('SELECT * FROM TBLDAFTPARKIR WHERE TBLDAFTPARKIR_THNPAJAK ='.$THNPAJAK.' AND TBLDAFTPARKIR_BLNPAJAK='.$BLNPAJAK.' AND TBLDAFTPARKIR_NOPOK='.$NOPOKOK)->queryRow();

		$model = Yii::app()->db->createCommand()
				->select('*')
				->from('TNPWPD')
				->join('TSUBYEK', 'TNPWPD.TSUBYEK_ID = TSUBYEK.TSUBYEK_ID')
				->leftJoin('TREKENING', 'TNPWPD.TREKENINGSUB_KODE = TREKENING.TREKENING_KODE')
				->where('TNPWPD.TREKENING_KODE =:kode AND TNPWPD.TNPWPD_NOPOK=:nopok', array(':kode'=>'4110200', ':nopok'=>$NOPOKOK))
				->queryRow();
		$data['TSUBYEK_MILIKNAMA'] =$model['TSUBYEK_MILIKNAMA'];
		$data['TNPWPD_MILIKNAMA'] =$model['TNPWPD_MILIKNAMA'];
		$data['TSUBYEK_BUALAMAT'] =$model['TSUBYEK_BUALAMAT'];
		$data['TREKENING_NAMA'] =$model['TREKENING_NAMA'];
		$data['TREKENING_KODE'] =$model['TREKENING_KODE'];
		$data['TREKENING_TARIF'] =$model['TREKENING_TARIF'];
		$data['TNPWPD_MILIKJALAN'] =$model['TNPWPD_MILIKJALAN'];
		$data['TNPWPD_MILIKRTRWRK'] =$model['TNPWPD_MILIKRTRWRK'];
		$data['TSUBYEK_BUNAMAMERK'] =$model['TSUBYEK_BUNAMAMERK'];
		$data['TBLKECAMATAN_ID'] =$model['TBLKECAMATAN_ID'];
		$data['TBLKELURAHAN_ID'] =$model['TBLKELURAHAN_ID'];
		$data['TREKENINGSUB_KODE'] =$model['TREKENINGSUB_KODE'];
		$data['TREKENING_TARIF'] =$model['TREKENING_TARIF'];
		$data['JUMLAH_HARI'] = $jmlhari-1;
		$data['AWAL_PAJAK'] = '01-'.$bulan.'-'.date('Y');
		if ($bulan=='02') {
			$data['AKHIR_PAJAK'] = $jmlhari.'-'.$bulan.'-'.date('Y');
		}else{
			$data['AKHIR_PAJAK'] = $jmlhari.'-'.$bulan.'-'.date('Y');
		}

		//set bunga persen untuk denda
		$tglbatas = '2017-02-14';
		$tglbatasbulanini = '2017-07-14';
		//$tglentry = date('Y-m-d');

		$bulan_denda = date('m') - date('m', strtotime($tglbatas));
		$data['BULAN_DENDA'] = $bulan_denda;
		$data['PERSEN_DENDA'] = $bulan_denda*2;
		if (date('d')>date('d', strtotime($tglbatas))) {
			$data['BULAN_DENDA'] = $bulan_denda+1;
			$data['PERSEN_DENDA'] = $data['BULAN_DENDA']*2;
		}

		echo CJSON::encode($data);
	}

	public function actionCekPernahDaftar()
	{
		$NOPOKOK = $_REQUEST['nopokok'];
		$THNPAJAK = substr($_REQUEST['THNPAJAK'], -2);
		$BLNPAJAK = $_REQUEST['BLNPAJAK'];

		$cek = Yii::app()->db->createCommand('SELECT COUNT(TBLDAFTRMAKAN_THNPAJAK) AS JML FROM TBLDAFTRMAKAN WHERE TBLDAFTRMAKAN_THNPAJAK ='.$THNPAJAK.' AND TBLDAFTRMAKAN_BLNPAJAK='.$BLNPAJAK.' AND TBLDAFTRMAKAN_NOPOK='.$NOPOKOK)->queryScalar();
		if ($cek) {
			echo CJSON::encode(array('status'=>'sudah'));
		}
		else{
			echo CJSON::encode(array('status'=>'belum'));
		}
	}

	public function actionGetKodeRek()
	{
		$kodesubrek = $_REQUEST['kodesubrek'];
		$data = TRekening::model()->find('TREKENING_KODE=:kode', array(':kode'=>$kodesubrek));

		echo CJSON::encode($data);
	}

	public function actionGetTGLBatas()
	{
		$data['THNPAJAK'] = substr($_REQUEST['THNPAJAK'],-2);
		$data['BLNPAJAK'] = $_REQUEST['BLNPAJAK']+1;
		$data['KODEREK'] = $_REQUEST['KODEREK'];

		$cektglbatas = Yii::app()->db->createCommand()
		->select('REFTGLBATAS_TANGGAL,
			REFTGLBATAS_BULAN,
			REFTGLBATAS_TAHUN,
			REFTGLBATAS_JENISREK')
		->from('REFTGLBATAS')
		->where('REFTGLBATAS_BULAN=:BLN AND REFTGLBATAS_TAHUN=:THN AND REFTGLBATAS_JENISREK=:JNS',array(':BLN'=>$data['BLNPAJAK'],':THN'=>$data['THNPAJAK'],':JNS'=>$data['KODEREK']))
		->queryRow();

		/*Tanggal Batas Pajak*/
		$data['TANGGAL'] = $cektglbatas['REFTGLBATAS_TANGGAL'];
		
		if (strlen($data['BULAN'])>1) {
			$data['BULAN'] = $cektglbatas['REFTGLBATAS_BULAN'];
		}
		else{
			$data['BULAN'] = '0'.$cektglbatas['REFTGLBATAS_BULAN'];
		}
		
		$data['TAHUN'] = '20'.$cektglbatas['REFTGLBATAS_TAHUN'];

		$data['TGLBATASPAJAK'] = $data['TANGGAL'].'-'.$data['BULAN'].'-'.$data['TAHUN'];
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

	public function actionsimpanPendataan()
	{
		Yii::import('ext.LokalIndonesia');

		$TBLDAFTRMAKAN_NOPOK = isset($_REQUEST['TBLDAFTRMAKAN_NOPOK']) && !empty($_REQUEST['TBLDAFTRMAKAN_NOPOK']) ? $_REQUEST['TBLDAFTRMAKAN_NOPOK'] : 0;
		$oby = TNPWPD::model()->find('TNPWPD_NOPOK=:no', array(':no'=>$TBLDAFTRMAKAN_NOPOK));
		$TBLDAFTRMAKAN_THNPAJAK = isset($_REQUEST['TBLDAFTRMAKAN_THNPAJAK']) && !empty($_REQUEST['TBLDAFTRMAKAN_THNPAJAK']) ? $_REQUEST['TBLDAFTRMAKAN_THNPAJAK'] : 0;
		$TBLDAFTRMAKAN_BLNPAJAK = isset($_REQUEST['TBLDAFTRMAKAN_BLNPAJAK']) && !empty($_REQUEST['TBLDAFTRMAKAN_BLNPAJAK']) ? $_REQUEST['TBLDAFTRMAKAN_BLNPAJAK'] : 0;
		$TBLDAFTRMAKAN_TGLPAJAK = isset($_REQUEST['TBLDAFTRMAKAN_TGLPAJAK']) && !empty($_REQUEST['TBLDAFTRMAKAN_TGLPAJAK']) ? $_REQUEST['TBLDAFTRMAKAN_TGLPAJAK'] : 0;
		$TBLDAFTRMAKAN_TGLSPTPD = isset($_REQUEST['TBLDAFTRMAKAN_TGLSPTPD']) && !empty($_REQUEST['TBLDAFTRMAKAN_TGLSPTPD']) ? $_REQUEST['TBLDAFTRMAKAN_TGLSPTPD'] : 0;
		//$TBLDAFTRMAKAN_PENJUALANHARI = isset($_REQUEST['TBLDAFTRMAKAN_PENJUALANHARI']) && !empty($_REQUEST['TBLDAFTRMAKAN_PENJUALANHARI']) ? $_REQUEST['TBLDAFTRMAKAN_PENJUALANHARI'] : 0;
		$TBLDAFTRMAKAN_JUMLAHHARIJUAL = isset($_REQUEST['TBLDAFTRMAKAN_JUMLAHHARIJUAL']) && !empty($_REQUEST['TBLDAFTRMAKAN_JUMLAHHARIJUAL']) ? $_REQUEST['TBLDAFTRMAKAN_JUMLAHHARIJUAL'] : 0;
		$TBLDAFTRMAKAN_OMSETPAJAK = isset($_REQUEST['TBLDAFTRMAKAN_OMSETPAJAK']) && !empty($_REQUEST['TBLDAFTRMAKAN_OMSETPAJAK']) ? $_REQUEST['TBLDAFTRMAKAN_OMSETPAJAK'] : 0;
		$TBLDAFTRMAKAN_TGLMULAIJUAL = isset($_REQUEST['TBLDAFTRMAKAN_TGLMULAIJUAL']) && !empty($_REQUEST['TBLDAFTRMAKAN_TGLMULAIJUAL']) ? $_REQUEST['TBLDAFTRMAKAN_TGLMULAIJUAL'] : 0;
		$TBLDAFTRMAKAN_TGLAKHIRJUAL = isset($_REQUEST['TBLDAFTRMAKAN_TGLAKHIRJUAL']) && !empty($_REQUEST['TBLDAFTRMAKAN_TGLAKHIRJUAL']) ? $_REQUEST['TBLDAFTRMAKAN_TGLAKHIRJUAL'] : 0;
		$TBLDAFTRMAKAN_ISPEMBUKUAN = isset($_REQUEST['TBLDAFTRMAKAN_ISPEMBUKUAN']) && !empty($_REQUEST['TBLDAFTRMAKAN_ISPEMBUKUAN']) ? $_REQUEST['TBLDAFTRMAKAN_ISPEMBUKUAN'] : 0;
		$TBLDAFTRMAKAN_ISKAS = isset($_REQUEST['TBLDAFTRMAKAN_ISKAS']) && !empty($_REQUEST['TBLDAFTRMAKAN_ISKAS']) ? $_REQUEST['TBLDAFTRMAKAN_ISKAS'] : 0;
		$TBLDAFTRMAKAN_ISNOTA = isset($_REQUEST['TBLDAFTRMAKAN_ISNOTA']) && !empty($_REQUEST['TBLDAFTRMAKAN_ISNOTA']) ? $_REQUEST['TBLDAFTRMAKAN_ISNOTA'] : 0;
		$TBLDAFTRMAKAN_PAJAK = isset($_REQUEST['TBLDAFTRMAKAN_PAJAK']) && !empty($_REQUEST['TBLDAFTRMAKAN_PAJAK']) ? $_REQUEST['TBLDAFTRMAKAN_PAJAK'] : 0;
		$TBLDAFTRMAKAN_BUNGASPTPD = isset($_REQUEST['TBLDAFTRMAKAN_BUNGASPTPD']) && !empty($_REQUEST['TBLDAFTRMAKAN_BUNGASPTPD']) ? $_REQUEST['TBLDAFTRMAKAN_BUNGASPTPD'] : 0;
		$TBLDAFTRMAKAN_RUPIAHSETOR = isset($_REQUEST['TBLDAFTRMAKAN_RUPIAHSETOR']) && !empty($_REQUEST['TBLDAFTRMAKAN_RUPIAHSETOR']) ? $_REQUEST['TBLDAFTRMAKAN_RUPIAHSETOR'] : 0;
		$TBLDAFTRMAKAN_TGLTERIMA = isset($_REQUEST['TBLDAFTRMAKAN_TGLTERIMA']) && !empty($_REQUEST['TBLDAFTRMAKAN_TGLTERIMA']) ? $_REQUEST['TBLDAFTRMAKAN_TGLTERIMA'] : 0;
		$TBLDAFTRMAKAN_TGLBATASSPTPD = isset($_REQUEST['TBLDAFTRMAKAN_TGLBATASSPTPD']) && !empty($_REQUEST['TBLDAFTRMAKAN_TGLBATASSPTPD']) ? $_REQUEST['TBLDAFTRMAKAN_TGLBATASSPTPD'] : 0;
		$TBLDAFTRMAKAN_TGLENTRI = isset($_REQUEST['TBLDAFTRMAKAN_TGLENTRI']) && !empty($_REQUEST['TBLDAFTRMAKAN_TGLENTRI']) ? $_REQUEST['TBLDAFTRMAKAN_TGLENTRI'] : 0;
		$TBLKECAMATAN_ID = isset($_REQUEST['idkecamatan']) && !empty($_REQUEST['idkecamatan']) ? $_REQUEST['idkecamatan'] : 0;
		$TBLKELURAHAN_ID = isset($_REQUEST['idkelurahan']) && !empty($_REQUEST['idkelurahan']) ? $_REQUEST['idkelurahan'] : 0;
		
		$exp_TGLSPTPD = explode('-', $TBLDAFTRMAKAN_TGLSPTPD);
		$exp_TGLMULAIJUAL = explode('-', $TBLDAFTRMAKAN_TGLMULAIJUAL);
		$exp_TGLAKHIRJUAL = explode('-', $TBLDAFTRMAKAN_TGLAKHIRJUAL);
		$exp_TGLTERIMA = explode('-', $TBLDAFTRMAKAN_TGLTERIMA);
		$exp_TGLBATASSPTPD = explode('-', $TBLDAFTRMAKAN_TGLBATASSPTPD);
		$exp_TGLENTRI = explode('-', $TBLDAFTRMAKAN_TGLENTRI);

		
		$insert = Yii::app()->db->createCommand();
		$arrayOfData = array(
			'TBLDAFTRMAKAN_NOPOK' => $TBLDAFTRMAKAN_NOPOK,
			'TBLKECAMATAN_ID' => $TBLKECAMATAN_ID,
			'TBLKELURAHAN_ID' => $TBLKELURAHAN_ID,
			'TBLDAFTRMAKAN_THNPAJAK' => substr($TBLDAFTRMAKAN_THNPAJAK, -2),
			'TBLDAFTRMAKAN_BLNPAJAK' => $TBLDAFTRMAKAN_BLNPAJAK,
			'TBLDAFTRMAKAN_TGLPAJAK' => $TBLDAFTRMAKAN_TGLPAJAK,
			'TBLDAFTRMAKAN_TGLSPTPD' => isset($exp_TGLSPTPD[0]) ? $exp_TGLSPTPD[0] : '',
			'TBLDAFTRMAKAN_BLNSPTPD' => isset($exp_TGLSPTPD[1]) ? $exp_TGLSPTPD[1] : '',
			'TBLDAFTRMAKAN_THNSPTPD' =>isset($exp_TGLSPTPD[2]) ?  substr($exp_TGLSPTPD[2], -2) : '',
			'TBLDAFTRMAKAN_GOLONGAN' => 4,
			//'TBLDAFTRMAKAN_PENJUALANHARI' => LokalIndonesia::toAngka($TBLDAFTRMAKAN_PENJUALANHARI),
			'TBLDAFTRMAKAN_JUMLAHHARIJUAL' => LokalIndonesia::toAngka($TBLDAFTRMAKAN_JUMLAHHARIJUAL),
			'TBLDAFTRMAKAN_OMSETPAJAK' => LokalIndonesia::toAngka($TBLDAFTRMAKAN_OMSETPAJAK),
			'TBLDAFTRMAKAN_TGLMULAIJUAL' => isset($exp_TGLMULAIJUAL[0]) ? $exp_TGLMULAIJUAL[0] : '',
			'TBLDAFTRMAKAN_BLNMULAIJUAL' => isset($exp_TGLMULAIJUAL[1]) ? $exp_TGLMULAIJUAL[1] : '',
			'TBLDAFTRMAKAN_THNMULAIJUAL' =>isset($exp_TGLMULAIJUAL[2]) ?  substr($exp_TGLMULAIJUAL[2], -2) : '',
			'TBLDAFTRMAKAN_TGLAKHIRJUAL' => isset($exp_TGLAKHIRJUAL[0]) ? $exp_TGLAKHIRJUAL[0] : '',
			'TBLDAFTRMAKAN_BLNAKHIRJUAL' => isset($exp_TGLAKHIRJUAL[1]) ? $exp_TGLAKHIRJUAL[1] : '',
			'TBLDAFTRMAKAN_THNAKHIRJUAL' =>isset($exp_TGLAKHIRJUAL[0]) ?  substr($exp_TGLAKHIRJUAL[0], -2) : '',
			'TBLDAFTRMAKAN_ISPEMBUKUAN' => $TBLDAFTRMAKAN_ISPEMBUKUAN,
			'TBLDAFTRMAKAN_ISKAS' => $TBLDAFTRMAKAN_ISKAS,
			'TBLDAFTRMAKAN_ISNOTA' => $TBLDAFTRMAKAN_ISNOTA,
			'TBLDAFTRMAKAN_PAJAK' => LokalIndonesia::toAngka($TBLDAFTRMAKAN_PAJAK),
			'TBLDAFTRMAKAN_BUNGASPTPD' => $TBLDAFTRMAKAN_BUNGASPTPD,
			'TBLDAFTRMAKAN_RUPIAHSETOR' => LokalIndonesia::toAngka($TBLDAFTRMAKAN_RUPIAHSETOR),
			'TBLDAFTRMAKAN_TGLTERIMA' => isset($exp_TGLTERIMA[0]) ? $exp_TGLTERIMA[0] : '',
			'TBLDAFTRMAKAN_BLNTERIMA' => isset($exp_TGLTERIMA[1]) ? $exp_TGLTERIMA[1] : '',
			'TBLDAFTRMAKAN_THNTERIMA' =>isset($exp_TGLTERIMA[2]) ?  substr($exp_TGLTERIMA[2], -2) : '',
			'TBLDAFTRMAKAN_TGLBATASSPTPD' => isset($exp_TGLBATASSPTPD[0]) ? $exp_TGLBATASSPTPD[0] : '',
			'TBLDAFTRMAKAN_BLNBATASSPTPD' => isset($exp_TGLBATASSPTPD[1]) ? $exp_TGLBATASSPTPD[1] : '',
			'TBLDAFTRMAKAN_THNBATASSPTPD' =>isset($exp_TGLBATASSPTPD[2]) ?  substr($exp_TGLBATASSPTPD[2], -2) : '',
			'TBLDAFTRMAKAN_TGLENTRI' => isset($exp_TGLENTRI[0]) ? $exp_TGLENTRI[0] : '',
			'TBLDAFTRMAKAN_BLNENTRI' => isset($exp_TGLENTRI[1]) ? $exp_TGLENTRI[1] : '',
			'TBLDAFTRMAKAN_THNENTRI' =>isset($exp_TGLENTRI[2]) ?  substr($exp_TGLENTRI[2], -2) : ''
		);
		echo CJSON::encode($arrayOfData);Yii::app()->end();
		$simpan = $insert->insert('TBLDAFTRMAKAN', $arrayOfData);

		if ($simpan>0) {
			echo CJSON::encode(array('status'=>'success'));
		}
		else{
			echo CJSON::encode(array('status'=>'failed'));
		}
	}
}