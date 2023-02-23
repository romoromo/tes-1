<?php

class Keringananpajak_airtanah2017Controller extends Controller
{
	var $KODE_GOL = 1;
	var $PAJAK_AYAT = 8;
	var $PAJAK_REK = '4.1.1.8.0';

	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;

		$data['rek'] = Yii::app()->db->createCommand("
		SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.8.%'
		ORDER BY TBLREKENING_KODE
		")
		->queryAll();

		$this->renderPartial('index',array('data'=>$data));
	}

	public function actionautocompletewpairtanah()
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
		REFBADANUSAHA.REKENING_KODE,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'LK__TBLDAFTAR_BADANUSAHANAMA' => $query
			,'LK__TBLDAFTAR_BADANUSAHAALAMAT' => $query
			,'LK__TBLDAFTAR_NOPOK' => $query
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,'EQ__TBLDAFTAR.REFBADANUSAHA_IDPEMILIK' => "AIR"
			// ,'EQ__TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA' => "AIR"
		);

		$otherquery = array(
			'limit'=> 30
			,'leftjoin'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID = TBLDAFTAR.REFBADANUSAHA_IDPEMILIK')
			,'order'=> 'TBLDAFTAR_NOPOK ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
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
			,"TBLKECAMATAN_IDBADANUSAHA" => $result['TBLKECAMATAN_IDBADANUSAHA']
			,"TBLKELURAHAN_IDBADANUSAHA" => $result['TBLKELURAHAN_IDBADANUSAHA']
			);
		}

		 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function actionautocompletewpairtanah2()
	{
		$nopokok = trim($_REQUEST['nopokok']);
		//$query = trim($_REQUEST['query']);

		$select = "
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		REFBADANUSAHA.REKENING_KODE,
		TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA,
		TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR_NOPOK' => $nopokok
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			,'EQ__TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA' => "AIR"
		);

		$otherquery = array(
			'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$results = DBFetch::query($arrayConfig);
		

	}

	public function actionGetKodeRek()
	{
		$kodesubrek = $_REQUEST['kodesubrek'];
		$data = Yii::app()->db->createCommand()->select('*')->from('TBLREKENING')->where('TBLREKENING_KODE=:kode', array(':kode'=>$kodesubrek))->queryRow();

		echo CJSON::encode($data);
	}

	public function actionGetWPAirTanah()
	{
		$NOPOKOK = $_REQUEST['nopokok'];
		$THNPAJAK = substr($_REQUEST['THNPAJAK'], -2);
		$BLNPAJAK = (int) $_REQUEST['BLNPAJAK'];

		$data = Yii::app()->db->createCommand('SELECT TBLDAFTTANAH.*,NVL(TBLDAFTTANAH_NOMORSKPD,0) AS NOKOHIR FROM TBLDAFTTANAH WHERE TBLPENDATAAN_THNPAJAK ='.$THNPAJAK.' AND TBLPENDATAAN_BLNPAJAK='.$BLNPAJAK.' AND TBLDAFTAR_NOPOK='.$NOPOKOK.' AND NVL(TBLPENDATAAN_TGLPAJAK,0) = 0')->queryRow();
		echo CJSON::encode($data);
	}

	public function actionSimpanAirTanah()
	{
		$ada_data = isset($_REQUEST['ada_data']) && !empty($_REQUEST['ada_data']) ? $_REQUEST['ada_data'] : 0;
		$TBLDAFTAR_NOPOK = isset($_REQUEST['TBLDAFTAR_NOPOK']) && !empty($_REQUEST['TBLDAFTAR_NOPOK']) ? $_REQUEST['TBLDAFTAR_NOPOK'] : 0;
		$TBLPENDATAAN_THNPAJAK = isset($_REQUEST['TBLPENDATAAN_THNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_THNPAJAK']) ? $_REQUEST['TBLPENDATAAN_THNPAJAK'] : 0;
		$TBLPENDATAAN_BLNPAJAK = isset($_REQUEST['TBLPENDATAAN_BLNPAJAK']) && !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : 0;
		$TBLDAFTTANAH_PAJAK = isset($_REQUEST['TBLDAFTTANAH_PAJAK']) && !empty($_REQUEST['TBLDAFTTANAH_PAJAK']) ? $_REQUEST['TBLDAFTTANAH_PAJAK'] : 0;
		$TBLDAFTTANAH_RUPIAHSETOR = isset($_REQUEST['TBLDAFTTANAH_RUPIAHSETOR']) && !empty($_REQUEST['TBLDAFTTANAH_RUPIAHSETOR']) ? $_REQUEST['TBLDAFTTANAH_RUPIAHSETOR'] : 0;
		
		$TBLDAFTTANAH_PERSENKERINGANAN = isset($_REQUEST['TBLDAFTTANAH_PERSENKERINGANAN']) && !empty($_REQUEST['TBLDAFTTANAH_PERSENKERINGANAN']) ? $_REQUEST['TBLDAFTTANAH_PERSENKERINGANAN'] : 0;
		$TBLDAFTTANAH_RPKERINGANAN = isset($_REQUEST['TBLDAFTTANAH_RPKERINGANAN']) && !empty($_REQUEST['TBLDAFTTANAH_RPKERINGANAN']) ? $_REQUEST['TBLDAFTTANAH_RPKERINGANAN'] : 0;
		$TBLDAFTTANAH_NOMORSKPD = isset($_REQUEST['TBLDAFTTANAH_NOMORSKPD']) && !empty($_REQUEST['TBLDAFTTANAH_NOMORSKPD']) ? $_REQUEST['TBLDAFTTANAH_NOMORSKPD'] : 0;
		$TBLDAFTTANAH_GOLONGAN = 1;
		$PENGGUNA_ID = Yii::app()->user->pengguna_id;

		if($ada_data=='sudah' || $ada_data=='sudah_ditetapkan'){
			$insert = Yii::app()->db->createCommand();
			$arrayInsert = array(
				'THP' => substr($TBLPENDATAAN_THNPAJAK, -2),
				'BLP' => $TBLPENDATAAN_BLNPAJAK,
				'NOPOK' => $TBLDAFTAR_NOPOK,
				'NOSKP' => $TBLDAFTTANAH_NOMORSKPD,
				'RPSKP' => LokalIndonesia::toAngka($TBLDAFTTANAH_RUPIAHSETOR),
				'PAJAK' => LokalIndonesia::toAngka($TBLDAFTTANAH_PAJAK),
				'PENGGUNA' => $PENGGUNA_ID,
				'KETERANGAN' => 'KERINGANAN PAJAK',
			);
			$arrayUpdate = array(
				'TBLDAFTTANAH_PAJAK' => LokalIndonesia::toAngka($TBLDAFTTANAH_RUPIAHSETOR),
				'TBLDAFTTANAH_PAJAKSKPD' => LokalIndonesia::toAngka($TBLDAFTTANAH_RUPIAHSETOR),
				'TBLDAFTTANAH_PERSENKERINGANAN' => $TBLDAFTTANAH_PERSENKERINGANAN,
				'TBLDAFTTANAH_RPKERINGANAN' => LokalIndonesia::toAngka($TBLDAFTTANAH_RPKERINGANAN),
			);
			$filter = array(
				':thnpajak' => $TBLPENDATAAN_THNPAJAK
				,':blnpajak' => $TBLPENDATAAN_BLNPAJAK
				,':nopok' => $TBLDAFTAR_NOPOK
			);
			
				
				$condition = '
				TBLPENDATAAN_THNPAJAK  = :thnpajak
				AND TBLPENDATAAN_BLNPAJAK  = :blnpajak
				AND TBLDAFTAR_NOPOK = :nopok
				';
				$simpan = Yii::app()->db->createCommand()->update('TBLDAFTTANAH', $arrayUpdate, $condition, $filter);
			
				$simpanlog = $insert->insert('TBLLOG_PENETAPAN', $arrayInsert);
			

			if ($simpan>0) {
				echo CJSON::encode(array('status'=>'success'));
			}
			else{
				echo CJSON::encode(array('status'=>'failed'));
			}
		} else {
			echo CJSON::encode(array('status'=>'failed'));
		}
	}

	public function cekPernahData($filter=array())
	{
		$THNPAJAK = $filter[':thnpajak'];
		$BLNPAJAK = $filter[':blnpajak'];
		$NOPOKOK = $filter[':nopok'];
		return $cek = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTTANAH WHERE TBLPENDATAAN_THNPAJAK ='.$THNPAJAK.' AND TBLPENDATAAN_BLNPAJAK='.$BLNPAJAK.' AND TBLDAFTAR_NOPOK='.$NOPOKOK)->queryScalar();
	}

	public function cekSKPD($filter=array())
	{
		$THNPAJAK = $filter[':thnpajak'];
		$BLNPAJAK = $filter[':blnpajak'];
		$TGLPAJAK = isset($filter[':tglpajak']) ? $filter[':tglpajak'] : '0';
		$NOPOKOK = $filter[':nopok'];
		return $cek = Yii::app()->db->createCommand("SELECT TBLDAFTTANAH_NOMORSKPD
			FROM TBLDAFTTANAH
			WHERE TBLDAFTAR_NOPOK = :NOPOKOK
			AND TBLPENDATAAN_THNPAJAK = :THNPAJAK
			AND TBLPENDATAAN_BLNPAJAK = :BLNPAJAK
			AND NVL(TBLPENDATAAN_TGLPAJAK,0) = :TGLPAJAK
		")
		->bindValues(array(
			'NOPOKOK' => $NOPOKOK,
			'THNPAJAK' => $THNPAJAK,
			'BLNPAJAK' => $BLNPAJAK,
			'TGLPAJAK' => $TGLPAJAK,
		))->queryScalar();
	}

	public function cekPernahringan($filter=array())
	{
		$THNPAJAK = $filter[':thnpajak'];
		$BLNPAJAK = $filter[':blnpajak'];
		$TGLPAJAK = isset($filter[':tglpajak']) ? $filter[':tglpajak'] : '0';
		$NOPOKOK = $filter[':nopok'];
		return $cek = Yii::app()->db->createCommand("SELECT TBLDAFTTANAH_PERSENKERINGANAN
			FROM TBLDAFTTANAH
			WHERE TBLDAFTAR_NOPOK = :NOPOKOK
			AND TBLPENDATAAN_THNPAJAK = :THNPAJAK
			AND TBLPENDATAAN_BLNPAJAK = :BLNPAJAK
			AND NVL(TBLPENDATAAN_TGLPAJAK,0) = :TGLPAJAK
		")
		->bindValues(array(
			'NOPOKOK' => $NOPOKOK,
			'THNPAJAK' => $THNPAJAK,
			'BLNPAJAK' => $BLNPAJAK,
			'TGLPAJAK' => $TGLPAJAK,
		))->queryScalar();
	}

	public function cekSetor($filter=array())
	{
		$THNPAJAK = $filter[':thnpajak'];
		$BLNPAJAK = $filter[':blnpajak'];
		$TGLPAJAK = isset($filter[':tglpajak']) ? $filter[':tglpajak'] : '0';
		$NOPOKOK = $filter[':nopok'];
		return $cek = Yii::app()->db->createCommand("SELECT TBLSETOR_NOMORSSPD
			FROM TBLSETOR
			WHERE TBLDAFTAR_NOPOK = :NOPOKOK
			AND TBLPENDATAAN_THNPAJAK = :THNPAJAK
			AND TBLPENDATAAN_BLNPAJAK = :BLNPAJAK
			AND NVL(TBLPENDATAAN_TGLPAJAK,0) = :TGLPAJAK
		")
		->bindValues(array(
			'NOPOKOK' => $NOPOKOK,
			'THNPAJAK' => $THNPAJAK,
			'BLNPAJAK' => $BLNPAJAK,
			'TGLPAJAK' => $TGLPAJAK,
		))
		->queryScalar();
	}
	
	public function actionCekPernahDaftar()
	{
		$NOPOKOK = $_REQUEST['nopokok'];
		$THNPAJAK = substr($_REQUEST['THNPAJAK'], -2);
		$BLNPAJAK = $_REQUEST['BLNPAJAK'];

		$filter = array(
					':thnpajak' => $THNPAJAK
					,':blnpajak' => $BLNPAJAK
					,':nopok' => $NOPOKOK
				);

		$cekPernahKeringanan = $this->cekPernahringan($filter);
		if ($cekPernahKeringanan) {
				echo CJSON::encode(array('status'=>'sudah_pernah_ringan'));Yii::app()->end();
		} else {
				$cek = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTTANAH WHERE TBLPENDATAAN_THNPAJAK ='.$THNPAJAK.' AND TBLPENDATAAN_BLNPAJAK='.$BLNPAJAK.' AND TBLDAFTAR_NOPOK='.$NOPOKOK)->queryScalar();
			if ($cek) {
							
				$cekSKPD = $this->cekSKPD($filter);
				$cekSetor = $this->cekSetor($filter);
				
				if ($cekSetor) {
					echo CJSON::encode(array('status'=>'sudah_disetor'));Yii::app()->end();
				}
				if ($cekSKPD) {
					echo CJSON::encode(array('status'=>'sudah_ditetapkan'));Yii::app()->end();
				}
				
				echo CJSON::encode(array('status'=>'sudah'));
			} else {
				echo CJSON::encode(array('status'=>'belum'));
			}
		}

		
	}

	public function actionGetTGLBatas()
	{
		$data['THNPAJAK'] = substr($_REQUEST['THNPAJAK'],-2);
		$data['BLNPAJAK'] = $_REQUEST['BLNPAJAK']+1;
		$data['KODEREK'] = $_REQUEST['KODEREK'];

		// $tglbatas = RefTGLBatas::model()->get($data['KODEREK'],$data['THNPAJAK'],$data['BLNPAJAK']);

		/*Tanggal Batas Pajak*/
		$data['TANGGAL'] = 15;
		$data['TANGGAL'] = 17;
		$data['BULAN'] = $data['BLNPAJAK'];
		
		if (strlen($data['BULAN'])>1) {
			$data['BULAN'] = $data['BULAN'];
		}
		else{
			$data['BULAN'] = '0'.$data['BULAN'];
		}
		
		$data['TAHUN'] = '20'.$data['THNPAJAK'];

		$data['TGLBATASPAJAK'] = $data['TANGGAL'].'-'.$data['BULAN'].'-'.$data['TAHUN'];
		/*Tanggal Batas Pajak*/

		/*Tanggal Batas Bulan Ini*/
		$blnnow = date('m');
		$thnnow = date('Y');

		$data['TGLBATASBLNNOW'] = '15-'.$blnnow.'-'.$thnnow;

		$data['BLNBUNGA'] = $blnnow-$data['BLNPAJAK'];
		
		if (date('d') > date('d',strtotime($data['TGLBATASBLNNOW']))) {
			$data['BLNBUNGAHIT'] = $data['BLNBUNGA']+1;
		}
		else{
			$data['BLNBUNGAHIT'] = $data['BLNBUNGA'];
		}


		/*Tanggal Batas Bulan Ini*/

		echo CJSON::encode($data);

	}
}