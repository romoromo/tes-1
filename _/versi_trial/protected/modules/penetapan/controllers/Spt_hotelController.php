<?php

class Spt_hotelController extends Controller
{
	var $KODE_GOL = 3;
	var $PAJAK_AYAT = 1;
	var $PAJAK_REK = '4.1.1.1.0';
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
		WHERE TBLREKENING_KODE LIKE '4.1.1.1.%'
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
		$setor = $this->cekSetor(substr($tahun, -2), $bulan, $NOPOK);

		if ($setor != '') {
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
			TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK,
			TBLDAFTHOTEL.TBLPENDATAAN_BLNPAJAK,
			TBLDAFTHOTEL.TBLDAFTHOTEL_OMSETPAJAK,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAK, 0) AS TBLDAFTHOTEL_PAJAK,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BUNGASPTPD, 0) AS TBLDAFTHOTEL_BUNGASPTPD,
			TBLDAFTHOTEL.TBLDAFTHOTEL_THNSPTPD,
			TBLDAFTHOTEL.TBLDAFTHOTEL_BLNSPTPD,
			TBLDAFTHOTEL.TBLDAFTHOTEL_TGLSPTPD,
			TBLDAFTHOTEL.TBLDAFTHOTEL_THNBATASSPTPD,
			TBLDAFTHOTEL.TBLDAFTHOTEL_BLNBATASSPTPD,
			TBLDAFTHOTEL.TBLDAFTHOTEL_TGLBATASSPTPD,
			TBLDAFTHOTEL.TBLDAFTHOTEL_THNTERIMA,
			TBLDAFTHOTEL.TBLDAFTHOTEL_BLNTERIMA,
			TBLDAFTHOTEL.TBLDAFTHOTEL_TGLTERIMA,
			TBLDAFTHOTEL.TBLDAFTHOTEL_THNENTRI,
			TBLDAFTHOTEL.TBLDAFTHOTEL_BLNENTRI,
			TBLDAFTHOTEL.TBLDAFTHOTEL_TGLENTRI
			";
			$from = 'TBLDAFTAR';
			$filter = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $NOPOK
			);

			$filter_AND = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
				,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
				,'EQ__TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK' => $thn
				,'EQ__TBLDAFTHOTEL.TBLPENDATAAN_BLNPAJAK' => $bulan
				// ,'EQ__tblsubyek_isaktif' => "T"
			);

			$otherquery = array(
				'limit'=> 30
				,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID = TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
				,'join_2'=> array('TBLDAFTHOTEL', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHOTEL.TBLDAFTAR_NOPOK')
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

			$data['TBLDAFTHOTEL_OMSETPAJAK'] =$model['TBLDAFTHOTEL_OMSETPAJAK'];
			$data['TBLDAFTHOTEL_PAJAK'] =$model['TBLDAFTHOTEL_PAJAK'];
			$data['TBLDAFTHOTEL_BUNGASPTPD'] =$model['TBLDAFTHOTEL_BUNGASPTPD'];

			$data['TBLDAFTHOTEL_THNSPTPD'] =$model['TBLDAFTHOTEL_THNSPTPD'];
			$data['TBLDAFTHOTEL_BLNSPTPD'] =$model['TBLDAFTHOTEL_BLNSPTPD'];
			$data['TBLDAFTHOTEL_TGLSPTPD'] =$model['TBLDAFTHOTEL_TGLSPTPD'];

			$data['TBLDAFTHOTEL_THNBATASSPTPD'] =$model['TBLDAFTHOTEL_THNBATASSPTPD'];
			$data['TBLDAFTHOTEL_BLNBATASSPTPD'] =$model['TBLDAFTHOTEL_BLNBATASSPTPD'];
			$data['TBLDAFTHOTEL_TGLBATASSPTPD'] =$model['TBLDAFTHOTEL_TGLBATASSPTPD'];

			$data['TBLDAFTHOTEL_THNTERIMA'] =$model['TBLDAFTHOTEL_THNTERIMA'];
			$data['TBLDAFTHOTEL_BLNTERIMA'] =$model['TBLDAFTHOTEL_BLNTERIMA'];
			$data['TBLDAFTHOTEL_TGLTERIMA'] =$model['TBLDAFTHOTEL_TGLTERIMA'];
			
			$data['TBLDAFTHOTEL_THNENTRI'] =$model['TBLDAFTHOTEL_THNENTRI'];
			$data['TBLDAFTHOTEL_BLNENTRI'] =$model['TBLDAFTHOTEL_BLNENTRI'];
			$data['TBLDAFTHOTEL_TGLENTRI'] =$model['TBLDAFTHOTEL_TGLENTRI'];

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
		$jmlhari = cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun);
		// $jmlhari = 30;
		
		$data['JUMLAH_HARI'] = $jmlhari;
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
		// $tanggal_pajak = trim($_POST['tanggal_pajak']);
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
		
		$column = array('TBLPENDATAAN_THNPAJAK'=>substr($tahun_pajak, -2)
				    ,'TBLPENDATAAN_BLNPAJAK'=>$bulan_pajak
				    ,'TBLPENDATAAN_TGLPAJAK'=>0
				    ,'TBLDAFTAR_NOPOK'=>$nopokok
				    ,'TBLDAFTAR_JNSPENDAPATAN'=>'P'
				    ,'TBLDAFTAR_GOLONGAN'=>3
				    ,'TBLDAFTHOTEL_REKURUSAN'=>1
				    ,'TBLDAFTHOTEL_REKPEMERINTAHAN'=>20
				    ,'TBLDAFTHOTEL_REKORGANISASI'=>1
				    ,'TBLDAFTHOTEL_REKPROGRAM'=>20
				    ,'TBLDAFTHOTEL_REKKEGIATAN'=>26
				    ,'TBLDAFTHOTEL_REKDINAS'=>0
				    ,'TBLDAFTHOTEL_REKBIDANG'=>0
				    ,'TBLDAFTHOTEL_REKPENDAPATAN'=>$refbadanusaha_rekpendapatan
				    ,'TBLDAFTHOTEL_REKPAD'=>$refbadanusaha_rekpad
				    ,'TBLDAFTHOTEL_REKPAJAK'=>$refbadanusaha_rekpjk
				    ,'TBLDAFTHOTEL_REKAYAT'=>$refbadanusaha_rekayat
				    ,'TBLDAFTHOTEL_REKJENIS'=>$refbadanusaha_rekjenis
				    ,'TBLKECAMATAN_ID'=>$kecamatan_pajak
				    ,'TBLKELURAHAN_ID'=>$kelurahan_pajak
				    //,'TBLDAFTHOTEL_ISKAS'=>$is_kas
				    //,'TBLDAFTHOTEL_ISPEMBUKUAN'=>$is_pembukuan
				    // /,'TBLDAFTHOTEL_ISNOTA'=>$is_nota
				    ,'TBLDAFTHOTEL_ISLHP'=>$is_lhp
				    ,'TBLDAFTHOTEL_ISNOTABIL'=>$is_notabil
				    ,'TBLDAFTHOTEL_ISJNSPENETAPAN'=>$hit_carapenghitungan
				    ,'TBLDAFTHOTEL_THNMULAIJUAL'=>substr($arr_tglawal[2], -2)
				    ,'TBLDAFTHOTEL_BLNMULAIJUAL'=>$arr_tglawal[1]
				    ,'TBLDAFTHOTEL_TGLMULAIJUAL'=>$arr_tglawal[0]
				    ,'TBLDAFTHOTEL_THNAKHIRJUAL'=>substr($arr_tglakhir[2], -2)
				    ,'TBLDAFTHOTEL_BLNAKHIRJUAL'=>$arr_tglakhir[1]
				    ,'TBLDAFTHOTEL_TGLAKHIRJUAL'=>$arr_tglakhir[0]
				    ,'TBLDAFTHOTEL_JUMLAHHARIJUAL'=>$hit_jumlahhari
				    ,'TBLDAFTHOTEL_OMSETPAJAK'=>$omzet
				    ,'TBLDAFTHOTEL_PERSENTARIF'=>$tarif_rekening
				    ,'TBLDAFTHOTEL_PAJAK'=>$hit_pajak
				    ,'TBLDAFTHOTEL_PAJAKSKPD'=>$hit_pajak
				    ,'TBLDAFTHOTEL_THNSPTPD'=>isset($arr_tglsptpd[2]) ? substr($arr_tglsptpd[2], -2) : ''
				    ,'TBLDAFTHOTEL_BLNSPTPD'=>isset($arr_tglsptpd[1]) ? $arr_tglsptpd[1] : ''
				    ,'TBLDAFTHOTEL_TGLSPTPD'=>isset($arr_tglsptpd[0]) ? $arr_tglsptpd[0] : ''
				    ,'TBLDAFTHOTEL_THNTERIMA'=>substr($arr_tglterimasptpd[2],-2)
				    ,'TBLDAFTHOTEL_BLNTERIMA'=>$arr_tglterimasptpd[1]
				    ,'TBLDAFTHOTEL_TGLTERIMA'=>$arr_tglterimasptpd[0]
				    ,'TBLDAFTHOTEL_THNBATASSPTPD'=>substr($arr_tglbatassptpd[2],-2)
				    ,'TBLDAFTHOTEL_BLNBATASSPTPD'=>$arr_tglbatassptpd[1]
				    ,'TBLDAFTHOTEL_TGLBATASSPTPD'=>$arr_tglbatassptpd[0]
				    ,'TBLDAFTHOTEL_THNENTRI'=>substr($arr_tglentrisptpd[2],-2)
				    ,'TBLDAFTHOTEL_BLNENTRI'=>$arr_tglentrisptpd[1]
				    ,'TBLDAFTHOTEL_TGLENTRI'=>$arr_tglentrisptpd[0]
				    ,'TBLDAFTHOTEL_BUNGASPTPD'=>$hit_bungaspt
				);
		if ($cek>0) {
			$res['data'] = 'ada';
			$command = Yii::app()->db->createCommand();

			$simpan = $command->update('TBLDAFTHOTEL', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPAJAK AND TBLPENDATAAN_BLNPAJAK =:BLNPAJAK',array(':NOPOK' => $nopokok, ':THNPAJAK' =>substr($tahun_pajak, -2), ':BLNPAJAK' => $bulan_pajak));
			if ($simpan) {
				$res['status'] = 'update';
			}else{
				$res['status'] = 'failed';
			}
		} else {
			$res['data'] = 'tidak';
			$insert = Yii::app()->db->createCommand();
			$simpan = $insert->insert('TBLDAFTHOTEL', $column);
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
		$model = Yii::app()->db->createCommand('SELECT TBLDAFTHOTEL_RUPIAHSETOR FROM TBLDAFTHOTEL WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;

	}

	public function cekSetor($thn, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand("SELECT TBLSETOR_NOMORSSPD FROM TBLSETOR WHERE TBLPENDATAAN_THNPAJAK =".$thn." AND TBLPENDATAAN_BLNPAJAK=".$bulan." AND TBLDAFTAR_NOPOK=".$nopok." AND NVL(TBLPENDATAAN_TGLPAJAK,0) = 0 AND TBLSETOR_JNSBAYAR LIKE '%SPTPD%' ")->queryScalar();
		return $model;

	}

	public function cekPernahDaftar($thn, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTHOTEL WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$nopok.' AND NVL(TBLPENDATAAN_TGLPAJAK,0) = 0')->queryScalar();
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