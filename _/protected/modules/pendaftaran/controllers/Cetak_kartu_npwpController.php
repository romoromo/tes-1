<?php

class Cetak_kartu_npwpController extends Controller
{

	public function init()
    {
        Yii::import('ext.DBFetch');
    }

	public function actionIndex()
	{
		$data['kecamatan'] = TBLKECAMATAN::model()->findAll( 'TBLKABUPATEN_KODE=3471' );
        $data['total_data'] = 100000000000;
        // $data['kelurahan'] = Kelurahan::model()->findAll();
        $this->renderPartial('index', array('data'=>$data));
	}

	public function actioncetak(){
		$data['URL_APP']=Yii::app()->getBaseUrl(true);

		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
        $TBLDAFTAR_JENISPENDAPATAN = $_REQUEST['TBLDAFTAR_JENISPENDAPATAN'];

         $select = "
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
				(
					SELECT
						REFKELURAHAN.REFKELURAHAN_NAMA
					FROM
						REFKELURAHAN
					WHERE
						REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
					AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKELURAHAN,
				(
					SELECT
						REFKECAMATAN.REFKECAMATAN_NAMA
					FROM
						REFKECAMATAN
					WHERE
						REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKECAMATAN_NAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
				TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA,
				TBLDAFTAR.REFBADANUSAHA_IDPEMILIK,
				TBLDAFTAR.TBLDAFTAR_ISAKTIF,
				NVL (
					TBLDAFTAR.TBLDAFTAR_ALASANNONAKTIF,
					'-'
				) AS TBLDAFTAR_ALASANNONAKTIF";
         $from = 'TBLDAFTAR';

         $otherquery = array(
             'leftjoin_REFBADANUSAHA'=>array('REFBADANUSAHA','TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA=REFBADANUSAHA.REFBADANUSAHA_ID')
             // ,'leftjoin_REFBADANUSAHA'=>array('TBLDAFTAR','TBLDAFTAR.REFBADANUSAHA_IDPEMILIK=REFBADANUSAHA.REFBADANUSAHA_ID')
        );

        $filter = array(
            'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
            ,'EQ__TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN'=> $TBLDAFTAR_JENISPENDAPATAN
            // ,'EQ__TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA' => 'REK'
            ,'EQ__TBLDAFTAR.TBLKECAMATAN_IDPEMILIK' => '0'
            ,'EQ__TBLDAFTAR.TBLKELURAHAN_IDPEMILIK' => '0'
            // ,'EQ__TBLDAFTHIBURAN.TBLDAFTHIBURAN_ISJNSPENETAPAN' => $TBLDAFTHIBURAN_ISJNSPENETAPAN
            //,'EQ__TBLDAFTHIBURAN_TGLENTRI'=>$tglentri
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
        $data['cetak'] = DBFetch::query($arrayConfig);

		$this->renderPartial('cetak',array('data'=>$data));
	}

	public function actionGetData()
    {
        // $TBLDAFTHIBURAN_THNPAJAK = (int)DMOrcl::getRequest('param', 'TBLDAFTHIBURAN_THNPAJAK');
        // $data['nourut'] = $TBLDAFTHIBURAN_URUTSKPD = (int)DMOrcl::getRequest('param', 'TBLDAFTHIBURAN_URUTSKPD');
        // $TBLKECAMATAN_ID = !empty(DMOrcl::getRequest('param', 'TBLKECAMATAN_ID')) ? (int)DMOrcl::getRequest('param', 'TBLKECAMATAN_ID') : '';
        // $TBLDAFTREKLAME_ISJNSPENETAPAN = DMOrcl::getRequest('param', 'TBLDAFTREKLAME_ISJNSPENETAPAN');
        // $TBLDAFTHIBURAN_TGLENTRI = strtotime($_REQUEST['param']['TBLDAFTHIBURAN_TGLENTRI']) ? date('Y-m-d', strtotime($_REQUEST['TBLDAFTHIBURAN_TGLENTRI'])) : '';
        // $data['tglskpd'] = strtotime($_REQUEST['param']['TBLDAFTHIBURAN_TGLSKPD']) ? date('Y-m-d', strtotime($_REQUEST['TBLDAFTHIBURAN_TGLSKPD'])) : '';
        // $data['tglskpd'] = $TBLDAFTHIBURAN_TGLSKPD = strtotime($_REQUEST['param']['TBLDAFTHIBURAN_TGLSKPD']) ? date('Y-m-d', strtotime($_REQUEST['TBLDAFTHIBURAN_TGLSKPD'])) : '';
        
        // $exptglentri = explode('-', $TBLDAFTHIBURAN_TGLENTRI);
        // $tglentri = $exptglentri[1];
        $TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
        $TBLDAFTAR_JENISPENDAPATAN = $_REQUEST['TBLDAFTAR_JENISPENDAPATAN'];
        // $TBLDAFTAR_PEMILIKNAMA = $_REQUEST['TBLDAFTAR_PEMILIKNAMA'];
        // $TBLDAFTAR_BADANUSAHANAMA = $_REQUEST['TBLDAFTAR_BADANUSAHANAMA'];

         $select = "
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
				(
					SELECT
						REFKELURAHAN.REFKELURAHAN_NAMA
					FROM
						REFKELURAHAN
					WHERE
						REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
					AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKELURAHAN,
				(
					SELECT
						REFKECAMATAN.REFKECAMATAN_NAMA
					FROM
						REFKECAMATAN
					WHERE
						REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
				) AS REFKECAMATAN_NAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
				TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
				TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA,
				TBLDAFTAR.REFBADANUSAHA_IDPEMILIK,
				TBLDAFTAR.TBLDAFTAR_ISAKTIF,
				NVL (
					TBLDAFTAR.TBLDAFTAR_ALASANNONAKTIF,
					'-'
				) AS TBLDAFTAR_ALASANNONAKTIF";
         $from = 'TBLDAFTAR';

         $otherquery = array(
             'leftjoin_REFBADANUSAHA'=>array('REFBADANUSAHA','TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA=REFBADANUSAHA.REFBADANUSAHA_ID')
             // ,'order'=> 'TBLKECAMATAN_IDBADANUSAHA, TBLDAFTAR_NOPOK ASC'
             // ,'leftjoin_REFBADANUSAHA'=>array('TBLDAFTAR','TBLDAFTAR.REFBADANUSAHA_IDPEMILIK=REFBADANUSAHA.REFBADANUSAHA_ID')
        );

        $filter = array(
            'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
            ,'EQ__TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN'=> $TBLDAFTAR_JENISPENDAPATAN
            // ,'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $TBLDAFTAR_GOLONGAN
            // ,'LK__TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA' => $TBLDAFTAR_PEMILIKNAMA
            // ,'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA' => $TBLDAFTAR_BADANUSAHANAMA
            // ,'EQ__TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA' => $TBLKECAMATAN_IDBADANUSAHA
            // ,'EQ__TBLDAFTAR.REFKELURAHAN_IDBADANUSAHA' => $REFKELURAHAN_IDBADANUSAHA
            // ,'EQ__TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA' => $REFBADANUSAHA_IDBADANUSAHA
            // ,'EQ__TBLDAFTAR.REFKELURAHAN_IDBADANUSAHA' => $REFKELURAHAN_IDBADANUSAHA
            // ,'EQ__TBLDAFTAR.REFKELURAHAN_IDBADANUSAHA' => $REFKELURAHAN_IDBADANUSAHA
            // ,'EQ__TBLDAFTAR.TBLKECAMATAN_IDPEMILIK' => '0'
        );



        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
        $data['daftar'] = DBFetch::query($arrayConfig);

        $datax = Yii::app()->db->createCommand("
		SELECT
		TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_NOPOK,
			(
				SELECT
					REFKELURAHAN.REFKELURAHAN_NAMA
				FROM
					REFKELURAHAN
				WHERE
					REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
				AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
			) AS REFKELURAHAN,
			(
				SELECT
					REFKECAMATAN.REFKECAMATAN_NAMA
				FROM
					REFKECAMATAN
				WHERE
					REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
			) AS REFKECAMATAN_NAMA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
			TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA,
			TBLDAFTAR.REFBADANUSAHA_IDPEMILIK,
			TBLDAFTAR.TBLDAFTAR_ISAKTIF,
			NVL (
				TBLDAFTAR.TBLDAFTAR_ALASANNONAKTIF,
				'-'
			) AS TBLDAFTAR_ALASANNONAKTIF
		FROM
			TBLDAFTAR
		LEFT JOIN REFBADANUSAHA ON (
			TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA = REFBADANUSAHA.REFBADANUSAHA_ID
			OR TBLDAFTAR.REFBADANUSAHA_IDPEMILIK = REFBADANUSAHA.REFBADANUSAHA_ID
		)
		WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK <> 0
		AND TBLDAFTAR.TBLDAFTAR_NOPOK = '2032' -- AND TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN = 'P'
		-- AND TBLDAFTAR.TBLDAFTAR_GOLONGAN = '2'
		-- AND (
		--     TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA LIKE '%PT.SAM%'
		--     OR TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA LIKE '%PT.SAM%'
		-- )
		AND TBLDAFTAR.TBLKECAMATAN_IDPEMILIK = '0'
		AND TBLDAFTAR.TBLKELURAHAN_IDPEMILIK = '0' -- AND (
		--     TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA LIKE '%PT.SAM%'
		--     OR TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA LIKE '%PT.SAM%'
		-- )
		AND TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA = '0' -- AND TBLDAFTAR.REFKELURAHAN_IDBADANUSAHA = '0'
		AND TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA = 'REK'
		-- AND NVL (TBLDAFTAR.TBLDAFTAR_ISAKTIF, 'Y') <> 'N'
		-- AND TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT LIKE '%JL. PANJAITAN%'
		-- AND TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT LIKE '%JL.R.ROAD BARAT%'
		ORDER BY
			TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR_NOPOK")
		->queryAll();

        $this->renderPartial('grid', array('data'=>$data));
    }

    public function actionTetapkanPajakHiburan()
    {
        $listPajakHiburan = trim($_REQUEST['listPajakHiburan'],',');
        $TBLDAFTHIBURAN_THNPAJAK = $_REQUEST['TBLDAFTHIBURAN_THNPAJAK'];
        $TBLDAFTHIBURAN_BLNPAJAK = $_REQUEST['TBLDAFTHIBURAN_BLNPAJAK'];
        $TBLDAFTHIBURAN_TGLSKPD = date('Y-m-d',strtotime( $_REQUEST['TBLDAFTHIBURAN_TGLSKPD'] ));
        $TBLDAFTHIBURAN_TGLBATASSKPD = date('Y-m-d',strtotime( $_REQUEST['TBLDAFTHIBURAN_TGLBATASSKPD'] ));

        $THNPAJAK = substr($TBLDAFTHIBURAN_THNPAJAK, -2);
        $BLNPAJAK = (int)$TBLDAFTHIBURAN_BLNPAJAK;
        $TGLSKPD = explode('-', $TBLDAFTHIBURAN_TGLSKPD);
        $TGLBATASSKPD = explode('-', $TBLDAFTHIBURAN_TGLBATASSKPD);

        $PajakAirList = explode(',', $listPajakHiburan);
        foreach ($PajakAirList as $list) {
            $expList = explode('-', $list);
            $nopokok = $expList[0]; 
            $nourut = $expList[1];
            $pajak = $expList[2]!='' ? $expList[2] : 0;

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
            ), 'TBLDAFTHIBURAN_NOPOK=:nopok AND TBLDAFTHIBURAN_THNPAJAK=:thn AND TBLDAFTHIBURAN_BLNPAJAK=:bln', array(':nopok'=>$nopokok,':thn'=>$THNPAJAK,':bln'=>$BLNPAJAK));

            if ($query>0) {
                echo CJSON::encode(array('status'=>'success','nopokok'=>$nopokok));
            }
            else{
                echo CJSON::encode(array('status'=>'failed','nopokok'=>$nopokok));
            }

            /*print_r($query);*/
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