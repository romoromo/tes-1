<?php

class Open_dataController extends Controller
{
	public function init()
	{
		header("access-control-allow-origin: *");
		Yii::import('ext.DBFetch');
		Yii::import('ext.LokalIndonesia');
	}
	public function actionIndex()
	{
		echo "hello";
	}

	public function actionget()
	{
		$param = Yii::app()->request->getParam('data');
		$allowedMods = array(
			'kelurahan_by_kecamatan' => 'kelurahan_by_kecamatan'
			,'izinpermohonan_by_izin' => 'izinpermohonan_by_izin'
			,'persyaratan_by_izinpermohonan' => 'persyaratan_by_izinpermohonan'
			,'AutocompleteRekening' => 'AutocompleteRekening'
			,'AutocompleteSubyek' => 'AutocompleteSubyek'
			,'AutocompleteObyek' => 'AutocompleteObyek'
			,'detail_pemohon' => 'detail_pemohon'
			,'multi_persyaratan_by_izinpermohonan' => 'multi_persyaratan_by_izinpermohonan'
			,'isExist' => 'isExist'
			,'bidang_by_jenis' => 'bidang_by_jenis'
			,'tarif_reklame' => 'tarif_reklame'
			,'tarif_reklame_tinggi' => 'tarif_reklame_tinggi'
			,'tarif_reklame_kepadatan' => 'tarif_reklame_kepadatan'
			,'tabeldetail_airtanah' => 'tabeldetail_airtanah'
			,'autocomplete_nosptpd' => 'autocomplete_nosptpd'
			,'kodelokasireklame_by_obyek' => 'kodelokasireklame_by_obyek'
			,'refhargatanah_by_nop' => 'refhargatanah_by_nop'
			,'KelasObyekByBidang' => 'KelasObyekByBidang'
			,'getInfoSubyekByNIK' => 'getInfoSubyekByNIK'
			,'AutocompletePenerima' => 'AutocompletePenerima'
			,'AutocompleteSubyekBPHTB' => 'AutocompleteSubyekBPHTB'
			,'kabkota_by_prov' => 'kabkota_by_prov'
			,'kec_by_kabkota' => 'kec_by_kabkota'
			,'kel_by_kec' => 'kel_by_kec'
			,'kodepos_by_kec_kel' => 'kodepos_by_kec_kel'
			,'subrekening' => 'subrekening'
		);

		if ( in_array($param, $allowedMods) ) {
			call_user_func('Open_dataController::'.$param);
		}
	}

