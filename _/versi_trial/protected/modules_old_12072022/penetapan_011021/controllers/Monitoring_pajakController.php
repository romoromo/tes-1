<?php

class Monitoring_pajakController extends Controller
{

	public function init()
	{
		Yii::import('ext.DBFetch');
	}

	public function actionIndex()
	{
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
			AND TBLREKENING_REKAYAT <> 5
			AND TBLREKENING_REKAYAT <> 8
			AND TBLREKENING_REKAYAT <> 10
			AND TBLREKENING_REKAYAT <> 11
			AND TBLREKENING_REKAYAT <> 23			
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			')->queryAll();
		$data['kecamatan'] = Yii::app()->db->createCommand("SELECT * FROM REFKECAMATAN")->queryAll();

		$this->renderPartial('index',array('data'=>$data));
	}

	public function actionGetData()
	{
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
		$TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];
		$data['NOMORSKPD'] = $_REQUEST['TBLDAFTHOTEL_NOMORSKPD'];
		$TBLKECAMATAN_ID = $_REQUEST['TBLKECAMATAN_ID'];
		$TBLDAFTHOTEL_ISJNSPENETAPAN = $_REQUEST['TBLDAFTHOTEL_ISJNSPENETAPAN'];
		$TBLDAFTHOTEL_TGLSPTPD = $_REQUEST['TBLDAFTHOTEL_TGLSPTPD'];

