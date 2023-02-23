<?php

class TargetrekeningController extends Controller
{
	var $NAMATABEL = 'REFTARGETPAJAK';

	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionFormtarget()
	{
		$data['tahun'] = (int)$_REQUEST['tahun'];
		// $sqle = "
		// SELECT TBLREKENING_KODEFULL AS TBLMASTERREKENING_KODE,TBLREKENING_NAMAREKENING AS TBLMASTERREKENING_NAMA FROM TBLREKTARGET
		// ORDER BY TBLREKENING_KODEFULL
		// ";
		$sqle = "
		SELECT 
		TBLREKENING_KODE AS TBLMASTERREKENING_KODE 
		, TBLREKENING_NAMAREKENING AS TBLMASTERREKENING_NAMA
		FROM SYSTEM.TBLREKENING 
		WHERE 
		TBLREKENING_REKPENDAPATAN = '4' 
		AND TBLREKENING_REKPAD = '1' 
		AND TBLREKENING_REKPAJAK = '1' 
		AND TBLREKENING_REKJENIS = '0' 
		ORDER BY 
		TBLREKENING_REKAYAT
		, TBLREKENING_REKJENIS
		";
		$data['list'] = Yii::app()->db->createCommand($sqle)->queryAll();

		$this->renderPartial('form', array('data'=>$data));
	}

	public function actionSimpanInline()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$id = (int) trim($_POST['pk']);
		$val = trim($_POST['value']);
		$val = trim($_POST['nilaiNominal']);
		$kolom = trim($_POST['name']);

		if ($kolom!='NOMINAL') {
			$val = trim($_POST['value']);
		}
		$dt = TargetPajak::model()->find('TBLMASTERREKENING_KODE=:kode AND REFTARGETPAJAK_TAHUN=:tahun', array(':kode'=>$_REQUEST['rekening_kode'], ':tahun'=>(int)$_REQUEST['tahun']));
		if ($dt) {
			$model = TargetPajak::model()->findByPk($dt->primaryKey);
			$model->{'REFTARGETPAJAK_' . $kolom} = $val;
		} else {
			$model = new TargetPajak;
			$model->{'REFTARGETPAJAK_' . $kolom} = $val;
			$model->REFTARGETPAJAK_TAHUN = (int)$_REQUEST['tahun'];
			// $model->REFSKPD_ID = (int)$_REQUEST['skpd'];
			$model->TBLMASTERREKENING_KODE = $_REQUEST['rekening_kode'];
		}
		header('Content-type: text/json');
		header('Content-type: application/json');
		if ($model->save()) {
			echo CJSON::encode(array('status'=>'success', 'data'=>$model->primaryKey));
		}
		else {
			echo CJSON::encode(array('status'=>'failed', 'data'=>$model->errors));
		}
	}
}