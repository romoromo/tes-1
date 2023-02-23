<?php

class Npwpd_editController extends Controller
{
	var $MODULE_URL = 'pelayanan/npwpd_edit';
	var $MODULE_TBLOBYEK = 'TNPWPD';
	var $MODULE_TBLSUBYEK = 'TSUBYEK';

	var $REFKEC = 'TBLKELURAHAN';
	var $REFKEL = 'TBLKECAMATAN';
	var $REFPROV = 'TBLPROVINSI';

	public function actionIndex()
	{
		$data['provinsi'] = TBLPROVINSI::model()->findAll();
		
		$this->renderPartial('index',array('data'=>$data));
	}

	public function actiongetData()
	{
		$id = (int)base64_decode(base64_decode($_REQUEST['id']));
		$array = TSUBYEK::model()->findByPk( $id );
		// var_dump($array);
		$hidden = array();
		$data = array();

		$rek_kode = Yii::app()->db->createCommand()
		// ->select('GROUP_CONCAT(DISTINCT TREKENING_KODE)')
		->select("
			LISTAGG(TREKENING_KODE, ',') WITHIN GROUP (ORDER BY TREKENING_KODE) AS TREKENING_KODE
			, LISTAGG(TREKENINGSUB_KODE, ',') WITHIN GROUP (ORDER BY TREKENINGSUB_KODE) AS TREKENINGSUB_KODE
		")
		->from('TNPWPD')
		->where('TSUBYEK_ID=:id', array(":id" => $id))
		->queryRow();

		foreach ($array as $key => $value) {
			if (!in_array($key, $hidden)) {
				$data[$key] = $value;
			}
		}
		$data['rekening_npwpd'] = $rek_kode['TREKENING_KODE'];
		$data['rekeningsub_npwpd'] = $rek_kode['TREKENINGSUB_KODE'];
		echo CJSON::encode($data);
	}

	public function actionDataPajakPemohon()
	{
		$data['idpemohon'] = $idpemohon = (int)$_REQUEST['idpemohon'];
		$data = array();
		$data['detail_pemohon'] = $this->getDetailIdentitas("PEMOHON",$idpemohon);
		$data['daftar_npwpd'] = $this->getAllNPWD("PEMOHON",$idpemohon);
		// $data['daftar_npwpd_lama'] = $this->getAllNPWDLama("PEMOHON",$idpemohon);

		// $data['kec'] = Kecamatan::model()->findAll(array('order'=>'' . $this->REFKEC . '_NAMA ASC'));
		// $data['list_bidangrekening'] = MasterRekening::model()->findAll('LENGTH(tblmasterrekening_kode)=5 AND tblmasterrekening_aktif="T"');
		// $list_rek = MasterRekening::model()->findAll('tblmasterrekening_aktif="T"');
		$rows_rek = array();
		// foreach ($list_rek as $rek) {
		// 	$rows_rek[$rek['tblmasterrekening_id']] = '[' . $rek['tblmasterrekening_kode'] . '] ' . $rek['tblmasterrekening_nama'];
		// }
		// $data['list_rek'] = $rows_rek;

		$this->renderPartial('data-pajak-pemohon', array('data'=>$data));
	}

	


	public function getDetailIdentitas($typeidentity, $identity)
	{
		$select = '*';
		$from = $this->MODULE_TBLSUBYEK;
		$otherquery = array(
			'leftjoin_kecamatan' => array('' . $this->REFKEC . '','' . $this->REFKEC . '.' . $this->REFKEC . '_KODE= ' . $this->MODULE_TBLSUBYEK .'.' . $this->REFKEC . '_ID')
			,'leftjoin_kelurahan' => array('' . $this->REFKEL . '','' . $this->REFKEL . '.' . $this->REFKEL . '_KODE= ' . $this->MODULE_TBLSUBYEK .'.' . $this->REFKEL . '_ID')
			,'leftjoin_propinsi' => array('' . $this->REFPROV . '','' . $this->REFPROV . '.' . $this->REFPROV . '_KODE= ' . $this->MODULE_TBLSUBYEK .'.' . $this->REFPROV . '_ID')
			,'leftjoin_kab' => array('TBLKABUPATEN','TBLKABUPATEN.TBLKABUPATEN_KODE= ' . $this->MODULE_TBLSUBYEK .' .TBLKABUPATEN_ID')
		);
		$filter = array();
		if ($typeidentity=='PEMOHON') {
			# use NIK
			$filter['EQ__' . $this->MODULE_TBLSUBYEK .'.' . $this->MODULE_TBLSUBYEK .'_ID'] = $identity;
		} elseif ($typeidentity=='LOKASI') {
			# use SHM
			$select = '*';
			$from = 'tbllokasi';
			$otherquery = array(
				'leftjoin_kecamatan' => array('' . $this->REFKEC . '','' . $this->REFKEC . '.' . $this->REFKEC . '_ID=tbllokasi.' . $this->REFKEC . '_ID')
				,'leftjoin_kelurahan' => array('' . $this->REFKEL . '','' . $this->REFKEL . '.' . $this->REFKEL . '_ID=tbllokasi.' . $this->REFKEL . '_ID')
			);
			$filter['EQ__tbllokasi.tbllokasi_id'] = $identity;
			// $filter['EQ__tbllokasi_nop'] = $identity;
		} else {
			echo "invalid";Yii::app()->end();
		}

		$detailIdentitas = DBFetch::query(array('select'=>$select, 'from'=>$from, 'otherquery'=>$otherquery, 'filter'=>$filter, 'mode'=>'DETAIL'));
		return $detailIdentitas;
	}
	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		if ($cmd=="tambah") {
			$model = new TSUBYEK;
			$model->TSUBYEK_ID = DMOrcl::getSequence( 'SEQ_TBLSUBYEK' );
			$model->TSUBYEK_TGLENTRY = DMOrcl::getNow();
			$model->TSUBYEK_NOKUKUH = "";
			$model->TSUBYEK_HAPUS = "F";
			$model->TSUBYEK_ISAKTIF = "T";

		}
		elseif($cmd=="edit") {
			$id = (int)($_REQUEST['id']);
			$model = TSUBYEK::model()->findByPk($id);
			$model->TSUBYEK_TGLUPDATE = DMOrcl::getNow();
		}
		else {
			echo CJSON::encode(array('status'=>'InvalidCommand'));
			Yii::app()->end();
		}

		$data['PARAM'] = $PARAM = $_REQUEST['param'];
		
		$model->REFJENISWP_ID = (int)$PARAM['REFJENISWP_ID'];
		$model->TSUBYEK_BUNIK = str_replace('.', '', $PARAM['TSUBYEK_BUNIK']);
		$model->TSUBYEK_BUNPWP = str_replace(array('.', '-'), array(''), $PARAM['TSUBYEK_BUNPWP']);
		$model->TSUBYEK_BUNAMAMERK = $PARAM['TSUBYEK_BUNAMAMERK'];
		$model->TSUBYEK_BUALAMAT = $PARAM['TSUBYEK_BUJALAN'] . " " . $PARAM['TSUBYEK_BURTRWRK'];
		$model->TSUBYEK_BUJALAN = $PARAM['TSUBYEK_BUJALAN'];
		$model->TSUBYEK_BURTRWRK = $PARAM['TSUBYEK_BURTRWRK'];
		$model->TBLPROVINSI_ID = (int)$PARAM['TBLPROVINSI_ID'];
		$model->TBLKABUPATEN_ID = (int)$PARAM['TBLKABUPATEN_ID'];
		$model->TBLKECAMATAN_ID = (int)$PARAM['TBLKECAMATAN_ID'];
		$model->TBLKELURAHAN_ID = (int)$PARAM['TBLKELURAHAN_ID'];
		$kel = TBLKELURAHAN::model()->find('TBLKELURAHAN_KODE=:kode', array(':kode'=>$model->TBLKELURAHAN_ID));
		$kec = TBLKECAMATAN::model()->find('TBLKECAMATAN_KODE=:kode', array(':kode'=>$model->TBLKECAMATAN_ID));
		$model->REFKELURAHAN_ID = $kel ? $kel['TBLKELURAHAN_KD'] : 0;
		$model->REFKECAMATAN_ID = $kec ? $kec['TBLKECAMATAN_KD'] : 0;
		$model->REFKECAMATAN_ID = isset($PARAM['REFKECAMATAN_ID']) ? (int)$PARAM['REFKECAMATAN_ID'] : 0;
		$model->TSUBYEK_BUKODEPOS = (int)$PARAM['TSUBYEK_BUKODEPOS'];
		$model->TSUBYEK_BUTELP = $PARAM['TSUBYEK_BUTELP'];
		$model->TSUBYEK_BUTELP2 = $PARAM['TSUBYEK_BUTELP2'];
		$model->TSUBYEK_BUHP = $PARAM['TSUBYEK_BUHP'];
		$model->TSUBYEK_BUNOAKTA = $PARAM['TSUBYEK_BUNOAKTA'];
		$model->TSUBYEK_BUAKTANO = DMOrcl::getRequest('param', 'TSUBYEK_BUAKTANO');
		$model->TSUBYEK_BUAKTATGL = DMOrcl::getRequest('param', 'TSUBYEK_BUAKTATGL');
		$model->TSUBYEK_BUHONO = DMOrcl::getRequest('param', 'TSUBYEK_BUHONO');
		$model->TSUBYEK_BUHOTGL = DMOrcl::getRequest('param', 'TSUBYEK_BUHOTGL');
		$model->TSUBYEK_BUPARIWISATANO = DMOrcl::getRequest('param', 'TSUBYEK_BUPARIWISATANO');
		$model->TSUBYEK_BUPARIWISATATGL = DMOrcl::getRequest('param', 'TSUBYEK_BUPARIWISATATGL');
		$model->TSUBYEK_BULAIN1NO = DMOrcl::getRequest('param', 'TSUBYEK_BULAIN1NO');
		$model->TSUBYEK_BULAIN1TGL = DMOrcl::getRequest('param', 'TSUBYEK_BULAIN1TGL');
		$model->TSUBYEK_BULAIN2NO = DMOrcl::getRequest('param', 'TSUBYEK_BULAIN2NO');
		$model->TSUBYEK_BULAIN2TGL = DMOrcl::getRequest('param', 'TSUBYEK_BULAIN2TGL');
		$model->TBIDANGUSAHA_ID = (int)$PARAM['TBIDANGUSAHA_ID'];
		$model->TBIDANGUSAHA_LAIN = $PARAM['TBIDANGUSAHA_LAIN'];

		$model->TSUBYEK_MILIKNAMA = $PARAM['TSUBYEK_MILIKNAMA'];
		$model->TSUBYEK_MILIKNIK = $PARAM['TSUBYEK_MILIKNIK'];
		$model->TSUBYEK_MILIKNPWP = $PARAM['TSUBYEK_MILIKNPWP'];
		$model->TSUBYEK_MILIKJAB = DMOrcl::getRequest('param', 'TSUBYEK_MILIKJAB');
		$model->TSUBYEK_MILIKALAMAT = DMOrcl::getRequest('param', 'TSUBYEK_MILIKALAMAT');
		$model->TSUBYEK_MILIKJALAN = $PARAM['TSUBYEK_MILIKJALAN'];
		$model->TSUBYEK_MILIKRTRWRK = $PARAM['TSUBYEK_MILIKRTRWRK'];

		// $model->TSUBYEK_MILIKKEL = (int)$PARAM['TSUBYEK_MILIKKEL'];
		// $model->TSUBYEK_MILIKKEC = (int)$PARAM['TSUBYEK_MILIKKEC'];
		$model->TSUBYEK_MILIKPROVID = (int)$PARAM['TSUBYEK_MILIKPROVID'];
		$model->TSUBYEK_MILIKKABID = (int)$PARAM['TSUBYEK_MILIKKABID'];
		$model->TSUBYEK_MILIKKECID = (int)$PARAM['TSUBYEK_MILIKKECID'];
		$model->TSUBYEK_MILIKKELID = (int)$PARAM['TSUBYEK_MILIKKELID'];

		$model->TSUBYEK_MILIKTELP = DMOrcl::getRequest('param', 'TSUBYEK_MILIKTELP');
		$model->TSUBYEK_MILIKHP = $PARAM['TSUBYEK_MILIKHP'];
		$model->TSUBYEK_MILIKHP2 = $PARAM['TSUBYEK_MILIKHP2'];
		$model->TSUBYEK_MILIKKODEPOS = $PARAM['TSUBYEK_MILIKKODEPOS'];
		// $model->TSUBYEK_TGLDAFTAR = $PARAM['TSUBYEK_TGLDAFTAR'];
		$model->TSUBYEK_NOFORMULIR = DMOrcl::getRequest('param', 'TSUBYEK_NOFORMULIR');
		$model->TBLPENGGUNA_ID = Yii::app()->user->getId();

		$listrekening = $PARAM['TREKENING_KODE'];

		// echo CJSON::encode( $PARAM );Yii::app()->end();

		if ($model->save()) {
			//$data['TSUBYEK_ID'] = $model->primaryKey;
			//$data['TSUBYEK'] = $model;
			//$statnpwpd = $this->simpanNPWPD($listrekening, $data);
			echo CJSON::encode(array('status'=>'success'
				, 'pk'=>$model->primaryKey
				, 'msg'=>"Data berhasil disimpan"
				//, 'npwpd'=>$statnpwpd
				, 'reks' => base64_encode(base64_encode( implode(',', $listrekening) ))
			));
		}
		else {
			echo CJSON::encode(array('status'=>'failed','msg'=>"Data gagal disimpan",'dbg'=>$model->errors));
		}
	}

