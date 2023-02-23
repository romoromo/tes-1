<?php

class Perforasi_pajakController extends Controller
{
	public function actionIndex()
	{
		$data['rek'] = Yii::app()->db->createCommand("
			SELECT
			*
			FROM
			TBLREKENING
			WHERE
			TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			AND TBLREKENING_REKAYAT <> 4
			AND TBLREKENING_REKAYAT <> 8
			AND TBLREKENING_REKAYAT <> 10
			AND TBLREKENING_REKAYAT <> 11
			AND TBLREKENING_REKAYAT <> 23
			AND TBLREKENING_KODE = '4.1.1.1.0'
			OR TBLREKENING_KODE = '4.1.1.2.0'
			OR TBLREKENING_KODE = '4.1.1.3.0'
			OR TBLREKENING_KODE = '4.1.1.7.0'
			ORDER BY
			TBLREKENING_REKPENDAPATAN,
			TBLREKENING_REKPAD,
			TBLREKENING_REKPAJAK,
			TBLREKENING_REKAYAT,
			TBLREKENING_REKJENIS
			")->queryAll();
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionautocomplete()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');
		
		$query = trim($_REQUEST['query']);

		$select = '*';
		$from = 'TBLDAFTAR';
		$filter = array(
			'LK__TBLDAFTAR_PEMILIKNAMA' => $query
			,'LK__TBLDAFTAR_NOPOK' => $query
		);

		$otherquery = array(
			'limit'=> 30
			,'order'=> 'TBLDAFTAR_NOPOK ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$results = DBFetch::query($arrayConfig);

		$suggestions = array();
		 
		foreach($results as $result)
		{
			$suggestions[] = array(
			"value" => $result['TBLDAFTAR_NOPOK']. ' | ' . $result['TBLDAFTAR_BADANUSAHANAMA']
			,"data" => $result['TBLDAFTAR_NOPOK']
			,"TBLDAFTAR_PEMILIKNAMA" => $result['TBLDAFTAR_PEMILIKNAMA']
			,"TBLDAFTAR_PEMILIKALAMAT" => $result['TBLDAFTAR_PEMILIKALAMAT']
			,"TBLDAFTAR_BADANUSAHANAMA" => $result['TBLDAFTAR_BADANUSAHANAMA']
			,"TBLDAFTAR_BADANUSAHAALAMAT" => $result['TBLDAFTAR_BADANUSAHAALAMAT']
			,"TBLDAFTAR_NOPOK" => $result['TBLDAFTAR_NOPOK']
			);
		}

		 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function actiongetdata()
	{
		$rekkode = $_POST['rekkode'];
		$tahun = $_POST['tahun'];
		$bln = $_POST['bln'];
		$nopok = $_POST['nopok'];
		$tglentri = $_POST['tglentri'];

		$select = '
		TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR_PEMILIKALAMAT';
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR_NOPOK' => $nopok
		);

		$otherquery = array(
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL');
		$data['wp'] = DBFetch::query($arrayConfig);

		echo CJSON::encode($data);
	}

	public function actionGetTabelnotabill()
	{
		$rekkode = $_POST['rekkode'];
		$tahun = $_POST['tahun'];
		$bln = $_POST['bln'];
		$nopok = $_POST['nopok'];
		$tglentri = $_POST['tglentri'];

		$thn = substr($tahun, -2);
		
		$select = '*';
		$from = 'TBLPERFORASI';
		$filter_AND = array(
			'EQ__NOPOK' => $nopok
			,'EQ__THP' => $thn
			,'EQ__BLP' => $bln
			,'EQ__ISNOTABILL' => 'T'
		);

		$otherquery = array(
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data['tabel'] = DBFetch::query($arrayConfig);

		$this->renderPartial('tabel_notabill',array('data'=>$data));
		
	}

	public function actionGetTabeltiket()
	{
		$rekkode = $_POST['rekkode'];
		$tahun = $_POST['tahun'];
		$bln = $_POST['bln'];
		$nopok = $_POST['nopok'];
		$tglentri = $_POST['tglentri'];

		$thn = substr($tahun, -2);
		
		$select = '*';
		$from = 'TBLPERFORASI';
		$filter_AND = array(
			'EQ__NOPOK' => $nopok
			,'EQ__THP' => $thn
			,'EQ__BLP' => $bln
			,'EQ__ISTIKET' => 'T'
		);

		$otherquery = array(
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data['tabel'] = DBFetch::query($arrayConfig);

		$this->renderPartial('tabel_tiket',array('data'=>$data));
		
	}

	public function actionSimpannota()
	{
		$rekkode = isset($_REQUEST['rekkode']) && !empty($_REQUEST['rekkode']) ? $_REQUEST['rekkode'] : 0;
		$tahun = isset($_REQUEST['tahun']) && !empty($_REQUEST['tahun']) ? $_REQUEST['tahun'] : 0;
		$bln = isset($_REQUEST['bln']) && !empty($_REQUEST['bln']) ? $_REQUEST['bln'] : 0;
		$nopok = isset($_REQUEST['nopok']) && !empty($_REQUEST['nopok']) ? $_REQUEST['nopok'] : 0;
		$tglentri = isset($_REQUEST['tglentri']) && !empty($_REQUEST['tglentri']) ? date('Y-m-d',strtotime($_REQUEST['tglentri'])) : '';
		
		$uraian_notabill = isset($_REQUEST['uraian_notabill']) && !empty($_REQUEST['uraian_notabill']) ? $_REQUEST['uraian_notabill'] : 0;
		$notabill_awal = isset($_REQUEST['notabill_awal']) && !empty($_REQUEST['notabill_awal']) ? $_REQUEST['notabill_awal'] : 0;
		$notabill_akhir = isset($_REQUEST['notabill_akhir']) && !empty($_REQUEST['notabill_akhir']) ? $_REQUEST['notabill_akhir'] : 0;
		$jumlah_buku = isset($_REQUEST['jumlah_buku']) && !empty($_REQUEST['jumlah_buku']) ? $_REQUEST['jumlah_buku'] : 0;
		$isi_perbuku = isset($_REQUEST['isi_perbuku']) && !empty($_REQUEST['isi_perbuku']) ? $_REQUEST['isi_perbuku'] : 0;
		$notabill_keterangan = isset($_REQUEST['notabill_keterangan']) && !empty($_REQUEST['notabill_keterangan']) ? $_REQUEST['notabill_keterangan'] : 0;

		$jum_lembar =($jumlah_buku*$isi_perbuku);

		$cmd = $_REQUEST['cmd'];
		$id = $_REQUEST['id'];

		$thn = substr($tahun, -2);

		$command = Yii::app()->db->createCommand();

		
				$arrayOfData = array(
				'THP'=>$thn,
				'BLP'=>$bln,
				'NOPOK'=>$nopok,
				'ISNOTABILL'=>'T',
				'URAIAN'=>$uraian_notabill,
				'TBLPERFORASI_AWAL'=>$notabill_awal,
				'TBLPERFORASI_AKHIR'=>$notabill_akhir,
				'JML_BUKU'=>$jumlah_buku,
				'ISI_PERBUKU'=>$isi_perbuku,
				'JML_LEMBAR'=>$jum_lembar,
				'KET'=>$notabill_keterangan,
				'SYS_INSERT'=>DMOrcl::getNow(),
				// TBLPERFORASI_ID
				// THP
				// BLP
				// HRP
				// NOPOK
				// BNAMA
				// BAL
				// ISNOTABILL
				// ISTIKET
				// NOPERFORASI
				// NO_URUT
				// URAIAN
				// TBLPERFORASI_AWAL
				// TBLPERFORASI_AKHIR
				// TIKET_KODE
				// TIKET_NILAI
				// JML_BUKU
				// ISI_PERBUKU
				// JML_LEMBAR
				// SYS_INSERT
				// KET
			);
			$simpan = $command->insert('TBLPERFORASI', $arrayOfData);
		
		
		
		if ($simpan) {
			echo CJSON::encode(array('pesan'=>'success'));
		}else{
			echo CJSON::encode(array('pesan'=>'failed'));
		}
	}

	public function actionSimpantiket()
	{
		$rekkode = isset($_REQUEST['rekkode']) && !empty($_REQUEST['rekkode']) ? $_REQUEST['rekkode'] : 0;
		$tahun = isset($_REQUEST['tahun']) && !empty($_REQUEST['tahun']) ? $_REQUEST['tahun'] : 0;
		$bln = isset($_REQUEST['bln']) && !empty($_REQUEST['bln']) ? $_REQUEST['bln'] : 0;
		$nopok = isset($_REQUEST['nopok']) && !empty($_REQUEST['nopok']) ? $_REQUEST['nopok'] : 0;
		$tglentri = isset($_REQUEST['tglentri']) && !empty($_REQUEST['tglentri']) ? date('Y-m-d',strtotime($_REQUEST['tglentri'])) : '';
		
		$uraian_tiket = isset($_REQUEST['uraian_tiket']) && !empty($_REQUEST['uraian_tiket']) ? $_REQUEST['uraian_tiket'] : 0;
		$tiket_awal = isset($_REQUEST['tiket_awal']) && !empty($_REQUEST['tiket_awal']) ? $_REQUEST['tiket_awal'] : 0;
		$tiket_akhir = isset($_REQUEST['tiket_akhir']) && !empty($_REQUEST['tiket_akhir']) ? $_REQUEST['tiket_akhir'] : 0;
		$tiket_kode = isset($_REQUEST['tiket_kode']) && !empty($_REQUEST['tiket_kode']) ? $_REQUEST['tiket_kode'] : 0;
		$tiket_nilai = isset($_REQUEST['angkarupiah']) && !empty($_REQUEST['angkarupiah']) ? $_REQUEST['angkarupiah'] : 0;
		$keterangan_tiket = isset($_REQUEST['keterangan_tiket']) && !empty($_REQUEST['keterangan_tiket']) ? $_REQUEST['keterangan_tiket'] : 0;


		$cmd = $_REQUEST['cmd'];
		$id = $_REQUEST['id'];

		$thn = substr($tahun, -2);

		$command = Yii::app()->db->createCommand();

		
				$arrayOfData = array(
				'THP'=>$thn,
				'BLP'=>$bln,
				'NOPOK'=>$nopok,
				'ISTIKET'=>'T',
				'URAIAN'=>$uraian_tiket,
				'TBLPERFORASI_AWAL'=>$tiket_awal,
				'TBLPERFORASI_AKHIR'=>$tiket_akhir,
				'TIKET_KODE'=>$tiket_kode,
				'TIKET_NILAI'=>$tiket_nilai,
				'KET'=>$keterangan_tiket,
				'SYS_INSERT'=>DMOrcl::getNow(),
				// TBLPERFORASI_ID
				// THP
				// BLP
				// HRP
				// NOPOK
				// BNAMA
				// BAL
				// ISNOTABILL
				// ISTIKET
				// NOPERFORASI
				// NO_URUT
				// URAIAN
				// TBLPERFORASI_AWAL
				// TBLPERFORASI_AKHIR
				// TIKET_KODE
				// TIKET_NILAI
				// JML_BUKU
				// ISI_PERBUKU
				// JML_LEMBAR
				// SYS_INSERT
				// KET
			);
			$simpan = $command->insert('TBLPERFORASI', $arrayOfData);
		
		
		
		if ($simpan) {
			echo CJSON::encode(array('pesan'=>'success'));
		}else{
			echo CJSON::encode(array('pesan'=>'failed'));
		}
	}

	public function dateformat($date)
	{
		return new CDbExpression("TO_DATE('" . $date.' 00:00:00' . "',  ' " . 'yyyy-mm-dd hh24:mi:ss' . " ') ");
	}

	public function actionGetrekening()
	{
		$kode = $_REQUEST['kode'];
		$model = Yii::app()->db->createCommand("
			SELECT * FROM TBLREKENING
			WHERE TBLREKENING_KODEFULL = '".$kode."' ")->queryRow();

		echo CJSON::encode($model);
	}

	public function getRekening($REFBADANUSAHA_ID='0')
	{
		$sql = "
		SELECT
		REFBADANUSAHA.REFBADANUSAHA_ID,
		REFBADANUSAHA.REFBADANUSAHA_NAMA,
		TBLREKENING.TBLREKENING_KODEFULL,
		TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
		TBLREKENING
		INNER JOIN REFBADANUSAHA ON TBLREKENING.TBLREKENING_REKPENDAPATAN = REFBADANUSAHA.REFBADANUSAHA_REKPENDAPATAN 
		AND TBLREKENING.TBLREKENING_REKPAD = REFBADANUSAHA.REFBADANUSAHA_REKPAD 
		AND TBLREKENING.TBLREKENING_REKPAJAK = REFBADANUSAHA.REFBADANUSAHA_REKPJK
		AND TBLREKENING.TBLREKENING_REKAYAT = REFBADANUSAHA.REFBADANUSAHA_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = REFBADANUSAHA.REFBADANUSAHA_REKJENIS
		WHERE REFBADANUSAHA_ID = '{$REFBADANUSAHA_ID}'
		";
		return $model = Yii::app()->db->createCommand( $sql )->queryRow();
	}

	public function actionGetTanggal()
	{
		$bln = $_REQUEST['bln'];
		$tahun = $_REQUEST['tahun'];

		if (empty($bln)) {
        $bln = date('m');
	    }
	    if (empty($tahun)) {
	      $tahun = date('Y');
	    }
	    $result1 = strtotime("{$tahun}-{$bln}-01");
	    $result = strtotime('-1 second', strtotime('+1 month', $result1));
	    $tanggalakhir = date('d-m-Y', $result);

	    if (empty($bln)) {
        $bln = date('m');
	    }
	    if (empty($tahun)) {
	      $tahun = date('Y');
	    }
	    $result = strtotime("{$tahun}-{$bln}-01");
	    $tanggalawal = date('d-m-Y', $result);

		echo CJSON::encode(array('tanggalawal'=>$tanggalawal,'tanggalakhir'=>$tanggalakhir));
	}
}