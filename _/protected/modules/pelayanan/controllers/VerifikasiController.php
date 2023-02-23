<?php

class VerifikasiController extends Controller
{
	var $NAMATABEL_UTAMA = 'TNPWPD';
	public function init()
	{
		Yii::import('ext.DBFetch');
	}
	public function actionIndex()
	{
		// $data['list_combo'] = Model::model()->findAll();
		$select = 'count('.$this->NAMATABEL_UTAMA.'.TNPWPD_ID)';
		$from = $this->NAMATABEL_UTAMA;
		$otherquery = $this->param_grid();

		$data['total_data'] = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery, 'mode'=>'SCALAR'));

		$this->renderPartial('index', array('data' => $data ));
	}

	public function actiongetData()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$otherquery = $this->param_grid();
		$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
		$filter = array('EQ__TNPWPD.TNPWPD_ID'=>$id);
		$model = DBFetch::query( array('from'=>'TNPWPD','filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL') );
		header('Content-type: text/json');
		header('Content-type: application/json');
		$data = array();
		$hidden = array(
			'TNPWPD_TGLENTRY',
			'TNPWPD_TGLUPDATE',
			'TBLPENGGUNA_ID',
			'TNPWPD_HAPUS',
			'TNPWPD_TGLDAFTAR',
			'TNPWPD_TGLBATASKIRIM',
			'TNPWPD_BUALAMAT',
			// 'TNPWPD_BUMERK',
			'TBLMASTERREKENING_ID',
			'TNPWPD_ISAKTIF',
			'TSUBYEK_NAMAPENANGGUNGJAWAB',
			'TSUBYEK_NIK',
			'TSUBYEK_NIKPENANGGUNGJAWAB',
			'TSUBYEK_NODAFTAR',
			'TSUBYEK_NOHPPENANGGUNGJAWAB',
			'TSUBYEK_NPWP',
			'TSUBYEK_PASPORT',
			'TSUBYEK_STATUS',
			'TSUBYEK_TELPON',
			'TSUBYEK_TGLDAFTAR',
			'TSUBYEK_TGLSYSEDIT',
			'TSUBYEK_TGLSYSINSERT'
			); // daftar kolom yang ingin dihidden/tidak ditampilkan
	
		foreach ($model as $key => $value) {
			if( !in_array( $key, $hidden) ) {
				$data[$key] = $value;
			}
		}
		echo CJSON::encode($data);
	}

	public function actionDTJSON()
	{
		Yii::import('ext.DTPipeLine');

		$cari_tblobyek_ispengukuhan = !empty($_REQUEST['cari_tblobyek_ispengukuhan']) ? $_REQUEST['cari_tblobyek_ispengukuhan'] : 'F';
		//$cari_refkelompokdata_id = !empty($_REQUEST['cari_refkelompokdata_id']) ? $_REQUEST['cari_refkelompokdata_id'] : "";
		//$cari_refindikator_kode = !empty($_REQUEST['cari_refindikator_kode']) ? $_REQUEST['cari_refindikator_kode'] : "";
		
		$filter_AND = array();

		$filter_AND = array(
			'EQ__'.$this->NAMATABEL_UTAMA.'.TNPWPD_HAPUS'=>'F'
			,'EQ__'.$this->NAMATABEL_UTAMA.'.TNPWPD_ISKUKUH'=> $cari_tblobyek_ispengukuhan
			//,'EQ__'.$this->NAMATABEL_UTAMA.'.refkelompokdata_id'=>$cari_refkelompokdata_id
			//,'LK__'.$this->NAMATABEL_UTAMA.'.refindikator_kode'=>$cari_refindikator_kode
		);

		$select = $this->NAMATABEL_UTAMA.'.TNPWPD_ID,
		TNPWPD.TNPWPD_HAPUS,
		TNPWPD.TNPWPD_MILIKNAMA,
		TNPWPD.TNPWPD_NIK,
		TNPWPD.TNPWPD_MILIKALAMAT,
		TNPWPD.TNPWPD_NPWPD,
		TNPWPD.TNPWPD_ISKUKUH,
		TNPWPD.TNPWPD_ISAKTIF,
		TNPWPD.TNPWPD_NOKUKUH,
		TSUBYEK.TSUBYEK_ID,
		TSUBYEK.TSUBYEK_MILIKNAMA,
		TSUBYEK.TSUBYEK_BUNAMAMERK,
		TSUBYEK.TSUBYEK_NOFORMULIR,
		TBLKECAMATAN.TBLKECAMATAN_KODE,
		TBLKECAMATAN.TBLKECAMATAN_NAMA,
		TBLKELURAHAN.TBLKELURAHAN_KODE,
		TBLKELURAHAN.TBLKELURAHAN_NAMA,
		TREKENING.TREKENING_NAMA';
		$from = $this->NAMATABEL_UTAMA;
		$otherquery = $this->param_grid();
		$otherquery = array_merge(
			$otherquery
			, array(
				// ,'order' => 'tblpesan_tanggal DESC'
				// 'order' => DTPipeLine::getOrder()
				'limit' => DTPipeLine::getRows()
				,'offset' => DTPipeLine::getStart()
			)
		);
		$filter = array(
			'LK__TNPWPD.TNPWPD_MILIKNAMA' => DTPipeLine::getSearch()
			,'LK__TNPWPD.TNPWPD_NPWPD' => DTPipeLine::getSearch()
			,'LK__TNPWPD.TNPWPD_NOKUKUH' => DTPipeLine::getSearch()
		);

		$data = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true, 'mode'=>'LIST'));

		$results = array();
		$no = 1 + DTPipeLine::getStart(); // sesuaikan juga mulai offset ke berapa
		foreach ($data as $row) {
			$results[] = array_merge(
				array('num'=>$no++)
				, $row);
			// $results[] = $row;
		}

		$select = 'count('.$this->NAMATABEL_UTAMA.'.TNPWPD_ID)';
		$otherquery = $this->param_grid();
		$dataTotal = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery, 'mode'=>'SCALAR'));

		unset($otherquery['limit']); //remove limit untuk mengakali filtered record
		$data_filtered = DBFetch::query(array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'filter_AND'=>$filter_AND,'filterOR'=>true, 'mode'=>'SCALAR'));

		echo DTPipeLine::generateJSON(
			array(
				'useJSONHeader' => true
				,'COLUMN_AS_KEY' => true
				,'DATA_FETCHED' => $results
				,'TOTAL_RECORDS' => (int) $dataTotal
				// ,'TOTAL_FILTERED_RECORDS' => DTPipeLine::getSearch()=='' ? (int)$dataTotal : (int)count($results)
				,'TOTAL_FILTERED_RECORDS' => ( DTPipeLine::getSearch()=='' && !DBFetch::isFilterAND($filter_AND) ) ? (int)$dataTotal : (int)($data_filtered)
			)
		);
	}

	public function param_grid()
	{
		/* method ini untuk menentukan otherquery dari datatable pipeline*/
		return $otherquery = array(
			'leftjoin_kecamatan' => array('TBLKECAMATAN','TBLKECAMATAN.TBLKECAMATAN_KODE = TNPWPD.TNPWPD_MILIKKECID')
			,'leftjoin_kelurahan' => array('TBLKELURAHAN','TBLKELURAHAN.TBLKELURAHAN_KODE = TNPWPD.TNPWPD_MILIKKELID')
			,'join_subyek' => array('TSUBYEK',$this->NAMATABEL_UTAMA.'.TSUBYEK_ID = TSUBYEK.TSUBYEK_ID')
			,'join_jenisrekening' => array('TREKENING',$this->NAMATABEL_UTAMA.'.TREKENING_ID = TREKENING.TREKENING_ID')
			//,'order' => 'refskpd_kode IS NULL,refskpd_kode ASC, refkelompokdata_kode IS NULL, refkelompokdata_kode ASC, refindikator_kode ASC'
		);
	}

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim
		
		if($cmd=="edit") {
			$id = trim($_REQUEST['id']);
			$model = TNPWPD::model()->findByPk($id);
		}
		else {
			echo CJSON::encode(array('status'=>'InvalidCommand'));
			Yii::app()->end();
		}

		// $model->TNPWPD_TGLKUKUH = date('Y-m-d', strtotime( $_REQUEST['param']['TNPWPD_TGLKUKUH'] ) ) . ' ' . date('H:i:s');
		$model->TNPWPD_TGLKUKUH = strtotime($_REQUEST['param']['TNPWPD_TGLKUKUH']) ? new CDbExpression("TO_DATE('" . date('Y-m-d H:i:s', strtotime($_REQUEST['param']['TNPWPD_TGLKUKUH'])) . "',  'yyyy-mm-dd hh24:mi:ss') ") : new CDbExpression('NULL');
		$model->TNPWPD_TGLUPDATE = DMOrcl::getNow();
		$model->TNPWPD_NOKUKUH = filter_var( $_REQUEST['param']['TNPWPD_NOKUKUH'], FILTER_SANITIZE_SPECIAL_CHARS);
		$model->TBLPENGGUNA_ID = Yii::app()->user->getId();
		// $model->TNPWPD_TGLTERIMA = "";
		// $model->TNPWPD_TGLENTRY = "";
		// $model->TNPWPD_TGLUPDATE = "";
		// $model->TNPWPD_NPWPD = $this->generate_npwpd($model->TNPWPD_ID, $model->tblobyek_jenis, $model->tblobyek_golongan, $model->refkecamatan_id, $model->refkelurahan_id);
		$model->TNPWPD_ISKUKUH = "T";

		if ($model->save()) {
			echo CJSON::encode(array('status'=>'success','pk'=>$model->primaryKey,'npwpd'=>$model->TNPWPD_NPWPD,'msg'=>"Data berhasil disimpan"));
		}
		else {
			echo CJSON::encode(array('status'=>'failed','msg'=>"Data gagal disimpan"));
		}
	}

	function generate_npwpd($obyid,$jenis,$jenis_usaha, $kec, $kel) {
		// $sptpd = TNPWPD::model()->findByPk($obyid)->TNPWPD_NPWPD;
		$jenis = $jenis=='Pajak' ? "P" : "R";
		$jenis_usaha = $jenis_usaha=='Badan Usaha' ? '2' : '1';
		$angka = sprintf("%07d", $sptpd);
		// P.2.1818982
		$kec = ($kc = Kecamatan::model()->findByPk($kec)) ? $kc->refkecamatan_kode : "";
		$kel = ($kl = Kelurahan::model()->findByPk($kel)) ? $kl->refkelurahan_kode : "";
		return $jenis . '.' . $jenis_usaha . '.' . $angka . '.' . $kec. '.' . $kel;
	}

	function generate_nokukuh($obyid, $tahun) {
		$sptpd = TNPWPD::model()->findByPk($obyid)->TNPWPD_NPWPD;
		$char = "970/KUH/BPKAD";
		return $char . '/' . sprintf("%07d", $sptpd) . '/' . $tahun;
	}

	public function actiongenerateNOKUKUH()
	{
		$tgl = date('Y', strtotime($_REQUEST['tgl']) );
		$obyid = (int)($_REQUEST['obyid']);
		$nomor = $this->generate_nokukuh($obyid,$tgl);
		echo CJSON::encode(array('tgl'=>$tgl,'nomor'=>$nomor));
		// Yii::app()->end();
	}

	public function actioncetakformnpwpd()
	{
		$id = (Yii::app()->request->getParam('id'));
		$this->redirect(array('verifikasi/cetak/?id=' . $id));
	}

	public function actionCetak()
	{
		// error_reporting(0);
		// baca file template, yg dipakai
		// $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
		$path_tpl =  dirname(Yii::app()->basePath).'/file/temp_kukuh/';

		// 	$data['transaksiketetapan'] = DBFetch::query( array('from'=>$this->NAMATABEL_UTAMA,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL') );
		//update-bedatemplate
			// $namatpl = $path_tpl . 'SKPD-AIRTANAH.docx';
		//update-bedatemplate

		$template = $path_tpl . 'surat_pengukuhan.docx';
		
		// $idtrans = TNPWPD::model()->findByPk( base64_decode($_REQUEST['id']) );
		$idtrans = filter_var(base64_decode(Yii::app()->request->getParam('id')), FILTER_VALIDATE_INT) ;

		$select = 'TNPWPD.TNPWPD_ID,
			TNPWPD.TNPWPD_MILIKNAMA,
			TNPWPD.TNPWPD_NPWPD,
			TNPWPD.TNPWPD_NOFORMULIR,
			TNPWPD.TNPWPD_TGLKUKUH,
			TNPWPD.TNPWPD_NOKUKUH,
			TSUBYEK.TSUBYEK_BUNAMAMERK,
			TSUBYEK.TSUBYEK_BUALAMAT,
			TSUBYEK.TBLKELURAHAN_ID,
			TSUBYEK.TBLKECAMATAN_ID,
			TNPWPD.TSUBYEK_ID,
			TNPWPD.TNPWPD_NIK,
			TNPWPD.TNPWPD_NPWP,
			TNPWPD.TNPWPD_MILIKJAB,
			TNPWPD.TNPWPD_MILIKALAMAT,
			TNPWPD.TNPWPD_MILIKJALAN,
			TNPWPD.TNPWPD_MILIKRTRWRK,
			TNPWPD.TNPWPD_MILIKKEL,
			TNPWPD.TNPWPD_MILIKKEC,
			TNPWPD.TNPWPD_MILIKPROVID,
			TNPWPD.TNPWPD_MILIKKABID,
			TNPWPD.TNPWPD_MILIKKECID,
			TNPWPD.TNPWPD_MILIKKELID,
			TNPWPD.TNPWPD_MILIKTELP,
			TNPWPD.TNPWPD_MILIKHP,
			TNPWPD.TNPWPD_MILIKHP2,
			TNPWPD.TNPWPD_MILIKKODEPOS,
			TNPWPD.TREKENING_ID,
			TNPWPD.TREKENING_KODE,
			TNPWPD.TREKENINGSUB_ID,
			TNPWPD.TREKENINGSUB_KODE,
			TNPWPD.TNPWPD_JNSPENDAPATAN,
			TNPWPD.TNPWPD_GOL,
			TNPWPD.TNPWPD_NOPOK,
			TNPWPD.TNPWPD_KEC,
			TNPWPD.TNPWPD_KEL,
			TNPWPD.TNPWPD_TGLDAFTAR,
			TNPWPD.TNPWPD_NAMAJELAS,
			TNPWPD.TNPWPD_TGLTERIMA,
			TNPWPD.TNPWPD_NAMATERIMA,
			TNPWPD.TNPWPD_NIPTERIMA,
			TNPWPD.TNPWPD_ESTIMASI,
			TNPWPD.TNPWPD_KET,
			TNPWPD.TNPWPD_TGLCATAT,
			TNPWPD.TNPWPD_NAMACATAT,
			TNPWPD.TNPWPD_NIPCATAT,
			TNPWPD.TBLPENGGUNA_ID,
			TNPWPD.TNPWPD_TGLENTRY,
			TNPWPD.TNPWPD_TGLUPDATE,
			TNPWPD.TNPWPD_ISKUKUH,
			TNPWPD.TNPWPD_HAPUS,
			TNPWPD.TNPWPD_ISAKTIF,
			TSUBYEK.TSUBYEK_ID,
			TSUBYEK.REFJENISWP_ID,
			TSUBYEK.TSUBYEK_BUNIK,
			TSUBYEK.TSUBYEK_BUNPWP,
			TSUBYEK.TSUBYEK_BUJALAN,
			TSUBYEK.TSUBYEK_BURTRWRK,
			TSUBYEK.TBLPROVINSI_ID,
			TSUBYEK.TBLKABUPATEN_ID,
			TSUBYEK.REFKELURAHAN_ID,
			TSUBYEK.REFKECAMATAN_ID,
			TSUBYEK.TSUBYEK_BUKODEPOS,
			TSUBYEK.TSUBYEK_BUTELP,
			TSUBYEK.TSUBYEK_BUTELP2,
			TSUBYEK.TSUBYEK_BUHP,
			TSUBYEK.TSUBYEK_BUNOAKTA,
			TSUBYEK.TSUBYEK_BUAKTANO,
			TSUBYEK.TSUBYEK_BUAKTATGL,
			TSUBYEK.TSUBYEK_BUHONO,
			TSUBYEK.TSUBYEK_BUHOTGL,
			TSUBYEK.TSUBYEK_BUPARIWISATANO,
			TSUBYEK.TSUBYEK_BUPARIWISATATGL,
			TSUBYEK.TSUBYEK_BULAIN1NO,
			TSUBYEK.TSUBYEK_BULAIN1TGL,
			TSUBYEK.TSUBYEK_BULAIN2NO,
			TSUBYEK.TSUBYEK_BULAIN2TGL,
			TSUBYEK.TBIDANGUSAHA_ID,
			TSUBYEK.TBIDANGUSAHA_LAIN,
			TSUBYEK.TSUBYEK_MILIKNAMA,
			TSUBYEK.TSUBYEK_MILIKNIK,
			TSUBYEK.TSUBYEK_MILIKNPWP,
			TSUBYEK.TSUBYEK_MILIKJAB,
			TSUBYEK.TSUBYEK_MILIKALAMAT,
			TSUBYEK.TSUBYEK_MILIKJALAN,
			TSUBYEK.TSUBYEK_MILIKRTRWRK,
			TSUBYEK.TSUBYEK_MILIKKEL,
			TSUBYEK.TSUBYEK_MILIKKEC,
			TSUBYEK.TSUBYEK_MILIKPROVID,
			TSUBYEK.TSUBYEK_MILIKKABID,
			TSUBYEK.TSUBYEK_MILIKKECID,
			TSUBYEK.TSUBYEK_MILIKKELID,
			TSUBYEK.TSUBYEK_MILIKTELP,
			TSUBYEK.TSUBYEK_MILIKHP,
			TSUBYEK.TSUBYEK_MILIKHP2,
			TSUBYEK.TSUBYEK_MILIKKODEPOS,
			TSUBYEK.TSUBYEK_TGLDAFTAR,
			TSUBYEK.TSUBYEK_NOFORMULIR,
			TSUBYEK.TBLPENGGUNA_ID,
			TSUBYEK.TSUBYEK_TGLENTRY,
			TSUBYEK.TSUBYEK_TGLUPDATE,
			TSUBYEK.TSUBYEK_NOKUKUH,
			TSUBYEK.TSUBYEK_HAPUS,
			TSUBYEK.TSUBYEK_ISAKTIF';
		$from = $this->NAMATABEL_UTAMA;
		$filter = array(
			'EQ__TNPWPD_ID'=>$idtrans
		);
		$otherquery = array(
			'leftjoin_TSUBYEK'=>array('TSUBYEK','TNPWPD.TSUBYEK_ID='.$this->NAMATABEL_UTAMA.'.TSUBYEK_ID')
		);

		$data['tnpwpd'] = DBFetch::query( array('from'=>$this->NAMATABEL_UTAMA,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL') );

		Yii::import('ext.DMOpenTBS',true);
		Yii::import('ext.LokalIndonesia');
		DMOpenTBS::init();
		$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
		$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		// $template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

		// Delete a sheet 
		// $otbs->PlugIn(OPENTBS_DELETE_SHEETS, 'Delete me'); 


		// Display a sheet (make it visible) 
		// $otbs->PlugIn(OPENTBS_DISPLAY_SHEETS, 'Display me'); 

		// Change the current sheet 
		// $otbs->PlugIn(OPENTBS_SELECT_SHEET, 2); 

		// A recordset for merging tables

		//INI CODING QUERY CETAK WORD

		// $cmdjb = filter_var(base64_decode(Yii::app()->request->getParam('jb')), FILTER_SANITIZE_SPECIAL_CHARS);

		// $row = array();

		$sub = array();
		$obyek = array();
		$obyek['npwpd'] = $data['tnpwpd']['TNPWPD_NPWPD'];
		$obyek['no_formulir'] = $data['tnpwpd']['TNPWPD_NOFORMULIR'];
		$obyek['tglentry'] = $data['tnpwpd']['TNPWPD_TGLENTRY'];
		$obyek['milik_nama'] = $data['tnpwpd']['TNPWPD_MILIKNAMA'];
		$obyek['milik_alamat'] = $data['tnpwpd']['TNPWPD_MILIKALAMAT'];
		$obyek['milik_kel'] = $data['tnpwpd']['TNPWPD_MILIKKEL'];
		$obyek['milik_kec'] = $data['tnpwpd']['TNPWPD_MILIKKEC']; 
		$obyek['bu_namamerk'] = $data['tnpwpd']['TSUBYEK_BUNAMAMERK'];
		$obyek['bu_alamat'] = $data['tnpwpd']['TSUBYEK_BUALAMAT'];
		$obyek['rekening'] = $data['tnpwpd']['TREKENING_ID'];
		$obyek['tgl_kukuh'] = $data['tnpwpd']['TNPWPD_TGLKUKUH'];

		//SAMPAI SINI QUERYNYA

		// var_dump($obyek);

		// Merge data in the first sheet 
		// $npwpd = $data['transaksiketetapan']['tblobyek_npwpd'];
		$namafileDL = "Surat_Pengukuhan_".$obyek['TNPWPD_NOKUKUH'].".docx";
		$otbs->MergeField('obyek', $obyek); 
		// $otbs->MergeField('setoran', $setoran); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
		
	}

	public function actionCetakKartu()
	{
		header ('Content-type: image/png');
		$path = dirname( Yii::app()->getBasePath() ).'/file/temp_kartu/';

		$NPWPD = isset($_REQUEST['NPWPD']) ? base64_decode( $_REQUEST['param']['TNPWPD_NPWPD'] ) :"";
		$NAMAWP = isset($_REQUEST['NAMAWP']) ? base64_decode( $_REQUEST['NAMAWP'] ) :"";
		$ALAMATWP = ucwords( strtolower( isset($_REQUEST['ALAMATWP']) ? base64_decode( $_REQUEST['ALAMATWP'] ) :"" ) );
		$TGLTAP = ucwords( strtolower( isset($_REQUEST['TGLTAP']) ? ( strtotime(base64_decode( $_REQUEST['TGLTAP'] )) ? LokalIndonesia::TanggalUmum(base64_decode( $_REQUEST['TGLTAP'] )) : "" ) :"" ) );
		$JENISPAJAK = isset($_REQUEST['JENISPAJAK']) ? base64_decode( $_REQUEST['JENISPAJAK'] ) :"";

		$ALAMATWP_1 = $ALAMATWP;
		$ALAMATWP_2 = '';
		if (strlen($ALAMATWP)>43) {
			$ALAMATWP_1 = substr($ALAMATWP, 0, 43);
			$ALAMATWP_2 = substr($ALAMATWP, 43, strlen($ALAMATWP));
		}

		$kartu_bg = @imagecreatefrompng($path."bg.png"); 

		// echo file_exists($path.'gm.ttf') ? 'ya' : 'no';	
		// imagettftext( $kartu_bg, $ukuran, 0, 30, 60, imagecolorallocate ($kartu_bg, 0, 0, 0),
		imagettftext( $kartu_bg, 30, 0, 350, 240, imagecolorallocate ($kartu_bg, 0, 0, 0), $path.'font.ttf', $NPWPD );
		imagettftext( $kartu_bg, 25, 0, 350, 310, imagecolorallocate ($kartu_bg, 0, 0, 0), $path.'font.ttf', $NAMAWP );
		imagettftext( $kartu_bg, 20, 0, 350, 390, imagecolorallocate ($kartu_bg, 0, 0, 0), $path.'font.ttf', $ALAMATWP_1 );
		imagettftext( $kartu_bg, 20, 0, 350, 435, imagecolorallocate ($kartu_bg, 0, 0, 0), $path.'font.ttf', $ALAMATWP_2 );
		imagettftext( $kartu_bg, 14, 0, 830, 465, imagecolorallocate ($kartu_bg, 0, 0, 0), $path.'arial-bold.ttf', $TGLTAP );
		imagettftext( $kartu_bg, 25, 0, 350, 465, imagecolorallocate ($kartu_bg, 0, 0, 0), $path.'font.ttf', $JENISPAJAK );

		imagepng($kartu_bg, NULL, 0);
		imagedestroy($kartu_bg);
	}

	public function actionCetak_Kartu()
	{
		$data = array();
		$this->renderPartial('kartu', array('data'=>$data));
	}
}