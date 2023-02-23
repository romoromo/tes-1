<?php

class Daftra_bukukendali_skpdbController extends Controller
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
		// $sql = 
		// SELECT
		// TBLDAFTAR.TBLDAFTAR_GOLONGAN
		// ,TBLDAFTAR.TBLDAFTAR_NOPOK
		// ,TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		// ,TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		// ,TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
		// ,TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		// sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=1  THEN NVL( . $namaTBL . _OMSETPAJAK,0) ELSE 0 END) AS  JANUARI,
		// sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=2  THEN NVL( . $namaTBL . _OMSETPAJAK,0) ELSE 0 END) AS  FEBRUARI,
		// sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=3  THEN NVL( . $namaTBL . _OMSETPAJAK,0) ELSE 0 END) AS  MARET,
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
		return $data = Yii::app()->db->createCommand( $sql )->queryAll();
	}

	
	public function actionCetak()
	{
		$tahunpjk = substr($_REQUEST['tahunpjk'], -2) ? substr($_REQUEST['tahunpjk'], -2) : '' ;
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

		
		if($tahunpjk==''){
			$wherethpajak = "";

		}
		else{
			$wherethpajak = "AND ".$namaTBL.".TBLPENDATAAN_THNPAJAK = ".$tahunpjk."
			";
		};		

		$sql = "SELECT
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
		WHEN (NVL(TBLSETOR.TBLSETOR_RUPIAHSETOR, 0) > 0)
		AND ".$namaTBL.".".$namaTBL."_RUPIAHSETOR <> ".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR
		AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = 1 THEN
		NVL (".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR, 0)
		ELSE
		0
		END
		) AS januari,
		SUM (
		CASE
		WHEN (NVL(TBLSETOR.TBLSETOR_RUPIAHSETOR, 0) > 0)
		AND ".$namaTBL.".".$namaTBL."_RUPIAHSETOR <> ".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR
		AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = 2 THEN
		NVL (".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR, 0)
		ELSE
		0
		END
		) AS februari,
		SUM (
		CASE
		WHEN (NVL(TBLSETOR.TBLSETOR_RUPIAHSETOR, 0) > 0)
		AND ".$namaTBL.".".$namaTBL."_RUPIAHSETOR <> ".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR
		AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = 3 THEN
		NVL (".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR, 0)
		ELSE
		0
		END
		) AS maret,
		SUM (
		CASE
		WHEN (NVL(TBLSETOR.TBLSETOR_RUPIAHSETOR, 0) > 0)
		AND ".$namaTBL.".".$namaTBL."_RUPIAHSETOR <> ".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR
		AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = 4 THEN
		NVL (".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR, 0)
		ELSE
		0
		END
		) AS april,
		SUM (
		CASE
		WHEN (NVL(TBLSETOR.TBLSETOR_RUPIAHSETOR, 0) > 0)
		AND ".$namaTBL.".".$namaTBL."_RUPIAHSETOR <> ".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR
		AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = 5 THEN
		NVL (".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR, 0)
		ELSE
		0
		END
		) AS mei,
		SUM (
		CASE
		WHEN (NVL(TBLSETOR.TBLSETOR_RUPIAHSETOR, 0) > 0)
		AND ".$namaTBL.".".$namaTBL."_RUPIAHSETOR <> ".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR
		AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = 6 THEN
		NVL (".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR, 0)
		ELSE
		0
		END
		) AS juni,
		SUM (
		CASE
		WHEN (NVL(TBLSETOR.TBLSETOR_RUPIAHSETOR, 0) > 0)
		AND ".$namaTBL.".".$namaTBL."_RUPIAHSETOR <> ".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR
		AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = 7 THEN
		NVL (".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR, 0)
		ELSE
		0
		END
		) AS juli,
		SUM (
		CASE
		WHEN (NVL(TBLSETOR.TBLSETOR_RUPIAHSETOR, 0) > 0)
		AND ".$namaTBL.".".$namaTBL."_RUPIAHSETOR <> ".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR
		AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = 8 THEN
		NVL (".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR, 0)
		ELSE
		0
		END
		) AS agustus,
		SUM (
		CASE
		WHEN (NVL(TBLSETOR.TBLSETOR_RUPIAHSETOR, 0) > 0)
		AND ".$namaTBL.".".$namaTBL."_RUPIAHSETOR <> ".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR
		AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = 9 THEN
		NVL (".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR, 0)
		ELSE
		0
		END
		) AS september,
		SUM (
		CASE
		WHEN (NVL(TBLSETOR.TBLSETOR_RUPIAHSETOR, 0) > 0)
		AND ".$namaTBL.".".$namaTBL."_RUPIAHSETOR <> ".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR
		AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = 10 THEN
		NVL (".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR, 0)
		ELSE
		0
		END
		) AS oktober,
		SUM (
		CASE
		WHEN (NVL(TBLSETOR.TBLSETOR_RUPIAHSETOR, 0) > 0)
		AND ".$namaTBL.".".$namaTBL."_RUPIAHSETOR <> ".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR
		AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = 11 THEN
		NVL (".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR, 0)
		ELSE
		0
		END
		) AS november,
		SUM (
		CASE
		WHEN (NVL(TBLSETOR.TBLSETOR_RUPIAHSETOR, 0) > 0)
		AND ".$namaTBL.".".$namaTBL."_RUPIAHSETOR <> ".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR
		AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = 12 THEN
		NVL (".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR, 0)
		ELSE
		0
		END
		) AS desember,
		SUM (
		CASE
		WHEN (NVL(TBLSETOR.TBLSETOR_RUPIAHSETOR, 0) > 0)
		AND ".$namaTBL.".".$namaTBL."_RUPIAHSETOR <> ".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR THEN
		NVL (".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR, 0)
		ELSE
		0
		END
		) AS jumlah_pembayaran,
		SUM (
		CASE
		WHEN (NVL(TBLSETOR.TBLSETOR_RUPIAHSETOR, 0) > 0)
		AND TBLSETOR.TBLSETOR_JNSBAYAR NOT LIKE '%BNG%'
		AND TBLSETOR.TBLSETOR_JNSBAYAR NOT LIKE '%DND%' THEN
		1
		ELSE
		0
		END
		) AS jumlah_skpd
		FROM
		TBLDAFTAR
		INNER JOIN ".$namaTBL." ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		INNER JOIN TBLSETOR ON ".$namaTBL.".TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
		AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK
		AND NVL (".$namaTBL.".TBLPENDATAAN_TGLPAJAK, 0) = NVL (TBLSETOR.TBLPENDATAAN_TGLPAJAK, 0)
		AND ".$namaTBL.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
		AND TBLSETOR.TBLSETOR_JNSKETETAPAN = 'K'
		WHERE
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA IS NOT NULL
		AND NVL (".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR, 0) > 0
		AND ".$namaTBL.".".$namaTBL."_REKPENDAPATAN = 4
		AND ".$namaTBL.".".$namaTBL."_REKPAD = 1
		AND ".$namaTBL.".".$namaTBL."_REKPAJAK = 1
		AND ".$namaTBL.".".$namaTBL."_REKAYAT = ".$REKAYAT."
		".$wherethpajak."
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
		ORDER BY
		TBLKECAMATAN_IDBADANUSAHA,
		TBLKELURAHAN_IDBADANUSAHA,
		TBLDAFTAR_NOPOK";
		$data['skpdb'] = $skpdb =Yii::app()->db->createCommand($sql)->queryAll();

		$this->renderPartial('cetak',array('data'=>$data));
	}

	public function actionCetakv2()
	{
		$tahunpjk = substr($_REQUEST['tahunpjk'], -2) ? substr($_REQUEST['tahunpjk'], -2) : '' ;
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '' ;
		$tahun_penetapan = substr($_REQUEST['tahun_penetapan'], -2) ? substr($_REQUEST['tahun_penetapan'], -2) : '' ;

		$AYAT = $_REQUEST['TBLREKENING_KODE'];

		if($AYAT=='4.1.1.1.0'){
			$namaTBL = 'TBLDAFTHOTEL';
			$judul = 'PAJAK HOTEL';
			$NAKB = 'KENAIKANKRGBAYAR';
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
			$judul = 'PAJAK SARANG WALET';
			$NAKB = 'NAKB';
			$REKAYAT = '9';
		}

		if($tahunpjk==''){
			$wherethpajak = "";

		}
		else{
			$wherethpajak = "AND ".$namaTBL.".TBLPENDATAAN_THNPAJAK = ".$tahunpjk."";
		};

		if($tahun_penetapan==''){
			$wherethtap = "";

		}
		else{
			$wherethtap = "AND ".$namaTBL.".".$namaTBL."_THNKURANGBAYAR = ".$tahun_penetapan."";
		};		

		
		$sqlv2 = "
		SELECT
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		".$namaTBL.".TBLPENDATAAN_THNPAJAK,
		".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
		".$namaTBL.".TBLPENDATAAN_TGLPAJAK,
		".$namaTBL.".".$namaTBL."_THNKURANGBAYAR,
		".$namaTBL.".".$namaTBL."_BLNKURANGBAYAR,
		".$namaTBL.".".$namaTBL."_TGLKURANGBAYAR,
		".$namaTBL.".TBLDAFTAR_JNSPENDAPATAN,
		".$namaTBL.".TBLDAFTAR_GOLONGAN,
		".$namaTBL.".TBLDAFTAR_NOPOK,
		".$namaTBL.".TBLKECAMATAN_ID,
		".$namaTBL.".TBLKELURAHAN_ID,
		".$namaTBL.".".$namaTBL."_REGKURANGBAYAR,
		".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
		".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
		".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
		".$namaTBL.".".$namaTBL."_PAJAKPERIKSA AS POKOK,
		".$namaTBL.".".$namaTBL."_BUNGAKRGBAYAR AS BUNGA,
		".$namaTBL.".".$namaTBL."_".$NAKB." AS DENDA,
		".$namaTBL.".".$namaTBL."_BLNKBAWAL,
		".$namaTBL.".".$namaTBL."_BLNKBAKHIR,
		".$namaTBL.".".$namaTBL."_RUPIAHKRGBAYAR AS JUMLAH,
		TBLSETOR_THNSETOR AS THSSP,
		TBLSETOR_BLNSETOR AS BLSSP,
		TBLSETOR_TGLSETOR AS HRSSP,
		TBLSETOR_RUPIAHSETOR AS TERBAYARKAN
		FROM
		".$namaTBL."
		INNER JOIN TBLDAFTAR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		LEFT JOIN TBLSETOR ON ".$namaTBL.".TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
		AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK
		AND NVL(".$namaTBL.".TBLPENDATAAN_TGLPAJAK, 0) = NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK, 0)
		AND ".$namaTBL.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK 	
		AND TBLSETOR.TBLSETOR_JNSKETETAPAN = 'K'
		AND TBLSETOR.TBLSETOR_REKPAJAK = '1'
		WHERE NVL (".$namaTBL.".".$namaTBL."_REGKURANGBAYAR, 0) > 0
		".$wherethpajak."
		".$wherethtap."
		AND NVL (".$namaTBL.".".$namaTBL."_REGSURATANGSUR, 0) = 0 
		ORDER BY TBLKECAMATAN_ID,
		TBLKELURAHAN_ID,
		TBLDAFTAR_NOPOK
		";

		$data['skpdbv2'] = $skpdbv2 =Yii::app()->db->createCommand($sqlv2)->queryAll();
		$data['namaTBL'] = $namaTBL;
		$data['judul'] = $judul;

		$sql3="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 8";	
		$sql4="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = ".$jab_id."";	

		$data['jab3'] = Yii::app()->db->createCommand($sql3)->queryRow();
		$data['jab4'] = Yii::app()->db->createCommand($sql4)->queryRow();

		header('Content-Type: application/excel');
		header("Content-Disposition: attachment;Filename=Daftar Buku Kendali Pajak SKPDKB.xls");

		$this->renderPartial('cetakv2',array('data'=>$data));	
	}
}


