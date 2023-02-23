<?php

class TeguranairtanahController extends Controller
{
	public function actionIndex()
	{
		$data['URL_APP'] = Yii::app()->getBaseUrl(true);		
		$this->renderPartial('index', array('data'=>$data));
	}
	public function actionCari()
	{
		
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '' ;
		$TBLPENDATAAN_THNPAJAKA =  substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'] , -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'] , -2) : '' ;
		$TBLPENDATAAN_THNPAJAKK =  substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'] , -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'] , -2) : '' ; 

		$tunggak2 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) + 1;
		$tunggak3 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) + 2;
		$tunggak4 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) + 3;

		$select="SELECT
		*
		FROM
		(
			SELECT
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
			SUM (
				CASE
				WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
				AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
				AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = '$TBLPENDATAAN_THNPAJAKA' THEN
				NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS tunggakan1,
			SUM (
				CASE
				WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
				AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
				AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = '$tunggak2' THEN
				NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS tunggakan2,
			SUM (
				CASE
				WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
				AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
				AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = '$tunggak3' THEN
				NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS tunggakan3,
			SUM (
				CASE
				WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
				AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
				AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = '$tunggak4' THEN
				NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS tunggakan4,
			SUM (
				CASE
				WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
				AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
				AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = '$TBLPENDATAAN_THNPAJAKK' THEN
				NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS tunggakan5,
			SUM (
				CASE
				WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
				AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
				AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK BETWEEN '$TBLPENDATAAN_THNPAJAKA'
				AND '$TBLPENDATAAN_THNPAJAKK' THEN
				NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS TOTAL
			FROM
			TBLDAFTTANAH
			INNER JOIN TBLDAFTAR ON TBLDAFTTANAH.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
			WHERE
			TBLDAFTTANAH_THNSKPD BETWEEN '$TBLPENDATAAN_THNPAJAKA'
			AND '$TBLPENDATAAN_THNPAJAKK'
			AND TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD <> 0
			GROUP BY
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
			ORDER BY
			TBLDAFTAR_NOPOK
			) A
			WHERE
			TOTAL > 0
			ORDER BY
			TOTAL DESC";

$data['cari'] = $cari = Yii::app()->db->createCommand($select)->queryAll();

$this->renderPartial('cari', array('data'=>$data));
}

public function actionautocomplete()
{
	header('Content-type: text/json');
	header('Content-type: application/json');

	$query = trim($_REQUEST['query']);

	$select = '*';
	$from = 'TBLDAFTAR';
	$filter = array(
		'LK__TBLDAFTAR_PEMILIKNAMA' => $query
		,'LK__TBLDAFTAR_NOPOK' => $query
		);

	$otherquery = array(
		'limit'=> 30
		,'order'=> 'TBLDAFTAR_NOPOK ASC'
		);

	$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
	$results = DBFetch::query($arrayConfig);

	$suggestions = array();

	foreach($results as $result)
	{
		$suggestions[] = array(
			"value" => $result['TBLDAFTAR_NOPOK']. ' | ' . $result['TBLDAFTAR_BADANUSAHANAMA']
			,"data" => $result['TBLDAFTAR_NOPOK']
			,"TBLDAFTAR_PEMILIKNAMA" => $result['TBLDAFTAR_PEMILIKNAMA']
			,"TBLDAFTAR_PEMILIKALAMAT" => $result['TBLDAFTAR_PEMILIKALAMAT']
			,"TBLDAFTAR_BADANUSAHANAMA" => $result['TBLDAFTAR_BADANUSAHANAMA']
			,"TBLDAFTAR_BADANUSAHAALAMAT" => $result['TBLDAFTAR_BADANUSAHAALAMAT']
			,"TBLDAFTAR_NOPOK" => $result['TBLDAFTAR_NOPOK']
			);
	}


	echo CJSON::encode(array('suggestions' => $suggestions));
}

public function actioncetakWord() 
{
	$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
	$namatpl = $path_tpl . 'Temp_TeguranAT.docx';
	$namafileDL = "Surat Teguran Air Tanah.docx";

	Yii::import('ext.DMOpenTBS',true);
	Yii::import('ext.LokalIndonesia');
	DMOpenTBS::init();
	$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
	$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '' ;
		$no_surat = $_REQUEST['no_surat'] ? $_REQUEST['no_surat'] : '' ;
		$tglawal = $_REQUEST['tglawal'] ? $_REQUEST['tglawal'] : '' ;
		$tglakhir = $_REQUEST['tglakhir'] ? $_REQUEST['tglakhir'] : '' ;
		$TBLPENDATAAN_THNPAJAKA =  substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'] , -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'] , -2) : '' ;
		$TBLPENDATAAN_THNPAJAKK =  substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'] , -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'] , -2) : '' ; 

		$tunggak2 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) + 1;
		$tunggak3 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) + 2;
		$tunggak4 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) + 3;		

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


				$query .= 
				$flag . 
				"SELECT
				TBLDAFTAR.TBLDAFTAR_NOPOK,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
				BULAN_NAMA AS BULAN,
				TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
				TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
				TBLDAFTAR.TBLDAFTAR_GOLONGAN,
				TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
				CONCAT (
					TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
					CONCAT (
						'.',
						CONCAT (
							TBLDAFTAR.TBLDAFTAR_GOLONGAN,
							CONCAT (
								'.',
								CONCAT (
									TBLDAFTAR.TBLDAFTAR_NOPOK,
									CONCAT (
										'.',
										CONCAT (
											TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
											CONCAT ('.', CONCAT(TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA, ''))
											)
											)
											)
											)
											)
											)
											) AS NPWP,
											SUM (
												CASE
												WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
												AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
												AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = ".$TBLPENDATAAN_THNPAJAKA." THEN
												NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
												ELSE
												0
												END
												) AS tunggakan1,
											SUM (
												CASE
												WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
												AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
												AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = ".$tunggak2." THEN
												NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
												ELSE
												0
												END
												) AS tunggakan2,
											SUM (
												CASE
												WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
												AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
												AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = ".$tunggak3." THEN
												NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
												ELSE
												0
												END
												) AS tunggakan3,
											SUM (
												CASE
												WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
												AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
												AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = ".$tunggak4." THEN
												NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
												ELSE
												0
												END
												) AS tunggakan4,
											SUM (
												CASE
												WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
												AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
												AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = ".$TBLPENDATAAN_THNPAJAKK." THEN
												NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
												ELSE
												0
												END
												) AS tunggakan5,
											SUM (
												CASE
												WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
												AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
												AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
												AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK BETWEEN ".$TBLPENDATAAN_THNPAJAKA."
												AND ".$TBLPENDATAAN_THNPAJAKK." THEN
												NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
												ELSE
												0
												END
												) AS TOTAL
											FROM
											TBLDAFTTANAH
											INNER JOIN TBLDAFTAR ON TBLDAFTTANAH.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
											RIGHT JOIN BULAN ON TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK = BULAN.BULAN_ID
											WHERE
											TBLPENDATAAN_THNPAJAK BETWEEN ".$TBLPENDATAAN_THNPAJAKA."
											AND ".$TBLPENDATAAN_THNPAJAKK."
											AND TBLDAFTTANAH.TBLDAFTAR_NOPOK  IN (".$nopok.")
											GROUP BY
											TBLDAFTAR.TBLDAFTAR_NOPOK,
											BULAN_ID,
											TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
											TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
											BULAN_NAMA,
											TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
											TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
											TBLDAFTAR.TBLDAFTAR_GOLONGAN,
											TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN
																		
											";
											$flag = '
											UNION
											';
											}
}
									// 		ORDER BY
									// 		TBLDAFTAR.TBLDAFTAR_NOPOK,
									// 		BULAN_ID,
									// 		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
									// TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,									
