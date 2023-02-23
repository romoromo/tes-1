<?php

class EntrisetoranpajakrestoranController extends Controller
{
	public $namatabel = 'TBLDAFTRMAKAN';
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
		$nopok = trim($_POST['nopok']);

		$selectbpd 	= "";
		$joinbpd    = "";
		$andstpd  	= "";

		if($jenis_setoran=='SPTPD') {
			$kolomomzet = "".$this->namatabel."_PAJAK";
			$kolombunga = "".$this->namatabel."_BUNGASPTPD";
			$kolomdenda = "0";
			$kolompajak = "".$this->namatabel."_PAJAK";
			$kolomtotal = "(".$this->namatabel."_BUNGASPTPD+".$this->namatabel."_PAJAK)";
		} else if($jenis_setoran=='SKPD') {
			$kolomomzet = "".$this->namatabel."_PAJAK";
			$kolombunga = "".$this->namatabel."_BUNGASPTPD";
			$kolomdenda = "0";
			$kolompajak = "".$this->namatabel."_PAJAK";
			$kolomtotal = "(".$this->namatabel."_BUNGASPTPD+".$this->namatabel."_PAJAK)";
		} else if($jenis_setoran=='STPD') {
			$andstpd = "AND ".$this->namatabel."_BUNGATAGIHAN > 0";
			$kolomomzet = "".$this->namatabel."_PAJAK";
			$kolombunga = "0";
			$kolomdenda = "0";
			$kolompajak = "".$this->namatabel."_BUNGATAGIHAN";
			$kolomtotal = "".$this->namatabel."_BUNGATAGIHAN";
		} else if($jenis_setoran=='SKPDKB') {
			$andstpd = "AND ".$this->namatabel."_RUPIAHKRGBAYAR > 0";
			$kolomomzet = "".$this->namatabel."_PAJAK";
			$kolombunga = "".$this->namatabel."_BUNGAKRGBAYAR";
			$kolomdenda = "0";
			$kolompajak = "".$this->namatabel."_PAJAKPERIKSA";
			$kolomtotal = "".$this->namatabel."_RUPIAHKRGBAYAR";
		}

