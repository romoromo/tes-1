<?php

class InputkeringananController extends Controller
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

		$nopok = Yii::app()->request->getParam('nopok', '');
		$namapemohon = Yii::app()->request->getParam('namapemohon', '');
		$jabatanpemohon = Yii::app()->request->getParam('jabatanpemohon', '');
		$namabadanusaha = Yii::app()->request->getParam('namabadanusaha', '');
		$alamatpemohon = Yii::app()->request->getParam('alamatpemohon', '');
		$teleponpemohon = Yii::app()->request->getParam('teleponpemohon', '');
		$jenispajak = Yii::app()->request->getParam('jenispajak', '');
		$jenisketetapan = Yii::app()->request->getParam('jenisketetapan', '');
		$jenisringan = Yii::app()->request->getParam('jenisringan', '');
		$besarpengurangan = Yii::app()->request->getParam('besarpengurangan', '');
		$alasan = Yii::app()->request->getParam('alasan', '');
		$cmd = Yii::app()->request->getParam('cmd','');
		$idupdate = Yii::app()->request->getParam('id','');

		$daftarmasapajak = $_POST['daftarmasapajak'];
		$datadetail = CJSON::decode($daftarmasapajak);
		// Yii::app()->end();

		$getwpr = "SELECT * FROM TBLDAFTAR WHERE TBLDAFTAR_NOPOK = " . $nopok . "";
		$reswpr = Yii::app()->db->createCommand($getwpr)->queryRow();

		if ($jenispajak == '1') {
			$tabelspt = 'TBLDAFTHOTEL';
		} elseif ($jenispajak == '2') {
			$tabelspt = 'TBLDAFTRMAKAN';
		} elseif ($jenispajak == '3') {
			$tabelspt = 'TBLDAFTHIBURAN';
		} elseif ($jenispajak == '7') {
			$tabelspt = 'TBLDAFTPARKIR';
		} elseif ($jenispajak == '8') {
			$tabelspt = 'TBLDAFTTANAH';
		}

		$userid = Yii::app()->user->pengguna_id;

		$TBLMOHONRINGAN_ID = '';

		$command = Yii::app()->db->createCommand('call CU_TBLMOHONRINGAN(:TBLMOHONRINGAN_NAMA,:TBLMOHONRINGAN_JAB,:TBLDAFTAR_NOPOK,:TBLMOHONRINGAN_TELP,:TBLMOHONRINGAN_REKAYAT,:TBLMOHONRINGAN_JNSBAYAR,:TBLMOHONRINGAN_JNSRINGAN,:TBLMOHONRINGAN_PERSEN,:TBLMOHONRINGAN_ALASAN,:CMD,:IDPUDATE,:TBLPENGGUNA_ID,:TBLMOHONRINGAN_ID)');
        $command->bindParam(":TBLMOHONRINGAN_NAMA", $namapemohon,PDO::PARAM_STR);
        $command->bindParam(":TBLMOHONRINGAN_JAB", $jabatanpemohon,PDO::PARAM_STR);
        $command->bindParam(":TBLDAFTAR_NOPOK", $nopok,PDO::PARAM_STR);
        $command->bindParam(":TBLMOHONRINGAN_TELP", $teleponpemohon,PDO::PARAM_STR);
        $command->bindParam(":TBLMOHONRINGAN_REKAYAT", $jenispajak,PDO::PARAM_STR);
        $command->bindParam(":TBLMOHONRINGAN_JNSBAYAR",$jenisketetapan,PDO::PARAM_STR);
        $command->bindParam(":TBLMOHONRINGAN_JNSRINGAN",$jenisringan,PDO::PARAM_STR);
        $command->bindParam(":TBLMOHONRINGAN_PERSEN",$besarpengurangan,PDO::PARAM_STR);
        $command->bindParam(":TBLMOHONRINGAN_ALASAN",$alasan,PDO::PARAM_STR);
		$command->bindParam(":CMD", $cmd, PDO::PARAM_STR);
		$command->bindParam(":IDPUDATE", $idupdate, PDO::PARAM_STR);
        $command->bindParam(":TBLPENGGUNA_ID",$userid,PDO::PARAM_STR); // in
        $command->bindParam(":TBLMOHONRINGAN_ID", $TBLMOHONRINGAN_ID,PDO::PARAM_STR, 20); // out
        // $command->bindParam(":BUNDEL",$no_bundel,PDO::PARAM_STR, 4);
        // $command->bindParam(":URUT",$no_urut,PDO::PARAM_STR, 3);
        $command->execute();

		// echo $TBLMOHONRINGAN_ID;Yii::app()->end();

		if ($cmd=='edit') {
			$sqldeletedaftringan = "DELETE FROM TBLDAFTRINGAN WHERE TBLMOHONRINGAN_ID =:id";
			Yii::app()->db->createCommand($sqldeletedaftringan)->bindparam(':id', $TBLMOHONRINGAN_ID)->execute();
		}

		foreach ($datadetail as $rowspt) {
			$thp = $rowspt['thp'];
			$blp = $rowspt['blp'];
			$noketetapan = $rowspt['nokb'];
			$rpketetapan = $rowspt['rpkb'];


			$getspt = "SELECT * FROM " . $tabelspt . " WHERE 
			TBLPENDATAAN_THNPAJAK = " . $thp . "
			AND TBLPENDATAAN_BLNPAJAK = " . $blp . "
			AND NVL(TBLPENDATAAN_TGLPAJAK,0) = '0'
			AND TBLDAFTAR_NOPOK = " . $nopok . "
			";
			$resspt = Yii::app()->db->createCommand($getspt)->queryRow();

			// $insert = Yii::app()->db->createCommand();
			$arrayData = array(



				'TBLPENDATAAN_THNPAJAK' => intval($thp),
				'TBLPENDATAAN_BLNPAJAK' => intval($blp),
				'TBLDAFTAR_JNSPENDAPATAN' => 'P',
				'TBLDAFTAR_GOLONGAN' => intval($reswpr['TBLDAFTAR_GOLONGAN']),
				'TBLDAFTAR_NOPOK' => intval($nopok),
				'TBLKECAMATAN_ID' => intval($reswpr['TBLKECAMATAN_IDBADANUSAHA']),
				'TBLKELURAHAN_ID' => intval($reswpr['TBLKELURAHAN_IDBADANUSAHA']),
				'TBLDAFTRINGAN_REKURUSAN' => intval($resspt[$tabelspt.'_REKURUSAN']),
				'TBLDAFTRINGAN_REKPEMERINTAHAN' =>  intval($resspt[$tabelspt.'_REKPEMERINTAHAN']),
				'TBLDAFTRINGAN_REKORGANISASI' => intval($resspt[$tabelspt.'_REKORGANISASI']),
				'TBLDAFTRINGAN_REKPROGRAM' => intval($resspt[$tabelspt.'_REKPROGRAM']),
				'TBLDAFTRINGAN_REKKEGIATAN' => intval($resspt[$tabelspt.'_REKKEGIATAN']),
				'TBLDAFTRINGAN_REKDINAS' => intval($resspt[$tabelspt.'_REKDINAS']),
				'TBLDAFTRINGAN_REKBIDANG' => intval($resspt[$tabelspt.'_REKBIDANG']),
				'TBLDAFTRINGAN_REKPENDAPATAN' => intval($resspt[$tabelspt.'_REKPENDAPATAN']),
				'TBLDAFTRINGAN_REKPAD' => intval($resspt[$tabelspt.'_REKPAD']),
				'TBLDAFTRINGAN_REKPAJAK' => intval($resspt[$tabelspt.'_REKPAJAK']),
				'TBLDAFTRINGAN_REKAYAT' => intval($jenispajak),
				'TBLDAFTRINGAN_REKJENIS' => intval($resspt[$tabelspt.'_REKJENIS']),
				'TBLDAFTRINGAN_POKAWAL' => $rpketetapan,
				'TBLDAFTRINGAN_JNS' => $jenisringan,
				'TBLDAFTRINGAN_REGKETETAPAN' => $noketetapan,
				'TBLMOHONRINGAN_ID' => intval($TBLMOHONRINGAN_ID)

			);
			// echo CJSON::encode($arrayData);Yii::app()->end();
			$simpan = Yii::app()->db->createCommand()->insert('TBLDAFTRINGAN', $arrayData);
		}

		if ($simpan > 0) {
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
			, ', ') WITHIN GROUP (ORDER BY TBLPENDATAAN_THNPAJAK) AS THPBLP
		";
		$from = "TBLMOHONRINGAN";
		$otherquery = $this->param_grid();
		$otherquery = array_merge(
			$otherquery,
			array(
				// 'order' => DTPipeLine::getOrder()
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
				TBLREKENING_NAMAREKENING,
				TBLMOHONRINGAN_JNSBAYAR,
				TBLMOHONRINGAN_PERSEN,
				TBLMOHONRINGAN_ALASAN,
				TBLMOHONRINGAN.TBLMOHONRINGAN_ID'
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

	public function actioneditdata()
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