$order = "
		BULAN_ID,
		BULAN_NAMA ASC";
		
$data['cetak'] = Yii::app()->db->createCommand($query, $order)->queryAll();


$utama = array();
$halaman = array();
$rows = array();
$row = array();

$tanggalsurat = date('d') . ' ' . LokalIndonesia::getBulan(date('m')) . ' ' . date('Y');

$GLOBALS['now'] = $tanggalsurat;
$GLOBALS['tglawal'] = $_REQUEST['tglawal'];
$GLOBALS['tglakhir'] = $_REQUEST['tglakhir'];
$GLOBALS['no_surat'] = $_REQUEST['no_surat'];
$GLOBALS['1'] = $_REQUEST['TBLPENDATAAN_THNPAJAKA'];
$GLOBALS['2'] = $_REQUEST['TBLPENDATAAN_THNPAJAKA'] + 1;
$GLOBALS['3'] = $_REQUEST['TBLPENDATAAN_THNPAJAKA'] + 2;
$GLOBALS['4'] = $_REQUEST['TBLPENDATAAN_THNPAJAKA'] + 3;
$GLOBALS['5'] = $_REQUEST['TBLPENDATAAN_THNPAJAKK'];
// $total1 = array('total1'=>0);
// $total2 = array('total2'=>0);
// $total3 = array('total3'=>0);
// $total4 = array('total4'=>0);
// $total5 = array('total5'=>0);
// foreach ($data['cetak'] as $page) :
// 	$halaman['noo'] = "";
	 


// array_push($rows, $halaman);
// endforeach;

