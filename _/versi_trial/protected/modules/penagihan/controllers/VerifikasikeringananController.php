<?php

class VerifikasikeringananController extends Controller
{
	public function actionIndex()
	{

		$this->renderPartial('index');
	}


	public function actionAutocompletePegawai()
	{

		$this->renderPartial('autocomplete');
	}

	public function actionsimpan()
	{
		Yii::import('ext.LokalIndonesia');

		$idupdate = Yii::app()->request->getParam('id','');

		$hasilpenelitian = Yii::app()->request->getParam('hasilpenelitian', '');
		$hasilkeputusan = Yii::app()->request->getParam('hasilkeputusan', '');
		$besardikabulkan = Yii::app()->request->getParam('besardikabulkan', '');
		$tim = Yii::app()->request->getParam('tim', '');

		$command = Yii::app()->db->createCommand();
		$update = $command->update('TBLMOHONRINGAN', array(
			'TBLMOHONRINGAN_HASILBA' => $hasilpenelitian,
			'TBLMOHONRINGAN_HASILKEP' => $hasilkeputusan,
			'TBLMOHONRINGAN_PERSENKEP' => $besardikabulkan,
			'TBLMOHONRINGAN_TIM' => $tim,
		), '
				TBLMOHONRINGAN_ID=:id
				', array(':id' => $idupdate));

		

		if ($update) {
			echo CJSON::encode(array('status' => 'success'));
		} else {
			echo CJSON::encode(array('status' => 'failed'));
		}
	}

	public function actionLoadMasapajak()
	{

		$nopok = Yii::app()->request->getParam('nopok','');
		$jenispajak = Yii::app()->request->getParam('jenispajak', '');
		$jenisketetapan = Yii::app()->request->getParam('jenisketetapan','');

		if ($jenispajak == '1') {
			$tabelspt = 'TBLDAFTHOTEL';
			$nakb = 'KENAIKANKRGBAYAR';
		} elseif ($jenispajak == '2') {
			$tabelspt = 'TBLDAFTRMAKAN';
			$nakb = 'KENAIKANKRGBAYAR';
		} elseif ($jenispajak == '3') {
			$tabelspt = 'TBLDAFTHIBURAN';
			$nakb = 'NAKB';
		} elseif ($jenispajak == '7') {
			$tabelspt = 'TBLDAFTPARKIR';
			$nakb = 'NAKB';
		} elseif ($jenispajak == '8') {
			$tabelspt = 'TBLDAFTTANAH';
			$nakb = 'NAKB';
		}

		$data['masapajak'] = Yii::app()->db->createCommand()
		->select(''.$tabelspt.'.TBLPENDATAAN_THNPAJAK THP,
			'.$tabelspt.'.TBLPENDATAAN_BLNPAJAK BLP,
			'.$tabelspt.'.TBLDAFTAR_NOPOK NOPOK,
			TO_NUMBER( '.$tabelspt.'_REGKURANGBAYAR ) NOKB,
			'.$tabelspt.'.'.$tabelspt.'_PAJAKPERIKSA PAJAKP,
			'.$tabelspt.'.'.$tabelspt.'_BUNGAKRGBAYAR BUKB,
			'.$tabelspt.'.'.$tabelspt.'_'.$nakb.' NAKB,
			'.$tabelspt.'.'.$tabelspt.'_DENDAKRGBAYAR ADKB,
			'.$tabelspt.'.'.$tabelspt.'_RUPIAHKRGBAYAR RPKB,
			'.$tabelspt.'.'.$tabelspt.'_REKAYAT AYT,
			'.$tabelspt.'.'.$tabelspt.'_THNKURANGBAYAR THKB,
			'.$tabelspt.'.'.$tabelspt.'_BLNKURANGBAYAR BLKB,
			'.$tabelspt.'.'.$tabelspt.'_TGLKURANGBAYAR HRKB,
			'.$tabelspt.'.'.$tabelspt.'_THNBTSKRGBAYAR THBKB,
			'.$tabelspt.'.'.$tabelspt.'_BLNBTSKRGBAYAR BLBKB,
			'.$tabelspt.'.'.$tabelspt.'_TGLBTSKRGBAYAR HRBKB,
			'.$tabelspt.'.'.$tabelspt.'_REGSURATANGSUR NOANG')
		->from(''.$tabelspt.'')
		->leftJoin("TBLSETOR", "".$tabelspt.".TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
		and ".$tabelspt.".TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK
		and NVL(".$tabelspt.".TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0)
		and ".$tabelspt.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
		and TBLSETOR.TBLSETOR_JNSBAYAR = '".$jenisketetapan."'
		and TBLSETOR.TBLSETOR_REKAYAT = ".$jenispajak."")
		->where('TO_NUMBER( '.$tabelspt.'_REGKURANGBAYAR ) > 0
		AND '.$tabelspt.'.TBLPENDATAAN_THNPAJAK >= 11
		AND ( '.$tabelspt.'_THNKURANGBAYAR > 0 OR '.$tabelspt.'_BLNKURANGBAYAR > 0 OR '.$tabelspt.'_TGLKURANGBAYAR > 0 )
		AND '.$tabelspt.'.TBLDAFTAR_NOPOK =: nopok
		AND TBLSETOR.TBLPENDATAAN_THNPAJAK IS NULL
		AND NVL('.$tabelspt.'.'.$tabelspt.'_REGSURATANGSUR,0) = 0
		',array(':nopok'=>$nopok))
		// ->order('tmrekening_kode')
		->queryAll();
		
		$this->renderPartial('tabel_masapajak',array('data'=>$data, 'jenisketetapan'=>$jenisketetapan));
	}

	public function actionDTJSON()
	{
		Yii::import('ext.DTPipeLine');


		$filter_AND = array(
			
		);

		
		$select = "
		TBLMOHONRINGAN.TBLDAFTAR_NOPOK,
		TBLREKENING_NAMAREKENING,
		TBLMOHONRINGAN_JNSBAYAR,
		(TBLMOHONRINGAN_PERSEN || ' %') TBLMOHONRINGAN_PERSEN,
		TBLMOHONRINGAN_ALASAN,
		TBLMOHONRINGAN.TBLMOHONRINGAN_ID,
		TO_CHAR(TBLMOHONRINGAN.SYSCREATE, 'dd-mm-yyyy hh24:mi:ss') TGLINPUT,
		LISTAGG(
			( '20' || LPAD(TBLPENDATAAN_THNPAJAK,2,'0') || ' ' || TO_CHAR(TO_DATE(TBLPENDATAAN_BLNPAJAK,'MM'), 'fmMonth'))
			, ', ') WITHIN GROUP (ORDER BY TBLPENDATAAN_THNPAJAK) AS THPBLP,
		NVL(TBLMOHONRINGAN_PERSENKEP,0) TBLMOHONRINGAN_PERSENKEP
		";
		$from = "TBLMOHONRINGAN";
		$otherquery = $this->param_grid();
		$otherquery = array_merge(
			$otherquery,
			array(
				'order' => 'TBLMOHONRINGAN.SYSCREATE, TBLMOHONRINGAN_HASILBA',
				'limit' => DTPipeLine::getRows(), 'offset' => DTPipeLine::getStart()
			)
		);
		$filter = array(
			"LK__TBLMOHONRINGAN.TBLDAFTAR_NOPOK" => DTPipeLine::getSearch(),
		);

		$data = DBFetch::query(array('select' => $select, 'from' => $from, 'otherquery' => $otherquery, 'filter' => $filter, 'filter_AND' => $filter_AND, 'filterOR' => true, 'mode' => 'LIST'));

		$results = array();
		$no = 1 + DTPipeLine::getStart(); // sesuaikan juga mulai offset ke berapa
		foreach ($data as $row) {
			$results[] = array_merge(
				array(
					'num'    => $no++,
					// 'enc_id' => DMSec::enc($row["TBLMOHONRINGAN.TBLMOHONRINGAN_ID"]),
				),
				$row
			);
			// $results[] = $row;
		}

		$select = 'count(TBLMOHONRINGAN.TBLMOHONRINGAN_ID)';
		$otherquery = $this->param_grid();
		$dataTotal = DBFetch::query(array('select' => $select, 'from' => $from, 'mode' => 'SCALAR'));

		unset($otherquery['limit']); //remove limit untuk mengakali filtered record
		$data_filtered = DBFetch::query(array('select' => $select, 'from' => $from, 'filter' => $filter, 'otherquery' => $otherquery, 'filter_AND' => $filter_AND, 'filterOR' => true, 'mode' => 'SCALAR'));

		echo DTPipeLine::generateJSON(
			array(
				'useJSONHeader' => true, 'COLUMN_AS_KEY' => true, 'DATA_FETCHED' => $results, 'TOTAL_RECORDS' => (int) $dataTotal
				// ,'TOTAL_FILTERED_RECORDS' => DTPipeLine::getSearch()=='' ? (int)$dataTotal : (int)count($results)
				, 'TOTAL_FILTERED_RECORDS' => (DTPipeLine::getSearch() == '' && !DBFetch::isFilterAND($filter_AND)) ? (int)$dataTotal : (int)($data_filtered)
			)
		);
	}

	public function param_grid()
	{
		/* method ini untuk menentukan otherquery dari datatable pipeline*/
		return $otherquery = array(
			"leftjoin_tbldaftarringan" => array("TBLDAFTRINGAN", "TBLMOHONRINGAN.TBLMOHONRINGAN_ID = TBLDAFTRINGAN.TBLMOHONRINGAN_ID")
			,"leftjoin_tblrekening" => array("TBLREKENING", "TBLMOHONRINGAN.TBLMOHONRINGAN_REKAYAT = TBLREKENING.TBLREKENING_REKAYAT AND TBLREKENING_REKPAD = 1 AND TBLREKENING_REKPAJAK = 1 AND TBLREKENING_REKJENIS = 0")
			,'group' => 'TBLMOHONRINGAN.TBLDAFTAR_NOPOK,
				TBLMOHONRINGAN.SYSCREATE,
				TBLMOHONRINGAN_HASILBA,
				TBLREKENING_NAMAREKENING,
				TBLMOHONRINGAN_JNSBAYAR,
				TBLMOHONRINGAN_PERSEN,
				TBLMOHONRINGAN_ALASAN,
				TBLMOHONRINGAN.TBLMOHONRINGAN_ID
				,TBLMOHONRINGAN_PERSENKEP'
		);
	}

	public function actionhapus()
	{
		$id 	= Yii::app()->request->getParam('id');
		$sqldaftringan = "DELETE FROM TBLDAFTRINGAN WHERE TBLMOHONRINGAN_ID = ".$id."";
		$exec1 = Yii::app()->db->createCommand($sqldaftringan)->execute();
		$sqlmohonringan = "DELETE FROM TBLMOHONRINGAN WHERE TBLMOHONRINGAN_ID = ".$id."";
		$exec2 = Yii::app()->db->createCommand($sqlmohonringan)->execute();
		if ($exec2) {
			echo CJSON::encode(array('status' => "success"));
		} else {
			echo CJSON::encode(array('status' => "failed"));
		}
	}

	public function actionverifikasidata()
	{
		$id = Yii::app()->request->getParam('id');

		$sqleditdaftringan = "SELECT TBLDAFTRINGAN.*,TO_CHAR(TO_DATE(TBLPENDATAAN_BLNPAJAK,'MM'), 'fmMonth') CONVBULAN FROM TBLDAFTRINGAN WHERE TBLMOHONRINGAN_ID =:id";
		$res1 = Yii::app()->db->createCommand($sqleditdaftringan)->bindparam(':id',$id)->queryAll();

		$sqleditmohonringan = "SELECT TBLMOHONRINGAN.*,TBLDAFTAR_BADANUSAHANAMA,TBLDAFTAR_BADANUSAHAALAMAT FROM TBLMOHONRINGAN LEFT JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = TBLMOHONRINGAN.TBLDAFTAR_NOPOK WHERE TBLMOHONRINGAN_ID =:id";
		$res2 = Yii::app()->db->createCommand($sqleditmohonringan)->bindparam(':id',$id)->queryRow();

		$model['daftringan'] = $res1;
		$model['mohonringan'] = $res2;

		echo CJSON::encode(array('status' => 'found', 'data' => $model));
		

	}

	public function actionAutocomplete()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');

		$query = trim($_REQUEST['query']);

		// -- tprosesusaha.tprosesdaftar_npwprd,
		// -- tprosesusaha.tprosesusaha_nama,
		// -- tprosesusaha.tprosesusaha_id,
		// -- tprosesusaha.tprosesusaha_alamat
		$select = "
		TBLDAFTAR_NOPOK,
		TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR_BADANUSAHAALAMAT,
		REFBADANUSAHA_REKAYAT
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'LK__TBLDAFTAR_NOPOK'   => $query,
			'LK__TBLDAFTAR_BADANUSAHANAMA'   => $query,

		);

		// $filter_AND = array(
		// 	'EQ__trefjenis_kode' => 'R'
		// );

		$otherquery = array(
			'leftjoin_refbadanusaha'=>array('REFBADANUSAHA', 'TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA = REFBADANUSAHA.REFBADANUSAHA_ID')
			// 'join_tproseskios' => array('tproseskios kios', 'tprosesdaftar.tprosesdaftar_id = kios.tprosesdaftar_id'),
			// 'join_trefpasar' => array('trefpasar pasar', 'pasar.trefpasar_id = kios.trefpasar_id'),
			,'limit' => 10
			,'andwhere'=> 'REFBADANUSAHA_REKAYAT IN (1,2,3,4,7,8)'
		);

		$arrayConfig = array('select' => $select, 'from' => $from, 'filter' => $filter, 'filterOR' => true, 'otherquery' => $otherquery, 'mode' => 'LIST');
		$results = DBFetch::query($arrayConfig);

		$suggestions = array();

		foreach ($results as $result) {
			$suggestions[] = array(
				"value" => $result['TBLDAFTAR_NOPOK'] . ' | ' . $result['TBLDAFTAR_BADANUSAHANAMA'] .'|'. $result['TBLDAFTAR_BADANUSAHAALAMAT'], 
				"TBLDAFTAR_NOPOK" => $result['TBLDAFTAR_NOPOK'],
				"TBLDAFTAR_BADANUSAHANAMA" => $result['TBLDAFTAR_BADANUSAHANAMA'],
				"TBLDAFTAR_BADANUSAHAALAMAT"   => $result['TBLDAFTAR_BADANUSAHAALAMAT'],
				"REFBADANUSAHA_REKAYAT" => $result['REFBADANUSAHA_REKAYAT'], 
				// "trefpasar_id" => $result['trefpasar_id'], 
				// "trefpasar_nama" => $result['trefpasar_nama']
			);
		}


		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function actioncetakba()
	{
		$id = Yii::app()->request->getParam('id');

		$sqlmohonringan = "SELECT TBLMOHONRINGAN.*,
		TRIM(TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA),
		TRIM(TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT),
		TBLDAFTAR_GOLONGAN,
		TBLKECAMATAN_IDBADANUSAHA,
		TBLKELURAHAN_IDBADANUSAHA
		 FROM TBLMOHONRINGAN 
		 JOIN TBLDAFTAR ON TBLMOHONRINGAN.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK WHERE TBLMOHONRINGAN_ID = ".$id."";
		$data['utama'] = Yii::app()->db->createCommand($sqlmohonringan)->queryRow();

		$sqldaftringan = "SELECT * FROM TBLDAFTRINGAN WHERE TBLMOHONRINGAN_ID =".$id."";
		$data['rinci'] = Yii::app()->db->createCommand($sqldaftringan)->queryAll();

		$sqldaftringangrup = "SELECT LISTAGG(
			( '20' || LPAD(TBLPENDATAAN_THNPAJAK,2,'0'))
			, ', ') WITHIN GROUP (ORDER BY TBLPENDATAAN_THNPAJAK) AS MASAPAJAK
			
			 FROM TBLDAFTRINGAN WHERE TBLMOHONRINGAN_ID =" . $id . "
		GROUP BY TBLMOHONRINGAN_ID
		";
		$data['rincigrup'] = Yii::app()->db->createCommand($sqldaftringangrup)->queryRow();

		// echo CJSON::encode($data);;Yii::app()->end();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_penagihan' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'BA_SKPDKB.docx';

		Yii::import('ext.DMOpenTBS', true);
		Yii::import('ext.LokalIndonesia');
		DMOpenTBS::init();
		$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
		$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

		$skpd = array();
		$rows = array();

		$kolom = $data['utama'];

		if ($kolom['TBLMOHONRINGAN_REKAYAT'] == '1') {
			$jenispajak = 'HOTEL';
		} elseif ($kolom['TBLMOHONRINGAN_REKAYAT'] == '2') {
			$jenispajak = 'RUMAH MAKAN';
		} elseif ($kolom['TBLMOHONRINGAN_REKAYAT'] == '3') {
			$jenispajak = 'HIBURAN';
		} elseif ($kolom['TBLMOHONRINGAN_REKAYAT'] == '7') {
			$jenispajak = 'PARKIR';
		} elseif ($kolom['TBLMOHONRINGAN_REKAYAT'] == '8') {
			$jenispajak = 'AIR TANAH';
		}

		$skpd['nama'] = $kolom['TBLMOHONRINGAN_NAMA'];
		$skpd['jabatan'] = $kolom['TBLMOHONRINGAN_JAB'];
		$skpd['namausaha'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
		$skpd['alamatusaha'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
		$skpd['nomerwp'] = ''; //nosurat wp
		$skpd['syscreate'] = $kolom['SYSCREATE'];
		$skpd['npwpd'] = 'P.' . $kolom['TBLDAFTAR_GOLONGAN'] . '.' . sprintf("%07d", $kolom['TBLDAFTAR_NOPOK']) . '.' . sprintf("%02d", $kolom['TBLKECAMATAN_IDBADANUSAHA']) . '.' . sprintf("%02d", $kolom['TBLKELURAHAN_IDBADANUSAHA']);

		// $skpd['npwpd'] = $kolom[$this->namatabel . '_NOMORSKPD'];
		$skpd['jenispajak'] = $jenispajak;
		$skpd['jenisbayar'] = $kolom['TBLMOHONRINGAN_JNSBAYAR'];
		$skpd['masapajak'] = $data['rincigrup']['MASAPAJAK'];
		$skpd['alasan'] = $kolom['TBLMOHONRINGAN_ALASAN'];
		$skpd['hasilpenelitian'] = $kolom['TBLMOHONRINGAN_HASILBA'];
		$skpd['hasilkeputusan'] = $kolom['TBLMOHONRINGAN_HASILKEP'];
		$skpd['persenkep'] = $kolom['TBLMOHONRINGAN_PERSENKEP'].'%';

		// $bungaangsur = 0;
		// $totalpokok = 0;
		// $totalangsuran = 0;
		$no = 1;
		foreach ($data['rinci'] as $detail) :
			// $bungaangsurr = $detail['TBLANGSURAN_BUNGAANGSURAN'];
			// $bungaangsur += $detail['TBLANGSURAN_BUNGAANGSURAN'];
			// $totalpokokdanbunga = $detail['TBLANGSURAN_ANGSURAN'] + $detail['TBLANGSURAN_BUNGAANGSURAN'];
			// $totalpokok += $detail['TBLANGSURAN_ANGSURAN'];
			// $totalangsuran += $totalpokokdanbunga;
			$rincian = array(
				'ke' => $no++,
				'tahun' => '20'+$detail['TBLPENDATAAN_THNPAJAK'],
				'ket' => $kolom['TBLMOHONRINGAN_JNSBAYAR'].' ('. LokalIndonesia::getBulan($detail['TBLPENDATAAN_BLNPAJAK']) .' 20'.$detail['TBLPENDATAAN_THNPAJAK'].')',
				'nosk' => $detail['TBLDAFTRINGAN_REGKETETAPAN'],
				// 'tempo' => $detail['TBLANGSURAN_TGLBATASKETETAPAN'] . '/' . (sprintf('%02d', $detail['TBLANGSURAN_BLNBATASKETETAPAN'])) . '/' . ($detail['TBLANGSURAN_THNBATASKETETAPAN']),
				'tempo' => '',
				'pokok' => '',
				'nakb' => '',
				'bukb' => '',
				'adkb' => '',
				'total' => $detail['TBLDAFTRINGAN_POKAWAL'] 

				// 'tglskp' => (sprintf('%02d', $detail['TBLPENDATAAN_BLNPAJAK'])) . ' ' . '00',
			);
			array_push($rows, $rincian);

		endforeach;

		// $skpd['rpangsuran'] = LokalIndonesia::ribuan($angs['TBLANGSURAN_ANGSURAN'], 0, 0);
		// $skpd['rptotalpokok'] = LokalIndonesia::ribuan($totalpokok, 0, 0);
		// $skpd['rpbunga'] = LokalIndonesia::ribuan($bungaangsur, 0, 0);
		// $skpd['rptotalangsur'] = LokalIndonesia::ribuan($totalangsuran, 0, 0);
		// $skpd['rptotalangsur_terbilang'] = LokalIndonesia::terbilangangka($totalangsuran);
		$skpd['datenow'] = date('d') . ' ' . LokalIndonesia::getbulan(date('m')) . ' ' . date('Y');

		//SAMPAI SINI QUERYNYA

		// var_dump($data);
		// echo json_encode($rows);Yii::app()->end();
		// echo json_encode($row);

		// Merge data in the first sheet
		$namafileDL = "BA_SKPDKB.docx";
		$otbs->MergeBlock('rinci', $rows);
		$otbs->MergeField('header', $skpd);
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		// echo "string";Yii::app()->end();
		Yii::app()->end();
	}
}
