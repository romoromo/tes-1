<?php

class Skpdlb_pbbController extends Controller
{
	var $KODE_GOL    = 1;
    var $PAJAK_AYAT  = 10;
    var $PAJAK_REK   = '4.1.1.10.0';
    var $MODUL_URL   = 'penetapan/skpdlb_pbb';

    public $namatabel  = 'TBLLBHBAYARPBB';
    public $PAJAK_NAMA = 'PAJAK BUMI BANGUNAN';

	public function actionIndex()
	{
		$data['a'] = 'a';
		$this->renderPartial('index', array('data' => $data));
	}

    public function cekPernahDaftar($thn, $nopok)
    {
        $model = Yii::app()->db->createCommand("SELECT NVL(TBLLBHBAYARPBB_REGLEBIHBAYAR,0) FROM TBLLBHBAYARPBB WHERE TBLLBHBAYARPBB_TAHUN ='$thn' AND TBLLBHBAYARPBB_NOP='$nopok'")->queryScalar();
        return $model;
    }

	public function actionSimpanSKPDLB()
    {
        Yii::import('ext.LokalIndonesia');

        $PARAM = $_REQUEST;
        // echo CJSON::encode($PARAM);Yii::app()->end();

		$TBLLBHBAYARPBB_NOP            = Yii::app()->request->getParam('TBLLBHBAYARPBB_NOP', '');
		$TBLLBHBAYARPBB_TAHUN          = Yii::app()->request->getParam('TBLLBHBAYARPBB_TAHUN', '');
		$TBLLBHBAYARPBB_NAMAWP         = Yii::app()->request->getParam('TBLLBHBAYARPBB_NAMAWP', '');
		$TBLLBHBAYARPBB_ALAMATWP       = Yii::app()->request->getParam('TBLLBHBAYARPBB_ALAMATWP', '');
		$TBLLBHBAYARPBB_TGL            = Yii::app()->request->getParam('TBLLBHBAYARPBB_TGL', '');
   
		$TBLLBHBAYARPBB_REGLEBIHBAYAR  = (int)Yii::app()->request->getParam('TBLLBHBAYARPBB_REGLEBIHBAYAR', 0);
		$TBLLBHBAYARPBB_TERHUTANG      = LokalIndonesia::toAngka(Yii::app()->request->getParam('TBLLBHBAYARPBB_TERHUTANG', 0));
		$TBLLBHBAYARPBB_RUPIAHLBHBAYAR = LokalIndonesia::toAngka(Yii::app()->request->getParam('TBLLBHBAYARPBB_RUPIAHLBHBAYAR', 0));
		$TBLLBHBAYARPBB_TERBAYAR       = LokalIndonesia::toAngka(Yii::app()->request->getParam('TBLLBHBAYARPBB_TERBAYAR', 0));

        $cekLB = $this->cekPernahDaftar($TBLLBHBAYARPBB_TAHUN, $TBLLBHBAYARPBB_NOP); // cek sudah ada lebihbayar?
        if ($cekLB) {
        	echo CJSON::encode(array('status' => 'exists', 'message' => 'Sudah terdata Lebih Bayar'));
        	Yii::app()->end();
        }

		$format = 'yyyy-mm-dd hh24:mi:ss';
		$lb     = strtotime($TBLLBHBAYARPBB_TGL) ? date('Y-m-d H:i:s', strtotime($TBLLBHBAYARPBB_TGL . ' ' . date('H:i:s'))) : null;
		$LB_TGL = new CDbExpression("TO_DATE('" . $lb . "',  ' " . $format . " ') ");

        $command = Yii::app()->db->createCommand();
        $column = array(
			"TBLLBHBAYARPBB_NOP" => $TBLLBHBAYARPBB_NOP,
			"TBLLBHBAYARPBB_TAHUN" => $TBLLBHBAYARPBB_TAHUN,

			"TBLLBHBAYARPBB_NAMAWP" => $TBLLBHBAYARPBB_NAMAWP,
			"TBLLBHBAYARPBB_ALAMATWP" => $TBLLBHBAYARPBB_ALAMATWP,
			"TBLLBHBAYARPBB_TGL" => $LB_TGL,
			"TBLLBHBAYARPBB_TGLLEBIHBAYAR" => LokalIndonesia::TanggalUmum($lb),
			"TBLLBHBAYARPBB_REGLEBIHBAYAR" => $TBLLBHBAYARPBB_REGLEBIHBAYAR,
			"TBLLBHBAYARPBB_TERHUTANG" => $TBLLBHBAYARPBB_TERHUTANG,
			"TBLLBHBAYARPBB_RUPIAHLBHBAYAR" => $TBLLBHBAYARPBB_RUPIAHLBHBAYAR,
			"TBLLBHBAYARPBB_TERBAYAR" => $TBLLBHBAYARPBB_TERBAYAR,
        );

        // echo CJSON::encode($column);Yii::app()->end();

        $simpan = $command->insert("TBLLBHBAYARPBB", $column);

        if ($simpan >= 0) {
            echo CJSON::encode(array('status' => 'success', 'message' => 'Terdata Lebih Bayar'));
        } else {
            echo CJSON::encode(array('status' => 'failed', 'message' => 'Gagal terdata Lebih Bayar'));
        }
    }

