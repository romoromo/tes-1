<?php

class Reklame2016_insidentil_integrasiController extends Controller
{
	var $KODE_GOL = 2;
	var $PAJAK_AYAT = 4;
	var $PAJAK_REK = '4.1.1.4.0';
	var $MODULE_URL = 'pendataan/reklame2016_insidentil';
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
			OR JEN = '98'
			OR JEN = '99'
			OR JEN = '100'
			OR JEN = '101'
			OR JEN = '102'
			OR JEN = '106'
			OR JEN = '107'
			OR JEN = '108'
			ORDER BY JEN
		")->queryAll();

		$data['list_kelasjalanskorkawasan'] = Yii::app()->db->createCommand('SELECT * FROM RREKKAWASAN')->queryAll();
		$data['list_sdpandang'] = Yii::app()->db->createCommand('SELECT * FROM RREKSUDUTPANDANG WHERE RREKKAWASAN_ID=2')->queryAll();
		$data['list_sdpandang1'] = Yii::app()->db->createCommand('SELECT * FROM RREKSUDUTPANDANG WHERE REFJENISREKLAMETARIF_ID=1')->queryAll();
		$data['list_sdpandang2'] = Yii::app()->db->createCommand('SELECT * FROM RREKSUDUTPANDANG WHERE REFJENISREKLAMETARIF_ID=2')->queryAll();
		$data['list_jnsrektrf'] = Yii::app()->db->createCommand('SELECT * FROM RREKJNSREKTARIF')->queryAll();
		$data['list_jnsposisi'] = Yii::app()->db->createCommand('SELECT * FROM RREKJNSPOSISI')->queryAll();
		$data['list_ketinggian'] = Yii::app()->db->createCommand('SELECT * FROM RREKKETINGGIAN WHERE REFJENISREKLAMETARIF_ID=2')->queryAll();
		$data['list_ketinggian1'] = Yii::app()->db->createCommand('SELECT * FROM RREKKETINGGIAN WHERE REFJENISREKLAMETARIF_ID=1')->queryAll();
		$data['list_ketinggian2'] = Yii::app()->db->createCommand('SELECT * FROM RREKKETINGGIAN WHERE REFJENISREKLAMETARIF_ID=2')->queryAll();

		$data['refbobotreklame'] = Yii::app()->db->createCommand('SELECT * FROM RREKBOBOT')->queryRow();
		$data['list_jalan'] = Yii::app()->db->createCommand('SELECT * FROM RREKJALAN')->queryAll();
		$data['list_jalan'] = Yii::app()->db->createCommand('SELECT REFPANGGUNG_ID AS RREKJALAN_KODE, REFPANGGUNG_NAMA AS RREKJALAN_NAMAJALAN FROM RREKREFPANGGUNG')->queryAll();
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actioncetakPengambilan()
	{
		$this->renderPartial('cetak_perintahpengambilan');
	}

	public function actioncetakJabong()
	{
		$this->renderPartial('cetak_jabong');
	}

