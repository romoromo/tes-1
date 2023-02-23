<?php

class Cetak_reklame_jatuhtempoController extends Controller
{
	public function actionIndex()
	{
		$data['kecamatan'] = Kecamatan::model()->findAll();
		$data['rek'] = Yii::app()->db->createCommand()
						->select('*')
						->from('TREKENING')
						->where('TREKENING_LEVEL=0')
						->queryAll();
		$data['kd_jalan'] = Yii::app()->db->createCommand()
						->select('*')
						->from('RREKJALAN')
						->queryAll();
		// $data['sub_rek'] = Yii::app()->db->createCommand()
		// 				->select('*')
		// 				->from('TREKENING')
		// 				->where('TREKENING_LEVEL=1')
		// 				->queryAll();
		$this->renderPartial('index', array('data'=>$data));
	}


	public function actioncetak()
	{
		$tahun_pajak = isset($_REQUEST['tahun_pajak']) ? $_REQUEST['tahun_pajak'] : "" ;
		$bulan_pajak = isset($_REQUEST['bulan_pajak']) ? $_REQUEST['bulan_pajak'] : "" ;
		$tanggal_pajak = isset($_REQUEST['tanggal_pajak']) ? $_REQUEST['tanggal_pajak'] : "" ;
		$rekening = isset($_REQUEST['rekening']) ? $_REQUEST['rekening'] : "" ;
		$tahun_entryspt = isset($_REQUEST['tahun_entryspt']) ? $_REQUEST['tahun_entryspt'] : "" ;
		$bulan_entryspt = isset($_REQUEST['bulan_entryspt']) ? $_REQUEST['bulan_entryspt'] : "" ;
		$tanggal_entryspt = isset($_REQUEST['tanggal_entryspt']) ? $_REQUEST['tanggal_entryspt'] : "" ;
		$id_kecamatan = isset($_REQUEST['id_kecamatan']) ? $_REQUEST['id_kecamatan'] : "" ;
		$kode_jalan = isset($_REQUEST['kode_jalan']) ? $_REQUEST['kode_jalan'] : "" ;
		$penetapan = isset($_REQUEST['penetapan']) ? $_REQUEST['penetapan'] : "" ;
		$jenis_pajak = isset($_REQUEST['jenis_pajak']) ? $_REQUEST['jenis_pajak'] : "" ;
		$sub_jenis_pajak = isset($_REQUEST['sub_jenis_pajak']) ? $_REQUEST['sub_jenis_pajak'] : "" ;
		$tahun_jatuh_tempo_awal = isset($_REQUEST['tanggal_awal']) ? date('Y',strtotime($_REQUEST['tanggal_awal'])) : "" ;
		$bulan_jatuh_tempo_awal = isset($_REQUEST['tanggal_awal']) ? date('m',strtotime($_REQUEST['tanggal_awal'])) : "" ;
		$tanggal_jatuh_tempo_awal = isset($_REQUEST['tanggal_awal']) ? date('d',strtotime($_REQUEST['tanggal_awal'])) : "" ;
		$tahun_jatuh_tempo_akhir = isset($_REQUEST['tanggal_akhir']) ? date('Y',strtotime($_REQUEST['tanggal_akhir'])) : "" ;
		$bulan_jatuh_tempo_akhir = isset($_REQUEST['tanggal_akhir']) ? date('m',strtotime($_REQUEST['tanggal_akhir'])) : "" ;
		$tanggal_jatuh_tempo_akhir = isset($_REQUEST['tanggal_akhir']) ? date('d',strtotime($_REQUEST['tanggal_akhir'])) : "" ;

		if ($bulan_pajak=='1') {
			$nama_bulan = 'Januari';
		}elseif ($bulan_pajak=='2') {
			$nama_bulan = 'Februari';
		}elseif ($bulan_pajak=='3') {
			$nama_bulan = 'Maret';
		}elseif ($bulan_pajak=='4') {
			$nama_bulan = 'April';
		}elseif ($bulan_pajak=='5') {
			$nama_bulan = 'Mei';
		}elseif ($bulan_pajak=='6') {
			$nama_bulan = 'Juni';
		}elseif ($bulan_pajak=='7') {
			$nama_bulan = 'Juli';
		}elseif ($bulan_pajak=='8') {
			$nama_bulan = 'Agustus';
		}elseif ($bulan_pajak=='9') {
			$nama_bulan = 'September';
		}elseif ($bulan_pajak=='10') {
			$nama_bulan = 'Oktober';
		}elseif ($bulan_pajak=='11') {
			$nama_bulan = 'November';
		}else{
			$nama_bulan = 'Desember';
		}

		if ($jenis_pajak=='T') {
			$nama_jenispajak = 'TETAP' ;
		}elseif ($jenis_pajak=='I') {
			$nama_jenispajak = 'INSIDENTIL';
		}else{
			$nama_jenispajak = 'BERJALAN' ;
		}

		if ($penetapan=='O' || $penetapan=='o' ) {
			$nama_penetapan = 'OFFICIAL ASSESMENT' ; 
		}else{
			$nama_penetapan = 'SELF' ;
		}

		$tanggal_entryspt_view = $tanggal_entryspt .'/'. $bulan_entryspt .'/'. $tahun_entryspt;
		
		$data['list'] = $this->getcetak($tahun_pajak,$bulan_pajak,$tanggal_pajak,$rekening,$tahun_entryspt,$bulan_entryspt,$tanggal_entryspt,$id_kecamatan,$kode_jalan,$penetapan,$jenis_pajak,$sub_jenis_pajak,$tahun_jatuh_tempo_awal,$bulan_jatuh_tempo_awal,$tanggal_jatuh_tempo_awal,$tahun_jatuh_tempo_akhir,$bulan_jatuh_tempo_akhir,$tanggal_jatuh_tempo_akhir);

		$this->renderPartial('cetak', array('data'=>$data,
			'nama_penetapan'=>$nama_penetapan,
			'nama_jenispajak'=>$nama_jenispajak,
			'tanggal_entryspt_view'=>$tanggal_entryspt_view,
			'tahun_pajak'=>$tahun_pajak,
			'nama_bulan'=>$nama_bulan));
	}

