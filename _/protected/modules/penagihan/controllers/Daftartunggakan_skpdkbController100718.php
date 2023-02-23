<?php

class Daftartunggakan_skpdkbController extends Controller
{
	public function actionIndex()
	{
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
		$sql = "
		SELECT
		TBLDAFTAR.TBLDAFTAR_GOLONGAN
		,TBLDAFTAR.TBLDAFTAR_NOPOK
		,TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		,TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		,TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
		,TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=1  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  JANUARI,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=2  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  FEBRUARI,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=3  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  MARET,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=4  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  APRIL,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=5  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  MEI,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=6  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  JUNI,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=7  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  JULI,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=8  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  AGUSTUS,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=9  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  SEPTEMBER,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=10  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  OKTOBER,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=11  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  NOVEMBER,
		sum(CASE  WHEN TBLPENDATAAN_BLNPAJAK=12  THEN NVL(" . $namaTBL . "_OMSETPAJAK,0) ELSE 0 END) AS  DESEMBER
		
		FROM TBLDAFTAR
		Inner Join " . $namaTBL . " ON TBLDAFTAR.TBLDAFTAR_NOPOK = " . $namaTBL . ".TBLDAFTAR_NOPOK
		
		WHERE
		" . $namaTBL . "_REKPENDAPATAN = 4
		AND " . $namaTBL . "_REKPAD = 1
		AND " . $namaTBL . "_REKPAJAK = 1
		AND " . $namaTBL . "_REKAYAT = ".$AYAT."
		".$wherethnpajak."
		".$whereblnpajak."
		and " . $namaTBL . "." . $namaTBL . "_ISJNSPENETAPAN='S'

		group by TBLDAFTAR.TBLDAFTAR_GOLONGAN
		,TBLDAFTAR.TBLDAFTAR_NOPOK
		,TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		,TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		,TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
		,TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT

		ORDER BY  TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		,TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		,TBLDAFTAR.TBLDAFTAR_NOPOK
		";
		return $data = Yii::app()->db->createCommand( $sql )->queryAll();
	}