	public function actioncetakIzinReklame()
	{
		$this->renderPartial('cetak_izinreklame');
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
		$tgl_asli = base64_decode($_POST['tgl']);

		$tahun = substr($tgl_asli, -2);
		$bulan = substr($tgl_asli, 3, 2);
		$tgl = substr($tgl_asli, 0, 2);

		// $tahun = intval(base64_decode($_POST['tahun']));
		// $bulan = intval(base64_decode($_POST['bulan']));
		
		$data = array();
		$cek = $this->cekPernahDaftar(substr($tahun, -2), $bulan, $tgl, $tblpendataan_pajakke, $NOPOK);
		$proses = $this->cekProses(substr($tahun, -2), $bulan, $tgl, $tblpendataan_pajakke, $NOPOK);

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
			REFBADANUSAHA.REFBADANUSAHA_PERSEN,
			NVL(TBLDAFTREKLAME_REKJENIS, 0) AS TBLDAFTREKLAME_REKJENIS,


			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_TGLIZIN, 0) AS TBLDAFTREKLAME_TGLIZIN,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_BLNIZIN, 0) AS TBLDAFTREKLAME_BLNIZIN,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_THNIZIN, 0) AS TBLDAFTREKLAME_THNIZIN,
			
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSPTPD, TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRI) AS TBLDAFTREKLAME_TGLSPTPD,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSPTPD, TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRI) AS TBLDAFTREKLAME_BLNSPTPD,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_THNSPTPD, TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRI) AS TBLDAFTREKLAME_THNSPTPD,

			REPLACE(NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN1, '-'), '  ', '') AS TBLDAFTREKLAME_KETERANGAN1,
			REPLACE(NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN2, '-'), '  ', '') AS TBLDAFTREKLAME_KETERANGAN2,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_JMLHREKLAME, 0) AS TBLDAFTREKLAME_JMLHREKLAME,

			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_SKORKAWASAN,0) AS TBLDAFTREKLAME_SKORKAWASAN,
			
			NVL(TBLDAFTREKLAME.REFJALAN_ID, 0) AS REFJALAN_ID,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_TINGGIREKLAME, 0) AS TBLDAFTREKLAME_TINGGIREKLAME,
			NVL(TBLDAFTREKLAME.REFKETINGGIAN_SKOR,0) AS REFKETINGGIAN_SKOR,
			NVL(TBLDAFTREKLAME.REFJENISPOSISI_ID, 0) AS RREKJNSPOSISI_ID,
			TBLDAFTREKLAME.TBLDAFTREKLAME_PANJANG,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_LEBAR, 0) As TBLDAFTREKLAME_LEBAR,
			TBLDAFTREKLAME.TBLDAFTREKLAME_ISIREKLAME,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_PCRINGAN, 0) AS TBLDAFTREKLAME_PCRINGAN,

			
			TBLDAFTREKLAME.TBLDAFTREKLAME_TGLMULAIREKLAME,
			TBLDAFTREKLAME.TBLDAFTREKLAME_BLNMULAIREKLAME,
			TBLDAFTREKLAME.TBLDAFTREKLAME_THNMULAIREKLAME,

			TBLDAFTREKLAME.TBLDAFTREKLAME_TGLAKHIRREKLAME,
			TBLDAFTREKLAME.TBLDAFTREKLAME_BLNAKHIRREKLAME,
			TBLDAFTREKLAME.TBLDAFTREKLAME_THNAKHIRREKLAME,

			NVL(REFSUDUTPANDANG_SKOR, 0) AS REFSUDUTPANDANG_SKOR,
			NVL(RREKJNSREKTARIF_ID, 0) AS RREKJNSREKTARIF_ID,
			NVL(TBLDAFTREKLAME_NILAIKONTRAK, 0) AS TBLDAFTREKLAME_NILAIKONTRAK,
			NVL(TBLDAFTREKLAME_PENEMPATAN, '-') AS TBLDAFTREKLAME_PENEMPATAN,
			NVL(TBLDAFTREKLAME_PERMOHONAN, '-') AS TBLDAFTREKLAME_PERMOHONAN,
			NVL(NOSPT, 0) AS TBLDAFTREKLAME_NOSPTD,
			NVL(TAHUN_PERDA, '0') AS TAHUN_PERDA,

			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_JUMLAHHARI, 0) AS TBLDAFTREKLAME_JUMLAHHARI,
			TBLDAFTREKLAME.TBLDAFTREKLAME_THNTERIMA,
			TBLDAFTREKLAME.TBLDAFTREKLAME_BLNTERIMA,
			TBLDAFTREKLAME.TBLDAFTREKLAME_TGLTERIMA,
			TBLDAFTREKLAME.TBLDAFTREKLAME_THNBATASSPTPD,
			TBLDAFTREKLAME.TBLDAFTREKLAME_BLNBATASSPTPD,
			TBLDAFTREKLAME.TBLDAFTREKLAME_TGLBATASSPTPD,
			TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRI,
			TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRI,
			TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRI,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_NODAFTARIZIN, '-') AS TBLDAFTREKLAME_NODAFTARIZIN
		";
		$from = 'TBLDAFTAR';
		$filter = array(
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $NOPOK
			,'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK' => substr($tahun, -2)
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK' => $bulan
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK' => $tgl
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE' => $tblpendataan_pajakke
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'leftjoin'=> array('TBLDAFTREKLAME', 'TBLDAFTREKLAME.TBLDAFTAR_NOPOK= TBLDAFTAR.TBLDAFTAR_NOPOK')
			,'order'=> 'TBLDAFTAR_NOPOK ASC'
		);
		$model = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL') );
		
		if ($model) {
			$data['TBLDAFTAR_NOPOK'] =$model['TBLDAFTAR_NOPOK'];
			$data['TBLDAFTAR_BADANUSAHANAMA'] =$model['TBLDAFTAR_BADANUSAHANAMA'];
			$data['TBLDAFTAR_BADANUSAHAALAMAT'] =$model['TBLDAFTAR_BADANUSAHAALAMAT'];
			$data['REKENING_KODE'] =$model['REKENING_KODE'];
			$data['TREKENING_TARIF'] =$model['REFBADANUSAHA_PERSEN'];
			
			$data['REFBADANUSAHA_REKPENDAPATAN'] =$model['REFBADANUSAHA_REKPENDAPATAN'];
			$data['REFBADANUSAHA_REKPAD'] =$model['REFBADANUSAHA_REKPAD'];
			$data['REFBADANUSAHA_REKPJK'] =$model['REFBADANUSAHA_REKPJK'];
			$data['REFBADANUSAHA_REKAYAT'] =$model['REFBADANUSAHA_REKAYAT'];
			$data['REFBADANUSAHA_REKJENIS'] =$model['REFBADANUSAHA_REKJENIS'];
			$data['TBLDAFTREKLAME_REKJENIS'] =$model['TBLDAFTREKLAME_REKJENIS'];
			
			
			$data['TBLDAFTREKLAME_PENEMPATAN'] =$model['TBLDAFTREKLAME_PENEMPATAN'];
			$data['TBLDAFTREKLAME_TGLIZIN'] =$model['TBLDAFTREKLAME_TGLIZIN'];
			$data['TBLDAFTREKLAME_BLNIZIN'] =$model['TBLDAFTREKLAME_BLNIZIN'];
			$data['TBLDAFTREKLAME_THNIZIN'] =$model['TBLDAFTREKLAME_THNIZIN'];
			$data['TBLDAFTREKLAME_PERMOHONAN'] =$model['TBLDAFTREKLAME_PERMOHONAN'];
			$data['TBLDAFTREKLAME_NOSPTD'] =$model['TBLDAFTREKLAME_NOSPTD'];

			$data['TBLDAFTREKLAME_TGLSPTPD'] =$model['TBLDAFTREKLAME_TGLSPTPD'];
			$data['TBLDAFTREKLAME_BLNSPTPD'] =$model['TBLDAFTREKLAME_BLNSPTPD'];
			$data['TBLDAFTREKLAME_THNSPTPD'] =$model['TBLDAFTREKLAME_THNSPTPD'];
			$data['TBLDAFTREKLAME_KETERANGAN1'] =$model['TBLDAFTREKLAME_KETERANGAN1'];
			$data['TBLDAFTREKLAME_KETERANGAN2'] =$model['TBLDAFTREKLAME_KETERANGAN2'];
			$data['TBLDAFTREKLAME_JMLHREKLAME'] =$model['TBLDAFTREKLAME_JMLHREKLAME'];

			$data['TBLDAFTREKLAME_SKORKAWASAN'] =$model['TBLDAFTREKLAME_SKORKAWASAN'];
			$data['RREKJNSREKTARIF_ID'] =$model['RREKJNSREKTARIF_ID'];
			$data['REFJALAN_ID'] =$model['REFJALAN_ID'];
			$data['TBLDAFTREKLAME_TINGGIREKLAME'] =$model['TBLDAFTREKLAME_TINGGIREKLAME'];
			$data['REFKETINGGIAN_SKOR'] =$model['REFKETINGGIAN_SKOR'];
			$data['RREKJNSPOSISI_ID'] =$model['RREKJNSPOSISI_ID'];
			$data['TBLDAFTREKLAME_PANJANG'] =$model['TBLDAFTREKLAME_PANJANG'];
			$data['TBLDAFTREKLAME_LEBAR'] =$model['TBLDAFTREKLAME_LEBAR'];
			$data['TBLDAFTREKLAME_ISIREKLAME'] =$model['TBLDAFTREKLAME_ISIREKLAME'];
			$data['TBLDAFTREKLAME_PCRINGAN'] =$model['TBLDAFTREKLAME_PCRINGAN'];

			$data['TBLDAFTREKLAME_NILAIKONTRAK'] =$model['TBLDAFTREKLAME_NILAIKONTRAK'];
			$data['TBLDAFTREKLAME_TGLMULAIREKLAME'] =$model['TBLDAFTREKLAME_TGLMULAIREKLAME'];
			$data['TBLDAFTREKLAME_BLNMULAIREKLAME'] =$model['TBLDAFTREKLAME_BLNMULAIREKLAME'];
			$data['TBLDAFTREKLAME_THNMULAIREKLAME'] =$model['TBLDAFTREKLAME_THNMULAIREKLAME'];

			$data['TBLDAFTREKLAME_TGLAKHIRREKLAME'] =$model['TBLDAFTREKLAME_TGLAKHIRREKLAME'];
			$data['TBLDAFTREKLAME_BLNAKHIRREKLAME'] =$model['TBLDAFTREKLAME_BLNAKHIRREKLAME'];
			$data['TBLDAFTREKLAME_THNAKHIRREKLAME'] =$model['TBLDAFTREKLAME_THNAKHIRREKLAME'];
			$data['REFSUDUTPANDANG_SKOR'] =$model['REFSUDUTPANDANG_SKOR'];
			$data['TBLDAFTREKLAME_JUMLAHHARI'] = 0;
			$data['TBLDAFTREKLAME_THNTERIMA'] =$model['TBLDAFTREKLAME_THNTERIMA'];
			$data['TBLDAFTREKLAME_BLNTERIMA'] =$model['TBLDAFTREKLAME_BLNTERIMA'];
			$data['TBLDAFTREKLAME_TGLTERIMA'] =$model['TBLDAFTREKLAME_TGLTERIMA'];
			$data['TBLDAFTREKLAME_THNBATASSPTPD'] =$model['TBLDAFTREKLAME_THNBATASSPTPD'];
			$data['TBLDAFTREKLAME_BLNBATASSPTPD'] =$model['TBLDAFTREKLAME_BLNBATASSPTPD'];
			$data['TBLDAFTREKLAME_TGLBATASSPTPD'] =$model['TBLDAFTREKLAME_TGLBATASSPTPD'];
			$data['TBLDAFTREKLAME_THNENTRI'] =$model['TBLDAFTREKLAME_THNENTRI'];
			$data['TBLDAFTREKLAME_BLNENTRI'] =$model['TBLDAFTREKLAME_BLNENTRI'];
			$data['TBLDAFTREKLAME_TGLENTRI'] =$model['TBLDAFTREKLAME_TGLENTRI'];
			$data['TAHUN_PERDA'] =$model['TAHUN_PERDA'];
			$data['TBLDAFTREKLAME_NODAFTARIZIN'] =$model['TBLDAFTREKLAME_NODAFTARIZIN'];
		}

		$jmlhari = 30;
		if ($proses != '') {
			$data['data'] = 'proses selanjutnya';
		} else if ($cek>0){
			$data['data'] = 'ada';
		} else {
		}

		// $jmlhari = cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun);
		$jmlhari = 30;
		// $bulan = date('m');
		if ($bulan==12) {
			$thnbatas = substr($tahun,-2)+1;
			$blnbatas = '1';
		}else{
			$thnbatas = substr($tahun,-2);
			$blnbatas = ($bulan+1);
		}

		$tglbatas = RefTGLBatas::model()->get($this->PAJAK_REK, $thnbatas, $blnbatas).'-'.($blnbatas<10 ? '0'.$blnbatas : $blnbatas).'-20'.$thnbatas;

		$data['TGL_BATAS'] = $tglbatas;
		
		echo CJSON::encode($data);
	}

	public function cekProses($thn, $bulan, $tgl, $lokasi, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT TBLDAFTREKLAME_RUPIAHSETOR AS JML FROM TBLDAFTREKLAME WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLPENDATAAN_TGLPAJAK='.$tgl.' AND TBLPENDATAAN_PAJAKKE='.$lokasi.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;

	}

	public function cekPernahDaftar($thn, $bulan, $tgl, $lokasi, $nopok)
	{
		$sql = 'SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTREKLAME WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLPENDATAAN_TGLPAJAK='.$tgl.' AND TBLPENDATAAN_PAJAKKE='.$lokasi.' AND TBLDAFTAR_NOPOK='.$nopok;
		$model = Yii::app()->db->createCommand($sql)->queryScalar();
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
		$TBLPENDATAAN_THNPAJAK = substr($TBLPENDATAAN_THNPAJAK, -2);
		$TBLPENDATAAN_TGLPAJAK = substr($TBLPENDATAAN_TGLPAJAK, 0, 2);
		$TBLDAFTREKLAME_TGLSPTPD = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_TGLSPTPD');
		$TREKENINGSUB_KODE = DMOrcl::getRequest('TREKENINGSUB_KODE');

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
		$REFJALAN_ID = (int)DMOrcl::getRequest('param', 'REFJALAN_ID');
		$NAMALOKASI = ( $jl = Yii::app()->db->createCommand('SELECT REFPANGGUNG_NAMA FROM RREKREFPANGGUNG WHERE REFPANGGUNG_ID='.$REFJALAN_ID)->queryScalar() ) ? $jl : '';
		$REFSUDUTPANDANG_SKOR = DMOrcl::getRequest('param', 'REFSUDUTPANDANG_SKOR');
		$RREKJNSPOSISI_ID = DMOrcl::getRequest('param', 'RREKJNSPOSISI_ID');
		$TBLDAFTREKLAME_TINGGIREKLAME = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_TINGGIREKLAME');
		$REFKETINGGIAN_SKOR = DMOrcl::getRequest('param', 'REFKETINGGIAN_SKOR');
		
		$TBLDAFTREKLAME_PANJANG = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_PANJANG');
		$TBLDAFTREKLAME_LEBAR = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_LEBAR');
		$TBLDAFTREKLAME_ISIREKLAME = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_ISIREKLAME');
		$TBLDAFTREKLAME_PCRINGAN = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_PCRINGAN');
		$TBLDAFTREKLAME_NOSPTD = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_NOSPTD');
		
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
		$TBLDAFTREKLAME_NODAFTARIZIN = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_NODAFTARIZIN');

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

		$wp = Yii::app()->db->createCommand('SELECT * FROM TBLDAFTAR WHERE TBLDAFTAR_NOPOK='.$TBLDAFTAR_NOPOK)->queryRow();

		$insert = Yii::app()->db->createCommand();
		$arrayData = array(
			'TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK,
			'TBLPENDATAAN_PAJAKKE' => $TBLPENDATAAN_PAJAKKE,

			'TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK,
			'TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK,
			'TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK,	

			'TBLDAFTREKLAME_TGLSPTPD' => isset($exp_TGLSPTPD[0]) ? $exp_TGLSPTPD[0] : '',
			'TBLDAFTREKLAME_BLNSPTPD' => isset($exp_TGLSPTPD[1]) ? $exp_TGLSPTPD[1] : '',
			'TBLDAFTREKLAME_THNSPTPD' => isset($exp_TGLSPTPD[2]) ? substr($exp_TGLSPTPD[2], -2) : '',

			'TBLDAFTREKLAME_TGLMULAIREKLAME' => isset($exp_TGLMULAIREKLAME[0]) ? $exp_TGLMULAIREKLAME[0] : '',
			'TBLDAFTREKLAME_BLNMULAIREKLAME' => isset($exp_TGLMULAIREKLAME[1]) ? $exp_TGLMULAIREKLAME[1] : '',
			'TBLDAFTREKLAME_THNMULAIREKLAME' => isset($exp_TGLMULAIREKLAME[2]) ? substr($exp_TGLMULAIREKLAME[2], -2) : '',

			'TBLDAFTREKLAME_TGLAKHIRREKLAME' => isset($exp_TGLAKHIRREKLAME[0]) ? $exp_TGLAKHIRREKLAME[0] : '',
			'TBLDAFTREKLAME_BLNAKHIRREKLAME' => isset($exp_TGLAKHIRREKLAME[1]) ? $exp_TGLAKHIRREKLAME[1] : '',
			'TBLDAFTREKLAME_THNAKHIRREKLAME' => isset($exp_TGLAKHIRREKLAME[2]) ? substr($exp_TGLAKHIRREKLAME[2], -2) : '',

			'TBLDAFTREKLAME_JUMLAHHARI' => $TBLDAFTREKLAME_JUMLAHHARI,

			'TBLDAFTREKLAME_TGLIZIN' => isset($exp_TGLIZIN[0]) ? $exp_TGLIZIN[0] : '',
			'TBLDAFTREKLAME_BLNIZIN' => isset($exp_TGLIZIN[1]) ? $exp_TGLIZIN[1] : '',
			'TBLDAFTREKLAME_THNIZIN' => isset($exp_TGLIZIN[2]) ? substr($exp_TGLIZIN[2], -2) : '',
			
			'TBLDAFTAR_JNSPENDAPATAN' => $wp['TBLDAFTAR_JENISPENDAPATAN'],
			'TBLDAFTAR_GOLONGAN' => $wp['TBLDAFTAR_GOLONGAN'],
			'TBLKECAMATAN_ID' => $wp['TBLKECAMATAN_IDBADANUSAHA'],
			'TBLKELURAHAN_ID' => $wp['TBLKELURAHAN_IDBADANUSAHA'],

			'TBLDAFTREKLAME_REKURUSAN' => '1',
			'TBLDAFTREKLAME_REKPEMERINTAHAN' => '20',
			'TBLDAFTREKLAME_REKORGANISASI' => '1',
			'TBLDAFTREKLAME_REKPROGRAM' => '20',
			'TBLDAFTREKLAME_REKKEGIATAN' => '26',
			'TBLDAFTREKLAME_REKDINAS' => '0',
			'TBLDAFTREKLAME_REKBIDANG' => '0',
			'TBLDAFTREKLAME_REKPENDAPATAN' => '4',
			'TBLDAFTREKLAME_REKPAD' => '1',
			'TBLDAFTREKLAME_REKPAJAK' => '1',
			'TBLDAFTREKLAME_REKAYAT' => '4',
			'TBLDAFTREKLAME_REKJENIS' => array_reverse(explode('.', $TREKENINGSUB_KODE))[0],
			'TBLDAFTREKLAME_REKSUBJENIS' => '0',

			'TBLDAFTREKLAME_PENEMPATAN' => $TBLDAFTREKLAME_PENEMPATAN,
			'TBLDAFTREKLAME_PERMOHONAN' => $TBLDAFTREKLAME_PERMOHONAN,
			'TBLDAFTREKLAME_KETERANGAN1' => $TBLDAFTREKLAME_KETERANGAN1,
			'TBLDAFTREKLAME_KETERANGAN2' => $TBLDAFTREKLAME_KETERANGAN2,

			'TBLDAFTREKLAME_JMLHREKLAME' => $TBLDAFTREKLAME_JMLHREKLAME,
			'TBLDAFTREKLAME_JNSREKLAME' => 'I',
			'TBLDAFTREKLAME_ISJNSPENETAPAN' => 'O',
			'TAHUN_PERDA' => '2016',
			'TBLDAFTREKLAME_SKORKAWASAN' => $TBLDAFTREKLAME_SKORKAWASAN,

			'RREKJNSREKTARIF_ID' => $RREKJNSREKTARIF_ID,
			'REFJALAN_ID' => $REFJALAN_ID,
			'REFPANGGUNG_ID' => $REFJALAN_ID,
			'TBLDAFTREKLAME_NAMAJALAN' => substr($NAMALOKASI, 0, 20),
			'REFSUDUTPANDANG_SKOR' => $REFSUDUTPANDANG_SKOR,
			'REFJENISPOSISI_ID' => $RREKJNSPOSISI_ID,
			'TBLDAFTREKLAME_TINGGIREKLAME' => $TBLDAFTREKLAME_TINGGIREKLAME,
			'REFKETINGGIAN_SKOR' => $REFKETINGGIAN_SKOR,

			'TBLDAFTREKLAME_PANJANG' => $TBLDAFTREKLAME_PANJANG,
			'TBLDAFTREKLAME_LEBAR' => $TBLDAFTREKLAME_LEBAR,
			'TBLDAFTREKLAME_LUAS' => $TBLDAFTREKLAME_PANJANG * $TBLDAFTREKLAME_LEBAR,
			'TBLDAFTREKLAME_ISIREKLAME' => $TBLDAFTREKLAME_ISIREKLAME,

			'TBLDAFTREKLAME_PCRINGAN' => !empty($TBLDAFTREKLAME_PCRINGAN) ? $TBLDAFTREKLAME_PCRINGAN : 0,
			'NOSPT' => $TBLDAFTREKLAME_NOSPTD,
			'TBLDAFTREKLAME_NILAIKONTRAK' => LokalIndonesia::toAngka($TBLDAFTREKLAME_NILAIKONTRAK),
			// 'TBLDAFTREKLAME_TGLMULAIREKLAME' => $TBLDAFTREKLAME_TGLMULAIREKLAME,
			// 'TBLDAFTREKLAME_TGLAKHIRREKLAME' => $TBLDAFTREKLAME_TGLAKHIRREKLAME,

			'TBLDAFTREKLAME_BOBOTJALAN' => $RREKBOBOT_KJALAN,
			// 'RREKBOBOT_SUDUTPANDANG' => $RREKBOBOT_SUDUTPANDANG,
			'REFBOBOTREKLAME_KETINGGIAN' => $RREKBOBOT_KETINGGIAN,

			'TBLDAFTREKLAME_RPTARIF' => $TBLDAFTREKLAME_RPTARIF,
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
			'TBLDAFTREKLAME_NODAFTARIZIN' => $TBLDAFTREKLAME_NODAFTARIZIN,

		);

		if ($this->cekPernahDaftar($TBLPENDATAAN_THNPAJAK, $TBLPENDATAAN_BLNPAJAK, $TBLPENDATAAN_TGLPAJAK, $TBLPENDATAAN_PAJAKKE, $TBLDAFTAR_NOPOK)>0) {
			# update
			# 2020-11-19 15:15 jgn update no daftar izin agar tidak hilang
			unset($arrayData['TBLDAFTREKLAME_NODAFTARIZIN']);
			$where = 'TBLPENDATAAN_THNPAJAK ='.$TBLPENDATAAN_THNPAJAK.' AND TBLPENDATAAN_BLNPAJAK='.$TBLPENDATAAN_BLNPAJAK.' AND TBLPENDATAAN_TGLPAJAK='.$TBLPENDATAAN_TGLPAJAK.' AND TBLPENDATAAN_PAJAKKE='.$TBLPENDATAAN_PAJAKKE.' AND TBLDAFTAR_NOPOK='.$TBLDAFTAR_NOPOK;
			$simpan = $insert->update('TBLDAFTREKLAME', $arrayData, $where);
		} else {
			$simpan = $insert->insert('TBLDAFTREKLAME', $arrayData);
		}

		if ($simpan>=0) {
			echo CJSON::encode(array('status'=>'success'));
		}
		else{
			echo CJSON::encode(array('status'=>'failed'));
		}
	}

	public function actionupdatenomordaftizin()
	{
		$nomordaftarizin = $_REQUEST['nomordaftarizin'];
		$NOPOKOK = $_REQUEST['NOPOKOK'];
		$TGLPAJAK = isset($_REQUEST['TGLPAJAK']) && strtotime($_REQUEST['TGLPAJAK']) ? $_REQUEST['TGLPAJAK'] : date('d-m-Y');
		$PAJAKKE = $_REQUEST['PAJAKKE'];

		$THNPAJAK = substr($TGLPAJAK, -2);
		$BLNPAJAK = substr($TGLPAJAK, 3, 2);
		$TGLPAJAK = substr($TGLPAJAK, 0, 2);

		$insert = Yii::app()->db->createCommand();
		$arrayData = array(
			'TBLDAFTREKLAME_NODAFTARIZIN' => $nomordaftarizin,
		);
		$where = 'TBLPENDATAAN_THNPAJAK ='.$THNPAJAK.' AND TBLPENDATAAN_BLNPAJAK='.$BLNPAJAK.' AND TBLPENDATAAN_TGLPAJAK='.$TGLPAJAK.' AND TBLPENDATAAN_PAJAKKE='.$PAJAKKE.' AND TBLDAFTAR_NOPOK='.$NOPOKOK;
		$simpan = $insert->update('TBLDAFTREKLAME', $arrayData, $where);

		if ($simpan>=0) {
			echo CJSON::encode(array('status'=>'success'));
		}
		else{
			echo CJSON::encode(array('status'=>'failed'));
		}

	}

	public function actionCekPernahDaftar()
	{
		$NOPOKOK = $_REQUEST['NOPOKOK'];
		$TGLPAJAK = isset($_REQUEST['TGLPAJAK']) && strtotime($_REQUEST['TGLPAJAK']) ? $_REQUEST['TGLPAJAK'] : date('d-m-Y');
		$PAJAKKE = $_REQUEST['PAJAKKE'];

		$THNPAJAK = substr($TGLPAJAK, -2);
		$BLNPAJAK = substr($TGLPAJAK, 3, 2);
		$TGLPAJAK = substr($TGLPAJAK, 0, 2);

		$sql = 'SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTREKLAME WHERE TBLPENDATAAN_THNPAJAK ='.$THNPAJAK.' AND TBLPENDATAAN_BLNPAJAK='.$BLNPAJAK.' AND TBLPENDATAAN_TGLPAJAK='.$TGLPAJAK.' AND TBLPENDATAAN_PAJAKKE='.$PAJAKKE.' AND TBLDAFTAR_NOPOK='.$NOPOKOK;
		$cek = Yii::app()->db->createCommand($sql)->queryScalar();
		if ($cek) {
			echo CJSON::encode(array('status'=>'sudah'));
		}
		else{
			echo CJSON::encode(array('status'=>'belum'));
		}
	}

	public function actioncekNospt()
	{
		$NOPOKOK = $_REQUEST['NOPOKOK'];
		$TGLPAJAK = isset($_REQUEST['TGLPAJAK']) && strtotime($_REQUEST['TGLPAJAK']) ? $_REQUEST['TGLPAJAK'] : date('d-m-Y');
		$PAJAKKE = $_REQUEST['PAJAKKE'];

		$THNPAJAK = substr($TGLPAJAK, -2);
		$BLNPAJAK = substr($TGLPAJAK, 3, 2);
		$TGLPAJAK = substr($TGLPAJAK, 0, 2);

		$sql = 'SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTREKLAME WHERE TBLPENDATAAN_THNPAJAK ='.$THNPAJAK.' AND TBLPENDATAAN_BLNPAJAK='.$BLNPAJAK.' AND TBLPENDATAAN_TGLPAJAK='.$TGLPAJAK.' AND TBLPENDATAAN_PAJAKKE='.$PAJAKKE.' AND TBLDAFTAR_NOPOK='.$NOPOKOK.' AND TBLDAFTREKLAME_NOMORSKPD IS NOT NULL';
		$cek = Yii::app()->db->createCommand($sql)->queryScalar();
		if ($cek) {
			echo CJSON::encode(array('status'=>'sudah'));
		}
		else{
			echo CJSON::encode(array('status'=>'belum'));
		}
	}

	public function actionGetDataReklame()
	{
		$nodaftar = isset($_POST['nodaftar']) ? $_POST['nodaftar'] : '0';
		$username = 'Jgjk0t4Dnz1n';
		$password = md5('K0n3Ks1$!Ap1'.date('dmY'));

		$url = "https://perizinanonline.jogjakota.go.id/layanan/api/getdatapendaftaranreklame";

		// $this->dbpresensi->delete('tblidentitaspegawai_temp');

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		curl_setopt($ch, CURLOPT_POSTFIELDS, array('nodaftar' => $nodaftar) );
		$result = curl_exec($ch);
		curl_close($ch);  
		// echo($result);
		// die();

		$data = json_decode($result);

		if (!empty($data->data->jumlah)) {
			$RREKJENISTARIF_ID = Yii::app()->db->createCommand("
		SELECT 
		RREKJNSREKTARIF_ID 
		FROM 
		RREKJNSREKTARIF 
		WHERE 
		REPLACE(RREKJNSREKTARIF_NAMA,' ','') = REPLACE('".$data->data->posisi_terhadap_jalan."',' ','')")->queryScalar();

		$RREKJNSPOSISI_ID = Yii::app()->db->createCommand("
		SELECT 
		RREKJNSPOSISI_ID 
		FROM 
		RREKJNSPOSISI 
		WHERE 
		RREKJNSPOSISI_NAMA = '".$data->data->posisi_pjg_lbr."'")->queryScalar();

		$REFSUDUTPANDANG_SKOR = Yii::app()->db->createCommand("
		SELECT 
		RREKSUDUTPANDANG_ID 
		FROM 
		RREKSUDUTPANDANG 
		WHERE 
		SUBSTR(RREKSUDUTPANDANG_NAMA, 0, 1) LIKE '%".$data->data->muka_sisi."%' AND REFJENISREKLAMETARIF_ID = 1")->queryScalar();
		
		$dataarray = array(
			'status'=>'found',
			'bloksistem_terakhir'=>$data->data->bloksistem_terakhir,
			'jenis_reklame'=>$data->data->jenis_reklame,
			'jumlah'=>$data->data->jumlah,
			'lebar'=>$data->data->lebar,
			'lokasi'=>$data->data->lokasi,
			'masa_izin_akhir'=>$data->data->masa_izin_akhir,
			'masa_izin_awal'=>$data->data->masa_izin_awal,
			'muka_sisi'=>$data->data->muka_sisi,
			'naskah'=>$data->data->naskah,
			'panjang'=>$data->data->panjang,
			'penempatan'=>$data->data->penempatan,
			'posisi_pjg_lbr'=>$data->data->posisi_pjg_lbr,
			'posisi_terhadap_jalan'=>$data->data->posisi_terhadap_jalan,
			'status_berkas'=>$data->data->status_berkas,
			'tgl_izin'=>$data->data->tgl_izin,
			'tinggi'=>$data->data->tinggi,
			'RREKJENISTARIF_ID'=>$RREKJENISTARIF_ID,
			'RREKJNSPOSISI_ID'=>$RREKJNSPOSISI_ID,
			'REFSUDUTPANDANG_SKOR'=>$REFSUDUTPANDANG_SKOR,
		);
		echo json_encode($dataarray);
		} else {
			$dataarray = array(
				'status'=>'notfound'
			);
			echo json_encode($dataarray);
		}

		
	}

}
