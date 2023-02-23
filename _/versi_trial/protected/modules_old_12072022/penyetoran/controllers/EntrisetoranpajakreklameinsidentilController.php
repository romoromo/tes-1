<?php

class EntrisetoranpajakreklameinsidentilController extends Controller
{
	public $namatabel = 'TBLDAFTHIBURAN';
	public function actionIndex()
	{
		$this->renderPartial('index');
	}
	public function actiongetdata()
	{
		$tahun = trim($_POST['tahun']);
		$bln = trim($_POST['bln']);
		$tgl = trim($_POST['tgl']);
		$jenis_setoran = trim($_POST['jenis_setoran']);
		$nopok = trim($_POST['nopok']);

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
			$kolombunga = "".$this->namatabel."_BUNGATAGIHAN";
			$kolomdenda = "0";
			$kolompajak = "".$this->namatabel."_PAJAK";
			$kolomtotal = "(".$this->namatabel."_BUNGATAGIHAN+".$this->namatabel."_PAJAK)";
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
		}else if($bln==""){
			$data['validate'] = 'kurang';
		}else if($nopok==""){
			$data['validate'] = 'kurang';
		}else{
			$data['validate'] = 'lengkap';
			$data['exist'] = $this->cekpernahsetor(substr($tahun,-2),$bln,$nopok);
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
							".$kolombunga." AS bungasetor,
							".$kolomdenda." AS dendasetor,
							".$kolompajak." AS pajaksetor,
							".$kolomtotal." AS totalsetor
							FROM ".$this->namatabel." 
							JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK=".$this->namatabel.".TBLDAFTAR_NOPOK
							WHERE (TBLPENDATAAN_THNPAJAK='".substr($tahun,-2)."' AND TBLPENDATAAN_BLNPAJAK='".$bln."' OR TBLPENDATAAN_TGLPAJAK='".$tgl."') AND ".$this->namatabel.".TBLDAFTAR_NOPOK=".$nopok."
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
			"value" => $result['TBLDAFTAR_NOPOK']. ' | ' . $result['TBLDAFTAR_PEMILIKNAMA']
			,"data" => $result['TBLDAFTAR_NOPOK']
			,"TBLDAFTAR_PEMILIKNAMA" => $result['TBLDAFTAR_PEMILIKNAMA']
			,"TBLDAFTAR_PEMILIKALAMAT" => $result['TBLDAFTAR_PEMILIKALAMAT']
			,"TBLDAFTAR_NOPOK" => $result['TBLDAFTAR_NOPOK']
			);
		}

		 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function cekpernahsetor($tahun,$bln,$nopok)
	{
		$model = Yii::app()->db->createCommand("
			SELECT COUNT(TBLPENDATAAN_BLNPAJAK) AS JML FROM ".$this->namatabel."
			WHERE TBLPENDATAAN_THNPAJAK = ".(int) substr($tahun,-2)." AND TBLPENDATAAN_BLNPAJAK = ".$bln." AND TBLDAFTAR_NOPOK =".$nopok." AND ".$this->namatabel."_REGSETOR IS NOT NULL AND ".$this->namatabel."_RUPIAHSETOR > 0")->queryRow();
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
		$nopok = isset($_REQUEST['nopok']) && !empty($_REQUEST['nopok']) ? $_REQUEST['nopok'] : 0;
		$NOMOR_SSPD = isset($_REQUEST['NOMOR_SSPD']) && !empty($_REQUEST['NOMOR_SSPD']) ? $_REQUEST['NOMOR_SSPD'] : 0;
		$NOMOR_SSPDSSTP = isset($_REQUEST['NOMOR_SSPDSSTP']) && !empty($_REQUEST['NOMOR_SSPDSSTP']) ? $_REQUEST['NOMOR_SSPDSSTP'] : 0;
		$NOMOR_SSPDKB = isset($_REQUEST['NOMOR_SSPDKB']) && !empty($_REQUEST['NOMOR_SSPDKB']) ? $_REQUEST['NOMOR_SSPDKB'] : 0;
		$TANGGAL_ENTRY = isset($_REQUEST['TANGGAL_ENTRY']) && !empty($_REQUEST['TANGGAL_ENTRY']) ? $_REQUEST['TANGGAL_ENTRY'] : 0;
		$TANGGALSETOR = isset($_REQUEST['TANGGALSETOR']) && !empty($_REQUEST['TANGGALSETOR']) ? $_REQUEST['TANGGALSETOR'] : 0;
		$TANGGAL_HITUNGAN_DENDA = isset($_REQUEST['TANGGAL_HITUNGAN_DENDA']) && !empty($_REQUEST['TANGGAL_HITUNGAN_DENDA']) ? $_REQUEST['TANGGAL_HITUNGAN_DENDA'] : 0;
		$exp_TANGGAL_ENTRY = explode('-', $TANGGAL_ENTRY);
		$exp_TANGGALSETOR = explode('-', $TANGGALSETOR);
		
		$pajaksetor = isset($_REQUEST['pajaksetor']) && !empty($_REQUEST['pajaksetor']) ? $_REQUEST['pajaksetor'] : 0;
		$pajaksetor = isset($_REQUEST['pajaksetor']) && !empty($_REQUEST['pajaksetor']) ? $_REQUEST['pajaksetor'] : 0;

		$exist = $this->cekpernahsetor($tahun,$bln,$nopok);
		if ($exist=='ada') {
			echo CJSON::encode(array('pesan'=>'failed', 'posisi'=>'data sudah pernah di inputkan'));
		}else{
			//update ke tabel daftar makan
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
				), 'TBLPENDATAAN_THNPAJAK=:thn AND TBLPENDATAAN_BLNPAJAK=:bln AND TBLDAFTAR_NOPOK=:nopok', array(':thn'=>substr($tahun,-2), ':bln'=>$bln, ':nopok'=>$nopok));
			if ($update) {
				$model = Yii::app()->db->createCommand('SELECT * FROM '.$this->namatabel.' WHERE TBLPENDATAAN_THNPAJAK='.substr($tahun,-2).' AND TBLPENDATAAN_BLNPAJAK='.$bln.' AND TBLDAFTAR_NOPOK='.$nopok.'')->queryRow();
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
					'TBLSETORANBPD_GOLONGAN'=>isset($model[$this->namatabel.'_GOLONGAN']) ? $model[$this->namatabel.'_GOLONGAN'] : '',
					//belum tahu di isi apa
					'TBLSETORANBPD_JNSKETETAPAN'=>"",
					'KDSU'=>"",
					'TBLSETORANBPD_JNSBAYAR'=>"",
					'TBLSETORANBPD_TGLSURAT'=>"",
					'TBLSETORANBPD_BLNSURAT'=>"",
					'TBLSETORANBPD_THNSURAT'=>"",
					'TBLSETORANBPD_NOMORSURAT'=>"",
					'TBLSETORANBPD_TGLBATASSURAT'=>"",
					'TBLSETORANBPD_BLNBATASSURAT'=>"",
					'TBLSETORANBPD_THNBATASSURAT'=>"",
					'KDMED'=>"",
					'KDREF'=>"",
					'KDSET'=>"",
					'TBLSETORANBPD_STATUSBAYAR'=>"",
					'TBLSETORANBPD_JENISSETOR'=>isset($model[$this->namatabel.'_TIPESETOR']) ? $model[$this->namatabel.'_TIPESETOR'] : '',
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
					'TBLSETORANBPD_JNSTAGIHAN'=>"",
					'TBLSETORANBPD_JNSREKLAME'=>"",
					'BLBU'=>"",
					'BASTP'=>"",
					'TBLSETORANBPD_TGLTAGIHAN'=>"",
					'TBLSETORANBPD_BLNTAGIHAN'=>"",
					'TBLSETORANBPD_THNTAGIHAN'=>"",
					'BAKB'=>"",
					'TBLSETORANBPD_RUPIAHPAJAK'=>isset($model[$this->namatabel.'_PAJAK']) ? $model[$this->namatabel.'_PAJAK'] : 0,
					'TBLSETORANBPD_RUPIAHSETOR'=>isset($model[$this->namatabel.'_PAJAK']) ? $model[$this->namatabel.'_PAJAK'] : 0,
					'TBLSETORANBPD_KETETAPANPAJAK'=>isset($model[$this->namatabel.'_PAJAK']) ? $model[$this->namatabel.'_PAJAK'] : 0,
					// 'TBLSETORANBPD_RUPIAHSETOR'=>$pajaksetor,
					'RPRET'=>"",
					// 'TBLSETORANBPD_KETETAPANPAJAK'=>"",
					'TBLSETORANBPD_RUPIAHTAGIHAN'=>"",
					'TBLSETORANBPD_PAJAKKURANGBAYAR'=>"",
					'TBLSETORANBPD_BUNGAKETETAPAN'=>"",
					'TBLSETORANBPD_BUNGATAGIHAN'=>"",
					'TBLSETORANBPD_BUNGAKURANGBAYAR'=>"",
					'BURET'=>"",
					'TBLSETORANBPD_DENDAKETETAPAN'=>"",
					'TBLSETORANBPD_DENDATAGIHAN'=>"",
					'TBLSETORANBPD_DENDAKURANGBAYAR'=>"",
					'DDRET'=>"",
					'NAIK'=>"",
					'ADM'=>"",
					'RPSSKP'=>"",
					'RPSSTP'=>"",
					'RPSKB'=>"",
					'RPSRET'=>"",
					'UK1'=>"",
					'UK2'=>"",
					'UK3'=>"",
					'TBLSETORANBPD_LOKET'=>"",
					'DUP'=>"",
					'KET'=>"",
					'TBLSETORANBPD_ISBPD'=>"",
					'TBLSETORANBPD_TELERBPD'=>"",
					'TBLSETORANBPD_TGLBPD'=>"",
					'KPPD'=>"",
					'KETKPPD'=>"",
					'TGKPPD'=>"",
					);
				$insert = $command_insrt->insert('TBLSETORANBPD', $arrayOfData);
				if ($insert) {
					echo CJSON::encode(array('pesan'=>'success'));
				}else{
					echo CJSON::encode(array('pesan'=>'failed', 'posisi'=>'insert ke bpd'));
				}
			} else {
				print_r($update);
				echo CJSON::encode(array('pesan'=>'failed'));
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