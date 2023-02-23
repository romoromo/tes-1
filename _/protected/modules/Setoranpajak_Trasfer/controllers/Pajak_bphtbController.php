<?php

class Pajak_bphtbController extends Controller
{
	public $namatabel = 'TBLDAFTBPHTB';
	public function actionIndex()
	{
		$this->renderPartial('index');
	}
	public function actiongetdata()
	{
		$tahun = intval($_POST['tahun']);
		$bln = intval($_POST['bln']);
		$tgl = intval($_POST['tgl']);
		$jenis_setoran = trim($_POST['jenis_setoran']);
		$nopok = intval($_POST['nopok']);

		$dataFilter = array();
		$dataFilter[':tahun'] = $tahun;
		$dataFilter[':bln'] = $bln;
		$dataFilter[':tgl'] = $tgl;
		$dataFilter[':ke'] = 0;
		$dataFilter[':jenis_setoran'] = $jenis_setoran;
		$dataFilter[':nopok'] = $nopok;

		if($jenis_setoran=='SPTPD') {
			$kolombunga = "".$this->namatabel."_BUNGASPTPD";
			$kolomdenda = "0";
			$kolompajak = "".$this->namatabel."_PAJAK";
			$kolomtotal = "(".$this->namatabel."_BUNGASPTPD+".$this->namatabel."_PAJAK)";
		} else if($jenis_setoran=='SKPD') {
			$kolombunga = "".$this->namatabel."_BUNGASPTPD";
			$kolomdenda = "0";
			$kolompajak = "".$this->namatabel."_PAJAK";
			$kolomtotal = "(".$this->namatabel."_BUNGASPTPD+".$this->namatabel."_PAJAK)";
		} else if($jenis_setoran=='STPD') {
			$kolombunga = "0";
			$kolomdenda = "0";
			$kolompajak = "".$this->namatabel."_BUNGATAGIHAN";
			$kolomtotal = "".$this->namatabel."_BUNGATAGIHAN";
		} else if($jenis_setoran=='SKPDKB') {
			$kolombunga = "".$this->namatabel."_BUNGAKRGBAYAR";
			$kolomdenda = "0";
			$kolompajak = "".$this->namatabel."_RUPIAHKRGBAYAR";
			$kolomtotal = "".$this->namatabel."_RUPIAHKRGBAYAR";
		}

		$data = array();
		$model = array();
		if($jenis_setoran=='SKPDKB'){
			$data['ang'] = $this->cekpernahangsur($dataFilter);	
		}
		if ($tahun=="") {
			$data['validate'] = 'kurang';
		}else if($bln==""){
			$data['validate'] = 'kurang';
		}else if($nopok==""){
			$data['validate'] = 'kurang';
		}else{
			$data['validate'] = 'lengkap';
			$data['exist_bpd'] = $this->cekpernahsetorbpd($dataFilter);
			$data['exist'] = $this->cekpernahsetor($dataFilter);
			$sql = "
			SELECT ".$this->namatabel.".*, TBLDAFTAR.*, ".$this->namatabel."_REKURUSAN || '.' || 
			".$this->namatabel."_REKPEMERINTAHAN || '.' || 
			".$this->namatabel."_REKORGANISASI || '.' || 
			".$this->namatabel."_REKPROGRAM || '.' || 
			".$this->namatabel."_REKKEGIATAN || '.' || 
			".$this->namatabel."_REKDINAS || '.' || 
			".$this->namatabel."_REKBIDANG || '.' || 
			".$this->namatabel."_REKPENDAPATAN || '.' || 
			".$this->namatabel."_REKPAD || '.' || 
			".$this->namatabel."_REKPAJAK || '.' || 
			".$this->namatabel."_REKAYAT || '.' || 
			".$this->namatabel."_REKJENIS || '.' || 
			NVL(".$this->namatabel."_REKSUBJENIS,0) AS TREKENING_NAMA,
			NVL(".$kolombunga.",0) AS bunga_setor,
			NVL(".$kolomdenda.",0) AS dendasetor,
			NVL(".$kolompajak.",0) AS pajaksetor,
			NVL(".$kolomtotal.",0) AS totalsetor
			FROM ".$this->namatabel." 
			JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK=".$this->namatabel.".TBLDAFTAR_NOPOK
			WHERE (
				TBLPENDATAAN_THNPAJAK='".substr($tahun,-2)."' 
				AND TBLPENDATAAN_BLNPAJAK='".$bln."' 
				AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='".$tgl."') 
				AND ".$this->namatabel.".TBLDAFTAR_NOPOK=".$nopok."
				"
				;
				$model = Yii::app()->db->createCommand($sql)
				->queryRow();
			}

			echo CJSON::encode(array('data'=>$data, 'model'=>$model));
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

		public function cekpernahsetorbpd($dataFilter)
		{

			if ($dataFilter[':jenis_setoran']=='SKPDKB') {
				$model = Yii::app()->db->createCommand("
				SELECT COUNT(TBLPENDATAAN_BLNPAJAK) AS JML 
				FROM TBLSETORANBPD
				WHERE 
				TBLPENDATAAN_THNPAJAK = ".(int) substr($dataFilter[':tahun'], -2)."
				AND TBLSETORANBPD_JNSBAYAR = 'SKPDKB'
				AND TBLPENDATAAN_BLNPAJAK = ".$dataFilter[':bln']." 
				AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$dataFilter[':tgl']." 
				AND TBLDAFTAR_NOPOK =".$dataFilter[':nopok']."
				")->queryRow();
			}else if($dataFilter[':jenis_setoran']=='STPD') {
			$model = Yii::app()->db->createCommand("
				SELECT COUNT(TBLPENDATAAN_BLNPAJAK) AS JML
				FROM TBLSETORANBPD
				WHERE 
				TBLPENDATAAN_THNPAJAK = ".(int) substr($dataFilter[':tahun'], -2)."
				AND TBLSETORANBPD_JNSBAYAR = 'STPD'
				AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = ".$dataFilter[':bln']." 
				AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$dataFilter[':tgl']." 
				AND NVL(TBLPENDATAAN_PAJAKKE, 0) = ".$dataFilter[':ke']." 
				AND TBLDAFTAR_NOPOK =".$dataFilter[':nopok']." 
				"
			)->queryRow();
			} else {
			$model = Yii::app()->db->createCommand("
				SELECT COUNT(TBLPENDATAAN_BLNPAJAK) AS JML
				FROM TBLSETORANBPD
				WHERE 
				TBLPENDATAAN_THNPAJAK = ".(int) substr($dataFilter[':tahun'], -2)."
				AND TBLSETORANBPD_JNSBAYAR = 'SPTPD'
				AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = ".$dataFilter[':bln']." 
				AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$dataFilter[':tgl']." 
				AND NVL(TBLPENDATAAN_PAJAKKE, 0) = ".$dataFilter[':ke']." 
				AND TBLDAFTAR_NOPOK =".$dataFilter[':nopok']." 
				")->queryRow();				
			}
			if ($model['JML']>0) {
				return 'ada';
			}else{
				return 'tidak';
			}
		}

		public function cekpernahsetor($dataFilter)
		{
			if ($dataFilter[':jenis_setoran']=='SKPDKB') {
			$model = Yii::app()->db->createCommand("
				SELECT COUNT(TBLPENDATAAN_BLNPAJAK) AS JML
				FROM TBLSETOR
				WHERE 
				TBLPENDATAAN_THNPAJAK = ".(int) substr($dataFilter[':tahun'], -2)."
				AND TRIM(TBLSETOR_JNSBAYAR) = 'SKPDKB'
				AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = ".$dataFilter[':bln']." 
				AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$dataFilter[':tgl']." 
				AND NVL(TBLPENDATAAN_PAJAKKE, 0) = ".$dataFilter[':ke']." 
				AND TBLDAFTAR_NOPOK =".$dataFilter[':nopok']." 
				"
			)->queryRow();
			}else if ($dataFilter[':jenis_setoran']=='STPD') {
			$model = Yii::app()->db->createCommand("
				SELECT COUNT(TBLPENDATAAN_BLNPAJAK) AS JML
				FROM TBLSETOR
				WHERE 
				TBLPENDATAAN_THNPAJAK = ".(int) substr($dataFilter[':tahun'], -2)."
				AND TRIM(TBLSETOR_JNSBAYAR) = 'STPD'
				AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = ".$dataFilter[':bln']." 
				AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$dataFilter[':tgl']." 
				AND NVL(TBLPENDATAAN_PAJAKKE, 0) = ".$dataFilter[':ke']." 
				AND TBLDAFTAR_NOPOK =".$dataFilter[':nopok']." 
				"
			)->queryRow();
			} else {
			$model = Yii::app()->db->createCommand("
				SELECT COUNT(TBLPENDATAAN_BLNPAJAK) AS JML
				FROM TBLSETOR
				WHERE 
				TBLPENDATAAN_THNPAJAK = ".(int) substr($dataFilter[':tahun'], -2)."
				AND TRIM(TBLSETOR_JNSBAYAR) = 'SPTPD'
				AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = ".$dataFilter[':bln']." 
				AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$dataFilter[':tgl']." 
				AND NVL(TBLPENDATAAN_PAJAKKE, 0) = ".$dataFilter[':ke']." 
				AND TBLDAFTAR_NOPOK =".$dataFilter[':nopok']." 
				"
			)->queryRow();
			}
			if ($model['JML']>0) {
				return 'ada';
			}else{
				return 'tidak';
			}
		}

		public function cekpernahangsur($dataFilter)
		{
		if ($dataFilter[':jenis_setoran']=='SKPDKB') {
			$model = Yii::app()->db->createCommand("
			SELECT COUNT(TBLPENDATAAN_BLNPAJAK) AS JML 
			FROM TBLANGSURAN
			WHERE 
			TBLPENDATAAN_THNPAJAK = ".(int) substr($dataFilter[':tahun'],-2)."
			AND TBLPENDATAAN_BLNPAJAK = ".$dataFilter[':bln']." 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$dataFilter[':tgl']." 
			AND TBLDAFTAR_NOPOK =".$dataFilter[':nopok']."
			")->queryRow();
		}
		if ($model['JML']>0) {
			return 'ada';
		}else{
			return 'tidak';
		}
		}

		public function actionsimpandata()
		{
			$DATA = $_REQUEST;

			$tahun = isset($DATA['tahun']) && !empty($DATA['tahun']) ? (int)$DATA['tahun'] : 0;
			$bln = isset($DATA['bln']) && !empty($DATA['bln']) ? (int)$DATA['bln'] : 0;
			$tgl = isset($DATA['tgl']) && !empty($DATA['tgl']) ? (int)$DATA['tgl'] : 0;
			$nopok = isset($DATA['nopok']) && !empty($DATA['nopok']) ? (int)$DATA['nopok'] : 0;
			$ke = isset($DATA['ke']) && !empty($DATA['ke']) ? (int)$DATA['ke'] : 0;

			$bunga_setor = isset($DATA['bunga_setor']) && !empty($DATA['bunga_setor']) ? $DATA['bunga_setor'] : 0;
			$dendasetor = isset($DATA['dendasetor']) && !empty($DATA['dendasetor']) ? $DATA['dendasetor'] : 0;
			$jmlsetor = isset($DATA['jmlsetor']) && !empty($DATA['jmlsetor']) ? $DATA['jmlsetor'] : 0;

			$nmdd = isset($DATA['nmdd']) && !empty($DATA['nmdd']) ? ($DATA['nmdd']) : '';
			$nmsu = isset($DATA['nmsu']) && !empty($DATA['nmsu']) ? ($DATA['nmsu']) : '';
			$caption = isset($DATA['caption']) && !empty($DATA['caption']) ? ($DATA['caption']) : '';

			$NOMOR_SSPD = isset($DATA['NOMOR_SSPD']) && !empty($DATA['NOMOR_SSPD']) ? $DATA['NOMOR_SSPD'] : 0;
			$NOMOR_SSPDSSTP = isset($DATA['NOMOR_SSPDSSTP']) && !empty($DATA['NOMOR_SSPDSSTP']) ? $DATA['NOMOR_SSPDSSTP'] : 0;
			$NOMOR_SSPDKB = isset($DATA['NOMOR_SSPDKB']) && !empty($DATA['NOMOR_SSPDKB']) ? $DATA['NOMOR_SSPDKB'] : 0;

			$TANGGALSETOR = isset($DATA['TANGGALSETOR']) && !empty($DATA['TANGGALSETOR']) ? $DATA['TANGGALSETOR'] : 0;
			$TANGGAL_ENTRY = isset($DATA['TANGGAL_ENTRY']) && !empty($DATA['TANGGAL_ENTRY']) ? $DATA['TANGGAL_ENTRY'] : 0;
			$exp_TANGGAL_ENTRY = explode('-', $TANGGAL_ENTRY);
			$exp_TANGGALSETOR = explode('-', $TANGGALSETOR);

			$pajaksetor = isset($DATA['pajaksetor']) && !empty($DATA['pajaksetor']) ? $DATA['pajaksetor'] : 0;
			$jenis_setoran = isset($DATA['jenis_setoran']) && !empty($DATA['jenis_setoran']) ? $DATA['jenis_setoran'] : 0;

			if ($jenis_setoran=='SKPD' OR $jenis_setoran=='SPTPD') {
				$jnsketetapan = '';
				$nmdd = 'DND SKP';
				$nmsu = 'BNG SKP';
			}elseif ($jenis_setoran=='SKPDKB') {
				$jnsketetapan = 'K';
				$nmdd = 'DND SKB';
				$nmsu = 'BNG SKB';
			}elseif ($jenis_setoran=='STPD'){
				$jnsketetapan = 'T';
			}

			$whereUpdate = 
			"TBLPENDATAAN_THNPAJAK = :tahun
			AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = :bln
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = :tgl
			AND TBLDAFTAR_NOPOK = :nopok
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
			
			$bindParam2 = array(
				':tahun' => $tahun
				,':bln' => $bln
				,':tgl' => $tgl
				,':nopok' => $nopok
				,':ke' => $ke
				,':jenis_setoran' => $jenis_setoran
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

			if ($this->cekpernahsetor($bindParam2)=='ada') {
				echo CJSON::encode(array('status'=>'exists', 'message'=>'Data sudah pernah diinputkan'));
				Yii::app()->end();
			}
		// var_dump($this->cekpernahsetor($bindParam));
		// Yii::app()->end();

			$NAMATABEL = 'TBLDAFTBPHTB';
			$NAMATABEL_INSERT = 'TBLSETOR';

			$setbpd = Yii::app()->db->createCommand()
			->select()
			->from($NAMATABEL)
			->where($whereUpdate, $bindParam)
			->queryRow();
		// ; echo $setbpd->text;
		// var_dump($setbpd->params);

			if (!$setbpd) {
				echo CJSON::encode(array('status'=>'notexists', 'message'=>'Data setoran tidak ditemukan, cek Masa Pajak serta NOPOK'));
				Yii::app()->end();
			}

			if ($jenis_setoran=='SPTPD' OR $jenis_setoran=='SKPDKB') {

				$updateAsli = Yii::app()->db->createCommand()->update($NAMATABEL.'', array(
					$NAMATABEL.'_TAHUNSETOR'=>isset($exp_TANGGALSETOR[2]) ?  substr($exp_TANGGALSETOR[2], -2) : '',
					$NAMATABEL.'_BULANSETOR'=>isset($exp_TANGGALSETOR[1]) ? $exp_TANGGALSETOR[1] : '',
					$NAMATABEL.'_TANGGALSETOR'=>isset($exp_TANGGALSETOR[0]) ? $exp_TANGGALSETOR[0] : '',
					$NAMATABEL.'_REGSETOR'=>$NOMOR_SSPD,
					$NAMATABEL.'_TIPESETOR'=>'B',
					//$NAMATABEL.'_SSPDKURANGBAYAR'=>$NOMOR_SSPDKB,
					$NAMATABEL.'_RUPIAHSETOR'=>$pajaksetor,
					$NAMATABEL.'_THNENTRISETOR'=>isset($exp_TANGGAL_ENTRY[2]) ?  substr($exp_TANGGAL_ENTRY[2], -2) : '',
					$NAMATABEL.'_BLNENTRISETOR'=>isset($exp_TANGGAL_ENTRY[1]) ? $exp_TANGGAL_ENTRY[1] : '',
					$NAMATABEL.'_TGLENTRISETOR'=>isset($exp_TANGGAL_ENTRY[0]) ? $exp_TANGGAL_ENTRY[0] : '',
				)
				,$whereUpdate
				, $bindParam
				);

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
				,'TBLSETOR_REKSUBJENIS' => isset($setbpd[$NAMATABEL.'_REKSUBJENIS']) ? $setbpd[$NAMATABEL.'_REKSUBJENIS'] : ''
				,'TBLSETOR_GOLONGAN' => isset($setbpd['TBLDAFTAR_GOLONGAN']) ? $setbpd['TBLDAFTAR_GOLONGAN'] : ''
				,'TBLSETOR_JNSKETETAPAN' =>$jnsketetapan
				,'KDSU' => ''
				,'TBLSETOR_JNSBAYAR' => $jenis_setoran
				,'TBLSETOR_TGLSURAT' => '0'
				,'TBLSETOR_BLNSURAT' => $bln
				,'TBLSETOR_THNSURAT' => '0'
				,'TBLSETOR_NOMORSURAT' => '0'
				,'TBLSETOR_TGLBATASSURAT' => isset($setbpd[$NAMATABEL.'_TGLBATASSPTPD']) ? $setbpd[$NAMATABEL.'_TGLBATASSPTPD'] : ''
				,'TBLSETOR_BLNBATASSURAT' => isset($setbpd[$NAMATABEL.'_BLNBATASSPTPD']) ? $setbpd[$NAMATABEL.'_BLNBATASSPTPD'] : ''
				,'TBLSETOR_THNBATASSURAT' => isset($setbpd[$NAMATABEL.'_THNBATASSPTPD']) ? $setbpd[$NAMATABEL.'_THNBATASSPTPD'] : ''
				,'KDMED' => '0'
				,'KDREF' => '0'
				,'KDSET' => '1'
				,'TBLSETOR_STATUSBAYAR' => '10'
				,'TBLSETOR_JENISSETOR' => 'B'
				,'TBLSETOR_THNSETOR' => isset($exp_TANGGAL_ENTRY[2]) ?  substr($exp_TANGGAL_ENTRY[2], -2) : ''
				,'TBLSETOR_BLNSETOR' => isset($exp_TANGGAL_ENTRY[1]) ? $exp_TANGGAL_ENTRY[1] : ''
				,'TBLSETOR_TGLSETOR' => isset($exp_TANGGAL_ENTRY[0]) ? $exp_TANGGAL_ENTRY[0] : ''
				,'TBLSETOR_NOMORSSPD' => $NOMOR_SSPD
				,'TBLSETOR_THNSSPD' => isset($exp_TANGGAL_ENTRY[2]) ?  substr($exp_TANGGAL_ENTRY[2], -2) : ''
				,'TBLSETOR_BLNSSPD' => isset($exp_TANGGAL_ENTRY[1]) ? $exp_TANGGAL_ENTRY[1] : ''
				,'TBLSETOR_TGLSSPD' => isset($exp_TANGGAL_ENTRY[0]) ? $exp_TANGGAL_ENTRY[0] : ''
				,'JENSET' => ''
				,'NOCG' => ''
				,'NOREK' => ''
				,'BANK' => ''
				,'BANCB' => ''
				,'TGCGT' => ''
				,'TGCAIR' => ''
				,'LUNAS' => 'L'
				,'TBLSETOR_JNSTAGIHAN' => ''
				,'TBLSETOR_JNSREKLAME' => ''
				,'BLBU' => ''
				,'BASTP' => ''
				,'TBLSETOR_TGLTAGIHAN' => "0"
				,'TBLSETOR_BLNTAGIHAN' => "0"
				,'TBLSETOR_THNTAGIHAN' => "0"
				,'BAKB' => "0"
				,'TBLSETOR_RUPIAHPAJAK' => $jenis_setoran=='SPTPD' ? (isset($setbpd[$NAMATABEL.'_PAJAK']) ? $setbpd[$NAMATABEL.'_PAJAK'] : 0) : 0
				,'TBLSETOR_RUPIAHSETOR' => $jenis_setoran=='STPD' ? $setbpd[$NAMATABEL.'_BUNGATAGIHAN'] : ($jenis_setoran=='SKPDKB' ? $setbpd[$NAMATABEL.'_PAJAKPERIKSA'] : (isset($setbpd[$NAMATABEL.'_PAJAK']) ? $setbpd[$NAMATABEL.'_PAJAK'] : 0))
				,'TBLSETOR_KETETAPANPAJAK' => "0"
				,'RPRET' => "0"
				,'TBLSETOR_RUPIAHTAGIHAN' => $jenis_setoran=='STPD' ? $setbpd[$NAMATABEL.'_BUNGATAGIHAN'] : 0
				,'TBLSETOR_PAJAKKURANGBAYAR' => "0"
				,'TBLSETOR_BUNGAKETETAPAN' => $jenis_setoran=='SPTPD' ? (isset($setbpd[$NAMATABEL.'_BUNGASPTPD']) ? $setbpd[$NAMATABEL.'_BUNGASPTPD'] : 0) : ($jenis_setoran=='SKPDKB' ? (isset($setbpd[$NAMATABEL.'_BUNGAKRGBAYAR']) ? $setbpd[$NAMATABEL.'_BUNGAKRGBAYAR'] : 0) : 0)
				,'TBLSETOR_BUNGATAGIHAN' => "0"
				,'TBLSETOR_BUNGAKURANGBAYAR' => "0"
				,'BURET' => "0"
				,'TBLSETOR_DENDAKETETAPAN' => $jenis_setoran=='SKPDKB' ? (isset($setbpd[$NAMATABEL.'_KENAIKANKRGBAYAR']) ? $setbpd[$NAMATABEL.'_KENAIKANKRGBAYAR'] : 0) : 0
				,'TBLSETOR_DENDATAGIHAN' => "0"
				,'TBLSETOR_DENDAKURANGBAYAR' => $jenis_setoran=='SKPDKB' ? $dendasetor : 0
				,'DDRET' => '0'
				,'NAIK' => '0'
				,'ADM' => '0'
				,'RPSSKP' => isset($setbpd[$NAMATABEL.'_PAJAK']) ? $setbpd[$NAMATABEL.'_PAJAK'] : ''
				,'RPSSTP' => '0'
				,'RPSKB' => '0'
				,'RPSRET' => '0'
				,'UK1' => '0'
				,'UK2' => '0'
				,'UK3' => '0'
				,'TBLSETOR_LOKET' =>  substr( "BKP " . Yii::app()->user->nama_pengguna . '    ' . date('H:i:s'), 0, 24)
				,'DUP' => ''
				,'KET' => ''
			);

		// if ($caption=='SKPD-A') {
		// 	$arrayOfDataInsert['TBLSETOR_BUNGAKETETAPAN'] = $arrayOfDataInsert['TBLSETOR_BUNGAKETETAPAN'];
		// }

$seto = Yii::app()->db->createCommand()
->insert($NAMATABEL_INSERT, $arrayOfDataInsert);

if ($bunga_setor>'0' && $jenis_setoran!='STPD') {
	$arrayOfDataInsert['TBLSETOR_JNSBAYAR'] = $nmsu;
	$arrayOfDataInsert['TBLSETOR_RUPIAHSETOR'] = $jenis_setoran=='SPTPD' ? (isset($setbpd[$NAMATABEL.'_BUNGASPTPD']) ? $setbpd[$NAMATABEL.'_BUNGASPTPD'] : 0) : ($jenis_setoran=='SKPDKB' ? $setbpd[$NAMATABEL.'_BUNGAKRGBAYAR'] : 0);
	$arrayOfDataInsert['TBLSETOR_BUNGAKETETAPAN'] = $jenis_setoran=='SPTPD' ? (isset($setbpd[$NAMATABEL.'_BUNGASPTPD']) ? $setbpd[$NAMATABEL.'_BUNGASPTPD'] : 0) : ($jenis_setoran=='SKPDKB' ? $setbpd[$NAMATABEL.'_BUNGAKRGBAYAR'] : 0);
	$arrayOfDataInsert['TBLSETOR_DENDAKETETAPAN'] = '0';
	$arrayOfDataInsert['TBLSETOR_DENDAKURANGBAYAR'] = '0';
			// $arrayOfDataInsert['RPSSKP'] = ;
	$arrayOfDataInsert['TBLSETOR_REKPAJAK'] = '4';
	$arrayOfDataInsert['TBLSETOR_REKAYAT'] = '6';
	$arrayOfDataInsert['TBLSETOR_REKJENIS'] = $setbpd[$NAMATABEL.'_REKAYAT'];
	$arrayOfDataInsert['TBLSETOR_REKSUBJENIS'] = '0';
	$arrayOfDataInsert['TBLSETOR_STATUSBAYAR'] = '10';
	$arrayOfDataInsert['KDMED'] = '0'; 
	$arrayOfDataInsert['KDREF'] = '0'; 
	$arrayOfDataInsert['KDSET'] = '1'; 
	$arrayOfDataInsert['LUNAS'] = 'L'; 
	if (empty($jmlsetor))
		$arrayOfDataInsert['JENSET'] = 'B';
	else
		$arrayOfDataInsert['JENSET'] = '';

	$setobunga = Yii::app()->db->createCommand()
	->insert($NAMATABEL_INSERT, $arrayOfDataInsert);
}

if ($dendasetor>'0') {
	$arrayOfDataInsert['TBLSETOR_JNSBAYAR'] = $nmdd;
	$arrayOfDataInsert['TBLSETOR_RUPIAHSETOR'] = ((isset($setbpd[$NAMATABEL.'_KENAIKANKRGBAYAR']) ? $setbpd[$NAMATABEL.'_KENAIKANKRGBAYAR'] : 0)+$dendasetor);
	$arrayOfDataInsert['TBLSETOR_DENDAKETETAPAN'] = $jenis_setoran=='SKPDKB' ? (isset($setbpd[$NAMATABEL.'_KENAIKANKRGBAYAR']) ? $setbpd[$NAMATABEL.'_KENAIKANKRGBAYAR'] : 0) : 0;	
	$arrayOfDataInsert['TBLSETOR_DENDAKURANGBAYAR'] = isset($dendasetor) ? $dendasetor : 0;
	$arrayOfDataInsert['TBLSETOR_BUNGAKETETAPAN'] = '0';
	
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
	echo CJSON::encode(array('status'=>'success', 'data'=>$arrayOfDataInsert, 'debug'=>$seto));
} else {
	echo CJSON::encode(array('status'=>'failed', 'data'=>$arrayOfDataInsert));
}
}

public function actionGetrekening()
{
	$kode = $_REQUEST['kode'];
	$model = Yii::app()->db->createCommand("
		SELECT * FROM TBLREKENING
		WHERE TBLREKENING_KODEFULL = '".$kode."' ")->queryRow();

	echo CJSON::encode($model);
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
	$data['jenis_setoran'] = !empty(DMOrcl::getRequest('jenis_setoran')) ? base64_decode(base64_decode(DMOrcl::getRequest('jenis_setoran'))) : 0;

	$NAMATABEL = $this->namatabel;

	$select = "
	{$NAMATABEL}.*
	,NVL({$NAMATABEL}_THNSKPD, 0) AS {$NAMATABEL}_THNSKPD
	,NVL({$NAMATABEL}_BLNSKPD, 0) AS {$NAMATABEL}_BLNSKPD
	,NVL({$NAMATABEL}_TGLSKPD, 0) AS {$NAMATABEL}_TGLSKPD
	,NVL({$NAMATABEL}.TBLPENDATAAN_BLNPAJAK, 0) AS TBLPENDATAAN_BLNPAJAK
	,NVL({$NAMATABEL}.TBLPENDATAAN_TGLPAJAK, 0) AS TBLPENDATAAN_TGLPAJAK
	,NVL({$NAMATABEL}.TBLPENDATAAN_PAJAKKE, 0) AS TBLPENDATAAN_PAJAKKE
	,NVL({$NAMATABEL}_BUNGASPTPD, 0) AS {$NAMATABEL}_BUNGASPTPD
	,NVL({$NAMATABEL}_DENDAKRGBAYAR, 0) AS {$NAMATABEL}_DENDAKRGBAYAR

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
	(
		SELECT
		REFBADANUSAHA.REFBADANUSAHA_NAMA
		FROM
		REFBADANUSAHA
		WHERE
		REFBADANUSAHA.REFBADANUSAHA_ID = TBLDAFTAR.REFBADANUSAHA_IDPEMILIK
	) AS REFBADANUSAHA_NAMA,
	TBLSETOR.TBLSETOR_RUPIAHSETOR,
	TBLSETOR.TBLSETOR_DENDAKETETAPAN,
	TBLSETOR.TBLSETOR_DENDAKURANGBAYAR,
	TBLSETOR.TBLSETOR_TGLSETOR,
	TBLSETOR.TBLSETOR_BLNSETOR,
	TBLSETOR.TBLSETOR_THNSETOR,
	TBLSETOR_NOMORSSPD AS NOMORSSPD,
	TBLSETOR.TBLSETOR_JNSBAYAR
	";
	$from = 'TBLDAFTAR';

		$otherquery = array(
            	'leftjoin_trans'=>array($NAMATABEL, "TBLDAFTAR.TBLDAFTAR_NOPOK={$NAMATABEL}.TBLDAFTAR_NOPOK")
            	,'join_seto'=>array("TBLSETOR", "{$NAMATABEL}.TBLDAFTAR_NOPOK=TBLSETOR.TBLDAFTAR_NOPOK AND {$NAMATABEL}.TBLPENDATAAN_THNPAJAK=TBLSETOR.TBLPENDATAAN_THNPAJAK AND {$NAMATABEL}.TBLPENDATAAN_BLNPAJAK=TBLSETOR.TBLPENDATAAN_BLNPAJAK AND NVL({$NAMATABEL}.TBLPENDATAAN_TGLPAJAK,0)=NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0)")
        	);
		$add = "";
		if ($data['jenis_setoran']=='STPD') {
        	$filter = array(
	            'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
	            ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
	            ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
	        );
	        $add = "AND TRIM(TBLSETOR.TBLSETOR_JNSBAYAR)='STPD'";
	    } else if ($data['jenis_setoran']=='SKPDKB') {
	    	$filter = array(
	            'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
	            ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
	            ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
	        );
	        $add = "AND TRIM(TBLSETOR.TBLSETOR_JNSBAYAR)='SKPDKB'";
        } else {
        	$filter = array(
	            'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
	            ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
	            ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
	        );
	        $add = "AND TRIM(TBLSETOR.TBLSETOR_JNSBAYAR)='SPTPD'";
        }

		$otherquery['andwhere'] = "
		NVL(".$NAMATABEL . ".TBLPENDATAAN_TGLPAJAK, 0)=".$TBLPENDATAAN_TGLPAJAK."
		".$add."
		AND NVL(".$NAMATABEL . ".TBLPENDATAAN_PAJAKKE, 0)=".$TBLPENDATAAN_PAJAKKE."
		";
	


	$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
	$data['cetak'] = DBFetch::query($arrayConfig);
	// die();
	$this->CetakWordSSPD($data);
	Yii::app()->end();
}

public function CetakWordSSPD($data=array())
{
	$NAMATABEL = $this->namatabel;
	$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_sspd' . DIRECTORY_SEPARATOR;
	$namatpl = $path_tpl . 'SSPD-TRANSFER-NONREK-BPHTB.docx';
	$namafileDL = "SSPD-Transfer-Bphtb.docx"; 

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
		$rowWP = $data['cetak'];
		$jenis_setoran = $data['jenis_setoran'];

		$IS_SKPDKB = isset($rowWP[$NAMATABEL.'_PAJAKPERIKSA']) && $rowWP[$NAMATABEL.'_PAJAKPERIKSA']>0;
		$IS_BUNGA = isset($rowWP[$NAMATABEL.'_BUNGASPTPD']) && $rowWP[$NAMATABEL.'_BUNGASPTPD']>0;
		$IS_DENDA = isset($rowWP['TBLSETOR_DENDAKETETAPAN']) && $rowWP['TBLSETOR_DENDAKETETAPAN']>0;

		
		$nomorNPWPD = $rowWP['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$rowWP['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$rowWP['TBLKECAMATAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$rowWP['TBLKELURAHAN_IDBADANUSAHA']));
		
		// $utama['nomor'] = trim($rowWP['NOMORSSPD']);

		$utama['nomor'] = trim($rowWP['NOMORSSPD'])
		.$rowWP[$NAMATABEL.'_REKPENDAPATAN']
		.$rowWP[$NAMATABEL.'_REKPAD']
		.$rowWP[$NAMATABEL.'_REKPAJAK']
		.$rowWP[$NAMATABEL.'_REKAYAT']
		.sprintf('%02d', $rowWP[$NAMATABEL.'_REKJENIS'])
		.'20'
		.$rowWP[$NAMATABEL.'_TAHUNSETOR']
		;

		$utama['wp_nama'] = trim($rowWP['TBLDAFTAR_BADANUSAHANAMA']);
		$utama['wp_alamat'] = (trim($rowWP['TBLDAFTAR_BADANUSAHAALAMAT']));
		$utama['nopok'] = sprintf('%07d', $rowWP['TBLDAFTAR_NOPOK']);
		$utama['npwpd'] = $nomorNPWPD;
		$utama['wp_kelurahan_nama'] = $rowWP['REFKELURAHAN_NAMA'];
		$utama['wp_kecamatan_nama'] = $rowWP['REFKECAMATAN_NAMA'];
		$utama['wp_pemiliknama'] = trim($rowWP['TBLDAFTAR_PEMILIKNAMA']);
		$utama['wp_pemilikalamat'] = (trim($rowWP['TBLDAFTAR_PEMILIKALAMAT']));
		$utama['nosertifikat'] = $rowWP['TBLDAFTBPHTB_NOSERTIFIKAT'];
		$utama['tahunpajak'] = '20'.sprintf('%02d', $rowWP['TBLPENDATAAN_THNPAJAK']);
		$utama['thnpajak'] = $rowWP['TBLPENDATAAN_THNPAJAK'];
		$utama['blnpajak'] = $rowWP['TBLPENDATAAN_BLNPAJAK'];
		$utama['tglpajak'] = $rowWP['TBLPENDATAAN_TGLPAJAK'];
		$utama['pajakke'] = $rowWP['TBLPENDATAAN_PAJAKKE'];
		$utama['bulanpajak'] = LokalIndonesia::getBulan($rowWP['TBLPENDATAAN_BLNPAJAK']);
		$utama['tglskp'] = sprintf('%02d', $rowWP[$NAMATABEL.'_TGLSKPD']) .'/'. sprintf('%02d', $rowWP['TBLPENDATAAN_BLNPAJAK']) .'/'. sprintf('%02d', $rowWP[$NAMATABEL.'_THNSKPD']) ;

		if ($jenis_setoran=='STPD' || $jenis_setoran=='SKPDKB') {
			$nominal1 = $rowWP['TBLSETOR_RUPIAHSETOR'];
		} else {
			$nominal1 = $rowWP[$NAMATABEL.'_RUPIAHSETOR'];
		}	
		// $nominal1 = $rowWP[$NAMATABEL.'_RUPIAHSETOR'];
		$utama['rincino1'] = '1';
		$KODEAYAT = sprintf('%02d', $rowWP[$NAMATABEL.'_REKAYAT']);
		$KODEJENIS = sprintf('%02d', $rowWP[$NAMATABEL.'_REKJENIS']);
		$utama['rincirek1'] = "4.1.1.{$KODEAYAT}.{$KODEJENIS}";
		$utama['rincireknama1'] = ($rek = $this->getRekening($rowWP['REFBADANUSAHA_IDPEMILIK'])) ? $rek['TBLREKENING_NAMAREKENING'] : '';
		$utama['rincinominal1'] = LokalIndonesia::ribuan($nominal1);

		if ($jenis_setoran=='STPD') {
			$nominal2 = '0';
			$utama['rincireknama2'] = 'BUNGA KETERLAMBATAN'; //$IS_BUNGA ? 'BUNGA PAJAK' : '';
		} elseif ($jenis_setoran=='SKPDKB') {
			$nominal2 = isset($rowWP[$NAMATABEL.'_BUNGAKRGBAYAR']) ? $rowWP[$NAMATABEL.'_BUNGAKRGBAYAR'] : 0;
			$utama['rincireknama2'] = 'BUNGA PERIKSA'; //$IS_BUNGA ? 'BUNGA PAJAK' : '';
		} else {
			$nominal2 = isset($rowWP[$NAMATABEL.'_BUNGASPTPD']) ? $rowWP[$NAMATABEL.'_BUNGASPTPD'] : 0;
			$utama['rincireknama2'] = 'BUNGA KETERLAMBATAN'; //$IS_BUNGA ? 'BUNGA PAJAK' : '';
		}	
		// $nominal2 = $IS_BUNGA ? $rowWP[$NAMATABEL.'_BUNGASPTPD'] : 0;
		$utama['rincino2'] = '2'; //$IS_BUNGA ? '2' : '';
		$utama['rincirek2'] = "4.1.4.06.{$KODEAYAT}"; //$IS_BUNGA ? '4.1.4.06.01' : '';
		
		$utama['rincinominal2'] = LokalIndonesia::ribuan($nominal2); //$IS_BUNGA ? LokalIndonesia::ribuan($nominal2) : '';

		if ($jenis_setoran=='STPD') {
			$nominal3 = '0';
			
		} elseif ($jenis_setoran=='SKPDKB') {
			$nominal3 = ($rowWP['TBLSETOR_DENDAKETETAPAN']+$rowWP['TBLSETOR_DENDAKURANGBAYAR']);
			
		} else {
			$nominal3 = '0';
			
		}
		// $nominal3 = $IS_DENDA ? $rowWP['TBLSETOR_DENDAKETETAPAN'] : 0;
		$utama['rincino3'] = '3';
		$utama['rincirek3'] = "4.1.4.07.{$KODEAYAT}";
		$utama['rincireknama3'] = 'DENDA PAJAK';
		$utama['rincinominal3'] =LokalIndonesia::ribuan($nominal3);

		$utama['rincitotal'] = LokalIndonesia::ribuan($rincitotal = $nominal1+$nominal2+$nominal3);
		$utama['rincitotalterbilang'] = LokalIndonesia::terbilangangka($rincitotal);
		$utama['tglsetor'] = sprintf('%02d', $rowWP['TBLSETOR_TGLSETOR']) .'/'. sprintf('%02d', $rowWP['TBLSETOR_BLNSETOR']) .'/'. sprintf('%02d', $rowWP['TBLSETOR_THNSETOR']) ;

		$utama['REKENING'] = $rowWP[$NAMATABEL.'_REKPENDAPATAN'] . ' ' . $rowWP[$NAMATABEL.'_REKPAD'] . ' ' . $rowWP[$NAMATABEL.'_REKPAJAK'] . ' ' . sprintf('%02d', $rowWP[$NAMATABEL.'_REKAYAT']) . ' ' . sprintf('%02d', $rowWP[$NAMATABEL.'_REKJENIS']);
		$utama['jenis_bayar'] = $jenis_setoran;
		$utama['tglhariini'] = date('d-m-Y');
		$utama['tglcetak'] = date('d/m/Y');
		$utama['no'] = null;


		// debug
		// echo CJSON::encode($utama);Yii::app()->end();

		// Merge data in the first sheet 
		
		$otbs->MergeField('sspd', $utama); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();

		//INI CODING CETAK WORD SSPD
	}
}
