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

	public function actionGetDataHotel()
	{
		$id = $_POST['id'];
		
		$select = '*';
		$from = 'TBLMONITORING_HOTEL';
		$filter = array(
			'EQ__TBLMONITORING_HOTEL_ID' => $id
		);

		$otherquery = array(
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL');
		$data = DBFetch::query($arrayConfig);

		echo CJSON::encode($data);
	}

	public function actionGetDataHiburan()
	{
		$id = $_POST['id'];
		
		$select = '*';
		$from = 'TBLMONITORING_HIBURAN';
		$filter = array(
			'EQ__TBLMONITORING_HIBURAN_ID' => $id
		);

		$otherquery = array(
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL');
		$data = DBFetch::query($arrayConfig);

		echo CJSON::encode($data);
	}

	public function actionGetdataResto()
	{
		$thn = $_POST['tahun'];
		$bln = $_POST['bln'];
		$nopok = $_POST['nopok'];
		$tahun = substr($thn, -2);
		
		$select = '*';
		$from = 'TBLMONITORING_DETAIL';
		$filter_AND = array(
			'EQ__NOPOK' => $nopok
			,'EQ__THP' => $tahun
			,'EQ__BLP' => $bln
			
		);

		// $otherquery = array(
		// 	'ANDWHERE' => "to_char(TGL_MONITORING, 'mm')=".$bln
		// 	,'ANDWHERE' => "to_char(TGL_MONITORING, 'yyyy')=".$thn
		// );

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter_AND'=>$filter_AND,'filterOR'=>true,'mode'=>'DETAIL');
		$data = DBFetch::query($arrayConfig);

		echo CJSON::encode($data);
	}

	public function actionGetdetailHotel()
	{
		$thn = $_POST['tahun'];
		$bln = $_POST['bln'];
		$nopok = $_POST['nopok'];
		$tahun = substr($thn, -2);
		
		$select = '*';
		$from = 'TBLMONITORING_DETAIL';
		$filter_AND = array(
			'EQ__NOPOK' => $nopok
			,'EQ__THP' => $tahun
			,'EQ__BLP' => $bln
			
		);

		// $otherquery = array(
		// 	'ANDWHERE' => "to_char(TGL_MONITORING, 'mm')=".$bln
		// 	,'ANDWHERE' => "to_char(TGL_MONITORING, 'yyyy')=".$thn
		// );

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter_AND'=>$filter_AND,'filterOR'=>true,'mode'=>'DETAIL');
		$data = DBFetch::query($arrayConfig);

		echo CJSON::encode($data);
	}

	public function actionGetdetailHiburan()
	{
		$thn = $_POST['tahun'];
		$bln = $_POST['bln'];
		$nopok = $_POST['nopok'];
		$tahun = substr($thn, -2);
		
		$select = '*';
		$from = 'TBLMONITORING_DETAIL';
		$filter_AND = array(
			'EQ__NOPOK' => $nopok
			,'EQ__THP' => $tahun
			,'EQ__BLP' => $bln
			
		);

		// $otherquery = array(
		// 	'ANDWHERE' => "to_char(TGL_MONITORING, 'mm')=".$bln
		// 	,'ANDWHERE' => "to_char(TGL_MONITORING, 'yyyy')=".$thn
		// );

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter_AND'=>$filter_AND,'filterOR'=>true,'mode'=>'DETAIL');
		$data = DBFetch::query($arrayConfig);

		echo CJSON::encode($data);
	}

	public function actionGetTabelHotel()
	{
		$rekkode = $_POST['rekkode'];
		$tahun = $_POST['tahun'];
		$bln = $_POST['bln'];
		$nopok = $_POST['nopok'];
		$tglentri = $_POST['tglentri'];

		$thn = substr($tahun, -2);
		
		$select = '*';
		$from = 'TBLMONITORING_HOTEL';
		$filter_AND = array(
			'EQ__NOPOK' => $nopok
			,'EQ__THP' => $thn
			,'EQ__BLP' => $bln
		);

		$otherquery = array(
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data['tabel'] = DBFetch::query($arrayConfig);


		if ($rekkode==1) {
			$this->renderPartial('tabel_hotel',array('data'=>$data));
		}
	}

	public function actionGetTabelHiburan()
	{
		$rekkode = $_POST['rekkode'];
		$tahun = $_POST['tahun'];
		$bln = $_POST['bln'];
		$nopok = $_POST['nopok'];
		$tglentri = $_POST['tglentri'];;

		$thn = substr($tahun, -2);
		
		$select = '*';
		$from = 'TBLMONITORING_HIBURAN';
		$filter_AND = array(
			'EQ__NOPOK' => $nopok
			,'EQ__THP' => $thn
			,'EQ__BLP' => $bln
		);

		$otherquery = array(
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data['tabel'] = DBFetch::query($arrayConfig);


		if ($rekkode==3) {
			$this->renderPartial('tabel_hiburan',array('data'=>$data));
		}
	}

	

	public function actionSimpanKamarHotel()
	{
		$rekkode = isset($_REQUEST['rekkode']) && !empty($_REQUEST['rekkode']) ? $_REQUEST['rekkode'] : 0;
		$tahun = isset($_REQUEST['tahun']) && !empty($_REQUEST['tahun']) ? $_REQUEST['tahun'] : 0;
		$bln = isset($_REQUEST['bln']) && !empty($_REQUEST['bln']) ? $_REQUEST['bln'] : 0;
		$nopok = isset($_REQUEST['nopok']) && !empty($_REQUEST['nopok']) ? $_REQUEST['nopok'] : 0;
		$tglentri = isset($_REQUEST['tglentri']) && !empty($_REQUEST['tglentri']) ? date('Y-m-d',strtotime($_REQUEST['tglentri'])) : '';
		$tglawal = isset($_REQUEST['tglawal']) && !empty($_REQUEST['tglawal']) ? date('Y-m-d',strtotime($_REQUEST['tglawal'])) : '';
		$tglakhir = isset($_REQUEST['tglakhir']) && !empty($_REQUEST['tglakhir']) ? date('Y-m-d',strtotime($_REQUEST['tglakhir'])) : '';

		$klasifikasi = isset($_REQUEST['klasifikasi_hotel']) && !empty($_REQUEST['klasifikasi_hotel']) ? $_REQUEST['klasifikasi_hotel'] : 0;
		$tarif = isset($_REQUEST['tarif_hotel']) && !empty($_REQUEST['tarif_hotel']) ? $_REQUEST['tarif_hotel'] : 0;
		$jumlah_kamar = isset($_REQUEST['jumlah_kamar_hotel']) && !empty($_REQUEST['jumlah_kamar_hotel']) ? $_REQUEST['jumlah_kamar_hotel'] : 0;
		$tersedia = isset($_REQUEST['tersedia']) && !empty($_REQUEST['tersedia']) ? $_REQUEST['tersedia'] : 0;
		$terjual = isset($_REQUEST['terjual']) && !empty($_REQUEST['terjual']) ? $_REQUEST['terjual'] : 0;

		$occu = ($terjual/$tersedia)*100;

		$cmd = $_REQUEST['cmd'];
		$id = $_REQUEST['id'];

		$thn = substr($tahun, -2);

		$command = Yii::app()->db->createCommand();

		if ($cmd=='tambah') {
				$arrayOfData = array(
				'THP'=>$thn,
				'BLP'=>$bln,
				'NOPOK'=>$nopok,
				'TGL_MONITORING'=>$this->dateformat($tglentri),
				'TGL_AWAL'=>$this->dateformat($tglawal),
				'TGL_AKHIR'=>$this->dateformat($tglakhir),
				'ID_KLASIFIKASI_KMR'=>$this->getidklasifikasi($tahun,$bln,$nopok),
				'KLASIFIKASI_KMR'=>$klasifikasi,
				'TARIF_KMR'=>LokalIndonesia::toAngka($tarif),
				'JUMLAH_KMR'=>$jumlah_kamar,
				'JUMLAH_TERSEDIA'=>$tersedia,
				'JUMLAH_TERJUAL'=>$terjual,
				'OCCUPANCY'=>number_format($occu,2,".","."),
				// 'KETERANGAN'=>'',
				// 'TBLPEJABAT_ID'=>'',
				// 'NO_IJIN_USAHA'=>'',
				// 'TGL_IJIN_USAHA'=>'',
				// 'BATAS_IJIN'=>'',
				// 'TTD_IJIN'=>'',
				'TGL_INSERT'=>DMOrcl::getNow(),
				// 'TGL_UPDATE'=>'',
				// 'LOGIN_INSERT'=>'',
				// 'LOGIN_UPDATE'=>'',
			);
			$simpan = $command->insert('TBLMONITORING_HOTEL', $arrayOfData);
		} else {
			$arrayOfData = array(
				'THP'=>$thn,
				'BLP'=>$bln,
				'NOPOK'=>$nopok,
				'TGL_MONITORING'=>$this->dateformat($tglentri),
				'TGL_AWAL'=>$this->dateformat($tglawal),
				'TGL_AKHIR'=>$this->dateformat($tglakhir),
				'KLASIFIKASI_KMR'=>$klasifikasi,
				'TARIF_KMR'=>LokalIndonesia::toAngka($tarif),
				'JUMLAH_KMR'=>$jumlah_kamar,
				'JUMLAH_TERSEDIA'=>$tersedia,
				'JUMLAH_TERJUAL'=>$terjual,
				'OCCUPANCY'=>number_format($occu,2,".","."),
				// 'KETERANGAN'=>'',
				// 'TBLPEJABAT_ID'=>'',
				// 'NO_IJIN_USAHA'=>'',
				// 'TGL_IJIN_USAHA'=>'',
				// 'BATAS_IJIN'=>'',
				// 'TTD_IJIN'=>'',
				// 'TGL_INSERT'=>DMOrcl::getNow(),
				'TGL_UPDATE'=>DMOrcl::getNow(),
				// 'LOGIN_INSERT'=>'',
				// 'LOGIN_UPDATE'=>'',
			);
			$simpan = $command->update('TBLMONITORING_HOTEL', $arrayOfData ,'TBLMONITORING_HOTEL_ID =:ID',array(':ID' => $id));
		}
		
		
		if ($simpan) {
			echo CJSON::encode(array('pesan'=>'success'));
		}else{
			echo CJSON::encode(array('pesan'=>'failed'));
		}
	}

	public function actionSimpanKamarHiburan()
	{
		$rekkode = isset($_REQUEST['rekkode']) && !empty($_REQUEST['rekkode']) ? $_REQUEST['rekkode'] : 0;
		$tahun = isset($_REQUEST['tahun']) && !empty($_REQUEST['tahun']) ? $_REQUEST['tahun'] : 0;
		$bln = isset($_REQUEST['bln']) && !empty($_REQUEST['bln']) ? $_REQUEST['bln'] : 0;
		$nopok = isset($_REQUEST['nopok']) && !empty($_REQUEST['nopok']) ? $_REQUEST['nopok'] : 0;
		$tglentri = isset($_REQUEST['tglentri']) && !empty($_REQUEST['tglentri']) ? date('Y-m-d',strtotime($_REQUEST['tglentri'])) : '';
		$tglawal = isset($_REQUEST['tglawal']) && !empty($_REQUEST['tglawal']) ? date('Y-m-d',strtotime($_REQUEST['tglawal'])) : '';
		$tglakhir = isset($_REQUEST['tglakhir']) && !empty($_REQUEST['tglakhir']) ? date('Y-m-d',strtotime($_REQUEST['tglakhir'])) : '';

		$klasifikasi = isset($_REQUEST['klasifikasi_hiburan']) && !empty($_REQUEST['klasifikasi_hiburan']) ? $_REQUEST['klasifikasi_hiburan'] : 0;
		$jumlah_kamar = isset($_REQUEST['jumlah_kamar_hiburan']) && !empty($_REQUEST['jumlah_kamar_hiburan']) ? $_REQUEST['jumlah_kamar_hiburan'] : 0;
		$tarif = isset($_REQUEST['tarif_hiburan']) && !empty($_REQUEST['tarif_hiburan']) ? $_REQUEST['tarif_hiburan'] : 0;
		$keterangan = isset($_REQUEST['keterangan_hiburan']) && !empty($_REQUEST['keterangan_hiburan']) ? $_REQUEST['keterangan_hiburan'] : 0;

		$cmd = $_REQUEST['cmd'];
		$id = $_REQUEST['id'];

		$thn = substr($tahun, -2);

		$command = Yii::app()->db->createCommand();

		if ($cmd=='tambah') {
				$arrayOfData = array(
				'THP'=>$thn,
				'BLP'=>$bln,
				'NOPOK'=>$nopok,
				'TGL_MONITORING'=>$this->dateformat($tglentri),
				'TGL_AWAL'=>$this->dateformat($tglawal),
				'TGL_AKHIR'=>$this->dateformat($tglakhir),
				'ID_KLASIFIKASI_KMR'=>$this->getidklasifikasi($tahun,$bln,$nopok),
				'KLASIFIKASI_KMR'=>$klasifikasi,
				'TARIF_KMR'=>LokalIndonesia::toAngka($tarif),
				'JML_KMR'=>$jumlah_kamar,
				'KETERANGAN'=>$keterangan,
				// 'TBLPEJABAT_ID'=>'',
				// 'NO_IJIN_USAHA'=>'',
				// 'TGL_IJIN_USAHA'=>'',
				// 'BATAS_IJIN'=>'',
				// 'TTD_IJIN'=>'',
				'TGL_INSERT'=>DMOrcl::getNow(),
				// 'TGL_UPDATE'=>'',
				// 'LOGIN_INSERT'=>'',
				// 'LOGIN_UPDATE'=>'',
			);
			$simpan = $command->insert('TBLMONITORING_HIBURAN', $arrayOfData);
		} else {
			$arrayOfData = array(
				'THP'=>$thn,
				'BLP'=>$bln,
				'NOPOK'=>$nopok,
				'TGL_MONITORING'=>$this->dateformat($tglentri),
				'TGL_AWAL'=>$this->dateformat($tglawal),
				'TGL_AKHIR'=>$this->dateformat($tglakhir),
				'KLASIFIKASI_KMR'=>$klasifikasi,
				'TARIF_KMR'=>LokalIndonesia::toAngka($tarif),
				'JML_KMR'=>$jumlah_kamar,
				'KETERANGAN'=>$keterangan,
				// 'TBLPEJABAT_ID'=>'',
				// 'NO_IJIN_USAHA'=>'',
				// 'TGL_IJIN_USAHA'=>'',
				// 'BATAS_IJIN'=>'',
				// 'TTD_IJIN'=>'',
				// 'TGL_INSERT'=>DMOrcl::getNow(),
				'TGL_UPDATE'=>DMOrcl::getNow(),
				// 'LOGIN_INSERT'=>'',
				// 'LOGIN_UPDATE'=>'',
			);
			$simpan = $command->update('TBLMONITORING_HIBURAN', $arrayOfData ,'TBLMONITORING_HIBURAN_ID =:ID',array(':ID' => $id));
		}
		
		
		if ($simpan) {
			echo CJSON::encode(array('pesan'=>'success'));
		}else{
			echo CJSON::encode(array('pesan'=>'failed'));
		}
	}

	public function actionSimpanDetailResto()
	{
		$rekkode = isset($_REQUEST['rekkode']) && !empty($_REQUEST['rekkode']) ? $_REQUEST['rekkode'] : 0;
		$tahun = isset($_REQUEST['tahun']) && !empty($_REQUEST['tahun']) ? $_REQUEST['tahun'] : 0;
		$bln = isset($_REQUEST['bln']) && !empty($_REQUEST['bln']) ? $_REQUEST['bln'] : 0;
		$nopok = isset($_REQUEST['nopok']) && !empty($_REQUEST['nopok']) ? $_REQUEST['nopok'] : 0;
		$tglentri = isset($_REQUEST['tglentri']) && !empty($_REQUEST['tglentri']) ? date('Y-m-d',strtotime($_REQUEST['tglentri'])) : '';
		$tglawal = isset($_REQUEST['tglawal']) && !empty($_REQUEST['tglawal']) ? date('Y-m-d',strtotime($_REQUEST['tglawal'])) : '';
		$tglakhir = isset($_REQUEST['tglakhir']) && !empty($_REQUEST['tglakhir']) ? date('Y-m-d',strtotime($_REQUEST['tglakhir'])) : '';

		$jam_monitoring_awal = $_POST['jam_monitoring_awal'];
		$jam_monitoring_akhir = $_POST['jam_monitoring_akhir'];
		$jumlah_meja = $_POST['jumlah_meja'];
		$jumlah_kursi = $_POST['jumlah_kursi'];
		$makanan = $_POST['makanan'];
		$minuman = $_POST['minuman'];
		$jam_buka = strval($_POST['jam_buka_resto']);
		$jam_tutup = strval($_POST['jam_tutup_resto']);
		$jumlah_saat_ramai = $_POST['jumlah_saat_ramai_resto'];
		$jumlah_saat_normal = $_POST['jumlah_saat_normal_resto'];
		$jumlah_saat_sepi = $_POST['jumlah_saat_sepi_resto'];
		$jumlah_rata = $_POST['jumlah_rata_resto'];
		$omzet_harian = $_POST['omzet_harian_resto'];
		$jumlah_konsumen_monitoring = $_POST['jumlah_konsumen_monitoring'];
		$jumlah_pegawai = $_POST['jumlah_pegawai_resto'];
		$thn = substr($tahun, -2);

		$command = Yii::app()->db->createCommand();
		// if ($cmd=='tambah') {
		$arrayOfData = array(
			'NOPOK'=>$nopok,
			'TGL_MONITORING'=>$this->dateformat($tglentri),
			'TGL_AWAL'=>$this->dateformat($tglawal),
			'TGL_AKHIR'=>$this->dateformat($tglakhir),
			'JML_MEJA'=>$jumlah_meja,
			'JML_KURSI'=>$jumlah_kursi,
			'TARIF_MAKANAN'=>LokalIndonesia::toAngka($makanan),
			'TARIF_MINUMAN'=>LokalIndonesia::toAngka($minuman),
			'JAM_BUKA'=>$jam_buka,
			'JAM_TUTUP'=>$jam_tutup,
			'JML_KONSUMEN_RAMAI'=>$jumlah_saat_ramai,
			'JML_KONSUMEN_NORMAL'=>$jumlah_saat_normal,
			'JML_KONSUMEN_SEPI'=>$jumlah_saat_sepi,
			'JML_KONSUMEN_RATA'=>$jumlah_rata,
			'JML_OMZET'=>LokalIndonesia::toAngka($omzet_harian),
			'JAM_MONITORING_AWAL'=>$jam_monitoring_awal,
			'JAM_MONITORING_AKHIR'=>$jam_monitoring_akhir,
			'JML_KONSUMEN_REALTIME'=>$jumlah_konsumen_monitoring,
			'JML_PEGAWAI'=>$jumlah_pegawai,
			'THP'=>$thn,
			'BLP'=>$bln
			// 'TBLPEJABAT_ID'=>'',
			// 'TGL_INSERT'=>'',
			// 'TGL_UPDATE'=>'',
			// 'LOGIN_INSERT'=>'',
			// 'LOGIN_UPDATE'=>'',
		);
		$simpan = $command->insert('TBLMONITORING_DETAIL', $arrayOfData);
		/*} else {
			$arrayOfData = array(
				'THP'=>$tahun,
				'BLP'=>$bln,
				'NOPOK'=>$nopok,
				'TGL_MONITORING'=>$this->dateformat($tglawal),
				'TGL_AWAL'=>$this->dateformat($tglawal),
				'TGL_AKHIR'=>$this->dateformat($tglakhir),
				'KLASIFIKASI_KMR'=>$klasifikasi,
				'TARIF_KMR'=>$tarif,
				'JUMLAH_KMR'=>$jumlah_kamar,
				'JUMLAH_TERSEDIA'=>$tersedia,
				'JUMLAH_TERJUAL'=>$terjual,
				'OCCUPANCY'=>($terjual/$jumlah_kamar)*100,
			);
			$simpan = $command->update('TBLMONITORING_HOTEL', $arrayOfData ,'TBLMONITORING_HOTEL_ID =:ID',array(':ID' => $id));
		}*/
		
		
		if ($simpan) {
			echo CJSON::encode(array('pesan'=>'success'));
		}else{
			echo CJSON::encode(array('pesan'=>'failed'));
		}
	}

	public function actionSimpanDetailHotel()
	{
		$rekkode = isset($_REQUEST['rekkode']) && !empty($_REQUEST['rekkode']) ? $_REQUEST['rekkode'] : 0;
		$tahun = isset($_REQUEST['tahun']) && !empty($_REQUEST['tahun']) ? $_REQUEST['tahun'] : 0;
		$bln = isset($_REQUEST['bln']) && !empty($_REQUEST['bln']) ? $_REQUEST['bln'] : 0;
		$nopok = isset($_REQUEST['nopok']) && !empty($_REQUEST['nopok']) ? $_REQUEST['nopok'] : 0;
		$tglentri = isset($_REQUEST['tglentri']) && !empty($_REQUEST['tglentri']) ? date('Y-m-d',strtotime($_REQUEST['tglentri'])) : '';
		$tglawal = isset($_REQUEST['tglawal']) && !empty($_REQUEST['tglawal']) ? date('Y-m-d',strtotime($_REQUEST['tglawal'])) : '';
		$tglakhir = isset($_REQUEST['tglakhir']) && !empty($_REQUEST['tglakhir']) ? date('Y-m-d',strtotime($_REQUEST['tglakhir'])) : '';

		$jumlah_saat_ramai = $_POST['jumlah_saat_ramai_hotel'];
		$jumlah_saat_normal = $_POST['jumlah_saat_normal_hotel'];
		$jumlah_saat_sepi = $_POST['jumlah_saat_sepi_hotel'];
		$jumlah_rata = $_POST['jumlah_rata_hotel'];
		$omzet_harian = $_POST['omzet_harian_hotel'];
		$jumlah_pegawai = $_POST['jumlah_pegawai_hotel'];
		$thn = substr($tahun, -2);

		$command = Yii::app()->db->createCommand();
		// if ($cmd=='tambah') {
		$arrayOfData = array(
			'NOPOK'=>$nopok,
			'TGL_MONITORING'=>$this->dateformat($tglentri),
			'TGL_AWAL'=>$this->dateformat($tglawal),
			'TGL_AKHIR'=>$this->dateformat($tglakhir),
			'JML_MEJA'=>'',
			'JML_KURSI'=>'',
			'TARIF_MAKANAN'=>'',
			'TARIF_MINUMAN'=>'',
			'JAM_BUKA'=>'',
			'JAM_TUTUP'=>'',
			'JML_KONSUMEN_RAMAI'=>$jumlah_saat_ramai,
			'JML_KONSUMEN_NORMAL'=>$jumlah_saat_normal,
			'JML_KONSUMEN_SEPI'=>$jumlah_saat_sepi,
			'JML_KONSUMEN_RATA'=>$jumlah_rata,
			'JML_OMZET'=>LokalIndonesia::toAngka($omzet_harian),
			'JAM_MONITORING_AWAL'=>'',
			'JAM_MONITORING_AKHIR'=>'',
			'JML_KONSUMEN_REALTIME'=>'',
			'JML_PEGAWAI'=>$jumlah_pegawai,
			'THP'=>$thn,
			'BLP'=>$bln,
			'NO_IJIN_USAHA'=>'',
			'TGL_IJIN_USAHA'=>'',
			'BATAS_IJIN'=>'',
			'TTD_IJIN'=>'',
			'JENIS'=>'',
			'IS_TIKET'=>'',
			'IS_MEMBER'=>'',
			'TARIF_MEMBER'=>'',
			'CARA_PEMBAYARAN'=>'',
			'LUAS'=>'',
			'JML_MEMBER'=>''
			// 'TBLPEJABAT_ID'=>'',
			// 'TGL_INSERT'=>'',
			// 'TGL_UPDATE'=>'',
			// 'LOGIN_INSERT'=>'',
			// 'LOGIN_UPDATE'=>'',
		);
		$simpan = $command->insert('TBLMONITORING_DETAIL', $arrayOfData);
		/*} else {
			$arrayOfData = array(
				'THP'=>$tahun,
				'BLP'=>$bln,
				'NOPOK'=>$nopok,
				'TGL_MONITORING'=>$this->dateformat($tglawal),
				'TGL_AWAL'=>$this->dateformat($tglawal),
				'TGL_AKHIR'=>$this->dateformat($tglakhir),
				'KLASIFIKASI_KMR'=>$klasifikasi,
				'TARIF_KMR'=>$tarif,
				'JUMLAH_KMR'=>$jumlah_kamar,
				'JUMLAH_TERSEDIA'=>$tersedia,
				'JUMLAH_TERJUAL'=>$terjual,
				'OCCUPANCY'=>($terjual/$jumlah_kamar)*100,
			);
			$simpan = $command->update('TBLMONITORING_HOTEL', $arrayOfData ,'TBLMONITORING_HOTEL_ID =:ID',array(':ID' => $id));
		}*/
		
		
		if ($simpan) {
			echo CJSON::encode(array('pesan'=>'success'));
		}else{
			echo CJSON::encode(array('pesan'=>'failed'));
		}
	}

	public function actionSimpanDetailHiburan()
	{
		$rekkode = isset($_REQUEST['rekkode']) && !empty($_REQUEST['rekkode']) ? $_REQUEST['rekkode'] : 0;
		$tahun = isset($_REQUEST['tahun']) && !empty($_REQUEST['tahun']) ? $_REQUEST['tahun'] : 0;
		$bln = isset($_REQUEST['bln']) && !empty($_REQUEST['bln']) ? $_REQUEST['bln'] : 0;
		$nopok = isset($_REQUEST['nopok']) && !empty($_REQUEST['nopok']) ? $_REQUEST['nopok'] : 0;
		$tglentri = isset($_REQUEST['tglentri']) && !empty($_REQUEST['tglentri']) ? date('Y-m-d',strtotime($_REQUEST['tglentri'])) : '';
		$tglawal = isset($_REQUEST['tglawal']) && !empty($_REQUEST['tglawal']) ? date('Y-m-d',strtotime($_REQUEST['tglawal'])) : '';
		$tglakhir = isset($_REQUEST['tglakhir']) && !empty($_REQUEST['tglakhir']) ? date('Y-m-d',strtotime($_REQUEST['tglakhir'])) : '';

		$status_tiket = isset($_REQUEST['status_tiket']) && !empty($_REQUEST['status_tiket']) ? $_REQUEST['status_tiket'] : '';
		$status_member = isset($_REQUEST['status_member']) && !empty($_REQUEST['status_member']) ? $_REQUEST['status_member'] : '';

		$jenis_hiburan = strval($_POST['jenis_hiburan']);
		$jam_buka = strval($_POST['jam_buka_hiburan']);
		$jam_tutup = strval($_POST['jam_tutup_hiburan']);
		$jumlah_saat_ramai = $_POST['jumlah_saat_ramai_hiburan'];
		$jumlah_saat_normal = $_POST['jumlah_saat_normal_hiburan'];
		$jumlah_saat_sepi = $_POST['jumlah_saat_sepi_hiburan'];
		$jumlah_rata = $_POST['jumlah_rata_hiburan'];



		$jumlah_member = $_POST['jumlah_member'];
		$tarif_member = $_POST['tarif_member'];
		$sistem_pembayaran = $_POST['sistem_pembayaran'];

		$omzet_bulanan = $_POST['omzet_bulanan_hiburan'];
		$jumlah_pegawai = $_POST['jumlah_pegawai_hiburan'];
		$thn = substr($tahun, -2);

		$command = Yii::app()->db->createCommand();
		// if ($cmd=='tambah') {
		$arrayOfData = array(
			'NOPOK'=>$nopok,
			'TGL_MONITORING'=>$this->dateformat($tglentri),
			'TGL_AWAL'=>$this->dateformat($tglawal),
			'TGL_AKHIR'=>$this->dateformat($tglakhir),
			'JML_MEJA'=>'',
			'JML_KURSI'=>'',
			'TARIF_MAKANAN'=>'',
			'TARIF_MINUMAN'=>'',
			'JAM_BUKA'=>$jam_buka,
			'JAM_TUTUP'=>$jam_tutup,
			'JML_KONSUMEN_RAMAI'=>$jumlah_saat_ramai,
			'JML_KONSUMEN_NORMAL'=>$jumlah_saat_normal,
			'JML_KONSUMEN_SEPI'=>$jumlah_saat_sepi,
			'JML_KONSUMEN_RATA'=>$jumlah_rata,
			'JML_OMZET'=>LokalIndonesia::toAngka($omzet_bulanan),
			'JAM_MONITORING_AWAL'=>'',
			'JAM_MONITORING_AKHIR'=>'',
			'JML_KONSUMEN_REALTIME'=>'',
			'JML_PEGAWAI'=>$jumlah_pegawai,
			'THP'=>$thn,
			'BLP'=>$bln,
			'NO_IJIN_USAHA'=>'',
			'TGL_IJIN_USAHA'=>'',
			'BATAS_IJIN'=>'',
			'TTD_IJIN'=>'',
			'JENIS'=>$jenis_hiburan,
			'IS_TIKET'=>$status_tiket,
			'IS_MEMBER'=>$status_member,
			'TARIF_MEMBER'=>LokalIndonesia::toAngka($tarif_member),
			'CARA_PEMBAYARAN'=>$sistem_pembayaran,
			'LUAS'=>'',
			'JML_MEMBER'=>$jumlah_member
			// 'TBLPEJABAT_ID'=>'',
			// 'TGL_INSERT'=>'',
			// 'TGL_UPDATE'=>'',
			// 'LOGIN_INSERT'=>'',
			// 'LOGIN_UPDATE'=>'',
		);
		$simpan = $command->insert('TBLMONITORING_DETAIL', $arrayOfData);
		/*} else {
			$arrayOfData = array(
				'THP'=>$tahun,
				'BLP'=>$bln,
				'NOPOK'=>$nopok,
				'TGL_MONITORING'=>$this->dateformat($tglawal),
				'TGL_AWAL'=>$this->dateformat($tglawal),
				'TGL_AKHIR'=>$this->dateformat($tglakhir),
				'KLASIFIKASI_KMR'=>$klasifikasi,
				'TARIF_KMR'=>$tarif,
				'JUMLAH_KMR'=>$jumlah_kamar,
				'JUMLAH_TERSEDIA'=>$tersedia,
				'JUMLAH_TERJUAL'=>$terjual,
				'OCCUPANCY'=>($terjual/$jumlah_kamar)*100,
			);
			$simpan = $command->update('TBLMONITORING_HOTEL', $arrayOfData ,'TBLMONITORING_HOTEL_ID =:ID',array(':ID' => $id));
		}*/
		
		
		if ($simpan) {
			echo CJSON::encode(array('pesan'=>'success'));
		}else{
			echo CJSON::encode(array('pesan'=>'failed'));
		}
	}

	public function getidklasifikasi($thp,$blp,$nopok)
	{
		$count = Yii::app()->db->createCommand("
			SELECT MAX(ID_KLASIFIKASI_KMR) FROM TBLMONITORING_HOTEL
			WHERE THP = '".$thp."' AND BLP = '".$blp."' AND NOPOK = '".$nopok."' ")->queryScalar();
		return $count+1;
	}

	public function actionHapusKamarHotel()
	{
		$id = $_POST['id'];

		$del = Yii::app()->db->createCommand()->delete('TBLMONITORING_HOTEL', '
			TBLMONITORING_HOTEL_ID =:ID
		', array(
			':ID'=>$id
		));

		if ($del) {
			echo CJSON::encode(array('pesan'=>'success'));
		} else {
			echo CJSON::encode(array('pesan'=>'false'));
		}
	}

	public function actionHapusKamarHiburan()
	{
		$id = $_POST['id'];

		$del = Yii::app()->db->createCommand()->delete('TBLMONITORING_HIBURAN', '
			TBLMONITORING_HIBURAN_ID =:ID
		', array(
			':ID'=>$id
		));

		if ($del) {
			echo CJSON::encode(array('pesan'=>'success'));
		} else {
			echo CJSON::encode(array('pesan'=>'false'));
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