<?php

class HimbauanairtanahController extends Controller
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
				AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
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
				AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
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
				AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
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
				AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
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
				AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
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
				AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
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
			LEFT JOIN TBLSETOR ON 
			TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
			AND NVL(TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0)
			AND NVL(TBLDAFTTANAH.TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0)
			AND TBLDAFTTANAH.TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
			AND TBLSETOR.TBLSETOR_REKPAJAK = 1
			AND NVL(TBLSETOR_JNSKETETAPAN,'-') = '-'
			WHERE
			TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK BETWEEN '$TBLPENDATAAN_THNPAJAKA'
			AND '$TBLPENDATAAN_THNPAJAKK'
			AND TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD <> 0
			GROUP BY
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
			ORDER BY
			TBLDAFTTANAH.TBLDAFTAR_NOPOK
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
	// $namatpl = $path_tpl . 'Temp_TeguranAT_backup3Juli2018.docx';
	$namatpl = $path_tpl . 'Temp_ImbauanAT.docx';
	
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
	$tanggalsurat = $_REQUEST['tanggalsurat'] ? $_REQUEST['tanggalsurat'] : '';
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
	$custom_order = '';
	
	$urut = 1;
	foreach ($data['filter'] as $kodefikasi) {
		$kodefikasi = explode('-', $kodefikasi);
		if (is_array($kodefikasi)) {
			if (!isset($kodefikasi[0])) {
				echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
				Yii::app()->end();
			}
			$nopok = $kodefikasi[0];
			$custom_order .= ",'{$nopok}',".$urut++;


			$query .= 
			$flag . 
			"SELECT
				TBLDAFTAR.TBLDAFTAR_NOPOK,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
				BULAN_NAMA AS BULAN,
				BULAN.BULAN_ID AS BULAN_ID,
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
					AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
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
					AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
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
					AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
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
					AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
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
					AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
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
					AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
					AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK BETWEEN ".$TBLPENDATAAN_THNPAJAKA."
					AND ".$TBLPENDATAAN_THNPAJAKK. " THEN
					NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
					ELSE
					0
					END
					) AS TOTAL,
					( SELECT TRIM(REFKECAMATAN_NAMA) FROM REFKECAMATAN WHERE REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA) RREFKECAMATAN_NAMA,
				(SELECT TRIM(REFKELURAHAN_NAMA) FROM REFKELURAHAN WHERE REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA) RREFKELURAHAN_NAMA,
				NVL(TBLDAFTAR_BADANUSAHATELP,0) TBLDAFTAR_BADANUSAHATELP
				FROM
				TBLDAFTTANAH
				INNER JOIN TBLDAFTAR ON TBLDAFTTANAH.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
				RIGHT JOIN BULAN ON TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK = BULAN.BULAN_ID
				LEFT JOIN TBLSETOR ON 
				TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
				AND NVL(TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0)
				AND NVL(TBLDAFTTANAH.TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0)
				AND TBLDAFTTANAH.TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND TBLSETOR.TBLSETOR_REKPAJAK = 1
				AND NVL(TBLSETOR_JNSKETETAPAN,'-') = '-'
				WHERE
				TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK BETWEEN ".$TBLPENDATAAN_THNPAJAKA."
				AND ".$TBLPENDATAAN_THNPAJAKK."
				AND TBLDAFTTANAH.TBLDAFTAR_NOPOK IN (".$nopok. ")
				GROUP BY
				TBLDAFTAR.TBLDAFTAR_NOPOK,
				BULAN_ID,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
				BULAN_NAMA,
				TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
				TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
				TBLDAFTAR.TBLDAFTAR_GOLONGAN,
				TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
				TBLDAFTAR_BADANUSAHATELP
				
				
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
		//$nopok = " ORDER BY TOTAL DESC";
		// $order = " ORDER BY TBLDAFTAR_NOPOK, BULAN_ID ASC";
		$order = "
		ORDER BY decode(
			TBLDAFTAR_NOPOK
			";
			$order .= $custom_order;
			// ,'15474',1
		$order .= "
		) ASC,
		BULAN_ID ASC
		";
		
		// $data['cetak'] = Yii::app()->db->createCommand($query, $order)->queryAll();
		$SQLNYA_QUERY = "
		SELECT * 
		FROM (
		{$query}
		)
		{$order}
		";
		// $data['cetak'] = Yii::app()->db->createCommand($query . $order)->queryAll();
		// print_r($SQLNYA_QUERY);Yii::app()->end();
		$data['cetak'] = Yii::app()->db->createCommand($SQLNYA_QUERY)->queryAll();
		
		$sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 1";
		
		$data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();
		
		$utama = array();
		$halaman = array();
		$rows = array();
		$row = array();
		
		// $tanggalsurat = date('d') . ' ' . LokalIndonesia::getBulan(date('m')) . ' ' . date('Y');

		$GLOBALS['now'] = $tanggalsurat;
		$GLOBALS['tglawal'] = LokalIndonesia::TanggalUmum($_REQUEST['tglawal']);
		$GLOBALS['tglakhir'] = LokalIndonesia::TanggalUmum($_REQUEST['tglakhir']);
		$GLOBALS['no_surat'] = $_REQUEST['no_surat'];
		$GLOBALS['1'] = $_REQUEST['TBLPENDATAAN_THNPAJAKA'];
		$GLOBALS['2'] = $_REQUEST['TBLPENDATAAN_THNPAJAKA'] + 1;
		$GLOBALS['3'] = $_REQUEST['TBLPENDATAAN_THNPAJAKA'] + 2;
		$GLOBALS['4'] = $_REQUEST['TBLPENDATAAN_THNPAJAKA'] + 3;
		$GLOBALS['5'] = $_REQUEST['TBLPENDATAAN_THNPAJAKK'];
		$GLOBALS['jabatan'] = $data['jab1']['TBLPEJABAT_URAIAN'];
		$GLOBALS['nama'] = $data['jab1']['TBLPEJABAT_NAMA'];
		$GLOBALS['nip'] = $data['jab1']['TBLPEJABAT_NIP'];
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
		
		$nopok_before = '';
		$LOOP_NOPOK = array();
		foreach ($data['cetak'] as $hal_nopok) :
			if ($nopok_before!=$hal_nopok['TBLDAFTAR_NOPOK']) :
				$nopok_before = $hal_nopok['TBLDAFTAR_NOPOK'];
				
				$nomorNPWPD = $hal_nopok['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$hal_nopok['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$hal_nopok['TBLKECAMATAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$hal_nopok['TBLKELURAHAN_IDBADANUSAHA']));
				$alamatBU = $hal_nopok['TBLDAFTAR_BADANUSAHAALAMAT'];
				$kecbu = !empty($hal_nopok['TBLKECAMATAN_ID']) ? ', ' . $hal_nopok['RREFKECAMATAN_NAMA'] : '';
				$kelbu = !empty($hal_nopok['TBLKELURAHAN_ID']) ? ', ' . $hal_nopok['RREFKELURAHAN_NAMA'] : '';
				$telp = $hal_nopok['TBLDAFTAR_BADANUSAHATELP'] != '0' ? ', ' . $hal_nopok['TBLDAFTAR_BADANUSAHATELP'] : '';

				$LOOP_NOPOK = array(
					'wp_npwpd' => $nomorNPWPD
					,'nopokhal' => ''
					,'wp_nama' => $hal_nopok['TBLDAFTAR_BADANUSAHANAMA']
					,'wp_alamat' => $alamatBU . $kecbu . $kelbu . $telp
					,'detail' => array()
					,'jumlah1' => 0
					,'jumlah2' => 0
					,'jumlah3' => 0
					,'jumlah4' => 0
					,'jumlah5' => 0
				);
				$no = 1;
				foreach ($data['cetak'] as $kolom) :
					if ($nopok_before==$kolom['TBLDAFTAR_NOPOK']) :
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

						$LOOP_NOPOK['jumlah1'] += ($kolom['TUNGGAKAN1']);
						$LOOP_NOPOK['jumlah2'] += ($kolom['TUNGGAKAN2']);
						$LOOP_NOPOK['jumlah3'] += ($kolom['TUNGGAKAN3']);
						$LOOP_NOPOK['jumlah4'] += ($kolom['TUNGGAKAN4']);
						$LOOP_NOPOK['jumlah5'] += ($kolom['TUNGGAKAN5']);
						//$total2['total2'] += trim($kolom['TUNGGAKAN2']);
						//$total3['total3'] += trim($kolom['TUNGGAKAN3']);
						//$total4['total4'] += trim($kolom['TUNGGAKAN4']);
						//$total5['total5'] += trim($kolom['TUNGGAKAN5']);
						//array_push($rows, $utama);
						array_push($LOOP_NOPOK['detail'], $utama);
					endif;
				endforeach;

				$LOOP_NOPOK['total1'] = LokalIndonesia::ribuan($LOOP_NOPOK['jumlah1']);
				$LOOP_NOPOK['total2'] = LokalIndonesia::ribuan($LOOP_NOPOK['jumlah2']);
				$LOOP_NOPOK['total3'] = LokalIndonesia::ribuan($LOOP_NOPOK['jumlah3']);
				$LOOP_NOPOK['total4'] = LokalIndonesia::ribuan($LOOP_NOPOK['jumlah4']);
				$LOOP_NOPOK['total5'] = LokalIndonesia::ribuan($LOOP_NOPOK['jumlah5']);
				
				$LOOP_NOPOK['totalall'] = LokalIndonesia::ribuan($LOOP_NOPOK['jumlah1']+$LOOP_NOPOK['jumlah2']+$LOOP_NOPOK['jumlah3']+$LOOP_NOPOK['jumlah4']+$LOOP_NOPOK['jumlah5']);
				$LOOP_NOPOK['totalterbilang'] = LokalIndonesia::terbilangangka($LOOP_NOPOK['totalall']);
				array_push($rows, $LOOP_NOPOK);
			endif;
		endforeach;
				

		$header=array();
		$header['wp_nama'] = $namaBU;
		$header['wp_alamat'] = $alamatBU;
		$header['datenow'] = $tanggalsurat;
		$header['wp_npwpd'] = $nomorNPWPD;
		//$header['jumlah1'] = LokalIndonesia::ribuan($total1['total1']) ;
		//$header['jumlah2'] = LokalIndonesia::ribuan($total2['total2']) ;
		//$header['jumlah3'] = LokalIndonesia::ribuan($total3['total3']) ;
		//$header['jumlah4'] = LokalIndonesia::ribuan($total4['total4']) ;
		//$header['jumlah5'] = LokalIndonesia::ribuan($total5['total5']) ;
		
		// debug
		// echo CJSON::encode($rows);Yii::app()->end();
		

		$otbs->MergeBlock('rows', $rows);
		// $otbs->MergeBlock('halaman', $rows); 
		$otbs->MergeField('header', $header);
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template
					// Yii::app()->end();
					// var_dump($data['cetak']);die();
					// echo json_encode($rows);Yii::app()->end();
		$namafileDL = "Surat Imbauan AirTanah {$tanggalsurat}.docx";
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
			TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK BETWEEN '$TBLPENDATAAN_THNPAJAKA'
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
		// header('Content-Type: application/excel');
		// header("Content-Disposition: attachment;Filename=Cetak-Jenis.xls");
		$this->cetakExcelDaftar($data);Yii::app()->end();
	}

	$this->renderPartial('cetakdaftar', array('data'=>$data));
}

	public function cetakExcelDaftar($data)
	{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'Cetak-Daftar-Teguran-Air-Tanah.xlsx';
		$namafileDL = "Daftar Tagihan Air Tanah.xlsx"; 

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

		//INI CODING CETAK WORD SSPD

		$utama = array();
		$rows = array();
		$rowDATA = $data['cari'];
		$no = 1;
		foreach ($rowDATA as $record) :
			$row['no'] = $no++;
			$row['nopok'] = $record['TBLDAFTAR_NOPOK'];
			$row['wp_nama'] = $record['TBLDAFTAR_BADANUSAHANAMA'];
			$row['wp_alamat'] = $record['TBLDAFTAR_BADANUSAHAALAMAT'];
			$row['nominal_th1'] = $record['TUNGGAKAN1'];
			$row['nominal_th2'] = $record['TUNGGAKAN2'];
			$row['nominal_th3'] = $record['TUNGGAKAN3'];
			$row['nominal_th4'] = $record['TUNGGAKAN4'];
			$row['nominal_th5'] = $record['TUNGGAKAN5'];
			$row['nominal_total'] = $record['TOTAL'];

			array_push($rows, $row);
		endforeach;

		// debug
		// echo CJSON::encode($rows);Yii::app()->end();

		// Merge data in the first sheet 
		
		// $otbs->MergeField('utama', $utama); 
		$otbs->MergeBlock('row', $rows); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}

	public function actioncetakdaftar_old()
	{
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'Cetak-Daftar-Teguran-Air-Tanah.xlsx';
		$namafileDL = "Daftar Surat Teguran Air Tanah.xlsx"; 

		Yii::import('ext.DMOpenTBS',true);
		Yii::import('ext.LokalIndonesia');
		DMOpenTBS::init();
		$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
		$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8);

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
		$custom_order = '';

		$urut = 1;
		foreach ($data['filter'] as $kodefikasi) {
		$kodefikasi = explode('-', $kodefikasi);
		if (is_array($kodefikasi)) {
			if (!isset($kodefikasi[0])) {
				echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
				Yii::app()->end();
			}
			$nopok = $kodefikasi[0];
			$custom_order .= ",'{$nopok}',".$urut++;


			$query .= 
			$flag . 
			"SELECT
				TBLDAFTAR.TBLDAFTAR_NOPOK,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
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
					AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
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
					AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
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
					AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
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
					AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
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
					AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
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
					AND NVL (TBLSETOR.TBLPENDATAAN_THNPAJAK, '0') = '0'
					AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK BETWEEN ".$TBLPENDATAAN_THNPAJAKA."
					AND ".$TBLPENDATAAN_THNPAJAKK. " THEN
					NVL (TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD, 0)
					ELSE
					0
					END
				) AS TOTAL
				FROM
				TBLDAFTTANAH
				INNER JOIN TBLDAFTAR ON TBLDAFTTANAH.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
				LEFT JOIN TBLSETOR ON 
				TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
				AND NVL(TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0)
				AND NVL(TBLDAFTTANAH.TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0)
				AND TBLDAFTTANAH.TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND TBLSETOR.TBLSETOR_REKPAJAK = 1
				AND NVL(TBLSETOR_JNSKETETAPAN,'-') = '-'
				WHERE
				TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK BETWEEN ".$TBLPENDATAAN_THNPAJAKA."
				AND ".$TBLPENDATAAN_THNPAJAKK."
				AND TBLDAFTTANAH.TBLDAFTAR_NOPOK IN (".$nopok.")
				GROUP BY
				TBLDAFTAR.TBLDAFTAR_NOPOK,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
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
		//$nopok = " ORDER BY TOTAL DESC";
		// $order = " ORDER BY TBLDAFTAR_NOPOK, BULAN_ID ASC";
		$order = "
		ORDER BY decode(
			TBLDAFTAR_NOPOK
		";
		$order .= $custom_order;
		// ,'15474',1
		$order .= "
		) ASC
		";

		// $data['cetak'] = Yii::app()->db->createCommand($query, $order)->queryAll();
		$SQLNYA_QUERY = "
		SELECT * 
		FROM (
		{$query}
		)
		{$order}
		";
		// $data['cetak'] = Yii::app()->db->createCommand($query . $order)->queryAll();
		// print_r($SQLNYA_QUERY);Yii::app()->end();
		$data['cetak'] = Yii::app()->db->createCommand($SQLNYA_QUERY)->queryAll();

		$utama = array();
		$rows = array();
		$rowDATA = $data['cetak'];
		$no = 1;
		foreach ($rowDATA as $record) :
			$row['no'] = $no++;
			$row['nopok'] = $record['TBLDAFTAR_NOPOK'];
			$row['wp_nama'] = $record['TBLDAFTAR_BADANUSAHANAMA'];
			$row['wp_alamat'] = $record['TBLDAFTAR_BADANUSAHAALAMAT'];
			$row['nominal_th1'] = $record['TUNGGAKAN1'];
			$row['nominal_th2'] = $record['TUNGGAKAN2'];
			$row['nominal_th3'] = $record['TUNGGAKAN3'];
			$row['nominal_th4'] = $record['TUNGGAKAN4'];
			$row['nominal_th5'] = $record['TUNGGAKAN5'];
			$row['nominal_total'] = $record['TOTAL'];

			array_push($rows, $row);
		endforeach;

		// debug
		// echo CJSON::encode($rows);Yii::app()->end();

		// Merge data in the first sheet 
		
		// $otbs->MergeField('utama', $utama); 
		$otbs->MergeBlock('row', $rows); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}

	public function actionCetakDaftar()
	{
		$jab_id = '22';
		$sql1 = "SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 1";
		$sql2 = "SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 3";
		$sql3 = "SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 8";
		$sql4 = "SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = " . $jab_id . "";

		$data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();
		$data['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();
		$data['jab3'] = Yii::app()->db->createCommand($sql3)->queryRow();
		$data['jab4'] = Yii::app()->db->createCommand($sql4)->queryRow();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'temp_suratteguran' . DIRECTORY_SEPARATOR;
		// $namatpl = $path_tpl . 'DAFTAR SURAT TEGURAN SKPD REKLAME.docx';
		$namatpl = $path_tpl . 'DAFTAR SURAT IMBAUAN SKPD IBT (A4).docx';


		// if (base64_decode($data['jenis'])=='REK') {
		// 	$namatpl = $path_tpl . 'Temp_Teguranrek.docx';
		// 	$namafileDL = "Surat-Teguranrek.docx"; 
		// }

		Yii::import('ext.DMOpenTBS', true);
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
		$tanggalsurat = $_REQUEST['tanggalsurat'] ? $_REQUEST['tanggalsurat'] : '';
		$TBLPENDATAAN_THNPAJAKA =  substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) : '';
		$TBLPENDATAAN_THNPAJAKK =  substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) : '';
		$data['filter'] = isset($_REQUEST['data']) ? $_REQUEST['data'] : '';

		if (!empty($data['filter'])) {
			$data['filter'] = explode(',', $data['filter']);
			$jumlahnopok = count($data['filter']);
		} else {
			echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak Teguran Pajak Airtanah</h3>";
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
				TBLDAFTAR_BADANUSAHAALAMAT,
				TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTTANAH.TBLDAFTAR_GOLONGAN,
				TBLDAFTTANAH.TBLDAFTAR_NOPOK,
				TBLDAFTTANAH_BLNBATASSKPD,
				TBLDAFTTANAH_NOMORSKPD,
				TBLDAFTTANAH_PAJAKSKPD,
				TBLDAFTTANAH_TGLBATASSKPD,
				TBLDAFTTANAH_THNBATASSKPD,
				TBLDAFTTANAH.TBLKECAMATAN_ID,
				TBLDAFTTANAH.TBLKELURAHAN_ID,
				TBLDAFTTANAH.TBLPENDATAAN_PAJAKKE,
				TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK,
				TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK
				FROM
				TBLDAFTTANAH
				INNER JOIN TBLDAFTAR ON TBLDAFTTANAH.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
				LEFT JOIN TBLSETOR ON 
				TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
				AND NVL(TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0)
				AND NVL(TBLDAFTTANAH.TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0)
				AND TBLDAFTTANAH.TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND TBLSETOR.TBLSETOR_REKPAJAK = 1
				AND NVL(TBLSETOR_JNSKETETAPAN,'-') = '-'
				WHERE
				TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK BETWEEN " . $TBLPENDATAAN_THNPAJAKA . "
				AND " . $TBLPENDATAAN_THNPAJAKK . "
				AND TBLDAFTTANAH.TBLDAFTAR_NOPOK = " . $nopok . "
				AND TBLSETOR.TBLPENDATAAN_THNPAJAK IS NULL
				AND TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD <> 0

				";
				$flag = '
						UNION
						';
			}
		}

		$order = "
		ORDER BY 
			TBLDAFTAR_NOPOK,TBLPENDATAAN_THNPAJAK,TBLPENDATAAN_BLNPAJAK
		";
		$SQLNYA_QUERY = "
		SELECT * 
		FROM (
		{$query}
		)
		{$order}
		";


		$datax['cetak'] = Yii::app()->db->createCommand($SQLNYA_QUERY)->queryAll();

		// $this->cetakWordSKNPWPD($data);
		// Yii::app()->end();

		$utama = array();
		$rows = array();


		// $GLOBALS['tglawal'] = $_REQUEST['tglawal'];
		// $GLOBALS['tglakhir'] = $_REQUEST['tglakhir'];
		$tanggalsurat = $_REQUEST['tanggalsurat'];

		$GLOBALS['nomorsurat'] = $_REQUEST['no_surat'];
		$GLOBALS['datenow'] = $tanggalsurat;
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
		$jumlah = array('jumlah' => 0);
		$totalteguran = array('totalteguran' => 0);
		$totalnopok = array('totalnopok' => 0);
		// $totalwp = array('totalwp'=>0);

		foreach ($datax['cetak'] as $kolom) :
			$nomorNPWPD = $kolom['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d', $kolom['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d', $kolom['TBLKECAMATAN_ID'])) . '.' . (sprintf('%02d', $kolom['TBLKELURAHAN_ID']));
			$jatuhtempo = (sprintf('%02d', $kolom['TBLDAFTTANAH_TGLBATASSKPD'])) . '-' . (sprintf('%02d', $kolom['TBLDAFTTANAH_BLNBATASSKPD'])) . '-' . $kolom['TBLDAFTTANAH_THNBATASSKPD'];
			$namaBU = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
			$alamatBU = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];

			$data['no'] = $no++;
			$data['thnpajak'] = trim($kolom['TBLPENDATAAN_THNPAJAK']) + 2000;
			$data['bulanpajak'] = LokalIndonesia::getBulan($kolom['TBLPENDATAAN_BLNPAJAK']);
			$data['noskp'] = trim($kolom['TBLDAFTTANAH_NOMORSKPD']);
			$data['tempo'] = $jatuhtempo;
			// $totalno = $no++;
			$data['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTTANAH_PAJAKSKPD']);
			$data['namawp'] = $namaBU;
			$data['alamat'] = $alamatBU;
			$data['nopok'] = $nomorNPWPD;

			// $totalwp['totalwp'] += $totalno; 
			$jumlah['jumlah'] += trim($kolom['TBLDAFTTANAH_PAJAKSKPD']);
			$totalteguran['totalteguran'] = $data['no'];
			$totalnopok['totalnopok'] = '';

			array_push($rows, $data);

		endforeach;
		$header = array();
		$header['totalpajak'] = LokalIndonesia::ribuan($jumlah['jumlah']);
		$header['jmlteguran'] = $totalteguran['totalteguran'];
		$header['jmlwp'] = $jumlahnopok;

		// debug
		// echo CJSON::encode($rows);Yii::app()->end();

		// Merge data in the first sheet 

		$otbs->MergeBlock('data', $rows);
		$otbs->MergeField('header', $header);
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template
		$namafileDL = "Daftar Imbauan ABT {$tanggalsurat}.docx";

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}

	public function actionSimpan()
	{
		$no_surat = $_REQUEST['no_surat'] ? $_REQUEST['no_surat'] : '';
		$tanggalsurat = $_REQUEST['tanggalsurat'] ? $_REQUEST['tanggalsurat'] : '';
		$TBLPENDATAAN_THNPAJAKA =  substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKA'], -2) : '';
		$TBLPENDATAAN_THNPAJAKK =  substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) ? substr($_REQUEST['TBLPENDATAAN_THNPAJAKK'], -2) : ''; 

		$data['filter'] = isset($_REQUEST['data']) ? $_REQUEST['data'] : '';

		if (!empty($data['filter'])) {
			$data['filter'] = explode(',', $data['filter']);
		} else {
			echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak Himbauan Pajak Airtanah</h3>";
			Yii::app()->end();
		}

		$flag = '';
		$query = '';

		foreach ($data['filter'] as $kodefikasi) {
			$kodefikasi = explode('-', $kodefikasi);
			if (is_array($kodefikasi)) {
				if (!isset($kodefikasi[0])) {
					echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak himbauan airtanah</h3>";
					Yii::app()->end();
				}
				$nopok = $kodefikasi[0];

				$query .=
					$flag .
				"SELECT
				TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK,
				TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK,
				TBLDAFTTANAH.TBLPENDATAAN_TGLPAJAK,
				TBLDAFTTANAH.TBLDAFTAR_NOPOK,
				TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR_BADANUSAHAALAMAT,
				TBLDAFTTANAH.TBLDAFTAR_GOLONGAN,
				TBLDAFTTANAH.TBLKECAMATAN_ID,
				TBLDAFTTANAH.TBLKELURAHAN_ID,
				TBLDAFTTANAH_REKAYAT
				FROM
				TBLDAFTTANAH
				INNER JOIN TBLDAFTAR ON TBLDAFTTANAH.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
				LEFT JOIN TBLSETOR ON 
				TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
				AND NVL(TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0)
				AND NVL(TBLDAFTTANAH.TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0)
				AND TBLDAFTTANAH.TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND TBLSETOR.TBLSETOR_REKPAJAK = 1
				AND NVL(TBLSETOR_JNSKETETAPAN,'-') = '-'
				WHERE
				TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK BETWEEN " . $TBLPENDATAAN_THNPAJAKA . "
				AND " . $TBLPENDATAAN_THNPAJAKK . "
				AND TBLDAFTTANAH.TBLDAFTAR_NOPOK = " . $nopok . "
				AND TBLSETOR.TBLPENDATAAN_THNPAJAK IS NULL
				AND TBLDAFTTANAH.TBLDAFTTANAH_PAJAKSKPD <> 0

				";
				$flag = '
						UNION
						';
			}
		}
		$order = "
		ORDER BY 
			TBLDAFTAR_NOPOK,TBLPENDATAAN_THNPAJAK,TBLPENDATAAN_BLNPAJAK
		";
		$SQLNYA_QUERY = "
		SELECT * 
		FROM (
		{$query}
		)
		{$order}
		";

		// echo $SQLNYA_QUERY;Yii::app()->end();

		$data['simpan'] = Yii::app()->db->createCommand($SQLNYA_QUERY)->queryAll();

		$tblpenggunaid = Yii::app()->user->pengguna_id;

		foreach ($data['simpan'] as $kolom) :

			$tglteguran = date('Y-m-d H:i:s', strtotime($tanggalsurat));

			try {
				$himbauanid = $this->Cekexisthimbauan($kolom['TBLPENDATAAN_THNPAJAK'], $kolom['TBLPENDATAAN_BLNPAJAK'], $kolom['TBLDAFTAR_NOPOK'], $kolom['TBLDAFTTANAH_REKAYAT'], $tglteguran);

				// echo $himbauanid;Yii::app()->end();
				if (empty($himbauanid)) {

					$inserthistori = "INSERT INTO TBLHIMBAUAN (THP, BLP, NOPOK, NOHIMBAUAN, TGLHIMBAUAN, NAMA_WP, ALAMAT, NPWPD, JENIS, STATUS_DATA, TBLPENGGUNA_ID) VALUES (" . $kolom['TBLPENDATAAN_THNPAJAK'] . "," . $kolom['TBLPENDATAAN_BLNPAJAK'] . "," . $kolom['TBLDAFTAR_NOPOK'] . ",'" . $no_surat . "',TO_DATE('" . $tglteguran . "', 'YYYY-MM-DD HH24:MI:SS'),TRIM('" . $kolom['TBLDAFTAR_BADANUSAHANAMA'] . "'),TRIM('" . $kolom['TBLDAFTAR_BADANUSAHAALAMAT'] . "'),'" . $kolom['TBLDAFTAR_GOLONGAN'] . "." . (sprintf('%07d', $kolom['TBLDAFTAR_NOPOK'])) . "." . (sprintf('%02d', $kolom['TBLKECAMATAN_ID'])) . "." . (sprintf('%02d', $kolom['TBLKELURAHAN_ID'])) . "'," . $kolom['TBLDAFTTANAH_REKAYAT'] . ",'SKPD',$tblpenggunaid)";
					// echo $inserthistori;Yii::app()->end();
					$inserthistori = Yii::app()->db->createCommand($inserthistori);
					if ($inserthistori->execute()) {
						echo json_encode(array('status' => 'success', 'id' => $himbauanid));
					}
				} else {
					echo json_encode(array('status' => 'exists', 'id' => $himbauanid));
				}
			} catch (CDbException $e) {
				echo json_encode(array('status' => 'failed', 'message' => $e->getMessage()));
				Yii::app()->end();
			}

		endforeach;
	}

	public function Cekexisthimbauan($thp, $blp, $nopok, $jenis, $tgl)
	{
		$now = date('Y-m-d');
		$himbauanid = Yii::app()->db->createCommand("SELECT TBLHIMBAUAN_ID FROM TBLHIMBAUAN WHERE THP = {$thp} AND BLP = {$blp} AND NOPOK = {$nopok} AND TGLHIMBAUAN = TO_DATE('{$tgl}', 'YYYY-MM-DD HH24:MI:SS') AND STATUS_DATA = 'SKPD' AND JENIS = '{$jenis}' ")->queryScalar();
		return $himbauanid;
	}
}
