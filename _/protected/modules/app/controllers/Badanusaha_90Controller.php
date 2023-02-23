<?php

class Badanusaha_90Controller extends Controller
{
	var $NAMATABEL = 'REFTARGETPAJAK';
	var $ALIAS_MAP = array(
		"REFBADANUSAHA_ID"               => "KDBU",
		"REFBADANUSAHA_NAMA"             => "NMBU",
		"REFBADANUSAHA_NAMA_90"          => "NMBU90",
		"REFBADANUSAHA_GOLONGAN"         => "GOL",
		"REFBADANUSAHA_KODEPOS"          => "POS",
		"REFBADANUSAHA_AYAT"             => "AYT",
		"REFBADANUSAHA_JENIS"            => "JEN",
		"REFBADANUSAHA_PERSEN"           => "PCT",
		"REFBADANUSAHA_REKBIDANG"        => "BID",
		"REFBADANUSAHA_REKUNITORG"       => "UORG",
		"REFBADANUSAHA_REKPENDAPATAN"    => "PEND",
		"REFBADANUSAHA_REKPAD"           => "PAD",
		"REFBADANUSAHA_REKPJK"           => "PJK",
		"REFBADANUSAHA_REKAYAT"          => "AYAT",
		"REFBADANUSAHA_REKJENIS"         => "JENIS",
		"REFBADANUSAHA_REKPENDAPATAN_90" => "PEND90",
		"REFBADANUSAHA_REKPAD_90"        => "PAD90",
		"REFBADANUSAHA_REKPJK_90"        => "PJK90",
		"REFBADANUSAHA_REKAYAT_90"       => "AYAT90",
		"REFBADANUSAHA_REKJENIS_90"      => "JENIS90",
		"REFBADANUSAHA_REKSUB_90"        => "SUB90",
		"REFBADANUSAHA_REKAYATOLD"       => "AYAT",
		"REFBADANUSAHA_REKJENISOLD"      => "JENIS",
		"REFBADANUSAHA_REKKETERANGAN"    => "NMREK2",
		"REFBADANUSAHA_REKKETERANGAN_90" => "NMREK90",
	);

	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionMapping()
	{
		$data['tahun'] = (int)$_REQUEST['tahun'];
		// $sqle = "
		// SELECT TBLREKENING_KODEFULL AS TBLMASTERREKENING_KODE,TBLREKENING_NAMAREKENING AS TBLMASTERREKENING_NAMA FROM TBLREKTARGET
		// ORDER BY TBLREKENING_KODEFULL
		// ";
		$sqle = "
		SELECT 
		RBH.REFBADANUSAHA_ID,
		RBH.REFBADANUSAHA_NAMA,
		RBH.REFBADANUSAHA_NAMA_90,

		REFBADANUSAHA_REKPENDAPATAN,
		REFBADANUSAHA_REKPAD,
		REFBADANUSAHA_REKPJK,
		REFBADANUSAHA_REKAYAT,
		REFBADANUSAHA_REKJENIS,


		REFBADANUSAHA_REKPENDAPATAN_90,
		REFBADANUSAHA_REKPAD_90,
		REFBADANUSAHA_REKPJK_90,
		REFBADANUSAHA_REKAYAT_90,
		REFBADANUSAHA_REKJENIS_90,
		REFBADANUSAHA_REKSUB_90,

		REFBADANUSAHA_REKKETERANGAN,
		REFBADANUSAHA_REKKETERANGAN_90

		FROM SYSTEM.REFBADANUSAHA_90 RBH
		ORDER BY
		REFBADANUSAHA_REKPENDAPATAN,
		REFBADANUSAHA_REKPAD,
		REFBADANUSAHA_REKPJK,
		REFBADANUSAHA_REKAYAT,
		REFBADANUSAHA_REKJENIS
		";
		$data['list'] = Yii::app()->db->createCommand($sqle)->queryAll();

		$this->renderPartial('grid', array('data'=>$data));
	}

	public function actionSimpanInline()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');


		$id    = trim(Yii::app()->request->getParam('pk'));
		$val   = trim(Yii::app()->request->getParam('nilaiNominal'));
		$kolom = trim(Yii::app()->request->getParam('name'));

		if ($kolom!='NOMINAL') {
			$val   = trim(Yii::app()->request->getParam('value'));
		}

		$dt = Yii::app()->db->createCommand()
		->select('REFBADANUSAHA_ID')
		->from('REFBADANUSAHA_90')
		->where("REFBADANUSAHA_ID=:id", array(':id'=>$id))
		->queryRow();

		// echo CJSON::encode($dt);Yii::app()->end();

		$save = false;
		if ($dt) {
			if (isset($this->ALIAS_MAP[$kolom])) :
				$KOLOME = $this->ALIAS_MAP[$kolom];
				$save = Yii::app()->db->createCommand()
				->update("tabbdu_90", 
					array($KOLOME => $val), 
					'KDBU=:id', 
					array(':id' => $id)
				);
			endif;
		}

		header('Content-type: text/json');
		header('Content-type: application/json');
		if ($save) {
			echo CJSON::encode(array('status'=>'success', 'data'=>$_POST));
		} else {
			echo CJSON::encode(array('status'=>'failed', 'data'=>$_POST));
		}
	}

	public function actionLoadform()
	{
		$data = array();
		$this->renderPartial('form', array('data'=>$data));
	}
}