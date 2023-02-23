<?php

class Penetapanabt_berdasarnpwpController extends Controller
{

	public function init()
	{
		Yii::import('ext.DBFetch');
	}

	public function actionIndex()
	{
		$data['kecamatan'] = Yii::app()->db->createCommand("SELECT * FROM REFKECAMATAN")->queryAll();

		$this->renderPartial('index',array('data'=>$data));
	}

	public function actionGetData()
	{
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
		$TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];
		$data['NOURUT'] = $_REQUEST['TBLDAFTTANAH_URUTSKPD'];
		$TBLKECAMATAN_ID = $_REQUEST['TBLKECAMATAN_ID'];
		$TBLDAFTTANAH_ISJNSPENETAPAN = $_REQUEST['TBLDAFTTANAH_ISJNSPENETAPAN'];
		$TBLDAFTTANAH_TGLENTRI = date('Y-m-d',strtotime($_REQUEST['TBLDAFTTANAH_TGLENTRI']));
		
		$exptglentri = explode('-', $TBLDAFTTANAH_TGLENTRI);
		$tglentri = $exptglentri[1];

		$select = "CONCAT (
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

		TBLDAFTAR.TBLDAFTAR_NOPOK AS TBLDAFTAR_NOPOK,
        TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA AS NAMA_USAHA,
        TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT AS LOKASI,
        TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA AS NAMA_PEMILIK,
        TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA AS KEC_ID,
        TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA AS KEL_ID,
        TBLDAFTTANAH_OMSETPAJAK AS OMZET,
        TBLDAFTTANAH_PAJAK AS PAJAK,

		TBLDAFTTANAH.TBLDAFTTANAH_TGLSKPD,
		TBLDAFTTANAH.TBLDAFTAR_NOPOK,
		TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK,
		TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK,
		TBLDAFTTANAH.TBLPENDATAAN_TGLPAJAK,
		TBLDAFTTANAH.TBLPENDATAAN_PAJAKKE,
		TBLDAFTTANAH.TBLDAFTTANAH_PAJAK,
		TBLDAFTTANAH.TBLDAFTAR_GOLONGAN,
		REFKECAMATAN.REFKECAMATAN_NAMA,
		REFKELURAHAN.REFKELURAHAN_NAMA,
		TBLDAFTTANAH.TBLDAFTTANAH_TOTALVOLUME";
		$from = 'TBLDAFTTANAH';
		$filter = array(
			 'EQ__TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK'=>substr($TBLPENDATAAN_THNPAJAK, -2)
			,'EQ__TBLDAFTTANAH.TBLPENDATAAN_BLNPAJAK'=>(int) $TBLPENDATAAN_BLNPAJAK
			,'EQ__TBLDAFTTANAH.TBLKECAMATAN_ID'=>$TBLKECAMATAN_ID
			,'EQ__TBLDAFTTANAH.TBLDAFTTANAH_ISJNSPENETAPAN'=>$TBLDAFTTANAH_ISJNSPENETAPAN
		);

		$otherquery = array(
			 'leftjoin_wpr'=>array('TBLDAFTAR','TBLDAFTAR.TBLDAFTAR_NOPOK=TBLDAFTTANAH.TBLDAFTAR_NOPOK')
            ,'leftjoin_REFKECAMATAN'=>array('REFKECAMATAN','REFKECAMATAN.REFKECAMATAN_ID=TBLDAFTTANAH.TBLKECAMATAN_ID')
            ,'leftjoin_REFKELURAHAN'=>array('REFKELURAHAN','REFKELURAHAN.REFKELURAHAN_ID=TBLDAFTTANAH.TBLKELURAHAN_ID')
			,'andwhere'=> '
            NVL (TBLDAFTTANAH_URUTSKPD, 0) = 0
            '
		);

		$id_eksepsi = trim(isset($_REQUEST['id_eksepsi']) ? $_REQUEST['id_eksepsi'] : '', ',');
		if (!empty($id_eksepsi)) {
            $list_nopok = explode(',', $id_eksepsi);
            $where_nopok = '' ;
            foreach ($list_nopok as $kodene) {
                $pch   = explode('-', $kodene);
                $nopok = isset($pch[0]) ? $pch[0] : 0;
                $thn   = isset($pch[1]) ? $pch[1] : 0;
                $bln   = isset($pch[2]) ? $pch[2] : 0;
                // $tgl   = isset($pch[3]) ? $pch[3] : 0;

                $where_nopok .= " AND NOT (TBLDAFTAR.TBLDAFTAR_NOPOK = $nopok AND TBLPENDATAAN_THNPAJAK = $thn AND TBLPENDATAAN_BLNPAJAK = $bln ) ";
            }
            $otherquery['andwhere'] .= $where_nopok;
        }

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data['air'] = DBFetch::query($arrayConfig);

