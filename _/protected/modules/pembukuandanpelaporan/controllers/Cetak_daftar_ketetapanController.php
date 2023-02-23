<?php

class Cetak_daftar_ketetapanController extends Controller
{
    public function actionIndex()
    {
        $this->renderPartial('index');
    }

    public function actionCari()
    {
        $JENIS_PAJAK = $_REQUEST['JENIS_PAJAK'] ? $_REQUEST['JENIS_PAJAK'] : '';

        $NOMOR_SKPD = (int)$_REQUEST['NOMOR_SKPD'] ? (int)$_REQUEST['NOMOR_SKPD'] : '';
        $TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'] ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
        $TBLPENDATAAN_TGLPAJAK = $_REQUEST['TBLPENDATAAN_TGLPAJAK'] ? $_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
        $TBLDAFTREKLAME_JNSREKLAME = $_REQUEST['TBLDAFTREKLAME_JNSREKLAME'] ? $_REQUEST['TBLDAFTREKLAME_JNSREKLAME'] : '';

        $TGLENTRI = $_REQUEST['TGLENTRI'] ? $_REQUEST['TGLENTRI'] : '';
        $TGLSKPD = $_REQUEST['TGLSKPD'] ? $_REQUEST['TGLSKPD'] : '';
        // $TGLBATASSKPD = $_REQUEST['TGLBATASSKPD'] ? $_REQUEST['TGLBATASSKPD'] : '';
        // $TGLBATASSKPD = (int)DMOrcl::getRequest('TGLBATASSKPD') ? (int)DMOrcl::getRequest('TGLBATASSKPD') : '';
        // $TGLENTRI = $_REQUEST['TGLENTRI'] ? $_REQUEST['TGLENTRI'] : '';
        // $TGLSKPD = $_REQUEST['TGLSKPD'] ? $_REQUEST['TGLSKPD'] : '';
        // $TGLBATASSKPD = $_REQUEST['TGLBATASSKPD'] ? $_REQUEST['TGLBATASSKPD'] : '';

        $id_eksepsi = trim(isset($_REQUEST['id_eksepsi']) ? $_REQUEST['id_eksepsi'] : '', ',');
        $TBLPENDATAAN_THNPAJAK = (int)DMOrcl::getRequest('TBLPENDATAAN_THNPAJAK') ? (int)DMOrcl::getRequest('TBLPENDATAAN_THNPAJAK') : '';
        // $THNPJK = substr($TBLPENDATAAN_THNPAJAK, -2);
        $data['nourut'] = $TBLDAFTREKLAME_URUTSKPD = (int)DMOrcl::getRequest('param', 'TBLDAFTREKLAME_URUTSKPD') ? (int)DMOrcl::getRequest('param', 'TBLDAFTREKLAME_URUTSKPD') : '';
        $TBLKECAMATAN_ID = !empty(DMOrcl::getRequest('param', 'TBLKECAMATAN_ID')) ? (int)DMOrcl::getRequest('param', 'TBLKECAMATAN_ID') : '';
        $TBLDAFTREKLAME_ISJNSPENETAPAN = !empty(DMOrcl::getRequest('param', 'TBLDAFTREKLAME_ISJNSPENETAPAN')) ? (int)DMOrcl::getRequest('param', 'TBLDAFTREKLAME_ISJNSPENETAPAN') : '';
        $TBLDAFTREKLAME_TGLENTRI = strtotime(DMOrcl::getRequest('param', 'TBLDAFTREKLAME_TGLENTRI')) ? DMOrcl::getRequest('param', 'TBLDAFTREKLAME_TGLENTRI') : '';
        // $data['tglskpd'] = $TBLDAFTREKLAME_TGLSKPD = strtotime($_REQUEST['TBLDAFTREKLAME_TGLSKPD']) ? date('Y-m-d', strtotime($_REQUEST['TBLDAFTREKLAME_TGLSKPD'])) : '';

        // print_r($JENIS_PAJAK);Yii::app()->end();
        // echo $NOMOR_SKPD;die();

        $tglentri = '';
        $blnentri = '';
        $thnentri = '';
        if ( !empty($TGLENTRI) ) {
            $exptglentri = explode('-', $TGLENTRI);
            $tglentri2 = $exptglentri[0];
            $blnentri2 = $exptglentri[1];
            $thnentri2 = $exptglentri[2];
            $tglentri = $tglentri2;
            $blnentri = $blnentri2;
            $thnentri = substr($thnentri2, -2);
        }
        // echo $thnentri;Yii::app()->end();

        $tglskpd = '';
        $blnskpd = '';
        $thnskpd = '';
        if ( !empty($TGLSKPD) ) {
            $exptglskpd = explode('-', $TGLSKPD);
            $tglskpd2 = $exptglskpd[0];
            $blnskpd2 = $exptglskpd[1];
            $thnskpd2 = $exptglskpd[2];
            $tglskpd = $tglskpd2;
            $blnskpd = $blnskpd2;
            $thnskpd = substr($thnskpd2, -2);
        }

        $tglbatas = '';
        $blnbatas = '';
        $thnbatas = '';
        if ( !empty($TGLBATASSKPD) ) {
            $exptglbatas = explode('-', $TGLBATASSKPD);
            $tglbatas2 = $exptglbatas[0];
            $blnbatas2 = $exptglbatas[1];
            $thnbatas2 = $exptglbatas[2];
            $tglbatas = $tglbatas2;
            $blnbatas = $blnbatas2;
            $thnbatas = substr($thnbatas2, -2);
        }


        if ($JENIS_PAJAK=='AIRTANAH') {

               $select = "
                TBLDAFTTANAH_URUTSKPD,
                TBLDAFTTANAH_THNSKPD,
                TBLDAFTAR.TBLDAFTAR_NOPOK,
                TBLPENDATAAN_THNPAJAK,
                TBLPENDATAAN_BLNPAJAK,
                TBLPENDATAAN_TGLPAJAK,
                TBLPENDATAAN_PAJAKKE,
                TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA AS NAMA_USAHA,
                TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA AS NAMA_PEMILIK,
                TBLDAFTAR.TBLDAFTAR_GOLONGAN,
                TBLDAFTTANAH.TBLDAFTTANAH_PAJAK AS PAJAK,
                TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA AS KEC_ID,
                TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA AS KEL_ID,
                TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
                TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
                TBLDAFTTANAH_REKJENIS,
                CONCAT (
                TBLDAFTTANAH_TGLSKPD,
                    CONCAT (
                        '/',
                        CONCAT (
                            TBLDAFTTANAH_BLNSKPD,
                            (
                                CONCAT (
                                    '/20',
                                    TBLDAFTTANAH_THNSKPD
                                )
                            )
                        )
                    )
                ) AS TGL_SKPD,
                CONCAT (
                    TBLDAFTTANAH_TGLENTRI,
                    CONCAT (
                        '/',
                        CONCAT (
                            TBLDAFTTANAH_BLNENTRI,
                            (
                                CONCAT (
                                    '/20',
                                    TBLDAFTTANAH_THNENTRI
                                )
                            )
                        )
                    )
                ) AS TGL_ENTRY,
                CONCAT (
                    TBLDAFTTANAH_TGLSPTPD,
                    CONCAT (
                        '/',
                        CONCAT (
                            TBLDAFTTANAH_BLNSPTPD,
                            (
                                CONCAT (
                                    '/20',
                                    TBLDAFTTANAH_THNSPTPD
                                )
                            )
                        )
                    )
                ) AS TGLSPT,
                TBLPENDATAAN_PAJAKKE AS lOKASI,
                TBLDAFTTANAH.TBLDAFTTANAH_BLNSKPD,
                TBLDAFTTANAH.TBLDAFTTANAH_TGLSKPD,
                TBLDAFTTANAH.TBLDAFTTANAH_REKAYAT,
                TBLDAFTTANAH.TBLDAFTTANAH_REKPAD,
                TBLDAFTTANAH.TBLDAFTTANAH_REKPENDAPATAN,
                TBLDAFTTANAH.TBLDAFTTANAH_REKPAJAK,
                TBLDAFTTANAH.TBLDAFTTANAH_BLNSPTPD,
                TBLDAFTTANAH.TBLDAFTTANAH_TGLSPTPD,
                TBLDAFTTANAH.TBLDAFTTANAH_THNSPTPD,
                TBLDAFTTANAH.TBLKECAMATAN_ID,
                TBLDAFTTANAH.TBLKELURAHAN_ID,
                (
                    SELECT
                        TBLREKENING.TBLREKENING_NAMAREKENING
                    FROM
                        TBLREKENING
                    WHERE
                        TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTTANAH.TBLDAFTTANAH_REKPENDAPATAN
                    AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTTANAH.TBLDAFTTANAH_REKPAD
                    AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTTANAH.TBLDAFTTANAH_REKPAJAK
                    AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTTANAH.TBLDAFTTANAH_REKAYAT
                    AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTTANAH.TBLDAFTTANAH_REKJENIS
                ) AS NMREK,
                TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
                TBLDAFTTANAH_TOTALVOLUME,
                TBLDAFTTANAH_BLNBATASSKPD,
                TBLDAFTTANAH_TGLBATASSKPD,
                TBLDAFTTANAH_THNBATASSKPD,
                TBLDAFTTANAH_REKBIDANG,
                TBLDAFTTANAH_REKDINAS,
                TBLDAFTTANAH_REKKEGIATAN,
                TBLDAFTTANAH_REKORGANISASI,
                TBLDAFTTANAH_REKPEMERINTAHAN,
                TBLDAFTTANAH_REKPROGRAM,
                TBLDAFTTANAH_REKURUSAN,
                TBLDAFTTANAH_NOMORSKPD,
                TBLDAFTTANAH_NOMORSKPD
            ";
            $from = 'TBLDAFTTANAH';
            $filter = array(
                'EQ__TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK' => substr($TBLPENDATAAN_THNPAJAK, -2)
                ,'EQ__TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
                ,'EQ__TBLDAFTTANAH.TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK
                ,'EQ__TBLDAFTTANAH.TBLKECAMATAN_ID' => $TBLKECAMATAN_ID
                ,'EQ__TBLDAFTTANAH.TBLDAFTTANAH_ISJNSPENETAPAN' => $TBLDAFTREKLAME_ISJNSPENETAPAN
                ,'EQ__TBLDAFTTANAH.TBLDAFTTANAH_NOMORSKPD' => $NOMOR_SKPD

                ,'EQ__TBLDAFTTANAH.TBLDAFTTANAH_TGLENTRI' => $tglentri
                ,'EQ__TBLDAFTTANAH.TBLDAFTTANAH_BLNENTRI' => $blnentri
                ,'EQ__TBLDAFTTANAH.TBLDAFTTANAH_THNENTRI' => $thnentri

                ,'EQ__TBLDAFTTANAH.TBLDAFTTANAH_TGLSKPD' => $tglskpd
                ,'EQ__TBLDAFTTANAH.TBLDAFTTANAH_BLNSKPD' => $blnskpd
                ,'EQ__TBLDAFTTANAH.TBLDAFTTANAH_THNSKPD' => $thnskpd

                /*,'EQ__TBLDAFTTANAH.TBLDAFTTANAH_TGLBATASSKPD' => $tglbatas
                ,'EQ__TBLDAFTTANAH.TBLDAFTTANAH_BLNBATASSKPD' => $blnbatas
                ,'EQ__TBLDAFTTANAH.TBLDAFTTANAH_THNBATASSKPD' => $thnbatas*/
            );

            // $tglentri = '';
            // if ( !empty($TBLDAFTREKLAME_TGLENTRI) ) {
            //     $exptglentri = explode('-', $TBLDAFTREKLAME_TGLENTRI);
            //     $tglentri = (int)$exptglentri[0];
            //     $blnentri = (int)$exptglentri[1];
            //     $thnentri = (int)$exptglentri[2];
            //     $filter['EQ__TBLDAFTTANAH_TGLENTRI'] = $tglentri;
            //     $filter['EQ__TBLDAFTTANAH_BLNENTRI'] = $blnentri;
            //     $filter['EQ__TBLDAFTTANAH_THNENTRI'] = substr($thnentri, -2);
            // }

            $otherquery = array(
                'join_tbldaftar'=>array('TBLDAFTAR','TBLDAFTTANAH.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK')
                // ,'leftjoin_REFKECAMATAN'=>array('REFKECAMATAN','REFKECAMATAN.REFKECAMATAN_ID=TBLDAFTREKLAME.TBLKECAMATAN_ID')
                // ,'leftjoin_REFKELURAHAN'=>array('REFKELURAHAN','REFKELURAHAN.REFKELURAHAN_ID=TBLDAFTREKLAME.TBLKELURAHAN_ID')
                ,'andwhere'=> 'TBLDAFTTANAH.TBLDAFTAR_NOPOK <> 150000'/*-- AND TNPWPD.TNPWPD_NOPOK <> 0*/
                ,'order'=>'TBLDAFTTANAH.TBLDAFTTANAH_NOMORSKPD ASC'
                
            );

            if (!empty($id_eksepsi)) {
                $list_nopok = explode(',', $id_eksepsi);
                $where_nopok = '' ;
                foreach ($list_nopok as $kodene) {
                    $pch   = explode('-', $kodene);
                    $nopok = (int) (isset($pch[0]) ? $pch[0] : 0);
                    $thn   = isset($pch[1]) ? $pch[1] : 0;
                    $ke   = (int) (isset($pch[2]) ? $pch[2] : 0);

                    $where_nopok .= " AND NOT (TBLDAFTAR.TBLDAFTAR_NOPOK = $nopok AND TBLPENDATAAN_THNPAJAK = $thn AND TBLPENDATAAN_PAJAKKE = $ke  ) ";
                }
                $otherquery['andwhere'] .= $where_nopok;
            }
        } else {
                $select = "
                TBLDAFTREKLAME_URUTSKPD,
                TBLDAFTREKLAME_THNSKPD,
                TBLDAFTAR.TBLDAFTAR_NOPOK,
                TBLPENDATAAN_THNPAJAK,
                TBLPENDATAAN_BLNPAJAK,
                TBLPENDATAAN_TGLPAJAK,
                TBLPENDATAAN_PAJAKKE,
                TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA AS NAMA_USAHA,
                TBLDAFTAR.TBLDAFTAR_GOLONGAN,
                TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAK AS PAJAK,
                TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME AS KDRE,
                TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
                TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
                TBLDAFTREKLAME_LUAS,
                TBLDAFTREKLAME_JMLHREKLAME,
                TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
                TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
                NISTRA,
                TBLDAFTREKLAME_REKJENIS,
                TBLDAFTREKLAME_KETERANGAN1,
                CONCAT (
                    TBLDAFTREKLAME_TGLSPTPD,
                    CONCAT (
                        '/',
                        CONCAT (
                            TBLDAFTREKLAME_BLNSPTPD,
                            (CONCAT('/20', TBLDAFTREKLAME_THNSPTPD))
                        )
                    )
                ) AS TGLSPT,
                TBLDAFTREKLAME_TGLSKPD,
                TBLDAFTREKLAME_BLNSKPD,
                TBLDAFTREKLAME_THNSKPD,
                TBLPENDATAAN_PAJAKKE AS lOKASI,
                TBLDAFTREKLAME_KETERANGAN2 AS ISI_REKLAME,
                TBLDAFTREKLAME_ISIREKLAME AS KETERANGAN,
                TBLDAFTREKLAME_JMLHREKLAME AS JUMLAH,
                TBLDAFTREKLAME_PANJANG,
                TBLDAFTREKLAME_LEBAR,
                TBLDAFTREKLAME_SKORKAWASAN,
                REFKETINGGIAN_SKOR,
                REFSUDUTPANDANG_SKOR,
                TBLDAFTREKLAME.TBLDAFTREKLAME_NILAISTRATEGIS AS NITI_1,
                TBLDAFTREKLAME.NIJU AS NIJU_1,
                TBLDAFTREKLAME_NILAISEWA,
                TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSKPD,
                TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSKPD,
                TBLDAFTREKLAME.TBLDAFTREKLAME_REKAYAT,
                TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAD,
                TBLDAFTREKLAME.TBLDAFTREKLAME_REKPENDAPATAN,
                TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAJAK,
                TBLDAFTREKLAME.FJ,
                TBLDAFTREKLAME.JAM,
                TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN2,
                TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSPTPD,
                TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSPTPD,
                TBLDAFTREKLAME.TBLDAFTREKLAME_THNSPTPD,
                TBLDAFTREKLAME.TBLKECAMATAN_ID,
                TBLDAFTREKLAME.TBLKELURAHAN_ID,
                TBLDAFTREKLAME.ST,
                (
                    SELECT
                        TBLREKENING.TBLREKENING_NAMAREKENING
                    FROM
                        TBLREKENING
                    WHERE
                        TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPENDAPATAN
                    AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAD
                    AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAJAK
                    AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTREKLAME.TBLDAFTREKLAME_REKAYAT
                    AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTREKLAME.TBLDAFTREKLAME_REKJENIS
                ) AS NMREK,
                TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
                TBLDAFTREKLAME_BLNBATASSKPD,
                TBLDAFTREKLAME_TGLBATASSKPD,
                TBLDAFTREKLAME_THNBATASSKPD,
                TBLDAFTREKLAME_REKBIDANG,
                TBLDAFTREKLAME_REKDINAS,
                TBLDAFTREKLAME_REKKEGIATAN,
                TBLDAFTREKLAME_REKORGANISASI,
                TBLDAFTREKLAME_REKPEMERINTAHAN,
                TBLDAFTREKLAME_REKPROGRAM,
                TBLDAFTREKLAME_REKURUSAN,
                TBLDAFTREKLAME_NOMORSKPD,
                TBLDAFTREKLAME_ISIREKLAME,
                TBLDAFTREKLAME_NOMORSKPD
            ";
            $from = 'TBLDAFTREKLAME';
            $filter = array(
                'EQ__TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK' => substr($TBLPENDATAAN_THNPAJAK, -2)
                ,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
                ,'EQ__TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK' => $TBLPENDATAAN_TGLPAJAK
                ,'EQ__TBLDAFTREKLAME.TBLKECAMATAN_ID' => $TBLKECAMATAN_ID
                ,'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_ISJNSPENETAPAN' => $TBLDAFTREKLAME_ISJNSPENETAPAN
                ,'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME' => $TBLDAFTREKLAME_JNSREKLAME
                ,'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_NOMORSKPD' => $NOMOR_SKPD

                ,'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRI' => $tglentri
                ,'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRI' => $blnentri
                ,'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRI' => $thnentri

                ,'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSKPD' => $tglskpd
                ,'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSKPD' => $blnskpd
                ,'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_THNSKPD' => $thnskpd

                /*,'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_TGLBATASSKPD' => $tglbatas
                ,'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_BLNBATASSKPD' => $blnbatas
                ,'EQ__TBLDAFTREKLAME.TBLDAFTREKLAME_THNBATASSKPD' => $thnbatas*/
            );

            $otherquery = array(
                'join_tbldaftar'=>array('TBLDAFTAR','TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK')
                // ,'leftjoin_REFKECAMATAN'=>array('REFKECAMATAN','REFKECAMATAN.REFKECAMATAN_ID=TBLDAFTREKLAME.TBLKECAMATAN_ID')
                // ,'leftjoin_REFKELURAHAN'=>array('REFKELURAHAN','REFKELURAHAN.REFKELURAHAN_ID=TBLDAFTREKLAME.TBLKELURAHAN_ID')
                ,'andwhere'=> 'TBLDAFTREKLAME.TBLDAFTAR_NOPOK <> 150000'/*-- AND TNPWPD.TNPWPD_NOPOK <> 0*/
                ,'order'=>'TBLDAFTREKLAME.TBLDAFTREKLAME_NOMORSKPD ASC'
                
            );

            if (!empty($id_eksepsi)) {
                $list_nopok = explode(',', $id_eksepsi);
                $where_nopok = '' ;
                foreach ($list_nopok as $kodene) {
                    $pch   = explode('-', $kodene);
                    $nopok = (int) (isset($pch[0]) ? $pch[0] : 0);
                    $thn   = isset($pch[1]) ? $pch[1] : 0;
                    $ke   = (int) (isset($pch[2]) ? $pch[2] : 0);

                    $where_nopok .= " AND NOT (TBLDAFTAR.TBLDAFTAR_NOPOK = $nopok AND TBLPENDATAAN_THNPAJAK = $thn AND TBLPENDATAAN_PAJAKKE = $ke  ) ";
                }
                $otherquery['andwhere'] .= $where_nopok;
            }
        }

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
        $data['ketetapan'] = DBFetch::query($arrayConfig);

        if ($JENIS_PAJAK=='AIRTANAH') {
            $this->renderPartial('grid-airtanah', array('data'=>$data));
        } else {
            $this->renderPartial('grid-reklame', array('data'=>$data));
        }
    }