	public function getcetak($tahun_pajak,$bulan_pajak,$tanggal_pajak,$rekening,$tahun_entryspt,$bulan_entryspt,$tanggal_entryspt,$id_kecamatan,$kode_jalan,$penetapan,$jenis_pajak,$sub_jenis_pajak,$tahun_jatuh_tempo_awal,$bulan_jatuh_tempo_awal,$tanggal_jatuh_tempo_awal,$tahun_jatuh_tempo_akhir,$bulan_jatuh_tempo_akhir,$tanggal_jatuh_tempo_akhir)
	{

		if ($sub_jenis_pajak=='') {
			$ukuran = '';
		}else if ($sub_jenis_pajak=='mini') {
			$ukuran = 'AND TBLDAFTREKLAME.TBLDAFTREKLAME_PANJANG*TBLDAFTREKLAME.TBLDAFTREKLAME_LEBAR < 24';
		}elseif ($sub_jenis_pajak=='midi') {
			$ukuran = 'AND TBLDAFTREKLAME.TBLDAFTREKLAME_PANJANG*TBLDAFTREKLAME.TBLDAFTREKLAME_LEBAR < 24 AND TBLDAFTREKLAME.TBLDAFTREKLAME_PANJANG*TBLDAFTREKLAME.TBLDAFTREKLAME_LEBAR >= 4';
		}else{
			$ukuran = 'AND TBLDAFTREKLAME.TBLDAFTREKLAME_PANJANG*TBLDAFTREKLAME.TBLDAFTREKLAME_LEBAR > 4';
		}


		$nama_rekening = '(SELECT TBLREKENING.TBLREKENING_NAMAREKENING FROM TBLREKENING where TBLREKENING.TBLREKENING_REKPENDAPATAN=TBLDAFTREKLAME.TBLDAFTREKLAME_REKPENDAPATAN AND TBLREKENING.TBLREKENING_REKPAD=TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAD AND TBLREKENING.TBLREKENING_REKPAJAK=TBLDAFTREKLAME.TBLDAFTREKLAME_REKPAJAK AND TBLREKENING.TBLREKENING_REKAYAT=TBLDAFTREKLAME.TBLDAFTREKLAME_REKAYAT AND TBLREKENING.TBLREKENING_REKJENIS=TBLDAFTREKLAME.TBLDAFTREKLAME_REKJENIS ) as NMREKening';

		$tanggalakhir = " to_date(CONCAT(TBLDAFTREKLAME_BLNAKHIRREKLAME, CONCAT('/', CONCAT(TBLDAFTREKLAME_TGLAKHIRREKLAME, CONCAT('/', TBLDAFTREKLAME_THNAKHIRREKLAME)))), 'MM/DD/YY') as tanggalakhir, ";

		if ($tanggal_jatuh_tempo_awal==''  || $bulan_jatuh_tempo_awal=='' || $tahun_jatuh_tempo_awal=='' ) {
			$tanggal_awal_tempo = "";
		}else{
			$tanggal_awal_tempo = "BETWEEN to_date('".$bulan_jatuh_tempo_awal."/".$tanggal_jatuh_tempo_awal."/".substr($tahun_jatuh_tempo_awal,2,4)."', 'MM/DD/YY')";
		}

		if ($tanggal_jatuh_tempo_akhir==''  || $bulan_jatuh_tempo_akhir=='' || $tahun_jatuh_tempo_akhir=='' ) {
			$tanggal_akhir_tempo = "";
		}else{
			$tanggal_akhir_tempo = "AND to_date('".$bulan_jatuh_tempo_akhir."/".$tanggal_jatuh_tempo_akhir."/".substr($tahun_jatuh_tempo_akhir,2,4)."', 'MM/DD/YY')";
		}

		$wheretanggal = " AND ( to_date(CONCAT(TBLDAFTREKLAME_BLNAKHIRREKLAME, CONCAT('/', CONCAT(TBLDAFTREKLAME_TGLAKHIRREKLAME, CONCAT('/',TBLDAFTREKLAME_THNAKHIRREKLAME)))), 'MM/DD/YY') ".$tanggal_awal_tempo." ".$tanggal_akhir_tempo.") ";
		
		if ($penetapan=='') {
			$jenis_penetapan = "";
		}else{
			$jenis_penetapan = " AND TBLDAFTREKLAME.TBLDAFTREKLAME_ISJNSPENETAPAN='".$penetapan."' " ;
		}
		if ($jenis_pajak=='') {
			$jenisreklame = "";
		}else{
			$jenisreklame = " AND TBLDAFTREKLAME.TBLDAFTREKLAME_jnsreklame='".$jenis_pajak."' ";
		}
		if ($id_kecamatan=='') {
			$kecamatan = '';
		}else{
			$kecamatan = ' AND TBLDAFTREKLAME.TBLKECAMATAN_ID='.$id_kecamatan.' ';
		}

		if ($kode_jalan=='') {
			$nama_jalan = '';
		}else{
			$nama_jalan = 'AND TBLDAFTREKLAME.REFJALAN_ID='.$kode_jalan.'';
		}

		if ($tahun_pajak=='') {
			$where_tahun_pajak = '';
		}else{
			$where_tahun_pajak = 'AND TBLPENDATAAN_THNPAJAK = '.substr($tahun_pajak,2,4).'';
		}

		if ($bulan_pajak=='') {
			$where_bulan_pajak ='';
		}else{
			$where_bulan_pajak = 'AND TBLPENDATAAN_BLNPAJAK='.$bulan_pajak.'';
		}

		if ($tanggal_pajak=='') {
			$where_tanggal_pajak = '';
		}else{
			$where_tanggal_pajak = 'AND TBLPENDATAAN_TGLPAJAK ='.$tanggal_pajak.'';
		}

		if ($tahun_entryspt=='') {
			$where_tahun_entryspt = '' ;
		}else{
			$where_tahun_entryspt = ' AND TBLDAFTREKLAME_THNENTRI='.substr($tahun_entryspt,2,4).' ';
		}

		if ($bulan_entryspt=='') {
			$where_bulan_entry = '';
		}else{
			$where_bulan_entry = 'AND TBLDAFTREKLAME_BLNENTRI='.$bulan_entryspt.'';
		}

		if ($tanggal_entryspt=='') {
			$where_tanggal_entry = '';
		}else{
			$where_tanggal_entry = 'AND TBLDAFTREKLAME_TGLENTRI ='.$tanggal_entryspt.'';
		}

		$model = Yii::app()->db->createCommand()
				->select(' '.$nama_rekening.', '.$tanggalakhir.' TBLDAFTAR.TBLDAFTAR_GOLONGAN,TBLDAFTAR.TBLDAFTAR_NOPOK,TBLKECAMATAN_ID,TBLKELURAHAN_ID,TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,TBLPENDATAAN_PAJAKKE,TBLDAFTREKLAME_KETERANGAN1,TBLDAFTREKLAME_KETERANGAN2,TBLPENDATAAN_PAJAKKE,TBLDAFTREKLAME_JMLHREKLAME,JAM,TBLDAFTREKLAME_SKORKAWASAN,FJ,ST,TBLDAFTREKLAME.LS,REFKETINGGIAN_SKOR,TBLDAFTREKLAME_PANJANG,TBLDAFTREKLAME_LEBAR,TBLDAFTREKLAME_JUMLAHHARI,TBLDAFTREKLAME.TBLDAFTREKLAME_NILAISTRATEGIS,REFSUDUTPANDANG_SKOR,TARIFRP,HARGA,TBLPENDATAAN_THNPAJAK,TBLPENDATAAN_BLNPAJAK,TBLPENDATAAN_TGLPAJAK,TBLDAFTREKLAME_PAJAK,TBLDAFTREKLAME_THNSPTPD,TBLDAFTREKLAME_BLNSPTPD,TBLDAFTREKLAME_TGLSPTPD,TBLDAFTREKLAME_THNMULAIREKLAME,TBLDAFTREKLAME_BLNMULAIREKLAME,TBLDAFTREKLAME_TGLMULAIREKLAME,TBLDAFTREKLAME_THNAKHIRREKLAME,TBLDAFTREKLAME_BLNAKHIRREKLAME,TBLDAFTREKLAME_TGLAKHIRREKLAME,TBLDAFTREKLAME_NAMAJALAN')
				->from('TBLDAFTAR')
				->leftjoin('TBLDAFTREKLAME','TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTREKLAME.TBLDAFTAR_NOPOK')
				->where('TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA is not null '.$wheretanggal.' AND  TBLDAFTREKLAME_REKPENDAPATAN = 4 AND TBLDAFTREKLAME_REKPAD = 1 AND TBLDAFTREKLAME_REKPAJAK = 1 AND TBLDAFTREKLAME_REKAYAT = 4 '.$ukuran.' '.$where_tahun_pajak.' '.$where_bulan_pajak.' '.$where_tanggal_pajak.' '.$jenis_penetapan.' '.$nama_jalan.' '.$kecamatan.' '.$jenisreklame.' '.$where_tahun_entryspt.' '.$where_bulan_entry.' '.$where_tanggal_entry.' ')
				->queryAll();

		return $model;
	}