		$this->renderPartial('table',array('data'=>$data));
	}

	public function actionTetapkanPajakAir()
	{
		$listPajakAir = trim($_REQUEST['listPajakAir'],',');
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
		$TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];
		$TBLDAFTTANAH_TGLSKPD = date('Y-m-d',strtotime( $_REQUEST['TBLDAFTTANAH_TGLSKPD'] ));
		$TBLDAFTTANAH_TGLBATASSKPD = date('Y-m-d',strtotime( $_REQUEST['TBLDAFTTANAH_TGLBATASSKPD'] ));

		$THNPAJAK = substr($TBLPENDATAAN_THNPAJAK, -2);
		$BLNPAJAK = (int)$TBLPENDATAAN_BLNPAJAK;
		$TGLSKPD = explode('-', $TBLDAFTTANAH_TGLSKPD);
		$TGLBATASSKPD = explode('-', $TBLDAFTTANAH_TGLBATASSKPD);

		$PajakAirList = explode(',', $listPajakAir);
		$stat = array(); foreach ($PajakAirList as $list) {
			$expList = explode('-', $list);
			$nopokok = $expList[0];	
			$nourut = isset($expList[3]) ? $expList[3] : 0;
			$pajak = isset($expList[4]) ? $expList[4] : 0;

			$update = Yii::app()->db->createCommand();

			$query = $update->update('TBLDAFTTANAH', array(
				 'TBLDAFTTANAH_THNSKPD' => substr($TGLSKPD[0], -2)
				,'TBLDAFTTANAH_BLNSKPD' => (int) $TGLSKPD[1]
				,'TBLDAFTTANAH_TGLSKPD' => $TGLSKPD[2]
				,'TBLDAFTTANAH_NOMORSKPD' => $nourut
				,'TBLDAFTTANAH_URUTSKPD' => $nourut
				,'TBLDAFTTANAH_PAJAKSKPD' => $pajak
				,'TBLDAFTTANAH_THNBATASSKPD' => substr($TGLBATASSKPD[0], -2)
				,'TBLDAFTTANAH_BLNBATASSKPD' => (int) $TGLBATASSKPD[1]
				,'TBLDAFTTANAH_TGLBATASSKPD' => $TGLBATASSKPD[2]
			), 'TBLDAFTAR_NOPOK=:nopok AND TBLPENDATAAN_THNPAJAK=:thn AND TBLPENDATAAN_BLNPAJAK=:bln', array(':nopok'=>$nopokok,':thn'=>$THNPAJAK,':bln'=>$BLNPAJAK));
			
			if ($query>0) {
				// echo CJSON::encode(array('status'=>'success','nopokok'=>$nopokok));
				$stat[] = $nopokok;
			}
			else{
				// echo CJSON::encode(array('status'=>'failed','nopokok'=>$nopokok));
			}
		}
		echo CJSON::encode(array('status'=>'success','nopokok'=>$stat));
	}

	public function actionGetNoNotaAkhir()
	{
		$tahun = $_REQUEST['tahun'];
		$splthn = substr($tahun, -2);

		$data = Yii::app()->db->createCommand("SELECT
			MAX(TBLDAFTTANAH.TBLDAFTTANAH_URUTSKPD)+1 AS NOMORURUT
			FROM
			TBLDAFTTANAH
			WHERE TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK = ".$splthn."")->queryRow();

		echo CJSON::encode($data);
	}

	public function actionCetakSKPD()
	{
		$data['list_skpd'] = array(
			array(),
			array(),
			array(),
		);

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
				$noskp = $kodefikasi[3];
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
		// print_r($data);Yii::app()->end();
		
		$this->renderPartial('tpl-skpd', array('data'=>$data));
	}

	public function actionCetakNota()
	{
		$data = array();
		$this->renderPartial('view', array('data'=>$data));
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