<?php

class Jabong_tapController extends Controller
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
			$data['exist'] = $this->cekpernahsetor(substr($tahun,-2), $lokasi, $nopok);

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
				{$this->namatabel}_REKSUBJENIS AS TREKENING_NAMA,
				NVL(TBLDAFTREKLAME_JUMLAHJABONG,0) AS TBLDAFTREKLAME_JUMLAHJABONG,
				NVL(TBLDAFTREKLAME_LISTRIKJABONG,0) AS TBLDAFTREKLAME_LISTRIKJABONG,
				NVL(TBLDAFTREKLAME_RUPIAHJABONG,0) AS TBLDAFTREKLAME_RUPIAHJABONG,
				NVL({$kolombunga},0) AS bungasetor,
				NVL({$kolomdenda},0) AS dendasetor,
				NVL({$kolompajak},0) AS pajaksetor,

				NVL(TBLJABONGBPD_NOMORSSPD, 0) AS TBLJABONGBPD_NOMORSSPD,
				TBLJABONGBPD_TGLSSPD || '-' || TBLJABONGBPD_BLNSSPD || '-' || TBLJABONGBPD_THNSSPD AS TBLJABONGBPD_TGLSSPD,

				NVL({$kolomtotal},0) AS totalsetor
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
					AND NVL({$this->namatabel}.TBLPENDATAAN_BLNPAJAK, 0)=0
					AND NVL({$this->namatabel}.TBLPENDATAAN_TGLPAJAK, 0)=0
					AND NVL({$this->namatabel}.TBLPENDATAAN_PAJAKKE, 0)={$lokasi}
					AND {$this->namatabel}.TBLDAFTAR_NOPOK=".$nopok."
				)
				")
					->queryRow();
		}

		echo CJSON::encode(array('data'=>$data, 'model'=>$model));
	}

	public function cekpernahsetor($tahun, $lokasi, $nopok)
	{
		$tahun = (int) substr($tahun,-2);
		$model = Yii::app()->db->createCommand("
			SELECT
			NVL(TBLJABONGBPD_RUPIAHSETOR, 0) AS TBLJABONGBPD_RUPIAHSETOR
			FROM
				TBLDAFTREKLAME
			LEFT JOIN TBLJABONGBPD ON 
			NVL(TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK, 0) = NVL(TBLJABONGBPD.TBLPENDATAAN_THNPAJAK, 0)
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK, 0) = NVL(TBLJABONGBPD.TBLPENDATAAN_BLNPAJAK, 0)
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK, 0) = NVL(TBLJABONGBPD.TBLPENDATAAN_TGLPAJAK, 0)
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE, 0) = NVL(TBLJABONGBPD.TBLPENDATAAN_PAJAKKE, 0)
			AND NVL(TBLDAFTREKLAME.TBLDAFTAR_NOPOK, 0) = NVL(TBLJABONGBPD.TBLDAFTAR_NOPOK, 0)

			WHERE 
			TBLDAFTREKLAME.TBLDAFTAR_NOPOK={$nopok}
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK, 0) = {$tahun}
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE, 0) = {$lokasi}
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK, 0) = 0
			AND NVL(TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK, 0) = 0
		")->queryScalar();
		if ($model>0) {
			return 'ada';
		}else{
			return 'tidak';
		}
	}

	public function actionsimpandata()
	{
		$nopok = isset($_REQUEST['nopok']) && !empty($_REQUEST['nopok']) ? $_REQUEST['nopok'] : 0;
		$tahun = isset($_REQUEST['tahunpajak']) && !empty($_REQUEST['tahunpajak']) ? $_REQUEST['tahunpajak'] : 0;
		$bln = isset($_REQUEST['bln']) && !empty($_REQUEST['bln']) ? $_REQUEST['bln'] : 0;
		$tgl = isset($_REQUEST['tgl']) && !empty($_REQUEST['tgl']) ? $_REQUEST['tgl'] : 0;
		$lokasi = isset($_REQUEST['pajakke']) && !empty($_REQUEST['pajakke']) ? $_REQUEST['pajakke'] : 0;
		
		$NOMOR_SSPD = isset($_REQUEST['TBLJABONGBPD_NOMORSSPD']) && !empty($_REQUEST['TBLJABONGBPD_NOMORSSPD']) ? $_REQUEST['TBLJABONGBPD_NOMORSSPD'] : 0;

		$TANGGAL_ENTRY = isset($_REQUEST['TBLJABONGBPD_TGLSETOR']) && !empty($_REQUEST['TBLJABONGBPD_TGLSETOR']) ? $_REQUEST['TBLJABONGBPD_TGLSETOR'] : 0;
		$TANGGALSETOR = isset($_REQUEST['TBLJABONGBPD_TGLSSPD']) && !empty($_REQUEST['TBLJABONGBPD_TGLSSPD']) ? $_REQUEST['TBLJABONGBPD_TGLSSPD'] : 0;

		$exp_TANGGAL_ENTRY = explode('-', $TANGGAL_ENTRY);
		$exp_TANGGALSETOR = explode('-', $TANGGAL_ENTRY);
		
		$jmljabong = isset($_REQUEST['TBLDAFTREKLAME_JUMLAHJABONG']) && !empty($_REQUEST['TBLDAFTREKLAME_JUMLAHJABONG']) ? LokalIndonesia::toAngka($_REQUEST['TBLDAFTREKLAME_JUMLAHJABONG']) : 0;
		$listrikjabong = isset($_REQUEST['TBLDAFTREKLAME_LISTRIKJABONG']) && !empty($_REQUEST['TBLDAFTREKLAME_LISTRIKJABONG']) ? LokalIndonesia::toAngka($_REQUEST['TBLDAFTREKLAME_LISTRIKJABONG']) : 0;
		$pajaksetor = isset($_REQUEST['TBLDAFTREKLAME_RUPIAHJABONG']) && !empty($_REQUEST['TBLDAFTREKLAME_RUPIAHJABONG']) ? LokalIndonesia::toAngka($_REQUEST['TBLDAFTREKLAME_RUPIAHJABONG']) : 0;
		
		$jenis_setoran = isset($_REQUEST['jenis_setoran']) && !empty($_REQUEST['jenis_setoran']) ? $_REQUEST['jenis_setoran'] : 0;

		$exist = $this->cekpernahsetor($tahun, $lokasi, $nopok);
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
				$model = Yii::app()->db->createCommand('SELECT * FROM '.$this->namatabel.' WHERE TBLDAFTAR_NOPOK='.$nopok.' AND TBLPENDATAAN_THNPAJAK='.substr($tahun,-2).' AND NVL(TBLPENDATAAN_BLNPAJAK, 0)='.$bln.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='.$tgl.' AND NVL(TBLPENDATAAN_PAJAKKE, 0)='.$lokasi)->queryRow();
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
					'TBLJABONGBPD_REKURUSAN'=>isset($model[$this->namatabel.'_REKURUSAN']) ? $model[$this->namatabel.'_REKURUSAN'] : '',
					'TBLJABONGBPD_REKPEMERINTAHAN'=>isset($model[$this->namatabel.'_REKPEMERINTAHAN']) ? $model[$this->namatabel.'_REKPEMERINTAHAN'] : '',
					'TBLJABONGBPD_REKORGANISASI'=>isset($model[$this->namatabel.'_REKORGANISASI']) ? $model[$this->namatabel.'_REKORGANISASI'] : '',
					'TBLJABONGBPD_REKPROGRAM'=>isset($model[$this->namatabel.'_REKPROGRAM']) ? $model[$this->namatabel.'_REKPROGRAM'] : '',
					'TBLJABONGBPD_REKKEGIATAN'=>isset($model[$this->namatabel.'_REKKEGIATAN']) ? $model[$this->namatabel.'_REKKEGIATAN'] : '',
					'TBLJABONGBPD_REKDINAS'=>isset($model[$this->namatabel.'_REKDINAS']) ? $model[$this->namatabel.'_REKDINAS'] : '',
					'TBLJABONGBPD_REKBIDANG'=>isset($model[$this->namatabel.'_REKBIDANG']) ? $model[$this->namatabel.'_REKBIDANG'] : '',
					'TBLJABONGBPD_REKPENDAPATAN'=>isset($model[$this->namatabel.'_REKPENDAPATAN']) ? $model[$this->namatabel.'_REKPENDAPATAN'] : '',
					'TBLJABONGBPD_REKPAD'=>isset($model[$this->namatabel.'_REKPAD']) ? $model[$this->namatabel.'_REKPAD'] : '',
					'TBLJABONGBPD_REKPAJAK'=>isset($model[$this->namatabel.'_REKPAJAK']) ? $model[$this->namatabel.'_REKPAJAK'] : '',
					'TBLJABONGBPD_REKAYAT'=>isset($model[$this->namatabel.'_REKAYAT']) ? $model[$this->namatabel.'_REKAYAT'] : '',
					'TBLJABONGBPD_REKJENIS'=>isset($model[$this->namatabel.'_REKJENIS']) ? $model[$this->namatabel.'_REKJENIS'] : '',
					'TBLJABONGBPD_REKSUBJENIS'=>isset($model[$this->namatabel.'_REKSUBJENIS']) ? $model[$this->namatabel.'_REKSUBJENIS'] : '',
					'TBLJABONGBPD_GOLONGAN'=>isset($model['TBLDAFTAR_GOLONGAN']) ? $model['TBLDAFTAR_GOLONGAN'] : '',
					//belum tahu di isi apa
					'TBLJABONGBPD_JNSKETETAPAN'=>"J",
					'KDSU'=>"",
					'TBLJABONGBPD_JNSBAYAR'=>'SKPD',
					'TBLJABONGBPD_TGLSURAT'=>isset($model[$this->namatabel.'_TGLSKPD']) ? $model[$this->namatabel.'_TGLSKPD'] : '',
					'TBLJABONGBPD_BLNSURAT'=>isset($model[$this->namatabel.'_BLNSKPD']) ? $model[$this->namatabel.'_BLNSKPD'] : '',
					'TBLJABONGBPD_THNSURAT'=>isset($model[$this->namatabel.'_THNSKPD']) ? $model[$this->namatabel.'_THNSKPD'] : '',
					'TBLJABONGBPD_NOMORSURAT'=>isset($model[$this->namatabel.'_NOMORSKPD']) ? $model[$this->namatabel.'_NOMORSKPD'] : '',

					'TBLJABONGBPD_TGLBATASSURAT'=>isset($model[$this->namatabel.'_TGLBATASSKPD']) ? $model[$this->namatabel.'_TGLBATASSKPD'] : '',
					'TBLJABONGBPD_BLNBATASSURAT'=>isset($model[$this->namatabel.'_BLNBATASSKPD']) ? $model[$this->namatabel.'_BLNBATASSKPD'] : '',
					'TBLJABONGBPD_THNBATASSURAT'=>isset($model[$this->namatabel.'_THNBATASSKPD']) ? $model[$this->namatabel.'_THNBATASSKPD'] : '',
					'KDMED'=>"0",
					'KDREF'=>"0",
					'KDSET'=>"1",
					'TBLJABONGBPD_STATUSBAYAR'=>"10",
					'TBLJABONGBPD_JENISSETOR'=>'B',
					// 'TBLJABONGBPD_TGLSETOR'=>isset($model[$this->namatabel.'_TGLSETOR']) ? $model[$this->namatabel.'_TGLSETOR'] : '',
					// 'TBLJABONGBPD_BLNSETOR'=>isset($model[$this->namatabel.'_BULANSETOR']) ? $model[$this->namatabel.'_BULANSETOR'] : '',
					// 'TBLJABONGBPD_THNSETOR'=>isset($model[$this->namatabel.'_TAHUNSETOR']) ? $model[$this->namatabel.'_TAHUNSETOR'] : '',
					'TBLJABONGBPD_THNSETOR'=>isset($exp_TANGGAL_ENTRY[2]) ?  substr($exp_TANGGAL_ENTRY[2], -2) : '',
					'TBLJABONGBPD_BLNSETOR'=>isset($exp_TANGGAL_ENTRY[1]) ? $exp_TANGGAL_ENTRY[1] : '',
					'TBLJABONGBPD_TGLSETOR'=>isset($exp_TANGGAL_ENTRY[0]) ? $exp_TANGGAL_ENTRY[0] : '',
					'TBLJABONGBPD_NOMORSSPD'=>$NOMOR_SSPD,
					//belum tahu nyimpennya ke mana
					'TBLJABONGBPD_THNSSPD'=>isset($exp_TANGGAL_ENTRY[2]) ?  substr($exp_TANGGAL_ENTRY[2], -2) : '',
					'TBLJABONGBPD_BLNSSPD'=>isset($exp_TANGGAL_ENTRY[1]) ? $exp_TANGGAL_ENTRY[1] : '',
					'TBLJABONGBPD_TGLSSPD'=>isset($exp_TANGGAL_ENTRY[0]) ? $exp_TANGGAL_ENTRY[0] : '',
					//end of belum tahu nyimpennya ke mana
					'JENSET'=>"",
					'NOCG'=>"",
					'NOREK'=>"",
					'BANK'=>"",
					'BANCB'=>"",
					'TGCGT'=>"0",
					'TGCAIR'=>"0",
					'LUNAS'=>"",
					'TBLJABONGBPD_JNSTAGIHAN'=>"J",
					'TBLJABONGBPD_JNSREKLAME'=>"T",
					'BLBU'=>"0",
					'BASTP'=>"0",
					'TBLJABONGBPD_TGLTAGIHAN'=>isset($model[$this->namatabel.'_TGLSURATTAGIHAN']) ? $model[$this->namatabel.'_TGLSURATTAGIHAN'] : 0,
					'TBLJABONGBPD_BLNTAGIHAN'=>isset($model[$this->namatabel.'_BLNSURATTAGIHAN']) ? $model[$this->namatabel.'_BLNSURATTAGIHAN'] : 0,
					'TBLJABONGBPD_THNTAGIHAN'=>isset($model[$this->namatabel.'_THNSURATTAGIHAN']) ? $model[$this->namatabel.'_THNSURATTAGIHAN'] : 0,
					'BAKB'=>"0",
					'TBLJABONGBPD_RUPIAHJABONG'=>isset($model[$this->namatabel.'_RUPIAHJABONG']) ? $model[$this->namatabel.'_RUPIAHJABONG'] : 0,
					'TBLJABONGBPD_RUPIAHSETOR'=>isset($model[$this->namatabel.'_RUPIAHJABONG']) ? $model[$this->namatabel.'_RUPIAHJABONG'] : 0,
					'TBLJABONGBPD_KETETAPANJABONG'=>isset($model[$this->namatabel.'_RUPIAHJABONG']) ? $model[$this->namatabel.'_RUPIAHJABONG'] : 0,
					// 'TBLJABONGBPD_RUPIAHSETOR'=>$pajaksetor,
					'RPRET'=>"",
					// 'TBLJABONGBPD_KETETAPANPAJAK'=>$pajaksetor,
					'TBLJABONGBPD_RUPIAHTAGIHAN'=>"0",
					// 'TBLJABONGBPD_PAJAKKURANGBAYAR'=>isset($model[$this->namatabel.'_RUPIAHKRGBAYAR']) ? $model[$this->namatabel.'_RUPIAHKRGBAYAR'] : 0,
					'TBLJABONGBPD_PAJAKKURANGBAYAR'=>'0',
					// 'TBLJABONGBPD_BUNGAKETETAPAN'=>isset($model[$this->namatabel.'_BUNGASPTPD']) ? $model[$this->namatabel.'_BUNGASPTPD'] : 0,
					'TBLJABONGBPD_BUNGAKETETAPAN'=>'0',
					// 'TBLJABONGBPD_BUNGATAGIHAN'=>"",
					'TBLJABONGBPD_BUNGATAGIHAN'=>'0',
					// 'TBLJABONGBPD_BUNGAKURANGBAYAR'=>isset($model[$this->namatabel.'_BUNGAKRGBAYAR']) ? $model[$this->namatabel.'_BUNGAKRGBAYAR'] : 0,
					'TBLJABONGBPD_BUNGAKURANGBAYAR'=>'0',
					'BURET'=>"0",
					'TBLJABONGBPD_DENDAKETETAPAN'=>"0",
					'TBLJABONGBPD_DENDATAGIHAN'=>"0",
					'TBLJABONGBPD_DENDAKURANGBAYAR'=>"0",
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
					'TBLJABONGBPD_LOKET'=> substr( "BKP " . Yii::app()->user->nama_pengguna . '    ' . date('H:i:s'), 0, 24),
					'DUP'=>"0",
					'KET'=>"",
					// 'TBLJABONGBPD_ISBPD'=>"",
					// 'TBLJABONGBPD_TELERBPD'=>"",
					// 'TBLJABONGBPD_TGLBPD'=>"",
					// 'KPPD'=>"",
					// 'KETKPPD'=>"",
					// 'TGKPPD'=>"",
					);
				$insert = $command_insrt->insert('TBLJABONGBPD', $arrayOfData);
				if ($insert) {
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

         $select = "
         	{$NAMATABEL}.*
         	,NVL({$NAMATABEL}_THNSKPD, 0) AS {$NAMATABEL}_THNSKPD
         	,NVL({$NAMATABEL}_BLNSKPD, 0) AS {$NAMATABEL}_BLNSKPD
         	,NVL({$NAMATABEL}_TGLSKPD, 0) AS {$NAMATABEL}_TGLSKPD
         	,NVL(TBLPENDATAAN_BLNPAJAK, 0) AS TBLPENDATAAN_BLNPAJAK
         	,NVL(TBLPENDATAAN_TGLPAJAK, 0) AS TBLPENDATAAN_TGLPAJAK
         	,NVL(TBLPENDATAAN_PAJAKKE, 0) AS TBLPENDATAAN_PAJAKKE
			
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
			) AS REFKECAMATAN_NAMA
		";
         $from = 'TBLDAFTAR';

        $otherquery = array(
            'leftjoin_trans'=>array($NAMATABEL, "TBLDAFTAR.TBLDAFTAR_NOPOK={$NAMATABEL}.TBLDAFTAR_NOPOK")
        );

        $filter = array(
            'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
            ,'EQ__'.$NAMATABEL.'.TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
        );

        $otherquery['andwhere'] = '
        NVL('.$NAMATABEL . '.TBLPENDATAAN_BLNPAJAK, 0)='.$TBLPENDATAAN_BLNPAJAK.'
        AND NVL('.$NAMATABEL . '.TBLPENDATAAN_PAJAKKE, 0)='.$TBLPENDATAAN_PAJAKKE.'
		AND NVL('.$NAMATABEL . '.TBLPENDATAAN_TGLPAJAK, 0)='.$TBLPENDATAAN_TGLPAJAK.'
        ';


        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);

        $this->CetakWordValidasiJabong($data);
        Yii::app()->end();
	}

	public function CetakWordValidasiJabong($data=array())
	{
		$NAMATABEL = $this->namatabel;
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_jabong' . DIRECTORY_SEPARATOR . 'validasi' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'validasi_jabong.docx';
		$namafileDL = "Validasi-Jabong.docx"; 

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

		//INI CODING CETAK WORD

		$utama = array();
		$rows = array();
		$rowWP = $data['cetak'];

		// $nomorNPWPD = $rowWP['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$rowWP['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$rowWP['TBLKECAMATAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$rowWP['TBLKELURAHAN_IDBADANUSAHA']));

		$THP = $rowWP['TBLPENDATAAN_THNPAJAK'];
		$BLP = sprintf('%02d', $rowWP['TBLPENDATAAN_BLNPAJAK']);
		$HRP = $rowWP['TBLPENDATAAN_TGLPAJAK'];
		$KE = $rowWP['TBLPENDATAAN_PAJAKKE'];
		$NOPOK = sprintf('%07d',$rowWP['TBLDAFTAR_NOPOK']);
		$KODEPEND = sprintf('%02d', $rowWP[$NAMATABEL.'_REKPENDAPATAN']);
		$KODEPAD = sprintf('%02d', $rowWP[$NAMATABEL.'_REKPAD']);
		$KODEPAJAK = sprintf('%02d', $rowWP[$NAMATABEL.'_REKPAJAK']);
		$KODEAYAT = sprintf('%02d', $rowWP[$NAMATABEL.'_REKAYAT']);
		$KODEJENIS = sprintf('%02d', $rowWP[$NAMATABEL.'_REKJENIS']);

		$utama['cetak_validasi_jabong'] = "{$THP} {$BLP} {$HRP}    {$KE} J {$NOPOK} {$KODEPEND} {$KODEPAD} {$KODEPAJAK} {$KODEAYAT} {$KODEJENIS}";

		// Merge data in the first sheet 
		
		$otbs->MergeField('utama', $utama); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();

		//INI CODING CETAK WORD SSPD
	}
}