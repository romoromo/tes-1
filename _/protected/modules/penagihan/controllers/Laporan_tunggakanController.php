<?php

class Laporan_tunggakanController extends Controller
{
	var $KODE_GOL = 2;
	var $PAJAK_AYAT = 4;
	var $PAJAK_REK = '4.1.1.4.0';
	var $MODULE_URL = 'penagihan/laporan_tunggakan';

	public function actionIndex()
	{
		$data['URL_APP'] = Yii::app()->getBaseUrl(true);
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionCari()
	{
		//$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		//$id_eksepsi = trim(isset($_REQUEST['id_eksepsi']) ? $_REQUEST['id_eksepsi'] : '', ',');
		$id_eksepsi = trim(isset($_REQUEST['id_eksepsi']) ? $_REQUEST['id_eksepsi'] : '', ',');
		// $TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
		$data['TBLDAFTREKLAME_THNSKPD'] = $TBLDAFTREKLAME_THNSKPD = substr($_REQUEST['TBLDAFTREKLAME_THNSKPD'], -2) ? substr($_REQUEST['TBLDAFTREKLAME_THNSKPD'], -2) : '';
		$TBLDAFTREKLAME_JNSREKLAME = !empty(DMOrcl::getRequest('TBLDAFTREKLAME_JNSREKLAME')) ? DMOrcl::getRequest('TBLDAFTREKLAME_JNSREKLAME') : '';
		$TBLDAFTREKLAME_ISJNSPENETAPAN = !empty(DMOrcl::getRequest('TBLDAFTREKLAME_ISJNSPENETAPAN')) ? DMOrcl::getRequest('TBLDAFTREKLAME_ISJNSPENETAPAN') : '';
		$TBLDAFTAR_NOPOK = !empty(DMOrcl::getRequest('TBLDAFTAR_NOPOK')) ? DMOrcl::getRequest('TBLDAFTAR_NOPOK') : '';
		$data['TBLDAFTREKLAME_BLNSKPDA'] = $TBLDAFTREKLAME_BLNSKPDA = !empty(DMOrcl::getRequest('TBLDAFTREKLAME_BLNSKPDA')) ? DMOrcl::getRequest('TBLDAFTREKLAME_BLNSKPDA') : '';
		$data['TBLDAFTREKLAME_BLNSKPDK'] = $TBLDAFTREKLAME_BLNSKPDK = !empty(DMOrcl::getRequest('TBLDAFTREKLAME_BLNSKPDK')) ? DMOrcl::getRequest('TBLDAFTREKLAME_BLNSKPDK') : '';
		$data['tglcutoff'] = $tglcutoff = !empty(DMOrcl::getRequest('tglcutoff')) && strtotime(DMOrcl::getRequest('tglcutoff')) ? date('Y-m-d', strtotime(DMOrcl::getRequest('tglcutoff'))) : '';
		
		if($TBLDAFTAR_NOPOK==''){
			$NOPOK = "";
		}
		else{
			$NOPOK = "AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK = ".$TBLDAFTAR_NOPOK."";
		}
		
		// if($TBLPENDATAAN_THNPAJAK==''){
		// 	$TAHUNPAJAK = "";
		// }
		// else{
		// 	$TAHUNPAJAK = "AND TBLPENDATAAN_THNPAJAK = ".$TBLPENDATAAN_THNPAJAK."";
		// }

		if($TBLDAFTREKLAME_JNSREKLAME==''){
			$JENISREK = "";
		}
		else{
			$JENISREK = "AND TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME = '$TBLDAFTREKLAME_JNSREKLAME'";
		}

		if($TBLDAFTREKLAME_ISJNSPENETAPAN==''){
			$ISJNSPENETAPAN = "";
		}
		else{
			$ISJNSPENETAPAN = "AND TBLDAFTREKLAME.TBLDAFTREKLAME_ISJNSPENETAPAN = '$TBLDAFTREKLAME_ISJNSPENETAPAN'";
		}

		if($TBLDAFTREKLAME_BLNSKPDA==''){
			$BLNSKPDA = "";
		}
		else{
			$BLNSKPDA = "AND TBLDAFTREKLAME_BLNSKPD >= ".$TBLDAFTREKLAME_BLNSKPDA."";
		}

		if($TBLDAFTREKLAME_BLNSKPDK==''){
			$BLNSKPDK = "";
		}
		else{
			$BLNSKPDK = "AND TBLDAFTREKLAME_BLNSKPD <= ".$TBLDAFTREKLAME_BLNSKPDK."";
		}

		if($TBLDAFTREKLAME_THNSKPD==''){
			$THNSKPD = "";
		}
		else{
			$THNSKPD = "AND TBLDAFTREKLAME_THNSKPD = ".$TBLDAFTREKLAME_THNSKPD."";
		}

		if(empty($tglcutoff)){
			$TGLCUTOFF = "";
		}
		else{
			$TGLCUTOFF = " 
			AND TO_DATE (
				CONCAT (
					TBLDAFTREKLAME_BLNSKPD,
					CONCAT (
						'/',
						CONCAT (TBLDAFTREKLAME_TGLSKPD, CONCAT('/', TBLDAFTREKLAME_THNSKPD))
						)
),
'MM/DD/YY'
) < TO_DATE('$tglcutoff', 'YYYY-MM-DD')
";
}


$select = "
SELECT
ROWNUM AS unik_id,
(
	SELECT
	TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
	FROM
	TBLDAFTAR
	WHERE
	TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK
	) AS TBLDAFTAR_BADANUSAHANAMA,
(
	SELECT
	TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
	FROM
	TBLDAFTAR
	WHERE
	TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK
	) AS TBLDAFTAR_BADANUSAHAALAMAT,
TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK,
TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK,
TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK,
TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE,
TBLDAFTREKLAME.TBLDAFTAR_GOLONGAN,
TBLDAFTREKLAME.TBLDAFTAR_NOPOK,
TBLDAFTREKLAME.TBLKECAMATAN_ID,
TBLDAFTREKLAME.TBLKELURAHAN_ID,
TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN1,
TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRI,
TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRI,
TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRI,
TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAK,
TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN2,
TBLDAFTREKLAME.TBLDAFTREKLAME_THNBATASSKPD,
TBLDAFTREKLAME.TBLDAFTREKLAME_BLNBATASSKPD,
TBLDAFTREKLAME.TBLDAFTREKLAME_TGLBATASSKPD,
TBLDAFTREKLAME.TBLDAFTREKLAME_NOMORSKPD,
TBLDAFTREKLAME.TBLDAFTREKLAME_URUTSKPD,
TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAKSKPD,
TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHSETOR,
TBLDAFTREKLAME.TBLDAFTREKLAME_THNSKPD,
TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSKPD,
TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSKPD,
TBLDAFTREKLAME.TBLDAFTREKLAME_REKJENIS,
TO_DATE (
	CONCAT (
		TBLDAFTREKLAME_BLNSKPD,
		CONCAT (
			'/',
			CONCAT (TBLDAFTREKLAME_TGLSKPD, CONCAT('/', TBLDAFTREKLAME_THNSKPD))
			)
),
'MM/DD/YY'
) AS Tanggal_ketetapan,
TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRISETOR,
TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRISETOR,
TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRISETOR,
TBLDAFTREKLAME.TBLDAFTREKLAME_REGSETOR,
TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHSETOR,
(
	CASE
	WHEN NVL (TBLDAFTREKLAME_PAJAKSKPD, 0) = 0 THEN
	'Menunggu SKPD Dicetak'
	WHEN NVL (TBLSETOR_NOMORSSPD, 0) = 0 THEN
	'SKPD Belum Dibayar'
	END
	) AS status
FROM
TBLDAFTREKLAME
LEFT JOIN TBLSETOR ON 
TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0)
AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0)
AND TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE = TBLSETOR.TBLPENDATAAN_PAJAKKE
AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
AND TBLSETOR.TBLSETOR_REKPAJAK = 1
AND NVL(TBLSETOR_JNSKETETAPAN,'-') = '-' 
WHERE
NVL (TBLDAFTREKLAME_PAJAK, 0) > 0
AND NVL (TBLDAFTREKLAME_PAJAKSKPD, 0) > 0
AND NVL (TBLSETOR_NOMORSSPD, 0) = 0
AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK <> 150000
".$NOPOK."
".$JENISREK."
".$ISJNSPENETAPAN."
".$THNSKPD."
".$BLNSKPDA."
".$BLNSKPDK."
"/*.$TAHUNPAJAK*/."
".$TGLCUTOFF."
ORDER BY
TBLDAFTREKLAME_BLNSKPD,
TBLDAFTAR_NOPOK";
$data['cari'] = Yii::app()->db->createCommand($select)->queryAll();



if (isset($_REQUEST['type']) && $_REQUEST['type']=='word') {
	$this->cetakDaftarWord($data);
	Yii::app()->end();
}
else if (isset($_REQUEST['type']) && $_REQUEST['type']=='excell') {
	$this->cetakDaftarExcell($data);
	Yii::app()->end();
}

$this->renderPartial('cari', array('data'=>$data));

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


public function cetakDaftarWord($data)
{		

	$jab_id = '23';
	$sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 8";	

	$sql2="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = ".$jab_id."";	

	$data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();
	$data['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();

	$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
	$namatpl = $path_tpl . 'LAPORAN TUNGGAKAN SKPD REKLAME.docx';
	$namafileDL = "Laporan Tunggakan Pajak Reklame.docx";

	Yii::import('ext.DMOpenTBS',true);
	Yii::import('ext.LokalIndonesia');
	DMOpenTBS::init();
	$otbs = new clsTinyButStrong;

			// Useful for debugging purposes. Displays the errors
	$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

		// Delete a sheet 
		// $otbs->PlugIn(OPENTBS_DELETE_SHEETS, 'Delete me'); 


		// Display a sheet (make it visible) 
		// $otbs->PlugIn(OPENTBS_DISPLAY_SHEETS, 'Display me'); 

		// Change the current sheet 
		// $otbs->PlugIn(OPENTBS_SELECT_SHEET, 2); 

		// A recordset for merging tables

		//INI CODING CETAK WORD KARTU


		// $this->cetakWordSKNPWPD($data);
		// Yii::app()->end();

		$utama = array();
		$rows = array();

		$no = 1;
		$jumlah=array('jumlah'=>0);
		$totalteguran = array('totalteguran'=>0);
		$totalnopok = array('totalnopok'=>0);
		$GLOBALS['tanggal_cutoff'] = strtotime($data['tglcutoff']) ? LokalIndonesia::TanggalUmum($data['tglcutoff']) : '';
		$GLOBALS['tanggal_akhir'] = strtotime($data['tglcutoff']) ? LokalIndonesia::TanggalUmum(date('Y', strtotime($data['tglcutoff'])).'-12-31') : '';
		$GLOBALS['tahun'] = ($data['TBLDAFTREKLAME_THNSKPD']+2000);
		$GLOBALS['bulana'] = !empty($data['TBLDAFTREKLAME_BLNSKPDA']) ? strtoupper(LokalIndonesia::getBulan($data['TBLDAFTREKLAME_BLNSKPDA'])) : '';
		$GLOBALS['bulank'] = !empty($data['TBLDAFTREKLAME_BLNSKPDK']) ? strtoupper(LokalIndonesia::getBulan($data['TBLDAFTREKLAME_BLNSKPDK'])) : '';
		$GLOBALS['jabatan1'] = $data['jab1']['TBLPEJABAT_URAIAN'];
		$GLOBALS['petugas1'] = $data['jab1']['TBLPEJABAT_NAMA'];
		$GLOBALS['nip1'] = $data['jab1']['TBLPEJABAT_NIP'];
		$GLOBALS['jabatan2'] = $data['jab2']['TBLPEJABAT_URAIAN'];
		$GLOBALS['petugas2'] = $data['jab2']['TBLPEJABAT_NAMA'];
		$GLOBALS['nip2'] = $data['jab2']['TBLPEJABAT_NIP'];
		if(!empty($data['TBLDAFTREKLAME_BLNSKPDA'])) {
			if ((int)$data['TBLDAFTREKLAME_BLNSKPDK']==(int)$data['TBLDAFTREKLAME_BLNSKPDA']) {
				$GLOBALS['bulan'] = $GLOBALS['bulana'] . ' ' . ($data['TBLDAFTREKLAME_THNSKPD']+2000);
			} else {
				$GLOBALS['bulan'] = $GLOBALS['bulana'] . ' s/d ' .$GLOBALS['bulank'] . ' ' . ($data['TBLDAFTREKLAME_THNSKPD']+2000);
			}
		}
		$GLOBALS['bulan'] = strtoupper($GLOBALS['bulan']);
		$GLOBALS['cutoff'] = strtoupper($GLOBALS['tanggal_cutoff']);
		$GLOBALS['datenow'] = date('d').' '.LokalIndonesia::getBulan(date('m')).' '.date('Y');

		foreach ($data['cari'] as $kolom) :
			$nomorNPWPD = $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$kolom['TBLKECAMATAN_ID'])) . '.' . (sprintf('%02d',$kolom['TBLKELURAHAN_ID']));
		$jatuhtempo = (sprintf('%02d',$kolom['TBLDAFTREKLAME_TGLBATASSKPD'])) . '-' . (sprintf('%02d',$kolom['TBLDAFTREKLAME_BLNBATASSKPD'])) . '-' . $kolom['TBLDAFTREKLAME_THNBATASSKPD'];
		$namaBU = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
		$alamatBU = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
		$jnopok = $kolom['TBLDAFTAR_NOPOK'] / $kolom['TBLDAFTAR_NOPOK'];

