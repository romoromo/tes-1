<?php

class Super_datamanagerController extends Controller
{
	public function init()
	{
		// if (Yii::app()->user->isGuest OR Yii::app()->user->username!='superuser') {
		if (Yii::app()->user->isGuest ) {
			Yii::app()->end();
		}
	}

	public function actionIndex()
	{
		$data['kec'] = Yii::app()->db->createCommand("SELECT * FROM REFKECAMATAN")->queryAll();
		$data['rek'] = Yii::app()->db->createCommand("SELECT * FROM REFBADANUSAHA")->queryAll();
		$data['tblrek'] = Yii::app()->db->createCommand("
			SELECT
			*
			FROM
			TBLREKENING
			WHERE
			TBLREKENING.TBLREKENING_REKPAJAK = 1
			AND TBLREKENING.TBLREKENING_REKPAD = 1
			AND TBLREKENING.TBLREKENING_REKJENIS = 0
			ORDER BY
			TBLREKENING.TBLREKENING_REKPENDAPATAN,
			TBLREKENING.TBLREKENING_REKPAD,
			TBLREKENING.TBLREKENING_REKPAJAK,
			TBLREKENING.TBLREKENING_REKAYAT,
			TBLREKENING.TBLREKENING_REKJENIS
		")->queryAll();

		$this->renderPartial('index', array('data' => $data));
	}

	public function actionGetData()
    {
        $TBLDAFTAR_NOPOK = !empty(DMOrcl::getRequest('TBLDAFTAR_NOPOK')) ? DMOrcl::getRequest('TBLDAFTAR_NOPOK') : '';
        $JENIS_PAJAK = !empty(DMOrcl::getRequest('JENIS_PAJAK')) ? DMOrcl::getRequest('JENIS_PAJAK') : '';
        $TANGGAL_SPT = !empty(DMOrcl::getRequest('TANGGAL_SPT')) && strtotime(DMOrcl::getRequest('TANGGAL_SPT')) ? date('Y-m-d',strtotime(DMOrcl::getRequest('TANGGAL_SPT'))) : '';
        $MASA_TAHUN = !empty(DMOrcl::getRequest('MASA_TAHUN')) ? (int)DMOrcl::getRequest('MASA_TAHUN') : '';
        $MASA_BULAN = !empty(DMOrcl::getRequest('MASA_BULAN')) ? (int)DMOrcl::getRequest('MASA_BULAN') : '';
		
		$select = "substr(REFBADANUSAHA.REKENING_KODE,7,1) as REK_KODE";
		$from = 'TBLDAFTAR';
		$otherquery = array('leftjoin_REFBADANUSAHA'=>array('REFBADANUSAHA','TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA=REFBADANUSAHA.REFBADANUSAHA_ID'));
		$filter = array('EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK);
		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'SCALAR');
		$kode_table = DBFetch::query($arrayConfig);

		if (!($kode_table)) {
			$kode_table = (int)$JENIS_PAJAK;
		}

		if($kode_table==1){
			$tabel = 'TBLDAFTHOTEL';
			$data['url'] = 'pendataan/pajakhotel';
		}elseif($kode_table==2){
			$tabel = 'TBLDAFTRMAKAN';
			$data['url']='pendataan/pajakrestoran';
		}elseif($kode_table==3){
			$tabel = 'TBLDAFTHIBURAN';
			$data['url']='pendataan/hiburantetap';
		}elseif($kode_table==4){
			$tabel = 'TBLDAFTREKLAME';
			$data['url']='pendataan/reklamelama_tetap';
		}elseif($kode_table==7){
			$tabel = 'TBLDAFTPARKIR';
			$data['url']='pendataan/pajakparkir';
		}elseif($kode_table==8){
			$tabel = 'TBLDAFTTANAH';
			$data['url']='pendataan/pajak_airtanah2017';
		}elseif($kode_table==9){
			$tabel = 'TBLDAFTBURUNG';
			$data['url']='pendataan/walet';
		}

		$data['tabel'] = $tabel;

         $select = "
         {$tabel}.*,
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLKECAMATAN_IDBADANUSAHA,
			TBLKELURAHAN_IDBADANUSAHA,
				(
					SELECT
						REFKELURAHAN.REFKELURAHAN_NAMA
					FROM
						REFKELURAHAN
					WHERE
						REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
					AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKELURAHAN,
				(
					SELECT
						REFKECAMATAN.REFKECAMATAN_NAMA
					FROM
						REFKECAMATAN
					WHERE
						REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKECAMATAN_NAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
				TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA,
				TBLDAFTAR.REFBADANUSAHA_IDPEMILIK,
				TBLDAFTAR.TBLDAFTAR_ISAKTIF,
				NVL (
					TBLDAFTAR.TBLDAFTAR_ALASANNONAKTIF,
					'-'
				) AS TBLDAFTAR_ALASANNONAKTIF, 
				NVL(".$tabel.".TBLPENDATAAN_THNPAJAK,0) as TBLPENDATAAN_THNPAJAK, 
				NVL(".$tabel.".TBLPENDATAAN_BLNPAJAK,0) as TBLPENDATAAN_BLNPAJAK, 
				NVL(".$tabel.".TBLPENDATAAN_TGLPAJAK,0) as TBLPENDATAAN_TGLPAJAK";
         $from = 'TBLDAFTAR';

         $otherquery = array(
             'leftjoin_REFBADANUSAHA'=>array('REFBADANUSAHA','TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA=REFBADANUSAHA.REFBADANUSAHA_ID')
             ,'leftjoin_'.$tabel=>array($tabel,'TBLDAFTAR.TBLDAFTAR_NOPOK='.$tabel.'.TBLDAFTAR_NOPOK')
             // ,'order'=> 'TBLKECAMATAN_IDBADANUSAHA, TBLDAFTAR_NOPOK ASC'
             // ,'leftjoin_REFBADANUSAHA'=>array('TBLDAFTAR','TBLDAFTAR.REFBADANUSAHA_IDPEMILIK=REFBADANUSAHA.REFBADANUSAHA_ID')
        );

        $filter = array(
            'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
            ,"EQ__{$tabel}.TBLPENDATAAN_THNPAJAK" => substr($MASA_TAHUN, -2)
            ,"EQ__{$tabel}.TBLPENDATAAN_BLNPAJAK" => $MASA_BULAN
			// ,'EQ__TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN' => $TBLDAFTAR_JENISPENDAPATAN
			// ,'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $TBLDAFTAR_GOLONGAN
			// ,'EQ__TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA' => $REFBADANUSAHA_ID
			// ,'EQ__TBLDAFTAR.TBLDAFTAR_ISAKTIF' => $TBLDAFTAR_ISAKTIF
			// ,'LK__TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA' => $TBLDAFTAR_PEMILIKNAMA
			// ,'EQ__TBLDAFTAR.TBLKECAMATAN_IDPEMILIK' => $TBLKECAMATAN_IDPEMILIK
			// ,'EQ__TBLDAFTAR.TBLKELURAHAN_IDPEMILIK' => $TBLKELURAHAN_IDPEMILIK
			// ,'LK__TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT' => $TBLDAFTAR_PEMILIKALAMAT
			// ,'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA' => $TBLDAFTAR_BADANUSAHANAMA
			// ,'EQ__TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA' => $TBLKECAMATAN_IDBADANUSAHA
			// ,'EQ__TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA' => $TBLKELURAHAN_IDBADANUSAHA
			// ,'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT' => $TBLDAFTAR_BADANUSAHAALAMAT
        );

        if (!empty($TANGGAL_SPT)) {
        	$extglspt = explode('-', $TANGGAL_SPT);
        	$thnspt = (int)substr($extglspt[0], -2);
        	$blnspt = (int)$extglspt[1];
        	$tglspt = (int)$extglspt[2];
        	$sql_and = " {$tabel}_THNENTRI = {$thnspt} AND {$tabel}_BLNENTRI = {$blnspt} AND {$tabel}_TGLENTRI = {$tglspt}";
        	$otherquery['andwhere'] = $sql_and;
        }

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
        $data['daftar'] = DBFetch::query($arrayConfig);
        $this->renderPartial('grid', array('data'=>$data));
    }

    public function actionAutocompletewp()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');
		
		$query = trim($_REQUEST['query']);

		$select = "
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		REFBADANUSAHA.REKENING_KODE
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'LK__TBLDAFTAR_BADANUSAHANAMA' => $query
			,'LK__TBLDAFTAR_BADANUSAHAALAMAT' => $query
			,'LK__TBLDAFTAR_NOPOK' => $query
		);

		/*$filter_AND = array(
			'EQ__TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			// ,'EQ__tblsubyek_isaktif' => "T"
		);*/

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'order'=> 'TBLDAFTAR_NOPOK ASC'
		);

		// $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$results = DBFetch::query($arrayConfig);

		$suggestions = array();
		 
		foreach($results as $result)
		{
			$suggestions[] = array(
			"value" => $result['TBLDAFTAR_NOPOK']. ' | ' . $result['TBLDAFTAR_BADANUSAHANAMA']. ' | ' . $result['TBLDAFTAR_BADANUSAHAALAMAT']
			,"data" => $result['TBLDAFTAR_NOPOK']
			,"TBLDAFTAR_BADANUSAHANAMA" => $result['TBLDAFTAR_BADANUSAHANAMA']
			,"TBLDAFTAR_BADANUSAHAALAMAT" => $result['TBLDAFTAR_BADANUSAHAALAMAT']
			,"TBLDAFTAR_NOPOK" => $result['TBLDAFTAR_NOPOK']
			,"REKENING_KODE" => $result['REKENING_KODE']
			);
		}

		 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function actionButton()
	{
		// if (Yii::app()->user->isGuest OR Yii::app()->user->username!='superuser') {
		if (Yii::app()->user->isGuest ) {
			Yii::app()->end();
		}
		$data = array();
		$kode = explode('#', base64_decode($_REQUEST['code']));
		$data['nopok'] = $nopok = isset($kode[0]) ? (int)$kode[0] : 0;
		$data['tahun'] = $tahun = isset($kode[1]) ? (int)$kode[1] : 0;
		$data['bulan'] = $bulan = isset($kode[2]) ? (int)$kode[2] : 0;
		$data['tgl']   = $tgl   = isset($kode[3]) ? (int)$kode[3] : 0;
		$data['ke']    = $ke    = isset($kode[4]) ? (int)$kode[4] : 0;
		$data['tabel'] = $tabel = isset($kode[5]) ? $kode[5] : '';

		$data['pendataan'] = $this->getPendataan($data);
		$data['isSETBPD'] = $isSETBPD = $this->isSETBPD($data);
		$data['isBANK'] = $isBANK = $this->isBANK($data);

		$this->renderPartial('button', array('data'=>$data));
	}

	public function getPendataan($data=array())
	{
		$select = '*';
		$from = $data['tabel'];
		$otherquery = array(
			'andwhere' => "
			NVL(TBLPENDATAAN_BLNPAJAK, 0) = {$data['bulan']}
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = {$data['tgl']}
			AND NVL(TBLPENDATAAN_PAJAKKE, 0) = {$data['ke']}
			"
		);
		$filter = array(
			"EQ__TBLDAFTAR_NOPOK" => $data['nopok']
			,"EQ__TBLPENDATAAN_THNPAJAK" => $data['tahun']
		);
		return $pajak = DBFetch::query(array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery, 'mode'=>'DETAIL'));
	}

