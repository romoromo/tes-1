<?php

class Cetakdaftarsetoranwpwr_90_1Controller extends Controller
{
	var $MODULE_URL = 'penyetoran/cetakdaftarsetoranwpwr_90_1';
	public function actionIndex()
	{
		$data['rek'] = Yii::app()->db->createCommand('
			SELECT
			*
			FROM
			TBLREKENING_90 TBLREKENING
			WHERE
			TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			AND TBLREKENING_REKPENDAPATAN_90 IS NOT NULL
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			')->queryAll();

		// $this->renderPartial('index');
		$this->renderPartial('index',array('data'=>$data));
	}


	public function actionCetak()
	{
		$data=array();
		$data['tahun'] = $tahun = (int)substr($_REQUEST['tahun'], -2) ? (int)substr($_REQUEST['tahun'], -2) : '' ;
		$data['bulan'] = $bulan = (int)$_REQUEST['bulan'] ? (int)$_REQUEST['bulan'] : '' ;
		$data['tgl'] = $tgl = (int)$_REQUEST['tgl'] ? (int)$_REQUEST['tgl'] : '' ;
		$data['carabyr'] = $carabyr = $_REQUEST['carabyr'] ? $_REQUEST['carabyr'] : '' ;
		$data['rekening'] = $rekening = $_REQUEST['rekening'] ? $_REQUEST['rekening'] : '' ;

		$carabayar = "";
		if(!empty($carabyr)){
			$carabayar = "AND TBLSETOR.TBLSETOR_CARABAYAR = '$carabyr'";
		}

		$tglbayar = "";
		if(!empty($tgl)){
			$tglbayar = "AND TBLSETOR.TBLSETOR_TGLSETOR = ".$tgl."";
		}

		$rek = "";
		if(!empty($rekening)){
			$rek = "AND TBLSETOR.TBLSETOR_REKAYAT = ".$rekening."";
		}
		// $wheretahun = '';
		// if (!empty($tahun)) {
		// 	$wheretahun = ' AND "sptre".TBLPENDATAAN_THNPAJAK = ' . substr($tahun, -2);
		// }

		// $wherebln = '';
		// if (!empty($blp)) {
		// 	$whereblp = ' AND "sptre".TBLPENDATAAN_BLNPAJAK = ' . $blp;
		// }

		// $wheretgl = '';
		// if (!empty($hrp)) {
		// 	$wherehrp = ' AND "sptre".TBLPENDATAAN_TGLPAJAK = ' . $hrp;
		// }

		$sql = "
		SELECT
		TBLSETOR.TBLSETOR_THNSETOR,
		TBLSETOR.TBLSETOR_BLNSETOR,
		TBLSETOR.TBLSETOR_TGLSETOR,
		TBLSETOR.TBLPENDATAAN_THNPAJAK,
		TBLSETOR.TBLPENDATAAN_BLNPAJAK,
		TBLSETOR.TBLPENDATAAN_TGLPAJAK,
		TBLSETOR.TBLSETOR_NOMORSSPD,

		TBLREKENING.TBLREKENING_REKPENDAPATAN_90 AS TBLSETOR_REKPENDAPATAN,
		TBLREKENING.TBLREKENING_REKPAD_90 AS TBLSETOR_REKPAD,
		TBLREKENING.TBLREKENING_REKPAJAK_90 AS TBLSETOR_REKPAJAK,
		TBLREKENING.TBLREKENING_REKAYAT_90 TBLSETOR_REKAYAT,
		TBLREKENING.TBLREKENING_REKJENIS_90 AS TBLSETOR_REKJENIS,
		TBLREKENING.TBLREKENING_REKSUBJENIS_90 AS TBLSETOR_REKSUBJENIS,

		TBLSETOR.TBLSETOR_REKPENDAPATAN AS ORDER_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD AS ORDER_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK AS ORDER_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT ORDER_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS AS ORDER_REKJENIS,

		TBLSETOR.TBLSETOR_CARABAYAR,
		NVL (
		TBLDAFTAR_BADANUSAHANAMA,
		KET
		) AS TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLSETOR.TBLDAFTAR_NOPOK,
		NVL(TBLSETOR.TBLPENDATAAN_PAJAKKE, 0) AS TBLPENDATAAN_PAJAKKE,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		CASE
		WHEN (
		(
		TBLSETOR.TBLSETOR_REKAYAT = 2
		)
		OR (
		TBLSETOR.TBLSETOR_REKAYAT = 1
		)
		OR (
		TBLSETOR.TBLSETOR_REKAYAT = 7
		)
		OR (
		TBLSETOR.TBLSETOR_REKAYAT = 11
		)
		)
		AND (
		TRIM (TBLSETOR.TBLSETOR_JNSBAYAR) LIKE 'SKPD'
		) THEN
		'SPTPD'
		ELSE
		TBLSETOR.TBLSETOR_JNSBAYAR
		END AS TBLSETOR_JNSBAYAR,
		TBLSETOR_BUNGAKETETAPAN,
		CASE
		WHEN TRIM (TBLSETOR.TBLSETOR_JNSBAYAR) LIKE '%SKPD-A%' THEN
		NVL (
		TBLSETOR.TBLSETOR_RUPIAHSETOR,
		0
		) + NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0)
		ELSE
		TBLSETOR.TBLSETOR_RUPIAHSETOR
		END AS TBLSETOR_RUPIAHSETOR,
		TBLREKENING_NAMAREKENING_90 AS TBLREKENING_NAMAREKENING
		FROM
		TBLSETOR

		LEFT JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		AND TBLSETOR.TBLSETOR_GOLONGAN = TBLDAFTAR.TBLDAFTAR_GOLONGAN
		AND TBLSETOR.TBLDAFTAR_JNSPENDAPATAN = TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN

		LEFT JOIN TBLREKENING_90 TBLREKENING ON TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLSETOR.TBLSETOR_REKJENIS

		WHERE
		TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
		AND TBLSETOR.TBLSETOR_THNSETOR = ".$tahun."
		AND TBLSETOR.TBLSETOR_BLNSETOR = ".$bulan."
		".$tglbayar."
		".$carabayar."
		".$rek."
		AND TBLSETOR.TBLSETOR_STATUSBAYAR <> 20
		AND TRIM (TBLSETOR_JNSBAYAR) <> 'BNG SK-A'
		ORDER BY
		TBLSETOR_JNSBAYAR,
		ORDER_REKPENDAPATAN,
		ORDER_REKPAD,
		ORDER_REKPAJAK,
		ORDER_REKAYAT,
		ORDER_REKJENIS,
		TBLDAFTAR_NOPOK,
		TBLSETOR_NOMORSSPD
		";
		// echo $sql; Yii::app()->end();
		$data['hasil'] = $hasil = Yii::app()->db->createCommand($sql)->queryAll();

		if (isset($_REQUEST['jenis']) && $_REQUEST['jenis']=='word') {
			$this->cetakWord($data);
		}

		$this->renderPartial('cetak', array('data'=>$data));
	}

