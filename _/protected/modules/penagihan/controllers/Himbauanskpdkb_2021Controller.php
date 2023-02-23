<?php

class Himbauanskpdkb_2021Controller extends Controller
{
	public function actionIndex()
	{
		$data['rek'] = Yii::app()->db->createCommand("
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
			AND TBLREKENING_REKAYAT <> 9
			AND TBLREKENING_REKAYAT <> 10
			AND TBLREKENING_REKAYAT <> 11
			AND TBLREKENING_REKAYAT <> 23
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			")->queryAll();
		$data['URL_APP'] = Yii::app()->getBaseUrl(true);		
		$this->renderPartial('index', array('data'=>$data));
	}
	public function actionCari()
	{
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
		$tanggalcutoff = $_REQUEST['tanggalcutoff'] ? $_REQUEST['tanggalcutoff'] : '';
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';
		$TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
		$TBLPENDATAAN_THNPAJAK_AKHIR = substr($_REQUEST['TBLPENDATAAN_THNPAJAK_AKHIR'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK_AKHIR'], -2) : '';

		$KODEREK = $_REQUEST['TBLREKENING_KODE'];
		if($KODEREK=='4.1.1.1.0'){
			$NamaTBL = 'TBLDAFTHOTEL';
			$ADKB = 'KENAIKANKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
		}
		elseif($KODEREK=='4.1.1.2.0'){
			$NamaTBL = 'TBLDAFTRMAKAN';
			$ADKB = 'NAKB';
			$NOANG = 'REGSURATANGSUR';
		}
		elseif($KODEREK=='4.1.1.3.0'){
			$NamaTBL = 'TBLDAFTHIBURAN';
			$ADKB = 'NAKB';
			$NOANG = 'REGSURATANGSUR';
		}
		elseif($KODEREK=='4.1.1.7.0'){
			$NamaTBL = 'TBLDAFTPARKIR';	
			$ADKB = 'NAKB';
			$NOANG = 'REGSURATANGSUR';
		}
		elseif($KODEREK=='4.1.1.8.0'){
			$NamaTBL = 'TBLDAFTTANAH';
			$ADKB = 'NAKB';
			$NOANG = 'REGSURATANGSUR';
		}
		elseif($KODEREK=='4.1.1.9.0'){
			$NamaTBL = 'TBLDAFTBURUNG';
			$ADKB = 'NAKB';
			$NOANG = 'REGSURATANGSUR';
		}
		elseif($KODEREK=='4.1.1.11.0'){
			$NamaTBL = 'TBLDAFTBPHTB';
			$ADKB = 'NAKB';
			$NOANG = 'REGSURATANGSUR';
		}





		if($TBLDAFTAR_NOPOK==''){
			$wherenopok = "";

		}

		else{
			$wherenopok = "AND
			".$NamaTBL.".TBLDAFTAR_NOPOK = ".$TBLDAFTAR_NOPOK."";
		};

		if($TBLPENDATAAN_THNPAJAK=='' && $TBLPENDATAAN_THNPAJAK_AKHIR==''){
			$wherethnpajak = "";

		}

		else{
			$wherethnpajak = "AND
			".$NamaTBL.".TBLPENDATAAN_THNPAJAK BETWEEN ".$TBLPENDATAAN_THNPAJAK." AND ".$TBLPENDATAAN_THNPAJAK_AKHIR." ";
		};


		$sql="SELECT
		ROWNUM AS unik_id,
		".$NamaTBL.".TBLPENDATAAN_THNPAJAK,
		".$NamaTBL.".TBLPENDATAAN_BLNPAJAK,
		".$NamaTBL.".TBLPENDATAAN_TGLPAJAK,
		".$NamaTBL.".TBLDAFTAR_JNSPENDAPATAN,
		".$NamaTBL.".TBLDAFTAR_GOLONGAN,
		".$NamaTBL.".TBLDAFTAR_NOPOK,
		".$NamaTBL.".TBLKECAMATAN_ID,
		".$NamaTBL.".TBLKELURAHAN_ID,
		/*".$NamaTBL.".".$NamaTBL."_PERSENRINGAN,*/
		".$NamaTBL.".".$NamaTBL."_PAJAK,
		".$NamaTBL.".".$NamaTBL."_PAJAKPERIKSA,
		/*".$NamaTBL.".HRSPER,
		".$NamaTBL.".BLSPER,
		".$NamaTBL.".THSPER,
		".$NamaTBL.".NOSPER,
		".$NamaTBL.".".$NamaTBL."_RUPIAHPERIKSA,*/
		".$NamaTBL.".".$NamaTBL."_THNKURANGBAYAR,
		".$NamaTBL.".".$NamaTBL."_BLNKURANGBAYAR,
		".$NamaTBL.".".$NamaTBL."_TGLKURANGBAYAR,
		".$NamaTBL.".".$NamaTBL."_REGKURANGBAYAR,
		".$NamaTBL.".".$NamaTBL."_URUTKURANGBAYAR,
		".$NamaTBL.".".$NamaTBL."_KURANGBAYARKE,
		
		".$NamaTBL.".".$NamaTBL."_DENDAKRGBAYAR,
		".$NamaTBL.".".$NamaTBL."_BUNGAKRGBAYAR,
		".$NamaTBL.".".$NamaTBL."_".$ADKB. " AS " . $NamaTBL . "_NAKB,
		".$NamaTBL.".".$NamaTBL."_RUPIAHKRGBAYAR,
		".$NamaTBL.".".$NamaTBL."_THNBTSKRGBAYAR,
		".$NamaTBL.".".$NamaTBL."_BLNBTSKRGBAYAR,
		".$NamaTBL.".".$NamaTBL."_TGLBTSKRGBAYAR,
		".$NamaTBL.".".$NamaTBL."_REGSETOR,
		".$NamaTBL.".".$NamaTBL."_SETORKE,
		".$NamaTBL.".".$NamaTBL."_RUPIAHSETOR,
		".$NamaTBL.".".$NamaTBL."_TIPESETOR,
		".$NamaTBL.".".$NamaTBL."_ISLUNAS,
		".$NamaTBL.".".$NamaTBL."_THNENTRISETOR,
		".$NamaTBL.".".$NamaTBL."_BLNENTRISETOR,
		".$NamaTBL.".".$NamaTBL."_TGLENTRISETOR,
		".$NamaTBL.".".$NamaTBL."_THNSURATANGSUR,
		".$NamaTBL.".".$NamaTBL."_BLNSURATANGSUR,
		".$NamaTBL.".".$NamaTBL."_TGLSURATANGSUR,
		".$NamaTBL.".".$NamaTBL."_REGSURATANGSUR,
		".$NamaTBL.".".$NamaTBL."_BLNKBAWAL,
		".$NamaTBL.".".$NamaTBL."_BLNKBAKHIR,
		TBLANGSURAN_PAJAKKE,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLSETOR.TBLSETOR_NOMORSSPD AS NOSSP2,
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		FROM
		".$NamaTBL."
		INNER JOIN TBLDAFTAR ON ".$NamaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		LEFT JOIN TBLSETOR ON ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
		AND ".$NamaTBL.".TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK
		AND NVL (
			".$NamaTBL.".TBLPENDATAAN_TGLPAJAK,
			0
		) = NVL (
			TBLSETOR.TBLPENDATAAN_TGLPAJAK,
			0
		)
		AND ".$NamaTBL.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
		AND TBLSETOR.TBLSETOR_JNSKETETAPAN = 'K'
		AND TBLSETOR.TBLSETOR_REKPAJAK = '1'
		LEFT JOIN TBLANGSURAN ON ".$NamaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
		AND NVL (
			".$NamaTBL.".TBLPENDATAAN_THNPAJAK,
			0
		) = NVL (
			TBLANGSURAN.TBLPENDATAAN_THNPAJAK,
			0
		)
		AND NVL (
			".$NamaTBL.".TBLPENDATAAN_BLNPAJAK,
			0
		) = NVL (
			TBLANGSURAN.TBLPENDATAAN_BLNPAJAK,
			0
		)
		AND NVL (
			".$NamaTBL.".TBLPENDATAAN_TGLPAJAK,
			0
		) = NVL (
			TBLANGSURAN.TBLPENDATAAN_TGLPAJAK,
			0
		)
		AND NVL (
			TBLANGSURAN.TBLANGSURAN_REKPAJAK,
			0
		) = 1
		AND NVL(TBLANGSURAN.TBLANGSURAN_PAJAKKE, 0) = 1
		WHERE
		NVL (".$NamaTBL."_REGKURANGBAYAR, 0) <> 0
		AND NVL (".$NamaTBL."_REGSURATANGSUR, 0) = 0
		AND (NVL (TBLSETOR_RUPIAHSETOR, 0)+NVL (TBLSETOR_BUNGAKETETAPAN, 0)) = 0
		AND TBLANGSURAN_PAJAKKE IS NULL
		
		".$wherenopok."
		".$wherethnpajak."
		ORDER BY
		".$NamaTBL.".".$NamaTBL."_THNKURANGBAYAR,
		".$NamaTBL.".".$NamaTBL."_BLNKURANGBAYAR,
		".$NamaTBL.".".$NamaTBL. "_TGLKURANGBAYAR,
		" . $NamaTBL . ".TBLPENDATAAN_THNPAJAK,
		" . $NamaTBL . ".TBLPENDATAAN_BLNPAJAK,
		".$NamaTBL.".TBLDAFTAR_NOPOK";

		$data['cari'] = $cari = Yii::app()->db->createCommand($sql)->queryAll();
		$data['NamaTBL'] = $NamaTBL;
		// echo "$sql";die();

		$this->renderPartial('cari', array('data'=>$data));
	}

	public function actionCetakword()
	{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'SURAT HIMBAUAN SKPDKB.docx';
		

		Yii::import('ext.DMOpenTBS',true);
		Yii::import('ext.LokalIndonesia');
		DMOpenTBS::init();
		$otbs = new clsTinyButStrong;

			// Useful for debugging purposes. Displays the errors
		$otbs->NoErr = 0;
			$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

			$template = $namatpl;
			$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

			$tglawal = $_REQUEST['tglawal'] ? $_REQUEST['tglawal'] : '';
			$tglakhir = $_REQUEST['tglakhir'] ? $_REQUEST['tglakhir'] : '';
			$tanggalcutoff = $_REQUEST['tanggalcutoff'] ? $_REQUEST['tanggalcutoff'] : '';
			// $tanggalsurat = $_REQUEST['tanggalsurat'] ? $_REQUEST['tanggalsurat'] : '';
			$waktuawal = $_REQUEST['waktuawal'] ? $_REQUEST['waktuawal'] : '';
			$waktuakhir = $_REQUEST['waktuakhir'] ? $_REQUEST['waktuakhir'] : '';
			$tempat_undangan = $_REQUEST['tempat_undangan'] ? $_REQUEST['tempat_undangan'] : '';
			$no_surat = $_REQUEST['no_surat'] ? $_REQUEST['no_surat'] : '';
			$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
			$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';
			$TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
			$TBLPENDATAAN_THNPAJAK_AKHIR = substr($_REQUEST['TBLPENDATAAN_THNPAJAK_AKHIR'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK_AKHIR'], -2) : '';

			$KODEREK = $_REQUEST['TBLREKENING_KODE'];
			if($KODEREK=='4.1.1.1.0'){
				$NamaTBL = 'TBLDAFTHOTEL';
				$ADKB = 'KENAIKANKRGBAYAR';
				$NOANG = 'REGSURATANGSUR';
				$JenisPajak = 'PAJAK HOTEL';
			}
			elseif($KODEREK=='4.1.1.2.0'){
				$NamaTBL = 'TBLDAFTRMAKAN';
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$JenisPajak = 'PAJAK RESTORAN';
			}
			elseif($KODEREK=='4.1.1.3.0'){
				$NamaTBL = 'TBLDAFTHIBURAN';
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$JenisPajak = 'PAJAK HIBURAN';
			}
			elseif($KODEREK=='4.1.1.7.0'){
				$NamaTBL = 'TBLDAFTPARKIR';	
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$JenisPajak = 'PAJAK PARKIR';
			}
			elseif($KODEREK=='4.1.1.8.0'){
				$NamaTBL = 'TBLDAFTTANAH';
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$JenisPajak = 'PAJAK AIR BAWAH TANAH';
			}
			elseif($KODEREK=='4.1.1.9.0'){
				$NamaTBL = 'TBLDAFTBURUNG';
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$JenisPajak = 'PAJAK SARANG BURUNG WALET';
			}
			elseif($KODEREK=='4.1.1.11.0'){
				$NamaTBL = 'TBLDAFTBPHTB';
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$JenisPajak = 'PAJAK BPHTB';
			}

			$data['filter'] = isset($_REQUEST['data']) ? $_REQUEST['data'] : '';

			if (!empty($data['filter'])) {
				$data['filter'] = explode(',', $data['filter']);
			} else {
				echo "<h3>Data yg dikirim tidak benar</h3>";
				Yii::app()->end();
			}		

			$flag = '';
			$query = '';

			foreach ($data['filter'] as $kodefikasi) {
				$kodefikasi = explode('-', $kodefikasi);
				if (is_array($kodefikasi)) {
					if (!isset($kodefikasi[0])) {
						echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak himbauan SKPDKB</h3>";
						Yii::app()->end();
					}
					$nopok = $kodefikasi[0];
					$thpajak = $kodefikasi[1];
					$blpajak = $kodefikasi[2];

					$query .= 
					$flag . 
					"
					SELECT
					".$NamaTBL.".TBLPENDATAAN_THNPAJAK,
					".$NamaTBL.".TBLPENDATAAN_BLNPAJAK,
					".$NamaTBL.".TBLPENDATAAN_TGLPAJAK,
					".$NamaTBL.".TBLDAFTAR_JNSPENDAPATAN,
					".$NamaTBL.".TBLDAFTAR_GOLONGAN,
					".$NamaTBL. ".TBLDAFTAR_NOPOK,
					TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA TBLKECAMATAN_ID,
					TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA TBLKELURAHAN_ID,
					".$NamaTBL.".".$NamaTBL."_PAJAK,
					".$NamaTBL.".".$NamaTBL."_PAJAKPERIKSA,
					".$NamaTBL.".".$NamaTBL."_THNKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_BLNKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_TGLKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_REGKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_URUTKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_KURANGBAYARKE,
					".$NamaTBL.".".$NamaTBL."_DENDAKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_BUNGAKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_".$ADKB. " AS " . $NamaTBL . "_NAKB,
					".$NamaTBL.".".$NamaTBL."_RUPIAHKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_THNBTSKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_BLNBTSKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_TGLBTSKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_REGSETOR,
					".$NamaTBL.".".$NamaTBL."_SETORKE,
					".$NamaTBL.".".$NamaTBL."_RUPIAHSETOR,
					".$NamaTBL.".".$NamaTBL."_TIPESETOR,
					".$NamaTBL.".".$NamaTBL."_ISLUNAS,
					".$NamaTBL.".".$NamaTBL."_THNENTRISETOR,
					".$NamaTBL.".".$NamaTBL."_BLNENTRISETOR,
					".$NamaTBL.".".$NamaTBL."_TGLENTRISETOR,
					".$NamaTBL.".".$NamaTBL."_THNSURATANGSUR,
					".$NamaTBL.".".$NamaTBL."_BLNSURATANGSUR,
					".$NamaTBL.".".$NamaTBL."_TGLSURATANGSUR,
					".$NamaTBL.".".$NamaTBL."_REGSURATANGSUR,
					".$NamaTBL.".".$NamaTBL."_BLNKBAWAL,
					".$NamaTBL.".".$NamaTBL."_BLNKBAKHIR,
					TRIM(TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA) TBLDAFTAR_BADANUSAHANAMA,
					TRIM(TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT) TBLDAFTAR_BADANUSAHAALAMAT,
					".$NamaTBL.".".$NamaTBL. "_REKAYAT AS AYAT,
					( SELECT TRIM(REFKECAMATAN_NAMA) FROM REFKECAMATAN WHERE REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA) REFKECAMATAN_NAMA,
					(SELECT TRIM(REFKELURAHAN_NAMA) FROM REFKELURAHAN WHERE REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA) REFKELURAHAN_NAMA,
					NVL(TBLDAFTAR_BADANUSAHATELP,0) TBLDAFTAR_BADANUSAHATELP
					FROM
					".$NamaTBL."
					INNER JOIN TBLDAFTAR ON ".$NamaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
					
					WHERE
					".$NamaTBL.".TBLDAFTAR_NOPOK = ".$nopok."
					AND ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = ".$thpajak. "
					AND " . $NamaTBL . ".TBLPENDATAAN_BLNPAJAK = " . $blpajak . "

					";
					$flag = '
					UNION
					';
				}
			}

			$data['cetak'] = Yii::app()->db->createCommand($query)->queryAll();



			$sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 1";

			$data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();

			$data['NamaTBL'] = $NamaTBL;

			$dt = array();
			$rows = array();
			$tanggalsurat = LokalIndonesia::TanggalUmum($_REQUEST['tanggalsurat']);

			$GLOBALS['datenow'] = $tanggalsurat;
			$GLOBALS['nosurat'] = $_REQUEST['no_surat'] ;
			$GLOBALS['tempat_undangan'] = $_REQUEST['tempat_undangan'] ;
			$GLOBALS['tglundangan1'] = LokalIndonesia::TanggalUmum($_REQUEST['tglawal']);
			$GLOBALS['tglundangan2'] = LokalIndonesia::TanggalUmum($_REQUEST['tglakhir']);
			$GLOBALS['waktuawal'] = $_REQUEST['waktuawal'];
			$GLOBALS['waktuakhir'] = $_REQUEST['waktuakhir'];
			$GLOBALS['jabatan'] = $data['jab1']['TBLPEJABAT_URAIAN'];
			$GLOBALS['nama'] = $data['jab1']['TBLPEJABAT_NAMA'];
			$GLOBALS['nip'] = $data['jab1']['TBLPEJABAT_NIP'];

			$total = array('total'=>0);

			foreach ($data['cetak'] as $kolom) :


				$total1 = '';
				$badannama = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
				$badanalamat = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
				$kecbu = !empty($kolom['TBLKECAMATAN_ID']) ? ', '.$kolom['REFKECAMATAN_NAMA'] : '';
				$kelbu = !empty($kolom['TBLKELURAHAN_ID']) ? ', '.$kolom['REFKELURAHAN_NAMA'] : '';
				$telp = $kolom['TBLDAFTAR_BADANUSAHATELP']!='0' ? ', '.$kolom['TBLDAFTAR_BADANUSAHATELP'] : '';
				$NPWPD = $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$kolom['TBLKECAMATAN_ID'])) . '.' . (sprintf('%02d',$kolom['TBLKELURAHAN_ID']));
				$TGLKB = $kolom[$data['NamaTBL'].'_TGLKURANGBAYAR'] . '-' . ($kolom[$data['NamaTBL'].'_BLNKURANGBAYAR']) . '-' . ($kolom[$data['NamaTBL'].'_THNKURANGBAYAR']);
				$AWAL =  LokalIndonesia::getBulan($kolom[$data['NamaTBL'].'_BLNKBAWAL']);
				$AKHIR =  LokalIndonesia::getBulan($kolom[$data['NamaTBL'].'_BLNKBAKHIR']);
				$BATAS = $kolom[$data['NamaTBL'].'_TGLBTSKRGBAYAR'] . '-' . LokalIndonesia::getBulan($kolom[$data['NamaTBL'].'_BLNBTSKRGBAYAR']) . '-' . ($kolom[$data['NamaTBL'].'_THNBTSKRGBAYAR'] +2000); 

				$dt['jenis'] = ''.$JenisPajak.'';
				$dt['no'] = null;
				$dt['namabadan'] = $badannama;
				$dt['alamatbadan'] = $badanalamat.$kecbu.$kelbu.$telp;
				$dt['nopok'] = $NPWPD;
				$dt['thnpajak'] = trim($kolom['TBLPENDATAAN_THNPAJAK']) +2000;
				$dt['nokb'] = trim($kolom[$data['NamaTBL'].'_REGKURANGBAYAR']);
				$dt['tglkb'] = $TGLKB;
				$dt['blnkb'] = empty($kolom[$data['NamaTBL'] . '_BLNKBAKHIR']) ?
					LokalIndonesia::getBulan($kolom['TBLPENDATAAN_BLNPAJAK']) : 
					$AWAL.' s/d '.$AKHIR;
				$dt['bataskb'] = $BATAS;
				$dt['tunggakan'] = LokalIndonesia::ribuan($kolom[$data['NamaTBL'].'_RUPIAHKRGBAYAR']);
				$total1 += trim($kolom[$data['NamaTBL'].'_RUPIAHKRGBAYAR']);
				$dt['total'] = LokalIndonesia::ribuan($total1);
				$dt['terbilang'] = LokalIndonesia::terbilang($total1);
				array_push($rows, $dt);

			endforeach;
			$header=array();
			$header['total'] = LokalIndonesia::ribuan($total['total']);
			$header['terbilang'] = LokalIndonesia::terbilang($total['total']);

		// echo CJSON::encode($rows);
		// Yii::app()->end();


			$otbs->MergeBlock('dt', $rows); 
			$otbs->MergeField('header', $header);
			// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template
			$namafileDL = "Surat Imbauan SKPDKB {$JenisPajak} {$tanggalsurat}.docx";
			$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
	 	// echo "string";Yii::app()->end();
			Yii::app()->end();


	}

	public function actionCetakwordall()
	{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'SURAT HIMBAUAN SKPDKB.docx';


		Yii::import('ext.DMOpenTBS', true);
		Yii::import('ext.LokalIndonesia');
		DMOpenTBS::init();
		$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
		$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

		
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
		$TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';

		$KODEREK = $_REQUEST['TBLREKENING_KODE'];
		if ($KODEREK == '4.1.1.1.0') {
			$NamaTBL = 'TBLDAFTHOTEL';
			$ADKB = 'KENAIKANKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$JenisPajak = 'PAJAK HOTEL';
		} elseif ($KODEREK == '4.1.1.2.0') {
			$NamaTBL = 'TBLDAFTRMAKAN';
			$ADKB = 'NAKB';
			$NOANG = 'REGSURATANGSUR';
			$JenisPajak = 'PAJAK RESTORAN';
		} elseif ($KODEREK == '4.1.1.3.0') {
			$NamaTBL = 'TBLDAFTHIBURAN';
			$ADKB = 'NAKB';
			$NOANG = 'REGSURATANGSUR';
			$JenisPajak = 'PAJAK HIBURAN';
		} elseif ($KODEREK == '4.1.1.7.0') {
			$NamaTBL = 'TBLDAFTPARKIR';
			$ADKB = 'NAKB';
			$NOANG = 'REGSURATANGSUR';
			$JenisPajak = 'PAJAK PARKIR';
		} elseif ($KODEREK == '4.1.1.8.0') {
			$NamaTBL = 'TBLDAFTTANAH';
			$ADKB = 'NAKB';
			$NOANG = 'REGSURATANGSUR';
			$JenisPajak = 'PAJAK AIR BAWAH TANAH';
		} elseif ($KODEREK == '4.1.1.9.0') {
			$NamaTBL = 'TBLDAFTBURUNG';
			$ADKB = 'NAKB';
			$NOANG = 'REGSURATANGSUR';
			$JenisPajak = 'PAJAK SARANG BURUNG WALET';
		} elseif ($KODEREK == '4.1.1.11.0') {
			$NamaTBL = 'TBLDAFTBPHTB';
			$ADKB = 'NAKB';
			$NOANG = 'REGSURATANGSUR';
			$JenisPajak = 'PAJAK BPHTB';
		}

		$data['filter'] = isset($_REQUEST['data']) ? $_REQUEST['data'] : '';

		if (!empty($data['filter'])) {
			$data['filter'] = explode(',', $data['filter']);
		} else {
			echo "<h3>Data yg dikirim tidak benar</h3>";
			Yii::app()->end();
		}

		if ($TBLDAFTAR_NOPOK == '') {
			$wherenopok = "";
		} else {
			$wherenopok = "AND
			" . $NamaTBL . ".TBLDAFTAR_NOPOK = " . $TBLDAFTAR_NOPOK . "";
		};

		if ($TBLPENDATAAN_THNPAJAK == '') {
			$wherethnpajak = "";
		} else {
			$wherethnpajak = "AND
			" . $NamaTBL . ".TBLPENDATAAN_THNPAJAK = " . $TBLPENDATAAN_THNPAJAK . " ";
		};


		$sql = "SELECT
		ROWNUM AS unik_id,
		" . $NamaTBL . ".TBLPENDATAAN_THNPAJAK,
		" . $NamaTBL . ".TBLPENDATAAN_BLNPAJAK,
		" . $NamaTBL . ".TBLPENDATAAN_TGLPAJAK,
		" . $NamaTBL . ".TBLDAFTAR_JNSPENDAPATAN,
		" . $NamaTBL . ".TBLDAFTAR_GOLONGAN,
		" . $NamaTBL . ".TBLDAFTAR_NOPOK,
		" . $NamaTBL . ".TBLKECAMATAN_ID,
		" . $NamaTBL . ".TBLKELURAHAN_ID,
		/*" . $NamaTBL . "." . $NamaTBL . "_PERSENRINGAN,*/
		" . $NamaTBL . "." . $NamaTBL . "_PAJAK,
		" . $NamaTBL . "." . $NamaTBL . "_PAJAKPERIKSA,
		/*" . $NamaTBL . ".HRSPER,
		" . $NamaTBL . ".BLSPER,
		" . $NamaTBL . ".THSPER,
		" . $NamaTBL . ".NOSPER,
		" . $NamaTBL . "." . $NamaTBL . "_RUPIAHPERIKSA,*/
		" . $NamaTBL . "." . $NamaTBL . "_THNKURANGBAYAR,
		" . $NamaTBL . "." . $NamaTBL . "_BLNKURANGBAYAR,
		" . $NamaTBL . "." . $NamaTBL . "_TGLKURANGBAYAR,
		" . $NamaTBL . "." . $NamaTBL . "_REGKURANGBAYAR,
		" . $NamaTBL . "." . $NamaTBL . "_URUTKURANGBAYAR,
		" . $NamaTBL . "." . $NamaTBL . "_KURANGBAYARKE,
		
		" . $NamaTBL . "." . $NamaTBL . "_DENDAKRGBAYAR,
		" . $NamaTBL . "." . $NamaTBL . "_BUNGAKRGBAYAR,
		" . $NamaTBL . "." . $NamaTBL . "_" . $ADKB . " AS " . $NamaTBL . "_NAKB,
		" . $NamaTBL . "." . $NamaTBL . "_RUPIAHKRGBAYAR,
		" . $NamaTBL . "." . $NamaTBL . "_THNBTSKRGBAYAR,
		" . $NamaTBL . "." . $NamaTBL . "_BLNBTSKRGBAYAR,
		" . $NamaTBL . "." . $NamaTBL . "_TGLBTSKRGBAYAR,
		" . $NamaTBL . "." . $NamaTBL . "_REGSETOR,
		" . $NamaTBL . "." . $NamaTBL . "_SETORKE,
		" . $NamaTBL . "." . $NamaTBL . "_RUPIAHSETOR,
		" . $NamaTBL . "." . $NamaTBL . "_TIPESETOR,
		" . $NamaTBL . "." . $NamaTBL . "_ISLUNAS,
		" . $NamaTBL . "." . $NamaTBL . "_THNENTRISETOR,
		" . $NamaTBL . "." . $NamaTBL . "_BLNENTRISETOR,
		" . $NamaTBL . "." . $NamaTBL . "_TGLENTRISETOR,
		" . $NamaTBL . "." . $NamaTBL . "_THNSURATANGSUR,
		" . $NamaTBL . "." . $NamaTBL . "_BLNSURATANGSUR,
		" . $NamaTBL . "." . $NamaTBL . "_TGLSURATANGSUR,
		" . $NamaTBL . "." . $NamaTBL . "_REGSURATANGSUR,
		" . $NamaTBL . "." . $NamaTBL . "_BLNKBAWAL,
		" . $NamaTBL . "." . $NamaTBL . "_BLNKBAKHIR,
		TBLANGSURAN_PAJAKKE,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLSETOR.TBLSETOR_NOMORSSPD AS NOSSP2,
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		FROM
		" . $NamaTBL . "
		INNER JOIN TBLDAFTAR ON " . $NamaTBL . ".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		LEFT JOIN TBLSETOR ON " . $NamaTBL . ".TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
		AND " . $NamaTBL . ".TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK
		AND NVL (
			" . $NamaTBL . ".TBLPENDATAAN_TGLPAJAK,
			0
		) = NVL (
			TBLSETOR.TBLPENDATAAN_TGLPAJAK,
			0
		)
		AND " . $NamaTBL . ".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
		AND TBLSETOR.TBLSETOR_JNSKETETAPAN = 'K'
		AND TBLSETOR.TBLSETOR_REKPAJAK = '1'
		LEFT JOIN TBLANGSURAN ON " . $NamaTBL . ".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
		AND NVL (
			" . $NamaTBL . ".TBLPENDATAAN_THNPAJAK,
			0
		) = NVL (
			TBLANGSURAN.TBLPENDATAAN_THNPAJAK,
			0
		)
		AND NVL (
			" . $NamaTBL . ".TBLPENDATAAN_BLNPAJAK,
			0
		) = NVL (
			TBLANGSURAN.TBLPENDATAAN_BLNPAJAK,
			0
		)
		AND NVL (
			" . $NamaTBL . ".TBLPENDATAAN_TGLPAJAK,
			0
		) = NVL (
			TBLANGSURAN.TBLPENDATAAN_TGLPAJAK,
			0
		)
		AND NVL (
			TBLANGSURAN.TBLANGSURAN_REKPAJAK,
			0
		) = 1
		AND NVL(TBLANGSURAN.TBLANGSURAN_PAJAKKE, 0) = 1
		WHERE
		NVL (" . $NamaTBL . "_REGKURANGBAYAR, 0) <> 0
		AND NVL (" . $NamaTBL . "_REGSURATANGSUR, 0) = 0
		AND (NVL (TBLSETOR_RUPIAHSETOR, 0)+NVL (TBLSETOR_BUNGAKETETAPAN, 0)) = 0
		AND TBLANGSURAN_PAJAKKE IS NULL
		
		" . $wherenopok . "
		" . $wherethnpajak . "
		ORDER BY
		" . $NamaTBL . "." . $NamaTBL . "_THNKURANGBAYAR,
		" . $NamaTBL . "." . $NamaTBL . "_BLNKURANGBAYAR,
		" . $NamaTBL . "." . $NamaTBL . "_TGLKURANGBAYAR,
		" . $NamaTBL . ".TBLPENDATAAN_THNPAJAK,
		" . $NamaTBL . ".TBLPENDATAAN_BLNPAJAK,
		" . $NamaTBL . ".TBLDAFTAR_NOPOK";

		$data['cetak'] = Yii::app()->db->createCommand($sql)->queryAll();



		$sql1 = "SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 1";

		$data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();

		$data['NamaTBL'] = $NamaTBL;

		$dt = array();
		$rows = array();
		$tanggalsurat = LokalIndonesia::TanggalUmum($_REQUEST['tanggalsurat']);

		$GLOBALS['datenow'] = $tanggalsurat;
		$GLOBALS['nosurat'] = $_REQUEST['no_surat'];
		$GLOBALS['tempat_undangan'] = $_REQUEST['tempat_undangan'];
		$GLOBALS['tglundangan1'] = LokalIndonesia::TanggalUmum($_REQUEST['tglawal']);
		$GLOBALS['tglundangan2'] = LokalIndonesia::TanggalUmum($_REQUEST['tglakhir']);
		$GLOBALS['waktuawal'] = $_REQUEST['waktuawal'];
		$GLOBALS['waktuakhir'] = $_REQUEST['waktuakhir'];
		$GLOBALS['jabatan'] = $data['jab1']['TBLPEJABAT_URAIAN'];
		$GLOBALS['nama'] = $data['jab1']['TBLPEJABAT_NAMA'];
		$GLOBALS['nip'] = $data['jab1']['TBLPEJABAT_NIP'];

		$total = array('total' => 0);

		foreach ($data['cetak'] as $kolom) :


			$total1 = '';
			$badannama = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
			$badanalamat = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
			$kecbu = !empty($kolom['TBLKECAMATAN_ID']) ? ', ' . $kolom['REFKECAMATAN_NAMA'] : '';
			$kelbu = !empty($kolom['TBLKELURAHAN_ID']) ? ', ' . $kolom['REFKELURAHAN_NAMA'] : '';
			$telp = $kolom['TBLDAFTAR_BADANUSAHATELP'] != '0' ? ', ' . $kolom['TBLDAFTAR_BADANUSAHATELP'] : '';
			$NPWPD = $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d', $kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d', $kolom['TBLKECAMATAN_ID'])) . '.' . (sprintf('%02d', $kolom['TBLKELURAHAN_ID']));
			$TGLKB = $kolom[$data['NamaTBL'] . '_TGLKURANGBAYAR'] . '-' . ($kolom[$data['NamaTBL'] . '_BLNKURANGBAYAR']) . '-' . ($kolom[$data['NamaTBL'] . '_THNKURANGBAYAR']);
			$AWAL =  LokalIndonesia::getBulan($kolom[$data['NamaTBL'] . '_BLNKBAWAL']);
			$AKHIR =  LokalIndonesia::getBulan($kolom[$data['NamaTBL'] . '_BLNKBAKHIR']);
			$BATAS = $kolom[$data['NamaTBL'] . '_TGLBTSKRGBAYAR'] . '-' . LokalIndonesia::getBulan($kolom[$data['NamaTBL'] . '_BLNBTSKRGBAYAR']) . '-' . ($kolom[$data['NamaTBL'] . '_THNBTSKRGBAYAR'] + 2000);

			$dt['jenis'] = '' . $JenisPajak . '';
			$dt['no'] = null;
			$dt['namabadan'] = $badannama;
			$dt['alamatbadan'] = $badanalamat . $kecbu . $kelbu . $telp;
			$dt['nopok'] = $NPWPD;
			$dt['thnpajak'] = trim($kolom['TBLPENDATAAN_THNPAJAK']) + 2000;
			$dt['nokb'] = trim($kolom[$data['NamaTBL'] . '_REGKURANGBAYAR']);
			$dt['tglkb'] = $TGLKB;
			$dt['blnkb'] = empty($kolom[$data['NamaTBL'] . '_BLNKBAKHIR']) ?
				LokalIndonesia::getBulan($kolom['TBLPENDATAAN_BLNPAJAK']) :
				$AWAL . ' s/d ' . $AKHIR;
			$dt['bataskb'] = $BATAS;
			$dt['tunggakan'] = LokalIndonesia::ribuan($kolom[$data['NamaTBL'] . '_RUPIAHKRGBAYAR']);
			$total1 += trim($kolom[$data['NamaTBL'] . '_RUPIAHKRGBAYAR']);
			$dt['total'] = LokalIndonesia::ribuan($total1);
			$dt['terbilang'] = LokalIndonesia::terbilang($total1);
			array_push($rows, $dt);

		endforeach;
		$header = array();
		$header['total'] = LokalIndonesia::ribuan($total['total']);
		$header['terbilang'] = LokalIndonesia::terbilang($total['total']);

		// echo CJSON::encode($rows);
		// Yii::app()->end();


		$otbs->MergeBlock('dt', $rows);
		$otbs->MergeField('header', $header);
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template
		$namafileDL = "Surat Imbauan SKPDKB {$JenisPajak} {$tanggalsurat}.docx";
		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		// echo "string";Yii::app()->end();
		Yii::app()->end();
	}

		public function actionCetakDaftar()
		{
			$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
			$namatpl = $path_tpl . 'DAFTAR SURAT HIMBAUAN SKPDKB.docx';
			$namafileDL = "Daftar Himbauan SKPDKB.docx";

			Yii::import('ext.DMOpenTBS',true);
			Yii::import('ext.LokalIndonesia');
			DMOpenTBS::init();
			$otbs = new clsTinyButStrong;

			// Useful for debugging purposes. Displays the errors
			$otbs->NoErr = 0;
			$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

			$template = $namatpl;
			$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

			$tglawal = $_REQUEST['tglawal'] ? $_REQUEST['tglawal'] : '';
			$tglakhir = $_REQUEST['tglakhir'] ? $_REQUEST['tglakhir'] : '';
			$tanggalcutoff = $_REQUEST['tanggalcutoff'] ? $_REQUEST['tanggalcutoff'] : '';
			$tanggalsurat = $_REQUEST['tanggalsurat'] ? $_REQUEST['tanggalsurat'] : '';
			$waktu = $_REQUEST['waktu'] ? $_REQUEST['waktu'] : '';
			$no_surat = $_REQUEST['no_surat'] ? $_REQUEST['no_surat'] : '';
			$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
			$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';
			$TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';

			$KODEREK = $_REQUEST['TBLREKENING_KODE'];
			if($KODEREK=='4.1.1.1.0'){
				$NamaTBL = 'TBLDAFTHOTEL';
				$ADKB = 'KENAIKANKRGBAYAR';
				$NOANG = 'REGSURATANGSUR';
				$PAJAK = 'PAJAK HOTEL';
				// $petugas = 'NURWITANTO PRAWISDA';
				// $nip = 'NITB-2435';
				$jab_id = '18';
			}
			elseif($KODEREK=='4.1.1.2.0'){
				$NamaTBL = 'TBLDAFTRMAKAN';
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$PAJAK = 'PAJAK RESTORAN';
				// $petugas = 'YULI  PURWANTO, SE.';
				// $nip = '197407041994021005';
				$jab_id = '19';
			}
			elseif($KODEREK=='4.1.1.3.0'){
				$NamaTBL = 'TBLDAFTHIBURAN';
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$PAJAK = 'PAJAK HIBURAN';
				// $petugas = 'ELSI NURLITA IKAWATI, SE.';
				// $nip = '197104121992031003';
				$jab_id = '20';
			}
			elseif($KODEREK=='4.1.1.7.0'){
				$NamaTBL = 'TBLDAFTPARKIR';	
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$PAJAK = 'PAJAK PARKIR';
				// $petugas = 'A. YULIANTO ANDRI W., A.Md.';
				// $nip = 'NITB-2376';
				$jab_id = '21';
			}
			elseif($KODEREK=='4.1.1.8.0'){
				$NamaTBL = 'TBLDAFTTANAH';
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$PAJAK = 'PAJAK AIR TANAH';
				// $petugas = 'EKO HERIYANTO, S.Pd.';
				// $nip = '196805081992031011';
				$jab_id = '22';
			}
			elseif($KODEREK=='4.1.1.9.0'){
				$NamaTBL = 'TBLDAFTBURUNG';
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$PAJAK = 'PAJAK SARANG BURUNG WALET';
				// $petugas = 'EKO HERIYANTO, S.Pd.';
				// $nip = '196805081992031011';
			}
			elseif($KODEREK=='4.1.1.11.0'){
				$NamaTBL = 'TBLDAFTBPHTB';
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$PAJAK = 'PAJAK BPHTB';
				// $petugas = '';
				// $nip = '';
			}

			$data['filter'] = isset($_REQUEST['data']) ? $_REQUEST['data'] : '';

			if (!empty($data['filter'])) {
				$data['filter'] = explode(',', $data['filter']);
			} else {
				echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak Teguran Pajak Reklame</h3>";
				Yii::app()->end();
			}		

			$flag = '';
			$query = '';

			foreach ($data['filter'] as $kodefikasi) {
				$kodefikasi = explode('-', $kodefikasi);
				if (is_array($kodefikasi)) {
					if (!isset($kodefikasi[0])) {
						echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPDKB</h3>";
						Yii::app()->end();
					}
					$nopok = $kodefikasi[0];
					$thpajak = $kodefikasi[1];
					$blpajak = $kodefikasi[2];



					$query .= 
					$flag . 
					"SELECT
					".$NamaTBL.".TBLPENDATAAN_THNPAJAK,
					".$NamaTBL.".TBLPENDATAAN_BLNPAJAK,
					".$NamaTBL.".TBLPENDATAAN_TGLPAJAK,
					".$NamaTBL.".TBLDAFTAR_JNSPENDAPATAN,
					".$NamaTBL.".TBLDAFTAR_GOLONGAN,
					".$NamaTBL.".TBLDAFTAR_NOPOK,
					".$NamaTBL.".TBLKECAMATAN_ID,
					".$NamaTBL.".TBLKELURAHAN_ID,
					".$NamaTBL.".".$NamaTBL."_PAJAK,
					".$NamaTBL.".".$NamaTBL."_PAJAKPERIKSA,
					".$NamaTBL.".".$NamaTBL."_THNKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_BLNKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_TGLKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_REGKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_URUTKURANGBAYAR,
					".$NamaTBL.".".$NamaTBL."_KURANGBAYARKE,
					".$NamaTBL.".".$NamaTBL."_DENDAKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_BUNGAKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_".$ADKB. " AS " . $NamaTBL . "_NAKB,
					".$NamaTBL.".".$NamaTBL."_RUPIAHKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_THNBTSKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_BLNBTSKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_TGLBTSKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_REGSETOR,
					".$NamaTBL.".".$NamaTBL."_SETORKE,
					".$NamaTBL.".".$NamaTBL."_RUPIAHSETOR,
					".$NamaTBL.".".$NamaTBL."_TIPESETOR,
					".$NamaTBL.".".$NamaTBL."_ISLUNAS,
					".$NamaTBL.".".$NamaTBL."_THNENTRISETOR,
					".$NamaTBL.".".$NamaTBL."_BLNENTRISETOR,
					".$NamaTBL.".".$NamaTBL."_TGLENTRISETOR,
					".$NamaTBL.".".$NamaTBL."_THNSURATANGSUR,
					".$NamaTBL.".".$NamaTBL."_BLNSURATANGSUR,
					".$NamaTBL.".".$NamaTBL."_TGLSURATANGSUR,
					".$NamaTBL.".".$NamaTBL."_REGSURATANGSUR,
					".$NamaTBL.".".$NamaTBL."_BLNKBAWAL,
					".$NamaTBL.".".$NamaTBL."_BLNKBAKHIR,
					TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
					TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
					FROM
					".$NamaTBL."
					INNER JOIN TBLDAFTAR ON ".$NamaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
					
					WHERE
					".$NamaTBL.".TBLDAFTAR_NOPOK = ".$nopok."
					AND ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = ".$thpajak. "
					AND " . $NamaTBL . ".TBLPENDATAAN_BLNPAJAK = " . $blpajak . "



					";
					$flag = '
					UNION
					';
				}
			}
			// echo "$query";die();	
			$data['cetak'] = Yii::app()->db->createCommand($query)->queryAll();
			$data['NamaTBL'] = $NamaTBL;
			
			$sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 1";
			$sql2="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 3";
			$sql3="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 8";	
			$sql4="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = ".$jab_id."";	

			$data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();
			$data['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();
			$data['jab3'] = Yii::app()->db->createCommand($sql3)->queryRow();
			$data['jab4'] = Yii::app()->db->createCommand($sql4)->queryRow();

			$utama = array();
			$row = array ();

			$no = 1;
			$tanggalsurat = date('d') . ' ' . LokalIndonesia::getBulan(date('m')) . ' ' . date('Y');
			$GLOBALS['datenow'] = $tanggalsurat;
			$GLOBALS['jnspajak'] = $PAJAK;
			$GLOBALS['jabatan1'] = $data['jab1']['TBLPEJABAT_URAIAN'];
			$GLOBALS['petugas1'] = $data['jab1']['TBLPEJABAT_NAMA'];
			$GLOBALS['nip1'] = $data['jab1']['TBLPEJABAT_NIP'];
			$GLOBALS['jabatan2'] = $data['jab2']['TBLPEJABAT_URAIAN'];
			$GLOBALS['petugas2'] = $data['jab2']['TBLPEJABAT_NAMA'];
			$GLOBALS['nip2'] = $data['jab2']['TBLPEJABAT_NIP'];
			$GLOBALS['jabatan3'] = $data['jab3']['TBLPEJABAT_URAIAN'];
			$GLOBALS['petugas3'] = $data['jab3']['TBLPEJABAT_NAMA'];
			$GLOBALS['nip3'] = $data['jab3']['TBLPEJABAT_NIP'];
			$GLOBALS['jabatan4'] = $data['jab4']['TBLPEJABAT_URAIAN'];
			$GLOBALS['petugas4'] = $data['jab4']['TBLPEJABAT_NAMA'];
			$GLOBALS['nip4'] = $data['jab4']['TBLPEJABAT_NIP'];
			$GLOBALS['nosurat'] = $_REQUEST['no_surat'];
			$totalpajak = array('totalpajak'=>0);
			foreach ($data['cetak'] as $kolom ) :
				$NPWPD =  $kolom['TBLDAFTAR_JNSPENDAPATAN'] . '.' . $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$kolom['TBLKECAMATAN_ID'])) . '.' . (sprintf('%02d',$kolom['TBLKELURAHAN_ID']));
				$MASAPJK1 = LokalIndonesia::getBulan($kolom[$data['NamaTBL'].'_BLNKBAWAL']) . ' ' . ($kolom['TBLPENDATAAN_THNPAJAK'] +2000); 
				$MASAPJK2 = LokalIndonesia::getBulan($kolom[$data['NamaTBL'].'_BLNKBAKHIR']) . ' ' . ($kolom['TBLPENDATAAN_THNPAJAK'] +2000); 

				$utama['no'] = $no++;
				$utama['bnama'] = trim($kolom['TBLDAFTAR_BADANUSAHANAMA']);
				$utama['bal'] = trim($kolom['TBLDAFTAR_BADANUSAHAALAMAT']);
				$utama['npwpd'] = $NPWPD;
				$utama['thkb'] = trim($kolom[$data['NamaTBL'].'_THNKURANGBAYAR'] + 2000);
			// $utama['masapjk'] = $MASAPJK1 . ' s/d ' . $MASAPJK2;
			// $$utama['masapjk'] = $MASAPJK1 . ' s/d ' . $MASAPJK2;
			$utama['masapjk'] = empty($kolom[$data['NamaTBL'] . '_BLNKBAKHIR']) ?
				LokalIndonesia::getBulan($kolom['TBLPENDATAAN_BLNPAJAK']).' '. ($kolom['TBLPENDATAAN_THNPAJAK'] + 2000) :
			$MASAPJK1 . ' s/d ' . $MASAPJK2;
				$utama['nokb'] = $kolom[$data['NamaTBL'].'_REGKURANGBAYAR'];
				$utama['tempo'] = $kolom[$data['NamaTBL'].'_TGLBTSKRGBAYAR']. '/' .$kolom[$data['NamaTBL'].'_BLNBTSKRGBAYAR'] . '/' . ($kolom[$data['NamaTBL'].'_THNBTSKRGBAYAR'] +2000); 
				$utama['periksa'] = LokalIndonesia::ribuan($kolom[$data['NamaTBL'].'_PAJAKPERIKSA']);
				$utama['bunga'] = LokalIndonesia::ribuan($kolom[$data['NamaTBL'].'_BUNGAKRGBAYAR']);
				$utama['denda'] = LokalIndonesia::ribuan($kolom[$data['NamaTBL'].'_NAKB']);
				$utama['rpkb'] = LokalIndonesia::ribuan($kolom[$data['NamaTBL'].'_RUPIAHKRGBAYAR']);

				$totalpajak['totalpajak'] += $kolom[$data['NamaTBL'].'_RUPIAHKRGBAYAR'];

				array_push($row, $utama);
			endforeach;
			$header=array();
			$header['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);

			$otbs->MergeBlock('utama', $row);
			$otbs->MergeField('header', $header);
				// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

			$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
	 		// echo "string";Yii::app()->end();
			Yii::app()->end();

		}

		public function actionSimpan() 
		{
			$tanggalcutoff = $_REQUEST['tanggalcutoff'] ? $_REQUEST['tanggalcutoff'] : '';
			$no_surat = $_REQUEST['no_surat'] ? $_REQUEST['no_surat'] : '';
			$tanggalsurat = $_REQUEST['tanggalsurat'] ? $_REQUEST['tanggalsurat'] : '';
			$KODEREK = $_REQUEST['TBLREKENING_KODE'];
			if ($KODEREK == '4.1.1.1.0') {
				$NamaTBL = 'TBLDAFTHOTEL';
				$ADKB = 'KENAIKANKRGBAYAR';
				$NOANG = 'REGSURATANGSUR';
				$JenisPajak = 'Pajak Hotel';
			} elseif ($KODEREK == '4.1.1.2.0') {
				$NamaTBL = 'TBLDAFTRMAKAN';
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$JenisPajak = 'Pajak Restoran';
			} elseif ($KODEREK == '4.1.1.3.0') {
				$NamaTBL = 'TBLDAFTHIBURAN';
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$JenisPajak = 'Pajak Hiburan';
			} elseif ($KODEREK == '4.1.1.7.0') {
				$NamaTBL = 'TBLDAFTPARKIR';
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$JenisPajak = 'Pajak Parkir';
			} elseif ($KODEREK == '4.1.1.8.0') {
				$NamaTBL = 'TBLDAFTTANAH';
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$JenisPajak = 'Pajak Air Bawah Tanah';
			} elseif ($KODEREK == '4.1.1.9.0') {
				$NamaTBL = 'TBLDAFTBURUNG';
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$JenisPajak = 'Pajak Sarang Burung Walet';
			} elseif ($KODEREK == '4.1.1.11.0') {
				$NamaTBL = 'TBLDAFTBPHTB';
				$ADKB = 'NAKB';
				$NOANG = 'REGSURATANGSUR';
				$JenisPajak = 'Pajak BPHTB';
			}

				$data['filter'] = isset($_REQUEST['data']) ? $_REQUEST['data'] : '';

				if (!empty($data['filter'])) {
					$data['filter'] = explode(',', $data['filter']);
				} else {
					echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak Teguran Pajak Reklame</h3>";
					Yii::app()->end();
				}

			$flag = '';
			$query = '';

			foreach ($data['filter'] as $kodefikasi) {
				$kodefikasi = explode('-', $kodefikasi);
				if (is_array($kodefikasi)) {
					if (!isset($kodefikasi[0])) {
						echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak himbauan SKPDKB</h3>";
						Yii::app()->end();
					}
					$nopok = $kodefikasi[0];
					$thpajak = $kodefikasi[1];
					$blpajak = $kodefikasi[2];

					$query .=
						$flag .
						"
						SELECT
						" . $NamaTBL . ".TBLPENDATAAN_THNPAJAK,
						" . $NamaTBL . ".TBLPENDATAAN_BLNPAJAK,
						" . $NamaTBL . ".TBLPENDATAAN_TGLPAJAK,
						" . $NamaTBL . ".TBLDAFTAR_JNSPENDAPATAN,
						" . $NamaTBL . ".TBLDAFTAR_GOLONGAN,
						" . $NamaTBL . ".TBLDAFTAR_NOPOK,
						" . $NamaTBL . ".TBLKECAMATAN_ID,
						" . $NamaTBL . ".TBLKELURAHAN_ID,
						" . $NamaTBL . "." . $NamaTBL . "_PAJAK,
						" . $NamaTBL . "." . $NamaTBL . "_PAJAKPERIKSA,
						" . $NamaTBL . "." . $NamaTBL . "_THNKURANGBAYAR,
						" . $NamaTBL . "." . $NamaTBL . "_BLNKURANGBAYAR,
						" . $NamaTBL . "." . $NamaTBL . "_TGLKURANGBAYAR,
						" . $NamaTBL . "." . $NamaTBL . "_REGKURANGBAYAR,
						" . $NamaTBL . "." . $NamaTBL . "_URUTKURANGBAYAR,
						" . $NamaTBL . "." . $NamaTBL . "_KURANGBAYARKE,
						" . $NamaTBL . "." . $NamaTBL . "_DENDAKRGBAYAR,
						" . $NamaTBL . "." . $NamaTBL . "_BUNGAKRGBAYAR,
						" . $NamaTBL . "." . $NamaTBL . "_" . $ADKB . " AS " . $NamaTBL . "_NAKB,
						" . $NamaTBL . "." . $NamaTBL . "_RUPIAHKRGBAYAR,
						" . $NamaTBL . "." . $NamaTBL . "_THNBTSKRGBAYAR,
						" . $NamaTBL . "." . $NamaTBL . "_BLNBTSKRGBAYAR,
						" . $NamaTBL . "." . $NamaTBL . "_TGLBTSKRGBAYAR,
						" . $NamaTBL . "." . $NamaTBL . "_REGSETOR,
						" . $NamaTBL . "." . $NamaTBL . "_SETORKE,
						" . $NamaTBL . "." . $NamaTBL . "_RUPIAHSETOR,
						" . $NamaTBL . "." . $NamaTBL . "_TIPESETOR,
						" . $NamaTBL . "." . $NamaTBL . "_ISLUNAS,
						" . $NamaTBL . "." . $NamaTBL . "_THNENTRISETOR,
						" . $NamaTBL . "." . $NamaTBL . "_BLNENTRISETOR,
						" . $NamaTBL . "." . $NamaTBL . "_TGLENTRISETOR,
						" . $NamaTBL . "." . $NamaTBL . "_THNSURATANGSUR,
						" . $NamaTBL . "." . $NamaTBL . "_BLNSURATANGSUR,
						" . $NamaTBL . "." . $NamaTBL . "_TGLSURATANGSUR,
						" . $NamaTBL . "." . $NamaTBL . "_REGSURATANGSUR,
						" . $NamaTBL . "." . $NamaTBL . "_BLNKBAWAL,
						" . $NamaTBL . "." . $NamaTBL . "_BLNKBAKHIR,
						TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
						TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
						" . $NamaTBL . "." . $NamaTBL . "_REKAYAT AS AYAT
						FROM
						" . $NamaTBL . "
						INNER JOIN TBLDAFTAR ON " . $NamaTBL . ".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
						
						WHERE
						" . $NamaTBL . ".TBLDAFTAR_NOPOK = " . $nopok . "
						AND " . $NamaTBL . ".TBLPENDATAAN_THNPAJAK = " . $thpajak . "
						AND " . $NamaTBL . ".TBLPENDATAAN_BLNPAJAK = " . $blpajak . "

						";
					$flag = '
						UNION
						';
				}
			}

			$data['cetak'] = Yii::app()->db->createCommand($query)->queryAll();
			$tblpenggunaid = Yii::app()->user->pengguna_id;

			foreach ($data['cetak'] as $kolom) :

				$tglteguran = date('Y-m-d H:i:s', strtotime($tanggalsurat));

				try {
					$himbauanid = $this->Cekexisthimbauan($kolom['TBLPENDATAAN_THNPAJAK'], $kolom['TBLPENDATAAN_BLNPAJAK'], $kolom['TBLDAFTAR_NOPOK'], 'SKPDKB', $tglteguran);
				if (empty($himbauanid)) {

					$inserthistori = "INSERT INTO TBLHIMBAUAN (THP, BLP, NOPOK, NOHIMBAUAN, TGLHIMBAUAN, NAMA_WP, ALAMAT, NPWPD, JENIS, STATUS_DATA, TBLPENGGUNA_ID) 
					VALUES (
					".$kolom['TBLPENDATAAN_THNPAJAK'].",
					".$kolom['TBLPENDATAAN_BLNPAJAK'].",
					".$kolom['TBLDAFTAR_NOPOK'].",
					".$no_surat.", 
					TO_DATE('". $tglteguran."', 'YYYY-MM-DD HH24:MI:SS'),
					'".$kolom['TBLDAFTAR_BADANUSAHANAMA']."',
					'".$kolom['TBLDAFTAR_BADANUSAHAALAMAT']."',
					'".$kolom['TBLDAFTAR_GOLONGAN'] . "." . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . "." . (sprintf('%02d',$kolom['TBLKECAMATAN_ID'])) . "." . (sprintf('%02d',$kolom['TBLKELURAHAN_ID']))."',
					".$kolom['AYAT'].",
					'SKPDKB',
					$tblpenggunaid
					)";
					$inserthistori = Yii::app()->db->createCommand($inserthistori);
					if ($inserthistori->execute()) {
						echo json_encode(array('status' => 'success'));
					}
				} else {
					echo json_encode(array('status' => 'exist'));
				}

				} catch (CDbException $e) {
						echo json_encode(array('status' => 'failed', 'message' => $e->getMessage()));
					Yii::app()->end();
				}

			endforeach;
		}

	public function Cekexisthimbauan($thp, $blp, $nopok, $skpdkb,$tgl)
	{
		$now = date('Y-m-d');
		$himbauanid = Yii::app()->db->createCommand("SELECT TBLHIMBAUAN_ID FROM TBLHIMBAUAN WHERE THP = {$thp} AND BLP = {$blp} AND NOPOK = {$nopok} AND STATUS_DATA = '{$skpdkb}' AND TGLHIMBAUAN = TO_DATE('{$tgl}', 'YYYY-MM-DD HH24:MI:SS')")->queryScalar();
		return $himbauanid;
	}
		

	}