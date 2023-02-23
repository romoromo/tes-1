<?php

class Entrisetoranbkp2bpdController extends Controller
{
	var $namatabel = 'TBLSETOR';
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actiongetdata()
	{
		$tglsetor = $_POST['tglsetor'];
		$ke = intval($_POST['setoranke']);
		$rekening = trim($_POST['rekening']);
		$nopok = intval($_POST['enopok']);

		$dataFilter = array();
		$tahun = strtotime($tglsetor) ? (int)date('y', strtotime($tglsetor)) : date('y');
		$bln = strtotime($tglsetor) ? (int)date('m', strtotime($tglsetor)) : date('m');
		$tgl = strtotime($tglsetor) ? (int)date('d', strtotime($tglsetor)) : date('d');
		$dataFilter[':tahun'] = $tahun;
		$dataFilter[':bln'] = $bln;
		$dataFilter[':tgl'] = $tgl;
		$dataFilter[':ke'] = $ke;
		$dataFilter[':nopok'] = $nopok;

		// var_dump($dataFilter);

		$data = array();
		$data['rekening'] = array();
		$model = array();
		if (empty($tahun) OR empty($ke) /*OR empty($nopok)*/) {
			$data['validate'] = 'kurang';
		} else if(!$this->validRek($rekening)){
			$data['validate'] = 'rekening_not_valid';
		} else {
			$data['validate'] = 'lengkap';
			$data['exist'] = $this->cekpernahsetor($dataFilter);
			$sql = "
			SELECT ".$this->namatabel.".*
			, TBLR_REKURUSAN || '.' || 
			TBLR_REKPEMERINTAHAN || '.' || 
			TBLR_REKORGANISASI || '.' || 
			".$this->namatabel."_REKPROGRAM || '.' || 
			".$this->namatabel."_REKKEGIATAN || '.' || 
			".$this->namatabel."_REKDINAS || '.' || 
			".$this->namatabel."_REKBIDANG || '.' || 
			".$this->namatabel."_REKPENDAPATAN || '.' || 
			".$this->namatabel."_REKPAD || '.' || 
			".$this->namatabel."_REKPAJAK || '.' || 
			".$this->namatabel."_REKAYAT || '.' || 
			".$this->namatabel."_REKJENIS || '.' || 
			".$this->namatabel."_REKSUBJENIS AS TREKENING_NAMA
			FROM ".$this->namatabel."
			WHERE (
				TBLPENDATAAN_THNPAJAK='".substr($tahun,-2)."' 
				AND NVL(TBLPENDATAAN_BLNPAJAK, 0)='".$bln."' 
				AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='".$tgl."'
				AND NVL(TBLPENDATAAN_PAJAKKE, 0)='".$ke."'
			) 
			AND NVL(".$this->namatabel.".TBLDAFTAR_NOPOK, 0)=".$nopok."
			"
			;
			$data['rekening'] = $this->validRek($rekening);
			$model = Yii::app()->db->createCommand($sql)->queryRow();
		}

		echo CJSON::encode(array('data'=>$data, 'model'=>$model));
	}

	public function actionHapus()
	{
		if (Yii::app()->user->isGuest) {
			Yii::app()->end();
		}

		function HAPUS_SETO($dataFilter)
		{
			$sql = "
			DELETE
			FROM TBLSETOR
			WHERE 
			TBLPENDATAAN_THNPAJAK = ".(int) substr($dataFilter[':tahun'], -2)." 
			AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = ".$dataFilter[':bln']." 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$dataFilter[':tgl']." 
			AND NVL(TBLPENDATAAN_PAJAKKE, 0) = ".$dataFilter[':ke']." 
			AND NVL(TBLDAFTAR_NOPOK, 0) =".$dataFilter[':nopok']." 
			";
			// echo $sql;Yii::app()->end();
			$del = Yii::app()->db->createCommand($sql)->execute();
			return $del;
		}

		$tglsetor = $_POST['tglsetor'];
		$ke = intval($_POST['setoranke']);
		$rekening = trim($_POST['rekening']);
		$nopok = intval($_POST['enopok']);

		$dataFilter = array();
		$tahun = strtotime($tglsetor) ? (int)date('y', strtotime($tglsetor)) : date('y');
		$bln = strtotime($tglsetor) ? (int)date('m', strtotime($tglsetor)) : date('m');
		$tgl = strtotime($tglsetor) ? (int)date('d', strtotime($tglsetor)) : date('d');
		$dataFilter[':tahun'] = $tahun;
		$dataFilter[':bln'] = $bln;
		$dataFilter[':tgl'] = $tgl;
		$dataFilter[':ke'] = $ke;
		$dataFilter[':nopok'] = $nopok;

		// var_dump($dataFilter);

		$data = array();
		$data['rekening'] = array();
		$model = array();
		if (empty($tahun) OR empty($ke) /*OR empty($nopok)*/) {
			$data['validate'] = 'kurang';
		} else if(!$this->validRek($rekening)){
			$data['validate'] = 'rekening_not_valid';
		} else {
			$data['validate'] = 'lengkap';
			$data['deleted'] = HAPUS_SETO($dataFilter);
		}

		echo CJSON::encode(array('data'=>$data, 'status'=>'ok'));
	}

