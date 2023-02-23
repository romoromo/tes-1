<?php
// Lap BKP Harian
class Lap_bkpharian_90Controller extends Controller
{
	var $MODULE_URL = 'daftar_setoran/lap_bkpharian_90';

	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionCetak()
	{
		$tgl_setor = trim($_REQUEST['tgl_setor'])!='' ? date('Y-m-d', strtotime($_REQUEST['tgl_setor']) ) : "";
		$explode = explode('-',$tgl_setor);
		$tgl =$explode[2];
		$bln =$explode[1];
		$tahun = substr($explode[0], -2);

		$sql = "SELECT
			TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKAYAT,
			NVL(TBLSETOR.TBLSETOR_REKJENIS,0),
			TBLREKENING_REKAYAT_90 AS TBLSETOR_REKAYAT,
			TBLREKENING_REKJENIS_90 AS TBLSETOR_REKJENIS,
			TBLREKENING_REKSUBJENIS_90,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR = :tgl THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) AS HARI_INI,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR < :tgl THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) AS SD_HARILALU,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR <= :tgl THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) AS SD_HARIINI,
			
			TBLREKENING.TBLREKENING_NAMAREKENING_90 AS NMREK
		FROM
			TBLSETOR
		LEFT JOIN
			TBLREKENING_90 TBLREKENING
			ON
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT

			AND NVL(TBLREKENING.TBLREKENING_REKJENIS,0) = NVL(TBLSETOR.TBLSETOR_REKJENIS,0)

		WHERE
			TBLSETOR.TBLSETOR_THNSETOR = :tahun
			AND TBLSETOR.TBLSETOR_BLNSETOR = :bln
			AND TBLSETOR_STATUSBAYAR <> 20

		GROUP BY
			TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKAYAT,
			NVL(TBLSETOR.TBLSETOR_REKJENIS,0),
			TBLREKENING_NAMAREKENING_90,
			TBLREKENING_REKAYAT_90,
			TBLREKENING_REKJENIS_90,
			TBLREKENING_REKSUBJENIS_90

		HAVING
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR <= :tgl THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) > 0

		ORDER BY TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKAYAT
		";

		$data['bkp'] = Yii::app()->db->createCommand($sql)
		->bindParam(':tgl', $tgl)
		->bindParam(':tahun', $tahun)
		->bindParam(':bln', $bln)
		->queryAll();

		// print_r($sql);

		$this->renderPartial('cetak-ok',array('data'=>$data));
	}

	public function actionCetakWord_old()
	{

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_penyetoran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'buku_daftar_setoran_laporan_harian_bkp_sd_hari_ini-ttdpejabat.docx';
		$namafileDL = "Buku Daftar Setoran.docx";

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
		$tgl_setor = trim($_REQUEST['tgl_setor'])!='' ? date('Y-m-d', strtotime($_REQUEST['tgl_setor']) ) : "";
		$namafileDL = "Buku Daftar Setoran-{$tgl_setor}.docx";
		$explode = explode('-',$tgl_setor);
		$tgl =$explode[2];
		$bln =$explode[1];
		$tahun = substr($explode[0], -2);

		$sql = "SELECT
			TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKAYAT,
			NVL(TBLSETOR.TBLSETOR_REKJENIS,0),
			TBLREKENING_REKAYAT_90 AS TBLSETOR_REKAYAT,
			TBLREKENING_REKJENIS_90 AS TBLSETOR_REKJENIS,
			TBLREKENING_REKSUBJENIS_90,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR = :tgl THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) AS HARI_INI,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR < :tgl THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) AS SD_HARILALU,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR <= :tgl THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) AS SD_HARIINI,
			
			TBLREKENING.TBLREKENING_NAMAREKENING_90 AS NMREK
		FROM
			TBLSETOR
		LEFT JOIN
			TBLREKENING_90 TBLREKENING
			ON
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT

			AND NVL(TBLREKENING.TBLREKENING_REKJENIS,0) = NVL(TBLSETOR.TBLSETOR_REKJENIS,0)

		WHERE
			TBLSETOR.TBLSETOR_THNSETOR = :tahun
			AND TBLSETOR.TBLSETOR_BLNSETOR = :bln
			AND TBLSETOR_STATUSBAYAR <> 20

		GROUP BY
			TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKAYAT,
			NVL(TBLSETOR.TBLSETOR_REKJENIS,0),
			TBLREKENING_NAMAREKENING_90,
			TBLREKENING_REKAYAT_90,
			TBLREKENING_REKJENIS_90,
			TBLREKENING_REKSUBJENIS_90

		HAVING
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR <= :tgl THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) > 0

		ORDER BY TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKAYAT
		";

		// echo $sql;Yii::app()->end();

		$data['bkp'] = Yii::app()->db->createCommand($sql)
		->bindParam(':tgl', $tgl)
		->bindParam(':tahun', $tahun)
		->bindParam(':bln', $bln)
		->queryAll();

		$utama = array();
		$rows = array();

		$no = 1;	

		$GLOBALS['date'] = date('d-m-Y', strtotime($tgl_setor));  
		$GLOBALS['datenow'] =  date('d-m-Y');

		$ttlhi = array('ttl1'=>0);
		$ttlshl = array('ttl2'=>0);
		$ttlshi = array('ttl3'=>0);

		$rekkode_before = '';

		function hitung_ayat($data, $kodeayat, $col)
		{
			$total = 0;
			foreach ($data as $r) {
				$ayat = $r['TBLSETOR_REKPENDAPATAN'] .'.'. $r['TBLSETOR_REKPAD'] .'.'. $r['TBLSETOR_REKPAJAK'] .'.'. $r['TBLSETOR_REKAYAT'];
				if ($ayat == $kodeayat) :
					$total += $r[$col];
				endif;
			}
			return $total;
		}

		foreach ($data['bkp'] as $rowWP) :
			$norekening = $rowWP['TBLSETOR_REKPENDAPATAN'] . '.' . ($rowWP['TBLSETOR_REKPAD']) . '.' . ($rowWP['TBLSETOR_REKPAJAK']) . '.' . ($rowWP['TBLSETOR_REKAYAT']) . '.' . ($rowWP['TBLSETOR_REKJENIS']);

			$rekkode_now = $rowWP['TBLSETOR_REKPENDAPATAN'] .'.'. $rowWP['TBLSETOR_REKPAD'] .'.'. $rowWP['TBLSETOR_REKPAJAK'] .'.'. $rowWP['TBLSETOR_REKAYAT'];
			if ($rekkode_before!=$rekkode_now):
				if ($no!=1):

          			$totalh1 = hitung_ayat($data['bkp'], $rekkode_before, 'HARI_INI');
          			$totalh2 = hitung_ayat($data['bkp'], $rekkode_before, 'SD_HARILALU');
          			$totalh3 = hitung_ayat($data['bkp'], $rekkode_before, 'SD_HARIINI');

					$utama['no']         = '';
					$utama['rekening']   = '';
					$utama['pajak']      = '                    Total Ayat:';
					$utama['hariini']    = trim(LokalIndonesia::ribuan($totalh1));;
					$utama['sdharilalu'] = trim(LokalIndonesia::ribuan($totalh2));;
					$utama['sdhariini']  = trim(LokalIndonesia::ribuan($totalh3));

					array_push($rows, $utama);
				endif;
				$rekkode_before = $rekkode_now;
			endif;

			$utama['no']         = $no++;
			$utama['rekening']   = $norekening;
			$utama['pajak']      = trim($rowWP['NMREK']);
			$utama['hariini']    = trim (LokalIndonesia::ribuan($rowWP['HARI_INI']));;
			$utama['sdharilalu'] = trim (LokalIndonesia::ribuan($rowWP['SD_HARILALU']));;
			$utama['sdhariini']  = trim (LokalIndonesia::ribuan($rowWP['SD_HARIINI']));
			$totalhariini        = $rowWP['HARI_INI'];
			$totalsdharilalu     = $rowWP['SD_HARILALU'];
			$totalsdhariini      = $rowWP['SD_HARIINI'];
			

			$ttlhi['ttl1']  += trim($totalhariini);
			$ttlshl['ttl2'] += trim($totalsdharilalu);
			$ttlshi['ttl3'] += trim($totalsdhariini);

			array_push($rows, $utama);
		endforeach;

		$akhir['hi']  = LokalIndonesia::ribuan( hitung_ayat($data['bkp'], $rekkode_before, 'HARI_INI') ) ;
		$akhir['shl'] = LokalIndonesia::ribuan( hitung_ayat($data['bkp'], $rekkode_before, 'SD_HARILALU') ) ;
		$akhir['shi'] = LokalIndonesia::ribuan( hitung_ayat($data['bkp'], $rekkode_before, 'SD_HARIINI') ) ;

		$jmlh=array();
		$jmlh['hi']  = LokalIndonesia::ribuan($ttlhi['ttl1']);
		$jmlh['shl'] = LokalIndonesia::ribuan($ttlshl['ttl2']);
		$jmlh['shi'] = LokalIndonesia::ribuan($ttlshi['ttl3']);

		$sqlbendahara = "SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID=24";
		$pjbt_bendahara = Yii::app()->db->createCommand($sqlbendahara)->queryRow();
		$utama['bendahara_pejabat_nama'] = $pjbt_bendahara ? $pjbt_bendahara['TBLPEJABAT_NAMA'] : '';
		$utama['bendahara_pejabat_nip'] = $pjbt_bendahara ? $pjbt_bendahara['TBLPEJABAT_NIP'] : '';

		// echo CJSON::encode($rows);Yii::app()->end();

		$otbs->MergeBlock('utama', $rows);
		$otbs->MergeField('jmlh', $jmlh);
		$otbs->MergeField('akhir', $akhir);
		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();

	}

	public function actionCetakWord()
	{

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_penyetoran' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'buku_daftar_setoran_laporan_harian_bkp_sd_hari_ini-ttdpejabat.docx';
		$namafileDL = "Buku Daftar Setoran.docx";

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
		$tgl_setor = trim($_REQUEST['tgl_setor'])!='' ? date('Y-m-d', strtotime($_REQUEST['tgl_setor']) ) : "";
		$namafileDL = "Buku Daftar Setoran-{$tgl_setor}.docx";
		$explode = explode('-',$tgl_setor);
		$tgl =$explode[2];
		$bln =$explode[1];
		$tahun = substr($explode[0], -2);

		$sql1 = "SELECT
			TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKAYAT,
			-- NVL(TBLSETOR.TBLSETOR_REKJENIS,0),
			TBLREKENING_REKAYAT_90 AS TBLSETOR_REKAYAT,
			TBLREKENING_REKJENIS_90 AS TBLSETOR_REKJENIS,
			TBLREKENING_REKSUBJENIS_90,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR = :tgl THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) AS HARI_INI,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR < :tgl THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) AS SD_HARILALU,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR <= :tgl THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) AS SD_HARIINI,
			
			TBLREKENING.TBLREKENING_NAMAREKENING_90 AS NMREK
		FROM
			TBLSETOR
		LEFT JOIN
			TBLREKENING_90 TBLREKENING
			ON
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT

			AND NVL(TBLREKENING.TBLREKENING_REKJENIS,0) = NVL(TBLSETOR.TBLSETOR_REKJENIS,0)

		WHERE
			TBLSETOR.TBLSETOR_THNSETOR = :tahun
			AND TBLSETOR.TBLSETOR_BLNSETOR = :bln
			AND TBLSETOR_STATUSBAYAR <> 20
			AND TBLSETOR.TBLSETOR_REKPAJAK <> 4

		GROUP BY
			TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKAYAT,
			-- NVL(TBLSETOR.TBLSETOR_REKJENIS,0),
			TBLREKENING_REKJENIS_90,
			TBLREKENING_NAMAREKENING_90,
			TBLREKENING_REKAYAT_90,
			TBLREKENING_REKJENIS_90,
			TBLREKENING_REKSUBJENIS_90

		HAVING
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR <= :tgl THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) > 0

		ORDER BY TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKAYAT
		";

		// echo $sql;Yii::app()->end();

		$data['bkp1'] = Yii::app()->db->createCommand($sql1)
		->bindParam(':tgl', $tgl)
		->bindParam(':tahun', $tahun)
		->bindParam(':bln', $bln)
		->queryAll();

		$sql2 = "SELECT
			TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKAYAT,
			NVL(TBLSETOR.TBLSETOR_REKJENIS,0),
			TBLREKENING_REKAYAT_90 AS TBLSETOR_REKAYAT,
			TBLREKENING_REKJENIS_90 AS TBLSETOR_REKJENIS,
			TBLREKENING_REKSUBJENIS_90,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR = :tgl THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) AS HARI_INI,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR < :tgl THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) AS SD_HARILALU,
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR <= :tgl THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) AS SD_HARIINI,
			
			TBLREKENING.TBLREKENING_NAMAREKENING_90 AS NMREK
		FROM
			TBLSETOR
		LEFT JOIN
			TBLREKENING_90 TBLREKENING
			ON
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT

			AND NVL(TBLREKENING.TBLREKENING_REKJENIS,0) = NVL(TBLSETOR.TBLSETOR_REKJENIS,0)

		WHERE
			TBLSETOR.TBLSETOR_THNSETOR = :tahun
			AND TBLSETOR.TBLSETOR_BLNSETOR = :bln
			AND TBLSETOR_STATUSBAYAR <> 20
			AND TBLSETOR.TBLSETOR_REKPAJAK = 4

		GROUP BY
			TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKAYAT,
			NVL(TBLSETOR.TBLSETOR_REKJENIS,0),
			TBLREKENING_NAMAREKENING_90,
			TBLREKENING_REKAYAT_90,
			TBLREKENING_REKJENIS_90,
			TBLREKENING_REKSUBJENIS_90

		HAVING
			SUM (
			CASE
			WHEN TBLSETOR_TGLSETOR <= :tgl THEN
			TBLSETOR.TBLSETOR_RUPIAHSETOR
			ELSE
			0
			END
			) > 0

		ORDER BY TBLSETOR.TBLSETOR_REKPENDAPATAN,
			TBLSETOR.TBLSETOR_REKPAD,
			TBLSETOR.TBLSETOR_REKPAJAK,
			TBLSETOR.TBLSETOR_REKAYAT
		";

		// echo $sql;Yii::app()->end();

		$data['bkp2'] = Yii::app()->db->createCommand($sql2)
		->bindParam(':tgl', $tgl)
		->bindParam(':tahun', $tahun)
		->bindParam(':bln', $bln)
		->queryAll();

		$data['bkp'] = array_merge($data['bkp1'], $data['bkp2']);

		$utama = array();
		$rows = array();

		$no = 1;	

		$GLOBALS['date'] = date('d-m-Y', strtotime($tgl_setor));  
		$GLOBALS['datenow'] =  date('d-m-Y');

		$ttlhi = array('ttl1'=>0);
		$ttlshl = array('ttl2'=>0);
		$ttlshi = array('ttl3'=>0);

		$rekkode_before = '';

		function hitung_ayat($data, $kodeayat, $col)
		{
			$total = 0;
			foreach ($data as $r) {
				$ayat = $r['TBLSETOR_REKPENDAPATAN'] .'.'. $r['TBLSETOR_REKPAD'] .'.'. $r['TBLSETOR_REKPAJAK'] .'.'. $r['TBLSETOR_REKAYAT'];
				if ($ayat == $kodeayat) :
					$total += $r[$col];
				endif;
			}
			return $total;
		}

		foreach ($data['bkp'] as $rowWP) :
			$norekening = $rowWP['TBLSETOR_REKPENDAPATAN'] . '.' . ($rowWP['TBLSETOR_REKPAD']) . '.' . ($rowWP['TBLSETOR_REKPAJAK']) . '.' . ($rowWP['TBLSETOR_REKAYAT']) . '.' . ($rowWP['TBLSETOR_REKJENIS']);

			$rekkode_now = $rowWP['TBLSETOR_REKPENDAPATAN'] .'.'. $rowWP['TBLSETOR_REKPAD'] .'.'. $rowWP['TBLSETOR_REKPAJAK'] .'.'. $rowWP['TBLSETOR_REKAYAT'];
			if ($rekkode_before!=$rekkode_now):
				if ($no!=1):

          			$totalh1 = hitung_ayat($data['bkp'], $rekkode_before, 'HARI_INI');
          			$totalh2 = hitung_ayat($data['bkp'], $rekkode_before, 'SD_HARILALU');
          			$totalh3 = hitung_ayat($data['bkp'], $rekkode_before, 'SD_HARIINI');

					$utama['no']         = '';
					$utama['rekening']   = '';
					$utama['pajak']      = '                    Total Ayat:';
					$utama['hariini']    = trim(LokalIndonesia::ribuan($totalh1));;
					$utama['sdharilalu'] = trim(LokalIndonesia::ribuan($totalh2));;
					$utama['sdhariini']  = trim(LokalIndonesia::ribuan($totalh3));

					array_push($rows, $utama);
				endif;
				$rekkode_before = $rekkode_now;
			endif;

			$utama['no']         = $no++;
			$utama['rekening']   = $norekening;
			$utama['pajak']      = trim($rowWP['NMREK']);
			$utama['hariini']    = trim (LokalIndonesia::ribuan($rowWP['HARI_INI']));;
			$utama['sdharilalu'] = trim (LokalIndonesia::ribuan($rowWP['SD_HARILALU']));;
			$utama['sdhariini']  = trim (LokalIndonesia::ribuan($rowWP['SD_HARIINI']));
			$totalhariini        = $rowWP['HARI_INI'];
			$totalsdharilalu     = $rowWP['SD_HARILALU'];
			$totalsdhariini      = $rowWP['SD_HARIINI'];
			

			$ttlhi['ttl1']  += trim($totalhariini);
			$ttlshl['ttl2'] += trim($totalsdharilalu);
			$ttlshi['ttl3'] += trim($totalsdhariini);

			array_push($rows, $utama);
		endforeach;

		$akhir['hi']  = LokalIndonesia::ribuan( hitung_ayat($data['bkp'], $rekkode_before, 'HARI_INI') ) ;
		$akhir['shl'] = LokalIndonesia::ribuan( hitung_ayat($data['bkp'], $rekkode_before, 'SD_HARILALU') ) ;
		$akhir['shi'] = LokalIndonesia::ribuan( hitung_ayat($data['bkp'], $rekkode_before, 'SD_HARIINI') ) ;

		$jmlh=array();
		$jmlh['hi']  = LokalIndonesia::ribuan($ttlhi['ttl1']);
		$jmlh['shl'] = LokalIndonesia::ribuan($ttlshl['ttl2']);
		$jmlh['shi'] = LokalIndonesia::ribuan($ttlshi['ttl3']);

		$sqlbendahara = "SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID=24";
		$pjbt_bendahara = Yii::app()->db->createCommand($sqlbendahara)->queryRow();
		$utama['bendahara_pejabat_nama'] = $pjbt_bendahara ? $pjbt_bendahara['TBLPEJABAT_NAMA'] : '';
		$utama['bendahara_pejabat_nip'] = $pjbt_bendahara ? $pjbt_bendahara['TBLPEJABAT_NIP'] : '';

		// echo CJSON::encode($rows);Yii::app()->end();

		$otbs->MergeBlock('utama', $rows);
		$otbs->MergeField('jmlh', $jmlh);
		$otbs->MergeField('akhir', $akhir);
		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();

	}
}