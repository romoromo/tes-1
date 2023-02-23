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
			AND TBLREKENING_REKAYAT IN (1,2,3,7)
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

	public function actionCari()
	{
		$masapajak = substr($_REQUEST['masapajak'], -2) ? substr($_REQUEST['masapajak'], -2) : '' ;
		$masapajakakhir = substr($_REQUEST['masapajakakhir'], -2) ? substr($_REQUEST['masapajakakhir'], -2) : '';
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '' ;
		$TBLKECAMATAN_ID = $_REQUEST['TBLKECAMATAN_ID'] ? $_REQUEST['TBLKECAMATAN_ID'] : '' ;
		// $JALAN = $_REQUEST['JALAN'] ? $_REQUEST['JALAN'] : '' ;
		$cara_penetapan = $_REQUEST['cara_penetapan'] ? $_REQUEST['cara_penetapan'] : '' ;
		$nopok = $_REQUEST['nopok'] ? $_REQUEST['nopok'] : '';

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
			$judul = 'PAJAK HIBURAN';
			$NAKB = 'NAKB';
			$REKAYAT = '3';
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
		}
		elseif($AYAT=='4.1.1.8.0'){
			$namaTBL= 'TBLDAFTTANAH';
			$judul = 'PAJAK AIR TANAH';
			$NAKB = 'NAKB';
			$REKAYAT = '8';
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
	

		if($masapajak==''){
			$wherethnpajak = "AND ".$namaTBL.".TBLPENDATAAN_THNPAJAK >= '2002'";
		}
		else{
			$wherethnpajak = "AND ".$namaTBL.".TBLPENDATAAN_THNPAJAK >= ".$masapajak."";
		};

		if ($nopok == '') {
			$wherenopok = "";
		} else {
			$wherenopok = "AND TBLDAFTAR.TBLDAFTAR_NOPOK = " . $nopok . "";
		};

		if ($masapajakakhir == '') {
			$wherethnpajakakhir =
			"AND ".$namaTBL.".TBLPENDATAAN_THNPAJAK <= '2011'";
		} else {
			$wherethnpajakakhir = "AND ".$namaTBL.".TBLPENDATAAN_THNPAJAK <= " . $masapajakakhir . "";
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


		$sql = "
			SELECT 
			TBLDAFTAR_NOPOK,
			TBLDAFTAR_ISAKTIF,
			TBLPENDATAAN_THNPAJAK,
			TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR_PEMILIKNAMA,
			TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR_GOLONGAN,
			TBLKELURAHAN_IDBADANUSAHA,
			TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR_BADANUSAHAALAMAT,
			(NVL(laporan_januari,0) - NVL(pembayaran_januari,0)) tungakan_januari,
			laporan_januari,
			pembayaran_januari,
			(NVL(laporan_februari,0) - NVL(pembayaran_februari,0)) tungakan_februari,
			(NVL(laporan_maret,0) - NVL(pembayaran_maret,0)) tungakan_maret,
			(NVL(laporan_april,0) - NVL(pembayaran_april,0)) tungakan_april,
			(NVL(laporan_mei,0) - NVL(pembayaran_mei,0)) tungakan_mei,
			(NVL(laporan_juni,0) - NVL(pembayaran_juni,0)) tungakan_juni,
			(NVL(laporan_juli,0) - NVL(pembayaran_juli,0)) tungakan_juli,
			(NVL(laporan_agustus,0) - NVL(pembayaran_agustus,0)) tungakan_agustus,
			(NVL(laporan_september,0) - NVL(pembayaran_september,0)) tungakan_september,
			(NVL(laporan_oktober,0) - NVL(pembayaran_oktober,0)) tungakan_oktober,
			(NVL(laporan_november,0) - NVL(pembayaran_november,0)) tungakan_november,
			(NVL(laporan_desember,0) - NVL(pembayaran_desember,0)) tungakan_desember,
			(NVL(jumlah_tunggakan,0) - NVL(cekbayartotal,0)) jumlah_tunggakan,
			jumlah_skpd
			 
			FROM (	
			
				SELECT
			TAB.*,
			case when jumlah_seto <> 0 then jumlah_seto else jumlah_setbpd end as cekbayartotal,
			case when NVL(seto_januari,0) <> 0 then NVL(seto_januari,0) else NVL(setbpd_januari,0) end as pembayaran_januari,
			case when NVL(seto_februari,0) <> 0 then NVL(seto_februari,0) else NVL(setbpd_februari,0) end as pembayaran_februari,
			case when NVL(seto_maret,0) <> 0 then NVL(seto_maret,0) else NVL(setbpd_maret,0) end as pembayaran_maret,
			case when NVL(seto_april,0) <> 0 then NVL(seto_april,0) else NVL(setbpd_april,0) end as pembayaran_april,
			case when NVL(seto_mei,0) <> 0 then NVL(seto_mei,0) else NVL(setbpd_mei,0) end as pembayaran_mei,
			case when NVL(seto_juni,0) <> 0 then NVL(seto_juni,0) else NVL(setbpd_juni,0) end as pembayaran_juni,
			case when NVL(seto_juli,0) <> 0 then NVL(seto_juli,0) else NVL(setbpd_juli,0) end as pembayaran_juli,
			case when NVL(seto_agustus,0) <> 0 then NVL(seto_agustus,0) else NVL(setbpd_agustus,0) end as pembayaran_agustus,
			case when NVL(seto_september,0) <> 0 then NVL(seto_september,0) else NVL(setbpd_september,0) end as pembayaran_september,
			case when NVL(seto_oktober,0) <> 0 then NVL(seto_oktober,0) else NVL(setbpd_oktober,0) end as pembayaran_oktober,
			case when NVL(seto_november,0) <> 0 then NVL(seto_november,0) else NVL(setbpd_november,0) end as pembayaran_november,
			case when NVL(seto_desember,0) <> 0 then NVL(seto_desember,0) else NVL(setbpd_desember,0) end as pembayaran_desember

			FROM
			(
			SELECT
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_ISAKTIF,
			" . $namaTBL . ".TBLPENDATAAN_THNPAJAK,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 1 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_januari,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 1
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_januari,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 1
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_januari,

			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 2 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_februari,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 2
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_februari,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 2
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_februari,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 3 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_maret,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 3
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_maret,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 3
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_maret,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 4 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_april,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 4
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_april,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 4
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_april,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 5 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_mei,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 5
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_mei,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 5
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_mei,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 6 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_juni,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 6
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_juni,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 6
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_juni,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 7 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_juli,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 7
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_juli,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 7
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_juli,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 8 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_agustus,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 8
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_agustus,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 8
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_agustus,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 9 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_september,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 9
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_september,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 9
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_september,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 10 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_oktober,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 10
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_oktober,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 10
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_oktober,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 11 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_november,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 11
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_november,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 11
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_november,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 12 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_desember,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 12
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_desember,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 12
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_desember,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0) THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS jumlah_tunggakan,
			SUM (
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			) AS jumlah_setbpd,

			SUM (
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			) AS jumlah_seto,

			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0) THEN
			1
			ELSE
			0
			END
			) AS jumlah_skpd
			FROM
			TBLDAFTAR
			INNER JOIN " . $namaTBL . " ON " . $namaTBL . ".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
			LEFT JOIN TBLSETOR ON " . $namaTBL . ".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
			AND " . $namaTBL . ".TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
			AND NVL(" . $namaTBL . ".TBLPENDATAAN_BLNPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0)
			AND NVL(" . $namaTBL . ".TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0)
			AND NVL(" . $namaTBL . "." . $namaTBL . "_REKAYAT,0) = NVL(TBLSETOR.TBLSETOR_REKAYAT,0)
			AND TBLSETOR_JNSKETETAPAN IS NULL

			LEFT JOIN TBLSETORANBPD ON " . $namaTBL . ".TBLDAFTAR_NOPOK = TBLSETORANBPD.TBLDAFTAR_NOPOK
			AND " . $namaTBL . ".TBLPENDATAAN_THNPAJAK = TBLSETORANBPD.TBLPENDATAAN_THNPAJAK
			AND NVL(" . $namaTBL . ".TBLPENDATAAN_BLNPAJAK,0) = NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0)
			AND NVL(" . $namaTBL . ".TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSETORANBPD.TBLPENDATAAN_TGLPAJAK,0)
			AND NVL(" . $namaTBL . "." . $namaTBL . "_REKAYAT,0) = NVL(TBLSETORANBPD.TBLSETORANBPD_REKAYAT,0)
			AND TBLSETORANBPD_JNSKETETAPAN IS NULL

			WHERE
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA IS NOT NULL
			AND " . $namaTBL . "_REKPENDAPATAN = 4
			AND " . $namaTBL . "_REKPAD = 1
			AND " . $namaTBL . "_REKPAJAK = 1
			AND " . $namaTBL . "_REKAYAT = " . $REKAYAT . "
			" . $wherethnpajak . "
			" . $wherethnpajakakhir . "
			" . $wherenopok . "
			" . $penetapan . "
			" . $wherekecamatan . "
			GROUP BY
			" . $namaTBL . ".TBLPENDATAAN_THNPAJAK,
			TBLDAFTAR_ISAKTIF,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
			) TAB
			ORDER BY
			TBLKECAMATAN_IDBADANUSAHA,
			TBLKELURAHAN_IDBADANUSAHA,
			TBLDAFTAR_NOPOK,
			TBLPENDATAAN_THNPAJAK) TAB2
			WHERE (jumlah_tunggakan - cekbayartotal) > 0
		"; 		
			
			// $data['tunggakan'] = $tunggakan = Yii::app()->db->createCommand($sql)->queryAll();
			// echo $sql;Yii::app()->end();
			$data['cari'] = $cari = Yii::app()->db->createCommand($sql)->queryAll();
			$data['judul'] = $judul;

		$this->renderPartial('tabel_laporan',array('data'=>$data));
	}


	public function actionCetak()
	{	
		$masapajak = substr($_REQUEST['masapajak'], -2) ? substr($_REQUEST['masapajak'], -2) : '' ;
		$masapajakakhir = substr($_REQUEST['masapajakakhir'], -2) ? substr($_REQUEST['masapajakakhir'], -2) : '';
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '' ;
		$nopok = $_REQUEST['nopok'] ? $_REQUEST['nopok'] : '';
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
			$judul = 'PAJAK HIBURAN';
			$NAKB = 'NAKB';
			$REKAYAT = '3';
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
		}
		elseif($AYAT=='4.1.1.8.0'){
			$namaTBL= 'TBLDAFTTANAH';
			$judul = 'PAJAK AIR TANAH';
			$NAKB = 'NAKB';
			$REKAYAT = '8';
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
	

		if($masapajak==''){
			$wherethnpajak = "AND " . $namaTBL . ".TBLPENDATAAN_THNPAJAK >= '2002'";
		}
		else{
			$wherethnpajak = "AND " . $namaTBL . ".TBLPENDATAAN_THNPAJAK >= ".$masapajak."";
		};

		if ($nopok == '') {
			$wherenopok = "";
		} else {
			$wherenopok = "AND TBLDAFTAR.TBLDAFTAR_NOPOK = " . $nopok . "";
		};

		if ($masapajakakhir == '') {
			$wherethnpajakakhir =
			"AND " . $namaTBL . ".TBLPENDATAAN_THNPAJAK <= '2011'";
		} else {
			$wherethnpajakakhir = "AND " . $namaTBL . ".TBLPENDATAAN_THNPAJAK <= " . $masapajakakhir . "";
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


		$sql = "
			SELECT 
			TBLDAFTAR_NOPOK,
			TBLDAFTAR_ISAKTIF,
			TBLPENDATAAN_THNPAJAK,
			TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR_PEMILIKNAMA,
			TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR_GOLONGAN,
			TBLKELURAHAN_IDBADANUSAHA,
			TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR_BADANUSAHAALAMAT,
			(NVL(laporan_januari,0) - NVL(pembayaran_januari,0)) tungakan_januari,
			laporan_januari,
			pembayaran_januari,
			(NVL(laporan_februari,0) - NVL(pembayaran_februari,0)) tungakan_februari,
			(NVL(laporan_maret,0) - NVL(pembayaran_maret,0)) tungakan_maret,
			(NVL(laporan_april,0) - NVL(pembayaran_april,0)) tungakan_april,
			(NVL(laporan_mei,0) - NVL(pembayaran_mei,0)) tungakan_mei,
			(NVL(laporan_juni,0) - NVL(pembayaran_juni,0)) tungakan_juni,
			(NVL(laporan_juli,0) - NVL(pembayaran_juli,0)) tungakan_juli,
			(NVL(laporan_agustus,0) - NVL(pembayaran_agustus,0)) tungakan_agustus,
			(NVL(laporan_september,0) - NVL(pembayaran_september,0)) tungakan_september,
			(NVL(laporan_oktober,0) - NVL(pembayaran_oktober,0)) tungakan_oktober,
			(NVL(laporan_november,0) - NVL(pembayaran_november,0)) tungakan_november,
			(NVL(laporan_desember,0) - NVL(pembayaran_desember,0)) tungakan_desember,
			(NVL(jumlah_tunggakan,0) - NVL(cekbayartotal,0)) jumlah_tunggakan,
			jumlah_skpd
			 
			FROM (	
			
				SELECT
			TAB.*,
			case when jumlah_seto <> 0 then jumlah_seto else jumlah_setbpd end as cekbayartotal,
			case when NVL(seto_januari,0) <> 0 then NVL(seto_januari,0) else NVL(setbpd_januari,0) end as pembayaran_januari,
			case when NVL(seto_februari,0) <> 0 then NVL(seto_februari,0) else NVL(setbpd_februari,0) end as pembayaran_februari,
			case when NVL(seto_maret,0) <> 0 then NVL(seto_maret,0) else NVL(setbpd_maret,0) end as pembayaran_maret,
			case when NVL(seto_april,0) <> 0 then NVL(seto_april,0) else NVL(setbpd_april,0) end as pembayaran_april,
			case when NVL(seto_mei,0) <> 0 then NVL(seto_mei,0) else NVL(setbpd_mei,0) end as pembayaran_mei,
			case when NVL(seto_juni,0) <> 0 then NVL(seto_juni,0) else NVL(setbpd_juni,0) end as pembayaran_juni,
			case when NVL(seto_juli,0) <> 0 then NVL(seto_juli,0) else NVL(setbpd_juli,0) end as pembayaran_juli,
			case when NVL(seto_agustus,0) <> 0 then NVL(seto_agustus,0) else NVL(setbpd_agustus,0) end as pembayaran_agustus,
			case when NVL(seto_september,0) <> 0 then NVL(seto_september,0) else NVL(setbpd_september,0) end as pembayaran_september,
			case when NVL(seto_oktober,0) <> 0 then NVL(seto_oktober,0) else NVL(setbpd_oktober,0) end as pembayaran_oktober,
			case when NVL(seto_november,0) <> 0 then NVL(seto_november,0) else NVL(setbpd_november,0) end as pembayaran_november,
			case when NVL(seto_desember,0) <> 0 then NVL(seto_desember,0) else NVL(setbpd_desember,0) end as pembayaran_desember

			FROM
			(
			SELECT
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_ISAKTIF,
			" . $namaTBL . ".TBLPENDATAAN_THNPAJAK,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 1 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_januari,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 1
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_januari,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 1
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_januari,

			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 2 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_februari,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 2
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_februari,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 2
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_februari,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 3 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_maret,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 3
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_maret,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 3
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_maret,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 4 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_april,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 4
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_april,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 4
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_april,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 5 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_mei,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 5
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_mei,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 5
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_mei,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 6 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_juni,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 6
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_juni,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 6
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_juni,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 7 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_juli,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 7
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_juli,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 7
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_juli,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 8 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_agustus,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 8
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_agustus,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 8
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_agustus,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 9 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_september,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 9
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_september,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 9
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_september,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 10 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_oktober,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 10
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_oktober,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 10
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_oktober,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 11 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_november,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 11
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_november,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 11
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_november,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0)
			AND " . $namaTBL . ".TBLPENDATAAN_BLNPAJAK = 12 THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS laporan_desember,
			SUM (
			CASE
			WHEN NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0) = 12
			THEN
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS setbpd_desember,
			SUM (
			CASE
			WHEN NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0) = 12
			THEN
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			ELSE
			0
			END
			) AS seto_desember,
			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0) THEN
			NVL (" . $namaTBL . "." . $namaTBL . "_PAJAK, 0)
			ELSE
			0
			END
			) AS jumlah_tunggakan,
			SUM (
			NVL (TBLSETORANBPD_RUPIAHSETOR, 0)
			) AS jumlah_setbpd,

			SUM (
			NVL (TBLSETOR_RUPIAHSETOR, 0)
			) AS jumlah_seto,

			SUM (
			CASE
			WHEN (NVL(" . $namaTBL . "." . $namaTBL . "_PAJAK, 0) > 0) THEN
			1
			ELSE
			0
			END
			) AS jumlah_skpd
			FROM
			TBLDAFTAR
			INNER JOIN " . $namaTBL . " ON " . $namaTBL . ".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
			LEFT JOIN TBLSETOR ON " . $namaTBL . ".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
			AND " . $namaTBL . ".TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
			AND NVL(" . $namaTBL . ".TBLPENDATAAN_BLNPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_BLNPAJAK,0)
			AND NVL(" . $namaTBL . ".TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSETOR.TBLPENDATAAN_TGLPAJAK,0)
			AND NVL(" . $namaTBL . "." . $namaTBL . "_REKAYAT,0) = NVL(TBLSETOR.TBLSETOR_REKAYAT,0)
			AND TBLSETOR_JNSKETETAPAN IS NULL

			LEFT JOIN TBLSETORANBPD ON " . $namaTBL . ".TBLDAFTAR_NOPOK = TBLSETORANBPD.TBLDAFTAR_NOPOK
			AND " . $namaTBL . ".TBLPENDATAAN_THNPAJAK = TBLSETORANBPD.TBLPENDATAAN_THNPAJAK
			AND NVL(" . $namaTBL . ".TBLPENDATAAN_BLNPAJAK,0) = NVL(TBLSETORANBPD.TBLPENDATAAN_BLNPAJAK,0)
			AND NVL(" . $namaTBL . ".TBLPENDATAAN_TGLPAJAK,0) = NVL(TBLSETORANBPD.TBLPENDATAAN_TGLPAJAK,0)
			AND NVL(" . $namaTBL . "." . $namaTBL . "_REKAYAT,0) = NVL(TBLSETORANBPD.TBLSETORANBPD_REKAYAT,0)
			AND TBLSETORANBPD_JNSKETETAPAN IS NULL

			WHERE
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA IS NOT NULL
			AND " . $namaTBL . "_REKPENDAPATAN = 4
			AND " . $namaTBL . "_REKPAD = 1
			AND " . $namaTBL . "_REKPAJAK = 1
			AND " . $namaTBL . "_REKAYAT = " . $REKAYAT . "
			" . $wherethnpajak . "
			" . $wherethnpajakakhir . "
			" . $wherenopok . "
			" . $penetapan . "
			" . $wherekecamatan . "
			GROUP BY
			" . $namaTBL . ".TBLPENDATAAN_THNPAJAK,
			TBLDAFTAR_ISAKTIF,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
			TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT
			) TAB
			ORDER BY
			TBLKECAMATAN_IDBADANUSAHA,
			TBLKELURAHAN_IDBADANUSAHA,
			TBLDAFTAR_NOPOK,
			TBLPENDATAAN_THNPAJAK) TAB2
			WHERE (jumlah_tunggakan - cekbayartotal) > 0
		"; 		
			
			$data['tunggakan'] = $tunggakan = Yii::app()->db->createCommand($sql)->queryAll();
			$data['judul'] = $judul;
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=Rekap_Tunggakan.xls');

		$this->renderPartial('cetak',array('data'=>$data));
	}

	public function actionautocompletewpv2()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');

		$query = trim($_REQUEST['query']);
		$kode = trim($_REQUEST['kode']);

		if ($kode == '4.1.1.1.0') {
			$GOL = '3';
		} else if ($kode == '4.1.1.2.0') {
			$GOL = '3';
		} else if ($kode == '4.1.1.3.0') {
			$GOL = '4';
		} else if ($kode == '4.1.1.7.0') {
			$GOL = '2';
		} else {
			$GOL = '';
		}

		$select = "
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		REFBADANUSAHA.REKENING_KODE,
		(CASE WHEN TBLDAFTAR_ISAKTIF='Y' THEN 'AKTIF' ELSE 'TUTUP' END) STATUS
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'LK__TBLDAFTAR_BADANUSAHANAMA' => $query, 'LK__TBLDAFTAR_BADANUSAHAALAMAT' => $query, 'LK__TBLDAFTAR_NOPOK' => $query
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR_GOLONGAN' => $GOL
			// ,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $kode
			// , 'EQ__TBLDAFTAR_ISAKTIF' => 'Y'
		);

		$otherquery = array(
			'limit' => 30, 'join' => array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA'), 'order' => 'TBLDAFTAR_NOPOK ASC'
		);

		$arrayConfig = array('select' => $select, 'from' => $from, 'filter' => $filter, 'filter_AND' => $filter_AND, 'filterOR' => true, 'otherquery' => $otherquery, 'mode' => 'LIST');
		$results = DBFetch::query($arrayConfig);

		$suggestions = array();

		foreach ($results as $result) {
			$suggestions[] = array(
				"value" => $result['TBLDAFTAR_NOPOK'] . ' | ' . $result['TBLDAFTAR_BADANUSAHANAMA'] . ' | ' . $result['TBLDAFTAR_BADANUSAHAALAMAT'], "data" => $result['TBLDAFTAR_NOPOK'], "TBLDAFTAR_BADANUSAHANAMA" => $result['TBLDAFTAR_BADANUSAHANAMA'], "TBLDAFTAR_BADANUSAHAALAMAT" => $result['TBLDAFTAR_BADANUSAHAALAMAT'], "TBLDAFTAR_NOPOK" => $result['TBLDAFTAR_NOPOK'], "REKENING_KODE" => $result['REKENING_KODE']
				,"status" => $result['STATUS']
			);
		}


		echo CJSON::encode(array('suggestions' => $suggestions));
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