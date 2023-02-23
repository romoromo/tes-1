<?php

class Keringanan_parkirController extends Controller
{
	var $KODE_GOL = 2;
	var $PAJAK_AYAT = 7;
	var $PAJAK_REK = '4.1.1.7.0';
	var $NAMATABEL = 'TBLDAFTPARKIR';
	public function actionIndex()
	{
		// $data['sub_rek'] = TRekening::model()->getRekeningSubAktif('4110100');
		/*SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.7.%'
		ORDER BY TBLREKENING_KODE*/
		$data['sub_rek'] = Yii::app()->db->createCommand("
		SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.7.%'
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
		$thn = substr($tahun, -2);
		$data = array();
		$cek = $this->cekPernahDaftar(substr($tahun, -2), $bulan, $NOPOK);
		$proses = $this->cekProses(substr($tahun, -2), $bulan, $NOPOK);

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
			 NVL({$this->NAMATABEL}.TBLPENDATAAN_THNPAJAK,0) AS TBLPENDATAAN_THNPAJAK,
			 NVL({$this->NAMATABEL}.TBLPENDATAAN_BLNPAJAK,0) AS TBLPENDATAAN_BLNPAJAK,
			 NVL({$this->NAMATABEL}.{$this->NAMATABEL}_OMSETPAJAK,0) AS {$this->NAMATABEL}_OMSETPAJAK,
			 NVL({$this->NAMATABEL}.{$this->NAMATABEL}_PAJAK,0) AS {$this->NAMATABEL}_PAJAK,
			 NVL({$this->NAMATABEL}.{$this->NAMATABEL}_BUNGASPTPD,0) AS {$this->NAMATABEL}_BUNGASPTPD,
			 NVL({$this->NAMATABEL}.{$this->NAMATABEL}_THNSPTPD,0) AS {$this->NAMATABEL}_THNSPTPD,
			 NVL({$this->NAMATABEL}.{$this->NAMATABEL}_BLNSPTPD,0) AS {$this->NAMATABEL}_BLNSPTPD,
			 NVL({$this->NAMATABEL}.{$this->NAMATABEL}_TGLSPTPD,0) AS {$this->NAMATABEL}_TGLSPTPD,
			 NVL({$this->NAMATABEL}.{$this->NAMATABEL}_THNBATASSPTPD,0) AS {$this->NAMATABEL}_THNBATASSPTPD,
			 NVL({$this->NAMATABEL}.{$this->NAMATABEL}_BLNBATASSPTPD,0) AS {$this->NAMATABEL}_BLNBATASSPTPD,
			 NVL({$this->NAMATABEL}.{$this->NAMATABEL}_TGLBATASSPTPD,0) AS {$this->NAMATABEL}_TGLBATASSPTPD,
			 NVL({$this->NAMATABEL}.{$this->NAMATABEL}_THNTERIMA,0) AS {$this->NAMATABEL}_THNTERIMA,
			 NVL({$this->NAMATABEL}.{$this->NAMATABEL}_BLNTERIMA,0) AS {$this->NAMATABEL}_BLNTERIMA,
			 NVL({$this->NAMATABEL}.{$this->NAMATABEL}_TGLTERIMA,0) AS {$this->NAMATABEL}_TGLTERIMA,
			 NVL({$this->NAMATABEL}.{$this->NAMATABEL}_THNENTRI,0) AS {$this->NAMATABEL}_THNENTRI,
			 NVL({$this->NAMATABEL}.{$this->NAMATABEL}_BLNENTRI,0) AS {$this->NAMATABEL}_BLNENTRI,
			 NVL({$this->NAMATABEL}.{$this->NAMATABEL}_TGLENTRI,0) AS {$this->NAMATABEL}_TGLENTRI
			";
			$from = 'TBLDAFTAR';
			$filter = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $NOPOK
			);

			$filter_AND = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
				,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
				,'EQ__' . $this->NAMATABEL . '.TBLPENDATAAN_THNPAJAK' => $thn
				,'EQ__' . $this->NAMATABEL . '.TBLPENDATAAN_BLNPAJAK' => $bulan
				// ,'EQ__tblsubyek_isaktif' => "T"
			);

			$otherquery = array(
				'limit'=> 30
				,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID = TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
				,'join_2'=> array('' . $this->NAMATABEL . '', 'TBLDAFTAR.TBLDAFTAR_NOPOK = ' . $this->NAMATABEL . '.TBLDAFTAR_NOPOK')
				,'order'=> 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC'
			);
			$model = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL') );

