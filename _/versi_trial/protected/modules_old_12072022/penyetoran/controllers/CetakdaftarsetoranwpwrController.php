<?php

class CetakdaftarsetoranwpwrController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}


	public function actionCetak()
	{
		$tahun = $_REQUEST['tahun'];
		$bin = $_REQUEST['bln'];
		$tgl = $_REQUEST['tgl'];
		$data=array();


		$wheretahun = '';
		if (!empty($tahun)) {
			$wheretahun = ' AND "sptre".TBLPENDATAAN_THNPAJAK = ' . substr($tahun, -2);
		}

		$wherebln = '';
		if (!empty($blp)) {
			$whereblp = ' AND "sptre".TBLPENDATAAN_BLNPAJAK = ' . $blp;
		}

		$wheretgl = '';
		if (!empty($hrp)) {
			$wherehrp = ' AND "sptre".TBLPENDATAAN_TGLPAJAK = ' . $hrp;
		}



		$sql = "SELECT
		TBLSETOR.TBLSETOR_THNSETOR,
		TBLSETOR.TBLSETOR_BLNSETOR,
		TBLSETOR.TBLSETOR_TGLSETOR,
		TBLSETOR.TBLPENDATAAN_THNPAJAK,
		TBLSETOR.TBLPENDATAAN_BLNPAJAK,
		TBLSETOR.TBLPENDATAAN_TGLPAJAK,
		TBLSETOR.TBLSETOR_NOMORSSPD,
		TBLSETOR.TBLSETOR_REKPENDAPATAN,
		TBLSETOR.TBLSETOR_REKPAD,
		TBLSETOR.TBLSETOR_REKPAJAK,
		TBLSETOR.TBLSETOR_REKAYAT,
		TBLSETOR.TBLSETOR_REKJENIS,
		TBLSETOR.TBLSETOR_REKSUBJENIS,
		NVL (
		TBLDAFTAR_BADANUSAHANAMA,
		KET
	) AS TBLDAFTAR_BADANUSAHANAMA,
	TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
	TBLDAFTAR.TBLDAFTAR_GOLONGAN,
	TBLSETOR.TBLDAFTAR_NOPOK,
	TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
	TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
	CASE
	WHEN (
	(
	TBLSETOR.TBLSETOR_REKAYAT = 2
	)
	OR (
	TBLSETOR.TBLSETOR_REKAYAT = 1
	)
	OR (
	TBLSETOR.TBLSETOR_REKAYAT = 7
	)
	OR (
	TBLSETOR.TBLSETOR_REKAYAT = 11
	)
)
AND (
TRIM (TBLSETOR.TBLSETOR_JNSBAYAR) LIKE 'SKPD'
) THEN
'SPTPD'
ELSE
TBLSETOR.TBLSETOR_JNSBAYAR
END AS TBLSETOR_JNSBAYAR,
TBLSETOR_BUNGAKETETAPAN,
CASE
WHEN TRIM (TBLSETOR.TBLSETOR_JNSBAYAR) LIKE '%SKPD-A%' THEN
NVL (
TBLSETOR.TBLSETOR_RUPIAHSETOR,
0
) + NVL (TBLSETOR.TBLSETOR_BUNGAKETETAPAN, 0)
ELSE
TBLSETOR.TBLSETOR_RUPIAHSETOR
END AS TBLSETOR_RUPIAHSETOR,
(
	SELECT
	TBLREKENING.TBLREKENING_NAMAREKENING
	FROM
	TBLREKENING
	WHERE
	TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLSETOR.TBLSETOR_REKPENDAPATAN
	AND TBLREKENING.TBLREKENING_REKPAD = TBLSETOR.TBLSETOR_REKPAD
	AND TBLREKENING.TBLREKENING_REKPAJAK = TBLSETOR.TBLSETOR_REKPAJAK
	AND TBLREKENING.TBLREKENING_REKAYAT = TBLSETOR.TBLSETOR_REKAYAT
	AND TBLREKENING.TBLREKENING_REKJENIS = TBLSETOR.TBLSETOR_REKJENIS
) AS TBLREKENING_NAMAREKENING
FROM
TBLSETOR
LEFT JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
AND TBLSETOR.TBLSETOR_GOLONGAN = TBLDAFTAR.TBLDAFTAR_GOLONGAN
AND TBLSETOR.TBLDAFTAR_JNSPENDAPATAN = TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN
WHERE
TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
AND TBLSETOR.TBLSETOR_THNSETOR = 12
AND TBLSETOR.TBLSETOR_BLNSETOR = 12
AND TBLSETOR.TBLSETOR_TGLSETOR = 12
AND TBLSETOR.TBLSETOR_STATUSBAYAR <> 20
AND TRIM (TBLSETOR_JNSBAYAR) <> 'BNG SK-A'
ORDER BY
TBLSETOR.TBLSETOR_REKPENDAPATAN,
TBLSETOR.TBLSETOR_REKPAD,
TBLSETOR.TBLSETOR_REKPAJAK,
TBLSETOR.TBLSETOR_REKAYAT,
TBLSETOR.TBLSETOR_REKJENIS,
TBLSETOR.TBLDAFTAR_NOPOK
";
$data['hasil'] = $hasil = Yii::app()->db->createCommand($sql)->queryAll();

$this->renderPartial('cetak', array('data'=>$data));
}
}
