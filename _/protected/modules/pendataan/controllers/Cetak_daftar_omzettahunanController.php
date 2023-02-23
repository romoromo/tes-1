<?php

class Cetak_daftar_omzettahunanController extends Controller
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

	public function actionCetak()
	{
		$data = array();
		header('Content-Type: application/excel');
			header("Content-Disposition: attachment;Filename=daftar-omzet-tahunan.xls");
		$data['tahun_pajak'] = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? (int)$_REQUEST['TBLPENDATAAN_THNPAJAK'] : '';
		$data['judul'] = $this->getJudul();
		$data['laporan'] = $this->getData();
		$this->renderPartial('tabel', array('data'=>$data));
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
}