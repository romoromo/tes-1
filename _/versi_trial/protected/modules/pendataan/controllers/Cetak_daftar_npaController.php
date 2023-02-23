<?php

class Cetak_daftar_npaController extends Controller
{
	public function init()
	{
		Yii::import('ext.LokalIndonesia');
	}

	public function actionIndex()
	{
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
		AND TBLREKENING_REKAYAT = 8
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

	public function actionCetakvol()
	{
		$data = array();
		header('Content-Type: application/excel');
			header("Content-Disposition: attachment;Filename=daftar-vol-tahunan.xls");
		$data['tahun_pajak'] = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$data['judul'] = $this->getJudul();
		$data['laporan'] = $this->getData();
		$this->renderPartial('cetak', array('data'=>$data));
	}
	public function actionCetakNPA()
	{
		$data = array();
		header('Content-Type: application/excel');
			header("Content-Disposition: attachment;Filename=daftar-npa-tahunan.xls");
		$data['tahun_pajak'] = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$data['judul'] = $this->getJudul();
		$data['laporan'] = $this->getData();
		$this->renderPartial('cetakNPA', array('data'=>$data));
	}
	public function actionCetakpajak()
	{
		$data = array();
		header('Content-Type: application/excel');
			header("Content-Disposition: attachment;Filename=daftar-pajak-tahunan.xls");
		$data['tahun_pajak'] = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$data['judul'] = $this->getJudul();
		$data['laporan'] = $this->getData();
		$this->renderPartial('cetakpajak', array('data'=>$data));
	}

	public function actioncari()
	{

		$data = array();
		$data['tahun_pajak'] = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$data['judul']='';
		$data['laporan'] = $this->getData();
		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '1':
				$namaTBL = 'TBLDAFTHOTEL';
				break;
			
			case '2':
				$namaTBL = 'TBLDAFTRMAKAN';
				break;
			
			case '3':
				$namaTBL = 'TBLDAFTHIBURAN';
				break;
			
			case '4':
				$namaTBL = 'TBLDAFTREKLAME';
				break;
			
			case '5':
				$namaTBL = 'TBLDAFTPARKIR';
				break;
			
			case '6':
				$namaTBL = 'TBLDAFTTANAH';
				break;
			
			case '7':
				$namaTBL = 'TBLDAFTBURUNG';
				break;

			case '8':
				$namaTBL = 'TBLDAFTTANAH';
				break;	
			
			default:
				$namaTBL = 'TBLDAFTHOTEL';
				break;
		}

		$data['namatbl'] = $namaTBL;
		$this->renderPartial('tabel', array('data'=>$data));

		
	}