	public function simpanNPWPD($listrekening = array(), $data = array())
	{
		$returndata = array();
		$DTSBYK = $data['TSUBYEK'];
		foreach ($listrekening as $row) {
			// var_dump($row);
			$model = new TNPWPD;
			$model->TNPWPD_ID = DMOrcl::getSequence( 'SEQ_TNPWPD' );
			$model->TNPWPD_TGLENTRY = DMOrcl::getNow();

			$model->TSUBYEK_ID = $DTSBYK['TSUBYEK_ID'];

			$model->TNPWPD_MILIKNAMA = $DTSBYK['TSUBYEK_MILIKNAMA'];
			$model->TNPWPD_NIK = str_replace(array('.', '-'), array(''), $DTSBYK['TSUBYEK_MILIKNIK'] );
			$model->TNPWPD_NPWP = str_replace(array('.', '-'), array(''), $DTSBYK['TSUBYEK_MILIKNPWP'] );

			$model->TNPWPD_MILIKJAB = $DTSBYK['TSUBYEK_MILIKJAB'];
			$model->TNPWPD_MILIKALAMAT = $DTSBYK['TSUBYEK_MILIKALAMAT'];
			$model->TNPWPD_MILIKJALAN = $DTSBYK['TSUBYEK_MILIKJALAN'];
			$model->TNPWPD_MILIKRTRWRK = $DTSBYK['TSUBYEK_MILIKRTRWRK'];
			$model->TNPWPD_MILIKPROVID = $DTSBYK['TSUBYEK_MILIKPROVID'];
			$model->TNPWPD_MILIKKABID = $DTSBYK['TSUBYEK_MILIKKABID'];
			$model->TNPWPD_MILIKKECID = $DTSBYK['TSUBYEK_MILIKKECID'];
			$model->TNPWPD_MILIKKELID = $DTSBYK['TSUBYEK_MILIKKELID'];

			$model->TNPWPD_MILIKTELP = $DTSBYK['TSUBYEK_MILIKTELP'];
			$model->TNPWPD_MILIKHP = $DTSBYK['TSUBYEK_MILIKHP'];
			$model->TNPWPD_MILIKHP2 = $DTSBYK['TSUBYEK_MILIKHP2'];
			$model->TNPWPD_MILIKKODEPOS = $DTSBYK['TSUBYEK_MILIKKODEPOS'];

			$model->TREKENING_KODE = $row;
			$model->TREKENING_ID = TRekening::model()->find('TREKENING_KODE=:kode', array(':kode'=> $row ))->TREKENING_ID;
			$model->TNPWPD_NPWPD = '';

			$model->TNPWPD_JNSPENDAPATAN = 'P';
			$model->TNPWPD_GOL = TRekening::model()->getKodeREGPajak($row);
			$model->TNPWPD_KEC = $DTSBYK['TBLKECAMATAN_ID'];
			$model->TNPWPD_KEL = $DTSBYK['TBLKELURAHAN_ID'];

			$kodesub = isset( $_REQUEST['param']['TREKENINGSUB_KODE'][$row]) ? $_REQUEST['param']['TREKENINGSUB_KODE'][$row] : '';

			$model->TREKENINGSUB_KODE = $kodesub;
			$model->TREKENINGSUB_ID = ($reksub = TRekening::model()->find('TREKENING_KODE=:kode', array(':kode'=> $model->TREKENINGSUB_KODE )) ) ? $reksub->TREKENING_ID : 0;

			$model->TNPWPD_TGLDAFTAR = DMOrcl::getNow();
			// $model->TNPWPD_NAMAJELAS = $data['TNPWPD_NAMAJELAS'];
			$model->TNPWPD_TGLTERIMA = DMOrcl::getNow();
			// $model->TNPWPD_NAMATERIMA = $data['TNPWPD_NAMATERIMA'];
			// $model->TNPWPD_NIPTERIMA = $data['TNPWPD_NIPTERIMA'];
			// $model->TNPWPD_ESTIMASI = $data['TNPWPD_ESTIMASI'];
			// $model->TNPWPD_KET = $data['TNPWPD_KET'];
			// $model->TNPWPD_TGLCATAT = $data['TNPWPD_TGLCATAT'];
			// $model->TNPWPD_NAMACATAT = $data['TNPWPD_NAMACATAT'];
			// $model->TNPWPD_NIPCATAT = $data['TNPWPD_NIPCATAT'];
			$model->TNPWPD_NOFORMULIR = '';
			$model->TBLPENGGUNA_ID = Yii::app()->user->getId();

			$model->TNPWPD_TGLUPDATE = DMOrcl::getNow();
			$model->TNPWPD_ISKUKUH = 'F';
			$model->TNPWPD_TGLKUKUH = '';
			$model->TNPWPD_NOKUKUH = '';
			$model->TNPWPD_HAPUS = 'F';
			$model->TNPWPD_ISAKTIF = 'T';
			$returndata[] = array('status' => $model->save(), 'errors' => $model->errors, 'pk' => $model->primaryKey);

		}

		return $returndata;
	}

