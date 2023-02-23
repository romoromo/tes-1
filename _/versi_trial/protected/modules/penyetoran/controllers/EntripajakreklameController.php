<?php

class EntripajakreklameController extends Controller
{
	public $namatabel = 'TBLDAFTREKLAME';
	public function actionIndex()
	{
		$this->renderPartial('index');
	}
	public function actiongetdata()
	{
		$tahun = intval($_POST['tahun']);
		$bulan = isset($_POST['bln']) ? intval($_POST['bln']) : 0;
		$tgl = isset($_POST['tgl']) ? intval($_POST['tgl']) : 0;
		$lokasi = isset($_POST['lokasi']) ? intval($_POST['lokasi']) : 0;
		$jenis_setoran = trim($_POST['jenis_setoran']);
		$nopok = trim($_POST['nopok']);

		$andstpd  	= "";
		$andjoinstpd  	= "";

		if($jenis_setoran=='SPTPD') {
			$kolombunga = "".$this->namatabel."_BUNGARUPIAH";
			$kolomdenda = "0";
			$kolompajak = "".$this->namatabel."_PAJAK";
			$kolomtotal = "(".$this->namatabel."_BUNGARUPIAH+".$this->namatabel."_PAJAK)";
		} else if($jenis_setoran=='SKPD') {
			$kolombunga = "".$this->namatabel."_BUNGARUPIAH";
			$kolomdenda = "0";
			$kolompajak = "".$this->namatabel."_PAJAKSKPD";
			$kolomtotal = "(".$this->namatabel."_BUNGARUPIAH+".$this->namatabel."_PAJAKSKPD)";
		} else if($jenis_setoran=='STPD') {
			$andjoinstpd = "JOIN TBLSTPD ON TBLSTPD.TBLPENDATAAN_THNPAJAK = ".$this->namatabel.".TBLPENDATAAN_THNPAJAK AND NVL(TBLSTPD.TBLPENDATAAN_BLNPAJAK,0) = NVL(".$this->namatabel.".TBLPENDATAAN_BLNPAJAK,0) AND NVL(TBLSTPD.TBLPENDATAAN_TGLPAJAK,'0') = NVL(".$this->namatabel.".TBLPENDATAAN_TGLPAJAK,'0') 
			AND TBLSTPD.TBLPENDATAAN_PAJAKKE = ".$this->namatabel.".TBLPENDATAAN_PAJAKKE
			AND TBLSTPD.TBLDAFTAR_NOPOK = ".$this->namatabel.".TBLDAFTAR_NOPOK ";
			$andstpd = "AND TBLSTPD_JENIS = 'STPD'";
			$kolombunga = "0";
			$kolomdenda = "0";
			$kolompajak = "".$this->namatabel."_BUNGATAGIHAN";
			$kolomtotal = "".$this->namatabel."_BUNGATAGIHAN";
		} else if($jenis_setoran=='SKPDKB') {
			$kolombunga = "".$this->namatabel."_BUNGAKRGBAYAR";
			$kolomdenda = "".$this->namatabel."_DENDAKRGBAYAR";
			$kolompajak = "".$this->namatabel."_PAJAKPERIKSA";
			$kolomtotal = "".$this->namatabel."_RUPIAHKRGBAYAR";
		}

		$data = array();
		$model = array();
		if ($tahun=="") {
			$data['validate'] = 'kurang';
		}else if($lokasi==""){
			$data['validate'] = 'kurang';
		}else if($nopok==""){
			$data['validate'] = 'kurang';
		}else{
			$data['validate'] = 'lengkap';
			$data['exist'] = $this->cekpernahsetor($tahun, $bulan, $tgl, $nopok, $lokasi, $jenis_setoran);
			$data['existbpd'] = $this->cekpernahsetorbpd($tahun, $bulan, $tgl, $nopok, $lokasi, $jenis_setoran);
			$model = Yii::app()->db->createCommand("SELECT ".$this->namatabel.".*, TBLDAFTAR.*, ".$this->namatabel."_REKURUSAN || '.' || 
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
							NVL(".$kolombunga.",0) AS bungasetor,
							NVL(".$kolomdenda.",0) AS dendasetor,
							NVL(".$kolompajak.",0) AS pajaksetor,
							NVL(".$kolomtotal.",0) AS totalsetor
							FROM ".$this->namatabel." 
							JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK=".$this->namatabel.".TBLDAFTAR_NOPOK
							".$andjoinstpd."
							WHERE (
								".$this->namatabel.".TBLPENDATAAN_THNPAJAK='".substr($tahun,-2)."' 
								AND NVL(".$this->namatabel.".TBLPENDATAAN_BLNPAJAK, 0)={$bulan}
								AND NVL(".$this->namatabel.".TBLPENDATAAN_TGLPAJAK, 0)={$tgl}
								AND NVL(".$this->namatabel.".TBLPENDATAAN_PAJAKKE, 0)={$lokasi}
								AND ".$this->namatabel.".TBLDAFTAR_NOPOK=".$nopok."
								".$andstpd."
							)
							")
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

	public function cekpernahsetor($tahun,$bln,$tgl,$nopok,$lokasi,$jenis_setoran)
	{
		if ($jenis_setoran=='SKPD') {
			$model = Yii::app()->db->createCommand("
			SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML 
			FROM TBLSETOR
			WHERE 
			TBLPENDATAAN_THNPAJAK = ".(int) substr($tahun,-2)."
			AND TRIM(TBLSETOR_JNSBAYAR) = 'SKPD'
			AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = ".$bln." 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$tgl." 
			AND TBLDAFTAR_NOPOK =".$nopok."
			AND TBLPENDATAAN_PAJAKKE =".$lokasi." 
			")->queryRow();
		}
		if ($jenis_setoran=='STPD') {
			$model = Yii::app()->db->createCommand("
			SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML 
			FROM TBLSETOR
			WHERE 
			TBLPENDATAAN_THNPAJAK = ".(int) substr($tahun,-2)."
			AND TRIM(TBLSETOR_JNSBAYAR) = 'STPD'
			AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = ".$bln." 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$tgl." 
			AND TBLDAFTAR_NOPOK =".$nopok."
			AND TBLPENDATAAN_PAJAKKE =".$lokasi."
			")->queryRow();
		}
		if ($model['JML']>0) {
			return 'ada';
		}else{
			return 'tidak';
		}
	}

	public function cekpernahsetorbpd($tahun,$bln,$tgl,$nopok,$lokasi,$jenis_setoran)
	{
		if ($jenis_setoran=='SKPD') {
			$model = Yii::app()->db->createCommand("
			SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML 
			FROM TBLSETORANBPD
			WHERE 
			TBLPENDATAAN_THNPAJAK = ".(int) substr($tahun,-2)."
			AND TRIM(TBLSETORANBPD_JNSBAYAR) = 'SKPD'
			AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = ".$bln." 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$tgl." 
			AND TBLDAFTAR_NOPOK =".$nopok."
			AND TBLPENDATAAN_PAJAKKE =".$lokasi." 
			")->queryRow();
		}
		if ($jenis_setoran=='STPD') {
			$model = Yii::app()->db->createCommand("
			SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML 
			FROM TBLSETORANBPD
			WHERE 
			TBLPENDATAAN_THNPAJAK = ".(int) substr($tahun,-2)."
			AND TRIM(TBLSETORANBPD_JNSBAYAR) = 'STPD'
			AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = ".$bln." 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = ".$tgl." 
			AND TBLDAFTAR_NOPOK =".$nopok."
			AND TBLPENDATAAN_PAJAKKE =".$lokasi."
			")->queryRow();
		}
		if ($model['JML']>0) {
			return 'ada';
		}else{
			return 'tidak';
		}
	}

	public function cekpernahsetorold($tahun,$bulan,$tgl,$lokasi,$nopok)
	{
		$model = Yii::app()->db->createCommand("
			SELECT COUNT(TBLPENDATAAN_BLNPAJAK) AS JML FROM ".$this->namatabel."
			WHERE TBLPENDATAAN_THNPAJAK = ".(int) substr($tahun,-2)." 
			AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = {$bulan} 
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = {$tgl} 
			AND NVL(TBLPENDATAAN_PAJAKKE, 0) = {$lokasi} 
			AND TBLDAFTAR_NOPOK =".$nopok." 
			AND ".$this->namatabel."_REGSETOR IS NOT NULL 
			AND ".$this->namatabel."_RUPIAHSETOR > 0")->queryRow();
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
		$tgl = isset($_REQUEST['tgl']) && !empty($_REQUEST['tgl']) ? $_REQUEST['tgl'] : 0;
		$nopok = isset($_REQUEST['nopok']) && !empty($_REQUEST['nopok']) ? $_REQUEST['nopok'] : 0;
		$lokasi = isset($_POST['lokasi']) ? intval($_POST['lokasi']) : 0;
		$NOMOR_SSPD = isset($_REQUEST['NOMOR_SSPD']) && !empty($_REQUEST['NOMOR_SSPD']) ? $_REQUEST['NOMOR_SSPD'] : 0;
		$NOMOR_SSPDSSTP = isset($_REQUEST['NOMOR_SSPDSSTP']) && !empty($_REQUEST['NOMOR_SSPDSSTP']) ? $_REQUEST['NOMOR_SSPDSSTP'] : 0;
		$NOMOR_SSPDKB = isset($_REQUEST['NOMOR_SSPDKB']) && !empty($_REQUEST['NOMOR_SSPDKB']) ? $_REQUEST['NOMOR_SSPDKB'] : 0;
		$TANGGAL_ENTRY = isset($_REQUEST['TANGGAL_ENTRY']) && !empty($_REQUEST['TANGGAL_ENTRY']) ? $_REQUEST['TANGGAL_ENTRY'] : 0;
		$TANGGALSETOR = isset($_REQUEST['TANGGALSETOR']) && !empty($_REQUEST['TANGGALSETOR']) ? $_REQUEST['TANGGALSETOR'] : 0;
		$TANGGAL_HITUNGAN_DENDA = isset($_REQUEST['TANGGAL_HITUNGAN_DENDA']) && !empty($_REQUEST['TANGGAL_HITUNGAN_DENDA']) ? $_REQUEST['TANGGAL_HITUNGAN_DENDA'] : 0;
		$exp_TANGGAL_ENTRY = explode('-', $TANGGAL_ENTRY);
		$exp_TANGGALSETOR = explode('-', $TANGGAL_ENTRY);
		
		$pajaksetor = isset($_REQUEST['pajaksetor']) && !empty($_REQUEST['pajaksetor']) ? $_REQUEST['pajaksetor'] : 0;
		$dendasetor = isset($_REQUEST['dendasetor']) && !empty($_REQUEST['dendasetor']) ? $_REQUEST['dendasetor'] : 0;
		
		$jenis_setoran = isset($_REQUEST['jenis_setoran']) && !empty($_REQUEST['jenis_setoran']) ? $_REQUEST['jenis_setoran'] : 0;

		$exist = $this->cekpernahsetorbpd($tahun,$bln,$tgl,$nopok,$lokasi,$jenis_setoran);
		// cekpernahsetor1($tahun,$bln,$nopok,$lokasi);
		if ($exist=='ada') {
			echo CJSON::encode(array('pesan'=>'failed', 'posisi'=>'data sudah pernah di inputkan'));
		}else if ($jenis_setoran=='SKPD') {
			//update ke tabel daftar reklame
			$command = Yii::app()->db->createCommand();
			$update = $command->update($this->namatabel.'', array(
				$this->namatabel.'_TAHUNSETOR'=>isset($exp_TANGGALSETOR[2]) ?  substr($exp_TANGGALSETOR[2], -2) : '',
				$this->namatabel.'_BULANSETOR'=>isset($exp_TANGGALSETOR[1]) ? $exp_TANGGALSETOR[1] : '',
				$this->namatabel.'_TANGGALSETOR'=>isset($exp_TANGGALSETOR[0]) ? $exp_TANGGALSETOR[0] : '',
				$this->namatabel.'_REGSETOR'=>$NOMOR_SSPD,
				//$this->namatabel.'_REGTAGIHAN'=>$NOMOR_SSPDSSTP,
				//$this->namatabel.'_SSPDKURANGBAYAR'=>$NOMOR_SSPDKB,
				$this->namatabel.'_RUPIAHSETOR'=>$pajaksetor,
				$this->namatabel.'_THNENTRISETOR'=>isset($exp_TANGGAL_ENTRY[2]) ?  substr($exp_TANGGAL_ENTRY[2], -2) : '',
				$this->namatabel.'_BLNENTRISETOR'=>isset($exp_TANGGAL_ENTRY[1]) ? $exp_TANGGAL_ENTRY[1] : '',
				$this->namatabel.'_TGLENTRISETOR'=>isset($exp_TANGGAL_ENTRY[0]) ? $exp_TANGGAL_ENTRY[0] : '',
				), '
				TBLPENDATAAN_THNPAJAK=:thn 
				AND NVL(TBLPENDATAAN_BLNPAJAK, 0)=:bln 
				AND NVL(TBLPENDATAAN_TGLPAJAK, 0)=:tgl 
				AND NVL(TBLPENDATAAN_PAJAKKE, 0)=:lokasi 
				AND TBLDAFTAR_NOPOK=:nopok
				', array(
					':thn'=>substr($tahun,-2)
					, ':bln'=>$bln
					, ':tgl'=>$tgl
					, ':lokasi'=>$lokasi
					, ':nopok'=>$nopok
				));
		}else if ($jenis_setoran=='STPD') {
			$command = Yii::app()->db->createCommand();
			$update = $command->update('TBLSTPD', array(
				'TBLSTPD_THNSETOR'=>isset($exp_TANGGALSETOR[2]) ?  substr($exp_TANGGALSETOR[2], -2) : '',
				'TBLSTPD_BLNSETOR'=>isset($exp_TANGGALSETOR[1]) ? $exp_TANGGALSETOR[1] : '',
				'TBLSTPD_TGLSETOR'=>isset($exp_TANGGALSETOR[0]) ? $exp_TANGGALSETOR[0] : '',
				'TBLSTPD_NOMORSSPD'=>$NOMOR_SSPD,
				), '
				TBLPENDATAAN_THNPAJAK=:thn 
				AND NVL(TBLPENDATAAN_BLNPAJAK, 0)=:bln 
				AND NVL(TBLPENDATAAN_TGLPAJAK, 0)=:tgl
				AND NVL(TBLPENDATAAN_PAJAKKE, 0)=:ke 
				AND TBLDAFTAR_NOPOK=:nopok
				', array(':thn'=>substr($tahun,-2), ':bln'=>$bln, ':tgl'=>$tgl, ':nopok'=>$nopok,  ':ke'=>$lokasi));
		}

		$model = Yii::app()->db->createCommand('SELECT * FROM '.$this->namatabel.' WHERE 
					TBLPENDATAAN_THNPAJAK='.substr($tahun,-2).' 
					AND NVL(TBLPENDATAAN_BLNPAJAK, 0)='.$bln.' 
					AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.' 
					AND NVL(TBLPENDATAAN_PAJAKKE, 0)='.$lokasi.' 
					AND TBLDAFTAR_NOPOK='.$nopok
				)->queryRow();

				if ($jenis_setoran=='SKPD') {
						$TBLSETORANBPD_NOMORSURAT = isset($model[$this->namatabel.'_NOMORSKPD']) ? $model[$this->namatabel.'_NOMORSKPD'] : '';
						$TBLSETORANBPD_TGLBATASSURAT = isset($model[$this->namatabel.'_TGLBATASSKPD']) ? $model[$this->namatabel.'_TGLBATASSKPD'] : '';
						$TBLSETORANBPD_BLNBATASSURAT = isset($model[$this->namatabel.'_BLNBATASSKPD']) ? $model[$this->namatabel.'_BLNBATASSKPD'] : '';
						$TBLSETORANBPD_THNBATASSURAT = isset($model[$this->namatabel.'_THNBATASSKPD']) ? $model[$this->namatabel.'_THNBATASSKPD'] : '';
						$TBLSETORANBPD_JNSTAGIHAN = '';
						$TBLSETORANBPD_TGLTAGIHAN = '';
						$TBLSETORANBPD_BLNTAGIHAN = '';
						$TBLSETORANBPD_THNTAGIHAN = '';
						$TBLSETORANBPD_RUPIAHSETOR = isset($model[$this->namatabel.'_PAJAKSKPD']) ? $model[$this->namatabel.'_PAJAKSKPD'] : 0;
						$TBLSETORANBPD_RUPIAHTAGIHAN = '';
						$TBLSETORANBPD_DENDAKETETAPAN = $dendasetor;
						
						
				} else if ($jenis_setoran=='STPD') {
						$TBLSETORANBPD_NOMORSURAT = isset($model[$this->namatabel.'_NOSURATTAGIHAN']) ? $model[$this->namatabel.'_NOSURATTAGIHAN'] : '';
						$TBLSETORANBPD_TGLBATASSURAT = isset($model[$this->namatabel.'_TGLBTSTAGIHAN']) ? $model[$this->namatabel.'_TGLBTSTAGIHAN'] : '';
						$TBLSETORANBPD_BLNBATASSURAT = isset($model[$this->namatabel.'_BLNBTSTAGIHAN']) ? $model[$this->namatabel.'_BLNBTSTAGIHAN'] : '';
						$TBLSETORANBPD_THNBATASSURAT = isset($model[$this->namatabel.'_THNBTSTAGIHAN']) ? $model[$this->namatabel.'_THNBTSTAGIHAN'] : '';
						$TBLSETORANBPD_JNSTAGIHAN = 'T';
						$TBLSETORANBPD_TGLTAGIHAN = isset($model[$this->namatabel.'_TGLSURATTAGIHAN']) ? $model[$this->namatabel.'_TGLSURATTAGIHAN'] : '';
						$TBLSETORANBPD_BLNTAGIHAN = isset($model[$this->namatabel.'_BLNSURATTAGIHAN']) ? $model[$this->namatabel.'_BLNSURATTAGIHAN'] : '';
						$TBLSETORANBPD_THNTAGIHAN = isset($model[$this->namatabel.'_THNSURATTAGIHAN']) ? $model[$this->namatabel.'_THNSURATTAGIHAN'] : '';
						$TBLSETORANBPD_RUPIAHSETOR = isset($model[$this->namatabel.'_BUNGATAGIHAN']) ? $model[$this->namatabel.'_BUNGATAGIHAN'] : 0;
						$TBLSETORANBPD_RUPIAHTAGIHAN = isset($model[$this->namatabel.'_BUNGATAGIHAN']) ? $model[$this->namatabel.'_BUNGATAGIHAN'] : 0;
						$TBLSETORANBPD_DENDAKETETAPAN = '';
						
					}
				


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
					'TBLSETORANBPD_JNSKETETAPAN'=>$jenis_setoran=='STPD' ? 'T' : '',
					'KDSU'=>"",
					'TBLSETORANBPD_JNSBAYAR'=>$jenis_setoran,
					'TBLSETORANBPD_TGLSURAT'=>isset($model[$this->namatabel.'_TGLSKPD']) ? $model[$this->namatabel.'_TGLSKPD'] : '',
					'TBLSETORANBPD_BLNSURAT'=>isset($model[$this->namatabel.'_BLNSKPD']) ? $model[$this->namatabel.'_BLNSKPD'] : '',
					'TBLSETORANBPD_THNSURAT'=>isset($model[$this->namatabel.'_THNSKPD']) ? $model[$this->namatabel.'_THNSKPD'] : '',
					'TBLSETORANBPD_NOMORSURAT'=>$TBLSETORANBPD_NOMORSURAT,
					'TBLSETORANBPD_TGLBATASSURAT'=>$TBLSETORANBPD_TGLBATASSURAT,
					'TBLSETORANBPD_BLNBATASSURAT'=>$TBLSETORANBPD_BLNBATASSURAT,
					'TBLSETORANBPD_THNBATASSURAT'=>$TBLSETORANBPD_THNBATASSURAT,
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
					'TGCGT'=>"",
					'TGCAIR'=>"",
					'LUNAS'=>"",
					'TBLSETORANBPD_JNSTAGIHAN'=>$TBLSETORANBPD_JNSTAGIHAN,
					'TBLSETORANBPD_JNSREKLAME'=>"",
					'BLBU'=>"",
					'BASTP'=>"",
					'TBLSETORANBPD_TGLTAGIHAN'=>$TBLSETORANBPD_TGLTAGIHAN,
					'TBLSETORANBPD_BLNTAGIHAN'=>$TBLSETORANBPD_BLNTAGIHAN,
					'TBLSETORANBPD_THNTAGIHAN'=>$TBLSETORANBPD_THNTAGIHAN,
					'BAKB'=>"",
					'TBLSETORANBPD_RUPIAHPAJAK'=>isset($model[$this->namatabel.'_PAJAKSKPD']) ? $model[$this->namatabel.'_PAJAKSKPD'] : 0,
					'TBLSETORANBPD_RUPIAHSETOR'=>$TBLSETORANBPD_RUPIAHSETOR,
					'TBLSETORANBPD_KETETAPANPAJAK'=>isset($model[$this->namatabel.'_PAJAKSKPD']) ? $model[$this->namatabel.'_PAJAKSKPD'] : 0,
					// 'TBLSETORANBPD_RUPIAHSETOR'=>$pajaksetor,
					'RPRET'=>"",
					// 'TBLSETORANBPD_KETETAPANPAJAK'=>$pajaksetor,
					'TBLSETORANBPD_RUPIAHTAGIHAN'=>$TBLSETORANBPD_RUPIAHTAGIHAN,
					'TBLSETORANBPD_PAJAKKURANGBAYAR'=>"",
					'TBLSETORANBPD_BUNGAKETETAPAN'=>"",
					'TBLSETORANBPD_BUNGATAGIHAN'=>"",
					'TBLSETORANBPD_BUNGAKURANGBAYAR'=>"",
					'BURET'=>"0",
					'TBLSETORANBPD_DENDAKETETAPAN'=>$TBLSETORANBPD_DENDAKETETAPAN,
					'TBLSETORANBPD_DENDATAGIHAN'=>"0",
					'TBLSETORANBPD_DENDAKURANGBAYAR'=>"",
					'DDRET'=>"",
					'NAIK'=>"",
					'ADM'=>"",
					'RPSSKP'=>isset($model[$this->namatabel.'_PAJAKSKPD']) ? $model[$this->namatabel.'_PAJAKSKPD'] : 0,
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

	public function actionGetrekening()
	{
		$kode = $_REQUEST['kode'];
		$model = Yii::app()->db->createCommand("
			SELECT * FROM TBLREKENING
			WHERE TBLREKENING_KODEFULL = '".$kode."' ")->queryRow();

		echo CJSON::encode($model);
	}

	public function getRekening($data=array())
	{
		extract($data);
		$sql = "
		SELECT
		TBLREKENING.TBLREKENING_KODEFULL,
		TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
		TBLREKENING
		WHERE 
		TBLREKENING.TBLREKENING_REKPENDAPATAN = {$REKPENDAPATAN}
		AND TBLREKENING.TBLREKENING_REKPAD = {$REKPAD}
		AND TBLREKENING.TBLREKENING_REKPAJAK = {$REKPAJAK}
		AND TBLREKENING.TBLREKENING_REKAYAT = {$REKAYAT}
		AND TBLREKENING.TBLREKENING_REKJENIS = {$REKJENIS}
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
		$TBLSETORANBPD_JNSBAYAR = !empty(DMOrcl::getRequest('TBLSETORANBPD_JNSBAYAR')) ? base64_decode(base64_decode(DMOrcl::getRequest('TBLSETORANBPD_JNSBAYAR'))) : '';

		$NAMATABEL = $this->namatabel;

         $select = "
         	{$NAMATABEL}.*
         	,NVL({$NAMATABEL}_THNSKPD, 0) AS {$NAMATABEL}_THNSKPD
         	,NVL({$NAMATABEL}_BLNSKPD, 0) AS {$NAMATABEL}_BLNSKPD
         	,NVL({$NAMATABEL}_TGLSKPD, 0) AS {$NAMATABEL}_TGLSKPD
         	,NVL({$NAMATABEL}.TBLPENDATAAN_THNPAJAK, 0) AS TBLPENDATAAN_THNPAJAK
         	,NVL({$NAMATABEL}.TBLPENDATAAN_BLNPAJAK, 0) AS TBLPENDATAAN_BLNPAJAK
         	,NVL({$NAMATABEL}.TBLPENDATAAN_TGLPAJAK, 0) AS TBLPENDATAAN_TGLPAJAK
         	,NVL({$NAMATABEL}.TBLPENDATAAN_PAJAKKE, 0) AS TBLPENDATAAN_PAJAKKE

         	,NVL({$NAMATABEL}_BUNGARUPIAH, 0) AS {$NAMATABEL}_BUNGARUPIAH
         	,NVL({$NAMATABEL}_DENDAKRGBAYAR, 0) AS {$NAMATABEL}_DENDAKRGBAYAR
         	,NVL({$NAMATABEL}_RUPIAHSETOR, 0) AS {$NAMATABEL}_RUPIAHSETOR
         	,NVL({$NAMATABEL}_TGLENTRISETOR, 0) AS {$NAMATABEL}_TGLENTRISETOR
         	,NVL({$NAMATABEL}_BLNENTRISETOR, 0) AS {$NAMATABEL}_BLNENTRISETOR
         	,NVL({$NAMATABEL}_THNENTRISETOR, 0) AS {$NAMATABEL}_THNENTRISETOR
			
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
			TBLSETORANBPD_NOMORSSPD AS TBLSETORANBPD_NOMORSSPD,
			NVL(TBLSETORANBPD_DENDAKETETAPAN,0) AS TBLSETORANBPD_DENDAKETETAPAN,
			TBLSETORANBPD_RUPIAHSETOR AS TBLSETORANBPD_RUPIAHSETOR,
			TRIM(TBLSETORANBPD_JNSBAYAR) AS TBLSETORANBPD_JNSBAYAR,
			TBLSETORANBPD_TGLSETOR AS TBLSETORANBPD_TGLSETOR,
			TBLSETORANBPD_BLNSETOR AS TBLSETORANBPD_BLNSETOR,
			TBLSETORANBPD_THNSETOR AS TBLSETORANBPD_THNSETOR
		";
         $from = 'TBLDAFTAR';

        $otherquery = array(
            'leftjoin_trans'=>array($NAMATABEL, "TBLDAFTAR.TBLDAFTAR_NOPOK={$NAMATABEL}.TBLDAFTAR_NOPOK")
            ,'leftjoin_setbpd'=>array("TBLSETORANBPD", "
            	{$NAMATABEL}.TBLDAFTAR_NOPOK=TBLSETORANBPD.TBLDAFTAR_NOPOK 
            	AND {$NAMATABEL}.TBLPENDATAAN_THNPAJAK=TBLSETORANBPD.TBLPENDATAAN_THNPAJAK 
            	AND NVL({$NAMATABEL}.TBLPENDATAAN_BLNPAJAK,0)=NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0)
            	AND NVL({$NAMATABEL}.TBLPENDATAAN_TGLPAJAK,0)=NVL(TBLSETORANBPD.TBLPENDATAAN_TGLPAJAK,0)
            	AND NVL({$NAMATABEL}.TBLPENDATAAN_PAJAKKE,0)=NVL(TBLSETORANBPD.TBLPENDATAAN_PAJAKKE,0)
            	AND TRIM(TBLSETORANBPD_JNSBAYAR) = '".$TBLSETORANBPD_JNSBAYAR."'
            	")
        );

        $filter = array(
            'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
            ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
            ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_PAJAKKE' => $TBLPENDATAAN_PAJAKKE
        );

        // $otherquery['andwhere'] = '
        // NVL('.$NAMATABEL . '.TBLPENDATAAN_PAJAKKE, 0)='.$TBLPENDATAAN_PAJAKKE.'
        // ';

        if (!empty($TBLPENDATAAN_TGLPAJAK)) {
	        $otherquery['andwhere'] = '
	        NVL('.$NAMATABEL . '.TBLPENDATAAN_TGLPAJAK, 0)='.$TBLPENDATAAN_TGLPAJAK.'
	        AND NVL('.$NAMATABEL . '.TBLPENDATAAN_BLNPAJAK, 0)='.$TBLPENDATAAN_BLNPAJAK.'
	        ';
        }


        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);

        $this->CetakWordSSPD($data);
        Yii::app()->end();
	}

	public function CetakWordSSPD($data=array())
	{
		$NAMATABEL = $this->namatabel;
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_sspd' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'SSPD-REK.docx';
		$namafileDL = "SSPD-Reklame.docx"; 

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
		$IS_BUNGA = isset($rowWP[$NAMATABEL.'_BUNGARUPIAH']) && $rowWP[$NAMATABEL.'_BUNGARUPIAH']>0;
		// $IS_DENDA = isset($rowWP['TBLSETORANBPD_DENDAKETETAPAN']) && $rowWP['TBLSETORANBPD_DENDAKETETAPAN']>0;

		$utama = array();
		$rows = array();
		$rowWP = $data['cetak'];

		$nomorNPWPD = $rowWP['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$rowWP['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$rowWP['TBLKECAMATAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$rowWP['TBLKELURAHAN_IDBADANUSAHA']));
		
		$utama['nomor'] = trim($rowWP['TBLSETORANBPD_NOMORSSPD']);
		$utama['wp_nama'] = trim($rowWP['TBLDAFTAR_BADANUSAHANAMA']);
		$utama['wp_alamat'] = (trim($rowWP['TBLDAFTAR_BADANUSAHAALAMAT']));
		$utama['nopok'] = sprintf('%07d', $rowWP['TBLDAFTAR_NOPOK']);
		$utama['nodaftizin'] = !empty($rowWP['TBLDAFTREKLAME_NODAFTARIZIN']) ? $rowWP['TBLDAFTREKLAME_NODAFTARIZIN'] : '';
		$utama['npwpd'] = $nomorNPWPD;
		$utama['wp_kelurahan_nama'] = isset($rowWP['REFKELURAHAN_NAMA']) ? $rowWP['REFKELURAHAN_NAMA'] : '';
		$utama['wp_kecamatan_nama'] = $rowWP['REFKECAMATAN_NAMA'];
		$utama['wp_pemiliknama'] = isset($rowWP['TBLDAFTAR_PEMILIKNAMA']) ? $rowWP['TBLDAFTAR_PEMILIKNAMA'] : '-';
		$utama['wp_pemilikalamat'] = isset($rowWP['TBLDAFTAR_PEMILIKALAMAT']) ? $rowWP['TBLDAFTAR_PEMILIKALAMAT'] : '-';

		$utama['tahunpajak'] = '20'.sprintf('%02d', $rowWP['TBLPENDATAAN_THNPAJAK']);
		$utama['thnpajak'] = $rowWP['TBLPENDATAAN_THNPAJAK'];
		$utama['blnpajak'] = $rowWP['TBLPENDATAAN_BLNPAJAK'];
		$utama['tglpajak'] = $rowWP['TBLPENDATAAN_TGLPAJAK'];
		$utama['pajakke'] = $rowWP['TBLPENDATAAN_PAJAKKE'];
		$utama['bulanpajak'] = !empty($rowWP['TBLPENDATAAN_BLNPAJAK']) ? LokalIndonesia::getBulan($rowWP['TBLPENDATAAN_BLNPAJAK']) : '';
		$utama['tglskp'] = sprintf('%02d', $rowWP[$NAMATABEL.'_TGLSKPD']) .'/'. sprintf('%02d', $rowWP[$NAMATABEL.'_BLNSKPD']) .'/'. sprintf('%02d', $rowWP[$NAMATABEL.'_THNSKPD']) ;
		$utama['masaawal'] = sprintf('%02d', $rowWP[$NAMATABEL.'_TGLMULAIREKLAME']) .'/'. sprintf('%02d', $rowWP[$NAMATABEL.'_BLNMULAIREKLAME']) .'/'. sprintf('%02d', $rowWP[$NAMATABEL.'_THNMULAIREKLAME']) ;
		$utama['masakhir'] = sprintf('%02d', $rowWP[$NAMATABEL.'_TGLAKHIRREKLAME']) .'/'. sprintf('%02d', $rowWP[$NAMATABEL.'_BLNAKHIRREKLAME']) .'/'. sprintf('%02d', $rowWP[$NAMATABEL.'_THNAKHIRREKLAME']) ;
		$utama['ketre1'] = $rowWP[$NAMATABEL.'_KETERANGAN1'];
		$utama['ketre2'] = $rowWP[$NAMATABEL.'_KETERANGAN2'];
		$utama['isirek'] = $rowWP[$NAMATABEL.'_ISIREKLAME'];
		
		$nominal1 = $rowWP['TBLSETORANBPD_RUPIAHSETOR'];
		$utama['rincino1'] = '1';
		$KODEAYAT = sprintf('%02d', $rowWP[$NAMATABEL.'_REKAYAT']);
		$KODEJENIS = sprintf('%02d', $rowWP[$NAMATABEL.'_REKJENIS']);
		$utama['rincirek1'] = "4.1.1.{$KODEAYAT}.{$KODEJENIS}";
		// $utama['rincireknama1'] = ($rek = $this->getRekening($rowWP['REFBADANUSAHA_IDBADANUSAHA'])) ? $rek['TBLREKENING_NAMAREKENING'] : '';
		$utama['rincireknama1'] = ($rek = $this->getRekening(
			array(
				'REKPENDAPATAN' => $rowWP[$NAMATABEL . '_REKPENDAPATAN']
				,'REKPAD' => $rowWP[$NAMATABEL . '_REKPAD']
				,'REKPAJAK' => $rowWP[$NAMATABEL . '_REKPAJAK']
				,'REKAYAT' => $rowWP[$NAMATABEL . '_REKAYAT']
				,'REKJENIS' => $rowWP[$NAMATABEL . '_REKJENIS']
			)
		)) ? $rek['TBLREKENING_NAMAREKENING'] : '';
		$utama['rincinominal1'] = LokalIndonesia::ribuan($nominal1);

		$nominal2 = $rowWP[$NAMATABEL.'_BUNGARUPIAH'];
		$utama['rincino2'] = '2'; //$IS_BUNGA ? '2' : '';
		$utama['rincirek2'] = '4.1.4.06.04'; //$IS_BUNGA ? '4.1.4.06.01' : '';
		$utama['rincireknama2'] = 'BUNGA KETERLAMBATAN'; //$IS_BUNGA ? 'BUNGA PAJAK' : '';
		$utama['rincinominal2'] = LokalIndonesia::ribuan($nominal2); //$IS_BUNGA ? LokalIndonesia::ribuan($nominal2) : '';

		$nominal3 = $rowWP['TBLSETORANBPD_DENDAKETETAPAN'];
		$utama['rincino3'] = '3';
		$utama['rincirek3'] = '4.1.4.07.04';
		$utama['rincireknama3'] = 'DENDA PAJAK';
		$utama['rincinominal3'] = LokalIndonesia::ribuan($nominal3); // $IS_DENDA ? LokalIndonesia::ribuan($nominal3) : '';
		
		$utama['rincitotal'] = LokalIndonesia::ribuan($rincitotal = $nominal1+$nominal2+$nominal3);
		$utama['rincitotalterbilang'] = LokalIndonesia::terbilangangka($rincitotal);
		$utama['tglsetor'] = sprintf('%02d', $rowWP['TBLSETORANBPD_TGLSETOR']) .'/'. sprintf('%02d', $rowWP['TBLSETORANBPD_BLNSETOR']) .'/'. sprintf('%02d', $rowWP['TBLSETORANBPD_THNSETOR']) ;

		$utama['REKENING'] = $rowWP[$NAMATABEL.'_REKPENDAPATAN'] . ' ' . $rowWP[$NAMATABEL.'_REKPAD'] . ' ' . $rowWP[$NAMATABEL.'_REKPAJAK'] . ' ' . sprintf('%02d', $rowWP[$NAMATABEL.'_REKAYAT']) . ' ' . sprintf('%02d', $rowWP[$NAMATABEL.'_REKJENIS']);
		$utama['jenis_bayar'] = $rowWP['TBLSETORANBPD_JNSBAYAR'];
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