			$data['TBLDAFTAR_BADANUSAHANAMA'] =$model['TBLDAFTAR_BADANUSAHANAMA'];
			$data['TBLDAFTAR_BADANUSAHAALAMAT'] =$model['TBLDAFTAR_BADANUSAHAALAMAT'];
			$data['TBLKECAMATAN_IDBADANUSAHA'] =$model['TBLKECAMATAN_IDBADANUSAHA'];
			$data['TBLKELURAHAN_IDBADANUSAHA'] =$model['TBLKELURAHAN_IDBADANUSAHA'];
			$data['REKENING_KODE'] =$model['REKENING_KODE'];
			$data['TREKENING_TARIF'] =$model['REFBADANUSAHA_PERSEN'];
			
			$data['REFBADANUSAHA_REKPENDAPATAN'] =$model['REFBADANUSAHA_REKPENDAPATAN'];
			$data['REFBADANUSAHA_REKPAD'] =$model['REFBADANUSAHA_REKPAD'];
			$data['REFBADANUSAHA_REKPJK'] =$model['REFBADANUSAHA_REKPJK'];
			$data['REFBADANUSAHA_REKAYAT'] =$model['REFBADANUSAHA_REKAYAT'];
			$data['REFBADANUSAHA_REKJENIS'] =$model['REFBADANUSAHA_REKJENIS'];

			$data['' . $this->NAMATABEL . '_OMSETPAJAK'] =$model['' . $this->NAMATABEL . '_OMSETPAJAK'];
			$data['' . $this->NAMATABEL . '_PAJAK'] =$model['' . $this->NAMATABEL . '_PAJAK'];
			$data['' . $this->NAMATABEL . '_BUNGASPTPD'] =$model['' . $this->NAMATABEL . '_BUNGASPTPD'];

			$data['' . $this->NAMATABEL . '_THNSPTPD'] =$model['' . $this->NAMATABEL . '_THNSPTPD'];
			$data['' . $this->NAMATABEL . '_BLNSPTPD'] =$model['' . $this->NAMATABEL . '_BLNSPTPD'];
			$data['' . $this->NAMATABEL . '_TGLSPTPD'] =$model['' . $this->NAMATABEL . '_TGLSPTPD'];

			$data['' . $this->NAMATABEL . '_THNBATASSPTPD'] =$model['' . $this->NAMATABEL . '_THNBATASSPTPD'];
			$data['' . $this->NAMATABEL . '_BLNBATASSPTPD'] =$model['' . $this->NAMATABEL . '_BLNBATASSPTPD'];
			$data['' . $this->NAMATABEL . '_TGLBATASSPTPD'] =$model['' . $this->NAMATABEL . '_TGLBATASSPTPD'];

			$data['' . $this->NAMATABEL . '_THNTERIMA'] =$model['' . $this->NAMATABEL . '_THNTERIMA'];
			$data['' . $this->NAMATABEL . '_BLNTERIMA'] =$model['' . $this->NAMATABEL . '_BLNTERIMA'];
			$data['' . $this->NAMATABEL . '_TGLTERIMA'] =$model['' . $this->NAMATABEL . '_TGLTERIMA'];
			
			$data['' . $this->NAMATABEL . '_THNENTRI'] =$model['' . $this->NAMATABEL . '_THNENTRI'];
			$data['' . $this->NAMATABEL . '_BLNENTRI'] =$model['' . $this->NAMATABEL . '_BLNENTRI'];
			$data['' . $this->NAMATABEL . '_TGLENTRI'] =$model['' . $this->NAMATABEL . '_TGLENTRI'];

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
		$data['TBLKECAMATAN_IDBADANUSAHA'] =$model['TBLKECAMATAN_IDBADANUSAHA'];
		$data['TBLKELURAHAN_IDBADANUSAHA'] =$model['TBLKELURAHAN_IDBADANUSAHA'];
		$data['REKENING_KODE'] =$model['REKENING_KODE'];
		$data['TREKENING_TARIF'] =$model['REFBADANUSAHA_PERSEN'];
		
