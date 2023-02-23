<?php

class Teguran_skpdaController extends Controller
{
	public function actionIndex()
	{
		$data['list_kecamatan'] = Yii::app()->db->createCommand()->select()->from('REFKECAMATAN')->queryAll();
		$data['list_kelurahan'] = Yii::app()->db->createCommand()->select()->from('REFKELURAHAN')->queryAll();
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
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			')->queryAll();
		$data['URL_APP'] = Yii::app()->getBaseUrl(true);		
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionCari()
	{
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
		$TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';
		// $REFKELURAHAN = $_REQUEST['REFKELURAHAN'] ? $_REQUEST['REFKELURAHAN'] : '0';
		// $REFKECAMATAN = $_REQUEST['REFKECAMATAN'] ? $_REQUEST['REFKECAMATAN'] : '0';

		$KODEREK = $_REQUEST['TBLREKENING_KODE'];
		if($KODEREK=='4.1.1.1.0'){
			$NamaTBL = 'TBLDAFTHOTEL';
			$ADKB = 'KENAIKANKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
		}
		elseif($KODEREK=='4.1.1.2.0'){
			$NamaTBL = 'TBLDAFTRMAKAN';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
		}
		elseif($KODEREK=='4.1.1.3.0'){
			$NamaTBL = 'TBLDAFTHIBURAN';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
		}
		elseif($KODEREK=='4.1.1.4.0'){
			$NamaTBL = 'TBLDAFTREKLAME';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'NOJABONG';
		}
		// elseif($KODEREK=='4.1.1.5.0'){
		// 	$NamaTBL = '';
		// }
		elseif($KODEREK=='4.1.1.7.0'){
			$NamaTBL = 'TBLDAFTPARKIR';	
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
		}
		elseif($KODEREK=='4.1.1.8.0'){
			$NamaTBL = 'TBLDAFTTANAH';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
		}
		elseif($KODEREK=='4.1.1.9.0'){
			$NamaTBL = 'TBLDAFTBURUNG';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
		}
		// elseif($KODEREK=='4.1.1.10.0'){
		// 	$NamaTBL = '';
		// }
		elseif($KODEREK=='4.1.1.11.0'){
			$NamaTBL = 'TBLDAFTBPHTB';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
		}

		if($TBLDAFTAR_NOPOK==''){
			$wherenopok = "";

		}

		else{
			$wherenopok = "AND
			TBLDAFTAR_NOPOK = '$TBLDAFTAR_NOPOK'";
		};
		

	$sql="SELECT
	TBLDAFTAR_BADANUSAHANAMA,
	TBLDAFTAR_BADANUSAHAALAMAT,
	TBLPENDATAAN_THNPAJAK,
	TBLPENDATAAN_BLNPAJAK,
	TBLPENDATAAN_TGLPAJAK,
	TBLPENDATAAN_PAJAKKE,
	TBLDAFTAR_NOPOK,
	TBLDAFTAR_JNSPENDAPATAN,
	TBLKECAMATAN_ID,
	TBLKELURAHAN_ID,			
	".$NamaTBL."_THNKURANGBAYAR,
	".$NamaTBL."_BLNKURANGBAYAR,
	".$NamaTBL."_TGLKURANGBAYAR,
	".$NamaTBL."_AYTKURANGBAYAR,
	".$NamaTBL."_REGKURANGBAYAR,
	".$NamaTBL."_URUTKURANGBAYAR,
	PAKB,
	".$NamaTBL."_DENDAKRGBAYAR,
	".$NamaTBL."_BUNGAKRGBAYAR,	
	".$NamaTBL."_REGSURATANGSUR,
	".$NamaTBL."_THNSURATANGSUR,
	".$NamaTBL."_BLNSURATANGSUR,
	".$NamaTBL."_TGLSURATANGSUR,
	".$NamaTBL."_BLNKBAWAL,
	".$NamaTBL."_BLNKBAKHIR,
	Totaltagihan,
	Totalangsuran,
	(Totaltagihan - Totalangsuran) AS sisangasur
	FROM
	(
		SELECT
		(
			SELECT
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
			FROM
			TBLDAFTAR
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NamaTBL.".TBLDAFTAR_NOPOK
			) AS TBLDAFTAR_BADANUSAHANAMA,
	(
		SELECT
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NamaTBL.".TBLDAFTAR_NOPOK
		) AS TBLDAFTAR_BADANUSAHAALAMAT,
	".$NamaTBL.".TBLPENDATAAN_THNPAJAK,
	".$NamaTBL.".TBLPENDATAAN_BLNPAJAK,
	".$NamaTBL.".TBLPENDATAAN_TGLPAJAK,
	".$NamaTBL.".TBLPENDATAAN_PAJAKKE,
	".$NamaTBL.".TBLDAFTAR_NOPOK,
	".$NamaTBL.".TBLDAFTAR_JNSPENDAPATAN,
	".$NamaTBL.".TBLKECAMATAN_ID,
	".$NamaTBL.".TBLKELURAHAN_ID,
	".$NamaTBL.".TBLDAFTAR_GOLONGAN,
	".$NamaTBL.".".$NamaTBL."_THNKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_BLNKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_TGLKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_AYTKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_REGKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_URUTKURANGBAYAR,
	".$NamaTBL.".PAKB,
	".$NamaTBL.".".$NamaTBL."_DENDAKRGBAYAR,
	".$NamaTBL.".".$NamaTBL."_BUNGAKRGBAYAR,
	".$NamaTBL.".".$NamaTBL."_REGSURATANGSUR,
	".$NamaTBL.".".$NamaTBL."_THNSURATANGSUR,
	".$NamaTBL.".".$NamaTBL."_BLNSURATANGSUR,
	".$NamaTBL.".".$NamaTBL."_TGLSURATANGSUR,
	".$NamaTBL.".".$NamaTBL."_BLNKBAWAL,
	".$NamaTBL.".".$NamaTBL."_BLNKBAKHIR,
	SUM (NVL(TBLANGSURAN.TBLANGSURAN_ANGSURAN, 0)) AS Totaltagihan,
	SUM (NVL(TBLANGSURAN.TBLANGSURAN_SETORAN, 0)) AS Totalangsuran
	FROM
	".$NamaTBL."
	INNER JOIN TBLANGSURAN ON ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = TBLANGSURAN.TBLPENDATAAN_THNPAJAK
	AND ".$NamaTBL.".TBLPENDATAAN_BLNPAJAK = TBLANGSURAN.TBLPENDATAAN_BLNPAJAK
	AND ".$NamaTBL.".TBLPENDATAAN_TGLPAJAK = TBLANGSURAN.TBLPENDATAAN_TGLPAJAK
	AND ".$NamaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
	GROUP BY
	".$NamaTBL.".TBLPENDATAAN_THNPAJAK,
	".$NamaTBL.".TBLPENDATAAN_BLNPAJAK,
	".$NamaTBL.".TBLPENDATAAN_TGLPAJAK,
	".$NamaTBL.".TBLPENDATAAN_PAJAKKE,
	".$NamaTBL.".TBLDAFTAR_NOPOK,
	".$NamaTBL.".TBLDAFTAR_JNSPENDAPATAN,
	".$NamaTBL.".TBLKECAMATAN_ID,
	".$NamaTBL.".TBLKELURAHAN_ID,
	".$NamaTBL.".TBLDAFTAR_GOLONGAN,
	".$NamaTBL.".".$NamaTBL."_THNKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_BLNKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_TGLKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_AYTKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_REGKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_URUTKURANGBAYAR,
	".$NamaTBL.".PAKB,
	".$NamaTBL.".".$NamaTBL."_DENDAKRGBAYAR,
	".$NamaTBL.".".$NamaTBL."_BUNGAKRGBAYAR,
	".$NamaTBL.".".$NamaTBL."_REGSURATANGSUR,
	".$NamaTBL.".".$NamaTBL."_THNSURATANGSUR,
	".$NamaTBL.".".$NamaTBL."_BLNSURATANGSUR,
	".$NamaTBL.".".$NamaTBL."_TGLSURATANGSUR,
	".$NamaTBL.".".$NamaTBL."_BLNKBAWAL,
	".$NamaTBL.".".$NamaTBL."_BLNKBAKHIR
	)
	WHERE
	NVL (".$NamaTBL."_REGKURANGBAYAR, 0) > 0
	AND NVL (
		Totaltagihan - Totalangsuran,
		0
		) > 0
	".$wherenopok."
	AND TBLPENDATAAN_THNPAJAK = ".$TBLPENDATAAN_THNPAJAK."
	ORDER BY
	".$NamaTBL."_THNSURATANGSUR,
	TBLPENDATAAN_THNPAJAK,
	TBLPENDATAAN_BLNPAJAK,
	TBLPENDATAAN_TGLPAJAK";

$data['cari'] = $cari = Yii::app()->db->createCommand($sql)->queryAll();
$data['NamaTBL'] = $NamaTBL;


$this->renderPartial('tabel_laporan',array('data'=>$data));
}

public function actioncetakword()
{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
	$namatpl = $path_tpl . 'Surat Teguran SKPDA.docx';
	$namafileDL = "Surat Teguran SKPDA.docx";

		// if (base64_decode($data['jenis'])=='REK') {
		// 	$namatpl = $path_tpl . 'Temp_Teguranrek.docx';
		// 	$namafileDL = "Surat-Teguranrek.docx"; 
		// }

	Yii::import('ext.DMOpenTBS',true);
	Yii::import('ext.LokalIndonesia');
	DMOpenTBS::init();
	$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
	$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template


		$nomor_surat = $_REQUEST['nomor_surat'] ? $_REQUEST['nomor_surat'] : '';
		$tglawal = $_REQUEST['tglawal'] ? $_REQUEST['tglawal'] : '';
		$tglakhir = $_REQUEST['tglakhir'] ? $_REQUEST['tglakhir'] : '';
		$waktu = $_REQUEST['waktu'] ? $_REQUEST['waktu'] : '';
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
		$TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';
		// $REFKELURAHAN = $_REQUEST['REFKELURAHAN'] ? $_REQUEST['REFKELURAHAN'] : '0';
		// $REFKECAMATAN = $_REQUEST['REFKECAMATAN'] ? $_REQUEST['REFKECAMATAN'] : '0';

		$KODEREK = $_REQUEST['TBLREKENING_KODE'];
		if($KODEREK=='4.1.1.1.0'){
			$NamaTBL = 'TBLDAFTHOTEL';
			$ADKB = 'KENAIKANKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'DENDAKRGBAYAR';
			$PAJAK = 'PAJAK HOTEL';
		}
		elseif($KODEREK=='4.1.1.2.0'){
			$NamaTBL = 'TBLDAFTRMAKAN';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'KENAIKANKRGBAYAR';
			$PAJAK = 'PAJAK RESTORAN';
		}
		elseif($KODEREK=='4.1.1.3.0'){
			$NamaTBL = 'TBLDAFTHIBURAN';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'KENAIKANKRGBAYAR';
			$PAJAK = 'PAJAK HIBURAN';
		}
		elseif($KODEREK=='4.1.1.4.0'){
			$NamaTBL = 'TBLDAFTREKLAME';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'NOJABONG';
			$KNKB = 'KENAIKANKRGBAYAR';
			$PAJAK = 'PAJAK REKLAME';
		}
		// elseif($KODEREK=='4.1.1.5.0'){
		// 	$NamaTBL = '';
		// }
		elseif($KODEREK=='4.1.1.7.0'){
			$NamaTBL = 'TBLDAFTPARKIR';	
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'KENAIKANKRGBAYAR';
			$PAJAK = 'PAJAK PARKIR';
		}
		elseif($KODEREK=='4.1.1.8.0'){
			$NamaTBL = 'TBLDAFTTANAH';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'KENAIKANKRGBAYAR';
			$PAJAK = 'PAJAK AIR TANAH';
		}
		elseif($KODEREK=='4.1.1.9.0'){
			$NamaTBL = 'TBLDAFTBURUNG';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'KENAIKANKRGBAYAR';
			$PAJAK = 'PAJAK SARANG BURUNG WALET';
		}
		// elseif($KODEREK=='4.1.1.10.0'){
		// 	$NamaTBL = '';
		// }
		elseif($KODEREK=='4.1.1.11.0'){
			$NamaTBL = 'TBLDAFTBPHTB';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'KENAIKANKRGBAYAR';
			$PAJAK = 'PAJAK BPHTB';
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
					echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
					Yii::app()->end();
				}
				$nopok = $kodefikasi[0];
				$tahunpjk = $kodefikasi[1];
				

				$query .= 
				$flag .
					"SELECT
						(
							SELECT
								TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
							FROM
								TBLDAFTAR
							WHERE
								TBLDAFTAR.TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
						) AS TBLDAFTAR_BADANUSAHANAMA,
						(
							SELECT
								TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
							FROM
								TBLDAFTAR
							WHERE
								TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NamaTBL.".TBLDAFTAR_NOPOK
						) AS TBLDAFTAR_BADANUSAHAALAMAT,
						".$NamaTBL.".TBLPENDATAAN_THNPAJAK AS TBLPENDATAAN_THNPAJAK,
						".$NamaTBL.".TBLPENDATAAN_BLNPAJAK AS TBLPENDATAAN_BLNPAJAK,
						".$NamaTBL.".TBLPENDATAAN_TGLPAJAK,
						".$NamaTBL.".TBLPENDATAAN_PAJAKKE,
						".$NamaTBL.".TBLDAFTAR_JNSPENDAPATAN,
						".$NamaTBL.".TBLDAFTAR_GOLONGAN,
						".$NamaTBL.".TBLDAFTAR_NOPOK,
						".$NamaTBL.".TBLKECAMATAN_ID,
						".$NamaTBL.".TBLKELURAHAN_ID,
						".$NamaTBL.".".$NamaTBL."_REGSURATANGSUR,
						".$NamaTBL.".".$NamaTBL."_THNSURATANGSUR,
						".$NamaTBL.".".$NamaTBL."_BLNSURATANGSUR,
						".$NamaTBL.".".$NamaTBL."_TGLSURATANGSUR,
						".$NamaTBL.".".$NamaTBL."_THNKURANGBAYAR,
						".$NamaTBL.".".$NamaTBL."_BLNKURANGBAYAR,
						".$NamaTBL.".".$NamaTBL."_TGLKURANGBAYAR,
						".$NamaTBL.".".$NamaTBL."_AYTKURANGBAYAR,
						".$NamaTBL.".".$NamaTBL."_REGKURANGBAYAR,
						".$NamaTBL.".".$NamaTBL."_URUTKURANGBAYAR,
						".$NamaTBL.".PAKB,
						".$NamaTBL.".".$NamaTBL."_".$ADKB.",
						".$NamaTBL.".".$NamaTBL."_BUNGAKRGBAYAR,
						".$NamaTBL.".".$NamaTBL."_".$KNKB.",
						".$NamaTBL.".".$NamaTBL."_BLNKBAWAL,
						".$NamaTBL.".".$NamaTBL."_BLNKBAKHIR,
						".$NamaTBL.".".$NamaTBL."_THNBATASSKPD,
						".$NamaTBL.".".$NamaTBL."_BLNBATASSKPD,
						".$NamaTBL.".".$NamaTBL."_TGLBATASSKPD,
						TBLANGSURAN.TBLANGSURAN_KETETAPANTOTAL AS RPKB,
						TBLANGSURAN.TBLANGSURAN_ANGSURAN,
						TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
						TBLANGSURAN.TBLANGSURAN_DENDAANGSURAN,
						TBLANGSURAN.TBLANGSURAN_SETORAN,
						TBLANGSURAN.TBLANGSURAN_THNSETORANGSURAN,
						TBLANGSURAN.TBLANGSURAN_BLNSETORANGSURAN,
						TBLANGSURAN.TBLANGSURAN_TGLSETORANGSURAN,
						TBLANGSURAN.TBLANGSURAN_THNBATASKETETAPAN,
						TBLANGSURAN.TBLANGSURAN_BLNBATASKETETAPAN,
						TBLANGSURAN.TBLANGSURAN_TGLBATASKETETAPAN
					FROM
						".$NamaTBL."
					INNER JOIN TBLANGSURAN ON ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = TBLANGSURAN.TBLPENDATAAN_THNPAJAK
					AND ".$NamaTBL.".TBLPENDATAAN_BLNPAJAK = TBLANGSURAN.TBLPENDATAAN_BLNPAJAK
					AND ".$NamaTBL.".TBLPENDATAAN_TGLPAJAK = TBLANGSURAN.TBLPENDATAAN_TGLPAJAK
					AND ".$NamaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
					AND ".$NamaTBL.".TBLDAFTAR_NOPOK IN (".$nopok.")
					AND ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = ".$tahunpjk."
					";
					$flag = "
					UNION
					";
					}
				}

