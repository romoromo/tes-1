<?php

class EntriangsuranpajakController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	
	}

	public function cekpernahsetor($tahun,$bln,$nopok,$setoranke)
	{
		$model = Yii::app()->db->createCommand("SELECT
			NVL(TBLANGSURAN_SETORAN,0) AS JML
		FROM
			TBLANGSURAN
		WHERE
			TBLDAFTAR_NOPOK = ".$nopok."
		AND TBLANGSURAN_PAJAKKE = ".$setoranke."
		AND TBLPENDATAAN_THNPAJAK = ".substr($tahun,-2)." AND TBLPENDATAAN_BLNPAJAK = ".$bln."
		")->queryRow();
		if ($model['JML']!=0) {
			return 'ada';
		}else{
			return 'tidak';
		}
	}

	public function actiongetdata()
	{
		$tahun = trim($_POST['tahun']);
		$bln = trim($_POST['bln']) ? $_POST['bln'] : 0;
		$setoranke = trim($_POST['setoranke']);
		$nopok = trim($_POST['nopok']);

		$exist = $this->cekpernahsetor($tahun,$bln,$nopok,$setoranke);
		// $data = array();
		$model = array();

		if ($exist=='ada') {
			$model['validasi'] = 'sudahsetor';
			$model['datadarisetbpd'] = Yii::app()->db->createCommand("SELECT TBLSETORANBPD.TBLSETORANBPD_NOMORSSPD AS NOMORSSPD, TBLSETORANBPD.TBLSETORANBPD_DENDAKETETAPAN, TBLANGSURAN.*, TBLREKENING.*
				FROM TBLSETORANBPD
				LEFT JOIN TBLREKENING ON (TBLSETORANBPD.TBLSETORANBPD_REKPENDAPATAN || '.' || TBLSETORANBPD.TBLSETORANBPD_REKPAD || '.' || TBLSETORANBPD.TBLSETORANBPD_REKPAJAK || '.' || TBLSETORANBPD.TBLSETORANBPD_REKAYAT || '.' || TBLSETORANBPD.TBLSETORANBPD_REKJENIS)=TBLREKENING.TBLREKENING_KODE
				JOIN TBLANGSURAN ON TBLANGSURAN.TBLDAFTAR_NOPOK=TBLSETORANBPD.TBLDAFTAR_NOPOK AND TBLANGSURAN.TBLANGSURAN_PAJAKKE=NVL(TBLSETORANBPD.TBLPENDATAAN_PAJAKKE, 0)
				AND TBLANGSURAN.TBLPENDATAAN_THNPAJAK=TBLSETORANBPD.TBLPENDATAAN_THNPAJAK AND TBLANGSURAN.TBLPENDATAAN_BLNPAJAK=TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK
				WHERE (TBLSETORANBPD.TBLPENDATAAN_THNPAJAK='".substr($tahun,-2)."' AND TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK='".$bln."') 
				AND TBLSETORANBPD_JNSKETETAPAN='A'
				AND TBLSETORANBPD.TBLDAFTAR_NOPOK=".$nopok."
				AND TBLSETORANBPD.TBLPENDATAAN_PAJAKKE=".$setoranke."
				")
			->queryRow();
		} elseif ($exist=='tidak') {
			$model['validasi'] = 'belumsetor';
			$model['data'] = Yii::app()->db->createCommand("SELECT TBLANGSURAN.*, TBLREKENING.*,
				CASE WHEN TBLANGSURAN_BEBASBNG IS NOT NULL THEN
				NVL(TBLANGSURAN_BUNGAANGSURAN,0)-((TBLANGSURAN_BEBASBNG/100)*TBLANGSURAN_BUNGAANGSURAN)
				ELSE
				NVL(TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,0)
				END AS BUNGANEW
				FROM TBLANGSURAN 
				LEFT JOIN TBLREKENING ON (TBLANGSURAN.TBLANGSURAN_REKPENDAPATAN || '.' || TBLANGSURAN.TBLANGSURAN_REKPAD || '.' || TBLANGSURAN.TBLANGSURAN_REKPAJAK || '.' || TBLANGSURAN.TBLANGSURAN_REKAYAT || '.' || TBLANGSURAN.TBLANGSURAN_REKJENIS)=TBLREKENING.TBLREKENING_KODE
				WHERE (TBLPENDATAAN_THNPAJAK='".substr($tahun,-2)."' AND TBLPENDATAAN_BLNPAJAK='".$bln."') 
				AND TBLDAFTAR_NOPOK=".$nopok."
				AND TBLANGSURAN_PAJAKKE=".$setoranke."
				")
			->queryRow();
		} else {
			$model['validasi'] = 'tidakada';
		}

		// echo CJSON::encode(array('data'=>$data, 'model'=>$model));
		echo CJSON::encode($model);
	}

	public function actionCetakSSPD()
	{
		$data['URL_APP'] = Yii::app()->getBaseUrl(true);

		$TBLDAFTAR_NOPOK = !empty(DMOrcl::getRequest('TBLDAFTAR_NOPOK')) ? (int)base64_decode(base64_decode(DMOrcl::getRequest('TBLDAFTAR_NOPOK'))) : 0;
		$TBLPENDATAAN_THNPAJAK = !empty(DMOrcl::getRequest('TBLPENDATAAN_THNPAJAK')) ? (int)base64_decode(base64_decode(DMOrcl::getRequest('TBLPENDATAAN_THNPAJAK'))) : 0;
		$TBLPENDATAAN_BLNPAJAK = !empty(DMOrcl::getRequest('TBLPENDATAAN_BLNPAJAK')) ? (int)base64_decode(base64_decode(DMOrcl::getRequest('TBLPENDATAAN_BLNPAJAK'))) : 0;
		$TBLPENDATAAN_TGLPAJAK = !empty(DMOrcl::getRequest('TBLPENDATAAN_TGLPAJAK')) ? (int)base64_decode(base64_decode(DMOrcl::getRequest('TBLPENDATAAN_TGLPAJAK'))) : 0;
		$TBLANGSURAN_PAJAKKE = !empty(DMOrcl::getRequest('TBLPENDATAAN_PAJAKKE')) ? (int)base64_decode(base64_decode(DMOrcl::getRequest('TBLPENDATAAN_PAJAKKE'))) : 0;
		$DENDA = !empty(DMOrcl::getRequest('DENDA')) ? LokalIndonesia::toAngka(base64_decode(base64_decode(DMOrcl::getRequest('DENDA')))) : 0;

		$NAMATABEL = '';// $this->namatabel;

        $select = "TBLANGSURAN.*,TBLDAFTAR.*";
        $from = 'TBLANGSURAN';

        

        $otherquery = array(
            'leftjoin_trans'=>array("TBLDAFTAR","TBLANGSURAN.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK")
        );

        $filter = array(
            'EQ__TBLANGSURAN.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
            ,'EQ__TBLANGSURAN.TBLPENDATAAN_THNPAJAK' => $TBLPENDATAAN_THNPAJAK
            ,'EQ__TBLANGSURAN.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
            ,'EQ__TBLANGSURAN.TBLANGSURAN_PAJAKKE' => $TBLANGSURAN_PAJAKKE
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);
        $data['denda'] = $DENDA;

        $this->CetakWordSSPD($data);
        Yii::app()->end();
	}

	public function CetakWordSSPD($data=array())
	{
		$NAMATABEL = '';//$this->namatabel;
		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_sspd' . DIRECTORY_SEPARATOR;
		// $namatpl = $path_tpl . 'SSPD-NONREK.docx';
		$namatpl = $path_tpl . 'SSPD-NONREK-ANG.docx';
		$namafileDL = "SSPD-ANGSURAN.docx"; 

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

		// $IS_SKPDKB = isset($rowWP[$NAMATABEL.'_PAJAKPERIKSA']) && $rowWP[$NAMATABEL.'_PAJAKPERIKSA']>0;
		// $IS_BUNGA = isset($rowWP[$NAMATABEL.'_BUNGASPTPD']) && $rowWP[$NAMATABEL.'_BUNGASPTPD']>0;
		// $IS_DENDA = isset($rowWP[$NAMATABEL.'_DENDAKRGBAYAR']) && $rowWP[$NAMATABEL.'_DENDAKRGBAYAR']>0;

		$utama = array();
		$rows = array();
		$rowWP = $data['cetak'];

		$nomorNPWPD = $rowWP['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$rowWP['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$rowWP['TBLKECAMATAN_IDBADANUSAHA'])) . '.' . (sprintf('%02d',$rowWP['TBLKELURAHAN_IDBADANUSAHA']));
		
		$utama['nomor'] = trim($rowWP['TBLANGSURAN_NOMORSETOR']);
		$utama['wp_nama'] = trim($rowWP['TBLDAFTAR_BADANUSAHANAMA']);
		$utama['wp_alamat'] = $rowWP['TBLDAFTAR_BADANUSAHAALAMAT'];//(trim($rowWP['TBLDAFTAR_BADANUSAHAALAMAT']));
		$utama['nopok'] = sprintf('%07d', $rowWP['TBLDAFTAR_NOPOK']);//sprintf('%07d', $rowWP['TBLDAFTAR_NOPOK']);
		$utama['npwpd'] = $nomorNPWPD;
		$utama['wp_kelurahan_nama'] = 'SDGSDFSDFSD';//$rowWP['REFKELURAHAN_NAMA'];
		$utama['wp_kecamatan_nama'] = 'KLDFJGKLDJFG';//$rowWP['REFKECAMATAN_NAMA'];
		$utama['wp_pemiliknama'] = trim($rowWP['TBLDAFTAR_PEMILIKNAMA']);
		$utama['wp_pemilikalamat'] = (trim($rowWP['TBLDAFTAR_PEMILIKALAMAT']));

		$utama['tahunpajak'] = '20'.sprintf('%02d', $rowWP['TBLPENDATAAN_THNPAJAK']);
		$utama['thnpajak'] = $rowWP['TBLPENDATAAN_THNPAJAK'];
		$utama['blnpajak'] = $rowWP['TBLPENDATAAN_BLNPAJAK'];
		$utama['tglpajak'] = isset($rowWP['TBLPENDATAAN_TGLPAJAK']) ? (int)$rowWP['TBLPENDATAAN_TGLPAJAK'] : 0;
		$utama['pajakke'] = $rowWP['TBLANGSURAN_PAJAKKE'];
		$utama['bulanpajak'] = LokalIndonesia::getBulan($rowWP['TBLPENDATAAN_BLNPAJAK']);
		$utama['tglskp'] = sprintf('%02d', $rowWP['TBLANGSURAN_TGLKETETAPAN']) .'/'. sprintf('%02d', $rowWP['TBLANGSURAN_BLNKETETAPAN']) .'/'. sprintf('%02d', $rowWP['TBLANGSURAN_THNKETETAPAN']) ;
		
		$nominal1 = $rowWP['TBLANGSURAN_SETORAN']+$rowWP['TBLANGSURAN_BUNGAANGSURAN'];
		$utama['rincino1'] = '1';
		$KODEAYAT = sprintf('%02d', $rowWP['TBLANGSURAN_REKAYAT']);
		$KODEJENIS = sprintf('%02d', $rowWP['TBLANGSURAN_REKJENIS']);
		$utama['rincirek1'] = "4.1.1.{$KODEAYAT}.{$KODEJENIS}";
		$utama['rincireknama1'] = ($rek = $this->getRekening($rowWP['REFBADANUSAHA_IDBADANUSAHA'])) ? $rek['TBLREKENING_NAMAREKENING'] : '';
		$utama['rincinominal1'] = LokalIndonesia::ribuan($nominal1);

		$nominal2 = $data['denda'];
		$utama['rincino2'] = '2'; //$IS_BUNGA ? '2' : '';
		$utama['rincirek2'] = "4.1.4.07.{$KODEAYAT}"; //$IS_BUNGA ? '4.1.4.06.01' : '';
		$utama['rincireknama2'] ='DENDA KETERLAMBATAN'; //$IS_BUNGA ? 'BUNGA PAJAK' : '';
		$utama['rincinominal2'] = LokalIndonesia::ribuan($nominal2); //$IS_BUNGA ? LokalIndonesia::ribuan($nominal2) : '';

		$nominal3 = '';// $IS_DENDA ? $rowWP[$NAMATABEL.'_DENDAKRGBAYAR'] : 0;
		$utama['rincino3'] = '';//'3';
		$utama['rincirek3'] = '';//'4.1.4.07.01';
		$utama['rincireknama3'] = '';//'DENDA KETERLAMBATAN';
		$utama['rincinominal3'] = '';// $IS_DENDA ? LokalIndonesia::ribuan($nominal3) : '0';
		
		$utama['rincitotal'] = LokalIndonesia::ribuan($rincitotal = $nominal1+$nominal2);
		$utama['rincitotalterbilang'] = LokalIndonesia::terbilangangka($rincitotal);
		$utama['tglsetor'] = sprintf('%02d', $rowWP['TBLANGSURAN_TGLSETORANGSURAN']) .'/'. sprintf('%02d', $rowWP['TBLANGSURAN_BLNSETORANGSURAN']) .'/'. sprintf('%02d', $rowWP['TBLANGSURAN_THNSETORANGSURAN']) ;

		$utama['REKENING'] = 'REKENING';// $rowWP[$NAMATABEL.'_REKPENDAPATAN'] . ' ' . $rowWP[$NAMATABEL.'_REKPAD'] . ' ' . $rowWP[$NAMATABEL.'_REKPAJAK'] . ' ' . sprintf('%02d', $rowWP[$NAMATABEL.'_REKAYAT']) . ' ' . sprintf('%02d', $rowWP[$NAMATABEL.'_REKJENIS']);
		$utama['jenis_bayar'] = '';// $IS_SKPDKB ? 'SKPDKB' : 'SPTPD';
		$utama['tglhariini'] = '';// date('d-m-Y');
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

	public function actionsimpan()
	{
		$tahun = isset($_REQUEST['tahun']) && !empty($_REQUEST['tahun']) ? $_REQUEST['tahun'] : 0;
		$bln = isset($_REQUEST['bln']) && !empty($_REQUEST['bln']) ? $_REQUEST['bln'] : 0;
		$nopok = isset($_REQUEST['nopok']) && !empty($_REQUEST['nopok']) ? $_REQUEST['nopok'] : 0;
		$setoranke = isset($_REQUEST['setoranke']) && !empty($_REQUEST['setoranke']) ? $_REQUEST['setoranke'] : 0;
		$denda = isset($_REQUEST['denda']) && !empty($_REQUEST['denda']) ? $_REQUEST['denda'] : 0;
		$pokok = isset($_REQUEST['pokok']) && !empty($_REQUEST['pokok']) ? $_REQUEST['pokok'] : 0;
		$setoran = isset($_REQUEST['setoran']) && !empty($_REQUEST['setoran']) ? $_REQUEST['setoran'] : 0;
		$bunga = isset($_REQUEST['bunga']) && !empty($_REQUEST['bunga']) ? $_REQUEST['bunga'] : 0;
		$nosetoran = isset($_REQUEST['nosetoran']) && !empty($_REQUEST['nosetoran']) ? $_REQUEST['nosetoran'] : 0;
		$tglentry = isset($_REQUEST['tglentry']) && !empty($_REQUEST['tglentry']) ? $_REQUEST['tglentry'] : 0;
		$exp_tglentry = explode('-', $tglentry);
		$tglskp = isset($_REQUEST['tglskp']) && !empty($_REQUEST['tglskp']) ? $_REQUEST['tglskp'] : 0;
		$exp_tglskp = explode('-', $tglskp);
		$tglbatas = isset($_REQUEST['tglbatas']) && !empty($_REQUEST['tglbatas']) ? $_REQUEST['tglbatas'] : 0;
		$exp_tglbatas = explode('-', $tglbatas);
		
		$pajaksetor = isset($_REQUEST['pajaksetor']) && !empty($_REQUEST['pajaksetor']) ? $_REQUEST['pajaksetor'] : 0;
		$angsuran = isset($_REQUEST['angsuran']) && !empty($_REQUEST['angsuran']) ? $_REQUEST['angsuran'] : 0;
		
		$jenis_setoran = isset($_REQUEST['jenis_setoran']) && !empty($_REQUEST['jenis_setoran']) ? $_REQUEST['jenis_setoran'] : 0;

		$exist = $this->cekpernahsetor($tahun,$bln,$nopok,$setoranke);
		if ($exist=='ada') {
			echo CJSON::encode(array('pesan'=>'failed', 'posisi'=>'data sudah pernah di inputkan'));
		}else{
			$command = Yii::app()->db->createCommand();
			$update = $command->update('TBLANGSURAN', array(
				// 'TBLANGSURAN_SETORAN'=>LokalIndonesia::toAngka( $setoran ),
				'TBLANGSURAN_SETORAN'=>LokalIndonesia::toAngka( $angsuran ),
				// 'TBLANGSURAN_BUNGAANGSURAN'=>LokalIndonesia::toAngka( $bunga ),
				'TBLANGSURAN_THNSETORANGSURAN'=>isset($exp_tglentry[2]) ?  substr($exp_tglentry[2], -2) : '',
				'TBLANGSURAN_BLNSETORANGSURAN'=>isset($exp_tglentry[1]) ? $exp_tglentry[1] : '',
				'TBLANGSURAN_TGLSETORANGSURAN'=>isset($exp_tglentry[0]) ? $exp_tglentry[0] : '',
				'TBLANGSURAN_THNENTRISETOR'=>isset($exp_tglentry[2]) ?  substr($exp_tglentry[2], -2) : '',
				'TBLANGSURAN_BLNENTRISETOR'=>isset($exp_tglentry[1]) ? $exp_tglentry[1] : '',
				'TBLANGSURAN_TGLENTRISETOR'=>isset($exp_tglentry[0]) ? $exp_tglentry[0] : '',
				'TBLANGSURAN_NOMORSETOR'=>$nosetoran
				), 'TBLPENDATAAN_THNPAJAK=:thn AND TBLPENDATAAN_BLNPAJAK=:bln AND TBLDAFTAR_NOPOK=:nopok AND TBLANGSURAN_PAJAKKE=:setoranke', array(':thn'=>substr($tahun,-2), ':bln'=>$bln, ':nopok'=>$nopok, ':setoranke'=>$setoranke));
			if ($update) {
				$command_insrt = Yii::app()->db->createCommand();
				$arrayOfData = array(
					'TBLPENDATAAN_THNPAJAK'=>substr($tahun,-2),
					'TBLPENDATAAN_BLNPAJAK'=>$bln,
					'TBLPENDATAAN_TGLPAJAK'=>"0",
					'TBLPENDATAAN_PAJAKKE'=>$setoranke,
					'TBLDAFTAR_NOPOK'=>$nopok,
					'TBLDAFTAR_JNSPENDAPATAN'=>$_REQUEST['TBLDAFTAR_JNSPENDAPATAN'],
					'TBLKECAMATAN_ID'=>$_REQUEST['TBLKECAMATAN_ID'],
					'TBLKELURAHAN_ID'=>$_REQUEST['TBLKELURAHAN_ID'],
					'TBLSETORANBPD_REKURUSAN'=>$_REQUEST['TBLREKENING_REKURUSAN'],
					'TBLSETORANBPD_REKPEMERINTAHAN'=>$_REQUEST['TBLREKENING_REKPEMERINTAHAN'],
					'TBLSETORANBPD_REKORGANISASI'=>$_REQUEST['TBLREKENING_REKORGANISASI'],
					'TBLSETORANBPD_REKPROGRAM'=>$_REQUEST['TBLREKENING_REKPROGRAM'],
					'TBLSETORANBPD_REKKEGIATAN'=>$_REQUEST['TBLREKENING_REKKEGIATAN'],
					'TBLSETORANBPD_REKDINAS'=>$_REQUEST['TBLREKENING_REKDINAS'],
					'TBLSETORANBPD_REKBIDANG'=>$_REQUEST['TBLREKENING_REKBIDANG'],
					'TBLSETORANBPD_REKPENDAPATAN'=>$_REQUEST['TBLREKENING_REKPENDAPATAN'],
					'TBLSETORANBPD_REKPAD'=>$_REQUEST['TBLREKENING_REKPAD'],
					'TBLSETORANBPD_REKPAJAK'=>$_REQUEST['TBLREKENING_REKPAJAK'],
					'TBLSETORANBPD_REKAYAT'=>$_REQUEST['TBLREKENING_REKAYAT'],
					'TBLSETORANBPD_REKJENIS'=>$_REQUEST['TBLREKENING_REKJENIS'],
					'TBLSETORANBPD_REKSUBJENIS'=>$_REQUEST['TBLREKENING_REKSUBJENIS'],
					'TBLSETORANBPD_GOLONGAN'=>$_REQUEST['TBLANGSURAN_GOLONGAN'],
					//belum tahu di isi apa
					'TBLSETORANBPD_JNSKETETAPAN'=>"A",
					'KDSU'=>"",
					'TBLSETORANBPD_JNSBAYAR'=>"SKPD-A",
					'TBLSETORANBPD_TGLSURAT'=>isset($exp_tglskp[0]) ? $exp_tglskp[0] : '',
					'TBLSETORANBPD_BLNSURAT'=>isset($exp_tglskp[1]) ? $exp_tglskp[1] : '',
					'TBLSETORANBPD_THNSURAT'=>isset($exp_tglskp[2]) ?  substr($exp_tglskp[2], -2) : '',
					'TBLSETORANBPD_NOMORSURAT'=>"",
					'TBLSETORANBPD_TGLBATASSURAT'=>isset($exp_tglbatas[0]) ? $exp_tglbatas[0] : '',
					'TBLSETORANBPD_BLNBATASSURAT'=>isset($exp_tglbatas[1]) ? $exp_tglbatas[1] : '',
					'TBLSETORANBPD_THNBATASSURAT'=>isset($exp_tglbatas[2]) ?  substr($exp_tglbatas[2], -2) : '',
					'KDMED'=>"0",
					'KDREF'=>"0",
					'KDSET'=>"1",
					'TBLSETORANBPD_STATUSBAYAR'=>"10",
					'TBLSETORANBPD_JENISSETOR'=>"",
					// 'TBLSETORANBPD_TGLSETOR'=>isset($model['TBLANGSURAN_TGLSETOR']) ? $model['TBLANGSURAN_TGLSETOR'] : '',
					// 'TBLSETORANBPD_BLNSETOR'=>isset($model['TBLANGSURAN_BULANSETOR']) ? $model['TBLANGSURAN_BULANSETOR'] : '',
					// 'TBLSETORANBPD_THNSETOR'=>isset($model['TBLANGSURAN_TAHUNSETOR']) ? $model['TBLANGSURAN_TAHUNSETOR'] : '',
					'TBLSETORANBPD_THNSETOR'=>isset($exp_tglentry[2]) ?  substr($exp_tglentry[2], -2) : '',
					'TBLSETORANBPD_BLNSETOR'=>isset($exp_tglentry[1]) ? $exp_tglentry[1] : '',
					'TBLSETORANBPD_TGLSETOR'=>isset($exp_tglentry[0]) ? $exp_tglentry[0] : '',
					'TBLSETORANBPD_NOMORSSPD'=>$nosetoran,
					//belum tahu nyimpennya ke mana
					'TBLSETORANBPD_THNSSPD'=>isset($exp_tglentry[2]) ?  substr($exp_tglentry[2], -2) : '',
					'TBLSETORANBPD_BLNSSPD'=>isset($exp_tglentry[1]) ? $exp_tglentry[1] : '',
					'TBLSETORANBPD_TGLSSPD'=>isset($exp_tglentry[0]) ? $exp_tglentry[0] : '',
					//end of belum tahu nyimpennya ke mana
					'JENSET'=>"",
					'NOCG'=>"",
					'NOREK'=>"",
					'BANK'=>"",
					'BANCB'=>"",
					'TGCGT'=>"0",
					'TGCAIR'=>"0",
					'LUNAS'=>"",
					'TBLSETORANBPD_JNSTAGIHAN'=>"A",
					'TBLSETORANBPD_JNSREKLAME'=>"",
					'BLBU'=>"0",
					'BASTP'=>"0",
					'TBLSETORANBPD_TGLTAGIHAN'=>"0",
					'TBLSETORANBPD_BLNTAGIHAN'=>"0",
					'TBLSETORANBPD_THNTAGIHAN'=>"0",
					'BAKB'=>"0",
					// 'TBLSETORANBPD_RUPIAHPAJAK'=>LokalIndonesia::toAngka( $pokok ),
					// 'TBLSETORANBPD_RUPIAHSETOR'=>LokalIndonesia::toAngka( $pokok ),
					// 'TBLSETORANBPD_KETETAPANPAJAK'=>LokalIndonesia::toAngka( $pokok ),
					'TBLSETORANBPD_RUPIAHPAJAK'=>LokalIndonesia::toAngka( $angsuran ), // harusnya angsurannya saja (tidak + bunga)
					'TBLSETORANBPD_RUPIAHSETOR'=>LokalIndonesia::toAngka( $angsuran ), // harusnya angsurannya saja (tidak + bunga)
					'TBLSETORANBPD_KETETAPANPAJAK'=>LokalIndonesia::toAngka( $angsuran ), // harusnya angsurannya saja (tidak + bunga)
					// 'TBLSETORANBPD_RUPIAHSETOR'=>$pajaksetor,
					'RPRET'=>"0",
					// 'TBLSETORANBPD_KETETAPANPAJAK'=>$pajaksetor,
					'TBLSETORANBPD_RUPIAHTAGIHAN'=>"0",
					'TBLSETORANBPD_PAJAKKURANGBAYAR'=>"0",
					'TBLSETORANBPD_BUNGAKETETAPAN'=>LokalIndonesia::toAngka( $bunga ),
					'TBLSETORANBPD_BUNGATAGIHAN'=>"0",
					'TBLSETORANBPD_BUNGAKURANGBAYAR'=>"0",
					'BURET'=>"0",
					'TBLSETORANBPD_DENDAKETETAPAN'=>LokalIndonesia::toAngka( $denda ),
					'TBLSETORANBPD_DENDATAGIHAN'=>"0",
					'TBLSETORANBPD_DENDAKURANGBAYAR'=>"0",
					'DDRET'=>"0",
					'NAIK'=>"0",
					'ADM'=>"0",
					// 'RPSSKP'=>LokalIndonesia::toAngka( $pokok ),
					'RPSSKP'=>LokalIndonesia::toAngka( $angsuran ), // harusnya angsurannya saja (tidak + bunga)
					'RPSSTP'=>"0",
					'RPSKB'=>"0",
					'RPSRET'=>"0",
					'UK1'=>"0",
					'UK2'=>"0",
					'UK3'=>"0",
					'TBLSETORANBPD_LOKET'=> substr( "BKP " . Yii::app()->user->nama_pengguna . '    ' . date('H:i:s'), 0, 24),
					'DUP'=>"0",
					'KET'=>"",
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