	public function cetakWord($data)
	{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_penyetoran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'daftar_setoran_wpwr.docx';

		Yii::import('ext.DMOpenTBS',true);
		Yii::import('ext.LokalIndonesia');
		DMOpenTBS::init();
		$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
		$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

		$utama = array();
		$rows = array();
		$dt = array();
		$no = 1;

		$totalsetor = 0;
		$utama['tglcetak'] = LokalIndonesia::TanggalUmum(date('Y-m-d'));
		$utama['tglsetor'] = $GLOBALS['tglsetor'] = $tglsetor = sprintf('%02d', $data['tgl']).'/'.sprintf('%02d', $data['bulan']).'/'.'20'.sprintf('%02d', $data['tahun']);
		
		$rekb4 = '';
		$rekb4_data = array();
		$rekb4_total = 0;
		foreach ($data['hasil'] as $row) :

			// if ($rekb4 != $row['ORDER_REKAYAT'] AND $no!=1) :
			// 	$rekb4 = $row['ORDER_REKAYAT'];
			// 	$dt['koderek'] = $rekb4_data['koderek'];
			// 	$koderek = $dt['koderek'] . '..';
			// 	// $dt['namarek'] = $rekb4_data['namarek'];
			// 	$sql = "SELECT TBLREKENING_NAMAREKENING_90 FROM TBLREKENING_90 WHERE TBLREKENING_KODE_90=:kode";
			// 	$namarek = Yii::app()->db->createCommand($sql)
			// 	->bindParam(':kode', $koderek)
			// 	->queryScalar();
			// 	$dt['namarek'] = $namarek;
			// 	$dt['TBLSETOR_REKAYAT'] = $row['TBLSETOR_REKAYAT'];
			// 	$dt['no'] = '---';
			// 	$dt['npwpd'] = '----------------';
			// 	$dt['namabu'] = '-------------------------------------';
			// 	$dt['jenislapor'] = '---------';
			// 	$dt['nossp'] = '---------------';
			// 	$dt['rupiahsetor'] = LokalIndonesia::ribuan($rekb4_total);
			// 	$dt['alamatbu'] = '';
			// 	$dt['thnpajak'] = '';
			// 	$dt['blnpajak'] = '';
			// 	$dt['pajakke'] = '';
			// 	$dt['tglsetor'] = '';

			// 	if ($no-1 != 1) :
			// 		array_push($rows, $dt);
			// 	endif;

			// 	$rekb4_total = 0;
			// 	continue;
			// endif;

			$rekb4_data['koderek'] = $row['TBLSETOR_REKPENDAPATAN'].'.'.$row['TBLSETOR_REKPAD'].'.'.$row['TBLSETOR_REKPAJAK'].'.'.$row['TBLSETOR_REKAYAT'];
			$rekb4_data['namarek'] = $row['TBLREKENING_NAMAREKENING'];

			$dt['no'] = $no++;
			$dt['TBLSETOR_REKAYAT'] = $row['TBLSETOR_REKAYAT'];
			$dt['npwpd'] = $row['TBLDAFTAR_GOLONGAN'] . '.' . sprintf('%07d', $row['TBLDAFTAR_NOPOK']) . '.' . sprintf('%02d', $row['TBLKECAMATAN_IDBADANUSAHA']) . '.' . sprintf('%02d', $row['TBLKELURAHAN_IDBADANUSAHA']);
			$dt['namabu'] = trim($row['TBLDAFTAR_BADANUSAHANAMA']);
			$dt['alamatbu'] = $row['TBLDAFTAR_BADANUSAHAALAMAT'];
			$dt['jenislapor'] = $row['TBLSETOR_JNSBAYAR'];
			$dt['thnpajak'] = $row['TBLPENDATAAN_THNPAJAK'];
			$dt['blnpajak'] = $row['TBLPENDATAAN_BLNPAJAK'];
			$dt['pajakke'] = $row['TBLPENDATAAN_PAJAKKE'];
			$dt['nossp'] = $row['TBLSETOR_NOMORSSPD'];
			$dt['koderek'] = $row['TBLSETOR_REKPENDAPATAN'].'.'.$row['TBLSETOR_REKPAD'].'.'.$row['TBLSETOR_REKPAJAK'].'.'.$row['TBLSETOR_REKAYAT'].'.'.$row['TBLSETOR_REKJENIS'];
			$dt['namarek'] = $row['TBLREKENING_NAMAREKENING'];
			$dt['tglsetor'] = '20'.sprintf('%02d', $row['TBLSETOR_THNSETOR']).'/'.sprintf('%02d', $row['TBLSETOR_BLNSETOR']).'/'.sprintf('%02d', $row['TBLSETOR_TGLSETOR']);
			$dt['rupiahsetor'] = LokalIndonesia::ribuan($row['TBLSETOR_RUPIAHSETOR']);

			$totalsetor += $row['TBLSETOR_RUPIAHSETOR'];
			$rekb4_total += $row['TBLSETOR_RUPIAHSETOR'];

			array_push($rows, $dt);

		endforeach;

		$utama['totalsetor'] = LokalIndonesia::ribuan($totalsetor);

		// echo CJSON::encode(array($rows, $utama));Yii::app()->end();

		// Merge data in the first sheet 
		// $npwpd = $data['TBLDAFTAR_NOPOK'];
		$namafileDL = "Cetak-Daftar-Setoran-WP-WR-{$tglsetor}.docx";
		$otbs->MergeBlock('row', $rows); 
		$otbs->MergeField('utama', $utama); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}
}
