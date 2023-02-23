<?php

class Pajak_bphtbController extends Controller
{
	var $KODE_GOL = 1;
	var $PAJAK_AYAT = 11;
	var $PAJAK_REK = '4.1.1.11.0';
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
		WHERE TBLREKENING_KODE LIKE '4.1.1.11.%'
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
		$teguran = $this->cekTeguran(substr($tahun, -2), $bulan, (int)$tgl, $NOPOK);
		$cekNPOPTKP = $this->cekNPOPTKP($NOPOK);
		$npoptkp = isset($cekNPOPTKP['NPOPTKP']) ? ($cekNPOPTKP['NPOPTKP']) : 0;
		$PCT = isset($cekNPOPTKP['PCT']) ? ($cekNPOPTKP['PCT']) : 0;

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
			TBLDAFTBPHTB.TBLPENDATAAN_THNPAJAK,
			TBLDAFTBPHTB.TBLPENDATAAN_BLNPAJAK,
			TBLDAFTBPHTB.TBLDAFTBPHTB_OMSETPAJAK,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_PAJAK, 0) AS TBLDAFTBPHTB_PAJAK,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_BUNGASPTPD, 0) AS TBLDAFTBPHTB_BUNGASPTPD,
			TBLDAFTBPHTB.TBLDAFTBPHTB_THNSPTPD,
			TBLDAFTBPHTB.TBLDAFTBPHTB_BLNSPTPD,
			TBLDAFTBPHTB.TBLDAFTBPHTB_TGLSPTPD,
			TBLDAFTBPHTB.TBLDAFTBPHTB_THNBATASSPTPD,
			TBLDAFTBPHTB.TBLDAFTBPHTB_BLNBATASSPTPD,
			TBLDAFTBPHTB.TBLDAFTBPHTB_TGLBATASSPTPD,
			TBLDAFTBPHTB.TBLDAFTBPHTB_THNTERIMA,
			TBLDAFTBPHTB.TBLDAFTBPHTB_BLNTERIMA,
			TBLDAFTBPHTB.TBLDAFTBPHTB_TGLTERIMA,
			TBLDAFTBPHTB.TBLDAFTBPHTB_THNENTRI,
			TBLDAFTBPHTB.TBLDAFTBPHTB_BLNENTRI,
			TBLDAFTBPHTB.TBLDAFTBPHTB_TGLENTRI
			";
			$from = 'TBLDAFTAR';
			$filter = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $NOPOK
			);

			$filter_AND = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
				,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
				,'EQ__TBLDAFTBPHTB.TBLPENDATAAN_THNPAJAK' => $thn
				,'EQ__TBLDAFTBPHTB.TBLPENDATAAN_BLNPAJAK' => $bulan
				,'EQ__TBLDAFTBPHTB.TBLPENDATAAN_TGLPAJAK' => $tgl
				// ,'EQ__tblsubyek_isaktif' => "T"
			);

			$otherquery = array(
				'limit'=> 30
				,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID = TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
				,'join_2'=> array('TBLDAFTBPHTB', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTBPHTB.TBLDAFTAR_NOPOK')
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

			$data['TBLDAFTBPHTB_OMSETPAJAK'] =$model['TBLDAFTBPHTB_OMSETPAJAK'];
			$data['TBLDAFTBPHTB_PAJAK'] =$model['TBLDAFTBPHTB_PAJAK'];
			$data['TBLDAFTBPHTB_BUNGASPTPD'] =$model['TBLDAFTBPHTB_BUNGASPTPD'];

			$data['TBLDAFTBPHTB_THNSPTPD'] =$model['TBLDAFTBPHTB_THNSPTPD'];
			$data['TBLDAFTBPHTB_BLNSPTPD'] =$model['TBLDAFTBPHTB_BLNSPTPD'];
			$data['TBLDAFTBPHTB_TGLSPTPD'] =$model['TBLDAFTBPHTB_TGLSPTPD'];

			$data['TBLDAFTBPHTB_THNBATASSPTPD'] =$model['TBLDAFTBPHTB_THNBATASSPTPD'];
			$data['TBLDAFTBPHTB_BLNBATASSPTPD'] =$model['TBLDAFTBPHTB_BLNBATASSPTPD'];
			$data['TBLDAFTBPHTB_TGLBATASSPTPD'] =$model['TBLDAFTBPHTB_TGLBATASSPTPD'];

			$data['TBLDAFTBPHTB_THNTERIMA'] =$model['TBLDAFTBPHTB_THNTERIMA'];
			$data['TBLDAFTBPHTB_BLNTERIMA'] =$model['TBLDAFTBPHTB_BLNTERIMA'];
			$data['TBLDAFTBPHTB_TGLTERIMA'] =$model['TBLDAFTBPHTB_TGLTERIMA'];
			
			$data['TBLDAFTBPHTB_THNENTRI'] =$model['TBLDAFTBPHTB_THNENTRI'];
			$data['TBLDAFTBPHTB_BLNENTRI'] =$model['TBLDAFTBPHTB_BLNENTRI'];
			$data['TBLDAFTBPHTB_TGLENTRI'] =$model['TBLDAFTBPHTB_TGLENTRI'];*/

		} elseif ($cek>0) {
			$data['data'] = 'ada';
			$select = '
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
			TBLDAFTBPHTB.TBLDAFTBPHTB_PERSENTARIF AS REFBADANUSAHA_PERSEN,
			TBLDAFTBPHTB.TBLPENDATAAN_THNPAJAK,
			TBLDAFTBPHTB.TBLPENDATAAN_BLNPAJAK,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_OMSETPAJAK, 0) AS TBLDAFTBPHTB_OMSETPAJAK,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_PAJAK, 0) AS TBLDAFTBPHTB_PAJAK,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_BUNGASPTPD, 0) AS TBLDAFTBPHTB_BUNGASPTPD,
			TBLDAFTBPHTB.TBLKECAMATAN_ID,
			TBLDAFTBPHTB.TBLKELURAHAN_ID,
			TBLDAFTBPHTB.TBLDAFTBPHTB_PERSENRINGAN,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_NOP1, 0) AS TBLDAFTBPHTB_NOP1,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_NOP2, 0) AS TBLDAFTBPHTB_NOP2,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_NOP3, 0) AS TBLDAFTBPHTB_NOP3,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_NOP4, 0) AS TBLDAFTBPHTB_NOP4,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_NOP5, 0) AS TBLDAFTBPHTB_NOP5,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_NOP6, 0) AS TBLDAFTBPHTB_NOP6,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_NOP7, 0) AS TBLDAFTBPHTB_NOP7,

			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_LUASTANAH, 0) AS TBLDAFTBPHTB_LUASTANAH,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_NJOPTANAH, 0) AS TBLDAFTBPHTB_NJOPTANAH,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_LUASBANGUNAN, 0) AS TBLDAFTBPHTB_LUASBANGUNAN,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_NJOPBANGUNAN, 0) AS TBLDAFTBPHTB_NJOPBANGUNAN,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_NILAIPASAR, 0) AS TBLDAFTBPHTB_NILAIPASAR,
			NVL(TBLDAFTBPHTB.TBLDAFTBPHTB_NOSERTIFIKAT, 0) AS TBLDAFTBPHTB_NOSERTIFIKAT,
			"refbphtbtarif".NPOPTKP,

			TBLDAFTBPHTB.TBLDAFTBPHTB_THNSPTPD,
			TBLDAFTBPHTB.TBLDAFTBPHTB_BLNSPTPD,
			TBLDAFTBPHTB.TBLDAFTBPHTB_TGLSPTPD,
			TBLDAFTBPHTB.TBLDAFTBPHTB_THNBATASSPTPD,
			TBLDAFTBPHTB.TBLDAFTBPHTB_BLNBATASSPTPD,
			TBLDAFTBPHTB.TBLDAFTBPHTB_TGLBATASSPTPD,
			TBLDAFTBPHTB.TBLDAFTBPHTB_THNTERIMA,
			TBLDAFTBPHTB.TBLDAFTBPHTB_BLNTERIMA,
			TBLDAFTBPHTB.TBLDAFTBPHTB_TGLTERIMA,
			TBLDAFTBPHTB.TBLDAFTBPHTB_THNENTRI,
			TBLDAFTBPHTB.TBLDAFTBPHTB_BLNENTRI,
			TBLDAFTBPHTB.TBLDAFTBPHTB_TGLENTRI
			';
			$from = 'TBLDAFTAR';
			$filter = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $NOPOK
			);

			$filter_AND = array(
				// 'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL,
				'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT,
				'EQ__TBLDAFTBPHTB.TBLPENDATAAN_THNPAJAK' => $thn,
				'EQ__TBLDAFTBPHTB.TBLPENDATAAN_BLNPAJAK' => $bulan,
				// 'EQ__TBLDAFTBPHTB.TBLPENDATAAN_TGLPAJAK' => $tgl,
				// 'EQ__tblsubyek_isaktif' => "T",
			);

			$otherquery = array(
				'andwhere_tglpajak' => array("NVL(TBLDAFTBPHTB.TBLPENDATAAN_TGLPAJAK,0)=:tgl",array(':tgl' => $tgl)),
				'limit'=> 30,
				'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID = TBLDAFTAR.REFBADANUSAHA_IDPEMILIK'),
				'join_2'=> array('TBLDAFTBPHTB', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTBPHTB.TBLDAFTAR_NOPOK'),
				'join_3'=> array('refbphtbtarif', 'REFBADANUSAHA.REFBADANUSAHA_REKJENIS = "refbphtbtarif".JEN AND REFBADANUSAHA.REFBADANUSAHA_REKAYAT = "refbphtbtarif".AYT'),
				'order'=> 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC',
			);
			$model = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL') );

			foreach ($model as $key => $val) :
				$data[$key] = $val;
			endforeach;

			$tbldaftarnop = Yii::app()->db->createCommand("SELECT 
				TBLDAFTARNOP_NOP AS tbldaftarnop_nop
				FROM TBLDAFTARNOP 
				WHERE 
				TBLPENDATAAN_THNPAJAK=:thn
				AND TBLPENDATAAN_BLNPAJAK=:bulan
				AND NVL(TBLPENDATAAN_TGLPAJAK, 0)=:tgl
				AND TBLDAFTAR_NOPOK=:nopok
				ORDER BY TBLDAFTARNOP_URUT
			")
			->bindParam(":thn", $thn)
			->bindParam(":bulan", $bulan)
			->bindParam(":tgl", $tgl)
			->bindParam(":nopok", $NOPOK)
			->queryAll();
			$data['tbldaftarnop'] = $tbldaftarnop;

			// $data['TBLDAFTAR_BADANUSAHANAMA'] =$model['TBLDAFTAR_BADANUSAHANAMA'];
			// $data['TBLDAFTAR_BADANUSAHAALAMAT'] =$model['TBLDAFTAR_BADANUSAHAALAMAT'];
			// $data['TBLKECAMATAN_IDBADANUSAHA'] =$model['TBLKECAMATAN_IDBADANUSAHA'];
			// $data['TBLKELURAHAN_IDBADANUSAHA'] =$model['TBLKELURAHAN_IDBADANUSAHA'];
			// $data['REKENING_KODE'] =$model['REKENING_KODE'];
			// $data['TREKENING_TARIF'] =$model['REFBADANUSAHA_PERSEN'];
			
			// $data['REFBADANUSAHA_REKPENDAPATAN'] =$model['REFBADANUSAHA_REKPENDAPATAN'];
			// $data['REFBADANUSAHA_REKPAD'] =$model['REFBADANUSAHA_REKPAD'];
			// $data['REFBADANUSAHA_REKPJK'] =$model['REFBADANUSAHA_REKPJK'];
			// $data['REFBADANUSAHA_REKAYAT'] =$model['REFBADANUSAHA_REKAYAT'];
			// $data['REFBADANUSAHA_REKJENIS'] =$model['REFBADANUSAHA_REKJENIS'];

			// $data['TBLDAFTBPHTB_OMSETPAJAK'] =$model['TBLDAFTBPHTB_OMSETPAJAK'];
			// $data['TBLDAFTBPHTB_PAJAK'] =$model['TBLDAFTBPHTB_PAJAK'];
			// $data['TBLDAFTBPHTB_BUNGASPTPD'] =$model['TBLDAFTBPHTB_BUNGASPTPD'];

			// $data['TBLDAFTBPHTB_THNSPTPD'] =$model['TBLDAFTBPHTB_THNSPTPD'];
			// $data['TBLDAFTBPHTB_BLNSPTPD'] =$model['TBLDAFTBPHTB_BLNSPTPD'];
			// $data['TBLDAFTBPHTB_TGLSPTPD'] =$model['TBLDAFTBPHTB_TGLSPTPD'];

			// $data['TBLDAFTBPHTB_THNBATASSPTPD'] =$model['TBLDAFTBPHTB_THNBATASSPTPD'];
			// $data['TBLDAFTBPHTB_BLNBATASSPTPD'] =$model['TBLDAFTBPHTB_BLNBATASSPTPD'];
			// $data['TBLDAFTBPHTB_TGLBATASSPTPD'] =$model['TBLDAFTBPHTB_TGLBATASSPTPD'];

			// $data['TBLDAFTBPHTB_THNTERIMA'] =$model['TBLDAFTBPHTB_THNTERIMA'];
			// $data['TBLDAFTBPHTB_BLNTERIMA'] =$model['TBLDAFTBPHTB_BLNTERIMA'];
			// $data['TBLDAFTBPHTB_TGLTERIMA'] =$model['TBLDAFTBPHTB_TGLTERIMA'];
			
			// $data['TBLDAFTBPHTB_THNENTRI'] =$model['TBLDAFTBPHTB_THNENTRI'];
			// $data['TBLDAFTBPHTB_BLNENTRI'] =$model['TBLDAFTBPHTB_BLNENTRI'];
			// $data['TBLDAFTBPHTB_TGLENTRI'] =$model['TBLDAFTBPHTB_TGLENTRI'];

		} else {
			$data['data'] = 'tidak';

			$select = '
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
			TBLDAFTAR.TBLDAFTAR_ISAKTIF,
			TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
			TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			"refbphtbtarif".PCT AS REFBADANUSAHA_PERSEN,
			refbphtbtarif.NPOPTKP,
			REFBADANUSAHA.REKENING_KODE,
			REFBADANUSAHA.REFBADANUSAHA_REKPENDAPATAN,
			REFBADANUSAHA.REFBADANUSAHA_REKPAD,
			REFBADANUSAHA.REFBADANUSAHA_REKPJK,
			REFBADANUSAHA.REFBADANUSAHA_REKAYAT,
			REFBADANUSAHA.REFBADANUSAHA_REKJENIS
			';
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
				,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDPEMILIK')
				,'join_3'=> array('refbphtbtarif', 'REFBADANUSAHA.REFBADANUSAHA_REKJENIS = "refbphtbtarif".JEN AND REFBADANUSAHA.REFBADANUSAHA_REKAYAT = "refbphtbtarif".AYT')
				,'order'=> 'TBLDAFTAR_NOPOK ASC'
			);
			$model = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL') );

			$data['TBLDAFTAR_PEMILIKNAMA'] =$model['TBLDAFTAR_PEMILIKNAMA'];
			$data['TBLDAFTAR_PEMILIKALAMAT'] =$model['TBLDAFTAR_PEMILIKALAMAT'];
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
		$data['NPOPTKP'] = floatval($npoptkp);
		$data['PCT'] = floatval($PCT);
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
			'LK__TBLDAFTAR_PEMILIKNAMA' => $query
			,'LK__TBLDAFTAR_PEMILIKALAMAT' => $query
			,'LK__TBLDAFTAR_NOPOK' => $query
		);

		$filter_AND = array(
			// 'EQ__TBLDAFTAR_GOLONGAN' => $this->KODE_GOL,
			'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT,
			'EQ__TBLDAFTAR_ISAKTIF' => 'Y'
		);

		$otherquery = array(
			'limit'=> 30,
			'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDPEMILIK'),
			'order'=> 'TBLDAFTAR_NOPOK ASC',
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$results = DBFetch::query($arrayConfig);

		$suggestions = array();
		 
		foreach($results as $result)
		{
			$suggestions[] = array(
			"value" => $result['TBLDAFTAR_NOPOK']. ' | ' . $result['TBLDAFTAR_PEMILIKNAMA']. ' | ' . $result['TBLDAFTAR_PEMILIKALAMAT']
			,"data" => $result['TBLDAFTAR_NOPOK']
			,"TBLDAFTAR_PEMILIKNAMA" => $result['TBLDAFTAR_PEMILIKNAMA']
			,"TBLDAFTAR_PEMILIKALAMAT" => $result['TBLDAFTAR_PEMILIKALAMAT']
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
				    ,'TBLDAFTBPHTB_JUMLAHHARIJUAL'=>''
					,'TBLDAFTBPHTB_OMSETPAJAK'=>'0'
					,'TBLDAFTBPHTB_PAJAK'=>''
					,'TBLDAFTBPHTB_BUNGASPTPD'=>''
					,'TBLDAFTBPHTB_PAJAK'=>''
					,'TBLDAFTBPHTB_THNSKPD'=>''
					,'TBLDAFTBPHTB_BLNSKPD'=>''
					,'TBLDAFTBPHTB_TGLSKPD'=>''
					,'TBLDAFTBPHTB_PAJAKSKPD'=>''
					,'TBLDAFTBPHTB_THNBATASSKPD'=>''
					,'TBLDAFTBPHTB_BLNBATASSKPD'=>''
					,'TBLDAFTBPHTB_TGLBATASSKPD'=>''
					);
		$simpan = $command->update('TBLDAFTBPHTB', $column, 'TBLDAFTAR_NOPOK =:NOPOK  NVL(TBLPENDATAAN_TGLENTRI, 0) =:TGLPAJAK',array(':NOPOK' => $nopok, ':TGLPAJAK' => (int)$tglentri));
			if ($simpan) {
				$res['status'] = 'success';
			}else{
				$res['status'] = 'failed';
			}
	}
	
	public function actionsimpandata()
	{
		// echo CJSON::encode($_REQUEST);Yii::app()->end();
		$nopokok   = Yii::app()->request->getParam('nopokok');
		$nop   = Yii::app()->request->getParam('nop');
		$tahun_pajak   = Yii::app()->request->getParam('tahun_pajak');
		$bulan_pajak   = Yii::app()->request->getParam('bulan_pajak');
		$tanggal_pajak = (int)Yii::app()->request->getParam('tanggal_pajak');
		$tanggal_pajak = empty($tanggal_pajak) ? null : $tanggal_pajak;

		$masapajak_tahun      = Yii::app()->request->getParam('masapajak_tahun');
		$masapajak_bulan      = Yii::app()->request->getParam('masapajak_bulan');
		$masapajak_tanggal    = Yii::app()->request->getParam('masapajak_tanggal');

		$wp_input_tgl_spt     = Yii::app()->request->getParam('wp_input_tgl_spt');
		$hit_keringanan       = Yii::app()->request->getParam('hit_keringanan');
		$hit_tanggalawal      = Yii::app()->request->getParam('hit_tanggalawal');
		$hit_tanggalakhir     = Yii::app()->request->getParam('hit_tanggalakhir');

		$hit_tglterimaspt     = Yii::app()->request->getParam('hit_tglterimaspt');
		$hit_tglbatasspt      = Yii::app()->request->getParam('hit_tglbatasspt');
		$hit_tglentryspt      = Yii::app()->request->getParam('hit_tglentryspt');
		$hit_carapenghitungan = Yii::app()->request->getParam('hit_carapenghitungan');

		$tanah_luas    = Yii::app()->request->getParam('tanah_luas');
		$tanah_njop    = LokalIndonesia::toAngka(Yii::app()->request->getParam('tanah_njop'));
		$bangunan_luas = Yii::app()->request->getParam('bangunan_luas');
		$bangunan_njop = LokalIndonesia::toAngka(Yii::app()->request->getParam('bangunan_njop'));
		$njpbb = LokalIndonesia::toAngka(Yii::app()->request->getParam('njpbb'));
		$jual = LokalIndonesia::toAngka(Yii::app()->request->getParam('jual'));
		$npop = LokalIndonesia::toAngka(Yii::app()->request->getParam('npop'));
		$persen = Yii::app()->request->getParam('persen');
		$keringanan = Yii::app()->request->getParam('keringanan',null);
		$bayar = LokalIndonesia::toAngka(Yii::app()->request->getParam('bayar'));
		$no_sertifikat = Yii::app()->request->getParam('no_sertifikat');
		$refbadanusaha_rekjenis = Yii::app()->request->getParam('refbadanusaha_rekjenis');
		$kecamatan_pajak = Yii::app()->request->getParam('kecamatan_pajak');
		$kelurahan_pajak = Yii::app()->request->getParam('kelurahan_pajak');

		//$arr_koderekening_sub =  str_split($koderekening_sub);
		$arr_tglawal = explode('-', $hit_tanggalawal);
		$arr_tglakhir = explode('-', $hit_tanggalakhir);
		$arr_tglsptpd = explode('-', $wp_input_tgl_spt);
		$arr_tglterimasptpd = explode('-', $hit_tglterimaspt);
		$arr_tglbatassptpd = explode('-', $hit_tglbatasspt);
		$arr_tglentrisptpd = explode('-', $hit_tglentryspt);

		$nop_exp = explode('.', $nop);
		$nop_1 = isset($nop_exp[0]) ? $nop_exp[0] : null;
		$nop_2 = isset($nop_exp[1]) ? $nop_exp[1] : null;
		$nop_3 = isset($nop_exp[2]) ? $nop_exp[2] : null;
		$nop_4 = isset($nop_exp[3]) ? $nop_exp[3] : null;
		$nop_5 = isset($nop_exp[4]) ? $nop_exp[4] : null;
		$nop_6 = isset($nop_exp[5]) ? $nop_exp[5] : null;
		$nop_7 = 0;

		$res = array();
		$cek = $this->cekPernahDaftar(substr($tahun_pajak, -2), $bulan_pajak, intval($tanggal_pajak), $nopokok);
		
		$column = array('TBLPENDATAAN_THNPAJAK'=>substr($tahun_pajak, -2)
				    ,'TBLPENDATAAN_BLNPAJAK'=>$bulan_pajak
				    ,'TBLPENDATAAN_TGLPAJAK'=>$tanggal_pajak
				    ,'TBLDAFTAR_NOPOK'=>$nopokok
				    ,'TBLDAFTAR_JNSPENDAPATAN'=>'P'
				    ,'TBLDAFTAR_GOLONGAN'=>1
				    ,'TBLDAFTBPHTB_REKURUSAN'=>1
				    ,'TBLDAFTBPHTB_REKPEMERINTAHAN'=>20
				    ,'TBLDAFTBPHTB_REKORGANISASI'=>1
				    ,'TBLDAFTBPHTB_REKPROGRAM'=>20
				    ,'TBLDAFTBPHTB_REKKEGIATAN'=>26
				    ,'TBLDAFTBPHTB_REKDINAS'=>0
				    ,'TBLDAFTBPHTB_REKBIDANG'=>0
				    ,'TBLDAFTBPHTB_REKPENDAPATAN'=>4
				    ,'TBLDAFTBPHTB_REKPAD'=>1
				    ,'TBLDAFTBPHTB_REKPAJAK'=>1
				    ,'TBLDAFTBPHTB_REKAYAT'=>11
				    ,'TBLDAFTBPHTB_REKJENIS'=>$refbadanusaha_rekjenis
				    ,'TBLKECAMATAN_ID'=>$kecamatan_pajak
				    ,'TBLKELURAHAN_ID'=>$kelurahan_pajak
				    //,'TBLDAFTBPHTB_ISKAS'=>$is_kas
				    //,'TBLDAFTBPHTB_ISPEMBUKUAN'=>$is_pembukuan
				    // /,'TBLDAFTBPHTB_ISNOTA'=>$is_nota
				    // ,'TBLDAFTBPHTB_ISLHP'=>$is_lhp
				    // ,'TBLDAFTBPHTB_ISNOTABIL'=>$is_notabil
				    ,'TBLDAFTBPHTB_ISJNSPENETAPAN'=>$hit_carapenghitungan
				    ,'TBLDAFTBPHTB_THNMULAIJUAL'=>null //substr($arr_tglawal[2], -2)
				    ,'TBLDAFTBPHTB_BLNMULAIJUAL'=>null //$arr_tglawal[1]
				    ,'TBLDAFTBPHTB_TGLMULAIJUAL'=>null //$arr_tglawal[0]
				    ,'TBLDAFTBPHTB_THNAKHIRJUAL'=>null //substr($arr_tglakhir[2], -2)
				    ,'TBLDAFTBPHTB_BLNAKHIRJUAL'=>null //$arr_tglakhir[1]
				    ,'TBLDAFTBPHTB_TGLAKHIRJUAL'=>null //$arr_tglakhir[0]
				    ,'TBLDAFTBPHTB_JUMLAHHARIJUAL'=>null
				    ,'TBLDAFTBPHTB_OMSETPAJAK'=>$npop
				    ,'TBLDAFTBPHTB_PERSENTARIF'=>$persen
				    ,'TBLDAFTBPHTB_PAJAK'=>$bayar
				    ,'TBLDAFTBPHTB_PAJAKSKPD'=>$bayar
				    ,'TBLDAFTBPHTB_THNSPTPD'=>isset($arr_tglsptpd[2]) ? substr($arr_tglsptpd[2], -2) : ''
				    ,'TBLDAFTBPHTB_BLNSPTPD'=>isset($arr_tglsptpd[1]) ? $arr_tglsptpd[1] : ''
				    ,'TBLDAFTBPHTB_TGLSPTPD'=>isset($arr_tglsptpd[0]) ? $arr_tglsptpd[0] : ''
				    ,'TBLDAFTBPHTB_THNTERIMA'=>substr($arr_tglterimasptpd[2],-2)
				    ,'TBLDAFTBPHTB_BLNTERIMA'=>$arr_tglterimasptpd[1]
				    ,'TBLDAFTBPHTB_TGLTERIMA'=>$arr_tglterimasptpd[0]
				    ,'TBLDAFTBPHTB_THNBATASSPTPD'=>substr($arr_tglbatassptpd[2],-2)
				    ,'TBLDAFTBPHTB_BLNBATASSPTPD'=>$arr_tglbatassptpd[1]
				    ,'TBLDAFTBPHTB_TGLBATASSPTPD'=>$arr_tglbatassptpd[0]
				    ,'TBLDAFTBPHTB_THNENTRI'=>substr($arr_tglentrisptpd[2],-2)
				    ,'TBLDAFTBPHTB_BLNENTRI'=>$arr_tglentrisptpd[1]
				    ,'TBLDAFTBPHTB_TGLENTRI'=>$arr_tglentrisptpd[0]
				    ,'TBLDAFTBPHTB_BUNGASPTPD'=>null

				    ,'TBLDAFTBPHTB_NOP1'=>$nop_1
				    ,'TBLDAFTBPHTB_NOP2'=>$nop_2
				    ,'TBLDAFTBPHTB_NOP3'=>$nop_3
				    ,'TBLDAFTBPHTB_NOP4'=>$nop_4
				    ,'TBLDAFTBPHTB_NOP5'=>$nop_5
				    ,'TBLDAFTBPHTB_NOP6'=>$nop_6

				    ,'TBLDAFTBPHTB_LUASTANAH'=>$tanah_luas
				    ,'TBLDAFTBPHTB_LUASBANGUNAN'=>$bangunan_luas
				    ,'TBLDAFTBPHTB_NJOPTANAH'=>$tanah_njop
				    ,'TBLDAFTBPHTB_NJOPBANGUNAN'=>$bangunan_njop
				    ,'TBLDAFTBPHTB_HARGATANAH'=>$tanah_luas * $tanah_njop
				    ,'TBLDAFTBPHTB_HARGABANGUNAN'=>$bangunan_luas * $bangunan_njop
				    ,'TBLDAFTBPHTB_NILAIJUAL'=>$njpbb
				    ,'TBLDAFTBPHTB_NILAIPASAR'=>$jual
				    ,'TBLDAFTBPHTB_JNSBPHTB'=>$refbadanusaha_rekjenis
				    ,'TBLDAFTBPHTB_NOSERTIFIKAT'=>$no_sertifikat
				    ,'TBLDAFTBPHTB_PERSENRINGAN'=>$keringanan
				);
		// echo CJSON::encode([$column,$cek]);Yii::app()->end();
		
		$data_nop['thn'] = substr($tahun_pajak, -2);
		$data_nop['bln'] = $bulan_pajak;
		$data_nop['tgl'] = $tanggal_pajak;
		$data_nop['nopok'] = $nopokok;
		$data_nop['tbldaftarnop'] = CJSON::decode(Yii::app()->request->getParam('tbldaftarnop', '{}'));

		if ($cek>0) {
			$res['data'] = 'ada';
			$command = Yii::app()->db->createCommand();

			$simpan = $command->update('TBLDAFTBPHTB', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPAJAK AND TBLPENDATAAN_BLNPAJAK =:BLNPAJAK AND NVL(TBLPENDATAAN_TGLPAJAK, 0) =:TGLPAJAK',array(':NOPOK' => $nopokok, ':THNPAJAK' =>substr($tahun_pajak, -2), ':BLNPAJAK' => $bulan_pajak, ':TGLPAJAK' => (int)$tanggal_pajak));
			if ($simpan) {
				$daftar_nopok = $this->simpan_daftar_nop($data_nop);
				$res['daftar_nopok'] = $daftar_nopok;
				$res['status'] = 'update';
			}else{
				$res['status'] = 'failed';
			}
		} else {
			$res['data'] = 'tidak';
			$insert = Yii::app()->db->createCommand();
			$simpan = $insert->insert('TBLDAFTBPHTB', $column);
			if ($simpan) {
				$daftar_nopok = $this->simpan_daftar_nop($data_nop);
				$res['daftar_nopok'] = $daftar_nopok;
				$res['status'] = 'success';
			}else{
				$res['status'] = 'failed';
			}
		}
		echo CJSON::encode($res);
	}

	public function simpan_daftar_nop($data)
	{
		$data_column = array();
		foreach ($data['tbldaftarnop'] as $idx => $n) :

		$nop = $n['tbldaftarnop_nop'];
		$nop_exp = explode('.', $nop);
		$nop_1 = isset($nop_exp[0]) ? $nop_exp[0] : null;
		$nop_2 = isset($nop_exp[1]) ? $nop_exp[1] : null;
		$nop_3 = isset($nop_exp[2]) ? $nop_exp[2] : null;
		$nop_4 = isset($nop_exp[3]) ? $nop_exp[3] : null;
		$nop_5 = isset($nop_exp[4]) ? $nop_exp[4] : null;
		$nop_6 = isset($nop_exp[5]) ? $nop_exp[5] : null;
		$nop_7 = 0;

			$data_column[] = array(
				'TBLPENDATAAN_THNPAJAK'  => $data['thn'],
				'TBLPENDATAAN_BLNPAJAK'  => $data['bln'],
				'TBLPENDATAAN_TGLPAJAK'  => $data['tgl'],
				'TBLDAFTAR_NOPOK'        => $data['nopok'],
				'TBLDAFTARNOP_URUT'      => $idx+1,
				'TBLDAFTARNOP_NOP'      => $n['tbldaftarnop_nop'],
				'TBLDAFTARNOP_NOP1'       => $nop_1,
				'TBLDAFTARNOP_NOP2'       => $nop_2,
				'TBLDAFTARNOP_NOP3'       => $nop_3,
				'TBLDAFTARNOP_NOP4'       => $nop_4,
				'TBLDAFTARNOP_NOP5'       => $nop_5,
				'TBLDAFTARNOP_NOP6'       => $nop_6,
				'TBLDAFTARNOP_NOP7'       => $nop_7,
				'TBLDAFTARNOP_SYSINSERT' => DMOrcl::getNow(),
			);
		endforeach;

		$command = Yii::app()->db->createCommand();

		$deletedulu = $command
		->delete("TBLDAFTARNOP", 
			'
			TBLPENDATAAN_THNPAJAK=:thn
			AND TBLPENDATAAN_BLNPAJAK=:bln
			AND NVL(TBLPENDATAAN_TGLPAJAK,0)=:tgl
			AND TBLDAFTAR_NOPOK=:nopok
			', 
			array(
				':thn'   => $data['thn'],
				':bln'   => $data['bln'],
				':tgl'   => (int)$data['tgl'],
				':nopok' => $data['nopok'],
			)
		);

		// $connection = Yii::app()->db->getSchema()->getCommandBuilder();
		// $cmd = $connection->createMultipleInsertCommand('TBLDAFTARNOP', $data_column);
		// $cmd->execute();

        foreach ($data_column as $key => $rs) :
			$simpan = $command
			->insert("TBLDAFTARNOP", 
				$rs
			);
			$logs[] = array('status' => $simpan, 'data' => $rs, );
        endforeach;
        return $logs;
	}

	public function cekNPOPTKP($nopok)
	{
		$sql = "
		SELECT DISTINCT NPOPTKP,PCT
		from TBLDAFTAR t1 
		join REFBADANUSAHA t2 on t2.REFBADANUSAHA_ID = t1.REFBADANUSAHA_IDPEMILIK
		join \"refbphtbtarif\" t3 on t3.AYT=t2.REFBADANUSAHA_REKAYAT and t3.JEN=t2.REFBADANUSAHA_REKJENIS
		where TBLDAFTAR_NOPOK = :nopok";
		$model = Yii::app()->db->createCommand($sql)
		->bindParam(":nopok", $nopok)
		->queryRow();
		return $model;

	}

	public function cekProses($thn, $bulan, $tgl, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT 
			-- TBLDAFTBPHTB_RUPIAHSETOR (cek sudah setor dimatikan 28-12-2020 rahmat)
			TBLPENDATAAN_PAJAKKE
		 FROM TBLDAFTBPHTB WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;

	}

	public function cekPernahDaftar($thn, $bulan, $tgl, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTBPHTB WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;
	}

	public function cekTeguran($thn, $bulan, $tgl, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT TBLDAFTBPHTB_TGLENTRI FROM TBLDAFTBPHTB WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
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
		$nopok = intval($_POST['nomor_pajak']);
		$bulan = (int)trim($_POST['bulan']);
		$tahun = intval($_POST['tahun']);
		$tgl = isset($_REQUEST['tgl']) ? (int)$_REQUEST['tgl'] : '';
		$thn = substr($tahun, -2);

		$dt = Yii::app()->db->createCommand('SELECT NVL(TBLDAFTBPHTB_TGLENTRI, 0) AS TGLENTRI FROM TBLDAFTBPHTB WHERE 
			TBLPENDATAAN_THNPAJAK ='.$thn.' 
			AND TBLPENDATAAN_BLNPAJAK='.$bulan.' 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.'
			AND TBLDAFTAR_NOPOK='.$nopok
		)->queryRow();

		if ($dt && $dt['TGLENTRI']==0) {
			$del = Yii::app()->db->createCommand()->delete('TBLDAFTBPHTB', '
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