	public function getAllNPWD($typeidentity, $identity)
	{
		$select = 'TREKENING.* , TREKENINGSUB.TREKENING_KODE AS TREKENINGSUB_KODE , TREKENINGSUB.TREKENING_NAMA AS TREKENINGSUB_NAMA , ' . $this->MODULE_TBLSUBYEK .'.* , TNPWPD.*,  TSUBYEK.*, ' . $this->REFKEL . '.*, ' . $this->REFKEC . '.*';
		$from = $this->MODULE_TBLSUBYEK;
		$otherquery = array(
			'join_tblobyek' => array('TNPWPD','TNPWPD. ' . $this->MODULE_TBLSUBYEK .'_ID= ' . $this->MODULE_TBLSUBYEK .'.' . $this->MODULE_TBLSUBYEK .'_ID')
			,'leftjoin_' . $this->REFKEL . '' => array('' . $this->REFKEL . '','' . $this->REFKEL . '.' . $this->REFKEL . '_id=TNPWPD.TNPWPD_MILIKKELID')
			,'leftjoin_' . $this->REFKEC . '' => array('' . $this->REFKEC . '','' . $this->REFKEC . '.' . $this->REFKEC . '_id=TNPWPD.TNPWPD_MILIKKECID')
			,'leftjoin_tblrekening' => array('TREKENING', 'TREKENING' . '.TREKENING_ID = TNPWPD.TREKENING_ID')
			,'leftjoin_tblrekeningsub' => array('TREKENING TREKENINGSUB', 'TREKENINGSUB' . '.TREKENING_ID = TNPWPD.TREKENINGSUB_ID')
			,'order' => 'TNPWPD_TGLENTRY DESC'
		);
		$filter = array();
		if ($typeidentity=='PEMOHON') {
			# use NIK
			$filter['EQ__ ' . $this->MODULE_TBLSUBYEK .'.' . $this->MODULE_TBLSUBYEK .'_ID'] = $identity;
		} elseif ($typeidentity=='LOKASI') {
			# use SHM
			$select = 'tbllokasi.*, tblizinpendaftaran.*, tblizin.*, tblizinpermohonan.*, ' . $this->REFKEL . '.*, ' . $this->REFKEC . '.*, tblcetaksk.*, tblkendaliproses.*';
			$from = 'tbllokasi';
			$otherquery = array(
				'join_tblizinpendaftaran' => array('tblizinpendaftaran','tblizinpendaftaran.tbllokasi_id=tbllokasi.tbllokasi_id')
				,'leftjoin_tblizin' => array('tblizin','tblizin.tblizin_id=tblizinpendaftaran.tblizin_id')
				,'leftjoin_tblizinpermohonan' => array('tblizinpermohonan','tblizinpermohonan.tblizinpermohonan_id=tblizinpendaftaran.tblizinpermohonan_id')
				,'leftjoin_' . $this->REFKEL . '' => array('' . $this->REFKEL . '','' . $this->REFKEL . '.' . $this->REFKEL . '_id=tblizinpendaftaran.' . $this->REFKEL . '_id')
				,'leftjoin_' . $this->REFKEC . '' => array('' . $this->REFKEC . '','' . $this->REFKEC . '.' . $this->REFKEC . '_id=tblizinpendaftaran.' . $this->REFKEC . '_id')
				,'leftjoin_tblcetaksk' => array('tblcetaksk','tblcetaksk.tblizinpendaftaran_id=tblizinpendaftaran.tblizinpendaftaran_id')
				,'leftjoin_tblkendaliproses' => array('tblkendaliproses','tblkendaliproses.tblizinpendaftaran_id=tblizinpendaftaran.tblizinpendaftaran_id')
				,'group' => 'tblizinpendaftaran.tblizinpendaftaran_id'
				,'order' => 'tblizinpendaftaran_tgljam DESC'
			);
			$filter['EQ__tbllokasi.tbllokasi_id'] = $identity;
			// $filter['EQ__tbllokasi_nop'] = $identity;
		} else {
			echo "invalid";Yii::app()->end();
		}

		$res = DBFetch::query(array('select'=>$select, 'from'=>$from, 'otherquery'=>$otherquery, 'filter'=>$filter, 'mode'=>'LIST'));
		return $res;
	}