	public function validRek($rek)
	{
		$rek = explode('-', substr($rek, -5));
		$REK1 = (int)$rek[0];
		$REK2 = (int)$rek[1];

		$sql = "
		SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODEFULL LIKE '1.20.1.20.26.0.0.4.1.1.{$REK1}.{$REK2}.%'
		";
		// echo $sql;Yii::app()->end();
		return $dtrek = Yii::app()->db->createCommand($sql)->queryRow();
	}

	public function cekpernahsetor($dataFilter)
	{
		$sql = "
		SELECT COUNT(TBLDAFTAR_NOPOK) AS JML
		FROM TBLSETOR
		WHERE 
		TBLPENDATAAN_THNPAJAK = ".(int) substr($dataFilter[':tahun'], -2)." 
		AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = ".$dataFilter[':bln']." 
		AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$dataFilter[':tgl']." 
		AND NVL(TBLPENDATAAN_PAJAKKE, 0) = ".$dataFilter[':ke']." 
		AND NVL(TBLDAFTAR_NOPOK, 0) =".$dataFilter[':nopok']." 
		";
		// echo $sql;Yii::app()->end();
		$model = Yii::app()->db->createCommand($sql)->queryRow();
		if ($model['JML']>0) {
			return 'ada';
		}else{
			return 'tidak';
		}
	}

