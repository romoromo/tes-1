<?php

class Skpdkb_hotelController extends Controller
{
	var $KODE_GOL = 3;
	var $PAJAK_AYAT = 1;
	var $PAJAK_REK = '4.1.1.1.0';

	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['sub_rek'] = TRekening::model()->getRekeningSubAktif('4110100');

		$data['rek'] = Yii::app()->db->createCommand("
		SELECT * 
		FROM TBLREKENING
		WHERE TBLREKENING_KODE LIKE '4.1.1.1.%'
		ORDER BY TBLREKENING_KODE
		")
		->queryAll();

		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionautocompletewphotel()
	{
		header('Content-type: text/json');
		header('Content-type: application/json');
		
		$query = trim($_REQUEST['query']);

		$select = 'TBLDAFTHOTEL.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT';
		$from = 'TBLDAFTHOTEL';
		$filter = array(
			'LK__TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA' => $query
			,'LK__TBLDAFTAR.TBLDAFTAR_NOPOK' => $query
		);

		$filter_AND = array(
			//'EQ__TREKENING_KODE' => '4110100'
			// ,'EQ__tblsubyek_jenisusaha' => $jenisusaha
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHOTEL.TBLDAFTAR_NOPOK')
			,'order'=> 'TBLDAFTHOTEL.TBLDAFTAR_NOPOK ASC'
			,'group'=> 'TBLDAFTHOTEL.TBLDAFTAR_NOPOK, TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA, TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT'
		);

		$arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'LIST');
		$results = DBFetch::query($arrayConfig);

		$suggestions = array();
		 
		foreach($results as $result)
		{
			$suggestions[] = array(
			"value" => $result['TBLDAFTAR_NOPOK']. ' | ' . $result['TBLDAFTAR_BADANUSAHANAMA']
			,"data" => $result['TBLDAFTAR_NOPOK']
			,"TBLDAFTAR_BADANUSAHANAMA" => $result['TBLDAFTAR_BADANUSAHANAMA']
			,"TBLDAFTAR_BADANUSAHAALAMAT" => $result['TBLDAFTAR_BADANUSAHAALAMAT']
			,"TBLDAFTAR_NOPOK" => $result['TBLDAFTAR_NOPOK']
			);
		}
 
		echo CJSON::encode(array('suggestions' => $suggestions));
	}