		$row['ket2'] = trim($kolom['TBLDAFTREKLAME_KETERANGAN2']);
		$row['ket1'] = trim($kolom['TBLDAFTREKLAME_KETERANGAN1']);
		$row['no'] = $no++;
		$row['thnpajak'] = trim($kolom['TBLPENDATAAN_THNPAJAK']) + 2000;
				// $row['tahun'] = '20'.trim($kolom['TBLPENDATAAN_THNPAJAK']);
		$row['lokasi'] = trim($kolom['TBLPENDATAAN_PAJAKKE']);
		$row['noskp'] = trim($kolom['TBLDAFTREKLAME_NOMORSKPD']);
		$row['lokasi'] = trim($kolom['TBLPENDATAAN_PAJAKKE']);
		$row['tglbatasskpd'] = $jatuhtempo;
		$row['pajak_rp'] = trim($kolom['TBLDAFTREKLAME_THNBATASSKPD']);
				// $totalno = $no++;
		$row['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_PAJAKSKPD']);
		$row['namawp'] = $namaBU;
		$row['alamat'] = $alamatBU;
				// $row['nopok'] = $nomorNPWPD;

		$row['rek'] = $kolom['TBLDAFTREKLAME_REKJENIS'];
		$row['kelid'] = $kolom['TBLKELURAHAN_ID'];
		$row['kecid'] = $kolom['TBLKECAMATAN_ID'];
		$row['gol'] = $kolom['TBLDAFTAR_GOLONGAN'];
		$row['nopok'] = $kolom['TBLDAFTAR_NOPOK'];

				// $totalwp['totalwp'] += $totalno; 
		$jumlah['jumlah'] +=trim($kolom['TBLDAFTREKLAME_PAJAKSKPD']);
		$totalteguran['totalteguran'] = $row['no'];
		$totalnopok['totalnopok'] = '';

		array_push($rows, $row);

		endforeach;
		$header=array();
		$header['totalpajak'] = LokalIndonesia::ribuan($jumlah['jumlah']);
		$header['jmlteguran'] = $totalteguran['totalteguran'];		
		$header['jmlwp'] = $totalnopok['totalnopok'];		
		$header['datenow'] = date('d').' '.LokalIndonesia::getBulan(date('m')).' '.date('Y');

				// debug
				// echo CJSON::encode($rows);Yii::app()->end();

			// Merge data in the first sheet 

		$otbs->MergeBlock('data', $rows); 
		$otbs->MergeField('header', $header);
				// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();

	}

	public function actionCetakExcell(){
		$id_eksepsi = trim(isset($_REQUEST['id_eksepsi']) ? $_REQUEST['id_eksepsi'] : '', ',');
		// $TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
		$data['TBLDAFTREKLAME_THNSKPD'] = $TBLDAFTREKLAME_THNSKPD = substr($_REQUEST['TBLDAFTREKLAME_THNSKPD'], -2) ? substr($_REQUEST['TBLDAFTREKLAME_THNSKPD'], -2) : '';
		$TBLDAFTREKLAME_JNSREKLAME = !empty(DMOrcl::getRequest('TBLDAFTREKLAME_JNSREKLAME')) ? DMOrcl::getRequest('TBLDAFTREKLAME_JNSREKLAME') : '';
		$TBLDAFTREKLAME_ISJNSPENETAPAN = !empty(DMOrcl::getRequest('TBLDAFTREKLAME_ISJNSPENETAPAN')) ? DMOrcl::getRequest('TBLDAFTREKLAME_ISJNSPENETAPAN') : '';
		$TBLDAFTAR_NOPOK = !empty(DMOrcl::getRequest('TBLDAFTAR_NOPOK')) ? DMOrcl::getRequest('TBLDAFTAR_NOPOK') : '';
		$data['TBLDAFTREKLAME_BLNSKPDA'] = $TBLDAFTREKLAME_BLNSKPDA = !empty(DMOrcl::getRequest('TBLDAFTREKLAME_BLNSKPDA')) ? DMOrcl::getRequest('TBLDAFTREKLAME_BLNSKPDA') : '';
		$data['TBLDAFTREKLAME_BLNSKPDK'] = $TBLDAFTREKLAME_BLNSKPDK = !empty(DMOrcl::getRequest('TBLDAFTREKLAME_BLNSKPDK')) ? DMOrcl::getRequest('TBLDAFTREKLAME_BLNSKPDK') : '';
		$data['tglcutoff'] = $tglcutoff = !empty(DMOrcl::getRequest('tglcutoff')) && strtotime(DMOrcl::getRequest('tglcutoff')) ? date('Y-m-d', strtotime(DMOrcl::getRequest('tglcutoff'))) : '';
		
		if($TBLDAFTAR_NOPOK==''){
			$NOPOK = "";
		}
		else{
			$NOPOK = "AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK = ".$TBLDAFTAR_NOPOK."";
		}
		
		// if($TBLPENDATAAN_THNPAJAK==''){
		// 	$TAHUNPAJAK = "";
		// }
		// else{
		// 	$TAHUNPAJAK = "AND TBLPENDATAAN_THNPAJAK = ".$TBLPENDATAAN_THNPAJAK."";
		// }

		if($TBLDAFTREKLAME_JNSREKLAME==''){
			$JENISREK = "";
		}
		else{
			$JENISREK = "AND TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME = '$TBLDAFTREKLAME_JNSREKLAME'";
		}

		if($TBLDAFTREKLAME_ISJNSPENETAPAN==''){
			$ISJNSPENETAPAN = "";
		}
		else{
			$ISJNSPENETAPAN = "AND TBLDAFTREKLAME.TBLDAFTREKLAME_ISJNSPENETAPAN = '$TBLDAFTREKLAME_ISJNSPENETAPAN'";
		}

		if($TBLDAFTREKLAME_BLNSKPDA==''){
			$BLNSKPDA = "";
		}
		else{
			$BLNSKPDA = "AND TBLDAFTREKLAME_BLNSKPD >= ".$TBLDAFTREKLAME_BLNSKPDA."";
		}

		if($TBLDAFTREKLAME_BLNSKPDK==''){
			$BLNSKPDK = "";
		}
		else{
			$BLNSKPDK = "AND TBLDAFTREKLAME_BLNSKPD <= ".$TBLDAFTREKLAME_BLNSKPDK."";
		}

		if($TBLDAFTREKLAME_THNSKPD==''){
			$THNSKPD = "";
		}
		else{
			$THNSKPD = "AND TBLDAFTREKLAME_THNSKPD = ".$TBLDAFTREKLAME_THNSKPD."";
		}

		if(empty($tglcutoff)){
			$TGLCUTOFF = "";
		}
		else{
			$TGLCUTOFF = " 
			AND TO_DATE (
				CONCAT (
					TBLDAFTREKLAME_BLNSKPD,
					CONCAT (
						'/',
						CONCAT (TBLDAFTREKLAME_TGLSKPD, CONCAT('/', TBLDAFTREKLAME_THNSKPD))
						)
		),
		'MM/DD/YY'
		) < TO_DATE('$tglcutoff', 'YYYY-MM-DD')
		";
		}


		$select = "
		SELECT
		ROWNUM AS unik_id,
		(
			SELECT
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
			FROM
			TBLDAFTAR
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK
			) AS TBLDAFTAR_BADANUSAHANAMA,
		(
			SELECT
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
			FROM
			TBLDAFTAR
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK
			) AS TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK,
		TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK,
		TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK,
		TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE,
		TBLDAFTREKLAME.TBLDAFTAR_GOLONGAN,
		TBLDAFTREKLAME.TBLDAFTAR_NOPOK,
		TBLDAFTREKLAME.TBLKECAMATAN_ID,
		TBLDAFTREKLAME.TBLKELURAHAN_ID,
		TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN1,
		TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRI,
		TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRI,
		TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRI,
		TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAK,
		TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN2,
		TBLDAFTREKLAME.TBLDAFTREKLAME_THNBATASSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_BLNBATASSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_TGLBATASSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_NOMORSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_URUTSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAKSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHSETOR,
		TBLDAFTREKLAME.TBLDAFTREKLAME_THNSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_REKJENIS,
		TO_DATE (
			CONCAT (
				TBLDAFTREKLAME_BLNSKPD,
				CONCAT (
					'/',
					CONCAT (TBLDAFTREKLAME_TGLSKPD, CONCAT('/', TBLDAFTREKLAME_THNSKPD))
					)
		),
		'MM/DD/YY'
		) AS Tanggal_ketetapan,
		TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRISETOR,
		TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRISETOR,
		TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRISETOR,
		TBLDAFTREKLAME.TBLDAFTREKLAME_REGSETOR,
		TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHSETOR,
		(
			CASE
			WHEN NVL (TBLDAFTREKLAME_PAJAKSKPD, 0) = 0 THEN
			'Menunggu SKPD Dicetak'
			WHEN NVL (TBLDAFTREKLAME_RUPIAHSETOR, 0) = 0 THEN
			'SKPD Belum Dibayar'
			END
			) AS status
		FROM
		TBLDAFTREKLAME
		WHERE
		NVL (TBLDAFTREKLAME_PAJAK, 0) > 0
		AND NVL (TBLDAFTREKLAME_PAJAKSKPD, 0) > 0
		AND NVL (TBLDAFTREKLAME_RUPIAHSETOR, 0) = 0
		AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK <> 150000
		".$NOPOK."
		".$JENISREK."
		".$ISJNSPENETAPAN."
		".$THNSKPD."
		".$BLNSKPDA."
		".$BLNSKPDK."
		"/*.$TAHUNPAJAK*/."
		".$TGLCUTOFF."
		ORDER BY
		TBLDAFTREKLAME_BLNSKPD,
		TBLDAFTAR_NOPOK";
		$data['cari'] = Yii::app()->db->createCommand($select)->queryAll();

		if (isset($_REQUEST['type']) AND ($_REQUEST['type'])=='excell') {
			header('Content-Type: application/excel');
			header("Content-Disposition: attachment;Filename=laporan-tunggakan-reklame.xls");
		}

		$this->renderPartial('cetakdaftar', array('data'=>$data));
		}
		

		public function actionCetakExcell2(){
		$id_eksepsi = trim(isset($_REQUEST['id_eksepsi']) ? $_REQUEST['id_eksepsi'] : '', ',');
		// $TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
		$data['TBLDAFTREKLAME_THNSKPD'] = $TBLDAFTREKLAME_THNSKPD = substr($_REQUEST['TBLDAFTREKLAME_THNSKPD'], -2) ? substr($_REQUEST['TBLDAFTREKLAME_THNSKPD'], -2) : '';
		$TBLDAFTREKLAME_JNSREKLAME = !empty(DMOrcl::getRequest('TBLDAFTREKLAME_JNSREKLAME')) ? DMOrcl::getRequest('TBLDAFTREKLAME_JNSREKLAME') : '';
		$TBLDAFTREKLAME_ISJNSPENETAPAN = !empty(DMOrcl::getRequest('TBLDAFTREKLAME_ISJNSPENETAPAN')) ? DMOrcl::getRequest('TBLDAFTREKLAME_ISJNSPENETAPAN') : '';
		$TBLDAFTAR_NOPOK = !empty(DMOrcl::getRequest('TBLDAFTAR_NOPOK')) ? DMOrcl::getRequest('TBLDAFTAR_NOPOK') : '';
		$data['TBLDAFTREKLAME_BLNSKPDA'] = $TBLDAFTREKLAME_BLNSKPDA = !empty(DMOrcl::getRequest('TBLDAFTREKLAME_BLNSKPDA')) ? DMOrcl::getRequest('TBLDAFTREKLAME_BLNSKPDA') : '';
		$data['TBLDAFTREKLAME_BLNSKPDK'] = $TBLDAFTREKLAME_BLNSKPDK = !empty(DMOrcl::getRequest('TBLDAFTREKLAME_BLNSKPDK')) ? DMOrcl::getRequest('TBLDAFTREKLAME_BLNSKPDK') : '';
		$data['tglcutoff'] = $tglcutoff = !empty(DMOrcl::getRequest('tglcutoff')) && strtotime(DMOrcl::getRequest('tglcutoff')) ? date('Y-m-d', strtotime(DMOrcl::getRequest('tglcutoff'))) : '';
		
		if($TBLDAFTAR_NOPOK==''){
			$NOPOK = "";
		}
		else{
			$NOPOK = "AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK = ".$TBLDAFTAR_NOPOK."";
		}
		
		// if($TBLPENDATAAN_THNPAJAK==''){
		// 	$TAHUNPAJAK = "";
		// }
		// else{
		// 	$TAHUNPAJAK = "AND TBLPENDATAAN_THNPAJAK = ".$TBLPENDATAAN_THNPAJAK."";
		// }

		if($TBLDAFTREKLAME_JNSREKLAME==''){
			$JENISREK = "";
		}
		else{
			$JENISREK = "AND TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME = '$TBLDAFTREKLAME_JNSREKLAME'";
		}

		if($TBLDAFTREKLAME_ISJNSPENETAPAN==''){
			$ISJNSPENETAPAN = "";
		}
		else{
			$ISJNSPENETAPAN = "AND TBLDAFTREKLAME.TBLDAFTREKLAME_ISJNSPENETAPAN = '$TBLDAFTREKLAME_ISJNSPENETAPAN'";
		}

		if($TBLDAFTREKLAME_BLNSKPDA==''){
			$BLNSKPDA = "";
		}
		else{
			$BLNSKPDA = "AND TBLDAFTREKLAME_BLNSKPD >= ".$TBLDAFTREKLAME_BLNSKPDA."";
		}

		if($TBLDAFTREKLAME_BLNSKPDK==''){
			$BLNSKPDK = "";
		}
		else{
			$BLNSKPDK = "AND TBLDAFTREKLAME_BLNSKPD <= ".$TBLDAFTREKLAME_BLNSKPDK."";
		}

		if($TBLDAFTREKLAME_THNSKPD==''){
			$THNSKPD = "";
		}
		else{
			$THNSKPD = "AND TBLDAFTREKLAME_THNSKPD = ".$TBLDAFTREKLAME_THNSKPD."";
		}

		if(empty($tglcutoff)){
			$TGLCUTOFF = "";
		}
		else{
			$TGLCUTOFF = " 
			AND TO_DATE (
				CONCAT (
					TBLDAFTREKLAME_BLNSKPD,
					CONCAT (
						'/',
						CONCAT (TBLDAFTREKLAME_TGLSKPD, CONCAT('/', TBLDAFTREKLAME_THNSKPD))
						)
		),
		'MM/DD/YY'
		) < TO_DATE('$tglcutoff', 'YYYY-MM-DD')
		";
		}


		$select = "
		SELECT
		ROWNUM AS unik_id,
		(
			SELECT
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
			FROM
			TBLDAFTAR
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK
			) AS TBLDAFTAR_BADANUSAHANAMA,
		(
			SELECT
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
			FROM
			TBLDAFTAR
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK
			) AS TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK,
		TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK,
		TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK,
		TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE,
		TBLDAFTREKLAME.TBLDAFTAR_GOLONGAN,
		TBLDAFTREKLAME.TBLDAFTAR_NOPOK,
		TBLDAFTREKLAME.TBLKECAMATAN_ID,
		TBLDAFTREKLAME.TBLKELURAHAN_ID,
		TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN1,
		TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRI,
		TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRI,
		TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRI,
		TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAK,
		TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN2,
		TBLDAFTREKLAME.TBLDAFTREKLAME_THNBATASSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_BLNBATASSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_TGLBATASSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_NOMORSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_URUTSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAKSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHSETOR,
		TBLDAFTREKLAME.TBLDAFTREKLAME_THNSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_REKJENIS,
		TO_DATE (
			CONCAT (
				TBLDAFTREKLAME_BLNSKPD,
				CONCAT (
					'/',
					CONCAT (TBLDAFTREKLAME_TGLSKPD, CONCAT('/', TBLDAFTREKLAME_THNSKPD))
					)
		),
		'MM/DD/YY'
		) AS Tanggal_ketetapan,
		TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRISETOR,
		TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRISETOR,
		TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRISETOR,
		TBLDAFTREKLAME.TBLDAFTREKLAME_REGSETOR,
		TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHSETOR,
		(
			CASE
			WHEN NVL (TBLDAFTREKLAME_RUPIAHSETOR, 0) <> 0 THEN
			'SKPD Sudah Dibayar'
			WHEN NVL (TBLDAFTREKLAME_RUPIAHSETOR, 0) = 0 THEN
			'SKPD Belum Dibayar'
			END
			) AS status
		FROM
		TBLDAFTREKLAME
		WHERE
		NVL (TBLDAFTREKLAME_PAJAK, 0) > 0
		AND NVL (TBLDAFTREKLAME_PAJAKSKPD, 0) > 0
		AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK <> 150000
		".$NOPOK."
		".$JENISREK."
		".$ISJNSPENETAPAN."
		".$THNSKPD."
		".$BLNSKPDA."
		".$BLNSKPDK."
		"/*.$TAHUNPAJAK*/."
		".$TGLCUTOFF."
		ORDER BY
		TBLDAFTREKLAME_BLNSKPD,
		TBLDAFTAR_NOPOK";
		$data['cari'] = Yii::app()->db->createCommand($select)->queryAll();

		if (isset($_REQUEST['type']) AND ($_REQUEST['type'])=='excell2') {
			header('Content-Type: application/excel');
			header("Content-Disposition: attachment;Filename=laporan-kendali-reklame.xls");
		}

		$this->renderPartial('cetakdaftar2', array('data'=>$data));
		}
		}