		$ORDER = "
		ORDER BY
		TBLDAFTAR_NOPOK,
		TBLPENDATAAN_THNPAJAK,
		TBLPENDATAAN_BLNPAJAK,
		TBLDAFTHOTEL_REGKURANGBAYAR,
		TBLANGSURAN_PAJAKKE,
		TBLPENDATAAN_TGLPAJAK
		";


		$datax['cetak'] = Yii::app()->db->createCommand($query.$ORDER)->queryAll(); 
		$datax['NamaTBL'] = $NamaTBL;

		$utama = array();
		$rows = array();

		$tanggalsurat = date('d') . ' ' . LokalIndonesia::getBulan(date('m')) . ' ' . date('Y');
		$GLOBALS['datenow'] = $tanggalsurat;
		$GLOBALS['tglundangan1'] = $_REQUEST['tglawal'];
		$GLOBALS['tglundangan2'] = $_REQUEST['tglakhir'];
		$GLOBALS['no_surat'] = $_REQUEST['nomor_surat'];
		$GLOBALS['jnspajak'] = $PAJAK;
		$GLOBALS['waktu'] = $_REQUEST['waktu'];

		$no = 1;
		$totalangsuran = array('totalangsuran'=>0);
		$totalbunga = array('totalbunga'=>0);
		$totalsetor = array('totalsetor'=>0);
		foreach ($datax['cetak'] as $kolom) :
			$BNAMA = trim($kolom['TBLDAFTAR_BADANUSAHANAMA']);
			$BAL = trim($kolom['TBLDAFTAR_BADANUSAHAALAMAT']);
			$NPWPD = $kolom['TBLDAFTAR_JNSPENDAPATAN'] . '.'. $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$kolom['TBLKECAMATAN_ID'])) . '.' . (sprintf('%02d',$kolom['TBLKELURAHAN_ID']));
			$TEMPO = $kolom[$datax['NamaTBL'].'_TGLBATASSKPD'] . ' ' . LokalIndonesia::getBulan($kolom[$datax['NamaTBL'].'_BLNBATASSKPD']) . ' ' . ($kolom[$datax['NamaTBL'].'_THNBATASSKPD'] +2000);
			$TGLSETOR = $kolom['TBLANGSURAN_TGLSETORANGSURAN'] . ' ' . LokalIndonesia::getBulan($kolom['TBLANGSURAN_BLNSETORANGSURAN']) . ' ' . ($kolom['TBLANGSURAN_THNSETORANGSURAN'] +2000);

			// $utama['noo'] = null;
			$utama['no'] = $no++;
			$utama['angsuran'] = LokalIndonesia::ribuan($kolom['TBLANGSURAN_ANGSURAN']);
			$utama['bunga'] = LokalIndonesia::ribuan($kolom['TBLANGSURAN_BUNGAANGSURAN']);
			$utama['tgltempo'] = $TEMPO;
			$utama['tglrealisasi'] = $TGLSETOR;
			$utama['tunggakan'] = LokalIndonesia::ribuan($kolom['TBLANGSURAN_SETORAN']);
			$utama['jmlh'] = '';

			$totalangsuran['totalangsuran'] += $kolom['TBLANGSURAN_ANGSURAN'];
			$totalbunga['totalbunga'] += $kolom['TBLANGSURAN_BUNGAANGSURAN'];
			$totalsetor['totalsetor'] += $kolom['TBLANGSURAN_SETORAN'];

			array_push($rows, $utama);
		endforeach;
		$header=array();
		$header['wp_nama'] = $BNAMA;
		$header['wp_alamat'] = $BAL;
		$header['wp_npwpd'] = $NPWPD;
		$header['terbilang'] = '';
		$header['totaltung'] = LokalIndonesia::ribuan($totalsetor['totalsetor']);
		$header['toangsur'] = LokalIndonesia::ribuan($totalangsuran['totalangsuran']);
		$header['totalb'] = LokalIndonesia::ribuan($totalbunga['totalbunga']);
		$header['jum'] = '';
		


		$otbs->MergeBlock('utama', $rows); 
		$otbs->MergeField('header', $header); 
				// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
}

