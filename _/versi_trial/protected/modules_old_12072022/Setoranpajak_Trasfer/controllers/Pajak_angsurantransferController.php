<?php

class Pajak_angsurantransferController extends Controller
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
			$model['datadariseto'] = Yii::app()->db->createCommand("SELECT TBLSETOR.TBLSETOR_NOMORSSPD AS NOMORSSPD, TBLSETOR.TBLSETOR_DENDAKETETAPAN, TBLREKENING.*, TBLANGSURAN.*
				FROM TBLSETOR 
				LEFT JOIN TBLREKENING ON (TBLSETOR.TBLSETOR_REKPENDAPATAN || '.' || TBLSETOR.TBLSETOR_REKPAD || '.' || TBLSETOR.TBLSETOR_REKPAJAK || '.' || TBLSETOR.TBLSETOR_REKAYAT || '.' || TBLSETOR.TBLSETOR_REKJENIS)=TBLREKENING.TBLREKENING_KODE
				JOIN TBLANGSURAN ON TBLANGSURAN.TBLDAFTAR_NOPOK=TBLSETOR.TBLDAFTAR_NOPOK AND TBLANGSURAN.TBLANGSURAN_PAJAKKE=TBLSETOR.TBLPENDATAAN_PAJAKKE
				AND TBLANGSURAN.TBLPENDATAAN_THNPAJAK=TBLSETOR.TBLPENDATAAN_THNPAJAK AND TBLANGSURAN.TBLPENDATAAN_BLNPAJAK=TBLSETOR.TBLPENDATAAN_BLNPAJAK
				WHERE (TBLSETOR.TBLPENDATAAN_THNPAJAK='".substr($tahun,-2)."' AND TBLSETOR.TBLPENDATAAN_BLNPAJAK='".$bln."') 
				AND TBLSETOR.TBLDAFTAR_NOPOK=".$nopok."
				AND TBLSETOR_JNSKETETAPAN='A'
				AND NVL(TBLSETOR.TBLPENDATAAN_PAJAKKE, 0)=".$setoranke."
				")
			->queryRow();
		} elseif ($exist=='tidak') {
			$model['validasi'] = 'belumsetor';
			$model['data'] = Yii::app()->db->createCommand("SELECT TBLANGSURAN.*, TBLREKENING.*
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

		$select = "TBLANGSURAN.*,TBLDAFTAR.*,TBLSETOR_JNSKETETAPAN,TBLSETOR_BUNGAKETETAPAN,TBLSETOR_DENDAKETETAPAN";
		$from = 'TBLANGSURAN';



		$otherquery = array(
			'leftjoin_trans'=>array("TBLDAFTAR","TBLANGSURAN.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK")
			,'join_seto'=>array("TBLSETOR", "TBLANGSURAN.TBLDAFTAR_NOPOK=TBLSETOR.TBLDAFTAR_NOPOK AND TBLANGSURAN.TBLPENDATAAN_THNPAJAK=TBLSETOR.TBLPENDATAAN_THNPAJAK AND TBLANGSURAN.TBLPENDATAAN_BLNPAJAK=TBLSETOR.TBLPENDATAAN_BLNPAJAK AND TBLSETOR.TBLSETOR_JNSKETETAPAN='A' AND TBLANGSURAN.TBLANGSURAN_PAJAKKE=TBLSETOR.TBLPENDATAAN_PAJAKKE")
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
		$namatpl = $path_tpl . 'SSPD-NONREK-ANG - TRANSFER.docx';
		$namafileDL = "SSPD-ANGSURAN-TRANSFER.docx"; 

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

		$IS_BUNGA = isset($rowWP['TBLSETOR_BUNGAKETETAPAN']) && $rowWP['TBLSETOR_BUNGAKETETAPAN']>0;

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
		
		// $nominal1 = $rowWP['TBLANGSURAN_SETORAN']+$rowWP['TBLANGSURAN_BUNGAANGSURAN'];
		$nominal1 = $IS_BUNGA ? $rowWP['TBLANGSURAN_SETORAN']+$rowWP['TBLANGSURAN_BUNGAANGSURAN'] : $rowWP['TBLANGSURAN_SETORAN'];
		$utama['rincino1'] = '1';
		$KODEAYAT = sprintf('%02d', $rowWP['TBLANGSURAN_REKAYAT']);
		$KODEJENIS = sprintf('%02d', $rowWP['TBLANGSURAN_REKJENIS']);
		$utama['rincirek1'] = "4.1.1.{$KODEAYAT}.{$KODEJENIS}";
		$utama['rincireknama1'] = ($rek = $this->getRekening($rowWP['REFBADANUSAHA_IDBADANUSAHA'])) ? $rek['TBLREKENING_NAMAREKENING'] : '';
		$utama['rincinominal1'] = LokalIndonesia::ribuan($nominal1);

		$nominal2 = $data['denda'];
		$utama['rincino2'] = '2'; //$IS_BUNGA ? '2' : '';
		$utama['rincirek2'] = "4.1.4.{$KODEAYAT}.{$KODEJENIS}"; //$IS_BUNGA ? '4.1.4.06.01' : '';
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
			// if ($update) {
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
					'TBLR_REKURUSAN'=>$_REQUEST['TBLREKENING_REKURUSAN'],
					'TBLR_REKPEMERINTAHAN'=>$_REQUEST['TBLREKENING_REKPEMERINTAHAN'],
					'TBLR_REKORGANISASI'=>$_REQUEST['TBLREKENING_REKORGANISASI'],
					'TBLSETOR_REKPROGRAM'=>$_REQUEST['TBLREKENING_REKPROGRAM'],
					'TBLSETOR_REKKEGIATAN'=>$_REQUEST['TBLREKENING_REKKEGIATAN'],
					'TBLSETOR_REKDINAS'=>$_REQUEST['TBLREKENING_REKDINAS'],
					'TBLSETOR_REKBIDANG'=>$_REQUEST['TBLREKENING_REKBIDANG'],
					'TBLSETOR_REKPENDAPATAN'=>$_REQUEST['TBLREKENING_REKPENDAPATAN'],
					'TBLSETOR_REKPAD'=>$_REQUEST['TBLREKENING_REKPAD'],
					'TBLSETOR_REKPAJAK'=>$_REQUEST['TBLREKENING_REKPAJAK'],
					'TBLSETOR_REKAYAT'=>$_REQUEST['TBLREKENING_REKAYAT'],
					'TBLSETOR_REKJENIS'=>$_REQUEST['TBLREKENING_REKJENIS'],
					'TBLSETOR_REKSUBJENIS'=>$_REQUEST['TBLREKENING_REKSUBJENIS'],
					'TBLSETOR_GOLONGAN'=>$_REQUEST['TBLANGSURAN_GOLONGAN'],
								//belum tahu di isi apa
					'TBLSETOR_JNSKETETAPAN'=>"A",
					'KDSU'=>"",
					'TBLSETOR_JNSBAYAR'=>"SKPD-A",
					'TBLSETOR_TGLSURAT'=>isset($exp_tglskp[0]) ? $exp_tglskp[0] : '',
					'TBLSETOR_BLNSURAT'=>isset($exp_tglskp[1]) ? $exp_tglskp[1] : '',
					'TBLSETOR_THNSURAT'=>isset($exp_tglskp[2]) ?  substr($exp_tglskp[2], -2) : '',
					'TBLSETOR_NOMORSURAT'=>"",
					'TBLSETOR_TGLBATASSURAT'=>isset($exp_tglbatas[0]) ? $exp_tglbatas[0] : '',
					'TBLSETOR_BLNBATASSURAT'=>isset($exp_tglbatas[1]) ? $exp_tglbatas[1] : '',
					'TBLSETOR_THNBATASSURAT'=>isset($exp_tglbatas[2]) ?  substr($exp_tglbatas[2], -2) : '',
					'KDMED'=>"0",
					'KDREF'=>"0",
					'KDSET'=>"1",
					'TBLSETOR_STATUSBAYAR'=>"10",
					'TBLSETOR_JENISSETOR'=>"B",
								// 'TBLSETOR_TGLSETOR'=>isset($model['TBLANGSURAN_TGLSETOR']) ? $model['TBLANGSURAN_TGLSETOR'] : '',
								// 'TBLSETOR_BLNSETOR'=>isset($model['TBLANGSURAN_BULANSETOR']) ? $model['TBLANGSURAN_BULANSETOR'] : '',
								// 'TBLSETOR_THNSETOR'=>isset($model['TBLANGSURAN_TAHUNSETOR']) ? $model['TBLANGSURAN_TAHUNSETOR'] : '',
					'TBLSETOR_THNSETOR'=>isset($exp_tglentry[2]) ?  substr($exp_tglentry[2], -2) : '',
					'TBLSETOR_BLNSETOR'=>isset($exp_tglentry[1]) ? $exp_tglentry[1] : '',
					'TBLSETOR_TGLSETOR'=>isset($exp_tglentry[0]) ? $exp_tglentry[0] : '',
					'TBLSETOR_NOMORSSPD'=>$nosetoran,
								//belum tahu nyimpennya ke mana
					'TBLSETOR_THNSSPD'=>isset($exp_tglentry[2]) ?  substr($exp_tglentry[2], -2) : '',
					'TBLSETOR_BLNSSPD'=>isset($exp_tglentry[1]) ? $exp_tglentry[1] : '',
					'TBLSETOR_TGLSSPD'=>isset($exp_tglentry[0]) ? $exp_tglentry[0] : '',
								//end of belum tahu nyimpennya ke mana
					'JENSET'=>"",
					'NOCG'=>"",
					'NOREK'=>"",
					'BANK'=>"",
					'BANCB'=>"",
					'TGCGT'=>"0",
					'TGCAIR'=>"0",
					'LUNAS'=>"L",
					'TBLSETOR_JNSTAGIHAN'=>"A",
					'TBLSETOR_JNSREKLAME'=>"",
					'BLBU'=>"0",
					'BASTP'=>"0",
					'TBLSETOR_TGLTAGIHAN'=>"0",
					'TBLSETOR_BLNTAGIHAN'=>"0",
					'TBLSETOR_THNTAGIHAN'=>"0",
					'BAKB'=>"0",
					// 'TBLSETOR_RUPIAHPAJAK'=>LokalIndonesia::toAngka( $pokok ),
					// 'TBLSETOR_RUPIAHSETOR'=>LokalIndonesia::toAngka( $pokok ),
					// 'TBLSETOR_KETETAPANPAJAK'=>LokalIndonesia::toAngka( $pokok ),
					'TBLSETOR_RUPIAHPAJAK'=>LokalIndonesia::toAngka( $angsuran ), // harusnya angsurannya saja (tidak + bunga)
					'TBLSETOR_RUPIAHSETOR'=>LokalIndonesia::toAngka( $angsuran ), // harusnya angsurannya saja (tidak + bunga)
					'TBLSETOR_KETETAPANPAJAK'=>LokalIndonesia::toAngka( $angsuran ), // harusnya angsurannya saja (tidak + bunga)
					// 'TBLSETOR_RUPIAHSETOR'=>$pajaksetor,
					'RPRET'=>"0",
					// 'TBLSETOR_KETETAPANPAJAK'=>$pajaksetor,
					'TBLSETOR_RUPIAHTAGIHAN'=>"0",
					'TBLSETOR_PAJAKKURANGBAYAR'=>"0",
					'TBLSETOR_BUNGAKETETAPAN'=>LokalIndonesia::toAngka( $bunga ),
					'TBLSETOR_BUNGATAGIHAN'=>"0",
					'TBLSETOR_BUNGAKURANGBAYAR'=>"0",
					'BURET'=>"0",
					'TBLSETOR_DENDAKETETAPAN'=>LokalIndonesia::toAngka( $denda ),
					'TBLSETOR_DENDATAGIHAN'=>"0",
					'TBLSETOR_DENDAKURANGBAYAR'=>"0",
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
					'TBLSETOR_LOKET'=> substr( "BKP " . Yii::app()->user->nama_pengguna . '    ' . date('H:i:s'), 0, 24),
					'DUP'=>"0",
					'KET'=>"",
					);
				$insert = $command_insrt->insert('TBLSETOR', $arrayOfData);
				
				// echo $bunga	;die();
				if ($bunga>'0') {
				$arrayOfData['TBLSETOR_JNSBAYAR'] = 'BNG SK-A';
				$arrayOfData['TBLSETOR_RUPIAHSETOR'] = LokalIndonesia::toAngka( $bunga );
				$arrayOfData['TBLSETOR_BUNGAKETETAPAN'] = LokalIndonesia::toAngka( $bunga );
				$arrayOfData['TBLSETOR_DENDAKETETAPAN'] = '0';
						// $arrayOfData['RPSSKP'] = ;
				$arrayOfData['TBLSETOR_REKPAJAK'] = '4';
				$arrayOfData['TBLSETOR_REKAYAT'] = '6';
				$arrayOfData['TBLSETOR_REKJENIS'] = '1';
				$arrayOfData['TBLSETOR_REKSUBJENIS'] = '0';
				$arrayOfData['TBLSETOR_STATUSBAYAR'] = '10';
				$arrayOfData['TBLSETOR_LOKET'] = '';
				$arrayOfData['KDMED'] = '0'; 
				$arrayOfData['KDREF'] = '0'; 
				$arrayOfData['KDSET'] = '1'; 
				$arrayOfData['LUNAS'] = 'L'; 
				$arrayOfData['KET'] = '';
				$arrayOfData['JENSET'] = '';

				$setobunga = Yii::app()->db->createCommand()
				->insert('TBLSETOR', $arrayOfData);
				}
				// print_r($setobunga);

				if ($denda>'0') {
				$arrayOfData['TBLSETOR_JNSBAYAR'] = 'DND SK-A';
				$arrayOfData['TBLSETOR_RUPIAHSETOR'] = LokalIndonesia::toAngka( $denda );
				$arrayOfData['TBLSETOR_DENDAKETETAPAN'] = LokalIndonesia::toAngka( $denda );
				$arrayOfData['TBLSETOR_BUNGAKETETAPAN'] = '';
				$arrayOfData['TBLSETOR_REKPAJAK'] = '4';
				$arrayOfData['TBLSETOR_REKAYAT'] = '7';
				$arrayOfData['TBLSETOR_REKJENIS'] = '1';
				$arrayOfData['TBLSETOR_LOKET'] = '';
				$arrayOfData['KET'] = '';
				$arrayOfData['JENSET'] = '';

				$setodenda = Yii::app()->db->createCommand()
				->insert('TBLSETOR', $arrayOfData);
				}

	

				if ($insert) {
					echo CJSON::encode(array('pesan'=>'success'));
				}else{
					echo CJSON::encode(array('pesan'=>'failed', 'posisi'=>'insert ke bpd'));
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