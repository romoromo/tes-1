<?php

class Entry_setorpajakv2Controller extends Controller
{
	var $namatabel = 'TBLSETOR';
	public function actionIndex()
	{
		$this->renderPartial('index');
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
			,"TBLDAFTAR_BADANUSAHANAMA" => $result['TBLDAFTAR_BADANUSAHANAMA']
			,"TBLDAFTAR_BADANUSAHAALAMAT" => $result['TBLDAFTAR_BADANUSAHAALAMAT']
			,"TBLDAFTAR_PEMILIKNAMA" => $result['TBLDAFTAR_PEMILIKNAMA']
			,"TBLDAFTAR_PEMILIKALAMAT" => $result['TBLDAFTAR_PEMILIKALAMAT']
			,"TBLDAFTAR_NOPOK" => $result['TBLDAFTAR_NOPOK']
			);
		}

		 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function actiongetDataSetorBPD()
	{
		$tahunpajak = (int)DMOrcl::getRequest('tahunpajak');
		$bulanpajak = (int)DMOrcl::getRequest('bulanpajak');
		$tanggalpajak = (int)DMOrcl::getRequest('tanggalpajak');
		$pajakke = (int)DMOrcl::getRequest('pajakke');
		$nopok = (int)DMOrcl::getRequest('nopok');
		$jenis_setoran = DMOrcl::getRequest('jenis_setoran');

		$tahunsetor = (int)substr(date('Y'), -2);
		$bulansetor = (int)date('m');
		$tglsetor = (int)date('d');

		if ($jenis_setoran=='SKPD' OR $jenis_setoran=='SPTPD') {
				$jnsketetapan = '0';
			}elseif ($jenis_setoran=='SKPDKB') {
				$jnsketetapan = 'K';
			}elseif ($jenis_setoran=='STPD'){
				$jnsketetapan = 'T';
			}elseif ($jenis_setoran=='SKPD-A'){
				$jnsketetapan = 'A';
			}

		$qsetoranbpd = Yii::app()->db->createCommand();
		$qsetoranbpd_today = Yii::app()->db->createCommand();
		$qsetoranbpd_belumproses = Yii::app()->db->createCommand();

		$qsetoranbpd = $qsetoranbpd->select('
			TBLSETORANBPD.*
			,NVL(TBLSETORANBPD_BUNGAKURANGBAYAR, 0) AS TBLSETORANBPD_BUNGAKURANGBAYAR
			,NVL(TBLSETORANBPD_DENDAKURANGBAYAR, 0) AS TBLSETORANBPD_DENDAKURANGBAYAR
			,NVL(DDRET, 0) AS DDRET
			,NVL(TBLSETORANBPD_RUPIAHTAGIHAN, 0) AS TBLSETORANBPD_RUPIAHTAGIHAN
			,NVL(TBLSETORANBPD_BUNGAKETETAPAN, 0) AS TBLSETORANBPD_BUNGAKETETAPAN
			,NVL(TBLSETORANBPD_DENDAKETETAPAN, 0) AS TBLSETORANBPD_DENDAKETETAPAN
			,NVL(TBLSETORANBPD_KETETAPANPAJAK, 0) AS TBLSETORANBPD_KETETAPANPAJAK
		')
		->from('TBLSETORANBPD');
		$setoranbpd = $qsetoranbpd->where("
			TBLPENDATAAN_THNPAJAK = :tahunpajak
			AND TBLPENDATAAN_BLNPAJAK = :bulanpajak
			AND TBLDAFTAR_NOPOK = :nopok
			AND NVL(TBLPENDATAAN_PAJAKKE, 0) = :pajakke
			AND NVL(TBLSETORANBPD_JNSKETETAPAN, 0) = :jnsketetapan
		", array(
			':tahunpajak' => $tahunpajak
			,':bulanpajak' => $bulanpajak
			,':nopok' => $nopok
			,':pajakke' => $pajakke
			, ':jnsketetapan' => $jnsketetapan
		));
			// AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = :tanggalpajak
			// ,':tanggalpajak' => $tanggalpajak

		if (!empty($tanggalpajak)) {
			$qsetoranbpd->andWhere(' NVL(TBLPENDATAAN_TGLPAJAK, 0) = :tanggalpajak', array(':tanggalpajak' => $tanggalpajak));
		}

		// print_r($jnsketetapan);die();


		$qsetoranbpd_belumproses = $qsetoranbpd_belumproses->select('
			TBLSETORANBPD.*
			,NVL(TBLSETORANBPD_BUNGAKURANGBAYAR, 0) AS TBLSETORANBPD_BUNGAKURANGBAYAR
			,NVL(TBLSETORANBPD_DENDAKURANGBAYAR, 0) AS TBLSETORANBPD_DENDAKURANGBAYAR
			,NVL(DDRET, 0) AS DDRET
			,NVL(TBLSETORANBPD_RUPIAHTAGIHAN, 0) AS TBLSETORANBPD_RUPIAHTAGIHAN
			,NVL(TBLSETORANBPD_BUNGAKETETAPAN, 0) AS TBLSETORANBPD_BUNGAKETETAPAN
			,NVL(TBLSETORANBPD_DENDAKETETAPAN, 0) AS TBLSETORANBPD_DENDAKETETAPAN
			,NVL(TBLSETORANBPD_KETETAPANPAJAK, 0) AS TBLSETORANBPD_KETETAPANPAJAK
		')
		->from('TBLSETORANBPD');
		$qsetoranbpd_belumproses = $qsetoranbpd_belumproses->where("
			TBLPENDATAAN_THNPAJAK = :tahunpajak
			AND TBLPENDATAAN_BLNPAJAK = :bulanpajak
			AND TBLDAFTAR_NOPOK = :nopok
			AND NVL(TBLPENDATAAN_PAJAKKE, 0) = :pajakke
			AND NVL(TBLSETORANBPD_JNSKETETAPAN, 0) = :jnsketetapan
			AND TBLSETORANBPD.TBLSETORANBPD_ISBPD IS NULL
		", array(
			':tahunpajak' => $tahunpajak
			,':bulanpajak' => $bulanpajak
			,':nopok' => $nopok
			,':pajakke' => $pajakke
			, ':jnsketetapan' => $jnsketetapan
		));
			// AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = :tanggalpajak
			// ,':tanggalpajak' => $tanggalpajak

		if (!empty($tanggalpajak)) {
			$qsetoranbpd_belumproses->andWhere(' NVL(TBLPENDATAAN_TGLPAJAK, 0) = :tanggalpajak', array(':tanggalpajak' => $tanggalpajak));
		}

		$qsetoranbpd_today = $qsetoranbpd_today->select('
			TBLSETORANBPD.*
			,NVL(TBLSETORANBPD_BUNGAKURANGBAYAR, 0) AS TBLSETORANBPD_BUNGAKURANGBAYAR
			,NVL(TBLSETORANBPD_DENDAKURANGBAYAR, 0) AS TBLSETORANBPD_DENDAKURANGBAYAR
			,NVL(DDRET, 0) AS DDRET
			,NVL(TBLSETORANBPD_RUPIAHTAGIHAN, 0) AS TBLSETORANBPD_RUPIAHTAGIHAN
			,NVL(TBLSETORANBPD_BUNGAKETETAPAN, 0) AS TBLSETORANBPD_BUNGAKETETAPAN
			,NVL(TBLSETORANBPD_DENDAKETETAPAN, 0) AS TBLSETORANBPD_DENDAKETETAPAN
			,NVL(TBLSETORANBPD_KETETAPANPAJAK, 0) AS TBLSETORANBPD_KETETAPANPAJAK
		')
		->from('TBLSETORANBPD');
		$setoranbpd_today = $qsetoranbpd_today->where("
			TBLPENDATAAN_THNPAJAK = :tahunpajak
			AND TBLPENDATAAN_BLNPAJAK = :bulanpajak
			AND TBLDAFTAR_NOPOK = :nopok
			AND NVL(TBLPENDATAAN_PAJAKKE, 0) = :pajakke
			AND TBLSETORANBPD_THNSETOR = :tahunsetor
			AND TBLSETORANBPD_BLNSETOR = :bulansetor
			AND TBLSETORANBPD_TGLSETOR = :tglsetor
			AND NVL(TBLSETORANBPD_JNSKETETAPAN, 0) = :jnsketetapan
		", array(
			':tahunpajak' => $tahunpajak
			,':bulanpajak' => $bulanpajak
			,':nopok' => $nopok
			,':pajakke' => $pajakke
			,':tahunsetor' => $tahunsetor
			,':bulansetor' => $bulansetor
			,':tglsetor' => $tglsetor
			,':jnsketetapan' => $jnsketetapan
		));

		// AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = :tanggalpajak
		// ,':tanggalpajak' => $tanggalpajak

		if (!empty($tanggalpajak)) {
			$qsetoranbpd_today->andWhere(' NVL(TBLPENDATAAN_TGLPAJAK, 0) = :tanggalpajak', array(':tanggalpajak' => $tanggalpajak));
		}

		$setoranbpd_today = $qsetoranbpd_today->queryRow();
		$setoranbpd = $qsetoranbpd->queryRow();
		$qsetoranbpd_belumproses= $qsetoranbpd_belumproses->queryRow();
		// print_r($setoranbpd);
		// echo print_r(array($setoranbpd->text,$setoranbpd->params));Yii::app()->end();

		if (!$setoranbpd) {
			echo CJSON::encode(array('status'=>'notfound', 'message'=>'Referensi dari Bendahara Belum Ada, Cek Jenis Setoran atau Masa Pajak'));
			Yii::app()->end();
		}

		if (!$setoranbpd_today) {
			echo CJSON::encode(array('status'=>'nottoday', 'message'=>'Cek tanggal SSPD. Pastikan tanggal SSPD sama dengan hari ini'));
			Yii::app()->end();
		}

		if (!$qsetoranbpd_belumproses) {
			echo CJSON::encode(array('status'=>'isbpdnotempty', 'message'=>'Data Sudah Pernah Diproses'));
			Yii::app()->end();
		}

		if (strtoupper($jenis_setoran)=='SKPD-A') {
			# SKPD/SPTPD
			$bunga = $setoranbpd['TBLSETORANBPD_BUNGAKETETAPAN'];
			$denda = $setoranbpd['TBLSETORANBPD_DENDAKETETAPAN'];
			$pajak = $setoranbpd['TBLSETORANBPD_KETETAPANPAJAK'];

			$jmlsetor = $bunga + $denda + $pajak;
			$nmdd = 'DND SK-A';
			$nmsu = 'BNG SK-A';

			$rpset = $setoranbpd['TBLSETORANBPD_RUPIAHSETOR'];
			$buskp = $setoranbpd['TBLSETORANBPD_BUNGAKETETAPAN'];
			$ddskp = $setoranbpd['TBLSETORANBPD_DENDAKETETAPAN'];
			$caption = 'SKPD-A';
		} elseif ($jenis_setoran=='SKPD' OR $jenis_setoran=='SPTPD') {
			# SKPD/SPTPD
			$bunga = $setoranbpd['TBLSETORANBPD_BUNGAKETETAPAN'];
			$denda = $setoranbpd['TBLSETORANBPD_DENDAKETETAPAN'];
			$pajak = $setoranbpd['TBLSETORANBPD_RUPIAHPAJAK'];

			$jmlsetor = $bunga + $denda + $pajak;
			$nmdd = 'DND SKP';
			$nmsu = 'BNG SKP';

			$rpset = $setoranbpd['TBLSETORANBPD_RUPIAHSETOR'];
			$buskp = $setoranbpd['TBLSETORANBPD_BUNGAKETETAPAN'];
			$ddskp = $setoranbpd['TBLSETORANBPD_DENDAKETETAPAN'];
			$caption = $jenis_setoran;
		} elseif (strtoupper($jenis_setoran)=='STPD') {
			# SKPD/SPTPD
			$bunga = '';
			$denda = $setoranbpd['TBLSETORANBPD_DENDAKETETAPAN'];
			$pajak = $setoranbpd['TBLSETORANBPD_RUPIAHSETOR'];

			$jmlsetor = $pajak + $denda;
			$nmdd = 'DND STP';
			$nmsu = 'BNG STP';

			$rpset = $setoranbpd['TBLSETORANBPD_RUPIAHSETOR'];
			$buskp = '0';
			$ddskp = $setoranbpd['TBLSETORANBPD_DENDAKETETAPAN'];
			$caption = 'STPD';
		} elseif (strtoupper($jenis_setoran)=='SKPDKB') {
			# SKPD/SPTPD
			$bunga = $setoranbpd['TBLSETORANBPD_BUNGAKURANGBAYAR'];
			$denda = $setoranbpd['TBLSETORANBPD_DENDAKURANGBAYAR'] + $setoranbpd['DDRET'];
			$pajak = $setoranbpd['TBLSETORANBPD_RUPIAHSETOR'];

			// $jmlsetor = $setoranbpd['TBLSETORANBPD_RUPIAHTAGIHAN'] + $bunga + $pajak;
			$jmlsetor = $setoranbpd['TBLSETORANBPD_PAJAKKURANGBAYAR'] + $denda;
			$nmdd = 'DND SKB';
			$nmsu = 'BNG SKB';

			$rpset = $setoranbpd['TBLSETORANBPD_RUPIAHSETOR'];
			$buskp = $setoranbpd['TBLSETORANBPD_BUNGAKURANGBAYAR'];
			$ddskp = $setoranbpd['TBLSETORANBPD_DENDAKURANGBAYAR'] + $setoranbpd['DDRET'];
			$caption = 'SKPDKB';
		}

		echo CJSON::encode(array('status'=>'found'
			, 'data' => $setoranbpd
			, 'datasetoran' => array(
				'bunga' => $bunga
				,'denda' => $denda
				,'pajak' => $pajak
				,'jmlsetor' => $jmlsetor
				,'nmdd' => $nmdd
				,'nmsu' => $nmsu
				,'rpset' => $rpset
				,'buskp' => $buskp
				,'ddskp' => $ddskp
				,'caption' => $caption
			)
		));
	}

	public function cekpernahsetor($dataFilter)
	{

		$model = Yii::app()->db->createCommand("
			SELECT COUNT(TBLPENDATAAN_BLNPAJAK) AS JML
			FROM TBLSETOR
			WHERE 
			TBLPENDATAAN_THNPAJAK = ".(int) substr($dataFilter[':tahun'], -2)." 
			AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = ".$dataFilter[':bln']." 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$dataFilter[':tgl']." 
			AND NVL(TBLPENDATAAN_PAJAKKE, 0) = ".$dataFilter[':ke']." 
			AND TBLDAFTAR_NOPOK =".$dataFilter[':nopok']." 
			AND NVL(TBLSETOR_JNSKETETAPAN, 0) ='".$dataFilter[':jnsketetapan']."'
		"
		)->queryRow();
		if ($model['JML']>0) {
			return 'ada';
		}else{
			return 'tidak';
		}
	}

	public function actionSimpan()
	{
		$DATA = $_REQUEST;

		$tahun = isset($DATA['tahun']) && !empty($DATA['tahun']) ? (int)$DATA['tahun'] : 0;
		$bln = isset($DATA['bln']) && !empty($DATA['bln']) ? (int)$DATA['bln'] : 0;
		$tgl = isset($DATA['tgl']) && !empty($DATA['tgl']) ? (int)$DATA['tgl'] : 0;
		$nopok = isset($DATA['nopok']) && !empty($DATA['nopok']) ? (int)$DATA['nopok'] : 0;
		$ke = isset($DATA['ke']) && !empty($DATA['ke']) ? (int)$DATA['ke'] : 0;
		
		$bunga_setor = isset($DATA['bunga_setor']) && !empty($DATA['bunga_setor']) ? LokalIndonesia::toAngka($DATA['bunga_setor']) : 0;
		$denda_setor = isset($DATA['denda_setor']) && !empty($DATA['denda_setor']) ? LokalIndonesia::toAngka($DATA['denda_setor']) : 0;
		$jmlsetor = isset($DATA['jmlsetor']) && !empty($DATA['jmlsetor']) ? LokalIndonesia::toAngka($DATA['jmlsetor']) : 0;
		
		$nmdd = isset($DATA['nmdd']) && !empty($DATA['nmdd']) ? ($DATA['nmdd']) : '';
		$nmsu = isset($DATA['nmsu']) && !empty($DATA['nmsu']) ? ($DATA['nmsu']) : '';
		$caption = isset($DATA['caption']) && !empty($DATA['caption']) ? ($DATA['caption']) : '';

		if ($caption=='SKPD' OR $caption=='SPTPD') {
				$jnsketetapan = '0';
			}elseif ($caption=='SKPDKB') {
				$jnsketetapan = 'K';
			}elseif ($caption=='STPD'){
				$jnsketetapan = 'T';
			}elseif ($caption=='SKPD-A'){
				$jnsketetapan = 'A';
			}

		$whereUpdate = 
			"TBLPENDATAAN_THNPAJAK = :tahun
			AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = :bln
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = :tgl
			AND TBLDAFTAR_NOPOK = :nopok
			AND NVL(TBLPENDATAAN_PAJAKKE, 0) = :ke
			AND NVL(TBLSETORANBPD_JNSKETETAPAN, 0) = :jnsketetapan
			";
		;

		$bindParam = array(
			':tahun' => $tahun
			,':bln' => $bln
			,':tgl' => $tgl
			,':nopok' => $nopok
			,':ke' => $ke
			,':jnsketetapan' => $jnsketetapan
		);

		$arrayOfDataUpdate = array(
			'TBLSETORANBPD_ISBPD' => 'Y'
			,'TBLSETORANBPD_TELERBPD' => 'BPDB ' . Yii::app()->user->username . ' ' . date('H:i:s')
			,'TBLSETORANBPD_TGLBPD' => strtotime(date('Y-m-d'))

		);

		$debug = array();
		foreach ($bindParam as $key => $value) {
			if (empty($value) && in_array($key, explode(',', ':tahun,:nopok')) ) {
				$debug[] = $key . ' harus diisi';
			}
		}

		if (count($debug)>0) {
			echo CJSON::encode(array('status'=>'notvalid', 'message'=>'Ada data yg kurang lengkap', 'debug'=>$debug));
			Yii::app()->end();
		}
		// print_r($debug);
		// print_r($bindParam);
		// Yii::app()->end();

		if ($this->cekpernahsetor($bindParam)=='ada') {
			echo CJSON::encode(array('status'=>'exists', 'message'=>'Data sudah pernah diinputkan'));
			Yii::app()->end();
		}
		// var_dump($this->cekpernahsetor($bindParam));
		// Yii::app()->end();

		$NAMATABEL = 'TBLSETORANBPD';
		$NAMATABEL_INSERT = 'TBLSETOR';

		$setbpd = Yii::app()->db->createCommand()
		->select()
		->from($NAMATABEL)
		->where($whereUpdate, $bindParam)
		->queryRow();

		if (!$setbpd) {
			echo CJSON::encode(array('status'=>'notexists', 'message'=>'Data setoran tidak ditemukan, cek Masa Pajak serta NOPOK'));
			Yii::app()->end();
		}

		$arrayOfDataInsert = array(
			'TBLPENDATAAN_THNPAJAK' => isset($setbpd['TBLPENDATAAN_THNPAJAK']) ? $setbpd['TBLPENDATAAN_THNPAJAK'] : ''
			,'TBLPENDATAAN_BLNPAJAK' => isset($setbpd['TBLPENDATAAN_BLNPAJAK']) ? $setbpd['TBLPENDATAAN_BLNPAJAK'] : ''
			,'TBLPENDATAAN_TGLPAJAK' => isset($setbpd['TBLPENDATAAN_TGLPAJAK']) ? $setbpd['TBLPENDATAAN_TGLPAJAK'] : ''
			,'TBLPENDATAAN_PAJAKKE' => isset($setbpd['TBLPENDATAAN_PAJAKKE']) ? $setbpd['TBLPENDATAAN_PAJAKKE'] : ''
			,'TBLDAFTAR_JNSPENDAPATAN' => isset($setbpd['TBLDAFTAR_JNSPENDAPATAN']) ? $setbpd['TBLDAFTAR_JNSPENDAPATAN'] : ''
			,'TBLDAFTAR_NOPOK' => isset($setbpd['TBLDAFTAR_NOPOK']) ? $setbpd['TBLDAFTAR_NOPOK'] : ''
			,'TBLKECAMATAN_ID' => isset($setbpd['TBLKECAMATAN_ID']) ? $setbpd['TBLKECAMATAN_ID'] : ''
			,'TBLKELURAHAN_ID' => isset($setbpd['TBLKELURAHAN_ID']) ? $setbpd['TBLKELURAHAN_ID'] : ''
			,'TBLR_REKURUSAN' => isset($setbpd[$NAMATABEL.'_REKURUSAN']) ? $setbpd[$NAMATABEL.'_REKURUSAN'] : ''
			,'TBLR_REKPEMERINTAHAN' => isset($setbpd[$NAMATABEL.'_REKPEMERINTAHAN']) ? $setbpd[$NAMATABEL.'_REKPEMERINTAHAN'] : ''
			,'TBLR_REKORGANISASI' => isset($setbpd[$NAMATABEL.'_REKORGANISASI']) ? $setbpd[$NAMATABEL.'_REKORGANISASI'] : ''
			,'TBLSETOR_REKPROGRAM' => isset($setbpd[$NAMATABEL.'_REKPROGRAM']) ? $setbpd[$NAMATABEL.'_REKPROGRAM'] : ''
			,'TBLSETOR_REKKEGIATAN' => isset($setbpd[$NAMATABEL.'_REKKEGIATAN']) ? $setbpd[$NAMATABEL.'_REKKEGIATAN'] : ''
			,'TBLSETOR_REKDINAS' => isset($setbpd[$NAMATABEL.'_REKDINAS']) ? $setbpd[$NAMATABEL.'_REKDINAS'] : ''
			,'TBLSETOR_REKBIDANG' => isset($setbpd[$NAMATABEL.'_REKBIDANG']) ? $setbpd[$NAMATABEL.'_REKBIDANG'] : ''
			,'TBLSETOR_REKPENDAPATAN' => isset($setbpd[$NAMATABEL.'_REKPENDAPATAN']) ? $setbpd[$NAMATABEL.'_REKPENDAPATAN'] : ''
			,'TBLSETOR_REKPAD' => isset($setbpd[$NAMATABEL.'_REKPAD']) ? $setbpd[$NAMATABEL.'_REKPAD'] : ''
			,'TBLSETOR_REKPAJAK' => isset($setbpd[$NAMATABEL.'_REKPAJAK']) ? $setbpd[$NAMATABEL.'_REKPAJAK'] : ''
			,'TBLSETOR_REKAYAT' => isset($setbpd[$NAMATABEL.'_REKAYAT']) ? $setbpd[$NAMATABEL.'_REKAYAT'] : ''
			,'TBLSETOR_REKJENIS' => isset($setbpd[$NAMATABEL.'_REKJENIS']) ? $setbpd[$NAMATABEL.'_REKJENIS'] : ''
			//,'TBLSETOR_REKSUBJENIS' => isset($setbpd[$NAMATABEL.'_REKSUBJENIS']) ? $setbpd[$NAMATABEL.'_REKSUBJENIS'] : '0'
			,'TBLSETOR_REKSUBJENIS' => '0'
			,'TBLSETOR_GOLONGAN' => isset($setbpd[$NAMATABEL.'_GOLONGAN']) ? $setbpd[$NAMATABEL.'_GOLONGAN'] : ''
			,'TBLSETOR_JNSKETETAPAN' => isset($setbpd[$NAMATABEL.'_JNSKETETAPAN']) ? $setbpd[$NAMATABEL.'_JNSKETETAPAN'] : null
			,'KDSU' => ''
			,'TBLSETOR_JNSBAYAR' => isset($setbpd[$NAMATABEL.'_JNSBAYAR']) ? $setbpd[$NAMATABEL.'_JNSBAYAR'] : $caption
			,'TBLSETOR_TGLSURAT' => ''
			,'TBLSETOR_BLNSURAT' => ''
			,'TBLSETOR_THNSURAT' => ''
			,'TBLSETOR_NOMORSURAT' => ''
			,'TBLSETOR_TGLBATASSURAT' => ''
			,'TBLSETOR_BLNBATASSURAT' => ''
			,'TBLSETOR_THNBATASSURAT' => ''
			,'KDMED' => '0'
			,'KDREF' => '0'
			,'KDSET' => '1'
			,'TBLSETOR_STATUSBAYAR' => '10'
			,'TBLSETOR_JENISSETOR' => isset($setbpd[$NAMATABEL.'_JENISSETOR']) ? $setbpd[$NAMATABEL.'_JENISSETOR'] : ''
			,'TBLSETOR_THNSETOR' => isset($setbpd[$NAMATABEL.'_THNSETOR']) ? $setbpd[$NAMATABEL.'_THNSETOR'] : ''
			,'TBLSETOR_BLNSETOR' => isset($setbpd[$NAMATABEL.'_BLNSETOR']) ? $setbpd[$NAMATABEL.'_BLNSETOR'] : ''
			,'TBLSETOR_TGLSETOR' => isset($setbpd[$NAMATABEL.'_TGLSETOR']) ? $setbpd[$NAMATABEL.'_TGLSETOR'] : ''
			,'TBLSETOR_NOMORSSPD' => isset($setbpd[$NAMATABEL.'_NOMORSSPD']) ? $setbpd[$NAMATABEL.'_NOMORSSPD'] : ''
			,'TBLSETOR_THNSSPD' => isset($setbpd[$NAMATABEL.'_THNSSPD']) ? $setbpd[$NAMATABEL.'_THNSSPD'] : ''
			,'TBLSETOR_BLNSSPD' => isset($setbpd[$NAMATABEL.'_BLNSSPD']) ? $setbpd[$NAMATABEL.'_BLNSSPD'] : ''
			,'TBLSETOR_TGLSSPD' => isset($setbpd[$NAMATABEL.'_TGLSSPD']) ? $setbpd[$NAMATABEL.'_TGLSSPD'] : ''
			,'JENSET' => ''
			,'NOCG' => ''
			,'NOREK' => ''
			,'BANK' => ''
			,'BANCB' => ''
			,'TGCGT' => ''
			,'TGCAIR' => ''
			,'LUNAS' => ''
			,'TBLSETOR_JNSTAGIHAN' => ''
			,'TBLSETOR_JNSREKLAME' => ''
			,'BLBU' => ''
			,'BASTP' => ''
			,'TBLSETOR_TGLTAGIHAN' => ''
			,'TBLSETOR_BLNTAGIHAN' => ''
			,'TBLSETOR_THNTAGIHAN' => ''
			,'BAKB' => ''
			,'TBLSETOR_RUPIAHPAJAK' => isset($setbpd[$NAMATABEL.'_RUPIAHPAJAK']) ? $setbpd[$NAMATABEL.'_RUPIAHPAJAK'] : ''
			,'TBLSETOR_RUPIAHSETOR' => isset($setbpd[$NAMATABEL.'_RUPIAHSETOR']) ? $setbpd[$NAMATABEL.'_RUPIAHSETOR'] : ''
			,'RPRET' => ''
			,'TBLSETOR_KETETAPANPAJAK' => isset($setbpd[$NAMATABEL.'_KETETAPANPAJAK']) ? $setbpd[$NAMATABEL.'_KETETAPANPAJAK'] : ''
			,'TBLSETOR_RUPIAHTAGIHAN' => isset($setbpd[$NAMATABEL.'_RUPIAHTAGIHAN']) ? $setbpd[$NAMATABEL.'_RUPIAHTAGIHAN'] : ''
			,'TBLSETOR_PAJAKKURANGBAYAR' => isset($setbpd[$NAMATABEL.'_PAJAKKURANGBAYAR']) ? $setbpd[$NAMATABEL.'_PAJAKKURANGBAYAR'] : ''
			,'TBLSETOR_BUNGAKETETAPAN' => isset($setbpd[$NAMATABEL.'_BUNGAKETETAPAN']) ? $setbpd[$NAMATABEL.'_BUNGAKETETAPAN'] : ''
			,'TBLSETOR_BUNGATAGIHAN' => isset($setbpd[$NAMATABEL.'_BUNGATAGIHAN']) ? $setbpd[$NAMATABEL.'_BUNGATAGIHAN'] : ''
			,'TBLSETOR_BUNGAKURANGBAYAR' => isset($setbpd[$NAMATABEL.'_BUNGAKURANGBAYAR']) ? $setbpd[$NAMATABEL.'_BUNGAKURANGBAYAR'] : ''
			,'BURET' => isset($setbpd[$NAMATABEL.'_BURET']) ? $setbpd[$NAMATABEL.'_BURET'] : ''
			,'TBLSETOR_DENDAKETETAPAN' => isset($setbpd[$NAMATABEL.'_DENDAKETETAPAN']) ? $setbpd[$NAMATABEL.'_DENDAKETETAPAN'] : ''
			,'TBLSETOR_DENDATAGIHAN' => isset($setbpd[$NAMATABEL.'_DENDATAGIHAN']) ? $setbpd[$NAMATABEL.'_DENDATAGIHAN'] : ''
			,'TBLSETOR_DENDAKURANGBAYAR' => isset($setbpd[$NAMATABEL.'_DENDAKURANGBAYAR']) ? $setbpd[$NAMATABEL.'_DENDAKURANGBAYAR'] : ''
			,'DDRET' => isset($setbpd[$NAMATABEL.'_DDRET']) ? $setbpd[$NAMATABEL.'_DDRET'] : ''
			,'NAIK' => ''
			,'ADM' => ''
			,'RPSSKP' => isset($setbpd[$NAMATABEL.'_KETETAPANPAJAK']) ? $setbpd[$NAMATABEL.'_KETETAPANPAJAK'] : ''
			,'RPSSTP' => ''
			,'RPSKB' => ''
			,'RPSRET' => ''
			,'UK1' => ''
			,'UK2' => ''
			,'UK3' => ''
			,'TBLSETOR_LOKET' => ''
			,'DUP' => ''
			,'KET' =>  substr( "BPDB " . Yii::app()->user->nama_pengguna . '   ' . date('H:i:s'), 0, 30)
		);

		// if ($caption=='SKPD-A') {
		// 	$arrayOfDataInsert['TBLSETOR_BUNGAKETETAPAN'] = $arrayOfDataInsert['TBLSETOR_BUNGAKETETAPAN'];
		// }

		$seto = Yii::app()->db->createCommand()
		->insert($NAMATABEL_INSERT, $arrayOfDataInsert);

		if (!empty($bunga_setor)) {
			$arrayOfDataInsert['TBLSETOR_JNSBAYAR'] = $nmsu;
			$arrayOfDataInsert['TBLSETOR_RUPIAHSETOR'] = $bunga_setor;
			$arrayOfDataInsert['TBLSETOR_BUNGAKETETAPAN'] = $bunga_setor;
			$arrayOfDataInsert['TBLSETOR_JNSKETETAPAN'] = isset($setbpd[$NAMATABEL.'_JNSKETETAPAN']) ? $setbpd[$NAMATABEL.'_JNSKETETAPAN'] : '';
			// $arrayOfDataInsert['RPSSKP'] = ;
			$arrayOfDataInsert['TBLSETOR_REKPAJAK'] = '4';
			$arrayOfDataInsert['TBLSETOR_REKAYAT'] = '6';
			$arrayOfDataInsert['TBLSETOR_REKJENIS'] = $setbpd[$NAMATABEL.'_REKAYAT'];
			$arrayOfDataInsert['TBLSETOR_REKSUBJENIS'] = '0';
			$arrayOfDataInsert['TBLSETOR_STATUSBAYAR'] = '10';
			$arrayOfDataInsert['KDMED'] = '0'; 
			$arrayOfDataInsert['KDREF'] = '0'; 
			$arrayOfDataInsert['KDSET'] = '1'; 
			$arrayOfDataInsert['LUNAS'] = ''; 
			$arrayOfDataInsert['KET'] =   substr( "BPDB " . Yii::app()->user->nama_pengguna . '   ' . date('H:i:s'), 0, 30);
			if (empty($jmlsetor))
				$arrayOfDataInsert['JENSET'] = 'B';
			else
				$arrayOfDataInsert['JENSET'] = '';

			$setobunga = Yii::app()->db->createCommand()
			->insert($NAMATABEL_INSERT, $arrayOfDataInsert);
		}

		if (!empty($denda_setor)) {
			$arrayOfDataInsert['TBLSETOR_JNSBAYAR'] = $nmdd;
			$arrayOfDataInsert['TBLSETOR_RUPIAHSETOR'] = $denda_setor;
			$arrayOfDataInsert['TBLSETOR_DENDAKETETAPAN'] = $denda_setor;
			$arrayOfDataInsert['TBLSETOR_JNSKETETAPAN'] = isset($setbpd[$NAMATABEL.'_JNSKETETAPAN']) ? $setbpd[$NAMATABEL.'_JNSKETETAPAN'] : '';
			// $arrayOfDataInsert['RPSSKP'] = ;
			$arrayOfDataInsert['TBLSETOR_REKPAJAK'] = '4';
			$arrayOfDataInsert['TBLSETOR_REKAYAT'] = '7';
			$arrayOfDataInsert['TBLSETOR_REKJENIS'] = $setbpd[$NAMATABEL.'_REKAYAT'];
			if (empty($jmlsetor))
				$arrayOfDataInsert['JENSET'] = 'B';
			else
				$arrayOfDataInsert['JENSET'] = '';

			$setodenda = Yii::app()->db->createCommand()
			->insert($NAMATABEL_INSERT, $arrayOfDataInsert);
		}

		if ($seto>0) {
			$setoranbpd = Yii::app()->db->createCommand()
			->update($NAMATABEL, $arrayOfDataUpdate, $whereUpdate, $bindParam);
			echo CJSON::encode(array('status'=>'success', 'data'=>$arrayOfDataInsert, 'debug'=>$seto));
		} else {
			echo CJSON::encode(array('status'=>'failed', 'data'=>$arrayOfDataInsert));
		}
	}

	public function getRekening($REFBADANUSAHA_ID='0')
	{
		$sql = "
		SELECT
		REFBADANUSAHA.REFBADANUSAHA_ID,
		REFBADANUSAHA.REFBADANUSAHA_NAMA,
		TBLREKENING.TBLREKENING_KODEFULL,
		TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
		TBLREKENING
		INNER JOIN REFBADANUSAHA ON TBLREKENING.TBLREKENING_REKPENDAPATAN = REFBADANUSAHA.REFBADANUSAHA_REKPENDAPATAN 
		AND TBLREKENING.TBLREKENING_REKPAD = REFBADANUSAHA.REFBADANUSAHA_REKPAD 
		AND TBLREKENING.TBLREKENING_REKPAJAK = REFBADANUSAHA.REFBADANUSAHA_REKPJK
		AND TBLREKENING.TBLREKENING_REKAYAT = REFBADANUSAHA.REFBADANUSAHA_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = REFBADANUSAHA.REFBADANUSAHA_REKJENIS
		WHERE REFBADANUSAHA_ID = '{$REFBADANUSAHA_ID}'
		";
		return $model = Yii::app()->db->createCommand( $sql )->queryRow();
	}

	public function actionCetakSSPD()
	{
		$data['URL_APP'] = Yii::app()->getBaseUrl(true);

		$TBLDAFTAR_NOPOK = !empty(DMOrcl::getRequest('TBLDAFTAR_NOPOK')) ? (int)base64_decode(base64_decode(DMOrcl::getRequest('TBLDAFTAR_NOPOK'))) : 0;
		$TBLPENDATAAN_THNPAJAK = !empty(DMOrcl::getRequest('TBLPENDATAAN_THNPAJAK')) ? (int)base64_decode(base64_decode(DMOrcl::getRequest('TBLPENDATAAN_THNPAJAK'))) : 0;
		$TBLPENDATAAN_BLNPAJAK = !empty(DMOrcl::getRequest('TBLPENDATAAN_BLNPAJAK')) ? (int)base64_decode(base64_decode(DMOrcl::getRequest('TBLPENDATAAN_BLNPAJAK'))) : 0;
		$TBLPENDATAAN_TGLPAJAK = !empty(DMOrcl::getRequest('TBLPENDATAAN_TGLPAJAK')) ? (int)base64_decode(base64_decode(DMOrcl::getRequest('TBLPENDATAAN_TGLPAJAK'))) : 0;
		$TBLPENDATAAN_PAJAKKE = !empty(DMOrcl::getRequest('TBLPENDATAAN_PAJAKKE')) ? (int)base64_decode(base64_decode(DMOrcl::getRequest('TBLPENDATAAN_PAJAKKE'))) : 0;
		$TBLSETOR_JNSBAYAR = !empty(DMOrcl::getRequest('TBLSETOR_JNSBAYAR')) ? base64_decode(base64_decode(DMOrcl::getRequest('TBLSETOR_JNSBAYAR'))) : '';

		$NAMATABEL = $this->namatabel;
		//echo "tes";Yii::app()->end();

  //        $select = "
  //        	{$NAMATABEL}.*
  //        	,NVL({$NAMATABEL}_THNSSPD, 0) AS {$NAMATABEL}_THNSKPD
  //        	,NVL({$NAMATABEL}_BLNSSPD, 0) AS {$NAMATABEL}_BLNSKPD
  //        	,NVL({$NAMATABEL}_TGLSSPD, 0) AS {$NAMATABEL}_TGLSKPD
  //        	,NVL(TBLPENDATAAN_BLNPAJAK, 0) AS TBLPENDATAAN_BLNPAJAK
  //        	,NVL(TBLPENDATAAN_TGLPAJAK, 0) AS TBLPENDATAAN_TGLPAJAK
  //        	,NVL(TBLPENDATAAN_PAJAKKE, 0) AS TBLPENDATAAN_PAJAKKE

  //        	,NVL({$NAMATABEL}_BUNGAKETETAPAN, 0) AS {$NAMATABEL}_BUNGAKETETAPAN
  //        	,NVL({$NAMATABEL}_DENDAKETETAPAN, 0) AS {$NAMATABEL}_DENDAKETETAPAN
  //        	,TBLR_REKURUSAN AS {$NAMATABEL}_REKURUSAN
  //        	,TBLR_REKORGANISASI AS {$NAMATABEL}_REKORGANISASI
  //        	,TBLR_REKPEMERINTAHAN AS {$NAMATABEL}_REKPEMERINTAHAN
			
		// 	,TBLDAFTAR.*,
		// 	(
		// 		SELECT
		// 			REFKELURAHAN.REFKELURAHAN_NAMA
		// 		FROM
		// 			REFKELURAHAN
		// 		WHERE
		// 			REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		// 		AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		// 	) AS REFKELURAHAN_NAMA,
		// 	(
		// 		SELECT
		// 			REFKECAMATAN.REFKECAMATAN_NAMA
		// 		FROM
		// 			REFKECAMATAN
		// 		WHERE
		// 			REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		// 	) AS REFKECAMATAN_NAMA,
		// 	(
		// 		SELECT
		// 			REFBADANUSAHA.REFBADANUSAHA_NAMA
		// 		FROM
		// 			REFBADANUSAHA
		// 		WHERE
		// 			REFBADANUSAHA.REFBADANUSAHA_ID = TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA
		// 	) AS REFBADANUSAHA_NAMA,
		// 	(
		// 		SELECT
		// 			TBLSETOR_NOMORSSPD
		// 		FROM
		// 			TBLSETOR
		// 		WHERE
		// 			TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		// 		AND TBLSETOR.TBLPENDATAAN_THNPAJAK = {$NAMATABEL}.TBLPENDATAAN_THNPAJAK
		// 		AND NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK, 0) = NVL({$NAMATABEL}.TBLPENDATAAN_BLNPAJAK, 0)
		// 		AND NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK, 0) = NVL({$NAMATABEL}.TBLPENDATAAN_TGLPAJAK, 0)
		// 		AND NVL(TBLSETOR.TBLPENDATAAN_PAJAKKE, 0) = NVL({$NAMATABEL}.TBLPENDATAAN_PAJAKKE, 0)
		// 		AND TBLSETOR_REKPAJAK=1
		// 	) AS TBLSETOR_NOMORSSPD,
		// 	(
		// 		SELECT
		// 			TBLSETOR_THNSSPD
		// 		FROM
		// 			TBLSETOR
		// 		WHERE
		// 			TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		// 		AND TBLSETOR.TBLPENDATAAN_THNPAJAK = {$NAMATABEL}.TBLPENDATAAN_THNPAJAK
		// 		AND NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK, 0) = NVL({$NAMATABEL}.TBLPENDATAAN_BLNPAJAK, 0)
		// 		AND NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK, 0) = NVL({$NAMATABEL}.TBLPENDATAAN_TGLPAJAK, 0)
		// 		AND NVL(TBLSETOR.TBLPENDATAAN_PAJAKKE, 0) = NVL({$NAMATABEL}.TBLPENDATAAN_PAJAKKE, 0)
		// 		AND TBLSETOR_REKPAJAK=1
		// 	) AS TBLSETOR_THNSSPD,
		// 	(
		// 		SELECT
		// 			TBLSETOR_BLNSSPD
		// 		FROM
		// 			TBLSETOR
		// 		WHERE
		// 			TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		// 		AND TBLSETOR.TBLPENDATAAN_THNPAJAK = {$NAMATABEL}.TBLPENDATAAN_THNPAJAK
		// 		AND NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK, 0) = NVL({$NAMATABEL}.TBLPENDATAAN_BLNPAJAK, 0)
		// 		AND NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK, 0) = NVL({$NAMATABEL}.TBLPENDATAAN_TGLPAJAK, 0)
		// 		AND NVL(TBLSETOR.TBLPENDATAAN_PAJAKKE, 0) = NVL({$NAMATABEL}.TBLPENDATAAN_PAJAKKE, 0)
		// 		AND TBLSETOR_REKPAJAK=1
		// 	) AS TBLSETOR_BLNSSPD,
		// 	(
		// 		SELECT
		// 			TBLSETOR_TGLSSPD
		// 		FROM
		// 			TBLSETOR
		// 		WHERE
		// 			TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		// 		AND TBLSETOR.TBLPENDATAAN_THNPAJAK = {$NAMATABEL}.TBLPENDATAAN_THNPAJAK
		// 		AND NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK, 0) = NVL({$NAMATABEL}.TBLPENDATAAN_BLNPAJAK, 0)
		// 		AND NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK, 0) = NVL({$NAMATABEL}.TBLPENDATAAN_TGLPAJAK, 0)
		// 		AND NVL(TBLSETOR.TBLPENDATAAN_PAJAKKE, 0) = NVL({$NAMATABEL}.TBLPENDATAAN_PAJAKKE, 0)
		// 		AND TBLSETOR_REKPAJAK=1
		// 	) AS TBLSETOR_TGLSSPD
		// ";

         $select = "
         	{$NAMATABEL}.*
         	,NVL({$NAMATABEL}_THNSSPD, 0) AS {$NAMATABEL}_THNSKPD
         	,NVL({$NAMATABEL}_BLNSSPD, 0) AS {$NAMATABEL}_BLNSKPD
         	,NVL({$NAMATABEL}_TGLSSPD, 0) AS {$NAMATABEL}_TGLSKPD
         	,NVL(TBLPENDATAAN_BLNPAJAK, 0) AS TBLPENDATAAN_BLNPAJAK
         	,NVL(TBLPENDATAAN_TGLPAJAK, 0) AS TBLPENDATAAN_TGLPAJAK
         	,NVL(TBLPENDATAAN_PAJAKKE, 0) AS TBLPENDATAAN_PAJAKKE

         	,NVL({$NAMATABEL}_BUNGAKETETAPAN, 0) AS {$NAMATABEL}_BUNGAKETETAPAN
         	,NVL({$NAMATABEL}_DENDAKETETAPAN, 0) AS {$NAMATABEL}_DENDAKETETAPAN
         	,TBLR_REKURUSAN AS {$NAMATABEL}_REKURUSAN
         	,TBLR_REKORGANISASI AS {$NAMATABEL}_REKORGANISASI
         	,TBLR_REKPEMERINTAHAN AS {$NAMATABEL}_REKPEMERINTAHAN
			
			,TBLDAFTAR.*,
			(
				SELECT
					REFKELURAHAN.REFKELURAHAN_NAMA
				FROM
					REFKELURAHAN
				WHERE
					REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
				AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
			) AS REFKELURAHAN_NAMA,
			(
				SELECT
					REFKECAMATAN.REFKECAMATAN_NAMA
				FROM
					REFKECAMATAN
				WHERE
					REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
			) AS REFKECAMATAN_NAMA,
			TBLSETOR_NOMORSSPD,
			TBLSETOR_THNSSPD,
			TBLSETOR_BLNSSPD,
			TBLSETOR_TGLSSPD
		";
         $from = 'TBLDAFTAR';

        $otherquery = array(
            'leftjoin_trans'=>array($NAMATABEL, "TBLDAFTAR.TBLDAFTAR_NOPOK={$NAMATABEL}.TBLDAFTAR_NOPOK")
        );

        $filter = array(
            'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
            ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
            // ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
            ,'EQ__'.$NAMATABEL.'.TBLSETOR_REKPAJAK' => '1'
        );

       	$otherquery['andwhere'] = "
        NVL(".$NAMATABEL . ".TBLPENDATAAN_PAJAKKE, 0)=".$TBLPENDATAAN_PAJAKKE."
        AND NVL(".$NAMATABEL . ".TBLPENDATAAN_TGLPAJAK, 0)=".$TBLPENDATAAN_TGLPAJAK."
        AND NVL(".$NAMATABEL . ".TBLPENDATAAN_BLNPAJAK, 0)=".$TBLPENDATAAN_BLNPAJAK."
        AND ".$NAMATABEL.".TBLSETOR_JNSBAYAR LIKE '%".$TBLSETOR_JNSBAYAR."%'
        ";

        // if (!empty($TBLPENDATAAN_TGLPAJAK)) {
	       //  $otherquery['andwhere'] = '
	       //  NVL('.$NAMATABEL . '.TBLPENDATAAN_TGLPAJAK, 0)='.$TBLPENDATAAN_TGLPAJAK.'
	       //  AND NVL('.$NAMATABEL . '.TBLPENDATAAN_PAJAKKE, 0)='.$TBLPENDATAAN_PAJAKKE.'
	       //  ';
        // }


        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);
        // Yii::app()->end();

        $this->CetakWordSSPD($data);
        Yii::app()->end();
	}

	public function CetakWordSSPD($data=array())
	{
		$NAMATABEL = $this->namatabel;
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_validasibank' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'TPL-VALIDASI.docx';
		$namafileDL = "SSPD-VALIDASI.docx"; 

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

		$IS_SKPDKB = isset($rowWP[$NAMATABEL.'_PAJAKPERIKSA']) && $rowWP[$NAMATABEL.'_PAJAKPERIKSA']>0;
		$IS_BUNGA = isset($rowWP[$NAMATABEL.'_BUNGAKETETAPAN']) && $rowWP[$NAMATABEL.'_BUNGAKETETAPAN']>0;
		$IS_DENDA = isset($rowWP[$NAMATABEL.'_DENDAKETETAPAN']) && $rowWP[$NAMATABEL.'_DENDAKETETAPAN']>0;

		$utama = array();
		$rows = array();
		$rowWP = $data['cetak'];

		/*
		17111100156344514-44874
		1201202600411478J03151316
		171111LKTBPD1   TELLERBPD  IDR

		00.000.020.048,-D317902YYN
		*/

		$DAYOFYEAR = date('z') + 1; // hari ke berapa dalam tahun ini
		$TIMENOW   = date('hi');

		$totalrupiah = $rowWP[$NAMATABEL.'_RUPIAHSETOR'] + $rowWP[$NAMATABEL.'_BUNGAKETETAPAN'] + $rowWP[$NAMATABEL.'_DENDAKETETAPAN'];

		$utama['kode1'] = sprintf('%02d', $rowWP['TBLPENDATAAN_THNPAJAK']) . sprintf('%02d', $rowWP['TBLPENDATAAN_BLNPAJAK']) . sprintf('%02d', $rowWP['TBLPENDATAAN_TGLPAJAK']) . sprintf('%07d', $rowWP['TBLDAFTAR_NOPOK']) . sprintf('%02d', $rowWP['TBLKELURAHAN_IDBADANUSAHA']) . sprintf('%02d', $rowWP['TBLKECAMATAN_IDBADANUSAHA']) . '-' . sprintf('%02d', $rowWP['TBLSETOR_NOMORSSPD']);
		$utama['kode2'] = sprintf('%01d', $rowWP[$NAMATABEL . '_REKURUSAN']) . sprintf('%02d', $rowWP[$NAMATABEL . '_REKPEMERINTAHAN']) . sprintf('%01d', $rowWP[$NAMATABEL . '_REKORGANISASI']) . sprintf('%02d', $rowWP[$NAMATABEL . '_REKPROGRAM']) . sprintf('%02d', $rowWP[$NAMATABEL . '_REKKEGIATAN']) . sprintf('%01d', $rowWP[$NAMATABEL . '_REKDINAS']) . sprintf('%01d', $rowWP[$NAMATABEL . '_REKBIDANG']) . sprintf('%01d', $rowWP[$NAMATABEL . '_REKPENDAPATAN']) . sprintf('%01d', $rowWP[$NAMATABEL . '_REKPAD']) . sprintf('%01d', $rowWP[$NAMATABEL . '_REKPAJAK']) . sprintf('%02d', $rowWP[$NAMATABEL . '_REKAYAT']) . sprintf('%02d', $rowWP[$NAMATABEL . '_REKJENIS']) . 'J0' . sprintf('%03d', $DAYOFYEAR) . $TIMENOW;
		$utama['kode3'] = sprintf('%02d', $rowWP['TBLSETOR_THNSSPD']) . sprintf('%02d', $rowWP['TBLSETOR_BLNSSPD']) . sprintf('%02d', $rowWP['TBLSETOR_TGLSSPD']) . 'LKTBPD1   TELLERBPD  IDR';
		//$utama['kode4'] = '0' . LokalIndonesia::ribuan(sprintf('%02d', $totalrupiah)) . ',-D317902YYN';
		$anu = '0.000.000.000'; // 0.007.510.910
		$utama['kode4'] = '0' . $this->isikiri(LokalIndonesia::ribuan( $totalrupiah ), $anu) . ',-D317902YYN';

		// debug
		// echo CJSON::encode($utama);Yii::app()->end();

		// Merge data in the first sheet 
		
		$otbs->MergeField('validasi', $utama); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();

		//INI CODING CETAK WORD SSPD
	}

	public function isikiri($angka, $pad) {
		$str = "" . $angka;
		$pad = $pad;
		$ans = substr($pad, 0, strlen($pad) - strlen($str)) . $str;
		//$pad.substring(0, pad.length - str.length) + str;
		return $ans;
	}
}