	public function actionCari()
	{
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';
		$tahunkb = substr($_REQUEST['tahunkb'], -2) ? substr($_REQUEST['tahunkb'], -2) : '';
		$tahunpjk = substr($_REQUEST['tahunpjk'], -2) ? substr($_REQUEST['tahunpjk'], -2) : '';
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';

		$AYAT = $_REQUEST['TBLREKENING_KODE'];

		if($AYAT=='4.1.1.1.0'){
			$namaTBL = 'TBLDAFTHOTEL';
			$judul = 'PAJAK HOTEL';
			$NAKB = 'DENDAKRGBAYAR';
		}
		elseif($AYAT=='4.1.1.2.0'){
			$namaTBL= 'TBLDAFTRMAKAN';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
		}
		elseif($AYAT=='4.1.1.3.0'){
			$namaTBL= 'TBLDAFTHIBURAN';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
		}
		elseif($AYAT=='4.1.1.4.0'){
			$namaTBL= 'TBLDAFTREKLAME';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
		}
		elseif($AYAT=='4.1.1.7.0'){
			$namaTBL= 'TBLDAFTPARKIR';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
		}
		elseif($AYAT=='4.1.1.8.0'){
			$namaTBL= 'TBLDAFTTANAH';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
		}
		elseif($AYAT=='4.1.1.9.0'){
			$namaTBL= 'TBLDAFTBURUNG';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
		}

		elseif($AYAT=='4.1.1.11.0'){
			$namaTBL= 'TBLDAFTBPHTB';
			$judul = 'PAJAK BPHTB';
			$NAKB = 'NAKB';
		}

		if($TBLDAFTAR_NOPOK==''){
			$wherenopok = "";

		}
		else{
			$wherenopok = "AND
			TBLDAFTAR_NOPOK = ".$TBLDAFTAR_NOPOK."";
		};

		if($tahunkb==''){
			$wherethkb = "";

		}
		else{
			$wherethkb = "AND ".$namaTBL."_thnkurangbayar = ".$tahunkb."";
		};

		if($tahunpjk==''){
			$wherethpajak = "";

		}
		else{
			$wherethpajak = "AND TBLPENDATAAN_THNPAJAK = ".$tahunpjk."";
		};

		if($namaTBL=='TBLDAFTREKLAME'){
			$pajakperiksa="";
		}
		else{
			$pajakperiksa="".$namaTBL.".".$namaTBL."_pajakperiksa AS pokok,";
		};

		if($namaTBL=='TBLDAFTREKLAME'){
			$pajakperiksabawah="";
		}
		else{
			$pajakperiksabawah="".$namaTBL.".".$namaTBL."_pajakperiksa,";
		};

		$sql="
		SELECT *
		FROM
(
	SELECT
		*
		FROM
		(
		SELECT
		COUNT(".$namaTBL.".TBLDAFTAR_NOPOK) AS HITUNG,
		".$namaTBL.".TBLPENDATAAN_THNPAJAK,
		".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
		TBLDAFTAR.tbldaftar_badanusahanama,
		TBLDAFTAR.tbldaftar_badanusahaalamat,
		".$namaTBL.".TBLDAFTAR_jnspendapatan,
		".$namaTBL.".tbldaftar_golongan,
		".$namaTBL.".TBLDAFTAR_NOPOK,
		".$namaTBL.".tblkecamatan_id,
		".$namaTBL.".tblkelurahan_id,
		".$pajakperiksa."
		".$namaTBL.".".$namaTBL."_thnkurangbayar,
		".$namaTBL.".".$namaTBL."_blnkurangbayar,
		".$namaTBL.".".$namaTBL."_tglkurangbayar,
		".$namaTBL.".".$namaTBL."_regkurangbayar,
		".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
		".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
		".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
		".$namaTBL.".PAKB,
		".$namaTBL.".".$namaTBL."_".$NAKB." AS denda,
		".$namaTBL.".BAKB,
		".$namaTBL.".".$namaTBL."_bungakrgbayar AS bunga,
		".$namaTBL.".".$namaTBL."_dendakrgbayar,
		".$namaTBL.".".$namaTBL."_rupiahkrgbayar AS total,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 1 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang1,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 2 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang2,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 3 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang3,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 4 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang4,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 5 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang5,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 6 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang6,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 7 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang7,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 8 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang8,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 9 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang9,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 10 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang10,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 11 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang11,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 12 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang12,
		SUM (
			CASE
				WHEN TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
				NVL (
					TBLANGSURAN.TBLANGSURAN_ANGSURAN,
					0
				) + NVL (
					TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
					0
				)
				ELSE
					0
				END
		) AS totalangsur
		FROM
		".$namaTBL."
		INNER JOIN TBLDAFTAR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		INNER JOIN TBLANGSURAN ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
		AND NVL (".$namaTBL.".TBLPENDATAAN_THNPAJAK, 0) = NVL (TBLANGSURAN.TBLPENDATAAN_THNPAJAK, 0)
		AND NVL (".$namaTBL.".TBLPENDATAAN_BLNPAJAK, 0) = NVL (TBLANGSURAN.TBLPENDATAAN_BLNPAJAK, 0)
		AND NVL (".$namaTBL.".TBLPENDATAAN_TGLPAJAK, 0) = NVL (TBLANGSURAN.TBLPENDATAAN_TGLPAJAK, 0)
		AND NVL (TBLANGSURAN.TBLANGSURAN_REKPAJAK, 0) = 1
		WHERE
		".$namaTBL.".TBLDAFTAR_NOPOK IS NOT NULL
		AND ".$namaTBL.".".$namaTBL."_REGKURANGBAYAR IS NOT NULL
		GROUP BY
		".$namaTBL.".TBLPENDATAAN_THNPAJAK,
		".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
		TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR_BADANUSAHAALAMAT,
		".$namaTBL.".TBLDAFTAR_jnspendapatan,
		".$namaTBL.".TBLDAFTAR_golongan,
		".$namaTBL.".TBLDAFTAR_NOPOK,
		".$namaTBL.".tblkecamatan_id,
		".$namaTBL.".tblkelurahan_id,
		".$pajakperiksabawah."
		".$namaTBL.".".$namaTBL."_thnkurangbayar,
		".$namaTBL.".".$namaTBL."_blnkurangbayar,
		".$namaTBL.".".$namaTBL."_tglkurangbayar,
		".$namaTBL.".".$namaTBL."_regkurangbayar,
		".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
		".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
		".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
		".$namaTBL.".PAKB,
		".$namaTBL.".".$namaTBL."_".$NAKB.",
		".$namaTBL.".BAKB,
		".$namaTBL.".".$namaTBL."_bungakrgbayar ,
		".$namaTBL.".".$namaTBL."_dendakrgbayar,
		".$namaTBL.".".$namaTBL."_rupiahkrgbayar
		ORDER BY
		".$namaTBL.".TBLDAFTAR_NOPOK
	)
	WHERE
	TBLDAFTAR_NOPOK IS NOT NULL
	".$wherethkb."
	".$wherenopok."
	".$wherethpajak."

	UNION

	SELECT
			*
		FROM
			(
				SELECT
					NULL AS HITUNG,
					".$namaTBL.".TBLPENDATAAN_THNPAJAK,
					".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
					TBLDAFTAR.tbldaftar_badanusahanama,
					TBLDAFTAR.tbldaftar_badanusahaalamat,
					".$namaTBL.".TBLDAFTAR_jnspendapatan,
					".$namaTBL.".tbldaftar_golongan,
					".$namaTBL.".TBLDAFTAR_NOPOK,
					".$namaTBL.".tblkecamatan_id,
					".$namaTBL.".tblkelurahan_id,
					".$namaTBL.".".$namaTBL."_pajakperiksa AS pokok,
					".$namaTBL.".".$namaTBL."_thnkurangbayar,
					".$namaTBL.".".$namaTBL."_blnkurangbayar,
					".$namaTBL.".".$namaTBL."_tglkurangbayar,
					".$namaTBL.".".$namaTBL."_regkurangbayar,
					".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
					".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
					".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
					".$namaTBL.".PAKB,
					".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR AS denda,
					".$namaTBL.".BAKB,
					".$namaTBL.".".$namaTBL."_bungakrgbayar AS bunga,
					".$namaTBL.".".$namaTBL."_rupiahkrgbayar AS total,
					TBLSETOR.TBLSETOR_RUPIAHSETOR AS bayar,
					NULL AS ang1,
					NULL AS ang2,
					NULL AS ang3,
					NULL AS ang4,
					NULL AS ang5,
					NULL AS ang6,
					NULL AS ang7,
					NULL AS ang8,
					NULL AS ang9,
					NULL AS ang10,
					NULL AS ang11,
					NULL AS ang12,
					NULL AS totalangsur
				FROM
					".$namaTBL."
				INNER JOIN TBLDAFTAR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
				LEFT JOIN TBLSETOR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND NVL (
					".$namaTBL.".TBLPENDATAAN_THNPAJAK,
					0
				) = NVL (
					TBLSETOR.TBLPENDATAAN_THNPAJAK,
					0
				)
				AND NVL (
					".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
					0
				) = NVL (
					TBLSETOR.TBLPENDATAAN_BLNPAJAK,
					0
				)
				AND NVL (
					".$namaTBL.".TBLPENDATAAN_TGLPAJAK,
					0
				) = NVL (
					TBLSETOR.TBLPENDATAAN_TGLPAJAK,
					0
				)
				AND NVL (
					TBLSETOR.TBLSETOR_REKPAJAK,
					0
				) = 1
				WHERE
					".$namaTBL.".TBLDAFTAR_NOPOK IS NOT NULL
				AND ".$namaTBL.".".$namaTBL."_REGKURANGBAYAR IS NOT NULL
				AND ".$namaTBL.".".$namaTBL."_REGSURATANGSUR IS NULL
				GROUP BY
					".$namaTBL.".TBLPENDATAAN_THNPAJAK,
					".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
					TBLDAFTAR_BADANUSAHANAMA,
					TBLDAFTAR_BADANUSAHAALAMAT,
					".$namaTBL.".TBLDAFTAR_jnspendapatan,
					".$namaTBL.".TBLDAFTAR_golongan,
					".$namaTBL.".TBLDAFTAR_NOPOK,
					".$namaTBL.".tblkecamatan_id,
					".$namaTBL.".tblkelurahan_id,
					".$namaTBL.".".$namaTBL."_pajakperiksa,
					".$namaTBL.".".$namaTBL."_thnkurangbayar,
					".$namaTBL.".".$namaTBL."_blnkurangbayar,
					".$namaTBL.".".$namaTBL."_tglkurangbayar,
					".$namaTBL.".".$namaTBL."_regkurangbayar,
					".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
					".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
					".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
					".$namaTBL.".PAKB,
					".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR,
					".$namaTBL.".BAKB,
					".$namaTBL.".".$namaTBL."_bungakrgbayar,
					".$namaTBL.".".$namaTBL."_dendakrgbayar,
					".$namaTBL.".".$namaTBL."_rupiahkrgbayar,
					TBLSETOR.TBLSETOR_RUPIAHSETOR
				ORDER BY
					".$namaTBL.".TBLDAFTAR_NOPOK
			)
		WHERE
			TBLDAFTAR_NOPOK IS NOT NULL
		AND BAYAR IS NULL
			".$wherethkb."
	".$wherenopok."
	".$wherethpajak."
)
ORDER BY
	".$namaTBL."_thnkurangbayar,
	".$namaTBL."_blnkurangbayar,
	".$namaTBL."_tglkurangbayar,
	TBLDAFTAR_NOPOK";

$data['cari'] = $cari = Yii::app()->db->createCommand($sql)->queryAll();
$data['NamaTBL'] = $namaTBL;

$this->renderPartial('tabel_laporan',array('data'=>$data));
}

public function actionCetak()
{
	$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';
		$tahunkb = substr($_REQUEST['tahunkb'], -2) ? substr($_REQUEST['tahunkb'], -2) : '';
		$tahunpjk = substr($_REQUEST['tahunpjk'], -2) ? substr($_REQUEST['tahunpjk'], -2) : '';
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';

	$AYAT = $_REQUEST['TBLREKENING_KODE'];

	if($AYAT=='4.1.1.1.0'){
		$namaTBL = 'TBLDAFTHOTEL';
		$judul = 'PAJAK HOTEL';
		$NAKB = 'DENDAKRGBAYAR';
	}
	elseif($AYAT=='4.1.1.2.0'){
		$namaTBL= 'TBLDAFTRMAKAN';
		$judul = 'PAJAK RESTORAN';
		$NAKB = 'NAKB';
	}
	elseif($AYAT=='4.1.1.3.0'){
		$namaTBL= 'TBLDAFTHIBURAN';
		$judul = 'PAJAK RESTORAN';
		$NAKB = 'NAKB';
	}
	elseif($AYAT=='4.1.1.4.0'){
		$namaTBL= 'TBLDAFTREKLAME';
		$judul = 'PAJAK RESTORAN';
		$NAKB = 'NAKB';
	}
	elseif($AYAT=='4.1.1.7.0'){
		$namaTBL= 'TBLDAFTPARKIR';
		$judul = 'PAJAK RESTORAN';
		$NAKB = 'NAKB';
	}
	elseif($AYAT=='4.1.1.8.0'){
		$namaTBL= 'TBLDAFTTANAH';
		$judul = 'PAJAK RESTORAN';
		$NAKB = 'NAKB';
	}
	elseif($AYAT=='4.1.1.9.0'){
		$namaTBL= 'TBLDAFTBURUNG';
		$judul = 'PAJAK RESTORAN';
		$NAKB = 'NAKB';
	}

	if($TBLDAFTAR_NOPOK==''){
		$wherenopok = "";

	}
	else{
		$wherenopok = "AND
		TBLDAFTAR_NOPOK = ".$TBLDAFTAR_NOPOK."";
	};

	if($tahunkb==''){
		$wherethkb = "";

	}
	else{
		$wherethkb = "AND ".$namaTBL."_thnkurangbayar = ".$tahunkb."
		";
	};

	if($tahunpjk==''){
		$wherethpajak = "";

	}
	else{
		$wherethpajak = "AND TBLPENDATAAN_THNPAJAK = ".$tahunpjk."
		";
	};

	if($namaTBL=='TBLDAFTREKLAME'){
		$pajakperiksa="";
	}
	else{
		$pajakperiksa="".$namaTBL.".".$namaTBL."_pajakperiksa AS pokok,";
	};

	if($namaTBL=='TBLDAFTREKLAME'){
		$pajakperiksabawah="";
	}
	else{
		$pajakperiksabawah="".$namaTBL.".".$namaTBL."_pajakperiksa,";
	};

$sql="
		SELECT *
		FROM
(
	SELECT
		*
		FROM
		(
		SELECT
		COUNT(".$namaTBL.".TBLDAFTAR_NOPOK) AS HITUNG,
		".$namaTBL.".TBLPENDATAAN_THNPAJAK,
		".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
		TBLDAFTAR.tbldaftar_badanusahanama,
		TBLDAFTAR.tbldaftar_badanusahaalamat,
		".$namaTBL.".TBLDAFTAR_jnspendapatan,
		".$namaTBL.".tbldaftar_golongan,
		".$namaTBL.".TBLDAFTAR_NOPOK,
		".$namaTBL.".tblkecamatan_id,
		".$namaTBL.".tblkelurahan_id,
		".$pajakperiksa."
		".$namaTBL.".".$namaTBL."_thnkurangbayar,
		".$namaTBL.".".$namaTBL."_blnkurangbayar,
		".$namaTBL.".".$namaTBL."_tglkurangbayar,
		".$namaTBL.".".$namaTBL."_regkurangbayar,
		".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
		".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
		".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
		".$namaTBL.".PAKB,
		".$namaTBL.".".$namaTBL."_".$NAKB." AS denda,
		".$namaTBL.".BAKB,
		".$namaTBL.".".$namaTBL."_bungakrgbayar AS bunga,
		".$namaTBL.".".$namaTBL."_dendakrgbayar,
		".$namaTBL.".".$namaTBL."_rupiahkrgbayar AS total,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 1 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang1,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 2 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang2,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 3 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang3,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 4 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang4,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 5 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang5,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 6 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang6,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 7 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang7,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 8 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang8,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 9 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang9,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 10 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang10,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 11 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang11,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 12 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang12,
		SUM (
			CASE
				WHEN TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
				NVL (
					TBLANGSURAN.TBLANGSURAN_ANGSURAN,
					0
				) + NVL (
					TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
					0
				)
				ELSE
					0
				END
		) AS totalangsur
		FROM
		".$namaTBL."
		INNER JOIN TBLDAFTAR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		INNER JOIN TBLANGSURAN ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
		AND NVL (".$namaTBL.".TBLPENDATAAN_THNPAJAK, 0) = NVL (TBLANGSURAN.TBLPENDATAAN_THNPAJAK, 0)
		AND NVL (".$namaTBL.".TBLPENDATAAN_BLNPAJAK, 0) = NVL (TBLANGSURAN.TBLPENDATAAN_BLNPAJAK, 0)
		AND NVL (".$namaTBL.".TBLPENDATAAN_TGLPAJAK, 0) = NVL (TBLANGSURAN.TBLPENDATAAN_TGLPAJAK, 0)
		AND NVL (TBLANGSURAN.TBLANGSURAN_REKPAJAK, 0) = 1
		WHERE
		".$namaTBL.".TBLDAFTAR_NOPOK IS NOT NULL
		AND ".$namaTBL.".".$namaTBL."_REGKURANGBAYAR IS NOT NULL
		GROUP BY
		".$namaTBL.".TBLPENDATAAN_THNPAJAK,
		".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
		TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR_BADANUSAHAALAMAT,
		".$namaTBL.".TBLDAFTAR_jnspendapatan,
		".$namaTBL.".TBLDAFTAR_golongan,
		".$namaTBL.".TBLDAFTAR_NOPOK,
		".$namaTBL.".tblkecamatan_id,
		".$namaTBL.".tblkelurahan_id,
		".$pajakperiksabawah."
		".$namaTBL.".".$namaTBL."_thnkurangbayar,
		".$namaTBL.".".$namaTBL."_blnkurangbayar,
		".$namaTBL.".".$namaTBL."_tglkurangbayar,
		".$namaTBL.".".$namaTBL."_regkurangbayar,
		".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
		".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
		".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
		".$namaTBL.".PAKB,
		".$namaTBL.".".$namaTBL."_".$NAKB.",
		".$namaTBL.".BAKB,
		".$namaTBL.".".$namaTBL."_bungakrgbayar ,
		".$namaTBL.".".$namaTBL."_dendakrgbayar,
		".$namaTBL.".".$namaTBL."_rupiahkrgbayar
		ORDER BY
		".$namaTBL.".TBLDAFTAR_NOPOK
	)
	WHERE
	TBLDAFTAR_NOPOK IS NOT NULL
	".$wherethkb."
	".$wherenopok."
	".$wherethpajak."

	UNION

	SELECT
			*
		FROM
			(
				SELECT
					NULL AS HITUNG,
					".$namaTBL.".TBLPENDATAAN_THNPAJAK,
					".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
					TBLDAFTAR.tbldaftar_badanusahanama,
					TBLDAFTAR.tbldaftar_badanusahaalamat,
					".$namaTBL.".TBLDAFTAR_jnspendapatan,
					".$namaTBL.".tbldaftar_golongan,
					".$namaTBL.".TBLDAFTAR_NOPOK,
					".$namaTBL.".tblkecamatan_id,
					".$namaTBL.".tblkelurahan_id,
					".$namaTBL.".".$namaTBL."_pajakperiksa AS pokok,
					".$namaTBL.".".$namaTBL."_thnkurangbayar,
					".$namaTBL.".".$namaTBL."_blnkurangbayar,
					".$namaTBL.".".$namaTBL."_tglkurangbayar,
					".$namaTBL.".".$namaTBL."_regkurangbayar,
					".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
					".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
					".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
					".$namaTBL.".PAKB,
					".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR AS denda,
					".$namaTBL.".BAKB,
					".$namaTBL.".".$namaTBL."_bungakrgbayar AS bunga,
					".$namaTBL.".".$namaTBL."_rupiahkrgbayar AS total,
					TBLSETOR.TBLSETOR_RUPIAHSETOR AS bayar,
					NULL AS ang1,
					NULL AS ang2,
					NULL AS ang3,
					NULL AS ang4,
					NULL AS ang5,
					NULL AS ang6,
					NULL AS ang7,
					NULL AS ang8,
					NULL AS ang9,
					NULL AS ang10,
					NULL AS ang11,
					NULL AS ang12,
					NULL AS totalangsur
				FROM
					".$namaTBL."
				INNER JOIN TBLDAFTAR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
				LEFT JOIN TBLSETOR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND NVL (
					".$namaTBL.".TBLPENDATAAN_THNPAJAK,
					0
				) = NVL (
					TBLSETOR.TBLPENDATAAN_THNPAJAK,
					0
				)
				AND NVL (
					".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
					0
				) = NVL (
					TBLSETOR.TBLPENDATAAN_BLNPAJAK,
					0
				)
				AND NVL (
					".$namaTBL.".TBLPENDATAAN_TGLPAJAK,
					0
				) = NVL (
					TBLSETOR.TBLPENDATAAN_TGLPAJAK,
					0
				)
				AND NVL (
					TBLSETOR.TBLSETOR_REKPAJAK,
					0
				) = 1
				WHERE
					".$namaTBL.".TBLDAFTAR_NOPOK IS NOT NULL
				AND ".$namaTBL.".".$namaTBL."_REGKURANGBAYAR IS NOT NULL
				AND ".$namaTBL.".".$namaTBL."_REGSURATANGSUR IS NULL
				GROUP BY
					".$namaTBL.".TBLPENDATAAN_THNPAJAK,
					".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
					TBLDAFTAR_BADANUSAHANAMA,
					TBLDAFTAR_BADANUSAHAALAMAT,
					".$namaTBL.".TBLDAFTAR_jnspendapatan,
					".$namaTBL.".TBLDAFTAR_golongan,
					".$namaTBL.".TBLDAFTAR_NOPOK,
					".$namaTBL.".tblkecamatan_id,
					".$namaTBL.".tblkelurahan_id,
					".$namaTBL.".".$namaTBL."_pajakperiksa,
					".$namaTBL.".".$namaTBL."_thnkurangbayar,
					".$namaTBL.".".$namaTBL."_blnkurangbayar,
					".$namaTBL.".".$namaTBL."_tglkurangbayar,
					".$namaTBL.".".$namaTBL."_regkurangbayar,
					".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
					".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
					".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
					".$namaTBL.".PAKB,
					".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR,
					".$namaTBL.".BAKB,
					".$namaTBL.".".$namaTBL."_bungakrgbayar,
					".$namaTBL.".".$namaTBL."_dendakrgbayar,
					".$namaTBL.".".$namaTBL."_rupiahkrgbayar,
					TBLSETOR.TBLSETOR_RUPIAHSETOR
				ORDER BY
					".$namaTBL.".TBLDAFTAR_NOPOK
			)
		WHERE
			TBLDAFTAR_NOPOK IS NOT NULL
		AND BAYAR IS NULL
			".$wherethkb."
	".$wherenopok."
	".$wherethpajak."
)
ORDER BY
	".$namaTBL."_thnkurangbayar,
	".$namaTBL."_blnkurangbayar,
	".$namaTBL."_tglkurangbayar,
	TBLDAFTAR_NOPOK";

$data['cetak'] = $cetak = Yii::app()->db->createCommand($sql)->queryAll();
$data['NamaTBL'] = $namaTBL;
$data['judul'] = $judul;
// echo "string";
header('Content-Type: application/excel');
header("Content-Disposition: attachment;Filename=Cetak-Setoran-Harian.xls");

$this->renderPartial('tabel_laporan',array('data'=>$data));
}

public function actionCetakWord()
{
		$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';
		$tahunkb = substr($_REQUEST['tahunkb'], -2) ? substr($_REQUEST['tahunkb'], -2) : '';
		$tahunpjk = substr($_REQUEST['tahunpjk'], -2) ? substr($_REQUEST['tahunpjk'], -2) : '';
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';

		$AYAT = $_REQUEST['TBLREKENING_KODE'];

		if($AYAT=='4.1.1.1.0'){
			$namaTBL = 'TBLDAFTHOTEL';
			$judul = 'PAJAK HOTEL';
			$NAKB = 'DENDAKRGBAYAR';
			$petugas = 'M. ROHMAD ROMADHON';
			$nip = '1967121992031002';
		}
		elseif($AYAT=='4.1.1.2.0'){
			$namaTBL= 'TBLDAFTRMAKAN';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
			$petugas = 'YULI  PURWANTO';
			$nip = '197407041994021005';
		}
		elseif($AYAT=='4.1.1.3.0'){
			$namaTBL= 'TBLDAFTHIBURAN';
			$judul = 'PAJAK HIBURAN';
			$NAKB = 'NAKB';
			$petugas = 'ELSI NURLITA IKAWATI, A.Md';
			$nip = '197104121992031003';
		}
		elseif($AYAT=='4.1.1.4.0'){
			$namaTBL= 'TBLDAFTREKLAME';
			$judul = 'PAJAK REKLAME';
			$NAKB = 'NAKB';
			$petugas = 'MEYRINA NUR IVADA';
			$nip = '196903251990031003';
		}
		elseif($AYAT=='4.1.1.7.0'){
			$namaTBL= 'TBLDAFTPARKIR';
			$judul = 'PAJAK PARKIR';
			$NAKB = 'NAKB';
			$petugas = 'NURWITANTO P';
			$nip = '';
		}
		elseif($AYAT=='4.1.1.8.0'){
			$namaTBL= 'TBLDAFTTANAH';
			$judul = 'PAJAK AIR TANAH';
			$NAKB = 'NAKB';
			$petugas = 'EKO HERIYANTO';
			$nip = '196805081992031011';
		}
		elseif($AYAT=='4.1.1.9.0'){
			$namaTBL= 'TBLDAFTBURUNG';
			$judul = 'PAJAK SARANG BURUNG WALET';
			$NAKB = 'NAKB';
			$petugas = 'JOKO SUNGKONO';
			$nip = '195908081981021007';
		}

		if($TBLDAFTAR_NOPOK==''){
			$wherenopok = "";

		}
		else{
			$wherenopok = "AND
			TBLDAFTAR_NOPOK = ".$TBLDAFTAR_NOPOK."";
		};

		if($tahunkb==''){
			$wherethkb = "";

		}
		else{
			$wherethkb = "AND ".$namaTBL."_thnkurangbayar = ".$tahunkb."
			";
		};

		if($tahunpjk==''){
			$wherethpajak = "";

		}
		else{
			$wherethpajak = "AND TBLPENDATAAN_THNPAJAK = ".$tahunpjk."
			";
		};

		if($namaTBL=='TBLDAFTREKLAME'){
			$pajakperiksa="";
		}
		else{
			$pajakperiksa="".$namaTBL.".".$namaTBL."_pajakperiksa AS pokok,";
		};

		if($namaTBL=='TBLDAFTREKLAME'){
			$pajakperiksabawah="";
		}
		else{
			$pajakperiksabawah="".$namaTBL.".".$namaTBL."_pajakperiksa,";
		};

		$sql="
		SELECT *
		FROM
(
	SELECT
		*
		FROM
		(
		SELECT
		COUNT(".$namaTBL.".TBLDAFTAR_NOPOK) AS HITUNG,
		".$namaTBL.".TBLPENDATAAN_THNPAJAK,
		".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
		TBLDAFTAR.tbldaftar_badanusahanama,
		TBLDAFTAR.tbldaftar_badanusahaalamat,
		".$namaTBL.".TBLDAFTAR_jnspendapatan,
		".$namaTBL.".tbldaftar_golongan,
		".$namaTBL.".TBLDAFTAR_NOPOK,
		".$namaTBL.".tblkecamatan_id,
		".$namaTBL.".tblkelurahan_id,
		".$pajakperiksa."
		".$namaTBL.".".$namaTBL."_thnkurangbayar,
		".$namaTBL.".".$namaTBL."_blnkurangbayar,
		".$namaTBL.".".$namaTBL."_tglkurangbayar,
		".$namaTBL.".".$namaTBL."_regkurangbayar,
		".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
		".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
		".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
		".$namaTBL.".PAKB,
		".$namaTBL.".".$namaTBL."_".$NAKB." AS denda,
		".$namaTBL.".BAKB,
		".$namaTBL.".".$namaTBL."_bungakrgbayar AS bunga,
		".$namaTBL.".".$namaTBL."_dendakrgbayar,
		".$namaTBL.".".$namaTBL."_rupiahkrgbayar AS total,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 1 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang1,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 2 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang2,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 3 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang3,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 4 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang4,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 5 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang5,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 6 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang6,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 7 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang7,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 8 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang8,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 9 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang9,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 10 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang10,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 11 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang11,
		SUM (
			CASE
			WHEN 
			TBLANGSURAN.TBLANGSURAN_PAJAKKE = 12 AND TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
			NVL (
				TBLANGSURAN.TBLANGSURAN_ANGSURAN,
				0
			) + NVL (
				TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
				0
			)
			ELSE
			0
			END
		) AS ang12,
		SUM (
			CASE
				WHEN TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
				NVL (
					TBLANGSURAN.TBLANGSURAN_ANGSURAN,
					0
				) + NVL (
					TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
					0
				)
				ELSE
					0
				END
		) AS totalangsur
		FROM
		".$namaTBL."
		INNER JOIN TBLDAFTAR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		INNER JOIN TBLANGSURAN ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
		AND NVL (".$namaTBL.".TBLPENDATAAN_THNPAJAK, 0) = NVL (TBLANGSURAN.TBLPENDATAAN_THNPAJAK, 0)
		AND NVL (".$namaTBL.".TBLPENDATAAN_BLNPAJAK, 0) = NVL (TBLANGSURAN.TBLPENDATAAN_BLNPAJAK, 0)
		AND NVL (".$namaTBL.".TBLPENDATAAN_TGLPAJAK, 0) = NVL (TBLANGSURAN.TBLPENDATAAN_TGLPAJAK, 0)
		AND NVL (TBLANGSURAN.TBLANGSURAN_REKPAJAK, 0) = 1
		WHERE
		".$namaTBL.".TBLDAFTAR_NOPOK IS NOT NULL
		AND ".$namaTBL.".".$namaTBL."_REGKURANGBAYAR IS NOT NULL
		GROUP BY
		".$namaTBL.".TBLPENDATAAN_THNPAJAK,
		".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
		TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR_BADANUSAHAALAMAT,
		".$namaTBL.".TBLDAFTAR_jnspendapatan,
		".$namaTBL.".TBLDAFTAR_golongan,
		".$namaTBL.".TBLDAFTAR_NOPOK,
		".$namaTBL.".tblkecamatan_id,
		".$namaTBL.".tblkelurahan_id,
		".$pajakperiksabawah."
		".$namaTBL.".".$namaTBL."_thnkurangbayar,
		".$namaTBL.".".$namaTBL."_blnkurangbayar,
		".$namaTBL.".".$namaTBL."_tglkurangbayar,
		".$namaTBL.".".$namaTBL."_regkurangbayar,
		".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
		".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
		".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
		".$namaTBL.".PAKB,
		".$namaTBL.".".$namaTBL."_".$NAKB.",
		".$namaTBL.".BAKB,
		".$namaTBL.".".$namaTBL."_bungakrgbayar ,
		".$namaTBL.".".$namaTBL."_dendakrgbayar,
		".$namaTBL.".".$namaTBL."_rupiahkrgbayar
		ORDER BY
		".$namaTBL.".TBLDAFTAR_NOPOK
	)
	WHERE
	TBLDAFTAR_NOPOK IS NOT NULL
	".$wherethkb."
	".$wherenopok."
	".$wherethpajak."

	UNION

	SELECT
			*
		FROM
			(
				SELECT
					NULL AS HITUNG,
					".$namaTBL.".TBLPENDATAAN_THNPAJAK,
					".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
					TBLDAFTAR.tbldaftar_badanusahanama,
					TBLDAFTAR.tbldaftar_badanusahaalamat,
					".$namaTBL.".TBLDAFTAR_jnspendapatan,
					".$namaTBL.".tbldaftar_golongan,
					".$namaTBL.".TBLDAFTAR_NOPOK,
					".$namaTBL.".tblkecamatan_id,
					".$namaTBL.".tblkelurahan_id,
					".$namaTBL.".".$namaTBL."_pajakperiksa AS pokok,
					".$namaTBL.".".$namaTBL."_thnkurangbayar,
					".$namaTBL.".".$namaTBL."_blnkurangbayar,
					".$namaTBL.".".$namaTBL."_tglkurangbayar,
					".$namaTBL.".".$namaTBL."_regkurangbayar,
					".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
					".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
					".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
					".$namaTBL.".PAKB,
					".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR AS denda,
					".$namaTBL.".BAKB,
					".$namaTBL.".".$namaTBL."_bungakrgbayar AS bunga,
					".$namaTBL.".".$namaTBL."_rupiahkrgbayar AS total,
					TBLSETOR.TBLSETOR_RUPIAHSETOR AS bayar,
					NULL AS ang1,
					NULL AS ang2,
					NULL AS ang3,
					NULL AS ang4,
					NULL AS ang5,
					NULL AS ang6,
					NULL AS ang7,
					NULL AS ang8,
					NULL AS ang9,
					NULL AS ang10,
					NULL AS ang11,
					NULL AS ang12,
					NULL AS totalangsur
				FROM
					".$namaTBL."
				INNER JOIN TBLDAFTAR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
				LEFT JOIN TBLSETOR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
				AND NVL (
					".$namaTBL.".TBLPENDATAAN_THNPAJAK,
					0
				) = NVL (
					TBLSETOR.TBLPENDATAAN_THNPAJAK,
					0
				)
				AND NVL (
					".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
					0
				) = NVL (
					TBLSETOR.TBLPENDATAAN_BLNPAJAK,
					0
				)
				AND NVL (
					".$namaTBL.".TBLPENDATAAN_TGLPAJAK,
					0
				) = NVL (
					TBLSETOR.TBLPENDATAAN_TGLPAJAK,
					0
				)
				AND NVL (
					TBLSETOR.TBLSETOR_REKPAJAK,
					0
				) = 1
				WHERE
					".$namaTBL.".TBLDAFTAR_NOPOK IS NOT NULL
				AND ".$namaTBL.".".$namaTBL."_REGKURANGBAYAR IS NOT NULL
				AND ".$namaTBL.".".$namaTBL."_REGSURATANGSUR IS NULL
				GROUP BY
					".$namaTBL.".TBLPENDATAAN_THNPAJAK,
					".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
					TBLDAFTAR_BADANUSAHANAMA,
					TBLDAFTAR_BADANUSAHAALAMAT,
					".$namaTBL.".TBLDAFTAR_jnspendapatan,
					".$namaTBL.".TBLDAFTAR_golongan,
					".$namaTBL.".TBLDAFTAR_NOPOK,
					".$namaTBL.".tblkecamatan_id,
					".$namaTBL.".tblkelurahan_id,
					".$namaTBL.".".$namaTBL."_pajakperiksa,
					".$namaTBL.".".$namaTBL."_thnkurangbayar,
					".$namaTBL.".".$namaTBL."_blnkurangbayar,
					".$namaTBL.".".$namaTBL."_tglkurangbayar,
					".$namaTBL.".".$namaTBL."_regkurangbayar,
					".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
					".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
					".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
					".$namaTBL.".PAKB,
					".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR,
					".$namaTBL.".BAKB,
					".$namaTBL.".".$namaTBL."_bungakrgbayar,
					".$namaTBL.".".$namaTBL."_dendakrgbayar,
					".$namaTBL.".".$namaTBL."_rupiahkrgbayar,
					TBLSETOR.TBLSETOR_RUPIAHSETOR
				ORDER BY
					".$namaTBL.".TBLDAFTAR_NOPOK
			)
		WHERE
			TBLDAFTAR_NOPOK IS NOT NULL
		AND BAYAR IS NULL
			".$wherethkb."
	".$wherenopok."
	".$wherethpajak."
)
ORDER BY
	".$namaTBL."_thnkurangbayar,
	".$namaTBL."_blnkurangbayar,
	".$namaTBL."_tglkurangbayar,
	TBLDAFTAR_NOPOK";

				//echo $sql;die();

				$datax['cetakword'] = Yii::app()->db->createCommand($sql)->queryAll();
				$datax['NamaTBL'] = $namaTBL;
				$datax['judul'] = $judul;
				$datax['petugas'] = $petugas;
				$datax['nip'] = $nip;

	$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_penagihan' . DIRECTORY_SEPARATOR;
	$namatpl = $path_tpl . 'DAFTAR TUNGGAKAN SKPDKB.docx';
	$namafileDL = "Daftar-Tunggakan.docx";

		// if (base64_decode($data['jenis'])=='REK') {
		// 	$namatpl = $path_tpl . 'Temp_Teguranrek.docx';
		// 	$namafileDL = "Surat-Teguranrek.docx"; 
		// }

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

		//INI CODING CETAK WORD 

		// echo "string";Yii::app()->end();
$data = array();
$rows = array();


$GLOBALS['thnpajak'] = $_REQUEST['tahunpjk'];
$GLOBALS['jenispajak'] = $judul;
$GLOBALS['datenow'] = date('d-m-Y');
$GLOBALS['petugas'] = $petugas;
$GLOBALS['nip'] = $nip;

$no = 1;
foreach ($datax['cetakword'] as $rowWP) :
// if ($rowWP[$datax['NamaTBL'].'_REGSURATANGSUR']==''){
// 	$kondisi = 'KB';
// } 
// else{
// 	$kondisi = 'A';
// }
	

//$batas = $rowWP[$datax['NamaTBL'].'__TGLKURANGBAYAR'] . ' ' . (sprintf('MMMM',$rowWP[$datax['NamaTBL'].'__BLNKURANGBAYAR'])) . '' . (sprintf('YYY',$rowWP[$datax['NamaTBL'].'__THNKURANGBAYAR']));
$batas = $rowWP[$datax['NamaTBL'].'_TGLBTSKRGBAYAR'] . '/' . ($rowWP[$datax['NamaTBL'].'_BLNBTSKRGBAYAR']) . '/' . ($rowWP[$datax['NamaTBL'].'_THNBTSKRGBAYAR']);

$NPWPD = $rowWP['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$rowWP['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$rowWP['TBLKECAMATAN_ID'])) . '.' . (sprintf('%02d',$rowWP['TBLKELURAHAN_ID']));

$data['no'] = $no++;
$data['namawp'] = trim($rowWP['TBLDAFTAR_BADANUSAHANAMA']);
$data['jenis'] = '';
$data['nopok'] = $NPWPD;
$data['thnpajak'] = trim($rowWP['TBLPENDATAAN_THNPAJAK']);
$data['blnpajak'] = trim($rowWP['TBLPENDATAAN_BLNPAJAK']);
$data['tglbatasskpd'] = $batas;
$data['pajakp'] = trim (LokalIndonesia::ribuan($rowWP['POKOK']));
$data['bukb'] = trim (LokalIndonesia::ribuan($rowWP['BUNGA']));
$data['nakb'] = trim (LokalIndonesia::ribuan($rowWP['DENDA']));
$data['rpkb'] = trim (LokalIndonesia::ribuan($rowWP['TOTAL']));
$data['tunai'] = trim (LokalIndonesia::ribuan($rowWP['TUNAI']));
$data['ang1'] = trim (LokalIndonesia::ribuan($rowWP['ANG1']));
$data['ang2'] = trim (LokalIndonesia::ribuan($rowWP['ANG2']));
$data['ang3'] = trim (LokalIndonesia::ribuan($rowWP['ANG3']));
$data['ang4'] = trim (LokalIndonesia::ribuan($rowWP['ANG4']));
$data['ang5'] = trim (LokalIndonesia::ribuan($rowWP['ANG5']));
$data['ang6'] = trim (LokalIndonesia::ribuan($rowWP['ANG6']));
$data['ang7'] = trim (LokalIndonesia::ribuan($rowWP['ANG7']));
$data['ang8'] = trim (LokalIndonesia::ribuan($rowWP['ANG8']));
$data['ang9'] = trim (LokalIndonesia::ribuan($rowWP['ANG9']));
$data['ang10'] = trim (LokalIndonesia::ribuan($rowWP['ANG10']));
$data['ang11'] = trim (LokalIndonesia::ribuan($rowWP['ANG11']));
$data['ang12'] = trim (LokalIndonesia::ribuan($rowWP['ANG12']));
$totalangsur = $rowWP['ANG1'] + $rowWP['ANG2'] + $rowWP['ANG3'] + $rowWP['ANG4'] + $rowWP['ANG5'] + $rowWP['ANG6'] + $rowWP['ANG7'] + $rowWP['ANG8'] + $rowWP['ANG9'] + $rowWP['ANG10'] + $rowWP['ANG11'] + $rowWP['ANG12'];
$data['tunggakan'] = LokalIndonesia::ribuan($rowWP['TOTAL'] - $totalangsur);

array_push($rows, $data);

endforeach;
$header=array();
$header['datenow'] = date('d-m-Y');
$otbs->MergeBlock('data', $rows);
$otbs->MergeField('header', $header);

// echo json_encode($data);Yii::app()->end();

// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template
$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
Yii::app()->end();

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