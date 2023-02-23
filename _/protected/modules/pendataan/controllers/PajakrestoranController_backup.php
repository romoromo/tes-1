<?php

class PajakrestoranController extends Controller
{
	var $KODE_GOL = 3;
	var $PAJAK_AYAT = 2;
	var $PAJAK_REK = '4.1.1.2.0';
	var $MODULE_URL = 'pendataan/pajakrestoran';
	public function actionIndex()
	{
		// $data['sub_rek'] = TRekening::model()->getRekeningSubAktif('4110100');
		
		$data['sub_rek'] = Yii::app()->db->createCommand("
		SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.2.%'
		ORDER BY TBLREKENING_KODE
		")
		->queryAll();
		
		$this->renderPartial('index', array('data'=>$data));
	}
	public function actiongetdata()
	{
		$NOPOK = trim($_POST['nomor_pajak']);
		$bulan = (int)trim($_POST['bulan']);
		$tahun = trim($_POST['tahun']);
		$data = array();
		$cek = $this->cekPernahDaftar(substr($tahun, -2), $bulan, $NOPOK);
		if ($cek>0) {
			$data['data'] = 'ada';
		}else{
			$data['data'] = 'tidak';
		}
		$jmlhari = cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun);
		
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
			'EQ__TBLDAFTAR_NOPOK' => $NOPOK
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
		$tglbatas = RefTGLBatas::model()->get($this->PAJAK_REK, $thnbatas, $blnbatas);
		$tglbatasbulanini = RefTGLBatas::model()->get($this->PAJAK_REK, substr(date('Y'),-2), date('n'));
		//$tglentry = date('Y-m-d');

		$bulan_denda = date('m') - date('m', strtotime($tglbatas));
		$data['TGL_BATAS'] = $tglbatas . '-' .($blnbatas<10 ? '0'.$blnbatas : $blnbatas) . '-' . $tahun;
		$data['BULAN_DENDA'] = $bulan_denda;
		$data['PERSEN_DENDA'] = $bulan_denda*2;
		if (date('d')>date('d', strtotime($tglbatas))) {
			$data['BULAN_DENDA'] = $bulan_denda+1;
			$data['PERSEN_DENDA'] = $data['BULAN_DENDA']*2;
		}
		echo CJSON::encode($data);
	}
	public function actionautocompletewp()
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
		REFBADANUSAHA.REKENING_KODE
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
			// ,'EQ__tblsubyek_isaktif' => "T"
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
			);
		}

		 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}
	public function actionsimpandata()
	{
		$bulan_pajak = trim($_POST['bulan_pajak']);
		$tahun_pajak = trim($_POST['tahun_pajak']);
		$tanggal_pajak = trim($_POST['tanggal_pajak']);
		$nopokok = trim($_POST['nopokok']);
		$wp_input_tgl_spt = trim($_POST['wp_input_tgl_spt']);
		$hit_penjualanhari = trim($_POST['hit_penjualanhari']);
		$hit_jumlahhari = trim($_POST['hit_jumlahhari']);
		$hit_penjualanbulan = trim($_POST['hit_penjualanbulan']);
		$hit_keringanan = trim($_POST['hit_keringanan']);
		$hit_tanggalawal = trim($_POST['hit_tanggalawal']);
		$hit_tanggalakhir = trim($_POST['hit_tanggalakhir']);
		$hit_pajak = trim($_POST['hit_pajak']);
		$hit_bungaspt = trim($_POST['hit_bungaspt']);
		$hit_totalsetor = trim($_POST['hit_totalsetor']);
		$hit_tglterimaspt = trim($_POST['hit_tglterimaspt']);
		$hit_tglbatasspt = trim($_POST['hit_tglbatasspt']);
		$hit_tglentryspt = trim($_POST['hit_tglentryspt']);
		$hit_carapenghitungan = trim($_POST['hit_carapenghitungan']);
		$kecamatan_pajak = trim($_POST['kecamatan_pajak']);
		$kelurahan_pajak = trim($_POST['kelurahan_pajak']);
		
		$refbadanusaha_rekpendapatan = trim($_POST['refbadanusaha_rekpendapatan']);
		$refbadanusaha_rekpad = trim($_POST['refbadanusaha_rekpad']);
		$refbadanusaha_rekpjk = trim($_POST['refbadanusaha_rekpjk']);
		$refbadanusaha_rekayat = trim($_POST['refbadanusaha_rekayat']);
		$refbadanusaha_rekjenis = trim($_POST['refbadanusaha_rekjenis']);
		//$is_kas = trim($_POST['is_kas']);
		//$is_nota = trim($_POST['is_nota']);
		//$is_pembukuan = trim($_POST['is_pembukuan']);
		$is_lhp = trim($_POST['is_lhp']);
		$is_notabil = trim($_POST['is_notabil']);
		$tarif_rekening = trim($_POST['tarif_rekening']);
		$omzet = 0;

		//$arr_koderekening_sub =  str_split($koderekening_sub);
		$arr_tglawal = explode('-', $hit_tanggalawal);
		$arr_tglakhir = explode('-', $hit_tanggalakhir);
		$arr_tglsptpd = explode('-', $wp_input_tgl_spt);
		$arr_tglterimasptpd = explode('-', $hit_tglterimaspt);
		$arr_tglbatassptpd = explode('-', $hit_tglbatasspt);
		$arr_tglentrisptpd = explode('-', $hit_tglentryspt);

		if ($hit_penjualanhari!=0) {
			$omzet = $hit_penjualanhari*$hit_jumlahhari;
		}else{
			$omzet = $hit_penjualanbulan;
		}

		$res = array();
		$cek = $this->cekPernahDaftar(substr($tahun_pajak, -2), $bulan_pajak, $nopokok);
		if ($cek>0) {
			$res['data'] = 'ada';
		}else{
			$res['data'] = 'tidak';
			$insert = Yii::app()->db->createCommand();
			$simpan = $insert->insert('TBLDAFTRMAKAN', array(
					    'TBLPENDATAAN_THNPAJAK'=>substr($tahun_pajak, -2)
					    ,'TBLPENDATAAN_BLNPAJAK'=>$bulan_pajak
					    ,'TBLPENDATAAN_TGLPAJAK'=>$tanggal_pajak
					    ,'TBLDAFTAR_NOPOK'=>$nopokok
					    ,'TBLDAFTAR_JNSPENDAPATAN'=>'P'
					    ,'TBLDAFTAR_GOLONGAN'=>$this->KODE_GOL
					    ,'TBLDAFTRMAKAN_REKURUSAN'=>1
					    ,'TBLDAFTRMAKAN_REKPEMERINTAHAN'=>20
					    ,'TBLDAFTRMAKAN_REKORGANISASI'=>1
					    ,'TBLDAFTRMAKAN_REKPROGRAM'=>20
					    ,'TBLDAFTRMAKAN_REKKEGIATAN'=>26
					    ,'TBLDAFTRMAKAN_REKDINAS'=>0
					    ,'TBLDAFTRMAKAN_REKBIDANG'=>0
					    ,'TBLDAFTRMAKAN_REKPENDAPATAN'=>$refbadanusaha_rekpendapatan
					    ,'TBLDAFTRMAKAN_REKPAD'=>$refbadanusaha_rekpad
					    ,'TBLDAFTRMAKAN_REKPAJAK'=>$refbadanusaha_rekpjk
					    ,'TBLDAFTRMAKAN_REKAYAT'=>$refbadanusaha_rekayat
					    ,'TBLDAFTRMAKAN_REKJENIS'=>$refbadanusaha_rekjenis
					    //,'TBLDAFTRMAKAN_ISKAS'=>$is_kas
					    //,'TBLDAFTRMAKAN_ISPEMBUKUAN'=>$is_pembukuan
					    // /,'TBLDAFTRMAKAN_ISNOTA'=>$is_nota
					    ,'TBLDAFTRMAKAN_ISLHP'=>$is_lhp
					    ,'TBLDAFTRMAKAN_ISNOTABIL'=>$is_notabil
					    ,'TBLDAFTRMAKAN_ISJNSPENETAPAN'=>$hit_carapenghitungan
					    ,'TBLDAFTRMAKAN_THNMULAIJUAL'=>substr($arr_tglawal[2], -2)
					    ,'TBLDAFTRMAKAN_BLNMULAIJUAL'=>$arr_tglawal[1]
					    ,'TBLDAFTRMAKAN_TGLMULAIJUAL'=>$arr_tglawal[0]
					    ,'TBLDAFTRMAKAN_THNAKHIRJUAL'=>substr($arr_tglakhir[2], -2)
					    ,'TBLDAFTRMAKAN_BLNAKHIRJUAL'=>$arr_tglakhir[1]
					    ,'TBLDAFTRMAKAN_TGLAKHIRJUAL'=>$arr_tglakhir[0]
					    ,'TBLDAFTRMAKAN_JUMLAHHARIJUAL'=>$hit_jumlahhari
					    ,'TBLDAFTRMAKAN_OMSETPAJAK'=>$omzet
					    ,'TBLDAFTRMAKAN_PERSENTARIF'=>$tarif_rekening
					    ,'TBLDAFTRMAKAN_PAJAK'=>$hit_totalsetor
					    ,'TBLDAFTRMAKAN_THNSPTPD'=>isset($arr_tglsptpd[2]) ? substr($arr_tglsptpd[2], -2) : ''
					    ,'TBLDAFTRMAKAN_BLNSPTPD'=>isset($arr_tglsptpd[1]) ? $arr_tglsptpd[1] : ''
					    ,'TBLDAFTRMAKAN_TGLSPTPD'=>isset($arr_tglsptpd[0]) ? $arr_tglsptpd[0] : ''
					    ,'TBLDAFTRMAKAN_THNBATASSPTPD'=>substr($arr_tglterimasptpd[2],-2)
					    ,'TBLDAFTRMAKAN_BLNBATASSPTPD'=>$arr_tglterimasptpd[1]
					    ,'TBLDAFTRMAKAN_TGLBATASSPTPD'=>$arr_tglterimasptpd[0]
					    ,'TBLDAFTRMAKAN_THNTERIMA'=>substr($arr_tglbatassptpd[2],-2)
					    ,'TBLDAFTRMAKAN_BLNTERIMA'=>$arr_tglbatassptpd[1]
					    ,'TBLDAFTRMAKAN_TGLTERIMA'=>$arr_tglbatassptpd[0]
					    ,'TBLDAFTRMAKAN_THNENTRI'=>substr($arr_tglentrisptpd[2],-2)
					    ,'TBLDAFTRMAKAN_BLNENTRI'=>$arr_tglentrisptpd[1]
					    ,'TBLDAFTRMAKAN_TGLENTRI'=>$arr_tglentrisptpd[0]
					    ,'TBLDAFTRMAKAN_BUNGASPTPD'=>$hit_bungaspt
					));
			if ($simpan) {
				$res['status'] = 'success';
			}else{
				$res['status'] = 'failed';
			}
		}
		echo CJSON::encode($res);
	}
	public function cekPernahDaftar($thn, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTRMAKAN WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;
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