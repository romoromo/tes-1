<?php

class Skpdnihil_hotelController extends Controller
{
	var $KODE_GOL = 3;
	var $PAJAK_AYAT = 1;
	var $PAJAK_REK = '4.1.1.1.0';

	public $namatabel = 'TBLDAFTHOTEL';
	
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['sub_rek'] = TRekening::model()->getRekeningSubAktif('4110100');

		$data['rek'] = Yii::app()->db->createCommand("
		SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.1.%'
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

		$select = "TBLDAFTHOTEL.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT";
		$from = 'TBLDAFTHOTEL';
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
			,'join'=> array('TBLDAFTAR', "TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHOTEL.TBLDAFTAR_NOPOK")
			,'order'=> "TBLDAFTHOTEL.TBLDAFTAR_NOPOK ASC"
			,'group'=> "TBLDAFTHOTEL.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT"
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
			MAX(TO_NUMBER (TO_CHAR(NVL(TBLDAFTHOTEL_REGNIHIL, 0))))+1 AS nolb
		FROM
			TBLDAFTHOTEL
		WHERE
			TBLPENDATAAN_THNPAJAK = ".$splthn."
		AND NVL (TBLDAFTHOTEL_REGNIHIL, 0) <> 0
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
		NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKPERIKSA, 0) AS TBLDAFTHOTEL_PAJAKPERIKSA,
		NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORPERIKSA, 0) AS TBLDAFTHOTEL_NOMORPERIKSA,
		NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_REGNIHIL, 0) AS TBLDAFTHOTEL_REGNIHIL,
		NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_TGLPERIKSA,0) AS TBLDAFTHOTEL_TGLPERIKSA,
		NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BLNPERIKSA,0) AS TBLDAFTHOTEL_BLNPERIKSA,
		NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_THNPERIKSA,0) AS TBLDAFTHOTEL_THNPERIKSA,
		NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHPERIKSA,0) AS TBLDAFTHOTEL_RUPIAHPERIKSA,
		NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_TANGGLNIHIL,0) AS TBLDAFTHOTEL_TANGGLNIHIL,
		NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BULANNIHIL,0) AS TBLDAFTHOTEL_BULANNIHIL,
		NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_TAHUNNIHIL,0) AS TBLDAFTHOTEL_TAHUNNIHIL 
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,"EQ__TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK" => $tahun_substr
			,"EQ__TBLDAFTHOTEL.TBLPENDATAAN_BLNPAJAK" => $bulan_akhir
		);

		$otherquery = array(
			'limit'=> 30
			,'andwhere'=> 'NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_REGNIHIL, 0) <> 0'
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'join_2'=> array('TBLDAFTHOTEL', "TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHOTEL.TBLDAFTAR_NOPOK")
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

		$data['TBLDAFTHOTEL_PAJAKPERIKSA'] = $model['TBLDAFTHOTEL_PAJAKPERIKSA'];
		$data['TBLDAFTHOTEL_NOMORPERIKSA'] = $model['TBLDAFTHOTEL_NOMORPERIKSA'];
		$data['TBLDAFTHOTEL_RUPIAHPERIKSA'] = $model['TBLDAFTHOTEL_RUPIAHPERIKSA'];
		$data['TBLDAFTHOTEL_REGNIHIL'] = $model['TBLDAFTHOTEL_REGNIHIL'];

		$data['TBLDAFTHOTEL_TGLPERIKSA'] = sprintf('%02d',$model['TBLDAFTHOTEL_TGLPERIKSA']); 
		$data['TBLDAFTHOTEL_BLNPERIKSA'] = sprintf('%02d',$model['TBLDAFTHOTEL_BLNPERIKSA']); 
		$data['TBLDAFTHOTEL_THNPERIKSA'] = $model['TBLDAFTHOTEL_THNPERIKSA'];

		$data['TBLDAFTHOTEL_TANGGLNIHIL'] = sprintf('%02d',$model['TBLDAFTHOTEL_TANGGLNIHIL']); 
		$data['TBLDAFTHOTEL_BULANNIHIL'] = sprintf('%02d',$model['TBLDAFTHOTEL_BULANNIHIL']); 
		$data['TBLDAFTHOTEL_TAHUNNIHIL'] = $model['TBLDAFTHOTEL_TAHUNNIHIL']; 
		
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
		NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKPERIKSA, 0) AS TBLDAFTHOTEL_PAJAKPERIKSA,
		NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORPERIKSA, 0) AS TBLDAFTHOTEL_NOMORPERIKSA,
		NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_REGNIHIL, 0) AS TBLDAFTHOTEL_REGNIHIL,
		NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_TGLPERIKSA,0) AS TBLDAFTHOTEL_TGLPERIKSA,
		NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BLNPERIKSA,0) AS TBLDAFTHOTEL_BLNPERIKSA,
		NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_THNPERIKSA,0) AS TBLDAFTHOTEL_THNPERIKSA
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,"EQ__TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK" => $tahun_substr
			,"EQ__TBLDAFTHOTEL.TBLPENDATAAN_BLNPAJAK" => $bulan_akhir
			// ,"EQ__TBLDAFTHOTEL.TBLDAFTHOTEL_BLNKBAKHIR" => $bulan_akhir
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'join_2'=> array('TBLDAFTHOTEL', "TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHOTEL.TBLDAFTAR_NOPOK")
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

		$data['TBLDAFTHOTEL_PAJAKPERIKSA'] = $model['TBLDAFTHOTEL_PAJAKPERIKSA'];
		$data['TBLDAFTHOTEL_NOMORPERIKSA'] = $model['TBLDAFTHOTEL_NOMORPERIKSA'];

		$data['TBLDAFTHOTEL_TGLPERIKSA'] = sprintf('%02d',$model['TBLDAFTHOTEL_TGLPERIKSA']); 
		$data['TBLDAFTHOTEL_BLNPERIKSA'] = sprintf('%02d',$model['TBLDAFTHOTEL_BLNPERIKSA']); 
		$data['TBLDAFTHOTEL_THNPERIKSA'] = $model['TBLDAFTHOTEL_THNPERIKSA'];

		// $data['TBLDAFTHOTEL_TGLPERIKSA'] = sprintf('%02d',$model['TBLDAFTHOTEL_TGLPERIKSA']); 
		// $data['TBLDAFTHOTEL_BLNPERIKSA'] = sprintf('%02d',$model['TBLDAFTHOTEL_BLNPERIKSA']); 
		// $data['TBLDAFTHOTEL_THNPERIKSA'] = $model['TBLDAFTHOTEL_THNPERIKSA'];

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
        TBLDAFTHOTEL.*,
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHPERIKSA, 0) AS TBLDAFTHOTEL_RUPIAHPERIKSA, 
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BLNKBAWAL, 0) AS TBLDAFTHOTEL_BLNKBAWAL, 
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BLNKBAKHIR, 0) AS TBLDAFTHOTEL_BLNKBAKHIR, 
        TBLDAFTAR.*, (
		SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
			TBLREKENING
		WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTHOTEL.TBLDAFTHOTEL_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTHOTEL.TBLDAFTHOTEL_REKJENIS
		) AS NMREK,
		(
			SELECT
			TBLREKENING.TBLREKENING_KODEFULL
			FROM
			TBLREKENING
			WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTHOTEL.TBLDAFTHOTEL_REKAYAT
			AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTHOTEL.TBLDAFTHOTEL_REKJENIS
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
        $from = 'TBLDAFTHOTEL';

        $otherquery = array(
             'leftjoin_daftar'=>array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHOTEL.TBLDAFTAR_NOPOK')
        );

        $filter = array(
            'EQ__TBLDAFTHOTEL.TBLDAFTAR_NOPOK' => $NOPOK
			,'EQ__TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK' => $THNPJK
			,'EQ__TBLDAFTHOTEL.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
        );

        $otherquery['andwhere'] = '
	        NVL(TBLDAFTHOTEL.TBLPENDATAAN_TGLPAJAK, 0)= 0';

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);

        $sql2="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 6";
        $data['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();

		$dt = array();

		$dt['nopok'] = $data['cetak']['TBLDAFTAR_NOPOK'];
		$dt['jabatan'] = $data['jab2']['TBLPEJABAT_URAIAN'];
		$dt['petugas'] = $data['jab2']['TBLPEJABAT_NAMA'];
		$dt['nip'] = $data['jab2']['TBLPEJABAT_NIP'];

		$dt['thnkb'] = '20'.$data['cetak']['TBLDAFTHOTEL_TAHUNNIHIL'];
		$dt['blnawal'] = LokalIndonesia::getbulan($data['cetak']['TBLDAFTHOTEL_BLNKBAWAL']);
		$dt['blnakhir'] = LokalIndonesia::getbulan($data['cetak']['TBLDAFTHOTEL_BLNKBAKHIR']);
		$dt['regkb'] = $data['cetak']['TBLDAFTHOTEL_REGNIHIL'];

		$dt['namabadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHANAMA'];
		$dt['namapemilik'] = $data['cetak']['TBLDAFTAR_PEMILIKNAMA'];
		$dt['alamatbadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHAALAMAT'];
		$dt['alamatpemilik'] = $data['cetak']['TBLDAFTAR_PEMILIKALAMAT'];

		$dt['kodefull'] = $data['cetak']['TBLREKENING_KODEFULL'];

		$dt['namarek'] = $data['cetak']['NMREK'];

		$dt['namarek'] = $data['cetak']['NMREK'];

		// $dt['jatuhtempo'] = $data['cetak']['TBLDAFTHOTEL_TGLBTSKRGBAYAR'] .'/'. $data['cetak']['TBLDAFTHOTEL_BLNBTSKRGBAYAR'] .'/20'.$data['cetak']['TBLDAFTHOTEL_THNBTSKRGBAYAR'];

		$dt['pajakperiksa'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHOTEL_RUPIAHPERIKSA']);
		

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
		$namafileDL = "SKPDNIHIL-HOTEL-".$npwpd.".docx";
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
		$model = Yii::app()->db->createCommand("SELECT NVL(TBLDAFTHOTEL_REGNIHIL,0) FROM $this->namatabel WHERE TBLPENDATAAN_THNPAJAK ='$thn' AND TBLPENDATAAN_BLNPAJAK='$bulan' AND TBLDAFTAR_NOPOK='$nopok' AND NVL(TBLDAFTHOTEL_NOMORPERIKSA, 0) = 0")->queryScalar();
		return $model;
	}

	public function cekBayar($thn, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand("SELECT TBLSETOR_NOMORSSPD FROM TBLSETOR WHERE TBLPENDATAAN_THNPAJAK ='$thn' AND TBLPENDATAAN_BLNPAJAK='$bulan' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)=0 AND TBLDAFTAR_NOPOK='$nopok' AND TRIM(TBLSETOR_JNSBAYAR) = 'SPTPD'")->queryScalar();
		return $model;
	}

	public function actionSimpanSKPDNHotel()
	{
		Yii::import('ext.LokalIndonesia');

		$PARAM = $_REQUEST;
		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];

		$THNPJK = (int)substr($TBLPENDATAAN_THNPAJAK, 2,4);

		$TBLPENDATAAN_BLNPAJAK = (int)!empty($_REQUEST['TBLDAFTHOTEL_BLNKBAKHIR']) ? $_REQUEST['TBLDAFTHOTEL_BLNKBAKHIR'] : 0;

		$TBLDAFTHOTEL_TANGGLNIHIL = !empty($_REQUEST["TBLDAFTHOTEL_TANGGLNIHIL"]) ? $_REQUEST["TBLDAFTHOTEL_TANGGLNIHIL"] : '';

		$TBLDAFTHOTEL_TGLPERIKSA = !empty($_REQUEST["TBLDAFTHOTEL_TGLPERIKSA"]) ? $_REQUEST["TBLDAFTHOTEL_TGLPERIKSA"] : '';

		if ($TBLDAFTHOTEL_TANGGLNIHIL !='') {
			$exp_TGLTERIMADAFTAR = explode('-', $TBLDAFTHOTEL_TANGGLNIHIL);
			$pecahtgldaftar = $exp_TGLTERIMADAFTAR[0];
			$pecahbulandaftar = $exp_TGLTERIMADAFTAR[1];
			$pecahthndaftar = substr($exp_TGLTERIMADAFTAR[2], -2);	
		} else {
			$pecahtgldaftar = '';
			$pecahbulandaftar = '';
			$pecahthndaftar = '';
		}

		

		if ($TBLDAFTHOTEL_TGLPERIKSA !='') {
			$exp_TGLPERIKSA = explode('-', $TBLDAFTHOTEL_TGLPERIKSA);
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

			"TBLDAFTHOTEL_REGNIHIL" => LokalIndonesia::toAngka($PARAM["TBLDAFTHOTEL_REGNIHIL"]),

			"TBLDAFTHOTEL_TANGGLNIHIL" => $pecahtgldaftar,
			"TBLDAFTHOTEL_BULANNIHIL" => $pecahbulandaftar,
			"TBLDAFTHOTEL_TAHUNNIHIL" => $pecahthndaftar,

			"TBLDAFTHOTEL_NOMORPERIKSA" => $PARAM["TBLDAFTHOTEL_NOMORPERIKSA"],
			"TBLDAFTHOTEL_PAJAKPERIKSA" => LokalIndonesia::toAngka($PARAM["TBLDAFTHOTEL_PAJAKPERIKSA"]),
			"TBLDAFTHOTEL_RUPIAHPERIKSA" => LokalIndonesia::toAngka($PARAM["TBLDAFTHOTEL_RUPIAHPERIKSA"]),
			"TBLDAFTHOTEL_BLNKBAWAL" => $PARAM["TBLDAFTHOTEL_BLNKBAWAL"],
			"TBLDAFTHOTEL_BLNKBAKHIR" => $PARAM["TBLDAFTHOTEL_BLNKBAKHIR"],
			"TBLDAFTHOTEL_TGLPERIKSA" => $pecahtglperiksa,
			"TBLDAFTHOTEL_BLNPERIKSA" => $pecahbulanperiksa,
			"TBLDAFTHOTEL_THNPERIKSA" => $pecahthnperiksa,

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