public function actioncetakdaftar()
{
	$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
	$namatpl = $path_tpl . 'daftar surat teguran angsuran.docx';
	$namafileDL = "Daftar Teguran SKPDA.docx";

		// if (base64_decode($data['jenis'])=='REK') {
		// 	$namatpl = $path_tpl . 'Temp_Teguranrek.docx';
		// 	$namafileDL = "Surat-Teguranrek.docx"; 
		// }

	Yii::import('ext.DMOpenTBS',true);
	Yii::import('ext.LokalIndonesia');
	DMOpenTBS::init();
	$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
	$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template


		$nomor_surat = $_REQUEST['nomor_surat'] ? $_REQUEST['nomor_surat'] : '';
		$tglawal = $_REQUEST['tglawal'] ? $_REQUEST['tglawal'] : '';
		$tglakhir = $_REQUEST['tglakhir'] ? $_REQUEST['tglakhir'] : '';
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
		$TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';
		// $REFKELURAHAN = $_REQUEST['REFKELURAHAN'] ? $_REQUEST['REFKELURAHAN'] : '0';
		// $REFKECAMATAN = $_REQUEST['REFKECAMATAN'] ? $_REQUEST['REFKECAMATAN'] : '0';

		$KODEREK = $_REQUEST['TBLREKENING_KODE'];
		if($KODEREK=='4.1.1.1.0'){
			$NamaTBL = 'TBLDAFTHOTEL';
			$ADKB = 'KENAIKANKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'DENDAKRGBAYAR';
			$PAJAK = 'PAJAK HOTEL';
			$petugas = 'M. ROHMAD ROMADHON';
			$nip = '1967121992031002';
		}
		elseif($KODEREK=='4.1.1.2.0'){
			$NamaTBL = 'TBLDAFTRMAKAN';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'KENAIKANKRGBAYAR';
			$PAJAK = 'PAJAK RESTORAN';
			$petugas = 'YULI  PURWANTO';
			$nip = '197407041994021005';
		}
		elseif($KODEREK=='4.1.1.3.0'){
			$NamaTBL = 'TBLDAFTHIBURAN';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'KENAIKANKRGBAYAR';
			$PAJAK = 'PAJAK HIBURAN';
			$petugas = 'ELSI NURLITA IKAWATI, A.Md';
			$nip = '197104121992031003';
		}
		elseif($KODEREK=='4.1.1.4.0'){
			$NamaTBL = 'TBLDAFTREKLAME';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'NOJABONG';
			$KNKB = 'KENAIKANKRGBAYAR';
			$PAJAK = 'PAJAK REKLAME';
			$petugas = 'MEYRINA NUR IVADA';
			$nip = '196903251990031003';
		}
		// elseif($KODEREK=='4.1.1.5.0'){
		// 	$NamaTBL = '';
		// }
		elseif($KODEREK=='4.1.1.7.0'){
			$NamaTBL = 'TBLDAFTPARKIR';	
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'KENAIKANKRGBAYAR';
			$PAJAK = 'PAJAK PARKIR';
			$petugas = 'NURWITANTO P';
			$nip = '';
		}
		elseif($KODEREK=='4.1.1.8.0'){
			$NamaTBL = 'TBLDAFTTANAH';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'KENAIKANKRGBAYAR';
			$PAJAK = 'PAJAK AIR TANAH';
			$petugas = 'EKO HERIYANTO';
			$nip = '196805081992031011';
		}
		elseif($KODEREK=='4.1.1.9.0'){
			$NamaTBL = 'TBLDAFTBURUNG';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'KENAIKANKRGBAYAR';
			$PAJAK = 'PAJAK SARANG BURUNG WALET';
			$petugas = 'JOKO SUNGKONO';
			$nip = '195908081981021007';
		}
		// elseif($KODEREK=='4.1.1.10.0'){
		// 	$NamaTBL = '';
		// }
		elseif($KODEREK=='4.1.1.11.0'){
			$NamaTBL = 'TBLDAFTBPHTB';
			$ADKB = 'DENDAKRGBAYAR';
			$NOANG = 'REGSURATANGSUR';
			$KNKB = 'KENAIKANKRGBAYAR';
			$PAJAK = 'PAJAK BPHTB';
			$petugas = '';
			$nip = '';
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
					echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
					Yii::app()->end();
				}
				$nopok = $kodefikasi[0];
				$tahunpjk = $kodefikasi[1];
				

				$query .= 
				$flag .
					"SELECT
	TBLDAFTAR_BADANUSAHANAMA,
	TBLDAFTAR_BADANUSAHAALAMAT,
	TBLPENDATAAN_THNPAJAK,
	TBLPENDATAAN_BLNPAJAK,
	TBLPENDATAAN_TGLPAJAK,
	TBLPENDATAAN_PAJAKKE,
	TBLDAFTAR_NOPOK,
	TBLDAFTAR_GOLONGAN,
	TBLDAFTAR_JNSPENDAPATAN,
	TBLKECAMATAN_ID,
	TBLKELURAHAN_ID,			
	".$NamaTBL."_THNKURANGBAYAR,
	".$NamaTBL."_BLNKURANGBAYAR,
	".$NamaTBL."_TGLKURANGBAYAR,
	".$NamaTBL."_AYTKURANGBAYAR,
	".$NamaTBL."_REGKURANGBAYAR,
	".$NamaTBL."_URUTKURANGBAYAR,
	PAKB,
	".$NamaTBL."_DENDAKRGBAYAR,
	".$NamaTBL."_BUNGAKRGBAYAR,	
	".$NamaTBL."_REGSURATANGSUR,
	".$NamaTBL."_THNSURATANGSUR,
	".$NamaTBL."_BLNSURATANGSUR,
	".$NamaTBL."_TGLSURATANGSUR,
	".$NamaTBL."_BLNKBAWAL,
	".$NamaTBL."_BLNKBAKHIR,
	Totaltagihan,
	Totalangsuran,
	(Totaltagihan - Totalangsuran) AS sisangasur
	FROM
	(
		SELECT
		(
			SELECT
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
			FROM
			TBLDAFTAR
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NamaTBL.".TBLDAFTAR_NOPOK
			) AS TBLDAFTAR_BADANUSAHANAMA,
	(
		SELECT
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NamaTBL.".TBLDAFTAR_NOPOK
		) AS TBLDAFTAR_BADANUSAHAALAMAT,
	".$NamaTBL.".TBLPENDATAAN_THNPAJAK,
	".$NamaTBL.".TBLPENDATAAN_BLNPAJAK,
	".$NamaTBL.".TBLPENDATAAN_TGLPAJAK,
	".$NamaTBL.".TBLPENDATAAN_PAJAKKE,
	".$NamaTBL.".TBLDAFTAR_NOPOK,
	".$NamaTBL.".TBLDAFTAR_JNSPENDAPATAN,
	".$NamaTBL.".TBLKECAMATAN_ID,
	".$NamaTBL.".TBLKELURAHAN_ID,
	".$NamaTBL.".TBLDAFTAR_GOLONGAN,
	".$NamaTBL.".".$NamaTBL."_THNKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_BLNKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_TGLKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_AYTKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_REGKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_URUTKURANGBAYAR,
	".$NamaTBL.".PAKB,
	".$NamaTBL.".".$NamaTBL."_DENDAKRGBAYAR,
	".$NamaTBL.".".$NamaTBL."_BUNGAKRGBAYAR,
	".$NamaTBL.".".$NamaTBL."_REGSURATANGSUR,
	".$NamaTBL.".".$NamaTBL."_THNSURATANGSUR,
	".$NamaTBL.".".$NamaTBL."_BLNSURATANGSUR,
	".$NamaTBL.".".$NamaTBL."_TGLSURATANGSUR,
	".$NamaTBL.".".$NamaTBL."_BLNKBAWAL,
	".$NamaTBL.".".$NamaTBL."_BLNKBAKHIR,
	SUM (NVL(TBLANGSURAN.TBLANGSURAN_ANGSURAN, 0)) AS Totaltagihan,
	SUM (NVL(TBLANGSURAN.TBLANGSURAN_SETORAN, 0)) AS Totalangsuran
	FROM
	".$NamaTBL."
	INNER JOIN TBLANGSURAN ON ".$NamaTBL.".TBLPENDATAAN_THNPAJAK = TBLANGSURAN.TBLPENDATAAN_THNPAJAK
	AND ".$NamaTBL.".TBLPENDATAAN_BLNPAJAK = TBLANGSURAN.TBLPENDATAAN_BLNPAJAK
	AND ".$NamaTBL.".TBLPENDATAAN_TGLPAJAK = TBLANGSURAN.TBLPENDATAAN_TGLPAJAK
	AND ".$NamaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
	GROUP BY
	".$NamaTBL.".TBLPENDATAAN_THNPAJAK,
	".$NamaTBL.".TBLPENDATAAN_BLNPAJAK,
	".$NamaTBL.".TBLPENDATAAN_TGLPAJAK,
	".$NamaTBL.".TBLPENDATAAN_PAJAKKE,
	".$NamaTBL.".TBLDAFTAR_NOPOK,
	".$NamaTBL.".TBLDAFTAR_JNSPENDAPATAN,
	".$NamaTBL.".TBLKECAMATAN_ID,
	".$NamaTBL.".TBLKELURAHAN_ID,
	".$NamaTBL.".TBLDAFTAR_GOLONGAN,
	".$NamaTBL.".".$NamaTBL."_THNKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_BLNKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_TGLKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_AYTKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_REGKURANGBAYAR,
	".$NamaTBL.".".$NamaTBL."_URUTKURANGBAYAR,
	".$NamaTBL.".PAKB,
	".$NamaTBL.".".$NamaTBL."_DENDAKRGBAYAR,
	".$NamaTBL.".".$NamaTBL."_BUNGAKRGBAYAR,
	".$NamaTBL.".".$NamaTBL."_REGSURATANGSUR,
	".$NamaTBL.".".$NamaTBL."_THNSURATANGSUR,
	".$NamaTBL.".".$NamaTBL."_BLNSURATANGSUR,
	".$NamaTBL.".".$NamaTBL."_TGLSURATANGSUR,
	".$NamaTBL.".".$NamaTBL."_BLNKBAWAL,
	".$NamaTBL.".".$NamaTBL."_BLNKBAKHIR
	)
	WHERE
	NVL (".$NamaTBL."_REGKURANGBAYAR, 0) > 0
	AND NVL (
		Totaltagihan - Totalangsuran,
		0
		) > 0
	AND TBLDAFTAR_NOPOK = ".$nopok."
	AND TBLPENDATAAN_THNPAJAK = ".$tahunpjk."

										";
										
										$flag = "
										UNION
										";
								}
							}

	// ORDER BY
	// ".$NamaTBL."_THNSURATANGSUR,
	// TBLPENDATAAN_THNPAJAK,
	// TBLPENDATAAN_BLNPAJAK,
	// TBLPENDATAAN_TGLPAJAK

		$datax['cetak'] = Yii::app()->db->createCommand($query)->queryAll(); 
		$datax['NamaTBL'] = $NamaTBL;

		$utama = array();
		$rows = array();

		$tanggalsurat = date('d') . ' ' . LokalIndonesia::getBulan(date('m')) . ' ' . date('Y');

		$GLOBALS['nosurat'] = $_REQUEST['nomor_surat'];
		$GLOBALS['jnspajak'] = $PAJAK;
		$GLOBALS['datenow'] = $tanggalsurat;
		$GLOBALS['petugas'] = $petugas;
		$GLOBALS['nip'] = $nip;

		$total=array('total'=>0);
		$no = 1;
		foreach ($datax['cetak'] as $kolom) :
			$BNAMA = trim($kolom['TBLDAFTAR_BADANUSAHANAMA']);
			$BAL = trim($kolom['TBLDAFTAR_BADANUSAHAALAMAT']);
			$NPWPD = $kolom['TBLDAFTAR_JNSPENDAPATAN'] . '.'. $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$kolom['TBLKECAMATAN_ID'])) . '.' . (sprintf('%02d',$kolom['TBLKELURAHAN_ID']));
			$THSKA = trim($kolom[$datax['NamaTBL'].'_THNSURATANGSUR'] +2000);
			$MSPAJAK = LokalIndonesia::getBulan($kolom[$datax['NamaTBL'].'_BLNKBAWAL']) . ' ' . ($kolom['TBLPENDATAAN_THNPAJAK'] +2000);
			$MSPAJAKA = LokalIndonesia::getBulan($kolom[$datax['NamaTBL'].'_BLNKBAKHIR']) . ' ' . ($kolom['TBLPENDATAAN_THNPAJAK'] +2000);

			$utama['no'] = $no++;
			$utama['namawp'] = $BNAMA;
			$utama['alamatwp'] = $BAL;
			$utama['npwpd'] = $NPWPD;
			$utama['thnang'] = $THSKA;
			$utama['masapajak'] = $MSPAJAK . ' s/d ' . $MSPAJAKA;
			$utama['rupiahsetor'] = LokalIndonesia::ribuan($kolom['SISANGASUR']);

			$total['total'] += trim($kolom['SISANGASUR']);

			array_push($rows, $utama);
		endforeach;
		$header=array();
		$header['total'] = LokalIndonesia::ribuan($total['total']);


		$otbs->MergeBlock('utama', $rows); 
		$otbs->MergeField('header', $header);
				// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
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