	public function actioncek()
	{
		$tahun_pajak = isset($_REQUEST['tahun_pajak']) ? $_REQUEST['tahun_pajak'] : "" ;
		$bulan_pajak = isset($_REQUEST['bulan_pajak']) ? $_REQUEST['bulan_pajak'] : "" ;
		$tanggal_pajak = isset($_REQUEST['tanggal_pajak']) ? $_REQUEST['tanggal_pajak'] : "" ;
		$rekening = isset($_REQUEST['rekening']) ? $_REQUEST['rekening'] : "" ;
		$tahun_entryspt = isset($_REQUEST['tahun_entryspt']) ? $_REQUEST['tahun_entryspt'] : "" ;
		$bulan_entryspt = isset($_REQUEST['bulan_entryspt']) ? $_REQUEST['bulan_entryspt'] : "" ;
		$tanggal_entryspt = isset($_REQUEST['tanggal_entryspt']) ? $_REQUEST['tanggal_entryspt'] : "" ;
		$id_kecamatan = isset($_REQUEST['id_kecamatan']) ? $_REQUEST['id_kecamatan'] : "" ;
		$kode_jalan = isset($_REQUEST['kode_jalan']) ? $_REQUEST['kode_jalan'] : "" ;
		$penetapan = isset($_REQUEST['penetapan']) ? $_REQUEST['penetapan'] : "" ;
		$jenis_pajak = isset($_REQUEST['jenis_pajak']) ? $_REQUEST['jenis_pajak'] : "" ;
		$sub_jenis_pajak = isset($_REQUEST['sub_jenis_pajak']) ? $_REQUEST['sub_jenis_pajak'] : "" ;
		$tahun_jatuh_tempo_awal = isset($_REQUEST['tanggal_awal']) ? date('Y',strtotime($_REQUEST['tanggal_awal'])) : date('Y') ;
		$bulan_jatuh_tempo_awal = isset($_REQUEST['tanggal_awal']) ? date('m',strtotime($_REQUEST['tanggal_awal'])) : date('m') ;
		$tanggal_jatuh_tempo_awal = isset($_REQUEST['tanggal_awal']) ? date('d',strtotime($_REQUEST['tanggal_awal'])) : date('d') ;
		$tahun_jatuh_tempo_akhir = isset($_REQUEST['tanggal_akhir']) ? date('Y',strtotime($_REQUEST['tanggal_akhir'])) : date('Y') ;
		$bulan_jatuh_tempo_akhir = isset($_REQUEST['tanggal_akhir']) ? date('m',strtotime($_REQUEST['tanggal_akhir'])) : date('m') ;
		$tanggal_jatuh_tempo_akhir = isset($_REQUEST['tanggal_akhir']) ? date('d',strtotime($_REQUEST['tanggal_akhir'])) : date('d') ;

		if ($bulan_pajak=='1') {
			$nama_bulan = 'Januari';
		}elseif ($bulan_pajak=='2') {
			$nama_bulan = 'Februari';
		}elseif ($bulan_pajak=='3') {
			$nama_bulan = 'Maret';
		}elseif ($bulan_pajak=='4') {
			$nama_bulan = 'April';
		}elseif ($bulan_pajak=='5') {
			$nama_bulan = 'Mei';
		}elseif ($bulan_pajak=='6') {
			$nama_bulan = 'Juni';
		}elseif ($bulan_pajak=='7') {
			$nama_bulan = 'Juli';
		}elseif ($bulan_pajak=='8') {
			$nama_bulan = 'Agustus';
		}elseif ($bulan_pajak=='9') {
			$nama_bulan = 'September';
		}elseif ($bulan_pajak=='10') {
			$nama_bulan = 'Oktober';
		}elseif ($bulan_pajak=='11') {
			$nama_bulan = 'November';
		}else{
			$nama_bulan = 'Desember';
		}

		if ($jenis_pajak=='T') {
			$nama_jenispajak = 'TETAP' ;
		}elseif ($jenis_pajak=='I') {
			$nama_jenispajak = 'INSIDENTIL';
		}else{
			$nama_jenispajak = 'BERJALAN' ;
		}

		if ($penetapan=='O' || $penetapan=='o' ) {
			$nama_penetapan = 'OFFICIAL ASSESMENT' ; 
		}else{
			$nama_penetapan = 'SELF' ;
		}

		$tanggal_entryspt_view = $tanggal_entryspt .'/'. $bulan_entryspt .'/'.$tahun_entryspt;
		
		$data = $this->getcetak($tahun_pajak,$bulan_pajak,$tanggal_pajak,$rekening,$tahun_entryspt,$bulan_entryspt,$tanggal_entryspt,$id_kecamatan,$kode_jalan,$penetapan,$jenis_pajak,$sub_jenis_pajak,$tahun_jatuh_tempo_awal,$bulan_jatuh_tempo_awal,$tanggal_jatuh_tempo_awal,$tahun_jatuh_tempo_akhir,$bulan_jatuh_tempo_akhir,$tanggal_jatuh_tempo_akhir);

		if ($data) {
			echo CJSON::encode(array('status'=>'sudah'));
		}
		else{
			echo CJSON::encode(array('status'=>'belum'));
		}
	}

	public function getNamaWp($nopok)
	{
		$data = Yii::app()->db->createCommand()
				->select('*')
				->from('TBLDAFTAR')
				->where('TBLDAFTAR.TBLDAFTAR_NOPOK = '.$nopok.' ')
				->queryRow();
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