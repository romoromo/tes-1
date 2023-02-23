<?php

class Ubah_statuswpController extends Controller
{
	public function actionIndex()
	{
		$data['kec'] = Yii::app()->db->createCommand("SELECT * FROM REFKECAMATAN")
		->queryAll();

		$this->renderPartial('index', array('data' => $data));
	}

	public function actionGetData()
	{
		$TBLDAFTAR_NOPOK = trim($_POST['TBLDAFTAR_NOPOK']);
		// $bulan = (int)trim($_POST['bulan']);
		// $tahun = trim($_POST['tahun']);
		/*$data = array();
		if ($cek>0) {
			$data['data'] = 'ada';
		}else{
			$data['data'] = 'tidak';
		}*/
		
		$select = "
		TBLDAFTAR.TBLDAFTAR_JENISPENDAPATAN,
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_NOFORMULIR,
		TBLDAFTAR.TBLDAFTAR_NOPOKL,
		TBLDAFTAR.TBLDAFTAR_GOLONGANL,
		TBLDAFTAR.TBLDAFTAR_NPWPP,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHARTRW,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAKOTA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHATELPAREA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHATELP,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAKODEPOS,
		TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		TBLDAFTAR.TBLDAFTAR_PEMILIKRTRW,
		TBLDAFTAR.TBLKECAMATAN_IDPEMILIK,
		TBLDAFTAR.TBLKELURAHAN_IDPEMILIK,
		TBLDAFTAR.TBLDAFTAR_PEMILIKKOTA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKKODEAREA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKTELP,
		TBLDAFTAR.TBLDAFTAR_PEMILIKKODEPOS,
		TBLDAFTAR.REFBADANUSAHA_IDPEMILIK,
		TBLDAFTAR.TBLDAFTAR_PEMILIKJABATAN,
		TBLDAFTAR.TBLDAFTAR_ISKAS,
		TBLDAFTAR.TBLDAFTAR_ISBUKUREGISTER,
		TBLDAFTAR.TBLDAFTAR_ISNOTA,
		TBLDAFTAR.TBLDAFTAR_ISJENISPENDAFTARAN,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_TANGGALNONAKTIF,
		TBLDAFTAR.TBLDAFTAR_ALASANNONAKTIF,
		TBLDAFTAR.TBLDAFTAR_NOKUKUH,
		TBLDAFTAR.TBLDAFTAR_TAHUNKUKUH,
		TBLDAFTAR.TBLDAFTAR_BULANKUKUH,
		TBLDAFTAR.TBLDAFTAR_TANGGALKUKUH,
		TBLDAFTAR.TBLDAFTAR_TAHUNTERIMADAFTAR,
		TBLDAFTAR.TBLDAFTAR_BULANTERIMADAFTAR,
		TBLDAFTAR.TBLDAFTAR_TANGGALTERIMADAFTAR,
		TBLDAFTAR.TBLDAFTAR_TAHUNENTRYDAFTAR,
		TBLDAFTAR.TBLDAFTAR_BULANENTRYDAFTAR,
		TBLDAFTAR.TBLDAFTAR_TANGGALENTRYDAFTAR,
		TBLDAFTAR.TBLDAFTAR_ISKETETAPANFLAT
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);

		$model = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'mode'=>'DETAIL') );

		echo CJSON::encode($model);
	}

	public function actiongetKelurahan()
	{
		$kec = $_REQUEST['value'];

		$kelurahan = Yii::app()->db->createCommand("
		SELECT *
		FROM
		REFKELURAHAN
		WHERE
			REFKECAMATAN_ID =".$kec)
		->queryAll();

			echo '<option value="">== Silahkan Pilih Kelurahan ==</option>';
		foreach ($kelurahan as $kel) {
			echo '<option value="'.$kel['REFKELURAHAN_ID'].'">'.$kel['REFKELURAHAN_NAMA'].'</option>';
		}

	}

	public function actionautocompletewp()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');
		
		$query = trim($_REQUEST['query']);

		$select = "
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		REFBADANUSAHA.REKENING_KODE
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'LK__TBLDAFTAR_BADANUSAHANAMA' => $query
			,'LK__TBLDAFTAR_BADANUSAHAALAMAT' => $query
			,'LK__TBLDAFTAR_NOPOK' => $query
		);

		/*$filter_AND = array(
			'EQ__TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			// ,'EQ__tblsubyek_isaktif' => "T"
		);*/

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'order'=> 'TBLDAFTAR_NOPOK ASC'
		);

		// $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$results = DBFetch::query($arrayConfig);

		$suggestions = array();
		 
		foreach($results as $result)
		{
			$suggestions[] = array(
			"value" => $result['TBLDAFTAR_NOPOK']. ' | ' . $result['TBLDAFTAR_BADANUSAHANAMA']. ' | ' . $result['TBLDAFTAR_BADANUSAHAALAMAT']
			,"data" => $result['TBLDAFTAR_NOPOK']
			,"TBLDAFTAR_BADANUSAHANAMA" => $result['TBLDAFTAR_BADANUSAHANAMA']
			,"TBLDAFTAR_BADANUSAHAALAMAT" => $result['TBLDAFTAR_BADANUSAHAALAMAT']
			,"TBLDAFTAR_NOPOK" => $result['TBLDAFTAR_NOPOK']
			,"REKENING_KODE" => $result['REKENING_KODE']
			);
		}

		 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function actionUpdate()
	{
		$nopokok = trim($_POST['nopokok']);
		$statususer = trim($_POST['statususer']);
		$alasan = trim($_POST['alasan']);

		$res = array();
	
		$command = Yii::app()->db->createCommand();
		$column = array('TBLDAFTAR_ISAKTIF'=>$statususer
					,'TBLDAFTAR_ALASANNONAKTIF'=>$alasan
				);

		$simpan = $command->update('TBLDAFTAR', $column ,'TBLDAFTAR_NOPOK =:NOPOK',array(':NOPOK' => $nopokok));
		if ($simpan) {
			$res['status'] = 'update';
		}else{
			$res['status'] = 'failed';
		}
		
		echo CJSON::encode($res);
	}

}