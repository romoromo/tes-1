<?php

class Surat_tagihan_hotelController extends Controller
{
	public $namatabel = 'TBLDAFTHOTEL';

	public function actionIndex()
	{
	$this->renderPartial('index');
	}

	public function actiongetdata()
	{
		$TBLPENDATAAN_THNPAJAK=intval($_POST['TBLPENDATAAN_THNPAJAK']);
		$TBLPENDATAAN_BLNPAJAK=intval($_POST['TBLPENDATAAN_BLNPAJAK']);
		$TBLPENDATAAN_TGLPAJAK=intval($_POST['TBLPENDATAAN_TGLPAJAK']);
		$TBLPENDATAAN_PAJAKKE=intval($_POST['TBLPENDATAAN_PAJAKKE']);
		$TBLDAFTAR_NOPOK=intval($_POST['TBLDAFTAR_NOPOK']);

	$model = Yii::app()->db->createCommand("SELECT ".$this->namatabel.".*, TBLDAFTAR.*, ".$this->namatabel."_REKURUSAN || '.' || 
							".$this->namatabel."_REKPEMERINTAHAN || '.' || 
							".$this->namatabel."_REKORGANISASI || '.' || 
							".$this->namatabel."_REKPROGRAM || '.' || 
							".$this->namatabel."_REKKEGIATAN || '.' || 
							".$this->namatabel."_REKDINAS || '.' || 
							".$this->namatabel."_REKBIDANG || '.' || 
							".$this->namatabel."_REKPENDAPATAN || '.' || 
							".$this->namatabel."_REKPAD || '.' || 
							".$this->namatabel."_REKPAJAK || '.' || 
							".$this->namatabel."_REKAYAT || '.' || 
							".$this->namatabel."_REKJENIS || '.' || 
							".$this->namatabel."_REKSUBJENIS AS TREKENING_NAMA,
							NVL(".$kolombunga.",0) AS bungasetor,
							NVL(".$kolomdenda.",0) AS dendasetor,
							NVL(".$kolompajak.",0) AS pajaksetor,
							NVL(".$kolomtotal.",0) AS totalsetor
							FROM ".$this->namatabel." 
							JOIN TBLDAFTAR ON TBLDAFTAR.TBLDAFTAR_NOPOK=".$this->namatabel.".TBLDAFTAR_NOPOK
							WHERE (TBLPENDATAAN_THNPAJAK='".substr($TBLPENDATAAN_THNPAJAK,-2)."' AND TBLPENDATAAN_BLNPAJAK='".$TBLPENDATAAN_BLNPAJAK."' AND NVL(TBLPENDATAAN_TGLPAJAK, 0)='".$TBLPENDATAAN_TGLPAJAK."') AND ".$this->namatabel.".TBLPENDATAAN_PAJAKKE=".$TBLPENDATAAN_PAJAKKE." AND ".$this->namatabel.".TBLDAFTAR_NOPOK=".$TBLDAFTAR_NOPOK."
							")
					->queryRow();

		echo CJSON::encode(array('data'=>$data, 'model'=>$model));
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