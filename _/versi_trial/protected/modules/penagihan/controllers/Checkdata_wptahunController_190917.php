<?php

class Checkdata_wptahunController extends Controller
{
		public function actionIndex()
	{

		/*$data['jenis_pajak'] = Yii::app()->db->createCommand('SELECT * FROM "tblrek"  WHERE PJK = 1 AND PAD=1 AND JEN = 0  order by PEND,PAD,PJK,AYT,JEN
		');*/
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
		$nopok = $_REQUEST['TBLDAFTAR_NOPOK'];
		$data=array();
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

		$wherenopok = '';
		if (!empty($nopok)) {
			$wherenopok = ' AND "TBLDAFTAR".TBLDAFTAR_NOPOK = ' . $nopok;
		}

		$sql="SELECT
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
		TBLDAFTAR.TBLDAFTAR_NOPOK = ".$nopok;
		$data['wp'] = Yii::app()->db->createCommand( $sql )->queryRow();

		$data['hasil'] = $this->getData();

		$this->renderPartial('cetak', array('data'=>$data));
	}

		

	public function actioncari()
	{

		
		$data = array();
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

	public function getData(){
		$namaTBL = '';
		$masapajak_tahun = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
		$nopok = $_REQUEST['TBLDAFTAR_NOPOK'];
		$rek = $_REQUEST['rekening'];

		$wheremasapajak_tahun = '';
		if (!empty($masapajak_tahun)) {
			$wheremasapajak_tahun= ' AND TBLPENDATAAN_THNPAJAK = ' . substr($masapajak_tahun, -2);


			$wherenopok = '';
		if (!empty($nopok)) {
			$wherenopok = ' AND TBLDAFTAR.TBLDAFTAR_NOPOK = ' . $nopok;
		}

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

		$sql="SELECT
	$namaTBL.*, TBLDAFTAR.*, (
		SELECT
			SUM (TBLSETOR_RUPIAHSETOR) AS jumlah
		FROM
			TBLSETOR
		WHERE
			TBLSETOR.TBLDAFTAR_NOPOK = $namaTBL.TBLDAFTAR_NOPOK
		AND TBLSETOR.TBLPENDATAAN_THNPAJAK = $namaTBL.TBLPENDATAAN_THNPAJAK
		AND NVL (
			$namaTBL.TBLPENDATAAN_BLNPAJAK,
			0
		) = NVL (
			TBLSETOR.TBLPENDATAAN_BLNPAJAK,
			0
		)
		AND NVL (
			$namaTBL.TBLPENDATAAN_TGLPAJAK,
			0
		) = NVL (
			TBLSETOR.TBLPENDATAAN_TGLPAJAK,
			0
		)
		AND NVL (
			$namaTBL.TBLPENDATAAN_PAJAKKE,
			0
		) = NVL (TBLPENDATAAN_PAJAKKE, 0)
		AND (
			TBLSETOR_JNSKETETAPAN = 'A'
			OR TBLSETOR_JNSKETETAPAN = 'K'
			OR TBLSETOR_JNSKETETAPAN = 'a'
			OR TBLSETOR_JNSKETETAPAN = 'k'
		)
		GROUP BY
			TBLDAFTAR_NOPOK,
			TBLPENDATAAN_THNPAJAK,
			TBLPENDATAAN_BLNPAJAK
	) AS jumlah
FROM
	$namaTBL
INNER JOIN TBLDAFTAR ON $namaTBL.TBLDAFTAR_NOPOK = TBLDAFTAR.TBLDAFTAR_NOPOK
WHERE
	TBLDAFTAR.TBLDAFTAR_NOPOK <> 0
 $wheremasapajak_tahun
 $wherenopok
ORDER BY
	TBLPENDATAAN_THNPAJAK,
	TBLPENDATAAN_BLNPAJAK,
	TBLPENDATAAN_TGLPAJAK
	";
		return $data = Yii::app()->db->createCommand( $sql )->queryAll();
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
}