<?php

class TeguranreklameController extends Controller
{
	var $KODE_GOL = 2;
	var $PAJAK_AYAT = 4;
	var $PAJAK_REK = '4.1.1.4.0';
	var $MODULE_URL = 'penagihan/Teguranreklame';

	public function actionIndex()
	{
		$data['URL_APP'] = Yii::app()->getBaseUrl(true);
		$this->renderPartial('index', array('data'=>$data));
	}
	
// 	public function actionCari()
// 	{
// 		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '0';
// 		$TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '0';
// 		$TBLDAFTREKLAME_JNSREKLAME = $_REQUEST['TBLDAFTREKLAME_JNSREKLAME'] ? $_REQUEST['TBLDAFTREKLAME_JNSREKLAME'] : '0';

// 		$sql="		SELECT

// 		(
// 			SELECT
// 			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
// 			FROM
// 			TBLDAFTAR
// 			WHERE
// 			TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK
// 			) AS TBLDAFTAR_BADANUSAHANAMA,
// (
// 	SELECT
// 	TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
// 	FROM
// 	TBLDAFTAR
// 	WHERE
// 	TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK
// 	) AS TBLDAFTAR_BADANUSAHAALAMAT,
// TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK,
// TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK,
// TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK,
// TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE,
// TBLDAFTREKLAME.TBLDAFTAR_GOLONGAN,
// TBLDAFTREKLAME.TBLDAFTAR_NOPOK,
// TBLDAFTREKLAME.TBLKECAMATAN_ID,
// TBLDAFTREKLAME.TBLKELURAHAN_ID,
// TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRI,
// TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRI,
// TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRI,
// TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAK,
// TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN2,
// TBLDAFTREKLAME.TBLDAFTREKLAME_THNBATASSKPD,
// TBLDAFTREKLAME.TBLDAFTREKLAME_BLNBATASSKPD,
// TBLDAFTREKLAME.TBLDAFTREKLAME_TGLBATASSKPD,
// TBLDAFTREKLAME.TBLDAFTREKLAME_NOMORSKPD,
// TBLDAFTREKLAME.TBLDAFTREKLAME_URUTSKPD,
// TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAKSKPD,
// TBLDAFTREKLAME.TBLDAFTREKLAME_THNSKPD,
// TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSKPD,
// TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSKPD,
// TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRISETOR,
// TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRISETOR,
// TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRISETOR,
// TBLDAFTREKLAME.TBLDAFTREKLAME_REGSETOR,
// TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHSETOR,
// (
// 	CASE
// 	WHEN NVL (TBLDAFTREKLAME_PAJAKSKPD, 0) = 0 THEN
// 	'Menunggu SKPD Dicetak'
// 	WHEN NVL (TBLDAFTREKLAME_RUPIAHSETOR, 0) = 0 THEN
// 	'SKPD Belum Dibayar'
// 	END
// 	) AS status
// FROM
// TBLDAFTREKLAME
// WHERE
// NVL (TBLDAFTREKLAME_PAJAK, 0) > 0
// AND NVL (TBLDAFTREKLAME_PAJAKSKPD, 0) > 0
// AND NVL (TBLDAFTREKLAME_RUPIAHSETOR, 0) = 0
// AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK = '$TBLDAFTAR_NOPOK'
// AND TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME = '$TBLDAFTREKLAME_JNSREKLAME'
// AND TBLPENDATAAN_THNPAJAK = '$TBLPENDATAAN_THNPAJAK'
// ORDER BY
// TBLDAFTAR_NOPOK,
// TBLDAFTREKLAME_THNSPTPD,
// TBLDAFTREKLAME_BLNSPTPD,
// TBLDAFTREKLAME_TGLSPTPD,
// TBLPENDATAAN_THNPAJAK,
// TBLPENDATAAN_BLNPAJAK,
// TBLPENDATAAN_TGLPAJAK
// ";

// $data['cari'] = $cari = Yii::app()->db->createCommand($sql)->queryAll();

// $this->renderPartial('cari',array('data'=>$data));

//}

