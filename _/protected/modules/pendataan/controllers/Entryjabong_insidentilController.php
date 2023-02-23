<?php

class Entryjabong_insidentilController extends Controller
{
	var $KODE_GOL = 2;
	var $PAJAK_AYAT = 4;
	var $PAJAK_REK = '4.1.1.4.0';
	var $MODULE_URL = 'pendataan/reklame2016_insidentil';
	public function actionIndex()
	{
		// $data['rek'] = TRekening::model()->getRekeningSubAktif('4110400');
		$data['rek'] = Yii::app()->db->createCommand("
			SELECT
			RREKRNDBARU.*
			, NMREK AS TREKENING_NAMA
			, URS || '.' || PEM || '.' || ORG || '.' || PRG || '.' || KGT || '.' || DIN || '.' || BID || '.' || PEND || '.' || PAD || '.' || PJK || '.' || AYT || '.' || JEN || '.' || SUB AS TREKENING_KODEFULL
			, PEND || '.' || PAD || '.' || PJK || '.' || AYT || '.' || JEN AS TREKENING_KODE 
			FROM
			RREKRNDBARU
			WHERE
			NMREK IS NOT NULL
			AND NOPD = '11'
			AND SATUAN <> 'M2/TH'
			AND (PEND || '.' || PAD || '.' || PJK || '.' || AYT || '.' || JEN) LIKE '4.1.1.4.%'
			AND JEN NOT IN ( '83','84','85','86','87','88','89','91','92','93','90' )
			OR JEN = '98'
			OR JEN = '99'
			OR JEN = '100'
			OR JEN = '101'
			OR JEN = '102'
			OR JEN = '106'
			OR JEN = '107'
			OR JEN = '108'
			ORDER BY JEN
		")->queryAll();

		$data['refjabongreklame'] = Yii::app()->db->createCommand('SELECT * FROM REFJABONGREKLAME')->queryAll();
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionCetakJabong()
	{
		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
		$THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2,4);
		$BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];
		$TGLPAJAK = $_REQUEST['TBLPENDATAAN_TGLPAJAK'];
		$PAJAKKE = $_REQUEST['TBLPENDATAAN_PAJAKKE'];

		/*$select = "TBLDAFTAR.*, TBLDAFTREKLAME.*";

        $from = 'TBLDAFTREKLAME,TBLDAFTAR';

        $filter = array(
            'EQ__TBLDAFTREKLAME.TBLDAFTAR_NOPOK' => $NOPOK
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK' => $THNPJK
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK' => $BLNPAJAK
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE' => $PAJAKKE
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'mode'=>'DEBUG');
        $data['cetak'] = DBFetch::query($arrayConfig);*/

		$data['cetakjabong'] = Yii::app()->db->createCommand('SELECT
			TBLDAFTAR.*, TBLDAFTREKLAME.*,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_NOJABONG,0) AS TBLDAFTREKLAME_NOJABONG
		FROM
			TBLDAFTREKLAME,
			TBLDAFTAR
		WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK
		AND TBLDAFTAR.TBLDAFTAR_NOPOK = '.$NOPOK.'
		AND TBLPENDATAAN_THNPAJAK = '.$THNPJK.'
		AND TBLPENDATAAN_BLNPAJAK = '.$BLNPAJAK.'
		AND TBLPENDATAAN_TGLPAJAK = ' . $TGLPAJAK . '
		AND TBLPENDATAAN_PAJAKKE = '.$PAJAKKE.'
		')->queryAll();

		// $this->renderPartial('cetak',array('data'=>$data));
		$this->renderPartial('cetak_jabong', array('data'=>$data));
	}

	public function actionCetakJabongWord()
	{
		// error_reporting(0);

		// baca file template, yg dipakai
		// $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
		
		// echo "$query";
		
		// $data['list_kartudata'] = Yii::app()->db->createCommand($query)->queryAll();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_jabong' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'jabong_insidentil.docx';

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
		$BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];
		$TGLPAJAK = $_REQUEST['TBLPENDATAAN_TGLPAJAK'];
		$PAJAKKE = $_REQUEST['TBLPENDATAAN_PAJAKKE'];