		$data['REFBADANUSAHA_REKPENDAPATAN'] =$model['REFBADANUSAHA_REKPENDAPATAN'];
		$data['REFBADANUSAHA_REKPAD'] =$model['REFBADANUSAHA_REKPAD'];
		$data['REFBADANUSAHA_REKPJK'] =$model['REFBADANUSAHA_REKPJK'];
		$data['REFBADANUSAHA_REKAYAT'] =$model['REFBADANUSAHA_REKAYAT'];
		$data['REFBADANUSAHA_REKJENIS'] =$model['REFBADANUSAHA_REKJENIS'];

		}
		// $jmlhari = cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun);
		$jmlhari = 30;
		
		// $data['JUMLAH_HARI'] = $jmlhari-1;
		$data['JUMLAH_HARI'] = $jmlhari;
		$data['AWAL_PAJAK'] = '01-'.$bulan.'-'.$tahun;
		if ($bulan=='02') {
			$data['AKHIR_PAJAK'] = date('t-m-Y', strtotime('01-02-'.date('Y')));
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
			,'EQ__TBLDAFTAR_ISAKTIF' => 'Y'
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
		// $is_lhp = trim($_POST['is_lhp']);
		// $is_notabil = trim($_POST['is_notabil']);
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
			$command = Yii::app()->db->createCommand();
			$column = array(
				// 'TBLPENDATAAN_THNPAJAK'=>substr($tahun_pajak, -2)
			    // ,'TBLPENDATAAN_BLNPAJAK'=>$bulan_pajak
			    // ,'TBLPENDATAAN_TGLPAJAK'=>$tanggal_pajak
			    // ,'TBLDAFTAR_NOPOK'=>$nopokok
			    // ,'TBLDAFTAR_JNSPENDAPATAN'=>'P'
			    // ,'TBLDAFTAR_GOLONGAN'=> $this->KODE_GOL
			    // ,'' . $this->NAMATABEL . '_REKURUSAN'=>1
			    // ,'' . $this->NAMATABEL . '_REKPEMERINTAHAN'=>20
			    // ,'' . $this->NAMATABEL . '_REKORGANISASI'=>1
			    // ,'' . $this->NAMATABEL . '_REKPROGRAM'=>20
			    // ,'' . $this->NAMATABEL . '_REKKEGIATAN'=>26
			    // ,'' . $this->NAMATABEL . '_REKDINAS'=>0
			    // ,'' . $this->NAMATABEL . '_REKBIDANG'=>0
			    // ,'' . $this->NAMATABEL . '_REKPENDAPATAN'=>$refbadanusaha_rekpendapatan
			    // ,'' . $this->NAMATABEL . '_REKPAD'=>$refbadanusaha_rekpad
			    // ,'' . $this->NAMATABEL . '_REKPAJAK'=>$refbadanusaha_rekpjk
			    // ,'' . $this->NAMATABEL . '_REKAYAT'=>$refbadanusaha_rekayat
			    // ,'' . $this->NAMATABEL . '_REKJENIS'=>$refbadanusaha_rekjenis
			    // ,'TBLKECAMATAN_ID'=>$kecamatan_pajak
			    // ,'TBLKELURAHAN_ID'=>$kelurahan_pajak
			    //,'' . $this->NAMATABEL . '_ISKAS'=>$is_kas
			    //,'' . $this->NAMATABEL . '_ISPEMBUKUAN'=>$is_pembukuan
			    // /,'' . $this->NAMATABEL . '_ISNOTA'=>$is_nota
				// ,'' . $this->NAMATABEL . '_ISJNSPENETAPAN'=>$hit_carapenghitungan
				//,'' . $this->NAMATABEL . '_THNMULAIJUAL'=>substr($arr_tglawal[2], -2)
				//,'' . $this->NAMATABEL . '_BLNMULAIJUAL'=>$arr_tglawal[1]
				//,'' . $this->NAMATABEL . '_TGLMULAIJUAL'=>$arr_tglawal[0]
				//,'' . $this->NAMATABEL . '_THNAKHIRJUAL'=>substr($arr_tglakhir[2], -2)
				//,'' . $this->NAMATABEL . '_BLNAKHIRJUAL'=>$arr_tglakhir[1]
				//,'' . $this->NAMATABEL . '_TGLAKHIRJUAL'=>$arr_tglakhir[0]
				//,'' . $this->NAMATABEL . '_JUMLAHHARIJUAL'=>$hit_jumlahhari
				//,'' . $this->NAMATABEL . '_OMSETPAJAK'=>$omzet
				//,'' . $this->NAMATABEL . '_PERSENTARIF'=>$tarif_rekening
			    '' . $this->NAMATABEL . '_PAJAK'=>$hit_pajak,
			    '' . $this->NAMATABEL . '_PAJAKSKPD'=>$hit_pajak,
			    '' . $this->NAMATABEL . '_PERSENRINGAN'=>$hit_keringanan,
				 // ,'' . $this->NAMATABEL . '_THNSPTPD'=>isset($arr_tglsptpd[2]) ? substr($arr_tglsptpd[2], -2) : ''
				// ,'' . $this->NAMATABEL . '_BLNSPTPD'=>isset($arr_tglsptpd[1]) ? $arr_tglsptpd[1] : ''
				// ,'' . $this->NAMATABEL . '_TGLSPTPD'=>isset($arr_tglsptpd[0]) ? $arr_tglsptpd[0] : ''
				// ,'' . $this->NAMATABEL . '_THNTERIMA'=>substr($arr_tglterimasptpd[2],-2)
				// ,'' . $this->NAMATABEL . '_BLNTERIMA'=>$arr_tglterimasptpd[1]
				// ,'' . $this->NAMATABEL . '_TGLTERIMA'=>$arr_tglterimasptpd[0]
				// ,'' . $this->NAMATABEL . '_THNBATASSPTPD'=>substr($arr_tglbatassptpd[2],-2)
				// ,'' . $this->NAMATABEL . '_BLNBATASSPTPD'=>$arr_tglbatassptpd[1]
				// ,'' . $this->NAMATABEL . '_TGLBATASSPTPD'=>$arr_tglbatassptpd[0]
				// ,'' . $this->NAMATABEL . '_THNENTRI'=>substr($arr_tglentrisptpd[2],-2)
				// ,'' . $this->NAMATABEL . '_BLNENTRI'=>$arr_tglentrisptpd[1]
				// ,'' . $this->NAMATABEL . '_TGLENTRI'=>$arr_tglentrisptpd[0]
				// ,'' . $this->NAMATABEL . '_BUNGASPTPD'=>$hit_bungaspt
			);
			// echo CJSON::encode($column);Yii::app()->end();

			$simpan = $command->update('' . $this->NAMATABEL . '', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPAJAK AND TBLPENDATAAN_BLNPAJAK =:BLNPAJAK',array(':NOPOK' => $nopokok, ':THNPAJAK' =>substr($tahun_pajak, -2), ':BLNPAJAK' => $bulan_pajak));
			if ($simpan) {
				$res['status'] = 'update';
			}else{
				$res['status'] = 'failed';
			}
		} else {
			// $res['data'] = 'tidak';
			// $insert = Yii::app()->db->createCommand();
			// $simpan = $insert->insert('' . $this->NAMATABEL . '', array(
			// 		    'TBLPENDATAAN_THNPAJAK'=>substr($tahun_pajak, -2)
			// 		    ,'TBLPENDATAAN_BLNPAJAK'=>$bulan_pajak
			// 		    ,'TBLPENDATAAN_TGLPAJAK'=>$tanggal_pajak
			// 		    ,'TBLDAFTAR_NOPOK'=>$nopokok
			// 		    ,'TBLDAFTAR_JNSPENDAPATAN'=>'P'
			// 		    ,'TBLDAFTAR_GOLONGAN'=> $this->KODE_GOL
			// 		    ,'' . $this->NAMATABEL . '_REKURUSAN'=>1
			// 		    ,'' . $this->NAMATABEL . '_REKPEMERINTAHAN'=>20
			// 		    ,'' . $this->NAMATABEL . '_REKORGANISASI'=>1
			// 		    ,'' . $this->NAMATABEL . '_REKPROGRAM'=>20
			// 		    ,'' . $this->NAMATABEL . '_REKKEGIATAN'=>26
			// 		    ,'' . $this->NAMATABEL . '_REKDINAS'=>0
			// 		    ,'' . $this->NAMATABEL . '_REKBIDANG'=>0
			// 		    ,'' . $this->NAMATABEL . '_REKPENDAPATAN'=>$refbadanusaha_rekpendapatan
			// 		    ,'' . $this->NAMATABEL . '_REKPAD'=>$refbadanusaha_rekpad
			// 		    ,'' . $this->NAMATABEL . '_REKPAJAK'=>$refbadanusaha_rekpjk
			// 		    ,'' . $this->NAMATABEL . '_REKAYAT'=>$refbadanusaha_rekayat
			// 		    ,'' . $this->NAMATABEL . '_REKJENIS'=>$refbadanusaha_rekjenis
			// 		    ,'TBLKECAMATAN_ID'=>$kecamatan_pajak
			// 		    ,'TBLKELURAHAN_ID'=>$kelurahan_pajak
			// 		    //,'' . $this->NAMATABEL . '_ISKAS'=>$is_kas
			// 		    //,'' . $this->NAMATABEL . '_ISPEMBUKUAN'=>$is_pembukuan
			// 		    // /,'' . $this->NAMATABEL . '_ISNOTA'=>$is_nota
			// 		    ,'' . $this->NAMATABEL . '_ISJNSPENETAPAN'=>$hit_carapenghitungan
			// 		    ,'' . $this->NAMATABEL . '_THNMULAIJUAL'=>substr($arr_tglawal[2], -2)
			// 		    ,'' . $this->NAMATABEL . '_BLNMULAIJUAL'=>$arr_tglawal[1]
			// 		    ,'' . $this->NAMATABEL . '_TGLMULAIJUAL'=>$arr_tglawal[0]
			// 		    ,'' . $this->NAMATABEL . '_THNAKHIRJUAL'=>substr($arr_tglakhir[2], -2)
			// 		    ,'' . $this->NAMATABEL . '_BLNAKHIRJUAL'=>$arr_tglakhir[1]
			// 		    ,'' . $this->NAMATABEL . '_TGLAKHIRJUAL'=>$arr_tglakhir[0]
			// 		    ,'' . $this->NAMATABEL . '_JUMLAHHARIJUAL'=>$hit_jumlahhari
			// 		    ,'' . $this->NAMATABEL . '_OMSETPAJAK'=>$omzet
			// 		    ,'' . $this->NAMATABEL . '_PERSENTARIF'=>$tarif_rekening
			// 		    ,'' . $this->NAMATABEL . '_PAJAK'=>$hit_pajak
			// 			,'' . $this->NAMATABEL . '_PAJAKSKPD'=>$hit_pajak
			// 		    ,'' . $this->NAMATABEL . '_THNSPTPD'=>isset($arr_tglsptpd[2]) ? substr($arr_tglsptpd[2], -2) : ''
			// 		    ,'' . $this->NAMATABEL . '_BLNSPTPD'=>isset($arr_tglsptpd[1]) ? $arr_tglsptpd[1] : ''
			// 		    ,'' . $this->NAMATABEL . '_TGLSPTPD'=>isset($arr_tglsptpd[0]) ? $arr_tglsptpd[0] : ''
			// 		     ,'' . $this->NAMATABEL . '_THNTERIMA'=>substr($arr_tglterimasptpd[2],-2)
			// 		    ,'' . $this->NAMATABEL . '_BLNTERIMA'=>$arr_tglterimasptpd[1]
			// 		    ,'' . $this->NAMATABEL . '_TGLTERIMA'=>$arr_tglterimasptpd[0]
			// 		    ,'' . $this->NAMATABEL . '_THNBATASSPTPD'=>substr($arr_tglbatassptpd[2],-2)
			// 		    ,'' . $this->NAMATABEL . '_BLNBATASSPTPD'=>$arr_tglbatassptpd[1]
			// 		    ,'' . $this->NAMATABEL . '_TGLBATASSPTPD'=>$arr_tglbatassptpd[0]
			// 		    ,'' . $this->NAMATABEL . '_THNENTRI'=>substr($arr_tglentrisptpd[2],-2)
			// 		    ,'' . $this->NAMATABEL . '_BLNENTRI'=>$arr_tglentrisptpd[1]
			// 		    ,'' . $this->NAMATABEL . '_TGLENTRI'=>$arr_tglentrisptpd[0]
			// 		    ,'' . $this->NAMATABEL . '_BUNGASPTPD'=>$hit_bungaspt
			// 		));
			if ($simpan) {
				$res['status'] = 'success';
			}else{
				$res['status'] = 'failed';
			}
		}
		echo CJSON::encode($res);
	}

	public function cekProses($thn, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT ' . $this->NAMATABEL . '_RUPIAHSETOR FROM ' . $this->NAMATABEL . ' WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;

	}

	public function cekPernahDaftar($thn, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM ' . $this->NAMATABEL . ' WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;
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