	public function actionCari()
	{
		//$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		//$id_eksepsi = trim(isset($_REQUEST['id_eksepsi']) ? $_REQUEST['id_eksepsi'] : '', ',');

		
		// $tglawal = $_REQUEST['tglawal'] ? $_REQUEST['tglawal'] : '';
		// $tglakhir = $_REQUEST['tglakhir'] ? $_REQUEST['tglakhir'] : '';
		$id_eksepsi = trim(isset($_REQUEST['id_eksepsi']) ? $_REQUEST['id_eksepsi'] : '', ',');
		$TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
		$TBLDAFTREKLAME_THNSKPD = substr($_REQUEST['TBLDAFTREKLAME_THNSKPD'], -2) ? substr($_REQUEST['TBLDAFTREKLAME_THNSKPD'], -2) : '';
		$TBLDAFTREKLAME_JNSREKLAME = !empty(DMOrcl::getRequest('TBLDAFTREKLAME_JNSREKLAME')) ? DMOrcl::getRequest('TBLDAFTREKLAME_JNSREKLAME') : '';
		$TBLDAFTAR_NOPOK = !empty(DMOrcl::getRequest('TBLDAFTAR_NOPOK')) ? DMOrcl::getRequest('TBLDAFTAR_NOPOK') : '';
		$TBLDAFTREKLAME_BLNSKPDA = !empty(DMOrcl::getRequest('TBLDAFTREKLAME_BLNSKPDA')) ? DMOrcl::getRequest('TBLDAFTREKLAME_BLNSKPDA') : '';
		$TBLDAFTREKLAME_BLNSKPDK = !empty(DMOrcl::getRequest('TBLDAFTREKLAME_BLNSKPDK')) ? DMOrcl::getRequest('TBLDAFTREKLAME_BLNSKPDK') : '';
		$tglcutoff = !empty(DMOrcl::getRequest('tglcutoff')) && strtotime(DMOrcl::getRequest('tglcutoff')) ? date('Y-m-d', strtotime(DMOrcl::getRequest('tglcutoff'))) : '';
		
		if($TBLDAFTAR_NOPOK==''){
			$NOPOK = "";
		}
		else{
			$NOPOK = "AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK = ".$TBLDAFTAR_NOPOK."";
		}
		
		if($TBLPENDATAAN_THNPAJAK==''){
			$TAHUNPAJAK = "";
		}
		else{
			$TAHUNPAJAK = "AND TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK = ".$TBLPENDATAAN_THNPAJAK."";
		}

		if($TBLDAFTREKLAME_JNSREKLAME==''){
			$JENISREK = "";
		}
		else{
			$JENISREK = "AND TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME = '$TBLDAFTREKLAME_JNSREKLAME'";
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
		".$NOPOK."
		".$JENISREK."
		".$THNSKPD."
		".$BLNSKPDA."
		".$BLNSKPDK."
		".$TAHUNPAJAK."
		".$TGLCUTOFF."
		ORDER BY
			TBLDAFTREKLAME.TBLDAFTAR_NOPOK,
			TBLDAFTREKLAME_THNSPTPD,
			TBLDAFTREKLAME_BLNSPTPD,
			TBLDAFTREKLAME_TGLSPTPD,
			TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK,
			TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK,
			TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK";
		$data['cari'] = Yii::app()->db->createCommand($select)->queryAll();

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

public function actioncetakWordReklame()
{
	$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
	// $namatpl = $path_tpl . 'Temp_Teguranrek.docx';
	$namatpl = $path_tpl . 'Temp_TeguranRekl.docx';
	// 2021-11-26 13:40 ganti tanpa header & footer
	$namatpl = $path_tpl . 'Temp_TeguranRekl-no-head-foot.docx';
	// 2022-02-03 09:40 minta dibalikin lagi dengan header & footer
	$namatpl = $path_tpl . 'Temp_TeguranRekl.docx';
	$namafileDL = "Surat Teguranrek.docx";

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

		// Delete a sheet 
		// $otbs->PlugIn(OPENTBS_DELETE_SHEETS, 'Delete me'); 


		// Display a sheet (make it visible) 
		// $otbs->PlugIn(OPENTBS_DISPLAY_SHEETS, 'Display me'); 

		// Change the current sheet 
		// $otbs->PlugIn(OPENTBS_SELECT_SHEET, 2); 

		// A recordset for merging tables

		//INI CODING CETAK WORD KARTU


		$no_surat = $_REQUEST['no_surat'] ? $_REQUEST['no_surat'] : '';
		$tanggalsurat =  $_REQUEST['tanggalsurat'] ? $_REQUEST['tanggalsurat'] : '';
		$tglawal = $_REQUEST['tglawal'] ? $_REQUEST['tglawal'] : '';
		$tglakhir = $_REQUEST['tglakhir'] ? $_REQUEST['tglakhir'] : '';
		$tempat_undangan = $_REQUEST['tempat_undangan'] ? $_REQUEST['tempat_undangan'] : '';
		$TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
		$TBLDAFTREKLAME_JNSREKLAME = $_REQUEST['TBLDAFTREKLAME_JNSREKLAME'] ? $_REQUEST['TBLDAFTREKLAME_JNSREKLAME'] : '';
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';

		// $wherenopok = $TBLDAFTAR_NOPOK!=0 ? ( 'AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK='.$TBLDAFTAR_NOPOK) : '';
		// $wherejnsrek = $TBLDAFTREKLAME_JNSREKLAME!=0 ? (' AND TBLDAFTREKLAME_JNSREKLAME='.$TBLDAFTREKLAME_JNSREKLAME) : '';

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
				$nourutskp = $kodefikasi[2];

				$query .= 
				$flag .
					"SELECT
					*
				FROM
					(
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
					TBLDAFTREKLAME.TBLDAFTAR_NOPOK,
					TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK,
					TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK,
					TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK,
					TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE,
					TBLDAFTREKLAME.TBLDAFTAR_GOLONGAN,
					TBLDAFTREKLAME.TBLKECAMATAN_ID,
					TBLDAFTREKLAME.TBLKELURAHAN_ID,
					TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRI,
					TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRI,
					TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRI,
					TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAK,
					TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN2,
					TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN1,
					TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME,
					TBLDAFTREKLAME.TBLDAFTREKLAME_THNBATASSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_BLNBATASSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_TGLBATASSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_NOMORSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_URUTSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAKSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_THNSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRISETOR,
					TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRISETOR,
					TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRISETOR,
					TBLDAFTREKLAME.TBLDAFTREKLAME_REGSETOR,
					TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHSETOR,
					TBLDAFTREKLAME.TBLDAFTREKLAME_THNSPTPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSPTPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSPTPD,
					(
						CASE
						WHEN NVL (TBLDAFTREKLAME_PAJAKSKPD, 0) = 0 THEN
						'Menunggu SKPD Dicetak'
						WHEN NVL (TBLDAFTREKLAME_RUPIAHSETOR, 0) = 0 THEN
						'SKPD Belum Dibayar'
						END
						) AS status
					FROM TBLDAFTREKLAME
					WHERE
					TBLDAFTREKLAME.TBLDAFTAR_NOPOK = ".$nopok."
					AND TBLDAFTREKLAME.TBLDAFTREKLAME_NOMORSKPD = ".$nourutskp."
					AND TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK = ".$tahunpjk."
					ORDER BY
					TBLDAFTAR_NOPOK,
					TBLDAFTREKLAME_THNSPTPD,
					TBLDAFTREKLAME_BLNSPTPD,
					TBLDAFTREKLAME_TGLSPTPD,
					TBLPENDATAAN_THNPAJAK,
					TBLPENDATAAN_BLNPAJAK,
					TBLPENDATAAN_TGLPAJAK

				
					)
					WHERE
					unik_id <> 0
					";
					
					$flag = "
					UNION
					";
			}
		}

		$grup = "GROUP BY TBLDAFTAR_NOPOK";
		// $data['cetak'] = Yii::app()->db->createCommand($query, $grup)->queryAll(); 
		$data['cetak'] = Yii::app()->db->createCommand($query)->queryAll(); 
		$data['cetak_afterloop'] = Yii::app()->db->createCommand($query)->queryAll();

		$sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 1";

		$data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow(); 

		// var_dump($query, $grup);

		// $this->cetakWordSKNPWPD($data);
		// Yii::app()->end();

		$utama = array();
		$rows = array();

		// $tanggalsurat = date('d') . ' ' . LokalIndonesia::getBulan(date('m')) . ' ' . date('Y');

		$GLOBALS['tglawal'] = LokalIndonesia::TanggalUmum($_REQUEST['tglawal']);
		$GLOBALS['tglakhir'] = LokalIndonesia::TanggalUmum($_REQUEST['tglakhir']);
		$GLOBALS['no_surat'] = $_REQUEST['no_surat'];
		$GLOBALS['tempat_undangan'] = $_REQUEST['tempat_undangan'];
		$GLOBALS['now'] = LokalIndonesia::TanggalUmum($_REQUEST['tanggalsurat']);
		$GLOBALS['jabatan'] = $data['jab1']['TBLPEJABAT_URAIAN'];
		$GLOBALS['nama'] = $data['jab1']['TBLPEJABAT_NAMA'];
		$GLOBALS['nip'] = $data['jab1']['TBLPEJABAT_NIP'];

		$nopok_before = '';
		$LOOP_NOPOK = array();
		foreach ($data['cetak'] as $hal_nopok) :
			if ($nopok_before!=$hal_nopok['TBLDAFTAR_NOPOK']) :
				$nopok_before = $hal_nopok['TBLDAFTAR_NOPOK'];

				$nomorNPWPD = $hal_nopok['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$hal_nopok['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$hal_nopok['TBLKECAMATAN_ID'])) . '.' . (sprintf('%02d',$hal_nopok['TBLKELURAHAN_ID']));

