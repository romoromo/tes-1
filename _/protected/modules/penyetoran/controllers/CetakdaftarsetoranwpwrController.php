<?php

class CetakdaftarsetoranwpwrController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}


	public function actionCetak()
	{
		$data=array();
		$data['tahun'] = $tahun = (int)substr($_REQUEST['tahun'], -2) ? (int)substr($_REQUEST['tahun'], -2) : '' ;
		$data['bulan'] = $bulan = (int)$_REQUEST['bulan'] ? (int)$_REQUEST['bulan'] : '' ;
		$data['tgl'] = $tgl = (int)$_REQUEST['tgl'] ? (int)$_REQUEST['tgl'] : '' ;
		$data['carabyr'] = $carabyr = $_REQUEST['carabyr'] ? $_REQUEST['carabyr'] : '' ;

		if($carabyr==''){
			$carabayar = "";
		}
		else{
			$carabayar = "AND TBLSETOR.TBLSETOR_CARABAYAR = '$carabyr'";
		}

		if($tgl==''){
			$tglbayar = "";
		}
		else{
			$tglbayar = "AND TBLSETOR.TBLSETOR_TGLSETOR = ".$tgl."";
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
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS,
		TBLSETOR.TBLSETOR_REKSUBJENIS,
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
		(
		SELECT
		TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
		TBLREKENING
		WHERE
		TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLSETOR.TBLSETOR_REKJENIS
		) AS TBLREKENING_NAMAREKENING
		FROM
		TBLSETOR
		LEFT JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		AND TBLSETOR.TBLSETOR_GOLONGAN = TBLDAFTAR.TBLDAFTAR_GOLONGAN
		AND TBLSETOR.TBLDAFTAR_JNSPENDAPATAN = TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN
		WHERE
		TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
		AND TBLSETOR.TBLSETOR_THNSETOR = ".$tahun."
		AND TBLSETOR.TBLSETOR_BLNSETOR = ".$bulan."
		".$tglbayar."
		".$carabayar."
		AND TBLSETOR.TBLSETOR_STATUSBAYAR <> 20
		AND TRIM (TBLSETOR_JNSBAYAR) <> 'BNG SK-A'
		ORDER BY
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS,
		TBLSETOR.TBLDAFTAR_NOPOK
		";
		// Yii::app()->end();
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
		
		foreach ($data['hasil'] as $row) :

			$dt['no'] = $no++;
			$dt['npwpd'] = $row['TBLDAFTAR_GOLONGAN'] . '.' . sprintf('%07d', $row['TBLDAFTAR_NOPOK']) . '.' . sprintf('%02d', $row['TBLKECAMATAN_IDBADANUSAHA']) . '.' . sprintf('%02d', $row['TBLKELURAHAN_IDBADANUSAHA']);
			$dt['namabu'] = $row['TBLDAFTAR_BADANUSAHANAMA'];
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

		array_push($rows, $dt);

		endforeach;

		$utama['totalsetor'] = LokalIndonesia::ribuan($totalsetor);

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
