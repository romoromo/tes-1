<?php
/**
 * This is the template for generating a controller class file.
 * The following variables are available in this template:
 * - $this: the ControllerCode object
 */
?>
<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseClass."\n"; ?>
{
	var $NAMATABEL_UTAMA = '';
	public function init()
	{
		Yii::import('ext.DBFetch');
	}
<?php foreach($this->getActionIDs() as $action): ?>
	public function action<?php echo ucfirst($action); ?>()
	{
		$data['list_combo'] = Model::model()->findAll();
		$select = 'count('.$this->NAMATABEL_UTAMA.'.PK_COLUMN)';
		$from = $this->NAMATABEL_UTAMA;
		$otherquery = $this->param_grid();

		$data['total_data'] = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery, 'mode'=>'SCALAR'));

		$this->renderPartial('<?php echo $action; ?>', array('data' => $data ));
	}

<?php endforeach; ?>
	public function actionDTJSON()
	{
		Yii::import('ext.DTPipeLine');

		//$cari_refskpd_id = !empty($_REQUEST['cari_refskpd_id']) ? $_REQUEST['cari_refskpd_id'] : "";
		//$cari_refkelompokdata_id = !empty($_REQUEST['cari_refkelompokdata_id']) ? $_REQUEST['cari_refkelompokdata_id'] : "";
		//$cari_refindikator_kode = !empty($_REQUEST['cari_refindikator_kode']) ? $_REQUEST['cari_refindikator_kode'] : "";
		
		$filter_AND = array();

		$filter_AND = array(
			'EQ__'.$this->NAMATABEL_UTAMA.'.refskpd_id'=>$cari_refskpd_id
			//,'EQ__'.$this->NAMATABEL_UTAMA.'.refkelompokdata_id'=>$cari_refkelompokdata_id
			//,'LK__'.$this->NAMATABEL_UTAMA.'.refindikator_kode'=>$cari_refindikator_kode
		);

		$select = $this->NAMATABEL_UTAMA.'.*';
		$from = $this->NAMATABEL_UTAMA;
		$otherquery = $this->param_grid();
		$otherquery = array_merge(
			$otherquery
			, array(
				// ,'order' => 'tblpesan_tanggal DESC'
				// 'order' => DTPipeLine::getOrder()
				'limit' => DTPipeLine::getRows()
				,'offset' => DTPipeLine::getStart()
			)
		);
		$filter = array(
			//'LK__refkelompokdata_kode' => DTPipeLine::getSearch()
			//,'LK__refindikator_nama' => DTPipeLine::getSearch()
		);

		$data = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery,'filter'=>$filter,'filter_AND'=>$filter_AND,'filterOR'=>true, 'mode'=>'LIST'));

		$results = array();
		$no = 1 + DTPipeLine::getStart(); // sesuaikan juga mulai offset ke berapa
		foreach ($data as $row) {
			$results[] = array_merge(
				array('num'=>$no++)
				, $row);
			// $results[] = $row;
		}

		$select = 'count('.$this->NAMATABEL_UTAMA.'.refindikator_id)';
		$otherquery = $this->param_grid();
		$dataTotal = DBFetch::query(array('select'=>$select,'from'=>$from,'otherquery'=>$otherquery, 'mode'=>'SCALAR'));

		unset($otherquery['limit']); //remove limit untuk mengakali filtered record
		$data_filtered = DBFetch::query(array('select'=>$select,'from'=>$from,'filter'=>$filter,'otherquery'=>$otherquery,'filter_AND'=>$filter_AND,'filterOR'=>true, 'mode'=>'SCALAR'));

		echo DTPipeLine::generateJSON(
			array(
				'useJSONHeader' => true
				,'COLUMN_AS_KEY' => true
				,'DATA_FETCHED' => $results
				,'TOTAL_RECORDS' => (int) $dataTotal
				// ,'TOTAL_FILTERED_RECORDS' => DTPipeLine::getSearch()=='' ? (int)$dataTotal : (int)count($results)
				,'TOTAL_FILTERED_RECORDS' => ( DTPipeLine::getSearch()=='' && !DBFetch::isFilterAND($filter_AND) ) ? (int)$dataTotal : (int)($data_filtered)
			)
		);
	}

	public function param_grid()
	{
		/* method ini untuk menentukan otherquery dari datatable pipeline*/
		return $otherquery = array(
			//'leftjoin_skpd' => array('refskpd',$this->NAMATABEL_UTAMA.'.refskpd_id = refskpd.refskpd_id')
			//,'leftjoin_kelompok' => array('refkelompokdata',$this->NAMATABEL_UTAMA.'.refkelompokdata_id = refkelompokdata.refkelompokdata_id')
			//,'order' => 'refskpd_kode IS NULL,refskpd_kode ASC, refkelompokdata_kode IS NULL, refkelompokdata_kode ASC, refindikator_kode ASC'
		);
	}

	public function actiongetData()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = (int) ($_POST['id']);
		$model = MODEL_UTAMA::model()->findByPk($id);
		header('Content-type: text/json');
		header('Content-type: application/json');
		$data = array();
		$hidden = array(); // daftar kolom yang ingin dihidden/tidak ditampilkan
		foreach ($model as $key => $value) {
			if( !in_array( $key, $hidden) ) {
				$data[$key] = $value;
			}
		}
		echo CJSON::encode($data);
	}

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim
		

		if ($cmd=="tambah") {
			$model = new MODEL_UTAMA;
			
		}
		elseif($cmd=="edit") {
			$id = trim($_REQUEST['id']);
			$model = MODEL_UTAMA::model()->findByPk($id);
		}
		else {
			echo CJSON::encode(array('status'=>'InvalidCommand'));
			Yii::app()->end();
		}

		$model->KOLOMFK_id = (int)($_REQUEST['param']['KOLOMFK_id']);
		$model->KOLOMFK2_id = (int)($_REQUEST['param']['KOLOMFK2_id']);
		$model->KOLOMCHAR_kode = strval($_REQUEST['param']['KOLOMCHAR_kode']);
		$model->KOLOMCHAR2_nama = strval($_REQUEST['param']['KOLOMCHAR2_nama']);
		$model->KOLOMENUM_isaktif = strval($_REQUEST['param']['KOLOMENUM_isaktif']);

		if ($model->save()) {
			echo CJSON::encode(array('status'=>'success','pk'=>$model->primaryKey,'msg'=>"Data berhasil disimpan"));
		}
		else {
			echo CJSON::encode(array('status'=>'failed','msg'=>"Data gagal disimpan"));
		}
	}

	public function actionHapus()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = (int) ($_POST['id']);
		$model = MODEL_UTAMA::model()->findByPk($id);
		if ($model->delete()) {
			echo CJSON::encode(array('status'=>'success','pk'=>$model->primaryKey,'msg'=>"Data berhasil dihapus"));
		}
		else {
			echo CJSON::encode(array('status'=>'failed','pk'=>$model->primaryKey,'msg'=>"Data gagal dihapus"));
		}
	}
}