	public function actionstatusRecordNPWPD()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$subyek_id = (int)base64_decode(base64_decode($_REQUEST['sid']));
		$data['list_rek'] = $list_rek = base64_decode(base64_decode($_REQUEST['list_rek']));
		$list_rek = explode(',', $list_rek);

		if( empty($subyek_id) OR empty($list_rek) ) {
			echo "Dilarang!";
			Yii::app()->end();
		}

		$data['npwpd'] = $npwpd = Yii::app()->db->createCommand()
		->select()
		->from('TNPWPD')
		->join('TSUBYEK', 'TSUBYEK.TSUBYEK_ID = TNPWPD.TSUBYEK_ID')
		->leftJoin('TBIDANGUSAHA', 'TBIDANGUSAHA.TBIDANGUSAHA_ID = TSUBYEK.TBIDANGUSAHA_ID')
		->leftJoin('TBLKECAMATAN', 'TBLKECAMATAN.TBLKECAMATAN_KODE = TSUBYEK.TBLKECAMATAN_ID')
		->leftJoin('TBLKELURAHAN', 'TBLKELURAHAN.TBLKELURAHAN_KODE = TSUBYEK.TBLKELURAHAN_ID')
		->where('TSUBYEK.TSUBYEK_ID=:id', array(':id' => $subyek_id) )
		->andwhere( array('in', 'TREKENING_KODE', $list_rek ) )
		->queryAll();
		;
		$this->renderPartial('status-record', array('data'=>$data));
	}

	public function actiondoBuildNPWPD()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$npwpd_id = (int)base64_decode(base64_decode($_REQUEST['nid']));
		$npwpd_regno = (int)base64_decode(base64_decode($_REQUEST['noreg']));

		$npwpd = TNPWPD::model()->findByPk( $npwpd_id );
		
		if( empty($npwpd_id) OR !$npwpd OR empty($npwpd_regno) ) {
			echo CJSON::encode( array('status'=>'forbidden') );
			Yii::app()->end();
		}

		if ( !empty($npwpd->TNPWPD_NPWPD) ) {
			echo CJSON::encode( array('status'=>'already_set') );
			Yii::app()->end();
		}

		$isSudahPakai = TNPWPD::model()->find('TNPWPD_NOPOK=:no', array(':no'=>$npwpd_regno));

		if ( $isSudahPakai ) {
			echo CJSON::encode( array('status'=>'already_use', 'msg'=>'Nomor sudah ada, mohon gunakan nomor register lain.' ) );
			Yii::app()->end();
		}

		$koderegpajak = TRekening::model()->getKodeREGPajak($npwpd['TREKENING_KODE']);
		$subyek = TSUBYEK::model()->findByPk( $npwpd['TSUBYEK_ID'] );
		$keckode = ($keckode = TBLKECAMATAN::model()->find('TBLKECAMATAN_KODE=:id', array(':id'=> $subyek['TBLKECAMATAN_ID']))) ?  (!empty($keckode['TBLKECAMATAN_KD']) ? $keckode['TBLKECAMATAN_KD'] : '00') : '00';
		$kelkode = ($kelkode = TBLKELURAHAN::model()->find('TBLKELURAHAN_KODE=:id', array(':id'=> $subyek['TBLKELURAHAN_ID']))) ?  (!empty($kelkode['TBLKELURAHAN_KD']) ? $kelkode['TBLKELURAHAN_KD'] : '00') : '00';

		$regno_0pad = sprintf("%07d", $npwpd_regno);

		$npwpd->TNPWPD_NPWPD = $koderegpajak . $regno_0pad . $keckode . $kelkode;
		$npwpd->TNPWPD_NOPOK = $npwpd_regno;
		
		if( $npwpd->save() ) {
			echo CJSON::encode( array('status'=>'success', 'msg' => 'NPWPD berhasil dibuat', 'npwpd' => $npwpd->TNPWPD_NPWPD) );
		} else {
			echo CJSON::encode( array('status'=>'failed', 'msg' => 'NPWPD gagal dibuat', 'dbg' => $npwpd->errors) );
		}

	}
}