	public function actiongetdata()
	{
		$TBLDAFTAR_NOPOK = trim($_POST['TBLDAFTAR_NOPOK']);
		$bulan = trim($_POST['bulan']);
		$tahun = trim($_POST['tahun']);
		$tahun_substr = substr($tahun, -2);
		$proses = $this->cekProses($tahun_substr, $bulan, $TBLDAFTAR_NOPOK);
		$cek = $this->cekPernahDaftar($tahun_substr, $bulan, $TBLDAFTAR_NOPOK);
		$bayar =$this->cekBayar($tahun_substr, $bulan, $TBLDAFTAR_NOPOK);
		$angsur =$this->cekAngsur($tahun_substr, $bulan, $TBLDAFTAR_NOPOK);

		if ($bayar > 0) {
			$data['data'] = 'sudah dibayar';	
		} else if ($angsur > 0){
			$data['data'] = 'ada angsur';
		} else if ($cek == 0){
			$data['data'] = 'belum terdaftar';
		}else if ($proses > 0){

			// if ($cek>0) {
			$data['data'] = 'sudah entri'; // KB nya sudah ada
			
			$select = "
			TBLDAFTAR.TBLDAFTAR_NOPOK,
			TBLDAFTAR.TBLDAFTAR_GOLONGAN,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
			TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
			TBLDAFTAR.TBLDAFTAR_ISAKTIF,
			TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
			TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
			REFBADANUSAHA.REKENING_KODE,
			REFBADANUSAHA.REFBADANUSAHA_REKPENDAPATAN,
			REFBADANUSAHA.REFBADANUSAHA_REKPAD,
			REFBADANUSAHA.REFBADANUSAHA_REKPJK,
			REFBADANUSAHA.REFBADANUSAHA_REKAYAT,
			REFBADANUSAHA.REFBADANUSAHA_REKJENIS,
			REFBADANUSAHA.REFBADANUSAHA_PERSEN,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_NOMORPERIKSA, 0) AS TBLDAFTHOTEL_NOMORPERIKSA,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_REGKURANGBAYAR, 0) AS TBLDAFTHOTEL_REGKURANGBAYAR,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_PAJAKPERIKSA,0) AS TBLDAFTHOTEL_PAJAKPERIKSA,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BUNGAKRGBAYAR,0) AS TBLDAFTHOTEL_BUNGAKRGBAYAR,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_DENDAKRGBAYAR,0) AS TBLDAFTHOTEL_DENDAKRGBAYAR,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_KENAIKANKRGBAYAR,0) AS TBLDAFTHOTEL_KENAIKANKRGBAYAR,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHKRGBAYAR,0) AS TBLDAFTHOTEL_RUPIAHKRGBAYAR,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BLNKBAWAL,0) AS TBLDAFTHOTEL_BLNKBAWAL,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BLNKBAKHIR,0) AS TBLDAFTHOTEL_BLNKBAKHIR,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_TGLKURANGBAYAR,0) AS TBLDAFTHOTEL_TGLKURANGBAYAR,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BLNKURANGBAYAR,0) AS TBLDAFTHOTEL_BLNKURANGBAYAR,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_THNKURANGBAYAR,0) AS TBLDAFTHOTEL_THNKURANGBAYAR,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_TGLBTSKRGBAYAR,0) AS TBLDAFTHOTEL_TGLBTSKRGBAYAR,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BLNBTSKRGBAYAR,0) AS TBLDAFTHOTEL_BLNBTSKRGBAYAR,
			NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_THNBTSKRGBAYAR,0) AS TBLDAFTHOTEL_THNBTSKRGBAYAR 
			";
			$from = 'TBLDAFTAR';
			$filter = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
			);

			$filter_AND = array(
				'EQ__TBLDAFTAR.TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
				,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
				,'EQ__TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK' => $tahun_substr
				,'EQ__TBLDAFTHOTEL.TBLPENDATAAN_BLNPAJAK' => $bulan
				// ,'EQ__tblsubyek_isaktif' => "T"
			);

			$otherquery = array(
				'limit'=> 30
				,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
				,'join_2'=> array('TBLDAFTHOTEL', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHOTEL.TBLDAFTAR_NOPOK')
				,'order'=> 'TBLDAFTAR.TBLDAFTAR_NOPOK ASC'
				,'andwhere_hrp'=> 'NVL(TBLDAFTHOTEL.TBLPENDATAAN_TGLPAJAK,0) = 0'
			);
			$model = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL') );

			$data['TBLDAFTAR_BADANUSAHANAMA'] =$model['TBLDAFTAR_BADANUSAHANAMA'];
			$data['TBLDAFTAR_BADANUSAHAALAMAT'] =$model['TBLDAFTAR_BADANUSAHAALAMAT'];
			$data['REKENING_KODE'] =$model['REKENING_KODE'];
			$data['TREKENING_TARIF'] =$model['REFBADANUSAHA_PERSEN'];
			
			$data['REFBADANUSAHA_REKPENDAPATAN'] =$model['REFBADANUSAHA_REKPENDAPATAN'];
			$data['REFBADANUSAHA_REKPAD'] =$model['REFBADANUSAHA_REKPAD'];
			$data['REFBADANUSAHA_REKPJK'] =$model['REFBADANUSAHA_REKPJK'];
			$data['REFBADANUSAHA_REKAYAT'] =$model['REFBADANUSAHA_REKAYAT'];
			$data['REFBADANUSAHA_REKJENIS'] =$model['REFBADANUSAHA_REKJENIS'];

			$data['TBLDAFTHOTEL_REGKURANGBAYAR'] = $model['TBLDAFTHOTEL_REGKURANGBAYAR'];
			$data['TBLDAFTHOTEL_NOMORPERIKSA'] = $model['TBLDAFTHOTEL_NOMORPERIKSA'];
			$data['TBLDAFTHOTEL_PAJAKPERIKSA'] = $model['TBLDAFTHOTEL_PAJAKPERIKSA']; 
			$data['TBLDAFTHOTEL_BUNGAKRGBAYAR'] = $model['TBLDAFTHOTEL_BUNGAKRGBAYAR']; 
			$data['TBLDAFTHOTEL_KENAIKANKRGBAYAR'] = $model['TBLDAFTHOTEL_KENAIKANKRGBAYAR']; 
			$data['TBLDAFTHOTEL_DENDAKRGBAYAR'] = $model['TBLDAFTHOTEL_DENDAKRGBAYAR']; 
			$data['TBLDAFTHOTEL_RUPIAHKRGBAYAR'] = $model['TBLDAFTHOTEL_RUPIAHKRGBAYAR']; 
			$data['TBLDAFTHOTEL_BLNKBAWAL'] = $model['TBLDAFTHOTEL_BLNKBAWAL']; 
			$data['TBLDAFTHOTEL_BLNKBAKHIR'] = $model['TBLDAFTHOTEL_BLNKBAKHIR']; 
			$data['TBLDAFTHOTEL_TGLKURANGBAYAR'] = sprintf("%02d",$model['TBLDAFTHOTEL_TGLKURANGBAYAR']); 
			$data['TBLDAFTHOTEL_BLNKURANGBAYAR'] = sprintf("%02d",$model['TBLDAFTHOTEL_BLNKURANGBAYAR']); 
			$data['TBLDAFTHOTEL_THNKURANGBAYAR'] = $model['TBLDAFTHOTEL_THNKURANGBAYAR']; 
			$data['TBLDAFTHOTEL_TGLBTSKRGBAYAR'] = sprintf("%02d",$model['TBLDAFTHOTEL_TGLBTSKRGBAYAR']); 
			$data['TBLDAFTHOTEL_BLNBTSKRGBAYAR'] = sprintf("%02d",$model['TBLDAFTHOTEL_BLNBTSKRGBAYAR']); 
			$data['TBLDAFTHOTEL_THNBTSKRGBAYAR'] = $model['TBLDAFTHOTEL_THNBTSKRGBAYAR'];

			if ($model['TBLDAFTHOTEL_PAJAKPERIKSA']<0) {
				$data['CEKMINUS'] = 'minus';
			} 
			
			// }
		
		
		} else {

		$data['data'] = 'sudah terdaftar'; // SPT nya
		
		$select = "
		TBLDAFTAR.TBLDAFTAR_NOPOK,
		TBLDAFTAR.TBLDAFTAR_GOLONGAN,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHANAMA,
		TBLDAFTAR.TBLDAFTAR_BADANUSAHAALAMAT,
		TBLDAFTAR.TBLDAFTAR_ISAKTIF,
		TBLDAFTAR.TBLDAFTAR_PEMILIKNAMA,
		TBLDAFTAR.TBLDAFTAR_PEMILIKALAMAT,
		REFBADANUSAHA.REKENING_KODE,
		REFBADANUSAHA.REFBADANUSAHA_REKPENDAPATAN,
		REFBADANUSAHA.REFBADANUSAHA_REKPAD,
		REFBADANUSAHA.REFBADANUSAHA_REKPJK,
		REFBADANUSAHA.REFBADANUSAHA_REKAYAT,
		REFBADANUSAHA.REFBADANUSAHA_REKJENIS,
		REFBADANUSAHA.REFBADANUSAHA_PERSEN
		";
		$from = 'TBLDAFTAR';
		$filter = array(
			'EQ__TBLDAFTAR_NOPOK' => $TBLDAFTAR_NOPOK
		);

		$filter_AND = array(
			'EQ__TBLDAFTAR_GOLONGAN' => $this->KODE_GOL
			,'EQ__REFBADANUSAHA.REFBADANUSAHA_REKAYAT' => $this->PAJAK_AYAT
			// ,'EQ__tblsubyek_isaktif' => "T"
		);

		$otherquery = array(
			'limit'=> 30
			,'join'=> array('REFBADANUSAHA', 'REFBADANUSAHA.REFBADANUSAHA_ID= TBLDAFTAR.REFBADANUSAHA_IDBADANUSAHA')
			,'order'=> 'TBLDAFTAR_NOPOK ASC'

		);
		$model = DBFetch::query( array('select'=>$select,'from'=>$from,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true,'otherquery'=>$otherquery,'mode'=>'DETAIL') );

		$data['TBLDAFTAR_BADANUSAHANAMA'] =$model['TBLDAFTAR_BADANUSAHANAMA'];
		$data['TBLDAFTAR_BADANUSAHAALAMAT'] =$model['TBLDAFTAR_BADANUSAHAALAMAT'];
		$data['REKENING_KODE'] =$model['REKENING_KODE'];
		$data['TREKENING_TARIF'] =$model['REFBADANUSAHA_PERSEN'];
		
		$data['REFBADANUSAHA_REKPENDAPATAN'] =$model['REFBADANUSAHA_REKPENDAPATAN'];
		$data['REFBADANUSAHA_REKPAD'] =$model['REFBADANUSAHA_REKPAD'];
		$data['REFBADANUSAHA_REKPJK'] =$model['REFBADANUSAHA_REKPJK'];
		$data['REFBADANUSAHA_REKAYAT'] =$model['REFBADANUSAHA_REKAYAT'];
		$data['REFBADANUSAHA_REKJENIS'] =$model['REFBADANUSAHA_REKJENIS'];

		}

		echo CJSON::encode($data);
	}

		public function actioncekSudahBayar()
	{
		$NOPOKOK = $_REQUEST['NOPOKOK'];
		$THNPAJAK = substr($_REQUEST['TAHUN'], -2);
		$BLNPAJAK = $_REQUEST['BULAN'];
		$jns = 'K';

		$sql = "SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLSETORANBPD WHERE TBLPENDATAAN_THNPAJAK =".$THNPAJAK." AND TBLPENDATAAN_BLNPAJAK=".$BLNPAJAK." AND TBLDAFTAR_NOPOK=".$NOPOKOK." AND TBLSETORANBPD_JNSKETETAPAN = 'K'";
		$cek = Yii::app()->db->createCommand($sql)->queryScalar();
		if ($cek) {
			echo CJSON::encode(array('status'=>'sudah'));
		}
		else{
			echo CJSON::encode(array('status'=>'belum'));
		}
	}

	public function cekProses($tahun, $bulan, $TBLDAFTAR_NOPOK)
	{
		$model = Yii::app()->db->createCommand('SELECT NVL(TBLDAFTHOTEL_REGKURANGBAYAR,0) FROM TBLDAFTHOTEL WHERE TBLPENDATAAN_THNPAJAK ='.$tahun.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$TBLDAFTAR_NOPOK.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = 0')->queryScalar();
		return $model;
	}

	public function cekBayar($THNPAJAK, $BLNPAJAK, $NOPOKOK)
	{
		$model = Yii::app()->db->createCommand("SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLSETORANBPD WHERE TBLPENDATAAN_THNPAJAK =".$THNPAJAK." AND TBLPENDATAAN_BLNPAJAK=".$BLNPAJAK." AND TBLDAFTAR_NOPOK=".$NOPOKOK." AND TBLSETORANBPD_JNSKETETAPAN = 'K'")->queryScalar();
		return $model;
	}

	public function cekAngsur($thn, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLANGSURAN WHERE TBLANGSURAN_PAJAKKE = 1 AND TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$nopok)->queryScalar();
		return $model;
	}

	public function cekPernahDaftar($thn, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT COUNT(TBLPENDATAAN_THNPAJAK) AS JML FROM TBLDAFTHOTEL WHERE TBLPENDATAAN_THNPAJAK ='.$thn.' AND TBLPENDATAAN_BLNPAJAK='.$bulan.' AND TBLDAFTAR_NOPOK='.$nopok.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = 0')->queryScalar();
		return $model;
	}

	public function CekNoRegisterKB($tahun, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT NVL(TBLDAFTHOTEL_REGKURANGBAYAR,0) AS NOKB FROM TBLDAFTHOTEL WHERE TBLPENDATAAN_THNPAJAK = '.$tahun.' AND TBLPENDATAAN_BLNPAJAK = '.$bulan.' AND TBLDAFTAR_NOPOK = '.$nopok.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = 0')->queryScalar();
		return $model;
	}

	public function GetLastNoKB($tahun, $bulan, $nopok)
	{
		$model = Yii::app()->db->createCommand('SELECT MAX(NVL(TBLKRGBAYAR_REGKURANGBAYAR,0)) AS LAST_KB FROM TBLKRGBAYAR WHERE TBLPENDATAAN_THNPAJAK = '.$tahun.' AND TBLPENDATAAN_BLNPAJAK = '.$bulan.' AND TBLDAFTAR_NOPOK = '.$nopok.' AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = 0')->queryScalar();
		return $model;
	}

	public function actionSimpanSKPDKBHotel1()
	{
		Yii::import('ext.LokalIndonesia');

		$PARAM = $_REQUEST;
		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];

		if (Yii::app()->request->getParam('minus')) {
			$pajakperiksa = '-'.LokalIndonesia::toAngka($PARAM['TBLDAFTHOTEL_PAJAKPERIKSA']);
		} else {
			$pajakperiksa = LokalIndonesia::toAngka($PARAM['TBLDAFTHOTEL_PAJAKPERIKSA']);
		}

		$THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2,4);

		$TBLPENDATAAN_BLNPAJAK = !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';

		$TBLDAFTHOTEL_TGLKURANGBAYAR = !empty($_REQUEST['TBLDAFTHOTEL_TGLKURANGBAYAR']) ? $_REQUEST['TBLDAFTHOTEL_TGLKURANGBAYAR'] : '';

		$TBLDAFTHOTEL_TGLBTSKRGBAYAR = !empty($_REQUEST['TBLDAFTHOTEL_TGLBTSKRGBAYAR']) ? $_REQUEST['TBLDAFTHOTEL_TGLBTSKRGBAYAR'] : '';

		$TBLDAFTHOTEL_TGLPERIKSA = !empty($_REQUEST['TBLDAFTHOTEL_TGLPERIKSA']) ? $_REQUEST['TBLDAFTHOTEL_TGLPERIKSA'] : '';

		if ($TBLDAFTHOTEL_TGLKURANGBAYAR !='') {
			$exp_TGLTERIMADAFTAR = explode('-', $TBLDAFTHOTEL_TGLKURANGBAYAR);
			$pecahtgldaftar = $exp_TGLTERIMADAFTAR[0];
			$pecahbulandaftar = $exp_TGLTERIMADAFTAR[1];
			$pecahthndaftar = substr($exp_TGLTERIMADAFTAR[2], -2);	
		} else {
			$pecahtgldaftar = '';
			$pecahbulandaftar = '';
			$pecahthndaftar = '';
		}

		if ($TBLDAFTHOTEL_TGLBTSKRGBAYAR !='') {
			$exp_TGLENTRYDAFTAR = explode('-', $TBLDAFTHOTEL_TGLBTSKRGBAYAR);
			$pecahtglentry = $exp_TGLENTRYDAFTAR[0];
			$pecahbulanentry = $exp_TGLENTRYDAFTAR[1];
			$pecahthnentry = substr($exp_TGLENTRYDAFTAR[2], -2);
		} else {
			$pecahtglentry = '';
			$pecahbulanentry = '';
			$pecahthnentry = '';
		}

		if ($TBLDAFTHOTEL_TGLPERIKSA !='') {
			$exp_TGLPERIKSA = explode('-', $TBLDAFTHOTEL_TGLPERIKSA);
			$pecahtglperiksa = $exp_TGLPERIKSA[0];
			$pecahbulanperiksa = $exp_TGLPERIKSA[1];
			$pecahthnperiksa = substr($exp_TGLPERIKSA[2], -2);
		} else {
			$pecahtglperiksa = '';
			$pecahbulanperiksa = '';
			$pecahthnperiksa = '';
		}

		$command = Yii::app()->db->createCommand();
		$column = array(

			'TBLDAFTHOTEL_REGKURANGBAYAR' => LokalIndonesia::toAngka($PARAM['TBLDAFTHOTEL_REGKURANGBAYAR']),
			'TBLDAFTHOTEL_PAJAKPERIKSA' => $pajakperiksa,
			'TBLDAFTHOTEL_NOMORPERIKSA' => $PARAM['TBLDAFTHOTEL_NOMORPERIKSA'],
			'TBLDAFTHOTEL_BUNGAKRGBAYAR' => LokalIndonesia::toAngka($PARAM['TBLDAFTHOTEL_BUNGAKRGBAYAR']),
			'TBLDAFTHOTEL_KENAIKANKRGBAYAR' => LokalIndonesia::toAngka($PARAM['TBLDAFTHOTEL_KENAIKANKRGBAYAR']),
			'TBLDAFTHOTEL_DENDAKRGBAYAR' => LokalIndonesia::toAngka($PARAM['TBLDAFTHOTEL_DENDAKRGBAYAR']),
			'TBLDAFTHOTEL_RUPIAHKRGBAYAR' => LokalIndonesia::toAngka($PARAM['TBLDAFTHOTEL_RUPIAHKRGBAYAR']),
			'TBLDAFTHOTEL_BLNKBAWAL' => $PARAM['TBLDAFTHOTEL_BLNKBAWAL'],
			'TBLDAFTHOTEL_BLNKBAKHIR' => $PARAM['TBLDAFTHOTEL_BLNKBAKHIR'],

			'TBLDAFTHOTEL_TGLKURANGBAYAR' => $pecahtgldaftar,
			'TBLDAFTHOTEL_BLNKURANGBAYAR' => $pecahbulandaftar,
			'TBLDAFTHOTEL_THNKURANGBAYAR' => $pecahthndaftar,

			'TBLDAFTHOTEL_TGLBTSKRGBAYAR' => $pecahtglentry,
			'TBLDAFTHOTEL_BLNBTSKRGBAYAR' => $pecahbulanentry,
			'TBLDAFTHOTEL_THNBTSKRGBAYAR' => $pecahthnentry,

			'TBLDAFTHOTEL_TGLPERIKSA' => $pecahtglperiksa,
			'TBLDAFTHOTEL_BLNPERIKSA' => $pecahbulanperiksa,
			'TBLDAFTHOTEL_THNPERIKSA' => $pecahthnperiksa,

		);

		$simpan = $command->update('TBLDAFTHOTEL', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPJK AND TBLPENDATAAN_BLNPAJAK =:TBLPENDATAAN_BLNPAJAK AND (TBLPENDATAAN_TGLPAJAK IS NULL OR TBLPENDATAAN_TGLPAJAK = 0)',array(':NOPOK' => $NOPOK,':THNPJK' => $THNPJK,':TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK));

		/* INSERT TABEL KURANG BAYAR */

		$CekNoRegisterKB = $this->CekNoRegisterKB($THNPJK, $TBLPENDATAAN_BLNPAJAK, $NOPOK);
		$LastNoKB = $this->GetLastNoKB($THNPJK, $TBLPENDATAAN_BLNPAJAK, $NOPOK);

		if ($CekNoRegisterKB==0) {
			$NoRecordKB = '1';
		} else {
			$NoRecordKB = $LastNoKB+1;
		}

		// 

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
		TBLDAFTAR.TBLDAFTAR_NOPOK = ".$NOPOK;
		$data['wp'] = Yii::app()->db->createCommand( $sql )->queryRow();

		// echo $CekNoRegisterKB;die();
		$dataspt['spt'] = Yii::app()->db->createCommand()
		->select('*')
		->from('TBLDAFTHOTEL')
		->where('NVL(TBLPENDATAAN_TGLPAJAK, 0) = 0 AND TBLPENDATAAN_THNPAJAK ='.$THNPJK.' AND
			TBLPENDATAAN_BLNPAJAK='.$TBLPENDATAAN_BLNPAJAK.' AND
			TBLDAFTAR_NOPOK='.$NOPOK)
		->queryRow();

		$column = array('TBLPENDATAAN_THNPAJAK'=>$THNPJK
			,'TBLPENDATAAN_BLNPAJAK'=>$TBLPENDATAAN_BLNPAJAK
			,'TBLPENDATAAN_TGLPAJAK'=>'0'
			,'TBLKRGBAYAR_JNSSURAT'=>''
			,'TBLDAFTAR_JNSPENDAPATAN'=>$dataspt['spt']['TBLDAFTAR_JNSPENDAPATAN']
			,'TBLDAFTAR_NOPOK'=>$NOPOK
			,'LOP'=>''
			,'TBLKRGBAYAR_PAJAKKE'=>$NoRecordKB
			,'TBLKRGBAYAR_GOLONGAN'=>$dataspt['spt']['TBLDAFTAR_GOLONGAN']
			,'TBLKECAMATAN_ID'=>$dataspt['spt']['TBLKECAMATAN_ID']
			,'TBLKELURAHAN_ID'=>$dataspt['spt']['TBLKELURAHAN_ID']
			,'TBLKRGBAYAR_NAMABADANUSAHA'=>$data['wp']['TBLDAFTAR_BADANUSAHANAMA']
			,'TBLKRGBAYAR_ALAMATBADANUSAHA'=>$data['wp']['TBLDAFTAR_BADANUSAHAALAMAT']
			,'PJ'=>''
			,'TBLKRGBAYAR_CARAKETETAPAN'=>''
			,'TBLKRGBAYAR_THNKETETAPAN'=>$pecahthndaftar
			,'TBLKRGBAYAR_BLNKETETAPAN'=>$pecahbulandaftar
			,'TBLKRGBAYAR_TGLKETETAPAN'=>$pecahtgldaftar
			,'TBLKRGBAYAR_REGKURANGBAYAR'=>LokalIndonesia::toAngka($PARAM['TBLDAFTHOTEL_REGKURANGBAYAR'])
			,'TBLKRGBAYAR_THNAWALKETETAPAN'=>'' // DIKOSONGKAN
			,'TBLKRGBAYAR_BLNAWALKETETAPAN'=>'' // DIKOSONGKAN
			,'TBLKRGBAYAR_TGLAWALKETETAPAN'=>'' // DIKOSONGKAN
			,'TBLKRGBAYAR_THNBATASKETETAPAN'=>$pecahthnentry
			,'TBLKRGBAYAR_BLNBATASKETETAPAN'=>$pecahbulanentry
			,'TBLKRGBAYAR_TGLBATASKETETAPAN'=>$pecahtglentry
			,'TBLKRGBAYAR_THNTERIMAKETETAPAN'=>'' // DIKOSONGKAN
			,'TBLKRGBAYAR_BLNTERIMAKETETAPAN'=>'' // DIKOSONGKAN
			,'TBLKRGBAYAR_TGLTERIMAKETETAPAN'=>'' // DIKOSONGKAN
			,'TBLKRGBAYAR_THNENTRIKETETAPAN'=>$pecahthndaftar
			,'TBLKRGBAYAR_BLNENTRIKETETAPAN'=>$pecahbulandaftar
			,'TBLKRGBAYAR_TGLENTRIKETETAPAN'=>$pecahtgldaftar
			,'TBLKRGBAYAR_KETETAPANTOTAL'=> !empty($dataspt['spt']['TBLDAFTHOTEL_PAJAKSKPD']) ? $dataspt['spt']['TBLDAFTHOTEL_PAJAKSKPD'] : ''
			,'TBLKRGBAYAR_SETORAN'=>'' // DARI TABEL SETOR
			,'TBLKRGBAYAR_SISAANGSURAN'=>'' //DATA ANGSURAN
			,'TBLKRGBAYAR_DENDAANGSURAN'=>'' //DATA ANGSURAN
			,'TBLKRGBAYAR_BUNGAANGSURAN'=>'' //DATA ANGSURAN
			,'TBLKRGBAYAR_THNSETORANGSURAN'=>''  //DATA ANGSURAN
			,'TBLKRGBAYAR_BLNSETORANGSURAN'=>''  //DATA ANGSURAN
			,'TBLKRGBAYAR_TGLSETORANGSURAN'=>''  //DATA ANGSURAN
			,'TBLKRGBAYAR_THNENTRISETOR'=>!empty($dataspt['spt']['TBLDAFTHOTEL_THNENTRISETOR']) ? $dataspt['spt']['TBLDAFTHOTEL_THNENTRISETOR'] : ''
			,'TBLKRGBAYAR_BLNENTRISETOR'=>!empty($dataspt['spt']['TBLDAFTHOTEL_BLNENTRISETOR']) ? $dataspt['spt']['TBLDAFTHOTEL_BLNENTRISETOR'] : ''
			,'TBLKRGBAYAR_TGLENTRISETOR'=>!empty($dataspt['spt']['TBLDAFTHOTEL_TGLENTRISETOR']) ? $dataspt['spt']['TBLDAFTHOTEL_TGLENTRISETOR'] : ''
			,'TBLKRGBAYAR_NOMORSETOR'=> '' //DARI TABEL SETOR
			,'TBLKRGBAYAR_REKPENDAPATAN'=>$dataspt['spt']['TBLDAFTHOTEL_REKPENDAPATAN']
			,'TBLKRGBAYAR_REKPAD'=>$dataspt['spt']['TBLDAFTHOTEL_REKPAD']
			,'TBLKRGBAYAR_REKPAJAK'=>$dataspt['spt']['TBLDAFTHOTEL_REKPAJAK']
			,'TBLKRGBAYAR_REKAYAT'=>$dataspt['spt']['TBLDAFTHOTEL_REKAYAT']
			,'TBLKRGBAYAR_REKJENIS'=>$dataspt['spt']['TBLDAFTHOTEL_REKJENIS']
			,'TBLKRGBAYAR_NAMAOPERATOR'=>''
			,'TER'=>''
			,'TBLKRGBAYAR_TGLENTRI'=> ''
			,'TBLKRGBAYAR_PAJAKPERIKSA'=> LokalIndonesia::toAngka($PARAM['TBLDAFTHOTEL_PAJAKPERIKSA'])
			,'TBLKRGBAYAR_DENDAKRGBAYAR'=> LokalIndonesia::toAngka($PARAM['TBLDAFTHOTEL_DENDAKRGBAYAR'])
			,'TBLKRGBAYAR_KENAIKANKRGBAYAR'=> LokalIndonesia::toAngka($PARAM['TBLDAFTHOTEL_KENAIKANKRGBAYAR'])
			,'TBLKRGBAYAR_BUNGAKRGBAYAR'=> LokalIndonesia::toAngka($PARAM['TBLDAFTHOTEL_BUNGAKRGBAYAR'])
			,'TBLKRGBAYAR_BLNKBAWAL'=> $PARAM['TBLDAFTHOTEL_BLNKBAWAL']
			,'TBLKRGBAYAR_BLNKBAKHIR'=> $PARAM['TBLDAFTHOTEL_BLNKBAKHIR']
			,'TBLKRGBAYAR_NOMORPERIKSA'=> $PARAM['TBLDAFTHOTEL_NOMORPERIKSA']
			,'TBLKRGBAYAR_ISAKTIF'=>'T'
		);

		$simpan_kb = $command->insert('TBLKRGBAYAR', $column);

		if ($simpan_kb>=0) {
			if ($simpan>=0) {
				echo CJSON::encode(array('status'=>'success'));
			}
			else{
				echo CJSON::encode(array('status'=>'failed'));
			}
		} else {
			echo CJSON::encode(array('status'=>'failed'));
		}
	}

	public function actionHapusSKPDKB()
	{
		Yii::import('ext.LokalIndonesia');

		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];

		$THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2,4);

		$TBLPENDATAAN_BLNPAJAK = !empty($_REQUEST['TBLPENDATAAN_BLNPAJAK']) ? $_REQUEST['TBLPENDATAAN_BLNPAJAK'] : '';

		$command = Yii::app()->db->createCommand();
		$column = array(

			'TBLDAFTHOTEL_REGKURANGBAYAR' => '',
			'TBLDAFTHOTEL_PAJAKPERIKSA' => '',
			'TBLDAFTHOTEL_NOMORPERIKSA' => '',
			'TBLDAFTHOTEL_BUNGAKRGBAYAR' => '',
			'TBLDAFTHOTEL_KENAIKANKRGBAYAR' => '',
			'TBLDAFTHOTEL_DENDAKRGBAYAR' => '',
			'TBLDAFTHOTEL_RUPIAHKRGBAYAR' => '',
			'TBLDAFTHOTEL_BLNKBAWAL' => '',
			'TBLDAFTHOTEL_BLNKBAKHIR' => '',

			'TBLDAFTHOTEL_TGLKURANGBAYAR' => '',
			'TBLDAFTHOTEL_BLNKURANGBAYAR' => '',
			'TBLDAFTHOTEL_THNKURANGBAYAR' => '',

			'TBLDAFTHOTEL_TGLBTSKRGBAYAR' => '',
			'TBLDAFTHOTEL_BLNBTSKRGBAYAR' => '',
			'TBLDAFTHOTEL_THNBTSKRGBAYAR' => '',

			'TBLDAFTHOTEL_TGLPERIKSA' => '',
			'TBLDAFTHOTEL_BLNPERIKSA' => '',
			'TBLDAFTHOTEL_THNPERIKSA' => '',

		);

		$simpan = $command->update('TBLDAFTHOTEL', $column ,'TBLDAFTAR_NOPOK =:NOPOK AND TBLPENDATAAN_THNPAJAK =:THNPJK AND TBLPENDATAAN_BLNPAJAK =:TBLPENDATAAN_BLNPAJAK AND NVL(TBLPENDATAAN_TGLPAJAK, 0) = 0',array(':NOPOK' => $NOPOK,':THNPJK' => $THNPJK,':TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK));

		if ($simpan>=0) {
			echo CJSON::encode(array('status'=>'success'));
		}
		else{
			echo CJSON::encode(array('status'=>'failed'));
		}
	}

	public function actionGetNoSKPDKB()
	{
		$tahun = $_REQUEST['tahun'];
		$splthn = substr($tahun, -2);

		$data = Yii::app()->db->createCommand("SELECT
			MAX(TO_NUMBER (TO_CHAR(NVL(TBLDAFTHOTEL_REGKURANGBAYAR, 0))))+1 AS nokb
		FROM
			TBLDAFTHOTEL
		WHERE
			TBLPENDATAAN_THNPAJAK = ".$splthn."
		AND NVL (TBLDAFTHOTEL_REGKURANGBAYAR, 0) <> 0
		ORDER BY
			TO_NUMBER (TO_CHAR(NVL(nokb, 0))) DESC")->queryRow();

		echo CJSON::encode($data);
	}

	public function actionCetak()
	{
		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
		$THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2,4);
		$TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];

        $select = "
        TBLDAFTHOTEL.*,
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BUNGAKRGBAYAR, 0) AS TBLDAFTHOTEL_BUNGAKRGBAYAR, 
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_KENAIKANKRGBAYAR, 0) AS TBLDAFTHOTEL_DENDAKRGBAYAR, 
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) AS TBLDAFTHOTEL_RUPIAHSETOR, 
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BLNKBAWAL, 0) AS TBLDAFTHOTEL_BLNKBAWAL, 
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BLNKBAKHIR, 0) AS TBLDAFTHOTEL_BLNKBAKHIR, 
        TBLDAFTAR.*, (
		SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
			TBLREKENING
		WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTHOTEL.TBLDAFTHOTEL_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTHOTEL.TBLDAFTHOTEL_REKJENIS
	) AS NMREK,
	(
		SELECT
		TBLREKENING.TBLREKENING_KODEFULL
		FROM
		TBLREKENING
		WHERE
		TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTHOTEL.TBLDAFTHOTEL_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTHOTEL.TBLDAFTHOTEL_REKJENIS
		) AS TBLREKENING_KODEFULL,
	(
		SELECT
			REFKECAMATAN.REFKECAMATAN_NAMA
		FROM
			REFKECAMATAN
		WHERE
			REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
	) AS bnmkec,
	(
		SELECT
			REFKELURAHAN.REFKELURAHAN_NAMA
		FROM
			REFKELURAHAN
		WHERE
			REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
		AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_KODE
	) AS bnmkel,
	(
		SELECT
			REFKECAMATAN.REFKECAMATAN_NAMA
		FROM
			REFKECAMATAN
		WHERE
			REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDPEMILIK
	) AS pnmkec,
	(
		SELECT
			REFKELURAHAN.REFKELURAHAN_NAMA
		FROM
			REFKELURAHAN
		WHERE
			REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDPEMILIK
		AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDPEMILIK
	) AS pnmkel";
        $from = 'TBLDAFTHOTEL';

        $otherquery = array(
             'leftjoin_daftar'=>array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHOTEL.TBLDAFTAR_NOPOK')
        );

        $filter = array(
            'EQ__TBLDAFTHOTEL.TBLDAFTAR_NOPOK' => $NOPOK
			,'EQ__TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK' => $THNPJK
			,'EQ__TBLDAFTHOTEL.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);

		$this->renderPartial('cetak',array('data'=>$data));
	}

	public function actionCetakWord()
	{
		// error_reporting(0);

		// baca file template, yg dipakai
		// $gettpl = MasterTemplate::model()->find('tblmastertemplate_jenis="WORD" AND tblmastertemplate_kelompok="tpl_bakecamatan" AND tblmastertemplate_isaktif="T"');
		
		// echo "$query";
		
		// $data['list_kartudata'] = Yii::app()->db->createCommand($query)->queryAll();

		$path_tpl =  dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'tpl_skpdkb' . DIRECTORY_SEPARATOR;
		$namatpl = $path_tpl . 'skpdkb.docx';

		Yii::import('ext.DMOpenTBS',true);
		Yii::import('ext.LokalIndonesia');
		DMOpenTBS::init();
		$otbs = new clsTinyButStrong;

		// Useful for debugging purposes. Displays the errors
		$otbs->NoErr = 0;
		$otbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

		$template = $namatpl;
		$otbs->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // load the template

		// Delete a sheet 
		// $otbs->PlugIn(OPENTBS_DELETE_SHEETS, 'Delete me'); 


		// Display a sheet (make it visible) 
		// $otbs->PlugIn(OPENTBS_DISPLAY_SHEETS, 'Display me'); 

		// Change the current sheet 
		// $otbs->PlugIn(OPENTBS_SELECT_SHEET, 2); 

		// A recordset for merging tables

		//INI CODING QUERY CETAK WORD

		$NOPOK = $_REQUEST['TBLDAFTAR_NOPOK'];
		$TBLPENDATAAN_THNPAJAK = $_REQUEST['TBLPENDATAAN_THNPAJAK'];
		$THNPJK = substr($TBLPENDATAAN_THNPAJAK, 2,4);
		$TBLPENDATAAN_BLNPAJAK = $_REQUEST['TBLPENDATAAN_BLNPAJAK'];

        $select = "
        TBLDAFTHOTEL.*,
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BUNGAKRGBAYAR, 0) AS TBLDAFTHOTEL_BUNGAKRGBAYAR, 
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_KENAIKANKRGBAYAR, 0) AS TBLDAFTHOTEL_NAIKKRGBAYAR,
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_DENDAKRGBAYAR, 0) AS TBLDAFTHOTEL_DENDAKRGBAYAR, 
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_RUPIAHSETOR, 0) AS TBLDAFTHOTEL_RUPIAHSETOR, 
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BLNKBAWAL, 0) AS TBLDAFTHOTEL_BLNKBAWAL, 
        NVL(TBLDAFTHOTEL.TBLDAFTHOTEL_BLNKBAKHIR, 0) AS TBLDAFTHOTEL_BLNKBAKHIR, 
        TBLDAFTAR.*, (
		SELECT
			TBLREKENING.TBLREKENING_NAMAREKENING
		FROM
			TBLREKENING
		WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPENDAPATAN
		AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPAD
		AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPAJAK
		AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTHOTEL.TBLDAFTHOTEL_REKAYAT
		AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTHOTEL.TBLDAFTHOTEL_REKJENIS
		) AS NMREK,
		(
			SELECT
			TBLREKENING.TBLREKENING_KODEFULL
			FROM
			TBLREKENING
			WHERE
			TBLREKENING.TBLREKENING_REKPENDAPATAN = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPENDAPATAN
			AND TBLREKENING.TBLREKENING_REKPAD = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPAD
			AND TBLREKENING.TBLREKENING_REKPAJAK = TBLDAFTHOTEL.TBLDAFTHOTEL_REKPAJAK
			AND TBLREKENING.TBLREKENING_REKAYAT = TBLDAFTHOTEL.TBLDAFTHOTEL_REKAYAT
			AND TBLREKENING.TBLREKENING_REKJENIS = TBLDAFTHOTEL.TBLDAFTHOTEL_REKJENIS
			) AS TBLREKENING_KODEFULL,
		(
			SELECT
				REFKECAMATAN.REFKECAMATAN_NAMA
			FROM
				REFKECAMATAN
			WHERE
				REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDBADANUSAHA
		) AS bnmkec,
		(
			SELECT
				REFKELURAHAN.REFKELURAHAN_NAMA
			FROM
				REFKELURAHAN
			WHERE
				REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDBADANUSAHA
			AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_KODE
		) AS bnmkel,
		(
			SELECT
				REFKECAMATAN.REFKECAMATAN_NAMA
			FROM
				REFKECAMATAN
			WHERE
				REFKECAMATAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDPEMILIK
		) AS pnmkec,
		(
			SELECT
				REFKELURAHAN.REFKELURAHAN_NAMA
			FROM
				REFKELURAHAN
			WHERE
				REFKELURAHAN.REFKELURAHAN_ID = TBLDAFTAR.TBLKELURAHAN_IDPEMILIK
			AND REFKELURAHAN.REFKECAMATAN_ID = TBLDAFTAR.TBLKECAMATAN_IDPEMILIK
		) AS pnmkel";
        $from = 'TBLDAFTHOTEL';

        $otherquery = array(
             'leftjoin_daftar'=>array('TBLDAFTAR', 'TBLDAFTAR.TBLDAFTAR_NOPOK = TBLDAFTHOTEL.TBLDAFTAR_NOPOK')
        );

        $filter = array(
            'EQ__TBLDAFTHOTEL.TBLDAFTAR_NOPOK' => $NOPOK
			,'EQ__TBLDAFTHOTEL.TBLPENDATAAN_THNPAJAK' => $THNPJK
			,'EQ__TBLDAFTHOTEL.TBLPENDATAAN_BLNPAJAK' => $TBLPENDATAAN_BLNPAJAK
        );

        $arrayConfig = array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'mode'=>'DETAIL');
        $data['cetak'] = DBFetch::query($arrayConfig);

        $sql1="SELECT * FROM TBLPEJABAT WHERE REFJABATAN_ID = 6";

		$data['jab1'] = Yii::app()->db->createCommand($sql1)->queryRow();

		$dt = array();

		$dt['nopok'] = $data['cetak']['TBLDAFTAR_NOPOK'];
		$dt['jabatan'] = $data['jab1']['TBLPEJABAT_URAIAN'];
		$dt['petugas'] = $data['jab1']['TBLPEJABAT_NAMA'];
		$dt['nip'] = $data['jab1']['TBLPEJABAT_NIP'];
		$dt['thnkb'] = '20'.$data['cetak']['TBLDAFTHOTEL_THNKURANGBAYAR'];
		$dt['blnkbawal'] = LokalIndonesia::getbulan($data['cetak']['TBLDAFTHOTEL_BLNKBAWAL']);
		$dt['blnkbakhir'] = LokalIndonesia::getbulan($data['cetak']['TBLDAFTHOTEL_BLNKBAKHIR']);
		$dt['regkb'] = $data['cetak']['TBLDAFTHOTEL_REGKURANGBAYAR'];

		$dt['namabadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHANAMA'];
		$dt['namapemilik'] = $data['cetak']['TBLDAFTAR_PEMILIKNAMA'];
		$dt['alamatbadan'] = $data['cetak']['TBLDAFTAR_BADANUSAHAALAMAT'];
		$dt['alamatpemilik'] = $data['cetak']['TBLDAFTAR_PEMILIKALAMAT'];

		$dt['kodefull'] = $data['cetak']['TBLREKENING_KODEFULL'];

		$dt['namarek'] = $data['cetak']['NMREK'];

		$dt['namarek'] = $data['cetak']['NMREK'];

		$dt['jatuhtempo'] = $data['cetak']['TBLDAFTHOTEL_TGLBTSKRGBAYAR'] .'/'. $data['cetak']['TBLDAFTHOTEL_BLNBTSKRGBAYAR'] .'/20'.$data['cetak']['TBLDAFTHOTEL_THNBTSKRGBAYAR'];

		$dt['pajakperiksa'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHOTEL_PAJAKPERIKSA']);
		$dt['bunga'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHOTEL_BUNGAKRGBAYAR']);
		$dt['denda'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHOTEL_DENDAKRGBAYAR']);
		$dt['naik'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHOTEL_NAIKKRGBAYAR']);
		$dt['setoran'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHOTEL_RUPIAHSETOR']);
		$dt['kurangbayar'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHOTEL_RUPIAHKRGBAYAR']);
		$dt['total'] = LokalIndonesia::rupiah($data['cetak']['TBLDAFTHOTEL_RUPIAHKRGBAYAR']);
		$dt['terbilang'] = LokalIndonesia::terbilangangka($data['cetak']['TBLDAFTHOTEL_RUPIAHKRGBAYAR']);

		$dt['thnpajak'] = '20'.$data['cetak']['TBLPENDATAAN_THNPAJAK'];

		$dt['npwpd'] = $data['cetak']['TBLDAFTAR_JENISPENDAPATAN'] .'.'. $data['cetak']['TBLDAFTAR_GOLONGAN'] .'.'. $data['cetak']['TBLDAFTAR_NOPOK'] .'.'. sprintf("%02d",$data['cetak']['TBLKECAMATAN_IDBADANUSAHA']) .'.'. sprintf("%02d",$data['cetak']['TBLKELURAHAN_IDBADANUSAHA']);

		// $dt['totalpajak'] = LokalIndonesia::ribuan($totalpajak['totalpajak']);
		$dt['datenow'] = date('d') .' '. LokalIndonesia::getbulan(date('m')) .' '. date('Y');
		
		//SAMPAI SINI QUERYNYA

		// var_dump($data);
		// echo json_encode($data['cetak']);Yii::app()->end();
		// echo json_encode($row);

		// Merge data in the first sheet 
		$npwpd = $data['cetak']['TBLDAFTAR_NOPOK'];
		$namafileDL = "SKPDKB-HOTEL-".$npwpd.".docx";
		$otbs->MergeField('dt', $dt); 
		// $otbs->MergeField('setoran', $setoran); 
		// $otbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT); // debug the template

		$otbs->Show(OPENTBS_DOWNLOAD, $namafileDL);
		Yii::app()->end();
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