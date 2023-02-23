<?php

class Daftra_bukukendali_skpdaController extends Controller
{
	public function actionIndex()
	{
		$data['list_jalan'] = Yii::app()->db->createCommand()->select()->from('tabjalan')->queryAll();
		$data['list_kecamatan'] = Yii::app()->db->createCommand()->select()->from('REFKECAMATAN')->queryAll();
		$data['rek'] = Yii::app()->db->createCommand('
			SELECT
			*
			FROM
			TBLREKENING
			WHERE
			TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			AND TBLREKENING_REKAYAT <> 4
			AND TBLREKENING_REKAYAT <> 5
			AND TBLREKENING_REKAYAT <> 9
			AND TBLREKENING_REKAYAT <> 10
			AND TBLREKENING_REKAYAT <> 11
			AND TBLREKENING_REKAYAT <> 23
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			')->queryAll();
		$data['sub_rek'] = Yii::app()->db->createCommand()
		->select('*')
		->from('TREKENING')
		->where('TREKENING_LEVEL=1')
		->queryAll();
		$data['URL_APP'] = Yii::app()->getBaseUrl(true);
		$this->renderPartial('index', array('data'=>$data));
	}

	public function getData()
	{
		$namaTBL = '';
		$tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$tahuntap = isset($_REQUEST['TBLANGSURAN_THNKETETAPAN']) && !empty($_REQUEST['TBLANGSURAN_THNKETETAPAN']) ? (int)$_REQUEST['TBLANGSURAN_THNKETETAPAN'] : '';

		$wherethnpajak = $tahunpjk!=0 ? (' AND TBLPENDATAAN_THNPAJAK='.$tahunpjk) : '';
		$wherethntap = $tahuntap!=0 ? (' AND TBLANGSURAN_THNKETETAPAN='.$tahuntap) : '';

		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '4.1.1.1.0':
			$namaTBL = 'TBLDAFTHOTEL';
			$AYAT = '1';
			break;
			
			case '4.1.1.2.0':
			$namaTBL = 'TBLDAFTRMAKAN';
			$AYAT = '2';
			break;
			
			case '4.1.1.3.0':
			$namaTBL = 'TBLDAFTHIBURAN';
			$AYAT = '3';
			break;
			
			case '4.1.1.4.0':
			$namaTBL = 'TBLDAFTREKLAME';
			$AYAT = '4';
			break;
			
			case '4.1.1.7.0':
			$namaTBL = 'TBLDAFTPARKIR';
			$AYAT = '7';
			break;
			
			case '4.1.1.8.0':
			$namaTBL = 'TBLDAFTTANAH';
			$AYAT = '8';
			break;
			
			case '4.1.1.9.0':
			$namaTBL = 'TBLDAFTBURUNG';
			$AYAT = '9';
			break;
			
			default:
			$namaTBL = 'TBLDAFTHOTEL';
			break;
		}
		$sql = "
		SELECT T1.TBLPENDATAAN_THNPAJAK,
			TBLPENDATAAN_BLNPAJAK,
			TBLDAFTAR_NOPOK,
			TBLKECAMATAN_ID,
			TBLKELURAHAN_ID,
			COUNT(TBLANGSURAN_PAJAKKE) AS JML_ANGSUR,
			COUNT(TBLANGSURAN_SETORAN) AS JML_SETOR,
			CASE WHEN (COUNT(TBLANGSURAN_PAJAKKE)-COUNT(TBLANGSURAN_SETORAN)) = 0 THEN 'LUNAS' ELSE 'BELUM LUNAS' END AS STAT,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=1 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG1,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=2 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG2,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=3 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG3,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=4 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG4,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=5 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG5,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=6 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG6,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=7 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG7,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=8 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG8,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=9 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG9,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=10 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG10,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=11 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG11,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=12 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG12
		FROM TBLANGSURAN T1
		WHERE TBLANGSURAN_REKPENDAPATAN = 4
			AND TBLANGSURAN_REKPAD = 1
			AND TBLANGSURAN_REKPAJAK = 1
			AND TBLANGSURAN_REKAYAT = 1
			AND TBLANGSURAN_THNKETETAPAN = 17
			AND TBLPENDATAAN_THNPAJAK = 16
			".$wherethnpajak."
			".$wherethntap."
		GROUP BY 
			TBLPENDATAAN_THNPAJAK,
			TBLPENDATAAN_BLNPAJAK,
			TBLKECAMATAN_ID,
			TBLKELURAHAN_ID,
			TBLDAFTAR_NOPOK
		ORDER BY
			TBLKECAMATAN_ID,
			TBLKELURAHAN_ID,
			TBLDAFTAR_NOPOK
		";

		return $data = Yii::app()->db->createCommand( $sql )->queryAll();
	}

	
	public function actionCetak()
	{
		$tahun = substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2) : '' ;
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '' ;
		$tahun_penetapan = substr($_REQUEST['tahun_penetapan'], -2) ? substr($_REQUEST['tahun_penetapan'], -2) : '' ;

