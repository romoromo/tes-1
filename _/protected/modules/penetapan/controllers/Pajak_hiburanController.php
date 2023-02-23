<?php

class Pajak_hiburanController extends Controller
{
    public function init()
    {
        Yii::import('ext.DBFetch');
    }

    public function actionIndex()
    {
        $year = substr(date("Y"),2);
        $data['kecamatan'] = Yii::app()->db->createCommand("SELECT * FROM REFKECAMATAN")->queryAll();
        $data['last_nota'] = Yii::app()->db->createCommand("SELECT
            NVL (MAX(TBLDAFTTANAH_URUTSKPD), 0)+1 AS NOSKP1
        FROM
            TBLDAFTTANAH
        WHERE
            TBLPENDATAAN_THNPAJAK = ".$year."
        AND NVL (TBLDAFTTANAH_URUTSKPD, 0) <> 0
        ORDER BY
            TBLDAFTTANAH_URUTSKPD DESC")->queryScalar();
        $data['total_data'] = 100000000000;
        // $data['kelurahan'] = Kelurahan::model()->findAll();
        $this->renderPartial('index', array('data'=>$data));
    }

    public function actionGetData()
    {
        $id_eksepsi = trim(isset($_REQUEST['id_eksepsi']) ? $_REQUEST['id_eksepsi'] : '', ',');
        $TBLPENDATAAN_THNPAJAK = (int)DMOrcl::getRequest('param', 'TBLPENDATAAN_THNPAJAK');
        $TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];
        $data['nourut'] = $TBLDAFTHIBURAN_URUTSKPD = (int)DMOrcl::getRequest('param', 'TBLDAFTHIBURAN_URUTSKPD');
        $TBLKECAMATAN_ID = !empty(DMOrcl::getRequest('param', 'TBLKECAMATAN_ID')) ? (int)DMOrcl::getRequest('param', 'TBLKECAMATAN_ID') : '';
        $TBLDAFTREKLAME_ISJNSPENETAPAN = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_ISJNSPENETAPAN');
        $TBLDAFTHIBURAN_TGLENTRI = strtotime($_REQUEST['param']['TBLDAFTHIBURAN_TGLENTRI']) ? date('Y-m-d', strtotime($_REQUEST['TBLDAFTHIBURAN_TGLENTRI'])) : '';
        $data['tglskpd'] = strtotime($_REQUEST['param']['TBLDAFTHIBURAN_TGLSKPD']) ? date('Y-m-d', strtotime($_REQUEST['param']['TBLDAFTHIBURAN_TGLSKPD'])) : '';
        // $data['tglskpd'] = $TBLDAFTHIBURAN_TGLSKPD = strtotime($_REQUEST['param']['TBLDAFTHIBURAN_TGLSKPD']) ? date('Y-m-d', strtotime($_REQUEST['TBLDAFTHIBURAN_TGLSKPD'])) : '';

        // $exptglentri = explode('-', $TBLDAFTHIBURAN_TGLENTRI);
        // $tglentri = $exptglentri[1];

        $select = "
            CONCAT (
            TBLDAFTHIBURAN_TGLSKPD,
                CONCAT (
                    '/',
                    CONCAT (
                        TBLDAFTHIBURAN_BLNSKPD,
                        (
                            CONCAT (
                                '/20',
                                TBLDAFTHIBURAN_THNSKPD
                            )
                        )
                    )
                )
            ) AS TGL_SKPD,
            TBLDAFTAR.TBLDAFTAR_NOPOK AS TBLDAFTAR_NOPOK,
            TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA AS NAMA_USAHA,
            TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT AS LOKASI,
            TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA AS NAMA_PEMILIK,
            TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA AS KEC_ID,
            TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA AS KEL_ID,
            TBLDAFTHIBURAN_OMSETPAJAK AS OMZET,
            TBLDAFTHIBURAN_PAJAK AS PAJAK,
            TBLDAFTHIBURAN_PERSENTARIF AS TARIFPC,
            TBLDAFTAR.TBLDAFTAR_GOLONGAN,
            TBLDAFTHIBURAN.*,
            CONCAT (
                    TBLDAFTHIBURAN_TGLENTRI,
                    CONCAT (
                        '/',
                        CONCAT (
                            TBLDAFTHIBURAN_BLNENTRI,
                            (
                                CONCAT (
                                    '/20',
                                    TBLDAFTHIBURAN_THNENTRI
                                )
                            )
                        )
                    )
                ) AS TBLDAFTHIBURAN_TGLENTRI
        ";
        $from = 'TBLDAFTHIBURAN';
        $filter = array(
             'EQ__TBLDAFTHIBURAN.TBLPENDATAAN_THNPAJAK' => substr($TBLPENDATAAN_THNPAJAK, -2)
            ,'EQ__TBLDAFTHIBURAN.TBLPENDATAAN_BLNPAJAK'=>(int) $TBLPENDATAAN_BLNPAJAK
            // ,'EQ__TBLDAFTHIBURAN.TBLKECAMATAN_ID' => $TBLKECAMATAN_ID
            // ,'EQ__TBLDAFTHIBURAN.TBLDAFTHIBURAN_ISJNSPENETAPAN' => $TBLDAFTHIBURAN_ISJNSPENETAPAN
            //,'EQ__TBLDAFTHIBURAN_TGLENTRI'=>$tglentri
        );

        $otherquery = array(
            'leftjoin_wpr'=>array('TBLDAFTAR','TBLDAFTAR.TBLDAFTAR_NOPOK=TBLDAFTHIBURAN.TBLDAFTAR_NOPOK')
            ,'leftjoin_REFKECAMATAN'=>array('REFKECAMATAN','REFKECAMATAN.REFKECAMATAN_ID=TBLDAFTHIBURAN.TBLKECAMATAN_ID')
            ,'leftjoin_REFKELURAHAN'=>array('REFKELURAHAN','REFKELURAHAN.REFKELURAHAN_ID=TBLDAFTHIBURAN.TBLKELURAHAN_ID')
            ,'andwhere'=> '
            NVL (TBLDAFTHIBURAN_URUTSKPD, 0) = 0
            '/*-- AND TNPWPD.TBLDAFTAR_NOPOK <> 0
            -- AND TNPWPD.TBLDAFTAR_NOPOK <> 150000'*/
        );

        if (!empty($id_eksepsi)) {
            $list_nopok = explode(',', $id_eksepsi);
            $where_nopok = '' ;
            foreach ($list_nopok as $kodene) {
                $pch   = explode('-', $kodene);
                $nopok = isset($pch[0]) ? $pch[0] : 0;
                $thn   = isset($pch[1]) ? $pch[1] : 0;
                $bln   = isset($pch[2]) ? $pch[2] : 0;
                $tgl   = isset($pch[3]) ? $pch[3] : 0;

                $where_nopok .= " AND NOT (TBLDAFTAR.TBLDAFTAR_NOPOK = $nopok AND TBLPENDATAAN_THNPAJAK = $thn AND TBLPENDATAAN_BLNPAJAK = $bln  AND TBLPENDATAAN_TGLPAJAK = $tgl ) ";
            }
            $otherquery['andwhere'] .= $where_nopok;
        }

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
        $data['ketetapan'] = DBFetch::query($arrayConfig);

        $this->renderPartial('grid', array('data'=>$data));
    }