$no = 1;
foreach ($data['cetak'] as $kolom) :
	$namaBU = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
	$alamatBU = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
	$nomorNPWPD = $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$kolom['TBLKECAMATAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$kolom['TBLKELURAHAN_IDBADANUSAHA']));

	// $utama['noo'] = null;
	$utama['no'] = $no++;
	$utama['bulan'] = trim($kolom['BULAN']);
	$utama['th1'] = LokalIndonesia::ribuan($kolom['TUNGGAKAN1']);
	$utama['th2'] = LokalIndonesia::ribuan($kolom['TUNGGAKAN2']);
	$utama['th3'] = LokalIndonesia::ribuan($kolom['TUNGGAKAN3']);
	$utama['th4'] = LokalIndonesia::ribuan($kolom['TUNGGAKAN4']);
	$utama['th5'] = LokalIndonesia::ribuan($kolom['TUNGGAKAN5']);

	// $total1['total1'] += trim($kolom['TUNGGAKAN1']);
	// $total2['total2'] += trim($kolom['TUNGGAKAN2']);
	// $total3['total3'] += trim($kolom['TUNGGAKAN3']);
	// $total4['total4'] += trim($kolom['TUNGGAKAN4']);
	// $total5['total5'] += trim($kolom['TUNGGAKAN5']);


array_push($row, $utama);
endforeach;

$header=array();
$header['wp_nama'] = $namaBU;
$header['wp_alamat'] = $alamatBU;
$header['datenow'] = $tanggalsurat;
$header['wp_npwpd'] = $nomorNPWPD;
// $header['jumlah1'] = LokalIndonesia::ribuan($total1['total1']) ;
// $header['jumlah2'] = LokalIndonesia::ribuan($total2['total2']) ;
// $header['jumlah3'] = LokalIndonesia::ribuan($total3['total3']) ;
// $header['jumlah4'] = LokalIndonesia::ribuan($total4['total4']) ;
// $header['jumlah5'] = LokalIndonesia::ribuan($total5['total5']) ;


$otbs->MergeBlock('utama', $row); 
// $otbs->MergeBlock('halaman', $rows); 
$otbs->MergeField('header', $header);
			// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template
// var_dump($data['cetak']);die();
// echo json_encode($data);Yii::app()->end();
$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
Yii::app()->end();


}	
public function actionCetak()
{

	$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '' ;
	$TBLPENDATAAN_THNPAJAKA =  substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'] , -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'] , -2) : '' ;
	$TBLPENDATAAN_THNPAJAKK =  substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'] , -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'] , -2) : '' ; 

	$tunggak2 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) + 1;
	$tunggak3 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) + 2;
	$tunggak4 = substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) + 3;

	$select="SELECT
	*
	FROM
	(
		SELECT
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		SUM (
			CASE
			WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
			AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
			AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
			AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
			AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
			AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = '$TBLPENDATAAN_THNPAJAKA' THEN
			NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
			ELSE
			0
			END
			) AS tunggakan1,
			SUM (
				CASE
				WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
				AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
				AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = '$tunggak2' THEN
				NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS tunggakan2,
			SUM (
				CASE
				WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
				AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
				AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = '$tunggak3' THEN
				NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS tunggakan3,
			SUM (
				CASE
				WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
				AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
				AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = '$tunggak4' THEN
				NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS tunggakan4,
			SUM (
				CASE
				WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
				AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
				AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = '$TBLPENDATAAN_THNPAJAKK' THEN
				NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS tunggakan5,
			SUM (
				CASE
				WHEN NVL (TBLDAFTTANAH_BLNSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_TGLSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_PAJAKSKPD, 0) <> 0
				AND NVL (TBLDAFTTANAH_NOMORSKPD, '0') <> '0'
				AND NVL (TBLDAFTTANAH_TAHUNSETOR, '0') = '0'
				AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK BETWEEN '$TBLPENDATAAN_THNPAJAKA'
				AND '$TBLPENDATAAN_THNPAJAKK' THEN
				NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
				ELSE
				0
				END
				) AS TOTAL
			FROM
			TBLDAFTTANAH
			INNER JOIN TBLDAFTAR ON TBLDAFTTANAH.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
			WHERE
			TBLDAFTTANAH_THNSKPD BETWEEN '$TBLPENDATAAN_THNPAJAKA'
			AND '$TBLPENDATAAN_THNPAJAKK'
			AND TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD <> 0
			GROUP BY
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
			ORDER BY
			TBLDAFTAR_NOPOK
			) A
			WHERE
			TOTAL > 0
			ORDER BY
			TOTAL DESC";

			$data['cari'] = $cari = Yii::app()->db->createCommand($select)->queryAll();

			if (isset($_REQUEST['jenis']) AND ($_REQUEST['jenis'])=='excel') {
				header('Content-Type: application/excel');
				header("Content-Disposition: attachment;Filename=Cetak-Jenis.xls");
			}
				
		$this->renderPartial('cetakdaftar', array('data'=>$data));
}
		# code...


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