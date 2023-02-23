<?php

class Setoran_harianController extends Controller
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
			AND TBLREKENING_REKAYAT <>4
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
		
		$this->renderPartial('index', array('data'=>$data));
	
	}

	public function actionCetakatas()
	{

		$tahun = substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2) : '';
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '';
		$tanggal = $_REQUEST['tanggal'] ? $_REQUEST['tanggal'] : '';
		$rekening = $_REQUEST['rekening'] ? $_REQUEST['rekening'] : '';
		
		$AYAT = $_REQUEST['rekening'];

		if ($AYAT=='1'){
			$data['judul'] = 'PAJAK HOTEL';
		}
		elseif($AYAT=='2'){
			$data['judul'] = 'PAJAK RESTORAN';
		}
		elseif($AYAT=='3'){
			$data['judul'] = 'PAJAK HIBURAN';
		}
		elseif($AYAT=='5'){
			$data['judul'] = 'PAJAK PENERANGAN JALAN';
		}
		elseif($AYAT=='7'){
			$data['judul'] = 'PAJAK PARKIR';
		}
		elseif($AYAT=='8'){
			$data['judul'] = 'PAJAK AIR TANAH';
		}
		elseif($AYAT=='9'){
			$data['judul'] = 'PAJAK SARANG BURUNG WALET';
		}
		elseif($AYAT=='11'){
			$data['judul'] = 'PAJAK BPHTB';
		}
		elseif($AYAT=='10'){
			$data['judul'] = 'PAJAK BUMI DAN BANGUNAN (PBB';
		}
		elseif($AYAT=='23'){
			$data['judul'] = 'PAJAK SEWA ASET';
		}

		if($rekening==''){
			$rekening = "";
		}
		else{
			$rekening = "AND TBLSETOR.TBLSETOR_REKAYAT = ".$rekening."";
		}

		
		if($tanggal==''){
			$wheretanggal = "";
		}
		else{
			$wheretanggal = "AND TBLSETOR_TGLSETOR = ".$tanggal."";
		}


		$sqlatas = "SELECT
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
		NVL (TBLDAFTAR_BADANUSAHANAMA, KET) AS BNAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLSETOR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		TBLSETOR.TBLSETOR_RUPIAHSETOR,
		TBLSETOR.TBLSETOR_JNSBAYAR,
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
		) AS NMREK
		FROM
		TBLSETOR
		LEFT JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		AND TBLSETOR.TBLSETOR_GOLONGAN = TBLDAFTAR.TBLDAFTAR_GOLONGAN
		AND TBLSETOR.TBLDAFTAR_JNSPENDAPATAN = TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN
		WHERE
		TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
		AND TBLSETOR_THNSETOR = ".$tahun."
		AND TBLSETOR_BLNSETOR = ".$bulan."
		".$wheretanggal."
		AND TBLSETOR.TBLSETOR_STATUSBAYAR <> 20
		".$rekening."
		AND TBLSETOR.TBLSETOR_REKPAJAK = '1'
		";
		
		$data['atas'] = $atas =Yii::app()->db->createCommand($sqlatas)->queryAll();

		$this->renderPartial('cetakatas',array('data'=>$data));

	}

	public function actionCetakkecilatas()
	{
		$tahun = substr($_REQUEST['tahun'], -2) ? substr($_REQUEST['tahun'], -2) : '';
		$bulan = $_REQUEST['bulan'] ? $_REQUEST['bulan'] : '';
		$tanggal = $_REQUEST['tanggal'] ? $_REQUEST['tanggal'] : '';
		$rekening = $_REQUEST['rekening'] ? $_REQUEST['rekening'] : '';
		
		$AYAT = $_REQUEST['rekening'];

		if ($AYAT=='1'){
			$data['judul'] = 'PAJAK HOTEL';
		}
		elseif($AYAT=='2'){
			$data['judul'] = 'PAJAK RESTORAN';
		}
		elseif($AYAT=='3'){
			$data['judul'] = 'PAJAK HIBURAN';
		}
		elseif($AYAT=='5'){
			$data['judul'] = 'PAJAK PENERANGAN JALAN';
		}
		elseif($AYAT=='7'){
			$data['judul'] = 'PAJAK PARKIR';
		}
		elseif($AYAT=='8'){
			$data['judul'] = 'PAJAK AIR TANAH';
		}
		elseif($AYAT=='9'){
			$data['judul'] = 'PAJAK SARANG BURUNG WALET';
		}
		elseif($AYAT=='11'){
			$data['judul'] = 'PAJAK BPHTB';
		}
		elseif($AYAT=='10'){
			$data['judul'] = 'PAJAK BUMI DAN BANGUNAN (PBB';
		}
		elseif($AYAT=='23'){
			$data['judul'] = 'PAJAK SEWA ASET';
		}

		if($rekening==''){
			$rekening = "";
		}
		else{
			$rekening = "AND TBLSETOR.TBLSETOR_REKAYAT = ".$rekening."";
		}

		
		if($tanggal==''){
			$wheretanggal = "";
		}
		else{
			$wheretanggal = "AND TBLSETOR_TGLSETOR = ".$tanggal."";
		}

		$sqlkecilatas = "SELECT
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
		NVL (TBLDAFTAR_BADANUSAHANAMA, KET) AS BNAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLSETOR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		TBLSETOR.TBLSETOR_RUPIAHSETOR,
		TBLSETOR.TBLSETOR_JNSBAYAR,
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
		) AS NMREK
		FROM
		TBLSETOR
		LEFT JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		AND TBLSETOR.TBLSETOR_GOLONGAN = TBLDAFTAR.TBLDAFTAR_GOLONGAN
		AND TBLSETOR.TBLDAFTAR_JNSPENDAPATAN = TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN
		WHERE
		TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
		AND TBLSETOR_THNSETOR = ".$tahun."
		AND TBLSETOR_BLNSETOR = ".$bulan."
		".$wheretanggal."
		AND TBLSETOR.TBLSETOR_STATUSBAYAR <> 20
		".$rekening."
		AND TBLSETOR.TBLSETOR_REKPAJAK = '1'
		UNION
		SELECT
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
		NVL (TBLDAFTAR_BADANUSAHANAMA, KET) AS BNAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLSETOR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		TBLSETOR.TBLSETOR_RUPIAHSETOR,
		TBLSETOR.TBLSETOR_JNSBAYAR,
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
		) AS NMREK
		FROM
		TBLSETOR
		LEFT JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		AND TBLSETOR.TBLSETOR_GOLONGAN = TBLDAFTAR.TBLDAFTAR_GOLONGAN
		AND TBLSETOR.TBLDAFTAR_JNSPENDAPATAN = TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN
		WHERE
		TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
		AND TBLSETOR_THNSETOR = ".$tahun."
		AND TBLSETOR_BLNSETOR = ".$bulan."
		".$wheretanggal."
		AND TBLSETOR.TBLSETOR_STATUSBAYAR <> 20
		AND TBLSETOR.TBLSETOR_REKJENIS = '1'
		AND TBLSETOR.TBLSETOR_REKPAJAK = '4'
		ORDER BY
		TBLSETOR_NOMORSSPD,
		TBLDAFTAR_NOPOK,
		TBLSETOR_REKPENDAPATAN,
		TBLSETOR_REKPAD,
		TBLSETOR_REKPAJAK,
		TBLSETOR_REKAYAT,
		TBLSETOR_REKJENIS,
		TBLKECAMATAN_IDBADANUSAHA,
		TBLKELURAHAN_IDBADANUSAHA";

		$data['kecilatas'] = $kecilats = Yii::app()->db->createCommand($sqlkecilatas)->queryAll();
			// Cetak Kecil Atas
		$this->renderPartial('cetakkecilatas',array('data'=>$data));
	}


	public function actionCetakbawah()
	{
		$rekeningbwh = $_REQUEST['rekeningbwh'];

		// Untuk Tanggal Awal
	$tglawl = trim($_REQUEST['tglawl'])!='' ? date('Y-m-d', strtotime($_REQUEST['tglawl']) ) : "";
		$explode = explode('-',$tglawl);
		$tgla =$explode[2];
		$blna =$explode[1];
		$tahuna = substr($explode[0], -2);

		// Untuk Tanggal Akhir
	$tglakhir = trim($_REQUEST['tglakhir'])!='' ? date('Y-m-d', strtotime($_REQUEST['tglakhir']) ) : "";
		$explode = explode('-',$tglakhir);
		$tglk =$explode[2];
		$blnk =$explode[1];
		$tahunk = substr($explode[0], -2);

		$AYAT = $_REQUEST['rekeningbwh'];

		if ($AYAT=='1'){
			$data['judul'] = 'PAJAK HOTEL';
		}
		elseif($AYAT=='2'){
			$data['judul'] = 'PAJAK RESTORAN';
		}
		elseif($AYAT=='3'){
			$data['judul'] = 'PAJAK HIBURAN';
		}
		elseif($AYAT=='5'){
			$data['judul'] = 'PAJAK PENERANGAN JALAN';
		}
		elseif($AYAT=='7'){
			$data['judul'] = 'PAJAK PARKIR';
		}
		elseif($AYAT=='8'){
			$data['judul'] = 'PAJAK AIR TANAH';
		}
		elseif($AYAT=='9'){
			$data['judul'] = 'PAJAK SARANG BURUNG WALET';
		}
		elseif($AYAT=='11'){
			$data['judul'] = 'PAJAK BPHTB';
		}
		elseif($AYAT=='10'){
			$data['judul'] = 'PAJAK BUMI DAN BANGUNAN (PBB';
		}
		elseif($AYAT=='23'){
			$data['judul'] = 'PAJAK SEWA ASET';
		}

		$sqlbawah = "SELECT
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
		NVL (TBLDAFTAR_BADANUSAHANAMA, KET) AS BNAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLSETOR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		TBLSETOR.TBLSETOR_RUPIAHSETOR,
		TBLSETOR.TBLSETOR_JNSBAYAR,
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
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLSETOR.TBLSETOR_REKAYAT
		) AS NMREK
		FROM
		TBLSETOR
		LEFT JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
		AND TBLSETOR.TBLSETOR_GOLONGAN = TBLDAFTAR.TBLDAFTAR_GOLONGAN
		AND TBLSETOR.TBLDAFTAR_JNSPENDAPATAN = TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN
		WHERE
		TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
		AND 

		(
		TO_DATE (
		CONCAT (
		TBLSETOR_BLNSETOR,
		CONCAT (
		'/',
		CONCAT (TBLSETOR_TGLSETOR, CONCAT('/', TBLSETOR_THNSETOR))
		)
		),
		'MM/dd/yy'
		) BETWEEN TO_DATE ('$blna/$tgla/$tahuna', 'MM/dd/yy')
		AND TO_DATE ('$blnk/$tglk/$tahunk', 'MM/dd/yy')
	)
	AND TBLSETOR.TBLSETOR_STATUSBAYAR <> 20
	AND TBLSETOR.TBLSETOR_REKAYAT = '$rekeningbwh'
	AND TBLSETOR.TBLSETOR_REKPAJAK = '1'
	ORDER BY TBLSETOR_BLNSETOR DESC";
	
	$data['bawah'] = $bawah = Yii::app()->db->createCommand($sqlbawah)->queryAll();
	$this->renderPartial('cetakbawah',array('data'=>$data));
}

