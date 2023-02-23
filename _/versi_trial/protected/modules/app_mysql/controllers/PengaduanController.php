<?php

class PengaduanController extends Controller
{
	public function actionIndex()
	{
		$data['pengaduan'] = array();
		$this->renderPartial('index', array(
			'data'=>$data
			)
		);
	}

	public function actionGetTbl()
	{
		$data['pengaduan'] = Yii::app()->db->createCommand()
		->select('tblpengaduan.*')
		->from('tblpengaduan')
		->queryAll();
		$this->renderPartial('tabel', array(
			'data'=>$data)
		);
	}

	public function actionedit()
	{
		$id = $_REQUEST['id'];
		//$model = Pengaduan::model()->findByPk($id);
		$model = Yii::app()->db->createCommand()
		->select('tblpengaduan.*')
		->from('tblpengaduan')
		->where('tblpengaduan_id=:s', array(':s'=>$id))
		->queryRow();
		$result = array();

		$obj['tblpengaduan_judul'] = $model['tblpengaduan_judul'];
		$obj['tblpengaduan_konten'] = $model['tblpengaduan_konten'];
		$obj['tblkomentar_konten'] = $model['tblkomentar_konten'];
		$result = $obj;
		echo CJSON::encode($result);
	}

	public function actionSimpan_status()
	{
		$id = trim($_POST['id']);
		$status = trim($_POST['status']);

		$model = Pengaduan::model()->findByPk($id);

		$model->tblpengaduan_isaktif=$status;
		if ($model->save()) {
			echo "success";
		}else{
			echo "failed";
		};
	}

	/*public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$cmd = trim($_REQUEST['cmd']);
		$nama_group = trim($_REQUEST['nama_group']);
		$status = trim($_REQUEST['status']);

		switch ($status) {
			case 'T':
				if ($cmd=="tambah") {
					$model= new GwRefgroupphonebook;
					$model->refgroupphonebook_id='';
			} elseif ($cmd=="edit") {
					$id = trim($_REQUEST['id']);
					$model=GwRefgroupphonebook::model()->findByPk($id);
				} else {
					echo "Invalid Command!";
					Yii::app()->end();
			}
				$model->refgroupphonebook_kode=$kode_group;
				$model->refgroupphonebook_nama= $nama_group;
				$model->refgroupphonebook_isaktif= "T";

				if($model->save()) {
					echo "success";
				}
				else {
					echo "failed";
				}

				break;

			case 'F':
				if ($cmd=="tambah") {
					$model= new GwRefgroupphonebook;
					$model->refgroupphonebook_id='';
			} elseif ($cmd=="edit") {
					$id = trim($_REQUEST['id']);
					$model=GwRefgroupphonebook::model()->findByPk($id);
				} else {
					echo "Invalid Command!";
					Yii::app()->end();
			}
				$model->refgroupphonebook_kode=$kode_group;
				$model->refgroupphonebook_nama= $nama_group;
				$model->refgroupphonebook_isaktif= "F";

				if($model->save()) {
					echo "success";
				}
				else {
					echo "failed";
				}

				break;

			default:
				# code...
				break;
		}

	}*/

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$id = trim($_POST['id']);
		$konten = trim($_POST['tblpengaduan_konten']);

		$model= new Komentar;
		$model->tblkomentar_id='';
		$model->tblpengaduan_id=$id;
		$model->tblkomentar_nama='Admin';
		$model->tblkomentar_konten=$konten;
		$model->tblkomentar_tanggal=date('Y-m-d H:i:s');

		if($model->save()) {
			echo "success";
		}
	}

	public function actionSimpanInline()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$id = (int) trim($_POST['pk']);
		$val = trim($_POST['value']);

		$model = Komentar::model()->findByPk($id);

		$model->tblkomentar_konten = $val;

		if ($model->save()) {
			echo "success";
		}else {
			echo "failed";
		}
	}

	public function actionHapus()
	{
		if(!Yii::app()->request->isPostRequest)
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_REQUEST['id']);
		$model = Pengaduan::model()->findByPk($id);
		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
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
}