				$LOOP_NOPOK = array(
					'wp_npwpd' => $nomorNPWPD
					,'nopokhal' => ''
					,'wp_nama' => $hal_nopok['TBLDAFTAR_BADANUSAHANAMA']
					,'wp_alamat' => $hal_nopok['TBLDAFTAR_BADANUSAHAALAMAT']
					, 'detail' => array()
				);

				$no = 1;

				foreach ($data['cetak'] as $kolom) :
					if ($nopok_before==$kolom['TBLDAFTAR_NOPOK']) :
						// $jenise = array('nama'=>'' /*$nopok_before*/, 'detail'=>array());
						$nomorNPWPD = $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$kolom['TBLKECAMATAN_ID'])) . '.' . (sprintf('%02d',$kolom['TBLKELURAHAN_ID']));
						$jatuhtempo = $kolom['TBLDAFTREKLAME_TGLBATASSKPD'] . '-' . $kolom['TBLDAFTREKLAME_BLNBATASSKPD'] . '-' . ($kolom['TBLDAFTREKLAME_THNBATASSKPD']+2000);
						$namaBU = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
						$alamatBU = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];

						$utama['noo'] = null;
						$utama['ket2'] = trim($kolom['TBLDAFTREKLAME_KETERANGAN1']);
						$utama['no'] = $no++;
						$utama['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_PAJAK']);
						$utama['tahun'] = '20'.trim($kolom['TBLPENDATAAN_THNPAJAK']);
						$utama['ke'] = trim($kolom['TBLPENDATAAN_PAJAKKE']);
						$utama['no_skpd'] = trim($kolom['TBLDAFTREKLAME_NOMORSKPD']);
						$utama['lokasi'] = trim($kolom['TBLDAFTREKLAME_KETERANGAN2']);
						$utama['tempo'] = $jatuhtempo;
						$utama['pajak_rp'] = trim($kolom['TBLDAFTREKLAME_THNBATASSKPD']);

						// array_push($rows, $utama);
						array_push($LOOP_NOPOK['detail'], $utama);
					endif;
				endforeach;

			array_push($rows, $LOOP_NOPOK);

			endif;
		endforeach;

		$header=array();
		$header['jenis_pajak'] = 'Pajak Reklame';
		$header['wp_npwpd_'] = $nomorNPWPD;
		$header['wp_nama'] = $namaBU;
		$header['wp_alamat'] = $alamatBU;
		$header['datenow'] = date('d') . ' ' . LokalIndonesia::getBulan(date('m')) . ' ' . date('Y');

		// debug
		// echo CJSON::encode($rows);Yii::app()->end();

		// Merge data in the first sheet 

		$otbs->MergeBlock('rows', $rows); 
		$otbs->MergeField('header', $header);
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();

		//INI CODING CETAK WORD 
		}



