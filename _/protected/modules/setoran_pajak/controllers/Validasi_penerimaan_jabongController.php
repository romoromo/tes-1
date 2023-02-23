<?php

class Validasi_penerimaan_jabongController extends Controller
{
	var $namatabel = 'TBLDAFTREKLAME';
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionautocompletewp()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');
		
		$query = trim($_REQUEST['query']);

		$select = '*';
		$from = 'TBLDAFTAR';
		$filter = array(
			'LK__TBLDAFTAR_PEMILIKNAMA' => $query
			,'LKR__TBLDAFTAR_NOPOK' => $query
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

	public function actiongetdata()
	{
		$tahun = intval($_POST['tahun']);
		$bln = isset($_POST['bln']) ? intval($_POST['bln']) : 0;
		$tgl = isset($_POST['tgl']) ? intval($_POST['tgl']) : 0;
		$lokasi = isset($_POST['lokasi']) ? intval($_POST['lokasi']) : 0;
		$nopok = trim($_POST['nopok']);

		$data = array();
		$model = array();
		if (empty($tahun) OR empty($lokasi) OR empty($nopok)) {
			$data['validate'] = 'kurang';
		} else{
			$data['validate'] = 'lengkap';
			$data['exist'] = $this->cekpernahsetor(substr($tahun,-2), $bln, $tgl, $lokasi, $nopok);
			$data['exist_validasi'] = $this->cekvalidasibank(substr($tahun,-2), $bln, $tgl, $lokasi, $nopok);

			$kolombunga = "".$this->namatabel."_BUNGARUPIAH";
			$kolomdenda = "0";
			$kolompajak = "".$this->namatabel."_PAJAK";
			$kolomtotal = "(".$this->namatabel."_BUNGARUPIAH+".$this->namatabel."_PAJAK)";

			$model = Yii::app()->db->createCommand("
				SELECT {$this->namatabel}.*
				, TBLDAFTAR.*
				, {$this->namatabel}_REKURUSAN || '.' || 
				{$this->namatabel}_REKPEMERINTAHAN || '.' || 
				{$this->namatabel}_REKORGANISASI || '.' || 
				{$this->namatabel}_REKPROGRAM || '.' || 
				{$this->namatabel}_REKKEGIATAN || '.' || 
				{$this->namatabel}_REKDINAS || '.' || 
				{$this->namatabel}_REKBIDANG || '.' || 
				{$this->namatabel}_REKPENDAPATAN || '.' || 
				{$this->namatabel}_REKPAD || '.' || 
				{$this->namatabel}_REKPAJAK || '.' || 
				{$this->namatabel}_REKAYAT || '.' || 
				{$this->namatabel}_REKJENIS || '.' || 
				{$this->namatabel}_REKSUBJENIS AS TREKENING_NAMA
				,NVL(TBLDAFTREKLAME_JUMLAHJABONG,0) AS TBLDAFTREKLAME_JUMLAHJABONG
				,NVL(TBLDAFTREKLAME_LISTRIKJABONG,0) AS TBLDAFTREKLAME_LISTRIKJABONG
				,NVL(TBLDAFTREKLAME_RUPIAHJABONG,0) AS TBLDAFTREKLAME_RUPIAHJABONG
				,NVL({$kolombunga},0) AS bungasetor
				,NVL({$kolomdenda},0) AS dendasetor
				,NVL({$kolompajak},0) AS pajaksetor

				,NVL(TBLJABONGBPD_NOMORSSPD, 0) AS TBLJABONGBPD_NOMORSSPD
				,TBLJABONGBPD_TGLSSPD || '-' || TBLJABONGBPD_BLNSSPD || '-' || TBLJABONGBPD_THNSSPD AS TBLJABONGBPD_TGLSSPD

				,NVL({$kolomtotal},0) AS totalsetor
				FROM {$this->namatabel} 
				JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK={$this->namatabel}.TBLDAFTAR_NOPOK
				LEFT JOIN TBLJABONGBPD ON 
					NVL(TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK, 0) = NVL(TBLJABONGBPD.TBLPENDATAAN_THNPAJAK, 0)
					AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK, 0) = NVL(TBLJABONGBPD.TBLPENDATAAN_BLNPAJAK, 0)
					AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK, 0) = NVL(TBLJABONGBPD.TBLPENDATAAN_TGLPAJAK, 0)
					AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE, 0) = NVL(TBLJABONGBPD.TBLPENDATAAN_PAJAKKE, 0)
					AND NVL(TBLDAFTREKLAME.TBLDAFTAR_NOPOK, 0) = NVL(TBLJABONGBPD.TBLDAFTAR_NOPOK, 0)
				WHERE (
					{$this->namatabel}.TBLPENDATAAN_THNPAJAK='".substr($tahun,-2)."' 
					AND NVL({$this->namatabel}.TBLPENDATAAN_BLNPAJAK, 0)={$bln}
					AND NVL({$this->namatabel}.TBLPENDATAAN_TGLPAJAK, 0)={$tgl}
					AND NVL({$this->namatabel}.TBLPENDATAAN_PAJAKKE, 0)={$lokasi}
					AND {$this->namatabel}.TBLDAFTAR_NOPOK=".$nopok."
				)
				")
				->queryRow();
		}