		$data = array();
		$model = array();
		if($jenis_setoran=='SKPDKB'){
			$data['ang'] = $this->cekpernahangsur($tahun,$bln,$tgl,$nopok, $jenis_setoran);	
		}
		if ($tahun=="") {
			$data['validate'] = 'kurang';
		}else if($bln==""){
			$data['validate'] = 'kurang';
		}else if($nopok==""){
			$data['validate'] = 'kurang';
		}else{
			$data['validate'] = 'lengkap';
			$data['exist'] = $this->cekpernahsetor($tahun,$bln,$tgl,$nopok, $jenis_setoran);
			$sql = "
			SELECT ".$this->namatabel.".*, TBLDAFTAR.*,
			".$selectbpd."
			".$this->namatabel."_REKURUSAN || '.' || 
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
			".$this->namatabel."_REKSUBJENIS AS TREKENING_NAMA,
			NVL(".$kolomomzet.",0) AS totalomzet,
			NVL(".$kolombunga.",0) AS bungasetor,
			NVL(".$kolomdenda.",0) AS dendasetor,
			NVL(".$kolompajak.",0) AS pajaksetor,
			NVL(".$kolomtotal.",0) AS totalsetor
			FROM ".$this->namatabel."
			JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK=".$this->namatabel.".TBLDAFTAR_NOPOK
			".$joinbpd."
			WHERE (
				".$this->namatabel.".TBLPENDATAAN_THNPAJAK='".substr($tahun,-2)."' 
				AND ".$this->namatabel.".TBLPENDATAAN_BLNPAJAK='".$bln."' 
				AND NVL(".$this->namatabel.".TBLPENDATAAN_TGLPAJAK, 0)='".$tgl."'
			) AND ".$this->namatabel.".TBLDAFTAR_NOPOK=".$nopok."
			".$andstpd."
			";
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

	public function cekpernahsetor($tahun,$bln,$tgl,$nopok, $jenis_setoran='')
	{	
		if ($jenis_setoran=='SPTPD') {
			$model = Yii::app()->db->createCommand("
			SELECT COUNT(TBLPENDATAAN_BLNPAJAK) AS JML 
			FROM TBLSETORANBPD
			WHERE 
			TBLPENDATAAN_THNPAJAK = ".(int) substr($tahun,-2)."
			AND TBLSETORANBPD_JNSBAYAR = 'SPTPD'
			AND TBLPENDATAAN_BLNPAJAK = ".$bln." 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$tgl." 
			AND TBLDAFTAR_NOPOK =".$nopok." 
			")->queryRow();
		}
		if ($jenis_setoran=='SKPDKB') {
			$model = Yii::app()->db->createCommand("
			SELECT COUNT(TBLPENDATAAN_BLNPAJAK) AS JML 
			FROM TBLSETORANBPD
			WHERE 
			TBLPENDATAAN_THNPAJAK = ".(int) substr($tahun,-2)."
			AND TBLSETORANBPD_JNSBAYAR = 'SKPDKB'
			AND TBLPENDATAAN_BLNPAJAK = ".$bln." 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$tgl." 
			AND TBLDAFTAR_NOPOK =".$nopok."
			")->queryRow();
		}
		if ($jenis_setoran=='STPD') {
			$model = Yii::app()->db->createCommand("
			SELECT COUNT(TBLPENDATAAN_BLNPAJAK) AS JML 
			FROM TBLSETORANBPD
			WHERE 
			TBLPENDATAAN_THNPAJAK = ".(int) substr($tahun,-2)."
			AND TBLSETORANBPD_JNSBAYAR = 'STPD'
			AND TBLPENDATAAN_BLNPAJAK = ".$bln." 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$tgl." 
			AND TBLDAFTAR_NOPOK =".$nopok."
			")->queryRow();
		}
		if ($model['JML']>0) {
			return 'ada';
		}else{
			return 'tidak';
		}
	}

	public function cekpernahangsur($tahun,$bln,$tgl,$nopok, $jenis_setoran='')
	{
		if ($jenis_setoran=='SKPDKB') {
			$model = Yii::app()->db->createCommand("
			SELECT COUNT(TBLPENDATAAN_BLNPAJAK) AS JML 
			FROM TBLANGSURAN
			WHERE 
			TBLPENDATAAN_THNPAJAK = ".(int) substr($tahun,-2)."
			AND TBLPENDATAAN_BLNPAJAK = ".$bln." 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$tgl." 
			AND TBLDAFTAR_NOPOK =".$nopok."
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
		$tahun = isset($_REQUEST['tahun']) && !empty($_REQUEST['tahun']) ? $_REQUEST['tahun'] : 0;
		$bln = isset($_REQUEST['bln']) && !empty($_REQUEST['bln']) ? $_REQUEST['bln'] : 0;
		$tgl = isset($_REQUEST['tgl']) && !empty($_REQUEST['tgl']) ? (int)$_REQUEST['tgl'] : 0;
		$nopok = isset($_REQUEST['nopok']) && !empty($_REQUEST['nopok']) ? $_REQUEST['nopok'] : 0;
		$NOMOR_SSPD = isset($_REQUEST['NOMOR_SSPD']) && !empty($_REQUEST['NOMOR_SSPD']) ? $_REQUEST['NOMOR_SSPD'] : 0;
		$NOMOR_SSPDSSTP = isset($_REQUEST['NOMOR_SSPDSSTP']) && !empty($_REQUEST['NOMOR_SSPDSSTP']) ? $_REQUEST['NOMOR_SSPDSSTP'] : 0;
		$NOMOR_SSPDKB = isset($_REQUEST['NOMOR_SSPDKB']) && !empty($_REQUEST['NOMOR_SSPDKB']) ? $_REQUEST['NOMOR_SSPDKB'] : 0;
		$TANGGAL_ENTRY = isset($_REQUEST['TANGGAL_ENTRY']) && !empty($_REQUEST['TANGGAL_ENTRY']) ? $_REQUEST['TANGGAL_ENTRY'] : 0;
		$TANGGALSETOR = isset($_REQUEST['TANGGALSETOR']) && !empty($_REQUEST['TANGGALSETOR']) ? $_REQUEST['TANGGALSETOR'] : 0;
		$TANGGAL_HITUNGAN_DENDA = isset($_REQUEST['TANGGAL_HITUNGAN_DENDA']) && !empty($_REQUEST['TANGGAL_HITUNGAN_DENDA']) ? $_REQUEST['TANGGAL_HITUNGAN_DENDA'] : 0;
		$exp_TANGGAL_ENTRY = explode('-', $TANGGAL_ENTRY);
		$exp_TANGGALSETOR = explode('-', $TANGGAL_ENTRY);
		
		$pajaksetor = isset($_REQUEST['pajaksetor']) && !empty($_REQUEST['pajaksetor']) ? $_REQUEST['pajaksetor'] : 0;
		$totalsetor = isset($_REQUEST['totalsetor']) && !empty($_REQUEST['totalsetor']) ? $_REQUEST['totalsetor'] : 0;
		$dendasetor = isset($_REQUEST['dendasetor']) && !empty($_REQUEST['dendasetor']) ? $_REQUEST['dendasetor'] : 0;
		$pajak = isset($_REQUEST['pajak']) && !empty($_REQUEST['pajak']) ? $_REQUEST['pajak'] : 0;
		
		$jenis_setoran = isset($_REQUEST['jenis_setoran']) && !empty($_REQUEST['jenis_setoran']) ? $_REQUEST['jenis_setoran'] : 0;

		$exist = $this->cekpernahsetor($tahun,$bln,$tgl,$nopok, $jenis_setoran);
		if ($exist=='ada') {
			echo CJSON::encode(array('pesan'=>'failed', 'posisi'=>'data sudah pernah di inputkan'));
		}else if ($jenis_setoran=='SPTPD' || $jenis_setoran=='SKPDKB'){
			//update ke tabel daftar makan
			$command = Yii::app()->db->createCommand();
			$update = $command->update($this->namatabel.'', array(
				$this->namatabel.'_TAHUNSETOR'=>isset($exp_TANGGALSETOR[2]) ?  substr($exp_TANGGALSETOR[2], -2) : '',
				$this->namatabel.'_BULANSETOR'=>isset($exp_TANGGALSETOR[1]) ? $exp_TANGGALSETOR[1] : '',
				$this->namatabel.'_TANGGALSETOR'=>isset($exp_TANGGALSETOR[0]) ? $exp_TANGGALSETOR[0] : '',
				$this->namatabel.'_REGSETOR'=>$NOMOR_SSPD,
				//$this->namatabel.'_REGTAGIHAN'=>$NOMOR_SSPDSSTP,
				//$this->namatabel.'_SSPDKURANGBAYAR'=>$NOMOR_SSPDKB,
				$this->namatabel.'_RUPIAHSETOR'=>$jenis_setoran=='SKPDKB' ? $totalsetor : $pajaksetor,
				$this->namatabel.'_THNENTRISETOR'=>isset($exp_TANGGAL_ENTRY[2]) ?  substr($exp_TANGGAL_ENTRY[2], -2) : '',
				$this->namatabel.'_BLNENTRISETOR'=>isset($exp_TANGGAL_ENTRY[1]) ? $exp_TANGGAL_ENTRY[1] : '',
				$this->namatabel.'_TGLENTRISETOR'=>isset($exp_TANGGAL_ENTRY[0]) ? $exp_TANGGAL_ENTRY[0] : '',
				), '
				TBLPENDATAAN_THNPAJAK=:thn 
				AND TBLPENDATAAN_BLNPAJAK=:bln 
				AND NVL(TBLPENDATAAN_TGLPAJAK, 0)=:tgl 
				AND TBLDAFTAR_NOPOK=:nopok
				', array(':thn'=>substr($tahun,-2), ':bln'=>$bln, ':tgl'=>$tgl, ':nopok'=>$nopok));
			if ($update) {
				$model = Yii::app()->db->createCommand('SELECT * FROM '.$this->namatabel.' WHERE TBLPENDATAAN_THNPAJAK='.substr($tahun,-2).' 
					AND TBLPENDATAAN_BLNPAJAK='.$bln.' 
					AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.' 
					AND TBLDAFTAR_NOPOK='.$nopok.'')->queryRow();
				$command_insrt = Yii::app()->db->createCommand();
				$arrayOfData = array(
					'TBLPENDATAAN_THNPAJAK'=>substr($tahun,-2),
					'TBLPENDATAAN_BLNPAJAK'=>$bln,
					'TBLPENDATAAN_TGLPAJAK'=>isset($model['TBLPENDATAAN_TGLPAJAK']) ? $model['TBLPENDATAAN_TGLPAJAK'] : '',
					'TBLPENDATAAN_PAJAKKE'=>isset($model['TBLPENDATAAN_PAJAKKE']) ? $model['TBLPENDATAAN_PAJAKKE'] : '',
					'TBLDAFTAR_JNSPENDAPATAN'=>isset($model['TBLDAFTAR_JNSPENDAPATAN']) ? $model['TBLDAFTAR_JNSPENDAPATAN'] : '',
					'TBLDAFTAR_NOPOK'=>isset($model['TBLDAFTAR_NOPOK']) ? $model['TBLDAFTAR_NOPOK'] : '',
					'TBLKECAMATAN_ID'=>isset($model['TBLKECAMATAN_ID']) ? $model['TBLKECAMATAN_ID'] : '',
					'TBLKELURAHAN_ID'=>isset($model['TBLKELURAHAN_ID']) ? $model['TBLKELURAHAN_ID'] : '',
					'TBLSETORANBPD_REKURUSAN'=>isset($model[$this->namatabel.'_REKURUSAN']) ? $model[$this->namatabel.'_REKURUSAN'] : '',
					'TBLSETORANBPD_REKPEMERINTAHAN'=>isset($model[$this->namatabel.'_REKPEMERINTAHAN']) ? $model[$this->namatabel.'_REKPEMERINTAHAN'] : '',
					'TBLSETORANBPD_REKORGANISASI'=>isset($model[$this->namatabel.'_REKORGANISASI']) ? $model[$this->namatabel.'_REKORGANISASI'] : '',
					'TBLSETORANBPD_REKPROGRAM'=>isset($model[$this->namatabel.'_REKPROGRAM']) ? $model[$this->namatabel.'_REKPROGRAM'] : '',
					'TBLSETORANBPD_REKKEGIATAN'=>isset($model[$this->namatabel.'_REKKEGIATAN']) ? $model[$this->namatabel.'_REKKEGIATAN'] : '',
					'TBLSETORANBPD_REKDINAS'=>isset($model[$this->namatabel.'_REKDINAS']) ? $model[$this->namatabel.'_REKDINAS'] : '',
					'TBLSETORANBPD_REKBIDANG'=>isset($model[$this->namatabel.'_REKBIDANG']) ? $model[$this->namatabel.'_REKBIDANG'] : '',
					'TBLSETORANBPD_REKPENDAPATAN'=>isset($model[$this->namatabel.'_REKPENDAPATAN']) ? $model[$this->namatabel.'_REKPENDAPATAN'] : '',
					'TBLSETORANBPD_REKPAD'=>isset($model[$this->namatabel.'_REKPAD']) ? $model[$this->namatabel.'_REKPAD'] : '',
					'TBLSETORANBPD_REKPAJAK'=>isset($model[$this->namatabel.'_REKPAJAK']) ? $model[$this->namatabel.'_REKPAJAK'] : '',
					'TBLSETORANBPD_REKAYAT'=>isset($model[$this->namatabel.'_REKAYAT']) ? $model[$this->namatabel.'_REKAYAT'] : '',
					'TBLSETORANBPD_REKJENIS'=>isset($model[$this->namatabel.'_REKJENIS']) ? $model[$this->namatabel.'_REKJENIS'] : '',
					'TBLSETORANBPD_REKSUBJENIS'=>isset($model[$this->namatabel.'_REKSUBJENIS']) ? $model[$this->namatabel.'_REKSUBJENIS'] : '',
					'TBLSETORANBPD_GOLONGAN'=>isset($model['TBLDAFTAR_GOLONGAN']) ? $model['TBLDAFTAR_GOLONGAN'] : '',
					//belum tahu di isi apa
					'TBLSETORANBPD_JNSKETETAPAN'=>$jenis_setoran=='SKPDKB' ? 'K' : '',
					'KDSU'=>"",
					'TBLSETORANBPD_JNSBAYAR'=>$jenis_setoran,
					'TBLSETORANBPD_TGLSURAT'=>"0",
					'TBLSETORANBPD_BLNSURAT'=>$bln,
					'TBLSETORANBPD_THNSURAT'=>"0",
					'TBLSETORANBPD_NOMORSURAT'=>"",
					'TBLSETORANBPD_TGLBATASSURAT'=>isset($model[$this->namatabel.'_TGLBATASSPTPD']) ? $model[$this->namatabel.'_TGLBATASSPTPD'] : '',
					'TBLSETORANBPD_BLNBATASSURAT'=>isset($model[$this->namatabel.'_BLNBATASSPTPD']) ? $model[$this->namatabel.'_BLNBATASSPTPD'] : '',
					'TBLSETORANBPD_THNBATASSURAT'=>isset($model[$this->namatabel.'_THNBATASSPTPD']) ? $model[$this->namatabel.'_THNBATASSPTPD'] : '',
					'KDMED'=>"0",
					'KDREF'=>"0",
					'KDSET'=>"1",
					'TBLSETORANBPD_STATUSBAYAR'=>"10",
					'TBLSETORANBPD_JENISSETOR'=>'B',
					// 'TBLSETORANBPD_TGLSETOR'=>isset($model[$this->namatabel.'_TGLSETOR']) ? $model[$this->namatabel.'_TGLSETOR'] : '',
					// 'TBLSETORANBPD_BLNSETOR'=>isset($model[$this->namatabel.'_BULANSETOR']) ? $model[$this->namatabel.'_BULANSETOR'] : '',
					// 'TBLSETORANBPD_THNSETOR'=>isset($model[$this->namatabel.'_TAHUNSETOR']) ? $model[$this->namatabel.'_TAHUNSETOR'] : '',
					'TBLSETORANBPD_THNSETOR'=>isset($exp_TANGGAL_ENTRY[2]) ?  substr($exp_TANGGAL_ENTRY[2], -2) : '',
					'TBLSETORANBPD_BLNSETOR'=>isset($exp_TANGGAL_ENTRY[1]) ? $exp_TANGGAL_ENTRY[1] : '',
					'TBLSETORANBPD_TGLSETOR'=>isset($exp_TANGGAL_ENTRY[0]) ? $exp_TANGGAL_ENTRY[0] : '',
					'TBLSETORANBPD_NOMORSSPD'=>$NOMOR_SSPD,
					//belum tahu nyimpennya ke mana
					'TBLSETORANBPD_THNSSPD'=>isset($exp_TANGGAL_ENTRY[2]) ?  substr($exp_TANGGAL_ENTRY[2], -2) : '',
					'TBLSETORANBPD_BLNSSPD'=>isset($exp_TANGGAL_ENTRY[1]) ? $exp_TANGGAL_ENTRY[1] : '',
					'TBLSETORANBPD_TGLSSPD'=>isset($exp_TANGGAL_ENTRY[0]) ? $exp_TANGGAL_ENTRY[0] : '',
					//end of belum tahu nyimpennya ke mana
					'JENSET'=>"",
					'NOCG'=>"",
					'NOREK'=>"",
					'BANK'=>"",
					'BANCB'=>"",
					'TGCGT'=>"0",
					'TGCAIR'=>"0",
					'LUNAS'=>"",
					'TBLSETORANBPD_JNSTAGIHAN'=>$jenis_setoran=='SKPDKB' ? 'K' : '',
					'TBLSETORANBPD_JNSREKLAME'=>"",
					'BLBU'=>"",
					'BASTP'=>"",
					'TBLSETORANBPD_TGLTAGIHAN'=>"",
					'TBLSETORANBPD_BLNTAGIHAN'=>"",
					'TBLSETORANBPD_THNTAGIHAN'=>"",
					'BAKB'=>"",
					'TBLSETORANBPD_RUPIAHPAJAK'=>$jenis_setoran=='SKPDKB' ? $model[$this->namatabel.'_PAJAKPERIKSA'] : (isset($model[$this->namatabel.'_PAJAK']) ? $model[$this->namatabel.'_PAJAK'] : 0),
					'TBLSETORANBPD_RUPIAHSETOR'=>$jenis_setoran=='SKPDKB' ? $model[$this->namatabel.'_PAJAKPERIKSA'] : (isset($model[$this->namatabel.'_PAJAK']) ? $model[$this->namatabel.'_PAJAK'] : 0),
					'TBLSETORANBPD_KETETAPANPAJAK'=>"0",
					// 'TBLSETORANBPD_KETETAPANPAJAK'=>($jenis_setoran=='SKPDKB' &&  ? $pajak : (isset($model[$this->namatabel.'_PAJAK']) ? $model[$this->namatabel.'_PAJAK'] : 0)),
					// 'TBLSETORANBPD_RUPIAHSETOR'=>$pajaksetor,
					'RPRET'=>"",
					// 'TBLSETORANBPD_KETETAPANPAJAK'=>$pajaksetor,
					'TBLSETORANBPD_RUPIAHTAGIHAN'=>"",
					'TBLSETORANBPD_PAJAKKURANGBAYAR'=>$jenis_setoran=='SKPDKB' ? $model[$this->namatabel.'_RUPIAHKRGBAYAR'] : 0,
					'TBLSETORANBPD_BUNGAKETETAPAN'=>$jenis_setoran=='SPTPD' ? (isset($model[$this->namatabel.'_BUNGASPTPD']) ? $model[$this->namatabel.'_BUNGASPTPD'] : 0) : ($jenis_setoran=='SKPDKB' ? (isset($model[$this->namatabel.'_BUNGAKRGBAYAR']) ? $model[$this->namatabel.'_BUNGAKRGBAYAR'] : 0) : 0),
					'TBLSETORANBPD_BUNGATAGIHAN'=>"",
					'TBLSETORANBPD_BUNGAKURANGBAYAR'=>"",
					'BURET'=>"0",
					'TBLSETORANBPD_DENDAKETETAPAN'=>$jenis_setoran=='SKPDKB' ? ((isset($model[$this->namatabel.'_NAKB']) ? $model[$this->namatabel.'_NAKB'] : 0)+$dendasetor) : 0,
					'TBLSETORANBPD_DENDATAGIHAN'=>"0",
					'TBLSETORANBPD_DENDAKURANGBAYAR'=>$dendasetor,
					'DDRET'=>$jenis_setoran=='SKPDKB' ? (isset($model[$this->namatabel.'_NAKB']) ? $model[$this->namatabel.'_NAKB'] : 0) : 0,
					'NAIK'=>"0",
					'ADM'=>"0",
					'RPSSKP'=>$pajaksetor>0 && $jenis_setoran=='SKPDKB' ? $pajaksetor : (isset($model[$this->namatabel.'_PAJAK']) ? $model[$this->namatabel.'_PAJAK'] : 0),
					'RPSSTP'=>"0",
					'RPSKB'=>"0",
					'RPSRET'=>"0",
					'UK1'=>"0",
					'UK2'=>"0",
					'UK3'=>"0",
					'TBLSETORANBPD_LOKET'=> substr( "BKP " . Yii::app()->user->nama_pengguna . '    ' . date('H:i:s'), 0, 24),
					'DUP'=>"0",
					'KET'=>"",
					// 'TBLSETORANBPD_ISBPD'=>"",
					// 'TBLSETORANBPD_TELERBPD'=>"",
					// 'TBLSETORANBPD_TGLBPD'=>"",
					// 'KPPD'=>"",
					// 'KETKPPD'=>"",
					// 'TGKPPD'=>"",
					);
				$insert = $command_insrt->insert('TBLSETORANBPD', $arrayOfData);
				if ($insert) {
					echo CJSON::encode(array('pesan'=>'success'));
				}else{
					echo CJSON::encode(array('pesan'=>'failed', 'posisi'=>'insert ke bpd'));
				}
			} else {
				// print_r($update);
				echo CJSON::encode(array('pesan'=>'failed', 'posisi'=>'update data spt gagal', 'updatestatus'=>$update));
			}
		}else if ($jenis_setoran=='STPD'){
				$model = Yii::app()->db->createCommand('SELECT * FROM '.$this->namatabel.' WHERE TBLPENDATAAN_THNPAJAK='.substr($tahun,-2).' 
					AND TBLPENDATAAN_BLNPAJAK='.$bln.' 
					AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.' 
					AND TBLDAFTAR_NOPOK='.$nopok.'')->queryRow();
				$command_insrt = Yii::app()->db->createCommand();
				$arrayOfData = array(
					'TBLPENDATAAN_THNPAJAK'=>substr($tahun,-2),
					'TBLPENDATAAN_BLNPAJAK'=>$bln,
					'TBLPENDATAAN_TGLPAJAK'=>isset($model['TBLPENDATAAN_TGLPAJAK']) ? $model['TBLPENDATAAN_TGLPAJAK'] : '',
					'TBLPENDATAAN_PAJAKKE'=>isset($model['TBLPENDATAAN_PAJAKKE']) ? $model['TBLPENDATAAN_PAJAKKE'] : '',
					'TBLDAFTAR_JNSPENDAPATAN'=>isset($model['TBLDAFTAR_JNSPENDAPATAN']) ? $model['TBLDAFTAR_JNSPENDAPATAN'] : '',
					'TBLDAFTAR_NOPOK'=>isset($model['TBLDAFTAR_NOPOK']) ? $model['TBLDAFTAR_NOPOK'] : '',
					'TBLKECAMATAN_ID'=>isset($model['TBLKECAMATAN_ID']) ? $model['TBLKECAMATAN_ID'] : '',
					'TBLKELURAHAN_ID'=>isset($model['TBLKELURAHAN_ID']) ? $model['TBLKELURAHAN_ID'] : '',
					'TBLSETORANBPD_REKURUSAN'=>isset($model[$this->namatabel.'_REKURUSAN']) ? $model[$this->namatabel.'_REKURUSAN'] : '',
					'TBLSETORANBPD_REKPEMERINTAHAN'=>isset($model[$this->namatabel.'_REKPEMERINTAHAN']) ? $model[$this->namatabel.'_REKPEMERINTAHAN'] : '',
					'TBLSETORANBPD_REKORGANISASI'=>isset($model[$this->namatabel.'_REKORGANISASI']) ? $model[$this->namatabel.'_REKORGANISASI'] : '',
					'TBLSETORANBPD_REKPROGRAM'=>isset($model[$this->namatabel.'_REKPROGRAM']) ? $model[$this->namatabel.'_REKPROGRAM'] : '',
					'TBLSETORANBPD_REKKEGIATAN'=>isset($model[$this->namatabel.'_REKKEGIATAN']) ? $model[$this->namatabel.'_REKKEGIATAN'] : '',
					'TBLSETORANBPD_REKDINAS'=>isset($model[$this->namatabel.'_REKDINAS']) ? $model[$this->namatabel.'_REKDINAS'] : '',
					'TBLSETORANBPD_REKBIDANG'=>isset($model[$this->namatabel.'_REKBIDANG']) ? $model[$this->namatabel.'_REKBIDANG'] : '',
					'TBLSETORANBPD_REKPENDAPATAN'=>isset($model[$this->namatabel.'_REKPENDAPATAN']) ? $model[$this->namatabel.'_REKPENDAPATAN'] : '',
					'TBLSETORANBPD_REKPAD'=>isset($model[$this->namatabel.'_REKPAD']) ? $model[$this->namatabel.'_REKPAD'] : '',
					'TBLSETORANBPD_REKPAJAK'=>isset($model[$this->namatabel.'_REKPAJAK']) ? $model[$this->namatabel.'_REKPAJAK'] : '',
					'TBLSETORANBPD_REKAYAT'=>isset($model[$this->namatabel.'_REKAYAT']) ? $model[$this->namatabel.'_REKAYAT'] : '',
					'TBLSETORANBPD_REKJENIS'=>isset($model[$this->namatabel.'_REKJENIS']) ? $model[$this->namatabel.'_REKJENIS'] : '',
					'TBLSETORANBPD_REKSUBJENIS'=>isset($model[$this->namatabel.'_REKSUBJENIS']) ? $model[$this->namatabel.'_REKSUBJENIS'] : '',
					'TBLSETORANBPD_GOLONGAN'=>isset($model['TBLDAFTAR_GOLONGAN']) ? $model['TBLDAFTAR_GOLONGAN'] : '',
					//belum tahu di isi apa
					'TBLSETORANBPD_JNSKETETAPAN'=>"T",
					'KDSU'=>"",
					'TBLSETORANBPD_JNSBAYAR'=>$jenis_setoran,
					'TBLSETORANBPD_TGLSURAT'=>isset($model[$this->namatabel.'_TGLSURATTAGIHAN']) ? $model[$this->namatabel.'_TGLSURATTAGIHAN'] : '',
					'TBLSETORANBPD_BLNSURAT'=>isset($model[$this->namatabel.'_BLNSURATTAGIHAN']) ? $model[$this->namatabel.'_BLNSURATTAGIHAN'] : '',
					'TBLSETORANBPD_THNSURAT'=>isset($model[$this->namatabel.'_THNSURATTAGIHAN']) ? $model[$this->namatabel.'_THNSURATTAGIHAN'] : '',
					'TBLSETORANBPD_NOMORSURAT'=>isset($model[$this->namatabel.'_NOSURATTAGIHAN']) ? $model[$this->namatabel.'_NOSURATTAGIHAN'] : '',
					'TBLSETORANBPD_TGLBATASSURAT'=>isset($model[$this->namatabel.'_TGLBTSTAGIHAN']) ? $model[$this->namatabel.'_TGLBTSTAGIHAN'] : '',
					'TBLSETORANBPD_BLNBATASSURAT'=>isset($model[$this->namatabel.'_BLNBTSTAGIHAN']) ? $model[$this->namatabel.'_BLNBTSTAGIHAN'] : '',
					'TBLSETORANBPD_THNBATASSURAT'=>isset($model[$this->namatabel.'_THNBTSTAGIHAN']) ? $model[$this->namatabel.'_THNBTSTAGIHAN'] : '',
					'KDMED'=>"0",
					'KDREF'=>"0",
					'KDSET'=>"1",
					'TBLSETORANBPD_STATUSBAYAR'=>"10",
					'TBLSETORANBPD_JENISSETOR'=>'B',
					// 'TBLSETORANBPD_TGLSETOR'=>isset($model[$this->namatabel.'_TGLSETOR']) ? $model[$this->namatabel.'_TGLSETOR'] : '',
					// 'TBLSETORANBPD_BLNSETOR'=>isset($model[$this->namatabel.'_BULANSETOR']) ? $model[$this->namatabel.'_BULANSETOR'] : '',
					// 'TBLSETORANBPD_THNSETOR'=>isset($model[$this->namatabel.'_TAHUNSETOR']) ? $model[$this->namatabel.'_TAHUNSETOR'] : '',
					'TBLSETORANBPD_THNSETOR'=>isset($exp_TANGGAL_ENTRY[2]) ?  substr($exp_TANGGAL_ENTRY[2], -2) : '',
					'TBLSETORANBPD_BLNSETOR'=>isset($exp_TANGGAL_ENTRY[1]) ? $exp_TANGGAL_ENTRY[1] : '',
					'TBLSETORANBPD_TGLSETOR'=>isset($exp_TANGGAL_ENTRY[0]) ? $exp_TANGGAL_ENTRY[0] : '',
					'TBLSETORANBPD_NOMORSSPD'=>$NOMOR_SSPD,
					//belum tahu nyimpennya ke mana
					'TBLSETORANBPD_THNSSPD'=>isset($exp_TANGGAL_ENTRY[2]) ?  substr($exp_TANGGAL_ENTRY[2], -2) : '',
					'TBLSETORANBPD_BLNSSPD'=>isset($exp_TANGGAL_ENTRY[1]) ? $exp_TANGGAL_ENTRY[1] : '',
					'TBLSETORANBPD_TGLSSPD'=>isset($exp_TANGGAL_ENTRY[0]) ? $exp_TANGGAL_ENTRY[0] : '',
					//end of belum tahu nyimpennya ke mana
					'JENSET'=>"",
					'NOCG'=>"",
					'NOREK'=>"",
					'BANK'=>"",
					'BANCB'=>"",
					'TGCGT'=>"0",
					'TGCAIR'=>"0",
					'LUNAS'=>"",
					'TBLSETORANBPD_JNSTAGIHAN'=>"T",
					'TBLSETORANBPD_JNSREKLAME'=>"",
					'BLBU'=>"",
					'BASTP'=>"",
					'TBLSETORANBPD_TGLTAGIHAN'=>isset($exp_TANGGAL_ENTRY[0]) ? $exp_TANGGAL_ENTRY[0] : '',
					'TBLSETORANBPD_BLNTAGIHAN'=>isset($exp_TANGGAL_ENTRY[1]) ? $exp_TANGGAL_ENTRY[1] : '',
					'TBLSETORANBPD_THNTAGIHAN'=>isset($exp_TANGGAL_ENTRY[2]) ?  substr($exp_TANGGAL_ENTRY[2], -2) : '',
					'BAKB'=>"",
					'TBLSETORANBPD_RUPIAHPAJAK'=>isset($model[$this->namatabel.'_PAJAK']) ? $model[$this->namatabel.'_PAJAK'] : 0,
					'TBLSETORANBPD_RUPIAHSETOR'=>isset($model[$this->namatabel.'_BUNGATAGIHAN']) ? $model[$this->namatabel.'_BUNGATAGIHAN'] : 0,
					'TBLSETORANBPD_KETETAPANPAJAK'=>isset($model[$this->namatabel.'_PAJAK']) ? $model[$this->namatabel.'_PAJAK'] : 0,
					// 'TBLSETORANBPD_KETETAPANPAJAK'=>($jenis_setoran=='SKPDKB' &&  ? $pajak : (isset($model[$this->namatabel.'_PAJAK']) ? $model[$this->namatabel.'_PAJAK'] : 0)),
					// 'TBLSETORANBPD_RUPIAHSETOR'=>$pajaksetor,
					'RPRET'=>"",
					// 'TBLSETORANBPD_KETETAPANPAJAK'=>$pajaksetor,
					'TBLSETORANBPD_RUPIAHTAGIHAN'=>isset($model[$this->namatabel.'_BUNGATAGIHAN']) ? $model[$this->namatabel.'_BUNGATAGIHAN'] : 0,
					'TBLSETORANBPD_PAJAKKURANGBAYAR'=>"",
					'TBLSETORANBPD_BUNGAKETETAPAN'=>"",
					'TBLSETORANBPD_BUNGATAGIHAN'=>"0",
					'TBLSETORANBPD_BUNGAKURANGBAYAR'=>"",
					'BURET'=>"0",
					'TBLSETORANBPD_DENDAKETETAPAN'=>$dendasetor,
					'TBLSETORANBPD_DENDATAGIHAN'=>"0",
					'TBLSETORANBPD_DENDAKURANGBAYAR'=>"",
					'DDRET'=>"",
					'NAIK'=>"0",
					'ADM'=>"0",
					'RPSSKP'=>isset($model[$this->namatabel.'_PAJAK']) ? $model[$this->namatabel.'_PAJAK'] : 0,
					'RPSSTP'=>"0",
					'RPSKB'=>"0",
					'RPSRET'=>"0",
					'UK1'=>"0",
					'UK2'=>"0",
					'UK3'=>"0",
					'TBLSETORANBPD_LOKET'=> substr( "BKP " . Yii::app()->user->nama_pengguna . '    ' . date('H:i:s'), 0, 24),
					'DUP'=>"0",
					'KET'=>"",
					// 'TBLSETORANBPD_ISBPD'=>"",
					// 'TBLSETORANBPD_TELERBPD'=>"",
					// 'TBLSETORANBPD_TGLBPD'=>"",
					// 'KPPD'=>"",
					// 'KETKPPD'=>"",
					// 'TGKPPD'=>"",
					);
				$insert = $command_insrt->insert('TBLSETORANBPD', $arrayOfData);
				if ($insert) {
					echo CJSON::encode(array('pesan'=>'success'));
				}else{
					echo CJSON::encode(array('pesan'=>'failed', 'posisi'=>'insert ke bpd'));
				}
			
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
		// echo $data['jenis_setoran'];die();
		$NAMATABEL = $this->namatabel;

        $select = "
         	{$NAMATABEL}.*
         	,NVL({$NAMATABEL}.{$NAMATABEL}_THNSKPD, 0) AS {$NAMATABEL}_THNSKPD
         	,NVL({$NAMATABEL}.{$NAMATABEL}_BLNSKPD, 0) AS {$NAMATABEL}_BLNSKPD
         	,NVL({$NAMATABEL}.{$NAMATABEL}_TGLSKPD, 0) AS {$NAMATABEL}_TGLSKPD
         	,NVL({$NAMATABEL}.TBLPENDATAAN_BLNPAJAK, 0) AS TBLPENDATAAN_BLNPAJAK
         	,NVL({$NAMATABEL}.TBLPENDATAAN_TGLPAJAK, 0) AS TBLPENDATAAN_TGLPAJAK
         	,NVL({$NAMATABEL}.TBLPENDATAAN_PAJAKKE, 0) AS TBLPENDATAAN_PAJAKKE
         	,NVL({$NAMATABEL}.{$NAMATABEL}_BUNGASPTPD, 0) AS {$NAMATABEL}_BUNGASPTPD
         	,NVL({$NAMATABEL}.{$NAMATABEL}_DENDAKRGBAYAR, 0) AS {$NAMATABEL}_DENDAKRGBAYAR
			
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
					REFBADANUSAHA.REFBADANUSAHA_ID = TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA
			) AS REFBADANUSAHA_NAMA,
			TBLSETORANBPD.TBLSETORANBPD_RUPIAHSETOR,
			TBLSETORANBPD.TBLSETORANBPD_DENDAKETETAPAN,
			TBLSETORANBPD.TBLSETORANBPD_BUNGAKETETAPAN,
			TBLSETORANBPD.TBLSETORANBPD_TGLSETOR,
			TBLSETORANBPD.TBLSETORANBPD_BLNSETOR,
			TBLSETORANBPD.TBLSETORANBPD_THNSETOR,
			TBLSETORANBPD_NOMORSSPD AS NOMORSSPD,
			TBLSETORANBPD.TBLSETORANBPD_JNSBAYAR
		";
         $from = 'TBLDAFTAR';

        
        	$otherquery = array(
            	'leftjoin_trans'=>array($NAMATABEL, "TBLDAFTAR.TBLDAFTAR_NOPOK={$NAMATABEL}.TBLDAFTAR_NOPOK")
            	,'join_setbpd'=>array("TBLSETORANBPD", "{$NAMATABEL}.TBLDAFTAR_NOPOK=TBLSETORANBPD.TBLDAFTAR_NOPOK AND {$NAMATABEL}.TBLPENDATAAN_THNPAJAK=TBLSETORANBPD.TBLPENDATAAN_THNPAJAK AND {$NAMATABEL}.TBLPENDATAAN_BLNPAJAK=TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK")
        	);

        if ($data['jenis_setoran']=='STPD') {
        	$filter = array(
	            'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
	            ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
	            ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
	            ,'EQ__TBLSETORANBPD.TBLSETORANBPD_JNSBAYAR' => 'STPD'
	        );
	    } else if ($data['jenis_setoran']=='SKPDKB') {
	    	$filter = array(
	            'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
	            ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
	            ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
	            ,'EQ__TBLSETORANBPD.TBLSETORANBPD_JNSBAYAR' => 'SKPDKB'
	        );
        } else {
        	$filter = array(
	            'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
	            ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
	            ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
	            ,'EQ__TBLSETORANBPD.TBLSETORANBPD_JNSBAYAR' => 'SPTPD'
	        );
        }

        // if (!empty($TBLPENDATAAN_TGLPAJAK)) {
	        $otherquery['andwhere'] = '
	        NVL('.$NAMATABEL . '.TBLPENDATAAN_TGLPAJAK, 0)='.$TBLPENDATAAN_TGLPAJAK.'
	        AND NVL('.$NAMATABEL . '.TBLPENDATAAN_PAJAKKE, 0)='.$TBLPENDATAAN_PAJAKKE.'
	        ';
        // }


        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);

        $this->CetakWordSSPD($data);
        Yii::app()->end();
	}

	public function CetakWordSSPD($data=array())
	{
		$NAMATABEL = $this->namatabel;
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_sspd' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'SSPD-NONREK.docx';
		$namafileDL = "SSPD-Restoran.docx"; 

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
		$IS_SKPDKB = isset($rowWP[$NAMATABEL.'_RUPIAHKRGBAYAR']) && $rowWP[$NAMATABEL.'_RUPIAHKRGBAYAR']>0;
		$IS_BUNGA = isset($rowWP[$NAMATABEL.'_BUNGASPTPD']) && $rowWP[$NAMATABEL.'_BUNGASPTPD']>0;
		$IS_DENDA = isset($rowWP['TBLSETORANBPD_DENDAKETETAPAN']) && $rowWP['TBLSETORANBPD_DENDAKETETAPAN']>0;

		$nomorNPWPD = $rowWP['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$rowWP['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$rowWP['TBLKECAMATAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$rowWP['TBLKELURAHAN_IDBADANUSAHA']));
		// if ($jenis_setoran=='STPD' || $jenis_setoran=='SKPDKB') {
		// 	$utama['nomor'] = trim($rowWP['TBLSETORANBPD_NOMORSSPD']);
		// } else {
		// 	$utama['nomor'] = trim($rowWP['NOMORSSPD']);
		// }
		$utama['nomor'] = trim($rowWP['NOMORSSPD']);
		$utama['wp_nama'] = trim($rowWP['TBLDAFTAR_BADANUSAHANAMA']);
		$utama['wp_alamat'] = (trim($rowWP['TBLDAFTAR_BADANUSAHAALAMAT']));
		$utama['nopok'] = sprintf('%07d', $rowWP['TBLDAFTAR_NOPOK']);
		$utama['npwpd'] = $nomorNPWPD;
		$utama['wp_kelurahan_nama'] = $rowWP['REFKELURAHAN_NAMA'];
		$utama['wp_kecamatan_nama'] = $rowWP['REFKECAMATAN_NAMA'];
		$utama['wp_pemiliknama'] = trim($rowWP['TBLDAFTAR_PEMILIKNAMA']);
		$utama['wp_pemilikalamat'] = (trim($rowWP['TBLDAFTAR_PEMILIKALAMAT']));

		$utama['tahunpajak'] = '20'.sprintf('%02d', $rowWP['TBLPENDATAAN_THNPAJAK']);
		$utama['thnpajak'] = $rowWP['TBLPENDATAAN_THNPAJAK'];
		$utama['blnpajak'] = $rowWP['TBLPENDATAAN_BLNPAJAK'];
		$utama['tglpajak'] = $rowWP['TBLPENDATAAN_TGLPAJAK'];
		$utama['pajakke'] = $rowWP['TBLPENDATAAN_PAJAKKE'];
		$utama['bulanpajak'] = LokalIndonesia::getBulan($rowWP['TBLPENDATAAN_BLNPAJAK']);
		$utama['tglskp'] = sprintf('%02d', $rowWP[$NAMATABEL.'_TGLSKPD']) .'/'. sprintf('%02d', $rowWP['TBLPENDATAAN_BLNPAJAK']) .'/'. sprintf('%02d', $rowWP[$NAMATABEL.'_THNSKPD']) ;
		
		if ($jenis_setoran=='STPD' || $jenis_setoran=='SKPDKB') {
			$nominal1 = $rowWP['TBLSETORANBPD_RUPIAHSETOR'];
		} else {
			$nominal1 = $rowWP[$NAMATABEL.'_RUPIAHSETOR'];
		} 
		$utama['rincino1'] = '1';
		$KODEAYAT = sprintf('%02d', $rowWP[$NAMATABEL.'_REKAYAT']);
		$KODEJENIS = sprintf('%02d', $rowWP[$NAMATABEL.'_REKJENIS']);
		$utama['rincirek1'] = "4.1.1.{$KODEAYAT}.{$KODEJENIS}";
		$utama['rincireknama1'] = ($rek = $this->getRekening($rowWP['REFBADANUSAHA_IDBADANUSAHA'])) ? $rek['TBLREKENING_NAMAREKENING'] : '';
		$utama['rincinominal1'] = LokalIndonesia::ribuan($nominal1);

		if ($jenis_setoran=='STPD') {
			$nominal2 = '0';
			$utama['rincireknama2'] = 'BUNGA KETERLAMBATAN';
		} elseif ($jenis_setoran=='SPTPD') {
			$nominal2 = isset($rowWP[$NAMATABEL.'_BUNGASPTPD']) ? $rowWP[$NAMATABEL.'_BUNGASPTPD'] :0;
			$utama['rincireknama2'] = 'BUNGA KETERLAMBATAN';
		} elseif ($jenis_setoran=='SKPDKB') {
			$nominal2 = isset($rowWP['TBLSETORANBPD_BUNGAKETETAPAN']) ? $rowWP['TBLSETORANBPD_BUNGAKETETAPAN'] :0;
			$utama['rincireknama2'] = 'BUNGA PERIKSA';
		}
		$utama['rincino2'] = '2'; //$IS_BUNGA ? '2' : '';
		$utama['rincirek2'] = "4.1.4.06.{$KODEAYAT}"; //$IS_BUNGA ? '4.1.4.06.{$KODEAYAT}' : '';
		// $utama['rincireknama2'] = 'BUNGA KETERLAMBATAN'; //$IS_BUNGA ? 'BUNGA PAJAK' : '';
		$utama['rincinominal2'] = LokalIndonesia::ribuan($nominal2); //$IS_BUNGA ? LokalIndonesia::ribuan($nominal2) : '';

		if ($jenis_setoran=='SKPDKB') {
			$nominal3 = isset($rowWP['TBLSETORANBPD_DENDAKETETAPAN']) ? $rowWP['TBLSETORANBPD_DENDAKETETAPAN'] :0;
		} else {
			$nominal3 = '0';
			
		}
		// $nominal3 = $IS_DENDA ? $rowWP['TBLSETORANBPD_DENDAKETETAPAN'] : 0;
		$utama['rincino3'] = '3';
		$utama['rincirek3'] = "4.1.4.07.{$KODEAYAT}";
		$utama['rincireknama3'] = 'DENDA PAJAK';
		$utama['rincinominal3'] = $IS_DENDA ? LokalIndonesia::ribuan($nominal3) : '0';
		
		if ($jenis_setoran=='SKPDKB') {
			$utama['rincitotal'] = LokalIndonesia::ribuan($rincitotal = $nominal1+$nominal2+$nominal3);
		} else {
			$utama['rincitotal'] = LokalIndonesia::ribuan($rincitotal = $nominal1+$nominal2);
		}

		$utama['rincitotalterbilang'] = LokalIndonesia::terbilangangka($rincitotal);
		
			$utama['tglsetor'] = sprintf('%02d', $rowWP['TBLSETORANBPD_TGLSETOR']) .'/'. sprintf('%02d', $rowWP['TBLSETORANBPD_BLNSETOR']) .'/'. sprintf('%02d', $rowWP['TBLSETORANBPD_THNSETOR']) ;
		

		$utama['REKENING'] = $rowWP[$NAMATABEL.'_REKPENDAPATAN'] . ' ' . $rowWP[$NAMATABEL.'_REKPAD'] . ' ' . $rowWP[$NAMATABEL.'_REKPAJAK'] . ' ' . sprintf('%02d', $rowWP[$NAMATABEL.'_REKAYAT']) . ' ' . sprintf('%02d', $rowWP[$NAMATABEL.'_REKJENIS']);
		
		$utama['jenis_bayar'] = $jenis_setoran;
		
		$utama['tglhariini'] = date('d-m-Y');
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