		$select = "CONCAT (
		TBLDAFTHOTEL_TGLSKPD,
			CONCAT (
				'/',
				CONCAT (
					TBLDAFTHOTEL_BLNSKPD,
					(
						CONCAT (
							'/20',
							TBLDAFTHOTEL_THNSKPD
						)
					)
				)
			)
		) AS TGL_SKPD,
		CONCAT (
			TBLDAFTHOTEL_TGLSPTPD,
			CONCAT (
				'/',
				CONCAT (
					TBLDAFTHOTEL_BLNSPTPD,
					(
						CONCAT (
							'/20',
							TBLDAFTHOTEL_THNSPTPD
						)
					)
				)
			)
		) AS TGL_ENTRY,

		TBLDAFTAR.TBLDAFTAR_NOPOK AS TBLDAFTAR_NOPOK,
        TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA AS NAMA_USAHA,
        TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT AS LOKASI,
        TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA AS NAMA_PEMILIK,
        TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA AS KEC_ID,
        TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA AS KEL_ID,
        TBLDAFTHOTEL_OMSETPAJAK AS OMZET,
        TBLDAFTHOTEL_PAJAK AS PAJAK,

		TBLDAFTHOTEL.TBLDAFTHOTEL_TGLSKPD,
		TBLDAFTHOTEL.TBLDAFTAR_NOPOK,
		TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK,
		TBLDAFTHOTEL.TBLPENDATAAN_BLNPAJAK,
		TBLDAFTHOTEL.TBLPENDATAAN_TGLPAJAK,
		TBLDAFTHOTEL.TBLPENDATAAN_PAJAKKE,
		TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAK,
		TBLDAFTHOTEL.TBLDAFTAR_GOLONGAN,
		REFKECAMATAN.REFKECAMATAN_NAMA,
		REFKELURAHAN.REFKELURAHAN_NAMA";
		$from = 'TBLDAFTHOTEL';
		$filter = array(
			 'EQ__TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK'=>substr($TBLPENDATAAN_THNPAJAK, -2)
			,'EQ__TBLDAFTHOTEL.TBLPENDATAAN_BLNPAJAK'=>(int) $TBLPENDATAAN_BLNPAJAK
			,'EQ__TBLDAFTHOTEL.TBLKECAMATAN_ID'=>$TBLKECAMATAN_ID
		);

		$tglsptpd = '';
        if ( !empty($TBLDAFTHOTEL_TGLSPTPD) ) {
            $exptglsptpd = explode('-', $TBLDAFTHOTEL_TGLSPTPD);
            $tglsptpd = (int)$exptglsptpd[0];
            $blnsptpd = (int)$exptglsptpd[1];
            $thnsptpd = (int)$exptglsptpd[2];
            $filter['EQ__TBLDAFTHOTEL_TGLSPTPD'] = $tglsptpd;
            $filter['EQ__TBLDAFTHOTEL_BLNSPTPD'] = $blnsptpd;
            $filter['EQ__TBLDAFTHOTEL_THNSPTPD'] = substr($thnsptpd, -2);
        }

		$otherquery = array(
			 'leftjoin_wpr'=>array('TBLDAFTAR','TBLDAFTAR.TBLDAFTAR_NOPOK=TBLDAFTHOTEL.TBLDAFTAR_NOPOK')
            ,'leftjoin_REFKECAMATAN'=>array('REFKECAMATAN','REFKECAMATAN.REFKECAMATAN_ID=TBLDAFTHOTEL.TBLKECAMATAN_ID')
            ,'leftjoin_REFKELURAHAN'=>array('REFKELURAHAN','REFKELURAHAN.REFKELURAHAN_ID=TBLDAFTHOTEL.TBLKELURAHAN_ID')
			,'andwhere'=> '
            NVL (TBLDAFTHOTEL_NOMORSKPD, 0) = 0 
            AND TBLDAFTHOTEL.TBLDAFTAR_NOPOK <> 150000
            '
		);

		$id_eksepsi = trim(isset($_REQUEST['id_eksepsi']) ? $_REQUEST['id_eksepsi'] : '', ',');
		if (!empty($id_eksepsi)) {
            $list_nopok = explode(',', $id_eksepsi);
            $where_nopok = '' ;
            foreach ($list_nopok as $kodene) {
                $pch   = explode('-', $kodene);
                $nopok = isset($pch[0]) ? $pch[0] : 0;
                $thn   = isset($pch[1]) ? $pch[1] : 0;
                $bln   = isset($pch[2]) ? $pch[2] : 0;
                // $tgl   = isset($pch[3]) ? $pch[3] : 0;

                $where_nopok .= " AND NOT (TBLDAFTAR.TBLDAFTAR_NOPOK = $nopok AND TBLPENDATAAN_THNPAJAK = $thn AND TBLPENDATAAN_BLNPAJAK = $bln ) ";
            }
            $otherquery['andwhere'] .= $where_nopok;
        }

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data['air'] = DBFetch::query($arrayConfig);

		$this->renderPartial('table',array('data'=>$data));
	}

	public function actionTetapkanPajakAir()
	{
		$listPajakAir = trim($_REQUEST['listPajakAir'],',');
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
		$TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];
		$TBLDAFTHOTEL_TGLSKPD = date('Y-m-d',strtotime( $_REQUEST['TBLDAFTHOTEL_TGLSKPD'] ));
		$TBLDAFTHOTEL_TGLBATASSKPD = date('Y-m-d',strtotime( $_REQUEST['TBLDAFTHOTEL_TGLBATASSKPD'] ));

		$THNPAJAK = substr($TBLPENDATAAN_THNPAJAK, -2);
		$BLNPAJAK = (int)$TBLPENDATAAN_BLNPAJAK;
		$TGLSKPD = explode('-', $TBLDAFTHOTEL_TGLSKPD);
		$TGLBATASSKPD = explode('-', $TBLDAFTHOTEL_TGLBATASSKPD);

		$PajakAirList = explode(',', $listPajakAir);
		$stat = array(); foreach ($PajakAirList as $list) {
			$expList = explode('-', $list);
			$nopokok = $expList[0];	
			$nourut = isset($expList[3]) ? $expList[3] : 0;
			$pajak = isset($expList[4]) ? $expList[4] : 0;

			$update = Yii::app()->db->createCommand();

			$query = $update->update('TBLDAFTHOTEL', array(
				 'TBLDAFTHOTEL_THNSKPD' => substr($TGLSKPD[0], -2)
				,'TBLDAFTHOTEL_BLNSKPD' => (int) $TGLSKPD[1]
				,'TBLDAFTHOTEL_TGLSKPD' => $TGLSKPD[2]
				,'TBLDAFTHOTEL_NOMORSKPD' => $nourut
				,'TBLDAFTHOTEL_PAJAKSKPD' => $pajak
				,'TBLDAFTHOTEL_THNBATASSKPD' => substr($TGLBATASSKPD[0], -2)
				,'TBLDAFTHOTEL_BLNBATASSKPD' => (int) $TGLBATASSKPD[1]
				,'TBLDAFTHOTEL_TGLBATASSKPD' => $TGLBATASSKPD[2]
			), 'TBLDAFTAR_NOPOK=:nopok AND TBLPENDATAAN_THNPAJAK=:thn AND TBLPENDATAAN_BLNPAJAK=:bln', array(':nopok'=>$nopokok,':thn'=>$THNPAJAK,':bln'=>$BLNPAJAK));
			
			if ($query>0) {
				// echo CJSON::encode(array('status'=>'success','nopokok'=>$nopokok));
				$stat[] = $nopokok;
			}
			else{
				// echo CJSON::encode(array('status'=>'failed','nopokok'=>$nopokok));
			}
		}
		echo CJSON::encode(array('status'=>'success','nopokok'=>$stat));
	}

	public function actionGetNoNotaAkhir()
	{
		$tahun = $_REQUEST['tahun'];
		$splthn = substr($tahun, -2);

		$data = Yii::app()->db->createCommand("SELECT
			MAX(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD)+1 AS NOMORSKPD
			FROM
			TBLDAFTHOTEL
			WHERE TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK = ".$splthn."")->queryRow();

		echo CJSON::encode($data);
	}

	public function actionCetakSKPDWord()
	{
		// error_reporting(0);

		// baca file template, yg dipakai
		// $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"')
		
		// $data['filter'] = isset($_REQUEST['data']) ? base64_decode($_REQUEST['data']) : '';

		// $explodefilter = explode(',', $data['filter']);

		// $kodefikasi = explode('-', $explodefilter);

		// $nopokok = $kodefikasi[0];
		// $tahunpjk = $kodefikasi[1];
		// $bulanpjk = $kodefikasi[2];
		// $noskp = $kodefikasi[3];
		// $nominalpjk = $kodefikasi[4];

		$data['filter'] = isset($_REQUEST['data']) ? base64_decode($_REQUEST['data']) : '';

		if (!empty($data['filter'])) {
			$data['filter'] = explode(',', $data['filter']);
		} else {
			echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
			Yii::app()->end();
		}

		$flag = '';
		$query = '';
		foreach ($data['filter'] as $kodefikasi) {
			$kodefikasi = explode('-', $kodefikasi);
			if (is_array($kodefikasi)) {
				if (!isset($kodefikasi[0]) OR !isset($kodefikasi[1]) OR !isset($kodefikasi[2]) OR !isset($kodefikasi[3]) OR !isset($kodefikasi[4]) ) {
					echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
					Yii::app()->end();
				}
				$nopokok = $kodefikasi[0];
				$tahunpjk = $kodefikasi[1];
				$bulanpjk = $kodefikasi[2];
				$noskp = $kodefikasi[3];
				$nominalpjk = $kodefikasi[4];

				$query .= 
				$flag . 
				"
				SELECT TBLDAFTHOTEL.*, TBLDAFTAR.*
				,( SELECT TBLREKENING_NAMAREKENING FROM TBLREKENING WHERE 
				TBLREKENING_REKPENDAPATAN=TBLDAFTHOTEL_REKPENDAPATAN
				AND TBLREKENING_REKPAD=TBLDAFTHOTEL_REKPAD
				AND TBLREKENING_REKPAJAK=TBLDAFTHOTEL_REKPAJAK
				AND TBLREKENING_REKAYAT=TBLDAFTHOTEL_REKAYAT
				AND TBLREKENING_REKJENIS=TBLDAFTHOTEL_REKJENIS
				 ) AS NMREK
				FROM TBLDAFTHOTEL
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHOTEL.TBLDAFTAR_NOPOK
				WHERE 
				TBLDAFTHOTEL.TBLDAFTAR_NOPOK = $nopokok
				AND TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK = $tahunpjk
				AND TBLDAFTHOTEL.TBLPENDATAAN_BLNPAJAK = $bulanpjk
				AND NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD, 0) = $noskp
				";
				$flag = '
				UNION
				';

			}
		}
		// echo "$query";
		$data['list_skpd'] = Yii::app()->db->createCommand($query)->queryAll();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_skpd' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'SKPD_MON.docx';

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

		//INI CODING QUERY CETAK WORD

			

		$skpd = array();
		$rows = array();
		
		foreach ($data['list_skpd'] as $kolom) :

			$skpd['no'] = null;
			$skpd['nopok'] = $kolom['TBLDAFTAR_NOPOK'];
			$skpd['noskp'] = $kolom['TBLDAFTHOTEL_NOMORSKPD'];
			$skpd['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
			$skpd['alamatbadan'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
			$skpd['thnpajak'] = '20'. $kolom['TBLPENDATAAN_THNPAJAK'];

			$skpd['blnpajak'] = LokalIndonesia::getBulan($kolom['TBLPENDATAAN_BLNPAJAK']);
			$skpd['npwpd'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. $kolom['TBLDAFTAR_NOPOK'] .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);
			
			$skpd['tglbatasskpd'] = $kolom['TBLDAFTHOTEL_TGLBATASSKPD'] .' '. LokalIndonesia::getBulan($kolom['TBLDAFTHOTEL_BLNBATASSKPD']) .' '. '20'. $kolom['TBLDAFTHOTEL_THNBATASSKPD'];
			$skpd['rekkode'] = $kolom['TBLDAFTHOTEL_REKURUSAN'] .'.'. $kolom['TBLDAFTHOTEL_REKPEMERINTAHAN'] .'.'. $kolom['TBLDAFTHOTEL_REKORGANISASI'] .'.'. $kolom['TBLDAFTHOTEL_REKPROGRAM'] .'.'. $kolom['TBLDAFTHOTEL_REKKEGIATAN'] .'.'. $kolom['TBLDAFTHOTEL_REKDINAS'] .'.'. $kolom['TBLDAFTHOTEL_REKBIDANG'] .'.'. $kolom['TBLDAFTHOTEL_REKPENDAPATAN'] .'.'. $kolom['TBLDAFTHOTEL_REKPAD'] .'.'. $kolom['TBLDAFTHOTEL_REKPAJAK'] .'.'. $kolom['TBLDAFTHOTEL_REKAYAT'] .'.'. $kolom['TBLDAFTHOTEL_REKJENIS'];

			$skpd['nmrek'] = $kolom['NMREK'];
			$skpd['vol'] = "";

			$skpd['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTHOTEL_PAJAK']);
			$skpd['bunga'] = LokalIndonesia::ribuan($kolom['TBLDAFTHOTEL_BUNGASPTPD']);

			$skpd['total'] = LokalIndonesia::ribuan($kolom['TBLDAFTHOTEL_PAJAK']+$kolom['TBLDAFTHOTEL_BUNGASPTPD']);
			$skpd['terbilang'] = LokalIndonesia::terbilangangka($kolom['TBLDAFTHOTEL_PAJAK']+$kolom['TBLDAFTHOTEL_BUNGASPTPD']);

			$skpd['tglcetak'] = date('d') .' '. LokalIndonesia::getBulan(date('m'));
            $skpd['thncetak'] = date('Y');

			$skpd['tglskpd'] = $kolom['TBLPENDATAAN_TGLPAJAK'];
			$skpd['blnskpd'] = LokalIndonesia::getBulan($kolom['TBLPENDATAAN_BLNPAJAK']);
			$skpd['thnskpd'] = '20'. $kolom['TBLPENDATAAN_THNPAJAK'];

		array_push($rows, $skpd);

		endforeach;

		//SAMPAI SINI QUERYNYA

		// var_dump($data);
		// echo json_encode($data);Yii::app()->end();
		// echo json_encode($row);

		// Merge data in the first sheet 
		// $npwpd = $data['TBLDAFTAR_NOPOK'];
		$namafileDL = "SKPD-MONITORING.docx";
		$otbs->MergeBlock('skpd', $rows); 
		// $otbs->MergeField('setoran', $setoran); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}

	public function actionCetakSKPD()
	{
		$data['list_skpd'] = array(
			array(),
			array(),
			array(),
		);

		$data['filter'] = isset($_REQUEST['data']) ? base64_decode($_REQUEST['data']) : '';

		if (!empty($data['filter'])) {
			$data['filter'] = explode(',', $data['filter']);
		} else {
			echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
			Yii::app()->end();
		}

		$flag = '';
		$query = '';
		foreach ($data['filter'] as $kodefikasi) {
			$kodefikasi = explode('-', $kodefikasi);
			if (is_array($kodefikasi)) {
				if (!isset($kodefikasi[0]) OR !isset($kodefikasi[1]) OR !isset($kodefikasi[2]) OR !isset($kodefikasi[3]) OR !isset($kodefikasi[4]) ) {
					echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
					Yii::app()->end();
				}
				$nopokok = $kodefikasi[0];
				$tahunpjk = $kodefikasi[1];
				$bulanpjk = $kodefikasi[2];
				$noskp = $kodefikasi[3];
				$nominalpjk = $kodefikasi[4];

				$query .= 
				$flag . 
				"
				SELECT TBLDAFTHOTEL.*, TBLDAFTAR.*
				,( SELECT TBLREKENING_NAMAREKENING FROM TBLREKENING WHERE 
				TBLREKENING_REKPENDAPATAN=TBLDAFTHOTEL_REKPENDAPATAN
				AND TBLREKENING_REKPAD=TBLDAFTHOTEL_REKPAD
				AND TBLREKENING_REKPAJAK=TBLDAFTHOTEL_REKPAJAK
				AND TBLREKENING_REKAYAT=TBLDAFTHOTEL_REKAYAT
				AND TBLREKENING_REKJENIS=TBLDAFTHOTEL_REKJENIS
				 ) AS NMREK
				FROM TBLDAFTHOTEL
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHOTEL.TBLDAFTAR_NOPOK
				WHERE 
				TBLDAFTHOTEL.TBLDAFTAR_NOPOK = $nopokok
				AND TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK = $tahunpjk
				AND TBLDAFTHOTEL.TBLPENDATAAN_BLNPAJAK = $bulanpjk
				AND NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORSKPD, 0) = $noskp
				";
				$flag = '
				UNION
				';

			}
		}
		// echo "$query";
		$data['list_skpd'] = Yii::app()->db->createCommand($query)->queryAll();
		// print_r($data);Yii::app()->end();
		
		$this->renderPartial('tpl-skpd', array('data'=>$data));
	}

	public function actionCetakNota()
	{
		$data = array();
		$this->renderPartial('view', array('data'=>$data));
	}
}
