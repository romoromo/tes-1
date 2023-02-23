<?php

class Kartudata_monitoringController extends Controller
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
			AND TBLREKENING_REKAYAT <> 8
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
		$tglawal = $_REQUEST['tglawal'] ? $_REQUEST['tglawal'] : '';
		$tglakhir = $_REQUEST['tglakhir'] ? $_REQUEST['tglakhir'] : '';
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';
		$TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';

		$KODEREK = $_REQUEST['TBLREKENING_KODE'];
		if($KODEREK=='4.1.1.1.0'){
			$NamaTBL = 'TBLMONITORING_HOTEL';
			// $ADKB = 'DENDAKRGBAYAR';
		}
		elseif($KODEREK=='4.1.1.2.0'){
			$NamaTBL = 'TBLMONITORING_DETAIL';
			// $ADKB = 'DENDAKRGBAYAR';
		}
		elseif($KODEREK=='4.1.1.3.0'){
			$NamaTBL = 'TBLMONITORING_HIBURAN';
			// $ADKB = 'DENDAKRGBAYAR';
		}


		if($TBLDAFTAR_NOPOK==''){
			$wherenopok = "";

		}else{
			$wherenopok = "AND TBLMONITORING_DETAIL.NOPOK = ".$TBLDAFTAR_NOPOK."";
		};

		if($TBLPENDATAAN_THNPAJAK==''){
			$wheretahun = "";

		}else{
			$wheretahun = "AND TBLMONITORING_DETAIL.THP = ".$TBLPENDATAAN_THNPAJAK."";
		};

		$sql="
		SELECT 
		TBLMONITORING_DETAIL.THP AS TBLPENDATAAN_THNPAJAK,
		TBLMONITORING_DETAIL.BLP AS TBLPENDATAAN_BLNPAJAK,
		TBLMONITORING_DETAIL.NOPOK AS TBLDAFTAR_NOPOK,
		TBLMONITORING_DETAIL.TGL_MONITORING,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		REFBADANUSAHA.REKENING_KODE
		FROM TBLMONITORING_DETAIL
		JOIN TBLDAFTAR ON TBLMONITORING_DETAIL.NOPOK=TBLDAFTAR.TBLDAFTAR_NOPOK
		JOIN REFBADANUSAHA ON REFBADANUSAHA.REFBADANUSAHA_ID = TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA
		WHERE (
		REFBADANUSAHA_REKPENDAPATAN || '.' || REFBADANUSAHA_REKPAD || '.' || REFBADANUSAHA_REKPJK || '.' || REFBADANUSAHA_REKAYAT || '.' || '0'
		) LIKE '".$KODEREK."%'
		".$wheretahun."
		AND TGL_MONITORING BETWEEN TO_DATE ('$tglawal', 'DD-MM-YYYY') AND TO_DATE('$tglakhir', 'DD-MM-YYYY')
		";

		// $sql="";

		$data['cari'] = $cari = Yii::app()->db->createCommand($sql)->queryAll();
		// $data['NamaTBL'] = $NamaTBL;
		// echo "$sql";die();

		$this->renderPartial('cari', array('data'=>$data));
	}

	public function actionCetakword()
	{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'cetak_sk_monitoring_hiburan.docx';
		$namafileDL = "Surat Monitoring.docx";

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
			
			$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
			$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';

			$KODEREK = $_REQUEST['TBLREKENING_KODE'];
			if($KODEREK=='4.1.1.1.0'){
				$NamaTBL = 'TBLMONITORING_HOTEL';
			}
			elseif($KODEREK=='4.1.1.2.0'){
				$NamaTBL = 'TBLMONITORING_DETAIL';
			}
			elseif($KODEREK=='4.1.1.3.0'){
				$NamaTBL = 'TBLMONITORING_HIBURAN';
			}
			// elseif($KODEREK=='4.1.1.7.0'){
			// 	$NamaTBL = 'TBLDAFTPARKIR';
			// }
			

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
						echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPDKB</h3>";
						Yii::app()->end();
					}
					$nopok = $kodefikasi[0];
					$thpajak = $kodefikasi[1];
					$blpajak = $kodefikasi[2];

					$query .= 
					$flag . 
					"
					SELECT
					-- TBLDAFTAR.TBLDAFTAR_JNSPENDAPATAN,
					TBLDAFTAR.TBLDAFTAR_GOLONGAN,
					TBLDAFTAR.TBLDAFTAR_NOPOK,
					(SELECT REFKECAMATAN_NAMA FROM REFKECAMATAN WHERE REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA) AS TBLKECAMATAN_IDBADANUSAHA,
					(SELECT REFKELURAHAN_NAMA FROM REFKELURAHAN WHERE REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA) AS TBLKELURAHAN_IDBADANUSAHA,
					TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
					TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
					TBLDAFTAR.TBLDAFTAR_BADANUSAHATELP,
					TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
					TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
					(SELECT REFKECAMATAN_NAMA FROM REFKECAMATAN WHERE REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDPEMILIK) AS TBLKECAMATAN_IDPEMILIK,
					(SELECT REFKELURAHAN_NAMA FROM REFKELURAHAN WHERE REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDPEMILIK) AS TBLKELURAHAN_IDPEMILIK,
					TBLDAFTAR.TBLDAFTAR_PEMILIKTELP,
					TBLDAFTAR.TBLDAFTAR_PEMILIKKOTA,
					TBLMONITORING_DETAIL.NOPOK AS TBLDAFTAR_NOPOK,
					TBLMONITORING_DETAIL.THP AS TBLPENDATAAN_THNPAJAK,
					TBLMONITORING_DETAIL.BLP AS TBLPENDATAAN_BLNPAJAK,
					TBLMONITORING_DETAIL.JENIS,
					TBLMONITORING_DETAIL.IS_TIKET,
					TBLMONITORING_DETAIL.IS_MEMBER,
					TBLMONITORING_DETAIL.TARIF_MEMBER,
					TBLMONITORING_DETAIL.JML_MEMBER,
					TBLMONITORING_DETAIL.CARA_PEMBAYARAN,
					TBLMONITORING_DETAIL.JAM_BUKA,
					TBLMONITORING_DETAIL.JAM_TUTUP,
					TBLMONITORING_DETAIL.JML_KONSUMEN_RAMAI,
					TBLMONITORING_DETAIL.JML_KONSUMEN_NORMAL,
					TBLMONITORING_DETAIL.JML_KONSUMEN_SEPI,
					TBLMONITORING_DETAIL.JML_KONSUMEN_RATA,
					TBLMONITORING_DETAIL.JML_PEGAWAI,
					TBLMONITORING_DETAIL.JML_OMZET,
					TBLDAFTAR.TBLDAFTAR_EMAIL,
					TBLMONITORING_HIBURAN.KLASIFIKASI_KMR,
					TBLMONITORING_HIBURAN.TARIF_KMR,
					TBLMONITORING_HIBURAN.KETERANGAN,
					TBLMONITORING_HIBURAN.JML_KMR
					FROM
					TBLMONITORING_DETAIL
					JOIN TBLDAFTAR ON TBLMONITORING_DETAIL.NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
					LEFT JOIN TBLMONITORING_HIBURAN ON TBLMONITORING_HIBURAN.THP=TBLMONITORING_DETAIL.THP
					AND TBLMONITORING_HIBURAN.BLP=TBLMONITORING_DETAIL.BLP
					AND TBLMONITORING_HIBURAN.NOPOK=TBLMONITORING_DETAIL.NOPOK
					WHERE
					TBLMONITORING_DETAIL.NOPOK = ".$nopok." AND
					TBLMONITORING_DETAIL.THP = ".$thpajak." AND
					TBLMONITORING_DETAIL.BLP = ".$blpajak."
					

					";
					$flag = '
					UNION
					';
				}
			}

			// $data['cetak'] = Yii::app()->db->createCommand($query)->queryAll();
			$datax['cetak'] = Yii::app()->db->createCommand($query)->queryAll();

			$sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 5";

			$datax['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();
			$sql2="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 3";

			$datax['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();

			// $data['NamaTBL'] = $NamaTBL;

			$utama = array();
			$rows = array();
			// $tanggalsurat = date('d') . ' ' . LokalIndonesia::getBulan(date('m')) . ' ' . date('Y');

			$GLOBALS['datenow'] = date('d') . ' ' . LokalIndonesia::getBulan(date('m')) . ' ' . date('Y');
			$GLOBALS['thnpajak'] = $thpajak;
			$GLOBALS['blnpajak'] = $blpajak;

			$GLOBALS['op_telp'] = '';
			$GLOBALS['op_kec'] = '';
			$GLOBALS['op_kel'] = '';
			$GLOBALS['wp_nama'] = '';
			$GLOBALS['wp_jabatan'] = '';
			$GLOBALS['wp_alamat'] = '';
			$GLOBALS['wp_telp'] = '';
			$GLOBALS['wp_kec'] = '';
			$GLOBALS['wp_kel'] = '';
			$GLOBALS['op_email'] = '';
			$GLOBALS['jenis'] = '';
			$GLOBALS['is_tiket'] = '';
			$GLOBALS['is_member'] = '';
			$GLOBALS['jml_member'] = '';
			$GLOBALS['tarif_member'] = '';
			$GLOBALS['cara_pembayaran'] = '';
			$GLOBALS['jam_buka'] = '';
			$GLOBALS['jam_tutup'] = '';
			$GLOBALS['jml_pegawai'] = '';
			$GLOBALS['jml_omzet'] = '';
			$GLOBALS['jml_konsumen_ramai'] = '';
			$GLOBALS['jml_konsumen_sepi'] = '';
			$GLOBALS['jml_konsumen_normal'] = '';
			$GLOBALS['jml_konsumen_rata'] = '';
			$GLOBALS['nama'] = $datax['jab1']['TBLPEJABAT_NAMA'];
			$GLOBALS['nip'] = $datax['jab1']['TBLPEJABAT_NIP'];
			$GLOBALS['nama2'] = $datax['jab2']['TBLPEJABAT_NAMA'];
			$GLOBALS['nip2'] = $datax['jab2']['TBLPEJABAT_NIP'];


			$nopok_before = '';
			$bulan_before = '';
			$LOOP_NOPOK = array();
			foreach ($datax['cetak'] as $hal_nopok) :
				$kodeunik = $hal_nopok['TBLDAFTAR_NOPOK'].'-'.$hal_nopok['TBLPENDATAAN_THNPAJAK'].'-'.$hal_nopok['TBLPENDATAAN_BLNPAJAK'];
				if ($bulan_before!=$kodeunik) :
					$bulan_before = $kodeunik ;

					$nomorNPWPD = $hal_nopok['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$hal_nopok['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$hal_nopok['TBLKECAMATAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$hal_nopok['TBLKELURAHAN_IDBADANUSAHA']));

					$LOOP_NOPOK = array(
						'op_npwpd' => $nomorNPWPD
						,'nopokhal' => ''
						,'op_nama' => $hal_nopok['TBLDAFTAR_BADANUSAHANAMA']
						,'op_alamat' => $hal_nopok['TBLDAFTAR_BADANUSAHAALAMAT']
						,'detail' => array()
						,'kodeunik' => $kodeunik
					);

					$no = 1;
					foreach ($datax['cetak'] as $kolom) :
						$kodeunike = $kolom['TBLDAFTAR_NOPOK'].'-'.$kolom['TBLPENDATAAN_THNPAJAK'].'-'.$kolom['TBLPENDATAAN_BLNPAJAK'];
						if ($kodeunike==$kodeunik) :

							$BNAMA = trim($kolom['TBLDAFTAR_BADANUSAHANAMA']);
							$BAL = trim($kolom['TBLDAFTAR_BADANUSAHAALAMAT']);
							$NPWPD = 'P'. $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$kolom['TBLKECAMATAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$kolom['TBLKELURAHAN_IDBADANUSAHA']));
							

							// $utama['noo'] = null;
							$utama['no'] = $no++;
							$utama['klasifikasi_kmr'] = $kolom['KLASIFIKASI_KMR'];
							$utama['jml_kmr'] = $kolom['JML_KMR'];
							$utama['tarif_kmr'] = LokalIndonesia::ribuan($kolom['TARIF_KMR']);
							$utama['keterangan'] = $kolom['KETERANGAN'];
							// $utama['angsuran']+$utama['bunga'];
							
							array_push($LOOP_NOPOK['detail'], $utama);
						endif;
					endforeach;
				// $kolom[$datax['NamaTBL'].'_TGLBATASSKPD']
					$LOOP_NOPOK['thnpajak'] = '20' . $hal_nopok['TBLPENDATAAN_THNPAJAK'];
					$LOOP_NOPOK['blnpajak'] = LokalIndonesia::getBulan($hal_nopok['TBLPENDATAAN_BLNPAJAK']);
					$LOOP_NOPOK['op_telp'] = $hal_nopok['TBLDAFTAR_BADANUSAHATELP'];
					$LOOP_NOPOK['op_kec'] = $hal_nopok['TBLKECAMATAN_IDBADANUSAHA'];
					$LOOP_NOPOK['op_kel'] = $hal_nopok['TBLKELURAHAN_IDBADANUSAHA'];
					$LOOP_NOPOK['wp_nama'] = $hal_nopok['TBLDAFTAR_PEMILIKNAMA'];
					$LOOP_NOPOK['wp_jabatan'] = '';
					$LOOP_NOPOK['wp_alamat'] = $hal_nopok['TBLDAFTAR_PEMILIKALAMAT'];
					$LOOP_NOPOK['wp_telp'] = $hal_nopok['TBLDAFTAR_PEMILIKTELP'];
					$LOOP_NOPOK['wp_kec'] = $hal_nopok['TBLKECAMATAN_IDPEMILIK'];
					$LOOP_NOPOK['wp_kel'] = $hal_nopok['TBLKELURAHAN_IDPEMILIK'];
					$LOOP_NOPOK['op_email'] = $hal_nopok['TBLDAFTAR_EMAIL'];
					$LOOP_NOPOK['jenis'] = $hal_nopok['JENIS'];
					if ($hal_nopok['IS_TIKET']=='Y') {
						$LOOP_NOPOK['is_tiket'] = '√';

					} else {
						$LOOP_NOPOK['is_tiket'] = '×';
					}
					if ($hal_nopok['IS_MEMBER']='Y') {
						$LOOP_NOPOK['is_member'] = '√';
					} else {
						$LOOP_NOPOK['is_member'] = '×';
					}
					
					$LOOP_NOPOK['jml_member'] = $hal_nopok['JML_MEMBER'];
					$LOOP_NOPOK['tarif_member'] = LokalIndonesia::ribuan($hal_nopok['TARIF_MEMBER']);
					$LOOP_NOPOK['cara_pembayaran'] = $hal_nopok['CARA_PEMBAYARAN'];
					$LOOP_NOPOK['jam_buka'] = $hal_nopok['JAM_BUKA'];
					$LOOP_NOPOK['jam_tutup'] = $hal_nopok['JAM_TUTUP'];
					$LOOP_NOPOK['jml_pegawai'] = $hal_nopok['JML_PEGAWAI'];
					$LOOP_NOPOK['jml_omzet'] = LokalIndonesia::ribuan($hal_nopok['JML_OMZET']);
					$LOOP_NOPOK['jml_konsumen_ramai'] = $hal_nopok['JML_KONSUMEN_RAMAI'];
					$LOOP_NOPOK['jml_konsumen_sepi'] = $hal_nopok['JML_KONSUMEN_SEPI'];
					$LOOP_NOPOK['jml_konsumen_normal'] = $hal_nopok['JML_KONSUMEN_NORMAL'];
					$LOOP_NOPOK['jml_konsumen_rata'] = $hal_nopok['JML_KONSUMEN_RATA'];
					// √
					// ×
					array_push($rows, $LOOP_NOPOK);
				endif;
			endforeach;

		// echo CJSON::encode($rows);Yii::app()->end();


			$header=array();
			$header['wp_nama'] = $BNAMA;
			$header['wp_alamat'] = $BAL;
			$header['wp_npwpd'] = $NPWPD;
			$header['terbilang'] = '';
		// $header['totaltung'] = LokalIndonesia::ribuan($totalsetor['totalsetor']);
		// $header['toangsur'] = LokalIndonesia::ribuan($totalangsuran['totalangsuran']);
		// $header['totalb'] = LokalIndonesia::ribuan($totalbunga['totalbunga']);
			$header['jum'] = '';



			$otbs->MergeBlock('rows', $rows); 
			$otbs->MergeField('header', $header); 
				// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

			$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
			Yii::app()->end();


		}
		public function actionCetakDaftar()
		{
			$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
			$namatpl = $path_tpl . 'DAFTAR SURAT TEGURAN SKPDKB.docx';
			$namafileDL = "Daftar Teguran SKPDKB.docx";

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
			$tanggalsurat = $_REQUEST['tanggalsurat'] ? $_REQUEST['tanggalsurat'] : '';
			$waktu = $_REQUEST['waktu'] ? $_REQUEST['waktu'] : '';
			$no_surat = $_REQUEST['no_surat'] ? $_REQUEST['no_surat'] : '';
			$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
			$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';
			$TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';

			$KODEREK = $_REQUEST['TBLREKENING_KODE'];
			if($KODEREK=='4.1.1.1.0'){
				$NamaTBL = 'TBLDAFTHOTEL';
				$ADKB = 'DENDAKRGBAYAR';
				$NOANG = 'REGSURATANGSUR';
				$PAJAK = 'PAJAK HOTEL';
				// $petugas = 'NURWITANTO PRAWISDA';
				// $nip = 'NITB-2435';
				$jab_id = '18';
			}
			elseif($KODEREK=='4.1.1.2.0'){
				$NamaTBL = 'TBLDAFTRMAKAN';
				$ADKB = 'DENDAKRGBAYAR';
				$NOANG = 'REGSURATANGSUR';
				$PAJAK = 'PAJAK RESTORAN';
				// $petugas = 'YULI  PURWANTO, SE.';
				// $nip = '197407041994021005';
				$jab_id = '19';
			}
			elseif($KODEREK=='4.1.1.3.0'){
				$NamaTBL = 'TBLDAFTHIBURAN';
				$ADKB = 'DENDAKRGBAYAR';
				$NOANG = 'REGSURATANGSUR';
				$PAJAK = 'PAJAK HIBURAN';
				// $petugas = 'ELSI NURLITA IKAWATI, SE.';
				// $nip = '197104121992031003';
				$jab_id = '20';
			}
			elseif($KODEREK=='4.1.1.7.0'){
				$NamaTBL = 'TBLDAFTPARKIR';	
				$ADKB = 'DENDAKRGBAYAR';
				$NOANG = 'REGSURATANGSUR';
				$PAJAK = 'PAJAK PARKIR';
				// $petugas = 'A. YULIANTO ANDRI W., A.Md.';
				// $nip = 'NITB-2376';
				$jab_id = '21';
			}
			elseif($KODEREK=='4.1.1.8.0'){
				$NamaTBL = 'TBLDAFTTANAH';
				$ADKB = 'DENDAKRGBAYAR';
				$NOANG = 'REGSURATANGSUR';
				$PAJAK = 'PAJAK AIR TANAH';
				// $petugas = 'EKO HERIYANTO, S.Pd.';
				// $nip = '196805081992031011';
				$jab_id = '22';
			}
			elseif($KODEREK=='4.1.1.9.0'){
				$NamaTBL = 'TBLDAFTBURUNG';
				$ADKB = 'DENDAKRGBAYAR';
				$NOANG = 'REGSURATANGSUR';
				$PAJAK = 'PAJAK SARANG BURUNG WALET';
				// $petugas = 'EKO HERIYANTO, S.Pd.';
				// $nip = '196805081992031011';
			}
			elseif($KODEREK=='4.1.1.11.0'){
				$NamaTBL = 'TBLDAFTBPHTB';
				$ADKB = 'DENDAKRGBAYAR';
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
					".$NamaTBL.".OMKB,
					".$NamaTBL.".PAKB,
					".$NamaTBL.".".$NamaTBL."_DENDAKRGBAYAR,
					".$NamaTBL.".BAKB,
					".$NamaTBL.".".$NamaTBL."_BUNGAKRGBAYAR,
					".$NamaTBL.".".$NamaTBL."_".$ADKB.",
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
					/*".$NamaTBL.".".$NamaTBL."_JUMLAHANGSUR,
					".$NamaTBL.".".$NamaTBL."_POKOKTAMBAHAN,
					".$NamaTBL.".".$NamaTBL."_BUNGATAMBAHAN,*/
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
					AND NVL (TBLSETOR_RUPIAHSETOR, 0) = 0
					AND TBLANGSURAN_PAJAKKE IS NULL
					AND TO_DATE (
					CONCAT (
					".$NamaTBL."_blnbtskrgbayar,
					CONCAT (
					'/',
					CONCAT (".$NamaTBL."_tglbtskrgbayar, CONCAT('/', ".$NamaTBL."_thnbtskrgbayar))
					)
					),
					'MM/DD/YY'
					) < TO_DATE('$tanggalsurat', 'DD-MM-YYYY')
					AND ".$NamaTBL.".TBLDAFTAR_NOPOK = ".$nopok."
					AND ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = ".$thpajak."



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
				$utama['masapjk'] = $MASAPJK1 . ' s/d ' . $MASAPJK2;
				$utama['nokb'] = $kolom[$data['NamaTBL'].'_REGKURANGBAYAR'];
				$utama['tempo'] = $kolom[$data['NamaTBL'].'_TGLBTSKRGBAYAR']. '/' .$kolom[$data['NamaTBL'].'_BLNBTSKRGBAYAR'] . '/' . ($kolom[$data['NamaTBL'].'_THNBTSKRGBAYAR'] +2000); 
				$utama['periksa'] = LokalIndonesia::ribuan($kolom[$data['NamaTBL'].'_PAJAKPERIKSA']);
				$utama['bunga'] = LokalIndonesia::ribuan($kolom[$data['NamaTBL'].'_BUNGAKRGBAYAR']);
				$utama['denda'] = LokalIndonesia::ribuan($kolom[$data['NamaTBL'].'_'.$ADKB]);
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
		

	}