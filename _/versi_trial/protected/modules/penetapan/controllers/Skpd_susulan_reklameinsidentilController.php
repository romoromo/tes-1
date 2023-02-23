<?php

class Skpd_susulan_reklameinsidentilController extends Controller
{
	var $KODE_GOL = 2;
	var $PAJAK_AYAT = 4;
	var $PAJAK_REK = '4.1.1.4.0';
	var $MODULE_URL = 'pendataan/reklame2016_tetap';
	public function actionIndex()
	{
		// $data['rek'] = TRekening::model()->getRekeningSubAktif('4110400');
		$data['rek'] = Yii::app()->db->createCommand("
			SELECT
			RREKRNDBARU.*
			, NMREK AS TREKENING_NAMA
			, URS || '.' || PEM || '.' || ORG || '.' || PRG || '.' || KGT || '.' || DIN || '.' || BID || '.' || PEND || '.' || PAD || '.' || PJK || '.' || AYT || '.' || JEN || '.' || SUB AS TREKENING_KODEFULL
			, PEND || '.' || PAD || '.' || PJK || '.' || AYT || '.' || JEN AS TREKENING_KODE 
			FROM
			RREKRNDBARU
			WHERE
			NMREK IS NOT NULL
			AND NOPD = '11'
			AND SATUAN <> 'M2/TH'
			AND (PEND || '.' || PAD || '.' || PJK || '.' || AYT || '.' || JEN) LIKE '4.1.1.4.%'
			AND JEN NOT IN ( '83','84','85','86','87','88','89','91','92','93','90' )
			ORDER BY JEN
		")->queryAll();

		$data['list_kelasjalanskorkawasan'] = Yii::app()->db->createCommand('SELECT * FROM RREKKAWASAN')->queryAll();
		$data['list_sdpandang'] = Yii::app()->db->createCommand('SELECT * FROM RREKSUDUTPANDANG WHERE RREKKAWASAN_ID=2')->queryAll();
		$data['list_jnsrektrf'] = Yii::app()->db->createCommand('SELECT * FROM RREKJNSREKTARIF')->queryAll();
		$data['list_jnsposisi'] = Yii::app()->db->createCommand('SELECT * FROM RREKJNSPOSISI')->queryAll();
		$data['list_ketinggian'] = Yii::app()->db->createCommand('SELECT * FROM RREKKETINGGIAN WHERE REFJENISREKLAMETARIF_ID=2')->queryAll();
		$data['refbobotreklame'] = Yii::app()->db->createCommand('SELECT * FROM RREKBOBOT')->queryRow();
		$data['list_jalan'] = Yii::app()->db->createCommand('SELECT * FROM RREKJALAN')->queryAll();
		$this->renderPartial('index', array('data'=>$data));
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

	public function actiongetdata()
	{
		$NOPOK = intval(base64_decode($_POST['nopok']));
		$tblpendataan_pajakke = intval(base64_decode($_POST['tblpendataan_pajakke']));
		$tahun = intval(base64_decode($_POST['tahun']));
		$bulan = intval(base64_decode($_POST['bulan']));
		
		$data = array();
		$cek = $this->cekPernahDaftar(substr($tahun, -2), $bulan, $tblpendataan_pajakke, $NOPOK);
		if ($cek>0) {
			$data['data'] = 'ada';
		}else{
			$data['data'] = 'tidak';
		}
		// $jmlhari = cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun);
		$jmlhari = 30;
		
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
		
		/*$data['JUMLAH_HARI'] = $jmlhari-1;
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
		// $data['TGL_BATAS'] = $tglbatas;
		$data['TGL_BATAS'] = $tglbatas . '-' .($blnbatas<10 ? '0'.$blnbatas : $blnbatas) . '-' . $tahun;
		$data['BULAN_DENDA'] = $bulan_denda;
		$data['PERSEN_DENDA'] = $bulan_denda*2;
		if (date('d')>date('d', strtotime($tglbatas))) {
			$data['BULAN_DENDA'] = $bulan_denda;
			$data['PERSEN_DENDA'] = $data['BULAN_DENDA']*2;
		}*/
		echo CJSON::encode($data);
	}

	public function cekPernahDaftar($thn, $bulan, $lokasi, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTREKLAME WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLPENDATAAN_PAJAKKE='.$lokasi.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;
	}

	public function actionsimpanPendataan()
	{
		Yii::import('ext.DMOrcl');
		Yii::import('ext.LokalIndonesia');

		$TBLDAFTAR_NOPOK = DMOrcl::getRequest('param', 'TBLDAFTAR_NOPOK');
		$TBLPENDATAAN_PAJAKKE = DMOrcl::getRequest('param', 'TBLPENDATAAN_PAJAKKE');
		
		$TBLPENDATAAN_THNPAJAK = DMOrcl::getRequest('param', 'TBLPENDATAAN_THNPAJAK');
		$TBLPENDATAAN_BLNPAJAK = DMOrcl::getRequest('param', 'TBLPENDATAAN_BLNPAJAK');
		$TBLPENDATAAN_TGLPAJAK = DMOrcl::getRequest('param', 'TBLPENDATAAN_TGLPAJAK');
		$TBLDAFTREKLAME_TGLSPTPD = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_TGLSPTPD');
		$TREKENINGSUB_KODE = (int)DMOrcl::getRequest('TBLDAFTREKLAME_TGLSPTPD');

		$TBLDAFTREKLAME_PENEMPATAN = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_PENEMPATAN');
		$TBLDAFTREKLAME_TGLIZIN = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_TGLIZIN');
		$TBLDAFTREKLAME_PERMOHONAN = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_PERMOHONAN');
		
		$TBLDAFTREKLAME_KETERANGAN1 = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_KETERANGAN1');
		$TBLDAFTREKLAME_KETERANGAN2 = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_KETERANGAN2');
		$TBLDAFTREKLAME_JMLHREKLAME = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_JMLHREKLAME');
		$TBLDAFTREKLAME_JNSREKLAME = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_JNSREKLAME');
		$TBLDAFTREKLAME_SKORKAWASAN = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_SKORKAWASAN');
		
		$TBLDAFTREKLAME_JUMLAHHARI = (int)DMOrcl::getRequest('param', 'TBLDAFTREKLAME_JUMLAHHARI');
		
		$RREKJNSREKTARIF_ID = DMOrcl::getRequest('param', 'RREKJNSREKTARIF_ID');
		$REFJALAN_ID = DMOrcl::getRequest('param', 'REFJALAN_ID');
		$REFSUDUTPANDANG_SKOR = DMOrcl::getRequest('param', 'REFSUDUTPANDANG_SKOR');
		$RREKJNSPOSISI_ID = DMOrcl::getRequest('param', 'RREKJNSPOSISI_ID');
		$TBLDAFTREKLAME_TINGGIREKLAME = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_TINGGIREKLAME');
		$REFKETINGGIAN_SKOR = DMOrcl::getRequest('param', 'REFKETINGGIAN_SKOR');
		
		$TBLDAFTREKLAME_PANJANG = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_PANJANG');
		$TBLDAFTREKLAME_LEBAR = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_LEBAR');
		$TBLDAFTREKLAME_ISIREKLAME = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_ISIREKLAME');
		$TBLDAFTREKLAME_PCRINGAN = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_PCRINGAN');
		$TBLDAFTREKLAME_NOSPT = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_NOSPT');
		
		$TBLDAFTREKLAME_NILAIKONTRAK = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_NILAIKONTRAK');
		$TBLDAFTREKLAME_TGLMULAIREKLAME = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_TGLMULAIREKLAME');
		$TBLDAFTREKLAME_TGLAKHIRREKLAME = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_TGLAKHIRREKLAME');
		$RREKBOBOT_KJALAN = DMOrcl::getRequest('param', 'RREKBOBOT_KJALAN');
		$RREKBOBOT_SUDUTPANDANG = DMOrcl::getRequest('param', 'RREKBOBOT_SUDUTPANDANG');
		$RREKBOBOT_KETINGGIAN = DMOrcl::getRequest('param', 'RREKBOBOT_KETINGGIAN');

		$TBLDAFTREKLAME_RPTARIF = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_RPTARIF');
		$TBLDAFTREKLAME_NILAISTRATEGIS = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_NILAISTRATEGIS');
		$TBLDAFTREKLAME_NSL = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_NSL');
		$TBLDAFTREKLAME_NILAISEWA = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_NILAISEWA');
		$TBLDAFTREKLAME_PERSENTARIF = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_PERSENTARIF');
		$TBLDAFTREKLAME_PAJAK = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_PAJAK');

		$TBLDAFTREKLAME_TGLTERIMA = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_TGLTERIMA');
		$TBLDAFTREKLAME_TGLBATASSPTPD = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_TGLBATASSPTPD');
		$TBLDAFTREKLAME_TGLENTRI = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_TGLENTRI');

		// $TBLKECAMATAN_ID = isset($_REQUEST['idkecamatan']) && !empty($_REQUEST['idkecamatan']) ? $_REQUEST['idkecamatan'] : 0;
		// $TBLKELURAHAN_ID = isset($_REQUEST['idkelurahan']) && !empty($_REQUEST['idkelurahan']) ? $_REQUEST['idkelurahan'] : 0;
		$TBLDAFTREKLAME_GOLONGAN = 1;
		$exp_TGLSPTPD = explode('-', $TBLDAFTREKLAME_TGLSPTPD);
		$exp_TGLMULAIREKLAME = explode('-', $TBLDAFTREKLAME_TGLMULAIREKLAME);
		$exp_TGLAKHIRREKLAME = explode('-', $TBLDAFTREKLAME_TGLAKHIRREKLAME);
		$exp_TGLTERIMA = explode('-', $TBLDAFTREKLAME_TGLTERIMA);
		$exp_TGLBATASSPTPD = explode('-', $TBLDAFTREKLAME_TGLBATASSPTPD);
		$exp_TGLENTRI = explode('-', $TBLDAFTREKLAME_TGLENTRI);
		$exp_TGLIZIN = explode('-', $TBLDAFTREKLAME_TGLIZIN);

		$insert = Yii::app()->db->createCommand();
		$simpan = $insert->insert('TBLDAFTREKLAME', array(
			'TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK,
			'TBLPENDATAAN_PAJAKKE' => $TBLPENDATAAN_PAJAKKE,

			'TBLPENDATAAN_THNPAJAK' => substr($TBLPENDATAAN_THNPAJAK, -2),
			'TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK,
			'TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK,	

			'TBLDAFTREKLAME_TGLSPTPD' => isset($exp_TGLSPTPD[0]) ? $exp_TGLSPTPD[0] : '',
			'TBLDAFTREKLAME_BLNSPTPD' => isset($exp_TGLSPTPD[1]) ? $exp_TGLSPTPD[1] : '',
			'TBLDAFTREKLAME_THNSPTPD' => isset($exp_TGLSPTPD[2]) ? substr($exp_TGLSPTPD[2], -2) : '',

			'TBLDAFTREKLAME_THNMULAIREKLAME' => isset($exp_TGLMULAIREKLAME[0]) ? $exp_TGLMULAIREKLAME[0] : '',
			'TBLDAFTREKLAME_BLNMULAIREKLAME' => isset($exp_TGLMULAIREKLAME[1]) ? $exp_TGLMULAIREKLAME[1] : '',
			'TBLDAFTREKLAME_TGLMULAIREKLAME' => isset($exp_TGLMULAIREKLAME[2]) ? substr($exp_TGLMULAIREKLAME[2], -2) : '',

			'TBLDAFTREKLAME_THNAKHIRREKLAME' => isset($exp_TGLAKHIRREKLAME[0]) ? $exp_TGLAKHIRREKLAME[0] : '',
			'TBLDAFTREKLAME_BLNAKHIRREKLAME' => isset($exp_TGLAKHIRREKLAME[1]) ? $exp_TGLAKHIRREKLAME[1] : '',
			'TBLDAFTREKLAME_TGLAKHIRREKLAME' => isset($exp_TGLAKHIRREKLAME[2]) ? substr($exp_TGLAKHIRREKLAME[2], -2) : '',

			'TBLDAFTREKLAME_JUMLAHHARI' => $TBLDAFTREKLAME_JUMLAHHARI,

			'TBLDAFTREKLAME_TGLIZIN' => isset($exp_TGLIZIN[0]) ? $exp_TGLIZIN[0] : '',
			'TBLDAFTREKLAME_BLNIZIN' => isset($exp_TGLIZIN[1]) ? $exp_TGLIZIN[1] : '',
			'TBLDAFTREKLAME_THNIZIN' => isset($exp_TGLIZIN[2]) ? substr($exp_TGLIZIN[2], -2) : '',

			'TBLDAFTREKLAME_PENEMPATAN' => $TBLDAFTREKLAME_PENEMPATAN,
			'TBLDAFTREKLAME_PERMOHONAN' => $TBLDAFTREKLAME_PERMOHONAN,
			'TBLDAFTREKLAME_KETERANGAN1' => $TBLDAFTREKLAME_KETERANGAN1,
			'TBLDAFTREKLAME_KETERANGAN2' => $TBLDAFTREKLAME_KETERANGAN2,

			'TBLDAFTREKLAME_JMLHREKLAME' => $TBLDAFTREKLAME_JMLHREKLAME,
			'TBLDAFTREKLAME_JNSREKLAME' => $TBLDAFTREKLAME_JNSREKLAME,
			'TBLDAFTREKLAME_SKORKAWASAN' => $TBLDAFTREKLAME_SKORKAWASAN,

			'RREKJNSREKTARIF_ID' => $RREKJNSREKTARIF_ID,
			'REFJALAN_ID' => $REFJALAN_ID,
			'REFSUDUTPANDANG_SKOR' => $REFSUDUTPANDANG_SKOR,
			'REFJENISPOSISI_ID' => $RREKJNSPOSISI_ID,
			'TBLDAFTREKLAME_TINGGIREKLAME' => $TBLDAFTREKLAME_TINGGIREKLAME,
			'REFKETINGGIAN_SKOR' => $REFKETINGGIAN_SKOR,

			'TBLDAFTREKLAME_PANJANG' => $TBLDAFTREKLAME_PANJANG,
			'TBLDAFTREKLAME_LEBAR' => $TBLDAFTREKLAME_LEBAR,
			'TBLDAFTREKLAME_ISIREKLAME' => $TBLDAFTREKLAME_ISIREKLAME,

			'TBLDAFTREKLAME_PCRINGAN' => $TBLDAFTREKLAME_PCRINGAN,
			// 'TBLDAFTREKLAME_NOSPT' => $TBLDAFTREKLAME_NOSPT,
			'TBLDAFTREKLAME_NILAIKONTRAK' => LokalIndonesia::toAngka($TBLDAFTREKLAME_NILAIKONTRAK),
			// 'TBLDAFTREKLAME_TGLMULAIREKLAME' => $TBLDAFTREKLAME_TGLMULAIREKLAME,
			// 'TBLDAFTREKLAME_TGLAKHIRREKLAME' => $TBLDAFTREKLAME_TGLAKHIRREKLAME,

			'TBLDAFTREKLAME_BOBOTJALAN' => $RREKBOBOT_KJALAN,
			// 'RREKBOBOT_SUDUTPANDANG' => $RREKBOBOT_SUDUTPANDANG,
			'REFBOBOTREKLAME_KETINGGIAN' => $RREKBOBOT_KETINGGIAN,

			// 'TBLDAFTREKLAME_RPTARIF' => $TBLDAFTREKLAME_RPTARIF,
			'TBLDAFTREKLAME_NILAISTRATEGIS' => $TBLDAFTREKLAME_NILAISTRATEGIS,
			// 'TBLDAFTREKLAME_NSL' => $TBLDAFTREKLAME_NSL,
			'TBLDAFTREKLAME_NILAISEWA' => $TBLDAFTREKLAME_NILAISEWA,
			'TBLDAFTREKLAME_PERSENTARIF' => $TBLDAFTREKLAME_PERSENTARIF,
			'TBLDAFTREKLAME_PAJAK' => $TBLDAFTREKLAME_PAJAK,

			'TBLDAFTREKLAME_TGLTERIMA' => isset($exp_TGLTERIMA[0]) ? $exp_TGLTERIMA[0] : '',
			'TBLDAFTREKLAME_BLNTERIMA' => isset($exp_TGLTERIMA[1]) ? $exp_TGLTERIMA[1] : '',
			'TBLDAFTREKLAME_THNTERIMA' => isset($exp_TGLTERIMA[2]) ? substr($exp_TGLTERIMA[2], -2) : '',

			'TBLDAFTREKLAME_TGLBATASSPTPD' => isset($exp_TGLBATASSPTPD[0]) ? $exp_TGLBATASSPTPD[0] : '',
			'TBLDAFTREKLAME_BLNBATASSPTPD' => isset($exp_TGLBATASSPTPD[1]) ? $exp_TGLBATASSPTPD[1] : '',
			'TBLDAFTREKLAME_THNBATASSPTPD' => isset($exp_TGLBATASSPTPD[2]) ? substr($exp_TGLBATASSPTPD[2], -2) : '',

			'TBLDAFTREKLAME_TGLENTRI' => isset($exp_TGLENTRI[0]) ? $exp_TGLENTRI[0] : '',
			'TBLDAFTREKLAME_BLNENTRI' => isset($exp_TGLENTRI[1]) ? $exp_TGLENTRI[1] : '',
			'TBLDAFTREKLAME_THNENTRI' => isset($exp_TGLENTRI[2]) ? substr($exp_TGLENTRI[2], -2) : '',

		));

		if ($simpan>0) {
			echo CJSON::encode(array('status'=>'success'));
		}
		else{
			echo CJSON::encode(array('status'=>'failed'));
		}
	}
}