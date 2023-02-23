<?php

class Daftar_piutangController extends Controller
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
			AND TBLREKENING_REKAYAT <> 4 AND TBLREKENING_REKAYAT <> 5 AND TBLREKENING_REKAYAT <> 9 AND TBLREKENING_REKAYAT <> 11 AND TBLREKENING_REKAYAT <> 23 AND TBLREKENING_REKAYAT <> 10
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
		$jenis_setoran = $_REQUEST['jenis_setoran'] ? $_REQUEST['jenis_setoran'] : '';
		$tahunkb = substr($_REQUEST['tahunkb'], -2) ? substr($_REQUEST['tahunkb'], -2) : '';
		$tahunpjk = substr($_REQUEST['tahunpjk'], -2) ? substr($_REQUEST['tahunpjk'], -2) : '';
		$tahunkb_akhir = substr($_REQUEST['tahunkb_akhir'], -2) ? substr($_REQUEST['tahunkb_akhir'], -2) : '';
		$tahunpjk_akhir = substr($_REQUEST['tahunpjk_akhir'], -2) ? substr($_REQUEST['tahunpjk_akhir'], -2) : '';
		$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
		$tgl_cutoff = trim($_REQUEST['tgl_cutoff'])!='' ? date('Y-m-d', strtotime($_REQUEST['tgl_cutoff']) ) : "";
		$explode = explode('-',$tgl_cutoff);
		$tgl =$explode[2];
		$bln =$explode[1];
		$tahun = substr($explode[0], -2);

		$AYAT = $_REQUEST['TBLREKENING_KODE'];

		if($AYAT=='4.1.1.1.0'){
			$namaTBL = 'TBLDAFTHOTEL';
			$judul = 'PAJAK HOTEL';
			$NAKB = 'KENAIKANKRGBAYAR';
		}
		elseif($AYAT=='4.1.1.2.0'){
			$namaTBL= 'TBLDAFTRMAKAN';
			$judul = 'PAJAK RESTORAN';
			$NAKB = 'NAKB';
		}
		elseif($AYAT=='4.1.1.3.0'){
			$namaTBL= 'TBLDAFTHIBURAN';
			$judul = 'PAJAK HIBURAN';
			$NAKB = 'NAKB';
		}
		elseif($AYAT=='4.1.1.4.0'){
			$namaTBL= 'TBLDAFTREKLAME';
			$judul = 'PAJAK REKLAME';
			$NAKB = 'NAKB';
		}
		elseif($AYAT=='4.1.1.7.0'){
			$namaTBL= 'TBLDAFTPARKIR';
			$judul = 'PAJAK PARKIR';
			$NAKB = 'NAKB';
		}
		elseif($AYAT=='4.1.1.8.0'){
			$namaTBL= 'TBLDAFTTANAH';
			$judul = 'PAJAK AIR TANAH';
			$NAKB = 'NAKB';
		}
		elseif($AYAT=='4.1.1.9.0'){
			$namaTBL= 'TBLDAFTBURUNG';
			$judul = 'PAJAK SARANG BURUNG WALET';
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

		if($tahunkb=='' && $tahunkb_akhir==''){
			$wherethkb = "";

		}
		else{
			$wherethkb = "AND ".$namaTBL."_thnkurangbayar BETWEEN ".$tahunkb." AND ".$tahunkb_akhir." ";
		};

		if($tahunpjk=='' && $tahunpjk_akhir==''){
			$wherethpajak = "";

		}
		else{
			$wherethpajak = "AND TBLPENDATAAN_THNPAJAK BETWEEN ".$tahunpjk." AND ".$tahunpjk_akhir." ";
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

		if(empty($tgl_cutoff)){
			$TGLCUTOFF = "";
		}
		else{
			$TGLCUTOFF = " 
			AND TO_DATE (
			CONCAT (
			".$namaTBL."_blnkurangbayar,
			CONCAT (
			'/',
			CONCAT (".$namaTBL."_tglkurangbayar, CONCAT('/', ".$namaTBL."_thnkurangbayar))
			)
			),
			'MM/DD/YY'
		) < TO_DATE('$tgl_cutoff', 'YYYY-MM-DD')";
	};

	$sql="
	SELECT
	*
	FROM (

	SELECT
	*
	FROM
	(
	SELECT
	NULL AS HITUNG,
	".$namaTBL.".TBLPENDATAAN_THNPAJAK,
	".$namaTBL.".".$namaTBL."_BLNKBAWAL,
	CASE WHEN NVL(".$namaTBL.".".$namaTBL."_BLNKBAKHIR,0) = 0 THEN ".$namaTBL.".TBLPENDATAAN_BLNPAJAK ELSE ".$namaTBL.".".$namaTBL."_BLNKBAKHIR END AS ".$namaTBL."_BLNKBAKHIR,
	TBLDAFTAR.tbldaftar_badanusahanama,
	TBLDAFTAR.tbldaftar_badanusahaalamat,
	TBLDAFTAR.tbldaftar_pemiliknama,
	TBLDAFTAR.tbldaftar_pemilikalamat,
	".$namaTBL.".TBLDAFTAR_jnspendapatan,
	".$namaTBL.".tbldaftar_golongan,
	".$namaTBL.".TBLDAFTAR_NOPOK,
	".$namaTBL.".tblkecamatan_id,
	".$namaTBL.".tblkelurahan_id,
	".$namaTBL.".".$namaTBL."_pajakperiksa AS pokok,
	NVL (
	".$namaTBL.".".$namaTBL."_bungakrgbayar,
	0
	) AS bunga,
	NVL (
	".$namaTBL.".".$namaTBL."_".$NAKB.",
	0
	) AS kenaikan,
	NVL (
	".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR,
	0
	) AS denda,
	".$namaTBL.".".$namaTBL."_rupiahkrgbayar AS total,
	NULL AS pokokangsur,
	NULL AS bungaangsur,
	NULL AS totaltapangsur,
	CASE
	WHEN TBLSETOR.TBLSETOR_BLNSSPD IS NOT NULL THEN
	NVL (
	".$namaTBL.".".$namaTBL."_pajakperiksa,
	0
	)
	ELSE
	NULL
	END AS TBLSETOR_RUPIAHSETOR,
	CASE
	WHEN TBLSETOR.TBLSETOR_BLNSSPD IS NOT NULL THEN
	NVL (
	".$namaTBL.".".$namaTBL."_bungakrgbayar,
	0
	)
	ELSE
	NULL
	END AS TBLSETOR_BUNGAKETETAPAN,
	CASE
	WHEN TBLSETOR.TBLSETOR_BLNSSPD IS NOT NULL THEN
	NVL (
	".$namaTBL.".".$namaTBL."_".$NAKB.",
	0
	)
	ELSE
	NULL
	END AS TBLSETOR_DENDAKETETAPAN,
	CASE
	WHEN TBLSETOR.TBLSETOR_BLNSSPD IS NOT NULL THEN
	TO_DATE (
	CONCAT (
	TBLSETOR.TBLSETOR_BLNSSPD,
	CONCAT (
	'/',
	CONCAT (
	TBLSETOR.TBLSETOR_TGLSSPD,
	CONCAT (
	'/',
	TBLSETOR.TBLSETOR_THNSSPD
	)
	)
	)
	),
	'MM/DD/YY'
	)
	ELSE
	NULL
	END AS tanggalsetor,
	SUM (
	CASE
	WHEN TBLSETOR.TBLSETOR_BLNSSPD IS NOT NULL THEN
	NVL (
	".$namaTBL.".".$namaTBL."_pajakperiksa,
	0
	) + NVL (
	".$namaTBL.".".$namaTBL."_bungakrgbayar,
	0
	) + NVL (
	".$namaTBL.".".$namaTBL."_".$NAKB.",
	0
	)
	ELSE
	0
	END
	) AS bayar,
	".$namaTBL.".".$namaTBL."_thnkurangbayar,
	".$namaTBL.".".$namaTBL."_blnkurangbayar,
	".$namaTBL.".".$namaTBL."_tglkurangbayar,
	".$namaTBL.".".$namaTBL."_regkurangbayar,
	".$namaTBL.".".$namaTBL."_REGSURATANGSUR,
	".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
	TBLANGSURAN.TBLANGSURAN_PAJAKKE AS ang1,
	(".$namaTBL.".".$namaTBL."_rupiahkrgbayar ) AS totalangsur
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
	AND TBLSETOR.TBLSETOR_JNSKETETAPAN = 'K'
	LEFT JOIN TBLANGSURAN ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
	AND NVL (
	".$namaTBL.".TBLPENDATAAN_THNPAJAK,
	0
	) = NVL (
	TBLANGSURAN.TBLPENDATAAN_THNPAJAK,
	0
	)
	AND NVL (
	".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
	0
	) = NVL (
	TBLANGSURAN.TBLPENDATAAN_BLNPAJAK,
	0
	)
	AND NVL (
	".$namaTBL.".TBLPENDATAAN_TGLPAJAK,
	0
	) = NVL (
	TBLANGSURAN.TBLPENDATAAN_TGLPAJAK,
	0
	)
	AND NVL (
	TBLANGSURAN.TBLANGSURAN_REKPAJAK,
	0
	) = 1
	AND NVL (
	TBLANGSURAN.TBLANGSURAN_PAJAKKE,
	0
	) = 1
	WHERE
	".$namaTBL.".TBLDAFTAR_NOPOK IS NOT NULL
	AND NVL (
	".$namaTBL.".".$namaTBL."_REGKURANGBAYAR,
	0
	) <> 0
	GROUP BY
	".$namaTBL.".TBLPENDATAAN_THNPAJAK,
	".$namaTBL.".".$namaTBL."_BLNKBAWAL,
	".$namaTBL.".".$namaTBL."_BLNKBAKHIR,
	".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
	TBLDAFTAR_BADANUSAHANAMA,
	TBLDAFTAR_BADANUSAHAALAMAT,
	tbldaftar_pemiliknama,
	tbldaftar_pemilikalamat,
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
	".$namaTBL.".".$namaTBL."_REGSURATANGSUR,
	".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR,
	".$namaTBL.".".$namaTBL."_".$NAKB.",
	".$namaTBL.".".$namaTBL."_bungakrgbayar,
	".$namaTBL.".".$namaTBL."_rupiahkrgbayar,
	TBLSETOR.TBLSETOR_RUPIAHSETOR,
	TBLSETOR.TBLSETOR_BUNGAKETETAPAN,
	TBLSETOR.TBLSETOR_DENDAKETETAPAN,
	TBLANGSURAN.TBLANGSURAN_PAJAKKE,
	TBLSETOR.TBLSETOR_TGLSSPD,
	TBLSETOR.TBLSETOR_BLNSSPD,
	TBLSETOR.TBLSETOR_THNSSPD
	ORDER BY
	".$namaTBL.".TBLDAFTAR_NOPOK
	)
	WHERE
	TBLDAFTAR_NOPOK IS NOT NULL
	AND POKOK > 0
	AND ang1 IS NULL
	".$TGLCUTOFF."
	".$wherethkb."
	".$wherenopok."
	".$wherethpajak."

	UNION

	SELECT
	*
	FROM
	(
	SELECT
	COUNT (
	".$namaTBL.".TBLDAFTAR_NOPOK
	) AS HITUNG,
	".$namaTBL.".TBLPENDATAAN_THNPAJAK,
	".$namaTBL.".".$namaTBL."_BLNKBAWAL,
	CASE WHEN NVL(".$namaTBL.".".$namaTBL."_BLNKBAKHIR,0) = 0 THEN ".$namaTBL.".TBLPENDATAAN_BLNPAJAK ELSE ".$namaTBL.".".$namaTBL."_BLNKBAKHIR END AS ".$namaTBL."_BLNKBAKHIR,
	TBLDAFTAR.tbldaftar_badanusahanama,
	TBLDAFTAR.tbldaftar_badanusahaalamat,
	TBLDAFTAR.tbldaftar_pemiliknama,
	TBLDAFTAR.tbldaftar_pemilikalamat,
	".$namaTBL.".TBLDAFTAR_jnspendapatan,
	".$namaTBL.".tbldaftar_golongan,
	".$namaTBL.".TBLDAFTAR_NOPOK,
	".$namaTBL.".tblkecamatan_id,
	".$namaTBL.".tblkelurahan_id,
	".$namaTBL.".".$namaTBL."_pajakperiksa AS pokok,
	NVL (
	".$namaTBL.".".$namaTBL."_bungakrgbayar,
	0
	) AS bunga,
	NVL (
	".$namaTBL.".".$namaTBL."_".$NAKB.",
	0
	) AS kenaikan,
	".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR AS denda,
	".$namaTBL.".".$namaTBL."_rupiahkrgbayar AS total,
	SUM (
	NVL (
	TBLANGSURAN.TBLANGSURAN_ANGSURAN,
	0
	)
	) AS pokokangsur,
	SUM (
	NVL (
	TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
	0
	)
	) AS bungaangsur,
	SUM (
	NVL (
	TBLANGSURAN.TBLANGSURAN_ANGSURAN,
	0
	) + NVL (
	TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
	0
	)
	) AS totaltapangsur,
	NULL AS TBLSETOR_RUPIAHSETOR,
	NULL AS TBLSETOR_BUNGAKETETAPAN,
	NULL AS TBLSETOR_DENDAKETETAPAN,
	NULL AS tanggalsetor,
	SUM ( CASE WHEN TBLANGSURAN.TBLANGSURAN_SETORAN IS NOT NULL THEN 
	(NVL (TBLANGSURAN.TBLANGSURAN_SETORAN,0)+NVL (TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,0))
		ELSE 0 END
	) AS bayar,
	".$namaTBL.".".$namaTBL."_thnkurangbayar,
	".$namaTBL.".".$namaTBL."_blnkurangbayar,
	".$namaTBL.".".$namaTBL."_tglkurangbayar,
	".$namaTBL.".".$namaTBL."_regkurangbayar,
	".$namaTBL.".".$namaTBL."_REGSURATANGSUR,
	".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
	COUNT (
	".$namaTBL.".TBLDAFTAR_NOPOK
	) AS ang1,
	SUM (
	CASE
	WHEN TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
	NVL (
	TBLANGSURAN.TBLANGSURAN_ANGSURAN,
	0
	)
	ELSE
	0
	END
	) AS totalangsur
	FROM
	".$namaTBL."
	INNER JOIN TBLDAFTAR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
	LEFT JOIN TBLSETOR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
	AND ".$namaTBL.".TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
	AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK
	AND TBLSETOR_JNSKETETAPAN = 'K'
	INNER JOIN TBLANGSURAN ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
	AND NVL (
	".$namaTBL.".TBLPENDATAAN_THNPAJAK,
	0
	) = NVL (
	TBLANGSURAN.TBLPENDATAAN_THNPAJAK,
	0
	)
	AND NVL (
	".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
	0
	) = NVL (
	TBLANGSURAN.TBLPENDATAAN_BLNPAJAK,
	0
	)
	AND NVL (
	".$namaTBL.".TBLPENDATAAN_TGLPAJAK,
	0
	) = NVL (
	TBLANGSURAN.TBLPENDATAAN_TGLPAJAK,
	0
	)
	AND NVL (
	TBLANGSURAN.TBLANGSURAN_REKPAJAK,
	0
	) = 1
	WHERE
	".$namaTBL.".TBLDAFTAR_NOPOK IS NOT NULL
	AND ".$namaTBL.".".$namaTBL."_REGKURANGBAYAR IS NOT NULL
	GROUP BY
	".$namaTBL.".TBLPENDATAAN_THNPAJAK,
	".$namaTBL.".".$namaTBL."_BLNKBAWAL,
	".$namaTBL.".".$namaTBL."_BLNKBAKHIR,
	".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
	TBLDAFTAR_BADANUSAHANAMA,
	TBLDAFTAR_BADANUSAHAALAMAT,
	tbldaftar_pemiliknama,
	tbldaftar_pemilikalamat,
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
	".$namaTBL.".".$namaTBL."_REGSURATANGSUR,
	".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR,
	".$namaTBL.".".$namaTBL."_".$NAKB.",
	".$namaTBL.".".$namaTBL."_bungakrgbayar,
	".$namaTBL.".".$namaTBL."_rupiahkrgbayar
	ORDER BY
	".$namaTBL.".TBLDAFTAR_NOPOK
	)
	WHERE
	TBLDAFTAR_NOPOK IS NOT NULL
	".$TGLCUTOFF."
	".$wherethkb."
	".$wherenopok."
	".$wherethpajak."

	)
	ORDER BY
	TBLPENDATAAN_THNPAJAK,
	TO_NUMBER (
	".$namaTBL."_regkurangbayar
	),
	".$namaTBL."_thnkurangbayar,
	".$namaTBL."_blnkurangbayar,
	".$namaTBL."_tglkurangbayar,
	TBLDAFTAR_NOPOK";
	// echo $sql;die();
	

	$data['cari'] = $cari = Yii::app()->db->createCommand($sql)->queryAll();
	
	// echo "$sql";die();
	$data['NamaTBL'] = $namaTBL;
	$data['judul'] = $judul;
	$sql2="SELECT
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = ".$TBLDAFTAR_NOPOK;
	$data['wp'] = Yii::app()->db->createCommand( $sql2 )->queryRow();
	$this->renderPartial('tabel_laporan',array('data'=>$data));

}

public function actionCetak()
{
	$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';
	$jenis_setoran = $_REQUEST['jenis_setoran'] ? $_REQUEST['jenis_setoran'] : '';
	$tahunkb = substr($_REQUEST['tahunkb'], -2) ? substr($_REQUEST['tahunkb'], -2) : '';
	$tahunpjk = substr($_REQUEST['tahunpjk'], -2) ? substr($_REQUEST['tahunpjk'], -2) : '';
	$tahunkb_akhir = substr($_REQUEST['tahunkb_akhir'], -2) ? substr($_REQUEST['tahunkb_akhir'], -2) : '';
	$tahunpjk_akhir = substr($_REQUEST['tahunpjk_akhir'], -2) ? substr($_REQUEST['tahunpjk_akhir'], -2) : '';
	$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
	$tgl_cutoff = trim($_REQUEST['tgl_cutoff'])!='' ? date('Y-m-d', strtotime($_REQUEST['tgl_cutoff']) ) : "";
	$explode = explode('-',$tgl_cutoff);
	$tgl =$explode[2];
	$bln =$explode[1];
	$tahun = substr($explode[0], -2);

	$AYAT = $_REQUEST['TBLREKENING_KODE'];

	if($AYAT=='4.1.1.1.0'){
		$namaTBL = 'TBLDAFTHOTEL';
		$judul = 'PAJAK HOTEL';
		$NAKB = 'KENAIKANKRGBAYAR';
	}
	elseif($AYAT=='4.1.1.2.0'){
		$namaTBL= 'TBLDAFTRMAKAN';
		$judul = 'PAJAK RESTORAN';
		$NAKB = 'NAKB';
	}
	elseif($AYAT=='4.1.1.3.0'){
		$namaTBL= 'TBLDAFTHIBURAN';
		$judul = 'PAJAK HIBURAN';
		$NAKB = 'NAKB';
	}
	elseif($AYAT=='4.1.1.4.0'){
		$namaTBL= 'TBLDAFTREKLAME';
		$judul = 'PAJAK REKLAME';
		$NAKB = 'NAKB';
	}
	elseif($AYAT=='4.1.1.7.0'){
		$namaTBL= 'TBLDAFTPARKIR';
		$judul = 'PAJAK PARKIR';
		$NAKB = 'NAKB';
	}
	elseif($AYAT=='4.1.1.8.0'){
		$namaTBL= 'TBLDAFTTANAH';
		$judul = 'PAJAK AIR TANAH';
		$NAKB = 'NAKB';
	}
	elseif($AYAT=='4.1.1.9.0'){
		$namaTBL= 'TBLDAFTBURUNG';
		$judul = 'PAJAK SARANG BURUNG WALET';
		$NAKB = 'NAKB';
	}

	if($TBLDAFTAR_NOPOK==''){
		$wherenopok = "";

	}
	else{
		$wherenopok = "AND
		TBLDAFTAR_NOPOK = ".$TBLDAFTAR_NOPOK."";
	};

	if($tahunkb=='' && $tahunkb_akhir==''){
		$wherethkb = "";

	}
	else{
		$wherethkb = "AND ".$namaTBL."_thnkurangbayar BETWEEN ".$tahunkb." AND ".$tahunkb_akhir." ";
	};

	if($tahunpjk=='' && $tahunpjk_akhir==''){
		$wherethpajak = "";

	}
	else{
		$wherethpajak = "AND TBLPENDATAAN_THNPAJAK BETWEEN ".$tahunpjk." AND ".$tahunpjk_akhir." ";
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

	if(empty($tgl_cutoff)){
		$TGLCUTOFF = "";
	}
	else{
		$TGLCUTOFF = " 
		AND TO_DATE (
		CONCAT (
		".$namaTBL."_blnkurangbayar,
		CONCAT (
		'/',
		CONCAT (".$namaTBL."_tglkurangbayar, CONCAT('/', ".$namaTBL."_thnkurangbayar))
		)
		),
		'MM/DD/YY'
	) < TO_DATE('$tgl_cutoff', 'YYYY-MM-DD')";
};

$sql="
	SELECT
	*
	FROM (

	SELECT
	*
	FROM
	(
	SELECT
	NULL AS HITUNG,
	".$namaTBL.".TBLPENDATAAN_THNPAJAK,
	".$namaTBL.".".$namaTBL."_BLNKBAWAL,
	CASE WHEN NVL(".$namaTBL.".".$namaTBL."_BLNKBAKHIR,0) = 0 THEN ".$namaTBL.".TBLPENDATAAN_BLNPAJAK ELSE ".$namaTBL.".".$namaTBL."_BLNKBAKHIR END AS ".$namaTBL."_BLNKBAKHIR,
	TBLDAFTAR.tbldaftar_badanusahanama,
	TBLDAFTAR.tbldaftar_badanusahaalamat,
	TBLDAFTAR.tbldaftar_pemiliknama,
	TBLDAFTAR.tbldaftar_pemilikalamat,
	".$namaTBL.".TBLDAFTAR_jnspendapatan,
	".$namaTBL.".tbldaftar_golongan,
	".$namaTBL.".TBLDAFTAR_NOPOK,
	".$namaTBL.".tblkecamatan_id,
	".$namaTBL.".tblkelurahan_id,
	".$namaTBL.".".$namaTBL."_pajakperiksa AS pokok,
	NVL (
	".$namaTBL.".".$namaTBL."_bungakrgbayar,
	0
	) AS bunga,
	NVL (
	".$namaTBL.".".$namaTBL."_".$NAKB.",
	0
	) AS kenaikan,
	NVL (
	".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR,
	0
	) AS denda,
	".$namaTBL.".".$namaTBL."_rupiahkrgbayar AS total,
	NULL AS pokokangsur,
	NULL AS bungaangsur,
	NULL AS totaltapangsur,
	CASE
	WHEN TBLSETOR.TBLSETOR_BLNSSPD IS NOT NULL THEN
	NVL (
	".$namaTBL.".".$namaTBL."_pajakperiksa,
	0
	)
	ELSE
	NULL
	END AS TBLSETOR_RUPIAHSETOR,
	CASE
	WHEN TBLSETOR.TBLSETOR_BLNSSPD IS NOT NULL THEN
	NVL (
	".$namaTBL.".".$namaTBL."_bungakrgbayar,
	0
	)
	ELSE
	NULL
	END AS TBLSETOR_BUNGAKETETAPAN,
	CASE
	WHEN TBLSETOR.TBLSETOR_BLNSSPD IS NOT NULL THEN
	NVL (
	".$namaTBL.".".$namaTBL."_".$NAKB.",
	0
	)
	ELSE
	NULL
	END AS TBLSETOR_DENDAKETETAPAN,
	CASE
	WHEN TBLSETOR.TBLSETOR_BLNSSPD IS NOT NULL THEN
	TO_DATE (
	CONCAT (
	TBLSETOR.TBLSETOR_BLNSSPD,
	CONCAT (
	'/',
	CONCAT (
	TBLSETOR.TBLSETOR_TGLSSPD,
	CONCAT (
	'/',
	TBLSETOR.TBLSETOR_THNSSPD
	)
	)
	)
	),
	'MM/DD/YY'
	)
	ELSE
	NULL
	END AS tanggalsetor,
	SUM (
	CASE
	WHEN TBLSETOR.TBLSETOR_BLNSSPD IS NOT NULL THEN
	NVL (
	".$namaTBL.".".$namaTBL."_pajakperiksa,
	0
	) + NVL (
	".$namaTBL.".".$namaTBL."_bungakrgbayar,
	0
	) + NVL (
	".$namaTBL.".".$namaTBL."_".$NAKB.",
	0
	)
	ELSE
	0
	END
	) AS bayar,
	".$namaTBL.".".$namaTBL."_thnkurangbayar,
	".$namaTBL.".".$namaTBL."_blnkurangbayar,
	".$namaTBL.".".$namaTBL."_tglkurangbayar,
	".$namaTBL.".".$namaTBL."_regkurangbayar,
	".$namaTBL.".".$namaTBL."_REGSURATANGSUR,
	".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
	TBLANGSURAN.TBLANGSURAN_PAJAKKE AS ang1,
	(".$namaTBL.".".$namaTBL."_rupiahkrgbayar ) AS totalangsur
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
	AND TBLSETOR.TBLSETOR_JNSKETETAPAN = 'K'
	LEFT JOIN TBLANGSURAN ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
	AND NVL (
	".$namaTBL.".TBLPENDATAAN_THNPAJAK,
	0
	) = NVL (
	TBLANGSURAN.TBLPENDATAAN_THNPAJAK,
	0
	)
	AND NVL (
	".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
	0
	) = NVL (
	TBLANGSURAN.TBLPENDATAAN_BLNPAJAK,
	0
	)
	AND NVL (
	".$namaTBL.".TBLPENDATAAN_TGLPAJAK,
	0
	) = NVL (
	TBLANGSURAN.TBLPENDATAAN_TGLPAJAK,
	0
	)
	AND NVL (
	TBLANGSURAN.TBLANGSURAN_REKPAJAK,
	0
	) = 1
	AND NVL (
	TBLANGSURAN.TBLANGSURAN_PAJAKKE,
	0
	) = 1
	WHERE
	".$namaTBL.".TBLDAFTAR_NOPOK IS NOT NULL
	AND NVL (
	".$namaTBL.".".$namaTBL."_REGKURANGBAYAR,
	0
	) <> 0
	GROUP BY
	".$namaTBL.".TBLPENDATAAN_THNPAJAK,
	".$namaTBL.".".$namaTBL."_BLNKBAWAL,
	".$namaTBL.".".$namaTBL."_BLNKBAKHIR,
	".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
	TBLDAFTAR_BADANUSAHANAMA,
	TBLDAFTAR_BADANUSAHAALAMAT,
	tbldaftar_pemiliknama,
	tbldaftar_pemilikalamat,
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
	".$namaTBL.".".$namaTBL."_REGSURATANGSUR,
	".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR,
	".$namaTBL.".".$namaTBL."_".$NAKB.",
	".$namaTBL.".".$namaTBL."_bungakrgbayar,
	".$namaTBL.".".$namaTBL."_rupiahkrgbayar,
	TBLSETOR.TBLSETOR_RUPIAHSETOR,
	TBLSETOR.TBLSETOR_BUNGAKETETAPAN,
	TBLSETOR.TBLSETOR_DENDAKETETAPAN,
	TBLANGSURAN.TBLANGSURAN_PAJAKKE,
	TBLSETOR.TBLSETOR_TGLSSPD,
	TBLSETOR.TBLSETOR_BLNSSPD,
	TBLSETOR.TBLSETOR_THNSSPD
	ORDER BY
	".$namaTBL.".TBLDAFTAR_NOPOK
	)
	WHERE
	TBLDAFTAR_NOPOK IS NOT NULL
	AND POKOK > 0
	AND ang1 IS NULL
	".$TGLCUTOFF."
	".$wherethkb."
	".$wherenopok."
	".$wherethpajak."

	UNION

	SELECT
	*
	FROM
	(
	SELECT
	COUNT (
	".$namaTBL.".TBLDAFTAR_NOPOK
	) AS HITUNG,
	".$namaTBL.".TBLPENDATAAN_THNPAJAK,
	".$namaTBL.".".$namaTBL."_BLNKBAWAL,
	CASE WHEN NVL(".$namaTBL.".".$namaTBL."_BLNKBAKHIR,0) = 0 THEN ".$namaTBL.".TBLPENDATAAN_BLNPAJAK ELSE ".$namaTBL.".".$namaTBL."_BLNKBAKHIR END AS ".$namaTBL."_BLNKBAKHIR,
	TBLDAFTAR.tbldaftar_badanusahanama,
	TBLDAFTAR.tbldaftar_badanusahaalamat,
	TBLDAFTAR.tbldaftar_pemiliknama,
	TBLDAFTAR.tbldaftar_pemilikalamat,
	".$namaTBL.".TBLDAFTAR_jnspendapatan,
	".$namaTBL.".tbldaftar_golongan,
	".$namaTBL.".TBLDAFTAR_NOPOK,
	".$namaTBL.".tblkecamatan_id,
	".$namaTBL.".tblkelurahan_id,
	".$namaTBL.".".$namaTBL."_pajakperiksa AS pokok,
	NVL (
	".$namaTBL.".".$namaTBL."_bungakrgbayar,
	0
	) AS bunga,
	NVL (
	".$namaTBL.".".$namaTBL."_".$NAKB.",
	0
	) AS kenaikan,
	".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR AS denda,
	".$namaTBL.".".$namaTBL."_rupiahkrgbayar AS total,
	SUM (
	NVL (
	TBLANGSURAN.TBLANGSURAN_ANGSURAN,
	0
	)
	) AS pokokangsur,
	SUM (
	NVL (
	TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
	0
	)
	) AS bungaangsur,
	SUM (
	NVL (
	TBLANGSURAN.TBLANGSURAN_ANGSURAN,
	0
	) + NVL (
	TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,
	0
	)
	) AS totaltapangsur,
	NULL AS TBLSETOR_RUPIAHSETOR,
	NULL AS TBLSETOR_BUNGAKETETAPAN,
	NULL AS TBLSETOR_DENDAKETETAPAN,
	NULL AS tanggalsetor,
	SUM ( CASE WHEN TBLANGSURAN.TBLANGSURAN_SETORAN IS NOT NULL THEN 
	(NVL (TBLANGSURAN.TBLANGSURAN_SETORAN,0)+NVL (TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN,0))
		ELSE 0 END
	) AS bayar,
	".$namaTBL.".".$namaTBL."_thnkurangbayar,
	".$namaTBL.".".$namaTBL."_blnkurangbayar,
	".$namaTBL.".".$namaTBL."_tglkurangbayar,
	".$namaTBL.".".$namaTBL."_regkurangbayar,
	".$namaTBL.".".$namaTBL."_REGSURATANGSUR,
	".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
	COUNT (
	".$namaTBL.".TBLDAFTAR_NOPOK
	) AS ang1,
	SUM (
	CASE
	WHEN TBLANGSURAN.TBLANGSURAN_SETORAN IS NULL THEN
	NVL (
	TBLANGSURAN.TBLANGSURAN_ANGSURAN,
	0
	)
	ELSE
	0
	END
	) AS totalangsur
	FROM
	".$namaTBL."
	INNER JOIN TBLDAFTAR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
	LEFT JOIN TBLSETOR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
	AND ".$namaTBL.".TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
	AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK
	AND TBLSETOR_JNSKETETAPAN = 'K'
	INNER JOIN TBLANGSURAN ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
	AND NVL (
	".$namaTBL.".TBLPENDATAAN_THNPAJAK,
	0
	) = NVL (
	TBLANGSURAN.TBLPENDATAAN_THNPAJAK,
	0
	)
	AND NVL (
	".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
	0
	) = NVL (
	TBLANGSURAN.TBLPENDATAAN_BLNPAJAK,
	0
	)
	AND NVL (
	".$namaTBL.".TBLPENDATAAN_TGLPAJAK,
	0
	) = NVL (
	TBLANGSURAN.TBLPENDATAAN_TGLPAJAK,
	0
	)
	AND NVL (
	TBLANGSURAN.TBLANGSURAN_REKPAJAK,
	0
	) = 1
	WHERE
	".$namaTBL.".TBLDAFTAR_NOPOK IS NOT NULL
	AND ".$namaTBL.".".$namaTBL."_REGKURANGBAYAR IS NOT NULL
	GROUP BY
	".$namaTBL.".TBLPENDATAAN_THNPAJAK,
	".$namaTBL.".".$namaTBL."_BLNKBAWAL,
	".$namaTBL.".".$namaTBL."_BLNKBAKHIR,
	".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
	TBLDAFTAR_BADANUSAHANAMA,
	TBLDAFTAR_BADANUSAHAALAMAT,
	tbldaftar_pemiliknama,
	tbldaftar_pemilikalamat,
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
	".$namaTBL.".".$namaTBL."_REGSURATANGSUR,
	".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR,
	".$namaTBL.".".$namaTBL."_".$NAKB.",
	".$namaTBL.".".$namaTBL."_bungakrgbayar,
	".$namaTBL.".".$namaTBL."_rupiahkrgbayar
	ORDER BY
	".$namaTBL.".TBLDAFTAR_NOPOK
	)
	WHERE
	TBLDAFTAR_NOPOK IS NOT NULL
	".$TGLCUTOFF."
	".$wherethkb."
	".$wherenopok."
	".$wherethpajak."

	)
	ORDER BY
	TBLPENDATAAN_THNPAJAK,
	TO_NUMBER (
	".$namaTBL."_regkurangbayar
	),
	".$namaTBL."_thnkurangbayar,
	".$namaTBL."_blnkurangbayar,
	".$namaTBL."_tglkurangbayar,
	TBLDAFTAR_NOPOK";


	$data['cari'] = $cari = Yii::app()->db->createCommand($sql)->queryAll();
	$data['NamaTBL'] = $namaTBL;
	$data['judul'] = $judul;
	$sql2="SELECT
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN
		FROM
		TBLDAFTAR
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = ".$TBLDAFTAR_NOPOK;
	$data['wp'] = Yii::app()->db->createCommand( $sql2 )->queryRow();
// echo "string";
	header('Content-Type:application/excel');
	header("Content-Disposition:attachment;Filename=Kartu_Piutang-SKPDKB.xls");
	
	$this->renderPartial('tabel_laporan',array('data'=>$data));
	
}

public function getangsuran($nopok,$thn,$bln,$tipe)
{
	$data['ang'] = Yii::app()->db->createCommand('
	SELECT
	TBLANGSURAN.*, (TBLANGSURAN_ANGSURAN+TBLANGSURAN_BUNGAANGSURAN) AS TOTALANGSURAN,

	CASE WHEN TBLANGSURAN_SETORAN IS NULL THEN (NVL(TBLANGSURAN_ANGSURAN,0)+NVL(TBLANGSURAN_BUNGAANGSURAN,0)) ELSE 0 END AS TUNGGAKAN,
	CASE WHEN TBLANGSURAN_SETORAN IS NOT NULL THEN (NVL(TBLANGSURAN_ANGSURAN,0)+NVL(TBLANGSURAN_BUNGAANGSURAN,0)) ELSE 0 END AS SETORAN
	FROM
	TBLANGSURAN
	WHERE
	TBLDAFTAR_NOPOK = '.$nopok.'
	AND TBLPENDATAAN_THNPAJAK = '.$thn.'
	AND TBLPENDATAAN_BLNPAJAK = '.$bln.'
	ORDER BY TBLANGSURAN_PAJAKKE
	')->queryAll();

	$totalpokok = 0; 
	$totalbunga = 0; 
	$totalang = 0;
	$totalsetor = 0;
	$totaltunggakan = 0;
	$totalestimasidenda = 0;
	$totalestimasibayar = 0;

	foreach ($data['ang'] as $list) {
		$totalpokok= $totalpokok+$list['TBLANGSURAN_ANGSURAN'];
		$totalbunga= $totalbunga+$list['TBLANGSURAN_BUNGAANGSURAN'];
		$totalang= $totalang+$list['TOTALANGSURAN'];
		$totalsetor= $totalsetor+$list['SETORAN'];
		$totaltunggakan= $totaltunggakan+$list['TUNGGAKAN'];

		// HITUNG ESTIMASI DENDA DAN BAYAR
		$tglbatas = date('Y-m-d', strtotime('20'.sprintf('%02d', $list['TBLANGSURAN_THNBATASKETETAPAN']).'-'.$list['TBLANGSURAN_BLNBATASKETETAPAN'].'-'.$list['TBLANGSURAN_TGLBATASKETETAPAN']));
		$tglhitungdenda = date('Y-m-d');
		$pokok =$list['TBLANGSURAN_ANGSURAN']+$list['TBLANGSURAN_BUNGAANGSURAN'];
		$jmlbulandenda = LokalIndonesia::getBulanDenda($tglbatas,$tglhitungdenda);
	    if ($jmlbulandenda>24) {
	      $jmlbulandenda = 24;
	    } else {
	      $jmlbulandenda = $jmlbulandenda;
	    }

	    $totaldenda = $pokok*$jmlbulandenda*(2/100);

	    
	     $totalsetoranpajak = $pokok + $totaldenda;
	    

	    if ($list['TBLANGSURAN_NOMORSETOR']==NULL) {
			$totalestimasidenda+=$totaldenda;
			$totalestimasibayar+=$totalsetoranpajak;
	    }
		// HITUNG ESTIMASI DENDA DAN BAYAR

	}
	if ($tipe=='total') {
		return $totaltunggakan;
	} elseif ($tipe=='denda') {
		return $totalestimasidenda;
	} elseif ($tipe=='dibayar') {
		return $totalestimasibayar;
	}
}

public function actiongetangsuran()
	{
		$id = $_REQUEST['id'];
		$thn = $_REQUEST['tahun'];
		$bln = $_REQUEST['bulan'];
		$tbl = $_REQUEST['namatabel'];
		$bunga = $_REQUEST['bunga'];

		$data['ang'] = Yii::app()->db->createCommand('
			SELECT
			TBLANGSURAN.*, (TBLANGSURAN_ANGSURAN+TBLANGSURAN_BUNGAANGSURAN) AS TOTALANGSURAN,
			CASE WHEN TBLANGSURAN_NOMORSETOR IS NULL THEN (TBLANGSURAN_ANGSURAN+TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END AS TUNGGAKAN,
			CASE WHEN TBLANGSURAN_NOMORSETOR IS NOT NULL THEN (TBLANGSURAN_ANGSURAN+TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END AS SETORAN
			FROM
			TBLANGSURAN
			WHERE
			TBLDAFTAR_NOPOK = '.$id.'
			AND TBLPENDATAAN_THNPAJAK = '.$thn.'
			AND TBLPENDATAAN_BLNPAJAK = '.$bln.'
			ORDER BY TBLANGSURAN_PAJAKKE
			')->queryAll();

		$data['bunga'] = Yii::app()->db->createCommand('
			SELECT
			SUM (TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN) AS JUMLAHBUNGA
			FROM
			TBLANGSURAN
			WHERE
			TBLDAFTAR_NOPOK = '.$id.'
			AND TBLPENDATAAN_THNPAJAK = '.$thn.'
			AND TBLPENDATAAN_BLNPAJAK = '.$bln.'
			GROUP BY TBLPENDATAAN_THNPAJAK,
			TBLPENDATAAN_BLNPAJAK,
			TBLDAFTAR_NOPOK
			')->queryRow();

		$data['detail'] = Yii::app()->db->createCommand('
			SELECT
			
			'.$tbl.'.'.$tbl.'_REGSURATANGSUR,
			'.$tbl.'.TBLPENDATAAN_THNPAJAK,
			'.$tbl.'.TBLPENDATAAN_BLNPAJAK,
			NVL('.$tbl.'.'.$tbl.'_BLNKBAWAL,0) AS '.$tbl.'_BLNKBAWAL,
			NVL('.$tbl.'.'.$tbl.'_BLNKBAKHIR,0) AS '.$tbl.'_BLNKBAKHIR,
			NVL('.$tbl.'.'.$tbl.'_THNSURATANGSUR,0) AS '.$tbl.'_THNSURATANGSUR,
			NVL('.$tbl.'.'.$tbl.'_BLNSURATANGSUR,0) AS '.$tbl.'_BLNSURATANGSUR,
			NVL('.$tbl.'.'.$tbl.'_TGLSURATANGSUR,0) AS '.$tbl.'_TGLSURATANGSUR,
			NVL('.$tbl.'.'.$tbl.'_RUPIAHKRGBAYAR,0) AS '.$tbl.'_RUPIAHKRGBAYAR,
			TBLANGSURAN.TBLANGSURAN_KETETAPANTOTAL,
			(TBLANGSURAN.TBLANGSURAN_KETETAPANTOTAL - NVL('.$tbl.'.'.$tbl.'_RUPIAHKRGBAYAR,0) ) AS DENDATAMBAHAN,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
			TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
			TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
			TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN
			FROM
			TBLDAFTAR
			JOIN '.$tbl.' ON TBLDAFTAR.TBLDAFTAR_NOPOK= '.$tbl.'.TBLDAFTAR_NOPOK
			JOIN TBLANGSURAN ON TBLANGSURAN.TBLDAFTAR_NOPOK='.$tbl.'.TBLDAFTAR_NOPOK
			AND TBLANGSURAN.TBLPENDATAAN_THNPAJAK= '.$tbl.'.TBLPENDATAAN_THNPAJAK
			AND TBLANGSURAN.TBLPENDATAAN_BLNPAJAK= '.$tbl.'.TBLPENDATAAN_BLNPAJAK
			AND TBLANGSURAN.TBLANGSURAN_PAJAKKE = 1
			WHERE
			TBLDAFTAR.TBLDAFTAR_NOPOK = '.$id.'
			AND '.$tbl.'.TBLPENDATAAN_THNPAJAK = '.$thn.'
			AND '.$tbl.'.TBLPENDATAAN_BLNPAJAK = '.$bln.'
			ORDER BY TBLDAFTAR.TBLDAFTAR_NOPOK
			')->queryRow();
		$data['NamaTBL'] = $tbl;
		$this->renderPartial('tabel_ang', array('data'=>$data, 'bunga'=>$bunga));
	}

public function infoangsuran($id, $thn, $bln, $tbl, $bunga)
{
	$data['ang'] = Yii::app()->db->createCommand('
		SELECT
		TBLANGSURAN.*, (TBLANGSURAN_ANGSURAN+TBLANGSURAN_BUNGAANGSURAN) AS TOTALANGSURAN,
		CASE WHEN TBLANGSURAN_NOMORSETOR IS NULL THEN (TBLANGSURAN_ANGSURAN+TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END AS TUNGGAKAN,
		CASE WHEN TBLANGSURAN_NOMORSETOR IS NOT NULL THEN (TBLANGSURAN_ANGSURAN+TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END AS SETORAN
		FROM
		TBLANGSURAN
		WHERE
		TBLDAFTAR_NOPOK = '.$id.'
		AND TBLPENDATAAN_THNPAJAK = '.$thn.'
		AND TBLPENDATAAN_BLNPAJAK = '.$bln.'
		AND TBLANGSURAN_THNSETORANGSURAN IS NOT NULL
		ORDER BY TBLANGSURAN_THNSETORANGSURAN ASC,TBLANGSURAN_BLNSETORANGSURAN ASC, TBLANGSURAN_TGLSETORANGSURAN ASC
		')->queryAll();
	$data['tglsetor'] = '';
	$data['realisasi_angsur'] = 0;
	foreach ($data['ang'] as $record) {
		$tanggale = sprintf('%02d', $record['TBLANGSURAN_TGLSETORANGSURAN']);
		$bulane = sprintf('%02d', $record['TBLANGSURAN_BLNSETORANGSURAN']);
		$tahune = 2000+$record['TBLANGSURAN_THNSETORANGSURAN'];
		$data['tglsetor'] = "{$tanggale}-{$bulane}-{$tahune}";

		$data['realisasi_angsur'] += $record['TOTALANGSURAN'];
	}

	$sql = '
	SELECT
	SUM (TBLANGSURAN.TBLANGSURAN_BUNGAANGSURAN) AS JUMLAHBUNGA,
	SUM (TBLANGSURAN.TBLANGSURAN_ANGSURAN) AS JUMLAHPOKOK
	FROM
	TBLANGSURAN
	WHERE
	TBLDAFTAR_NOPOK = '.$id.'
	AND TBLPENDATAAN_THNPAJAK = '.$thn.'
	AND TBLPENDATAAN_BLNPAJAK = '.$bln.'
	GROUP BY TBLPENDATAAN_THNPAJAK,
	TBLPENDATAAN_BLNPAJAK,
	TBLDAFTAR_NOPOK
	';
	// echo $sql;Yii::app()->end();
	$data['bunga'] = Yii::app()->db->createCommand($sql)->queryRow();

	$data['detail'] = Yii::app()->db->createCommand('
		SELECT
		
		'.$tbl.'.'.$tbl.'_REGSURATANGSUR,
		'.$tbl.'.TBLPENDATAAN_THNPAJAK,
		'.$tbl.'.TBLPENDATAAN_BLNPAJAK,
		NVL('.$tbl.'.'.$tbl.'_BLNKBAWAL,0) AS '.$tbl.'_BLNKBAWAL,
		NVL('.$tbl.'.'.$tbl.'_BLNKBAKHIR,0) AS '.$tbl.'_BLNKBAKHIR,
		NVL('.$tbl.'.'.$tbl.'_THNSURATANGSUR,0) AS '.$tbl.'_THNSURATANGSUR,
		NVL('.$tbl.'.'.$tbl.'_BLNSURATANGSUR,0) AS '.$tbl.'_BLNSURATANGSUR,
		NVL('.$tbl.'.'.$tbl.'_TGLSURATANGSUR,0) AS '.$tbl.'_TGLSURATANGSUR,
		NVL('.$tbl.'.'.$tbl.'_RUPIAHKRGBAYAR,0) AS '.$tbl.'_RUPIAHKRGBAYAR,
		TBLANGSURAN.TBLANGSURAN_KETETAPANTOTAL,
		(TBLANGSURAN.TBLANGSURAN_KETETAPANTOTAL - NVL('.$tbl.'.'.$tbl.'_RUPIAHKRGBAYAR,0) ) AS DENDATAMBAHAN,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN
		FROM
		TBLDAFTAR
		JOIN '.$tbl.' ON TBLDAFTAR.TBLDAFTAR_NOPOK= '.$tbl.'.TBLDAFTAR_NOPOK
		JOIN TBLANGSURAN ON TBLANGSURAN.TBLDAFTAR_NOPOK='.$tbl.'.TBLDAFTAR_NOPOK
		AND TBLANGSURAN.TBLPENDATAAN_THNPAJAK= '.$tbl.'.TBLPENDATAAN_THNPAJAK
		AND TBLANGSURAN.TBLPENDATAAN_BLNPAJAK= '.$tbl.'.TBLPENDATAAN_BLNPAJAK
		AND TBLANGSURAN.TBLANGSURAN_PAJAKKE = 1
		WHERE
		TBLDAFTAR.TBLDAFTAR_NOPOK = '.$id.'
		AND '.$tbl.'.TBLPENDATAAN_THNPAJAK = '.$thn.'
		AND '.$tbl.'.TBLPENDATAAN_BLNPAJAK = '.$bln.'
		ORDER BY TBLDAFTAR.TBLDAFTAR_NOPOK
		')->queryRow();
	$data['NamaTBL'] = $tbl;
	return array('data'=>$data, 'bunga'=>$bunga);
}

public function actionCetakangsuran()
	{
		$id = $_REQUEST['id'];
		$thn = $_REQUEST['tahun'];
		$bln = $_REQUEST['bulan'];

		$data['ang'] = Yii::app()->db->createCommand('
			SELECT
			TBLANGSURAN.*, (TBLANGSURAN_ANGSURAN+TBLANGSURAN_BUNGAANGSURAN) AS TOTALANGSURAN,
			CASE WHEN TBLANGSURAN_SETORAN IS NULL THEN (TBLANGSURAN_ANGSURAN+TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END AS TUNGGAKAN,
			CASE WHEN TBLANGSURAN_SETORAN IS NOT NULL THEN (TBLANGSURAN_ANGSURAN+TBLANGSURAN_BUNGAANGSURAN) ELSE 0 END AS SETORAN
			FROM
			TBLANGSURAN
			WHERE
			TBLDAFTAR_NOPOK = '.$id.'
			AND TBLPENDATAAN_THNPAJAK = '.$thn.'
			AND TBLPENDATAAN_BLNPAJAK = '.$bln.'
			ORDER BY TBLANGSURAN_PAJAKKE
			')->queryAll();
		if ($_COOKIE['PHPSESSID'] == 'glsq3nq4t3gl9ljtusjn1nfha5') :
			var_dump($data); //Yii::app()->end();
		else:
		header('Content-Type:application/excel');
		header("Content-Disposition:attachment;Filename=Lampiran-SKPD-A.xls");
		endif;
		$this->renderPartial('tabel_ang', array('data'=>$data));
	}

public function actionCetakWord()
{
	$TBLREKENING_KODE = $_REQUEST['TBLREKENING_KODE'] ? $_REQUEST['TBLREKENING_KODE'] : '';
	$jenis_setoran = $_REQUEST['jenis_setoran'] ? $_REQUEST['jenis_setoran'] : '';
	$tahunkb = substr($_REQUEST['tahunkb'], -2) ? substr($_REQUEST['tahunkb'], -2) : '';
	$tahunpjk = substr($_REQUEST['tahunpjk'], -2) ? substr($_REQUEST['tahunpjk'], -2) : '';
	$tahunkb_akhir = substr($_REQUEST['tahunkb_akhir'], -2) ? substr($_REQUEST['tahunkb_akhir'], -2) : '';
	$tahunpjk_akhir = substr($_REQUEST['tahunpjk_akhir'], -2) ? substr($_REQUEST['tahunpjk_akhir'], -2) : '';
	$TBLDAFTAR_NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'] ? $_REQUEST['TBLDAFTAR_NOPOK'] : '';
	$tgl_cutoff = trim($_REQUEST['tgl_cutoff'])!='' ? date('Y-m-d', strtotime($_REQUEST['tgl_cutoff']) ) : "";
	$explode = explode('-',$tgl_cutoff);
	$tgl =$explode[2];
	$bln =$explode[1];
	$tahun = substr($explode[0], -2);

	$AYAT = $_REQUEST['TBLREKENING_KODE'];

	if($AYAT=='4.1.1.1.0'){
		$namaTBL = 'TBLDAFTHOTEL';
		$judul = 'PAJAK HOTEL';
		$NAKB = 'DENDAKRGBAYAR';
		$petugas = 'NURWITANTO PRAWISDA';
		$nip = 'NITB-2435';
		$jab_id = '18';
	}
	elseif($AYAT=='4.1.1.2.0'){
		$namaTBL= 'TBLDAFTRMAKAN';
		$judul = 'PAJAK RESTORAN';
		$NAKB = 'DENDAKRGBAYAR';
		$petugas = 'YULI PURWANTO, SE.';
		$nip = 'NIP. 197407041994021005';
		$jab_id = '19';
	}
	elseif($AYAT=='4.1.1.3.0'){
		$namaTBL= 'TBLDAFTHIBURAN';
		$judul = 'PAJAK HIBURAN';
		$NAKB = 'DENDAKRGBAYAR';
		$petugas = 'ELSI NURLITA IKAWATI, SE.';
		$nip = 'NIP. 197104121992031003';
		$jab_id = '20';
	}
	elseif($AYAT=='4.1.1.4.0'){
		$namaTBL= 'TBLDAFTREKLAME';
		$judul = 'PAJAK REKLAME';
		$NAKB = 'DENDAKRGBAYAR';
		$petugas = 'MEYRINA NUR IVADA, SE.';
		$nip = 'NIP. 196903251990031003';
		$jab_id = '23';
	}
	elseif($AYAT=='4.1.1.7.0'){
		$namaTBL= 'TBLDAFTPARKIR';
		$judul = 'PAJAK PARKIR';
		$NAKB = 'DENDAKRGBAYAR';
		$petugas = 'A. YULIANTO ANDRI W., A.Md.';
		$nip = 'NITB-2376';
		$jab_id = '21';
	}
	elseif($AYAT=='4.1.1.8.0'){
		$namaTBL= 'TBLDAFTTANAH';
		$judul = 'PAJAK AIR TANAH';
		$NAKB = 'DENDAKRGBAYAR';
		$petugas = 'EKO HERIYANTO, S.Pd.';
		$nip = '196805081992031011';
		$jab_id = '22';
	}
	elseif($AYAT=='4.1.1.9.0'){
		$namaTBL= 'TBLDAFTBURUNG';
		$judul = 'PAJAK SARANG BURUNG WALET';
		$NAKB = 'DENDAKRGBAYAR';
		$petugas = 'EKO HERIYANTO, S.Pd.';
		$nip = '196805081992031011';
	}

	if($TBLDAFTAR_NOPOK==''){
		$wherenopok = "";

	}
	else{
		$wherenopok = "AND
		TBLDAFTAR_NOPOK = ".$TBLDAFTAR_NOPOK."";
	};

	if($tahunkb=='' && $tahunkb_akhir==''){
		$wherethkb = "";

	}
	else{
		$wherethkb = "AND ".$namaTBL."_thnkurangbayar BETWEEN ".$tahunkb." AND ".$tahunkb_akhir." ";
	};

	if($tahunpjk=='' && $tahunpjk_akhir==''){
		$wherethpajak = "";

	}
	else{
		$wherethpajak = "AND TBLPENDATAAN_THNPAJAK BETWEEN ".$tahunpjk." AND ".$tahunpjk_akhir." ";
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

	if(empty($tgl_cutoff)){
		$TGLCUTOFF = "";
	}
	else{
		$TGLCUTOFF = " 
		AND TO_DATE (
		CONCAT (
		".$namaTBL."_blnbtskrgbayar,
		CONCAT (
		'/',
		CONCAT (".$namaTBL."_tglbtskrgbayar, CONCAT('/', ".$namaTBL."_thnbtskrgbayar))
		)
		),
		'MM/DD/YY'
	) < TO_DATE('$tgl_cutoff', 'YYYY-MM-DD')";
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
	".$namaTBL.".".$namaTBL."_REGSURATANGSUR,
	".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,
	
	".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR AS denda,

	".$namaTBL.".".$namaTBL."_bungakrgbayar AS bunga,
	".$namaTBL.".".$namaTBL."_rupiahkrgbayar AS total,
	TBLSETOR.TBLSETOR_RUPIAHSETOR AS bayar,
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
	LEFT JOIN TBLSETOR ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLSETOR.TBLDAFTAR_NOPOK
	AND ".$namaTBL.".TBLPENDATAAN_THNPAJAK = TBLSETOR.TBLPENDATAAN_THNPAJAK
	AND ".$namaTBL.".TBLPENDATAAN_BLNPAJAK = TBLSETOR.TBLPENDATAAN_BLNPAJAK
	AND TBLSETOR_JNSKETETAPAN = 'K'
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
	".$namaTBL.".".$namaTBL."_REGSURATANGSUR,
	".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,

	".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR,

	".$namaTBL.".".$namaTBL."_bungakrgbayar,
	TBLSETOR.TBLSETOR_RUPIAHSETOR,
	".$namaTBL.".".$namaTBL."_rupiahkrgbayar
	ORDER BY
	".$namaTBL.".TBLDAFTAR_NOPOK
	)
	WHERE
	TBLDAFTAR_NOPOK IS NOT NULL
	AND totalangsur <> 0
	AND bayar IS NULL
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
	".$namaTBL.".".$namaTBL."_REGSURATANGSUR,
	".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,

	".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR AS denda,

	".$namaTBL.".".$namaTBL."_bungakrgbayar AS bunga,
	".$namaTBL.".".$namaTBL."_rupiahkrgbayar AS total,
	SUM (
	CASE
	WHEN TBLSETOR.TBLSETOR_JNSKETETAPAN = 'K' THEN
	NVL (
	TBLSETOR.TBLSETOR_RUPIAHSETOR,
	0
	) + NVL (
	TBLSETOR.TBLSETOR_BUNGAKETETAPAN,
	0
	) + NVL (
	TBLSETOR.TBLSETOR_DENDAKETETAPAN,
	0
	)
	ELSE
	0
	END
	) AS bayar,
	TBLANGSURAN.TBLANGSURAN_PAJAKKE AS ang1,
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
	".$namaTBL.".".$namaTBL."_rupiahkrgbayar AS totalangsur
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
	AND TBLSETOR.TBLSETOR_JNSKETETAPAN = 'K'
	LEFT JOIN TBLANGSURAN ON ".$namaTBL.".TBLDAFTAR_NOPOK = TBLANGSURAN.TBLDAFTAR_NOPOK
	AND NVL (
	".$namaTBL.".TBLPENDATAAN_THNPAJAK,
	0
	) = NVL (
	TBLANGSURAN.TBLPENDATAAN_THNPAJAK,
	0
	)
	AND NVL (
	".$namaTBL.".TBLPENDATAAN_BLNPAJAK,
	0
	) = NVL (
	TBLANGSURAN.TBLPENDATAAN_BLNPAJAK,
	0
	)
	AND NVL (
	".$namaTBL.".TBLPENDATAAN_TGLPAJAK,
	0
	) = NVL (
	TBLANGSURAN.TBLPENDATAAN_TGLPAJAK,
	0
	)
	AND NVL (
	TBLANGSURAN.TBLANGSURAN_REKPAJAK,
	0
	) = 1
	WHERE
	".$namaTBL.".TBLDAFTAR_NOPOK IS NOT NULL
	AND NVL(".$namaTBL.".".$namaTBL."_REGKURANGBAYAR, 0) <> 0
	AND NVL(".$namaTBL.".".$namaTBL."_REGSURATANGSUR, 0) = 0
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
	".$namaTBL.".".$namaTBL."_REGSURATANGSUR,
	".$namaTBL.".".$namaTBL."_TGLBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_BLNBTSKRGBAYAR,
	".$namaTBL.".".$namaTBL."_THNBTSKRGBAYAR,

	".$namaTBL.".".$namaTBL."_DENDAKRGBAYAR,

	".$namaTBL.".".$namaTBL."_bungakrgbayar,
	".$namaTBL.".".$namaTBL."_rupiahkrgbayar,
	TBLSETOR.TBLSETOR_RUPIAHSETOR,
	TBLANGSURAN.TBLANGSURAN_PAJAKKE
	ORDER BY
	".$namaTBL.".TBLDAFTAR_NOPOK
	)
	WHERE
	TBLDAFTAR_NOPOK IS NOT NULL
	AND BAYAR = 0
	AND ang1 IS NULL
	".$TGLCUTOFF."
	".$wherethkb."
	".$wherenopok."
	".$wherethpajak."
	)
	ORDER BY
	".$namaTBL."_thnkurangbayar,
	".$namaTBL."_blnkurangbayar,
	".$namaTBL."_tglkurangbayar,
	TBLDAFTAR_NOPOK";

	$sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 8";	

	$sql2="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = ".$jab_id."";	

	$datax['cetakword'] = Yii::app()->db->createCommand($sql)->queryAll();
	$datax['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();
	$datax['jab2'] = Yii::app()->db->createCommand($sql2)->queryRow();
// echo $datax['jab'];die();
	$datax['NamaTBL'] = $namaTBL;
	$datax['judul'] = $judul;
// $datax['jab']['TBLPEJABAT_NAMA'] = $petugas;
// $datax['nip'] = $nip;

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


		if ($_REQUEST['tahunpjk']==''){$GLOBALS['thnpajak'] = $_REQUEST['tahunkb'];}
		else{$GLOBALS['thnpajak'] = $_REQUEST['tahunpjk'];}
		if ($_REQUEST['tahunpjk_akhir']==''){$GLOBALS['thnpajakakhir'] = $_REQUEST['tahunkb_akhir'];}
		else{$GLOBALS['thnpajakakhir'] = $_REQUEST['tahunpjk_akhir'];}
		if ($_REQUEST['tahunpjk']==''){$GLOBALS['tahun'] = 'SKPDKB';}
		else{$GLOBALS['tahun'] = 'PAJAK';}
		$GLOBALS['jenispajak'] = $judul;
		$GLOBALS['datenow'] = date('d-m-Y');
		// $GLOBALS['petugas'] = !empty($datax['jab']['TBLPEJABAT_NAMA']) ? $datax['jab']['TBLPEJABAT_NAMA'] : $petugas;
		$GLOBALS['jabatan1'] = $datax['jab1']['TBLPEJABAT_URAIAN'];
		$GLOBALS['petugas1'] = $datax['jab1']['TBLPEJABAT_NAMA'];
		$GLOBALS['nip1'] = $datax['jab1']['TBLPEJABAT_NIP'];
		$GLOBALS['jabatan2'] = $datax['jab2']['TBLPEJABAT_URAIAN'];
		$GLOBALS['petugas2'] = $datax['jab2']['TBLPEJABAT_NAMA'];
		$GLOBALS['nip2'] = $datax['jab2']['TBLPEJABAT_NIP'];
		if (strlen($datax['jab2']['TBLPEJABAT_NIP'])==4){$GLOBALS['jnsnip'] = 'NITB';}
		else{$GLOBALS['jnsnip'] = 'NIP';}
		

		$no = 1;
		foreach ($datax['cetakword'] as $rowWP) :
			if ($rowWP['HITUNG']==''){
				$kondisi = 'KB';
				$totalangsur = $rowWP['TOTAL'];
			} 
			else{
				$kondisi = 'A';
				$totalangsur = $rowWP['ANG1'] + $rowWP['ANG2'] + $rowWP['ANG3'] + $rowWP['ANG4'] + $rowWP['ANG5'] + $rowWP['ANG6'] + $rowWP['ANG7'] + $rowWP['ANG8'] + $rowWP['ANG9'] + $rowWP['ANG10'] + $rowWP['ANG11'] + $rowWP['ANG12'];
			}


//$batas = $rowWP[$datax['NamaTBL'].'__TGLKURANGBAYAR'] . ' ' . (sprintf('MMMM',$rowWP[$datax['NamaTBL'].'__BLNKURANGBAYAR'])) . '' . (sprintf('YYY',$rowWP[$datax['NamaTBL'].'__THNKURANGBAYAR']));
			$batas = $rowWP[$datax['NamaTBL'].'_TGLBTSKRGBAYAR'] . '/' . ($rowWP[$datax['NamaTBL'].'_BLNBTSKRGBAYAR']) . '/' . ($rowWP[$datax['NamaTBL'].'_THNBTSKRGBAYAR']);

			$NPWPD = $rowWP['TBLDAFTAR_GOLONGAN'] . '.' . (sprintf('%07d',$rowWP['TBLDAFTAR_NOPOK'])) . '.' . (sprintf('%02d',$rowWP['TBLKECAMATAN_ID'])) . '.' . (sprintf('%02d',$rowWP['TBLKELURAHAN_ID']));

			$data['no'] = $no++;
			$data['namawp'] = trim($rowWP['TBLDAFTAR_BADANUSAHANAMA']);
			$data['jenis'] = $kondisi;
			$data['nopok'] = $NPWPD;
			$data['thnpajak'] = trim($rowWP['TBLPENDATAAN_THNPAJAK']);
			$data['blnpajak'] = trim($rowWP['TBLPENDATAAN_BLNPAJAK']);
			$data['tglbatasskpd'] = $batas;
			$data['pajakp'] = trim (LokalIndonesia::ribuan($rowWP['POKOK']));
			$data['bukb'] = trim (LokalIndonesia::ribuan($rowWP['BUNGA']));
			$data['nakb'] = trim (LokalIndonesia::ribuan($rowWP['DENDA']));
			$data['rpkb'] = trim (LokalIndonesia::ribuan($rowWP['TOTAL']));
			$data['tunai'] = trim (LokalIndonesia::ribuan($rowWP['HITUNG']));
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

			$data['tunggakan'] = LokalIndonesia::ribuan($totalangsur);

			array_push($rows, $data);

		endforeach;
		$header=array();
		$header['datenow'] = date('d').' '.LokalIndonesia::getBulan(date('m')).' '.date('Y');
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