<?php

class PajakrestoranController extends Controller
{
	var $KODE_GOL = 3;
	var $PAJAK_AYAT = 2;
	var $PAJAK_REK = '4.1.1.2.0';
	public function actionIndex()
	{
		// $data['sub_rek'] = TRekening::model()->getRekeningSubAktif('4110100');
		/*SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.1.%'
		ORDER BY TBLREKENING_KODE*/
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
		$tanggal = (int)trim($_POST['tanggal']);
		$tahun = trim($_POST['tahun']);
		$thn = substr($tahun, -2);
		$data = array();
		$cek = $this->cekPernahDaftar(substr($tahun, -2), $bulan, $tanggal, $NOPOK);
		$proses = $this->cekProses(substr($tahun, -2), $bulan, $tanggal, $NOPOK);

		if ($proses != '') {
			$data['data'] = 'proses selanjutnya';	
		} elseif ($cek>0) {
			$data['data'] = 'ada';

			$select = "
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		REFBADANUSAHA.REKENING_KODE,
		REFBADANUSAHA.REFBADANUSAHA_REKPENDAPATAN,
		REFBADANUSAHA.REFBADANUSAHA_REKPAD,
		REFBADANUSAHA.REFBADANUSAHA_REKPJK,
		REFBADANUSAHA.REFBADANUSAHA_REKAYAT,
		REFBADANUSAHA.REFBADANUSAHA_REKJENIS,
		REFBADANUSAHA.REFBADANUSAHA_PERSEN,
		NVL(TBLDAFTRMAKAN.TBLPENDATAAN_THNPAJAK,0) AS TBLPENDATAAN_THNPAJAK,
		NVL(TBLDAFTRMAKAN.TBLPENDATAAN_BLNPAJAK,0) AS TBLPENDATAAN_BLNPAJAK,
		NVL(TBLDAFTRMAKAN.TBLDAFTRMAKAN_OMSETPAJAK,0) AS TBLDAFTRMAKAN_OMSETPAJAK,
		NVL(TBLDAFTRMAKAN.TBLDAFTRMAKAN_PAJAK,0) AS TBLDAFTRMAKAN_PAJAK,
		NVL(TBLDAFTRMAKAN.TBLDAFTRMAKAN_BUNGASPTPD,0) AS TBLDAFTRMAKAN_BUNGASPTPD,
		NVL(TBLDAFTRMAKAN.TBLDAFTRMAKAN_THNSPTPD,0) AS TBLDAFTRMAKAN_THNSPTPD,
		NVL(TBLDAFTRMAKAN.TBLDAFTRMAKAN_BLNSPTPD,0) AS TBLDAFTRMAKAN_BLNSPTPD,
		NVL(TBLDAFTRMAKAN.TBLDAFTRMAKAN_TGLSPTPD,0) AS TBLDAFTRMAKAN_TGLSPTPD,
		NVL(TBLDAFTRMAKAN.TBLDAFTRMAKAN_THNBATASSPTPD,0) AS TBLDAFTRMAKAN_THNBATASSPTPD,
		NVL(TBLDAFTRMAKAN.TBLDAFTRMAKAN_BLNBATASSPTPD,0) AS TBLDAFTRMAKAN_BLNBATASSPTPD,
		NVL(TBLDAFTRMAKAN.TBLDAFTRMAKAN_TGLBATASSPTPD,0) AS TBLDAFTRMAKAN_TGLBATASSPTPD,
		NVL(TBLDAFTRMAKAN.TBLDAFTRMAKAN_THNTERIMA,0) AS TBLDAFTRMAKAN_THNTERIMA,
		NVL(TBLDAFTRMAKAN.TBLDAFTRMAKAN_BLNTERIMA,0) AS TBLDAFTRMAKAN_BLNTERIMA,
		NVL(TBLDAFTRMAKAN.TBLDAFTRMAKAN_TGLTERIMA,0) AS TBLDAFTRMAKAN_TGLTERIMA,
		NVL(TBLDAFTRMAKAN.TBLDAFTRMAKAN_THNENTRI,0) AS TBLDAFTRMAKAN_THNENTRI,
		NVL(TBLDAFTRMAKAN.TBLDAFTRMAKAN_BLNENTRI,0) AS TBLDAFTRMAKAN_BLNENTRI,
		NVL(TBLDAFTRMAKAN.TBLDAFTRMAKAN_TGLENTRI,0) AS TBLDAFTRMAKAN_TGLENTRI
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $NOPOK
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,'EQ__TBLDAFTRMAKAN.TBLPENDATAAN_THNPAJAK' => $thn
			,'EQ__TBLDAFTRMAKAN.TBLPENDATAAN_BLNPAJAK' => $bulan
			,'EQ__TBLDAFTRMAKAN.TBLPENDATAAN_TGLPAJAK' => $tanggal
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID = TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'join_2'=> array('TBLDAFTRMAKAN', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTRMAKAN.TBLDAFTAR_NOPOK')
			,'order'=> 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC'
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

		$data['TBLKECAMATAN_IDBADANUSAHA'] =$model['TBLKECAMATAN_IDBADANUSAHA'];
		$data['TBLKELURAHAN_IDBADANUSAHA'] =$model['TBLKELURAHAN_IDBADANUSAHA'];

		$data['TBLDAFTRMAKAN_OMSETPAJAK'] =$model['TBLDAFTRMAKAN_OMSETPAJAK'];
		$data['TBLDAFTRMAKAN_PAJAK'] =$model['TBLDAFTRMAKAN_PAJAK'];
		$data['TBLDAFTRMAKAN_BUNGASPTPD'] =$model['TBLDAFTRMAKAN_BUNGASPTPD'];

		$data['TBLDAFTRMAKAN_THNSPTPD'] =$model['TBLDAFTRMAKAN_THNSPTPD'];
		$data['TBLDAFTRMAKAN_BLNSPTPD'] =$model['TBLDAFTRMAKAN_BLNSPTPD'];
		$data['TBLDAFTRMAKAN_TGLSPTPD'] =$model['TBLDAFTRMAKAN_TGLSPTPD'];

		$data['TBLDAFTRMAKAN_THNBATASSPTPD'] =$model['TBLDAFTRMAKAN_THNBATASSPTPD'];
		$data['TBLDAFTRMAKAN_BLNBATASSPTPD'] =$model['TBLDAFTRMAKAN_BLNBATASSPTPD'];
		$data['TBLDAFTRMAKAN_TGLBATASSPTPD'] =$model['TBLDAFTRMAKAN_TGLBATASSPTPD'];

		$data['TBLDAFTRMAKAN_THNTERIMA'] =$model['TBLDAFTRMAKAN_THNTERIMA'];
		$data['TBLDAFTRMAKAN_BLNTERIMA'] =$model['TBLDAFTRMAKAN_BLNTERIMA'];
		$data['TBLDAFTRMAKAN_TGLTERIMA'] =$model['TBLDAFTRMAKAN_TGLTERIMA'];
		
		$data['TBLDAFTRMAKAN_THNENTRI'] =$model['TBLDAFTRMAKAN_THNENTRI'];
		$data['TBLDAFTRMAKAN_BLNENTRI'] =$model['TBLDAFTRMAKAN_BLNENTRI'];
		$data['TBLDAFTRMAKAN_TGLENTRI'] =$model['TBLDAFTRMAKAN_TGLENTRI'];

		} else {
			$data['data'] = 'tidak';

			$select = "
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
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

		$data['TBLKECAMATAN_IDBADANUSAHA'] =$model['TBLKECAMATAN_IDBADANUSAHA'];
		$data['TBLKELURAHAN_IDBADANUSAHA'] =$model['TBLKELURAHAN_IDBADANUSAHA'];
		
		$data['REFBADANUSAHA_REKPENDAPATAN'] =$model['REFBADANUSAHA_REKPENDAPATAN'];
		$data['REFBADANUSAHA_REKPAD'] =$model['REFBADANUSAHA_REKPAD'];
		$data['REFBADANUSAHA_REKPJK'] =$model['REFBADANUSAHA_REKPJK'];
		$data['REFBADANUSAHA_REKAYAT'] =$model['REFBADANUSAHA_REKAYAT'];
		$data['REFBADANUSAHA_REKJENIS'] =$model['REFBADANUSAHA_REKJENIS'];

		}
		// $jmlhari = cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun);
		$jmlhari = 30;
		
		$data['JUMLAH_HARI'] = $jmlhari-1;
		$data['AWAL_PAJAK'] = '01-'.$bulan.'-'.$tahun;
		if ($bulan=='02') {
			$data['AKHIR_PAJAK'] = $jmlhari.'-'.$bulan.'-'.$tahun;
		}else{
			$data['AKHIR_PAJAK'] = $jmlhari.'-'.$bulan.'-'.$tahun;
		}

		//set bunga persen untuk denda
		if ($bulan==12) {
			$thnbatas = substr($tahun,-2)+1;
			$blnbatas = '1';
		}else{
			$thnbatas = substr($tahun,-2);
			$blnbatas = ($bulan+1);
		}
		$tglbatas = RefTGLBatas::model()->get($this->PAJAK_REK, $thnbatas, $blnbatas).'-'.($blnbatas<10 ? '0'.$blnbatas : $blnbatas).'-20'.$thnbatas;
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
		// gunakan function untuk mencari bulan denda
		$data['BULAN_DENDA'] = $bulan_denda = LokalIndonesia::getBulanDenda(date('Y-m-d', strtotime($tglbatas)), date('Y-m-d') );
		$data['PERSEN_DENDA'] = $bulan_denda*2;
		echo CJSON::encode($data);
	}

	public function cekProses($thn, $bulan, $tanggal, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT TBLDAFTRMAKAN_RUPIAHSETOR FROM TBLDAFTRMAKAN WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND NVL(TBLPENDATAAN_BLNPAJAK,0)='.$tanggal.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;

	}

	public function actionautocompletewphotel()
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
		$cek = $this->cekPernahDaftar(substr($tahun_pajak, -2), $bulan_pajak, $tanggal_pajak, $nopokok);
		if ($cek>0) {
			$res['data'] = 'ada';
			$command = Yii::app()->db->createCommand();
			$column = array('TBLPENDATAAN_THNPAJAK'=>substr($tahun_pajak, -2)
					    ,'TBLPENDATAAN_BLNPAJAK'=>$bulan_pajak
					    ,'TBLPENDATAAN_TGLPAJAK'=>$tanggal_pajak
					    ,'TBLDAFTAR_NOPOK'=>$nopokok
					    ,'TBLDAFTAR_JNSPENDAPATAN'=>'P'
					    ,'TBLDAFTAR_GOLONGAN'=>3
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
					    ,'TBLKECAMATAN_ID'=>$kecamatan_pajak
				    	,'TBLKELURAHAN_ID'=>$kelurahan_pajak
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
					    ,'TBLDAFTRMAKAN_PAJAK'=>$hit_pajak
					    ,'TBLDAFTRMAKAN_PAJAKSKPD'=>$hit_pajak
					    ,'TBLDAFTRMAKAN_THNSPTPD'=>isset($arr_tglsptpd[2]) ? substr($arr_tglsptpd[2], -2) : ''
					    ,'TBLDAFTRMAKAN_BLNSPTPD'=>isset($arr_tglsptpd[1]) ? $arr_tglsptpd[1] : ''
					    ,'TBLDAFTRMAKAN_TGLSPTPD'=>isset($arr_tglsptpd[0]) ? $arr_tglsptpd[0] : ''
					    ,'TBLDAFTRMAKAN_THNTERIMA'=>substr($arr_tglterimasptpd[2],-2)
					    ,'TBLDAFTRMAKAN_BLNTERIMA'=>$arr_tglterimasptpd[1]
					    ,'TBLDAFTRMAKAN_TGLTERIMA'=>$arr_tglterimasptpd[0]
					    ,'TBLDAFTRMAKAN_THNBATASSPTPD'=>substr($arr_tglbatassptpd[2],-2)
					    ,'TBLDAFTRMAKAN_BLNBATASSPTPD'=>$arr_tglbatassptpd[1]
					    ,'TBLDAFTRMAKAN_TGLBATASSPTPD'=>$arr_tglbatassptpd[0]
					    ,'TBLDAFTRMAKAN_THNENTRI'=>substr($arr_tglentrisptpd[2],-2)
					    ,'TBLDAFTRMAKAN_BLNENTRI'=>$arr_tglentrisptpd[1]
					    ,'TBLDAFTRMAKAN_TGLENTRI'=>$arr_tglentrisptpd[0]
					    ,'TBLDAFTRMAKAN_BUNGASPTPD'=>$hit_bungaspt
					);

			$simpan = $command->update('TBLDAFTRMAKAN', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPAJAK AND TBLPENDATAAN_BLNPAJAK =:BLNPAJAK',array(':NOPOK' => $nopokok, ':THNPAJAK' =>substr($tahun_pajak, -2), ':BLNPAJAK' => $bulan_pajak));
			if ($simpan) {
				$res['status'] = 'update';
			}else{
				$res['status'] = 'failed';
			}			
		}else{
			$res['data'] = 'tidak';
			$insert = Yii::app()->db->createCommand();
			$simpan = $insert->insert('TBLDAFTRMAKAN', array(
					    'TBLPENDATAAN_THNPAJAK'=>substr($tahun_pajak, -2)
					    ,'TBLPENDATAAN_BLNPAJAK'=>$bulan_pajak
					    ,'TBLPENDATAAN_TGLPAJAK'=>$tanggal_pajak
					    ,'TBLDAFTAR_NOPOK'=>$nopokok
					    ,'TBLDAFTAR_JNSPENDAPATAN'=>'P'
					    ,'TBLDAFTAR_GOLONGAN'=>3
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
					    ,'TBLKECAMATAN_ID'=>$kecamatan_pajak
				    	,'TBLKELURAHAN_ID'=>$kelurahan_pajak
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
					    ,'TBLDAFTRMAKAN_PAJAK'=>$hit_pajak
						,'TBLDAFTRMAKAN_PAJAKSKPD'=>$hit_pajak
					    ,'TBLDAFTRMAKAN_THNSPTPD'=>isset($arr_tglsptpd[2]) ? substr($arr_tglsptpd[2], -2) : ''
					    ,'TBLDAFTRMAKAN_BLNSPTPD'=>isset($arr_tglsptpd[1]) ? $arr_tglsptpd[1] : ''
					    ,'TBLDAFTRMAKAN_TGLSPTPD'=>isset($arr_tglsptpd[0]) ? $arr_tglsptpd[0] : ''
					    ,'TBLDAFTRMAKAN_THNTERIMA'=>substr($arr_tglterimasptpd[2],-2)
					    ,'TBLDAFTRMAKAN_BLNTERIMA'=>$arr_tglterimasptpd[1]
					    ,'TBLDAFTRMAKAN_TGLTERIMA'=>$arr_tglterimasptpd[0]
					    ,'TBLDAFTRMAKAN_THNBATASSPTPD'=>substr($arr_tglbatassptpd[2],-2)
					    ,'TBLDAFTRMAKAN_BLNBATASSPTPD'=>$arr_tglbatassptpd[1]
					    ,'TBLDAFTRMAKAN_TGLBATASSPTPD'=>$arr_tglbatassptpd[0]
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
	public function cekPernahDaftar($thn, $bulan, $tanggal, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTRMAKAN WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND NVL(TBLPENDATAAN_TGLPAJAK,0)='.$tanggal.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;
	}

	public function actionDelt()
	{
		$nopok = intval($_POST['nomor_pajak']);
		$bulan = (int)trim($_POST['bulan']);
		$tahun = intval($_POST['tahun']);
		$tgl = isset($_REQUEST['tgl']) ? (int)$_REQUEST['tgl'] : '';
		$thn = substr($tahun, -2);

		$dt = Yii::app()->db->createCommand('SELECT NVL(TBLDAFTRMAKAN_TGLENTRI, 0) AS TGLENTRI FROM TBLDAFTRMAKAN WHERE 
			TBLPENDATAAN_THNPAJAK ='.$thn.' 
			AND TBLPENDATAAN_BLNPAJAK='.$bulan.' 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.'
			AND TBLDAFTAR_NOPOK='.$nopok
		)->queryRow();

		if ($dt && $dt['TGLENTRI']==0) {
			$del = Yii::app()->db->createCommand()->delete('TBLDAFTRMAKAN', '
				TBLPENDATAAN_THNPAJAK =:thn 
				AND TBLPENDATAAN_BLNPAJAK=:bulan 
				AND NVL(TBLPENDATAAN_TGLPAJAK, 0)=:tgl
				AND TBLDAFTAR_NOPOK=:nopok
			', array(
				':thn'=>$thn
				,':bulan'=>$bulan
				,':tgl'=>$tgl
				,':nopok'=>$nopok
			));
			if ($del) {
				echo CJSON::encode(array('status'=>'success', 'del'=>$del));
			} else {
			}
		} else {
			echo CJSON::encode(array('status'=>'false', 'message'=>'data not found'));
		}
	}

}