	public static function kelurahan_by_kecamatan()
	{
		$select = '*';
		$from = 'REFKELURAHAN';
		$filter = array(
			'EQ__REFKECAMATAN_ID' => (int)($_REQUEST['id'])
		);

		$otherquery = array(
			'order'=> 'REFKELURAHAN_KODE ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data = DBFetch::query($arrayConfig);
		
		header('Content-type: text/json');
		header('Content-type: application/json');
		$result = array();
		$row = array();

		if (count($data)>0) {
			foreach($data as $list)
			{	
				/* $row[] = array(
					"id"=> $list['REFKELURAHAN_ID'],
					'value'=> '[' . $list['REFKELURAHAN_KODE'] .'] ' . $list['REFKELURAHAN_NAMA']
				); */
				$row[] = array(
					"value"=> $list['REFKELURAHAN_ID'],
					'text'=> '[' . $list['REFKELURAHAN_KODE'] .'] ' . $list['REFKELURAHAN_NAMA']
					,'kodepos'=> $list['REFKELURAHAN_KODEPOS']
				);
			}
			$result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			echo CJSON::encode($result);
		}
	}

	public static function izinpermohonan_by_izin()
	{
		$select = '*';
		$from = 'tblizinpermohonan';
		$filter = array(
			'EQ__tblizin_id' => (int)($_REQUEST['id'])
			,'EQ__tblizinpermohonan_isaktif' =>"T"
		);

		$otherquery = array(
			'order'=> 'tblizinpermohonan_nama ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data = DBFetch::query($arrayConfig);
		
		header('Content-type: text/json');
		header('Content-type: application/json');

		$result = array();
		$row = array();

		if (count($data)>0) {
			foreach($data as $list)
			{	
				$row[] = array(
					"id"=> $list['tblizinpermohonan_id'],
					'value'=> $list['tblizinpermohonan_nama']
				);
			}
			$result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			echo CJSON::encode($result);
		}
	}

	public static function persyaratan_by_izinpermohonan()
	{
		$id = (int)($_REQUEST['id']);
		$select = '*';
		$from = 'tblizinpersyaratan';
		$filter = array(
			'EQ__tblizinpermohonan_id' => ($id)
		);

		$otherquery = array(
			'join_syarat'=> array('tblpersyaratan','tblpersyaratan.tblpersyaratan_id = tblizinpersyaratan.tblpersyaratan_id')
			,'order'=> 'tblizinpersyaratan_urut ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data = DBFetch::query($arrayConfig);

		/*select render type*/
		if (isset($_REQUEST['rendertype']) && $_REQUEST['rendertype']=='html') {
			if (count($data)>0) {
				foreach($data as $list)
				{	
					echo '<label class="checkbox syarat-'.$id.'">
						<input type="checkbox" id="'.$list['tblizinpersyaratan_id'].'" value="'.$list['tblizinpersyaratan_id'].'" name="checkbox">
						<i></i>'.$list["tblpersyaratan_nama"].'</label>';
				}

				echo "<hr>";
			}
			else {
				echo "-----";
			}

			Yii::app()->end();
		}
		/*select render type*/
		
		header('Content-type: text/json');
		header('Content-type: application/json');

		$result = array();
		$row = array();

		if (count($data)>0) {
			foreach($data as $list)
			{	
				$row[] = array(
					"id"=> $list['tblpersyaratan_id'],
					'value'=> $list['tblpersyaratan_nama']
				);
			}
			$result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			echo CJSON::encode($result);
		}
	}

	public static function multi_persyaratan_by_izinpermohonan()
	{
		/*
		SELECT
		tblizinpersyaratan.tblizinpermohonan_id,
		tblpersyaratan.tblpersyaratan_nama
		FROM
		tblizinpersyaratan
		INNER JOIN tblpersyaratan ON tblizinpersyaratan.tblpersyaratan_id = tblpersyaratan.tblpersyaratan_id
		WHERE
		tblizinpersyaratan.tblizinpermohonan_id IN (24,29,30)
		GROUP BY tblpersyaratan.tblpersyaratan_id
		ORDER BY tblpersyaratan_nama
		*/
		$select_multi = 'tblizinpermohonan_id';
		$from_multi = 'tblizinpendaftaranmulti';
		$filter_multi = array(
			'EQ__tblpemohon_id' => (int)$_REQUEST['id'] // id pemohon
			, 'EQ__tblpengguna_id' => Yii::app()->user->getId()
		);
		$otherquery_multi = array(
			'group'=>'tblizinpermohonan_id'
		);

		$list_permohonan = DBFetch::query( array('select'=>$select_multi, 'from'=>$from_multi, 'otherquery'=>$otherquery_multi, 'mode'=>'LIST') );

		$idmohon = '';
		foreach ($list_permohonan as $permohonan) {
			// looping id permohonan
			$idmohon .= $permohonan['tblizinpermohonan_id'].',';
		}
		$idmohon = trim($idmohon, ','); //bersihkan , diawal/akhir

		$select = 'tblizinpersyaratan.tblizinpermohonan_id,
		tblpersyaratan.tblpersyaratan_nama,
		tblizin.tblizin_nama,
		tblizinpermohonan.tblizinpermohonan_nama
		';
		$from = 'tblizinpersyaratan';
		$filter = array(
			'EQ__tblizinpermohonan_id' => ($id)
		);

		$otherquery = array(
			'join_syarat'=> array('tblpersyaratan','tblpersyaratan.tblpersyaratan_id = tblizinpersyaratan.tblpersyaratan_id')
			,'join_permohonan'=> array('tblizinpermohonan','tblizinpermohonan.tblizinpermohonan_id = tblizinpersyaratan.tblizinpermohonan_id')
			,'join_izin'=> array('tblizin','tblizin.tblizin_id = tblizinpersyaratan.tblizin_id')
			,'andwhere'=> 'tblizinpersyaratan.tblizinpermohonan_id IN ('.$idmohon.')'
			,'order'=> 'tblizinpersyaratan_urut ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data = DBFetch::query($arrayConfig);

		// print_r($data);Yii::app()->end();
		

		/*select render type*/
		if (isset($_REQUEST['rendertype']) && $_REQUEST['rendertype']=='html') {
			if (count($data)>0 && $idmohon!='') {
				foreach($data as $list)
				{	
					echo '<label class="checkbox syarat-'.$id.'">
						<input type="checkbox" id="'.$list['tblizinpersyaratan_id'].'" value="'.$list['tblizinpersyaratan_id'].'" name="checkbox">
						<i></i>'.$list["tblpersyaratan_nama"].'('.$list["tblizin_nama"].' - '.$list["tblizinpermohonan_nama"].')</label>';
				}

				echo "<hr>";
			}
			else {
				echo "-----";
			}

			Yii::app()->end();
		}
		/*select render type*/
		
		header('Content-type: text/json');
		header('Content-type: application/json');

		$result = array();
		$row = array();

		if (count($data)>0 && $idmohon!='') {
			foreach($data as $list)
			{	
				$row[] = array(
					"id"=> $list['tblpersyaratan_id'],
					'value'=> $list['tblpersyaratan_nama']
				);
			}
			$result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			echo CJSON::encode($result);
		}
	}

	public function getStatusProses($id)
	{
		# code...
	}

	public function AutocompleteRekening()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');
		Yii::import('ext.LokalIndonesia');
		$query = trim($_REQUEST['query']);
		$kode = isset($_REQUEST['tblmasterrekening_kode']) ? (int)$_REQUEST['tblmasterrekening_kode'] :0;
		$results = array();

		$select = '*,LENGTH(tblmasterrekening_kode) AS pjg';
		$from = 'tblmasterrekening';
		$filter = array(
			'LK__tblmasterrekening_nama' => $query
			,'LKR__tblmasterrekening_kode' => $query
		);

		$otherquery = array(
			'limit'=> 30
			,'order'=> 'tblmasterrekening_kode ASC'
			,'having'=> 'pjg=7'
			,'andwhere'=> array("LEFT(tblmasterrekening_kode,5)=:kode AND tblmasterrekening_aktif='T'" , array(':kode' => strval($kode) ) )
		);

		if (isset($_REQUEST['allrek']) && $_REQUEST['allrek']=='T') {
			unset($otherquery['andwhere']);
		}

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$results = DBFetch::query($arrayConfig);

		$suggestions = array();
		 
		foreach($results as $result)
		{
			$suggestions[] = array(
			"value" => '[' . $result['tblmasterrekening_kode'] . '] ' . $result['tblmasterrekening_nama'],
			"data" => $result['tblmasterrekening_id']
		);
		}
		 
		echo json_encode(array('suggestions' => $suggestions));
	}

	public function AutocompleteSubyek()
	{
		$query = trim($_REQUEST['query']);
		$wn = isset($_REQUEST['tblsubyek_wn']) ? filter_var( $_REQUEST['tblsubyek_wn'], FILTER_SANITIZE_SPECIAL_CHARS) : "";
		$jenisusaha = isset($_REQUEST['tblsubyek_jenisusaha']) ? filter_var( $_REQUEST['tblsubyek_jenisusaha'], FILTER_SANITIZE_SPECIAL_CHARS) : "";
		$results = array();

		if (isset($_REQUEST['bphtb']) && $_REQUEST['bphtb']=='true') {
			$wn = 'WNI';
			$jenisusaha = 'Perorangan';
		}

		$idjenispemohon = '';
		if ($jenisusaha == 'Perorangan') {
			$idjenispemohon = 1;
		}
		if ($jenisusaha == 'Badan Usaha') {
			$idjenispemohon = 2;
		}


		$select = '*';
		$from = 'TSUBYEK';
		$filter = array(
			'LK__TSUBYEK_BUNAMAMERK' => strtolower($query)
		);

		$filter_AND = array(
			'EQ__REFJENISWP_ID' => $idjenispemohon
		);

		$otherquery = array(
			'limit'=> 30
			,'order'=> 'TSUBYEK_BUNAMAMERK ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$results = DBFetch::query($arrayConfig);

		$suggestions = array();
		 
		foreach($results as $result)
		{
			$identitynumber = '';
			if (2==$result['REFJENISWP_ID']) {
				$identitynumber = $result['TSUBYEK_BUNPWP'];
			}
			elseif (1==$result['REFJENISWP_ID']) {
				$identitynumber = $result['TSUBYEK_BUNIK'];
			}
			$suggestions[] = array(
			"value" => $result['TSUBYEK_BUNAMAMERK'] . ' | Alamat: ' . $result['TSUBYEK_BUALAMAT']
			,"data" => $result['TSUBYEK_ID']
			,"TSUBYEK_BUALAMAT" => $result['TSUBYEK_BUALAMAT']
			,"REFJENISWP_NAMA" => $jenisusaha
			,"identitynumber" => $identitynumber
		);
		}
		 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function AutocompleteObyek()
	{
		$query = trim($_REQUEST['query']);

		$select = '*';
		$from = 'TNPWPD';
		$filter = array(
			'LK__TNPWPD_MILIKNAMA' => $query
			,'LK__TNPWPD_NPWPD' => $query
		);

		$filter_AND = array(
			// 'EQ__tblsubyek_wn' => $wn
			// ,'EQ__tblsubyek_jenisusaha' => $jenisusaha
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			'limit'=> 30
			,'order'=> 'TNPWPD_NPWPD ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$results = DBFetch::query($arrayConfig);

		$suggestions = array();
		 
		foreach($results as $result)
		{
			$suggestions[] = array(
			"value" => '[' . $result['TNPWPD_NPWPD'] . '] ' . $result['TNPWPD_MILIKNAMA']
			,"data" => $result['TNPWPD_ID']
			,"TNPWPD_MILIKNAMA" => $result['TNPWPD_MILIKNAMA']
			,"TNPWPD_NPWPD" => $result['TNPWPD_NPWPD']
			,"TNPWPD_MILIKALAMAT" => $result['TNPWPD_MILIKALAMAT']
		);
		}
		 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function AutocompleteSubyekBPHTB()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');
		$query = strtolower( trim($_REQUEST['query']) );
		$results = array();

		$results = Yii::app()->db->createCommand()
		->select('TBLSUBYEKBPHTB_NAMA, TBLSUBYEKBPHTB_ID')
		->from('TBLSUBYEKBPHTB')
		->where('LOWER(TBLSUBYEKBPHTB.TBLSUBYEKBPHTB_NAMA) like :nama',array(':nama'=>'%'.$query.'%'))
		->limit(30)
		->group('TBLSUBYEKBPHTB_NAMA, TBLSUBYEKBPHTB_ID')
		->queryAll();

		$suggestions = array();

		foreach($results as $result)
		{
			$suggestions[] = array(
				"value" => $result['TBLSUBYEKBPHTB_NAMA']
				,"data" => $result['TBLSUBYEKBPHTB_ID']
				);
		}

		echo json_encode(array('suggestions' => $suggestions));

	}

	public function detail_pemohon()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');
		$result = array();

		$select = '*';
		$from = 'tblsubyek';
		$filter = array(
			'EQ__tblsubyek_id' => (int)$_REQUEST['id']
		);

		$otherquery = array(
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
		$result = DBFetch::query($arrayConfig);
		 
		echo CJSON::encode($result);
	}

	public static function isExist()
	{
		$table = filter_var( base64_decode( $_REQUEST['table'] ), FILTER_SANITIZE_SPECIAL_CHARS);
		$field = filter_var( base64_decode( $_REQUEST['field'] ), FILTER_SANITIZE_SPECIAL_CHARS);
		$value = filter_var($_REQUEST['value'], FILTER_SANITIZE_SPECIAL_CHARS);

		$filter = array(
			'EQ__' . $table . '.' . $field => $value
		);

		$arrayConfig = array('select'=>'COUNT('.$field.')','from'=>$table,'filter'=>$filter,'mode'=>'SCALAR');
		$result = DBFetch::query($arrayConfig);

		$isBoleh = 'true';
		if ($result >= 1) {
			$isBoleh = 'false';
		}

		if (isset($_REQUEST['cmdcek'])) {
			// abaikan jika command cmdcek edit
			$ex = explode('x0*',$_REQUEST['cmdcek']);
			$idx = explode('x0*',$_REQUEST['idx']); //jika ada idnya

			if (base64_decode($ex[1])=='edit') {
				$suby = TSUBYEK::model()->findByPk( (int)base64_decode($idx[1]) );
				if ($suby->{$field} == $value) { //jika field yg dibandingkan sama, maka anggap validasi sudah ada kita abaikan
					$isBoleh = 'true';
				}
			}
		}
		 
		// echo CJSON::encode( array('valid'=>$isBoleh, 'message'=>'Sudah ada') );
		echo $isBoleh;
	}

	public static function bidang_by_jenis()
	{
		$kode_jenis = (int)$_REQUEST['kode_jenis'];
		$select = '
			tblmasterrekening.tblmasterrekening_kode,
			tblmasterrekening.tblmasterrekening_nama,
			LENGTH(tblmasterrekening_kode) AS pjg_kode,
			SUBSTR(tblmasterrekening_kode,1,3) AS kode_jenis';
		$from = 'tblmasterrekening';
		$filter = array(
		);

		$otherquery = array(
			'order'=> 'tblmasterrekening_kode ASC'
			,'having'=> "pjg_kode = 5 AND kode_jenis = " . $kode_jenis
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data = DBFetch::query($arrayConfig);
		
		header('Content-type: text/json');
		header('Content-type: application/json');
		$result = array();
		$row = array();

		if (count($data)>0) {
			foreach($data as $list)
			{	
				$row[] = array(
					"id"=> $list['tblmasterrekening_kode'],
					'value'=> '[' . $list['tblmasterrekening_kode'] . '] ' . $list['tblmasterrekening_nama']
				);
			}
			$result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			echo CJSON::encode($result);
		}
	}

	public function tarif_reklame()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$kelasjalan = isset($_REQUEST['kelasjalan']) ? filter_var( $_REQUEST['kelasjalan'] , FILTER_SANITIZE_SPECIAL_CHARS) : 0;
		$iskelasjalan = isset($_REQUEST['iskelasjalan']) ? filter_var( $_REQUEST['iskelasjalan'] , FILTER_SANITIZE_SPECIAL_CHARS) : 'T';
		if ($iskelasjalan=='F') {
			$kelasjalan = '';
		}
		$filter = array('EQ__refjenisreklame_id'=>(int)$_REQUEST['refjenisreklame_id'],'EQ__refreklamehdpp_kelasjalan'=>$kelasjalan);
		$otherquery = array();
		$rek_tarif = DBFetch::query( array('select'=>"*, ",'from'=>'refreklamehdpp','filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL') );
		header('Content-type: text/json');
		header('Content-type: application/json');
		echo CJSON::encode(array('status'=>$rek_tarif ? "found" : "notfound",'info'=>$rek_tarif));
	}

	public function tarif_reklame_tinggi()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$filter = array('LTEQ__refreklamenilaiketinggian_bawah'=>(int)$_REQUEST['tinggi'],'GTEQ__refreklamenilaiketinggian_batasatas'=>(int)$_REQUEST['tinggi']);

		$otherquery = array();
		$rek_tarif = DBFetch::query( array('select'=>"*, ",'from'=>'refreklamenilaiketinggian','filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL') );
		header('Content-type: text/json');
		header('Content-type: application/json');
		echo CJSON::encode(array('status'=>$rek_tarif ? "found" : "notfound",'info'=>$rek_tarif));
	}

	public function tarif_reklame_kepadatan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$filter = array('EQ__refreklameprasarana_id'=>(int)$_REQUEST['id'],'LTEQ__refreklameskorkepadatan_batasbawah'=>(int)$_REQUEST['ukuranmedia'],'GTEQ__refreklameskorkepadatan_batasatas'=>(int)$_REQUEST['ukuranmedia']);

		$otherquery = array();
		$rek_tarif = DBFetch::query( array('select'=>"*, ",'from'=>'refreklameskorkepadatan','filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL') );
		header('Content-type: text/json');
		header('Content-type: application/json');
		echo CJSON::encode(array('status'=>$rek_tarif ? "found" : "notfound",'info'=>$rek_tarif));
	}

	public function tabeldetail_airtanah()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		/*SELECT *, 2601 AS vol, refairtanahvolume_id AS maxid
		FROM refairtanahvolume
		HAVING vol BETWEEN refairtanahvolume_batasbawah AND refairtanahvolume_batasatas*/
		
		$vol = isset($_REQUEST['vol']) ? filter_var( LokalIndonesia::toAngka($_REQUEST['vol']) , FILTER_VALIDATE_FLOAT) : 0;
		$otherquery = array('having'=>'vol BETWEEN refairtanahvolume_batasbawah AND refairtanahvolume_batasatas');

		$airt = DBFetch::query( array('select'=>"*, ".$vol." AS vol, refairtanahvolume_id AS maxid",'from'=>'refairtanahvolume','otherquery'=>$otherquery,'mode'=>'DETAIL') );
		$maxid = $airt['maxid'];

		/*SELECT * FROM refairtanahvolume
		WHERE refairtanahvolume_id<=5;*/

		$filter = array('LTEQ__refairtanahvolume_id'=>(int)$maxid);
		$tbl = DBFetch::query( array('select'=>"*",'from'=>'refairtanahvolume','filter'=>$filter,'otherquery'=>array('order'=>'refairtanahvolume_urut ASC'),'mode'=>'LIST') );
		
		header('Content-type: text/json');
		header('Content-type: application/json');
		echo CJSON::encode(array('status'=>$airt ? "found" : "notfound",'table'=>$tbl));
	}

	public function autocomplete_nosptpd()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');
		$query = trim($_REQUEST['query']);
		$tahun = isset($_REQUEST['tahun']) && $_REQUEST['tahun']!='' ? (int)$_REQUEST['tahun'] : "";
		$subyekid = isset($_REQUEST['subyekid']) && $_REQUEST['subyekid']!='' ? (int)$_REQUEST['subyekid'] : 0;
		$results = array();

		$filter = array(
			'LKR__tblobyek_nomorsptpd'=>$query
			);

		$filter_AND = array(
			'EQ__tblsubyek_id'=>$subyekid
			,'EQ__tbltransaksiketetapan_tahunpajak'=>$tahun
			);
		$otherquery = array(
			'leftjoin_tbltransaksiketetapan'=>array('tbltransaksiketetapan','tbltransaksiketetapan.tblobyek_id=tblobyek.tblobyek_id')
			,'leftjoin_rek'=>array('tblmasterrekening','tblmasterrekening.tblmasterrekening_id=tblobyek.tblmasterrekening_id')
			,'limit'=>30
			,'andwhere'=>'LEFT(tblmasterrekening_kode,5)="41104"'
			,'group'=>'tblobyek.tblobyek_id '
			);

		$results = DBFetch::query( array('from'=>'tblobyek','filter_AND'=>$filter_AND,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST') );

		/*$results = Obyek::model()->findAll(
			array(
				'condition'=>'tblobyek_nomorsptpd LIKE :xxx AND tbl'
				, 'params'=>array(':xxx'=>'%'.$query.'%')
				,'limit'=>40
				)
			);*/
		$suggestions = array();

		foreach($results as $result)
		{
			$suggestions[] = array(
				"value" => '['.$result['tblobyek_nomorsptpd'].'] '. $result['tblobyek_nama'],
				"data" => $result['tblobyek_id'],
				"nonpwpd" => $result['tblobyek_npwpd'],
				"namawp" => $result['tblobyek_nama']
				);
		}

		echo json_encode(array('suggestions' => $suggestions));
	}

	public static function kodelokasireklame_by_obyek()
	{
		$select = '*';
		$from = 'tblpendataanreklame';
		$filter = array(
			'EQ__tblobyek.tblobyek_id' => (int)($_REQUEST['id'])
		);

		$otherquery = array(
			'join_trans' => array('tbltransaksiketetapan','tbltransaksiketetapan.tbltransaksiketetapan_id=tblpendataanreklame.tbltransaksiketetapan_id')
			,'join_oby' => array('tblobyek','tbltransaksiketetapan.tblobyek_id=tblobyek.tblobyek_id')
			// 'order'=> 'refkelurahan_nama ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data = DBFetch::query($arrayConfig);
		
		header('Content-type: text/json');
		header('Content-type: application/json');
		$result = array();
		$row = array();

		if (count($data)>0) {
			foreach($data as $list)
			{	
				$row[] = array(
					"value"=> $list['tbltransaksiketetapan_id'],
					"idpendataan"=> $list['tblpendataanreklame_id'],
					'text'=> '[' . $list['tblpendataanreklame_kodelokasi'] . '] ' . $list['tblpendataanreklame_judul']
				);
			}
			$result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			echo CJSON::encode($result);
		}
	}

	public static function getlastid($SEQ_NAMA)
	{
		$getlastid=Yii::app()->db->createCommand('SELECT '.$SEQ_NAMA.'.NEXTVAL AS LASTID
		FROM DUAL');
		return $getlastid->queryScalar();
	}

	public function refhargatanah_by_nop()
	{
		$nop = (int)$_REQUEST['nop'];
		$jenis = (int)$_REQUEST['jenis'];
		$select = '*';
		$from = 'T_BPHTB';
		$filter = array(
			'LKR__sppt_pbb_nop' => $nop!=0 ?  substr($nop, 0, 13) : "INVALID"
			,'EQ__kode_perolehan' => $jenis
		);

		$otherquery = array(
			'leftjoin_perolehan' => array('REFBPHTBPEROLEHAN','REFBPHTBPEROLEHAN.REFBPHTBPEROLEHAN_ID=T_BPHTB.kode_perolehan')
			// 'order'=> 'kolom ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data = DBFetch::query($arrayConfig);
		
		header('Content-type: text/json');
		header('Content-type: application/json');
		$result = array();
		$row = array();

		if (count($data)>0) {
			foreach($data as $list)
			{	
				$row[] = array(
					"sppt_pbb_njop_tanah"=> $list['sppt_pbb_njop_tanah'],
					"nop"=> $nop,
					"jenis_bphtb"=> $list['REFBPHTBPEROLEHAN_KETERANGAN'],
					"luas_tanah"=> $list['luas_tanah'],
					"luas_bangunan"=> $list['luas_bangunan'],
					"harga_transaksi"=> $list['harga_transaksi'],
					"harga_per_meter"=> $list['harga_transaksi']/$list['luas_tanah'],
				);
			}
			$result['status'] = 'found';
			$result['data'] = $row;
			// $result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			$result['status'] = 'notfound';
			echo CJSON::encode($result);
		}
	}

	public static function KelasObyekByBidang()
	{
		Yii::import('ext.LokalIndonesia');
		$query = trim($_REQUEST['query']);
		$kode = isset($_REQUEST['TBLMSTRREKNG_KODE']) ? (int)$_REQUEST['TBLMSTRREKNG_KODE'] :0;
		$results = array();

		$select = '*,LENGTH(TBLMSTRREKNG_KODE) AS pjg,RIGHT(TBLMSTRREKNG_KODE,2) as kode ';
		$from = 'TBLMSTRREKNG';
		$filter = array(
			'LK__TBLMSTRREKNG_NAMA' => $query
			,'LKR__TBLMSTRREKNG_KODE' => $query
		);

		$otherquery = array(
			'limit'=> 30
			,'order'=> 'TBLMSTRREKNG_KODE ASC'
			,'having'=> 'pjg=7'
			,'andwhere'=> array("LEFT(TBLMSTRREKNG_KODE,5)=:kode AND TBLMSTRREKNG_AKTIF='T'" , array(':kode' => strval($kode) ) )
		);

		if (isset($_REQUEST['allrek']) && $_REQUEST['allrek']=='T') {
			unset($otherquery['andwhere']);
		}

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$results = DBFetch::query($arrayConfig);
		
		header('Content-type: text/json');
		header('Content-type: application/json');
		$result = array();
		$row = array();

		if (count($results)>0) {
			foreach($results as $list)
			{	
				$row[] = array(
					"id"=> $list['TBLMSTRREKNG_ID']
					,'value'=> '[' . $list['kode'] . '] ' . $list['TBLMSTRREKNG_NAMA']
				);
			}
			$result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			echo CJSON::encode($result);
		}
	}

	public function getInfoSubyekByNIK()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');

		$id = $_REQUEST['id'];

		$select = '* ';
		$from = 'TBLPNRMBPHTB';
		$filter = array(
			'EQ__TBLPNRMBPHTB_NIK' => $id
		);

		$otherquery = array(
		);
		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'mode'=>'DETAIL');
		$result = DBFetch::query($arrayConfig);
		if ($result) {
			echo CJSON::encode(array('status'=>'found', 'data'=>$result));
		} else {
			echo CJSON::encode(array('status'=>'notfound'));
		}
	}

	public function AutocompletePenerima()
	{
		$query = trim($_REQUEST['query']);
		$type = isset($_REQUEST['identitytype']) ? filter_var( $_REQUEST['identitytype'], FILTER_SANITIZE_SPECIAL_CHARS) : "";
		$results = array();

		$type=strtoupper($type);
		if (!in_array($type, explode(',','NIK,NPWP'))) {
			echo CJSON::encode(array('status'=>'not allowed'));
			Yii::app()->end();
		}

		$select = '*';
		$from = 'TBLPNRMBPHTB';
		$filter = array(
			'LKL__TBLPNRMBPHTB_'.strtoupper($type) => str_replace('-', '', str_replace('.', '', str_replace('X', '', $query)))
		);

		$filter_AND = array(
			
		);

		$otherquery = array(
			'limit'=> 30
			,'order'=> 'TBLPNRMBPHTB_NAMA ASC'
			,'group'=> 'TBLPNRMBPHTB_'.strtoupper($type)
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		// $results = DBFetch::query($arrayConfig);
		$results = Yii::app()->db->createCommand("SELECT * FROM (
			SELECT TBLPNRMBPHTB_NIK,TBLPNRMBPHTB_NAMA,TBLPNRMBPHTB_ALAMAT,TBLPNRMBPHTB_NPWP
			FROM TBLPNRMBPHTB
			WHERE TBLPNRMBPHTB_NIK LIKE '%".str_replace('-', '', str_replace('.', '', str_replace('X', '', str_replace('_', '', $query))))."%'
			GROUP BY TBLPNRMBPHTB_NIK,TBLPNRMBPHTB_NAMA,TBLPNRMBPHTB_ALAMAT,TBLPNRMBPHTB_NPWP
			)
			WHERE
			ROWNUM <=30
			ORDER BY TBLPNRMBPHTB_NAMA ASC")->queryAll();

		$suggestions = array();
		 
		foreach($results as $result)
		{
			$suggestions[] = array(
				"value" => $result['TBLPNRMBPHTB_NAMA'] . ' | Alamat: ' . $result['TBLPNRMBPHTB_ALAMAT']
				,"data" => $result['TBLPNRMBPHTB_'.$type]
				,"TBLPNRMBPHTB_ALAMAT" => $result['TBLPNRMBPHTB_ALAMAT']
				,"TBLPNRMBPHTB_NAMA" => $result['TBLPNRMBPHTB_NAMA']
				,"TBLPNRMBPHTB_NIK" => $result['TBLPNRMBPHTB_NIK']
				,"TBLPNRMBPHTB_NPWP" => $result['TBLPNRMBPHTB_NPWP']
			);
		}
		 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public static function kabkota_by_prov()
	{
		$select = '*';
		$from = 'TBLKABUPATEN';
		$filter = array(
			'EQ__TBLPROVINSI_KODE' => (int)($_REQUEST['id'])
		);

		$otherquery = array(
			'order'=> 'TBLKABUPATEN_KODE ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data = DBFetch::query($arrayConfig);
		
		header('Content-type: text/json');
		header('Content-type: application/json');
		$result = array();
		$row = array();

		if (count($data)>0) {
			foreach($data as $list)
			{	
				$row[] = array(
					"value"=> $list['TBLKABUPATEN_KODE']
					,'text'=> $list['TBLKABUPATEN_NAMA']
					// ,'text'=> '[' . $list['TBLKABUPATEN_KODE'] .'] ' . $list['TBLKABUPATEN_NAMA']
				);
			}
			$result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			echo CJSON::encode($result);
		}
	}

	public static function kec_by_kabkota()
	{
		$select = '*';
		$from = 'TBLKECAMATAN';
		$filter = array(
			'EQ__TBLKABUPATEN_KODE' => (int)($_REQUEST['id'])
		);

		$otherquery = array(
			'order'=> 'TBLKECAMATAN_KODE ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data = DBFetch::query($arrayConfig);
		
		header('Content-type: text/json');
		header('Content-type: application/json');
		$result = array();
		$row = array();

		if (count($data)>0) {
			foreach($data as $list)
			{	
				$row[] = array(
					"value"=> $list['TBLKECAMATAN_KODE']
					,'text'=> $list['TBLKECAMATAN_NAMA']
					// ,'text'=> '[' . $list['TBLKECAMATAN_KODE'] .'] ' . $list['TBLKECAMATAN_NAMA']
					,'nama'=> $list['TBLKECAMATAN_NAMA']
					,'kodekec'=> $list['TBLKECAMATAN_KD']
				);
			}
			$result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			echo CJSON::encode($result);
		}
	}

	public static function kel_by_kec()
	{
		$select = '*';
		$from = 'TBLKELURAHAN';
		$filter = array(
			'EQ__TBLKECAMATAN_KODE' => (int)($_REQUEST['id'])
		);

		$otherquery = array(
			'order'=> 'TBLKELURAHAN_KODE ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data = DBFetch::query($arrayConfig);
		
		header('Content-type: text/json');
		header('Content-type: application/json');
		$result = array();
		$row = array();

		if (count($data)>0) {
			foreach($data as $list)
			{	
				$row[] = array(
					"value"=> $list['TBLKELURAHAN_KODE']
					,'text'=> $list['TBLKELURAHAN_NAMA']
					// ,'text'=> '[' . $list['TBLKELURAHAN_KODE'] .'] ' . $list['TBLKELURAHAN_NAMA']
					,'nama'=> $list['TBLKELURAHAN_NAMA']
					,'kodekel'=> $list['TBLKELURAHAN_KD']
				);
			}
			$result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			echo CJSON::encode($result);
		}
	}

	public static function kodepos_by_kec_kel()
	{
		$namakec = trim($_POST['kec']);
		$namakel = trim($_POST['kel']);
		$select = 'PROVINCE, CITYKAB, CITYKABNAME, KEC_SUBDISTRICT, KELURAHAN_VILLAGE, POSTAL_CODE';
		$from = 'POSKODE';
		$filter = array(
			'LK__KEC_SUBDISTRICT' => (strtolower($namakec))
			, 'LK__KELURAHAN_VILLAGE' => (strtolower($namakel))
		);

		$otherquery = array(
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
		$data = DBFetch::query($arrayConfig);
		
		header('Content-type: text/json');
		header('Content-type: application/json');

		echo CJSON::encode($data);
	}

	public static function subrekening()
	{
		$select = '*';
		$from = 'TBLREKENING';
		$filter = array(
			'LKR__TBLREKENING_KODE' => substr($_REQUEST['kode'], 0, 8)
		);

		$otherquery = array(
			'order'=> 'TBLREKENING_KODE ASC'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'LIST');
		$data = DBFetch::query($arrayConfig);
		
		header('Content-type: text/json');
		header('Content-type: application/json');
		$result = array();
		$row = array();

		if (count($data)>0) {
			foreach($data as $list)
			{	
				$row[] = array(
					"value"=> $list['TBLREKENING_KODE']
					,'text'=> '[' . $list['TBLREKENING_KODE'] .'] ' . $list['TBLREKENING_NAMAREKENING']
					,'nama'=> $list['TBLREKENING_NAMAREKENING']
					,'pct'=> $list['TBLREKENING_TARIF']
				);
			}
			$result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			echo CJSON::encode($result);
		}
	}
}