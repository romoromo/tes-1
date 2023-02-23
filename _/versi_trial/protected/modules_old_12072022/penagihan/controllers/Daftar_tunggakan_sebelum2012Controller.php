<?php

class Daftar_tunggakan_sebelum2012Controller extends Controller
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
		$bulanpjk = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';

		$wherethnpajak = $tahunpjk!=0 ? (' AND TBLPENDATAAN_THNPAJAK='.$tahunpjk) : '';
		$whereblnpajak = $bulanpjk!=0 ? (' AND TBLPENDATAAN_BLNPAJAK='.$bulanpjk) : '';

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
		// $sql = "
		// SELECT
		// TBLDAFTAR.TBLDAFTAR_GOLONGAN
		// ,TBLDAFTAR.TBLDAFTAR_NOPOK
		// ,TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		// ,TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		// ,TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
		// ,TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		// sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=1  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  JANUARI,
		// sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=2  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  FEBRUARI,
		// sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=3  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  MARET,
		// sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=4  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  APRIL,
		// sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=5  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  MEI,
		// sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=6  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  JUNI,
		// sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=7  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  JULI,
		// sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=8  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  AGUSTUS,
		// sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=9  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  SEPTEMBER,
		// sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=10  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  OKTOBER,
		// sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=11  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  NOVEMBER,
		// sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=12  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  DESEMBER
		
		// FROM TBLDAFTAR
		// Inner Join " . $namaTBL . " ON TBLDAFTAR.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK
		
		// WHERE
		// " . $namaTBL . "_REKPENDAPATAN = 4
		// AND " . $namaTBL . "_REKPAD = 1
		// AND " . $namaTBL . "_REKPAJAK = 1
		// AND " . $namaTBL . "_REKAYAT = ".$AYAT."
		// ".$wherethnpajak."
		// ".$whereblnpajak."
		// and " . $namaTBL . "." . $namaTBL . "_ISJNSPENETAPAN='S'

		// group by TBLDAFTAR.TBLDAFTAR_GOLONGAN
		// ,TBLDAFTAR.TBLDAFTAR_NOPOK
		// ,TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		// ,TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		// ,TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
		// ,TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT

		// ORDER BY  TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		// ,TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		// ,TBLDAFTAR.TBLDAFTAR_NOPOK
		// ";
		// return $data = Yii::app()->db->createCommand( $sql )->queryAll();
	}


	public function actionCetak()
	{	
		$masapajak = substr($_REQUEST['masapajak'], -2) ? substr($_REQUEST['masapajak'], -2) : '' ;
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '' ;
		$TBLKECAMATAN_ID = $_REQUEST['TBLKECAMATAN_ID'] ? $_REQUEST['TBLKECAMATAN_ID'] : '' ;
		$JALAN = $_REQUEST['JALAN'] ? $_REQUEST['JALAN'] : '' ;
		$cara_penetapan = $_REQUEST['cara_penetapan'] ? $_REQUEST['cara_penetapan'] : '' ;

		$AYAT = $_REQUEST['TBLREKENING_KODE'];
		if($AYAT=='4.1.1.1.0'){
			$namaTBL = 'TBLDAFTHOTEL';
			$judul = 'PAJAK HOTEL';
			$NAKB = 'DENDAKRGBAYAR';
			$REKAYAT = '1';
		}
		elseif($AYAT=='4.1.1.2.0'){
			$namaTBL= 'TBLDAFTRMAKAN';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$REKAYAT = '2';
		}
		elseif($AYAT=='4.1.1.3.0'){
			$namaTBL= 'TBLDAFTHIBURAN';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$REKAYAT = '3';
		}
		elseif($AYAT=='4.1.1.4.0'){
			$namaTBL= 'TBLDAFTREKLAME';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$REKAYAT = '4';
		}
		elseif($AYAT=='4.1.1.7.0'){
			$namaTBL= 'TBLDAFTPARKIR';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$REKAYAT = '7';
		}
		elseif($AYAT=='4.1.1.8.0'){
			$namaTBL= 'TBLDAFTTANAH';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$REKAYAT = '8';
		}
		elseif($AYAT=='4.1.1.9.0'){
			$namaTBL= 'TBLDAFTBURUNG';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$REKAYAT = '9';
		}
		elseif($AYAT=='4.1.1.11.0'){
			$namaTBL= 'TBLDAFTBPHTB';
			$judul = 'PAJAK BPHTB';
			$NAKB = 'NAKB';
			$REKAYAT = '11';
		}
	

		if($masapajak==''){
			$wherethnpajak = "";
		}
		else{
			$wherethnpajak = "AND TBLPENDATAAN_THNPAJAK = ".$masapajak."";
		};

		if($TBLKECAMATAN_ID==''){
			$wherekecamatan = "";
		}
		else{
			$wherekecamatan = "AND ".$namaTBL.".TBLKECAMATAN_ID = ".$TBLKECAMATAN_ID."";
		};

		if($cara_penetapan==''){
			$penetapan = "";
		}
		else{
			$penetapan = "AND ".$namaTBL.".ISJNSPENETAPAN = ".$cara_penetapan."";
		};
	

		$sql ="SELECT
			*
			FROM
			(
			SELECT
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			".$namaTBL.".TBLPENDATAAN_THNPAJAK,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
			SUM (
			CASE
			WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) = 0)
			AND (NVL(".$namaTBL.".".$namaTBL."_NOMORSKPD, 0) > 0)
			AND TBLPENDATAAN_BLNPAJAK = 1 THEN
			NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
			ELSE
			0
			END
			) AS tungakan_januari,
			SUM (
			CASE
			WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) = 0)
			AND (NVL(".$namaTBL.".".$namaTBL."_NOMORSKPD, 0) > 0)
			AND TBLPENDATAAN_BLNPAJAK = 2 THEN
			NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
			ELSE
			0
			END
			) AS tungakan_februari,
			SUM (
			CASE
			WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) = 0)
			AND (NVL(".$namaTBL.".".$namaTBL."_NOMORSKPD, 0) > 0)
			AND TBLPENDATAAN_BLNPAJAK = 3 THEN
			NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
			ELSE
			0
			END
			) AS tungakan_maret,
			SUM (
			CASE
			WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) = 0)
			AND (NVL(".$namaTBL.".".$namaTBL."_NOMORSKPD, 0) > 0)
			AND TBLPENDATAAN_BLNPAJAK = 4 THEN
			NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
			ELSE
			0
			END
			) AS tungakan_april,
			SUM (
			CASE
			WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) = 0)
			AND (NVL(".$namaTBL.".".$namaTBL."_NOMORSKPD, 0) > 0)
			AND TBLPENDATAAN_BLNPAJAK = 5 THEN
			NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
			ELSE
			0
			END
			) AS tungakan_mei,
			SUM (
			CASE
			WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) = 0)
			AND (NVL(".$namaTBL.".".$namaTBL."_NOMORSKPD, 0) > 0)
			AND TBLPENDATAAN_BLNPAJAK = 6 THEN
			NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
			ELSE
			0
			END
			) AS tungakan_juni,
			SUM (
			CASE
			WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) = 0)
			AND (NVL(".$namaTBL.".".$namaTBL."_NOMORSKPD, 0) > 0)
			AND TBLPENDATAAN_BLNPAJAK = 7 THEN
			NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
			ELSE
			0
			END
			) AS tungakan_juli,
			SUM (
			CASE
			WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) = 0)
			AND (NVL(".$namaTBL.".".$namaTBL."_NOMORSKPD, 0) > 0)
			AND TBLPENDATAAN_BLNPAJAK = 8 THEN
			NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
			ELSE
			0
			END
			) AS tungakan_agustus,
			SUM (
			CASE
			WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) = 0)
			AND (NVL(".$namaTBL.".".$namaTBL."_NOMORSKPD, 0) > 0)
			AND TBLPENDATAAN_BLNPAJAK = 9 THEN
			NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
			ELSE
			0
			END
			) AS tungakan_september,
			SUM (
			CASE
			WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) = 0)
			AND (NVL(".$namaTBL.".".$namaTBL."_NOMORSKPD, 0) > 0)
			AND TBLPENDATAAN_BLNPAJAK = 10 THEN
			NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
			ELSE
			0
			END
			) AS tungakan_oktober,
			SUM (
			CASE
			WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) = 0)
			AND (NVL(".$namaTBL.".".$namaTBL."_NOMORSKPD, 0) > 0)
			AND TBLPENDATAAN_BLNPAJAK = 11 THEN
			NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
			ELSE
			0
			END
			) AS tungakan_november,
			SUM (
			CASE
			WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) = 0)
			AND (NVL(".$namaTBL.".".$namaTBL."_NOMORSKPD, 0) > 0)
			AND TBLPENDATAAN_BLNPAJAK = 12 THEN
			NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
			ELSE
			0
			END
			) AS tungakan_desember,
			SUM (
			CASE
			WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) = 0)
			AND (NVL(".$namaTBL.".".$namaTBL."_NOMORSKPD, 0) > 0) THEN
			NVL (".$namaTBL.".".$namaTBL."_PAJAKSKPD, 0)
			ELSE
			0
			END
			) AS jumlah_tunggakan,
			SUM (
			CASE
			WHEN (NVL(".$namaTBL.".".$namaTBL."_RUPIAHSETOR, 0) = 0)
			AND (NVL(".$namaTBL.".".$namaTBL."_NOMORSKPD, 0) > 0) THEN
			1
			ELSE
			0
			END
			) AS jumlah_skpd
			FROM
			TBLDAFTAR
			INNER JOIN ".$namaTBL." ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
			WHERE
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA IS NOT NULL
			AND ".$namaTBL."_REKPENDAPATAN = 4
			AND ".$namaTBL."_REKPAD = 1
			AND ".$namaTBL."_REKPAJAK = 1
			AND ".$namaTBL."_REKAYAT = ".$REKAYAT."
			".$wherethnpajak."
			".$penetapan."
			".$wherekecamatan."
			GROUP BY
			".$namaTBL.".TBLPENDATAAN_THNPAJAK,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
			)
			WHERE
			(jumlah_tunggakan > 0)
			ORDER BY
			TBLKECAMATAN_IDBADANUSAHA,
			TBLKELURAHAN_IDBADANUSAHA,
			TBLDAFTAR_NOPOK"; 		
			
			$data['tunggakan'] = $tunggakan = Yii::app()->db->createCommand($sql)->queryAll();
			$data['judul'] = $judul;

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