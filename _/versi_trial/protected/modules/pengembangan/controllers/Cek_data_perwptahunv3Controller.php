<?php

class Cek_data_perwptahunv3Controller extends Controller
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

	public function getData($masapajak,$bulan,$TBLREKENING_KODE,$TBLKECAMATAN_ID,$JALAN,$cara_penetapan,$cutoff)
	{
		$AYAT = $TBLREKENING_KODE;
		if($AYAT=='4.1.1.1.0'){
			$namaTBL = 'TBLDAFTHOTEL';
			$judul = 'PAJAK HOTEL';
			$NAKB = 'DENDAKRGBAYAR';
			$jenisbayar = "'SPTPD'";
			$jab_id = '18';
			$REKAYAT = '1';
		}
		elseif($AYAT=='4.1.1.2.0'){
			$namaTBL= 'TBLDAFTRMAKAN';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$jenisbayar = "'SPTPD'";
			$REKAYAT = '2';
			$jab_id = '19';
		}
		elseif($AYAT=='4.1.1.3.0'){
			$namaTBL= 'TBLDAFTHIBURAN';
			$judul = 'PAJAK HIBURAN';
			$NAKB = 'NAKB';
			$jenisbayar = "'SPTPD'";
			$REKAYAT = '3';
			$jab_id = '20';
		}
		elseif($AYAT=='4.1.1.4.0'){
			$namaTBL= 'TBLDAFTREKLAME';
			$judul = 'PAJAK REKLAME';
			$NAKB = 'NAKB';
			$jenisbayar = "'SKPD'";
			$REKAYAT = '4';
			$jab_id = '23';
		}
		elseif($AYAT=='4.1.1.7.0'){
			$namaTBL= 'TBLDAFTPARKIR';
			$judul = 'PAJAK PARKIR';
			$jenisbayar = "'SPTPD'";
			$NAKB = 'NAKB';
			$REKAYAT = '7';
			$jab_id = '21';
		}
		elseif($AYAT=='4.1.1.8.0'){
			$namaTBL= 'TBLDAFTTANAH';
			$judul = 'PAJAK AIR TANAH';
			$jenisbayar = "'SKPD'";
			$NAKB = 'NAKB';
			$REKAYAT = '8';
			$jab_id = '22';
		}
		elseif($AYAT=='4.1.1.9.0'){
			$namaTBL= 'TBLDAFTBURUNG';
			$judul = 'PAJAK SARANG BURUNG WALET';
			$jenisbayar = "'SPTPD'";
			$NAKB = 'NAKB';
			$REKAYAT = '9';
		}
		elseif($AYAT=='4.1.1.11.0'){
			$namaTBL= 'TBLDAFTBPHTB';
			$judul = 'PAJAK BPHTB';
			$jenisbayar = "'SPTPD'";
			$NAKB = 'NAKB';
			$REKAYAT = '11';
		}

		$KDJLNREK = $TBLREKENING_KODE;
		if($KDJLNREK=='4.1.1.4.0'){
			$KDJLN = "AND ".$namaTBL.".REFJALAN_ID = ".$JALAN."";
		}
		else{
			$KDJLN = "";
		};

		if($JALAN==''){
			$KDJLN = "";
		}
		else{
			$KDJLN = "AND ".$namaTBL.".REFJALAN_ID = ".$JALAN."";
		};


		if($masapajak==''){
			$wherethnpajak = "";
		}
		else{
			$wherethnpajak = "AND ".$namaTBL.".TBLPENDATAAN_THNPAJAK = ".$masapajak."";
		};

		if($bulan==''){
			$whereblnpajak = "";
		}
		else{
			$whereblnpajak = "AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = ".$bulan."";
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

		if(empty($cutoff)){
			$cutoff = "";
		}
		else { if ($AYAT=='4.1.1.4.0'){
			$cutoff = " 
			AND TO_DATE (
			CONCAT (
			TBLDAFTREKLAME_BLNSKPD,
			CONCAT (
			'-',
			CONCAT (TBLDAFTREKLAME_TGLSKPD, CONCAT('-', TBLDAFTREKLAME_THNSKPD))
			)
			),
			'MM-DD-YY'
			) < TO_DATE('$cutoff', 'YYYY-MM-DD')
			";
		} else {
			$cutoff = " 
			AND TO_DATE (
			CONCAT (
			".$namaTBL.".".$namaTBL."_BLNTERIMA,
			CONCAT (
			'-',
			CONCAT (".$namaTBL.".".$namaTBL."_TGLTERIMA, CONCAT('-', ".$namaTBL.".".$namaTBL."_THNTERIMA))
			)
			),
			'MM-DD-YY'
			) < TO_DATE('$cutoff', 'YYYY-MM-DD')
			";
		}
	};


	$SQLKODE = $TBLREKENING_KODE;
	if($SQLKODE=='4.1.1.4.0'){
		$sql= "SELECT
		*
		FROM
		(
		SELECT
		tbldaftar_badanusahanama,
		tbldaftar_badanusahaalamat,
		TBLSETOR.TBLSETOR_RUPIAHSETOR,
		TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK,
		TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK,
		TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK,
		TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE,
		TBLDAFTREKLAME.TBLDAFTAR_GOLONGAN,
		TBLDAFTREKLAME.TBLDAFTAR_NOPOK,
		TBLDAFTREKLAME.TBLKECAMATAN_ID,
		TBLDAFTREKLAME.TBLKELURAHAN_ID,
		TBLDAFTREKLAME.TBLDAFTREKLAME_ISJNSPENETAPAN,
		TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRI,
		TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRI,
		TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRI,
		TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAK,
		TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN2,
		TBLDAFTREKLAME.TBLDAFTREKLAME_KETERANGAN1,
		TBLDAFTREKLAME.TBLDAFTREKLAME_JNSREKLAME,
		TBLDAFTREKLAME.TBLDAFTREKLAME_THNBATASSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_BLNBATASSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_TGLBATASSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_NOMORSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_URUTSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAKSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_THNSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_BLNSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_TGLSKPD,
		TBLDAFTREKLAME.TBLDAFTREKLAME_THNENTRISETOR,
		TBLDAFTREKLAME.TBLDAFTREKLAME_BLNENTRISETOR,
		TBLDAFTREKLAME.TBLDAFTREKLAME_TGLENTRISETOR,
		TBLDAFTREKLAME.TBLDAFTREKLAME_REGSETOR,
		TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHSETOR,
		TBLDAFTREKLAME.REFJALAN_ID,
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
		CONCAT (
		TBLDAFTREKLAME_TGLENTRI,
		CONCAT (
		'/',
		CONCAT (
		TBLDAFTREKLAME_BLNENTRI,
		(CONCAT('/20', TBLDAFTREKLAME_THNENTRI))
		)
		)
		) AS Tgl_ENTRY,
		TO_DATE (
		CONCAT (
		TBLDAFTREKLAME_BLNSKPD,
		CONCAT (
		'/',
		CONCAT (TBLDAFTREKLAME_TGLSKPD, CONCAT('/20', TBLDAFTREKLAME_THNSKPD))
		)
		),
		'MM/DD/YY'
		) AS Tanggal_Ketetapan,
		(
		CASE
		WHEN NVL (TBLDAFTREKLAME.TBLDAFTREKLAME_PAJAKSKPD, 0) <> 0 THEN
		'SKPD Sudah Dicetak'
		WHEN NVL (TBLDAFTREKLAME.TBLDAFTREKLAME_RUPIAHSETOR, 0) <> 0 THEN
		'SKPD Sudah Dicetak'
		END
		) AS status
		FROM
		TBLDAFTREKLAME
		LEFT JOIN TBLSETOR ON TBLDAFTREKLAME.TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
		AND TBLDAFTREKLAME.TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK
		AND TBLDAFTREKLAME.TBLPENDATAAN_TGLPAJAK = TBLSETOR.TBLPENDATAAN_TGLPAJAK
		AND TBLDAFTREKLAME.TBLPENDATAAN_PAJAKKE = TBLSETOR.TBLPENDATAAN_PAJAKKE
		AND TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
		AND (
		NVL (TBLSETOR.TBLSETOR_JNSKETETAPAN, '0') = '0'
		OR TBLSETOR.TBLSETOR_JNSKETETAPAN = 'T'
		)
		AND TBLSETOR.TBLSETOR_REKPAJAK = 1
		INNER JOIN TBLDAFTAR ON TBLDAFTREKLAME.TBLDAFTAR_NOPOK = TBLDAFTAR.tbldaftar_nopok
		)
		WHERE
		NVL (TBLDAFTREKLAME_THNSKPD, 0) <> 0
		AND NVL (TBLDAFTREKLAME_BLNSKPD, 0) <> 0
		AND NVL (TBLDAFTREKLAME_TGLSKPD, 0) <> 0
		AND NVL (TBLDAFTREKLAME_PAJAK, 0) > 0
		AND NVL (TBLDAFTREKLAME_PAJAKSKPD, 0) > 0
		AND NVL (TBLDAFTREKLAME_RUPIAHSETOR, 0) <> 0
		AND TBLPENDATAAN_THNPAJAK = ".$masapajak."
		".$cutoff."
		";

		$data['kendali'] = $kendali = Yii::app()->db->createCommand($sql)->queryAll();
	}

	else{
		$sqllain = "SELECT
		*
		FROM
		(
		SELECT
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		".$namaTBL.".TBLPENDATAAN_THNPAJAK,
		TBLDAFTAR.tbldaftar_badanusahanama,
		TBLDAFTAR.tbldaftar_pemiliknama,
		TBLDAFTAR.tbldaftar_jenispendapatan,
		TBLDAFTAR.tbldaftar_golongan,
		TBLDAFTAR.tblkelurahan_idbadanusaha,
		TBLDAFTAR.tblkecamatan_idbadanusaha,
		TBLDAFTAR.tbldaftar_badanusahaalamat,
		SUM (
		CASE
		WHEN TBLSETOR.TBLPENDATAAN_BLNPAJAK = 1 
		AND TBLSETOR_JNSBAYAR = ".$jenisbayar."
		THEN
		NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
		ELSE
		0
		END
		) AS januari,
		SUM (
		CASE
		WHEN TBLSETOR.TBLPENDATAAN_BLNPAJAK = 2 
		AND TBLSETOR_JNSBAYAR = ".$jenisbayar."
		THEN
		NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
		ELSE
		0
		END
		) AS februari,
		SUM (
		CASE
		WHEN TBLSETOR.TBLPENDATAAN_BLNPAJAK = 3 
		AND TBLSETOR_JNSBAYAR = ".$jenisbayar."
		THEN
		NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
		ELSE
		0
		END
		) AS maret,
		SUM (
		CASE
		WHEN TBLSETOR.TBLPENDATAAN_BLNPAJAK = 4 
		AND TBLSETOR_JNSBAYAR = ".$jenisbayar."
		THEN
		NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
		ELSE
		0
		END
		) AS april,
		SUM (
		CASE
		WHEN TBLSETOR.TBLPENDATAAN_BLNPAJAK = 5 
		AND TBLSETOR_JNSBAYAR = ".$jenisbayar."
		THEN
		NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
		ELSE
		0
		END
		) AS mei,
		SUM (
		CASE
		WHEN TBLSETOR.TBLPENDATAAN_BLNPAJAK = 6 
		AND TBLSETOR_JNSBAYAR = ".$jenisbayar."
		THEN
		NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
		ELSE
		0
		END
		) AS juni,
		SUM (
		CASE
		WHEN TBLSETOR.TBLPENDATAAN_BLNPAJAK = 7 
		AND TBLSETOR_JNSBAYAR = ".$jenisbayar."
		THEN
		NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
		ELSE
		0
		END
		) AS juli,
		SUM (
		CASE
		WHEN TBLSETOR.TBLPENDATAAN_BLNPAJAK = 8 
		AND TBLSETOR_JNSBAYAR = ".$jenisbayar."
		THEN
		NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
		ELSE
		0
		END
		) AS agustus,
		SUM (
		CASE
		WHEN TBLSETOR.TBLPENDATAAN_BLNPAJAK = 9 
		AND TBLSETOR_JNSBAYAR = ".$jenisbayar."
		THEN
		NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
		ELSE
		0
		END
		) AS september,
		SUM (
		CASE
		WHEN TBLSETOR.TBLPENDATAAN_BLNPAJAK = 10 
		AND TBLSETOR_JNSBAYAR = ".$jenisbayar."
		THEN
		NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
		ELSE
		0
		END
		) AS oktober,
		SUM (
		CASE
		WHEN TBLSETOR.TBLPENDATAAN_BLNPAJAK = 11 
		AND TBLSETOR_JNSBAYAR = ".$jenisbayar."
		THEN
		NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
		ELSE
		0
		END
		) AS november,
		SUM (
		CASE
		WHEN TBLSETOR.TBLPENDATAAN_BLNPAJAK = 12 
		AND TBLSETOR_JNSBAYAR = ".$jenisbayar."
		THEN
		NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
		ELSE
		0
		END
		) AS desember,
		SUM (
		CASE
		WHEN TBLSETOR.TBLPENDATAAN_THNPAJAK = ".$masapajak." 
		AND TBLSETOR_JNSBAYAR = ".$jenisbayar."
		THEN
		NVL (TBLSETOR.TBLSETOR_RUPIAHSETOR, 0)
		ELSE
		0
		END
		) AS jumlah_pembayaran,
		SUM (
		CASE
		WHEN TBLSETOR.TBLPENDATAAN_THNPAJAK = ".$masapajak." 
		AND NVL(".$namaTBL.".TBLPENDATAAN_TGLPAJAK, 0) = 0
		AND TBLSETOR_JNSBAYAR = ".$jenisbayar."
		THEN
		1
		ELSE
		0
		END
		) AS jumlah_skpd
		FROM
		TBLDAFTAR
		INNER JOIN ".$namaTBL." ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		LEFT JOIN TBLSETOR ON TBLSETOR.TBLPENDATAAN_THNPAJAK = ".$namaTBL.".TBLPENDATAAN_THNPAJAK
		AND NVL (
		TBLSETOR.TBLPENDATAAN_BLNPAJAK,
		0
		) = NVL (
		".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
		0
		)
		AND NVL (
		TBLSETOR.TBLPENDATAAN_TGLPAJAK,
		0
		) = NVL (
		".$namaTBL.".TBLPENDATAAN_TGLPAJAK,
		0
		)
		AND NVL (
		TBLSETOR.TBLPENDATAAN_PAJAKKE,
		0
		) = NVL (
		".$namaTBL.".TBLPENDATAAN_PAJAKKE,
		0
		)
		AND TBLSETOR.TBLDAFTAR_NOPOK = ".$namaTBL.".TBLDAFTAR_NOPOK
		AND TBLSETOR.TBLSETOR_REKPENDAPATAN = ".$namaTBL.".".$namaTBL."_REKPENDAPATAN
		AND TBLSETOR.TBLSETOR_REKPAD = ".$namaTBL.".".$namaTBL."_REKPAD
		AND TBLSETOR.TBLSETOR_REKPAJAK = ".$namaTBL.".".$namaTBL."_REKPAJAK
		AND TBLSETOR.TBLSETOR_REKAYAT = ".$namaTBL.".".$namaTBL."_REKAYAT
		AND TBLSETOR_JNSBAYAR = ".$jenisbayar."
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK <> 150000
		AND TBLDAFTAR.TBLDAFTAR_NOPOK <> 151000
		AND TBLDAFTAR.TBLDAFTAR_NOPOK <> 1500000
		AND TBLSETOR.TBLPENDATAAN_THNPAJAK > 0
		AND ".$namaTBL."_REKPENDAPATAN = 4
		AND ".$namaTBL."_REKPAD = 1
		AND ".$namaTBL."_REKPAJAK = 1
		AND ".$namaTBL."_REKAYAT = ".$REKAYAT."
		".$wherethnpajak."
		".$whereblnpajak."
		".$penetapan."
		".$wherekecamatan."
		".$cutoff."
		GROUP BY
		".$namaTBL.".TBLPENDATAAN_THNPAJAK,
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.tbldaftar_badanusahanama,
		TBLDAFTAR.tbldaftar_pemiliknama,
		TBLDAFTAR.tbldaftar_jenispendapatan,
		TBLDAFTAR.tbldaftar_golongan,
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.tblkelurahan_idbadanusaha,
		TBLDAFTAR.tblkecamatan_idbadanusaha,
		TBLDAFTAR.tbldaftar_badanusahaalamat,
		TBLSETOR.TBLPENDATAAN_THNPAJAK
		)
		ORDER BY
		tblkecamatan_idbadanusaha,
		tblkelurahan_idbadanusaha,
		TBLDAFTAR_NOPOK
		";

		$data['kendali'] = Yii::app()->db->createCommand($sqllain)->queryAll();
	};
	$sql3="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 8";	
	$sql4="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = ".$jab_id."";	

	$data['jab3'] = Yii::app()->db->createCommand($sql3)->queryRow();
	$data['jab4'] = Yii::app()->db->createCommand($sql4)->queryRow();

	$data['judul'] = $judul;

		return $data;
	}
	
	public function actionCetak()
	{

		$masapajak = substr($_REQUEST['masapajak'], -2) ? substr($_REQUEST['masapajak'], -2) : '' ;
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '' ;
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '' ;
		$TBLKECAMATAN_ID = $_REQUEST['TBLKECAMATAN_ID'] ? $_REQUEST['TBLKECAMATAN_ID'] : '' ;
		$JALAN = $_REQUEST['JALAN'] ? $_REQUEST['JALAN'] : '' ;
		$cara_penetapan = $_REQUEST['cara_penetapan'] ? $_REQUEST['cara_penetapan'] : '' ;
		$cutoff = trim($_REQUEST['cutoff'])!='' ? date('Y-m-d', strtotime($_REQUEST['cutoff']) ) : "";
		
		$data = $this->getData($masapajak,$bulan,$TBLREKENING_KODE,$TBLKECAMATAN_ID,$JALAN,$cara_penetapan,$cutoff);
	// print_r($data);die();

		header('Content-Type: application/excel');
		header("Content-Disposition: attachment;Filename=Daftar Buku Kendali Pajak Bulanan.xls");

	$this->renderPartial('cetak', array('data'=>$data));
	}
}