<?php

class MenuController extends Controller
{
	var $menuUrut = array();
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		//$data['tree_menu'] = $this->genMenu();
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionTreeMenu()
	{
		$data['tree_menu'] = $this->genMenu();
		$this->renderPartial('tree_menu', array('data'=>$data));
	}

	public function genMenu()
	{
		$data = Yii::app()->db->createCommand()
		->select('TBLMENU_ID AS id,
			TBLMENU_ID,
			TBLMENU_KODE,
			TBLMENU_KODE AS kode,
			TBLMENU_TITLE AS title,
			TBLMENU_LINK AS url,
			TBLMENU_ICON AS icon, 
			TBLMENU_IDPARENT')
		->from('TBLMENU')
		->order('TBLMENU_KODE ASC')
		->queryAll();
		$hasil = Tblmenu::model()->buildTree($data);
		//print_r($hasil);
		return $hasil;
	}

	public function actiongetData()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = intval($_REQUEST['id']);
		$model = Tblmenu::model()->findByPk($id);
		header('Content-Type: application/json');
		echo CJSON::encode($model);
	}

	public function actionHapus()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$id = intval($_REQUEST['id']);
		$model = Tblmenu::model()->findByPk($id);

		if ($model->delete()) {
			$status = 'success'; $message = 'Data sukses dihapus';
			$this->delAllChild($id);
		} else {
			$status = 'failed'; $message = 'Data gagal dihapus';
		}
		$return = array('status'=>$status,'data'=>array('message'=>$message));
		header('Content-Type: application/json');
		echo CJSON::encode($return);
	}

	public function delAllChild($idparent)
	{
		$childs = Tblmenu::model()->findAll('TBLMENU_IDPARENT=:idparent', array(':idparent'=>$idparent));
		Tblmenu::model()->deleteAll('TBLMENU_IDPARENT=:idparent', array(':idparent'=>$idparent));
		foreach ($childs as $menuChild) {
			$idchild = $menuChild['TBLMENU_ID'];
			$idparent = $idchild;
			$this->delAllChild($idparent);
		}
	}

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$id = intval($_REQUEST['id']);
		$cmd = strval($_REQUEST['cmd']);
		if ($cmd=='tambah') {
			$model = new Tblmenu;
		} elseif ($cmd=='edit') {
			$model = Tblmenu::model()->findByPk($id);
		} else {
			echo "not defined"; Yii::app()->end();
		}

		$model->TBLMENU_ICON = strval($_REQUEST['TBLMENU_ICON'])!='' ? strval($_REQUEST['TBLMENU_ICON']) : null; 
		$model->TBLMENU_KODE = strval($_REQUEST['TBLMENU_KODE'])!='' ? strval($_REQUEST['TBLMENU_KODE']) : null; 
		$model->TBLMENU_LINK = strval($_REQUEST['TBLMENU_LINK']);
		$model->TBLMENU_TITLE = strval($_REQUEST['TBLMENU_TITLE']);
		$model->TBLMENU_IDPARENT = (int)$_REQUEST['TBLMENU_IDPARENT'];

		if ($model->save()) {
			$status = 'success'; $message = 'Data sukses disimpan';
		} else {
			$status = 'failed'; $message = 'Data gagal disimpan';
		}
		$return = array('status'=>$status,'data'=>array('message'=>$message));
		header('Content-Type: application/json');
		echo CJSON::encode($return);
	}

	public function actiondefragMenu()
	{
		$obj = json_decode( $_REQUEST['data'] );
		/*** convert the array to object ***/
    	$susunan = $this->objectToArray( $obj );

		//print_r($susunan);
		// Yii::app()->end();
		$menuUrut = array();
		$urutan = 1;foreach ($susunan as $key => $value) {
			//var_dump($value);
			$this->genKode($value, "", $urutan++);
		}

		foreach ($this->menuUrut as $menu) {
			$model = Tblmenu::model()->findByPk($menu['id']);
			$model->TBLMENU_KODE = $menu['kode'];
			$model->TBLMENU_IDPARENT = $menu['parent'];
			$menuUrut[] = $model->save() ? array('id'=>$menu['id'],'status'=>'success') : array('id'=>$menu['id'],'status'=>'fail');
		}
		// print_r($this->menuUrut);Yii::app()->end();
		if (count($menuUrut)>0) {
			$status = 'success';
			$message = 'Susunan menu berhasil disesuaikan.';
		}
		$return = array('status'=>$status,'data'=>array('message'=>$message,'return_data'=>$menuUrut));
		header('Content-Type: application/json');
		echo CJSON::encode($return);
	}

	public function genKode($menu, $kode_parent="", $urutan=1, $parent=0)
	{
		
    	$kode_parent = $kode_parent . ($kode_parent!='' ? '.' : "") . sprintf("%03d", $urutan);

		array_push( $this->menuUrut, array('id'=>$menu['id'],'kode'=> $kode_parent,'parent'=>$parent) );
		if(isset($menu['children'])){
            //We need to loop through it.
    		$no=1; foreach ($menu['children'] as $anak) {
    			$parent = $menu['id'];
        		//array_push($this->menuUrut, $this->genKode($anak, $kode_parent, $no++));
        		$this->genKode($anak, $kode_parent, $no++, $parent);
    		}
        }
	}

	public function actionAllMenu()
	{
		$result = array();
		$row = array();

		header('Content-type: text/json');
		header('Content-type: application/json');
		$id = isset($_REQUEST['id']) ? (int)$_REQUEST['id'] : "";

		$data = Tblmenu::model()->findAll(array('order'=>'TBLMENU_KODE ASC'));

		if (count($data)>0) {
			foreach($data as $list)
			{	
				$row[] = array(
					"id"=> $list['TBLMENU_ID'],
					'value'=> $list['TBLMENU_TITLE'],
					'isDisabled'=> ($id==$list['TBLMENU_ID']) ? 'T' : 'F'
				);
			}
			$result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			echo CJSON::encode($result);
		}
	}

	public function actiongetKodeMenu()
	{
		$idparent = (int)$_REQUEST['id'];
		$jml_submenu = Tblmenu::model()->count('TBLMENU_IDPARENT=:idparent', array(':idparent'=>$idparent));
		$kode_parent = Tblmenu::model()->findByPk($idparent)->TBLMENU_KODE;
		$kode_menubaru = $kode_parent .'.'. sprintf("%03d", ($jml_submenu+1));
		header('Content-type: text/json');
		header('Content-type: application/json');
		echo CJSON::encode(array('TBLMENU_KODE'=>$kode_menubaru));
	}

	/**
    *
    * Convert an object to an array
    *
    * @param    object  $object The object to convert
    * @reeturn      array
    *
    */
    function objectToArray( $object )
    {
        if( !is_object( $object ) && !is_array( $object ) )
        {
            return $object;
        }
        if( is_object( $object ) )
        {
            $object = get_object_vars( $object );
        }
        return array_map( array($this,'objectToArray'), $object );
    }
}