	public function getJudul(){
		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '4.1.1.1.0':
				$namaTBL = 'TBLDAFTHOTEL';
				$data = 'PAJAK HOTEL';
				$AYAT = '1';
				break;
			
			case '4.1.1.2.0':
				$namaTBL = 'TBLDAFTRMAKAN';
				$data = 'PAJAK RESTORAN';
				$AYAT = '2';
				break;
			
			case '4.1.1.3.0':
				$namaTBL = 'TBLDAFTHIBURAN';
				$data = 'PAJAK HIBURAN';
				$AYAT = '3';
				break;
			
			case '4.1.1.4.0':
				$namaTBL = 'TBLDAFTREKLAME';
				$data = 'PAJAK REKLAME';
				$AYAT = '4';
				break;
			
			case '4.1.1.7.0':
				$namaTBL = 'TBLDAFTPARKIR';
				$data = 'PAJAK PARKIR';
				$AYAT = '7';
				break;
			
			case '4.1.1.8.0':
				$namaTBL = 'TBLDAFTTANAH';
				$data = 'PAJAK AIR TANAH';
				$AYAT = '8';
				break;
			
			case '4.1.1.9.0':
				$namaTBL = 'TBLDAFTBURUNG';
				$data = 'PAJAK SARANG BURUNG WALET';
				$AYAT = '9';
				break;
			
			default:
				$namaTBL = 'TBLDAFTHOTEL';
				break;
		}
		return $data;
	}

	public function getData()
	{
		$namaTBL = '';
		$tahunpjk = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$bulanpjk = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';

		$wherethnpajak = substr($tahunpjk, -2)!=0 ? (' AND TBLPENDATAAN_THNPAJAK='.substr($tahunpjk, -2)) : '';
		$whereblnpajak = $bulanpjk!=0 ? (' AND TBLPENDATAAN_BLNPAJAK='.$bulanpjk) : '';

		$rek = isset($_REQUEST['rekening']) && !empty($_REQUEST['rekening']) ? $_REQUEST['rekening'] : '';
		switch ( $rek ) {
			case '4.1.1.1.0':
				$namaTBL = 'TBLDAFTHOTEL';
				$data['judul'] = 'PAJAK HOTEL';
				$AYAT = '1';
				break;
			
			case '4.1.1.2.0':
				$namaTBL = 'TBLDAFTRMAKAN';
				$data['judul'] = 'PAJAK RESTORAN';
				$AYAT = '2';
				break;
			
			case '4.1.1.3.0':
				$namaTBL = 'TBLDAFTHIBURAN';
				$data['judul'] = 'PAJAK HIBURAN';
				$AYAT = '3';
				break;
			
			case '4.1.1.4.0':
				$namaTBL = 'TBLDAFTREKLAME';
				$data['judul'] = 'PAJAK REKLAME';
				$AYAT = '4';
				break;
			
			case '4.1.1.7.0':
				$namaTBL = 'TBLDAFTPARKIR';
				$data['judul'] = 'PAJAK PARKIR';
				$AYAT = '7';
				break;
			
			case '4.1.1.8.0':
				$namaTBL = 'TBLDAFTTANAH';
				$data['judul'] = 'PAJAK AIR TANAH';
				$AYAT = '8';
				break;
			
			case '4.1.1.9.0':
				$namaTBL = 'TBLDAFTBURUNG';
				$data['judul'] = 'PAJAK SARANG BURUNG WALET';
				$AYAT = '9';
				break;
			
			default:
				$namaTBL = 'TBLDAFTHOTEL';
				break;
		}
		$sql = "
		SELECT
		TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK
		,TBLDAFTAR.TBLDAFTAR_NOPOK
		,TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		,TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		,TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA
		,TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=1 THEN TBLDAFTTANAH_TOTALVOLUME ELSE 0 END) AS VOLJAN,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=1 THEN TBLDAFTTANAH_NILAIAIR1 ELSE 0 END) AS NPAJAN,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=1 THEN TBLDAFTTANAH_PAJAK ELSE 0 END) AS PAJAKJAN,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=2 THEN TBLDAFTTANAH_TOTALVOLUME ELSE 0 END) AS VOLFEB,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=2 THEN TBLDAFTTANAH_NILAIAIR1 ELSE 0 END) AS NPAFEB,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=2 THEN TBLDAFTTANAH_PAJAK ELSE 0 END) AS PAJAKFEB,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=3 THEN TBLDAFTTANAH_TOTALVOLUME ELSE 0 END) AS VOLMAR,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=3 THEN TBLDAFTTANAH_NILAIAIR1 ELSE 0 END) AS NPAMAR,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=3 THEN TBLDAFTTANAH_PAJAK ELSE 0 END) AS PAJAKMAR,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=4 THEN TBLDAFTTANAH_TOTALVOLUME ELSE 0 END) AS VOLAPR,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=4 THEN TBLDAFTTANAH_NILAIAIR1 ELSE 0 END) AS NPAAPR,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=4 THEN TBLDAFTTANAH_PAJAK ELSE 0 END) AS PAJAKAPR,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=5 THEN TBLDAFTTANAH_TOTALVOLUME ELSE 0 END) AS VOLMEI,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=5 THEN TBLDAFTTANAH_NILAIAIR1 ELSE 0 END) AS NPAMEI,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=5 THEN TBLDAFTTANAH_PAJAK ELSE 0 END) AS PAJAKMEI,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=6 THEN TBLDAFTTANAH_TOTALVOLUME ELSE 0 END) AS VOLJUN,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=6 THEN TBLDAFTTANAH_NILAIAIR1 ELSE 0 END) AS NPAJUN,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=6 THEN TBLDAFTTANAH_PAJAK ELSE 0 END) AS PAJAKJUN,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=7 THEN TBLDAFTTANAH_TOTALVOLUME ELSE 0 END) AS VOLJUL,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=7 THEN TBLDAFTTANAH_NILAIAIR1 ELSE 0 END) AS NPAJUL,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=7 THEN TBLDAFTTANAH_PAJAK ELSE 0 END) AS PAJAKJUL,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=8 THEN TBLDAFTTANAH_TOTALVOLUME ELSE 0 END) AS VOLAGT,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=8 THEN TBLDAFTTANAH_NILAIAIR1 ELSE 0 END) AS NPAAGT,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=8 THEN TBLDAFTTANAH_PAJAK ELSE 0 END) AS PAJAKAGT,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=9 THEN TBLDAFTTANAH_TOTALVOLUME ELSE 0 END) AS VOLSEP,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=9 THEN TBLDAFTTANAH_NILAIAIR1 ELSE 0 END) AS NPASEP,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=9 THEN TBLDAFTTANAH_PAJAK ELSE 0 END) AS PAJAKSEP,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=10 THEN TBLDAFTTANAH_TOTALVOLUME ELSE 0 END) AS VOLOKT,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=10 THEN TBLDAFTTANAH_NILAIAIR1 ELSE 0 END) AS NPAOKT,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=10 THEN TBLDAFTTANAH_PAJAK ELSE 0 END) AS PAJAKOKT,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=11 THEN TBLDAFTTANAH_TOTALVOLUME ELSE 0 END) AS VOLNOV,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=11 THEN TBLDAFTTANAH_NILAIAIR1 ELSE 0 END) AS NPANOV,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=11 THEN TBLDAFTTANAH_PAJAK ELSE 0 END) AS PAJAKNOV,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=12 THEN TBLDAFTTANAH_TOTALVOLUME ELSE 0 END) AS VOLDES,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=12 THEN TBLDAFTTANAH_NILAIAIR1 ELSE 0 END) AS NPADES,
		SUM(CASE WHEN TBLPENDATAAN_BLNPAJAK=12 THEN TBLDAFTTANAH_PAJAK ELSE 0 END) AS PAJAKDES
		
		FROM TBLDAFTAR
		Inner Join TBLDAFTTANAH ON TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTTANAH.TBLDAFTAR_NOPOK
		
		WHERE
		TBLDAFTTANAH_REKPENDAPATAN = 4
		AND TBLDAFTTANAH_REKPAD = 1
		AND TBLDAFTTANAH_REKPAJAK = 1
		AND TBLDAFTTANAH_REKAYAT = 8
		".$wherethnpajak."
		".$whereblnpajak."

		group by TBLDAFTAR.TBLDAFTAR_NOPOK
		,TBLDAFTTANAH.TBLPENDATAAN_THNPAJAK
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
}