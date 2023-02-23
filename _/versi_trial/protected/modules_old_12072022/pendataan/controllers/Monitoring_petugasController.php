<?php

class Monitoring_petugasController extends Controller
{
	// var $KODE_GOL = 3;
	// var $PAJAK_AYAT = 1;
	// var $PAJAK_REK = '4.1.1.1.0';
	public function actionIndex()
	{
		// $data['sub_rek'] = TRekening::model()->getRekeningSubAktif('4110100');
		/*SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.1.%'
		ORDER BY TBLREKENING_KODE*/
		$data['rek'] = Yii::app()->db->createCommand('
			SELECT
			*
			FROM
			TBLREKENING
			WHERE
			TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			AND TBLREKENING_REKAYAT <> 4
			AND TBLREKENING_REKAYAT <> 5
			AND TBLREKENING_REKAYAT <> 8
			AND TBLREKENING_REKAYAT <> 10
			AND TBLREKENING_REKAYAT <> 11
			AND TBLREKENING_REKAYAT <> 23			
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			')->queryAll();
		$data['sub_rek'] = Yii::app()->db->createCommand("
		SELECT * 
		FROM TBLREKENING
		-- WHERE TBLREKENING_KODE LIKE '4.1.1.1.%'
		ORDER BY TBLREKENING_KODE
		")
		->queryAll();
		
		$this->renderPartial('index', array('data'=>$data));
	}
	public function actiongetdata()
	{	
		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';

		switch ( $rek ) {
			case '1':
				$namaTBL = 'TBLDAFTHOTEL';
				$KODE_GOL = 3;
				$PAJAK_AYAT = 1;
				$PAJAK_REK = '4.1.1.1.0';
				break;
			
			case '2':
				$namaTBL = 'TBLDAFTRMAKAN';
				$KODE_GOL = 3;
				$PAJAK_AYAT = 2;
				$PAJAK_REK = '4.1.1.2.0';
				break;
			
			case '3':
				$namaTBL = 'TBLDAFTHIBURAN';
				$KODE_GOL = 4;
				$PAJAK_AYAT = 1;
				$PAJAK_REK = '4.1.1.3.0';
				break;
			
			case '7':
				$namaTBL = 'TBLDAFTPARKIR';
				$KODE_GOL = 2;
				$PAJAK_AYAT = 7;
				$PAJAK_REK = '4.1.1.7.0';
				break;

			case '9':
				$namaTBL = 'TBLDAFTBURUNG';
				$KODE_GOL = 1;
				$PAJAK_AYAT = 9;
				$PAJAK_REK = '4.1.1.9.0';
				break;
			
			default:
				$namaTBL = 'TBLDAFTHOTEL';
				break;
		}

		$NOPOK = trim($_POST['nomor_pajak']);
		$bulan = (int)trim($_POST['bulan']);
		$tahun = intval($_POST['tahun']);
		$tgl = isset($_REQUEST['tgl']) ? (int)$_REQUEST['tgl'] : '0';
		$thn = substr($tahun, -2);
		$data = array();
		$cek = $this->cekPernahDaftar($namaTBL, substr($tahun, -2), $bulan, (int)$tgl, $NOPOK);
		$proses = $this->cekProses($namaTBL, substr($tahun, -2), $bulan, (int)$tgl, $NOPOK);
		$teguran = $this->cekTeguran($namaTBL, substr($tahun, -2), $bulan, (int)$tgl, $NOPOK);

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
			".$namaTBL.".TBLPENDATAAN_THNPAJAK,
			".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
			NVL(".$namaTBL.".".$namaTBL."_OMSETPAJAK, 0) AS ".$namaTBL."_OMSETPAJAK,
			NVL(".$namaTBL.".".$namaTBL."_PAJAK, 0) AS ".$namaTBL."_PAJAK,
			NVL(".$namaTBL.".".$namaTBL."_BUNGASPTPD, 0) AS ".$namaTBL."_BUNGASPTPD,
			".$namaTBL.".".$namaTBL."_THNSPTPD,
			".$namaTBL.".".$namaTBL."_BLNSPTPD,
			".$namaTBL.".".$namaTBL."_TGLSPTPD,
			".$namaTBL.".".$namaTBL."_THNBATASSPTPD,
			".$namaTBL.".".$namaTBL."_BLNBATASSPTPD,
			".$namaTBL.".".$namaTBL."_TGLBATASSPTPD,
			".$namaTBL.".".$namaTBL."_THNTERIMA,
			".$namaTBL.".".$namaTBL."_BLNTERIMA,
			".$namaTBL.".".$namaTBL."_TGLTERIMA,
			".$namaTBL.".".$namaTBL."_THNENTRI,
			".$namaTBL.".".$namaTBL."_BLNENTRI,
			".$namaTBL.".".$namaTBL."_TGLENTRI
			";
			$from = 'TBLDAFTAR';
			$filter = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $NOPOK
			);

			$filter_AND = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $KODE_GOL
				,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $PAJAK_AYAT
				,'EQ__'.$namaTBL.'.TBLPENDATAAN_THNPAJAK' => $thn
				,'EQ__'.$namaTBL.'.TBLPENDATAAN_BLNPAJAK' => $bulan
				// ,'EQ__'.$namaTBL.'.TBLPENDATAAN_TGLPAJAK' => $tgl
				// ,'EQ__tblsubyek_isaktif' => "T"
			);

			$otherquery = array(
				'limit'=> 30
				,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID = TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
				,'join_2'=> array(''.$namaTBL.'', 'TBLDAFTAR.TBLDAFTAR_NOPOK = '.$namaTBL.'.TBLDAFTAR_NOPOK')
				,'order'=> 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC'
				,'andwhere'=> 'NVL('.$namaTBL.'.TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.''  
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

			$data['OMSETPAJAK'] =$model[''.$namaTBL.'_OMSETPAJAK'];
			$data['PAJAK'] =$model[''.$namaTBL.'_PAJAK'];
			$data['BUNGASPTPD'] =$model[''.$namaTBL.'_BUNGASPTPD'];

			$data['THNSPTPD'] =$model[''.$namaTBL.'_THNSPTPD'];
			$data['BLNSPTPD'] =$model[''.$namaTBL.'_BLNSPTPD'];
			$data['TGLSPTPD'] =$model[''.$namaTBL.'_TGLSPTPD'];

			$data['THNBATASSPTPD'] =$model[''.$namaTBL.'_THNBATASSPTPD'];
			$data['BLNBATASSPTPD'] =$model[''.$namaTBL.'_BLNBATASSPTPD'];
			$data['TGLBATASSPTPD'] =$model[''.$namaTBL.'_TGLBATASSPTPD'];

			$data['THNTERIMA'] =$model[''.$namaTBL.'_THNTERIMA'];
			$data['BLNTERIMA'] =$model[''.$namaTBL.'_BLNTERIMA'];
			$data['TGLTERIMA'] =$model[''.$namaTBL.'_TGLTERIMA'];
			
			$data['THNENTRI'] =$model[''.$namaTBL.'_THNENTRI'];
			$data['BLNENTRI'] =$model[''.$namaTBL.'_BLNENTRI'];
			$data['TGLENTRI'] =$model[''.$namaTBL.'_TGLENTRI'];

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
			'EQ__TBLDAFTAR_GOLONGAN' => $KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $PAJAK_AYAT
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
		
		$data['JUMLAH_HARI'] = $jmlhari-1;
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
		$tglbatas = RefTGLBatas::model()->get($PAJAK_REK, $thnbatas, $blnbatas).'-'.($blnbatas<10 ? '0'.$blnbatas : $blnbatas).'-20'.$thnbatas;
		$tglbatasbulanini = RefTGLBatas::model()->get($PAJAK_REK, substr(date('Y'),-2), date('n')).'-'.($blnbatas<10 ? '0'.$blnbatas : $blnbatas).'-20'.$thnbatas;
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
	
	public function actionkosongkan_rp(){
		$nopok = trim($_REQUEST['NOPOK']);
		$tglentri = trim($_REQUEST['TGLENTRI']);
		
		$column = array(
					 'TBLDAFHOTEL_PAJAKSKPD'=>''
				    ,'TBLDAFTHOTEL_JUMLAHHARIJUAL'=>''
					,'TBLDAFTHOTEL_OMSETPAJAK'=>'0'
					,'TBLDAFTHOTEL_PAJAK'=>''
					,'TBLDAFTHOTEL_BUNGASPTPD'=>''
					,'TBLDAFTHOTEL_PAJAK'=>''
					,'TBLDAFTHOTEL_THNSKPD'=>''
					,'TBLDAFTHOTEL_BLNSKPD'=>''
					,'TBLDAFTHOTEL_TGLSKPD'=>''
					,'TBLDAFTHOTEL_PAJAKSKPD'=>''
					,'TBLDAFTHOTEL_THNBATASSKPD'=>''
					,'TBLDAFTHOTEL_BLNBATASSKPD'=>''
					,'TBLDAFTHOTEL_TGLBATASSKPD'=>''
					);
		$simpan = $command->update('TBLDAFTHOTEL', $column, 'TBLDAFTAR_NOPOK =:NOPOK  NVL(TBLPENDATAAN_TGLENTRI, 0) =:TGLPAJAK',array(':NOPOK' => $nopok, ':TGLPAJAK' => (int)$tglentri));
			if ($simpan) {
				$res['status'] = 'success';
			}else{
				$res['status'] = 'failed';
			}
	}
	
	public function actionsimpandata()
	{
		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';

		switch ( $rek ) {
			case '1':
				$namaTBL = 'TBLDAFTHOTEL';
				$KODE_GOL = 3;
				$PAJAK_AYAT = 1;
				$PAJAK_REK = '4.1.1.1.0';
				break;
			
			case '2':
				$namaTBL = 'TBLDAFTRMAKAN';
				$KODE_GOL = 3;
				$PAJAK_AYAT = 2;
				$PAJAK_REK = '4.1.1.2.0';
				break;
			
			case '3':
				$namaTBL = 'TBLDAFTHIBURAN';
				$KODE_GOL = 4;
				$PAJAK_AYAT = 1;
				$PAJAK_REK = '4.1.1.3.0';
				break;
			
			case '7':
				$namaTBL = 'TBLDAFTPARKIR';
				$KODE_GOL = 2;
				$PAJAK_AYAT = 7;
				$PAJAK_REK = '4.1.1.7.0';
				break;

			case '9':
				$namaTBL = 'TBLDAFTBURUNG';
				$KODE_GOL = 1;
				$PAJAK_AYAT = 9;
				$PAJAK_REK = '4.1.1.9.0';
				break;
			
			default:
				$namaTBL = 'TBLDAFTHOTEL';
				break;
		}
		// echo $namaTBL;Yii::app()->end();
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
		$cek = $this->cekPernahDaftar($namaTBL, substr($tahun_pajak, -2), $bulan_pajak, $tanggal_pajak, $nopokok);
		
		$column = array('TBLPENDATAAN_THNPAJAK'=>substr($tahun_pajak, -2)
				    ,'TBLPENDATAAN_BLNPAJAK'=>$bulan_pajak
				    ,'TBLPENDATAAN_TGLPAJAK'=>$tanggal_pajak
				    ,'TBLDAFTAR_NOPOK'=>$nopokok
				    ,'TBLDAFTAR_JNSPENDAPATAN'=>'P'
				    ,'TBLDAFTAR_GOLONGAN'=>3
				    ,''.$namaTBL.'_REKURUSAN'=>1
				    ,''.$namaTBL.'_REKPEMERINTAHAN'=>20
				    ,''.$namaTBL.'_REKORGANISASI'=>1
				    ,''.$namaTBL.'_REKPROGRAM'=>20
				    ,''.$namaTBL.'_REKKEGIATAN'=>26
				    ,''.$namaTBL.'_REKDINAS'=>0
				    ,''.$namaTBL.'_REKBIDANG'=>0
				    ,''.$namaTBL.'_REKPENDAPATAN'=>$refbadanusaha_rekpendapatan
				    ,''.$namaTBL.'_REKPAD'=>$refbadanusaha_rekpad
				    ,''.$namaTBL.'_REKPAJAK'=>$refbadanusaha_rekpjk
				    ,''.$namaTBL.'_REKAYAT'=>$refbadanusaha_rekayat
				    ,''.$namaTBL.'_REKJENIS'=>$refbadanusaha_rekjenis
				    ,'TBLKECAMATAN_ID'=>$kecamatan_pajak
				    ,'TBLKELURAHAN_ID'=>$kelurahan_pajak
				    //,''.$namaTBL.'_ISKAS'=>$is_kas
				    //,''.$namaTBL.'_ISPEMBUKUAN'=>$is_pembukuan
				    // /,''.$namaTBL.'_ISNOTA'=>$is_nota
				    ,''.$namaTBL.'_ISLHP'=>$is_lhp
				    ,''.$namaTBL.'_ISNOTABIL'=>$is_notabil
				    ,''.$namaTBL.'_ISJNSPENETAPAN'=>$hit_carapenghitungan
				    ,''.$namaTBL.'_THNMULAIJUAL'=>substr($arr_tglawal[2], -2)
				    ,''.$namaTBL.'_BLNMULAIJUAL'=>$arr_tglawal[1]
				    ,''.$namaTBL.'_TGLMULAIJUAL'=>$arr_tglawal[0]
				    ,''.$namaTBL.'_THNAKHIRJUAL'=>substr($arr_tglakhir[2], -2)
				    ,''.$namaTBL.'_BLNAKHIRJUAL'=>$arr_tglakhir[1]
				    ,''.$namaTBL.'_TGLAKHIRJUAL'=>$arr_tglakhir[0]
				    ,''.$namaTBL.'_JUMLAHHARIJUAL'=>$hit_jumlahhari
				    ,''.$namaTBL.'_OMSETPAJAK'=>$omzet
				    ,''.$namaTBL.'_PERSENTARIF'=>$tarif_rekening
				    ,''.$namaTBL.'_PAJAK'=>$hit_pajak
				    ,''.$namaTBL.'_PAJAKSKPD'=>$hit_pajak
				    ,''.$namaTBL.'_THNSPTPD'=>isset($arr_tglsptpd[2]) ? substr($arr_tglsptpd[2], -2) : ''
				    ,''.$namaTBL.'_BLNSPTPD'=>isset($arr_tglsptpd[1]) ? $arr_tglsptpd[1] : ''
				    ,''.$namaTBL.'_TGLSPTPD'=>isset($arr_tglsptpd[0]) ? $arr_tglsptpd[0] : ''
				    ,''.$namaTBL.'_THNTERIMA'=>substr($arr_tglterimasptpd[2],-2)
				    ,''.$namaTBL.'_BLNTERIMA'=>$arr_tglterimasptpd[1]
				    ,''.$namaTBL.'_TGLTERIMA'=>$arr_tglterimasptpd[0]
				    ,''.$namaTBL.'_THNBATASSPTPD'=>substr($arr_tglbatassptpd[2],-2)
				    ,''.$namaTBL.'_BLNBATASSPTPD'=>$arr_tglbatassptpd[1]
				    ,''.$namaTBL.'_TGLBATASSPTPD'=>$arr_tglbatassptpd[0]
				    ,''.$namaTBL.'_THNENTRI'=>substr($arr_tglentrisptpd[2],-2)
				    ,''.$namaTBL.'_BLNENTRI'=>$arr_tglentrisptpd[1]
				    ,''.$namaTBL.'_TGLENTRI'=>$arr_tglentrisptpd[0]
				    ,''.$namaTBL.'_BUNGASPTPD'=>$hit_bungaspt
				);
		if ($cek>0) {
			$res['data'] = 'ada';
			$command = Yii::app()->db->createCommand();

			$simpan = $command->update(''.$namaTBL.'', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPAJAK AND TBLPENDATAAN_BLNPAJAK =:BLNPAJAK AND NVL(TBLPENDATAAN_TGLPAJAK, 0) =:TGLPAJAK',array(':NOPOK' => $nopokok, ':THNPAJAK' =>substr($tahun_pajak, -2), ':BLNPAJAK' => $bulan_pajak, ':TGLPAJAK' => (int)$tanggal_pajak));
			if ($simpan) {
				$res['status'] = 'update';
			}else{
				$res['status'] = 'failed';
			}
		} else {
			$res['data'] = 'tidak';
			$insert = Yii::app()->db->createCommand();
			$simpan = $insert->insert(''.$namaTBL.'', $column);
			if ($simpan) {
				$res['status'] = 'success';
			}else{
				$res['status'] = 'failed';
			}
		}
		echo CJSON::encode($res);
	}

	public function cekProses($namaTBL, $thn, $bulan, $tgl, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT '.$namaTBL.'_RUPIAHSETOR FROM '.$namaTBL.' WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;

	}

	public function cekPernahDaftar($namaTBL, $thn, $bulan, $tgl, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM '.$namaTBL.' WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;
	}

	public function cekTeguran($namaTBL, $thn, $bulan, $tgl, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT '.$namaTBL.'_TGLENTRI FROM '.$namaTBL.' WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
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

	public function actionDelt()
	{	
		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';

		switch ( $rek ) {
			case '1':
				$namaTBL = 'TBLDAFTHOTEL';
				$KODE_GOL = 3;
				$PAJAK_AYAT = 1;
				$PAJAK_REK = '4.1.1.1.0';
				break;
			
			case '2':
				$namaTBL = 'TBLDAFTRMAKAN';
				$KODE_GOL = 3;
				$PAJAK_AYAT = 2;
				$PAJAK_REK = '4.1.1.2.0';
				break;
			
			case '3':
				$namaTBL = 'TBLDAFTHIBURAN';
				$KODE_GOL = 4;
				$PAJAK_AYAT = 1;
				$PAJAK_REK = '4.1.1.3.0';
				break;
			
			case '7':
				$namaTBL = 'TBLDAFTPARKIR';
				$KODE_GOL = 2;
				$PAJAK_AYAT = 7;
				$PAJAK_REK = '4.1.1.7.0';
				break;

			case '9':
				$namaTBL = 'TBLDAFTBURUNG';
				$KODE_GOL = 1;
				$PAJAK_AYAT = 9;
				$PAJAK_REK = '4.1.1.9.0';
				break;
			
			default:
				$namaTBL = 'TBLDAFTHOTEL';
				break;
		}
		$nopok = intval($_POST['nomor_pajak']);
		$bulan = (int)trim($_POST['bulan']);
		$tahun = intval($_POST['tahun']);
		$tgl = isset($_REQUEST['tgl']) ? (int)$_REQUEST['tgl'] : '0';
		$thn = substr($tahun, -2);

		$dt = Yii::app()->db->createCommand('SELECT NVL('.$namaTBL.'_TGLENTRI, 0) AS TGLENTRI FROM '.$namaTBL.' WHERE 
			TBLPENDATAAN_THNPAJAK ='.$thn.' 
			AND TBLPENDATAAN_BLNPAJAK='.$bulan.' 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.'
			AND TBLDAFTAR_NOPOK='.$nopok
		)->queryRow();

		if ($dt && $dt['TGLENTRI']==0) {
			$del = Yii::app()->db->createCommand()->delete(''.$namaTBL.'', '
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