	public function actionsimpandata()
	{
		$DATA = $_REQUEST;

		$tglsetor = $_POST['tglsetor'];
		$ke = intval($_POST['setoranke']);
		$rekening = trim($_POST['rekening']);
		$nopok = intval($_POST['enopok']);

		$dataFilter = array();
		$tahun = strtotime($tglsetor) ? (int)date('y', strtotime($tglsetor)) : date('y');
		$bln = strtotime($tglsetor) ? (int)date('m', strtotime($tglsetor)) : date('m');
		$tgl = strtotime($tglsetor) ? (int)date('d', strtotime($tglsetor)) : date('d');
		$dataFilter[':tahun'] = $tahun;
		$dataFilter[':bln'] = $bln;
		$dataFilter[':tgl'] = $tgl;
		$dataFilter[':ke'] = $ke;
		$dataFilter[':nopok'] = $nopok;
		
		$jmlsetor = isset($DATA['TBLSETOR_RUPIAHSETOR']) && !empty($DATA['TBLSETOR_RUPIAHSETOR']) ? LokalIndonesia::toAngka($DATA['TBLSETOR_RUPIAHSETOR']) : 0;

		$NOMOR_SSPD = isset($DATA['TBLSETOR_NOMORSSPD']) && !empty($DATA['TBLSETOR_NOMORSSPD']) ? $DATA['TBLSETOR_NOMORSSPD'] : 0;

		$TANGGAL_ENTRY = isset($DATA['tglsetor']) && !empty($DATA['tglsetor']) ? $DATA['tglsetor'] : 0;
		$exp_TANGGAL_ENTRY = explode('-', $TANGGAL_ENTRY);

		$jenis_setoran = isset($DATA['jenis_setoran']) && !empty($DATA['jenis_setoran']) ? $DATA['jenis_setoran'] : 0;

		$whereUpdate = 
			"TBLPENDATAAN_THNPAJAK = :tahun
			AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = :bln
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = :tgl
			AND NVL(TBLDAFTAR_NOPOK, 0) = :nopok
			AND NVL(TBLPENDATAAN_PAJAKKE, 0) = :ke
			";
		;

		$bindParam = array(
			':tahun' => substr($tahun,-2)
			,':bln' => $bln
			,':tgl' => $tgl
			,':nopok' => $nopok
			,':ke' => $ke
		);

		$debug = array();
		foreach ($bindParam as $key => $value) {
			// if (empty($value) && in_array($key, explode(',', ':tahun,:nopok,:ke')) ) {
			if (empty($value) && in_array($key, explode(',', ':tahun,:ke')) ) {
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

		$NAMATABEL_INSERT = 'TBLSETOR';
		$NAMATABELREK = 'TBLREKENING';

		$dtrek = $this->validRek($rekening);

		if ($dtrek[$NAMATABELREK.'_REKAYAT'] == '23') {
			$REKPAJAK = '4';
		} else {
			$REKPAJAK = isset($dtrek[$NAMATABELREK.'_REKPAJAK']) ? $dtrek[$NAMATABELREK.'_REKPAJAK'] : '';
		}

		$arrayOfDataInsert = array(
			'TBLPENDATAAN_THNPAJAK' => $tahun
			,'TBLPENDATAAN_BLNPAJAK' => $bln
			,'TBLPENDATAAN_TGLPAJAK' => $tgl
			// ,'TBLDAFTAR_NOPOK' => $nopok
			,'TBLDAFTAR_NOPOK' => 0
			,'TBLPENDATAAN_PAJAKKE' => $ke
			
			// ,'TBLDAFTAR_JNSPENDAPATAN' => 'P'
			// ,'KDSU' => 'R'
			,'TBLR_REKURUSAN' => isset($dtrek[$NAMATABELREK.'_REKURUSAN']) ? $dtrek[$NAMATABELREK.'_REKURUSAN'] : ''
			,'TBLR_REKPEMERINTAHAN' => isset($dtrek[$NAMATABELREK.'_REKPEMERINTAHAN']) ? $dtrek[$NAMATABELREK.'_REKPEMERINTAHAN'] : ''
			,'TBLR_REKORGANISASI' => isset($dtrek[$NAMATABELREK.'_REKORGANISASI']) ? $dtrek[$NAMATABELREK.'_REKORGANISASI'] : ''
			,'TBLSETOR_REKPROGRAM' => isset($dtrek[$NAMATABELREK.'_REKPROGRAM']) ? $dtrek[$NAMATABELREK.'_REKPROGRAM'] : ''
			,'TBLSETOR_REKKEGIATAN' => isset($dtrek[$NAMATABELREK.'_REKKEGIATAN']) ? $dtrek[$NAMATABELREK.'_REKKEGIATAN'] : ''
			,'TBLSETOR_REKDINAS' => isset($dtrek[$NAMATABELREK.'_REKDINAS']) ? $dtrek[$NAMATABELREK.'_REKDINAS'] : ''
			,'TBLSETOR_REKBIDANG' => isset($dtrek[$NAMATABELREK.'_REKBIDANG']) ? $dtrek[$NAMATABELREK.'_REKBIDANG'] : ''
			,'TBLSETOR_REKPENDAPATAN' => isset($dtrek[$NAMATABELREK.'_REKPENDAPATAN']) ? $dtrek[$NAMATABELREK.'_REKPENDAPATAN'] : ''
			,'TBLSETOR_REKPAD' => isset($dtrek[$NAMATABELREK.'_REKPAD']) ? $dtrek[$NAMATABELREK.'_REKPAD'] : ''
			,'TBLSETOR_REKPAJAK' => $REKPAJAK
			,'TBLSETOR_REKAYAT' => isset($dtrek[$NAMATABELREK.'_REKAYAT']) ? $dtrek[$NAMATABELREK.'_REKAYAT'] : ''
			,'TBLSETOR_REKJENIS' => isset($dtrek[$NAMATABELREK.'_REKJENIS']) ? $dtrek[$NAMATABELREK.'_REKJENIS'] : ''
			,'TBLSETOR_REKSUBJENIS' => isset($dtrek[$NAMATABELREK.'_REKSUBJENIS']) ? $dtrek[$NAMATABELREK.'_REKSUBJENIS'] : ''
			,'TBLSETOR_GOLONGAN' => '0'
			,'TBLKECAMATAN_ID' => '0'
			,'TBLKELURAHAN_ID' => '0'
			,'TBLSETOR_JNSKETETAPAN' => ''
			// ,'TBLSETOR_JNSBAYAR' => 'LAIN-2'
			,'TBLSETOR_TGLSURAT' => '0'
			,'TBLSETOR_BLNSURAT' => '0'
			,'TBLSETOR_THNSURAT' => '0'
			,'TBLSETOR_NOMORSURAT' => ''
			,'TBLSETOR_TGLBATASSURAT' => '0'
			,'TBLSETOR_BLNBATASSURAT' => '0'
			,'TBLSETOR_THNBATASSURAT' => '0'
			,'KDMED' => '0'
			,'KDREF' => '0'
			,'KDSET' => '1'
			,'TBLSETOR_STATUSBAYAR' => '20'
			,'TBLSETOR_JENISSETOR' => ''
			,'TBLSETOR_THNSETOR' => $tahun
			,'TBLSETOR_BLNSETOR' => $bln
			,'TBLSETOR_TGLSETOR' => $tgl
			,'TBLSETOR_NOMORSSPD' => $NOMOR_SSPD
			,'TBLSETOR_THNSSPD' => '0'
			,'TBLSETOR_BLNSSPD' => '0'
			,'TBLSETOR_TGLSSPD' => '0'
			,'JENSET' => ''
			,'NOCG' => ''
			,'NOREK' => ''
			,'BANK' => ''
			,'BANCB' => ''
			,'TGCGT' => '0'
			,'TGCAIR' => '0'
			,'LUNAS' => ''
			,'TBLSETOR_JNSTAGIHAN' => ''
			,'TBLSETOR_JNSREKLAME' => ''
			,'BLBU' => '0'
			,'BASTP' => '0'
			,'TBLSETOR_TGLTAGIHAN' => '0'
			,'TBLSETOR_BLNTAGIHAN' => '0'
			,'TBLSETOR_THNTAGIHAN' => '0'
			,'BAKB' => '0'
			,'TBLSETOR_RUPIAHPAJAK' => '0'
			,'TBLSETOR_RUPIAHSETOR' => $jmlsetor
			,'TBLSETOR_KETETAPANPAJAK' => '0'
			,'RPRET' => '0'
			,'TBLSETOR_RUPIAHTAGIHAN' => '0'
			,'TBLSETOR_PAJAKKURANGBAYAR' => '0'
			,'TBLSETOR_BUNGAKETETAPAN' => '0'
			,'TBLSETOR_BUNGATAGIHAN' => '0'
			,'TBLSETOR_BUNGAKURANGBAYAR' => '0'
			,'BURET' => "0"
			,'TBLSETOR_DENDAKETETAPAN' => "0"
			,'TBLSETOR_DENDATAGIHAN' => "0"
			,'TBLSETOR_DENDAKURANGBAYAR' => "0"
			,'DDRET' => '0'
			,'NAIK' => '0'
			,'ADM' => '0'
			,'RPSSKP' => '0'
			,'RPSSTP' => '0'
			,'RPSKB' => '0'
			,'RPSRET' => '0'
			,'UK1' => '0'
			,'UK2' => '0'
			,'UK3' => '0'
			,'TBLSETOR_LOKET' => substr( "BKP " . Yii::app()->user->nama_pengguna . '    ' . date('H:i:s'), 0, 24)
			,'DUP' => ''
			,'KET' => substr($DATA['KET'], 0, 30)
		);

		$seto = Yii::app()->db->createCommand()
		->insert($NAMATABEL_INSERT, $arrayOfDataInsert);

		if ($seto>0) {
			echo CJSON::encode(array('status'=>'success', 'data'=>$arrayOfDataInsert, 'debug'=>$seto));
		} else {
			echo CJSON::encode(array('status'=>'failed', 'data'=>$arrayOfDataInsert));
		}
	}
}