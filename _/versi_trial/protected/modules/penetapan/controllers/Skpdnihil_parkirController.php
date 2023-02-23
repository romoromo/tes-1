<?php

class Skpdnihil_parkirController extends Controller
{
	var $KODE_GOL = 2;
	var $PAJAK_AYAT = 7;
	var $PAJAK_REK = '4.1.1.7.0';

	public $namatabel = 'TBLDAFTPARKIR';
	
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['sub_rek'] = TRekening::model()->getRekeningSubAktif('4110700');

		$data['rek'] = Yii::app()->db->createCommand("
		SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.7.%'
		ORDER BY TBLREKENING_KODE
		")
		->queryAll();

		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionautocomplete()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');
		
		$query = trim($_REQUEST['query']);

		$select = "TBLDAFTPARKIR.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT";
		$from = 'TBLDAFTPARKIR';
		$filter = array(
			'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA' => $query
			,'LK__TBLDAFTAR.TBLDAFTAR_NOPOK' => $query
		);

		$filter_AND = array(
			//'EQ__TREKENING_KODE' => '4110100'
			// ,'EQ__tblsubyek_jenisusaha' => $jenisusaha
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('TBLDAFTAR', "TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTPARKIR.TBLDAFTAR_NOPOK")
			,'order'=> "TBLDAFTPARKIR.TBLDAFTAR_NOPOK ASC"
			,'group'=> "TBLDAFTPARKIR.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT"
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$results = DBFetch::query($arrayConfig);

		$suggestions = array();
		 
		foreach($results as $result)
		{
			$suggestions[] = array(
			"value" => $result['TBLDAFTAR_NOPOK']. ' | ' . $result['TBLDAFTAR_BADANUSAHANAMA']
			,"data" => $result['TBLDAFTAR_NOPOK']
			,"TBLDAFTAR_BADANUSAHANAMA" => $result['TBLDAFTAR_BADANUSAHANAMA']
			,"TBLDAFTAR_BADANUSAHAALAMAT" => $result['TBLDAFTAR_BADANUSAHAALAMAT']
			,"TBLDAFTAR_NOPOK" => $result['TBLDAFTAR_NOPOK']
			);
		}
 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function actionGetNoSKPDNihil()
	{
		$tahun = $_REQUEST['tahun'];
		$splthn = substr($tahun, -2);

		$data = Yii::app()->db->createCommand("SELECT
			MAX(TO_NUMBER (TO_CHAR(NVL(TBLDAFTPARKIR_REGNIHIL, 0))))+1 AS nolb
		FROM
			TBLDAFTPARKIR
		WHERE
			TBLPENDATAAN_THNPAJAK = ".$splthn."
		AND NVL (TBLDAFTPARKIR_REGNIHIL, 0) <> 0
		ORDER BY
			TO_NUMBER (TO_CHAR(NVL(nolb, 0))) DESC")->queryRow();

		echo CJSON::encode($data);
	}

	public function actiongetdata()
	{
		$TBLDAFTAR_NOPOK = trim($_POST['TBLDAFTAR_NOPOK']);
		$bulan_akhir = trim($_POST['bulan_akhir']);
		$tahun = trim($_POST['tahun']);
		$tahun_substr = substr($tahun, 2,4);
		$proses = $this->cekProses($tahun_substr, $bulan_akhir, $TBLDAFTAR_NOPOK); //cek SPT
		$cek = $this->cekPernahDaftar($tahun_substr, $bulan_akhir, $TBLDAFTAR_NOPOK); // cek sudah ada nihil
		$cekbayar = $this->cekBayar($tahun_substr, $bulan_akhir, $TBLDAFTAR_NOPOK);

		if ($proses == '') {
			$data['data'] = 'belum terdaftar';
		} else if ($cekbayar == '') {
			$data['data'] = 'belum bayar';
			
		} else if ($cek>0){

			$data['data'] = 'sudah entri';
		
		$select = "
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		REFBADANUSAHA.REKENING_KODE,
		REFBADANUSAHA.REFBADANUSAHA_REKPENDAPATAN,
		REFBADANUSAHA.REFBADANUSAHA_REKPAD,
		REFBADANUSAHA.REFBADANUSAHA_REKPJK,
		REFBADANUSAHA.REFBADANUSAHA_REKAYAT,
		REFBADANUSAHA.REFBADANUSAHA_REKJENIS,
		REFBADANUSAHA.REFBADANUSAHA_PERSEN,
		NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_PAJAKPERIKSA, 0) AS TBLDAFTPARKIR_PAJAKPERIKSA,
		NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_NOMORPERIKSA, 0) AS TBLDAFTPARKIR_NOMORPERIKSA,
		NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_REGNIHIL, 0) AS TBLDAFTPARKIR_REGNIHIL,
		NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_TGLPERIKSA,0) AS TBLDAFTPARKIR_TGLPERIKSA,
		NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_BLNPERIKSA,0) AS TBLDAFTPARKIR_BLNPERIKSA,
		NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_THNPERIKSA,0) AS TBLDAFTPARKIR_THNPERIKSA,
		NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_RUPIAHPERIKSA,0) AS TBLDAFTPARKIR_RUPIAHPERIKSA,
		NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_TANGGLNIHIL,0) AS TBLDAFTPARKIR_TANGGLNIHIL,
		NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_BULANNIHIL,0) AS TBLDAFTPARKIR_BULANNIHIL,
		NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_TAHUNNIHIL,0) AS TBLDAFTPARKIR_TAHUNNIHIL 
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,"EQ__TBLDAFTPARKIR.TBLPENDATAAN_THNPAJAK" => $tahun_substr
			,"EQ__TBLDAFTPARKIR.TBLPENDATAAN_BLNPAJAK" => $bulan_akhir
		);

		$otherquery = array(
			'limit'=> 30
			,'andwhere'=> 'NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_REGNIHIL, 0) <> 0'
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'join_2'=> array('TBLDAFTPARKIR', "TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTPARKIR.TBLDAFTAR_NOPOK")
			,'order'=> 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC'
		);
		$model = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL') );

		$data['TBLDAFTAR_BADANUSAHANAMA'] =$model['TBLDAFTAR_BADANUSAHANAMA'];
		$data['TBLDAFTAR_BADANUSAHAALAMAT'] =$model['TBLDAFTAR_BADANUSAHAALAMAT'];
		$data['REKENING_KODE'] =$model['REKENING_KODE'];
		$data['TREKENING_TARIF'] =$model['REFBADANUSAHA_PERSEN'];
		
		$data['REFBADANUSAHA_REKPENDAPATAN'] =$model['REFBADANUSAHA_REKPENDAPATAN'];
		$data['REFBADANUSAHA_REKPAD'] =$model['REFBADANUSAHA_REKPAD'];
		$data['REFBADANUSAHA_REKPJK'] =$model['REFBADANUSAHA_REKPJK'];
		$data['REFBADANUSAHA_REKAYAT'] =$model['REFBADANUSAHA_REKAYAT'];
		$data['REFBADANUSAHA_REKJENIS'] =$model['REFBADANUSAHA_REKJENIS'];

		$data['TBLDAFTPARKIR_PAJAKPERIKSA'] = $model['TBLDAFTPARKIR_PAJAKPERIKSA'];
		$data['TBLDAFTPARKIR_NOMORPERIKSA'] = $model['TBLDAFTPARKIR_NOMORPERIKSA'];
		$data['TBLDAFTPARKIR_RUPIAHPERIKSA'] = $model['TBLDAFTPARKIR_RUPIAHPERIKSA'];
		$data['TBLDAFTPARKIR_REGNIHIL'] = $model['TBLDAFTPARKIR_REGNIHIL'];

		$data['TBLDAFTPARKIR_TGLPERIKSA'] = sprintf('%02d',$model['TBLDAFTPARKIR_TGLPERIKSA']); 
		$data['TBLDAFTPARKIR_BLNPERIKSA'] = sprintf('%02d',$model['TBLDAFTPARKIR_BLNPERIKSA']); 
		$data['TBLDAFTPARKIR_THNPERIKSA'] = $model['TBLDAFTPARKIR_THNPERIKSA'];

		$data['TBLDAFTPARKIR_TANGGLNIHIL'] = sprintf('%02d',$model['TBLDAFTPARKIR_TANGGLNIHIL']); 
		$data['TBLDAFTPARKIR_BULANNIHIL'] = sprintf('%02d',$model['TBLDAFTPARKIR_BULANNIHIL']); 
		$data['TBLDAFTPARKIR_TAHUNNIHIL'] = $model['TBLDAFTPARKIR_TAHUNNIHIL']; 
		
		} else {

		$data['data'] = 'sudah terdaftar';
		
		$select = "
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		REFBADANUSAHA.REKENING_KODE,
		REFBADANUSAHA.REFBADANUSAHA_REKPENDAPATAN,
		REFBADANUSAHA.REFBADANUSAHA_REKPAD,
		REFBADANUSAHA.REFBADANUSAHA_REKPJK,
		REFBADANUSAHA.REFBADANUSAHA_REKAYAT,
		REFBADANUSAHA.REFBADANUSAHA_REKJENIS,
		REFBADANUSAHA.REFBADANUSAHA_PERSEN,
		NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_PAJAKPERIKSA, 0) AS TBLDAFTPARKIR_PAJAKPERIKSA,
		NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_NOMORPERIKSA, 0) AS TBLDAFTPARKIR_NOMORPERIKSA,
		NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_REGNIHIL, 0) AS TBLDAFTPARKIR_REGNIHIL,
		NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_TGLPERIKSA,0) AS TBLDAFTPARKIR_TGLPERIKSA,
		NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_BLNPERIKSA,0) AS TBLDAFTPARKIR_BLNPERIKSA,
		NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_THNPERIKSA,0) AS TBLDAFTPARKIR_THNPERIKSA
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,"EQ__TBLDAFTPARKIR.TBLPENDATAAN_THNPAJAK" => $tahun_substr
			,"EQ__TBLDAFTPARKIR.TBLPENDATAAN_BLNPAJAK" => $bulan_akhir
			// ,"EQ__TBLDAFTPARKIR.TBLDAFTPARKIR_BLNKBAKHIR" => $bulan_akhir
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'join_2'=> array('TBLDAFTPARKIR', "TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTPARKIR.TBLDAFTAR_NOPOK")
			,'order'=> 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC'
		);
		$model = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL') );

		$data['TBLDAFTAR_BADANUSAHANAMA'] =$model['TBLDAFTAR_BADANUSAHANAMA'];
		$data['TBLDAFTAR_BADANUSAHAALAMAT'] =$model['TBLDAFTAR_BADANUSAHAALAMAT'];
		$data['REKENING_KODE'] =$model['REKENING_KODE'];
		$data['TREKENING_TARIF'] =$model['REFBADANUSAHA_PERSEN'];
		
		$data['REFBADANUSAHA_REKPENDAPATAN'] =$model['REFBADANUSAHA_REKPENDAPATAN'];
		$data['REFBADANUSAHA_REKPAD'] =$model['REFBADANUSAHA_REKPAD'];
		$data['REFBADANUSAHA_REKPJK'] =$model['REFBADANUSAHA_REKPJK'];
		$data['REFBADANUSAHA_REKAYAT'] =$model['REFBADANUSAHA_REKAYAT'];
		$data['REFBADANUSAHA_REKJENIS'] =$model['REFBADANUSAHA_REKJENIS'];

		$data['TBLDAFTPARKIR_PAJAKPERIKSA'] = $model['TBLDAFTPARKIR_PAJAKPERIKSA'];
		$data['TBLDAFTPARKIR_NOMORPERIKSA'] = $model['TBLDAFTPARKIR_NOMORPERIKSA'];

		$data['TBLDAFTPARKIR_TGLPERIKSA'] = sprintf('%02d',$model['TBLDAFTPARKIR_TGLPERIKSA']); 
		$data['TBLDAFTPARKIR_BLNPERIKSA'] = sprintf('%02d',$model['TBLDAFTPARKIR_BLNPERIKSA']); 
		$data['TBLDAFTPARKIR_THNPERIKSA'] = $model['TBLDAFTPARKIR_THNPERIKSA'];

		// $data['TBLDAFTPARKIR_TGLPERIKSA'] = sprintf('%02d',$model['TBLDAFTPARKIR_TGLPERIKSA']); 
		// $data['TBLDAFTPARKIR_BLNPERIKSA'] = sprintf('%02d',$model['TBLDAFTPARKIR_BLNPERIKSA']); 
		// $data['TBLDAFTPARKIR_THNPERIKSA'] = $model['TBLDAFTPARKIR_THNPERIKSA'];

		}

		echo CJSON::encode($data);
	}

	public function actionCetakWord()
	{
		// error_reporting(0);

		// baca file template, yg dipakai
		// $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
		
		// echo "$query";
		
		// $data['list_kartudata'] = Yii::app()->db->createCommand($query)->queryAll();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_skpdkb' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'skpdnihil.docx';

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

		//INI CODING QUERY CETAK WORD

		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
		$THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2,4);
		$TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];

        $select = "
        TBLDAFTPARKIR.*,
        NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_RUPIAHPERIKSA, 0) AS TBLDAFTPARKIR_RUPIAHPERIKSA, 
        NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_BLNKBAWAL, 0) AS TBLDAFTPARKIR_BLNKBAWAL, 
        NVL(TBLDAFTPARKIR.TBLDAFTPARKIR_BLNKBAKHIR, 0) AS TBLDAFTPARKIR_BLNKBAKHIR, 
        TBLDAFTAR.*, (
		SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
			TBLREKENING
		WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTPARKIR.TBLDAFTPARKIR_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTPARKIR.TBLDAFTPARKIR_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTPARKIR.TBLDAFTPARKIR_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTPARKIR.TBLDAFTPARKIR_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTPARKIR.TBLDAFTPARKIR_REKJENIS
		) AS NMREK,
		(
			SELECT
			TBLREKENING.TBLREKENING_KODEFULL
			FROM
			TBLREKENING
			WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTPARKIR.TBLDAFTPARKIR_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTPARKIR.TBLDAFTPARKIR_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTPARKIR.TBLDAFTPARKIR_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTPARKIR.TBLDAFTPARKIR_REKAYAT
			AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTPARKIR.TBLDAFTPARKIR_REKJENIS
			) AS TBLREKENING_KODEFULL,
		(
			SELECT
				REFKECAMATAN.REFKECAMATAN_NAMA
			FROM
				REFKECAMATAN
			WHERE
				REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		) AS bnmkec,
		(
			SELECT
				REFKELURAHAN.REFKELURAHAN_NAMA
			FROM
				REFKELURAHAN
			WHERE
				REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
			AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_KODE
		) AS bnmkel,
		(
			SELECT
				REFKECAMATAN.REFKECAMATAN_NAMA
			FROM
				REFKECAMATAN
			WHERE
				REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDPEMILIK
		) AS pnmkec,
		(
			SELECT
				REFKELURAHAN.REFKELURAHAN_NAMA
			FROM
				REFKELURAHAN
			WHERE
				REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDPEMILIK
			AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDPEMILIK
		) AS pnmkel";
        $from = 'TBLDAFTPARKIR';

        $otherquery = array(
             'leftjoin_daftar'=>array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTPARKIR.TBLDAFTAR_NOPOK')
        );

        $filter = array(
            'EQ__TBLDAFTPARKIR.TBLDAFTAR_NOPOK' => $NOPOK
			,'EQ__TBLDAFTPARKIR.TBLPENDATAAN_THNPAJAK' => $THNPJK
			,'EQ__TBLDAFTPARKIR.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
        );

         $otherquery['andwhere'] = '
	        NVL(TBLDAFTPARKIR.TBLPENDATAAN_TGLPAJAK, 0)= 0';

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);

        $sql2="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 6";
        $data['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();

		$dt = array();

		$dt['nopok'] = $data['cetak']['TBLDAFTAR_NOPOK'];
		$dt['jabatan'] = $data['jab2']['TBLPEJABAT_URAIAN'];
		$dt['petugas'] = $data['jab2']['TBLPEJABAT_NAMA'];
		$dt['nip'] = $data['jab2']['TBLPEJABAT_NIP'];

		$dt['thnkb'] = '20'.$data['cetak']['TBLDAFTPARKIR_TAHUNNIHIL'];
		$dt['blnawal'] = LokalIndonesia::getbulan($data['cetak']['TBLDAFTPARKIR_BLNKBAWAL']);
		$dt['blnakhir'] = LokalIndonesia::getbulan($data['cetak']['TBLDAFTPARKIR_BLNKBAKHIR']);
		$dt['regkb'] = $data['cetak']['TBLDAFTPARKIR_REGNIHIL'];

		$dt['namabadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHANAMA'];
		$dt['namapemilik'] = $data['cetak']['TBLDAFTAR_PEMILIKNAMA'];
		$dt['alamatbadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHAALAMAT'];
		$dt['alamatpemilik'] = $data['cetak']['TBLDAFTAR_PEMILIKALAMAT'];

		$dt['kodefull'] = $data['cetak']['TBLREKENING_KODEFULL'];

		$dt['namarek'] = $data['cetak']['NMREK'];

		$dt['namarek'] = $data['cetak']['NMREK'];

		// $dt['jatuhtempo'] = $data['cetak']['TBLDAFTPARKIR_TGLBTSKRGBAYAR'] .'/'. $data['cetak']['TBLDAFTPARKIR_BLNBTSKRGBAYAR'] .'/20'.$data['cetak']['TBLDAFTPARKIR_THNBTSKRGBAYAR'];

		$dt['pajakperiksa'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTPARKIR_RUPIAHPERIKSA']);

		$dt['thnpajak'] = '20'.$data['cetak']['TBLPENDATAAN_THNPAJAK'];

		$dt['npwpd'] = $data['cetak']['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $data['cetak']['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d",$data['cetak']['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$data['cetak']['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$data['cetak']['TBLKELURAHAN_IDBADANUSAHA']);

		// $dt['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
		$dt['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');
		
		//SAMPAI SINI QUERYNYA

		// var_dump($data);
		// echo json_encode($data['cetak']);Yii::app()->end();
		// echo json_encode($row);

		// Merge data in the first sheet 
		$npwpd = $data['cetak']['TBLDAFTAR_NOPOK'];
		$namafileDL = "SKPDNIHIL-PARKIR-".$npwpd.".docx";
		$otbs->MergeField('dt', $dt); 
		// $otbs->MergeField('setoran', $setoran); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}

	public function cekProses($tahun, $bulan, $TBLDAFTAR_NOPOK)
	{
		$model = Yii::app()->db->createCommand("SELECT TBLPENDATAAN_THNPAJAK FROM $this->namatabel WHERE TBLPENDATAAN_THNPAJAK ='$tahun' AND TBLPENDATAAN_BLNPAJAK='$bulan' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)=0 AND TBLDAFTAR_NOPOK=".$TBLDAFTAR_NOPOK)->queryScalar();
		return $model;
	}

	public function cekPernahDaftar($thn, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand("SELECT NVL(TBLDAFTPARKIR_REGNIHIL,0) FROM $this->namatabel WHERE TBLPENDATAAN_THNPAJAK ='$thn' AND TBLPENDATAAN_BLNPAJAK='$bulan' AND TBLDAFTAR_NOPOK='$nopok' AND NVL(TBLDAFTPARKIR_NOMORPERIKSA, 0) <> 0")->queryScalar();
		return $model;
	}

	public function cekBayar($thn, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand("SELECT TBLSETOR_NOMORSSPD FROM TBLSETOR WHERE TBLPENDATAAN_THNPAJAK ='$thn' AND TBLPENDATAAN_BLNPAJAK='$bulan' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)=0 AND TBLDAFTAR_NOPOK='$nopok' AND TRIM(TBLSETOR_JNSBAYAR) = 'SPTPD'")->queryScalar();
		return $model;
	}

	public function actionSimpanSKPDNParkir()
	{
		Yii::import('ext.LokalIndonesia');

		$PARAM = $_REQUEST;
		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];

		$THNPJK = (int)substr($TBLPENDATAAN_THNPAJAK, 2,4);

		$TBLPENDATAAN_BLNPAJAK = (int)!empty($_REQUEST['TBLDAFTPARKIR_BLNKBAKHIR']) ? $_REQUEST['TBLDAFTPARKIR_BLNKBAKHIR'] : 0;

		$TBLDAFTPARKIR_TANGGLNIHIL = !empty($_REQUEST["TBLDAFTPARKIR_TANGGLNIHIL"]) ? $_REQUEST["TBLDAFTPARKIR_TANGGLNIHIL"] : '';

		$TBLDAFTPARKIR_TGLPERIKSA = !empty($_REQUEST["TBLDAFTPARKIR_TGLPERIKSA"]) ? $_REQUEST["TBLDAFTPARKIR_TGLPERIKSA"] : '';

		if ($TBLDAFTPARKIR_TANGGLNIHIL !='') {
			$exp_TGLTERIMADAFTAR = explode('-', $TBLDAFTPARKIR_TANGGLNIHIL);
			$pecahtgldaftar = $exp_TGLTERIMADAFTAR[0];
			$pecahbulandaftar = $exp_TGLTERIMADAFTAR[1];
			$pecahthndaftar = substr($exp_TGLTERIMADAFTAR[2], -2);	
		} else {
			$pecahtgldaftar = '';
			$pecahbulandaftar = '';
			$pecahthndaftar = '';
		}

		

		if ($TBLDAFTPARKIR_TGLPERIKSA !='') {
			$exp_TGLPERIKSA = explode('-', $TBLDAFTPARKIR_TGLPERIKSA);
			$pecahtglperiksa = $exp_TGLPERIKSA[0];
			$pecahbulanperiksa = $exp_TGLPERIKSA[1];
			$pecahthnperiksa = substr($exp_TGLPERIKSA[2], -2);
		} else {
			$pecahtglperiksa = '';
			$pecahbulanperiksa = '';
			$pecahthnperiksa = '';
		}


		$command = Yii::app()->db->createCommand();
		$column = array(

			"TBLDAFTPARKIR_REGNIHIL" => LokalIndonesia::toAngka($PARAM["TBLDAFTPARKIR_REGNIHIL"]),

			"TBLDAFTPARKIR_TANGGLNIHIL" => $pecahtgldaftar,
			"TBLDAFTPARKIR_BULANNIHIL" => $pecahbulandaftar,
			"TBLDAFTPARKIR_TAHUNNIHIL" => $pecahthndaftar,

			"TBLDAFTPARKIR_NOMORPERIKSA" => $PARAM["TBLDAFTPARKIR_NOMORPERIKSA"],
			"TBLDAFTPARKIR_PAJAKPERIKSA" => LokalIndonesia::toAngka($PARAM["TBLDAFTPARKIR_PAJAKPERIKSA"]),
			"TBLDAFTPARKIR_RUPIAHPERIKSA" => LokalIndonesia::toAngka($PARAM["TBLDAFTPARKIR_RUPIAHPERIKSA"]),
			"TBLDAFTPARKIR_BLNKBAWAL" => $PARAM["TBLDAFTPARKIR_BLNKBAWAL"],
			"TBLDAFTPARKIR_BLNKBAKHIR" => $PARAM["TBLDAFTPARKIR_BLNKBAKHIR"],
			"TBLDAFTPARKIR_TGLPERIKSA" => $pecahtglperiksa,
			"TBLDAFTPARKIR_BLNPERIKSA" => $pecahbulanperiksa,
			"TBLDAFTPARKIR_THNPERIKSA" => $pecahthnperiksa,

		);

		// echo CJSON::encode($column);Yii::app()->end();

		$simpan = $command->update("{$this->namatabel}", $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPJK AND TBLPENDATAAN_BLNPAJAK =:TBLPENDATAAN_BLNPAJAK AND NVL(TBLPENDATAAN_TGLPAJAK,0)=0',array(':NOPOK' => $NOPOK,':THNPJK' => $THNPJK,':TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK));

		if ($simpan>=0) {
			echo CJSON::encode(array('status'=>'success'));
		}
		else{
			echo CJSON::encode(array('status'=>'failed'));
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