    public function actionTetapkanPajak()
    {
        $listPajak = trim($_REQUEST['listPajak'],',');
        $TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
        // $TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];
        $TBLDAFTREKLAME_TGLSKPD = date('Y-m-d',strtotime( $_REQUEST['TBLDAFTREKLAME_TGLSKPD'] ));
        $TBLDAFTREKLAME_TGLBATASSKPD = date('Y-m-d',strtotime( $_REQUEST['TBLDAFTREKLAME_TGLBATASSKPD'] ));

        $THNPAJAK = substr($TBLPENDATAAN_THNPAJAK, -2);
        // $BLNPAJAK = (int)$TBLPENDATAAN_BLNPAJAK;
        $TGLSKPD = explode('-', $TBLDAFTREKLAME_TGLSKPD);
        $TGLBATASSKPD = explode('-', $TBLDAFTREKLAME_TGLBATASSKPD);

        $PajakList = explode(',', $listPajak);
        // print_r($PajakList);

        foreach ($PajakList as $list) {
            $pch = explode('-', $list);
            $nopokok = isset($pch[0]) ? $pch[0] : 0;
            $thn    = isset($pch[1]) ? $pch[1] : 0;
            $ke     = isset($pch[2]) ? $pch[2] : 0;
            $nourut = isset($pch[3]) ? $pch[3] : 0;
            $pajak  = isset($pch[4]) ? $pch[4] : 0;

            $update = Yii::app()->db->createCommand();

            $query = $update->update('TBLDAFTREKLAME', array(
                 'TBLDAFTREKLAME_THNSKPD' => substr($TGLSKPD[0], -2)
                ,'TBLDAFTREKLAME_BLNSKPD' => (int) $TGLSKPD[1]
                ,'TBLDAFTREKLAME_TGLSKPD' => $TGLSKPD[2]
                ,'TBLDAFTREKLAME_NOMORSKPD' => $nourut
                ,'TBLDAFTREKLAME_URUTSKPD' => $nourut
                ,'TBLDAFTREKLAME_PAJAKSKPD' => $pajak
                ,'TBLDAFTREKLAME_THNBATASSKPD' => substr($TGLBATASSKPD[0], -2)
                ,'TBLDAFTREKLAME_BLNBATASSKPD' => (int) $TGLBATASSKPD[1]
                ,'TBLDAFTREKLAME_TGLBATASSKPD' => $TGLBATASSKPD[2]
            ), 'TBLDAFTAR_NOPOK=:nopok AND TBLPENDATAAN_THNPAJAK=:thn AND TBLPENDATAAN_PAJAKKE=:ke', array(':nopok'=>$nopokok,':thn'=>$THNPAJAK /*,':bln'=>$BLNPAJAK*/ ,':ke'=>$ke));
            
            if ($query>0) {
                echo CJSON::encode(array('status'=>'success','nopokok'=>$nopokok));
            }
            else{
                echo CJSON::encode(array('status'=>'failed','nopokok'=>$nopokok));
            }
        }
    }