		echo CJSON::encode(array('data'=>$data, 'model'=>$model));
	}

	public function cekpernahsetor($tahun, $bln, $tgl, $lokasi, $nopok)
	{
		$tahun = (int) substr($tahun,-2);
		$sql = "
			SELECT
			NVL(TBLJABONGBPD_RUPIAHSETOR, 0) AS TBLJABONGBPD_RUPIAHSETOR
			FROM
				TBLDAFTREKLAME
			JOIN TBLJABONGBPD ON 
			NVL(TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK, 0) = NVL(TBLJABONGBPD.TBLPENDATAAN_THNPAJAK, 0)
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK, 0) = NVL(TBLJABONGBPD.TBLPENDATAAN_BLNPAJAK, 0)
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK, 0) = NVL(TBLJABONGBPD.TBLPENDATAAN_TGLPAJAK, 0)
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE, 0) = NVL(TBLJABONGBPD.TBLPENDATAAN_PAJAKKE, 0)
			AND NVL(TBLDAFTREKLAME.TBLDAFTAR_NOPOK, 0) = NVL(TBLJABONGBPD.TBLDAFTAR_NOPOK, 0)

			WHERE 
			TBLDAFTREKLAME.TBLDAFTAR_NOPOK={$nopok}
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK, 0) = {$tahun}
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE, 0) = {$lokasi}
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK, 0) = {$bln}
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK, 0) = {$tgl}
		";
		$model = Yii::app()->db->createCommand($sql)->queryScalar();
		if ($model>0) {
			return 'ada';
		}else{
			return 'tidak';
		}
	}

	public function cekvalidasibank($tahun, $bln, $tgl, $lokasi, $nopok)
	{
		$tahun = (int) substr($tahun,-2);
		$sql = "
			SELECT
			NVL(TBLSETJABONG_RUPIAHSETOR, 0) AS TBLSETJABONG_RUPIAHSETOR
			FROM
				TBLDAFTREKLAME
			LEFT JOIN TBLSETJABONG ON 
			NVL(TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK, 0) = NVL(TBLSETJABONG.TBLPENDATAAN_THNPAJAK, 0)
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK, 0) = NVL(TBLSETJABONG.TBLPENDATAAN_BLNPAJAK, 0)
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK, 0) = NVL(TBLSETJABONG.TBLPENDATAAN_TGLPAJAK, 0)
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE, 0) = NVL(TBLSETJABONG.TBLPENDATAAN_PAJAKKE, 0)
			AND NVL(TBLDAFTREKLAME.TBLDAFTAR_NOPOK, 0) = NVL(TBLSETJABONG.TBLDAFTAR_NOPOK, 0)

			WHERE 
			TBLDAFTREKLAME.TBLDAFTAR_NOPOK={$nopok}
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK, 0) = {$tahun}
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE, 0) = {$lokasi}
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK, 0) = {$bln}
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK, 0) = {$tgl}
		";
		$model = Yii::app()->db->createCommand($sql)->queryScalar();
		if ($model>0) {
			return 'ada';
		}else{
			return 'tidak';
		}
	}

	public function actionsimpandata()
	{
		$nopok = isset($_REQUEST['nopok']) && !empty($_REQUEST['nopok']) ? (int)$_REQUEST['nopok'] : 0;
		$tahun = isset($_REQUEST['tahunpajak']) && !empty($_REQUEST['tahunpajak']) ? (int)substr($_REQUEST['tahunpajak'],-2) : 0;
		$bln = isset($_REQUEST['bulanpajak']) && !empty($_REQUEST['bulanpajak']) ? $_REQUEST['bulanpajak'] : 0;
		$tgl = isset($_REQUEST['tanggalpajak']) && !empty($_REQUEST['tanggalpajak']) ? (int)$_REQUEST['tanggalpajak'] : 0;
		$lokasi = isset($_REQUEST['pajakke']) && !empty($_REQUEST['pajakke']) ? (int)$_REQUEST['pajakke'] : 0;
		
		$NOMOR_SSPD = isset($_REQUEST['TBLJABONGBPD_NOMORSSPD']) && !empty($_REQUEST['TBLJABONGBPD_NOMORSSPD']) ? $_REQUEST['TBLJABONGBPD_NOMORSSPD'] : 0;

		$TANGGAL_ENTRY = isset($_REQUEST['TBLJABONGBPD_TGLSETOR']) && !empty($_REQUEST['TBLJABONGBPD_TGLSETOR']) ? $_REQUEST['TBLJABONGBPD_TGLSETOR'] : 0;
		$TANGGALSETOR = isset($_REQUEST['TBLJABONGBPD_TGLSSPD']) && !empty($_REQUEST['TBLJABONGBPD_TGLSSPD']) ? $_REQUEST['TBLJABONGBPD_TGLSSPD'] : 0;

		$exp_TANGGAL_ENTRY = explode('-', $TANGGAL_ENTRY);
		$exp_TANGGALSETOR = explode('-', $TANGGAL_ENTRY);
		
		$jmljabong = isset($_REQUEST['TBLDAFTREKLAME_JUMLAHJABONG']) && !empty($_REQUEST['TBLDAFTREKLAME_JUMLAHJABONG']) ? LokalIndonesia::toAngka($_REQUEST['TBLDAFTREKLAME_JUMLAHJABONG']) : 0;
		$listrikjabong = isset($_REQUEST['TBLDAFTREKLAME_LISTRIKJABONG']) && !empty($_REQUEST['TBLDAFTREKLAME_LISTRIKJABONG']) ? LokalIndonesia::toAngka($_REQUEST['TBLDAFTREKLAME_LISTRIKJABONG']) : 0;
		$pajaksetor = isset($_REQUEST['TBLDAFTREKLAME_RUPIAHJABONG']) && !empty($_REQUEST['TBLDAFTREKLAME_RUPIAHJABONG']) ? LokalIndonesia::toAngka($_REQUEST['TBLDAFTREKLAME_RUPIAHJABONG']) : 0;
		
		$jenis_setoran = isset($_REQUEST['jenis_setoran']) && !empty($_REQUEST['jenis_setoran']) ? $_REQUEST['jenis_setoran'] : 0;

		// $exist = $this->cekpernahsetor($tahun, $bln, $tgl, $lokasi, $nopok);
		$exist = $this->cekvalidasibank($tahun, $bln, $tgl, $lokasi, $nopok);
		if ($exist=='ada') {
			echo CJSON::encode(array('pesan'=>'failed', 'posisi'=>'data sudah pernah di inputkan'));
		}else{
			// tidak diupdate ke tabel daft reklame
			$command = Yii::app()->db->createCommand();
			// $update = $command->update($this->namatabel.'', array(
			// 	$this->namatabel.'_TAHUNSETOR'=>isset($exp_TANGGALSETOR[2]) ?  substr($exp_TANGGALSETOR[2], -2) : '',
			// 	$this->namatabel.'_BULANSETOR'=>isset($exp_TANGGALSETOR[1]) ? $exp_TANGGALSETOR[1] : '',
			// 	$this->namatabel.'_TANGGALSETOR'=>isset($exp_TANGGALSETOR[0]) ? $exp_TANGGALSETOR[0] : '',
			// 	$this->namatabel.'_REGSETOR'=>$NOMOR_SSPD,
			// 	//$this->namatabel.'_REGTAGIHAN'=>$NOMOR_SSPDSSTP,
			// 	//$this->namatabel.'_SSPDKURANGBAYAR'=>$NOMOR_SSPDKB,
			// 	$this->namatabel.'_RUPIAHSETOR'=>$pajaksetor,
			// 	$this->namatabel.'_THNENTRISETOR'=>isset($exp_TANGGAL_ENTRY[2]) ?  substr($exp_TANGGAL_ENTRY[2], -2) : '',
			// 	$this->namatabel.'_BLNENTRISETOR'=>isset($exp_TANGGAL_ENTRY[1]) ? $exp_TANGGAL_ENTRY[1] : '',
			// 	$this->namatabel.'_TGLENTRISETOR'=>isset($exp_TANGGAL_ENTRY[0]) ? $exp_TANGGAL_ENTRY[0] : '',
			// 	), 'TBLPENDATAAN_THNPAJAK=:thn AND TBLPENDATAAN_BLNPAJAK=:bln AND TBLDAFTAR_NOPOK=:nopok', array(':thn'=>substr($tahun,-2), ':bln'=>$bln, ':nopok'=>$nopok));
			// if ($update) {
				$model = Yii::app()->db->createCommand('SELECT * FROM '.$this->namatabel.' WHERE 
					TBLDAFTAR_NOPOK='.$nopok.' 
					AND TBLPENDATAAN_THNPAJAK='.substr($tahun,-2).' 
					AND NVL(TBLPENDATAAN_BLNPAJAK, 0)='.$bln.' 
					AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.' 
					AND NVL(TBLPENDATAAN_PAJAKKE, 0)='.$lokasi
				)->queryRow();
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
					'TBLSETJABONG_REKURUSAN'=>isset($model[$this->namatabel.'_REKURUSAN']) ? $model[$this->namatabel.'_REKURUSAN'] : '',
					'TBLSETJABONG_REKPEMERINTAHAN'=>isset($model[$this->namatabel.'_REKPEMERINTAHAN']) ? $model[$this->namatabel.'_REKPEMERINTAHAN'] : '',
					'TBLSETJABONG_REKORGANISASI'=>isset($model[$this->namatabel.'_REKORGANISASI']) ? $model[$this->namatabel.'_REKORGANISASI'] : '',
					'TBLSETJABONG_REKPROGRAM'=>isset($model[$this->namatabel.'_REKPROGRAM']) ? $model[$this->namatabel.'_REKPROGRAM'] : '',
					'TBLSETJABONG_REKKEGIATAN'=>isset($model[$this->namatabel.'_REKKEGIATAN']) ? $model[$this->namatabel.'_REKKEGIATAN'] : '',
					'TBLSETJABONG_REKDINAS'=>isset($model[$this->namatabel.'_REKDINAS']) ? $model[$this->namatabel.'_REKDINAS'] : '',
					'TBLSETJABONG_REKBIDANG'=>isset($model[$this->namatabel.'_REKBIDANG']) ? $model[$this->namatabel.'_REKBIDANG'] : '',
					'TBLSETJABONG_REKPENDAPATAN'=>isset($model[$this->namatabel.'_REKPENDAPATAN']) ? $model[$this->namatabel.'_REKPENDAPATAN'] : '',
					'TBLSETJABONG_REKPAD'=>isset($model[$this->namatabel.'_REKPAD']) ? $model[$this->namatabel.'_REKPAD'] : '',
					'TBLSETJABONG_REKPAJAK'=>isset($model[$this->namatabel.'_REKPAJAK']) ? $model[$this->namatabel.'_REKPAJAK'] : '',
					'TBLSETJABONG_REKAYAT'=>isset($model[$this->namatabel.'_REKAYAT']) ? $model[$this->namatabel.'_REKAYAT'] : '',
					'TBLSETJABONG_REKJENIS'=>isset($model[$this->namatabel.'_REKJENIS']) ? $model[$this->namatabel.'_REKJENIS'] : '',
					'TBLSETJABONG_REKSUBJENIS'=>isset($model[$this->namatabel.'_REKSUBJENIS']) ? $model[$this->namatabel.'_REKSUBJENIS'] : '',
					'TBLSETJABONG_GOLONGAN'=>isset($model['TBLDAFTAR_GOLONGAN']) ? $model['TBLDAFTAR_GOLONGAN'] : '',
					//belum tahu di isi apa
					'TBLSETJABONG_JNSKETETAPAN'=>"J",
					'KDSU'=>"",
					'TBLSETJABONG_JNSBAYAR'=>'JABONG',
					'TBLSETJABONG_TGLSURAT'=>isset($model[$this->namatabel.'_TGLSKPD']) ? $model[$this->namatabel.'_TGLSKPD'] : '',
					'TBLSETJABONG_BLNSURAT'=>isset($model[$this->namatabel.'_BLNSKPD']) ? $model[$this->namatabel.'_BLNSKPD'] : '',
					'TBLSETJABONG_THNSURAT'=>isset($model[$this->namatabel.'_THNSKPD']) ? $model[$this->namatabel.'_THNSKPD'] : '',
					'TBLSETJABONG_NOMORSURAT'=>isset($model[$this->namatabel.'_NOMORSKPD']) ? $model[$this->namatabel.'_NOMORSKPD'] : '',

					'TBLSETJABONG_TGLBATASSURAT'=>isset($model[$this->namatabel.'_TGLBATASSKPD']) ? $model[$this->namatabel.'_TGLBATASSKPD'] : '',
					'TBLSETJABONG_BLNBATASSURAT'=>isset($model[$this->namatabel.'_BLNBATASSKPD']) ? $model[$this->namatabel.'_BLNBATASSKPD'] : '',
					'TBLSETJABONG_THNBATASSURAT'=>isset($model[$this->namatabel.'_THNBATASSKPD']) ? $model[$this->namatabel.'_THNBATASSKPD'] : '',
					'KDMED'=>"0",
					'KDREF'=>"0",
					'KDSET'=>"1",
					'TBLSETJABONG_STATUSBAYAR'=>"10",
					'TBLSETJABONG_JENISSETOR'=>'B',
					// 'TBLSETJABONG_TGLSETOR'=>isset($model[$this->namatabel.'_TGLSETOR']) ? $model[$this->namatabel.'_TGLSETOR'] : '',
					// 'TBLSETJABONG_BLNSETOR'=>isset($model[$this->namatabel.'_BULANSETOR']) ? $model[$this->namatabel.'_BULANSETOR'] : '',
					// 'TBLSETJABONG_THNSETOR'=>isset($model[$this->namatabel.'_TAHUNSETOR']) ? $model[$this->namatabel.'_TAHUNSETOR'] : '',
					'TBLSETJABONG_THNSETOR'=>isset($exp_TANGGAL_ENTRY[2]) ?  substr($exp_TANGGAL_ENTRY[2], -2) : '',
					'TBLSETJABONG_BLNSETOR'=>isset($exp_TANGGAL_ENTRY[1]) ? $exp_TANGGAL_ENTRY[1] : '',
					'TBLSETJABONG_TGLSETOR'=>isset($exp_TANGGAL_ENTRY[0]) ? $exp_TANGGAL_ENTRY[0] : '',
					'TBLSETJABONG_NOMORSSPD'=>$NOMOR_SSPD,
					//belum tahu nyimpennya ke mana
					'TBLSETJABONG_THNSSPD'=>isset($exp_TANGGAL_ENTRY[2]) ?  substr($exp_TANGGAL_ENTRY[2], -2) : '',
					'TBLSETJABONG_BLNSSPD'=>isset($exp_TANGGAL_ENTRY[1]) ? $exp_TANGGAL_ENTRY[1] : '',
					'TBLSETJABONG_TGLSSPD'=>isset($exp_TANGGAL_ENTRY[0]) ? $exp_TANGGAL_ENTRY[0] : '',
					//end of belum tahu nyimpennya ke mana
					'JENSET'=>"",
					'NOCG'=>"",
					'NOREK'=>"",
					'BANK'=>"",
					'BANCB'=>"",
					'TGCGT'=>"0",
					'TGCAIR'=>"0",
					'LUNAS'=>"",
					'TBLSETJABONG_JNSTAGIHAN'=>"J",
					'TBLSETJABONG_JNSREKLAME'=>"",
					'BLBU'=>"0",
					'BASTP'=>"0",
					'TBLSETJABONG_TGLTAGIHAN'=>isset($model[$this->namatabel.'_TGLSURATTAGIHAN']) ? $model[$this->namatabel.'_TGLSURATTAGIHAN'] : 0,
					'TBLSETJABONG_BLNTAGIHAN'=>isset($model[$this->namatabel.'_BLNSURATTAGIHAN']) ? $model[$this->namatabel.'_BLNSURATTAGIHAN'] : 0,
					'TBLSETJABONG_THNTAGIHAN'=>isset($model[$this->namatabel.'_THNSURATTAGIHAN']) ? $model[$this->namatabel.'_THNSURATTAGIHAN'] : 0,
					'BAKB'=>"0",
					'TBLSETJABONG_RUPIAHJABONG'=>isset($model[$this->namatabel.'_RUPIAHJABONG']) ? $model[$this->namatabel.'_RUPIAHJABONG'] : 0,
					'TBLSETJABONG_RUPIAHSETOR'=>isset($model[$this->namatabel.'_RUPIAHJABONG']) ? $model[$this->namatabel.'_RUPIAHJABONG'] : 0,
					'TBLSETJABONG_KETETAPANJABONG'=>isset($model[$this->namatabel.'_RUPIAHJABONG']) ? $model[$this->namatabel.'_RUPIAHJABONG'] : 0,
					// 'TBLSETJABONG_RUPIAHSETOR'=>$pajaksetor,
					'RPRET'=>"",
					// 'TBLSETJABONG_KETETAPANPAJAK'=>$pajaksetor,
					'TBLSETJABONG_RUPIAHTAGIHAN'=>"0",
					// 'TBLSETJABONG_PAJAKKURANGBAYAR'=>isset($model[$this->namatabel.'_RUPIAHKRGBAYAR']) ? $model[$this->namatabel.'_RUPIAHKRGBAYAR'] : 0,
					'TBLSETJABONG_PAJAKKURANGBAYAR'=>'0',
					// 'TBLSETJABONG_BUNGAKETETAPAN'=>isset($model[$this->namatabel.'_BUNGASPTPD']) ? $model[$this->namatabel.'_BUNGASPTPD'] : 0,
					'TBLSETJABONG_BUNGAKETETAPAN'=>'0',
					// 'TBLSETJABONG_BUNGATAGIHAN'=>"",
					'TBLSETJABONG_BUNGATAGIHAN'=>'0',
					// 'TBLSETJABONG_BUNGAKURANGBAYAR'=>isset($model[$this->namatabel.'_BUNGAKRGBAYAR']) ? $model[$this->namatabel.'_BUNGAKRGBAYAR'] : 0,
					'TBLSETJABONG_BUNGAKURANGBAYAR'=>'0',
					'BURET'=>"0",
					'TBLSETJABONG_DENDAKETETAPAN'=>"0",
					'TBLSETJABONG_DENDATAGIHAN'=>"0",
					'TBLSETJABONG_DENDAKURANGBAYAR'=>"0",
					'DDRET'=>"0",
					'NAIK'=>"0",
					'ADM'=>"0",
					'RPSSKP'=>isset($model[$this->namatabel.'_RUPIAHJABONG']) ? $model[$this->namatabel.'_RUPIAHJABONG'] : 0,
					'RPSSTP'=>"0",
					'RPSKB'=>"0",
					'RPSRET'=>"0",
					'UK1'=>"0",
					'UK2'=>"0",
					'UK3'=>"0",
					// 'TBLSETJABONG_LOKET'=> substr( "BKP " . Yii::app()->user->nama_pengguna . '    ' . date('H:i:s'), 0, 24),
					'TBLSETJABONG_LOKET'=> '',
					'DUP'=>"0",
					'KET'=>"",
					// 'TBLSETJABONG_ISBPD'=>"",
					// 'TBLSETJABONG_TELERBPD'=>"",
					// 'TBLSETJABONG_TGLBPD'=>"",
					// 'KPPD'=>"",
					// 'KETKPPD'=>"",
					// 'TGKPPD'=>"",
					);
				$insert = $command_insrt->insert('TBLSETJABONG', $arrayOfData);
				if ($insert) {

					$whereUpdate = 
					"TBLPENDATAAN_THNPAJAK = :tahun
					AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = :bln
					AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = :tgl
					AND TBLDAFTAR_NOPOK = :nopok
					AND NVL(TBLPENDATAAN_PAJAKKE, 0) = :lokasi
					";
					;

					$bindParam = array(
						':tahun' => $tahun
						,':bln' => $bln
						,':tgl' => $tgl
						,':nopok' => $nopok
						,':lokasi' => $lokasi
					);

					$arrayOfDataUpdate = array(
						'TBLJABONGBPD_ISBPD' => 'Y'
						,'TBLJABONGBPD_TELERBPD' => 'BPDB     TELLERBPD ' . date('H:i')
						,'TBLJABONGBPD_TGLBPD' => (date('ymd'))
					);

					$setoranjab = Yii::app()->db->createCommand()
					->update('TBLJABONGBPD', $arrayOfDataUpdate, $whereUpdate, $bindParam);
					// var_dump($whereUpdate);
					// var_dump($bindParam);

					echo CJSON::encode(array('status'=>'success'));
				}else{
					echo CJSON::encode(array('status'=>'failed', 'posisi'=>'insert ke bpd'));
				}
			// } else {
				// print_r($update);
				// echo CJSON::encode(array('pesan'=>'failed'));
			// }
		}
	}

	public function actionCetak()
	{
		$data['URL_APP'] = Yii::app()->getBaseUrl(true);

		$TBLDAFTAR_NOPOK = !empty(DMOrcl::getRequest('TBLDAFTAR_NOPOK')) ? (int)base64_decode(base64_decode(DMOrcl::getRequest('TBLDAFTAR_NOPOK'))) : 0;
		$TBLPENDATAAN_THNPAJAK = !empty(DMOrcl::getRequest('TBLPENDATAAN_THNPAJAK')) ? (int)base64_decode(base64_decode(DMOrcl::getRequest('TBLPENDATAAN_THNPAJAK'))) : 0;
		$TBLPENDATAAN_BLNPAJAK = !empty(DMOrcl::getRequest('TBLPENDATAAN_BLNPAJAK')) ? (int)base64_decode(base64_decode(DMOrcl::getRequest('TBLPENDATAAN_BLNPAJAK'))) : 0;
		$TBLPENDATAAN_TGLPAJAK = !empty(DMOrcl::getRequest('TBLPENDATAAN_TGLPAJAK')) ? (int)base64_decode(base64_decode(DMOrcl::getRequest('TBLPENDATAAN_TGLPAJAK'))) : 0;
		$TBLPENDATAAN_PAJAKKE = !empty(DMOrcl::getRequest('TBLPENDATAAN_PAJAKKE')) ? (int)base64_decode(base64_decode(DMOrcl::getRequest('TBLPENDATAAN_PAJAKKE'))) : 0;

		$NAMATABEL = $this->namatabel;

		// $select = "
		// {$NAMATABEL}.*
		// ,NVL({$NAMATABEL}_THNSKPD, 0) AS {$NAMATABEL}_THNSKPD
		// ,NVL({$NAMATABEL}_BLNSKPD, 0) AS {$NAMATABEL}_BLNSKPD
		// ,NVL({$NAMATABEL}_TGLSKPD, 0) AS {$NAMATABEL}_TGLSKPD
		// ,NVL(TBLPENDATAAN_BLNPAJAK, 0) AS TBLPENDATAAN_BLNPAJAK
		// ,NVL(TBLPENDATAAN_TGLPAJAK, 0) AS TBLPENDATAAN_TGLPAJAK
		// ,NVL(TBLPENDATAAN_PAJAKKE, 0) AS TBLPENDATAAN_PAJAKKE

		// ,TBLDAFTAR.*,
		// (
		// 	SELECT
		// 	REFKELURAHAN.REFKELURAHAN_NAMA
		// 	FROM
		// 	REFKELURAHAN
		// 	WHERE
		// 	REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		// 	AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		// ) AS REFKELURAHAN_NAMA,
		// (
		// 	SELECT
		// 	REFKECAMATAN.REFKECAMATAN_NAMA
		// 	FROM
		// 	REFKECAMATAN
		// 	WHERE
		// 	REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		// ) AS REFKECAMATAN_NAMA
		// ";
		// $from = 'TBLDAFTAR';

		// $otherquery = array(
		// 	'leftjoin_trans'=>array($NAMATABEL, "TBLDAFTAR.TBLDAFTAR_NOPOK={$NAMATABEL}.TBLDAFTAR_NOPOK")
		// );

		// $filter = array(
		// 	'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		// 	,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
		// );

		// $otherquery['andwhere'] = '
		// NVL('.$NAMATABEL . '.TBLPENDATAAN_BLNPAJAK, 0)='.$TBLPENDATAAN_BLNPAJAK.'
		// AND NVL('.$NAMATABEL . '.TBLPENDATAAN_PAJAKKE, 0)='.$TBLPENDATAAN_PAJAKKE.'
		// AND NVL('.$NAMATABEL . '.TBLPENDATAAN_TGLPAJAK, 0)='.$TBLPENDATAAN_TGLPAJAK.'
		// ';

		$NAMATABEL = 'TBLSETJABONG';

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
		TBLSETJABONG_NOMORSSPD,
		TBLSETJABONG_THNSSPD,
		TBLSETJABONG_BLNSSPD,
		TBLSETJABONG_TGLSSPD
		";
		$from = 'TBLDAFTAR';

		$otherquery = array(
			'leftjoin_trans'=>array($NAMATABEL, "TBLDAFTAR.TBLDAFTAR_NOPOK={$NAMATABEL}.TBLDAFTAR_NOPOK")
		);

		$filter = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
			,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
            // ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
		);

		$otherquery['andwhere'] = '
		NVL('.$NAMATABEL . '.TBLPENDATAAN_PAJAKKE, 0)='.$TBLPENDATAAN_PAJAKKE.'
		AND NVL('.$NAMATABEL . '.TBLPENDATAAN_TGLPAJAK, 0)='.$TBLPENDATAAN_TGLPAJAK.'
		AND NVL('.$NAMATABEL . '.TBLPENDATAAN_BLNPAJAK, 0)='.$TBLPENDATAAN_BLNPAJAK.'
		';


        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);

        $this->CetakWordValidasiJabong($data);
        Yii::app()->end();
	}

	public function CetakWordValidasiJabong($data=array())
	{
		$NAMATABEL = 'TBLSETJABONG';
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_validasibank' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'TPL-VALIDASI.docx';
		$namafileDL = "SSPD-VALIDASI-JABONG.docx"; 

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

		$totalrupiah = $rowWP[$NAMATABEL.'_RUPIAHJABONG'];

		$utama['kode1'] = sprintf('%02d', $rowWP['TBLPENDATAAN_THNPAJAK']) . sprintf('%02d', $rowWP['TBLPENDATAAN_BLNPAJAK']) . sprintf('%02d', $rowWP['TBLPENDATAAN_TGLPAJAK']) . sprintf('%07d', $rowWP['TBLDAFTAR_NOPOK']) . sprintf('%02d', $rowWP['TBLKELURAHAN_IDBADANUSAHA']) . sprintf('%02d', $rowWP['TBLKECAMATAN_IDBADANUSAHA']) . '-' . sprintf('%02d', $rowWP['TBLSETJABONG_NOMORSSPD']);
		$utama['kode2'] = sprintf('%01d', $rowWP[$NAMATABEL . '_REKURUSAN']) . sprintf('%02d', $rowWP[$NAMATABEL . '_REKPEMERINTAHAN']) . sprintf('%01d', $rowWP[$NAMATABEL . '_REKORGANISASI']) . sprintf('%02d', $rowWP[$NAMATABEL . '_REKPROGRAM']) . sprintf('%02d', $rowWP[$NAMATABEL . '_REKKEGIATAN']) . sprintf('%01d', $rowWP[$NAMATABEL . '_REKDINAS']) . sprintf('%01d', $rowWP[$NAMATABEL . '_REKBIDANG']) . sprintf('%01d', $rowWP[$NAMATABEL . '_REKPENDAPATAN']) . sprintf('%01d', $rowWP[$NAMATABEL . '_REKPAD']) . sprintf('%01d', $rowWP[$NAMATABEL . '_REKPAJAK']) . sprintf('%02d', $rowWP[$NAMATABEL . '_REKAYAT']) . sprintf('%02d', $rowWP[$NAMATABEL . '_REKJENIS']) . 'J0' . sprintf('%03d', $DAYOFYEAR) . $TIMENOW;
		$utama['kode3'] = sprintf('%02d', $rowWP['TBLSETJABONG_THNSSPD']) . sprintf('%02d', $rowWP['TBLSETJABONG_BLNSSPD']) . sprintf('%02d', $rowWP['TBLSETJABONG_TGLSSPD']) . 'LKTBPD1   TELLERBPD  IDR';
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