    public function actionCetakWord()
    {
        // error_reporting(0);

        // baca file template, yg dipakai
        // $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');

        // echo "$query";

        // $data['list_kartudata'] = Yii::app()->db->createCommand($query)->queryAll();

        $path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_skpdkb' . DIRECTORY_SEPARATOR;
        $namatpl = $path_tpl . 'skpdlb_pbb.docx';

        Yii::import('ext.DMOpenTBS', true);
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

		$NOP   = Yii::app()->request->getParam('TBLLBHBAYARPBB_NOP');
		$TAHUN = Yii::app()->request->getParam('TBLLBHBAYARPBB_TAHUN');

        $TBLLB = "TBLLBHBAYARPBB";

        $select = "
        {$TBLLB}.*
        ";
        $from = "{$TBLLB}";

        $otherquery = array(
        );

        $filter = array(
            "EQ__TBLLBHBAYARPBB_NOP" => $NOP,
            "EQ__TBLLBHBAYARPBB_TAHUN" => $TAHUN,
        );

        $arrayConfig = array('select' => $select, 'from' => $from, 'filter' => $filter, 'otherquery' => $otherquery, 'mode' => 'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);
        $data['cetak']['{$TBLLB}_PAJAKPERIKSA'] = '';
        $data['cetak']['{$TBLLB}_BLNLBAWAL'] = '';
        $data['cetak']['{$TBLLB}_BLNLBAKHIR'] = '';
        $data['cetak']['NMREK']  = 'PAJAK BUMI DAN BANGUNAN (PBB)';
        $data['cetak']['TBLREKENING_KODEFULL']  = '4.1.1.15';
        $data['cetak']['bnmkec']  = '';
        $data['cetak']['bnmkel']  = '';
        $data['cetak']['pnmkec']  = '';
        $data['cetak']['pnmkel']  = '';

        $sql2 = "SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 6";
        $data['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();

        $dt = array();

        $dt['nopok'] = $data['cetak']['TBLLBHBAYARPBB_NOP'];
        $dt['jabatan'] = $data['jab2']['TBLPEJABAT_URAIAN'];
        $dt['petugas'] = $data['jab2']['TBLPEJABAT_NAMA'];
        $dt['nip'] = $data['jab2']['TBLPEJABAT_NIP'];

        $dt['thnkb'] = strtotime($data['cetak']["TBLLBHBAYARPBB_TGL"]) ? ($data['cetak']["TBLLBHBAYARPBB_TGL"]) : '-';
        $dt['blnawal'] = '-';
        $dt['blnakhir'] = '-';
        $dt['regkb'] = $data['cetak']["TBLLBHBAYARPBB_REGLEBIHBAYAR"];

        $dt['namabadan'] = ''; //$data['cetak']['TBLLBHBAYARPBB_NAMAWP'];
        $dt['alamatbadan'] = ''; //$data['cetak']['TBLDAFTAR_BADANUSAHAALAMAT'];
        $dt['namapemilik'] = $data['cetak']['TBLLBHBAYARPBB_NAMAWP'];
        $dt['alamatpemilik'] = $data['cetak']['TBLLBHBAYARPBB_ALAMATWP'];

        $dt['kodefull'] = $data['cetak']['TBLREKENING_KODEFULL'];

        $dt['namarek'] = $data['cetak']['NMREK'];

        $dt['namarek'] = $data['cetak']['NMREK'];

        // $dt['jatuhtempo'] = $data['cetak']["{$this->namatabel}_TGLBTSKRGBAYAR"] .'/'. $data['cetak']["{$this->namatabel}_BLNBTSKRGBAYAR"] .'/20'.$data['cetak']["{$this->namatabel}_THNBTSKRGBAYAR"];

        $dt['pajakperiksa'] = LokalIndonesia::rupiah($data['cetak']["TBLLBHBAYARPBB_TERHUTANG"]);
        $dt['terbayar'] = LokalIndonesia::rupiah($data['cetak']["TBLLBHBAYARPBB_TERBAYAR"]);
        $dt['rupiahlb'] = LokalIndonesia::rupiah($data['cetak']["TBLLBHBAYARPBB_RUPIAHLBHBAYAR"]);
        $dt['terbilang'] = LokalIndonesia::terbilangangka($data['cetak']["TBLLBHBAYARPBB_RUPIAHLBHBAYAR"]);


        $dt['thnpajak'] = $data['cetak']['TBLLBHBAYARPBB_TAHUN'];

        $dt['npwpd'] = $NOP;

        // $dt['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
        $dt['datenow'] = date('d') . ' ' . LokalIndonesia::getbulan(date('m')) . ' ' . date('Y');

        //SAMPAI SINI QUERYNYA

        // var_dump($data);
        // echo json_encode($data['cetak']);Yii::app()->end();
        // echo json_encode($row);

        // Merge data in the first sheet 
        $npwpd = $data['cetak']['TBLLBHBAYARPBB_NOP'];
        $thn = $data['cetak']['TBLLBHBAYARPBB_TAHUN'];
        $namafileDL = "SKPD LEBIH BAYAR - {$this->PAJAK_NAMA} - {$npwpd} - {$thn}.docx";
        $otbs->MergeField('dt', $dt);
        // $otbs->MergeField('setoran', $setoran); 
        // $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

        $otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
        Yii::app()->end();
    }
}