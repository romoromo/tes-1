<?php

class Cekdatawp_pertahunController extends Controller
{
	public function actionIndex()
	{
		$data['rek'] = Yii::app()->db->createCommand('
			SELECT
				*
			FROM
				TBLREKENING
			WHERE
				TBLREKENING_REKPAJAK = 1
			AND TBLREKENING_REKPAD = 1
			AND TBLREKENING_REKJENIS = 0
			ORDER BY
				TBLREKENING_REKPENDAPATAN,
				TBLREKENING_REKPAD,
				TBLREKENING_REKPAJAK,
				TBLREKENING_REKAYAT,
				TBLREKENING_REKJENIS
		')->queryAll();
		$data['sub_rek'] = Yii::app()->db->createCommand()
						->select('*')
						->from('TREKENING')
						->where('TREKENING_LEVEL=1')
						->queryAll();
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionCari()
	{
		$this->renderPartial('tabel');
	}

	public function actionCetak()
	{
		// $tgl_setor = trim($_REQUEST['tgl_setor'])!='' ? date('Y-m-d', strtotime($_REQUEST['tgl_setor']) ) : "";


		// $select = '*';
		
		// $from = 'tblizinpendaftaran';

		// $otherquery = array(
		// 	 'join_tblizin'=>array('tblizin','tblizinpendaftaran.tblizin_id = tblizin.tblizin_id')
		// 	,'join_tblizinpermohonan'=>array('tblizinpermohonan','tblizinpendaftaran.tblizinpermohonan_id = tblizinpermohonan.tblizinpermohonan_id')
		// 	,'join_tblkecamatan'=>array('tblkecamatan','tblizinpendaftaran.tblkecamatan_id = tblkecamatan.tblkecamatan_id')
		// 	,'join_tblkelurahan'=>array('tblkelurahan','tblizinpendaftaran.tblkelurahan_id = tblkelurahan.tblkelurahan_id')
		// 	,'join_tblpemohon'=>array('tblpemohon','tblpemohon.tblpemohon_id = tblizinpendaftaran.tblpemohon_id')
		// 	,'order'=>'tblizin.tblizin_nama,tblizinpermohonan.tblizinpermohonan_nama ASC'
		// 	,'group'=>'tblizinpermohonan.tblizinpermohonan_id'
		// );
		// $filter = array(
		// 	// 'GTEQ__tblizinpendaftaran.tblizinpendaftaran_tgljam_AS_awal' => $tgl_setor.' 00:00:00'
		// 	// 'LTEQ__tblizinpendaftaran.tblizinpendaftaran_tgljam_AS_akhir' => $tgl_sampai.' 23:59:59'
		// 	'EQ__tblizinpendaftaran.tblizinpendaftaran_isaktif' => 'T'
		// );

		// $data['daftar'] = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery,'filter'=>$filter,'mode'=>'LIST'));
		// $this->renderPartial('cetak', array(
		// 	'data'=>$data,
		// 	// 'tgl_setor'=>$tgl_setor,
		// 	)
		// );
		$this->renderPartial('cetak');
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