public function actionCetakDaftar()
{	
	$jab_id = '23';
	$sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 1";
	$sql2="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 3";
	$sql3="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 8";	
	$sql4="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = ".$jab_id."";	

	$data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();
	$data['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();
	$data['jab3'] = Yii::app()->db->createCommand($sql3)->queryRow();
	$data['jab4'] = Yii::app()->db->createCommand($sql4)->queryRow();

	$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
	// $namatpl = $path_tpl . 'DAFTAR SURAT TEGURAN SKPD REKLAME.docx';
	$namatpl = $path_tpl . 'DAFTAR SURAT TEGURAN SKPD REKLAME (Teguran SKPD Reklame) (A4).docx';
	$namafileDL = "Daftar Teguran.docx";

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

		// Delete a sheet 
		// $otbs->PlugIn(OPENTBS_DELETE_SHEETS, 'Delete me'); 


		// Display a sheet (make it visible) 
		// $otbs->PlugIn(OPENTBS_DISPLAY_SHEETS, 'Display me'); 

		// Change the current sheet 
		// $otbs->PlugIn(OPENTBS_SELECT_SHEET, 2); 

		// A recordset for merging tables

		//INI CODING CETAK WORD KARTU


		$no_surat = $_REQUEST['no_surat'] ? $_REQUEST['no_surat'] : '';
		$tglawal = $_REQUEST['tglawal'] ? $_REQUEST['tglawal'] : '';
		$tglakhir = $_REQUEST['tglakhir'] ? $_REQUEST['tglakhir'] : '';
		$TBLPENDATAAN_THNPAJAK = substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAK'], -2) : '';
		$TBLDAFTREKLAME_JNSREKLAME = $_REQUEST['TBLDAFTREKLAME_JNSREKLAME'] ? $_REQUEST['TBLDAFTREKLAME_JNSREKLAME'] : '';
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';

		// $wherenopok = $TBLDAFTAR_NOPOK!=0 ? ( 'AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK='.$TBLDAFTAR_NOPOK) : '';
		// $wherejnsrek = $TBLDAFTREKLAME_JNSREKLAME!=0 ? (' AND TBLDAFTREKLAME_JNSREKLAME='.$TBLDAFTREKLAME_JNSREKLAME) : '';

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
				$nourutskp = $kodefikasi[2];

				$query .= 
				$flag . 
				"
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
					TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRI,
					TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRI,
					TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRI,
					TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAK,
					TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN2,
					TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN1,
					TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME,
					TBLDAFTREKLAME.TBLDAFTREKLAME_THNBATASSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_BLNBATASSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_TGLBATASSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_NOMORSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_URUTSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAKSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_THNSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSKPD,
					TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSKPD,
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
					FROM TBLDAFTREKLAME
					WHERE
					TBLDAFTREKLAME.TBLDAFTAR_NOPOK = ".$nopok."
					AND TBLDAFTREKLAME.TBLDAFTREKLAME_NOMORSKPD = ".$nourutskp."
					AND TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK = ".$tahunpjk."
					
					";
					$flag = '
					UNION
					';
			}
		}


		$datax['cetak'] = Yii::app()->db->createCommand($query)->queryAll(); 

		// $this->cetakWordSKNPWPD($data);
		// Yii::app()->end();

		$utama = array();
		$rows = array();


		// $GLOBALS['tglawal'] = $_REQUEST['tglawal'];
		// $GLOBALS['tglakhir'] = $_REQUEST['tglakhir'];
		$GLOBALS['nomorsurat'] = $_REQUEST['no_surat'];
		$GLOBALS['datenow'] = date('d-m-Y');
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

		$no = 1;
		$jumlah=array('jumlah'=>0);
		$totalteguran = array('totalteguran'=>0);
		$totalnopok = array('totalnopok'=>0);
		// $totalwp = array('totalwp'=>0);

		foreach ($datax['cetak'] as $kolom) :
				$nomorNPWPD = $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$kolom['TBLKECAMATAN_ID'])) . '.' . (sprintf('%02d',$kolom['TBLKELURAHAN_ID']));
				$jatuhtempo = (sprintf('%02d',$kolom['TBLDAFTREKLAME_TGLBATASSKPD'])) . '-' .(sprintf('%02d',$kolom['TBLDAFTREKLAME_BLNBATASSKPD'])) . '-' . $kolom['TBLDAFTREKLAME_THNBATASSKPD'];
				$namaBU = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
				$alamatBU = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
				$jnopok = $kolom['TBLDAFTAR_NOPOK'] / $kolom['TBLDAFTAR_NOPOK'];

				$data['ket2'] = trim($kolom['TBLDAFTREKLAME_KETERANGAN2']);
				$data['ket1'] = trim($kolom['TBLDAFTREKLAME_KETERANGAN1']);
				$data['no'] = $no++;
				$data['thnpajak'] = trim($kolom['TBLPENDATAAN_THNPAJAK']) + 2000;
				// $data['tahun'] = '20'.trim($kolom['TBLPENDATAAN_THNPAJAK']);
				$data['lokasi'] = trim($kolom['TBLPENDATAAN_PAJAKKE']);
				$data['noskp'] = trim($kolom['TBLDAFTREKLAME_NOMORSKPD']);
				$data['lokasi'] = trim($kolom['TBLPENDATAAN_PAJAKKE']);
				$data['tglbatasskpd'] = $jatuhtempo;
				$data['pajak_rp'] = trim($kolom['TBLDAFTREKLAME_THNBATASSKPD']);
				// $totalno = $no++;
				$data['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_PAJAKSKPD']);
				$data['namawp'] = $namaBU;
				$data['alamat'] = $alamatBU;
				$data['nopok'] = $nomorNPWPD;

				// $totalwp['totalwp'] += $totalno; 
				$jumlah['jumlah'] +=trim($kolom['TBLDAFTREKLAME_PAJAKSKPD']);
				$totalteguran['totalteguran'] = $data['no'];
				$totalnopok['totalnopok'] = '';

			array_push($rows, $data);

		endforeach;
		$header=array();
		$header['totalpajak'] = LokalIndonesia::ribuan($jumlah['jumlah']);
		$header['jmlteguran'] = $totalteguran['totalteguran'];		
		$header['jmlwp'] = $totalnopok['totalnopok'];		

				// debug
				// echo CJSON::encode($rows);Yii::app()->end();

			// Merge data in the first sheet 

		$otbs->MergeBlock('data', $rows); 
		$otbs->MergeField('header', $header);
				// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();

}





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