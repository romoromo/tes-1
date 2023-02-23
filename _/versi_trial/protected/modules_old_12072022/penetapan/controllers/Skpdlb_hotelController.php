<?php

class Skpdlb_hotelController extends Controller
{
    var $KODE_GOL    = 3;
    var $PAJAK_AYAT  = 1;
    var $PAJAK_REK   = '4.1.1.1.0';
    var $MODUL_URL   = 'penetapan/skpdlb_hotel';

    public $namatabel  = 'TBLDAFTHOTEL';
    public $PAJAK_NAMA = 'HOTEL';

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

        $this->renderPartial('index', array('data' => $data));
    }

    public function actionautocomplete()
    {
        header('Content-type: text/json');
        header('Content-type: application/json');

        $query = trim($_REQUEST['query']);

        $select = "{$this->namatabel}.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT";
        $from = "{$this->namatabel}";
        $filter = array(
            'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA' => $query, 'LK__TBLDAFTAR.TBLDAFTAR_NOPOK' => $query
        );

        $filter_AND = array(
            //'EQ__TREKENING_KODE' => '4110100'
            // ,'EQ__tblsubyek_jenisusaha' => $jenisusaha
            // ,'EQ__tblsubyek_isaktif' => "T"
        );

        $otherquery = array(
            'limit' => 30, 'join' => array('TBLDAFTAR', "TBLDAFTAR.TBLDAFTAR_NOPOK = {$this->namatabel}.TBLDAFTAR_NOPOK"), 'order' => "{$this->namatabel}.TBLDAFTAR_NOPOK ASC", 'group' => "{$this->namatabel}.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT"
        );

        $arrayConfig = array('select' => $select, 'from' => $from, 'filter' => $filter, 'filter_AND' => $filter_AND, 'filterOR' => true, 'otherquery' => $otherquery, 'mode' => 'LIST');
        $results = DBFetch::query($arrayConfig);

        $suggestions = array();

        foreach ($results as $result) {
            $suggestions[] = array(
                "value" => $result['TBLDAFTAR_NOPOK'] . ' | ' . $result['TBLDAFTAR_BADANUSAHANAMA'], "data" => $result['TBLDAFTAR_NOPOK'], "TBLDAFTAR_BADANUSAHANAMA" => $result['TBLDAFTAR_BADANUSAHANAMA'], "TBLDAFTAR_BADANUSAHAALAMAT" => $result['TBLDAFTAR_BADANUSAHAALAMAT'], "TBLDAFTAR_NOPOK" => $result['TBLDAFTAR_NOPOK']
            );
        }

        echo CJSON::encode(array('suggestions' => $suggestions));
    }

    public function actionGetNoSKPDLB()
    {
        $tahun = $_REQUEST['tahun'];
        $splthn = substr($tahun, -2);

        $data = Yii::app()->db->createCommand("SELECT
			MAX(TO_NUMBER (TO_CHAR(NVL(TBLLBHBAYAR_REGLEBIHBAYAR, 0))))+1 AS nolb
		FROM
			TBLLBHBAYAR
		WHERE
			TBLPENDATAAN_THNPAJAK = :thn
			AND TBLLBHBAYAR_REKAYAT = :ayat
			AND NVL (TBLLBHBAYAR_REGLEBIHBAYAR, 0) <> 0
		ORDER BY
			TO_NUMBER (TO_CHAR(NVL(nolb, 0))) DESC")
            ->bindParam(":thn", $splthn)
            ->bindParam(":ayat", $this->PAJAK_AYAT)
            ->queryRow();

        echo CJSON::encode($data);
    }

    public function actiongetdata()
    {
        $TBLDAFTAR_NOPOK = trim($_POST['TBLDAFTAR_NOPOK']);
        $tglpajak = (int)Yii::app()->request->getParam('tgl_pajak', 0);
        $bulan_akhir = trim($_POST['bulan_pajak']);
        $tahun = trim($_POST['tahun']);
        $tahun_substr = substr($tahun, 2, 4);
        $proses = $this->cekProses($tahun_substr, $bulan_akhir, $TBLDAFTAR_NOPOK, $tglpajak); //cek SPT
        $cek = $this->cekPernahDaftar($tahun_substr, $bulan_akhir, $TBLDAFTAR_NOPOK, $tglpajak); // cek sudah ada lebihbayar
        $cekbayar = $this->cekBayar($tahun_substr, $bulan_akhir, $TBLDAFTAR_NOPOK, $tglpajak);

        if ($proses == '') {
            $data['data'] = 'belum terdaftar';
        } elseif (!$cekbayar) {
            $data['data'] = 'belum bayar';
        } elseif ($cek > 0) {

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

			
			NVL(TBLLBHBAYAR.REFLEBIHBAYAR_TERBAYAR, 0) AS REFLEBIHBAYAR_TERBAYAR,
			NVL(TBLLBHBAYAR.TBLLBHBAYAR_NOMORPERIKSA, 0) AS TBLLBHBAYAR_NOMORPERIKSA,
			NVL(TBLLBHBAYAR.TBLLBHBAYAR_PAJAKPERIKSA, 0) AS TBLLBHBAYAR_PAJAKPERIKSA,
			NVL(TBLLBHBAYAR.TBLLBHBAYAR_REGLEBIHBAYAR, 0) AS TBLLBHBAYAR_REGLEBIHBAYAR,

			NVL(TBLLBHBAYAR.TBLLBHBAYAR_TGLLEBIHBAYAR,0) AS TBLLBHBAYAR_TGLLEBIHBAYAR,
			NVL(TBLLBHBAYAR.TBLLBHBAYAR_BLNLEBIHBAYAR,0) AS TBLLBHBAYAR_BLNLEBIHBAYAR,
			NVL(TBLLBHBAYAR.TBLLBHBAYAR_THNLEBIHBAYAR,0) AS TBLLBHBAYAR_THNLEBIHBAYAR,

			NVL(TBLLBHBAYAR.TBLLBHBAYAR_RUPIAHLBHBAYAR,0) AS TBLLBHBAYAR_RUPIAHLBHBAYAR,
			NVL(TBLLBHBAYAR.TBLLBHBAYAR_TGLPERIKSA,0) AS TBLLBHBAYAR_TGLPERIKSA,
			NVL(TBLLBHBAYAR.TBLLBHBAYAR_BLNPERIKSA,0) AS TBLLBHBAYAR_BLNPERIKSA,
			NVL(TBLLBHBAYAR.TBLLBHBAYAR_THNPERIKSA,0) AS TBLLBHBAYAR_THNPERIKSA

			";
            $from = 'TBLDAFTAR';
            $filter = array(
                'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
            );

            $filter_AND = array(
                'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL, 'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT, "EQ__TBLLBHBAYAR.TBLPENDATAAN_THNPAJAK" => $tahun_substr, "EQ__TBLLBHBAYAR.TBLPENDATAAN_BLNPAJAK" => $bulan_akhir
            );

            $otherquery = array(
                'limit' => 30, 'join' => array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA'), 'join_2' => array('TBLLBHBAYAR', "TBLDAFTAR.TBLDAFTAR_NOPOK = TBLLBHBAYAR.TBLDAFTAR_NOPOK"), 'order' => 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC'
            );
            $model = DBFetch::query(array('select' => $select, 'from' => $from, 'filter' => $filter, 'filter_AND' => $filter_AND, 'filterOR' => true, 'otherquery' => $otherquery, 'mode' => 'DETAIL'));

            $data['TBLDAFTAR_BADANUSAHANAMA'] = $model['TBLDAFTAR_BADANUSAHANAMA'];
            $data['TBLDAFTAR_BADANUSAHAALAMAT'] = $model['TBLDAFTAR_BADANUSAHAALAMAT'];
            $data['REKENING_KODE'] = $model['REKENING_KODE'];
            $data['TREKENING_TARIF'] = $model['REFBADANUSAHA_PERSEN'];

            $data['REFBADANUSAHA_REKPENDAPATAN'] = $model['REFBADANUSAHA_REKPENDAPATAN'];
            $data['REFBADANUSAHA_REKPAD'] = $model['REFBADANUSAHA_REKPAD'];
            $data['REFBADANUSAHA_REKPJK'] = $model['REFBADANUSAHA_REKPJK'];
            $data['REFBADANUSAHA_REKAYAT'] = $model['REFBADANUSAHA_REKAYAT'];
            $data['REFBADANUSAHA_REKJENIS'] = $model['REFBADANUSAHA_REKJENIS'];

            $data['REFLEBIHBAYAR_TERBAYAR'] = $model['REFLEBIHBAYAR_TERBAYAR'];
            $data['TBLLBHBAYAR_NOMORPERIKSA'] = $model['TBLLBHBAYAR_NOMORPERIKSA'];
            $data['TBLLBHBAYAR_PAJAKPERIKSA'] = $model['TBLLBHBAYAR_PAJAKPERIKSA'];
            $data['TBLLBHBAYAR_REGLEBIHBAYAR'] = $model['TBLLBHBAYAR_REGLEBIHBAYAR'];
            $data['TBLLBHBAYAR_RUPIAHLBHBAYAR'] = $model['TBLLBHBAYAR_RUPIAHLBHBAYAR'];

            $data['TBLLBHBAYAR_TGLPERIKSA'] = sprintf('%02d', $model['TBLLBHBAYAR_TGLPERIKSA']);
            $data['TBLLBHBAYAR_BLNPERIKSA'] = sprintf('%02d', $model['TBLLBHBAYAR_BLNPERIKSA']);
            $data['TBLLBHBAYAR_THNPERIKSA'] = $model['TBLLBHBAYAR_THNPERIKSA'];

            $data['TBLLBHBAYAR_TGLLEBIHBAYAR'] = sprintf('%02d', $model['TBLLBHBAYAR_TGLLEBIHBAYAR']);
            $data['TBLLBHBAYAR_BLNLEBIHBAYAR'] = sprintf('%02d', $model['TBLLBHBAYAR_BLNLEBIHBAYAR']);
            $data['TBLLBHBAYAR_THNLEBIHBAYAR'] = $model['TBLLBHBAYAR_THNLEBIHBAYAR'];
        } elseif ($cekbayar) {

            $data['data'] = 'sudah terdaftar';

            $select = "
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TRIM(TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA) AS TBLDAFTAR_BADANUSAHANAMA,
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
			REFBADANUSAHA.REFBADANUSAHA_PERSEN
			";
            $from = 'TBLDAFTAR';
            $filter = array(
                'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
            );

            $filter_AND = array(
                'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL, 'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT, "EQ__{$this->namatabel}.TBLPENDATAAN_THNPAJAK" => $tahun_substr, "EQ__{$this->namatabel}.TBLPENDATAAN_BLNPAJAK" => $bulan_akhir
                // ,"EQ__{$this->namatabel}.{$this->namatabel}_BLNKBAKHIR" => $bulan_akhir
                // ,'EQ__tblsubyek_isaktif' => "T"
            );

            $otherquery = array(
                'limit' => 30, 'join' => array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA'), 'join_2' => array("{$this->namatabel}", "TBLDAFTAR.TBLDAFTAR_NOPOK = {$this->namatabel}.TBLDAFTAR_NOPOK"), 'order' => 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC'
            );
            $model = DBFetch::query(array('select' => $select, 'from' => $from, 'filter' => $filter, 'filter_AND' => $filter_AND, 'filterOR' => true, 'otherquery' => $otherquery, 'mode' => 'DETAIL'));

            $data['TBLDAFTAR_BADANUSAHANAMA'] = $model['TBLDAFTAR_BADANUSAHANAMA'];
            $data['TBLDAFTAR_BADANUSAHAALAMAT'] = $model['TBLDAFTAR_BADANUSAHAALAMAT'];
            $data['REKENING_KODE'] = $model['REKENING_KODE'];
            $data['TREKENING_TARIF'] = $model['REFBADANUSAHA_PERSEN'];

            $data['REFBADANUSAHA_REKPENDAPATAN'] = $model['REFBADANUSAHA_REKPENDAPATAN'];
            $data['REFBADANUSAHA_REKPAD'] = $model['REFBADANUSAHA_REKPAD'];
            $data['REFBADANUSAHA_REKPJK'] = $model['REFBADANUSAHA_REKPJK'];
            $data['REFBADANUSAHA_REKAYAT'] = $model['REFBADANUSAHA_REKAYAT'];
            $data['REFBADANUSAHA_REKJENIS'] = $model['REFBADANUSAHA_REKJENIS'];
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
        $namatpl = $path_tpl . 'skpdlb.docx';

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

        $NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
        $TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
        $THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2, 4);
        $TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];

        $TBLLB = "TBLLBHBAYAR";

        $select = "
        {$this->namatabel}.*,
        {$TBLLB}.*,
        NVL({$TBLLB}.{$TBLLB}_PAJAKPERIKSA, 0) AS {$TBLLB}_PAJAKPERIKSA, 
        NVL({$TBLLB}.{$TBLLB}_BLNLBAWAL, 0) AS {$TBLLB}_BLNLBAWAL, 
        NVL({$TBLLB}.{$TBLLB}_BLNLBAKHIR, 0) AS {$TBLLB}_BLNLBAKHIR, 
        TBLDAFTAR.*, (
		SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
			TBLREKENING
		WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = {$this->namatabel}.{$this->namatabel}_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = {$this->namatabel}.{$this->namatabel}_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = {$this->namatabel}.{$this->namatabel}_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = {$this->namatabel}.{$this->namatabel}_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = {$this->namatabel}.{$this->namatabel}_REKJENIS
		) AS NMREK,
		(
			SELECT
			TBLREKENING.TBLREKENING_KODEFULL
			FROM
			TBLREKENING
			WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = {$this->namatabel}.{$this->namatabel}_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = {$this->namatabel}.{$this->namatabel}_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = {$this->namatabel}.{$this->namatabel}_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = {$this->namatabel}.{$this->namatabel}_REKAYAT
			AND TBLREKENING.TBLREKENING_REKJENIS = {$this->namatabel}.{$this->namatabel}_REKJENIS
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
        $from = "{$TBLLB}";

        $otherquery = array(
            'leftjoin_daft' => array("{$this->namatabel}", "
            	{$TBLLB}.TBLDAFTAR_NOPOK = {$this->namatabel}.TBLDAFTAR_NOPOK
            	AND {$TBLLB}.TBLPENDATAAN_THNPAJAK = {$this->namatabel}.TBLPENDATAAN_THNPAJAK
            	AND {$TBLLB}.TBLPENDATAAN_BLNPAJAK = {$this->namatabel}.TBLPENDATAAN_BLNPAJAK
            	AND NVL({$TBLLB}.TBLPENDATAAN_TGLPAJAK, 0) = NVL({$this->namatabel}.TBLPENDATAAN_TGLPAJAK, 0)
            "),
            'leftjoin_daftar' => array('TBLDAFTAR', "TBLDAFTAR.TBLDAFTAR_NOPOK = {$this->namatabel}.TBLDAFTAR_NOPOK"),
        );

        $filter = array(
            "EQ__{$this->namatabel}.TBLDAFTAR_NOPOK" => $NOPOK,
            "EQ__{$this->namatabel}.TBLPENDATAAN_THNPAJAK" => $THNPJK,
            "EQ__{$this->namatabel}.TBLPENDATAAN_BLNPAJAK" => $TBLPENDATAAN_BLNPAJAK,
        );

        $arrayConfig = array('select' => $select, 'from' => $from, 'filter' => $filter, 'otherquery' => $otherquery, 'mode' => 'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);

        $sql2 = "SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 6";
        $data['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();

        $dt = array();

        $dt['nopok'] = $data['cetak']['TBLDAFTAR_NOPOK'];
        $dt['jabatan'] = $data['jab2']['TBLPEJABAT_URAIAN'];
        $dt['petugas'] = $data['jab2']['TBLPEJABAT_NAMA'];
        $dt['nip'] = $data['jab2']['TBLPEJABAT_NIP'];

        $dt['thnkb'] = '20' . $data['cetak']["TBLLBHBAYAR_THNLEBIHBAYAR"];
        $dt['blnawal'] = LokalIndonesia::getbulan($data['cetak']["TBLLBHBAYAR_BLNLBAWAL"]);
        $dt['blnakhir'] = LokalIndonesia::getbulan($data['cetak']["TBLLBHBAYAR_BLNLBAKHIR"]);
        $dt['regkb'] = $data['cetak']["TBLLBHBAYAR_REGLEBIHBAYAR"];

        $dt['namabadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHANAMA'];
        $dt['namapemilik'] = $data['cetak']['TBLDAFTAR_PEMILIKNAMA'];
        $dt['alamatbadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHAALAMAT'];
        $dt['alamatpemilik'] = $data['cetak']['TBLDAFTAR_PEMILIKALAMAT'];

        $dt['kodefull'] = $data['cetak']['TBLREKENING_KODEFULL'];

        $dt['namarek'] = $data['cetak']['NMREK'];

        $dt['namarek'] = $data['cetak']['NMREK'];

        // $dt['jatuhtempo'] = $data['cetak']["{$this->namatabel}_TGLBTSKRGBAYAR"] .'/'. $data['cetak']["{$this->namatabel}_BLNBTSKRGBAYAR"] .'/20'.$data['cetak']["{$this->namatabel}_THNBTSKRGBAYAR"];

        $dt['pajakperiksa'] = LokalIndonesia::rupiah($data['cetak']["{$TBLLB}_PAJAKPERIKSA"]);
        $dt['terbayar'] = LokalIndonesia::rupiah($data['cetak']["REFLEBIHBAYAR_TERBAYAR"]);
        $dt['rupiahlb'] = LokalIndonesia::rupiah($data['cetak']["{$TBLLB}_RUPIAHLBHBAYAR"]);
        $dt['terbilang'] = LokalIndonesia::terbilangangka($data['cetak']["{$TBLLB}_RUPIAHLBHBAYAR"]);


        $dt['thnpajak'] = '20' . $data['cetak']['TBLPENDATAAN_THNPAJAK'];

        $dt['npwpd'] = $data['cetak']['TBLDAFTAR_JENISPENDAPATAN'] . '.' . $data['cetak']['TBLDAFTAR_GOLONGAN'] . '.' . sprintf("%07d", $data['cetak']['TBLDAFTAR_NOPOK']) . '.' . sprintf("%02d", $data['cetak']['TBLKECAMATAN_IDBADANUSAHA']) . '.' . sprintf("%02d", $data['cetak']['TBLKELURAHAN_IDBADANUSAHA']);

        // $dt['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
        $dt['datenow'] = date('d') . ' ' . LokalIndonesia::getbulan(date('m')) . ' ' . date('Y');

        //SAMPAI SINI QUERYNYA

        // var_dump($data);
        // echo json_encode($data['cetak']);Yii::app()->end();
        // echo json_encode($row);

        // Merge data in the first sheet 
        $npwpd = $data['cetak']['TBLDAFTAR_NOPOK'];
        $thn = $data['cetak']['TBLPENDATAAN_THNPAJAK'];
        $bln = $data['cetak']['TBLPENDATAAN_BLNPAJAK'];
        $namafileDL = "SKPD LEBIH BAYAR - {$this->PAJAK_NAMA} - {$npwpd} - {$thn} - {$bln}.docx";
        $otbs->MergeField('dt', $dt);
        // $otbs->MergeField('setoran', $setoran); 
        // $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

        $otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
        Yii::app()->end();
    }

    public function cekProses($tahun, $bulan, $TBLDAFTAR_NOPOK, $TGL=0)
    {
        $model = Yii::app()->db->createCommand("SELECT TBLPENDATAAN_THNPAJAK FROM $this->namatabel WHERE TBLPENDATAAN_THNPAJAK ='$tahun' AND TBLPENDATAAN_BLNPAJAK='$bulan' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)={$TGL} AND TBLDAFTAR_NOPOK=" . $TBLDAFTAR_NOPOK)->queryScalar();
        return $model;
    }

    public function cekPernahDaftar($thn, $bulan, $nopok, $TGL=0)
    {
    	$TGL = (int)$TGL;
        $model = Yii::app()->db->createCommand("SELECT NVL(TBLLBHBAYAR_REGLEBIHBAYAR,0) FROM TBLLBHBAYAR WHERE TBLPENDATAAN_THNPAJAK ='$thn' AND TBLPENDATAAN_BLNPAJAK='$bulan' AND TBLDAFTAR_NOPOK='$nopok' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)={$TGL}")->queryScalar();
        return $model;
    }

    public function cekBayar($thn, $bulan, $nopok, $TGL=0)
    {
        $model = Yii::app()->db->createCommand("SELECT TBLSETOR_NOMORSSPD FROM TBLSETOR WHERE TBLPENDATAAN_THNPAJAK ='$thn' AND TBLPENDATAAN_BLNPAJAK='$bulan' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)={$TGL} AND TBLDAFTAR_NOPOK='$nopok' AND TRIM(TBLSETOR_JNSBAYAR) = 'SPTPD'")->queryScalar();
        return $model;
    }

    public function actionSimpanSKPDLB()
    {
        Yii::import('ext.LokalIndonesia');

        $PARAM = $_REQUEST;
        // echo CJSON::encode($PARAM);Yii::app()->end();
        $NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
        $TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];

        $THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2, 4);

        $TBLPENDATAAN_BLNPAJAK = Yii::app()->request->getParam('TBLPENDATAAN_BLNPAJAK', '');
        $TBLPENDATAAN_TGLPAJAK = Yii::app()->request->getParam('TBLPENDATAAN_TGLPAJAK', '');

        $TBLLBHBAYAR_TGLLEBIHBAYAR = !empty($_REQUEST["TBLLBHBAYAR_TGLLEBIHBAYAR"]) ? $_REQUEST["TBLLBHBAYAR_TGLLEBIHBAYAR"] : '';

        $TBLLBHBAYAR_TGLPERIKSA = !empty($_REQUEST["TBLLBHBAYAR_TGLPERIKSA"]) ? $_REQUEST["TBLLBHBAYAR_TGLPERIKSA"] : '';

        if ($TBLLBHBAYAR_TGLLEBIHBAYAR != '') {
            $exp_TGLTERIMADAFTAR = explode('-', $TBLLBHBAYAR_TGLLEBIHBAYAR);
            $pecahtgldaftar = $exp_TGLTERIMADAFTAR[0];
            $pecahbulandaftar = $exp_TGLTERIMADAFTAR[1];
            $pecahthndaftar = substr($exp_TGLTERIMADAFTAR[2], -2);
        } else {
            $pecahtgldaftar = '';
            $pecahbulandaftar = '';
            $pecahthndaftar = '';
        }

        $NOMOR_REKENING = explode('.', Yii::app()->request->getParam('NOMOR_REKENING'));

        if ($TBLLBHBAYAR_TGLPERIKSA != '') {
            $exp_TGLPERIKSA = explode('-', $TBLLBHBAYAR_TGLPERIKSA);
            $pecahtglperiksa = $exp_TGLPERIKSA[0];
            $pecahbulanperiksa = $exp_TGLPERIKSA[1];
            $pecahthnperiksa = substr($exp_TGLPERIKSA[2], -2);
        } else {
            $pecahtglperiksa = '';
            $pecahbulanperiksa = '';
            $pecahthnperiksa = '';
        }

		$TBLLBHBAYAR_NOMORPERIKSA   = Yii::app()->request->getParam('TBLLBHBAYAR_NOMORPERIKSA', '');
		$TBLLBHBAYAR_PAJAKPERIKSA   = LokalIndonesia::toAngka(Yii::app()->request->getParam('TBLLBHBAYAR_PAJAKPERIKSA', 0));
		$TBLLBHBAYAR_REGLEBIHBAYAR  = (int)Yii::app()->request->getParam('TBLLBHBAYAR_REGLEBIHBAYAR', 0);
		$TBLLBHBAYAR_BLNLBAWAL      = (int)Yii::app()->request->getParam('TBLLBHBAYAR_BLNLBAWAL', 0);
		$TBLLBHBAYAR_BLNLBAKHIR     = (int)Yii::app()->request->getParam('TBLLBHBAYAR_BLNLBAKHIR', 0);
		$TBLLBHBAYAR_RUPIAHLBHBAYAR = LokalIndonesia::toAngka(Yii::app()->request->getParam('TBLLBHBAYAR_RUPIAHLBHBAYAR', 0));
		$REFLEBIHBAYAR_TERBAYAR     = LokalIndonesia::toAngka(Yii::app()->request->getParam('REFLEBIHBAYAR_TERBAYAR', 0));

        $cekLB = $this->cekPernahDaftar($THNPJK, $TBLPENDATAAN_BLNPAJAK, $NOPOK, $TBLPENDATAAN_TGLPAJAK); // cek sudah ada lebihbayar?
        if ($cekLB) {
        	echo CJSON::encode(array('status' => 'exists', 'message' => 'Sudah terdata Lebih Bayar'));
        	Yii::app()->end();
        }

        $command = Yii::app()->db->createCommand();
        $column = array(
        	"TBLPENDATAAN_THNPAJAK" => $THNPJK,
			"TBLPENDATAAN_BLNPAJAK" => $TBLPENDATAAN_BLNPAJAK,
			"TBLPENDATAAN_TGLPAJAK" => !empty($TBLPENDATAAN_TGLPAJAK) ? $TBLPENDATAAN_TGLPAJAK : null,
			"TBLPENDATAAN_PAJAKKE" => null,
			"TBLDAFTAR_GOLONGAN" => $this->KODE_GOL,
			"TBLDAFTAR_NOPOK" => $NOPOK,

			"TBLLBHBAYAR_REKPENDAPATAN" => $NOMOR_REKENING[7] ? $NOMOR_REKENING[7] : null,
			"TBLLBHBAYAR_REKPAD"        => $NOMOR_REKENING[8] ? $NOMOR_REKENING[8] : null,
			"TBLLBHBAYAR_REKPAJAK"      => $NOMOR_REKENING[9] ? $NOMOR_REKENING[9] : null,
			"TBLLBHBAYAR_REKAYAT"       => $NOMOR_REKENING[10] ? $NOMOR_REKENING[10] : null,
			"TBLLBHBAYAR_REKJENIS"      => $NOMOR_REKENING[11] ? $NOMOR_REKENING[11] : null,

			"TBLLBHBAYAR_TGLPERIKSA" => $pecahtglperiksa,
			"TBLLBHBAYAR_BLNPERIKSA" => $pecahbulanperiksa,
			"TBLLBHBAYAR_THNPERIKSA" => $pecahthnperiksa,
			"TBLLBHBAYAR_NOMORPERIKSA" => $TBLLBHBAYAR_NOMORPERIKSA,
			"TBLLBHBAYAR_PAJAKPERIKSA" => $TBLLBHBAYAR_PAJAKPERIKSA,
			"TBLLBHBAYAR_TGLLEBIHBAYAR" => $pecahtgldaftar,
			"TBLLBHBAYAR_BLNLEBIHBAYAR" => $pecahbulandaftar,
			"TBLLBHBAYAR_THNLEBIHBAYAR" => $pecahthndaftar,
			// "TBLLBHBAYAR_AYTLEBIHBAYAR" => ,
			"TBLLBHBAYAR_REGLEBIHBAYAR" => $TBLLBHBAYAR_REGLEBIHBAYAR,
			// "TBLLBHBAYAR_BUNGALBHBAYAR" => ,
			"TBLLBHBAYAR_RUPIAHLBHBAYAR" => $TBLLBHBAYAR_RUPIAHLBHBAYAR,
			// "TBLLBHBAYAR_THNBTSLBHBAYAR" => ,
			// "TBLLBHBAYAR_BLNBTSLBHBAYAR" => ,
			// "TBLLBHBAYAR_TGLBTSLBHBAYAR" => ,
			"TBLLBHBAYAR_TGLTRMLBHBAYAR" => $pecahtgldaftar,
			"TBLLBHBAYAR_BLNTRMLBHBAYAR" => $pecahbulandaftar,
			"TBLLBHBAYAR_THNTRMLBHBAYAR" => $pecahthndaftar,
			"TBLLBHBAYAR_BLNLBAWAL"  => $TBLLBHBAYAR_BLNLBAWAL,
			"TBLLBHBAYAR_BLNLBAKHIR" => $TBLLBHBAYAR_BLNLBAKHIR,
			// "TBLLBHBAYAR_DENDALBHBAYAR" => ,
			// "TBLLBHBAYAR_NAIKLBHBAYAR" => ,
			"REFLEBIHBAYAR_TERBAYAR" => $REFLEBIHBAYAR_TERBAYAR,
        );

        // echo CJSON::encode($column);Yii::app()->end();

        $simpan = $command->insert("TBLLBHBAYAR", $column);

        if ($simpan >= 0) {
            echo CJSON::encode(array('status' => 'success', 'message' => 'Terdata Lebih Bayar'));
        } else {
            echo CJSON::encode(array('status' => 'failed', 'message' => 'Gagal terdata Lebih Bayar'));
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