		$select = "TBLDAFTAR.*, TBLDAFTREKLAME.*
				,NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_HRGDASARJABONG,0) AS TBLDAFTREKLAME_HRGDASARJABONG
				,NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_LISTRIKJABONG,0) AS TBLDAFTREKLAME_LISTRIKJABONG
				,NVL(TBLDAFTREKLAME.REFJABONGREKLAME_IDXKESULITAN,0) AS REFJABONGREKLAME_IDXKESULITAN
				,NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_JMLHREKLAME,0) AS TBLDAFTREKLAME_JMLHREKLAME
				,NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_JUMLAHJABONG,0) AS TBLDAFTREKLAME_JUMLAHJABONG
				,NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHJABONG,0) AS TBLDAFTREKLAME_RUPIAHJABONG
				,NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_NOJABONG,0) AS TBLDAFTREKLAME_NOJABONG
				,RREKRNDBARU.NMREK";

        $from = 'TBLDAFTREKLAME';

        $otherquery = array(
             'leftjoin_daftar'=>array('TBLDAFTAR', 'TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK')
             ,'join_rekrnd'=>array('RREKRNDBARU', 'TBLDAFTREKLAME.TBLDAFTREKLAME_REKJENIS = RREKRNDBARU.JEN')
        );

        $filter = array(
            'EQ__TBLDAFTREKLAME.TBLDAFTAR_NOPOK' => $NOPOK
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK' => $THNPJK
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK' => $BLNPAJAK
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE' => $PAJAKKE
			,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK' => $TGLPAJAK
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);

		/*$data['cetak'] = Yii::app()->db->createCommand('SELECT
			TBLDAFTAR.*, TBLDAFTREKLAME.*
		FROM
			TBLDAFTREKLAME,
			TBLDAFTAR
		WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK
		AND TBLDAFTAR.TBLDAFTAR_NOPOK = '.$NOPOK.'
		AND TBLPENDATAAN_THNPAJAK = '.$THNPJK.'
		AND TBLPENDATAAN_BLNPAJAK = '.$BLNPAJAK.'
		AND TBLPENDATAAN_PAJAKKE = '.$PAJAKKE.'
		')->queryAll();*/

		// var_dump($data['cetak']);

		// $this->renderPartial('cetak',array('data'=>$data));

		$dt = array();

		$dt['nojabong'] = $data['cetak']['TBLDAFTREKLAME_NOJABONG'];
		$dt['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');
		$dt['tgljabong'] = $data['cetak']['TBLDAFTREKLAME_TGLJABONG'] . '-' . LokalIndonesia::getbulan(sprintf("%02d", $data['cetak']['TBLDAFTREKLAME_BLNJABONG'])) . '-20' . $data['cetak']['TBLDAFTREKLAME_THNJABONG'];
		$dt['nopok'] = $data['cetak']['TBLDAFTAR_NOPOK'];
		$dt['nama'] = $data['cetak']['TBLDAFTAR_BADANUSAHANAMA'];
		$dt['alamat'] = $data['cetak']['TBLDAFTAR_BADANUSAHAALAMAT'];

		$dt['materi'] = $data['cetak']['TBLDAFTREKLAME_KETERANGAN1'];
		$dt['lokasipasang'] = $data['cetak']['TBLDAFTREKLAME_KETERANGAN2'];
		$dt['masaawal'] = $data['cetak']['TBLDAFTREKLAME_TGLMULAIREKLAME'] .'-'. $data['cetak']['TBLDAFTREKLAME_BLNMULAIREKLAME'] .'-'. $data['cetak']['TBLDAFTREKLAME_THNMULAIREKLAME'];
		$dt['masaakhir'] = $data['cetak']['TBLDAFTREKLAME_TGLAKHIRREKLAME'] .'-'. $data['cetak']['TBLDAFTREKLAME_BLNAKHIRREKLAME'] .'-'. $data['cetak']['TBLDAFTREKLAME_THNAKHIRREKLAME'];

		$dt['hrgdsr'] = LokalIndonesia::ribuan($data['cetak']['TBLDAFTREKLAME_HRGDASARJABONG']);
		$dt['listrikjbg'] = LokalIndonesia::ribuan($data['cetak']['TBLDAFTREKLAME_LISTRIKJABONG']);

		$dt['namarek'] = $data['cetak']['NMREK'];

		$dt['pjg'] = floatval($data['cetak']['TBLDAFTREKLAME_PANJANG']);
		$dt['lbr'] = floatval($data['cetak']['TBLDAFTREKLAME_LEBAR']);
		$dt['idx'] = $data['cetak']['REFJABONGREKLAME_IDXKESULITAN'];
		$dt['jmlh'] = $data['cetak']['TBLDAFTREKLAME_JMLHREKLAME'];

		$dt['lokasi'] = $data['cetak']['TBLPENDATAAN_PAJAKKE'];
		$dt['totaljabong'] = LokalIndonesia::ribuan($data['cetak']['TBLDAFTREKLAME_RUPIAHJABONG']);
		$dt['jmljabong'] = LokalIndonesia::ribuan($data['cetak']['TBLDAFTREKLAME_JUMLAHJABONG']);
		$dt['terbilang'] = LokalIndonesia::terbilangangka($data['cetak']['TBLDAFTREKLAME_RUPIAHJABONG']);
		$dt['npwpd'] = $data['cetak']['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $data['cetak']['TBLDAFTAR_GOLONGAN'] .'.'. $data['cetak']['TBLDAFTAR_NOPOK'] .'.'. sprintf("%02d",$data['cetak']['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$data['cetak']['TBLKELURAHAN_IDBADANUSAHA']);

		// $dt['thnkb'] = '20'.$data['cetak']['TBLDAFTREKLAME_THNKURANGBAYAR'];
		// $dt['blnkbawal'] = LokalIndonesia::getbulan($data['cetak']['TBLDAFTREKLAME_BLNKBAWAL']);
		// $dt['blnkbakhir'] = LokalIndonesia::getbulan($data['cetak']['TBLDAFTREKLAME_BLNKBAKHIR']);
		// $dt['regkb'] = $data['cetak']['TBLDAFTREKLAME_REGKURANGBAYAR'];

		// $dt['namapemilik'] = $data['cetak']['TBLDAFTAR_PEMILIKNAMA'];
		// $dt['alamatpemilik'] = $data['cetak']['TBLDAFTAR_PEMILIKALAMAT'];

		// $dt['kodefull'] = $data['cetak']['TBLREKENING_KODEFULL'];

		// $dt['namarek'] = $data['cetak']['NMREK'];

		// $dt['namarek'] = $data['cetak']['NMREK'];

		// $dt['jatuhtempo'] = $data['cetak']['TBLDAFTREKLAME_TGLBTSKRGBAYAR'] .'/'. $data['cetak']['TBLDAFTREKLAME_BLNBTSKRGBAYAR'] .'/20'.$data['cetak']['TBLDAFTREKLAME_THNBTSKRGBAYAR'];

		// $dt['pajakperiksa'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTREKLAME_PAJAKPERIKSA']);
		// $dt['bunga'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTREKLAME_BUNGAKRGBAYAR']);
		// $dt['denda'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTREKLAME_DENDAKRGBAYAR']);
		// $dt['setoran'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTREKLAME_RUPIAHSETOR']);
		// $dt['kurangbayar'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTREKLAME_RUPIAHKRGBAYAR']);
		// $dt['total'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTREKLAME_RUPIAHKRGBAYAR']);
		// $dt['terbilang'] = LokalIndonesia::terbilangangka($data['cetak']['TBLDAFTREKLAME_RUPIAHKRGBAYAR']);

		// $dt['thnpajak'] = '20'.$data['cetak']['TBLPENDATAAN_THNPAJAK'];

		// $dt['npwpd'] = $data['cetak']['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $data['cetak']['TBLDAFTAR_GOLONGAN'] .'.'. $data['cetak']['TBLDAFTAR_NOPOK'] .'.'. sprintf("%02d",$data['cetak']['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$data['cetak']['TBLKELURAHAN_IDBADANUSAHA']);

		// // $dt['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
		
		//SAMPAI SINI QUERYNYA

		// var_dump($data);
		// echo json_encode($data['cetak']);Yii::app()->end();
		// echo json_encode($row);

		// Merge data in the first sheet 
		$npwpd = $data['cetak']['TBLDAFTAR_NOPOK'];
		$namafileDL = "JABONG-INSIDENTIL-".$npwpd.".docx";
		$otbs->MergeField('dt', $dt); 
		// $otbs->MergeField('setoran', $setoran); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
	}

	public function actionGetNoJabong()
	{
		$tahun = $_REQUEST['tahun'];
		$bulan = $_REQUEST['bulan'];
		$splthn = substr($tahun, -2);

		$data = Yii::app()->db->createCommand("SELECT
			MAX(TO_NUMBER (TO_CHAR(NVL(TBLDAFTREKLAME_NOJABONG, 0))))+1 AS nojabong
		FROM
			TBLDAFTREKLAME
		WHERE
			TBLPENDATAAN_THNPAJAK = ".$splthn."
		AND TBLDAFTREKLAME_JNSREKLAME = 'I'
		AND NVL (TBLDAFTREKLAME_NOJABONG, 0) <> 0
		AND NVL (TBLDAFTREKLAME_NOJABONG, 0) <> 1032
		AND NVL (TBLDAFTREKLAME_NOJABONG, 0) <> 957
		ORDER BY
			TO_NUMBER (TO_CHAR(NVL(nojabong, 0))) DESC")->queryRow();

		echo CJSON::encode($data);
	}

	public function actiongetdata()
	{
		$NOPOK = intval(base64_decode($_POST['nopok']));
		$tblpendataan_pajakke = intval(base64_decode($_POST['tblpendataan_pajakke']));
		$tgl = intval(base64_decode($_POST['tgl']));
		$bulan = intval(base64_decode($_POST['bulan']));
		$tahun = intval(base64_decode($_POST['tahun']));
		
		$data = array();
		$cek = $this->cekPernahDaftar(substr($tahun, -2), $bulan, $tgl, $tblpendataan_pajakke, $NOPOK);
		$proses = $this->cekProses(substr($tahun, -2), $bulan, $tgl, $tblpendataan_pajakke, $NOPOK);

			if ($proses == '') {

				$data['data'] = 'belum terdaftar';	

			} else if ($cek != '') {

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


			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_REKJENIS,0) AS TBLDAFTREKLAME_REKJENIS,
			
			TBLDAFTREKLAME.TBLDAFTREKLAME_TGLIZIN,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_BLNIZIN,0) AS TBLDAFTREKLAME_BLNIZIN,
			TBLDAFTREKLAME.TBLDAFTREKLAME_THNIZIN,
			
			TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSPTPD,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSPTPD,0) AS TBLDAFTREKLAME_BLNSPTPD,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_THNSPTPD,0) AS TBLDAFTREKLAME_THNSPTPD,

			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN1, '-') AS TBLDAFTREKLAME_KETERANGAN1,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN2, '-') AS TBLDAFTREKLAME_KETERANGAN2,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_JMLHREKLAME, 0) AS TBLDAFTREKLAME_JMLHREKLAME,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_LISTRIKJABONG, 0) AS TBLDAFTREKLAME_LISTRIKJABONG,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHJABONG, 0) AS TBLDAFTREKLAME_RUPIAHJABONG,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_NOJABONG, 0) AS TBLDAFTREKLAME_NOJABONG,

			TBLDAFTREKLAME.TBLDAFTREKLAME_SKORKAWASAN,
			
			NVL(TBLDAFTREKLAME.REFJALAN_ID, 0) AS REFJALAN_ID,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_TINGGIREKLAME, 0) AS TBLDAFTREKLAME_TINGGIREKLAME,
			TBLDAFTREKLAME.REFKETINGGIAN_SKOR,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_LUAS,0) AS TBLDAFTREKLAME_LUAS,
			TBLDAFTREKLAME.TBLDAFTREKLAME_PANJANG,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_LEBAR, 0) As TBLDAFTREKLAME_LEBAR,
			TBLDAFTREKLAME.TBLDAFTREKLAME_ISIREKLAME,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_PCRINGAN, 0) AS TBLDAFTREKLAME_PCRINGAN,

			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_JUMLAHHARI, 0) AS TBLDAFTREKLAME_JUMLAHHARI,
			TBLDAFTREKLAME.TBLDAFTREKLAME_THNTERIMA,
			TBLDAFTREKLAME.TBLDAFTREKLAME_BLNTERIMA,
			TBLDAFTREKLAME.TBLDAFTREKLAME_TGLTERIMA,
			TBLDAFTREKLAME.TBLDAFTREKLAME_THNBATASSPTPD,
			TBLDAFTREKLAME.TBLDAFTREKLAME_BLNBATASSPTPD,
			TBLDAFTREKLAME.TBLDAFTREKLAME_TGLBATASSPTPD,
			TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRI,
			TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRI,
			TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRI,
			TBLDAFTREKLAME_HRGDASARJABONG
			";
			$from = 'TBLDAFTAR';
			$filter = array(
			);

			$filter_AND = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $NOPOK
				,'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
				,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
				,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK' => $tgl
				,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK' => $bulan
				,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK' => substr($tahun, -2)
				,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE' => $tblpendataan_pajakke
				// ,'EQ__tblsubyek_isaktif' => "T"
			);

			$otherquery = array(
				'limit'=> 30
				,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
				,'leftjoin'=> array('TBLDAFTREKLAME', 'TBLDAFTREKLAME.TBLDAFTAR_NOPOK= TBLDAFTAR.TBLDAFTAR_NOPOK')
				,'order'=> 'TBLDAFTAR_NOPOK ASC'
			);
			$model = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL') );

			$data['TBLDAFTAR_NOPOK'] =$model['TBLDAFTAR_NOPOK'];
			$data['TBLDAFTAR_BADANUSAHANAMA'] =$model['TBLDAFTAR_BADANUSAHANAMA'];
			$data['TBLDAFTAR_BADANUSAHAALAMAT'] =$model['TBLDAFTAR_BADANUSAHAALAMAT'];
			$data['REKENING_KODE'] =$model['REKENING_KODE'];
			$data['TREKENING_TARIF'] =$model['REFBADANUSAHA_PERSEN'];
			
			$data['REFBADANUSAHA_REKPENDAPATAN'] =$model['REFBADANUSAHA_REKPENDAPATAN'];
			$data['REFBADANUSAHA_REKPAD'] =$model['REFBADANUSAHA_REKPAD'];
			$data['REFBADANUSAHA_REKPJK'] =$model['REFBADANUSAHA_REKPJK'];
			$data['REFBADANUSAHA_REKAYAT'] =$model['REFBADANUSAHA_REKAYAT'];
			$data['REFBADANUSAHA_REKJENIS'] =$model['REFBADANUSAHA_REKJENIS'];

			$data['TBLDAFTREKLAME_LUAS'] =floatval($model['TBLDAFTREKLAME_LUAS']);
			$data['TBLDAFTREKLAME_JMLHREKLAME'] =$model['TBLDAFTREKLAME_JMLHREKLAME'];
			$data['TBLDAFTREKLAME_REKJENIS'] =$model['TBLDAFTREKLAME_REKJENIS'];
			$data['TBLDAFTREKLAME_LISTRIKJABONG'] =$model['TBLDAFTREKLAME_LISTRIKJABONG'];
			$data['TBLDAFTREKLAME_RUPIAHJABONG'] =$model['TBLDAFTREKLAME_RUPIAHJABONG'];
			$data['TBLDAFTREKLAME_NOJABONG'] =$model['TBLDAFTREKLAME_NOJABONG'];
			$data['TBLDAFTREKLAME_HRGDASARJABONG'] =$model['TBLDAFTREKLAME_HRGDASARJABONG'];
			

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

			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_REKJENIS,0) AS TBLDAFTREKLAME_REKJENIS,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_JMLHREKLAME,0) AS TBLDAFTREKLAME_JUMLAHJABONG,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_HRGDASARJABONG,0) AS TBLDAFTREKLAME_HRGDASARJABONG,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_NOJABONG,0) AS TBLDAFTREKLAME_NOJABONG,
			
			TBLDAFTREKLAME.TBLDAFTREKLAME_TGLIZIN,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_BLNIZIN,0) AS TBLDAFTREKLAME_BLNIZIN,
			TBLDAFTREKLAME.TBLDAFTREKLAME_THNIZIN,
			
			TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSPTPD,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSPTPD,0) AS TBLDAFTREKLAME_BLNSPTPD,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_THNSPTPD,0) AS TBLDAFTREKLAME_THNSPTPD,

			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN1, '-') AS TBLDAFTREKLAME_KETERANGAN1,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN2, '-') AS TBLDAFTREKLAME_KETERANGAN2,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_JMLHREKLAME, 0) AS TBLDAFTREKLAME_JMLHREKLAME,

			TBLDAFTREKLAME.TBLDAFTREKLAME_SKORKAWASAN,
			
			NVL(TBLDAFTREKLAME.REFJALAN_ID, 0) AS REFJALAN_ID,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_TINGGIREKLAME, 0) AS TBLDAFTREKLAME_TINGGIREKLAME,
			TBLDAFTREKLAME.REFKETINGGIAN_SKOR,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_LUAS,0) AS TBLDAFTREKLAME_LUAS,
			TBLDAFTREKLAME.TBLDAFTREKLAME_PANJANG,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_LEBAR, 0) As TBLDAFTREKLAME_LEBAR,
			TBLDAFTREKLAME.TBLDAFTREKLAME_ISIREKLAME,
			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_PCRINGAN, 0) AS TBLDAFTREKLAME_PCRINGAN,

			NVL(TBLDAFTREKLAME.TBLDAFTREKLAME_JUMLAHHARI, 0) AS TBLDAFTREKLAME_JUMLAHHARI,
			TBLDAFTREKLAME.TBLDAFTREKLAME_THNTERIMA,
			TBLDAFTREKLAME.TBLDAFTREKLAME_BLNTERIMA,
			TBLDAFTREKLAME.TBLDAFTREKLAME_TGLTERIMA,
			TBLDAFTREKLAME.TBLDAFTREKLAME_THNBATASSPTPD,
			TBLDAFTREKLAME.TBLDAFTREKLAME_BLNBATASSPTPD,
			TBLDAFTREKLAME.TBLDAFTREKLAME_TGLBATASSPTPD,
			TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRI,
			TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRI,
			TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRI
			";
			$from = 'TBLDAFTAR';
			$filter = array(
			);

			$filter_AND = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $NOPOK
				,'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
				,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
				,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK' => $tgl
				,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK' => $bulan
				,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK' => substr($tahun, -2)
				,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE' => $tblpendataan_pajakke
				// ,'EQ__tblsubyek_isaktif' => "T"
			);

			$otherquery = array(
				'limit'=> 30
				,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
				,'leftjoin'=> array('TBLDAFTREKLAME', 'TBLDAFTREKLAME.TBLDAFTAR_NOPOK= TBLDAFTAR.TBLDAFTAR_NOPOK')
				,'order'=> 'TBLDAFTAR_NOPOK ASC'
			);
			$model = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL') );

			$data['TBLDAFTAR_NOPOK'] =$model['TBLDAFTAR_NOPOK'];
			$data['TBLDAFTAR_BADANUSAHANAMA'] =$model['TBLDAFTAR_BADANUSAHANAMA'];
			$data['TBLDAFTAR_BADANUSAHAALAMAT'] =$model['TBLDAFTAR_BADANUSAHAALAMAT'];
			$data['REKENING_KODE'] =$model['REKENING_KODE'];
			$data['TREKENING_TARIF'] =$model['REFBADANUSAHA_PERSEN'];
			
			$data['REFBADANUSAHA_REKPENDAPATAN'] =$model['REFBADANUSAHA_REKPENDAPATAN'];
			$data['REFBADANUSAHA_REKPAD'] =$model['REFBADANUSAHA_REKPAD'];
			$data['REFBADANUSAHA_REKPJK'] =$model['REFBADANUSAHA_REKPJK'];
			$data['REFBADANUSAHA_REKAYAT'] =$model['REFBADANUSAHA_REKAYAT'];
			$data['REFBADANUSAHA_REKJENIS'] =$model['REFBADANUSAHA_REKJENIS'];

			$data['TBLDAFTREKLAME_LUAS'] = floatval($model['TBLDAFTREKLAME_LUAS']);
			$data['TBLDAFTREKLAME_JMLHREKLAME'] =$model['TBLDAFTREKLAME_JMLHREKLAME'];
			$data['TBLDAFTREKLAME_REKJENIS'] =$model['TBLDAFTREKLAME_REKJENIS'];
			// $data['TBLDAFTREKLAME_JUMLAHJABONG'] =$model['TBLDAFTREKLAME_JUMLAHJABONG'];
			// $data['TBLDAFTREKLAME_HRGDASARJABONG'] =$model['TBLDAFTREKLAME_HRGDASARJABONG'];
		}

		echo CJSON::encode($data);
	}

	public function cekProses($tahun, $bulan, $tgl, $pajakke, $TBLDAFTAR_NOPOK)
	{
		$model = Yii::app()->db->createCommand('SELECT TBLPENDATAAN_THNPAJAK FROM TBLDAFTREKLAME WHERE TBLDAFTAR_NOPOK ='.$TBLDAFTAR_NOPOK.' AND TBLPENDATAAN_PAJAKKE = '.$pajakke.' AND TBLPENDATAAN_THNPAJAK = '.$tahun.' AND TBLPENDATAAN_BLNPAJAK = '. $bulan.' AND TBLPENDATAAN_TGLPAJAK = ' . $tgl)->queryScalar();
		return $model;
	}

	public function cekPernahDaftar($tahun, $bulan, $tgl, $pajakke, $TBLDAFTAR_NOPOK)
	{
		$model = Yii::app()->db->createCommand('SELECT TBLDAFTREKLAME_RUPIAHJABONG FROM TBLDAFTREKLAME WHERE TBLDAFTAR_NOPOK ='.$TBLDAFTAR_NOPOK.' AND TBLPENDATAAN_PAJAKKE = '.$pajakke.' AND TBLPENDATAAN_THNPAJAK = '.$tahun . ' AND TBLPENDATAAN_BLNPAJAK = ' . $bulan . ' AND TBLPENDATAAN_TGLPAJAK = ' . $tgl)->queryScalar();
		return $model;
	}

	public function actionSimpanJabong()
	{
		Yii::import('ext.LokalIndonesia');

		$PARAM = $_REQUEST;
		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
		$TBLPENDATAAN_PAJAKKE = $_REQUEST['TBLPENDATAAN_PAJAKKE'];
		$TBLPENDATAAN_TGLPAJAK = $_REQUEST['TBLPENDATAAN_TGLPAJAK'];

		$THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2,4);

		$TBLPENDATAAN_BLNPAJAK = !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';

		$TBLDAFTREKLAME_TGLKURANGBAYAR = !empty($_REQUEST['TBLDAFTREKLAME_TGLKURANGBAYAR']) ? $_REQUEST['TBLDAFTREKLAME_TGLKURANGBAYAR'] : '';

		$TBLDAFTREKLAME_TGLBTSKRGBAYAR = !empty($_REQUEST['TBLDAFTREKLAME_TGLBTSKRGBAYAR']) ? $_REQUEST['TBLDAFTREKLAME_TGLBTSKRGBAYAR'] : '';

		$TBLDAFTREKLAME_TGLPERIKSA = !empty($_REQUEST['TBLDAFTREKLAME_TGLPERIKSA']) ? $_REQUEST['TBLDAFTREKLAME_TGLPERIKSA'] : '';

		$command = Yii::app()->db->createCommand();
		$column = array(

			'TBLDAFTREKLAME_THNJABONG' => substr($PARAM['TBLDAFTREKLAME_THNJABONG'], 2,4),
			'TBLDAFTREKLAME_BLNJABONG' => $PARAM['TBLDAFTREKLAME_BLNJABONG'],
			'TBLDAFTREKLAME_TGLJABONG' => $PARAM['TBLDAFTREKLAME_TGLJABONG'],
			'TBLDAFTREKLAME_NOJABONG' => $PARAM['TBLDAFTREKLAME_NOJABONG'],
			// 'TBLDAFTREKLAME_JUMLAHJABONG' => LokalIndonesia::toAngka($PARAM['TBLDAFTREKLAME_JUMLAHJABONG']),
			'TBLDAFTREKLAME_JUMLAHJABONG' => LokalIndonesia::toAngka($PARAM['TBLDAFTREKLAME_RUPIAHJABONG']),
			'TBLDAFTREKLAME_HRGDASARJABONG' => LokalIndonesia::toAngka($PARAM['TBLDAFTREKLAME_HRGDASARJABONG']),
			'TBLDAFTREKLAME_RUPIAHJABONG' => LokalIndonesia::toAngka($PARAM['TBLDAFTREKLAME_RUPIAHJABONG']),
		);

		$simpan = $command->update('TBLDAFTREKLAME', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPJK AND TBLPENDATAAN_BLNPAJAK=:TBLPENDATAAN_BLNPAJAK AND TBLPENDATAAN_TGLPAJAK=:TBLPENDATAAN_TGLPAJAK AND TBLPENDATAAN_PAJAKKE =:TBLPENDATAAN_PAJAKKE',array(':NOPOK' => $NOPOK,':THNPJK' => $THNPJK,':TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK,':TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK,':TBLPENDATAAN_PAJAKKE' => $TBLPENDATAAN_PAJAKKE));

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