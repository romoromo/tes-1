<?php

class Pajakpeneranganjalan_90Controller extends Controller
{
	var $KODE_GOL = 4;
	var $PAJAK_AYAT = 10;
	var $PAJAK_SUBJEN = 1;
	var $PAJAK_REK = '4.1.1.10.0';
	var $MODULE_URL = 'pendataan/pajakpeneranganjalan_90';
	public function actionIndex()
	{
		// $data['sub_rek'] = TRekening::model()->getRekeningSubAktif('4110100');
		/*SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.1.%'
		ORDER BY TBLREKENING_KODE*/
		$data['sub_rek'] = Yii::app()->db->createCommand("
		SELECT * 
		FROM TBLREKENING_90 TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.10.%'
		ORDER BY TBLREKENING_KODE
		")
		->queryAll();

		$data['jns_pajak'] = Yii::app()->db->createCommand("SELECT * FROM REFGOLTARIFPJU WHERE REFGOLTARIFPJU_ISAKTIF ='T'")->queryAll();
		
		$this->renderPartial('index', array('data'=>$data));
	}
	public function actiongetdata()
	{
		$NOPOK = trim($_POST['nomor_pajak']);
		$bulan = (int)trim($_POST['bulan']);
		$tahun = intval($_POST['tahun']);
		$tgl = isset($_REQUEST['tgl']) ? (int)$_REQUEST['tgl'] : '';
		$thn = substr($tahun, -2);
		$persentarif = trim($_POST['persentarif']);
		$data = array();
		$cek = $this->cekPernahDaftar(substr($tahun, -2), $bulan, (int)$tgl, $NOPOK, $persentarif);
		$proses = $this->cekProses(substr($tahun, -2), $bulan, (int)$tgl, $NOPOK);
		$teguran = $this->cekTeguran(substr($tahun, -2), $bulan, (int)$tgl, $NOPOK);

		if ($proses != '') {
			$data['data'] = 'proses selanjutnya';	
		/*} else if ($teguran==0) {
			$data['data'] = 'teguran';

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
			TBLDAFTPJU.TBLPENDATAAN_THNPAJAK,
			TBLDAFTPJU.TBLPENDATAAN_BLNPAJAK,
			TBLDAFTPJU.TBLDAFTPJU_OMSETPAJAK,
			NVL(TBLDAFTPJU.TBLDAFTPJU_PAJAK, 0) AS TBLDAFTPJU_PAJAK,
			NVL(TBLDAFTPJU.TBLDAFTPJU_BUNGASPTPD, 0) AS TBLDAFTPJU_BUNGASPTPD,
			TBLDAFTPJU.TBLDAFTPJU_THNSPTPD,
			TBLDAFTPJU.TBLDAFTPJU_BLNSPTPD,
			TBLDAFTPJU.TBLDAFTPJU_TGLSPTPD,
			TBLDAFTPJU.TBLDAFTPJU_THNBATASSPTPD,
			TBLDAFTPJU.TBLDAFTPJU_BLNBATASSPTPD,
			TBLDAFTPJU.TBLDAFTPJU_TGLBATASSPTPD,
			TBLDAFTPJU.TBLDAFTPJU_THNTERIMA,
			TBLDAFTPJU.TBLDAFTPJU_BLNTERIMA,
			TBLDAFTPJU.TBLDAFTPJU_TGLTERIMA,
			TBLDAFTPJU.TBLDAFTPJU_THNENTRI,
			TBLDAFTPJU.TBLDAFTPJU_BLNENTRI,
			TBLDAFTPJU.TBLDAFTPJU_TGLENTRI
			";
			$from = 'TBLDAFTAR';
			$filter = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $NOPOK
			);

			$filter_AND = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
				,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
				,'EQ__TBLDAFTPJU.TBLPENDATAAN_THNPAJAK' => $thn
				,'EQ__TBLDAFTPJU.TBLPENDATAAN_BLNPAJAK' => $bulan
				,'EQ__TBLDAFTPJU.TBLPENDATAAN_TGLPAJAK' => $tgl
				// ,'EQ__tblsubyek_isaktif' => "T"
			);

			$otherquery = array(
				'limit'=> 30
				,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID = TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
				,'join_2'=> array('TBLDAFTPJU', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTPJU.TBLDAFTAR_NOPOK')
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

			$data['TBLDAFTPJU_OMSETPAJAK'] =$model['TBLDAFTPJU_OMSETPAJAK'];
			$data['TBLDAFTPJU_PAJAK'] =$model['TBLDAFTPJU_PAJAK'];
			$data['TBLDAFTPJU_BUNGASPTPD'] =$model['TBLDAFTPJU_BUNGASPTPD'];

			$data['TBLDAFTPJU_THNSPTPD'] =$model['TBLDAFTPJU_THNSPTPD'];
			$data['TBLDAFTPJU_BLNSPTPD'] =$model['TBLDAFTPJU_BLNSPTPD'];
			$data['TBLDAFTPJU_TGLSPTPD'] =$model['TBLDAFTPJU_TGLSPTPD'];

			$data['TBLDAFTPJU_THNBATASSPTPD'] =$model['TBLDAFTPJU_THNBATASSPTPD'];
			$data['TBLDAFTPJU_BLNBATASSPTPD'] =$model['TBLDAFTPJU_BLNBATASSPTPD'];
			$data['TBLDAFTPJU_TGLBATASSPTPD'] =$model['TBLDAFTPJU_TGLBATASSPTPD'];

			$data['TBLDAFTPJU_THNTERIMA'] =$model['TBLDAFTPJU_THNTERIMA'];
			$data['TBLDAFTPJU_BLNTERIMA'] =$model['TBLDAFTPJU_BLNTERIMA'];
			$data['TBLDAFTPJU_TGLTERIMA'] =$model['TBLDAFTPJU_TGLTERIMA'];
			
			$data['TBLDAFTPJU_THNENTRI'] =$model['TBLDAFTPJU_THNENTRI'];
			$data['TBLDAFTPJU_BLNENTRI'] =$model['TBLDAFTPJU_BLNENTRI'];
			$data['TBLDAFTPJU_TGLENTRI'] =$model['TBLDAFTPJU_TGLENTRI'];*/

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
			NVL(REFBADANUSAHA.REFBADANUSAHA_REKSUB, 0) AS REFBADANUSAHA_REKSUBJENIS,
			REFBADANUSAHA.REFBADANUSAHA_PERSEN,
			TBLDAFTPJU.TBLPENDATAAN_THNPAJAK,
			TBLDAFTPJU.TBLPENDATAAN_BLNPAJAK,
			NVL(TBLDAFTPJU.TBLDAFTPJU_OMSETPAJAK, 0) AS TBLDAFTPJU_OMSETPAJAK,
			NVL(TBLDAFTPJU.TBLDAFTPJU_PAJAK, 0) AS TBLDAFTPJU_PAJAK,
			NVL(TBLDAFTPJU.TBLDAFTPJU_BUNGASPTPD, 0) AS TBLDAFTPJU_BUNGASPTPD,
			TBLDAFTPJU.TBLDAFTPJU_THNSPTPD,
			TBLDAFTPJU.TBLDAFTPJU_BLNSPTPD,
			TBLDAFTPJU.TBLDAFTPJU_TGLSPTPD,
			TBLDAFTPJU.TBLDAFTPJU_THNBATASSPTPD,
			TBLDAFTPJU.TBLDAFTPJU_BLNBATASSPTPD,
			TBLDAFTPJU.TBLDAFTPJU_TGLBATASSPTPD,
			TBLDAFTPJU.TBLDAFTPJU_THNTERIMA,
			TBLDAFTPJU.TBLDAFTPJU_BLNTERIMA,
			TBLDAFTPJU.TBLDAFTPJU_TGLTERIMA,
			TBLDAFTPJU.TBLDAFTPJU_THNENTRI,
			TBLDAFTPJU.TBLDAFTPJU_BLNENTRI,
			TBLDAFTPJU.TBLDAFTPJU_TGLENTRI
			";
			$from = 'TBLDAFTAR';
			$filter = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $NOPOK
			);

			$filter_AND = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
				,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
				,'EQ__TBLDAFTPJU.TBLPENDATAAN_THNPAJAK' => $thn
				,'EQ__TBLDAFTPJU.TBLPENDATAAN_BLNPAJAK' => $bulan
				,'EQ__TBLDAFTPJU.TBLPENDATAAN_TGLPAJAK' => $tgl
				// ,'EQ__tblsubyek_isaktif' => "T"
			);

			$otherquery = array(
				'limit'=> 30
				,'join'=> array('REFBADANUSAHA_90 REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID = TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
				,'join_2'=> array('TBLDAFTPJU', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTPJU.TBLDAFTAR_NOPOK')
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
			$data['REFBADANUSAHA_REKSUBJENIS'] =$model['REFBADANUSAHA_REKSUBJENIS'];

			$data['TBLDAFTPJU_OMSETPAJAK'] =$model['TBLDAFTPJU_OMSETPAJAK'];
			$data['TBLDAFTPJU_PAJAK'] =$model['TBLDAFTPJU_PAJAK'];
			$data['TBLDAFTPJU_BUNGASPTPD'] =$model['TBLDAFTPJU_BUNGASPTPD'];

			$data['TBLDAFTPJU_THNSPTPD'] =$model['TBLDAFTPJU_THNSPTPD'];
			$data['TBLDAFTPJU_BLNSPTPD'] =$model['TBLDAFTPJU_BLNSPTPD'];
			$data['TBLDAFTPJU_TGLSPTPD'] =$model['TBLDAFTPJU_TGLSPTPD'];

			$data['TBLDAFTPJU_THNBATASSPTPD'] =$model['TBLDAFTPJU_THNBATASSPTPD'];
			$data['TBLDAFTPJU_BLNBATASSPTPD'] =$model['TBLDAFTPJU_BLNBATASSPTPD'];
			$data['TBLDAFTPJU_TGLBATASSPTPD'] =$model['TBLDAFTPJU_TGLBATASSPTPD'];

			$data['TBLDAFTPJU_THNTERIMA'] =$model['TBLDAFTPJU_THNTERIMA'];
			$data['TBLDAFTPJU_BLNTERIMA'] =$model['TBLDAFTPJU_BLNTERIMA'];
			$data['TBLDAFTPJU_TGLTERIMA'] =$model['TBLDAFTPJU_TGLTERIMA'];
			
			$data['TBLDAFTPJU_THNENTRI'] =$model['TBLDAFTPJU_THNENTRI'];
			$data['TBLDAFTPJU_BLNENTRI'] =$model['TBLDAFTPJU_BLNENTRI'];
			$data['TBLDAFTPJU_TGLENTRI'] =$model['TBLDAFTPJU_TGLENTRI'];

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
		NVL(REFBADANUSAHA.REFBADANUSAHA_REKSUB, 0) AS REFBADANUSAHA_REKSUBJENIS,
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
			,'join'=> array('REFBADANUSAHA_90 REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
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
		$data['REFBADANUSAHA_REKSUBJENIS'] =$model['REFBADANUSAHA_REKSUBJENIS'];

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

	public function actionautocompletewpppj()
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
			,'join'=> array('REFBADANUSAHA_90 REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
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
					 'TBLDAFTPJU_PAJAKSKPD'=>''
				    ,'TBLDAFTPJU_JUMLAHHARIJUAL'=>''
					,'TBLDAFTPJU_OMSETPAJAK'=>'0'
					,'TBLDAFTPJU_PAJAK'=>''
					,'TBLDAFTPJU_BUNGASPTPD'=>''
					,'TBLDAFTPJU_PAJAK'=>''
					,'TBLDAFTPJU_THNSKPD'=>''
					,'TBLDAFTPJU_BLNSKPD'=>''
					,'TBLDAFTPJU_TGLSKPD'=>''
					,'TBLDAFTPJU_PAJAKSKPD'=>''
					,'TBLDAFTPJU_THNBATASSKPD'=>''
					,'TBLDAFTPJU_BLNBATASSKPD'=>''
					,'TBLDAFTPJU_TGLBATASSKPD'=>''
					);
		$simpan = $command->update('TBLDAFTPJU', $column, 'TBLDAFTAR_NOPOK =:NOPOK  NVL(TBLPENDATAAN_TGLENTRI, 0) =:TGLPAJAK',array(':NOPOK' => $nopok, ':TGLPAJAK' => (int)$tglentri));
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
		$tbltransaksiketetapan_omzetnonindustri = trim($_POST['tbltransaksiketetapan_omzetnonindustri']);
		$tbltransaksiketetapan_omzetindustri = trim($_POST['tbltransaksiketetapan_omzetindustri']);
		$totalomzet = $tbltransaksiketetapan_omzetnonindustri+$tbltransaksiketetapan_omzetindustri;
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
		$refbadanusaha_reksubjenis = Yii::app()->request->getParam('refbadanusaha_reksubjenis');
		if (empty($refbadanusaha_reksubjenis)) {
			echo CJSON::encode(array('status'=>'failed', 'errors' => 'refbadanusaha_reksubjenis kosong'));
			Yii::app()->end();
		}
	
		$persentarif = trim($_POST['jns_pajak']);
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
		$cek = $this->cekPernahDaftar(substr($tahun_pajak, -2), $bulan_pajak, $tanggal_pajak, $nopokok, $persentarif);
		
		$column = array('TBLPENDATAAN_THNPAJAK'=>substr($tahun_pajak, -2)
				    ,'TBLPENDATAAN_BLNPAJAK'=>$bulan_pajak
				    ,'TBLPENDATAAN_TGLPAJAK'=>$tanggal_pajak
				    ,'TBLPENDATAAN_PAJAKKE'=>''
				    ,'TBLDAFTAR_NOPOK'=>$nopokok
				    ,'TBLDAFTAR_JNSPENDAPATAN'=>'P'
				    ,'TBLDAFTAR_GOLONGAN'=>0
				    ,'TBLDAFTPJU_REKURUSAN'=>1
				    ,'TBLDAFTPJU_REKPEMERINTAHAN'=>20
				    ,'TBLDAFTPJU_REKORGANISASI'=>1
				    ,'TBLDAFTPJU_REKPROGRAM'=>20
				    ,'TBLDAFTPJU_REKKEGIATAN'=>26
				    ,'TBLDAFTPJU_REKDINAS'=>0
				    ,'TBLDAFTPJU_REKBIDANG'=>0
				    ,'TBLDAFTPJU_REKPENDAPATAN'=>$refbadanusaha_rekpendapatan
				    ,'TBLDAFTPJU_REKPAD'=>$refbadanusaha_rekpad
				    ,'TBLDAFTPJU_REKPAJAK'=>$refbadanusaha_rekpjk
				    ,'TBLDAFTPJU_REKAYAT'=>$refbadanusaha_rekayat
				    ,'TBLDAFTPJU_REKJENIS'=>$refbadanusaha_rekjenis
				    ,'TBLDAFTPJU_REKSUBJENIS'=>$refbadanusaha_reksubjenis
				    ,'TBLDAFTPJU_IDGOLTARIF'=>''
				    ,'TBLKECAMATAN_ID'=>$kecamatan_pajak
				    ,'TBLKELURAHAN_ID'=>$kelurahan_pajak
				    //,'TBLDAFTPJU_ISKAS'=>$is_kas
				    //,'TBLDAFTPJU_ISPEMBUKUAN'=>$is_pembukuan
				    // /,'TBLDAFTPJU_ISNOTA'=>$is_nota
				    ,'TBLDAFTPJU_ISLHP'=>$is_lhp
				    ,'TBLDAFTPJU_ISNOTABIL'=>$is_notabil
				    ,'TBLDAFTPJU_ISJNSPENETAPAN'=>$hit_carapenghitungan
				    ,'TBLDAFTPJU_THNMULAIJUAL'=>substr($arr_tglawal[2], -2)
				    ,'TBLDAFTPJU_BLNMULAIJUAL'=>$arr_tglawal[1]
				    ,'TBLDAFTPJU_TGLMULAIJUAL'=>$arr_tglawal[0]
				    ,'TBLDAFTPJU_THNAKHIRJUAL'=>substr($arr_tglakhir[2], -2)
				    ,'TBLDAFTPJU_BLNAKHIRJUAL'=>$arr_tglakhir[1]
				    ,'TBLDAFTPJU_TGLAKHIRJUAL'=>$arr_tglakhir[0]
				    ,'TBLDAFTPJU_JUMLAHHARIJUAL'=>$hit_jumlahhari
				    ,'TBLDAFTPJU_PERSENTARIF'=>$tarif_rekening
				    ,'TBLDAFTPJU_PAJAK'=>$hit_pajak
				    ,'TBLDAFTPJU_PAJAKSKPD'=>$hit_pajak
				    ,'TBLDAFTPJU_OMSETPAJAKINDUSTRI'=>$hit_penjualanhari
				    ,'TBLDAFTPJU_OMSETPAJAKNON'=>$hit_penjualanbulan
				    ,'TBLDAFTPJU_OMSETPAJAK'=>$totalomzet 
				    ,'TBLDAFTPJU_PAJAKSKPDINDUSTRI'=>$tbltransaksiketetapan_omzetindustri
				    ,'TBLDAFTPJU_PAJAKSKPDNON'=>$tbltransaksiketetapan_omzetnonindustri
				    ,'TBLDAFTPJU_THNSPTPD'=>isset($arr_tglsptpd[2]) ? substr($arr_tglsptpd[2], -2) : ''
				    ,'TBLDAFTPJU_BLNSPTPD'=>isset($arr_tglsptpd[1]) ? $arr_tglsptpd[1] : ''
				    ,'TBLDAFTPJU_TGLSPTPD'=>isset($arr_tglsptpd[0]) ? $arr_tglsptpd[0] : ''
				    ,'TBLDAFTPJU_THNTERIMA'=>substr($arr_tglterimasptpd[2],-2)
				    ,'TBLDAFTPJU_BLNTERIMA'=>$arr_tglterimasptpd[1]
				    ,'TBLDAFTPJU_TGLTERIMA'=>$arr_tglterimasptpd[0]
				    ,'TBLDAFTPJU_THNBATASSPTPD'=>substr($arr_tglbatassptpd[2],-2)
				    ,'TBLDAFTPJU_BLNBATASSPTPD'=>$arr_tglbatassptpd[1]
				    ,'TBLDAFTPJU_TGLBATASSPTPD'=>$arr_tglbatassptpd[0]
				    ,'TBLDAFTPJU_THNENTRI'=>substr($arr_tglentrisptpd[2],-2)
				    ,'TBLDAFTPJU_BLNENTRI'=>$arr_tglentrisptpd[1]
				    ,'TBLDAFTPJU_TGLENTRI'=>$arr_tglentrisptpd[0]
				    ,'TBLDAFTPJU_BUNGASPTPD'=>$hit_bungaspt
				);
		if ($cek>0) {
			$res['data'] = 'ada';
			$command = Yii::app()->db->createCommand();

			$simpan = $command->update('TBLDAFTPJU', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPAJAK AND TBLPENDATAAN_BLNPAJAK =:BLNPAJAK AND NVL(TBLPENDATAAN_TGLPAJAK, 0) =:TGLPAJAK',array(':NOPOK' => $nopokok, ':THNPAJAK' =>substr($tahun_pajak, -2), ':BLNPAJAK' => $bulan_pajak, ':TGLPAJAK' => (int)$tanggal_pajak));
			if ($simpan) {
				$res['status'] = 'update';
			}else{
				$res['status'] = 'failed';
			}
		} else {
			$res['data'] = 'tidak';
			$insert = Yii::app()->db->createCommand();
			$simpan = $insert->insert('TBLDAFTPJU', $column);
			if ($simpan) {
				$res['status'] = 'success';
			}else{
				$res['status'] = 'failed';
			}
		}
		echo CJSON::encode($res);
	}

	public function cekProses($thn, $bulan, $tgl, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT TBLDAFTPJU_RUPIAHSETOR FROM TBLDAFTPJU WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;

	}

	public function cekPernahDaftar($thn, $bulan, $tgl, $nopok, $persentarif)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTPJU WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;
	}

	public function cekTeguran($thn, $bulan, $tgl, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT TBLDAFTPJU_TGLENTRI FROM TBLDAFTPJU WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;
	}

	public function actionGetTGLBatas()
	{
		$data['THNPAJAK'] = substr($_REQUEST['THNPAJAK'],-2);
		$data['BLNPAJAK'] = $_REQUEST['BLNPAJAK']+1;
		$data['KODEREK'] = $_REQUEST['KODEREK'];

		// $tglbatas = RefTGLBatas::model()->get($data['KODEREK'],$data['THNPAJAK'],$data['BLNPAJAK']);

		/*Tanggal Batas Pajak*/
		$data['TANGGAL'] = 20;
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

		$data['TGLBATASBLNNOW'] = '20-'.$blnnow.'-'.$thnnow;

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
		$nopok = intval($_POST['nomor_pajak']);
		$bulan = (int)trim($_POST['bulan']);
		$tahun = intval($_POST['tahun']);
		$tgl = isset($_REQUEST['tgl']) ? (int)$_REQUEST['tgl'] : '';
		$thn = substr($tahun, -2);

		$dt = Yii::app()->db->createCommand('SELECT NVL(TBLDAFTPJU_TGLENTRI, 0) AS TGLENTRI FROM TBLDAFTPJU WHERE 
			TBLPENDATAAN_THNPAJAK ='.$thn.' 
			AND TBLPENDATAAN_BLNPAJAK='.$bulan.' 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.'
			AND TBLDAFTAR_NOPOK='.$nopok
		)->queryRow();

		if ($dt && $dt['TGLENTRI']==0) {
			$del = Yii::app()->db->createCommand()->delete('TBLDAFTPJU', '
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