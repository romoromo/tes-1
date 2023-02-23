<?php

class DetailpajakController extends Controller
{
	var $MODULE_URL = 'pelayanan/detailpajak';
	
	public function actionMode()
	{
		$data = array();
		$data['mod_code'] = ( Yii::app()->request->getParam('for') );
		$data['mod_name'] = 'mod_' . base64_decode( Yii::app()->request->getParam('for') );
		$this->renderPartial('mode', array('data' => $data));
	}

	public function actionAksi()
	{
		$data = array();
		$data['mod_code'] = ( Yii::app()->request->getParam('for') );
		$data['mod_name'] = 'mod_' . base64_decode( Yii::app()->request->getParam('for') );
		$data['action'] = base64_decode( Yii::app()->request->getParam('action') );
		$this->renderPartial('aksi', array('data' => $data));
	}
}