	public function isSETBPD($data=array())
	{
		$select = '*';
		$from = 'TBLSETORANBPD';
		$otherquery = array(
			'andwhere' => "
			NVL(TBLPENDATAAN_BLNPAJAK, 0) = {$data['bulan']}
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = {$data['tgl']}
			AND NVL(TBLPENDATAAN_PAJAKKE, 0) = {$data['ke']}
			"
		);
		$filter = array(
			"EQ__TBLDAFTAR_NOPOK" => $data['nopok']
			,"EQ__TBLPENDATAAN_THNPAJAK" => $data['tahun']
		);
		return $seto = DBFetch::query(array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery, 'mode'=>'DETAIL'));
	}

	public function isBANK($data=array())
	{
		$select = '*';
		$from = 'TBLSETOR';
		$otherquery = array(
			'andwhere' => "
			NVL(TBLPENDATAAN_BLNPAJAK, 0) = {$data['bulan']}
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = {$data['tgl']}
			AND NVL(TBLPENDATAAN_PAJAKKE, 0) = {$data['ke']}
			"
		);
		$filter = array(
			"EQ__TBLDAFTAR_NOPOK" => $data['nopok']
			,"EQ__TBLPENDATAAN_THNPAJAK" => $data['tahun']
		);
		return $seto = DBFetch::query(array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery, 'mode'=>'DETAIL'));
	}

	// Method PATAH HATI disini, hati-hati dengan method dibawah ini!

	public function actionPutusBank()
	{
		$data = array();
		$kode = explode('#', base64_decode($_REQUEST['code']));
		$data['nopok'] = $nopok = isset($kode[0]) ? (int)$kode[0] : 0;
		$data['tahun'] = $tahun = isset($kode[1]) ? (int)$kode[1] : 0;
		$data['bulan'] = $bulan = isset($kode[2]) ? (int)$kode[2] : 0;
		$data['tgl']   = $tgl   = isset($kode[3]) ? (int)$kode[3] : 0;
		$data['ke']    = $ke    = isset($kode[4]) ? (int)$kode[4] : 0;
		$data['tabel'] = $tabel = isset($kode[5]) ? $kode[5] : '';

		$data['where'] = $where = 
			"TBLPENDATAAN_THNPAJAK = :tahun
			AND TBLDAFTAR_NOPOK = :nopok
			AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = :bln
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = :tgl
			AND NVL(TBLPENDATAAN_PAJAKKE, 0) = :ke
			";
		;

		$data['bindParam'] = $bindParam = array(
			':tahun' => $tahun
			,':bln' => $bulan
			,':tgl' => $tgl
			,':nopok' => $nopok
			,':ke' => $ke
		);

		$del = Yii::app()->db->createCommand()->delete('TBLSETOR', $where, $bindParam);

		if ($del) {
			$arrayOfDataUpdate = array(
				'TBLSETORANBPD_ISBPD' => NULL
				,'TBLSETORANBPD_TELERBPD' => NULL
				,'TBLSETORANBPD_TGLBPD' => NULL
			);
			$setoranbpd = Yii::app()->db->createCommand()
			->update('TBLSETORANBPD', $arrayOfDataUpdate, $where, $bindParam);
			$this->tulis_history($data, 'Hapus Setoran Bank');
			echo CJSON::encode(array('status'=>'success', 'message'=>'Data Seto Bank berhasil dihapus', 'data'=>''));
		}
	}

	public function actionPutusSetBPD()
	{
		$data = array();
		$kode = explode('#', base64_decode($_REQUEST['code']));
		$data['nopok'] = $nopok = isset($kode[0]) ? (int)$kode[0] : 0;
		$data['tahun'] = $tahun = isset($kode[1]) ? (int)$kode[1] : 0;
		$data['bulan'] = $bulan = isset($kode[2]) ? (int)$kode[2] : 0;
		$data['tgl']   = $tgl   = isset($kode[3]) ? (int)$kode[3] : 0;
		$data['ke']    = $ke    = isset($kode[4]) ? (int)$kode[4] : 0;
		$data['tabel'] = $tabel = isset($kode[5]) ? $kode[5] : '';

		$data['where'] = $where = 
			"TBLPENDATAAN_THNPAJAK = :tahun
			AND TBLDAFTAR_NOPOK = :nopok
			AND NVL(TBLPENDATAAN_BLNPAJAK, 0) = :bln
			AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = :tgl
			AND NVL(TBLPENDATAAN_PAJAKKE, 0) = :ke
			";
		;

		$data['bindParam'] = $bindParam = array(
			':tahun' => $tahun
			,':bln' => $bulan
			,':tgl' => $tgl
			,':nopok' => $nopok
			,':ke' => $ke
		);

		$del = Yii::app()->db->createCommand()->delete('TBLSETORANBPD', $where, $bindParam);

		if ($del) {
			$arrayOfDataUpdate = array(
				$data['tabel'] . '_TAHUNSETOR' => NULL
				,$data['tabel'] . '_BULANSETOR' => NULL
				,$data['tabel'] . '_TANGGALSETOR' => NULL
				,$data['tabel'] . '_THNENTRISETOR' => NULL
				,$data['tabel'] . '_BLNENTRISETOR' => NULL
				,$data['tabel'] . '_TGLENTRISETOR' => NULL
				,$data['tabel'] . '_REGSETOR' => NULL
				,$data['tabel'] . '_RUPIAHSETOR' => NULL
			);
			$setoranbpd = Yii::app()->db->createCommand()
			->update($data['tabel'], $arrayOfDataUpdate, $where, $bindParam);
			$this->tulis_history($data, 'Hapus SSPD');
			echo CJSON::encode(array('status'=>'success', 'message'=>'Data Setoran (SSPD) berhasil dihapus', 'data'=>''));
		}
	}

	public function tulis_history($data, $jenis)
	{
		$NAMATABEL = $data['tabel'];
		$rowWP = Yii::app()->db->createCommand()->select()->from($data['tabel'])->where($data['where'], $data['bindParam'])->queryRow();
		$REK = ($rek = $this->getRekening(
			array(
				'REKPENDAPATAN' => isset($rowWP[$NAMATABEL . '_REKPENDAPATAN']) ? $rowWP[$NAMATABEL . '_REKPENDAPATAN'] : ''
				,'REKPAD' => isset($rowWP[$NAMATABEL . '_REKPAD']) ? $rowWP[$NAMATABEL . '_REKPAD'] : ''
				,'REKPAJAK' => isset($rowWP[$NAMATABEL . '_REKPAJAK']) ? $rowWP[$NAMATABEL . '_REKPAJAK'] : ''
				,'REKAYAT' => isset($rowWP[$NAMATABEL . '_REKAYAT']) ? $rowWP[$NAMATABEL . '_REKAYAT'] : ''
				,'REKJENIS' => isset($rowWP[$NAMATABEL . '_REKJENIS']) ? $rowWP[$NAMATABEL . '_REKJENIS'] : ''
			)
		)) ? $rek['TBLREKENING_NAMAREKENING'] : '';
		$GOL = isset($rowWP['TBLDAFTAR_GOLONGAN']) ? $rowWP['TBLDAFTAR_GOLONGAN'] : '';
		$KEC_ID = isset($rowWP['TBLKECAMATAN_ID']) ? $rowWP['TBLKECAMATAN_ID'] : '';
		$KEL_ID = isset($rowWP['TBLKELURAHAN_ID']) ? $rowWP['TBLKELURAHAN_ID'] : '';

		$text = "{$jenis} {$REK} TH:{$data['tahun']} BL:{$data['bulan']} HRP:{$data['tgl']} KE:{$data['ke']} Berhasil, Nopok :{$GOL}.{$data['nopok']}.{$KEC_ID}.{$KEL_ID}";
		$arrayInsert = array(
			'tblhistoriproses_keterangan' => $text
			,'tblhistoriproses_tglentry' => DMOrcl::getNow()
			,'tblhistoriproses_pengguna' => Yii::app()->user->username
			,'tblhistoriproses_jenisproses' => $jenis
		);
		$ins_history = Yii::app()->db->createCommand()->insert('tblhistoriproses', $arrayInsert);
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
}