		$AYAT = $_REQUEST['TBLREKENING_KODE'];
		if($AYAT=='4.1.1.1.0'){
			$namaTBL = 'TBLDAFTHOTEL';
			$judul = 'PAJAK HOTEL';
			$NAKB = 'DENDAKRGBAYAR';
			$REKAYAT = '1';
			$jab_id = '18';
		}
		elseif($AYAT=='4.1.1.2.0'){
			$namaTBL= 'TBLDAFTRMAKAN';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$REKAYAT = '2';
			$jab_id = '19';
		}
		elseif($AYAT=='4.1.1.3.0'){
			$namaTBL= 'TBLDAFTHIBURAN';
			$judul = 'PAJAK HIBURAN';
			$NAKB = 'NAKB';
			$REKAYAT = '3';
			$jab_id = '20';
		}
		elseif($AYAT=='4.1.1.4.0'){
			$namaTBL= 'TBLDAFTREKLAME';
			$judul = 'PAJAK REKLAME';
			$NAKB = 'NAKB';
			$REKAYAT = '4';
		}
		elseif($AYAT=='4.1.1.7.0'){
			$namaTBL= 'TBLDAFTPARKIR';
			$judul = 'PAJAK PARKIR';
			$NAKB = 'NAKB';
			$REKAYAT = '7';
			$jab_id = '21';
		}
		elseif($AYAT=='4.1.1.8.0'){
			$namaTBL= 'TBLDAFTTANAH';
			$judul = 'PAJAK AIR TANAH';
			$NAKB = 'NAKB';
			$REKAYAT = '8';
			$jab_id = '22';
		}
		elseif($AYAT=='4.1.1.9.0'){
			$namaTBL= 'TBLDAFTBURUNG';
			$judul = 'PAJAK SARANG BURUNG WALET';
			$NAKB = 'NAKB';
			$REKAYAT = '9';
		}
		elseif($AYAT=='4.1.1.11.0'){
			$namaTBL= 'TBLDAFTBPHTB';
			$judul = 'PAJAK BPHTB';
			$NAKB = 'NAKB';
			$REKAYAT = '11';
		}


		if($tahun==''){
			$wherethnpajak = "";
		}
		else{
			$wherethnpajak = "AND TBLPENDATAAN_THNPAJAK = ".$tahun."";
		};

		if($tahun_penetapan==''){
			$penetapan = "";
		}
		else{
			$penetapan = "AND TBLANGSURAN_THNKETETAPAN = ".$tahun_penetapan."";
		};
			$sql = "
		SELECT T1.TBLPENDATAAN_THNPAJAK,
			T1.TBLANGSURAN_THNKETETAPAN,
			T1.TBLPENDATAAN_BLNPAJAK,
			T1.TBLDAFTAR_NOPOK,
			T1.TBLANGSURAN_NAMABADANUSAHA,
			T1.TBLANGSURAN_ALAMATBADANUSAHA,
			T1.TBLANGSURAN_GOLONGAN,
			TBLKECAMATAN_ID,
			TBLKELURAHAN_ID,
			COUNT(TBLANGSURAN_PAJAKKE) AS JML_ANGSUR,
			COUNT(TBLANGSURAN_SETORAN) AS JML_SETOR,
			CASE WHEN (COUNT(TBLANGSURAN_PAJAKKE)-COUNT(TBLANGSURAN_SETORAN)) = 0 THEN 'LUNAS' ELSE 'BELUM LUNAS' END AS STAT,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=1 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG1,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=2 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG2,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=3 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG3,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=4 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG4,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=5 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG5,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=6 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG6,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=7 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG7,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=8 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG8,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=9 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG9,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=10 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG10,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=11 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG11,
			SUM(CASE WHEN TBLANGSURAN_PAJAKKE=12 THEN (T1.TBLANGSURAN_SETORAN+T1.TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END) AS ANG12
		FROM TBLANGSURAN T1
		WHERE TBLANGSURAN_REKPENDAPATAN = 4
			AND TBLANGSURAN_REKPAD = 1
			AND TBLANGSURAN_REKPAJAK = 1
			AND TBLANGSURAN_REKAYAT = ".$REKAYAT."
			".$wherethnpajak."
			".$penetapan."
		GROUP BY 
			TBLPENDATAAN_THNPAJAK,
			TBLANGSURAN_THNKETETAPAN,
			TBLPENDATAAN_BLNPAJAK,
			TBLKECAMATAN_ID,
			TBLKELURAHAN_ID,
			TBLDAFTAR_NOPOK,
			TBLANGSURAN_NAMABADANUSAHA,
			TBLANGSURAN_ALAMATBADANUSAHA,
			TBLANGSURAN_GOLONGAN
		ORDER BY
		STAT,
			TBLKECAMATAN_ID,
			TBLKELURAHAN_ID,
			TBLDAFTAR_NOPOK
			";

			$data['skpda'] = $skpda = Yii::app()->db->createCommand($sql)->queryAll();
			$data['judul'] = $judul;

			$sql3="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 8";	
			$sql4="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = ".$jab_id."";	

			$data['jab3'] = Yii::app()->db->createCommand($sql3)->queryRow();
			$data['jab4'] = Yii::app()->db->createCommand($sql4)->queryRow();

			header('Content-Type: application/excel');
		header("Content-Disposition: attachment;Filename=Daftar Buku Kendali Pajak SKPD-A.xls");


		$this->renderPartial('cetak',array('data'=>$data));
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
	{pe
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