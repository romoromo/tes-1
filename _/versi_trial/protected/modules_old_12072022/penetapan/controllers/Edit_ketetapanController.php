<?php

class Edit_ketetapanController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionCari()
	{
		$data['rek'] = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		$arrtbl = array('4.1.1.3.0'=>'TBLDAFTHIBURAN','4.1.1.4.0'=>'TBLDAFTREKLAME','4.1.1.8.0'=>'TBLDAFTTANAH');
		$data['namaTBL'] = $arrtbl[$data['rek']];
		$data['laporan'] = $this->getData();
		$this->renderPartial('grid', array('data'=>$data));
	}

	public function actiongetData()
	{
		$data['tabel'] = $tbl = isset($_REQUEST['tbl']) && !empty($_REQUEST['tbl']) ? base64_decode($_REQUEST['tbl']) : '';
		$nopok = isset($_REQUEST['nopok']) && !empty($_REQUEST['nopok']) ? base64_decode($_REQUEST['nopok']) : '';
		$ke = isset($_REQUEST['ke']) && !empty($_REQUEST['ke']) ? base64_decode($_REQUEST['ke']) : '';
		$thp = isset($_REQUEST['thp']) && !empty($_REQUEST['thp']) ? base64_decode($_REQUEST['thp']) : '';
		$nomorskp = isset($_REQUEST['nomorskp']) && !empty($_REQUEST['nomorskp']) ? base64_decode($_REQUEST['nomorskp']) : '';

		$sql = "SELECT {$tbl}.*, '{$tbl}' AS NAMATABEL FROM {$tbl} WHERE {$tbl}_URUTSKPD = {$nomorskp} AND TBLPENDATAAN_THNPAJAK = {$thp} AND TBLDAFTAR_NOPOK = {$nopok} AND NVL(TBLPENDATAAN_PAJAKKE, 0) = {$ke}"; 
		$data = Yii::app()->db->createCommand($sql)->queryRow();
		echo CJSON::encode($data);
	}

	public function actiongetDataBatal()
	{
		$datar['tbl'] = $tbl = isset($_REQUEST['tbl']) && !empty($_REQUEST['tbl']) ? base64_decode($_REQUEST['tbl']) : '';
		$nopok = isset($_REQUEST['nopok']) && !empty($_REQUEST['nopok']) ? (int)base64_decode($_REQUEST['nopok']) : '';
		$ke = isset($_REQUEST['ke']) && !empty($_REQUEST['ke']) ? (int)base64_decode($_REQUEST['ke']) : '';
		$thp = isset($_REQUEST['thp']) && !empty($_REQUEST['thp']) ? (int)base64_decode($_REQUEST['thp']) : '';
		$nomorskp = isset($_REQUEST['nomorskp']) && !empty($_REQUEST['nomorskp']) ? base64_decode($_REQUEST['nomorskp']) : '';

		$sql = "SELECT * FROM {$tbl} JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK={$tbl}.TBLDAFTAR_NOPOK WHERE {$tbl}_NOMORSKPD = {$nomorskp} AND TBLPENDATAAN_THNPAJAK = {$thp} AND {$tbl}.TBLDAFTAR_NOPOK = {$nopok} AND NVL(TBLPENDATAAN_PAJAKKE, 0) = {$ke}";
		$data = Yii::app()->db->createCommand($sql)->queryRow();

		$datar = array();
		foreach ($data as $kolom => $value) {
			$datar[$kolom] = $value;
		}
		$datar['masapajak'] = LokalIndonesia::getBulan($data['TBLPENDATAAN_BLNPAJAK']) . ' 20' . $data['TBLPENDATAAN_THNPAJAK'];
		$datar['keterangan'] = '';
		$datar['NAMATABEL'] = $tbl;
		if ($tbl=='TBLDAFTREKLAME') {
			$datar['keterangan'] = $data["{$tbl}_ISIREKLAME"];
		}
		if ($tbl=='TBLDAFTTANAH') {
			$datar['keterangan'] = 'volume : ' . (isset($data['VOL']) ? $data['VOL'] : 0);
		}
		echo CJSON::encode($datar);
	}

	public function actionbatalkanskpd()
	{
		if (Yii::app()->user->isGuest) {
			echo CJSON::encode(array('status'=>'denied', 'msg'=>'Anda tidak berhak')); Yii::app()->end();
		}
		$PARAM = $_REQUEST['param'];

		$namaTBL = base64_decode($PARAM['tbl']);

		$dataupdate = array(
			"{$namaTBL}_THNSKPD" => NULL
			,"{$namaTBL}_BLNSKPD" => NULL
			,"{$namaTBL}_TGLSKPD" => NULL

			,"{$namaTBL}_THNBATASSKPD" => NULL
			,"{$namaTBL}_BLNBATASSKPD" => NULL
			,"{$namaTBL}_TGLBATASSKPD" => NULL

			,"{$namaTBL}_NOMORSKPD" => NULL
			,"{$namaTBL}_URUTSKPD" => NULL
			,"{$namaTBL}_PAJAKSKPD" => NULL
		);

		$condition = '
		TBLDAFTAR_NOPOK=:nopok
		AND TBLPENDATAAN_THNPAJAK=:thnpajak
		AND NVL(TBLPENDATAAN_BLNPAJAK, 0)=:blnpajak
		AND NVL(TBLPENDATAAN_TGLPAJAK, 0)=:hrppajak
		AND NVL(TBLPENDATAAN_PAJAKKE, 0)=:ke
		';

		$params = array( 
			':nopok'=>(int)base64_decode($PARAM['TBLDAFTAR_NOPOK'])
			, ':thnpajak'=>(int)base64_decode($PARAM['TBLPENDATAAN_THNPAJAK'])
			, ':blnpajak'=>(int)($PARAM['TBLPENDATAAN_BLNPAJAK'])
			, ':hrppajak'=>(int)($PARAM['TBLPENDATAAN_TGLPAJAK'])
			, ':ke'=>(int)base64_decode($PARAM['TBLPENDATAAN_PAJAKKE'])
		);

		$cekssp = Yii::app()->db->createCommand()->select()->from($namaTBL)->where($condition, $params)->queryRow();
		if (!$cekssp) {
			echo CJSON::encode(array('status'=>'notfound', 'msg'=>'Data tidak ditemukan')); Yii::app()->end();
		}
		if ((isset($cekssp[$namaTBL.'_REGSETOR']) && !empty($cekssp[$namaTBL.'_REGSETOR'])) OR (isset($cekssp[$namaTBL.'_RUPIAHSETOR']) && !empty($cekssp[$namaTBL.'_RUPIAHSETOR'])  )) {
			echo CJSON::encode(array('status'=>'setored', 'msg'=>'Sudah disetor, tidak bisa dibatalkan')); Yii::app()->end();
		}

		$upd = Yii::app()->db->createCommand()
		->update($namaTBL, $dataupdate, $condition, $params);

		if ($upd>=0) {
			echo CJSON::encode(array('status'=>'success', 'msg'=>'SKPD berhasil dibatalkan'));
		}

	}

	public function actionhapusdata()
	{
		if (Yii::app()->user->isGuest) {
			echo CJSON::encode(array('status'=>'denied', 'msg'=>'Anda tidak berhak')); Yii::app()->end();
		}
		$PARAM = $_REQUEST['param'];

		$namaTBL = base64_decode($PARAM['tbl']);

		$condition = '
		TBLDAFTAR_NOPOK=:nopok
		AND TBLPENDATAAN_THNPAJAK=:thnpajak
		AND NVL(TBLPENDATAAN_BLNPAJAK, 0)=:blnpajak
		AND NVL(TBLPENDATAAN_TGLPAJAK, 0)=:hrppajak
		AND NVL(TBLPENDATAAN_PAJAKKE, 0)=:ke
		';

		$params = array( 
			':nopok'=>(int)base64_decode($PARAM['TBLDAFTAR_NOPOK'])
			, ':thnpajak'=>(int)base64_decode($PARAM['TBLPENDATAAN_THNPAJAK'])
			, ':blnpajak'=>(int)($PARAM['TBLPENDATAAN_BLNPAJAK'])
			, ':hrppajak'=>(int)($PARAM['TBLPENDATAAN_TGLPAJAK'])
			, ':ke'=>(int)base64_decode($PARAM['TBLPENDATAAN_PAJAKKE'])
		);

		$del = Yii::app()->db->createCommand()
		->delete($namaTBL, $condition, $params);

		if ($del>=1) {
			echo CJSON::encode(array('status'=>'success', 'msg'=>'Pendataan berhasil dihapus dari database'));
		} else {
			echo CJSON::encode(array('status'=>'failed', 'msg'=>'Pendataan gagal dihapus dari database'));			
		}

	}

	public function getData()
	{
		$namaTBL = '';
		$sql = '';
		$tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$bulanpjk = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';

		$KODE = isset($_REQUEST['kode']) && !empty($_REQUEST['kode']) ? $_REQUEST['kode'] : '';
		$NOMORNOTA = isset($_REQUEST['nomornota']) && !empty($_REQUEST['nomornota']) ? $_REQUEST['nomornota'] : '';
		$TAHUNPAJAK = isset($_REQUEST['tahunpajak']) && !empty($_REQUEST['tahunpajak']) ? $_REQUEST['tahunpajak'] : '';
		$BULANPAJAK = isset($_REQUEST['bulanpajak']) && !empty($_REQUEST['bulanpajak']) ? $_REQUEST['bulanpajak'] : '';
		$HARIPAJAK = isset($_REQUEST['haripajak']) && !empty($_REQUEST['haripajak']) ? $_REQUEST['haripajak'] : '';
		$TGLSPT = isset($_REQUEST['tglspt']) && !empty($_REQUEST['tglspt']) ? $_REQUEST['tglspt'] : '';
		$TGLSKP = isset($_REQUEST['tglskp']) && !empty($_REQUEST['tglskp']) ? $_REQUEST['tglskp'] : '';
		$TGLBSKP = isset($_REQUEST['tglbskp']) && !empty($_REQUEST['tglbskp']) ? $_REQUEST['tglbskp'] : '';

		$wherethnpajak = $tahunpjk!=0 ? (' AND TBLPENDATAAN_THNPAJAK='.$tahunpjk) : '';
		$whereblnpajak = $bulanpjk!=0 ? (' AND TBLPENDATAAN_BLNPAJAK='.$bulanpjk) : '';

		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {			
			case '4.1.1.3.0':
				$namaTBL = 'TBLDAFTHIBURAN';
				$sql = '
				SELECT
					NOuSKP AS NOMORSKP,
					THSKP,
					BLSKP,
					HRSKP,
					NOUSKP,
					THBSKP,
					BLBSKP,
					HRBSKP,
					TBLDAFTAR.NOPOK,
					thp,
					TBLPENDATAAN_BLNPAJAK,
					hrp,
					ke,
					TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
					TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
					PAJAK,
					TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
					TBLDAFTAR.TBLDAFTAR_GOLONGAN,
					KEC,
					KEL,
					JUMHR,
					RPOMZ,
					TARIFPC,
					TARIFRP,
					BUNGAPC,
					BUNGARP,
					NAIK,
					PCRING,
					RPRING,
					hrESPT || \'/\' || blESPT || \'/20\' || thEspt AS Tgl_ENTRY
				FROM
					TBLDAFTHIBURAN
				INNER JOIN TBLDAFTAR ON TBLDAFTHIBURAN.NOPOK = TBLDAFTAR.NOPOK
				WHERE
					TBLDAFTAR.NOPOK <> 0
				AND NVL (NOuSKP, 0) > 0
				';
				$AYAT = '3';
				break;
			
			case '4.1.1.4.0':
				$namaTBL = 'TBLDAFTREKLAME';
				$sql = '
				SELECT
					TBLDAFTREKLAME_URUTSKPD AS NOMORSKP,
					TBLDAFTAR.TBLDAFTAR_NOPOK AS NOPOK,
					TBLDAFTREKLAME_THNSKPD,
					TBLDAFTREKLAME_BLNSKPD,
					TBLDAFTREKLAME_TGLSKPD,
					TBLDAFTREKLAME_URUTSKPD,
					TBLDAFTREKLAME_THNBATASSKPD,
					TBLDAFTREKLAME_BLNBATASSKPD,
					TBLDAFTREKLAME_TGLBATASSKPD,
					TBLDAFTREKLAME_THNMULAIREKLAME,
					TBLDAFTREKLAME_BLNMULAIREKLAME,
					TBLDAFTREKLAME_TGLMULAIREKLAME,
					TBLDAFTREKLAME_THNAKHIRREKLAME,
					TBLDAFTREKLAME_BLNAKHIRREKLAME,
					TBLDAFTREKLAME_TGLAKHIRREKLAME,
					TBLPENDATAAN_THNPAJAK,
					TBLPENDATAAN_BLNPAJAK,
					TBLPENDATAAN_TGLPAJAK,
					TBLPENDATAAN_PAJAKKE,
					TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA AS NAMA_USAHA,
					TBLDAFTAR.TBLDAFTAR_GOLONGAN,
					TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAK AS PAJAK,
					TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME AS KDRE,
					TBLDAFTREKLAME_TGLENTRI || \'/\' || TBLDAFTREKLAME_BLNENTRI || \'/20\' || TBLDAFTREKLAME_THNENTRI AS Tgl_ENTRY,
					TBLPENDATAAN_PAJAKKE AS lOKASI,
					TBLDAFTREKLAME_KETERANGAN2 AS ISI_REKLAME,
					TBLDAFTREKLAME_ISIREKLAME AS KETERANGAN,
					TBLDAFTREKLAME_JMLHREKLAME AS JUMLAH,
					TBLDAFTREKLAME_PANJANG,
					TBLDAFTREKLAME_LEBAR,
					TBLDAFTREKLAME_SKORKAWASAN,
					REFKETINGGIAN_SKOR,
					REFSUDUTPANDANG_SKOR,
					TBLDAFTREKLAME.TBLDAFTREKLAME_NILAISTRATEGIS,
					TBLDAFTREKLAME_NILAISEWA
				FROM
					TBLDAFTREKLAME
				INNER JOIN TBLDAFTAR ON TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
				WHERE
					TBLDAFTAR.TBLDAFTAR_NOPOK <> 0
				AND NVL (TBLDAFTREKLAME_URUTSKPD, 0) > 0
				';
				$AYAT = '4';
				break;
			
			case '4.1.1.8.0':
				$namaTBL = 'TBLDAFTTANAH';
				$sql = '
				SELECT
					NOuSKP AS NOMORSKP,
					THSKP,
					BLSKP,
					HRSKP,
					NOUSKP,
					THBSKP,
					BLBSKP,
					HRBSKP,
					TBLDAFTAR.NOPOK,
					thp,
					TBLPENDATAAN_BLNPAJAK,
					hrp,
					ke,
					TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
					TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
					PAJAK,
					TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
					TBLDAFTAR.TBLDAFTAR_GOLONGAN,
					KEC,
					KEL,
					VOLUM,
					TARIFPC,
					TARIFRP,
					HRGA AS HARGA,
					TBLDAFTTANAH.rpskp,
					TBLDAFTTANAH.blskp,
					TBLDAFTTANAH.hrskp,
					TBLDAFTAR.bkec,
					TBLDAFTAR.bkel,
					TBLDAFTAR.pr,
					TBLDAFTTANAH.keskp,
					TBLDAFTTANAH.blbskp,
					TBLDAFTTANAH.hrbskp,
					TBLDAFTTANAH.thbskp,
					TBLDAFTTANAH.ayt,
					TBLDAFTTANAH.bid,
					TBLDAFTTANAH.jen,
					TBLDAFTTANAH.kgt,
					TBLDAFTTANAH.org,
					TBLDAFTTANAH.pad,
					TBLDAFTTANAH.pem,
					TBLDAFTTANAH.pend,
					TBLDAFTTANAH.pjk,
					TBLDAFTTANAH.prg,
					TBLDAFTTANAH.urs,
					TBLDAFTTANAH.din,
					TBLDAFTTANAH.noskp,
					(
						SELECT
							TBLREKENING.TBLREKENING_NAMAREKENING
						FROM
							TBLREKENING
						WHERE
							TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTTANAH.PEND
						AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTTANAH.PAD
						AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTTANAH.PJK
						AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTTANAH.AYT
						AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTTANAH.JEN
					) AS TBLREKENING_NAMAREKENING,
					NBER1 AS NILAI_SUMBER,
					NTUK1,
					NTUK2,
					NTUK3,
					NTUK4,
					NTUK5,
					NTUK6,
					NLIH1 AS NILAI_PEMULIHAN,
					NVOL1,
					NVOL2,
					NVOL3,
					NVOL4,
					NVOL5,
					NVOL6,
					NFAK1,
					NFAK2,
					NFAK3,
					NFAK4,
					NFAK5,
					NFAK6,
					NPNA1,
					NPNA2,
					NPNA3,
					NPNA4,
					NPNA5,
					NPNA6,
					hrESPT || \'/\' || blESPT || \'/20\' || thEspt AS Tgl_ENTRY
				FROM
					TBLDAFTTANAH
				INNER JOIN TBLDAFTAR ON TBLDAFTTANAH.NOPOK = TBLDAFTAR.NOPOK
				WHERE
					TBLDAFTAR.NOPOK <> 0
				AND NVL (NOuSKP, 0) > 0
				AND TBLDAFTTANAH.CARA = \'O\'
				';
				$AYAT = '8';
				break;
			
			default:
				$namaTBL = 'TBLDAFTHIBURAN';
				break;
		}

		$paramKode = '';
		if (!empty($KODE)) {
			$paramKode = ' AND TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME = \'' . $KODE . '\'';
		}

		if ($KODE=='I') {
			$paramKode = ' AND TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME <> \'T\' ';
		}
		
		$paramNomorNota = '';
		if (!empty($NOMORNOTA)) {
			$paramNomorNota = ' AND noskp = ' . $NOMORNOTA;
		}
		
		$paramTahunPajak = '';
		if (!empty($TAHUNPAJAK)) {
			$paramTahunPajak = ' AND TBLPENDATAAN_THNPAJAK = ' . $TAHUNPAJAK;
		}
		
		$paramBulanPajak = '';
		if (!empty($BULANPAJAK)) {
			$paramBulanPajak = ' AND TBLPENDATAAN_BLNPAJAK = ' . $BULANPAJAK;
		}
		
		$paramHariPajak = '';
		if (!empty($HARIPAJAK)) {
			$paramHariPajak = ' AND TBLPENDATAAN_TGLPAJAK = ' . $HARIPAJAK;
		}
		
		$paramTGLSPT = '';
		if (strtotime($TGLSPT)) {
			$pchTGLSPT = explode('-', $TGLSPT);
			$paramTGLSPT = ' AND thespt = ' . (int)substr($pchTGLSPT[2], -2) . ' AND blespt = ' . (int)$pchTGLSPT[1] . ' AND hrespt = ' . (int)$pchTGLSPT[0];
		}
		
		$paramTGLSKP = '';
		if (strtotime($TGLSKP)) {
			$pchTGLSKP = explode('-', $TGLSKP);
			$paramTGLSKP = ' AND '. $namaTBL .'_THNSKPD = ' . (int)substr($pchTGLSKP[2], -2) . ' AND '. $namaTBL .'_BLNSKPD = ' . (int)$pchTGLSKP[1] . ' AND '. $namaTBL .'_TGLSKPD = ' . (int)$pchTGLSKP[0];
		}
		
		$paramTGLBSKP = '';
		if (strtotime($TGLBSKP)) {
			$pchTGLBSKP = explode('-', $TGLBSKP);
			$paramTGLBSKP = ' AND '. $namaTBL .'_THNBATASSKPD = ' . (int)substr($pchTGLBSKP[2], -2) . ' AND '. $namaTBL .'_BLNBATASSKPD = ' . (int)$pchTGLBSKP[1] . ' AND '. $namaTBL .'_TGLBATASSKPD = ' . (int)$pchTGLBSKP[0];
		}

		$order = ' order by NVL(NOMORSKP,0)';

		$sql = $sql . $paramKode  . $paramNomorNota . $paramTahunPajak . $paramBulanPajak . $paramHariPajak . $paramTGLSPT . $paramTGLSKP . $paramTGLBSKP;
		$sql = $sql . $order;

		return $data = Yii::app()->db->createCommand( $sql )->queryAll();
	}

	public function actionSimpan()
	{
		$PARAM = $_REQUEST['param'];

		$namaTBL = base64_decode($PARAM['tbl']);

		$tglskp = $PARAM['tglskp'];
		$tglbtsskp = $PARAM['tglbskp'];

		$exp_tglskp = explode('-', $tglskp);
		$exp_tglbtsskp = explode('-', $tglbtsskp);

		$cek = Yii::app()->db->createCommand()
		->select("count({$namaTBL}_NOMORSKPD) as jml")
		->from($namaTBL)
		->where("
			TBLPENDATAAN_THNPAJAK=:thnpajak
			AND CAST({$namaTBL}_NOMORSKPD AS INT)=:noskp
		", array(
			':thnpajak' => (int)base64_decode($PARAM['thp'])
			// ':thnpajak' => isset($exp_tglskp[2]) ? (int)substr($exp_tglskp[2], -2) : ''
			,':noskp' => (int)$PARAM['NOuSKP']
		))
		->queryScalar();

		// var_dump($cek);Yii::app()->end();

		if ($cek>=1 && $PARAM['NOuSKP']!=(int)($PARAM['nomorskp'])) {
		// if ($cek>=1) {
			echo CJSON::encode(array('status'=>'exists', 'msg'=>'Nomor SKP sudah ada, mohon gunakan nomor lain'));
			Yii::app()->end();
		}

		$attribut = array(
			"{$namaTBL}_NOMORSKPD" => (int)$PARAM["NOuSKP"]
			, "{$namaTBL}_URUTSKPD" => (int)$PARAM["NOuSKP"]
			
			, "{$namaTBL}_THNSKPD" => isset($exp_tglskp[2]) ? (int)substr($exp_tglskp[2], -2) : ""
			, "{$namaTBL}_BLNSKPD" => isset($exp_tglskp[1]) ? (int)$exp_tglskp[1] : ""
			, "{$namaTBL}_TGLSKPD" => isset($exp_tglskp[0]) ? (int)$exp_tglskp[0] : ""

			, "{$namaTBL}_THNBATASSKPD" => isset($exp_tglbtsskp[2]) ? (int)substr($exp_tglbtsskp[2], -2) : ""
			, "{$namaTBL}_BLNBATASSKPD" => isset($exp_tglbtsskp[1]) ? (int)$exp_tglbtsskp[1] : ""
			, "{$namaTBL}_TGLBATASSKPD" => isset($exp_tglbtsskp[0]) ? (int)$exp_tglbtsskp[0] : ""
		);

		$condition = ' 
		TBLDAFTAR_NOPOK=:nopok
		AND TBLPENDATAAN_THNPAJAK=:thnpajak
		AND NVL(TBLPENDATAAN_BLNPAJAK, 0)=:blnpajak
		AND NVL(TBLPENDATAAN_TGLPAJAK, 0)=:hrppajak
		AND NVL(TBLPENDATAAN_PAJAKKE, 0)=:kepajak
		';

		$params = array( 
			':nopok'=>(int)base64_decode($PARAM['nopok'])
			, ':thnpajak'=>(int)base64_decode($PARAM['thp'])
			, ':blnpajak'=>(int)($PARAM['blp'])
			, ':hrppajak'=>(int)($PARAM['hrp'])
			, ':kepajak'=>(int)($PARAM['ke'])
		);

		$cmd = Yii::app()->db->createCommand();
		$upd = $cmd->update($namaTBL, $attribut, $condition, $params);

		if ($upd>=0) {
			echo CJSON::encode(array('status'=>'success', 'msg'=>'Data berhasil disimpan'));
		}
	}
}