    public function actionCetakSKPDWordAirtanah()
    {
        // error_reporting(0);

        // baca file template, yg dipakai
        // $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
        
        // $data['filter'] = isset($_REQUEST['data']) ? base64_decode($_REQUEST['data']) : '';

        // $explodefilter = explode(',', $data['filter']);

        // $kodefikasi = explode('-', $explodefilter);

        // $nopokok = $kodefikasi[0];
        // $tahunpjk = $kodefikasi[1];
        // $bulanpjk = $kodefikasi[2];
        // $noskp = $kodefikasi[3];
        // $nominalpjk = $kodefikasi[4];

        $data['filter'] = isset($_REQUEST['data']) ? base64_decode($_REQUEST['data']) : '';

        if (!empty($data['filter'])) {
            $data['filter'] = explode(',', $data['filter']);
        } else {
            echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
            Yii::app()->end();
        }

        $flag = '';
        $query = '';
        foreach ($data['filter'] as $kodefikasi) {
            $kodefikasi = explode('-', $kodefikasi);
            if (is_array($kodefikasi)) {
                if (!isset($kodefikasi[0]) OR !isset($kodefikasi[1]) OR !isset($kodefikasi[2]) OR !isset($kodefikasi[3]) OR !isset($kodefikasi[4]) ) {
                    echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
                    Yii::app()->end();
                }
                $nopokok = $kodefikasi[0];
                $tahunpjk = $kodefikasi[1];
                $bulanpjk = $kodefikasi[2];
                $noskp = $kodefikasi[3] ? $kodefikasi[3] : '0' ;
                $nominalpjk = $kodefikasi[4];

                $query .= 
                $flag . 
                "
                SELECT TBLDAFTTANAH.*, TBLDAFTAR.*
                ,( SELECT TBLREKENING_NAMAREKENING FROM TBLREKENING WHERE 
                TBLREKENING_REKPENDAPATAN=TBLDAFTTANAH_REKPENDAPATAN
                AND TBLREKENING_REKPAD=TBLDAFTTANAH_REKPAD
                AND TBLREKENING_REKPAJAK=TBLDAFTTANAH_REKPAJAK
                AND TBLREKENING_REKAYAT=TBLDAFTTANAH_REKAYAT
                AND TBLREKENING_REKJENIS=TBLDAFTTANAH_REKJENIS
                 ) AS NMREK
                FROM TBLDAFTTANAH
                JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTTANAH.TBLDAFTAR_NOPOK
                WHERE 
                TBLDAFTTANAH.TBLDAFTAR_NOPOK = $nopokok
                AND TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = $tahunpjk
                AND TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK = $bulanpjk
                AND NVL(TBLDAFTTANAH.TBLDAFTTANAH_NOMORSKPD, 0) = $noskp
                ";
                $flag = '
                UNION
                ';

            }
        }
        // echo "$query";
        $data['list_skpd'] = Yii::app()->db->createCommand($query)->queryAll();

        $path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_skpd' . DIRECTORY_SEPARATOR;
        $namatpl = $path_tpl . 'SKPD_PAT.docx';

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

            

        $skpd = array();
        $rows = array();
        
        foreach ($data['list_skpd'] as $kolom) :

            $skpd['no'] = null;
            $skpd['nopok'] = $kolom['TBLDAFTAR_NOPOK'];
            $skpd['noskp'] = $kolom['TBLDAFTTANAH_NOMORSKPD'];
            $skpd['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
            $skpd['alamatbadan'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
            $skpd['thnpajak'] = '20'. $kolom['TBLPENDATAAN_THNPAJAK'];

            $skpd['blnpajak'] = LokalIndonesia::getBulan($kolom['TBLPENDATAAN_BLNPAJAK']);
            $skpd['npwpd'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. $kolom['TBLDAFTAR_NOPOK'] .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);
            
            $skpd['tglbatasskpd'] = $kolom['TBLDAFTTANAH_TGLBATASSKPD'] .' '. LokalIndonesia::getBulan($kolom['TBLDAFTTANAH_BLNBATASSKPD']) .' '. '20'. $kolom['TBLDAFTTANAH_THNBATASSKPD'];
            $skpd['rekkode'] = $kolom['TBLDAFTTANAH_REKURUSAN'] .'.'. $kolom['TBLDAFTTANAH_REKPEMERINTAHAN'] .'.'. $kolom['TBLDAFTTANAH_REKORGANISASI'] .'.'. $kolom['TBLDAFTTANAH_REKPROGRAM'] .'.'. $kolom['TBLDAFTTANAH_REKKEGIATAN'] .'.'. $kolom['TBLDAFTTANAH_REKDINAS'] .'.'. $kolom['TBLDAFTTANAH_REKBIDANG'] .'.'. $kolom['TBLDAFTTANAH_REKPENDAPATAN'] .'.'. $kolom['TBLDAFTTANAH_REKPAD'] .'.'. $kolom['TBLDAFTTANAH_REKPAJAK'] .'.'. $kolom['TBLDAFTTANAH_REKAYAT'] .'.'. $kolom['TBLDAFTTANAH_REKJENIS'];

            $skpd['nmrek'] = $kolom['NMREK'];
            $skpd['vol'] = $kolom['TBLDAFTTANAH_TOTALVOLUME'];

            $skpd['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTTANAH_PAJAK']);
            $skpd['bunga'] = LokalIndonesia::ribuan($kolom['TBLDAFTTANAH_BUNGASPTPD']);

            $skpd['total'] = LokalIndonesia::ribuan($kolom['TBLDAFTTANAH_PAJAK']+$kolom['TBLDAFTTANAH_BUNGASPTPD']);
            $skpd['terbilang'] = LokalIndonesia::terbilangangka($kolom['TBLDAFTTANAH_PAJAK']+$kolom['TBLDAFTTANAH_BUNGASPTPD']);

            $skpd['tglcetak'] = date('d') .' '. LokalIndonesia::getBulan(date('m'));
            $skpd['thncetak'] = date('Y');

            $skpd['tglskpd'] = $kolom['TBLPENDATAAN_TGLPAJAK'];
            $skpd['blnskpd'] = LokalIndonesia::getBulan($kolom['TBLPENDATAAN_BLNPAJAK']);
            $skpd['thnskpd'] = '20'. $kolom['TBLPENDATAAN_THNPAJAK'];

        array_push($rows, $skpd);

        endforeach;

        //SAMPAI SINI QUERYNYA

        // var_dump($data);
        // echo json_encode($data);Yii::app()->end();
        // echo json_encode($row);

        // Merge data in the first sheet 
        // $npwpd = $data['TBLDAFTAR_NOPOK'];
        $namafileDL = "SKPD-AIRTANAH.docx";
        $otbs->MergeBlock('skpd', $rows); 
        // $otbs->MergeField('setoran', $setoran); 
        // $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

        $otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
        Yii::app()->end();
    }

    public function actionCetakSKPDWord()
    {
        // error_reporting(0);

        // baca file template, yg dipakai
        // $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
        
        // $data['filter'] = isset($_REQUEST['data']) ? base64_decode($_REQUEST['data']) : '';

        // $explodefilter = explode(',', $data['filter']);

        // $kodefikasi = explode('-', $explodefilter);

        // $nopokok = $kodefikasi[0];
        // $tahunpjk = $kodefikasi[1];
        // $bulanpjk = $kodefikasi[2];
        // $noskp = $kodefikasi[3];
        // $nominalpjk = $kodefikasi[4];

        $data['filter'] = isset($_REQUEST['data']) ? base64_decode($_REQUEST['data']) : '';

        if (!empty($data['filter'])) {
            $data['filter'] = explode(',', $data['filter']);
        } else {
            echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
            Yii::app()->end();
        }

        $flag = '';
        $query = '';

        foreach ($data['filter'] as $kodefikasi) {
            $kodefikasi = explode('-', $kodefikasi);
            if (is_array($kodefikasi)) {
                if (!isset($kodefikasi[0]) OR !isset($kodefikasi[1]) OR !isset($kodefikasi[2]) OR !isset($kodefikasi[3]) OR !isset($kodefikasi[4]) ) {
                    echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
                    Yii::app()->end();
                }
                $nopokok = $kodefikasi[0];
                $tahunpjk = $kodefikasi[1];
                $lokasikode = $kodefikasi[2];
                $nourutskp = $kodefikasi[3];
                $nominalpjk = $kodefikasi[4];

                $query .= 
                $flag . 
                "
                
               SELECT
                    TBLDAFTREKLAME_URUTSKPD,
                    TBLDAFTREKLAME_THNSKPD,
                    TBLDAFTAR.TBLDAFTAR_NOPOK AS NOPOK,
                    TBLPENDATAAN_THNPAJAK,
                    TBLPENDATAAN_BLNPAJAK,
                    TBLPENDATAAN_TGLPAJAK,
                    TBLPENDATAAN_PAJAKKE,
                    TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA AS NAMA_USAHA,
                    TBLDAFTAR.TBLDAFTAR_GOLONGAN,
                    TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAK AS PAJAK,
                    TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME AS KDRE,
                    TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
                    TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
                    TBLDAFTREKLAME_LUAS,
                    TBLDAFTREKLAME_JMLHREKLAME,
                    TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
                    TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
                    nistra,
                    TBLDAFTREKLAME_REKJENIS,
                    TBLDAFTREKLAME_KETERANGAN1,
                    CONCAT (
                        TBLDAFTREKLAME_TGLSPTPD,
                        CONCAT (
                            '/',
                            CONCAT (
                                TBLDAFTREKLAME_BLNSPTPD,
                                (CONCAT('/20', TBLDAFTREKLAME_THNSPTPD))
                            )
                        )
                    ) AS TGLSPT,
                    TBLPENDATAAN_PAJAKKE AS LOKASI,
                    TBLDAFTREKLAME_KETERANGAN1 AS ISI_REKLAME1,
                    TBLDAFTREKLAME_KETERANGAN2 AS ISI_REKLAME2,
                    TBLDAFTREKLAME_ISIREKLAME AS KETERANGAN,
                    TBLDAFTREKLAME_JMLHREKLAME AS JUMLAH,
                    TBLDAFTREKLAME_PANJANG,
                    TBLDAFTREKLAME_LEBAR,
                    TBLDAFTREKLAME_SKORKAWASAN,
                    REFKETINGGIAN_SKOR,
                    REFSUDUTPANDANG_SKOR,
                    TBLDAFTREKLAME.TBLDAFTREKLAME_NILAISTRATEGIS AS niti_1,
                    TBLDAFTREKLAME.NIJU AS niju_1,
                    TBLDAFTREKLAME_NILAISEWA,
                    TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSKPD,
                    TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSKPD,
                    TBLDAFTREKLAME.TBLDAFTREKLAME_REKAYAT,
                    TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAD,
                    TBLDAFTREKLAME.TBLDAFTREKLAME_REKPENDAPATAN,
                    TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAJAK,
                    TBLDAFTREKLAME.FJ,
                    TBLDAFTREKLAME.JAM,
                    TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN2,
                    TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSPTPD,
                    TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSPTPD,
                    TBLDAFTREKLAME.TBLDAFTREKLAME_THNSPTPD,
                    TBLDAFTREKLAME.TBLKECAMATAN_ID,
                    TBLDAFTREKLAME.TBLKELURAHAN_ID,
                    TBLDAFTREKLAME.ST,
                    (
                        SELECT
                            TBLREKENING.TBLREKENING_NAMAREKENING
                        FROM
                            TBLREKENING
                        WHERE
                            TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPENDAPATAN
                        AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAD
                        AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAJAK
                        AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTREKLAME.TBLDAFTREKLAME_REKAYAT
                        AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTREKLAME.TBLDAFTREKLAME_REKJENIS
                    ) AS NMREK,
                    TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
                    TBLDAFTREKLAME_BLNBATASSKPD,
                    TBLDAFTREKLAME_TGLBATASSKPD,
                    TBLDAFTREKLAME_THNBATASSKPD,
                    TBLDAFTREKLAME_THNMULAIREKLAME,
                    TBLDAFTREKLAME_BLNMULAIREKLAME,
                    TBLDAFTREKLAME_TGLMULAIREKLAME,
                    TBLDAFTREKLAME_THNAKHIRREKLAME,
                    TBLDAFTREKLAME_BLNAKHIRREKLAME,
                    TBLDAFTREKLAME_TGLAKHIRREKLAME,
                    TBLDAFTREKLAME_REKBIDANG,
                    TBLDAFTREKLAME_REKDINAS,
                    TBLDAFTREKLAME_REKKEGIATAN,
                    TBLDAFTREKLAME_REKORGANISASI,
                    TBLDAFTREKLAME_REKPEMERINTAHAN,
                    TBLDAFTREKLAME_REKPROGRAM,
                    TBLDAFTREKLAME_REKURUSAN,
                    TBLDAFTREKLAME_NOMORSKPD,
                    TBLDAFTREKLAME_ISIREKLAME,
                    TBLDAFTREKLAME_DENDAKRGBAYAR
                FROM
                    TBLDAFTREKLAME
                INNER JOIN TBLDAFTAR ON TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
                WHERE 
                    TBLDAFTAR.TBLDAFTAR_NOPOK = $nopokok
                AND NVL (TBLDAFTREKLAME_URUTSKPD, 0) = $nourutskp
                AND TBLPENDATAAN_THNPAJAK = $tahunpjk
                AND TBLPENDATAAN_PAJAKKE = $lokasikode
                -- AND TBLDAFTREKLAME_THNSKPD = $tahunpjk
                -- AND TBLDAFTREKLAME_TGLSKPD = '11'
                -- ORDER BY
                    -- NVL (TBLDAFTREKLAME_URUTSKPD, 0)

                ";
                $flag = '
                UNION
                ';

            }
        }
        // echo "$query";Yii::app()->end();
        $data['list_skpd'] = Yii::app()->db->createCommand($query)->queryAll();

        $path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_skpd' . DIRECTORY_SEPARATOR;
        $namatpl = $path_tpl . 'SKPD_REKLAME.docx';

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

        $skpd = array();
        $rows = array();
        
        foreach ($data['list_skpd'] as $kolom) :

            $skpd['no'] = null;
            $skpd['nopok'] = sprintf("%07d",$kolom['NOPOK']);

            if ($kolom['KDRE']=='T') {
                $skpd['jenis'] = 'Tahunan';
            } else if($kolom['KDRE']=='I') {
                $skpd['jenis'] = $kolom['TBLPENDATAAN_TGLPAJAK'] .' '. LokalIndonesia::getBulan($kolom['TBLPENDATAAN_BLNPAJAK']) .' 20'. $kolom['TBLPENDATAAN_THNPAJAK'];
            } else {
                $skpd['jenis'] = 'Tahunan';
            }

            if ($kolom['KDRE']=='T') {
                $skpd['jenis2'] = '/Tahunan';
            } else if ($kolom['KDRE']=='I') {
                $skpd['jenis2'] = '/Pajak Bulan';
            } else {
                $skpd['jenis2'] = '/Tahunan';
            }
            $skpd['noskp'] = $kolom['TBLDAFTREKLAME_NOMORSKPD'];
            $skpd['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
            $skpd['alamatbadan'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
            $skpd['thnpajak'] = '20'. $kolom['TBLPENDATAAN_THNPAJAK'];
            $skpd['lokasi'] = $kolom['LOKASI'];
            $skpd['keterangan'] = $kolom['KETERANGAN'];
            $skpd['isireklame1'] = $kolom['ISI_REKLAME1'];
            $skpd['isireklame2'] = $kolom['ISI_REKLAME2'];
            $skpd['tglmulaireklame'] = $kolom['TBLDAFTREKLAME_TGLMULAIREKLAME'] .' '. LokalIndonesia::getBulan($kolom['TBLDAFTREKLAME_BLNMULAIREKLAME']) .' '. '20'. $kolom['TBLDAFTREKLAME_THNMULAIREKLAME'];
            $skpd['tglakhirreklame'] = $kolom['TBLDAFTREKLAME_TGLAKHIRREKLAME'] .' '. LokalIndonesia::getBulan($kolom['TBLDAFTREKLAME_BLNAKHIRREKLAME']) .' '. '20'. $kolom['TBLDAFTREKLAME_THNAKHIRREKLAME'];
            $skpd['npwpd'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d",$kolom['NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);
            
            $skpd['tglbatasskpd'] = $kolom['TBLDAFTREKLAME_TGLBATASSKPD'] .' '. LokalIndonesia::getBulan($kolom['TBLDAFTREKLAME_BLNBATASSKPD']) .' '. '20'. $kolom['TBLDAFTREKLAME_THNBATASSKPD'];
            $skpd['rekkode'] = $kolom['TBLDAFTREKLAME_REKURUSAN'] .'.'. $kolom['TBLDAFTREKLAME_REKPEMERINTAHAN'] .'.'. $kolom['TBLDAFTREKLAME_REKORGANISASI'] .'.'. $kolom['TBLDAFTREKLAME_REKPROGRAM'] .'.'. $kolom['TBLDAFTREKLAME_REKKEGIATAN'] .'.'. $kolom['TBLDAFTREKLAME_REKDINAS'] .'.'. $kolom['TBLDAFTREKLAME_REKBIDANG'] .'.'. $kolom['TBLDAFTREKLAME_REKPENDAPATAN'] .'.'. $kolom['TBLDAFTREKLAME_REKPAD'] .'.'. $kolom['TBLDAFTREKLAME_REKPAJAK'] .'.'. $kolom['TBLDAFTREKLAME_REKAYAT'] .'.'. $kolom['TBLDAFTREKLAME_REKJENIS'];

            $skpd['nmrek'] = $kolom['NMREK'];
            $skpd['vol'] = null;

            $skpd['pajak'] = LokalIndonesia::ribuan($kolom['PAJAK']);
            $skpd['bunga'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_DENDAKRGBAYAR']);

            $skpd['total'] = LokalIndonesia::ribuan($kolom['PAJAK']+$kolom['TBLDAFTREKLAME_DENDAKRGBAYAR']);
            $skpd['terbilang'] = LokalIndonesia::terbilangangka($kolom['PAJAK']+$kolom['TBLDAFTREKLAME_DENDAKRGBAYAR']);

            $skpd['tglskpd'] = $kolom['TBLDAFTREKLAME_TGLSKPD'] .' '. LokalIndonesia::getBulan($kolom['TBLDAFTREKLAME_BLNSKPD']);
            $skpd['blnskpd'] = LokalIndonesia::getBulan($kolom['TBLDAFTREKLAME_BLNSKPD']);
            $skpd['thnskpd'] = '20'. $kolom['TBLDAFTREKLAME_THNSKPD'];

        array_push($rows, $skpd);

        endforeach;

        //SAMPAI SINI QUERYNYA

        // var_dump($data);
        // echo json_encode($skpd);Yii::app()->end();
        // echo json_encode($row);

        // Merge data in the first sheet
        $namafileDL = "SKPD-REKLAME.docx";
        $otbs->MergeBlock('skpd', $rows);
        // $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

        $otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
        // echo "string";Yii::app()->end();
        Yii::app()->end();
    }

    public function actionCetakDaftarWord()
    {
        $tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
        $bulanpjk = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
        // $bulanpjk = $_REQUEST['TBLPENDATAAN_BLNPAJAK'] ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
        $tanggalpjk = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
        $TANGGALSKPD = $_REQUEST['TGLSKPD'] ? $_REQUEST['TGLSKPD'] : '';
        $TBLDAFTREKLAME_JNSREKLAME = $_REQUEST['TBLDAFTREKLAME_JNSREKLAME'] ? $_REQUEST['TBLDAFTREKLAME_JNSREKLAME'] : '';
        // error_reporting(0);

        if ($TANGGALSKPD !='') {
            $exp_TANGGALSKPD = explode('-', $TANGGALSKPD);
            $pecahtglskpd = $exp_TANGGALSKPD[0];
            $pecahbulanskpd = $exp_TANGGALSKPD[1];
            $pecahthnskpd = $exp_TANGGALSKPD[2];
        } else {
            $pecahtglskpd = '';
            $pecahbulanskpd = '';
            $pecahthnskpd = '';
        }

        // baca file template, yg dipakai
        // $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
        
        // $data['filter'] = isset($_REQUEST['data']) ? base64_decode($_REQUEST['data']) : '';

        // $explodefilter = explode(',', $data['filter']);

        // $kodefikasi = explode('-', $explodefilter);

        // $nopokok = $kodefikasi[0];
        // $tahunpjk = $kodefikasi[1];
        // $bulanpjk = $kodefikasi[2];
        // $noskp = $kodefikasi[3];
        // $nominalpjk = $kodefikasi[4];

        $data['filter'] = isset($_REQUEST['data']) ? base64_decode($_REQUEST['data']) : '';

        if (!empty($data['filter'])) {
            $data['filter'] = explode(',', $data['filter']);
        } else {
            echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
            Yii::app()->end();
        }

        $flag = '';
        $query = '';

        foreach ($data['filter'] as $kodefikasi) {
            $kodefikasi = explode('-', $kodefikasi);
            if (is_array($kodefikasi)) {
                if (!isset($kodefikasi[0]) OR !isset($kodefikasi[1]) OR !isset($kodefikasi[2]) OR !isset($kodefikasi[3]) OR !isset($kodefikasi[4]) ) {
                    echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
                    Yii::app()->end();
                }
                $nopokok = $kodefikasi[0];
                $tahunpjk = $kodefikasi[1];
                $lokasikode = $kodefikasi[2];
                $nourutskp = $kodefikasi[3];
                $nominalpjk = $kodefikasi[4];
                $blnpajak = $kodefikasi[5];

                $query .= 
                $flag . 
                "
                SELECT
                    TBLDAFTREKLAME.*, TBLDAFTAR.*, TBLDAFTREKLAME_URUTSKPD AS TBLDAFTREKLAME_URUTSKPD1,
                    (
                        SELECT
                            TBLREKENING.TBLREKENING_NAMAREKENING
                        FROM
                            TBLREKENING
                        WHERE
                            TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPENDAPATAN
                        AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAD
                        AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAJAK
                        AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTREKLAME.TBLDAFTREKLAME_REKAYAT
                        AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTREKLAME.TBLDAFTREKLAME_REKJENIS
                    ) AS NMREK
                FROM
                    TBLDAFTREKLAME,
                    TBLDAFTAR
                WHERE
                    TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
                AND TBLDAFTAR.TBLDAFTAR_NOPOK = $nopokok
                AND TBLPENDATAAN_THNPAJAK = $tahunpjk
                AND TBLPENDATAAN_BLNPAJAK = $blnpajak
                AND TBLDAFTREKLAME_NOMORSKPD = $nourutskp
                AND NVL (TBLPENDATAAN_PAJAKKE, 0) = $lokasikode
                AND NVL (TBLDAFTREKLAME_NOMORSKPD, 0) > '0'

                ";
                $flag = '
                UNION
                ';

            }
        }

        $order = 'ORDER BY TBLDAFTREKLAME_URUTSKPD1 ASC';
        // echo "$query"."$order";;Yii::app()->end();
        $data['list_skpd'] = Yii::app()->db->createCommand($query.$order)->queryAll();

        $path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_skpd' . DIRECTORY_SEPARATOR;
        $namatpl = $path_tpl . 'DAFTAR_SKPD_REK.docx';

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

        $skpd = array();
        $rows = array();
        
        $totalpajak = array('totalpajak'=>0); $skpd = array('blnpajak'=>0); $totaljumrek = array('totaljumrek'=>0); $no=1;foreach ($data['list_skpd'] as $kolom) :

            $skpd['no'] = $no++;
            $skpd['npwpd'] = sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']);

            if ($kolom['TBLDAFTREKLAME_JNSREKLAME']=='T') {
                $skpd['jenis'] = 'Tahunan';
            } else if($kolom['TBLDAFTREKLAME_JNSREKLAME']=='I') {
                $skpd['jenis'] = $kolom['TBLPENDATAAN_TGLPAJAK'] .' '. LokalIndonesia::getBulan($kolom['TBLPENDATAAN_BLNPAJAK']) .' 20'. $kolom['TBLPENDATAAN_THNPAJAK'];
            } else {
                $skpd['jenis'] = 'Tahunan';
            }

            if ($kolom['TBLDAFTREKLAME_JNSREKLAME']=='T') {
                $skpd['jenis2'] = '/Tahunan';
            } else if ($kolom['TBLDAFTREKLAME_JNSREKLAME']=='I') {
                $skpd['jenis2'] = '/Pajak Bulan';
            } else {
                $skpd['jenis2'] = '/Tahunan';
            }

            $totaljumrek['totaljumrek'] += $kolom['TBLDAFTREKLAME_JMLHREKLAME'];
            $totalpajak['totalpajak'] += $kolom['TBLDAFTREKLAME_PAJAK'];

            $skpd['noskp'] = $kolom['TBLDAFTREKLAME_NOMORSKPD'];
            $skpd['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
            $skpd['alamat'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
            $skpd['thnpajak'] = '20'. $kolom['TBLPENDATAAN_THNPAJAK'];
            $skpd['blnpajak'] = $kolom['TBLPENDATAAN_BLNPAJAK'];
            $skpd['lokasi'] = $kolom['TBLPENDATAAN_PAJAKKE'];
            $skpd['keterangan'] = $kolom['TBLDAFTREKLAME_ISIREKLAME'];
            $skpd['isireklame1'] = $kolom['TBLDAFTREKLAME_KETERANGAN1'];
            $skpd['isireklame2'] = $kolom['TBLDAFTREKLAME_KETERANGAN2'];

            $skpd['noskpd'] = $kolom['TBLDAFTREKLAME_NOMORSKPD'];
            $skpd['index'] = $kolom['REFSUDUTPANDANG_SKOR'];
            $skpd['niti'] = $kolom['TBLDAFTREKLAME_NILAISTRATEGIS'];
            $skpd['lbr'] = floatval($kolom['TBLDAFTREKLAME_LEBAR']);
            $skpd['pgj'] = floatval($kolom['TBLDAFTREKLAME_PANJANG']);
            $skpd['sp'] = $kolom['REFKETINGGIAN_SKOR'];

            $skpd['jrek'] = $kolom['TBLDAFTREKLAME_JMLHREKLAME'];
            $skpd['ka'] = $kolom['TBLDAFTREKLAME_SKORKAWASAN'];

            $skpd['nopok'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);
            
            $skpd['tglbatasskpd'] = $kolom['TBLDAFTREKLAME_TGLBATASSKPD'] .' '. LokalIndonesia::getBulan($kolom['TBLDAFTREKLAME_BLNBATASSKPD']) .' '. '20'. $kolom['TBLDAFTREKLAME_THNBATASSKPD'];
            $skpd['rekkode'] = $kolom['TBLDAFTREKLAME_REKURUSAN'] .'.'. $kolom['TBLDAFTREKLAME_REKPEMERINTAHAN'] .'.'. $kolom['TBLDAFTREKLAME_REKORGANISASI'] .'.'. $kolom['TBLDAFTREKLAME_REKPROGRAM'] .'.'. $kolom['TBLDAFTREKLAME_REKKEGIATAN'] .'.'. $kolom['TBLDAFTREKLAME_REKDINAS'] .'.'. $kolom['TBLDAFTREKLAME_REKBIDANG'] .'.'. $kolom['TBLDAFTREKLAME_REKPENDAPATAN'] .'.'. $kolom['TBLDAFTREKLAME_REKPAD'] .'.'. $kolom['TBLDAFTREKLAME_REKPAJAK'] .'.'. $kolom['TBLDAFTREKLAME_REKAYAT'] .'.'. $kolom['TBLDAFTREKLAME_REKJENIS'];

            // $skpd['nmrek'] = $kolom['NMREK'];
            $skpd['nmrek'] = $kolom['TBLDAFTREKLAME_REKPENDAPATAN'] .'.'. $kolom['TBLDAFTREKLAME_REKPAD'] .'.'. $kolom['TBLDAFTREKLAME_REKPAJAK'] .'.'. $kolom['TBLDAFTREKLAME_REKAYAT'] .'.'. $kolom['TBLDAFTREKLAME_REKJENIS'];
            
            $skpd['vol'] = null;

            $skpd['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_PAJAK']);
            $skpd['bunga'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_DENDAKRGBAYAR']);

            $skpd['total'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_PAJAK']+$kolom['TBLDAFTREKLAME_DENDAKRGBAYAR']);
            $skpd['terbilang'] = LokalIndonesia::terbilangangka($kolom['TBLDAFTREKLAME_PAJAK']+$kolom['TBLDAFTREKLAME_DENDAKRGBAYAR']);

            $skpd['tglbts'] = $kolom['TBLDAFTREKLAME_TGLBATASSKPD'] .'-'. $kolom['TBLDAFTREKLAME_BLNBATASSKPD'] .'-20'. $kolom['TBLDAFTREKLAME_THNBATASSKPD'] ;
            $skpd['tglspt'] = $kolom['TBLDAFTREKLAME_TGLENTRI'] .'-'. $kolom['TBLDAFTREKLAME_BLNENTRI'] .'-20'. $kolom['TBLDAFTREKLAME_THNENTRI'] ;

            $skpd['tglskpd'] = $kolom['TBLDAFTREKLAME_TGLSKPD'] .'-'. $kolom['TBLDAFTREKLAME_BLNSKPD'] .'-20'. $kolom['TBLDAFTREKLAME_THNSKPD'] ;
            $skpd['blnskpd'] = LokalIndonesia::getBulan($kolom['TBLDAFTREKLAME_BLNSKPD']);
            $skpd['thnskpd'] = '20'. $kolom['TBLDAFTREKLAME_THNSKPD'];

        array_push($rows, $skpd);

        endforeach;

        $GLOBALS['thnpjk'] = '20'.$tahunpjk;
        // $GLOBALS['blnpjk'] = LokalIndonesia::getbulan( $bulanpjk );
        if ($TBLDAFTREKLAME_JNSREKLAME=='T') {
            $GLOBALS['blnpjk'] = '0';
        } else {
            $GLOBALS['blnpjk'] = LokalIndonesia::getbulan($skpd['blnpajak']);
        }
        $GLOBALS['tglskpd'] = $pecahtglskpd .' '. LokalIndonesia::getbulan($pecahbulanskpd) .' '. $pecahthnskpd;

        if ($TBLDAFTREKLAME_JNSREKLAME=='T') {
            $GLOBALS['rekjen'] = 'Tetap';
        } else if($TBLDAFTREKLAME_JNSREKLAME=='I') {
            $GLOBALS['rekjen'] = 'Insidentil';
        } else if ($TBLDAFTREKLAME_JNSREKLAME=='B') {
            $GLOBALS['rekjen'] = 'Berjalan';
        } else if ($TBLDAFTREKLAME_JNSREKLAME=='') {
            $GLOBALS['rekjen'] = 'Lain - Lain';
        }
    
        

        $header = array();

        $header['totrek'] = $totaljumrek['totaljumrek'];
        $header['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
        $header['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');

        //SAMPAI SINI QUERYNYA

        // var_dump($data);
        // echo json_encode($skpd);Yii::app()->end();
        // echo json_encode($row);

        // Merge data in the first sheet
        $namafileDL = "DAFTAR-SKPD-REKLAME.docx";
        $otbs->MergeBlock('skpd', $rows);
        $otbs->MergeField('header', $header); 
        // $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

        $otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
        // echo "string";Yii::app()->end();
        Yii::app()->end();
    }

    public function actionCetakDaftarWordAirtanah()
    {
        $tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
        $bulanpjk = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
        // $bulanpjk = $_REQUEST['TBLPENDATAAN_BLNPAJAK'] ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
        $tanggalpjk = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
        $TANGGALSKPD = $_REQUEST['TGLSKPD'] ? $_REQUEST['TGLSKPD'] : '';
        // error_reporting(0);

        if ($TANGGALSKPD !='') {
            $exp_TANGGALSKPD = explode('-', $TANGGALSKPD);
            $pecahtglskpd = $exp_TANGGALSKPD[0];
            $pecahbulanskpd = $exp_TANGGALSKPD[1];
            $pecahthnskpd = $exp_TANGGALSKPD[2];
        } else {
            $pecahtglskpd = '';
            $pecahbulanskpd = '';
            $pecahthnskpd = '';
        }

        // baca file template, yg dipakai
        // $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
        
        // $data['filter'] = isset($_REQUEST['data']) ? base64_decode($_REQUEST['data']) : '';

        // $explodefilter = explode(',', $data['filter']);

        // $kodefikasi = explode('-', $explodefilter);

        // $nopokok = $kodefikasi[0];
        // $tahunpjk = $kodefikasi[1];
        // $bulanpjk = $kodefikasi[2];
        // $noskp = $kodefikasi[3];
        // $nominalpjk = $kodefikasi[4];

        $data['filter'] = isset($_REQUEST['data']) ? base64_decode($_REQUEST['data']) : '';

        if (!empty($data['filter'])) {
            $data['filter'] = explode(',', $data['filter']);
        } else {
            echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
            Yii::app()->end();
        }

        $flag = '';
        $query = '';

        foreach ($data['filter'] as $kodefikasi) {
            $kodefikasi = explode('-', $kodefikasi);
            if (is_array($kodefikasi)) {
                if (!isset($kodefikasi[0]) OR !isset($kodefikasi[1]) OR !isset($kodefikasi[2]) OR !isset($kodefikasi[3]) OR !isset($kodefikasi[4]) ) {
                    echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
                    Yii::app()->end();
                }
                $nopokok = $kodefikasi[0];
                $tahunpjk = $kodefikasi[1];
                $blnpajak = $kodefikasi[2];
                $nourutskp = $kodefikasi[3] ? $kodefikasi[3] : '0';
                $nominalpjk = $kodefikasi[4];

                $query .= 
                $flag . 
                "
                SELECT
                    TBLDAFTTANAH.*, TBLDAFTAR.*, TBLDAFTTANAH_URUTSKPD AS TBLDAFTTANAH_URUTSKPD1,
                    (
                        SELECT
                            TBLREKENING.TBLREKENING_NAMAREKENING
                        FROM
                            TBLREKENING
                        WHERE
                            TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTTANAH.TBLDAFTTANAH_REKPENDAPATAN
                        AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTTANAH.TBLDAFTTANAH_REKPAD
                        AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTTANAH.TBLDAFTTANAH_REKPAJAK
                        AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTTANAH.TBLDAFTTANAH_REKAYAT
                        AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTTANAH.TBLDAFTTANAH_REKJENIS
                    ) AS NMREK
                FROM
                    TBLDAFTTANAH,
                    TBLDAFTAR
                WHERE
                    TBLDAFTTANAH.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
                AND TBLDAFTAR.TBLDAFTAR_NOPOK = $nopokok
                AND TBLPENDATAAN_THNPAJAK = $tahunpjk
                AND TBLPENDATAAN_BLNPAJAK = $blnpajak
                AND TBLDAFTTANAH_NOMORSKPD = $nourutskp
                AND NVL (TBLDAFTTANAH_NOMORSKPD, 0) > '0'

                ";
                $flag = '
                UNION
                ';

            }
        } 
        $order = 'ORDER BY TBLDAFTTANAH_URUTSKPD1 ASC';
        // echo "$query";Yii::app()->end();
        $data['list_skpd'] = Yii::app()->db->createCommand($query.$order)->queryAll();

        $path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_skpd' . DIRECTORY_SEPARATOR;
        $namatpl = $path_tpl . 'DAFTAR_SKPD_PAT.docx';

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

        $skpd = array();
        $rows = array();
        
        $totalpajak = array('totalpajak'=>0); $skpd = array('blnpajak'=>0); $totaljumrek = array('totaljumrek'=>0); $no=1;foreach ($data['list_skpd'] as $kolom) :

            $skpd['no'] = $no++;
            $skpd['npwpd'] = sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']);

            // $totaljumrek['totaljumrek'] += $kolom['TBLDAFTTANAH_JMLHREKLAME'];
            $totalpajak['totalpajak'] += $kolom['TBLDAFTTANAH_PAJAK'];

            $skpd['noskp'] = $kolom['TBLDAFTTANAH_NOMORSKPD'];
            $skpd['namapemilik'] = $kolom['TBLDAFTAR_PEMILIKNAMA'];
            $skpd['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
            $skpd['alamat'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
            $skpd['thnpajak'] = '20'. $kolom['TBLPENDATAAN_THNPAJAK'];
            $skpd['blnpajak'] = $kolom['TBLPENDATAAN_BLNPAJAK'];
            $skpd['lokasi'] = $kolom['TBLPENDATAAN_PAJAKKE'];
            // $skpd['keterangan'] = $kolom['TBLDAFTTANAH_ISIREKLAME'];
            // $skpd['isireklame1'] = $kolom['TBLDAFTTANAH_KETERANGAN1'];
            // $skpd['isireklame2'] = $kolom['TBLDAFTTANAH_KETERANGAN2'];

            $skpd['noskpd'] = $kolom['TBLDAFTTANAH_NOMORSKPD'];
            // $skpd['index'] = $kolom['REFSUDUTPANDANG_SKOR'];
            // $skpd['niti'] = $kolom['TBLDAFTTANAH_NILAISTRATEGIS'];
            // $skpd['lbr'] = floatval($kolom['TBLDAFTTANAH_LEBAR']);
            // $skpd['pgj'] = floatval($kolom['TBLDAFTTANAH_PANJANG']);
            // $skpd['sp'] = $kolom['REFKETINGGIAN_SKOR'];

            // $skpd['jrek'] = $kolom['TBLDAFTTANAH_JMLHREKLAME'];
            // $skpd['ka'] = $kolom['TBLDAFTTANAH_SKORKAWASAN'];

            $skpd['nopok'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);
            
            $skpd['tglbatasskpd'] = $kolom['TBLDAFTTANAH_TGLBATASSKPD'] .' '. LokalIndonesia::getBulan($kolom['TBLDAFTTANAH_BLNBATASSKPD']) .' '. '20'. $kolom['TBLDAFTTANAH_THNBATASSKPD'];
            $skpd['rekkode'] = $kolom['TBLDAFTTANAH_REKURUSAN'] .'.'. $kolom['TBLDAFTTANAH_REKPEMERINTAHAN'] .'.'. $kolom['TBLDAFTTANAH_REKORGANISASI'] .'.'. $kolom['TBLDAFTTANAH_REKPROGRAM'] .'.'. $kolom['TBLDAFTTANAH_REKKEGIATAN'] .'.'. $kolom['TBLDAFTTANAH_REKDINAS'] .'.'. $kolom['TBLDAFTTANAH_REKBIDANG'] .'.'. $kolom['TBLDAFTTANAH_REKPENDAPATAN'] .'.'. $kolom['TBLDAFTTANAH_REKPAD'] .'.'. $kolom['TBLDAFTTANAH_REKPAJAK'] .'.'. $kolom['TBLDAFTTANAH_REKAYAT'] .'.'. $kolom['TBLDAFTTANAH_REKJENIS'];

            // $skpd['nmrek'] = $kolom['NMREK'];
            $skpd['nmrek'] = $kolom['TBLDAFTTANAH_REKPENDAPATAN'] .'.'. $kolom['TBLDAFTTANAH_REKPAD'] .'.'. $kolom['TBLDAFTTANAH_REKPAJAK'] .'.'. $kolom['TBLDAFTTANAH_REKAYAT'] .'.'. $kolom['TBLDAFTTANAH_REKJENIS'];
            
            $skpd['vol'] = null;

            $skpd['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTTANAH_PAJAK']);
            $skpd['bunga'] = LokalIndonesia::ribuan($kolom['TBLDAFTTANAH_DENDAKRGBAYAR']);

            $skpd['total'] = LokalIndonesia::ribuan($kolom['TBLDAFTTANAH_PAJAK']+$kolom['TBLDAFTTANAH_DENDAKRGBAYAR']);
            $skpd['terbilang'] = LokalIndonesia::terbilangangka($kolom['TBLDAFTTANAH_PAJAK']+$kolom['TBLDAFTTANAH_DENDAKRGBAYAR']);

            $skpd['tglbatas'] = $kolom['TBLDAFTTANAH_TGLBATASSKPD'] .'-'. $kolom['TBLDAFTTANAH_BLNBATASSKPD'] .'-20'. $kolom['TBLDAFTTANAH_THNBATASSKPD'] ;
            $skpd['tglspt'] = $kolom['TBLDAFTTANAH_TGLSPTPD'] .'-'. $kolom['TBLDAFTTANAH_BLNSPTPD'] .'-20'. $kolom['TBLDAFTTANAH_THNSPTPD'] ;

            $skpd['tglskpd'] = $kolom['TBLDAFTTANAH_TGLSKPD'] .'-'. $kolom['TBLDAFTTANAH_BLNSKPD'] .'-20'. $kolom['TBLDAFTTANAH_THNSKPD'] ;
            $skpd['blnskpd'] = LokalIndonesia::getBulan($kolom['TBLDAFTTANAH_BLNSKPD']);
            $skpd['thnskpd'] = '20'. $kolom['TBLDAFTTANAH_THNSKPD'];

        array_push($rows, $skpd);

        endforeach;

        $GLOBALS['blnpjk'] = $blnpajak;
        $GLOBALS['thnpjk'] = '20'.$tahunpjk;

        $GLOBALS['tglskpd'] = $pecahtglskpd .' '. LokalIndonesia::getbulan($pecahbulanskpd) .' '. $pecahthnskpd;

        $header = array();

        $header['totrek'] = $totaljumrek['totaljumrek'];
        $header['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
        $header['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');

        //SAMPAI SINI QUERYNYA

        // var_dump($data);
        // echo json_encode($skpd);Yii::app()->end();
        // echo json_encode($row);

        // Merge data in the first sheet
        $namafileDL = "DAFTAR-SKPD-AIRTANAH.docx";
        $otbs->MergeBlock('skpd', $rows);
        $otbs->MergeField('header', $header); 
        // $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

        $otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
        // echo "string";Yii::app()->end();
        Yii::app()->end();
    }

    public function actionCetakNotaWordAirtanah()
    {
        $tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
        $bulanpjk = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
        // $bulanpjk = $_REQUEST['TBLPENDATAAN_BLNPAJAK'] ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
        $tanggalpjk = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
        $tglskpd = isset($_REQUEST['TBLDAFTTANAH_TGLSKPD']) && !empty($_REQUEST['TBLDAFTTANAH_TGLSKPD']) ? (int)$_REQUEST['TBLDAFTTANAH_TGLSKPD'] : '';
        // error_reporting(0);

        // baca file template, yg dipakai
        // $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
        
        // $data['filter'] = isset($_REQUEST['data']) ? base64_decode($_REQUEST['data']) : '';

        // $explodefilter = explode(',', $data['filter']);

        // $kodefikasi = explode('-', $explodefilter);

        // $nopokok = $kodefikasi[0];
        // $tahunpjk = $kodefikasi[1];
        // $bulanpjk = $kodefikasi[2];
        // $noskp = $kodefikasi[3];
        // $nominalpjk = $kodefikasi[4];

        $data['filter'] = isset($_REQUEST['data']) ? base64_decode($_REQUEST['data']) : '';

        if (!empty($data['filter'])) {
            $data['filter'] = explode(',', $data['filter']);
        } else {
            echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
            Yii::app()->end();
        }

        $flag = '';
        $query = '';

        foreach ($data['filter'] as $kodefikasi) {
            $kodefikasi = explode('-', $kodefikasi);
            if (is_array($kodefikasi)) {
                if (!isset($kodefikasi[0]) OR !isset($kodefikasi[1]) OR !isset($kodefikasi[2]) OR !isset($kodefikasi[3]) OR !isset($kodefikasi[4]) ) {
                    echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
                    Yii::app()->end();
                }
                $nopokok = $kodefikasi[0];
                $tahunpjk = $kodefikasi[1];
                $blnpajak = $kodefikasi[2];
                $nourutskp = $kodefikasi[3];
                $nominalpjk = $kodefikasi[4];

                $query .= 
                $flag . 
                "
                SELECT
                    TBLDAFTTANAH.*, TBLDAFTAR.*, TBLDAFTTANAH_URUTSKPD AS TBLDAFTTANAH_URUTSKPD1,
                    (
                        SELECT
                            TBLREKENING.TBLREKENING_NAMAREKENING
                        FROM
                            TBLREKENING
                        WHERE
                            TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTTANAH.TBLDAFTTANAH_REKPENDAPATAN
                        AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTTANAH.TBLDAFTTANAH_REKPAD
                        AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTTANAH.TBLDAFTTANAH_REKPAJAK
                        AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTTANAH.TBLDAFTTANAH_REKAYAT
                        AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTTANAH.TBLDAFTTANAH_REKJENIS
                    ) AS NMREK
                FROM
                    TBLDAFTTANAH,
                    TBLDAFTAR
                WHERE
                    TBLDAFTTANAH.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
                AND TBLDAFTAR.TBLDAFTAR_NOPOK = $nopokok
                AND TBLPENDATAAN_THNPAJAK = $tahunpjk
                AND TBLPENDATAAN_BLNPAJAK = $blnpajak
                AND TBLDAFTTANAH_NOMORSKPD = $nourutskp
                AND NVL (TBLDAFTTANAH_NOMORSKPD, 0) > '0'

                ";
                $flag = '
                UNION
                ';

            }
        }
        // echo "$query";Yii::app()->end();
        $data['list_skpd'] = Yii::app()->db->createCommand($query)->queryAll();

        $path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_skpd' . DIRECTORY_SEPARATOR;
        $namatpl = $path_tpl . 'NOTA_SKPD_PAT.docx';

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

        $skpd = array();
        $rows = array();
        
        $totalpajak = array('totalpajak'=>0); $totaljumrek = array('totaljumrek'=>0); $no=1;foreach ($data['list_skpd'] as $kolom) :

            $skpd['no'] = $no++;
            $skpd['nopok_aja'] = sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']);

            // $totaljumrek['totaljumrek'] += $kolom['TBLDAFTTANAH_JMLHREKLAME'];
            $totalpajak['totalpajak'] += $kolom['TBLDAFTTANAH_PAJAK'];

            $skpd['noskp'] = $kolom['TBLDAFTTANAH_NOMORSKPD'];
            $skpd['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
            $skpd['namapemilik'] = $kolom['TBLDAFTAR_PEMILIKNAMA'];
            $skpd['alamat'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
            $skpd['thnpajak'] = '20'. $kolom['TBLPENDATAAN_THNPAJAK'];
            $skpd['lokasi'] = $kolom['TBLPENDATAAN_PAJAKKE'];
            // $skpd['keterangan'] = $kolom['TBLDAFTTANAH_ISIREKLAME'];
            // $skpd['isireklame1'] = $kolom['TBLDAFTTANAH_KETERANGAN1'];
            // $skpd['isireklame2'] = $kolom['TBLDAFTTANAH_KETERANGAN2'];

            $skpd['noskpd'] = $kolom['TBLDAFTTANAH_NOMORSKPD'];
            // $skpd['index'] = $kolom['REFSUDUTPANDANG_SKOR'];
            // $skpd['niti'] = $kolom['TBLDAFTTANAH_NILAISTRATEGIS'];
            // $skpd['lbr'] = floatval($kolom['TBLDAFTTANAH_LEBAR']);
            // $skpd['pgj'] = floatval($kolom['TBLDAFTTANAH_PANJANG']);
            // $skpd['sp'] = $kolom['REFKETINGGIAN_SKOR'];

            // $skpd['jrek'] = $kolom['TBLDAFTTANAH_JMLHREKLAME'];
            // $skpd['ka'] = $kolom['TBLDAFTTANAH_SKORKAWASAN'];

            $skpd['nopok'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);
            
            $skpd['tglbatasskpd'] = $kolom['TBLDAFTTANAH_TGLBATASSKPD'] .' '. LokalIndonesia::getBulan($kolom['TBLDAFTTANAH_BLNBATASSKPD']) .' '. '20'. $kolom['TBLDAFTTANAH_THNBATASSKPD'];
            $skpd['rekkode'] = $kolom['TBLDAFTTANAH_REKURUSAN'] .'.'. $kolom['TBLDAFTTANAH_REKPEMERINTAHAN'] .'.'. $kolom['TBLDAFTTANAH_REKORGANISASI'] .'.'. $kolom['TBLDAFTTANAH_REKPROGRAM'] .'.'. $kolom['TBLDAFTTANAH_REKKEGIATAN'] .'.'. $kolom['TBLDAFTTANAH_REKDINAS'] .'.'. $kolom['TBLDAFTTANAH_REKBIDANG'] .'.'. $kolom['TBLDAFTTANAH_REKPENDAPATAN'] .'.'. $kolom['TBLDAFTTANAH_REKPAD'] .'.'. $kolom['TBLDAFTTANAH_REKPAJAK'] .'.'. $kolom['TBLDAFTTANAH_REKAYAT'] .'.'. $kolom['TBLDAFTTANAH_REKJENIS'];

            $skpd['nmrek'] = $kolom['NMREK'];
            $skpd['vol'] = $kolom['TBLDAFTTANAH_TOTALVOLUME'];

            // $skpd['niju'] = $kolom['NIJU'];
            // $skpd['nisewa'] = $kolom['TBLDAFTTANAH_NILAISEWA'];
            // $skpd['nistra'] = $kolom['NISTRA'];
            $skpd['tglpajak'] = $kolom['TBLPENDATAAN_TGLPAJAK'];
            $skpd['blnpajak'] = $kolom['TBLPENDATAAN_BLNPAJAK'];
            // $skpd['luas'] = $kolom['TBLDAFTTANAH_LUAS'];
            // $skpd['hari'] = $kolom['TBLDAFTTANAH_JUMLAHHARI'];

            $skpd['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTTANAH_PAJAK']);
            $skpd['bunga'] = LokalIndonesia::ribuan($kolom['TBLDAFTTANAH_DENDAKRGBAYAR']);

            $skpd['keringanan'] = $kolom['TBLDAFTTANAH_NKOMPENSASI'];
            $skpd['persen'] = $kolom['TBLDAFTTANAH_PERSENTARIF'];

            $skpd['total'] = LokalIndonesia::ribuan($kolom['TBLDAFTTANAH_PAJAK']+$kolom['TBLDAFTTANAH_DENDAKRGBAYAR']);
            $skpd['terbilang'] = LokalIndonesia::terbilangangka($kolom['TBLDAFTTANAH_PAJAK']+$kolom['TBLDAFTTANAH_DENDAKRGBAYAR']);

            $skpd['tglbts'] = $kolom['TBLDAFTTANAH_TGLSPTPD'] .'-'. $kolom['TBLDAFTTANAH_BLNSPTPD'] .'-20'. $kolom['TBLDAFTTANAH_THNSPTPD'] ;
            $skpd['tglspt'] = $kolom['TBLDAFTTANAH_TGLSPTPD'] .'-'. $kolom['TBLDAFTTANAH_BLNSPTPD'] .'-20'. $kolom['TBLDAFTTANAH_THNSPTPD'] ;

            $skpd['tglskpd'] = $kolom['TBLDAFTTANAH_TGLSKPD'] .'-'. $kolom['TBLDAFTTANAH_BLNSKPD'] .'-20'. $kolom['TBLDAFTTANAH_THNSKPD'];
            $skpd['blnskpd'] = LokalIndonesia::getBulan($kolom['TBLDAFTTANAH_BLNSKPD']);
            $skpd['thnskpd'] = '20'. $kolom['TBLDAFTTANAH_THNSKPD'];

        array_push($rows, $skpd);

        endforeach;

        $GLOBALS['thnpjk'] = '20'.$tahunpjk;
        $GLOBALS['blnpjk'] = $blnpajak;
        $GLOBALS['tglskpd'] = $tglskpd;

        $GLOBALS['tglspt'] = '';
        $GLOBALS['rekjen'] = '';

        $GLOBALS['tglentri'] = $tglskpd;
        $GLOBALS['kdjalan'] = $tglskpd;

        $header = array();

        $header['tglspt'] = '';
        $header['totrek'] = $totaljumrek['totaljumrek'];
        $header['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
        $header['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');

        //SAMPAI SINI QUERYNYA

        // var_dump($data);
        // echo json_encode($skpd);Yii::app()->end();
        // echo json_encode($row);

        // Merge data in the first sheet
        $namafileDL = "DAFTAR-NOTA-AIRTANAH.docx";
        $otbs->MergeBlock('skpd', $rows);
        $otbs->MergeField('header', $header); 
        // $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

        $otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
        // echo "string";Yii::app()->end();
        Yii::app()->end();
    }

    public function actionCetakNotaWord()
    {
        $tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
        $bulanpjk = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
        // $bulanpjk = $_REQUEST['TBLPENDATAAN_BLNPAJAK'] ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';
        $tanggalpjk = isset($_REQUEST['TBLPENDATAAN_TGLPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_TGLPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_TGLPAJAK'] : '';
        $tglskpd = isset($_REQUEST['TBLDAFTREKLAME_TGLSKPD']) && !empty($_REQUEST['TBLDAFTREKLAME_TGLSKPD']) ? (int)$_REQUEST['TBLDAFTREKLAME_TGLSKPD'] : '';
        $TBLDAFTREKLAME_JNSREKLAME = $_REQUEST['TBLDAFTREKLAME_JNSREKLAME'] ? $_REQUEST['TBLDAFTREKLAME_JNSREKLAME'] : '';
        $TGLENTRI = $_REQUEST['TGLENTRI'] ? $_REQUEST['TGLENTRI'] : '';
        // error_reporting(0);

        // baca file template, yg dipakai
        // $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
        
        // $data['filter'] = isset($_REQUEST['data']) ? base64_decode($_REQUEST['data']) : '';

        // $explodefilter = explode(',', $data['filter']);

        // $kodefikasi = explode('-', $explodefilter);

        // $nopokok = $kodefikasi[0];
        // $tahunpjk = $kodefikasi[1];
        // $bulanpjk = $kodefikasi[2];
        // $noskp = $kodefikasi[3];
        // $nominalpjk = $kodefikasi[4];

        $data['filter'] = isset($_REQUEST['data']) ? base64_decode($_REQUEST['data']) : '';

        if (!empty($data['filter'])) {
            $data['filter'] = explode(',', $data['filter']);
        } else {
            echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
            Yii::app()->end();
        }

        $flag = '';
        $query = '';

        foreach ($data['filter'] as $kodefikasi) {
            $kodefikasi = explode('-', $kodefikasi);
            if (is_array($kodefikasi)) {
                if (!isset($kodefikasi[0]) OR !isset($kodefikasi[1]) OR !isset($kodefikasi[2]) OR !isset($kodefikasi[3]) OR !isset($kodefikasi[4]) ) {
                    echo "<h3>Data yg dikirim tidak benar, ulangi proses cetak SKPD</h3>";
                    Yii::app()->end();
                }
                $nopokok = $kodefikasi[0];
                $tahunpjk = $kodefikasi[1];
                $lokasikode = $kodefikasi[2];
                $nourutskp = $kodefikasi[3];
                $nominalpjk = $kodefikasi[4];
                $blnpajak = $kodefikasi[5];

                $query .= 
                $flag . 
                "
                SELECT
                    TBLDAFTREKLAME.*, TBLDAFTAR.*, TBLDAFTREKLAME_URUTSKPD AS TBLDAFTREKLAME_URUTSKPD1,
                    (
                        SELECT
                            TBLREKENING.TBLREKENING_NAMAREKENING
                        FROM
                            TBLREKENING
                        WHERE
                            TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPENDAPATAN
                        AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAD
                        AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAJAK
                        AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTREKLAME.TBLDAFTREKLAME_REKAYAT
                        AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTREKLAME.TBLDAFTREKLAME_REKJENIS
                    ) AS NMREK
                FROM
                    TBLDAFTREKLAME,
                    TBLDAFTAR
                WHERE
                    TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
                AND TBLDAFTAR.TBLDAFTAR_NOPOK = $nopokok
                AND TBLPENDATAAN_THNPAJAK = $tahunpjk
                AND TBLPENDATAAN_BLNPAJAK = $blnpajak
                AND TBLDAFTREKLAME_NOMORSKPD = $nourutskp
                AND NVL (TBLPENDATAAN_PAJAKKE, 0) = $lokasikode
                AND NVL (TBLDAFTREKLAME_NOMORSKPD, 0) > '0'

                ";
                $flag = '
                UNION
                ';

            }
        }
        // echo "$query";Yii::app()->end();
        $data['list_skpd'] = Yii::app()->db->createCommand($query)->queryAll();

        $path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_skpd' . DIRECTORY_SEPARATOR;
        $namatpl = $path_tpl . 'NOTA_SKPD_REK.docx';

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

        $skpd = array();
        $rows = array();
        
        $totalpajak = array('totalpajak'=>0); $totaljumrek = array('totaljumrek'=>0); $no=1;foreach ($data['list_skpd'] as $kolom) :

            $skpd['no'] = $no++;
            $skpd['nopok_aja'] = sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']);

            /*if ($kolom['TBLDAFTREKLAME_JNSREKLAME']=='T') {
                $skpd['jenis'] = 'Tahunan';
            } else if($kolom['TBLDAFTREKLAME_JNSREKLAME']=='I') {
                $skpd['jenis'] = $kolom['TBLPENDATAAN_TGLPAJAK'] .' '. LokalIndonesia::getBulan($kolom['TBLPENDATAAN_BLNPAJAK']) .' 20'. $kolom['TBLPENDATAAN_THNPAJAK'];
            } else {
                $skpd['jenis'] = 'Tahunan';
            }*/
            
            $skpd['jenis'] = $kolom['TBLDAFTREKLAME_REKJENIS'];

            if ($kolom['TBLDAFTREKLAME_JNSREKLAME']=='T') {
                $skpd['jenis2'] = '/Tahunan';
            } else if ($kolom['TBLDAFTREKLAME_JNSREKLAME']=='I') {
                $skpd['jenis2'] = '/Pajak Bulan';
            } else {
                $skpd['jenis2'] = '/Tahunan';
            }

            $totaljumrek['totaljumrek'] += $kolom['TBLDAFTREKLAME_JMLHREKLAME'];
            $totalpajak['totalpajak'] += $kolom['TBLDAFTREKLAME_PAJAK'];

            $skpd['noskp'] = $kolom['TBLDAFTREKLAME_NOMORSKPD'];
            $skpd['namabadan'] = $kolom['TBLDAFTAR_BADANUSAHANAMA'];
            $skpd['alamat'] = $kolom['TBLDAFTAR_BADANUSAHAALAMAT'];
            $skpd['thnpajak'] = '20'. $kolom['TBLPENDATAAN_THNPAJAK'];
            $skpd['lokasi'] = $kolom['TBLPENDATAAN_PAJAKKE'];
            $skpd['keterangan'] = $kolom['TBLDAFTREKLAME_ISIREKLAME'];
            $skpd['isireklame1'] = $kolom['TBLDAFTREKLAME_KETERANGAN1'];
            $skpd['isireklame2'] = $kolom['TBLDAFTREKLAME_KETERANGAN2'];

            $skpd['noskpd'] = $kolom['TBLDAFTREKLAME_NOMORSKPD'];
            $skpd['index'] = $kolom['REFSUDUTPANDANG_SKOR'];
            $skpd['niti'] = $kolom['TBLDAFTREKLAME_NILAISTRATEGIS'];
            $skpd['lbr'] = floatval($kolom['TBLDAFTREKLAME_LEBAR']);
            $skpd['pgj'] = floatval($kolom['TBLDAFTREKLAME_PANJANG']);
            $skpd['sp'] = $kolom['REFKETINGGIAN_SKOR'];

            $skpd['jrek'] = $kolom['TBLDAFTREKLAME_JMLHREKLAME'];
            $skpd['ka'] = $kolom['TBLDAFTREKLAME_SKORKAWASAN'];

            $skpd['nopok'] = $kolom['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $kolom['TBLDAFTAR_GOLONGAN'] .'.'. sprintf("%07d",$kolom['TBLDAFTAR_NOPOK']) .'.'. sprintf("%02d",$kolom['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$kolom['TBLKELURAHAN_IDBADANUSAHA']);
            
            $skpd['tglbatasskpd'] = $kolom['TBLDAFTREKLAME_TGLBATASSKPD'] .' '. LokalIndonesia::getBulan($kolom['TBLDAFTREKLAME_BLNBATASSKPD']) .' '. '20'. $kolom['TBLDAFTREKLAME_THNBATASSKPD'];
            $skpd['rekkode'] = $kolom['TBLDAFTREKLAME_REKURUSAN'] .'.'. $kolom['TBLDAFTREKLAME_REKPEMERINTAHAN'] .'.'. $kolom['TBLDAFTREKLAME_REKORGANISASI'] .'.'. $kolom['TBLDAFTREKLAME_REKPROGRAM'] .'.'. $kolom['TBLDAFTREKLAME_REKKEGIATAN'] .'.'. $kolom['TBLDAFTREKLAME_REKDINAS'] .'.'. $kolom['TBLDAFTREKLAME_REKBIDANG'] .'.'. $kolom['TBLDAFTREKLAME_REKPENDAPATAN'] .'.'. $kolom['TBLDAFTREKLAME_REKPAD'] .'.'. $kolom['TBLDAFTREKLAME_REKPAJAK'] .'.'. $kolom['TBLDAFTREKLAME_REKAYAT'] .'.'. $kolom['TBLDAFTREKLAME_REKJENIS'];

            $skpd['nmrek'] = $kolom['NMREK'];
            $skpd['vol'] = null;

            $skpd['niju'] = $kolom['NIJU'];
            $skpd['nisewa'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_NILAISEWA']);

            $skpd['index'] = $kolom['REFSUDUTPANDANG_SKOR'];
            if ($kolom['NISTRA']==null) {
                $skpd['nistra'] = '0';
            } else {
                $skpd['nistra'] = $kolom['NISTRA'];
            }
            
            $skpd['tglpajak'] = $kolom['TBLPENDATAAN_TGLPAJAK'];
            $skpd['blnpajak'] = $kolom['TBLPENDATAAN_BLNPAJAK'];
            $skpd['luas'] = $kolom['TBLDAFTREKLAME_LUAS'];
            $skpd['hari'] = $kolom['TBLDAFTREKLAME_JUMLAHHARI'];

            $skpd['pajak'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_PAJAK']);
            $skpd['bunga'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_DENDAKRGBAYAR']);

            $skpd['total'] = LokalIndonesia::ribuan($kolom['TBLDAFTREKLAME_PAJAK']+$kolom['TBLDAFTREKLAME_DENDAKRGBAYAR']);
            $skpd['terbilang'] = LokalIndonesia::terbilangangka($kolom['TBLDAFTREKLAME_PAJAK']+$kolom['TBLDAFTREKLAME_DENDAKRGBAYAR']);

            $skpd['tglbts'] = $kolom['TBLDAFTREKLAME_TGLSPTPD'] .'-'. $kolom['TBLDAFTREKLAME_BLNSPTPD'] .'-20'. $kolom['TBLDAFTREKLAME_THNSPTPD'] ;
            $skpd['tglspt'] = $kolom['TBLDAFTREKLAME_TGLSPTPD'] .'-'. $kolom['TBLDAFTREKLAME_BLNSPTPD'] .'-20'. $kolom['TBLDAFTREKLAME_THNSPTPD'] ;

            $skpd['tglskpd'] = $kolom['TBLDAFTREKLAME_TGLSKPD'] .' '. LokalIndonesia::getBulan($kolom['TBLDAFTREKLAME_BLNSKPD']);
            $skpd['blnskpd'] = LokalIndonesia::getBulan($kolom['TBLDAFTREKLAME_BLNSKPD']);
            $skpd['thnskpd'] = '20'. $kolom['TBLDAFTREKLAME_THNSKPD'];

        array_push($rows, $skpd);

        endforeach;

        $GLOBALS['thnpjk'] = '20'.$tahunpjk;
        $GLOBALS['blnpjk'] = $bulanpjk;
        $GLOBALS['tglskpd'] = $tglskpd;

        $GLOBALS['tglentri'] = $TGLENTRI;
        $GLOBALS['kdjalan'] = $tglskpd;

        if ($TBLDAFTREKLAME_JNSREKLAME=='T') {
            $GLOBALS['rekjen'] = 'Tetap';
        } else if($TBLDAFTREKLAME_JNSREKLAME=='I') {
            $GLOBALS['rekjen'] = 'Insidentil';
        } else if ($TBLDAFTREKLAME_JNSREKLAME=='B') {
            $GLOBALS['rekjen'] = 'Berjalan';
        } else if ($TBLDAFTREKLAME_JNSREKLAME=='') {
            $GLOBALS['rekjen'] = 'Lain - Lain';
        }

        $header = array();

        $header['totrek'] = $totaljumrek['totaljumrek'];
        $header['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
        $header['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');

        //SAMPAI SINI QUERYNYA

        // var_dump($data);
        // echo json_encode($skpd);Yii::app()->end();
        // echo json_encode($row);

        // Merge data in the first sheet
        $namafileDL = "DAFTAR-NOTA-REKLAME.docx";
        $otbs->MergeBlock('skpd', $rows);
        $otbs->MergeField('header', $header); 
        // $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

        $otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
        // echo "string";Yii::app()->end();
        Yii::app()->end();
    }

    public function actionCetakNota()
    {
        $data = array();
        $this->renderPartial('view', array('data'=>$data));
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