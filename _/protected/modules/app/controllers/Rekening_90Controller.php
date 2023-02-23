<?php

class Rekening_90Controller extends Controller
{
	var $NAMATABEL = 'REFTARGETPAJAK';
	var $ALIAS_MAP = array(
		// "TBLREKENING_REKURUSAN"        => "URS",
		// "TBLREKENING_REKPEMERINTAHAN"  => "PEM",
		// "TBLREKENING_REKORGANISASI"    => "ORG",
		// "TBLREKENING_REKPROGRAM"       => "PRG",
		// "TBLREKENING_REKKEGIATAN"      => "KGT",
		// "TBLREKENING_REKDINAS"         => "DIN",
		// "TBLREKENING_REKBIDANG"        => "BID",
		
		"TBLREKENING_REKPENDAPATAN"    => "PEND",
		"TBLREKENING_REKPAD"           => "PAD",
		"TBLREKENING_REKPAJAK"         => "PJK",
		"TBLREKENING_REKAYAT"          => "AYT",
		"TBLREKENING_REKJENIS"         => "JEN",
		"TBLREKENING_REKSUBJENIS"      => "SUB",
		
		"TBLREKENING_REKPENDAPATAN_90" => "PEND90",
		"TBLREKENING_REKPAD_90"        => "PAD90",
		"TBLREKENING_REKPAJAK_90"      => "PJK90",
		"TBLREKENING_REKAYAT_90"       => "AYT90",
		"TBLREKENING_REKJENIS_90"      => "JEN90",
		"TBLREKENING_REKSUBJENIS_90"   => "SUB90",
		
		"TBLREKENING_NAMAREKENING"     => "NMREK",
		"TBLREKENING_KDTARGET"         => "KDTAR",
		"TBLREKENING_NAMAJENIS"        => "NMJEN",
		"TBLREKENING_SATUAN"           => "SATUAN",
		"TBLREKENING_PERSEN"           => "PCT",
		"TBLREKENING_TARIF"            => "TARIF",
		"TBLREKENING_TARIF1"           => "TARIF1",
		"TBLREKENING_TAHUNPD"          => "THPD",
		"TBLREKENING_NOMORPD"          => "NOPD",
		"TBLREKENING_JENISPAJAK"       => "JENPR",
		"TBLREKENING_NAMAREKENING2"    => "NMREK2",
		"TBLREKENING_NAMAREKENING_90"  => "NMREK90",
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
		TBLREKENING_KODE,
		TBLREKENING_NAMAREKENING,
		TBLREKENING_NAMAREKENING_90,

		-- TBLREKENING_REKPENDAPATAN,
		-- TBLREKENING_REKPAD,
		-- TBLREKENING_REKPAJAK,
		-- TBLREKENING_REKAYAT,
		-- TBLREKENING_REKJENIS,

		TBLREKENING_REKPENDAPATAN_90,
		TBLREKENING_REKPAD_90,
		TBLREKENING_REKPAJAK_90,
		TBLREKENING_REKAYAT_90,
		TBLREKENING_REKJENIS_90,
		TBLREKENING_REKSUBJENIS_90

		FROM SYSTEM.TBLREKENING_90 REK
		ORDER BY
		TBLREKENING_REKPENDAPATAN,
		TBLREKENING_REKPAD,
		TBLREKENING_REKPAJAK,
		TBLREKENING_REKAYAT,
		TBLREKENING_REKJENIS
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
		->select('TBLREKENING_KODE')
		->from('TBLREKENING_90')
		->where("TBLREKENING_KODE=:id", array(':id'=>$id))
		->queryRow();

		// echo CJSON::encode($dt);Yii::app()->end();

		$save = false;
		if ($dt) {
			if (isset($this->ALIAS_MAP[$kolom])) :
				$KOLOME = $this->ALIAS_MAP[$kolom];
				$save = Yii::app()->db->createCommand()
				->update("TBLREKENING_90", 
					array($kolom => $val), 
					'TBLREKENING_KODE=:id', 
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

	public function actionSimpan()
	{
		$param = $_POST;
		// echo CJSON::encode($param);Yii::app()->end();

		$TBLREKENING_NAMAREKENING     = Yii::app()->request->getParam('TBLREKENING_NAMAREKENING');
		$TBLREKENING_NAMAREKENING_90  = Yii::app()->request->getParam('TBLREKENING_NAMAREKENING_90');

		$TBLREKENING_REKPENDAPATAN    = (int)Yii::app()->request->getParam('TBLREKENING_REKPENDAPATAN');
		$TBLREKENING_REKPAD           = (int)Yii::app()->request->getParam('TBLREKENING_REKPAD');
		$TBLREKENING_REKPAJAK         = (int)Yii::app()->request->getParam('TBLREKENING_REKPAJAK');
		$TBLREKENING_REKAYAT          = (int)Yii::app()->request->getParam('TBLREKENING_REKAYAT');
		$TBLREKENING_REKJENIS         = (int)Yii::app()->request->getParam('TBLREKENING_REKJENIS');
		$TBLREKENING_REKSUBJENIS      = (int)Yii::app()->request->getParam('TBLREKENING_REKSUBJENIS');

		$TBLREKENING_REKPENDAPATAN_90 = Yii::app()->request->getParam('TBLREKENING_REKPENDAPATAN_90');
		$TBLREKENING_REKPAD_90        = Yii::app()->request->getParam('TBLREKENING_REKPAD_90');
		$TBLREKENING_REKPAJAK_90      = Yii::app()->request->getParam('TBLREKENING_REKPAJAK_90');
		$TBLREKENING_REKAYAT_90       = Yii::app()->request->getParam('TBLREKENING_REKAYAT_90');
		$TBLREKENING_REKJENIS_90      = Yii::app()->request->getParam('TBLREKENING_REKJENIS_90');
		$TBLREKENING_REKSUBJENIS_90   = Yii::app()->request->getParam('TBLREKENING_REKSUBJENIS_90');

		$TBLREKENING_KDTARGET   = Yii::app()->request->getParam('TBLREKENING_KDTARGET');
		$TBLREKENING_NAMAJENIS  = Yii::app()->request->getParam('TBLREKENING_NAMAJENIS');
		$TBLREKENING_SATUAN     = Yii::app()->request->getParam('TBLREKENING_SATUAN');
		$TBLREKENING_PERSEN     = Yii::app()->request->getParam('TBLREKENING_PERSEN');
		$TBLREKENING_TARIF      = Yii::app()->request->getParam('TBLREKENING_TARIF');
		$TBLREKENING_TARIF1     = Yii::app()->request->getParam('TBLREKENING_TARIF1');
		$TBLREKENING_TAHUNPD    = Yii::app()->request->getParam('TBLREKENING_TAHUNPD');
		$TBLREKENING_NOMORPD    = Yii::app()->request->getParam('TBLREKENING_NOMORPD');
		$TBLREKENING_JENISPAJAK = Yii::app()->request->getParam('TBLREKENING_JENISPAJAK');

		$kode = "{$TBLREKENING_REKPENDAPATAN}.{$TBLREKENING_REKPAD}.{$TBLREKENING_REKPAJAK}.{$TBLREKENING_REKAYAT}.{$TBLREKENING_REKJENIS}";
		$kode = trim($kode, '.');

		$eksis = Yii::app()->db->createCommand()
		->select('TBLREKENING_KODE')
		->from('TBLREKENING_90')
		->where("TBLREKENING_KODE=:id", array(':id'=>$kode))
		->queryRow();

		// var_dump($eksis);Yii::app()->end();

		if (!$eksis) :
			$arrayData = array(
				'TBLREKENING_REKURUSAN' => 1,
				'TBLREKENING_REKPEMERINTAHAN' => 20,
				'TBLREKENING_REKORGANISASI' => 1,
				'TBLREKENING_REKPROGRAM' => 20,
				'TBLREKENING_REKKEGIATAN' => 26,
				'TBLREKENING_REKDINAS' => 0,
				'TBLREKENING_REKBIDANG' => 0,

				'TBLREKENING_NAMAREKENING' => $TBLREKENING_NAMAREKENING,
				'TBLREKENING_NAMAREKENING_90' => $TBLREKENING_NAMAREKENING_90,

				'TBLREKENING_REKPENDAPATAN' => $TBLREKENING_REKPENDAPATAN,
				'TBLREKENING_REKPAD' => $TBLREKENING_REKPAD,
				'TBLREKENING_REKPAJAK' => $TBLREKENING_REKPAJAK,
				'TBLREKENING_REKAYAT' => $TBLREKENING_REKAYAT,
				'TBLREKENING_REKJENIS' => $TBLREKENING_REKJENIS,
				'TBLREKENING_REKSUBJENIS' => $TBLREKENING_REKSUBJENIS,

				'TBLREKENING_REKPENDAPATAN_90' => $TBLREKENING_REKPENDAPATAN_90,
				'TBLREKENING_REKPAD_90' => $TBLREKENING_REKPAD_90,
				'TBLREKENING_REKPAJAK_90' => $TBLREKENING_REKPAJAK_90,
				'TBLREKENING_REKAYAT_90' => $TBLREKENING_REKAYAT_90,
				'TBLREKENING_REKJENIS_90' => $TBLREKENING_REKJENIS_90,
				'TBLREKENING_REKSUBJENIS_90' => $TBLREKENING_REKSUBJENIS_90,

				'TBLREKENING_KDTARGET' => $TBLREKENING_KDTARGET,
				'TBLREKENING_NAMAJENIS' => $TBLREKENING_NAMAJENIS,
				'TBLREKENING_SATUAN' => $TBLREKENING_SATUAN,
				'TBLREKENING_PERSEN' => $TBLREKENING_PERSEN,
				'TBLREKENING_TARIF' => $TBLREKENING_TARIF,
				'TBLREKENING_TARIF1' => $TBLREKENING_TARIF1,
				'TBLREKENING_TAHUNPD' => $TBLREKENING_TAHUNPD,
				'TBLREKENING_NOMORPD' => $TBLREKENING_NOMORPD,
				'TBLREKENING_JENISPAJAK' => $TBLREKENING_JENISPAJAK,
			);
			$save = Yii::app()->db->createCommand()
			->insert("TBLREKENING_90", 
				$arrayData
			);
			if ($save) {
				echo CJSON::encode(array('status'=>'success', 'data'=>$_POST));
			} else {
				echo CJSON::encode(array('status'=>'failed', 'data'=>$_POST));
			}
			Yii::app()->end();
		endif;

		echo CJSON::encode(array('status'=>'exists', 'data'=>'Already exists'));
	}
}