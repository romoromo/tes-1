<?php

class Teguran_rumahmakanController extends Controller
{
	var $KODE_GOL = 3;
	var $PAJAK_AYAT = 2;
	var $PAJAK_REK = '4.1.1.2.0';
	var $namatabel = 'TBLDAFTRMAKAN';
	var $modul_url = 'pendataan/teguran_rumahmakan';
	var $jenispajak = 'RESTORAN';

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
		$tahun = intval($_POST['tahun']);
		$tgl = isset($_REQUEST['tgl']) ? (int)$_REQUEST['tgl'] : '';
		$thn = substr($tahun, -2);
		$data = array();
		$cek = $this->cekPernahDaftar(substr($tahun, -2), $bulan, (int)$tgl, $NOPOK);
		$proses = $this->cekProses(substr($tahun, -2), $bulan, (int)$tgl, $NOPOK);
		// $teguran = $this->cekTeguran(substr($tahun, -2), $bulan, (int)$tgl, $NOPOK);

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
			NVL({$this->namatabel}.TBLPENDATAAN_THNPAJAK,0) AS TBLPENDATAAN_THNPAJAK,
			NVL({$this->namatabel}.TBLPENDATAAN_BLNPAJAK,0) AS TBLPENDATAAN_BLNPAJAK,
			NVL({$this->namatabel}.{$this->namatabel}_OMSETPAJAK,0) AS {$this->namatabel}_OMSETPAJAK,
			NVL({$this->namatabel}.{$this->namatabel}_PAJAK,0) AS {$this->namatabel}_PAJAK,
			NVL({$this->namatabel}.{$this->namatabel}_BUNGASPTPD,0) AS {$this->namatabel}_BUNGASPTPD,
			NVL({$this->namatabel}.{$this->namatabel}_THNSPTPD,0) AS {$this->namatabel}_THNSPTPD,
			NVL({$this->namatabel}.{$this->namatabel}_BLNSPTPD,0) AS {$this->namatabel}_BLNSPTPD,
			NVL({$this->namatabel}.{$this->namatabel}_TGLSPTPD,0) AS {$this->namatabel}_TGLSPTPD,
			NVL({$this->namatabel}.{$this->namatabel}_THNBATASSPTPD,0) AS {$this->namatabel}_THNBATASSPTPD,
			NVL({$this->namatabel}.{$this->namatabel}_BLNBATASSPTPD,0) AS {$this->namatabel}_BLNBATASSPTPD,
			NVL({$this->namatabel}.{$this->namatabel}_TGLBATASSPTPD,0) AS {$this->namatabel}_TGLBATASSPTPD,
			NVL({$this->namatabel}.{$this->namatabel}_THNTERIMA,0) AS {$this->namatabel}_THNTERIMA,
			NVL({$this->namatabel}.{$this->namatabel}_BLNTERIMA,0) AS {$this->namatabel}_BLNTERIMA,
			NVL({$this->namatabel}.{$this->namatabel}_TGLTERIMA,0) AS {$this->namatabel}_TGLTERIMA,
			NVL({$this->namatabel}.{$this->namatabel}_THNENTRI,0) AS {$this->namatabel}_THNENTRI,
			NVL({$this->namatabel}.{$this->namatabel}_BLNENTRI,0) AS {$this->namatabel}_BLNENTRI,
			NVL({$this->namatabel}.{$this->namatabel}_TGLENTRI,0) AS {$this->namatabel}_TGLENTRI
			";
			$from = 'TBLDAFTAR';
			$filter = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $NOPOK
			);

			$filter_AND = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
				,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
				,'EQ__'.$this->namatabel.'.TBLPENDATAAN_THNPAJAK' => $thn
				,'EQ__'.$this->namatabel.'.TBLPENDATAAN_BLNPAJAK' => $bulan
			// ,'EQ__tblsubyek_isaktif' => "T"
			);

			$otherquery = array(
				'limit'=> 30
				,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID = TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
				,'join_2'=> array(''.$this->namatabel.'', 'TBLDAFTAR.TBLDAFTAR_NOPOK = '.$this->namatabel.'.TBLDAFTAR_NOPOK')
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

			$data[''.$this->namatabel.'_OMSETPAJAK'] =$model[''.$this->namatabel.'_OMSETPAJAK'];
			$data[''.$this->namatabel.'_PAJAK'] =$model[''.$this->namatabel.'_PAJAK'];
			$data[''.$this->namatabel.'_BUNGASPTPD'] =$model[''.$this->namatabel.'_BUNGASPTPD'];

			$data[''.$this->namatabel.'_THNSPTPD'] =$model[''.$this->namatabel.'_THNSPTPD'];
			$data[''.$this->namatabel.'_BLNSPTPD'] =$model[''.$this->namatabel.'_BLNSPTPD'];
			$data[''.$this->namatabel.'_TGLSPTPD'] =$model[''.$this->namatabel.'_TGLSPTPD'];

			$data[''.$this->namatabel.'_THNBATASSPTPD'] =$model[''.$this->namatabel.'_THNBATASSPTPD'];
			$data[''.$this->namatabel.'_BLNBATASSPTPD'] =$model[''.$this->namatabel.'_BLNBATASSPTPD'];
			$data[''.$this->namatabel.'_TGLBATASSPTPD'] =$model[''.$this->namatabel.'_TGLBATASSPTPD'];

			$data[''.$this->namatabel.'_THNTERIMA'] =$model[''.$this->namatabel.'_THNTERIMA'];
			$data[''.$this->namatabel.'_BLNTERIMA'] =$model[''.$this->namatabel.'_BLNTERIMA'];
			$data[''.$this->namatabel.'_TGLTERIMA'] =$model[''.$this->namatabel.'_TGLTERIMA'];

			$data[''.$this->namatabel.'_THNENTRI'] =$model[''.$this->namatabel.'_THNENTRI'];
			$data[''.$this->namatabel.'_BLNENTRI'] =$model[''.$this->namatabel.'_BLNENTRI'];
			$data[''.$this->namatabel.'_TGLENTRI'] =$model[''.$this->namatabel.'_TGLENTRI'];

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

	public function cekProses($thn, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT '.$this->namatabel.'_RUPIAHSETOR FROM '.$this->namatabel.' WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
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
	
	public function actionkosongkan_rp(){
		$nopok = trim($_REQUEST['NOPOK']);
		$tglentri = trim($_REQUEST['TGLENTRI']);
		
		$column = array(
			''.$this->namatabel.'_PAJAKSKPD'=>''
			,''.$this->namatabel.'_JUMLAHHARIJUAL'=>''
			,''.$this->namatabel.'_OMSETPAJAK'=>'0'
			,''.$this->namatabel.'_PAJAK'=>''
			,''.$this->namatabel.'_BUNGASPTPD'=>''
			,''.$this->namatabel.'_PAJAK'=>''
			,''.$this->namatabel.'_THNSKPD'=>''
			,''.$this->namatabel.'_BLNSKPD'=>''
			,''.$this->namatabel.'_TGLSKPD'=>''
			,''.$this->namatabel.'_PAJAKSKPD'=>''
			,''.$this->namatabel.'_THNBATASSKPD'=>''
			,''.$this->namatabel.'_BLNBATASSKPD'=>''
			,''.$this->namatabel.'_TGLBATASSKPD'=>''
		);
		$simpan = $command->update(''.$this->namatabel.'', $column, 'TBLDAFTAR_NOPOK =:NOPOK  NVL(TBLPENDATAAN_TGLENTRI, 0) =:TGLPAJAK',array(':NOPOK' => $nopok, ':TGLPAJAK' => (int)$tglentri));
		if ($simpan) {
			$res['status'] = 'success';
		}else{
			$res['status'] = 'failed';
		}
	}
	
	public function actionsimpandata()
	{
		$bulan_pajak = trim($_POST['bulan_pajak']);
		$tahun_pajak = trim($_POST['tahun_pajak']);
		$tanggal_pajak = intval($_POST['tanggal_pajak']);
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
			$command = Yii::app()->db->createCommand();
			$column = array('TBLPENDATAAN_THNPAJAK'=>substr($tahun_pajak, -2)
				,'TBLPENDATAAN_BLNPAJAK'=>$bulan_pajak
				,'TBLPENDATAAN_TGLPAJAK'=>$tanggal_pajak
				,'TBLDAFTAR_NOPOK'=>$nopokok
				,'TBLDAFTAR_JNSPENDAPATAN'=>'P'
				,'TBLDAFTAR_GOLONGAN'=>3
				,''.$this->namatabel.'_REKURUSAN'=>1
				,''.$this->namatabel.'_REKPEMERINTAHAN'=>20
				,''.$this->namatabel.'_REKORGANISASI'=>1
				,''.$this->namatabel.'_REKPROGRAM'=>20
				,''.$this->namatabel.'_REKKEGIATAN'=>26
				,''.$this->namatabel.'_REKDINAS'=>0
				,''.$this->namatabel.'_REKBIDANG'=>0
				,''.$this->namatabel.'_REKPENDAPATAN'=>$refbadanusaha_rekpendapatan
				,''.$this->namatabel.'_REKPAD'=>$refbadanusaha_rekpad
				,''.$this->namatabel.'_REKPAJAK'=>$refbadanusaha_rekpjk
				,''.$this->namatabel.'_REKAYAT'=>$refbadanusaha_rekayat
				,''.$this->namatabel.'_REKJENIS'=>$refbadanusaha_rekjenis
				,'TBLKECAMATAN_ID'=>$kecamatan_pajak
				,'TBLKELURAHAN_ID'=>$kelurahan_pajak
					    //,''.$this->namatabel.'_ISKAS'=>$is_kas
					    //,''.$this->namatabel.'_ISPEMBUKUAN'=>$is_pembukuan
					    // /,''.$this->namatabel.'_ISNOTA'=>$is_nota
				,''.$this->namatabel.'_ISLHP'=>$is_lhp
				,''.$this->namatabel.'_ISNOTABIL'=>$is_notabil
				,''.$this->namatabel.'_ISJNSPENETAPAN'=>$hit_carapenghitungan
				,''.$this->namatabel.'_THNMULAIJUAL'=>substr($arr_tglawal[2], -2)
				,''.$this->namatabel.'_BLNMULAIJUAL'=>$arr_tglawal[1]
				,''.$this->namatabel.'_TGLMULAIJUAL'=>$arr_tglawal[0]
				,''.$this->namatabel.'_THNAKHIRJUAL'=>substr($arr_tglakhir[2], -2)
				,''.$this->namatabel.'_BLNAKHIRJUAL'=>$arr_tglakhir[1]
				,''.$this->namatabel.'_TGLAKHIRJUAL'=>$arr_tglakhir[0]
				,''.$this->namatabel.'_JUMLAHHARIJUAL'=>$hit_jumlahhari
				,''.$this->namatabel.'_OMSETPAJAK'=>$omzet
				,''.$this->namatabel.'_PERSENTARIF'=>$tarif_rekening
				,''.$this->namatabel.'_PAJAK'=>null
				,''.$this->namatabel.'_PAJAKSKPD'=>$hit_pajak
				,''.$this->namatabel.'_THNSPTPD'=>isset($arr_tglsptpd[2]) ? substr($arr_tglsptpd[2], -2) : ''
				,''.$this->namatabel.'_BLNSPTPD'=>isset($arr_tglsptpd[1]) ? $arr_tglsptpd[1] : ''
				,''.$this->namatabel.'_TGLSPTPD'=>isset($arr_tglsptpd[0]) ? $arr_tglsptpd[0] : ''
				,''.$this->namatabel.'_THNTERIMA'=>substr($arr_tglterimasptpd[2],-2)
				,''.$this->namatabel.'_BLNTERIMA'=>$arr_tglterimasptpd[1]
				,''.$this->namatabel.'_TGLTERIMA'=>$arr_tglterimasptpd[0]
				,''.$this->namatabel.'_THNBATASSPTPD'=>substr($arr_tglbatassptpd[2],-2)
				,''.$this->namatabel.'_BLNBATASSPTPD'=>$arr_tglbatassptpd[1]
				,''.$this->namatabel.'_TGLBATASSPTPD'=>$arr_tglbatassptpd[0]
				,''.$this->namatabel.'_THNENTRI'=>substr($arr_tglentrisptpd[2],-2)
				,''.$this->namatabel.'_BLNENTRI'=>$arr_tglentrisptpd[1]
				,''.$this->namatabel.'_TGLENTRI'=>$arr_tglentrisptpd[0]
				,''.$this->namatabel.'_BUNGASPTPD'=>$hit_bungaspt
			);

			$simpan = $command->update(''.$this->namatabel.'', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPAJAK AND TBLPENDATAAN_BLNPAJAK =:BLNPAJAK',array(':NOPOK' => $nopokok, ':THNPAJAK' =>substr($tahun_pajak, -2), ':BLNPAJAK' => $bulan_pajak));
			if ($simpan) {
				$res['status'] = 'update';
			}else{
				$res['status'] = 'failed';
			}			
		}else{
			$res['data'] = 'tidak';
			$insert = Yii::app()->db->createCommand();
			$simpan = $insert->insert(''.$this->namatabel.'', array(
				'TBLPENDATAAN_THNPAJAK'=>substr($tahun_pajak, -2)
				,'TBLPENDATAAN_BLNPAJAK'=>$bulan_pajak
				,'TBLPENDATAAN_TGLPAJAK'=>$tanggal_pajak
				,'TBLDAFTAR_NOPOK'=>$nopokok
				,'TBLDAFTAR_JNSPENDAPATAN'=>'P'
				,'TBLDAFTAR_GOLONGAN'=>3
				,''.$this->namatabel.'_REKURUSAN'=>1
				,''.$this->namatabel.'_REKPEMERINTAHAN'=>20
				,''.$this->namatabel.'_REKORGANISASI'=>1
				,''.$this->namatabel.'_REKPROGRAM'=>20
				,''.$this->namatabel.'_REKKEGIATAN'=>26
				,''.$this->namatabel.'_REKDINAS'=>0
				,''.$this->namatabel.'_REKBIDANG'=>0
				,''.$this->namatabel.'_REKPENDAPATAN'=>$refbadanusaha_rekpendapatan
				,''.$this->namatabel.'_REKPAD'=>$refbadanusaha_rekpad
				,''.$this->namatabel.'_REKPAJAK'=>$refbadanusaha_rekpjk
				,''.$this->namatabel.'_REKAYAT'=>$refbadanusaha_rekayat
				,''.$this->namatabel.'_REKJENIS'=>$refbadanusaha_rekjenis
				,'TBLKECAMATAN_ID'=>$kecamatan_pajak
				,'TBLKELURAHAN_ID'=>$kelurahan_pajak
					    //,''.$this->namatabel.'_ISKAS'=>$is_kas
					    //,''.$this->namatabel.'_ISPEMBUKUAN'=>$is_pembukuan
					    // /,''.$this->namatabel.'_ISNOTA'=>$is_nota
				,''.$this->namatabel.'_ISLHP'=>$is_lhp
				,''.$this->namatabel.'_ISNOTABIL'=>$is_notabil
				,''.$this->namatabel.'_ISJNSPENETAPAN'=>$hit_carapenghitungan
				,''.$this->namatabel.'_THNMULAIJUAL'=>substr($arr_tglawal[2], -2)
				,''.$this->namatabel.'_BLNMULAIJUAL'=>$arr_tglawal[1]
				,''.$this->namatabel.'_TGLMULAIJUAL'=>$arr_tglawal[0]
				,''.$this->namatabel.'_THNAKHIRJUAL'=>substr($arr_tglakhir[2], -2)
				,''.$this->namatabel.'_BLNAKHIRJUAL'=>$arr_tglakhir[1]
				,''.$this->namatabel.'_TGLAKHIRJUAL'=>$arr_tglakhir[0]
				,''.$this->namatabel.'_JUMLAHHARIJUAL'=>$hit_jumlahhari
				,''.$this->namatabel.'_OMSETPAJAK'=>$omzet
				,''.$this->namatabel.'_PERSENTARIF'=>$tarif_rekening
				,''.$this->namatabel.'_THNSPTPD'=>isset($arr_tglsptpd[2]) ? substr($arr_tglsptpd[2], -2) : ''
				,''.$this->namatabel.'_BLNSPTPD'=>$bulan_pajak
				,''.$this->namatabel.'_TGLSPTPD'=>'1'
				,''.$this->namatabel.'_THNTERIMA'=>substr($arr_tglterimasptpd[2],-2)
				,''.$this->namatabel.'_BLNTERIMA'=>$bulan_pajak
				,''.$this->namatabel.'_TGLTERIMA'=>'1'
				,''.$this->namatabel.'_THNBATASSPTPD'=>substr($arr_tglbatassptpd[2],-2)
				,''.$this->namatabel.'_BLNBATASSPTPD'=>$bulan_pajak
				,''.$this->namatabel.'_TGLBATASSPTPD'=>$arr_tglbatassptpd[0]
				,''.$this->namatabel.'_THNENTRI'=>substr($arr_tglentrisptpd[2],-2)
				,''.$this->namatabel.'_BLNENTRI'=>$bulan_pajak
				,''.$this->namatabel.'_TGLENTRI'=>'0'
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
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM '.$this->namatabel.' WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;
	}

	public function actionDelt()
	{
		$nopok = intval($_POST['nomor_pajak']);
		$bulan = (int)trim($_POST['bulan']);
		$tahun = intval($_POST['tahun']);
		$tgl = isset($_REQUEST['tgl']) ? (int)$_REQUEST['tgl'] : '';
		$thn = substr($tahun, -2);

		$dt = Yii::app()->db->createCommand('SELECT NVL('.$this->namatabel.'_TGLENTRI, 0) AS TGLENTRI FROM '.$this->namatabel.' WHERE 
			TBLPENDATAAN_THNPAJAK ='.$thn.' 
			AND TBLPENDATAAN_BLNPAJAK='.$bulan.' 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.'
			AND TBLDAFTAR_NOPOK='.$nopok
		)->queryRow();

		if ($dt && $dt['TGLENTRI']==0) {
			$del = Yii::app()->db->createCommand()->delete(''.$this->namatabel.'', '
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