public function actionCetakkecilbawah()
{
	$rekeningbwh = $_REQUEST['rekeningbwh'];

		// Untuk Tanggal Awal
	$tglawl = trim($_REQUEST['tglawl'])!='' ? date('Y-m-d', strtotime($_REQUEST['tglawl']) ) : "";
		$explode = explode('-',$tglawl);
		$tgla =$explode[2];
		$blna =$explode[1];
		$tahuna = substr($explode[0], -2);

		// Untuk Tanggal Akhir
	$tglakhir = trim($_REQUEST['tglakhir'])!='' ? date('Y-m-d', strtotime($_REQUEST['tglakhir']) ) : "";
		$explode = explode('-',$tglakhir);
		$tglk =$explode[2];
		$blnk =$explode[1];
		$tahunk = substr($explode[0], -2);

	$AYAT = $_REQUEST['rekeningbwh'];

		if ($AYAT=='1'){
			$data['judul'] = 'PAJAK HOTEL';
		}
		elseif($AYAT=='2'){
			$data['judul'] = 'PAJAK RESTORAN';
		}
		elseif($AYAT=='3'){
			$data['judul'] = 'PAJAK HIBURAN';
		}
		elseif($AYAT=='5'){
			$data['judul'] = 'PAJAK PENERANGAN JALAN';
		}
		elseif($AYAT=='7'){
			$data['judul'] = 'PAJAK PARKIR';
		}
		elseif($AYAT=='8'){
			$data['judul'] = 'PAJAK AIR TANAH';
		}
		elseif($AYAT=='9'){
			$data['judul'] = 'PAJAK SARANG BURUNG WALET';
		}
		elseif($AYAT=='11'){
			$data['judul'] = 'PAJAK BPHTB';
		}
		elseif($AYAT=='10'){
			$data['judul'] = 'PAJAK BUMI DAN BANGUNAN (PBB';
		}
		elseif($AYAT=='23'){
			$data['judul'] = 'PAJAK SEWA ASET';
		}

	$sqlkecilbawah = "SELECT
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
	NVL (TBLDAFTAR_BADANUSAHANAMA, KET) AS BNAMA,
	TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
	TBLDAFTAR.TBLDAFTAR_GOLONGAN,
	TBLSETOR.TBLDAFTAR_NOPOK,
	TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
	TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
	TBLSETOR.TBLSETOR_RUPIAHSETOR,
	TBLSETOR.TBLSETOR_JNSBAYAR,
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
	) AS NMREK
	FROM
	TBLSETOR
	LEFT JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
	AND TBLSETOR.TBLSETOR_GOLONGAN = TBLDAFTAR.TBLDAFTAR_GOLONGAN
	AND TBLSETOR.TBLDAFTAR_JNSPENDAPATAN = TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN
	WHERE
	TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
	AND (
	TO_DATE (
	CONCAT (
	TBLSETOR_BLNSETOR,
	CONCAT (
	'/',
	CONCAT (TBLSETOR_TGLSETOR, CONCAT('/', TBLSETOR_THNSETOR))
	)
	),
	'MM/DD/YY'
	) BETWEEN TO_DATE ('$blna/$tgla/$tahuna', 'MM/DD/YY')
	AND TO_DATE ('$blnk/$tglk/$tahunk', 'MM/DD/YY')
	)
	AND TBLSETOR.TBLSETOR_STATUSBAYAR <> 20
	AND TBLSETOR.TBLSETOR_REKAYAT = '$rekeningbwh'
	AND TBLSETOR.TBLSETOR_REKPAJAK = '1'
	UNION
	SELECT
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
	NVL (TBLDAFTAR_BADANUSAHANAMA, KET) AS BNAMA,
	TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
	TBLDAFTAR.TBLDAFTAR_GOLONGAN,
	TBLSETOR.TBLDAFTAR_NOPOK,
	TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
	TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
	TBLSETOR.TBLSETOR_RUPIAHSETOR,
	TBLSETOR.TBLSETOR_JNSBAYAR,
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
	) AS NMREK
	FROM
	TBLSETOR
	LEFT JOIN TBLDAFTAR ON TBLSETOR.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
	AND TBLSETOR.TBLSETOR_GOLONGAN = TBLDAFTAR.TBLDAFTAR_GOLONGAN
	AND TBLSETOR.TBLDAFTAR_JNSPENDAPATAN = TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN
	WHERE
	TBLSETOR.TBLSETOR_REKPENDAPATAN <> 0
	AND (
	TO_DATE (
	CONCAT (
	TBLSETOR_BLNSETOR,
	CONCAT (
	'/',
	CONCAT (TBLSETOR_TGLSETOR, CONCAT('/', TBLSETOR_THNSETOR))
	)
	),
	'MM/DD/YY'
	) BETWEEN TO_DATE ('$blna/$tgla/$tahuna', 'MM/DD/YY')
	AND TO_DATE ('$blnk/$tgla/$tahuna', 'MM/DD/YY')
	)
	AND TBLSETOR.TBLSETOR_STATUSBAYAR <> 20
	AND TBLSETOR.TBLSETOR_REKJENIS = '$rekeningbwh'
	AND TBLSETOR.TBLSETOR_REKPAJAK = 4
	ORDER BY
	TBLSETOR_NOMORSSPD,
	TBLDAFTAR_NOPOK,
	TBLSETOR_REKPENDAPATAN,
	TBLSETOR_REKPAD,
	TBLSETOR_REKPAJAK,
	TBLSETOR_REKAYAT,
	TBLSETOR_REKJENIS,
	TBLKECAMATAN_IDBADANUSAHA,
	TBLKELURAHAN_IDBADANUSAHA";

	$data['kecilbawah'] = $kecilbawah = Yii::app()->db->createCommand($sqlkecilbawah)->queryAll();

	$this->renderPartial('cetakkecilbawah',array('data'=>$data));
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