<?php

class Pajak_airtanahController extends Controller
{

	public function init()
	{
		Yii::import('ext.DBFetch');
	}

	public function actionIndex()
	{
		$data['kecamatan'] = Yii::app()->db->createCommand("SELECT * FROM REFKECAMATAN")->queryAll();

		$this->renderPartial('index',array('data'=>$data));
	}

	public function actionGetData()
	{
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
		$TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];
		$data['NOURUT'] = $_REQUEST['TBLDAFTTANAH_URUTSKPD'];
		$TBLKECAMATAN_ID = $_REQUEST['TBLKECAMATAN_ID'];
		$TBLDAFTTANAH_ISJNSPENETAPAN = $_REQUEST['TBLDAFTTANAH_ISJNSPENETAPAN'];
		$TBLDAFTTANAH_TGLENTRI = $_REQUEST['TBLDAFTTANAH_TGLENTRI'];

		$select = "CONCAT (
		TBLDAFTTANAH_TGLSKPD,
			CONCAT (
				'/',
				CONCAT (
					TBLDAFTTANAH_BLNSKPD,
					(
						CONCAT (
							'/20',
							TBLDAFTTANAH_THNSKPD
						)
					)
				)
			)
		) AS TGL_SKPD,
		CONCAT (
			TBLDAFTTANAH_TGLENTRI,
			CONCAT (
				'/',
				CONCAT (
					TBLDAFTTANAH_BLNENTRI,
					(
						CONCAT (
							'/20',
							TBLDAFTTANAH_THNENTRI
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
        TBLDAFTTANAH_OMSETPAJAK AS OMZET,
        TBLDAFTTANAH_PAJAK AS PAJAK,

		TBLDAFTTANAH.TBLDAFTTANAH_TGLSKPD,
		TBLDAFTTANAH.TBLDAFTAR_NOPOK,
		TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK,
		TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK,
		TBLDAFTTANAH.TBLPENDATAAN_TGLPAJAK,
		TBLDAFTTANAH.TBLPENDATAAN_PAJAKKE,
		TBLDAFTTANAH.TBLDAFTTANAH_PAJAK,
		TBLDAFTTANAH.TBLDAFTAR_GOLONGAN,
		REFKECAMATAN.REFKECAMATAN_NAMA,
		REFKELURAHAN.REFKELURAHAN_NAMA,
		TBLDAFTTANAH.TBLDAFTTANAH_TOTALVOLUME";
		$from = 'TBLDAFTTANAH';
		$filter = array(
			 'EQ__TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK'=>substr($TBLPENDATAAN_THNPAJAK, -2)
			,'EQ__TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK'=>(int) $TBLPENDATAAN_BLNPAJAK
			,'EQ__TBLDAFTTANAH.TBLKECAMATAN_ID'=>$TBLKECAMATAN_ID
			,'EQ__TBLDAFTTANAH.TBLDAFTTANAH_ISJNSPENETAPAN'=>$TBLDAFTTANAH_ISJNSPENETAPAN
			,'EQ__TBLDAFTTANAH.TBLDAFTTANAH_STATUSDATA'=>3
		);

		$tglentri = '';
        if ( !empty($TBLDAFTTANAH_TGLENTRI) ) {
            $exptglentri = explode('-', $TBLDAFTTANAH_TGLENTRI);
            $tglentri = (int)$exptglentri[0];
            $blnentri = (int)$exptglentri[1];
            $thnentri = (int)$exptglentri[2];
            $filter['EQ__TBLDAFTTANAH_TGLENTRI'] = $tglentri;
            $filter['EQ__TBLDAFTTANAH_BLNENTRI'] = $blnentri;
            $filter['EQ__TBLDAFTTANAH_THNENTRI'] = substr($thnentri, -2);
        }

		$otherquery = array(
			 'leftjoin_wpr'=>array('TBLDAFTAR','TBLDAFTAR.TBLDAFTAR_NOPOK=TBLDAFTTANAH.TBLDAFTAR_NOPOK')
            ,'leftjoin_REFKECAMATAN'=>array('REFKECAMATAN','REFKECAMATAN.REFKECAMATAN_ID=TBLDAFTTANAH.TBLKECAMATAN_ID')
            ,'leftjoin_REFKELURAHAN'=>array('REFKELURAHAN','REFKELURAHAN.REFKELURAHAN_ID=TBLDAFTTANAH.TBLKELURAHAN_ID')
			,'andwhere'=> '
            NVL (TBLDAFTTANAH_URUTSKPD, 0) = 0 
            AND TBLDAFTTANAH.TBLDAFTAR_NOPOK <> 150000
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
		$TBLDAFTTANAH_TGLSKPD = date('Y-m-d',strtotime( $_REQUEST['TBLDAFTTANAH_TGLSKPD'] ));
		$TBLDAFTTANAH_TGLBATASSKPD = date('Y-m-d',strtotime( $_REQUEST['TBLDAFTTANAH_TGLBATASSKPD'] ));

		$THNPAJAK = substr($TBLPENDATAAN_THNPAJAK, -2);
		$BLNPAJAK = (int)$TBLPENDATAAN_BLNPAJAK;
		$TGLSKPD = explode('-', $TBLDAFTTANAH_TGLSKPD);
		$TGLBATASSKPD = explode('-', $TBLDAFTTANAH_TGLBATASSKPD);

		$PajakAirList = explode(',', $listPajakAir);
		$stat = array(); foreach ($PajakAirList as $list) {
			$expList = explode('-', $list);
			$nopokok = $expList[0];	
			$nourut = isset($expList[3]) ? $expList[3] : 0;
			$pajak = isset($expList[4]) ? $expList[4] : 0;

			$update = Yii::app()->db->createCommand();

			if ($THNPAJAK == '20' && $BLNPAJAK == '4' || $BLNPAJAK == '5' || $BLNPAJAK == '6' || $BLNPAJAK == '7') {

				$query = $update->update('TBLDAFTTANAH', array(
					 'TBLDAFTTANAH_THNSKPD' => substr($TGLSKPD[0], -2)
					,'TBLDAFTTANAH_BLNSKPD' => (int) $TGLSKPD[1]
					,'TBLDAFTTANAH_TGLSKPD' => $TGLSKPD[2]
					,'TBLDAFTTANAH_NOMORSKPD' => $nourut
					,'TBLDAFTTANAH_URUTSKPD' => $nourut
					,'TBLDAFTTANAH_PAJAKSKPD' => round($pajak*50/100)
					,'TBLDAFTTANAH_THNBATASSKPD' => substr($TGLBATASSKPD[0], -2)
					,'TBLDAFTTANAH_BLNBATASSKPD' => (int) $TGLBATASSKPD[1]
					,'TBLDAFTTANAH_TGLBATASSKPD' => $TGLBATASSKPD[2]
				), 'TBLDAFTAR_NOPOK=:nopok AND TBLPENDATAAN_THNPAJAK=:thn AND TBLPENDATAAN_BLNPAJAK=:bln', array(':nopok'=>$nopokok,':thn'=>$THNPAJAK,':bln'=>$BLNPAJAK));
			} else {
				$query = $update->update('TBLDAFTTANAH', array(
					 'TBLDAFTTANAH_THNSKPD' => substr($TGLSKPD[0], -2)
					,'TBLDAFTTANAH_BLNSKPD' => (int) $TGLSKPD[1]
					,'TBLDAFTTANAH_TGLSKPD' => $TGLSKPD[2]
					,'TBLDAFTTANAH_NOMORSKPD' => $nourut
					,'TBLDAFTTANAH_URUTSKPD' => $nourut
					,'TBLDAFTTANAH_PAJAKSKPD' => $pajak
					,'TBLDAFTTANAH_THNBATASSKPD' => substr($TGLBATASSKPD[0], -2)
					,'TBLDAFTTANAH_BLNBATASSKPD' => (int) $TGLBATASSKPD[1]
					,'TBLDAFTTANAH_TGLBATASSKPD' => $TGLBATASSKPD[2]
				), 'TBLDAFTAR_NOPOK=:nopok AND TBLPENDATAAN_THNPAJAK=:thn AND TBLPENDATAAN_BLNPAJAK=:bln', array(':nopok'=>$nopokok,':thn'=>$THNPAJAK,':bln'=>$BLNPAJAK));
			}

			
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
			MAX(TBLDAFTTANAH.TBLDAFTTANAH_URUTSKPD)+1 AS NOMORURUT
			FROM
			TBLDAFTTANAH
			WHERE TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = ".$splthn."")->queryRow();

		echo CJSON::encode($data);
	}

	public function actionCetakSKPDWord()
	{
		// error_reporting(0);

		// baca file template, yg dipakai
		// $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
		
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
				SELECT TBLDAFTTANAH.*, TBLDAFTAR.*
				,( SELECT TBLREKENING_NAMAREKENING FROM TBLREKENING WHERE 
				TBLREKENING_REKPENDAPATAN=TBLDAFTTANAH_REKPENDAPATAN
				AND TBLREKENING_REKPAD=TBLDAFTTANAH_REKPAD
				AND TBLREKENING_REKPAJAK=TBLDAFTTANAH_REKPAJAK
				AND TBLREKENING_REKAYAT=TBLDAFTTANAH_REKAYAT
				AND TBLREKENING_REKJENIS=TBLDAFTTANAH_REKJENIS
				 ) AS NMREK,
				 TBLDAFTTANAH_NOMORSKPD AS NOMORSKPD
				FROM TBLDAFTTANAH
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTTANAH.TBLDAFTAR_NOPOK
				WHERE 
				TBLDAFTTANAH.TBLDAFTAR_NOPOK = $nopokok
				AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = $tahunpjk
				AND TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK = $bulanpjk
				AND NVL(TBLDAFTTANAH.TBLDAFTTANAH_NOMORSKPD, 0) = $noskp
				";

				$flag = '
				UNION
				';


			}
		}

		$ORDER_BY = " ORDER BY NOMORSKPD";
		// echo "$query";
		$data['list_skpd'] = Yii::app()->db->createCommand($query.$ORDER_BY)->queryAll();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_skpd' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'SKPD_PAT.docx';

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
			$skpd['noskp'] = $kolom['TBLDAFTTANAH_NOMORSKPD'];
			$skpd['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
			$skpd['alamatbadan'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
			$skpd['thnpajak'] = '20'. $kolom['TBLPENDATAAN_THNPAJAK'];

			$skpd['blnpajak'] = LokalIndonesia::getBulan($kolom['TBLPENDATAAN_BLNPAJAK']);
			$skpd['npwpd'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. $kolom['TBLDAFTAR_NOPOK'] .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);
			
			$skpd['tglbatasskpd'] = $kolom['TBLDAFTTANAH_TGLBATASSKPD'] .' '. LokalIndonesia::getBulan($kolom['TBLDAFTTANAH_BLNBATASSKPD']) .' '. '20'. $kolom['TBLDAFTTANAH_THNBATASSKPD'];
			$skpd['rekkode'] = $kolom['TBLDAFTTANAH_REKURUSAN'] .'.'. $kolom['TBLDAFTTANAH_REKPEMERINTAHAN'] .'.'. $kolom['TBLDAFTTANAH_REKORGANISASI'] .'.'. $kolom['TBLDAFTTANAH_REKPROGRAM'] .'.'. $kolom['TBLDAFTTANAH_REKKEGIATAN'] .'.'. $kolom['TBLDAFTTANAH_REKDINAS'] .'.'. $kolom['TBLDAFTTANAH_REKBIDANG'] .'.'. $kolom['TBLDAFTTANAH_REKPENDAPATAN'] .'.'. $kolom['TBLDAFTTANAH_REKPAD'] .'.'. $kolom['TBLDAFTTANAH_REKPAJAK'] .'.'. $kolom['TBLDAFTTANAH_REKAYAT'] .'.'. $kolom['TBLDAFTTANAH_REKJENIS'];

			$skpd['nmrek'] = $kolom['NMREK'];
			$skpd['vol'] = $kolom['TBLDAFTTANAH_TOTALVOLUME'];

			$skpd['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTTANAH_PAJAK']);
			$skpd['bunga'] = LokalIndonesia::ribuan($kolom['TBLDAFTTANAH_BUNGASPTPD']);
			$stimulus = LokalIndonesia::ribuan($kolom['TBLDAFTTANAH_PAJAK']*50/100);

			if ($kolom['TBLPENDATAAN_THNPAJAK'] == '20' && ($kolom['TBLPENDATAAN_BLNPAJAK'] == '4' || $kolom['TBLPENDATAAN_BLNPAJAK'] == '5' || $kolom['TBLPENDATAAN_BLNPAJAK'] == '6' || $kolom['TBLPENDATAAN_BLNPAJAK'] == '7')) {
				$skpd['stimulus_text'] = 'Stimulus Pengurangan Pajak 50%';
				$skpd['stimulus_rp'] = '-'.$stimulus; 
			} else {
				$skpd['stimulus_text'] = '';
				$skpd['stimulus_rp'] = '';
			}
			
			$skpd['rpskp'] = LokalIndonesia::ribuan($kolom['TBLDAFTTANAH_PAJAKSKPD']);

			$skpd['total'] = LokalIndonesia::ribuan($kolom['TBLDAFTTANAH_PAJAKSKPD']+$kolom['TBLDAFTTANAH_BUNGASPTPD']);
			$skpd['terbilang'] = LokalIndonesia::terbilangangka($kolom['TBLDAFTTANAH_PAJAKSKPD']+$kolom['TBLDAFTTANAH_BUNGASPTPD']);

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
		$namafileDL = "SKPD-AIRTANAH.docx";
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
				SELECT TBLDAFTTANAH.*, TBLDAFTAR.*
				,( SELECT TBLREKENING_NAMAREKENING FROM TBLREKENING WHERE 
				TBLREKENING_REKPENDAPATAN=TBLDAFTTANAH_REKPENDAPATAN
				AND TBLREKENING_REKPAD=TBLDAFTTANAH_REKPAD
				AND TBLREKENING_REKPAJAK=TBLDAFTTANAH_REKPAJAK
				AND TBLREKENING_REKAYAT=TBLDAFTTANAH_REKAYAT
				AND TBLREKENING_REKJENIS=TBLDAFTTANAH_REKJENIS
				 ) AS NMREK
				FROM TBLDAFTTANAH
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTTANAH.TBLDAFTAR_NOPOK
				WHERE 
				TBLDAFTTANAH.TBLDAFTAR_NOPOK = $nopokok
				AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = $tahunpjk
				AND TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK = $bulanpjk
				AND NVL(TBLDAFTTANAH.TBLDAFTTANAH_NOMORSKPD, 0) = $noskp
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