    public function actionTetapkanPajakHiburan()
    {
        $listPajakHiburan = trim($_REQUEST['listPajakHiburan'],',');

        $TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
        $TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];
        $TBLDAFTHIBURAN_TGLSKPD = date('Y-m-d',strtotime( $_REQUEST['TBLDAFTHIBURAN_TGLSKPD'] ));
        $TBLDAFTHIBURAN_TGLBATASSKPD = date('Y-m-d',strtotime( $_REQUEST['TBLDAFTHIBURAN_TGLBATASSKPD'] ));

        $THNPAJAK = substr($TBLPENDATAAN_THNPAJAK, -2);
        $BLNPAJAK = (int)$TBLPENDATAAN_BLNPAJAK;
        $TGLSKPD = explode('-', $TBLDAFTHIBURAN_TGLSKPD);
        $TGLBATASSKPD = explode('-', $TBLDAFTHIBURAN_TGLBATASSKPD);

        $PajakAirList = explode(',', $listPajakHiburan);
        foreach ($PajakAirList as $list) {
            $expList = explode('-', $list);
           /* $nopokok = $expList[0];
            $nourut = $expList[1];
            $pajak = $expList[2]!='' ? $expList[2] : 0;*/

            $nopokok = isset($expList[0]) ? $expList[0] : 0;
            $thn   = isset($expList[1]) ? $expList[1] : 0;
            $bln   = isset($expList[2]) ? $expList[2] : 0;
            $tgl   = isset($expList[3]) ? $expList[3] : 0;
            $nourut   = isset($expList[4]) ? $expList[4] : 0;
            $pajak   = isset($expList[5]) ? $expList[5] : 0;

            $update = Yii::app()->db->createCommand();

            $query = $update->update('TBLDAFTHIBURAN', array(
                 'TBLDAFTHIBURAN_THNSKPD' => substr($TGLSKPD[0], -2)
                ,'TBLDAFTHIBURAN_BLNSKPD' => (int) $TGLSKPD[1]
                ,'TBLDAFTHIBURAN_TGLSKPD' => $TGLSKPD[2]
                ,'TBLDAFTHIBURAN_NOMORSKPD' => $nourut
                ,'TBLDAFTHIBURAN_URUTSKPD' => $nourut
                ,'TBLDAFTHIBURAN_PAJAKSKPD' => $pajak
                ,'TBLDAFTHIBURAN_THNBATASSKPD' => substr($TGLBATASSKPD[0], -2)
                ,'TBLDAFTHIBURAN_BLNBATASSKPD' => (int) $TGLBATASSKPD[1]
                ,'TBLDAFTHIBURAN_TGLBATASSKPD' => $TGLBATASSKPD[2]
            ), 'TBLDAFTAR_NOPOK=:nopok AND TBLPENDATAAN_THNPAJAK=:thn AND TBLPENDATAAN_BLNPAJAK=:bln AND TBLPENDATAAN_TGLPAJAK=:tgl', array(':nopok'=>$nopokok,':thn'=>$THNPAJAK,':bln'=>$BLNPAJAK,':tgl'=>$tgl));

            if ($query>0) {
                echo CJSON::encode(array('status'=>'success','nopokok'=>$nopokok));
            }
            else{
                echo CJSON::encode(array('status'=>'failed','nopokok'=>$nopokok));
            }

            /*print_r($query);*/
        }
    }

    public function actionGetNoNotaAkhir()
    {
        $tahun = (int)$_REQUEST['tahun'];
        $splthn = substr($tahun, -2);

        $data = Yii::app()->db->createCommand("
        SELECT
        NVL(MAX(TBLDAFTHIBURAN.TBLDAFTHIBURAN_URUTSKPD), 0) + 1 AS NOMORURUT
        FROM
        TBLDAFTHIBURAN
        WHERE
        TBLDAFTHIBURAN.TBLPENDATAAN_THNPAJAK = ".$splthn."")->queryRow();

        echo CJSON::encode($data);
    }
}